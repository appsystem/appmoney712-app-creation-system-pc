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
    <title><?php if($_SESSION[tn]==PRC){echo '文字页设计 - AppMoney712 移动应用设计系统';}else if($_SESSION[tn]==EN){echo 'Web page design - AppMoney712 APP Creation System';}else{echo '文字頁設計 - AppMoney712 移動應用設計系統';}?></title>

	<link rel="stylesheet" href="../css/icon/style.css">	<link rel="stylesheet" href="../css/icons/style.css">
	<link href="../css/jquery.mobile-1.4.4.min.css" rel="stylesheet">
	<link href="../css/jquerymobile-1.4.4.min.css" rel="stylesheet">
	<link rel="stylesheet" href="../jscss/jquery.cleditor.css" />
	<link rel="stylesheet" href="../css/appsystem.css" />
	
	<style type="text/css">
	.ui-icon-popup:after{background-image: url("../css/images/popup.svg");}
	</style>
	<script src="../js/jquery.js"></script>
	<script src="../js/jquery.mobile-1.4.4.min.js"></script>
	<script type="text/javascript" charset="utf-8" src="../js/jquery.cleditor.min.js"></script>
	<!--<script src="../js/jquery.nicescroll.min.js"></script>!-->
	<script>
	function checkform ( form )
	{
	}
	</script>
</head>
<body>

