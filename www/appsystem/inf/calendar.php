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
if($_GET[tm] and !preg_match('/^[0-9]*$/',$_GET[tm]))exit;
if($_GET[tm])$tm = $_GET[tm];
if($_GET[sn] and $_GET[sn]!=1)exit;
if($_GET[sn])$sn = 1;

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
    <title><?php if($_SESSION[tn]==PRC){echo '日历 - AppMoney712 移动应用设计系统';}else if($_SESSION[tn]==EN){echo 'Calendar - AppMoney712 APP Creation System';}else{echo '日曆 - AppMoney712 移動應用設計系統';}?></title>
	
	<link rel="stylesheet" href="../css/jquerymobile-1.4.4.min.css">
	<link rel="stylesheet" href="../css/jquery.mobile-1.4.4.min.css">
	<link rel="stylesheet" href="../css/jqmobile.min.css">
	<link rel="stylesheet" href="../css/icon/style.css">	<link rel="stylesheet" href="../css/icons/style.css">
	<link rel="stylesheet" href="../jscss/swiper.min.css">
	
	<link rel="stylesheet" href="../css/appsystem.css">	
	<link rel="shortcut icon" href="favicon.ico">
	<!--wettopbr--><style type="text/css">	
	</style><!--copyiframes-->
	<script src="../js/jquery.js"></script><script src="../js/mobileinit.js"></script>
	<script src="../js/jquery.mobile-1.4.4.min.js"></script>
	<script src="../js/swiper.jquery.min.js"></script>
	
	<script src="../js/calendar.js"></script>
	
	

</head>
<body>
<div data-role="page" data-theme="b"  id="appageone" style="background-color:white;color:black">
	<div style="overflow: hidden;" data-role="header" data-theme="f">
	<a href="#navigations"  id="menubttn"  data-rel="popup" class="ui-btn ui-btn ui-btn-inline ui-corner-all ui-btn-icon-left ui-icon-bars"><?php if($_SESSION[tn]==PRC){echo '目录';}else if($_SESSION[tn]==EN){echo 'Menu';}else{echo '目錄';}?></a>
    <h1><?php if($_SESSION[tn]==PRC){echo '日历 - AppMoney712 移动应用设计系统';}else if($_SESSION[tn]==EN){echo 'Calendar - AppMoney712 APP Creation System';}else{echo '日曆 - AppMoney712 移動應用設計系統';}?></h1>
	
	</div><!-- /header -->


	<?php if($tl)$tln = '&tl='.$tl;?>
	
<?php  if($pn and !$tl){ 
			$ht = file_get_contents('../panel/'.$roww[pjnbr].'/'.$ap.'.html');
			$htm = explode('<!--part',$ht);
			$pntag = '<!--part'.$pn.'!-->';
				for($i=1;$i<sizeof($htm);$i++){
					if(strpos('<!--part'.$htm[$i],$pntag)===false and !$tabshtml){$html .= '<!--part'.$htm[$i];}
					else if(strpos('<!--part'.$htm[$i],$pntag)!==false){$tabshtml  = str_replace($pntag,'','<!--part'.$htm[$i]);}
					else{$htmls .= '<!--part'.$htm[$i];}
				;}
			$tabnbgdata = explode('<!--data-tabnbg',$tabshtml);
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
				
				
			$tabshtml  = str_replace('<div class="swiper-slide"><div id="'.$pj.$ap.'vnts'.$pn.'" class="vntsns vtnn">','',$tabshtml);	
			$tabshtml  = str_replace('<!--data-tabnbg'.$tabnbgdatn[0].'data-tabnbg!-->','',$tabshtml);	
			;}
			$tabshtml  = str_replace('</div></div><!--vnts!-->','',$tabshtml);			


				
			$tbgnvlu = explode('<!--data',$tabshtml);
			$tbgsvlu = explode('data!-->',$tbgnvlu[1]);
			$tbgvlu = explode('@#@',$tbgsvlu[0]);

			$sunvlu = $tbgvlu[0];	
			$monvlu = $tbgvlu[1];
			$tuevlu = $tbgvlu[2];
			$wedvlu = $tbgvlu[3];
			$thuvlu = $tbgvlu[4];
			$frivlu = $tbgvlu[5];
			$satvlu = $tbgvlu[6];	
			$saturdayvlu = $tbgvlu[7];	
			$sundayvlu = $tbgvlu[8];	
			$imgbg1vlu = $tbgvlu[9];	
			$imgbg2vlu = $tbgvlu[10];	
			$imgbg3vlu = $tbgvlu[11];	
			$imgbg4vlu = $tbgvlu[12];	
			$imgbg5vlu = $tbgvlu[13];	
			$imgbg6vlu = $tbgvlu[14];	
			$imgbg7vlu = $tbgvlu[15];	
			$imgbg8vlu = $tbgvlu[16];	
			$appdatavlu = $tbgvlu[17];	
			$internetvlu = $tbgvlu[18];	
			$btnimgsvlu = $tbgvlu[19];	
			$btnimgvlu = $tbgvlu[20];	
			$bgtareavlu= $tbgvlu[21];
			$bgareavlu= $tbgvlu[22];
			$infovlu= $tbgvlu[23];
			$mailvlu= $tbgvlu[24];
			
			$wdnentervlu= $tbgvlu[25];
			$wdntitlevlu= $tbgvlu[26];
			$wdnmsgvlu= $tbgvlu[27];
			$wdnhrefvlu= $tbgvlu[28];
			$wdniconvlu= $tbgvlu[29];
			$wdnimgiconvlu= $tbgvlu[30];
			$wdnlistvlu= $tbgvlu[31];
			$sbtnvwbtntitlevlu = $tbgvlu[32];
			$gclnvlu = $tbgvlu[33]; 
			$gclntmtitlevlu = $tbgvlu[34]; 
			$gclnntitlevlu = $tbgvlu[35];
			$gclnnstitlevlu = $tbgvlu[36];
			$clrmdatabtnvlu = $tbgvlu[37]; 
			$clrmdataftrvlu = $tbgvlu[38]; 
			$nphotovlu = $tbgvlu[39]; 


			;}
	?>		
	<div data-role="content">
	
	<?php if($ap){?>
	<a href="webpage.php?pj=<?php echo htmlspecialchars($roww[pjnbr]) ?>&ap=<?php echo htmlspecialchars($roww[ap])?>" data-ajax="false" class="ui-btn ui-btn ui-btn-inline ui-corner-all ui-btn-icon-left ui-icon-carat-l">&nbsp;</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="#view" data-rel="popup" class="ui-btn ui-btn-inline ui-corner-all ui-mini ui-btn-icon-left ui-icon-search"><?php if($_SESSION[tn]==PRC){echo '预览';}else if($_SESSION[tn]==EN){echo 'Preview';}else{echo '預覽';}?></a>
		
	<div data-role="popup" id="view"><a href="#" class="ui-btn ui-corner-all ui-icon-delete ui-btn-icon-notext ui-btn-right" data-rel="back"></a>

	<ul data-role="listview" data-corners="false" data-inset="true">
	<li><a href="view.php?pj=<?php echo htmlspecialchars($roww[pjnbr])?>&ap=<?php echo htmlspecialchars($roww[ap])?>&vw=ap" data-ajax="false" target="_blank" class="ui-btn ui-btn-inline ui-mini ui-btn-icon-left ui-icon-search"><?php if($_SESSION[tn]==PRC){echo '预览应用页内容形式';}else if($_SESSION[tn]==EN){echo 'Page content of APP style[Preview]';}else{echo '預覽應用頁內容形式';}?></a></li>
	<li><a href="view.php?pj=<?php echo htmlspecialchars($roww[pjnbr])?>&ap=<?php echo htmlspecialchars($roww[ap])?>&vw=ap&ts=1" data-ajax="false" target="_blank" class="ui-btn ui-btn-inline ui-mini ui-btn-icon-left ui-icon-search"><?php if($_SESSION[tn]==PRC){echo '预览应用页内容形式';}else if($_SESSION[tn]==EN){echo 'Page content of APP style[Preview]';}else{echo '預覽應用頁內容形式';}?><?php if($_SESSION[tn]==PRC){echo '[触控式] [使用webkit型浏览器]';}else if($_SESSION[tn]==EN){echo '[Touch screen] [using any webkit browser]';}else{echo '[觸控式] [使用webkit型瀏覽器]';}?></a></li>
	<li><a href="viewp.php?pj=<?php echo htmlspecialchars($roww[pjnbr])?>&ap=<?php echo htmlspecialchars($roww[ap])?>" data-ajax="false" target="_blank" class="ui-btn ui-btn-inline ui-mini ui-btn-icon-left ui-icon-search"><?php if($_SESSION[tn]==PRC){echo '预览popup形式';}else if($_SESSION[tn]==EN){echo 'content of popup style[Preview]';}else{echo '預覽popup形式';}?></a></li>
	<li><a href="viewp.php?pj=<?php echo htmlspecialchars($roww[pjnbr])?>&ap=<?php echo htmlspecialchars($roww[ap])?>&ts=1" data-ajax="false" target="_blank" class="ui-btn ui-btn-inline ui-mini ui-btn-icon-left ui-icon-search"><?php if($_SESSION[tn]==PRC){echo '预览popup形式';}else if($_SESSION[tn]==EN){echo 'content of popup style[Preview]';}else{echo '預覽popup形式';}?><?php if($_SESSION[tn]==PRC){echo '[触控式] [使用webkit型浏览器]';}else if($_SESSION[tn]==EN){echo '[Touch screen] [using any webkit browser]';}else{echo '[觸控式] [使用webkit型瀏覽器]';}?></a></li>
	<!--<li><a href="view.php?pj=<?php echo htmlspecialchars($roww[pjnbr])?>&ap=<?php echo htmlspecialchars($roww[ap])?>&vw=s" data-ajax="false" target="_blank" class="ui-btn ui-btn-inline ui-mini ui-btn-icon-left ui-icon-search"><?php if($_SESSION[tn]==PRC){echo '预览單頁形式';}else if($_SESSION[tn]==EN){echo 'single page style[Preview]';}else{echo '預覽單頁形式';}?></a></li>!-->
	</ul>
	</div>
	
		
	<a href="menudesign.php?pj=<?php echo htmlspecialchars($roww[pjnbr])?>&ap=<?php echo $ap?>&pn=<?php echo $pn?>&php=calendar&plt=1" data-ajax="false" class="ui-btn ui-btn ui-btn-inline ui-corner-all ui-mini ui-btn-icon-left ui-icon-bars"><?php if($_SESSION[tn]==PRC){echo '专案应用页列表';}else if($_SESSION[tn]==EN){echo 'Project Page List';}else{echo '專案應用頁列表';}?></a>
	
	
	<?php ;}?>
	
	
	<a href="#try" data-rel="popup" data-transition="pop" class="ui-btn ui-btn-f ui-btn-inline ui-corner-all ui-mini" style="color:BLACK"><span class="pigss-pencil" style="color:red"></span><?php if($_SESSION[tn]==PRC){echo '快速试用';}else if($_SESSION[tn]==EN){echo 'Quick try';}else{echo '快速試用';}?></a>
		<div data-role="popup" id="try" data-position-to="window" data-theme="f" class="ifrwidth"><a href="#" data-rel="back" class="popn ui-btn ui-btn-z ui-btn-icon-notext ui-icon-delete"></a><BR><BR>
			
		<p><b style="color:pink"><?php if($_SESSION[tn]==PRC){echo '项目填写';}else if($_SESSION[tn]==EN){echo 'Item information';}else{echo '項目填寫';}?></b> &nbsp;<?php if($_SESSION[tn]==PRC){echo '点撀送交按钮。';}else if($_SESSION[tn]==EN){echo 'You need to click the SEND button to create a calendar.';}else{echo '點撀送交按鈕。';}?></p>	
		<hr>
		<p><b style="color:pink"><?php if($_SESSION[tn]==PRC){echo '试用';}else if($_SESSION[tn]==EN){echo 'Testing';}else{echo '試用';}?></b> &nbsp;
	<?php if($_SESSION[tn]==PRC){echo '您须点撀此页上的预览,再进行测试。再修改及选用不同设置再预览并试用。';}else if($_SESSION[tn]==EN){echo 'You need to click the above preview button to test your design. You can enter or select different parameters to test their functions and effects.';}else{echo '您須點撀此頁上的預覽,再進行測試。再修改及選用不同設置再預覽並試用。';}?></p>	
	<p><b style="color:pink"><?php if($_SESSION[tn]==PRC){echo '试用步骤';}else if($_SESSION[tn]==EN){echo 'Testing Steps';}else{echo '試用步驟';}?></b> &nbsp;
	<?php if($_SESSION[tn]==PRC){echo '在预览页,点撀日期编辑符号按钮,能进行编写日记並加附件。您亦能将互联网档案资料作为指定日期数据作显示,参考此页解释。';}else if($_SESSION[tn]==EN){echo 'You need to click the edit symbol button to edit diary and attachment. You can add Internet data to specific date of the calendar. You need to refer the explanation on this page for this issue.';}else{echo '在預覽頁,點撀日期編輯符號按鈕,能進行編寫日記並加附件。您亦能將互聯網檔案資料作為指定日期數據作顯示,參考本頁解釋。';}?></p>
	<p><?php if($_SESSION[tn]==PRC){echo '若按浏览器的重刷按钮,键入的数据亦被重置,是不同於当您的设计变成应用。';}else if($_SESSION[tn]==EN){echo 'If you click the refresh button of your computer browser, your entered data will be cleared. This situation will not occur when your design is used as APP.';}else{echo '若按瀏覽器的重刷按鈕,鍵入的數據亦被重置,是不同於當您的設計變成應用。';}?></p>	
		</div>
	<hr>
	<span style="color:black"><?php if($_SESSION[tn]==PRC){echo '专案';}else if($_SESSION[tn]==EN){echo 'Project';}else{echo '專案';}?></span>
	<?php 	$sql=$db->query("select * from webpj where cno='$pj'");
	if($sql)$row=$sql->fetch();
	echo '['.htmlspecialchars($row[date]).'] '.htmlspecialchars($row[title]);?>
	
	&nbsp;&nbsp;&nbsp;&nbsp;
	
	<span style="color:black"><?php if($_SESSION[tn]==PRC){echo '应用页称';}else if($_SESSION[tn]==EN){echo 'Page name';}else{echo '應用頁稱';}?></span> :
	<?php echo htmlspecialchars($roww[title])?>
	<hr>
	<?php 
	if($_SESSION[tn]==PRC){echo '日历创建';}else if($_SESSION[tn]==EN){echo 'Calendar Design';}else{echo '日曆創建';}
	
	?>  


	<FORM action="calendar.php?pj=<?php echo htmlspecialchars($roww[pjnbr]) ?>&ap=<?php echo htmlspecialchars($roww[ap]) ?>&tm=<?php echo htmlspecialchars($tm) ?>&pn=<?php echo htmlspecialchars($pn).$tln ?>&sn=<?php echo $sn?>" id="webxls" method="post" data-ajax="false" >
	<hr>
	<b style="color:blue"><?php if($_SESSION[tn]==PRC){echo '星期标题';}else if($_SESSION[tn]==EN){echo 'Week title';}else{echo '星期標題';}?></b>
<div class="ui-grid-c">
<div class="ui-block-a"><?php if($_SESSION[tn]==PRC){echo '周日';}else if($_SESSION[tn]==EN){echo 'Sunday';}else{echo '週日';}?><input type="text" name="sun" placeholder="" value="<?php if($sunvlu){echo htmlspecialchars($sunvlu);}else{echo 'S';}?>" required></div><div class="ui-block-b">
<?php if($_SESSION[tn]==PRC){echo '周一';}else if($_SESSION[tn]==EN){echo 'Monday';}else{echo '週一';}?>
<input type="text" name="mon" placeholder="" value="<?php if($monvlu){echo htmlspecialchars($monvlu);}else{echo 'M';}?>"></div>
<div class="ui-block-c"><?php if($_SESSION[tn]==PRC){echo '周二';}else if($_SESSION[tn]==EN){echo 'Tuesday';}else{echo '週二';}?>
<input type="text" name="tue" placeholder="" value="<?php if($tuevlu){echo htmlspecialchars($tuevlu);}else{echo 'T';}?>"></div><div class="ui-block-d">
<?php if($_SESSION[tn]==PRC){echo '周三';}else if($_SESSION[tn]==EN){echo 'Wednesday';}else{echo '週三';}?>
<input type="text" name="wed" placeholder="" value="<?php if($wedvlu){echo htmlspecialchars($wedvlu);}else{echo 'W';}?>"></div>
<div class="ui-block-a"><?php if($_SESSION[tn]==PRC){echo '周四';}else if($_SESSION[tn]==EN){echo 'Thursday';}else{echo '週四';}?>
<input type="text" name="thu" placeholder="" value="<?php if($thuvlu){echo htmlspecialchars($thuvlu);}else{echo 'T';}?>"></div><div class="ui-block-b"><?php if($_SESSION[tn]==PRC){echo '周五';}else if($_SESSION[tn]==EN){echo 'Friday';}else{echo '週五';}?><input type="text" name="fri" placeholder="" value="<?php if($frivlu){echo htmlspecialchars($frivlu);}else{echo 'F';}?>"></div>
<div class="ui-block-c"><?php if($_SESSION[tn]==PRC){echo '周六';}else if($_SESSION[tn]==EN){echo 'Saturday';}else{echo '週六';}?><input type="text" name="sat" placeholder="" value="<?php if($satvlu){echo htmlspecialchars($satvlu);}else{echo 'S';}?>"></div>
</div>
	<hr>
<div class="ui-grid-c">
<div class="ui-block-a">	
<?php if($_SESSION[tn]==PRC){echo '周六颜色';}else if($_SESSION[tn]==EN){echo 'Saturday color';}else{echo '週六顏色';}?>
<input type="text" name="saturday" placeholder="" value="<?php echo htmlspecialchars($saturdayvlu)?>"></div>
<div class="ui-block-b">
<?php if($_SESSION[tn]==PRC){echo '周日颜色';}else if($_SESSION[tn]==EN){echo 'Sunday color';}else{echo '週日顏色';}?>
<input type="text" name="sunday" placeholder="" value="<?php echo htmlspecialchars($sundayvlu);?>">
</div>
<?php if(sizeof($tbgvlu)){?>
<div class="ui-block-c">	
<?php if($_SESSION[tn]==PRC){echo '顶部背景颜色';}else if($_SESSION[tn]==EN){echo 'Background color of Top area';}else{echo '頂部背景顏色';}?>
<input type="text" name="bgtarea" placeholder="" value="<?php echo htmlspecialchars($bgtareavlu)?>"></div>
<div class="ui-block-d">
<?php if($_SESSION[tn]==PRC){echo '顶部1背景颜色';}else if($_SESSION[tn]==EN){echo 'Background color of Top area1';}else{echo '頂部1背景顏色';}?>
<input type="text" name="bgarea" placeholder="" value="<?php echo htmlspecialchars($bgareavlu);?>">
</div>

<?php ;}?>

