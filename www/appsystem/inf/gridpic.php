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
    <title><?php if($_SESSION[tn]==PRC){echo '相片格[放大功能] - AppMoney712 移动应用设计系统';}else if($_SESSION[tn]==EN){echo 'Photo Grid[Enlarging function] - AppMoney712 APP Creation System';}else{echo '相片格[放大功能] - AppMoney712 移動應用設計系統';}?></title>
	<link href="../css/jquery.mobile-1.4.4.min.css" rel="stylesheet">
	<link href="../css/jquerymobile-1.4.4.min.css" rel="stylesheet">
	<link rel="stylesheet" href="../jscss/swiper.min.css">
	<link rel="stylesheet" href="../css/appsystem.css">	<link href="../css/icons/style.css" rel="stylesheet">
	<style type="text/css">
	</style>
	<script src="../js/jquery.js"></script>
	<script src="../js/jquery.mobile-1.4.4.min.js"></script>
	<script src="../js/swiper.jquery.min.js"></script>
	<script src="../js/gridpic.js"></script>

	<script>
	
	</script>
</head>
<body>
<div data-role="page" data-theme="b"  id="appageone" style="background-color:white;color:black">
	<div style="overflow: hidden;" data-role="header" data-theme="f">
	<a href="#navigations"  id="menubttn"  data-rel="popup" data-transition="pop" class="ui-btn ui-btn ui-btn-inline ui-corner-all ui-btn-icon-left ui-icon-bars"><?php if($_SESSION[tn]==PRC){echo '目录';}else if($_SESSION[tn]==EN){echo 'Menu';}else{echo '目錄';}?></a>
    <h1><?php if($_SESSION[tn]==PRC){echo '相片格[放大功能] - AppMoney712 移动应用设计系统';}else if($_SESSION[tn]==EN){echo 'Photo Grid[Enlarging function] - AppMoney712 APP Creation System';}else{echo '相片格[放大功能] - AppMoney712 移動應用設計系統';}?></h1>
	
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
	
		
	<a href="menudesign.php?pj=<?php echo htmlspecialchars($roww[pjnbr])?>&ap=<?php echo $ap?>&pn=<?php echo $pn?>&php=gridpic&plt=1" data-ajax="false" class="ui-btn ui-btn ui-btn-inline ui-corner-all ui-mini ui-btn-icon-left ui-icon-bars"><?php if($_SESSION[tn]==PRC){echo '专案应用页列表';}else if($_SESSION[tn]==EN){echo 'Project Page List';}else{echo '專案應用頁列表';}?></a>
	<?php ;}?>
	<a href="#tpss" data-rel="popup" data-transition="pop" class="ui-btn ui-btn-b ui-btn-inline ui-corner-all ui-mini">? <?php if($_SESSION[tn]==PRC){echo '解释';}else if($_SESSION[tn]==EN){echo 'Explanation';}else{echo '解釋';}?></a>
	<div data-role="popup" id="tpss" style="min-width:300px;max-width:85%" data-position-to="window" data-theme="f"> <a href="#" class="ui-btn ui-corner-all ui-icon-delete ui-btn-icon-notext ui-btn-right" data-rel="back"></a>

	<h4 style="color:black"><?php if($_SESSION[tn]==PRC){echo '使用';}else if($_SESSION[tn]==EN){echo 'Use';}else{echo '使用';}?></h4>
	<p><?php if($_SESSION[tn]==PRC){echo '您需点撀\'格数\'进行选择。您需预备相片并存於应用的panel/'.$roww[pjnbr].'/images档夹及特定互联网伺服器。';}else if($_SESSION[tn]==EN){echo 'You need to click and select the grid type and prepare pictures and store them in panel/'.$roww[pjnbr].'/images folder or specific Internet server.';}else{echo '您需點撀\'格數\'進行選擇。您需預備相片並存於應用的panel/'.$roww[pjnbr].'/images檔夾及特定互聯網伺服器。';}?></p>
	<p><?php if($_SESSION[tn]==PRC){echo '您能加格行,格内含细相片,用户点撀显示相片,相片内再有放大功能按钮。您的相片应四倍大于预计用户的浏览屏。';}else if($_SESSION[tn]==EN){echo 'You can add grids in a row and specify number of grids in a row. The grid is to contain small picture which APP user can click on it to show a bigger picture. You can use same URL for the grid picture and the bigger picture. The enlarging buttons are showed on the \'bigger photo\'. The quality of photo needs to be 4 times better than target APP user\'s device screen quality.';}else{echo '您能加格行,格內含細相片,用戶點撀顯示相片,相片內再有放大功能按鈕。您的相片應四倍大於預計用戶的瀏覽屏。';}?></p>
	<p><?php if($_SESSION[tn]==PRC){echo '细屏显示此设计,是没有浏览轴显示,用户拖拽画面浏览放大内容。';}else if($_SESSION[tn]==EN){echo 'The browsing bars on small screen are not showed. Mobile device user needs to swipe screen to browse popup picture.';}else{echo '細屏顯示此設計,是沒有瀏覽軸顯示,用戶拖拽畫面瀏覽放大內容。';}?></p>
	<p><?php if($_SESSION[tn]==PRC){echo '使用此项功能的相片总高不适合大于用户浏览设备高度。';}else if($_SESSION[tn]==EN){echo 'The height of showed pictures greater than the height of target user\'s device screen is not recommended.';}else{echo '使用此項功能的相片總高不適合大於用戶瀏覽設備高度。';}?></p>
	<hr>
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '互联AJAX数据';}else if($_SESSION[tn]==EN){echo 'Internet AJAX data';}else{echo '互聯AJAX數據';}?></b>
	<?php if($_SESSION[tn]==PRC){echo '只能用存於特定互联网的JSON格式档,请参考网站。不填写是使用相片数据,即应用内存的相片。';}else if($_SESSION[tn]==EN){echo 'You can use JSON format file stored in the Internet only. If you do not use the Internet data, APP data[photo data] is needed to use in your design.';}else{echo '只能用存於特定互聯網的JSON格式檔,請參考網站。不填寫是使用相片數據,即應用內存的相片。';}?><?php if($_SESSION[tn]==PRC){echo '相片数量等设定仍须填写。';}else if($_SESSION[tn]==EN){echo 'You still need to fill in the data such as Photo quantity.';}else{echo '相片數量等設定仍須填寫。';}?>
	</p>
	<hr>
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '相片数量';}else if($_SESSION[tn]==EN){echo 'Photo quantity';}else{echo '相片數量';}?></b>
	<?php if($_SESSION[tn]==PRC){echo '此区域的相片数量。填整数,提送才能键入相片数据。';}else if($_SESSION[tn]==EN){echo 'It is number of photo in this area. You need to enter integer. You can enter photo data after  clicking the SEND button.';}else{echo '此區域的相片數量。填整數,提送才能鍵入相片數據。';}?><?php if($_SESSION[tn]==PRC){echo '若改用互联数据,您亦应填写相片数据并填入相同的应用内的相片。';}else if($_SESSION[tn]==EN){echo 'If you use the Internet data, you still need to fill in photo data and use a same picture for the data.';}else{echo '若改用互聯數據,您亦應填寫相片數據並填入相同的應用內的相片。';}?></p>
	<hr>
	<h4 style="color:black"><?php if($_SESSION[tn]==PRC){echo '背景';}else if($_SESSION[tn]==EN){echo 'Background';}else{echo '背景';}?></h4>
	<p><?php if($_SESSION[tn]==PRC){echo '您能填上rgb颜色码e.g. rgb(125,125,125), rgba颜色码e.g. rgba(125,125,125,0.5) 或 hex颜色码e.g. #123456。若整页是有背景图像,您应使用rgba。';}else if($_SESSION[tn]==EN){echo 'You can add rgb color code e.g. rgb(125,125,125), rgba color code e.g. rgba(125,125,125,0.5) or hex color code e.g. #123456. If you use background picture for the page, you may use rgba color code.';}else{echo '您能填上rgb顏色碼e.g. rgb(125,125,125), rgba顏色碼e.g. rgba(125,125,125,0.5) 或 hex顏色碼e.g. #123456。若整頁是有背景圖像,您應使用rgba。';}?></p>	
	<hr>
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '边阔';}else if($_SESSION[tn]==EN){echo 'Padding';}else{echo '邊闊';}?></b>
	<?php if($_SESSION[tn]==PRC){echo '格与格的边阔,填整数,e.g. 1。';}else if($_SESSION[tn]==EN){echo 'It is the padding of grids. You need to enter integar. e.g. 1';}else{echo '格與格的邊闊,填整數,e.g. 1。';}?></p>	
	<hr>
	<h4 style="color:black"><?php if($_SESSION[tn]==PRC){echo '相片高度';}else if($_SESSION[tn]==EN){echo 'Photo height';}else{echo '相片高度';}?>/<?php if($_SESSION[tn]==PRC){echo '相片阔度';}else if($_SESSION[tn]==EN){echo 'Photo width';}else{echo '相片闊度';}?></h4>
	<p><?php if($_SESSION[tn]==PRC){echo '放大相片限用同一尺寸。您能在windows的档案管理员将鼠标移到相片档名上,有相片的尺寸显示。';}else if($_SESSION[tn]==EN){echo 'You need to use same size for \'bigger photo\' . You can obtain photo size by moving cursor to the filename in Windows file manager.';}else{echo '放大相片限用同一尺寸。您能在windows的檔案管理員將鼠標移到相片檔名上,有相片的尺寸顯示。';}?></p>
	<p><?php if($_SESSION[tn]==PRC){echo '相片尺寸是用作显示尺寸计算,并非实际显示尺寸。';}else if($_SESSION[tn]==EN){echo 'Photo size is for calculation purpose but not for actual display size.';}else{echo '相片尺寸是用作顯示尺寸計算,並非實際顯示尺寸。';}?></p>
   <hr>
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '相片档名';}else if($_SESSION[tn]==EN){echo 'Photo filename';}else{echo '相片檔名';}?></b>
	<?php if($_SESSION[tn]==PRC){echo '相片格内的相片档名。';}else if($_SESSION[tn]==EN){echo 'It is about the filename of photo in photo grid.';}else{echo '相片格內的相片檔名。';}?></p>
	<hr>
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '放大相片';}else if($_SESSION[tn]==EN){echo 'Bigger Photo';}else{echo '放大相片';}?></b>
	<?php if($_SESSION[tn]==PRC){echo '是指用户点撀相片格显示放大相片,这是放大相片的相片档名。';}else if($_SESSION[tn]==EN){echo 'It is the \'bigger photo\' showed by APP user clicking photo grid.';}else{echo '是指用戶點撀相片格顯示放大相片,這是放大相片的相片檔名。';}?></p>
	<hr>
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '相片备注';}else if($_SESSION[tn]==EN){echo 'Photo remark';}else{echo '相片備註';}?></b>
	<?php if($_SESSION[tn]==PRC){echo '是显示在放大相片的相片备注。';}else if($_SESSION[tn]==EN){echo 'It is the remark showing on the \'bigger photo\'.';}else{echo '是顯示在放大相片的相片備註。';}?></p>
	<hr>
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '字体颜色';}else if($_SESSION[tn]==EN){echo 'Text color';}else{echo '字體顏色';}?></b>
	<?php if($_SESSION[tn]==PRC){echo '您能填上 hex颜色码 e.g. #123456。';}else if($_SESSION[tn]==EN){echo 'You need to use hex color code e.g. #123456.';}else{echo '您能填上 hex顏色碼 e.g. #123456。';}?></p>
	<hr>
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '背景顏色';}else if($_SESSION[tn]==EN){echo 'Background';}else{echo '背景顏色';}?></b>
	<?php if($_SESSION[tn]==PRC){echo '您能填上rgb颜色码e.g. rgb(125,125,125), rgba颜色码e.g. rgba(125,125,125,0.5) 或 hex颜色码e.g. #123456。您应使用rgba。';}else if($_SESSION[tn]==EN){echo 'You can add rgb color code e.g. rgb(125,125,125), rgba color code e.g. rgba(125,125,125,0.5) or hex color code e.g. #123456. The rgba color code is recommended.';}else{echo '您能填上rgb顏色碼e.g. rgb(125,125,125), rgba顏色碼e.g. rgba(125,125,125,0.5) 或 hex顏色碼e.g. #123456。您應使用rgba。';}?></p>	
	
	
	</div>
	
