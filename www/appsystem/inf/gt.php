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
    <title><?php if($_SESSION[tn]==PRC){echo '项目日历 - AppMoney712 移动应用设计系统';}else if($_SESSION[tn]==EN){echo 'Project Calendar - AppMoney712 APP Creation System';}else{echo '項目日曆 - AppMoney712 移動應用設計系統';}?></title>
	<link href="../css/jquery.mobile-1.4.4.min.css" rel="stylesheet">
	<link href="../css/jquerymobile-1.4.4.min.css" rel="stylesheet">
	<link rel="stylesheet" href="../jscss/calendar.css">
	<link href="../css/icons/style.css" rel="stylesheet">
	<link rel="stylesheet" href="../css/appsystem.css">	 
	<style type="text/css"> 		
	</style>
	<script src="../js/jquery.js"></script>
	<script src="../js/jquery.mobile-1.4.4.min.js"></script>
	<script src="../js/gt.js"></script><script src="../js/form.js"></script>
	

</head>
<body>
<div data-role="page" id="appageone" data-theme="f" class="page">
	<div style="overflow: hidden;" data-role="header" data-theme="f">
	<a href="#navigations"  id="menubttn"  data-rel="popup" class="ui-btn ui-btn ui-btn-inline ui-corner-all ui-btn-icon-left ui-icon-bars"><?php if($_SESSION[tn]==PRC){echo '目录';}else if($_SESSION[tn]==EN){echo 'Menu';}else{echo '目錄';}?></a>
    <h1><?php if($_SESSION[tn]==PRC){echo '项目日历 - AppMoney712 移动应用设计系统';}else if($_SESSION[tn]==EN){echo 'Project Calendar - AppMoney712 APP Creation System';}else{echo '項目日曆 - AppMoney712 移動應用設計系統';}?></h1>
	
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
			$htmlvlu = $tbgvlu[9];	
			$appdatavlu = $tbgvlu[10];	
			$internetvlu = $tbgvlu[11];	
			$imgbg1vlu = $tbgvlu[12];	
			$imgbg2vlu = $tbgvlu[13];	
			$imgbg3vlu = $tbgvlu[14];	
			$imgbg4vlu = $tbgvlu[15];	
			$imgbg5vlu = $tbgvlu[16];	
			$imgbg6vlu = $tbgvlu[17];	
			$imgbg7vlu = $tbgvlu[18];	
			$imgbg8vlu = $tbgvlu[19];	
			$gtlinkvlu = $tbgvlu[20];	
			$gtstitlevlu = $tbgvlu[21];
			$gtlinktitlevlu = $tbgvlu[22];
			$gthreftitlevlu = $tbgvlu[23];
			$gthrefntitlevlu = $tbgvlu[24];
			$gtdatatitlevlu = $tbgvlu[25];
			$gtcaltitlevlu = $tbgvlu[26];
			$gtlistitlevlu = $tbgvlu[27];
			$gtrefreshtitlevlu  = $tbgvlu[28];
			$bgtareavlu= $tbgvlu[29];
			$bgareavlu= $tbgvlu[30];
			$bgareasvlu= $tbgvlu[31];
			$gtlnktitlevlu= $tbgvlu[32]; 
			$gtlnkftrvlu = $tbgvlu[33];	
			$gtypvlu = $tbgvlu[34];
			$gtcalbgvlu = $tbgvlu[35];
		
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
	
		
	<a href="menudesign.php?pj=<?php echo htmlspecialchars($roww[pjnbr])?>&ap=<?php echo $ap?>&pn=<?php echo $pn?>&php=gt&plt=1" data-ajax="false" class="ui-btn ui-btn ui-btn-inline ui-corner-all ui-mini ui-btn-icon-left ui-icon-bars"><?php if($_SESSION[tn]==PRC){echo '专案应用页列表';}else if($_SESSION[tn]==EN){echo 'Project Page List';}else{echo '專案應用頁列表';}?></a>
	
	
	<?php ;}?>
	
	<a href="#try" data-rel="popup" data-transition="pop" class="ui-btn ui-btn-f ui-btn-inline ui-corner-all ui-mini" style="color:BLACK"><span class="pigss-pencil" style="color:red"></span><?php if($_SESSION[tn]==PRC){echo '快速试用';}else if($_SESSION[tn]==EN){echo 'Quick try';}else{echo '快速試用';}?></a>
		<div data-role="popup" id="try" data-position-to="window" data-theme="f" class="ifrwidth"><a href="#" data-rel="back" class="popn ui-btn ui-btn-z ui-btn-icon-notext ui-icon-delete"></a><BR><BR>
				<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '互联网数据';}else if($_SESSION[tn]==EN){echo 'Internet data';}else{echo '互聯網數據';}?></b> &nbsp;<?php if($_SESSION[tn]==PRC){echo '此功能需伺服器数据,您须到本司网站跟从指引及键入相关资料到\'伺服器数据\'。但您能只直接提送创建没有数据的日历。';}else if($_SESSION[tn]==EN){echo 'The Internet/Intranet data is needed in this function to create calendar with data content. You need to visit our website to follow our instruction and enter the related information to \'Server data\' field. But you can click the SEND button only to create a calendar without data content.';}else{echo '此功能需伺服器數據,您須到本司網站跟從指引及鍵入相關資料到\'伺服器數據\'。但您能只直接提送創建沒有數據的日曆。';}?></p>	
			<HR>	
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
	<?php echo htmlspecialchars($roww[title])?>
	<hr>
	<?php 
	if($_SESSION[tn]==PRC){echo '项目日历创建';}else if($_SESSION[tn]==EN){echo 'Project Calendar Design';}else{echo '項目日曆創建';}
	
	?>  
	

	<FORM action="gt.php?pj=<?php echo htmlspecialchars($roww[pjnbr]) ?>&ap=<?php echo htmlspecialchars($roww[ap]) ?>&tm=<?php echo htmlspecialchars($tm) ?>&pn=<?php echo htmlspecialchars($pn).$tln ?>&sn=<?php echo $sn?>" id="webxls" method="post" data-ajax="false" >
	<hr>
	<?php if($_SESSION[tn]==PRC){echo '星期标题';}else if($_SESSION[tn]==EN){echo 'Week title';}else{echo '星期標題';}?>
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
<div class="ui-block-c">
<?php if($_SESSION[tn]==PRC){echo '日期表格';}else if($_SESSION[tn]==EN){echo 'Calendar form';}else{echo '日期表格';}?>
<input type="text" name="html" placeholder="" value="<?php echo htmlspecialchars($htmlvlu);?>">
</div>

<?php if(sizeof($tbgvlu)){?>
<div class="ui-block-a">	
<?php if($_SESSION[tn]==PRC){echo '顶部背景颜色';}else if($_SESSION[tn]==EN){echo 'Background color of Top area';}else{echo '頂部背景顏色';}?>
<input type="text" name="bgtarea" placeholder="" value="<?php echo htmlspecialchars($bgtareavlu)?>"></div>
<div class="ui-block-b">
<?php if($_SESSION[tn]==PRC){echo '顶部左背景颜色';}else if($_SESSION[tn]==EN){echo 'Background color of Top left area';}else{echo '頂部左背景顏色';}?>
<input type="text" name="bgarea" placeholder="" value="<?php echo htmlspecialchars($bgareavlu);?>">
</div>
<div class="ui-block-c">
<?php if($_SESSION[tn]==PRC){echo '顶部右背景颜色';}else if($_SESSION[tn]==EN){echo 'Background color of Top right area';}else{echo '頂部右背景顏色';}?>
<input type="text" name="bgareas" placeholder="" value="<?php echo htmlspecialchars($bgareasvlu);?>">
</div>
<?php ;}?>


</div>	
	<hr>
<?php if($_SESSION[tn]==PRC){echo '背景';}else if($_SESSION[tn]==EN){echo 'Background';}else{echo '背景';}?>
<div class="ui-grid-c">
<div class="ui-block-a"><?php if($_SESSION[tn]==PRC){echo '首(上)';}else if($_SESSION[tn]==EN){echo 'First(1)';}else{echo '首(上)';}?>
<input type="text" name="imgbg1" placeholder="" value="<?php echo htmlspecialchars($imgbg1vlu)?>"></div><div class="ui-block-b">
<?php if($_SESSION[tn]==PRC){echo '首(下)';}else if($_SESSION[tn]==EN){echo 'First(2)';}else{echo '首(下)';}?><input type="text" name="imgbg2" placeholder="" value="<?php echo htmlspecialchars($imgbg2vlu)?>"></div>
<div class="ui-block-c"><?php if($_SESSION[tn]==PRC){echo '二(上)';}else if($_SESSION[tn]==EN){echo 'Second(1)';}else{echo '二(上)';}?><input type="text" name="imgbg3" placeholder="" value="<?php echo htmlspecialchars($imgbg3vlu)?>"></div><div class="ui-block-d"><?php if($_SESSION[tn]==PRC){echo '二(下)';}else if($_SESSION[tn]==EN){echo 'Second(2)';}else{echo '二(下)';}?><input type="text" name="imgbg4" placeholder="" value="<?php echo htmlspecialchars($imgbg4vlu)?>"></div>
<div class="ui-block-a"><?php if($_SESSION[tn]==PRC){echo '三(上)';}else if($_SESSION[tn]==EN){echo 'Third(1)';}else{echo '三(上)';}?><input type="text" name="imgbg5" placeholder="" value="<?php echo htmlspecialchars($imgbg5vlu)?>"></div><div class="ui-block-b"><?php if($_SESSION[tn]==PRC){echo '三(下)';}else if($_SESSION[tn]==EN){echo 'Third(2)';}else{echo '三(下)';}?><input type="text" name="imgbg6" placeholder="" value="<?php echo htmlspecialchars($imgbg6vlu)?>"></div>
<div class="ui-block-c"><?php if($_SESSION[tn]==PRC){echo '四(上)';}else if($_SESSION[tn]==EN){echo 'Fourth(1)';}else{echo '四(上)';}?><input type="text" name="imgbg7" placeholder="" value="<?php echo htmlspecialchars($imgbg7vlu)?>"></div><div class="ui-block-d"><?php if($_SESSION[tn]==PRC){echo '四(下)';}else if($_SESSION[tn]==EN){echo 'Fourth(2)';}else{echo '四(下)';}?><input type="text" name="imgbg8" placeholder="" value="<?php echo htmlspecialchars($imgbg8vlu)?>"></div>

