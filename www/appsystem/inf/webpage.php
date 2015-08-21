<?php session_start();             
error_reporting(0); 

if($_GET[pj] and !preg_match('/^[0-9]*$/',$_GET[pj]))exit;
if($_GET[pj])$pj = $_GET[pj];
if($_GET[ap] and !preg_match('/^[0-9]*$/',$_GET[ap]))exit;
if($_GET[ap])$ap = $_GET[ap];

define("ROOTPATH", "../");
include_once (ROOTPATH.'administration/db_conn.php');

	$sqlw=$db->query("select * from webhtml where cno='$ap'");
	if($sqlw)$roww=$sqlw->fetch();
		
	if($roww[pjn]){
		if($roww[apn] and !preg_match('/^[0-9]*$/',$roww[apn]))exit;
		$apvlu = $roww[apn];
	;}else{
		$apvlu = $roww[ap];		
	;}
?>     
<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php if($_SESSION[tn]==PRC){echo 'AppMoney712 移动应用设计系统';}else if($_SESSION[tn]==EN){echo 'AppMoney712 APP Creation System';}else{echo 'AppMoney712 移動應用設計系統';}?></title>
	<link href="../css/bootstrap.css" rel="stylesheet">
	<link href="../css/jquery.mobile-1.4.4.min.css" rel="stylesheet">
	<link href="../css/jquerymobile-1.4.4.min.css" rel="stylesheet">
	
	<link rel="stylesheet" href="../jscss/ifrpi.css">
	<link rel="stylesheet" href="../jscss/swiper.min.css"> 
	<link rel="stylesheet" href="../jscss/calendar.css">
	<link rel="stylesheet" href="../jscss/gridlistview.css">
	
	<link rel="stylesheet" href="../css/icons/style.css">
	<link rel="stylesheet" href="../css/appsystem.css">	
	
	<!--wettopbr--><style type="text/css">
	.ui-icon-nbr:after{background-image: url("../css/images/nbr.svg");}
	.ui-icon-pigpaper:after{background-image: url("../css/images/pigpaper.svg");}
	.ui-icon-qr:after{background-image: url("../css/images/qr.svg");}
	.ui-icon-pausesound:after{background-image: url("../css/images/[pause]sound.svg");}
	.ui-icon-sound:after{background-image: url("../css/images/sound.svg");}
	.ui-icon-popup:after{background-image: url("../css/images/popup.svg");}
	</style><!--copyiframes-->
	<script src="../js/jquery.js"></script>
	<script src="../js/jquery.mobile-1.4.4.min.js"></script>
	<script src="../js/swiper.jquery.min.js"></script>
	<script src="../js/ifrpics.js"></script>
	<script src="../js/fastbtn.js"></script>
	<script src="../js/calendar.js"></script>
	<script src="../js/gt.js"></script>
	<script src="../js/video.js"></script>
	<script src="../js/webaudio.js"></script>
	<script src="../js/jquery.qrcode.min.js"></script><script src="../js/qr.js"></script>
	<script src="../js/form.js"></script>
	<script src="../js/playground.js"></script>
	<script src="../js/dw.js"></script><script src="../js/playlist.js"></script>
	<script src="../js/popupics.js"></script><script src="../js/jquery.nicescroll.min.js"></script>
	<script src="../js/gridpic.js"></script>
	<script src="../js/tabs.js"></script>
	<script src="../js/jquery.nest.js"></script>
	<?php 
	if($_SESSION[tutorial]){
	 echo '<script>
	  setTimeout(function(){$("#appcreate").popup("open");},350);
	 </script>';
	;}
	?>

</head>
<body>

