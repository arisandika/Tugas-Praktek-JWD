<?php
include_once "../connect.php";

$query = "SELECT * FROM tb_daftar";
$result = $db->query($query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../style.css">
  <title>Beasiswa</title>
</head>

<body>
  <nav class="nav sticky bg-primary">
    <a href="../index.php" class="px-4 py-3">Pilihan
      Beasiswa</a>
    <a href="./daftar.php" class="px-4 py-3">Daftar</a>
    <a href="./hasil.php" class="px-4 py-3">Hasil</a>
  </nav>
  <h3 class="flex justify-center gap-4 pt-8 font-semibold">
    Hasil Pendaftaran
  </h3>
  <section class="pb-20">
    <div class="bg-white h-[80vh] p-8">
      <table class="table-auto mt-4 text-xs">
        <thead>
          <tr>
            <th class="px-4 py-2">Nama</th>
            <th class="px-4 py-2">Email</th>
            <th class="px-4 py-2">No. Telepon</th>
            <th class="px-4 py-2">Semester</th>
            <th class="px-4 py-2">Beasiswa</th>
            <th class="px-4 py-2">IPK</th>
            <th class="px-4 py-2">Status ajuan</th>
            <th class="px-4 py-2">Berkas syarat</th>
          </tr>
        </thead>
        <tbody>
          <?php
          while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td class='px-4 py-2'>" . $row['nama'] . "</td>";
            echo "<td class='px-4 py-2'>" . $row['email'] . "</td>";
            echo "<td class='px-4 py-2'>" . $row['phone'] . "</td>";
            echo "<td class='px-4 py-2'>" . $row['semester'] . "</td>";
            echo "<td class='px-4 py-2'>" . $row['beasiswa'] . "</td>";
            echo "<td class='px-4 py-2'>" . $row['ipk'] . "</td>";
            echo "<td class='px-4 py-2'>" . ($row['status_ajuan'] ? $row['status_ajuan'] : 'Belum di verifikasi') . "</td>";
            echo "<td class='px-4 py-2'>" . $row['file_path'] . "</td>";
            echo "</tr>";
          }
          ?>
        </tbody>
      </table>
    </div>
  </section>

  <script src="../script.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/daisyui@3.5.1/dist/full.css" rel="stylesheet" type="text/css" />
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.tailwindcss.com"></script>
</body>

</html>