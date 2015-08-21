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
    <title><?php if($_SESSION[tn]==PRC){echo '音频播放及附件列表 - AppMoney712 移动应用设计系统';}else if($_SESSION[tn]==EN){echo 'Audio Playlist and Document List - AppMoney712 APP Creation System';}else{echo '音頻播放及附件列表 - AppMoney712 移動應用設計系統';}?></title>
	<link href="../css/jquery.mobile-1.4.4.min.css" rel="stylesheet">
	<link href="../css/jquerymobile-1.4.4.min.css" rel="stylesheet">
	<link href="../css/icons/style.css" rel="stylesheet">
	<link rel="stylesheet" href="../css/appsystem.css">	<link href="../css/icons/style.css" rel="stylesheet">
	<style type="text/css">
	.ui-icon-sound:after{background-image: url("../css/images/sound.svg");}
	.ui-icon-sound:after{background-size: 18px 18px;}
	.ui-icon-pausesound:after{background-image: url("../css/images/[pause]sound.svg");}
	.ui-icon-pausesound:after{background-size: 18px 18px;}
	</style>
	<script src="../js/jquery.js"></script>
	<script src="../js/jquery.mobile-1.4.4.min.js"></script>	
	<script src="../js/playlist.js"></script>

	


</head>
<body>

<div data-role="page" data-theme="f" class="page">
	<div style="overflow: hidden;" data-role="header" data-theme="f">
	<a href="#navigations"  id="menubttn"  data-rel="popup" data-transition="pop" class="ui-btn ui-btn ui-btn-inline ui-corner-all ui-btn-icon-left ui-icon-bars"><?php if($_SESSION[tn]==PRC){echo '目录';}else if($_SESSION[tn]==EN){echo 'Menu';}else{echo '目錄';}?></a>
    <h1><?php if($_SESSION[tn]==PRC){echo '音频播放及附件列表 - AppMoney712 移动应用设计系统';}else if($_SESSION[tn]==EN){echo 'Audio Playlist and Document List- AppMoney712 APP Creation System';}else{echo '音頻播放及附件列表 - AppMoney712 移動應用設計系統';}?></h1>
	
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
	
		
	<a href="menudesign.php?pj=<?php echo htmlspecialchars($roww[pjnbr])?>&ap=<?php echo $ap?>&pn=<?php echo $pn?>&php=playlist&plt=1" data-ajax="false" class="ui-btn ui-btn ui-btn-inline ui-corner-all ui-mini ui-btn-icon-left ui-icon-bars"><?php if($_SESSION[tn]==PRC){echo '专案应用页列表';}else if($_SESSION[tn]==EN){echo 'Project Page List';}else{echo '專案應用頁列表';}?></a>
	<?php ;}?>
	
	<a href="#try" data-rel="popup" data-transition="pop" class="ui-btn ui-btn-f ui-btn-inline ui-corner-all ui-mini" style="color:BLACK"><span class="pigss-pencil" style="color:red"></span><?php if($_SESSION[tn]==PRC){echo '快速试用';}else if($_SESSION[tn]==EN){echo 'Quick try';}else{echo '快速試用';}?></a>
		<div data-role="popup" id="try" data-position-to="window" data-theme="f" class="ifrwidth"><a href="#" data-rel="back" class="popn ui-btn ui-btn-z ui-btn-icon-notext ui-icon-delete"></a><BR><BR>
		<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '预备数据档';}else if($_SESSION[tn]==EN){echo 'Data file preparation';}else{echo '預備數據檔';}?></b> &nbsp;<?php if($_SESSION[tn]==PRC){echo '到本司网站按指引预备数据档。';}else if($_SESSION[tn]==EN){echo 'You need to follow the instruction on our website.';}else{echo '到本司網站按指引預備數據檔。';}?></p>	
		
		<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '项目填写';}else if($_SESSION[tn]==EN){echo 'Item information';}else{echo '項目填寫';}?></b> &nbsp;<?php if($_SESSION[tn]==PRC){echo '在\'数据URL\'填写数据url并提送。';}else if($_SESSION[tn]==EN){echo 'You need to enter Data filename to Data URL  and then click the SEND button.';}else{echo '在\'數據URL\'填寫數據url並提送。';}?></p>	
		<HR>
		<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '试用';}else if($_SESSION[tn]==EN){echo 'Testing';}else{echo '試用';}?></b> &nbsp;
	<?php if($_SESSION[tn]==PRC){echo '您须点撀此页上的预览,再进行测试。再修改及选用不同设置再预览并试用。';}else if($_SESSION[tn]==EN){echo 'You need to click the above preview button to test your design. You can enter or select different parameters to test their functions and effects.';}else{echo '您須點撀此頁上的預覽,再進行測試。再修改及選用不同設置再預覽並試用。';}?></p>	
		
		</div>
		
	<?php if($tl)$tln = '&tl='.$tl;?>
	
	<FORM action="playlist.php?pj=<?php echo htmlspecialchars($roww[pjnbr]) ?>&ap=<?php echo htmlspecialchars($roww[ap]) ?>&pn=<?php echo htmlspecialchars($pn).$tln ?>" id="webxls" method="post" data-ajax="false">
	<hr>
