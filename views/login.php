<?php require('partials/menu.php');?>
<form action="" method="post">
    <label for="email">email *:</label>
    <input id="email" type="email" name="email" required><br>

    <label for="password">Mot de passe *:</label>
    <input id="password" type="password" name="password" required><br>

    <button type="submit" id="login">Connect</button>
    
    

</form>
<?php require('partials/footer.php');?>