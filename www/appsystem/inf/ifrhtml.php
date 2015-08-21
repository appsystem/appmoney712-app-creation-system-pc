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
    <title><?php if($_SESSION[tn]==PRC){echo 'Page iframe嵌入网页 - AppMoney712 移动应用设计系统';}else if($_SESSION[tn]==EN){echo 'Page iframe[web page] - AppMoney712 APP Creation System';}else{echo 'Page iframe嵌入網頁 - AppMoney712 移動應用設計系統';}?></title>
	<link href="../css/jquery.mobile-1.4.4.min.css" rel="stylesheet">
	<link href="../css/jquerymobile-1.4.4.min.css" rel="stylesheet">
	<link rel="stylesheet" href="../css/appsystem.css"><link href="../css/icons/style.css" rel="stylesheet">
	<style type="text/css">
	</style>
	<script src="../js/jquery.js"></script>
	<script src="../js/jquery.mobile-1.4.4.min.js"></script>
	<script>
	function checkform ( form )
	{

	}
	</script>


</head>
<body>

<div data-role="page" data-theme="f" class="page">
	<div style="overflow: hidden;" data-role="header" data-theme="f">
	<a href="#navigations"  id="menubttn"  data-rel="popup" data-transition="pop" class="ui-btn ui-btn ui-btn-inline ui-corner-all ui-btn-icon-left ui-icon-bars"><?php if($_SESSION[tn]==PRC){echo '目录';}else if($_SESSION[tn]==EN){echo 'Menu';}else{echo '目錄';}?></a>
    <h1><?php if($_SESSION[tn]==PRC){echo 'Page iframe嵌入网页 - AppMoney712 移动应用设计系统';}else if($_SESSION[tn]==EN){echo 'Page iframe[web page] - AppMoney712 APP Creation System';}else{echo 'Page iframe嵌入網頁 - AppMoney712 移動應用設計系統';}?></h1>
	
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
	
		
	<a href="menudesign.php?pj=<?php echo htmlspecialchars($roww[pjnbr])?>&ap=<?php echo $ap?>&pn=<?php echo $pn?>&php=ifrhtml&plt=1" data-ajax="false" class="ui-btn ui-btn ui-btn-inline ui-corner-all ui-mini ui-btn-icon-left ui-icon-bars"><?php if($_SESSION[tn]==PRC){echo '专案应用页列表';}else if($_SESSION[tn]==EN){echo 'Project Page List';}else{echo '專案應用頁列表';}?></a>
	<?php ;}?>
	
	
	<a href="#try" data-rel="popup" data-transition="pop" class="ui-btn ui-btn-f ui-btn-inline ui-corner-all ui-mini" style="color:BLACK"><span class="pigss-pencil" style="color:red"></span><?php if($_SESSION[tn]==PRC){echo '快速试用';}else if($_SESSION[tn]==EN){echo 'Quick try';}else{echo '快速試用';}?></a>
		<div data-role="popup" id="try" data-position-to="window" data-theme="f" class="ifrwidth"><a href="#" data-rel="back" class="popn ui-btn ui-btn-z ui-btn-icon-notext ui-icon-delete"></a><BR><BR>
		<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '预备相片';}else if($_SESSION[tn]==EN){echo 'Photo preparation';}else{echo '預備相片';}?></b> &nbsp;<?php if($_SESSION[tn]==PRC){echo '您须预备二张相片[横向]并存於panel/'.$roww[pjnbr].'/images。';}else if($_SESSION[tn]==EN){echo 'You need to prepare two landscape photos and place them to the folder panel/'.$roww[pjnbr].'/images.';}else{echo '您須預備二張相片[橫向]並存於panel/'.$roww[pjnbr].'/images。';}?></p>	
		<p><?php if($_SESSION[tn]==PRC){echo '此项亦能嵌入应用页。';}else if($_SESSION[tn]==EN){echo 'You can embed an APP page into the iframe.';}else{echo '此項亦能嵌入應用頁。';}?></p>	
		<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '项目填写';}else if($_SESSION[tn]==EN){echo 'Item information';}else{echo '項目填寫';}?></b> &nbsp;<?php if($_SESSION[tn]==PRC){echo '在\'应用页URL\'填写首张相片档名,在\'放大按钮URL \'另一相片档名并提送。';}else if($_SESSION[tn]==EN){echo 'You need to enter photo filename to APP page URL and Enlarging button URL and then click the SEND button.';}else{echo '在\'應用頁URL\'填寫首張相片檔名,在\'放大按鈕URL \'另一相片檔名並提送。';}?></p>	
		<HR>
		<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '试用';}else if($_SESSION[tn]==EN){echo 'Testing';}else{echo '試用';}?></b> &nbsp;
	<?php if($_SESSION[tn]==PRC){echo '您须点撀此页上的预览,再进行测试。再修改及选用不同设置再预览并试用。';}else if($_SESSION[tn]==EN){echo 'You need to click the above preview button to test your design. You can enter or select different parameters to test their functions and effects.';}else{echo '您須點撀此頁上的預覽,再進行測試。再修改及選用不同設置再預覽並試用。';}?></p>	
		
		</div>
	
	<?php if($tl)$tln = '&tl='.$tl;?>
	
	<FORM action="ifrhtml.php?pj=<?php echo htmlspecialchars($roww[pjnbr]) ?>&ap=<?php echo htmlspecialchars($roww[ap]) ?>&pn=<?php echo htmlspecialchars($pn).$tln ?>" id="webxls" method="post" data-ajax="false"   onSubmit="return checkform(this);">
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
					if(strpos('<!--part'.$htm[$i],$pntag)===false and !$ifrhtml){$html .= '<!--part'.$htm[$i];}
					else if(strpos('<!--part'.$htm[$i],$pntag)!==false){$ifrhtml  = str_replace($pntag,'','<!--part'.$htm[$i]);}
					else{$htmls .= '<!--part'.$htm[$i];}
				;}
			$tabnbgdata = explode('<!--data-tabnbg',$ifrhtml);
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
				
			$ifrhtml  = str_replace('<div class="swiper-slide"><div id="'.$pj.$ap.'vnts'.$pn.'" class="vntsns vtnn">','',$ifrhtml);	
			$ifrhtml  = str_replace('<!--data-tabnbg'.$tabnbgdatn[0].'data-tabnbg!-->','',$ifrhtml);
			;}						
				$ifrhtml  = str_replace('</div></div><!--vnts!-->','',$ifrhtml);
				
				
			$tbgnvlu = explode('<!--data',$ifrhtml);
			$tbgsvlu = explode('data!-->',$tbgnvlu[1]);
			$tbgvlu = explode('@#@',$tbgsvlu[0]);

			$weburlvlu = $tbgvlu[0];	
			$weburlsvlu = $tbgvlu[1];			
			$titlevlu = $tbgvlu[2];
			$clrvlu = $tbgvlu[3];
			$hgtvlu = $tbgvlu[4];
			;} 
	?>
	<?php if($_SESSION[tn]==PRC){echo '应用页';}else if($_SESSION[tn]==EN){echo 'APP page URL';}else{echo '應用頁URL';}?>
	
	<input type="text" name="weburl" placeholder=""  value="<?php echo htmlspecialchars($weburlvlu)?>" required>
	
	<?php if($_SESSION[tn]==PRC){echo '放大按钮URL';}else if($_SESSION[tn]==EN){echo 'Enlarging button URL';}else{echo '放大按鈕URL';}?>
	
	<input type="text" name="weburls" placeholder=""  value="<?php echo htmlspecialchars($weburlsvlu)?>">
	
