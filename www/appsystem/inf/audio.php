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
    <title><?php if($_SESSION[tn]==PRC){echo '音頻 - AppMoney712 移动应用设计系统';}else if($_SESSION[tn]==EN){echo 'Audio - AppMoney712 APP Creation System';}else{echo '音頻 - AppMoney712 移動應用設計系統';}?></title>
	<link href="../css/jquery.mobile-1.4.4.min.css" rel="stylesheet">
	<link href="../css/jquerymobile-1.4.4.min.css" rel="stylesheet">
	<link href="../css/appsystem.css" rel="stylesheet"><link href="../css/icons/style.css" rel="stylesheet">
	<style type="text/css">
	</style>
	<script src="../js/jquery.js"></script>
	<script src="../js/jquery.mobile-1.4.4.min.js"></script>
	<script>
	function checkform ( form )
	{
	<?php 
				if($pn){				
				$ht = file_get_contents('../panel/'.$roww[pjnbr].'/'.$ap.'.html');
				$hts = explode('id="'.$pj.$ap.'auds',$ht);
				if(sizeof($hts)>1){
				echo 'var vtn = [';
				for($i=1;$i<sizeof($hts);$i++){
				$htsn = explode('"',$hts[$i]);
				$htsnp = explode('n',$htsn[0]);
				if($i!=(sizeof($hts)-1)){echo $htsnp[1].',';}
				else{echo $htsnp[1];}
				$audionbrvlu[$i] = $htsnp[1];
				;}
				echo '];'
				;}
				
	;}//if($pn){?>
	if(form.audnbrv.value==''){
	for(var i=0;i<vtn.length;i++){
	if(form.audnbr.value==vtn[i]){
	alert('<?php if($_SESSION[tn]==PRC){echo 'ID编号不能重复';}else if($_SESSION[tn]==EN){echo 'ID number[duplication is not allowed].';}else{echo 'ID編號不能重複';}?>');
	form.audnbr.focus();
	
	return (false);
	;}
	;}
	;}
	;}
	</script>


</head>
<body>

