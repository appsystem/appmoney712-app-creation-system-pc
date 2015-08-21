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
    <title><?php if($_SESSION[tn]==PRC){echo 'POPUP相片 - AppMoney712 移动应用设计系统';}else if($_SESSION[tn]==EN){echo 'POPUP PICTURE - AppMoney712 APP Creation System';}else{echo 'POPUP相片 - AppMoney712 移動應用設計系統';}?></title>
	<link href="../css/jquery.mobile-1.4.4.min.css" rel="stylesheet">
	<link href="../css/jquerymobile-1.4.4.min.css" rel="stylesheet">
	<link href="../css/bootstraps.css" rel="stylesheet">
	<link rel="stylesheet" href="../jscss/swiper.min.css"><link href="../css/icons/style.css" rel="stylesheet">
	<style type="text/css">
		.ifrwidthps{overflow:hidden;}
		.popifr{position:absolute;top:0%;left:0%;index-z:2}.popn{position:absolute;top:0%;right:1em;index-z:2}
	</style>
	<script src="../js/jquery.js"></script>
	<script src="../js/jquery.mobile-1.4.4.min.js"></script>
	<script src="../js/swiper.jquery.min.js"></script>
	<script src="../js/popupics.js"></script>
	<script>
	function checkform ( form )
	{
	
	if((form.img2.value || form.imgtitle2.value || form.imgftr2.value)  && form.grid.value=='solo'){
	alert("<?php if($_SESSION[tn]==PRC){echo '格数错误。';}else if($_SESSION[tn]==EN){echo 'Incorrect number of grids';}else{echo '格數錯誤。';}?>");
	form.grid.focus();
	return (false);
	;}
	
	if((form.img3.value || form.imgtitle3.value || form.imgftr3.value)  && (form.grid.value=='solo' || form.grid.value=='a')){
	alert("<?php if($_SESSION[tn]==PRC){echo '格数错误。';}else if($_SESSION[tn]==EN){echo 'Incorrect number of grids';}else{echo '格數錯誤。';}?>");
	form.grid.focus();
	return (false);
	;}

	if((form.img4.value || form.imgtitle4.value || form.imgftr4.value)  && (form.grid.value=='solo' || form.grid.value=='a' || form.grid.value=='b')){
	alert("<?php if($_SESSION[tn]==PRC){echo '格数错误。';}else if($_SESSION[tn]==EN){echo 'Incorrect number of grids';}else{echo '格數錯誤。';}?>");
	form.grid.focus();
	return (false);
	;}

	if((form.img5.value || form.imgtitle5.value || form.imgftr5.value)  && (form.grid.value=='solo' || form.grid.value=='a' || form.grid.value=='b' || form.grid.value=='c')){
	alert("<?php if($_SESSION[tn]==PRC){echo '格数错误。';}else if($_SESSION[tn]==EN){echo 'Incorrect number of grids';}else{echo '格數錯誤。';}?>");
	form.grid.focus();
	return (false);
	;}
	}
	</script>
</head>
<body>
<div data-role="page" data-theme="f"  id="appageone" style="background-color:white;color:black">
	<div style="overflow: hidden;" data-role="header" data-theme="f">
	<a href="#navigations"  id="menubttn"  data-rel="popup" data-transition="pop" class="ui-btn ui-btn ui-btn-inline ui-corner-all ui-btn-icon-left ui-icon-bars"><?php if($_SESSION[tn]==PRC){echo '目录';}else if($_SESSION[tn]==EN){echo 'Menu';}else{echo '目錄';}?></a>
    <h1><?php if($_SESSION[tn]==PRC){echo 'POPUP相片[按鈕形式] - AppMoney712 移动应用设计系统';}else if($_SESSION[tn]==EN){echo 'Popup Photo Grid[button style] - AppMoney712 APP Creation System';}else{echo 'POPUP相片[按鈕形式] - AppMoney712 移動應用設計系統';}?></h1>
	
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
	
		
	<a href="menudesign.php?pj=<?php echo htmlspecialchars($roww[pjnbr])?>&ap=<?php echo $ap?>&pn=<?php echo $pn?>&php=popuppics&plt=1" data-ajax="false" class="ui-btn ui-btn ui-btn-inline ui-corner-all ui-mini ui-btn-icon-left ui-icon-bars"><?php if($_SESSION[tn]==PRC){echo '专案应用页列表';}else if($_SESSION[tn]==EN){echo 'Project Page List';}else{echo '專案應用頁列表';}?></a>
	<?php ;}?>
	<a href="#tpss" data-rel="popup" data-transition="pop" class="ui-btn ui-btn-b ui-btn-inline ui-corner-all ui-mini">? <?php if($_SESSION[tn]==PRC){echo '解释';}else if($_SESSION[tn]==EN){echo 'Explanation';}else{echo '解釋';}?></a>
	<div data-role="popup" id="tpss" style="min-width:300px;max-width:85%" data-position-to="window" data-theme="f"><a href="#" class="ui-btn ui-corner-all ui-icon-delete ui-btn-icon-notext ui-btn-right" data-rel="back"></a>
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '使用';}else if($_SESSION[tn]==EN){echo 'Use';}else{echo '使用';}?></b>
	<?php if($_SESSION[tn]==PRC){echo '您需点撀\'格数\'进行选择。您需预备相片并存於应用的panel/'.$roww[pjnbr].'/images档夹及特定互联网伺服器。';}else if($_SESSION[tn]==EN){echo 'You need to click and select the grid type. You need to prepare pictures and store them in panel/'.$roww[pjnbr].'/images folder or specific Internet server.';}else{echo '您需點撀\'格數\'進行選擇。您需預備相片並存於應用的panel/'.$roww[pjnbr].'/images檔夾及特定互聯網伺服器。';}?></p>
	<p><?php if($_SESSION[tn]==PRC){echo '您能加格行,格内含细相片/文字,用户点撀显示在POPUP的URL相片或网页。';}else if($_SESSION[tn]==EN){echo 'You can add grids in a row and specify number of grids in a row. The grid is to contain small picture and/or words which APP user can click on it to show a popup with bigger picture. You can use same URL for the grid picture and the popup picture.';}else{echo '您能加格行,格內含細相片/文字,用戶點撀顯示在POPUP的URL相片或網頁。';}?></p>
	<p><?php if($_SESSION[tn]==PRC){echo '您亦能令用户开启浏览器浏览特定网页,e.g. pdf文件或地图。格式是[openbrowser]网页url,e.g. [openbrowser]http://???.?????.com/viewer?url=??????????word.pdf。此功能不能用电脑浏览器试用。';}else if($_SESSION[tn]==EN){echo 'You can open APP user device\'s specific browser to show specific Internet web page. e.g. pdf document or map. The format is [openbrowser]url of web page. e.g. [openbrowser]http://???.?????.com/viewer?url=??????????word.pdf. You cannot preview it on your computer browser.';}else{echo '您亦能令用戶開啟瀏覽器瀏覽特定網頁,e.g. pdf文件或地圖。格式是[openbrowser]網頁url,e.g. [openbrowser]http://???.?????.com/viewer?url=??????????word.pdf。此功能不能用電腦瀏覽器試用。';}?></p>


	<p><?php if($_SESSION[tn]==PRC){echo '您亦能令用户开启合适应用浏览特定互联网或内联网文件,e.g. 用Acrobat Reader APPpdf文件。格式是[openapp]网页url,e.g. [openapp]http://???.?????.com/word.pdf。此功能不能用电脑浏览器试用。';}else if($_SESSION[tn]==EN){echo 'You can let APP users to open Internet/Intranet document by appropriate APP in their appropriate device. e.g. open pdf document by Acrobat Reader APP. The format is [openapp]document url. e.g. [openapp]http://???.?????.com/word.pdf.  You cannot preview it on your computer browser.';}else{echo '您亦能令用戶開啟合適應用瀏覽特定互聯網或內聯網文件,e.g. 用Acrobat Reader APP開啟pdf文件。格式是[openapp]網頁url,e.g. [openapp]http://???.?????.com/word.pdf。此功能不能用電腦瀏覽器試用。';}?></p>

	<p><?php if($_SESSION[tn]==PRC){echo '您亦能令用户开启设备巳安装的WHATSAPP APP,格式是whatsapp://??????????,并显示特定内容,对於IOS APP,您亦能使用相关社交分享的URL scheme, 能令用户的相关应用开启并使用特定功能,到本司网站有指引。此功能不能用电脑浏览器试用。';}else if($_SESSION[tn]==EN){echo 'You can open APP user device\'s WhatsAPP APP to use its specific function. e.g.whatsapp://??????????. Please refer to our website. For IOS APP, you can use the URL scheme of many social sharing media to open APP user device\'s related social sharing APPs and use their functions. Please refer to our website.  You cannot try it on your computer browser.';}else{echo '您亦能令用戶開啟設備巳安裝的WHATSAPP APP,格式是whatsapp://??????????,並顯示特定內容,對於IOS APP,您亦能使用相關社交分享的URL scheme, 能令用戶的相關應用開啟並使用特定功能,到本司網站有指引。此功能不能用電腦瀏覽器試用。';}?></p>
	<hr><p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '标题及备注';}else if($_SESSION[tn]==EN){echo 'Title and footnote';}else{echo '標題及備註';}?></b>
	<?php if($_SESSION[tn]==PRC){echo '在移动设备使用应只加简单的标题及备注。';}else if($_SESSION[tn]==EN){echo 'You can add simple word in the title and footnote only due to mobile phone usage.';}else{echo '在移動設備使用應只加簡單的標題及備註。';}?></p>
	
	
	<?php if(!$_GET[owl]){?>
	<hr><h4 style="color:black"><?php if($_SESSION[tn]==PRC){echo '相片';}else if($_SESSION[tn]==EN){echo 'Picture ';}else{echo '相片';}?>URL/<?php if($_SESSION[tn]==PRC){echo '档名及';}else if($_SESSION[tn]==EN){echo 'File name and';}else{echo '檔名及';}?>POPUP URL/POPUP<?php if($_SESSION[tn]==PRC){echo '档名';}else if($_SESSION[tn]==EN){echo 'File name';}else{echo '檔名';}?></h4>
	<p><?php if($_SESSION[tn]==PRC){echo 'URL/档名是填有关格内的相片,用户点撀格显示popup。';}else if($_SESSION[tn]==EN){echo 'URL/file name is about the grid content\'picture. APP user clicks the grid to show popup.';}else{echo 'URL/檔名是填有關格內的相片,用戶點撀格顯示popup。';}?></p>
	<p><?php if($_SESSION[tn]==PRC){echo 'POPUP URL/POPUP/档名是填有关popup内的内容。';}else if($_SESSION[tn]==EN){echo 'POPUP URL/POPUP file name is about the popup content.';}else{echo 'POPUP URL/POPUP/檔名是填有關popup內的內容。';}?></p>
	
	<p><?php if($_SESSION[tn]==PRC){echo '用户点撀相片显示POPUP,内容均显示在popup内,e.g. 特定互联网视频丶存於互联网的特定格式的音频档,相片,特定网页或应用页。若填互联网纲页,一些网页只能在将设计产生应用时才能显示,不能用电脑浏览器预览。';}else if($_SESSION[tn]==EN){echo 'APP user click the link button to show popup which shows the content of link, e.g. specific Internet video, specific format of audio file stored on the Internet, photo, specific web page or APP page. If you fill in specific Internet web page, it may be showed when your design is produced to be an APP. You cannot preview it on computer browser.';}else{echo '用戶點撀相片顯示POPUP,內容均顯示在popup內,e.g. 特定互聯網視頻、存於互聯網的特定格式的音頻檔,相片,特定網頁或應用頁。若填互聯網綱頁,一些網頁只能在將設計產生應用時才能顯示,不能用電腦瀏覽器預覽。';}?></p>

	<p><?php if($_SESSION[tn]==PRC){echo '网页填写时必须填上网页档案,e.g. http://www.?????.com/index.html, 不能只填域名,http://www.?????.com。若是应用页,填档名,e.g. web1.html。';}else if($_SESSION[tn]==EN){echo 'You need to fill in file name of Internet web page. e.g. http://www.?????.com/index.html, You cannot only fill in url, http://www.?????.com. If you need to open an APP page, you need to enter its filename. e.g. web1.html';}else{echo '網頁填寫時必須填上網頁檔案,e.g. http://www.?????.com/index.html, 不能只填域名,http://www.?????.com。若是應用頁,填檔名,e.g. web1.html。';}?></p>
	<p><?php  if(!$roww[pjnbr])$roww[pjnbr] = '???';
	if($_SESSION[tn]==PRC){echo '若使用应用内相片,档案放置於panel/'.$roww[pjnbr].'/images档夹内,e.g. picture.png。您亦能在相片档名加[1],有不同形式显示,e.g. picture[1].png 。';}else if($_SESSION[tn]==EN){echo 'If you need to use picture stored inside APP, you need to place the file to folder panel/'.$roww[pjnbr].'/images. e.g. picture.png. If you name the picture with [1], the picture display style is different. e.g picture[1].png.';}else{echo '若使用應用內相片,檔案放置於panel/'.$roww[pjnbr].'/images檔夾內,e.g. picture.png。您亦能在相片檔名加[1],有不同形式顯示,e.g. picture[1].png。';}?></p>
	
	<?php ;}//if(!$owl){?>
	
	
	<hr><p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '字体颜色';}else if($_SESSION[tn]==EN){echo 'Text color';}else{echo '字體顏色';}?></b>
	<?php if($_SESSION[tn]==PRC){echo '您能填上 hex颜色码 e.g. #123456。';}else if($_SESSION[tn]==EN){echo 'You need to use hex color code e.g. #123456.';}else{echo '您能填上 hex顏色碼 e.g. #123456。';}?></b>
	<hr><p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '文字区背景颜色';}else if($_SESSION[tn]==EN){echo 'Background color of Text area';}else{echo '文字區背景顏色';}?></b>
	<?php if($_SESSION[tn]==PRC){echo '您能填上rgb颜色码e.g. rgb(125,125,125), rgba颜色码e.g. rgba(125,125,125,0.5) 或 hex颜色码e.g. #123456。';}else if($_SESSION[tn]==EN){echo 'You can add rgb color code e.g. rgb(125,125,125), rgba color code e.g. rgba(125,125,125,0.5) or hex color code e.g. #123456. If you use background picture for the page, you may use rgba color code.';}else{echo '您能填上rgb顏色碼e.g. rgb(125,125,125), rgba顏色碼e.g. rgba(125,125,125,0.5) 或 hex顏色碼e.g. #123456。若整頁是有背景圖像,您應使用rgba。';}?>
	<!--<?php if($_SESSION[tn]==PRC){echo '您能填上rgb颜色码e.g. rgb(125,125,125), rgba颜色码e.g. rgba(125,125,125,0.5) 或 hex颜色码e.g. #123456。若整页是有背景图像,您应使用rgba。您亦能填颜色主题a到z。';}else if($_SESSION[tn]==EN){echo 'You can add rgb color code e.g. rgb(125,125,125), rgba color code e.g. rgba(125,125,125,0.5) or hex color code e.g. #123456. If you use background picture for the page, you may use rgba color code. You can also fill in color theme a to z.';}else{echo '您能填上rgb顏色碼e.g. rgb(125,125,125), rgba顏色碼e.g. rgba(125,125,125,0.5) 或 hex顏色碼e.g. #123456。若整頁是有背景圖像,您應使用rgba。您亦能填顏色主題a到z。';}?>!--></p>	
	
	<hr><p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '文字显示';}else if($_SESSION[tn]==EN){echo 'Show all texts ';}else{echo '文字顯示';}?></b>
	<?php if($_SESSION[tn]==PRC){echo '您应将浏览器调至移动设备尺寸浏览您的设计。点选代表键入的文字不限高度全部显示。';}else if($_SESSION[tn]==EN){echo 'All text will be showed on the button. You need to resize your browser as mobile phone to view the difference.';}else{echo '您應將瀏覽器調至移動設備尺寸瀏覽您的設計。點選代表鍵入的文字不限高度全部顯示。';}?></b>
	
	
	<hr><p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '闊度%';}else if($_SESSION[tn]==EN){echo 'Width%';}else{echo '闊度%';}?></b>
	<?php if($_SESSION[tn]==PRC){echo '若选格数是一格,您能自定按钮阔度,填整数,是用户的浏览屏幕阔的百分比。';}else if($_SESSION[tn]==EN){echo 'If you select \'1 grid\', you can assign the button width relating to screen width of APP user\'s device. You need to enter integer.';}else{echo '若選格數是一格,您能自定按鈕闊度,填整數,是用戶的瀏覽屏幕闊的百分比。';}?></p>
	
	<hr>
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '编辑器';}else if($_SESSION[tn]==EN){echo 'Editor';}else{echo '編輯器';}?></b> 
		<?php if($_SESSION[tn]==PRC){echo '若使用编辑器,不用填以下表格并能自定布局。若使用表格,不能用编辑器修改。';}else if($_SESSION[tn]==EN){echo 'You do not need to fill in the following form if you use the editor. You can design the layout of grids for the pictures. The design work created by the following form cannot be amended by the editor.';}else{echo '若使用編輯器,不用填以下表格並能自定佈局。若使用表格,不能用編輯器修改。';}?></p>	
	</div>