</div>
<hr>
<?php if($_SESSION[tn]==PRC){echo '型式';}else if($_SESSION[tn]==EN){echo 'Style';}else{echo '型式';}?>
<select name="typ">	
	<option value=""  <?php if(!$gtypvlu)echo 'selected="selected"';?>>gt</option>	
	<option value="1"  <?php if($gtypvlu=='1')echo 'selected="selected"';?>>gt1</option>
	<option value="2"  <?php if($gtypvlu=='2')echo 'selected="selected"';?>>gt2</option>
	<option value="5"  <?php if($gtypvlu=='5')echo 'selected="selected"';?>>gt5</option>	
	<option value="1a"  <?php if($gtypvlu=='1a')echo 'selected="selected"';?>>gt1a</option>
	<option value="2a"  <?php if($gtypvlu=='2a')echo 'selected="selected"';?>>gt2a</option>	
	<option value="5a"  <?php if($gtypvlu=='5a')echo 'selected="selected"';?>>gt5a</option>	
</select>

<hr>
<?php if($_SESSION[tn]==PRC){echo '数据';}else if($_SESSION[tn]==EN){echo 'Data';}else{echo '數據';}?>
<div class="ui-grid-b">
<div class="ui-block-a">	
<?php if($_SESSION[tn]==PRC){echo '应用内数据';}else if($_SESSION[tn]==EN){echo 'APP data';}else{echo '應用內數據';}?>
<input type="text" name="appdata" placeholder="" value="<?php echo htmlspecialchars($appdatavlu)?>"></div>
<div class="ui-block-b">
<?php if($_SESSION[tn]==PRC){echo '伺服器数据';}else if($_SESSION[tn]==EN){echo 'Server data';}else{echo '伺服器數據';}?>
<input type="text" name="internet" placeholder="" value="<?php echo htmlspecialchars($internetvlu);?>">
</div>
<div class="ui-block-c">
<?php if($_SESSION[tn]==PRC){echo '数据链结';}else if($_SESSION[tn]==EN){echo 'Data source link';}else{echo '數據鏈結';}?>
<input type="text" name="gtlink" placeholder="" value="<?php echo htmlspecialchars($gtlinkvlu);?>">
</div>
</div>	
<?php if(sizeof($tbgvlu)){?>
<HR>
<div class="ui-grid-c">
<div class="ui-block-a">	
<?php if($_SESSION[tn]==PRC){echo '星号按钮标题';}else if($_SESSION[tn]==EN){echo 'Title of Star button';}else{echo '星號按鈕標題';}?>
<input type="text" name="gtstitle" placeholder="" value="<?php echo htmlspecialchars($gtstitlevlu)?>"></div>
<div class="ui-block-b">
<?php if($_SESSION[tn]==PRC){echo '链结符号标题';}else if($_SESSION[tn]==EN){echo 'Title of Data link button';}else{echo '鏈結符號標題';}?>
<input type="text" name="gtlinktitle" placeholder="" value="<?php echo htmlspecialchars($gtlinktitlevlu);?>">
</div>
<div class="ui-block-c">
<?php if($_SESSION[tn]==PRC){echo '数据链结键入项的标题';}else if($_SESSION[tn]==EN){echo 'Title of Data link input';}else{echo '數據鏈結鍵入項的標題';}?>
<input type="text" name="gthreftitle" placeholder="" value="<?php echo htmlspecialchars($gthreftitlevlu);?>">
</div>
<div class="ui-block-d">
<?php if($_SESSION[tn]==PRC){echo '数据链结列表的标题';}else if($_SESSION[tn]==EN){echo 'Title of Data link list';}else{echo '數據鏈結列表的標題';}?>
<input type="text" name="gtlnktitle" placeholder="" value="<?php echo htmlspecialchars($gtlnktitlevlu);?>">
</div>
</div>
<div class="ui-grid-c">
<div class="ui-block-a">	
<?php if($_SESSION[tn]==PRC){echo '链结标题键入项的标题';}else if($_SESSION[tn]==EN){echo 'Title of Data link title input';}else{echo '鏈結標題鍵入項的標題';}?>
<input type="text" name="gthrefntitle" placeholder="" value="<?php echo htmlspecialchars($gthrefntitlevlu)?>"></div>
<div class="ui-block-b">
<?php if($_SESSION[tn]==PRC){echo '列表符号标题';}else if($_SESSION[tn]==EN){echo 'Title of Title store button';}else{echo '列表符號標題';}?>
<input type="text" name="gtdatatitle" placeholder="" value="<?php echo htmlspecialchars($gtdatatitlevlu);?>">
</div>
<div class="ui-block-c">
<?php if($_SESSION[tn]==PRC){echo '日历符号标题';}else if($_SESSION[tn]==EN){echo 'Title of Calendar button';}else{echo '日曆符號標題';}?>
<input type="text" name="gtcaltitle" placeholder="" value="<?php echo htmlspecialchars($gtcaltitlevlu);?>">
</div>
<div class="ui-block-d">
<?php if($_SESSION[tn]==PRC){echo 'popup背景';}else if($_SESSION[tn]==EN){echo 'popup background';}else{echo 'popup背景';}?>
<input type="text" name="gtcalbg" placeholder="" value="<?php echo htmlspecialchars($gtcalbgvlu);?>">
</div>
</div>
<?php if($_SESSION[tn]==PRC){echo '数据重整显示值';}else if($_SESSION[tn]==EN){echo 'Data refresh message';}else{echo '數據重整顯示值';}?>
<input type="text" name="gtrefreshtitle" placeholder="" value="<?php echo htmlspecialchars($gtrefreshtitlevlu);?>">
<div class="ui-grid-a"><div class="ui-block-a">	
<?php if($_SESSION[tn]==PRC){echo '列表备注';}else if($_SESSION[tn]==EN){echo 'List explanation';}else{echo '列表備註';}?>
<textarea name="gtlistitle"><?php echo htmlspecialchars($gtlistitlevlu);?></textarea></div>
<div class="ui-block-b">
<?php if($_SESSION[tn]==PRC){echo '数据链结列表的备注';}else if($_SESSION[tn]==EN){echo 'Explanation of Data link list ';}else{echo '數據鏈結列表的備註';}?>
<textarea name="gtlnkftr"><?php echo htmlspecialchars($gtlnkftrvlu);?></textarea>
</div></div>
<HR>
<?php ;}?>


	<input type="hidden" name="guanyin1" value="<?php if(!$_POST[guanyin1])$_SESSION[guanyin1]=rand();
	echo htmlspecialchars($_SESSION[guanyin1]); ?>">
	<div class="ui-grid-b"><div class="ui-block-a" style="width:20%">

	<input type="submit" name="submit" id="webxlsbtn" Value="<?php if($_SESSION[tn]==PRC){echo '送交';}else if($_SESSION[tn]==EN){echo 'SEND';}else{echo '送交';}?>">
	</div><div class="ui-block-b"  style="width:15%">
	<a href="#steps" data-rel="popup" class="ui-btn ui-btn-b ui-btn-inline ui-corner-all ui-mini"><?php if($_SESSION[tn]==PRC){echo '步骤';}else if($_SESSION[tn]==EN){echo 'Steps';}else{echo '步驟';}?></a><div data-role="popup" id="steps" style="min-width:300px;max-width:85%" data-position-to="window" data-theme="f"><a href="#" class="ui-btn ui-corner-all ui-icon-delete ui-btn-icon-notext ui-btn-right" data-rel="back"></a>

	<h4 style="color:pink"><?php if($_SESSION[tn]==PRC){echo '填写项目';}else if($_SESSION[tn]==EN){echo 'Fiil in item data';}else{echo '填寫項目';}?></h4>
	<p><?php if($_SESSION[tn]==PRC){echo '您须填写资料。';}else if($_SESSION[tn]==EN){echo 'You need to fill in the above data.';}else{echo '您須填寫資料。';}?></p><HR>
	<h4 style="color:pink"><?php if($_SESSION[tn]==PRC){echo '数据资料';}else if($_SESSION[tn]==EN){echo 'Data information';}else{echo '數據資料';}?></h4>
	<p><?php if($_SESSION[tn]==PRC){echo '到网站参考相关编写指引。';}else if($_SESSION[tn]==EN){echo 'You can refer to our website about this issue.';}else{echo '到網站參考相關編寫指引。';}?></p>
	
	 
</div>
 

</div><div class="ui-block-c" style="width:65%">

<a href="#infStyle" data-rel="popup" class="ui-btn ui-btn-b ui-btn-inline ui-corner-all ui-mini">? <?php if($_SESSION[tn]==PRC){echo '型式解释';}else if($_SESSION[tn]==EN){echo 'Style';}else{echo '型式解釋';}?></a>
	<div data-role="popup" id="infStyle" style="min-width:300px;max-width:95%; overflow-y:auto" data-position-to="window" data-theme="f"><a href="#" class="popn ui-btn ui-btn-z ui-corner-all ui-icon-delete ui-btn-icon-notext" data-rel="back"></a>
<br><br>
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '项目日历 [日历功能及数据型式]';}else if($_SESSION[tn]==EN){echo 'Project Calendar [calendar function and data showing]';}else{echo '項目日曆 [日曆功能及數據型式]';}?>/<?php if($_SESSION[tn]==PRC){echo '项目日历 [数据显示型式]';}else if($_SESSION[tn]==EN){echo 'Project Calendar [data showing only]';}else{echo '項目日曆 [數據顯示型式]';}?></b></p>
	<p><?php if($_SESSION[tn]==PRC){echo '此些型式均在此页设计,日历功能是能让用户操作显示程式功能的月历,数据均是显示存於互联网的数据。若在型式选用数据显示型式[gt1a,gt2a及gt5a],只含指定月份数据及点撀月份标题按钮能显示内容或表格的POPUP,但没有程式功能的月历及没有点撀数据再显示进一步数据的功能。';}else if($_SESSION[tn]==EN){echo 'The two styles are also designed on this page and their data are from the Internet. The calendar function lets APP user to control the calendar programmically.  If you select the data showing only style [gt1a,gt2a and gt5a], the period of its data is limited to specific months and it is able to show content or form by APP user clicking month titles. But it is no further data showing by APP user clicking on data.';}else{echo '此些型式均在此頁設計,數據均是顯示存於互聯網的數據,日曆功能是能讓用戶操作顯示程式功能的月曆。若在型式選用數據顯示型式[gt1a,gt2a及gt5a],只含指定月份數據及點撀月份標題按鈕能顯示內容或表格的POPUP,但沒有程式功能的月曆及沒有點撀數據再顯示進一步數據的功能。';}?></p>
	
	<p><?php if($_SESSION[tn]==PRC){echo '二种型式均能点撀星符号按钮,改变数据来源。';}else if($_SESSION[tn]==EN){echo 'You can alter the source of data for these two types.';}else{echo '二種型式均能點撀星符號按鈕,改變數據來源。';}?></p>
	<p><?php if($_SESSION[tn]==PRC){echo '因您能控制数据版本[更新数据],若不用点撀数据按钮再显示进一步数据或填表格,应选用数据显示型式。';}else if($_SESSION[tn]==EN){echo 'Because you can control the version of data source [for the purpose of updating APP data]. If you do not need to provide further data and form for APP user clicking on the data button in your APP, you need to select data showing only style.';}else{echo '因您能控制數據版本[更新數據],若不用點撀數據按鈕再顯示進一步數據或填表格,應選用數據顯示型式。';}?></p>
	<p><?php if($_SESSION[tn]==PRC){echo '选用数据显示型式,在此页不用修改星期标题丶不用填周六日颜色及表格。';}else if($_SESSION[tn]==EN){echo 'If you select the data showing only style, you do not need to amend the week titles, fill in area color of Saturday and Sunday and calendar form.';}else{echo '選用數據顯示型式,在此頁不用修改星期標題、不用填週六日顏色及表格。';}?></p>

	</div>
	
