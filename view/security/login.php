<h1>Se connecter</h1>
<form action="index.php?ctrl=security&action=login" method="POST">
    <label for="email">email</label>
    <input type="email" name="email" id="email"><br>

    <label for="pass1">Mot de passe</label>
    <input type="password" name="pass1" id="pass1"
    minlength="5" required value="azerty"><br>

    <input name="submit" type="submit">
</form>