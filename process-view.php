<?php
header('Content-Type: text/event-stream');
header('Cache-Control: no-cache');
include 'FileProc.php';
$file = (isset($_GET['filename']))?$_GET['filename'] : 'process_run'; 
$filename = "$file.loadingbar";
$x = true;

if(!FileProc::exists($filename)){
	echo "data: 100\n\n";
	ob_flush();
	flush();
	$x = false;
}
$last = 0;
while($x) {
	if(FileProc::exists($filename)){
		$x  = false;
	}
	$cur = FileProc::get($filename);
	if($cur != $last){
	    echo 'data: ' . $cur . "\n\n";
	    $last = $cur;
	    ob_flush();
	    flush();                
	}
	sleep(1);
}