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
if($_GET[pres] and !preg_match('/^[0-9]*$/',$_GET[pres]))exit;
if($_GET[pres])$pres = $_GET[pres];

if($_GET[g])$g = $_GET[g];

define("ROOTPATH", "../");
include_once (ROOTPATH.'administration/db_conn.php');
	$apw = $ap;
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
    <title><?php if($_SESSION[tn]==PRC){echo '文字页设计 - AppMoney712 移动应用设计系统';}else if($_SESSION[tn]==EN){echo 'Web page design - AppMoney712 APP Creation System';}else{echo '文字頁設計 - AppMoney712 移動應用設計系統';}?></title>
	<link href="../css/jquery.mobile-1.4.4.min.css" rel="stylesheet">
	<link href="../css/jquerymobile-1.4.4.min.css" rel="stylesheet">
	<link href="../bootstrap/jquery.gridmanager.css" rel="stylesheet">
	<link href="icons/style.css" rel="stylesheet">
	<link href="../bootstrap/bootstraps.css" rel="stylesheet">
	<link rel="stylesheet" href="../jscss/jquery.cleditor.css" />
	<link rel="stylesheet" href="../css/appsystem.css">	
	
	<script src="../js/jquery.js"></script>
	<script src="../js/jquery.mobile-1.4.4.min.js"></script>
	<script src="../js/bootstrap.js"></script>
	<script src="../js/jquery-ui.js"></script>
	<script type="text/javascript" charset="utf-8" src="../js/jquery.cleditor.min.js"></script>
	<script src="../js/jquery.gridmanager.min.php?pj=<?php echo $roww[pjnbr]?>&ap=<?php echo $roww[ap]?>&pn=<?php echo $pn?>&typ=editorifr"></script>
	
	

