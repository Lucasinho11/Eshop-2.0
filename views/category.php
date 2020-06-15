<?php require('partials/menu.php');?>
<div class="contain">
<?php foreach($categories as $category): ?>

  
    <div class="card" style="background-image:url('./assets/images/<?= $category['image']?>');">
        <a href="index.php?p=game&category_id=<?= $category['id'] ?>">  
        <div class="title-game">
            <h1><?= $category['name'] ?></h1><br>
          </div>
        
        </a><br>
    </div>
  
<?php endforeach; ?>
</div>
<?php require('partials/footer.php');?>