<a href="#inf" data-rel="popup" class="ui-btn ui-btn-b ui-btn-inline ui-corner-all ui-mini">? <?php if($_SESSION[tn]==PRC){echo '解释';}else if($_SESSION[tn]==EN){echo 'Explanation';}else{echo '解釋';}?></a>
	<div data-role="popup" id="inf" style="min-width:300px;max-width:95%; overflow-y:auto" data-position-to="window" data-theme="f"><a href="#" class="popn ui-btn ui-btn-z ui-corner-all ui-icon-delete ui-btn-icon-notext" data-rel="back"></a>

	
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '星期标题';}else if($_SESSION[tn]==EN){echo 'Week title';}else{echo '星期標題';}?></b>
	<?php if($_SESSION[tn]==PRC){echo '必须填写。';}else if($_SESSION[tn]==EN){echo 'You need to fill in these items.';}else{echo '必須填寫。';}?></p>
	
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '周六及周日颜色';}else if($_SESSION[tn]==EN){echo 'Color of Saturday and Sunday area ';}else{echo '週六及週日顏色';}?></b>
	<?php if($_SESSION[tn]==PRC){echo '填上rgba颜色码e.g. rgba(255,255,255,0.5)。';}else if($_SESSION[tn]==EN){echo 'You can add  rgba color code e.g. rgba(255,255,255,0.5).';}else{echo '填上rgba顏色碼e.g. rgba(255,255,255,0.5)。';}?></p>
	<hr>
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '日期表格';}else if($_SESSION[tn]==EN){echo 'Calendar form';}else{echo '日期表格';}?>	</b>
	<?php if($_SESSION[tn]==PRC){echo '用户点撀日期上的';}else if($_SESSION[tn]==EN){echo 'APP user can click on the';}else{echo '用戶點撀日期上的';}?><span class="pigss-pencil"></span><?php if($_SESSION[tn]==PRC){echo '所显示指定的表格或网页档。';}else if($_SESSION[tn]==EN){echo ' to show specified form or web page file.';}else{echo '所顯示指定的表格或網頁檔。';}?></p>

	<p><?php if($_SESSION[tn]==PRC){echo '使用表格功能设计表格[将数据寄送至指定电邮],您须设置首项是接收日期数据及/或次项是相关项目标题数据。用户是点撀日曆内日期按钮,将数据带入表格。';}else if($_SESSION[tn]==EN){echo 'If you use the form function in this software to design data form [send data to specific email], you need to design its first item type for receiving date data and its second item type for receiving title data. About this function, APP user clicks the date button on the calendar to carry the data to the form.';}else{echo '使用表格功能設計表格[將數據寄送至指定電郵],您須設置首項是接收日期數據及/或次項是相關項目標題數據。用戶是點撀日曆內日期按鈕,將數據帶入表格。';}?></p>	
	<hr>
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '顶部左背/右背背景颜色';}else if($_SESSION[tn]==EN){echo 'Background color of Top left/Top right area';}else{echo '頂部左背/右背背景顏色';}?> </b>
	<?php if($_SESSION[tn]==PRC){echo '是日历的顶部区域,您能在背景填上rgb颜色码e.g. rgb(125,125,125), rgba颜色码e.g. rgba(125,125,125,0.5) 或 hex颜色码e.g. #123456。此项在巳创建日历才能键入。';}else if($_SESSION[tn]==EN){echo 'It is about the top parts of calendar. You can add rgb color code e.g. rgb(125,125,125), rgba color code e.g. rgba(125,125,125,0.5) or hex color code e.g. #123456. These items can be amended when calender created.';}else{echo '是日曆的頂部區域,您能在背景填上rgb顏色碼e.g. rgb(125,125,125), rgba顏色碼e.g. rgba(125,125,125,0.5) 或 hex顏色碼e.g. #123456。此項在巳創建日曆才能鍵入。';}?></p>
	<hr>
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '顶部背景颜色';}else if($_SESSION[tn]==EN){echo 'Background color of Top area';}else{echo '頂部背景顏色';}?> </b>
	<?php if($_SESSION[tn]==PRC){echo '是日历的顶部区域,键入方法如下同。';}else if($_SESSION[tn]==EN){echo 'It is about the top area of calendar. You can add background by the method mentioned below.';}else{echo '是日曆的頂部區域,鍵入方法如下同。';}?></p>
	<hr>
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '型式';}else if($_SESSION[tn]==EN){echo 'Style';}else{echo '型式';}?></b>
	<?php if($_SESSION[tn]==PRC){echo '是日历显示结构型式,若不作选择,数据项目只能限在用户设备浏览画面高度内。';}else if($_SESSION[tn]==EN){echo 'It is about calendar style. If you do not select gt1, gt2 or gr5, the number of data item is limited within the viewport of APP user device.';}else{echo '是日曆顯示結構型式,若不作選擇,數據項目只能限在用戶設備瀏覽畫面高度內。';}?></p>
	<p><?php if($_SESSION[tn]==PRC){echo 'gt1a, gt2a 及 gt5a是数据显示型式。';}else if($_SESSION[tn]==EN){echo 'gt1a, gt2a and gt5a are data showing style.';}else{echo 'gt1a, gt2a 及 gt5a是數據顯示型式。';}?></p>
	<p><?php if($_SESSION[tn]==PRC){echo '若想将gt形式改为数据显示型式,您须在数据来源档案名加[gt],e.g. http://www.??????.com/data[gt].html。';}else if($_SESSION[tn]==EN){echo 'If you want to use the gt option as the data showing only style, you need to add [gt] to data filename, e.g. http://www.??????.com/data[gt].html.';}else{echo '若想將gt形式改為數據顯示型式,您須在數據來源檔案名加[gt],e.g. http://www.??????.com/data[gt].html。';}?></p>
	
	<hr>
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '背景';}else if($_SESSION[tn]==EN){echo 'Background';}else{echo '背景';}
	if(!$roww[pjnbr])$roww[pjnbr] = '?';
	?></b>
	<?php if($_SESSION[tn]==PRC){echo '日历一次显示四个月,并分上下月,用户能拖拽画面浏览。建议一页只有一个日历内容。';}else if($_SESSION[tn]==EN){echo 'Four months are showed on the calendar. APP User can swipe the device screen to view them. It is recommended to use one calendar on a page only.';}else{echo '日曆一次顯示四個月,並分上下月,用戶能拖拽畫面瀏覽。建議一頁只有一個日曆內容。';}?></p>
	<p><?php if($_SESSION[tn]==PRC){echo '背景图像,使用应用内的图像,档案须存於panel/'.$roww[pjnbr].'/images档夹内。若设置背景图像上下左右重覆显示,在档案名加[xy]。e.g. picture[xy].png';}else if($_SESSION[tn]==EN){echo 'It is about the content area backgrounds of months. If you use the APP pictures, you need to prepare pictures and store them in  panel/'.$roww[pjnbr].'/images folder. If you add [xy] to the picture file name (e.g. picture[xy].png, the picture will be repeated both vertically and horizontally in the item area.';}else{echo '背景圖像,使用應用內的圖像,檔案須存於panel/'.$roww[pjnbr].'/images檔夾內。若設置背景圖像上下左右重覆顯示,在檔案名加[xy]。e.g. picture[xy].png';}?></p>
	<p><?php if($_SESSION[tn]==PRC){echo '您亦能在背景填上rgb颜色码e.g. rgb(125,125,125), rgba颜色码e.g. rgba(125,125,125,0.5) 或 hex颜色码e.g. #123456代替背景图像。';}else if($_SESSION[tn]==EN){echo 'You can add rgb color code e.g. rgb(125,125,125), rgba color code e.g. rgba(125,125,125,0.5) or hex color code e.g. #123456 instead of background picture.';}else{echo '您亦能在背景填上rgb顏色碼e.g. rgb(125,125,125), rgba顏色碼e.g. rgba(125,125,125,0.5) 或 hex顏色碼e.g. #123456代替背景圖像。';}?></p>
	
	<hr>
	
<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '数据';}else if($_SESSION[tn]==EN){echo 'Data';}else{echo '數據';}?></b>
<?php if($_SESSION[tn]==PRC){echo '數據存於應用內,格式是json,檔案須存於panel/'.$roww[pjnbr].'/檔夾內e.g. 1.html。在网站有相关资料。您亦能将档案存於伺服器,填档案的链结,e.g. http://.....。';}else if($_SESSION[tn]==EN){echo 'You can only use json format data and store its file in panel/'.$roww[pjnbr].'/ folder. Please refer to our website. You can store the data file in the Internet. You need to fill in its URL. e.g. http://.....';}else{echo '數據存於應用內,格式是json,檔案須存於panel/'.$roww[pjnbr].'/檔夾內e.g. 1.html。在網站有相關資料。您亦能將檔案存於伺服器,填檔案的鏈結,e.g. http://.....。';}?></p>

