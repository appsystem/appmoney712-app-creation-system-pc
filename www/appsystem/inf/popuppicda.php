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
if($_GET[pres])$pres = 1;

if($tl and !$pn)$pn = $tl;

if($_GET[g])$g = $_GET[g];

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
	<link href="../bootstrap/jquery.gridmanager.css" rel="stylesheet">
	<link href="icons/style.css" rel="stylesheet">
	<link href="../bootstrap/bootstraps.css" rel="stylesheet">
	<link rel="stylesheet" href="../jscss/jquery.cleditor.css" />
	<link rel="stylesheet" href="../css/appsystem.css">	
	<style type="text/css">
	
	</style>
	<script src="../js/jquery.js"></script>
	<script src="../js/jquery.mobile-1.4.4.min.js"></script>
	<script src="../js/bootstrap.js"></script>
	<script src="../js/jquery-ui.js"></script>
	<script type="text/javascript" charset="utf-8" src="../js/jquery.cleditor.min.js"></script>
	<script src="../js/jquery.gridmanager.min.php?pj=<?php echo $roww[pjnbr]?>&ap=<?php echo $roww[ap]?>&pn=<?php echo $pn?>&typ=popuppicda"></script>

</head>
<body>
<div data-role="page" data-theme="f" class="page" style="background-color:white;color:black">
	<div style="overflow: hidden;" data-role="header" data-theme="f">
	<a href="#navigations"  id="menubttn"  data-rel="popup" data-transition="pop" class="ui-btn ui-btn ui-btn-inline ui-corner-all ui-btn-icon-left ui-icon-bars"><?php if($_SESSION[tn]==PRC){echo '目录';}else if($_SESSION[tn]==EN){echo 'Menu';}else{echo '目錄';}?></a>
    <h1><?php if($_SESSION[tn]==PRC){echo 'POPUP相片 - AppMoney712 移动应用设计系统';}else if($_SESSION[tn]==EN){echo 'POPUP PICTURE - AppMoney712 APP Creation System';}else{echo 'POPUP相片 - AppMoney712 移動應用設計系統';}?></h1>
	
	</div><!-- /header -->
	<div data-role="content">

	<?php if($ap){?>
	<a href="popuppic.php?pj=<?php echo htmlspecialchars($roww[pjnbr]) ?>&ap=<?php echo htmlspecialchars($roww[ap])?>&pn=<?php echo htmlspecialchars($pn)?>" data-ajax="false" class="ui-btn ui-btn ui-btn-inline ui-corner-all ui-btn-icon-left ui-icon-carat-l">&nbsp;</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="#view" data-rel="popup" data-transition="pop" class="ui-btn ui-btn-inline ui-corner-all ui-mini ui-btn-icon-left ui-icon-search"><?php if($_SESSION[tn]==PRC){echo '预览';}else if($_SESSION[tn]==EN){echo 'Preview';}else{echo '預覽';}?></a>
		
	<div data-role="popup" id="view"><a href="#" class="ui-btn ui-corner-all ui-icon-delete ui-btn-icon-notext ui-btn-right" data-rel="back"></a>

	<ul data-role="listview" data-corners="false" data-inset="true">
	<li><a href="view.php?pj=<?php echo htmlspecialchars($roww[pjnbr])?>&ap=<?php echo htmlspecialchars($roww[ap])?>&vw=ap" data-ajax="false" target="_blank" class="ui-btn ui-btn-inline ui-mini ui-btn-icon-left ui-icon-search"><?php if($_SESSION[tn]==PRC){echo '预览应用页内容形式';}else if($_SESSION[tn]==EN){echo 'Page content of APP style[Preview]';}else{echo '預覽應用頁內容形式';}?></a></li>
	<li><a href="view.php?pj=<?php echo htmlspecialchars($roww[pjnbr])?>&ap=<?php echo htmlspecialchars($roww[ap])?>&vw=ap&ts=1" data-ajax="false" target="_blank" class="ui-btn ui-btn-inline ui-mini ui-btn-icon-left ui-icon-search"><?php if($_SESSION[tn]==PRC){echo '预览应用页内容形式';}else if($_SESSION[tn]==EN){echo 'Page content of APP style[Preview]';}else{echo '預覽應用頁內容形式';}?><?php if($_SESSION[tn]==PRC){echo '[触控式] [使用webkit型浏览器]';}else if($_SESSION[tn]==EN){echo '[Touch screen] [using any webkit browser]';}else{echo '[觸控式] [使用webkit型瀏覽器]';}?></a></li>
	<li><a href="viewp.php?pj=<?php echo htmlspecialchars($roww[pjnbr])?>&ap=<?php echo htmlspecialchars($roww[ap])?>" data-ajax="false" target="_blank" class="ui-btn ui-btn-inline ui-mini ui-btn-icon-left ui-icon-search"><?php if($_SESSION[tn]==PRC){echo '预览popup形式';}else if($_SESSION[tn]==EN){echo 'content of popup style[Preview]';}else{echo '預覽popup形式';}?></a></li>
	<li><a href="viewp.php?pj=<?php echo htmlspecialchars($roww[pjnbr])?>&ap=<?php echo htmlspecialchars($roww[ap])?>&ts=1" data-ajax="false" target="_blank" class="ui-btn ui-btn-inline ui-mini ui-btn-icon-left ui-icon-search"><?php if($_SESSION[tn]==PRC){echo '预览popup形式';}else if($_SESSION[tn]==EN){echo 'content of popup style[Preview]';}else{echo '預覽popup形式';}?><?php if($_SESSION[tn]==PRC){echo '[触控式] [使用webkit型浏览器]';}else if($_SESSION[tn]==EN){echo '[Touch screen] [using any webkit browser]';}else{echo '[觸控式] [使用webkit型瀏覽器]';}?></a></li>
	<!--<li><a href="view.php?pj=<?php echo htmlspecialchars($roww[pjnbr])?>&ap=<?php echo htmlspecialchars($roww[ap])?>&vw=s" data-ajax="false" target="_blank" class="ui-btn ui-btn-inline ui-mini ui-btn-icon-left ui-icon-search"><?php if($_SESSION[tn]==PRC){echo '预览單頁形式';}else if($_SESSION[tn]==EN){echo 'single page style[Preview]';}else{echo '預覽單頁形式';}?></a></li>!-->
	</ul>
	</div>
	
		
	<a href="menudesign.php?pj=<?php echo htmlspecialchars($roww[pjnbr])?>&ap=<?php echo $ap?>&pn=<?php echo $pn?>&php=popuppicda&plt=1" data-ajax="false" class="ui-btn ui-btn ui-btn-inline ui-corner-all ui-mini ui-btn-icon-left ui-icon-bars"><?php if($_SESSION[tn]==PRC){echo '专案应用页列表';}else if($_SESSION[tn]==EN){echo 'Project Page List';}else{echo '專案應用頁列表';}?></a>
	<?php ;}?>
	<a href="#tpss" data-rel="popup" data-transition="pop" class="ui-btn ui-btn-b ui-btn-inline ui-corner-all ui-mini">? <?php if($_SESSION[tn]==PRC){echo '解释';}else if($_SESSION[tn]==EN){echo 'Explanation';}else{echo '解釋';}?></a>
	<div data-role="popup" id="tpss" data-position-to="window" data-theme="f" style="padding:5px;" class="ifrwidthps"> <a href="#" class="popn ui-btn ui-btn-z ui-corner-all ui-icon-delete ui-btn-icon-notext" data-rel="back"></a>