<div class="ui-grid-d"><div class="ui-block-a">
<?php if($_SESSION[tn]==PRC){echo '框架限高%';}else if($_SESSION[tn]==EN){echo 'iframe height %';}else{echo '框架限高%';}?>
<input name="hgt" type="number" value="<?php if($hgtvlu){echo htmlspecialchars($hgtvlu);}else{echo 100;}?>">
</div><div class="ui-block-b">
<?php if($_SESSION[tn]==PRC){echo '放大按钮标题';}else if($_SESSION[tn]==EN){echo 'Enlarging button title';}else{echo '放大按鈕標題';}?>
<input name="title" type="text" value="<?php echo htmlspecialchars($titlevlu);?>">
</div><div class="ui-block-c">

<?php if($_SESSION[tn]==PRC){echo '放大按钮颜色';}else if($_SESSION[tn]==EN){echo 'Enlarging button color';}else{echo '放大按鈕顏色';}?>
<input name="clr" type="text" value="<?php echo htmlspecialchars($clrvlu);?>">
</div>	</div>
	<input type="hidden" name="guanyin1" value="<?php if(!$_POST[guanyin1])$_SESSION[guanyin1]=rand();
	echo htmlspecialchars($_SESSION[guanyin1]); ?>">
	
	<div class="ui-grid-d"><div class="ui-block-a">
	<input type="submit" name="submit" id="webxlsbtn" class="ui-btn" value="<?php if($_SESSION[tn]==PRC){echo '送交';}else if($_SESSION[tn]==EN){echo 'SEND';}else{echo '送交';}?>"></div><div class="ui-block-b"></div><div class="ui-block-c"></div>
	<div class="ui-block-d">
	<a href="#inf" data-rel="popup" data-transition="pop" class="ui-btn ui-btn-b ui-btn-inline ui-corner-all ui-mini">? <?php if($_SESSION[tn]==PRC){echo '解释';}else if($_SESSION[tn]==EN){echo 'Explanation';}else{echo '解釋';}?></a>
	<div data-role="popup" id="inf" style="min-width:300px;max-width:85%" data-position-to="window" data-theme="f"><a href="#" class="ui-btn ui-corner-all ui-icon-delete ui-btn-icon-notext ui-btn-right" data-rel="back"></a>

	<h4 style="color:black"><?php if($_SESSION[tn]==PRC){echo 'Page iframe嵌入网页';}else if($_SESSION[tn]==EN){echo 'Page iframe[web page]';}else{echo 'Page iframe嵌入網頁';}?></h4>
	<p><?php if($_SESSION[tn]==PRC){echo '是在框架嵌入应用页丶图像丶特定互联视频或网页。对用作嵌入内容的应用页,在在此软件设定时,应选用\'应用页[不设panel菜单]。\'若许可,您亦能嵌入互联网页,e.g.地图。';}else if($_SESSION[tn]==EN){echo 'This function is to embed an APP page, photo, specific Internet video or web page into a iframe. For the content of APP page or your own web page, it could be better to use the page style - APP page[no panel] on this page design in this software. ';}else{echo '是在框架嵌入應用頁、圖像、特定互聯視頻或網頁。對用作嵌入內容的應用頁,在此軟件設定時,應選用\'應用頁[不設panel菜單]。\'若許可,您亦能嵌入互聯網頁,e.g.地圖。';}?></p>
	<p><?php if(!$roww[pjnbr])$roww[pjnbr] = '?';
	if($_SESSION[tn]==PRC){echo '若使用应用内图像并将档案存於panel/'.$roww[pjnbr].'/images档夹内,键入images/加档名,e.g. images/picture.png。';}else if($_SESSION[tn]==EN){echo 'If you want to add APP picture to the iframe and place it in panel/'.$roww[pjnbr].'/images folder, you need to enter images/filename of picture, e.g. images/picture.png.';}else{echo '若使用應用內圖像並將檔案存於panel/'.$roww[pjnbr].'/images檔夾內,鍵入images/加檔名,e.g. images/picture.png。';}?></p>
	<p><?php if(!$roww[pjnbr])$roww[pjnbr] = '?';
	if($_SESSION[tn]==PRC){echo '若嵌入互联网页,只能在生成应用才能测试,在电脑浏览器是不能测试的。';}else if($_SESSION[tn]==EN){echo 'If you want to embed an Internet web page, you can only test it on APP status[not in your computer browser].';}else{echo '若嵌入互聯網頁,只能在生成應用才能測試,在電腦瀏覽器是不能測試的。';}?></p>
	<p>
	<?php if($_SESSION[tn]==PRC){echo '对於一些互联网,e.g. Google web pages或大档案的网页,您只能改用按钮功能。';}else if($_SESSION[tn]==EN){echo 'For some Internet web pages such as Google web pages or large size page, you can only use the functions containing popup button function to open them by popup, browser or appropriate APP in APP user\'s device.';}else{echo '對於一些互聯網,e.g. Google web pages或大檔案的網頁,您只能改用按鈕功能。';}?><?php if($_SESSION[tn]==PRC){echo '您能试用geo:的格式链结。';}else if($_SESSION[tn]==EN){echo 'You can try to edit web link of geo: format.';}else{echo '您能試用geo:的格式鏈結。';}?>
	</p>
	
	<hr>
	<h4 style="color:black"><?php if($_SESSION[tn]==PRC){echo '放大按钮URL';}else if($_SESSION[tn]==EN){echo 'Enlarging button URL';}else{echo '放大按鈕URL';}?></h4>
	<p><?php if($_SESSION[tn]==PRC){echo '若设置内嵌区域不高,您能在区域右上方加放大按钮,您能填上同上的URL或另填应用页丶图像丶特定互联视频或网页。您须键入此值才能启用此按钮。';}else if($_SESSION[tn]==EN){echo 'You can add an enlarging button at the top right corner of iframe if the height of iframe is short. You can enter the above same url or APP page, photo, specific Internet video or web page. You need to enter this value to enable this value.';}else{echo '若設置內嵌區域不高,您能在區域右上方加放大按鈕,您能填上同上的URL或另填應用頁、圖像、特定互聯視頻或網頁。您須鍵入此值才能啟用此按鈕。';}?>
	</p>
	<h4 style="color:black"><?php if($_SESSION[tn]==PRC){echo '放大按钮标题';}else if($_SESSION[tn]==EN){echo 'Enlarging button title';}else{echo '放大按鈕標題';}?></h4>
	<p><?php if($_SESSION[tn]==PRC){echo '您能键入放大按钮标题。';}else if($_SESSION[tn]==EN){echo 'You can enter the button title.';}else{echo '您能鍵入放大按鈕標題。';}?>
	</p>
	<h4 style="color:black"><?php if($_SESSION[tn]==PRC){echo '放大按钮颜色';}else if($_SESSION[tn]==EN){echo 'Enlarging button color';}else{echo '放大按鈕顏色';}?></h4>
	<p><?php if($_SESSION[tn]==PRC){echo '您能填上rgb颜色码e.g. rgb(125,125,125), rgba颜色码e.g. rgba(125,125,125,0.5) 或 hex颜色码e.g. #123456。';}else if($_SESSION[tn]==EN){echo 'You can add rgb color code e.g. rgb(125,125,125), rgba color code e.g. rgba(125,125,125,0.5) or hex color code e.g. #123456.';}else{echo '您能填上rgb顏色碼e.g. rgb(125,125,125), rgba顏色碼e.g. rgba(125,125,125,0.5) 或 hex顏色碼e.g. #123456。';}?>
	</p>
	<hr>
	
