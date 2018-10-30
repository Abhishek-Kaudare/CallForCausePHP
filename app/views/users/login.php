<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title><?php echo SITENAME; ?></title>
  <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Krub:400,700|Playball|Ubuntu:400,700" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?php echo URLROOT; ?>/public/css/style.css" type="text/css">
  <link rel="icon" href="favicon.ico" type="image/gif" sizes="16x16">

</head>

<body>
  <?php
flash('register_success');
?>
  <div class="login-box <?php echo ($data['bh'] == true) ? 'is-invalid-login' : ''; ?>">
    <div class="lb-header">
      <a href="#" class="active" id="login-box-link">Login</a>
      <a href="<?php echo URLROOT; ?>/users/signup" id="signup-box-link">Sign Up</a>
    </div>
    <div class="social-login">
      <a href="#">
        <i class="fa fa-facebook fa-lg"></i>
        Login in with facebook
      </a>
      <?php echo $data['google'] ?>
        <i class="fa fa-google-plus fa-lg"></i>
        log in with Google
      </a>
    </div>
    <form action="<?php echo URLROOT; ?>/users/login" method="post" class="email-login">
      <div class="u-form-group">
        <label for="email">Email: <sup>*</sup></label>
        <input type="email" name="email" placeholder="Email" class="<?php echo (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['email']; ?>" asd/>
        <span class="invalid-feedback"><?php echo $data['email_err'] ?></span>
      </div>
       <div class="u-form-group">
        <label for="email">Password: <sup>*</sup></label>
        <input type="password" name="psw" placeholder="Password" class="<?php echo (!empty($data['psw_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['psw']; ?>" asd/>
        <span class="invalid-feedback"><?php echo $data['psw_err'] ?></span>
      </div>
      <div class="u-form-group">
        <input type="submit" value="Login" class="btn">
      </div>
    </form>
  </div>
</body>


<script src="<?php echo URLROOT; ?>/js/script.js"></script>
</body>
</html>