</div>
	
	<hr>
<b style="color:blue"><?php if($_SESSION[tn]==PRC){echo '背景';}else if($_SESSION[tn]==EN){echo 'Background';}else{echo '背景';}?></b>
<div class="ui-grid-c">
<div class="ui-block-a"><?php if($_SESSION[tn]==PRC){echo '首月(上)';}else if($_SESSION[tn]==EN){echo 'First(1)';}else{echo '首月(上)';}?>
<input type="text" name="imgbg1" placeholder="" value="<?php echo htmlspecialchars($imgbg1vlu)?>"></div><div class="ui-block-b">
<?php if($_SESSION[tn]==PRC){echo '首月(下)';}else if($_SESSION[tn]==EN){echo 'First(2)';}else{echo '首月(下)';}?><input type="text" name="imgbg2" placeholder="" value="<?php echo htmlspecialchars($imgbg2vlu)?>"></div>
<div class="ui-block-c"><?php if($_SESSION[tn]==PRC){echo '二(上)';}else if($_SESSION[tn]==EN){echo 'Second(1)';}else{echo '二(上)';}?><input type="text" name="imgbg3" placeholder="" value="<?php echo htmlspecialchars($imgbg3vlu)?>"></div><div class="ui-block-d"><?php if($_SESSION[tn]==PRC){echo '二(下)';}else if($_SESSION[tn]==EN){echo 'Second(2)';}else{echo '二(下)';}?><input type="text" name="imgbg4" placeholder="" value="<?php echo htmlspecialchars($imgbg4vlu)?>"></div>
<div class="ui-block-a"><?php if($_SESSION[tn]==PRC){echo '三(上)';}else if($_SESSION[tn]==EN){echo 'Third(1)';}else{echo '三(上)';}?><input type="text" name="imgbg5" placeholder="" value="<?php echo htmlspecialchars($imgbg5vlu)?>"></div><div class="ui-block-b"><?php if($_SESSION[tn]==PRC){echo '三(下)';}else if($_SESSION[tn]==EN){echo 'Third(2)';}else{echo '三(下)';}?><input type="text" name="imgbg6" placeholder="" value="<?php echo htmlspecialchars($imgbg6vlu)?>"></div>
<div class="ui-block-c"><!--<?php if($_SESSION[tn]==PRC){echo '上月(上)';}else if($_SESSION[tn]==EN){echo 'Previous(1)';}else{echo '上月(上)';}?><input type="text" name="imgbg7" placeholder="" value="<?php echo htmlspecialchars($imgbg7vlu)?>">!--></div><div class="ui-block-d"><!--<?php if($_SESSION[tn]==PRC){echo '上月(下)';}else if($_SESSION[tn]==EN){echo 'Previous(2)';}else{echo '上月(下)';}?><input type="text" name="imgbg8" placeholder="" value="<?php echo htmlspecialchars($imgbg8vlu)?>">!--></div>

</div>
<?php if(sizeof($tbgvlu)){?>
<hr>

<div class="ui-grid-c">
<div class="ui-block-a">	
<?php if($_SESSION[tn]==PRC){echo '应用内数据';}else if($_SESSION[tn]==EN){echo 'APP data';}else{echo '應用內數據';}?>
<input type="text" name="appdata" placeholder="" value="<?php echo htmlspecialchars($appdatavlu)?>"></div>
<div class="ui-block-b">
<?php if($_SESSION[tn]==PRC){echo '伺服器数据';}else if($_SESSION[tn]==EN){echo 'Server data';}else{echo '伺服器數據';}?>
<input type="text" name="internet" placeholder="" value="<?php echo htmlspecialchars($internetvlu);?>">
</div>
<div class="ui-block-c">
<?php if($_SESSION[tn]==PRC){echo '资讯按钮';}else if($_SESSION[tn]==EN){echo 'Info button';}else{echo '資訊按鈕';}?>
<input type="text" name="info" placeholder="" value="<?php echo htmlspecialchars($infovlu);?>">
</div>
<div class="ui-block-d">
<?php if($_SESSION[tn]==PRC){echo '电邮设置按钮';}else if($_SESSION[tn]==EN){echo 'Email button';}else{echo '電郵設置按鈕';}?>
<input type="text" name="mail" placeholder="" value="<?php echo htmlspecialchars($mailvlu);?>">
</div>


</div>	
<hr>
<b style="color:blue"><?php if($_SESSION[tn]==PRC){echo '笔记图像数量';}else if($_SESSION[tn]==EN){echo 'diary image quantity';}else{echo '筆記圖像數量';}?></b>
<div class="ui-grid-d">
<div class="ui-block-a">	
<?php if($_SESSION[tn]==PRC){echo '通用';}else if($_SESSION[tn]==EN){echo 'Common use';}else{echo '通用';}?>
<input type="number" name="btnimgs" placeholder="" value="<?php echo htmlspecialchars($btnimgsvlu)?>"></div>
<div class="ui-block-b">
<?php if($_SESSION[tn]==PRC){echo '限此日历';}else if($_SESSION[tn]==EN){echo 'For this calendar only';}else{echo '限此日曆';}?>
<input type="text" name="btnimg" placeholder="" value="<?php echo htmlspecialchars($btnimgvlu);?>">
</div><div class="ui-block-c">
<?php if($_SESSION[tn]==PRC){echo '自拍按钮标题';}else if($_SESSION[tn]==EN){echo 'Photo taking button';}else{echo '自拍按鈕標題';}?>
<input type="text" name="nphoto" placeholder="" value="<?php echo htmlspecialchars($nphotovlu);?>">
</div></div>

<hr>
<b style="color:blue"><?php if($_SESSION[tn]==PRC){echo '笔记功能';}else if($_SESSION[tn]==EN){echo 'diary function';}else{echo '筆記功能';}?></b>
<div class="ui-grid-c">
<div class="ui-block-a">	
<?php if($_SESSION[tn]==PRC){echo '键入按钮的标题';}else if($_SESSION[tn]==EN){echo 'Title of Enter data button';}else{echo '鍵入按鈕的標題';}?>
<input type="text" name="wdnenter" placeholder="" value="<?php echo htmlspecialchars($wdnentervlu)?>"></div>
<div class="ui-block-b">
<?php if($_SESSION[tn]==PRC){echo '笔记标题键入的标题';}else if($_SESSION[tn]==EN){echo 'Title of diary title entry';}else{echo '筆記標題鍵入的標題';}?>
<input type="text" name="wdntitle" placeholder="" value="<?php echo htmlspecialchars($wdntitlevlu);?>">
</div>
<div class="ui-block-c">
<?php if($_SESSION[tn]==PRC){echo '笔记内容键入的标题';}else if($_SESSION[tn]==EN){echo 'Title of diary content entry';}else{echo '筆記內容鍵入的標題';}?>
<input type="text" name="wdnmsg" placeholder="" value="<?php echo htmlspecialchars($wdnmsgvlu);?>">
</div>
<div class="ui-block-d">
<?php if($_SESSION[tn]==PRC){echo '笔记链结键入的标题';}else if($_SESSION[tn]==EN){echo 'Title of diary link entry';}else{echo '筆記鏈結鍵入的標題';}?>
<input type="text" name="wdnhref" placeholder="" value="<?php echo htmlspecialchars($wdnhrefvlu);?>">
</div>

<div class="ui-block-a">	
<?php if($_SESSION[tn]==PRC){echo '图像字体键入的标题';}else if($_SESSION[tn]==EN){echo 'Title of icon font entry';}else{echo '圖像字體鍵入的標題';}?>
<input type="text" name="wdnicon" placeholder="" value="<?php echo htmlspecialchars($wdniconvlu)?>"></div>
<div class="ui-block-b">
<?php if($_SESSION[tn]==PRC){echo '图像字体键入的备注';}else if($_SESSION[tn]==EN){echo 'Remark of icon font entry';}else{echo '圖像字體鍵入的備註';}?>
<input type="text" name="wdnimgicon" placeholder="" value="<?php echo htmlspecialchars($wdnimgiconvlu);?>">
</div>
<div class="ui-block-c">
<?php if($_SESSION[tn]==PRC){echo '笔记修改列表按钮的标题';}else if($_SESSION[tn]==EN){echo 'Title of diary amendment list button';}else{echo '筆記修改列表按鈕的標題';}?>
<input type="text" name="sbtnvwbtntitle" placeholder="" value="<?php echo htmlspecialchars($sbtnvwbtntitlevlu);?>">
</div>
<div class="ui-block-d">
<?php if($_SESSION[tn]==PRC){echo '笔记修改列表的备注';}else if($_SESSION[tn]==EN){echo 'Remark of diary amendment list';}else{echo '筆記修改列表的備注';}?>
<input type="text" name="wdnlist" placeholder="" value="<?php echo htmlspecialchars($wdnlistvlu);?>">
</div>

</div>	
<hr>
<b style="color:blue"><?php if($_SESSION[tn]==PRC){echo '数据删除';}else if($_SESSION[tn]==EN){echo 'Data deletion';}else{echo '數據刪除';}?></b>
<div class="ui-grid-a">
<div class="ui-block-a">
<?php if($_SESSION[tn]==PRC){echo '数据删除按钮的标题';}else if($_SESSION[tn]==EN){echo 'Data deletion button title';}else{echo '數據刪除按鈕的標題';}?>
<input type="text" name="clrmdatabtn" placeholder="" value="<?php echo htmlspecialchars($clrmdatabtnvlu);?>">
</div>
<div class="ui-block-b">
<?php if($_SESSION[tn]==PRC){echo '数据删除按钮的备注';}else if($_SESSION[tn]==EN){echo 'Data deletion explanation';}else{echo '數據刪除按鈕的備注';}?>
<input type="text" name="clrmdataftr" placeholder="" value="<?php echo htmlspecialchars($clrmdataftrvlu);?>">
</div>
</div>	
<hr>
<b style="color:blue"><?php if($_SESSION[tn]==PRC){echo '提示功能';}else if($_SESSION[tn]==EN){echo 'Notification function';}else{echo '提示功能';}?></b>
<div class="ui-grid-c">
<div class="ui-block-a">
<?php if($_SESSION[tn]==PRC){echo '提示日历称键入项的标题';}else if($_SESSION[tn]==EN){echo 'Entry Title of Notification calendar name';}else{echo '提示日曆稱鍵入項的標題';}?>
<input type="text" name="gcln" placeholder="" value="<?php echo htmlspecialchars($gclnvlu);?>">
</div>
<div class="ui-block-b">
<?php if($_SESSION[tn]==PRC){echo '事项起始时间键入项的标题';}else if($_SESSION[tn]==EN){echo 'Entry Title of Event starting time';}else{echo '事項起始時間鍵入項的標題';}?>
<input type="text" name="gclntmtitle" placeholder="" value="<?php echo htmlspecialchars($gclntmtitlevlu);?>">
</div>
<div class="ui-block-c">
<?php if($_SESSION[tn]==PRC){echo '首次提醒时间键入项的标题';}else if($_SESSION[tn]==EN){echo 'Entry Title of First notification time';}else{echo '首次提醒時間鍵入項的標題';}?>
<input type="text" name="gclnntitle" placeholder="" value="<?php echo htmlspecialchars($gclnntitlevlu);?>">
</div>
<div class="ui-block-d">
<?php if($_SESSION[tn]==PRC){echo '再次提醒时间键入项的标题';}else if($_SESSION[tn]==EN){echo 'Entry Title of Second notification time';}else{echo '再次提醒時間鍵入項的標題';}?>
<input type="text" name="gclnnstitle" placeholder="" value="<?php echo htmlspecialchars($gclnnstitlevlu);?>">
</div>
</div>	
			
			
			

<?php ;}//if(sizeof($tbgvlu)){?>
	<input type="hidden" name="guanyin1" value="<?php if(!$_POST[guanyin1])$_SESSION[guanyin1]=rand();
	echo htmlspecialchars($_SESSION[guanyin1]); ?>">
	<div class="ui-grid-c"><div class="ui-block-a">

	<input type="submit" name="submit" id="webxlsbtn" Value="<?php if($_SESSION[tn]==PRC){echo '送交';}else if($_SESSION[tn]==EN){echo 'SEND';}else{echo '送交';}?>">
	</div><div class="ui-block-b">
	<a href="#steps" data-rel="popup" class="ui-btn ui-btn-b ui-btn-inline ui-corner-all ui-mini"><?php if($_SESSION[tn]==PRC){echo '步骤';}else if($_SESSION[tn]==EN){echo 'Steps';}else{echo '步驟';}?></a><div data-role="popup" id="steps" style="min-width:300px;max-width:85%" data-position-to="window" data-theme="f"><a href="#" class="ui-btn ui-corner-all ui-icon-delete ui-btn-icon-notext ui-btn-right" data-rel="back"></a>

	<p><b style="color:pink"><?php if($_SESSION[tn]==PRC){echo '填写项目';}else if($_SESSION[tn]==EN){echo 'Fiil in item data';}else{echo '填寫項目';}?></b></p>
	<p><?php if($_SESSION[tn]==PRC){echo '您须填写资料。';}else if($_SESSION[tn]==EN){echo 'You need to fill in the above data.';}else{echo '您須填寫資料。';}?></p><HR>
	<p><b style="color:pink"><?php if($_SESSION[tn]==PRC){echo '数据资料';}else if($_SESSION[tn]==EN){echo 'Data information';}else{echo '數據資料';}?></b></p>
		<p><?php if($_SESSION[tn]==PRC){echo '您能设置数据显示在日历的指定日期上,数据包括显示在日历上的按钮标题丶相片及图像字体,亦包括用户点撀此按钮所显示的笔记内容丶链结及放大的相片。若链结合适及设备合适,用户点撀链结能作调用设备电话及电邮,浏览应用页或网页。';}else if($_SESSION[tn]==EN){echo 'You can add data to specific date of the calendar. Data content can be button\'s title, thumbnail, icon font and diary content,attachment link and enlarging picture [showing by clicking the title button]. If using appropriate data with appropriate device, APP user can click the link to use phone and email function of appropriate device and browse APP page and Web page.';}else{echo '您能設置數據顯示在日曆的指定日期上,數據包括顯示在日曆上的按鈕標題、相片及圖像字體,亦包括用戶點撀此按鈕所顯示的筆記內容、鏈結及放大的相片。若鏈結合適及設備合適,用戶點撀鏈結能作調用設備電話及電郵,瀏覽應用頁或網頁。';}?></p>

	<p><?php if($_SESSION[tn]==PRC){echo '到网站参考相关编写指引,但不是必须的。此日历含笔记功能。';}else if($_SESSION[tn]==EN){echo 'You can refer to our website about this issue. But it is optional. This calendar also provides diary, notification and email backup function.';}else{echo '到網站參考相關編寫指引,但不是必須的。此日曆含筆記功能。';}?></p>
	
	
</div>



<a href="#inf" data-rel="popup" class="ui-btn ui-btn-b ui-btn-inline ui-corner-all ui-mini">? <?php if($_SESSION[tn]==PRC){echo '解释';}else if($_SESSION[tn]==EN){echo 'Explanation';}else{echo '解釋';}?></a>
	<div data-role="popup" id="inf" data-theme="f"   style="width:780px" data-position-to="window"><a href="#" class="ui-btn ui-corner-all ui-icon-delete ui-btn-icon-notext ui-btn-right" data-rel="back"></a>

	<p><b style="color:pink"><?php if($_SESSION[tn]==PRC){echo '星期标题';}else if($_SESSION[tn]==EN){echo 'Week title';}else{echo '星期標題';}?></b></p>
	<p><?php if($_SESSION[tn]==PRC){echo '必须填写。';}else if($_SESSION[tn]==EN){echo 'You need to fill in these items.';}else{echo '必須填寫。';}?></p>	<hr>
	
	<p><b style="color:pink"><?php if($_SESSION[tn]==PRC){echo '周六及周日颜色';}else if($_SESSION[tn]==EN){echo 'Saturday and Sunday color';}else{echo '週六及週日顏色';}?></b></p>
	<p><?php if($_SESSION[tn]==PRC){echo '填上rgba颜色码e.g. rgba(255,255,255,0.5)。';}else if($_SESSION[tn]==EN){echo 'It is about the content area color of Saturday and Sunday. You can add  rgba color code e.g. rgba(255,255,255,0.5).';}else{echo '填上rgba顏色碼e.g. rgba(255,255,255,0.5)。';}?></p>
	<hr>
	
	<p><b style="color:pink"><?php if($_SESSION[tn]==PRC){echo '背景';}else if($_SESSION[tn]==EN){echo 'Background';}else{echo '背景';}?></b></p>
	<p><?php if($_SESSION[tn]==PRC){echo '日历一次内容包含3个月,并分上下月,用户能拖拽画面浏览。建议一个应用页使用一个日历内容。';}else if($_SESSION[tn]==EN){echo 'The calendar shows 3 month data. APP user can swipe the device screen to view 1 month data. It is recommended to use one calendar on an APP page.';}else{echo '日曆一次內容包含3個月,並分上下月,用戶能拖拽畫面。建議一個應用頁使用一個日曆內容。';}?></p>

	<p><?php if(!$roww[pjnbr])$roww[pjnbr] = '?';
	if($_SESSION[tn]==PRC){echo '背景图像,使用应用内的图像,档案须存於panel/'.$roww[pjnbr].'/images档夹内。若设置背景图像上下左右重覆显示,在档案名加[xy]。e.g. picture[xy].png';}else if($_SESSION[tn]==EN){echo 'It is about the background of item. If you use the APP pictures, you need to prepare pictures and store them in  panel/'.$roww[pjnbr].'/images folder. If you add [xy] to the picture file name (e.g. picture[xy].png, the picture will be repeated both vertically and horizontally in the item area.';}else{echo '背景圖像,使用應用內的圖像,檔案須存於panel/'.$roww[pjnbr].'/images檔夾內。若設置背景圖像上下左右重覆顯示,在檔案名加[xy]。e.g. picture[xy].png';}?></p>
	<p><?php if($_SESSION[tn]==PRC){echo '您亦能在背景填上rgb颜色码e.g. rgb(125,125,125), rgba颜色码e.g. rgba(125,125,125,0.5) 或 hex颜色码e.g. #123456代替背景图像。';}else if($_SESSION[tn]==EN){echo 'You can add rgb color code e.g. rgb(125,125,125), rgba color code e.g. rgba(125,125,125,0.5) or hex color code e.g. #123456 instead of background picture.';}else{echo '您亦能在背景填上rgb顏色碼e.g. rgb(125,125,125), rgba顏色碼e.g. rgba(125,125,125,0.5)或 hex顏色碼e.g. #123456代替背景圖像。';}?></p>
	
	</div>
	
