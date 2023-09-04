<link rel="stylesheet" href="./public/css/register.css">
<h1>S'inscrire</h1>

<!-- comme le live code de mickael hash.mp4 mais adapter a ma bdd et mes valeurs -->
<form action="index.php?ctrl=security&action=inscription" method="POST">
    <label for="pseudonyme">Pseudo</label>
    <input type="text" name="pseudonyme" id="pseudonyme" required>

    <label for="email">Ermail</label>
    <input type="email" name="email" id="email" required>

    <label for="password">mot de passe (8 caractères minimum)</label>
    <input type="password" name="motsDePasse" id="motsDePasse" required>

    <label>confirmation de votre mot de passe</label>
    <input type="password" name="motsDePasseConfirmation" id="motsDePasseConfirmation" required><br>

    <input type="submit" name="submit" value="Ajouter">

</form>