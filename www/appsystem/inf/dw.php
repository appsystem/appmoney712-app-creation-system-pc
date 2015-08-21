<?php session_start();             
error_reporting(0); 

if($_GET[pj] and !preg_match('/^[0-9]*$/',$_GET[pj]))exit;
if($_GET[pj])$pj = $_GET[pj];
if($_GET[ap] and !preg_match('/^[0-9]*$/',$_GET[ap]))exit;
if($_GET[ap])$ap = $_GET[ap];
if($_GET[pn] and !preg_match('/^[0-9]*$/',$_GET[pn]))exit;
if($_GET[pn])$pn = $_GET[pn];
if($_GET[tl] and !preg_match('/^[0-9]*$/',$_GET[tl]))exit;
if($_GET[tl])$tl = $_GET[tl];
if($tl and !$pn)$pn = $tl;

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
    <title><?php if($_SESSION[tn]==PRC){echo '相片画布 - AppMoney712 移动应用设计系统';}else if($_SESSION[tn]==EN){echo 'drawer - AppMoney712 APP Creation System';}else{echo '相片畫布 - AppMoney712 移動應用設計系統';}?></title>
	<link href="../css/jquery.mobile-1.4.4.min.css" rel="stylesheet">
	<link href="../css/jquerymobile-1.4.4.min.css" rel="stylesheet">
	<link href="../css/icons/style.css" rel="stylesheet">
	<link href="../css/appsystem.css" rel="stylesheet">
	<style type="text/css">	
	</style>
	<script src="../js/jquery.js"></script>
	<script src="../js/jquery.mobile-1.4.4.min.js"></script>	
	<script src="../js/dw.js"></script>	<!--<script src="../js/dws.js"></script>!-->


	<script>
	
	</script>


</head>
<body>

<div data-role="page" data-theme="f" class="page">
	<div style="overflow: hidden;" data-role="header" data-theme="f">
	<a href="#navigations"  id="menubttn"  data-rel="popup" data-transition="pop" class="ui-btn ui-btn ui-btn-inline ui-corner-all ui-btn-icon-left ui-icon-bars"><?php if($_SESSION[tn]==PRC){echo '目录';}else if($_SESSION[tn]==EN){echo 'Menu';}else{echo '目錄';}?></a>
    <h1><?php if($_SESSION[tn]==PRC){echo '相片画布 - AppMoney712 移动应用设计系统';}else if($_SESSION[tn]==EN){echo 'drawer - AppMoney712 APP Creation System';}else{echo '相片畫布 - AppMoney712 移動應用設計系統';}?></h1>
	
	</div><!-- /header -->
	

	
	<div data-role="content">

	
	<?php if($ap){?>
	<a href="webpage.php?pj=<?php echo htmlspecialchars($roww[pjnbr]) ?>&ap=<?php echo htmlspecialchars($roww[ap])?>" data-ajax="false" class="ui-btn ui-btn ui-btn-inline ui-corner-all ui-btn-icon-left ui-icon-carat-l">&nbsp;</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="#view" data-rel="popup" data-transition="pop" class="ui-btn ui-btn-inline ui-corner-all ui-mini ui-btn-icon-left ui-icon-search"><?php if($_SESSION[tn]==PRC){echo '预览';}else if($_SESSION[tn]==EN){echo 'Preview';}else{echo '預覽';}?></a>
		
	<div data-role="popup" id="view"><a href="#" class="ui-btn ui-corner-all ui-icon-delete ui-btn-icon-notext ui-btn-right" data-rel="back"></a>

	<ul data-role="listview" data-corners="false" data-inset="true">
	<li><a href="view.php?pj=<?php echo htmlspecialchars($roww[pjnbr])?>&ap=<?php echo htmlspecialchars($roww[ap])?>&vw=ap" data-ajax="false" target="_blank" class="ui-btn ui-btn-inline ui-mini ui-btn-icon-left ui-icon-search"><?php if($_SESSION[tn]==PRC){echo '预览应用页内容形式';}else if($_SESSION[tn]==EN){echo 'Page content of APP style[Preview]';}else{echo '預覽應用頁內容形式';}?></a></li>
	<li><a href="view.php?pj=<?php echo htmlspecialchars($roww[pjnbr])?>&ap=<?php echo htmlspecialchars($roww[ap])?>&vw=ap&ts=1" data-ajax="false" target="_blank" class="ui-btn ui-btn-inline ui-mini ui-btn-icon-left ui-icon-search"><?php if($_SESSION[tn]==PRC){echo '预览应用页内容形式';}else if($_SESSION[tn]==EN){echo 'Page content of APP style[Preview]';}else{echo '預覽應用頁內容形式';}?><?php if($_SESSION[tn]==PRC){echo '[触控式] [使用webkit型浏览器]';}else if($_SESSION[tn]==EN){echo '[Touch screen] [using any webkit browser]';}else{echo '[觸控式] [使用webkit型瀏覽器]';}?></a></li>
	<li><a href="viewp.php?pj=<?php echo htmlspecialchars($roww[pjnbr])?>&ap=<?php echo htmlspecialchars($roww[ap])?>" data-ajax="false" target="_blank" class="ui-btn ui-btn-inline ui-mini ui-btn-icon-left ui-icon-search"><?php if($_SESSION[tn]==PRC){echo '预览popup形式';}else if($_SESSION[tn]==EN){echo 'content of popup style[Preview]';}else{echo '預覽popup形式';}?></a></li>
	<li><a href="viewp.php?pj=<?php echo htmlspecialchars($roww[pjnbr])?>&ap=<?php echo htmlspecialchars($roww[ap])?>&ts=1" data-ajax="false" target="_blank" class="ui-btn ui-btn-inline ui-mini ui-btn-icon-left ui-icon-search"><?php if($_SESSION[tn]==PRC){echo '预览popup形式';}else if($_SESSION[tn]==EN){echo 'content of popup style[Preview]';}else{echo '預覽popup形式';}?><?php if($_SESSION[tn]==PRC){echo '[触控式] [使用webkit型浏览器]';}else if($_SESSION[tn]==EN){echo '[Touch screen] [using any webkit browser]';}else{echo '[觸控式] [使用webkit型瀏覽器]';}?></a></li>
	<!--<li><a href="view.php?pj=<?php echo htmlspecialchars($roww[pjnbr])?>&ap=<?php echo htmlspecialchars($roww[ap])?>&vw=s" data-ajax="false" target="_blank" class="ui-btn ui-btn-inline ui-mini ui-btn-icon-left ui-icon-search"><?php if($_SESSION[tn]==PRC){echo '预览單頁形式';}else if($_SESSION[tn]==EN){echo 'single page style[Preview]';}else{echo '預覽單頁形式';}?></a></li>!-->
	</ul>
	</div>
	
		
	<a href="menudesign.php?pj=<?php echo htmlspecialchars($roww[pjnbr])?>&ap=<?php echo $ap?>&pn=<?php echo $pn?>&php=dw&plt=1" data-ajax="false" class="ui-btn ui-btn ui-btn-inline ui-corner-all ui-mini ui-btn-icon-left ui-icon-bars"><?php if($_SESSION[tn]==PRC){echo '专案应用页列表';}else if($_SESSION[tn]==EN){echo 'Project Page List';}else{echo '專案應用頁列表';}?></a>
	<?php ;}?>
	
	
	<a href="#try" data-rel="popup" data-transition="pop" class="ui-btn ui-btn-f ui-btn-inline ui-corner-all ui-mini" style="color:BLACK"><span class="pigss-pencil" style="color:red"></span><?php if($_SESSION[tn]==PRC){echo '快速试用';}else if($_SESSION[tn]==EN){echo 'Quick try';}else{echo '快速試用';}?></a>
		<div data-role="popup" id="try" data-position-to="window" data-theme="f" class="ifrwidth"><a href="#" data-rel="back" class="popn ui-btn ui-btn-z ui-btn-icon-notext ui-icon-delete"></a><BR><BR>
		<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '预备相片';}else if($_SESSION[tn]==EN){echo 'Photo preparation';}else{echo '預備相片';}?></b> &nbsp;<?php if($_SESSION[tn]==PRC){echo '您须预备相片并存於panel/'.$roww[pjnbr].'/images。';}else if($_SESSION[tn]==EN){echo 'You need to prepare a photo and place it to the folder panel/'.$roww[pjnbr].'/images.';}else{echo '您須預備相片並存於panel/'.$roww[pjnbr].'/images。';}?></p>	
		<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '项目填写';}else if($_SESSION[tn]==EN){echo 'Item information';}else{echo '項目填寫';}?></b> &nbsp;<?php if($_SESSION[tn]==PRC){echo '在\'相片URL\'填写首张相片档名并提送。';}else if($_SESSION[tn]==EN){echo 'You need to enter photo filename to Background picture and then click the SEND button.';}else{echo '在\'背景圖像\'填寫相片檔名並提送。';}?></p>	
		<HR>
		<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '试用';}else if($_SESSION[tn]==EN){echo 'Testing';}else{echo '試用';}?></b> &nbsp;
	<?php if($_SESSION[tn]==PRC){echo '您须点撀此页上的预览,再进行测试。再修改及选用不同设置再预览并试用。';}else if($_SESSION[tn]==EN){echo 'You need to click the above preview button to test your design. You can enter or select different parameters to test their functions and effects.';}else{echo '您須點撀此頁上的預覽,再進行測試。再修改及選用不同設置再預覽並試用。';}?></p>	
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '试用步骤';}else if($_SESSION[tn]==EN){echo 'Testing Steps';}else{echo '試用步驟';}?></b> &nbsp;
	<?php if($_SESSION[tn]==PRC){echo '在预览页,点撀编辑符号按钮,能进行画线。您亦能在画布上加popup按钮并显示内容,参考本页解释。';}else if($_SESSION[tn]==EN){echo 'You need to click the edit symbol button to draw. You can add popup button and its content to the picture. You need to refer the explanation on this page.';}else{echo '在預覽頁,點撀編輯符號按鈕,能進行畫線。您亦能在畫布上加popup按鈕並顯示內容,參考本頁解釋。';}?></p>	
	<p><?php if($_SESSION[tn]==PRC){echo '若按浏览器的重刷按钮,键入的数据亦被重置,是不同於当您的设计变成应用。';}else if($_SESSION[tn]==EN){echo 'If you click the refresh button of your computer browser, your entered data will be cleared. This situation will not occur when your design is used as APP.';}else{echo '若按瀏覽器的重刷按鈕,鍵入的數據亦被重置,是不同於當您的設計變成應用。';}?></p>	
		</div>
		
		
	<?php if($tl)$tln = '&tl='.$tl;?>
	
	<FORM action="dw.php?pj=<?php echo htmlspecialchars($roww[pjnbr]) ?>&ap=<?php echo htmlspecialchars($roww[ap]) ?>&pn=<?php echo htmlspecialchars($pn).$tln ?>" id="webxls" method="post" data-ajax="false">
	<hr>
<span style="color:black"><?php if($_SESSION[tn]==PRC){echo '专案';}else if($_SESSION[tn]==EN){echo 'Project';}else{echo '專案';}?></span>
	<?php 	$sql=$db->query("select * from webpj where cno='$pj'");
	if($sql)$row=$sql->fetch();
	echo '['.htmlspecialchars($row[date]).'] '.htmlspecialchars($row[title]);?>
	
	&nbsp;&nbsp;&nbsp;&nbsp;
	
	<span style="color:black"><?php if($_SESSION[tn]==PRC){echo '应用页称';}else if($_SESSION[tn]==EN){echo 'Page name';}else{echo '應用頁稱';}?></span> :
	<?php echo htmlspecialchars($roww[title])?>

	<hr>
	<?php   if($pn){
				$ht = file_get_contents('../panel/'.$roww[pjnbr].'/'.$ap.'.html');
			
			
			$htm = explode('<!--part',$ht);
			$pntag = '<!--part'.$pn.'!-->';
				for($i=1;$i<sizeof($htm);$i++){
					if(strpos('<!--part'.$htm[$i],$pntag)===false and !$dw){$html .= '<!--part'.$htm[$i];}
					else if(strpos('<!--part'.$htm[$i],$pntag)!==false){$dw  = str_replace($pntag,'','<!--part'.$htm[$i]);}
					else{$htmls .= '<!--part'.$htm[$i];}
				;}
			$tabnbgdata = explode('<!--data-tabnbg',$dw);
			if($tabnbgdata[1]){
				$tabnbgdatn = explode('data-tabnbg!-->',$tabnbgdata[1]);
				if(strpos($tabnbgdatn[0],'vtns1vtns')!==false){
					$bvtns = 1;
				;}else if(strpos($tabnbgdatn[0],'vtns5vtns')!==false){
					$bvtns = 5;
				;}else if(strpos($tabnbgdatn[0],'vtns6vtns')!==false){
					$bvtns = 6;
				;}else{
					$bvtns = '';
				;}

				
			$dw  = str_replace('<div class="swiper-slide"><div id="'.$pj.$ap.'vnts'.$pn.'" class="vntsns">','',$dw);	
			//$dw  = str_replace('<div class="swiper-slide"><div id="'.$pj.$ap.'vnts'.$pn.'" class="vntsns">','',$dw);		
			$dw = str_replace('<!--data-tabnbg'.$tabnbgdatn[0].'data-tabnbg!-->','',$dw);	
			;}					
			$dw  = str_replace('</div></div><!--vnts!-->','',$dw);
			if(strpos('vtns1vtns',$dw)!==false){
					$bvtns = 1;
				;}else if(strpos('vtns5vtns',$dw)!==false){
					$bvtns = 5;					
				;}else if(strpos('vtns6vtns',$filterhtml)!==false){
					$bvtns = 6;
				;}else{
					$bvtns = '';
				;}
				
			$tbgnvlu = explode('<!--data',$dw);
			$tbgsvlu = explode('data!-->',$tbgnvlu[1]);
			$tbgvlu = explode('@#@',$tbgsvlu[0]);

			$typvlu = $tbgvlu[0];$imgvlu = $tbgvlu[1];$urlvlu = $tbgvlu[2];$imgbgvlu = $tbgvlu[3];
			$htmlvlu = $tbgvlu[4];$clrvlu = $tbgvlu[5];$wdhvlu = $tbgvlu[6];	$urlsvlu = $tbgvlu[7];	$iconnvlu = $tbgvlu[8];	
			
			$infopopbgvlu = $tbgvlu[9];	
			$dwpopbgvlu = $tbgvlu[10];	
			$iconpopbgvlu = $tbgvlu[11];	
			$iconfilepopbgvlu = $tbgvlu[12];	
			$listpopbgvlu = $tbgvlu[13];	
			$titlepopbgvlu = $tbgvlu[14];	
			$videopopbgvlu = $tbgvlu[15];	
			$audiopopbgvlu = $tbgvlu[16];	
			$picpopbgvlu = $tbgvlu[17];	
			$positionpopbgvlu = $tbgvlu[18];		

			
			;}
	?>	
	<div class="ui-grid-a">
	<div class="ui-block-a">
	<?php if($_SESSION[tn]==PRC){echo '背景图像';}else if($_SESSION[tn]==EN){echo 'Background picture';}else{echo '背景圖像';}?>
	<input type="text" name="img" placeholder=""  value="<?php echo htmlspecialchars($imgvlu)?>" required></div><div class="ui-block-b">
	<?php if($_SESSION[tn]==PRC){echo '背景图像路径';}else if($_SESSION[tn]==EN){echo 'Background picture path';}else{echo '背景圖像路徑';}?>
	<input type="text" name="url" placeholder=""  value="<?php echo htmlspecialchars($urlvlu)?>"></div></div>
<div class="ui-grid-a">
	<div class="ui-block-a">
<?php if($_SESSION[tn]==PRC){echo '按钮背景';}else if($_SESSION[tn]==EN){echo 'Button background';}else{echo '按鈕背景';}?>
<input name="imgbg" type="text" value="<?php echo htmlspecialchars($imgbgvlu)?>"></div><div class="ui-block-b">
<?php if($_SESSION[tn]==PRC){echo '解释按钮档案';}else if($_SESSION[tn]==EN){echo 'Explanation file';}else{echo '解釋按鈕檔案';}?>
<input name="html" type="text" value="<?php echo htmlspecialchars($htmlvlu)?>"></div></div>
<div class="ui-grid-a">
	<div class="ui-block-a">
<?php if($_SESSION[tn]==PRC){echo '预设线粗';}else if($_SESSION[tn]==EN){echo 'Line width';}else{echo '預設線粗';}?>
<input name="wdh" type="text" value="<?php echo htmlspecialchars($wdhvlu)?>"></div><div class="ui-block-b">
<?php if($_SESSION[tn]==PRC){echo '预设线色';}else if($_SESSION[tn]==EN){echo 'Line color';}else{echo '預設線色';}?>
<input name="clr" type="text" value="<?php echo htmlspecialchars($clrvlu)?>"></div></div>