</div><div class="ui-block-c">
<a href="#infs" data-rel="popup" class="ui-btn ui-btn-b ui-btn-inline ui-corner-all ui-mini">? <?php if($_SESSION[tn]==PRC){echo '设定解释';}else if($_SESSION[tn]==EN){echo 'Parameters - Explanation';}else{echo '設定解釋';}?></a>
	<div data-role="popup" id="infs"  style="width:780px" data-position-to="window" data-theme="f"><a href="#" class="popn ui-btn ui-btn-z ui-icon-delete ui-btn-icon-notext ui-btn-right" data-rel="back"></a>
<p><b style="color:pink"><?php if($_SESSION[tn]==PRC){echo '设定';}else if($_SESSION[tn]==EN){echo 'Parameters';}else{echo '設定';}?> </b>
	<?php if($_SESSION[tn]==PRC){echo '以下项目在巳创建日历才能键入。';}else if($_SESSION[tn]==EN){echo 'These following items can be amended when calender created.';}else{echo '以下項目在巳創建日曆才能鍵入。';}?></p>
<hr>
	<p><b style="color:pink"><?php if($_SESSION[tn]==PRC){echo '顶部背景颜色';}else if($_SESSION[tn]==EN){echo 'Background color of Top area';}else{echo '頂部背景顏色';}?> </b>
	<?php if($_SESSION[tn]==PRC){echo '是日历的顶部区域,您能在背景填上rgb颜色码e.g. rgb(125,125,125), rgba颜色码e.g. rgba(125,125,125,0.5) 或 hex颜色码e.g. #123456。';}else if($_SESSION[tn]==EN){echo 'It is about the top parts of calendar. You can add rgb color code e.g. rgb(125,125,125), rgba color code e.g. rgba(125,125,125,0.5) or hex color code e.g. #123456.';}else{echo '是日曆的頂部區域,您能在背景填上rgb顏色碼 e.g. rgb(125,125,125), rgba顏色碼e.g. rgba(125,125,125,0.5) 或 hex顏色碼e.g. #123456。';}?></p>
<hr>		
<p><b style="color:pink"><?php if($_SESSION[tn]==PRC){echo '数据';}else if($_SESSION[tn]==EN){echo 'Data';}else{echo '數據';}?></b>
<?php if($_SESSION[tn]==PRC){echo '数据存於应用内,格式是json,档案须存於panel/'.$roww[pjnbr].'/档夹内e.g. 1.html。在网站有相关资料。您亦能将档案存於互联网伺服器。数据相关链结的内容能是相片丶网页或存於互联网的音频丶视频或pdf等档案。';}else if($_SESSION[tn]==EN){echo 'You can only use json format data and store the file in  panel/'.$roww[pjnbr].'/ folder. Please refer to our website. You can also store the data file in the Internet. The data content for the link can photo, web page or audio, video and pdf stored in the Interent.';}else{echo '數據存於應用內,格式是json,檔案須存於panel/'.$roww[pjnbr].'/檔夾內e.g. 1.html。在網站有相關資料。您亦能將檔案存於互聯網伺服器。數據相關鏈結的內容能是相片、網頁或存於互聯網的音頻、視頻或pdf等檔案。';}?></p>

	<hr>
	<p><b style="color:pink"><?php if($_SESSION[tn]==PRC){echo '资讯按钮';}else if($_SESSION[tn]==EN){echo 'Info button';}else{echo '資訊按鈕';}?></b>
	<?php if($_SESSION[tn]==PRC){echo '日历顶部能设置\'资讯按钮\',用户点撀显示您指定的应用页。您能在此键入应用页的档案,您须填写此档案才能添加此按钮。';}else if($_SESSION[tn]==EN){echo 'You can add an Info button to the top part of calendar. APP user clicks it to show a popup content of APP page. You need to enter filename of APP page to enable this button.';}else{echo '日曆頂部能設置\'資訊按鈕\',用戶點撀顯示您指定的應用頁。您能在此鍵入應用頁的檔案,您須填寫此檔案才能添加此按鈕。';}?></p>
	<hr>
	<p><b style="color:pink"><?php if($_SESSION[tn]==PRC){echo '电邮设置按钮';}else if($_SESSION[tn]==EN){echo 'Email button';}else{echo '電郵設置按鈕';}?></b>
	<?php if($_SESSION[tn]==PRC){echo '用户点撀日历顶部的电邮符号并键入电邮作设定,在合适的设备能将用户所有点撀\'数据键入按钮\'的笔记操作及相关内容电邮至特定电邮户口。';}else if($_SESSION[tn]==EN){echo 'APP user clicks the mail button on the top section of calendar and enter an email as setting. The related content of diary by clicking confirmation button can be sent to the specific email on appropriate device.';}else{echo '用戶點撀日曆頂部的電郵符號並鍵入電郵作設定,在合適的設備能將用戶所有點撀\'數據鍵入按鈕\'的筆記操作及相關內容電郵至特定電郵戶口。';}?><?php if($_SESSION[tn]==PRC){echo '您能在此键入项加备注,您须填写此备注才能添加此按钮。';}else if($_SESSION[tn]==EN){echo 'You need to enter a remark to add this button. ';}else{echo '您能在此鍵入項加備註,您須填寫此備註才能添加此按鈕。';}?></p>
	
	
	<hr>
	
	<p><b style="color:pink"><?php if($_SESSION[tn]==PRC){echo '日记图像数量';}else if($_SESSION[tn]==EN){echo 'Diary image quantity';}else{echo '日記圖像數量';}?></b>
<?php if($_SESSION[tn]==PRC){echo '用户日记或数据均能调用特定图像,应用通用的图像的档名格式是btnimgs?.gif,?是编号,e.g.btnimgs1.gif,限此日历用的图像档名格式是'.$pj.$ap.'btnimg'.$pn.'?.gif,e.g.'.$pj.$ap.'btnimg'.$pn.'5.gif。';}else if($_SESSION[tn]==EN){echo 'You can add specific gif format of pictures for diary or data use. The file name format for common use [all calendar pages in your APP] is btnimgs?.gif,the ? is a sequential number,e.g.btnimgs1.gif. The file name format for this calendar only is '.$pj.$ap.'btnimg'.$pn.'?.gif,e.g.'.$pj.$ap.'btnimg'.$pn.'5.gif.';}else{echo '用戶日記或數據均能調用特定圖像,應用通用的圖像的檔名格式是btnimgs?.gif,?是編號,e.g.btnimgs1.gif,限此日曆用的圖像檔名格式是'.$pj.$ap.'btnimg'.$pn.'?.gif,e.g.'.$pj.$ap.'btnimg'.$pn.'5.gif。';}?></p>
<p><?php if($_SESSION[tn]==PRC){echo '若设置此功能,将图像档名顺序编号,此处填图像总数。';}else if($_SESSION[tn]==EN){echo 'If you use this function, you need to give sequantial number to related filename of gif pictures and fill in the total numbers.';}else{echo '若設置此功能,將圖像檔名順序編號,此處填圖像總數。';}?></p>
<p><?php $pj.$ap.'pgt'.$pn.'.htm';?></p>
<hr>
<p><b style="color:pink"><?php if($_SESSION[tn]==PRC){echo '自拍按钮标题';}else if($_SESSION[tn]==EN){echo 'Photo taking button';}else{echo '自拍按鈕標題';}?></b>
<?php if($_SESSION[tn]==PRC){echo '填写此标题才能启用自拍按钮,相片是笔记用。';}else if($_SESSION[tn]==EN){echo 'APP user can use phototaking by APP user\'s device for the diary. You need to enter this button title to enable this function.';}else{echo '填寫此標題才能啟用自拍按鈕,相片是筆記用。';}?></p>

	</div>
	
	
	<a href="#Diary" data-rel="popup" class="ui-btn ui-btn-b ui-btn-inline ui-corner-all ui-mini">? <?php if($_SESSION[tn]==PRC){echo '笔记功能解释';}else if($_SESSION[tn]==EN){echo 'Diary function - Explanation';}else{echo '筆記功能解釋';}?></a>
	<div data-role="popup" id="Diary"  class="ifrwidthpn" data-theme="f"><a href="#" class="popn  ui-btn ui-btn-z ui-icon-delete ui-btn-icon-notext ui-btn-right" data-rel="back"></a>

<p><b style="color:blue"><?php if($_SESSION[tn]==PRC){echo '笔记功能';}else if($_SESSION[tn]==EN){echo 'Diary function';}else{echo '筆記功能';}?></b>
<?php if($_SESSION[tn]==PRC){echo '此日历亦能用作笔记,能记录简单文字及链结,并显示在日历上,用户点撀日历上的标题浏览笔记内容。';}else if($_SESSION[tn]==EN){echo 'This calendar can be used as diary. APP user can edit simple content and link. This data will be showed on the calendar and APP user can click titled button on it to show diary content.';}else{echo '此日曆亦能用作筆記,能記錄簡單文字及鏈結,並顯示在日曆上,用戶點撀日曆上的標題瀏覽筆記內容。';}?></p>
<p><?php if($_SESSION[tn]==PRC){echo '在日期旁有<a href="#"  class="ui-btn ui-mini ui-btn-w ui-btn-inline ui-btn-icon-notext ui-icon-edit"></a>,用户点撀此按钮显示表格,能进行日历上的按钮修改及进行笔记。以下是此表格的相关标题设定,对表格标题作设定。';}else if($_SESSION[tn]==EN){echo 'APP user can click a <a href="#"  class="ui-btn ui-mini ui-btn-w ui-btn-inline ui-btn-icon-notext ui-icon-edit"></a> to show a form which can be used as calendar data and diary entry and amendment. The followings are the titles for the form. You need to entitle them.';}else{echo '在日期旁有<a href="#"  class="ui-btn ui-mini ui-btn-w ui-btn-inline ui-btn-icon-notext ui-icon-edit"></a>,用戶點撀此按鈕顯示表格,能進行日曆上的按鈕修改及進行筆記。以下是此表格的相關標題設定,對表格標題作設定。';}?></p>
<hr>
<p><b style="color:pink"><?php if($_SESSION[tn]==PRC){echo '键入按钮的标题';}else if($_SESSION[tn]==EN){echo 'Title of Enter data button';}else{echo '鍵入按鈕的標題';}?></b>
<?php if($_SESSION[tn]==PRC){echo '当用戶填写表格资料,再按此按钮将资料作实,此处填此按钮标题。';}else if($_SESSION[tn]==EN){echo 'APP user can click this Enter data button to confirm form data.';}else{echo '當用戶填寫表格資料,再按此按鈕將資料作實,此處填此按鈕標題。';}?><a href="#" class="ui-btn ui-btn-f ui-btn-inline ui-btn-icon-left ui-icon-check" data-border=""><span class="pigss-pencil"></span></a></p>
<hr>
<p><b style="color:pink"><?php if($_SESSION[tn]==PRC){echo '笔记标题键入的标题';}else if($_SESSION[tn]==EN){echo 'Title of Diary title entry';}else{echo '筆記標題鍵入的標題';}?></b>
<?php if($_SESSION[tn]==PRC){echo '用戶在笔记须填写标题,此标题以按钮形式显示在日历上。此处填此笔记标题的键入项的标题。';}else if($_SESSION[tn]==EN){echo 'APP user can add diary title which shows on calendar in button style. You can add a title for this diary title entry.';}else{echo '用戶在筆記須填寫標題,此標題以按鈕形式顯示在日曆上。此處填此筆記標題的鍵入項的標題。';}?></p>
<hr>
<p><b style="color:pink"><?php if($_SESSION[tn]==PRC){echo '笔记内容键入的标题';}else if($_SESSION[tn]==EN){echo 'Title of Diary content entry';}else{echo '筆記內容鍵入的標題';}?></b>
<?php if($_SESSION[tn]==PRC){echo '笔记须填写标题,此标题以按钮形式显示在日历上。此处填此笔记标题。';}else if($_SESSION[tn]==EN){echo 'APP user can add diary content. You can add a title for this diary content entry.';}else{echo '用戶能在筆記填寫簡單文字,此處填此筆記內容的鍵入項的標題。';}?></p>
	
<hr>
<p><b style="color:pink"><?php if($_SESSION[tn]==PRC){echo '笔记链结键入的标题';}else if($_SESSION[tn]==EN){echo 'Title of Diary link entry';}else{echo '筆記鏈結鍵入的標題';}?></b>
<?php if($_SESSION[tn]==PRC){echo '用戶能在笔记添加链结,对特定形式的链结,用户点撀链结能进行浏览,此处填此笔记内容的链结项的标题。';}else if($_SESSION[tn]==EN){echo 'APP user can add attachment link to the diary data. For specific format of link, APP user can click it to browse the content of link. You can add a title for this diary link entry.';}else{echo '用戶能在筆記添加鏈結,對特定形式的鏈結,用戶點撀鏈結能進行瀏覽,此處填此筆記內容的鏈結項的標題。';}?></p>
<p><?php if($_SESSION[tn]==PRC){echo '用戶能在筆記添加开启浏览器浏览特定网页的链结,e.g. pdf文件或地图。格式是[openbrowser]网页url,e.g. [openbrowser]http://???.?????.com/viewer?url=??????????word.pdf。此功能不能用电脑浏览器试用。';}else if($_SESSION[tn]==EN){echo 'APP user can add open browser link to the diary data. The link is to open APP user device\'s specific browser to show specific Internet web page. e.g. pdf document or map. The format is [openbrowser]url of web page. e.g. [openbrowser]http://???.?????.com/viewer?url=??????????word.pdf. You cannot preview it on your computer browser.';}else{echo '用戶能在筆記添加開啟瀏覽器瀏覽特定網頁的鏈結,e.g. pdf文件或地圖。格式是[openbrowser]網頁url,e.g. [openbrowser]http://???.?????.com/viewer?url=??????????word.pdf。此功能不能用電腦瀏覽器試用。';}?></p>

	<p><?php if($_SESSION[tn]==PRC){echo '用戶能在筆記添加开启合适应用浏览特定互联网或内联网文件,e.g. 用Acrobat Reader APP开启pdf文件。格式是[openapp]网页url,e.g. [openapp]http://???.?????.com/word.pdf。此功能不能用电脑浏览器试用。';}else if($_SESSION[tn]==EN){echo 'APP user can add open APP link to the diary data. The link is to open Internet/Intranet document by appropriate APP in APP user\'s appropriate device. e.g. open pdf document by Acrobat Reader APP. The format is [openapp]document url. e.g. [openapp]http://???.?????.com/word.pdf.  You cannot preview it on your computer browser.';}else{echo '用戶能在筆記添加開啟合適應用瀏覽特定互聯網或內聯網文件,e.g. 用Acrobat Reader APP開啟pdf文件。格式是[openapp]網頁url,e.g. [openapp]http://???.?????.com/word.pdf。此功能不能用電腦瀏覽器試用。';}?></p>

	<p><?php if($_SESSION[tn]==PRC){echo '用戶能在筆記添加开启设备巳安装的WHATSAPP APP的链结,格式是whatsapp://??????????,并显示特定内容,到本司网站有指引。此功能不能用电脑浏览器试用。';}else if($_SESSION[tn]==EN){echo 'APP user can add link for opening WhatsAPP APP to use its specific function. e.g.whatsapp://??????????. Please refer to our website. For IOS APP, you can use the URL scheme of many social sharing media to open APP user device\'s related social sharing APPs and use their functions. Please refer to our website.  You cannot try it on your computer browser.';}else{echo '用戶能在筆記添加開啟設備巳安裝的WHATSAPP APP的鏈結,格式是whatsapp://??????????,並顯示特定內容,到本司網站有指引。此功能不能用電腦瀏覽器試用。';}?></p>
<hr>
<p><b style="color:pink"><?php if($_SESSION[tn]==PRC){echo '图像字体键入的标题';}else if($_SESSION[tn]==EN){echo 'Title of Icon font entry';}else{echo '圖像字體鍵入的標題';}?></b>
<?php if($_SESSION[tn]==PRC){echo '用户能在笔记标题添加图像字体,此选用此笔记图像字体的区域的标题。';}else if($_SESSION[tn]==EN){echo 'APP user can add icon font to the diary title. You can add a title of icon font selecting area..';}else{echo '用戶能在筆記標題添加圖像字體,此選用此筆記圖像字體的區域的標題。';}?></p>
<hr>
<p><b style="color:pink"><?php if($_SESSION[tn]==PRC){echo '图像字体键入的备注';}else if($_SESSION[tn]==EN){echo 'Remark of Icon font entry';}else{echo '圖像字體鍵入的備註';}?></b>
<?php if($_SESSION[tn]==PRC){echo '用户能在笔记标题添加图像字体,此选用此笔记图像字体的区域的备注。';}else if($_SESSION[tn]==EN){echo 'APP user can add icon font to the diary title. You can add a remark of icon font selecting area.';}else{echo '用戶能在筆記標題添加圖像字體,此選用此筆記圖像字體的區域的備註。';}?></p>
<hr>
<p><b style="color:pink"><?php if($_SESSION[tn]==PRC){echo '笔记修改列表的备注';}else if($_SESSION[tn]==EN){echo 'Remark of Diary amendment list';}else{echo '筆記修改列表的備注';}?></b>
<?php if($_SESSION[tn]==PRC){echo '用户点撀日期旁的<a href="#"  class="ui-btn ui-mini ui-btn-w ui-btn-inline ui-btn-icon-notext ui-icon-edit"></a>,此日期的标题按钮均显示在列表上,点撀列表的标题能对内容修改。此处是填写对此列表的备注。';}else if($_SESSION[tn]==EN){echo 'APP user can click a <a href="#"  class="ui-btn ui-mini ui-btn-w ui-btn-inline ui-btn-icon-notext ui-icon-edit"></a> to edit diary for the date. All the diary titles for this date are showed on the list. You can add a remark for this list.';}else{echo '用戶點撀日期旁的<a href="#"  class="ui-btn ui-mini ui-btn-w ui-btn-inline ui-btn-icon-notext ui-icon-edit"></a>,此日期的標題按鈕均顯示在列表上,點撀列表的標題能對內容修改。此處是填寫對此列表的備注。';}?></p>