<!--<p><b style="color:pink"><?php if($_SESSION[tn]==PRC){echo '浏览器';}else if($_SESSION[tn]==EN){echo 'Browser';}else{echo '瀏覽器';}?></b>
	<?php if($_SESSION[tn]==PRC){echo '使用此功能请用Chrome 或 Safari。';}else if($_SESSION[tn]==EN){echo 'Please use modern Chrome or Safari for this function.';}else{echo '使用此功能請用Chrome 或 Safari。';}?></p>
	<hr>!-->
	<p><b style="color:PINK"><?php if($_SESSION[tn]==PRC){echo '使用';}else if($_SESSION[tn]==EN){echo 'Use';}else{echo '使用';}?></b>
	<?php if($_SESSION[tn]==PRC){echo '巳设定的格必须填写才能点撀储存。';}else if($_SESSION[tn]==EN){echo 'You need to fill in content to all grids created before clicking SAVE button.';}else{echo '巳設定的格必須填寫才能點撀儲存。';}?></p>

	<p><?php if(!$roww[pjnbr])$roww[pjnbr]='?';
	if($_SESSION[tn]==PRC){echo '您需点撀\'格数\'进行选择。您需预备相片并存於应用的panel/'.$roww[pjnbr].'/images档夹及特定互联网伺服器。';}else if($_SESSION[tn]==EN){echo 'You need to click and select the grid type and prepare pictures and store them in panel/'.$roww[pjnbr].'/images folder or specific Internet server.';}else{echo '您需點撀\'格數\'進行選擇。您需預備相片並存於應用的panel/'.$roww[pjnbr].'/images檔夾及特定互聯網伺服器。';}?></p>
	<p><?php if($_SESSION[tn]==PRC){echo '您能加格行,格内含细相片,用户点撀显示在POPUP的URL相片或网页。';}else if($_SESSION[tn]==EN){echo 'You can add grids in a row and specify number of grids in a row. The grid is to contain small picture which APP user can click on it to show a popup with bigger picture or web page. You can use same URL for the grid picture and the popup picture.';}else{echo '您能加格行,格內含細相片,用戶點撀顯示在POPUP的URL相片或網頁。';}?></p>
	<p><?php if($_SESSION[tn]==PRC){echo '您亦能令用户开启浏览器浏览特定网页,e.g. pdf文件或地图。格式是[openbrowser]网页url,e.g. [openbrowser]http://???.?????.com/viewer?url=??????????word.pdf。此功能不能用电脑浏览器试用。';}else if($_SESSION[tn]==EN){echo 'You can open APP user device\'s specific browser to show specific Internet web page. e.g. pdf document or map. The format is [openbrowser]url of web page. e.g. [openbrowser]http://???.?????.com/viewer?url=??????????word.pdf. You cannot preview it on your computer browser.';}else{echo '您亦能令用戶開啟瀏覽器瀏覽特定網頁,e.g. pdf文件或地圖。格式是[openbrowser]網頁url,e.g. [openbrowser]http://???.?????.com/viewer?url=??????????word.pdf。此功能不能用電腦瀏覽器試用。';}?></p>


	<p><?php if($_SESSION[tn]==PRC){echo '您亦能令用户开启合适应用浏览特定互联网或内联网文件,e.g. 用Acrobat Reader APP开启pdf文件。格式是[openapp]网页url,e.g. [openapp]http://???.?????.com/word.pdf。此功能不能用电脑浏览器试用。';}else if($_SESSION[tn]==EN){echo 'You can let APP users to open Internet/Intranet document by appropriate APP in their appropriate device. e.g. open pdf document by Acrobat Reader APP. The format is [openapp]document url. e.g. [openapp]http://???.?????.com/word.pdf.  You cannot preview it on your computer browser.';}else{echo '您亦能令用戶開啟合適應用瀏覽特定互聯網或內聯網文件,e.g. 用Acrobat Reader APP開啟pdf文件。格式是[openapp]網頁url,e.g. [openapp]http://???.?????.com/word.pdf。此功能不能用電腦瀏覽器試用。';}?></p>

	<p><?php if($_SESSION[tn]==PRC){echo '您亦能令用户开启设备巳安装的WHATSAPP APP,格式是whatsapp://??????????,并显示特定内容,对於IOS APP,您亦能使用相关社交分享的URL scheme, 能令用户的相关应用开启并使用特定功能,到本司网站有指引。此功能不能用电脑浏览器试用。';}else if($_SESSION[tn]==EN){echo 'You can open APP user device\'s WhatsAPP APP to use its specific function. e.g.whatsapp://??????????. Please refer to our website. For IOS APP, you can use the URL scheme of many social sharing media to open APP user device\'s related social sharing APPs and use their functions. Please refer to our website.  You cannot try it on your computer browser.';}else{echo '您亦能令用戶開啟設備巳安裝的WHATSAPP APP,格式是whatsapp://??????????,並顯示特定內容,對於IOS APP,您亦能使用相關社交分享的URL scheme, 能令用戶的相關應用開啟並使用特定功能,到本司網站有指引。此功能不能用電腦瀏覽器試用。';}?></p>
	
	<p><?php if($_SESSION[tn]==PRC){echo '若初次使用,您应另开专案试用才正式用在设计上。';}else if($_SESSION[tn]==EN){echo 'If you use this editor at first time, you need to open a new project and try to use it rather than using it on your design work.';}else{echo '若初次使用,您應另開專案試用才正式用在設計上。';}?></p>
	<p><?php if($_SESSION[tn]==PRC){echo '若使用此编辑器进行设计,此段内容是不能再用上页的表格型式进行设计。';}else if($_SESSION[tn]==EN){echo 'If you use this editor,you cannot use the form method for editing this part.';}else{echo '若使用此編輯器進行設計,此段內容是不能再用上頁的表格型式進行設計。';}?></p>
	<p><?php if($_SESSION[tn]==PRC){echo '您应将您设计的文字内容另用软件储存,再复制到格内。';}else if($_SESSION[tn]==EN){echo 'It could be better to save your designed text content as any computer data by word processing software. You can copy content from the data and paste them to the grid when editing.';}else{echo '您應將您設計的文字內容另用軟件儲存,再複制到格內。';}?></p>
	<hr>
	<p><b style="color:PINK"><?php if($_SESSION[tn]==PRC){echo '创格';}else if($_SESSION[tn]==EN){echo 'Grids';}else{echo '創格';}?><?php if($_SESSION[tn]==PRC){echo '[插一行]';}else if($_SESSION[tn]==EN){echo '[Insert a row]';}else{echo '[插一行]';}?></b>
	<?php if($_SESSION[tn]==PRC){echo '在上一项巳选用一行格数或在此页点选含+号的格数创建。';}else if($_SESSION[tn]==EN){echo 'You can select a grid number for a row or click the + symbol button to create number of grid per row.';}else{echo '在上一項巳選用一行格數或在此頁點選含+號的格數創建。';}?>
	e.g. <i class="fa-plus-circle" style="color:blue"></i> -12 <?php if($_SESSION[tn]==PRC){echo '是指一行含十二平均格,此选项是一格佔一行。';}else if($_SESSION[tn]==EN){echo 'One row contains 12 grids in average width. It is about using  one grid [with 12 grid width] for a row.';}else{echo '是指一行含十二平均格,此選項是一格佔一行。';}?></p>
	<hr>
	<p><b style="color:PINK"><?php if($_SESSION[tn]==PRC){echo '相片';}else if($_SESSION[tn]==EN){echo 'Picture';}else{echo '相片';}?> <a href="#" class="ui-btn ui-btn-w ui-btn-inline ui-mini"><span class="pigss-pictures"></span></a></b>
	<?php if($_SESSION[tn]==PRC){echo '点撀格内此按钮,填写popup内表格。';}else if($_SESSION[tn]==EN){echo 'You can click this button in the grid and fill in the information in the popup.';}else{echo '點撀格內此按鈕,填寫popup內表格。';}?>
	<?php if($_SESSION[tn]==PRC){echo '点撀相片区能显示POPUP进行修改。';}else if($_SESSION[tn]==EN){echo 'The content can be amended by clicking the picture area';}else{echo '點撀相片區能顯示POPUP進行修改。';}?>
	<?php if($_SESSION[tn]==PRC){echo '进行储存才能将相片区移除。';}else if($_SESSION[tn]==EN){echo 'which can only be removed after saving.';}else{echo '進行儲存才能將相片區移除。';}?></p>
	
	
	
	<hr>
	<p><b style="color:PINK"><?php if($_SESSION[tn]==PRC){echo '文字';}else if($_SESSION[tn]==EN){echo 'Text content';}else{echo '文字';}?> <a href="#" class="ui-btn ui-btn-w ui-btn-inline ui-mini"><span class="pigss-article"></span></a></b>
	<?php if($_SESSION[tn]==PRC){echo '点撀格内此按钮,使用html编辑器编写内容文字。';}else if($_SESSION[tn]==EN){echo 'You can click this button in the grid and use the web html editor to edit content.';}else{echo '點撀格內此按鈕,使用html編輯器編寫內容文字。';}?>
	<?php if($_SESSION[tn]==PRC){echo '点撀文字内容区能显示POPUP并在编辑器进行修改。';}else if($_SESSION[tn]==EN){echo 'The text content can be amended by clicking the content area';}else{echo '點撀文字內容區能顯示POPUP並在編輯器進行修改。';}?>
	<?php if($_SESSION[tn]==PRC){echo '进行储存才能将文字内容区移除。';}else if($_SESSION[tn]==EN){echo 'which can only be removed after saving.';}else{echo '進行儲存才能將文字內容區移除。';}?></p>
	
	<hr>
	<p><b style="color:PINK"><?php if($_SESSION[tn]==PRC){echo '填写/编写';}else if($_SESSION[tn]==EN){echo 'Fill in/edit';}else{echo '填寫/編寫';}?></b>
	
	<?php if($_SESSION[tn]==PRC){echo '另有解释。';}else if($_SESSION[tn]==EN){echo 'Please refer to related explanation.';}else{echo '另有解釋。';}?></p>
	<hr>
	<p><b  style="color:PINK"><?php if($_SESSION[tn]==PRC){echo '储存及预览';}else if($_SESSION[tn]==EN){echo 'Save and preview';}else{echo '儲存及預覽';}?></b> 
	<i class="fa-save" style="color:black"></i><?php if($_SESSION[tn]==PRC){echo '储存按钮';}else if($_SESSION[tn]==EN){echo 'Save button';}else{echo '儲存按鈕';}?>
	<i class="fa-search" style="color:blue"></i><?php if($_SESSION[tn]==PRC){echo '预览按钮';}else if($_SESSION[tn]==EN){echo 'Preview button';}else{echo '預覽按鈕';}?>
	<p><?php if($_SESSION[tn]==PRC){echo '在此页的右上方含储存按钮,您只能在页顶的预览内测试您此段的设计。';}else if($_SESSION[tn]==EN){echo 'You can find a save button on the top right corner on this page. You can test this part\'s design by preview function on the top of this page.';}else{echo '在此頁的右上方含儲存按鈕,您只能在頁頂的預覽內測試您此段的設計。';}?>
	
	<?php if($_SESSION[tn]==PRC){echo '储存完毕是到预览型式,点撀预览按钮到编辑型式。';}else if($_SESSION[tn]==EN){echo ' After saving design content, you can click the preview button to return this page to editing pattern.';}else{echo '儲存完畢是到預覽型式,點撀預覽按鈕到編輯型式。';}?></p>