<div data-role="page" data-theme="b" class="page" style="background-color:white;color:black">
	<div style="overflow: hidden;" data-role="header" data-theme="f">
	<a href="#navigations"  id="menubttn"  data-rel="popup" data-transition="pop" class="ui-btn ui-btn ui-btn-inline ui-corner-all ui-btn-icon-left ui-icon-bars"><?php if($_SESSION[tn]==PRC){echo '目录';}else if($_SESSION[tn]==EN){echo 'Menu';}else{echo '目錄';}?></a>
    <h1><?php if($_SESSION[tn]==PRC){echo '文字编辑器 - AppMoney712 移动应用设计系统';}else if($_SESSION[tn]==EN){echo 'Content Editor - AppMoney712 APP Creation System';}else{echo '文字編輯器 - AppMoney712 移動應用設計系統';}?></h1>
	
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
	
		
	<a href="menudesign.php?pj=<?php echo htmlspecialchars($roww[pjnbr])?>&ap=<?php echo $ap?>&pn=<?php echo $pn?>&php=editor&plt=1" data-ajax="false" class="ui-btn ui-btn ui-btn-inline ui-corner-all ui-mini ui-btn-icon-left ui-icon-bars"><?php if($_SESSION[tn]==PRC){echo '专案应用页列表';}else if($_SESSION[tn]==EN){echo 'Project Page List';}else{echo '專案應用頁列表';}?></a>
	<?php ;}?>
	
	<a href="#infs" data-rel="popup" data-transition="pop" class="ui-btn ui-btn-b ui-btn-inline ui-corner-all ui-mini">? <?php if($_SESSION[tn]==PRC){echo '解释';}else if($_SESSION[tn]==EN){echo 'Explanation';}else{echo '解釋';}?></a>
	<div data-role="popup" id="infs" class="ifrwidthps" style="padding:5px" data-position-to="window" data-theme="f"><a href="#" data-rel="back" class="popn ui-btn ui-btn-z ui-btn-icon-notext ui-icon-delete"></a>
	<!--<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '浏览器';}else if($_SESSION[tn]==EN){echo 'Browser';}else{echo '瀏覽器';}?></b>
	<?php if($_SESSION[tn]==PRC){echo '请使用新版浏览器使用此功能,建议用Chrome 或 Safari。';}else if($_SESSION[tn]==EN){echo 'Please use modern web browser for this function.Chrome or Safari are recommended.';}else{echo '請使用新版瀏覽器使用此功能,建議用Chrome 或 Safari。';}?></p>
	<hr>!-->
	

	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '浏览编码';}else if($_SESSION[tn]==EN){echo 'Code view';}else{echo '瀏覽編碼';}?></b>
	<?php if($_SESSION[tn]==PRC){echo '点撀\'编码\'按钮能浏览您编写的html编码。';}else if($_SESSION[tn]==EN){echo 'You can click the code view button in the Editor to view html code you edited.';}else{echo '點撀\'編碼\'按鈕能瀏覽您編寫的html編碼。';}?></p><img src="../images/pigs.png"/>
	<hr>
	
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '链结';}else if($_SESSION[tn]==EN){echo 'Link';}else{echo '鏈結';}?></b>
	<?php if($_SESSION[tn]==PRC){echo '用户点撀链结按钮显示POPUP,链结内容均显示在popup内,e.g. 特定互联网视频丶存於互联网的特定格式的音频档,相片,特定网页或应用页。若填互联网纲页,一些网页只能在将设计产生应用时才能显示,不能用电脑浏览器预览。';}else if($_SESSION[tn]==EN){echo 'APP user clicks the link button in your design to show popup which shows the content of link, e.g. specific Internet video, specific format of audio file stored on the Internet, photo, specific web page or APP page. If you fill in specific Internet web page, it may be showed when your design is produced to be an APP. You cannot preview it on your computer browser.';}else{echo '用戶點撀鏈結按鈕顯示POPUP,鏈結內容均顯示在popup內,e.g. 特定互聯網視頻、存於互聯網的特定格式的音頻檔,相片,特定網頁或應用頁。若填互聯網綱頁,一些網頁只能在將設計產生應用時才能顯示,不能用電腦瀏覽器預覽。';}?></p>
	
	<p><?php if($_SESSION[tn]==PRC){echo '填写时必须填上网页档案,e.g. http://www.?????.com/index.html, 不能只填域名,http://www.?????.com。若是应用页,格式是[app]加应用页档名,e.g. [app]1.html。';}else if($_SESSION[tn]==EN){echo 'You need to fill in complete file path of Internet web page. e.g. http://www.?????.com/index.html, You cannot only fill in url, http://www.?????.com. If you need to open an APP page, the entry format is [app]its filename. e.g. [app]1.html';}else{echo '填寫時必須填上網頁檔案,e.g. http://www.?????.com/index.html, 不能只填域名,http://www.?????.com。若是應用頁,格式是[app]加應用頁檔名,e.g. [app]1.html。';}?></p>
	
	<p><?php  if(!$roww[pjnbr])$roww[pjnbr] = '???';
	if($_SESSION[tn]==PRC){echo '若使用应用内相片,档案放置於panel/'.$roww[pjnbr].'/images档夹内,格式是images/加相片档名,e.g. images/picture.png。您亦能在相片档名加[1],有不同形式显示,e.g. images/picture[1].png 。';}else if($_SESSION[tn]==EN){echo 'If you need to use picture stored inside APP, you need to place the file to folder panel/'.$roww[pjnbr].'/images. The entry format is images/picture filename. e.g. images/picture.png. If you name the picture with [1], the picture display style is different. e.g images/picture[1].png.';}else{echo '若使用應用內相片,檔案放置於panel/'.$roww[pjnbr].'/images檔夾內,格式是images/加相片檔名,e.g. images/picture.png。您亦能在相片檔名加[1],有不同形式顯示,e.g. images/picture[1].png。';}?></p>

	
	<p><?php if($_SESSION[tn]==PRC){echo '填写时是先填上链结标题,再用滑鼠选标题文字,再点撀编辑器的链结按钮,并填上所需数据。';}else if($_SESSION[tn]==EN){echo 'Step : <BR>You need to enter link title and select the title by computer mouse. Then you can click the link button on the Editor to show a form which you need to fill in necessary data.';}else{echo '填寫時是先填上鏈結標題,再用滑鼠選標題文字,再點撀編輯器的鏈結按鈕,並填上所需數據。';}?></p>

	<hr>
	<b style="color:black"> &nbsp;&nbsp;<?php
	if($_SESSION[tn]==PRC){echo '相片';}else if($_SESSION[tn]==EN){echo 'Picture';}else{echo '相片';}?></b>
		<p><?php if($_SESSION[tn]==PRC){echo '若相片是置於应用内,您须先将档案放置於inf/images及panel/'.$roww[pjnbr].'/images档夹内,并填images/档案名,e.g. images/picture.png。若使用互联网相片,相片大小是影响应用的启用速度。';}else if($_SESSION[tn]==EN){echo 'If you use the picture stored in the APP, you need to place the file to inf/images and panel/'.$roww[pjnbr].'/images.';}else{echo '若相片是置於應用內,您須先將檔案放置於inf/images及panel/'.$roww[pjnbr].'/images檔夾內,並填images/檔案名,e.g. images/picture.png。若使用互聯網相片,相片大小是影響應用的啟用速度。';}?></p>

	<p><?php if($_SESSION[tn]==PRC){echo '若内容含相片,并被提送二次,相片被指定阔度[相对用户浏览设备的屏幕尺寸的百分比]。您能调节浏览器尺寸,预览尺寸变化,一般细屏是相片阔占内容阔100%。';}else if($_SESSION[tn]==EN){echo 'If the content contains picture and you send your designed content twice, the picture size in the content is responsive to APP user\'s device screen size[in %]. You need  to adjust your browser size to preview the size of picture. For small screen such as mobile phone, the picture width is 100% fitting to content area width. ';}else{echo '若內容含相片,並被提送二次,相片被指定闊度[相對用戶瀏覽設備的屏幕尺寸的百分比]。您能調節瀏覽器尺寸,預覽尺寸變化,一般細屏是相片闊佔內容闊100%。';}?></p>
	
	<p><?php if($_SESSION[tn]==PRC){echo '若想对某相片指定尺寸,您能在完成提送二次,编写该相片的html码并加上阔度,e.g. style="width:85%" 或 style="width:85px"。';}else if($_SESSION[tn]==EN){echo 'If you need to specify a width to a picture, you need to edit the html code of the picture by adding html style attribute of width after the second sending. e.g. style="width:85%" or style="width:85px"';}else{echo '若想對某相片指定尺寸,您能在完成提送二次,編寫該相片的html碼並加上闊度,e.g. style="width:85%" 或 style="width:85px"。';}?></p>
	
	<p><?php if($_SESSION[tn]==PRC){echo '您亦能改用相关popup相片格的功能,此功能亦内含文字编辑器。';}else if($_SESSION[tn]==EN){echo 'You can also use the function - popup photo grid rather than using this Editor function. The photo grid functions also contain text editor function.';}else{echo '您亦能改用相關popup相片格的功能,此功能亦內含文字編輯器。';}?></p>
	
	<!--<hr>
	
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '特定互联网视频';}else if($_SESSION[tn]==EN){echo 'Specific Internet Video';}else{echo '特定互聯網視頻';}?></b>
	<?php if($_SESSION[tn]==PRC){echo '编辑器有此功能,但建议使用链结,用户点撀再显示含视频的POPUP。此项相关应用启用速度。';}else if($_SESSION[tn]==EN){echo 'You need to use link function instead of video function in the Editor for adding Internet video. APP user clicks the link button to open a video popup in your design. This action is for considering of APP starting speed.';}else{echo '編輯器有此功能,但建議使用鏈結,用戶點撀再顯示含視頻的POPUP。此項相關應用啟用速度。';}?></p>!-->
	
	
	
	<hr>
	
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '字体';}else if($_SESSION[tn]==EN){echo 'Font type';}else{echo '字體';}?></b>
	<?php if($_SESSION[tn]==PRC){echo '您或不应使用编辑器内的字体种类,内容字体是决定在用户的设备有否安装此等字体。您在Windows或Linus编写设计,但用户是使用Android。';}else if($_SESSION[tn]==EN){echo 'You may not need to use text font type in the Editor. Because the font type depends on the APP user\'s device installed it or not. You edit it in Windows or Linus system but device system of APP user may be Android.';}else{echo '您或不應使用編輯器內的字體種類,內容字體是決定在用戶的設備有否安裝此等字體。您在Windows或Linus編寫設計,但用戶是使用Android。';}?></p>
	
	<hr>
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '表';}else if($_SESSION[tn]==EN){echo 'Table';}else{echo '表';}?></b>
	<?php if($_SESSION[tn]==PRC){echo '须将浏览器的大小缩细至移动设备大小，再浏览。';}else if($_SESSION[tn]==EN){echo 'The table structure created by the Editor will be different when using mobile phone[small size screen] to view. You can resize your browser to preview.';}else{echo '須將瀏覽器的大小縮細至移動設備大小，再瀏覽。';}?></p>
	<hr>
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '操作错误';}else if($_SESSION[tn]==EN){echo 'Error';}else{echo '操作錯誤';}?></b>
	<?php if($_SESSION[tn]==PRC){echo '若发现编辑器显示异常,在浏览器移除此页url内的#&ui-state=dialog。';}else if($_SESSION[tn]==EN){echo 'If you find this editing page showing error or abnormal situation, you need to remove all #&ui-state=dialog codes in the URL of your web browser.';}else{echo '若發現編輯器顯示異常,在瀏覽器移除此頁url內的#&ui-state=dialog。';}?></p>	
	
	</div>
	
	<a href="#inf" data-rel="popup" data-transition="pop" class="ui-btn ui-btn-b ui-btn-inline ui-corner-all ui-mini">? <?php if($_SESSION[tn]==PRC){echo '链结';}else if($_SESSION[tn]==EN){echo 'Link';}else{echo '鏈結';}?></a>
	<div data-role="popup" id="inf"  class="ifrwidthps" style="padding:5px" data-position-to="window" data-theme="f"><a href="#" data-rel="back" class="popn ui-btn ui-btn-z ui-btn-icon-notext ui-icon-delete"></a>

	<b style="color:black"><?php if($_SESSION[tn]==PRC){echo '链结按钮';}else if($_SESSION[tn]==EN){echo 'Link button';}else{echo '鏈結按鈕';}?></b>
	<p><?php if($_SESSION[tn]==PRC){echo '您能加入POPUP按钮开启内容,e.g. 特定互联网视频丶存於互联网的特定格式的音频档,相片,特定网页或应用页。若填互联网纲页,一些网页只能在将设计产生应用时才能显示,不能用电脑浏览器预览。';}else if($_SESSION[tn]==EN){echo 'You can add popup button in your designed content to show content e.g. specific Internet video, specific format of audio file stored on the Internet, photo, specific web page or APP page. If you fill in specific Internet web page, it may be showed when your design is produced to be an APP. You cannot preview it on your computer browser.';}else{echo '您能加入POPUP按鈕開啟內容,e.g. 特定互聯網視頻、存於互聯網的特定格式的音頻檔,相片,特定網頁或應用頁。若填互聯網綱頁,一些網頁只能在將設計產生應用時才能顯示,不能用電腦瀏覽器預覽。';}?></p>
	<img src="../images/btn.png"/>
	<p><?php if($_SESSION[tn]==PRC){echo '您亦能令用户开启浏览器浏览特定网页,e.g. pdf文件或地图。格式是[openbrowser]网页url,e.g. [openbrowser]http://???.?????.com/viewer?url=??????????word.pdf。此功能不能用电脑浏览器试用。';}else if($_SESSION[tn]==EN){echo 'You can open APP user device\'s specific browser to show specific Internet web page. e.g. pdf document or map. The format is [openbrowser]url of web page. e.g. [openbrowser]http://???.?????.com/viewer?url=??????????word.pdf.  You cannot preview it on your computer browser.';}else{echo '您亦能令用戶開啟瀏覽器瀏覽特定網頁,e.g. pdf文件或地圖。格式是[openbrowser]網頁url,e.g. [openbrowser]http://???.?????.com/viewer?url=??????????word.pdf。此功能不能用電腦瀏覽器試用。';}?></p>

	<hr>
	<p><?php if($_SESSION[tn]==PRC){echo '您亦能令用户开启合适应用浏览特定互联网或内联网文件,e.g. 用Acrobat Reader APP开启pdf文件。格式是[openapp]网页url,e.g. [openapp]http://???.?????.com/word.pdf。此功能不能用电脑浏览器试用。';}else if($_SESSION[tn]==EN){echo 'You can let APP users to open Internet/Intranet document by appropriate APP in their appropriate device. e.g. open pdf document by Acrobat Reader APP. The format is [openapp]document url. e.g. [openapp]http://???.?????.com/word.pdf.  You cannot preview it on your computer browser.';}else{echo '您亦能令用戶開啟合適應用瀏覽特定互聯網或內聯網文件,e.g. 用Acrobat Reader APP開啟pdf文件。格式是[openapp]網頁url,e.g. [openapp]http://???.?????.com/word.pdf。此功能不能用電腦瀏覽器試用。';}?></p>

	<hr>
	<p><?php if($_SESSION[tn]==PRC){echo '您亦能令用户开启设备巳安装的WHATSAPP APP,格式是whatsapp://??????????,并显示特定内容,对於IOS APP,您亦能使用相关社交分享的URL scheme, 能令用户的相关应用开启并使用特定功能,到本司网站有指引。此功能不能用电脑浏览器试用。';}else if($_SESSION[tn]==EN){echo 'You can open APP user device\'s WhatsAPP APP to use its specific function. e.g.whatsapp://??????????. Please refer to our website. For IOS APP, you can use the URL scheme of many social sharing media to open APP user device\'s related social sharing APPs and use their functions. Please refer to our website. You cannot try it on your computer browser.';}else{echo '您亦能令用戶開啟設備巳安裝的WHATSAPP APP,格式是whatsapp://??????????,並顯示特定內容,對於IOS APP,您亦能使用相關社交分享的URL scheme, 能令用戶的相關應用開啟並使用特定功能,到本司網站有指引。此功能不能用電腦瀏覽器試用。';}?></p>

	<hr>
