<?php session_start();         
error_reporting(0); 

if($_GET[pj] and !preg_match('/^[0-9]*$/',$_GET[pj]))exit;
if($_GET[pj])$pj = $_GET[pj];
if($_GET[ap] and !preg_match('/^[0-9]*$/',$_GET[ap]))exit;
if($_GET[ap])$ap = $_GET[ap];
if($_GET[pn] and !preg_match('/^[0-9]*$/',$_GET[pn]))exit;
if($_GET[pn])$pn = $_GET[pn];
if($_GET[tm] and !preg_match('/^[0-9]*$/',$_GET[tm]))exit;
if($_GET[tm])$tm = $_GET[tm];
if($_GET[tg] and !preg_match('/^[0-9]*$/',$_GET[tg]))exit;
if($_GET[tg])$tg= $_GET[tg];

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
    <title><?php if($_SESSION[tn]==PRC){echo '嵌入相片浏览 - AppMoney712 移动应用设计系统';}else if($_SESSION[tn]==EN){echo 'Embedded picture navigation - AppMoney712 APP Creation System';}else{echo '嵌入相片瀏覽 - AppMoney712 移動應用設計系統';}?></title>
	<link href="../css/jquery.mobile-1.4.4.min.css" rel="stylesheet">
	<link href="../css/jquerymobile-1.4.4.min.css" rel="stylesheet">
	<link href="../jscss/ifrpi.css" rel="stylesheet"><link rel="stylesheet" href="../jscss/animate.min.css">
	<link href="../css/appsystem.css" rel="stylesheet"><link href="../css/icons/style.css" rel="stylesheet">
	<style type="text/css">
	</style>
	<script src="../js/jquery.js"></script>
	<script src="../js/jquery.mobile-1.4.4.min.js"></script>
	<script src="../js/jquery.nicescroll.min.js"></script>
	<script src="../js/ifrpics.js"></script>
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
    <h1><?php if($_SESSION[tn]==PRC){echo '嵌入相片浏览 - AppMoney712 移动应用设计系统';}else if($_SESSION[tn]==EN){echo 'Embedded picture navigation - AppMoney712 APP Creation System';}else{echo '嵌入相片瀏覽 - AppMoney712 移動應用設計系統';}?></h1>
	
	</div><!-- /header -->
	

	
	<div data-role="content">

	
	<?php if($ap){?>
	<a href="ifrpic.php?pj=<?php echo htmlspecialchars($roww[pjnbr]) ?>&ap=<?php echo htmlspecialchars($roww[ap])?>&pn=<?php echo htmlspecialchars($pn) ?>&tm=<?php echo htmlspecialchars($tm) ?>" data-ajax="false" class="ui-btn ui-btn ui-btn-inline ui-corner-all ui-btn-icon-left ui-icon-carat-l">&nbsp;</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="#view" data-rel="popup" data-transition="pop" class="ui-btn ui-btn-inline ui-corner-all ui-mini ui-btn-icon-left ui-icon-search"><?php if($_SESSION[tn]==PRC){echo '预览';}else if($_SESSION[tn]==EN){echo 'Preview';}else{echo '預覽';}?></a>
		
	<div data-role="popup" id="view"><a href="#" class="ui-btn ui-corner-all ui-icon-delete ui-btn-icon-notext ui-btn-right" data-rel="back"></a>

	<ul data-role="listview" data-corners="false" data-inset="true">
	<li><a href="view.php?pj=<?php echo htmlspecialchars($roww[pjnbr])?>&ap=<?php echo htmlspecialchars($roww[ap])?>&vw=ap" data-ajax="false" target="_blank" class="ui-btn ui-btn-inline ui-mini ui-btn-icon-left ui-icon-search"><?php if($_SESSION[tn]==PRC){echo '预览应用页内容形式';}else if($_SESSION[tn]==EN){echo 'Page content of APP style[Preview]';}else{echo '預覽應用頁內容形式';}?></a></li>
	<li><a href="view.php?pj=<?php echo htmlspecialchars($roww[pjnbr])?>&ap=<?php echo htmlspecialchars($roww[ap])?>&vw=ap&ts=1" data-ajax="false" target="_blank" class="ui-btn ui-btn-inline ui-mini ui-btn-icon-left ui-icon-search"><?php if($_SESSION[tn]==PRC){echo '预览应用页内容形式';}else if($_SESSION[tn]==EN){echo 'Page content of APP style[Preview]';}else{echo '預覽應用頁內容形式';}?><?php if($_SESSION[tn]==PRC){echo '[触控式] [使用webkit型浏览器]';}else if($_SESSION[tn]==EN){echo '[Touch screen] [using any webkit browser]';}else{echo '[觸控式] [使用webkit型瀏覽器]';}?></a></li>
	<li><a href="viewp.php?pj=<?php echo htmlspecialchars($roww[pjnbr])?>&ap=<?php echo htmlspecialchars($roww[ap])?>" data-ajax="false" target="_blank" class="ui-btn ui-btn-inline ui-mini ui-btn-icon-left ui-icon-search"><?php if($_SESSION[tn]==PRC){echo '预览popup形式';}else if($_SESSION[tn]==EN){echo 'content of popup style[Preview]';}else{echo '預覽popup形式';}?></a></li>
	<li><a href="viewp.php?pj=<?php echo htmlspecialchars($roww[pjnbr])?>&ap=<?php echo htmlspecialchars($roww[ap])?>&ts=1" data-ajax="false" target="_blank" class="ui-btn ui-btn-inline ui-mini ui-btn-icon-left ui-icon-search"><?php if($_SESSION[tn]==PRC){echo '预览popup形式';}else if($_SESSION[tn]==EN){echo 'content of popup style[Preview]';}else{echo '預覽popup形式';}?><?php if($_SESSION[tn]==PRC){echo '[触控式] [使用webkit型浏览器]';}else if($_SESSION[tn]==EN){echo '[Touch screen] [using any webkit browser]';}else{echo '[觸控式] [使用webkit型瀏覽器]';}?></a></li>
	<!--<li><a href="view.php?pj=<?php echo htmlspecialchars($roww[pjnbr])?>&ap=<?php echo htmlspecialchars($roww[ap])?>&vw=s" data-ajax="false" target="_blank" class="ui-btn ui-btn-inline ui-mini ui-btn-icon-left ui-icon-search"><?php if($_SESSION[tn]==PRC){echo '预览單頁形式';}else if($_SESSION[tn]==EN){echo 'single page style[Preview]';}else{echo '預覽單頁形式';}?></a></li>!-->
	</ul>
	</div>
	
		
	<a href="menudesign.php?pj=<?php echo htmlspecialchars($roww[pjnbr])?>&ap=<?php echo $ap?>&pn=<?php echo $pn?>&php=ifrpic&plt=1" data-ajax="false" class="ui-btn ui-btn ui-btn-inline ui-corner-all ui-mini ui-btn-icon-left ui-icon-bars"><?php if($_SESSION[tn]==PRC){echo '专案应用页列表';}else if($_SESSION[tn]==EN){echo 'Project Page List';}else{echo '專案應用頁列表';}?></a>
	<?php ;}?>
	
		<a href="#try" data-rel="popup" data-transition="pop" class="ui-btn ui-btn-f ui-btn-inline ui-corner-all ui-mini" style="color:BLACK"><span class="pigss-pencil" style="color:red"></span><?php if($_SESSION[tn]==PRC){echo '快速试用';}else if($_SESSION[tn]==EN){echo 'Quick try';}else{echo '快速試用';}?></a>
		<div data-role="popup" id="try" data-position-to="window" data-theme="f" class="ifrwidth"><a href="#" data-rel="back" class="popn ui-btn ui-btn-z ui-btn-icon-notext ui-icon-delete"></a><BR><BR>
		
		<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '相片浏览功能';}else if($_SESSION[tn]==EN){echo 'Picture navigation function';}else{echo '相片瀏覽功能';}?></b> &nbsp;<?php if($_SESSION[tn]==PRC){echo '在\'相片URL\'填写首张相片档名,在\'框架限高%\'填100,在\'相片阔度%\'填150,在\'开始位置%[左边计]\'及\'开始位置%[上边计]\'均填35,点选\'首张\',填上相片尺寸并提送。您能在Windows档案管理员将鼠标移到档案名上,有尺寸资料显示。再点撀\'再增加新数据\',重覆以上步骤键入另一相片资料,但不用选\'首张\'。';}else if($_SESSION[tn]==EN){echo 'You need to enter photo filename to Picture URL, enter 100 to Frame height %, enter 150 to Picture width %, enter 35 to X Starting position% and Y Starting position%, select the First picture, enter Picture size values and then click the SEND button. You can move your mouse cursor to the filename in Windows file manager to know the photo size. You can repeat the above steps to enter second photo information but you do not need to select the First picture checkbox.';}else{echo '填寫\'按鈕標題\',在\'型式\'選\'相片瀏覽\'及在\'位置%[左邊計]\'及\'位置%[上邊計]\'均填50並提送。在此頁列表上點撀此標題,點選次張相片並提送。';}?></p>	
		<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '试用';}else if($_SESSION[tn]==EN){echo 'Testing';}else{echo '試用';}?></b> &nbsp;
	<?php if($_SESSION[tn]==PRC){echo '您须点撀此页上的预览,再进行测试。再修改及选用不同设置再预览并试用。';}else if($_SESSION[tn]==EN){echo 'You need to click the above preview button to test your design. You can enter or select different parameters to test their functions and effects.';}else{echo '您須點撀此頁上的預覽,再進行測試。再修改及選用不同設置再預覽並試用。';}?></p>	
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '试用步骤';}else if($_SESSION[tn]==EN){echo 'Testing Steps';}else{echo '試用步驟';}?></b> &nbsp;
	<?php if($_SESSION[tn]==PRC){echo '在预览页,点撀相片上的标题按钮,显示到另一相片的效果。';}else if($_SESSION[tn]==EN){echo 'You need to click the above created button to preview the effect of going to next photo. You can enter or select different parameters to test their functions and effects.';}else{echo '在預覽頁,點撀相片上的標題按鈕,顯示到另一相片的效果。';}?></p>	
	<HR>		
	<p><?php if($_SESSION[tn]==PRC){echo '您或应在次张相片编写一个到首张相片的按钮。';}else if($_SESSION[tn]==EN){echo 'You are recommeded to add a button to second photo for getting back to first photo.';}else{echo '您或應在次張相片編寫一個到首張相片的按鈕。';}?></p>
	<HR>	
	<p><b style="color:black">popup<?php if($_SESSION[tn]==PRC){echo '功能';}else if($_SESSION[tn]==EN){echo ' function';}else{echo '功能';}?></b> &nbsp;<?php if($_SESSION[tn]==PRC){echo '用户点撀popup按钮能显示应用页丶网页丶相片或互联视频。您在此页点撀\'再增加新数据\',填写\'按钮标题\',在\'型式\'选\'popup\'及在\'位置%[左边计]\'及\'位置%[上边计]\'均填35并提送。在此页列表上点撀此标题,再在\'popup内容\'填相片档名称,档案须存於panel/'.$roww[pjnbr].'/images档夹内并提送。';}else if($_SESSION[tn]==EN){echo 'APP user clicks on the popup button to show APP page, web page, photo or Internet video. You need to click the Add new data and enter Button Title, select the popup in the Button type, enter 35 to X position% and Y position% and then click the SEND button. You can click the button title showed on the list of this page and enter a photo filename to the \'popup content\'. The filename is needed to place on the folder 於panel/'.$roww[pjnbr].'/images. You need to click the SEND button.';}else{echo '用戶點撀popup按鈕能顯示應用頁、網頁、相片或互聯視頻。您在此頁點撀\'再增加新數據\',填寫\'按鈕標題\',在\'型式\'選\'popup\'及在\'位置%[左邊計]\'及\'位置%[上邊計]\'均填35並提送。在此頁列表上點撀此標題,再在\'popup內容\'填相片檔名稱,檔案須存於panel/'.$roww[pjnbr].'/images檔夾內並提送。';}?></p>	
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '试用步骤';}else if($_SESSION[tn]==EN){echo 'Testing Steps';}else{echo '試用步驟';}?></b> &nbsp;
	<?php if($_SESSION[tn]==PRC){echo '在预览页,点撀相片上的标题按钮,显示popup。';}else if($_SESSION[tn]==EN){echo 'You need to click the above created button to preview the popup content. You can enter or select different parameters to test their functions and effects.';}else{echo '在預覽頁,點撀相片上的標題按鈕,顯示popup。';}?></p>		
	<HR>		
	<p><?php if($_SESSION[tn]==PRC){echo '若须在popup编写按钮,试用\'电邮/电话按钮\',用户点撀popup内的按钮能到另一相片丶显示另一popup[应用页丶网页丶相片或互联视频]等。';}else if($_SESSION[tn]==EN){echo 'You can edit buttons to the popup. APP user clicks on the button to show photo, popup[with APP page, web page, photo or Internet video].';}else{echo '若須在popup編寫按鈕,試用\'電郵/電話按鈕\',用戶點撀popup內的按鈕能到另一相片、顯示另一popup[應用頁、網頁、相片或互聯視頻]等。';}?></p>			
		</div>
	
	<FORM action="ifrpicbtn.php?pj=<?php echo htmlspecialchars($roww[pjnbr]) ?>&ap=<?php echo htmlspecialchars($roww[ap]) ?>&pn=<?php echo htmlspecialchars($pn) ?>&tm=<?php echo htmlspecialchars($tm) ?>&tg=<?php echo htmlspecialchars($tg) ?>" method="post" data-ajax="false">
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
				$ifrhtml  = str_replace('<div class="swiper-slide"><div id="'.$pj.$ap.'vnts'.$pn.'" class="vntsns">','',$ifrhtml);				
				$ifrhtml  = str_replace('<!--data-tabnbg'.$tabnbgdatn[0].'data-tabnbg!-->','',$ifrhtml);
				;}
				$ifrhtml  = str_replace('</div></div><!--vnts!-->','',$ifrhtml);
				$ifrhtml = str_replace('<!--addifr!--></div>','',$ifrhtml);
								
			$itemhtm = explode('<!--item',$ifrhtml);
			$itempntag = '<!--item'.$tm.'!-->';
				for($i=1;$i<sizeof($itemhtm);$i++){
					if(strpos('<!--item'.$itemhtm[$i],$itempntag)===false and !$itemifrhtml){$itemhtml .= '<!--item'.$itemhtm[$i];}
					else if(strpos('<!--item'.$itemhtm[$i],$itempntag)!==false){$itemifrhtml  = str_replace($itempntag,'','<!--item'.$itemhtm[$i]);}
					else{$itemhtmls .= '<!--item'.$itemhtm[$i];}
					
					$tmvlus = explode('!-->',$itemhtm[$i]);
					$tmvlu[$i] = $tmvlus[0];
					
					$imghtm = $itemhtm[$i];
					
					$nbrifr = explode('id="',$itemhtm[$i]);
					$nbrifrs = explode('"',$nbrifr[1]);
					$ifrimgnbr[$i] = $nbrifrs[0];
					
					
					$dataifr = explode('data-ifr="',$itemhtm[$i]);
					$dataifrs = explode('"',$dataifr[1]);
					$hgtvlu = explode('@',$dataifrs[0]);
					$ifrhgt[$i] = $hgtvlu[0];
					$ifrwdt[$i] = $hgtvlu[1];
					if($hgtvlu[2]){$ifrscrollposition[$i] = $hgtvlu[2];}
					if($hgtvlu[3]){$ifrscrollpositions[$i] = $hgtvlu[3];}
					$ifrsizewdt[$i] = $hgtvlu[4];
					$ifrsizehgt[$i] = $hgtvlu[5];
					
					
					$src = explode('data-img="',$itemhtm[$i]);
					$srcvlus = explode('"',$src[1]);	
					$srcvlu[$i] = $srcvlus[0];
					$srctmvlu[$tmvlus[0]] = $srcvlus[0];
				;}
				
				
			$itemifrhtmls =	explode('<!--ifritem',$itemifrhtml);
			if(sizeof($itemifrhtmls)==1)$tgvlu = 0;
				for($i=1;$i<sizeof($itemifrhtmls);$i++){
					$tbgnvlu = explode('<!--ifrdata',$itemifrhtmls[$i]);
					$tbgsvlu = explode('ifrdata!-->',$tbgnvlu[1]);
					$tbgvlu = explode('@#@',$tbgsvlu[0]);
					
					$titlevlu[$i]= $tbgvlu[0];
					$typvlu[$i]= $tbgvlu[1];
					$tclrvlu[$i]= $tbgvlu[2];
					$bgclrvlu[$i]= $tbgvlu[3];
					$positionvlu[$i]= $tbgvlu[4];
					$positionsvlu[$i]= $tbgvlu[5];
					$iconvlu[$i]= $tbgvlu[6];
					$imgvlu[$i]= $tbgvlu[7];
					$stylevlu[$i]= $tbgvlu[8];
					$tgvlus[$i] = $tbgvlu[9];
					$ticlvlu[$i] = $tbgvlu[10]; 
					$ticlrvlu[$i] = $tbgvlu[11]; 
					$tfclrvlu[$i] = $tbgvlu[12];
					$mpwebvlu[$i] = $tbgvlu[13];
					if($tgvlus[$i] > $tgvlu)$tgvlu=$tgvlus[$i];
													
				;}	
			
			$htjshtm = file_get_contents('../panel/'.$roww[pjnbr].'/web'.$ap.'.js');
			if($htjshtm){
				$htjshtml = explode('/*webjs'.$pn.'*/',$htjshtm);
				$ifrjs = $htjshtml[1];				
				$ifrpsbtn = explode('/*ifrps'.$tm.'btn'.$tgvlus[$tg].'*/',$ifrjs);
				if($ifrpsbtn[1])$ifrpsbtnjs = $ifrpsbtn[1];
				if($ifrpsbtnjs)$ifrpsbtnvlu = explode(',',$ifrpsbtnjs);
			}
			
			;}
	?>
	
	
	<div class="ui-grid-a"><div class="ui-block-a" style="width:65%">
	<?php if($_SESSION[tn]==PRC){echo '按钮标题';}else if($_SESSION[tn]==EN){echo 'Button Title';}else{echo '按鈕標題';}?>
	<input type="text" name="title" placeholder=""  value="<?php echo htmlspecialchars($titlevlu[$tg])?>" required>
	</div><div class="ui-block-b" style="width:35%">