<hr>
	<p><b style="color:PINK"><?php if($_SESSION[tn]==PRC){echo '重设';}else if($_SESSION[tn]==EN){echo 'Reset';}else{echo '重設';}?>/<?php if($_SESSION[tn]==PRC){echo '修改';}else if($_SESSION[tn]==EN){echo 'Amend';}else{echo '修改';}?></b>
	<i class="fa-times" style="color:black"></i><?php if($_SESSION[tn]==PRC){echo '刪除按钮';}else if($_SESSION[tn]==EN){echo 'Clear button';}else{echo '刪除按鈕';}?>
	<i class="fa-edit" style="color:blue"></i><?php if($_SESSION[tn]==PRC){echo '添加编辑区按钮';}else if($_SESSION[tn]==EN){echo 'Add editing region button';}else{echo '添加編輯區按鈕';}?>
	<?php if($_SESSION[tn]==PRC){echo '在此格的右方含删除按钮,点撀删除巳有内容,再点撀添加编辑区按钮将格重设。';}else if($_SESSION[tn]==EN){echo 'You can find a Clear button on the right side of grid. You can click it to clear content and click the Add editing region button to reset the grid.';}else{echo '在此格的右方含刪除按鈕,點撀刪除巳有內容,再點撀添加編輯區按鈕將格重設。';}?></p>
	
		
	
	</div>



<a href="#tps"  data-rel="popup" data-transition="pop" class="ui-btn ui-btn-b ui-btn-inline ui-corner-all ui-mini">? <?php if($_SESSION[tn]==PRC){echo '相片解释';}else if($_SESSION[tn]==EN){echo 'Editing picture Explanation';}else{echo '相片解釋';}?></a>
	<div data-role="popup" id="tps" style="min-width:300px;max-width:85%" data-position-to="window" data-theme="f"> <a href="#" class="ui-btn ui-corner-all ui-icon-delete ui-btn-icon-notext ui-btn-right" data-rel="back"></a>
	<p><b style="color:pink"><?php if($_SESSION[tn]==PRC){echo '步骤';}else if($_SESSION[tn]==EN){echo 'Steps';}else{echo '步驟';}?></b>