<h4 style="color:black"><?php if($_SESSION[tn]==PRC){echo '框架限高%';}else if($_SESSION[tn]==EN){echo 'iframe height %';}else{echo '框架限高%';}?></h4>
	<p>
	<?php if($_SESSION[tn]==PRC){echo '框架高度/用户浏览设备屏幕高度的百分比,填整数。应用能按用户的浏览设备屏幕高度定出内容框高度。';}else if($_SESSION[tn]==EN){echo 'It is about the ratio percentage of iframe height and APP user device\'s screen [viewport] height. You need to fill in an integer value. The iframe height can be calculated by your APP based on APP user device\'s screen [viewport] height.';}else{echo '框架高度/用戶瀏覽設備屏幕高度的百分比,填整數。應用能按用戶的瀏覽設備屏幕高度定出內容框高度。';}?>
	</p>
	
	</div>
	
	</div>
	
	</div>
	</FORM>
	<hr>
	<?php 
	if($ifrhtml){
	if($_SESSION[tn]==PRC){echo '您的设计';}else if($_SESSION[tn]==EN){echo 'Your design';}else{echo '您的設計';}
	echo '<br>'.$ifrhtml;}
	if(file_exists('../panel/'.$roww[pjnbr].'/web'.$ap.'.js')){
	$jswebn = file_get_contents('../panel/'.$roww[pjnbr].'/web'.$ap.'.js');
	$jswebn=explode('/*webjs'.$pn.'*/',$jswebn);
	echo '<script> $(document).on("pageshow", ".page", function(){'.$jswebn[1].';});</script>';
   ;}
	?>
	<hr>