<p><b style="color:pink"><?php if($_SESSION[tn]==PRC){echo '笔记修改';}else if($_SESSION[tn]==EN){echo 'Diary amendment';}else{echo '筆記修改';}?></b>
<?php if($_SESSION[tn]==PRC){echo '用户只能修改键入的数据。互网数据只限提示及删除的操作。';}else if($_SESSION[tn]==EN){echo 'APP user cannot amend the Internet data which can only be added notification or deleted.';}else{echo '用戶只能修改鍵入的數據。互網數據只限提示及刪除的操作。';}?></p>
<p>

<p><b style="color:pink"><?php if($_SESSION[tn]==PRC){echo '笔记删除';}else if($_SESSION[tn]==EN){echo 'Diary deletion';}else{echo '筆記刪除';}?></b>
<?php if($_SESSION[tn]==PRC){echo '用户将笔记及内容删除,再点撀键入按钮作实。';}else if($_SESSION[tn]==EN){echo 'APP user can remove the diary title and content and then click the Enter data button to delete a data of diary.';}else{echo '用戶將筆記及內容刪除,再點撀鍵入按鈕作實。';}?></p>
<p>
<?php if($_SESSION[tn]==PRC){echo '用户亦能在列表点撀相关的<a href="#"  class="ui-btn ui-mini ui-btn-w ui-btn-inline">X</a>按钮,删除数据。';}else if($_SESSION[tn]==EN){echo 'APP user can remove the diary item by clicking deletion button <a href="#"  class="ui-btn ui-mini ui-btn-w ui-btn-inline">X</a> on the list.';}else{echo '用戶亦能在列表點撀相關的<a href="#"  class="ui-btn ui-mini ui-btn-w ui-btn-inline">X</a>按鈕,刪除數據。';}?></p>

<hr>
<p><b style="color:blue"><?php if($_SESSION[tn]==PRC){echo '数据删除';}else if($_SESSION[tn]==EN){echo 'Data deletion';}else{echo '數據刪除';}?></b></p>
<hr>
<p><b style="color:pink"><?php if($_SESSION[tn]==PRC){echo '数据删除按钮的标题';}else if($_SESSION[tn]==EN){echo 'Title of Data deletion button ';}else{echo '數據刪除按鈕的標題';}?></b>
<?php if($_SESSION[tn]==PRC){echo '删除日历数据的按钮设於日历底部,用户能删除整月的数据。此处是此按钮的标题。';}else if($_SESSION[tn]==EN){echo 'The data deletion of calendar is at the bottom of calendar\'s first month part. APP user can remove a monthly data. This item is about the title of this button.';}else{echo '刪除日曆數據的按鈕設於日曆底部,用戶能刪除整月的數據。此處是此按鈕的標題。';}?></p>
<hr>
<p><b style="color:pink"><?php if($_SESSION[tn]==PRC){echo '数据删除按钮的备注';}else if($_SESSION[tn]==EN){echo 'Data deletion explanation';}else{echo '數據刪除按鈕的備注';}?></b>
<?php if($_SESSION[tn]==PRC){echo '此处是填写资料处的备注。';}else if($_SESSION[tn]==EN){echo 'You can add a remark to data deletion section.';}else{echo '此處是填寫資料處的備註。';}?></p>

	</div>

<a href="#infss" data-rel="popup" class="ui-btn ui-btn-b ui-btn-inline ui-corner-all ui-mini ui-icon-edit ui-btn-icon-left">?</a>
<div data-role="popup" id="infss" style="width:780px" data-position-to="window" data-theme="f">
<a href="#" class="ui-btn ui-corner-all ui-icon-delete ui-btn-icon-notext ui-btn-right" data-rel="back"></a>
	
<div style="background-color:rgba(0, 0, 0,0.5);padding:5px;overflow-x:hidden;">
<a href="#"  class="ui-btn ui-mini ui-btn-w ui-btn-inline ui-btn-icon-notext ui-icon-delete"></a>

<a href="#" class="pgbtns ui-btn ui-btn-w ui-btn-icon-left ui-icon-check" data-border=""><span class="pigss-pencil"></span><?php if($_SESSION[tn]==PRC){echo '此处是键入按钮的标题';}else if($_SESSION[tn]==EN){echo 'Title of Enter data button';}else{echo '此處是鍵入按鈕的標題';}?>
</a>

	<div class="ui-grid-a">
		<div class="ui-block-a" style="width:85%">	<?php if($_SESSION[tn]==PRC){echo '此处是笔记标题键入的标题';}else if($_SESSION[tn]==EN){echo 'Title of diary title entry';}else{echo '此處是筆記標題鍵入的標題';}?></b>

<input type="text"  data-corners="false"  data-clear-btn="true"></div>
		<div class="ui-block-b" style="width:15%"></div>
	</div>
<?php if($_SESSION[tn]==PRC){echo '此处是笔记内容键入的标题';}else if($_SESSION[tn]==EN){echo 'Title of diary content entry';}else{echo '此處是筆記內容鍵入的標題';}?>

	<textarea  data-corners="false"></textarea>
	<div class="ui-grid-a">
		<div class="ui-block-a" style="width:85%"><span class="pigss-link" style="color:pink"></span><?php if($_SESSION[tn]==PRC){echo '此处是笔记链结键入的标题';}else if($_SESSION[tn]==EN){echo 'Title of diary link entry';}else{echo '此處是筆記鏈結鍵入的標題';}?>
<input type="text"  data-corners="false"  placeholder="" data-clear-btn="true"></div>
		<div class="ui-block-b" style="width:15%">&nbsp;</div>
	</div>
<a href="#" id="15pgtconbtn1" class="ui-btn ui-btn-w ui-mini ui-btn-icon-left ui-icon-edit"><span class="pigss-bunny"></span><?php if($_SESSION[tn]==PRC){echo '此处是图像字体键入的标题';}else if($_SESSION[tn]==EN){echo 'Title of icon font entry';}else{echo '此處是圖像字體鍵入的標題';}?></a>
<a href="#" id="titlelistbtn" class="ui-btn ui-btn-w ui-mini ui-btn-icon-left ui-icon-bullets"><?php if($_SESSION[tn]==PRC){echo '笔记修改列表按钮的标题';}else if($_SESSION[tn]==EN){echo 'Title of diary amendment list button';}else{echo '筆記修改列表按鈕的標題';}?></a>
<a href="#" id="titlenformbtn" class="ui-btn ui-btn-w ui-mini ui-btn-icon-left ui-icon-clock"><?php if($_SESSION[tn]==PRC){echo '提示功能按钮的标题';}else if($_SESSION[tn]==EN){echo 'Title of Notification function button';}else{echo '提示功能按鈕的標題';}?></a>
<a href="#" class="ui-btn ui-btn-w ui-mini ui-btn-icon-left ui-icon-camera"><?php if($_SESSION[tn]==PRC){echo '自拍按钮标题';}else if($_SESSION[tn]==EN){echo 'Title of Photo taking button';}else{echo '自拍按鈕標題';}?></a>
	<BR>
	<?php if($_SESSION[tn]==PRC){echo '此处是图像字体键入的备注';}else if($_SESSION[tn]==EN){echo 'Remark of icon font entry';}else{echo '此處是圖像字體鍵入的備註';}?>
<BR>
</div>

</div>
</div><div class="ui-block-d">

<a href="#ntinfs" data-rel="popup" class="ui-btn ui-btn-b ui-btn-inline ui-corner-all ui-mini">? <?php if($_SESSION[tn]==PRC){echo '提示功能';}else if($_SESSION[tn]==EN){echo 'Notification function';}else{echo '提示功能';}?><?php if($_SESSION[tn]==PRC){echo '设定解释';}else if($_SESSION[tn]==EN){echo ' - Explanation';}else{echo '設定解釋';}?></a>
	<div data-role="popup" id="ntinfs"  data-position-to="window" data-theme="f"  class="ifrwidthp"><a href="#" class="popn ui-btn ui-btn-z ui-icon-delete ui-btn-icon-notext" data-rel="back"></a>
<br><p><b style="color:pink"><?php if($_SESSION[tn]==PRC){echo '使用';}else if($_SESSION[tn]==EN){echo 'Usage';}else{echo '使用';}?> </b>
	<?php if($_SESSION[tn]==PRC){echo '限合适的设备,是将笔记的事项加入手机内置的日历及提醒功能。';}else if($_SESSION[tn]==EN){echo 'This function is for specific device only. It is to add the diary item of calendar as event of APP user device\'s calendar with creating event notification.';}else{echo '限合適的設備,是將筆記的事項加入手機內置的日曆及提醒功能。';}?></p>
	<p><?php if($_SESSION[tn]==PRC){echo '若用户在日历的顶部点撀电邮符号的按钮<a href="#"  class="ui-btn ui-mini ui-btn-w ui-btn-inline ui-btn-icon-notext ui-icon-mail"></a>,键入提示日历称启用此功能。用户点撀特定日期旁的按钮<a href="#"  class="ui-btn ui-mini ui-btn-w ui-btn-inline ui-btn-icon-notext ui-icon-edit"></a>,再点撀时间符号按钮<a href="#"  class="ui-btn ui-mini ui-btn-w ui-btn-inline ui-btn-icon-notext ui-icon-clock"></a>,显示项目列表及提示表格,填入数据并点撀需设置提示的事项旁的时钟符号按钮<a href="#"  class="ui-btn ui-mini ui-btn-w ui-btn-inline"><span style="color:PINK" class="pigss-clock"></span></a>。';}else if($_SESSION[tn]==EN){echo 'APP user can click the email button<a href="#"  class="ui-btn ui-mini ui-btn-w ui-btn-inline ui-btn-icon-notext ui-icon-mail"></a> on the top part of calendar and enter the Notification calendar name to enable this function. APP user can click the edit icon button<a href="#"  class="ui-btn ui-mini ui-btn-w ui-btn-inline ui-btn-icon-notext ui-icon-edit"></a> of specific date and click the clock icon button<a href="#"  class="ui-btn ui-mini ui-btn-w ui-btn-inline ui-btn-icon-notext ui-icon-clock"></a> to show item list and notification data form. APP user can enter data to create notification and then click the <a href="#"  class="ui-btn ui-mini ui-btn-w ui-btn-inline"><span style="color:PINK" class="pigss-clock"></span></a> of related item to confirm it.';}else{echo '若用戶在日曆的頂部點撀電郵符號的按鈕<a href="#"  class="ui-btn ui-mini ui-btn-w ui-btn-inline ui-btn-icon-notext ui-icon-mail"></a>,鍵入提示日曆稱啟用此功能。用戶點撀特定日期旁的按鈕<a href="#"  class="ui-btn ui-mini ui-btn-w ui-btn-inline ui-btn-icon-notext ui-icon-edit"></a>,再點撀時間符號按鈕<a href="#"  class="ui-btn ui-mini ui-btn-w ui-btn-inline ui-btn-icon-notext ui-icon-clock"></a>,顯示項目列表及提示表格,填入數據並點撀需設置提示的事項旁的時鐘符號按鈕<a href="#"  class="ui-btn ui-mini ui-btn-w ui-btn-inline"><span style="color:PINK" class="pigss-clock"></span></a>。';}?></p>
	<p><?php if($_SESSION[tn]==PRC){echo '对巳设定的事项,在列表上显示日期符号<a href="#"  class="ui-btn ui-mini ui-btn-w ui-btn-inline ui-btn-icon-notext ui-icon-calendar"></a>是表示巳加入手机日历内,显示时间符号<a href="#"  class="ui-btn ui-mini ui-btn-w ui-btn-inline ui-btn-icon-notext ui-icon-clock"></a>是表示巳加入手机日历并设置提醒。若事项修改,符号被重设。对事项的修改或删除是不能对手机日历进行同样操作。';}else if($_SESSION[tn]==EN){echo 'In the calendar item list, the item with calendar icon<a href="#"  class="ui-btn ui-mini ui-btn-w ui-btn-inline ui-btn-icon-notext ui-icon-calendar"></a> means it is added as event to device calendar and the item with clock icon<a href="#"  class="ui-btn ui-mini ui-btn-w ui-btn-inline ui-btn-icon-notext ui-icon-clock"></a> means it is added as event to device calendar with notification data.';}else{echo '對巳設定的事項,在列表上顯示日期符號<a href="#"  class="ui-btn ui-mini ui-btn-w ui-btn-inline ui-btn-icon-notext ui-icon-calendar"></a>是表示巳加入手機日曆內,顯示時間符號<a href="#"  class="ui-btn ui-mini ui-btn-w ui-btn-inline ui-btn-icon-notext ui-icon-clock"></a>是表示巳加入手機日曆並設置提醒。若事項修改,符號被重設。對事項的修改或刪除是不能對手機日曆進行同樣操作。';}?></p>
	
	<p><?php if($_SESSION[tn]==PRC){echo '若用户未有填上提示数据并点撀列表上的项目,此操作变为修改用戶数据。';}else if($_SESSION[tn]==EN){echo 'If APP user does not enter the notification data and click a item title on the item list, it becomes process of APP user\'s data amendment.';}else{echo '若用戶未有填上提示數據並點撀列表上的項目,此操作變為修改用戶數據。';}?></p>
<hr>
<p><b style="color:blue"><?php if($_SESSION[tn]==PRC){echo '设定';}else if($_SESSION[tn]==EN){echo 'Settings';}else{echo '設定';}?> </b>
	<?php if($_SESSION[tn]==PRC){echo '以下项目在巳创建日历才能键入。';}else if($_SESSION[tn]==EN){echo 'These following items can be amended when calender created.';}else{echo '以下項目在巳創建日曆才能鍵入。';}?></p>
<hr>
<p><b style="color:pink"><?php if($_SESSION[tn]==PRC){echo '提示日历称键入项的标题';}else if($_SESSION[tn]==EN){echo 'Entry Title of Notification calendar name';}else{echo '提示日曆稱鍵入項的標題';}?></b>
	<?php if($_SESSION[tn]==PRC){echo '。';}else if($_SESSION[tn]==EN){echo 'You need to enter this title to enable this function in your design.';}else{echo '填入此標題才能啟用此功能。';}?></p>
<hr>
<p><b style="color:pink"><?php if($_SESSION[tn]==PRC){echo '事项起始时间键入项的标题';}else if($_SESSION[tn]==EN){echo 'Entry Title of Event starting time';}else{echo '事項起始時間鍵入項的標題';}?></b>
	<?php if($_SESSION[tn]==PRC){echo '须设置事项的起始时间才能将事项加入手机日历。用户键入时间的格式是HH:MM。此项是此键入项的标题。';}else if($_SESSION[tn]==EN){echo 'APP user can enter the starting time of item for adding it to device calendar. The format is HH:MM. This item is about the title of this data entry.';}else{echo '須設置事項的起始時間才能將事項加入手機日曆。用戶鍵入時間的格式是HH:MM。此項是此鍵入項的標題。';}?></p>
<hr>
<p><b style="color:pink"><?php if($_SESSION[tn]==PRC){echo '首次提醒时间键入项的标题';}else if($_SESSION[tn]==EN){echo 'Entry Title of First notification time';}else{echo '首次提醒時間鍵入項的標題';}?>/<?php if($_SESSION[tn]==PRC){echo '再次提醒时间键入项的标题';}else if($_SESSION[tn]==EN){echo 'Entry Title of Second notification time';}else{echo '再次提醒時間鍵入項的標題';}?></b>
	<?php if($_SESSION[tn]==PRC){echo '对起始时间计起的显示首次或再次提醒的分钟,填整数。提醒户法是按手机的设定。此项是此键入项的标题。';}else if($_SESSION[tn]==EN){echo 'The notification timing is counted from the starting time of calendar item. The unit is minute. The notification format depends on the APP user device\'s setting. APP user needs to enter integer. This item is about the title of this data entry.';}else{echo '對起始時間計起的顯示首次或再次提醒的分鐘,填整數。提醒戶法是按手機的設定。此項是此鍵入項的標題。';}?></p>
</div>

<a href="#titlenformbtnPOP" data-rel="popup" class="ui-btn ui-btn-b ui-btn-inline ui-corner-all ui-mini ui-icon-clock ui-btn-icon-left">?</a>
<div data-role="popup" id="titlenformbtnPOP" style="width:100%;background-color:#707070;padding:15px;width:780px" data-position-to="window" data-theme="f"><a href="#" class="ui-btn ui-corner-all ui-icon-delete ui-btn-icon-notext ui-btn-right" data-rel="back"></a>
<a href="#"  class="ui-btn ui-btn-z ui-btn-inline ui-btn-icon-notext ui-icon-carat-l"></a><div id="titlembntform" style="width:80%">
<?php if($_SESSION[tn]==PRC){echo '事项起始时间的标题';}else if($_SESSION[tn]==EN){echo 'Title of Event starting time';}else{echo '事項起始時間的標題';}?><input type="text" data-corners="false"  data-theme="f" id="35mbitemtm1">
<?php if($_SESSION[tn]==PRC){echo '首次提醒时间的标题';}else if($_SESSION[tn]==EN){echo 'Title of First notification time';}else{echo '首次提醒時間的標題';}?><input type="number" data-corners="false"  data-theme="f" id="35mbntm1"><?php if($_SESSION[tn]==PRC){echo '再次提醒时间的标题';}else if($_SESSION[tn]==EN){echo 'Title of Second notification time';}else{echo '再次提醒時間的標題';}?><input type="number" data-corners="false"  data-theme="f" id="35mbntms1"></div><div class="vws ui-grid-solo" style="width:80%"><li class="ui-btn ui-btn-w">example</li><li class="ui-btn ui-btn-w">example</li></div>
<?php if($_SESSION[tn]==PRC){echo '笔记修改列表的备注';}else if($_SESSION[tn]==EN){echo 'Remark of diary amendment list';}else{echo '筆記修改列表的備注';}?></div>
</div>





	
	</FORM></div>
<hr><div>

	
<?php
if($htm[$pn]){
if($_SESSION[tn]==PRC){echo '您的设计';}else if($_SESSION[tn]==EN){echo 'Your design';}else{echo '您的設計';}
	$htm[$pn] = str_replace('(images/','(../panel/'.$roww[pjnbr].'/images/',$htm[$pn]);
	echo '<!--part'.str_replace('"images/','"../panel/'.$roww[pjnbr].'/images/',$htm[$pn]);
if(file_exists('../panel/'.$roww[pjnbr].'/web'.$ap.'.js')){
	$htjs = file_get_contents('../panel/'.$roww[pjnbr].'/web'.$ap.'.js');	
	$htjshtm = explode('/*webjs'.$pn.'*/',$htjs);	
	if($htjshtm[1]){
	echo '<script>localStorage.clear();$(document).on("pageshow", "#appageone", function(){'.$htjshtm[1].' });</script>';
	;}
					
;}	
}

