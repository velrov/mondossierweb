<?php
session_start();

// Destroy the session
session_destroy();

// Clear session cookie
if (isset($_COOKIE[session_name()])) {
    setcookie(session_name(), '', time()-3600, '/');
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="/images/favicon.ico">
    
    <!-- Social Media Preview -->
    <meta property="og:title" content="Déconnexion - Université Côte d'Azur">
    <meta property="og:description" content="Portail étudiant de l'Université Côte d'Azur">
    <meta property="og:image" content="/images/logo.png">
    <meta name="twitter:card" content="summary_large_image">
    
    <title>Déconnexion - Université Côte d'Azur</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="logout-container">
        <img src="images/logo.svg" alt="Logo UCA" class="logo">
        <div class="logout-box">
            <div class="logout-header">
                <i class="fas fa-check-circle"></i>
                <h2>Déconnexion réussie</h2>
            </div>
            <div class="logout-message">
                <p>Vous avez été déconnecté avec succès.</p>
                <p>Pour vous reconnecter, <a href="/login">cliquez ici</a>.</p>
            </div>
            <p class="security-note">
                Pour des raisons de sécurité, veuillez fermer votre navigateur web.
            </p>
        </div>
    </div>
</body>
</html>