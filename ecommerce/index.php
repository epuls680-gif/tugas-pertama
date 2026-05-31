<?php
include '../koneksi.php';

// query ambil data produk"
$sql = "SELECT * FROM products";
$result = $conn->query($sql);

//Ambil kategori yang dipilih
$kategori = isset($_GET['kategori']) ? $_GET['kategori'] : '';

//query produk berdasarkan kategori
if (!empty($kategori)) {

  $query = mysqli_query(
    $conn,
    "SELECT * FROM products WHERE kategori='$kategori'"
  );
} else {

  $query = mysqli_query(
    $conn,
    "SELECT * FROM products"
  );
}

?>

<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Ecommerce PHP MySQL</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    body {
      background-color: #f5f5f5;
    }

    .card {
      transition: 0.3s;
      border: none;
      border-radius: 15px;
    }

    .card:hover {
      transform: translateY(-5px);
      box-shadow: 0 5px 20px rgba(0, 0, 0, 0.2);
    }

    .card img {
      height: 200px;
      object-fit: cover;
      border-radius: 15px 15px 0 0;
    }

    .harga {
      color: #0d6efd;
      font-weight: bold;
      font-size: 20px;
    }

    .navbar {
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }
  </style>
</head>

<body>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
      <a class="navbar-brand fw-bold" href="#">
        EcommerceKu
      </a>
    </div>
  </nav>

    <h2 class="text-center mb-2 mt-3 fw-bold">
      Daftar Produk
    </h2>

  <!-- Produk -->
  <div class="container py-5">

    <!-- filter produk -->
    <form method="GET" class="mb-4">

      <div class="row">

        <div class="col-md-4">

          <select name="kategori" class="form-select">

            <option value="">Semua Kategori</option>

            <option value="input"
              <?= ($kategori == 'input') ? 'selected' : '' ?>>
              input
            </option>

            <option value="output"
              <?= ($kategori == 'ouput') ? 'selected' : '' ?>>
              output
            </option>

            <option value="Aksesoris"
              <?= ($kategori == 'Aksesoris') ? 'selected' : '' ?>>
              Aksesoris
            </option>

          </select>

        </div>

        <div class="col-md-2">

          <button type="submit" class="btn btn-primary">
            Filter
          </button>

        </div>

      </div>

    </form>
    
    <!-- daftar produk -->

    <div class="row g-4">

      <?php while ($row = mysqli_fetch_assoc($query)) : ?>

        <div class="col-md-3">

          <div class="card h-100">

            <img src="<?= htmlspecialchars($row['gambar']); ?>" class="card-img-top">

            <div class="card-body d-flex flex-column">

              <h5 class="card-title">
                <?= htmlspecialchars($row['nama_produk']); ?>
              </h5>

              <p class="card-text text-muted">
                <?= htmlspecialchars($row['deskripsi']); ?>
              </p>

              <p class="harga">
                Rp <?= htmlspecialchars(number_format($row['harga'], 0, ',', '.')); ?>
              </p>

              <button class="btn btn-primary mt-auto">
                Beli Sekarang
              </button>

            </div>

          </div>

        </div>

      <?php endwhile; ?>

    </div>

  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>