?>
<hr>	

<?php if($_SESSION[tn]==PRC){echo '例';}else if($_SESSION[tn]==EN){echo 'Example';}else{echo '例';}?><br>
<a href="#infsn" data-rel="popup" class="ui-btn ui-btn-b ui-btn-inline ui-corner-all ui-mini">? <?php if($_SESSION[tn]==PRC){echo '解释';}else if($_SESSION[tn]==EN){echo 'Explanation';}else{echo '解釋';}?></a>
	<div data-role="popup" id="infsn" style="min-width:300px;max-width:85%" data-position-to="window" data-theme="f"><a href="#" class="ui-btn ui-corner-all ui-icon-delete ui-btn-icon-notext ui-btn-right" data-rel="back"></a>

	<p><b style="color:pink"><?php if($_SESSION[tn]==PRC){echo '试用';}else if($_SESSION[tn]==EN){echo 'Try';}else{echo '試用';}?></b>
	<?php if($_SESSION[tn]==PRC){echo '只能在您的设计上才能写入数据。';}else if($_SESSION[tn]==EN){echo 'You can enter data for your design only. This example is for reference only.';}else{echo '只能在您的設計上才能寫入數據。';}?></p>
	<?php //<p>if($_SESSION[tn]==PRC){echo '日历右上方的日历浏览按钮只限电脑设备。';}else if($_SESSION[tn]==EN){echo 'The calendar shifting buttons at top right position are only for computer devices.';}else{echo '日曆右上方的日曆瀏覽按鈕只限電腦設備。';}</p>?>
	<p><?php if($_SESSION[tn]==PRC){echo '日历提示功能丶拍照及电邮备份功能限特定的手机系统,e.g. 特定的Android或IOS。';}else if($_SESSION[tn]==EN){echo 'The notification function for calendar item event, phototaking and email function for backup are for specific devices with specific mobile operating systems only. e.g. specific Andriod and IOS.';}else{echo '日曆提示功能、拍照及電郵備份功能限特定的手機設備及系統,e.g.特定的Android或IOS。';}?></p>
	<p><?php if($_SESSION[tn]==PRC){echo '互联数据的日历提示功能预设巳启用,用户能关闭此功能。';}else if($_SESSION[tn]==EN){echo 'The notification function is enable when initial installation. APP user can turn it off.';}else{echo '互聯數據的日曆提示功能預設巳啟用,用戶能關閉此功能。';}?></p>
	<hr>
	<p><b style="color:pink"><?php if($_SESSION[tn]==PRC){echo '日记';}else if($_SESSION[tn]==EN){echo 'Diary';}else{echo '日記';}?></b></p>
	<p><?php if($_SESSION[tn]==PRC){echo '用户能点撀日期旁的按钮,填写日记,首项填标题,次项填内容,三项填附件标题,四项填附件档案链结,亦能在标题加图像字体及相片。<br>日记项目在日期区域内显示标题,用户点撀标题显示内容。若須刪除日記項目,須點撀日期旁的按鈕,再點撀相關列表,再點撀標題的刪除<a href="#"  class="ui-btn ui-mini ui-btn-w ui-btn-inline">X</a>按鈕。';}else if($_SESSION[tn]==EN){echo 'APP user can click the edit icon button near date title on the calendar to fill in diary data. The first field of the data form is diary title, the second field is diary content , the third field is title of attactment and the fouth field is the link of attactment.  APP user can also add icon font or picture to the diary event. If APP user wants to delete an event of date, the procedure is to click the edit icon button, click a list button and click a deletion button <a href="#"  class="ui-btn ui-mini ui-btn-w ui-btn-inline">X</a> of related item title.';}else{echo '用戶能點撀日期旁的按鈕,填寫日記,首項填標題,次項填內容,三項填附件標題,四項填附件檔案鏈結,亦能在標題加圖像字體及相片。<br>日記項目在日期區域內顯示標題,用戶點撀標題顯示內容。若須刪除日記項目,須點撀日期旁的按鈕,再點撀相關列表,再點撀標題的刪除<a href="#"  class="ui-btn ui-mini ui-btn-w ui-btn-inline">X</a>按鈕。';}?></p>
	<p><?php if($_SESSION[tn]==PRC){echo '用户能添加相片丶特定互联视频及音頻丶特定的互联网网页或应用页作为附件,用户点撀档名显示相关内容。附件没数量限制。';}else if($_SESSION[tn]==EN){echo 'APP user can add specific Internet audio, video or web page or APP page as attachment. APP user clicks on the filename to view the related content. It is no limitation of attachment quantity.';}else{echo '用户能添加相片、特定互聯視頻及音頻、特定的互聯網網頁或應用頁作為附件,用戶點撀檔名顯示相關內容。附件沒數量限制。';}?></p>
	<p><?php if($_SESSION[tn]==PRC){echo '用户点撀日历顶部的电邮符号并键入电邮作设定,在合适的设备能将用户所有点撀\'数据键入按钮\'的笔记操作及相关内容电邮至特定电邮户口。';}else if($_SESSION[tn]==EN){echo 'APP user clicks the mail button on the top section of calendar and enter an email as setting. The related content of diary by clicking confirmation button can be sent to the specific email on appropriate device.';}else{echo '用戶點撀日曆頂部的電郵符號並鍵入電郵作設定,在合適的設備能將用戶所有點撀\'數據鍵入按鈕\'的筆記操作及相關內容電郵至特定電郵戶口。';}?><?php if($_SESSION[tn]==PRC){echo '此项限用户键入的数据,不包括互联数据 [您的数据]。';}else if($_SESSION[tn]==EN){echo 'This function is for APP user\'s data but not for the Internet data [your data].';}else{echo '此項限用戶鍵入的數據,不包括互聯數據 [您的數據]。';}?></p>
	<p><?php if($_SESSION[tn]==PRC){echo '用户点撀日历顶部的电邮符号并键入日历提示标题,在合适的设备能将用户的数据加入设备的相关日历应用,并作出提示。不键入标题,关闭相关互联数据的此功能。';}else if($_SESSION[tn]==EN){echo 'APP user clicks the mail button on the top section of calendar and enter an calendar title as setting. The related content of diary by clicking confirmation button can be sent to the specific email on appropriate device.';}else{echo '用戶點撀日曆頂部的電郵符號並鍵入日曆提示標題,在合適的設備能將用戶的數據加入設備的相關日曆應用,並作出提示。不鍵入標題,關閉相關互聯數據的此功能。';}?></p>	<hr>

	
	
<p><b style="color:pink"><?php if($_SESSION[tn]==PRC){echo '数据';}else if($_SESSION[tn]==EN){echo 'Data';}else{echo '數據';}?></b>
<?php if($_SESSION[tn]==PRC){echo '您能在特定日期显示应用内或互联网伺服器的特定格式json数据。';}else if($_SESSION[tn]==EN){echo 'You can only show json format data on specific date. The data can be APP data or the Internet data.';}else{echo '您能在特定日期顯示應用內或互聯網伺服器的特定格式json數據。';}?></p>
<hr>
<p><b style="color:pink"><?php if($_SESSION[tn]==PRC){echo '浏览';}else if($_SESSION[tn]==EN){echo 'Browsing';}else{echo '瀏覽';}?></b>
	<?php if($_SESSION[tn]==PRC){echo '用户能拖拽画面浏览3个月日期,点撀左上角按钮能变更月份。';}else if($_SESSION[tn]==EN){echo 'APP user can swipe screen to browse three month data and click the top left button to alter month value.';}else{echo '用戶能拖拽畫面瀏覽3個月日期,點撀左上角按鈕能變更月份。';}?></p>
	<p><?php if($_SESSION[tn]==PRC){echo '用户能点撀一个含上月号的按钮,浏览上月数据。';}else if($_SESSION[tn]==EN){echo 'APP user can click the last month named button to view last month data.';}else{echo '用戶能點撀一個含上月號的按鈕,瀏覽上月數據。';}?></p>
	<hr>
	<p><b style="color:pink"><?php if($_SESSION[tn]==PRC){echo '背景';}else if($_SESSION[tn]==EN){echo 'Background';}else{echo '背景';}?></b>
	<?php if($_SESSION[tn]==PRC){echo '您能使用互联网丶应用内或特定颜色作背景。';}else if($_SESSION[tn]==EN){echo 'You can use the Internet\'s picture, APP\'s picture or specific color as background.';}else{echo '您能使用互聯網、應用內或特定顏色作背景。';}?></p>
	<hr>
	<p><b style="color:pink"><?php if($_SESSION[tn]==PRC){echo '日记图像数量';}else if($_SESSION[tn]==EN){echo 'Diary image quantity';}else{echo '日記圖像數量';}?></b>
	<?php if($_SESSION[tn]==PRC){echo '在数据项目或日记项目内加图像,是关於\'日记图像数量\'。用户能在使用日记功能时选加图像。或您在编号数据时调用图像。';}else if($_SESSION[tn]==EN){echo 'Adding picture to diary items is relating to the diary image quantity function. APP user can select picture for diary item or you can use the picture for your data items.';}else{echo '在數據項目或日記項目內加圖像,是關於\'日記圖像數量\'。用戶能在使用日記功能時選加圖像。或您在編寫數據時調用圖像。';}?></p>
	
	</div>
	
<div class="ui-grid-solo">
<div style="background-color:rgba(0, 0, 0, 0.5); color:#FFFFFF;"><span id="15owls1"></span>&nbsp;<a href="#" id="15shfl1" class="15shfl1 ui-btn ui-btn-z ui-btn-inline ui-btn-icon-notext ui-icon-carat-l"></a>&nbsp;<a href="#" id="15shfr1" class="15shfr1 ui-btn ui-btn-z ui-btn-inline ui-btn-icon-notext ui-icon-carat-r"></a><a href="#15mailvclr1" data-rel="popup" class="ui-btn ui-btn-z ui-btn-inline ui-btn-icon-notext ui-icon-mail"></a><a href="#15dnpopn1" data-rel="popup" class="ui-btn ui-btn-z ui-btn-inline ui-btn-icon-notext ui-icon-info"></a><div id="15dnpopn1" data-theme="f" class="ifrwidthpn"  data-corners="false" data-role="popup"><a href="#" data-rel="back" class="popn ui-btn ui-btn-z ui-btn-icon-notext ui-icon-delete"></a><iframe style="width:100%" src="vw.html" seamless frameBorder="0"></iframe></div></div>
<div id="15mailvclr1" class="ui-content"  data-theme="a"  data-corners="false" data-role="popup"><a href="#" data-rel="back" class="ui-btn ui-btn-z ui-btn-icon-notext ui-icon-delete"></a><HR><input type="email"  data-theme="f"  data-corners="false"/><a href="#" id="15mailvluclr1" class="ui-btn ui-btn-z ui-btn-icon-notext ui-icon-check"></a><?php if($_SESSION[tn]==PRC){echo '电邮设置按钮的标题';}else if($_SESSION[tn]==EN){echo 'Title of Email button';}else{echo '電郵設置按鈕的標題';}?>
<HR><input type="text"  data-theme="f"  data-corners="false"/><a href="#" id="15gclnvluclr1" class="ui-btn ui-btn-z ui-btn-icon-notext ui-icon-check"></a><?php if($_SESSION[tn]==PRC){echo '提示日历称键入项的标题';}else if($_SESSION[tn]==EN){echo 'Title of Notification calendar name';}else{echo '提示日曆稱鍵入項的標題';}?>
</div>
<div  style="background-color:rgb(0, 0, 0);" id="15owlcln1"><div class="swiper-wrapper">
  <div class="swiper-slide" style="color:black;">
  <div style="background-color:rgb(0, 0, 0);" id="15owlmn1n1"></div>
  <div style="background-color:rgb(0, 0, 0);" id="15owlmn1n2"></div>  
  </div>
  <div class="swiper-slide" style="color:black;">
  <div style="background-color:rgb(0, 0, 0);" id="15owlmn1n3"></div>
  <div style="background-color:rgb(0, 0, 0);" id="15owlmn1n4"></div> 
  </div>
  <div class="swiper-slide" style="color:black;">
  <div style="background-color:rgb(0, 0, 0);" id="15owlmn1n5"></div>
  <div style="background-color:rgb(0, 0, 0);" id="15owlmn1n6"></div>  
  </div>
</div>  
</div>


<div id="15owlmns1"></div>
<div id="15lndata1" data-theme="a" style="padding:5px;" data-role="popup" data-corners="false" class="ifrwidthps"><div id="15lnfdata1"><a href="#" data-rel="back" class="popn ui-btn ui-mini ui-btn-z ui-btn-inline ui-btn-icon-notext ui-icon-delete"></a>
<span id="15lndatn1"></span><div class="ui-btn-inline" id="15imgbtns1"></div><BR>
<a href="#" id="15pgbtns1" class="ui-btn ui-btn-a ui-mini ui-btn-inline ui-btn-icon-left ui-icon-check"><span class="pigss-pencil"></span><?php if($_SESSION[tn]==PRC){echo '键入按钮的标题';}else if($_SESSION[tn]==EN){echo 'Title of Enter data button';}else{echo '鍵入按鈕的標題';}?></a><span id="15iconbtns1" style="background-color:rgba(15, 145, 234, 0.4);color:pink"></span>
<div class="ui-grid-a"><div class="ui-block-a" style="width:85%"><?php if($_SESSION[tn]==PRC){echo '笔记标题键入的标题';}else if($_SESSION[tn]==EN){echo 'Title of diary title entry';}else{echo '筆記標題鍵入的標題';}?>
<input type="text"  data-theme="f" data-corners="false" id="15databtntitle1" data-clear-btn="true"></div><div class="ui-block-b" style="width:15%">&nbsp;</div></div><?php if($_SESSION[tn]==PRC){echo '笔记内容键入的标题';}else if($_SESSION[tn]==EN){echo 'Title of diary content entry';}else{echo '筆記內容鍵入的標題';}?>
<textarea  data-theme="f" data-corners="false" id="15databtn1" style="width:85%"></textarea>
<div class="ui-grid-solo" id="15vwifrhts1" data-role="controlgroup" data-mini="true"></div>
<div class="ui-grid-a"><div class="ui-block-a" style="width:85%"><?php if($_SESSION[tn]==PRC){echo '笔记链结键入的标题';}else if($_SESSION[tn]==EN){echo 'Title of diary link entry';}else{echo '筆記鏈結鍵入的標題';}?>
<input type="text"  data-theme="f" data-corners="false" id="15vwifrhtmn1" placeholder="" data-clear-btn="true"><span class="pigss-link" style="color:pink"></span><input type="text"  data-theme="f" data-corners="false" id="15vwifrhtm1" placeholder="" data-clear-btn="true"></div><div class="ui-block-b" style="width:15%">&nbsp;</div></div>
<div class="ui-grid-solo" id="15vwifrhts1" data-role="controlgroup" data-mini="true"></div>
<input type="hidden" id="15vwifrhtmv1"><a href="#" id="15pgtconbtn1" class="dylist ui-btn ui-btn-a ui-btn-inline ui-mini ui-btn-icon-left ui-icon-edit"><span class="pigss-bunny"></span><?php if($_SESSION[tn]==PRC){echo '图像字体键入的标题';}else if($_SESSION[tn]==EN){echo 'Title of icon font entry';}else{echo '圖像字體鍵入的標題';}?>
</a><a href="#" id="15sbtnvwbtn1" class="dylist ui-btn ui-btn-a ui-btn-inline ui-mini ui-btn-icon-left ui-icon-bullets"><?php if($_SESSION[tn]==PRC){echo '笔记修改列表按钮的标题';}else if($_SESSION[tn]==EN){echo 'Title of diary amendment list button';}else{echo '筆記修改列表按鈕的標題';}?>
</a><a href="#" id="15nformbtn1" class="dylist ui-btn ui-btn-a ui-btn-inline ui-mini ui-btn-icon-left ui-icon-clock"><span class="pigss-pencil"></span><?php if($_SESSION[tn]==PRC){echo '提示日历称键入项的标题';}else if($_SESSION[tn]==EN){echo 'Entry Title of Notification calendar name';}else{echo '提示日曆稱鍵入項的標題';}?>
</a></div></div>