<p><?php if($_SESSION[tn]==PRC){echo '用电脑滑鼠在内容上选文字作为按钮标题,点撀链结按钮,再键入URL。';}else if($_SESSION[tn]==EN){echo 'You need to select text as button title by computer mouse and click the link button to show this form. You need to enter the URL.';}else{echo '用電腦滑鼠在內容上選文字作為按鈕標題,點撀鏈結按鈕,再鍵入URL。';}?></p>	
	<img src="../images/btn1.png"/>
	<hr>
	<p><?php if($_SESSION[tn]==PRC){echo '按钮显示在您的应用设计上。';}else if($_SESSION[tn]==EN){echo 'Button style will be showed in your APP design instead of link style.';}else{echo '按鈕顯示在您的應用設計上。';}?></p>	
	<a href="#" class="ui-btn ui-btn-f ui-btn-inline">Order pork cusine</a>
	
	
	
	</div>
	<?php if(file_exists('../panel/'.$roww[pjnbr].'/'.$ap.'.html')){
	if(file_exists('../panel/'.$roww[pjnbr].'/temp/'.$pn.'/'.$ap.'.html') and !$pres){?>
	<div data-role="controlgroup" data-type="horizontal" class="ui-btn-inline" data-corners="false">
	<a href="editor.php?pj=<?php echo $roww[pjnbr]?>&ap=<?php echo $roww[ap]?>&pn=<?php echo $pn?>&pres=1" data-ajax="false" class="ui-btn ui-btn-f ui-btn-inline ui-corner-all ui-mini" style="color:pink" ><?php if($_SESSION[tn]==PRC){echo '改用上次储存';}else if($_SESSION[tn]==EN){echo 'Using previous save';}else{echo '改用上次儲存';}?></a>
	<?php if(file_exists('../panel/'.$roww[pjnbr].'/temp/'.$pn.'/'.$ap.'[1].html')){?>
	<a href="editor.php?pj=<?php echo $roww[pjnbr]?>&ap=<?php echo $roww[ap]?>&pn=<?php echo $pn?>&pres=2" data-ajax="false" class="ui-btn ui-btn-f ui-btn-inline ui-corner-all ui-mini" style="color:pink" >2</a>
	<?php ;}if(file_exists('../panel/'.$roww[pjnbr].'/temp/'.$pn.'/'.$ap.'[2].html')){?>
	<a href="editor.php?pj=<?php echo $roww[pjnbr]?>&ap=<?php echo $roww[ap]?>&pn=<?php echo $pn?>&pres=3" data-ajax="false" class="ui-btn ui-btn-f ui-btn-inline ui-corner-all ui-mini" style="color:pink" >3</a>
	<?php ;}if(file_exists('../panel/'.$roww[pjnbr].'/temp/'.$pn.'/'.$ap.'[3].html')){?>
	<a href="editor.php?pj=<?php echo $roww[pjnbr]?>&ap=<?php echo $roww[ap]?>&pn=<?php echo $pn?>&pres=4" data-ajax="false" class="ui-btn ui-btn-f ui-btn-inline ui-corner-all ui-mini" style="color:pink" >4</a>
	<?php ;}?>
	</div>
<?php ;}else{
	if(file_exists('../panel/'.$roww[pjnbr].'/temp/'.$pn.'/'.$ap.'.html') and $pres){?>
<a href="editor.php?pj=<?php echo $roww[pjnbr]?>&ap=<?php echo $roww[ap]?>&pn=<?php echo $pn?>"  data-ajax="false" class="ui-btn ui-btn-f ui-btn-inline ui-corner-all ui-mini" style="color:pink" ><?php if($_SESSION[tn]==PRC){echo '不改用上'.$pres.'次储存';}else if($_SESSION[tn]==EN){echo 'Not using previous save '.$pres;}else{echo '不改用上'.$pres.'次儲存';}?></a>
<?php ;} ;}
	;}//?>

	<a href="icon.php" class="ui-btn ui-btn-f ui-btn-inline" target="_blank" data-ajax="false"><?php if($_SESSION[tn]==PRC){echo '图像字体';}else if($_SESSION[tn]==EN){echo 'Icon Font';}else{echo '圖像字體';}?></a>
	
	<?php if($tl)$tln = '&tl='.$tl;?>
	
	<FORM action="editor.php?pj=<?php echo htmlspecialchars($roww[pjnbr]) ?>&ap=<?php echo htmlspecialchars($roww[ap]) ?>&pn=<?php echo htmlspecialchars($pn).$tln ?>" id="webxls" method="post" data-ajax="false" >
	
