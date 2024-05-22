<!DOCTYPE html>
<html>
  <head>
    <!-- meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Welcome to Malcolm Lismore Photography! Explore stunning landscapes, captivating wildlife, and memorable moments captured by a passionate photographer based on the North West coast of Scotland.">

    <!-- font awesome links -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

    <!-- google font links -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@300;400;700;900&family=Roboto:wght@100;300;400;500;700&display=swap" rel="stylesheet">
    
    <!-- CSS style sheets -->
    <link rel="stylesheet" href="styles/general.css">
    <link rel='stylesheet' href='styles/update-photo.css'>

    <!-- Js links -->
    <script defer src="js-files/clear-btn.js"></script>

    <title>update-photograph-admin-page-photograpy-malcom-lismore</title>

  </head>
  <body>
    <?php
      include('php-files/db-connect.php');

      if (isset($_GET['id'])) {
        $test_id = mysqli_real_escape_string($con, $_GET['id']);

        $sql = "SELECT * FROM tbl_photographs  WHERE img_id = '$test_id'";

        $run = mysqli_query($con, $sql);

        if (mysqli_num_rows($run) > 0) {
          $data = mysqli_fetch_assoc($run); // Fetching the data and assign it to $data {
        } else {
          // Handling case where no data is found
          $data = array(); // Initializing $data as an empty array
        }
      } else {
          // Handlling case where $_GET['id'] is not set
          $data = array(); // Initializing $data as an empty array
      }
    ?>


    <section>
      <div class="title">
        Update Photography
      </div>
      <div class="form-container">
        <a href="dashboard.html">
          <button class="btn-back">
            <i class="fa fa-arrow-left" aria-hidden="true"></i> Back
          </button>
        </a>
        <form class="form" action="php-files/admin-functions.php" method="POST" enctype="multipart/form-data">
          <input type="hidden" name="id" value="<?php echo $test_id; ?>"> <!-- Hidden input field used to pass the ID -->
          <div>
            <label for="name">Photography Name</label>
            <input type="text" id="name" name="name" placeholder="Enter photography name" required value="<?php echo $data['img_name']; ?>">
          </div>
          <div>
            <label for="date">Date</label>
            <input type="date" name="date" id="date" value="<?php echo $data['date_taken']; ?>">
          </div>
          <div>
            <label for="categroy">Photography Category</label>
            <select id="category" name="category">
              <option value="Nature" <?php if($data['img_cat'] == 'Nature') echo 'selected'; ?>>Nature</option>
              <option value="Wildlife" <?php if($data['img_cat'] == 'Wildlife') echo 'selected'; ?>>Wildlife</option>
              <option value="Event" <?php if($data['img_cat'] == 'Event') echo 'selected'; ?>>Event</option>
              <option value="Portrait" <?php if($data['img_cat'] == 'Portrait') echo 'selected'; ?>>Portrait</option>
              <option value="Micro" <?php if($data['img_cat'] == 'Micro') echo 'selected'; ?>>Micro</option>
            </select>
          </div>
          <div class="img-display">
            <label>Available Image</label>
            <img alt="img" src="db-images/<?php echo $data['img_path']; ?>">
          </div>
          <div>
            <label for="img-file">Select Image</label>
            <input type="file" id="img-file" name="img-file" accept="image/jpeg, image/png, image/webp" required>
          </div>
          <div>
            <label for="file-name">Image Location</label>
            <input type="text" value="<?php echo 'db-images/' . $data['img_path']; ?>" readonly>
          </div>
          <div>
            <label for="description">Description</label>
            <input type="text" id="description" name="description" placeholder="Describe the photography" value="<?php echo $data['img_desc']; ?>">
          </div>

          <div class="btn-section">
            <button type="button" class="btn-reset">
              Clear
            </button>
            <button type="submit" class="btn-update" name="btn-update">
              Update
            </button>
          </div>
        </form>
      </div>
    </section>
  </body>
</html>
