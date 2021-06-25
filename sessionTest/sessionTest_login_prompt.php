<?php
     session_start();

?>
<?php include "../templates/permissionBuffer_head.html";?>
<?php include "../templates/bootstrapReqs.html";?>
<?php include "../templates/navbar.html";?>
<p>Login to continue</p>
<a class="nav-link btn btn-danger mx-2" href="/libraryDb/sessionTest/loginId1.php">Login as Molly Orton (staff, userId 1)</a>
<a class="nav-link btn btn-danger mx-2" href="/libraryDb/sessionTest/loginId3.php">Login as Joe Bloggs (user, userId 3)</a>
<?php include "../templates/permissionBuffer_tail.html";?>