<a href="#try" data-rel="popup" data-transition="pop" class="ui-btn ui-btn-f ui-btn-inline ui-corner-all ui-mini" style="color:BLACK"><span class="pigss-pencil" style="color:red"></span><?php if($_SESSION[tn]==PRC){echo '快速试用';}else if($_SESSION[tn]==EN){echo 'Quick try';}else{echo '快速試用';}?></a>
		<div data-role="popup" id="try" data-position-to="window" data-theme="f" class="ifrwidth"><a href="#" data-rel="back" class="popn ui-btn ui-btn-z ui-btn-icon-notext ui-icon-delete"></a><BR><BR>
		<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '预备相片';}else if($_SESSION[tn]==EN){echo 'Photo preparation';}else{echo '預備相片';}?></b> &nbsp;<?php if($_SESSION[tn]==PRC){echo '您须预备三张相片[横向及首张的高度减半],并存於panel/'.$roww[pjnbr].'/images。';}else if($_SESSION[tn]==EN){echo 'You need to prepare three landscape photos [the first photo is about 50% height of your computer screen] and place them to the folder panel/'.$roww[pjnbr].'/images.';}else{echo '您須預備三張相片[橫向及首張的高度減半],並存於panel/'.$roww[pjnbr].'/images。';}?></p>	
		<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '项目填写';}else if($_SESSION[tn]==EN){echo 'Item information';}else{echo '項目填寫';}?></b> &nbsp;<?php if($_SESSION[tn]==PRC){echo '在\'一行格数 \'选用五格及在相片数量填5并提送,选二张相片,将此二张相片档名再在\'相片档名\'双间填共5个相片档名,再在\'放大相片\'均填另一张相片档案名并提送。';}else if($_SESSION[tn]==EN){echo 'You need to select the \'5 grid\' in \'Number of grid/row\' and enter 5 to Photo quantity and then click the SEND button. You need to select two of the three photos and enter either one filename of them to the five values of \'Photo filename\'. You need to enter the third photo filename to the five values of \'Bigger photo\' and then click the SEND button.';}else{echo '在\'一行格數 \'選用五格及在相片數量填5並提送,選二張相片,將此二張相片檔名再在\'相片檔名\'雙間填共5個相片檔名,再在\'放大相片\'均填另一張相片檔案名並提送。';}?></p>	<HR>
		<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '试用';}else if($_SESSION[tn]==EN){echo 'Testing';}else{echo '試用';}?></b> &nbsp;
	<?php if($_SESSION[tn]==PRC){echo '您须点撀此页上的预览,再进行测试。再修改及选用不同设置再预览并试用。';}else if($_SESSION[tn]==EN){echo 'You need to click the above preview button to test your design. You can enter or select different parameters to test their functions and effects.';}else{echo '您須點撀此頁上的預覽,再進行測試。再修改及選用不同設置再預覽並試用。';}?></p>	
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '试用步骤';}else if($_SESSION[tn]==EN){echo 'Testing Steps';}else{echo '試用步驟';}?></b> &nbsp;
	<?php if($_SESSION[tn]==PRC){echo '在预览页点撀相片显示POPUP。';}else if($_SESSION[tn]==EN){echo 'You can click the photo to show popup on the preview page.';}else{echo '在預覽頁點撀相片顯示POPUP。';}?></p>	
		</div>
	
	<?php if($tl)$tln = '&tl='.$tl;?>
	
