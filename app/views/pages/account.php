<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title><?php echo SITENAME; ?></title>
  <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Krub:400,700|Playball|Ubuntu:400,700" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo URLROOT; ?>/public/css/main.css" type="text/css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="icon" href="favicon.ico" type="image/gif" sizes="16x16">
</head>

<?php require APPROOT . '/views/inc/navbarMAIN.php';?>
   <div class="container">
    <div class="card-wrap-left" style="overflow-y:hidden;">
      <h1>Welcome to CallForCause</h1>
      
      <h2>Email: <?php echo $_SESSION['user_email'] ?></h2>
    </div>
    <div class="card-wrap-right" >
      <?php echo $data ?>
    </div>
  </div>


  <footer>
    <p>@CallForCause.org</p>

  </footer>

</body>
</html>
