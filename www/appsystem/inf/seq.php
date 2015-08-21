<?php session_start();          
error_reporting(0); 

if($_GET[pj] and !preg_match('/^[0-9]*$/',$_GET[pj]))exit;
if($_GET[pj])$pj = $_GET[pj];
if($_GET[ap] and !preg_match('/^[0-9]*$/',$_GET[ap]))exit;
if($_GET[ap])$ap = $_GET[ap];
if($_GET[pn] and !preg_match('/^[0-9]*$/',$_GET[pn]))exit;
if($_GET[pn])$pn = $_GET[pn];
if($_GET[pnv] and !preg_match('/^[0-9]*$/',$_GET[pnv]))exit;
if($_GET[pnv])$pnv = $_GET[pnv];
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
    <title><?php if($_SESSION[tn]==PRC){echo 'AppMoney712 移动应用设计系统';}else if($_SESSION[tn]==EN){echo 'AppMoney712 APP Creation System';}else{echo 'AppMoney712 移動應用設計系統';}?></title>
	<link href="../css/bootstrap.css" rel="stylesheet">
	<link rel="stylesheet" href="../css/jquery.mobile-1.4.4.min.css">
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
	<script>
	function checkform ( form )
	{
	if(form.dlt.checked && form.ord.value!=' ' && form.ord.value){
	alert("<?php if($_SESSION[tn]==PRC){echo '限一项操作。';}else if($_SESSION[tn]==EN){echo 'Insert or delete only.';}else{echo '限一項操作。';}?>");
	return (false);
	;}
	
	else if(!form.dlt.checked && form.ord.value==' '){
	alert("<?php if($_SESSION[tn]==PRC){echo '须选项。';}else if($_SESSION[tn]==EN){echo 'Pls insert or delete.';}else{echo '須選項。';}?>");
	return (false);
	;}
	}
	</script>
</head>
<body>

