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
                    <div class="details">
                        <?php foreach($parentsCategories as $category):?>
                            <a href="index.php?p=category&category_id=<?= $category['id'] ?>">
                            <?= $category['name'] ?>
                            </a><br>
                        <?php endforeach;?>
                    </div>
                
                </details>
                <a href="index.php?p=questions">Questions</a> 
            </div> 
            <div class="icones">
                <div class="icone-profile">
                    <a href="index.php?p=user"><i class="fas fa-user"></i></a><br>
                </div>

                <div class="fav"
                    ><i class="fas fa-star"></i>
                </div>
                <div class="icone-cart">
                    <i class="fas fa-shopping-cart"></i>
                </div>
                <div class="burger">
                    <input id="burger" type="checkbox" />

                    <label class="span-burger"for="burger">
                        <span></span>
                        <span></span>
                        <span></span>
                    </label> 
                    <div class="burger-menu">
                        <ul>
                        <?php foreach($parentsCategories as $category):?>
                            <li><a href="index.php?p=category&category_id=<?= $category['id'] ?>">
                            <?= $category['name'] ?></li>
                            </a><br>
                        <?php endforeach;?>
                        </ul>  
                    </div>
                </div>
            </div>
            
        </nav>
        
    </body>
</html>