<?php require APPROOT . '/views/inc/headerMain.php';?>
<?php require APPROOT . '/views/inc/navbarMAIN.php';?>
  <div id="banner">
      <div class="banner-quote">
        Be the change you wish to see in the world
      </div>
      <div class="btn-container">
        <button class="petition-btn"><a href="<?php echo URLROOT  ?>/petitions/new_petition">Start a Petition</a></button>
        <button class="event-btn"><a href="<?php echo URLROOT  ?>/petitions/new_petition">Start a Event</a></button>
      </div>
  </div>
  <h1 id="victories">Victories</h1>
  <div class="your-class">
    
    <?php echo $data['victory_output'] ?>

  </div>

  <div class="container">
    <div class="card-wrapper-left">
      <h1>Latest Events</h1>
      <?php echo $data['event_output']; ?>
    </div>
    <div class="card-wrapper-right">
      
      <?php echo $data['petition_output']; ?>
      
    </div>
  </div>


<?php require APPROOT . '/views/inc/footerMain.php';?>