<div data-role="page" id="appageone" data-theme="f" class="page">
	<div style="overflow: hidden;" data-role="header" data-theme="f">
	<a href="#navigations"  id="menubttn"  data-rel="popup" data-transition="pop" class="ui-btn ui-btn ui-btn-inline ui-corner-all ui-btn-icon-left ui-icon-bars"><?php if($_SESSION[tn]==PRC){echo '目录';}else if($_SESSION[tn]==EN){echo 'Menu';}else{echo '目錄';}?></a>
    <h1><?php if($_SESSION[tn]==PRC){echo '音頻 - AppMoney712 移动应用设计系统';}else if($_SESSION[tn]==EN){echo 'Audio - AppMoney712 APP Creation System';}else{echo '音頻 - AppMoney712 移動應用設計系統';}?></h1>
	
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
	
		
	<a href="menudesign.php?pj=<?php echo htmlspecialchars($roww[pjnbr])?>&ap=<?php echo $ap?>&pn=<?php echo $pn?>&php=audio&plt=1" data-ajax="false" class="ui-btn ui-btn ui-btn-inline ui-corner-all ui-mini ui-btn-icon-left ui-icon-bars"><?php if($_SESSION[tn]==PRC){echo '专案应用页列表';}else if($_SESSION[tn]==EN){echo 'Project Page List';}else{echo '專案應用頁列表';}?></a>
	<?php ;}?>
	
	
	<a href="#try" data-rel="popup" data-transition="pop" class="ui-btn ui-btn-f ui-btn-inline ui-corner-all ui-mini" style="color:BLACK"><span class="pigss-pencil" style="color:red"></span><?php if($_SESSION[tn]==PRC){echo '快速试用';}else if($_SESSION[tn]==EN){echo 'Quick try';}else{echo '快速試用';}?></a>
		<div data-role="popup" id="try" data-position-to="window" data-theme="f" class="ifrwidth"><a href="#" data-rel="back" class="popn ui-btn ui-btn-z ui-btn-icon-notext ui-icon-delete"></a><BR><BR>
		<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '预备音频档';}else if($_SESSION[tn]==EN){echo 'Audio file preparation';}else{echo '預備音頻檔';}?></b> &nbsp;<?php if($_SESSION[tn]==PRC){echo '到本司网站按指引预备音频档。';}else if($_SESSION[tn]==EN){echo 'You need to follow the instruction on our website.';}else{echo '到本司網站按指引預備音頻檔。';}?></p>	
		
		<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '项目填写';}else if($_SESSION[tn]==EN){echo 'Item information';}else{echo '項目填寫';}?></b> &nbsp;<?php if($_SESSION[tn]==PRC){echo '在\'mp3档案URL\'及\'wav档案URL\'填写音频url,在\'改用按钮格式\'的\'按钮阔度\'填35,在\'音频id \'填1并提送。';}else if($_SESSION[tn]==EN){echo 'You need to enter Audio filename to \'mp3 filename URL only\'/\'wav filename URL only\' and enter 35 to the \'button width\' of \'Use playing button style\' and then click the SEND button.';}else{echo '在\'mp3檔案URL\'及\'wav檔案URL\'填寫音頻url,在\'改用按鈕格式\'的\'按鈕闊度\'填35,在\'音頻id \'填1並提送。';}?></p>	
		<HR>
		<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '试用';}else if($_SESSION[tn]==EN){echo 'Testing';}else{echo '試用';}?></b> &nbsp;
	<?php if($_SESSION[tn]==PRC){echo '您须点撀此页上的预览,再进行测试。再修改及选用不同设置再预览并试用。';}else if($_SESSION[tn]==EN){echo 'You need to click the above preview button to test your design. You can enter or select different parameters to test their functions and effects.';}else{echo '您須點撀此頁上的預覽,再進行測試。再修改及選用不同設置再預覽並試用。';}?></p>	
		
		</div>
	<?php if($tl)$tln = '&tl='.$tl;?>
	
	<FORM action="audio.php?pj=<?php echo htmlspecialchars($roww[pjnbr]) ?>&ap=<?php echo htmlspecialchars($roww[ap]) ?>&pn=<?php echo htmlspecialchars($pn).$tln ?>" id="webxls" method="post" data-ajax="false"  onSubmit="return checkform(this);">
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
			
			$htm = explode('<!--part',$ht);
			$pntag = '<!--part'.$pn.'!-->';
				for($i=1;$i<sizeof($htm);$i++){
					if(strpos('<!--part'.$htm[$i],$pntag)===false and !$audio){$html .= '<!--part'.$htm[$i];}
					else if(strpos('<!--part'.$htm[$i],$pntag)!==false){$audio  = str_replace($pntag,'','<!--part'.$htm[$i]);}
					else{$htmls .= '<!--part'.$htm[$i];}
				;}
			$tabnbgdata = explode('<!--data-tabnbg',$audio);
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

				
			$audio = str_replace('<div class="swiper-slide"><div id="'.$pj.$ap.'vnts'.$pn.'" class="vntsns vtnn">','',$audio);		
			$audio = str_replace('<!--data-tabnbg'.$tabnbgdatn[0].'data-tabnbg!-->','',$audio);		
			;}	
				$audio  = str_replace('</div></div><!--vnts!-->','',$audio);		

				
			$tbgnvlu = explode('<!--data',$audio);
			$tbgsvlu = explode('data!-->',$tbgnvlu[1]);
			$tbgvlu = explode('@#@',$tbgsvlu[0]);
			;}
	?>
	<?php if($_SESSION[tn]==PRC){echo '音频档URL';}else if($_SESSION[tn]==EN){echo 'AUDIO FILE URL';}else{echo '音頻檔URL';}?>
	<div class="ui-grid-a"><div class="ui-block-a">
	
	<?php if($_SESSION[tn]==PRC){echo 'mp3档案URL';}else if($_SESSION[tn]==EN){echo 'mp3 filename URL only';}else{echo 'mp3檔案URL';}?>
	<input type="text" name="audio" placeholder=""  value="<?php echo htmlspecialchars($tbgvlu[0])?>" required></div>
	<div class="ui-block-b"><?php if($_SESSION[tn]==PRC){echo 'wav档案URL';}else if($_SESSION[tn]==EN){echo 'wav filename URL only';}else{echo 'wav檔案URL';}?>
	<input type="text" name="audio1" placeholder=""  value="<?php echo htmlspecialchars($tbgvlu[1])?>"></div></div>

<div class="ui-grid-c"><div class="ui-block-a">
<?php if($_SESSION[tn]==PRC){echo '音频id [限整数,不可重覆]';}else if($_SESSION[tn]==EN){echo 'audio id [unique integer only]';}else{echo '音頻id [限整數,不可重覆]';}?>
<input type="number" name="audnbr" placeholder=""  value="<?php echo htmlspecialchars($tbgvlu[2])?>" required>
<input type="hidden" name="audnbrv" placeholder=""  value="<?php echo htmlspecialchars($tbgvlu[2])?>">
</div><div class="ui-block-b">
<?php if($_SESSION[tn]==PRC){echo '音频档案时间';}else if($_SESSION[tn]==EN){echo 'audio duration';}else{echo '音頻檔案時間';}?>
<input type="text" name="tm" placeholder=""  value="<?php echo htmlspecialchars(str_replace('&nbsp;','',$tbgvlu[3]))?>">
</div><div class="ui-block-c">
<?php if($_SESSION[tn]==PRC){echo '背景图像';}else if($_SESSION[tn]==EN){echo 'background picture';}else{echo '背景圖像';}?>
<input name="bg" type="text" value="<?php echo htmlspecialchars($tbgvlu[4])?>">
</div><div class="ui-block-c">
<?php if($_SESSION[tn]==PRC){echo '时间颜色';}else if($_SESSION[tn]==EN){echo 'audio duration color';}else{echo '時間顏色';}?>
<input name="tclr" type="text" value="<?php echo htmlspecialchars($tbgvlu[5])?>">
</div></div>
<?php if(sizeof($hts)>1){
	if($_SESSION[tn]==PRC){echo '巳用ID编号';}else if($_SESSION[tn]==EN){echo 'used ID number';}else{echo '巳用ID編號';}?> :  
	<?php 
				for($i=1;$i<sizeof($hts);$i++){
					echo $audionbrvlu[$i].' &nbsp;';				
				;}
	;}?>
