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

$messageSent = '';
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // ⚠️ PHPMailer non disponible - fonctionnalité email désactivée
    $error = 'Fonctionnalité email non disponible. PHPMailer doit être installé avec: composer require phpmailer/phpmailer';
    try {
        $mail->isSMTP();
        $mail->Host = 'localhost';
        $mail->SMTPAuth = false;
        $mail->Port = 1025; // MailHog ou autre serveur SMTP local
        $mail->setFrom('no-reply@crm.com', 'HIBOS CRM');
        $mail->addAddress($contact['email'], $contact['name']);
        $mail->Subject = $_POST['subject'];
        $mail->Body = $_POST['message'];
        $mail->send();
        $messageSent = '✅ Email envoyé (vérifiez MailHog ou votre serveur SMTP).';
    } catch (Exception $e) {
        $error = 'Erreur lors de l\'envoi : ' . $mail->ErrorInfo;
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Envoyer Email - HIBOS CRM</title>
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
        <h1 class="page-title">📧 Envoyer un Email</h1>
        <p class="page-subtitle">À <?php echo isset($contact['name']) && $contact['name'] ? htmlspecialchars($contact['name']) : 'Contact'; ?> (<?php echo isset($contact['email']) && $contact['email'] ? htmlspecialchars($contact['email']) : 'email@exemple.com'; ?>)</p>

        <?php if(!empty($messageSent)): ?>
            <div class="success-message"><?php echo htmlspecialchars($messageSent); ?></div>
        <?php endif; ?>

        <?php if(!empty($error)): ?>
            <div class="error-message"><?php echo htmlspecialchars($error); ?></div>
        <?php endif; ?>

        <form method="POST" class="form">
            <div class="form-group">
                <label for="subject">Sujet *</label>
                <input type="text" id="subject" name="subject" required placeholder="Objet de l'email">
            </div>

            <div class="form-group">
                <label for="message">Message *</label>
                <textarea id="message" name="message" required placeholder="Votre message..."></textarea>
            </div>

            <div class="btn-group">
                <button type="submit" class="btn btn-primary">📤 Envoyer</button>
                <a href="show.php?id=<?php echo $id; ?>" class="btn btn-secondary">← Retour</a>
            </div>
        </form>
    </div>
</main>
</body>
</html>