<?php if($_SESSION[tn]==PRC){echo '您须填写资料,并点撀作实按钮将内容复制到格内,再进行储存。';}else if($_SESSION[tn]==EN){echo 'You fill in the information on the popup form. You need to click the confirm button to copy edited content to the grid and save your design by clicking save button.';}else{echo '您須填寫資料,並點撀作實按鈕將內容複制到格內,再進行儲存。';}?></p>
	<hr>
	<p><b style="color:pink"><?php if($_SESSION[tn]==PRC){echo '标题及备注';}else if($_SESSION[tn]==EN){echo 'Title and remark';}else{echo '標題及備註';}?></b>
	<?php if($_SESSION[tn]==PRC){echo '在移动设备使用应只加简单的标题及备注。';}else if($_SESSION[tn]==EN){echo 'You can add simple word in the title and remark only due to mobile phone usage.';}else{echo '在移動設備使用應只加簡單的標題及備註。';}?></p>
	<hr>
	<p><b style="color:pink"><?php if($_SESSION[tn]==PRC){echo '相片';}else if($_SESSION[tn]==EN){echo 'Picture ';}else{echo '相片';}?>URL/<?php if($_SESSION[tn]==PRC){echo '档名及';}else if($_SESSION[tn]==EN){echo 'File name and';}else{echo '檔名及';}?>POPUP URL/POPUP<?php if($_SESSION[tn]==PRC){echo '档名';}else if($_SESSION[tn]==EN){echo 'File name';}else{echo '檔名';}?></b>
	<?php if($_SESSION[tn]==PRC){echo 'URL/档名是填有关格内的相片,用户点撀格显示popup。';}else if($_SESSION[tn]==EN){echo 'URL/file name is about the grid\'s picture. APP user clicks the grid to show popup.';}else{echo 'URL/檔名是填有關格內的相片,用戶點撀格顯示popup。';}?></p>
	<p><?php if($_SESSION[tn]==PRC){echo 'POPUP URL/POPUP/档名是填有关popup内的相片/网页内容。';}else if($_SESSION[tn]==EN){echo 'POPUP URL/POPUP file name is about the popup\'s picture or web page content.';}else{echo 'POPUP URL/POPUP/檔名是填有關popup內的相片/網頁內容。';}?></p>
	<p><?php if($_SESSION[tn]==PRC){echo '使用存於应用的相片档及应用页,e.g. picture.png 或1.html。对互联网url,e.g. http://....';}else if($_SESSION[tn]==EN){echo 'If the picture or the web page is stored in APP, the URL is filename. e.g.picture.png and 1.html. For Internet source, URL is internet URL. e.g. http://....';}else{echo '使用存於應用的相片檔及應用頁,e.g. picture.png 或1.html。對互聯網url,e.g. http://......';}?> http://player.vimeo.com/video/103609656</p>
	

<hr>
	
	<p><b style="color:pink"><?php if($_SESSION[tn]==PRC){echo '字体颜色';}else if($_SESSION[tn]==EN){echo 'Text color';}else{echo '字體顏色';}?></b>
	<p><?php if($_SESSION[tn]==PRC){echo '您能填上 hex颜色码 e.g. #123456。';}else if($_SESSION[tn]==EN){echo 'You need to use hex color code e.g. #123456.';}else{echo '您能填上 hex顏色碼 e.g. #123456。';}?></p>
	<hr>
	<p><b style="color:pink"><?php if($_SESSION[tn]==PRC){echo '文字区背景颜色';}else if($_SESSION[tn]==EN){echo 'Background color of Text area';}else{echo '文字區背景顏色';}?></b>
	<p><?php if($_SESSION[tn]==PRC){echo '您能填上rgb颜色码e.g. rgb(125,125,125), rgba颜色码e.g. rgba(125,125,125,0.5) 或 hex颜色码e.g. #123456。若整页是有背景图像,您应使用rgba。';}else if($_SESSION[tn]==EN){echo 'You can add rgb color code e.g. rgb(125,125,125), rgba color code e.g. rgba(125,125,125,0.5) or hex color code e.g. #123456. If you use background picture for the page, you may use rgba color code.';}else{echo '您能填上rgb顏色碼e.g. rgb(125,125,125), rgba顏色碼e.g. rgba(125,125,125,0.5) 或 hex顏色碼e.g. #123456。若整頁是有背景圖像,您應使用rgba。';}?></p>	
	
	</div>


