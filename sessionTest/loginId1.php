<?php include "../templates/permissionBuffer_head.html";?>
<?php include "../templates/bootstrapReqs.html";?>
<?php include "../templates/navbar.html";?>
<?php
session_start();
$_SESSION['userId'] = 1;
header("Refresh: 1.5; URL=../index.php");
?>
<p>Logged in w/ User ID 1</p>
<?php include "../templates/permissionBuffer_tail.html";?>