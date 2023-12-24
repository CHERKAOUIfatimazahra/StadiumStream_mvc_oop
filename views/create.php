<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/style.css">
    <title>StadiumStream</title>
</head>

<body>
    <?php
    ob_start();
    ?>


<h3>Create</h3>

<div>
<form action="index.php?action=store" method="post">

    <label for="name">Team Name</label>
    <input type="text" id="name" name="name" placeholder="Team name.." required>
    <label for="prenom">Discription</label>
    <input type="text" id="discription" name="discription" placeholder="Discription.." required>

    <input type="submit" value="Ajouter" name="ajouter">
  </form>
</div>

<?php $content = ob_get_clean(); ?>
        <?php include_once 'views/layout.php'; ?>

  
</body>

</html>