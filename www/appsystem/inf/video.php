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
    <title><?php if($_SESSION[tn]==PRC){echo '視頻 - AppMoney712 移动应用设计系统';}else if($_SESSION[tn]==EN){echo 'video - AppMoney712 APP Creation System';}else{echo '視頻 - AppMoney712 移動應用設計系統';}?></title>
	<link href="../css/jquery.mobile-1.4.4.min.css" rel="stylesheet">
	<link href="../css/jquerymobile-1.4.4.min.css" rel="stylesheet">
	<link href="../css/appsystem.css" rel="stylesheet"><link href="../css/icons/style.css" rel="stylesheet">
	<style type="text/css">
	</style>
	<script src="../js/jquery.js"></script>
	<script src="../js/jquery.mobile-1.4.4.min.js"></script>	
	<script src="../js/video.js"></script>

	<script>
	
	</script>


</head>
<body>

<div data-role="page" data-theme="f" class="page">
	<div style="overflow: hidden;" data-role="header" data-theme="f">
	<a href="#navigations"  id="menubttn"  data-rel="popup" data-transition="pop" class="ui-btn ui-btn ui-btn-inline ui-corner-all ui-btn-icon-left ui-icon-bars"><?php if($_SESSION[tn]==PRC){echo '目录';}else if($_SESSION[tn]==EN){echo 'Menu';}else{echo '目錄';}?></a>
    <h1><?php if($_SESSION[tn]==PRC){echo '視頻 - AppMoney712 移动应用设计系统';}else if($_SESSION[tn]==EN){echo 'video - AppMoney712 APP Creation System';}else{echo '視頻 - AppMoney712 移動應用設計系統';}?></h1>
	
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
	
		
	<a href="menudesign.php?pj=<?php echo htmlspecialchars($roww[pjnbr])?>&ap=<?php echo $ap?>&pn=<?php echo $pn?>&php=video&plt=1" data-ajax="false" class="ui-btn ui-btn ui-btn-inline ui-corner-all ui-mini ui-btn-icon-left ui-icon-bars"><?php if($_SESSION[tn]==PRC){echo '专案应用页列表';}else if($_SESSION[tn]==EN){echo 'Project Page List';}else{echo '專案應用頁列表';}?></a>
	<?php ;}?>
	
	<a href="#try" data-rel="popup" data-transition="pop" class="ui-btn ui-btn-f ui-btn-inline ui-corner-all ui-mini" style="color:BLACK"><span class="pigss-pencil" style="color:red"></span><?php if($_SESSION[tn]==PRC){echo '快速试用';}else if($_SESSION[tn]==EN){echo 'Quick try';}else{echo '快速試用';}?></a>
		<div data-role="popup" id="try" data-position-to="window" data-theme="f" class="ifrwidth"><a href="#" data-rel="back" class="popn ui-btn ui-btn-z ui-btn-icon-notext ui-icon-delete"></a><BR><BR>
		
		<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '项目填写';}else if($_SESSION[tn]==EN){echo 'Item information';}else{echo '項目填寫';}?></b> &nbsp;<?php if($_SESSION[tn]==PRC){echo '在\'视频档URL\'填写http://player.vimeo.com/video/103609656,填写\'标题\'及点选\'按钮型式\'并提送。';}else if($_SESSION[tn]==EN){echo 'You need to enter http://player.vimeo.com/video/103609656 to Video FILE URL, fill in  Title, select the checkbox of Button style and then click the SEND button.';}else{echo '在\'視頻檔URL\'填寫http://player.vimeo.com/video/103609656,填寫\'標題\'及點選\'按鈕型式\'並提送。';}?></p>	
		<HR>
		<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '试用';}else if($_SESSION[tn]==EN){echo 'Testing';}else{echo '試用';}?></b> &nbsp;
	<?php if($_SESSION[tn]==PRC){echo '您须点撀此页上的预览,再进行测试。再修改及选用不同设置再预览并试用。';}else if($_SESSION[tn]==EN){echo 'You need to click the above preview button to test your design. You can enter or select different parameters to test their functions and effects.';}else{echo '您須點撀此頁上的預覽,再進行測試。再修改及選用不同設置再預覽並試用。';}?></p>	
		
		</div>
		
	<?php if($tl)$tln = '&tl='.$tl;?>
	
	<FORM action="video.php?pj=<?php echo htmlspecialchars($roww[pjnbr]) ?>&ap=<?php echo htmlspecialchars($roww[ap]) ?>&pn=<?php echo htmlspecialchars($pn).$tln ?>" id="webxls" method="post" data-ajax="false">
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
					if(strpos('<!--part'.$htm[$i],$pntag)===false and !$video){$html .= '<!--part'.$htm[$i];}
					else if(strpos('<!--part'.$htm[$i],$pntag)!==false){$video  = str_replace($pntag,'','<!--part'.$htm[$i]);}
					else{$htmls .= '<!--part'.$htm[$i];}
				;}
				$tabnbgdata = explode('<!--data-tabnbg',$video);
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
				
				$video  = str_replace('<div class="swiper-slide"><div id="'.$pj.$ap.'vnts'.$pn.'" class="vntsns vtnn">','',$video);
				$video  = str_replace('<!--data-tabnbg'.$tabnbgdatn[0].'data-tabnbg!-->','',$video);	
				;}				
				$video  = str_replace('</div></div><!--vnts!-->','',$video);
	
			
			$tbgnvlu = explode('<!--data',$video);
			$tbgsvlu = explode('data!-->',$tbgnvlu[1]);
			$tbgvlu = explode('@#@',$tbgsvlu[0]);

			$fitnvlu = $tbgvlu[0];	
			$videovlu = $tbgvlu[1];
			$titlevlu = $tbgvlu[2];
			$wspvlu = $tbgvlu[3];
			$lengthvlu = $tbgvlu[4];
			$imgbgvlu = $tbgvlu[5];
			$btnvlu = $tbgvlu[6];	
			$bgvlu = $tbgvlu[7];	
			$tclrvlu = $tbgvlu[8];	
			$tjvlu = $tbgvlu[9];	
			$uiiconvlu = $tbgvlu[10];	
			
			;}
	?>
	<div class="ui-grid-a"><div class="ui-block-a" style="width:85%">
	<?php if($_SESSION[tn]==PRC){echo '視频档URL';}else if($_SESSION[tn]==EN){echo 'Video FILE URL';}else{echo '視頻檔URL';}?>
	<input type="text" name="video" placeholder=""  value="<?php echo htmlspecialchars($videovlu)?>" required>
	</div><div class="ui-block-b" style="width:15%">&nbsp;<br><label for='tj'><?php if($_SESSION[tn]==PRC){echo '属AJAX数据URL';}else if($_SESSION[tn]==EN){echo 'AJAX Data URL';}else{echo '屬AJAX數據URL';}?><input type="checkbox" name="tj" id="tj" value="1" <?php if($tjvlu)echo 'checked="checked"'?>></label>
	</div>	</div>

	<?php if($_SESSION[tn]==PRC){echo '标题';}else if($_SESSION[tn]==EN){echo 'Title';}else{echo '標題';}?>
	<input type="text" name="title" placeholder=""  value="<?php echo htmlspecialchars($titlevlu)?>">

