<?php
	include 'koneksi.php';

	$id 		= $_POST['id'];
	$title 		= $_POST['title'];
	//untuk nama file .txt
	$namafile	= trim($_POST['namafile']);
	$filename	= "$namafile.txt"; 
	$content 	= trim($_POST['content']);
	// $file 		= fopen($filename,"w");
	$dir 		= "corpus";

	//menyimpan ke database
	mysqli_query($koneksi, "update tb_summary set namafile='$filename', title='$title', content='$content' where id='$id' ");

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