<?php if(!$_GET[owl]){?>
	<a href="#popuppicsdphp"  data-rel="popup" data-transition="pop"  class="ui-btn ui-btn-b ui-btn-inline ui-icon-edit ui-btn-icon-left ui-corner-all ui-mini"><?php if($_SESSION[tn]==PRC){echo '编辑器';}else if($_SESSION[tn]==EN){echo 'Editor';}else{echo '編輯器';}?></a>
	
	<div id="popuppicsdphp" data-role="popup" data-theme="none">
	<ul style="min-width:210px;" data-role="listview" data-inset="true">
	<li><a href="popuppicsd.php?pj=<?php echo $roww[pjnbr]?>&ap=<?php echo $roww[ap]?>&pn=<?php echo $pn?>&g=1&typ=popuppicsd" data-ajax="false">1 <?php if($_SESSION[tn]==PRC){echo '格';}else if($_SESSION[tn]==EN){echo 'grid';}else{echo '格';}?></a></li>
	<li><a href="popuppicsd.php?pj=<?php echo $roww[pjnbr]?>&ap=<?php echo $roww[ap]?>&pn=<?php echo $pn?>&g=2&typ=popuppicsd" data-ajax="false">2 <?php if($_SESSION[tn]==PRC){echo '格';}else if($_SESSION[tn]==EN){echo 'grid';}else{echo '格';}?></a></li>
	<li><a href="popuppicsd.php?pj=<?php echo $roww[pjnbr]?>&ap=<?php echo $roww[ap]?>&pn=<?php echo $pn?>&g=3&typ=popuppicsd" data-ajax="false">3 <?php if($_SESSION[tn]==PRC){echo '格';}else if($_SESSION[tn]==EN){echo 'grid';}else{echo '格';}?></a></li>
	<li><a href="popuppicsd.php?pj=<?php echo $roww[pjnbr]?>&ap=<?php echo $roww[ap]?>&pn=<?php echo $pn?>&g=4&typ=popuppicsd" data-ajax="false">4 <?php if($_SESSION[tn]==PRC){echo '格';}else if($_SESSION[tn]==EN){echo 'grid';}else{echo '格';}?></a></li>
	<li><a href="popuppicsd.php?pj=<?php echo $roww[pjnbr]?>&ap=<?php echo $roww[ap]?>&pn=<?php echo $pn?>&g=5&typ=popuppicsd" data-ajax="false">5 <?php if($_SESSION[tn]==PRC){echo '格';}else if($_SESSION[tn]==EN){echo 'grid';}else{echo '格';}?></a></li>
	<li><a href="popuppicsd.php?pj=<?php echo $roww[pjnbr]?>&ap=<?php echo $roww[ap]?>&pn=<?php echo $pn?>&typ=popuppicsd" data-ajax="false"><?php if($_SESSION[tn]==PRC){echo '修訂/自定';}else if($_SESSION[tn]==EN){echo 'amend/custom';}else{echo '修訂/自定';}?></a></li>

	</ul></div>
	<?php ;}//if(!$_GET[owl]){?>

 
