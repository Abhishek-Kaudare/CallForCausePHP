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
  <form class="form-card" action="<?php echo URLROOT; ?>/petitions/new_petition" method="POST">
    <fieldset class="form-fieldset">
      <legend class="form-legend">Petition Form</legend>

      <!-- Title -->

      <div class="form-element form-input <?php echo (!empty($data['title_err'])) ? 'form-has-error' : ''; ?>">
        <input class="form-element-field" name="title" placeholder="Please fill in your full title" type="input"
           value="<?php echo $data['title']; ?>" required />
        <div class="form-element-bar"></div>
        <label class="form-element-label">Title</label>
        <small class="form-element-hint">Let the title be catchy!</small>
        <small class="form-element-hint"><?php echo $data['title_err']; ?></small>
      </div>

      <!-- Target Authority -->

      <div class="form-element form-input <?php echo (!empty($data['target_authority_err'])) ? 'form-has-error' : ''; ?>">
        <input class="form-element-field" name="target_authority" placeholder="Please fill in the Targeted Authority"
          type="input" value="<?php echo $data['target_authority']; ?>" required />
        <div class="form-element-bar"></div>
        <label class="form-element-label">Targeted Authority</label>
        <small class="form-element-hint">Enter ',' separated names.</small>
        <small class="form-element-hint"><?php echo $data['target_authority_err']; ?></small>
      </div>

      <!-- Target Date -->

      <div class="form-element <?php echo (!empty($data['target_date_err'])) ? 'form-has-error' : ''; ?>">
        <input class="form-element-field" name="target_date" type="date" value="<?php echo $data['target_date']; ?>" required />
        <label class="form-element-label">Targeted Date</label>
        <small class="form-element-hint"><?php echo $data['target_date_err']; ?></small>
      </div>

      <!-- Targeted Votes -->

      <div class="form-element <?php echo (!empty($data['target_votes_err'])) ? 'form-has-error' : ''; ?>">
        <input class="form-element-field" name="target_votes" placeholder="How many votes will fulfill the cause" type="number"
          value="<?php echo $data['target_votes']; ?>" required />
        <div class="form-element-bar"></div>
        <label class="form-element-label">Targeted Votes</label>
        <small class="form-element-hint">Let the number of votes be enough to fulfill the cause as every minute of
          voter is important.</small>
          <small class="form-element-hint"><?php echo $data['target_votes_err']; ?></small>
      </div>

      <!-- Details -->

      <div class="form-element form-textarea <?php echo (!empty($data['description_err'])) ? 'form-has-error' : ''; ?>" style="margin-top=">
        <textarea class="form-element-field" name="description" placeholder="Enter the detailed information about your petition"
          rows="7"><?php echo $data['description']; ?></textarea>
        <div class="form-element-bar"></div>
        <label class="form-element-label">Details</label>
        <small class="form-element-hint"><?php echo $data['description_err']; ?></small>
      </div>

      <!-- Category -->

      <div class="form-element form-select <?php echo (!empty($data['category_id_err'])) ? 'form-has-error' : ''; ?>">
        <select class="form-element-field" name="category_id" required>
          <?php echo $data['dropdown'] ?>
        </select>
        <div class="form-element-bar"></div>
        <label class="form-element-label">Select Category</label>
        <small class="form-element-hint"><?php echo $data['category_id_err']; ?></small>
      </div>

      <!--Upload Images  -->

      <div class="form-element <?php echo (!empty($data['images_err'])) ? 'form-has-error' : ''; ?>">
        <input class="form-element-field" name="images"  type="file"
          required />
        <label class="form-element-label">Upload Images</label>
        <small class="form-element-hint"><?php echo $data['images_err']; ?></small>
      </div>

      <!-- Youtube Video -->

      <div class="form-element form-input <?php echo (!empty($data['youtube_url_err'])) ? 'form-has-error' : ''; ?>">
        <input class="form-element-field" id="video_url" name="youtube_url" placeholder="Please fill URL of YouTube Video"
          value="<?php echo $data['youtube_url']; ?>" type="url" required />
        <div class="form-element-bar"></div>
        <label class="form-element-label">Youtube Video Link</label>
        <small class="form-element-hint" >Enter URL of Youtube Video you want to Upload.</small>

        <small class="form-element-hint"><?php echo $data['youtube_url_err']; ?></small>
      </div>

      <!-- Video Thumbnail display -->

      <img id="video_thumb">
    </fieldset>

    <!-- Form Submit and Reset Button -->

    <div class="form-actions">
      <button class="form-btn" type="submit">Submit</button>
      <button class="form-btn-cancel -nooutline" type="reset">Cancel</button>
    </div>

  </form>
</body>
						
<script src="<?php echo URLROOT; ?>/public/js/form.js"></script>

</html>