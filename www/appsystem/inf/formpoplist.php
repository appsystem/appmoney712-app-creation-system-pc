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
if($_GET[tms] and !preg_match('/^[0-9]*$/',$_GET[tms]))exit;
if($_GET[tms])$tms = $_GET[tms];
if($_GET[tn] and !preg_match('/^[0-9]*$/',$_GET[tn]))exit;
if($_GET[tn])$tn = $_GET[tn];


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
    <title><?php  if($_SESSION[tn]==PRC){echo '选项列表 - AppMoney712 移动应用设计系统';}else if($_SESSION[tn]==EN){echo 'Option button - AppMoney712 APP Creation System';}else{echo '選項列表 - AppMoney712 移動應用設計系統';}?></title>
	<link href="../css/jquery.mobile-1.4.4.min.css" rel="stylesheet">
	<link href="../css/jquerymobile-1.4.4.min.css" rel="stylesheet">
	<link href="../css/appsystem.css" rel="stylesheet">
	<link href="../css/icons/style.css" rel="stylesheet">
	<style type="text/css">
			.ifrwidthps{overflow:hidden;}
			.popifr{position:absolute;top:0%;left:0%;index-z:2}.popn{position:absolute;top:0%;right:1em;index-z:2}
			.vws{font-size:1.2em;text-shadow:0  0  0  0}
			.ftrbg{position:absolute;bottom:0px;left:2px;right:4px;width:100%;padding-top:18px;padding-bottom:18px;}
		.ui-icon-qr:after{background-image: url("../css/images/qr.svg");}
		.ui-icon-qr:after{background-size: 18px 18px;} 			
	</style>
	<script src="../js/jquery.js"></script>
	<script src="../js/jquery.mobile-1.4.4.min.js"></script>
	<script src="../js/form.js"></script>
	<script src="../js/jquery.qrcode.min.js"></script> 
</head>
<body>
<div data-role="page" data-theme="f" class="page">
	<div style="overflow: hidden;" data-role="header" data-theme="f">
	<a href="#navigations"  id="menubttn"  data-rel="popup" data-transition="pop" class="ui-btn ui-btn ui-btn-inline ui-corner-all ui-btn-icon-left ui-icon-bars"><?php if($_SESSION[tn]==PRC){echo '目录';}else if($_SESSION[tn]==EN){echo 'Menu';}else{echo '目錄';}?></a>
    <h1><?php if($_SESSION[tn]==PRC){echo '选项[列表] - AppMoney712 移动应用设计系统';}else if($_SESSION[tn]==EN){echo 'Option button[listview] - AppMoney712 APP Creation System';}else{echo '選項[列表] - AppMoney712 移動應用設計系統';}?></h1>
	</div><!-- /header -->


	
