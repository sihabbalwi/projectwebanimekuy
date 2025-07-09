<?php include '../koneksi/koneksi.php';
$id=$_GET['id'];
mysqli_query($conn,"DELETE FROM tb_anime WHERE id_anime=$id");
header('Location: index.php');
?>