<div id="15pgtconbtns1" data-theme="a" style="padding:15px;" data-corners="false" data-role="popup" class="ifrwidthps">
<a href="#"  class="ui-btn ui-btn-z ui-btn-inline ui-btn-icon-notext ui-icon-carat-l"></a>
<div class="vws ui-grid-solo" style="overflow-y:auto;">
<div data-mini="true" data-corners="false" style="width:85%;" id="15btnimg1"></div>
<div data-mini="true" data-corners="false" style="width:85%;">
	<a href="#" class="15iconbtn1 ui-btn ui-mini ui-btn-w ui-btn-inline" ids="airplanefly"><span class="pigss-airplanefly"></span></a>
	<a href="#" class="15iconbtn1 ui-btn ui-mini ui-btn-w ui-btn-inline" ids="bigsale"><span class="pigss-bigsale"></span></a>
	<a href="#" class="15iconbtn1 ui-btn ui-mini ui-btn-w ui-btn-inline" ids="bunny"><span class="pigss-bunny"></span></a>
	<a href="#" class="15iconbtn1 ui-btn ui-mini ui-btn-w ui-btn-inline" ids="coupon"><span class="pigss-coupon"></span></a>
	<a href="#" class="15iconbtn1 ui-btn ui-mini ui-btn-w ui-btn-inline" ids="discodancer"><span class="pigss-discodancer"></span></a>
	<a href="#" class="15iconbtn1 ui-btn ui-mini ui-btn-w ui-btn-inline" ids="drinks"><span class="pigss-drinks"></span></a>
	<a href="#" class="15iconbtn1 ui-btn ui-mini ui-btn-w ui-btn-inline" ids="gift"><span class="pigss-gift"></span></a>
	<a href="#" class="15iconbtn1 ui-btn ui-mini ui-btn-w ui-btn-inline" ids="gifts"><span class="pigss-gifts"></span></a>
	<a href="#" class="15iconbtn1 ui-btn ui-mini ui-btn-w ui-btn-inline" ids="music"><span class="pigss-music"></span></a>
	<a href="#" class="15iconbtn1 ui-btn ui-mini ui-btn-w ui-btn-inline" ids="newproduct"><span class="pigss-newproduct"></span></a>
	<a href="#" class="15iconbtn1 ui-btn ui-mini ui-btn-w ui-btn-inline" ids="panda"><span class="pigss-panda"></span></a>
	<a href="#" class="15iconbtn1 ui-btn ui-mini ui-btn-w ui-btn-inline" ids="pocketmoney"><span class="pigss-pocketmoney"></span></a>
	<a href="#" class="15iconbtn1 ui-btn ui-mini ui-btn-w ui-btn-inline" ids="salerecommed"><span class="pigss-salerecommed"></span></a>
	<a href="#" class="15iconbtn1 ui-btn ui-mini ui-btn-w ui-btn-inline" ids="santa"><span class="pigss-santa"></span></a>
	<a href="#" class="15iconbtn1 ui-btn ui-mini ui-btn-w ui-btn-inline" ids="sign-percent"><span class="pigss-sign-percent"></span></a>
	<a href="#" class="15iconbtn1 ui-btn ui-mini ui-btn-w ui-btn-inline" ids="tbn"><span class="pigss-tbn"></span></a>
	<a href="#" class="15iconbtn1 ui-btn ui-mini ui-btn-w ui-btn-inline" ids="valentinesday"><span class="pigss-valentinesday"></span></a>
	<a href="#" class="15iconbtn1 ui-btn ui-mini ui-btn-w ui-btn-inline" ids="laugh"><span class="pigss-laugh"></span></a>
	<a href="#" class="15iconbtn1 ui-btn ui-mini ui-btn-w ui-btn-inline" ids="loveface"><span class="pigss-loveface"></span></a>
	<a href="#" class="15iconbtn1 ui-btn ui-mini ui-btn-w ui-btn-inline" ids="noanswer"><span class="pigss-noanswer"></span></a>
	<a href="#" class="15iconbtn1 ui-btn ui-mini ui-btn-w ui-btn-inline" ids="noanswer1"><span class="pigss-noanswer1"></span></a>
	<a href="#" class="15iconbtn1 ui-btn ui-mini ui-btn-w ui-btn-inline" ids="noanswer2"><span class="pigss-noanswer2"></span></a>
	<a href="#" class="15iconbtn1 ui-btn ui-mini ui-btn-w ui-btn-inline" ids="notsmile"><span class="pigss-notsmile"></span></a>
	<a href="#" class="15iconbtn1 ui-btn ui-mini ui-btn-w ui-btn-inline" ids="notsmile1"><span class="pigss-notsmile1"></span></a>
	<a href="#" class="15iconbtn1 ui-btn ui-mini ui-btn-w ui-btn-inline" ids="sick"><span class="pigss-sick"></span></a>
	<a href="#" class="15iconbtn1 ui-btn ui-mini ui-btn-w ui-btn-inline" ids="smile"><span class="pigss-smile"></span></a>
	<a href="#" class="15iconbtn1 ui-btn ui-mini ui-btn-w ui-btn-inline" ids="smile1"><span class="pigss-smile1"></span></a>
	<a href="#" class="15iconbtn1 ui-btn ui-mini ui-btn-w ui-btn-inline" ids="smiling"><span class="pigss-smiling"></span></a>
	<a href="#" class="15iconbtn1 ui-btn ui-mini ui-btn-w ui-btn-inline" ids="smiling1"><span class="pigss-smiling1"></span></a>
	<a href="#" class="15iconbtn1 ui-btn ui-mini ui-btn-w ui-btn-inline" ids="smiling2"><span class="pigss-smiling2"></span></a>
	<a href="#" class="15iconbtn1 ui-btn ui-mini ui-btn-w ui-btn-inline" ids="surprised"><span class="pigss-surprised"></span></a>
	<a href="#" class="15iconbtn1 ui-btn ui-mini ui-btn-w ui-btn-inline" ids="surprised1"><span class="pigss-surprised1"></span></a>
	<a href="#" class="15iconbtn1 ui-btn ui-mini ui-btn-w ui-btn-inline" ids="thinking"><span class="pigss-thinking"></span></a>
	<a href="#" class="15iconbtn1 ui-btn ui-mini ui-btn-w ui-btn-inline" ids="tired"><span class="pigss-tired"></span></a>
	<a href="#" class="15iconbtn1 ui-btn ui-mini ui-btn-w ui-btn-inline" ids="tongue"><span class="pigss-tongue"></span></a>
	<a href="#" class="15iconbtn1 ui-btn ui-mini ui-btn-w ui-btn-inline" ids="tongue1"><span class="pigss-tongue1"></span></a>
	<a href="#" class="15iconbtn1 ui-btn ui-mini ui-btn-w ui-btn-inline" ids="tongue2"><span class="pigss-tongue2"></span></a>
	<a href="#" class="15iconbtn1 ui-btn ui-mini ui-btn-w ui-btn-inline" ids="tongue3"><span class="pigss-tongue3"></span></a>
	<a href="#" class="15iconbtn1 ui-btn ui-mini ui-btn-w ui-btn-inline" ids="tongue5"><span class="pigss-tongue5"></span></a>
	<a href="#" class="15iconbtn1 ui-btn ui-mini ui-btn-w ui-btn-inline" ids="winking"><span class="pigss-winking"></span></a>
	<a href="#" class="15iconbtn1 ui-btn ui-mini ui-btn-w ui-btn-inline" ids="yummy"><span class="pigss-yummy"></span></a>
	<a href="#" class="15iconbtn1 ui-btn ui-mini ui-btn-w ui-btn-inline" ids="angry"><span class="pigss-angry"></span></a>
	<a href="#" class="15iconbtn1 ui-btn ui-mini ui-btn-w ui-btn-inline" ids="confused"><span class="pigss-confused"></span></a>
	<a href="#" class="15iconbtn1 ui-btn ui-mini ui-btn-w ui-btn-inline" ids="cry"><span class="pigss-cry"></span></a>
	<a href="#" class="15iconbtn1 ui-btn ui-mini ui-btn-w ui-btn-inline" ids="chat"><span class="pigss-chat"></span></a>
	<a href="#" class="15iconbtn1 ui-btn ui-mini ui-btn-w ui-btn-inline" ids="user"><span class="pigss-user"></span></a>
	<a href="#" class="15iconbtn1 ui-btn ui-mini ui-btn-w ui-btn-inline" ids="location"><span class="pigss-location"></span></a>
	<a href="#" class="15iconbtn1 ui-btn ui-mini ui-btn-w ui-btn-inline" ids="mobile"><span class="pigss-mobile"></span></a>
	<a href="#" class="15iconbtn1 ui-btn ui-mini ui-btn-w ui-btn-inline" ids="screen"><span class="pigss-screen"></span></a>
	<a href="#" class="15iconbtn1 ui-btn ui-mini ui-btn-w ui-btn-inline" ids="mail"><span class="pigss-mail"></span></a>
	<a href="#" class="15iconbtn1 ui-btn ui-mini ui-btn-w ui-btn-inline" ids="help"><span class="pigss-help"></span></a>
	<a href="#" class="15iconbtn1 ui-btn ui-mini ui-btn-w ui-btn-inline" ids="videos"><span class="pigss-videos"></span></a>
	<a href="#" class="15iconbtn1 ui-btn ui-mini ui-btn-w ui-btn-inline" ids="pictures"><span class="pigss-pictures"></span></a>
	<a href="#" class="15iconbtn1 ui-btn ui-mini ui-btn-w ui-btn-inline" ids="link"><span class="pigss-link"></span></a>
	<a href="#" class="15iconbtn1 ui-btn ui-mini ui-btn-w ui-btn-inline" ids="search"><span class="pigss-search"></span></a>
	<a href="#" class="15iconbtn1 ui-btn ui-mini ui-btn-w ui-btn-inline" ids="download"><span class="pigss-download"></span></a>
	<a href="#" class="15iconbtn1 ui-btn ui-mini ui-btn-w ui-btn-inline" ids="pencil"><span class="pigss-pencil"></span></a>
	<a href="#" class="15iconbtn1 ui-btn ui-mini ui-btn-w ui-btn-inline" ids="info"><span class="pigss-info"></span></a>
	<a href="#" class="15iconbtn1 ui-btn ui-mini ui-btn-w ui-btn-inline" ids="article"><span class="pigss-article"></span></a>
	<a href="#" class="15iconbtn1 ui-btn ui-mini ui-btn-w ui-btn-inline" ids="clock"><span class="pigss-clock"></span></a>
	<a href="#" class="15iconbtn1 ui-btn ui-mini ui-btn-w ui-btn-inline" ids="star"><span class="pigss-star"></span></a>
	<a href="#" class="15iconbtn1 ui-btn ui-mini ui-btn-w ui-btn-inline" ids="heart"><span class="pigss-heart"></span></a>
	<a href="#" class="15iconbtn1 ui-btn ui-mini ui-btn-w ui-btn-inline" ids="file"><span class="pigss-file"></span></a>
	<a href="#" class="15iconbtn1 ui-btn ui-mini ui-btn-w ui-btn-inline" ids="feed"><span class="pigss-feed"></span></a>
	<a href="#" class="15iconbtn1 ui-btn ui-mini ui-btn-w ui-btn-inline" ids="refresh"><span class="pigss-refresh"></span></a>
	<a href="#" class="15iconbtn1 ui-btn ui-mini ui-btn-w ui-btn-inline" ids="images"><span class="pigss-images"></span></a>
	<a href="#" class="15iconbtn1 ui-btn ui-mini ui-btn-w ui-btn-inline" ids="heart2"><span class="pigss-heart2"></span></a>
	<a href="#" class="15iconbtn1 ui-btn ui-mini ui-btn-w ui-btn-inline" ids="bookmark"><span class="pigss-bookmark"></span></a>
	<a href="#" class="15iconbtn1 ui-btn ui-mini ui-btn-w ui-btn-inline" ids="">&nbsp;</a></div>
	<input type="text" id="15icon1"  data-corners="false">	
	<input type="text" id="15btnimgs1" data-corners="false">
</div><br><?php if($_SESSION[tn]==PRC){echo '图像字体键入的备注';}else if($_SESSION[tn]==EN){echo 'Remark of icon font entry';}else{echo '圖像字體鍵入的備註';}?></div></div>
<div id="15sbtnvwsv1" data-theme="a" style="padding:5px;overflow-y:auto;" data-role="popup" data-corners="false" class="ifrwidthps">
<a href="#"  class="ui-btn ui-btn-z ui-btn-inline ui-btn-icon-notext ui-icon-carat-l"></a><div id="15mbntform1" style="width:80%">
<?php if($_SESSION[tn]==PRC){echo '事项起始时间键入项的标题';}else if($_SESSION[tn]==EN){echo 'Entry Title of Event starting time';}else{echo '事項起始時間鍵入項的標題';}?>
<input type="text" data-corners="false"  data-theme="f" id="15mbitemtm1">
<?php if($_SESSION[tn]==PRC){echo '首次提醒时间键入项的标题';}else if($_SESSION[tn]==EN){echo 'Entry Title of First notification time';}else{echo '首次提醒時間鍵入項的標題';}?>
<input type="number" data-corners="false"  data-theme="f" id="15mbntm1"><?php if($_SESSION[tn]==PRC){echo '再次提醒时间键入项的标题';}else if($_SESSION[tn]==EN){echo 'Entry Title of Second notification time';}else{echo '再次提醒時間鍵入項的標題';}?><input type="number" data-corners="false"  data-theme="f" id="15mbntms1"></div><div id="15sbtnvw1" class="vws ui-grid-solo"></div><?php if($_SESSION[tn]==PRC){echo '笔记修改列表的备注';}else if($_SESSION[tn]==EN){echo 'Remark of diary amendment list';}else{echo '筆記修改列表的備注';}?></div>
<div id="15sbtnvws1" data-theme="a" style="padding:5px;overflow-y:auto;" data-role="popup" data-corners="false" class="ifrwidthps"><a href="#" data-rel="back" class="popn ui-btn ui-btn-z ui-btn-inline ui-btn-icon-notext ui-icon-delete"></a><span id="15sbtnvwsn1"></span></div>


<div id="15clrmdata1" data-inf="<?php if($_SESSION[tn]==PRC){echo '数据删除按钮';}else if($_SESSION[tn]==EN){echo 'Data deletion';}else{echo '數據刪除按鈕';}?>" data-theme="a" data-role="popup" data-corners="false" style="padding:5px;" class="ifrwidthps"><a href="#" data-rel="back" class="popn ui-btn ui-mini ui-btn-z ui-btn-inline ui-btn-icon-notext ui-icon-delete"></a><br>MM<select data-theme="b"><option value=""></option><option value="1">01</option><option value="2">02</option><option value="3">03</option>
<option value="4">04</option><option value="5">05</option><option value="6">06</option><option value="7">07</option>
<option value="8">08</option><option value="9">09</option><option value="10">10</option><option value="11">11</option><option value="12">12</option></select>
YYYY<input type="number" data-corners="false"  data-theme="f"><select data-theme="b"><option value="">Web DATA</option><option value="s">Your DATA</option></select><BR><BR>
<a href="#"  class="ui-btn ui-btn-w ui-icon-delete"><span class="pigss-pencil"></span></a><?php if($_SESSION[tn]==PRC){echo '数据删除按钮的备注';}else if($_SESSION[tn]==EN){echo 'Data deletion explanation';}else{echo '數據刪除按鈕的備注';}?>
</div>
</div>
<BR>
<div class="ui-grid-solo">
<?php if($_SESSION[tn]==PRC){echo '您的设计能像此图像在特定日期添加按钮。';}else if($_SESSION[tn]==EN){echo 'You can item on specific date as the following picture.';}else{echo '您的設計能像此圖像在特定日期添加按鈕。';}?><br>
<img id="img" src="images/btn.png"/>
</div>
<script>
$(document).on("pageshow", "#appageone", function(){ 
$("#15owlcln1").css("min-height",$(window).height()*0.85); $("#15lndata1").css("height",$(window).height()*0.85);
   $("#15sbtnvws1").css("height",$(window).height()*0.85); var navvlu =true;if(document.URL.indexOf('http://') === -1 && document.URL.indexOf('https://') === -1)navvlu= false;
   var swiper15v1 = new Swiper("#15owlcln1", {initialSlide: 1});
   var d = new Date();var mnh = d.getMonth()+1;var day = d.getDate();var yr = d.getFullYear(); 
var wdayn = ['S','M','T','W','T','F','S','S','M','T','W','T','F','S','S','M','T','W','T','F','S','S','M','T','W','T','F','S','S','M','T','W','T','F','S','S'];owln(d,mnh,day,yr,15,3,1,wdayn,'','',"5","","5");
	owls(d,mnh,day,yr,15,3,1,wdayn,'','',"5","","5",windowHeight);
});
</script>
<script src="../js/appsystem.js"></script>		
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
	<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

</div>
</body></html>