<hr>
<?php if($_SESSION[tn]==PRC){echo '改用按钮格式';}else if($_SESSION[tn]==EN){echo 'Use playing button style';}else{echo '改用按鈕格式';}?>
<div class="ui-grid-a"><div class="ui-block-a">
<?php if($_SESSION[tn]==PRC){echo '按鈕颜色';}else if($_SESSION[tn]==EN){echo 'audio playing button color';}else{echo '按鈕顏色';}?>
<input name="imgbg" type="text" value="<?php echo htmlspecialchars($tbgvlu[6])?>">
</div><div class="ui-block-b">
<?php if($_SESSION[tn]==PRC){echo '按钮阔度';}else if($_SESSION[tn]==EN){echo 'button width';}else{echo '按鈕闊度';}?>
<input name="imgbgwdh" type="number" value="<?php echo htmlspecialchars($tbgvlu[7])?>">
</div>	</div>

<hr>
<?php if($_SESSION[tn]==PRC){echo '改用popup按钮格式';}else if($_SESSION[tn]==EN){echo 'Use popup button style';}else{echo '改用popup按鈕格式';}?>
<div class="ui-grid-b"><div class="ui-block-a">
<?php if($_SESSION[tn]==PRC){echo '按鈕颜色';}else if($_SESSION[tn]==EN){echo 'audio play button color';}else{echo '按鈕顏色';}?>
<input name="POPbtnbg" type="text" value="<?php echo htmlspecialchars($tbgvlu[8])?>">
</div><div class="ui-block-b">
<?php if($_SESSION[tn]==PRC){echo '按钮标题';}else if($_SESSION[tn]==EN){echo 'button title';}else{echo '按鈕標題';}?>
<input name="POPbtntitle" type="text" value="<?php echo htmlspecialchars($tbgvlu[9])?>">
</div><div class="ui-block-b">
<?php if($_SESSION[tn]==PRC){echo '按钮阔度';}else if($_SESSION[tn]==EN){echo 'button width';}else{echo '按鈕闊度';}?>
<input name="imgbgwdhs" type="number" value="<?php echo htmlspecialchars($tbgvlu[10])?>">
</div>	</div>
	<input type="hidden" name="guanyin1" value="<?php if(!$_POST[guanyin1])$_SESSION[guanyin1]=rand();
	echo htmlspecialchars($_SESSION[guanyin1]); ?>">
	
	<div class="ui-grid-d"><div class="ui-block-a">
	<input type="submit" name="submit" id="webxlsbtn" class="ui-btn" value="<?php if($_SESSION[tn]==PRC){echo '送交';}else if($_SESSION[tn]==EN){echo 'SEND';}else{echo '送交';}?>"></div><div class="ui-block-b"></div><div class="ui-block-c"></div>
	<div class="ui-block-d">
	<a href="#inf" data-rel="popup" data-transition="pop" class="ui-btn ui-btn-b ui-btn-inline ui-corner-all ui-mini">? <?php if($_SESSION[tn]==PRC){echo '解释';}else if($_SESSION[tn]==EN){echo 'Explanation';}else{echo '解釋';}?></a>
	<div data-role="popup" id="inf" style="min-width:300px;max-width:85%" data-position-to="window" data-theme="f"><a href="#" class="ui-btn ui-corner-all ui-icon-delete ui-btn-icon-notext ui-btn-right" data-rel="back"></a>
		<p><b style="color:pink"><?php if($_SESSION[tn]==PRC){echo '相似功能 - 调用APP功能';}else if($_SESSION[tn]==EN){echo 'Alternative Function - OPEN APP';}else{echo '相似功能 - 調用APP功能';}?></b> 
		<?php if($_SESSION[tn]==PRC){echo '您能改用\'项目列表\'或\'选项按钮\'等相关popup的功能,用户点撀相关按钮开启用户设备内合适的应用开启特定音频档案。 [音频档案是公开的]';}else if($_SESSION[tn]==EN){echo 'You can use popup button function in the \'Listview\' or the \'Option button\' function or similar function to open specific Internet/Intranet audio file by appropriate APP in APP user\'s appropriate device. [Audio file is open to public.]';}else{echo '您能改用\'項目列表\'或\'選項按鈕\'等相關popup的功能,用戶點撀相關按鈕開啟用戶設備內合適的應用開啟特定音頻檔案。 [音頻檔案是公開的]';}?></p>
	<hr>