<?php if($_SESSION[tn]==PRC){echo '数据url';}else if($_SESSION[tn]==EN){echo 'Data source url';}else{echo '數據url';}?>
<input name="urls" type="text" value="<?php echo htmlspecialchars($urlsvlu)?>">
<?php if($_SESSION[tn]==PRC){echo '自定图像字体';}else if($_SESSION[tn]==EN){echo 'Custom icon font';}else{echo '自定圖像字體';}?>
<textarea name="iconn"><?php echo htmlspecialchars($iconnvlu)?></textarea>
<HR>
POPUP<?php if($_SESSION[tn]==PRC){echo '背景图像';}else if($_SESSION[tn]==EN){echo 'Background picture';}else{echo '背景圖像';}?>
	<div class="ui-grid-d">
	<div class="ui-block-a">
	<?php if($_SESSION[tn]==PRC){echo '资讯';}else if($_SESSION[tn]==EN){echo 'info';}else{echo '資訊';}?>
	<input type="text" name="infopopbg" placeholder=""  value="<?php echo htmlspecialchars($infopopbgvlu)?>"></div>
	<div class="ui-block-b">
	<?php if($_SESSION[tn]==PRC){echo '画线设置';}else if($_SESSION[tn]==EN){echo 'draw parameter';}else{echo '畫線設置';}?>
	<input type="text" name="dwpopbg" placeholder=""  value="<?php echo htmlspecialchars($dwpopbgvlu)?>"></div>
	<div class="ui-block-c">
	<?php if($_SESSION[tn]==PRC){echo '符号设置';}else if($_SESSION[tn]==EN){echo 'icon parameter';}else{echo '符號設置';}?>
	<input type="text" name="iconpopbg" placeholder=""  value="<?php echo htmlspecialchars($iconpopbgvlu)?>"></div>
	<div class="ui-block-d">
	<?php if($_SESSION[tn]==PRC){echo '符号-标题设置';}else if($_SESSION[tn]==EN){echo 'icon - title data';}else{echo '符號-標題設置';}?>
	<input type="text" name="iconfilepopbg" placeholder=""  value="<?php echo htmlspecialchars($iconfilepopbgvlu)?>"></div>
	<div class="ui-block-e">
	<?php if($_SESSION[tn]==PRC){echo '符号-列表设置';}else if($_SESSION[tn]==EN){echo 'icon - data list';}else{echo '符號-列表設置';}?>
	<input type="text" name="listpopbg" placeholder=""  value="<?php echo htmlspecialchars($listpopbgvlu)?>"></div>
	
	<div class="ui-block-a">
	<?php if($_SESSION[tn]==PRC){echo '符号-标题选项';}else if($_SESSION[tn]==EN){echo 'icon - title option';}else{echo '符號-標題選項';}?>
	<input type="text" name="titlepopbg" placeholder=""  value="<?php echo htmlspecialchars($titlepopbgvlu)?>"></div>
	<div class="ui-block-b">
	<?php if($_SESSION[tn]==PRC){echo '符号-视频设置';}else if($_SESSION[tn]==EN){echo 'icon - video option';}else{echo '符號-視頻設置';}?>
	<input type="text" name="videopopbg" placeholder=""  value="<?php echo htmlspecialchars($videopopbgvlu)?>"></div>
	<div class="ui-block-c">
	<?php if($_SESSION[tn]==PRC){echo '符号-音频设置';}else if($_SESSION[tn]==EN){echo 'icon - audio option';}else{echo '符號-音頻設置';}?>
	<input type="text" name="audiopopbg" placeholder=""  value="<?php echo htmlspecialchars($audiopopbgvlu)?>"></div>
	<div class="ui-block-d">
	<?php if($_SESSION[tn]==PRC){echo '符号-相片设置';}else if($_SESSION[tn]==EN){echo 'icon - picture data';}else{echo '符號-相片設置';}?>
	<input type="text" name="picpopbg" placeholder=""  value="<?php echo htmlspecialchars($picpopbgvlu)?>"></div>
	<div class="ui-block-e">
	<?php if($_SESSION[tn]==PRC){echo '符号-位置设置';}else if($_SESSION[tn]==EN){echo 'icon - position';}else{echo '符號-位置設置';}?>
	<input type="text" name="positionpopbg" placeholder=""  value="<?php echo htmlspecialchars($positionpopbgvlu)?>"></div>
	</div>
	
	
	<input type="hidden" name="guanyin1" value="<?php if(!$_POST[guanyin1])$_SESSION[guanyin1]=rand();
	echo htmlspecialchars($_SESSION[guanyin1]); ?>">
	
	<div class="ui-grid-d"><div class="ui-block-a">
	<input type="submit" name="submit" id="webxlsbtn" class="ui-btn" value="<?php if($_SESSION[tn]==PRC){echo '送交';}else if($_SESSION[tn]==EN){echo 'SEND';}else{echo '送交';}?>"></div><div class="ui-block-b"></div><div class="ui-block-c"></div>
	<div class="ui-block-d">
	<a href="#inf" data-rel="popup" data-transition="pop" class="ui-btn ui-btn-b ui-btn-inline ui-corner-all ui-mini">? <?php if($_SESSION[tn]==PRC){echo '解释';}else if($_SESSION[tn]==EN){echo 'Explanation';}else{echo '解釋';}?></a>
	<div data-role="popup" id="inf" data-position-to="window" data-theme="f" style="overflow-x:hidden;overflow-y:auto;" class="ifrwidthp"><a href="#" class="popn ui-btn-z ui-corner-all ui-icon-delete ui-btn-icon-notext" data-rel="back"></a>
	<h4 style="color:black"><?php if($_SESSION[tn]==PRC){echo '背景图像';}else if($_SESSION[tn]==EN){echo 'Background picture';}else{echo '背景圖像';}?></h4>
	<p><?php if($_SESSION[tn]==PRC){echo '画布背景图像,使用应用内的图像,档案须存于panel/'.$roww[pjnbr].'/images档夹内,或使用存于互联网相片。此处填相片的档名或url。相片尺寸是横观,是阔度大於长度[高度]。';}else if($_SESSION[tn]==EN){echo 'It is about the background of drawer. If you use the APP pictures, you need to prepare pictures and store them in  panel/'.$roww[pjnbr].'/images folder. You can also use the Internet picture. You need to fill in picture filename or file URL. The picture size is needed to be in landscape view.';}else{echo '畫布背景圖像,使用應用內的圖像,檔案須存於panel/'.$roww[pjnbr].'/images檔夾內,或使用存於互聯網相片。此處填相片的檔名或url。相片尺寸是横觀,闊度大於長度[高度]。';}?></p>
	
	<hr>
<h4 style="color:black"><?php if($_SESSION[tn]==PRC){echo '背景图像路径';}else if($_SESSION[tn]==EN){echo 'Background picture path';}else{echo '背景圖像路徑';}?></h4>
	<p><?php if($_SESSION[tn]==PRC){echo '您能让用户自定背景相片,此处填设置相片路径,方便用户填写。填上内容才能启能此功能。';}else if($_SESSION[tn]==EN){echo 'You can let APP user to add their own picture URL. You need to fill in a url value to enable this function. It lets APP user to enter the URL convenience.';}else{echo '您能讓用戶自定背景相片,此處填設置相片路徑,方便用戶填寫。填上內容才能啟能此功能。';}?></p>
	
	<hr>
<h4 style="color:black"><?php if($_SESSION[tn]==PRC){echo '按钮背景';}else if($_SESSION[tn]==EN){echo 'Button background';}else{echo '按鈕背景';}?>/popup<?php if($_SESSION[tn]==PRC){echo '背景';}else if($_SESSION[tn]==EN){echo ' background';}else{echo '背景';}?></h4>
	<p><?php if($_SESSION[tn]==PRC){echo '按钮背景图像,使用应用内的图像,档案须存於panel/'.$roww[pjnbr].'/images档夹内。若设置背景图像上下左右重覆显示,在档案名加[xy]。e.g. picture[xy].png';}else if($_SESSION[tn]==EN){echo 'It is about the background of button group. If you use the APP pictures, you need to prepare pictures and store them in  panel/'.$roww[pjnbr].'/images folder. If you add [xy] to the picture file name e.g. picture[xy].png, the picture will be repeated both vertically and horizontally in the item area.';}else{echo '按鈕背景圖像,使用應用內的圖像,檔案須存於panel/'.$roww[pjnbr].'/images檔夾內。若設置背景圖像上下左右重覆顯示,在檔案名加[xy]。e.g. picture[xy].png';}?></p>
	<p>
	<?php if($_SESSION[tn]==PRC){echo '您能填上rgb颜色码e.g. rgb(125,125,125), rgba颜色码e.g. rgba(125,125,125,0.5) 或 hex颜色码e.g. #123456代替背景图像。';}else if($_SESSION[tn]==EN){echo 'You can add rgb color code e.g. rgb(125,125,125), rgba color code e.g. rgba(125,125,125,0.5) or hex color code e.g. #123456.';}else{echo '您能填上rgb顏色碼e.g. rgb(125,125,125), rgba顏色碼e.g. rgba(125,125,125,0.5) 或 hex顏色碼e.g. #123456。';}?>
	</p>
	<!--<p><?php if($_SESSION[tn]==PRC){echo '您亦能填a-y的颜色主题e.g. b。';}else if($_SESSION[tn]==EN){echo 'You can enter color theme a-y.e.g. a';}else{echo '您亦能填a-y的顏色主題e.g. b。';}?></p>!-->
<hr>
<h4 style="color:black"><?php if($_SESSION[tn]==PRC){echo '解释按钮档案';}else if($_SESSION[tn]==EN){echo 'Explanation file';}else{echo '解釋按鈕檔案';}?></h4>
	<p><?php if($_SESSION[tn]==PRC){echo '您能加上解释使用的html档案,e.g. 1.html。';}else if($_SESSION[tn]==EN){echo 'You can add html file for APP usage explanation. e.g. 1.html';}else{echo '您能加上解釋使用的html檔案,e.g. 1.html。';}?></p>
	<hr>
<h4 style="color:black"><?php if($_SESSION[tn]==PRC){echo '预设线粗';}else if($_SESSION[tn]==EN){echo 'Line width';}else{echo '預設線粗';}?></h4>
	<p><?php if($_SESSION[tn]==PRC){echo '改画布预设的线粗,填入整数,e.g. 3。';}else if($_SESSION[tn]==EN){echo 'You can amend the initial value of line width of drawer.';}else{echo '改畫布預設的線粗,填入整數,e.g. 3。';}?></p><hr>
	<h4 style="color:black"><?php if($_SESSION[tn]==PRC){echo '预设线色';}else if($_SESSION[tn]==EN){echo 'Line color';}else{echo '預設線色';}?></h4>
	<p><?php if($_SESSION[tn]==PRC){echo '改画布预设的线色,填html颜色码,e.g. #123456。';}else if($_SESSION[tn]==EN){echo 'You can amend the initial value of line color of drawer.';}else{echo '改畫布預設的線色,填html顏色碼,e.g. #123456。';}?></p>	

<hr>
<h4 style="color:black"><?php if($_SESSION[tn]==PRC){echo '数据url';}else if($_SESSION[tn]==EN){echo 'Data source url';}else{echo '數據url';}?></h4>
	<p><?php if($_SESSION[tn]==PRC){echo '您能在画布加上含视频、音频或或WHATSAPP的图像字体,或再加文字及正方形相片,此等数据是由置於互联纲JSON格式的档案产生,您须填上URL。您须参考本司纲站。';}else if($_SESSION[tn]==EN){echo 'You can add video, audio or WHATSAPP with icon font to the drawer. You can also add a square size photo or title to the icon font. The data source of these issues are from a JSON format file stored on the Internet. Please refer to our website. ';}else{echo '您能在畫布加上含視頻、音頻或WHATSAPP的圖像字體,或再加文字及正方形相片,此等數據是由置於互聯綱JSON格式的檔案產生,您須填上URL。您須參考本司綱站。';}?></p>
	<p><?php if($_SESSION[tn]==PRC){echo '此项不是必须的,此功能是将您预设的数据变成列表,供用户点撀选用。用户是能直接在应用内键入此等数据。';}else if($_SESSION[tn]==EN){echo 'It is optional item. It is a function of data list for APP user clicking to select the data value you provided. APP user can type the video,audio,square size photo and title in the APP directly.';}else{echo '此項不是必須的,此功能是將您預設的數據變成列表,供用戶點撀選用。用戶是能直接在應用內鍵入此等數據。';}?></p>
	
	<p><?php if($_SESSION[tn]==PRC){echo '用户能键入开启浏览器浏览特定网页的链结,e.g. pdf文件或地图。格式是[openbrowser]网页url,e.g. [openbrowser]http://???.?????.com/viewer?url=??????????word.pdf。此功能不能用电脑浏览器试用。';}else if($_SESSION[tn]==EN){echo 'APP user can enter open browser link to the url item. The link is to open APP user device\'s specific browser to show specific Internet web page. e.g. pdf document or map. The format is [openbrowser]url of web page. e.g. [openbrowser]http://???.?????.com/viewer?url=??????????word.pdf. You cannot preview it on your computer browser.';}else{echo '用戶能鍵入開啟瀏覽器瀏覽特定網頁的鏈結,e.g. pdf文件或地圖。格式是[openbrowser]網頁url,e.g. [openbrowser]http://???.?????.com/viewer?url=??????????word.pdf。此功能不能用電腦瀏覽器試用。';}?></p>

	<p><?php if($_SESSION[tn]==PRC){echo '用戶能键入开启合适应用浏览特定互联网或内联网文件,e.g. 用Acrobat Reader APP开启pdf文件。格式是[openapp]网页url,e.g. [openapp]http://???.?????.com/word.pdf。此功能不能用电脑浏览器试用。';}else if($_SESSION[tn]==EN){echo 'APP user can add open APP link to the url item. The link is to open Internet/Intranet document by appropriate APP in APP user\'s appropriate device. e.g. open pdf document by Acrobat Reader APP. The format is [openapp]document url. e.g. [openapp]http://???.?????.com/word.pdf.  You cannot preview it on your computer browser.';}else{echo '用戶能鍵入開啟合適應用瀏覽特定互聯網或內聯網文件,e.g. 用Acrobat Reader APP開啟pdf文件。格式是[openapp]網頁url,e.g. [openapp]http://???.?????.com/word.pdf。此功能不能用電腦瀏覽器試用。';}?></p>
	
	<hr>
	<h4 style="color:black"><?php if($_SESSION[tn]==PRC){echo '自定图像字体';}else if($_SESSION[tn]==EN){echo 'Custom icon font';}else{echo '自定圖像字體';}?></h4>
	<p><?php if($_SESSION[tn]==PRC){echo '应用内巳有预设图像字体,但您能另定图像字体,此处是键入字体名,用,号隔开,格式是xxx-xxxxx,必须含-符号。此等数据在您的应用内生成列表,供用户点撀选用。';}else if($_SESSION[tn]==EN){echo 'Your APP contains icon fonts provided by this software. You can add your custom icon font to the drawer. You can use , as separator. You need to add - to the name. e.g. xxxx-xxxx. These entries will be as data list in your APP for APP user clicking to use.';}else{echo '應用內巳有預設圖像字體,但您能另定圖像字體,此處是鍵入字體名,用,號隔開,格式是xxx-xxxxx,必須含-符號。此等數據在您的應用內生成列表,供用戶點撀選用。';}?></p>
	<p><?php if($_SESSION[tn]==PRC){echo '您须自制字体及相关CSS文件才能使用此项。';}else if($_SESSION[tn]==EN){echo 'You need to prepare icons and related css to use this function.';}else{echo '您須自制字體及相關CSS文件才能使用此項。';}?></p>		
	</div>
	
	</div>
	
	</div><!--ui-grid!-->
	</FORM>
	<hr>
	<?php 
	if($dw){
	if($_SESSION[tn]==PRC){echo '您的设计';}else if($_SESSION[tn]==EN){echo 'Your design';}else{echo '您的設計';}
	$ndw = str_replace('(images/','(../panel/'.$roww[pjnbr].'/images/',$dw);
	echo '<br>'.str_replace('"images/','"../panel/'.$roww[pjnbr].'/images/',$ndw);
		
if(file_exists('../panel/'.$roww[pjnbr].'/web'.$ap.'.js')){
	$jswebn = file_get_contents('../panel/'.$roww[pjnbr].'/web'.$ap.'.js');
	$jswebn=explode('/*webjs'.$pn.'*/',$jswebn);
	echo '<script>$(document).on("pageshow", ".page", function() {'.$jswebn[1].'})</script>';
;}
	}?>
	<hr>
		