<?php   if($pn and $tms){ 
			$ht = file_get_contents('../panel/'.$roww[pjnbr].'/'.$ap.'.html');
			
			
			$htm = explode('<!--part',$ht);
			$pntag = '<!--part'.$pn.'!-->';
				for($i=1;$i<sizeof($htm);$i++){
					if(strpos('<!--part'.$htm[$i],$pntag)===false and !$formshtml){$html .= '<!--part'.$htm[$i];}
					else if(strpos('<!--part'.$htm[$i],$pntag)!==false){$formshtml  = str_replace($pntag,'','<!--part'.$htm[$i]);}
					else{$htmls .= '<!--part'.$htm[$i];}
				;}
			
					
			$tbgs = explode('<!--item!-->',$formshtml);
			
			
						
			$tbgn = explode('<!--itemform!-->',$tbgs[$tms]);
			$tbg = explode('<!--itemforms!-->',$tbgn[1]);
			if($tbg[0]){
			$widthv = explode('style="width:',$tbg[0]);
			$widthvn = explode('%',$widthv[1]);
			
			$hgtvlu = explode('data-hgt="',$tbg[0]);
			if($hgtvlu[1]){
				$hgtvln = explode('"',$hgtvlu[1]);
				$hgtsvlu = $hgtvln[0];
			}else{$hgtsvlu = '';}
			
			$tbgbtn = explode('<!--itempopbtn!-->',$tbg[0]);
			$tbgnvlu = explode('<!--data',$tbgbtn[$tn]);
			$tbgsvlu = explode('data!-->',$tbgnvlu[1]);
			$tbgvlu = explode('@#@',$tbgsvlu[0]);

			$tnsvlu = sizeof($tbgbtn);

			$tmnvlu = $tbgvlu[0];
			$typvlu = $tbgvlu[1];
			$wspvlu = $tbgvlu[2];
			$titlevlu = $tbgvlu[3];
			$ftrvlu = $tbgvlu[4];
			$tclrvlu = $tbgvlu[5];
			$ftrclrvlu = $tbgvlu[6];
			$imgbgvlu = $tbgvlu[7];	
			$tbnvlu = $tbgvlu[8];	
			$borderbgvlu = $tbgvlu[9];
			
			
			
			;}
		;}
	?>		
	<div data-role="content">
	
	<?php if($ap){?>
	<a href="form.php?pj=<?php echo htmlspecialchars($roww[pjnbr]) ?>&ap=<?php echo htmlspecialchars($roww[ap])?>&tm=<?php echo htmlspecialchars($tms) ?>&tms=<?php echo htmlspecialchars($tm) ?>&pn=<?php echo htmlspecialchars($pn) ?>&tn=<?php echo htmlspecialchars($tn)?>" data-ajax="false" class="ui-btn ui-btn ui-btn-inline ui-corner-all ui-btn-icon-left ui-icon-carat-l">&nbsp;</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="#view" data-rel="popup" data-transition="pop" class="ui-btn ui-btn-inline ui-corner-all ui-mini ui-btn-icon-left ui-icon-search"><?php if($_SESSION[tn]==PRC){echo '预览';}else if($_SESSION[tn]==EN){echo 'Preview';}else{echo '預覽';}?></a>
		
	<div data-role="popup" id="view"><a href="#" class="ui-btn ui-corner-all ui-icon-delete ui-btn-icon-notext ui-btn-right" data-rel="back"></a>

	<ul data-role="listview" data-corners="false" data-inset="true">
	<li><a href="view.php?pj=<?php echo htmlspecialchars($roww[pjnbr])?>&ap=<?php echo htmlspecialchars($roww[ap])?>&vw=ap" data-ajax="false" target="_blank" class="ui-btn ui-btn-inline ui-mini ui-btn-icon-left ui-icon-search"><?php if($_SESSION[tn]==PRC){echo '预览应用页内容形式';}else if($_SESSION[tn]==EN){echo 'Page content of APP style[Preview]';}else{echo '預覽應用頁內容形式';}?></a></li>
	<li><a href="view.php?pj=<?php echo htmlspecialchars($roww[pjnbr])?>&ap=<?php echo htmlspecialchars($roww[ap])?>&vw=ap&ts=1" data-ajax="false" target="_blank" class="ui-btn ui-btn-inline ui-mini ui-btn-icon-left ui-icon-search"><?php if($_SESSION[tn]==PRC){echo '预览应用页内容形式';}else if($_SESSION[tn]==EN){echo 'Page content of APP style[Preview]';}else{echo '預覽應用頁內容形式';}?><?php if($_SESSION[tn]==PRC){echo '[触控式] [使用webkit型浏览器]';}else if($_SESSION[tn]==EN){echo '[Touch screen] [using any webkit browser]';}else{echo '[觸控式] [使用webkit型瀏覽器]';}?></a></li>
	<li><a href="viewp.php?pj=<?php echo htmlspecialchars($roww[pjnbr])?>&ap=<?php echo htmlspecialchars($roww[ap])?>" data-ajax="false" target="_blank" class="ui-btn ui-btn-inline ui-mini ui-btn-icon-left ui-icon-search"><?php if($_SESSION[tn]==PRC){echo '预览popup形式';}else if($_SESSION[tn]==EN){echo 'content of popup style[Preview]';}else{echo '預覽popup形式';}?></a></li>
	<li><a href="viewp.php?pj=<?php echo htmlspecialchars($roww[pjnbr])?>&ap=<?php echo htmlspecialchars($roww[ap])?>&ts=1" data-ajax="false" target="_blank" class="ui-btn ui-btn-inline ui-mini ui-btn-icon-left ui-icon-search"><?php if($_SESSION[tn]==PRC){echo '预览popup形式';}else if($_SESSION[tn]==EN){echo 'content of popup style[Preview]';}else{echo '預覽popup形式';}?><?php if($_SESSION[tn]==PRC){echo '[触控式] [使用webkit型浏览器]';}else if($_SESSION[tn]==EN){echo '[Touch screen] [using any webkit browser]';}else{echo '[觸控式] [使用webkit型瀏覽器]';}?></a></li>
	<!--<li><a href="view.php?pj=<?php echo htmlspecialchars($roww[pjnbr])?>&ap=<?php echo htmlspecialchars($roww[ap])?>&vw=s" data-ajax="false" target="_blank" class="ui-btn ui-btn-inline ui-mini ui-btn-icon-left ui-icon-search"><?php if($_SESSION[tn]==PRC){echo '预览單頁形式';}else if($_SESSION[tn]==EN){echo 'single page style[Preview]';}else{echo '預覽單頁形式';}?></a></li>!-->
	</ul>
	</div>
	
		
	<a href="menudesign.php?pj=<?php echo htmlspecialchars($roww[pjnbr])?>&plt=1" data-ajax="false" class="ui-btn ui-btn ui-btn-inline ui-corner-all ui-mini ui-btn-icon-left ui-icon-bars"><?php if($_SESSION[tn]==PRC){echo '专案应用页表格列表';}else if($_SESSION[tn]==EN){echo 'Project Page List';}else{echo '專案應用頁表格列表';}?></a>
	
	
	<?php ;}?>
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
	if($_SESSION[tn]==PRC){echo '表格列表按钮创建';}else if($_SESSION[tn]==EN){echo 'Button creating for Form listview option ';}else{echo '表格列表按鈕創建';}?>


	<FORM action="formpoplist.php?pj=<?php echo htmlspecialchars($roww[pjnbr]) ?>&ap=<?php echo htmlspecialchars($roww[ap]) ?>&tm=<?php echo htmlspecialchars($tm) ?>&tms=<?php echo htmlspecialchars($tms) ?>&pn=<?php echo htmlspecialchars($pn) ?>&tn=<?php echo htmlspecialchars($tn) ?>" id="webxls" method="post" data-ajax="false" >
	
	<div class="ui-grid-a"><div class="ui-block-a" style="width:30%"><label for='typ'><?php if($_SESSION[tn]==PRC){echo '隔项';}else if($_SESSION[tn]==EN){echo 'Divider';}else{echo '隔項';}?><input type="checkbox" name="typ" id="typ" value="1" <?php if($typvlu)echo 'checked="checked"'?>></label>
	
	</div><div class="ui-block-b" style="width:70%"><label for='wsp'><?php if($_SESSION[tn]==PRC){echo '文字显示';}else if($_SESSION[tn]==EN){echo 'All texts show';}else{echo '文字顯示';}?><input type="checkbox" name="wsp" id="wsp" value="1" <?php if($wspvlu)echo 'checked="checked"'?>></label></div></div>
	
	<div class="ui-grid-a"><div class="ui-block-a" style="width:30%"><?php if($_SESSION[tn]==PRC){echo '标题';}else if($_SESSION[tn]==EN){echo 'Title';}else{echo '標題';}?><input type="text" name="title" placeholder="" value="<?php echo htmlspecialchars($titlevlu)?>" required>
	</div><div class="ui-block-b" style="width:70%"><?php if($_SESSION[tn]==PRC){echo '內容';}else if($_SESSION[tn]==EN){echo 'Textarea';}else{echo '內容';}?><textarea name="imgftr"><?php echo htmlspecialchars($ftrvlu)?></textarea></div></div>
	<div class="ui-grid-a"><div class="ui-block-a"><?php if($_SESSION[tn]==PRC){echo '标题颜色';}else if($_SESSION[tn]==EN){echo 'Title text color';}else{echo '標題顏色';}?><input type="text" name="tclr" placeholder="" value="<?php echo htmlspecialchars($tclrvlu)?>"></div><div class="ui-block-b"><?php if($_SESSION[tn]==PRC){echo '內容颜色';}else if($_SESSION[tn]==EN){echo 'Textarea color';}else{echo '內容顏色';}?><input type="text" name="ftrclr" placeholder="" value="<?php echo htmlspecialchars($ftrclrvlu)?>"></div></div>
	<div class="ui-grid-d">
	<div class="ui-block-a"><?php if($_SESSION[tn]==PRC){echo '阔度';}else if($_SESSION[tn]==EN){echo 'Width';}else{echo '闊度';}?><input type="text" name="width" placeholder="" value="<?php echo htmlspecialchars($widthvn[0]);?>"></div>
	<?php if(!$typvlu){?>	
	<div class="ui-block-b"><?php if($_SESSION[tn]==PRC){echo '背景';}else if($_SESSION[tn]==EN){echo 'Background';}else{echo '背景';}?><input type="text" name="imgbg" placeholder="" value="<?php echo htmlspecialchars($imgbgvlu)?>"></div><div class="ui-block-c"><?php 	if($_SESSION[tn]==PRC){echo '边图像';}else if($_SESSION[tn]==EN){echo 'Thumbnails';}else{echo '邊圖像';}?><input type="text" name="imgtbn" placeholder="" value="<?php echo htmlspecialchars($tbnvlu)?>"></div><div class="ui-block-d"><?php if($_SESSION[tn]==PRC){echo '边色';}else if($_SESSION[tn]==EN){echo 'Border color';}else{echo '邊色';}?>
	<input type="text" name="borderbg" placeholder="" value="<?php echo htmlspecialchars($borderbgvlu)?>"></div><div class="ui-block-e"><?php if($_SESSION[tn]==PRC){echo '数据列表限高';}else if($_SESSION[tn]==EN){echo 'Height of data option list';}else{echo '數據列表限高';}?>
	<input type="text" name="hgt" placeholder="" value="<?php echo htmlspecialchars($hgtsvlu)?>"></div>
	<?php ;}?>
	</div>
	
	<input type="hidden" name="widthp" value="<?php echo htmlspecialchars($widthvn[0]); ?>">
	<input type="hidden" name="guanyin1" value="<?php if(!$_POST[guanyin1])$_SESSION[guanyin1]=rand();
	echo htmlspecialchars($_SESSION[guanyin1]); ?>">
	<div class="ui-grid-c"><div class="ui-block-a">

	<input type="submit" name="submit" id="webxlsbtn" Value="<?php if($_SESSION[tn]==PRC){echo '送交';}else if($_SESSION[tn]==EN){echo 'SEND';}else{echo '送交';}?>">
	</div><div class="ui-block-b">
	<a href="#nf" data-rel="popup" data-transition="pop" class="ui-btn ui-btn-b ui-btn-inline ui-corner-all ui-mini"><?php if($_SESSION[tn]==PRC){echo '步骤';}else if($_SESSION[tn]==EN){echo 'Steps';}else{echo '步驟';}?></a>
	<div data-role="popup" id="nf" style="min-width:300px;max-width:85%" data-position-to="window" data-theme="f" class="ifrwidthp"><a href="#" data-rel="back" class="popn ui-btn ui-btn-z ui-btn-icon-notext ui-icon-delete"></a><BR><BR>
	<h4 style="color:pink"><?php if($_SESSION[tn]==PRC){echo '填写列表選項按鈕资料';}else if($_SESSION[tn]==EN){echo 'Fill in popup listview button information';}else{echo '填寫列表選項按鈕資料';}?></h4>
	<p><?php if($_SESSION[tn]==PRC){echo '填写按钮数据,按钮标题显示在此页的列表上,再点撀相关标题能修改数据及再添加数据。';}else if($_SESSION[tn]==EN){echo 'You need to fill in button information. The button title will be showed on a list of this page. You can click the related title on the list to amend data and add further information.';}else{echo '填寫按鈕數據,按鈕標題顯示在此頁的列表上,再點撀相關標題能修改數據及再添加數據。';}?></p>	
	
	<p><?php if($_SESSION[tn]==PRC){echo '若选项超特定数量,增加搜寻功能。';}else if($_SESSION[tn]==EN){echo 'If the number of item exceeds specific quantity, the filter function is added to the data list automatically.';}else{echo '若選項超特定數量,增加搜尋功能。';}?></p>	
	
	<hr>
	<h4 style="color:pink"><?php if($_SESSION[tn]==PRC){echo '再增加新数据';}else if($_SESSION[tn]==EN){echo 'Add new data';}else{echo '再增加新數據';}?></h4>
	<p><?php if($_SESSION[tn]==PRC){echo '若添加新数据,点撀\'再增加新数据\'。';}else if($_SESSION[tn]==EN){echo 'If you need to add new data, you need to click \'Add new data\'.';}else{echo '若添加新數據,點撀\'再增加新數據\'。';}?></p>	
	<hr>
	<h4 style="color:pink"><?php if($_SESSION[tn]==PRC){echo '修改按钮资料列序';}else if($_SESSION[tn]==EN){echo 'Insert';}else{echo '修改按鈕資料列序';}?></h4>
	<p><?php if($_SESSION[tn]==PRC){echo '点撀列表上的相关项目,再点选\'插入\'的选项,项目将显示在被选插入项之上。';}else if($_SESSION[tn]==EN){echo 'You need to click the related title on the list and then select item on the \'Insert\'. The item will be above the selected item after the insertion.';}else{echo '點撀列表上的相關項目,再點選\'插入\'的選項,項目將顯示在被選插入項之上。';}?></p>	
	<hr>
	<h4 style="color:pink"><?php if($_SESSION[tn]==PRC){echo '刪除';}else if($_SESSION[tn]==EN){echo 'Delete';}else{echo '刪除';}?></h4>
	<p><?php if($_SESSION[tn]==PRC){echo '点撀列表上的相关项目,再点选\'删除\'。';}else if($_SESSION[tn]==EN){echo 'You need to click the related title on the list and then click \'detele\'.';}else{echo '點撀列表上的相關項目,再點選\'刪除\'。';}?></p>	
	</div>