<?php if($_SESSION[tn]==PRC){echo '例';}else if($_SESSION[tn]==EN){echo 'Example';}else{echo '例';}?><br>
	
<div class="ui-grid-solo hgt" id="hgt"  style="position:relative;"><a href="#15ifrspop" data-rel="popup" data-position-to="window" class="popn ui-btn ui-btn-w ui-mini ui-btn-icon-left ui-icon-search">&nbsp;&nbsp;&nbsp;<?php if($_SESSION[tn]==PRC){echo '放大';}else if($_SESSION[tn]==EN){echo 'Enlarge';}else{echo '放大';}?></a><iframe class="hgt" src="tabnexample.php" style="width:100%;" seamless frameBorder="0"></iframe></div>

	<div id="15ifrspop" data-theme="z" data-role="popup" data-corners="false" style="overflow-y:auto;" class="ifrwidthpn" ><a href="#" data-rel="back" class="popn ui-btn ui-btn-z ui-btn-icon-notext ui-icon-delete"></a><iframe src="tabnexample.php" style="width:100%" seamless frameBorder="0" ></iframe><div class="ifrspinn" style="position:relative;left:50%;width:100%">Loading...<BR><img src="css/images/ajax-loader.gif"></div></div>	
	
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
	
				<div id="imgspop" data-theme="z" style="padding:5px;" data-role="popup" data-corners="false"><a href="#" data-rel="back" class="popn ui-btn ui-btn-z ui-btn-icon-notext ui-icon-delete"></a><div class="ifrspinn" style="position:relative;left:50%;width:100%">Loading...<BR><img src="css/images/ajax-loader.gif"></div><div class="imgspop"><img src=""></div></div>
		<div id="ifrspop" data-theme="z" data-role="popup" data-corners="false" style="overflow-y:auto;height:100%;width:100%;top:0;left:-15px;" class="ifrwidthpn" ><a href="#" data-rel="back" class="popn ui-btn ui-btn-z ui-btn-icon-notext ui-icon-delete"></a><div class="ifrspinn" style="position:relative;left:50%;width:100%">Loading...<BR><img src="css/images/ajax-loader.gif"></div><iframe src="" style="width:100%" seamless frameBorder="0" ></iframe></div>	
		<div class="ui-content" id="pVideo" data-corners="false" data-role="popup" data-theme="x" data-tolerance="2,2"><iframe width="498" height="298" src="" seamless=""></iframe></div><div id="pAudio" data-corners="false"  data-role="popup" data-theme="a"  style="padding:5px;height: 100%;width: 100%;top:0;left:-15px;" class="ifrwidthps"><a href="#" data-rel="back" class="popn ui-btn ui-btn-z ui-btn-icon-notext ui-icon-delete"></a><br><br><i id="audtn" ></i> &nbsp;<i id="audur"></i><br><a href="#"  id="playaudion" data-vlu="" style="border:none;" class="ui-btn ui-btn-w"><img style="width:50px" src="css/images/sound.svg"></a><BR><input id="volmn" type="range" data-role="none" value="0.8"  step="0.1" min="0" max="1"><BR><input id="toposn" type="range" data-role="none" value="0" step="0.01" min="0" max="1"><div id="volmndiv"><input id="volmnapp" type="range"  value="0.8"  step="0.1" min="0" max="1"></div><BR><div id="toposndiv"><input id="toposnapp" type="range"  value="0" step="0.01" min="0" max="1"></div><audio id="audsn"><source src="" type="audio/mpeg"><source src="" type="audio/wav"></audio><div class="ifrspinn" style="position:relative;left:50%;width:100%">Loading...<BR><img src="css/images/ajax-loader.gif"></div></div>
	</div><!-- /content -->
	</div><!-- /page -->
