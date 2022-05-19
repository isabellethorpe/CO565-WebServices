<!-- Add icon library -->
<script src="https://kit.fontawesome.com/f2e91265ca.js" crossorigin="anonymous"></script>
<div class="col col-lg-4"> 

   <?php echo $message; ?>
   <form name="frmLogin" action="authenticate.php" method="post">
     

</div> 
<section class="vh-100">
  <div class="container-fluid h-custom">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-md-9 col-lg-6 col-xl-5">
        <img src="https://picsum.photos/500/700"
          class="img-fluid" alt="Sample image">
      </div>
      <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
        <form>
          <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
            <p class="lead fw-normal mb-0 me-3">Sign in Munched with</p>

            <a href=" https://myaccount.google.com"
              <button type="button" class="btn btn-primary btn-floating mx-1">
              <i class="fa-brands fa-google"></i>
              </button>
            </a>    

            <a href="https://twitter.com/?lang=en"
              <button type="button" class="btn btn-primary btn-floating mx-1">
              <i class="fab fa-twitter"></i>
              </button>
            </a>

            <a href="https://www.linkedin.com/login?fromSignIn=true&trk=guest_homepage-basic_nav-header-signin"
              <button type="button" class="btn btn-primary btn-floating mx-1">
              <i class="fab fa-linkedin-in"></i>
              </button>
              </a>
          </div>

          <div class="divider d-flex align-items-center my-4">
            <p class="text-center fw-bold mx-3 mb-0">Or</p>
          </div>

          <!-- Email input -->
          <div class="form-group">
          <input name="txtid" type="text" class="form-control" id="txtid" placeholder="Enter username"> 
            
          </div>
         <br> 
          <!-- Password input -->
          <div class="form-group">
         <input name="txtpwd" type="password" class="form-control" id="txtpwd" placeholder="Enter password">
         </div>

          <div class="d-flex justify-content-between align-items-center">
            <!-- Checkbox -->
            <div class="form-check mb-0">
              <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3" />
              <label class="form-check-label" for="form2Example3">
                Remember me
              </label>
            </div>
            <a href="#!" class="text-body">Forgot password?</a>
          </div>

          <div class="text-center text-lg-start mt-4 pt-2">
            <button type="submit" value="login" name="btnlogin" class="btn btn-primary btn-lg"
              style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button>
            <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="#!"
                class="link-danger">Register</a></p>
          </div>

        </form>
      </div>
    </div>
  </div>
</section>
