<?php

ob_start(); ?>

<div class="main">
    <div class="details">
        <div class="recentOrders">
            <div class="cardHeader">
                <h2>StadiumStream Teams</h2>
                <a  class="button" href="index.php?action=create">Add Team</a>
            </div>
            <table id="customers">
              <tr>
                <th>Team Id</th>
                <th>Team Name</th>
                <th>Team Discription</th>
                <th>Action</th>
              </tr>
<?php foreach ($teams as $team): ?>
              <tr>
              <td><?= $team->id_team ?></td>
              <td><?= $team->name ?></td>
              <td> <?= $team->discription ?> </td>
              <td>
                <a href="index.php?action=edit&id_team=<?php echo $team->id_team; ?>" class="btn" style="color: green; text-decoration: none; font-weight: bold;">Modifier</a>
                <a href="index.php?action=delete&id_team=<?php echo $team->id_team; ?>" class="btn" style="color: red; text-decoration: none; font-weight: normal;">Supprimer</a>
              </td>
            </tr>
<?php endforeach; ?> 
            </table>        
        </div>
    </div>
<?php $content = ob_get_clean(); ?>
<?php include_once 'views/layout.php'; ?>
</div>