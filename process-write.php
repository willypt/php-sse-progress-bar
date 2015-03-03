<?php

include 'FileProc.php';
set_time_limit(0); //this is important!
$file = (isset($_GET['filename']))?$_GET['filename'] : 'process_run'; 
$filename = "$file.loadingbar";
if(!FileProc::exists($filename)){
	//You can modify the logic for printing the values
	FileProc::put($filename, "0");
	$x = 0;
	while($x < 100){
		FileProc::put($filename, $x);
		$x++;
		sleep(1);
	}
	FileProc::put($filename, "100");
	FileProc::delete($filename);
	echo "Process done, please close this window";
}