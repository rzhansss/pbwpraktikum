<?php 
include '../connect.php';
$username = $_POST['username'];
$password = md5($_POST['password']);

$sql = 'SELECT * FROM pengguna WHERE username ="'.$username.'" AND password = "'.$password.'"';
$query = mysqli_query($conn, $sql);

if (mysqli_num_rows($query)) { // mendapatkan jumlah baris dr querynya
    $row = mysqli_fetch_object($query);
    $_SESSION['username'] = $row->username;

    header('Location: ../index.php');
} else{
    echo 'pengguna tidak terdaftar';
}
 
?>