</div><div class="ui-block-c">
<a href="#inf" data-rel="popup" data-transition="pop" class="ui-btn ui-btn-b ui-btn-inline ui-corner-all ui-mini">? <?php if($_SESSION[tn]==PRC){echo '解释';}else if($_SESSION[tn]==EN){echo 'Explanation';}else{echo '解釋';}?></a>
	<div data-role="popup" id="inf" style="min-width:300px;max-width:85%" data-position-to="window" data-theme="f"><a class="ui-btn ui-corner-all ui-shadow ui-btn-a ui-icon-delete ui-btn-icon-notext ui-btn-right" href="#" data-rel="back">Close</a>
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '隔项';}else if($_SESSION[tn]==EN){echo 'Divider';}else{echo '隔項';}?></b> - 
	<?php if($_SESSION[tn]==PRC){echo '隔项是隔开项目。';}else if($_SESSION[tn]==EN){echo 'Divider is as item separator for item grouping.';}else{echo '隔項是隔開項目。';}?></p>
	<hr>
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '文字显示';}else if($_SESSION[tn]==EN){echo 'All texts show';}else{echo '文字顯示';}?></b> - 
	<?php if($_SESSION[tn]==PRC){echo '您应将浏览器调至移动设备尺寸浏览您的设计。点选代表键入的文字不限高度全部显示。';}else if($_SESSION[tn]==EN){echo 'All text will be showed on the button. You need to resize your browser as mobile phone to view the difference.';}else{echo '您應將瀏覽器調至移動設備尺寸瀏覽您的設計。點選代表鍵入的文字不限高度全部顯示。';}?></p>
	<hr>
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '标题';}else if($_SESSION[tn]==EN){echo 'Title';}else{echo '標題';}?></b> - 
	<?php if($_SESSION[tn]==PRC){echo '是用户点撀覆制的内容,亦显示在按钮内容上。';}else if($_SESSION[tn]==EN){echo 'It is the value of data for APP user selecting to copy. It also shows on the popup button.';}else{echo '是用戶點撀覆制的內容,亦顯示在按鈕內容上。';}?></p>
	<hr>
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '內容';}else if($_SESSION[tn]==EN){echo 'Textarea';}else{echo '內容';}?></b> - 
	<?php if($_SESSION[tn]==PRC){echo '只显示在按钮上,内容不被覆制。';}else if($_SESSION[tn]==EN){echo 'It is information showing on the popup button and not for data copying.';}else{echo '只顯示在按鈕上,內容不被覆制。';}?></p>
	<hr>
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '标题颜色';}else if($_SESSION[tn]==EN){echo 'Title text color';}else{echo '標題顏色';}?></b> - 
	<?php if($_SESSION[tn]==PRC){echo '填写html颜色码e.g. #123456。';}else if($_SESSION[tn]==EN){echo 'You can enter html color code e.g. #123456.';}else{echo '填寫html顏色碼e.g. #123456。';}?></p>
	<hr>
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '內容颜色';}else if($_SESSION[tn]==EN){echo 'Textarea color';}else{echo '內容顏色';}?></b> - 
	<?php if($_SESSION[tn]==PRC){echo '填写html颜色码e.g. #123456。';}else if($_SESSION[tn]==EN){echo 'You can enter html color code e.g. #123456.';}else{echo '填寫html顏色碼e.g. #123456。';}?></p>
	<hr>
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '阔度';}else if($_SESSION[tn]==EN){echo 'Width';}else{echo '闊度';}?></b> - 
	<?php if($_SESSION[tn]==PRC){echo '阔度只用填一次,所有项目均用此值,填整数,是占用户设备屏阔的百分比。';}else if($_SESSION[tn]==EN){echo 'This value is the width of whole item list. You need to enter it once and enter an integer. This value is the percentage of width of APP user device.';}else{echo '闊度只用填一次,所有項目均用此值,填整數,是佔用戶設備屏闊的百分比。';}?></p>
	<hr>
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '背景';}else if($_SESSION[tn]==EN){echo 'Background';}else{echo '背景';}?></b> - 
	<?php if(!$roww[pjnbr])$roww[pjnbr]='?';
	if($_SESSION[tn]==PRC){echo '此按钮的背景,使用应用内的图像,档案须存於panel/'.$roww[pjnbr].'/images档夹内。若设置背景图像上下左右重覆显示,在档案名加[xy]。e.g. picture[xy].png';}else if($_SESSION[tn]==EN){echo 'It is about the background of this button. If you use the APP pictures, you need to prepare pictures and store them in  panel/'.$roww[pjnbr].'/images folder. If you add [xy] to the picture file name e.g. picture[xy].png, the picture will be repeated both vertically and horizontally in the item area.';}else{echo '此按鈕的背景,使用應用內的圖像,檔案須存於panel/'.$roww[pjnbr].'/images檔夾內。若設置背景圖像上下左右重覆顯示,在檔案名加[xy]。e.g. picture[xy].png';}?></p>
	<p><?php if($_SESSION[tn]==PRC){echo '您亦能在背景图像填上rgb颜色码e.g. rgb(125,125,125), rgba颜色码e.g. rgba(125,125,125,0.5) 或 hex颜色码e.g. #123456代替背景图像。';}else if($_SESSION[tn]==EN){echo 'You can add rgb color code e.g. rgb(125,125,125), rgba color code e.g. rgba(125,125,125,0.5) or hex color code e.g. #123456 instead of background picture.';}else{echo '您亦能在背景圖像填上rgb顏色碼e.g. rgb(125,125,125), rgba顏色碼e.g. rgba(125,125,125,0.5) 或 hex顏色碼e.g. #123456代替背景圖像。';}?></p>
	<hr>
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '边图像';}else if($_SESSION[tn]==EN){echo 'Thumbnails';}else{echo '邊圖像';}?></b> - 
	<?php if($_SESSION[tn]==PRC){echo 'popup选项按钮的左边的方形图像,使用应用内的图像,档案须存於panel/'.$roww[pjnbr].'/images档夹内。';}else if($_SESSION[tn]==EN){echo 'It is about the thumbnail of  popup button item. If you use the APP pictures, you need to prepare square pictures and store them in panel/'.$roww[pjnbr].'/images folder.';}else{echo 'popup選項按鈕的左邊的方形圖像,使用應用內的圖像,檔案須存於panel/'.$roww[pjnbr].'/images檔夾內。';}?></p>
	<hr>
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '边色';}else if($_SESSION[tn]==EN){echo 'Color of button border ';}else{echo '邊色';}?></b> -
	<?php if($_SESSION[tn]==PRC){echo '填上html颜色码,e.g. #123456。若不设置,填none。';}else if($_SESSION[tn]==EN){echo 'You can add html color code e.g. #123456. If you do not use the border for an item, enter none.';}else{echo '填上html顏色碼,e.g. #123456。若不設置,填none。';}?></p>
	<hr>
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '数据列表限高';}else if($_SESSION[tn]==EN){echo 'Height of data option list';}else{echo '數據列表限高';}?></b> -
	<?php if($_SESSION[tn]==PRC){echo '按钮数据列表占用户设备屏的高度百分比,填整数,e.g.50。';}else if($_SESSION[tn]==EN){echo 'It is the height percentage of button data list relating to screen height of APP user device. You need to fill in integer. e.g. 50.';}else{echo '按鈕數據列表佔用戶設備屏的高度百分比,填整數,e.g.50。';}?></p>
	
	</div>
