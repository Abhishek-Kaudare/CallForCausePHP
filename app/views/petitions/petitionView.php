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
  <link rel="icon" href="favicon.ico" type="image/gif" sizes="16x16">
</head>

<?php require APPROOT . '/views/inc/navbarMAIN.php';?>
  <div class="container">
    <div class="content">
      <div id="pet-title"><?php echo $data['petition']->title ?>
      </div>
      <div id="pet-details">
        <div id="meta-details">
          <p>
            <?php echo $data['user']->name ?>
          </p>
          <p>
            <?php echo $data['petition']->target_date ?>
          </p>
          <p>
            <?php echo $data['petition']->total_votes ?> / <?php echo $data['petition']->target_votes ?>
          </p>
        </div>
        <div id="btn-tags">
          <button class="pet-sign-btn">
            ddd
          </button>
        </div>
      </div>
      <div id="pet-disc">
        <?php echo $data['petition']->description ?>
      </div>
      <iframe width="560" height="315" src="https://www.youtube.com/embed/<?php echo $data['petition']->youtube_url ?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen>
      </iframe>
      <button class="pet-sign-btn">

      </button>
    </div>
    <div class="content-option">
      asd
    </div>
  </div>
</body>

<script src="<?php echo URLROOT; ?>/public/js/form.js"></script>

</html>