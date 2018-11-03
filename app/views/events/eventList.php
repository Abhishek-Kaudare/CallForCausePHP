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
      <h1>255,486,572 people taking action</h1>
      <h2>On CallForCause, people connect across geographic and cultural borders to support causes they care about.</h2>
    </div>
    <div class="card-wrap-right" >
      <h1>Events</h1>
      <!-- <div class="blog-card">
        <div class="meta">
          <div class="photo" style="background-image: url(https://storage.googleapis.com/chydlx/codepen/blog-cards/image-1.jpg)"></div>
          <ul class="details">
            <li class="author"><a href="#">John Doe</a></li>
            <li class="date">Aug. 24, 2015</li>
            <li class="tags">
              <ul>
                <li><a href="#">Learn</a></li>
                <li><a href="#">Code</a></li>
                <li><a href="#">HTML</a></li>
                <li><a href="#">CSS</a></li>
              </ul>
            </li>
          </ul>
        </div>
        <div class="description">
          <h1>Learning to Code</h1>
          <h2>Opening a door to the future</h2>
          <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad eum dolorum architecto obcaecati enim dicta
            praesentium, quam nobis! Neque ad aliquam facilis numquam. Veritatis, sit.</p>
          <p class="read-more">
            <a href="#">Read More</a>
          </p>
        </div>
      </div> -->
      <?php echo $data ?>
    </div>
  </div>


  <footer>
    <p>@CallForCause.org</p>

  </footer>

</body>
</html>