</div><div class="ui-block-d"></div>
</div>
	<hr>
	<div class="ui-grid-d"><div class="ui-block-a"></div><div class="ui-block-b"></div><div class="ui-block-c"><?php if($tn){?><a href="formpoplist.php?ap=<?php echo htmlspecialchars($roww[ap])?>&pj=<?php echo htmlspecialchars($roww[pjnbr])?>&pn=<?php echo htmlspecialchars($pn)?>&tm=<?php echo htmlspecialchars($tm)?>&tms=<?php echo htmlspecialchars($tms)?>" class="ui-btn" data-ajax="false"><?php if($_SESSION[tn]==PRC){echo '再增加新数据';}else if($_SESSION[tn]==EN){echo 'Add new data';}else{echo '再增加新數據';}?></a><?php ;}?></div><div class="ui-block-d">
	<?php if(sizeof($tbgbtn)>=3 and $tn){?>
	<select name="ord" data-theme="b">
	<option value=" "><?php if($_SESSION[tn]==PRC){echo '插入';}else if($_SESSION[tn]==EN){echo 'Insert';}else{echo '插入';}?></option>
	<?php for($i=1;$i<sizeof($tbgbtn);$i++){
	if($i!=$tn and $i!=$tn+1){?><option value="<?php echo $i?>"><?php echo '['.$i.'] ';?></option>
	<?php ;};}?>
	</select><?php ;}?></div><div class="ui-block-e"><?php if($tn){?><input name="dlt" id="dlt" type="checkbox" data-theme="e" ><label for="dlt"><?php if($_SESSION[tn]==PRC){echo '刪除';}else if($_SESSION[tn]==EN){echo 'Delete';}else{echo '刪除';}?></label><?php ;}?></div></div>
	</FORM>
