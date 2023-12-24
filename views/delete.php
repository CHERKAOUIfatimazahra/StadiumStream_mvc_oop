<?php
    ob_start();
    ?>
  <div class="confirmation-dialog" id="confirmationDialog">
    <p>Are you sure you want to perform this action?</p>
    <a class="confirmationBtn" href="index.php?action=destroy&id_team=<?php echo $id_team ?>">Yes</a>
    <a class="deleteBtn" href="index.php">Cancel</a>
  </div>

  <?php
$content = ob_get_clean();
include_once 'views/layout.php';
