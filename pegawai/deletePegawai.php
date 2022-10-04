<?php
    include '../connect.php';

    $id_pegawai = $_GET['id_pegawai'];

    $sql = 'DELETE FROM pegawai WHERE id_pegawai = "'.$id_pegawai.'"';
    $result = mysqli_query($conn, $sql);

    if ($result){
        header('Location: ../index.php');
    } else{
        echo 'Deleted Failed';
    }

?>