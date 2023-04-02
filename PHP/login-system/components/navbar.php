<nav>
    <h1>Backbook</h1>
    <div class="links">
        <a href="./index.php">Home</a>
        <?php if(!isset($_SESSION['logged_in_user_id'])){ ?>
        <a href="./login.php">Login</a>
      <a href="./register.php">Register</a>
  <?php }else{ ?>
    <a href="./logout.php">Logout</a>
    <?php }?>
    </div>
</nav>