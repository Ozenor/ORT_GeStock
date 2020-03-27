<div class="col">
  <section class="flex-grow-1 text-center bg-col-gray my-3 ml-2">
    <form class="form-signin border border-radius shadow-lg bg-transparent rounded" method="POST" action="index.php">
      <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
      <label for="inputEmail" class="sr-only">Email address</label>
      <input type="email" name="inputEmail" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
      <label for="inputPassword" class="sr-only">Password</label>
      <!-- <input type="password" pattern=".{8,20}" name="inputPassword" id="inputPassword" class="form-control mt-1" placeholder="Password" required> -->
      <input type="password" name="inputPassword" id="inputPassword" class="form-control mt-1" placeholder="Password" required>
      <!-- <small id="passwordHelpBlock" class="form-text text-muted mb-1">
        Your password must be 8-20 characters long, contain letters and numbers and special characters.
      </small> -->
      <div class="checkbox mb-3">
        <label>
          <input type="checkbox" name="remember" value="remember-me"> Remember me
        </label>
      </div>
      <?php // gestion erreur de connexion
      if (!empty($echecConnexion)) {
      ?>
        <div class="mb-3">
          <label class="text-danger"><?php echo $echecConnexion; ?></label>
        </div>
      <?php
      }
      ?>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      <p class="mt-5 mb-3 text-muted">&copy; 2019-2020</p>
    </form>
  </section>
</div>