<a href="#tpsn"  data-rel="popup" data-transition="pop" class="ui-btn ui-btn-b ui-btn-inline ui-corner-all ui-mini">? <?php if($_SESSION[tn]==PRC){echo '文字內容解释';}else if($_SESSION[tn]==EN){echo 'Text content explanation';}else{echo '文字內容解釋';}?></a>
	<div data-role="popup" id="tpsn" style="min-width:300px;max-width:85%" data-position-to="window" data-theme="f"> <a href="#" class="ui-btn ui-corner-all ui-icon-delete ui-btn-icon-notext ui-btn-right" data-rel="back"></a>

	
	<p><b style="color:pink"><?php if($_SESSION[tn]==PRC){echo '文字內容';}else if($_SESSION[tn]==EN){echo 'Text content';}else{echo '文字內容';}?></b>
	<?php if($_SESSION[tn]==PRC){echo '您须使用编辑器填写文字内容,并点撀作实按钮将内容复制到格内,再进行储存。';}else if($_SESSION[tn]==EN){echo 'You can use the web html editor to edit text content. You need to click the confirm button to copy edited content to the grid and save your design by clicking save button.';}else{echo '您須使用編輯器填寫文字內容,並點撀作實按鈕將內容複制到格內,再進行儲存。';}?></p>
	
	
	<hr>
	<p><b style="color:pink"><?php if($_SESSION[tn]==PRC){echo '文字区背景颜色';}else if($_SESSION[tn]==EN){echo 'Background color of Text area';}else{echo '文字區背景顏色';}?></b>
	<?php if($_SESSION[tn]==PRC){echo '您能填上rgb颜色码e.g. rgb(125,125,125), rgba颜色码e.g. rgba(125,125,125,0.5) 或 hex颜色码e.g. #123456。若整页是有背景图像,您应使用rgba。';}else if($_SESSION[tn]==EN){echo 'You can add rgb color code e.g. rgb(125,125,125), rgba color code e.g. rgba(125,125,125,0.5) or hex color code e.g. #123456. If you use background picture for the page, you may use rgba color code.';}else{echo '您能填上rgb顏色碼e.g. rgb(125,125,125), rgba顏色碼e.g. rgba(125,125,125,0.5) 或 hex顏色碼e.g. #123456。若整頁是有背景圖像,您應使用rgba。';}?></p>	
	<p><?php if($_SESSION[tn]==PRC){echo '您能填上gif档作为背景,相片纵向重覆。';}else if($_SESSION[tn]==EN){echo 'You can enter a gif format file as background picture which will be repeated vertically.';}else{echo '您能填上gif檔作為背景,相片縱向重覆。';}?></p>	
	<hr>
	<p><b style="color:pink"><?php if($_SESSION[tn]==PRC){echo '链结填写';}else if($_SESSION[tn]==EN){echo 'Insert Link on editor';}else{echo '鏈結填寫';}?></b>
	<?php if($_SESSION[tn]==PRC){echo '用户点撀链结按钮显示POPUP,链结内容均显示在popup内,e.g. 特定互联网视频丶存於互联网的特定格式的音频档,相片,特定网页或应用页。若填互联网纲页,一些网页只能在将设计产生应用时才能显示,不能用电脑浏览器预览。';}else if($_SESSION[tn]==EN){echo 'APP user clicks the link button to show popup which shows the content of link, e.g. specific Internet video, specific format of audio file stored on the Internet, photo, specific web page or APP page. If you fill in specific Internet web page, it may be showed when your design is produced to be an APP. You cannot preview it on computer browser.';}else{echo '用戶點撀鏈結按鈕顯示POPUP,鏈結內容均顯示在popup內,e.g. 特定互聯網視頻、存於互聯網的特定格式的音頻檔,相片,特定網頁或應用頁。若填互聯網綱頁,一些網頁只能在將設計產生應用時才能顯示,不能用電腦瀏覽器預覽。';}?></p>
	
	<p><?php if($_SESSION[tn]==PRC){echo '填写时必须填上网页档案,e.g. http://www.?????.com/index.html, 不能只填域名,http://www.?????.com。若是应用页,只填应用页档名,e.g. 1.html。';}else if($_SESSION[tn]==EN){echo 'You need to fill in file name of Internet web page. e.g. http://www.?????.com/index.html, You cannot only fill in url, http://www.?????.com. If you need to open an APP page, you can fill in its filename. e.g. 1.html';}else{echo '填寫時必須填上網頁檔案,e.g. http://www.?????.com/index.html, 不能只填域名,http://www.?????.com。若是應用頁,只填應用頁檔名,e.g. 1.html。';}?></p>
	
	<p><?php  if(!$roww[pjnbr])$roww[pjnbr] = '???';
	if($_SESSION[tn]==PRC){echo '若使用应用内相片,档案放置於panel/'.$roww[pjnbr].'/images档夹内,格式是images/加相片档名,e.g. images/picture.png。您亦能在相片档名加[1],有不同形式显示,e.g. images/picture[1].png 。';}else if($_SESSION[tn]==EN){echo 'If you need to use picture stored inside APP, you need to place the file to folder panel/'.$roww[pjnbr].'/images. The entry format is images/picture filename. e.g. images/picture.png. If you name the picture with [1], the picture display style is different. e.g images/picture[1].png.';}else{echo '若使用應用內相片,檔案放置於panel/'.$roww[pjnbr].'/images檔夾內,格式是images/加相片檔名,e.g. images/picture.png。您亦能在相片檔名加[1],有不同形式顯示,e.g. images/picture[1].png。';}?></p>
	
	<p><?php if($_SESSION[tn]==PRC){echo '填写时是先填上链结标题,再用滑鼠选标题文字,再点撀编辑器的链结按钮,并填上所需数据。';}else if($_SESSION[tn]==EN){echo 'Step:<br>You need to enter link title and highlight the title by mouse. Then you can click the link button on the editor and fill in the data of the form.';}else{echo '填寫時是先填上鏈結標題,再用滑鼠選標題文字,再點撀編輯器的鏈結按鈕,並填上所需數據。';}?></p>
	<hr>
	<p><b style="color:pink"><?php if($_SESSION[tn]==PRC){echo '电邮/电话按钮';}else if($_SESSION[tn]==EN){echo 'Email/phone button';}else{echo '電郵/電話按鈕';}?></b>
	<?php if($_SESSION[tn]==PRC){echo '限适用的电话设备应用。用户点撀按钮能使用设备相关功能或应用。电话号限1个,电邮用;号隔开。您须键入tel:及mailto:作前端。e.g. tel:12345678 或 mailto:example@yahoo.com;examples@yahoo.com; 。';}else if($_SESSION[tn]==EN){echo 'It is for appropriate mobile device only. APP user clicks the related button to use related function or application of the device. You can only enter one phone number or use ; as seperator for email accounts. You need to enter tel: for phone number and mailto: for email accounts. e.g. tel:12345678 or mailto:example@yahoo.com;examples@yahoo.com;';}else{echo '限適用的移動電話應用。用戶點撀按鈕能使用設備相關功能或應用。電話號限1個,電郵用;號隔開。您須鍵入tel:及mailto:作前端。e.g. tel:12345678 或 mailto:example@yahoo.com;examples@yahoo.com; 。';}?></p>
	<p><?php if($_SESSION[tn]==PRC){echo '一个按钮限键入电邮或电话。';}else if($_SESSION[tn]==EN){echo 'You can only enter phone number or mail for a button.';}else{echo '一個按鈕限鍵入電郵或電話。';}?></p>
	<p><?php if($_SESSION[tn]==PRC){echo '此项填在\'Popup url/Popup档名\'内。';}else if($_SESSION[tn]==EN){echo 'You need to enter the phone number or mail to \'Popup url/Popup File name\'.';}else{echo '此項填在\'Popup url/Popup檔名\'內。';}?></p>
		<p><?php if($_SESSION[tn]==PRC){echo '对於电邮按钮,您亦试加标题及内容,格式是mailto:email account?subject=subject content&body=body content。e.g. mailto:example@yahoo.com?subject=您的电邮标题&body=您的电邮内容。';}else if($_SESSION[tn]==EN){echo 'You need to try to add title and content value to email button. The format is mailto:email account?subject=subject content&body=body content. e.g mailto:example@yahoo.com?subject=your email title&body=your email content';}else{echo '對於電郵按鈕,您亦試加標題及內容,格式是mailto:email account?subject=subject content&body=body content。e.g. mailto:example@yahoo.com?subject=您的電郵標題&body=您的電郵內容';}?></p>
	<p><?php if($_SESSION[tn]==PRC){echo '在body内容是用%0d%0a作为换行。';}else if($_SESSION[tn]==EN){echo 'You can use %0d%0a as line break in body content.';}else{echo '在body內容是用%0d%0a作為換行。';}?></p>
		<p><?php if($_SESSION[tn]==PRC){echo '您亦到访本司网站,有进一步指引或资讯。';}else if($_SESSION[tn]==EN){echo 'You can visit our website to get more information.';}else{echo '您亦到訪本司網站,有進一步指引或資訊。';}?></p>
	</div>

<?php if(file_exists('../panel/'.$roww[pjnbr].'/temp/'.$ap.'.html') and !$pres){?>
<a href="popuppicda.php?pj=<?php echo $roww[pjnbr]?>&ap=<?php echo $roww[ap]?>&g=<?php echo $g?>&pn=<?php echo $pn?>&pres=1&typ=popuppicda" data-ajax="false" class="ui-btn ui-btn-f ui-btn-inline ui-corner-all ui-mini" style="color:pink" ><?php if($_SESSION[tn]==PRC){echo '改用上次储存';}else if($_SESSION[tn]==EN){echo 'Using previous save';}else{echo '改用上次儲存';}?></a>
<?php ;}else{?>
<a href="popuppicda.php?pj=<?php echo $roww[pjnbr]?>&ap=<?php echo $roww[ap]?>&g=<?php echo $g?>&pn=<?php echo $pn?>&typ=popuppicda"  data-ajax="false" class="ui-btn ui-btn-f ui-btn-inline ui-corner-all ui-mini" style="color:pink" ><?php if($_SESSION[tn]==PRC){echo '不改用上次储存';}else if($_SESSION[tn]==EN){echo 'Not using previous save';}else{echo '不改用上次儲存';}?></a>
<?php ;}?>
	
	
	<?php if($tl)$tln = '&tl='.$tl;?>
	
