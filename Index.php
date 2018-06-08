<?php
include 'core/init.php';

$db = DB::getInstance();

$fetch = $db->query('select * from category');


print_r(json_encode($fetch , true));
//var_dump($db);
 include 'includes/header.php'; ?>


<?php include 'pages/addContent.php'; ?>



<?php include 'includes/footer.php';  ?>