<?php if($_GET[owl]){?>
<a href="#tpsN" data-rel="popup" data-transition="pop" class="ui-btn ui-btn-b ui-btn-inline ui-corner-all ui-mini">? <?php if($_SESSION[tn]==PRC){echo '相簿应用解释';}else if($_SESSION[tn]==EN){echo 'Album Explanation';}else{echo '相簿應用解釋';}?></a>
	<div data-role="popup" id="tpsN" style="min-width:300px;max-width:85%" data-position-to="window" data-theme="f"> <a href="#" class="ui-btn ui-corner-all ui-icon-delete ui-btn-icon-notext ui-btn-right" data-rel="back"></a>

	<h4 style="color:black"><?php if($_SESSION[tn]==PRC){echo '使用';}else if($_SESSION[tn]==EN){echo 'Use';}else{echo '使用';}?></h4>
	<p><?php if($_SESSION[tn]==PRC){echo '限一行格数选用\'1格\'。';}else if($_SESSION[tn]==EN){echo 'You need to select \'1 grid\' for the Number of grid/row.';}else{echo '限一行格數選用\'1格\'。';}?></p>
	<p><?php if($_SESSION[tn]==PRC){echo '您需预备相片并存於应用的panel/'.$roww[pjnbr].'/images档夹及特定互联网伺服器。';}else if($_SESSION[tn]==EN){echo 'You need to prepare pictures and store them in panel/'.$roww[pjnbr].'/images folder or specific Internet server.';}else{echo '需預備相片並存於應用的panel/'.$roww[pjnbr].'/images檔夾及特定互聯網伺服器。';}?></p>

	<hr>
	<h4 style="color:black"><?php if($_SESSION[tn]==PRC){echo '使用AJAX互联数据';}else if($_SESSION[tn]==EN){echo 'Use AJAX DATA URL';}else{echo '使用AJAX互聯數據';}?></h4>
	<p><?php if($_SESSION[tn]==PRC){echo '若设置互联数据[AJAX数据URL],应用是显示互联数据,而非此处巳填上的预设数据。互联数据格式是特定JSON格式。';}else if($_SESSION[tn]==EN){echo 'If you add the AJAX DATA URL, APP will show the related data rather than the data you entered in this page. The Internet data is specific JSON format.';}else{echo '若設置互聯數據[AJAX數據URL],應用是顯示互聯數據,而非此處巳填上的預設數據。互聯數據格式是特定JSON格式。';}?></p>
	<p><?php if($_SESSION[tn]==PRC){echo '您须填写\'格相1 URL\'丶AJAX数据URL及相簿相片数量。填格相1 URL是填相片档名,用户点撀此相片显示POPUP的相簿,若在互联数据亦设此相数据,是显示互联数据的相片。';}else if($_SESSION[tn]==EN){echo 'You need to fill in Grid Picture 1 URL,AJAX DATA URL and Album photo quantity. The  Grid Picture 1 URL is a filename of picture. If you also enter this picture data in your Internet data, the APP will show the Internet one.';}else{echo '您須填寫\'格相1 URL\'、AJAX數據URL及相簿相片數量。填\'格相1 URL\'是填相片檔名,用戶點撀此相片顯示POPUP的相簿,若在互聯數據亦設此相數據,是顯示互聯數據的相片。';}?></p>

	<hr>
	<h4 style="color:black"><?php if($_SESSION[tn]==PRC){echo '相簿相片数量';}else if($_SESSION[tn]==EN){echo 'Album photo quantity';}else{echo '相簿相片數量';}?></h4>
	<p><?php if($_SESSION[tn]==PRC){echo '在popup内显示的相簿相片总数量。';}else if($_SESSION[tn]==EN){echo 'It is about the total number of photo in the popup content.';}else{echo '在popup內顯示的相簿相片總數量。';}?></p>
	<hr>
	<h4 style="color:black"><?php if($_SESSION[tn]==PRC){echo '相簿相片高度';}else if($_SESSION[tn]==EN){echo 'Album photo height';}else{echo '相簿相片高度';}?>/<?php if($_SESSION[tn]==PRC){echo '相簿相片阔度';}else if($_SESSION[tn]==EN){echo 'Album photo width';}else{echo '相簿相片闊度';}?></h4>
	<p><?php if($_SESSION[tn]==PRC){echo '相簿相片限用同一尺寸。您能在windows的档案管理员将鼠标移到相片档名上,有相片的尺寸显示。';}else if($_SESSION[tn]==EN){echo 'You can use same photo size in an album. You can obtain photo size by moving cursor to the filename in Windows file manager.';}else{echo '相簿相片限用同一尺寸。您能在windows的檔案管理員將鼠標移到相片檔名上,有相片的尺寸顯示。';}?></p>
	<p><?php if($_SESSION[tn]==PRC){echo '相簿相片尺寸是用作显示尺寸计算,并非实际显示尺寸。';}else if($_SESSION[tn]==EN){echo 'Album  photo size is for calculation purpose but not for actual display size.';}else{echo '相簿相片尺寸是用作顯示尺寸計算,並非實際顯示尺寸。';}?></p>
<hr>
<h4 style="color:black"><?php if($_SESSION[tn]==PRC){echo '效果';}else if($_SESSION[tn]==EN){echo 'Effect';}else{echo '效果';}?></h4>
	<p><?php if($_SESSION[tn]==PRC){echo '内容段显示效果。';}else if($_SESSION[tn]==EN){echo 'The animation effect of content section can be added.';}else{echo '內容段顯示效果。';}?></p>	
<hr>	
	<h4 style="color:black"><?php if($_SESSION[tn]==PRC){echo '相簿数据档名';}else if($_SESSION[tn]==EN){echo 'Album data filename';}else{echo '相簿數據檔名';}?></h4>
	<p><?php if($_SESSION[tn]==PRC){echo '存于互联网的数据档名,用json格式的数据,数据包括相片,标题,字色及背景颜色。参考本司网站。';}else if($_SESSION[tn]==EN){echo 'You need to store the json data file in the Internet. The data include photo url, title, tilte color and background color. Please refer to our website.';}else{echo '存於互聯網的數據檔名,用json格式的數據,數據包括相片,標題,字色及背景顏色。參考本司網站。';}?></p>
	<hr>
	<h4 style="color:black"><?php if($_SESSION[tn]==PRC){echo '字体顏色';}else if($_SESSION[tn]==EN){echo 'Font color';}else{echo '字體顏色';}?></h4>
	<p><?php if($_SESSION[tn]==PRC){echo '您能填上 hex颜色码 e.g. #123456。此项能在数据档逐个设置。';}else if($_SESSION[tn]==EN){echo 'You need to use hex color code e.g. #123456. You can edit it for each photo in the data file.';}else{echo '您能填上 hex顏色碼 e.g. #123456。此項能在數據檔逐個設置。';}?></p>
	<hr>
	<h4 style="color:black"><?php if($_SESSION[tn]==PRC){echo '背景顏色';}else if($_SESSION[tn]==EN){echo 'Background';}else{echo '背景顏色';}?></h4>
	<p><?php if($_SESSION[tn]==PRC){echo '您能填上rgb颜色码e.g. rgb(125,125,125), rgba颜色码e.g. rgba(125,125,125,0.5) 或 hex颜色码e.g. #123456。您应使用rgba。此项能在数据档逐个设置。';}else if($_SESSION[tn]==EN){echo 'You can add rgb color code e.g. rgb(125,125,125), rgba color code e.g. rgba(125,125,125,0.5) or hex color code e.g. #123456. The rgba color code is recommended. You can edit it for each photo in the data file.';}else{echo '您能填上rgb顏色碼e.g. rgb(125,125,125), rgba顏色碼e.g. rgba(125,125,125,0.5) 或 hex顏色碼e.g. #123456。您應使用rgba。此項能在數據檔逐個設置。';}?></p>
	</div>
		

	<?php ;}?>
	
		<?php if(!$tbgvlu[0] and !$tbgvlu[1] and !$tbgvlu[2] and !$_GET[owl]){?>
<a href="#tpsn" data-rel="popup" data-transition="pop" class="ui-btn ui-btn-b ui-btn-inline ui-corner-all ui-mini">? <?php if($_SESSION[tn]==PRC){echo '电邮/电话按钮';}else if($_SESSION[tn]==EN){echo 'Email/phone button';}else{echo '電郵/電話按鈕';}?></a>
	<div data-role="popup" id="tpsn" style="min-width:300px;max-width:85%" data-position-to="window" data-theme="f"><a href="#" class="ui-btn ui-corner-all ui-icon-delete ui-btn-icon-notext ui-btn-right" data-rel="back"></a>
	<p style="color:black"><b><?php if($_SESSION[tn]==PRC){echo '解释';}else if($_SESSION[tn]==EN){echo 'Explanation';}else{echo '解釋';}?></b></p>
	<p style="color:black"><b><?php if($_SESSION[tn]==PRC){echo '使用';}else if($_SESSION[tn]==EN){echo 'Use';}else{echo '使用';}?></b></p>
	<p><?php if($_SESSION[tn]==PRC){echo '限适用的电话设备应用。用户点撀按钮能使用设备相关功能或应用。电话号限1个,电邮用;号隔开。您须键入tel:及mailto:作前端。e.g. tel:12345678 或 mailto:example@yahoo.com;examples@yahoo.com; 。';}else if($_SESSION[tn]==EN){echo 'It is for appropriate mobile device only. APP user clicks the related button to use related function or APP in APP user\'s device. You can only enter one phone number or use ; as seperator for email accounts. You need to enter tel: for phone number and mailto: for email accounts. e.g. tel:12345678 or mailto:example@yahoo.com;examples@yahoo.com;';}else{echo '限適用的移動電話應用。用戶點撀按鈕能使用設備相關功能或應用。電話號限1個,電郵用;號隔開。您須鍵入tel:及mailto:作前端。e.g. tel:12345678 或 mailto:example@yahoo.com;examples@yahoo.com; 。';}?></p>
	<p><?php if($_SESSION[tn]==PRC){echo '一个按钮限键入电邮或电话。';}else if($_SESSION[tn]==EN){echo 'You can only enter phone number or mail for a button.';}else{echo '一個按鈕限鍵入電郵或電話。';}?></p>
	<p><?php if($_SESSION[tn]==PRC){echo '此项填在\'Popup url/Popup档名\'内。';}else if($_SESSION[tn]==EN){echo 'You need to enter the phone number or mail to \'Popup url/Popup File name\'.';}else{echo '此項填在\'Popup url/Popup檔名\'內。';}?></p>
	
	<p><?php if($_SESSION[tn]==PRC){echo '对於电邮按钮,您亦试加标题及内容,格式是mailto:email account?subject=subject content&body=body content。e.g. mailto:example@yahoo.com?subject=您的电邮标题&body=您的电邮内容。';}else if($_SESSION[tn]==EN){echo 'You need to try to add title and content value to email button. The format is mailto:email account?subject=subject content&body=body content. e.g mailto:example@yahoo.com?subject=your email title&body=your email content';}else{echo '對於電郵按鈕,您亦試加標題及內容,格式是mailto:email account?subject=subject content&body=body content。e.g. mailto:example@yahoo.com?subject=您的電郵標題&body=您的電郵內容';}?></p>
	<p><?php if($_SESSION[tn]==PRC){echo '在body内容是用%0d%0a作为换行。';}else if($_SESSION[tn]==EN){echo 'You can use %0d%0a as line break in body content.';}else{echo '在body內容是用%0d%0a作為換行。';}?></p>
	
	<p><?php if($_SESSION[tn]==PRC){echo '您亦到访本司网站,有进一步指引或资讯。';}else if($_SESSION[tn]==EN){echo 'You can visit our website to get more information.';}else{echo '您亦到訪本司網站,有進一步指引或資訊。';}?></p>
	</div>
<?php ;}//if($_GET[owl]){?>	

	<?php if($_GET[owl]){?>
<a href="#try" data-rel="popup" data-transition="pop" class="ui-btn ui-btn-f ui-btn-inline ui-corner-all ui-mini" style="color:BLACK"><span class="pigss-pencil" style="color:red"></span><?php if($_SESSION[tn]==PRC){echo '快速试用';}else if($_SESSION[tn]==EN){echo 'Quick try';}else{echo '快速試用';}?></a>
		<div data-role="popup" id="try" data-position-to="window" data-theme="f" class="ifrwidth"><a href="#" data-rel="back" class="popn ui-btn ui-btn-z ui-btn-icon-notext ui-icon-delete"></a><BR><BR>
		<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '预备相片';}else if($_SESSION[tn]==EN){echo 'Photo preparation';}else{echo '預備相片';}?></b> &nbsp;<?php if($_SESSION[tn]==PRC){echo '您须预备1张相片[横向],并存於panel/'.$roww[pjnbr].'/images。';}else if($_SESSION[tn]==EN){echo 'You need to prepare a landscape photo and place it to the folder panel/'.$roww[pjnbr].'/images.';}else{echo '您須預備1張相片[橫向],並存於panel/'.$roww[pjnbr].'/images。';}?></p>	
		<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '项目填写';}else if($_SESSION[tn]==EN){echo 'Item information';}else{echo '項目填寫';}?></b> &nbsp;<?php if($_SESSION[tn]==PRC){echo '在\'格相1 URL\'填写相片档名及在\'阔度%\'填35,到本司网站,按指引填\'AJAX数据URL\'及相簿相片尺寸并提送。';}else if($_SESSION[tn]==EN){echo 'You need to enter the photo filename to Add Picture 1 URL and enter 35 to \'Width%\'.  You need to visit our website and follow the instruction to enter AJAX DATA URL and Album photo size and then click the SEND button.';}else{echo '在\'格相1 URL\'填寫相片檔名及在\'闊度%\'填35,到本司網站,按指引填\'AJAX數據URL\'及相簿相片尺寸並提送。';}?></p>	<HR>
		<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '试用';}else if($_SESSION[tn]==EN){echo 'Testing';}else{echo '試用';}?></b> &nbsp;
	<?php if($_SESSION[tn]==PRC){echo '您须点撀此页上的预览,再进行测试。再修改及选用不同设置再预览并试用。';}else if($_SESSION[tn]==EN){echo 'You need to click the above preview button to test your design. You can enter or select different parameters to test their functions and effects.';}else{echo '您須點撀此頁上的預覽,再進行測試。再修改及選用不同設置再預覽並試用。';}?></p>	
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '试用步骤';}else if($_SESSION[tn]==EN){echo 'Testing Steps';}else{echo '試用步驟';}?></b> &nbsp;
	<?php if($_SESSION[tn]==PRC){echo '在预览页点撀相片,在POPUP相簿内拖拽相片浏览。';}else if($_SESSION[tn]==EN){echo 'You can click the photo to show popup album on the preview page and swipe the photo on album.';}else{echo '在預覽頁點撀相片,在POPUP相簿內拖拽相片瀏覽。';}?></p>	
		</div>
<?php ;}else{//if($_GET[owl]){?>

<a href="#try" data-rel="popup" data-transition="pop" class="ui-btn ui-btn-f ui-btn-inline ui-corner-all ui-mini" style="color:BLACK"><span class="pigss-pencil" style="color:red"></span><?php if($_SESSION[tn]==PRC){echo '快速试用';}else if($_SESSION[tn]==EN){echo 'Quick try';}else{echo '快速試用';}?></a>
		<div data-role="popup" id="try" data-position-to="window" data-theme="f" class="ifrwidth"><a href="#" data-rel="back" class="popn ui-btn ui-btn-z ui-btn-icon-notext ui-icon-delete"></a><BR><BR>
		<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '预备相片';}else if($_SESSION[tn]==EN){echo 'Photo preparation';}else{echo '預備相片';}?></b> &nbsp;<?php if($_SESSION[tn]==PRC){echo '您须预备三张相片,并存於panel/'.$roww[pjnbr].'/images。';}else if($_SESSION[tn]==EN){echo 'You need to prepare three photos and place them to the folder panel/'.$roww[pjnbr].'/images.';}else{echo '您須預備三張相片,並存於panel/'.$roww[pjnbr].'/images。';}?></p>	
		<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '项目填写';}else if($_SESSION[tn]==EN){echo 'Item information';}else{echo '項目填寫';}?></b> &nbsp;<?php if($_SESSION[tn]==PRC){echo '在\'一行格数\'选五格,在\'格相1 URL\',\'格相2 URL\',\'格相3 URL\',\'格相4 URL\'及\'格相5 URL\'填写相片档名[选二张相片并双间填写],再在\'Popup url/Popup 档名\'共五个值均填另一张相片档案名并提送。';}else if($_SESSION[tn]==EN){echo 'You need to select \'five grid\' in \'Number of grid/row\' and enter any one of two photo filenames to Grid Picture 1 URL, Grid Picture 2 URL, Grid Picture 3 URL, Grid Picture 4 URL and Grid Picture 5 URL. You need to enter the third photo filename to the five values of POPUP URL/POPUP File name and then click the SEND button.';}else{echo '在\'一行格數\'選五格,在\'格相1 URL\',\'格相2 URL\',\'格相3 URL\',\'格相4 URL\'及\'格相5 URL\'填寫相片檔名[選二張相片並雙間填寫],再在\'Popup url/Popup 檔名\'共五個值均填另一張相片檔案名並提送。';}?></p>	<HR>
		<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '试用';}else if($_SESSION[tn]==EN){echo 'Testing';}else{echo '試用';}?></b> &nbsp;
	<?php if($_SESSION[tn]==PRC){echo '您须点撀此页上的预览,再进行测试。再修改及选用不同设置再预览并试用。';}else if($_SESSION[tn]==EN){echo 'You need to click the above preview button to test your design. You can enter or select different parameters to test their functions and effects.';}else{echo '您須點撀此頁上的預覽,再進行測試。再修改及選用不同設置再預覽並試用。';}?></p>	
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '试用步骤';}else if($_SESSION[tn]==EN){echo 'Testing Steps';}else{echo '試用步驟';}?></b> &nbsp;
	<?php if($_SESSION[tn]==PRC){echo '在预览页点撀相片显示POPUP。';}else if($_SESSION[tn]==EN){echo 'You can click the photo to show popup on preview page.';}else{echo '在預覽頁點撀相片顯示POPUP。';}?></p>	
		<HR>
		<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '电邮/电话按钮';}else if($_SESSION[tn]==EN){echo 'Email/phone button';}else{echo '電郵/電話按鈕';}?></b> &nbsp;<?php if($_SESSION[tn]==PRC){echo '只能用合适浏览器试用电邮按钮,是开启用户合适设备的相关电邮应用软件。在\'Popup url/Popup 档名\'改填email户名,您能先点撀\'改填电邮或电话号\'并选点\'电邮 mailto:\'才填上email户名,e.g. mailto:????@google.com。';}else if($_SESSION[tn]==EN){echo 'You can try email button only in appropriate browser of computer. This function is to open email APP in appropriate APP user device. You need to fill in email account to POPUP URL/POPUP File name. You need to click the Tel/Email button, click the [Email] mailto:] and enter an email account POPUP URL/POPUP File name. e.g.  mailto:????@google.com';}else{echo '只能用合適瀏覽器試用電郵按鈕,是開啟用戶合適設備的相關電郵應用軟件。在\'Popup url/Popup 檔名\'改填email戶名,您能先點撀\'改填電郵或電話號\'並選點\'電郵 mailto:\'才填上email戶名,e.g. mailto:????@google.com。';}?></p>	
		
		</div>


