<?php
session_start();
require 'config.php';

// Vérifie que l'utilisateur est connecté et possède le rôle ROLE_USER
$user = requireRole($pdo, ['ROLE_USER', 'ROLE_ADMIN']);

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $photoPath = null;

    // Gestion de l'upload de photo
    if (isset($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {
        $allowedTypes = ['image/jpeg', 'image/png', 'image/webp'];
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $mime = finfo_file($finfo, $_FILES['photo']['tmp_name']);
        finfo_close($finfo);

        if (!in_array($mime, $allowedTypes) || $_FILES['photo']['size'] > 2*1024*1024) {
            $error = 'Photo invalide (JPG/PNG/WEBP, max 2MB).';
        } else {
            $ext = pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION);
            if (!is_dir(__DIR__ . '/uploads/photos')) {
                mkdir(__DIR__ . '/uploads/photos', 0755, true);
            }
            $photoPath = 'uploads/photos/' . uniqid() . '.' . $ext;
            move_uploaded_file($_FILES['photo']['tmp_name'], $photoPath);
        }
    }

    // Insertion en base si pas d'erreur
    if (empty($error)) {
        $stmt = $pdo->prepare("INSERT INTO contacts 
            (owner_id, name, email, phone, city, company, notes, photo_path) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->execute([
            $user['id'],
            $_POST['name'],
            $_POST['email'],
            $_POST['phone'],
            $_POST['city'],
            $_POST['company'],
            $_POST['notes'],
            $photoPath
        ]);
        $contactId = $pdo->lastInsertId();

        // Gestion des tags
        if (!empty($_POST['tags'])) {
            $tagStmt = $pdo->prepare("SELECT id FROM tags WHERE label = ?");
            $insertTag = $pdo->prepare("INSERT IGNORE INTO tags (label) VALUES (?)");
            $linkStmt = $pdo->prepare("INSERT INTO contact_tag (contact_id, tag_id) VALUES (?, ?)");
            foreach (explode(',', $_POST['tags']) as $t) {
                $t = trim($t);
                if ($t === '') continue;
                $insertTag->execute([$t]);
                $tagStmt->execute([$t]);
                $tagId = $tagStmt->fetchColumn();
                if ($tagId) $linkStmt->execute([$contactId, $tagId]);
            }
        }

        header('Location: index.php');
        exit;
    }
}

// Récupération des tags existants pour affichage
$tagsStmt = $pdo->query("SELECT label FROM tags ORDER BY label");
$tags = $tagsStmt->fetchAll(PDO::FETCH_COLUMN);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter un Contact - HIBOS CRM</title>
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
        <h1 class="page-title">➕ Ajouter un Contact</h1>
        <p class="page-subtitle">Remplissez les informations du nouveau contact</p>

        <?php if(!empty($error)): ?>
            <div class="error-message"><?php echo htmlspecialchars($error); ?></div>
        <?php endif; ?>

        <form method="POST" enctype="multipart/form-data" class="form">
            <label>👤 Nom Complet *</label>
            <input type="text" name="name" required>

            <label>📧 Email</label>
            <input type="email" name="email">

            <label>📱 Téléphone</label>
            <input type="tel" name="phone">

            <label>🏙️ Ville</label>
            <input type="text" name="city">

            <label>🏢 Entreprise</label>
            <input type="text" name="company">

            <label>📝 Notes</label>
            <textarea name="notes"></textarea>

            <label>📸 Photo</label>
            <input type="file" name="photo" accept="image/jpeg,image/png,image/webp">

            <label>🏷️ Tags (séparés par virgule)</label>
            <input type="text" name="tags" placeholder="ex: VIP, Prospect, Client">
            <small>Tags existants : <?php echo htmlspecialchars(implode(', ', $tags)); ?></small>

            <button type="submit" class="btn btn-primary">✓ Ajouter</button>
            <a href="index.php" class="btn btn-secondary">← Retour</a>
        </form>
    </div>
</main>
</body>
</html>