<div data-role="page" data-theme="b"  id="appageone" style="background-color:white;color:black">
	<div style="overflow: hidden;" data-role="header" data-theme="f">
	<a href="#navigations"  id="menubttn"  data-rel="popup" data-transition="pop" class="ui-btn ui-btn ui-btn-inline ui-corner-all ui-btn-icon-left ui-icon-bars"><?php if($_SESSION[tn]==PRC){echo '目录';}else if($_SESSION[tn]==EN){echo 'Menu';}else{echo '目錄';}?></a>
    <h1><?php if($_SESSION[tn]==PRC){echo 'AppMoney712 移动应用设计系统';}else if($_SESSION[tn]==EN){echo 'AppMoney712 APP Creation System';}else{echo 'AppMoney712 移動應用設計系統';}?></h1>
	<a href="#proj"    data-rel="popup" data-transition="pop" class="ui-btn ui-btn ui-btn-inline ui-corner-all ui-btn-icon-left ui-icon-bars"><?php if($_SESSION[tn]==PRC){echo '专案';}else if($_SESSION[tn]==EN){echo 'Project';}else{echo '專案';}?></a>
	</div><!-- /header -->
	<div data-role="popup" id="proj">
	<ul data-role="listview" data-corners="false" style="max-height:500px; overflow-y:auto;" data-inset="true">
	<?php 
	$sql=$db->query("select * from webpj order by nbr desc");
	if($sql){
	while($row=$sql->fetch()){
	if($row[hidden]!=5){
	echo '<li><a href="webpage.php?pj='.$row[cno].'" data-ajax="false" class="ui-btn ui-mini ui-btn-icon-left ui-icon-edit">['.htmlspecialchars($row[date]).'] '.htmlspecialchars($row[title]).'</a></li>';
	if($row[cno]==$pj){$pjnm = $row[title];$pjnmdate = $row['date'];}
	;};};}
	?>
	</ul>
	</div>
	
	<div data-role="content">
	<a href="#pjt" data-rel="popup" data-transition="pop" class="ui-btn ui-btn-inline ui-corner-all ui-mini ui-btn-icon-left ui-icon-edit"><?php if($_SESSION[tn]==PRC){echo '应用页列表';}else if($_SESSION[tn]==EN){echo 'APP Page List';}else{echo '應用頁列表';}?></a>
	
	<?php if($ap){?>
	<a href="#view" data-rel="popup" data-transition="pop" class="ui-btn ui-btn-inline ui-corner-all ui-mini ui-btn-icon-left ui-icon-search"><?php if($_SESSION[tn]==PRC){echo '预览';}else if($_SESSION[tn]==EN){echo 'Preview';}else{echo '預覽';}?></a>
		
	<div data-role="popup" id="view">
	<ul data-role="listview" data-corners="false" data-inset="true">
	<li><a href="view.php?pj=<?php echo htmlspecialchars($roww[pjnbr])?>&ap=<?php echo htmlspecialchars($roww[ap])?>&vw=ap" data-ajax="false" target="_blank" class="ui-btn ui-btn-inline ui-mini ui-btn-icon-left ui-icon-search"><?php if($_SESSION[tn]==PRC){echo '预览应用页内容形式';}else if($_SESSION[tn]==EN){echo 'Page content of APP style[Preview]';}else{echo '預覽應用頁內容形式';}?></a></li>
	<li><a href="view.php?pj=<?php echo htmlspecialchars($roww[pjnbr])?>&ap=<?php echo htmlspecialchars($roww[ap])?>&vw=ap&ts=1" data-ajax="false" target="_blank" class="ui-btn ui-btn-inline ui-mini ui-btn-icon-left ui-icon-search"><?php if($_SESSION[tn]==PRC){echo '预览应用页内容形式';}else if($_SESSION[tn]==EN){echo 'Page content of APP style[Preview]';}else{echo '預覽應用頁內容形式';}?><?php if($_SESSION[tn]==PRC){echo '[触控式] [使用webkit型浏览器]';}else if($_SESSION[tn]==EN){echo '[Touch screen] [using any webkit browser]';}else{echo '[觸控式] [使用webkit型瀏覽器]';}?></a></li>
	<li><a href="viewp.php?pj=<?php echo htmlspecialchars($roww[pjnbr])?>&ap=<?php echo htmlspecialchars($roww[ap])?>" data-ajax="false" target="_blank" class="ui-btn ui-btn-inline ui-mini ui-btn-icon-left ui-icon-search"><?php if($_SESSION[tn]==PRC){echo '预览popup形式';}else if($_SESSION[tn]==EN){echo 'content of popup style[Preview]';}else{echo '預覽popup形式';}?></a></li>
	<li><a href="viewp.php?pj=<?php echo htmlspecialchars($roww[pjnbr])?>&ap=<?php echo htmlspecialchars($roww[ap])?>&ts=1" data-ajax="false" target="_blank" class="ui-btn ui-btn-inline ui-mini ui-btn-icon-left ui-icon-search"><?php if($_SESSION[tn]==PRC){echo '预览popup形式';}else if($_SESSION[tn]==EN){echo 'content of popup style[Preview]';}else{echo '預覽popup形式';}?><?php if($_SESSION[tn]==PRC){echo '[触控式] [使用webkit型浏览器]';}else if($_SESSION[tn]==EN){echo '[Touch screen] [using any webkit browser]';}else{echo '[觸控式] [使用webkit型瀏覽器]';}?></a></li>
	<!--<li><a href="view.php?pj=<?php echo htmlspecialchars($roww[pjnbr])?>&ap=<?php echo htmlspecialchars($roww[ap])?>&vw=s" data-ajax="false" target="_blank" class="ui-btn ui-btn-inline ui-mini ui-btn-icon-left ui-icon-search"><?php if($_SESSION[tn]==PRC){echo '预览單頁形式';}else if($_SESSION[tn]==EN){echo 'single page style[Preview]';}else{echo '預覽單頁形式';}?></a></li>!-->
	</ul>
	</div>
	
		
	<a href="menudesign.php?pj=<?php echo htmlspecialchars($roww[pjnbr])?>&ap=<?php echo $ap?>&php=webpage&plt=1" data-ajax="false" class="ui-btn ui-btn ui-btn-inline ui-corner-all ui-mini ui-btn-icon-left ui-icon-bars"><?php if($_SESSION[tn]==PRC){echo '专案应用页列表';}else if($_SESSION[tn]==EN){echo 'Project Page List';}else{echo '專案應用頁列表';}?></a>
	<?php ;}?>
	
	
	
	<a href="#pjscopy" data-rel="popup" data-transition="pop" class="ui-btn ui-btn ui-btn-inline ui-corner-all ui-mini" style="color:blue;">? <?php if($_SESSION[tn]==PRC){echo '复制页';}else if($_SESSION[tn]==EN){echo 'Copy Page';}else{echo '複製頁';}?></a>
	<div data-role="popup" id="pjscopy" style="min-width:300px" data-theme="f"><a href="#" class="popn ui-btn ui-btn-z ui-corner-all ui-icon-delete ui-btn-icon-notext" data-rel="back"></a>
	<br><br>
	<p>
	<?php if($_SESSION[tn]==PRC){echo '在开始填写应用页资料时,您能套用现有的功能页作修改。<br>覆制时只须选择所需复制的专案及被复制的应用页。<br>若跨专案覆制,相关的相片或网页并未有同时覆制的。';}else if($_SESSION[tn]==EN){echo 'You can use existing APP pages for amendment to new APP page when you start to design. You need to select project(copy to) and APP page(be copied) only. You need to copy related pictures manually if you copy an APP page not in same project.';}else{echo '在開始填寫應用頁資料時,您能套用現有的功能頁作修改。<br>覆制時只須選擇所需複製的專案及被複製的應用頁。<br>若跨專案覆制,相關的相片或網頁並未有同時覆制的。';}?>
	</p>
	
	</div>
	
	<a href="#quick" data-rel="popup" data-transition="pop" class="ui-btn ui-btn-w ui-btn-inline ui-corner-all ui-mini ui-btn-icon-left ui-icon-info" style="color:black;"><?php if($_SESSION[tn]==PRC){echo '快速试用';}else if($_SESSION[tn]==EN){echo 'Quick try';}else{echo '快速試用';}?></a>
	
	<div data-role="popup" id="quick" style="min-width:300px" data-theme="f"><a href="#" class="ui-btn ui-corner-all ui-icon-delete ui-btn-icon-notext ui-btn-right" data-rel="back"></a>	
	<h4 style="color:pink"><?php if($_SESSION[tn]==PRC){echo '创建应用页';}else if($_SESSION[tn]==EN){echo 'Create APP page';}else{echo '創建應用頁';}?></h4>
	<p style="color:black">
	<?php if($_SESSION[tn]==PRC){echo '在\'选择所属专案 \'选择及填\'应用页称\'并送交。重覆步骤创建另一应用页。';}else if($_SESSION[tn]==EN){echo 'You need to select APP page\'s project in the \'Select Project\', fill in the \'Page title\' and click the SEND button. You can repeat these steps for creating new APP page.';}else{echo '在\'選擇所屬專案 \'選擇及填\'應用頁稱\'並送交。重覆步驟創建另一應用頁。';}?>
	</p>
	
	<p style="color:black"><?php if($_SESSION[tn]==PRC){echo '若只创建应用页资料,您能在此页点撀相应功能的按钮,对应用页编写该功能的内容,您能对应用页添加多个功能内容,但须注意限制,特别是AJAX限制,编写时在此页有提示。';}else if($_SESSION[tn]==EN){echo 'You can add different functional content to the APP page by clicking the editing button of related function. But you need to follow the restriction instruction on this page, particularly about the AJAX restriction.';}else{echo '若只創建應用頁資料,您能在此頁點撀相應功能的按鈕,對應用頁編寫該功能的內容,您能對應用頁添加多個功能內容,但須注意限制,特別是AJAX限制,編寫時在此頁有提示。';}?></p>	
	<hr>
	<h4 style="color:pink"><?php if($_SESSION[tn]==PRC){echo '菜单及应用页链结设置';}else if($_SESSION[tn]==EN){echo 'Link of Menu and APP page';}else{echo '菜單及應用頁鏈結設置';}?></h4>	
	<p style="color:black"><?php if($_SESSION[tn]==PRC){echo '在完成所有应用设计并巳进行预览测试，点撀此页的\'目录\'并点撀\'设计步骤\',返到首页。再点撀\'菜单设计\'及相关专案,将应用页的链结加到应用菜单上。';}else if($_SESSION[tn]==EN){echo 'After design completion of all APP pages and previewing and testing them, you need to click the \'Menu\' and the \'Design Step\' to go to first editing page. You need to click the \'APP menu design\' and related project title on the list and add the link of APP pages to the APP menu.';}else{echo '在完成所有應用設計並巳進行預覽測試，點撀此頁的\'目錄\'並點撀\'設計步驟\',返到首頁。再點撀\'菜單設計\'及相關專案,將應用頁的鏈結加到應用菜單上。';}?></p>	
	
	<hr>
	<h4 style="color:pink"><?php if($_SESSION[tn]==PRC){echo '应用档案产生';}else if($_SESSION[tn]==EN){echo 'APP file creation';}else{echo '應用檔案產生';}?></h4>	
	<p style="color:black"><?php if($_SESSION[tn]==PRC){echo '点撀此页的\'设计步骤\'并点撀\'应用档案产生\'，到应用档案编辑页。';}else if($_SESSION[tn]==EN){echo 'You need to click the \'Design step\' and the \'APP file creation\' to go to APP file creation page.';}else{echo '點撀此頁的\'設計步驟\'並點撀\'應用檔案產生\'，到應用檔案編輯頁。';}?></p>		
		
	
	
	</div>
	
	
	<div data-role="popup" id="pjt" data-corners="false" class="ifrwidthp"><a href="#" data-rel="back" style="z-index:1" class="popn ui-btn ui-btn-z ui-btn-icon-notext ui-icon-delete"></a>
	
	
	<ul data-role="listview" data-inset="true"  data-corners="false" id="webhtml" style="min-width:500px;overflow-y:auto">
	<li><a href="webpage.php" data-ajax="false" class="ui-btn ui-mini ui-btn-icon-left ui-icon-edit"><?php if($pjnm)echo '['.htmlspecialchars($pjnm).'] ';if($_SESSION[tn]==PRC){echo '编制应用页';}else if($_SESSION[tn]==EN){echo 'Create New Function Page';}else{echo '編制應用頁';} ?>  </a></li>
	<?php 	
	
	$sql=$db->query("select * from webhtml order by nbr,date desc");
	if($sql){
	while($row=$sql->fetch()){
	if($row[hidden]!=5){
	
	if($row[style]=='apps'){
		if($row[apn]){$rowaphtml = '<BR><span style="color:blue">[copy - '.$row[apn].'.html/iframe popup - web'.$row[apn].'.html]</span>';}else{$rowaphtml = '<BR><span style="color:blue">[copy - '.$row[ap].'.html/iframe popup - web'.$row[ap].'.html]</span>';}	
	}else if($row[apn]){$rowaphtml = ' <span style="color:blue">['.$row[apn].'.html]</span>';}else{$rowaphtml = ' <span style="color:blue">['.$row[ap].'.html]</span>';}
	
	if($pj){
	if($pj==$row[pjnbr])echo '<li><a href="webpage.php?pj='.htmlspecialchars($row[pjnbr]).'&ap='.htmlspecialchars($row[ap]).'" data-ajax="false" class="ui-btn ui-btn ui-mini ui-btn-icon-left ui-icon-edit" style="white-space:normal">[<span style="color:blue">'.htmlspecialchars($row['pjnbr']).'</span>]['.htmlspecialchars($row['date']).'] '.htmlspecialchars($row[title]).$rowaphtml.'</a></li>';}
	else{
	echo '<li><a href="webpage.php?pj='.htmlspecialchars($row[pjnbr]).'&ap='.htmlspecialchars($row[ap]).'" data-ajax="false" class="ui-btn ui-btn ui-mini ui-btn-icon-left ui-icon-edit" style="white-space:normal">[<span style="color:blue">'.htmlspecialchars($row['pjnbr']).'</span>]['.htmlspecialchars($row['date']).'] '.htmlspecialchars($row[title]).$rowaphtml.'</a></li>';}
	;}
	;};}?>
	</ul>
	</div>

	<hr>
	<FORM action="webpage.php?pj=<?php echo htmlspecialchars($pj) ?>&ap=<?php echo htmlspecialchars($ap) ?>" id="webxls" method="post" data-ajax="false" >
	
	<div class="ui-grid-<?php if($ap){echo 'c';}else{echo 'a';} ?>"><div class="ui-block-a">
	<?php if(!$ap){if($_SESSION[tn]==PRC){echo '选择';}else if($_SESSION[tn]==EN){echo 'Select ';}else{echo '選擇';};}
	 if($_SESSION[tn]==PRC){echo '所属专案';}else if($_SESSION[tn]==EN){echo 'Project';}else{echo '所屬專案';}?>
	<?php 	
	if($ap){
	echo '<BR><b style="color:black">['.htmlspecialchars($pjnmdate).'] '.htmlspecialchars($pjnm).'</b><input type="hidden" name="pj" value="'.htmlspecialchars($roww[pjnbr]).'">';
	
	;}else{
	$sql=$db->query("select * from webpj order by nbr desc");
	if($sql){
	while($row=$sql->fetch()){
	if(!$i){echo '<select name="pj" required><option value="">';
	if($_SESSION[tn]==PRC){echo '选择';}else if($_SESSION[tn]==EN){echo 'Select';}else{echo '選擇';}
	echo '</option>';$i=1;}
	
	if($row[hidden]!=5){
	echo '<option value="'.htmlspecialchars($row[cno]).'"';
	if($row[cno]==$roww[pjnbr]){echo 'selected="selected"';}else if($row[cno]==$pj){echo 'selected="selected"';}
	echo '>['.htmlspecialchars($row[date]).'] '.htmlspecialchars($row[title]).'</option>';
	;}	
	;};}if($i)echo '</select>';
	;}
	

	?>

	</div><div class="ui-block-b">
	<?php if($ap){?>
	<?php if($_SESSION[tn]==PRC){echo '背景图像';}else if($_SESSION[tn]==EN){echo 'Background picture';}else{echo '背景圖像';}?>
		<input name="bg" type="text" value="<?php echo htmlspecialchars($roww[bg])?>">
	</div><div class="ui-block-c">
	<?php if($_SESSION[tn]==PRC){echo '字色';}else if($_SESSION[tn]==EN){echo 'Font color';}else{echo '字色';}?>
		<input name="font" type="text" value="<?php echo htmlspecialchars($roww[font])?>">

	<!--<?php if($_SESSION[tn]==PRC){echo '应用页颜色主题';}else if($_SESSION[tn]==EN){echo 'Page color theme';}else{echo '應用頁顏色主題';}?>

	<select name="theme" style=" width:100%" >
	<option value=""><?php if($_SESSION[tn]==PRC){echo '选择';}else if($_SESSION[tn]==EN){echo 'Choose';}else{echo '選擇';}?></option>
	<option value="a" <?php if($roww[theme]=='a')echo 'selected=selected';?>>a<?php if($_SESSION[tn]==PRC){echo '[黑色]';}else if($_SESSION[tn]==EN){echo '[Black]';}else{echo '[黑色]';}?></option>
	<option value="b" <?php if($roww[theme]=='b')echo 'selected=selected';?>>b<?php if($_SESSION[tn]==PRC){echo '[蓝色]';}else if($_SESSION[tn]==EN){echo '[Blue]';}else{echo '[藍色]';}?></option>
	<option value="c" <?php if($roww[theme]=='c')echo 'selected=selected';?>>c<?php if($_SESSION[tn]==PRC){echo '[灰色]';}else if($_SESSION[tn]==EN){echo '[Grey]';}else{echo '[灰色]';}?></option>!-->
	<!--<option value="d" <?php if($roww[theme]=='d')echo 'selected=selected';?>>d<?php if($_SESSION[tn]==PRC){echo '[灰色1]';}else if($_SESSION[tn]==EN){echo '[Grey 1]';}else{echo '[灰色1]';}?></option>
	<option value="e" <?php if($roww[theme]=='e')echo 'selected=selected';?>>e<?php if($_SESSION[tn]==PRC){echo '[黃色]';}else if($_SESSION[tn]==EN){echo '[Yellow';}else{echo '[黃色]';}?>]</option>!-->
	<!--<option value="f" <?php if($roww[theme]=='f')echo 'selected=selected';?>>f<?php if($_SESSION[tn]==PRC){echo '[蓝色1]';}else if($_SESSION[tn]==EN){echo '[Blue 1]';}else{echo '[藍色1]';}?></option>!-->
	<!--<option value="g" <?php if($roww[theme]=='g')echo 'selected=selected';?>>g<?php if($_SESSION[tn]==PRC){echo '[黃色1]';}else if($_SESSION[tn]==EN){echo '[Yellow 1]';}else{echo '[黃色1]';}?></option>
	<!--<option value="h" <?php if($roww[theme]=='h')echo 'selected=selected';?>>h<?php if($_SESSION[tn]==PRC){echo '[绿色]';}else if($_SESSION[tn]==EN){echo '[Green]';}else{echo '[綠色]';}?></option>
	<option value="i" <?php if($roww[theme]=='i')echo 'selected=selected';?>>i<?php if($_SESSION[tn]==PRC){echo '[绿色1]';}else if($_SESSION[tn]==EN){echo '[Green 1]';}else{echo '[綠色1]';}?></option>
	<option value="j" <?php if($roww[theme]=='j')echo 'selected=selected';?>>j<?php if($_SESSION[tn]==PRC){echo '[粉紅色]';}else if($_SESSION[tn]==EN){echo '[Pink]';}else{echo '[粉紅色]';}?></option>
	<option value="k" <?php if($roww[theme]=='k')echo 'selected=selected';?>>k<?php if($_SESSION[tn]==PRC){echo '[蓝色2]';}else if($_SESSION[tn]==EN){echo '[Blue 2]';}else{echo '[藍色2]';}?></option>
	<option value="l" <?php if($roww[theme]=='l')echo 'selected=selected';?>>l<?php if($_SESSION[tn]==PRC){echo '[金色]';}else if($_SESSION[tn]==EN){echo '[Golden]';}else{echo '[金色]';}?></option>
	<option value="m" <?php if($roww[theme]=='m')echo 'selected=selected';?>>m<?php if($_SESSION[tn]==PRC){echo '[红色]';}else if($_SESSION[tn]==EN){echo '[Red]';}else{echo '[紅色]';}?></option>
	<option value="n" <?php if($roww[theme]=='n')echo 'selected=selected';?>>n<?php if($_SESSION[tn]==PRC){echo '[橙色]';}else if($_SESSION[tn]==EN){echo '[Orange]';}else{echo '[橙色]';}?></option>
	<option value="v" <?php if($roww[theme]=='v')echo 'selected=selected';?>>v<?php if($_SESSION[tn]==PRC){echo '[金色2]';}else if($_SESSION[tn]==EN){echo '[Limpid gold]';}else{echo '[金色2]';}?></option>!-->
	<!--<option value="w" <?php if($roww[theme]=='w')echo 'selected=selected';?>>w<?php if($_SESSION[tn]==PRC){echo '[蓝透色]';}else if($_SESSION[tn]==EN){echo '[Limpid blue]';}else{echo '[藍透色]';}?></option>
	<option value="x" <?php if($roww[theme]=='x')echo 'selected=selected';?>>x<?php if($_SESSION[tn]==PRC){echo '[黑透色]';}else if($_SESSION[tn]==EN){echo '[Limpid black]';}else{echo '[黑透色]';}?></option>
	<option value="y" <?php if($roww[theme]=='y')echo 'selected=selected';?>>y<?php if($_SESSION[tn]==PRC){echo '[白透色]';}else if($_SESSION[tn]==EN){echo '[Limpid white]';}else{echo '[白透色]';}?></option>
	<option value="z" <?php if($roww[theme]=='z')echo 'selected=selected';?>>z<?php if($_SESSION[tn]==PRC){echo '[透色]';}else if($_SESSION[tn]==EN){echo '[Limpid]';}else{echo '[透色]';}?></option>
	</select>!-->
	
		 
		
		</div><!--<div class="ui-block-d">
		<!--<br>
			<input name="fullscreen" id="fullscreen" value="1" type="checkbox" <?php if($roww[fllscr])echo 'checked="checked"';?>><label for="fullscreen"><?php if($_SESSION[tn]==PRC){echo '应用改为全闊屏型式';}else if($_SESSION[tn]==EN){echo 'Full width screen style of app';}else{echo '應用改為全闊型式';}?></label>
		</div>!--><div class="ui-block-c">
		<?php if($_SESSION[tn]==PRC){echo '应用页形式';}else if($_SESSION[tn]==EN){echo 'Page style';}else{echo '應用頁形式';}?>
		<select name="style">
		<option value="app"  <?php if($roww[style]=='app')echo 'selected="selected"';?>><?php if($_SESSION[tn]==PRC){echo '应用页';}else if($_SESSION[tn]==EN){echo 'APP page';}else{echo '應用頁';}?></option>	
		<option value="apps"  <?php if($roww[style]=='apps')echo 'selected="selected"';?>><?php if($_SESSION[tn]==PRC){echo '应用页[不在panel菜单]';}else if($_SESSION[tn]==EN){echo 'APP page [not on panel]';}else{echo '應用頁[不在panel菜單]';}?></option>
		<option value="form"  <?php if($roww[style]=='form')echo 'selected="selected"';?>><?php if($_SESSION[tn]==PRC){echo '引用表格[不在panel菜单]';}else if($_SESSION[tn]==EN){echo 'APP form page [not on panel]';}else{echo '引用表格[不在panel菜單]';}?></option>
		<!--<option value="page"  <?php if($roww[style]=='page')echo 'selected="selected"';?>><?php if($_SESSION[tn]==PRC){echo '單頁';}else if($_SESSION[tn]==EN){echo 'single page';}else{echo '單頁';}?></option>!-->
		</select>
			
	<?php ;}else{
	$i = '';
	if($_SESSION[tn]==PRC){echo '复制现有应用页';}else if($_SESSION[tn]==EN){echo 'Copy Existing APP Page';}else{echo '複製現有應用頁';}?>
	<?php 	$sql=$db->query("select * from webhtml order by nbr desc");
	if($sql){
	while($row=$sql->fetch()){
	if(!$i){echo '<select name="appcopy"><option value="">';
	if($_SESSION[tn]==PRC){echo '选择';}else if($_SESSION[tn]==EN){echo 'Select';}else{echo '選擇';}
	echo '</option>';$i=1;}
	if($row[hidden]!=5){
	echo '<option value="'.htmlspecialchars($row[cno]).'">['.htmlspecialchars($row[pjnbr]).']['.htmlspecialchars($row[ap]).'] ['.htmlspecialchars($row[date]).'] '.htmlspecialchars($row[title]).'</option>';
	;}	
	;};}if($i)echo '</select>';
	;}//if(!$ap){?>

	</div>	
	</div>
	
	
	<div class="ui-grid-b"><div class="ui-block-a" style="width:60%">
	<?php if($_SESSION[tn]==PRC){echo '应用页称';}else if($_SESSION[tn]==EN){echo 'Page title';}else{echo '應用頁稱';}?>	
	<a href="#pjtitles" data-rel="popup" data-transition="pop" class="ui-btn ui-btn ui-btn-inline ui-corner-all ui-mini" style="color:blue;">?</a>
	<div data-role="popup" id="pjtitles" style="min-width:300px" data-theme="f">
	<p>
	<?php if($_SESSION[tn]==PRC){echo '此名称只用在此软件。';}else if($_SESSION[tn]==EN){echo 'It is for using in this software only.';}else{echo '此名稱只用在此軟件。';}?>
	</p>
	</div>
	<input name="title" type="text" value="<?php echo htmlspecialchars($roww[title])?>" required>
	
	</div>
	<?php if($ap){?>
	<div class="ui-block-b" style="width:20%">
	<?php if($_SESSION[tn]==PRC){echo '序号';}else if($_SESSION[tn]==EN){echo 'Sequence';}else{echo '序號';}?>	
	<a href="#nbrs" data-rel="popup" data-transition="pop" class="ui-btn ui-btn ui-btn-inline ui-corner-all ui-mini" style="color:blue;">?</a>
	<div data-role="popup" id="nbrs" style="min-width:300px" data-theme="f">
	<p>
	<?php if($_SESSION[tn]==PRC){echo '只用在此软件用作排序功能页。';}else if($_SESSION[tn]==EN){echo 'It is for the sequence of APP page on the APP page list in this software.';}else{echo '只用在此軟件用作排序功能頁。';}?>
	</p>
	</div>
	<input name="nbr" type="text" value="<?php echo htmlspecialchars($roww[nbr])?>">
	</div>
	<div class="ui-block-c" style="width:20%">
	<?php if($_SESSION[tn]==PRC){echo '隐藏/刪除';}else if($_SESSION[tn]==EN){echo 'Hidden/Del';}else{echo '隱藏/刪除';}?>
	
	<a href="#hiddens" data-rel="popup" data-transition="pop" class="ui-btn ui-btn ui-btn-inline ui-corner-all ui-mini" style="color:blue;">?</a>
	<div data-role="popup" id="hiddens" style="min-width:300px">
	<p><b><?php if($_SESSION[tn]==PRC){echo '隐藏';}else if($_SESSION[tn]==EN){echo 'Hidden';}else{echo '隱藏';}?></b>
	<?php if($_SESSION[tn]==PRC){echo '在产生应用时,隐藏的应用页亦不被包括在应用的档夹内,只存在专案档夹内。应用的档夹是用作产生应用。';}else if($_SESSION[tn]==EN){echo 'The hidden file is not included within APP folder when creating APP files. It is only inside project folder. The APP folder will be packaged[zipped] for APP production.';}else{echo '在產生應用時,隱藏的應用頁亦不被包括在應用的檔夾內,只存在專案檔夾內。應用的檔夾是用作產生應用。';}?>
	</p>
	
	<p><b><?php if($_SESSION[tn]==PRC){echo '刪除';}else if($_SESSION[tn]==EN){echo 'Del';}else{echo '刪除';}?></b>
	<?php if($_SESSION[tn]==PRC){echo '只删除资料,应用页仍存於相关档夹内。';}else if($_SESSION[tn]==EN){echo 'It is for data deletion but the related files are still stored in related file.';}else{echo '只刪除資料,應用頁仍存於相關檔夾內。';}?>
	</p>

	</div>
	<select name="hidden">
	<option value="1"  <?php if($roww[hidden]=='1')echo 'selected="selected"';?>><?php if($_SESSION[tn]==PRC){echo '不用隐藏';}else if($_SESSION[tn]==EN){echo 'Not Hidden';}else{echo '不用隱藏';}?></option>
	<option value="5"  <?php if($roww[hidden]=='5')echo 'selected="selected"';?>><?php if($_SESSION[tn]==PRC){echo '隐藏';}else if($_SESSION[tn]==EN){echo 'Hidden ';}else{echo '隱藏';}?></option>
	<option value="d"  <?php if($roww[hidden]=='d')echo 'selected="selected"';?>><?php if($_SESSION[tn]==PRC){echo '刪除';}else if($_SESSION[tn]==EN){echo 'Delete';}else{echo '刪除';}?></option>
	</select></div>
	<?php ;}//if($ap){?>
	</div>
	
	<?php if($_SESSION[tn]==PRC){echo '专案描述';}else if($_SESSION[tn]==EN){echo 'Project description';}else{echo '專案描述';}?>	
	
	<input name="des" type="text" value="<?php echo htmlspecialchars($roww[des])?>">
	

	<br>

	<input type="hidden" name="guanyin1" value="<?php if(!$_POST[guanyin1])$_SESSION[guanyin1]=rand();
	echo htmlspecialchars($_SESSION[guanyin1]); ?>">
	
	<div class="ui-grid-d"><div class="ui-block-a">
	<input type="submit" name="submit" id="webxlsbtn" Value="<?php if($_SESSION[tn]==PRC){echo '送交';}else if($_SESSION[tn]==EN){echo 'SEND';}else{echo '送交';}?>"></div><div class="ui-block-b">
	<a href="#steps" data-rel="popup" data-transition="pop" class="ui-btn ui-btn-b ui-btn-inline ui-corner-all ui-mini">? <?php if($_SESSION[tn]==PRC){echo '步骤';}else if($_SESSION[tn]==EN){echo 'Steps';}else{echo '步驟';}?></a>
	<div data-role="popup" id="steps" style="min-width:300px;max-width:85%; overflow-y:auto" data-position-to="window" data-theme="f"><a href="#" class="popn ui-btn ui-btn-z ui-corner-all ui-icon-delete ui-btn-icon-notext" data-rel="back"></a>
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '创建专案';}else if($_SESSION[tn]==EN){echo 'Creating project';}else{echo '創建專案';}?></b>
	<?php if($_SESSION[tn]==PRC){echo '创建专案才能创建应用设计,专案是在设计步骤[点撀目录]的菜单设计内进行。';}else if($_SESSION[tn]==EN){echo 'You can create project for your APP design by clicking the menu design on \'Design Step\' [click the above Menu button].';}else{echo '創建專案才能創建應用設計,專案是在設計步驟[點撀目錄]的菜單設計內進行。';}?></p>
	<p><?php if($_SESSION[tn]==PRC){echo '若修改应用页,点选\'应用页列表\'。';}else if($_SESSION[tn]==EN){echo 'You can click the \'APP Page List\' to amend APP pages..';}else{echo '若修改應用頁,點選\'應用頁列表\'。';}?></p><hr>
	
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '应用页资料';}else if($_SESSION[tn]==EN){echo 'APP page information';}else{echo '應用頁資料';}?></b>
	<?php if($_SESSION[tn]==PRC){echo '您须填写以上资料,功能按钮才显示,才能在功能页上开始编写功能内容。';}else if($_SESSION[tn]==EN){echo 'APP function buttons will be showed on the below area after you fill in the above information. You can start your function content for the APP page by clicking related function buttons on this page.';}else{echo '您須填寫以上資料,功能按鈕才顯示,才能在功能頁上開始編寫功能內容。';}?></p>
	<p><?php if($_SESSION[tn]==PRC){echo '若修改应用页资料,点选\'应用页列表\'。';}else if($_SESSION[tn]==EN){echo 'You can click the \'APP Page List\' to amend the information of APP pages.';}else{echo '若修改應用頁資料,點選\'應用頁列表\'。';}?></p><hr>

	
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '功能按钮';}else if($_SESSION[tn]==EN){echo 'Function button';}else{echo '功能按鈕';}?></b>
	<?php if($_SESSION[tn]==PRC){echo '点撀相关的功能按钮,编辑相关内容。相关的编辑页内含示范。';}else if($_SESSION[tn]==EN){echo 'You can click a function button to edit related content. You can find example on related function\'s editing page.';}else{echo '點撀相關的功能按鈕,編輯相關內容。相關的編輯頁內含示範。';}?></p>
	<p><?php if($_SESSION[tn]==PRC){echo '应用页能写入多个不同的功能,您能在此应用页添加\'Tab标签导航\'供用户上下浏览此页的内容。';}else if($_SESSION[tn]==EN){echo 'You can edit different functions to an APP page. You can add Tab Navigation buttons for APP user to browse this page\'s fucntion content.';}else{echo '應用頁能寫入多個不同的功能,您能在此應用頁添加\'Tab標簽導航\'供用戶上下瀏覽此頁的內容。';}?></p>
	<p><?php if($_SESSION[tn]==PRC){echo '若需要,您能再添加应用页。若您的设计有2个或以上应用页,您需要编写\'菜单\'供用户浏览不同的应用页。编写\'菜单\'是在\'目录\',点撀\'设计步骤\'及\'菜单设计\'。';}else if($_SESSION[tn]==EN){echo 'You can add more APP pages if necessary. If your design is 2 pages or above, you need to edit \'APP menu\' for APP user to browse different APP pages. You can edit the menu by clicking \'Menu\', \'Design Step\' and \'APP menu design\'.';}else{echo '若需要,您能再添加應用頁。若您的設計有2個或以上應用頁,您需要編寫\'菜單\'供用戶瀏覽不同的應用頁。編寫\'菜單\'是在\'目錄\',點撀\'設計步驟\'及\'菜單設計\'。';}?></p>
	<hr>
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo 'AJAX功能限制';}else if($_SESSION[tn]==EN){echo 'Limitation of AJAX Function';}else{echo 'AJAX功能限制';}?></b>
	<?php if($_SESSION[tn]==PRC){echo '一个功能页内只限一个读取AJAX数据的功能。您须注意此页提示。一个应用不限功能页数,但仍受应用档案总大小的限制e.g. PhoneGap Build, IOS store 及 Android Play。';}else if($_SESSION[tn]==EN){echo 'Only one AJAX data function can be used for one APP page. You need to read the related note about this issue on this page. An APP project does not limit number of APP pages but you need to consider the limitation of total APP file size relating to APP publishing parties such as PhoneGap Build, IOS store and Android Play.';}else{echo '一個功能頁內只限一個讀取AJAX數據的功能。您須注意此頁提示。一個應用不限功能頁數,但仍受應用檔案總大小的限制e.g. PhoneGap Build, IOS store 及 Android Play。';}?></p>
	<hr>
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '功能上下方加插文字';}else if($_SESSION[tn]==EN){echo 'Inserting text to functional content';}else{echo '功能上下方加插文字';}?></b>
	<?php if($_SESSION[tn]==PRC){echo '\'图像文字内容\'功能能编写文字内容,再用\'内容段合拼功能\'合拼内容。';}else if($_SESSION[tn]==EN){echo 'You can use Photo and text content function to edit text content and use the \'content merging\' function to joint content area.';}else{echo '\'圖像文字內容\'功能能編寫文字內容,再用\'內容段合拼功能\'合拼內容。';}?></p>
	<p><?php if($_SESSION[tn]==PRC){echo '\'若内容非固定,您须将内容存於互联伺服器,再使用\'Page iframe - 嵌入网页\'功能内嵌特定应用页或网页或用\'選項按鈕/項目列表\'內的POPUP顯示[用戶點撀按鈕再顯示含網頁的POPUP],再用\'内容段合拼功能\'合拼内容。';}else if($_SESSION[tn]==EN){echo 'If you need ongoing updated text content in your APP design, you can store the text content as web page on the Internet. You can use \'Page iframe - Embed web page\' function to embed an specific APP page or web page of text content or use popup of \'Option button/Listview\' function to show text content in a popup [APP user clicks a button to show web page on a popup.] and use the \'content merging\' function to joint content area.';}else{echo '若內容非固定,您須將內容存於互聯伺服器,再使用\'Page iframe - 嵌入網頁\'功能內嵌特定應用頁或網頁或用\'選項按鈕/項目列表\'內的POPUP顯示[用戶點撀按鈕再顯示含網頁的POPUP],再用\'內容段合拼功能\'合拼內容。';}?></p>
	<hr>
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '预览您的设计';}else if($_SESSION[tn]==EN){echo 'Preview design';}else{echo '預覽您的設計';}?></b>
	<?php if($_SESSION[tn]==PRC){echo '点撀\'预览\'能浏览您的设计。';}else if($_SESSION[tn]==EN){echo 'You can click the \'Preview\' button to view your design work.';}else{echo '點撀\'預覽\'能瀏覽您的設計。';}?></p>
	<!--<p><?php if($_SESSION[tn]==PRC){echo '设计的内容段预设用户设备屏高,若需合拼内容,您须使用\'内容段合拼功能\'。';}else if($_SESSION[tn]==EN){echo 'The height of each content is the screen viewport height of APP user device. If you need to joint content area, you need to use the \'content merging\' function.';}else{echo '設計的內容段預設用戶設備屏高,若需合拼內容,您須使用\'內容段合拼功能\'。';}?></p>!-->

	<p><?php if($_SESSION[tn]==PRC){echo '应用设备跟电脑显示[用CHROME选项浏览]大至相同,您应将尺寸缩细浏览。一些功能亦只能在将您的设计安装到应用设备上才能测试。';}else if($_SESSION[tn]==EN){echo 'You can use the Webkit option to preview your design and the preview result is similar to APP devices. You need to resize your browser to preview and some functions can only be tested in APP status.';}else{echo '應用設備跟電腦顯示[用CHROME選項瀏覽]大至相同,您應將尺寸縮細瀏覽。一些功能亦只能在將您的設計安裝到應用設備上才能測試。';}?></p>

	<p><?php if($_SESSION[tn]==PRC){echo '预览popup形式';}else if($_SESSION[tn]==EN){echo 'Content of popup style[Preview]';}else{echo '預覽popup形式';}?> - <?php if($_SESSION[tn]==PRC){echo '在编写功能内容,您能设置一些POPUP[用户点撀按钮显示POPUP弹出内容框]及iframe[以嵌入在应用页形式显示内容],此等形式显示的内容均是在\'应用页形式\'选用\'应用页[不设panel菜单]\'而编写的内容。';}else if($_SESSION[tn]==EN){echo 'You can add popup [popup content showing by APP user clicking a button] and iframe [APP content embedding into APP page] to an APP page. When selecting the page style, the content relating to these popups and iframes are the option - APP page [not on panel].';}else{echo '在編寫功能內容,您能設置一些POPUP[用戶點撀按鈕顯示POPUP彈出內容框]及iframe[以嵌入在應用頁形式顯示內容],此等形式顯示的內容均是在\'應用頁形式\'選用\'應用頁[不設panel菜單]\'而編寫的內容。';}?></p>
	<hr>
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '修改及刪除';}else if($_SESSION[tn]==EN){echo 'Amend and delete';}else{echo '修改及刪除';}?></b>
	<?php if($_SESSION[tn]==PRC){echo '您能点撀\'次序及删除\',能修改此应用页内容的上下显示次序或删除内容。您亦能点撀\'修改\'按钮,修改此按钮下的内容。';}else if($_SESSION[tn]==EN){echo 'You can click the \'Re-order and delete\' to reorder sequence of the APP content listing of this APP page and delete a content area. You can click \'Amend\' button below content area to amend the content.';}else{echo '您能點撀\'次序及刪除\',能修改此應用頁內容的上下顯示次序或刪除內容。您亦能點撀\'修改\'按鈕,修改此按鈕下的內容。';}?></p><hr>
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '标签导航';}else if($_SESSION[tn]==EN){echo 'Tab Navigation';}else{echo '標簽導航';}?></b>
	<?php if($_SESSION[tn]==PRC){echo '在一页内加不同的功能内容,您能添加导航标签供用户在浏览应用时使用,点撀\'标签导航\'按钮进行编制。';}else if($_SESSION[tn]==EN){echo 'If your design is an multi-functional APP page, you can edit a navigation menu to browse APP page. You can click the \'Tab Navigation\' to edit navigation tab buttons.';}else{echo '在一頁內加不同的功能內容,您能添加導航標簽供用戶在瀏覽應用時使用,點撀\'標簽導航\'按鈕進行編制。';}?></p>
	</div>
	
		
	<a href="#pjts" data-rel="popup" data-transition="pop" class="ui-btn ui-btn ui-btn-inline ui-corner-all ui-mini" style="color:blue;">? <?php if($_SESSION[tn]==PRC){echo '解释';}else if($_SESSION[tn]==EN){echo 'Explanation';}else{echo '解釋';}?></a>
	<div data-role="popup" id="pjts" style="min-width:300px;max-width:85%; overflow-y:auto" data-theme="f"><a href="#" class="popn ui-btn ui-btn-z ui-corner-all ui-icon-delete ui-btn-icon-notext" data-rel="back"></a>
	<p><b  style="color:black"><?php if($_SESSION[tn]==PRC){echo '应用页列表';}else if($_SESSION[tn]==EN){echo 'APP Page List';}else{echo '應用頁列表';}?></b>
	<?php if($_SESSION[tn]==PRC){echo '点撀\'应用页列表\'显示功能页的列表,点撀相关标题进行修改或创建。';}else if($_SESSION[tn]==EN){echo 'You can click the \'APP Page List\' to show the APP page list. You can click the title to amend the page or create a new one.';}else{echo '點撀\'應用頁列表\'顯示功能頁的列表,點撀相關標題進行修改或創建。';}?>
	</p>
	<HR>
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '选择所属专案';}else if($_SESSION[tn]==EN){echo 'Select Project';}else{echo '選擇所屬專案';}?></b>
	
	<?php if($_SESSION[tn]==PRC){echo '专案是一个应用设计,您须指定此应用页属那一专案,应用页是不能修改所属专案,但应用页是能被複製至另一专案。';}else if($_SESSION[tn]==EN){echo 'Project is a APP design. You need to assign a project for an APP page. You cannot amend this project paramenter for an APP page but you can copy it to different projects.';}else{echo '專案是一個應用設計,您須指定此應用頁屬那一專案,應用頁是不能修改所屬專案,但應用頁是能被複製至另一專案。';}?>
	</p>
	<HR>
	<p><b  style="color:black"><?php if($_SESSION[tn]==PRC){echo '字色';}else if($_SESSION[tn]==EN){echo 'Font color';}else{echo '字色';}?></b>
	
	<?php if($_SESSION[tn]==PRC){echo '您能另设置此应用页的特定内容字体,填颜色称,e.g. blue,或html颜色码,e.g. #123456。若加深,加填[b],e.g. #123456[b] 或 blue[b]。';}else if($_SESSION[tn]==EN){echo 'You can amend the font color of this APP page. You can enter color name, e.g. blue or html color code, e.g. #123456. If you need to bold the color, you need to add [b], e.g. #123456[b] or blue[b]';}else{echo '您能另設置此應用頁的特定內容字體,填顏色稱,e.g. blue,或html顏色碼,e.g. #123456。若加深,加填[b],e.g. #123456[b] 或 blue[b]。';}?>
	<!--<p><b  style="color:black"><?php if($_SESSION[tn]==PRC){echo '应用页颜色主题';}else if($_SESSION[tn]==EN){echo 'Page color theme';}else{echo '應用頁顏色主題';}?></b>
	
	<?php if($_SESSION[tn]==PRC){echo '是应用页的主题颜色。';}else if($_SESSION[tn]==EN){echo 'It is about the page color theme of APP page.';}else{echo '是應用頁的主題顏色。';}?>
	</p>!-->
	<HR>
	<h4 style="color:black"><?php if($_SESSION[tn]==PRC){echo '背景图像';}else if($_SESSION[tn]==EN){echo 'Background picture';}else{echo '背景圖像';}?></h4>
	<p>
	<?php if($_SESSION[tn]==PRC){echo '此应用页的背景图像。若设置背景图像上下左右重覆显示,在档案名加[xy]。e.g. picture[xy].png';}else if($_SESSION[tn]==EN){echo 'It is about the background picture of APP page. If you add [xy] to the picture file name (e.g. picture[xy].png, the picture will be repeated both vertically and horizontally.';}else{echo '此應用頁的背景圖像。若設置背景圖像上下左右重覆顯示,在檔案名加[xy]。e.g. picture[xy].png';}?>
	</p>
	<p>
	<?php if($_SESSION[tn]==PRC){echo '您亦能在背景图像填上rgb颜色码e.g. rgb(125,125,125), rgba颜色码e.g. rgba(125,125,125,0.5) 或 hex颜色码e.g. #123456代替背景图像。';}else if($_SESSION[tn]==EN){echo 'You can add rgb color code e.g. rgb(125,125,125), rgba color code e.g. rgba(125,125,125,0.5) or hex color code e.g. #123456 instead of background picture.';}else{echo '您亦能在背景圖像填上rgb顏色碼e.g. rgb(125,125,125), rgba顏色碼e.g. rgba(125,125,125,0.5) 或 hex顏色碼e.g. #123456代替背景圖像。';}?>
	</p>
	<!--<p>
	<?php if($_SESSION[tn]==PRC){echo '若使用rgba颜色码,应不设主题颜色。';}else if($_SESSION[tn]==EN){echo 'If you use rgba color code, you may not use the color theme.';}else{echo '若使用rgba顏色碼,應不設主題顏色。';}?>
	</p>!-->
	
		<!--<HR>
	<p><b  style="color:black"><?php if($_SESSION[tn]==PRC){echo '应用改为全闊屏型式';}else if($_SESSION[tn]==EN){echo 'Full width screen style of app';}else{echo '應用改為全闊型式';}?></b>
	<?php if($_SESSION[tn]==PRC){echo '应用页的左右均有供用户使用的拖拽边位,若选用此设定,应用改为内容全阔显示,但在\'标签导航\'设置导航按钮的置中按钮是仍有右边边位。';}else if($_SESSION[tn]==EN){echo 'The left and right edges of APP page are for swiping to browse. If you use this full screen option, the APP content will show in device screen width without edges. If you use Middle style for navigation tab buttons, the buttons will be showed on the right edge.';}else{echo '應用頁的左右均有供用戶使用的拖拽邊位,若選用此設定,應用改為內容全闊顯示,但在\'標簽導航\'設置導航按鈕的置中按鈕是仍有右邊邊位。';}?>
	</p>!-->
	<HR>
	<p><b  style="color:black"><?php if($_SESSION[tn]==PRC){echo '预览';}else if($_SESSION[tn]==EN){echo 'Preview';}else{echo '預覽';}?></b>
	
	<?php if($_SESSION[tn]==PRC){echo '当应用页巳创建,预览按钮才显示。您应按设计目的选用预览形式,若应用页是作POPUP或IFRAME内嵌内容,您应使用\'预览popup形式\'。';}else if($_SESSION[tn]==EN){echo 'A preview button will be showed after APP page created. You need to preview your design based on your purpose and APP page style. If your APP page is content of POPUP or IFRAME, you need to use \'content of popup style[Preview]\'.';}else{echo '當應用頁巳創建,預覽按鈕才顯示。您應按設計目的選用預覽形式,若應用頁是作POPUP或IFRAME內嵌內容,您應使用\'預覽popup形式\'。';}?>
	</p>
	<HR>
	
	<h4 style="color:black"><?php if($_SESSION[tn]==PRC){echo '应用页形式';}else if($_SESSION[tn]==EN){echo 'Page style';}else{echo '應用頁形式';}?></h4>
	<p>
	<b style="color:blue"><?php if($_SESSION[tn]==PRC){echo '应用页';}else if($_SESSION[tn]==EN){echo 'APP page';}else{echo '應用頁';}?></b> - <?php if($_SESSION[tn]==PRC){echo '一个应用设计能有多张应用页,应用页内亦能有不同功能内容。若选用此项,此页是有菜单按钮显示,作用是供用户浏览不同的应用页。若您的设计是简单而不用菜单,一个应用页内巳有不同功能,您应在此应用页另设导航按钮,供用户上下浏览不同的功能内容。';}else if($_SESSION[tn]==EN){echo 'You can add many APP pages to an APP design. An APP page can be added different functional content. If you use this option, a panel menu button will be showed on the top of this page for APP user to browse APP pages. If your design is simple, you can add different functional content to one page and edit tab navigation buttons to it for APP user to browse functional area on the page.';}else{echo '一個應用設計能有多張應用頁,應用頁內亦能有不同功能內容。若選用此項,此頁是有菜單按鈕顯示,作用是供用戶瀏覽不同的應用頁。若您的設計是簡單而不用菜單,一個應用頁內巳有不同功能,您應在此應用頁另設導航按鈕,供用戶上下瀏覽不同的功能內容。';}?><br>
	<b style="color:blue"><?php if($_SESSION[tn]==PRC){echo '应用页[不在panel菜单]';}else if($_SESSION[tn]==EN){echo 'APP page[not on panel]';}else{echo '應用頁[不在panel菜單]';}?></b> - <?php if($_SESSION[tn]==PRC){echo '在编写功能内容,您能设置一些POPUP[用户点撀按钮显示POPUP弹出内容框]及iframe[以嵌入在应用页形式显示内容],是应用内的单页,架构不同,只能使用文字编辑器功能的相关选项进行编写。';}else if($_SESSION[tn]==EN){echo 'You can add popup [popup content showing by APP user clicking a button] and iframe [APP content embedding into APP page] to an APP page. This type is a single page of APP.';}else{echo '在編寫功能內容,您能設置一些POPUP[用戶點撀按鈕顯示POPUP彈出內容框]及iframe[以嵌入在應用頁形式顯示內容],是應用內的單頁,架構不同,只能使用文字編輯器功能的相關選項進行編寫。';}?><br>
	
	<b style="color:blue"><?php if($_SESSION[tn]==PRC){echo '引用表格[不在panel菜单]';}else if($_SESSION[tn]==EN){echo 'APP form page[not on panel]';}else{echo '引用表格[不在panel菜單]';}?></b> - <?php if($_SESSION[tn]==PRC){echo '当使用\'项目列表\'或\'选项按钮\'功能并使用当中的popup选项功能[是用户点撀选项填到特定数据panel上],您可能须使用表格收数据,此项是该种表格。此页只容许有一种相关的内容[您能尝试添加其它简单功能的内容]。';}else if($_SESSION[tn]==EN){echo 'If you use the function - Listview or Option button and use their popup options function [APP user can click the popup options to fill in data to data panel],you may need to use a form to receive data. This item is for this purpose. This page must be form content only [you may try to add some simple content to it.].';}else{echo '當使用\'項目列表\'或\'選項按鈕\'功能並使用當中的popup選項功能[是用戶點撀選項填到特定數據panel上],您可能須使用表格收數據,此項是該種表格。此頁只容許有一種相關的內容[您能嘗試添加其它簡單功能的內容]。';}?>
	

	
	<!--<?php if($_SESSION[tn]==PRC){echo '在编写功能内容,您能设置一些POPUP[用户点撀按钮显示POPUP弹出内容框]及iframe[以嵌入在应用页形式显示内容],此等形式显示的内容均是选用此项而编写的应用页。';}else if($_SESSION[tn]==EN){echo 'You can add popup[popup content showing by APP user clicking a button] and iframe[APP content embedding into APP page] to an APP page. The content relating to these popups and iframes are the APP page with no panel style.';}else{echo '在編寫功能內容,您能設置一些POPUP[用戶點撀按鈕顯示POPUP彈出內容框]及iframe[以嵌入在應用頁形式顯示內容],此等形式顯示的內容均是選用此項而編寫的應用頁。';}?>!--><br>
	<!--<?php if($_SESSION[tn]==PRC){echo '單頁';}else if($_SESSION[tn]==EN){echo 'single page';}else{echo '單頁';}?> - <?php if($_SESSION[tn]==PRC){echo '应用内的单页,点撀应用页上的按钮或菜单标题显示。';}else if($_SESSION[tn]==EN){echo 'It is a single page of app. It will be showed by clicking a button on APP page or on APP menu.';}else{echo '應用內的單頁,點撀應用頁上的按鈕或菜單標題顯示。';}?><br>!-->
	</p>
	</div>
	</div><div class="ui-block-c">
	<a href="#infs" data-rel="popup" data-transition="pop" class="ui-btn ui-btn-b ui-btn-inline ui-corner-all ui-mini">? <?php if($_SESSION[tn]==PRC){echo '重点';}else if($_SESSION[tn]==EN){echo 'Importance';}else{echo '重點';}?></a>
	<div data-role="popup" id="infs" style="min-width:300px;max-width:85%" data-position-to="window" data-theme="f"><a href="#" class="popn ui-btn ui-btn-z ui-corner-all ui-icon-delete ui-btn-icon-notext" data-rel="back"></a>
	<h4 style="color:black"><?php if($_SESSION[tn]==PRC){echo '视频/音频';}else if($_SESSION[tn]==EN){echo 'Video/Audio';}else{echo '視頻/音頻';}?></h4>
	<p><?php if($_SESSION[tn]==PRC){echo '音频功能是使用html5音频标签,限特定格式档案(e.g. wav)并存於互联网,您须在移动设备测试。';}else if($_SESSION[tn]==EN){echo 'About audio in any function, the html5 audio tag is used in this software. You can use specific format(e.g. wav) of sound file and need to test it on your target platform.e.g. Android';}else{echo '音頻功能是使用html5音頻標簽,限特定格式檔案(e.g. wav)並存於互聯網,您須在移動設備測試。';}?></p>
	<p><?php if($_SESSION[tn]==PRC){echo '有关视频是互联网视频,是以iframe嵌入互联网视频。';}else if($_SESSION[tn]==EN){echo 'About video in any function, the embedded Internet Video in iframe is used.';}else{echo '有關視頻是互聯網視頻,是以iframe嵌入互聯網視頻。';}?></p>
		<p><?php if($_SESSION[tn]==PRC){echo '您亦能将特定格式视频档案存於互联网或内联网,再用相关令用户开启合适应用的功能,开启视频/音频档案。若您的用户众多,须考量您伺服器能力,对一些视频档,应改用上述嵌入形式。';}else if($_SESSION[tn]==EN){echo 'You can also store the video file in the Internet/Intranet and use the function about opening apropriate APP in APP user\'s device to open the video/audio. You may need to use the above method for specific video for many APP users and considering of your server capability.';}else{echo '您亦能將特定格式視頻檔案存於互聯網或內聯網,再用相關令用戶開啟合適應用的功能,開啟視頻/音頻檔案。若您的用戶眾多,須考量您伺服器能力,對一些視頻檔,應改用上述嵌入形式。';}?></p>
	
	<p><?php if($_SESSION[tn]==PRC){echo '只能使用在互联网存放的视频或音频档案(html5格式)。您须避免使用在应用页上直接显示视频或音频控制器的功能,您应使用点撀按钮才显示的功能。';}else if($_SESSION[tn]==EN){echo 'You can only use Internet source of video and audio files with HTML5 format. For audio/video function, please avoid using the function which shows the audio/video players on the page directly. The function relating to click to show the audio/video is recommended.';}else{echo '只能使用在互聯網存放的視頻或音頻檔案(html5格式)。您須避免使用在應用頁上直接顯示視頻或音頻控制器的功能,您應使用點撀按鈕才顯示的功能。';}?></p>
	<HR>
	<h4 style="color:black"><?php if($_SESSION[tn]==PRC){echo '相片存於伺服器';}else if($_SESSION[tn]==EN){echo 'Photo in server for APP using';}else{echo '相片存於伺服器';}?></h4>
	<p><?php if($_SESSION[tn]==PRC){echo '此软件一般令相片100%填满用户设备画面,若您能预计用户设备大小,e.g.手机设备,建议您的相片对应用户设备屏大小定尺寸,相片大小影响应用大小及速度。';}else if($_SESSION[tn]==EN){echo 'This software will produce APP\'s photo 100% fit to APP user\'s screen width in general. If you plan target user of your APP, e.g. mobile phone, you are recommended to use the photo size refering to target APP user\'s device screen size. The photo size affects your APP size and APP speed.';}else{echo '此軟件一般令相片100%填滿用戶設備畫面,若您能預計用戶設備大小,e.g.手機設備,建議您的相片對應用戶設備屏大小定尺寸,相片大小影響應用大小及速度。';}?></p>
	<HR>
	<h4 style="color:black"><?php if($_SESSION[tn]==PRC){echo '应用页存於伺服器';}else if($_SESSION[tn]==EN){echo 'APP Page in server for APP using';}else{echo '應用頁存於伺服器';}?></h4>
	<p><?php if($_SESSION[tn]==PRC){echo '若设计应用页能存於互联网伺服器供应用调用,您应另开专案设计,不应在应用的专案内进行设计。';}else if($_SESSION[tn]==EN){echo 'If a function page (not a part of APP) is stored in the Internet/Intranet server and is showed in your APP, you need to create a project to do the design rather than design the Internet/Intranet APP Page in the APP project.';}else{echo '若設計應用頁能存於互聯網伺服器供應用調用,您應另開專案設計,不應在應用的專案內進行設計。';}?></p>
	<HR>
	<h4 style="color:black"><?php if($_SESSION[tn]==PRC){echo '伺服器能力';}else if($_SESSION[tn]==EN){echo 'Server capability';}else{echo '伺服器能力';}?></h4>
	<p><?php if($_SESSION[tn]==PRC){echo '若用自己的伺服器存放档案供应用使用,您须考量您应用的用户人数,或应使用一些公众储存或播放的网上供应商。';}else if($_SESSION[tn]==EN){echo 'If you use your server to store files for APP using, you need to consider number of your APP users. You may need to use related public media service providers.';}else{echo '若用自己的伺服器存放檔案供應用使用,您須考量您應用的用戶人數,或應使用一些公眾儲存或播放的網上供應商。';}?></p>
	<HR>
	<h4 style="color:black"><?php if($_SESSION[tn]==PRC){echo '预览及测试';}else if($_SESSION[tn]==EN){echo 'Preview and test';}else{echo '預覽及測試';}?></h4>
	<p><?php if($_SESSION[tn]==PRC){echo '您须对您的设计进行预览及测试。';}else if($_SESSION[tn]==EN){echo 'You shall preview and test your APP design.';}else{echo '您須對您的設計進行預覽及測試。';}?></p>
	<HR>
	<h4 style="color:black"><?php if($_SESSION[tn]==PRC){echo '应用发布';}else if($_SESSION[tn]==EN){echo 'APP publishing';}else{echo '應用發佈';}?></h4>
	<p><?php if($_SESSION[tn]==PRC){echo '设计前您应了解相关应用创建机构及发布机构要求,特别是应用大小及内容的限制等。';}else if($_SESSION[tn]==EN){echo 'You shall collect and understand the requirements of APP file producing agencies and APP publishing agencies, particularly in APP size, content restriction and any restriction.';}else{echo '設計前您應瞭解相關應用創建機構及發佈機構要求,特別是應用大小及內容的限制等。';}?></p>
	</div>
	

	</div><div class="ui-block-c"></div>
	<div class="ui-block-d">
	</div>
	</div>
	</FORM>
	
	<?php if($pj){
			$ht = file_get_contents('../panel/'.$pj.'/'.$apvlu.'.html');
			$ht = str_replace('<!--sys','<a href="',$ht);
			$href = '.php?ap='.htmlspecialchars($ap).'&pj='.htmlspecialchars($pj).'&pnvlu" class="ui-btn ui-btn-w ui-btn-icon-left ui-icon-edit"  style="color:black" data-ajax="false">';
			if($_SESSION[tn]==PRC){$href .= '修改';}else if($_SESSION[tn]==EN){$href .= 'Amendment';}else{$href .= '修改';}
			$href .= '</a>';
			$ht = str_replace('sys!-->',$href,$ht);
			$htm = explode('<!--part',$ht);
				for($i=1;$i<sizeof($htm);$i++){
					$pn = explode('!-->',$htm[$i]);
					$pnvlu = $pn[0];
					$pnn[$pnvlu] = $i;
					$htm[$i] = str_replace('pnvlu','pn='.$pn[0],$htm[$i]);
					$html .= '<!--part'.$pn[0].$htm[$i];
					if(!$tl or $pn[0]>$tl)$tl =  $pn[0];
				;}
				
			//if($tl>=sizeof($htm)){
			//$htn = file_get_contents('../panel/'.$pj.'/'.$ap.'.html');
				//for($j=1;$j<$tl;$j++){
					//if(!$pnn[$j]){
					//	$htn = $htn.'<!--part'.$j.'!-->';
					//	$hts = 1;
					//;}			
				//;}
				//if($hts){file_put_contents('../panel/'.$pj.'/'.$ap.'.html',$htn);	
				//echo "<meta http-equiv='refresh' content='0;URL=webpage.php?ap=".htmlspecialchars($ap)."&pj=".htmlspecialchars($pj)."'>";
				//;}		
			//;}
	$webjs = file_get_contents('../panel/'.$pj.'/web'.$apvlu.'.js');
	
	if(strpos($webjs,'/*ajaxs*/')!==false){echo '<br><b style="color:red">';if($_SESSION[tn]==PRC){echo '此页巳用AJAX数据功能,在此页是不能再用含此数据功能的内容[下列功能含AJAX标记]。当在此应用页再设计此等功能內容,是不能设计相关数据的功能。见步骤解释。';}else if($_SESSION[tn]==EN){echo 'The AJAX data function was used on your designed APP page. You cannot add functional content[AJAX remarked on below function] relating to this function. When designing this AJAX data related function, you cannot add data related function. Please refer to the step\'s explanation.';}else{echo '此頁巳用AJAX數據功能,在此頁是不能再用含此數據功能的內容[下列功能含AJAX標記]。當在此應用頁再設計此等功能內容,是不能設計相關數據的功能。見步驟解釋。';};echo '</b>';$ajaxs= ' <b style="color:pink">[AJAX]</b>';}
	?>	<hr>
	<a href="seq.php?ap=<?php echo htmlspecialchars($ap) ?>&pj=<?php echo  htmlspecialchars($pj) ?>" class="ui-btn ui-btn-g ui-btn-inline ui-btn-icon-left ui-icon-edit" data-ajax="false"><?php if($_SESSION[tn]==PRC){echo '次序及刪除';}else if($_SESSION[tn]==EN){echo 'Re-order & Delete';}else{echo '次序及刪除';}?></a>
	<a href="#editor" data-rel="popup" data-transition="pop" class="ui-btn ui-btn-f ui-btn-inline ui-btn-icon-left ui-icon-edit"><?php if($_SESSION[tn]==PRC){echo '图像文字内容';}else if($_SESSION[tn]==EN){echo 'Photo and text content';}else{echo '圖像文字內容';}?></a>
	
	<div data-role="popup"  id="editor"><ul data-role="listview" data-corners="false" data-inset="true">	
	<li><a href="editor.php?ap=<?php echo htmlspecialchars($ap) ?>&pj=<?php echo  htmlspecialchars($pj) ?>&tl=<?php echo htmlspecialchars($tl+1) ?>" class="ui-btn ui-btn-f ui-btn-inline ui-btn-icon-left ui-icon-edit" data-ajax="false"><?php if($_SESSION[tn]==PRC){echo '文字编辑器';}else if($_SESSION[tn]==EN){echo 'Content Editor';}else{echo '文字編輯器';}?> <?php if($_SESSION[tn]==PRC){echo '[属panel内菜单的应用页]';}else if($_SESSION[tn]==EN){echo '[APP page on panel menu]';}else{echo '[屬panel內菜單的應用頁]';}?></a></li>
	<li><a href="editorifr.php?ap=<?php echo htmlspecialchars($ap) ?>&pj=<?php echo  htmlspecialchars($pj) ?>&tl=<?php echo htmlspecialchars($tl+1) ?>" class="ui-btn ui-btn-f ui-btn-inline ui-btn-icon-left ui-icon-edit" data-ajax="false"><?php if($_SESSION[tn]==PRC){echo '文字编辑器';}else if($_SESSION[tn]==EN){echo 'Content Editor';}else{echo '文字編輯器';}?> <?php if($_SESSION[tn]==PRC){echo '[不属panel內菜单的应用页,用於iframe及popup的内容]';}else if($_SESSION[tn]==EN){echo '[APP page is not on panel menu and is for content of iframe and popup]';}else{echo '[不屬panel內菜單的應用頁,用於iframe及popup的內容]';}?></a></li>
	</ul></div> 
	
	<a href="#vd" data-rel="popup" data-transition="pop" class="ui-btn ui-btn-f ui-btn-inline ui-btn-icon-left ui-icon-edit"><?php if($_SESSION[tn]==PRC){echo '音频/視頻';}else if($_SESSION[tn]==EN){echo 'Audio/Video';}else{echo '音頻/視頻';}?></a>
	
	<div data-role="popup"  id="vd"><ul data-role="listview" data-corners="false" data-inset="true">	
	<li>	<a href="audio.php?ap=<?php echo htmlspecialchars($ap) ?>&pj=<?php echo  htmlspecialchars($pj) ?>&tl=<?php echo  htmlspecialchars($tl+1) ?>" class="ui-btn ui-btn-f ui-btn-inline ui-btn-icon-left ui-icon-edit" data-ajax="false"><?php if($_SESSION[tn]==PRC){echo '互联/内联音频';}else if($_SESSION[tn]==EN){echo 'Internet/Intranet Audio';}else{echo '互聯/內聯音頻';}?></a></li>
	<li><a href="video.php?ap=<?php echo htmlspecialchars($ap) ?>&pj=<?php echo  htmlspecialchars($pj) ?>&tl=<?php echo  htmlspecialchars($tl+1) ?>" class="ui-btn ui-btn-f ui-btn-inline ui-btn-icon-left ui-icon-edit" data-ajax="false"><?php if($_SESSION[tn]==PRC){echo '互联視頻';}else if($_SESSION[tn]==EN){echo 'Internet Video';}else{echo '互聯視頻';} echo $ajaxs;?></a></li>
	<li><a href="playlist.php?ap=<?php echo htmlspecialchars($ap) ?>&pj=<?php echo  htmlspecialchars($pj) ?>&tl=<?php echo  htmlspecialchars($tl+1) ?>" class="ui-btn ui-btn-f ui-btn-inline ui-btn-icon-left ui-icon-edit" data-ajax="false"><?php if($_SESSION[tn]==PRC){echo '音频播放及附件列表';}else if($_SESSION[tn]==EN){echo 'Audio Playlist and Document List';}else{echo '音頻播放及附件列表';} echo $ajaxs;?></a></li>
	</ul></div> 
	
	<a href="#popuppic" data-rel="popup" data-transition="pop" class="ui-btn ui-btn-f ui-btn-inline ui-btn-icon-left ui-icon-edit"><?php if($_SESSION[tn]==PRC){echo '相片格';}else if($_SESSION[tn]==EN){echo 'Photo Grid';}else{echo '相片格';}?></a>
	
	<div data-role="popup"  id="popuppic">
	<ul data-role="listview" data-corners="false" data-inset="true">	
	<li><a href="popuppic.php?ap=<?php echo htmlspecialchars($ap) ?>&pj=<?php echo  htmlspecialchars($pj) ?>&tl=<?php echo  htmlspecialchars($tl+1) ?>" class="ui-btn ui-btn-f ui-btn-inline ui-btn-icon-left ui-icon-edit" data-ajax="false"><?php if($_SESSION[tn]==PRC){echo 'Popup相片格 - 相片形式';}else if($_SESSION[tn]==EN){echo 'Popup Photo Grid - picture style';}else{echo 'Popup相片格 - 相片形式';}?></a></li>
	<li><a href="popuppics.php?ap=<?php echo htmlspecialchars($ap) ?>&pj=<?php echo  htmlspecialchars($pj) ?>&tl=<?php echo  htmlspecialchars($tl+1) ?>" class="ui-btn ui-btn-f ui-btn-inline ui-btn-icon-left ui-icon-edit" data-ajax="false"><?php if($_SESSION[tn]==PRC){echo 'Popup相片格 - 按鈕形式';}else if($_SESSION[tn]==EN){echo 'Popup Photo Grid - button style';}else{echo 'Popup相片格 - 按鈕形式';} echo $ajaxs;?></a></li>	
	<li><a href="popuppics.php?ap=<?php echo htmlspecialchars($ap) ?>&pj=<?php echo  htmlspecialchars($pj) ?>&tl=<?php echo  htmlspecialchars($tl+1) ?>" class="ui-btn ui-btn-f ui-btn-inline ui-btn-icon-left ui-icon-edit" data-ajax="false"><?php if($_SESSION[tn]==PRC){echo '相片按钮 - 电邮/电话';}else if($_SESSION[tn]==EN){echo 'Grid button - email/phone';}else{echo '相片按鈕 - 電郵/電話';} echo $ajaxs;?></a></li>	
	<li><a href="gridpic.php?ap=<?php echo htmlspecialchars($ap) ?>&pj=<?php echo  htmlspecialchars($pj) ?>&tl=<?php echo  htmlspecialchars($tl+1) ?>" class="ui-btn ui-btn-f ui-btn-inline ui-btn-icon-left ui-icon-edit" data-ajax="false"><?php if($_SESSION[tn]==PRC){echo '相片格[放大功能]';}else if($_SESSION[tn]==EN){echo 'Photo Grid[Enlarging function]';}else{echo '相片格[放大功能]';} echo $ajaxs;?></a></li>	
	<li><a href="gridswip.php?ap=<?php echo htmlspecialchars($ap) ?>&pj=<?php echo  htmlspecialchars($pj) ?>&tl=<?php echo  htmlspecialchars($tl+1) ?>" class="ui-btn ui-btn-f ui-btn-inline ui-btn-icon-left ui-icon-edit" data-ajax="false"><?php if($_SESSION[tn]==PRC){echo '相簿[放大功能]';}else if($_SESSION[tn]==EN){echo 'Album[Enlarging function]';}else{echo '相簿[放大功能]';} echo $ajaxs;?></a></li>	
	</ul>
	</div> 
	
<a href="#albumowl" data-rel="popup" data-transition="pop" class="ui-btn ui-btn-f ui-btn-inline ui-btn-icon-left ui-icon-edit"><?php if($_SESSION[tn]==PRC){echo '相簿';}else if($_SESSION[tn]==EN){echo 'Album';}else{echo '相簿';}?></a>

	
	<div data-role="popup"  id="albumowl">
	<ul data-role="listview" data-corners="false" data-inset="true">	
	<li><a href="albumowl.php?ap=<?php echo htmlspecialchars($ap) ?>&pj=<?php echo  htmlspecialchars($pj) ?>&tl=<?php echo  htmlspecialchars($tl+1) ?>" class="ui-btn ui-btn-f ui-btn-inline ui-btn-icon-left ui-icon-edit" data-ajax="false"><?php if($_SESSION[tn]==PRC){echo 'Swipeable相簿';}else if($_SESSION[tn]==EN){echo 'Swipeable Album';}else{echo 'Swipeable相簿';}?></a></li>	
	<li><a href="popuppic.php?ap=<?php echo htmlspecialchars($ap) ?>&pj=<?php echo  htmlspecialchars($pj) ?>&tl=<?php echo  htmlspecialchars($tl+1) ?>&owl=1" class="ui-btn ui-btn-f ui-btn-inline ui-btn-icon-left ui-icon-edit" data-ajax="false"><?php if($_SESSION[tn]==PRC){echo 'Popup相片形式 - 相簿[应用数据]';}else if($_SESSION[tn]==EN){echo 'Popup picture style - album[APP data]';}else{echo 'Popup相片形式 - 相簿[應用數據]';}?></a></li>
	<li><a href="popuppics.php?ap=<?php echo htmlspecialchars($ap) ?>&pj=<?php echo  htmlspecialchars($pj) ?>&tl=<?php echo  htmlspecialchars($tl+1) ?>&owl=1" class="ui-btn ui-btn-f ui-btn-inline ui-btn-icon-left ui-icon-edit" data-ajax="false"><?php if($_SESSION[tn]==PRC){echo 'Popup按鈕形式 - 相簿[互联数据]';}else if($_SESSION[tn]==EN){echo 'Popup button style - album[Internet data]';}else{echo 'Popup按鈕形式 - 相簿[互聯數據]';} echo $ajaxs;?></a></li>
	</ul>
	</div> 	
	
	
	<a href="tabs.php?ap=<?php echo htmlspecialchars($ap) ?>&pj=<?php echo  htmlspecialchars($pj) ?>&tl=<?php echo  htmlspecialchars($tl+1) ?>" class="ui-btn ui-btn-f ui-btn-inline ui-btn-icon-left ui-icon-edit" data-ajax="false"><?php if($_SESSION[tn]==PRC){echo 'Tabs标签';}else if($_SESSION[tn]==EN){echo 'Tabs';}else{echo 'Tabs標簽';}?></a>
	
	<a href="tabn.php?ap=<?php echo htmlspecialchars($ap) ?>&pj=<?php echo  htmlspecialchars($pj) ?>" class="ui-btn ui-btn-b ui-btn-inline ui-btn-icon-left ui-icon-edit" data-ajax="false"><?php if($_SESSION[tn]==PRC){echo '标签导航/屏高内容/内容段合拼';}else if($_SESSION[tn]==EN){echo 'Tab Navigation/Fit screen[viewport] height/content merging';}else{echo '標簽導航/屏高內容/內容段合拼';}?></a>
	
	
	<a href="#ifr" class="ui-btn ui-btn-f ui-btn-inline ui-btn-icon-left ui-icon-edit" data-rel="popup" data-transition="pop"><?php if($_SESSION[tn]==PRC){echo '嵌入內容/导航浏览相片';}else if($_SESSION[tn]==EN){echo 'Web/Picture Navigation';}else{echo '嵌入內容/導航瀏覽相片';}?></a>
	
	<div data-role="popup" id="ifr">
	<ul data-role="listview" data-inset="true">	
	<li><a href="ifrhtml.php?ap=<?php echo htmlspecialchars($ap) ?>&pj=<?php echo  htmlspecialchars($pj) ?>&tl=<?php echo  htmlspecialchars($tl+1) ?>" class="ui-btn ui-btn-f ui-btn-inline ui-btn-icon-left ui-icon-edit" data-ajax="false"><?php if($_SESSION[tn]==PRC){echo 'Page iframe - 嵌入网页';}else if($_SESSION[tn]==EN){echo 'Page iframe - Embed web page';}else{echo 'Page iframe - 嵌入網頁';}?></a></li>
	<li><a href="ifrpic.php?ap=<?php echo htmlspecialchars($ap) ?>&pj=<?php echo  htmlspecialchars($pj) ?>&tl=<?php echo  htmlspecialchars($tl+1) ?>" class="ui-btn ui-btn-f ui-btn-inline ui-btn-icon-left ui-icon-edit" data-ajax="false"><?php if($_SESSION[tn]==PRC){echo '嵌入相片浏览';}else if($_SESSION[tn]==EN){echo 'Embedded picture navigation';}else{echo '嵌入相片瀏覽';}?></a></li>
	</ul>
	</div> 
	
	<a href="#vw" class="ui-btn ui-btn-f ui-btn-inline ui-btn-icon-left ui-icon-edit"  data-rel="popup" data-transition="pop"><?php if($_SESSION[tn]==PRC){echo '选项按钮/项目列表';}else if($_SESSION[tn]==EN){echo 'Option button/Listview';}else{echo '選項按鈕/項目列表';}?></a>
	
	<div data-role="popup" id="vw">
	<ul data-role="listview" data-inset="true">	
	<li><a href="listview.php?ap=<?php echo htmlspecialchars($ap) ?>&pj=<?php echo  htmlspecialchars($pj) ?>&tl=<?php echo  htmlspecialchars($tl+1) ?>" class="ui-btn ui-btn-f ui-btn-inline ui-btn-icon-left ui-icon-edit" data-ajax="false"><?php if($_SESSION[tn]==PRC){echo '项目列表';}else if($_SESSION[tn]==EN){echo 'Listview';}else{echo '項目列表';}?></a></li>
	<li><a href="filter.php?ap=<?php echo htmlspecialchars($ap) ?>&pj=<?php echo  htmlspecialchars($pj) ?>&tl=<?php echo  htmlspecialchars($tl+1) ?>" class="ui-btn ui-btn-f ui-btn-inline ui-btn-icon-left ui-icon-edit" data-ajax="false"><?php if($_SESSION[tn]==PRC){echo '项目列表搜寻';}else if($_SESSION[tn]==EN){echo 'Listview filter';}else{echo '項目列表搜尋';}?></a></li>

	<li><a href="listviewn.php?ap=<?php echo htmlspecialchars($ap) ?>&pj=<?php echo  htmlspecialchars($pj) ?>&sn=1&tl=<?php echo  htmlspecialchars($tl+1) ?>" class="ui-btn ui-btn-f ui-btn-inline ui-btn-icon-left ui-icon-edit" data-ajax="false"><?php if($_SESSION[tn]==PRC){echo '选项按钮';}else if($_SESSION[tn]==EN){echo 'Option button';}else{echo '選項按鈕';}?></a></li>
	</ul>
	</div> 
	
		
	<a href="#calendar" class="ui-btn ui-btn-f ui-btn-inline ui-btn-icon-left ui-icon-edit"  data-rel="popup" data-transition="pop"><?php if($_SESSION[tn]==PRC){echo '日历';}else if($_SESSION[tn]==EN){echo 'Calendar';}else{echo '日曆';} echo $ajaxs;?></a>
	<div data-role="popup" id="calendar">
	<ul data-role="listview" data-inset="true">	
	<li><a href="calendar.php?ap=<?php echo htmlspecialchars($ap) ?>&pj=<?php echo  htmlspecialchars($pj) ?>&tl=<?php echo  htmlspecialchars($tl+1) ?>" class="ui-btn ui-btn-f ui-btn-inline ui-btn-icon-left ui-icon-edit" data-ajax="false"><?php if($_SESSION[tn]==PRC){echo '日历';}else if($_SESSION[tn]==EN){echo 'Calendar';}else{echo '日曆';} echo $ajaxs;?></a></li>
	<li><a href="gt.php?ap=<?php echo htmlspecialchars($ap) ?>&pj=<?php echo  htmlspecialchars($pj) ?>&tl=<?php echo  htmlspecialchars($tl+1) ?>" class="ui-btn ui-btn-f ui-btn-inline ui-btn-icon-left ui-icon-edit" data-ajax="false"><?php if($_SESSION[tn]==PRC){echo '项目日历 [日历功能及数据型式]';}else if($_SESSION[tn]==EN){echo 'Project Calendar [calendar function and data showing]';}else{echo '項目日曆 [日曆功能及數據型式]';} echo $ajaxs;?></a></li>
	<li><a href="gt.php?ap=<?php echo htmlspecialchars($ap) ?>&pj=<?php echo  htmlspecialchars($pj) ?>&tl=<?php echo  htmlspecialchars($tl+1) ?>" class="ui-btn ui-btn-f ui-btn-inline ui-btn-icon-left ui-icon-edit" data-ajax="false"><?php if($_SESSION[tn]==PRC){echo '项目日历 [数据显示型式]';}else if($_SESSION[tn]==EN){echo 'Project Calendar [data showing only]';}else{echo '項目日曆 [數據顯示型式]';} echo $ajaxs;?></a></li>
	</ul>
	</div>
	
	
	<a href="#qr" class="ui-btn ui-btn-f ui-btn-inline ui-btn-icon-left ui-icon-edit"  data-rel="popup" data-transition="pop"><?php if($_SESSION[tn]==PRC){echo 'QR二维码';}else if($_SESSION[tn]==EN){echo 'QR Code';}else{echo 'QR二維碼';}?></a>
	<div data-role="popup" id="qr">
	<ul data-role="listview" data-inset="true">	
	<li><a href="qr.php?ap=<?php echo htmlspecialchars($ap) ?>&pj=<?php echo  htmlspecialchars($pj) ?>&tl=<?php echo  htmlspecialchars($tl+1) ?>" class="ui-btn ui-btn-f ui-btn-inline ui-btn-icon-left ui-icon-edit" data-ajax="false"><?php if($_SESSION[tn]==PRC){echo 'QR二维码';}else if($_SESSION[tn]==EN){echo 'QR Code';}else{echo 'QR二維碼';}?></a></li>
	<li><a href="form.php?ap=<?php echo htmlspecialchars($ap) ?>&pj=<?php echo  htmlspecialchars($pj) ?>&tl=<?php echo  htmlspecialchars($tl+1) ?>" class="ui-btn ui-btn-f ui-btn-inline ui-btn-icon-left ui-icon-edit" data-ajax="false"><?php if($_SESSION[tn]==PRC){echo 'QR二维码';}else if($_SESSION[tn]==EN){echo 'QR Code';}else{echo 'QR二維碼';}?> [<?php if($_SESSION[tn]==PRC){echo '使用多选项';}else if($_SESSION[tn]==EN){echo 'Use multiple options';}else{echo '使用多選項';}?>]</a></li></ul>
	</div>

	<a href="form.php?ap=<?php echo htmlspecialchars($ap) ?>&pj=<?php echo  htmlspecialchars($pj) ?>&tl=<?php echo  htmlspecialchars($tl+1) ?>" class="ui-btn ui-btn-f ui-btn-inline ui-btn-icon-left ui-icon-edit" data-ajax="false"><?php if($_SESSION[tn]==PRC){echo '表格';}else if($_SESSION[tn]==EN){echo 'Form';}else{echo '表格';}?></a>

	<a href="playground.php?ap=<?php echo htmlspecialchars($ap) ?>&pj=<?php echo  htmlspecialchars($pj) ?>&tl=<?php echo  htmlspecialchars($tl+1) ?>" class="ui-btn ui-btn-f ui-btn-inline ui-btn-icon-left ui-icon-edit" data-ajax="false"><?php if($_SESSION[tn]==PRC){echo '游戏';}else if($_SESSION[tn]==EN){echo 'playground';}else{echo '遊戲';}?></a>

	<a href="dw.php?ap=<?php echo htmlspecialchars($ap) ?>&pj=<?php echo  htmlspecialchars($pj) ?>&tl=<?php echo  htmlspecialchars($tl+1) ?>" class="ui-btn ui-btn-f ui-btn-inline ui-btn-icon-left ui-icon-edit" data-ajax="false"><?php if($_SESSION[tn]==PRC){echo '相片画布';}else if($_SESSION[tn]==EN){echo 'Drawer';}else{echo '相片畫布';} echo $ajaxs;?></a>

<hr>
	<?php
	
	
	 
	if(strpos($roww[bg],'http://')!==false or strpos($roww[bg],'https://')!==false){$images = '';}else{$images = '../panel/'.$pj.'/images/';}
	
	if(strpos($roww[bg],'#')!==false or strpos($roww[bg],'rgba(')!==false  or strpos($roww[bg],'rgb(')!==false){$bghtml = 'background-color:'.htmlspecialchars($roww[bg]).';';}
	else if(strpos($roww[bg],'[xy]')!==false){$bghtml = 'background-image:url('.$images.htmlspecialchars($roww[bg]).');';}
	else{$bghtml = 'background-image:url('.$images.htmlspecialchars($roww[bg]).');background-size:100%;background-repeat:repeat-y;';}
	
	$html = str_replace('background-image:url(images/','background-image:url(../panel/'.$pj.'/images/',$html);
	$html = str_replace('src="images/','src=../panel/'.$pj.'/images/',$html);
	$html = str_replace('src="http','src=http',$html);
	$html = str_replace('src="','src="../panel/'.$pj.'/',$html);
	$html = str_replace('src="../panel/'.$pj.'/css','src="css',$html);
	$html = str_replace('src="../panel/'.$pj.'/data:','src="data:',$html);
	$html = str_replace('src=../panel/','src="../panel/',$html);
	$html = str_replace('src=http','src="http',$html);
	$html = str_replace('../panel/'.$pj.'/css/images/ajax-loader.gif','css/images/ajax-loader.gif',$html);
	
			if($roww[font]){
				if(strpos($roww[font],'[b]')!=false){
				$bold = 'font-weight:bold;';
				$roww[font]=str_replace('[b]','',$roww[font]);}
				$font = 'color:'.htmlspecialchars($roww[font]).';'.$bold;
			}else{$font = '';$bold = '';}	
						
	echo '<div style="'.$font.$bghtml.'">'.$html.'</div>';
	;}//if($pj){?>
	

	<div data-role="popup" id="appcreate" style="min-width:300px" data-theme="f"><a href="#" class="ui-btn ui-corner-all ui-icon-delete ui-btn-icon-notext ui-btn-right" data-rel="back"></a>	
	<br><br>
	<p style="color:black"><?php if($_SESSION[tn]==PRC){echo '此时此教程巳创建二页应用页。但在设计时，您须在\'应用页称\'填应用页名并送交，并再点撀\'应用页列表\'及\'编写应用页\'，重覆步骤创建另一应用页。';}else if($_SESSION[tn]==EN){echo 'Two APP page was created by this tutorial. When designing APP, you need to fill in the \'Page title\' and click the SEND button. Then you need to click the \'APP Page List\' and \'Create New Function Page\' and repeat these steps for creating the second APP page.';}else{echo '此時此教程巳創建二頁應用頁。但在設計時，您須在\'應用頁稱\'填應用頁名並送交，並再點撀\'應用頁列表\'及\'編寫應用頁\'，重覆步驟創建另一應用頁。';}?></p>
	
	<p style="color:black"><?php if($_SESSION[tn]==PRC){echo '在设计时，点撀此页的\'应用页列表\'并在列表点撀相关的应用页,能对应用页资料作修改。此应用页的内容显示在此页底部,内容上有修改按钮,点撀按钮能进入相关功能的编辑页作内容修改。';}else if($_SESSION[tn]==EN){echo 'You need to click the \'APP Page List\' and the related APP page title to go to APP function editing page to amend APP page data when designing APP. The APP page content will be showed on the bottom of this page. You can click the Amend button to amend the content on the related function editing page.';}else{echo '在設計時，點撀此頁的\'應用頁列表\'並在列表點撀相關的應用頁,能對應用頁資料作修改。此應用頁的內容顯示在此頁底部,內容上有修改按鈕,點撀按鈕能進入相關功能的編輯頁作內容修改。';}?></p>	
	
	<p style="color:black"><?php if($_SESSION[tn]==PRC){echo '在设计时，若只创建应用页资料,您能在此页点撀相应功能的按钮,对应用页编写该功能的内容,您能对应用页添加多个功能内容,但须注意限制,特别是AJAX限制,编写时在此页有提示。';}else if($_SESSION[tn]==EN){echo 'When APP page data created, you can add different functional content to the APP page by clicking the editing button of related function. But you need to follow the restriction instruction on this page, particularly about the AJAX restriction.';}else{echo '在設計時，若只創建應用頁資料,您能在此頁點撀相應功能的按鈕,對應用頁編寫該功能的內容,您能對應用頁添加多個功能內容,但須注意限制,特別是AJAX限制,編寫時在此頁有提示。';}?></p>	
		
	<p style="color:black"><?php if($_SESSION[tn]==PRC){echo '在完成所有应用设计并巳进行预览测试，点撀此页的\'目录\'并点撀\'设计步骤\',返到首页。再点撀\'菜单设计\'及相关专案,将应用页的链结加到应用菜单上。';}else if($_SESSION[tn]==EN){echo 'After design completion of all APP pages and previewing and testing them, you need to click the \'Menu\' and the \'Design Step\' to go to first editing page. You need to click the \'APP menu design\' and related project title on the list and add the link of APP pages to the APP menu.';}else{echo '在完成所有應用設計並巳進行預覽測試，點撀此頁的\'目錄\'並點撀\'設計步驟\',返到首頁。再點撀\'菜單設計\'及相關專案,將應用頁的鏈結加到應用菜單上。';}?></p>	
	
	<p><a href="menudesign.php?pj=<?php echo $pj?>&tut=1" data-ajax="false" class="ui-btn ui-btn-f ui-btn-inline ui-corner-all ui-mini" style="color:black;"><?php if($_SESSION[tn]==PRC){echo '下一步 - 到应用菜单编辑页';}else if($_SESSION[tn]==EN){echo 'Next step - APP menu editing page';}else{echo '下一步 - 到應用菜單編輯頁';}?></a></p>	
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

	<script src="../js/appsystem.js"></script>	
