<?php require('partials/menu.php');?>


        <form action="" method="post">
            <label for="email">email *:</label>
            <input id="email" type="email" name="email" value="<?=$_SESSION['user']['email']?>" required><br>

            <label for="password">Mot de passe *:</label>
            <input id="password" type="password" name="password" required><br>

            <label for="first_name">first name *:</label>
            <input id="first_name" type="text" name="first_name" value="<?=$_SESSION['user']['first_name']?>" required><br>

            <label for="last_name">last name *:</label>
            <input id="last_name" type="text" name="last_name" value="<?=$_SESSION['user']['last_name']?>" required><br>

            <label for="address">adresse *:</label>
            <input id="address" type="text" name="address" value="<?=$_SESSION['user']['address']?>"required><br>
            
            <button type="submit"> envoyer</button>
            <small>* champs obligatoires</small>
        </form><br>

        <?php require('partials/footer.php');?>