<span style="color:black"><?php if($_SESSION[tn]==PRC){echo '专案';}else if($_SESSION[tn]==EN){echo 'Project';}else{echo '專案';}?></span>
	<?php 	$sql=$db->query("select * from webpj where cno='$pj'");
	if($sql)$row=$sql->fetch();
	echo '['.htmlspecialchars($row[date]).'] '.htmlspecialchars($row[title]);?>
	
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	
	<span style="color:black"><?php if($_SESSION[tn]==PRC){echo '应用页称';}else if($_SESSION[tn]==EN){echo 'Page name';}else{echo '應用頁稱';}?></span> :
	<?php echo htmlspecialchars($roww[title])?>

	


	<br>
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
					if(strpos('<!--part'.$htm[$i],$pntag)===false and !$editor){$html .= '<!--part'.$htm[$i];}
					else if(strpos('<!--part'.$htm[$i],$pntag)!==false){$editor  = str_replace($pntag,'','<!--part'.$htm[$i]);}
					else{$htmls .= '<!--part'.$htm[$i];}
				;}

				$tabnbgdata = explode('<!--data-tabnbg',$editor);
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
				
				$editor  = str_replace('<div class="swiper-slide"><div id="'.$pj.$ap.'vnts'.$pn.'" class="vntsns vtnn">','',$editor);
				$editor  = str_replace('<!--data-tabnbg'.$tabnbgdatn[0].'data-tabnbg!-->','',$editor);
				;}
				
				$editor  = str_replace('</div></div><!--vnts!-->','',$editor);				
				
				

				$tbgnvlu = explode('<!--data',$editor);
				$tbgsvlu = explode('data!-->',$tbgnvlu[1]);
				$tbgvlu = explode('@#@',$tbgsvlu[0]);

				$editorhtm = explode('<!--edithtml!-->',$editor);
				$editorhtml = $editorhtm[1];
				
				//if(strpos($editor,'<!--editorbg!-->')!==false){		
					//$bghtm = explode('<!--editorbg!-->',$editor);
					//$editorhtml = $bghtm[1];	$editorhtml  = str_replace('<!--editorhtml!--><div style="padding-left:5px;padding-right:5px;">','',$editorhtml);
					//$editorhtml  = str_replace('</div><!--editorhtmls!-->','',$editorhtml);								
				//;}else{$editorhtm = explode('<!--editorhtml!--><div style="padding-left:5px;padding-right:5px;">',$editor);$editorhtml = str_replace('</div><!--editorhtmls!-->','',$editorhtm[1]);}
			;}
	?>
	<textarea  id="ueditor" data-corners="false"  style="background-color:#F2F2F2;" name="ueditor"><?php if(!$_POST['ueditor'])echo $editorhtml;?></textarea>
	<input type="hidden" name="guanyin1" value="<?php if(!$_POST[guanyin1])$_SESSION[guanyin1]=rand();
	echo htmlspecialchars($_SESSION[guanyin1]); ?>">
	
	<div class="ui-grid-d"><div class="ui-block-a">
	<input type="submit" name="submit" id="webxlsbtn" class="ui-btn" value="<?php if($_SESSION[tn]==PRC){echo '送交';}else if($_SESSION[tn]==EN){echo 'SEND';}else{echo '送交';}?>"></div><div class="ui-block-b"></div><div class="ui-block-c"></div>
	<div class="ui-block-d">
	</div>
	</div>
	<HR>
	<div class="ui-grid-b"><div class="ui-block-a">
	<?php if($_SESSION[tn]==PRC){echo '加标题';}else if($_SESSION[tn]==EN){echo 'Add title';}else{echo '加標題';}?>
	<a href="#pjtitle" data-rel="popup" data-transition="pop" class="ui-btn ui-btn ui-btn-inline ui-corner-all ui-mini" style="color:blue;">?</a>
	<div data-role="popup" id="pjtitle" style="min-width:300px" data-theme="f"><a href="#" class="ui-btn ui-corner-all ui-icon-delete ui-btn-icon-notext ui-btn-right" data-rel="back"></a>

	<h4 style="color:black"><?php if($_SESSION[tn]==PRC){echo '加标题';}else if($_SESSION[tn]==EN){echo 'Add title';}else{echo '加標題';}?></h4>
	<p>
	<?php if($_SESSION[tn]==PRC){echo '在此段内容加特定格式的标题。';}else if($_SESSION[tn]==EN){echo 'A specific format of title style is added to the content.';}else{echo '在此段內容加特定格式的標題。';}?>
	</p>
	</div>
	<input name="title" type="text" value="<?php echo htmlspecialchars($tbgvlu[0])?>">
	</div><div class="ui-block-b">
	<?php if($_SESSION[tn]==PRC){echo '标题颜色';}else if($_SESSION[tn]==EN){echo 'Title color';}else{echo '標題顏色';}?>
	<a href="#pjtclr" data-rel="popup" data-transition="pop" class="ui-btn ui-btn ui-btn-inline ui-corner-all ui-mini" style="color:blue;">?</a>
	<div data-role="popup" id="pjtclr" style="min-width:300px" data-theme="f"><a href="#" class="ui-btn ui-corner-all ui-icon-delete ui-btn-icon-notext ui-btn-right" data-rel="back"></a>

	<h4 style="color:black"><?php if($_SESSION[tn]==PRC){echo '标题颜色';}else if($_SESSION[tn]==EN){echo 'Title color';}else{echo '標題顏色';}?></h4>
	<p>
	<?php if($_SESSION[tn]==PRC){echo '填上html颜色码 e.g. #123456。';}else if($_SESSION[tn]==EN){echo 'You can add  color code e.g. #123456 .';}else{echo '填上html顏色碼 e.g. #123456。';}?>
	</p>
	
	</div>
	<input name="tclr" type="text" value="<?php echo htmlspecialchars($tbgvlu[1])?>">
	</div><div class="ui-block-c">
	<?php if($_SESSION[tn]==PRC){echo '标题区域背景';}else if($_SESSION[tn]==EN){echo 'Background of title area ';}else{echo '標題區域背景';}?>
	<a href="#pjtbg" data-rel="popup" data-transition="pop" class="ui-btn ui-btn ui-btn-inline ui-corner-all ui-mini" style="color:blue;">?</a>
	<div data-role="popup" id="pjtbg" style="min-width:300px" data-theme="f"><a href="#" class="ui-btn ui-corner-all ui-icon-delete ui-btn-icon-notext ui-btn-right" data-rel="back"></a>
 
	<h4 style="color:black"><?php if($_SESSION[tn]==PRC){echo '标题区域背景';}else if($_SESSION[tn]==EN){echo 'Background of title area';}else{echo '標題區域背景';}?></h4>
	<p>
	<?php if($_SESSION[tn]==PRC){echo '标题区域的背景图像,使用应用内的图像,档案须存於panel/'.$roww[pjnbr].'/images档夹内。若设置背景图像上下左右重覆显示,在档案名加[xy]。e.g. picture[xy].png';}else if($_SESSION[tn]==EN){echo 'It is about the background of item. If you use the pictures stored in APP, you need to prepare pictures and store them in  panel/'.$roww[pjnbr].'/images folder. If you add [xy] to the picture file name e.g. picture[xy].png, the picture will be repeated both vertically and horizontally in the item area.';}else{echo '標題區域的背景圖像,使用應用內的圖像,檔案須存於panel/'.$roww[pjnbr].'/images檔夾內。若設置背景圖像上下左右重覆顯示,在檔案名加[xy]。e.g. picture[xy].png';}?></p>
	<p><?php if($_SESSION[tn]==PRC){echo '您亦能填上rgb颜色码 e.g. rgb(125,125,125), rgba颜色码e.g. rgba(125,125,125,0.5) 或 hex颜色码e.g. #123456代替背景图像。';}else if($_SESSION[tn]==EN){echo 'You can add rgb color code e.g. rgb(125,125,125), rgba color code e.g. rgba(125,125,125,0.5) or hex color code e.g. #123456 instead of background picture.';}else{echo '您亦能填上rgb顏色碼 e.g. rgb(125,125,125), rgba顏色碼e.g. rgba(125,125,125,0.5) 或 hex顏色碼e.g. #123456代替背景圖像。';}?></p>
	<!--<p><?php if($_SESSION[tn]==PRC){echo '您亦能填a-y的颜色主题e.g. b。';}else if($_SESSION[tn]==EN){echo 'You can enter color theme a-y.e.g. a';}else{echo '您亦能填a-y的顏色主題e.g. b。';}?></p>!-->
	
	
	</div>
	<input name="tbg" type="text" value="<?php echo htmlspecialchars($tbgvlu[2])?>">
	</div></div> 
	
	<HR>	
	<div class="ui-grid-c"><div class="ui-block-a">
	<?php if($_SESSION[tn]==PRC){echo '背景图像';}else if($_SESSION[tn]==EN){echo 'Background picture';}else{echo '背景圖像';}?>
	<a href="#pjts" data-rel="popup" data-transition="pop" class="ui-btn ui-btn ui-btn-inline ui-corner-all ui-mini" style="color:blue;">?</a>
	<div data-role="popup" id="pjts" style="min-width:300px" data-theme="f"><a href="#" class="ui-btn ui-corner-all ui-icon-delete ui-btn-icon-notext ui-btn-right" data-rel="back"></a>

	<h4 style="color:black"><?php if($_SESSION[tn]==PRC){echo '背景图像';}else if($_SESSION[tn]==EN){echo 'Background picture';}else{echo '背景圖像';}?></h4>
	<p>
	<?php if($_SESSION[tn]==PRC){echo '此段內容的背景图像。若设置背景图像上下左右重覆显示,在档案名加[xy]。e.g. picture[xy].png';}else if($_SESSION[tn]==EN){echo 'It is about the background picture of this content area. If you add [xy] to the picture file name (e.g. picture[xy].png, the picture will be repeated both vertically and horizontally.';}else{echo '此段內容的背景圖像。若設置背景圖像上下左右重覆顯示,在檔案名加[xy]。e.g. picture[xy].png';}?>
	</p>
	<p>
	<?php if($_SESSION[tn]==PRC){echo '若将此图像档案置於此软件内,是放在';}else if($_SESSION[tn]==EN){echo 'You may need to place this file to this software folder ';}else{echo '若將此圖像檔案置於此軟件內,是放在';}echo 'panel/'.$roww[pjnbr].'/images/.';?>
	</p>
	<p>
	<?php if($_SESSION[tn]==PRC){echo '您亦能填上rgb颜色码 e.g. rgb(125,125,125), rgba颜色码e.g. rgba(125,125,125,0.5) 或 hex颜色码e.g. #123456代替背景图像。';}else if($_SESSION[tn]==EN){echo 'You can add rgb color code e.g. rgb(125,125,125), rgba color code e.g. rgba(125,125,125,0.5) or hex color code e.g. #123456 instead of background picture.';}else{echo '您亦能填上rgb顏色碼 e.g. rgb(125,125,125), rgba顏色碼e.g. rgba(125,125,125,0.5) 或 hex顏色碼e.g. #123456代替背景圖像。';}?>
	</p>
	</div>
	<input name="bg" type="text" value="<?php echo htmlspecialchars($tbgvlu[3])?>">
	</div><div class="ui-block-b">
	<?php if($_SESSION[tn]==PRC){echo '限高%[限高内容框]';}else if($_SESSION[tn]==EN){echo 'Height limit %[iframe with scroll bar]';}else{echo '限高%[限高內容框]';}?>
	<a href="#hgt" data-rel="popup" data-transition="pop" class="ui-btn ui-btn ui-btn-inline ui-corner-all ui-mini" style="color:blue;">?</a>
	<div data-role="popup" id="hgt" style="min-width:300px" data-theme="f"><a href="#" class="ui-btn ui-corner-all ui-icon-delete ui-btn-icon-notext ui-btn-right" data-rel="back"></a>

	<h4 style="color:black"><?php if($_SESSION[tn]==PRC){echo '限高内容框';}else if($_SESSION[tn]==EN){echo 'Fixed height iframe with scroll bar';}else{echo '限高內容框';}?></h4>
	<p>
	<?php if($_SESSION[tn]==PRC){echo '若应用是设计给手机用户而文字段内容字数多,您能设置内容框,内容框旁有滑动工具供用户浏览全文内容。';}else if($_SESSION[tn]==EN){echo 'If your design is for mobile phone and the content is rich, you can develop an iframe with scrolling bar for APP user to browse the content. ';}else{echo '若應用是設計給手機用戶而文字段內容字數多,您能設置內容框,內容框旁有滑動工具供用戶瀏覽全文內容。';}?>
	</p>
	<h4 style="color:black"><?php if($_SESSION[tn]==PRC){echo '限高%';}else if($_SESSION[tn]==EN){echo 'Height limit %';}else{echo '限高%';}?></h4>
	<p>
	<?php if($_SESSION[tn]==PRC){echo '内容框高度/用户浏览设备屏幕高度的百分比,填整数。应用能按用户的浏览设备屏幕高度定出内容框高度。';}else if($_SESSION[tn]==EN){echo 'For ratio percentage of iframe height and APP user device\'s screen [viewport] height. you need to fill in an integer value. The iframe height can be calculated by your APP based on APP user device\'s screen [viewport] height.';}else{echo '內容框高度/用戶瀏覽設備屏幕高度的百分比,填整數。應用能按用戶的瀏覽設備屏幕高度定出內容框高度。';}?>
	</p>
	</div>
	<input name="hgt" type="number" value="<?php echo htmlspecialchars($tbgvlu[4])?>">
	</div><div class="ui-block-c">
	<?php if($_SESSION[tn]==PRC){echo '启用高度扩展';}else if($_SESSION[tn]==EN){echo 'Enable height extension';}else{echo '啟用高度擴展';}?>
	<a href="#hgtS" data-rel="popup" data-transition="pop" class="ui-btn ui-btn ui-btn-inline ui-corner-all ui-mini" style="color:blue;">?</a>
	<div data-role="popup" id="hgtS" style="min-width:300px" data-theme="f"><a href="#" class="ui-btn ui-corner-all ui-icon-delete ui-btn-icon-notext ui-btn-right" data-rel="back"></a>

	<h4 style="color:black"><?php if($_SESSION[tn]==PRC){echo '启用高度扩展';}else if($_SESSION[tn]==EN){echo 'Enable height extension';}else{echo '啟用高度擴展';}?></h4>
	<p>
	<?php if($_SESSION[tn]==PRC){echo '若有设置限高(适於较细值,e.g. <15%),您能在内容框的右上部加高度扩展按钮,用户点撀此按钮将限高内容扩至特定高度[高度扩展须大於内容框限高]。填整数才启用此按钮,数值是占用户设备屏高的百分比。';}else if($_SESSION[tn]==EN){echo 'If you enter the height% (suit for small value e.g. <15%), you can add a height extension button to top right corner of content portion. APP user can click on it to view the content in higher frame size. So the height extension must be greater than height of content. You need to enter an integer value to enable this button. The value is the height percentage relating to screen[viewport] height of APP user\'s device.';}else{echo '若有設置限高(適於較細值,e.g. <15%),您能在內容框的右上部加高度擴展按鈕,用戶點撀此按鈕將限高內容擴至特定高度[高度擴展須大於内容框限高]。填整數才啟用此按鈕,數值是佔用戶設備屏高的百分比。';}?>
	</p>
	</div>
	<input name="hgts" type="number" value="<?php echo htmlspecialchars($tbgvlu[5])?>">
	
	</div><div class="ui-block-d">
	<label for="hgtpop"><?php if($_SESSION[tn]==PRC){echo '启用popup';}else if($_SESSION[tn]==EN){echo 'Enable popup';}else{echo '啟用popup';}?></label>
	<a href="#hgtpops" data-rel="popup" data-transition="pop" class="ui-btn ui-btn ui-btn-inline ui-corner-all ui-mini" style="color:blue;">?</a>
	<div data-role="popup" id="hgtpops" style="min-width:300px" data-theme="f"><a href="#" class="ui-btn ui-corner-all ui-icon-delete ui-btn-icon-notext ui-btn-right" data-rel="back"></a>

	<h4 style="color:black"><?php if($_SESSION[tn]==PRC){echo '启用popup';}else if($_SESSION[tn]==EN){echo 'Enable popup';}else{echo '啟用popup';}?></h4>
	<p>
	<?php if($_SESSION[tn]==PRC){echo '您能在内容框的左上部加popup按钮,用户点撀此按钮开始popup显示同样内容。若使用此功能,内容前部应加空行。';}else if($_SESSION[tn]==EN){echo 'You can add a popup button to top left corner of content portion. APP user can click on it to view the same content in a popup. You need to add space line to the top portion of content.';}else{echo '您能在內容框的左上部加popup按鈕,用戶點撀此按鈕開始popup顯示同樣內容。若使用此功能,內容前部應加空行。';}?>
	</p>
	</div>
	<input name="hgtpop" id="hgtpop" type="checkbox" value="1" <?php if($tbgvlu[6])echo 'checked="checked"';?>>
	</div></div> 
	</FORM><script src="../js/appsystem.js"></script>
	<hr>
	<?php 
	if($editor){
	if($_SESSION[tn]==PRC){echo '您的设计';}else if($_SESSION[tn]==EN){echo 'Your design';}else{echo '您的設計';}
	$neditor = str_replace('(images/','(../panel/'.$roww[pjnbr].'/images/',$editor);
	echo '<br>'.str_replace('"images/','"../panel/'.$roww[pjnbr].'/images/',$neditor);
if($pres)$temp = '/temp';
if(file_exists('../panel/'.$roww[pjnbr].$temp.'/web'.$ap.$preshtml.'.js')){
	$jswebn = file_get_contents('../panel/'.$roww[pjnbr].$temp.'/web'.$ap.$preshtml.'.js');
	$jswebn=explode('/*webjs'.$pn.'*/',$jswebn);
	echo '<script>'.$jswebn[1].'</script>';
;}
	}?>
	<hr>

	 <?php if($_SESSION[tn]==PRC){echo '例';}else if($_SESSION[tn]==EN){echo 'Example';}else{echo '例';}?> 
	<div style="overflow-x:hidden;position:relative;" id="hgtHTML"><a href="#" style="position:absolute;top:0;right:1%" id="hgtHTMLs" data-pop="hgtHTML" data-hgt="30" class="ui-btn ui-btn-z ui-btn-icon-notext ui-icon-carat-d"></a>sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss </div>
	<BR>
	
	<BR>
	 <?php if($_SESSION[tn]==PRC){echo '例';}else if($_SESSION[tn]==EN){echo 'Example';}else{echo '例';}?> 
	 <h3 class="ui-bar ui-bar-x"><?php if($_SESSION[tn]==PRC){echo '标题';}else if($_SESSION[tn]==EN){echo 'title';}else{echo '標題';}?></h3>
      <div class="ui-body ui-body-x">
          <p>sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss</p>
      </div>

	 
	<div id="navigations" data-role="popup" data-theme="none">
	<ul style="min-width:210px;" data-role="listview" data-inset="true">
	<li data-icon="edit"><a href="design.php" data-ajax="false"><?php if($_SESSION[tn]==PRC){echo '设计步骤';}else if($_SESSION[tn]==EN){echo 'Design Step';}else{echo '設計步驟';}?></a></li>
	<!--<li><a href="deignote.php" data-ajax="false"><?php if($_SESSION[tn]==PRC){echo '设计笔记';}else if($_SESSION[tn]==EN){echo 'Design Note';}else{echo '設計筆記';}?></a></li>!-->
	<li><a href="project.php" data-ajax="false"><?php if($_SESSION[tn]==PRC){echo '专案管理';}else if($_SESSION[tn]==EN){echo 'Project Management';}else{echo '專案管理';}?></a></li>
	<li><a href="tool.php" data-ajax="false"><?php if($_SESSION[tn]==PRC){echo '工具';}else if($_SESSION[tn]==EN){echo 'Tools';}else{echo '工具';}?></a></li>


	<li><a href="explanation.php" data-ajax="false"><?php if($_SESSION[tn]==PRC){echo '解释';}else if($_SESSION[tn]==EN){echo 'Explanation';}else{echo '解釋';}?></a></li>

	

	</ul></div><!-- /navigation -->	
	</div><!-- /content -->
	</div><!-- /page -->
