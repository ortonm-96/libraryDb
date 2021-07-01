<?php
     session_start();

?>
<?php include "{$_SERVER["DOCUMENT_ROOT"]}/libraryDb/templates/permissionBuffer_head.html";?>
<?php include "{$_SERVER["DOCUMENT_ROOT"]}/libraryDb/templates/bootstrapReqs.html";?>
<?php include "{$_SERVER["DOCUMENT_ROOT"]}/libraryDb/templates/navbar.html";?>
<p>Login to continue</p>

<div class="float-left container border rounded">
     <form action="/libraryDb/post_handlers/login_form.php" method="post">

          <div class="my-2">
               <label for="username" class="form-label">Username:</label>
               <input type="text" name="username" id="username" class="form-control" required>
          </div>

          <div class="my-2">
               <label for="password" class="form-label">Password:</label>
               <input type="password" name="password" id="password" class="form-control" required>
          </div>

          <input type="submit" value="Login" class="btn btn-light">

     </form>
</div>

<?php include "{$_SERVER["DOCUMENT_ROOT"]}/libraryDb/templates/permissionBuffer_tail.html";?>