<hr>
<?php 
if(sizeof($tbgbtn)>1){
echo '<div data-corners="false" data-role="listview" data-inset="true">';}
for($i=1;$i<sizeof($tbgbtn);$i++){
		$vtbgnvlu = explode('<!--data',$tbgbtn[$i]);
		$vtbgvlu = explode('@#@',$vtbgnvlu[1]);
		if(!$tmnsvlu or $vtbgvlu[0]>$tmnsvlu)$tmnsvlu = $vtbgvlu[0];
echo '<li data-icon="edit"><a href="formpoplist.php?ap='.htmlspecialchars($roww[ap]).'&pj='.htmlspecialchars($roww[pjnbr]).'&pn='.htmlspecialchars($pn).'&tm='.htmlspecialchars($tm).'&tms='.htmlspecialchars($tms).'&tn='.$i.'" data-ajax="false">';
echo  '['.$i.']&nbsp;&nbsp;&nbsp;';
if($vtbgvlu[3])echo  '<span style="color:'.htmlspecialchars($vtbgvlu[5]).'">'.htmlspecialchars($vtbgvlu[3]).'</span>';

echo '</a></li>';
;}
if(sizeof($tbgbtn)>1)echo '</div>';
?>
	<hr>
	
<?php
if($tbgs[$tms]){
if($_SESSION[tn]==PRC){echo '您的设计';}else if($_SESSION[tn]==EN){echo 'Your design';}else{echo '您的設計';}
if($sbgvlu[0]){
if($sbgvlu[0]){$sbgvlu[0]=str_replace('/','',$sbgvlu[0]);
			$sbgvlu[0]=str_replace('\\','',$sbgvlu[0]);
			$sbgvlu[0]=str_replace('..','',$sbgvlu[0]);}
			
			if(strpos($sbgvlu[0],'http://')!==false or strpos($sbgvlu[0],'https://')!==false){$images = '';}else{$images = 'images/';}
			
			$bghtml='';
			if(strpos($sbgvlu[0],'#')!==false or strpos($sbgvlu[0],'rgba(')!==false  or strpos($sbgvlu[0],'rgb(')!==false){
			$bghtml = 'background-color:'.htmlspecialchars($sbgvlu[0]).';';}
			else if(strpos($sbgvlu[0],'[xy]')!==false){$bghtml = 'background-image:url('.$images.htmlspecialchars($sbgvlu[0]).');';}
			else if($sbgvlu[0]){$bghtml = 'background-image:url('.$images.htmlspecialchars($sbgvlu[0]).');background-size:100%;background-repeat:repeat-y;';}
echo '<div style="'.$bghtml.'">';}
	$tbgtms = explode('<!--addforms!-->',$tbgs[$tms]);
	echo str_replace('"images/','"../panel/'.$roww[pjnbr].'/images/',$tbgtms[0]);
if($sbgvlu[0])echo '</div>'; 

		
if(file_exists('../panel/'.$roww[pjnbr].'/web'.$ap.'.js')){
	$jswebn = file_get_contents('../panel/'.$roww[pjnbr].'/web'.$ap.'.js');
	$jswebn=explode('/*webjs'.$pn.'*/',$jswebn);
	echo '<script>'.$jswebn[1].'</script>';
;}

}

?>
<hr>	