</body></html>	
<script type="text/javascript">
$(document).ready(function(){
    $('#ueditor').cleditor({height: 550});
   
});




 
		//$("#hgtHTML").niceScroll({boxzoom:true,touchbehavior:true});
//if (navigator.userAgent.search("Firefox") >= 0 || navigator.userAgent.search("MSIE") >= 0) {
    //alert("Please use modern Chrome  or Safari.");
//}		

$("#hgtHTML").height($( window ).height()*30/100);
hgt("hgtHTMLs");	
</script>

<?php 




$tdy=0;
$tdy=date('Y-m-d');
if($_POST['ueditor'] and $pj and $_SESSION[guanyin1] and $_SESSION[guanyin1]==$_POST[guanyin1]){

	
	if($ap and !preg_match('/^[0-9]*$/', $ap))exit;
	if($pj and !preg_match('/^[0-9]*$/', $pj))exit;
	
	
			$popup=$_POST['ueditor'];
		
			
			
			
	 		if($popup){
			$popup = str_replace('src="//','src="http://',$popup);
			$popup = str_replace("class=\"ifrimgwidth\"","",$popup);
			$popup = str_replace('style="width:"',"",$popup);
			$popup = str_replace('<img',"<img style=\"width:\" class=\"ifrimgwidth\"",$popup);
			//$popup = str_replace("<a class=\"grid","<aclass=\"grid",$popup);
			$popup = str_replace('class="ui-btn ui-btn-inline imgspop"',"",$popup);
			$popup = str_replace("class='ui-btn ui-btn-inline imgspop'","",$popup);
			$popup = str_replace('<a ',"<a class='ui-btn ui-btn-inline imgspop'",$popup);
			//$popup = str_replace('class=\'ui-btn ui-btn-inline imgspop\'class="popn','class="popn',$popup);
			
			$popup = str_replace('href="',' data-url="',$popup);
			$popup = str_replace('data-url="http://[app]',' data-url="',$popup);
			$popup = str_replace('data-url="http://images',' data-url="images',$popup);
			$popup = str_replace('target="_blank"','',$popup);		
			$popup =str_replace("<aclass=\"grid","<a class=\"grid",$popup);
			$popup =str_replace("<u><font","<font",$popup);
			$popup =str_replace("</font></u>","</font>",$popup);




		
			//$popup =str_replace('id="htmlpopup','id="'.$pj.$ap.'htmlpopup',$popup);
			//$popup =str_replace('href="#htmlpopup','href="#'.$pj.$ap.'htmlpopup',$popup);
			}
			
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
			
			if($_POST[bg]){$_POST[bg]=str_replace('/','',$_POST[bg]);
			$_POST[bg]=str_replace('\\','',$_POST[bg]);
			$_POST[bg]=str_replace('..','',$_POST[bg]);}
			
			if(strpos($_POST[bg],'http://')!==false or strpos($_POST[bg],'https://')!==false){$images = '';}else{$images = 'images/';}
			
			if(strpos($_POST[bg],'#')!==false or strpos($_POST[bg],'rgba(')!==false  or strpos($_POST[bg],'rgb(')!==false){
			$bghtml = 'background-color:'.htmlspecialchars($_POST[bg]).';';}
			else if(strpos($_POST[bg],'[xy]')!==false){$bghtml = 'background-image:url('.$images.htmlspecialchars($_POST[bg]).');';}
			else if($_POST[bg]){$bghtml = 'background-image:url('.$images.htmlspecialchars($_POST[bg]).');background-size:100%;background-repeat:repeat-y;';}
			else{$bghtml = '';} 
			
			if($_POST[hgtpop]){$hgtpop = '<div id="'.$pj.$ap.'hgts'.$pn.'pop" data-theme="z" data-role="popup" data-corners="false" data-transition="pop" style="'.$bghtml.'overflow-y:auto;padding:5px;height: 100%;width: 100%;top:0;left:-15px;" class="ifrwidthps" ><a href="#" data-rel="back" class="popn ui-btn ui-btn-z ui-btn-icon-notext ui-icon-delete"></a>'.$popup.'</div>';
			$hgtpopstyle = 'position:relative;';
			}

			
					
			if($_POST[hgt] and preg_match('/^[0-9]*$/',$_POST[hgt])){
				//$stuh = ';';
				$hgthtml = 'overflow-x:hidden;overflow-y:auto;';
				$hgthtmls = ' id="'.$pj.$ap.'hgt'.$pn.'"';
			
			
				if($_POST[hgts]){
					if($_POST[hgtpop])$hgtpopjs = '<a href="#'.$pj.$ap.'hgts'.$pn.'pop" style="position:absolute;top:0;left:1%" data-rel="popup" class="ui-btn ui-btn-z ui-btn-icon-notext ui-icon-popup"></a>';
					$hgtjs .= '$("#'.$pj.$ap.'hgt'.$pn.'").height(windowHeight*'.$_POST[hgt].'/100).append(\''.$hgtpopjs.'<a href="#" style="position:absolute;top:0;right:1%" id="'.$pj.$ap.'hgts'.$pn.'" data-pop="'.$pj.$ap.'hgt'.$pn.'" data-hgt="'.$_POST[hgt].'" data-vlu="" class="ui-btn ui-btn-z ui-btn-icon-notext ui-icon-carat-d"></a>\');hgt("'.$pj.$ap.'hgts'.$pn.'",'.$_POST[hgts].',windowHeight);';
				;}else{
					if($_POST[hgtpop])$hgtpopjs = '.append(\'<a href="#'.$pj.$ap.'hgts'.$pn.'pop" style="position:absolute;top:0;left:1%" data-rel="popup" class="ui-btn ui-btn-z ui-btn-icon-notext ui-icon-popup"></a>\')';
				$hgtjs .= '$("#'.$pj.$ap.'hgt'.$pn.'").height(windowHeight*'.$_POST[hgt].'/100)'.$hgtpopjs.';';			
				;}
				
			
			//if(document.URL.indexOf(\'http://\') === -1 || document.URL.indexOf(\'https://\') === -1)$("#hgt'.$ap.$pn.'").niceScroll({boxzoom:true,touchbehavior:true,bouncescroll:true});';
			//$hgtjs = ';if(window.devicePixelRatio !== undefined) {var  dpr = window.devicePixelRatio;}else{var  dpr = 1;};$("#hgt'.$ap.$pn.'").height($( window ).height()*dpr*'.$_POST[hgt].'/100);$("#hgt'.$ap.$pn.'").niceScroll({boxzoom:true,touchbehavior:true,bouncescroll:true});';
			}else{$hgthtml = '';$hgthtmls = '';$hgtjs = '';}
			
			if($_POST[hgtpop] and !$hgtpopjs)$hgtjs .= '$("#'.$pj.$ap.'hgt'.$pn.'").append(\'<a href="#'.$pj.$ap.'hgts'.$pn.'pop" style="position:absolute;top:0;left:1%" data-rel="popup" class="ui-btn ui-btn-z ui-btn-icon-notext ui-icon-popup"></a>\');';
			
			
			if($_POST[tbg]){
			if(strpos($_POST[tbg],'http://')!==false or strpos($_POST[tbg],'https://')!==false){$images = '';}else{$images = 'images/';}
			if(strlen($_POST[tbg])==1){$bghtm = '';$bgtheme = htmlspecialchars($_POST[tbg]);}		
			else if(strpos($_POST[tbg],'#')!==false or strpos($_POST[tbg],'rgba(')!==false  or strpos($_POST[tbg],'rgb(')!==false){$bghtm = 'background-color:'.htmlspecialchars($_POST[tbg]).';';}
			else if(strpos($_POST[tbg],'[xy]')!==false and $_POST[typ]!='divider'){$bghtm = 'background-image:url('.$images.htmlspecialchars($_POST[tbg]).');';}
			else{$bghtm = 'background-image:url('.$images.htmlspecialchars($_POST[tbg]).');background-size:100%;background-repeat:repeat-y;';}
			;}
			
			if($_POST[title]){
			if($bgtheme)$bar = ' ui-bar-'.$bgtheme;
			if($_POST[tclr])$tclr = 'color:'.htmlspecialchars($_POST[tclr]).';';
			if($tclr or $bghtm)$stylebghtm  = ' style="'.$tclr.$bghtm.'"';
			$titlehtml = '<h3 class="ui-bar'.$bar.'"'.$stylebghtm.'>'.htmlspecialchars($_POST[title]).'</h3>';
			;}
			
			if($_POST[bg] or $_POST[hgt]){
			if($_POST[hgt])$webkitm = ' webkitm';
			if($_POST[title]){$grid = 'ui-body';if($bgtheme)$grid = 'ui-body ui-body-'.$bgtheme;}else{$grid = 'ui-grid-solo';}
			if($bghtml or $hgthtml or $hgtpopstyle)$stuhhtm  = ' style="'.$bghtml.$hgthtml.$hgtpopstyle.'"';
			$bghtml = '<div class="'.$grid.$webkitm.'" '.$hgthtmls.$stuhhtm.'><!--editorbg!-->';
			$bghtmls = '<!--editorbg!--></div>';
			;}else if($_POST[hgtpop]){
				if($hgtpopstyle)$stuhhtm  = ' style="'.$hgtpopstyle.'"';		
			;}else{$bghtml = '';$bghtmls = '';}
			
			

		 	$data = '<!--data'.htmlspecialchars($_POST[title]).'@#@'.htmlspecialchars($_POST[tclr]).'@#@'.htmlspecialchars($_POST[tbg]).'@#@'.htmlspecialchars($_POST[bg]).'@#@'.htmlspecialchars($_POST[hgt]).'@#@'.htmlspecialchars($_POST[hgts]).'@#@'.htmlspecialchars($_POST[hgtpop]).'data!-->';
			
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
	
			$webpopup .= $html.'<!--part'.$pn.'!--><!--syseditorsys!-->'.$vnts.$data.$titlehtml.$bghtml.'<!--editorhtml!--><div style="padding-left:5px;padding-right:5px;"><!--edithtml!-->'.$popup.'<!--edithtml!--></div><!--editorhtmls!-->'.$popup.$bghtmls.$hgtpop.$vntsn.$tabnbgdatns.$htmls;
			$webpopup .= '</div><!--content!--></div><!--page!-->';
			
			
			$fpagtrns='../panel/'.$roww[pjnbr].'/'.$ap.'.html';
			file_put_contents($fpagtrns,$html.'<!--part'.$pn.'!--><!--syseditorsys!-->'.$vnts.$data.$titlehtml.$bghtml.'<!--editorhtml!--><div style="padding-left:5px;padding-right:5px;"><!--edithtml!-->'.$popup.'<!--edithtml!--></div><!--editorhtmls!-->'.$bghtmls.$hgtpop.$vntsn.$tabnbgdatns.$htmls);

			$fpagtrns='../panel/'.$roww[pjnbr].'/web'.$ap.'.html';
			file_put_contents($fpagtrns,$webpopup); 


	
			if(!file_exists('../panel/'.$roww[pjnbr].'/web'.$ap.'.js')){
			$fpagtrns='../panel/'.$roww[pjnbr].'/web'.$ap.'.js';
			$js = '/*$(document).on(\'pageshow\', \'#web'.$ap.'\', function(){*/';
			$js .= '/*});*/';
			file_put_contents($fpagtrns,$js);			
			;}
			
			if($hgtjs){
			$jsweb = file_get_contents('../panel/'.$roww[pjnbr].'/web'.$ap.'.js');
			$jswebhts = $jsweb;
				
				$jswebs=explode('/*webjs'.$pn.'*/',$jsweb);
				$jsweb = $jswebs[0].$jswebs[2];
				
				$js = '/*webjs'.$pn.'*/'
				.$hgtjs
				.'/*webjs'.$pn.'*/'
				.'/*});*/';
				$jsweb=str_replace('/*});*/',$js,$jsweb);
				file_put_contents('../panel/'.$roww[pjnbr].'/web'.$ap.'.js',$jsweb);
				
			;}	

			if(!file_exists('../panel/'.$roww[pjnbr].'/temp/'.$pn.'/'.$ap.'.html')){
				mkdir('../panel/'.$roww[pjnbr].'/temp');
				mkdir('../panel/'.$roww[pjnbr].'/temp/'.$pn);
				file_put_contents('../panel/'.$roww[pjnbr].'/temp/'.$pn.'/'.$ap.'.html',$hts);	
				file_put_contents('../panel/'.$roww[pjnbr].'/temp/'.$pn.'/web'.$ap.'.js',$jswebhts);			
			;}else{
				if(file_exists('../panel/'.$roww[pjnbr].'/temp/'.$pn.'/'.$ap.'[2].html')){
					rename('../panel/'.$roww[pjnbr].'/temp/'.$pn.'/'.$ap.'[2].html','../panel/'.$roww[pjnbr].'/temp/'.$pn.'/'.$ap.'[3].html');
					rename('../panel/'.$roww[pjnbr].'/temp/'.$pn.'/web'.$ap.'[2].js','../panel/'.$roww[pjnbr].'/temp/'.$pn.'/web'.$ap.'[3].js');

				}
				if(file_exists('../panel/'.$roww[pjnbr].'/temp/'.$pn.'/'.$ap.'[1].html')){
					rename('../panel/'.$roww[pjnbr].'/temp/'.$pn.'/'.$ap.'[1].html','../panel/'.$roww[pjnbr].'/temp/'.$pn.'/'.$ap.'[2].html');
					rename('../panel/'.$roww[pjnbr].'/temp/'.$pn.'/web'.$ap.'[1].js','../panel/'.$roww[pjnbr].'/temp/'.$pn.'/web'.$ap.'[2].js');
				}
				rename('../panel/'.$roww[pjnbr].'/temp/'.$pn.'/'.$ap.'.html','../panel/'.$roww[pjnbr].'/temp/'.$pn.'/'.$ap.'[1].html');
				rename('../panel/'.$roww[pjnbr].'/temp/'.$pn.'/web'.$ap.'.js','../panel/'.$roww[pjnbr].'/temp/'.$pn.'/web'.$ap.'[1].js');
				file_put_contents('../panel/'.$roww[pjnbr].'/temp/'.$pn.'/'.$ap.'.html',$hts);		
				file_put_contents('../panel/'.$roww[pjnbr].'/temp/'.$pn.'/web'.$ap.'.js',$jswebhts);		
			;}

	echo "<meta http-equiv='refresh' content='0;URL=editor.php?ap=".htmlspecialchars($roww[ap])."&pj=".htmlspecialchars($roww[pjnbr])."&pn=".htmlspecialchars($pn)."'>";


;}

?>