<?php ;}?>			

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
				$gridpic  = str_replace('<!--data-tabnbg'.$tabnbgdatn[0].'data-tabnbg!-->','',$gridpic);	
				;}		
				$gridpic  = str_replace('</div></div><!--vnts!-->','',$gridpic);
				
			if(strpos($gridpic,'swiper-lazy')!=false){$owl = '&owl=1';$_GET[owl] = 1;}
			$tbgnvlu = explode('<!--data',$gridpic);
			if($_GET[owl]){				
				if($tbgnvlu[1]){
					$tbgsvlu = explode('data!-->',$tbgnvlu[1]);
					$tbgvlu = explode('@#@',$tbgsvlu[0]);
				}
			;}else{
				if($tbgnvlu[1]){
					$tbgsvlu = explode('data!-->',$tbgnvlu[1]);
					$tbgvln = explode('@#@',$tbgsvlu[0]);
				}
			;} 
			
			
				
				if(strpos($gridpic,'col-md')!=false)$bootstrap = 1;
			;}
	?>	
	<hr>
	<?php if($_GET[owl])$owl='&owl=1'; ?>
	<FORM action="popuppics.php?pj=<?php echo htmlspecialchars($roww[pjnbr]) ?>&ap=<?php echo htmlspecialchars($roww[ap]) ?>&pn=<?php echo htmlspecialchars($pn).$tln.$owl ?>" id="webxls" method="post" data-ajax="false"  onSubmit="return checkform(this);">
	
	<span style="color:black"><?php if($_SESSION[tn]==PRC){echo '专案';}else if($_SESSION[tn]==EN){echo 'Project';}else{echo '專案';}?></span>
	<?php 	$sql=$db->query("select * from webpj where cno='$pj'");
	if($sql)$row=$sql->fetch();
	echo '['.htmlspecialchars($row[date]).'] '.htmlspecialchars($row[title]);?>
	
	&nbsp;&nbsp;&nbsp;&nbsp;
	
	<span style="color:black"><?php if($_SESSION[tn]==PRC){echo '应用页称';}else if($_SESSION[tn]==EN){echo 'Page name';}else{echo '應用頁稱';}?></span> :
	<?php echo htmlspecialchars($roww[title])?>
	<hr>
	<?php if($_GET[owl]){if($_SESSION[tn]==PRC){echo '相簿 - ';}else if($_SESSION[tn]==EN){echo 'Album - ';}else{echo '相簿 - ';};}?>  
	<?php if($_SESSION[tn]==PRC){echo 'POPUP相片创建';}else if($_SESSION[tn]==EN){echo 'POPUP PICTURE CREATING';}else{echo 'POPUP相片創建';}?>  
	[<?php if($_SESSION[tn]==PRC){echo '按鈕形式';}else if($_SESSION[tn]==EN){echo 'button style';}else{echo '按鈕形式';}?>]<br>

	<br>


	
	<div class="ui-grid-c"><div class="ui-block-a"><?php if($_SESSION[tn]==PRC){echo '一行格数';}else if($_SESSION[tn]==EN){echo 'Number of grid/row';}else{echo '一行格數';}?>
	<select name="grid" required>
	
	<?php if(!$tbgvlu[0] and !$tbgvlu[1] and !$tbgvlu[2] and !$_GET[owl]){?>
	<option value=""><?php if($_SESSION[tn]==PRC){echo '选择';}else if($_SESSION[tn]==EN){echo 'Choose';}else{echo '選擇';}?></option><?php ;}?>
	<option value="solo" <?php if($owl or $tbgvln[0]=='solo')echo 'selected=selected';?>>1 <?php if($_SESSION[tn]==PRC){echo '格';}else if($_SESSION[tn]==EN){echo 'grid';}else{echo '格';}?></option>
	<?php if(!$tbgvlu[0] and !$tbgvlu[1] and !$tbgvlu[2] and !$_GET[owl]){?>
	<option value="a" <?php if($tbgvln[0]=='a')echo 'selected=selected';?>>2 <?php if($_SESSION[tn]==PRC){echo '格';}else if($_SESSION[tn]==EN){echo 'grid';}else{echo '格';}?></option>
	<option value="b" <?php if($tbgvln[0]=='b')echo 'selected=selected';?>>3 <?php if($_SESSION[tn]==PRC){echo '格';}else if($_SESSION[tn]==EN){echo 'grid';}else{echo '格';}?></option>
	<option value="c" <?php if($tbgvln[0]=='c')echo 'selected=selected';?>>4 <?php if($_SESSION[tn]==PRC){echo '格';}else if($_SESSION[tn]==EN){echo 'grid';}else{echo '格';}?></option>
	
	<option value="d" <?php if($tbgvln[0]=='d')echo 'selected=selected';?>>5 <?php if($_SESSION[tn]==PRC){echo '格';}else if($_SESSION[tn]==EN){echo 'grid';}else{echo '格';}?></option>
	<?php ;}?>
	</select>
		</div>
	<?php if($tbgvln[0]=='solo' or $_GET[owl]){?>
	<div class="ui-block-b"><?php if($_SESSION[tn]==PRC){echo '闊度%';}else if($_SESSION[tn]==EN){echo 'Width%';}else{echo '闊度%';}?>
	<input type="number" name="gridwdh" placeholder=""  value="<?php if($owl){echo htmlspecialchars($tbgvlu[5]);}else{echo htmlspecialchars($tbgvlu[3]);} ?>">	
	</div>
	<?php ;}?>
	<div class="ui-block-<?php if($gridvlu[0]=='solo'){echo 'c';}else{echo 'b';}?>"><BR>
	<input type="submit" name="submit" id="webxlsbtn" Value="<?php if($_SESSION[tn]==PRC){echo '送交';}else if($_SESSION[tn]==EN){echo 'SEND';}else{echo '送交';}?>">
	
	</div></div>
	

	<hr>
<br>	
<?php if($_SESSION[tn]==PRC){echo '格相1 URL';}else if($_SESSION[tn]==EN){echo 'Grid Picture 1 URL';}else{echo '格相1 URL';}?>
	<div class="ui-grid-a"><div class="ui-block-a" style="width:78%"><input type="text" name="img1" placeholder="<?php if($_SESSION[tn]==PRC){echo '相片';}else if($_SESSION[tn]==EN){echo 'Picture ';}else{echo '相片';}?>URL/<?php if($_SESSION[tn]==PRC){echo '档名';}else if($_SESSION[tn]==EN){echo 'File name';}else{echo '檔名';}?>"  value="<?php if($owl){echo htmlspecialchars($tbgvlu[7]);}else{echo htmlspecialchars($tbgvln[1]);} ?>"></div><div class="ui-block-b" style="width:22%;padding-top:10px;"><?php if($_SESSION[tn]==PRC){echo '相片';}else if($_SESSION[tn]==EN){echo 'Picture ';}else{echo '相片';}?>URL/<?php if($_SESSION[tn]==PRC){echo '档名';}else if($_SESSION[tn]==EN){echo 'File name';}else{echo '檔名';}?></div><div class="ui-block-a" style="width:78%"><input type="text" name="imgtitle1" placeholder="<?php if($_SESSION[tn]==PRC){echo '标题';}else if($_SESSION[tn]==EN){echo 'title';}else{echo '標題';}?>" value="<?php if($owl){echo htmlspecialchars($tbgvlu[8]);}else{echo htmlspecialchars($tbgvln[2]);} ?>"></div><div class="ui-block-b" style="width:22%;padding-top:10px;"><?php if($_SESSION[tn]==PRC){echo '标题';}else if($_SESSION[tn]==EN){echo 'title';}else{echo '標題';}?></div>
	
	<div class="ui-block-a" style="width:78%"><input type="text" name="imgftr1" placeholder="<?php if($_SESSION[tn]==PRC){echo '备注';}else if($_SESSION[tn]==EN){echo 'footnote';}else{echo '備註';}?>"  value="<?php if($owl){echo htmlspecialchars($tbgvlu[9]);}else{echo htmlspecialchars($tbgvln[3]);} ?>"></div><div class="ui-block-b" style="width:22%;padding-top:10px;"><?php if($_SESSION[tn]==PRC){echo '备注';}else if($_SESSION[tn]==EN){echo 'footnote';}else{echo '備註';}?></div>
	<?php if(!$_GET[owl]){?><div class="ui-block-a" style="width:78%"><input type="text" name="imgs1" id="imgs1" placeholder="POPUP URL/POPUP<?php if($_SESSION[tn]==PRC){echo '档名';}else if($_SESSION[tn]==EN){echo 'File name';}else{echo '檔名';}?>"  value="<?php if($owl){echo htmlspecialchars($tbgvlu[10]);}else{echo str_replace('&amp;','&',htmlspecialchars($tbgvln[4]));} ?>"></div><div class="ui-block-b" style="width:22%;padding-top:10px;">Popup url/Popup<?php if($_SESSION[tn]==PRC){echo '档名';}else if($_SESSION[tn]==EN){echo ' File name';}else{echo '檔名';}?></div><?php ;}//if(!$_GET[owl]){?></div>

<?php if(!$_GET[owl]){?>
<a href="#imgt1" data-rel="popup" data-transition="pop" class="ui-btn ui-btn-f ui-btn-inline"><?php if($_SESSION[tn]==PRC){echo '改填电邮或电话号';}else if($_SESSION[tn]==EN){echo 'Tel/Email';}else{echo '改填電郵或電話號';}?></a>
<div id="imgt1" data-role="popup"><ul data-role="listview"><li class="imgt1" data-vlu="mailto:"><?php if($_SESSION[tn]==PRC){echo '电邮 mailto:';}else if($_SESSION[tn]==EN){echo '[Email] mailto:';}else{echo '電郵 mailto:';}?></li><li class="imgt1" data-vlu="tel:"><?php if($_SESSION[tn]==PRC){echo '电话号 tel:';}else if($_SESSION[tn]==EN){echo '[Tel] tel:';}else{echo '電話號 tel:';}?></li><li class="imgt1" data-vlu="sms:"><?php if($_SESSION[tn]==PRC){echo '电话号 sms:';}else if($_SESSION[tn]==EN){echo '[Tel] sms:';}else{echo '電話號 sms:';}?></li><li class="imgt1" data-vlu="geo:"><?php if($_SESSION[tn]==PRC){echo '地点 geo:';}else if($_SESSION[tn]==EN){echo '[Location] geo:';}else{echo '地點 geo:';}?></li></ul></div>
<?php ;}//if(!$_GET[owl]){?>
	<div class="ui-grid-b"><div class="ui-block-a"><?php if($_SESSION[tn]==PRC){echo '字体颜色';}else if($_SESSION[tn]==EN){echo 'Text color';}else{echo '字體顏色';}?>
	<input type="text" name="imgtclr1" placeholder="<?php if($_SESSION[tn]==PRC){echo '字体颜色';}else if($_SESSION[tn]==EN){echo 'Text color';}else{echo '字體顏色';}?>" value="<?php if($owl){echo htmlspecialchars($tbgvlu[11]);}else{echo htmlspecialchars($tbgvln[5]);} ?>">
	</div><div class="ui-block-b"><?php if($_SESSION[tn]==PRC){echo '文字区背景颜色';}else if($_SESSION[tn]==EN){echo 'Background color of Text area';}else{echo '文字區背景顏色';}?>
	<input type="text" name="imgclr1" placeholder="<?php if($_SESSION[tn]==PRC){echo '文字区背景颜色';}else if($_SESSION[tn]==EN){echo 'Background color of Text area';}else{echo '文字區背景顏色';}?>" value="<?php if($owl){echo htmlspecialchars($tbgvlu[12]);}else{echo htmlspecialchars($tbgvln[6]);} ?>">
	</div><div class="ui-block-c"><br>
	<input type="checkbox" name="wsp1" id="wsp1" value="1" <?php if($owl and $tbgvlu[13]){echo 'checked="checked"';}else if($tbgvln[7]){echo 'checked="checked"';} ?>><label for="wsp1"><?php if($_SESSION[tn]==PRC){echo '文字显示';}else if($_SESSION[tn]==EN){echo 'Show all texts ';}else{echo '文字顯示';}?></label>
