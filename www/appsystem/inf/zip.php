<?php 	
if(file_exists('../website/'.$pj) and $pj){

$zip = new ZipArchive;

if(file_exists('../website/zip/'.$pj)==false)mkdir('../website/zip'.$pj); 
 
$zipname = '../website/zip'.$pj.'/app'.$pj.'.zip';
if($zip->open($zipname, ZipArchive::OVERWRITE) === TRUE){

		function zip($srcdir,$webdir,$zip,$srcdirvlu){ 

    	$dir = opendir($srcdir); 
    	while(false!==( $file = readdir($dir)) ){ 
        if (($file!= '.') && ($file != '..')){ 
            if (is_dir($srcdir.$file)){
				$filepath = str_replace($srcdirvlu,'',$srcdir.$file);
                zip($srcdir.$file.'/',$filepath.'/',$zip,$srcdirvlu); 
            }else{ 
                $zip->addFile($srcdir.$file, $webdir.$file);   	
            } 			
        } 
    	} 
    	closedir($dir); 
		} 
	
		$srcdir = '../website/'.$pj.'/';
		zip($srcdir,'',$zip,$srcdir);
		
 $zip->close();
		
;}			

echo "<meta http-equiv='refresh' content='0;URL=app.php?pj=".htmlspecialchars($pj)."'>";
;}
?>