<?php   if($pn){
			if($pres){
				$ht = file_get_contents('../panel/'.$roww[pjnbr].'/temp/'.$ap.'.html');
			;}else{
				$ht = file_get_contents('../panel/'.$roww[pjnbr].'/'.$ap.'.html');			
			;}
			$htm = explode('<!--part',$ht);

			if(substr_count($ht,"<div")!=substr_count($ht,"</div>")){ 
	 		if($_SESSION[tn]==PRC){		
			 echo '<script>alert("请检查此段内容的html码.\r\n<div>或<div 的数量是 '.substr_count($ht,"<div").'.\r\n但</div> 的数量是 '.substr_count($ht,"</div>").'.")</script>';
			}else if($_SESSION[tn]==EN){
			 echo '<script>alert("Please check the html code of this content.\r\nThe number of <div> or <div is '.substr_count($ht,"<div").'.\r\nBut the number of </div> is '.substr_count($ht,"</div>").'.")</script>';
			}else{
			 echo '<script>alert("請檢查此段內容的html碼.\r\n<div>或<div 的數量是 '.substr_count($ht,"<div").'.\r\n但</div> 的數量是 '.substr_count($ht,"</div>").'.")</script>';
			}			
			;}
						
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
				$gridpic  = str_replace('<!--syspopuppicsys!-->','',$gridpic);	
				
				if($gridpic){
					$gridp  = explode('<div class="row">',$gridpic);	
					for($i=1;$i<sizeof($gridp);$i++){
						$gridpichtml .= '<div class="row">'.$gridp[$i];
					;}	
				;}	
	 
			;}
	?>	
	<hr>

	
	<span style="color:black"><?php if($_SESSION[tn]==PRC){echo '专案';}else if($_SESSION[tn]==EN){echo 'Project';}else{echo '專案';}?></span>
	<?php 	$sql=$db->query("select * from webpj where cno='$pj'");
	if($sql)$row=$sql->fetch();
	echo '['.htmlspecialchars($row[date]).'] '.htmlspecialchars($row[title]);?>
	
	&nbsp;&nbsp;&nbsp;&nbsp;
	
	<span style="color:black"><?php if($_SESSION[tn]==PRC){echo '应用页称';}else if($_SESSION[tn]==EN){echo 'Page name';}else{echo '應用頁稱';}?></span> :
	<?php echo htmlspecialchars($roww[title])?>
	<hr>

	<?php if($_SESSION[tn]==PRC){echo 'POPUP相片创建';}else if($_SESSION[tn]==EN){echo 'POPUP PICTURE CREATING';}else{echo 'POPUP相片創建';}?>  
	[<?php if($_SESSION[tn]==PRC){echo '相片形式';}else if($_SESSION[tn]==EN){echo 'picture style';}else{echo '相片形式';}?>]

	<br>

<div id="gridmgr">

	<?php if($gridpic){
	echo str_replace('"images/','"../panel/'.$roww[pjnbr].'/images/',$gridpichtml);
	;}else{
	?>
    <div class="row">
		<?php if($g==1){?>
        <div class="col-md-12"><a href="#" class="img ui-btn ui-btn-w ui-btn-inline ui-mini"><span class="pigss-pictures"></span></a><a href="#" class="udtr ui-btn ui-btn-w ui-btn-inline ui-mini"><span class="pigss-article"></span></a></div>
		<?php }else if($g==2){?>
		<div class="col-md-6"><a href="#" class="img ui-btn ui-btn-w ui-btn-inline ui-mini"><span class="pigss-pictures"></span></a><a href="#" class="udtr ui-btn ui-btn-w ui-btn-inline ui-mini"><span class="pigss-article"></span></a></div>
        <div class="col-md-6"><a href="#" class="img ui-btn ui-btn-w ui-btn-inline ui-mini"><span class="pigss-pictures"></span></a><a href="#" class="udtr ui-btn ui-btn-w ui-btn-inline ui-mini"><span class="pigss-article"></span></a></div>
		<?php }else if($g==3){?>
		<div class="col-md-4"><a href="#" class="img ui-btn ui-btn-w ui-btn-inline ui-mini"><span class="pigss-pictures"></span></a><a href="#" class="udtr ui-btn ui-btn-w ui-btn-inline ui-mini"><span class="pigss-article"></span></a></div>
        <div class="col-md-4"><a href="#" class="img ui-btn ui-btn-w ui-btn-inline ui-mini"><span class="pigss-pictures"></span></a><a href="#" class="udtr ui-btn ui-btn-w ui-btn-inline ui-mini"><span class="pigss-article"></span></a></div>
		<div class="col-md-4"><a href="#" class="img ui-btn ui-btn-w ui-btn-inline ui-mini"><span class="pigss-pictures"></span></a><a href="#" class="udtr ui-btn ui-btn-w ui-btn-inline ui-mini"><span class="pigss-article"></span></a></div>
		<?php }else if($g==4){?>
		<div class="col-md-3"><a href="#" class="img ui-btn ui-btn-w ui-btn-inline ui-mini"><span class="pigss-pictures"></span></a><a href="#" class="udtr ui-btn ui-btn-w ui-btn-inline ui-mini"><span class="pigss-article"></span></a></div>
        <div class="col-md-3"><a href="#" class="img ui-btn ui-btn-w ui-btn-inline ui-mini"><span class="pigss-pictures"></span></a><a href="#" class="udtr ui-btn ui-btn-w ui-btn-inline ui-mini"><span class="pigss-article"></span></a></div>
		<div class="col-md-3"><a href="#" class="img ui-btn ui-btn-w ui-btn-inline ui-mini"><span class="pigss-pictures"></span></a><a href="#" class="udtr ui-btn ui-btn-w ui-btn-inline ui-mini"><span class="pigss-article"></span></a></div>
		<div class="col-md-3"><a href="#" class="img ui-btn ui-btn-w ui-btn-inline ui-mini"><span class="pigss-pictures"></span></a><a href="#" class="udtr ui-btn ui-btn-w ui-btn-inline ui-mini"><span class="pigss-article"></span></a></div>
		<?php }else if($g==5){?>
		<div class="col-md-2"><a href="#" class="img ui-btn ui-btn-w ui-btn-inline ui-mini"><span class="pigss-pictures"></span></a><a href="#" class="udtr ui-btn ui-btn-w ui-btn-inline ui-mini"><span class="pigss-article"></span></a></div>
        <div class="col-md-2"><a href="#" class="img ui-btn ui-btn-w ui-btn-inline ui-mini"><span class="pigss-pictures"></span></a><a href="#" class="udtr ui-btn ui-btn-w ui-btn-inline ui-mini"><span class="pigss-article"></span></a></div>
		<div class="col-md-2"><a href="#" class="img ui-btn ui-btn-w ui-btn-inline ui-mini"><span class="pigss-pictures"></span></a><a href="#" class="udtr ui-btn ui-btn-w ui-btn-inline ui-mini"><span class="pigss-article"></span></a></div>
		<div class="col-md-2"><a href="#" class="img ui-btn ui-btn-w ui-btn-inline ui-mini"><span class="pigss-pictures"></span></a><a href="#" class="udtr ui-btn ui-btn-w ui-btn-inline ui-mini"><span class="pigss-article"></span></a></div>
		<div class="col-md-2"><a href="#" class="img ui-btn ui-btn-w ui-btn-inline ui-mini"><span class="pigss-pictures"></span></a><a href="#" class="udtr ui-btn ui-btn-w ui-btn-inline ui-mini"><span class="pigss-article"></span></a></div>
		<?php ;}?>
    </div>
	<?php ;}?>
</div>