<?php   if($pn){
			$ht = file_get_contents('../panel/'.$roww[pjnbr].'/'.$ap.'.html');
			$htm = explode('<!--part',$ht);
			
			$pntag = '<!--part'.$pn.'!-->';
				for($i=1;$i<sizeof($htm);$i++){
					if(strpos('<!--part'.$htm[$i],$pntag)===false and !$gridpic){$html .= '<!--part'.$htm[$i];}
					else if(strpos('<!--part'.$htm[$i],$pntag)!==false){$gridpic  = str_replace($pntag,'','<!--part'.$htm[$i]);}
					else{$htmls .= '<!--part'.$htm[$i];}
				;}
				
			$tabnbgdata = explode('<!--data-tabnbg',$gridpic);
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
				
			$gridpic  = str_replace('<div class="swiper-slide"><div id="'.$pj.$ap.'vnts'.$pn.'" class="vntsns vtnn">','',$gridpic);	
			$gridpic  = str_replace('<div class="swiper-slide"><div id="'.$pj.$ap.'vnts'.$pn.'" class="vntsns">','',$gridpic);		
			$gridpic  = str_replace('<!--data-tabnbg'.$tabnbgdatn[0].'data-tabnbg!-->','',$gridpic);
			;}	
				
				
				
				
				$gridpic  = str_replace('</div></div><!--vnts!-->','',$gridpic);
				
			
			$tbgnvlu = explode('<!--data',$gridpic);
			if($tbgnvlu[1]){
			$tbgsvlu = explode('data!-->',$tbgnvlu[1]);
			$tbgvlu = explode('@#@',$tbgsvlu[0]);
			}

		
			 
			;}
	?>	
	<hr>
	<?php if($_GET[pgi])$pgi='&pgi=1'; ?>
	<FORM action="gridpic.php?pj=<?php echo htmlspecialchars($roww[pjnbr]) ?>&ap=<?php echo htmlspecialchars($roww[ap]) ?>&pn=<?php echo htmlspecialchars($pn).$tln.$pgi ?>" id="webxls" method="post" data-ajax="false"  onSubmit="return checkform(this);">
	
	<span style="color:black"><?php if($_SESSION[tn]==PRC){echo '专案';}else if($_SESSION[tn]==EN){echo 'Project';}else{echo '專案';}?></span>
	<?php 	$sql=$db->query("select * from webpj where cno='$pj'");
	if($sql)$row=$sql->fetch();
	echo '['.htmlspecialchars($row[date]).'] '.htmlspecialchars($row[title]);?>
	
	&nbsp;&nbsp;&nbsp;&nbsp;
	
	<span style="color:black"><?php if($_SESSION[tn]==PRC){echo '应用页称';}else if($_SESSION[tn]==EN){echo 'Page name';}else{echo '應用頁稱';}?></span> :
	<?php echo htmlspecialchars($roww[title])?>
	<hr>
 
	<?php if($_SESSION[tn]==PRC){echo '相片格创建';}else if($_SESSION[tn]==EN){echo 'Photo Grid CREATING';}else{echo '相片格創建';}?>  
	

	<br>


	<?php if($_SESSION[tn]==PRC){echo '一行格数';}else if($_SESSION[tn]==EN){echo 'Number of grid/row';}else{echo '一行格數';}?>
	<div class="ui-grid-a"><div class="ui-block-a">
	<select name="grid" required>
	<option value=""><?php if($_SESSION[tn]==PRC){echo '选择';}else if($_SESSION[tn]==EN){echo 'Choose';}else{echo '選擇';}?></option>
	<option value="solo" <?php if($tbgvlu[0]=='solo')echo 'selected=selected';?>>1 <?php if($_SESSION[tn]==PRC){echo '格';}else if($_SESSION[tn]==EN){echo 'grid';}else{echo '格';}?></option>
	<option value="a" <?php if($tbgvlu[0]=='a')echo 'selected=selected';?>>2 <?php if($_SESSION[tn]==PRC){echo '格';}else if($_SESSION[tn]==EN){echo 'grid';}else{echo '格';}?></option>
	<option value="b" <?php if($tbgvlu[0]=='b')echo 'selected=selected';?>>3 <?php if($_SESSION[tn]==PRC){echo '格';}else if($_SESSION[tn]==EN){echo 'grid';}else{echo '格';}?></option>
	<option value="c" <?php if($tbgvlu[0]=='c')echo 'selected=selected';?>>4 <?php if($_SESSION[tn]==PRC){echo '格';}else if($_SESSION[tn]==EN){echo 'grid';}else{echo '格';}?></option>
	<option value="d" <?php if($tbgvlu[0]=='d')echo 'selected=selected';?>>5 <?php if($_SESSION[tn]==PRC){echo '格';}else if($_SESSION[tn]==EN){echo 'grid';}else{echo '格';}?></option>

	</select>
	
	</div>
	<div class="ui-block-b">
	<input type="submit" name="submit" id="webxlsbtn" Value="<?php if($_SESSION[tn]==PRC){echo '送交';}else if($_SESSION[tn]==EN){echo 'SEND';}else{echo '送交';}?>">
	
	</div></div>
	<?php if($_SESSION[tn]==PRC){echo '互联AJAX数据';}else if($_SESSION[tn]==EN){echo 'Internet AJAX data';}else{echo '互聯AJAX數據';}?>
	<input type="text" name="url" placeholder="" value="<?php echo htmlspecialchars($tbgvlu[6]); ?>">
	
	<hr>
	<div class="ui-grid-d"><div class="ui-block-a"><?php if($_SESSION[tn]==PRC){echo '相片数量';}else if($_SESSION[tn]==EN){echo 'Photo quantity';}else{echo '相片數量';}?>
	<input type="number" name="photonbr" placeholder="" value="<?php echo htmlspecialchars($tbgvlu[1]); ?>" required>
	</div><div class="ui-block-b"><?php if($_SESSION[tn]==PRC){echo '背景';}else if($_SESSION[tn]==EN){echo 'Background';}else{echo '背景';}?>
	<input type="text" name="bg" placeholder="" value="<?php echo htmlspecialchars($tbgvlu[2]) ?>">
	</div><div class="ui-block-c"><?php if($_SESSION[tn]==PRC){echo '边阔';}else if($_SESSION[tn]==EN){echo 'Padding';}else{echo '邊闊';}?>
	<input type="number" name="pad" placeholder="" value="<?php echo htmlspecialchars($tbgvlu[3]) ?>">
	</div><div class="ui-block-d"><?php if($_SESSION[tn]==PRC){echo '相片高度';}else if($_SESSION[tn]==EN){echo 'Photo height';}else{echo '相片高度';}?>
	<input type="number" name="sizeheigw" placeholder="" value="<?php echo htmlspecialchars($tbgvlu[4]) ?>">
	</div><div class="ui-block-e"><?php if($_SESSION[tn]==PRC){echo '相片阔度';}else if($_SESSION[tn]==EN){echo 'Photo width';}else{echo '相片闊度';}?>
	<input type="number" name="sizewidw" placeholder="" value="<?php echo htmlspecialchars($tbgvlu[5]) ?>">
	</div></div>
	<?php 
	if($tbgvlu[0]){?>
	<div class="ui-grid-c"><div class="ui-block-a" style="width:15%"><?php if($_SESSION[tn]==PRC){echo '相片档名';}else if($_SESSION[tn]==EN){echo 'Photo filename';}else{echo '相片檔名';}?>
	</div><div class="ui-block-b" style="width:15%"><?php if($_SESSION[tn]==PRC){echo '放大相片';}else if($_SESSION[tn]==EN){echo 'Bigger photo';}else{echo '放大相片';}?>
	</div><div class="ui-block-c" style="width:50%"><?php if($_SESSION[tn]==PRC){echo '相片备注';}else if($_SESSION[tn]==EN){echo 'Photo remark';}else{echo '相片備註';}?>
	</div><div class="ui-block-d" style="width:10%"><?php if($_SESSION[tn]==PRC){echo '字体顏色';}else if($_SESSION[tn]==EN){echo 'Font color';}else{echo '字體顏色';}?>
	</div><div class="ui-block-e" style="width:10%"><?php if($_SESSION[tn]==PRC){echo '背景顏色';}else if($_SESSION[tn]==EN){echo 'Background';}else{echo '背景顏色';}?>
	</div></div>
	
	<div class="ui-grid-c">
	<?php 
	$j = 7;$js= 8;$jss= 9;$jsss= 10;$jssss= 11;
		for($i=1;$i<=$tbgvlu[1];$i++){
		echo '<div class="ui-block-a" style="width:15%">
	<input type="text" name="photos'.$i.'" placeholder="" value="'.htmlspecialchars($tbgvlu[$j]).'"></div><div class="ui-block-b" style="width:15%">
	<input type="text" name="photo'.$i.'" placeholder="" value="'.htmlspecialchars($tbgvlu[$js]).'"></div><div class="ui-block-b" style="width:50%">
	<input type="text" name="photont'.$i.'" placeholder="" value="'.htmlspecialchars($tbgvlu[$jss]).'"></div><div class="ui-block-b" style="width:10%">
	<input type="text" name="photclr'.$i.'" placeholder="" value="'.htmlspecialchars($tbgvlu[$jsss]).'"></div><div class="ui-block-b" style="width:10%">
	<input type="text" name="photbg'.$i.'" placeholder="" value="'.htmlspecialchars($tbgvlu[$jssss]).'"></div>';$j=$j+5;$js=$js+5;$jss=$jss+5;$jsss=$jsss+5;$jssss=$jssss+5;
		;}
		?>
	
	</div>
	<?php ;}	?>
	<hr>
	<input type="hidden" name="guanyin1" value="<?php if(!$_POST[guanyin1])$_SESSION[guanyin1]=rand();
	echo htmlspecialchars($_SESSION[guanyin1]); ?>">	
	</FORM>
	
