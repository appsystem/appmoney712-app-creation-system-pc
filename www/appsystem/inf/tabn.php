<?php session_start();           
error_reporting(0);  

if($_GET[pj] and !preg_match('/^[0-9]*$/',$_GET[pj]))exit;
if($_GET[pj])$pj = $_GET[pj];
if($_GET[ap] and !preg_match('/^[0-9]*$/',$_GET[ap]))exit;
if($_GET[ap])$ap = $_GET[ap];
if($_GET[pn] and !preg_match('/^[0-9]*$/',$_GET[pn]))exit;
if($_GET[pn])$pn = $_GET[pn];

if($_GET[v] and !preg_match('/^[0-9]*$/',$_GET[v]))exit;
if($_GET[v])$v = $_GET[v];


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
	
	
	
	$ht = file_get_contents('../panel/'.$roww[pjnbr].'/'.$ap.'.html');
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
	$htbn = file_get_contents('../panel/'.$roww[pjnbr].'/tabn'.$ap.'.html');
	$htbns = explode('<!--data-tabnbg',$htbn);
	$htmbns = explode('data-tabnbg!-->',$htbns[1]);
	$datatabnbg = explode('@',$htmbns[0]);
	
				if(strpos($ht,$pj.$ap.'auds'.$ap.'n')!=false)$audsp = 1;
				$htm = explode('<!--part',$ht);
				
				for($i=1;$i<sizeof($htm);$i++){
						$hthtmlvlu = explode('!-->',$htm[$i]);
						$btnbrsvlu[$i] = $hthtmlvlu[0];
						
						$btnbrsvls .= '"'.$btnbrsvlu[$i].'",';
						
						if($audsp){
							$audiohtml = explode($pj.$ap.'auds'.$ap.'n',$htm[$i]);
							$audohtm = explode('"',$audiohtml[1]);
							$audiohtm[$i] = $audohtm[0];
							if($audiohtml[1]){
							 $audiosr = explode('src="',$audiohtml[1]);
							 $audiosrc = explode('"',$audiosr[1]);
							 $audiohref[$i] = $audiosrc[0];
							;}
						}
						
						$tabnbg = explode('<!--data-tabnbg',$htm[$i]);
						$tabnbgs = explode('data-tabnbg!-->',$tabnbg[1]);
						$tabnbgsn = explode('@',$tabnbgs[0]);
						$vtagnvlu[$i] = $tabnbgsn[0];
						if($tabnbgsn[1]){$vtitlevlu[$i] = $tabnbgsn[1];}else{$vtitlevlu[$i]='';} if($vtitlevlu[$i]=='[delete]'){$delvtitle = 1;}else if($vtitlevlu[$i]){$delvtitle = '';}
						$vtitleimgvlu[$i] = $tabnbgsn[2]; 
						$vclrvlu[$i] = $tabnbgsn[3];						
						$vhgtbgvlu[$i] = $tabnbgsn[4]; if($vhgtbgvlu[$i] and !$vhgtbgvlsn)$vhgtbgvlsn = 1;$vhgtbgvls .= '"'.$vhgtbgvlu[$i].'",';
						$vtmdprvlu[$i] = $tabnbgsn[5];
						$vaudiovlu[$i] = $tabnbgsn[6];
						if(!$tabmenu){if($vtitlevlu[$i] or $vtitleimgvlu[$i])$tabmenu =1;}
						
						
						$tabnbgdata = explode('<!--data-tabnbg',$htm[$i]);
						if($tabnbgdata[1]){
						$tabnbgdatn = explode('data-tabnbg!-->',$tabnbgdata[1]);
						if(strpos($tabnbgdatn[0],'vtns1vtns')!==false){
						$bvtns[$i] = 1;
						;}else if(strpos($tabnbgdatn[0],'vtns5vtns')!==false){
						$bvtns[$i] = 5;
						;}else if(strpos($tabnbgdatn[0],'vtns6vtns')!==false){
						$bvtns[$i] = 6;
						;}else{
						$bvtns[$i] = '';
						;}
						;}
																
						if($i==$v){
						$tagnvlu[$i] = $tabnbgsn[0];
						$titlevlu = $tabnbgsn[1];
						$titleimgvlu = $tabnbgsn[2];
						$clrvlu = $tabnbgsn[3];						
						$hgtbgvlu = $tabnbgsn[4];
						$tmdprvlu = $tabnbgsn[5];
						$audiovlu = $tabnbgsn[6];							
						;}
					
				;}
				
				if(!$vhgtbgvlsn){$vhgtbgvls ='';}else{
					$vhgtbgvls = 'if(!sessionStorage.getItem("'.$pj.$ap.'vght"))sessionStorage.setItem("'.$pj.$ap.'vght",JSON.stringify([';
					for($i=0;$i<sizeof($vhgtbgvlu);$i++){
					  if($vhgtbgvlu[$i])$vhgtbgvls .= '["'.htmlspecialchars($btnbrsvlu[$i]).'","'.htmlspecialchars($vhgtbgvlu[$i]).'"],';
					;}	
					$vhgtbgvls .= ']));';	
					$vhgtbgvls = str_replace('],]))',']]));',$vhgtbgvls);	
					$vhgtbgvls = $vhgtbgvls.'vght('.$pj.$ap.',"'.$pj.'");';		
				;}
				
	;}
	
	?>
<!DOCTYPE html>
<html>
  <head> 
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php if($_SESSION[tn]==PRC){echo '标签导航 - AppMoney712 移动应用设计系统';}else if($_SESSION[tn]==EN){echo 'Tab Navigation - AppMoney712 APP Creation System';}else{echo '標簽導航 - AppMoney712 移動應用設計系統';}?></title>
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

<div data-role="page" data-theme="b"  id="appageone" style="background-color:white;color:black">
	<div style="overflow: hidden;" data-role="header" data-theme="f">
	<a href="#navigations"  id="menubttn"  data-rel="popup" data-transition="pop" class="ui-btn ui-btn ui-btn-inline ui-corner-all ui-btn-icon-left ui-icon-bars"><?php if($_SESSION[tn]==PRC){echo '目录';}else if($_SESSION[tn]==EN){echo 'Menu';}else{echo '目錄';}?></a>
    <h1><?php if($_SESSION[tn]==PRC){echo '标签导航 - AppMoney712 移动应用设计系统';}else if($_SESSION[tn]==EN){echo 'Tab Navigation - AppMoney712 APP Creation System';}else{echo '標簽導航 - AppMoney712 移動應用設計系統';}?></h1>
	
	</div><!-- /header -->
	

	
	<div data-role="content">
