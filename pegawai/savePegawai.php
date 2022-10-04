<?php
    include '../connect.php';

    $id_pegawai = $_POST['id_pegawai'];
    $nama = $_POST['nama'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $alamat = $_POST['alamat'];
    $id_jabatan = $_POST['id_jabatan'];


    if(empty($id_pegawai)){
    $sql = 'INSERT INTO pegawai VALUE (null, "'.$nama.'", "'.$jenis_kelamin.'", "'.$tanggal_lahir.'", 
        "'.$alamat.'", "'.$id_jabatan.'")';
    } else {
        $sql = 'UPDATE pegawai SET nama="'.$nama.'", jenis_kelamin="'.$jenis_kelamin.'", tanggal_lahir="'.$tanggal_lahir.'", alamat="'.$alamat.'", id_jabatan="'.$id_jabatan.'" WHERE id_pegawai="'.$id_pegawai.'"';
    }

    $result = mysqli_query($conn, $sql);

    if ($result) {
        header('Location: ../index.php');
    } else {
        if (empty($id_pegawai)){
        echo 'Inserted Failed.';
    } else {
        echo 'Updated Failed.';
    }}
