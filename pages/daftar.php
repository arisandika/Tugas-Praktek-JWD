<?php
include_once "../connect.php";

$query = "SELECT * FROM tb_beasiswa";
$tampil_beasiswa = mysqli_query($db, $query);

$query = "SELECT * FROM tb_mhs";
$tampil_mhs = mysqli_query($db, $query);

$data_mhs = mysqli_fetch_assoc($tampil_mhs);
$ipk_mhs = $data_mhs['ipk_mhs'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../style.css">
  <title>Daftar</title>
</head>

<body>
  <nav class="nav sticky bg-primary">
    <a href="../index.php" class="px-4 py-3">Pilihan
      Beasiswa</a>
    <a href="daftar.php" class="px-4 py-3">Daftar</a>
    <a href="./hasil.php" class="px-4 py-3">Hasil</a>
  </nav>
  <div class="px-56 pb-20 pt-10">
    <form method="POST" action="../proses/process_form.php" enctype="multipart/form-data">
      <h2 class="text-base font-semibold text-gray-900">Personal Informasi</h2>
      <p class="mt-1 text-sm text-gray-600">Silahkan registrasi terlebih dahulu.</p>
      <div class="mt-10 grid gap-x-6 gap-y-8 grid-cols-6">
        <div class="col-span-full">
          <label for="nama" class="block text-sm font-medium text-gray-900">Nama Lengkap</label>
          <div class="mt-4">
            <input type="text" name="nama" id="nama" required
              class="block w-full rounded-md border py-1.5 text-gray-900 shadow-sm bg-white px-2">
          </div>
        </div>
        <div class="col-span-full">
          <label for="email" class="block text-sm font-medium text-gray-900">Email Address</label>
          <div class="mt-4">
            <input id="email" name="email" type="email" autocomplete="email" required
              class="block w-full rounded-md border py-1.5 text-gray-900 shadow-sm bg-white px-2">
          </div>
        </div>
        <div class="col-span-2">
          <label for="phone" class="block text-sm font-medium text-gray-900">Nomor Telepon</label>
          <div class="mt-4">
            <input type="number" name="phone" id="phone" required
              class="block w-full rounded-md border py-1.5 text-gray-900 shadow-sm bg-white px-2"
              placeholder="Cth: 088220203030">
          </div>
        </div>
        <div class="col-span-2">
          <label for="semester" class="block text-sm font-medium text-gray-900">Semester saat ini</label>
          <div class="mt-4">
            <select id="semester" name="semester" required
              class="block w-full rounded-md border py-2 text-gray-900 shadow-sm bg-white px-2">
              <option disabled selected>Pilih semester</option>
              <option>1</option>
              <option>2</option>
              <option>3</option>
              <option>4</option>
              <option>5</option>
              <option>6</option>
              <option>7</option>
              <option>8</option>
            </select>
          </div>
        </div>
        <div class="col-span-2">
          <label for="ipk" class="block text-sm font-medium text-gray-900">IPK terakhir</label>
          <div class="mt-4">
            <input type="number" name="ipk" id="ipk" value="<?php echo $ipk_mhs; ?>" disabled
              class="block w-full rounded-md border py-1.5 text-gray-900 shadow-sm bg-white px-2">
          </div>
        </div>
        <div class="col-span-full">
          <label for="beasiswa" class="block text-sm font-medium text-gray-900">Pilihan Beasiswa</label>
          <div class="mt-4">
            <?php if ($ipk_mhs >= 3.0) { ?>
              <select id="beasiswa" name="beasiswa" required
                class="block w-full rounded-md border py-2 text-gray-900 shadow-sm bg-white px-2">
                <option disabled selected>Pilih beasiswa</option>
                <?php
                while ($data = mysqli_fetch_assoc($tampil_beasiswa)) {
                  echo "<option value='" . $data['nama_beasiswa'] . "'>" . $data['nama_beasiswa'] . "</option>";
                }
                ?>
              </select>
            <?php } else { ?>
              <input type="text" class="block w-full rounded-md border py-2 text-gray-900 bg-gray-200 px-2"
                value="Tidak memenuhi syarat IPK untuk beasiswa">
            <?php } ?>
          </div>
        </div>
        <div class="col-span-4">
          <label for="beasiswa" class="block text-sm font-medium text-gray-900">Upload berkas file</label>
          <div class="mt-4">
            <input type="file" id="file" name="uploaded_file">
          </div>
        </div>
      </div>
      <div class="mt-10 flex items-center justify-end gap-x-2">
        <?php if ($ipk_mhs >= 3.0) { ?>
          <button type="submit" class="btn btn-primary">Daftar</button>
          <a href="../index.php" role="button" class="btn btn-outline btn-primary">Cancel</a>
        <?php } else { ?>
          <button type="button" class="btn" disabled="disabled">Daftar</button>
          <button type="button" class="btn" disabled="disabled">Cancel</button>
        <?php } ?>
      </div>
    </form>
  </div>

  <script src="../script.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/daisyui@3.5.1/dist/full.css" rel="stylesheet" type="text/css" />
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.tailwindcss.com"></script>
</body>

</html>