<?php 

	if($pn){
	
		if(file_exists('../panel/'.$roww[pjnbr].'/tabn'.$ap.'.html')){
		$htmltabn = str_replace('src="images/','src="../panel/'.$roww[pjnbr].'/images/',file_get_contents('../panel/'.$roww[pjnbr].'/tabn'.$ap.'.html')).$htmltabn;}
		echo $htmltabn ;
				
	;}//if($pn){
	?>
	<?php if($ap){?>
	
	
	<a href="webpage.php?pj=<?php echo htmlspecialchars($roww[pjnbr]) ?>&ap=<?php echo htmlspecialchars($roww[ap])?>" data-ajax="false" class="ui-btn ui-btn ui-btn-inline ui-corner-all ui-btn-icon-left ui-icon-carat-l">&nbsp;</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="tabn.php?pj=<?php echo htmlspecialchars($roww[pjnbr]) ?>&ap=<?php echo htmlspecialchars($roww[ap])?>" data-ajax="false" class="ui-btn ui-btn ui-btn-inline ui-corner-all ui-btn-icon-left ui-icon-refresh">&nbsp;</a>&nbsp;&nbsp;<a href="#view" data-rel="popup" data-transition="pop" class="ui-btn ui-btn-inline ui-corner-all ui-mini ui-btn-icon-left ui-icon-search"><?php if($_SESSION[tn]==PRC){echo '预览';}else if($_SESSION[tn]==EN){echo 'Preview';}else{echo '預覽';}?></a>
		
	<div data-role="popup" id="view">
	<ul data-role="listview" data-corners="false" data-inset="true">
	<li><a href="view.php?pj=<?php echo htmlspecialchars($roww[pjnbr])?>&ap=<?php echo htmlspecialchars($roww[ap])?>&vw=ap" data-ajax="false" target="_blank" class="ui-btn ui-btn-inline ui-mini ui-btn-icon-left ui-icon-search"><?php if($_SESSION[tn]==PRC){echo '预览应用页内容形式';}else if($_SESSION[tn]==EN){echo 'Page content of APP style[Preview]';}else{echo '預覽應用頁內容形式';}?></a></li>
	<li><a href="view.php?pj=<?php echo htmlspecialchars($roww[pjnbr])?>&ap=<?php echo htmlspecialchars($roww[ap])?>&vw=ap&ts=1" data-ajax="false" target="_blank" class="ui-btn ui-btn-inline ui-mini ui-btn-icon-left ui-icon-search"><?php if($_SESSION[tn]==PRC){echo '预览应用页内容形式';}else if($_SESSION[tn]==EN){echo 'Page content of APP style[Preview]';}else{echo '預覽應用頁內容形式';}?><?php if($_SESSION[tn]==PRC){echo '[触控式] [使用webkit型浏览器]';}else if($_SESSION[tn]==EN){echo '[Touch screen] [using any webkit browser]';}else{echo '[觸控式] [使用webkit型瀏覽器]';}?></a></li>
	<li><a href="viewp.php?pj=<?php echo htmlspecialchars($roww[pjnbr])?>&ap=<?php echo htmlspecialchars($roww[ap])?>" data-ajax="false" target="_blank" class="ui-btn ui-btn-inline ui-mini ui-btn-icon-left ui-icon-search"><?php if($_SESSION[tn]==PRC){echo '预览popup形式';}else if($_SESSION[tn]==EN){echo 'content of popup style[Preview]';}else{echo '預覽popup形式';}?></a></li>
	<li><a href="viewp.php?pj=<?php echo htmlspecialchars($roww[pjnbr])?>&ap=<?php echo htmlspecialchars($roww[ap])?>&ts=1" data-ajax="false" target="_blank" class="ui-btn ui-btn-inline ui-mini ui-btn-icon-left ui-icon-search"><?php if($_SESSION[tn]==PRC){echo '预览popup形式';}else if($_SESSION[tn]==EN){echo 'content of popup style[Preview]';}else{echo '預覽popup形式';}?><?php if($_SESSION[tn]==PRC){echo '[触控式] [使用webkit型浏览器]';}else if($_SESSION[tn]==EN){echo '[Touch screen] [using any webkit browser]';}else{echo '[觸控式] [使用webkit型瀏覽器]';}?></a></li>
	<!--<li><a href="view.php?pj=<?php echo htmlspecialchars($roww[pjnbr])?>&ap=<?php echo htmlspecialchars($roww[ap])?>&vw=s" data-ajax="false" target="_blank" class="ui-btn ui-btn-inline ui-mini ui-btn-icon-left ui-icon-search"><?php if($_SESSION[tn]==PRC){echo '预览單頁形式';}else if($_SESSION[tn]==EN){echo 'single page style[Preview]';}else{echo '預覽單頁形式';}?></a></li>!-->
	</ul>
	</div>
	
		
	<a href="menudesign.php?pj=<?php echo htmlspecialchars($roww[pjnbr])?>&ap=<?php echo $ap?>&pn=<?php echo $pn?>&php=tabn&plt=1" data-ajax="false" class="ui-btn ui-btn ui-btn-inline ui-corner-all ui-mini ui-btn-icon-left ui-icon-bars"><?php if($_SESSION[tn]==PRC){echo '专案应用页列表';}else if($_SESSION[tn]==EN){echo 'Project Page List';}else{echo '專案應用頁列表';}?></a>
	
	<a href="tabm.php?pj=<?php echo htmlspecialchars($roww[pjnbr]) ?>&ap=<?php echo htmlspecialchars($roww[ap])?>" data-ajax="false" class="ui-btn ui-btn ui-btn-inline ui-corner-all ui-mini ui-btn-icon-left ui-icon-edit"><?php if($_SESSION[tn]==PRC){echo '内容合拼[合拼标签]';}else if($_SESSION[tn]==EN){echo 'Content merging[Tab merging]';}else{echo '內容合拼[合拼標簽]';}?></a>
	
	<a href="seq.php?pj=<?php echo htmlspecialchars($roww[pjnbr]) ?>&ap=<?php echo htmlspecialchars($roww[ap])?>" data-ajax="false" class="ui-btn ui-btn ui-btn-inline ui-corner-all ui-btn-icon-left ui-icon-edit"><?php if($_SESSION[tn]==PRC){echo '次序';}else if($_SESSION[tn]==EN){echo 'Re-order';}else{echo '次序';}?></a>&nbsp;&nbsp;&nbsp;&nbsp;

	<?php ;}?>
	
	
	<a href="#try" data-rel="popup" data-transition="pop" class="ui-btn ui-btn-f ui-btn-inline ui-corner-all ui-mini" style="color:white"><span class="pigss-pencil" style="color:red"></span><?php if($_SESSION[tn]==PRC){echo '快速试用';}else if($_SESSION[tn]==EN){echo 'Quick try';}else{echo '快速試用';}?></a>
	<div data-role="popup" id="try" style="min-width:300px;max-width:85%" data-position-to="window" data-theme="f"><a href="#" data-rel="back" class="popn ui-btn ui-btn-z ui-btn-icon-notext ui-icon-delete"></a><BR><BR>
	<?php if(!$pj){
				echo '<p>';if($_SESSION[tn]==PRC){echo '提示:您未创建应用的专案。';}else if($_SESSION[tn]==EN){echo 'Alert : You do not create APP project yet.';}else{echo '提示:您未創建應用的專案。';}echo '</p><hr>';
		  ;}
		  if(!$ap){
				echo '<p>';if($_SESSION[tn]==PRC){echo '提示:您未创建应用页。';}else if($_SESSION[tn]==EN){echo 'Alert : You do not create APP page yet.';}else{echo '提示:您未創建應用頁。';}echo '</p><hr>';
		 ;}
		 if(!file_exists('../panel/'.$roww[pjnbr].'/'.$ap.'.html')){
				echo '<p>';if($_SESSION[tn]==PRC){echo '提示:此应用页未有内容。';}else if($_SESSION[tn]==EN){echo 'Alert : No content was found on this APP page.';}else{echo '提示:此應用頁未有內容。';}echo '</p><hr>';
		 ;}
		 if(sizeof($htmn)<3){
				echo '<p>';if($_SESSION[tn]==PRC){echo '提示:最少二个内容段。';}else if($_SESSION[tn]==EN){echo 'Alert : At least two content parts must be on this APP page.';}else{echo '提示:最少二個內容段。';}echo '</p><hr>';		 
		 ;}
	?>
	
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '未有内容段';}else if($_SESSION[tn]==EN){echo 'No content part';}else{echo '未有內容段';}?></b> &nbsp;<?php if($_SESSION[tn]==PRC){echo '此功能必须有最少二个内容段,您能到上一页点选\'图像文字内容\'的首项\'文字编辑器\',键入多於一行的文字並送交,能产生一段内容段。再在\'文字编辑器\'点撀上一页,再重覆上述步骤,能再产生多一段内容段。';}else if($_SESSION[tn]==EN){echo 'You need to create at least two content parts for this page. You can click the previous page button on this page and go back to design page to select first Content Editor option of Photo and text content function. You need to enter some text [its length at least as a row] to the editor and click send button to create a content part. You need to click previous page button on the editor page and then repeat the above steps to create one more part.';}else{echo '此功能必須有最少二個內容段,您能到上一頁點選\'圖像文字內容\'的首項\'文字編輯器\',鍵入多於一行的文字並送交,能產生一段內容段。再在\'文字編輯器\'點撀上一頁,再重覆上述步驟,能再產生多一段內容段。';}?></p>	
	<hr>
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '播放音频功能';}else if($_SESSION[tn]==EN){echo 'Play audio simultaneously';}else{echo '播放音頻功能';}?></b> &nbsp;<?php if($_SESSION[tn]==PRC){echo '若不使用,忽略下列相关音频项。';}else if($_SESSION[tn]==EN){echo 'You can skip the related audio items for the following steps if you do not need to play audio simultaneously.';}else{echo '若不使用,忽略下列相關音頻項。';}?></p>	
	
	<hr>
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '音频档案';}else if($_SESSION[tn]==EN){echo 'Audio file';}else{echo '音頻檔案';}?></b> &nbsp;<?php if($_SESSION[tn]==PRC){echo '到本司网站覆制档案url或按相关指引。';}else if($_SESSION[tn]==EN){echo 'You need to go to our website to copy audio file URL or follow related instruction.';}else{echo '到本司網站覆制檔案url或按相關指引。';}?></p>	
	<p><?php if($_SESSION[tn]==PRC){echo '对手机应用,您只能用存於互联网或内联纲伺服器的特定格式档案,e.g. wav格式。';}else if($_SESSION[tn]==EN){echo 'You can only use the Internet or Intranet source of the audio file [specific format e.g. wav] for mobile APP.';}else{echo '對手機應用,您只能用存於互聯網或內聯綱伺服器的特定格式檔案,e.g. wav格式。';}?></p>	
	<hr>
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '导航标签填写';}else if($_SESSION[tn]==EN){echo 'Navigation Tab information';}else{echo '導航標簽填寫';}?></b> &nbsp;
	<?php if($_SESSION[tn]==PRC){echo '内容段显示在此页,点撀首段内容段上的标签按钮,再填\'添加标题\',在\'时间[毫秒] \'键入8000及在\'同时播放音频 \'键入上述url,并在启用标签点选标签导航按钮并提交。再对另一内容段重覆上述步骤。上述时间是内容段显示时段,8000是8秒。';}else if($_SESSION[tn]==EN){echo 'The created content parts will be showed on this page. You need to click the Amend Tabs above the first content part and then enter the \'Adding title\' field, enter 8000 to the \'AutoPlay duration[milliseconds]\' field and enter the above url to \'Play audio simultaneously\'. You need to select the tab navigation buttons on the \'Enable tab button\' field. You can repeat these steps for the next tab. The above timing is the show time of content part. The value 8000 is 8 seconds.';}else{echo '內容段顯示在此頁,點撀首段內容段上的標簽按鈕,再填\'添加標題\',在\'時間[毫秒] \'鍵入8000及在\'同時播放音頻 \'鍵入上述url,並在啟用標簽點選標簽導航按鈕並提交。再對另一內容段重覆上述步驟。上述時間是內容段顯示時段,8000是8秒。';}?></p>	
	<hr>
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '试用';}else if($_SESSION[tn]==EN){echo 'Testing';}else{echo '試用';}?></b> &nbsp;
	<?php if($_SESSION[tn]==PRC){echo '您须点撀此页上的预览,再进行测试。再修改及选用不同设置再预览并试用。';}else if($_SESSION[tn]==EN){echo 'You need to click the above preview button to test your design. You can enter or select different parameters to test their functions and effects.';}else{echo '您須點撀此頁上的預覽,再進行測試。再修改及選用不同設置再預覽並試用。';}?></p>	
	
	</div>
	<hr>
	<span style="color:black"><?php if($_SESSION[tn]==PRC){echo '专案';}else if($_SESSION[tn]==EN){echo 'Project';}else{echo '專案';}?></span>
	<?php 	$sql=$db->query("select * from webpj where cno='$pj'");
	if($sql)$row=$sql->fetch();
	echo '['.htmlspecialchars($row[date]).'] '.htmlspecialchars($row[title]);?>
	
	&nbsp;&nbsp;&nbsp;&nbsp;
	
	<span style="color:black"><?php if($_SESSION[tn]==PRC){echo '应用页称';}else if($_SESSION[tn]==EN){echo 'Page name';}else{echo '應用頁稱';}?></span> :
	<?php echo htmlspecialchars($roww[title]);?>
	<hr>
	
	
		<FORM action="tabn.php?pj=<?php echo htmlspecialchars($roww[pjnbr]) ?>&ap=<?php echo htmlspecialchars($roww[ap]) ?>&pn=<?php echo htmlspecialchars($pn) ?>&v=<?php echo htmlspecialchars($v) ?>" id="webxls" method="post" data-ajax="false"   onSubmit="return checkform(this);">

	<?php if($pn){?><b style="color:red">
	<?php if($_SESSION[tn]==PRC){echo '修改标签';}else if($_SESSION[tn]==EN){echo 'Amend Tabs';}else{echo '修改標簽';}echo ' - No.'.htmlspecialchars($pn);?></b><BR>

	<div class="ui-grid-c">
	
	<div class="ui-block-a"><span style="color:RED"><?php if($_SESSION[tn]==PRC){echo '添加标题';}else if($_SESSION[tn]==EN){echo 'Adding title';}else{echo '添加標題';}?></span><input type="text" name="title" placeholder="" value="<?php if($titlevlu=='&amp;nbsp;'){echo '';}else{echo htmlspecialchars($titlevlu);}?>"></div>
	<div class="ui-block-b"><?php if($_SESSION[tn]==PRC){echo '标题图像';}else if($_SESSION[tn]==EN){echo 'Title picture';}else{echo '標題圖像';}?><input type="text" name="titleimg" placeholder="" value="<?php echo htmlspecialchars($titleimgvlu)?>">
	</div><div class="ui-block-c"><?php if($_SESSION[tn]==PRC){echo '标签按钮背景颜色';}else if($_SESSION[tn]==EN){echo 'Background color of tab button';}else{echo '標簽按鈕背景顏色';}?><input type="text" name="clr" placeholder="" value="<?php echo htmlspecialchars($clrvlu)?>">
	</div>
	<div class="ui-block-d"><?php if($_SESSION[tn]==PRC){echo '屏高内容背景';}else if($_SESSION[tn]==EN){echo 'Background of Fit screen content';}else{echo '屏高內容背景';}?><input type="text" name="hgtbg" placeholder="" value="<?php echo htmlspecialchars($hgtbgvlu)?>"></div>
	</div>
	<input type="hidden" name="tagn"  value="<?php echo htmlspecialchars($tagnvlu)?>">
	
	
	<div class="ui-grid-a"><div class="ui-block-a" style="width:15%"><span style="color:RED"><?php if($_SESSION[tn]==PRC){echo '播放时间[毫秒]';}else if($_SESSION[tn]==EN){echo 'AutoPlay duration[milliseconds]';}else{echo '播放時間[毫秒]';}?></span>
	<?php //if(sizeof($audiohref)){<input type="number" name="tmdpr" placeholder="" value="<?php echo htmlspecialchars($tmdprvlu)? >"> ?><?php 	
		//;}else{ echo '<br><br>';if($_SESSION[tn]==PRC){echo '此页没有使用音频功能。';}else if($_SESSION[tn]==EN){echo 'No audio function used on this page.';}else{echo '此頁沒有使用音頻功能。';} ;}
	?><input type="number" name="tmdpr" placeholder="" value="<?php echo htmlspecialchars($tmdprvlu)?>">
	</div><div class="ui-block-b" style="width:85%"><span style="color:RED"><?php if($_SESSION[tn]==PRC){echo '同时播放音频';}else if($_SESSION[tn]==EN){echo 'Play audio simultaneously';}else{echo '同時播放音頻';}?></span>
	<input type="text" name="audio" id="audio" value="<?php echo htmlspecialchars($audiovlu)?>">
	

	
	</div></div>
	
	
	<hr>
	
	<span style="color:RED"><?php if($_SESSION[tn]==PRC){echo '启用标签';}else if($_SESSION[tn]==EN){echo 'Enable tab button';}else{echo '啟用標簽';}?></span>
	<select name="btntyp" required>
	<option value=""><?php if($_SESSION[tn]==PRC){echo '选择';}else if($_SESSION[tn]==EN){echo 'Choose';}else{echo '選擇';}?></option>
	<option value="1" <?php if($datatabnbg[0]=='1')echo 'selected=selected';?>><?php if($_SESSION[tn]==PRC){echo '标签导航按钮';}else if($_SESSION[tn]==EN){echo 'tab navigation buttons';}else{echo '標簽導航按鈕';}?></option>
	<option value="5" <?php if($datatabnbg[0]=='5')echo 'selected=selected';?>><?php if($_SESSION[tn]==PRC){echo '上下导航按鈕';}else if($_SESSION[tn]==EN){echo 'up and down navigation buttons';}else{echo '上下導航按鈕';}?></option>
	<option value="d" <?php if($datatabnbg[0]=='d')echo 'selected=selected';?>><?php if($_SESSION[tn]==PRC){echo '不用';}else if($_SESSION[tn]==EN){echo 'not use';}else{echo '不用';}?></option>
	</select>
	<div class="ui-grid-d"><div class="ui-block-a"><BR><input name="widthfit" id="widthfit" type="checkbox" <?php if($datatabnbg[9]){echo 'checked="checked"';}?>><label for="widthfit"><?php if($_SESSION[tn]==PRC){echo '此页内容阔度缩窄';}else if($_SESSION[tn]==EN){echo 'Content width narrow';}else{echo '此頁內容闊度縮窄';}?></label><!--<input name="fit" id="fit" type="checkbox" <?php if($datatabnbg[1]){echo 'checked="checked"';}?>><label for="fit"><?php if($_SESSION[tn]==PRC){echo '此页内容屏高';}else if($_SESSION[tn]==EN){echo 'Fit screen[viewport] height';}else{echo '此頁內容屏高';}?></label>!--></div>
	<div class="ui-block-b"><BR><input name="tabnwdhstyle" id="tabnwdhstyle" type="checkbox" value="tabnwdhstyle" <?php if($datatabnbg[2]){echo 'checked="checked"';}?>><label for="tabnwdhstyle"><?php if($_SESSION[tn]==PRC){echo '置中型式';}else if($_SESSION[tn]==EN){echo 'Middle sytle';}else{echo '置中型式';}?></label></div>
	<div class="ui-block-c"><?php if($_SESSION[tn]==PRC){echo '標題POPUP按钮背景颜色';}else if($_SESSION[tn]==EN){echo 'Background color of Menu popup button';}else{echo '標題POPUP按鈕背景顏色';}?><input type="text" name="popclr" placeholder="" value="<?php echo htmlspecialchars($datatabnbg[3])?>"></div>
	<!--<div class="ui-block-d"><?php if($_SESSION[tn]==PRC){echo 'refresh按钮背景颜色';}else if($_SESSION[tn]==EN){echo 'Background color of refresh button';}else{echo 'refresh按鈕背景顏色';}?><input type="text" name="tabrefresh" placeholder="" value="<?php echo htmlspecialchars($datatabnbg[5])?>"></div>!-->
	<div class="ui-block-e"><?php if($_SESSION[tn]==PRC){echo '停止播放按钮背景颜色';}else if($_SESSION[tn]==EN){echo 'Background color of stop playing button';}else{echo '停止播放按鈕背景顏色';}?><input type="text" name="stplclr" placeholder="" value="<?php echo htmlspecialchars($datatabnbg[4])?>"></div>
	</div>
	
	

	
	<div class="ui-grid-a"><div class="ui-block-a"> <!--<?php if($_SESSION[tn]==PRC){echo '返上一应用页按钮標題';}else if($_SESSION[tn]==EN){echo 'Title of previous APP page button';}else{echo '返上一應用頁按鈕標題';}?>
	<input type="text" name="returntitle"  value="<?php echo htmlspecialchars($datatabnbg[6])?>">!--></div>
	<!--<div class="ui-block-b"><!--<?php if($_SESSION[tn]==PRC){echo 'refresh按钮標題';}else if($_SESSION[tn]==EN){echo 'Title of refresh button';}else{echo 'refresh按鈕標題';}?><input type="text" name="refreshtitle"  value="<?php echo htmlspecialchars($datatabnbg[7])?>"></div>!-->
	<div class="ui-block-b"><?php if($_SESSION[tn]==PRC){echo '停止播放按钮標題[及背景颜色]';}else if($_SESSION[tn]==EN){echo 'Title of stop playing button[& background color]';}else{echo '停止播放按鈕標題[及背景顏色]';}?><input type="text" name="stptitle"  value="<?php echo htmlspecialchars($datatabnbg[8])?>"></div>
	</div>
	<?php ;}//if($pn){?>
	<input type="hidden" name="guanyin1" value="<?php if(!$_POST[guanyin1])$_SESSION[guanyin1]=rand();
	echo htmlspecialchars($_SESSION[guanyin1]); ?>">
	<div class="ui-grid-b"><div class="ui-block-a">

	<?php if($pn){?><input type="submit" name="submit" id="webxlsbtn" Value="<?php if($_SESSION[tn]==PRC){echo '送交';}else if($_SESSION[tn]==EN){echo 'SEND';}else{echo '送交';}?>"><?php ;}//if($pn){?>
	</div><div class="ui-block-b">
