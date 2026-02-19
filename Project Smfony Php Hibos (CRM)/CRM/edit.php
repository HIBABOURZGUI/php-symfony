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
$stmt = $pdo->prepare("SELECT * FROM contacts WHERE id = ?");
$stmt->execute([$id]);
$contact = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$contact) {
    header('Location: index.php');
    exit;
}

// Tags actuels
$tagsStmt = $pdo->prepare("SELECT label FROM tags WHERE id IN (SELECT tag_id FROM contact_tag WHERE contact_id = ?)");
$tagsStmt->execute([$id]);
$currentTags = $tagsStmt->fetchAll(PDO::FETCH_COLUMN);

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $photoPath = $contact['photo_path'];

    // Upload photo
    if (isset($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {
        $allowedTypes = ['image/jpeg', 'image/png', 'image/webp'];
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $mime = finfo_file($finfo, $_FILES['photo']['tmp_name']);
        finfo_close($finfo);

        if (!in_array($mime, $allowedTypes) || $_FILES['photo']['size'] > 2*1024*1024) {
            $error = 'Photo invalide (JPG/PNG/WEBP, max 2MB).';
        } else {
            if ($photoPath && file_exists($photoPath)) unlink($photoPath);
            $ext = pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION);
            if (!is_dir(__DIR__ . '/uploads/photos')) {
                mkdir(__DIR__ . '/uploads/photos', 0755, true);
            }
            $photoPath = 'uploads/photos/' . uniqid() . '.' . $ext;
            move_uploaded_file($_FILES['photo']['tmp_name'], $photoPath);
        }
    }

    if (empty($error)) {
        $stmt = $pdo->prepare("UPDATE contacts 
            SET name=?, email=?, phone=?, city=?, company=?, notes=?, photo_path=? 
            WHERE id=?");
        $stmt->execute([
            $_POST['name'],
            $_POST['email'],
            $_POST['phone'],
            $_POST['city'],
            $_POST['company'],
            $_POST['notes'],
            $photoPath,
            $id
        ]);

        // Supprimer anciens tags
        $pdo->prepare("DELETE FROM contact_tag WHERE contact_id = ?")->execute([$id]);

        // Ajouter nouveaux tags
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
                if ($tagId) $linkStmt->execute([$id, $tagId]);
            }
        }

        header('Location: show.php?id=' . $id);
        exit;
    }
}

// Tous les tags disponibles
$allTagsStmt = $pdo->query("SELECT label FROM tags ORDER BY label");
$allTags = $allTagsStmt->fetchAll(PDO::FETCH_COLUMN);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Éditer Contact - HIBOS CRM</title>
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
        <h1 class="page-title">✏️ Éditer le Contact</h1>
        <p class="page-subtitle">Modifiez les informations du contact</p>

        <?php if(!empty($error)): ?>
            <div class="error-message"><?php echo htmlspecialchars($error); ?></div>
        <?php endif; ?>

        <form method="POST" enctype="multipart/form-data" class="form">
            <label>👤 Nom Complet *</label>
            <input type="text" name="name" required value="<?php echo isset($contact['name']) ? htmlspecialchars($contact['name']) : ''; ?>">

            <label>📧 Email</label>
            <input type="email" name="email" value="<?php echo htmlspecialchars($contact['email']); ?>">

            <label>📱 Téléphone</label>
            <input type="tel" name="phone" value="<?php echo htmlspecialchars($contact['phone']); ?>">

            <label>🏙️ Ville</label>
            <input type="text" name="city" value="<?php echo htmlspecialchars($contact['city']); ?>">

            <label>🏢 Entreprise</label>
            <input type="text" name="company" value="<?php echo htmlspecialchars($contact['company']); ?>">

            <label>📝 Notes</label>
            <textarea name="notes"><?php echo htmlspecialchars($contact['notes']); ?></textarea>

            <label>📸 Photo</label>
            <?php if($contact['photo_path']): ?>
                <img src="<?php echo htmlspecialchars($contact['photo_path']); ?>" style="max-width:150px;">
            <?php endif; ?>
            <input type="file" name="photo" accept="image/jpeg,image/png,image/webp">

            <label>🏷️ Tags (séparés par virgule)</label>
            <input type="text" name="tags" value="<?php echo htmlspecialchars(implode(', ', $currentTags)); ?>">
            <small>Tags disponibles : <?php echo htmlspecialchars(implode(', ', $allTags)); ?></small>

            <button type="submit" class="btn btn-primary">✓ Mettre à Jour</button>
            <a href="show.php?id=<?php echo $id; ?>" class="btn btn-secondary">← Annuler</a>
        </form>
    </div>
</main>
</body>
</html>
