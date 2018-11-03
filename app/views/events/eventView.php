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
  <link href="https://fonts.googleapis.com/css?family=PT+Serif" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="icon" href="favicon.ico" type="image/gif" sizes="16x16">
</head>

<?php require APPROOT . '/views/inc/navbarMAIN.php';?>
  <div class="container">
    <div class="content">
      <div id="pet-title"><?php echo $data['event']->event_title ?>
      </div>
      <div id="pet-details-two">
        <div id="meta-details">
          <p>
            <i class="fa fa-user" aria-hidden="true"></i> <?php echo $data['user']->name ?>
          </p>
          <p>
            <i class="fa fa-calendar-check-o" aria-hidden="true"></i> <?php echo $data['event']->date ?>

          </p>
          <p>
            <i class="fa fa-map-marker" aria-hidden="true"></i> <?php echo $data['event']->venue ?>
          </p>

        </div>
        <div id="btn-tags">
          <form action="<?php echo URLROOT; ?>/events/register/<?php echo $data['event']->event_id ?>" method="post">
          <button class="pet-sign-btn" type="submit" <?php if($data['res']): ?>disabled <?php endif ?>>
            <?php if($data['res']):?>
            Registered
            <?php else: ?>
            Register!
            <?php endif ?>
          </button>
          </form>
        </div>
      </div>
      <div id="pet-disc">
        <?php echo $data['event']->details ?>
      </div>
      <div class="resp-container">
        <iframe class="resp-iframe" width="560" height="315"  frameborder="1" style="border:0" src="https://www.google.com/maps/embed/v1/place?q=<?php echo $data['venue'] ?>&key=AIzaSyCLM6xadDFjiTTGw3w_Wg1HSPjOLx1sUwk" allowfullscreen></iframe>
      </iframe>
      </div>
    </div>
    <div class="content-option">
      <h2>Help us make this world a better place to live!</h2>
      <h3>Your each presense matters!</h3>
    </div>
  </div>
  <footer>
    <p>@CallForCause.org</p>

  </footer>
</body>
<script
  src="https://code.jquery.com/jquery-3.3.1.js"
  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
  crossorigin="anonymous"></script>
<script src="<?php echo URLROOT; ?>/public/js/view.js"></script>

</html>