</body></html>
<script>
<?php if(!$hgtvlu or !preg_match('/^[0-9]*$/',$hgtvlu))$hgtvlu = 100;?>
$("iframe.hgt").height($( window ).height()*<?php echo htmlspecialchars($hgtvlu) ?>/100);
$("iframe.ifhgt<?php echo $ap.$pn ?>").height($( window ).height()*<?php echo htmlspecialchars($hgtvlu) ?>/100);

</script>
<script src="../js/appsystem.js"></script>	
<?php 
$tdy=0;
$tdy=date('Y-m-d');
if($_POST[weburl] and $pj and $_SESSION[guanyin1] and $_SESSION[guanyin1]==$_POST[guanyin1]){

	
	if($ap and !preg_match('/^[0-9]*$/', $ap))exit;
	if($pj and !preg_match('/^[0-9]*$/', $pj))exit;	
	
	

			//$hgtjs = ';ifrhtml("'.$pj.$ap.'","'.$pj.'",'.$pn.','.$_POST[hgt].',"'.htmlspecialchars($_POST[weburl]).'");';
			
			
		
			$popup .= '<!--data'.htmlspecialchars($_POST[weburl]).'@#@'.htmlspecialchars($_POST[weburls]).'@#@'.htmlspecialchars($_POST[title]).'@#@'.htmlspecialchars($_POST[clr]).'@#@'.htmlspecialchars($_POST[hgt]).'data!-->';
			//if(strlen($_POST[clr])!=1 or !preg_match('/^[a-z]*$/', $_POST[clr]))$_POST[clr] = 'z';;	
			//if(strpos($_POST[weburl],'http://')!==false or strpos($_POST[weburl],'https://')!==false){$weburl = '';}else{ if(strpos($_POST[weburl],'.html')!==false)$weburl = '<!--ifrhtml!-->'; }
			$popup .= '<div  id="'.$pj.$ap.'ifhgt'.$pn.'" style="position:relative;" class="ui-grid-solo">';
			if($_POST[title]){$title =' ui-mini ui-btn-icon-left ui-icon-search">&nbsp;&nbsp;&nbsp;'.htmlspecialchars($_POST[title]);}else{$title =' ui-btn-icon-notext ui-icon-search">';}
			if($_POST[clr]){$clr ='style="background-color:'.htmlspecialchars($_POST[clr]).'"';}else{$clr ='';}
			if($_POST[weburls])$popup .= '<a href="#" data-pop="'.$pj.$ap.'" '.$clr.' data-url="'.htmlspecialchars(trim($_POST[weburls])).'" class="imgspop popn ui-btn ui-btn-z'.$title.'</a>';
			$popup .= '<iframe src="'.htmlspecialchars($_POST[weburl]).'" style="width:100%;" seamless frameBorder="0"></iframe></div>';		

			
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
			$webpopup .= $html.'<!--part'.$pn.'!--><!--sysifrhtmlsys!-->'.$vnts.$popup.$vntsn.$tabnbgdatns.$htmls;
			$webpopup .= '</div><!--content!--></div><!--page!-->';
			
		 	
			
			$fpagtrns='../panel/'.$roww[pjnbr].'/'.$ap.'.html';
			file_put_contents($fpagtrns,$html.'<!--part'.$pn.'!--><!--sysifrhtmlsys!-->'.$vnts.$popup.$vntsn.$tabnbgdatns.$htmls);

			$fpagtrns='../panel/'.$roww[pjnbr].'/web'.$ap.'.html';
			file_put_contents($fpagtrns,$webpopup);

	


	
			if(!file_exists('../panel/'.$roww[pjnbr].'/web'.$ap.'.js')){
			$fpagtrns='../panel/'.$roww[pjnbr].'/web'.$ap.'.js';
			$js = '/*$(document).on(\'pageshow\', \'#web'.$ap.'\', function(){*/';
			$js .= '/*});*/';
			file_put_contents($fpagtrns,$js);			
			;}
			
			if($_POST[hgt] and preg_match('/^[0-9]*$/',$_POST[hgt])){
			
			$hgtjs = '$("#'.$pj.$ap.'ifhgt'.$pn.'").find("iframe").height('.$_POST[hgt].'/100*windowHeight);';
			
			$jsweb = file_get_contents('../panel/'.$roww[pjnbr].'/web'.$ap.'.js');
				
				$jswebs=explode('/*webjs'.$pn.'*/',$jsweb);
				$jsweb = $jswebs[0].$jswebs[2];
				
				$js = '/*webjs'.$pn.'*/'
				.$hgtjs
				.'/*webjs'.$pn.'*/'
				.'/*});*/';
				$jsweb=str_replace('/*});*/',$js,$jsweb);
				file_put_contents('../panel/'.$roww[pjnbr].'/web'.$ap.'.js',$jsweb);
				
			;}	
	
	echo "<meta http-equiv='refresh' content='0;URL=ifrhtml.php?ap=".htmlspecialchars($roww[ap])."&pj=".htmlspecialchars($roww[pjnbr])."&pn=".htmlspecialchars($pn)."'>";
;}