<?php if($_SESSION[tn]==PRC){echo '按钮型式';}else if($_SESSION[tn]==EN){echo 'Button type';}else{echo '按鈕型式';}?>
<select name="typ" style=" width:100%" >
	<option value="title" <?php if($typvlu[$tg]=='title')echo 'selected=selected';?>><?php if($_SESSION[tn]==PRC){echo '标题';}else if($_SESSION[tn]==EN){echo 'Title';}else{echo '標題';}?></option>
	<option value="vw" <?php if($typvlu[$tg]=='vw')echo 'selected=selected';?>><?php if($_SESSION[tn]==PRC){echo '相片浏览';}else if($_SESSION[tn]==EN){echo 'Picture navigation';}else{echo '相片瀏覽';}?></option>
	<option value="popup" <?php if($typvlu[$tg]=='popup')echo 'selected=selected';?>>popup</option>
	<option value="mp"  <?php if($typvlu[$tg]=='mp')echo 'selected="selected"';?>><?php if($_SESSION[tn]==PRC){echo '电邮/电话按钮/popup';}else if($_SESSION[tn]==EN){echo 'Email/phone button/popup';}else{echo '電郵/電話按鈕/popup';}?>
	<!--<option value="web"  <?php if($typvlu[$tg]=='web')echo 'selected="selected"';?>><?php if($_SESSION[tn]==PRC){echo '应用页导航';}else if($_SESSION[tn]==EN){echo 'APP navigation';}else{echo '應用頁導航';}?>!--></option>	
</select>
</div></div>
<div class="ui-grid-d"><div class="ui-block-a">
<?php if($_SESSION[tn]==PRC){echo '字体颜色';}else if($_SESSION[tn]==EN){echo 'Text color';}else{echo '字體顏色';}?>
<input name="tclr" type="text" value="<?php echo htmlspecialchars($tclrvlu[$tg]);?>">
</div><div class="ui-block-b" style="width:30%">
<?php if($_SESSION[tn]==PRC){echo '文字区背景颜色';}else if($_SESSION[tn]==EN){echo 'Background color of Text area';}else{echo '文字區背景顏色';}?>
<input name="bgclr" type="text" value="<?php echo htmlspecialchars($bgclrvlu[$tg]);?>">
</div><div class="ui-block-c" style="width:15%">

<?php if($_SESSION[tn]==PRC){echo '位置%[左边计]';}else if($_SESSION[tn]==EN){echo 'X position%';}else{echo '位置%[左邊計]';}?>
<input name="position" type="text" value="<?php echo htmlspecialchars($positionvlu[$tg]);?>" required>
</div><div class="ui-block-d" style="width:15%">

<?php if($_SESSION[tn]==PRC){echo '位置%[上边计]';}else if($_SESSION[tn]==EN){echo 'Y position%';}else{echo '位置%[上邊計]';}?>
<input name="positions" type="number" value="<?php echo htmlspecialchars($positionsvlu[$tg]);?>" required>
</div>
<div class="ui-block-e">
<?php if($_SESSION[tn]==PRC){echo '按钮符号';}else if($_SESSION[tn]==EN){echo 'Icon type';}else{echo '按鈕符號';}?>
<select name="icon" style=" width:100%" >
	<option value=""><?php if($_SESSION[tn]==PRC){echo '选符';}else if($_SESSION[tn]==EN){echo 'Choose';}else{echo '選符';}?></option>
	<option value="ui-icon-calendar" <?php if($iconvlu[$tg]=='ui-icon-calendar')echo 'selected=selected';?>><?php if($_SESSION[tn]==PRC){echo '日历';}else if($_SESSION[tn]==EN){echo 'calendar';}else{echo '日曆';}?></option>
	<option value="ui-icon-info" <?php if($iconvlu[$tg]=='ui-icon-info')echo 'selected=selected';?>><?php if($_SESSION[tn]==PRC){echo '资讯';}else if($_SESSION[tn]==EN){echo 'info';}else{echo '資訊';}?></option>
	<option value="ui-icon-video" <?php if($iconvlu[$tg]=='ui-icon-video')echo 'selected=selected';?>><?php if($_SESSION[tn]==PRC){echo '视频';}else if($_SESSION[tn]==EN){echo 'video';}else{echo '視頻';}?></option>
	<option value="ui-icon-audio" <?php if($iconvlu[$tg]=='ui-icon-audio')echo 'selected=selected';?>><?php if($_SESSION[tn]==PRC){echo '音频';}else if($_SESSION[tn]==EN){echo 'audio';}else{echo '音頻';}?></option>
	<option value="ui-icon-camera" <?php if($iconvlu[$tg]=='ui-icon-camera')echo 'selected=selected';?>><?php if($_SESSION[tn]==PRC){echo '相机';}else if($_SESSION[tn]==EN){echo 'camera';}else{echo '相機';}?></option>
	<option value="ui-icon-shop" <?php if($iconvlu[$tg]=='ui-icon-shop')echo 'selected=selected';?>><?php if($_SESSION[tn]==PRC){echo '商店';}else if($_SESSION[tn]==EN){echo 'shop';}else{echo '商店';}?></option>
	<option value="ui-icon-heart" <?php if($iconvlu[$tg]=='ui-icon-heart')echo 'selected=selected';?>><?php if($_SESSION[tn]==PRC){echo '心';}else if($_SESSION[tn]==EN){echo 'heart';}else{echo '心';}?></option>
	<option value="ui-icon-home" <?php if($iconvlu[$tg]=='ui-icon-home')echo 'selected=selected';?>><?php if($_SESSION[tn]==PRC){echo '屋';}else if($_SESSION[tn]==EN){echo 'home';}else{echo '屋';}?></option>
	<option value="ui-icon-star" <?php if($iconvlu[$tg]=='ui-icon-star')echo 'selected=selected';?>><?php if($_SESSION[tn]==PRC){echo '星';}else if($_SESSION[tn]==EN){echo 'star';}else{echo '星';}?></option>
	<option value="ui-icon-user" <?php if($iconvlu[$tg]=='ui-icon-user')echo 'selected=selected';?>><?php if($_SESSION[tn]==PRC){echo '用戶';}else if($_SESSION[tn]==EN){echo 'user';}else{echo '用戶';}?></option>
	<option value="ui-icon-phone" <?php if($iconvlu[$tg]=='ui-icon-phone')echo 'selected=selected';?>><?php if($_SESSION[tn]==PRC){echo '电话';}else if($_SESSION[tn]==EN){echo 'phone';}else{echo '電話';}?></option>
	<option value="ui-icon-tag" <?php if($iconvlu[$tg]=='ui-icon-tag')echo 'selected=selected';?>><?php if($_SESSION[tn]==PRC){echo '标签';}else if($_SESSION[tn]==EN){echo 'tag';}else{echo '標簽';}?></option>
	<option value="ui-icon-search" <?php if($iconvlu[$tg]=='ui-icon-search')echo 'selected=selected';?>><?php if($_SESSION[tn]==PRC){echo '搜寻';}else if($_SESSION[tn]==EN){echo 'search';}else{echo '搜尋';}?></option>
	<option value="ui-icon-grid" <?php if($iconvlu[$tg]=='ui-icon-grid')echo 'selected=selected';?>><?php if($_SESSION[tn]==PRC){echo '格';}else if($_SESSION[tn]==EN){echo 'grid';}else{echo '格';}?></option>
	<option value="ui-icon-bar" <?php if($iconvlu[$tg]=='ui-icon-bar')echo 'selected=selected';?>><?php if($_SESSION[tn]==PRC){echo '菜单';}else if($_SESSION[tn]==EN){echo 'bar';}else{echo '菜單';}?></option>
	<option value="ui-icon-edit" <?php if($iconvlu[$tg]=='ui-icon-edit')echo 'selected=selected';?>><?php if($_SESSION[tn]==PRC){echo '编写';}else if($_SESSION[tn]==EN){echo 'edit';}else{echo '編寫';}?></option>
	<option value="ui-icon-mail" <?php if($iconvlu[$tg]=='ui-icon-mail')echo 'selected=selected';?>><?php if($_SESSION[tn]==PRC){echo '电邮';}else if($_SESSION[tn]==EN){echo 'mail';}else{echo '電郵';}?></option>
	<option value="ui-icon-comment" <?php if($iconvlu[$tg]=='ui-icon-comment')echo 'selected=selected';?>><?php if($_SESSION[tn]==PRC){echo '对话框';}else if($_SESSION[tn]==EN){echo 'comment';}else{echo '對話框';}?></option>
	<option value="ui-icon-navigation" <?php if($iconvlu[$tg]=='ui-icon-navigation')echo 'selected=selected';?>><?php if($_SESSION[tn]==PRC){echo '浏览';}else if($_SESSION[tn]==EN){echo 'navigation';}else{echo '瀏覽';}?></option>
	<option value="ui-icon-location" <?php if($iconvlu[$tg]=='ui-icon-location')echo 'selected=selected';?>><?php if($_SESSION[tn]==PRC){echo '地标';}else if($_SESSION[tn]==EN){echo 'location';}else{echo '地標';}?></option>
	<option value="ui-icon-alert" <?php if($iconvlu[$tg]=='ui-icon-alert')echo 'selected=selected';?>><?php if($_SESSION[tn]==PRC){echo '警告';}else if($_SESSION[tn]==EN){echo 'alert';}else{echo '警告';}?></option>
	<option value="ui-icon-clock" <?php if($iconvlu[$tg]=='ui-icon-clock')echo 'selected=selected';?>><?php if($_SESSION[tn]==PRC){echo '时间';}else if($_SESSION[tn]==EN){echo 'clock';}else{echo '時間';}?></option>
	<option value="ui-icon-forbidden" <?php if($iconvlu[$tg]=='ui-icon-forbidden')echo 'selected=selected';?>><?php if($_SESSION[tn]==PRC){echo '禁止';}else if($_SESSION[tn]==EN){echo 'forbidden';}else{echo '禁止';}?></option>
	<option value="ui-icon-plus" <?php if($iconvlu[$tg]=='ui-icon-plus')echo 'selected=selected';?>><?php if($_SESSION[tn]==PRC){echo '加号';}else if($_SESSION[tn]==EN){echo 'plus';}else{echo '加號';}?></option>
	<option value="ui-icon-minus" <?php if($iconvlu[$tg]=='ui-icon-minus')echo 'selected=selected';?>><?php if($_SESSION[tn]==PRC){echo '减号';}else if($_SESSION[tn]==EN){echo 'minus';}else{echo '減號';}?></option>
	<option value="ui-icon-check" <?php if($iconvlu[$tg]=='ui-icon-check')echo 'selected=selected';?>><?php if($_SESSION[tn]==PRC){echo '勾号';}else if($_SESSION[tn]==EN){echo 'check';}else{echo '勾號';}?></option>
	<option value="ui-icon-delete" <?php if($iconvlu[$tg]=='ui-icon-delete')echo 'selected=selected';?>><?php if($_SESSION[tn]==PRC){echo '刪除';}else if($_SESSION[tn]==EN){echo 'delete';}else{echo '刪除';}?></option>
	<option value="ui-icon-back" <?php if($iconvlu[$tg]=='ui-icon-back')echo 'selected=selected';?>><?php if($_SESSION[tn]==PRC){echo '後';}else if($_SESSION[tn]==EN){echo 'back';}else{echo '後';}?></option>

	<option value="ui-icon-arrow-d" <?php if($iconvlu[$tg]=='ui-icon-arrow-d')echo 'selected=selected';?>><?php if($_SESSION[tn]==PRC){echo '箭下';}else if($_SESSION[tn]==EN){echo 'arrow-d';}else{echo '箭下';}?></option>
	<option value="ui-icon-arrow-d-l" <?php if($iconvlu[$tg]=='ui-icon-arrow-d-l')echo 'selected=selected';?>><?php if($_SESSION[tn]==PRC){echo '箭左下';}else if($_SESSION[tn]==EN){echo 'arrow-d-l';}else{echo '箭左下';}?></option>
	<option value="ui-icon-arrow-d-r" <?php if($iconvlu[$tg]=='ui-icon-arrow-d-r')echo 'selected=selected';?>><?php if($_SESSION[tn]==PRC){echo '箭右下';}else if($_SESSION[tn]==EN){echo 'arrow-d-r';}else{echo '箭右下';}?></option>
	<option value="ui-icon-arrow-l" <?php if($iconvlu[$tg]=='ui-icon-arrow-l')echo 'selected=selected';?>><?php if($_SESSION[tn]==PRC){echo '箭左';}else if($_SESSION[tn]==EN){echo 'arrow-l';}else{echo '箭左';}?></option>
	<option value="ui-icon-arrow-r" <?php if($iconvlu[$tg]=='ui-icon-arrow-r')echo 'selected=selected';?>><?php if($_SESSION[tn]==PRC){echo '箭右';}else if($_SESSION[tn]==EN){echo 'arrow-r';}else{echo '箭右';}?></option>
	<option value="ui-icon-arrow-u" <?php if($iconvlu[$tg]=='ui-icon-arrow-u')echo 'selected=selected';?>><?php if($_SESSION[tn]==PRC){echo '箭上';}else if($_SESSION[tn]==EN){echo 'arrow-u';}else{echo '箭上';}?></option>
	<option value="ui-icon-arrow-u-l" <?php if($iconvlu[$tg]=='ui-icon-arrow-u-l')echo 'selected=selected';?>><?php if($_SESSION[tn]==PRC){echo '箭上左';}else if($_SESSION[tn]==EN){echo 'arrow-u-l';}else{echo '箭上左';}?></option>
	<option value="ui-icon-arrow-u-r" <?php if($iconvlu[$tg]=='ui-icon-arrow-u-r')echo 'selected=selected';?>><?php if($_SESSION[tn]==PRC){echo '箭上右';}else if($_SESSION[tn]==EN){echo 'arrow-u-r';}else{echo '箭上右';}?></option>
	
	<option value="ui-icon-carat-d" <?php if($iconvlu[$tg]=='ui-icon-carat-d')echo 'selected=selected';?>><?php if($_SESSION[tn]==PRC){echo '向下';}else if($_SESSION[tn]==EN){echo 'carat-d';}else{echo '向下';}?></option>
	<option value="ui-icon-carat-l" <?php if($iconvlu[$tg]=='ui-icon-carat-l')echo 'selected=selected';?>><?php if($_SESSION[tn]==PRC){echo '向左';}else if($_SESSION[tn]==EN){echo 'carat-l';}else{echo '向左';}?></option>
	<option value="ui-icon-carat-r" <?php if($iconvlu[$tg]=='ui-icon-carat-r')echo 'selected=selected';?>><?php if($_SESSION[tn]==PRC){echo '向右';}else if($_SESSION[tn]==EN){echo 'carat-r';}else{echo '向右';}?></option>
	<option value="ui-icon-carat-u" <?php if($iconvlu[$tg]=='ui-icon-carat-u')echo 'selected=selected';?>><?php if($_SESSION[tn]==PRC){echo '向上';}else if($_SESSION[tn]==EN){echo 'carat-u';}else{echo '向上';}?></option>
	<option value="ui-icon-forward" <?php if($iconvlu[$tg]=='ui-icon-forward')echo 'selected=selected';?>><?php if($_SESSION[tn]==PRC){echo '转向';}else if($_SESSION[tn]==EN){echo 'forward';}else{echo '轉向';}?></option>	
	<option value="ui-icon-football" <?php if($iconvlu[$tg]=='ui-icon-football')echo 'selected=selected';?>><?php if($_SESSION[tn]==PRC){echo '足球';}else if($_SESSION[tn]==EN){echo 'football';}else{echo '足球';}?></option>
	</select>