<a href="#inf" data-rel="popup" data-transition="pop" class="ui-btn ui-btn-b ui-btn-inline ui-corner-all ui-mini">? <?php if($_SESSION[tn]==PRC){echo '启用标签';}else if($_SESSION[tn]==EN){echo 'Enable tab button';}else{echo '啟用標簽';}?><?php if($_SESSION[tn]==PRC){echo '解释';}else if($_SESSION[tn]==EN){echo '- Explanation';}else{echo '解釋';}?></a>
	<div data-role="popup" id="inf" data-position-to="window" data-theme="f"  class="ifrwidthpn"><a href="#" data-rel="back" class="popn ui-btn ui-btn-z ui-btn-icon-notext ui-icon-delete"></a>
		
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '标签按钮';}else if($_SESSION[tn]==EN){echo 'Tab button';}else{echo '標簽按鈕';}?></b> &nbsp;<?php if($_SESSION[tn]==PRC){echo '应用页能加多个功能内容[内容段],您能在页的右边加导航标签按钮及标题导航菜单,用户点撀按钮浏览内容[内容段]。';}else if($_SESSION[tn]==EN){echo 'An APP page can be edited one or several APP function parts. You can add navigation buttons on the right side of APP page. APP user clicks them to shift to and browse APP content parts.';}else{echo '應用頁能加多個功能內容[內容段],您能在頁的右邊加導航標簽按鈕及標題導航菜單,用戶點撀按鈕瀏覽內容[内容段]。';}?></p>	<HR>
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '启用标签';}else if($_SESSION[tn]==EN){echo 'Enable tab button';}else{echo '啟用標簽';}?></b> &nbsp;
	<?php if($_SESSION[tn]==PRC){echo '标签导航按钮是一段内容一个按钮,用户点撀按钮到相关内容。您亦能点撀\'标题合拼\'将不同的内容合拼为一个或或多个不同内容段。上下导航按钮是有上及下的按钮供用户上下浏览内容。';}else if($_SESSION[tn]==EN){echo 'Tab navigation buttons are one button for one content part. APP user clicks these buttons to shift the webview to specific content part. You can click the tab merging to combine any content to one or several content parts. The up and down navigation buttons are two buttons for shifting the web content part going up and down.';}else{echo '標簽導航按鈕是一段內容一個按鈕,用戶點撀按鈕到相關內容。您亦能點撀\'標題合拼\'將不同的內容合拼為一個或多個不同內容段。上下導航按鈕是有上及下的按鈕供用戶上下瀏覽內容。';}?></p>	
	<p><?php if($_SESSION[tn]==PRC){echo '向上导航按钮使用首个按钮的标签按钮背景颜色。向下导航按钮使用次按钮的标签按钮背景颜色。';}else if($_SESSION[tn]==EN){echo 'You can use background color of first tab button for the \'up\' navigation button and use background color of second tab button for the \'down\' navigation button.';}else{echo '向上導航按鈕使用首個按鈕的標簽按鈕背景顏色。向下導航按鈕使用次按鈕的標簽按鈕背景顏色。';}?></p>	
	<p><?php if($_SESSION[tn]==PRC){echo '启用标签内的设定均对此页所有标签导航按钮的设定。';}else if($_SESSION[tn]==EN){echo 'The setting of \'Enable tab button\' is for the all tab buttons on this page.';}else{echo '啟用標簽內的設定均對此頁所有標簽導航按鈕的設定。';}?></p>	
	<HR>
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '停用标签按钮';}else if($_SESSION[tn]==EN){echo 'Stop using Tab button';}else{echo '停用標簽按鈕';}?></b> 
	
	<?php if($_SESSION[tn]==PRC){echo '若巳设计但不想用,在\'启用标签\'选停用标签。';}else if($_SESSION[tn]==EN){echo 'You need to select \'not use\' in the field \'Enable tab button\'.';}else{echo '若巳設計但不想用,在\'啟用標簽\'選停用標簽。';}?></p>	
	<HR>
	<!--<HR>
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '此页内容屏高';}else if($_SESSION[tn]==EN){echo 'Fit screen[viewport] height';}else{echo '此頁內容屏高';}?></b>
	<?php if($_SESSION[tn]==PRC){echo '若选用此设定,此页的标签间的内容是填满用户设备画面,若内容长於设备屏幕高,须拖拽画面浏览。';}else if($_SESSION[tn]==EN){echo 'If you use this setting, the content between tabs will be fit to height of APP user device screen. If the content length is longer than the height, you need to swipe the content frame to browse content.';}else{echo '若選用此設定,此頁的標簽間的內容是填滿用戶設備畫面,若內容長於設備屏幕高,須拖拽畫面瀏覽。';}?></p>	<HR>!-->
	
	
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '置中型式';}else if($_SESSION[tn]==EN){echo 'Middle sytle';}else{echo '置中型式';}?></b>
	<?php if($_SESSION[tn]==PRC){echo '上述的按钮以上下置中型式显示,若用此型式,您应限制按钮的数量或使用上下导航按钮。';}else if($_SESSION[tn]==EN){echo 'The popup buttons above mentioned are in middle height position of page. If you use this style, you need to control the total number of tab buttons or use up and down navigation buttons.';}else{echo '上述的按钮以上下置中型式顯示,若用此型式,您應限制按鈕的數量或使用上下導航按鈕。';}?></p>	<HR>
	
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '标题POPUP按钮背景颜色';}else if($_SESSION[tn]==EN){echo 'Background color of Menu popup button';}else{echo '標題POPUP按鈕背景顏色';}?><!--/<?php if($_SESSION[tn]==PRC){echo 'refresh按钮背景颜色';}else if($_SESSION[tn]==EN){echo 'Background color of refresh button';}else{echo 'refresh按鈕背景顏色';}?>/<?php if($_SESSION[tn]==PRC){echo '停止播放按钮背景颜色';}else if($_SESSION[tn]==EN){echo 'Background color of stop playing button';}else{echo '停止播放按鈕背景顏色';}?>!--></b>
	<?php if($_SESSION[tn]==PRC){echo '您能填上rgb颜色码 e.g. rgb(125,125,125), rgba颜色码 e.g. rgba(125,125,125,0.5), rgba颜色码 e.g. rgba(0,0,0,0)  或 hex颜色码 e.g. #123456, 代替指定颜色。应使用rgba。';}else if($_SESSION[tn]==EN){echo 'You can add rgb color code e.g. rgb(125,125,125), rgba color code e.g. rgba(125,125,125,0.5), rgba color code e.g. rgba(0,0,0,0)  or hex color code e.g. #123456 instead of specific color. The rgba is recommended.';}else{echo '您能填上rgb顏色碼 e.g. rgb(125,125,125), rgba顏色碼 e.g. rgba(125,125,125,0.5), rgba顏色碼 e.g. rgba(0,0,0,0)  或 hex顏色碼 e.g. #123456, 代替指定顏色。應使用rgba。';}?></p>
	<HR>
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '标题POPUP按钮';}else if($_SESSION[tn]==EN){echo 'Menu popup button';}else{echo '標題POPUP按鈕';}?>/<?php if($_SESSION[tn]==PRC){echo '停止播放按钮';}else if($_SESSION[tn]==EN){echo 'Stop playing button';}else{echo '停止播放按鈕';}?></b>
	<?php if($_SESSION[tn]==PRC){echo '若对导航按钮设置标题,标题POPUP按钮显示在导航按钮上,用户点撀显示标题导航菜单。若设置同步播放音频,用户点撀导航按钮令内容转换及播放音频,您能加停止播放啟用按钮。';}else if($_SESSION[tn]==EN){echo 'If you add title to navigation button, a menu popup button will be created. APP user can click it to show the navigation popup. If you use \'Play audio simultaneously\', you can add the Stop playing enable button to switch play or not play audio file.';}else{echo '若對導航按鈕設置標題,標題POPUP按鈕顯示在導航按鈕上,用戶點撀顯示標題導航菜單。若設置同步播放音頻,用戶點撀導航按鈕令內容轉換及播放音頻,您能加停止播放啟用按钮。';}?></p>
	
	<HR>
	<h4 style="color:black"><?php if($_SESSION[tn]==PRC){echo '标签按钮背景颜色';}else if($_SESSION[tn]==EN){echo 'Background color of tab button';}else{echo '標簽按鈕背景顏色';}?></h4>
	<p>
	<?php if($_SESSION[tn]==PRC){echo '您能填上rgb颜色码 e.g. rgb(125,125,125), rgba颜色码 e.g. rgba(125,125,125,0.5), rgba颜色码 e.g. rgba(0,0,0,0)  或 hex颜色码 e.g. #123456, 代替指定颜色。若使用\'同时播放音频\',应使用rgba。';}else if($_SESSION[tn]==EN){echo 'You can add rgb color code e.g. rgb(125,125,125), rgba color code e.g. rgba(125,125,125,0.5), rgba color code e.g. rgba(0,0,0,0)  or hex color code e.g. #123456 instead of specific color. If you use \'Play audio simultaneously\', you may use rgba.';}else{echo '您能填上rgb顏色碼 e.g. rgb(125,125,125), rgba顏色碼 e.g. rgba(125,125,125,0.5), rgba顏色碼 e.g. rgba(0,0,0,0)  或 hex顏色碼 e.g. #123456, 代替指定顏色。若使用\'同時播放音頻\',應使用rgba。';}?></p> 
	
	