<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '数据內容';}else if($_SESSION[tn]==EN){echo 'Data content';}else{echo '數據內容';}?></b>
<?php if($_SESSION[tn]==PRC){echo '数据是关於项目,对项目的指定日期上的标题丶图像字体及popup网页链结[用户点撀对於项目的数据日期的标题,显示popup内容]。';}else if($_SESSION[tn]==EN){echo 'Data content are item title of your inforamtion, item title data on specific dates, specific icon font showing and specific web page on popup [APP user clicks an item data title on specific date to show a popup content.]';}else{echo '數據是關於項目,對項目的指定日期上的標題、圖像字體及popup網頁鏈結[用戶點撀對於項目的數據日期的標題,顯示popup內容]。';}?></p>
<hr>
	
<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '数据链结';}else if($_SESSION[tn]==EN){echo 'Data source link';}else{echo '數據鏈結';}?></b>
<?php if($_SESSION[tn]==PRC){echo '在日历的左上角有星号,用户点撀能键入自定的数据链结及标题,若想提供链结的选择,您能键入数据链结,格式是json。若填上此链结,用户点撀链结符号,能供用户链结的选项。';}else if($_SESSION[tn]==EN){echo 'A star icon button is showed at the top left corner of calendar. APP user can click it to enter custom data source (url link and its title) for receiving data and showing them on calendar. If you want to provide this data source option, you can fill in the Data source link. The format of data file is json. If you enter this item, APP user can click the link icon button to select your provided options.';}else{echo '在日曆的左上角有星號,用戶點撀能鍵入自定的數據鏈結及標題,若想提供鏈結的選擇,您能鍵入數據鏈結,格式是json。若填上此鏈結,用戶點撀鏈結符號,能供用戶鏈結的選項。';}?></p>
<p><?php if($_SESSION[tn]==PRC){echo '您的设计应考虑将数据分组并使用此功能,特别是手機应用。';}else if($_SESSION[tn]==EN){echo 'You need to consider to group your data in your design and use this function to display data, particularly in mobile phone use.';}else{echo '您的設計應考慮將數據分組並使用此功能,特別是移動應用。';}?></p>

<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '数据链结列表的标题';}else if($_SESSION[tn]==EN){echo 'Title of Data link list ';}else{echo '數據鏈結列表的標題';}?>/<?php if($_SESSION[tn]==PRC){echo '数据链结列表的备注';}else if($_SESSION[tn]==EN){echo 'Explanation of Data link list ';}else{echo '數據鏈結列表的備註';}?></b>
<?php if($_SESSION[tn]==PRC){echo '若巳提供链结的选择,用户点撀上述数据链结的按钮,能供用户链结的选项列表。您能添加标题及备注。';}else if($_SESSION[tn]==EN){echo 'About the above data source link, APP user can click a link icon button to show the data list if any. You can add title or explaination remark to it.';}else{echo '若巳提供鏈結的選擇,用戶點撀上述數據鏈結的按鈕,能供用戶鏈結的選項列表。您能添加標題及備註。';}?></p>
<HR>
<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo 'popup背景';}else if($_SESSION[tn]==EN){echo 'Popup background';}else{echo 'popup背景';}?></b>
<?php if($_SESSION[tn]==PRC){echo '是用户点撀星号按钮显示的popup,设置方法是同上的背景方法。';}else if($_SESSION[tn]==EN){echo 'It is about the popup showed by APP user clicking the star icon button. Please refer to above background section.';}else{echo '是用戶點撀星號按鈕顯示的popup,設置方法是同上的背景方法。';}?></p>

	</div>

<a href="#infs" data-rel="popup" class="ui-btn ui-btn-b ui-btn-inline ui-corner-all ui-mini">? <?php if($_SESSION[tn]==PRC){echo '标题填写解释';}else if($_SESSION[tn]==EN){echo 'Button title explanation';}else{echo '標題填寫解釋';}?></a>
	<div data-role="popup" id="infs" style="min-width:300px;max-width:85%; overflow-y:auto" data-position-to="window" data-theme="f"><a href="#" class="popn ui-btn ui-btn-z ui-corner-all ui-icon-delete ui-btn-icon-notext" data-rel="back"></a>
<p><b style="color:BLUE"><?php if($_SESSION[tn]==PRC){echo '按钮标题填写';}else if($_SESSION[tn]==EN){echo 'Button title';}else{echo '按鈕標題填寫';}?></b>
<?php if($_SESSION[tn]==PRC){echo '有关星号按钮功能的相关标题。当巳创建日历,以下的标题的填写项才显示。';}else if($_SESSION[tn]==EN){echo 'It is the titles relating to the star icon button.<BR>The input of following items are showed when calendar created.';}else{echo '有關星號按鈕功能的相關標題。當巳創建日曆,以下的標題的填寫項才顯示。';}?></p>

<p><?php if($_SESSION[tn]==PRC){echo '点撀此页\'星号按钮popup显示\'按钮,显示下列项目。';}else if($_SESSION[tn]==EN){echo 'You can click the \'Star button popup showing\' on this page to show the positions of the following items.';}else{echo '點撀此頁\'星號按鈕popup顯示\'按鈕,顯示下列項目。';}?></p>
<hr>
<p><b style="color:black"><span class="pigss-star"></span> <?php if($_SESSION[tn]==PRC){echo '星号按钮标题';}else if($_SESSION[tn]==EN){echo 'Title of Star button';}else{echo '星號按鈕標題';}?></b>
<?php if($_SESSION[tn]==PRC){echo '有关上述星号按钮的标题。';}else if($_SESSION[tn]==EN){echo 'It is the titles relating to the above mentioned star icon button.';}else{echo '有關上述星號按鈕的標題。';}?></p>
<hr>
<p><b style="color:black"><span class="pigss-link"></span><?php if($_SESSION[tn]==PRC){echo '链结符号标题';}else if($_SESSION[tn]==EN){echo 'Title of Data link button';}else{echo '鏈結符號標題';}?></b>
<?php if($_SESSION[tn]==PRC){echo '有关上述星号按钮点撀显示的POPUP内容内的链结符号,若有设定,用户点撀显示数据链结选项,最多8个数据,点撀此按钮接收链结数据丶逐个及循环显示。';}else if($_SESSION[tn]==EN){echo 'It is a button showed in the above mentioned popup. If you give its URL value of related data link to enable this function, APP user clicks it to receive the link\'s data or show the link\'s options (with maximum eight options) in loop.';}else{echo '有關上述星號按鈕點撀顯示的POPUP內容內的鏈結符號,若有設定,用戶點撀顯示數據鏈結選項,最多8個數據,點撀此按鈕接收鏈結數據、逐個及循環顯示。';}?></p>
<hr>
<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '数据链结键入项的标题';}else if($_SESSION[tn]==EN){echo 'Title of Data link input';}else{echo '數據鏈結鍵入項的標題';}?></b>
<?php if($_SESSION[tn]==PRC){echo '在上述POPUP内容内,供用户填写自定的数据链结,点撀列表符号按钮,作用是储存在此POPUP的列表内,点撀日历符号按钮,作用是显示数据。';}else if($_SESSION[tn]==EN){echo 'It is within the above mentioned popup and is for APP user to fill in url value of custom link. The link value is stored on the link list when APP user clicks on the Title store button [list icon button]. The data relating to the link will be showed on the calendar when APP user clicks the Calendar button [calendar icon button].  ';}else{echo '在上述POPUP內容內,供用戶填寫自定的數據鏈結,點撀列表符號按鈕,作用是儲存在此POPUP的列表內,點撀日曆符號按鈕,作用是顯示數據。';}?></p>
<hr>	
<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '链结标题键入项的标题';}else if($_SESSION[tn]==EN){echo 'Title of Data link title input';}else{echo '鏈結標題鍵入項的標題';}?></b>
<?php if($_SESSION[tn]==PRC){echo '是代表上述结键的标题,用戶填此项是列表上显示此标题代替显示链结值。';}else if($_SESSION[tn]==EN){echo 'It is the title of the link\'s url value. If APP user enters this title, it shows on the link list rather than url value of its link.';}else{echo '是代表上述結鍵的標題,用戶填此項是列表上顯示此標題代替顯示鏈結值。';}?></p>
<hr>
<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '列表符号标题';}else if($_SESSION[tn]==EN){echo 'Title of store button';}else{echo '列表符號標題';}?></b>
<?php if($_SESSION[tn]==PRC){echo '当在\'链结键入项\'填入链结值,再点撀此按钮将键入值及其标题储存在POPUP列表内,最多显示存值35个[包括计算巳删除],用户点撀列表内的标题能将值填入\'标题键入项\'内。此项是此按钮的标题。';}else if($_SESSION[tn]==EN){echo 'If APP user enters a link\'s url value to the input of Data link and clicks on Title store button [list icon button], the link value and its title are stored on the link list which is showed on the above mentioned popup. The maximum number of stored items showing [including existing and deleted item] is 35.';}else{echo '當在\'鏈結鍵入項\'填入鏈結值,再點撀此按鈕將鍵入值及其標題儲存在POPUP列表內,最多顯示存值35個[包括計算巳刪除],用戶點撀列表內的標題能將值填入\'標題鍵入項\'內。此項是此按鈕的標題。';}?>
<a href="#" class="ui-btn ui-btn-f ui-btn-inline ui-icon-bullets ui-btn-icon-left"><span class="pigss-pencil"></span></a></p>
<hr>
<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '日历符号标题';}else if($_SESSION[tn]==EN){echo 'Title of Calendar button';}else{echo '日曆符號標題';}?></b>

<?php if($_SESSION[tn]==PRC){echo '当在\'链结键入项\'巳填入链结值,再点撀此按钮,能在日历显示相关数据。';}else if($_SESSION[tn]==EN){echo 'If APP user enters a link\'s url value to the input of Data link, APP user clicks on Calendar button [calendar icon button] is to show related data of the link on the calendar.';}else{echo '當在\'鏈結鍵入項\'巳填入鏈結值,再點撀此按鈕,能在日曆顯示相關數據。';}?>
<a href="#" class="ui-btn ui-btn-f ui-btn-inline ui-icon-calendar ui-btn-icon-left"><span class="pigss-pencil"></span></a></p>
<hr>
<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '数据重整显示值';}else if($_SESSION[tn]==EN){echo 'Data refresh message';}else{echo '數據重整顯示值';}?></b>
<?php if($_SESSION[tn]==PRC){echo '键入此值才能启用此功能[e.g.预设的数据档案],此数据重整按钮是显示在上述popup内。当用户点撀此按钮,在\'链结键入项\'是显示此值,作用是提示用户进行数据重整至应用的预设互联数据或应用内数据。用户点撀此按钮';}else if($_SESSION[tn]==EN){echo 'You need to enter this message value [e.g. original data filename] to enable this function. This data refresh button ';}else{echo '鍵入此值[e.g.預設的數據檔案]才能啟用此功能,此數據重整按鈕是顯示在上述popup內。當用戶點撀此按鈕';}?>
<a href="#" class="ui-btn ui-btn-z ui-btn-inline ui-icon-refresh ui-btn-icon-notext"></a>
<?php if($_SESSION[tn]==PRC){echo ',在\'链结键入项\'是显示此值,作用是提示用户进行数据重整至应用的预设互联数据或应用内数据。用户点撀此按钮再点撀日历符号按钮,才能重整数据。';}else if($_SESSION[tn]==EN){echo ' is showed on the above mentioned popup. When APP user clicks on this button, this message value will be showed in the input of Data link. APP user can click this refresh button and then click the Calendar button [calendar icon button]. The calendar data can be refreshed as original Internet data source or APP data.';}else{echo ',在\'鏈結鍵入項\'是顯示此值,作用是提示用戶進行數據重整至應用的預設互聯數據或應用內數據。用戶點撀此按鈕再點撀日曆符號按鈕,才能重整數據。';}?>

