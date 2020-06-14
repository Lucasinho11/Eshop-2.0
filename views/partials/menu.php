<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link href="./assets/css/style.css" rel="stylesheet">
        <link rel="stylesheet" href="./assets/vendors/fa/css/all.min.css">
    </head>
    <body>
        <nav>
            <div class="logo">
                Pay2Win
            </div>
            <div class="menu">
                <a href="index.php">Accueil</a>
                <details>
                    <summary class="title-menu">Genre</summary><br>
                        <?php foreach($parentsCategories as $category):?>
                            <a href="index.php?p=category&category_id=<?= $category['id'] ?>">
                            <?= $category['name'] ?>
                            </a><br>
                        <?php endforeach;?>
                
                </details>
                <a href="index.php">Questions</a>  
            <div class="icones">
            <i class="fas fa-user"><br>
                <a href="index.php?p=register" class="register">Click here to register </a><br>
                <a href="index.php?p=login" class="login">Click here to connect </a><br></i></a>
            <i class="fas fa-star"></i>
            <i class="fas fa-shopping-cart"></i>
            </div>
        </nav>
        
    </body>
</html>