<HR>
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '添加标题/标题图像';}else if($_SESSION[tn]==EN){echo 'Adding title/Title picture [thumbnail]';}else{echo '添加標題/標題圖像';}?></b>
	<?php if(!$roww[pjnbr])$roww[pjnbr]=1;
	if($_SESSION[tn]==PRC){echo '您能在标签按钮的顶部再加popup按钮,用户点撀此按钮显示含标题及或图像的popup列表,作用同样是浏览标签功能。此处是填写此标题及相关图像。您须将图像档置於panel/'.$roww[pjnbr].'/images。';}else if($_SESSION[tn]==EN){echo 'You can add popup button to the tab buttons. APP user clicks on the popup button to show an item list with same tab navigation function. You need to enter the related item title and title picture\'s filename. You need to place the file to panel/'.$roww[pjnbr].'/images folder.';}else{echo '您能在標簽按鈕的頂部再加popup按鈕,用戶點撀此按鈕顯示含標題及或圖像的popup列表,作用同樣是瀏覽標簽功能。此處是填寫此標題及相關圖像。您須將圖像檔置於panel/'.$roww[pjnbr].'/images。';}?></p> 
	<p><?php if($_SESSION[tn]==PRC){echo '若首次填此标题,您须再提送一次才能启用此标题。';}else if($_SESSION[tn]==EN){echo 'If you fill in this title at first time, you need to SEND the data again.';}else{echo '若首次填此標題,您須再提送一次才能啟用此標題。';}?>
	</p>
	<p><?php if($_SESSION[tn]==PRC){echo '若巳填标题并再删除,填[delete]。但播放仍有此标题的内容段。';}else if($_SESSION[tn]==EN){echo 'If you want to delete the filled title, you need to enter [delete]. But the playing function still includes this related content part.';}else{echo '若巳填標題並再刪除,填[delete]。但播放仍有此標題的內容段。';}?>
	</p>
	<!--<HR>
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '返上一应用页按钮標題';}else if($_SESSION[tn]==EN){echo 'Title of previous APP page button';}else{echo '返上一應用頁按鈕標題';}?></b> <?php if($_SESSION[tn]==PRC){echo '填此标题,能在popup列表内添加返上一应用页按钮及标题。若想添加按钮背景颜色,用#号隔开,您应使用rgb 或rgba颜色码。';}else if($_SESSION[tn]==EN){echo 'If you fill in this title, an return to previous APP page button will be showed on the above mentioned item list. If you want to alter the button background color, you need to use # as seperator. You need to use rgb or rgba color code.';}else{echo '填此標題,能在popup列表內添加返上一應用頁按鈕及標題。若想添加按鈕背景顏色,用#號隔開,您應使用rgb 或rgba顏色碼。';}?>
	</p>
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo 'refresh按钮標題';}else if($_SESSION[tn]==EN){echo 'Title of refresh button';}else{echo 'refresh按鈕按鈕標題';}?></b> <?php if($_SESSION[tn]==PRC){echo '填此标题,能在popup列表内添加refresh按钮及标题。若想添加按钮背景颜色,用#号隔开,您应使用rgb 或rgba颜色码。';}else if($_SESSION[tn]==EN){echo 'If you fill in this title, an APP page refresh button will be showed on the above mentioned item list. If you want to alter the button background color, you need to use # as seperator. You need to use rgb or rgba color code.';}else{echo '填此標題,能在popup列表內添加refresh按鈕及標題。若想添加按鈕背景顏色,用#號隔開,您應使用rgb 或rgba顏色碼。';}?>
	</p>!-->
	<HR>
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '停止播放按钮標題';}else if($_SESSION[tn]==EN){echo 'Title of stop playing button';}else{echo '停止播放按鈕標題';}?></b> <?php if($_SESSION[tn]==PRC){echo '填此标题,能在popup列表内添加停止播放音频按钮及标题。若想添加按钮背景颜色,用#号隔开,您应使用rgb 或rgba颜色码。e.g. 按钮的标题#rgb(125,125,125)';}else if($_SESSION[tn]==EN){echo 'If you fill in this title, a stop playing audio button will be showed on the  item list above mentioned. If you want to alter the button background color, you need to use # as seperator. You need to use rgb or rgba color code. e.g. title#rgb(125,125,125)';}else{echo '填此標題,能在popup列表內添加停止播放音頻按鈕及標題。若想添加按鈕背景顏色,用#號隔開,您應使用rgb 或rgba顏色碼。e.g. 按鈕的標題#rgb(125,125,125)';}?>
	</p>
	
	</div>
	
	
	<a href="#infs" data-rel="popup" data-transition="pop" class="ui-btn ui-btn-b ui-btn-inline ui-corner-all ui-mini">? <?php if($_SESSION[tn]==PRC){echo '添加标题';}else if($_SESSION[tn]==EN){echo 'Adding title';}else{echo '添加標題';}?><?php if($_SESSION[tn]==PRC){echo '解释';}else if($_SESSION[tn]==EN){echo ' - Explanation';}else{echo '解釋';}?></a>
	<div data-role="popup" id="infs" style="min-width:300px;max-width:85%" data-position-to="window" data-theme="f"><a href="#" data-rel="back" class="popn ui-btn ui-btn-z ui-btn-icon-notext ui-icon-delete"></a>
		
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '标题POPUP按钮';}else if($_SESSION[tn]==EN){echo 'Menu popup button';}else{echo '標題POPUP按鈕';}?></b> &nbsp;<?php if($_SESSION[tn]==PRC){echo '您能在标签按钮再加popup按钮,用户点撀此按钮显示含标题及或图像的popup列表,作用同样是浏览标签功能。';}else if($_SESSION[tn]==EN){echo 'You can add popup button to the tab buttons. APP user clicks on the popup button to show an item list with same tab navigation function.';}else{echo '您能在標簽按鈕再加popup按鈕,用戶點撀此按鈕顯示含標題及或圖像的popup列表,作用同樣是瀏覽標簽功能。';}?></p>	
	
	<p><?php if($_SESSION[tn]==PRC){echo '您能在下面点撀相关内容段的按钮,再添加标题。';}else if($_SESSION[tn]==EN){echo 'You can add button title by clicking related tag of the content listed below.';}else{echo '您能在下面點撀相關內容段的按鈕,再添加標題。';}?></p>