</div></div>


	<?php if($gridvlu[0]=='solo' or $_GET[owl]){?>	
	<hr>
	<div class="ui-grid-c"><div class="ui-block-a"><?php if($_SESSION[tn]==PRC){echo '相簿相片数量';}else if($_SESSION[tn]==EN){echo 'Album photo quantity';}else{echo '相簿相片數量';}?>
	<input type="number" name="photonbr" placeholder="" value="<?php if($tbgvlu[0]){echo htmlspecialchars($tbgvlu[0]);}else{echo '2';} ?>" <?php if($owl)echo 'required'?>>
	</div><div class="ui-block-b"><?php if($_SESSION[tn]==PRC){echo '相簿相片高度';}else if($_SESSION[tn]==EN){echo 'Album photo height';}else{echo '相簿相片高度';}?>
	<input type="number" name="sizeheigw" placeholder="" value="<?php echo htmlspecialchars($tbgvlu[1]) ?>" <?php //if($owl)echo 'required'?>>
	</div><div class="ui-block-c"><?php if($_SESSION[tn]==PRC){echo '相簿相片阔度';}else if($_SESSION[tn]==EN){echo 'Album photo width';}else{echo '相簿相片闊度';}?>
	<input type="number" name="sizewidw" placeholder="" value="<?php echo htmlspecialchars($tbgvlu[2]) ?>" <?php //if($owl)echo 'required'?>>
	</div><div class="ui-block-d">	
	<?php if($_SESSION[tn]==PRC){echo '效果';}else if($_SESSION[tn]==EN){echo 'Effect';}else{echo '效果';}?>
	<select name="swiptrn">
	<option value="slide">slide</option>
	<option value="cube" <?php if($tbgvlu[3]=='cube')echo 'selected="selected"';?>>cube</option>
	<option value="fade" <?php if($tbgvlu[3]=='fade')echo 'selected="selected"';?>>fade</option>
	<option value="coverflow" <?php if($tbgvlu[3]=='coverflow')echo 'selected="selected"';?>>coverflow</option>
	</select>
	</div></div>
	
	<?php if($_SESSION[tn]==PRC){echo 'AJAX数据URL';}else if($_SESSION[tn]==EN){echo 'AJAX DATA URL';}else{echo 'AJAX數據URL';}?>
	<input type="text" name="photourl" placeholder="" value="<?php echo htmlspecialchars($tbgvlu[4]) ?>">

	
	<div class="ui-grid-c"><div class="ui-block-a" style="width:15%"><?php if($_SESSION[tn]==PRC){echo '相片档名';}else if($_SESSION[tn]==EN){echo 'Photo filename';}else{echo '相片檔名';}?>
	</div><div class="ui-block-b" style="width:65%"><?php if($_SESSION[tn]==PRC){echo '相片备注';}else if($_SESSION[tn]==EN){echo 'Photo remark';}else{echo '相片備註';}?>
	</div><div class="ui-block-c" style="width:10%"><?php if($_SESSION[tn]==PRC){echo '字体顏色';}else if($_SESSION[tn]==EN){echo 'Font color';}else{echo '字體顏色';}?>
	</div><div class="ui-block-d" style="width:10%"><?php if($_SESSION[tn]==PRC){echo '背景顏色';}else if($_SESSION[tn]==EN){echo 'Background';}else{echo '背景顏色';}?>
	</div></div>
	
	<div class="ui-grid-c">
	<div class="ui-block-a" style="width:15%">
	<input type="text" name="photo" placeholder="" value="<?php echo htmlspecialchars($tbgvlu[14]) ?>"></div><div class="ui-block-b" style="width:65%">
	<input type="text" name="photont" placeholder="" value="<?php echo htmlspecialchars($tbgvlu[15]) ?>"></div><div class="ui-block-c" style="width:10%">
	<input type="text" name="photclr" placeholder="" value="<?php echo htmlspecialchars($tbgvlu[16]) ?>"></div><div class="ui-block-d" style="width:10%">
	<input type="text" name="photbg" placeholder="" value="<?php echo htmlspecialchars($tbgvlu[17]) ?>">
	</div>
	<div class="ui-block-a" style="width:15%">
	<input type="text" name="photo1" placeholder="" value="<?php echo htmlspecialchars($tbgvlu[18]) ?>"></div><div class="ui-block-b" style="width:65%">
	<input type="text" name="photont1" placeholder="" value="<?php echo htmlspecialchars($tbgvlu[19]) ?>"></div><div class="ui-block-c" style="width:10%">
	<input type="text" name="photclr1" placeholder="" value="<?php echo htmlspecialchars($tbgvlu[20]) ?>"></div><div class="ui-block-d" style="width:10%">
	<input type="text" name="photbg1" placeholder="" value="<?php echo htmlspecialchars($tbgvlu[21]) ?>">
	</div>
	<?php 
	if($tbgvlu[0] >=3 and $tbgvlu[0]){$j = 22;$js= 23;$jss= 24;$jsss= 25;
		for($i=2;$i<$tbgvlu[0];$i++){
		echo '<div class="ui-block-a" style="width:15%">
	<input type="text" name="photo'.$i.'" placeholder="" value="'.htmlspecialchars($tbgvlu[$j]).'"></div><div class="ui-block-b" style="width:65%">
	<input type="text" name="photont'.$i.'" placeholder="" value="'.htmlspecialchars($tbgvlu[$js]).'"></div><div class="ui-block-b" style="width:10%">
	<input type="text" name="photclr'.$i.'" placeholder="" value="'.htmlspecialchars($tbgvlu[$jss]).'"></div><div class="ui-block-b" style="width:10%">
	<input type="text" name="photbg'.$i.'" placeholder="" value="'.htmlspecialchars($tbgvlu[$jsss]).'"></div>';$j=$j+4;$js=$js+4;$jss=$jss+4;$jsss=$jsss+4;
		;}
	;}	?>
	
	</div>
	
	<hr>
	
	<?php ;}//if($gridvlu[0]=='solo'){?>
<HR>
	<?php if($gridvlu[0]!='solo' and !$_GET[owl]){?>
	<?php if($_SESSION[tn]==PRC){echo '格相2 URL';}else if($_SESSION[tn]==EN){echo 'Grid Picture 2 URL';}else{echo '格相2 URL';}?>
	<input type="text" name="img2" placeholder="<?php if($_SESSION[tn]==PRC){echo '相片';}else if($_SESSION[tn]==EN){echo 'Picture ';}else{echo '相片';}?>URL/<?php if($_SESSION[tn]==PRC){echo '档名';}else if($_SESSION[tn]==EN){echo 'File name';}else{echo '檔名';}?>"  value="<?php echo htmlspecialchars($tbgvln[8]) ?>">
	<input type="text" name="imgtitle2" placeholder="<?php if($_SESSION[tn]==PRC){echo '标题';}else if($_SESSION[tn]==EN){echo 'title';}else{echo '標題';}?>" value="<?php echo htmlspecialchars($tbgvln[9]) ?>"  value="<?php echo htmlspecialchars($htmlpopupnbra[0]) ?>">
	<input type="text" name="imgftr2" placeholder="<?php if($_SESSION[tn]==PRC){echo '备注';}else if($_SESSION[tn]==EN){echo 'footnote';}else{echo '備註';}?>"  value="<?php echo htmlspecialchars($tbgvln[10]) ?>">	
	<input type="text" name="imgs2" id="imgs2" placeholder="POPUP URL/POPUP<?php if($_SESSION[tn]==PRC){echo '档名';}else if($_SESSION[tn]==EN){echo 'File name';}else{echo '檔名';}?>"  value="<?php echo str_replace('&amp;','&',htmlspecialchars($tbgvln[11])) ?>">
	
	<a href="#imgt2" data-rel="popup" data-transition="pop" class="ui-btn ui-btn-f ui-btn-inline"><?php if($_SESSION[tn]==PRC){echo '改填电邮或电话号';}else if($_SESSION[tn]==EN){echo 'Tel/Email';}else{echo '改填電郵或電話號';}?></a>
<div id="imgt2" data-role="popup"><ul data-role="listview"><li class="imgt2" data-vlu="mailto:"><?php if($_SESSION[tn]==PRC){echo '电邮 mailto:';}else if($_SESSION[tn]==EN){echo '[Email] mailto:';}else{echo '電郵 mailto:';}?></li><li class="imgt2" data-vlu="tel:"><?php if($_SESSION[tn]==PRC){echo '电话号 tel:';}else if($_SESSION[tn]==EN){echo '[Tel] tel:';}else{echo '電話號 tel:';}?></li><li class="imgt2" data-vlu="sms:"><?php if($_SESSION[tn]==PRC){echo '电话号 sms:';}else if($_SESSION[tn]==EN){echo '[Tel] sms:';}else{echo '電話號 sms:';}?></li><li class="imgt2" data-vlu="geo:"><?php if($_SESSION[tn]==PRC){echo '地点 geo:';}else if($_SESSION[tn]==EN){echo '[Location] geo:';}else{echo '地點 geo:';}?></li></ul></div>

	<div class="ui-grid-b"><div class="ui-block-a">
	<input type="text" name="imgtclr2" placeholder="<?php if($_SESSION[tn]==PRC){echo '字体颜色';}else if($_SESSION[tn]==EN){echo 'Text color';}else{echo '字體顏色';}?>" value="<?php echo htmlspecialchars($tbgvln[12]) ?>">
	</div><div class="ui-block-b">
	<input type="text" name="imgclr2" placeholder="<?php if($_SESSION[tn]==PRC){echo '文字区背景颜色';}else if($_SESSION[tn]==EN){echo 'Background color of Text area';}else{echo '文字區背景顏色';}?>" value="<?php echo htmlspecialchars($tbgvln[13]) ?>">
</div><div class="ui-block-c">
	<input type="checkbox" name="wsp2" id="wsp2" value="1" <?php if($tbgvln[14])echo 'checked="checked"'; ?>><label for="wsp2"><?php if($_SESSION[tn]==PRC){echo '文字显示';}else if($_SESSION[tn]==EN){echo 'Show all texts ';}else{echo '文字顯示';}?></label>
</div></div><HR>	
	<?php if($_SESSION[tn]==PRC){echo '格相3 URL';}else if($_SESSION[tn]==EN){echo 'Grid Picture 3 URL';}else{echo '格相3 URL';}?>
	<input type="text" name="img3" placeholder="<?php if($_SESSION[tn]==PRC){echo '相片';}else if($_SESSION[tn]==EN){echo 'Picture ';}else{echo '相片';}?>URL/<?php if($_SESSION[tn]==PRC){echo '档名';}else if($_SESSION[tn]==EN){echo 'File name';}else{echo '檔名';}?>"  value="<?php echo htmlspecialchars($tbgvln[15]) ?>">
	<input type="text" name="imgtitle3" placeholder="<?php if($_SESSION[tn]==PRC){echo '标题';}else if($_SESSION[tn]==EN){echo 'title';}else{echo '標題';}?>" value="<?php echo htmlspecialchars($tbgvln[16]) ?>">
	<input type="text" name="imgftr3" placeholder="<?php if($_SESSION[tn]==PRC){echo '备注';}else if($_SESSION[tn]==EN){echo 'footnote';}else{echo '備註';}?>"  value="<?php echo htmlspecialchars($tbgvln[17]) ?>">	
	<input type="text" name="imgs3" id="imgs3" placeholder="POPUP URL/POPUP<?php if($_SESSION[tn]==PRC){echo '档名';}else if($_SESSION[tn]==EN){echo 'File name';}else{echo '檔名';}?>"  value="<?php echo str_replace('&amp;','&',htmlspecialchars($tbgvln[18])) ?>">

<a href="#imgt3" data-rel="popup" data-transition="pop" class="ui-btn ui-btn-f ui-btn-inline"><?php if($_SESSION[tn]==PRC){echo '改填电邮或电话号';}else if($_SESSION[tn]==EN){echo 'Tel/Email';}else{echo '改填電郵或電話號';}?></a>
<div id="imgt3" data-role="popup"><ul data-role="listview"><li class="imgt3" data-vlu="mailto:"><?php if($_SESSION[tn]==PRC){echo '电邮 mailto:';}else if($_SESSION[tn]==EN){echo '[Email] mailto:';}else{echo '電郵 mailto:';}?></li><li class="imgt3" data-vlu="tel:"><?php if($_SESSION[tn]==PRC){echo '电话号 tel:';}else if($_SESSION[tn]==EN){echo '[Tel] tel:';}else{echo '電話號 tel:';}?></li><li class="imgt3" data-vlu="sms:"><?php if($_SESSION[tn]==PRC){echo '电话号 sms:';}else if($_SESSION[tn]==EN){echo '[Tel] sms:';}else{echo '電話號 sms:';}?></li><li class="imgt3" data-vlu="geo:"><?php if($_SESSION[tn]==PRC){echo '地点 geo:';}else if($_SESSION[tn]==EN){echo '[Location] geo:';}else{echo '地點 geo:';}?></li></ul></div>

	<div class="ui-grid-b"><div class="ui-block-a">
	<input type="text" name="imgtclr3" placeholder="<?php if($_SESSION[tn]==PRC){echo '字体颜色';}else if($_SESSION[tn]==EN){echo 'Text color';}else{echo '字體顏色';}?>" value="<?php echo htmlspecialchars($tbgvln[19]) ?>">
	</div><div class="ui-block-b">
	<input type="text" name="imgclr3" placeholder="<?php if($_SESSION[tn]==PRC){echo '文字区背景颜色';}else if($_SESSION[tn]==EN){echo 'Background color of Text area';}else{echo '文字區背景顏色';}?>" value="<?php echo htmlspecialchars($tbgvln[20]) ?>">
</div><div class="ui-block-c">
	<input type="checkbox" name="wsp3" id="wsp3" value="1" <?php if($tbgvln[21])echo 'checked="checked"'; ?>><label for="wsp3"><?php if($_SESSION[tn]==PRC){echo '文字显示';}else if($_SESSION[tn]==EN){echo 'Show all texts ';}else{echo '文字顯示';}?></label>
</div></div><HR>		
	<?php if($_SESSION[tn]==PRC){echo '格相4 URL';}else if($_SESSION[tn]==EN){echo 'Grid Picture 4 URL';}else{echo '格相4 URL';}?>
	<input type="text" name="img4" placeholder="<?php if($_SESSION[tn]==PRC){echo '相片';}else if($_SESSION[tn]==EN){echo 'Picture ';}else{echo '相片';}?>URL/<?php if($_SESSION[tn]==PRC){echo '档名';}else if($_SESSION[tn]==EN){echo 'File name';}else{echo '檔名';}?>"  value="<?php echo htmlspecialchars($tbgvln[22]) ?>">
	<input type="text" name="imgtitle4" placeholder="<?php if($_SESSION[tn]==PRC){echo '标题';}else if($_SESSION[tn]==EN){echo 'title';}else{echo '標題';}?>" value="<?php echo htmlspecialchars($tbgvln[23]) ?>">
	<input type="text" name="imgftr4" placeholder="<?php if($_SESSION[tn]==PRC){echo '备注';}else if($_SESSION[tn]==EN){echo 'footnote';}else{echo '備註';}?>"   value="<?php echo htmlspecialchars($tbgvln[24]) ?>">	
	<input type="text" name="imgs4" id="imgs4" placeholder="POPUP URL/POPUP<?php if($_SESSION[tn]==PRC){echo '档名';}else if($_SESSION[tn]==EN){echo 'File name';}else{echo '檔名';}?>"  value="<?php echo str_replace('&amp;','&',htmlspecialchars($tbgvln[25])) ?>">
	
	<a href="#imgt4" data-rel="popup" data-transition="pop" class="ui-btn ui-btn-f ui-btn-inline"><?php if($_SESSION[tn]==PRC){echo '改填电邮或电话号';}else if($_SESSION[tn]==EN){echo 'Tel/Email';}else{echo '改填電郵或電話號';}?></a>
<div id="imgt4" data-role="popup"><ul data-role="listview"><li class="imgt4" data-vlu="mailto:"><?php if($_SESSION[tn]==PRC){echo '电邮 mailto:';}else if($_SESSION[tn]==EN){echo '[Email] mailto:';}else{echo '電郵 mailto:';}?></li><li class="imgt4" data-vlu="tel:"><?php if($_SESSION[tn]==PRC){echo '电话号 tel:';}else if($_SESSION[tn]==EN){echo '[Tel] tel:';}else{echo '電話號 tel:';}?></li><li class="imgt4" data-vlu="sms:"><?php if($_SESSION[tn]==PRC){echo '电话号 sms:';}else if($_SESSION[tn]==EN){echo '[Tel] sms:';}else{echo '電話號 sms:';}?></li><li class="imgt4" data-vlu="geo:"><?php if($_SESSION[tn]==PRC){echo '地点 geo:';}else if($_SESSION[tn]==EN){echo '[Location] geo:';}else{echo '地點 geo:';}?></li></ul></div>
	<div class="ui-grid-b"><div class="ui-block-a">
	<input type="text" name="imgtclr4" placeholder="<?php if($_SESSION[tn]==PRC){echo '字体颜色';}else if($_SESSION[tn]==EN){echo 'Text color';}else{echo '字體顏色';}?>" value="<?php echo htmlspecialchars($tbgvln[26]) ?>">
	</div><div class="ui-block-b">
	<input type="text" name="imgclr4" placeholder="<?php if($_SESSION[tn]==PRC){echo '文字区背景颜色';}else if($_SESSION[tn]==EN){echo 'Background color of Text area';}else{echo '文字區背景顏色';}?>" value="<?php echo htmlspecialchars($tbgvln[27]) ?>">
</div><div class="ui-block-c">
	<input type="checkbox" name="wsp4" id="wsp4" value="1" <?php if($tbgvln[28])echo 'checked="checked"'; ?>><label for="wsp4"><?php if($_SESSION[tn]==PRC){echo '文字显示';}else if($_SESSION[tn]==EN){echo 'Show all texts ';}else{echo '文字顯示';}?></label>
</div></div><HR>		
	<?php if($_SESSION[tn]==PRC){echo '格相5 URL';}else if($_SESSION[tn]==EN){echo 'Grid Picture 5 URL';}else{echo '格相5 URL';}?>
	<input type="text" name="img5" placeholder="<?php if($_SESSION[tn]==PRC){echo '相片';}else if($_SESSION[tn]==EN){echo 'Picture ';}else{echo '相片';}?>URL/<?php if($_SESSION[tn]==PRC){echo '档名';}else if($_SESSION[tn]==EN){echo 'File name';}else{echo '檔名';}?>"  value="<?php echo htmlspecialchars($tbgvln[29]) ?>">	
	<input type="text" name="imgtitle5" placeholder="<?php if($_SESSION[tn]==PRC){echo '标题';}else if($_SESSION[tn]==EN){echo 'title';}else{echo '標題';}?>" value="<?php echo htmlspecialchars($tbgvln[30]) ?>">
	<input type="text" name="imgftr5" placeholder="<?php if($_SESSION[tn]==PRC){echo '备注';}else if($_SESSION[tn]==EN){echo 'footnote';}else{echo '備註';}?>"  value="<?php echo htmlspecialchars($tbgvln[31]) ?>">
	<input type="text" name="imgs5" id="imgs5" placeholder="POPUP URL/POPUP<?php if($_SESSION[tn]==PRC){echo '档名';}else if($_SESSION[tn]==EN){echo 'File name';}else{echo '檔名';}?>"  value="<?php echo str_replace('&amp;','&',htmlspecialchars($tbgvln[32])) ?>">

<a href="#imgt5" data-rel="popup" data-transition="pop" class="ui-btn ui-btn-f ui-btn-inline"><?php if($_SESSION[tn]==PRC){echo '改填电邮或电话号';}else if($_SESSION[tn]==EN){echo 'Tel/Email';}else{echo '改填電郵或電話號';}?></a>
<div id="imgt5" data-role="popup"><ul data-role="listview"><li class="imgt5" data-vlu="mailto:"><?php if($_SESSION[tn]==PRC){echo '电邮 mailto:';}else if($_SESSION[tn]==EN){echo '[Email] mailto:';}else{echo '電郵 mailto:';}?></li><li class="imgt5" data-vlu="tel:"><?php if($_SESSION[tn]==PRC){echo '电话号 tel:';}else if($_SESSION[tn]==EN){echo '[Tel] tel:';}else{echo '電話號 tel:';}?></li><li class="imgt5" data-vlu="sms:"><?php if($_SESSION[tn]==PRC){echo '电话号 sms:';}else if($_SESSION[tn]==EN){echo '[Tel] sms:';}else{echo '電話號 sms:';}?></li><li class="imgt5" data-vlu="geo:"><?php if($_SESSION[tn]==PRC){echo '地点 geo:';}else if($_SESSION[tn]==EN){echo '[Location] geo:';}else{echo '地點 geo:';}?></li></ul></div>

	<div class="ui-grid-b"><div class="ui-block-a">
	<input type="text" name="imgtclr5" placeholder="<?php if($_SESSION[tn]==PRC){echo '字体颜色';}else if($_SESSION[tn]==EN){echo 'Text color';}else{echo '字體顏色';}?>" value="<?php echo htmlspecialchars($tbgvln[33]) ?>">
	</div><div class="ui-block-b">
	<input type="text" name="imgclr5" placeholder="<?php if($_SESSION[tn]==PRC){echo '文字区背景颜色';}else if($_SESSION[tn]==EN){echo 'Background color of Text area';}else{echo '文字區背景顏色';}?>" value="<?php echo htmlspecialchars($tbgvln[34]) ?>">
</div><div class="ui-block-c">
	<input type="checkbox" name="wsp5" id="wsp5" value="1" <?php if($tbgvln[35])echo 'checked="checked"'; ?>><label for="wsp5"><?php if($_SESSION[tn]==PRC){echo '文字显示';}else if($_SESSION[tn]==EN){echo 'Show all texts ';}else{echo '文字顯示';}?></label>
</div></div>	
<?php ;}//if($gridvlu[0]!='solo'){?>
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
	echo '<script>';
	if($jswebn[1])echo 'localStorage.clear();';
	echo 'var vpopupics = localStorage.getItem("'.$pj.$ap.'vpopupics'.$pn.'");
		if(vpopupics){
			vpopupics = JSON.parse(vpopupics);
			vpopupics.splice(0,1,0);
			localStorage.setItem("'.$pj.$ap.'vpopupics'.$pn.'",JSON.stringify(vpopupics));}'.$jswebn[1].';</script>';
