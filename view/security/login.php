<link rel="stylesheet" href="./public/css/login.css">
<link rel="stylesheet" href="./public/css/register.css">
<h1>Se connecter</h1>

<form action="index.php?ctrl=security&action=connexion" method="POST">
    <label for="email">Votre email</label>
    <input type="email" name="email" id="email" required>
    <label for="password">Votre mot de passe</label>
    <input type="password" name="motsDePasse" id="motysDePasse" required></input>
    <input type="submit" name="submit" value="Connexion">
</form>