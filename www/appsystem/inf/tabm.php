<?php session_start();          
error_reporting(0);   

if($_GET[pj] and !preg_match('/^[0-9]*$/',$_GET[pj]))exit;
if($_GET[pj])$pj = $_GET[pj];
if($_GET[ap] and !preg_match('/^[0-9]*$/',$_GET[ap]))exit;
if($_GET[ap])$ap = $_GET[ap];
if($_GET[pres])$pres = 1;


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
	
	
	if($pres){
				$ht = file_get_contents('../panel/'.$roww[pjnbr].'/temp/'.$ap.'.html');
	;}else{
				$ht = file_get_contents('../panel/'.$roww[pjnbr].'/'.$ap.'.html');			
	;}	
	$hts = $ht;
	if(!$_POST[guanyin1]){ 
	if(substr_count($ht,"<div")!=substr_count($ht,"</div>")){ 
	 	if($_SESSION[tn]==PRC){		
		 echo '<script>alert("请检查此应用页内容的html码.\r\n<div>或<div 的数量是 '.substr_count($ht,"<div").'.\r\n但</div> 的数量是 '.substr_count($ht,"</div>").'.")</script>';
		}else if($_SESSION[tn]==EN){
		 echo '<script>alert("Please check the html code of this APP page.\r\nThe number of <div> or <div is '.substr_count($ht,"<div").'.\r\nBut the number of </div> is '.substr_count($ht,"</div>").'.")</script>';
		}else{
		 echo '<script>alert("請檢查此應用頁內容的html碼.\r\n<div>或<div 的數量是 '.substr_count($ht,"<div").'.\r\n但</div> 的數量是 '.substr_count($ht,"</div>").'.")</script>';
		}			
	 ;}
	 ;}
	 
	 
	$htmn = explode('<!--part',$ht);
	$clrsvlsns = '<!--data-tabnbg@@@@@@data-tabnbg!-->';
	for($i=1;$i<sizeof($htmn);$i++){					
				if(strpos($htmn[$i],'<!--data-tabnbg')==false){
				$popupn .= '<!--part'.$htmn[$i].$clrsvlsns;	
				}else{$popupn .= '<!--part'.$htmn[$i];} 				
	 ;}
	 $clrsvlsns ='';
	 $ht = $popupn;
	
	if($ht){	
	
				$htm = explode('<!--part',$ht);
				
				for($i=1;$i<sizeof($htm);$i++){
						
						$hthtmlvlu = explode('!-->',$htm[$i]);
						$btnbrsvlu[$i] = $hthtmlvlu[0];
											
						$tabnbg = explode('<!--data-tabnbg',$htm[$i]);
						$tabnbgs = explode('data-tabnbg!-->',$tabnbg[1]);
						$tabnbgsn = explode('@',$tabnbgs[0]);
						$vtitlevlu[$i] = $tabnbgsn[1];
						$vtitleimgvlu[$i] = $tabnbgsn[2];		
						$vtagnvlu[$i] = $tabnbgsn[0];					



						if(strpos($htm[$i],'data-tabnbg@')!==false){
							$htmnm .= '<!--part'.$htm[$i];
						;}else if(strpos($htm[$i],'data-tabnbgvtns1vtns@')!==false){
							$htmnm .= str_replace('<!--data-tabnbgvtns1vtns@','</div></div><!--vnts!--><!--data-tabnbg@','<!--part'.$htm[$i]);
						;}else if(strpos($htm[$i],'data-tabnbgvtns5vtns@')!==false){
							if(strpos($htm[$i],'<!--sysdwsys!-->')!=false or strpos($htm[$i],'<!--sysifrpicsys!-->')!=false or strpos($htm[$i],'<!--sysalbumowlsys!-->')!=false){
								$htm[$i] = str_replace('sys!-->','sys!--><div class="swiper-slide"><div id="'.$pj.$ap.'vnts'.htmlspecialchars($btnbrsvlu[$i]).'" class="vntsns">',$htm[$i]);
							;}else{
							 	$htm[$i] = str_replace('sys!-->','sys!--><div class="swiper-slide"><div id="'.$pj.$ap.'vnts'.htmlspecialchars($btnbrsvlu[$i]).'" class="vntsns vtnn">',$htm[$i]);
							;}
							$htmnm .= str_replace('<!--data-tabnbgvtns5vtns@','<!--data-tabnbg@','<!--part'.$htm[$i]);
						;}else if(strpos($htm[$i],'data-tabnbgvtns6vtns@')!==false){
							if(strpos($htm[$i],'<!--sysdwsys!-->')!=false or strpos($htm[$i],'<!--sysifrpicsys!-->')!=false or strpos($htm[$i],'<!--sysalbumowlsys!-->')!=false){
								$htm[$i] = str_replace('sys!-->','sys!--><div class="swiper-slide"><div id="'.$pj.$ap.'vnts'.htmlspecialchars($btnbrsvlu[$i]).'" class="vntsns">',$htm[$i]);
							;}else{
							 	$htm[$i] = str_replace('sys!-->','sys!--><div class="swiper-slide"><div id="'.$pj.$ap.'vnts'.htmlspecialchars($btnbrsvlu[$i]).'" class="vntsns vtnn">',$htm[$i]);
							;}
							$htmnm .= str_replace('<!--data-tabnbgvtns6vtns@','</div></div><!--vnts!--><!--data-tabnbg@','<!--part'.$htm[$i]);
						;}
											
						if(strpos($htm[$i],'<!--syseditorsys!-->')!==false or strpos($htm[$i],'<!--syseditorifrsys!-->')!==false){
							if($_SESSION[tn]==PRC){$function[$i] = '文字编辑器';}else if($_SESSION[tn]==EN){$function[$i] =  'Content Editor';}else{$function[$i] =  '文字編輯器';}
						;}else if(strpos($htm[$i],'<!--sysaudiosys!-->')!==false){
							if($_SESSION[tn]==PRC){$function[$i] = '互联/内联音频';}else if($_SESSION[tn]==EN){$function[$i] = 'Internet/Intranet Audio';}else{$function[$i] = '互聯/內聯音頻';}
						;}else if(strpos($htm[$i],'<!--sysvideosys!-->')!==false){
							if($_SESSION[tn]==PRC){$function[$i] = '互联視頻';}else if($_SESSION[tn]==EN){$function[$i] = 'Internet Video';}else{$function[$i] = '互聯視頻';}
						;}else if(strpos($htm[$i],'<!--sysplaylistsys!-->')!==false){
							if($_SESSION[tn]==PRC){$function[$i] = '音频播放及附件列表';}else if($_SESSION[tn]==EN){$function[$i] = 'Audio Playlist and Document List';}else{$function[$i] = '音頻播放及附件列表';}						
						;}else if(strpos($htm[$i],'<!--syspopuppicsys!-->')!==false){
							if($_SESSION[tn]==PRC){$function[$i] = 'Popup相片格 - 相片形式';}else if($_SESSION[tn]==EN){$function[$i] = 'Popup Photo Grid - picture style';}else{$function[$i] = 'Popup相片格 - 相片形式';}
							if($_SESSION[tn]==PRC){$function[$i] .= ' /Popup相片形式 - 相簿[应用数据]';}else if($_SESSION[tn]==EN){$function[$i] .= ' /Popup picture style - album[APP data]';}else{$function[$i] .= ' /Popup相片形式 - 相簿[應用數據]';}	
						;}else if(strpos($htm[$i],'<!--syspopuppicssys!-->')!==false){
							if($_SESSION[tn]==PRC){$function[$i] = 'Popup相片格 - 按鈕形式';}else if($_SESSION[tn]==EN){$function[$i] = 'Popup Photo Grid - button style';}else{$function[$i] = 'Popup相片格 - 按鈕形式';}
							if($_SESSION[tn]==PRC){$function[$i] .= ' /相片按钮 - 电邮/电话';}else if($_SESSION[tn]==EN){$function[$i] .= ' /Grid button - email/phone';}else{$function[$i] .= ' /相片按鈕 - 電郵/電話';}
							if($_SESSION[tn]==PRC){$function[$i] .= ' /Popup按鈕形式 - 相簿[互联数据]';}else if($_SESSION[tn]==EN){$function[$i] .= ' /Popup button style - album[Internet data]';}else{$function[$i] .= ' /Popup按鈕形式 - 相簿[互聯數據]';}
						;}else if(strpos($htm[$i],'<!--sysgridpicsys!-->')!==false){
							if($_SESSION[tn]==PRC){$function[$i] = '相片格[放大功能]';}else if($_SESSION[tn]==EN){$function[$i] = 'Photo Grid[Enlarging function]';}else{$function[$i] = '相片格[放大功能]';}
						;}else if(strpos($htm[$i],'<!--sysgridswipsys!-->')!==false){
							if($_SESSION[tn]==PRC){$function[$i] = '相簿[放大功能]';}else if($_SESSION[tn]==EN){$function[$i] = 'Album[Enlarging function]';}else{$function[$i] = '相簿[放大功能]';}	
						;}else if(strpos($htm[$i],'<!--sysalbumowlsys!-->')!==false){
							if($_SESSION[tn]==PRC){$function[$i] = 'Swipeable相簿';}else if($_SESSION[tn]==EN){$function[$i] = 'Swipeable Album';}else{$function[$i] = 'Swipeable相簿';}
						;}else if(strpos($htm[$i],'<!--systabssys!-->')!==false){
							if($_SESSION[tn]==PRC){$function[$i] = 'Tabs标签';}else if($_SESSION[tn]==EN){$function[$i] = 'Tabs';}else{$function[$i] = 'Tabs標簽';}
						;}else if(strpos($htm[$i],'<!--sysifrhtmlsys!-->')!==false){
							if($_SESSION[tn]==PRC){$function[$i] = 'Page iframe - 嵌入网页';}else if($_SESSION[tn]==EN){$function[$i] = 'Page iframe - Embed web page';}else{$function[$i] = 'Page iframe - 嵌入網頁';}
						;}else if(strpos($htm[$i],'<!--sysifrpicsys!-->')!==false){
							if($_SESSION[tn]==PRC){$function[$i] = '嵌入相片浏览';}else if($_SESSION[tn]==EN){$function[$i] = 'Embedded picture navigation';}else{$function[$i] = '嵌入相片瀏覽';}
						;}else if(strpos($htm[$i],'<!--syslistviewsys!-->')!==false){
							if($_SESSION[tn]==PRC){$function[$i] = '项目列表';}else if($_SESSION[tn]==EN){$function[$i] = 'Listview';}else{$function[$i] = '項目列表';}
						;}else if(strpos($htm[$i],'<!--sysfiltersys!-->')!==false){
							if($_SESSION[tn]==PRC){$function[$i] = '项目列表搜寻';}else if($_SESSION[tn]==EN){$function[$i] = 'Listview filter';}else{$function[$i] = '項目列表搜尋';}
						;}else if(strpos($htm[$i],'<!--syslistviewnsys!-->')!==false){
							if($_SESSION[tn]==PRC){$function[$i] = '选项按钮';}else if($_SESSION[tn]==EN){$function[$i] = 'Option button';}else{$function[$i] = '選項按鈕';}
						;}else if(strpos($htm[$i],'<!--syscalendarsys!-->')!==false){
							 if($_SESSION[tn]==PRC){$function[$i] = '日历';}else if($_SESSION[tn]==EN){$function[$i] = 'Calendar';}else{$function[$i] = '日曆';}
						;}else if(strpos($htm[$i],'<!--sysgtsys!-->')!==false){
							if($_SESSION[tn]==PRC){$function[$i] = '项目日历';}else if($_SESSION[tn]==EN){$function[$i] = 'Project Calendar';}else{$function[$i] = '項目日曆';}
						;}else if(strpos($htm[$i],'<!--sysqrsys!-->')!==false){
							if($_SESSION[tn]==PRC){$function[$i] = 'QR二维码';}else if($_SESSION[tn]==EN){$function[$i] = 'QR Code';}else{$function[$i] = 'QR二維碼';}
						;}else if(strpos($htm[$i],'<!--sysformsys!-->')!==false){
							if($_SESSION[tn]==PRC){$function[$i] = '表格';}else if($_SESSION[tn]==EN){$function[$i] = 'Form';}else{$function[$i] = '表格';}
							if($_SESSION[tn]==PRC){$function[$i] .= ' /QR二维码';}else if($_SESSION[tn]==EN){$function[$i] .= ' /QR Code';}else{$function[$i] .= ' /QR二維碼';}?> [<?php if($_SESSION[tn]==PRC){$function[$i] .= '表格 - 多选项';}else if($_SESSION[tn]==EN){$function[$i] .= 'Form - multiple';}else{$function[$i] .= '表格 - 多選項';}	
						;}else if(strpos($htm[$i],'<!--sysplaygroundsys!-->')!==false){
							if($_SESSION[tn]==PRC){$function[$i] = '游戏';}else if($_SESSION[tn]==EN){$function[$i] = 'Playground';}else{$function[$i] = '遊戲';}
						;}else if(strpos($htm[$i],'<!--sysdwsys!-->')!==false){
							if($_SESSION[tn]==PRC){$function[$i] = '相片画布';}else if($_SESSION[tn]==EN){$function[$i] = 'Drawer';}else{$function[$i] = '相片畫布';}
						;}else{$function[$i] = '';
						;} 								
				;}
	;}
	
	?>
<!DOCTYPE html>
<html>
  <head> 
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php if($_SESSION[tn]==PRC){echo '合拼标签 - AppMoney712 移动应用设计系统';}else if($_SESSION[tn]==EN){echo 'Tab merging - AppMoney712 APP Creation System';}else{echo '合拼標簽 - AppMoney712 移動應用設計系統';}?></title>
	<link href="../css/bootstrap.css" rel="stylesheet">
	<link href="../css/jquery.mobile-1.4.4.min.css" rel="stylesheet">
	<link href="../css/jquerymobile-1.4.4.min.css" rel="stylesheet">
	<link rel="stylesheet" href="../jscss/swiper.min.css">
	<link rel="stylesheet" href="../jscss/ifrpi.css">
	<link rel="stylesheet" href="../jscss/gridlistview.css">
	<link rel="stylesheet" href="../jscss/calendar.css"> 
	<link rel="stylesheet" href="../jscss/gridlistview.css">
	<link rel="stylesheet" href="../css/appsystem.css">	

	<link rel="stylesheet" href="../css/icons/style.css">
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
	<script src="../js/jquery.qrcode.min.js"></script><script src="../js/qr.js"></script>
	<script src="../js/form.js"></script>
	<script src="../js/playground.js"></script>
	<script src="../js/dw.js"></script><script src="../js/playlist.js"></script>
	<script src="../js/popupics.js"></script><script src="../js/jquery.nicescroll.min.js"></script>
	<script src="../js/gridpic.js"></script>
	<script src="../js/tabs.js"></script>
	<script src="../js/jquery.nest.js"></script>

	<script>
	</script>
</head>
<body>

<div data-role="page" data-theme="f"  id="appageone" style="background-color:white;color:black">
	<div style="overflow: hidden;" data-role="header" data-theme="f">
	<a href="#navigations"  id="menubttn"  data-rel="popup" data-transition="pop" class="ui-btn ui-btn ui-btn-inline ui-corner-all ui-btn-icon-left ui-icon-bars"><?php if($_SESSION[tn]==PRC){echo '目录';}else if($_SESSION[tn]==EN){echo 'Menu';}else{echo '目錄';}?></a>
    <h1><?php if($_SESSION[tn]==PRC){echo '合拼标签 - AppMoney712 移动应用设计系统';}else if($_SESSION[tn]==EN){echo 'Tab merging - AppMoney712 APP Creation System';}else{echo '合拼標簽 - AppMoney712 移動應用設計系統';}?></h1>
	
	</div><!-- /header -->
	

	
	<div data-role="content">
<?php 

	
	?>
	<?php if($ap){?>
	<a href="webpage.php?pj=<?php echo htmlspecialchars($roww[pjnbr]) ?>&ap=<?php echo htmlspecialchars($roww[ap])?>" data-ajax="false" class="ui-btn ui-btn ui-btn-inline ui-corner-all ui-btn-icon-left ui-icon-carat-l"><?php if($_SESSION[tn]==PRC){echo '应用设计';}else if($_SESSION[tn]==EN){echo 'APP page design';}else{echo '應用設計';}?></a>&nbsp;&nbsp;<a href="tabn.php?<?php echo $roww[pjnbr]?>&ap=<?php echo $roww[ap]?>" data-ajax="false" class="ui-btn ui-btn ui-btn-inline ui-corner-all ui-mini ui-btn-icon-left ui-icon-carat-l"><?php if($_SESSION[tn]==PRC){echo '标签导航';}else if($_SESSION[tn]==EN){echo 'Tab Navigation';}else{echo '標簽導航';}?></a>&nbsp;&nbsp;<a href="#view" data-rel="popup" data-transition="pop" class="ui-btn ui-btn-inline ui-corner-all ui-mini ui-btn-icon-left ui-icon-search"><?php if($_SESSION[tn]==PRC){echo '预览';}else if($_SESSION[tn]==EN){echo 'Preview';}else{echo '預覽';}?></a>
		
	<div data-role="popup" id="view">
	<ul data-role="listview" data-corners="false" data-inset="true">
	<li><a href="view.php?pj=<?php echo htmlspecialchars($roww[pjnbr])?>&ap=<?php echo htmlspecialchars($roww[ap])?>&vw=ap" data-ajax="false" target="_blank" class="ui-btn ui-btn-inline ui-mini ui-btn-icon-left ui-icon-search"><?php if($_SESSION[tn]==PRC){echo '预览应用页内容形式';}else if($_SESSION[tn]==EN){echo 'Page content of APP style[Preview]';}else{echo '預覽應用頁內容形式';}?></a></li>
	<li><a href="view.php?pj=<?php echo htmlspecialchars($roww[pjnbr])?>&ap=<?php echo htmlspecialchars($roww[ap])?>&vw=ap&ts=1" data-ajax="false" target="_blank" class="ui-btn ui-btn-inline ui-mini ui-btn-icon-left ui-icon-search"><?php if($_SESSION[tn]==PRC){echo '预览应用页内容形式';}else if($_SESSION[tn]==EN){echo 'Page content of APP style[Preview]';}else{echo '預覽應用頁內容形式';}?><?php if($_SESSION[tn]==PRC){echo '[触控式] [使用webkit型浏览器]';}else if($_SESSION[tn]==EN){echo '[Touch screen] [using any webkit browser]';}else{echo '[觸控式] [使用webkit型瀏覽器]';}?></a></li>
	<li><a href="viewp.php?pj=<?php echo htmlspecialchars($roww[pjnbr])?>&ap=<?php echo htmlspecialchars($roww[ap])?>" data-ajax="false" target="_blank" class="ui-btn ui-btn-inline ui-mini ui-btn-icon-left ui-icon-search"><?php if($_SESSION[tn]==PRC){echo '预览popup形式';}else if($_SESSION[tn]==EN){echo 'content of popup style[Preview]';}else{echo '預覽popup形式';}?></a></li>
	<li><a href="viewp.php?pj=<?php echo htmlspecialchars($roww[pjnbr])?>&ap=<?php echo htmlspecialchars($roww[ap])?>&ts=1" data-ajax="false" target="_blank" class="ui-btn ui-btn-inline ui-mini ui-btn-icon-left ui-icon-search"><?php if($_SESSION[tn]==PRC){echo '预览popup形式';}else if($_SESSION[tn]==EN){echo 'content of popup style[Preview]';}else{echo '預覽popup形式';}?><?php if($_SESSION[tn]==PRC){echo '[触控式] [使用webkit型浏览器]';}else if($_SESSION[tn]==EN){echo '[Touch screen] [using any webkit browser]';}else{echo '[觸控式] [使用webkit型瀏覽器]';}?></a></li>
	<!--<li><a href="view.php?pj=<?php echo htmlspecialchars($roww[pjnbr])?>&ap=<?php echo htmlspecialchars($roww[ap])?>&vw=s" data-ajax="false" target="_blank" class="ui-btn ui-btn-inline ui-mini ui-btn-icon-left ui-icon-search"><?php if($_SESSION[tn]==PRC){echo '预览單頁形式';}else if($_SESSION[tn]==EN){echo 'single page style[Preview]';}else{echo '預覽單頁形式';}?></a></li>!-->
	</ul>
	</div>
	
		
	<a href="menudesign.php?pj=<?php echo htmlspecialchars($roww[pjnbr])?>&ap=<?php echo $ap?>&pn=<?php echo $pn?>&php=tabm&plt=1" data-ajax="false" class="ui-btn ui-btn ui-btn-inline ui-corner-all ui-mini ui-btn-icon-left ui-icon-bars"><?php if($_SESSION[tn]==PRC){echo '专案应用页列表';}else if($_SESSION[tn]==EN){echo 'Project Page List';}else{echo '專案應用頁列表';}?></a>
	
	
	
	<?php if($_SESSION[tabm]){
	if(file_exists('../panel/'.$roww[pjnbr].'/temp/'.$ap.'.html') and !$pres){?>
<a href="tabm.php?pj=<?php echo $roww[pjnbr]?>&ap=<?php echo $roww[ap]?>&pres=1" data-ajax="false" class="ui-btn ui-btn-f ui-btn-inline ui-corner-all ui-mini" style="color:pink" ><?php if($_SESSION[tn]==PRC){echo '改用上次储存';}else if($_SESSION[tn]==EN){echo 'Using previous save';}else{echo '改用上次儲存';}?></a>
<?php ;}else{?>
<a href="tabm.php?pj=<?php echo $roww[pjnbr]?>&ap=<?php echo $roww[ap]?>"  data-ajax="false" class="ui-btn ui-btn-f ui-btn-inline ui-corner-all ui-mini" style="color:pink" ><?php if($_SESSION[tn]==PRC){echo '不改用上次储存';}else if($_SESSION[tn]==EN){echo 'Not using previous save';}else{echo '不改用上次儲存';}?></a>
<?php ;}
;}//if($_SESSION[tabm])?>
	<?php ;}?>
	<hr>
	<span style="color:black"><?php if($_SESSION[tn]==PRC){echo '专案';}else if($_SESSION[tn]==EN){echo 'Project';}else{echo '專案';}?></span>
	<?php 	$sql=$db->query("select * from webpj where cno='$pj'");
	if($sql)$row=$sql->fetch();
	echo '['.htmlspecialchars($row[date]).'] '.htmlspecialchars($row[title]);?>
	
	&nbsp;&nbsp;&nbsp;&nbsp;
	
	<span style="color:black"><?php if($_SESSION[tn]==PRC){echo '应用页称';}else if($_SESSION[tn]==EN){echo 'Page name';}else{echo '應用頁稱';}?></span> :
	<?php echo htmlspecialchars($roww[title]);?>
	
	
		<FORM action="tabm.php?pj=<?php echo htmlspecialchars($roww[pjnbr]) ?>&ap=<?php echo htmlspecialchars($roww[ap]) ?>" id="webxls" method="post" data-ajax="false"   onSubmit="return checkform(this);">
		<div class="ui-grid-a">
			<?php 
				for($i=1;$i<sizeof($htm);$i++){
					if(strpos($htm[$i],'<div')!==false or strpos($htm[$i],'<p')!==false or strlen($htm[$i])>35){$jht=$i;
					echo '<div class="ui-block-a" style="width:12%"><input name="tabns'.$jht.'" id="tabns'.$jht.'" type="checkbox" value="'.$i.'"><label for="tabns'.$jht.'">&nbsp;</label></div>';
					echo '<div class="ui-block-b" style="width:88%"><input name="tabn'.$jht.'" id="tabn'.$jht.'" type="checkbox" value="'.$i.'"><label for="tabn'.$jht.'">';					
					if($_SESSION[tn]==PRC){echo '标签';}else if($_SESSION[tn]==EN){echo 'Tab';}else{echo '標簽';}
					
					$jht++;
					echo htmlspecialchars($btnbrsvlu[$i]);
					if($vtitlevlu[$i]){echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.htmlspecialchars($vtitlevlu[$i]);}
					else if($vtitleimgvlu[$i]){echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.htmlspecialchars($vtitleimgvlu[$i]);}
					if($vtagnvlu[$i])echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b style="color:black">';
						if($vtagnvlu[$i]=='vtns1vtns'){if($_SESSION[tn]==PRC){echo '合拼下面內容';}else if($_SESSION[tn]==EN){echo 'merged the below content';}else{echo '合拼下面內容';};}
						else if($vtagnvlu[$i]=='vtns6vtns'){if($_SESSION[tn]==PRC){echo '合拼上下面內容';}else if($_SESSION[tn]==EN){echo 'merged the above and below content';}else{echo '合拼上下面內容';};}
						else if($vtagnvlu[$i]=='vtns5vtns'){if($_SESSION[tn]==PRC){echo '合拼上面內容';}else if($_SESSION[tn]==EN){echo 'merged the above content';}else{echo '合拼上面內容';};}
					if($vtagnvlu[$i])echo '</b>';

					if($function[$i])echo '&nbsp;&nbsp;&nbsp;&nbsp;['.htmlspecialchars($function[$i]).']';

					
					echo '</label></div>';
					}	
				;}

	 ?>
	 </div>
	<input type="hidden" name="guanyin1" value="<?php if(!$_POST[guanyin1])$_SESSION[guanyin1]=rand();
	echo htmlspecialchars($_SESSION[guanyin1]); ?>">
	<div class="ui-grid-b"><div class="ui-block-a">

	<?php if($ap){?><input type="submit" name="submit" id="webxlsbtn" Value="<?php if($_SESSION[tn]==PRC){echo '送交';}else if($_SESSION[tn]==EN){echo 'SEND';}else{echo '送交';}?>"><?php ;}//if($pn){?>
	</div><div class="ui-block-b">
<a href="#inf" data-rel="popup" data-transition="pop" class="ui-btn ui-btn-b ui-btn-inline ui-corner-all ui-mini">? <?php if($_SESSION[tn]==PRC){echo '解释';}else if($_SESSION[tn]==EN){echo 'Explanation';}else{echo '解釋';}?></a>
	<div data-role="popup" id="inf" style="min-width:300px;max-width:85%" data-position-to="window" data-theme="f"><a href="#" data-rel="back" class="ui-btn ui-btn-right ui-btn-icon-notext ui-icon-delete"></a>
		<BR>
		<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '內容段合拼';}else if($_SESSION[tn]==EN){echo 'Content merging';}else{echo '內容段合拼';}?></b> &nbsp;<?php if($_SESSION[tn]==PRC){echo '一个应用能有多个应用页,应用页内容能含多个功能內容,e.g.日历。';}else if($_SESSION[tn]==EN){echo 'You can develop one or several APP pages to your APP design and add different functional content to an APP page. e.g. calendar';}else{echo '一個應用能有多個應用頁,應用頁內容能含多個功能內容,e.g.日曆。';}?></p>	
		<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '限制';}else if($_SESSION[tn]==EN){echo 'Limitation';}else{echo '限制';}?></b> &nbsp;<?php if($_SESSION[tn]==PRC){echo '一些功能的下面是不能合拼内容,e.g.日历及swipeable相簿。';}else if($_SESSION[tn]==EN){echo 'Some functions cannot not be merged content below them. e.g. calendar & swipeable album';}else{echo '一些功能的下面是不能合拼內容,e.g.日曆及swipeable相簿。';}?></p>
	<p><?php if($_SESSION[tn]==PRC){echo '画布及swipeable相簿等功能,不应进行内容合拼。此等功能产生的内容均是没有顶部间距。';}else if($_SESSION[tn]==EN){echo 'Some functions such as Drawer & swipeable album do not support the merging function. Their output content are at the top edge of viewport [no top padding].';}else{echo '畫布及swipeable相簿等功能,不應進行內容合拼。此等功能產生的內容均是沒有頂部間距。';}?></p>	
	<p><?php if($_SESSION[tn]==PRC){echo '此处是将内容段合拼。您能连续点选内容的标签,若对不同的内容段作出合拼,您须在左排或右排交差点选。';}else if($_SESSION[tn]==EN){echo '';}else{echo '此處是將內容段合拼。您能連續點選內容的標簽,若對不同的內容段作出合拼,您須在左排或右排交差點選。';}?></p>	
	<img src="images/vtns.png"/>	
		<HR>
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '标签导航';}else if($_SESSION[tn]==EN){echo 'Tab Navigation';}else{echo '標簽導航';}?></b> &nbsp;<?php if($_SESSION[tn]==PRC){echo '若使用\'标签导航\'功能,您须再到该功能页进行更新。';}else if($_SESSION[tn]==EN){echo 'If you use the Tab Navigation function on this APP page, you need to go to the function editing page to update the tabs.';}else{echo '若使用\'標簽導航\'功能,您須再到該功能頁進行更新。';}?></p>	<HR>
	
	
	</div>