</head>
<body>
<div data-role="page" data-theme="f" class="page" style="background-color:white;color:black">
	<div style="overflow: hidden;" data-role="header" data-theme="f">
	<a href="#navigations"  id="menubttn"  data-rel="popup" data-transition="pop" class="ui-btn ui-btn ui-btn-inline ui-corner-all ui-btn-icon-left ui-icon-bars"><?php if($_SESSION[tn]==PRC){echo '目录';}else if($_SESSION[tn]==EN){echo 'Menu';}else{echo '目錄';}?></a>
    <h1><?php if($_SESSION[tn]==PRC){echo '文字页设计 - AppMoney712 移动应用设计系统';}else if($_SESSION[tn]==EN){echo 'Web page design - AppMoney712 APP Creation System';}else{echo '文字頁設計 - AppMoney712 移動應用設計系統';}?></h1>
	
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
	
		
	<a href="menudesign.php?pj=<?php echo htmlspecialchars($roww[pjnbr])?>&ap=<?php echo $ap?>&pn=<?php echo $pn?>&php=editorifr&plt=1" data-ajax="false" class="ui-btn ui-btn ui-btn-inline ui-corner-all ui-mini ui-btn-icon-left ui-icon-bars"><?php if($_SESSION[tn]==PRC){echo '专案应用页列表';}else if($_SESSION[tn]==EN){echo 'Project Page List';}else{echo '專案應用頁列表';}?></a>
	<?php ;}?>
	<a href="#tpss" data-rel="popup" data-transition="pop" class="ui-btn ui-btn-b ui-btn-inline ui-corner-all ui-mini">? <?php if($_SESSION[tn]==PRC){echo '解释';}else if($_SESSION[tn]==EN){echo 'Explanation';}else{echo '解釋';}?></a>
	<div data-role="popup" id="tpss" data-position-to="window" data-theme="f"  style="padding:5px" class="ifrwidthps"> <a href="#" class="popn ui-btn ui-btn-z ui-corner-all ui-icon-delete ui-btn-icon-notext" data-rel="back"></a>

	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '使用';}else if($_SESSION[tn]==EN){echo 'Use';}else{echo '使用';}?></b></p>
	
	<p><?php if($_SESSION[tn]==PRC){echo '巳设定的格必须填写才能点撀储存。';}else if($_SESSION[tn]==EN){echo 'You need to fill in content to all grids created before clicking SAVE button.';}else{echo '巳設定的格必須填寫才能點撀儲存。';}?>
	
	<?php if($_SESSION[tn]==PRC){echo '您需点撀\'格数\'进行选择。您需预备相片并存於应用的panel/'.$roww[pjnbr].'/images档夹及特定互联网伺服器。';}else if($_SESSION[tn]==EN){echo 'You need to click and select the grid type. You need to prepare pictures and store them in panel/'.$roww[pjnbr].'/images folder or specific Internet server.';}else{echo '您需點撀\'格數\'進行選擇。您需預備相片並存於應用的panel/'.$roww[pjnbr].'/images檔夾及特定互聯網伺服器。';}?></p>
	
	
	<p><?php if($_SESSION[tn]==PRC){echo '若初次使用,您应另开专案试用才正式用在设计上。';}else if($_SESSION[tn]==EN){echo 'If you use this editor at first time, you are recommended to open a new project and try to use it rather than using it on your design work immediately.';}else{echo '若初次使用,您應另開專案試用才正式用在設計上。';}?></p>
	<p><?php if($_SESSION[tn]==PRC){echo '您应将您设计的文字内容另用软件储存,再复制到格内。';}else if($_SESSION[tn]==EN){echo 'It could be better to save your designed text content as any computer data by word processing software. You can copy them from the saved data and paste them to the grid when editing.';}else{echo '您應將您設計的文字內容另用軟件儲存,再複制到格內。';}?></p>
	<hr>
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '创格';}else if($_SESSION[tn]==EN){echo 'Grids';}else{echo '創格';}?></b>
	<?php if($_SESSION[tn]==PRC){echo '在此页点选含+号的格数创建。';}else if($_SESSION[tn]==EN){echo 'You can click the + symbol button to create number of grid per row.';}else{echo '在此頁點選含+號的格數創建。';}?>
	e.g. <i class="fa-plus-circle" style="color:blue"></i> -12 <?php if($_SESSION[tn]==PRC){echo '是指一行含十二平均格,此选项是一格佔一行。';}else if($_SESSION[tn]==EN){echo 'One row contains 12 grids in average width. It is about using one grid [with 12 grid width] for a row.';}else{echo '是指一行含十二平均格,此選項是一格佔一行。';}?></p>
	<hr>
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '相片';}else if($_SESSION[tn]==EN){echo 'Picture';}else{echo '相片';}?> <a href="#" class="ui-btn ui-btn-w ui-btn-inline ui-mini"><span class="pigss-pictures"></span></a></b>
	<?php if($_SESSION[tn]==PRC){echo '点撀格内此按钮,填写popup内表格。';}else if($_SESSION[tn]==EN){echo 'You can click this button in the grid and fill in the information in the popup.';}else{echo '點撀格內此按鈕,填寫popup內表格。';}?>
	<?php if($_SESSION[tn]==PRC){echo '点撀相片区能显示POPUP进行修改。';}else if($_SESSION[tn]==EN){echo 'The content can be amended by clicking the picture area ';}else{echo '點撀相片區能顯示POPUP進行修改。';}?>
	<?php if($_SESSION[tn]==PRC){echo '进行储存才能将相片区移除。';}else if($_SESSION[tn]==EN){echo 'which can only be removed after saving.';}else{echo '進行儲存才能將相片區移除。';}?></p>
	
	
	
	<hr>
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '文字';}else if($_SESSION[tn]==EN){echo 'Text content';}else{echo '文字';}?> <a href="#" class="ui-btn ui-btn-w ui-btn-inline ui-mini"><span class="pigss-article"></span></a></b>
	<?php if($_SESSION[tn]==PRC){echo '点撀格内此按钮,使用html编辑器编写内容文字。';}else if($_SESSION[tn]==EN){echo 'You can click this button in the grid and use the web html editor to edit content.';}else{echo '點撀格內此按鈕,使用html編輯器編寫內容文字。';}?>
	<?php if($_SESSION[tn]==PRC){echo '点撀文字内容区能显示POPUP并在编辑器进行修改。';}else if($_SESSION[tn]==EN){echo 'The text content can be amended by clicking the content area ';}else{echo '點撀文字內容區能顯示POPUP並在編輯器進行修改。';}?>
	<?php if($_SESSION[tn]==PRC){echo '进行储存才能将文字内容区移除。';}else if($_SESSION[tn]==EN){echo 'which can only be removed after saving.';}else{echo '進行儲存才能將文字內容區移除。';}?></p>
	
	<hr>
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '填写/编写';}else if($_SESSION[tn]==EN){echo 'Fill in/edit';}else{echo '填寫/編寫';}?></b>
	
	<?php if($_SESSION[tn]==PRC){echo '另有解释。';}else if($_SESSION[tn]==EN){echo 'Please refer to related explanation.';}else{echo '另有解釋。';}?></p>
	<hr>
	<p><b  style="color:black"><?php if($_SESSION[tn]==PRC){echo '储存及预览';}else if($_SESSION[tn]==EN){echo 'Save and preview';}else{echo '儲存及預覽';}?></b><br>
	<i class="fa-save" style="color:black"></i><?php if($_SESSION[tn]==PRC){echo '储存按钮';}else if($_SESSION[tn]==EN){echo 'Save button';}else{echo '儲存按鈕';}?>
	<i class="fa-search" style="color:blue"></i><?php if($_SESSION[tn]==PRC){echo '预览按钮';}else if($_SESSION[tn]==EN){echo 'Preview button';}else{echo '預覽按鈕';}?>
	<p><?php if($_SESSION[tn]==PRC){echo '在此页的右上方含储存按钮,您只能在页顶的预览对您此段的设计进行浏览。';}else if($_SESSION[tn]==EN){echo 'You can find a save button near the top right corner on this page. You can test this part\'s design by preview function on the top of this page.';}else{echo '在此頁的右上方含儲存按鈕,您只能在頁頂的預覽對您此段的設計進行瀏覽。';}?></p>
	
	<p><?php if($_SESSION[tn]==PRC){echo '储存完毕是到预览型式,点撀预览按钮到编辑型式。';}else if($_SESSION[tn]==EN){echo 'After saving design content, you can click the preview button to return this page to editing status.';}else{echo '儲存完畢是到預覽型式,點撀預覽按鈕到編輯型式。';}?></p>

<hr>
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '重设';}else if($_SESSION[tn]==EN){echo 'Reset';}else{echo '重設';}?>/<?php if($_SESSION[tn]==PRC){echo '修改';}else if($_SESSION[tn]==EN){echo 'Amend';}else{echo '修改';}?></b></p>
	<i class="fa-times" style="color:black"></i><?php if($_SESSION[tn]==PRC){echo '刪除按钮';}else if($_SESSION[tn]==EN){echo 'Clear button';}else{echo '刪除按鈕';}?>
	<i class="fa-edit" style="color:blue"></i><?php if($_SESSION[tn]==PRC){echo '添加编辑区按钮';}else if($_SESSION[tn]==EN){echo 'Add editing region button';}else{echo '添加編輯區按鈕';}?>
	<p><?php if($_SESSION[tn]==PRC){echo '在此格的右方含删除按钮,点撀删除巳有内容,再点撀添加编辑区按钮将格重设。';}else if($_SESSION[tn]==EN){echo 'You can find a Clear button on the right side of grid. You can click it to clear content and click the Add editing region button to reset the grid.';}else{echo '在此格的右方含刪除按鈕,點撀刪除巳有內容,再點撀添加編輯區按鈕將格重設。';}?></p>
	<hr>
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '刷新浏览器';}else if($_SESSION[tn]==EN){echo 'Refresh browser';}else{echo '刷新瀏覽器';}?></b>
	<?php if($_SESSION[tn]==PRC){echo '若发现内容未有更新,您须刷新浏览器。';}else if($_SESSION[tn]==EN){echo 'If you find content in grid not updated, you need to refresh your web browser.';}else{echo '若發現內容未有更新,您須刷新瀏覽器。';}?></p>	
	
		
	<hr>
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '操作错误';}else if($_SESSION[tn]==EN){echo 'Error';}else{echo '操作錯誤';}?></b>
	<?php if($_SESSION[tn]==PRC){echo '若发现编辑器显示异常,在浏览器移除此页url内的#&ui-state=dialog。';}else if($_SESSION[tn]==EN){echo 'If you find this editing page showing error, you need to remove the #&ui-state=dialog in the URL of your web browser.';}else{echo '若發現編輯器顯示異常,在瀏覽器移除此頁url內的#&ui-state=dialog。';}?></p>	
	
	</div>



