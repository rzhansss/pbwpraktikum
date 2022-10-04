<?php include '../connect.php'; ?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SIMPEG | Pegawai</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>

<body>
  <nav class="navbar navbar-expand-lg bg-warning">
    <div class="container-fluid container">
      <a class="navbar-brand">SIMPEG</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="/PBWPRAKTIKUM">Pegawai</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="/PBWPRAKTIKUM/jabatan/jabatan.php">Jabatan</a>
          </li>
        </ul>
        <?php if (empty($_SESSION['username'])){ ?>
             <a href="formLogin.php" class="btn btn-light"> Login </a>
            <?php } else { ?>

           <a href="logout.php" class="btn btn-danger">Logout</a>
           <?php } ?>
      </div>
    </div>
  </nav>
  <div class="container mt-2">
    <h1>Jabatan</h1>
    <?php if (!empty($_SESSION['username'])) { ?>
      <a href="formJabatan.php" class="btn btn-sm btn-info mb-3">Tambah</a>
    <?php } ?>
    <table class="table mt-3">
      <thead class="table-warning text-center">
        <tr>
          <th>ID Jabatan</th>
          <th>Jabatan</th>
          <?php if (!empty($_SESSION['username'])) { ?>
          <th>Aksi</th>
          <?php } ?>
        </tr>
      </thead>
      <tbody>
        <?php
        $sql = 'SELECT * FROM jabatan';
        $query = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_object($query)) {
        ?>
          <tr class="text-center">
            <td><?php echo $row->id_jabatan; ?> </td>
            <td><?php echo $row->jabatan; ?> </td>
            <?php if (!empty($_SESSION['username'])) { ?>
            <td>
              <a href="formJabatan.php?id_jabatan=<?php echo $row->id_jabatan; ?>" class="btn btn-sm btn-warning" onclick="">Edit</a>
              <a href="deleteJabatan.php?id_jabatan= <?php echo $row->id_jabatan; ?>" class="btn btn-sm btn-danger " onclick="return confirm ('Apakah anda yakin menghapus data?');">Hapus</a>
              <?php } ?>
            </td>
          </tr>
        <?php
        }
        if (mysqli_num_rows($query) == 0) {
          echo '<tr><td coslpan="5" class="text-center">tidak ada data.</td></tr>';
        }
        ?>



      </tbody>
    </table>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>
</body>

</html>