<span style="color:black"><?php if($_SESSION[tn]==PRC){echo '专案';}else if($_SESSION[tn]==EN){echo 'Project';}else{echo '專案';}?></span>
	<?php 	$sql=$db->query("select * from webpj where cno='$pj'");
	if($sql)$row=$sql->fetch();
	echo '['.htmlspecialchars($row[date]).'] '.htmlspecialchars($row[title]);?>
	
	&nbsp;&nbsp;&nbsp;&nbsp;
	
	<span style="color:black"><?php if($_SESSION[tn]==PRC){echo '应用页称';}else if($_SESSION[tn]==EN){echo 'Page name';}else{echo '應用頁稱';}?></span> :
	<?php echo htmlspecialchars($roww[title])?>

	<hr>
	<?php   if($pn){
				$ht = file_get_contents('../panel/'.$roww[pjnbr].'/'.$ap.'.html');
			
			
			$htm = explode('<!--part',$ht);
			$pntag = '<!--part'.$pn.'!-->';
				for($i=1;$i<sizeof($htm);$i++){
					if(strpos('<!--part'.$htm[$i],$pntag)===false and !$playlist){$html .= '<!--part'.$htm[$i];}
					else if(strpos('<!--part'.$htm[$i],$pntag)!==false){$playlist  = str_replace($pntag,'','<!--part'.$htm[$i]);}
					else{$htmls .= '<!--part'.$htm[$i];}
				;}
			$tabnbgdata = explode('<!--data-tabnbg',$playlist);
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
				
			$playlist  = str_replace('<div class="swiper-slide"><div id="'.$pj.$ap.'vnts'.$pn.'" class="vntsns vtnn">','',$playlist);		
			$playlist  = str_replace('<!--data-tabnbg'.$tabnbgdatn[0].'data-tabnbg!-->','',$playlist);	
			;}			
				$playlist  = str_replace('</div></div><!--vnts!-->','',$playlist);

			
			$tbgnvlu = explode('<!--data',$playlist);
			$tbgsvlu = explode('data!-->',$tbgnvlu[1]);
			$tbgvlu = explode('@#@',$tbgsvlu[0]);

			$urlvlu = $tbgvlu[0];
			$tclrvlu = $tbgvlu[1];
			$wspvlu = $tbgvlu[2];
			$lengthvlu = $tbgvlu[3];
			$imgbgvlu = $tbgvlu[4];
			$bgvlu = $tbgvlu[5];
			$volntitlevlu = $tbgvlu[6];
			$durtitlevlu = $tbgvlu[7];
			$looptitlevlu = $tbgvlu[8];
			$popbgvlu = $tbgvlu[9];
			$gridtitlevlu = $tbgvlu[10];
			$pausetitlevlu = $tbgvlu[11];
			$clrvolnvlu = $tbgvlu[12];
			$clrdurvlu = $tbgvlu[13];
			$clrloopvlu = $tbgvlu[14];
			$clrgridvlu = $tbgvlu[15];
			$clrpausevlu = $tbgvlu[16];			

			
			;}
	?>
	
	
	<?php if($_SESSION[tn]==PRC){echo '数据URL';}else if($_SESSION[tn]==EN){echo 'Data URL';}else{echo '數據URL';}?>
	<input type="text" name="url" placeholder=""  value="<?php echo htmlspecialchars($urlvlu)?>" required>
<div class="ui-grid-d"><div class="ui-block-a">
	<?php if($_SESSION[tn]==PRC){echo '标题颜色';}else if($_SESSION[tn]==EN){echo 'Title color';}else{echo '標題顏色';}?>
	<input type="text" name="tclr" placeholder=""  value="<?php echo htmlspecialchars($tclrvlu)?>">
</div><div class="ui-block-b">&nbsp;<br><label for='wsp'><?php if($_SESSION[tn]==PRC){echo '文字显示';}else if($_SESSION[tn]==EN){echo 'All texts show';}else{echo '文字顯示';}?><input type="checkbox" name="wsp" id="wsp" value="1" <?php if($wspvlu)echo 'checked="checked"'?>></label></div>

<div class="ui-block-c">
<?php if($_SESSION[tn]==PRC){echo '按钮长度[%]';}else if($_SESSION[tn]==EN){echo 'Button length[%]';}else{echo '按鈕長度[%]';}?>
<input type="number" name="length" placeholder=""  value="<?php echo htmlspecialchars($lengthvlu)?>">
</div><div class="ui-block-d">
<?php if($_SESSION[tn]==PRC){echo '按钮背景';}else if($_SESSION[tn]==EN){echo 'Button background';}else{echo '按鈕背景';}?>
<input name="imgbg" type="text" value="<?php echo htmlspecialchars($imgbgvlu)?>">
</div><div class="ui-block-e">
<?php if($_SESSION[tn]==PRC){echo '此段內容背景';}else if($_SESSION[tn]==EN){echo 'Content background';}else{echo '此段內容背景';}?>
<input name="bg" type="text" value="<?php echo htmlspecialchars($bgvlu)?>">
</div>	</div>