<div class="ui-grid-a"><div class="ui-block-a"><?php if($_SESSION[tn]==PRC){echo '标题颜色';}else if($_SESSION[tn]==EN){echo 'Title color';}else{echo '標題顏色';}?>
<input name="tclr" type="text" value="<?php echo htmlspecialchars($tclrvlu)?>">
</div><div class="ui-block-b">&nbsp;<br><label for='wsp'><?php if($_SESSION[tn]==PRC){echo '文字显示';}else if($_SESSION[tn]==EN){echo 'All texts show';}else{echo '文字顯示';}?><input type="checkbox" name="wsp" id="wsp" value="1" <?php if($wspvlu)echo 'checked="checked"'?>></label></div></div>

<div class="ui-grid-d"><div class="ui-block-a">
<?php if($_SESSION[tn]==PRC){echo 'popup按钮长度[%]';}else if($_SESSION[tn]==EN){echo 'popup button length[%]';}else{echo 'popup按鈕長度[%]';}?>
<input type="number" name="length" placeholder=""  value="<?php echo htmlspecialchars($lengthvlu)?>">
</div><div class="ui-block-b">
<?php if($_SESSION[tn]==PRC){echo '按钮背景';}else if($_SESSION[tn]==EN){echo 'Button background';}else{echo '按鈕背景';}?>
<input name="imgbg" type="text" value="<?php echo htmlspecialchars($imgbgvlu)?>">
</div>	<div class="ui-block-c">
&nbsp;<br><label for='btn'><?php if($_SESSION[tn]==PRC){echo '按钮型式';}else if($_SESSION[tn]==EN){echo 'Button style';}else{echo '按鈕型式';}?><input type="checkbox" name="btn" id="btn" value="1" <?php if($btnvlu)echo 'checked="checked"'?>></label>
</div><div class="ui-block-d">
	<?php if($_SESSION[tn]==PRC){echo '按钮符号';}else if($_SESSION[tn]==EN){echo 'Button icon';}else{echo '按鈕符號';}?>