<div data-role="page" data-theme="f"  id="appageone" style="background-color:white;color:black">
	<div style="overflow: hidden;" data-role="header" data-theme="f">
	<a href="#navigations"  id="menubttn"  data-rel="popup" data-transition="pop" class="ui-btn ui-btn ui-btn-inline ui-corner-all ui-btn-icon-left ui-icon-bars"><?php if($_SESSION[tn]==PRC){echo '目录';}else if($_SESSION[tn]==EN){echo 'Menu';}else{echo '目錄';}?></a>
    <h1><?php if($_SESSION[tn]==PRC){echo 'AppMoney712 移动应用设计系统';}else if($_SESSION[tn]==EN){echo 'AppMoney712 APP Creation System';}else{echo 'AppMoney712 移動應用設計系統';}?></h1>
	
	</div><!-- /header -->
	

	
	<div data-role="content">
	
	<?php 
		
		if($pres){
				if($pres==1){$preshtml = '';}else if($pres==2){$preshtml = '[1]';}else if($pres==3){$preshtml = '[2]';}else if($pres==4){$preshtml = '[3]';}
				$ht = file_get_contents('../panel/'.$roww[pjnbr].'/temp/'.$ap.$preshtml.'.html');
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
	if($pn){
			$htm = explode('<!--part',$ht);
			
				for($i=1;$i<sizeof($htm);$i++){
						

									
						$pnvlus = explode('!-->',$htm[$i]);
						$pnvlu[$i] = $pnvlus[0];
						$tabnbg = explode('<!--data-tabnbg',$htm[$i]);
						$tabnbgs = explode('data-tabnbg!-->',$tabnbg[1]);
						$tabnbgsn = explode('@',$tabnbgs[0]);
						$vtitlevlu[$i] = $tabnbgsn[1];
						$vtitleimgvlu[$i] = $tabnbgsn[2];		
						$vtagnvlu[$i] = str_replace('vtns','',$tabnbgsn[0]);					
						
						
						if(strpos($htm[$i],'data-tabnbg@')!==false){
							$htmnm .= '<!--part'.$htm[$i];
						;}else if(strpos($htm[$i],'data-tabnbgvtns1vtns@')!==false){
							$htmnm .= str_replace('<!--data-tabnbgvtns1vtns@','</div></div><!--vnts!--><!--data-tabnbg@','<!--part'.$htm[$i]);
						;}else if(strpos($htm[$i],'data-tabnbgvtns5vtns@')!==false){
							if(strpos($htm[$i],'<!--sysdwsys!-->')!=false or strpos($htm[$i],'<!--sysifrpicsys!-->')!=false or strpos($htm[$i],'<!--sysalbumowlsys!-->')!=false){
								$htm[$i] = str_replace('sys!-->','sys!--><div class="swiper-slide"><div id="'.$pj.$ap.'vnts'.htmlspecialchars($pnvlu[$i]).'" class="vntsns">',$htm[$i]);
							;}else{
							 	$htm[$i] = str_replace('sys!-->','sys!--><div class="swiper-slide"><div id="'.$pj.$ap.'vnts'.htmlspecialchars($pnvlu[$i]).'" class="vntsns vtnn">',$htm[$i]);
							;}
							$htmnm .= str_replace('<!--data-tabnbgvtns5vtns@','<!--data-tabnbg@','<!--part'.$htm[$i]);
						;}else if(strpos($htm[$i],'data-tabnbgvtns6vtns@')!==false){
							if(strpos($htm[$i],'<!--sysdwsys!-->')!=false or strpos($htm[$i],'<!--sysifrpicsys!-->')!=false or strpos($htm[$i],'<!--sysalbumowlsys!-->')!=false){
								$htm[$i] = str_replace('sys!-->','sys!--><div class="swiper-slide"><div id="'.$pj.$ap.'vnts'.htmlspecialchars($pnvlu[$i]).'" class="vntsns">',$htm[$i]);
							;}else{
							 	$htm[$i] = str_replace('sys!-->','sys!--><div class="swiper-slide"><div id="'.$pj.$ap.'vnts'.htmlspecialchars($pnvlu[$i]).'" class="vntsns vtnn">',$htm[$i]);
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
							if($_SESSION[tn]==PRC){$function[$i] .= ' /QR二维码';}else if($_SESSION[tn]==EN){$function[$i] .= ' /QR Code';}else{$function[$i] .= ' /QR二維碼';}?> <?php if($_SESSION[tn]==PRC){$function[$i] .= '表格 - 多选项';}else if($_SESSION[tn]==EN){$function[$i] .= 'Form - multiple';}else{$function[$i] .= '表格 - 多選項';}	
						;}else if(strpos($htm[$i],'<!--sysplaygroundsys!-->')!==false){
							if($_SESSION[tn]==PRC){$function[$i] = '游戏';}else if($_SESSION[tn]==EN){$function[$i] = 'Playground';}else{$function[$i] = '遊戲';}
						;}else if(strpos($htm[$i],'<!--sysdwsys!-->')!==false){
							if($_SESSION[tn]==PRC){$function[$i] = '相片画布';}else if($_SESSION[tn]==EN){$function[$i] = 'Drawer';}else{$function[$i] = '相片畫布';}
						;}else{$function[$i] = '';
						;} 	
						
						
						if(strpos($htm[$i],'<!--sys')!==false and $i!=$pn+1 and $i!=$pn)$ord .= '<option value="'.$i.'">['.$i.']['.$function[$i].']</option>';					
					
				;}
	;}//if($pn){
	?>
	
	

	<FORM action="seq.php?pj=<?php echo htmlspecialchars($roww[pjnbr]) ?>&ap=<?php echo htmlspecialchars($roww[ap])?>&pn=<?php echo htmlspecialchars($pn) ?>&pnv=<?php echo htmlspecialchars($pnv) ?>" id="webxls" method="post" data-ajax="false"   onSubmit="return checkform(this);">
	
	
	<a href="webpage.php?pj=<?php echo htmlspecialchars($roww[pjnbr]) ?>&ap=<?php echo htmlspecialchars($roww[ap])?>" data-ajax="false" class="ui-btn ui-btn ui-btn-inline ui-corner-all ui-btn-icon-left ui-icon-carat-l">&nbsp;</a>&nbsp;&nbsp;&nbsp;&nbsp;
	<a href="tabn.php?pj=<?php echo htmlspecialchars($roww[pjnbr]) ?>&ap=<?php echo htmlspecialchars($roww[ap])?>" data-ajax="false" class="ui-btn ui-btn ui-btn-inline ui-corner-all ui-btn-icon-left ui-icon-edit"><?php if($_SESSION[tn]==PRC){echo '标签导航/内容段合拼';}else if($_SESSION[tn]==EN){echo 'Tab Navigation/content merging';}else{echo '標簽導航/內容段合拼';}?></a>&nbsp;&nbsp;&nbsp;&nbsp;
	
	<a href="#infs" data-rel="popup" data-transition="pop" class="ui-btn ui-btn-b ui-btn-inline ui-corner-all ui-mini">? </a>
	<div data-role="popup" id="infs" style="min-width:300px;max-width:85%" data-position-to="window" data-theme="f">
	<h4 style="color:pink"><?php if($_SESSION[tn]==PRC){echo '巳选內容';}else if($_SESSION[tn]==EN){echo 'Selected Content';}else{echo '巳選內容';}?></h4>
	<p><?php if($_SESSION[tn]==PRC){echo '点撀此页标签按钮,此标签的内容段定为巳选内容。';}else if($_SESSION[tn]==EN){echo 'You can click the \'Select Content\' button on this page. The content part relating to it is defined as selected content.';}else{echo '點撀此頁標簽按鈕,此標簽的內容段定為巳選內容。';}?></p>
<HR>
	<h4 style="color:pink"><?php if($_SESSION[tn]==PRC){echo '插入';}else if($_SESSION[tn]==EN){echo 'Insert';}else{echo '插入';}?></h4>
	<p><?php if($_SESSION[tn]==PRC){echo '若巳进行内容合拼,当进行插入,所有内容段均被调整至未合拼,您须再进行合拼。';}else if($_SESSION[tn]==EN){echo 'All merged content parts are recovered to non-merging status when do inserting process.  You need to perform the process again after inserting.';}else{echo '若巳進行內容合拼,當進行插入,所有內容段均被調整至未合拼,您須再進行合拼。';}?></p>
	<p><?php if($_SESSION[tn]==PRC){echo '巳选内容段插入在选项之上。';}else if($_SESSION[tn]==EN){echo 'The selected content will be inserted above the inserted content.';}else{echo '巳選內容段插入在選項之上。';}?></p>
	<HR>
	<h4 style="color:pink"><?php if($_SESSION[tn]==PRC){echo '全显';}else if($_SESSION[tn]==EN){echo 'Show all parts';}else{echo '全顯';}?></h4>
	<p><?php if($_SESSION[tn]==PRC){echo '若点撀此页标签按钮,全显按钮显示,若点撀此按钮,所有标签按钮再显示。';}else if($_SESSION[tn]==EN){echo 'If you click a \'Select Content\' button, the \'Show all parts\' button will be showed. You can click the button to show all content parts and their \'Select Content\' buttons again.';}else{echo '若點撀此頁標簽按鈕,全顯按鈕顯示,若點撀此按鈕,所有標簽按鈕再顯示。';}?></p>

	</div>
	
	<?php if(file_exists('../panel/'.$roww[pjnbr].'/'.$ap.'.html')){
	if(file_exists('../panel/'.$roww[pjnbr].'/temp/'.$ap.'.html') and !$pres){?>
	<div data-role="controlgroup" data-type="horizontal" class="ui-btn-inline" data-corners="false">
	<a href="seq.php?pj=<?php echo $roww[pjnbr]?>&ap=<?php echo $roww[ap]?>&pres=1" data-ajax="false" class="ui-btn ui-btn-f ui-btn-inline ui-corner-all ui-mini" style="color:pink" ><?php if($_SESSION[tn]==PRC){echo '改用上次储存';}else if($_SESSION[tn]==EN){echo 'Using previous save';}else{echo '改用上次儲存';}?></a>
	<?php if(file_exists('../panel/'.$roww[pjnbr].'/temp/'.$ap.'[1].html')){?>
	<a href="seq.php?pj=<?php echo $roww[pjnbr]?>&ap=<?php echo $roww[ap]?>&pres=2" data-ajax="false" class="ui-btn ui-btn-f ui-btn-inline ui-corner-all ui-mini" style="color:pink" >2</a>
	<?php ;}if(file_exists('../panel/'.$roww[pjnbr].'/temp/'.$ap.'[2].html')){?>
	<a href="seq.php?pj=<?php echo $roww[pjnbr]?>&ap=<?php echo $roww[ap]?>&pres=3" data-ajax="false" class="ui-btn ui-btn-f ui-btn-inline ui-corner-all ui-mini" style="color:pink" >3</a>
	<?php ;}if(file_exists('../panel/'.$roww[pjnbr].'/temp/'.$ap.'[3].html')){?>
	<a href="seq.php?pj=<?php echo $roww[pjnbr]?>&ap=<?php echo $roww[ap]?>&pres=4" data-ajax="false" class="ui-btn ui-btn-f ui-btn-inline ui-corner-all ui-mini" style="color:pink" >4</a>
	<?php ;}?>
	</div>
<?php ;}else{
	if(file_exists('../panel/'.$roww[pjnbr].'/temp/'.$ap.'.html') and $pres){?>
<a href="seq.php?pj=<?php echo $roww[pjnbr]?>&ap=<?php echo $roww[ap]?>"  data-ajax="false" class="ui-btn ui-btn-f ui-btn-inline ui-corner-all ui-mini" style="color:pink" ><?php if($_SESSION[tn]==PRC){echo '不改用上'.$pres.'次储存';}else if($_SESSION[tn]==EN){echo 'Not using previous save '.$pres;}else{echo '不改用上'.$pres.'次儲存';}?></a>
<?php ;} ;}
	;}//?>
	
	
	
	&nbsp;&nbsp;&nbsp;&nbsp;<span style="color:black"><?php if($_SESSION[tn]==PRC){echo '专案';}else if($_SESSION[tn]==EN){echo 'Project';}else{echo '專案';}?></span>
	<?php 	$sql=$db->query("select * from webpj where cno='$pj'");
	if($sql)$row=$sql->fetch();
	echo '['.htmlspecialchars($row[date]).'] '.htmlspecialchars($row[title]);?>
	
	&nbsp;&nbsp;&nbsp;&nbsp;
	
	<span style="color:black"><?php if($_SESSION[tn]==PRC){echo '应用页称';}else if($_SESSION[tn]==EN){echo 'Page name';}else{echo '應用頁稱';}?></span> :
	<?php echo htmlspecialchars($roww[title])?>
	<hr>
	
	<?php 
	if($pn){?>
	<b style="color:red"><?php if($_SESSION[tn]==PRC){echo '巳选';}else if($_SESSION[tn]==EN){echo 'Selected item';}else{echo '巳選';}echo ': ['.$pn.']';echo '['.$function[$pn].']';?>  </b>
<div class="ui-grid-a"><div class="ui-block-a">
	<?php if($ord){?>
	<select name="ord" data-theme="b">
	<option value=" "><?php if($_SESSION[tn]==PRC){echo '插入';}else if($_SESSION[tn]==EN){echo 'Insert';}else{echo '插入';}?></option>
	<?php echo $ord?>
	
	</select><?php ;}?></div><div class="ui-block-b"><input name="dlt" id="dlt" type="checkbox" data-theme="e" ><label for="dlt"><?php if($_SESSION[tn]==PRC){echo '刪除';}else if($_SESSION[tn]==EN){echo 'Delete';}else{echo '刪除';}?></label></div></div>

	

	<br>

	<input type="hidden" name="guanyin1" value="<?php if(!$_POST[guanyin1])$_SESSION[guanyin1]=rand();
	echo htmlspecialchars($_SESSION[guanyin1]); ?>">
	
	<div class="ui-grid-d"><div class="ui-block-a">
	<input type="submit" name="submit" id="webxlsbtn" Value="<?php if($_SESSION[tn]==PRC){echo '送交';}else if($_SESSION[tn]==EN){echo 'SEND';}else{echo '送交';}?>"></div><div class="ui-block-b">

	</div><div class="ui-block-c">
	
	
	</div><div class="ui-block-c"></div>
	<div class="ui-block-d">
	</div>
	</div>
	<input type="hidden" name="guanyin1" value="<?php if(!$_POST[guanyin1])$_SESSION[guanyin1]=rand();
	echo htmlspecialchars($_SESSION[guanyin1]); ?>">
	</FORM>
	<?php 
	//echo '<hr>';
	//if($_SESSION[tn]==PRC){echo '巳选內容';}else if($_SESSION[tn]==EN){echo 'Selected Content';}else{echo '巳選內容';}
				//echo '<div style="max-height:220px;overflow-x:hidden;">'.$slt.'</div><hr>';
	;}//if($pn){?>
	<?php if($pj){
			
			if($pn){echo '<a href="seq.php?ap='.htmlspecialchars($roww[ap]).'&pj='.htmlspecialchars($roww[pjnbr]).'" class="ui-btn ui-btn-f ui-btn-icon-left ui-icon-refresh" data-ajax="false">';
			
			if($_SESSION[tn]==PRC){echo '全显';}else if($_SESSION[tn]==EN){echo 'Show all parts';}else{echo '全顯';}
			echo '</a>';}
			if($_SESSION[tn]==PRC){$hrfs = '巳选內容';}else if($_SESSION[tn]==EN){$hrfs = 'Selected Content';}else{$hrfs = '巳選內容';}
			if($_SESSION[tn]==PRC){$hrf = '选內容';}else if($_SESSION[tn]==EN){$hrf = 'Select Content';}else{$hrf = '選內容';}
			$hrf .= ' [';
			if($_SESSION[tn]==PRC){$hrf .= '次序及刪除';}else if($_SESSION[tn]==EN){$hrf .= 'Re-order & Delete';}else{$hrf .= '次序及刪除';}
			$hrf .= ']';
			$htm = explode('<!--part',$ht);
				for($i=1;$i<sizeof($htm);$i++){
					$pnvlus = explode('!-->',$htm[$i]);
					if(($pn and $pn!=$i) or !$pn){$htmln[$i] = str_replace('sys!-->','sys!--><a href="seq.php?ap='.htmlspecialchars($roww[ap]).'&pj='.htmlspecialchars($roww[pjnbr]).'&pn='.$i.'" class="ui-btn ui-btn-w ui-btn-icon-left ui-icon-edit" style="color:black" data-ajax="false">['.$i.'] '.$hrf.'</a>',$htm[$i]);
					}else{
					$htmln[$i] = str_replace('sys!-->','sys!--><a href="#" class="ui-btn ui-btn-w" style="color:red" data-ajax="false">['.$i.'] '.$hrfs.'</a>',$htm[$i]);}
					
					$html .= '<!--part'.$htmln[$i];
				;}

	?>	<hr>

	<?php 
	if(strpos($roww[bg],'http://')!==false or strpos($roww[bg],'https://')!==false){$images = '';}else{$images = '../panel/'.$roww[pjnbr].'/images/';}
	
	if(strpos($roww[bg],'#')!==false or strpos($roww[bg],'rgba(')!==false  or strpos($roww[bg],'rgb(')!==false){$bghtml = 'background-color:'.htmlspecialchars($roww[bg]).';';}
	else if(strpos($roww[bg],'[xy]')!==false){$bghtml = 'background-image:url('.$images.htmlspecialchars($roww[bg]).');';}
	else{$bghtml = 'background-image:url('.$images.htmlspecialchars($roww[bg]).');background-size:100%;background-repeat:repeat-y;';}
	
	$html = str_replace('background-image:url(images/','background-image:url(../panel/'.$roww[pjnbr].'/images/',$html);
	$html = str_replace('src="images/','src=../panel/'.$roww[pjnbr].'/images/',$html);
	$html = str_replace('src="http','src=http',$html);
	$html = str_replace('src="','src="../panel/'.$roww[pjnbr].'/',$html);
	$html = str_replace('src="../panel/'.$roww[pjnbr].'/css','src="css',$html);
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
	if(file_exists('../panel/'.$roww[pjnbr].'/web'.$ap.'.js'))echo '<script>$(document).on("pageshow", "#appageone", function(){'
   .file_get_contents('../panel/'.$roww[pjnbr].'/web'.$ap.'.js')
   .'});</script>';


$tdy=0;
$tdy=date('Y-m-d');
if($_POST[ord]==' ')$_POST[ord]='';
if(($_POST[dlt] or $_POST[ord]) and $pj and $_SESSION[guanyin1] and $_SESSION[guanyin1]==$_POST[guanyin1]){

	
	if($ap and !preg_match('/^[0-9]*$/', $ap))exit;
	if($pj and !preg_match('/^[0-9]*$/', $pj))exit;
	if($pn and !preg_match('/^[0-9]*$/', $pn))exit;//order
	if($pnv and !preg_match('/^[0-9]*$/', $pnv))exit;//actual
	
if($_POST[dlt] and $pn and sizeof($htm)){

	$popup = str_replace('<!--part'.$htm[$pn],'',$ht);
	
				if($vtagnvlu[$pn] == 5){
					if($vtagnvlu[$pn-1] == 6){
							$htmpn = str_replace('<!--data-tabnbgvtns6vtns@','</div></div><!--vnts!--><!--data-tabnbgvtns5vtns@','<!--part'.$htm[$pn-1]);
							$popup = str_replace('<!--part'.$htm[$pn-1],$htmpn,$popup);		
					;}else if($vtagnvlu[$pn-1] == 1){
							$htmpn  = str_replace('<!--data-tabnbgvtns1vtns@','</div></div><!--vnts!--><!--data-tabnbg@','<!--part'.$htm[$pn-1]);
					;}			
					$popup = str_replace('<!--part'.$htm[$pn-1],$htmpn,$popup);				
				;}else if($vtagnvlu[$pn] == 1){
							if(strpos($htm[$pn+1],'<!--sysdwsys!-->')!=false or strpos($htm[$pn+1],'<!--sysifrpicsys!-->')!=false or strpos($htm[$pn+1],'<!--sysalbumowlsys!-->')!=false){
								$htmpn = str_replace('sys!-->','sys!--><div class="swiper-slide"><div id="'.$pj.$ap.'vnts'.htmlspecialchars($pnvlu[$pn+1]).'" class="vntsns">','<!--part'.$htm[$pn+1]);
							 ;}else{
							 	$htmpn = str_replace('sys!-->','sys!--><div class="swiper-slide"><div id="'.$pj.$ap.'vnts'.htmlspecialchars($pnvlu[$pn+1]).'" class="vntsns vtnn">','<!--part'.$htm[$pn+1]);
							 ;}		
					if($vtagnvlu[$pn+1]==5){	
							$htmpn = str_replace('<!--data-tabnbgvtns5vtns@','<!--data-tabnbg@',$htmpn);
					;}else if($vtagnvlu[$pn+1]==6){
							$htmpn  = str_replace('<!--data-tabnbgvtns6vtns@','<!--data-tabnbgvtns1vtns@',$htmpn);
					;}						
					$popup = str_replace('<!--part'.$htm[$pn+1],$htmpn,$popup);		
				;}
	
			
			if(file_exists('../panel/'.$roww[pjnbr].'/web'.$ap.'.js')){
				$jsweb = file_get_contents('../panel/'.$roww[pjnbr].'/web'.$ap.'.js');	
				$jswebs=explode('/*webjs'.$pnvlu[$pn].'*/',$jsweb);
				
				if(strpos($jswebs[1],';fastbtn("'.$pj.'","'.$ap.'"')!=false){
					if(strpos($jsweb,'/*fastbtn("'.$pj.'","'.$ap.'"')!=false){
					echo '<script>alert("';
					if($_SESSION[tn]==PRC){echo '您巳删除此应用页此功能[项目列表或项目按钮]的Javascript程式码,您须在此应用页找出此等相同功能[项目列表或项目按钮]的内容,再提送一次以再重新编制相同的Javascript程式码。';}else if($_SESSION[tn]==EN){echo 'Because you deleted the Javascript of this function on this APP page. You need to find one of the same function content on the page and resend the content part to create the function Javascript on the relating function editing page.';}else{echo '您巳刪除此應用頁此功能[項目列表或項目按鈕]的Javascript程式碼,您須在此應用頁找出此等相同功能[項目列表或項目按鈕]的內容,再提送一次以再重新編制相同的Javascript程式碼。';}
					echo '")</script>';
					;}
				;}
				
				file_put_contents('../panel/'.$roww[pjnbr].'/web'.$ap.'.js',$jswebs[0].$jswebs[2]);			
			;}
	
}else if($_POST['ord'] and $_POST['ord']!=' ' and preg_match('/^[0-9]*$/', $_POST['ord']) and $pn and sizeof($htm)){
	
	
	$insert=$_POST['ord'];
	
	$htmhtm = explode('<!--part',$htmnm);
	for($i=1;$i<sizeof($htmhtm);$i++){
		if($i==$insert){	
			$popup .= '<!--part'.$htmhtm[$pn].'<!--part'.$htmhtm[$i];}
		else if($i==$pn){$popup .= '';}
		else{$popup .= '<!--part'.$htmhtm[$i];}
	;}
	
	
	
	
	if(file_get_contents('../panel/'.$roww[pjnbr].'/tabn'.$ap.'.html')){echo '<script>alert("';if($_SESSION[tn]==PRC){echo '在此页您巳设置\'导航标签\'功能,\\n\\r此次改次序或影响此功能,\\n\\r您须到此功能决定是否要更新[再点撀该页的送出]。';}else if($_SESSION[tn]==EN){echo 'The navigation tab function is used on this page.\\n\\rYou need to review the sequence of tabs on the function page.\\n\\rYou may need to re-send the data on the page.';}else{echo '在此頁您巳設置\'導航標簽\'功能,\\n\\r此次改次序或影響此功能,\\n\\r您須到此功能決定是否要更新[再點撀該頁的送出]。';}echo '")</script>';}


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
			
	
			$webpopup .= $popup.'</div><!--content!--></div><!--page!-->';
			
			$fpagtrns='../panel/'.$roww[pjnbr].'/'.$ap.'.html';
			file_put_contents($fpagtrns,$popup);

			$fpagtrns='../panel/'.$roww[pjnbr].'/web'.$ap.'.html';
			file_put_contents($fpagtrns,$webpopup);

			if(!file_exists('../panel/'.$roww[pjnbr].'/temp/'.$ap.'.html')){
				mkdir('../panel/'.$roww[pjnbr].'/temp');
				file_put_contents('../panel/'.$roww[pjnbr].'/temp/'.$ap.'.html',$hts);			
			;}else{
				if(file_exists('../panel/'.$roww[pjnbr].'/temp/'.$ap.'[2].html'))rename('../panel/'.$roww[pjnbr].'/temp/'.$ap.'[2].html','../panel/'.$roww[pjnbr].'/temp/'.$ap.'[3].html');
				if(file_exists('../panel/'.$roww[pjnbr].'/temp/'.$ap.'[1].html'))rename('../panel/'.$roww[pjnbr].'/temp/'.$ap.'[1].html','../panel/'.$roww[pjnbr].'/temp/'.$ap.'[2].html');
				rename('../panel/'.$roww[pjnbr].'/temp/'.$ap.'.html','../panel/'.$roww[pjnbr].'/temp/'.$ap.'[1].html');
				file_put_contents('../panel/'.$roww[pjnbr].'/temp/'.$ap.'.html',$hts);		
			;}
	
	
	echo "<meta http-equiv='refresh' content='0;URL=seq.php?ap=".htmlspecialchars($roww[ap])."&pj=".htmlspecialchars($roww[pjnbr])."'>";


;}

?>