<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '解释';}else if($_SESSION[tn]==EN){echo 'Explanation';}else{echo '解釋';}?></b> 
	<?php if($_SESSION[tn]==PRC){echo '若您的音频档案是公开的,您能使用此功能。您须存放您的wav及mp3同名档案(例audio.mp3及audio.wav)於互联网伺服器，亦能存於内联网。';}else if($_SESSION[tn]==EN){echo 'If your audio file is open to public, you can use this function. You need to store your mp3 and wav file with same filename (e.g. audio.mp3 and audio.wav) in a specific Internet server or Intranet server.';}else{echo '若您的音頻檔案是公開的,您能使用此功能。您須存放您的wav及mp3同名檔案(例audio.mp3及audio.wav)於互聯網伺服器，亦能存於內聯網。';}?></p>
	<p><?php if($_SESSION[tn]==PRC){echo '若应用内需很多个音频档案,您应使用此软件另一些功能,即\'Popup相片格\'或\'选项按钮\'功能,能创建含开启popup按钮,popup内容是音频档控制器，又或使用\'音频播放及附件列表\'功能。';}else if($_SESSION[tn]==EN){echo 'If your APP design contains many audio files, you need to use the \'Audio Playlist and Document List\' function or use the \'Popup Photo Grid\' function or \'Option button\' function in this software to open them by popup dynamically. The popup contains audio file player.';}else{echo '若應用內需很多個音頻檔案,您應使用此軟件另一些功能,即\'Popup相片格\'或\'選項按鈕\'功能,能創建含開啟popup按鈕,popup內容是音頻檔控制器，又或使用\'音頻播放及附件列表\'功能。';}?></p>
	<p>
	<?php if($_SESSION[tn]==PRC){echo '不同的设备或浏览器,显示的型式不同。';}else if($_SESSION[tn]==EN){echo 'Different devices or browsers will show the sound player or related control buttons in different styles.';}else{echo '不同的設備或瀏覽器,顯示的型式不同。';}?>
	</p>
	<p>
	<?php if($_SESSION[tn]==PRC){echo '您亦能使用其它相关含POPUP的功能,e.g. 相格或按钮,用户点撀能显示含音频控制器及相关音频档案的popup。';}else if($_SESSION[tn]==EN){echo 'You can use APP page functions relating to popup which can show a sound player with sound file.';}else{echo '您亦能使用其它相關含POPUP的功能,e.g. 相格或按鈕,用戶點撀能顯示含音頻控制器及相關音頻檔案的popup。';}?>
	</p>
	<hr>
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '音频id';}else if($_SESSION[tn]==EN){echo 'audio id';}else{echo '音頻id';}?>/<?php if($_SESSION[tn]==PRC){echo '音频档案时间';}else if($_SESSION[tn]==EN){echo 'audio duration';}else{echo '音頻檔案時間';}?></b>
	<?php if($_SESSION[tn]==PRC){echo '对生成移动应用,须填写音频id及时间。<BR>移动应用显示的音频控制器是不同於此页。';}else if($_SESSION[tn]==EN){echo 'You need to fill in audio id and audio duration. <BR>The audio player in APP is different to the player showed on this web browser.';}else{echo '須填寫音頻id及時間。<BR>移動應用顯示的音頻控制器是不同於此頁。';}?></p>
	<p><?php if($_SESSION[tn]==PRC){echo '改用按钮格式须填写音频id。';}else if($_SESSION[tn]==EN){echo 'You need to fill in the audio id for playing button style';}else{echo '改用按鈕格式須填寫音頻id。';}?></p>
	<hr><p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '背景图像';}else if($_SESSION[tn]==EN){echo 'Background picture';}else{echo '背景圖像';}?></b>
	
	<?php if($_SESSION[tn]==PRC){echo '此段內容的背景图像。若设置背景图像上下左右重覆显示,在档案名加[xy]。e.g. picture[xy].png';}else if($_SESSION[tn]==EN){echo 'It is about the background picture of this content area. If you add [xy] to the picture file name (e.g. picture[xy].png, the picture will be repeated both vertically and horizontally.';}else{echo '此段內容的背景圖像。若設置背景圖像上下左右重覆顯示,在檔案名加[xy]。e.g. picture[xy].png';}?>
	</p>
	<p>
	<?php if(!$roww[pjnbr])$roww[pjnbr]='?';
	 if($_SESSION[tn]==PRC){echo '若将此图像档案置於此软件内,是放在';}else if($_SESSION[tn]==EN){echo 'You may need to place this file to this software folder ';}else{echo '若將此圖像檔案置於此軟件內,是放在';}echo 'panel/'.$roww[pjnbr].'/images/.';?>
	</p>
	<p> 
	<?php if($_SESSION[tn]==PRC){echo '您亦能在背景图像填上rgb颜色码e.g. rgb(125,125,125), rgba颜色码e.g. rgba(125,125,125,0.5) 或 hex颜色码e.g. #123456代替背景图像。';}else if($_SESSION[tn]==EN){echo 'You can add rgb color code e.g. rgb(125,125,125), rgba color code e.g. rgba(125,125,125,0.5) or hex color code e.g. #123456 instead of background picture.';}else{echo '您亦能在背景圖像填上rgb顏色碼e.g. rgb(125,125,125), rgba顏色碼e.g. rgba(125,125,125,0.5) 或 hex顏色碼e.g. #123456代替背景圖像。';}?>
	</p>
	<hr><p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '时间颜色';}else if($_SESSION[tn]==EN){echo 'font color of audio duration';}else{echo '時間顏色';}?></b>
	<?php if($_SESSION[tn]==PRC){echo '填上html颜色码 e.g. #123456。';}else if($_SESSION[tn]==EN){echo 'You can add color code e.g. #123456 .';}else{echo '填上html顏色碼 e.g. #123456。';}?>
	</p>
	<hr><p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '按钮背景[按钮型式]';}else if($_SESSION[tn]==EN){echo 'button background[button style]';}else{echo '按鈕背景[按鈕型式]';}?></b>
	<?php if($_SESSION[tn]==PRC){echo '填上按钮背景或按钮阔度才启用此型式。填写方法同上背景图像。';}else if($_SESSION[tn]==EN){echo 'You can fill in the background data or button width to enable this style. The input method of background data is same as the above Background picture.';}else{echo '填上按鈕背景或按鈕闊度才啟用此型式。填寫方法同上背景圖像。';}?>
	</p>
	<p>