?>
<!--function ifrhtml(pgn,pj,pn,hgt,ifr){
/*if(window.devicePixelRatio !== undefined) {var  dpr = window.devicePixelRatio;}else{var  dpr = 1;};*/
if(ifr.indexOf('http://') === -1 && ifr.indexOf('https://') === -1 && document.URL.indexOf('pj=') !== -1){path = '../panel/'+pj+'/';}else{path = '';}
$('#'+pgn+'ifhgt'+pn+' iframe').height($( window ).height()*hgt/100);
var hgtjsdivp = document.getElementById(pgn+'ifhgt'+pn).getBoundingClientRect().top ;
if(hgtjsdivp < window.innerHeight*1.8){																																																																																																																																																				$('#'+pgn+'ifhgt'+pn+' iframe').attr("src",path+ifr);$('#'+pgn+'ifhgt'+pn+' div').hide();
}else{
var ifhgt = '';
$(document).scroll(function() {	
if(!ifhgt){
hgtjsdivp = document.getElementById(pgn+'ifhgt'+pn).getBoundingClientRect().top ;
if(hgtjsdivp < window.innerHeight*1.8){																																																																								$('#'+pgn+'ifhgt'+pn+' iframe').load( ifrhtml, function() {																																																																																 $(this).attr("src",path+ifr);																																																																														 $('#'+pgn+'ifhgt'+pn+' div').hide();																																																																																																																																																																																																																																																																														 ifhgt = 1;})																																																																								;};}																																																																								});};
};!-->