</p>
<hr>
<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '列表备注';}else if($_SESSION[tn]==EN){echo 'List explanation';}else{echo '列表備註';}?>	</b>
<?php if($_SESSION[tn]==PRC){echo '此项是相关上述POPUPO内的链结列表,用户的自定链结值储存,是显示在此列表上。此备注显示在列表位置[未有储存]或列表下。';}else if($_SESSION[tn]==EN){echo 'This explanation is showed on the position of link list  [when no storage data] or below it which is within the above mentioned popup. This link list is for showing the stored link values and their titles inputted by APP user.';}else{echo '此項是相關上述POPUPO內的鏈結列表,用戶的自定鏈結值儲存,是顯示在此列表上。此備註顯示在列表位置[未有儲存]或列表下。';}?>
</p>
	
	</div>

<a href="#infn" data-rel="popup" class="ui-btn ui-btn-b ui-btn-inline ui-corner-all ui-mini"><?php if($_SESSION[tn]==PRC){echo '星号按钮';}else if($_SESSION[tn]==EN){echo 'Star button';}else{echo '星號按鈕';}?><span class="pigss-star"></span> popup<?php if($_SESSION[tn]==PRC){echo '显示';}else if($_SESSION[tn]==EN){echo ' showing';}else{echo '顯示';}?></a>
<div id="infn" data-role="popup" data-corners="false" style="padding:5px;" data-theme="f" class="ifrwidthps"><a href="#" data-rel="back" class="popn ui-btn ui-btn-z ui-btn-icon-notext ui-icon-delete"></a>
<div id="gtlnkform">
<a href="#" class="ui-btn ui-btn-z ui-btn-inline ui-icon-refresh ui-btn-icon-notext"></a><a href="#" class="ui-btn ui-btn-z ui-btn-inline">XXXX-XX-XX</a>
<a href="#" id="gtlnks" class="ui-btn ui-btn-z ui-btn-inline"><span class="pigss-link"></span><?php if($_SESSION[tn]==PRC){echo '链结符号标题';}else if($_SESSION[tn]==EN){echo 'Title of Data link button';}else{echo '鏈結符號標題';}?></a><br>
<?php if($_SESSION[tn]==PRC){echo '此处是数据链结键入项的标题';}else if($_SESSION[tn]==EN){echo 'Title of Data link input';}else{echo '此處是數據鏈結鍵入項的標題';}?>
<textarea data-corners="false" data-theme="a"><?php if($_SESSION[tn]==PRC){echo '此处是数据链结键入项';}else if($_SESSION[tn]==EN){echo 'Input of Data link';}else{echo '此處是數據鏈結鍵入項';}?></textarea>
<?php if($_SESSION[tn]==PRC){echo '此处是链结标题键入项的标题';}else if($_SESSION[tn]==EN){echo 'Title of Data link title input';}else{echo '此處是鏈結標題鍵入項的標題';}?>
<textarea data-corners="false" data-theme="a"><?php if($_SESSION[tn]==PRC){echo '此处是链结标题键入项';}else if($_SESSION[tn]==EN){echo 'Input of Data link title ';}else{echo '此處是鏈結標題鍵入項';}?></textarea><a href="#" class="ui-btn ui-btn-x ui-btn-inline ui-icon-bullets ui-btn-icon-left"><span class="pigss-pencil"></span><?php if($_SESSION[tn]==PRC){echo '此处是列表符号标题';}else if($_SESSION[tn]==EN){echo 'Title of Title store button';}else{echo '此處是列表符號標題';}?></a>
<a href="#" class="ui-btn ui-btn-x ui-btn-inline ui-icon-calendar ui-btn-icon-left"><span class="pigss-pencil"></span><?php if($_SESSION[tn]==PRC){echo '此处是日历符号标题';}else if($_SESSION[tn]==EN){echo 'Title of Calendar button';}else{echo '此處是日曆符號標題';}?></a>
<a href="#" class="ui-btn ui-btn-x ui-btn-inline">X</a><HR>
<div><a href="#" style="white-space:normal;width:88%" class="ui-btn ui-btn-f" ><?php if($_SESSION[tn]==PRC){echo '用户自定数据链结值 [此处是-链结列表]';}else if($_SESSION[tn]==EN){echo 'Data link entered by APP user [link list]';}else{echo '用戶自定數據鏈結值 [此處是-鏈結列表]';}?></a></div><div><?php if($_SESSION[tn]==PRC){echo '此处是列表备注';}else if($_SESSION[tn]==EN){echo 'List explanation';}else{echo '此處是列表備註';}?></div>

</div>
<div id="gtlnk" style="display:none;">
&nbsp;<a href="#" class="ui-btn ui-btn-z ui-btn-inline ui-btn-icon-notext ui-icon-carat-l"></a>&nbsp;&nbsp;&nbsp;<a href="#" class="ui-btn ui-btn-z ui-btn-inline ui-btn-icon-notext ui-icon-refresh"></a>
<BR><?php if($_SESSION[tn]==PRC){echo '数据链结列表的标题';}else if($_SESSION[tn]==EN){echo 'Title of Data link list ';}else{echo '數據鏈結列表的標題';}?>
<ul data-role="listview" data-inset="true" data-corners="false" data-filter="true"  style="width:80%"><li data-icon="edit"><a class="ui-btn ui-btn-f">EXAMPLE</a></li></ul>
<?php if($_SESSION[tn]==PRC){echo '数据链结列表的备注';}else if($_SESSION[tn]==EN){echo 'Explanation of Data link list ';}else{echo '數據鏈結列表的備註';}?>
</div>
</div>
 
</div>


</div>
	
	</FORM>
<hr>

	
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
<BR><BR>
<?php if($_SESSION[tn]==PRC){echo '您的设计能像此图像在特定日期添加按钮链结丶背景颜色丶图像字体及文字。';}else if($_SESSION[tn]==EN){echo 'You can button link, background color, icon font and text on specific date as the following picture.';}else{echo '您的設計能像此圖像在特定日期添加按鈕鏈結、背景顏色、圖像字體及文字。';}?><br>
<img src="images/gnt.png"/>	
<br>
<?php if($_SESSION[tn]==PRC){echo '例';}else if($_SESSION[tn]==EN){echo 'Example';}else{echo '例';}?><br>
<a href="#infsn" data-rel="popup" class="ui-btn ui-btn-b ui-btn-inline ui-corner-all ui-mini">? <?php if($_SESSION[tn]==PRC){echo '解释';}else if($_SESSION[tn]==EN){echo 'Explanation';}else{echo '解釋';}?></a>
	<div data-role="popup" id="infsn" style="min-width:300px;max-width:85%" data-position-to="window" data-theme="f"><a href="#" class="ui-btn ui-corner-all ui-icon-delete ui-btn-icon-notext ui-btn-right" data-rel="back"></a>

	<h4 style="color:black"><?php if($_SESSION[tn]==PRC){echo '试用';}else if($_SESSION[tn]==EN){echo 'Try';}else{echo '試用';}?></h4>
	<p><?php if($_SESSION[tn]==PRC){echo '只能在您的设计上才能写入数据。';}else if($_SESSION[tn]==EN){echo 'You can enter data for your design only. This example is for reference only.';}else{echo '只能在您的設計上才能寫入數據。';}?></p>
	<hr>

	
	
<h4 style="color:black"><?php if($_SESSION[tn]==PRC){echo '数据';}else if($_SESSION[tn]==EN){echo 'Data';}else{echo '數據';}?></h4>
<p><?php if($_SESSION[tn]==PRC){echo '您能在特定日期显示应用内或互联网伺服器的特定格式json数据。';}else if($_SESSION[tn]==EN){echo 'You can only show json format data on specific date. The data source can be in APP data or from the Internet data.';}else{echo '您能在特定日期顯示應用內或互聯網伺服器的特定格式json數據。';}?></p>
<hr>
<h4 style="color:black"><?php if($_SESSION[tn]==PRC){echo '浏览';}else if($_SESSION[tn]==EN){echo 'Browsing';}else{echo '瀏覽';}?></h4>
	<p><?php if($_SESSION[tn]==PRC){echo '用户能拖拽画面浏览四个月日期,点撀左上角按钮能变更月份。';}else if($_SESSION[tn]==EN){echo 'APP user can swipe device screen to browse four month data and click the top left button to alter month value.';}else{echo '用戶能拖拽畫面瀏覽四個月日期,點撀左上角按鈕能變更月份。';}?></p>
	<hr>
	<h4 style="color:black"><?php if($_SESSION[tn]==PRC){echo '背景';}else if($_SESSION[tn]==EN){echo 'Background';}else{echo '背景';}?></h4>
	<p><?php if($_SESSION[tn]==PRC){echo '您能使用互联网丶应用内或特定颜色作背景。';}else if($_SESSION[tn]==EN){echo 'You can use the Internet\'s picture, APP\'s picture or specific color as background.';}else{echo '您能使用互聯網、應用內或特定顏色作背景。';}?></p>
	
	
	</div>