<a href="#tps"  data-rel="popup" data-transition="pop" class="ui-btn ui-btn-b ui-btn-inline ui-corner-all ui-mini">? <?php if($_SESSION[tn]==PRC){echo '相片解释';}else if($_SESSION[tn]==EN){echo 'Editing picture Explanation';}else{echo '相片解釋';}?></a>
	<div data-role="popup" id="tps" style="min-width:300px;max-width:85%" data-position-to="window" data-theme="f"> <a href="#" class="ui-btn ui-corner-all ui-icon-delete ui-btn-icon-notext ui-btn-right" data-rel="back"></a>
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '步骤';}else if($_SESSION[tn]==EN){echo 'Steps';}else{echo '步驟';}?></b> 
<?php if($_SESSION[tn]==PRC){echo '您须填写资料,并点撀作实按钮将内容复制到格内,再进行储存。';}else if($_SESSION[tn]==EN){echo 'You need to fill in the information on the popup form. You need to click the confirm button to copy edited content to the grid and save your design by clicking save button.';}else{echo '您須填寫資料,並點撀作實按鈕將內容複制到格內,再進行儲存。';}?></p>
	<hr>
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '标题及备注';}else if($_SESSION[tn]==EN){echo 'Title and remark';}else{echo '標題及備註';}?></b>
	<?php if($_SESSION[tn]==PRC){echo '在移动设备使用应只加简单的标题及备注。';}else if($_SESSION[tn]==EN){echo 'You can add simple word in the title and remark only due to mobile phone usage.';}else{echo '在移動設備使用應只加簡單的標題及備註。';}?></p>
	<hr>
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '相片';}else if($_SESSION[tn]==EN){echo 'Picture ';}else{echo '相片';}?></b> 

	<?php 
	if(!$roww[pjnbr])$roww[pjnbr]='?';
	if($_SESSION[tn]==PRC){echo '使用存於应用的相片档,e.g. picture.png。对互联网url,e.g. http://....。';}else if($_SESSION[tn]==EN){echo 'If the picture is stored in APP, the URL is filename. e.g.picture.png. For Internet source, URL is internet URL. e.g. http://....';}else{echo '使用存於應用的相片檔,e.g. picture.png。對互聯網url,e.g. http://......。';}?></p>
	<p><?php if($_SESSION[tn]==PRC){echo '您需预备相片并存於应用的panel/'.$roww[pjnbr].'/images档夹及特定互联网伺服器。';}else if($_SESSION[tn]==EN){echo 'You need to prepare pictures and store them in panel/'.$roww[pjnbr].'/images folder or specific Internet server.';}else{echo '您需預備相片並存於應用的panel/'.$roww[pjnbr].'/images檔夾及特定互聯網伺服器。';}?></p>
