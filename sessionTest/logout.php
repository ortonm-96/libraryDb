<?php include "../templates/permissionBuffer_head.html";?>
<?php include "../templates/bootstrapReqs.html";?>
<?php include "../templates/navbar.html";?>
<?php
session_start();
session_destroy();
header("Refresh: 1.5; URL=../index.php");
?>
<p>Logged out</p>
<?php include "../templates/permissionBuffer_tail.html";?>