<?php if($playlist){?>
<hr>
<div class="ui-grid-d"><div class="ui-block-a">
	<?php if($_SESSION[tn]==PRC){echo '音量按钮标题';}else if($_SESSION[tn]==EN){echo 'Volume button title';}else{echo '音量按鈕標題';}?>
	<input type="text" name="volntitle" placeholder=""  value="<?php echo htmlspecialchars($volntitlevlu)?>">
</div>
<div class="ui-block-b">
<?php if($_SESSION[tn]==PRC){echo '时间按钮标题';}else if($_SESSION[tn]==EN){echo 'Duration button title';}else{echo '時間按鈕標題';}?>
	<input type="text" name="durtitle" placeholder=""  value="<?php echo htmlspecialchars($durtitlevlu)?>">
</div><div class="ui-block-c">
<?php if($_SESSION[tn]==PRC){echo '循环按钮标题';}else if($_SESSION[tn]==EN){echo 'Loop button title';}else{echo '循環按鈕標題';}?>
	<input type="text" name="looptitle" placeholder=""  value="<?php echo htmlspecialchars($looptitlevlu)?>">
</div><div class="ui-block-d">
<?php if($_SESSION[tn]==PRC){echo '设置按钮标题';}else if($_SESSION[tn]==EN){echo 'Setting button title';}else{echo '設置按鈕標題';}?>
	<input type="text" name="gridtitle" placeholder=""  value="<?php echo htmlspecialchars($gridtitlevlu)?>">
</div><div class="ui-block-e">
<?php if($_SESSION[tn]==PRC){echo '停止按钮标题';}else if($_SESSION[tn]==EN){echo 'Stop button title';}else{echo '停止按鈕標題';}?>
	<input type="text" name="pausetitle" placeholder=""  value="<?php echo htmlspecialchars($pausetitlevlu)?>">
</div>	</div>

<div class="ui-grid-d"><div class="ui-block-a">
	<?php if($_SESSION[tn]==PRC){echo '音量按钮标题颜色';}else if($_SESSION[tn]==EN){echo 'Color of Volume button title';}else{echo '音量按鈕標題顏色';}?>
	<input type="text" name="clrvoln" placeholder=""  value="<?php echo htmlspecialchars($clrvolnvlu)?>">
</div><div class="ui-block-b">
<?php if($_SESSION[tn]==PRC){echo '时间按钮标题颜色';}else if($_SESSION[tn]==EN){echo 'Color of Duration button title';}else{echo '時間按鈕標題顏色';}?>
	<input type="text" name="clrdur" placeholder=""  value="<?php echo htmlspecialchars($clrdurvlu)?>">
</div><div class="ui-block-c">
<?php if($_SESSION[tn]==PRC){echo '循环按钮标题颜色';}else if($_SESSION[tn]==EN){echo 'Color of Loop button title';}else{echo '循環按鈕標題顏色';}?>
	<input type="text" name="clrloop" placeholder=""  value="<?php echo htmlspecialchars($clrloopvlu)?>">
</div><div class="ui-block-d">
<?php if($_SESSION[tn]==PRC){echo '设置按钮标题颜色';}else if($_SESSION[tn]==EN){echo 'Color of Setting button title';}else{echo '設置按鈕標題顏色';}?>
	<input type="text" name="clrgrid" placeholder=""  value="<?php echo htmlspecialchars($clrgridvlu)?>">
</div><div class="ui-block-e">
<?php if($_SESSION[tn]==PRC){echo '停止按钮标题颜色';}else if($_SESSION[tn]==EN){echo 'Color of Stop button title';}else{echo '停止按鈕標題顏色';}?>
	<input type="text" name="clrpause" placeholder=""  value="<?php echo htmlspecialchars($clrpausevlu)?>">
</div>	</div>
<hr>
<?php if($_SESSION[tn]==PRC){echo '设定POPUP背景';}else if($_SESSION[tn]==EN){echo 'POPUP background';}else{echo '設定POPUP背景';}?>
<input name="popbg" type="text" value="<?php echo htmlspecialchars($popbgvlu)?>">
<?php ;}//if($playlist){?>


	<input type="hidden" name="guanyin1" value="<?php if(!$_POST[guanyin1])$_SESSION[guanyin1]=rand();
	echo htmlspecialchars($_SESSION[guanyin1]); ?>">
	
	<div class="ui-grid-d"><div class="ui-block-a">
	<input type="submit" name="submit" id="webxlsbtn" class="ui-btn" value="<?php if($_SESSION[tn]==PRC){echo '送交';}else if($_SESSION[tn]==EN){echo 'SEND';}else{echo '送交';}?>"></div><div class="ui-block-b"></div><div class="ui-block-c"></div>
	<div class="ui-block-d">
	<a href="#inf" data-rel="popup" data-transition="pop" class="ui-btn ui-btn-b ui-btn-inline ui-corner-all ui-mini">? <?php if($_SESSION[tn]==PRC){echo '解释';}else if($_SESSION[tn]==EN){echo 'Explanation';}else{echo '解釋';}?></a>
	<div data-role="popup" id="inf" style="min-width:300px;max-width:85%" data-position-to="window" data-theme="f"><a href="#" class="ui-btn ui-corner-all ui-icon-delete ui-btn-icon-notext ui-btn-right" data-rel="back"></a>
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '高度';}else if($_SESSION[tn]==EN){echo 'Content height';}else{echo '高度';}?></b>
	<?php if($_SESSION[tn]==PRC){echo '此段内容有限高,用户或须拖拽画面浏览。';}else if($_SESSION[tn]==EN){echo 'APP user may need to scroll their device\'s screen to view the playlist data because of height limitation of playlist area.';}else{echo '此段內容自動限高,用戶或須拖拽畫面瀏覽。';}?></p>
	<hr>
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '数据URL';}else if($_SESSION[tn]==EN){echo 'Data URL';}else{echo '數據URL';}?></b>
	<?php if($_SESSION[tn]==PRC){echo '只能用存於互联网/内联网/应用内特定的JSON格式档,请参考网站。';}else if($_SESSION[tn]==EN){echo 'You can use specific JSON format file stored in the Internet/Intranet/APP only. Please refer to our website.';}else{echo '只能用存於互聯網/內聯網/應用內的特定JSON格式檔,請參考網站。';}?></p>
	<p><?php if($_SESSION[tn]==PRC){echo '若设置是特定的音颜档案,档案能顺序播放。';}else if($_SESSION[tn]==EN){echo 'If you add specific format of sound source URL to the data file, the file can be played automatically.';}else{echo '若設置是特定的音顏檔案,檔案能順序播放。';}?></p>
	<p><?php if($_SESSION[tn]==PRC){echo '数据内容亦能是存於whatsAPP url或互联网或内联网的文件或视频及音频档案,e.g. pdf文件,供用户点撀浏览或开启用户设备应用。';}else if($_SESSION[tn]==EN){echo 'The data content can be WhatsAPP URL or document/audio or video file stored in the Internet/Intranet. e.g. pdf document. APP user can browse it or open an apropriate APP to open the document/files in device by clicking popup button or WhatsAPP APP is opened for the specific function.';}else{echo '數據內容亦能是存於whatsAPP url或互聯網或內聯網的文件或視頻及音頻檔案,e.g. pdf文件,供用戶點撀瀏覽或開啟用戶設備應用。';}?></p>
	<p>
	<?php if($_SESSION[tn]==PRC){echo '不同的设备或浏览器,显示的型式不同,亦受音频档案格式影响。';}else if($_SESSION[tn]==EN){echo 'Different devices or browsers will show the sound player or related control buttons in different styles. The display style is also affected by sound file format.';}else{echo '不同的設備或瀏覽器,顯示的型式不同,亦受音頻檔案格式影響。';}?>
	</p>
<hr>
<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '标题颜色';}else if($_SESSION[tn]==EN){echo 'Title color';}else{echo '標題顏色';}?></b>

	<?php if($_SESSION[tn]==PRC){echo '填写html颜色码e.g. #123456。此项能在JSON档逐项再定。';}else if($_SESSION[tn]==EN){echo 'You can enter html color code e.g. #123456. Each title of items can be defined in the JSON File.';}else{echo '填寫html顏色碼e.g. #123456。此項能在JSON檔逐項再定。';}?></p>
	
	<hr>