<hr>
	
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '字体颜色';}else if($_SESSION[tn]==EN){echo 'Text color';}else{echo '字體顏色';}?></b> 
	<?php if($_SESSION[tn]==PRC){echo '您能填上 hex颜色码e.g. #123456。';}else if($_SESSION[tn]==EN){echo 'You need to use hex color code e.g. #123456.';}else{echo '您能填上 hex顏色碼e.g. #123456。';}?></p>
	<hr>
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '文字区背景颜色';}else if($_SESSION[tn]==EN){echo 'Background color of Text area';}else{echo '文字區背景顏色';}?></b>
	<?php if($_SESSION[tn]==PRC){echo '您能填上rgb颜色码e.g. rgb(125,125,125), rgba颜色码e.g. rgba(125,125,125,0.5) 或 hex颜色码e.g. #123456。若整页是有背景图像,您应使用rgba。';}else if($_SESSION[tn]==EN){echo 'You can add rgb color code e.g. rgb(125,125,125), rgba color code e.g. rgba(125,125,125,0.5) or hex color code e.g. #123456. If you use background picture for the page, you may use rgba color code.';}else{echo '您能填上rgb顏色碼e.g. rgb(125,125,125), rgba顏色碼e.g. rgba(125,125,125,0.5) 或 hex顏色碼e.g. #123456。若整頁是有背景圖像,您應使用rgba。';}?></p>	
	<hr>
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '电邮/电话按钮';}else if($_SESSION[tn]==EN){echo 'Email/phone button';}else{echo '電郵/電話按鈕';}?></b> 
	<?php if($_SESSION[tn]==PRC){echo '限适用的电话设备应用。用户点撀按钮能使用设备相关功能或应用。电话号限1个,电邮用;号隔开。您须键入tel:及mailto:作前端。e.g. tel:12345678 或 mailto:example@yahoo.com;examples@yahoo.com; 。';}else if($_SESSION[tn]==EN){echo 'It is for appropriate device only. APP user clicks the related button in your design to use related function or application of APP user\'s device. You can only enter one phone number or use ; as seperator for email accounts. You need to enter tel: for phone number and mailto: for email accounts. e.g. tel:12345678 or mailto:example@yahoo.com;examples@yahoo.com;';}else{echo '限適用的移動電話應用。用戶點撀按鈕能使用設備相關功能或應用。電話號限1個,電郵用;號隔開。您須鍵入tel:及mailto:作前端。e.g. tel:12345678 或 mailto:example@yahoo.com;examples@yahoo.com; 。';}?></p>
	<p><?php if($_SESSION[tn]==PRC){echo '一个按钮限键入电邮或电话。';}else if($_SESSION[tn]==EN){echo 'You can only enter phone number or mail for a button.';}else{echo '一個按鈕限鍵入電郵或電話。';}?>
		<?php if($_SESSION[tn]==PRC){echo '对於电邮按钮,您亦试加标题及内容,格式是mailto:email account?subject=subject content&body=body content。e.g. mailto:example@yahoo.com?subject=您的电邮标题&body=您的电邮内容。';}else if($_SESSION[tn]==EN){echo 'You need to try to add title and content value to email button. The format is mailto:email account?subject=subject content&body=body content. e.g mailto:example@yahoo.com?subject=your email title&body=your email content';}else{echo '對於電郵按鈕,您亦試加標題及內容,格式是mailto:email account?subject=subject content&body=body content。e.g. mailto:example@yahoo.com?subject=您的電郵標題&body=您的電郵內容';}?></p>
		<p><?php if($_SESSION[tn]==PRC){echo '在body内容是用%0d%0a作为换行。';}else if($_SESSION[tn]==EN){echo 'You can use %0d%0a as line break in body content.';}else{echo '在body內容是用%0d%0a作為換行。';}?></p>
	
	<p><?php if($_SESSION[tn]==PRC){echo '您亦到访本司网站,有进一步指引或资讯。';}else if($_SESSION[tn]==EN){echo 'You can visit our website to get more information.';}else{echo '您亦到訪本司網站,有進一步指引或資訊。';}?></p>
	<br>
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '电邮标题/电邮预设内容';}else if($_SESSION[tn]==EN){echo 'Email title/Email body content';}else{echo '電郵標題/電郵預設內容';}?></b>
	<?php if($_SESSION[tn]==PRC){echo '若巳用以上相关格式填电邮,以下不用填。';}else if($_SESSION[tn]==EN){echo 'If you use the above mentioned method to fill in email information, you do not need to fill in the below items.';}else{echo '若巳用以上相關格式填電郵,以下不用填。';}?></p>
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '电邮标题';}else if($_SESSION[tn]==EN){echo 'Email title';}else{echo '電郵標題';}?></b>
	<?php if($_SESSION[tn]==PRC){echo '用户点撀电邮按钮,显示在电邮的标题。';}else if($_SESSION[tn]==EN){echo 'APP user clicks the email button to show a subject title on the email.';}else{echo '用戶點撀電郵按鈕,顯示在電郵的標題。';}?></p>
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '电邮预设内容';}else if($_SESSION[tn]==EN){echo 'Email body content';}else{echo '電郵預設內容';}?></b>
	<?php if($_SESSION[tn]==PRC){echo '用户点撀电邮按钮,显示在电邮的内容区。';}else if($_SESSION[tn]==EN){echo 'APP user clicks the email button to show a body content on the email.';}else{echo '用戶點撀電郵按鈕,顯示在電郵的內容區。';}?></p>
	</div>