<hr>
	<?php 
	if($gridpic){
	if($_SESSION[tn]==PRC){echo '您的设计';}else if($_SESSION[tn]==EN){echo 'Your design';}else{echo '您的設計';}
	$ngridp = str_replace('(images/','(../panel/'.$roww[pjnbr].'/images/',$gridpic);
	echo '<br>'.str_replace('"images/','"../panel/'.$roww[pjnbr].'/images/',$ngridp);
		
if(file_exists('../panel/'.$roww[pjnbr].'/web'.$ap.'.js')){
	$jswebn = file_get_contents('../panel/'.$roww[pjnbr].'/web'.$ap.'.js');
	$jswebn=explode('/*webjs'.$pn.'*/',$jswebn);
	echo '<script>$(document).on("pageshow", "#appageone", function(){ localStorage.clear(); '.$jswebn[1].';});	</script>';
;}
	}?>
	<hr>	


<HR>
	<a href="#infnsp" data-rel="popup" data-transition="pop" class="ui-btn ui-btn-b ui-btn-inline ui-corner-all ui-mini">? <?php if($_SESSION[tn]==PRC){echo '例';}else if($_SESSION[tn]==EN){echo 'Examples';}else{echo '例';}?></a>
	<div data-role="popup" id="infnsp" style="min-width:300px;max-width:85%" data-position-to="window" data-theme="f"><a href="#" class="ui-btn ui-corner-all ui-icon-delete ui-btn-icon-notext ui-btn-right" data-rel="back"></a>

	<p><?php if($_SESSION[tn]==PRC){echo '您须缩细浏览器尺寸至移动设备大小进行浏览。';}else if($_SESSION[tn]==EN){echo 'You need to resize your browser as mobile device\'s screen size to view this example.';}else{echo '您須縮細瀏覽器尺寸至移動設備大小進行瀏覽。';}?></p>	
	<p><?php if($_SESSION[tn]==PRC){echo '细屏显示此设计,是没有浏览轴显示,用户拖拽画面浏览放大内容。';}else if($_SESSION[tn]==EN){echo 'The browsing bars of content area on small device screen are not showed. Mobile device user needs to swipe screen to browse popup picture.';}else{echo '細屏顯示此設計,是沒有瀏覽軸顯示,用戶拖拽畫面瀏覽放大內容。';}?></p>
	<p><?php if($_SESSION[tn]==PRC){echo '您能加相片或文字至popup内。';}else if($_SESSION[tn]==EN){echo 'You can add picture and/or text as content of popup.';}else{echo '您能加相片或文字至popup內。';}?></p>	
	</div>
	

	<a href="#insfns" data-rel="popup" data-transition="pop" class="ui-btn ui-btn-b ui-btn-inline ui-corner-all ui-mini">? <?php if($_SESSION[tn]==PRC){echo '五格行';}else if($_SESSION[tn]==EN){echo '5 grids per row';}else{echo '五格行';}?></a>
	<div data-role="popup" id="insfns" style="min-width:300px;max-width:85%" data-position-to="window" data-theme="f">
	<p><?php if($_SESSION[tn]==PRC){echo '您能使用不同相片在格及放大相片内';}else if($_SESSION[tn]==EN){echo 'You can use different pictures for grids and bigger picture.';}else{echo '您能使用不同相片在格及放大相片內.';}?></p>	
	</div>
	<div id="8gridimgs5">
	<div id="8gridimg5" style="background-color:black;padding:3px;">
	<div class="ui-grid-d"><div class="ui-block-a" style="background-color:black;padding:3px;"><a href="#" class="8gridpics5" data-url="images/ishow2.gif" data-title="相片ishow2.gif" data-bg="rgba(125,0,0,0.5)" data-tclr="red"   ><img style="width:100%" src="images/ishow6.gif" ></a></div><div class="ui-block-b" style="background-color:black;padding:3px;"><a href="#" class="8gridpics5" data-url="images/ishow1.gif" data-title="" data-bg="" data-tclr=""   ><img style="width:100%" src="images/ishow3.gif" ></a></div><div class="ui-block-c" style="background-color:black;padding:3px;"><a href="#" class="8gridpics5" data-url="images/ishow2.gif" data-title="相片ishow2.gif" data-bg="" data-tclr=""   ><img style="width:100%" src="images/ishow5.gif" ></a></div><div class="ui-block-d" style="background-color:black;padding:3px;"><a href="#" class="8gridpics5" data-url="images/ishow1.gif" data-title="" data-bg="" data-tclr=""   ><img style="width:100%" src="images/ishow6.gif" ></a></div><div class="ui-block-e" style="background-color:black;padding:3px;"><a href="#" class="8gridpics5" data-url="images/ishow2.gif" data-title="相片ishow2.gif" data-bg="" data-tclr=""   ><img style="width:100%" src="images/ishow5.gif" ></a></div></div><div class="ui-grid-d"><div class="ui-block-a" style="background-color:black;padding:3px;"><a href="#" class="8gridpics5" data-url="images/ishow1.gif" data-title="" data-bg="" data-tclr=""   ><img style="width:100%" src="images/ishow3.gif" ></a></div><div class="ui-block-b" style="background-color:black;padding:3px;"><a href="#" class="8gridpics5" data-url="images/ishow2.gif" data-title="相片ishow2.gif" data-bg="" data-tclr=""   ><img style="width:100%" src="images/ishow5.gif" ></a></div><div class="ui-block-c" style="background-color:black;padding:3px;"><a href="#" class="8gridpics5" data-url="images/ishow1.gif" data-title="" data-bg="" data-tclr=""   ><img style="width:100%" src="images/ishow3.gif" ></a></div><div class="ui-block-d" style="background-color:black;padding:3px;"><a href="#" class="8gridpics5" data-url="images/ishow2.gif" data-title="相片ishow2.gif" data-bg="" data-tclr=""   ><img style="width:100%" src="images/ishow5.gif" ></a></div><div class="ui-block-e" style="background-color:black;padding:3px;"><a href="#" class="8gridpics5" data-url="images/ishow1.gif" data-title="" data-bg="" data-tclr=""   ><img style="width:100%" src="images/ishow3.gif" ></a></div>
	</div>
	</div>
	
	</div>
	

	
	<div id="8gridppops5" data-corners="false" data-role="popup" style="padding:5px;height: 100%;width: 100%;top:0;left:-15px;" class="ifrwidthps"><div id="8gridppop5" data-theme="z" style="padding:5px;position:relative;"><a href="#" data-rel="back" class="popn ui-btn ui-btn-z ui-btn-icon-notext ui-icon-delete"></a><a href="#" class="ui-btn ui-btn-z ui-btn-icon-notext ui-icon-plus" style="position:absolute;top:0%;left:1em;" id="8enlarg5"></a><a href="#" class="ui-btn ui-btn-z ui-btn-icon-notext ui-icon-minus" style="position:absolute;top:8.5%;left:1em;" id="8enlargs5"></a><div class="ifrimg" id="8ifrimg5"><img src=""><div id="8gridpict5" class="gridpict"></div></div></div><div class="ifrspinn" style="position:relative;left:50%;width:100%">Loading...<BR><img src="css/images/ajax-loader.gif"></div></div>


	
	
	
	
	