;}
	}?>
	<hr>	


<HR>	
<HR>
	<a href="#infnsp" data-rel="popup" data-transition="pop" class="ui-btn ui-btn-b ui-btn-inline ui-corner-all ui-mini">? <?php if($_SESSION[tn]==PRC){echo '例';}else if($_SESSION[tn]==EN){echo 'Examples';}else{echo '例';}?></a>
	<div data-role="popup" id="infnsp" style="min-width:300px;max-width:85%" data-position-to="window" data-theme="f"><a href="#" class="ui-btn ui-corner-all ui-icon-delete ui-btn-icon-notext ui-btn-right" data-rel="back"></a>
	<p><?php if($_SESSION[tn]==PRC){echo '您须缩细浏览器尺寸至移动设备大小进行浏览。';}else if($_SESSION[tn]==EN){echo 'You need to resize your browser as mobile device\'s screen size to view this example.';}else{echo '您須縮細瀏覽器尺寸至移動設備大小進行瀏覽。';}?></p>	
	<p><?php if($_SESSION[tn]==PRC){echo '格阔是设备阔的平均值,您能加相片及/或文字内容至格内。您能加相片或文字至popup内。';}else if($_SESSION[tn]==EN){echo 'The grid width will be the average of APP user\'s device screen width per number of grids. You can add picture and/or text as content of popup.';}else{echo '格闊是設備闊的平均值,您能加相片及/或文字內容至格內。您能加相片或文字至popup內。';}?></p>	
	</div>
	

	<a href="#insfns" data-rel="popup" data-transition="pop" class="ui-btn ui-btn-b ui-btn-inline ui-corner-all ui-mini">? <?php if($_SESSION[tn]==PRC){echo '五格行';}else if($_SESSION[tn]==EN){echo '5 grids per row';}else{echo '五格行';}?></a>
	<div data-role="popup" id="insfns" style="min-width:300px;max-width:85%" data-position-to="window" data-theme="f"><a href="#" class="ui-btn ui-corner-all ui-icon-delete ui-btn-icon-notext ui-btn-right" data-rel="back"></a>
	<p><?php if($_SESSION[tn]==PRC){echo '您能使用不同相片在格及popup内';}else if($_SESSION[tn]==EN){echo 'You can use different pictures for grids and popups.';}else{echo '您能使用不同相片在格及popup內.';}?></p>	
	</div>

	<div class="ui-grid-d">
	
		<div class="ui-block-a"><a href="#pupups"  class="ui-btn ui-btn-f" style="padding:1px;" data-rel="popup" data-transition="pop"><img style="width:100%" src="../images/jstrusts.jpg"></a></div>
		<div class="ui-block-b"><a href="#pupups"  class="ui-btn ui-btn-g" style="padding:1px;" data-rel="popup" data-transition="pop"><img style="width:100%" src="../images/jstrusts.jpg"></a></div>
		<div class="ui-block-c"><a href="#pupups"  class="ui-btn ui-btn-j" style="padding:1px;" data-rel="popup" data-transition="pop"><img style="width:100%" src="../images/jstrusts.jpg"></a></div>
		<div class="ui-block-d"><a href="#pupups"  class="ui-btn ui-btn-k" style="padding:1px;" data-rel="popup" data-transition="pop"><img style="width:100%" src="../images/jstrusts.jpg"></a></div>
		<div class="ui-block-e"><a href="#pupups"  class="ui-btn ui-btn-b" style="padding:1px;" data-rel="popup" data-transition="pop"><img style="width:100%" src="../images/jstrusts.jpg"></a></div>
	</div>
	<div id="pupups" data-role="popup" data-theme="z" style="padding:5px;" data-corners="false" class="ifrwidthp"><a href="#" data-rel="back" class="popn ui-btn ui-btn-z ui-btn-icon-notext ui-icon-delete"></a><img src="../images/jstrust.jpg"></a></div> 
	
	
	
	
	<?php if($_SESSION[tn]==PRC){echo '一格行';}else if($_SESSION[tn]==EN){echo '1 grid per row';}else{echo '一格行';}?>:
	<div class="ui-grid-solo">
	
	<a href="#pupupsolo" class="ui-btn ui-btn-x" style="text-decoration:none;padding:1px;color:red;width:80%;" data-rel="popup" data-transition="pop"><?php if($_SESSION[tn]==PRC){echo '标题';}else if($_SESSION[tn]==EN){echo 'title';}else{echo '標題';}?>[80% <?php if($_SESSION[tn]==PRC){echo '闊度';}else if($_SESSION[tn]==EN){echo 'Width';}else{echo '闊度';}?>]<br><img style="width:100%" src="../images/lansw.jpg"><br><?php if($_SESSION[tn]==PRC){echo '备注';}else if($_SESSION[tn]==EN){echo 'footnote';}else{echo '備註';}?></a>
	<div id="pupupsolo" data-role="popup" data-theme="z" data-corners="false" style="padding:5px;" class="ifrwidthps"><a href="#" data-rel="back" class="popn ui-btn ui-btn-z ui-btn-icon-notext ui-icon-delete"></a><iframe style="width:100%" src="vw.html"  seamless frameBorder="0" ></iframe></div> 

	</div>
	
	
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

<script>
		$(".imgt1").click(function(event) {
	event.preventDefault();	
	$('#imgs1').val($(this).attr('data-vlu'));$('#imgt1').popup('close');
	});
		$(".imgt2").click(function(event) {
	event.preventDefault();	
	$('#imgs2').val($(this).attr('data-vlu'));$('#imgt2').popup('close');
	});
		$(".imgt3").click(function(event) {
	event.preventDefault();	
	$('#imgs3').val($(this).attr('data-vlu'));$('#imgt3').popup('close');
	});
		$(".imgt4").click(function(event) {
	event.preventDefault();	
	$('#imgs4').val($(this).attr('data-vlu'));$('#imgt4').popup('close');
	});
		$(".imgt5").click(function(event) {
	event.preventDefault();	
	$('#imgs5').val($(this).attr('data-vlu'));$('#imgt5').popup('close');
	});
	var windowWidth = $(window).width();var windowHeight =  $(window).height(); 
	var widw = windowWidth*0.95;var heigw = windowHeight*0.95;$(".ifrwidthp").css('max-width',widw).css('max-height',heigw);$(".ifrwidthp img").css('max-height',heigw);
	$(".ifrwidthps").width(windowWidth).height(windowHeight);$(".ifrwidthps iframe").height(windowHeight);

</script>

