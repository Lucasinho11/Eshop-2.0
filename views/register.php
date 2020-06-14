<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
    <?php require('partials/menu.php');?>


        <form action="" method="post">
            <label for="email">email *:</label>
            <input id="email" type="email" name="email" required><br>

            <label for="password">Mot de passe *:</label>
            <input id="password" type="password" name="password" required><br>

            <label for="first_name">first name *:</label>
            <input id="first_name" type="text" name="first_name" required><br>

            <label for="last_name">last name *:</label>
            <input id="last_name" type="text" name="last_name" required><br>

            <label for="address">adresse *:</label>
            <input id="address" type="text" name="address" required><br>
            
            <button type="submit"> envoyer</button>
            <small>* champs obligatoires</small>
        </form><br>
        <a href="index.php?p=login">Click here to connect </a>
        <?php require('partials/footer.php');?>
    </body>
</html>