<?php
session_start();
require 'config.php';

// Autoriser ROLE_USER et ROLE_ADMIN
$user = requireRole($pdo, ['ROLE_USER','ROLE_ADMIN']);

$id = $_GET['id'] ?? null;
if (!$id) {
    http_response_code(400);
    echo "ID manquant";
    exit;
}

// Vérification propriétaire ou admin
$isOwner = requireOwner($pdo, $id);
$isAdmin = in_array('ROLE_ADMIN', (array)json_decode($user['roles'], true)) 
           || (is_string($user['roles']) && strpos($user['roles'],'ROLE_ADMIN')!==false);

if (!$isOwner && !$isAdmin) {
    http_response_code(403);
    include '403.php';
    exit;
}

// Récupération du contact
$stmt = $pdo->prepare("SELECT * FROM contacts WHERE id=?");
$stmt->execute([$id]);
$contact = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$contact) {
    header('Location: index.php');
    exit;
}

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_POST['confirm'] === 'yes') {
        // Supprimer photo si existe
        if (!empty($contact['photo_path']) && file_exists($contact['photo_path'])) {
            unlink($contact['photo_path']);
        }

        // Supprimer les tags liés
        $pdo->prepare("DELETE FROM contact_tag WHERE contact_id=?")->execute([$id]);

        // Supprimer le contact
        $pdo->prepare("DELETE FROM contacts WHERE id=?")->execute([$id]);

        header('Location: index.php');
        exit;
    } else {
        // Annuler suppression
        header('Location: show.php?id=' . $id);
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Supprimer Contact - HIBOS CRM</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<header class="header">
    <div class="header-content">
        <a href="index.php" class="logo">HIBOS CRM</a>
        <nav>
            <ul class="nav-links">
                <li><a href="index.php">📋 Contacts</a></li>
                <li><a href="create.php">➕ Ajouter</a></li>
                <li><a href="logout.php" class="btn-logout">🚪 Déconnexion</a></li>
            </ul>
        </nav>
    </div>
</header>

<main>
    <div class="container">
        <h1 class="page-title">🗑️ Supprimer Contact</h1>
        <p class="page-subtitle">
            Êtes-vous sûr de vouloir supprimer 
            <strong><?php echo isset($contact['name']) && $contact['name'] ? htmlspecialchars($contact['name']) : 'ce contact'; ?></strong> ?
        </p>

        <?php if(!empty($error)): ?>
            <div class="error-message"><?php echo htmlspecialchars($error); ?></div>
        <?php endif; ?>

        <form method="POST" class="form">
            <div class="btn-group">
                <button type="submit" name="confirm" value="yes" class="btn btn-danger">Oui, Supprimer</button>
                <button type="submit" name="confirm" value="no" class="btn btn-secondary">Non, Annuler</button>
            </div>
        </form>
    </div>
</main>
</body>
</html>