<input name="uiicon" type="text" value="<?php echo htmlspecialchars($uiiconvlu)?>">
</div><div class="ui-block-e">
&nbsp;<br><label for='btn'><?php if($_SESSION[tn]==PRC){echo '大框';}else if($_SESSION[tn]==EN){echo 'Enlarge';}else{echo '大框';}?><input type="checkbox" name="fit" id="fit" value="1" <?php if($fitnvlu)echo 'checked="checked"'?>></label>
</div></div>
<?php if($_SESSION[tn]==PRC){echo '此段內容背景';}else if($_SESSION[tn]==EN){echo 'Content background';}else{echo '此段內容背景';}?>
<input name="bg" type="text" value="<?php echo htmlspecialchars($bgvlu)?>">

	<input type="hidden" name="guanyin1" value="<?php if(!$_POST[guanyin1])$_SESSION[guanyin1]=rand();
	echo htmlspecialchars($_SESSION[guanyin1]); ?>">
	
	<div class="ui-grid-d"><div class="ui-block-a">
	<input type="submit" name="submit" id="webxlsbtn" class="ui-btn" value="<?php if($_SESSION[tn]==PRC){echo '送交';}else if($_SESSION[tn]==EN){echo 'SEND';}else{echo '送交';}?>"></div><div class="ui-block-b"></div><div class="ui-block-c"></div>
	<div class="ui-block-d">
	<a href="#inf" data-rel="popup" data-transition="pop" class="ui-btn ui-btn-b ui-btn-inline ui-corner-all ui-mini">? <?php if($_SESSION[tn]==PRC){echo '解释';}else if($_SESSION[tn]==EN){echo 'Explanation';}else{echo '解釋';}?></a>
	<div data-role="popup" id="inf" style="min-width:300px;max-width:85%" data-position-to="window" data-theme="f"><a href="#" class="ui-btn ui-corner-all ui-icon-delete ui-btn-icon-notext ui-btn-right" data-rel="back"></a>
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '視频档URL';}else if($_SESSION[tn]==EN){echo 'Video FILE URL';}else{echo '視頻檔URL';}?>/<?php if($_SESSION[tn]==PRC){echo '应用页。';}else if($_SESSION[tn]==EN){echo 'APP page.';}else{echo '應用頁。';}?></b>
	<?php if($_SESSION[tn]==PRC){echo '只能用存於特定互联网应用的视频。';}else if($_SESSION[tn]==EN){echo 'You can use Internet video only.';}else{echo '只能用存於特定互聯網應用的視頻。';}?> e.g. http://player.vimeo.com/video/103609656</p>
	<p><?php if($_SESSION[tn]==PRC){echo '您亦能填上应用页。';}else if($_SESSION[tn]==EN){echo 'You can also fill in APP page.';}else{echo '您亦能填上應用頁。';}?> e.g. 1.html</p>
	<p><?php if($_SESSION[tn]==PRC){echo '若应用内需很多个视频档案,您应使用此软件另一些功能,即\'Popup相片格\'或\'选项按钮\'功能,能创建含开启popup按钮,popup内容是视频。';}else if($_SESSION[tn]==EN){echo 'If your APP design contains many Internet video files, you need to use the \'Popup Photo Grid\' function or \'Option button\' function in this software to open them by popup dynamically. The popup contains Internet video file.';}else{echo '若應用內需很多個視頻檔案,您應使用此軟件另一些功能,即\'Popup相片格\'或\'選項按鈕\'功能,能創建含開啟popup按鈕,popup內容是視頻。';}?></p>
	<hr>
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '属AJAX数据URL';}else if($_SESSION[tn]==EN){echo 'AJAX Data URL';}else{echo '屬AJAX數據URL';}?></b>
	<?php if($_SESSION[tn]==PRC){echo '选用此项是在视频档URL填上特定json格式的互联网数据,包括标题及视频档URL。参考本司网站。';}else if($_SESSION[tn]==EN){echo 'You can add the data url instead of Video FILE URL. The content in the Internet data url includes video file url and its title. Please refer to our website.';}else{echo '選用此項是在視頻檔URL填上特定json格式的互聯網數據,包括標題及視頻檔URL。參考本司網站。';}?> </p>
	<p><?php //if($pn and !$tl)echo 'nbr:'.$pj.$ap.'pVideo'.$pn ?></p>
	<hr>
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '标题';}else if($_SESSION[tn]==EN){echo 'Title';}else{echo '標題';}?></b>
	<?php if($_SESSION[tn]==PRC){echo '视频上的标题或popup按钮的标题。若使用互联网数据,不用填。';}else if($_SESSION[tn]==EN){echo 'It is above the video or as popup button title. If you use the Internet data, you do not need to fill in this item.';}else{echo '視頻上的標題或popup按鈕的標題。若使用互聯網數據,不用填。';}?></p>
	<hr>
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '文字显示';}else if($_SESSION[tn]==EN){echo 'All texts show';}else{echo '文字顯示';}?></b>
	<?php if($_SESSION[tn]==PRC){echo '您应将浏览器调至移动设备尺寸浏览您的设计。点选代表在popup按钮内键入的文字不限高度全部显示。';}else if($_SESSION[tn]==EN){echo 'All text will be showed on the button. You need to resize your browser as mobile phone to view the difference.';}else{echo '您應將瀏覽器調至移動設備尺寸瀏覽您的設計。點選代表在popup按鈕內鍵入的文字不限高度全部顯示。';}?></p>	<hr>

	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '标题颜色';}else if($_SESSION[tn]==EN){echo 'Title color';}else{echo '標題顏色';}?></b>
	<?php if($_SESSION[tn]==PRC){echo '填写html颜色码e.g. #123456。';}else if($_SESSION[tn]==EN){echo 'You can enter html color code e.g. #123456.';}else{echo '填寫html顏色碼e.g. #123456。';}?></p>
	
	<hr>
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo 'popup按钮长度[%]';}else if($_SESSION[tn]==EN){echo 'popup button length[%]';}else{echo 'popup按鈕長度[%]';}?></b>
	<?php if($_SESSION[tn]==PRC){echo '按钮相对用户浏览设备阔度的长度百分比,填整数。e.g.50。';}else if($_SESSION[tn]==EN){echo 'It is the popup button length relating to screen width of APP user\'s device. You need to enter integer.e.g.50';}else{echo '按鈕相對用戶瀏覽設備闊度的長度百分比,填整數。e.g.50';}?></p>
	<hr>
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '按钮型式';}else if($_SESSION[tn]==EN){echo 'Button style';}else{echo '按鈕型式';}?></b>
	<?php if($_SESSION[tn]==PRC){echo '按点选代表使用popup按钮型式。视频是显示在POPUP的内容上。';}else if($_SESSION[tn]==EN){echo 'You need to tick it if you want to use popup button style. Your video is showed on the popup.';}else{echo '點選代表使用popup按鈕型式。視頻是顯示在POPUP的內容上。';}?></p>
	<hr>
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '按钮符号';}else if($_SESSION[tn]==EN){echo 'Button icon';}else{echo '按鈕符號';}?></b>
	<?php if($_SESSION[tn]==PRC){echo '修改按钮符号。格式是特定版本的JQUERY MOBILE的ui-icon-???。';}else if($_SESSION[tn]==EN){echo 'You can alter the button icon which is the icon format of specific version of JQUERY MOBILE(ui-icon-???).';}else{echo '修改按鈕符號。格式是特定版本的JQUERY MOBILE的ui-icon-???。';}?></p>
	<hr>
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '大框';}else if($_SESSION[tn]==EN){echo 'Enlarge';}else{echo '大框';}?></b>
	<?php if($_SESSION[tn]==PRC){echo '关于按钮型式的popup内容框尺寸。限於合用设备。';}else if($_SESSION[tn]==EN){echo 'It is about the popup content size of Button style. It is for appropriate device only.';}else{echo '關於按鈕型式的popup內容框尺寸。限於合用設備。';}?></p>
	<hr>
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '此段內容背景';}else if($_SESSION[tn]==EN){echo 'Content background';}else{echo '此段內容背景';}?>
/<?php if($_SESSION[tn]==PRC){echo '按钮背景';}else if($_SESSION[tn]==EN){echo 'Button background';}else{echo '按鈕背景';}?>
</b>
	
	<?php if($_SESSION[tn]==PRC){echo '若设置背景图像上下左右重覆显示,在档案名加[xy]。e.g. picture[xy].png';}else if($_SESSION[tn]==EN){echo 'If you add [xy] to the picture file name (e.g. picture[xy].png, the picture will be repeated both vertically and horizontally.';}else{echo '若設置背景圖像上下左右重覆顯示,在檔案名加[xy]。e.g. picture[xy].png';}?>
	</p>
	<p>
	<?php if($_SESSION[tn]==PRC){echo '若将此图像档案置於此软件内,是放在';}else if($_SESSION[tn]==EN){echo 'You may need to place this file to this software folder ';}else{echo '若將此圖像檔案置於此軟件內,是放在';}echo 'panel/'.$roww[pjnbr].'/images/.';?>
	</p>
	<p>
	<?php if($_SESSION[tn]==PRC){echo '您亦能在背景图像填上rgb颜色码e.g. rgb(125,125,125), rgba颜色码e.g. rgba(125,125,125,0.5) 或 hex颜色码e.g. #123456代替背景图像。';}else if($_SESSION[tn]==EN){echo 'You can add rgb color code e.g. rgb(125,125,125), rgba color code e.g. rgba(125,125,125,0.5) or hex color code e.g. #123456 instead of background picture.';}else{echo '您亦能在背景圖像填上rgb顏色碼e.g. rgb(125,125,125), rgba顏色碼e.g. rgba(125,125,125,0.5) 或 hex顏色碼e.g. #123456代替背景圖像。';}?>
	</p>
	<HR>
	<p><b style="color:pink"><?php if($_SESSION[tn]==PRC){echo '相似功能 - 调用APP功能';}else if($_SESSION[tn]==EN){echo 'Alternative Function - OPEN APP';}else{echo '相似功能 - 調用APP功能';}?></b> 
		<?php if($_SESSION[tn]==PRC){echo '您能改用\'项目列表\'或\'选项按钮\'等相关popup的功能,用户点撀相关按钮开启用户设备内合适的应用开启特定视频档案。 [音频档案是公开的]';}else if($_SESSION[tn]==EN){echo 'You can use popup button function in the \'Listview\' or the \'Option button\' function or similar function to open specific Internet/Intranet video file by appropriate APP in APP user\'s appropriate device. [Video file is open to public.]';}else{echo '您能改用\'項目列表\'或\'選項按鈕\'等相關popup的功能,用戶點撀相關按鈕開啟用戶設備內合適的應用開啟特定視頻檔案。 [視頻檔案是公開的]';}?></p>
	</div>
	
	</div>
	
	</div>
	</FORM>
	<hr>
	<script src="../js/appsystem.js"></script>	
	<?php 
	if($video){
	if($_SESSION[tn]==PRC){echo '您的设计';}else if($_SESSION[tn]==EN){echo 'Your design';}else{echo '您的設計';}
	$nvideo = str_replace('(images/','(../panel/'.$roww[pjnbr].'/images/',$video);
	echo '<br>'.str_replace('"images/','"../panel/'.$roww[pjnbr].'/images/',$nvideo);
		
if(file_exists('../panel/'.$roww[pjnbr].'/web'.$ap.'.js')){
	$jswebn = file_get_contents('../panel/'.$roww[pjnbr].'/web'.$ap.'.js');
	$jswebn = explode('/*webjs'.$pn.'*/',$jswebn);
	echo '<script>localStorage.clear();'.$jswebn[1].'</script>';
;}
	}?>
	<hr>

	<?php if($_SESSION[tn]==PRC){echo '例';}else if($_SESSION[tn]==EN){echo 'Example';}else{echo '例';}?> <br>
	<a class="ui-btn ui-btn-w ui-btn-inline ui-icon-video ui-btn-icon-left" href="#popupVideo" data-rel="popup" data-position-to="window"><?php if($_SESSION[tn]==PRC){echo '标题';}else if($_SESSION[tn]==EN){echo 'Title';}else{echo '標題';}?></a>
