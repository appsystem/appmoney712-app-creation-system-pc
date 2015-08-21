<?php session_start();       
error_reporting(0); 

if($_GET[pj] and !preg_match('/^[0-9]*$/',$_GET[pj]))exit;
if($_GET[pj])$pj = $_GET[pj];
if($_GET[ap] and !preg_match('/^[0-9]*$/',$_GET[ap]))exit;
if($_GET[ap])$ap = $_GET[ap];
if($_GET[pn] and !preg_match('/^[0-9]*$/',$_GET[pn]))exit;
if($_GET[pn])$pn = $_GET[pn];
if($_GET[tm] and !preg_match('/^[0-9]*$/',$_GET[tm]))exit;
if($_GET[tm])$tm = $_GET[tm];
if($_GET[tg] and !preg_match('/^[0-9]*$/',$_GET[tg]))exit;
if($_GET[tg])$tg= $_GET[tg];

define("ROOTPATH", "../");
include_once (ROOTPATH.'administration/db_conn.php');

	$sqlw=$db->query("select * from webhtml where cno='$ap'");
	if($sqlw)$roww=$sqlw->fetch();
	if($roww[pjn]){
		if($roww[pjn] and !preg_match('/^[0-9]*$/',$roww[pjn]))exit;
		if($roww[apn] and !preg_match('/^[0-9]*$/',$roww[apn]))exit;
		$pj = $roww[pjn];
		$ap = $roww[apn];
	;}
?>     
<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php if($_SESSION[tn]==PRC){echo '显示嵌入相片[按钮] - AppMoney712 移动应用设计系统';}else if($_SESSION[tn]==EN){echo 'Preview[embedded picture][button] - AppMoney712 APP Creation System';}else{echo '顯示嵌入相片[按鈕] - AppMoney712 移動應用設計系統';}?></title>
	<link href="../css/jquery.mobile-1.4.4.min.css" rel="stylesheet">
	<link href="../css/jquerymobile-1.4.4.min.css" rel="stylesheet">
	<link href="../jscss/ifrpi.css" rel="stylesheet"><link rel="stylesheet" href="../jscss/animate.min.css"><link rel="stylesheet" href="../css/spinners.css">
	<link href="../css/appsystem.css" rel="stylesheet">
	<style type="text/css">
	</style>
	<script src="../js/jquery.js"></script>
	<script src="../js/jquery.mobile-1.4.4.min.js"></script>
	<script src="../js/jquery.nicescroll.min.js"></script>
	<script src="../js/ifrpics.js"></script>
	
</head>
<body>

<div data-role="page" data-theme="f" class="page">
	
	<div class="<?php if($_GET[fs])echo 'ui-content';?>">
	
<?php 
$ht = file_get_contents('../panel/'.$roww[pjnbr].'/'.$ap.'.html');
			$htm = explode('<div id="'.$pj.$ap.'ifr'.$pn.'"',$ht);
			$html = explode('<!--addifr!--></div>',$htm[1]);
			$htmln = explode('<!--item'.$tm.'!-->',$html[0]);
			$htmlv = explode('<!--item',$htmln[1]);			
			$ifrhtml = str_replace('z-index:-1;','',$htmlv[0]);
			
			
				
$htjshtm = file_get_contents('../panel/'.$roww[pjnbr].'/web'.$ap.'.js');
			if($htjshtm){
				$htjshtml = explode('/*webjs'.$pn.'*/',$htjshtm);
				$ifrjs = $htjshtml[1];			
			}
 
	if($ifrhtml){
	$ifrhtml = str_replace('images/','../panel/'.$roww[pjnbr].'/images/',$ifrhtml);
	$ifrhtml = str_replace('data-img="../panel/'.$roww[pjnbr].'/images/','data-img="images/',$ifrhtml);
	
	if(strpos($_GET[tle],'http://')!==false or strpos($_GET[tle],'https://')!==false){$images = '';}else{$images = '../panel/'.$roww[pjnbr].'/';}
	
	$btnitem = explode('<!--btnitem!-->',$ifrhtml);
	$btnitemimg = explode('data-img="',$btnitem[0]);
	$srcimg = explode('"',$btnitemimg[1]);
	
	$ifrhtml = str_replace('src=""','src="'.$images.htmlspecialchars($srcimg[0]).'"',$ifrhtml);
	
	echo str_replace('data-url="../panel/'.$roww[pjnbr].'/images/','data-url="images/',$ifrhtml);
	echo '<script src="../js/appsystem.js"></script>';
	echo '<script>'.$ifrjs.'</script>';
	
	;}
	
	if($ifrhtml){
	
	 if($_SESSION[tn]==PRC){echo '此段设计';}else if($_SESSION[tn]==EN){echo 'Preview this part\'s design';}else{echo '此段設計';} 
	echo ' '.htmlspecialchars($_GET[tle]);
	;}?>
<hr>
<span style="color:black"><?php if($_SESSION[tn]==PRC){echo '专案';}else if($_SESSION[tn]==EN){echo 'Project';}else{echo '專案';}?></span>
	<?php 	$sql=$db->query("select * from webpj where cno='$pj'");
	if($sql)$row=$sql->fetch();
	echo '['.htmlspecialchars($row[date]).'] '.htmlspecialchars($row[title]);?>
	
	&nbsp;&nbsp;&nbsp;&nbsp;
	
	<span style="color:black"><?php if($_SESSION[tn]==PRC){echo '应用页称';}else if($_SESSION[tn]==EN){echo 'Page name';}else{echo '應用頁稱';}?></span> :
	<?php echo htmlspecialchars($roww[title])?>

	<hr>
<hr>
	
	<div class="copyright">&copy; 2015 Lee Wai Kwok(Hong Kong). JSTRUST CONSULTANCY. <?php if($_SESSION[tn]==PRC){echo '版权所有';}else if($_SESSION[tn]==EN){echo 'All Rights Reserved.';}else{echo '版權所有';}?></div>
	</div><!-- /content -->
	</div><!-- /page -->
</body></html>

