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

  .nav-icon {
    font-size: 28px;
  }
</style>

<nav class="navbar fixed-top navbar-expand bg-body-tertiary pt-3 pb-3" style="background-color: #ffff!important;">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">
      <span class="nav-brand">Poké Mart</span>
      <img class="nav-go" src="img/nav_go.png" alt="Bootstrap"></a>
    <ul class="navbar-nav">
        <li class="nav-item pe-2">
          <a class="nav-link" href="account_info.php"><i class="bi bi-person-circle nav-icon"></i></a>
        </li>
        <li class="nav-item pe-2">
          <a class="nav-link" href="logout.php">Logout</a>
        </li>
        <?php if (basename($_SERVER['PHP_SELF']) !== 'checkout.php') { ?>
          <li class="nav-item" >
            <?php
              if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
            ?>
             <a class="bi bi-cart-fill nav-cart" href="checkout.php"></a>
            <?php
              } else {
            ?>
              <a class="bi bi-cart nav-cart" href="checkout.php"></a>
            <?php
              }
            ?>
          </li>
        <?php } ?>
      </ul>
    </div>
  </div>
</nav>