<a href="#infs" data-rel="popup" data-transition="pop" class="ui-btn ui-btn-b ui-btn-inline ui-corner-all ui-mini">? <?php if($_SESSION[tn]==PRC){echo '使用解释';}else if($_SESSION[tn]==EN){echo 'Usage';}else{echo '使用解釋';}?></a>
	<div data-role="popup" id="infs" data-position-to="window" data-theme="f" style="overflow-x:hidden;overflow-y:auto;" class="ifrwidthp"><a href="#" class="popn ui-btn-z ui-corner-all ui-icon-delete ui-btn-icon-notext" data-rel="back"></a>
	<a href="#" class="ui-btn ui-btn-w ui-btn-inline"><i class="pigss-pencil"></i></a>  
	<?php if($_SESSION[tn]==PRC){echo '点撀此按钮能画线。';}else if($_SESSION[tn]==EN){echo 'APP user can click this button to draw.';}else{echo '點撀此按鈕能畫線。';}?><br>
	<a href="#" class="ui-btn ui-btn-w ui-btn-inline"><i class="pigss-star"></i></a> 
	<?php if($_SESSION[tn]==PRC){echo '巳启动画线,点撀此按钮修改线组或线色。若未有启动画线,此处操作在画布上加字体符号。';}else if($_SESSION[tn]==EN){echo 'APP user clicks on this button to alter drawing line color or width when draw enabling. If the APP is not in the draw enabling mode, it\'s process is for adding icon font on the drawer.';}else{echo '巳啟動畫線,點撀此按鈕修改線組或線色。若未有啟動畫線,此處操作在畫布上加字體符號。';}?><br>

	<a href="#" class="ui-btn ui-btn-w ui-btn-inline"><i class="pigss-refresh"></i></a> 
	<?php if($_SESSION[tn]==PRC){echo '巳启动画线才显示此按钮,点撀此按钮将画布显示上次储存,最多显示对上7次。';}else if($_SESSION[tn]==EN){echo 'APP user clicks on this button to shift back to specific saved content [last 7 saved content only on a drawing]. This button will be showed when enabling drawing function.';}else{echo '巳啟動畫線才顯示此按鈕,點撀此按鈕將畫布顯示上次儲存,最多顯示對上7次。';}?><br>
	<a href="#" class="ui-btn ui-btn-w ui-btn-inline" style="color:black"><i class="pigss-refresh"></i></a> 
	<?php if($_SESSION[tn]==PRC){echo '巳启动画线才显示此按钮,点撀此按钮将操作画布显示的储存。';}else if($_SESSION[tn]==EN){echo 'APP user clicks on this button to shift content on the drawer forward to the saved content. This button will be showed when enabling drawing function.';}else{echo '巳啟動畫線才顯示此按鈕,點撀此按鈕將操作畫布顯示的儲存。';}?><br>
	<a href="#" data-rel="popup" class="ui-btn ui-btn-w ui-btn-inline"><i class="pigss-pictures"></i></a>
	<?php if($_SESSION[tn]==PRC){echo '巳启动画线才显示此按钮,点撀此按钮将内容储存。';}else if($_SESSION[tn]==EN){echo 'APP user clicks on this button to save drawer content. This button will be showed when enabling drawer function.';}else{echo '巳啟動畫線才顯示此按鈕,點撀此按鈕將內容儲存。';}?><br>

	

	<a href="#" class="ui-btn ui-btn-w ui-btn-inline"><i class="pigss-info"></i></a>
	<?php if($_SESSION[tn]==PRC){echo '相关\'解释按钮档案\',您巳设置才有此按钮,用户点撀此按钮将内容以popup显示。';}else if($_SESSION[tn]==EN){echo 'It is about the \'Explanation file\'. You need to fill in this file name to enable this button. APP user clicks on this button to show popup content.';}else{echo '相關\'解釋按鈕檔案\',您巳設置才有此按鈕,用戶點撀此按鈕將內容以popup顯示。';}?>
	<p><?php if($_SESSION[tn]==PRC){echo '若在画布上设有音频数据及解释按钮,音频的控制是显示在解释popup上。';}else if($_SESSION[tn]==EN){echo 'If audio data and info button are added to the drawer, the audio control can be found on the Explanation popup.';}else{echo '若在畫布上設有音頻數據及解釋按鈕,音頻的控制是顯示在解釋popup上。';}?></p>	
	

	</div>

	<a href="#infn" data-rel="popup" data-transition="pop" class="ui-btn ui-btn-b ui-btn-inline ui-corner-all ui-mini">? <?php if($_SESSION[tn]==PRC){echo '画线使用解释';}else if($_SESSION[tn]==EN){echo 'Drawing Usage';}else{echo '畫線使用解釋';}?></a>
	<div data-role="popup" id="infn" data-position-to="window" data-theme="f" style="padding:5px" class="ifrwidthps"><a href="#" class="popn ui-btn-z ui-corner-all ui-icon-delete ui-btn-icon-notext" data-rel="back"></a>
	<HR>
	<p><b style="color:blue"><?php if($_SESSION[tn]==PRC){echo '画线操作:';}else if($_SESSION[tn]==EN){echo 'Drawing process:';}else{echo '畫線操作:';}?></b> </p>
<HR>

<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '启用画线';}else if($_SESSION[tn]==EN){echo 'Enable Drawer';}else{echo '啟用畫線';}?></b> 
<a href="#" class="ui-btn ui-btn-w ui-btn-inline" data-clr="pink"><span class="pigss-pencil"></span></a>  
<?php if($_SESSION[tn]==PRC){echo '用户在画布上点撀此按钮启用画线。';}else if($_SESSION[tn]==EN){echo 'APP user can click this button on the drawer to enable this drawing function.';}else{echo '用戶在畫布上點撀此按鈕啟用畫線。';}?>
<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '修改设定';}else if($_SESSION[tn]==EN){echo 'Amend setting';}else{echo '修改設定';}?></b> 
<a href="#" class="ui-btn ui-btn-w ui-btn-inline" data-clr="pink"><span class="pigss-star"></span></a>  
<?php if($_SESSION[tn]==PRC){echo '用户点撀此按钮进行画线设定修改。';}else if($_SESSION[tn]==EN){echo 'APP user can click this button to amend drawing parameters.';}else{echo '用戶點撀此按鈕進行畫線設定修改。';}?>
<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '修改画线';}else if($_SESSION[tn]==EN){echo 'Amend drawing';}else{echo '修改畫線';}?></b> 
<a href="#" class="ui-btn ui-btn-w ui-btn-inline" data-clr="pink"><span class="pigss-refresh"></span></a>  
<?php if($_SESSION[tn]==PRC){echo '用户点撀此按钮进行返到之前画线步骤。';}else if($_SESSION[tn]==EN){echo 'APP user can click this button to back to previous drawing step if step saving exiting.';}else{echo '用戶點撀此按鈕進行返到之前畫線步驟。';}?>
<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '储存画线';}else if($_SESSION[tn]==EN){echo 'Saving drawing';}else{echo '儲存畫線';}?></b> 
<a href="#" class="ui-btn ui-btn-w ui-btn-inline" data-clr="pink"><span style="color:yellow" class="pigss-pictures"></span></a>  
<?php if($_SESSION[tn]==PRC){echo '用户点撀此按钮储存画线步骤。';}else if($_SESSION[tn]==EN){echo 'APP user can click this button to save previous drawing step.';}else{echo '用戶點撀此按鈕儲存畫線步驟。';}?>
</p>

<HR>
<h4 style="color:blue"><?php if($_SESSION[tn]==PRC){echo '以下是相关画线设定';}else if($_SESSION[tn]==EN){echo 'The following is about drawing parameter';}else{echo '以下是相關畫線設定';}?></h4>
<HR>
<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '画线颜色';}else if($_SESSION[tn]==EN){echo 'Line color';}else{echo '畫線顏色';}?></b> 
<a href="#" class="ui-btn ui-btn-w ui-btn-inline" data-clr="pink"><span style="color:pink" class="pigss-article"></span></a>  
<?php if($_SESSION[tn]==PRC){echo '点撀此等按钮选用画线颜色。';}else if($_SESSION[tn]==EN){echo '.';}else{echo '點撀此等按鈕選用畫線顏色。';}?>
<?php if($_SESSION[tn]==PRC){echo '选颜色区域下的推杆按钮,调节线粗。';}else if($_SESSION[tn]==EN){echo 'APP user can use the slider under the color selection area to adjust line width.';}else{echo '選顏色區域下的推杆按鈕,調節線粗。';}?></p>

<p><?php if($_SESSION[tn]==PRC){echo '若选用此键入按钮旁的颜色,您能用三个推杆按钮调节颜色,颜色显示在一个此种<a href="#" class="ui-btn ui-btn-w ui-btn-inline"><span class="pigss-article"></span></a>按钮内,再点撀此按钮作选用,再点撀键入按钮作实。';}else if($_SESSION[tn]==EN){echo 'APP user can use the three sliders to adjust custom color which will show on an article button<a href="#" class="ui-btn ui-btn-w ui-btn-inline"><span class="pigss-article"></span>. You can click it for selecting this color and click the edit button to confirm.';}else{echo '若選用此鍵入按鈕旁的顏色,您能用三個推杆按鈕調節顏色,顏色顯示在一個此種<a href="#" class="ui-btn ui-btn-w ui-btn-inline"><span class="pigss-article"></span></a>按鈕內,再點撀此按鈕作選用,再點撀鍵入按鈕作實。';}?><a href="#" class="ui-btn ui-btn-z ui-btn-inline ui-btn-icon-notext ui-icon-edit"></a></p><HR>

<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '清除画布';}else if($_SESSION[tn]==EN){echo 'Color Line';}else{echo '清除畫布';}?></b> 
<a href="#" id="dwrmp" class="ui-btn ui-btn-w ui-btn-icon-left ui-btn-inline ui-icon-delete"><span class="pigss-pictures"></span></a>
<?php if($_SESSION[tn]==PRC){echo '点撀此按钮清除画布上所有画线。';}else if($_SESSION[tn]==EN){echo 'APP user can click this button to clear all drawings on the drawer.';}else{echo '點撀此按鈕清除畫布上所有畫線。';}?>
</p>
<HR>
<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '储存画布作品';}else if($_SESSION[tn]==EN){echo 'Saving design';}else{echo '儲存畫布作品';}?></b> 
<a data-nbr="0"  class="ui-btn ui-btn-inline ui-btn-w"><span class="pigss-pictures" style="color:yellow"></span> ?</a>
<?php if($_SESSION[tn]==PRC){echo '点撀此按钮储存画布作品。最多能储存8个作品。点撀一次在按钮上显示选符,再点撀一次才作实。';}else if($_SESSION[tn]==EN){echo 'APP user can click this button to save design. The maximum number of design saving is eight. Clicking this button will show a tick symbol icon on it and clicking it again is to confirm saving.';}else{echo '點撀此按鈕儲存畫布作品。最多能储存8個作品。點撀一次在按鈕上顯示選符,再點撀一次才作實。';}?>
</p>

<HR>
<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '调用画布作品';}else if($_SESSION[tn]==EN){echo 'Use drawing design';}else{echo '調用畫布作品';}?></b> 
<a data-nbr="0"  class="ui-btn ui-btn-inline ui-btn-w"><span class="pigss-pencil" style="color:yellow"></span> ?</a>
<?php if($_SESSION[tn]==PRC){echo '点撀此等按钮显示画布作品,再点撀一次复制内容到画布。';}else if($_SESSION[tn]==EN){echo 'APP user can click this button to show design and click it again is to copy design to the drawer.';}else{echo '點撀此等按鈕顯示畫布作品,再點撀一次複制內容到畫布。';}?>
</p>


<HR>
<h4 style="color:black"><?php if($_SESSION[tn]==PRC){echo '背景图像';}else if($_SESSION[tn]==EN){echo 'Background picture';}else{echo '背景圖像';}?></h4>
<p><?php if($_SESSION[tn]==PRC){echo '能在加图像字体的操作进行修改。';}else if($_SESSION[tn]==EN){echo 'You can alter it in adding icon font processes.';}else{echo '能在加圖像字體的操作進行修改。';}?></p>


<HR>
<h4 style="color:black"><?php if($_SESSION[tn]==PRC){echo '限用';}else if($_SESSION[tn]==EN){echo 'Usage limitation';}else{echo '限用';}?></h4>
<p><?php if($_SESSION[tn]==PRC){echo '只能在用户的合适设备屏的阔度大於高度才能使用画线。';}else if($_SESSION[tn]==EN){echo 'APP user can use this drawing function in appropriate device in landscape view.';}else{echo '只能在用戶的合適設備屏的闊度大於高度才能使用畫線。';}?></p>
	</div>
	
	
	
	
	<a href="#infns" data-rel="popup" data-transition="pop" class="ui-btn ui-btn-b ui-btn-inline ui-corner-all ui-mini">? <?php if($_SESSION[tn]==PRC){echo '添加资讯使用解释';}else if($_SESSION[tn]==EN){echo 'Interactive content adding';}else{echo '添加資訊使用解釋';}?></a>
	<div data-role="popup" id="infns" data-position-to="window" data-theme="f" style="padding:5px" class="ifrwidthps"><a href="#" class="popn ui-btn-z ui-corner-all ui-icon-delete ui-btn-icon-notext" data-rel="back"></a>
	<HR>
	<p><b style="color:blue"><?php if($_SESSION[tn]==PRC){echo '添加资讯操作:';}else if($_SESSION[tn]==EN){echo 'Interactive content process:';}else{echo '添加資訊操作:';}?></b> </p>
<HR>

<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '开启popup';}else if($_SESSION[tn]==EN){echo 'Open icon popup';}else{echo '開啟popup';}?></b> 
<a href="#" class="ui-btn ui-btn-w ui-btn-inline"><span class="pigss-star"></span></a>  
<?php if($_SESSION[tn]==PRC){echo '用户在画布上点撀此按钮开启设置图像字体的popup。';}else if($_SESSION[tn]==EN){echo 'APP user can click this button on the drawer to open icon selecting popup.';}else{echo '用戶在畫布上點撀此按鈕開啟設置圖像字體的popup。';}?></p>
<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '开启图像字体选用区';}else if($_SESSION[tn]==EN){echo 'Open icon selecting area';}else{echo '開啟圖像字體選用區';}?></b> <a href="#" class="ui-btn ui-btn-w ui-btn-inline"><span class="pigss-smile"></span></a>  
<?php if($_SESSION[tn]==PRC){echo '点撀此按钮开启图像字体选用。';}else if($_SESSION[tn]==EN){echo 'APP user can click this button on the drawer to open icon selecting area.';}else{echo '點撀此按鈕開啟圖像字體選用。';}?>
<?php if($_SESSION[tn]==PRC){echo '如需,选用颜色及线粗才点选图像字体,并参考下面的操作进行资讯添加及将图像字体和相关资讯贴到画布上。';}else if($_SESSION[tn]==EN){echo 'You may need to select color and line width before selecting icon font. APP user can follow the below steps to add information and paste the icon font with information to drawer. ';}else{echo '如需,選用顏色及線粗才點選圖像字體,並參考下面的操作進行資訊添加及將圖像字體和相關資訊貼到畫布上。';}?>
</p>
<HR>
<h4 style="color:black"><?php if($_SESSION[tn]==PRC){echo '画布上加字体符号/正方相片/视频/音频/标题';}else if($_SESSION[tn]==EN){echo 'Add icon font/thumbnail/video/audio/title to drawer';}else{echo '畫布上加字體符號/正方相片/視頻/音頻/標題';}?></h4><HR>
<p><?php if($_SESSION[tn]==PRC){echo '您选用颜色按钮调节字体符号颜色。';}else if($_SESSION[tn]==EN){echo 'APP user can select the color button to adjust icon font color.';}else{echo '您選用顏色按鈕調節字體符號顏色。';}?></p></p><HR>
<p><?php if($_SESSION[tn]==PRC){echo '您能用调节字体符号选择区域上的推杆按钮,调节字体尺寸。若此尺寸设置大於特定值,文字内容的尺寸定為最大的限制值。';}else if($_SESSION[tn]==EN){echo 'APP user can use the icon font size slider to adjust icon font size. If the selected value is greater than specifc value, the size of text content is limited.';}else{echo '您能用調節字體符號選擇區域上的推杆按鈕,調節字體尺寸。若此尺寸設置大於特定值,文字內容的尺寸定为最大的限制值。';}?></p><HR>	
<p><?php if($_SESSION[tn]==PRC){echo '选妥字体尺寸及颜色,再点选相关字体符号,有相应的字体符号显示,再在相关相片上点撀位置,符号显示在画布相关位置,用户能在画布上将字符拖拽到指定位置。';}else if($_SESSION[tn]==EN){echo 'APP user needs to select an icon font after icon size and color selection. The actual icon will be showed. APP user can drag and click a position on the picture. The icon will be placed on the drawer. APP user can drag the icon to desire position on it.';}else{echo '選妥字體尺寸及顏色,再點選相關字體符號,有相應的字體符號顯示,再在相關相片上點撀位置,符號顯示在畫布相關位置,用戶能在畫布上將字符拖拽到指定位置。';}?></p><HR>
<p><?php if($_SESSION[tn]==PRC){echo '用户能键入特定的互联网视频/音频丶标题或相片,若您有设置互联数据供用户调用,用户点撀键入项旁的相关符号按钮,能将您的数据填入相关的数据键入项内。';}else if($_SESSION[tn]==EN){echo 'APP user can enter specific video/audio of Internet source, title or photo. If you prepare these data value for APP use, APP user can click the icon button near related input field and select and copy these prepared data to the related value fields.';}else{echo '用戶能鍵入特定的互聯網視頻/音頻、標題或相片,若您有設置互聯數據供用戶調用,用戶點撀鍵入項旁的相關符號按鈕,能將您的數據填入相關的數據鍵入項內。';}?><BR>
<?php if($_SESSION[tn]==PRC){echo '标题';}else if($_SESSION[tn]==EN){echo 'title';}else{echo '標題';}?><a href="#"  class="ui-btn ui-btn-z ui-btn-inline ui-icon-comment ui-btn-icon-notext"></a>
<?php if($_SESSION[tn]==PRC){echo '视频';}else if($_SESSION[tn]==EN){echo 'video';}else{echo '視頻';}?><a href="#"  class="ui-btn ui-btn-z ui-btn-inline ui-icon-video ui-btn-icon-notext"></a>
<?php if($_SESSION[tn]==PRC){echo '音频';}else if($_SESSION[tn]==EN){echo 'audio';}else{echo '音頻';}?><a href="#"  class="ui-btn ui-btn-z ui-btn-inline ui-icon-audio ui-btn-icon-notext"></a>
<?php if($_SESSION[tn]==PRC){echo '相片';}else if($_SESSION[tn]==EN){echo 'photo';}else{echo '相片';}?><a href="#"  class="ui-btn ui-btn-z ui-btn-inline ui-icon-camera ui-btn-icon-notext"></a>

<p><?php if($_SESSION[tn]==PRC){echo '用戶亦能在视频/音频数据,填上相片丶应用页或特定网页,内容是显示在popup上。特定网页只能在您的设计变成应用才能浏览。';}else if($_SESSION[tn]==EN){echo 'APP user can add photo, APP page or specific Internet page to the audio/video data field. The content is showed on a popup when APP user clicking related button. About the specific Internet pages, you can only browse them when your design converting into APP status.';}else{echo '用戶亦能在視頻/音頻數據,填上相片、應用頁或特定網頁,內容是顯示在popup上。特定網頁只能在您的設計變成應用才能瀏覽。';}?></p>

