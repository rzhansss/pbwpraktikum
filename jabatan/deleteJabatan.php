<?php
    include '../connect.php';

    $id_jabatan = $_GET['id_jabatan'];

    $sql = 'DELETE FROM jabatan WHERE id_jabatan = "'.$id_jabatan.'"';
    $result = mysqli_query($conn, $sql);

    if ($result){
        header('Location:jabatan.php');
    } else{
        echo 'Deleted Failed';
    }

?>