<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '文字显示';}else if($_SESSION[tn]==EN){echo 'Show all texts ';}else{echo '文字顯示';}?></b>
	<?php if($_SESSION[tn]==PRC){echo '您应将浏览器调至移动设备尺寸浏览您的设计。点选代表键入的特定內容文字不限高度全部显示。';}else if($_SESSION[tn]==EN){echo 'All specific content texts will be showed on the button. You need to resize your browser as mobile phone to view the difference.';}else{echo '您應將瀏覽器調至移動設備尺寸瀏覽您的設計。點選代表鍵入的特定內容文字不限高度全部顯示。';}?></p>
	<hr>
	
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '按钮长度[%]';}else if($_SESSION[tn]==EN){echo 'Button length[%]';}else{echo '按鈕長度[%]';}?></b> 

	<?php if($_SESSION[tn]==PRC){echo '按钮相对用户浏览设备阔度的尺寸百分比,填整数。e.g.85。';}else if($_SESSION[tn]==EN){echo 'It is the popup length relating to screen width of APP user\'s device. You need to enter integer.e.g.85';}else{echo '按鈕相對用戶瀏覽設備闊度的尺寸百分比,填整數。e.g.85';}?></p>
		<hr>

	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '按钮背景';}else if($_SESSION[tn]==EN){echo 'Button background';}else{echo '按鈕背景';}?></b>


	<?php if($_SESSION[tn]==PRC){echo '您能填上rgb颜色码e.g. rgb(125,125,125), rgba颜色码e.g. rgba(125,125,125,0.5) 或 hex颜色码e.g. #123456。';}else if($_SESSION[tn]==EN){echo 'You can add rgb color code e.g. rgb(125,125,125), rgba color code e.g. rgba(125,125,125,0.5) or hex color code e.g. #123456.';}else{echo '您能填上rgb顏色碼e.g. rgb(125,125,125), rgba顏色碼e.g. rgba(125,125,125,0.5) 或 hex顏色碼e.g. #123456。';}?><BR>
	<?php if($_SESSION[tn]==PRC){echo '此项能在JSON档逐项再定,若另定,不应填此项,填上此项按钮有边色,此色受设计页设定时的主题颜色决定。';}else if($_SESSION[tn]==EN){echo 'Each title can be defined their backgrounds in the JSON File. If you define them in the file, you may not need to enter this background data. If you fill in the data, a color boader[depend on page color theme] will be showed on the button.';}else{echo '此項能在JSON檔逐項再定,若另定,不應填此項,填上此項按鈕有邊色,此色受設計頁設定時的主題顏色決定。';}?>
	</p>
	
	<hr>
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '此段內容背景';}else if($_SESSION[tn]==EN){echo 'Content background';}else{echo '此段內容背景';}?></b>

	
	<?php 
	if(!$roww[pjnbr])$roww[pjnbr] = '?';
	if($_SESSION[tn]==PRC){echo '您能填上rgb颜色码e.g. rgb(125,125,125), rgba颜色码e.g. rgba(125,125,125,0.5) 或 hex颜色码e.g. #123456代替背景图像。';}else if($_SESSION[tn]==EN){echo 'You can add rgb color code e.g. rgb(125,125,125), rgba color code e.g. rgba(125,125,125,0.5) or hex color code e.g. #123456.';}else{echo '您能填上rgb顏色碼e.g. rgb(125,125,125), rgba顏色碼e.g. rgba(125,125,125,0.5) 或 hex顏色碼e.g. #123456。';}?>
	<?php if($_SESSION[tn]==PRC){echo '您亦能填上相片档案,您需预备相片并存於应用的panel/'.$roww[pjnbr].'/images档夹及特定互联网伺服器。e.g. picture.png 或 http://.....。';}else if($_SESSION[tn]==EN){echo 'You can enter a picture url. You need to prepare pictures and store them in panel/'.$roww[pjnbr].'/images folder or specific Internet server.';}else{echo '您亦能填上相片檔案,您需預備相片並存於應用的panel/'.$roww[pjnbr].'/images檔夾及特定互聯網伺服器。e.g. picture.png 或 http://.....';}?>
	</p>
	<hr>
	<h4 style="color:blue"><?php if($_SESSION[tn]==PRC){echo '以下项目在修改时显示';}else if($_SESSION[tn]==EN){echo 'The following items are showed when amendment:';}else{echo '以下項目在修改時顯示';}?></h4>
	<hr>
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '设置按钮标题';}else if($_SESSION[tn]==EN){echo 'Parameter button title';}else{echo '設置按鈕標題';}?></b>
	<?php if($_SESSION[tn]==PRC){echo '您能在此内容的顶部左边加设置按钮,供用户调节音量等项目。键入标题才启用此按钮,若键入btns,是不设标题。此种按钮亦能用数据方法在列表上设置。';}else if($_SESSION[tn]==EN){echo 'You can add parameter button for APP user to adjust settings such as volume. You need to enter a title value to enable this button. You can enter btns as title value for no title of this button. You can also use data to add a same function button on the playlist.';}else{echo '您能在此內容的頂部左邊加設置按鈕,供用戶調節音量等項目。鍵入標題才啟用此按鈕,若鍵入btns,是不設標題。此種按鈕亦能用數據方法在列表上設置。';}?><a href="#" class="ui-btn ui-btn-z ui-btn-inline ui-btn-icon-notext ui-icon-grid"></a></p>
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '停止按钮标题';}else if($_SESSION[tn]==EN){echo 'Pause button title';}else{echo '停止按鈕標題';}?></b>
	<?php if($_SESSION[tn]==PRC){echo '您能在此内容的顶部右边加停止按钮,作用停止播放。键入标题才启用此按钮,若键入btns,是不设标题。此种按钮亦能用数据方法在列表上设置。';}else if($_SESSION[tn]==EN){echo 'You can add pause button for APP user to stop playing. You need to enter a title value to enable this button. You can enter btns as title value for no title of this button. You can also use the json data method to add a same function button on the playlist.';}else{echo '您能在此內容的頂部右邊加停止按鈕,作用停止播放。鍵入標題才啟用此按鈕,若鍵入btns,是不設標題。此種按鈕亦能用數據方法在列表上設置。';}?><a href="#" class="ui-btn ui-btn-z ui-btn-inline ui-btn-icon-notext ui-icon-pausesound"></a></p>
	<hr>
	<h4><?php if($_SESSION[tn]==PRC){echo '以下标题是显示在设置按钮的popup内';}else if($_SESSION[tn]==EN){echo 'The following titles are showed on the popup of Parameter button:';}else{echo '以下標題是顯示在設置按鈕的popup內';}?></h4>
	<hr>
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '音量按钮标题';}else if($_SESSION[tn]==EN){echo 'Volume button title';}else{echo '音量按鈕標題';}?></b>
	<?php if($_SESSION[tn]==PRC){echo '用户能直接点撀推杆而不用点撀此按钮,作用调节音量。';}else if($_SESSION[tn]==EN){echo 'APP user can click the slider rather than this button to control sound volume shifting.';}else{echo '用戶能直接點撀推杆而不用點撀此按鈕,作用調節音量。';}?><a href="#" class="ui-btn ui-btn-z ui-btn-inline ui-btn-icon-notext ui-icon-audio"></a></p>
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '时间按钮标题';}else if($_SESSION[tn]==EN){echo 'Duration button title';}else{echo '時間按鈕標題';}?></b>
	<?php if($_SESSION[tn]==PRC){echo '用户能直接点撀推杆而不用点撀此按钮,作用将播放档调至特定时段。';}else if($_SESSION[tn]==EN){echo 'APP user can click the slider rather than this button to control file duration shifting.';}else{echo '用戶能直接點撀推杆而不用點撀此按鈕,作用將播放檔調至特定時段。';}?><a href="#" class="ui-btn ui-btn-z ui-btn-inline ui-btn-icon-notext ui-icon-clock"></a></p>
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '循环按钮标题';}else if($_SESSION[tn]==EN){echo 'Loop button title';}else{echo '循環按鈕標題';}?></b>
	<?php if($_SESSION[tn]==PRC){echo '用户点撀此按钮能启用或闗闭顺序播放。';}else if($_SESSION[tn]==EN){echo 'APP user can click this button to enable automatic loop playing or not.';}else{echo '用戶點撀此按鈕能啟用或闗閉順序播放。';}?><a href="#" class="ui-btn ui-btn-z ui-btn-inline ui-btn-icon-notext ui-icon-minus"></a><a href="#" class="ui-btn ui-btn-z ui-btn-inline ui-btn-icon-notext ui-icon-refresh"></a></p>
	
