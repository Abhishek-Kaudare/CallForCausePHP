<header>
    <a class="logo" href="<?php echo URLROOT; ?>">CfC</a>
    <input type="checkbox" id="nav-toggle" class="nav-toggle">
    <nav>
      <ul>
        <li><a href="<?php echo URLROOT; ?>/events/">Events</a></li>
        <li><a href="<?php echo URLROOT; ?>/petitions/">Petitions</a></li>
        <?php if (isset($_SESSION['user_id'])): ?>
          <li><a href="<?php echo URLROOT; ?>/events/account">Account</a></li>
        <?php endif?>
        <?php if (isset($_SESSION['user_id'])): ?>
          <li ><a id="logout" href="<?php echo URLROOT; ?>/users/logout">Logout </a></li>
        <?php else: ?>
          <li ><a id="login" href='<?php echo URLROOT; ?>/users/login' >Login </a></li>
        <?php endif?>
    </ul>
    </nav>
    <label for="nav-toggle" class="nav-toggle-label">
      <span></span>
    </label>
</header>