<hr>
	<div class="copyright">&copy; 2015 Lee Wai Kwok(Hong Kong). JSTRUST CONSULTANCY. <?php if($_SESSION[tn]==PRC){echo '版权所有';}else if($_SESSION[tn]==EN){echo 'All Rights Reserved.';}else{echo '版權所有';}?></div>
	
	<div id="img" data-role="popup" class="ifrwidthps" style="padding:5px" >
	<br><br><a href="#" data-rel="back" class="popn ui-btn ui-btn-z ui-btn-icon-notext ui-icon-delete"></a>
	<div class="ui-grid-a"><div class="ui-block-a" style="width:78%"><input type="text" id="img1"   value=""  data-clear-btn="true"></div><div class="ui-block-b" style="width:22%;padding-top:10px;"><?php if($_SESSION[tn]==PRC){echo '相片';}else if($_SESSION[tn]==EN){echo 'Picture ';}else{echo '相片';}?>URL/<?php if($_SESSION[tn]==PRC){echo '档名';}else if($_SESSION[tn]==EN){echo 'File name';}else{echo '檔名';}?></div>
	<div class="ui-block-a" style="width:78%"><input type="text" id="imgtitle1" value=""  data-clear-btn="true"></div><div class="ui-block-b" style="width:22%;padding-top:10px;"><?php if($_SESSION[tn]==PRC){echo '标题';}else if($_SESSION[tn]==EN){echo 'title';}else{echo '標題';}?></div>
	<div class="ui-block-a" style="width:78%"><input type="text" id="imgftr1" value=""  data-clear-btn="true"></div><div class="ui-block-b" style="width:22%;padding-top:10px;"><?php if($_SESSION[tn]==PRC){echo '备注';}else if($_SESSION[tn]==EN){echo 'remark';}else{echo '備註';}?></div>
	<div class="ui-block-a" style="width:78%"><input type="text" id="imgs1" value=""  data-clear-btn="true"></div><div class="ui-block-b" style="width:22%;padding-top:10px;">Popup url/Popup <?php if($_SESSION[tn]==PRC){echo '档名';}else if($_SESSION[tn]==EN){echo 'File name';}else{echo '檔名';}?></div></div>
	<a class="ui-btn ui-btn-inline imgt1" data-vlu="mailto:"><?php if($_SESSION[tn]==PRC){echo '电邮 mailto:';}else if($_SESSION[tn]==EN){echo '[Email] mailto:';}else{echo '電郵 mailto:';}?></a><a class="ui-btn  ui-btn-inline imgtn1" data-vlu="tel:"><?php if($_SESSION[tn]==PRC){echo '电话号 tel:';}else if($_SESSION[tn]==EN){echo '[Tel] tel:';}else{echo '電話號 tel:';}?></a><BR>
	
	<?php if($_SESSION[tn]==PRC){echo '字体颜色';}else if($_SESSION[tn]==EN){echo 'Text color';}else{echo '字體顏色';}?>
	<input type="text" id="imgtclr1"  value=""  data-clear-btn="true">
	<?php if($_SESSION[tn]==PRC){echo '文字区背景颜色';}else if($_SESSION[tn]==EN){echo 'Background color of Text area';}else{echo '文字區背景顏色';}?>
	<input type="text" id="imgclr1"  value=""  data-clear-btn="true">
	
	
	<a href="#" id="imgsave" class="ui-btn ui-btn-x ui-btn-inline ui-mini"><?php if($_SESSION[tn]==PRC){echo '作实';}else if($_SESSION[tn]==EN){echo 'confirm';}else{echo '作實';}?></a>
	</div>
	
	
	<div id="udtr" data-theme="c" data-role="popup" class="ifrwidthps" style="padding:5px" >
	<br><br><a href="#" data-rel="back" class="popn ui-btn ui-btn-z ui-btn-icon-notext ui-icon-delete"></a>
	<textarea  id="ueditor" type="text" style="height:500px;" name="ueditor"></textarea>
	<?php if($_SESSION[tn]==PRC){echo '文字区背景颜色';}else if($_SESSION[tn]==EN){echo 'Background color of Text area';}else{echo '文字區背景顏色';}?>
	<input type="text" id="imgclr"  value=""  data-clear-btn="true">
	
	
	<a href="#" id="udtrsave" class="ui-btn ui-btn-w ui-btn-inline ui-mini"><?php if($_SESSION[tn]==PRC){echo '作实';}else if($_SESSION[tn]==EN){echo 'confirm';}else{echo '作實';}?></a>
	</div>
	
	
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
    $(document).ready(function(){
        $("#gridmgr").gridmanager();
		
		$(".imgt1").click(function(event) {
		event.preventDefault();	
		$('#imgs1').val($(this).attr('data-vlu'));
		});
		$(".imgtn1").click(function(event) {
		event.preventDefault();	
		$('#imgs1').val($(this).attr('data-vlu'));
		});

		$(document).on('click', '.gm-editing-region',function (event) {		event.preventDefault();		
			$(this).addClass("editing");		
		});
		
		$(document).on('click', '.img',function (event) {		event.preventDefault();				
			$("#img").popup('open');	
		});
		$( "#img" ).popup({afterclose: function( event, ui ) {$('.editing').removeClass('editing');
		$('#img1').val('');		
		$('#imgtitle1').val('');
		$('#imgftr1').val('');
		$('#imgs1').val('');
		$('#imgtclr1').val('');
		$('#imgclr1').val('');} });
		
		$(document).on('click', '.udtr',function (event) {		event.preventDefault();		
			$("#udtr").popup('open');			
		});		
		$( "#udtr" ).popup({afterclose: function( event, ui ) {$('.editing').removeClass('editing');$('#ueditor').code('');$('#imgclr').val('');} });


		
		$('#imgsave').click(function(event){
			event.preventDefault();			
			var img = $('#img1').val();
			var imgtitle = '';imgtitle = $('#imgtitle1').val();
			var imgftr = ''; imgftr = $('#imgftr1').val();
			var imgs = $('#imgs1').val();
			
			if(!img && imgs && (imgtitle || imgftr)){
			$('#img1').focus();
			
			}else{//

			
			var imgshtml='';var imghtml='';var hrefhtml='';
			if(img){
			if(img.indexOf('http://') === -1 && img.indexOf('https://') === -1){imghtml = '../panel/<?php echo $pj ?>/images/'+img;}else{imghtml = img;}
			
			if(imgs.indexOf('mailto:') != -1 || imgs.indexOf('tel:') != -1){hrefhtml = imgs;}
			else if(imgs.indexOf('player.vimeo.com')!==-1 || imgs.indexOf('youtu.be')!==-1 || imgs.indexOf('v.qq.com')!==-1	){imgshtml = imgs;}	
			else if(imgs.indexOf('http://') === -1 && imgs.indexOf('https://') === -1){imgshtml = 'images/'+imgs;}	
			else{imgshtml = imgs;}
			
			}else{img='';}
			

			var imgtclr = ''; imgtclr =$('#imgtclr1').val();
			var imgclr = ''; imgclr =$('#imgclr1').val();
			var html=''; var imgtclrhtml='';var imgclrhtml='';
			
			if(imgtclr){imgtclrhtml = 'color:'+imgtclr+';';}else{imgtclrhtml ='';}
			if(imgclr){imgclrhtml = 'background-color:'+imgclr+';';}else{imgclrhtml ='';}
			
			
			html += '<div style="width:100%;'+imgtclrhtml+imgclrhtml+'" class="imghtml" data-img="'+img+'@#@'+imgtitle+'@#@'+imgftr+'@#@'+imgs+'@#@'+imgtclr+'@#@'+imgclr+'">';
			if(imgtitle){html += '<p>'+imgtitle+'</p>';}else{html +='' ;}
			if(img){
				if(hrefhtml){var imgspop= ' class="ui-link"';}else{var imgspop= ' class="imgspop ui-link" data-pop="<?php echo $pj.$ap ?>" data-url="'+imgshtml+'"';hrefhtml= '#';}
				html += '<a '+imgspop+' href="'+hrefhtml+'"><img style="width:100%" src="'+imghtml+'"></a>';
			}else{html +='' ;}
			if(imgftr){html += '<p>'+imgftr+'</p>';}else{html +='' ;}
			html += '</div>';
			
			$('.editing').html(html);
			$("#img").popup('close');
			
			;}//
		});
		
		$(document).on('click', '.imghtml',function (event) {		event.preventDefault();		
			$("#img").popup('open');
			var imghtm = $(this).attr('data-img').split('@#@');
			if(imghtm[0])$('#img1').val(imghtm[0]);		
			if(imghtm[1])$('#imgtitle1').val(imghtm[1]);
			if(imghtm[2])$('#imgftr1').val(imghtm[2]);
			if(imghtm[3])$('#imgs1').val(imghtm[3]);
			if(imghtm[4])$('#imgtclr1').val(imghtm[4]);
			if(imghtm[5])$('#imgclr1').val(imghtm[5]);
		});
		
		$('#udtrsave').click(function(event){
			event.preventDefault();					
			
			var imgtitle = '';imgtitle = $('#ueditor').code();
			var imgclr = ''; imgclr =$('#imgclr').val();
			var html=''; var imgclrhtml='';
			
		
			if(imgclr){
				if(imgclr.indexOf('.gif')!=-1){
				imgclrhtml = 'background-image:url('+imgclr+');background-size:100%;background-repeat:repeat-y';
				}else{imgclrhtml = 'background-color:'+imgclr+';';}	
			}else{imgclrhtml ='';}		
			html += '<div style="width:100%;'+imgclrhtml+'" data-inf="'+imgclr+'" class="udtrhtml">';
			if(imgtitle){html += imgtitle;}else{html +='' ;}
			html += '</div>';
			
			$('.editing').html(html);
			$("#udtr").popup('close');
		});
		
		$(document).on('click', '.udtrhtml',function (event) {		event.preventDefault();		
			$("#udtr").popup('open');
			var imghtm  = '';imghtm = $(this).attr('data-inf');	
			var htm = '';htm = $(this).html();
			if(htm)$('#ueditor').code(htm);
			if(imghtm)$('#imgclr').val(imghtm);
		});
		
		
		
	});