<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '上述按钮的标题颜色';}else if($_SESSION[tn]==EN){echo 'Color of above mentioned buttons\' title';}else{echo '上述按鈕的標題顏色';}?></b>
<?php if($_SESSION[tn]==PRC){echo '填写html颜色码e.g. #123456。';}else if($_SESSION[tn]==EN){echo 'You can enter html color code e.g. #123456.';}else{echo '填寫html顏色碼e.g. #123456。';}?></p>
	</p>
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '设定POPUP背景';}else if($_SESSION[tn]==EN){echo 'POPUP background';}else{echo '設定POPUP背景';}?></b>
	<?php if($_SESSION[tn]==PRC){echo '同上背景设定方法。';}else if($_SESSION[tn]==EN){echo 'The method is as the above mentioned background.';}else{echo '同上背景設定方法。';}?></p>
	</div>
	
	</div>
	
	</div>
	</FORM>
	<hr>
	
	<?php 
	if($playlist){
	if($_SESSION[tn]==PRC){echo '您的设计';}else if($_SESSION[tn]==EN){echo 'Your design';}else{echo '您的設計';}
	$nplaylist = str_replace('(images/','(../panel/'.$roww[pjnbr].'/images/',$playlist);
	echo '<br>'.str_replace('"images/','"../panel/'.$roww[pjnbr].'/images/',$nplaylist);
		
if(file_exists('../panel/'.$roww[pjnbr].'/web'.$ap.'.js')){
	$jswebn = file_get_contents('../panel/'.$roww[pjnbr].'/web'.$ap.'.js');
	$jswebn=explode('/*webjs'.$pn.'*/',$jswebn);
	echo '<script>';
	if($jswebn[1])echo 'localStorage.clear();';
	echo 'var plistd = localStorage.getItem("'.$pj.$ap.'plistd'.$pn.'");
		if(plistd){
			plistd = JSON.parse(plistd);
			plistd.splice(0,1,0);
			plistd.splice(2,1,"'.htmlspecialchars($tclrvlu).'");
			plistd.splice(3,1,"'.htmlspecialchars($wspvlu).'");
			plistd.splice(4,1,"'.htmlspecialchars($imgbgvlu).'");
			localStorage.setItem("'.$pj.$ap.'plistd'.$pn.'",JSON.stringify(plistd));}'.$jswebn[1].';</script>';
;}
	}
	
	?>
	<hr>

	<?php if($_SESSION[tn]==PRC){echo '例';}else if($_SESSION[tn]==EN){echo 'Example';}else{echo '例';}?> <br>
<div class="ui-grid-solo" style="background-image:url(../images/sw.jpg);background-size:100%;background-repeat:repeat-y;;min-height:200px;padding-left:5px;padding-right:5px;">
<div style="background-color:rgba(0,0,0,0)">
<a href="#15playcontro1" class="ui-btn ui-mini ui-btn-inline ui-btn-z ui-btn-icon-notext ui-icon-grid" data-rel="popup"></a>
<a href="#" class="15pausesound1 ui-btn ui-mini ui-btn-inline ui-btn-z ui-btn-icon-notext ui-icon-pausesound" style="float:right"></a>
</div><BR>
<ul data-role="listview" style="overflow-y:auto;overflow-x:hidden;" data-theme="z" id="15playlist1"></ul>
</div>

<div data-role="popup" data-corners="false" id="15soundp1" class="ifrwidthpn">
<a href="#" data-rel="back" class="popn ui-btn ui-btn-z ui-btn-icon-notext ui-icon-delete"></a>
<iframe src="" style="width:100%" seamless frameBorder="0"></iframe></div>

<div><audio id="15AUDIOfile1"><source src="" type="audio/wav"><source src="" type="audio/mpeg"></audio></div>