<hr>
	<div class="copyright">&copy; 2015 Lee Wai Kwok(Hong Kong). JSTRUST CONSULTANCY. <?php if($_SESSION[tn]==PRC){echo '版权所有';}else if($_SESSION[tn]==EN){echo 'All Rights Reserved.';}else{echo '版權所有';}?></div>
	
	
	
	<div id="navigations" data-role="popup" data-theme="none">
	<ul style="min-width:210px;" data-role="listview" data-inset="true">
	<li data-icon="edit"><a href="design.php" data-ajax="false"><?php if($_SESSION[tn]==PRC){echo '设计步骤';}else if($_SESSION[tn]==EN){echo 'Design Step';}else{echo '設計步驟';}?></a></li>
	<!--<li><a href="deignote.php" data-ajax="false"><?php if($_SESSION[tn]==PRC){echo '设计笔记';}else if($_SESSION[tn]==EN){echo 'Design Note';}else{echo '設計筆記';}?></a></li>!-->
	<li><a href="project.php" data-ajax="false"><?php if($_SESSION[tn]==PRC){echo '专案管理';}else if($_SESSION[tn]==EN){echo 'Project Management';}else{echo '專案管理';}?></a></li>
	<li><a href="tool.php" data-ajax="false"><?php if($_SESSION[tn]==PRC){echo '工具';}else if($_SESSION[tn]==EN){echo 'Tools';}else{echo '工具';}?></a></li>


	<li><a href="explanation.php" data-ajax="false"><?php if($_SESSION[tn]==PRC){echo '解释';}else if($_SESSION[tn]==EN){echo 'Explanation';}else{echo '解釋';}?></a></li>

	

	</ul></div><!-- /navigation -->		
	
	<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
	
