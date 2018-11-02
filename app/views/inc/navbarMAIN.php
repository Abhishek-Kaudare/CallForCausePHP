<header>
    <a class="logo" href="<?php echo URLROOT; ?>">CfC</a>
    <input type="checkbox" id="nav-toggle" class="nav-toggle">
    <nav>
      <ul>
        <li><a href="#">Events</a></li>
        <li><a href="#">Petitions</a></li>
        <?php if (isset($_SESSION['user_id'])): ?>
          <li><a href="#">Account</a></li>
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
<form id="demo-2" action="<?php echo URLROOT; ?>/search/tag/" method="GET">
	<input type="search" placeholder="Search">
</form>
  