<p><?php if($_SESSION[tn]==PRC){echo '对於互联音频链结,档名含[dw]显示不同形式,格式是档名[dw].格式,e.g. http://?????????/music[dw].wav。';}else if($_SESSION[tn]==EN){echo 'For the Internet audio link, filename containing [dw] is different in display style. The format is filename[dw].file type, e.g. http://??????????/music[dw].wav.';}else{echo '對於互聯音頻鏈結,檔名含[dw]顯示不同形式,格式是檔名[dw].格式,e.g. http://?????????/music[dw].wav。';}?></p>




	<p><?php if($_SESSION[tn]==PRC){echo '若在画布上设有音频数据及解释按钮,音频的控制是显示在解释popup上。';}else if($_SESSION[tn]==EN){echo 'If audio data and info button are added to the drawer, the audio control can be found on the Explanation popup.';}else{echo '若在畫布上設有音頻數據及解釋按鈕,音頻的控制是顯示在解釋popup上。';}?></p>
<HR>
	<p><a href="#"  style="padding:1px;" class="ui-btn ui-btn-w ui-btn-inline"><span class="pigss-pencil" style="font-size:35px;color:red;"></span></a>
<?php if($_SESSION[tn]==PRC){echo '用戶点撀此按钮,显示列表,能进行修改符号位置及内容。若进行内容或位置的修改,必须在此列表点撀相关标题。';}else if($_SESSION[tn]==EN){echo 'This button is to show data list for data amendment. APP user needs to click a title on the list when performing amendment.';}else{echo '用戶點撀此按鈕,顯示列表,能進行修改符號內容。若進行內容的修改,必須在此列表點撀相關標題。';}?></p>	
<p>	<a href="#" id="35dwWRTs1" style="padding:1px;" class="ui-btn ui-btn-w ui-btn-inline"><span class="pigss-link" style="font-size:35px;color:pink;"></span></a>
<?php if($_SESSION[tn]==PRC){echo '用户再点撀此按钮,能修改相关内容。当完成修改此等标题或附件内容或尺寸颜色,用户必须再点撀任何一个字体符号才能确实修改。';}else if($_SESSION[tn]==EN){echo 'This button is for title and attachment amendment of the icon. After content, size and color amendment, APP user needs to click an icon for amendment confirmation.';}else{echo '用戶再點撀此按鈕,能修改相關內容。當完成修改此等標題或附件內容或尺寸顏色,用戶必須再點撀任何一個字體符號才能確實修改。';}?></p>	

<p>	<a href="#"  style="padding:1px;" class="ui-btn ui-btn-w ui-btn-inline"><span class="pigss-newproduct" style="font-size:35px;color:blue;"></span></a>
<?php if($_SESSION[tn]==PRC){echo '用户点撀此按钮,才能添加字符,特别是在完成修改的时候。';}else if($_SESSION[tn]==EN){echo 'APP user needs to click this button to add new icon, particular in amendment finishing. ';}else{echo '用戶點撀此按鈕,才能添加字符,特別是在完成修改的時候。';}?></p>	

<p><?php if($_SESSION[tn]==PRC){echo '用户在画布上巳能拖拽符号,修改位置。';}else if($_SESSION[tn]==EN){echo 'The icon position on the drawer can be altered by draging it.';}else{echo '用戶在畫布上巳能拖拽符號,修改位置。';}?></p>	
<p><?php if($_SESSION[tn]==PRC){echo '巳填上的符号显示在列表内,列表上有x符号,点撀此符号,再点选列表上的相关符号,能删除符号。';}else if($_SESSION[tn]==EN){echo 'The selected icons will be showed on a list and a x button is showed above the list. APP user clicks on the x button to add x sign to the icon title, clicks the related icon title with x sign on the list to remove the icon.';}else{echo '巳填上的符號顯示在列表內,列表上有x符號,點撀此符號,再點選列表上的相關符號,能刪除符號。';}?></p>	


<p><?php if($_SESSION[tn]==PRC){echo '启用改位置或删除的按钮[如图的左上方],在显示如下时,点撀列表的标题是删除。';}else if($_SESSION[tn]==EN){echo 'APP user can switch the deletion function or position alteration function by clicking specific button [on top left corner]. For the below picture, it is about the deletion situation by clicking any title button.';}else{echo '啟用改位置或刪除的按鈕[如圖的左上方],在顯示如下時,點撀列表的標題是刪除。';}?></p>
<img src="images/dwicon1.png">
<p><?php if($_SESSION[tn]==PRC){echo '在显示如下时,点撀列表的标题是改位置。';}else if($_SESSION[tn]==EN){echo 'The following situation is about positioning.';}else{echo '在顯示如下時,點撀列表的標題是改位置。';}?></p>
<img src="images/dwicon.png">
<HR>
<p><?php if($_SESSION[tn]==PRC){echo '若您在应用内添加自定字符,用户能在字符选用区域内的填上字符名称,再点撀键入按钮作实。';}else if($_SESSION[tn]==EN){echo 'If you add your own custom icon fonts to APP, APP user can type the font name in icon selection area and click the edit button to confirm the selection.';}else{echo '若您在應用內添加自定字符,用戶能在字符選用區域內的填上字符名稱,再點撀鍵入按鈕作實。';}?></p>
<HR>
<h4 style="color:black"><?php if($_SESSION[tn]==PRC){echo '背景相片';}else if($_SESSION[tn]==EN){echo 'Background picture';}else{echo '背景相片';}?>/<?php if($_SESSION[tn]==PRC){echo 'popup按钮';}else if($_SESSION[tn]==EN){echo 'popup button';}else{echo 'popup按鈕';}?></h4>
<p><?php if($_SESSION[tn]==PRC){echo '若您巳填上档案路径,用户能设置此画布背景的互联网相片,用户填上url再点撀';}else if($_SESSION[tn]==EN){echo 'If you added file path, APP user can use his own picture stored on the Internet as the drawer background. APP user needs to fill in specific url and clicks this button ';}else{echo '若您巳填上檔案路徑,用戶能設置此畫布背景的互聯網相片,用戶填上url再點撀';}?><a href="#" class="ui-btn ui-btn-z ui-btn-inline" id="dwurls"><i class="pigss-pictures"></i></a>.</p>
	</div>
	
	<?php if($_SESSION[tn]==PRC){echo 'e.g.';}else if($_SESSION[tn]==EN){echo 'Example';}else{echo 'e.g.';}?> <br>
	<div><div class="ui-grid-solo" style="position:relative;" id="dwimgs">
	<div style="float:right;position:absolute;top:5%;right:15%;" data-corners="false" data-type="horizontal" data-role="controlgroup">
	<a href="#dwpop" id="dwstart" data-rel="popup"  class="ui-btn ui-btn-w ui-btn-inline"><i class="pigss-pencil"></i></a>  
	

	<a href="#dwICONpop" id="dwicon" data-rel="popup"  class="ui-btn ui-btn-w ui-btn-inline"><i class="pigss-star"></i></a> 
	<a id="dwundo" class="ui-btn ui-btn-w ui-btn-inline"><i class="pigss-refresh"></i></a> 
	<a id="dwdo" class="ui-btn ui-btn-w ui-btn-inline" style="color:red"><i class="pigss-refresh"></i></a> 
	<a href="#" id="dwsave" data-rel="popup" class="ui-btn ui-btn-w ui-btn-inline"><i class="pigss-pictures"></i></a></div> 

	<div id="dwimg"></div>
	</div><div id="dwsavep"></div>
	
		<audio id="dwAUDIO"><source src="" type="audio/wav"><source src="" type="audio/mpeg"></audio><div id="dwICONpop" data-role="popup" data-theme="a" style="padding:5px;height: 100%;width: 100%;top:0;left:-15px;" data-corners="false" class="ifrwidthps">
	<a href="#" data-rel="back" class="popn ui-btn ui-btn-z ui-btn-icon-notext ui-icon-delete"></a>
	<br><br>
	<div id="POPDW">
	<a href="#" class="dwrgb1 ui-btn ui-btn-w ui-btn-inline" data-clr="pink"><span style="color:pink" class="pigss-article"></span></a>  
	<a href="#" class="dwrgb1 ui-btn ui-btn-w ui-btn-inline" data-clr="red"><span style="color:red" class="pigss-article"></span></a>  
	<a href="#" class="dwrgb1 ui-btn ui-btn-w ui-btn-inline" data-clr="orange"><span style="color:orange" class="pigss-article"></span></a>  
	<a href="#" class="dwrgb1 ui-btn ui-btn-w ui-btn-inline" data-clr="yellow"><span style="color:yellow" class="pigss-article"></span></a>  
	<a href="#" class="dwrgb1 ui-btn ui-btn-w ui-btn-inline" data-clr="green"><span style="color:green" class="pigss-article"></span></a>  
	<a href="#" class="dwrgb1 ui-btn ui-btn-w ui-btn-inline" data-clr="blue"><span style="color:blue" class="pigss-article"></span></a>  
	<a href="#" class="dwrgb1 ui-btn ui-btn-x ui-btn-inline" data-clr="LightBlue"><span style="color:LightBlue" class="pigss-article"></span></a>  
	<a href="#" class="dwrgb1 ui-btn ui-btn-w ui-btn-inline" data-clr="purple"><span style="color:purple" class="pigss-article"></span></a>  
	<a href="#" class="dwrgb1 ui-btn ui-btn-w ui-btn-inline" data-clr="black"><span style="color:black" class="pigss-article"></span></a>  
	<a href="#" class="dwrgb1 ui-btn ui-btn-w ui-btn-inline" data-clr="white"><span style="color:white" class="pigss-article"></span></a>  

	
	<div id="dwwdh"><input name="dwwdhv" id="dwwdhv" type="range" min="0" max="1" step="0.1" value="0.5" data-theme="w" data-highlight="true"></div>
	<a href="#" id="dwwdhn" class="ui-btn ui-btn-z ui-btn-icon-notext ui-icon-check"></a>
	<hr>
	<a href="#" id="dwrgb" class="ui-btn ui-btn-w ui-btn-inline" data-clr=""><span class="pigss-article"></span></a>
	<a href="#" id="dwwdhnx" class="ui-btn ui-btn-z ui-btn-inline ui-btn-icon-notext ui-icon-edit"></a>
	<hr>
	<br>
	<div><input name="dwwdhvx" id="dwwdhvx" type="range" min="0" max="255" step="1" value="0" data-theme="w" data-highlight="true"></div>
	<div><input name="dwwdhvy" id="dwwdhvy" type="range" min="0" max="255" step="1" value="0" data-theme="w" data-highlight="true"></div>
	<div><input name="dwwdhvz" id="dwwdhvz" type="range" min="0" max="255" step="1" value="0" data-theme="w" data-highlight="true"></div> 
			<hr>
	<a href="#" id="dwrmp" class="ui-btn ui-btn-w ui-btn-icon-left ui-btn-inline ui-icon-delete"><span class="pigss-pictures"></span></a>
	<hr>
	<div class="ui-grid-solo" id="dwstore">
	<a data-nbr="0"  class="ui-btn ui-btn-inline ui-btn-w"><span class="pigss-pictures" style="color:yellow"></span> 1</a>
	<a data-nbr="1"  class="ui-btn ui-btn-inline ui-btn-w"><span class="pigss-pictures" style="color:yellow"></span> 2</a>
	<a data-nbr="2"  class="ui-btn ui-btn-inline ui-btn-w"><span class="pigss-pictures" style="color:yellow"></span> 3</a>
	<a data-nbr="3"  class="ui-btn ui-btn-inline ui-btn-w"><span class="pigss-pictures" style="color:yellow"></span> 4</a>
	<a data-nbr="4"  class="ui-btn ui-btn-inline ui-btn-w"><span class="pigss-pictures" style="color:yellow"></span> 5</a>
	<a data-nbr="5"  class="ui-btn ui-btn-inline ui-btn-w"><span class="pigss-pictures" style="color:yellow"></span> 6</a>
	<a data-nbr="6"  class="ui-btn ui-btn-inline ui-btn-w"><span class="pigss-pictures" style="color:yellow"></span> 7</a>
	<a data-nbr="7"  class="ui-btn ui-btn-inline ui-btn-w"><span class="pigss-pictures" style="color:yellow"></span> 8</a>
	</div>
	<hr>
	<div class="ui-grid-solo" id="dwrtstore">
	<a data-nbr="0"  class="ui-btn ui-btn-inline ui-btn-w"><span class="pigss-pencil" style="color:yellow"></span> 1</a>
	<a data-nbr="1"  class="ui-btn ui-btn-inline ui-btn-w"><span class="pigss-pencil" style="color:yellow"></span> 2</a>
	<a data-nbr="2"  class="ui-btn ui-btn-inline ui-btn-w"><span class="pigss-pencil" style="color:yellow"></span> 3</a>
	<a data-nbr="3"  class="ui-btn ui-btn-inline ui-btn-w"><span class="pigss-pencil" style="color:yellow"></span> 4</a>
	<a data-nbr="4"  class="ui-btn ui-btn-inline ui-btn-w"><span class="pigss-pencil" style="color:yellow"></span> 5</a>
	<a data-nbr="5"  class="ui-btn ui-btn-inline ui-btn-w"><span class="pigss-pencil" style="color:yellow"></span> 6</a>
	<a data-nbr="6"  class="ui-btn ui-btn-inline ui-btn-w"><span class="pigss-pencil" style="color:yellow"></span> 7</a>
	<a data-nbr="7"  class="ui-btn ui-btn-inline ui-btn-w"><span class="pigss-pencil" style="color:yellow"></span> 8</a>
	</div>
	<hr>

	<div id="dwstoreshw" style="overflow:auto"></div>

	
	</div></div><div id="POPICONslt" data-role="popup" data-theme="a" style="padding:5px;height: 100%;width: 100%;top:0;left:-15px;" data-corners="false" class="ifrwidthps">
	<a href="#" data-rel="back" class="popn ui-btn ui-btn-z ui-btn-icon-notext ui-icon-delete"></a>
	<a href="#" id="dwicons" class="ui-btn ui-btn-w ui-btn-inline"><span class="pigss-smile"></span></a>
	<div style="position:relative;"><div id="dwbgarea" data-icon="" data-style="" style="position:absolute;width:100%"><img style="width:100%" src=""/></div><!--POPDW!-->	
	<div id="dwPOPmsgn" data-role="popup" data-theme="a" style="overflow-x:hidden;overflow-y:auto;padding:5px;height: 100%;width: 100%;top:0;left:-15px;" data-corners="false" class="ifrwidthps">
	<a href="#" id="dwPOPmsgnz" class="popn ui-btn ui-btn-z ui-btn-icon-notext ui-icon-carat-r"></a>
	<BR><BR>
	<div style="overflow-y:auto;width:85%">
	</div>
	</div><!--POPmsgn!-->
	
	<div id="dwPOPvideo" data-role="popup" data-theme="a" style="overflow-x:hidden;overflow-y:auto;padding:5px;height: 100%;width: 100%;top:0;left:-15px;" data-corners="false" class="ifrwidthps">
	<a href="#" id="dwPOPvideoz" class="popn ui-btn ui-btn-z ui-btn-icon-notext ui-icon-carat-r"></a>
	<a href="#" class="ui-btn ui-btn-z ui-btn-inline"><span class="pigss-videos"></span></a>/
	<a href="#" class="ui-btn ui-btn-z ui-btn-inline"><span class="pigss-pictures"></span></a>/
	<a href="#" class="ui-btn ui-btn-z ui-btn-inline"><span class="pigss-article"></span></a>
	<div style="overflow-y:auto;width:85%">
	</div>
	</div><!--POPvideo!-->
	
	<div id="dwPOPvoice" data-role="popup" data-theme="a" style="overflow-x:hidden;overflow-y:auto;padding:5px;height: 100%;width: 100%;top:0;left:-15px;" data-corners="false" class="ifrwidthps">
	<a href="#" id="dwPOPvoicez" class="popn ui-btn ui-btn-z ui-btn-icon-notext ui-icon-carat-r"></a>
	<BR><BR>
	<div style="overflow-y:auto;width:85%">
	</div>
	</div><!--POPvoice!-->
	
	<div id="dwPOPimg" data-role="popup" data-theme="a" style="overflow-x:hidden;overflow-y:auto;padding:5px;height: 100%;width: 100%;top:0;left:-15px;" data-corners="false" class="ifrwidthps">
	<a href="#" id="dwPOPimgz" class="popn ui-btn ui-btn-z ui-btn-icon-notext ui-icon-carat-r"></a>
	<BR><BR>
	<div style="overflow-y:auto;width:85%">
	</div>
	</div><!--POPimg!--><div id="POPICON" data-role="popup" data-theme="a" style="overflow-x:hidden;overflow-y:auto;padding:5px;height: 100%;width: 100%;top:0;left:-15px;" data-corners="false" class="ifrwidthps">
	<a href="#" id="POPICONz" class="popn ui-btn ui-btn-z ui-btn-icon-notext ui-icon-carat-r"></a>
	<a href="#" id="dwWRTs" style="padding:1px;" class="ui-btn ui-btn-w ui-btn-inline"><span class="pigss-link" style="font-size:35px;color:pink;"></span></a>
	<a href="#" id="dwiconSLTsPOPs" style="padding:1px;" class="ui-btn ui-btn-w ui-btn-inline"><span class="pigss-pencil" style="font-size:35px;color:red;"></span></a>
	<a href="#" id="dwiconws" style="padding:1px;" class="ui-btn ui-btn-w ui-btn-inline"><span class="pigss-newproduct" style="font-size:35px;color:blue;"></span></a>
	<HR>
	<div data-role="controlgroup" data-type="horizontal" data-corners="false">
	<a href="#" class="dwrgb1 ui-btn ui-btn-w ui-btn-inline" data-clr="pink"><span style="color:pink" class="pigss-article"></span></a>  
	<a href="#" class="dwrgb1 ui-btn ui-btn-w ui-btn-inline" data-clr="red"><span style="color:red" class="pigss-article"></span></a>  
	<a href="#" class="dwrgb1 ui-btn ui-btn-w ui-btn-inline" data-clr="orange"><span style="color:orange" class="pigss-article"></span></a>  
	<a href="#" class="dwrgb1 ui-btn ui-btn-w ui-btn-inline" data-clr="yellow"><span style="color:yellow" class="pigss-article"></span></a>  
	<a href="#" class="dwrgb1 ui-btn ui-btn-w ui-btn-inline" data-clr="green"><span style="color:green" class="pigss-article"></span></a>  
	</div><div data-role="controlgroup" data-type="horizontal" data-corners="false">
	<a href="#" class="dwrgb1 ui-btn ui-btn-w ui-btn-inline" data-clr="blue"><span style="color:blue" class="pigss-article"></span></a>  
	<a href="#" class="dwrgb1 ui-btn ui-btn-w ui-btn-inline" data-clr="LightBlue"><span style="color:LightBlue" class="pigss-article"></span></a>  
	<a href="#" class="dwrgb1 ui-btn ui-btn-w ui-btn-inline" data-clr="purple"><span style="color:purple" class="pigss-article"></span></a>  
	<a href="#" class="dwrgb1 ui-btn ui-btn-w ui-btn-inline" data-clr="black"><span style="color:black" class="pigss-article"></span></a>  
	<a href="#" class="dwrgb1 ui-btn ui-btn-w ui-btn-inline" data-clr="white"><span style="color:white" class="pigss-article"></span></a>  
	</div>
	<hr>

