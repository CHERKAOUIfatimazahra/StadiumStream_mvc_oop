<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/style.css">
    <title>StadiumStream</title>
</head>

<body>
    <?php ob_start(); ?>


<h3>Update</h3>

<div>
<form action="index.php?action=update" method="post">
    <input  value="<?= $team->id_team ?>" type="hidden" id="id_team" name="id_team" required>
    <label for="fname">Name</label>
    <input type="text" id="name" name="name" placeholder="Name.." required value="<?= $team->name ?>">
    <label for="discription">discription</label>
    <input type="text" id="discription" name="discription" placeholder="discription." required value="<?= $team->discription ?>">

    <input type="submit" value="Modifier" name="modifier">
</form>
</div>


<?php $content = ob_get_clean(); ?>
<?php include_once 'views/layout.php'; ?>
</body>

</html>



