<nav id="header">
  <div class="logo"><a href="#">CfC</a></div>
  <ul class="account-opt active">
    <?php if (isset($_SESSION['user_id'])): ?>
    <li class="active"><a href="<?php echo URLROOT; ?>/users/logout">Logout </a></li>
    <?php else: ?>
    <li class="active"><a href='<?php echo URLROOT; ?>/users/login' >Login </a></li>
    <?php endif?>
  </ul>
</nav>