</div>
	</div>
<?php if($typvlu[$tg]=='mp' or $typvlu[$tg]=='web'){
if($typvlu[$tg]=='mp'){?>
	<a href="ifrpicmp.php?pj=<?php echo htmlspecialchars($roww[pjnbr])?>&ap=<?php echo htmlspecialchars($ap)?>&pn=<?php echo htmlspecialchars($pn)?>&tm=<?php echo htmlspecialchars($tm)?>&tg=<?php echo htmlspecialchars($tg)?>&typ=mp" data-ajax="false" class="ui-btn ui-btn ui-btn-inline ui-corner-all ui-mini ui-btn-icon-left ui-icon-edit"><?php if($_SESSION[tn]==PRC){echo '专案应用页列表';}else if($_SESSION[tn]==EN){echo 'Edit phone number/email';}else{echo '填寫電話/電郵';}?></a>
<?php ;}else if($typvlu[$tg]=='web'){?>
	<!--<a href="ifrpicmp.php?pj=<?php echo htmlspecialchars($roww[pjnbr])?>&ap=<?php echo htmlspecialchars($ap)?>&pn=<?php echo htmlspecialchars($pn)?>&tm=<?php echo htmlspecialchars($tm)?>&tg=<?php echo htmlspecialchars($tg)?>&typ=web" data-ajax="false" class="ui-btn ui-btn ui-btn-inline ui-corner-all ui-mini ui-btn-icon-left ui-icon-edit"><?php if($_SESSION[tn]==PRC){echo '填写应用页导航';}else if($_SESSION[tn]==EN){echo 'Edit APP navigation';}else{echo '填寫應用頁導航';}?></a>!-->
<?php 
;}?>
<input type="hidden" name="img" value="<?php echo htmlspecialchars($imgvlu[$tg]); ?>">
<?php ;} 
?>
<input type="hidden" name="mpweb" value="<?php echo htmlspecialchars($mpwebvlu[$tg]); ?>">
<?php 

