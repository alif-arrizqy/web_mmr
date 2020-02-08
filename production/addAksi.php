<?php
	include 'koneksi.php';

	$title 		= $_POST['title'];
	//untuk nama file .txt
	$namafile	= trim($_POST['namafile']);
	$filename	= "$namafile.txt"; 
	$content 	= trim($_POST['content']);
	// $file 		= fopen($filename,"w");
	$dir 		= "corpus";

	//menyimpan ke database
	mysqli_query($koneksi, "insert into tb_summary values('','$filename','$title','$content')");

	if(is_dir($dir) === false)
	{
		mkdir($dir);
	}
	$file = fopen($dir.'/'.$filename,"w");
	//menyimpan file ke dalam .txt
	fwrite($file, $content);
	fclose($file);
	//kembali ke data tabel
	header("location:viewtext.php");

?>