<div id="15playcontro1" data-role="popup" data-theme="a" data-corners="false" style="padding:5px;height: 100%;width: 100%;top:0;left:-15px;" class="ifrwidthps">
<a href="#" data-rel="back" class="popn ui-btn ui-btn-z ui-btn-icon-notext ui-icon-delete"></a>
<br><br>
<span id="15playdur1n"></span>
<div id="15topos1"><input name="15toposition1" id="15toposition1" type="range" min="0" max="1" step="0.1" value=""  data-role="none" data-highlight="true"></div>
<a href="#" id="15topositn1" class="ui-btn ui-btn-z ui-btn-icon-notext ui-icon-clock"></a>
<div id="15volm1"><input name="15volmn1" id="15volmn1" type="range" min="0" max="1" step="0.1" value="0.8"  data-role="none" data-highlight="true"></div>
<a href="#" id="15voln1" class="ui-btn ui-btn-z ui-btn-icon-notext ui-icon-audio"></a>
<hr>
<a href="#" id="15playlistloop1" class="ui-btn ui-btn-z ui-btn-icon-notext ui-icon-minus"></a>
</div>

<div id="15playinf1"></div>	
	
	



	
	<div id="navigations" data-role="popup" data-theme="none">
	<ul style="min-width:210px;" data-role="listview" data-inset="true">
	<li data-icon="edit"><a href="design.php" data-ajax="false"><?php if($_SESSION[tn]==PRC){echo '设计步骤';}else if($_SESSION[tn]==EN){echo 'Design Step';}else{echo '設計步驟';}?></a></li>
	<!--<li><a href="deignote.php" data-ajax="false"><?php if($_SESSION[tn]==PRC){echo '设计笔记';}else if($_SESSION[tn]==EN){echo 'Design Note';}else{echo '設計筆記';}?></a></li>!-->
	<li><a href="project.php" data-ajax="false"><?php if($_SESSION[tn]==PRC){echo '专案管理';}else if($_SESSION[tn]==EN){echo 'Project Management';}else{echo '專案管理';}?></a></li>
	<li><a href="tool.php" data-ajax="false"><?php if($_SESSION[tn]==PRC){echo '工具';}else if($_SESSION[tn]==EN){echo 'Tools';}else{echo '工具';}?></a></li>


	<li><a href="explanation.php" data-ajax="false"><?php if($_SESSION[tn]==PRC){echo '解释';}else if($_SESSION[tn]==EN){echo 'Explanation';}else{echo '解釋';}?></a></li>

	

	</ul></div><!-- /navigation -->	
	
	<div id="15imgspop" data-theme="z" style="padding:5px;" data-role="popup" data-corners="false" class="ifrwidthp" ><a href="#" data-rel="back" class="popn ui-btn ui-btn-z ui-btn-icon-notext ui-icon-delete"></a><img src=""><div class="ifrspinn" style="position:relative;left:50%;width:100%">Loading...<BR><img src="css/images/ajax-loader.gif"></div></div>
		<div id="15ifrspop" data-theme="z" data-role="popup" data-corners="false" style="overflow-y:auto;padding:5px;" class="ifrwidthps" ><a href="#" data-rel="back" class="popn ui-btn ui-btn-z ui-btn-icon-notext ui-icon-delete"></a><iframe src="" style="width:100%" seamless frameBorder="0" ></iframe><div class="ifrspinn" style="position:relative;left:50%;width:100%">Loading...<BR><img src="css/images/ajax-loader.gif"></div></div>
		
	<hr>
	<div class="copyright">&copy; 2015 Lee Wai Kwok(Hong Kong). JSTRUST CONSULTANCY. <?php if($_SESSION[tn]==PRC){echo '版权所有';}else if($_SESSION[tn]==EN){echo 'All Rights Reserved.';}else{echo '版權所有';}?></div>
	</div><!-- /content -->
	</div><!-- /page -->
</body></html>
<script src="../js/appsystem.js"></script>

<script>
$('#15playlist1').append('<li data-icon="sound"><a href="#" id="15plistd1n0" class="15playaudio1"  style="border:none;background-color:rgba(0,255,255,0.3)" data-nbr="0" data-url="../images/sound.wav"><img src="../images/sw.jpg"><h2><span id="15playdur1n0"></span> music </h2>music</a></li><li data-icon="audio"><a href="#" id="15plistd1n1" class="15playaudio1" style="border:none;color:red;background-color:rgba(0,255,255,0.8)" data-nbr="1" data-url="../images/sound.wav"><img src="../images/sw.jpg"><h2><span id="15playdur1n1"></span> sound</h2>sound</a></li><li data-icon="tag"><a href="#" class="15imgspop" style="border:none;background-color:rgba(0,255,255,0.6)" data-pop="15" data-url="vw.html"><img src="../images/sw.jpg"><h2><span id="15playdur1n1"> attachment</h2>attachment</a></li><li data-icon="tag"><a href="#"  class="15imgspop" style="border:none;" data-pop="15" data-url="../images/sw.jpg"><img src="../images/sw.jpg"><h2><span id="15playdur1n1"> photo</h2>photo</a></li><li data-icon="pausesound"><a href="#" class="15pausesound1" style="border:none;background-color:rgba(128,128,128,0.5)"><h2>&nbsp;</h2></a></li><li data-icon="grid"><a href="#15playcontro1" data-rel="popup" style="border:none;background-color:rgba(128,128,128,0.6)"><h2>&nbsp;</h2></a></li>');	
playlistv("15","1","15AUDIOfile1","1");
localStorage["15plistnbr1"]=2;

//var html = localStorage.getItem("12plHTML23");
//$('#12playlist23').append(html);
</script>