if($typvlu[$tg]=='popup'){
if($_SESSION[tn]==PRC){echo 'popup內容';}else if($_SESSION[tn]==EN){echo 'popup content';}else{echo 'popup內容';}?>
<input type="text" name="img" value="<?php echo htmlspecialchars($imgvlu[$tg]); ?>">
<input type="hidden" name="mpweb" value="<?php echo htmlspecialchars($mpwebvlu[$tg]); ?>">
<?php ;} 
if($typvlu[$tg]=='vw'){
	$imgslt = explode('@',$imgvlu[$tg]);
	$imgslts = $imgslt[0];
	if($srctmvlu[$imgslts]){
	if(strpos($srctmvlu[$imgslts],'http')!==false){$imgnslt = $srctmvlu[$imgslts];$stylevlutoimg='<img style="width:85px;height:85px" src="'.$imgnslt.'"/>';}else{$imgnslt='../panel/'.$roww[pjnbr].'/'.$srctmvlu[$imgslts];$stylevlutoimg='<img style="width:85px;height:85px" src="'.$imgnslt.'"/>';}
	;}	
			
if($_SESSION[tn]==PRC){echo '选择当点撀作出浏览的相片';}else if($_SESSION[tn]==EN){echo 'Selecting picture for clicking to browse';}else{echo '選擇當點撀作出瀏覽的相片';}
echo '<br>';
if($typvlu[$tg]=='vw'){if($_SESSION[tn]==PRC){echo '巳选用的相片';}else if($_SESSION[tn]==EN){echo 'selected picture';}else{echo '巳選用的相片';};}
echo '<br><a href="#imgshw" style="text-decoration:none" data-rel="popup" data-transition="pop"><div id="imgshow">'.$stylevlutoimg.'</div></a><div id="imgshw" data-role="popup"  style="width:550px"><img id="imgshws" src="'.$imgnslt.'" style="width:100%"/></div>';
echo '<hr>';
echo '<input type="hidden" id="img" name="img" value="'.htmlspecialchars($imgslts).'@'.htmlspecialchars($imgslt[1]).'@'.htmlspecialchars($imgslt[2]).'@'.htmlspecialchars($imgslt[3]).'@'.htmlspecialchars($imgslt[4]).'@'.htmlspecialchars($imgslt[5]).'@'.htmlspecialchars($imgslt[6]).'">' ;
for($i=1;$i<sizeof($itemhtm);$i++){
if(strpos($srcvlu[$i],'http://')!==false or strpos($srcvlu[$i],'https://')!==false){$imgn=htmlspecialchars($srcvlu[$i]);}else{$imgn='../panel/'.$roww[pjnbr].'/'.htmlspecialchars($srcvlu[$i]);}
echo '<a href="#" style="padding:1px" class="img ui-btn ui-btn-b ui-btn-inline" data-img="'.htmlspecialchars($tmvlu[$i]).'@'.htmlspecialchars($ifrhgt[$i]).'@'.htmlspecialchars($ifrwdt[$i]).'@'.htmlspecialchars($ifrscrollposition[$i]).'@'.htmlspecialchars($ifrscrollpositions[$i]).'@'.htmlspecialchars($ifrsizewdt[$i]).'@'.htmlspecialchars($ifrsizehgt[$i]).'" data-imgs="'.htmlspecialchars($imgn).'"><img style="width:85px;height:85px" alt="'.htmlspecialchars($imgn).'" src="'.htmlspecialchars($imgn).'"/></a>';

;}

echo '<hr>' ;} 
if($typvlu[$tg]=='vw'){
echo '<div class="ui-grid-a"><div class="ui-block-a">' ;
if($_SESSION[tn]==PRC){echo '相片瀏覽特效';}else if($_SESSION[tn]==EN){echo 'picture navigation effect';}else{echo '相片瀏覽特效';} if($_SESSION[tn]==PRC){echo '<br>[注意您须在上列相片中点选,是点选当用户点撀相片浏览按钮时,特效转换到的相片]';}else if($_SESSION[tn]==EN){echo '[You need to select one of above listing pictures for the Picture navigation button. It is the picture showing after picture navigation animation taken]';}else{echo '<br>[注意您須在上列相片中點選,是點選當用戶點撀相片瀏覽按鈕時,特效轉換到的相片]';}?>
<select name="style" style="width:100%" >
	<option value="enlarge" <?php if($stylevlu[$tg]=='enlarge')echo 'selected=selected';?>><?php if($_SESSION[tn]==PRC){echo '向前';}else if($_SESSION[tn]==EN){echo 'scale up';}else{echo '向前';}?></option>
	<option value="toTop" <?php if($stylevlu[$tg]=='toTop')echo 'selected=selected';?>><?php if($_SESSION[tn]==PRC){echo '向上';}else if($_SESSION[tn]==EN){echo 'to Top';}else{echo '向上';}?></option>
	<option value="toLeft" <?php if($stylevlu[$tg]=='toLeft')echo 'selected=selected';?>><?php if($_SESSION[tn]==PRC){echo '向左';}else if($_SESSION[tn]==EN){echo 'to Left';}else{echo '向左';}?></option>
	<option value="toRight" <?php if($stylevlu[$tg]=='toRight')echo 'selected=selected';?>><?php if($_SESSION[tn]==PRC){echo '向右';}else if($_SESSION[tn]==EN){echo 'to Right';}else{echo '向右';}?></option>
	<option value="toBottom" <?php if($stylevlu[$tg]=='toBottom')echo 'selected=selected';?>><?php if($_SESSION[tn]==PRC){echo '向下';}else if($_SESSION[tn]==EN){echo 'to Bottom';}else{echo '向下';}?></option>
	
	<option value="enlarge2" <?php if($stylevlu[$tg]=='enlarge2')echo 'selected=selected';?>><?php if($_SESSION[tn]==PRC){echo '放大/向前 形式2';}else if($_SESSION[tn]==EN){echo 'scale up style2';}else{echo '放大/向前 形式2';}?></option>
	<option value="enlarge3" <?php if($stylevlu[$tg]=='enlarge3')echo 'selected=selected';?>><?php if($_SESSION[tn]==PRC){echo '放大/向前 形式3';}else if($_SESSION[tn]==EN){echo 'scale up style3';}else{echo '放大/向前 形式3';}?></option>
	<option value="sDown" <?php if($stylevlu[$tg]=='sDown')echo 'selected=selected';?>><?php if($_SESSION[tn]==PRC){echo '縮小';}else if($_SESSION[tn]==EN){echo 'scale down';}else{echo '縮小';}?></option>
	<option value="sDn" <?php if($stylevlu[$tg]=='sDn')echo 'selected=selected';?>><?php if($_SESSION[tn]==PRC){echo '縮小形式';}else if($_SESSION[tn]==EN){echo 'scale down style';}else{echo '縮小形式';}?></option>
	<option value="sDn2" <?php if($stylevlu[$tg]=='sDn2')echo 'selected=selected';?>><?php if($_SESSION[tn]==PRC){echo '縮小形式2';}else if($_SESSION[tn]==EN){echo 'scale down style2';}else{echo '縮小形式2';}?></option>
	</select>
<?php echo '</div><div class="ui-block-b">';
if($_SESSION[tn]==PRC){echo '相片瀏覽特效2';}else if($_SESSION[tn]==EN){echo 'picture navigation effect 2';}else{echo '相片瀏覽特效2';} if($_SESSION[tn]==PRC){echo '<br>[注意您须在上列相片中点选当点撀相片浏览按钮作出浏览的相片]';}else if($_SESSION[tn]==EN){echo '[You need to select one of above listing pictures for the Picture navigation button]';}else{echo '<br>[注意您須在上列相片中點選當點撀相片瀏覽按鈕作出瀏覽的相片]';}?>
<select name="style2" style="width:100%" >
	<option value=""><?php if($_SESSION[tn]==PRC){echo '選用';}else if($_SESSION[tn]==EN){echo 'Select';}else{echo '選用';}?></option>
	<option value="animated fadeIn" <?php if($stylevlu[$tg]=='animated fadeIn')echo 'selected=selected';?>>fadeIn</option> 
<option value="animated fadeInDown" <?php if($stylevlu[$tg]=='animated fadeInDown')echo 'selected=selected';?>><?php if($_SESSION[tn]==PRC){echo 'fadeInDown向下';}else if($_SESSION[tn]==EN){echo 'fadeInDown';}else{echo 'fadeInDown向下';}?></option> 
<option value="animated fadeInDownBig" <?php if($stylevlu[$tg]=='animated fadeInDownBig')echo 'selected=selected';?>><?php if($_SESSION[tn]==PRC){echo 'fadeInDownBig向下';}else if($_SESSION[tn]==EN){echo 'fadeInDownBig';}else{echo 'fadeInDownBig向下';}?></option> 
<option value="animated fadeInLeft" <?php if($stylevlu[$tg]=='animated fadeInLeft')echo 'selected=selected';?>><?php if($_SESSION[tn]==PRC){echo 'fadeInLeft向右';}else if($_SESSION[tn]==EN){echo 'fadeInLeft';}else{echo 'fadeInLeft向右';}?></option> 
<option value="animated fadeInLeftBig" <?php if($stylevlu[$tg]=='animated fadeInLeftBig')echo 'selected=selected';?>><?php if($_SESSION[tn]==PRC){echo 'fadeInLeftBig向右';}else if($_SESSION[tn]==EN){echo 'fadeInLeftBig';}else{echo 'fadeInLeftBig向右';}?></option> 
<option value="animated fadeInRight" <?php if($stylevlu[$tg]=='animated fadeInRight')echo 'selected=selected';?>><?php if($_SESSION[tn]==PRC){echo 'fadeInRight向左';}else if($_SESSION[tn]==EN){echo 'fadeInRight';}else{echo 'fadeInRight向左';}?></option> 
<option value="animated fadeInRightBig" <?php if($stylevlu[$tg]=='animated fadeInRightBig')echo 'selected=selected';?>><?php if($_SESSION[tn]==PRC){echo 'fadeInRightBig向左';}else if($_SESSION[tn]==EN){echo 'fadeInRightBig';}else{echo 'fadeInRightBig向左';}?></option> 
<option value="animated fadeInUp" <?php if($stylevlu[$tg]=='animated fadeInUp')echo 'selected=selected';?>><?php if($_SESSION[tn]==PRC){echo 'fadeInUp向上';}else if($_SESSION[tn]==EN){echo 'fadeInUp';}else{echo 'fadeInUp向上';}?></option> 
<option value="animated fadeInUpBig" <?php if($stylevlu[$tg]=='animated fadeInUpBig')echo 'selected=selected';?>><?php if($_SESSION[tn]==PRC){echo 'fadeInUpBig向上';}else if($_SESSION[tn]==EN){echo 'fadeInUpBig';}else{echo 'fadeInUpBig向上';}?></option> 
<option value="animated fadeOut" <?php if($stylevlu[$tg]=='animated fadeOut')echo 'selected=selected';?>>fadeOut</option> 
<option value="animated fadeOutDown" <?php if($stylevlu[$tg]=='animated fadeOutDown')echo 'selected=selected';?>>fadeOutDown</option> 
<option value="animated fadeOutDownBig" <?php if($stylevlu[$tg]=='animated fadeOutDownBig')echo 'selected=selected';?>>fadeOutDownBig</option> 
<option value="animated fadeOutLeft" <?php if($stylevlu[$tg]=='animated fadeOutLeft')echo 'selected=selected';?>>fadeOutLeft</option> 
<option value="animated fadeOutLeftBig" <?php if($stylevlu[$tg]=='animated fadeOutLeftBig')echo 'selected=selected';?>>fadeOutLeftBig</option> 
<option value="animated fadeOutRight" <?php if($stylevlu[$tg]=='animated fadeOutRight')echo 'selected=selected';?>>fadeOutRight</option> 
<option value="animated fadeOutRightBig" <?php if($stylevlu[$tg]=='animated fadeOutRightBig')echo 'selected=selected';?>>fadeOutRightBig</option> 
<option value="animated fadeOutUp" <?php if($stylevlu[$tg]=='animated fadeOutUp')echo 'selected=selected';?>>fadeOutUp</option> 
<option value="animated fadeOutUpBig" <?php if($stylevlu[$tg]=='animated fadeOutUpBig')echo 'selected=selected';?>>fadeOutUpBig</option> 
<option value="animated flipInX" <?php if($stylevlu[$tg]=='animated flipInX')echo 'selected=selected';?>>flipInX</option> 
<option value="animated flipInY" <?php if($stylevlu[$tg]=='animated flipInY')echo 'selected=selected';?>>flipInY</option> 
<option value="animated flipOutX" <?php if($stylevlu[$tg]=='animated flipOutX')echo 'selected=selected';?>>flipOutX</option> 
<option value="animated flipOutY" <?php if($stylevlu[$tg]=='animated flipOutY')echo 'selected=selected';?>>flipOutY</option> 
<option value="animated lightSpeedIn" <?php if($stylevlu[$tg]=='animated lightSpeedIn')echo 'selected=selected';?>>lightSpeedIn</option> 
<option value="animated lightSpeedOut" <?php if($stylevlu[$tg]=='animated lightSpeedOut')echo 'selected=selected';?>>lightSpeedOut</option> 
<option value="animated rotateIn" <?php if($stylevlu[$tg]=='animated rotateIn')echo 'selected=selected';?>>rotateIn</option> 
<option value="animated rotateInDownLeft" <?php if($stylevlu[$tg]=='animated rotateInDownLeft')echo 'selected=selected';?>><?php if($_SESSION[tn]==PRC){echo 'rotateInDownLeft向下';}else if($_SESSION[tn]==EN){echo 'rotateInDownLeft';}else{echo 'rotateInDownLeft向下';}?></option> 
<option value="animated rotateInDownRight" <?php if($stylevlu[$tg]=='animated rotateInDownRight')echo 'selected=selected';?>><?php if($_SESSION[tn]==PRC){echo 'rotateInDownRight向下';}else if($_SESSION[tn]==EN){echo 'rotateInDownRight';}else{echo 'rotateInDownRight向下';}?></option> 
<option value="animated rotateInUpLeft" <?php if($stylevlu[$tg]=='animated rotateInUpLeft')echo 'selected=selected';?>><?php if($_SESSION[tn]==PRC){echo 'rotateInUpLeft向上';}else if($_SESSION[tn]==EN){echo 'rotateInUpLeft';}else{echo 'rotateInUpLeft向上';}?></option> 
<option value="animated rotateInUpRight" <?php if($stylevlu[$tg]=='animated rotateInUpRight')echo 'selected=selected';?>><?php if($_SESSION[tn]==PRC){echo 'rotateInUpRight向上';}else if($_SESSION[tn]==EN){echo 'rotateInUpRight';}else{echo 'rotateInUpRight向上';}?></option> 
<option value="animated rotateOut" <?php if($stylevlu[$tg]=='animated rotateOut')echo 'selected=selected';?>>rotateOut</option>
<option value="animated rotateOutDownLeft" <?php if($stylevlu[$tg]=='animated rotateOutDownLeft')echo 'selected=selected';?>><?php if($_SESSION[tn]==PRC){echo 'rotateOutDownLeft向下';}else if($_SESSION[tn]==EN){echo 'rotateOutDownLeft';}else{echo 'rotateOutDownLeft向下';}?></option> 
<option value="animated rotateOutDownRight" <?php if($stylevlu[$tg]=='animated rotateOutDownRight')echo 'selected=selected';?>><?php if($_SESSION[tn]==PRC){echo 'rotateOutDownRight向下';}else if($_SESSION[tn]==EN){echo 'rotateOutDownRight';}else{echo 'rotateOutDownRight向下';}?></option> 
<option value="animated rotateOutUpLeft" <?php if($stylevlu[$tg]=='animated rotateOutUpLeft')echo 'selected=selected';?>><?php if($_SESSION[tn]==PRC){echo 'rotateOutUpLeft向上';}else if($_SESSION[tn]==EN){echo 'rotateOutUpLeft';}else{echo 'rotateOutUpLeft向上';}?></option> 
<option value="animated rotateOutUpRight" <?php if($stylevlu[$tg]=='animated rotateOutUpRight"')echo 'selected=selected';?>><?php if($_SESSION[tn]==PRC){echo 'rotateOutUpRight向上';}else if($_SESSION[tn]==EN){echo 'rotateOutUpRight';}else{echo 'rotateOutUpRight向上';}?></option> 
<option value="animated hinge" <?php if($stylevlu[$tg]=='animated hinge')echo 'selected=selected';?>>hinge</option> 
<option value="animated rollIn" <?php if($stylevlu[$tg]=='animated rollIn')echo 'selected=selected';?>>rollIn</option> 
<option value="animated rollOut" <?php if($stylevlu[$tg]=='animated rollOut')echo 'selected=selected';?>>rollOut</option> 
<option value="animated zoomIn" <?php if($stylevlu[$tg]=='animated zoomIn')echo 'selected=selected';?>>zoomIn</option> 
<option value="animated zoomInDown" <?php if($stylevlu[$tg]=='animated zoomInDown')echo 'selected=selected';?>>zoomInDown</option> 
<option value="animated zoomInLeft" <?php if($stylevlu[$tg]=='animated zoomInLeft')echo 'selected=selected';?>>zoomInLeft</option> 
<option value="animated zoomInRight" <?php if($stylevlu[$tg]=='animated zoomInRight')echo 'selected=selected';?>>zoomInRight</option> 
<option value="animated zoomInUp" <?php if($stylevlu[$tg]=='animated zoomInUp')echo 'selected=selected';?>><?php if($_SESSION[tn]==PRC){echo 'zoomInUp向上';}else if($_SESSION[tn]==EN){echo 'zoomInUp';}else{echo 'zoomInUp向上';}?></option> 
<option value="animated zoomOut" <?php if($stylevlu[$tg]=='animated zoomOut')echo 'selected=selected';?>>zoomOut</option> 
<option value="animated zoomOutDown" <?php if($stylevlu[$tg]=='animated zoomOutDown')echo 'selected=selected';?>>zoomOutDown</option> 
<option value="animated zoomOutLeft" <?php if($stylevlu[$tg]=='animated zoomOutLeft')echo 'selected=selected';?>><?php if($_SESSION[tn]==PRC){echo 'zoomOutLeft向左';}else if($_SESSION[tn]==EN){echo 'zoomOutLeft';}else{echo 'zoomOutLeft向左';}?></option> 
<option value="animated zoomOutRight" <?php if($stylevlu[$tg]=='animated zoomOutRight')echo 'selected=selected';?>><?php if($_SESSION[tn]==PRC){echo 'zoomOutRight向右';}else if($_SESSION[tn]==EN){echo 'zoomOutRight';}else{echo 'zoomOutRight向右';}?></option> 
<option value="animated zoomOutUp" <?php if($stylevlu[$tg]=='animated zoomOutUp')echo 'selected=selected';?>><?php if($_SESSION[tn]==PRC){echo 'zoomOutUp向上';}else if($_SESSION[tn]==EN){echo 'zoomOutUp';}else{echo 'zoomOutUp向上';}?></option> 
<option value="animated slideInDown" <?php if($stylevlu[$tg]=='animated slideInDown')echo 'selected=selected';?>><?php if($_SESSION[tn]==PRC){echo 'slideInDown向下';}else if($_SESSION[tn]==EN){echo 'slideInDown';}else{echo 'slideInDown向下';}?></option>
<option value="animated slideInLeft" <?php if($stylevlu[$tg]=='animated slideInLeft')echo 'selected=selected';?>><?php if($_SESSION[tn]==PRC){echo 'slideInLeft向右';}else if($_SESSION[tn]==EN){echo 'slideInLeft';}else{echo 'slideInLeft向右';}?></option> 
<option value="animated slideInRight" <?php if($stylevlu[$tg]=='animated slideInRight')echo 'selected=selected';?>><?php if($_SESSION[tn]==PRC){echo 'slideInRight向左';}else if($_SESSION[tn]==EN){echo 'slideInRight';}else{echo 'slideInRight向左';}?></option> 
<option value="animated slideInUp" <?php if($stylevlu[$tg]=='animated slideInUp')echo 'selected=selected';?>><?php if($_SESSION[tn]==PRC){echo 'slideInUp向上';}else if($_SESSION[tn]==EN){echo 'slideInUp';}else{echo 'slideInUp向上';}?></option> 
<option value="animated slideOutDown" <?php if($stylevlu[$tg]=='animated slideOutDown')echo 'selected=selected';?>>slideOutDown</option> 
<option value="animated slideOutLeft" <?php if($stylevlu[$tg]=='animated slideOutLeft')echo 'selected=selected';?>>slideOutLeft</option> 
<option value="animated slideOutRight" <?php if($stylevlu[$tg]=='animated slideOutRight')echo 'selected=selected';?>>slideOutRight</option> 
<option value="animated slideOutUp" <?php if($stylevlu[$tg]=='animated slideOutUp')echo 'selected=selected';?>>slideOutUp</option>
	
	</select>

<?php 
echo '</div></div>';
}  ?>
	<input type="hidden" name="nbr" value="<?php if($tgvlus[$tg]){echo htmlspecialchars($tgvlus[$tg]);}else{echo htmlspecialchars($tgvlu);} ?>">
	<input type="hidden" name="guanyin1" value="<?php if(!$_POST[guanyin1])$_SESSION[guanyin1]=rand();
	echo htmlspecialchars($_SESSION[guanyin1]); ?>">
	
	<div class="ui-grid-d"><div class="ui-block-a">
	<input type="submit" name="submit" id="webxlsbtn" class="ui-btn" value="<?php if($_SESSION[tn]==PRC){echo '送交';}else if($_SESSION[tn]==EN){echo 'SEND';}else{echo '送交';}?>"></div><div class="ui-block-b"><a href="#inf" data-rel="popup" data-transition="pop" class="ui-btn ui-btn-b ui-btn-inline ui-corner-all ui-mini"><?php if($_SESSION[tn]==PRC){echo '步骤';}else if($_SESSION[tn]==EN){echo 'Steps';}else{echo '步驟';}?></a><div data-role="popup" id="inf" style="min-width:300px;max-width:85%" data-position-to="window" data-theme="f"><a href="#" class="ui-btn ui-corner-all ui-icon-delete ui-btn-icon-notext ui-btn-right" data-rel="back"></a>

	<h4 style="color:black"><?php if($_SESSION[tn]==PRC){echo '填写资枓';}else if($_SESSION[tn]==EN){echo 'Fiil in information';}else{echo '填寫資枓';}?></h4>
	<p><?php if($_SESSION[tn]==PRC){echo '填写资枓,但一些资料在修改才能键入。';}else if($_SESSION[tn]==EN){echo 'You need to fill in necessary information. Some information are needed to enter in amendment stage.';}else{echo '填寫資枓,但一些資料在修改才能鍵入。';}?></p>
	<hr>
	<h4 style="color:black"><?php if($_SESSION[tn]==PRC){echo '修改资料';}else if($_SESSION[tn]==EN){echo 'Amend data';}else{echo '修改資料';}?></h4>
	<p><?php if($_SESSION[tn]==PRC){echo '点撀下面\'修改数据\'的相关按钮,您能修改或删除资料。对popup及相片浏览的按钮型式,\'popup内容\'及\'点撀浏览的相片\'必须键入及点选。';}else if($_SESSION[tn]==EN){echo 'You can click the related title of \'Amend data\' to amend or delete data. You need to enter popup content and select \'picture for clicking to browse\' for popup and picture navigation styles[animation effect of moving (show and hide) between pictures].';}else{echo '點撀下面\'修改數據\'的相關按鈕,您能修改或刪除資料。對popup及相片瀏覽的按鈕型式,\'popup內容\'及\'點撀瀏覽的相片\'必須鍵入及點選。';}?></p>
	<hr>
	<h4 style="color:black"><?php if($_SESSION[tn]==PRC){echo '添加按钮/标题';}else if($_SESSION[tn]==EN){echo 'Add button/title';}else{echo '添加按鈕/標題';}?></h4>
	<p><?php if($_SESSION[tn]==PRC){echo '点撀\'再添加数据\'增加相片资料并重覆以上步骤。';}else if($_SESSION[tn]==EN){echo 'You need to click \'Add new data\' to add more picture/title.';}else{echo '點撀\'再添加數據\'增加相片資料並重覆以上步驟。';}?></p>
	<hr>
	<h4 style="color:black"><?php if($_SESSION[tn]==PRC){echo '预览';}else if($_SESSION[tn]==EN){echo 'Preview';}else{echo '預覽';}?></h4>
	<p><?php if($_SESSION[tn]==PRC){echo '在此页下,按钮或标题显示在相关的相片。在页底,点撀\'您的设计\'预览此段内容的预览,但并不用作测试按钮及其位置。';}else if($_SESSION[tn]==EN){echo 'You can preview related button and title positions for the picture on this page. You can click the \'Your design\' to preview this part design. It is not for testing buttons\' function and their locations.';}else{echo '在此頁下,按鈕或標題顯示在相關的相片。在頁底,點撀\'您的設計\'預覽此段內容的預覽,但並不用作測試按鈕及其位置。';}?></p>
	</div></div><div class="ui-block-c">
	
	<a href="#infs" data-rel="popup" data-transition="pop" class="ui-btn ui-btn-b ui-btn-inline ui-corner-all ui-mini">? <?php if($_SESSION[tn]==PRC){echo '解释';}else if($_SESSION[tn]==EN){echo 'Explanation';}else{echo '解釋';}?></a>
	<div data-role="popup" id="infs" style="min-width:300px;max-width:85%;overflow-y:auto;overflow-x:hidden;" data-position-to="window" data-theme="f"><a href="#" class="popn ui-btn ui-btn-z ui-corner-all ui-icon-delete ui-btn-icon-notext" data-rel="back"></a>

	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '按钮标题';}else if($_SESSION[tn]==EN){echo 'Button title';}else{echo '按鈕標題';}?></b>
	<?php if($_SESSION[tn]==PRC){echo '若不要按钮标题,填notext。您能只用按钮符号或在修改时用图像字体。';}else if($_SESSION[tn]==EN){echo 'If you do not use the title, you can enter notext or icon font[in amendment stage] only.';}else{echo '若不要按鈕標題,填notext。您能只用按鈕符號或在修改時用圖像字體。';}?></p><hr>
