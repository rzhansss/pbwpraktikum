<?php
    include '../connect.php';

    $id_jabatan = $_POST['id_jabatan'];
    $jabatan = $_POST['jabatan'];

    if(empty($id_jabatan)){
    $sql = 'INSERT INTO jabatan VALUE ("", "'.$jabatan.'")';
    } else{
        $sql = 'UPDATE jabatan SET jabatan="'.$jabatan.'" WHERE id_jabatan="'.$id_jabatan.'"';
    }

    $result = mysqli_query($conn, $sql);

    if ($result) {
        header('Location: jabatan.php');
    } else {
        if (empty($id_jabatan)){
        echo 'Inserted Failed.';
    } else {
        echo 'Updated Failed';
    }}
