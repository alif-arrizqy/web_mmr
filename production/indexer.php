<?php
	// include "./save_xml.php";

	function indexer() {
		// scan nama file korpus
		$dir_corpus = "./corpus";
		$files 		= scandir($dir_corpus);
		$files 		= array_slice($files, 2);
		$N			= sizeof($files); // total dokumen
		
		// load daftar stopwords
		$stopwords	= file_get_contents("./stopwords.txt");
		$stopwords	= preg_split("/[\s]+/", $stopwords);
		
		// inisialisasi
		$all_token	= array();
		$freq_token	= array();
		$df_token	= array();
		$inv_index	= array();

		// load isi file korpus
		foreach ($files as $key => $filename) {
			$load_file = file_get_contents("./corpus/".$filename);
			
			// tokenisasi dengan membuang stopwords
			$token = preg_split("/[\d\W\s]+/", strtolower($load_file));
			$token = array_diff($token, $stopwords);		
			$token = array_values($token); // perbaiki indeks

			// menyimpan nilai df tiap token
			$token = array_count_values($token); // hilangkan redudansi token
			foreach ($token as $key => $value) {
				// jika token sudah ada
				if (array_key_exists($key, $df_token)) 
					$df_token[$key]++;
				
				// jika token belum ada
				else if (!isset($df_token[$key]))
					$df_token[$key] = 1;
			}
		}	

		// membuat array inverted index
		foreach ($df_token as $key => $value) { 
			$df	= $value;
			$inv_index[$key] 		= array();
			$inv_index[$key]['idf']	= log10($N/$df); // simpan nilai idf
		}
		//print_r($inv_index);
		//save_xml();
		return $inv_index;
	}