<?php if($_SESSION[tn]==PRC){echo '使用按钮格式须填写音频id。';}else if($_SESSION[tn]==EN){echo 'You need to fill in the audio id for using this playing button style';}else{echo '使用按鈕格式須填寫音頻id。';}?></p>
	<hr><p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '按钮阔度';}else if($_SESSION[tn]==EN){echo 'button width';}else{echo '按鈕闊度';}?></b>
	<?php if($_SESSION[tn]==PRC){echo '是设置按钮阔度占用户设备屏阔或POPUP内容区的百分比。您只能键入整数,e.g. 50。';}else if($_SESSION[tn]==EN){echo 'It is the percentage of width of the button relating to device screen of APP user or popup content width. You can only enter integer. e.g. 50';}else{echo '是設置按鈕闊度佔用戶設備屏闊或POPUP內容區的百分比。您只能鍵入整數,e.g. 50。';}?>
	</p>
	<hr><p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '改用popup按钮格式';}else if($_SESSION[tn]==EN){echo 'Use popup button style';}else{echo '改用popup按鈕格式';}?></b>
	<?php if($_SESSION[tn]==PRC){echo '用户点撀按钮显示popup内含音频控制器及相关音频档案。';}else if($_SESSION[tn]==EN){echo 'APP user clicks a button to show popup containing sound player and appropriate sound file.';}else{echo '用戶點撀按鈕顯示popup內含音頻控制器及相關音頻檔案。';}?>
	</p>
	
	<p>
	<?php if($_SESSION[tn]==PRC){echo '建议使用此型式。';}else if($_SESSION[tn]==EN){echo 'You may use this style rather than playing button style.';}else{echo '建議使用此型式。';}?>
	</p>
	
	</div>
	
	</div>
	
	</div>
	</FORM>
	<hr>
	<?php 
	if($audio){
	if($_SESSION[tn]==PRC){echo '您的设计';}else if($_SESSION[tn]==EN){echo 'Your design';}else{echo '您的設計';}
	$naudio = str_replace('(images/','(../panel/'.$roww[pjnbr].'/images/',$audio);
	echo '<br>'.str_replace('"images/','"../panel/'.$roww[pjnbr].'/images/',$naudio);
	
	if(file_exists('../panel/'.$roww[pjnbr].'/web'.$ap.'.js')){
	$jswebn = file_get_contents('../panel/'.$roww[pjnbr].'/web'.$ap.'.js');
	$jswebn=explode('/*webjs'.$pn.'*/',$jswebn);
	echo '<script>$(document).on("pageshow", "#appageone", function(){'.$jswebn[1].' });</script>';
	;}
	
	}
	
	?>
	<hr>

	<?php if($_SESSION[tn]==PRC){echo '例';}else if($_SESSION[tn]==EN){echo 'Example';}else{echo '例';}?> <br>
			<audio controls loop>
			<source src="../images/sound.mp3" type="audio/mpeg">
			<source src="../images/sound.wav" type="audio/wav">
			</audio><br><br>
		<?php if($_SESSION[tn]==PRC){echo '例';}else if($_SESSION[tn]==EN){echo 'Example';}else{echo '例';}?> <br>
			<i id="audt"></i> &nbsp;<i>0:05</i><br>
			<audio id="auds" controls loop>
			<source src="../images/sound.mp3" type="audio/mpeg">
			<source src="../images/sound.wav" type="audio/wav">
			</audio>
	
	
