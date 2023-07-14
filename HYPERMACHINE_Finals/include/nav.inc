<style>
  nav {
    box-shadow: 0 2px 4px 0 rgba(0,0,0,.2);
  }

  .nav-brand {
    font-size: 26px;
    font-weight: 900;
  }

  .nav-go {
    margin-bottom: 6px;
    margin-left: 5px;
    width: 64px;
    height: 34px;
  }

  .nav-cart {
      font-size: 28px;
  }
</style>

<nav class="navbar fixed-top navbar-expand bg-body-tertiary pt-3 pb-3" style="background-color: #ffff!important;">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">
      <span class="nav-brand">Poké Mart</span>
      <img class="nav-go" src="img/nav_go.png" alt="Bootstrap"></a>
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item pe-2">
          <a class="nav-link" href="login.php">Login</a>
        </li>
        <li class="nav-item" >
          <?php
            if ( /* PUT FILLED CART LOGIC HERE */ 1 == 1) {
          ?>
           <a class="bi bi-cart nav-cart" href="<?php echo (basename($_SERVER['PHP_SELF']) === 'signup.php') ? 'login.php' : ((basename($_SERVER['PHP_SELF']) === 'login.php')? 'login.php' : 'login.php'); ?>"></a>

          <?php
            } else {
          ?>
            <a class="bi bi-cart-fill nav-cart"></a>
          <?php
            }
          ?>
        </li>
      </ul>
    </div>
  </div>
</nav>