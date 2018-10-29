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
  <link rel="stylesheet" href="<?php echo URLROOT; ?>/public/css/form.css" type="text/css">
  <link rel="icon" href="favicon.ico" type="image/gif" sizes="16x16">
</head>

<?php require APPROOT . '/views/inc/navbarMAIN.php';?>
  <!-- For error enter class form-has-error -->
  <form class="form-card" action="<?php echo URLROOT; ?>/events/new_event" method="POST">
    <fieldset class="form-fieldset">
      <legend class="form-legend">Event Form</legend>

      <!-- Title -->

      <div class="form-element form-input <?php echo (!empty($data['event_title_err'])) ? 'form-has-error' : ''; ?>">
        <input class="form-element-field" name="event_title" placeholder="Please fill in your full title" type="input"
           value="<?php echo $data['event_title']; ?>" asd />
        <div class="form-element-bar"></div>
        <label class="form-element-label">Title</label>
        <small class="form-element-hint">Let the title be catchy!</small>
        <small class="form-element-hint"><?php echo $data['event_title_err']; ?></small>
      </div>

      
      <!-- Target Date -->

      <div class="form-element <?php echo (!empty($data['date_err'])) ? 'form-has-error' : ''; ?>">
        <input class="form-element-field" name="date" type="date" value="<?php echo $data['date']; ?>" asd />
        <label class="form-element-label">Event Date</label>
        <small class="form-element-hint"><?php echo $data['date_err']; ?></small>
      </div>

      

      <!-- Details -->

      <div class="form-element form-textarea <?php echo (!empty($data['details_err'])) ? 'form-has-error' : ''; ?>" style="margin-top=">
        <textarea class="form-element-field" name="details" placeholder="Enter the detailed information about your event"
          rows="7"><?php echo $data['details']; ?></textarea>
        <div class="form-element-bar"></div>
        <label class="form-element-label">Details</label>
        <small class="form-element-hint"><?php echo $data['details_err']; ?></small>
      </div>

      <!-- Venue -->

      <div class="form-element form-input <?php echo (!empty($data['venue_err'])) ? 'form-has-error' : ''; ?>">
        <input class="form-element-field" id="venue_url" name="venue" placeholder="Please fill Venue details"
          value="<?php echo $data['venue']; ?>" type="text" asd />
        <div class="form-element-bar"></div>
        <label class="form-element-label">Venue</label>
        <small class="form-element-hint" >Enter the venue according to google maps.</small>

        <small class="form-element-hint"><?php echo $data['venue_err']; ?></small>
      </div>
      <!-- display Map -->

      <div class="resp-container" id="mps">
        <iframe class="resp-iframe" width="560" height="315"  frameborder="1" style="border:0" src="https://www.google.com/maps/embed/v1/place?q=+&key=AIzaSyCLM6xadDFjiTTGw3w_Wg1HSPjOLx1sUwk" allowfullscreen></iframe>
      </iframe>

      
    </fieldset>

    <!-- Form Submit and Reset Button -->

    <div class="form-actions">
      <button class="form-btn" type="submit">Submit</button>
      <button class="form-btn-cancel -nooutline" type="reset">Cancel</button>
    </div>

  </form>
</body>
						
<script src="<?php echo URLROOT; ?>/public/js/form1.js"></script>

</html>