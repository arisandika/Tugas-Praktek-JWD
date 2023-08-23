<?php
include_once "./connect.php";

$query = "SELECT * FROM tb_beasiswa";
$result = $db->query($query);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./style.css">
  <title>Beasiswa</title>
</head>

<body>
  <nav class="nav sticky bg-primary">
    <a href="index.php" class="px-4 py-3">Pilihan
      Beasiswa</a>
    <a href="./pages/daftar.php" class="px-4 py-3">Daftar</a>
    <a href="./pages/hasil.php" class="px-4 py-3">Hasil</a>
  </nav>
  <div class="flex justify-center gap-4 py-8">
    <button id="btnAkademik" class="btn btn-outline btn-secondary">Akademik</button>
    <button id="btnNonAkademik" class="btn btn-outline btn-secondary">Non-Akademik</button>
    <button id="btnAll" class="btn btn-outline btn-secondary">Show All</button>
  </div>
  <section class="px-20 pb-20 flex items-center justify-center">
    <div id="cardContainer" class="grid md:grid-cols-2 gap-10 items-center justify-center">
      <?php while ($row = $result->fetch_assoc()) { ?>
        <div class="cards w-96 bg-white shadow-xl" data-category="<?php echo $row['category']; ?>">
          <div class="card-body">
            <h2 class="card-title">
              <?php echo $row['nama_beasiswa']; ?>
            </h2>
            <p>
              <?php echo $row['desc']; ?>
            </p>
            <div class="card-actions justify-end mt-8">
              <div class="badge badge-secondary badge-outline">
                <?php echo $row['category']; ?>
              </div>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>
  </section>

  <script src="script.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/daisyui@3.5.1/dist/full.css" rel="stylesheet" type="text/css" />
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.tailwindcss.com"></script>
</body>

</html>