<?php if($_SESSION[tn]==PRC){echo '例';}else if($_SESSION[tn]==EN){echo 'Examples';}else{echo '例';}?><BR>
<ul data-corners="false" data-filter="true" data-role="listview" data-inset="true" style="width:80%">
    <li data-role="list-divider" style="white-space:normal;" data-theme="x"><h2><?php if($_SESSION[tn]==PRC){echo '隔项';}else if($_SESSION[tn]==EN){echo 'Divider';}else{echo '隔項';}?></h2></li>
    <li data-icon="edit" style="white-space:normal;" class="single" data-vlu="<?php if($_SESSION[tn]==PRC){echo '标题';}else if($_SESSION[tn]==EN){echo 'Option';}else{echo '標題';}?>">
	<a href="#" class="ui-btn ui-btn-f"><h2><?php if($_SESSION[tn]==PRC){echo '标题';}else if($_SESSION[tn]==EN){echo 'Option';}else{echo '標題';}?></h2></a></li>
    <li data-icon="edit" style="white-space:normal;" class="single" data-vlu="<?php if($_SESSION[tn]==PRC){echo '标题 1';}else if($_SESSION[tn]==EN){echo 'Option 1';}else{echo '標題 1';}?>">
	<a href="#" class="ui-btn ui-btn-f"><h2><?php if($_SESSION[tn]==PRC){echo '标题 1';}else if($_SESSION[tn]==EN){echo 'Option 1';}else{echo '標題 1';}?></h2></a></li>
    <li data-role="list-divider" style="white-space:normal;" data-theme="x">
	<h2><?php if($_SESSION[tn]==PRC){echo '隔项 2';}else if($_SESSION[tn]==EN){echo 'Divider 2';}else{echo '隔項 2';}?></h2></li>
    <li data-icon="edit" style="white-space:normal;" class="single" data-vlu="<?php if($_SESSION[tn]==PRC){echo '标题 5';}else if($_SESSION[tn]==EN){echo 'Option 5';}else{echo '標題 5';}?>">
	<a href="#" class="ui-btn ui-btn-f"><h2><?php if($_SESSION[tn]==PRC){echo '标题 5';}else if($_SESSION[tn]==EN){echo 'Option 5';}else{echo '標題 5';}?></h2></a></li>
    <li data-icon="edit" style="white-space:normal;" class="single" data-vlu="<?php if($_SESSION[tn]==PRC){echo '标题 s';}else if($_SESSION[tn]==EN){echo 'Option s';}else{echo '標題 s';}?>">
	<a href="#" class="ui-btn ui-btn-f"><h2><?php if($_SESSION[tn]==PRC){echo '标题 s';}else if($_SESSION[tn]==EN){echo 'Option s';}else{echo '標題 s';}?></h2></a></li>
</ul>
<script>


var widw = $(window).width()*0.85;var heigw = $(window).height()*0.85;
$(".ifrwidthp").width(widw);
$(".ifrwidthp").css('max-height',heigw);
$(".ifrwidth").width(widw);
$(".ifrwidth").height(heigw*0.95);