<a href="#tpsn"  data-rel="popup" data-transition="pop" class="ui-btn ui-btn-b ui-btn-inline ui-corner-all ui-mini">? <?php if($_SESSION[tn]==PRC){echo '文字內容解释';}else if($_SESSION[tn]==EN){echo 'Text content explanation';}else{echo '文字內容解釋';}?></a>
	<div data-role="popup" id="tpsn" style="min-width:300px;max-width:85%" data-position-to="window" data-theme="f"> <a href="#" class="ui-btn ui-corner-all ui-icon-delete ui-btn-icon-notext ui-btn-right" data-rel="back"></a>

	
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '文字內容';}else if($_SESSION[tn]==EN){echo 'Text content';}else{echo '文字內容';}?></b></p>
	<p><?php if($_SESSION[tn]==PRC){echo '您须使用编辑器填写文字内容,并点撀作实按钮将内容复制到格内,再进行储存。';}else if($_SESSION[tn]==EN){echo 'You can use the web html editor to edit text content. You need to click the confirm button to copy edited content to the grid.';}else{echo '您須使用編輯器填寫文字內容,並點撀作實按鈕將內容複制到格內,再進行儲存。';}?></p>
	
	
	<hr>
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '文字区背景颜色';}else if($_SESSION[tn]==EN){echo 'Background color of Text area';}else{echo '文字區背景顏色';}?></b></p>
	<p><?php if($_SESSION[tn]==PRC){echo '您能填上rgb颜色码e.g. rgb(125,125,125), rgba颜色码e.g. rgba(125,125,125,0.5) 或 hex颜色码e.g. #123456。若整页是有背景图像,您应使用rgba。';}else if($_SESSION[tn]==EN){echo 'You can add rgb color code e.g. rgb(125,125,125), rgba color code e.g. rgba(125,125,125,0.5) or hex color codee.g. #123456. If you use background picture for the page, you may use rgba color code.';}else{echo '您能填上rgb顏色碼e.g. rgb(125,125,125), rgba顏色碼e.g. rgba(125,125,125,0.5) 或 hex顏色碼e.g. #123456。若整頁是有背景圖像,您應使用rgba。';}?></p>	
	<p><?php if($_SESSION[tn]==PRC){echo '您能填上gif档作为背景,相片纵向重覆。';}else if($_SESSION[tn]==EN){echo 'You can enter a gif format file as background picture which will be repeated vertically.';}else{echo '您能填上gif檔作為背景,相片縱向重覆。';}?></p>	
	
	</div>
	
	<?php if(file_exists('../panel/'.$roww[pjnbr].'/'.$ap.'.html')){
	if(file_exists('../panel/'.$roww[pjnbr].'/temp/'.$pn.'/'.$ap.'.html') and !$pres){?>
	<div data-role="controlgroup" data-type="horizontal" class="ui-btn-inline" data-corners="false">
	<a href="editorifr.php?pj=<?php echo $roww[pjnbr]?>&ap=<?php echo $roww[ap]?>&pn=<?php echo $pn?>&pres=1" data-ajax="false" class="ui-btn ui-btn-f ui-btn-inline ui-corner-all ui-mini" style="color:pink" ><?php if($_SESSION[tn]==PRC){echo '改用上次储存';}else if($_SESSION[tn]==EN){echo 'Using previous save';}else{echo '改用上次儲存';}?></a>
	<?php if(file_exists('../panel/'.$roww[pjnbr].'/temp/'.$pn.'/'.$ap.'[1].html')){?>
	<a href="editorifr.php?pj=<?php echo $roww[pjnbr]?>&ap=<?php echo $roww[ap]?>&pn=<?php echo $pn?>&pres=2" data-ajax="false" class="ui-btn ui-btn-f ui-btn-inline ui-corner-all ui-mini" style="color:pink" >2</a>
	<?php ;}if(file_exists('../panel/'.$roww[pjnbr].'/temp/'.$pn.'/'.$ap.'[2].html')){?>
	<a href="editorifr.php?pj=<?php echo $roww[pjnbr]?>&ap=<?php echo $roww[ap]?>&pn=<?php echo $pn?>&pres=3" data-ajax="false" class="ui-btn ui-btn-f ui-btn-inline ui-corner-all ui-mini" style="color:pink" >3</a>
	<?php ;}if(file_exists('../panel/'.$roww[pjnbr].'/temp/'.$pn.'/'.$ap.'[3].html')){?>
	<a href="editorifr.php?pj=<?php echo $roww[pjnbr]?>&ap=<?php echo $roww[ap]?>&pn=<?php echo $pn?>&pres=4" data-ajax="false" class="ui-btn ui-btn-f ui-btn-inline ui-corner-all ui-mini" style="color:pink" >4</a>
	<?php ;}?>
	</div>
<?php ;}else{
	if(file_exists('../panel/'.$roww[pjnbr].'/temp/'.$pn.'/'.$ap.'.html') and $pres){?>
<a href="editorifr.php?pj=<?php echo $roww[pjnbr]?>&ap=<?php echo $roww[ap]?>&pn=<?php echo $pn?>"  data-ajax="false" class="ui-btn ui-btn-f ui-btn-inline ui-corner-all ui-mini" style="color:pink" ><?php if($_SESSION[tn]==PRC){echo '不改用上'.$pres.'次储存';}else if($_SESSION[tn]==EN){echo 'Not using previous save '.$pres;}else{echo '不改用上'.$pres.'次儲存';}?></a>
<?php ;} ;}
	;}//?>

	<a href="icon.php" class="ui-btn ui-btn-f ui-btn-inline" target="_blank" data-ajax="false"><?php if($_SESSION[tn]==PRC){echo '图像字体';}else if($_SESSION[tn]==EN){echo 'Icon Font';}else{echo '圖像字體';}?></a>

	<?php if($tl)$tln = '&tl='.$tl;?>
	
