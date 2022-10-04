<?php include '../connect.php';

$act = 'add';

if (!empty($_GET['id_pegawai'])) {

    $sql = 'SELECT * FROM pegawai WHERE id_pegawai="' . $_GET['id_pegawai'] . '"';
    $query = mysqli_query($conn, $sql);

    if (mysqli_num_rows($query)) {
        $act = 'edit';
        $row = mysqli_fetch_object($query);
    }
}

?>


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
                        <a class="nav-link active" aria-current="page" href="/PBWPRAKTIKUM">Pegawai</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/PBWPRAKTIKUM/jabatan/jabatan.php">Jabatan</a>
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

        <h1 class="mt-3 mb-3 ">Form Pegawai</h1>
        <form action="savePegawai.php" method="POST">
            <div class="mb-3">
                <label class="form-label">Nama</label>
                <input type="text" class="form-control" name="nama" placeholder="Nama" value="<?php if ($act == 'edit') echo $row->nama; ?>" required>
                <input type="hidden" name="id_pegawai" value="<?php if ($act == 'edit') echo $row->id_pegawai; ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Jenis Kelamin</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="jenis_kelamin" value="Pria" id="pria" checked>
                    <label class="form-check-label" for="pria">
                        Pria
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="jenis_kelamin" value="Wanita" id="wanita" <?php if ($act == 'edit' && $row->jenis_kelamin == 'Wanita') echo 'checked'; ?>>
                    <label class="form-check-label" for="wanita">
                        Wanita
                    </label>
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">Tanggal Lahir</label>
                <input type="date" class="form-control" name="tanggal_lahir" placeholder="Tanggal Lahir" value="<?php if ($act == 'edit') echo $row->tanggal_lahir; ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Alamat</label>
                <textarea class="form-control" name="alamat" rows="3" required><?php if ($act == 'edit') echo $row->alamat; ?></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Jabatan</label>
                <select class="form-control" name="id_jabatan" required>

                    <?php
                    $sql = 'SELECT * FROM jabatan';

                    $query = mysqli_query($conn, $sql);

                    while ($rows = mysqli_fetch_object($query)) {
                    ?>

                        <option value="<?php echo $rows->id_jabatan; ?>" <?php if ($act == 'edit' && $row->id_jabatan == $rows->id_jabatan) echo 'selected' ?>><?php echo $rows->jabatan; ?></option>

                    <?php } ?>

                </select>
            </div>
            <div class="mb-3">
                <input type="submit" value="Simpan" class="btn btn-sm btn-success">
            </div>
    </div>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>
</body>