<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '按钮型式';}else if($_SESSION[tn]==EN){echo 'Button type';}else{echo '按鈕型式';}?></b>
	
	<?php //if($_SESSION[tn]==PRC){echo '标题型式只有文字显示。popup型形是用户点撀按钮显示popup内容,内容是相片丶应用页特定互联视频或网页内容。相片浏览型式是用户点撀按钮到另一相片。电邮/电话按钮限适用的移动电话应用。应用页导航型式是用户点撀按钮到另一应用页。';}else if($_SESSION[tn]==EN){echo 'Title style is for showing words. Popup style is for showing a popup content by APP user clicking on popup button. The content can be words, picture, APP page, specific Internet video or web page. Picture navigation style is for going to next picture by APP user clicking on this styled button. Email/phone button style is for appropriate mobile device only. APP navigation style is for going to an APP page by APP user clicking on this styled button.';}else{echo '標題型式只有文字顯示。popup型形是用戶點撀按鈕顯示popup內容,內容是相片、應用頁特定互聯視頻或網頁內容。相片瀏覽型式是用戶點撀按鈕到另一相片。電郵/電話按鈕限適用的移動電話應用。應用頁導航型式是用戶點撀按鈕到另一應用頁。';}?>
	
	<?php if($_SESSION[tn]==PRC){echo '标题型式只有文字显示。popup型形是用户点撀按钮显示popup内容,内容是文字、相片丶应用页丶特定互联视频或音频或网页内容。相片浏览型式是用户点撀按钮到另一相片。电邮/电话按钮限适用的移动电话应用。';}else if($_SESSION[tn]==EN){echo 'Title style is for showing words. Popup style is for showing a popup content by APP user clicking on popup button. The content can be words, picture, APP page, specific Internet video or audio or web page. Picture navigation style is for going to next picture by APP user clicking on this styled button. Email/phone button style is for appropriate mobile device only.';}else{echo '標題型式只有文字顯示。popup型形是用戶點撀按鈕顯示popup內容,內容是文字、相片、應用頁、特定互聯視頻或音頻或網頁內容。相片瀏覽型式是用戶點撀按鈕到另一相片。電郵/電話按鈕限適用的移動電話應用。';}?>
	</p>
	
	<p><?php if($_SESSION[tn]==PRC){echo '网页填写时必须填上网页档案,e.g. http://www.?????.com/index.html, 不能只填域名,http://www.?????.com。若是应用页,填应用页档名,e.g. web1.html。';}else if($_SESSION[tn]==EN){echo 'You need to fill in file name of Internet web page. e.g. http://www.?????.com/index.html, You cannot only fill in url, http://www.?????.com. If you need to open an APP page, you need to enter its filename. e.g. web1.html';}else{echo '網頁填寫時必須填上網頁檔案,e.g. http://www.?????.com/index.html, 不能只填域名,http://www.?????.com。若是應用頁,填應用頁檔名,e.g. web1.html。';}?></p>
	
	<p><?php  if(!$roww[pjnbr])$roww[pjnbr] = '???';
	if($_SESSION[tn]==PRC){echo '若使用应用内相片,档案放置於panel/'.$roww[pjnbr].'/images档夹内,填相片档名,e.g. picture.png。您亦能在相片档名加[1],有不同形式显示,e.g. picture[1].png 。';}else if($_SESSION[tn]==EN){echo 'If you need to use picture stored inside APP, you need to place the file to folder panel/'.$roww[pjnbr].'/images. You need to enter picture filename. e.g. picture.png. If you name the picture with [1], the picture display style is different. e.g picture[1].png.';}else{echo '若使用應用內相片,檔案放置於panel/'.$roww[pjnbr].'/images檔夾內,填相片檔名,e.g. picture.png。您亦能在相片檔名加[1],有不同形式顯示,e.g. picture[1].png。';}?></p>
	
	
	<p><?php if($_SESSION[tn]==PRC){echo '电邮/电话按钮';}else if($_SESSION[tn]==EN){echo 'Email/phone button';}else{echo '電郵/電話按鈕';}?> - <?php if($_SESSION[tn]==PRC){echo '用户点撀按钮能使用设备相关功能或应用。您能点撀\'填写电话/电邮\'进行填写。此项是以POPUP形式显示。';}else if($_SESSION[tn]==EN){echo 'APP user clicks the related button to use related function or application of the device. You can click \'Edit phone number/email\' to enter information. The information edited by this function will be showed in a popup.';}else{echo '用戶點撀按鈕能使用設備相關功能或應用。您能點撀\'填寫電話/電郵\'進行填寫。此項是以POPUP形式顯示。';}?></p>
	<!--<p><?php if($_SESSION[tn]==PRC){echo '应用页导航';}else if($_SESSION[tn]==EN){echo 'APP navigation';}else{echo '應用頁導航';}?> - <?php if($_SESSION[tn]==PRC){echo '您能点撀\'填写应用页导航\'进行填写。您亦能使用此功能设定调用任何巳有的相片浏览按钮或混合设置电邮/电话按钮丶标题丶应用页导航及巳有的相片浏览按钮。此项在您的设计内是以POPUP形式显示。';}else if($_SESSION[tn]==EN){echo 'You can click \'Edit APP navigation\' to enter information. You can also use this function to create a popup with button list about existing picture naviagtion buttons or create a list of mail/phone, title, APP navigation and existing picture naviagtion buttons. The information edited by this function will be showed in a popup.';}else{echo '您能點撀\'填寫應用頁導航\'進行填寫。您亦能使用此功能設定調用任何巳有的相片瀏覽按鈕或混合設置電郵/電話按鈕、標題、應用頁導航及巳有的相片瀏覽按鈕。此項在您的設計內是以POPUP形式顯示。';}?></p>!-->

	<hr>
<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '字体颜色';}else if($_SESSION[tn]==EN){echo 'Font color';}else{echo '字體顏色';}?></b>
	
	<?php if($_SESSION[tn]==PRC){echo '您能填html颜色码,e.g.#123456。';}else if($_SESSION[tn]==EN){echo 'You can fill in html color code. e.g. #123456';}else{echo '您能填html顏色碼,e.g.#123456。';}?>
	</p>
	<hr>
<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '文字区背景颜色';}else if($_SESSION[tn]==EN){echo 'Backgroud color of textarea';}else{echo '文字區背景顏色';}?></b>
	<?php if($_SESSION[tn]==PRC){echo '您能填上rgb颜色码e.g. rgb(125,125,125), rgba颜色码e.g. rgba(125,125,125,0.5) 或 hex颜色码e.g. #123456。若整页是有背景图像,您应使用rgba。';}else if($_SESSION[tn]==EN){echo 'You can add rgb color code e.g. rgb(125,125,125), rgba color code e.g. rgba(125,125,125,0.5) or hex color code e.g. #123456. If you use background picture for the page, you may use rgba color code.';}else{echo '您能填上rgb顏色碼e.g. rgb(125,125,125), rgba顏色碼e.g. rgba(125,125,125,0.5) 或 hex顏色碼e.g. #123456。若整頁是有背景圖像,您應使用rgba。';}?></p>
	<hr>
<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '位置%[左边计]';}else if($_SESSION[tn]==EN){echo 'X position%';}else{echo '位置%[左邊計]';}?></b>
	<?php if($_SESSION[tn]==PRC){echo '按钮左边位置对相片的左边位置的相片阔度百份比。填整数。';}else if($_SESSION[tn]==EN){echo 'The percentage of width counting from button left edge to picture left edge. You need to fill in an integer value.';}else{echo '按鈕左邊位置對相片的左邊位置的相片闊度百份比。填整數。';}?></p>
	<hr>
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '位置%[上边计]';}else if($_SESSION[tn]==EN){echo 'Y position%';}else{echo '位置%[上邊計]';}?></b>
	<?php if($_SESSION[tn]==PRC){echo '按钮上边位置对相片的上边位置的相片高度百份比。填整数。';}else if($_SESSION[tn]==EN){echo 'The  percentage of height counting from button top edge to picture top edge. You need to fill in an integer value.';}else{echo '按鈕上邊位置對相片的上邊位置的相片高度百份比。填整數。';}?></p>
	<!--<hr>
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '重设位置';}else if($_SESSION[tn]==EN){echo 'Positioning';}else{echo '重設位置';}?></b>
	<?php if($_SESSION[tn]==PRC){echo '若设置以上位置数值,当用户双重点撀相片时能将画面重设至此位置。';}else if($_SESSION[tn]==EN){echo 'APP user can double click the picture showing position to reset the above values.';}else{echo '若設置以上位置數值,當用戶雙重點撀相片時能將畫面重設至此位置。';}?></p>!-->
	<hr>
