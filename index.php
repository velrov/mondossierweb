<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Add your authentication logic here
    if ($username === 'admin' && $password === 'password') { // Replace with secure authentication
        $_SESSION['authenticated'] = true;
        $_SESSION['username'] = $username;
        header('Location: /adresses');
        exit;
    }
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
    <meta property="og:title" content="Université Côte d'Azur">
    <meta property="og:description" content="Portail étudiant de l'Université Côte d'Azur">
    <meta property="og:image" content="/images/logo.png">
    <meta name="twitter:card" content="summary_large_image">
    
    <title>Connexion - Université Côte d'Azur</title>
    <style>
        .loading-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.9);
            z-index: 1000;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        .loading-overlay.show {
            display: flex;
        }

        .loading-spinner {
            width: 50px;
            height: 50px;
            border: 5px solid #f3f3f3;
            border-top: 5px solid #0066cc;
            border-radius: 50%;
            animation: spin 1s linear infinite;
            margin-bottom: 20px;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        .loading-text {
            color: #333;
            font-size: 1.1em;
        }

        body {
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            min-height: 100vh;
            background-color: #f5f5f5;
            font-family: Arial, sans-serif;
        }

        .logo {
            margin: 40px 0;
            max-width: 300px;
        }

        .login-container {
            background: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            width: 90%;
            max-width: 400px;
        }

        .service-info {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 20px;
        }

        .service-icon {
             width: 48px;
             height: 48px;
             border-radius: 8px;
         }

        .service-text {
            display: flex;
            flex-direction: column;
        }

        .service-id {
            font-size: 0.9em;
            color: #666;
        }

        .service-name {
            font-size: 1em;
            color: #333;
        }

        .service-name a {
            color: #0066cc;
            text-decoration: none;
        }

        .login-section {
            margin-top: 20px;
        }

        .login-header {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 15px;
            font-size: 1.1em;
            color: #333;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            color: #666;
        }

        .form-group input {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .password-container {
            position: relative;
        }

        .toggle-password {
            position: absolute;
            right: 8px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            cursor: pointer;
            padding: 0;
            color: #0066cc;
        }

        .login-button {
            background-color: #0066cc;
            color: white;
            padding: 8px 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 1em;
            text-transform: uppercase;
        }

        .error-message {
            color: #ff0000;
            font-size: 0.9em;
            margin: 10px 0;
            display: none;
        }

        .links-section {
            margin-top: 20px;
            padding-top: 15px;
            border-top: 1px solid #eee;
        }

        .links-section a {
            color: #0066cc;
            text-decoration: none;
            display: block;
            margin-bottom: 8px;
            font-size: 0.9em;
        }

        .security-info {
            margin-top: 15px;
            color: #666;
            font-size: 0.85em;
        }

        .footer {
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            text-align: center;
            font-size: 0.8em;
            color: #666;
            padding: 15px;
            background: #f5f5f5;
        }

        .footer a {
            color: #0066cc;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="loading-overlay" id="loadingOverlay">
        <div class="loading-spinner"></div>
        <div class="loading-text">Connexion en cours...</div>
    </div>

    <img src="images/logo.png" alt="Université Côte d'Azur" class="logo">

    <div class="login-container">
        <div class="service-info">
            <img class="service-icon" src="images/uca.svg" alt="Service Icon">
            <div class="service-text">
                <span class="service-id">serviceid</span>
                <span class="service-name">Intranet des personnels UCA</span>
            </div>
        </div>

        <div class="login-section">
            <div class="login-header">
                <i class="fas fa-shield-alt"></i>
                Enter Username & Password
            </div>

            <form id="loginForm" action="/adresses" method="POST" onsubmit="return showLoadingOverlay()">
                <div class="form-group">
                    <label for="username">Nom d'utilisateur</label>
                    <input type="text" id="username" name="username" required>
                </div>
                <div class="form-group">
                    <label for="password">Mot de passe</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <button type="submit" class="login-button">Se connecter</button>
            </form>
        </div>

        <div class="links-section">
            <a href="https://sesame.unice.fr/web/app/prod/Common/Main/accueil">screen.pm.b</a>
            <a href="https://preferences.univ-cotedazur.fr/login">screen.pm.c</a>
        </div>

        <div class="security-info">
            For security reasons, please <a href="logout.html">log out</a> and exit your web browser when you are done accessing services that require authentication!
        </div>
    </div>

    <div class="footer">
        Hébergé par <a href="https://univ-cotedazur.fr/">Université Côte d'Azur</a>
    </div>

    <script>
        function validateLogin(event) {
            event.preventDefault();
            const username = document.getElementById('username').value;
            const password = document.getElementById('password').value;
            const errorMessage = document.getElementById('errorMessage');

            if (username === 'pv301653' && password === 'Velyu24012003') {
                document.getElementById('loadingOverlay').classList.add('show');
                setTimeout(() => {
                    window.location.href = '!etatCivilView.html';
                }, 2000);
            } else {
                errorMessage.style.display = 'block';
            }
        }

        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const toggleButton = document.querySelector('.toggle-password i');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleButton.className = 'fas fa-eye-slash';
            } else {
                passwordInput.type = 'password';
                toggleButton.className = 'fas fa-eye';
            }
        }
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</body>
</html>

<head>
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="/images/favicon.ico">
    <link rel="apple-touch-icon" sizes="180x180" href="/images/apple-touch-icon.png">
    
    <!-- Social Media Preview -->
    <meta property="og:title" content="Your Site Title">
    <meta property="og:description" content="Brief description of your site">
    <meta property="og:image" content="https://yoursite.com/images/preview.png">
    <meta property="og:url" content="https://yoursite.com">
    <meta name="twitter:card" content="summary_large_image">
</head>