<input name="iconbtnv" id="iconbtnv" type="range" min="6" max="150" step="1" value="18" data-theme="w" data-highlight="true">

<div class="ui-grid-solo" data-theme="a" style="padding:5px;overflow-y:auto;">
<div class="vws ui-grid-solo" style="width:95%">
<div id="iconbtn" data-role="controlgroup" data-type="horizontal" data-corners="false">
	<a href="#" class="iconbtn1 ui-btn ui-btn-w ui-btn-inline" ids="chat"><span class="pigss-chat"></span></a>	
	<a href="#" class="iconbtn1 ui-btn ui-btn-w ui-btn-inline" ids="bigsale"><span class="pigss-bigsale"></span></a>
	<a href="#" class="iconbtn1 ui-btn ui-btn-w ui-btn-inline" ids="bunny"><span class="pigss-bunny"></span></a>	
	<a href="#" class="iconbtn1 ui-btn ui-btn-w ui-btn-inline" ids="coupon"><span class="pigss-coupon"></span></a>
	<a href="#" class="iconbtn1 ui-btn ui-btn-w ui-btn-inline" ids="discodancer"><span class="pigss-discodancer"></span></a>
	<a href="#" class="iconbtn1 ui-btn ui-btn-w ui-btn-inline" ids="airplanefly"><span class="pigss-airplanefly"></span></a>
	<a href="#" class="iconbtn1 ui-btn ui-btn-w ui-btn-inline" ids="drinks"><span class="pigss-drinks"></span></a>
	<a href="#" class="iconbtn1 ui-btn ui-btn-w ui-btn-inline" ids="gift"><span class="pigss-gift"></span></a>
	<a href="#" class="iconbtn1 ui-btn ui-btn-w ui-btn-inline" ids="gifts"><span class="pigss-gifts"></span></a>
	<a href="#" class="iconbtn1 ui-btn ui-btn-w ui-btn-inline" ids="music"><span class="pigss-music"></span></a>
	<a href="#" class="iconbtn1 ui-btn ui-btn-w ui-btn-inline" ids="newproduct"><span class="pigss-newproduct"></span></a>
	<a href="#" class="iconbtn1 ui-btn ui-btn-w ui-btn-inline" ids="panda"><span class="pigss-panda"></span></a>
	<a href="#" class="iconbtn1 ui-btn ui-btn-w ui-btn-inline" ids="pocketmoney"><span class="pigss-pocketmoney"></span></a>
	<a href="#" class="iconbtn1 ui-btn ui-btn-w ui-btn-inline" ids="salerecommed"><span class="pigss-salerecommed"></span></a>
	<a href="#" class="iconbtn1 ui-btn ui-btn-w ui-btn-inline" ids="santa"><span class="pigss-santa"></span></a>
	<a href="#" class="iconbtn1 ui-btn ui-btn-w ui-btn-inline" ids="sign-percent"><span class="pigss-sign-percent"></span></a>
	<a href="#" class="iconbtn1 ui-btn ui-btn-w ui-btn-inline" ids="tbn"><span class="pigss-tbn"></span></a>
	<a href="#" class="iconbtn1 ui-btn ui-btn-w ui-btn-inline" ids="valentinesday"><span class="pigss-valentinesday"></span></a>
	<a href="#" class="iconbtn1 ui-btn ui-btn-w ui-btn-inline" ids="laugh"><span class="pigss-laugh"></span></a>
	<a href="#" class="iconbtn1 ui-btn ui-btn-w ui-btn-inline" ids="loveface"><span class="pigss-loveface"></span></a>
	<a href="#" class="iconbtn1 ui-btn ui-btn-w ui-btn-inline" ids="noanswer"><span class="pigss-noanswer"></span></a>
	<a href="#" class="iconbtn1 ui-btn ui-btn-w ui-btn-inline" ids="noanswer1"><span class="pigss-noanswer1"></span></a>
	<a href="#" class="iconbtn1 ui-btn ui-btn-w ui-btn-inline" ids="noanswer2"><span class="pigss-noanswer2"></span></a>
	<a href="#" class="iconbtn1 ui-btn ui-btn-w ui-btn-inline" ids="notsmile"><span class="pigss-notsmile"></span></a>
	<a href="#" class="iconbtn1 ui-btn ui-btn-w ui-btn-inline" ids="notsmile1"><span class="pigss-notsmile1"></span></a>
	<a href="#" class="iconbtn1 ui-btn ui-btn-w ui-btn-inline" ids="sick"><span class="pigss-sick"></span></a>
	<a href="#" class="iconbtn1 ui-btn ui-btn-w ui-btn-inline" ids="smile"><span class="pigss-smile"></span></a>
	<a href="#" class="iconbtn1 ui-btn ui-btn-w ui-btn-inline" ids="smile1"><span class="pigss-smile1"></span></a>
	<a href="#" class="iconbtn1 ui-btn ui-btn-w ui-btn-inline" ids="smiling"><span class="pigss-smiling"></span></a>
	<a href="#" class="iconbtn1 ui-btn ui-btn-w ui-btn-inline" ids="smiling1"><span class="pigss-smiling1"></span></a>
	<a href="#" class="iconbtn1 ui-btn ui-btn-w ui-btn-inline" ids="smiling2"><span class="pigss-smiling2"></span></a>
	<a href="#" class="iconbtn1 ui-btn ui-btn-w ui-btn-inline" ids="surprised"><span class="pigss-surprised"></span></a>
	<a href="#" class="iconbtn1 ui-btn ui-btn-w ui-btn-inline" ids="surprised1"><span class="pigss-surprised1"></span></a>
	<a href="#" class="iconbtn1 ui-btn ui-btn-w ui-btn-inline" ids="thinking"><span class="pigss-thinking"></span></a>
	<a href="#" class="iconbtn1 ui-btn ui-btn-w ui-btn-inline" ids="tired"><span class="pigss-tired"></span></a>
	<a href="#" class="iconbtn1 ui-btn ui-btn-w ui-btn-inline" ids="tongue"><span class="pigss-tongue"></span></a>
	<a href="#" class="iconbtn1 ui-btn ui-btn-w ui-btn-inline" ids="tongue1"><span class="pigss-tongue1"></span></a>
	<a href="#" class="iconbtn1 ui-btn ui-btn-w ui-btn-inline" ids="tongue2"><span class="pigss-tongue2"></span></a>
	<a href="#" class="iconbtn1 ui-btn ui-btn-w ui-btn-inline" ids="tongue3"><span class="pigss-tongue3"></span></a>
	<a href="#" class="iconbtn1 ui-btn ui-btn-w ui-btn-inline" ids="tongue5"><span class="pigss-tongue5"></span></a>
	<a href="#" class="iconbtn1 ui-btn ui-btn-w ui-btn-inline" ids="winking"><span class="pigss-winking"></span></a>
	<a href="#" class="iconbtn1 ui-btn ui-btn-w ui-btn-inline" ids="yummy"><span class="pigss-yummy"></span></a>
	<a href="#" class="iconbtn1 ui-btn ui-btn-w ui-btn-inline" ids="angry"><span class="pigss-angry"></span></a>
	<a href="#" class="iconbtn1 ui-btn ui-btn-w ui-btn-inline" ids="confused"><span class="pigss-confused"></span></a>
	<a href="#" class="iconbtn1 ui-btn ui-btn-w ui-btn-inline" ids="cry"><span class="pigss-cry"></span></a>
	
	<a href="#" class="iconbtn1 ui-btn ui-btn-w ui-btn-inline" ids="user"><span class="pigss-user"></span></a>
	<a href="#" class="iconbtn1 ui-btn ui-btn-w ui-btn-inline" ids="location"><span class="pigss-location"></span></a>
	<a href="#" class="iconbtn1 ui-btn ui-btn-w ui-btn-inline" ids="mobile"><span class="pigss-mobile"></span></a>
	<a href="#" class="iconbtn1 ui-btn ui-btn-w ui-btn-inline" ids="screen"><span class="pigss-screen"></span></a>
	<a href="#" class="iconbtn1 ui-btn ui-btn-w ui-btn-inline" ids="mail"><span class="pigss-mail"></span></a>
	<a href="#" class="iconbtn1 ui-btn ui-btn-w ui-btn-inline" ids="help"><span class="pigss-help"></span></a>
	<a href="#" class="iconbtn1 ui-btn ui-btn-w ui-btn-inline" ids="videos"><span class="pigss-videos"></span></a>
	<a href="#" class="iconbtn1 ui-btn ui-btn-w ui-btn-inline" ids="pictures"><span class="pigss-pictures"></span></a>
	<a href="#" class="iconbtn1 ui-btn ui-btn-w ui-btn-inline" ids="link"><span class="pigss-link"></span></a>
	<a href="#" class="iconbtn1 ui-btn ui-btn-w ui-btn-inline" ids="search"><span class="pigss-search"></span></a>
	<a href="#" class="iconbtn1 ui-btn ui-btn-w ui-btn-inline" ids="download"><span class="pigss-download"></span></a>
	<a href="#" class="iconbtn1 ui-btn ui-btn-w ui-btn-inline" ids="pencil"><span class="pigss-pencil"></span></a>
	<a href="#" class="iconbtn1 ui-btn ui-btn-w ui-btn-inline" ids="info"><span class="pigss-info"></span></a>
	<a href="#" class="iconbtn1 ui-btn ui-btn-w ui-btn-inline" ids="article"><span class="pigss-article"></span></a>
	<a href="#" class="iconbtn1 ui-btn ui-btn-w ui-btn-inline" ids="clock"><span class="pigss-clock"></span></a>
	<a href="#" class="iconbtn1 ui-btn ui-btn-w ui-btn-inline" ids="star"><span class="pigss-star"></span></a>

	<a href="#" class="iconbtn1 ui-btn ui-btn-w ui-btn-inline" ids="heart"><span class="pigss-heart"></span></a>
	<a href="#" class="iconbtn1 ui-btn ui-btn-w ui-btn-inline" ids="file"><span class="pigss-file"></span></a>
	<a href="#" class="iconbtn1 ui-btn ui-btn-w ui-btn-inline" ids="feed"><span class="pigss-feed"></span></a>
	<a href="#" class="iconbtn1 ui-btn ui-btn-w ui-btn-inline" ids="refresh"><span class="pigss-refresh"></span></a>
	<a href="#" class="iconbtn1 ui-btn ui-btn-w ui-btn-inline" ids="images"><span class="pigss-images"></span></a>
	<a href="#" class="iconbtn1 ui-btn ui-btn-w ui-btn-inline" ids="heart2"><span class="pigss-heart2"></span></a>
	<a href="#" class="iconbtn1 ui-btn ui-btn-w ui-btn-inline" ids="bookmark"><span class="pigss-bookmark"></span></a>
	</div>
	</div>
	
	<div id="dwiconSLTsPOP" data-role="popup" data-theme="a" style="overflow-x:hidden;overflow-y:auto;padding:5px;height: 100%;width: 100%;top:0;left:-15px;" data-corners="false" class="ifrwidthps"><a href="#" id="dwiconSLTsPOPz" class="popn ui-btn ui-btn-z ui-btn-icon-notext ui-icon-carat-r"></a>
	<BR><BR>
	<div id="dwiconSLTs"></div>
	</div>
	
	<div id="POPWRT" data-role="popup" data-theme="a" style="overflow-x:hidden;overflow-y:auto;padding:5px;height: 100%;width: 100%;top:0;left:-15px;" data-corners="false" class="ifrwidthps"><a href="#" id="POPWRTz" class="popn ui-btn ui-btn-z ui-btn-icon-notext ui-icon-carat-r"></a>
	<BR><BR>
	<input type="text" data-corners="false" id="dwmsgvlu" data-theme="f" data-clear-btn="true">
	<a href="#"  id="dwmsgvlun" class="ui-btn ui-btn-z ui-btn-inline ui-icon-comment ui-btn-icon-notext"></a>
	<input type="text" data-corners="false" id="dwvideovlu" data-theme="f" data-clear-btn="true">
	<a href="#" id="dwvoicevlun" class="ui-btn ui-btn-z ui-btn-inline ui-icon-audio ui-btn-icon-notext"></a>/<a href="#" id="dwvideovlun" class="ui-btn ui-btn-z ui-btn-inline ui-icon-video ui-btn-icon-notext"></a>
	
	<input type="text" data-corners="false" id="dwimgvlu" data-theme="f" data-clear-btn="true">
	<a href="#" id="dwimgvlun" class="ui-btn ui-btn-z ui-btn-inline ui-icon-camera ui-btn-icon-notext"></a></div></div></div><BR>
	<a id="dwiconslt" class=""><span class="" data-vlu="" style=""></span></a>
	
	</div>
	</div>

	<div id="navigations" data-role="popup" data-theme="none">
	<ul style="min-width:210px;" data-role="listview" data-inset="true">
	<li data-icon="edit"><a href="design.php" data-ajax="false"><?php if($_SESSION[tn]==PRC){echo '设计步骤';}else if($_SESSION[tn]==EN){echo 'Design Step';}else{echo '設計步驟';}?></a></li>
	<!--<li><a href="deignote.php" data-ajax="false"><?php if($_SESSION[tn]==PRC){echo '设计笔记';}else if($_SESSION[tn]==EN){echo 'Design Note';}else{echo '設計筆記';}?></a></li>!-->
	<li><a href="project.php" data-ajax="false"><?php if($_SESSION[tn]==PRC){echo '专案管理';}else if($_SESSION[tn]==EN){echo 'Project Management';}else{echo '專案管理';}?></a></li>
	<li><a href="tool.php" data-ajax="false"><?php if($_SESSION[tn]==PRC){echo '工具';}else if($_SESSION[tn]==EN){echo 'Tools';}else{echo '工具';}?></a></li>


	<li><a href="explanation.php" data-ajax="false"><?php if($_SESSION[tn]==PRC){echo '解释';}else if($_SESSION[tn]==EN){echo 'Explanation';}else{echo '解釋';}?></a></li>


	</ul></div><!-- /navigation -->	
	<hr>
	<div class="copyright">&copy; 2015 Lee Wai Kwok(Hong Kong). JSTRUST CONSULTANCY. <?php if($_SESSION[tn]==PRC){echo '版权所有';}else if($_SESSION[tn]==EN){echo 'All Rights Reserved.';}else{echo '版權所有';}?></div>
	</div><!-- /content -->
	</div><!-- /page -->
</body></html>
<script src="../js/appsystem.js"></script>
<script>
//localStorage.clear();
$(document).on('pageshow', '.page', function() {

dwimg('','','','images/1.png','pink','','','','','','');
});
//if(navigator.userAgent.match(/(iPhone|iPod|iPad|Android|IEMobile)/)){
//$('.icondw').icondw('','');
//;}else{
//$('#dwimgs').on('click',function (){$('.icondw').icondw('','');})
//;}

