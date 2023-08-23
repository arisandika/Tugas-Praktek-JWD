<?php
include_once "../connect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nama = mysqli_real_escape_string($db, $_POST["nama"]);
  $email = mysqli_real_escape_string($db, $_POST["email"]);
  $phone = mysqli_real_escape_string($db, $_POST["phone"]);
  $semester = mysqli_real_escape_string($db, $_POST["semester"]);
  $beasiswa = $_POST['beasiswa'];

  $ipk_query = "SELECT ipk_mhs FROM tb_mhs WHERE nama_mhs = '$nama'";
  $ipk_result = mysqli_query($db, $ipk_query);

  if ($ipk_result && mysqli_num_rows($ipk_result) > 0) {
    $ipk_row = mysqli_fetch_assoc($ipk_result);
    $ipk = $ipk_row['ipk_mhs'];

    $file_upload_path = '../uploads/';
    $uploaded_file_path = $file_upload_path . $_FILES['uploaded_file']['name'];

    if (move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $uploaded_file_path)) {
      $insert_query = "INSERT INTO tb_daftar (nama, email, phone, semester, beasiswa, ipk, file_path) 
                       VALUES ('$nama', '$email', '$phone', '$semester', '$beasiswa', '$ipk', '$uploaded_file_path')";

      if (mysqli_query($db, $insert_query)) {
        echo "Data inserted successfully.";
        header("Location: ../pages/hasil.php");
        exit();
      } else {
        echo "Error inserting data: " . mysqli_error($db);
      }
    } else {
      echo "Error uploading file.";
    }
  }
}
?>