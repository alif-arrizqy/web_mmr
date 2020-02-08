<?php
	include "./indexer.php";
		
	function summarize ($filename, $compress) {
		// proses indexing
		$inv_index  = indexer();
	
		// load file dan daftar stopwords
		$load_file  = file_get_contents("./corpus/".$filename);
		$sentence 	= preg_split("/[.]+/", $load_file);
		$sentence 	= array_slice($sentence, 0, sizeof($sentence)-1); // buang array terakhir (kosong)

		$stopwords	= file_get_contents("./stopwords.txt");
		$stopwords	= preg_split("/[\s]+/", $stopwords);

		// jumlah kalimat yang diringkas
		$compression_rate 	= $compress/100; 
		$max_sentence  		= floor(sizeof($sentence)*$compression_rate);

		// inisialisasi
		$sentence_weight = array();

		// menghitung bobot tf.idf tiap kalimat
		foreach ($sentence as $key => $value) {
			// tokenisasi dengan membuang stopwords
			$word = preg_split("/[\d\W\s]+/", strtolower($value));
			$word = array_diff($word, $stopwords);		
			$word = array_values($word); // perbaiki indeks
			
			// inisialisasi bobot dan hitung frekuensi token
			$tf_idf 	= 0;
			$freq_word 	= array_count_values($word);

			// hitung bobot tf.idf
			foreach ($freq_word as $token => $tf) 
				$tf_idf += $tf * $inv_index[$token]['idf'];

			// simpan nilai bobot kalimat
			array_push($sentence_weight, $tf_idf);
		}

		// sorting bobot tertinggi -> potong array -> sorting urutan kalimat
		arsort($sentence_weight);
		$sorted = array_slice($sentence_weight, 0, $max_sentence, true);
		ksort($sorted);
		
		// gabungkan ringkasan
		$summary = "";
		foreach ($sorted as $key => $value)
			$summary = $summary.$sentence[$key].". ";

		// return teks asli dan hasil ringkasan
		$output = array();
		$output['original'] = $load_file;
		$output['summary']  = $summary;

		return $output;
	}