</script>
<?php 
$tdy=0;
$tdy=date('Y-m-d');
if($_POST['img'] and $pj and $_SESSION[guanyin1] and $_SESSION[guanyin1]==$_POST[guanyin1]){

	if($ap and !preg_match('/^[0-9]*$/', $ap))exit;
	if($pj and !preg_match('/^[0-9]*$/', $pj))exit;	
	if($pn and !preg_match('/^[0-9]*$/', $pn))exit;	
		
			if($_POST[imgbg]){
			$bgtheme = 'z';
			if(strpos($_POST[imgbg],'http://')!==false or strpos($_POST[imgbg],'https://')!==false){$images = '';}else{$images = 'images/';}
			if(strlen($_POST[imgbg])==1){$bghtml = '';$bgtheme = htmlspecialchars($_POST[imgbg]);}		
			else if(strpos($_POST[imgbg],'#')!==false or strpos($_POST[imgbg],'rgba(')!==false  or strpos($_POST[imgbg],'rgb(')!==false){$bghtml = 'background-color:'.htmlspecialchars($_POST[imgbg]).';';$bgtheme = 'z';}
			else if(strpos($_POST[imgbg],'[xy]')!==false){$bghtml = 'background-image:url('.$images.htmlspecialchars($_POST[imgbg]).');';$bgtheme = 'z';}
			else{$bghtml = 'background-image:url('.$images.htmlspecialchars($_POST[imgbg]).');background-size:100%;background-repeat:repeat-y;';}
			;}else{$bghtml = '';$bgtheme = 'w';}

			$popup .= '<!--data'.$pn.'@#@'.htmlspecialchars($_POST[img]).'@#@'.htmlspecialchars($_POST[url]).'@#@'.htmlspecialchars($_POST[imgbg]).'@#@'.htmlspecialchars($_POST[html]).'@#@'.htmlspecialchars($_POST[clr]).'@#@'.htmlspecialchars($_POST[wdh]).'@#@'.htmlspecialchars($_POST[urls]).'@#@'.htmlspecialchars($_POST[iconn]).'@#@'.$_POST[infopopbg].'@#@'.$_POST[dwpopbg].'@#@'.$_POST[iconpopbg].'@#@'.$_POST[iconfilepopbg].'@#@'.$_POST[listpopbg].'@#@'.$_POST[titlepopbg].'@#@'.$_POST[videopopbg].'@#@'.$_POST[audiopopbg].'@#@'.$_POST[picpopbg].'@#@'.$_POST[positionpopbg].'data!-->';
			
			
			if($_POST['url']){
				$url = '<a href="#" class="ui-btn ui-btn-z ui-btn-inline" id="'.$pj.$ap.'dwurls'.$pn.'" ><i class="pigss-pictures"></i></a><a href="#" data-rel="popup" class="ui-btn ui-btn-z ui-btn-inline" id="'.$pj.$ap.'dwsURLbtn'.$pn.'"><i class="pigss-chat"></i></a>
	<input type="text" id="'.$pj.$ap.'dwurl'.$pn.'" value="'.htmlspecialchars($_POST['url']).'" data-clear-btn="true"><HR>';
			}else{
				$url = '<br><br>';
			;}
			
			
	function imgbg($imgbg){
			if(strpos($imgbg,'http://')!==false or strpos($imgbg,'https://')!==false){$images = '';}else{$images = 'images/';}
			if(strpos($imgbg,'#')!==false or strpos($imgbg,'rgba(')!==false  or strpos($imgbg,'rgb(')!==false){$bghtml = 'background-color:'.htmlspecialchars($imgbg).';';}
			else if(strpos($imgbg,'[xy]')!==false){$bghtml = 'background-image:url('.$images.htmlspecialchars($imgbg).');';}
			else{$bghtml = 'background-image:url('.$images.htmlspecialchars($imgbg).');background-size:100%;background-repeat:repeat-y;';}
			return $bghtml;
			;}
			
			if($_POST[infopopbg]){
				if(strlen($_POST[infopopbg])==1){$infopopbg = 'data-theme="'.htmlspecialchars($_POST[infopopbg]).'" style="padding:5px;height: 100%;width: 100%;top:0;left:-15px;"';}
				else{$infopopbg =  'data-theme="z" style="padding:5px;height: 100%;width: 100%;top:0;left:-15px;'.imgbg($_POST[infopopbg]).'"';}
			}else{$infopopbg = 'data-theme="w" style="padding:5px;height: 100%;width: 100%;top:0;left:-15px;"';}			
			
			if($_POST[dwpopbg]){
				if(strlen($_POST[dwpopbg])==1){$dwpopbg = 'data-theme="'.htmlspecialchars($_POST[dwpopbg]).'" style="padding:5px;height: 100%;width: 100%;top:0;left:-15px;"';}
				else{$dwpopbg =  'data-theme="z" style="padding:5px;height: 100%;width: 100%;top:0;left:-15px;'.imgbg($_POST[dwpopbg]).'"';}
			}else{$dwpopbg = 'data-theme="a" style="padding:5px;height: 100%;width: 100%;top:0;left:-15px;"';}		
			
			if($_POST[iconpopbg]){
				if(strlen($_POST[iconpopbg])==1){$iconpopbg = 'data-theme="'.htmlspecialchars($_POST[iconpopbg]).'" style="padding:5px;height: 100%;width: 100%;top:0;left:-15px;"';}
				else{$iconpopbg =  'data-theme="z" style="overflow-x:hidden;overflow-y:auto;padding:5px;height: 100%;width: 100%;top:0;left:-15px;'.imgbg($_POST[iconpopbg]).'"';}
			}else{$iconpopbg = 'data-theme="a" style="overflow-x:hidden;overflow-y:auto;padding:5px;height: 100%;width: 100%;top:0;left:-15px;"';}		
			
			if($_POST[iconfilepopbg]){
				if(strlen($_POST[iconfilepopbg])==1){$iconfilepopbg = 'data-theme="'.htmlspecialchars($_POST[iconfilepopbg]).'" style="padding:5px;height: 100%;width: 100%;top:0;left:-15px;"';}
				else{$iconfilepopbg =  'data-theme="z" style="overflow-x:hidden;overflow-y:auto;padding:5px;height: 100%;width: 100%;top:0;left:-15px;'.imgbg($_POST[iconfilepopbg]).'"';}
			}else{$iconfilepopbg = 'data-theme="a" style="overflow-x:hidden;overflow-y:auto;padding:5px;height: 100%;width: 100%;top:0;left:-15px;"';}						

			if($_POST[listpopbg]){
				if(strlen($_POST[listpopbg])==1){$listpopbg = 'data-theme="'.htmlspecialchars($_POST[listpopbg]).'" style="padding:5px;height: 100%;width: 100%;top:0;left:-15px;"';}
				else{$listpopbg =  'data-theme="z" style="overflow-x:hidden;overflow-y:auto;padding:5px;height: 100%;width: 100%;top:0;left:-15px;'.imgbg($_POST[listpopbg]).'"';}
			}else{$listpopbg = 'data-theme="a" style="overflow-x:hidden;overflow-y:auto;padding:5px;height: 100%;width: 100%;top:0;left:-15px;"';}	

			if($_POST[titlepopbg]){
				if(strlen($_POST[titlepopbg])==1){$titlepopbg = 'data-theme="'.htmlspecialchars($_POST[titlepopbg]).'" style="padding:5px;height: 100%;width: 100%;top:0;left:-15px;"';}
				else{$titlepopbg =  'data-theme="z" style="overflow-x:hidden;overflow-y:auto;padding:5px;height: 100%;width: 100%;top:0;left:-15px;'.imgbg($_POST[titlepopbg]).'"';}
			}else{$titlepopbg = 'data-theme="a" style="overflow-x:hidden;overflow-y:auto;padding:5px;height: 100%;width: 100%;top:0;left:-15px;"';}				


			if($_POST[videopopbg]){
				if(strlen($_POST[videopopbg])==1){$videopopbg = 'data-theme="'.htmlspecialchars($_POST[videopopbg]).'" style="padding:5px;height: 100%;width: 100%;top:0;left:-15px;"';}
				else{$videopopbg =  'data-theme="z" style="overflow-x:hidden;overflow-y:auto;padding:5px;height: 100%;width: 100%;top:0;left:-15px;'.imgbg($_POST[videopopbg]).'"';}
			}else{$videopopbg = 'data-theme="a" style="overflow-x:hidden;overflow-y:auto;padding:5px;height: 100%;width: 100%;top:0;left:-15px;"';}			

			if($_POST[audiopopbg]){
				if(strlen($_POST[audiopopbg])==1){$audiopopbg = 'data-theme="'.htmlspecialchars($_POST[audiopopbg]).'" style="padding:5px;height: 100%;width: 100%;top:0;left:-15px;"';}
				else{$audiopopbg =  'data-theme="z" style="overflow-x:hidden;overflow-y:auto;padding:5px;height: 100%;width: 100%;top:0;left:-15px;'.imgbg($_POST[audiopopbg]).'"';}
			}else{$audiopopbg = 'data-theme="a" style="overflow-x:hidden;overflow-y:auto;padding:5px;height: 100%;width: 100%;top:0;left:-15px;"';}			


			if($_POST[picpopbg]){
				if(strlen($_POST[picpopbg])==1){$picpopbg = 'data-theme="'.htmlspecialchars($_POST[picpopbg]).'" style="padding:5px;height: 100%;width: 100%;top:0;left:-15px;"';}
				else{$picpopbg =  'data-theme="z" style="overflow-x:hidden;overflow-y:auto;padding:5px;height: 100%;width: 100%;top:0;left:-15px;'.imgbg($_POST[picpopbg]).'"';}
			}else{$picpopbg = 'data-theme="a" style="overflow-x:hidden;overflow-y:auto;padding:5px;height: 100%;width: 100%;top:0;left:-15px;"';}			
			

			if($_POST[positionpopbg]){
				if(strlen($_POST[positionpopbg])==1){$positionpopbg = 'data-theme="'.htmlspecialchars($_POST[positionpopbg]).'" style="padding:5px;height: 100%;width: 100%;top:0;left:-15px;"';}
				else{$positionpopbg =  'data-theme="z" style="padding:5px;height: 100%;width: 100%;top:0;left:-15px;'.imgbg($_POST[positionpopbg]).'"';}
			}else{$positionpopbg = 'data-theme="a" style="padding:5px;height: 100%;width: 100%;top:0;left:-15px;"';}			
															
	$popup .= '<div class="ui-grid-solo" style="position:relative;" id="'.$pj.$ap.'dwimgs'.$pn.'">
	<div style="float:right;position:absolute;top:5%;right:15%;z-index:2;'.$bghtml.'" data-corners="false" data-type="horizontal" data-role="controlgroup">
	<a href="#'.$pj.$ap.'dwpop'.$pn.'" id="'.$pj.$ap.'dwstart'.$pn.'" data-rel="popup"  class="ui-btn ui-btn-'.$bgtheme.' ui-btn-inline"><i class="pigss-pencil"></i></a>  
	

	<a href="#'.$pj.$ap.'dwICONpop'.$pn.'" id="'.$pj.$ap.'dwicon'.$pn.'" data-rel="popup"  class="ui-btn ui-btn-'.$bgtheme.' ui-btn-inline"><i class="pigss-star"></i></a> 
	<a id="'.$pj.$ap.'dwundo'.$pn.'" class="ui-btn ui-btn-'.$bgtheme.' ui-btn-inline"><i class="pigss-refresh"></i></a> 
	<a id="'.$pj.$ap.'dwdo'.$pn.'" class="ui-btn ui-btn-'.$bgtheme.' ui-btn-inline" style="color:red"><i class="pigss-refresh"></i></a> 
	<a href="#" id="'.$pj.$ap.'dwsave'.$pn.'" data-rel="popup" class="ui-btn ui-btn-'.$bgtheme.' ui-btn-inline"><i class="pigss-pictures"></i></a>';
	if($_POST[html])$popup .= '<a href="#'.$pj.$ap.'dwinfs'.$pn.'" id="'.$pj.$ap.'dwinf'.$pn.'" data-rel="popup" class="ui-btn ui-btn-'.$bgtheme.' ui-btn-inline"><i class="pigss-info"></i></a>';
	$popup .= '</div> 

	<div style="overflow-y:hidden;overflow-x:auto;width:100%;"><div id="'.$pj.$ap.'dwimg'.$pn.'"  style="position:relative;"></div></div>
	</div><div id="'.$pj.$ap.'dwsavep'.$pn.'"></div>
	<audio id="'.$pj.$ap.'dwAUDIO'.$pn.'"><source src="" type="audio/wav"><source src="" type="audio/mpeg"></audio>';
	
	if($_POST[html])$popup .= '<div id="'.$pj.$ap.'dwinfs'.$pn.'" '.$infopopbg.' data-role="popup" data-corners="false" class="ifrwidthps"><a href="#" data-rel="back" class="popn ui-btn ui-btn-z ui-btn-icon-notext ui-icon-delete"></a>
	<div id="'.$pj.$ap.'dwvctr'.$pn.'" style="display:none"><BR><BR>
	<span id="'.$pj.$ap.'dwplaydur'.$pn.'n"></span><div id="'.$pj.$ap.'dwtopos'.$pn.'"><input name="'.$pj.$ap.'dwtoposition'.$pn.'" id="'.$pj.$ap.'dwtoposition'.$pn.'" type="range" data-role="none" min="0" max="1" step="0.1" value="" data-theme="x" data-highlight="true"></div><a href="#" id="'.$pj.$ap.'dwtopositn'.$pn.'" class="ui-btn ui-btn-z ui-btn-icon-notext ui-icon-clock"></a><div id="'.$pj.$ap.'dwvolm'.$pn.'"><input name="'.$pj.$ap.'dwvolmn'.$pn.'" id="'.$pj.$ap.'dwvolmn'.$pn.'" type="range" data-role="none" min="0" max="1" step="0.1" value="0.8" data-theme="x" data-highlight="true"></div><a href="#" id="'.$pj.$ap.'dwvoln'.$pn.'" class="ui-btn ui-btn-z ui-btn-icon-notext ui-icon-audio"></a><HR></div>
	<iframe src="'.htmlspecialchars($_POST[html]).'"  style="width:100%" seamless frameBorder="0" ></iframe></div>';
	//if($_POST[dws])$popup .= '<div id="'.$pj.$ap.'dws'.$pn.'" data-role="popup" data-corners="false" class="ifrwidthps"><a href="#" data-rel="back" class="popn ui-btn ui-btn-z ui-btn-icon-notext ui-icon-delete"></a><iframe src=""  style="width:100%" seamless frameBorder="0" ></iframe></div><div id="'.$pj.$ap.'dws'.$pn.'" data-role="popup" data-corners="false" class="ifrwidthps"><a href="#" data-rel="back" class="popn ui-btn ui-btn-z ui-btn-icon-notext ui-icon-delete"></a><iframe src=""  style="width:100%" seamless frameBorder="0" ></iframe></div>';
	
	$popup .= '<div id="'.$pj.$ap.'dwICONpop'.$pn.'" data-role="popup" '.$dwpopbg.' data-corners="false" class="ifrwidthps">
	<a href="#" data-rel="back" class="popn ui-btn ui-btn-z ui-btn-icon-notext ui-icon-delete"></a>
	'.$url.'
	<div id="'.$pj.$ap.'POPDW'.$pn.'">
	<a href="#" class="'.$pj.$ap.'dwrgb'.$pn.' ui-btn ui-btn-w ui-btn-inline" data-clr="pink"><span style="color:pink" class="pigss-article"></span></a>  
	<a href="#" class="'.$pj.$ap.'dwrgb'.$pn.' ui-btn ui-btn-w ui-btn-inline" data-clr="red"><span style="color:red" class="pigss-article"></span></a>  
	<a href="#" class="'.$pj.$ap.'dwrgb'.$pn.' ui-btn ui-btn-w ui-btn-inline" data-clr="orange"><span style="color:orange" class="pigss-article"></span></a>  
	<a href="#" class="'.$pj.$ap.'dwrgb'.$pn.' ui-btn ui-btn-w ui-btn-inline" data-clr="yellow"><span style="color:yellow" class="pigss-article"></span></a>  
	<a href="#" class="'.$pj.$ap.'dwrgb'.$pn.' ui-btn ui-btn-w ui-btn-inline" data-clr="green"><span style="color:green" class="pigss-article"></span></a>  
	<a href="#" class="'.$pj.$ap.'dwrgb'.$pn.' ui-btn ui-btn-w ui-btn-inline" data-clr="blue"><span style="color:blue" class="pigss-article"></span></a>  
	<a href="#" class="'.$pj.$ap.'dwrgb'.$pn.' ui-btn ui-btn-x ui-btn-inline" data-clr="LightBlue"><span style="color:LightBlue" class="pigss-article"></span></a>  
	<a href="#" class="'.$pj.$ap.'dwrgb'.$pn.' ui-btn ui-btn-w ui-btn-inline" data-clr="purple"><span style="color:purple" class="pigss-article"></span></a>  
	<a href="#" class="'.$pj.$ap.'dwrgb'.$pn.' ui-btn ui-btn-w ui-btn-inline" data-clr="black"><span style="color:black" class="pigss-article"></span></a>  
	<a href="#" class="'.$pj.$ap.'dwrgb'.$pn.' ui-btn ui-btn-w ui-btn-inline" data-clr="white"><span style="color:white" class="pigss-article"></span></a>  

	
	<div id="'.$pj.$ap.'dwwdh'.$pn.'"><input name="dwwdhv" id="'.$pj.$ap.'dwwdhv'.$pn.'" type="range" min="0" max="1" step="0.1" value="0.5" data-theme="w" data-highlight="true"></div>
	<a href="#" id="'.$pj.$ap.'dwwdhn'.$pn.'" class="ui-btn ui-btn-z ui-btn-icon-notext ui-icon-check"></a>
	<hr>
	<a href="#" id="'.$pj.$ap.'dwrgb'.$pn.'" class="ui-btn ui-btn-w ui-btn-inline" data-clr=""><span class="pigss-article"></span></a>
	<a href="#" id="'.$pj.$ap.'dwwdhnx'.$pn.'" class="ui-btn ui-btn-z ui-btn-inline ui-btn-icon-notext ui-icon-edit"></a>
	<hr>
	<br>
	<div><input name="dwwdhvx" id="'.$pj.$ap.'dwwdhvx'.$pn.'" type="range" min="0" max="255" step="1" value="0" data-theme="w" data-highlight="true"></div>
	<div><input name="dwwdhvy" id="'.$pj.$ap.'dwwdhvy'.$pn.'" type="range" min="0" max="255" step="1" value="0" data-theme="w" data-highlight="true"></div>
	<div><input name="dwwdhvz" id="'.$pj.$ap.'dwwdhvz'.$pn.'" type="range" min="0" max="255" step="1" value="0" data-theme="w" data-highlight="true"></div> 
			<hr>
	<a href="#" id="'.$pj.$ap.'dwrmp'.$pn.'" class="ui-btn ui-btn-w ui-btn-icon-left ui-btn-inline ui-icon-delete"><span class="pigss-pictures"></span></a>
	<hr>
	<div class="ui-grid-solo" id="'.$pj.$ap.'dwstore'.$pn.'">
	<a data-nbr="0"  class="ui-btn ui-btn-inline ui-btn-w"><span class="pigss-pictures" style="color:yellow"></span> 1</a>
	<a data-nbr="1"  class="ui-btn ui-btn-inline ui-btn-w"><span class="pigss-pictures" style="color:yellow"></span> 2</a>
	<a data-nbr="2"  class="ui-btn ui-btn-inline ui-btn-w"><span class="pigss-pictures" style="color:yellow"></span> 3</a>
	<a data-nbr="3"  class="ui-btn ui-btn-inline ui-btn-w"><span class="pigss-pictures" style="color:yellow"></span> 4</a>
	<a data-nbr="4"  class="ui-btn ui-btn-inline ui-btn-w"><span class="pigss-pictures" style="color:yellow"></span> 5</a>
	<a data-nbr="5"  class="ui-btn ui-btn-inline ui-btn-w"><span class="pigss-pictures" style="color:yellow"></span> 6</a>
	<a data-nbr="6"  class="ui-btn ui-btn-inline ui-btn-w"><span class="pigss-pictures" style="color:yellow"></span> 7</a>
	<a data-nbr="7"  class="ui-btn ui-btn-inline ui-btn-w"><span class="pigss-pictures" style="color:yellow"></span> 8</a>
	</div>
	<hr>
	<div class="ui-grid-solo" id="'.$pj.$ap.'dwrtstore'.$pn.'">
	<a data-nbr="0"  class="ui-btn ui-btn-inline ui-btn-w"><span class="pigss-pencil" style="color:yellow"></span> 1</a>
	<a data-nbr="1"  class="ui-btn ui-btn-inline ui-btn-w"><span class="pigss-pencil" style="color:yellow"></span> 2</a>
	<a data-nbr="2"  class="ui-btn ui-btn-inline ui-btn-w"><span class="pigss-pencil" style="color:yellow"></span> 3</a>
	<a data-nbr="3"  class="ui-btn ui-btn-inline ui-btn-w"><span class="pigss-pencil" style="color:yellow"></span> 4</a>
	<a data-nbr="4"  class="ui-btn ui-btn-inline ui-btn-w"><span class="pigss-pencil" style="color:yellow"></span> 5</a>
	<a data-nbr="5"  class="ui-btn ui-btn-inline ui-btn-w"><span class="pigss-pencil" style="color:yellow"></span> 6</a>
	<a data-nbr="6"  class="ui-btn ui-btn-inline ui-btn-w"><span class="pigss-pencil" style="color:yellow"></span> 7</a>
	<a data-nbr="7"  class="ui-btn ui-btn-inline ui-btn-w"><span class="pigss-pencil" style="color:yellow"></span> 8</a>
	</div>
	<hr>

	<div id="'.$pj.$ap.'dwstoreshw'.$pn.'" style="overflow:auto"></div>

	
	</div></div>';
	
	$popup .= '<div id="'.$pj.$ap.'POPICONslt'.$pn.'" data-role="popup" '.$positionpopbg.' data-corners="false" class="ifrwidthps">
	<a href="#" data-rel="back" class="popn ui-btn ui-btn-z ui-btn-icon-notext ui-icon-delete"></a>
	<a href="#" id="'.$pj.$ap.'dwicons'.$pn.'" class="ui-btn ui-btn-w ui-btn-inline"><span class="pigss-smile"></span></a>
	<div style="position:relative;"><div id="'.$pj.$ap.'dwbgarea'.$pn.'" data-icon="" data-style="" style="position:absolute;width:100%"><img style="width:100%" src=""/></div>';//
	
	
	$popup .= '<!--POPDW!-->	
	<div id="'.$pj.$ap.'dwPOPmsgn'.$pn.'" data-role="popup" '.$titlepopbg.' data-corners="false" class="ifrwidthps">
	<a href="#" id="'.$pj.$ap.'dwPOPmsgnz'.$pn.'" class="popn ui-btn ui-btn-z ui-btn-icon-notext ui-icon-carat-r"></a>
	<BR><BR>
	<div style="overflow-y:auto;width:85%">
	</div>
	</div><!--POPmsgn!-->
	
	<div id="'.$pj.$ap.'dwPOPvideo'.$pn.'" data-role="popup" '.$videopopbg.' data-corners="false" class="ifrwidthps">
	<a href="#" id="'.$pj.$ap.'dwPOPvideoz'.$pn.'" class="popn ui-btn ui-btn-z ui-btn-icon-notext ui-icon-carat-r"></a>
	<a href="#" class="ui-btn ui-btn-z ui-btn-inline"><span class="pigss-videos"></span></a>/
	<a href="#" class="ui-btn ui-btn-z ui-btn-inline"><span class="pigss-pictures"></span></a>/
	<a href="#" class="ui-btn ui-btn-z ui-btn-inline"><span class="pigss-article"></span></a>
	<div style="overflow-y:auto;width:85%">
	</div>
	</div><!--POPvideo!-->
	
	<div id="'.$pj.$ap.'dwPOPvoice'.$pn.'" data-role="popup" '.$audiopopbg.' data-corners="false" class="ifrwidthps">
	<a href="#" id="'.$pj.$ap.'dwPOPvoicez'.$pn.'" class="popn ui-btn ui-btn-z ui-btn-icon-notext ui-icon-carat-r"></a>
	<BR><BR>
	<div style="overflow-y:auto;width:85%">
	</div>
	</div><!--POPvoice!-->
	
	<div id="'.$pj.$ap.'dwPOPimg'.$pn.'" data-role="popup" '.$picpopbg.' data-corners="false" class="ifrwidthps">
	<a href="#" id="'.$pj.$ap.'dwPOPimgz'.$pn.'" class="popn ui-btn ui-btn-z ui-btn-icon-notext ui-icon-carat-r"></a>
	<BR><BR>
	<div style="overflow-y:auto;width:85%">
	</div>
	</div><!--POPimg!-->';
	
	if($_POST[iconn]){
	$iconn = explode(',',$_POST[iconn]);
	for($i=0;$i<sizeof($iconn);$i++){
		$iconnhtml .= '<a href="#" class="'.$pj.$ap.'iconbtn'.$pn.' ui-btn ui-btn-w ui-btn-inline" ids="'.htmlspecialchars($iconn[$i]).'"><span class="'.htmlspecialchars($iconn[$i]).'"></span></a>';
	;}
		if($iconnhtml)$iconnhtml = '<div data-role="controlgroup" data-type="horizontal" data-corners="false">'.$iconnhtml.'</div>';
	;}
	
	
	
	$popup .= '<div id="'.$pj.$ap.'POPICON'.$pn.'" data-role="popup" '.$iconpopbg.' data-corners="false" class="ifrwidthps">
	<a href="#" id="'.$pj.$ap.'POPICONz'.$pn.'" class="popn ui-btn ui-btn-z ui-btn-icon-notext ui-icon-carat-r"></a>
	<a href="#" id="'.$pj.$ap.'dwWRTs'.$pn.'" style="padding:1px;" class="ui-btn ui-btn-w ui-btn-inline"><span class="pigss-link" style="font-size:35px;color:pink;"></span></a>
	<a href="#" id="'.$pj.$ap.'dwiconSLTsPOPs'.$pn.'" style="padding:1px;" class="ui-btn ui-btn-w ui-btn-inline"><span class="pigss-pencil" style="font-size:35px;color:red;"></span></a>
	<a href="#" id="'.$pj.$ap.'dwiconws'.$pn.'" style="padding:1px;" class="ui-btn ui-btn-w ui-btn-inline"><span class="pigss-newproduct" style="font-size:35px;color:blue;"></span></a>
	<HR>
	<div data-role="controlgroup" data-type="horizontal" data-corners="false">
	<a href="#" class="'.$pj.$ap.'dwrgb'.$pn.' ui-btn ui-btn-w ui-btn-inline" data-clr="pink"><span style="color:pink" class="pigss-article"></span></a>  
	<a href="#" class="'.$pj.$ap.'dwrgb'.$pn.' ui-btn ui-btn-w ui-btn-inline" data-clr="red"><span style="color:red" class="pigss-article"></span></a>  
	<a href="#" class="'.$pj.$ap.'dwrgb'.$pn.' ui-btn ui-btn-w ui-btn-inline" data-clr="orange"><span style="color:orange" class="pigss-article"></span></a>  
	<a href="#" class="'.$pj.$ap.'dwrgb'.$pn.' ui-btn ui-btn-w ui-btn-inline" data-clr="yellow"><span style="color:yellow" class="pigss-article"></span></a>  
	<a href="#" class="'.$pj.$ap.'dwrgb'.$pn.' ui-btn ui-btn-w ui-btn-inline" data-clr="green"><span style="color:green" class="pigss-article"></span></a>  
	</div><div data-role="controlgroup" data-type="horizontal" data-corners="false">
	<a href="#" class="'.$pj.$ap.'dwrgb'.$pn.' ui-btn ui-btn-w ui-btn-inline" data-clr="blue"><span style="color:blue" class="pigss-article"></span></a>  
	<a href="#" class="'.$pj.$ap.'dwrgb'.$pn.' ui-btn ui-btn-w ui-btn-inline" data-clr="LightBlue"><span style="color:LightBlue" class="pigss-article"></span></a>  
	<a href="#" class="'.$pj.$ap.'dwrgb'.$pn.' ui-btn ui-btn-w ui-btn-inline" data-clr="purple"><span style="color:purple" class="pigss-article"></span></a>  
	<a href="#" class="'.$pj.$ap.'dwrgb'.$pn.' ui-btn ui-btn-w ui-btn-inline" data-clr="black"><span style="color:black" class="pigss-article"></span></a>  
	<a href="#" class="'.$pj.$ap.'dwrgb'.$pn.' ui-btn ui-btn-w ui-btn-inline" data-clr="white"><span style="color:white" class="pigss-article"></span></a>  
	</div>
	<hr>

<input name="iconbtnv" id="'.$pj.$ap.'iconbtnv'.$pn.'" type="range" min="6" max="150" step="1" value="18" data-theme="w" data-highlight="true">

<div class="ui-grid-solo" data-theme="a" style="padding:5px;overflow-y:auto;">
<div class="vws ui-grid-solo" style="width:95%">'.$iconnhtml.'
<div id="'.$pj.$ap.'iconbtn'.$pn.'" data-role="controlgroup" data-type="horizontal" data-corners="false">
	<a href="#" class="'.$pj.$ap.'iconbtn'.$pn.' ui-btn ui-btn-w ui-btn-inline" ids="chat"><span class="pigss-chat"></span></a>	
	<a href="#" class="'.$pj.$ap.'iconbtn'.$pn.' ui-btn ui-btn-w ui-btn-inline" ids="bigsale"><span class="pigss-bigsale"></span></a>
	<a href="#" class="'.$pj.$ap.'iconbtn'.$pn.' ui-btn ui-btn-w ui-btn-inline" ids="bunny"><span class="pigss-bunny"></span></a>	
	<a href="#" class="'.$pj.$ap.'iconbtn'.$pn.' ui-btn ui-btn-w ui-btn-inline" ids="coupon"><span class="pigss-coupon"></span></a>
	<a href="#" class="'.$pj.$ap.'iconbtn'.$pn.' ui-btn ui-btn-w ui-btn-inline" ids="discodancer"><span class="pigss-discodancer"></span></a>
	<a href="#" class="'.$pj.$ap.'iconbtn'.$pn.' ui-btn ui-btn-w ui-btn-inline" ids="airplanefly"><span class="pigss-airplanefly"></span></a>
	<a href="#" class="'.$pj.$ap.'iconbtn'.$pn.' ui-btn ui-btn-w ui-btn-inline" ids="drinks"><span class="pigss-drinks"></span></a>
	<a href="#" class="'.$pj.$ap.'iconbtn'.$pn.' ui-btn ui-btn-w ui-btn-inline" ids="gift"><span class="pigss-gift"></span></a>
	<a href="#" class="'.$pj.$ap.'iconbtn'.$pn.' ui-btn ui-btn-w ui-btn-inline" ids="gifts"><span class="pigss-gifts"></span></a>
	<a href="#" class="'.$pj.$ap.'iconbtn'.$pn.' ui-btn ui-btn-w ui-btn-inline" ids="music"><span class="pigss-music"></span></a>
	<a href="#" class="'.$pj.$ap.'iconbtn'.$pn.' ui-btn ui-btn-w ui-btn-inline" ids="newproduct"><span class="pigss-newproduct"></span></a>
	<a href="#" class="'.$pj.$ap.'iconbtn'.$pn.' ui-btn ui-btn-w ui-btn-inline" ids="panda"><span class="pigss-panda"></span></a>
	<a href="#" class="'.$pj.$ap.'iconbtn'.$pn.' ui-btn ui-btn-w ui-btn-inline" ids="pocketmoney"><span class="pigss-pocketmoney"></span></a>
	<a href="#" class="'.$pj.$ap.'iconbtn'.$pn.' ui-btn ui-btn-w ui-btn-inline" ids="salerecommed"><span class="pigss-salerecommed"></span></a>
	<a href="#" class="'.$pj.$ap.'iconbtn'.$pn.' ui-btn ui-btn-w ui-btn-inline" ids="santa"><span class="pigss-santa"></span></a>
	<a href="#" class="'.$pj.$ap.'iconbtn'.$pn.' ui-btn ui-btn-w ui-btn-inline" ids="sign-percent"><span class="pigss-sign-percent"></span></a>
	<a href="#" class="'.$pj.$ap.'iconbtn'.$pn.' ui-btn ui-btn-w ui-btn-inline" ids="tbn"><span class="pigss-tbn"></span></a>
	<a href="#" class="'.$pj.$ap.'iconbtn'.$pn.' ui-btn ui-btn-w ui-btn-inline" ids="valentinesday"><span class="pigss-valentinesday"></span></a>
	<a href="#" class="'.$pj.$ap.'iconbtn'.$pn.' ui-btn ui-btn-w ui-btn-inline" ids="laugh"><span class="pigss-laugh"></span></a>
	<a href="#" class="'.$pj.$ap.'iconbtn'.$pn.' ui-btn ui-btn-w ui-btn-inline" ids="loveface"><span class="pigss-loveface"></span></a>
	<a href="#" class="'.$pj.$ap.'iconbtn'.$pn.' ui-btn ui-btn-w ui-btn-inline" ids="noanswer"><span class="pigss-noanswer"></span></a>
	<a href="#" class="'.$pj.$ap.'iconbtn'.$pn.' ui-btn ui-btn-w ui-btn-inline" ids="noanswer1"><span class="pigss-noanswer1"></span></a>
	<a href="#" class="'.$pj.$ap.'iconbtn'.$pn.' ui-btn ui-btn-w ui-btn-inline" ids="noanswer2"><span class="pigss-noanswer2"></span></a>
	<a href="#" class="'.$pj.$ap.'iconbtn'.$pn.' ui-btn ui-btn-w ui-btn-inline" ids="notsmile"><span class="pigss-notsmile"></span></a>
	<a href="#" class="'.$pj.$ap.'iconbtn'.$pn.' ui-btn ui-btn-w ui-btn-inline" ids="notsmile1"><span class="pigss-notsmile1"></span></a>
	<a href="#" class="'.$pj.$ap.'iconbtn'.$pn.' ui-btn ui-btn-w ui-btn-inline" ids="sick"><span class="pigss-sick"></span></a>
	<a href="#" class="'.$pj.$ap.'iconbtn'.$pn.' ui-btn ui-btn-w ui-btn-inline" ids="smile"><span class="pigss-smile"></span></a>
	<a href="#" class="'.$pj.$ap.'iconbtn'.$pn.' ui-btn ui-btn-w ui-btn-inline" ids="smile1"><span class="pigss-smile1"></span></a>
	<a href="#" class="'.$pj.$ap.'iconbtn'.$pn.' ui-btn ui-btn-w ui-btn-inline" ids="smiling"><span class="pigss-smiling"></span></a>
	<a href="#" class="'.$pj.$ap.'iconbtn'.$pn.' ui-btn ui-btn-w ui-btn-inline" ids="smiling1"><span class="pigss-smiling1"></span></a>
	<a href="#" class="'.$pj.$ap.'iconbtn'.$pn.' ui-btn ui-btn-w ui-btn-inline" ids="smiling2"><span class="pigss-smiling2"></span></a>
	<a href="#" class="'.$pj.$ap.'iconbtn'.$pn.' ui-btn ui-btn-w ui-btn-inline" ids="surprised"><span class="pigss-surprised"></span></a>
	<a href="#" class="'.$pj.$ap.'iconbtn'.$pn.' ui-btn ui-btn-w ui-btn-inline" ids="surprised1"><span class="pigss-surprised1"></span></a>
	<a href="#" class="'.$pj.$ap.'iconbtn'.$pn.' ui-btn ui-btn-w ui-btn-inline" ids="thinking"><span class="pigss-thinking"></span></a>
	<a href="#" class="'.$pj.$ap.'iconbtn'.$pn.' ui-btn ui-btn-w ui-btn-inline" ids="tired"><span class="pigss-tired"></span></a>
	<a href="#" class="'.$pj.$ap.'iconbtn'.$pn.' ui-btn ui-btn-w ui-btn-inline" ids="tongue"><span class="pigss-tongue"></span></a>
	<a href="#" class="'.$pj.$ap.'iconbtn'.$pn.' ui-btn ui-btn-w ui-btn-inline" ids="tongue1"><span class="pigss-tongue1"></span></a>
	<a href="#" class="'.$pj.$ap.'iconbtn'.$pn.' ui-btn ui-btn-w ui-btn-inline" ids="tongue2"><span class="pigss-tongue2"></span></a>
	<a href="#" class="'.$pj.$ap.'iconbtn'.$pn.' ui-btn ui-btn-w ui-btn-inline" ids="tongue3"><span class="pigss-tongue3"></span></a>
	<a href="#" class="'.$pj.$ap.'iconbtn'.$pn.' ui-btn ui-btn-w ui-btn-inline" ids="tongue5"><span class="pigss-tongue5"></span></a>
	<a href="#" class="'.$pj.$ap.'iconbtn'.$pn.' ui-btn ui-btn-w ui-btn-inline" ids="winking"><span class="pigss-winking"></span></a>
	<a href="#" class="'.$pj.$ap.'iconbtn'.$pn.' ui-btn ui-btn-w ui-btn-inline" ids="yummy"><span class="pigss-yummy"></span></a>
	<a href="#" class="'.$pj.$ap.'iconbtn'.$pn.' ui-btn ui-btn-w ui-btn-inline" ids="angry"><span class="pigss-angry"></span></a>
	<a href="#" class="'.$pj.$ap.'iconbtn'.$pn.' ui-btn ui-btn-w ui-btn-inline" ids="confused"><span class="pigss-confused"></span></a>
	<a href="#" class="'.$pj.$ap.'iconbtn'.$pn.' ui-btn ui-btn-w ui-btn-inline" ids="cry"><span class="pigss-cry"></span></a>
	
	<a href="#" class="'.$pj.$ap.'iconbtn'.$pn.' ui-btn ui-btn-w ui-btn-inline" ids="user"><span class="pigss-user"></span></a>
	<a href="#" class="'.$pj.$ap.'iconbtn'.$pn.' ui-btn ui-btn-w ui-btn-inline" ids="location"><span class="pigss-location"></span></a>
	<a href="#" class="'.$pj.$ap.'iconbtn'.$pn.' ui-btn ui-btn-w ui-btn-inline" ids="mobile"><span class="pigss-mobile"></span></a>
	<a href="#" class="'.$pj.$ap.'iconbtn'.$pn.' ui-btn ui-btn-w ui-btn-inline" ids="screen"><span class="pigss-screen"></span></a>
	<a href="#" class="'.$pj.$ap.'iconbtn'.$pn.' ui-btn ui-btn-w ui-btn-inline" ids="mail"><span class="pigss-mail"></span></a>
	<a href="#" class="'.$pj.$ap.'iconbtn'.$pn.' ui-btn ui-btn-w ui-btn-inline" ids="help"><span class="pigss-help"></span></a>
	<a href="#" class="'.$pj.$ap.'iconbtn'.$pn.' ui-btn ui-btn-w ui-btn-inline" ids="videos"><span class="pigss-videos"></span></a>
	<a href="#" class="'.$pj.$ap.'iconbtn'.$pn.' ui-btn ui-btn-w ui-btn-inline" ids="pictures"><span class="pigss-pictures"></span></a>
	<a href="#" class="'.$pj.$ap.'iconbtn'.$pn.' ui-btn ui-btn-w ui-btn-inline" ids="link"><span class="pigss-link"></span></a>
	<a href="#" class="'.$pj.$ap.'iconbtn'.$pn.' ui-btn ui-btn-w ui-btn-inline" ids="search"><span class="pigss-search"></span></a>
	<a href="#" class="'.$pj.$ap.'iconbtn'.$pn.' ui-btn ui-btn-w ui-btn-inline" ids="download"><span class="pigss-download"></span></a>
	<a href="#" class="'.$pj.$ap.'iconbtn'.$pn.' ui-btn ui-btn-w ui-btn-inline" ids="pencil"><span class="pigss-pencil"></span></a>
	<a href="#" class="'.$pj.$ap.'iconbtn'.$pn.' ui-btn ui-btn-w ui-btn-inline" ids="info"><span class="pigss-info"></span></a>
	<a href="#" class="'.$pj.$ap.'iconbtn'.$pn.' ui-btn ui-btn-w ui-btn-inline" ids="article"><span class="pigss-article"></span></a>
	<a href="#" class="'.$pj.$ap.'iconbtn'.$pn.' ui-btn ui-btn-w ui-btn-inline" ids="clock"><span class="pigss-clock"></span></a>
	<a href="#" class="'.$pj.$ap.'iconbtn'.$pn.' ui-btn ui-btn-w ui-btn-inline" ids="star"><span class="pigss-star"></span></a>

	<a href="#" class="'.$pj.$ap.'iconbtn'.$pn.' ui-btn ui-btn-w ui-btn-inline" ids="heart"><span class="pigss-heart"></span></a>
	<a href="#" class="'.$pj.$ap.'iconbtn'.$pn.' ui-btn ui-btn-w ui-btn-inline" ids="file"><span class="pigss-file"></span></a>
	<a href="#" class="'.$pj.$ap.'iconbtn'.$pn.' ui-btn ui-btn-w ui-btn-inline" ids="feed"><span class="pigss-feed"></span></a>
	<a href="#" class="'.$pj.$ap.'iconbtn'.$pn.' ui-btn ui-btn-w ui-btn-inline" ids="refresh"><span class="pigss-refresh"></span></a>
	<a href="#" class="'.$pj.$ap.'iconbtn'.$pn.' ui-btn ui-btn-w ui-btn-inline" ids="images"><span class="pigss-images"></span></a>
	<a href="#" class="'.$pj.$ap.'iconbtn'.$pn.' ui-btn ui-btn-w ui-btn-inline" ids="heart2"><span class="pigss-heart2"></span></a>
	<a href="#" class="'.$pj.$ap.'iconbtn'.$pn.' ui-btn ui-btn-w ui-btn-inline" ids="bookmark"><span class="pigss-bookmark"></span></a>
	</div>
	</div>
	
	<div id="'.$pj.$ap.'dwiconSLTsPOP'.$pn.'" data-role="popup" '.$listpopbg.' data-corners="false" class="ifrwidthps"><a href="#" id="'.$pj.$ap.'dwiconSLTsPOPz'.$pn.'" class="popn ui-btn ui-btn-z ui-btn-icon-notext ui-icon-carat-r"></a>
	<BR><BR>
	<div id="'.$pj.$ap.'dwiconSLTs'.$pn.'"></div>
	</div>
	
	<div id="'.$pj.$ap.'POPWRT'.$pn.'" data-role="popup" '.$iconfilepopbg.' data-corners="false" class="ifrwidthps"><a href="#" id="'.$pj.$ap.'POPWRTz'.$pn.'" class="popn ui-btn ui-btn-z ui-btn-icon-notext ui-icon-carat-r"></a>
	<BR><BR>
	<input type="text" data-corners="false" id="'.$pj.$ap.'dwmsgvlu'.$pn.'" data-theme="f" data-clear-btn="true">
	<a href="#"  id="'.$pj.$ap.'dwmsgvlun'.$pn.'" class="ui-btn ui-btn-z ui-btn-inline ui-icon-comment ui-btn-icon-notext"></a>
	<input type="text" data-corners="false" id="'.$pj.$ap.'dwvideovlu'.$pn.'" data-theme="f" data-clear-btn="true">
	<a href="#" id="'.$pj.$ap.'dwvoicevlun'.$pn.'" class="ui-btn ui-btn-z ui-btn-inline ui-icon-audio ui-btn-icon-notext"></a>/<a href="#" id="'.$pj.$ap.'dwvideovlun'.$pn.'" class="ui-btn ui-btn-z ui-btn-inline ui-icon-video ui-btn-icon-notext"></a>
	
	<input type="text" data-corners="false" id="'.$pj.$ap.'dwimgvlu'.$pn.'" data-theme="f" data-clear-btn="true">
	<a href="#" id="'.$pj.$ap.'dwimgvlun'.$pn.'" class="ui-btn ui-btn-z ui-btn-inline ui-icon-camera ui-btn-icon-notext"></a>';
	//if($_POST[iconn])$popup .= '<input type="text" data-corners="false" id="'.$pj.$ap.'dwiconvlu'.$pn.'" data-theme="f" data-clear-btn="true"><a href="#" id="'.$pj.$ap.'dwiconvlun'.$pn.'" class="ui-btn ui-btn-z ui-btn-inline ui-icon-star ui-btn-icon-notext"></a>';
	
	if($_POST['url']){
		$popup .= '<input type="text" data-corners="false" id="'.$pj.$ap.'dwurl'.$pn.'" value="'.htmlspecialchars($_POST['url']).'" data-theme="f" data-clear-btn="true">
		<a href="#" class="ui-btn ui-btn-z ui-btn-inline" id="'.$pj.$ap.'dwurls'.$pn.'" ><i class="pigss-pictures"></i></a>';
			}
	$popup .= '</div>';

	//$popup .= '<a href="#" id="'.$pj.$ap.'dwiconbtn'.$pn.'" class="ui-btn ui-btn-w ui-icon-edit ui-btn-icon-notext ui-btn-inline"></a>';
	$popup .= '</div></div><BR>
	<a id="'.$pj.$ap.'dwiconslt'.$pn.'" class=""><span class="" data-vlu="" style=""></span></a>
	
	</div>
	
	</div>';
	

			
			if($roww[theme]){$theme = $roww[theme];}else{$theme = '';}
			
			if($roww[bg]){$roww[bg]=str_replace('/','',$roww[bg]);$roww[bg]=str_replace('\\','',$roww[bg]);$roww[bg]=str_replace('..','',$roww[bg]);}
			
			if(strpos($roww[bg],'http://')!==false or strpos($roww[bg],'https://')!==false){$images = '';}else{$images = 'images/';}
			
			if(strpos($roww[bg],'#')!==false or strpos($roww[bg],'rgba(')!==false  or strpos($roww[bg],'rgb(')!==false){$bghtml = 'background-color:'.htmlspecialchars($roww[bg]).';';}
			else if(strpos($roww[bg],'[xy]')!==false){$bghtml = 'background-image:url('.$images.htmlspecialchars($roww[bg]).');';}
			else{$bghtml = 'background-image:url('.$images.htmlspecialchars($roww[bg]).');background-size:100%;background-repeat:repeat-y;';}
	
			if($roww[bg]){$bgstyle = 'style="'.$bghtml.'"';}else{$bgstyle = '';}
			
			$webpopup = '<div data-role="page" id="web'.$ap.'" class="page" data-theme="'.htmlspecialchars($theme).'" '.$bgstyle.'><div  class="ui-content pagebg">';
			if($roww[style]=='app')$webpopup .= '<div data-role="controlgroup" class="plft" data-type="horizontal" data-corners="false"><a href="#'.$ap.'panel" data-rel="panel" class="menubg ui-btn ui-btn-y ui-btn-inline ui-mini ui-btn-icon-left ui-icon-bars">WEBMENU</a></div><!--panel!--><div id="'.$pj.$ap.'imgspop" data-theme="z" style="padding:5px;" data-role="popup" data-corners="false"><a href="#" data-rel="back" class="popn ui-btn ui-btn-z ui-btn-icon-notext ui-icon-delete"></a><div class="ifrspinn" style="position:relative;left:50%;width:100%">Loading...<BR><img src="css/images/ajax-loader.gif"></div><div class="imgspop"><img src=""></div></div>
		<div id="'.$pj.$ap.'ifrspop" data-theme="z" data-role="popup" data-corners="false" style="overflow-y:auto;" class="ifrwidthpn" ><a href="#" data-rel="back" class="popn ui-btn ui-btn-z ui-btn-icon-notext ui-icon-delete"></a><div class="ifrspinn" style="position:relative;left:50%;width:100%">Loading...<BR><img src="css/images/ajax-loader.gif"></div><iframe src="" style="width:100%" seamless frameBorder="0" ></iframe></div>
		<div class="ui-content" id="'.$pj.$ap.'pVideo" data-corners="false" data-role="popup" data-theme="x" data-tolerance="2,2"><iframe width="498" height="298" src="" seamless=""></iframe></div><div id="'.$pj.$ap.'pAudio" data-corners="false"  data-role="popup" style="color:black;background-color:rgba(255, 255, 255, 0.8);padding:5px;" class="ifrwidthps"><a href="#" data-rel="back" class="popn ui-btn ui-btn-z ui-btn-icon-notext ui-icon-delete"></a><BR><BR><i id="'.$pj.$ap.'audtn" ></i> &nbsp;<i  ></i><br><a href="#"  id="'.$pj.$ap.'playaudion" data-vlu="" style="border:none;" class="ui-btn ui-btn-w"><img style="width:50px" src="css/images/sound.svg"></a><BR><input id="'.$pj.$ap.'volmn" type="range" data-role="none" value="0.8"  step="0.1" min="0" max="1"><BR><input id="'.$pj.$ap.'toposn" type="range" data-role="none" value="0" step="0.1" min="0" max="1"><audio id="'.$pj.$ap.'audsn"><source src="" type="audio/mpeg"><source src="" type="audio/wav"></audio><div class="ifrspinn" style="position:relative;left:50%;width:100%">Loading...<BR><img src="css/images/ajax-loader.gif"></div></div>';
			if($roww[style]=='page')$webpopup .= '<a href="#" data-rel="back" class="menubgs plft ui-btn ui-btn ui-btn-inline ui-mini ui-btn-icon-left ui-icon-carat-l">WEBMENUS</a>';
			
			if($tl){$html = file_get_contents('../panel/'.$roww[pjnbr].'/'.$ap.'.html');$htmls = '';}


			if($bvtns == 1){
					$vnts  = '<div class="swiper-slide"><div id="'.$pj.$ap.'vnts'.$pn.'" class="vntsns">';
				;}else if($bvtns == 5){
					$vntsn  = '</div></div><!--vnts!-->';
				;}else if($bvtns == 6){
					$vnts  = '';$vntsn  = '';
				;}else{
					$vnts  = '<div class="swiper-slide"><div id="'.$pj.$ap.'vnts'.$pn.'" class="vntsns">';$vntsn  = '</div></div><!--vnts!-->';
				;}
			if($tabnbgdatn[0]){$tabnbgdatns = '<!--data-tabnbg'.$tabnbgdatn[0].'data-tabnbg!-->';}else{$tabnbgdatns = '<!--data-tabnbg@@@@@@data-tabnbg!-->';}
			$webpopup .= $html.'<!--part'.$pn.'!--><!--sysdwsys!-->'.$vnts.$popup.$vntsn.$tabnbgdatns.$htmls;
			$webpopup .= '</div><!--content!--></div><!--page!-->';
			
		 	
			
			$fpagtrns='../panel/'.$roww[pjnbr].'/'.$ap.'.html';
			file_put_contents($fpagtrns,$html.'<!--part'.$pn.'!--><!--sysdwsys!-->'.$vnts.$popup.$vntsn.$tabnbgdatns.$htmls);

			$fpagtrns='../panel/'.$roww[pjnbr].'/web'.$ap.'.html';
			file_put_contents($fpagtrns,$webpopup);

	

	
	
			if(!file_exists('../panel/'.$roww[pjnbr].'/web'.$ap.'.js')){
			$fpagtrns = '../panel/'.$roww[pjnbr].'/web'.$ap.'.js';
			$js = '/*$(document).on(\'pageshow\', \'#web'.$ap.'\', function(){*/';
			$js .= '/*});*/';
			file_put_contents($fpagtrns,$js);			
			
			;}
			if(strpos($_POST[img],'http://')!==false or strpos($_POST[img],'https://')!==false){$images = '';}else{$images = 'images/';}
			$_POST[img] = $images.$_POST[img];
			
			$jsweb = file_get_contents('../panel/'.$roww[pjnbr].'/web'.$ap.'.js');
				
				$jswebs=explode('/*webjs'.$pn.'*/',$jsweb);
				$jsweb = $jswebs[0].$jswebs[2];
				if(!preg_match('/^[0-9]*$/',$_POST[wdh]))$_POST[wdh] ='';
				$js = '/*webjs'.$pn.'*/';
				if($_POST[urls])$ints=str_replace('.','v.',$_POST[urls]);
				$js .= ';dwimg("'.$pj.'","'.$pj.$ap.'","'.$pn.'","'.htmlspecialchars($_POST[img]).'","'.htmlspecialchars($_POST[clr]).'","'.htmlspecialchars($_POST[wdh]).'","");/*ajax'.$ap.'ajax*/dwimgajax("'.$pj.$ap.'","'.$pn.'","'.htmlspecialchars($ints).'","'.htmlspecialchars($_POST[urls]).'");/*ajaxs*/';
				
				$js .= '/*webjs'.$pn.'*/'
				.'/*});*/';
				$jsweb=str_replace('/*});*/',$js,$jsweb);
				file_put_contents('../panel/'.$roww[pjnbr].'/web'.$ap.'.js',$jsweb);
			
	echo "<meta http-equiv='refresh' content='0;URL=dw.php?ap=".htmlspecialchars($roww[ap])."&pj=".htmlspecialchars($roww[pjnbr])."&pn=".htmlspecialchars($pn)."'>";
;}

?>