<?php 
$tdy=0;
$tdy=date('Y-m-d');
if($_POST['url'] and $pj and $_SESSION[guanyin1] and $_SESSION[guanyin1]==$_POST[guanyin1]){

	if($ap and !preg_match('/^[0-9]*$/', $ap))exit;
	if($pj and !preg_match('/^[0-9]*$/', $pj))exit;	
	if($pn and !preg_match('/^[0-9]*$/', $pn))exit;	
		
			if($_POST[bg]){
			$bgtheme = 'z';
			if(strpos($_POST[bg],'http://')!==false or strpos($_POST[bg],'https://')!==false){$images = '';}else{$images = 'images/';}
			if(strlen($_POST[bg])==1){$bghtml = '';$bgtheme = htmlspecialchars($_POST[bg]);}		
			else if(strpos($_POST[bg],'#')!==false or strpos($_POST[bg],'rgba(')!==false  or strpos($_POST[bg],'rgb(')!==false){$bghtml = 'background-color:'.htmlspecialchars($_POST[bg]).';';$bgtheme = 'x';}
			else if(strpos($_POST[bg],'[xy]')!==false){$bghtml = 'background-image:url('.$images.htmlspecialchars($_POST[bg]).');';$bgtheme = 'x';}
			else{$bghtml = 'background-image:url('.$images.htmlspecialchars($_POST[bg]).');background-size:100%;background-repeat:repeat-y;';}
			;}else{$bghtml = '';$bgtheme = 'x';}
			
			if($_POST[popbg]){
			$popbgtheme = 'z';
			if(strpos($_POST[popbg],'http://')!==false or strpos($_POST[popbg],'https://')!==false){$images = '';}else{$images = 'images/';}
			if(strlen($_POST[popbg])==1){$popbghtml = '';$popbgtheme = htmlspecialchars($_POST[popbg]);}		
			else if(strpos($_POST[popbg],'#')!==false or strpos($_POST[popbg],'rgba(')!==false  or strpos($_POST[popbg],'rgb(')!==false){$popbghtml = 'background-color:'.htmlspecialchars($_POST[popbg]).';';$popbgtheme = 'x';}
			else if(strpos($_POST[popbg],'[xy]')!==false){$popbghtml = 'background-image:url('.$images.htmlspecialchars($_POST[popbg]).');';$popbgtheme = 'y';}
			else{$popbghtml = 'background-image:url('.$images.htmlspecialchars($_POST[popbg]).');background-size:100%;background-repeat:repeat-y;';}
			;}else{$popbghtml = '';$popbgtheme = 'a';}

			$popup .= '<!--data'.htmlspecialchars($_POST[url]).'@#@'.htmlspecialchars($_POST[tclr]).'@#@'.htmlspecialchars($_POST[wsp]).'@#@'.htmlspecialchars($_POST[length]).'@#@'.htmlspecialchars($_POST[imgbg]).'@#@'.htmlspecialchars($_POST[bg]).'@#@'.htmlspecialchars($_POST[volntitle]).'@#@'.htmlspecialchars($_POST[durtitle]).'@#@'.htmlspecialchars($_POST[looptitle]).'@#@'.htmlspecialchars($_POST[popbg]).'@#@'.htmlspecialchars($_POST[gridtitle]).'@#@'.htmlspecialchars($_POST[pausetitle]).'@#@'.htmlspecialchars($_POST[clrvoln]).'@#@'.htmlspecialchars($_POST[clrdur]).'@#@'.htmlspecialchars($_POST[clrloop]).'@#@'.htmlspecialchars($_POST[clrgrid]).'@#@'.htmlspecialchars($_POST[clrpause]).'data!-->';

			
			if($_POST['length'])$width = 'width:'.htmlspecialchars($_POST['length']).'%;';

			if($_POST[clrvoln]){$clrvoln = ' style="color:'.htmlspecialchars($_POST[clrvoln]).'"';}else{$clrvoln = '';}
			if($_POST[clrdur]){$clrdur = ' style="color:'.htmlspecialchars($_POST[clrdur]).'"';}else{$clrdur = '';}
			if($_POST[clrloop]){$clrloop = ' style="color:'.htmlspecialchars($_POST[clrloop]).'"';}else{$clrloop = '';}
			if($_POST[clrgrid]){$clrgrid = ' style="color:'.htmlspecialchars($_POST[clrgrid]).'"';}else{$clrgrid = '';}
			if($_POST[clrpause]){$clrpause = 'color:'.htmlspecialchars($_POST[clrpause]).';';}else{$clrpause = '';}
						
			if($_POST[volntitle]){$volntitle = ' ui-btn-icon-left">'.htmlspecialchars($_POST[volntitle]);}else{$volntitle = ' ui-btn-icon-notext">';}
			if($_POST[durtitle]){$durtitle = ' ui-btn-icon-left">'.htmlspecialchars($_POST[durtitle]);}else{$durtitle = ' ui-btn-icon-notext">';}
			if($_POST[looptitle]){$looptitle = ' ui-btn-icon-left">'.htmlspecialchars($_POST[looptitle]);}else{$looptitle = ' ui-btn-icon-notext">';}
			
			if($_POST[gridtitle] and $_POST[gridtitle]=='btns'){$gridtitle = ' ui-btn-icon-notext">';}
			else if($_POST[gridtitle]){$gridtitle = ' ui-btn-icon-left">'.htmlspecialchars($_POST[gridtitle]);}
			if($_POST[pausetitle] and $_POST[pausetitle]=='btns'){$pausetitle = ' ui-btn-icon-notext">';}
			else if($_POST[pausetitle]){$pausetitle = ' ui-btn-icon-left">'.htmlspecialchars($_POST[pausetitle]);}
			
			if($_POST[gridtitle] or $_POST[pausetitle]){$gridbtn = 1;}else{$gridbtn = '';}
			$popup .= '<div class="ui-grid-solo" id="'.$pj.$ap.'playlistd'.$pn.'" style="'.$bghtml.'min-height:200px;padding-left:5px;padding-right:5px;">';
			if($_POST[gridtitle] or $_POST[pausetitle])$popup .= '<div style="background-color:rgba(0,0,0,0)">';
			if($_POST[gridtitle])$popup .= '<a href="#'.$pj.$ap.'playcontro'.$pn.'" '.$clrgrid.' data-rel="popup" class="ui-btn ui-mini ui-btn-inline ui-btn-z ui-icon-grid'.$gridtitle.'</a>';
			if($_POST[pausetitle])$popup .= '<a href="#"  style="float:right;'.$clrpause.'"  class="'.$pj.$ap.'pausesound'.$pn.' ui-btn ui-mini ui-btn-inline ui-btn-z ui-icon-pausesound'.$pausetitle.'</a>';
			if($_POST[gridtitle] or $_POST[pausetitle])$popup .= '</div>';//$popup .= '</div><BR>';
			$popup .= '<div style="overflow-y:auto;overflow-x:hidden;width:100%;" class="webkitm" id="'.$pj.$ap.'playlist'.$pn.'"><ul data-role="listview" style="'.$width.'background-color:rgba(0,0,0,0.1);" data-theme="'.$bgtheme.'"></ul></div></div>';
			$popup .= '<div><audio id="'.$pj.$ap.'AUDIOfile'.$pn.'"><source src="" type="audio/mpeg"><source src="" type="audio/wav"></audio></div><div id="'.$pj.$ap.'playcontro'.$pn.'" data-role="popup" data-theme="'.$popbgtheme.'" data-corners="false" style="'.$popbghtml.'padding:5px;height: 100%;width: 100%;top:0;left:-15px;" class="ifrwidthps"><a href="#" data-rel="back" class="popn ui-btn ui-btn-z ui-btn-icon-notext ui-icon-delete"></a><br><br><span id="'.$pj.$ap.'playdur'.$pn.'n"></span>
			
			<div id="'.$pj.$ap.'topos'.$pn.'"><input name="'.$pj.$ap.'toposition'.$pn.'" id="'.$pj.$ap.'toposition'.$pn.'" type="range" min="0" max="1" step="0.005" value="0"  data-role="none" data-highlight="true"></div><a href="#" id="'.$pj.$ap.'topositn'.$pn.'" '.$clrdur.' class="ui-btn ui-btn-z ui-btn-inline ui-icon-clock'.$durtitle.'</a><div id="'.$pj.$ap.'volm'.$pn.'"><input name="'.$pj.$ap.'volmn'.$pn.'" id="'.$pj.$ap.'volmn'.$pn.'" type="range" min="0" max="1" step="0.1" value="0.8" data-role="none" data-highlight="true"></div>
			
			<div id="'.$pj.$ap.'toposapp'.$pn.'"><input name="'.$pj.$ap.'topositionapp'.$pn.'" id="'.$pj.$ap.'topositionapp'.$pn.'" type="range" min="0" max="1" step="0.005" value="0" data-highlight="true"></div><a href="#" id="'.$pj.$ap.'topositnapp'.$pn.'" '.$clrdur.' class="ui-btn ui-btn-z ui-btn-inline ui-icon-clock'.$durtitle.'</a><div id="'.$pj.$ap.'volpp'.$pn.'"><input name="'.$pj.$ap.'volmnapp'.$pn.'" id="'.$pj.$ap.'volmnapp'.$pn.'" type="range" min="0" max="1" step="0.1" value="0.8" data-highlight="true"></div>
			
			
			<a href="#" id="'.$pj.$ap.'voln'.$pn.'" '.$clrvoln.' class="ui-btn ui-btn-z ui-btn-inline ui-icon-audio'.$volntitle.'</a><hr><a href="#" id="'.$pj.$ap.'playlistloop'.$pn.'" '.$clrloop.' class="ui-btn ui-btn-z ui-btn-inline ui-icon-minus'.$looptitle.'</a></div><div id="'.$pj.$ap.'playinf'.$pn.'"></div>';		
			

			
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
			$webpopup .= $html.'<!--part'.$pn.'!--><!--sysplaylistsys!-->'.$vnts.$popup.$vntsn.$tabnbgdatns.$htmls;
			$webpopup .= '</div><!--content!--></div><!--page!-->';
			
		 	
			
			$fpagtrns='../panel/'.$roww[pjnbr].'/'.$ap.'.html';
			file_put_contents($fpagtrns,$html.'<!--part'.$pn.'!--><!--sysplaylistsys!-->'.$vnts.$popup.$vntsn.$tabnbgdatns.$htmls);

			$fpagtrns='../panel/'.$roww[pjnbr].'/web'.$ap.'.html';
			file_put_contents($fpagtrns,$webpopup);

	

	
	
			if(!file_exists('../panel/'.$roww[pjnbr].'/web'.$ap.'.js')){
			$fpagtrns = '../panel/'.$roww[pjnbr].'/web'.$ap.'.js';
			$js = '/*$(document).on(\'pageshow\', \'#web'.$ap.'\', function(){*/';
			$js .= '/*});*/';
			file_put_contents($fpagtrns,$js);			
			
			;}
			
			$jsweb = file_get_contents('../panel/'.$roww[pjnbr].'/web'.$ap.'.js');
				
				$jswebs=explode('/*webjs'.$pn.'*/',$jsweb);
				$jsweb = $jswebs[0].$jswebs[2];
				
				$js = '/*webjs'.$pn.'*/';
				$urlv = end(explode(".", $_POST[url]));$urlv = str_replace('.'.$urlv,'v.'.$urlv,htmlspecialchars($_POST[url]));
				$js .= '/*ajax'.$ap.'ajax*/playlist("'.$pj.$ap.'","'.$pj.$ap.'playlist'.$pn.'","'.$pn.'","'.$urlv.'","'.htmlspecialchars($_POST[url]).'","'.htmlspecialchars($_POST[tclr]).'","'.htmlspecialchars($_POST[wsp]).'","'.htmlspecialchars($_POST[imgbg]).'");/*ajaxs*/;playlistv("'.$pj.$ap.'","'.$pj.'","'.$pj.$ap.'AUDIOfile'.$pn.'","'.$pn.'","'.$gridbtn.'",windowHeight);playing("'.$pj.$ap.'","'.$pj.$ap.'AUDIOfile'.$pn.'","'.$pn.'");';	
				$js .= '/*webjs'.$pn.'*/'
				.'/*});*/';
				$jsweb=str_replace('/*});*/',$js,$jsweb);
				file_put_contents('../panel/'.$roww[pjnbr].'/web'.$ap.'.js',$jsweb);
		
	
	echo "<meta http-equiv='refresh' content='0;URL=playlist.php?ap=".htmlspecialchars($roww[ap])."&pj=".htmlspecialchars($roww[pjnbr])."&pn=".htmlspecialchars($pn)."'>";
;}

?>