<hr><?php if($_SESSION[tn]==PRC){echo '按钮型式';}else if($_SESSION[tn]==EN){echo 'playing button style';}else{echo '按鈕型式';}?> <br>
<i id="15audt5n1" ></i> &nbsp;<i  ></i><br><a href="#"  id="15playaudio5n1" data-vlu="" style="border:none;background-image:url(images/btnimgs.gif);background-size:100%;background-repeat:repeat-y;width:35%" class="ui-btn ui-btn-w ui-btn-inline"><img style="width:50px" src="css/images/sound.svg"></a><BR><input id="15volm5n1" type="range" data-role="none" value="0.8"  step="0.1" min="0" max="1"><BR><input id="15topos5n1" type="range" data-role="none" value="0" step="0.1" min="0" max="1"><div id="15volm5ndiv1"><input id="15volm5napp1" type="range"  value="0.8"  step="0.1" min="0" max="1"></div><BR><div id="15topos5ndiv1"><input id="15topos5napp1" type="range"  value="0" step="0.01" min="0" max="1"></div><audio id="15auds5n1"  loop><source src="../images/sound.mp3" type="audio/mpeg"><source src="../images/sound.wav" type="audio/wav"></audio>
<hr>		
			<?php if($_SESSION[tn]==PRC){echo 'popup按钮格式';}else if($_SESSION[tn]==EN){echo 'popup button style';}else{echo 'popup按鈕格式';}?> <br>
			<a href="#51playaudio5npop1" id="51playaudio5nbtn1" data-rel="popup" data-transition="pop" data-vmp="../images/sound.mp3" data-vwa="../images/sound.wav" style="white-space:normal;border:none;background-color:#123456;" class="ui-btn ui-btn-inline ui-btn-icon-left ui-icon-sound">按鈕標題</a><div id="51playaudio5npop1" data-theme="z" data-role="popup" style="background-image:url(images/ishow1.gif);background-size:100%;background-repeat:repeat-y;padding:5px;" data-corners="false" class="ifrwidthps" ><a href="#" data-rel="back" class="popn ui-btn ui-btn-z ui-btn-icon-notext ui-icon-delete"></a><!--datahttp://192.168.1.107/appsystemd/sound1.wav@#@http://192.168.1.107/appsystemd/sound1.wav@#@1@#@@#@@#@@#@#123456@#@@#@#123456@#@按鈕標題data!--><i id="51audt5n1" ></i> &nbsp;<i  ></i><br><a href="#"  id="51playaudio5n1" data-vlu="" style="border:none;width:50%;" class="ui-btn ui-btn-w ui-btn-inline"><img style="width:50px" src="css/images/sound.svg"></a><BR><input id="51volm5n1" type="range" data-role="none" value="0.8"  step="0.1" min="0" max="1"><BR><input id="51topos5n1" type="range" data-role="none" value="0" step="0.1" min="0" max="1"><div id="51volm5ndiv1"><input id="51volm5napp1" type="range"  value="0.8"  step="0.1" min="0" max="1"></div><BR><div id="51topos5ndiv1"><input id="51topos5napp1" type="range"  value="0" step="0.01" min="0" max="1"></div><audio id="51auds5n1" ><source src="" id="51playaudio5nmpeg1" type="audio/mpeg"><source src="" id="51playaudio5nwav1" type="audio/wav"></audio></div>
	
	<div id="navigations" data-role="popup" data-theme="none">
	<ul style="min-width:210px;" data-role="listview" data-inset="true">
	<li data-icon="edit"><a href="design.php" data-ajax="false"><?php if($_SESSION[tn]==PRC){echo '设计步骤';}else if($_SESSION[tn]==EN){echo 'Design Step';}else{echo '設計步驟';}?></a></li>
	<!--<li><a href="deignote.php" data-ajax="false"><?php if($_SESSION[tn]==PRC){echo '设计笔记';}else if($_SESSION[tn]==EN){echo 'Design Note';}else{echo '設計筆記';}?></a></li>!-->
	<li><a href="project.php" data-ajax="false"><?php if($_SESSION[tn]==PRC){echo '专案管理';}else if($_SESSION[tn]==EN){echo 'Project Management';}else{echo '專案管理';}?></a></li>
	<li><a href="tool.php" data-ajax="false"><?php if($_SESSION[tn]==PRC){echo '工具';}else if($_SESSION[tn]==EN){echo 'Tools';}else{echo '工具';}?></a></li>


	<li><a href="explanation.php" data-ajax="false"><?php if($_SESSION[tn]==PRC){echo '解释';}else if($_SESSION[tn]==EN){echo 'Explanation';}else{echo '解釋';}?></a></li>

	

	</ul></div><!-- /navigation -->	
	<hr>
	<div class="copyright">&copy; 2015 Lee Wai Kwok(Hong Kong). JSTRUST CONSULTANCY. <?php if($_SESSION[tn]==PRC){echo '版权所有';}else if($_SESSION[tn]==EN){echo 'All Rights Reserved.';}else{echo '版權所有';}?></div>
	</div><!-- /content -->
	</div><!-- /page -->
</body></html>
<script src="../js/appsystem.js"></script>
<script>
document.getElementById("auds").addEventListener("timeupdate",function(){
$("#audt").text(caltm(Math.round(document.getElementById("auds").currentTime)));
});

