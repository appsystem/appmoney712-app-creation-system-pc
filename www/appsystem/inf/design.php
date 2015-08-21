<?php session_start();  
 
define("ROOTPATH", "../");
include_once (ROOTPATH.'administration/db_conn.php');
if($_GET[v]==PRC)$_SESSION[tn]=PRC;
if($_GET[v]==EN)$_SESSION[tn]=EN;
if(!$_GET[v])$_SESSION[tn]='';
$_SESSION[tutorial]='';
?>  
<!DOCTYPE html> 
	<html> 
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style">
	<title></title>
	<link rel="stylesheet" href="../css/jquerymobile-1.4.4.min.css">
	<link rel="stylesheet" href="../css/jquery.mobile-1.4.4.min.css">
	<link rel="stylesheet" href="../css/appsystem.css">		
	<link rel="shortcut icon" href="favicon.ico">
	<!--wettopbr--><style type="text/css">
	</style><!--copyiframes-->
	<script src="../js/jquery.js"></script>
	<script src="../js/jquery.mobile-1.4.4.min.js"></script>
	<!--copyiframe--><!--copyiframes-->
	<?php 
	if($_GET['next']){
	$_SESSION[tutorial]=1;
	if($_SESSION[tutorial]){
	 echo '<script>
	  setTimeout(function(){$("#pjt").popup("open");},350);
	  setTimeout(function(){	
	 $("#pjt").popup("close").one( "popupafterclose", function( event, ui ){
	 	$("#nextpage").popup("open");
	 });
	 ;},1500);
	  setTimeout(function(){window.location = "menudesign.php";},3500);
	 </script>';
	;}
	}
    ?>
	</head>
	<body><div data-role="page" data-theme="f" class="page indexhtml" style="background-image:url(../images/ux.jpg);background-size:100%;background-repeat:repeat-y;color:black;">
	<div  data-role="header" id="hrdiv" data-theme="f"><h1 id="hrs"><?php if($_SESSION[tn]==PRC){echo '应用设计 - AppMoney712 移动应用设计系统';}else if($_SESSION[tn]==EN){echo 'APP design - AppMoney712 APP Creation System';}else{echo '應用設計 - AppMoney712 移動應用設計系統';}?></h1><a href="#navigations" id="menubttns"  data-rel="popup" data-transition="pop" class="ui-btn-left ui-btn ui-btn-inline ui-corner-all ui-btn-icon-left ui-icon-bars">&nbsp;&nbsp;&nbsp;</a>
	</div><!-- /header --><div  class="ui-content pagebg"><!--copyiframe--><!-- /content!-->
	<a href="design.php?v=PRC" data-ajax="false" class="ui-btn ui-btn-w ui-btn-inline ui-corner-all ui-mini" style="color:black;">简</a>
	<a href="design.php?v=EN" data-ajax="false" class="ui-btn ui-btn-w ui-btn-inline ui-corner-all ui-mini" style="color:black;"><?php if($_SESSION[tn]==PRC){echo '英';}else if($_SESSION[tn]==EN){echo 'EN';}else{echo 'EN';}?></a>
	<a href="design.php" data-ajax="false" class="ui-btn ui-btn-w ui-btn-inline ui-corner-all ui-mini" style="color:black;">繁</a>
	<HR>
	
	
	<b><?php if($_SESSION[tn]==PRC){echo '应用设计步骤';}else if($_SESSION[tn]==EN){echo 'APP design steps';}else{echo '應用設計步驟';}?></b>
	<div data-role="listview" data-inset="true">
    <li data-icon="edit"><a href="#pjt" class="ui-btn ui-btn-y" data-rel="popup" data-transition="pop" style="background-color:rgba(255,193,203,0.8);color:rgb(105,105,105);"><?php if($_SESSION[tn]==PRC){echo '应用菜单设计';}else if($_SESSION[tn]==EN){echo 'APP menu design';}else{echo '應用菜單設計';}?></a></li>
	<li data-icon="edit"><a href="#functionpage" class="ui-btn ui-btn-y" data-rel="popup" data-transition="pop" style="background-color:rgba(240,230,140,0.8);color:red;"><?php if($_SESSION[tn]==PRC){echo '应用页创建';}else if($_SESSION[tn]==EN){echo 'APP page design';}else{echo '應用頁創建';}?></a></li>
	<li data-icon="edit"><a href="#app" class="ui-btn ui-btn-y" data-rel="popup" data-transition="pop" style="color:black;"><?php if($_SESSION[tn]==PRC){echo '应用档案产生';}else if($_SESSION[tn]==EN){echo 'APP file creation';}else{echo '應用檔案產生';}?></a></li>
	</div>
	<HR>
	<a href="project.php" data-ajax="false" class="ui-btn ui-btn-w ui-btn-inline ui-corner-all ui-mini ui-btn-icon-left ui-icon-bars" style="color:black;"><?php if($_SESSION[tn]==PRC){echo '专案管理';}else if($_SESSION[tn]==EN){echo 'Project Management';}else{echo '專案管理';}?></a>
	<HR>
	
	<a href="#quick" data-rel="popup" data-transition="pop" class="ui-btn ui-btn-w ui-btn-inline ui-corner-all ui-mini ui-btn-icon-left ui-icon-info" style="color:black;"><?php if($_SESSION[tn]==PRC){echo '快速试用';}else if($_SESSION[tn]==EN){echo 'Quick try';}else{echo '快速試用';}?></a>
	
	<div data-role="popup" id="quick" style="min-width:300px" data-theme="f"><a href="#" class="ui-btn ui-corner-all ui-icon-delete ui-btn-icon-notext ui-btn-right" data-rel="back"></a>	
	
	<p style="color:pink"><b><?php if($_SESSION[tn]==PRC){echo '教程方法';}else if($_SESSION[tn]==EN){echo 'Tutorial method';}else{echo '教程方法';}?></b>
	<a href="#" id="Tutorial" class="ui-btn ui-btn-f ui-btn-inline ui-corner-all ui-mini" style="color:black;"><?php if($_SESSION[tn]==PRC){echo '开始';}else if($_SESSION[tn]==EN){echo 'Start';}else{echo '開始';}?></a></p>	
	<p>
	<?php if($_SESSION[tn]==PRC){echo '注:当点撀开始,您须关闭此浏览器才能取消此教程模式,才能正式使用。';}else if($_SESSION[tn]==EN){echo 'Remark : You need to close your web browser to turn off the tutorial mode and start your design work in design mode after clicking the above tutorial \'Start\' button.';}else{echo '註:當點撀開始,您須關閉此瀏覽器才能取消此教程模式,才能正式使用。';}?>
	</p>
	<hr>
	<h4 style="color:pink"><?php if($_SESSION[tn]==PRC){echo '人手方法';}else if($_SESSION[tn]==EN){echo 'Manual method';}else{echo '人手方法';}?></h4>
	<h4 style="color:black"><?php if($_SESSION[tn]==PRC){echo '创建试用专案';}else if($_SESSION[tn]==EN){echo 'Quick try project';}else{echo '創建試用專案';}?></h4>
	<p>
	<?php if($_SESSION[tn]==PRC){echo '点撀\'菜单设计\'及\'编制新专案\',到新专案编辑页,再填\'专案称\'並送交。';}else if($_SESSION[tn]==EN){echo 'You need to click the \'APP menu design\' and the \'Create New Project\'. You need to fill in the \'Project name\' on the New Project editing page and click the SEND button.';}else{echo '點撀\'菜單設計\'及\'編制新專案\',到新專案編輯頁,再填\'專案稱\'並送交。';}?>
	</p>
	<h4 style="color:black"><?php if($_SESSION[tn]==PRC){echo '快速试用指引';}else if($_SESSION[tn]==EN){echo 'Quick try instruction';}else{echo '快速試用指引';}?></h4>	
	<p>
	<?php if($_SESSION[tn]==PRC){echo '再返到此页,点撀\'应用页创建\'及\'应用页\',到应用页编辑页,再按该页的快速试用指引。';}else if($_SESSION[tn]==EN){echo 'After project creation, please return to this page. You need to click the \'APP page design\' and the \'APP page\' to go to APP page editing page and follow the Quick try instruction on the page.';}else{echo '再返到此頁,點撀\'應用頁創建\'及\'應用頁\',到應用頁編輯頁,再按該頁的快速試用指引。';}?>
	</p>
	<h4 style="color:black"><?php if($_SESSION[tn]==PRC){echo '菜单设计草稿';}else if($_SESSION[tn]==EN){echo 'APP menu design';}else{echo '菜單設計草稿';}?></h4>	
	<p>
	<?php if($_SESSION[tn]==PRC){echo '您亦能先编写应用的导航菜单草稿,点撀此页的\'菜单设计\',显示popup,再在popup内点撀\'编制新专案\' [只有此按钮或在列表上首个]。';}else if($_SESSION[tn]==EN){echo 'You can draft the APP menu before creating APP page. You need to click the \'APP menu design\' on this page to show a popup which you need to click the \'Create New Project\' button.';}else{echo '您亦能先編寫應用的導航菜單草稿,點撀此頁的\'菜單設計\',顯示popup,再在popup內點撀\'編制新專案\' [只有此按鈕或在列表上首個]。';}?>
	</p>
	</div>
	
	
	
	<div data-role="popup" id="Tutorialpopup" style="min-width:300px" data-theme="f"><a href="#" class="ui-btn ui-corner-all ui-icon-delete ui-btn-icon-notext ui-btn-right" data-rel="back"></a>	
	<br><br>
	<h4 style="color:pink"><?php if($_SESSION[tn]==PRC){echo '创建专案';}else if($_SESSION[tn]==EN){echo 'Create project';}else{echo '創建專案';}?></h4>	
	<p style="color:black"><?php if($_SESSION[tn]==PRC){echo '点撀此页的\'菜单设计\',显示popup,再在popup内点撀\'编制新专案\' [只有此按钮或在列表上首个]。';}else if($_SESSION[tn]==EN){echo 'You need to click the \'APP menu design\' on this page to show a popup which you need to click the \'Create New Project\' button [only this button or on the top of button list].';}else{echo '點撀此頁的\'菜單設計\',顯示popup,再在popup內點撀\'編制新專案\' [只有此按鈕或在列表上首個]。';}?></p>
	<p><a href="design.php?next=1" data-ajax="false" class="ui-btn ui-btn-f ui-btn-inline ui-corner-all ui-mini" style="color:black;"><?php if($_SESSION[tn]==PRC){echo '下一步';}else if($_SESSION[tn]==EN){echo 'Next';}else{echo '下一步';}?></a></p>	
	</div>
	
	<div data-role="popup" id="nextpage" style="min-width:300px" data-theme="f"><a href="#" class="ui-btn ui-corner-all ui-icon-delete ui-btn-icon-notext ui-btn-right" data-rel="back"></a>	
	<br><br>
	<p style="color:black"><?php if($_SESSION[tn]==PRC){echo '将自动到新专案编辑页。';}else if($_SESSION[tn]==EN){echo 'Will go to New Project editing page automatically.';}else{echo '將自動到新專案編輯頁。';}?></p>	
	</div>
	
	<a href="#step" data-rel="popup" data-transition="pop" class="ui-btn ui-btn-w ui-btn-inline ui-corner-all ui-mini ui-btn-icon-left ui-icon-info" style="color:black;"><?php if($_SESSION[tn]==PRC){echo '步骤';}else if($_SESSION[tn]==EN){echo 'Step';}else{echo '步驟';}?></a>
	
	<div data-role="popup" id="step" style="min-width:300px" data-theme="f"><a href="#" class="ui-btn ui-corner-all ui-icon-delete ui-btn-icon-notext ui-btn-right" data-rel="back"></a>	
	<h4 style="color:black"><?php if($_SESSION[tn]==PRC){echo '设计步骤:';}else if($_SESSION[tn]==EN){echo 'Design steps:';}else{echo '設計步驟:';}?></h4>
	<p>
	<?php if($_SESSION[tn]==PRC){echo '设计您的应用菜单草稿,再设计相关的应用页,将应用页链结加至菜单。当完成设计,将应用产生成应用档案。';}else if($_SESSION[tn]==EN){echo 'You need to draft your APP\'s menu and then design related APP pages. You need to add APP page\'s links to the menu. After APP design finishing, you need to create the APP file.';}else{echo '設計您的應用菜單草稿,再設計相關的應用頁,將應用頁鏈結加至菜單。當完成設計,將應用產生成應用檔案。';}?>
	</p>
	<hr>
	<h4 style="color:black"><?php if($_SESSION[tn]==PRC){echo '应用菜单:';}else if($_SESSION[tn]==EN){echo 'APP menu:';}else{echo '應用菜單:';}?></h4>	
	<p>
	<?php if($_SESSION[tn]==PRC){echo '应用菜单作用是应用页导航,供用户点撀令应用内容显示特定应用页。';}else if($_SESSION[tn]==EN){echo 'The APP menu is used as APP page navigation which APP user can click on the menu buttons to browse APP pages.';}else{echo '應用菜單作用是應用頁導航,供用戶點撀令應用內容顯示特定應用頁。';}?>
	</p>
	</div>
	<a href="#project" data-rel="popup" data-transition="pop" class="ui-btn ui-btn-w ui-btn-inline ui-corner-all ui-mini ui-btn-icon-left ui-icon-info" style="color:black;"><?php if($_SESSION[tn]==PRC){echo '解释';}else if($_SESSION[tn]==EN){echo 'Explanation';}else{echo '解釋';}?></a>
	<div data-role="popup" id="project" style="min-width:300px" data-theme="f"><a href="#" class="ui-btn ui-corner-all ui-icon-delete ui-btn-icon-notext ui-btn-right" data-rel="back"></a>

	<h4 style="color:black"><?php if($_SESSION[tn]==PRC){echo '专案';}else if($_SESSION[tn]==EN){echo 'Project';}else{echo '專案';}?></h4>
	<p>
	<?php if($_SESSION[tn]==PRC){echo '在此软件,专案是一个应用设计。';}else if($_SESSION[tn]==EN){echo 'In this software, a project is an APP design.';}else{echo '在此軟件,專案是一個應用設計,您須創建專案。';}?>
	</p>
	<HR>
	<h4 style="color:black"><?php if($_SESSION[tn]==PRC){echo '菜单';}else if($_SESSION[tn]==EN){echo 'Menu';}else{echo '菜單';}?></h4>
	<p><?php if($_SESSION[tn]==PRC){echo '若设计多於一页,您须设计应用的导航菜单,菜单的作用是供应用用户导航浏览您设计的应用页。';}else if($_SESSION[tn]==EN){echo 'You need to design APP menu for APP user to browse APP pages of your design if your APP design more than one page.';}else{echo '若設計多於一頁,您須設計應用的導航菜單,菜單的作用是供應用用戶導航瀏覽您設計的應用頁。';}?></p>
	<HR>
	<h4 style="color:black"><?php if($_SESSION[tn]==PRC){echo '应用页';}else if($_SESSION[tn]==EN){echo 'APP page';}else{echo '應用頁';}?></h4>
	<p><?php if($_SESSION[tn]==PRC){echo '一个应用能有多个应用页,应用页内容能含多个功能,e.g.日历。';}else if($_SESSION[tn]==EN){echo 'It is APP page of your design. You can add different functional content to an APP page. e.g. calendar';}else{echo '一個應用能有多個應用頁,應用頁內容能含多個功能,e.g.日曆。';}?></p>
	<HR>
	<h4 style="color:black"><?php if($_SESSION[tn]==PRC){echo '应用档案';}else if($_SESSION[tn]==EN){echo 'APP file';}else{echo '應用檔案';}?></h4>
	<p><?php if($_SESSION[tn]==PRC){echo '此软件的功能能将所需的档案集合到一个档夹内,用作产生应用档案。';}else if($_SESSION[tn]==EN){echo 'You need to use this software to convert your APP design files to an APP folder which contains the necessary files for creating APP.';}else{echo '此軟件的功能能將所需的檔案集合到一個檔夾內,用作產生應用檔案。';}?>
	</p>
	<HR>
	<h4 style="color:black"><?php if($_SESSION[tn]==PRC){echo '应用用户协议';}else if($_SESSION[tn]==EN){echo 'APP Agreement';}else{echo '應用用戶協議';}?></h4>
	<p><?php if($_SESSION[tn]==PRC){echo '您能在您的设计上加用户协议,用户点选确认才能首次启用。当您巳创建专案,点撀此页的\'应用页\',点撀\'应用用户协议\',再点撀\'编写应用用户协议\',才能对此专案创建协议。';}else if($_SESSION[tn]==EN){echo 'You can add \'APP Agreement\' to your design. APP user needs to accept your terms to lanuch first usage of your APP. You can edit it after project creation. You need to click the \'APP page\' on this page and click the APP Agreement. Then you need to click the related project and start to edit its agreement.';}else{echo '您能在您的設計上加用戶協議,用戶點選確認才能首次啟用。當您巳創建專案,點撀此頁的\'應用頁\',點撀\'應用用戶協議\',再點撀\'編寫應用用戶協議\',才能對此專案創建協議。';}?>
	</p>
	</div>
	

	

	
	<!--<a href="functions.html" target="_blank" class="ui-btn ui-btn-w ui-btn-inline ui-corner-all ui-mini ui-btn-icon-left ui-icon-info"><?php if($_SESSION[tn]==PRC){echo '功能页例';}else if($_SESSION[tn]==EN){echo 'APP Page example';}else{echo '功能頁例';}?></a>
	<div data-role="popup" id="functions" style="min-width:300px" data-theme="f"><a href="#" class="ui-btn ui-corner-all ui-icon-delete ui-btn-icon-notext ui-btn-right" data-rel="back"></a>

	
	</div>!-->

	<div data-role="popup" id="pjt" data-theme="w" class="ifrwidthp"><a href="#" style="z-index:1" class="popn ui-btn ui-btn-z ui-icon-delete ui-btn-icon-notext" data-rel="back"></a>
