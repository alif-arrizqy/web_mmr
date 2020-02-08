<?php
	$koneksi = mysqli_connect('localhost','root','','db_summary');

	if(mysqli_connect_errno())
	{
		echo "not connection to database : ".mysqli_connect_error();
	}

?>