<div style="background-color:rgba(0, 0, 0, 0.5);color:#FFFFFF;"><span id="12owls1"></span>&nbsp;&nbsp;<a href="#" id="12shfl1" class="ui-btn ui-btn-z ui-btn-inline ui-btn-icon-notext ui-icon-carat-l"></a>&nbsp;&nbsp;<a href="#" id="12shfr1" class="ui-btn ui-btn-z ui-btn-inline ui-btn-icon-notext ui-icon-carat-r"></a></div><div id="12owlmns1"></div><div  style="float:left;overflow-x:auto;" id="12owlclns1">
	<div id="12owlclnsv1"></div>
	</div><div  style="overflow-x:auto">
	<div  id="12owlcln1" style="width:22200px">
  <div style="float:left;"><div style="float:left;" id="12owlmn1n1"></div><div style="float:left;" id="12owlmn1n2"></div></div>
  <div style="float:left;"><div style="float:left;" id="12owlmn1n3"></div><div style="float:left;" id="12owlmn1n4"></div></div>
  <div style="float:left;"><div style="float:left;" id="12owlmn1n5"></div><div style="float:left;" id="12owlmn1n6"></div></div>
  <div style="float:left;"><div style="float:left;" id="12owlmn1n7"></div><div style="float:left;" id="12owlmn1n8"></div></div></div></div><div id="12gtdataform1" data-role="popup" data-corners="false" style="padding:5px;height: 100%;width: 100%;top:0;left:-15px;" data-theme="f" class="ifrwidthps"><a href="#" data-rel="back" class="popn ui-btn ui-btn-z ui-btn-icon-notext ui-icon-delete"></a><div id="12gtlnkform1"><a id="12gtday1" class="ui-btn ui-btn-z ui-btn-inline"></a><a href="#" id="12gtlink1" data-html="http://192.168.1.107/appsystemd/gtlink.html" class="ui-btn ui-btn-z ui-btn-inline"><span class="pigss-link"></span></a><textarea data-corners="false" data-theme="a" id="12gthref1"></textarea><textarea data-corners="false" data-theme="a" id="12gthrefn1"></textarea><input type="hidden" id="12gthrefnbr1"><a href="#" id="12gtdata1" class="ui-btn ui-btn-x ui-btn-inline ui-icon-bullets ui-btn-icon-left"><span class="pigss-pencil"></span></a>
<a href="#" id="12gtcalendar1" class="ui-btn ui-btn-x ui-btn-inline ui-icon-calendar ui-btn-icon-left"><span class="pigss-pencil"></span></a>
<a href="#" id="12gthrefht1" class="ui-btn ui-btn-x ui-btn-inline">X</a><HR>
<div id="12gtdatsbtn1"></div><div></div></div><div id="12gtlnk1" style="display:none;">&nbsp;<a href="#" class="gtlnkb ui-btn ui-btn-z ui-btn-inline ui-btn-icon-notext ui-icon-carat-l"></a>&nbsp;&nbsp;&nbsp;<a href="#" class="ui-btn ui-btn-z ui-btn-inline ui-btn-icon-notext ui-icon-refresh" data-html="http://192.168.1.107/appsystemd/gtlink.html"></a><div style="overflow-y:auto;width:100%" class="webkitm"><ul data-role="listview" data-inset="true" data-corners="false" data-filter="true" style="width:80%"></ul></div>



<script>
$(document).on("pageshow", "#appageone", function(){
//$("#inf").height($(window).height()*0.85);

   var d = new Date();var mnh = d.getMonth()+1;var day = d.getDate();var yr = d.getFullYear(); 
  
 $("#12owlcln1").css("min-height",$(window).height()*0.2); $("#12owlclns1").css("min-height",$(window).height()*0.2);

  localStorage.setItem("12gtnbr1",'["1","5"]');
  localStorage.setItem("12gtnbrmsg1",'["item1","item5"]');

var wdayn = ['Sun','Mon','Tue','Wed','Thu','Fri','Sat','Sun','Mon','Tue','Wed','Thu','Fri','Sat','Sun','Mon','Tue','Wed','Thu','Fri','Sat','Sun','Mon','Tue','Wed','Thu','Fri','Sat','Sun','Mon','Tue','Wed','Thu','Fri','Sat','Sun','Mon','Tue','Wed','Thu','Fri','Sat'];
	gtn(d,mnh,day,yr,12,1,wdayn,'','','vw.html',"","","","","",$(window).width());
	gts(d,mnh,day,yr,12,1,1,wdayn,'','',"","","","","",$(window).width());
$('#gtlnks').click(function (event){
	event.preventDefault();	
	$('#gtlnkform').hide();
	$('#gtlnk').show(); 		
;})	

$('#gtlnk a').click(function (event){
	event.preventDefault();	
	$('#gtlnk').hide();
	$('#gtlnkform').show(); 		
;})		
;})			
	//owlmndata = '<div style="padding:1px;background-color:rgba(35, 145, 234, 0.4)" data-html="images/1.html" data-dy="<?php if($_SESSION[tn]==PRC){echo '标题';}else if($_SESSION[tn]==EN){echo 'Title';}else{echo '標題';}?>" data-dys="<?php if($_SESSION[tn]==PRC){echo '內容.....';}else if($_SESSION[tn]==EN){echo 'Content.....';}else{echo '內容.....';}?>" data-date="'+yr+'-'+mnh+'-'+day+'" data-dyimg="../images/sw.jpg" class="owlmndata ui-btn-inline"><span style="color:pink" class="pigss-bunny"></span><?php if($_SESSION[tn]==PRC){echo '标题';}else if($_SESSION[tn]==EN){echo 'Title';}else{echo '標題';}?><BR><img class="calendjs" src="../images/sw.jpg"/></div>';
	//$(".shw").find( "[data-date="+yr+'-'+mnh+'-'+day+"]").append(owlmndata);
</script>
	<script src="../js/appsystem.js"></script>
<hr>
	<div class="copyright">&copy; 2015 Lee Wai Kwok(Hong Kong). JSTRUST CONSULTANCY. <?php if($_SESSION[tn]==PRC){echo '版权所有';}else if($_SESSION[tn]==EN){echo 'All Rights Reserved.';}else{echo '版權所有';}?></div>
	
			<div id="imgspop" data-theme="z" style="padding:5px;" data-role="popup" data-corners="false"><a href="#" data-rel="back" class="popn ui-btn ui-btn-z ui-btn-icon-notext ui-icon-delete"></a><div class="ifrspinn" style="position:relative;left:50%;width:100%">Loading...<BR><img src="css/images/ajax-loader.gif"></div><div class="imgspop"><img src=""></div></div>
		<div id="ifrspop" data-theme="z" data-role="popup" data-corners="false" style="overflow-y:auto;height:100%;width:100%;top:0;left:-15px;" class="ifrwidthpn" ><a href="#" data-rel="back" class="popn ui-btn ui-btn-z ui-btn-icon-notext ui-icon-delete"></a><div class="ifrspinn" style="position:relative;left:50%;width:100%">Loading...<BR><img src="css/images/ajax-loader.gif"></div><iframe src="" style="width:100%" seamless frameBorder="0" ></iframe></div>	
		<div class="ui-content" id="pVideo" data-corners="false" data-role="popup" data-theme="x" data-tolerance="2,2"><iframe width="498" height="298" src="" seamless=""></iframe></div><div id="pAudio" data-corners="false"  data-role="popup" data-theme="a"  style="padding:5px;height: 100%;width: 100%;top:0;left:-15px;" class="ifrwidthps"><a href="#" data-rel="back" class="popn ui-btn ui-btn-z ui-btn-icon-notext ui-icon-delete"></a><br><br><i id="audtn" ></i> &nbsp;<i id="audur"></i><br><a href="#"  id="playaudion" data-vlu="" style="border:none;" class="ui-btn ui-btn-w"><img style="width:50px" src="css/images/sound.svg"></a><BR><input id="volmn" type="range" data-role="none" value="0.8"  step="0.1" min="0" max="1"><BR><input id="toposn" type="range" data-role="none" value="0" step="0.01" min="0" max="1"><div id="volmndiv"><input id="volmnapp" type="range"  value="0.8"  step="0.1" min="0" max="1"></div><BR><div id="toposndiv"><input id="toposnapp" type="range"  value="0" step="0.01" min="0" max="1"></div><audio id="audsn"><source src="" type="audio/mpeg"><source src="" type="audio/wav"></audio><div class="ifrspinn" style="position:relative;left:50%;width:100%">Loading...<BR><img src="css/images/ajax-loader.gif"></div></div>

	
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
	

			function imgbg($imgbg){
			if(strpos($imgbg,'http://')!==false or strpos($imgbg,'https://')!==false){$images = '';}else{$images = 'images/';}
			if(strpos($imgbg,'#')!==false or strpos($imgbg,'rgba(')!==false  or strpos($imgbg,'rgb(')!==false){$bghtml = 'background-color:'.htmlspecialchars($imgbg).';';}
			else if(strpos($imgbg,'[xy]')!==false){$bghtml = 'background-image:url('.$images.htmlspecialchars($imgbg).');';}
			else{$bghtml = 'background-image:url('.$images.htmlspecialchars($imgbg).');background-size:100%;background-repeat:repeat-y;';}
			return $bghtml;
			;}
			
	if($_POST[bgtarea]){$bgtarea=imgbg($_POST[bgtarea]);}else{$bgtarea='background-color:rgba(0, 0, 0, 0.5);';}	
	
			
	$popup .= '<!--data'.htmlspecialchars($_POST[sun]).'@#@'.htmlspecialchars($_POST[mon]).'@#@'.htmlspecialchars($_POST[tue]).'@#@'.htmlspecialchars($_POST[wed]).'@#@'.htmlspecialchars($_POST[thu]).'@#@'.htmlspecialchars($_POST[fri]).'@#@'.htmlspecialchars($_POST[sat]).'@#@'.htmlspecialchars($_POST[saturday]).'@#@'.htmlspecialchars($_POST[sunday]).'@#@'.htmlspecialchars($_POST[html]).'@#@'.htmlspecialchars($_POST[appdata]).'@#@'.htmlspecialchars($_POST[internet]).'@#@'.htmlspecialchars($_POST[imgbg1]).'@#@'.htmlspecialchars($_POST[imgbg2]).'@#@'.htmlspecialchars($_POST[imgbg3]).'@#@'.htmlspecialchars($_POST[imgbg4]).'@#@'.htmlspecialchars($_POST[imgbg5]).'@#@'.htmlspecialchars($_POST[imgbg6]).'@#@'.htmlspecialchars($_POST[imgbg7]).'@#@'.htmlspecialchars($_POST[imgbg8]).'@#@'.htmlspecialchars($_POST[gtlink]).'@#@'.htmlspecialchars($_POST[gtstitle]).'@#@'.htmlspecialchars($_POST[gtlinktitle]).'@#@'.htmlspecialchars($_POST[gthreftitle]).'@#@'.htmlspecialchars($_POST[gthrefntitle]).'@#@'.htmlspecialchars($_POST[gtdatatitle]).'@#@'.htmlspecialchars($_POST[gtcaltitle]).'@#@'.htmlspecialchars($_POST[gtlistitle]).'@#@'.htmlspecialchars($_POST[gtrefreshtitle]).'@#@'.htmlspecialchars($_POST[bgtarea]).'@#@'.htmlspecialchars($_POST[bgarea]).'@#@'.htmlspecialchars($_POST[bgareas]).'@#@'.htmlspecialchars($_POST[gtlnktitle]).'@#@'.htmlspecialchars($_POST[gtlnkftr]).'@#@'.htmlspecialchars($_POST[typ]).'@#@'.htmlspecialchars($_POST[gtcalbg]).'data!-->';
	
	if(strpos($_POST[appdata],'[gt]')==false and $_POST[typ]!=='1a' and $_POST[typ]!=='2a' and $_POST[typ]!=='5a')$popup .= '<div style="'.$bgtarea.'color:#FFFFFF;"><span id="'.$pj.$ap.'owls'.$pn.'"></span>&nbsp;&nbsp;<a href="#" id="'.$pj.$ap.'shfl'.$pn.'" class="ui-btn ui-btn-z ui-btn-inline ui-btn-icon-notext ui-icon-carat-l"></a>&nbsp;&nbsp;<a href="#" id="'.$pj.$ap.'shfr'.$pn.'" class="ui-btn ui-btn-z ui-btn-inline ui-btn-icon-notext ui-icon-carat-r"></a></div><div id="'.$pj.$ap.'owlmns'.$pn.'"></div>';