$(document).on("pageshow", "#appageone", function(){
   
webaudio("15","5",1);webaudio("51","5",1);
});
</script>
<?php 
$tdy=0;
$tdy=date('Y-m-d');
if(($_POST['audio'] or $_POST['audio1']) and $pj and $_SESSION[guanyin1] and $_SESSION[guanyin1]==$_POST[guanyin1]){

	
	if($ap and !preg_match('/^[0-9]*$/', $ap))exit;
	if($pj and !preg_match('/^[0-9]*$/', $pj))exit;	
	if($pn and !preg_match('/^[0-9]*$/', $pn))exit;	
	if($_POST[audnbr] and !preg_match('/^[0-9]*$/', $_POST[audnbr]))exit;
	
			$popup .= '<!--data'.htmlspecialchars($_POST['audio']).'@#@'.htmlspecialchars($_POST['audio1']).'@#@'.htmlspecialchars($_POST[audnbr]).'@#@'.htmlspecialchars($_POST[tm]).'@#@'.htmlspecialchars($_POST[bg]).'@#@'.htmlspecialchars($_POST[tclr]).'@#@'.htmlspecialchars($_POST[imgbg]).'@#@'.htmlspecialchars($_POST[imgbgwdh]).'@#@'.htmlspecialchars($_POST[POPbtnbg]).'@#@'.htmlspecialchars($_POST[POPbtntitle]).'@#@'.htmlspecialchars($_POST[imgbgwdhs]).'data!-->';
			
			
			if($_POST[audnbr]){
				if($_POST[tclr])$tclr = 'style="color:'.htmlspecialchars($_POST[tclr]).';"';
			$popup .= '<p>&nbsp;<i id="'.$pj.$ap.'audt'.$ap.'n'.htmlspecialchars($_POST[audnbr]).'" '.$tclr.'></i> &nbsp;<i  '.$tclr.'>'.htmlspecialchars($_POST[tm]).'</i></p>';
			$audnbr = 'id="'.$pj.$ap.'auds'.$ap.'n'.htmlspecialchars($_POST[audnbr]).'"';}
			else{$audnbr = 'id="'.$pj.$ap.'auds'.$ap.'n"';}
			
			
			if($_POST[imgbg]){
			
			$bgtheme = 'w';
			if(strpos($_POST[imgbg],'http://')!==false or strpos($_POST[imgbg],'https://')!==false){$images = '';}else{$images = 'images/';}
			if(strlen($_POST[imgbg])==1){$bghtml = '';$bgtheme = htmlspecialchars($_POST[imgbg]);}		
			else if(strpos($_POST[imgbg],'#')!==false or strpos($_POST[imgbg],'rgba(')!==false  or strpos($_POST[imgbg],'rgb(')!==false){$bghtml = 'background-color:'.htmlspecialchars($_POST[imgbg]).';';}
			else if(strpos($_POST[imgbg],'[xy]')!==false){$bghtml = 'background-image:url('.$images.htmlspecialchars($_POST[imgbg]).');';}
			else{$bghtml = 'background-image:url('.$images.htmlspecialchars($_POST[imgbg]).');background-size:100%;background-repeat:repeat-y;';}
			
			if($_POST[imgbgwdh] and preg_match('/^[0-9]*$/',$_POST[imgbgwdh])){$imgbgwdh = 'width:'.$_POST[imgbgwdh].'%;';}else{$imgbgwdh = 'width:35%;';}
			if($_POST[imgbgwdhs] and preg_match('/^[0-9]*$/',$_POST[imgbgwdhs])){$imgbgwdhs = 'width:'.$_POST[imgbgwdhs].'%;';}
			
			
			if($_POST[POPbtnbg] or $_POST[POPbtntitle]){
			if(strpos($_POST[POPbtnbg],'http://')!==false or strpos($_POST[POPbtnbg],'https://')!==false){$images = '';}else{$images = 'images/';}
			if(strpos($_POST[POPbtnbg],'#')!==false or strpos($_POST[POPbtnbg],'rgba(')!==false  or strpos($_POST[POPbtnbg],'rgb(')!==false){$POPbghtml = 'background-color:'.htmlspecialchars($_POST[POPbtnbg]).';';}
			else if(strpos($_POST[POPbtnbg],'[xy]')!==false){$POPbghtml = 'background-image:url('.$images.htmlspecialchars($_POST[POPbtnbg]).');';}
			else if($_POST[POPbtnbg]){$POPbghtml = 'background-image:url('.$images.htmlspecialchars($_POST[POPbtnbg]).');background-size:100%;background-repeat:repeat-y;';}
			
			$popuphtml = '<div style="padding-left:5px;padding-right:5px;"><a href="#'.$pj.$ap.'playaudio'.$ap.'npop'.htmlspecialchars($_POST[audnbr]).'" id="'.$pj.$ap.'playaudio'.$ap.'nbtn'.htmlspecialchars($_POST[audnbr]).'" data-rel="popup" data-transition="pop" data-vmp="'.htmlspecialchars($_POST['audio']).'" data-vwa="'.htmlspecialchars($_POST['audio1']).'" style="white-space:normal;border:none;'.$POPbghtml.$imgbgwdhs.'" class="ui-btn ui-btn-inline ui-btn-icon-left ui-icon-sound">'.htmlspecialchars($_POST[POPbtntitle]).'</a></div><div id="'.$pj.$ap.'playaudio'.$ap.'npop'.htmlspecialchars($_POST[audnbr]).'" data-theme="z" data-role="popup" style="padding:5px;height: 100%;width: 100%;top:0;left:-15px;" data-corners="false" class="ifrwidthps" ><a href="#" data-rel="back" class="popn ui-btn ui-btn-z ui-btn-icon-notext ui-icon-delete"></a>';
			$_POST['audio'] = '';$_POST['audio1'] = '';
			}else{$popuphtml = '';}

					
			$controls = '';$popup .= '<div style="padding-left:5px;padding-right:5px;"><a href="#"  id="'.$pj.$ap.'playaudio'.$ap.'n'.htmlspecialchars($_POST[audnbr]).'" data-vlu="" style="border:none;'.$bghtml.$imgbgwdh.'" class="ui-btn ui-btn-'.$bgtheme.' ui-btn-inline"><img style="width:50px" src="css/images/sound.svg"></a><BR><input id="'.$pj.$ap.'volm'.$ap.'n'.htmlspecialchars($_POST[audnbr]).'" type="range" data-role="none" value="0.8"  step="0.1" min="0" max="1"><BR><input id="'.$pj.$ap.'topos'.$ap.'n'.htmlspecialchars($_POST[audnbr]).'" type="range" data-role="none" value="0" step="0.005" min="0" max="1"><div id="'.$pj.$ap.'volm'.$ap.'ndiv'.htmlspecialchars($_POST[audnbr]).'"><input id="'.$pj.$ap.'volm'.$ap.'napp'.htmlspecialchars($_POST[audnbr]).'" type="range"  value="0.8"  step="0.1" min="0" max="1"></div><BR><div id="'.$pj.$ap.'topos'.$ap.'ndiv'.htmlspecialchars($_POST[audnbr]).'"><input id="'.$pj.$ap.'topos'.$ap.'napp'.htmlspecialchars($_POST[audnbr]).'" type="range"  value="0" step="0.005" min="0" max="1"></div></div>';$nbsp = '';}
			else{$controls = 'controls loop';$nbsp = '&nbsp;';}
			$popup .= $nbsp.'<audio '.$audnbr.' '.$controls.'>';
			if($_POST['audio'] or $_POST[POPbtnbg])$popup .= '<source src="'.htmlspecialchars($_POST['audio']).'" type="audio/mpeg">';
			if($_POST['audio1'] or $_POST[POPbtnbg])$popup .= '<source src="'.htmlspecialchars($_POST['audio1']).'" type="audio/wav">';
			$popup .= '</audio>';
			
			
			if($_POST[POPbtnbg] or $_POST[POPbtntitle]){$popuphtmls = '</div>';}else{$popuphtmls = '';}

			
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
			else{$bghtml = 'background-image:url('.$images.htmlspecialchars($_POST[bg]).');background-size:100%;background-repeat:repeat-y;';}
			
			if($_POST[bg]){
			$bghtml = '<div class="ui-grid-solo" style="padding:5px;'.$bghtml.'"><!--audiobg!-->';
			$bghtmls = '<!--audiobg!--></div>';
			;}else{$bghtml = '';$bghtmls = '';}
			
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
			$webpopup .= $html.'<!--part'.$pn.'!--><!--sysaudiosys!-->'.$vnts.$popuphtml.$bghtml.$popup.$bghtmls.$popuphtmls.$vntsn.$tabnbgdatns.$htmls;
			$webpopup .= '</div><!--content!--></div><!--page!-->';
			
		 	
			
			$fpagtrns='../panel/'.$roww[pjnbr].'/'.$ap.'.html';
			file_put_contents($fpagtrns,$html.'<!--part'.$pn.'!--><!--sysaudiosys!-->'.$vnts.$popuphtml.$bghtml.$popup.$bghtmls.$popuphtmls.$vntsn.$tabnbgdatns.$htmls);

			$fpagtrns='../panel/'.$roww[pjnbr].'/web'.$ap.'.html';
			file_put_contents($fpagtrns,$webpopup);

	

	
	
			if(!file_exists('../panel/'.$roww[pjnbr].'/web'.$ap.'.js')){
			$fpagtrns='../panel/'.$roww[pjnbr].'/web'.$ap.'.js';
			$js = '/*$(document).on(\'pageshow\', \'#web'.$ap.'\', function(){*/';
			$js .= '/*});*/';
			file_put_contents($fpagtrns,$js);			
			;}
			
			if($_POST[audnbr] or $_POST[imgbg] or $imgbgwdh){
			$jsweb = file_get_contents('../panel/'.$roww[pjnbr].'/web'.$ap.'.js');
				
				$jswebs=explode('/*webjs'.$pn.'*/',$jsweb);
				$jsweb = $jswebs[0].$jswebs[2];
				if(!$_POST[audnbr]){$_POST[audnbr] = '""';}else{$_POST[audnbr] = htmlspecialchars($_POST[audnbr]);}
				$js = '/*webjs'.$pn.'*/';
				if($_POST[imgbg]){
				$js .= ';webaudio("'.$pj.$ap.'","'.$ap.'",'.$_POST[audnbr].');';}
				else{
				$js .= ';swebaudio("'.$pj.$ap.'","'.$ap.'",'.$_POST[audnbr].');';}
				$js .= '/*webjs'.$pn.'*/'
				.'/*});*/';
				$jsweb=str_replace('/*});*/',$js,$jsweb);
				file_put_contents('../panel/'.$roww[pjnbr].'/web'.$ap.'.js',$jsweb);
				
			;}	
	
	echo "<meta http-equiv='refresh' content='0;URL=audio.php?ap=".htmlspecialchars($roww[ap])."&pj=".htmlspecialchars($roww[pjnbr])."&pn=".htmlspecialchars($pn)."'>";
;}

?>
