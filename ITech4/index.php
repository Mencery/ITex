<?php 
	$filename = 'counter.txt';
	$file = fopen($filename ,'r');
	$contents = fread($file,filesize($filename ));

	
		$amount = (int)$contents;
		$amount+=1;
		echo "Вы вошли ";
		echo $amount;
		echo ' раз';
		$filew=fopen($filename,'w');
		fwrite($filew,$amount);
		fclose($filew);
	
	
	fclose($file);
?>