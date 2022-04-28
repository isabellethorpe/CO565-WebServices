
<div class="col col-lg-4"> 

   <?php echo $message; ?>

   <form name="frmLogin" action="authenticate.php" method="post">

      <div class="form-group">
         <label for="txtid">Username</label>
         <input type="text" class="form-control" id="txtid" placeholder="Enter username">
      </div>

      <div class="form-group">
         <label for="txtpwd">Password</label>
         <input type="password" class="form-control" id="txtpwd" placeholder="Enter password">
      </div>

      <input type="submit" value="Login" name="btnlogin" class="btn btn-primary" />
   </form>

</div>