<div class="ui-content" id="popupVideo" data-role="popup" data-theme="x"  data-corners="false" data-tolerance="15,15">
    <iframe width="498" height="298" src="http://player.vimeo.com/video/103609655?portrait=0" seamless=""></iframe>
</div>

			<br><br>
		<?php if($_SESSION[tn]==PRC){echo '例';}else if($_SESSION[tn]==EN){echo 'Example';}else{echo '例';}?> <br>	<?php if($_SESSION[tn]==PRC){echo '标题';}else if($_SESSION[tn]==EN){echo 'Title';}else{echo '標題';}?>

	<div class="ui-grid-solo ui-content" id="Video">
    <iframe width="498" height="298" src="" seamless=""></iframe>
	</div>		
	


	
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
<script>
video('Video','http://player.vimeo.com/video/103609655?portrait=0','');
</script>
<?php 
$tdy=0;
$tdy=date('Y-m-d');
if($_POST['video'] and $pj and $_SESSION[guanyin1] and $_SESSION[guanyin1]==$_POST[guanyin1]){

	if($ap and !preg_match('/^[0-9]*$/', $ap))exit;
	if($pj and !preg_match('/^[0-9]*$/', $pj))exit;	
	if($pn and !preg_match('/^[0-9]*$/', $pn))exit;	
		
			if($_POST[imgbg]){
			$bgtheme = 'z';
			if(strpos($_POST[imgbg],'http://')!==false or strpos($_POST[imgbg],'https://')!==false){$images = '';}else{$images = 'images/';}
			if(strlen($_POST[imgbg])==1){$bghtml = '';$bgtheme = htmlspecialchars($_POST[imgbg]);}		
			else if(strpos($_POST[imgbg],'#')!==false or strpos($_POST[imgbg],'rgba(')!==false  or strpos($_POST[imgbg],'rgb(')!==false){$bghtml = 'background-color:'.htmlspecialchars($_POST[imgbg]).';';$bgtheme = 'x';}
			else if(strpos($_POST[imgbg],'[xy]')!==false){$bghtml = 'background-image:url('.$images.htmlspecialchars($_POST[imgbg]).');';$bgtheme = 'x';}
			else{$bghtml = 'background-image:url('.$images.htmlspecialchars($_POST[imgbg]).');background-size:100%;background-repeat:repeat-y;';}
			;}else{$bghtml = '';$bgtheme = 'x';}

			$popup .= '<!--data'.htmlspecialchars($_POST[fit]).'@#@'.htmlspecialchars($_POST[video]).'@#@'.htmlspecialchars($_POST[title]).'@#@'.htmlspecialchars($_POST[wsp]).'@#@'.htmlspecialchars($_POST[length]).'@#@'.htmlspecialchars($_POST[imgbg]).'@#@'.htmlspecialchars($_POST[btn]).'@#@'.htmlspecialchars($_POST[bg]).'@#@'.htmlspecialchars($_POST[tclr]).'@#@'.htmlspecialchars($_POST[tj]).'@#@'.htmlspecialchars($_POST[uiicon]).'data!-->';

			if($_POST['wsp'])$wsp = 'white-space:normal;';
			if($_POST['length'])$width = 'width:'.htmlspecialchars($_POST['length']).'%;';
			if($_POST['tclr'])$tclr = 'color:'.htmlspecialchars($_POST['tclr']).';';
			if($_POST['tj'])$tj = ' id="'.$pj.$ap.'pVideo'.$pn.'title"';
			if($_POST['uiicon']){$uiicon = htmlspecialchars($_POST[uiicon]);}else{$uiicon = 'ui-icon-video';}
			
			$vhtml='<a href="#" data-rel="back" style="position:absolute;top:2%;right:1.2em;index-z:2;" class="ui-btn ui-btn-z ui-btn-icon-notext ui-icon-delete"></a>';
	
			if($_POST['btn']){
				if($_POST['length'] > 95)$popup .= '<div class="ui-grid-solo">';if($_POST['length'] > 95)$lengths = '</div>';
				if($_POST[fit]){
				if($bghtml or $wsp or $width)$style = 'style="'.$bghtml.$wsp.$width.'"';
				if($tclr)$tclrstyle = ' style="'.$tclr.'"';
				$popup .= '<div style="padding-left:5px;padding-right:5px;"><a class="ui-btn ui-btn-'.$bgtheme.' ui-btn-inline '.$uiicon.' ui-btn-icon-left"  '.$style.' href="#'.$pj.$ap.'pVideo'.$pn.'" data-corners="false" data-rel="popup" data-position-to="window"><span'.$tclrstyle.$tj.'>'.htmlspecialchars($_POST[title]).'</span></a></div>'.$lengths.'<div class="ui-content" id="'.$pj.$ap.'pVideo'.$pn.'" data-corners="false" data-role="popup" data-theme="x" data-tolerance="15,15">'.$vhtml.'<iframe width="498" height="298" src="" seamless=""></iframe></div>';
				;}else{
				if($bghtml or $wsp or $width)$style = 'style="'.$bghtml.$wsp.$width.'"';
				if($tclr)$tclrstyle = 'style="'.$tclr.'"';
				if($_POST['tj']){$dataurl = 'id="'.$pj.$ap.'pVideo'.$pn.'tj" data-url=""';}else{$dataurl = 'data-url="'.htmlspecialchars(trim($_POST[video])).'"';}
				$popup .= '<div style="padding-left:5px;padding-right:5px;"><a class="imgspop ui-btn ui-btn-'.$bgtheme.' ui-btn-inline '.$uiicon.' ui-btn-icon-left" '.$style.' href="#" data-corners="false" data-pop="'.$pj.$ap.'" '.$dataurl.'><span'.$tclrstyle.$tj.'>'.htmlspecialchars($_POST[title]).'</span></a></div>';				
				;}
			}else{
				$popup .= '<div '.$tj.'  style="padding-left:5px;padding-right:5px;'.$bghtml.$tclr.'">'.htmlspecialchars($_POST[title]).'</div><div class="ui-grid-solo ui-content" id="'.$pj.$ap.'pVideo'.$pn.'"><iframe width="498" height="298" src="" seamless=""></iframe></div>';		
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
			
			if($tl){$html = file_get_contents('../panel/'.$roww[pjnbr].'/'.$ap.'.html');$htmls = '';}

			$bghtml='';
			if($_POST[bg]){$_POST[bg]=str_replace('/','',$_POST[bg]);
			$_POST[bg]=str_replace('\\','',$_POST[bg]);
			$_POST[bg]=str_replace('..','',$_POST[bg]);}
			
			if(strpos($_POST[bg],'http://')!==false or strpos($_POST[bg],'https://')!==false){$images = '';}else{$images = 'images/';}
			
			if(strpos($_POST[bg],'#')!==false or strpos($_POST[bg],'rgba(')!==false  or strpos($_POST[bg],'rgb(')!==false){
			$bghtml = 'background-color:'.htmlspecialchars($_POST[bg]).';';}
			else if(strpos($_POST[bg],'[xy]')!==false){$bghtml = 'background-image:url('.$images.htmlspecialchars($_POST[bg]).');';}
			else{$bghtml = 'background-image:url('.$images.htmlspecialchars($_POST[bg]).');background-size:100%;background-repeat:repeat-y;';}
			
			if($_POST[bg]){
			$bghtml = '<div class="ui-grid-solo" style="'.$bghtml.'"><!--videobg!-->';
			$bghtmls = '<!--videobg!--></div>';
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
				
			$webpopup .= $html.'<!--part'.$pn.'!--><!--sysvideosys!-->'.$vnts.$bghtml.$popup.$bghtmls.$vntsn.$tabnbgdatns.$htmls;
			$webpopup .= '</div><!--content!--></div><!--page!-->';
			
		 	
			
			$fpagtrns='../panel/'.$roww[pjnbr].'/'.$ap.'.html';
			file_put_contents($fpagtrns,$html.'<!--part'.$pn.'!--><!--sysvideosys!-->'.$vnts.$bghtml.$popup.$bghtmls.$vntsn.$tabnbgdatns.$htmls);

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
				if($_POST[fit]){
					if($_POST[tj]){
						$js .= 'popupvideo("'.$pj.$ap.'","'.$pn.'","'.$pj.$ap.'pVideo'.$pn.'","'.htmlspecialchars($_POST[video]).'","'.htmlspecialchars($_POST[tj]).'","'.htmlspecialchars($_POST[fit]).'","'.htmlspecialchars($_POST[btn]).'");';
					;}else{
						$js .= '/*ajax'.$ap.'ajax*/popupvideo("'.$pj.$ap.'","'.$pn.'","'.$pj.$ap.'pVideo'.$pn.'","'.htmlspecialchars($_POST[video]).'","","'.htmlspecialchars($_POST[fit]).'","'.htmlspecialchars($_POST[btn]).'");/*ajaxs*/';
					;}
				;}else{
						if($_POST[tj]){
							$js .= '/*ajax'.$ap.'ajax*/video("'.$pj.$ap.'pVideo'.$pn.'","'.htmlspecialchars($_POST[video]).'","'.htmlspecialchars($_POST[tj]).'","'.htmlspecialchars($_POST[btn]).'");/*ajaxs*/';
						;}else{
							$js .= 'video("'.$pj.$ap.'pVideo'.$pn.'","'.htmlspecialchars($_POST[video]).'","","'.htmlspecialchars($_POST[btn]).'");';
						;}
				;}
				$js .= '/*webjs'.$pn.'*/'
				.'/*});*/';
				$jsweb=str_replace('/*});*/',$js,$jsweb);
				file_put_contents('../panel/'.$roww[pjnbr].'/web'.$ap.'.js',$jsweb);
				
	
	echo "<meta http-equiv='refresh' content='0;URL=video.php?ap=".htmlspecialchars($roww[ap])."&pj=".htmlspecialchars($roww[pjnbr])."&pn=".htmlspecialchars($pn)."'>";
;}

?>