if($_POST[typ]){
	$popup .= '<div  style="float:left;" id="'.$pj.$ap.'owlclns'.$pn.'">
	</div>';
;}else{
	$popup .= '<div  style="float:left;overflow-x:auto;" id="'.$pj.$ap.'owlclns'.$pn.'">
	<div id="'.$pj.$ap.'owlclnsv'.$pn.'"></div>
	</div>';
;}



if($_POST[typ]){
	$popup .= '<div id="'.$pj.$ap.'owlcln'.$pn.'" style="overflow-x:auto">';
;}else{
	$popup .= '<div  style="overflow-x:auto">
	<div  id="'.$pj.$ap.'owlcln'.$pn.'">';
;}
			
			
			if($_POST[imgbg1]){$imgbg1 =  imgbg($_POST[imgbg1]);}else{$imgbg1 = '';}
			if($_POST[imgbg2]){$imgbg2 =  imgbg($_POST[imgbg2]);}else{$imgbg2 = '';}
			if($_POST[imgbg3]){$imgbg3 =  imgbg($_POST[imgbg3]);}else{$imgbg3 = '';}
			if($_POST[imgbg4]){$imgbg4 =  imgbg($_POST[imgbg4]);}else{$imgbg4 = '';}
			if($_POST[imgbg5]){$imgbg5 =  imgbg($_POST[imgbg5]);}else{$imgbg5 = '';}
			if($_POST[imgbg6]){$imgbg6 =  imgbg($_POST[imgbg6]);}else{$imgbg6 = '';}
			if($_POST[imgbg7]){$imgbg7 =  imgbg($_POST[imgbg7]);}else{$imgbg7 = '';}
			if($_POST[imgbg8]){$imgbg8 =  imgbg($_POST[imgbg8]);}else{$imgbg8 = '';}
			
			if($_POST[gtlink]){$gtlink =  'data-html="'.htmlspecialchars($_POST[gtlink]).'"';}else{$gtlink = '';}

			if($_POST[typ])$padding .= 'padding:1px;';
$popup .= '
  <div style="float:left;'.$padding.'"><div style="float:left;'.$imgbg1.'" id="'.$pj.$ap.'owlmn'.$pn.'n1"></div><div style="float:left;'.$imgbg2.'" id="'.$pj.$ap.'owlmn'.$pn.'n2"></div></div>
  <div style="float:left;'.$padding.'"><div style="float:left;'.$imgbg3.'" id="'.$pj.$ap.'owlmn'.$pn.'n3"></div><div style="float:left;'.$imgbg4.'" id="'.$pj.$ap.'owlmn'.$pn.'n4"></div></div>
  <div style="float:left;'.$padding.'"><div style="float:left;'.$imgbg5.'" id="'.$pj.$ap.'owlmn'.$pn.'n5"></div><div style="float:left;'.$imgbg6.'" id="'.$pj.$ap.'owlmn'.$pn.'n6"></div></div>
  <div style="float:left;'.$padding.'"><div style="float:left;'.$imgbg7.'" id="'.$pj.$ap.'owlmn'.$pn.'n7"></div><div style="float:left;'.$imgbg8.'" id="'.$pj.$ap.'owlmn'.$pn.'n8"></div></div>';
$popup .= '</div>';

if($_POST[gtcalbg]){
			if(strpos($_POST[gtcalbg],'http://')!==false or strpos($_POST[gtcalbg],'https://')!==false){$images = '';}else{$images = 'images/';}
			
			if(strpos($_POST[gtcalbg],'#')!==false or strpos($_POST[gtcalbg],'rgba(')!==false  or strpos($_POST[gtcalbg],'rgb(')!==false){$gtcalbg = 'background-color:'.htmlspecialchars($_POST[gtcalbg]).';';}
			else if(strpos($_POST[gtcalbg],'[xy]')!==false){$gtcalbg = 'background-image:url('.$images.htmlspecialchars($_POST[gtcalbg]).');';}
			else{$gtcalbg = 'background-image:url('.$images.htmlspecialchars($_POST[gtcalbg]).');background-size:100%;background-repeat:repeat-y;';}
;}

if(!$_POST[typ])$popup .= '</div>';
$popup .= '<div id="'.$pj.$ap.'gtdataform'.$pn.'" data-role="popup" data-corners="false" style="'.$gtcalbg.'padding:5px;;height: 100%;width: 100%;top:0;left:-15px;" data-theme="f" class="ifrwidthps"><a href="#" data-rel="back" class="popn ui-btn ui-btn-z ui-btn-icon-notext ui-icon-delete"></a><div id="'.$pj.$ap.'gtdataformn'.$pn.'" class="webkitm" style="overflow-y:auto;">';
if($_POST[gtlinktitle] or $gtlink)$popup .= '<div id="'.$pj.$ap.'gtlnkform'.$pn.'">';
if($_POST[gtrefreshtitle])$popup .= '<a href="#" id="'.$pj.$ap.'gthrefresh'.$pn.'" data-inf="'.htmlspecialchars($_POST[gtrefreshtitle]).'" class="ui-btn ui-btn-z ui-btn-inline ui-icon-refresh ui-btn-icon-notext"></a>';
$popup .= '<a id="'.$pj.$ap.'gtday'.$pn.'" class="ui-btn ui-btn-z ui-btn-inline"></a>';
if($_POST[gthrefntitle] or $_POST[gthreftitle])$popup .= '<BR>';
if($_POST[gtlinktitle] or $gtlink)$popup .= '<a href="#" id="'.$pj.$ap.'gtlink'.$pn.'" '.$gtlink.' class="ui-btn ui-btn-z ui-btn-inline"><span class="pigss-link"></span>'.htmlspecialchars($_POST[gtlinktitle]).'</a>';
if($_POST[gthreftitle])$popup .= '<br>'.htmlspecialchars($_POST[gthreftitle]);
$popup .= '<textarea data-corners="false" data-theme="a" id="'.$pj.$ap.'gthref'.$pn.'"></textarea>';
if($_POST[gthrefntitle])$popup .= htmlspecialchars($_POST[gthrefntitle]);
$popup .= '<textarea data-corners="false" data-theme="a" id="'.$pj.$ap.'gthrefn'.$pn.'"></textarea><input type="hidden" id="'.$pj.$ap.'gthrefnbr'.$pn.'"><a href="#" id="'.$pj.$ap.'gtdata'.$pn.'" class="ui-btn ui-btn-x ui-btn-inline ui-icon-bullets ui-btn-icon-left"><span class="pigss-pencil"></span>'.htmlspecialchars($_POST[gtdatatitle]).'</a>
<a href="#" id="'.$pj.$ap.'gtcalendar'.$pn.'" class="ui-btn ui-btn-x ui-btn-inline ui-icon-calendar ui-btn-icon-left"><span class="pigss-pencil"></span>'.htmlspecialchars($_POST[gtcaltitle]).'</a>
<a href="#" id="'.$pj.$ap.'gthrefht'.$pn.'" class="ui-btn ui-btn-x ui-btn-inline">X</a><HR>
<div id="'.$pj.$ap.'gtdatsbtn'.$pn.'"></div><div>'.htmlspecialchars($_POST[gtlistitle]).'</div>';

if(($_POST[gtlinktitle] or $gtlink) and $_POST[gtlnktitle])$gtlnktitle = '<br>'.htmlspecialchars($_POST[gtlnktitle]);


