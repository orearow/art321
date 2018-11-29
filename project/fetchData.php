<?php

include 'connect.php';

set_time_limit(0);


// outputs the db as lines of text.
	// header('Content-type: text/plain; charset=us-ascii');
	header('Content-Type: text/plain; charset=utf-8');

	$current = "[";
	echo $current;

	$counter = 0;
	
	mysqli_select_db($link, $database)
   		or die("unable to select database 'db': " . msql_error());
   

   $story = $_GET['story'];

   $tablename = $_GET['tablename'];



	$query = "SELECT unstemmed_word, TF, sentence, title 
		FROM `" . $tablename . "`
		WHERE item_id = '$story' GROUP BY unstemmed_word ORDER BY TF DESC LIMIT 100";
		// SELECT * FROM gibsonjune18.`42482`;

	// $query = "SELECT *
	// 	FROM 42482_keywords";
		


	$result = mysqli_query($link,$query); 
	$nrOfRows = mysqli_num_rows($result);
	
	while (($row = mysqli_fetch_row($result)))
	{	
				$array = array("word"=> $row[0], "score"=> $row[1],  "sentence"=> $row[2], "title"=> $row[3]);
							$current = json_encode($array);
				echo $current;
		
				if($counter < $nrOfRows)
				{
					$current = ",";
					echo $current;
				}
				$counter++;
				
		
		//echo $row[0] . "," . $row[1] .  "," . $row[2] . "\n";	
	
	}

// $array = array("word"=> "all", "score"=> "000", "sentence"=> "");
$current = json_encode($array);
echo $current;
				
$current = "]";
echo $current;

//free memory
mysqli_free_result($result);

mysqli_close($link);

?>