<?php 
$tdy=0;
$tdy=date('Y-m-d');
if($_POST['grid'] and $pj and $_SESSION[guanyin1] and $_SESSION[guanyin1]==$_POST[guanyin1]){

	if($ap and !preg_match('/^[0-9]*$/', $ap))exit;
	if($pj and !preg_match('/^[0-9]*$/', $pj))exit;	

	if($owl and $_POST[grid]=='solo'){
		$popup .= '<!--data'.htmlspecialchars($_POST[photonbr]).'@#@'.htmlspecialchars($_POST[sizeheigw]).'@#@'.htmlspecialchars($_POST[sizewidw]).'@#@'.htmlspecialchars($_POST[swiptrn]).'@#@'.htmlspecialchars($_POST[photourl]).'@#@'.htmlspecialchars($_POST[gridwdh]).'@#@'.htmlspecialchars($_POST[grid]).'@#@'.htmlspecialchars($_POST[img1]).'@#@'.htmlspecialchars($_POST[imgtitle1]).'@#@'.htmlspecialchars($_POST[imgftr1]).'@#@'.str_replace('&amp;','&',htmlspecialchars($_POST[imgs1])).'@#@'.htmlspecialchars($_POST[imgtclr1]).'@#@'.htmlspecialchars($_POST[imgclr1]).'@#@'.htmlspecialchars($_POST[wsp1]).'@#@'.htmlspecialchars($_POST[photo]).'@#@'.htmlspecialchars($_POST[photont]).'@#@'.htmlspecialchars($_POST[photclr]).'@#@'.htmlspecialchars($_POST[photbg]).'@#@'.htmlspecialchars($_POST[photo1]).'@#@'.htmlspecialchars($_POST[photont1]).'@#@'.htmlspecialchars($_POST[photclr1]).'@#@'.htmlspecialchars($_POST[photbg1]);
	
		if($_POST[photonbr] >=3){
			for($i=2;$i<$_POST[photonbr];$i++){
			$popup .= '@#@'.htmlspecialchars($_POST['photo'.$i]).'@#@'.htmlspecialchars($_POST['photont'.$i]).'@#@'.htmlspecialchars($_POST['photclr'.$i]).'@#@'.htmlspecialchars($_POST['photbg'.$i]);
			;}
		;}	
		$popup .= 'data!-->';
	;}else{	
		$popup .= '<!--data'.htmlspecialchars($_POST[grid]).'@#@'.htmlspecialchars($_POST[img1]).'@#@'.htmlspecialchars($_POST[imgtitle1]).'@#@'.htmlspecialchars($_POST[imgftr1]).'@#@'.str_replace('&amp;','&',htmlspecialchars($_POST[imgs1])).'@#@'.htmlspecialchars($_POST[imgtclr1]).'@#@'.htmlspecialchars($_POST[imgclr1]).'@#@'.htmlspecialchars($_POST[wsp1]).'@#@'.htmlspecialchars($_POST[img2]).'@#@'.htmlspecialchars($_POST[imgtitle2]).'@#@'.htmlspecialchars($_POST[imgftr2]).'@#@'.str_replace('&amp;','&',htmlspecialchars($_POST[imgs2])).'@#@'.htmlspecialchars($_POST[imgtclr2]).'@#@'.htmlspecialchars($_POST[imgclr2]).'@#@'.htmlspecialchars($_POST[wsp2]).'@#@'.htmlspecialchars($_POST[img3]).'@#@'.htmlspecialchars($_POST[imgtitle3]).'@#@'.htmlspecialchars($_POST[imgftr3]).'@#@'.str_replace('&amp;','&',htmlspecialchars($_POST[imgs3])).'@#@'.htmlspecialchars($_POST[imgtclr3]).'@#@'.htmlspecialchars($_POST[imgclr3]).'@#@'.htmlspecialchars($_POST[wsp3]).'@#@'.htmlspecialchars($_POST[img4]).'@#@'.htmlspecialchars($_POST[imgtitle4]).'@#@'.htmlspecialchars($_POST[imgftr4]).'@#@'.str_replace('&amp;','&',htmlspecialchars($_POST[imgs4])).'@#@'.htmlspecialchars($_POST[imgtclr4]).'@#@'.htmlspecialchars($_POST[imgclr4]).'@#@'.htmlspecialchars($_POST[wsp4]).'@#@'.htmlspecialchars($_POST[img5]).'@#@'.htmlspecialchars($_POST[imgtitle5]).'@#@'.htmlspecialchars($_POST[imgftr5]).'@#@'.str_replace('&amp;','&',htmlspecialchars($_POST[imgs5])).'@#@'.htmlspecialchars($_POST[imgtclr5]).'@#@'.htmlspecialchars($_POST[imgclr5]).'@#@'.htmlspecialchars($_POST[wsp5]).'data!-->';
	;}

	
$popup .= '<div class="ui-grid-'.htmlspecialchars($_POST[grid]).'"';
if($_POST[grid]=='solo'){if($_POST[gridwdh] and preg_match('/^[0-9]*$/', $_POST[gridwdh]))$popup .= ' style="width:'.$_POST[gridwdh].'%"';$popup .= '>';}else{$popup .= ' >';}
if($_POST[grid]=='solo'){
if(strpos($_POST[img1],'http://')!==false or strpos($_POST[img1],'https://')!==false){$images = '';}else{$images = 'images/';}
if(strpos($_POST[imgs1],'http://')!==false or strpos($_POST[imgs1],'https://')!==false or strpos($_POST[imgs1],'.html')!==false){$imgs = '';}else{$imgs = 'images/';}
if(strpos($_POST[imgclr1],'rgba')!==false){$uibtn = 'ui-btn-z';}else if(strlen($_POST[imgclr1])==1){$uibtn = 'ui-btn-'.$_POST[imgclr1];}else{$uibtn = '';}

if(strpos($_POST[imgs1],'mailto:')!==false){$href = str_replace('&amp;','&',htmlspecialchars($_POST[imgs1]));}
else if(strpos($_POST[imgs1],'tel:')!==false){$href = ''.htmlspecialchars($_POST[imgs1]);}
else if($owl){$href = '#'.$pj.$ap.'pop'.$pn.'" data-rel="popup" data-transition="pop';}
else{$href = '#" data-pop="'.$pj.$ap.'" data-url="'.$imgs.htmlspecialchars($_POST[imgs1]);$uibtn .= ' imgspop'; }

if($_POST[wsp1]){$wsp = 'white-space:normal;';}else{$wsp = '';}

if($_POST[grid]=='solo' and $_POST[photourl])$photourls = 'id="'.$pj.$ap.'popuppics'.$pn.'"';

if($_POST[imgclr1])$_POST[imgclr1] = 'background-color:'.htmlspecialchars($_POST[imgclr1]).';';
if($_POST[imgtclr1])$_POST[imgtclr1] = 'color:'.htmlspecialchars($_POST[imgtclr1]).';';

$popup .= '<a class="grid ui-btn '.$uibtn.'" '.$photourls.' style="'.$wsp.'text-decoration:none;padding:1px;'.$_POST[imgclr1].$_POST[imgtclr1].'" href="'.$href.'" >'.htmlspecialchars($_POST[imgtitle1]);
if($_POST[imgtitle1] and ($_POST[img1] or $_POST[imgftr1]))$popup .= '<br>';
if($_POST[img1]){$popup .= '<!--img!--><img style="width:100%" src="'.$images.htmlspecialchars($_POST[img1]).'" >';}else{$popup .= '<!--img!-->';}
if($_POST[imgftr1] and $_POST[img1])$popup .= '<br>';
$popup .= ''.htmlspecialchars($_POST[imgftr1]).'</a>';}

if($_POST[grid]=='a' or $_POST[grid]=='b' or $_POST[grid]=='c' or $_POST[grid]=='d'){
if(strpos($_POST[img1],'http://')!==false or strpos($_POST[img1],'https://')!==false){$images = '';}else{$images = 'images/';}
if(strpos($_POST[imgs1],'http://')!==false or strpos($_POST[imgs1],'https://')!==false or strpos($_POST[imgs1],'.html')!==false){$imgs = '';}else{$imgs = 'images/';}
if(strpos($_POST[imgclr1],'rgba')!==false){$uibtn = 'ui-btn-z';}else if(strlen($_POST[imgclr1])==1){$uibtn = 'ui-btn-'.$_POST[imgclr1];}else{$uibtn = '';}

if(strpos($_POST[imgs1],'mailto:')!==false){$href = str_replace('&amp;','&',htmlspecialchars($_POST[imgs1]));}
else if(strpos($_POST[imgs1],'tel:')!==false){$href = ''.htmlspecialchars($_POST[imgs1]);}
else{$href = '#" data-pop="'.$pj.$ap.'" data-url="'.$imgs.htmlspecialchars(trim($_POST[imgs1]));$uibtn .= ' imgspop'; }

if($_POST[wsp1]){$wsp = 'white-space:normal;';}else{$wsp = '';}

if($_POST[imgclr1])$_POST[imgclr1] = 'background-color:'.htmlspecialchars($_POST[imgclr1]).';';
if($_POST[imgtclr1])$_POST[imgtclr1] = 'color:'.htmlspecialchars($_POST[imgtclr1]).';';

$popup .= '<div class="ui-block-a"><a class="grid ui-btn '.$uibtn.'" style="'.$wsp.'text-decoration:none;padding:1px;'.$_POST[imgclr1].$_POST[imgtclr1].'" href="'.$href.'" >'.htmlspecialchars($_POST[imgtitle1]);
if($_POST[imgtitle1] and ($_POST[img1] or $_POST[imgftr1]))$popup .= '<br>';
if($_POST[img1]){$popup .= '<!--img!--><img style="width:100%" src="'.$images.htmlspecialchars($_POST[img1]).'" >';}else{$popup .= '<!--img!-->';}
if($_POST[imgftr1] and $_POST[img1])$popup .= '<br>';
$popup .= htmlspecialchars($_POST[imgftr1]).'</a></div>';
if(strpos($_POST[img2],'http://')!==false or strpos($_POST[img2],'https://')!==false){$images = '';}else{$images = 'images/';}
if(strpos($_POST[imgs2],'http://')!==false or strpos($_POST[imgs2],'https://')!==false or strpos($_POST[imgs2],'.html')!==false){$imgs = '';}else{$imgs = 'images/';}
if(strpos($_POST[imgclr2],'rgba')!==false){$uibtn = 'ui-btn-z';}else if(strlen($_POST[imgclr2])==1){$uibtn = 'ui-btn-'.$_POST[imgclr2];}else{$uibtn = '';}

if(strpos($_POST[imgs2],'mailto:')!==false){$href = str_replace('&amp;','&',htmlspecialchars($_POST[imgs2]));}
else if(strpos($_POST[imgs2],'tel:')!==false){$href = ''.htmlspecialchars($_POST[imgs2]);}
else{$href = '#" data-pop="'.$pj.$ap.'" data-url="'.$imgs.htmlspecialchars(trim($_POST[imgs2]));$uibtn .= ' imgspop'; }

if($_POST[wsp2]){$wsp = 'white-space:normal;';}else{$wsp = '';}

if($_POST[imgclr2])$_POST[imgclr2] = 'background-color:'.htmlspecialchars($_POST[imgclr2]).';';
if($_POST[imgtclr2])$_POST[imgtclr2] = 'color:'.htmlspecialchars($_POST[imgtclr2]).';';

$popup .= '<div class="ui-block-b"><a class="grid ui-btn '.$uibtn.'" style="'.$wsp.'text-decoration:none;padding:1px;'.$_POST[imgclr2].$_POST[imgtclr2].'" href="'.$href.'" >'.htmlspecialchars($_POST[imgtitle2]);
if($_POST[imgtitle2] and ($_POST[img2] or $_POST[imgftr2]))$popup .= '<br>';
if($_POST[img2]){$popup .= '<!--img!--><img style="width:100%" src="'.$images.htmlspecialchars($_POST[img2]).'" >';}else{$popup .= '<!--img!-->';}
if($_POST[imgftr2] and $_POST[img2])$popup .= '<br>';
$popup .= ''.htmlspecialchars($_POST[imgftr2]).'</a></div>';}

if($_POST[grid]=='b' or $_POST[grid]=='c' or $_POST[grid]=='d'){
if(strpos($_POST[img3],'http://')!==false or strpos($_POST[img3],'https://')!==false){$images = '';}else{$images = 'images/';}
if(strpos($_POST[imgs3],'http://')!==false or strpos($_POST[imgs3],'https://')!==false or strpos($_POST[imgs3],'.html')!==false){$imgs = '';}else{$imgs = 'images/';}
if(strpos($_POST[imgclr3],'rgba')!==false){$uibtn = 'ui-btn-z';}else if(strlen($_POST[imgclr3])==1){$uibtn = 'ui-btn-'.$_POST[imgclr3];}else{$uibtn = '';}

if(strpos($_POST[imgs3],'mailto:')!==false){$href = str_replace('&amp;','&',htmlspecialchars($_POST[imgs3]));}
else if(strpos($_POST[imgs3],'tel:')!==false){$href = ''.htmlspecialchars($_POST[imgs3]);}
else{$href = '#" data-pop="'.$pj.$ap.'" data-url="'.$imgs.htmlspecialchars(trim($_POST[imgs3]));$uibtn .= ' imgspop'; }

if($_POST[wsp3]){$wsp = 'white-space:normal;';}else{$wsp = '';}

if($_POST[imgclr3])$_POST[imgclr3] = 'background-color:'.htmlspecialchars($_POST[imgclr3]).';';
if($_POST[imgtclr3])$_POST[imgtclr3] = 'color:'.htmlspecialchars($_POST[imgtclr3]).';';

$popup .= '<div class="ui-block-c"><a class="grid ui-btn '.$uibtn.'" style="'.$wsp.'text-decoration:none;padding:1px;'.$_POST[imgclr3].$_POST[imgtclr3].'" href="'.$href.'" >'.htmlspecialchars($_POST[imgtitle3]);
if($_POST[imgtitle3] and ($_POST[img3] or $_POST[imgftr3]))$popup .= '<br>';
if($_POST[img3]){$popup .= '<!--img!--><img style="width:100%" src="'.$images.htmlspecialchars($_POST[img3]).'" >';}else{$popup .= '<!--img!-->';}
if($_POST[imgftr3] and $_POST[img3])$popup .= '<br>';
$popup .= ''.htmlspecialchars($_POST[imgftr3]).'</a></div>';}

if($_POST[grid]=='c' or $_POST[grid]=='d'){
if(strpos($_POST[img4],'http://')!==false or strpos($_POST[img4],'https://')!==false){$images = '';}else{$images = 'images/';}
if(strpos($_POST[imgs4],'http://')!==false or strpos($_POST[imgs4],'https://')!==false or strpos($_POST[imgs4],'.html')!==false){$imgs = '';}else{$imgs = 'images/';}
if(strpos($_POST[imgclr4],'rgba')!==false){$uibtn = 'ui-btn-z';}else if(strlen($_POST[imgclr4])==1){$uibtn = 'ui-btn-'.$_POST[imgclr4];}else{$uibtn = '';}

if(strpos($_POST[imgs4],'mailto:')!==false){$href = str_replace('&amp;','&',htmlspecialchars($_POST[imgs4]));}
else if(strpos($_POST[imgs4],'tel:')!==false){$href = ''.htmlspecialchars($_POST[imgs4]);}
else{$href = '#" data-pop="'.$pj.$ap.'" data-url="'.$imgs.htmlspecialchars(trim($_POST[imgs4]));$uibtn .= ' imgspop'; }

if($_POST[wsp4]){$wsp = 'white-space:normal;';}else{$wsp = '';}

if($_POST[imgclr4])$_POST[imgclr4] = 'background-color:'.htmlspecialchars($_POST[imgclr4]).';';
if($_POST[imgtclr4])$_POST[imgtclr4] = 'color:'.htmlspecialchars($_POST[imgtclr4]).';';

$popup .= '<div class="ui-block-d"><a class="grid ui-btn '.$uibtn.'" style="'.$wsp.'text-decoration:none;padding:1px;'.$_POST[imgclr4].$_POST[imgtclr4].'" href="'.$href.'" >'.htmlspecialchars($_POST[imgtitle4]);
if($_POST[imgtitle4] and ($_POST[img4] or $_POST[imgftr4]))$popup .= '<br>';
if($_POST[img4]){$popup .= '<!--img!--><img style="width:100%" src="'.$images.htmlspecialchars($_POST[img4]).'" >';}else{$popup .= '<!--img!-->';}
if($_POST[imgftr4] and $_POST[img4])$popup .= '<br>';
$popup .= ''.htmlspecialchars($_POST[imgftr4]).'</a></div>';}

if($_POST[grid]=='d'){
if(strpos($_POST[img5],'http://')!==false or strpos($_POST[img5],'https://')!==false){$images = '';}else{$images = 'images/';}
if(strpos($_POST[imgs5],'http://')!==false or strpos($_POST[imgs5],'https://')!==false or strpos($_POST[imgs5],'.html')!==false){$imgs = '';}else{$imgs = 'images/';}
if(strpos($_POST[imgclr5],'rgba')!==false){$uibtn = 'ui-btn-z';}else if(strlen($_POST[imgclr5])==1){$uibtn = 'ui-btn-'.$_POST[imgclr5];}else{$uibtn = '';}

if(strpos($_POST[imgs5],'mailto:')!==false){$href = str_replace('&amp;','&',htmlspecialchars($_POST[imgs5]));}
else if(strpos($_POST[imgs5],'tel:')!==false){$href = ''.htmlspecialchars($_POST[imgs5]);}
else{$href = '#" data-pop="'.$pj.$ap.'" data-url="'.$imgs.htmlspecialchars(trim($_POST[imgs5]));$uibtn .= ' imgspop'; }

if($_POST[wsp5]){$wsp = 'white-space:normal;';}else{$wsp = '';}

if($_POST[imgclr5])$_POST[imgclr5] = 'background-color:'.htmlspecialchars($_POST[imgclr5]).';';
if($_POST[imgtclr5])$_POST[imgtclr5] = 'color:'.htmlspecialchars($_POST[imgtclr5]).';';

$popup .= '<div class="ui-block-e"><a class="grid ui-btn '.$uibtn.'" style="'.$wsp.'text-decoration:none;padding:1px;'.$_POST[imgclr5].$_POST[imgtclr5].'" href="'.$href.'" >'.htmlspecialchars($_POST[imgtitle5]);
if($_POST[imgtitle5] and ($_POST[img5] or $_POST[imgftr5]))$popup .= '<br>';
if($_POST[img5]){$popup .= '<!--img!--><img style="width:100%" src="'.$images.htmlspecialchars($_POST[img5]).'" >';}else{$popup .= '<!--img!-->';}
if($_POST[imgftr5] and $_POST[img5])$popup .= '<br>';
$popup .= ''.htmlspecialchars($_POST[imgftr5]).'</a></div>';}
if($_POST[grid])$popup .= '</div>';



if($_POST[grid]=='solo' and $owl){	
	if(($_POST[photonbr] and $_POST[sizeheigw] and $_POST[sizewidw] and $_POST[photo]) or ($_POST[photonbr] and $_POST['photourl'] and $_POST['img1'])){
	$popup .= '<div id="'.$pj.$ap.'pop'.$pn.'" data-theme="z" data-role="popup" data-corners="false" style="padding:5px;" class="'.$pj.$ap.'owlwidth'.$pn.'" ><a href="#" data-rel="back"  style="z-index:3" class="popn ui-btn ui-btn-z ui-btn-icon-notext ui-icon-delete"></a><div id="'.$pj.$ap.'swiper'.$pn.'" style="position:relative;overflow:hidden;"><div class="swiper-wrapper">';
	for($i=0;$i<$_POST[photonbr];$i++){
	  if(!$i){$j ='';$js= '0';$swiperlazy = '';$datasrc = 'src';$lazypreloader = '';}else{$j =$i;$js =$i;$swiperlazy = ' swiper-lazy';$datasrc = 'data-src';$lazypreloader = '<div class="swiper-lazy-preloader swiper-lazy-preloader-white"></div>';}
	  if($_POST['photo'.$j] or $_POST['photourl']){
	  	if(strpos($_POST['photo'.$j],'http://')!==false or strpos($_POST['photo'.$j],'https://')!==false){$images = '';}else{$images = 'images/';}
		if($_POST['photourl']){$owlwidth = 'id="'.$pj.$ap.'swiperwidth'.$pn.'s'.$js.'"';}else{$owlwidth = '';}
		$popup .= '<div class="swiper-slide"><img class="'.$pj.$ap.'owlwidth'.$pn.$swiperlazy.'" '.$owlwidth.' '.$datasrc.'="'.$images.htmlspecialchars($_POST['photo'.$j]).'"/>'.$lazypreloader;
		if($_POST['photclr'.$j]){$photclr = htmlspecialchars($_POST['photclr'.$j]);}else{$photclr = 'white';}
		if($_POST['photbg'.$j]){$photbg = htmlspecialchars($_POST['photbg'.$j]);}else{$photbg = 'rgba(125, 0, 0, 0.5)';}
		if($_POST['photourl']){$swiperalbum = 'id="'.$pj.$ap.'swiperalbum'.$pn.'s'.$js.'"';}else{$swiperalbum = '';}
		if($_POST['photont'.$j] or $_POST['photourl'])$popup .= '<div class="swiper-album" '.$swiperalbum.' style="background-color:'.$photbg.';"><div style="color:'.$photclr.';">'.htmlspecialchars($_POST['photont'.$j]).'</div></div>';
		$popup .= '</div>';
	  ;}
	;}
	$popup .= '</div><div class="swiper-button-next"></div><div class="swiper-button-prev"></div></div></div>';
	
	}else if(strpos($_POST[imgs1],'.html')!==false){
	$popup .= '<div id="'.$pj.$ap.'pop'.$pn.'" data-theme="z" data-role="popup" data-corners="false" style="overflow-y:auto;" class="ifrwidthpn" ><a href="#" data-rel="back" class="popn ui-btn ui-btn-z ui-btn-icon-notext ui-icon-delete"></a><iframe src="" style="width:100%" seamless frameBorder="0" ></iframe></div>';
	}else{
	if(strpos($_POST[imgs1],'http://')!==false or strpos($_POST[imgs1],'https://')!==false){$images = '';}else{$images = 'images/';}
	$popup .= '<div id="'.$pj.$ap.'pop'.$pn.'" data-theme="z" style="padding:5px;" data-role="popup" data-corners="false" class="ifrwidthp" ><a href="#" data-rel="back" class="popn ui-btn ui-btn-z ui-btn-icon-notext ui-icon-delete"></a><img src="'.$images.htmlspecialchars($_POST[imgs1]).'"></div>';	
	;}
;}


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
					$vnts  = '<div class="swiper-slide"><div id="'.$pj.$ap.'vnts'.$pn.'" class="vntsns vtnn">';
				;}else if($bvtns == 5){
					$vntsn  = '</div></div><!--vnts!-->';
				;}else if($bvtns == 6){
					$vnts  = '';$vntsn  = '';
				;}else{
					$vnts  = '<div class="swiper-slide"><div id="'.$pj.$ap.'vnts'.$pn.'" class="vntsns vtnn">';$vntsn  = '</div></div><!--vnts!-->';
				;}
			if($tabnbgdatn[0]){$tabnbgdatns = '<!--data-tabnbg'.$tabnbgdatn[0].'data-tabnbg!-->';}else{$tabnbgdatns = '<!--data-tabnbg@@@@@@data-tabnbg!-->';}
	
			$webpopup .= $html.'<!--part'.$pn.'!--><!--syspopuppicssys!-->'.$vnts.$popup.$vntsn.$tabnbgdatns.$htmls;
			$webpopup .= '</div><!--content!--></div><!--page!-->';
			
		 	
			
			$fpagtrns='../panel/'.$roww[pjnbr].'/'.$ap.'.html';
			file_put_contents($fpagtrns,$html.'<!--part'.$pn.'!--><!--syspopuppicssys!-->'.$vnts.$popup.$vntsn.$tabnbgdatns.$htmls);

			$fpagtrns='../panel/'.$roww[pjnbr].'/web'.$ap.'.html';
			file_put_contents($fpagtrns,$webpopup);

	

	
			if(!file_exists('../panel/'.$roww[pjnbr].'/web'.$ap.'.js')){
			$fpagtrns='../panel/'.$roww[pjnbr].'/web'.$ap.'.js';
			$js = '/*$(document).on(\'pageshow\', \'#web'.$ap.'\', function(){*/';
			$js .= '/*});*/';
			file_put_contents($fpagtrns,$js);			
			;}
			
					
			
			$jsweb = file_get_contents('../panel/'.$roww[pjnbr].'/web'.$ap.'.js');	
			
		if($_POST[grid]=='solo' and $owl){			
				$jswebs=explode('/*webjs'.$pn.'*/',$jsweb);
				$jsweb = $jswebs[0].$jswebs[2];
				if($_POST[photonbr] and !preg_match('/^[0-9]*$/',$_POST[photonbr]))$_POST[photonbr] =2;
				if($_POST[sizewidw] and !preg_match('/^[0-9]*$/',$_POST[sizewidw]))$_POST[sizewidw] = 320;
				if($_POST[sizeheigw] and !preg_match('/^[0-9]*$/',$_POST[sizeheigw]))$_POST[sizeheigw] = 480;
				if(!$_POST[sizewidw])$_POST[sizewidw] = 320;if(!$_POST[sizeheigw])$_POST[sizeheigw] = 480;
				
				$guanyin=rand();
				$photourl = str_replace('.'.end(explode(".", $_POST[photourl])),'v.'.end(explode(".", $_POST[photourl])),$_POST[photourl]);
				$js = '/*webjs'.$pn.'*/';
				if($_POST[photourl])$js .= '/*ajax'.$ap.'ajax*/popupics("'.$pj.$ap.'","'.$pn.'","'.htmlspecialchars($photourl).'","'.htmlspecialchars($_POST[photourl]).'","'.htmlspecialchars($_POST[photonbr]).'");/*ajaxs*/';
				if($_POST[swiptrn]=='cube'){$trnjs = ",effect:'cube',cube: {shadow: true,slideShadows: true,shadowOffset: 20,shadowScale: 0.94}";}
				else if($_POST[swiptrn]=='coverflow'){$trnjs = ",effect:'coverflow',coverflow: {rotate: 50,stretch: 0,depth: 100,modifier: 1,slideShadows : true}";} 
				else if($_POST[swiptrn]=='fade'){$trnjs = ",effect:'fade'";}
				$js .= 'popupicsize("'.$pj.$ap.'","'.$pn.'","'.htmlspecialchars($_POST[sizewidw]).'","'.htmlspecialchars($_POST[sizeheigw]).'",windowWidth,windowHeight)'
				.';var swiper'.$guanyin.' = new Swiper("#'.$pj.$ap.'swiper'.$pn.'", {nextButton: \'.swiper-button-next\', prevButton: \'.swiper-button-prev\''.$trnjs.',preloadImages: false,lazyLoading: true});'
				.'/*webjs'.$pn.'*/'
				.'/*});*/';
				$jsweb=str_replace('/*});*/',$js,$jsweb);
				file_put_contents('../panel/'.$roww[pjnbr].'/web'.$ap.'.js',$jsweb);
			
		;}else if($_POST[grid]!='solo' and strpos($jsweb,'/*webjs'.$pn.'*/')!==false){	
			$jswebs=explode('/*webjs'.$pn.'*/',$jsweb);
			$jsweb = $jswebs[0].$jswebs[2];
			file_put_contents('../panel/'.$roww[pjnbr].'/web'.$ap.'.js',$jsweb);
		;}
			

	echo "<meta http-equiv='refresh' content='0;URL=popuppics.php?ap=".htmlspecialchars($roww[ap])."&pj=".htmlspecialchars($roww[pjnbr])."&pn=".htmlspecialchars($pn).$owl."'>";
;}

?>
	
