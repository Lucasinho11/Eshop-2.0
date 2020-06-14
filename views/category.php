<?php require('partials/menu.php');?>
<?php foreach($categories as $category): ?>
  <tr>
    <td>
      <a href="index.php?p=game&category_id=<?= $category['id'] ?>">
        <?= $category['name'] ?><br>
        <img src="./assets/images/<?= $category['image']?>" style="width: 500px;">
      </a><br>
    </td>
    <td>
    </td>
    <td>

    </td>
  </tr>
<?php endforeach; ?>
<?php require('partials/footer.php');?>