<?php   if($pn){
			if($pres){
				if($pres==1){$preshtml = '';}else if($pres==2){$preshtml = '[1]';}else if($pres==3){$preshtml = '[2]';}else if($pres==4){$preshtml = '[3]';}
				$ht = file_get_contents('../panel/'.$roww[pjnbr].'/temp/'.$pn.'/'.$ap.$preshtml.'.html');
				$nhtmn = explode('<!--part',$ht);
				$pntag = '<!--part'.$pn.'!-->';
				for($i=1;$i<sizeof($nhtmn);$i++){if(strpos('<!--part'.$nhtmn[$i],$pntag)!==false){$gridpic  = str_replace($pntag,'','<!--part'.$nhtmn[$i]);};}
	  		;}
			$ht = file_get_contents('../panel/'.$roww[pjnbr].'/'.$ap.'.html');
			$hts = $ht;
			$htm = explode('<!--part',$ht);
			
			$pntag = '<!--part'.$pn.'!-->';
				for($i=1;$i<sizeof($htm);$i++){
					if(strpos('<!--part'.$htm[$i],$pntag)===false and !$gridpic){$html .= '<!--part'.$htm[$i];}
					else if(strpos('<!--part'.$htm[$i],$pntag)!==false){if(!$gridpic)$gridpic  = str_replace($pntag,'','<!--part'.$htm[$i]);}
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
				$gridpic  = str_replace('<!--syseditorifrsys!-->','',$gridpic);	
				
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

	<?php if($_SESSION[tn]==PRC){echo '图像文字内容';}else if($_SESSION[tn]==EN){echo 'Photo and text content';}else{echo '圖像文字內容';}?> <?php if($_SESSION[tn]==PRC){echo '[不是整页的应用页(不在应用的panel内菜单),用於iframe及popup的内容]';}else if($_SESSION[tn]==EN){echo '[Content is not a whole APP page (not on APP\'s panel menu) and is for content of iframe and popup]';}else{echo '[不是整頁的應用頁(不在應用的panel內菜單),用於iframe及popup的內容]';}?>

	<br>
	<?php 
	if($roww[style]!='apps'){
		echo '<br><div style="color:blue;font-weight:bold;"><b style="color:red;">';
		if($_SESSION[tn]==PRC){echo '注意:';}else if($_SESSION[tn]==EN){echo 'Remark ';}else{echo '注意';}	
		echo '</b>';
		if($_SESSION[tn]==PRC){echo ':此页的应用页形式并不是\'应用页[不在panel菜单]\',您须返到上一页进行设定。';}else if($_SESSION[tn]==EN){echo ' : The Page style of this APP page is not \'APP page [not on panel]\'. You need to click the previous page button to go back to previous page to select the style.';}else{echo ' :此頁的應用頁形式並不是\'應用頁[不在panel菜單]\',您須返到上一頁進行設定。';}
		echo '</div><br>';
	;}
	?>

<div id="gridmgr">

	<?php if($gridpichtml){
	echo str_replace('"images/','"../panel/'.$roww[pjnbr].'/images/',$gridpichtml);
	;}else{
	?>
    <div class="row">
        <div class="col-md-12"><a href="#" class="img ui-btn ui-btn-w ui-btn-inline ui-mini"><span class="pigss-pictures"></span></a><a href="#" class="udtr ui-btn ui-btn-w ui-btn-inline ui-mini"><span class="pigss-article"></span></a></div>
    </div>
	<?php ;}?>
</div>



<hr>
	<div class="copyright">&copy; 2015 Lee Wai Kwok(Hong Kong). JSTRUST CONSULTANCY. <?php if($_SESSION[tn]==PRC){echo '版权所有';}else if($_SESSION[tn]==EN){echo 'All Rights Reserved.';}else{echo '版權所有';}?></div>
	
	<div id="img" data-role="popup" data-theme="b" class="ifrwidthps" style="padding:5px" >
	<br><br><a href="#" data-rel="back" class="popn ui-btn ui-btn-z ui-btn-icon-notext ui-icon-delete"></a>
	<div class="ui-grid-a"><div class="ui-block-a" style="width:78%"><input type="text" id="img1"  value=""  data-clear-btn="true"></div><div class="ui-block-b" style="width:22%;padding-top:10px;"><?php if($_SESSION[tn]==PRC){echo '相片';}else if($_SESSION[tn]==EN){echo 'Picture ';}else{echo '相片';}?>URL/<?php if($_SESSION[tn]==PRC){echo '档名';}else if($_SESSION[tn]==EN){echo 'File name';}else{echo '檔名';}?></div>
	<div class="ui-block-a" style="width:78%"><input type="text" id="imgtitle1" value=""  data-clear-btn="true"></div><div class="ui-block-b" style="width:22%;padding-top:10px;"><?php if($_SESSION[tn]==PRC){echo '标题';}else if($_SESSION[tn]==EN){echo 'title';}else{echo '標題';}?></div>
	<div class="ui-block-a" style="width:78%"><input type="text" id="imgftr1"  value=""  data-clear-btn="true"></div><div class="ui-block-b" style="width:22%;padding-top:10px;"><?php if($_SESSION[tn]==PRC){echo '备注';}else if($_SESSION[tn]==EN){echo 'remark';}else{echo '備註';}?></div>
	<div class="ui-block-a" style="width:78%"><input type="text" id="imgs1" value=""  data-clear-btn="true"></div><div class="ui-block-b" style="width:22%;padding-top:10px;"><?php if($_SESSION[tn]==PRC){echo '电邮 mailto:';}else if($_SESSION[tn]==EN){echo '[Email] mailto:';}else{echo '電郵 mailto:';}?>/<?php if($_SESSION[tn]==PRC){echo '电话号 tel:';}else if($_SESSION[tn]==EN){echo '[Tel] tel:';}else{echo '電話號 tel:';}?></div></div>
	<a class="ui-btn ui-btn-inline imgt1" data-vlu="mailto:"><?php if($_SESSION[tn]==PRC){echo '电邮 mailto:';}else if($_SESSION[tn]==EN){echo '[Email] mailto:';}else{echo '電郵 mailto:';}?></a><a class="ui-btn  ui-btn-inline imgtn1" data-vlu="tel:"><?php if($_SESSION[tn]==PRC){echo '电话号 tel:';}else if($_SESSION[tn]==EN){echo '[Tel] tel:';}else{echo '電話號 tel:';}?></a><BR>
	<div class="ui-grid-a">
	<div class="ui-block-a" style="width:78%"><input type="text" id="imgsubj1" value=""  data-clear-btn="true"></div><div class="ui-block-b" style="width:22%;padding-top:10px;"><?php if($_SESSION[tn]==PRC){echo '电邮标题';}else if($_SESSION[tn]==EN){echo 'Email title';}else{echo '電郵標題';}?></div>
	<div class="ui-block-a" style="width:78%"><input type="text" id="imgcontent1" value=""  data-clear-btn="true"></div><div class="ui-block-b" style="width:22%;padding-top:10px;"><?php if($_SESSION[tn]==PRC){echo '电邮预设内容';}else if($_SESSION[tn]==EN){echo 'Email body content';}else{echo '電郵預設內容';}?></div></div>
	
	<?php if($_SESSION[tn]==PRC){echo '字体颜色';}else if($_SESSION[tn]==EN){echo 'Text color';}else{echo '字體顏色';}?>
	<input type="text" id="imgtclr1" value=""  data-clear-btn="true">
	<?php if($_SESSION[tn]==PRC){echo '文字区背景颜色';}else if($_SESSION[tn]==EN){echo 'Background color of Text area';}else{echo '文字區背景顏色';}?>
	<input type="text" id="imgclr1" value=""  data-clear-btn="true">
	
	
	<a href="#" id="imgsave" class="ui-btn ui-btn-w ui-btn-inline ui-mini"><?php if($_SESSION[tn]==PRC){echo '作实';}else if($_SESSION[tn]==EN){echo 'confirm';}else{echo '作實';}?></a>
	</div>
	
	
	<div id="udtr" data-theme="c" data-role="popup" class="ifrwidthps" style="padding:5px" >
	<br><br><a href="#" data-rel="back" class="popn ui-btn ui-btn-z ui-btn-icon-notext ui-icon-delete"></a>
	<textarea  id="ueditor" type="text" style="height:500px;" name="ueditor"></textarea>
	<?php if($_SESSION[tn]==PRC){echo '文字区背景颜色';}else if($_SESSION[tn]==EN){echo 'Background color of Text area';}else{echo '文字區背景顏色';}?>
	<input type="text" id="imgclr" placeholder="<?php if($_SESSION[tn]==PRC){echo '文字区背景颜色';}else if($_SESSION[tn]==EN){echo 'Background color of Text area';}else{echo '文字區背景顏色';}?>" value=""  data-clear-btn="true">
	
	
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
		$('#imgclr1').val('');
		$('#imgsubj1').val('');
		$('#imgcontent1').val('');} });
		
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
			var imgsubj = ''; imgsubj =$('#imgsubj1').val();
			var imgcontent = ''; imgcontent =$('#imgcontent1').val();
			
			if(!img && imgs && (imgtitle || imgftr)){
			$('#img1').focus();
			
			}else{//

			
			var imgshtml='';var imghtml='';var hrefhtml='';var videohtml='';var mphtml='';
			if(img){
			
				if(img.indexOf('player.vimeo.com')!==-1 || img.indexOf('youtu.be')!==-1 || img.indexOf('v.qq.com')!==-1	){imghtml = img;videohtml='position:relative; padding-bottom:56.3%;overflow:hidden;';}	
				else if(img.indexOf('.mp3')!==-1 || img.indexOf('.wav')!==-1){imghtml = img;mphtml=1;}
				else if(img.indexOf('http://') === -1 && img.indexOf('https://') === -1){imghtml = '../panel/<?php echo $pj ?>/images/'+img;}
				else{imghtml = img;}
			
				if(imgs.indexOf('mailto:') != -1 && (imgsubj || imgcontent)){hrefhtml = imgs+'?subject='+imgsubj+'?body='+imgcontent;}	
				else if(imgs.indexOf('mailto:') != -1 || imgs.indexOf('tel:') != -1){hrefhtml = imgs;}		
			
			}else{img='';}
			

			var imgtclr = ''; imgtclr =$('#imgtclr1').val();
			var imgclr = ''; imgclr =$('#imgclr1').val();
			
			var html=''; var imgtclrhtml='';var imgclrhtml='';
			
			if(imgtclr){imgtclrhtml = 'color:'+imgtclr+';';}else{imgtclrhtml ='';}
			if(imgclr){imgclrhtml = 'background-color:'+imgclr+';';}else{imgclrhtml ='';}
			
			
			html += '<div style="width:100%;'+imgtclrhtml+imgclrhtml+videohtml+'" class="imghtml" data-img="'+img+'@#@'+imgtitle+'@#@'+imgftr+'@#@'+imgs+'@#@'+imgtclr+'@#@'+imgclr+'@#@'+imgsubj+'@#@'+imgcontent+'">';
			if(imgtitle){html += '<p>'+imgtitle+'</p>';}else{html +='' ;}
			if(img){
				if(hrefhtml && !videohtml && !mphtml)html += '<a class="ui-link" href="'+hrefhtml+'">';
				if(videohtml){html += '<iframe style="width:100%;height:100%;position:absolute;top:0;left:0;" src="'+imghtml+'" seamless=""></iframe>';}
				else if(mphtml){html += '<audio style="width:100%;" controls loop><source src="'+imghtml+'" type="audio/mpeg"><source src="'+imghtml+'" type="audio/wav"></audio>';}
				else{html += '<img style="width:100%" src="'+imghtml+'">';}
				if(hrefhtml && !videohtml && !mphtml)html += '</a>';
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
			if(imghtm[6])$('#imgsubj1').val(imghtm[6]);
			if(imghtm[7])$('#imgcontent1').val(imghtm[7]);
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
    $('#ueditor').cleditor({height: 550});
});
	
	
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
			
			if($roww[style]=='app'){
				$webpopup = '<div data-role="page" id="web'.$ap.'" class="page" data-theme="'.htmlspecialchars($theme).'" '.$bgstyle.'><div  class="ui-content pagebg">';
			if($roww[style]=='app')$webpopup .= '<div data-role="controlgroup" class="plft" data-type="horizontal" data-corners="false"><a href="#'.$ap.'panel" data-rel="panel" class="menubg ui-btn ui-btn-y ui-btn-inline ui-mini ui-btn-icon-left ui-icon-bars">WEBMENU</a></div><!--panel!--><div id="'.$pj.$ap.'imgspop" data-theme="z" style="padding:5px;" data-role="popup" data-corners="false"><a href="#" data-rel="back" class="popn ui-btn ui-btn-z ui-btn-icon-notext ui-icon-delete"></a><div class="ifrspinn" style="position:relative;left:50%;width:100%">Loading...<BR><img src="css/images/ajax-loader.gif"></div><div class="imgspop"><img src=""></div></div>
		<div id="'.$pj.$ap.'ifrspop" data-theme="z" data-role="popup" data-corners="false" style="overflow-y:auto;" class="ifrwidthpn" ><a href="#" data-rel="back" class="popn ui-btn ui-btn-z ui-btn-icon-notext ui-icon-delete"></a><div class="ifrspinn" style="position:relative;left:50%;width:100%">Loading...<BR><img src="css/images/ajax-loader.gif"></div><iframe src="" style="width:100%" seamless frameBorder="0" ></iframe></div>
		<div class="ui-content" id="'.$pj.$ap.'pVideo" data-corners="false" data-role="popup" data-theme="x" data-tolerance="2,2"><iframe width="498" height="298" src="" seamless=""></iframe></div><div id="'.$pj.$ap.'pAudio" data-corners="false"  data-role="popup" style="color:black;background-color:rgba(255, 255, 255, 0.8);padding:5px;" class="ifrwidthps"><a href="#" data-rel="back" class="popn ui-btn ui-btn-z ui-btn-icon-notext ui-icon-delete"></a><BR><BR><i id="'.$pj.$ap.'audtn" ></i> &nbsp;<i  ></i><br><a href="#"  id="'.$pj.$ap.'playaudion" data-vlu="" style="border:none;" class="ui-btn ui-btn-w"><img style="width:50px" src="css/images/sound.svg"></a><BR><input id="'.$pj.$ap.'volmn" type="range" data-role="none" value="0.8"  step="0.1" min="0" max="1"><BR><input id="'.$pj.$ap.'toposn" type="range" data-role="none" value="0" step="0.1" min="0" max="1"><audio id="'.$pj.$ap.'audsn"><source src="" type="audio/mpeg"><source src="" type="audio/wav"></audio><div class="ifrspinn" style="position:relative;left:50%;width:100%">Loading...<BR><img src="css/images/ajax-loader.gif"></div></div>';
		
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
			
			}else if($roww[style]=='apps'){
				$webpopup = '<!DOCTYPE html><html><head><meta charset="utf-8"><meta http-equiv="X-UA-Compatible" content="IE=edge"><meta name="viewport" content="width=device-width, initial-scale=1"><link href="css/bootstrapifr.css" rel="stylesheet"><link href="css/bootstrap.css" rel="stylesheet"><script src="js/appsystemifr.js"></script>';
				
				if($roww[font]){
				if(strpos($roww[font],'[b]')!=false){
				$bold = 'font-weight:bold;';
				$roww[font]=str_replace('[b]','',$roww[font]);}
				$font = 'color:'.htmlspecialchars($roww[font]).';'.$bold;
				}else{$font = '';$bold = '';}	
			
				if($bgstyle){$bgstyle = str_replace('="','="padding-top:35px;'.$font,$bgstyle);}else{$bgstyle = 'style="padding-top:35px;'.$font.'"';}
				$webpopup .= '</head><body '.$bgstyle.'>';
				
				
			}
			
			
			


			if($_POST['popuppicda']){
				$_POST['popuppicda'] = str_replace("btn btn-info","",$_POST['popuppicda']);
				$_POST['popuppicda'] = str_replace("ui-link","btn btn-info ui-link",$_POST['popuppicda']);
				$_POST['popuppicda'] = str_replace('btn btn-info ui-link" href="tel','ui-link" href="tel',$_POST['popuppicda']);
				$_POST['popuppicda'] = str_replace('btn btn-info ui-link" href="email','ui-link" href="email',$_POST['popuppicda']);
				$_POST['popuppicda'] = str_replace('     ',' ',$_POST['popuppicda']);
				$_POST['popuppicda'] = str_replace('../panel/'.$roww[pjnbr].'/images/','images/',$_POST['popuppicda']);
				$_POST['popuppicda'] = str_replace('&amp;','&',$_POST['popuppicda']);
			}
			
			
			$webpopup .= $html.'<!--part'.$pn.'!--><!--syseditorifrsys!-->'.$vnts.$_POST['popuppicda'].$vntsn.$tabnbgdatns.$htmls;
			
			if($roww[style]=='apps'){
				$webpopup .= '</body>';
			}else{
				$webpopup .= '</div><!--content!--></div><!--page!-->';
			;}
			
		 	
		
			$fpagtrns='../panel/'.$roww[pjnbr].'/'.$ap.'.html';
			file_put_contents($fpagtrns,$html.'<!--part'.$pn.'!--><!--syseditorifrsys!-->'.$vnts.$_POST['popuppicda'].$vntsn.$tabnbgdatns.$htmls);
			
		 	

			
			$fpagtrns='../panel/'.$roww[pjnbr].'/web'.$ap.'.html';
			file_put_contents($fpagtrns,$webpopup);
	
			
			
			if(!file_exists('../panel/'.$roww[pjnbr].'/temp/'.$pn.'/'.$ap.'.html')){
				
				$db->exec("update webhtml set style='apps' where cno='$apw'");
				
				mkdir('../panel/'.$roww[pjnbr].'/temp');
				mkdir('../panel/'.$roww[pjnbr].'/temp/'.$pn);
				file_put_contents('../panel/'.$roww[pjnbr].'/temp/'.$pn.'/'.$ap.'.html',$hts);			
			;}else{
				if(file_exists('../panel/'.$roww[pjnbr].'/temp/'.$pn.'/'.$ap.'[2].html'))rename('../panel/'.$roww[pjnbr].'/temp/'.$pn.'/'.$ap.'[2].html','../panel/'.$roww[pjnbr].'/temp/'.$pn.'/'.$ap.'[3].html');
				if(file_exists('../panel/'.$roww[pjnbr].'/temp/'.$pn.'/'.$ap.'[1].html'))rename('../panel/'.$roww[pjnbr].'/temp/'.$pn.'/'.$ap.'[1].html','../panel/'.$roww[pjnbr].'/temp/'.$pn.'/'.$ap.'[2].html');
				rename('../panel/'.$roww[pjnbr].'/temp/'.$pn.'/'.$ap.'.html','../panel/'.$roww[pjnbr].'/temp/'.$pn.'/'.$ap.'[1].html');
				file_put_contents('../panel/'.$roww[pjnbr].'/temp/'.$pn.'/'.$ap.'.html',$hts);		
			;}

	echo "<meta http-equiv='refresh' content='0;URL=editorifr.php?ap=".htmlspecialchars($roww[ap])."&pj=".htmlspecialchars($roww[pjnbr])."&pn=".htmlspecialchars($pn)."'>";
;}

?>

	