<HR>
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '添加标题图像';}else if($_SESSION[tn]==EN){echo 'Adding title picture [Thumbnail]';}else{echo '添加標題圖像';}?></b>
	<?php if($_SESSION[tn]==PRC){echo '此处是填写此标题及相关图像。您须将图像档置於panel/'.$roww[pjnbr].'/images。';}else if($_SESSION[tn]==EN){echo ' You need to enter the related item title and title picture\'s filename. You need to place the file to panel/'.$roww[pjnbr].'/images folder.';}else{echo '此處是填寫此標題及相關圖像。您須將圖像檔置於panel/'.$roww[pjnbr].'/images。';}?></p> 
		
	<HR>
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '删除标题POPUP按钮';}else if($_SESSION[tn]==EN){echo 'Delete Menu popup button';}else{echo '删除標題POPUP按鈕';}?></b> &nbsp;
	<?php if($_SESSION[tn]==PRC){echo '逐一移除标题及图像才能删除标题POPUP按钮。';}else if($_SESSION[tn]==EN){echo 'You need to delete all titles and title pictures to delete the Menu popup button.';}else{echo '移除標題及圖像才能删除標題POPUP按鈕。';}?></p><HR>
	<h4 style="color:black"><?php if($_SESSION[tn]==PRC){echo '标签按钮背景颜色';}else if($_SESSION[tn]==EN){echo 'Background color of tab button';}else{echo '標簽按鈕背景顏色';}?></h4>
	<p>
	<?php if($_SESSION[tn]==PRC){echo '您能填上rgb颜色码e.g. rgb(125,125,125), rgba颜色码e.g. rgba(125,125,125,0.5) 或 hex颜色码e.g. #123456代替指定颜色。若使用\'同时播放音频\',应使用rgba。';}else if($_SESSION[tn]==EN){echo 'You can add rgb color code e.g. rgb(125,125,125), rgba color code e.g. rgba(125,125,125,0.5) or hex color code e.g. #123456 instead of specific color. If you use \'Play audio simultaneously\', you may use rgba.';}else{echo '您能填上rgb顏色碼e.g. rgb(125,125,125), rgba顏色碼e.g. rgba(125,125,125,0.5) 或 hex顏色碼e.g. #123456代替指定顏色。若使用\'同時播放音頻\',應使用rgba。';}?></p> 
	<HR>
	<p><b style="color:black"><?php if(!$roww[pjnbr])$roww[pjnbr]='?';
	if($_SESSION[tn]==PRC){echo '屏高内容背景';}else if($_SESSION[tn]==EN){echo 'Background of Fit screen content';}else{echo '屏高內容背景';}?></b>
	<?php //if($_SESSION[tn]==PRC){echo '若设定\'此页内容屏高\',您能加背景。您须将数据再提送一次才生效。';}else if($_SESSION[tn]==EN){echo 'You can add background color or picture to the oontent frame if you use \'Fit screen[viewport] height\' setting. You need to send data twice for this function.';}else{echo '若設定\'此頁內容屏高\',您能加背景。您須將數據再提送一次才生效。';}?></p>
	<p><?php if($_SESSION[tn]==PRC){echo '您能填上rgb颜色码e.g. rgb(125,125,125), rgba颜色码e.g. rgba(125,125,125,0.5) 或 hex颜色码e.g. #123456。若整页是有背景图像,您应使用rgba。若使用存於应用内的图像,您须将图像存於 panel/'.$roww[pjnbr].'/images 档夹. 您须填写图像档名, e.g. picture.png。若设置背景图像上下左右重覆显示,在档案名加[xy],e.g. picture[xy].png。';}else if($_SESSION[tn]==EN){echo 'You can add rgb color code e.g. rgb(125,125,125), rgba color code e.g. rgba(125,125,125,0.5) or hex color code e.g. #123456. If you use background picture for the page, you may use rgba color code. If you use APP stored pictures, you need to prepare pictures and store them in app\'s panel/'.$roww[pjnbr].'/images folder. You need to fill in picture file name. e.g. picture.png.  If you add [xy] to the picture file name (e.g. picture[xy].png, the picture will be repeated both vertically and horizontally.';}else{echo '您能填上rgb顏色碼e.g. rgb(125,125,125), rgba顏色碼e.g. rgba(125,125,125,0.5) 或 hex顏色碼e.g. #123456。若整頁是有背景圖像,您應使用rgba。若使用存於應用內的圖像,您須將圖像存於 panel/'.$roww[pjnbr].'/images 檔夾. 您須填寫圖像檔名, e.g. picture.png。若設置背景圖像上下左右重覆顯示,在檔案名加[xy],e.g. picture[xy].png。';}?></p>
	<p><?php if($_SESSION[tn]==PRC){echo '建议使用颜色码或[xy]形式的花纹图案。';}else if($_SESSION[tn]==EN){echo 'You are better to use color color or pattern picture for [xy] style.';}else{echo '建議使用顏色碼或[xy]形式的花紋圖案。';}?></p>
	
	<HR>
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '播放时间[毫秒]';}else if($_SESSION[tn]==EN){echo 'AutoPlay duration [milliseconds]';}else{echo '播放時間[毫秒]';}?></b>
	<?php if($_SESSION[tn]==PRC){echo '填上播放时间[毫秒],标签能自行播放,此时间是此签标停顿时间,若加同时播放音频,此时间必须长於相关音频时间长度。<BR>1秒等於1000毫秒。';}else if($_SESSION[tn]==EN){echo 'If you add the AutoPlay duration, the tab can be played automatically. It is the showing time of this tab content. The time value must be greater than the duration of audio file if you use the \'Play audio simultaneously\'.';}else{echo '填上播放時間[毫秒],標簽能自行播放,此時間是此簽標停頓時間,若加同時播放音頻,此時間必須長於相關音頻時間長度。<BR>1秒等於1000毫秒。';}?></p>		<HR>
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '同时播放音频';}else if($_SESSION[tn]==EN){echo 'Play audio simultaneously';}else{echo '同時播放音頻';}?></b>
	<?php if($_SESSION[tn]==PRC){echo '音频档案限存於互联网或内联网的特定格式音频档案,e.g. http://www.xxxxxxxx.com/sound.wav。';}else if($_SESSION[tn]==EN){echo 'You need to use specific format of audio files stored in the Internet or Intranet server. e.g. http://www.xxxxxxxx.com/sound.wav';}else{echo '音頻檔案限存於互聯網或內聯網的特定格式音頻檔案,e.g. http://www.xxxxxxxx.com/sound.wav。';}?></p>		
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '启用播放功能';}else if($_SESSION[tn]==EN){echo 'Enable play functions';}else{echo '啟用播放功能';}?></b>
	<?php if($_SESSION[tn]==PRC){echo '上下导航标签的上下按钮是没有播放功能。';}else if($_SESSION[tn]==EN){echo 'The up and down buttons of up and down direction navigation are not able to play audio.';}else{echo '上下導航標簽的上下按鈕是沒有播放功能。';}?></p>		
	
	
	
	</div>
	

	
</div><div class="ui-block-c"><a href="tabnexample.php" target="_blank" class="ui-btn ui-btn-b ui-btn-inline ui-corner-all ui-mini"><?php if($_SESSION[tn]==PRC){echo '标签导航按钮';}else if($_SESSION[tn]==EN){echo 'Tab navigation buttons';}else{echo '標簽導航按鈕';}?></a>
	<a href="tabnexamples.php" target="_blank" class="ui-btn ui-btn-b ui-btn-inline ui-corner-all ui-mini"><?php if($_SESSION[tn]==PRC){echo '上下导航按鈕';}else if($_SESSION[tn]==EN){echo 'Up and down navigation buttons';}else{echo '上下導航按鈕';}?></a></div></div>

	</FORM>