</script>

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
if($_POST[title] and $pj and $_SESSION[guanyin1] and $_SESSION[guanyin1]==$_POST[guanyin1]){

	if($ap and !preg_match('/^[0-9]*$/', $ap))exit;
	if($pj and !preg_match('/^[0-9]*$/', $pj))exit;	
	if($tm and !preg_match('/^[0-9]*$/', $tm))exit;	
	if($tms and !preg_match('/^[0-9]*$/', $tms))exit;	
	if($tn and !preg_match('/^[0-9]*$/', $tn))exit;	
	if($pn and !preg_match('/^[0-9]*$/', $pn))exit;	


if($_POST[dlt] and $tn){
	
	for($i=1;$i<sizeof($tbgbtn);$i++){
		if($i==$tn){$popup .= '';}
		else{$popup .= '<!--itempopbtn!-->'.$tbgbtn[$i];}
	;}
		$popup = str_replace('</ul></div>','',$popup);

		$popup = $tbgbtn[0].$popup.'</ul></div>';

}else if($_POST['ord'] and preg_match('/^[0-9]*$/', $_POST['ord']) and $tn){
	$insert=$_POST['ord'];
	
	
	for($i=1;$i<sizeof($tbgbtn);$i++){
		if($i==$insert){	
			$popup .= '<!--itempopbtn!-->'.$tbgbtn[$tn].'<!--itempopbtn!-->'.$tbgbtn[$i];}
		else if($i==$tn){$popup .= '';}
		else{$popup .= '<!--itempopbtn!-->'.$tbgbtn[$i];}
	;}
	$popup = str_replace('</ul></div>','',$popup);

		$popup = $tbgbtn[0].$popup.'</ul></div>';

}else if($_POST[title] and $tn){

	$tmn = $tnmvlu;				
	
	for($i=1;$i<sizeof($tbgbtn);$i++){
		if($i==$tn){
				
	if($_POST[imgbg]){
	$bgtheme = 'z';
			if(strpos($_POST[imgbg],'http://')!==false or strpos($_POST[imgbg],'https://')!==false){$images = '';}else{$images = 'images/';}
			if(strlen($_POST[imgbg])==1){$bghtml = '';$bgtheme = htmlspecialchars($_POST[imgbg]);$bordern='';}			
			else if(strpos($_POST[imgbg],'#')!==false or strpos($_POST[imgbg],'rgba(')!==false  or strpos($_POST[imgbg],'rgb(')!==false){$bghtml = 'background-color:'.htmlspecialchars($_POST[imgbg]).';';if(strpos($_POST[imgbg],'rgba(')!==false)$bordern='border:none;';}
			else if(strpos($_POST[imgbg],'[xy]')!==false and !$_POST[typ]){$bghtml = 'background-image:url('.$images.htmlspecialchars($_POST[imgbg]).');';$bordern='';}		
			else if(!$_POST[typ]){$bghtml = 'background-image:url('.$images.htmlspecialchars($_POST[imgbg]).');background-size:100%;background-repeat:repeat-y;';$bordern='border:none;';}
	;}else{$bghtml = '';$bgtheme = 'b';$bordern='';}		
	
	if($_POST[typ]){$divider = 'data-role="list-divider"';$td='text-decoration:none;';}
	else{$popuprel= 'data-popup="" class="'.$pj.$ap.'multiple'.$pn.' ui-btn ui-btn-'.$bgtheme.'"  data-form="'.$pj.$ap.'form'.$pn.'n'.$tm.'" data-vlu="'.htmlspecialchars($_POST[title]).'"';$icon = ' data-icon="edit"';$td='';}
			
			
	$popup .= '<!--itempopbtn!--><!--data'.$tmn.'@#@'.htmlspecialchars($_POST[typ]).'@#@'.htmlspecialchars($_POST[wsp]).'@#@'.htmlspecialchars($_POST[title]).'@#@'.htmlspecialchars($_POST[imgftr]).'@#@'.htmlspecialchars($_POST[tclr]).'@#@'.htmlspecialchars($_POST[ftrclr]).'@#@'.htmlspecialchars($_POST[imgbg]).'@#@'.htmlspecialchars($_POST[imgtbn]).'@#@'.htmlspecialchars($_POST[borderbg]).'@#@'.htmlspecialchars($_POST[hgt]).'data!-->';
	$popup .= '<li '.$divider.$icon.' data-theme="'.$bgtheme.'">';
	
	if($_POST[borderbg]=='none'){$borderbg = 'border:none;';}else if($_POST[borderbg]){$borderbg = 'border-color:'.htmlspecialchars($_POST[borderbg]).';';}else{$borderbg = '';}
	
	$popup .= '<a href="#" '.$popuprel.' style="'.$borderbg.$bordern.htmlspecialchars($bghtml).$td.'">';
	
	if($_POST[imgtbn]){
	if(strpos($_POST[imgtbn],'http://')!==false or strpos($_POST[imgtbn],'https://')!==false){$images = '';}else{$images = 'images/';}
	$popup .= '<img src="'.$images.htmlspecialchars($_POST[imgtbn]).'">';
	}
	if($_POST[wsp]){$wsp = 'white-space:normal';}else{$wsp = '';}
		if($_POST[tclr]){$tclrstyle = 'color:'.htmlspecialchars($_POST[tclr]).';';}else{$tclrstyle = '';}
		if($tclrstyle or $wsp){$tclrstyln = ' style="'.$tclrstyle.$wsp.'"';}else{$tclrstyln = '';}	
	
	$popup .= '<h2'.$tclrstyln.'>'.htmlspecialchars($_POST[title]).'</h2>';
	if($_POST[imgftr]){
		if($_POST[ftrclr]){$ftrclrstyle = 'color:'.htmlspecialchars($_POST[ftrclr]).';';}else{$ftrclrstyle = '';}
		if($ftrclrstyle or $wsp){$ftrclrstyln = ' style="'.$ftrclrstyle.$wsp.'"';}else{$ftrclrstyln = '';}
	$popup .= '<h2'.$ftrclrstyln.'>'.htmlspecialchars($_POST[imgftr]).'</h2>';
	}
	
	$popup .= '</a></li>';
	
		;}else{$popup .= '<!--itempopbtn!-->'.$tbgbtn[$i];}
	;}
	
		$popup = str_replace('</ul></div>','',$popup);

	
		if(sizeof($tbgbtn)>=8 and strpos($tbgbtn[0],'data-filter')==false){$tbgbtn[0] = str_replace('data-role="listview" data-inset="true"','data-role="listview" data-inset="true" data-filter="true"',$tbgbtn[0]);}
		else{$tbgbtn[0] = str_replace('data-filter="true"','',$tbgbtn[0]);}		
	
		$popup = $tbgbtn[0].$popup.'</ul></div>';
		
		if($_POST[hgt] and preg_match('/^[0-9]*$/',$_POST[hgt]) and $_POST[hgt]!=$hgtsvlu){$hgtstyle = 'data-hgt="'.$_POST[hgt].'" class="imgtitlehgt webkitm" style="overflow-y:auto"';}
	
			if(strpos($popup,'data-hgt="')!==false){
				if(!$_POST[hgt]){
					$popup = str_replace('data-hgt="'.$hgtsvlu.'"','',$popup);
					$popup = str_replace('class="imgtitlehgt webkitm"','',$popup);
					$popup = str_replace('style="overflow-y:auto"','',$popup);
				}else{
					if($_POST[hgt] and !preg_match('/^[0-9]*$/',$_POST[hgt]))$_POST[hgt] = '';
					if($_POST[hgt])$popup = str_replace('data-hgt="'.$hgtsvlu.'"','data-hgt="'.$_POST[hgt].'"',$popup);				
				;}
			;}else if($hgtstyle){
				$popup = str_replace('data-inset=',$hgtstyle.' data-inset=',$popup);		
			;}		



}else if($_POST[title] and !$tn){

	if(!$tnsvlu){$tmn=1;}else{$tmn = $tnsvlu+1;}
	
	if($_POST[imgbg]){
	$bgtheme = 'z';
			if(strpos($_POST[imgbg],'http://')!==false or strpos($_POST[imgbg],'https://')!==false){$images = '';}else{$images = 'images/';}
			if(strlen($_POST[imgbg])==1){$bghtml = '';$bgtheme = htmlspecialchars($_POST[imgbg]);}		
			else if(strpos($_POST[imgbg],'#')!==false or strpos($_POST[imgbg],'rgba(')!==false  or strpos($_POST[imgbg],'rgb(')!==false){$bghtml = 'background-color:'.htmlspecialchars($_POST[imgbg]).';';if(strpos($_POST[imgbg],'rgba(')!==false)$bordern='border:none;';}
			else if(strpos($_POST[imgbg],'[xy]')!==false and !$_POST[typ]){$bghtml = 'background-image:url('.$images.htmlspecialchars($_POST[imgbg]).');';$bordern='border:none;';}
			else if(!$_POST[typ]){$bghtml = 'background-image:url('.$images.htmlspecialchars($_POST[imgbg]).');background-size:100%;background-repeat:repeat-y;';}
	;}else{$bghtml = '';$bgtheme = 'b';}
	
	if($_POST[typ]){$divider = 'data-role="list-divider"';$td='text-decoration:none;';}
	else{$popuprel= 'data-popup="" class="'.$pj.$ap.'multiple'.$pn.' ui-btn ui-btn-'.$bgtheme.'" data-form="'.$pj.$ap.'form'.$pn.'n'.$tm.'" data-vlu="'.htmlspecialchars($_POST[title]).'"';$icon = ' data-icon="edit"';}
	
	
			
	$popup .= '<!--itempopbtn!--><!--data'.$tmn.'@#@'.htmlspecialchars($_POST[typ]).'@#@'.htmlspecialchars($_POST[wsp]).'@#@'.htmlspecialchars($_POST[title]).'@#@'.htmlspecialchars($_POST[imgftr]).'@#@'.htmlspecialchars($_POST[tclr]).'@#@'.htmlspecialchars($_POST[ftrclr]).'@#@'.htmlspecialchars($_POST[imgbg]).'@#@'.htmlspecialchars($_POST[imgtbn]).'@#@'.htmlspecialchars($_POST[borderbg]).'@#@'.htmlspecialchars($_POST[hgt]).'data!-->';
	$popup .= '<li '.$divider.$icon.' data-theme="'.$bgtheme.'">';
	if($_POST[borderbg]=='none'){$borderbg = 'border:none;';}else if($_POST[borderbg]){$borderbg = 'border-color:'.htmlspecialchars($_POST[borderbg]).';';}else{$borderbg = '';}
	
	if($bordern or $borderbg or $bghtml or $td){$bordernstyle = 'style="'.$bordern.$borderbg.htmlspecialchars($bghtml).$td.'"';}else{$bordernstyle = '';}

	$popup .= '<a href="#" '.$popuprel.' '.$bordernstyle.'>';
	
	if($_POST[imgtbn]){
	if(strpos($_POST[imgtbn],'http://')!==false or strpos($_POST[imgtbn],'https://')!==false){$images = '';}else{$images = 'images/';}
	$popup .= '<img src="'.$images.htmlspecialchars($_POST[imgtbn]).'">';
	}
	if($_POST[wsp]){$wsp = 'white-space:normal';}else{$wsp = '';}
		if($tclrstyle){$tclrstyle = 'color:'.htmlspecialchars($_POST[tclr]).';';}else{$tclrstyle = '';}
		if($tclrstyle or $wsp){$tclrstyln = ' style="'.$tclrstyle.$wsp.'"';}else{$tclrstyln = '';}	
	$popup .= '<h2'.$tclrstyln.'>'.htmlspecialchars($_POST[title]).'</h2>';
	if($_POST[imgftr]){
		if($ftrclrstyle){$ftrclrstyle = 'color:'.htmlspecialchars($_POST[ftrclr]).';';}else{$ftrclrstyle = '';}
		if($ftrclrstyle or $wsp){$ftrclrstyln = ' style="'.$ftrclrstyle.$wsp.'"';}else{$ftrclrstyln = '';}
	$popup .= '<h2'.$ftrclrstyln.'>'.htmlspecialchars($_POST[imgftr]).'</h2>';
	}
	
	$popup .= '</a></li>';
	
	if($_POST[hgt] and preg_match('/^[0-9]*$/',$_POST[hgt]) and $_POST[hgt]!=$hgtsvlu){$hgtstyle = 'data-hgt="'.$_POST[hgt].'" class="imgtitlehgt webkitm" style="overflow-y:auto"';}
	
	if($tbg[0]){	
			if(strpos($tbg[0],'data-hgt="')!==false){
				if(!$_POST[hgt]){
					$tbg[0] = str_replace('data-hgt="'.$hgtsvlu.'"','',$tbg[0]);
					$tbg[0] = str_replace('class="imgtitlehgt webkitm"','',$tbg[0]);
					$tbg[0] = str_replace('style="overflow-y:auto"','',$tbg[0]);
				}else{
					if($_POST[hgt] and !preg_match('/^[0-9]*$/',$_POST[hgt]))$_POST[hgt] = '';
					if($_POST[hgt])$tbg[0] = str_replace('data-hgt="'.$hgtsvlu.'"','data-hgt="'.$_POST[hgt].'"',$tbg[0]);				
				;}
			;}else if($hgtstyle){
				$tbg[0] = str_replace('data-inset=',$hgtstyle.' data-inset=',$tbg[0]);		
			;}
	
		$popup = str_replace('</ul>',$popup.'</ul>',$tbg[0]);
	}else{	
		if(!$_POST[width] or !preg_match('/^[0-9]*$/',$_POST[width]))$_POST[width] = '80';
		$popup = '<div style="width:'.$_POST[width].'%" data-wdt="1"><ul data-corners="false" data-role="listview" '.$hgtstyle.' data-inset="true">'.$popup.'</ul></div>';
	}
}////if($_POST[dlt] and $owlnbr){

if(!$_POST[width] or !preg_match('/^[0-9]*$/',$_POST[width]))$_POST[width] = '80';
		if($_POST[widthp]!=$_POST[width]){
		$popup = str_replace('style="width:'.$_POST[widthp].'%" data-wdt="1"','style="width:'.$_POST[width].'%" data-wdt="1"',$popup);
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
			
			$formshtml = '<!--part'.$pn.'!-->'.$tbgs[0];
			for($i=1;$i<$tms;$i++){$formshtml .= '<!--item!-->'.$tbgs[$i];}
			$formshtml .= '<!--item!-->'.$tbgn[0];
			
			
			
			if(sizeof($tbgs)>$tms and $tms){for($i=$tms+1;$i<sizeof($tbgs);$i++){$formshtmls .= '<!--item!-->'.$tbgs[$i];};}
			if($tms==sizeof($tbgs)-1)$formshtmls .= $tbg[1];

			$popup = $formshtml.'<!--itemform!-->'.$popup.'<!--itemforms!-->'.$formshtmls;

	
			$webpopup .= $html.''.$popup.$htmls;
			$webpopup .= '</div><!--content!--></div><!--page!-->';
			
		 	
			
			$fpagtrns='../panel/'.$roww[pjnbr].'/'.$ap.'.html';
			file_put_contents($fpagtrns,$html.''.$popup.$htmls);

			$fpagtrns='../panel/'.$roww[pjnbr].'/web'.$ap.'.html';
			file_put_contents($fpagtrns,$webpopup);

	
			
	if(($_POST['ord']==' ' or !$_POST['ord']) and !$_POST[dlt])$tmp = '&tn='.htmlspecialchars($tn);
	echo "<meta http-equiv='refresh' content='0;URL=formpoplist.php?ap=".htmlspecialchars($roww[ap])."&pj=".htmlspecialchars($roww[pjnbr])."&pn=".htmlspecialchars($pn)."&tm=".htmlspecialchars($tm)."&tms=".htmlspecialchars($tms).$tmp."'>";			
;}

?>
	