<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '画面固定位置';}else if($_SESSION[tn]==EN){echo 'Fixed position';}else{echo '畫面固定位置';}?></b>
	<?php if($_SESSION[tn]==PRC){echo '您能指定按钮在显示相片的设备画面的固定位置[用户拖拽相片时按钮仍在相片框指定位置],在\'位置%[左边计]\'填上特定用字,限画面的左上[填Topleft]丶右上[填Topright]丶左下[填Bottomleft]及右下[填Bottomright]。在\'位置%[上边计]\'填上离角的x及y距离,填%值,只填整数,e.g. 5。';}else if($_SESSION[tn]==EN){echo 'You can add fixed position button to picture frame relating to device viewport[The button is fixed on same position of picture frame on device viewport when APP user swipe screen to view the picture]. You can fill in specific words to \'X position%\' field. e.g. top left portion of picture frame of device viewport[fill in Topleft], top right portion[fill in Topright], bottom left portion[fill in Bottomleft] and bottom right portion[fill in Bottomright]. You can fill in integer percentage value of x and y distance to the corners. e.g. 5.';}else{echo '您能指定按鈕在顯示相片的設備畫面的固定位置[用戶拖拽相片時按鈕仍在相片框指定位置],在\'位置%[左邊計]\'填上特定用字,限畫面的左上[填Topleft]、右上[填Topright]、左下[填Bottomleft]及右下[填Bottomright]。在\'位置%[上邊計]\'填上離角的x及y距離,填%值,只填整數,e.g. 5。';}?></p>
	<hr>
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '按钮符号';}else if($_SESSION[tn]==EN){echo 'Icon type';}else{echo '按鈕符號';}?></b>
	<?php if($_SESSION[tn]==PRC){echo '符号在标题文字的左边。若只用按钮符号,按钮形是不同。您亦能使用图像字体,字体在修改时才能键入。';}else if($_SESSION[tn]==EN){echo 'The icon is showed on left of button title. If you use the icon only, the button shape is different. You can also use icon font only and enter the icon font data in amendment situation.';}else{echo '符號在標題文字的左邊。若只用按鈕符號,按鈕形是不同。您亦能使用圖像字體,字體在修改時才能鍵入。';}?></p>
	<hr>
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo 'popup内容';}else if($_SESSION[tn]==EN){echo 'Popup content';}else{echo 'popup內容';}?></b>
	<?php if($_SESSION[tn]==PRC){echo '使用popup型式并进行修改数据时才能键入,若使用应用内的页,填档名,e.g. 1.html,若用应用的相片,填相片档名,e.g. 1.png,档案须放在panel/'.$roww[pjnbr].'/images/若使用互联网相片或网页,填url,e.g. https://..../1.html。';}else if($_SESSION[tn]==EN){echo 'You can enter the popup content when you use popup style. You can enter the data when data amendment. If you use APP page, you need to enter the page filename. e.g. 1.html. If you use APP picture, you need to enter its filename. e.g. picture.png. If you use the Internet page, you need to enter complete URL. e.g. https://..../1.html';}else{echo '使用popup型式並進行修改數據時才能鍵入,若使用應用內的頁,填檔名,e.g. 1.html,若用應用的相片,填相片檔名,e.g. 1.png,檔案須放在panel/'.$roww[pjnbr].'/images/若使用互聯網相片或網頁,填url,e.https://..../1.html。';}?></p>
	
	<p><?php if($_SESSION[tn]==PRC){echo '您亦能键入简单的文字或使用特定的互联网视频url。';}else if($_SESSION[tn]==EN){echo 'You can enter simple words or specific Internet video url.';}else{echo '您亦能鍵入簡單的文字或使用特定的互聯網視頻url。';}?></p>
	<p><?php if($_SESSION[tn]==PRC){echo '您亦能令用户开启浏览器浏览特定网页,e.g. pdf文件或地图。格式是[openbrowser]网页url,e.g. [openbrowser]http://???.?????.com/viewer?url=??????????word.pdf。此功能不能用电脑浏览器试用。';}else if($_SESSION[tn]==EN){echo 'You can open APP user device\'s specific browser to show specific Internet web page. e.g. pdf document or map. The format is [openbrowser]url of web page. e.g. [openbrowser]http://???.?????.com/viewer?url=??????????word.pdf. You cannot preview it on your computer browser.';}else{echo '您亦能令用戶開啟瀏覽器瀏覽特定網頁,e.g. pdf文件或地圖。格式是[openbrowser]網頁url,e.g. [openbrowser]http://???.?????.com/viewer?url=??????????word.pdf。此功能不能用電腦瀏覽器試用。';}?></p>

	<p><?php if($_SESSION[tn]==PRC){echo '您亦能令用户开启设备巳安装的WHATSAPP APP,格式是whatsapp://??????????,并显示特定内容,对於IOS APP,您亦能使用相关社交分享的URL scheme, 能令用户的相关应用开启并使用特定功能,到本司网站有指引。此功能不能用电脑浏览器试用。';}else if($_SESSION[tn]==EN){echo 'You can open APP user device\'s WhatsAPP APP to use its specific function. e.g.whatsapp://??????????. Please refer to our website. For IOS APP, you can use the URL scheme of many social sharing media to open APP user device\'s related social sharing APPs and use their functions. Please refer to our website.  You cannot try it on your computer browser.';}else{echo '您亦能令用戶開啟設備巳安裝的WHATSAPP APP,格式是whatsapp://??????????,並顯示特定內容,對於IOS APP,您亦能使用相關社交分享的URL scheme, 能令用戶的相關應用開啟並使用特定功能,到本司網站有指引。此功能不能用電腦瀏覽器試用。';}?></p>
	<hr>
	<p><?php if($_SESSION[tn]==PRC){echo '您亦能令用户开启合适应用浏览特定互联网或内联网文件,e.g. 用Acrobat Reader APP开启pdf文件。格式是[openapp]网页url,e.g. [openapp]http://???.?????.com/word.pdf。此功能不能用电脑浏览器试用。';}else if($_SESSION[tn]==EN){echo 'You can let APP users to open Internet/Intranet document by appropriate APP in their appropriate device. e.g. open pdf document by Acrobat Reader APP. The format is [openapp]document url. e.g. [openapp]http://???.?????.com/word.pdf.  You cannot preview it on your computer browser.';}else{echo '您亦能令用戶開啟合適應用瀏覽特定互聯網或內聯網文件,e.g. 用Acrobat Reader APP開啟pdf文件。格式是[openapp]網頁url,e.g. [openapp]http://???.?????.com/word.pdf。此功能不能用電腦瀏覽器試用。';}?></p>

	<hr>
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '点撀浏览的相片';}else if($_SESSION[tn]==EN){echo 'Picture for clicking to browse';}else{echo '點撀瀏覽的相片';}?></b>
	<?php if($_SESSION[tn]==PRC){echo '巳设定的相片显示成小图像,点选小图像作为浏览的相片。即用户点撀此浏览按钮,页面显示特效并到另一相片。';}else if($_SESSION[tn]==EN){echo 'The picture you prepared will be showed as small picture. You need to pick one to be next picture. It is the function about APP user clicking the picture navigation button to go to next picture.';}else{echo '巳設定的相片顯示成小圖像,點選小圖像作為瀏覽的相片。即用戶點撀此瀏覽按鈕,頁面顯示特效並到另一相片。';}?></p>
	<HR>
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '相片浏览特效';}else if($_SESSION[tn]==EN){echo 'Picture navigation effect';}else{echo '相片瀏覽特效';}?></b>
	<?php if($_SESSION[tn]==PRC){echo '是在用户点撀浏览按钮,显示另一相片之前的相片特效。若点选相片浏览特效2,以此值作准。若内容不多及未在此应用选用相片浏览特效2,应只选相片浏览特效,而不选相片浏览特效2。';}else if($_SESSION[tn]==EN){echo 'It is the animation effect between picture showing. If you select the Picture navigation effect 2 , the final value is this value. If this part design is not musch content and you do not select the Picture navigation effect in any part of your APP design, selecting Picture navigation effect only is recommended.';}else{echo '是在用戶點撀瀏覽按鈕,顯示另一相片之前的相片特效。若點選相片瀏覽特效2,以此值作準。若內容不多及未在此應用選用相片瀏覽特效2,應只選相片瀏覽特效,而不選相片瀏覽特效2。';}?></p>
	<HR>
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '图像字体';}else if($_SESSION[tn]==EN){echo 'Icon font';}else{echo '圖像字體';}?></b>
	<?php if($_SESSION[tn]==PRC){echo '在修改数据时,您能在按钮添加图像字体,参考本司网站。字体颜色用html颜色码,e.g.#123456,字体大小填整数或不填,e.g. 15。';}else if($_SESSION[tn]==EN){echo 'On data amendment stage, you can add icon font. Please refer to our website. You can use html color code of the icon font. e.g. #123456. You need to enter integer for the icon size if necessary. e.g.15.';}else{echo '在修改數據時,您能在按鈕加添加圖像字體,參考本司網站。字體顏色用html顏色碼,e.g.#123456,字體大小填整數或不填,e.g. 15。';}?></p>
	
	
	</div>
	</div>
	<div class="ui-block-d">
	<?php if($tg){?>
	<a href="ifrpicbtn.php?ap=<?php echo htmlspecialchars($roww[ap])?>&pj=<?php echo htmlspecialchars($roww[pjnbr])?>&pn=<?php echo htmlspecialchars($pn)?>&tm=<?php echo htmlspecialchars($tm)?>" class="ui-btn" data-ajax="false"><?php if($_SESSION[tn]==PRC){echo '再增加新数据';}else if($_SESSION[tn]==EN){echo 'Add new data';}else{echo '再增加新數據';}?></a><?php ;}//if($bn){?>
	</div>
	<div class="ui-block-e">
	<?php if($tg){?>
	<input name="dlt" id="dlt" type="checkbox" data-theme="e" ><label for="dlt"><?php if($_SESSION[tn]==PRC){echo '刪除';}else if($_SESSION[tn]==EN){echo 'Delete';}else{echo '刪除';}?></label>
	<?php ;}//if($tg){?></div>
	</div>

	
	<hr>
	<?php if($tg){?>
	<div class="ui-grid-b">
	<div class="ui-block-a"><?php if($_SESSION[tn]==PRC){echo '图像字体';}else if($_SESSION[tn]==EN){echo 'icon font';}else{echo '圖像字體';}?><input type="text" name="ticla" value="<?php echo htmlspecialchars($ticlvlu[$tg]); ?>"></div>
	<div class="ui-block-b"><?php if($_SESSION[tn]==PRC){echo '字体颜色';}else if($_SESSION[tn]==EN){echo 'icon font color';}else{echo '字體顏色';}?><input type="text" name="ticlr" value="<?php echo htmlspecialchars($ticlrvlu[$tg]); ?>"></div>
	<div class="ui-block-c"><?php if($_SESSION[tn]==PRC){echo '字体大小';}else if($_SESSION[tn]==EN){echo 'icon font size';}else{echo '字體大小';}?><input type="number" name="tfclr" value="<?php echo htmlspecialchars($tfclrvlu[$tg]); ?>"></div>
	</div>
	<hr>
	<?php ;}//if($tg){?>
	</FORM>
	<?php
	
if(sizeof($itemifrhtmls)>1){
echo '<div data-role="listview" data-inset="true"><li data-theme="b">';if($_SESSION[tn]==PRC){echo '修改数据';}else if($_SESSION[tn]==EN){echo 'Amend data';}else{echo '修改數據';}echo '</li>';}
for($i=1;$i<sizeof($itemifrhtmls);$i++){
echo '<li data-icon="'.str_replace('ui-icon-','',htmlspecialchars($iconvlu[$i])).'"><a href="ifrpicbtn.php?ap='.htmlspecialchars($roww[ap]).'&pj='.htmlspecialchars($roww[pjnbr]).'&pn='.htmlspecialchars($pn).'&tm='.htmlspecialchars($tm).'&tg='.htmlspecialchars($i).'" data-ajax="false"  style="color:'.htmlspecialchars($tclrvlu[$i]).';background-color:'.htmlspecialchars($bgvlu[$tgvlus]).';text-shadow:0  0  0 ;">';
echo  '['.$i.']&nbsp;&nbsp;&nbsp;';
echo  htmlspecialchars($titlevlu[$i]).'[x:'.htmlspecialchars($positionvlu[$i]).'%] '.' [y:'.htmlspecialchars($positionsvlu[$i]).'%] ';
if($typvlu[$i]=='vw'){
	if($_SESSION[tn]==PRC){echo '相片浏览';}else if($_SESSION[tn]==EN){echo 'Picture navigation';}else{echo '相片瀏覽';}
;}else if($typvlu[$i]=='title'){
	if($_SESSION[tn]==PRC){echo '标题';}else if($_SESSION[tn]==EN){echo 'Title';}else{echo '標題';}
;}else if($typvlu[$i]=='popup'){
	echo 'popup';
;}else if($typvlu[$i]=='mp'){
	if($_SESSION[tn]==PRC){echo '电邮/电话按钮/相片popup';}else if($_SESSION[tn]==EN){echo 'Email/phone button/photo popup';}else{echo '電郵/電話按鈕/相片popup';}
;}else if($typvlu[$i]=='web'){
	if($_SESSION[tn]==PRC){echo '应用页导航';}else if($_SESSION[tn]==EN){echo 'APP APP navigation';}else{echo '應用頁導航';}
;}

;}
echo '</a></li>';
if(sizeof($itemifrhtmls)>1)echo '</div>';