<BR><BR>
	<ul data-role="listview" style="overflow-y:auto;max-height:500px;min-width:500px;"  data-theme="f" data-corners="false" data-inset="true">
	<li><a href="menudesign.php" data-ajax="false" class="ui-btn ui-btn ui-mini ui-btn-icon-left ui-icon-edit"><?php if($_SESSION[tn]==PRC){echo '编制新专案';}else if($_SESSION[tn]==EN){echo 'Create New Project';}else{echo '編制新專案';}?></a></li>
	<?php 	$sql=$db->query("select * from webpj order by nbr desc");
	if($sql){
	while($row=$sql->fetch()){
	if($row[hidden]!=5){
	echo '<li><a href="menudesign.php?pj='.$row[cno].'"  style="white-space:normal;" data-ajax="false" class="ui-btn ui-btn ui-mini ui-btn-icon-left ui-icon-edit">['.htmlspecialchars($row[date]).'] '.htmlspecialchars($row[title]).'</a></li>';
	;}
	;};}?>
	</ul>
	</div>
	
	
	<div data-role="popup" id="app"><a href="#" class="ui-btn ui-corner-all ui-icon-delete ui-btn-icon-notext ui-btn-right" data-rel="back"></a>
	<div style="overflow-y:auto;max-height:500px;" >
	<ul data-role="listview" style="min-width:500px;" data-inset="true" data-corners="false">
	<?php 	$sql=$db->query("select * from webpj order by nbr desc");
	if($sql){
	while($row=$sql->fetch()){
	$i=1;
	if($row[hidden]!=5){
	echo '<li><a href="app.php?pj='.$row[cno].'" style="white-space:normal;" data-ajax="false" class="ui-btn ui-mini ui-btn-icon-left ui-icon-edit">['.htmlspecialchars($row[date]).'] '.htmlspecialchars($row[title]).'</a></li>';
	;}else{echo '<li><a href="#" class="ui-btn ui-mini ui-btn-icon-left ui-icon-info">';
	if($_SESSION[tn]==PRC){echo '未有合用专案';}else if($_SESSION[tn]==EN){echo 'No project available';}else{echo '未有合用專案';}
	echo '</a></li>';}
	;};}?>
	<?php if(!$i){echo '<li><a href="#" class="ui-btn ui-mini ui-btn-icon-left ui-icon-info">';
	if($_SESSION[tn]==PRC){echo '未有专案';}else if($_SESSION[tn]==EN){echo 'No project found.';}else{echo '未有專案';}
	echo '</a></li>';}	?>
	</ul>
	
	</div>
	</div>

	<div data-role="popup" id="functionpage" data-corners="false">
	<ul data-role="listview" data-inset="true" data-corners="false">
    <li data-icon="edit"><a href="webpage.php" data-ajax="false"><?php if($_SESSION[tn]==PRC){echo '应用页';}else if($_SESSION[tn]==EN){echo 'APP page';}else{echo '應用頁';}?></a></li>
    <li data-icon="edit"><a href="#" class="webpagephps ui-btn ui-btn-b" data-ajax="false"><?php if($_SESSION[tn]==PRC){echo '日历';}else if($_SESSION[tn]==EN){echo 'Calendar';}else{echo '日曆';}?></a></li>
    <li data-icon="edit"><a href="#" class="webpagephps ui-btn ui-btn-b" data-ajax="false"><?php if($_SESSION[tn]==PRC){echo '表格';}else if($_SESSION[tn]==EN){echo 'Form';}else{echo '表格';}?></a></li>
    <li data-icon="edit"><a href="#" class="webpagephps ui-btn ui-btn-b" data-ajax="false"><?php if($_SESSION[tn]==PRC){echo 'QR码';}else if($_SESSION[tn]==EN){echo 'QR Code';}else{echo 'QR碼';}?></a></li>
    <li data-icon="edit"><a href="#" class="webpagephps ui-btn ui-btn-b" data-ajax="false"><?php if($_SESSION[tn]==PRC){echo '游戏';}else if($_SESSION[tn]==EN){echo 'Playground';}else{echo '遊戲';}?></a></li>
    <li data-icon="edit"><a href="#" class="webpagephps ui-btn ui-btn-b" data-ajax="false"><?php if($_SESSION[tn]==PRC){echo '音频/视频';}else if($_SESSION[tn]==EN){echo 'Audio/Video';}else{echo '音頻/視頻';}?></a></li>
    <li data-icon="edit"><a href="#" class="webpagephps ui-btn ui-btn-b" data-ajax="false"><?php if($_SESSION[tn]==PRC){echo '相簿';}else if($_SESSION[tn]==EN){echo 'Album';}else{echo '相簿';}?></a></li>
    <li data-icon="edit"><a href="#" class="webpagephps ui-btn ui-btn-b" data-ajax="false"><?php if($_SESSION[tn]==PRC){echo '相介';}else if($_SESSION[tn]==EN){echo 'Poster';}else{echo '相介';}?></a></li>
	<li data-icon="edit"><a href="#" class="webpagephps ui-btn ui-btn-b" data-ajax="false"><?php if($_SESSION[tn]==PRC){echo '文字';}else if($_SESSION[tn]==EN){echo 'Editor';}else{echo '文字';}?></a></li>
	<li data-icon="edit"><a href="#" class="webpagephps ui-btn ui-btn-b" data-ajax="false"><?php if($_SESSION[tn]==PRC){echo '画布';}else if($_SESSION[tn]==EN){echo 'Drawer';}else{echo '畫布';}?></a></li>
    <li data-icon="edit"><a href="#" id="agree"><?php if($_SESSION[tn]==PRC){echo '应用用户协议';}else if($_SESSION[tn]==EN){echo 'APP Agreement';}else{echo '應用用戶協議';}?></a></li></ul>
 
	</div>
	
	<div data-role="popup" id="agreephp" style="background-color:rgba(125,125,125,0.5);max-height:500px; overflow-y:auto;">
	<ul data-role="listview" data-inset="true">
	 <li data-role="divider" style="background-color:rgba(125,125,125,0.5);color:pink; font-weight:bold;"><?php if($_SESSION[tn]==PRC){echo '编写应用用户协议';}else if($_SESSION[tn]==EN){echo 'Editing APP Agreement';}else{echo '編寫應用用戶協議';}?></li>
	<?php 
	$sql=$db->query("select * from webpj order by nbr desc");
	if($sql){
	while($row=$sql->fetch()){
	if($row[hidden]!=5){	
	echo '<li data-icon="edit"><a href="agree.php?pj='.$row[cno].'" data-ajax="false" class="ui-btn ui-btn-a ui-mini ui-btn-icon-left ui-icon-edit"> ['.htmlspecialchars($row[cno]).'] ['.htmlspecialchars($row[date]).'] '.htmlspecialchars($row[title]).'</a></li>';
	;}
	;}
	;}
	?>
	</ul>
	</div>
	
	<div data-role="popup" id="webpagephp" style="background-color:rgba(125,125,125,0.5);max-height:500px; overflow-y:auto;">
	<ul data-role="listview" data-inset="true">
	 <li data-role="divider" style="background-color:rgba(125,125,125,0.5);color:pink; font-weight:bold;"><?php if($_SESSION[tn]==PRC){echo '编写应用页';}else if($_SESSION[tn]==EN){echo 'Editing APP page';}else{echo '編寫應用頁';}?></li>
	<?php 
	$sql=$db->query("select * from webpj order by nbr desc");
	if($sql){
	while($row=$sql->fetch()){
	if($row[hidden]!=5){	
	echo '<li data-icon="edit"><a href="webpage.php?pj='.$row[cno].'" data-ajax="false" class="ui-btn ui-btn-a ui-mini ui-btn-icon-left ui-icon-edit"> ['.htmlspecialchars($row[cno]).'] ['.htmlspecialchars($row[date]).'] '.htmlspecialchars($row[title]).'</a></li>';
	;}
	;}
	;}
	?>
	</ul>
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
	</div><!-- /content -->
	</div><!-- /page -->
	
   

 

 	
</body>
</html>
	<script src="../js/appsystem.js"></script>	
	
	<script>
	$('#Tutorial').click(function (event){event.preventDefault();
		$('#quick').popup('close').one( "popupafterclose", function( event, ui ){$('#Tutorialpopup').popup('open',"transition","pop");});
	});
	
	$('#agree').click(function (event){event.preventDefault();
		$('#functionpage').popup('close').one( "popupafterclose", function( event, ui ){$('#agreephp').popup('open');});
	});
	
	$('.webpagephps').click(function (event){event.preventDefault();
		$('#functionpage').popup('close').one( "popupafterclose", function( event, ui ){$('#webpagephp').popup('open');});
	});
	
	
	</script>
