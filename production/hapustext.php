<?php
	include 'koneksi.php';

	$id = $_GET['id'];

	mysqli_query($koneksi, "delete from tb_summary where id='$id' ");

	header("location: viewtext.php");
?>