?>
	<?php 
	//if($itemifrhtml){
	//echo '<hr>';
	// if($_SESSION[tn]==PRC){echo '相片按鈕顯示';}else if($_SESSION[tn]==EN){echo 'Picture button position';}else{echo '相片按鈕顯示';} 

	//$itemifrhtmlshw = str_replace('display:none','',$itemifrhtml);
	//$itemifrhtmlshw = str_replace('important;position:relative;','important;',$itemifrhtmlshw);
	
	//$itemifrhtmlshw = str_replace('<!--addifr!--></div>','',$itemifrhtmlshw);
	//$itemifrhtmlshw = str_replace('images/','../panel/'.$roww[pjnbr].'/images/',$itemifrhtmlshw);
	// $img = explode('data-img="',$itemifrhtmlshw);
	// $imgs = explode('"',$img[1]);
	// echo str_replace('src=""','src="'.htmlspecialchars($imgs[0]).'"',$itemifrhtmlshw);
	//;}
	?>
	
	<hr>
	<?php 
	if($ifrhtml){
	echo '<hr><a href="ifrpvw.php?pj='.htmlspecialchars($roww[pjnbr]).'&ap='.htmlspecialchars($roww[ap]).'&pn='.htmlspecialchars($pn).'&tm='.htmlspecialchars($tm).'" target="_blank" data-ajax="false" class="ui-btn ui-btn-b ui-btn-inline ui-corner-all ui-mini">';
	if($_SESSION[tn]==PRC){echo '您的此段设计';}else if($_SESSION[tn]==EN){echo 'Your design of this part';}else{echo '您的此段設計';} 
	echo '</a>';
	;}
	?>
<hr>
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
var windowWidth = $(window).width();var windowHeight =  $(window).height(); 
var widw = windowWidth*0.95;var heigw = windowHeight*0.95;$(".ifrwidthp").css('max-width',widw).css('max-height',heigw);$(".ifrwidthp img").css('max-height',heigw);
$(".ifrwidthps").width(windowWidth).height(windowHeight).find("iframe").height(windowHeight);$(".ifrwidthp div.spinn").css('height',heigw);$(".ifrwidthp div.spinn").css('width',widw*0.85);
$(".ifrwidth").height(heigw*0.85);$(".panel").height(heigw*0.85);

$("#infs").height(heigw*0.85);


$(".img").on('click',function(){
$("#img").val($(this).attr('data-img'));
$("#imgshow").html('<img style="width:150px;height:150px" src="'+$(this).attr("data-imgs")+'"/>'+$(this).attr("data-imgs"));
$("#imgshws").attr('src',$(this).attr("data-imgs"));
});