if($_POST[gtlinktitle] or $gtlink){$popup .= '</div><div id="'.$pj.$ap.'gtlnk'.$pn.'" style="display:none;">&nbsp;<a href="#" class="gtlnkb ui-btn ui-btn-z ui-btn-inline ui-btn-icon-notext ui-icon-carat-l"></a>&nbsp;&nbsp;&nbsp;<a href="#" class="ui-btn ui-btn-z ui-btn-inline ui-btn-icon-notext ui-icon-refresh" '.$gtlink.'></a>'.$gtlnktitle.'<ul data-role="listview" data-inset="true" data-corners="false" data-filter="true" style="width:80%"></ul>'.htmlspecialchars($_POST[gtlnkftr]).'</div></div></div>';
}else{
$popup .= '</div></div>';
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
			$webpopup .= $html.'<!--part'.$pn.'!--><!--sysgtsys!-->'.$vnts.$popup.$vntsn.$tabnbgdatns.$htmls;
			$webpopup .= '</div><!--content!--></div><!--page!-->';
			
			$fpagtrns='../panel/'.$roww[pjnbr].'/'.$ap.'.html';
			file_put_contents($fpagtrns,$html.'<!--part'.$pn.'!--><!--sysgtsys!-->'.$vnts.$popup.$vntsn.$tabnbgdatns.$htmls);

			$fpagtrns='../panel/'.$roww[pjnbr].'/web'.$ap.'.html';
			file_put_contents($fpagtrns,$webpopup);

			$guanyin=rand();
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

				if(strpos($_POST[appdata],'[gt]')!==false){ $typ = '';}
					else if(strpos($_POST[typ],'1a')!==false){$typ = '1';}
					else if(strpos($_POST[typ],'2a')!==false){$typ = '2';}
					else if(strpos($_POST[typ],'5a')!==false){$typ = '5';}
					
				if($_POST[internet] or $_POST[appdata]){
				
				if($_POST[internet]){$internet = str_replace('.html','.htm',htmlspecialchars($_POST[internet]));}else{$internet = '';}
				if($_POST[appdata]){$appdata = str_replace('.html','.htm',htmlspecialchars($_POST[appdata]));}else{$appdata = '';}
				
				if(strpos($_POST[appdata],'[gt]')!==false or $_POST[typ]=='1a' or $_POST[typ]=='2a' or $_POST[typ]=='5a'){ 
					
				$gtdata = '/*ajax'.$ap.'ajax*/gtndata("'.$pj.$ap.'","'.$pj.'","'.$pn.'","'.$internet.'","'.htmlspecialchars($_POST[internet]).'","'.$appdata.'","'.htmlspecialchars($_POST[appdata]).'","'.htmlspecialchars($typ).'","'.htmlspecialchars($_POST[gtstitle]).'",windowWidth);/*ajaxs*/';	
				;}else{
					$gtdata = '/*ajax'.$ap.'ajax*/gtdata("'.$pj.$ap.'","'.$pj.'","'.$pn.'","'.$internet.'","'.htmlspecialchars($_POST[internet]).'","'.$appdata.'","'.htmlspecialchars($_POST[appdata]).'","'.htmlspecialchars($_POST[typ]).'",d,mnh,day,yr,wdayn'.$guanyin.',\''.htmlspecialchars($_POST[saturday]).'\',\''.htmlspecialchars($_POST[sunday]).'\',"'.htmlspecialchars($_POST[html]).'","'.htmlspecialchars($_POST[gtstitle]).'","'.htmlspecialchars($_POST[bgarea]).'","'.htmlspecialchars($_POST[bgareas]).'",windowWidth);/*ajaxs*/';					
				;}
				if($_POST[internet]){$refresh = $internet;$refreshs = htmlspecialchars($_POST[internet]);}
				else if($_POST[appdata]){$refresh = $appdata;$refreshs = htmlspecialchars($_POST[appdata]);}
						
				;}else{
					$gtdata = 'gtn(d,mnh,day,yr,'.$pj.$ap.','.$pn.',wdayn'.$guanyin.',\''.htmlspecialchars($_POST[saturday]).'\',\''.htmlspecialchars($_POST[sunday]).'\',"'.htmlspecialchars($_POST[html]).'","'.htmlspecialchars($_POST[gtstitle]).'","'.htmlspecialchars($_POST[bgarea]).'","'.htmlspecialchars($_POST[bgareas]).'","'.htmlspecialchars($_POST[typ]).'",windowWidth);$("#'.$pj.$ap.'owlcln'.$pn.'").css("width",18800);';
				;}
				
				
				//if($appdata or $server){$ajaxStp = '$(document).ajaxStop(function(){';$ajaxStps = '});';}
				//else{$ajaxStp = '';$ajaxStps = '';}

				if(strpos($_POST[appdata],'[gt]')!==false or $_POST[typ]=='1a' or $_POST[typ]=='2a' or  $_POST[typ]=='5a'){ 
				$js = '/*webjs'.$pn.'*/'.'
   $("#'.$pj.$ap.'owlcln'.$pn.'").css("min-height",windowHeight*0.2); ';
   $js .= '$("#'.$pj.$ap.'gtdataformn'.$pn.'").css("max-height",windowHeight*0.97);';
   $js .= '$("#'.$pj.$ap.'owlclns'.$pn.'").css("min-height",windowHeight*0.2);
'.$gtdata;
	$js .= '$("#'.$pj.$ap.'gtcalendar'.$pn.'").click(function (event){event.preventDefault();if(sessionStorage.getItem("'.$pj.$ap.'gtform'.$pn.'"))sessionStorage.setItem("'.$pj.$ap.'gtnform'.$pn.'",sessionStorage.getItem("'.$pj.$ap.'gtform'.$pn.'"));var gthref = $("#'.$pj.$ap.'gthref'.$pn.'").val();';
	if($_POST[gtrefreshtitle])$js .= 'if(gthref=="'.htmlspecialchars($_POST[gtrefreshtitle]).'"){gthref = "'.$refresh.'";gthrefs= "'.$refreshs.'";}
	else ';$js .= 'if(gthref.indexOf("/")>0){var gthrf = gthref.split("/");var s = gthrf.length-1;var gthrfs = gthrf[s].replace(".","gt.");gthrefs = gthref.replace(gthrf[s],gthrfs);}else if(gthref){gthrefs = gthref.replace(".","gt.");}else{gthrefs = "";}
	if(gthref){gtndata("'.$pj.$ap.'","'.$pj.'","'.$pn.'",gthrefs,gthref,"","","'.htmlspecialchars($typ).'","'.htmlspecialchars($_POST[gtstitle]).'");$("#'.$pj.$ap.'gtdataform'.$pn.'").popup(\'close\');};});';
	$js .= $ajaxStp.'gts("","","","",'.$pj.$ap.','.$pj.','.$pn.',"","","","","'.htmlspecialchars($_POST[gtstitle]).'","'.htmlspecialchars($_POST[bgarea]).'","'.htmlspecialchars($_POST[bgareas]).'","'.htmlspecialchars($typ).'",windowWidth);'
				.'/*webjs'.$pn.'*/'
				.'/*});*/';
				;}else{
				$js = '/*webjs'.$pn.'*/'.'
   $("#'.$pj.$ap.'owlcln'.$pn.'").css("min-height",windowHeight*0.2); ';
   $js .= '$("#'.$pj.$ap.'gtdataformn'.$pn.'").css("max-height",windowHeight*0.97); ';
   $js .= '$("#'.$pj.$ap.'owlclns'.$pn.'").css("min-height",windowHeight*0.2);
   var d = new Date();var mnh = d.getMonth()+1;var day = d.getDate();var yr = d.getFullYear(); 
var wdayn'.$guanyin.' = [\''.$sun.'\',\''.$mon.'\',\''.$tue.'\',\''.$wed.'\',\''.$thu.'\',\''.$fri.'\',\''.$sat.'\',\''.$sun.'\',\''.$mon.'\',\''.$tue.'\',\''.$wed.'\',\''.$thu.'\',\''.$fri.'\',\''.$sat.'\',\''.$sun.'\',\''.$mon.'\',\''.$tue.'\',\''.$wed.'\',\''.$thu.'\',\''.$fri.'\',\''.$sat.'\',\''.$sun.'\',\''.$mon.'\',\''.$tue.'\',\''.$wed.'\',\''.$thu.'\',\''.$fri.'\',\''.$sat.'\',\''.$sun.'\',\''.$mon.'\',\''.$tue.'\',\''.$wed.'\',\''.$thu.'\',\''.$fri.'\',\''.$sat.'\',\''.$sun.'\',\''.$mon.'\',\''.$tue.'\',\''.$wed.'\'];'.$gtdata;
	$js .= '$("#'.$pj.$ap.'gtcalendar'.$pn.'").click(function (event){event.preventDefault();if(sessionStorage.getItem("'.$pj.$ap.'gtform'.$pn.'"))sessionStorage.setItem("'.$pj.$ap.'gtnform'.$pn.'",sessionStorage.getItem("'.$pj.$ap.'gtform'.$pn.'"));var gthref = $("#'.$pj.$ap.'gthref'.$pn.'").val();';
	if($_POST[gtrefreshtitle])$js .= 'if(gthref=="'.htmlspecialchars($_POST[gtrefreshtitle]).'"){gthref = "'.$refresh.'";gthrefs= "'.$refreshs.'";}
	else ';$js .= 'if(gthref.indexOf("/")>0){var gthrf = gthref.split("/");var s = gthrf.length-1;var gthrfs = gthrf[s].replace(".","gt.");gthrefs = gthref.replace(gthrf[s],gthrfs);}else if(gthref){gthrefs = gthref.replace(".","gt.");}else{gthrefs = "";}
	if(gthref){gtdata("'.$pj.$ap.'","'.$pj.'","'.$pn.'",gthrefs,gthref,"","","'.htmlspecialchars($typ).'",d,mnh,day,yr,wdayn'.$guanyin.',\''.htmlspecialchars($_POST[saturday]).'\',\''.htmlspecialchars($_POST[sunday]).'\',"'.htmlspecialchars($_POST[html]).'","'.htmlspecialchars($_POST[gtstitle]).'","'.htmlspecialchars($_POST[bgarea]).'","'.htmlspecialchars($_POST[bgareas]).'",windowWidth);$("#'.$pj.$ap.'gtdataform'.$pn.'").popup(\'close\');};});';
	$js .= $ajaxStp.'gts(d,mnh,day,yr,'.$pj.$ap.','.$pj.','.$pn.',wdayn'.$guanyin.',\''.htmlspecialchars($_POST[saturday]).'\',\''.htmlspecialchars($_POST[sunday]).'\',"'.htmlspecialchars($_POST[html]).'","'.htmlspecialchars($_POST[gtstitle]).'","'.htmlspecialchars($_POST[bgarea]).'","'.htmlspecialchars($_POST[bgareas]).'","'.htmlspecialchars($typ).'",windowWidth);'
				.'/*webjs'.$pn.'*/'
				.'/*});*/';
				
				;}
				
				$jsweb=str_replace('/*});*/',$js,$jsweb);
				file_put_contents('../panel/'.$roww[pjnbr].'/web'.$ap.'.js',$jsweb);			
			;}	
			
//gtn(d,mnh,day,yr,'.$pj.$ap.','.$pn.',wdayn,\''.htmlspecialchars($_POST[saturday]).'\',\''.htmlspecialchars($_POST[sunday]).'\',"'.htmlspecialchars($_POST[html]).'","'.htmlspecialchars($_POST[gtstitle]).'","'.htmlspecialchars($_POST[bgarea]).'","'.htmlspecialchars($_POST[bgareas]).'","'.htmlspecialchars($_POST[typ]).'");		

	
	echo "<meta http-equiv='refresh' content='0;URL=gt.php?ap=".htmlspecialchars($roww[ap])."&pj=".htmlspecialchars($roww[pjnbr])."&pn=".htmlspecialchars($pn)."'>";
;}

?>
	