</div>
</body></html>

<script src="../js/appsystem.js"></script>
<script>

$(document).on("pageshow", "#appageone", function(){ 
gridpic("8","5","","","",$(window).width(),$(window).height());
//if($(window).width()>$(window).height())var itemjs = 5;if($(window).height()>$(window).width())var itemjs = 3 ;	
 //var swiper = new Swiper("#8gridimgs5", {pagination: '.swiper-pagination',paginationClickable: '.swiper-pagination',nextButton: '.swiper-button-next', prevButton: '.swiper-button-prev',scrollbar: '.swiper-scrollbar',scrollbarHide: true,slidesPerView: itemjs});
});	
//,preventClicks:false			//	
</script>
<?php 
$tdy=0;
$tdy=date('Y-m-d');
if($_POST['grid'] and $pj and $_SESSION[guanyin1] and $_SESSION[guanyin1]==$_POST[guanyin1]){

	if($ap and !preg_match('/^[0-9]*$/', $ap))exit;
	if($pj and !preg_match('/^[0-9]*$/', $pj))exit;
	if($_POST[photonbr] and !preg_match('/^[0-9]*$/', $_POST[photonbr]))$_POST[photonbr] = 8;
	
	
	$popup .= '<!--data'.htmlspecialchars($_POST[grid]).'@#@'.htmlspecialchars($_POST[photonbr]).'@#@'.htmlspecialchars($_POST[bg]).'@#@'.htmlspecialchars($_POST[pad]).'@#@'.htmlspecialchars($_POST[sizeheigw]).'@#@'.htmlspecialchars($_POST[sizewidw]).'@#@'.htmlspecialchars($_POST[url]);
	
		for($i=1;$i<=$_POST[photonbr];$i++){
		$popup .= '@#@'.htmlspecialchars($_POST['photos'.$i]).'@#@'.htmlspecialchars($_POST['photo'.$i]).'@#@'.htmlspecialchars($_POST['photont'.$i]).'@#@'.htmlspecialchars($_POST['photclr'.$i]).'@#@'.htmlspecialchars($_POST['photbg'.$i]);
		;}
	
	$popup .= 'data!-->';
		
		if($_POST[bg])$bg = 'background-color:'.htmlspecialchars($_POST[bg]).';';
		if($_POST[pad])$pad = 'padding:'.htmlspecialchars($_POST[pad]).'px;';
		if($_POST[bg] or $_POST[pad])$style = ' style="'.$bg.$pad.'"';
		
		for($i=1;$i<=$_POST[photonbr];$i++){
			if($_POST[grid]=='a'){ if($i%2==int){$grid = 'b';}else{$grid = 'a';$popup .= '<div class="'.$pj.$ap.'gridimg'.$pn.' ui-grid-a" '.$style.'>';} ;}
			else if($_POST[grid]=='b'){ if($i%3==int){$grid = 'c';}else if(($i+1)%3==int){$grid = 'b';}else{$grid = 'a';$popup .= '<div class="'.$pj.$ap.'gridimg'.$pn.' ui-grid-b" '.$style.'>';} ;}
			else if($_POST[grid]=='c'){ if($i%4==int){$grid = 'd';}else if(($i+1)%4==int){$grid = 'c';}else if(($i+2)%4==int){$grid = 'b';}else{$grid = 'a';$popup .= '<div class="'.$pj.$ap.'gridimg'.$pn.' ui-grid-c" '.$style.'>';} ;}
			else if($_POST[grid]=='d'){ if($i%5==int){$grid = 'e';}else if(($i+1)%5==int){$grid = 'd';}else if(($i+2)%5==int){$grid = 'c';}else if(($i+3)%5==int){$grid = 'b';}else{$grid = 'a';$popup .= '<div class="'.$pj.$ap.'gridimg'.$pn.' ui-grid-d" '.$style.'>';} ;}
			
			if($_POST[grid]=='solo'){$popup .= '<div class="'.$pj.$ap.'gridimg'.$pn.' ui-grid-solo"';}else{$popup .= '<div class="ui-block-'.$grid.'"';}
			$popup .= $style.'>';
			if(strpos($_POST[photos],'http://')!==false or strpos($_POST[photos],'https://')!==false){$images = '';}else{$images = 'images/';}
			$popup .= '<a href="#" class="'.$pj.$ap.'gridpics'.$pn.'" data-url="'.$images.htmlspecialchars(trim($_POST['photo'.$i])).'" data-title="'.htmlspecialchars($_POST['photont'.$i]).'" data-bg="'.htmlspecialchars($_POST['photbg'.$i]).'" data-tclr="'.htmlspecialchars($_POST['photclr'.$i]).'" ><img style="width:100%" src="'.$images.htmlspecialchars($_POST['photos'.$i]).'" ></a>';
			
			
			if($_POST[grid]=='solo'){$popup .= '';} 
			else if($_POST[grid]=='a' and $grid == 'b'){$popup .= '</div>';} 
			else if($_POST[grid]=='b' and $grid == 'c'){$popup .= '</div>';} 
			else if($_POST[grid]=='c' and $grid == 'd'){$popup .= '</div>';}
			else if($_POST[grid]=='d' and $grid == 'e'){$popup .= '</div>';}
			
			$popup .= '</div>';
		;}
	
		$popup = '<div id="'.$pj.$ap.'gridimgs'.$pn.'" style="overflow-y:auto"><div id="'.$pj.$ap.'gridimg'.$pn.'">'.$popup.'</div></div>';
		
		
		$popup .= '<div id="'.$pj.$ap.'gridppops'.$pn.'" data-theme="a" data-corners="false" data-role="popup" style="padding:5px;height: 100%;width: 100%;top:0;left:-15px;" class="ifrwidthps"><div id="'.$pj.$ap.'gridppop'.$pn.'" style="padding:5px;position:relative;"><a href="#" data-rel="back" class="popn ui-btn ui-btn-z ui-btn-icon-notext ui-icon-delete"></a><a href="#" class="ui-btn ui-btn-z ui-btn-icon-notext ui-icon-plus" style="position:absolute;top:0%;left:1em;" id="'.$pj.$ap.'enlarg'.$pn.'"></a><a href="#" class="ui-btn ui-btn-z ui-btn-icon-notext ui-icon-minus" style="position:absolute;top:8.5%;left:1em;" id="'.$pj.$ap.'enlargs'.$pn.'"></a><div class="ifrimg" id="'.$pj.$ap.'ifrimg'.$pn.'"><img src=""><div id="'.$pj.$ap.'gridpict'.$pn.'" class="gridpict"></div></div></div><div class="ifrspinn" style="position:relative;left:50%;width:100%">Loading...<BR><img src="css/images/ajax-loader.gif"></div></div>';	




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
			$webpopup .= $html.'<!--part'.$pn.'!--><!--sysgridpicsys!-->'.$vnts.$popup.$vntsn.$tabnbgdatns.$htmls;
			$webpopup .= '</div><!--content!--></div><!--page!-->';
			
		 			
			$fpagtrns='../panel/'.$roww[pjnbr].'/'.$ap.'.html';
			file_put_contents($fpagtrns,$html.'<!--part'.$pn.'!--><!--sysgridpicsys!-->'.$vnts.$popup.$vntsn.$tabnbgdatns.$htmls);

			$fpagtrns='../panel/'.$roww[pjnbr].'/web'.$ap.'.html';
			file_put_contents($fpagtrns,$webpopup);

	
			if(!file_exists('../panel/'.$roww[pjnbr].'/web'.$ap.'.js')){
			$fpagtrns='../panel/'.$roww[pjnbr].'/web'.$ap.'.js';
			$js = '/*$(document).on(\'pageshow\', \'#web'.$ap.'\', function(){*//*});*/';
			file_put_contents($fpagtrns,$js);			
			;}
			
						
			$jsweb = file_get_contents('../panel/'.$roww[pjnbr].'/web'.$ap.'.js');	
			
		if($jsweb){			
				$jswebs=explode('/*webjs'.$pn.'*/',$jsweb);
				$jsweb = $jswebs[0].$jswebs[2];
				if($_POST[photonbr] and !preg_match('/^[0-9]*$/',$_POST[photonbr]))$_POST[photonbr] = 8;
				if($_POST[sizewidw] and !preg_match('/^[0-9]*$/',$_POST[sizewidw]))$_POST[sizewidw] = 320;
				if($_POST[sizeheigw] and !preg_match('/^[0-9]*$/',$_POST[sizeheigw]))$_POST[sizeheigw] = 480;
				if(!$_POST[sizewidw])$_POST[sizewidw] = 320;if(!$_POST[sizeheigw])$_POST[sizeheigw] = 480;
				$urlv = end(explode(".", $_POST[url]));$urlv = str_replace('.'.$urlv,'v.'.$urlv,htmlspecialchars($_POST[url]));
				if($_POST[url]){
				
				$gridpicdata = '/*ajax'.$ap.'ajax*/gridpicdata("'.$pj.$ap.'","'.$pn.'","'.htmlspecialchars($_POST[photonbr]).'","'.$urlv.'","'.htmlspecialchars($_POST[url]).'");/*ajaxs*/';$_POST[url]=1;}
				else{$_POST[url]='';}
				
			$js = '/*webjs'.$pn.'*/'.$gridpicdata
			.'gridpic("'.$pj.$ap.'","'.$pn.'","'.$_POST[sizewidw].'","'.$_POST[sizeheigw].'","'.htmlspecialchars($_POST[url]).'",windowWidth,windowHeight);'
				.'/*webjs'.$pn.'*/'
				.'/*});*/';
			$jsweb=str_replace('/*});*/',$js,$jsweb);
			file_put_contents('../panel/'.$roww[pjnbr].'/web'.$ap.'.js',$jsweb);
		;}
			

	echo "<meta http-equiv='refresh' content='0;URL=gridpic.php?ap=".htmlspecialchars($roww[ap])."&pj=".htmlspecialchars($roww[pjnbr])."&pn=".htmlspecialchars($pn).$pgi."'>";
;}

?>
	