<?php 
$tdy=0;
$tdy=date('Y-m-d');
if($_POST[sun] and $pj and $_SESSION[guanyin1] and $_SESSION[guanyin1]==$_POST[guanyin1]){

	if($ap and !preg_match('/^[0-9]*$/', $ap))exit;
	if($pj and !preg_match('/^[0-9]*$/', $pj))exit;	
	if($pn and !preg_match('/^[0-9]*$/', $pn))exit;	
	if($_POST[bgtarea]){$bgtarea=htmlspecialchars($_POST[bgtarea]);$mbgtarea='style="background-color:'.htmlspecialchars($_POST[bgtarea]).'"';}else{$bgtarea='rgba(0, 0, 0, 0.5)';$mbgtarea='style="background-color:rgba(0, 0, 0, 0.5)"';}

			
	$popup .= '<!--data'.htmlspecialchars($_POST[sun]).'@#@'.htmlspecialchars($_POST[mon]).'@#@'.htmlspecialchars($_POST[tue]).'@#@'.htmlspecialchars($_POST[wed]).'@#@'.htmlspecialchars($_POST[thu]).'@#@'.htmlspecialchars($_POST[fri]).'@#@'.htmlspecialchars($_POST[sat]).'@#@'.htmlspecialchars($_POST[saturday]).'@#@'.htmlspecialchars($_POST[sunday]).'@#@'.htmlspecialchars($_POST[imgbg1]).'@#@'.htmlspecialchars($_POST[imgbg2]).'@#@'.htmlspecialchars($_POST[imgbg3]).'@#@'.htmlspecialchars($_POST[imgbg4]).'@#@'.htmlspecialchars($_POST[imgbg5]).'@#@'.htmlspecialchars($_POST[imgbg6]).'@#@'.htmlspecialchars($_POST[imgbg7]).'@#@'.htmlspecialchars($_POST[imgbg8]).'@#@'.htmlspecialchars($_POST[appdata]).'@#@'.htmlspecialchars($_POST[internet]).'@#@'.htmlspecialchars($_POST[btnimgs]).'@#@'.htmlspecialchars($_POST[btnimg]).'@#@'.htmlspecialchars($_POST[bgtarea]).'@#@'.htmlspecialchars($_POST[bgarea]).'@#@'.htmlspecialchars($_POST[info]).'@#@'.htmlspecialchars($_POST['mail']).'@#@'.htmlspecialchars($_POST[wdnenter]).'@#@'.htmlspecialchars($_POST[wdntitle]).'@#@'.htmlspecialchars($_POST[wdnmsg]).'@#@'.htmlspecialchars($_POST[wdnhref]).'@#@'.htmlspecialchars($_POST[wdnicon]).'@#@'.htmlspecialchars($_POST[wdnimgicon]).'@#@'.htmlspecialchars($_POST[wdnlist]).'@#@'.htmlspecialchars($_POST[sbtnvwbtntitle]).'@#@'.htmlspecialchars($_POST[gcln]).'@#@'.htmlspecialchars($_POST[gclntmtitle]).'@#@'.htmlspecialchars($_POST[gclnntitle]).'@#@'.htmlspecialchars($_POST[gclnnstitle]).'@#@'.htmlspecialchars($_POST[clrmdatabtn]).'@#@'.htmlspecialchars($_POST[clrmdataftr]).'@#@'.htmlspecialchars($_POST[nphoto]).'data!--><div style="background-color:'.$bgtarea.'; color:#FFFFFF;"><span id="'.$pj.$ap.'owls'.$pn.'"></span>&nbsp;<a href="#" id="'.$pj.$ap.'shfl'.$pn.'" style="padding:18px;" class="'.$pj.$ap.'shfl'.$pn.' ui-btn ui-btn-z ui-btn-inline ui-btn-icon-notext ui-icon-carat-l"></a>&nbsp;<a href="#" id="'.$pj.$ap.'shfr'.$pn.'" style="padding:18px;" class="'.$pj.$ap.'shfr'.$pn.' ui-btn ui-btn-z ui-btn-inline ui-btn-icon-notext ui-icon-carat-r"></a>';
	
	if($_POST['mail'] or $_POST['gcln']){$popup .= '<a href="#'.$pj.$ap.'mailvclr'.$pn.'" data-rel="popup" style="padding:18px;" class="ui-btn ui-btn-z ui-btn-inline ui-btn-icon-notext ui-icon-mail"></a>';}
	
	
	if($_POST[info]){$popup .= '<a href="#'.$pj.$ap.'dnpopn'.$pn.'" data-rel="popup" style="padding:18px;" class="ui-btn ui-btn-z ui-btn-inline ui-btn-icon-notext ui-icon-info"></a><div id="'.$pj.$ap.'dnpopn'.$pn.'" data-theme="f" class="ifrwidthpn"  data-corners="false" style="padding:5px;height: 100%;width: 100%;top:0;left:-15px;" data-role="popup"><a href="#" data-rel="back" class="popn ui-btn ui-btn-z ui-btn-icon-notext ui-icon-delete"></a><iframe style="width:100%" src="'.htmlspecialchars($_POST[info]).'" seamless frameBorder="0"></iframe></div>';}
		
	$popup .= '</div>
<div id="'.$pj.$ap.'mailvclr'.$pn.'" class="ui-content"  data-theme="a"  data-corners="false" data-role="popup"><a href="#" style="padding:22px;" data-rel="back" class="ui-btn ui-btn-z ui-btn-icon-notext ui-icon-delete"></a>';
if($_POST['mail'])$popup .= '<HR><input type="email"  data-theme="f"  data-corners="false"/><a href="#" id="'.$pj.$ap.'mailvluclr'.$pn.'" style="padding:22px;" class="ui-btn ui-btn-z ui-btn-icon-notext ui-icon-check"></a>'.htmlspecialchars($_POST['mail']);
if($_POST['gcln'])$popup .= '<HR><input type="text"  data-theme="f"  data-corners="false"/><a href="#" id="'.$pj.$ap.'gclnvluclr'.$pn.'" style="padding:22px;" class="ui-btn ui-btn-z ui-btn-icon-notext ui-icon-check"></a>'.htmlspecialchars($_POST['gcln']);
$popup .= '</div>
<div  style="background-color:rgb(0, 0, 0);" id="'.$pj.$ap.'owlcln'.$pn.'">';
			function imgbg($imgbg){
			if(strpos($imgbg,'http://')!==false or strpos($imgbg,'https://')!==false){$images = '';}else{$images = 'images/';}
			if(strpos($imgbg,'#')!==false or strpos($imgbg,'rgba(')!==false  or strpos($imgbg,'rgb(')!==false){$bghtml = 'background-color:'.htmlspecialchars($imgbg).';';}
			else if(strpos($imgbg,'[xy]')!==false){$bghtml = 'background-image:url('.$images.htmlspecialchars($imgbg).');';}
			else{$bghtml = 'background-image:url('.$images.htmlspecialchars($imgbg).');background-size:100%;background-repeat:repeat-y;';}
			return 'style="'.$bghtml.'"';
			;}
			
			if($_POST[imgbg1]){$imgbg1 =  imgbg($_POST[imgbg1]);}else{$imgbg1 = 'style="background-color:rgb(0, 0, 0);"';}
			if($_POST[imgbg2]){$imgbg2 =  imgbg($_POST[imgbg2]);}else{$imgbg2 = 'style="background-color:rgb(0, 0, 0);"';}
			if($_POST[imgbg3]){$imgbg3 =  imgbg($_POST[imgbg3]);}else{$imgbg3 = 'style="background-color:rgb(0, 0, 0);"';}
			if($_POST[imgbg4]){$imgbg4 =  imgbg($_POST[imgbg4]);}else{$imgbg4 = 'style="background-color:rgb(0, 0, 0);"';}
			if($_POST[imgbg5]){$imgbg5 =  imgbg($_POST[imgbg5]);}else{$imgbg5 = 'style="background-color:rgb(0, 0, 0);"';}
			if($_POST[imgbg6]){$imgbg6 =  imgbg($_POST[imgbg6]);}else{$imgbg6 = 'style="background-color:rgb(0, 0, 0);"';}
			if($_POST[imgbg7]){$imgbg7 =  imgbg($_POST[imgbg7]);}else{$imgbg7 = 'style="background-color:rgb(0, 0, 0);"';}
			if($_POST[imgbg8]){$imgbg8 =  imgbg($_POST[imgbg8]);}else{$imgbg8 = 'style="background-color:rgb(0, 0, 0);"';}

if(!$roww[theme]){$fontclr = 'color:black;';$fontclrs = 'style="color:black;"';	}		
$popup .= '<div class="swiper-wrapper">
  <div class="swiper-slide" '.$fontclrs.'>
  <div '.$imgbg1.' id="'.$pj.$ap.'owlmn'.$pn.'n1"></div>
  <div '.$imgbg2.' id="'.$pj.$ap.'owlmn'.$pn.'n2"></div>  
  </div>
  <div class="swiper-slide" '.$fontclrs.'>
  <div '.$imgbg3.' id="'.$pj.$ap.'owlmn'.$pn.'n3"></div>
  <div '.$imgbg4.' id="'.$pj.$ap.'owlmn'.$pn.'n4"></div> 
  </div>
  <div class="swiper-slide" '.$fontclrs.'>
  <div '.$imgbg5.' id="'.$pj.$ap.'owlmn'.$pn.'n5"></div>
  <div '.$imgbg6.' id="'.$pj.$ap.'owlmn'.$pn.'n6"></div>  
  </div>
</div>  
</div>


<div id="'.$pj.$ap.'owlmns'.$pn.'"></div>
<div id="'.$pj.$ap.'lndata'.$pn.'" data-theme="a" style="padding:5px;height: 100%;width: 100%;top:0;left:-15px;" data-role="popup" data-corners="false" class="ifrwidthps"><div id="'.$pj.$ap.'lnfdata'.$pn.'"><a href="#" data-rel="back" class="popn ui-btn ui-mini ui-btn-z ui-btn-inline ui-btn-icon-notext ui-icon-delete"></a>
<span id="'.$pj.$ap.'lndatn'.$pn.'"></span><div class="ui-btn-inline" id="'.$pj.$ap.'imgbtns'.$pn.'"></div><BR>
<a href="#" id="'.$pj.$ap.'pgbtns'.$pn.'" class="ui-btn ui-btn-w ui-mini ui-btn-inline ui-btn-icon-left ui-icon-check"><span class="pigss-pencil"></span>'.htmlspecialchars($_POST[wdnenter]).'</a><span id="'.$pj.$ap.'iconbtns'.$pn.'" style="background-color:rgba(35, 145, 234, 0.4);color:pink;"></span><BR>';
if($_POST[wdntitle])$popup .= htmlspecialchars($_POST[wdntitle]);
$popup .= '<input type="text"  data-theme="f" data-corners="false" id="'.$pj.$ap.'databtntitle'.$pn.'" data-clear-btn="true">';
if($_POST[wdnmsg])$popup .= htmlspecialchars($_POST[wdnmsg]);
$popup .= '<textarea  data-theme="f" data-corners="false" id="'.$pj.$ap.'databtn'.$pn.'"></textarea>
<div class="ui-grid-solo" id="'.$pj.$ap.'vwifrhts'.$pn.'" data-role="controlgroup" data-mini="true"></div>';

if($_POST[wdnhref])$popup .= htmlspecialchars($_POST[wdnhref]);
$popup .= '<input type="text"  data-theme="f" data-corners="false" id="'.$pj.$ap.'vwifrhtmn'.$pn.'" placeholder="" data-clear-btn="true"><span class="pigss-link" style="color:pink"></span><input type="text"  data-theme="f" data-corners="false" id="'.$pj.$ap.'vwifrhtm'.$pn.'" placeholder="" data-clear-btn="true">
<div class="ui-grid-solo" id="'.$pj.$ap.'vwifrhts'.$pn.'" data-role="controlgroup" data-mini="true"></div>
<input type="hidden" id="'.$pj.$ap.'vwifrhtmv'.$pn.'">';

$popup .= '<a href="#" id="'.$pj.$ap.'pgtconbtn'.$pn.'" class="ui-btn ui-btn-w ui-mini ui-btn-icon-left ui-icon-edit"><span class="pigss-bunny"></span>'.htmlspecialchars($_POST[wdnicon]).'</a>';
$popup .= '<a href="#" id="'.$pj.$ap.'sbtnvwbtn'.$pn.'" class="ui-btn ui-btn-w ui-mini ui-btn-icon-left ui-icon-bullets"><span class="pigss-pencil"></span>'.htmlspecialchars($_POST[sbtnvwbtntitle]).'</a>';
if($_POST[gcln])$popup .= '<a href="#" id="'.$pj.$ap.'nformbtn'.$pn.'" class="ui-btn ui-btn-w ui-mini ui-btn-icon-left ui-icon-clock"><span class="pigss-pencil"></span>'.htmlspecialchars($_POST[gcln]).'</a>';
if($_POST[nphoto])$popup .= '<a href="#" id="'.$pj.$ap.'nphoto'.$pn.'" onclick="getPhoto();" class="ui-btn ui-btn-w ui-mini ui-btn-icon-left ui-icon-camera">'.htmlspecialchars($_POST[nphoto]).'</a>';
$popup .= '</div></div>

<div id="'.$pj.$ap.'pgtconbtns'.$pn.'" data-theme="a" style="padding:5px;height: 100%;width: 100%;top:0;left:-15px;" data-corners="false" data-role="popup" class="ifrwidthps">
<a href="#" style="padding:22px;" class="ui-btn ui-btn-z ui-btn-inline ui-btn-icon-notext ui-icon-carat-l"></a>
<div class="vws ui-grid-solo webkitm" style="overflow-y:auto;">
<div data-mini="true" data-corners="false" style="width:85%;" id="'.$pj.$ap.'btnimg'.$pn.'"></div>
<div data-mini="true" data-corners="false" style="width:85%;">
	<a href="#" class="'.$pj.$ap.'iconbtn'.$pn.' ui-btn ui-mini ui-btn-w ui-btn-inline" ids="airplanefly"><span class="pigss-airplanefly"></span></a>
	<a href="#" class="'.$pj.$ap.'iconbtn'.$pn.' ui-btn ui-mini ui-btn-w ui-btn-inline" ids="bigsale"><span class="pigss-bigsale"></span></a>
	<a href="#" class="'.$pj.$ap.'iconbtn'.$pn.' ui-btn ui-mini ui-btn-w ui-btn-inline" ids="bunny"><span class="pigss-bunny"></span></a>
	<a href="#" class="'.$pj.$ap.'iconbtn'.$pn.' ui-btn ui-mini ui-btn-w ui-btn-inline" ids="coupon"><span class="pigss-coupon"></span></a>
	<a href="#" class="'.$pj.$ap.'iconbtn'.$pn.' ui-btn ui-mini ui-btn-w ui-btn-inline" ids="discodancer"><span class="pigss-discodancer"></span></a>
	<a href="#" class="'.$pj.$ap.'iconbtn'.$pn.' ui-btn ui-mini ui-btn-w ui-btn-inline" ids="drinks"><span class="pigss-drinks"></span></a>
	<a href="#" class="'.$pj.$ap.'iconbtn'.$pn.' ui-btn ui-mini ui-btn-w ui-btn-inline" ids="gift"><span class="pigss-gift"></span></a>
	<a href="#" class="'.$pj.$ap.'iconbtn'.$pn.' ui-btn ui-mini ui-btn-w ui-btn-inline" ids="gifts"><span class="pigss-gifts"></span></a>
	<a href="#" class="'.$pj.$ap.'iconbtn'.$pn.' ui-btn ui-mini ui-btn-w ui-btn-inline" ids="music"><span class="pigss-music"></span></a>
	<a href="#" class="'.$pj.$ap.'iconbtn'.$pn.' ui-btn ui-mini ui-btn-w ui-btn-inline" ids="newproduct"><span class="pigss-newproduct"></span></a>
	<a href="#" class="'.$pj.$ap.'iconbtn'.$pn.' ui-btn ui-mini ui-btn-w ui-btn-inline" ids="panda"><span class="pigss-panda"></span></a>
	<a href="#" class="'.$pj.$ap.'iconbtn'.$pn.' ui-btn ui-mini ui-btn-w ui-btn-inline" ids="pocketmoney"><span class="pigss-pocketmoney"></span></a>
	<a href="#" class="'.$pj.$ap.'iconbtn'.$pn.' ui-btn ui-mini ui-btn-w ui-btn-inline" ids="salerecommed"><span class="pigss-salerecommed"></span></a>
	<a href="#" class="'.$pj.$ap.'iconbtn'.$pn.' ui-btn ui-mini ui-btn-w ui-btn-inline" ids="santa"><span class="pigss-santa"></span></a>
	<a href="#" class="'.$pj.$ap.'iconbtn'.$pn.' ui-btn ui-mini ui-btn-w ui-btn-inline" ids="sign-percent"><span class="pigss-sign-percent"></span></a>
	<a href="#" class="'.$pj.$ap.'iconbtn'.$pn.' ui-btn ui-mini ui-btn-w ui-btn-inline" ids="tbn"><span class="pigss-tbn"></span></a>
	<a href="#" class="'.$pj.$ap.'iconbtn'.$pn.' ui-btn ui-mini ui-btn-w ui-btn-inline" ids="valentinesday"><span class="pigss-valentinesday"></span></a>
	<a href="#" class="'.$pj.$ap.'iconbtn'.$pn.' ui-btn ui-mini ui-btn-w ui-btn-inline" ids="laugh"><span class="pigss-laugh"></span></a>
	<a href="#" class="'.$pj.$ap.'iconbtn'.$pn.' ui-btn ui-mini ui-btn-w ui-btn-inline" ids="loveface"><span class="pigss-loveface"></span></a>
	<a href="#" class="'.$pj.$ap.'iconbtn'.$pn.' ui-btn ui-mini ui-btn-w ui-btn-inline" ids="noanswer"><span class="pigss-noanswer"></span></a>
	<a href="#" class="'.$pj.$ap.'iconbtn'.$pn.' ui-btn ui-mini ui-btn-w ui-btn-inline" ids="noanswer1"><span class="pigss-noanswer1"></span></a>
	<a href="#" class="'.$pj.$ap.'iconbtn'.$pn.' ui-btn ui-mini ui-btn-w ui-btn-inline" ids="noanswer2"><span class="pigss-noanswer2"></span></a>
	<a href="#" class="'.$pj.$ap.'iconbtn'.$pn.' ui-btn ui-mini ui-btn-w ui-btn-inline" ids="notsmile"><span class="pigss-notsmile"></span></a>
	<a href="#" class="'.$pj.$ap.'iconbtn'.$pn.' ui-btn ui-mini ui-btn-w ui-btn-inline" ids="notsmile1"><span class="pigss-notsmile1"></span></a>
	<a href="#" class="'.$pj.$ap.'iconbtn'.$pn.' ui-btn ui-mini ui-btn-w ui-btn-inline" ids="sick"><span class="pigss-sick"></span></a>
	<a href="#" class="'.$pj.$ap.'iconbtn'.$pn.' ui-btn ui-mini ui-btn-w ui-btn-inline" ids="smile"><span class="pigss-smile"></span></a>
	<a href="#" class="'.$pj.$ap.'iconbtn'.$pn.' ui-btn ui-mini ui-btn-w ui-btn-inline" ids="smile1"><span class="pigss-smile1"></span></a>
	<a href="#" class="'.$pj.$ap.'iconbtn'.$pn.' ui-btn ui-mini ui-btn-w ui-btn-inline" ids="smiling"><span class="pigss-smiling"></span></a>
	<a href="#" class="'.$pj.$ap.'iconbtn'.$pn.' ui-btn ui-mini ui-btn-w ui-btn-inline" ids="smiling1"><span class="pigss-smiling1"></span></a>
	<a href="#" class="'.$pj.$ap.'iconbtn'.$pn.' ui-btn ui-mini ui-btn-w ui-btn-inline" ids="smiling2"><span class="pigss-smiling2"></span></a>
	<a href="#" class="'.$pj.$ap.'iconbtn'.$pn.' ui-btn ui-mini ui-btn-w ui-btn-inline" ids="surprised"><span class="pigss-surprised"></span></a>
	<a href="#" class="'.$pj.$ap.'iconbtn'.$pn.' ui-btn ui-mini ui-btn-w ui-btn-inline" ids="surprised1"><span class="pigss-surprised1"></span></a>
	<a href="#" class="'.$pj.$ap.'iconbtn'.$pn.' ui-btn ui-mini ui-btn-w ui-btn-inline" ids="thinking"><span class="pigss-thinking"></span></a>
	<a href="#" class="'.$pj.$ap.'iconbtn'.$pn.' ui-btn ui-mini ui-btn-w ui-btn-inline" ids="tired"><span class="pigss-tired"></span></a>
	<a href="#" class="'.$pj.$ap.'iconbtn'.$pn.' ui-btn ui-mini ui-btn-w ui-btn-inline" ids="tongue"><span class="pigss-tongue"></span></a>
	<a href="#" class="'.$pj.$ap.'iconbtn'.$pn.' ui-btn ui-mini ui-btn-w ui-btn-inline" ids="tongue1"><span class="pigss-tongue1"></span></a>
	<a href="#" class="'.$pj.$ap.'iconbtn'.$pn.' ui-btn ui-mini ui-btn-w ui-btn-inline" ids="tongue2"><span class="pigss-tongue2"></span></a>
	<a href="#" class="'.$pj.$ap.'iconbtn'.$pn.' ui-btn ui-mini ui-btn-w ui-btn-inline" ids="tongue3"><span class="pigss-tongue3"></span></a>
	<a href="#" class="'.$pj.$ap.'iconbtn'.$pn.' ui-btn ui-mini ui-btn-w ui-btn-inline" ids="tongue5"><span class="pigss-tongue5"></span></a>
	<a href="#" class="'.$pj.$ap.'iconbtn'.$pn.' ui-btn ui-mini ui-btn-w ui-btn-inline" ids="winking"><span class="pigss-winking"></span></a>
	<a href="#" class="'.$pj.$ap.'iconbtn'.$pn.' ui-btn ui-mini ui-btn-w ui-btn-inline" ids="yummy"><span class="pigss-yummy"></span></a>
	<a href="#" class="'.$pj.$ap.'iconbtn'.$pn.' ui-btn ui-mini ui-btn-w ui-btn-inline" ids="angry"><span class="pigss-angry"></span></a>
	<a href="#" class="'.$pj.$ap.'iconbtn'.$pn.' ui-btn ui-mini ui-btn-w ui-btn-inline" ids="confused"><span class="pigss-confused"></span></a>
	<a href="#" class="'.$pj.$ap.'iconbtn'.$pn.' ui-btn ui-mini ui-btn-w ui-btn-inline" ids="cry"><span class="pigss-cry"></span></a>
	<a href="#" class="'.$pj.$ap.'iconbtn'.$pn.' ui-btn ui-mini ui-btn-w ui-btn-inline" ids="chat"><span class="pigss-chat"></span></a>
	<a href="#" class="'.$pj.$ap.'iconbtn'.$pn.' ui-btn ui-mini ui-btn-w ui-btn-inline" ids="user"><span class="pigss-user"></span></a>
	<a href="#" class="'.$pj.$ap.'iconbtn'.$pn.' ui-btn ui-mini ui-btn-w ui-btn-inline" ids="location"><span class="pigss-location"></span></a>
	<a href="#" class="'.$pj.$ap.'iconbtn'.$pn.' ui-btn ui-mini ui-btn-w ui-btn-inline" ids="mobile"><span class="pigss-mobile"></span></a>
	<a href="#" class="'.$pj.$ap.'iconbtn'.$pn.' ui-btn ui-mini ui-btn-w ui-btn-inline" ids="screen"><span class="pigss-screen"></span></a>
	<a href="#" class="'.$pj.$ap.'iconbtn'.$pn.' ui-btn ui-mini ui-btn-w ui-btn-inline" ids="mail"><span class="pigss-mail"></span></a>
	<a href="#" class="'.$pj.$ap.'iconbtn'.$pn.' ui-btn ui-mini ui-btn-w ui-btn-inline" ids="help"><span class="pigss-help"></span></a>
	<a href="#" class="'.$pj.$ap.'iconbtn'.$pn.' ui-btn ui-mini ui-btn-w ui-btn-inline" ids="videos"><span class="pigss-videos"></span></a>
	<a href="#" class="'.$pj.$ap.'iconbtn'.$pn.' ui-btn ui-mini ui-btn-w ui-btn-inline" ids="pictures"><span class="pigss-pictures"></span></a>
	<a href="#" class="'.$pj.$ap.'iconbtn'.$pn.' ui-btn ui-mini ui-btn-w ui-btn-inline" ids="link"><span class="pigss-link"></span></a>
	<a href="#" class="'.$pj.$ap.'iconbtn'.$pn.' ui-btn ui-mini ui-btn-w ui-btn-inline" ids="search"><span class="pigss-search"></span></a>
	<a href="#" class="'.$pj.$ap.'iconbtn'.$pn.' ui-btn ui-mini ui-btn-w ui-btn-inline" ids="download"><span class="pigss-download"></span></a>
	<a href="#" class="'.$pj.$ap.'iconbtn'.$pn.' ui-btn ui-mini ui-btn-w ui-btn-inline" ids="pencil"><span class="pigss-pencil"></span></a>
	<a href="#" class="'.$pj.$ap.'iconbtn'.$pn.' ui-btn ui-mini ui-btn-w ui-btn-inline" ids="info"><span class="pigss-info"></span></a>
	<a href="#" class="'.$pj.$ap.'iconbtn'.$pn.' ui-btn ui-mini ui-btn-w ui-btn-inline" ids="article"><span class="pigss-article"></span></a>
	<a href="#" class="'.$pj.$ap.'iconbtn'.$pn.' ui-btn ui-mini ui-btn-w ui-btn-inline" ids="clock"><span class="pigss-clock"></span></a>
	<a href="#" class="'.$pj.$ap.'iconbtn'.$pn.' ui-btn ui-mini ui-btn-w ui-btn-inline" ids="star"><span class="pigss-star"></span></a>
	<a href="#" class="'.$pj.$ap.'iconbtn'.$pn.' ui-btn ui-mini ui-btn-w ui-btn-inline" ids="heart"><span class="pigss-heart"></span></a>
	<a href="#" class="'.$pj.$ap.'iconbtn'.$pn.' ui-btn ui-mini ui-btn-w ui-btn-inline" ids="file"><span class="pigss-file"></span></a>
	<a href="#" class="'.$pj.$ap.'iconbtn'.$pn.' ui-btn ui-mini ui-btn-w ui-btn-inline" ids="feed"><span class="pigss-feed"></span></a>
	<a href="#" class="'.$pj.$ap.'iconbtn'.$pn.' ui-btn ui-mini ui-btn-w ui-btn-inline" ids="refresh"><span class="pigss-refresh"></span></a>
	<a href="#" class="'.$pj.$ap.'iconbtn'.$pn.' ui-btn ui-mini ui-btn-w ui-btn-inline" ids="images"><span class="pigss-images"></span></a>
	<a href="#" class="'.$pj.$ap.'iconbtn'.$pn.' ui-btn ui-mini ui-btn-w ui-btn-inline" ids="heart2"><span class="pigss-heart2"></span></a>
	<a href="#" class="'.$pj.$ap.'iconbtn'.$pn.' ui-btn ui-mini ui-btn-w ui-btn-inline" ids="bookmark"><span class="pigss-bookmark"></span></a>
	<a href="#" class="'.$pj.$ap.'iconbtn'.$pn.' ui-btn ui-mini ui-btn-w ui-btn-inline" ids="">&nbsp;</a></div>
	<input type="text" id="'.$pj.$ap.'icon'.$pn.'"  data-corners="false">	
	<input type="text" id="'.$pj.$ap.'btnimgs'.$pn.'" data-corners="false">
</div>';
if($_POST[wdnimgicon])$popup .= '<br>'.htmlspecialchars($_POST[wdnimgicon]);
$popup .= '</div>
<div id="'.$pj.$ap.'sbtnvwsv'.$pn.'" data-theme="a" style="padding:5px;height: 100%;width: 100%;top:0;left:-15px;overflow-y:auto;" data-role="popup" data-corners="false" class="webkitm ifrwidthps">
<a href="#" style="padding:22px;" class="ui-btn ui-btn-z ui-btn-inline ui-btn-icon-notext ui-icon-carat-l"></a><div id="'.$pj.$ap.'sbtnssvwsv'.$pn.'" style="overflow-y:auto" class="webkitm">';
if($_POST[gcln])$popup .= '<div id="'.$pj.$ap.'mbntform'.$pn.'">
'.htmlspecialchars($_POST[gclntmtitle]).'<input type="text" data-corners="false"  data-theme="f" id="'.$pj.$ap.'mbitemtm'.$pn.'">
'.htmlspecialchars($_POST[gclnntitle]).'<input type="number" data-corners="false"  data-theme="f" id="'.$pj.$ap.'mbntm'.$pn.'">'.htmlspecialchars($_POST[gclnnstitle]).'<input type="number" data-corners="false"  data-theme="f" id="'.$pj.$ap.'mbntms'.$pn.'"></div>';
$popup .= '<div id="'.$pj.$ap.'sbtnvw'.$pn.'" class="ui-grid-solo"></div>';
if($_POST[wdnlist])$popup .= htmlspecialchars($_POST[wdnlist]);
$popup .= '</div></div>
<div id="'.$pj.$ap.'sbtnvws'.$pn.'" data-theme="a" style="padding:5px;height: 100%;width: 100%;top:0;left:-15px;overflow-y:auto;" data-role="popup" data-corners="false" class="ifrwidthps"><a href="#" data-rel="back" class="popn ui-btn ui-btn-z ui-btn-inline ui-btn-icon-notext ui-icon-delete"></a><span id="'.$pj.$ap.'sbtnvwsn'.$pn.'" class="webkitm"></span></div>


<div id="'.$pj.$ap.'clrmdata'.$pn.'" data-inf="'.htmlspecialchars($_POST[clrmdatabtn]).'" data-theme="a" data-role="popup" data-corners="false" style="padding:5px;height: 100%;width: 100%;top:0;left:-15px;" class="ifrwidthps"><a href="#" data-rel="back" class="popn ui-btn ui-mini ui-btn-z ui-btn-inline ui-btn-icon-notext ui-icon-delete"></a><br>MM<select data-theme="b"><option value=""></option><option value="1">01</option><option value="2">02</option><option value="3">03</option>
<option value="4">04</option><option value="5">05</option><option value="6">06</option><option value="7">07</option>
<option value="8">08</option><option value="09">09</option><option value="10">10</option><option value="11">11</option><option value="12">12</option></select>';
if($_SESSION[tn]==PRC){$YourDATA = '您写入的事项数据Your DATA';$WebDATA = '互联数据Web DATA';}else if($_SESSION[tn]==EN){$YourDATA = 'Your DATA';$WebDATA = 'Web DATA';}
else{$YourDATA = '您寫入的事項數據Your DATA';$WebDATA = '互聯數據Web DATA';}
$popup .= 'YYYY<input type="number" data-corners="false"  data-theme="f"><select data-theme="b"><option value="">'.$WebDATA.'</option><option value="s">'.$YourDATA.'</option></select><BR><BR>
<a href="#" style="padding:22px;" class="ui-btn ui-btn-w ui-icon-delete"><span class="pigss-pencil"></span></a>'.htmlspecialchars($_POST[clrmdataftr]).'
</div>
';



if($roww[theme]){$theme = $roww[theme];}else{$theme = '';}
			
			if($roww[bg]){$roww[bg]=str_replace('/','',$roww[bg]);$roww[bg]=str_replace('\\','',$roww[bg]);$roww[bg]=str_replace('..','',$roww[bg]);}
			
			if(strpos($roww[bg],'http://')!==false or strpos($roww[bg],'https://')!==false){$images = '';}else{$images = 'images/';}
			
			if(strpos($roww[bg],'#')!==false or strpos($roww[bg],'rgba(')!==false  or strpos($roww[bg],'rgb(')!==false){$bghtml = 'background-color:'.htmlspecialchars($roww[bg]).';';}
			else if(strpos($roww[bg],'[xy]')!==false){$bghtml = 'background-image:url('.$images.htmlspecialchars($roww[bg]).');';}
			else{$bghtml = 'background-image:url('.$images.htmlspecialchars($roww[bg]).');background-size:100%;background-repeat:repeat-y;';}
	
			if($roww[bg]){$bgstyle = 'style="'.$bghtml.'"';}else{$bgstyle = '';}
			
			$webpopup = '<div data-role="page" id="web'.$ap.'" class="page" data-theme="'.htmlspecialchars($theme).'" '.$bgstyle.'><div  class="ui-content pagebg">';
			if($roww[style]=='app')$webpopup .= '<div data-role="controlgroup" class="plft" data-type="horizontal" data-corners="false"><a href="#'.$ap.'panel" data-rel="panel" class="menubg ui-btn ui-btn-y ui-btn-inline ui-mini ui-btn-icon-left ui-icon-bars">WEBMENU</a></div><!--panel!--><div id="'.$pj.$ap.'imgspop" data-theme="z" style="padding:5px;height: 100%;width: 100%;top:0;left:-15px;" data-role="popup" data-corners="false"><a href="#" data-rel="back" class="popn ui-btn ui-btn-z ui-btn-icon-notext ui-icon-delete"></a><div class="ifrspinn" style="position:relative;left:50%;width:100%">Loading...<BR><img src="css/images/ajax-loader.gif"></div><div class="imgspop"><img src=""></div></div>
		<div id="'.$pj.$ap.'ifrspop" data-theme="z" data-role="popup" data-corners="false" style="overflow-y:auto;" class="webkitm ifrwidthpn" ><a href="#" data-rel="back" class="popn ui-btn ui-btn-z ui-btn-icon-notext ui-icon-delete"></a><div class="ifrspinn" style="position:relative;left:50%;width:100%">Loading...<BR><img src="css/images/ajax-loader.gif"></div><iframe src="" style="width:100%" seamless frameBorder="0" ></iframe></div>
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
			$webpopup .= $html.'<!--part'.$pn.'!--><!--syscalendarsys!-->'.$vnts.$popup.$vntsn.$tabnbgdatns.$htmls;
			$webpopup .= '</div><!--content!--></div><!--page!-->';
			
			$fpagtrns='../panel/'.$roww[pjnbr].'/'.$ap.'.html';
			file_put_contents($fpagtrns,$html.'<!--part'.$pn.'!--><!--syscalendarsys!-->'.$vnts.$popup.$vntsn.$tabnbgdatns.$htmls);

			$fpagtrns='../panel/'.$roww[pjnbr].'/web'.$ap.'.html';
			file_put_contents($fpagtrns,$webpopup);

	
			if(!file_exists('../panel/'.$roww[pjnbr].'/web'.$ap.'.js')){
			$fpagtrns='../panel/'.$roww[pjnbr].'/web'.$ap.'.js';
			$js = '/*$(document).on(\'pageshow\', \'#web'.$ap.'\', function(){*//*});*/';
			file_put_contents($fpagtrns,$js);			
			;}
			
			if($popup){
			$jsweb = file_get_contents('../panel/'.$roww[pjnbr].'/web'.$ap.'.js');
				
				$jswebs=explode('/*webjs'.$pn.'*/',$jsweb);
				$jsweb = $jswebs[0].$jswebs[2];
				
				if($_POST[sun]){$sun = htmlspecialchars($_POST[sun]);}else{$sun = 'S';}
				if($_POST[mon]){$mon = htmlspecialchars($_POST[mon]);}else{$mon = 'M';}
				if($_POST[tue]){$tue = htmlspecialchars($_POST[tue]);}else{$tue = 'T';}
				if($_POST[wed]){$wed = htmlspecialchars($_POST[wed]);}else{$wed = 'W';}
				if($_POST[thu]){$thu = htmlspecialchars($_POST[thu]);}else{$thu = 'T';}
				if($_POST[fri]){$fri = htmlspecialchars($_POST[fri]);}else{$fri = 'F';}
				if($_POST[sat]){$sat = htmlspecialchars($_POST[sat]);}else{$sat = 'S';}

				if($_POST[btnimg]){$btnimg = htmlspecialchars($_POST[btnimg]);}else{$btnimg = '';}
				if($_POST[btnimgs]){$btnimgs = htmlspecialchars($_POST[btnimgs]);}else{$btnimgs = '';}
				
				
				if($_POST[internet]){$internet = str_replace('.html','.htm',htmlspecialchars($_POST[internet]));}else{$internet = '';}
				$guanyin=rand();
				
				if($_POST[internet]){$server = '/*ajax'.$ap.'ajax*/jsclv("'.$pj.$ap.'","'.$pj.'","'.$pn.'","'.$internet.'","'.htmlspecialchars($_POST[internet]).'",d,mnh,day,yr,wdayn'.$guanyin.',\''.htmlspecialchars($_POST[saturday]).'\',\''.htmlspecialchars($_POST[sunday]).'\',"'.$btnimg.'","'.htmlspecialchars($_POST[bgarea]).'","'.$btnimgs.'");/*ajaxs*/';}else{$server = '';}
				if($_POST[appdata]){
				if($server){$ftnjsclv = 1;}else{$ftnjsclv = '';}
				$appdata = '/*ajax'.$ap.'ajax*/apps("'.$pj.$ap.'","'.$pj.'","'.$pn.'","'.htmlspecialchars($_POST[appdata]).'",d,mnh,day,yr,wdayn'.$guanyin.',\''.htmlspecialchars($_POST[saturday]).'\',\''.htmlspecialchars($_POST[sunday]).'\',"'.$btnimg.'","'.htmlspecialchars($_POST[bgarea]).'","'.$btnimgs.'","'.$ftnjsclv.'");/*ajaxs*/';}else{$appdata = '';}
				//if($appdata or $server){$ajaxStp = '$(document).ajaxStop(function(){';$ajaxStps = '});';}
				//else{$ajaxStp = '';$ajaxStps = '';}

				
				$js = '/*webjs'.$pn.'*/'
				.$appdata
				.$server
				.';owlReady("'.$pj.$ap.'",'.$pn.');
   $("#'.$pj.$ap.'owlcln'.$pn.'").css("min-height",windowHeight*0.85); 
   var swiper'.$guanyin.' = new Swiper("#'.$pj.$ap.'owlcln'.$pn.'", {initialSlide: 1});$(document).on("click",".'.$pj.$ap.'owldtsftl'.$pn.'",function (event){event.preventDefault();swiper'.$guanyin.'.slidePrev(750);});$(document).on("click",".'.$pj.$ap.'owldtsftr'.$pn.'",function (event){event.preventDefault();swiper'.$guanyin.'.slideNext(750);});
   var d = new Date();var mnh = d.getMonth()+1;var day = d.getDate();var yr = d.getFullYear(); 
var wdayn'.$guanyin.' = [\''.$sun.'\',\''.$mon.'\',\''.$tue.'\',\''.$wed.'\',\''.$thu.'\',\''.$fri.'\',\''.$sat.'\',\''.$sun.'\',\''.$mon.'\',\''.$tue.'\',\''.$wed.'\',\''.$thu.'\',\''.$fri.'\',\''.$sat.'\',\''.$sun.'\',\''.$mon.'\',\''.$tue.'\',\''.$wed.'\',\''.$thu.'\',\''.$fri.'\',\''.$sat.'\',\''.$sun.'\',\''.$mon.'\',\''.$tue.'\',\''.$wed.'\',\''.$thu.'\',\''.$fri.'\',\''.$sat.'\',\''.$sun.'\',\''.$mon.'\',\''.$tue.'\',\''.$wed.'\',\''.$thu.'\',\''.$fri.'\',\''.$sat.'\',\''.$sun.'\',\''.$mon.'\',\''.$tue.'\',\''.$wed.'\'];'
	.$ajaxStp;
	if(!$server and !$appdata)$js .= 'owln(d,mnh,day,yr,'.$pj.$ap.','.$pj.','.$pn.',wdayn'.$guanyin.',\''.htmlspecialchars($_POST[saturday]).'\',\''.htmlspecialchars($_POST[sunday]).'\',"'.$btnimg.'","'.htmlspecialchars($_POST[bgarea]).'","'.$btnimgs.'");';
	$js .= 'owls(d,mnh,day,yr,'.$pj.$ap.','.$pj.','.$pn.',wdayn'.$guanyin.',\''.htmlspecialchars($_POST[saturday]).'\',\''.htmlspecialchars($_POST[sunday]).'\',"'.$btnimg.'","'.htmlspecialchars($_POST[bgarea]).'","'.$btnimgs.'",windowHeight);'
				.$ajaxStps
				.'/*webjs'.$pn.'*/'
				.'/*});*/';
				$jsweb=str_replace('/*});*/',$js,$jsweb);
				file_put_contents('../panel/'.$roww[pjnbr].'/web'.$ap.'.js',$jsweb);			
			;}	
			
		

	
	echo "<meta http-equiv='refresh' content='0;URL=calendar.php?ap=".htmlspecialchars($roww[ap])."&pj=".htmlspecialchars($roww[pjnbr])."&pn=".htmlspecialchars($pn)."'>";
;}

?>
	
