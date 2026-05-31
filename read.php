<?php 
include 'koneksi.php';

//query untuk mengambil data
$query = "SELECT * FROM users";
$result = $conn->query($query); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CRUD PHP</title>
</head>
<body>
  <H1>Data Users</H1>
  <a href="create.php">Tambah Data</a>
  <table border="1" cellpadding="10" cellspacing="0">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Password</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php 
      if ($result->num_rows > 0)  {
        $no = 1;
        while ($row = $result->fetch_assoc()) {
          echo "<tr>
          <td>{$no}</td>
          <td>{$row['name']}</td>
          <td>{$row['email']}</td>
          <td>{$row['password']}</td>
          <td>
          <a href='update.php?id={$row['id']}'>Edit</a>
          <a href='hapus.php?id={$row['id']}'>Hapus</a>
          </td>
          </tr>";
          $no++; 
        }
      } else {
        echo "<tr><td colspan='5'>Tidak ada data</td></tr>";
      }
      ?>
    </tbody>
  </table>
</body>
</html>