<script>$('#webhtml').css('max-height',$(window).height()*0.85);</script>
<?php 
	if(file_exists('../panel/'.$pj.'/web'.$apvlu.'.js'))echo '<script>localStorage.clear();$(document).on("pageshow", "#appageone", function(){'
   .$webjs.'});</script>';


$tdy=0;
$tdy=date('Y-m-d');
if($_POST[title] and $_POST[pj] and $_SESSION[guanyin1] and $_SESSION[guanyin1]==$_POST[guanyin1]){

	
	if($ap and !preg_match('/^[0-9]*$/', $ap))exit;
	if($pj and !preg_match('/^[0-9]*$/', $pj))exit;
	
	if($_POST[hidden]=='d' and $ap){
		$db->exec("delete from webhtml where cno='$ap';");
	}else if($_POST[appcopy] and preg_match('/^[0-9]*$/', $_POST[appcopy]) and $_POST[pj] and preg_match('/^[0-9]*$/', $_POST[pj])){
		$sql=$db->query("select * from webhtml where cno='$_POST[appcopy]'");
			if($sql)$row=$sql->fetch();
			
			$sql=$db->exec("insert into webhtml (title,des,hidden,date,pjnbr,theme,style,fllscr)"."values('$_POST[title]','$_POST[des]','1','$tdy','$_POST[pj]','$row[theme]','$row[style]','$row[fllscr]')"); 
		
		
			$sqls=$db->query("select max(cno) as cno from webhtml");
			if($sqls)$rows=$sqls->fetch();
			$db->exec("update webhtml set ap='$rows[cno]' where cno='$rows[cno]'");
			
			if($row[pjn])$row[pjnbr] = $row[pjn];
			if($row[apn])$row[ap] = $row[apn];
			
			if($row[pjnbr] and !preg_match('/^[0-9]*$/', $row[pjnbr]))exit;
			if($row[ap] and !preg_match('/^[0-9]*$/', $row[ap]))exit;
		
		if($row[style]!='apps'){
		if(file_exists('../panel/'.$row[pjnbr].'/panel'.$row[ap].'.html')){
			$htmpanel = file_get_contents('../panel/'.$row[pjnbr].'/panel'.$row[ap].'.html');
			
			if(strpos($htmpanel,'<!--formhtml!-->')==true){
				$formhtm = explode('<!--formhtml!-->',$htmpanel);	
				$formhtm[0] = str_replace('id="'.$row[pjnbr].$row[ap],'id="'.$_POST[pj].$rows[cno],$formhtm[0]);	
				$formhtm[0] = str_replace('class="'.$row[pjnbr].$row[ap],'class="'.$_POST[pj].$rows[cno],$formhtm[0]);
				$formhtm[0] = str_replace('href="#'.$row[pjnbr].$row[ap],'href="#'.$_POST[pj].$rows[cno],$formhtm[0]);			
		
				$formhtm[2] = str_replace('id="'.$row[pjnbr].$row[ap],'id="'.$_POST[pj].$rows[cno],$formhtm[2]);	
				$formhtm[2] = str_replace('class="'.$row[pjnbr].$row[ap],'class="'.$_POST[pj].$rows[cno],$formhtm[2]);
				$formhtm[2] = str_replace('href="#'.$row[pjnbr].$row[ap],'href="#'.$_POST[pj].$rows[cno],$formhtm[2]);
				$htmpanel = $formhtm[0].'<!--formhtml!-->'.$formhtm[1].'<!--formhtml!-->'.$formhtm[2];
				$formhtm[0]='';$formhtm[1]='';$formhtm[2]='';
			;}else{
				$htmpanel = str_replace('id="'.$row[pjnbr].$row[ap],'id="'.$_POST[pj].$rows[cno],$htmpanel);	
				$htmpanel = str_replace('class="'.$row[pjnbr].$row[ap],'class="'.$_POST[pj].$rows[cno],$htmpanel);
				$htmpanel = str_replace('href="#'.$row[pjnbr].$row[ap],'href="#'.$_POST[pj].$rows[cno],$htmpanel);				
			;}
			
			file_put_contents('../panel/'.$_POST[pj].'/panel'.$rows[cno].'.html',$htmpanel);	
			$htmpanel='';
		}
		
		if(file_exists('../panel/'.$row[pjnbr].'/tabn'.$row[ap].'.html')){
			$htmtabn = file_get_contents('../panel/'.$row[pjnbr].'/tabn'.$row[ap].'.html');
			$htmtabn = str_replace('id="'.$row[pjnbr].$row[ap],'id="'.$_POST[pj].$rows[cno],$htmtabn);	
			$htmtabn = str_replace('class="'.$row[pjnbr].$row[ap],'class="'.$_POST[pj].$rows[cno],$htmtabn);
			$htmtabn = str_replace('href="#'.$row[pjnbr].$row[ap],'href="#'.$_POST[pj].$rows[cno],$htmtabn);			
			file_put_contents('../panel/'.$_POST[pj].'/tabn'.$rows[cno].'.html',$htmtabn);	
			$htmtabn='';
		}
		
		
		
		if(file_exists('../panel/'.$row[pjnbr].'/'.$row[ap].'.html')){
		$htm = file_get_contents('../panel/'.$row[pjnbr].'/'.$row[ap].'.html');
		$htmjs = file_get_contents('../panel/'.$row[pjnbr].'/web'.$row[ap].'.js');
			//$htm = str_replace('id="'.$row[pjnbr].$row[ap].'vnts','id="'.$_POST[pj].$rows[cno].'vnts',$htm);
			$htm = str_replace('data-popup="#'.$row[pjnbr].$row[ap],'data-popup="#'.$_POST[pj].$rows[cno],$htm);
			
			$htmjs = str_replace('$(".'.$row[pjnbr].$row[ap],'$(".'.$_POST[pj].$rows[cno],$htmjs);
			$htmjs = str_replace('.find(".'.$row[pjnbr].$row[ap],'.find(".'.$_POST[pj].$rows[cno],$htmjs);
			$htmjs = str_replace('$("#'.$row[pjnbr].$row[ap],'$("#'.$_POST[pj].$rows[cno],$htmjs);
			$htmjs = str_replace('.find("#'.$row[pjnbr].$row[ap],'.find("#'.$_POST[pj].$rows[cno],$htmjs);

			
			if(strpos($htm,'<!--sysgridpicsys!-->')==true){
			$htmjs = str_replace('gridpicdata("'.$row[pjnbr].$row[ap].'"','gridpicdata("'.$_POST[pj].$rows[cno].'"',$htmjs);
			$htmjs = str_replace('gridpic("'.$row[pjnbr].$row[ap].'"','gridpic("'.$_POST[pj].$rows[cno].'"',$htmjs);
			$htmjs = str_replace('Swiper("#'.$row[pjnbr].$row[ap],'Swiper("#'.$_POST[pj].$rows[cno],$htmjs);$Swiper=1;
			}	
			
			if(strpos($htm,'<!--syslistviewsys!-->')==true or strpos($htm,'<!--syslistviewnsys!-->')==true){
			$htm = str_replace('class="'.$row[pjnbr].$row[ap].'sltptn '.$row[pjnbr].$row[ap],'class="'.$_POST[pj].$rows[cno].'sltptn '.$_POST[pj].$rows[cno],$htm);
			$htm = str_replace('<!--panelvws'.$row[ap].'!-->','<!--panelvws'.$rows[cno].'!-->',$htm);		
			$htmjs = str_replace('fastbtn("'.$row[pjnbr].'","'.$row[ap].'"','fastbtn("'.$_POST[pj].'","'.$rows[cno].'"',$htmjs);
			}	
			
			if(strpos($htm,'<!--syseditorsys!-->')==true){
			//$htm = str_replace('id="'.$row[pjnbr].$row[ap].'hgt','id="'.$_POST[pj].$rows[cno].'hgt',$htm);
			$htmjs = str_replace('hgt("'.$row[pjnbr].$row[ap],'hgt("'.$_POST[pj].$rows[cno],$htmjs);	
			$htmjs = str_replace('data-pop="'.$row[pjnbr].$row[ap].'hgt','data-pop="'.$_POST[pj].$rows[cno].'hgt',$htmjs);		
			$htmjs = str_replace('id="'.$row[pjnbr].$row[ap].'hgts','id="'.$_POST[pj].$rows[cno].'hgts',$htmjs);
			$htmjs = str_replace('.append(\'<a href="#'.$row[pjnbr].$row[ap],'.append(\'<a href="#'.$_POST[pj].$rows[cno],$htmjs);				
					
			//$htmjs = str_replace('$("#'.$row[pjnbr].$row[ap].'hgt','$("#'.$_POST[pj].$rows[cno].'hgt',$htmjs);			
			}	
			
			if(strpos($htm,'<!--sysaudiosys!-->')==true){
			$htm = str_replace('id="'.$row[pjnbr].$row[ap].'audt'.$row[ap].'n','id="'.$_POST[pj].$rows[cno].'audt'.$rows[cno].'n',$htm);
			$htm = str_replace('id="'.$row[pjnbr].$row[ap].'auds'.$row[ap].'n','id="'.$_POST[pj].$rows[cno].'auds'.$rows[cno].'n',$htm);	
				if(strpos($htm,'id="'.$row[pjnbr].$row[ap].'playaudio'.$row[ap].'n')==true){
					$htm = str_replace(''.$row[pjnbr].$row[ap].'playaudio'.$row[ap].'n',''.$_POST[pj].$rows[cno].'playaudio'.$rows[cno].'n',$htm);					
					$htm = str_replace('id="'.$row[pjnbr].$row[ap].'volm'.$row[ap].'n','id="'.$_POST[pj].$rows[cno].'volm'.$rows[cno].'n',$htm);	
					$htm = str_replace('id="'.$row[pjnbr].$row[ap].'topos'.$row[ap].'n','id="'.$_POST[pj].$rows[cno].'topos'.$rows[cno].'n',$htm);		
				}
			$htmjs = str_replace('webaudio("'.$row[pjnbr].$row[ap].'","'.$row[ap],'webaudio("'.$_POST[pj].$rows[cno].'","'.$rows[cno],$htmjs);
			}	
				
			if(strpos($htm,'<!--sysvideosys!-->')==true){
			$htmjs = str_replace($row[pjnbr].$row[ap].'pVideo',$_POST[pj].$rows[cno].'pVideo',$htmjs);			
			$htmjs = str_replace('popupvideo("'.$row[pjnbr].$row[ap].'"','popupvideo("'.$_POST[pj].$rows[cno].'"',$htmjs);
			}	
			
			if(strpos($htm,'<!--sysplaylistsys!-->')==true){	
			$htm = str_replace('name="'.$row[pjnbr].$row[ap].'','name="'.$_POST[pj].$rows[cno].'',$htm);			
			$htmjs = str_replace('playing("'.$row[pjnbr].$row[ap].'","'.$row[pjnbr].$row[ap],'playing("'.$_POST[pj].$rows[cno].'","'.$_POST[pj].$rows[cno],$htmjs);			
			$htmjs = str_replace('playlist("'.$row[pjnbr].$row[ap].'","'.$row[pjnbr].$row[ap],'playlist("'.$_POST[pj].$rows[cno].'","'.$_POST[pj].$rows[cno],$htmjs);
			$htmjs = str_replace('playlistv("'.$row[pjnbr].$row[ap].'","'.$row[pjnbr].'","'.$row[pjnbr].$row[ap],'playlistv("'.$_POST[pj].$rows[cno].'","'.$_POST[pj].'","'.$_POST[pj].$rows[cno],$htmjs);
			}	

			if(strpos($htm,'<!--syspopuppicssys!-->')==true){	
			$htmjs = str_replace('popupics("'.$row[pjnbr].$row[ap],'popupics("'.$_POST[pj].$rows[cno],$htmjs);	
			$htmjs = str_replace('popupicsize("'.$row[pjnbr].$row[ap],'popupicsize("'.$_POST[pj].$rows[cno],$htmjs);	
			if(!$Swiper)$htmjs = str_replace('Swiper("#'.$row[pjnbr].$row[ap],'Swiper("#'.$_POST[pj].$rows[cno],$htmjs);
			}	
			
			if(strpos($htm,'<!--syspopuppicsys!-->')==true or strpos($htm,'<!--syspopuppicssys!-->')==true){	
			//$htmjs = str_replace('$(".'.$row[pjnbr].$row[ap].'owlwidth','$(".'.$_POST[pj].$rows[cno].'owlwidth',$htmjs);
			//$htmjs = str_replace('$("#'.$row[pjnbr].$row[ap].'owl','$("#'.$_POST[pj].$rows[cno].'owl',$htmjs);
			$htmjs = str_replace('popupicsize("'.$row[pjnbr].$row[ap],'popupicsize("'.$_POST[pj].$rows[cno],$htmjs);	 
			if(!$Swiper)$htmjs = str_replace('Swiper("#'.$row[pjnbr].$row[ap],'Swiper("#'.$_POST[pj].$rows[cno],$htmjs);
			}	

			if(strpos($htm,'<!--sysgridswipsys!-->')==true){			
			//$htmjs = str_replace('$("#'.$row[pjnbr].$row[ap].'gridimg','$("#'.$_POST[pj].$rows[cno].'gridimg',$htmjs);
			$htmjs = str_replace('gridpic("'.$row[pjnbr].$row[ap].'"','gridpic("'.$_POST[pj].$rows[cno].'"',$htmjs);
			$htmjs = str_replace('gridpicdata("'.$row[pjnbr].$row[ap].'"','gridpicdata("'.$_POST[pj].$rows[cno].'"',$htmjs);
			if(!$Swiper)$htmjs = str_replace('Swiper("#'.$row[pjnbr].$row[ap],'Swiper("#'.$_POST[pj].$rows[cno],$htmjs);
			}	

			if(strpos($htm,'<!--sysalbumowlsys!-->')==true){	
			if(!$Swiper)$htmjs = str_replace('Swiper("#'.$row[pjnbr].$row[ap],'Swiper("#'.$_POST[pj].$rows[cno],$htmjs);
			//$htmjs = str_replace(').find(".'.$row[pjnbr].$row[ap].'imgwidth',').find(".'.$_POST[pj].$rows[cno].'imgwidth',$htmjs);
			//$htmjs = str_replace('$(".'.$row[pjnbr].$row[ap].'imgwidth','$(".'.$_POST[pj].$rows[cno].'imgwidth',$htmjs);
			//$htmjs = str_replace('$("#'.$row[pjnbr].$row[ap].'owl','$("#'.$_POST[pj].$rows[cno].'owl',$htmjs);
			}

			//if(strpos($htm,'<!--sysifrhtmlsys!-->')==true){	
			//$htmjs = str_replace('ifrhtml("'.$row[pjnbr].$row[ap].'","'.$row[pjnbr],'ifrhtml("'.$_POST[pj].$rows[cno].'","'.$_POST[pj],$htmjs);
			//}

			if(strpos($htm,'<!--systabssys!-->')==true){	
			$htmjs = str_replace('tabjs("'.$row[pjnbr].'","#'.$row[pjnbr].$row[ap],'tabjs("'.$_POST[pj].'","#'.$_POST[pj].$rows[cno],$htmjs);	
			$htmjs = str_replace('tabjn("'.$row[pjnbr].'","#'.$row[pjnbr].$row[ap],'tabjn("'.$_POST[pj].'","#'.$_POST[pj].$rows[cno],$htmjs);
			}
			
			if(strpos($htm,'<!--sysifrpicsys!-->')==true){	
			$htmjs = str_replace('ifrp("'.$row[pjnbr].$row[ap],'ifrp("'.$_POST[pj].$rows[cno],$htmjs);	
			$htmjs = str_replace('ifrftnbtn("'.$row[pjnbr].'","'.$row[pjnbr].$row[ap].'"','ifrftnbtn("'.$_POST[pj].'","'.$_POST[pj].$rows[cno].'"',$htmjs);
			$htmjs = str_replace('ifrspin("'.$row[pjnbr].'","'.$row[pjnbr].$row[ap],'ifrspin("'.$_POST[pj].'","'.$_POST[pj].$rows[cno],$htmjs);
			//$htmjs = str_replace(',"#'.$row[pjnbr].$row[ap].'ifr',',"#'.$_POST[pj].$rows[cno].'ifr',$htmjs);
			$htm = str_replace('@#@mpweb'.$row[pjnbr].$row[ap].'n','@#@mpweb'.$_POST[pj].$rows[cno].'n',$htm);
			$htm = str_replace('data-vlu="'.$row[pjnbr].'&&&'.$row[pjnbr].$row[ap],'data-vlu="'.$_POST[pj].'&&&'.$_POST[pj].$rows[cno],$htm);
			$htm = str_replace('data-pop="#'.$row[pjnbr].$row[ap],'data-pop="#'.$_POST[pj].$rows[cno],$htm);
			$htm = str_replace('data-imgn="#'.$row[pjnbr].$row[ap],'data-imgn="#'.$_POST[pj].$rows[cno],$htm);
			$htm = str_replace('data-img="#'.$row[pjnbr].$row[ap],'data-img="#'.$_POST[pj].$rows[cno],$htm);
			$htm = str_replace('ui-icon-navigation '.$row[pjnbr].$row[ap].'ifr','ui-icon-navigation '.$_POST[pj].$rows[cno].'ifr',$htm);
			$htm = str_replace('[**]'.$row[pjnbr].$row[ap].'ifr','[**]'.$_POST[pj].$rows[cno].'ifr',$htm);	
			}

			if(strpos($htm,'<!--sysfiltersys!-->')==true){		
			$htmjs = str_replace('$("#p'.$row[ap].'"','$("#p'.$rows[cno].'"',$htmjs);
			//$htmjs = str_replace('$(".'.$row[pjnbr].$row[ap].'filter','$(".'.$_POST[pj].$rows[cno].'filter',$htmjs);
			//$htmjs = str_replace('$("#'.$row[pjnbr].$row[ap],'$("#'.$_POST[pj].$rows[cno],$htmjs);
			//$htmjs = str_replace('$("#'.$row[pjnbr].$row[ap].'filter','$("#'.$_POST[pj].$rows[cno].'filter',$htmjs);
			//$htmjs = str_replace('$("#'.$row[pjnbr].$row[ap].'gridlistview','$("#'.$_POST[pj].$rows[cno].'gridlistview',$htmjs);
			//$htmjs = str_replace('$("#'.$row[pjnbr].$row[ap].'filtclrslt','$("#'.$_POST[pj].$rows[cno].'filtclrslt',$htmjs);
			//$htmjs = str_replace('$("#'.$row[pjnbr].$row[ap].'filtersh','$("#'.$_POST[pj].$rows[cno].'filtersh',$htmjs);
			//$htmjs = str_replace('$("#'.$row[pjnbr].$row[ap].'filters','$("#'.$_POST[pj].$rows[cno].'filters',$htmjs);
			}	
			
			if(strpos($htm,'<!--syscalendarsys!-->')==true){	
			$htmjs = str_replace('owlReady("'.$row[pjnbr].$row[ap].'"','owlReady("'.$_POST[pj].$rows[cno].'"',$htmjs);	
			$htmjs = str_replace("(d,mnh,day,yr,".$row[pjnbr].$row[ap].','.$row[pjnbr],"(d,mnh,day,yr,".$_POST[pj].$rows[cno].','.$_POST[pj],$htmjs);
			//$htmjs = str_replace('$("#'.$row[pjnbr].$row[ap],'$("#'.$_POST[pj].$rows[cno],$htmjs);
			$htmjs = str_replace('apps("'.$row[pjnbr].$row[ap].'","'.$row[pjnbr],'apps("'.$_POST[pj].$rows[cno].'","'.$_POST[pj],$htmjs);
			$htmjs = str_replace('jsclv("'.$row[pjnbr].$row[ap].'","'.$row[pjnbr],'jsclv("'.$_POST[pj].$rows[cno].'","'.$_POST[pj],$htmjs);// 
			if(!$Swiper)$htmjs = str_replace('Swiper("#'.$row[pjnbr].$row[ap],'Swiper("#'.$_POST[pj].$rows[cno],$htmjs);
			$htmjs = str_replace('.'.$row[pjnbr].$row[ap].'owldtsft','.'.$_POST[pj].$rows[cno].'owldtsft',$htmjs);
			}	

			
			if(strpos($htm,'<!--sysgtsys!-->')==true){		
			$htmjs = str_replace("gtn(d,mnh,day,yr,".$row[pjnbr].$row[ap],"gtn(d,mnh,day,yr,".$_POST[pj].$rows[cno],$htmjs);
			$htmjs = str_replace("gts(d,mnh,day,yr,".$row[pjnbr].$row[ap].",".$row[pjnbr],"gts(d,mnh,day,yr,".$_POST[pj].$rows[cno].",".$_POST[pj],$htmjs);
			$htmjs = str_replace('gts("","","","",'.$row[pjnbr].$row[ap].",".$row[pjnbr],'gts("","","","",'.$_POST[pj].$rows[cno].",".$_POST[pj],$htmjs);
			//$htmjs = str_replace('$("#'.$row[pjnbr].$row[ap],'$("#'.$_POST[pj].$rows[cno],$htmjs);
			//$htmjs = str_replace('$("#'.$row[pjnbr].$row[ap].'owlcln','$("#'.$_POST[pj].$rows[cno].'owlcln',$htmjs);
			//$htmjs = str_replace('$("#'.$row[pjnbr].$row[ap].'owlclns','$("#'.$_POST[pj].$rows[cno].'owlclns',$htmjs);
			//$htmjs = str_replace('$("#'.$row[pjnbr].$row[ap].'gtcalendar','$("#'.$_POST[pj].$rows[cno].'gtcalendar',$htmjs);
			//$htmjs = str_replace('$("#'.$row[pjnbr].$row[ap].'gthref','$("#'.$_POST[pj].$rows[cno].'gthref',$htmjs);
			$htmjs = str_replace('gtndata("'.$row[pjnbr].$row[ap].'","'.$row[pjnbr].'",','gtndata("'.$_POST[pj].$rows[cno].'","'.$_POST[pj].'",',$htmjs);	
			$htmjs = str_replace('gtdata("'.$row[pjnbr].$row[ap].'","'.$row[pjnbr].'",','gtdata("'.$_POST[pj].$rows[cno].'","'.$_POST[pj].'",',$htmjs);	
			//$htmjs = str_replace('Item("'.$row[pjnbr].$row[ap],'Item("'.$_POST[pj].$rows[cno],$htmjs);	
			//$htmjs = str_replace('$("#'.$row[pjnbr].$row[ap].'gtdataform','$("#'.$_POST[pj].$rows[cno].'gtdataform',$htmjs);		
			}	
						
			
			if(strpos($htm,'<!--sysqrsys!-->')==true){		
			
				if(!$qrv){
					if(file_exists('../panel/'.$row[pjnbr].'/qrv'.$row[ap].'.html')){
						copy('../panel/'.$row[pjnbr].'/qrv'.$row[ap].'.html', '../panel/'.$row[pjnbr].'/qrv'.$rows[cno].'.html');
					}
					$qrv=1;
				}
			
			$htmjs = str_replace("qrs(".$row[pjnbr].$row[ap].",","qrs(".$_POST[pj].$rows[cno].",",$htmjs);	
			//$htmjs = str_replace('$("#'.$row[pjnbr].$row[ap].'qrs','$("#'.$_POST[pj].$rows[cno].'qrs',$htmjs);		
			//$htmjs = str_replace('$("#'.$row[pjnbr].$row[ap].'qrspgi','$("#'.$_POST[pj].$rows[cno].'qrspgi',$htmjs);
			//$htmjs = str_replace('$("#'.$row[pjnbr].$row[ap].'qrsvlu','$("#'.$_POST[pj].$rows[cno].'qrsvlu',$htmjs);
			//$htmjs = str_replace('$("#'.$row[pjnbr].$row[ap].'wqrpgivluhns','$("#'.$_POST[pj].$rows[cno].'wqrpgivluhns',$htmjs);
			//$htmjs = str_replace('$("#'.$row[pjnbr].$row[ap].'wqrpgivlu','$("#'.$_POST[pj].$rows[cno].'wqrpgivlu',$htmjs);
			
			}	
			
			if(strpos($htm,'<!--sysformsys!-->')==true){	
			
			
			$htm = str_replace('<!--data#'.$row[pjnbr].$row[ap].'','<!--data#'.$_POST[pj].$rows[cno].'',$htm);
			$htm = str_replace('data-form="'.$row[pjnbr].$row[ap].'','data-form="'.$_POST[pj].$rows[cno].'',$htm);						
			$htm = str_replace('id="qr'.$row[pjnbr].$row[ap],'id="qr'.$_POST[pj].$rows[cno],$htm);
			//$htm = str_replace('data-popup="#'.$row[pjnbr].$row[ap],'data-popup="#'.$_POST[pj].$rows[cno],$htm);	
			$htm = str_replace('name="'.$row[pjnbr].$row[ap].'webform','name="'.$_POST[pj].$rows[cno].'webform',$htm);	
			$htmjs = str_replace('form("'.$row[pjnbr].$row[ap].'"','form("'.$_POST[pj].$rows[cno].'"',$htmjs);
			$htmjs = str_replace('gapform("'.$row[pjnbr].$row[ap].'"','gapform("'.$_POST[pj].$rows[cno].'"',$htmjs);	
			$htmjs = str_replace('webform("'.$row[pjnbr].$row[ap].'"','webform("'.$_POST[pj].$rows[cno].'"',$htmjs);
			$htmjs = str_replace(',"'.$row[ap].'.html',',"'.$rows[cno].'.html',$htmjs);
			$htmjs = str_replace($row[pjnbr].$row[ap].'multipln',$_POST[pj].$rows[cno].'multipln',$htmjs);
			$htmjs = str_replace($row[pjnbr].$row[ap].'singln',$_POST[pj].$rows[cno].'singln',$htmjs);
			$htmjs = str_replace('$'.$row[pjnbr].$row[ap].'alrtform','$'.$_POST[pj].$rows[cno].'alrtform',$htmjs);
			$htmjs = str_replace('$'.$row[pjnbr].$row[ap].'formtxt','$'.$_POST[pj].$rows[cno].'formtxt',$htmjs);
			$htmjs = str_replace('$("#qr'.$row[pjnbr].$row[ap],'$("#qr'.$_POST[pj].$rows[cno],$htmjs);


					
			//$htmjs = str_replace('$("#'.$row[pjnbr].$row[ap].'ifrform','$("#'.$_POST[pj].$rows[cno].'ifrform',$htmjs);
			//$htmjs = str_replace('$(".'.$row[pjnbr].$row[ap].'mleqr','$(".'.$_POST[pj].$rows[cno].'mleqr',$htmjs);
			//$htmjs = str_replace($row[pjnbr].$row[ap].'form',$_POST[pj].$rows[cno].'form',$htmjs);
			//$htmjs = str_replace('$("#qr'.$row[pjnbr].$row[ap].'mleqr','$("#qr'.$_POST[pj].$rows[cno].'mleqr',$htmjs);			
			//$htmjs = str_replace('$("#'.$row[pjnbr].$row[ap].'formtitle','$("#'.$_POST[pj].$rows[cno].'formtitle',$htmjs);
			//$htmjs = str_replace('$("#'.$row[pjnbr].$row[ap].'alrtsform','$("#'.$_POST[pj].$rows[cno].'alrtsform',$htmjs);
			//$htmjs = str_replace('$("#'.$row[pjnbr].$row[ap].'alrtform','$("#'.$_POST[pj].$rows[cno].'alrtform',$htmjs);
			//$htmjs = str_replace('getElementById("'.$row[pjnbr].$row[ap],'getElementById("'.$_POST[pj].$rows[cno],$htmjs);
			}	
			
			
			if(strpos($htm,'<!--sysplaygroundsys!-->')==true){		
			$htmjs = str_replace('rps("'.$row[pjnbr].$row[ap].'"','rps("'.$_POST[pj].$rows[cno].'"',$htmjs);	
			$htmjs = str_replace('bigger("'.$row[pjnbr].$row[ap].'"','bigger("'.$_POST[pj].$rows[cno].'"',$htmjs);	
			$htmjs = str_replace('play("'.$row[pjnbr].$row[ap].'"','play("'.$_POST[pj].$rows[cno].'"',$htmjs);	
			}	

			if(strpos($htm,'<!--sysdwsys!-->')==true){
			$htmjs = str_replace('dwimg("'.$pj.'","'.$row[pjnbr].$row[ap].'"','dwimg("'.$_POST[pj].'","'.$_POST[pj].$rows[cno].'"',$htmjs);	
			}
			
			if(strpos($htmjs,'/*vnts*/')==true){//$htmjs
			//$htmjs = str_replace('$("#'.$row[pjnbr].$row[ap].'tabnmenu','$("#'.$_POST[pj].$rows[cno].'tabnmenu',$htmjs);	
			//$htmjs = str_replace('$("#'.$row[pjnbr].$row[ap].'vnts','$("#'.$_POST[pj].$rows[cno].'vnts',$htmjs);
			//$htmjs = str_replace('$("#'.$row[pjnbr].$row[ap].'auds','$("#'.$_POST[pj].$rows[cno].'auds',$htmjs);
			$htmjs = str_replace('swiper-container-'.$row[pjnbr].$row[ap]."'",'swiper-container-'.$_POST[pj].$rows[cno]."'",$htmjs);
			
			$htmjs = str_replace('audivnts'.$row[pjnbr].$row[ap].'(','audivnts'.$_POST[pj].$rows[cno].'(',$htmjs);
			$htmjs = str_replace("audivnts".$_POST[pj].$rows[cno]."('".$row[pjnbr]."','".$row[ap]."'","audivnts".$_POST[pj].$rows[cno]."('".$_POST[pj]."','".$rows[cno]."'",$htmjs);
		
			}	
																		
			$htmjs = str_replace('Item("'.$row[pjnbr].$row[ap],'Item("'.$_POST[pj].$rows[cno],$htmjs);	
			$htmjs = str_replace('vght('.$row[pjnbr].$row[ap].',"'.$row[pjnbr].'")','vght('.$_POST[pj].$rows[cno].',"'.$_POST[pj].'")',$htmjs);		
			$htmjs = str_replace('\'#web'.$row[ap]."'",'\'#web'.$rows[cno]."'",$htmjs);	
			$htmjs = str_replace('/*ajax'.$row[ap].'ajax*/','/*ajax'.$rows[cno].'ajax*/',$htmjs);		
	
			
			$htm = str_replace('data-pop="'.$row[pjnbr].$row[ap],'data-pop="'.$_POST[pj].$rows[cno],$htm);	
			$htm = str_replace('data-popup="'.$row[pjnbr].$row[ap],'data-popup="'.$_POST[pj].$rows[cno],$htm);							
			$htm = str_replace('id="'.$row[pjnbr].$row[ap],'id="'.$_POST[pj].$rows[cno],$htm);	
			$htm = str_replace('class="'.$row[pjnbr].$row[ap],'class="'.$_POST[pj].$rows[cno],$htm);
			$htm = str_replace('name="'.$row[pjnbr].$row[ap],'name="'.$_POST[pj].$rows[cno],$htm);	
			$htm = str_replace('href="#'.$row[pjnbr].$row[ap],'href="#'.$_POST[pj].$rows[cno],$htm);			
		file_put_contents('../panel/'.$_POST[pj].'/'.$rows[cno].'.html',$htm);	
		$htm='';
		file_put_contents('../panel/'.$_POST[pj].'/web'.$rows[cno].'.js',$htmjs);
		$htmjs='';	
		;}
		;}//if($row[style]!='apps'){
		
		
		if($row[style]=='apps'){
				$htm = file_get_contents('../panel/'.$row[pjnbr].'/'.$row[ap].'.html');	
				file_put_contents('../panel/'.$_POST[pj].'/'.$rows[cno].'.html',$htm);
				$htm = file_get_contents('../panel/'.$row[pjnbr].'/web'.$row[ap].'.html');	
				file_put_contents('../panel/'.$_POST[pj].'/web'.$rows[cno].'.html',$htm);
		}
		 
	}else{
			if($ap){
			$db->exec("update webhtml set title='$_POST[title]',des='$_POST[des]',hidden='$_POST[hidden]',date='$tdy',nbr='$_POST[nbr]',theme='$_POST[theme]',style='$_POST[style]',bg='$_POST[bg]',font='$_POST[font]',fllscr='$_POST[fullscreen]' where cno='$ap'");
			
			if(($_POST[theme] or $roww[theme]) and $_POST[theme]!=$roww[theme]){
			if(file_exists('../panel/'.$roww[pjnbr].'/web'.$roww[ap].'.html')){
			$htm = file_get_contents('../panel/'.$roww[pjnbr].'/web'.$roww[ap].'.html');
			$htm = str_replace('class="page" data-theme="'.htmlspecialchars($roww[theme]).'"','class="page" data-theme="'.htmlspecialchars($_POST[theme]).'"',$htm);
			file_put_contents('../panel/'.$roww[pjnbr].'/web'.$roww[ap].'.html',$htm);
			;};}
			
			if(($_POST[bg] or $roww[bg]) and $_POST[bg]!=$roww[bg]){
			if(file_exists('../panel/'.$roww[pjnbr].'/web'.$roww[ap].'.html')){
			$htm = file_get_contents('../panel/'.$roww[pjnbr].'/web'.$roww[ap].'.html');
			if($roww[bg]){
				if(strpos($roww[bg],'http://')!==false or strpos($roww[bg],'https://')!==false){$images = '';}else{$images = 'images/';}
			
				if(strpos($roww[bg],'#')!==false or strpos($roww[bg],'rgba(')!==false  or strpos($roww[bg],'rgb(')!==false){$bghtml = 'background-color:'.htmlspecialchars($roww[bg]).';';}
				else if(strpos($roww[bg],'[xy]')!==false){$bghtml = 'background-image:url('.$images.htmlspecialchars($roww[bg]).');';}
				else{$bghtml = 'background-image:url('.$images.htmlspecialchars($roww[bg]).');background-size:100%;background-repeat:repeat-y;';}
				$bgstyle = 'style="'.$bghtml.'"';
			}
			
			if($_POST[bg]){
				if(strpos($_POST[bg],'http://')!==false or strpos($_POST[bg],'https://')!==false){$images = '';}else{$images = 'images/';}
			
				if(strpos($_POST[bg],'#')!==false or strpos($_POST[bg],'rgba(')!==false  or strpos($_POST[bg],'rgb(')!==false){$bghtml = 'background-color:'.htmlspecialchars($_POST[bg]).';';}
				else if(strpos($_POST[bg],'[xy]')!==false){$bghtml = 'background-image:url('.$images.htmlspecialchars($_POST[bg]).');';}
				else{$bghtml = 'background-image:url('.$images.htmlspecialchars($_POST[bg]).');background-size:100%;background-repeat:repeat-y;';}
				$bgstyln = 'style="'.$bghtml.'"';
			}else{
				$bgstyln = '';
			}
			
			if($bgstyle){
				$htm = str_replace($bgstyle,$bgstyln,$htm);}
			else{
				if($bgstyln)$htm = str_replace('class="page" data-theme="'.htmlspecialchars($_POST[theme]).'"','class="page" data-theme="'.htmlspecialchars($_POST[theme]).'" '.$bgstyln,$htm);
			}
			
			;};}
			
			if($bgstyln)file_put_contents('../panel/'.$roww[pjnbr].'/web'.$roww[ap].'.html',$htm);
			
			;}else{
			//$sql=$db->exec("insert into webhtml (title,des,typ,hidden,date,pjnbr,nbr,fllscr)"."values('$_POST[title]','$_POST[des]','','1','$tdy','$_POST[pj]','$_POST[nbr]','$_POST[fullscreen]')"); 
			
			$sql=$db->exec("insert into webhtml (title,des,typ,hidden,date,pjnbr,nbr,fllscr,style)"."values('$_POST[title]','$_POST[des]','','1','$tdy','$_POST[pj]','$_POST[nbr]','1','app')"); 
			$sql=$db->query("select max(cno) as cno from webhtml");
			if($sql)$row=$sql->fetch();
			$db->exec("update webhtml set ap='$row[cno]' where cno='$row[cno]'");
			$ap = $row[cno];
			//$pj= $_POST[nbr];
			;}
	;}

	if($_POST[appcopy]){$pj = $_POST[pj];$ap = $rows[cno];}
	if(!$pj)$pj = $_POST[pj];
	echo "<meta http-equiv='refresh' content='0;URL=webpage.php?ap=".htmlspecialchars($ap)."&pj=".htmlspecialchars($pj)."'>";


;}

?>