</script> 
<script type="text/javascript">
$(document).ready(function(){
    $('#ueditor').cleditor({height: 550,controls: // controls to add to the toolbar
                    "bold italic underline strikethrough subscript superscript | font size " +
                    "style | color highlight removeformat | bullets numbering | outdent " +
                    "indent | alignleft center alignright justify | undo redo | " });
    $( "#ueditor" ).height(500);
});
   

//if (navigator.userAgent.search("Firefox") >= 0 || navigator.userAgent.search("MSIE") >= 0) {
    //alert("Please use modern Chrome  or Safari.");
//}		

	
</script>
<script src="../js/appsystem.js"></script>
<?php 
$tdy=0;
$tdy=date('Y-m-d');
if($_POST['popuppicda'] and $pj){

	if($ap and !preg_match('/^[0-9]*$/', $ap))exit;
	if($pj and !preg_match('/^[0-9]*$/', $pj))exit;
	



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
			

			if($_POST['popuppicda']){
				
				$_POST['popuppicda'] = str_replace("btn btn-info","",$_POST['popuppicda']);
				$_POST['popuppicda'] = str_replace("ui-link","btn btn-info ui-link",$_POST['popuppicda']);
				$_POST['popuppicda'] = str_replace('btn btn-info ui-link" href="tel','ui-link" href="tel',$_POST['popuppicda']);
				$_POST['popuppicda'] = str_replace('btn btn-info ui-link" href="email','ui-link" href="email',$_POST['popuppicda']);
				//$_POST['popuppicda'] = str_replace("btn ","",$_POST['popuppicda']);
				$_POST['popuppicda'] = str_replace('../panel/'.$roww[pjnbr].'/images/','images/',$_POST['popuppicda']);
				
				$_POST['popuppicda'] = str_replace("class='ui-btn ui-btn-inline imgspop'","",$_POST['popuppicda']);
				$_POST['popuppicda'] = str_replace('class="ui-btn ui-btn-inline imgspop"',"",$_POST['popuppicda']);
				$_POST['popuppicda'] = str_replace('<a ',"<a class='ui-btn ui-btn-inline imgspop'",$_POST['popuppicda']);
				$_POST['popuppicda'] = str_replace('href="',' data-url="',$_POST['popuppicda']);
				$_POST['popuppicda'] = str_replace('data-url="http://[app]',' data-url="',$_POST['popuppicda']);
				$_POST['popuppicda'] = str_replace('data-url="http://images',' data-url="images',$_POST['popuppicda']);
				$_POST['popuppicda'] = str_replace('target="_blank"','',$_POST['popuppicda']);		
				$_POST['popuppicda'] = str_replace("<u><font","<font",$_POST['popuppicda']);
				$_POST['popuppicda'] = str_replace("</font></u>","</font>",$_POST['popuppicda']);
				$_POST['popuppicda'] = str_replace('class=\'ui-btn ui-btn-inline imgspop\'class="imgspop btn btn-info ui-link"','class="imgspop btn btn-info ui-link"',$_POST['popuppicda']);
				$_POST['popuppicda'] = str_replace('class=\'ui-btn ui-btn-inline imgspop\'class="imgspop  btn btn-info ui-link"','class="imgspop btn btn-info ui-link"',$_POST['popuppicda']);
				$_POST['popuppicda'] = str_replace('data-url="#"','href="#"',$_POST['popuppicda']);
				$_POST['popuppicda'] = str_replace('&amp;','&',$_POST['popuppicda']);

			}
			
				
			$webpopup .= $html.'<!--part'.$pn.'!--><!--syspopuppicsys!-->'.$vnts.$_POST['popuppicda'].$vntsn.$tabnbgdatns.$htmls;
			$webpopup .= '</div><!--content!--></div><!--page!-->';
			
		 	
			
			$fpagtrns='../panel/'.$roww[pjnbr].'/'.$ap.'.html';
			file_put_contents($fpagtrns,$html.'<!--part'.$pn.'!--><!--syspopuppicsys!-->'.$vnts.$_POST['popuppicda'].$vntsn.$tabnbgdatns.$htmls);

			$fpagtrns='../panel/'.$roww[pjnbr].'/web'.$ap.'.html';
			file_put_contents($fpagtrns,$webpopup);

			if(!file_exists('../panel/'.$roww[pjnbr].'/temp/'.$ap.'.html')){
				mkdir('../panel/'.$roww[pjnbr].'/temp');
				file_put_contents('../panel/'.$roww[pjnbr].'/temp/'.$ap.'.html',$ht);			
			;}else{
				file_put_contents('../panel/'.$roww[pjnbr].'/temp/'.$ap.'.html',$ht);			
			;}

	
			if(!file_exists('../panel/'.$roww[pjnbr].'/web'.$ap.'.js')){
			$fpagtrns='../panel/'.$roww[pjnbr].'/web'.$ap.'.js';
			$js = '/*$(document).on(\'pageshow\', \'#web'.$ap.'\', function(){*//*});*/';
			file_put_contents($fpagtrns,$js);			
			;}
			
			
			
			
			$jsweb = file_get_contents('../panel/'.$roww[pjnbr].'/web'.$ap.'.js');	
			
		if(strpos($jsweb,'/*webjs'.$pn.'*/')!==false){	
			$jswebs=explode('/*webjs'.$pn.'*/',$jsweb);
			$jsweb = $jswebs[0].$jswebs[2];
			file_put_contents('../panel/'.$roww[pjnbr].'/web'.$ap.'.js',$jsweb);
		;}
			

	echo "<meta http-equiv='refresh' content='0;URL=popuppicda.php?ap=".htmlspecialchars($roww[ap])."&pj=".htmlspecialchars($roww[pjnbr])."&pn=".htmlspecialchars($pn)."'>";
;}

?>

	