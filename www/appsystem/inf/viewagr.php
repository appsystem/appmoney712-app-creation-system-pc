<?php session_start();     
if($_GET[pj] and !preg_match('/^[0-9]*$/',$_GET[pj]))exit;
if($_GET[pj])$pj = $_GET[pj];


	
	if(file_exists('../panel/'.$pj.'/agree.html')){
		$webhtml = file_get_contents('../panel/'.$pj.'/agree.html');
		$webhtml = str_replace('url(images/','url(../panel/'.$pj.'/images/',$webhtml);
		$webhtml = str_replace('css/','../css/',$webhtml);
		//$webhtml = str_replace('../css/images/','css/images/',$webhtml);
		$webhtml = str_replace('js/agree.js','../panel/'.$pj.'/agree.js',$webhtml);

		echo $webhtml;
		
	;}

?>
	