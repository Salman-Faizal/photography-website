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
    <link rel='stylesheet' href='styles/view-photo.css'>

    <!-- js file links -->
    <script defer src="js-files/extra-css.js"></script>

    <title>view-photograph-admin-page-photograpy-malcom-lismore</title>

  </head>
  <body>
    <section>
      <div class="title">
        Photography Details
      </div>
      <div class="table-container">
        <a href="dashboard.html">
          <button class="btn-back">
            <i class="fa fa-arrow-left" aria-hidden="true"></i> Back
          </button>
        </a>
        <table>
          <thead>
            <tr>
              <th>Name</th>
              <th>Date</th>
              <th>Category</th>
              <th>Image</th>
              <th>Description</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody id="photo-table-body">
            <?php
              // Including database connection
              include('php-files/db-connect.php');

              // Query to retrieve records from tbl_photograph table
              $sql = "SELECT * FROM tbl_photographs";
              $result = mysqli_query($con, $sql);

              // Check if records exist
              if (mysqli_num_rows($result) > 0) {
                  // Loop through each row and generate HTML table rows dynamically
                  while ($row = mysqli_fetch_assoc($result)) {
                      echo "<tr>";
                      echo "<td>" . $row['img_name'] . "</td>";
                      echo "<td>" . $row['date_taken'] . "</td>";
                      echo "<td>" . $row['img_cat'] . "</td>";
                      echo "<td><img class='img-display' src='db-images/" . $row['img_path'] . "' alt='img'></td>";
                      echo "<td>" . $row['img_desc'] . "</td>";
                      echo "<td>";
                      echo "<div>";
                      echo "<a href='update-photo.php?id=" . $row['img_id'] . "'><button class='btn-edit'>Edit</button></a>";
                      echo "<a href='delete-photo.php?id=" . $row['img_id'] . "'><button class='btn-delete'>Delete</button></a>";
                      echo "</div>";
                      echo "</td>";
                      echo "</tr>";
                  }
              } else {
                  // No records found
                  echo "<tr><td colspan='6'>No records found</td></tr>";
              }
            ?>
          </tbody>
        </table>
      </div>
    </section>
  </body>
</html>