<?php 
		
	if($pn){
		
				for($i=1;$i<sizeof($htm);$i++){
					$pnvls = explode('!-->',$htm[$i]);
					if($pn and $pn==$i){$slt = '<!--part'.$pnvls[0].str_replace('src="images/','src="../panel/'.$roww[pjnbr].'/images/',$htm[$i]);}
				;}
	;}//if($pn){
	?>

	<?php //if($pn){
	//echo '<hr>';
	//if($_SESSION[tn]==PRC){echo '巳选內容';}else if($_SESSION[tn]==EN){echo 'Selected Content';}else{echo '巳選內容';}
				//echo '<div style="max-height:220px;overflow-x:hidden;">'.$slt.'</div>';
	//;}//if($pn){?>
	
	
	<?php 

	if($pj){			
			
			$hrefs = '<a href="tabn.php?ap='.htmlspecialchars($roww[ap]).'&pj='.htmlspecialchars($roww[pjnbr]).'&pnvlu" class="ui-btn ui-btn-a ui-btn-icon-left ui-icon-edit" style="color:red" data-ajax="false">';
			if($_SESSION[tn]==PRC){$hrefs .= '修改标签';}else if($_SESSION[tn]==EN){$hrefs .= 'Amend Tabs';}else{$hrefs .= '修改標簽';}$hrefs .='---';
			$hrefs .= '</a>';
			
			
				for($i=1;$i<sizeof($htm);$i++){
					if(strpos($htm[$i],'sys!-->')!==false){
						if(strpos($htm[$i],'id="'.$pj.$ap.'vnts')!==false){
						$htmn[$i] = str_replace('sys!-->','sys!-->'.$hrefs,$htm[$i]);
						$htmn[$i] = str_replace('&pnvlu','&v='.$i.'&pnvlu',$htmn[$i]);
						}
						else{$htmn[$i] = str_replace('sys!-->','sys!-->'.$href,$htm[$i]);}
					}
					$pnvls = explode('!-->',$htm[$i]);
					$htmn[$i] = str_replace('pnvlu','pn='.$pnvls[0],$htmn[$i]);	$htmn[$i] = str_replace('---',' - No.'.$pnvls[0],$htmn[$i]);			
		
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
	$html = str_replace('src="../panel/'.$roww[pjnbr].'/css/images/','src="css/images/',$html);
	
				
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

if($_POST[btntyp] and $v and $pj and $_SESSION[guanyin1] and $_SESSION[guanyin1]==$_POST[guanyin1]){

	
	if($ap and !preg_match('/^[0-9]*$/', $ap))exit;
	if($pj and !preg_match('/^[0-9]*$/', $pj))exit;
	if($pn and !preg_match('/^[0-9]*$/', $pn))exit;

	if($_POST[tmdpr] and !preg_match('/^[0-9]*$/', $_POST[tmdpr]))exit;
	if($_POST[audio])$audio =1;
	
			
			
			if($_POST[widthfit])$tabnwdhs = 's';
			$tabshtml = '<ul class="tablistright'.$tabnwdhs.'" id="'.$pj.$ap.'tablistright" data-role="listview">';
			
			if($_POST[btntyp]==5){
				for($i=1;$i<=sizeof($btnbrsvlu);$i++){
					if($i==sizeof($btnbrsvlu)){$datavntsns .= htmlspecialchars($btnbrsvlu[$i]);}
					else{$datavntsns .= htmlspecialchars($btnbrsvlu[$i]).',';}
				}
				if($vclrvlu[1]){$clrsvlsn = 'style="background-color:'.htmlspecialchars($vclrvlu[1]).'"';}else{$clrsvlsn ='style="background-color:rgba(0,0,0,0)"';}			
				$tabshtml .= '<li><a href="#" style="background-color:rgba(0,0,0,0)" class="'.$pj.$ap.'tbnu ui-btn ui-btn-z ui-btn-icon-notext ui-icon-carat-u"></a></li>';
			}
			
			if($_POST[popclr]){$popclr = 'style="background-color:'.htmlspecialchars($_POST[popclr]).'"';}else{$popclr = 'style="background-color:rgba(0,0,0,0)"';}
			if(($tabmenu and (!$delvtitle or ($delvtitle and trim($_POST[title])!='[delete]'))) or $_POST[stptitle])$tabshtml .= '<li><a href="#'.$pj.$ap.'tabnmenu" data-rel="popup" '.$popclr.' data-transition="pop" class="ui-btn ui-btn-z ui-btn-icon-notext ui-icon-bars"></a></li>';
			if($_POST[stplclr]){$stplclr = 'style="background-color:'.htmlspecialchars($_POST[stplclr]).'"';}else{$stplclr = 'style="background-color:rgba(0,0,0,0)"';}
			if($_POST[stplclr])$tabshtml .= '<li><a href="#" '.$stplclr.' id="'.$pj.$ap.'vntsp" data-vntstop="" class="ui-btn ui-btn-z ui-btn-icon-notext ui-icon-delete"></a></li>';
			
			if($_POST[btntyp]==5){
			if($vclrvlu[2]){$clrsvlsn = 'style="background-color:'.htmlspecialchars($vclrvlu[2]).'"';}else{$clrsvlsn ='style="background-color:rgba(0,0,0,0)"';}	
			$tabshtml .= '<li><a href="#" style="background-color:rgba(0,0,0,0)" class="'.$pj.$ap.'tbnd ui-btn ui-btn-z ui-btn-icon-notext ui-icon-carat-d"></a></li>';
			}
			
			if($_POST[btntyp]==1){
			if(($tabmenu or $_POST[stplclr]) and !$datatabnbg[2])$tabshtml .=  '<BR>';
			 $j=0;	
			
			 if(sizeof($vtitlevlu)){
				for($i=1;$i<=sizeof($vtitlevlu);$i++){	
				  if($i==1){$nav = ' ui-icon-nav';}else{$nav = '';}
				  if($vaudiovlu[$i] or $vtmdprvlu[$i]){if($bvtns[$i]==1 or !$bvtns[$i])$j++;}//$bvtns[$i]==1 or !$bvtns[$i] combined tags
				  if($i==$v)$vaudiovlu[$i] = $_POST[audio];
				  if($i==$v)$vtmdprvlu[$i] = $_POST[tmdpr];
				  //if($vaudiovlu[$i] or $vtmdprvlu[$i]){$datanbr = 'data-nbr="'.$j.'" ';}else{$datanbr ='';}			
				  if($vclrvlu[$i]){$clrsvlsn = 'style="background-color:'.htmlspecialchars($vclrvlu[$i]).'"';}else{$clrsvlsn ='style="background-color:rgba(0,0,0,0)"';}				
					
					if($i==$v and ($_POST[tagn]==1 or !$_POST[tagn]) and strpos($htm[$i],'sys!-->')!==false){
						if($_POST[clr]){$clrsvlsn = 'style="background-color:'.htmlspecialchars($_POST[clr]).'"';}else{$clrsvlsn ='style="background-color:rgba(0,0,0,0)"';}				
						$tabshtml .= '<li><a href="#" data-vnts="'.($i-1).'" '.$datanbr.$clrsvlsn.' class="'.$pj.$ap.'vnts ui-btn ui-btn-z ui-btn-icon-notext'.$nav.'"></a></li>';}
					else if(($tagnvlu[$i]==1 or !$tagnvlu[$i]) and strpos($htm[$i],'sys!-->')!==false){
						
					if($bvtns[$i]==1 or !$bvtns[$i])$tabshtml .= '<li><a href="#" data-vnts="'.($i-1).'" '.$datanbr.$clrsvlsn.' class="'.$pj.$ap.'vnts ui-btn ui-btn-z ui-btn-icon-notext'.$nav.'"></a></li>';}
					
				;}
			 ;}else{
			 		if($_POST[clr]){$clrsvlsn = 'style="background-color:'.htmlspecialchars($_POST[clr]).'"';}else{$clrsvlsn ='style="background-color:rgba(0,0,0,0)"';}
					//if($_POST[audio]){$datanbr = 'data-nbr="1" ';}else{$datanbr ='';}				
					if(strpos($htm[1],'sys!-->')!==false)$tabshtml .= '<li><a href="#" data-vnts="0" '.$datanbr.$clrsvlsn.' class="'.$pj.$ap.'vnts ui-btn ui-btn-z ui-btn-icon-notext ui-icon-nav"></a></li>';	 
			 ;}
			 ;}//if($_POST[btntyp]==1){
			
			$tabshtml .= '</ul>';
			
			
			if($_POST[tabnwdhstyle]){
			if($tabmenu and $audp){$tabnwdhnbr = 2+sizeof($vtitlevlu);}else if($tabmenu or $audp){$tabnwdhnbr = 1+sizeof($vtitlevlu);}else{$tabnwdhnbr = sizeof($vtitlevlu);}
			;}
			

	

	if($tabmenu or $_POST[title]){
	  if($tabshtml){
	   $tabmnhtml = explode('<li',$tabshtml);
	   for($i=1;$i<=sizeof($vtitlevlu);$i++){
	   		if(!$_POST[title]){$_POST[title]='&nbsp;';}else if($_POST[title]=='&nbsp;'){$_POST[title]='&nbsp;';}else{$_POST[title] = htmlspecialchars($_POST[title]);}
	  		if($i==$v and ($_POST[title] or $_POST[titleimg])){
				if(strpos($_POST[titleimg],'http://')!==false or strpos($_POST[titleimg],'https://')!==false){$images = '';}
				else{$images = 'images/';}
				if($_POST[clr]){$clrsvlsn = 'style="background-color:'.htmlspecialchars($_POST[clr]).'"';}else{$clrsvlsn ='style="background-color:rgba(0,0,0,0)"';}		
				if($_POST[titleimg]){$titleimg = '<img src="'.$images.htmlspecialchars($_POST[titleimg]).'"/>';}else{$titleimg ='';}
				if(trim($_POST[title])!='[delete]')$tabmnhtmls .= '<li><a href="#" data-vnts="'.($i-1).'" '.$clrsvlsn.' class="'.$pj.$ap.'vnts ui-btn ui-btn-z">'.$titleimg.$_POST[title].'</a></li>';
			;}else if($vtitlevlu[$i] or $vtitleimgvlu[$i]){
				if($vtitlevlu[$i]=='&amp;nbsp;'){$vtitlevlu[$i]='&nbsp;';}else{$vtitlevlu[$i] = htmlspecialchars($vtitlevlu[$i]);}
				if($vtitleimgvlu[$i]){	
				if(strpos($vtitleimgvlu[$i],'http://')!==false or strpos($vtitleimgvlu[$i],'https://')!==false){$images = '';}
				else{$images = 'images/';}
				$titleimg = '<img src="'.$images.htmlspecialchars($vtitleimgvlu[$i]).'"/>';}else{$titleimg ='';}
				if($vclrvlu[$i]){$clrsvlsn = 'style="background-color:'.htmlspecialchars($vclrvlu[$i]).'"';}else{$clrsvlsn ='style="background-color:rgba(0,0,0,0)"';}		
				if(trim($vtitlevlu[$i])!='[delete]')$tabmnhtmls .= '<li><a href="#" data-vnts="'.($i-1).'" '.$clrsvlsn.' class="'.$pj.$ap.'vnts ui-btn ui-btn-z">'.$titleimg.$vtitlevlu[$i].'</a></li>';
			;}
	   ;}
	   //if($delvtitle)$tabmnhtmls = '';
	  ;}else{
	  			if(!$_POST[title]){$_POST[title]='&nbsp;';}else{$_POST[title] = htmlspecialchars($_POST[title]);}
				if(strpos($_POST[titleimg],'http://')!==false or strpos($_POST[titleimg],'https://')!==false){$images = '';}
				else{$images = 'images/';}
				if($_POST[titleimg]){$titleimg = '<img src="'.$images.htmlspecialchars($_POST[titleimg]).'"/>';}else{$titleimg ='';}
				if($_POST[clr]){$clrsvlsn = 'style="background-color:'.htmlspecialchars($_POST[clr]).'"';}else{$clrsvlsn ='style="background-color:rgba(0,0,0,0)"';}		
				$tabmnhtmls .= '<li><a href="#" data-vnts="0" '.$clrsvlsn.' class="'.$pj.$ap.'vnts ui-btn ui-btn-z">'.$titleimg.$_POST[title].'</a></li>'; 	  
	  ;}
	  
	  
	  
	  if($_POST[stptitle]){
	  	if(strpos($_POST[stptitle],'#')!==false){
			$stptitln = explode('#',$_POST[stptitle]);$stptitle = $stptitln[0];}
		else{$stptitle = htmlspecialchars($_POST[stptitle]);}
	  	
	  }else{$stptitle = '&nbsp;';}
	  if($stptitln[1]){$tabstp = 'style="background-color:'.htmlspecialchars($stptitln[1]).'"';}else{$tabstp ='style="background-color:rgba(0,0,0,0)"';}
	   if($_POST[stptitle])$tabmnhtmls .= '<li><a href="#" '.$tabstp.' id="'.$pj.$ap.'vntsp" data-vntstop="" class="ui-btn ui-btn-z ui-btn-icon-left ui-icon-delete">'.$stptitle.'</a></li>';
	  
	  if($_POST[returntitle]){
	  	if(strpos($_POST[returntitle],'#')!==false){
			$returntitln = explode('#',$_POST[returntitle]);$returntitle = $returntitln[0];}
		else{$returntitle = htmlspecialchars($_POST[returntitle]);}
	  	
	  }else{$returntitle = '&nbsp;';}
	  if($returntitln[1]){$tabreturn = 'style="background-color:'.htmlspecialchars($returntitln[1]).'"';}else{$tabreturn ='style="background-color:rgba(0,0,0,0)"';}
	  if($_POST[returntitle])$tabmnhtmls .= '<li><a href="#" '.$tabreturn.' data-rel="back" data-direction="reverse" data-transition="slide" class="ui-btn ui-btn-z ui-btn-icon-left ui-icon-carat-l">'.$returntitle.'</a></li>';
	  
	 // if($_POST[refreshtitle]){$refreshtitle= htmlspecialchars($_POST[refreshtitle]);}else{$refreshtitle= '&nbsp;';}
	 // if($_POST[tabrefresh] or $_POST[refreshtitle]){$tabrefresh = 'style="background-color:'.htmlspecialchars($_POST[tabrefresh]).'"';}else{$tabrefresh ='style="background-color:rgba(0,0,0,0)"';}
	  //if($_POST[tabrefresh] or $_POST[refreshtitle])$tabmnhtmls .= '<li><a href="#" '.$tabrefresh.' class="tabrefresh ui-btn ui-btn-z ui-btn-icon-left ui-icon-refresh">'.$refreshtitle.'</a></li>';
	  

	  
	  $tabnmenu=1;
	  $tabmnhtmls = '<div id="'.$pj.$ap.'tabnmenu" data-role="popup" style="overflow-y:auto;min-width:180px;" data-corners="false"><ul data-role="listview" data-corners="false" data-inset="true">'.$tabmnhtmls.'</ul></div>';
	  }
	
	if(!$tabnmenu)$tabmnhtmls = '<div id="'.$pj.$ap.'tabnmenu" data-role="popup"></div>';
	
	$tabmnhtmls .= '<audio id="'.$pj.$ap.'auds"><source src="" type="audio/mpeg"><source src="" type="audio/wav"></audio>';
	
	$tabmnhtmls = $tabmnhtmls.'<!--data-tabnbg'.htmlspecialchars($_POST[btntyp]).'@@'.htmlspecialchars($_POST[tabnwdhstyle]).'@'.htmlspecialchars($_POST[popclr]).'@'.htmlspecialchars($_POST[stplclr]).'@'.htmlspecialchars($_POST[tabrefresh]).'@'.htmlspecialchars($_POST[returntitle]).'@'.htmlspecialchars($_POST[refreshtitle]).'@'.htmlspecialchars($_POST[stptitle]).'@'.htmlspecialchars($_POST[widthfit]).'data-tabnbg!-->';
	  
	file_put_contents('../panel/'.$roww[pjnbr].'/tabn'.$ap.'.html',$tabshtml.$tabmnhtmls);

	
	 for($i=1;$i<sizeof($htm);$i++){
		if($v and $v==$i){			
			$clrsvlsn = '<!--data-tabnbg'.htmlspecialchars($_POST[tagn]).'@'.htmlspecialchars($_POST[title]).'@'.htmlspecialchars($_POST[titleimg]).'@'.htmlspecialchars($_POST[clr]).'@'.htmlspecialchars($_POST[hgtbg]).'@'.htmlspecialchars($_POST[tmdpr]).'@'.htmlspecialchars($_POST[audio]).'data-tabnbg!-->';
			$htmp = explode('<!--data-tabnbg',$htm[$i]);
			$htmps = explode('data-tabnbg!-->',$htmp[1]);
			$popup .= '<!--part'.$htmp[0].$clrsvlsn.$htmps[1];	
			
			
			if($_POST[hgtbg]){			
					if(strpos($_POST[hgtbg],'http://')!==false or strpos($_POST[hgtbg],'https://')!==false){$images = '';}else{$images = 'images/';}
					if(strpos($_POST[hgtbg],'#')!==false or strpos($_POST[hgtbg],'rgba(')!==false  or strpos($_POST[hgtbg],'rgb(')!==false){$hgtbghtml = 'background-color:'.htmlspecialchars($_POST[hgtbg]).';';}
					else if(strpos($_POST[hgtbg],'[xy]')!==false){$hgtbghtml = 'background-image:url('.$images.htmlspecialchars($_POST[hgtbg]).');';}
					else{$hgtbghtml = 'background-image:url('.$images.htmlspecialchars($_POST[hgtbg]).');background-size:100%;background-repeat:repeat-y;';}
				
			   $vntscss .= '#'.$pj.$ap.'vnts'.$btnbrsvlu[$i].'{'.$hgtbghtml.'};';
			;}
			
					
		}else{
			if($vhgtbgvlu[$i]){
					if(strpos($vhgtbgvlu[$i],'http://')!==false or strpos($vhgtbgvlu[$i],'https://')!==false){$images = '';}else{$images = 'images/';}
					if(strpos($vhgtbgvlu[$i],'#')!==false or strpos($vhgtbgvlu[$i],'rgba(')!==false  or strpos($vhgtbgvlu[$i],'rgb(')!==false){
						$hgtbghtml = 'background-color:'.htmlspecialchars($vhgtbgvlu[$i]).';';}
					else if(strpos($vhgtbgvlu[$i],'[xy]')!==false){$hgtbghtml = 'background-image:url('.$images.htmlspecialchars($vhgtbgvlu[$i]).');';}
					else{$hgtbghtml = 'background-image:url('.$images.htmlspecialchars($vhgtbgvlu[$i]).');background-size:100%;background-repeat:repeat-y;';}			
				$vntscss .= '#'.$pj.$ap.'vnts'.$btnbrsvlu[$i].'{'.$hgtbghtml.'};';
			;}		
			$popup .= '<!--part'.$htm[$i];
		} 
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
			
			//if(!$pn){$html = file_get_contents('../panel/'.$roww[pjnbr].'/'.$ap.'.html');$htmls = '';}
			if($tl){$html = file_get_contents('../panel/'.$roww[pjnbr].'/'.$ap.'.html');$htmls = '';}

	
			$webpopup .= $popup;
			$webpopup .= '</div><!--content!--></div><!--page!-->';
			
		 	
			
			$fpagtrns='../panel/'.$roww[pjnbr].'/'.$ap.'.html';
			file_put_contents($fpagtrns,$popup);
			
			
			$fpagtrns='../panel/'.$roww[pjnbr].'/web'.$ap.'.html';
			file_put_contents($fpagtrns,$webpopup);			
			

			
			$jsweb = file_get_contents('../panel/'.$roww[pjnbr].'/web'.$ap.'.js');
		if($jsweb){
		
				//$var = 'var vtn = [';
				$dur = 'var dur = [';$aud = 'var aud = [';
				if(sizeof($btnbrsvlu)){
					for($i=1;$i<=sizeof($btnbrsvlu);$i++){
					if($bvtns[$i]==1 or !$bvtns[$i]){//combined tag
						if($i==$v){$vtmdprvlu[$i] = htmlspecialchars($_POST[tmdpr]);$vaudiovlu[$i] = htmlspecialchars($_POST[audio]);}
					
						if($i!=sizeof($btnbrsvlu) and $btnbrsvlu[$i]){
							//$var .= $btnbrsvlu[$i].',';
					
							if($vtmdprvlu[$i]){$dur .= $vtmdprvlu[$i].',';if(!$durs)$durs=1;}
							else{$dur .= "'',";}
							if($vaudiovlu[$i]){$vaudiovls = 1;
								$aud .= "'".$vaudiovlu[$i]."',";
								if(!$audp)$audp=1;}
							else{$aud .= "'',";}
						;}else if($btnbrsvlu[$i]){
							//$var .= $btnbrsvlu[$i];
							if($vtmdprvlu[$i]){
								$dur .= $vtmdprvlu[$i];if(!$durs)$durs=1;}
							else{$dur .= "''";}
							if($vaudiovlu[$i]){ $vaudiovls = 1;
								$aud .= "'".$vaudiovlu[$i]."',";if(!$audp)$audp=1;}
							else{$aud .= "''";}
						;}
					;}
					;}
				;}
				
				if(!sizeof($btnbrsvlu)){$var = $btnbrsvlu[1];$aud = htmlspecialchars($_POST[audio]); $dur = htmlspecialchars($_POST[tmdpr]); }			
				//$var .= '];var vtns = '.sizeof($btnbrsvlu).';';
				$dur .= '];';$aud .= '];';
				if(!$vaudiovls)$aud = '';
				
			if($_POST[btntyp]!='d'){	
			$js .= '/*vnts*/';
			
			if($durs and strpos($tabshtml.$tabmnhtmls,$pj.$ap.'vnts ')!==false)$tabmnhtmlvnts =1;
			
			if($durs and $tabmnhtmlvnts){$js .= 'function audivnts'.$pj.$ap.'(pj,ap,nbr,swiper,tablistright){'.$dur;
			if($aud)$js .= $aud;
			$js .= ';var tmdpr = dur[nbr];setTimeout(function(){if(!$("#'.$pj.$ap.'vntsp").attr("data-vntstop")){';
			if(($tabmenu and !$delvtitle) or ($_POST[title] and trim($_POST[title])!='[delete]'))$js .= '$("#'.$pj.$ap.'tabnmenu").find(".'.$pj.$ap.'vnts[data-vnts="+nbr+"]").removeClass("ui-btn-icon-left ui-icon-nav");';
			$js .= 'nbrs = parseInt(nbr)+1;if(nbrs>dur.length-1)nbrs=0;';
			if(($tabmenu and !$delvtitle) or ($_POST[title] and trim($_POST[title])!='[delete]'))$js .= '$("#'.$pj.$ap.'tabnmenu").find(".'.$pj.$ap.'vnts[data-vnts="+nbrs+"]").addClass("ui-btn-icon-left ui-icon-nav");';
			$js .= '$("#"+pj+ap+"tablistright").find("."+pj+ap+"vnts").removeClass("ui-icon-nav");$("#"+pj+ap+"tablistright").find("."+pj+ap+"vnts:eq("+nbrs+")").addClass("ui-icon-nav");swiper.slideTo(nbrs,750);';
			if($aud)$js .= 'if(aud[nbrs]){$("#"+pj+ap+"auds").attr("src",aud[nbrs]).trigger(\'play\');}else{$("#"+pj+ap+"auds").trigger(\'pause\');}';
			$js .= ';audivnts'.$pj.$ap.'(pj,ap,nbrs,swiper,tablistright);};},tmdpr);};';}
$guanyin=rand();
$js .= ';var swiper'.$guanyin.' = new Swiper(\'#swiper-container-'.$pj.$ap.'\', {direction:\'vertical\',onlyExternal:true});$tablistright'.$guanyin.' =$("#'.$pj.$ap.'tablistright");';
			
if(($durs or $audp) and $tabmnhtmlvnts)$js .= '$("#'.$pj.$ap.'vntsp").click(function (event){event.preventDefault();';
if($audp and $tabmnhtmlvnts){$js .= '$("#'.$pj.$ap.'auds").trigger(\'pause\');var vntstop = $(this).attr("data-vntstop");';}
	else if($_POST[stptitle]){$js .= 'var vntstop = $(this).attr("data-vntstop");';}else{$js .= 'var vntstop = "";';}
if(($durs or $audp) and $tabmnhtmlvnts)$js .= 'if(vntstop){$(this).attr("data-vntstop","").removeClass("ui-icon-check").addClass("ui-icon-delete");}else{$(this).attr("data-vntstop","1").removeClass("ui-icon-delete").addClass("ui-icon-check");};});';


if(($tabmenu or $_POST[title]) or $_POST[btntyp]==1)$js .= '$(".'.$pj.$ap.'vnts").click(function(event){event.preventDefault();';
if(($tabmenu and !$delvtitle) or ($_POST[title] and trim($_POST[title])!='[delete]'))$js .= 'var $tabnmenu=$("#'.$pj.$ap.'tabnmenu");var vntstop=$tabnmenu.data("vntstop");';
if((($tabmenu and !$delvtitle) or ($_POST[title] and trim($_POST[title])!='[delete]')) or $_POST[btntyp]==1)$js .= 'var vnts = $(this).attr(\'data-vnts\');swiper'.$guanyin.'.slideTo(vnts,750);';


if(!$tabmenu and !$_POST[title] and $_POST[btntyp]==1){$js .= ';$tablistright'.$guanyin.'.find(".'.$pj.$ap.'vnts").removeClass("ui-icon-nav");$(this).addClass("ui-icon-nav");';}
else if($_POST[btntyp]==1){$js .= ';if($(this).attr("class").indexOf("ui-btn-icon-notext")!=-1){
		$tablistright'.$guanyin.'.find(".'.$pj.$ap.'vnts").removeClass("ui-icon-nav");$(this).addClass("ui-icon-nav");';
		if(($tabmenu and !$delvtitle) or ($_POST[title] and trim($_POST[title])!='[delete]'))$js .= '$tabnmenu.find(".'.$pj.$ap.'vnts").removeClass("ui-btn-icon-left ui-icon-nav");$tabnmenu.find(".'.$pj.$ap.'vnts:eq("+swiper'.$guanyin.'.activeIndex+")").addClass("ui-btn-icon-left ui-icon-nav");';
	$js .= '}else{
		$tablistright'.$guanyin.'.find(".'.$pj.$ap.'vnts").removeClass("ui-icon-nav");$tablistright'.$guanyin.'.find(".'.$pj.$ap.'vnts:eq("+swiper'.$guanyin.'.activeIndex+")").addClass("ui-icon-nav");';
		if(($tabmenu and !$delvtitle) or ($_POST[title] and trim($_POST[title])!='[delete]'))$js .= '$tabnmenu.find(".'.$pj.$ap.'vnts").removeClass("ui-btn-icon-left ui-icon-nav");';
		$js .= '$(this).addClass("ui-btn-icon-left ui-icon-nav");
	;};';}
	

	
	
if((($tabmenu and !$delvtitle) or ($_POST[title] and trim($_POST[title])!='[delete]')) and $_POST[btntyp]==5)$js .= ';$tabnmenu.find(".'.$pj.$ap.'vnts").removeClass("ui-btn-icon-left ui-icon-nav");$(this).addClass("ui-btn-icon-left ui-icon-nav");';

if($durs  and $aud and $tabmnhtmlvnts)$js .= $aud.';if(vnts)$("#'.$pj.$ap.'auds").attr("src",aud[vnts]).trigger(\'play\');';
if($durs  and $tabmnhtmlvnts)$js .= $dur.';if(vnts && !vntstop)audivnts'.$pj.$ap.'(\''.$pj.'\',\''.$ap.'\',vnts,swiper'.$guanyin.',$tablistright'.$guanyin.');';
if(($tabmenu and !$delvtitle) or ($_POST[title] and trim($_POST[title])!='[delete]'))$js .= '$tabnmenu.popup(\'close\');';
if(($tabmenu or $_POST[title]) or $_POST[btntyp]==1)$js .= '});';
if($tabmenu or $_POST[title])$js .= '$("#'.$pj.$ap.'tabnmenu").css("max-height",windowHeight*0.95);';


if($tabnwdhnbr)$js .= ';$tablistright'.$guanyin.'.css(\'top\',(windowHeight-'.$tabnwdhnbr.'*28)/2);';

if($_POST[btntyp]=='5'){
	$js .= '$tablistright'.$guanyin.'.find(".'.$pj.$ap.'tbnu").click(function (event){event.preventDefault();';
	if(($tabmenu and !$delvtitle) or ($_POST[title] and trim($_POST[title])!='[delete]'))$js .= '$("#'.$pj.$ap.'tabnmenu").find(".'.$pj.$ap.'vnts").removeClass("ui-btn-icon-left ui-icon-nav");';
	$js .= 'swiper'.$guanyin.'.slidePrev(750);';
	if(($tabmenu and !$delvtitle) or ($_POST[title] and trim($_POST[title])!='[delete]'))$js .= '$$("#'.$pj.$ap.'tabnmenu").find(".'.$pj.$ap.'vnts:eq("+swiper'.$guanyin.'.activeIndex+")").addClass("ui-btn-icon-left ui-icon-nav");';
	$js .= '});';
$js .= '$tablistright'.$guanyin.'.find(".'.$pj.$ap.'tbnd").click(function (event){event.preventDefault();';
if(($tabmenu and !$delvtitle) or ($_POST[title] and trim($_POST[title])!='[delete]'))$js .= '$("#'.$pj.$ap.'tabnmenu").find(".'.$pj.$ap.'vnts").removeClass("ui-btn-icon-left ui-icon-nav");';
$js .= 'swiper'.$guanyin.'.slideNext(750);';
if(($tabmenu and !$delvtitle) or ($_POST[title] and trim($_POST[title])!='[delete]'))$js .= '$("#'.$pj.$ap.'tabnmenu").find(".'.$pj.$ap.'vnts:eq("+swiper'.$guanyin.'.activeIndex+")").addClass("ui-btn-icon-left ui-icon-nav");';
$js .= '});';}
$js .= $vhgtbgvls;
$js .= '/*vnts*/';
		;}
		
		;}//if($_POST[btntyp]!='d'){	
		if(strpos($jsweb,'/*vnts*/')!==false and $jsweb){
			$jswebhtml = explode('/*vnts*/',$jsweb);
			if($_POST[btntyp]=='d'){if($vhgtbgvls){$js = '/*vnts*/'.$vhgtbgvls.'/*vnts*/';}else{$js = '';};}
			file_put_contents('../panel/'.$roww[pjnbr].'/web'.$ap.'.js',$jswebhtml[0].$js.$jswebhtml[2]);	
		;}else if(strpos($jsweb,'".'.$pj.$ap.'vnts").click')===false and $jsweb and $_POST[btntyp]!='d'){	
			$jsweb=str_replace('/*});*/',$js.'/*});*/',$jsweb);
			file_put_contents('../panel/'.$roww[pjnbr].'/web'.$ap.'.js',$jsweb);
		;}
		
		
		//if($vntscss){
		//$ht = file_get_contents('../panel/'.$roww[pjnbr].'/vnts'.$ap.'.css');
		//$hts = explode('/*'.$pj.$ap.'tabn*/',$ht);
		//$htcs = $hts[0].'/*'.$pj.$ap.'tabn*/'.$vntscss.'/*'.$pj.$ap.'tabn*/'.$hts[2];
		//file_put_contents('../panel/'.$roww[pjnbr].'/vnts'.$ap.'.css',$htcs);		
		//;}


	echo "<meta http-equiv='refresh' content='0;URL=tabn.php?ap=".htmlspecialchars($roww[ap])."&pj=".htmlspecialchars($roww[pjnbr])."&v=".htmlspecialchars($v)."&pn=".htmlspecialchars($pn)."'>";
	


;}

?>
