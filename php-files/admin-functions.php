<?php
  include('db-connect.php');

  // code for adding a photography to the database
	if (isset($_POST['btn-add'])) {
		
		$name = mysqli_real_escape_string($con, $_POST['name']);
    $date = $_POST['date'];
		$cat = mysqli_real_escape_string($con, $_POST['category']);
		$des = mysqli_real_escape_string($con, $_POST['description']);

		// Image upload
    $file_name = $_FILES['img-file']['name'];
    $tmp_name = $_FILES['img-file']['tmp_name'];
    $folder = '../db-images/'.$file_name;

		$sql = "INSERT INTO tbl_photographs (img_name, date_taken, img_cat, img_path, img_desc) VALUE ('$name', '$date', '$cat', '$file_name', '$des')";

		$run = mysqli_query($con, $sql);

		if ($run) {
			move_uploaded_file($_FILES['img-file']['tmp_name'], $folder);
			header("Location: ../view-photo.php");
		}
		else{
			echo "Photography failed to upload!";
		}
  }


  //code for updating photography details
  if (isset($_POST['btn-update'])) {
		
		$id = mysqli_real_escape_string($con, $_POST['id']);
		$name = mysqli_real_escape_string($con, $_POST['name']);
		$date = $_POST['date'];
		$cat = mysqli_real_escape_string($con, $_POST['category']);
		$des = mysqli_real_escape_string($con, $_POST['description']);

		$file_name = $_FILES['img-file']['name'];
		$tmp_name = $_FILES['img-file']['tmp_name'];
		$folder = '../db-images/'.$file_name;

		$sql = "UPDATE tbl_photographs SET img_name ='$name', img_cat = '$cat', img_path = '$file_name ', img_desc = '$des'  WHERE img_id = '$id'";

		$run = mysqli_query($con, $sql);

		if ($run) {
				move_uploaded_file($_FILES['img-file']['tmp_name'], $folder);
				header("Location: ../view-photo.php");
		}
		else{
			echo "Failed to update details!";
			header("Location: ../dashboard.html");
		}
	}

  //code for deleting a photography from the databse
  if (isset($_POST['btn-delete'])) {
    $_id = mysqli_real_escape_string($con, $_POST['id']);

    $sql = "DELETE FROM tbl_photographs WHERE img_id = '$_id'";

    $run = mysqli_query($con, $sql);

    if ($run) {
      header("Location: ../view-photo.php");
    }else{
      echo "Failed to delete photography!";
      header("Location: ../dashboard.html");
    }
  }
?>