$('#<?php echo $pj.$ap ?>ifr<?php echo $pn ?>p<?php echo $tm ?> div:first > img:first').attr('src',$('#<?php echo $pj.$ap ?>ifr<?php echo $pn ?>p<?php echo $tm ?>').attr('data-img'));
;$('#<?php echo $pj.$ap ?>ifr<?php echo $pn ?>p<?php echo $tm ?> div.ifrspinn').hide();
</script>
<?php 
$tdy=0;
$tdy=date('Y-m-d');
if($_POST['title'] and $pj and $_SESSION[guanyin1] and $_SESSION[guanyin1]==$_POST[guanyin1]){

if($_POST[style2])$_POST[style] = $_POST[style2];

	
	if($ap and !preg_match('/^[0-9]*$/', $ap))exit;
	if($pj and !preg_match('/^[0-9]*$/', $pj))exit;	
	if($tm and !preg_match('/^[0-9]*$/', $tm))exit;	
	if($tg and !preg_match('/^[0-9]*$/', $tg))exit;
	if($_POST[nbr] and !preg_match('/^[0-9]*$/', $_POST[nbr]))exit;	
	
	if($_POST[position]=='Topleft' or $_POST[position]=='Topright' or $_POST[position]=='Bottomleft' or $_POST[position]=='Bottomleft'){$_POST[position] = $_POST[position];}
	else if(!preg_match('/^[0-9.]*$/',$_POST[position])){$_POST[position] = '';}
	if(!$_POST[position])$_POST[position] = '';
	if(!$_POST[positions] or !preg_match('/^[0-9.]*$/',$_POST[positions]))$_POST[positions] = '';

	
	if($_POST[dlt] and $tg){
	
	$itemifrht = explode('<!--ifritem'.htmlspecialchars($_POST[nbr]).'!-->','<!--item'.$tm.'!-->'.$itemifrhtml);
	if(strpos($itemifrht[1],'<!--ifritem')!==false){
		$itemifrhts = explode('<!--ifritem',$itemifrht[1]);
		$popup = '<!--ifritem'.htmlspecialchars($_POST[nbr]).'!-->'.$itemifrhts[0];
		$popup = str_replace($popup,'','<!--item'.$tm.'!-->'.$itemifrhtml);
	}else{
		$popup = $itemifrht[0].'</div></div>';
	;}
	
	
	}else if($_POST['title'] and $tg){
	
	$popup .= '<!--ifritem'.htmlspecialchars($_POST[nbr]).'!--><!--ifrdata'.htmlspecialchars($_POST[title]).'@#@'.htmlspecialchars($_POST[typ]).'@#@'.htmlspecialchars($_POST[tclr]).'@#@'.htmlspecialchars($_POST[bgclr]).'@#@'.htmlspecialchars($_POST[position]).'@#@'.htmlspecialchars($_POST[positions]).'@#@'.htmlspecialchars($_POST[icon]).'@#@'.htmlspecialchars($_POST[img]).'@#@'.htmlspecialchars($_POST[style]).'@#@'.htmlspecialchars($_POST[nbr]).'@#@'.htmlspecialchars($_POST[ticla]).'@#@'.htmlspecialchars($_POST[ticlr]).'@#@'.htmlspecialchars($_POST[tfclr]).'@#@'.htmlspecialchars($_POST[mpweb]).'@#@ifrdata!--><div ';
	
	
	if($_POST[position]=='Topleft'){
		$position = htmlspecialchars($_POST[positions]);  $positiontop = $position; 
	}else if($_POST[position]=='Topright'){
		$position = htmlspecialchars($_POST[positions]);  $positiontop = 100-htmlspecialchars($_POST[positions]); 	
	}else if($_POST[position]=='Bottomleft'){
		$position = 100-htmlspecialchars($_POST[positions]);  $positiontop = 100-htmlspecialchars($_POST[positions]); 		
	}else if($_POST[position]=='Bottomright'){
		$position = 100-htmlspecialchars($_POST[positions]);  $positiontop = 100-htmlspecialchars($_POST[positions]); 		
	}
	
	if($_POST[typ]=='vw'){$ifrftnbtn = 'ifrftnbtn';}else{$ifrftnbtn ='';}
	if($_POST[bgclr]){$bgclrstyle = 'background-color:'.htmlspecialchars($_POST[bgclr]).';';if($_POST[typ]=='title'){$bgsclrstyle = $bgclrstyle;$bgclrstyle='';};}
	else{$bgclrstyle ='';$bgsclrstyle='';}
	
	
	if($position){
	$popup .= 'data-left="fix" data-top="'.$positiontop.'" style="'.$bgsclrstyle.'position:fixed;left:'.$position.'%;z-index:1;" class="'.$pj.$ap.'ifr'.$pn.'p'.$tm.' '.$ifrftnbtn.' '; 
	}else{	
	$popup .= 'data-left="'.(htmlspecialchars($_POST[position])).'" data-top="'.htmlspecialchars($_POST[positions]).'" style="'.$bgsclrstyle.'position:absolute;left:-5%;top:0%;z-index:1;"  class="'.$pj.$ap.'ifr'.$pn.'p'.$tm.' '.$ifrftnbtn;
	}
	
	if(strlen($_POST[bgclr])==1){$btntheme = 'ui-btn-'.htmlspecialchars($_POST[bgclr]);}else{$btntheme = 'ui-btn-z';}
	
	if($_POST[icon] and $_POST['title']=='notext'){
	$icon = ' ui-btn-icon-notext ui-corner-all'.htmlspecialchars($_POST[icon]);}
	else if($_POST[icon]){
	$icon = ' ui-btn-icon-left '.htmlspecialchars($_POST[icon]);}
	
	if($_POST[typ]=='title'){$popup .= ' ui-btn '.$btntheme.' '.$icon.'">';}
	else if($_POST[typ]=='popup' and !strpos(trim($_POST[img]),' ') and strpos($_POST[img],'.')>0){$icon= 'class="imgspop ui-btn '.$btntheme.$icon.'"';$popup .= '">';}
	else if($_POST[typ]=='vw'){
	$datavlu = explode('@',$_POST[img]);$ratio = round($datavlu[6]/$datavlu[5],2);
	$icon= 'class="ui-btn '.$btntheme.$icon.'"';$popup .= '" data-vlu="'.$pj.'&&&'.$pj.$ap.'&&&ifr'.$pn.'p'.$tm.'&&&'.htmlspecialchars($_POST[style]).'&&&ifr'.$pn.'p'.$datavlu[0].'&&&'.htmlspecialchars($datavlu[1]).'&&&'.htmlspecialchars($datavlu[2]).'&&&'.htmlspecialchars($datavlu[3]).'&&&'.htmlspecialchars($datavlu[4]).'&&&'.htmlspecialchars($ratio).'" id="'.$pj.$ap.'ifr'.$pn.'p'.$tm.'p'.htmlspecialchars($_POST[nbr]).'">';}
	else{$icon= 'class="ui-btn '.$btntheme.$icon.'"';$popup .= '">';}
	
	
	//data-vw="'.$tm.'p'.htmlspecialchars($tg).'"
	
	if($_POST[ticlr]){$ifrticlr = 'color:'.htmlspecialchars($_POST[ticlr]).';';}else{$ifrticlr = '';}
	if($_POST[tfclr]){$ifrtfclr = 'font-size:'.htmlspecialchars($_POST[tfclr]).'px;';}else{$ifrtfclr = '';}
	
	if($ifrticlr or $ifrtfclr){$ifrticlrstyle = ' style="'.$ifrticlr.$ifrtfclr.'"';}else{$ifrticlrstyle = '';}

	if($_POST[tclr]){$ifrtclr = ' style="color:'.htmlspecialchars($_POST[tclr]).';"';$ifrtclrs = 'color:'.htmlspecialchars($_POST[tclr]).';';}else{$ifrtclr = '';$ifrtclrs = '';}
	if($_POST[ticla]){$ifrticla = ' class="'.htmlspecialchars($_POST[ticla]).'" ';}else{$ifrticla = '';}


	
	if($_POST[typ]=='title'){$popup .= '<span'.$ifrticla.$ifrticlrstyle.'></span><span'.$ifrtclr.'>'.htmlspecialchars($_POST['title']).'</span>';}
	else if($_POST[typ]=='vw'){
		$popup .= '<a href="#" '.$icon.'  style="text-decoration:none;'.$bgclrstyle.$ifrtclrs.'"><span'.$ifrticla.$ifrticlrstyle.'></span>'.htmlspecialchars($_POST['title']).'</a>';}	
	else if($_POST[typ]=='popup' or $_POST[typ]=='mp' or $_POST[typ]=='web'){
		if($_POST[typ]=='mp' or $_POST[typ]=='web'){
		$imgpopup = '<div id="'.$pj.$ap.'ifr'.$pn.'p'.$tm.'p'.htmlspecialchars($_POST[nbr]).'" data-role="popup" data-theme="w" data-corners="false" style="padding:5px;height: 100%;width: 100%;top:0;left:-15px;overflow-x:hidden;overflow-y: auto;" class="ifrwidthps"><a href="#" data-rel="back" class="popn ui-btn ui-btn-z ui-btn-icon-notext ui-icon-delete"></a><ul data-role="listview" class="'.$pj.$ap.'ifrvwpop webkitm" style="width:85%"><BR><BR>';
		//overflow-y: auto;!important
		$mpvlu = explode('[*]',$_POST[mpweb]);
			for($i=1;$i< sizeof($mpvlu)-1;$i++){
				$mpwebvln = explode('[**]',$mpvlu[$i]);
				if($mpwebvln[1]=='popup'){$dataicon = ' imgspop ui-btn-icon-right ui-icon-popup';$mplnk = '#" data-pop="'.$pj.$ap.'" data-url="'.htmlspecialchars(trim($mpwebvln[6])).'" data-rpopup="1" data-popup="'.$pj.$ap.'ifr'.$pn.'p'.$tm.'p'.htmlspecialchars($_POST[nbr]);$dtn = '';$vw = '';$ifrftnbtns = '';}
				else if($mpwebvln[1]=='mp' and $mpwebvln[5]){$dataicon = ' ui-btn-icon-right ui-icon-mail';$mplnk = 'mailto:'.str_replace('&amp;','&',htmlspecialchars($mpwebvln[5]));$dtn = '';$vw = '';$ifrftnbtns = '';}
				else if($mpwebvln[1]=='vw' and $mpwebvln[6]){$dataicon = ' ui-btn-icon-right ui-icon-navigation';$ifrftnbtns = $pj.$ap.'ifrftnbtns ';$mplnk = '#'; $vw = ' '.htmlspecialchars($mpwebvln[6]);$dtn = ' data-pop="#'.$pj.$ap.'ifr'.$pn.'p'.$tm.'p'.htmlspecialchars($_POST[nbr]).'" data-imgn="#'.htmlspecialchars($mpwebvln[6]).'" data-img="#'.$pj.$ap.'ifr'.$pn.'p'.$tm.'"';}
				else if($mpwebvln[1]=='mp' and $mpwebvln[4]){$dataicon = ' ui-btn-icon-right ui-icon-phone';$mplnk = 'tel:'.htmlspecialchars($mpwebvln[4]);$dtn = '';$vw = '';$ifrftnbtns = '';}
				else if($mpwebvln[1]=='web' and $mpwebvln[6]){$dataicon = ' ui-btn-icon-right ui-icon-carat-r';$mplnk = htmlspecialchars($mpwebvln[6]); $dtn = '';$vw = '';$ifrftnbtns = '';}				
				else{$dataicon = '';$mplnk = '#';$dtn = '';$vw = '';$ifrftnbtns = '';} 
				
				if($mpwebvln[3]){$mpimgvlu = '<img src="images/'.htmlspecialchars($mpwebvln[3]).'"/>';}else{$mpimgvlu = '';}
				if($mpwebvln[1]=='title' and $mpwebvln[2]){
					$style = 'style="background-color:'.htmlspecialchars($mpwebvln[2]).';white-space:normal;"';
				}else if($mpwebvln[1]=='title' and !$mpwebvln[2]){$style = 'style="white-space:normal;"';}
				else if($mpwebvln[2]){$style = 'style="background-color:'.htmlspecialchars($mpwebvln[2]).'"';}
				else{$style = '';}
				
				$mpvluhtml .= '<li><a href="'.trim($mplnk).'" '.$style.$dtn.' class="'.$ifrftnbtns.'ui-btn ui-btn-x'.$dataicon.$vw.'">'.$mpimgvlu.$mpvluvs.htmlspecialchars($mpwebvln[0]).'</a></li>';
				
			;}
		$imgpopup .= $mpvluhtml.'</ul></div>';
		}
		
		if(strpos($_POST[img],'http://')!==false or strpos($_POST[img],'https://')!==false){$images = '';}else if(strpos($_POST[img],'.html')!==false){$images = '';}else{$images = 'images/';}
		if($_POST[ticla]){$ifrticla = ' class="'.htmlspecialchars($_POST[ticla]).'" ';}else{$ifrticla = '';}
	
			if($_POST[typ]=='popup'){
			$popup .= '<a href="#" data-url="'.$images.htmlspecialchars(trim($_POST[img])).'" data-pop="'.$pj.$ap.'" '.$icon.' style="text-decoration:none;'.$bgclrstyle.$ifrtclrs.'"><span'.$ifrticla.$ifrticlrstyle.'></span>'.htmlspecialchars($_POST['title']).'</a>';
			}else{
			$popup .= '<a href="#'.$pj.$ap.'ifr'.$pn.'p'.$tm.'p'.htmlspecialchars($_POST[nbr]).'" '.$spin.' data-rel="popup" '.$icon.' data-transition="pop"  style="text-decoration:none;'.$bgclrstyle.$ifrtclrs.'"><span'.$ifrticla.$ifrticlrstyle.'></span>'.htmlspecialchars($_POST['title']).'</a>';
			}
			
		}
	
	$popup .= '</div>'.$imgpopup;
	
	$itemifrht = explode('<!--ifritem'.htmlspecialchars($_POST[nbr]).'!-->','<!--item'.$tm.'!-->'.$itemifrhtml);
	if(strpos($itemifrht[1],'<!--ifritem')!==false){
		$itemifrhts = explode('<!--ifritem',$itemifrht[1]);
		$itemifrhtsn = explode('<!--ifritem'.htmlspecialchars($_POST[nbr]).'!-->'.$itemifrhts[0],'<!--ifritem'.htmlspecialchars($_POST[nbr]).'!-->'.$itemifrht[1]);
		$popup = $itemifrht[0].$popup.$itemifrhtsn[1];
	}else{
		$popup = $itemifrht[0].$popup.'</div></div>';
	;}

	
	}else if($_POST['title'] and !$tg){
	
	$popup = '<!--ifritem'.htmlspecialchars($_POST[nbr]+1).'!--><!--ifrdata'.htmlspecialchars($_POST[title]).'@#@'.htmlspecialchars($_POST[typ]).'@#@'.htmlspecialchars($_POST[tclr]).'@#@'.htmlspecialchars($_POST[bgclr]).'@#@'.htmlspecialchars($_POST[position]).'@#@'.htmlspecialchars($_POST[positions]).'@#@'.htmlspecialchars($_POST[icon]).'@#@@#@@#@'.htmlspecialchars($_POST[nbr]+1).'@#@'.htmlspecialchars($_POST[ticla]).'@#@'.htmlspecialchars($_POST[ticlr]).'@#@'.htmlspecialchars($_POST[tfclr]).'@#@mpweb'.$pj.$ap.'n'.$pn.'n'.$tm.'n'.$tg.'[*]@#@ifrdata!--><div ';  
	
	
	
	if($_POST[position]=='Topleft'){
		$position = htmlspecialchars($_POST[positions]);  $positiontop = $position; 
	}else if($_POST[position]=='Topright'){
		$position = htmlspecialchars($_POST[positions]);  $positiontop = 100-htmlspecialchars($_POST[positions]); 	
	}else if($_POST[position]=='Bottomleft'){
		$position = 100-htmlspecialchars($_POST[positions]);  $positiontop = 100-htmlspecialchars($_POST[positions]); 		
	}else if($_POST[position]=='Bottomright'){
		$position = 100-htmlspecialchars($_POST[positions]);  $positiontop = 100-htmlspecialchars($_POST[positions]); 		
	}
	
	if($position){
	$popup .= 'data-left="fix" data-top="'.$positiontop.'" style="position:fixed;left:'.$position.'%;z-index:1;" class="'.$pj.$ap.'ifr'.$pn.'p'.$tm;  
	}else{	
	$popup .= 'data-left="'.(htmlspecialchars($_POST[position])).'" data-top="'.htmlspecialchars($_POST[positions]).'" style="position:absolute;left:-5%;top:0%;z-index:1;" class="'.$pj.$ap.'ifr'.$pn.'p'.$tm;  
	}
	
	if(strlen($_POST[bgclr])==1){$btntheme = 'ui-btn-'.htmlspecialchars($_POST[bgclr]);}else{$btntheme = 'ui-btn-z';}
	
	if($_POST[icon] and $_POST['title']=='notext'){
	$icon = ' ui-btn-icon-notext ui-corner-all'.htmlspecialchars($_POST[icon]);}
	else if($_POST[icon]){
	$icon = ' ui-btn-icon-left '.htmlspecialchars($_POST[icon]);}
	
	if($_POST[typ]=='title'){$popup .= ' ui-btn '.$btntheme.' '.$icon.'">';}
	else if($_POST[typ]=='popup'){$icon= 'class="imgspop ui-btn '.$btntheme.$icon.'"';$popup .= '" id="'.$pj.$ap.'ifr'.$pn.'p'.$tm.'p'.htmlspecialchars($_POST[nbr]+1).'">';}
	else if($_POST[typ]=='vw'){$icon= 'class="ui-btn '.$btntheme.$icon.'"';$popup .= '">';}
	else{$icon= 'class="ui-btn '.$btntheme.$icon.'"';$popup .= '">';}
	
	

	if($_POST[tclr]){$ifrtclr = 'style="color:'.htmlspecialchars($_POST[tclr]).';"';$ifrtclrs = 'color:'.htmlspecialchars($_POST[tclr]).';';}else{$ifrtclr = '';$ifrtclrs = '';}

	
	if($_POST[typ]=='title'){$popup .= '<span '.$ifrtclr.'>'.htmlspecialchars($_POST['title']).'</span>';}
	else if($_POST[typ]=='vw'){ 
		$popup .= '<a href="#" '.$icon.' style="text-decoration:none;'.$ifrtclrs.'">'.htmlspecialchars($_POST['title']).'</a>';}
	else if($_POST[typ]=='popup'){$popup .= '<a href="#" '.$icon.' style="text-decoration:none;'.$ifrtclrs.'">'.htmlspecialchars($_POST['title']).'</a>';}
	else if($_POST[typ]=='mp'){$popup .= '<a href="#'.$pj.$ap.'ifr'.$pn.'p'.$tm.'p'.htmlspecialchars($_POST[nbr]+1).'" data-rel="popup" '.$icon.' data-transition="pop" style="text-decoration:none;'.$ifrtclrs.'">'.htmlspecialchars($_POST['title']).'</a><div data-role="popup" id="'.$pj.$ap.'ifr'.$pn.'p'.$tm.'p'.htmlspecialchars($_POST[nbr]+1).'"></div>';}
	
	$popup .= '</div>';
	
	
	$popup = str_replace('<!--btnitem!-->','<!--btnitem!-->'.$popup,'<!--item'.$tm.'!-->'.$itemifrhtml);
		
	;}
			
			if($_POST[typ]=='vw' and $_POST[img]){
			
			//$datavlu = explode('@',$_POST[img]);
			//$ratio = round($datavlu[6]/$datavlu[5],2);
	
			if($_POST[dlt] and $tg){
				//$hgtjs = str_replace('/*ifrps'.$tm.'btn'.htmlspecialchars($_POST[nbr]).'*/'.$ifrpsbtnjs.'/*ifrps'.$tm.'btn'.htmlspecialchars($_POST[nbr]).'*/','',$ifrjs);
			
			}else if($ifrpsbtnjs){
			//if(!$datavlu[1])$datavlu[1] ="''";if(!$datavlu[2])$datavlu[2] ="''";if(!$datavlu[3])$datavlu[3] ="''";if(!$datavlu[4])$datavlu[4] ="''";
			//$hgtjs = '/*ifrps'.$tm.'btn'.htmlspecialchars($_POST[nbr]).'*/';$hgtjs .= 'ifrftnbtn('.$pj.','.$pj.$ap.',"ifr'.$pn.'p'.$tm.'p'.htmlspecialchars($_POST[nbr]).'","ifr'.$pn.'p'.$tm.'","'.htmlspecialchars($_POST[style]).'","ifr'.$pn.'p'.$datavlu[0].'",'.htmlspecialchars($datavlu[1]).','.htmlspecialchars($datavlu[2]).','.htmlspecialchars($datavlu[3]).','.htmlspecialchars($datavlu[4]).','.htmlspecialchars($ratio).',1,windowHeight,windowWidth);/*ifrps'.$tm.'btn'.htmlspecialchars($_POST[nbr]).'*/';
							
				//$hgtjs = str_replace('/*ifrps'.$tm.'btn'.htmlspecialchars($_POST[nbr]).'*/'.$ifrpsbtnjs.'/*ifrps'.$tm.'btn'.htmlspecialchars($_POST[nbr]).'*/',$hgtjs,$ifrjs);
				
				//$popup = str_replace('data-vw="'.$tm.'p'.htmlspecialchars($_POST[nbr]).'"','data-vw="'.htmlspecialchars($_POST[style]).'@'.$datavlu[0].'"',$popup);				
			}else if(!$ifrpsbtnjs){		 
					//if(!$datavlu[1])$datavlu[1] ="''";if(!$datavlu[2])$datavlu[2] ="''";if(!$datavlu[3])$datavlu[3] ="''";if(!$datavlu[4])$datavlu[4] ="''";
				//$ifrpsbtnjs = '/*ifrsp*//*ifrps'.$tm.'btn'.htmlspecialchars($_POST[nbr]).'*/';$ifrpsbtnjs .= 'ifrftnbtn('.$pj.','.$pj.$ap.',"ifr'.$pn.'p'.$tm.'p'.htmlspecialchars($_POST[nbr]).'","ifr'.$pn.'p'.$tm.'","'.htmlspecialchars($_POST[style]).'","ifr'.$pn.'p'.$datavlu[0].'",'.htmlspecialchars($datavlu[1]).','.htmlspecialchars($datavlu[2]).','.htmlspecialchars($datavlu[3]).','.htmlspecialchars($datavlu[4]).','.htmlspecialchars($ratio).',1,windowHeight,windowWidth);/*ifrps'.$tm.'btn'.htmlspecialchars($_POST[nbr]).'*/';
				
				//$ifrtbg = explode('/*ifrp'.$tm.'*/',$ifrjs);
				//$ifrtbgs = explode('/*ifrsp*/',$ifrtbg[1]);
				
				//$hgtjs = str_replace('/*ifrp'.$tm.'*/'.$ifrtbgs[0].'/*ifrsp*/','/*ifrp'.$tm.'*/'.$ifrtbgs[0].$ifrpsbtnjs,$ifrjs);		
			;}
			;}//if($_POST[typ]=='vw' and $_POST[img]){


			
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
			
			//if($tl){$html = file_get_contents('../panel/'.$roww[pjnbr].'/'.$ap.'.html');$htmls = '';}		
			if($bvtns == 1){
					$vnts  = '<div class="swiper-slide"><div id="'.$pj.$ap.'vnts'.$pn.'" class="vntsns">';
				;}else if($bvtns == 5){
					$vntsn  = '</div></div><!--vnts!-->';
				;}else if($bvtns == 6){
					$vnts  = '';$vntsn  = '';
				;}else{
					$vnts  = '<div class="swiper-slide"><div id="'.$pj.$ap.'vnts'.$pn.'" class="vntsns">';$vntsn  = '</div></div><!--vnts!-->';
				;}
			if($tabnbgdatn[0]){$tabnbgdatns = '<!--data-tabnbg'.$tabnbgdatn[0].'data-tabnbg!-->';}else{$tabnbgdatns = '<!--data-tabnbgdata-tabnbg!-->';}	
	
			$webpopup .= $html.'<!--part'.$pn.'!-->'.$vnts.$itemhtm[0].$itemhtml.$popup.$itemhtmls.'<!--addifr!--></div>'.$vntsn.$tabnbgdatns.$htmls;
			$webpopup .= '</div><!--content!--></div><!--page!-->';
			
		 	
			
			$fpagtrns='../panel/'.$roww[pjnbr].'/'.$ap.'.html';
			file_put_contents($fpagtrns,$html.'<!--part'.$pn.'!-->'.$vnts.$itemhtm[0].$itemhtml.$popup.$itemhtmls.'<!--addifr!--></div>'.$vntsn.$tabnbgdatns.$htmls);

			$fpagtrns='../panel/'.$roww[pjnbr].'/web'.$ap.'.html';
			file_put_contents($fpagtrns,$webpopup);


	
			if(!file_exists('../panel/'.$roww[pjnbr].'/web'.$ap.'.js')){
			$fpagtrns='../panel/'.$roww[pjnbr].'/web'.$ap.'.js';
			$js = '/*$(document).on(\'pageshow\', \'#web'.$ap.'\', function(){*//*});*/';
			file_put_contents($fpagtrns,$js);			
			;}
			
			if($hgtjs){
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
	//if(!$tg)$tg = $_POST[nbr]+1;
	if(!$_POST[nbr] or (!$tg and $_POST[nbr]))$tg = 1;
	if($_POST[dlt])$tg = '';
	echo "<meta http-equiv='refresh' content='0;URL=ifrpicbtn.php?ap=".htmlspecialchars($roww[ap])."&pj=".htmlspecialchars($roww[pjnbr])."&pn=".htmlspecialchars($pn)."&tm=".htmlspecialchars($tm)."&tg=".htmlspecialchars($tg)."'>";
;}

?>