</div><div class="ui-block-c"></div></div>

	</FORM>

	
	<?php 

	if($pj){			
			
			$hrefs = '<a href="#" class="ui-btn ui-btn-e ui-btn-icon-left ui-icon-tag" style="color:black" data-ajax="false">';
			if($_SESSION[tn]==PRC){$hrefs .= '标签';}else if($_SESSION[tn]==EN){$hrefs .= 'Tab';}else{$hrefs .= '標簽';}
			$hrefs .= '<!--tabmphp!--></a>';
			
			
				for($i=1;$i<sizeof($htm);$i++){
					if(strpos($htm[$i],'sys!-->')!==false){
						if(strpos($htm[$i],'id="'.$pj.$ap.'vnts')!==false){
						$htmn[$i] = str_replace('sys!-->','sys!-->'.$hrefs,$htm[$i]);						
						}						
					}
					$pnvls = explode('!-->',$htm[$i]);
					$htmn[$i] = str_replace('<!--tabmphp!--></a>',$pnvls[0].'<!--tabmphp!--></a>',$htmn[$i]);			
					$html .= '<!--part'.$pnvls[0].$htmn[$i];	
				;}

	?>	<hr>
	
<hr>
	<?php 
	if(strpos($roww[bg],'http://')!==false or strpos($roww[bg],'https://')!==false){$images = '';}else{$images = '../panel/'.$roww[pjnbr].'/images/';}
	
	if(strpos($roww[bg],'#')!==false or strpos($roww[bg],'rgba(')!==false  or strpos($roww[bg],'rgb(')!==false){$bghtml = 'background-color:'.htmlspecialchars($roww[bg]).';';}
	else if(strpos($roww[bg],'[xy]')!==false){$bghtml = 'background-image:url('.$images.htmlspecialchars($roww[bg]).');';}
	else{$bghtml = 'background-image:url('.$images.htmlspecialchars($roww[bg]).');background-size:100%;background-repeat:repeat-y;';}
	
	$html = str_replace('background-image:url(images/','background-image:url(../panel/'.$roww[pjnbr].'/images/',$html);
	$html = str_replace('src="images/','src=../panel/'.$roww[pjnbr].'/images/',$html);
	$html = str_replace('src="http','src=http',$html);
	$html = str_replace('src="','src="../panel/'.$roww[pjnbr].'/',$html);
	$html = str_replace('src="../panel/'.$roww[pjnbr].'/data:','src="data:',$html);
	$html = str_replace('src=../panel/','src="../panel/',$html);
	$html = str_replace('src=http','src="http',$html);
	$html = str_replace('../panel/'.$roww[pjnbr].'/css/images/ajax-loader.gif','css/images/ajax-loader.gif',$html);
				
	echo '<div style="'.$bghtml.'">'.$html.'</div>';
	;}//if($pj){?>
	
	


	
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

<?php 
	if(file_exists('../panel/'.$roww[pjnbr].'/web'.$ap.'.js'))echo "<script> $(document).on('pageshow', '#appageone', function(){"
   .file_get_contents('../panel/'.$roww[pjnbr].'/web'.$ap.'.js')
   .'});</script>';


$tdy=0;
$tdy=date('Y-m-d');

if($pj and $_SESSION[guanyin1] and $_SESSION[guanyin1]==$_POST[guanyin1]){

	$_SESSION[tabm] = 1;
	if($ap and !preg_match('/^[0-9]*$/', $ap))exit;
	if($pj and !preg_match('/^[0-9]*$/', $pj))exit;
		
			
			 $htm = explode('<!--part',$htmnm);
			
			 if($jht){
				for($i=1;$i<$jht;$i++){	
							
					 if($_POST['tabn'.$i]){
						$j= 'tabn'.($i+1);
						if(!$js and $_POST[$j]){
							
								$htm[$i] = str_replace('<!--data-tabnbg@','<!--data-tabnbgvtns1vtns@',$htm[$i]);	
							
							$tabshtml .= '<!--part'.str_replace('</div></div><!--vnts!-->','',$htm[$i]);
							$js = 1;						
						;}else if($js){
							if($_POST[$j]){$typ = 6;}else{$typ = 5;$js = '';}
							
								$htm[$i] = str_replace('<!--data-tabnbg@','<!--data-tabnbgvtns'.$typ.'vtns@',$htm[$i]);	
							
								$htm[$i] = str_replace('<div class="swiper-slide"><div id="'.$pj.$ap.'vnts'.htmlspecialchars($btnbrsvlu[$i]).'" class="vntsns vtnn">','',$htm[$i]);
								$htm[$i] = str_replace('<div class="swiper-slide"><div id="'.$pj.$ap.'vnts'.htmlspecialchars($btnbrsvlu[$i]).'" class="vntsns">','',$htm[$i]);
							if($typ==5){
								if(strpos($htm[$i],'</div></div><!--vnts!-->')==false){$tabshtml  .= str_replace('<!--data-tabnbg','</div></div><!--vnts!--><!--data-tabnbg','<!--part'.$htm[$i]);}
								else{$tabshtml  .= '<!--part'.$htm[$i];}
							}else{
								$tabshtml .= '<!--part'.str_replace('</div></div><!--vnts!-->','',$htm[$i]);
							}	
						;}else{
								$tabshtml .= '<!--part'.$htm[$i];
						;}				
					;}else if($_POST['tabns'.$i]){
						$j= 'tabns'.($i+1);
						if(!$js and $_POST[$j]){
							
								$htm[$i] = str_replace('<!--data-tabnbg@','<!--data-tabnbgvtns1vtns@',$htm[$i]);	
							
							$tabshtml .= '<!--part'.str_replace('</div></div><!--vnts!-->','',$htm[$i]);
							$js = 1;						
						;}else if($js){
							if($_POST[$j]){$typ = 6;}else{$typ = 5;$js = '';}
							
								$htm[$i] = str_replace('<!--data-tabnbg@','<!--data-tabnbgvtns'.$typ.'vtns@',$htm[$i]);	
							
								$htm[$i] = str_replace('<div class="swiper-slide"><div id="'.$pj.$ap.'vnts'.htmlspecialchars($btnbrsvlu[$i]).'" class="vntsns vtnn">','',$htm[$i]);
								$htm[$i] = str_replace('<div class="swiper-slide"><div id="'.$pj.$ap.'vnts'.htmlspecialchars($btnbrsvlu[$i]).'" class="vntsns">','',$htm[$i]);
							if($typ==5){
								if(strpos($htm[$i],'</div></div><!--vnts!-->')==false){$tabshtml  .= str_replace('<!--data-tabnbg','</div></div><!--vnts!--><!--data-tabnbg','<!--part'.$htm[$i]);}
								else{$tabshtml  .= '<!--part'.$htm[$i];}
							}else{
								$tabshtml .= '<!--part'.str_replace('</div></div><!--vnts!-->','',$htm[$i]);
							}	
						;}else{
								$tabshtml .= '<!--part'.$htm[$i];
						;}					
					;}else{
							$htm[$i] = str_replace('<!--data-tabnbg'.htmlspecialchars($vtagnvlu[$i]).'@','<!--data-tabnbg@',$htm[$i]);
							if(strpos($htm[$i],'class="vntsns')==false){
							 if(strpos($htm[$i],'<!--sysdwsys!-->')!=false){
								$htm[$i] = str_replace('sys!-->','sys!--><div class="swiper-slide"><div id="'.$pj.$ap.'vnts'.htmlspecialchars($btnbrsvlu[$i]).'" class="vntsns">',$htm[$i]);
							 ;}else{
							 	$htm[$i] = str_replace('sys!-->','sys!--><div class="swiper-slide"><div id="'.$pj.$ap.'vnts'.htmlspecialchars($btnbrsvlu[$i]).'" class="vntsns vtnn">',$htm[$i]);
							 ;}
							;}
							if(strpos($htm[$i],'</div><!--vnts!-->')==false){$tabshtml .= str_replace('<!--data-tabnbg','</div></div><!--vnts!--><!--data-tabnbg','<!--part'.$htm[$i]);}
							else{$tabshtml  .= '<!--part'.$htm[$i];}
										
					;}				
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
			

	 
			$webpopup .= $tabshtml;
			$webpopup .= '</div><!--content!--></div><!--page!-->';
			
		 	
			
			$fpagtrns='../panel/'.$roww[pjnbr].'/'.$ap.'.html';
			file_put_contents($fpagtrns,$tabshtml);
			
			if(!file_exists('../panel/'.$roww[pjnbr].'/temp/'.$ap.'.html')){
				mkdir('../panel/'.$roww[pjnbr].'/temp');
				file_put_contents('../panel/'.$roww[pjnbr].'/temp/'.$ap.'.html',$hts);			
			;}else{
				file_put_contents('../panel/'.$roww[pjnbr].'/temp/'.$ap.'.html',$hts);			
			;}
			
			$fpagtrns='../panel/'.$roww[pjnbr].'/web'.$ap.'.html';
			file_put_contents($fpagtrns,$webpopup);			
			



	echo "<meta http-equiv='refresh' content='0;URL=tabm.php?ap=".htmlspecialchars($roww[ap])."&pj=".htmlspecialchars($roww[pjnbr])."'>";
	


;}

?>
