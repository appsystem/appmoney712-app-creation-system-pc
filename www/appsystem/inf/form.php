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
    <title><?php if($_SESSION[tn]==PRC){echo '表格 - AppMoney712 移动应用设计系统';}else if($_SESSION[tn]==EN){echo 'Form - AppMoney712 APP Creation System';}else{echo '表格 - AppMoney712 移動應用設計系統';}?></title>
	<link href="../css/jquery.mobile-1.4.4.min.css" rel="stylesheet">
	<link href="../css/jquerymobile-1.4.4.min.css" rel="stylesheet">
	<link href="../css/icons/style.css" rel="stylesheet">
	<link href="../css/appsystem.css" rel="stylesheet">

	<style type="text/css">
		
		.ui-icon-qr:after{background-image: url("../css/images/qr.svg");}
		.ui-icon-qr:after{background-size: 18px 18px;} 
		.ui-icon-popup:after{background-image: url("../css/images/popup.svg");}
		.ui-icon-popup:after{background-size: 18px 18px;} 
		.ui-icon-ddpick:after{background-image: url("../css/images/ddpick.svg");}
		.ui-icon-ddpick:after{background-size: 18px 18px;} 
	</style>
	<script src="../js/jquery.js"></script>
	<script src="../js/jquery.mobile-1.4.4.min.js"></script>
	<script src="../js/form.js"></script>
	<script src="../js/jquery.qrcode.min.js"></script>
	<!--<script src="../js/jquery.nicescroll.min.js"></script>!-->

</head>
<body>
<div data-role="page" data-theme="f" class="page">
	<div style="overflow: hidden;" data-role="header" data-theme="f">
	<a href="#navigations"  id="menubttn"  data-rel="popup" data-transition="pop" class="ui-btn ui-btn ui-btn-inline ui-corner-all ui-btn-icon-left ui-icon-bars"><?php if($_SESSION[tn]==PRC){echo '目录';}else if($_SESSION[tn]==EN){echo 'Menu';}else{echo '目錄';}?></a>
    <h1><?php if($_SESSION[tn]==PRC){echo '表格 - AppMoney712 移动应用设计系统';}else if($_SESSION[tn]==EN){echo 'Form - AppMoney712 APP Creation System';}else{echo '表格 - AppMoney712 移動應用設計系統';}?></h1>
	
	</div><!-- /header -->

	
	<div data-role="content">
	
	<?php if($ap){?>
	<a href="webpage.php?pj=<?php echo htmlspecialchars($roww[pjnbr]) ?>&ap=<?php echo htmlspecialchars($roww[ap])?>" data-ajax="false" class="ui-btn ui-btn ui-btn-inline ui-corner-all ui-btn-icon-left ui-icon-carat-l">&nbsp;</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="#view" data-rel="popup" data-transition="pop" class="ui-btn ui-btn-inline ui-corner-all ui-mini ui-btn-icon-left ui-icon-search"><?php if($_SESSION[tn]==PRC){echo '预览';}else if($_SESSION[tn]==EN){echo 'Preview';}else{echo '預覽';}?></a>
		
	<div data-role="popup" id="view">
	<ul data-role="listview" data-corners="false" data-inset="true">
	<li><a href="view.php?pj=<?php echo htmlspecialchars($roww[pjnbr])?>&ap=<?php echo htmlspecialchars($roww[ap])?>&vw=ap" data-ajax="false" target="_blank" class="ui-btn ui-btn-inline ui-mini ui-btn-icon-left ui-icon-search"><?php if($_SESSION[tn]==PRC){echo '预览应用页内容形式';}else if($_SESSION[tn]==EN){echo 'Page content of APP style[Preview]';}else{echo '預覽應用頁內容形式';}?></a></li>
	<li><a href="view.php?pj=<?php echo htmlspecialchars($roww[pjnbr])?>&ap=<?php echo htmlspecialchars($roww[ap])?>&vw=ap&ts=1" data-ajax="false" target="_blank" class="ui-btn ui-btn-inline ui-mini ui-btn-icon-left ui-icon-search"><?php if($_SESSION[tn]==PRC){echo '预览应用页内容形式';}else if($_SESSION[tn]==EN){echo 'Page content of APP style[Preview]';}else{echo '預覽應用頁內容形式';}?><?php if($_SESSION[tn]==PRC){echo '[触控式] [使用webkit型浏览器]';}else if($_SESSION[tn]==EN){echo '[Touch screen] [using any webkit browser]';}else{echo '[觸控式] [使用webkit型瀏覽器]';}?></a></li>
	<li><a href="viewp.php?pj=<?php echo htmlspecialchars($roww[pjnbr])?>&ap=<?php echo htmlspecialchars($roww[ap])?>" data-ajax="false" target="_blank" class="ui-btn ui-btn-inline ui-mini ui-btn-icon-left ui-icon-search"><?php if($_SESSION[tn]==PRC){echo '预览popup形式';}else if($_SESSION[tn]==EN){echo 'content of popup style[Preview]';}else{echo '預覽popup形式';}?></a></li>
	<li><a href="viewp.php?pj=<?php echo htmlspecialchars($roww[pjnbr])?>&ap=<?php echo htmlspecialchars($roww[ap])?>&ts=1" data-ajax="false" target="_blank" class="ui-btn ui-btn-inline ui-mini ui-btn-icon-left ui-icon-search"><?php if($_SESSION[tn]==PRC){echo '预览popup形式';}else if($_SESSION[tn]==EN){echo 'content of popup style[Preview]';}else{echo '預覽popup形式';}?><?php if($_SESSION[tn]==PRC){echo '[触控式] [使用webkit型浏览器]';}else if($_SESSION[tn]==EN){echo '[Touch screen] [using any webkit browser]';}else{echo '[觸控式] [使用webkit型瀏覽器]';}?></a></li>
	<!--<li><a href="view.php?pj=<?php echo htmlspecialchars($roww[pjnbr])?>&ap=<?php echo htmlspecialchars($roww[ap])?>&vw=s" data-ajax="false" target="_blank" class="ui-btn ui-btn-inline ui-mini ui-btn-icon-left ui-icon-search"><?php if($_SESSION[tn]==PRC){echo '预览單頁形式';}else if($_SESSION[tn]==EN){echo 'single page style[Preview]';}else{echo '預覽單頁形式';}?></a></li>!-->
	</ul>
	</div>
	
		
	<a href="menudesign.php?pj=<?php echo htmlspecialchars($roww[pjnbr])?>&ap=<?php echo $ap?>&pn=<?php echo $pn?>&php=form&plt=1" data-ajax="false" class="ui-btn ui-btn ui-btn-inline ui-corner-all ui-mini ui-btn-icon-left ui-icon-bars"><?php if($_SESSION[tn]==PRC){echo '专案应用页列表';}else if($_SESSION[tn]==EN){echo 'Project Page List';}else{echo '專案應用頁列表';}?></a>
	<?php ;}?>
	<a href="#try" data-rel="popup" data-transition="pop" class="ui-btn ui-btn-f ui-btn-inline ui-corner-all ui-mini" style="color:BLACK"><span class="pigss-pencil" style="color:red"></span><?php if($_SESSION[tn]==PRC){echo '快速试用 - QR二维码';}else if($_SESSION[tn]==EN){echo 'Quick try - QR code';}else{echo '快速試用 - QR二維碼';}?></a>
	<div data-role="popup" id="try" data-position-to="window" data-theme="f" class="ifrwidth"><a href="#" data-rel="back" class="popn ui-btn ui-btn-z ui-btn-icon-notext ui-icon-delete"></a><BR><BR>
	<?php if(!$pj){
				echo '<p>';if($_SESSION[tn]==PRC){echo '提示:您未创建应用的专案。';}else if($_SESSION[tn]==EN){echo 'Alert : You do not create APP project yet.';}else{echo '提示:您未創建應用的專案。';}echo '</p><hr>';
		  ;}
		  if(!$ap){
				echo '<p>';if($_SESSION[tn]==PRC){echo '提示:您未创建应用页。';}else if($_SESSION[tn]==EN){echo 'Alert : You do not create APP page yet.';}else{echo '提示:您未創建應用頁。';}echo '</p><hr>';
		 ;}
	?>
	
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '项目填写';}else if($_SESSION[tn]==EN){echo 'Item information';}else{echo '項目填寫';}?></b> &nbsp;<?php if($_SESSION[tn]==PRC){echo '在\'形式\'选用\'多项选[QR二维码]\'并键入标题并提送。';}else if($_SESSION[tn]==EN){echo 'You need to select multiple option[QR CODE] in \'type\' field, enter title and then click the SEND button.';}else{echo '在\'形式\'選用\'多項選[QR二維碼]\'並鍵入標題並提送。';}?></p>	
	<p><?php if($_SESSION[tn]==PRC){echo '此项显示在此页的列表上,点撀相关标题,再在\'收件url/email\'任意键入文字以启用功能並提送。';}else if($_SESSION[tn]==EN){echo 'This item will be showed on the list of this page. You need to click the title on the list, enter any text to the \'receiving url/email\' field to enable the function and click the SEND button.';}else{echo '此項顯示在此頁的列表上,點撀相關標題,再在\'收件url/email\'任意鍵入文字以啟用功能並提送。';}?></p>	
	<p><?php if($_SESSION[tn]==PRC){echo '在\'提送按钮标题\'键入none并提送。';}else if($_SESSION[tn]==EN){echo 'You need to enter the word none to the \'send button title\' field to enable the function and click the SEND button.';}else{echo '在\'提送按鈕標題\'鍵入none並提送。';}?></p>	
	<hr>
	
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '选项编写[popup]';}else if($_SESSION[tn]==EN){echo 'option data editing[popup]';}else{echo '選項編寫[popup]';}?></b> &nbsp;
	<?php if($_SESSION[tn]==PRC){echo '此项产生POPUP按钮,用户点撀此按钮显示POPUP,POPUP内含选项。作用是将供用户点选的选项分组,不同的选项POPUP按钮含不同的的选项数据。';}else if($_SESSION[tn]==EN){echo 'This item is to create popup button. APP user clicks on this button to show popup which contains option data. The purpose of different popup buttons is to group the different option data. Different popups contain different option data.';}else{echo '此項產生POPUP按鈕,用戶點撀此按鈕顯示POPUP,POPUP內含選項。作用是將供用戶點選的選項分組,不同的選項POPUP按鈕含不同的選項數據。';}?></p>	
	
	<p><?php if($_SESSION[tn]==PRC){echo '您的应用应试用键入双语文。';}else if($_SESSION[tn]==EN){echo 'You are recommended to enter two languages for title and data.';}else{echo '您的應用應嘗試鍵入雙語文。';}?></p>	

	<p><?php if($_SESSION[tn]==PRC){echo '您须点撀\'选项编写[popup]\',再按该页的快速试用指引。';}else if($_SESSION[tn]==EN){echo 'You need to click the option data editing[popup] and follow the quick try on the option data editing page.';}else{echo '您須點撀\'選項編寫[popup]\',再按該頁的快速試用指引。';}?></p>	
	<hr>
	
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '试用';}else if($_SESSION[tn]==EN){echo 'Testing';}else{echo '試用';}?></b> &nbsp;
	<?php if($_SESSION[tn]==PRC){echo '您须点撀此页上的预览,再进行测试。再修改及选用不同设置再预览并试用。';}else if($_SESSION[tn]==EN){echo 'You need to click the above preview button to test your design. You can enter or select different parameters to test their functions and effects.';}else{echo '您須點撀此頁上的預覽,再進行測試。再修改及選用不同設置再預覽並試用。';}?></p>	
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '试用步骤';}else if($_SESSION[tn]==EN){echo 'Testing Steps';}else{echo '試用步驟';}?></b> &nbsp;
	<?php if($_SESSION[tn]==PRC){echo '在预览页,点撀popup按钮,点选选项数据,数据填到键入范围,对多选型式, 您能重覆点选。您须点撀含QR二维码符号的按钮才能生成QR二维码。';}else if($_SESSION[tn]==EN){echo 'You need to click the popup button and click data option button on it. The selected data value will be filled in textarea automatically. For multiple options, you can repeat the selection step to create more value for QR creation.  You need to click the QR code symbol button to create QR code.';}else{echo '在預覽頁,點撀popup按鈕,點選選項數據,數據填到鍵入範圍,對多選型式, 您能重覆點選。您須點撀含QR二維碼符號的按鈕才能生成QR二維碼。';}?></p>	
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
	<?php if($_SESSION[tn]==PRC){echo '表格创建';}else if($_SESSION[tn]==EN){echo 'Form Creating';}else{echo '表格創建';}
	if($tm)echo '<span style="color:black">['.htmlspecialchars($tm).']</span>';?>  
	

	<?php if($tl)$tln = '&tl='.$tl;?>
	
<?php   if($pn){
			$ht = file_get_contents('../panel/'.$roww[pjnbr].'/'.$ap.'.html');
			
			if(strpos($ht,'<form')!==false)$formtag =1;
			
			$htm = explode('<!--part',$ht);
			$pntag = '<!--part'.$pn.'!-->';
				for($i=1;$i<sizeof($htm);$i++){
					if(strpos('<!--part'.$htm[$i],$pntag)===false and !$formshtml){$html .= '<!--part'.$htm[$i];}
					else if(strpos('<!--part'.$htm[$i],$pntag)!==false){$formshtml  = str_replace($pntag,'','<!--part'.$htm[$i]);}
					else{$htmls .= '<!--part'.$htm[$i];}
				;}
			$tabnbgdata = explode('<!--data-tabnbg',$formshtml);
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
				
			$formshtml  = str_replace('<div class="swiper-slide"><div id="'.$pj.$ap.'vnts'.$pn.'" class="vntsns vtnn">','',$formshtml);	
			$formshtml  = str_replace('<!--data-tabnbg'.$tabnbgdatn[0].'data-tabnbg!-->','',$formshtml);	
			;}		
			$formshtml  = str_replace('</div></div><!--vnts!-->','',$formshtml);			

				
			$tbg = explode('<!--item!-->',$formshtml);
							
			
			
			$sbgtnm = explode('data-bg="',$formshtml);
			$sbgvln = explode('"',$sbgtnm[1]);	
			$sbgvlu = explode('@#@',$sbgvln[0]);		
	
				
			$wtbgn = explode('<!--itemform!-->',$tbg[$tm]);
			$wtbg = explode('<!--itemforms!-->',$wtbgn[1]);
			if(strpos($wtbg[0],'<!--itempopbtn!-->')!==false and strpos($wtbg[0],'<!--itempop!-->')===false){
			$styleuse = 1;
			;}else if(strpos($wtbg[0],'<!--itempopbtn!-->')!==false and strpos($wtbg[0],'<!--itempop!-->')!==false){
			$styleuses = 1;
			;}
			
			for($i=1;$i<sizeof($tbg);$i++){
			
			$tbgnvlu = explode('<!--data',$tbg[$i]);
			$tbgsvlu = explode('data!-->',$tbgnvlu[1]);
			$tbgvlu = explode('@#@',$tbgsvlu[0]);
			
			
			$reqvlu[$i] = $tbgvlu[0];
			$typvlu[$i] = $tbgvlu[1];	
			//if($typvlu[$i]=='data')$datatypvlu=1;
			$datatypvlu[$i] = $tbgvlu[2]; 
			$datsvlu[$i] = $tbgvlu[3]; 	//if($datsvlu[$i] and !$datsvluvlu)$datsvluvlu=1;
			$slfreqvlu[$i] = $tbgvlu[4]; 
			$regmesvlu[$i] = $tbgvlu[5]; 	
			$embpgnvlu[$i] = $tbgvlu[6]; 	
			$embhpgnvlu[$i] = $tbgvlu[7]; 
			$imgtbgvlu[$i] = $tbgvlu[8];
			$imgtclrvlu[$i] = $tbgvlu[9];
			$titlevlu[$i] = $tbgvlu[10]; 
			$popupvlu[$i] = $tbgvlu[11]; 	if($popupvlu[$i] and !$popupvluvlu)$popupvluvlu=1;			
			$tmnvlu[$i] = $tbgvlu[12];  if($tmnvlu[$i] > $formsnvlu or !$formsnvlu)$formsnvlu = $tmnvlu[$i];
			$altsvlu[$i] = $tbgvlu[13];
			$imgtitlesvlu[$i] = $tbgvlu[14];			
			$infotitlevlu[$i] = $tbgvlu[15];
			$datatitlevlu[$i] = $tbgvlu[16];
			$clrdatatitlevlu[$i] = $tbgvlu[17];
			$qrtitlevlu[$i] = $tbgvlu[18];
			$mlelftitle[$i] = $tbgvlu[19];
			$mlergtitle[$i] = $tbgvlu[20];
			$qrpopbg[$i] = $tbgvlu[21];
			$mmvpopbg[$i] = $tbgvlu[22];
			$mmvdatatitle[$i] = $tbgvlu[23];
			
			$push[$i] = $tbgvlu[24];
			//$mmvpopin[$i] = $tbgvlu[25];

			//if($typvlu[$i]!='info'){						
								//if($i==1){if($datatypvlu[$i]=='password'){$wvdatn .= '""';}else{$wvdatn .= ',"'.htmlspecialchars($tmnvlu[$i]).'"';};}
								//else{if($datatypvlu[$i]=='password'){$wvdatn .= ',""';}else{$wvdatn .= ',"'.htmlspecialchars($tmnvlu[$i]).'"';};}
			//;}
				
			//if(!$titlevlu[$i]){
				//if(strpos($tbg[$i],'<!--formbr!-->')!==false){$titlevlu[$i] = '[br]';}
				//else if(strpos($tbg[$i],'<!--formhr!-->')!==false){$titlevlu[$i] = '[hr]';}
			//;}
		
			;} 
			;}
			if($tm)$tms = $tm; 
	?>	
	<hr>
	<FORM action="form.php?pj=<?php echo htmlspecialchars($roww[pjnbr]) ?>&ap=<?php echo htmlspecialchars($roww[ap]) ?>&tm=<?php echo htmlspecialchars($tms) ?>&pn=<?php echo htmlspecialchars($pn).$tln ?>" id="webxls" method="post" data-ajax="false" >
	<div class="ui-grid-c"><div class="ui-block-a"><?php if($_SESSION[tn]==PRC){echo '形式';}else if($_SESSION[tn]==EN){echo 'type';}else{echo '形式';}?>
	<select name="typ">
	<option value="info" <?php if($typvlu[$tm]=='info')echo 'selected="selected"';?>><?php if($_SESSION[tn]==PRC){echo '文字內容';}else if($_SESSION[tn]==EN){echo 'form content';}else{echo '文字內容';}?></option> 
	<option value="data" <?php if($typvlu[$tm]=='data')echo 'selected="selected"';?>><?php if($_SESSION[tn]==PRC){echo '读取数据';}else if($_SESSION[tn]==EN){echo 'data';}else{echo '讀取數據';}?></option> 
	<option value="input" <?php if($typvlu[$tm]=='input')echo 'selected="selected"';?>><?php if($_SESSION[tn]==PRC){echo '文字[input形式]';}else if($_SESSION[tn]==EN){echo 'text[input style]';}else{echo '文字[input形式]';}?></option> 
	<option value="textarea" <?php if($typvlu[$tm]=='textarea')echo 'selected="selected"';?>><?php if($_SESSION[tn]==PRC){echo '文字[textarea形式]';}else if($_SESSION[tn]==EN){echo 'text[textarea style]';}else{echo '文字[textarea形式]';}?></option> 
	<option value="single" <?php if($typvlu[$tm]=='single')echo 'selected="selected"';?>><?php if($_SESSION[tn]==PRC){echo '单项选';}else if($_SESSION[tn]==EN){echo 'single option';}else{echo '單項選';}?></option> 
	<?php if(!$styleuse){?>
	<option value="multiple" <?php if($typvlu[$tm]=='multiple')echo 'selected="selected"';?>><?php if($_SESSION[tn]==PRC){echo '多项选[QR二维码]';}else if($_SESSION[tn]==EN){echo 'multiple option[QR CODE]';}else{echo '多項選[QR二維碼]';}?></option> 	
	<option value="multipln" <?php if($typvlu[$tm]=='multipln')echo 'selected="selected"';?>><?php if($_SESSION[tn]==PRC){echo '多项选';}else if($_SESSION[tn]==EN){echo 'multiple option';}else{echo '多項選';}?></option> 	<?php ;}?>

	</select>
<?php if(!$tm){?>


<input type="hidden" name="formtyp<?php if(!$tl)echo 'n';?>" placeholder="" value="fo">
<input type="hidden" name="send<?php if(!$tl)echo 'n';?>" placeholder="" value="<?php echo htmlspecialchars($sbgvlu[2])?>">
<input type="hidden" name="sendmethod" placeholder="" value="<?php echo htmlspecialchars($sbgvlu[4])?>">
<input type="hidden" name="receive" placeholder="" value="<?php echo htmlspecialchars($sbgvlu[6])?>">
<input type="hidden" name="receivingformat" placeholder="" value="<?php echo htmlspecialchars($sbgvlu[7])?>">
<input type="hidden" name="subj" placeholder="" value="<?php echo htmlspecialchars($sbgvlu[8])?>">



<?php ;}//if(!$tm){?>
	</div>
<div class="ui-block-b"><?php if($tm){?><?php if($typvlu[$tm]=='data' or ($typvlu[$tm]=='input' and (!$datatypvlu[$tm] or $datatypvlu[$tm]=='date' or $datatypvlu[$tm]=='email' or $datatypvlu[$tm]=='number')) or $typvlu[$tm]=='textarea' or $typvlu[$tm]=='single' or $typvlu[$tm]=='multiple' or $typvlu[$tm]=='multipln'){?>
<?php if($_SESSION[tn]==PRC){echo '巳填数据按钮数据量';}else if($_SESSION[tn]==EN){echo 'data history quantity for re-entry';}else{echo '巳填數據按鈕數據量';}?>
<input name="dats"  type="number" value="<?php echo htmlspecialchars($datsvlu[$tm]);?>"><?php ;}//if($tm)?>
<?php ;}?>
</div>
	<div class="ui-block-c"><?php if(!$styleuse and $tm and ($typvlu[$tm]=='single' or $typvlu[$tm]=='multiple' or $typvlu[$tm]=='multipln')){?>&nbsp;<br><a href="formpop.php?ap=<?php echo htmlspecialchars($roww[ap]) ?>&pj=<?php echo htmlspecialchars($roww[pjnbr]) ?>&pn=<?php echo htmlspecialchars($pn) ?>&tms=<?php echo htmlspecialchars($tm) ?>&tm=<?php echo htmlspecialchars($tmnvlu[$tm]) ?>" class="ui-btn ui-btn-b ui-corner-all ui-mini ui-btn-icon-left ui-icon-edit" data-ajax="false"><?php if($_SESSION[tn]==PRC){echo '选项编写';}else if($_SESSION[tn]==EN){echo 'option data editing';}else{echo '選項編寫';}?>[popup]</a><?php ;}//if($tm)?>
</div>

<div class="ui-block-d"><?php if(!$styleuses and $tm and ($typvlu[$tm]=='single')){?>&nbsp;<br><a href="formpoplist.php?ap=<?php echo htmlspecialchars($roww[ap]) ?>&pj=<?php echo htmlspecialchars($roww[pjnbr]) ?>&pn=<?php echo htmlspecialchars($pn) ?>&tms=<?php echo htmlspecialchars($tm) ?>&tm=<?php echo htmlspecialchars($tmnvlu[$tm]) ?>" class="ui-btn ui-btn-b ui-corner-all ui-mini ui-btn-icon-left ui-icon-edit" data-ajax="false"><?php if($_SESSION[tn]==PRC){echo '选项编写';}else if($_SESSION[tn]==EN){echo 'option data editing';}else{echo '選項編寫';}?>[<?php if($_SESSION[tn]==PRC){echo '列表型式';}else if($_SESSION[tn]==EN){echo 'listview style';}else{echo '列表型式';}?>]</a><?php ;}//if($tm)?>
</div>
 
	</div>
	<div class="ui-grid-a" ><div class="ui-block-a" style="width:25%">	<?php if($tm and $typvlu[$tm]!='info'){?>
&nbsp;<br><input name="req" id="req" type="checkbox" value="1" <?php if($reqvlu[$tm])echo 'checked="checked"';?>><label for="req"><?php if($_SESSION[tn]==PRC){echo '必填项';}else if($_SESSION[tn]==EN){echo 'necessary item';}else{echo '必填項';}?></label>	<?php ;}//if($tm)?></div>
	<div class="ui-block-b" style="width:75%"><?php if($tm and $typvlu[$tm]!='info'){?>
<?php if($_SESSION[tn]==PRC){echo '未填显示信息';}else if($_SESSION[tn]==EN){echo 'alert message';}else{echo '未填顯示信息';}?><input name="altn" id="altn" type="text" value="<?php echo htmlspecialchars($altsvlu[$tm]);?>">	<?php ;}//if($tm)?></div></div>
	<?php if($tm){?>
<hr>
	<div class="ui-grid-b">
	<div class="ui-block-a"><?php if($typvlu[$tm]=='input'){?>
	<?php if($_SESSION[tn]==PRC){echo '数据限制';}else if($_SESSION[tn]==EN){echo 'data restriction';}else{echo '數據限制';}?>
	<select name="datatyp">
	<option value=""></option> 
	<option value="date" <?php if($datatypvlu[$tm]=='date')echo 'selected="selected"';?>><?php if($_SESSION[tn]==PRC){echo '日期';}else if($_SESSION[tn]==EN){echo 'date';}else{echo '日期';}?></option> 
	<option value="email" <?php if($datatypvlu[$tm]=='email')echo 'selected="selected"';?>><?php if($_SESSION[tn]==PRC){echo '电邮';}else if($_SESSION[tn]==EN){echo 'email';}else{echo '電郵';}?></option> 
	<option value="number" <?php if($datatypvlu[$tm]=='number')echo 'selected="selected"';?>><?php if($_SESSION[tn]==PRC){echo '数量';}else if($_SESSION[tn]==EN){echo 'number';}else{echo '數量';}?></option> 
	<option value="password" <?php if($datatypvlu[$tm]=='password')echo 'selected="selected"';?>><?php if($_SESSION[tn]==PRC){echo '密码';}else if($_SESSION[tn]==EN){echo 'password';}else{echo '密碼';}?></option>
	</select>	<?php ;}?>
	</div>
	<div class="ui-block-b"><?php if($typvlu[$tm]=='input'){?>
	<?php if($_SESSION[tn]==PRC){echo '自定限制';}else if($_SESSION[tn]==EN){echo 'regular expression';}else{echo '自定限制';}?><input type="text" name="reg" placeholder="" value="<?php echo htmlspecialchars($slfreqvlu[$tm])?>"><?php ;}?>
</div>
<div class="ui-block-c"><?php if($typvlu[$tm]=='input'){?>
<?php if($_SESSION[tn]==PRC){echo '显示信息';}else if($_SESSION[tn]==EN){echo 'showing message';}else{echo '顯示信息';}?><input type="text" name="regmessage" placeholder="" value="<?php echo htmlspecialchars($regmesvlu[$tm])?>"><?php ;}?>
</div>
	</div>
	<?php ;}//if($tm)?>

<hr>
<?php if($_SESSION[tn]==PRC){echo '标题';}else if($_SESSION[tn]==EN){echo 'title';}else{echo '標題';}?><textarea name="imgtitle" placeholder="" required><?php echo htmlspecialchars($titlevlu[$tm]);?></textarea>
	<hr>
<?php if($tm){?>
	<div class="ui-grid-b">
<div class="ui-block-a">
<?php 
if($typvlu[$tm]!='info'){
	if($_SESSION[tn]==PRC){echo '标题缩写';}else if($_SESSION[tn]==EN){echo 'title abbreviation';}else{echo '標題縮寫';}
;}else{
	if($_SESSION[tn]==PRC){echo '文字內容高度';}else if($_SESSION[tn]==EN){echo 'area height of form content';}else{echo '文字內容高度';}
;}?>
<input  type="text" name="imgtitles" placeholder="" value="<?php if($imgtitlesvlu[$tm]!=$pj.$ap.'webform'.$pn.'n'.$tmnvlu[$tm])echo htmlspecialchars($imgtitlesvlu[$tm])?>">	
</div>
<div class="ui-block-b"><?php //if($_SESSION[tn]==PRC){echo '表格部份';}else if($_SESSION[tn]==EN){echo 'Form structure';}else{echo '表格部份';}?>
	<!--<select name="formtyp">
	<option value="fo" <?php if($sbgvlu[1]=='fo')echo 'selected="selected"';?>><?php if($_SESSION[tn]==PRC){echo '完整表格';}else if($_SESSION[tn]==EN){echo 'Complete form';}else{echo '完整表格';}?></option> 
	<option value="st" <?php if($sbgvlu[1]=='st')echo 'selected="selected"';?>><?php if($_SESSION[tn]==PRC){echo '表格首部';}else if($_SESSION[tn]==EN){echo 'first part of form';}else{echo '表格首部';}?></option> 
	<!--<option value="nd" <?php if($sbgvlu[1]=='nd')echo 'selected="selected"';?>><?php if($_SESSION[tn]==PRC){echo '项目部份';}else if($_SESSION[tn]==EN){echo 'item part';}else{echo '項目部份';}?></option> !-->
	<!--<option value="th" <?php //if($sbgvlu[1]=='th')echo 'selected="selected"';?>><?php //if($_SESSION[tn]==PRC){echo '提送部份';}else if($_SESSION[tn]==EN){echo 'send part';}else{echo '提送部份';}?></select></option>!--> 
	<input type="hidden" name="formtyp" placeholder="" value="fo">
	</div>
	<div class="ui-block-c"><?php if($_SESSION[tn]==PRC){echo '整段背景';}else if($_SESSION[tn]==EN){echo 'section background';}else{echo '整段背景';}?>
	<input type="text" name="parkbg" placeholder="" value="<?php echo htmlspecialchars($sbgvlu[0])?>"></div>
</div>
<hr>
<?php ;}//if($tm)?>


	<div class="ui-grid-d">
	<div class="ui-block-a"><?php if($_SESSION[tn]==PRC){echo '标题区背景颜色';}else if($_SESSION[tn]==EN){echo 'background color of title area';}else{echo '標題區背景顏色';}?><input type="text" name="imgtbg" placeholder="" value="<?php echo htmlspecialchars($imgtbgvlu[$tm])?>"></div>
	<div class="ui-block-b"><?php if($_SESSION[tn]==PRC){echo '标题颜色';}else if($_SESSION[tn]==EN){echo 'title text color';}else{echo '標題顏色';}?><input type="text" name="imgtclr" placeholder="" value="<?php echo htmlspecialchars($imgtclrvlu[$tm])?>"></div>
	<div class="ui-block-c"><?php if($tm){?><?php if($_SESSION[tn]==PRC){echo '内嵌内容';}else if($_SESSION[tn]==EN){echo 'embedded information';}else{echo '內嵌內容';}?>
	<input type="text" name="embpgn" placeholder="" value="<?php echo htmlspecialchars($embpgnvlu[$tm])?>"><?php ;}//if($tm)?>
	</div><div class="ui-block-d"><?php if($tm){?><?php if($_SESSION[tn]==PRC){echo '内嵌内容高度';}else if($_SESSION[tn]==EN){echo 'height of embedded information ';}else{echo '內嵌內容高度';}?>[%]
	<input type="number" name="embhpgn" placeholder="" value="<?php echo htmlspecialchars($embhpgnvlu[$tm])?>"><?php ;}//if($tm)?></div>
	<div class="ui-block-e"><?php if($tm){?>popup<?php if($_SESSION[tn]==PRC){echo '档名';}else if($_SESSION[tn]==EN){echo ' filename';}else{echo '檔名';}?><input type="text" name="popupfile" placeholder="" value="<?php echo htmlspecialchars($popupvlu[$tm])?>"><?php ;}//if($tm)?></div></div>
	<?php if($tm){?>

<hr>
	<b style="color:PINK"><?php if($_SESSION[tn]==PRC){echo '整段背景及以下部份数据属整段表格的设定,只用填一次。';}else if($_SESSION[tn]==EN){echo 'You do not need to fill in the section background and some of the following items for each item. They are common functional data of your designed form.';}else{echo '整段背景及以下部份數據屬整段表格的設定,只用填一次。';}?></b>	
<hr>	
	<div class="ui-grid-d"><div class="ui-block-a"><?php if($sbgvlu[1]=='fo' or $sbgvlu[1]=='th'){?>
	<?php if($_SESSION[tn]==PRC){echo '提送按鈕标题';}else if($_SESSION[tn]==EN){echo 'send button title';}else{echo '提送按鈕標題';}?><input type="text" name="send" placeholder="" value="<?php echo htmlspecialchars($sbgvlu[2])?>">
	<?php ;}?></div>
	<div class="ui-block-b"><?php if($sbgvlu[1]=='fo' or $sbgvlu[1]=='th'){?>
	<?php if($_SESSION[tn]==PRC){echo '清除按鈕标题';}else if($_SESSION[tn]==EN){echo 'clear button title';}else{echo '清除按鈕標題';}?><input type="text" name="clr" placeholder="" value="<?php echo htmlspecialchars($sbgvlu[3])?>">
	<?php ;}?>
	</div><div class="ui-block-c">
	<?php if($_SESSION[tn]==PRC){echo 'popup按鈕标题';}else if($_SESSION[tn]==EN){echo 'popup button title';}else{echo 'popup按鈕標題';}?><input type="text" name="infotitle" placeholder="" value="<?php echo htmlspecialchars($infotitlevlu[$tm])?>"></div>
	<div class="ui-block-d">
	<?php if($_SESSION[tn]==PRC){echo '数据按鈕标题';}else if($_SESSION[tn]==EN){echo 'data button title';}else{echo '數據按鈕標題';}?><input type="text" name="datatitle" placeholder="" value="<?php echo htmlspecialchars($datatitlevlu[$tm])?>">
	</div>
	<div class="ui-block-e">
	<?php if($typvlu[$tm]!='multiple'){?>
	<?php if($_SESSION[tn]==PRC){echo '数据移除按鈕标题';}else if($_SESSION[tn]==EN){echo 'data clearing button title';}else{echo '數據移除按鈕標題';}?><input type="text" name="clrdatatitle" placeholder="" value="<?php echo htmlspecialchars($clrdatatitlevlu[$tm])?>">
	<?php ;}//if($typvlu[$tm]!?>
	</div>
	</div>
	<?php ;}//if($tm)?>
	<?php if($tm){?>
	<hr><?php if($sbgvlu[1]!='nd'){?>	
<div class="ui-grid-d"><div class="ui-block-a"><?php if($_SESSION[tn]==PRC){echo '数据接收方式';}else if($_SESSION[tn]==EN){echo 'data receiving<BR><BR>';}else{echo '數據接收方式';}?>
	<select name="sendmethod">
	<option value="internet" <?php if($sbgvlu[4]=='internet')echo 'selected="selected"';?>><?php if($_SESSION[tn]==PRC){echo '伺服器';}else if($_SESSION[tn]==EN){echo 'server';}else{echo '伺服器';}?></option>
	<option value="app" <?php if($sbgvlu[4]=='app')echo 'selected="selected"';?>><?php if($_SESSION[tn]==PRC){echo '应用直送';}else if($_SESSION[tn]==EN){echo 'data';}else{echo '應用直送';}?></option> 

	</select>
	</div><div class="ui-block-b"><?php if($_SESSION[tn]==PRC){echo '数据巳送出提示';}else if($_SESSION[tn]==EN){echo 'data sent message<BR><BR>';}else{echo '數據巳送出提示';}?><input type="text" name="sent" placeholder="" value="<?php echo htmlspecialchars($sbgvlu[5])?>"></div>
	<div class="ui-block-c"><?php if($_SESSION[tn]==PRC){echo '收件url/email';}else if($_SESSION[tn]==EN){echo 'receiving url/email';}else{echo '收件url/email';}?>[<?php if($_SESSION[tn]==PRC){echo '必先填 [见步骤]';}else if($_SESSION[tn]==EN){echo '<BR>mandatory [refer to Step]';}else{echo '必先填 [見步驟]';}?>]<input type="text" name="receive" placeholder="" value="<?php echo htmlspecialchars($sbgvlu[6])?>"></div>
	<div class="ui-block-d"><?php if($sbgvlu[4]=='app'){?>
	<?php if($_SESSION[tn]==PRC){echo 'email标题';}else if($_SESSION[tn]==EN){echo 'email subject';}else{echo 'email標題';}?><input type="text" name="subj" placeholder="" value="<?php echo htmlspecialchars($sbgvlu[8])?>">
	<?php ;}?></div>


	<div class="ui-block-e"><?php if($_SESSION[tn]==PRC){echo '收件格式';}else if($_SESSION[tn]==EN){echo 'receiving format';}else{echo '收件格式';}?>
	<select name="receivingformat">
	<option value="1" <?php if($sbgvlu[7]=='1')echo 'selected="selected"';?>>html <?php if($_SESSION[tn]==PRC){echo '文字';}else if($_SESSION[tn]==EN){echo 'text';}else{echo '文字';}?></option>
	<option value="3" <?php if($sbgvlu[7]=='3')echo 'selected="selected"';?>><?php if($_SESSION[tn]==PRC){echo '电脑形式';}else if($_SESSION[tn]==EN){echo 'computer format';}else{echo '電腦形式';}?></option> 
	<option value="5" <?php if($sbgvlu[7]=='5')echo 'selected="selected"';?>><?php if($_SESSION[tn]==PRC){echo '电脑形式及文字';}else if($_SESSION[tn]==EN){echo 'computer format and text';}else{echo '電腦形式及文字';}?></option> 
	</select>
	
	</div>
	</div>	<?php ;}//if($tm)?>
	<?php ;}//if($tm)?>	<hr>
	
	

	<div class="ui-grid-d">
	<div class="ui-block-a"><?php if($tm and ($typvlu[$tm]=='multiple' or $typvlu[$tm]=='data')){?>
	<?php if($_SESSION[tn]==PRC){echo 'QR popup背景';}else if($_SESSION[tn]==EN){echo 'QR popup background';}else{echo 'QR popup背景';}?><input type="text" name="qrpopbg" placeholder="" value="<?php echo htmlspecialchars($qrpopbg[$tm])?>"><?php ;}//if($tm)?>
	</div>
	<div class="ui-block-b">	<?php if($tm and $typvlu[$tm]!='info'){?><?php if($_SESSION[tn]==PRC){echo 'popup背景';}else if($_SESSION[tn]==EN){echo 'popup background';}else{echo 'popup背景';}?> - <?php if($_SESSION[tn]==PRC){echo '巳填数据/数据次序';}else if($_SESSION[tn]==EN){echo 'data history quantity/data sequence';}else{echo '巳填數據/數據次序';}?><input type="text" name="mmvpopbg" placeholder="" value="<?php echo htmlspecialchars($mmvpopbg[$tm])?>"></div><?php ;}//if($tm)?>
	<div class="ui-block-c">	<?php if($tm and $typvlu[$tm]=='multiple'){?><?php if($_SESSION[tn]==PRC){echo '数据次序';}else if($_SESSION[tn]==EN){echo 'data sequence';}else{echo '數據次序';}?> - <?php if($_SESSION[tn]==PRC){echo '资讯按钮';}else if($_SESSION[tn]==EN){echo 'info button';}else{echo '資訊按鈕';}?><input type="text" name="mmvpopinf" placeholder="" value="<?php echo htmlspecialchars($sbgvlu[9])?>"><?php ;}//if($tm)?></div>

	</div>
	

	<?php if($tm and ($typvlu[$tm]=='multiple' or $typvlu[$tm]=='data')){?>
	<div class="ui-grid-d">
	<?php if($typvlu[$tm]=='multiple'){?>
	<div class="ui-block-a"><?php if($_SESSION[tn]==PRC){echo 'QR按鈕标题';}else if($_SESSION[tn]==EN){echo 'QR button title';}else{echo 'QR按鈕標題';}?><input type="text" name="qrtitle" placeholder="" value="<?php echo htmlspecialchars($qrtitlevlu[$tm])?>"></div>	
	<div class="ui-block-b"><?php if($_SESSION[tn]==PRC){echo '数据向左移按钮标题';}else if($_SESSION[tn]==EN){echo 'Data[to left] button title';}else{echo '數據向左移按鈕標題';}?><input type="text" name="mlelftitle" placeholder="" value="<?php echo htmlspecialchars($mlelftitle[$tm])?>">
	</div><div class="ui-block-c"><?php if($_SESSION[tn]==PRC){echo '数据向右移按钮标题';}else if($_SESSION[tn]==EN){echo 'Data[to right] button title';}else{echo '數據向右移按鈕標題';}?><input type="text" name="mlergtitle" placeholder="" value="<?php echo htmlspecialchars($mlergtitle[$tm])?>"></div>
	<div class="ui-block-d">
	<?php if($_SESSION[tn]==PRC){echo '数据次序按鈕标题';}else if($_SESSION[tn]==EN){echo 'data sequence button title';}else{echo '數據次序按鈕標題';}?><input type="text" name="mmvtitle" placeholder="" value="<?php echo htmlspecialchars($mmvdatatitle[$tm])?>">
	</div>
	<div class="ui-block-e">
	<?php if($_SESSION[tn]==PRC){echo '数据移除按鈕标题';}else if($_SESSION[tn]==EN){echo 'data clearing button title';}else{echo '數據移除按鈕標題';}?><input type="text" name="clrdatatitle" placeholder="" value="<?php echo htmlspecialchars($clrdatatitlevlu[$tm])?>">
	</div>
	<?php ;}//if($typvlu[$tm]=?>
	
	</div>
	<?php ;}//if($tm)?>
	
	<?php if($tm){?>

	<hr>
	<?php ;}//if(){?>
	<input type="hidden" name="guanyin1" value="<?php if(!$_POST[guanyin1])$_SESSION[guanyin1]=rand();
	echo htmlspecialchars($_SESSION[guanyin1]); ?>">
	<div class="ui-grid-d"><div class="ui-block-a">

	<input type="submit" name="submit" id="webxlsbtn" Value="<?php if($_SESSION[tn]==PRC){echo '送交';}else if($_SESSION[tn]==EN){echo 'SEND';}else{echo '送交';}?>">
	</div><div class="ui-block-b">
<a href="#inf" data-rel="popup" data-transition="pop" class="ui-btn ui-btn-b ui-btn-inline ui-corner-all ui-mini">? <?php if($_SESSION[tn]==PRC){echo '解释';}else if($_SESSION[tn]==EN){echo 'Explanation';}else{echo '解釋';}?></a>
	<div data-role="popup" id="inf" style="min-width:300px;max-width:85%" data-position-to="window" data-theme="f" class="ifrwidthp"><a href="#" data-rel="back" class="popn ui-btn ui-btn-z ui-btn-icon-notext ui-icon-delete"></a>
	<h4 style="color:black"><?php if($_SESSION[tn]==PRC){echo '解释';}else if($_SESSION[tn]==EN){echo 'Explanation';}else{echo '解釋';}?></h4>
	<p><?php if($_SESSION[tn]==PRC){echo '若您是点撀\'QR二维码\'到此页,您只使用相关多选项的功能。';}else if($_SESSION[tn]==EN){echo 'If you click the \'QR Code\' function button to go to this page, you need to use the multiple options only.';}else{echo '若您是點撀\'QR二維碼\'到此頁,您只使用相關多選項的功能。';}?></p>	

	<p><?php if($_SESSION[tn]==PRC){echo '建议一页内限一张表格。';}else if($_SESSION[tn]==EN){echo 'You could be better to edit one form for one APP page only.';}else{echo '建議一頁內限一張表格。';}?></p>	
	<!--<p><?php if($_SESSION[tn]==PRC){echo '您能在表格项目间添加项目,e.g.相簿及音频。您须参考表格部份。';}else if($_SESSION[tn]==EN){echo 'You can add APP functions between form items. e.g. album or audio. You need to refer to form structure.';}else{echo '您能在表格項目間添加項目,e.g.相簿及音頻。您須參考表格部份。';}?></p>!-->	
	<p><?php if($_SESSION[tn]==PRC){echo '此功能用於接收用户数据,须设置伺服器接收或用户使用合适设备将数据送到您的电邮。';}else if($_SESSION[tn]==EN){echo 'You needs an Internet or Intranet server to receive APP user data or APP user using appropriate device to send data to your own email account in this function.';}else{echo '此功能用於接收用戶數據,須設置伺服器接收或用戶使用合適設備將數據送到您的電郵。';}?></p>
	<p><?php if($_SESSION[tn]==PRC){echo '您能只用\'多选项\'的QR二维码创建,而不用作表格功能。';}else if($_SESSION[tn]==EN){echo 'You can use the multiple type of form input for converting data to QR code only but not for data sending function.';}else{echo '您能只用\'多選項\'的QR二維碼創建,而不用作表格功能。';}?></p>
	<HR>
	<h4 style="color:black"><?php if($_SESSION[tn]==PRC){echo '形式';}else if($_SESSION[tn]==EN){echo 'Type';}else{echo '形式';}?></h4>
	<p><b style="color:brown"><?php if($_SESSION[tn]==PRC){echo '文字內容';}else if($_SESSION[tn]==EN){echo 'form content';}else{echo '文字內容';}?></b> - <?php if($_SESSION[tn]==PRC){echo '不含填写项,只有文字内容。您能填一个[hr],是代表隔线,或填[br].是代表换行。';}else if($_SESSION[tn]==EN){echo 'This item content contains text only. You can add a parting line by entering one [hr] and add a space row by entering one [br].';}else{echo '不含填寫項,只有文字內容。您能填一個[hr],是代表隔線,或填[br]是代表換行。';}?></p>	
	<p><b style="color:brown"><?php if($_SESSION[tn]==PRC){echo '文字内容高度';}else if($_SESSION[tn]==EN){echo 'area height of form content';}else{echo '文字內容高度';}?></b> - <?php if($_SESSION[tn]==PRC){echo '您能在修改时对此内容段的高度进行设置,填整数,是占用户使用设备的屏高的百分比。';}else if($_SESSION[tn]==EN){echo 'You can control the height of form content. You need to fill in integer. This value is the percentage of screen[viewport] height of APP user device.';}else{echo '您能在修改時對此內容段的高度進行設置,填整數,是佔用戶使用設備的屏高的百分比。';}?></p>
	
	<p><b style="color:brown"><?php if($_SESSION[tn]==PRC){echo '复制应用页内容';}else if($_SESSION[tn]==EN){echo 'APP page content copying';}else{echo '複制應用頁內容';}?></b> - <?php if($_SESSION[tn]==PRC){echo '您须使用应用页[不设panel菜单]创建此应用页[简单内容]。您能使用功能\'文字编辑器\'进行创建,您能在此页顶的\'专案应用页列表\'找到应用页的档名。填写的格式是应用页档名[copy],e.g. 1.html[copy]。当修改该应用页,您须在此再提送一次该项的相关数据。';}else if($_SESSION[tn]==EN){echo 'You need to create this APP page [simple content] by using page style - APP page[no panel]. You can edit text content by the function Content Editor. You can find the file name of APP page you created in the above Project Page List. The data format is APP page filename[copy]. e.g. 1.html[copy]. If you alter the APP page content, you need to re-send the related item to update the content for this form design. ';}else{echo '您須使用應用頁[不設panel菜單]創建此應用頁[簡單內容]。您能使用功能\'文字編輯器\'進行創建,您能在此頁頂的\'專案應用頁列表\'找到應用頁的檔名。填寫的格式是應用頁檔名[copy],e.g. 1.html[copy]。當修改該應用頁,您須在此再提送一次該項的相關數據。';}?></p>
	
	<p><b style="color:brown"><?php  if($_SESSION[tn]==PRC){echo '读取数据';}else if($_SESSION[tn]==EN){echo 'data';}else{echo '讀取數據';}?></b> - <?php if($_SESSION[tn]==PRC){echo '是关於另一功能页的\'选项按钮\'/\'项目列表\'的数据。只用设一个读取数据的项目。此项含将数据创建QR二维码。';}else if($_SESSION[tn]==EN){echo 'It is about the data created by the function page \'quick button\'[in Listview or Option button]. You need to create one data item for a form only. This item contains data generating QR code function.';}else{echo '是關於另一功能頁的\'選項按鈕\'/\'項目列表\'的數據。只用設一個讀取數據的項目。此項含將數據創建QR二維碼。';}?></p>	
	<p><b style="color:brown"><?php  if($_SESSION[tn]==PRC){echo '文字[input形式]';}else if($_SESSION[tn]==EN){echo 'text[input style]';}else{echo '文字[input形式]';}?></b> - <?php if($_SESSION[tn]==PRC){echo '用户键入文字,填写时填写区域只显一行。';}else if($_SESSION[tn]==EN){echo 'APP user can enter text to textarea which typing area is one row.';}else{echo '用戶鍵入文字,填寫時填寫區域只顯一行。';}?></p>	
	<p><b style="color:brown"><?php  if($_SESSION[tn]==PRC){echo '文字[textarea形式]';}else if($_SESSION[tn]==EN){echo 'text[textarea style]';}else{echo '文字[textarea形式]';}?></b> - <?php if($_SESSION[tn]==PRC){echo '用户键入文字,填写时填写区域能显多行。';}else if($_SESSION[tn]==EN){echo 'APP user can enter text to textarea which typing area is multiple rows.';}else{echo '用戶鍵入文字,填寫時填寫區域能顯多行。';}?></p>	
	<p><b style="color:brown"><?php if($_SESSION[tn]==PRC){echo '单项选';}else if($_SESSION[tn]==EN){echo 'single option';}else{echo '單項選';}?></b> - <?php if($_SESSION[tn]==PRC){echo '用户点撀选项按钮,只能键入一个选项内容。';}else if($_SESSION[tn]==EN){echo 'APP user can click the item buttons to enter one item value to textarea.';}else{echo '用戶點撀選項按鈕,只能鍵入一個選項內容。';}?></p>	
	<p><b style="color:brown"><?php if($_SESSION[tn]==PRC){echo '多项选[QR二維碼]';}else if($_SESSION[tn]==EN){echo 'multiple option[QR code]';}else{echo '多項選[QR二維碼]';}?></b> - <?php if($_SESSION[tn]==PRC){echo '用户点撀选项按钮,能键入多个选项内容。用户不能再键入自写的內容。此项能只用作创建QR二维码。';}else if($_SESSION[tn]==EN){echo 'APP user can click the item buttons to enter multiple item values to textarea. APP user can enter their own value. You can use its QR Code creation function only.';}else{echo '用戶點撀選項按鈕,能鍵入多個選項內容。用户不能再键入自写的内容。此項能只用作創建QR二維碼。';}?></p>	
	<p><b style="color:brown"><?php if($_SESSION[tn]==PRC){echo '多项选';}else if($_SESSION[tn]==EN){echo 'multiple option';}else{echo '多項選';}?></b> - <?php if($_SESSION[tn]==PRC){echo '用户点撀选项按钮,能键入多个选项内容。此项能只用作创建QR二维码。用户亦能再键入自写的內容。';}else if($_SESSION[tn]==EN){echo 'APP user can click the item buttons to enter multiple item values to textarea. APP user can enter their own value.';}else{echo '用戶點撀選項按鈕,能鍵入多個選項內容。用戶亦能再鍵入自寫的內容。';}?></p>	

	<hr>
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '应用在\'项目日曆\'功能';}else if($_SESSION[tn]==EN){echo 'Use in \'Project Calendar\' function';}else{echo '應用在\'項目日曆\'功能';}?></b>
	<?php if($_SESSION[tn]==PRC){echo '应用在\'项目日曆\'功能的表格,您须设置首项是接收日期数据及/或次项是相关项目标题数据。用户是点撀日曆内日期按钮,将数据带入表格。';}else if($_SESSION[tn]==EN){echo 'If the form is used on a \'Project Calendar\' page, you need to design first item type for receiving date data and second item type for receiving title data. About this function, APP user clicks on the date button of the calendar to bring the data to the form.';}else{echo '應用在\'項目日曆\'功能的表格,您須設置首項是接收日期數據及/或次項是相關項目標題數據。用戶是點撀日曆內日期按鈕,將數據帶入表格。';}?></p>	
	<hr>
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '标题';}else if($_SESSION[tn]==EN){echo 'Title';}else{echo '標題';}?></b>
	<?php if($_SESSION[tn]==PRC){echo '填写项目上的标题。';}else if($_SESSION[tn]==EN){echo 'It is the title of input field.';}else{echo '填寫項目上的標題。';}?></p>	
	<p><?php if($_SESSION[tn]==PRC){echo '若限制键入值是日期,有日期选用按钮显示,用户能选择日期键入值,日期选用时有星期值显示,若须显示中文,在标题加[wday],e.g. 订用日期[wday]。';}else if($_SESSION[tn]==EN){echo '';}else{echo '若限制鍵入值是日期,有日期選用按鈕顯示,用戶能選擇日期鍵入值,日期選用時有星期值顯示,若須顯示中文,在標題加[wday],e.g. 訂用日期[wday]。';}?></p>	
	<p><?php if($_SESSION[tn]==PRC){echo '当您接收用户数据答案时,此标题缩写是代表问题的标题及识别答案之用,不设置是用代码显示标题。您应使用简单及没有空格的标题缩写。';}else if($_SESSION[tn]==EN){echo 'When you receive APP user\'s data answer, this title abbreviation is used as identification of question title and related answer. If you add this abbreviation, you are recommended to use simple and no space characters for it.';}else{echo '當您接收用戶數據答案時,此標題縮寫是代表問題的標題及識別答案之用,不設置是用代碼顯示標題。您應使用簡單及沒有空格的標題縮寫。';}?></p>	
	
	
	<hr>
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '标题区背景颜色';}else if($_SESSION[tn]==EN){echo 'Background color of title area';}else{echo '標題區背景顏色';}?></b>
	<?php if($_SESSION[tn]==PRC){echo '您能填上rgb 颜色码 e.g. rgb(125,125,125), rgba 颜色码 e.g. rgba(125,125,125,0.5) 或 hex 颜色码 color code e.g. #123456。';}else if($_SESSION[tn]==EN){echo 'You can add rgb color code e.g. rgb(125,125,125), rgba color code e.g. rgba(125,125,125,0.5) or hex color code e.g. #123456.';}else{echo '您能填上rgb顏色碼 e.g. rgb(125,125,125), rgba顏色碼 e.g. rgba(125,125,125,0.5) 或 hex顏色碼 e.g. #123456。';}?>
</p>	
	<hr>
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '标题颜色';}else if($_SESSION[tn]==EN){echo 'Title text color';}else{echo '標題顏色';}?></b>
	<?php if($_SESSION[tn]==PRC){echo '填写html颜色码e.g. #123456。';}else if($_SESSION[tn]==EN){echo 'You can enter html color code e.g. #123456.';}else{echo '填寫html顏色碼e.g. #123456。';}?></p>	
	</div>

</div>
<div class="ui-block-c">
<a href="#nf" data-rel="popup" data-transition="pop" class="ui-btn ui-btn-b ui-btn-inline ui-corner-all ui-mini"><?php if($_SESSION[tn]==PRC){echo '步骤';}else if($_SESSION[tn]==EN){echo 'Steps';}else{echo '步驟';}?></a>
	<div data-role="popup" id="nf" style="min-width:300px;max-width:85%" data-position-to="window" data-theme="f" class="ifrwidthp"><a href="#" data-rel="back" class="popn ui-btn ui-btn-z ui-btn-icon-notext ui-icon-delete"></a><BR><BR>
	<h4 style="color:pink"><?php if($_SESSION[tn]==PRC){echo '应用页表格及qr二维码[多选项]';}else if($_SESSION[tn]==EN){echo 'Form and qr code';}else{echo '應用頁表格及qr二維碼';}?></h4>
	<h4 style="color:black"><?php if($_SESSION[tn]==PRC){echo '填写表格项资料';}else if($_SESSION[tn]==EN){echo 'Fill in form item information';}else{echo '填寫表格項資料';}?></h4>
	<p><?php if($_SESSION[tn]==PRC){echo '选择形式及填写项目,项目显示在此页的列表上,再点撀相关项目能修改资料及再添加资料。若项目是首次填写及未有修改或添加资料,您亦须提送一次以开启相关功能。';}else if($_SESSION[tn]==EN){echo 'You need to select type and fill in title item. The item will be showed on a list of this page. You can click the related title on the list to amend data and add further information. If you add a new item and do not need to amend or add more information at this moment, you also need to submit the data one more time to enable related function.';}else{echo '選擇形式及填寫項目,項目顯示在此頁的列表上,再點撀相關項目能修改資料及再添加資料。若項目是首次填寫及未有修改或添加資料,您亦須提送一次以開啟相關功能。';}?></p>	
	<p><?php if($_SESSION[tn]==PRC){echo '您应在首项巳填写收件url/email[先任意填写],以便进行填写功能的测试,对於选用\'应用直送\',只能在将设计变成应用时才能测试提送功能。';}else if($_SESSION[tn]==EN){echo 'You need to fill in the receiving url/email [you can fill in anything and amend it later] to enable functions for testing in the first item. But you can only test the \'data\' option of data receiving in the APP status.';}else{echo '您應在首項巳填寫收件url/email[先任意填寫],以便進行填寫功能的測試,對於選用\'應用直送\',只能在將設計變成應用時才能測試提送功能。';}?></p>	
	<p><?php if($_SESSION[tn]==PRC){echo '若未按上述填写数据接收方式,当填写,您须逐项目再提交一次以开启项目的相关功能。若只是修改接收数据e.g. url,是未必需要。';}else if($_SESSION[tn]==EN){echo 'If you do not follow the above mentioned to fill in the data receiving, you need to re-submit data for each item after filling. You do not need to take this action when amendment of data receiving parameter e.g. url.';}else{echo '若未按上述填寫數據接收方式,當填寫,您須逐項目再提交一次以開啟項目的相關功能。若只是修改接收數據e.g. url,是未必需要。';}?></p>	
	<hr>
	<h4 style="color:pink"><?php if($_SESSION[tn]==PRC){echo '只用qr二维码[多选项]';}else if($_SESSION[tn]==EN){echo 'Use qr code only[multiple option]';}else{echo '只用qr二維碼[多選項]';}?></h4>
	<h4 style="color:black"><?php if($_SESSION[tn]==PRC){echo '填写方法';}else if($_SESSION[tn]==EN){echo 'Steps';}else{echo '填寫方法';}?></h4>
	<p><?php if($_SESSION[tn]==PRC){echo '只能用文字或多选项。对巳填的多选项在列表上点选,任意填写收件url/email提交。再在提送按钮标题填none。';}else if($_SESSION[tn]==EN){echo 'You can use text or multiple option only. You need to enter multiple option title and select it on the list. You need to fill in anything in the receiving url/email. After sending, you need to enter none to the Send button title. ';}else{echo '只能用文字或多選項。對巳填的多選項在列表上點選,任意填寫收件url/email提交。再在提送按鈕標題填none。';}?></p>	
	<hr>
	<h4 style="color:black"><?php if($_SESSION[tn]==PRC){echo '选项编写';}else if($_SESSION[tn]==EN){echo 'Option data editing';}else{echo '選項編寫';}?></h4>
	<p><?php if($_SESSION[tn]==PRC){echo '对\'单选项\'及\'多选项\',点撀列表上相关项目,再点撀\'选项编写\'编写选项。';}else if($_SESSION[tn]==EN){echo 'For \'single\' style and \'multiple\' style, you need to edit option buttons by clicking the \'option data editing\'.';}else{echo '對\'單選項\'及\'多選項\',點撀列表上相關項目,再點撀\'選項編寫\'編寫選項。';}?></p>	
	
	<hr>
	<h4 style="color:black"><?php if($_SESSION[tn]==PRC){echo '再增加新数据';}else if($_SESSION[tn]==EN){echo 'Add new data';}else{echo '再增加新數據';}?></h4>
	<p><?php if($_SESSION[tn]==PRC){echo '若添加新数据,点撀\'再增加新数据\'。';}else if($_SESSION[tn]==EN){echo 'If you need to add new data of form input, you need to click \'Add new data\'.';}else{echo '若添加新數據,點撀\'再增加新數據\'。';}?></p>	
	<hr>
	<h4 style="color:black"><?php if($_SESSION[tn]==PRC){echo '修改表格项目列序';}else if($_SESSION[tn]==EN){echo 'Insert';}else{echo '修改表格項目列序';}?></h4>
	<p><?php if($_SESSION[tn]==PRC){echo '点撀列表上的相关项目,再点选\'插入\'的选项,项目将显示在被选插入项之上。';}else if($_SESSION[tn]==EN){echo 'You need to click the related title on the list and then select item on the \'Insert\'. The item will be above the selected item after the insertion.';}else{echo '點撀列表上的相關項目,再點選\'插入\'的選項,項目將顯示在被選插入項之上。';}?></p>	
	<hr>
	<h4 style="color:black"><?php if($_SESSION[tn]==PRC){echo '刪除';}else if($_SESSION[tn]==EN){echo 'Delete';}else{echo '刪除';}?></h4>
	<p><?php if($_SESSION[tn]==PRC){echo '点撀列表上的相关项目,再点选\'删除\'。';}else if($_SESSION[tn]==EN){echo 'You need to click the related title on the list and then click \'detele\'.';}else{echo '點撀列表上的相關項目,再點選\'刪除\'。';}?></p>	
	</div>

</div>

<div class="ui-block-d">
<a href="#infsn" data-rel="popup" data-transition="pop" class="ui-btn ui-btn-b ui-btn-inline ui-corner-all ui-mini">? <?php if($_SESSION[tn]==PRC){echo '解释';}else if($_SESSION[tn]==EN){echo 'Explanation';}else{echo '解釋';}?></a>
	<div data-role="popup" id="infsn" style="min-width:300px;overflow-y:auto;" data-corners="false" data-position-to="window" data-theme="f" class="ifrwidthp"><a href="#" data-rel="back" class="popn ui-btn ui-btn-z ui-btn-icon-notext ui-icon-delete"></a>
	<h4 style="color:brown"><?php if($_SESSION[tn]==PRC){echo '当巳键入项目并点撀列表上的项目,才显示下列数据项。';}else if($_SESSION[tn]==EN){echo 'The following items will be showed by clicking the existing items on the list.';}else{echo '當巳鍵入項目並點撀列表上的項目,才顯示下列數據項。';}?></h4>
<hr>
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '必填项';}else if($_SESSION[tn]==EN){echo 'necessary item';}else{echo '必填項';}?></b>
	<?php if($_SESSION[tn]==PRC){echo '勾选此项,若用户在提送表格时不填此项,显示未填显示信息。在应用页巳填数据接收方式才能启用此功能。';}else if($_SESSION[tn]==EN){echo 'Alert message will be showed if APP user does not fill in the item. You need to fill in the \'data receiving\' to enable this function.';}else{echo '勾選此項,若用戶在提送表格時不填此項,顯示未填顯示信息。在應用頁巳填數據接收方式才能啟用此功能。';}?></p>	
	<hr>
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '巳填数据按钮数据量';}else if($_SESSION[tn]==EN){echo 'data history quantity for re-entry';}else{echo '巳填數據按鈕數據量';}?></b>
	<?php if($_SESSION[tn]==PRC){echo '启用此项功能须填上整数,应用能储存用户此项巳提送的某些数据,此数是记录总数。用户点撀此项填写区域下的特定按钮,显示的popup内显示此等记录数据,用户能点撀记录数据,将数据覆制在填写区域内。此项未合用於多选项。';}else if($_SESSION[tn]==EN){echo 'You need to fill in integer to enable this function and the value is the total number of specific historial data of APP user entry. Your designed APP can store these data. APP user can click a specific button below item field to open a popup. The data are listed on the popup. APP user can click the data button to copy its content to item field. This item is not recommended to be used in multiple style.';}else{echo '啟用此項功能須填上整數,應用能儲存用戶此項巳提送的某些數據,此數是記錄總數。用戶點撀此項填寫區域下的特定按鈕,顯示的popup內顯示此等記錄數據,用戶能點撀記錄數據,將數據覆制在填寫區域內。此項未合用於多選項。';}?></p>	
	<hr>
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '选项编写';}else if($_SESSION[tn]==EN){echo 'option data editing';}else{echo '選項編寫';}?></b>
	<?php if($_SESSION[tn]==PRC){echo '对\'单选项\'及\'多选项\'的形式,点撀列表上相关项目,再点撀\'选项编写\'编写选项。选项是指提供给用户点选的选项。';}else if($_SESSION[tn]==EN){echo 'For \'single\' style and \'multiple\' style, you need to edit option buttons by clicking the \'option data editing\'. Option is the item option for APP user selecting.';}else{echo '對\'單選項\'及\'多選項\'的形式,點撀列表上相關項目,再點撀\'選項編寫\'編寫選項。';}?></p>		
	<hr>
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '数据限制';}else if($_SESSION[tn]==EN){echo 'data restriction';}else{echo '數據限制';}?></b>
	<?php if($_SESSION[tn]==PRC){echo '若在合适的设备,能限制用户的键入格式。对於日期是YYYY-MM-DD。对於密码是用设备的密码键入形式,应是在用户键入时显示*号代替。';}else if($_SESSION[tn]==EN){echo 'It can restrict APP user entries on the appropriate device. About date, the format is YYYY-MM-DD. About password, its showing format is depended on type of device. In general, the entry will be used * instead of showing entry.';}else{echo '若在合適的設備,能限制用戶的鍵入格式。選項是指提供給用戶點選的選項。對於日期是YYYY-MM-DD。對於密碼是用設備的密碼鍵入形式,應是在用戶鍵入時顯示*號代替。';}?></p>	
	<p><?php if($_SESSION[tn]==PRC){echo '您能用自定限制自定对用户键入值的限制,包括日期。';}else if($_SESSION[tn]==EN){echo 'You can use the regular expression for data restriction including date format.';}else{echo '您能用自定限制自定對用戶鍵入值的限制,包括日期。';}?></p>	
	<hr>
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '自定限制';}else if($_SESSION[tn]==EN){echo 'regular expression';}else{echo '自定限制';}?></b>
	<?php if($_SESSION[tn]==PRC){echo '若在合适的设备,能添加javascript 的正则表达式,限制用户的键入。';}else if($_SESSION[tn]==EN){echo 'You can add javascript regular expression to the item field. It can be used on appropriate devices only.';}else{echo '若在合適的設備,能添加javascript 的正則表達式,限制用戶的鍵入。';}?></p>	
	<hr>
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '显示信息';}else if($_SESSION[tn]==EN){echo 'showing message';}else{echo '顯示信息';}?></b>
	<?php if($_SESSION[tn]==PRC){echo '若在合适的设备,此处是当不符合正则表达式时,应用显示的信息。';}else if($_SESSION[tn]==EN){echo 'It is about the message of non-compliant situation of the javascript regular expression. It can be used on appropriate devices only.';}else{echo '若在合適的設備,此處是當不符合正則表達式時,應用顯示的信息。';}?></p>	
	<hr>
	<h4 style="color:brown">*****<?php if($_SESSION[tn]==PRC){echo '以上多项功能只能在巳设置收件url/email才能测试。若未决定此设置值,填http://。';}else if($_SESSION[tn]==EN){echo 'The above functions can be tested after the receiving url/email entered. You can enter http:// if you do not decide the value at the moment. ';}else{echo '以上多項功能只能在巳設置收件url/email才能測試。若未決定此設置值,填http://。';}?>*****</h4>
	<hr>
	<p><b style="color:black"><?php if(!$roww[pjnbr])$roww[pjnbr] = '?';
	if($_SESSION[tn]==PRC){echo '内嵌内容';}else if($_SESSION[tn]==EN){echo 'embedded information';}else{echo '內嵌內容';}?></b>
	<?php if($_SESSION[tn]==PRC){echo '您能在填写区域下嵌入一些网页或图像。e.g. 1.html 或 1.png。';}else if($_SESSION[tn]==EN){echo 'You can embed a web page or picture below item field. e.g. 1.html or 1.png';}else{echo '您能在填寫區域下嵌入一些網頁或圖像。e.g. 1.html 或 1.png。';}?></p>	
	<p><?php if($_SESSION[tn]==PRC){echo '您能在内容框的左上部加popup按钮,用户点撀此按钮开启popup显示特定内容。格式是内嵌内容档案名[inf]按钮标题[inf]popup内容档案名,e.g. 1.png[inf]放大[inf]images/1.png。对於popup内容,使用应用内的相片,填写格式是images/档案名,e.g. images/1.png。档案须存於panel/'.$roww[pjnbr].'/images档夹内。您亦能键入互联网视频及网页或应用页作为popup内容。';}else if($_SESSION[tn]==EN){echo 'You can add a popup button to top left corner of content portion. APP user can click on it to view specific content on a popup. The format is embedded filename[inf]popup button title[inf]popup content filename. e.g. 1.png[inf]enlarge[inf]images/1.png. If you use the APP pictures for the popup content, you need to prepare pictures and store them in  panel/'.$roww[pjnbr].'/images folder. The input format is images/filename. e.g. images/1.png. You can also add specific Internet video/web page or APP page as popup content.';}else{echo '您能在內容框的左上部加popup按鈕,用戶點撀此按鈕開啟popup顯示特定內容。格式是內嵌內容檔案名[inf]按鈕標題[inf]popup內容檔案名,e.g. 1.png[inf]放大[inf]images/1.png。對於popup內容,使用應用內的相片,填寫格式是images/檔案名,e.g. images/1.png。檔案須存於panel/'.$roww[pjnbr].'/images檔夾內。您亦能鍵入互聯網視頻及網頁或應用頁作為popup內容。';}?></p>
	<p><?php if($_SESSION[tn]==PRC){echo '若popup内容是相片,您能在档案加[1],e.g. picture[1].png,应能令以不同尺寸方式显示。';}else if($_SESSION[tn]==EN){echo 'If the popup content is picture, you can add [1] to the filename. e.g. picture[1].png. The picture could be showed in different display style.';}else{echo '若popup內容是相片,您能在檔案加[1],e.g. picture[1].png,應能令以不同尺寸方式顯示。';}?></p>
	<hr>
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '内嵌内容高度';}else if($_SESSION[tn]==EN){echo 'height of embedded information ';}else{echo '內嵌內容高度';}?> %</b>
	<?php if($_SESSION[tn]==PRC){echo '您应填上述嵌入的内容设定高度,是用户设备的浏览屏的高度百份比,填整数。e.g.50。';}else if($_SESSION[tn]==EN){echo 'You need to enter the percentage of content height relating to screen height[viewport] of APP user device.';}else{echo '您應填上述嵌入的內容設定高度,是用戶設備的瀏覽屏的高度百份比,填整數。e.g.50。';}?></p>	
	<hr>
	<p><b style="color:black">popup<?php if($_SESSION[tn]==PRC){echo '档名';}else if($_SESSION[tn]==EN){echo ' filename';}else{echo '檔名';}?></b>
	<?php if($_SESSION[tn]==PRC){echo '您能在填写区域下设置一个POPUP按钮,此处填内容档名。e.g. 1.html。';}else if($_SESSION[tn]==EN){echo 'You can add a popup button below item field. You need to fill in the content filename. e.g. 1.html';}else{echo '您能在填寫區域下設置一個POPUP按鈕,此處填內容檔名。e.g. 1.html。';}?></p>	
<hr>	
<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '整段背景';}else if($_SESSION[tn]==EN){echo 'section background';}else{echo '整段背景';}?></b>
	<?php 
	if($_SESSION[tn]==PRC){echo '此整段内容的背景,使用应用内的图像,档案须存於panel/'.$roww[pjnbr].'/images档夹内。若设置背景图像上下左右重覆显示,在档案名加[xy]。e.g. picture[xy].png';}else if($_SESSION[tn]==EN){echo 'It is about the background of this content part. If you use the APP pictures, you need to prepare pictures and store them in  panel/'.$roww[pjnbr].'/images folder. If you add [xy] to the picture file name e.g. picture[xy].png, the picture will be repeated both vertically and horizontally in the item area.';}else{echo '此整段內容的背景,使用應用內的圖像,檔案須存於panel/'.$roww[pjnbr].'/images檔夾內。若設置背景圖像上下左右重覆顯示,在檔案名加[xy]。e.g. picture[xy].png';}?></p>
	<p><?php if($_SESSION[tn]==PRC){echo '您亦能在背景图像填上rgb颜色码 e.g. rgb(125,125,125), rgba颜色码 e.g. rgba(125,125,125,0.5) 或 hex颜色码 e.g. #123456代替背景图像。';}else if($_SESSION[tn]==EN){echo 'You can add rgb color code e.g. rgb(125,125,125), rgba color code e.g. rgba(125,125,125,0.5) or hex color code e.g. #123456 color code instead of background picture.';}else{echo '您亦能在背景圖像填上rgb顏色碼e.g. rgb(125,125,125) , rgba顏色碼e.g. rgba(125,125,125,0.5) 或 hex顏色碼 e.g. #123456代替背景圖像。';}?></p>
	<!--<p><?php if($_SESSION[tn]==PRC){echo '您亦能填a-y的颜色主题e.g. b。';}else if($_SESSION[tn]==EN){echo 'You can enter color theme a-y.e.g. b';}else{echo '您亦能填a-y的顏色主題e.g. b。';}?></p>!-->	
	<hr>
	
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '按鈕的标题';}else if($_SESSION[tn]==EN){echo 'button titles';}else{echo '按鈕的標題';}?></b>
	<?php if($_SESSION[tn]==PRC){echo '不是必须填写。一些按钮只在特定形式的项目才有。';}else if($_SESSION[tn]==EN){echo 'They are optional items. Some buttons are for specific styled item only.';}else{echo '不是必須填寫。一些按鈕只在特定形式的項目才有。';}?></p>
	<hr>
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '提送按鈕标题';}else if($_SESSION[tn]==EN){echo 'send button title';}else{echo '提送按鈕標題';}?></b>
	<?php if($_SESSION[tn]==PRC){echo '若改为只用QR二维码功能,不用表格功能,此处填none。';}else if($_SESSION[tn]==EN){echo 'If you use QR code function only, you can enter none for this title.';}else{echo '若改為只用QR二維碼功能,不用表格功能,此處填none。';}?></p>
	<hr>
	
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo 'QR popup背景';}else if($_SESSION[tn]==EN){echo 'QR popup background';}else{echo 'QR popup背景';}?></b>
	<?php if($_SESSION[tn]==PRC){echo '数据及多选项才有此QR popup,是显示巳键入的数据的QR二维码。';}else if($_SESSION[tn]==EN){echo 'It is for data and multiple styled items. The QR popup is to show the QR code of entered data.';}else{echo '數據及多選項才有此QR popup,是顯示巳鍵入的數據的QR二維碼。';}?><?php if($_SESSION[tn]==PRC){echo '除主题颜色,填写方法同上整段背景。';}else if($_SESSION[tn]==EN){echo 'The input method is as the above - section background.';}else{echo '除主題顏色,填寫方法同上整段背景。';}?></p>	
	<hr>
	<p><b style="color:brown"><?php if($_SESSION[tn]==PRC){echo '以下只用填一次,不用逐个填写。';}else if($_SESSION[tn]==EN){echo 'You do not need to fill in the following items for each item. You need to fill in them once.';}else{echo '以下只用填一次,不用逐個填寫。';}?></b></p>	
	<hr>
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '数据次序';}else if($_SESSION[tn]==EN){echo 'data sequence';}else{echo '數據次序';}?> - <?php if($_SESSION[tn]==PRC){echo '资讯按钮';}else if($_SESSION[tn]==EN){echo 'info button';}else{echo '資訊按鈕';}?>	</b>
<?php if($_SESSION[tn]==PRC){echo '在点撀数据次序按鈕标题显示的POPUP顶部[资讯按钮形式],限填档案,e.g. 1.html,若在该按钮加标题,格式是[inf]标题[inf]档案名,e.g. [inf]资讯[inf]1.html。';}else if($_SESSION[tn]==EN){echo 'It is info button showed on the top portion of popup when APP user clicks on the data sequence button. You can enter filename only. e.g. 1.html. If you want to add a title to the info icon button, the format is [inf]title[inf]filename. e.g. [inf]info[inf]1.html';}else{echo '在點撀數據次序按鈕顯示的POPUP頂部[資訊按鈕形式],限填檔案,e.g. 1.html,若在該按鈕加標題,格式是[inf]標題[inf]檔案名,e.g. [inf]資訊[inf]1.html。';}?></p>
<a href="#" class="ui-btn ui-btn-z ui-btn-inline ui-icon-info ui-btn-icon-left">INFO</a>
	<hr>
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo 'popup背景';}else if($_SESSION[tn]==EN){echo 'popup background';}else{echo 'popup背景';}?> - <?php if($_SESSION[tn]==PRC){echo '巳填数据/数据次序';}else if($_SESSION[tn]==EN){echo 'data history quantity/data sequence';}else{echo '巳填數據/數據次序';}?></b>
	<?php if($_SESSION[tn]==PRC){echo '填写方法同上整段背景。';}else if($_SESSION[tn]==EN){echo 'The input method is as the above - section background.';}else{echo '填寫方法同上整段背景。';}?>
	</p>	
	<hr>
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '清除按鈕标题';}else if($_SESSION[tn]==EN){echo 'clear button title';}else{echo '清除按鈕標題';}?></b>
	<?php if($_SESSION[tn]==PRC){echo '若启动此按钮,须填上标题。';}else if($_SESSION[tn]==EN){echo 'You need to fill in this item to enable this button.';}else{echo '若啟動此按鈕,須填上標題。';}?></p>
<!--<hr>
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '表格部份';}else if($_SESSION[tn]==EN){echo 'Form structure';}else{echo '表格部份';}?></b>
	<?php if($_SESSION[tn]==PRC){echo '参考表格部份。';}else if($_SESSION[tn]==EN){echo 'Please refer form structure.';}else{echo '參考表格部份。';}?></p>	!-->

<hr>
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '数据接收方式';}else if($_SESSION[tn]==EN){echo 'data receiving';}else{echo '數據接收方式';}?></b>
	<?php  if($_SESSION[tn]==PRC){echo '您须设置互联网或内联网伺服器接收用户在应用发出的数据。选\'应用直送\',用户须使用合适设备电邮编辑器或应用发出数据。';}else if($_SESSION[tn]==EN){echo 'For the Internet option, you need the Internet or Intranet server to receive APP user\'s data. For \'data\' option, APP user needs to use appropriate device with mail composer or APP to send information to your own email account.';}else{echo '您須設置互聯網或內聯網伺服器接收用戶在應用發出的數據。選\'應用直送\',用戶須使用合適設備電郵編輯器或應用發出數據。';}?></p>	
<hr>
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '数据巳送出提示';}else if($_SESSION[tn]==EN){echo 'data sent message';}else{echo '數據巳送出提示';}?></b>
	<?php  if($_SESSION[tn]==PRC){echo '应用程式送出数据时显示给用户的信息。';}else if($_SESSION[tn]==EN){echo 'It is the message for showing to APP user about their data sending.';}else{echo '應用程式送出數據時顯示給用戶的信息。';}?></p>	
<hr>
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '收件url/email';}else if($_SESSION[tn]==EN){echo 'receiving url/email';}else{echo '收件url/email';}?></b>
	<?php  if($_SESSION[tn]==PRC){echo '若是选用\'伺服器\'收件,填\'伺服器\'接收程式的url。若选\'应用直送\',填属於您的电邮户口。';}else if($_SESSION[tn]==EN){echo 'If you select \'Internet\' for data receiving, you need to fill in the url of server receiving program file. If you select \'data\' option, you need to enter your own email account to receive APP user data.';}else{echo '若是選用\'伺服器\'收件,填\'伺服器\'接收程式的url。若選\'應用直送\',填屬於您的電郵戶口。';}?></p>	
<hr>
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo 'email标题';}else if($_SESSION[tn]==EN){echo 'email subject';}else{echo 'email標題';}?></b>
	<?php  if($_SESSION[tn]==PRC){echo '若选\'应用直送\',才填写,是您接收用户数据的电邮的标题。';}else if($_SESSION[tn]==EN){echo 'You need to fill in this item if you select the \'app\' for data receiving. It is the subject of your data receiving email.';}else{echo '若選\'應用直送\',才填寫,是您接收用戶數據的電郵的標題。';}?></p>	
	<hr>
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '收件格式';}else if($_SESSION[tn]==EN){echo 'receiving format';}else{echo '收件格式';}?>	</b>
	<?php  if($_SESSION[tn]==PRC){echo 'html文字是文本形式,电脑形式是JQUERY serialize形式,电脑形式及文字是含此二种形式。';}else if($_SESSION[tn]==EN){echo 'The html text is textual format. Computer format is the output of JQUERY serialize. Computer format and text contains the both formats.';}else{echo 'html文字是文本形式,電腦形式是JQUERY serialize形式,電腦形式及文字是含此二種形式。';}?></p>
	<?php if(file_exists('../js/apngcm.js')){?>	
	<hr>
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '推送消息';}else if($_SESSION[tn]==EN){echo 'Push message';}else{echo '推送消息';}?>	</b>
	<?php  if($_SESSION[tn]==PRC){echo '有关推送消息,未有参加本司相关服务不用选。若表格数据不涉此推送,不须选。';}else if($_SESSION[tn]==EN){echo 'It is about pushing message of our company service. You do not need to select this option if you do not join the service. If this form data is not about the service, you must not select this option.';}else{echo '有關推送消息,未有參加本司相關服務不用選。若表格數據不涉此推送,不須選。';}?></p>
	<?php ;}//if(file_exists('../js/apngcm.js')){?>	
	</div>
	
</div>

<div class="ui-block-e">
<!--
<a href="#nfs" data-rel="popup" data-transition="pop" class="ui-btn ui-btn-b ui-btn-inline ui-corner-all ui-mini">? <?php if($_SESSION[tn]==PRC){echo '表格部份';}else if($_SESSION[tn]==EN){echo 'Form structure';}else{echo '表格部份';}if($_SESSION[tn]==PRC){echo '解释';}else if($_SESSION[tn]==EN){echo ' explanation';}else{echo '解釋';}?></a>
	<div data-role="popup" id="nfs" style="min-width:300px;max-width:85%" data-position-to="window" data-theme="f" class="ifrwidthp"><a href="#" data-rel="back" class="popn ui-btn ui-btn-z ui-btn-icon-notext ui-icon-delete"></a>
	<h4 style="color:black"><?php if($_SESSION[tn]==PRC){echo '结构';}else if($_SESSION[tn]==EN){echo 'Form struction';}else{echo '結構';}?></h4>
	<p><?php if($_SESSION[tn]==PRC){echo '表格含表格首部[含表格ID及首个项目],表格项目及表格提送。';}else if($_SESSION[tn]==EN){echo 'A form contains first part of form[first item with form id], form item(s) and form send part.';}else{echo '表格含表格首部[含表格ID及首個項目],表格項目及表格提送。';}?></p>	
	<HR>
	<h4 style="color:black"><?php if($_SESSION[tn]==PRC){echo '完整表格';}else if($_SESSION[tn]==EN){echo 'Complete form';}else{echo '完整表格';}?></h4>
	<p><?php if($_SESSION[tn]==PRC){echo '此段内容是完整表格。';}else if($_SESSION[tn]==EN){echo 'This part content is a complete form.';}else{echo '此段內容是完整表格。';}?></p>	
	
	<hr>
	<h4 style="color:black"><?php if($_SESSION[tn]==PRC){echo '表格首部';}else if($_SESSION[tn]==EN){echo 'first part of form';}else{echo '表格首部';}?></h4>
	<p><?php if($_SESSION[tn]==PRC){echo '此段内容是表格首部,您能在项目间再加入不同的功能,e.g.相簿或音频。';}else if($_SESSION[tn]==EN){echo 'You edit this content part as first part of form. You may need to insert some APP functions between form items. e.g. album or sound';}else{echo '此段內容是表格首部,您能在項目間再加入不同的功能,e.g. 相簿或音頻。';}?></p>	
	<hr>
	<h4 style="color:black"><?php if($_SESSION[tn]==PRC){echo '项目部份';}else if($_SESSION[tn]==EN){echo 'item part';}else{echo '項目部份';}?></h4>
	<p><?php if($_SESSION[tn]==PRC){echo '此段内容均是表格项目,您能在项目间再加入不同的功能或只用作QR二维码创建。';}else if($_SESSION[tn]==EN){echo 'You edit this content part as items of form. You may need to insert some APP functions between form items or use this for QR code creating only.';}else{echo '此段內容均是表格項目,您能在項目間再加入不同的功能或只用作QR二維碼創建。';}?></p>	
	
	</div>!-->
</div>	
</div>
	<hr>
	<div class="ui-grid-d"><div class="ui-block-a"><?php if(file_exists('../js/apngcm.js')){?><input name="push" id="push" type="checkbox"><label for="push"><?php if($_SESSION[tn]==PRC){echo '推送消息';}else if($_SESSION[tn]==EN){echo 'Push message';}else{echo '推送消息';}?></label><?php ;}?></div><div class="ui-block-b"></div><div class="ui-block-c"><a href="form.php?ap=<?php echo htmlspecialchars($roww[ap])?>&pj=<?php echo htmlspecialchars($roww[pjnbr])?>&pn=<?php echo htmlspecialchars($pn)?>" class="ui-btn" data-ajax="false"><?php if($_SESSION[tn]==PRC){echo '再增加新数据';}else if($_SESSION[tn]==EN){echo 'Add new data';}else{echo '再增加新數據';}?></a></div><div class="ui-block-d">
	<?php if(sizeof($tbg)>=3 and $tm){?>
	<select name="ord" data-theme="b">
	<option value=" "><?php if($_SESSION[tn]==PRC){echo '插入';}else if($_SESSION[tn]==EN){echo 'Insert';}else{echo '插入';}?></option>
	<?php for($i=1;$i<sizeof($tbg);$i++){
	if($i!=$tm and $i!=$tm+1){?><option value="<?php echo $i?>"><?php echo '['.$i.']'?></option>
	<?php ;};}?>
	</select><?php ;}?></div><div class="ui-block-e"><?php if($tm){?><input name="dlt" id="dlt" type="checkbox" data-theme="e" ><label for="dlt"><?php if($_SESSION[tn]==PRC){echo '刪除';}else if($_SESSION[tn]==EN){echo 'Delete';}else{echo '刪除';}?></label><?php ;}//if(!$pn){?></div></div>
	</FORM>
<hr>
<?php
if(sizeof($tbg)){
echo '<div data-role="listview" data-inset="true">';}
for($i=1;$i<sizeof($tbg);$i++){
echo '<li data-icon="edit"><a href="form.php?ap='.htmlspecialchars($roww[ap]).'&pj='.htmlspecialchars($roww[pjnbr]).'&pn='.htmlspecialchars($pn).'&tm='.$i.'" data-ajax="false">';
echo  '['.$i.']&nbsp;&nbsp;&nbsp;';
if($titlevlu[$i])echo  htmlspecialchars($titlevlu[$i]);
echo '</a></li>';
;}
if(sizeof($tbg))echo '</div>';
?>
	<hr>
	<?php 
	if($formshtml){
	if($_SESSION[tn]==PRC){echo '您的设计';}else if($_SESSION[tn]==EN){echo 'Your design';}else{echo '您的設計';}
	
	echo '<br>'.str_replace('"images/','"../panel/'.$roww[pjnbr].'/images/',$formshtml);
	
		
if(file_exists('../panel/'.$roww[pjnbr].'/web'.$ap.'.js')){
	$jswebn = file_get_contents('../panel/'.$roww[pjnbr].'/web'.$ap.'.js');
	$jswebn=explode('/*webjs'.$pn.'*/',$jswebn);
	echo '<script>'.$jswebn[1].'</script>';
;}

	;}?>
	<hr>


	<a href="#infnsp" data-rel="popup" data-transition="pop" class="ui-btn ui-btn-b ui-btn-inline ui-corner-all ui-mini">? <?php if($_SESSION[tn]==PRC){echo '例';}else if($_SESSION[tn]==EN){echo 'Examples';}else{echo '例';}?></a>
	<div data-role="popup" id="infnsp" style="min-width:300px;max-width:85%" data-position-to="window" data-theme="f">
	<p><?php if($_SESSION[tn]==PRC){echo '您须缩细浏览器尺寸至移动设备大小进行浏览。';}else if($_SESSION[tn]==EN){echo 'You need to resize your browser as mobile device\'s screen size to view this example.';}else{echo '您須縮細瀏覽器尺寸至移動設備大小進行瀏覽。';}?></p>	
	</div>

<div class="ui-grid-solo" style="padding-top:2px;padding-bottom:2px;background-color:;color:;"><?php if($_SESSION[tn]==PRC){echo '标题';}else if($_SESSION[tn]==EN){echo 'Title';}else{echo '標題';}?></div>
<input type="text" name="" data-corners="false" placeholder="" value="">
<a href="#infnsps" data-rel="popup" data-transition="pop" data-corners="false" class="ui-btn ui-btn-w ui-btn-inline ui-btn-icon-notext ui-icon-info"></a>
<div id="infnsps" data-role="popup" data-corners="false" style="" class="ui-grid-solo ifrwidthps"><a href="#" data-rel="back" class="popn ui-btn ui-btn-z ui-btn-icon-notext ui-icon-delete"></a><iframe src="vw.html" style="width:100%;" seamless frameBorder="0"></iframe></div>

<div class="ui-grid-solo" id="img" style="overflow-x:hidden;overflow-y:auto;height:150px;">
<img style="width:100%" src="../images/sw.jpg"/>
</div>
<HR>
<?php if($_SESSION[tn]==PRC){echo '形式';}else if($_SESSION[tn]==EN){echo 'Example - type';}else{echo '形式';}?><hr>
<?php if($_SESSION[tn]==PRC){echo '文字 [input形式]';}else if($_SESSION[tn]==EN){echo 'text [input style]';}else{echo '文字 [input形式]';}?>
<input type="text" name="" data-corners="false" placeholder="" value=""><hr>
<?php if($_SESSION[tn]==PRC){echo '文字[日期] [input形式]';}else if($_SESSION[tn]==EN){echo 'text[date] [input style]';}else{echo '文字[日期] [input形式]';}?>
<input type="date" id="date" name="" data-corners="false" placeholder="" value="">
<a href="#inptdate" data-form="date" data-rel="popup" data-transition="pop" data-corners="false" class="datebtn ui-btn ui-btn-w ui-btn-inline ui-btn-icon-notext ui-icon-calendar"></a>
<div id="inptdate" data-role="popup" data-theme="f" data-corners="false" style="min-width:285px" class="ui-content"><a href="#" data-rel="back" class="popn ui-btn ui-btn-z ui-btn-icon-notext ui-icon-delete"></a><BR>
<a href="#" data-corners="false" class="ui-btn ui-btn-w ui-btn-inline ui-btn-icon-notext ui-icon-plus"></a> YYYYY <a href="#" data-corners="false" class="ui-btn ui-btn-w ui-btn-inline ui-btn-icon-notext ui-icon-minus"></a><BR>
<a href="#" data-corners="false" class="ui-btn ui-btn-w ui-btn-inline ui-btn-icon-notext ui-icon-plus"></a> MM <a href="#" data-corners="false" class="ui-btn ui-btn-w ui-btn-inline ui-btn-icon-notext ui-icon-minus"></a><BR>
<a href="#" data-corners="false" class="ui-btn ui-btn-w ui-btn-inline ui-btn-icon-notext ui-icon-plus"></a> DD <a href="#" data-corners="false" class="ui-btn ui-btn-w ui-btn-inline ui-btn-icon-notext ui-icon-minus"></a><BR>
<a href="#" data-corners="false" class="ui-btn ui-btn-x ui-btn-icon-right ui-icon-edit"></a>
<div id="dateweekday" style="color:brown"></div>
</div>
<hr>
<?php if($_SESSION[tn]==PRC){echo '文字 [textarea形式]';}else if($_SESSION[tn]==EN){echo 'text textarea style]';}else{echo '文字 textarea形式]';}?>
<textarea name="" data-corners="false" placeholder=""></textarea>
<?php if($_SESSION[tn]==PRC){echo '单项选';}else if($_SESSION[tn]==EN){echo 'single option';}else{echo '單項選';}?>
 [<?php if($_SESSION[tn]==PRC){echo '列表';}else if($_SESSION[tn]==EN){echo 'listview';}else{echo '列表';}?>]

<textarea name="" data-corners="false" id="single" placeholder="" readonly="readonly"></textarea>
<a href="#" data-corners="false"  class="mlserm ui-btn ui-btn-w ui-btn-inline ui-btn-icon-left ui-icon-delete">&nbsp;</a>

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
<hr>
<?php if($_SESSION[tn]==PRC){echo '单项选';}else if($_SESSION[tn]==EN){echo 'single option';}else{echo '單項選';}?>
 [popup]

<textarea name="" data-corners="false" id="singln" placeholder="" readonly="readonly"></textarea>
<a href="#singles" data-rel="popup" data-transition="pop" data-corners="false" class="ui-btn ui-btn-w ui-btn-inline ui-mini ui-btn-icon-left ui-icon-bullets"><span class="pigss-pencil"></span></a>
<a href="#" data-corners="false"  class="mlserm ui-btn ui-btn-w ui-btn-inline ui-btn-icon-left ui-icon-delete">&nbsp;</a>

<div id="singles"  data-role="popup" data-corners="false" style="" class="ui-grid-solo ifrwidthp">
<a href="#" data-rel="back" class="popn ui-btn ui-btn-z ui-btn-icon-notext ui-icon-delete"></a>

<div style="width:80%">
<ul data-corners="false" data-filter="true" data-role="listview" data-inset="true">
    <li data-role="list-divider" style="white-space:normal;" data-theme="x"><h2><?php if($_SESSION[tn]==PRC){echo '隔项';}else if($_SESSION[tn]==EN){echo 'Divider';}else{echo '隔項';}?></h2></li>
    <li data-icon="edit" style="white-space:normal;" class="singles" data-vlu="<?php if($_SESSION[tn]==PRC){echo '标题';}else if($_SESSION[tn]==EN){echo 'Option';}else{echo '標題';}?>">
	<a href="#" class="ui-btn ui-btn-f"><h2><?php if($_SESSION[tn]==PRC){echo '标题';}else if($_SESSION[tn]==EN){echo 'Option';}else{echo '標題';}?></h2></a></li>
    <li data-icon="edit" style="white-space:normal;" class="singles" data-vlu="<?php if($_SESSION[tn]==PRC){echo '标题 1';}else if($_SESSION[tn]==EN){echo 'Option 1';}else{echo '標題 1';}?>">
	<a href="#" class="ui-btn ui-btn-f"><h2><?php if($_SESSION[tn]==PRC){echo '标题 1';}else if($_SESSION[tn]==EN){echo 'Option 1';}else{echo '標題 1';}?></h2></a></li>
    <li data-role="list-divider" style="white-space:normal;" data-theme="x">
	<h2><?php if($_SESSION[tn]==PRC){echo '隔项 2';}else if($_SESSION[tn]==EN){echo 'Divider 2';}else{echo '隔項 2';}?></h2></li>
    <li data-icon="edit" style="white-space:normal;" class="singles" data-vlu="<?php if($_SESSION[tn]==PRC){echo '标题 5';}else if($_SESSION[tn]==EN){echo 'Option 5';}else{echo '標題 5';}?>">
	<a href="#" class="ui-btn ui-btn-f"><h2><?php if($_SESSION[tn]==PRC){echo '标题 5';}else if($_SESSION[tn]==EN){echo 'Option 5';}else{echo '標題 5';}?></h2></a></li>
    <li data-icon="edit" style="white-space:normal;" class="singles" data-vlu="<?php if($_SESSION[tn]==PRC){echo '标题 s';}else if($_SESSION[tn]==EN){echo 'Option s';}else{echo '標題 s';}?>">
	<a href="#" class="ui-btn ui-btn-f"><h2><?php if($_SESSION[tn]==PRC){echo '标题 s';}else if($_SESSION[tn]==EN){echo 'Option s';}else{echo '標題 s';}?></h2></a></li>
</ul></div></div><hr>



<div  class="ui-grid-solo" data-popup="" style="padding-top:2px;padding-bottom:2px;background-color:;color:;"><?php if($_SESSION[tn]==PRC){echo '多项选';}else if($_SESSION[tn]==EN){echo 'multiple option';}else{echo '多項選';}?> </div>


<div id="15retrdtn1" data-theme="w" data-role="popup" data-corners="false"  class="ifrwidthps"><a href="#" data-rel="back" class="popn ui-btn ui-btn-z ui-btn-icon-notext ui-icon-delete"></a><div class="15ddretrdtn1" style="padding:5px;display:none"><a href="#"  class=" ui-btn ui-btn-x ui-btn-inline ui-icon-info ui-btn-icon-left"><?php if($_SESSION[tn]==PRC){echo '数据次序';}else if($_SESSION[tn]==EN){echo 'data sequence';}else{echo '數據次序';}?> - <?php if($_SESSION[tn]==PRC){echo '资讯按钮';}else if($_SESSION[tn]==EN){echo 'info button';}else{echo '資訊按鈕';}?></a><div class="dd" id="15ddretrdtn1" data-tm="" style="overflow-y:auto;padding:5px;"></div></div><div class="15ddretrdtn1" style="padding:5px;width:80%"><br><br><ul id="15retrdata1" data-corners="false" data-role="listview" style="overflow-y:auto;" data-inset="true" data-filter="true"></ul></div></div>

<textarea name="15webform1n8" data-corners="false" id="15form1n8"  placeholder="" readonly="readonly"></textarea>
			<div style="width:80%" id="15multiple1n8"></div>
			&nbsp;&nbsp;<a href="#15mleqr1n8" data-corners="false" data-rel="popup" class="15mleqr1n8 ui-btn ui-btn-w ui-btn-inline ui-icon-qr ui-btn-icon-left" style="color:black"><?php if($_SESSION[tn]==PRC){echo 'QR按鈕标题';}else if($_SESSION[tn]==EN){echo 'QR button title';}else{echo 'QR按鈕標題';}?></a><div id="15mleqr1n8" data-corners="false" data-role="popup" style="color:black" data-theme="w" class="ifrwidthps"><a href="#" data-rel="back" class="popn ui-btn ui-btn-z ui-btn-icon-notext ui-icon-delete"></a><br><br><br><div id="qr15mleqr1n8" style="padding:15px;"></div><BR><BR></div>&nbsp;&nbsp;&nbsp;&nbsp;
			<a href="#" data-corners="false" data-tm="8" class="15mlelft1 ui-btn ui-btn-w ui-btn-inline ui-icon-carat-l ui-btn-icon-left" style="color:black"><?php if($_SESSION[tn]==PRC){echo '数据向左移按钮标题';}else if($_SESSION[tn]==EN){echo 'Data[to left] button title';}else{echo '數據向左移按鈕標題';}?></a>
			<a href="#" data-corners="false" data-tm="8" class="15mlergt1 ui-btn ui-btn-w ui-btn-inline ui-icon-carat-r ui-btn-icon-left" style="color:black"><?php if($_SESSION[tn]==PRC){echo '数据向右移按钮标题';}else if($_SESSION[tn]==EN){echo 'Data[to right] button title';}else{echo '數據向右移按鈕標題';}?></a>
			<a href="#" data-corners="false" data-tm="8" class="15mmv1 ui-btn ui-btn-w ui-btn-inline ui-icon-ddpick ui-btn-icon-left" style="color:black"><?php if($_SESSION[tn]==PRC){echo '数据次序按鈕标题';}else if($_SESSION[tn]==EN){echo 'data sequence button title';}else{echo '數據次序按鈕標題';}?></a>&nbsp;
			<a href="#" data-corners="false" data-tm="8" class="15mlerm1 ui-btn ui-btn-w ui-btn-inline ui-icon-delete ui-btn-icon-left" style="color:black"><?php if($_SESSION[tn]==PRC){echo '数据移除按鈕标题';}else if($_SESSION[tn]==EN){echo 'data clearing button title';}else{echo '數據移除按鈕標題';}?></a>
			<div class="ui-btn-solo" id="15form1n8"></div><!--itemform!--><div class="ui-grid-solo"><!--itembtn!--><!--data1@#@wwwwwwwwww@#@@#@@#@@#@@#@@#@@#@data!-->
	&nbsp;&nbsp;<a href="#15multiples1n8n1" data-rel="popup" data-transition="pop" data-corners="false" class="ui-btn ui-btn-f ui-btn-inline ui-btn-icon-left ui-icon-bullets" style=""><span style="color:" class="pigss-pencil"></span><span style="color:">wwwwwwwwww</span></a><!--itempop!--><div id="15multiples1n8n1" style="" data-role="popup" data-theme="z" data-corners="false" class="ifrwidthps"><a href="#" data-rel="back" class="popn ui-btn ui-btn-z ui-btn-icon-notext ui-icon-delete"></a>
<BR><BR><div style="width:80%"><ul data-corners="false" data-role="listview" data-inset="true"><!--itempopbtn!--><!--data1@#@@#@@#@w1@#@@#@@#@@#@@#@@#@@#@data!--><li  data-icon="edit" data-theme="b"><a href="#" data-popup="#15multiples1n8n1" class="15multipln1 ui-btn ui-btn-b" data-form="15form1n8" data-vlu="pork" style=""><h2 style="color:;">pork</h2></a></li><!--itempopbtn!--><!--data2@#@@#@@#@w2@#@@#@@#@@#@@#@@#@@#@data!--><li  data-icon="edit" data-theme="b"><a href="#" data-popup="#15multiples1n8n1" class="15multipln1 ui-btn ui-btn-b" data-form="15form1n8" data-vlu="pork w2" style=""><h2 style="color:;">pork w2</h2></a></li></ul></div></div><!--itempops!--><!--itembtn!--><!--data2@#@wwwwww@#@@#@@#@@#@@#@@#@@#@data!-->
	&nbsp;&nbsp;<a href="#15multiples1n8n2" data-rel="popup" data-transition="pop" data-corners="false" class="ui-btn ui-btn-f ui-btn-inline ui-btn-icon-left ui-icon-bullets" style=""><span style="color:" class="pigss-pencil"></span><span style="color:">wwwwww</span></a><!--itempop!--><div id="15multiples1n8n2" style="" data-role="popup" data-theme="z" data-corners="false" class="ifrwidthps"><a href="#" data-rel="back" class="popn ui-btn ui-btn-z ui-btn-icon-notext ui-icon-delete"></a>
<BR><BR><div style="width:80%"><ul data-corners="false" data-role="listview" data-inset="true"><!--itempopbtn!--><!--data2@#@@#@@#@ww2@#@@#@@#@@#@@#@@#@@#@data!--><li  data-icon="edit" data-theme="b"><a href="#" data-popup="#15multiples1n8n2" class="15multipln1 ui-btn ui-btn-b" data-form="15form1n8" data-vlu="pork ww2" style=""><h2 style="color:;"> porkww2</h2></a></li><!--itempopbtn!--><!--data1@#@@#@@#@ww1@#@@#@@#@@#@@#@@#@@#@data!--><li  data-icon="edit" data-theme="b"><a href="#" data-popup="#15multiples1n8n2" class="15multipln1 ui-btn ui-btn-b" data-form="15form1n8" data-vlu="pork ww1" style=""><h2 style="color:;">pork ww1</h2></a></li></ul></div></div><!--itempops!--></div><!--itemforms!--><!--addforms!-->

<a href="#snfs" data-rel="popup" data-transition="pop" class="ui-btn ui-btn-b ui-btn-inline ui-corner-all ui-mini">? <?php if($_SESSION[tn]==PRC){echo '使用解释';}else if($_SESSION[tn]==EN){echo 'Usage Explanation';}else{echo '使用解釋';}?></a>
	<div data-role="popup" id="snfs" style="min-width:300px;max-width:85%" data-position-to="window" data-theme="f" class="ifrwidthp"><a href="#" data-rel="back" class="popn ui-btn ui-btn-z ui-btn-icon-notext ui-icon-delete"></a>
	<p><?php if($_SESSION[tn]==PRC){echo '点撀选项的按钮显示popup,再点撀popup内的选项按钮,相关的值显示在填写区域并以按钮形式显示在区域下。点撀此等被选项的按钮,按钮显示勾号，再点撀相关的向左丶向右及删除操作按钮对填写内容进行编辑修改。';}else if($_SESSION[tn]==EN){echo 'You can click the \'title option\' button to open a popup list and click the option button to copy value to data field. The value will be also as button below the field area. You can click on it and a tick sign will show on it. You can click the \'to left\',\'to right\' and \'delete\' buttons to amend the entered data.';}else{echo '點撀選項的按鈕顯示popup,再點撀popup內的選項按鈕,相關的值顯示在填寫區域並以按鈕形式顯示在區域下。點撀此等被選項的按鈕,按鈕顯示勾號，再點撀相關的向左、向右及刪除操作按鈕對填寫內容進行編輯修改。';}?></p>	
<p><?php if($_SESSION[tn]==PRC){echo '当巳填上内容,您能点撀QR二维码操作按钮将内容创建QR二维码。';}else if($_SESSION[tn]==EN){echo 'You can click the QR code button to create QR code of entered items.';}else{echo '當巳填上內容,您能點撀QR二維碼操作按鈕將內容創建QR二維碼。';}?></p>
				
	
	</div>
<br>
<script>
var today = new Date();
var yyyy = today.getFullYear();
var mm = today.getMonth()+1;if(mm<10)mm = '0'+mm;
var dd = today.getDate();if(dd<10)dd = '0'+dd;
var daysOfWeek = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
$(".datebtn").click(function (){
$("#inptdate a.ui-icon-edit").text(yyyy+'-'+mm+'-'+dd);
$("#inptdate").data('data-form',$(this).attr('data-form'));
});

$("#inptdate a.ui-icon-edit").click(function (){
$("#"+$("#inptdate").data('data-form')).val($(this).text());
$("#inptdate").popup('close');
});

$("#inptdate a.ui-icon-plus:first").click(function (){
yyyy = yyyy+1;
var ltdy = new Date(yyyy,parseInt(mm), 0).getDate();
	if(dd >= ltdy)dd= ltdy;
$("#inptdate a.ui-icon-edit").text(yyyy+'-'+mm+'-'+dd);
var weekday = new Date(yyyy,parseInt(mm)-1,dd).getDay();
weekday = daysOfWeek[weekday];
$("#dateweekday").text(yyyy+'-'+mm+'-'+dd+' '+weekday);
});

$("#inptdate a.ui-icon-minus:first").click(function (){
yyyy = yyyy-1;
var ltdy = new Date(yyyy,parseInt(mm), 0).getDate();
	if(dd >= ltdy)dd= ltdy;
$("#inptdate a.ui-icon-edit").text(yyyy+'-'+mm+'-'+dd);
var weekday = new Date(yyyy,parseInt(mm)-1,dd).getDay();
weekday = daysOfWeek[weekday];
$("#dateweekday").text(yyyy+'-'+mm+'-'+dd+' '+weekday);
});

$("#inptdate a.ui-icon-plus:eq(1)").click(function (){
mm = parseInt(mm)+1;
if(mm<10)mm = '0'+mm;
if(mm>11)mm = 12;
var ltdy = new Date(yyyy,parseInt(mm), 0).getDate();
	if(dd >= ltdy)dd= ltdy;
$("#inptdate a.ui-icon-edit").text(yyyy+'-'+mm+'-'+dd);
var weekday = new Date(yyyy,parseInt(mm)-1,dd).getDay();
weekday = daysOfWeek[weekday];
$("#dateweekday").text(yyyy+'-'+mm+'-'+dd+' '+weekday);
});

$("#inptdate a.ui-icon-minus:eq(1)").click(function (){
mm = parseInt(mm)-1;
if(mm<10)mm = '0'+mm;
if(mm<=1)mm = '01';
var ltdy = new Date(yyyy,parseInt(mm), 0).getDate();
	if(dd >= ltdy)dd= ltdy;
$("#inptdate a.ui-icon-edit").text(yyyy+'-'+mm+'-'+dd);
var weekday = new Date(yyyy,parseInt(mm)-1,dd).getDay();
weekday = daysOfWeek[weekday];
$("#dateweekday").text(yyyy+'-'+mm+'-'+dd+' '+weekday);
});

$("#inptdate a.ui-icon-plus:eq(2)").click(function (){
dd = parseInt(dd)+1;
if(dd<10)dd = '0'+dd;
var ltdy = new Date(yyyy,parseInt(mm), 0).getDate();
if(dd >= ltdy)dd= ltdy;
$("#inptdate a.ui-icon-edit").text(yyyy+'-'+mm+'-'+dd);
var weekday = new Date(yyyy,parseInt(mm)-1,dd).getDay();
weekday = daysOfWeek[weekday];
$("#dateweekday").text(yyyy+'-'+mm+'-'+dd+' '+weekday);
});

$("#inptdate a.ui-icon-minus:eq(2)").click(function (){
dd = parseInt(dd)-1;
if(dd<10)dd = '0'+dd;
if(dd<=1)dd = '01';
$("#inptdate a.ui-icon-edit").text(yyyy+'-'+mm+'-'+dd);
var weekday = new Date(yyyy,parseInt(mm)-1,dd).getDay();
weekday = daysOfWeek[weekday];
$("#dateweekday").text(yyyy+'-'+mm+'-'+dd+' '+weekday);
});


$(".mleqrn").click(function (){
var qrsvlu = $("#multipln").val();
$("#qrmleqrn").html("");
if(qrsvlu)$("#qrmleqrn").qrcode({"render": "div","background":"white","size":180,"fill":"#000000","quiet": 1,"text":qrutf(qrsvlu)});
});

	$('.single').click(function (event){
	event.preventDefault();
	var datnvlu = $(this).attr('data-vlu');
	$('#single').val(datnvlu);	
	;})


	$('.singles').click(function (event){
	event.preventDefault();
	var datnvlu = $(this).attr('data-vlu');
	$('#singln').val(datnvlu);	
	$('#singles').popup('close');		
	;})
	
webform("15","1",'',$(window).height());

</script>

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
<script src="../js/appsystem.js"></script>	
</div>
</body></html>

<?php 
$tdy=0;
$tdy=date('Y-m-d');
if($_POST[imgtitle] and $pj and $_SESSION[guanyin1] and $_SESSION[guanyin1]==$_POST[guanyin1]){
	
	if($ap and !preg_match('/^[0-9]*$/', $ap))exit;
	if($pj and !preg_match('/^[0-9]*$/', $pj))exit;	
	if($tm and !preg_match('/^[0-9]*$/', $tm))exit;	

if($_POST[dlt] and $tm){
	$tbg = str_replace('<!--sysformsys!-->','',$formshtml);
	$tbgs = explode('<!--addforms!--></div>',$tbg);
	
	$tbg = explode('<!--item!-->',$tbgs[0]);
	for($i=1;$i<sizeof($tbg);$i++){
		if($i==$tm){$popup .= '';}
		else{$popup .= '<!--item!-->'.$tbg[$i];}
	;}
	
	$popup = '<div>'.$popup.'<!--addforms!--></div>';
	
}else if($_POST['ord'] and preg_match('/^[0-9]*$/', $_POST['ord']) and $tm){
	$insert=$_POST['ord'];
	$tbg = str_replace('<!--sysformsys!-->','',$formshtml);
	
	$tbgs = explode('<!--addforms!--></div>',$tbg);
	
	$tbg = explode('<!--item!-->',$tbgs[0]);
	$wvdatn ='';
	for($i=1;$i<sizeof($tbg);$i++){
		if($i==$insert){
				//$tbg[$tm]=str_replace('data-i="'.$tm.'"','data-i="'.$i.'"',$tbg[$tm]);
				$popup .= '<!--item!-->'.$tbg[$tm].'<!--item!-->'.$tbg[$i];	
				
		}else if($i==$tm){$popup .= '';}
		else{
				$popup .= '<!--item!-->'.$tbg[$i];		
				
		;}
	;}

	$popup = '<div>'.$popup.'<!--addforms!--></div>';
}else if($_POST[imgtitle] and $tm){
	
	if($tm)$tm = $tmnvlu[$tm];
	$tbg = str_replace('<!--sysformsys!-->','',$formshtml);	
	$tbgs = explode('<!--addforms!--></div>',$tbg);
	
	$tbg = explode('<!--item!-->',$tbgs[0]);
	for($i=1;$i<sizeof($tbg);$i++){
		if($i==$tms){
			$popups .= '<!--item!-->';
			
			
			if($_POST[dats] and ($_POST[typ]=='data' or $_POST[typ]=='single' or $_POST[typ]=='multiple' or $_POST[typ]=='multipln' or $_POST[typ]=='textarea' or ($_POST[typ]=='input' and (!$_POST[datatyp] or $_POST[datatyp]=='date' or $_POST[datatyp]=='number' or $_POST[datatyp]=='email') ) )){$vndats = htmlspecialchars($_POST[dats]);}else{$vndats = '';}
			$popups .= '<!--data'.htmlspecialchars($_POST[req]).'@#@'.htmlspecialchars($_POST[typ]).'@#@'.htmlspecialchars($_POST[datatyp]).'@#@'.$vndats.'@#@'.htmlspecialchars($_POST[reg]).'@#@'.htmlspecialchars($_POST[regmessage]).'@#@'.htmlspecialchars($_POST[embpgn]).'@#@'.htmlspecialchars($_POST[embhpgn]).'@#@'.htmlspecialchars($_POST[imgtbg]).'@#@'.htmlspecialchars($_POST[imgtclr]).'@#@'.htmlspecialchars($_POST[imgtitle]).'@#@'.htmlspecialchars($_POST[popupfile]).'@#@'.$tm.'@#@'.htmlspecialchars($_POST[altn]).'@#@'.htmlspecialchars($_POST[imgtitles]).'@#@'.htmlspecialchars($_POST[infotitle]).'@#@'.htmlspecialchars($_POST[datatitle]).'@#@'.htmlspecialchars($_POST[clrdatatitle]).'@#@'.htmlspecialchars($_POST[qrtitle]).'@#@'.htmlspecialchars($_POST[mlelftitle]).'@#@'.htmlspecialchars($_POST[mlergtitle]).'@#@'.htmlspecialchars($_POST[qrpopbg]).'@#@'.htmlspecialchars($_POST[mmvpopbg]).'@#@'.htmlspecialchars($_POST[mmvtitle]).'@#@'.htmlspecialchars($_POST[push]).'data!-->';
			
			if($_POST[imgtitles] and preg_match('/^[0-9]*$/',$_POST[imgtitles])){$imgtitlehgt = 'data-hgt="'.$_POST[imgtitles].'"';}else{$imgtitlehgt = '';}
			
			if(strpos($_POST[imgtitle],'[copy]')!==false){
				$copyhtm = explode('[copy]',$_POST[imgtitle]);				
				$copyhtml = file_get_contents('../panel/'.$roww[pjnbr].'/'.htmlspecialchars($copyhtm[0]));
				if(strpos($copyhtml,'<script')!==false or strpos($copyhtml,'DOCTYPE')!==false or strpos($copyhtml,'<body')!==false or strpos($copyhtml,'data-role="page"')!==false){$copyhtml = '';echo '<script>alert("';if($_SESSION[tn]==PRC){echo '文件不合格式。';}else if($_SESSION[tn]==EN){echo 'Not proper format for the document.';}else{echo '文件不合格式。';} echo '"</script>';}
				if($_POST[imgtbg]){$imgtbgstyle = 'background-color:'.htmlspecialchars($_POST[imgtbg]).';';}else{$imgtbgstyle = '';}
				if($_POST[imgtclr]){$imgtclrstyle = 'color:'.htmlspecialchars($_POST[imgtclr]).';';}else{$imgtclrstyle = '';}
				if($imgtitlehgt){
				$copystyle = 'style="overflow-y:auto;padding-top:5px;padding-bottom:5px;'.$imgtbgstyle.$imgtclrstyle.'" '.$imgtitlehgt.' class="'.$pj.$ap.'formtxt ui-grid-solo"';}
				else{$copystyle = 'style="padding-top:5px;padding-bottom:5px;'.$imgtbgstyle.$imgtclrstyle.'" class="imgtitlehgt ui-grid-solo"';}
				$popups .= '<div '.$copystyle.'>'.file_get_contents('../panel/'.$roww[pjnbr].'/'.htmlspecialchars($copyhtm[0])).'</div>';
			;}else if($_POST[imgtitle]=='[hr]'){
				$popups .= '<div class="imgtitlehgt ui-grid-solo" '.$imgtitlehgt.'><!--formhr!--><hr></div>';
			;}else if($_POST[imgtitle]=='[br]'){
				$popups .= '<div class="imgtitlehgt ui-grid-solo" '.$imgtitlehgt.'><!--formbr!--><br></div>';	
			;}else{
				if($_POST[req])$formtitle = 'id="'.$pj.$ap.'formtitle'.$pn.'n'.$tm.'"';
				if(strpos($_POST[imgtitle],'[wday]')!==false)$wday=1;
				if($_POST[imgtbg]){$imgtbgstyle = 'background-color:'.htmlspecialchars($_POST[imgtbg]).';';}else{$imgtbgstyle = '';}
				if($_POST[imgtclr]){$imgtclrstyle = 'color:'.htmlspecialchars($_POST[imgtclr]).';';}else{$imgtclrstyle = '';}
			$popups .= '<div '.$formtitle.' class="imgtitlehgt ui-grid-solo" data-popup="'.htmlspecialchars($_POST[popupfile]).'" '.$imgtitlehgt.' style="padding-top:5px;padding-bottom:5px;'.$imgtbgstyle.$imgtclrstyle.'">'.str_replace('[wday]','',htmlspecialchars($_POST[imgtitle])).'</div>';
			}
			
			$tnbht = explode('<!--itemform!-->',$tbg[$i]);
			$tnbhtm = explode('<!--itemforms!-->',$tnbht[1]);


			if($_POST[imgtitles]){$nm = str_replace(' ','',htmlspecialchars($_POST[imgtitles]));}else{$nm = $pj.$ap.'webform'.$pn.'n'.$tm;}
			
			
			
			if($_POST[typ]=='data'){
				if($_POST[qrtitle]){$qrtitle=' ui-btn-icon-left">'.htmlspecialchars($_POST[qrtitle]);}else{$qrtitle=' ui-btn-icon-notext">';}
				
			if($_POST[qrpopbg]){$_POST[qrpopbg]=str_replace('/','',$_POST[qrpopbg]);$_POST[qrpopbg]=str_replace('\\','',$_POST[qrpopbg]);$_POST[qrpopbg]=str_replace('..','',$_POST[qrpopbg]);}
			
			if(strpos($_POST[qrpopbg],'http://')!==false or strpos($_POST[qrpopbg],'https://')!==false){$images = '';}else{$images = 'images/';}
			
			if(strpos($_POST[qrpopbg],'#')!==false or strpos($_POST[qrpopbg],'rgba(')!==false  or strpos($_POST[qrpopbg],'rgb(')!==false){$qrpopbghtml = 'background-color:'.htmlspecialchars($_POST[qrpopbg]).';';}
			else if(strpos($_POST[qrpopbg],'[xy]')!==false){$qrpopbghtml = 'background-image:url('.$images.htmlspecialchars($_POST[qrpopbg]).');';}
			else{$qrpopbghtml = 'background-image:url('.$images.htmlspecialchars($_POST[qrpopbg]).');background-size:100%;background-repeat:repeat-y;';}
	
			if($_POST[qrpopbg]){$qrpopbgstyle = 'style="'.$qrpopbghtml.'padding:5px;height: 100%;width: 100%;top:0;left:-15px;"';}else{$qrpopbgstyle = 'style="padding:5px;height: 100%;width: 100%;top:0;left:-15px;"';}
			
			$popups .= '<textarea name="'.$nm.'" data-corners="false" id="'.$pj.$ap.'form'.$pn.'n'.$tm.'" data-title="'.htmlspecialchars($_POST[imgtitle]).'" class="'.$pj.$ap.'webformdata'.$pn.' webformdata" placeholder="" readonly="readonly"></textarea>&nbsp;&nbsp;<a href="#'.$pj.$ap.'mleqr'.$pn.'n'.$tm.'" data-corners="false" data-rel="popup" class="'.$pj.$ap.'mleqr'.$pn.'n'.$tm.' '.$pj.$ap.'mleqr'.$pn.' ui-btn ui-btn-w ui-btn-inline ui-icon-qr'.$qrtitle.'</a><div id="'.$pj.$ap.'mleqr'.$pn.'n'.$tm.'" data-corners="false" data-role="popup" '.$qrpopbgstyle.' data-theme="w" class="ifrwidthps"><a href="#" data-rel="back" class="popn ui-btn ui-btn-z ui-btn-icon-notext ui-icon-delete"></a><br><br><br><div class="'.$pj.$ap.'mleqr'.$pn.' webkitm" style="overflow-y:auto;overflow-x:hidden;"><div id="qr'.$pj.$ap.'mleqr'.$pn.'n'.$tm.'" style="padding:15px;"></div><BR><BR><div id="qr'.$pj.$ap.'mleqrn'.$pn.'n'.$tm.'" style="padding:15px;width:100%;color:black;"></div><BR><BR><div id="qr'.$pj.$ap.'mleqrs'.$pn.'n'.$tm.'" style="padding:15px;"></div><BR><BR><div id="qr'.$pj.$ap.'mleqrsn'.$pn.'n'.$tm.'" style="padding:15px;width:100%;color:black;"></div></div></div>&nbsp;&nbsp;&nbsp;&nbsp;
';
			
			;}else 	if($_POST[typ]=='input'){
			if($_POST[datatyp]=='date'){$datatyp = 'text';}else if($_POST[datatyp]=='number'){$datatyp = 'text';}else if($_POST[datatyp]){$datatyp = htmlspecialchars($_POST[datatyp]);}else{$datatyp = 'text';}
			if($_POST[datatyp]=='password')$auto = 'autocomplete="off"';
			//if($_POST[reg]){$pattern = 'pattern="'.htmlspecialchars($_POST[reg]).'"';}else{$pattern = '';}
			//if($_POST[regmessage]){$regmessage = ' title="'.htmlspecialchars($_POST[regmessage]).'"';}else{$regmessage = '';}		
			$popups .= '<input type="'.$datatyp.'" name="'.$nm.'" id="'.$pj.$ap.'form'.$pn.'n'.$tm.'" '.$pattern.$regmessage.' data-clear-btn="true" data-corners="false" placeholder="" value="" '.$auto.'>';
			if($wday)$wday=' data-wday="1"';
			if($_POST[datatyp]=='date')$popups .= '&nbsp;&nbsp;<a href="#'.$pj.$ap.'inptdate'.$pn.'" data-form="'.$pj.$ap.'form'.$pn.'n'.$tm.'" '.$wday.' data-rel="popup" data-transition="pop" data-corners="false" class="'.$pj.$ap.'datebtn'.$pn.' ui-btn ui-btn-w ui-btn-inline ui-btn-icon-notext ui-icon-calendar"></a>';
			;}else 	if($_POST[typ]=='textarea'){
			$popups .= '<textarea name="'.$nm.'" id="'.$pj.$ap.'form'.$pn.'n'.$tm.'"  data-corners="false" placeholder=""></textarea>';		
			;}else 	if($_POST[typ]=='single'){
			$popups .= '<textarea name="'.$nm.'" data-corners="false" id="'.$pj.$ap.'form'.$pn.'n'.$tm.'" placeholder="" readonly="readonly"></textarea>';
			;}else 	if($_POST[typ]=='multipln'){
			$popups.= '<textarea name="'.$nm.'" data-corners="false" id="'.$pj.$ap.'form'.$pn.'n'.$tm.'" data-title="'.str_replace('[wday]','',htmlspecialchars($_POST[imgtitle])).'" placeholder=""></textarea>';
			;}else 	if($_POST[typ]=='multiple'){
			
			
			if($_POST[qrtitle]){$qrtitle=' ui-btn-icon-left">'.htmlspecialchars($_POST[qrtitle]);}else{$qrtitle=' ui-btn-icon-notext">';}
			if($_POST[clrdatatitle]){$clrdatatitle=' ui-btn-icon-left">'.htmlspecialchars($_POST[clrdatatitle]);}else{$clrdatatitle=' ui-btn-icon-notext">';}
			if($_POST[mlelftitle]){$mlelftitle=' ui-btn-icon-left">'.htmlspecialchars($_POST[mlelftitle]);}else{$mlelftitle=' ui-btn-icon-notext">';}
			if($_POST[mlergtitle]){$mlergtitle=' ui-btn-icon-left">'.htmlspecialchars($_POST[mlergtitle]);}else{$mlergtitle=' ui-btn-icon-notext">';}
			
			if($_POST[mmvtitle]){$mmvtitle=' ui-btn-icon-left">'.htmlspecialchars($_POST[mmvtitle]);}else{$mmvtitle=' ui-btn-icon-notext">';}

			
			if($_POST[qrpopbg]){$_POST[qrpopbg]=str_replace('/','',$_POST[qrpopbg]);$_POST[qrpopbg]=str_replace('\\','',$_POST[qrpopbg]);$_POST[qrpopbg]=str_replace('..','',$_POST[qrpopbg]);}
			
			if(strpos($_POST[qrpopbg],'http://')!==false or strpos($_POST[qrpopbg],'https://')!==false){$images = '';}else{$images = 'images/';}
			
			if(strpos($_POST[qrpopbg],'#')!==false or strpos($_POST[qrpopbg],'rgba(')!==false  or strpos($_POST[qrpopbg],'rgb(')!==false){$qrpopbghtml = 'background-color:'.htmlspecialchars($_POST[qrpopbg]).';';}
			else if(strpos($_POST[qrpopbg],'[xy]')!==false){$qrpopbghtml = 'background-image:url('.$images.htmlspecialchars($_POST[qrpopbg]).');';}
			else{$qrpopbghtml = 'background-image:url('.$images.htmlspecialchars($_POST[qrpopbg]).');background-size:100%;background-repeat:repeat-y;';}
	
			if($_POST[qrpopbg]){$qrpopbgstyle = 'style="'.$qrpopbghtml.'padding:5px;height: 100%;width: 100%;top:0;left:-15px;"';}else{$qrpopbgstyle = 'style="padding:5px;height: 100%;width: 100%;top:0;left:-15px;"';}
			
			$popups.= '<textarea name="'.$nm.'" data-corners="false" id="'.$pj.$ap.'form'.$pn.'n'.$tm.'" data-title="'.str_replace('[wday]','',htmlspecialchars($_POST[imgtitle])).'" placeholder="" readonly="readonly"></textarea><div style="width:80%" class="multiplndiv" id="'.$pj.$ap.'multiple'.$pn.'n'.$tm.'"></div>
			&nbsp;&nbsp;<a href="#" data-popup="'.$pj.$ap.'mleqr'.$pn.'n'.$tm.'" data-corners="false" style="color:black" class="'.$pj.$ap.'mleqr'.$pn.'n'.$tm.' ui-btn ui-btn-w ui-btn-inline ui-icon-qr  ui-btn-icon-notext"></a><div id="'.$pj.$ap.'mleqr'.$pn.'n'.$tm.'" data-corners="false" data-role="popup" '.$qrpopbgstyle.' data-theme="w" class="ifrwidthps"><a href="#" data-rel="back" class="popn ui-btn ui-btn-z ui-btn-icon-notext ui-icon-delete"></a><br><br><br><div class="'.$pj.$ap.'mleqr'.$pn.' webkitm" style="overflow-y:auto;overflow-x:hidden;"><div id="qr'.$pj.$ap.'mleqr'.$pn.'n'.$tm.'" style="padding:15px;"></div><BR><BR><div id="qr'.$pj.$ap.'mleqrn'.$pn.'n'.$tm.'" style="padding:15px;width:100%;color:black;"></div><HR><div id="qr'.$pj.$ap.'mleqrs'.$pn.'n'.$tm.'" style="padding:15px;"></div><BR><BR><div id="qr'.$pj.$ap.'mleqrsn'.$pn.'n'.$tm.'" style="padding:15px;width:100%;color:black;"></div></div></div>&nbsp;&nbsp;&nbsp;&nbsp;
			<a href="#" data-corners="false" data-tm="'.$tm.'" style="color:black" class="'.$pj.$ap.'mlelft'.$pn.' ui-btn ui-btn-w ui-btn-inline ui-icon-carat-l'.$mlelftitle.'</a>
			<a href="#" data-corners="false" data-tm="'.$tm.'" style="color:black" class="'.$pj.$ap.'mlergt'.$pn.' ui-btn ui-btn-w ui-btn-inline ui-icon-carat-r'.$mlergtitle.'</a>
			<a href="#" data-corners="false" data-tm="'.$tm.'" style="color:black" class="'.$pj.$ap.'mmv'.$pn.' ui-btn ui-btn-w ui-btn-inline ui-icon-ddpick'.$mmvtitle.'</a>&nbsp;
			<a href="#" data-corners="false" data-tm="'.$tm.'" style="color:black" class="'.$pj.$ap.'mlerm'.$pn.' ui-btn ui-btn-w ui-btn-inline ui-icon-delete'.$clrdatatitle.'</a>
			<div class="ui-btn-solo" id="'.$pj.$ap.'formm'.$pn.'n'.$tm.'"></div>';
			;}else{
			$popups .= '<div></div>'; 
			}
			
			if($_POST[infotitle]){$infotitle = 'ui-btn-icon-left">'.htmlspecialchars($_POST[infotitle]);}else{$infotitle = 'ui-btn-icon-notext">';}
			if($_POST[datatitle]){$datatitle = 'ui-btn-icon-left">'.htmlspecialchars($_POST[datatitle]);}else{$datatitle = 'ui-btn-icon-notext">';}

			
			if($_POST[popupfile])$popups .= '&nbsp;&nbsp;<a href="#" data-pop="'.$pj.$ap.'" data-url="'.$imgs.htmlspecialchars(trim($_POST[popupfile])).'" data-corners="false" class="imgspop ui-btn ui-btn-w ui-btn-inline ui-icon-info '.$infotitle.'</a>';
			
			
			if(strpos($_POST[qrpopbg],'http://')!==false or strpos($_POST[qrpopbg],'https://')!==false){$images = '';}else{$images = 'images/';}
			

			if($_POST[dats])$popups .= '&nbsp;&nbsp;<a href="#'.$pj.$ap.'retrdtn'.$pn.'" data-tm="'.$tm.'" data-rel="popup" data-transition="pop" data-corners="false" class="'.$pj.$ap.'retrdtn'.$pn.' ui-btn ui-btn-w ui-btn-inline ui-icon-bullets '.$datatitle.'</a>';
			
			if($_POST[typ]=='single'){
				if($_POST[clrdatatitle]){$clrdatatitle=' ui-btn-icon-left">'.htmlspecialchars($_POST[clrdatatitle]);}else{$clrdatatitle=' ui-btn-icon-notext">';}
				$popups .= '&nbsp;&nbsp;&nbsp;<a href="#" data-corners="false" data-form="'.$pj.$ap.'form'.$pn.'n'.$tm.'" class="'.$pj.$ap.'mlserm'.$pn.' ui-btn ui-btn-w  ui-icon-delete ui-btn-inline'.$clrdatatitle.'</a>';
			;}
			
			$popups .= '<!--itemform!-->'.$tnbhtm[0].'<!--itemforms!-->';	
			
			if($_POST[embpgn]){
			  if(strpos($_POST[embpgn],'[inf]')!==false){
			  	$embpgn = explode('[inf]',$_POST[embpgn]); 
			 	if($embpgn[1]){$embpgnhtm = ' ui-btn-icon-left" data-url="'.htmlspecialchars(trim($embpgn[2])).'" data-pop="'.$pj.$ap.'">'.htmlspecialchars($embpgn[1]);}
				else{$embpgnhtm = ' ui-btn-icon-notext" data-url="'.htmlspecialchars(trim($embpgn[2])).'" data-pop="'.$pj.$ap.'">';}	
				$_POST[embpgn] = $embpgn[0];
			  }else{$embpgnhtm = '';}	
			  
			  
			  if(strpos($_POST[embpgn],'.html')!==false){$stuh = '';}else{$stuh = '';}
			  $popups .= '<div class="ui-grid-solo" style="overflow-x:hidden;overflow-y:auto;'.$stuh.'position:relative;" id="'.$pj.$ap.'ifrform'.$pn.'n'.$tm.'">';
			  if($embpgnhtm)$popups .= '<a href="#" style="position:absolute;top:0;left:1%" class="imgspop ui-btn ui-btn-x ui-icon-popup'.$embpgnhtm.'</a>';
			  if(strpos($_POST[embpgn],'.html')!==false){
				$popups .= '<iframe src="'.htmlspecialchars($_POST[embpgn]).'" style="width:100%" seamless frameBorder="0"></iframe>';	
			  }else{	
				if(strpos($_POST[embpgn],'http://')!==false or strpos($_POST[embpgn],'https://')!==false){$images = '';}else{$images = 'images/';}
				$popups .= '<img style="width:100%" src="'.$images.htmlspecialchars($_POST[embpgn]).'"/>';	
			  ;}
			  $popups .= '</div>';
			;}

			
			}
		else{$popups .= '<!--item!-->'.$tbg[$i];}
	;}
	

	$popup = '<div>'.$popups.'<!--addforms!--></div>';

}else if($_POST[imgtitle] and !$tm){
	$formshtml = str_replace('<!--sysformsys!-->','',$formshtml);
	$popup .= '<!--item!-->';
	
	$popup .= '<!--data'.htmlspecialchars($_POST[req]).'@#@'.htmlspecialchars($_POST[typ]).'@#@'.htmlspecialchars($_POST[datatyp]).'@#@'.$vndats.'@#@'.htmlspecialchars($_POST[reg]).'@#@'.htmlspecialchars($_POST[regmessage]).'@#@'.htmlspecialchars($_POST[embpgn]).'@#@'.htmlspecialchars($_POST[embhpgn]).'@#@'.htmlspecialchars($_POST[imgtbg]).'@#@'.htmlspecialchars($_POST[imgtclr]).'@#@'.htmlspecialchars($_POST[imgtitle]).'@#@'.htmlspecialchars($_POST[popupfile]).'@#@'.($formsnvlu+1).'@#@'.htmlspecialchars($_POST[altn]).'@#@'.htmlspecialchars($_POST[imgtitles]).'@#@'.htmlspecialchars($_POST[infotitle]).'@#@'.htmlspecialchars($_POST[datatitle]).'@#@'.htmlspecialchars($_POST[clrdatatitle]).'@#@'.htmlspecialchars($_POST[qrtitle]).'@#@'.htmlspecialchars($_POST[mlelftitle]).'@#@'.htmlspecialchars($_POST[mlergtitle]).'@#@'.htmlspecialchars($_POST[qrpopbg]).'data!-->';
		
	if(strpos($_POST[imgtitle],'[copy]')!==false){
	$copyhtm = explode('[copy]',$_POST[imgtitle]);
	$popup .= '<div style="padding:5px;" class="ui-grid-solo">'.file_get_contents('../panel/'.$roww[pjnbr].'/'.htmlspecialchars($copyhtm[0])).'</div>';
	;}else if($_POST[imgtitle]=='[hr]'){
	$popup .= '<!--formhr!--><hr>';
	;}else if($_POST[imgtitle]=='[br]'){
	$popup .= '<!--formbr!--><br>';	
	;}else{
		if($_POST[imgtbg]){$imgtbgstyle = 'background-color:'.htmlspecialchars($_POST[imgtbg]).';';}else{$imgtbgstyle = '';}
		if($_POST[imgtclr]){$imgtclrstyle = 'color:'.htmlspecialchars($_POST[imgtclr]).';';}else{$imgtclrstyle = '';}
	$popup .= '<div class="ui-grid-solo" data-popup="'.htmlspecialchars($_POST[popupfile]).'" style="padding-top:2px;padding-bottom:2px;'.$imgtbgstyle.$imgtclrstyle.'">'.htmlspecialchars($_POST[imgtitle]).'</div>';
	}




	if($_POST[typ]=='data'){
	$popup .= '<textarea name="'.$nm.'" data-corners="false" id="'.$pj.$ap.'form'.$pn.'n'.($formsnvlu+1).'" data-title="'.htmlspecialchars($_POST[imgtitle]).'" class="'.$pj.$ap.'webformdata'.$pn.' webformdata" placeholder="" readonly="readonly"></textarea>&nbsp;&nbsp;<a href="#'.$pj.$ap.'mleqr'.$pn.'n'.($formsnvlu+1).'" data-corners="false" data-rel="popup" class="'.$pj.$ap.'mleqr'.$pn.'n'.($formsnvlu+1).' '.$pj.$ap.'mleqr'.$pn.' ui-btn ui-btn-w ui-btn-inline ui-icon-qr'.$qrtitle.'</a><div id="'.$pj.$ap.'mleqr'.$pn.'n'.($formsnvlu+1).'" data-corners="false" data-role="popup" '.$qrpopbgstyle.' data-theme="w" class="ifrwidthps"><a href="#" data-rel="back" class="popn ui-btn ui-btn-z ui-btn-icon-notext ui-icon-delete"></a><br><br><br><div class="'.$pj.$ap.'mleqr'.$pn.' webkitm" style="overflow-y:auto;overflow-x:hidden;"><div id="qr'.$pj.$ap.'mleqr'.$pn.'n'.($formsnvlu+1).'" style="padding:15px;"></div><BR><BR><div id="qr'.$pj.$ap.'mleqrn'.$pn.'n'.($formsnvlu+1).'" style="padding:15px;width:100%;color:black;"></div><BR><BR><div id="qr'.$pj.$ap.'mleqrs'.$pn.'n'.($formsnvlu+1).'" style="padding:15px;"></div><BR><BR><div id="qr'.$pj.$ap.'mleqrsn'.$pn.'n'.($formsnvlu+1).'" style="padding:15px;width:100%;color:black;"></div></div></div>&nbsp;&nbsp;&nbsp;&nbsp;';
	;}else 	if($_POST[typ]=='input'){
	$popup .= '<input type="text" name="'.$pj.$ap.'webform'.$pn.'n'.($formsnvlu+1).'" id="'.$pj.$ap.'form'.$pn.'n'.($formsnvlu+1).'" data-clear-btn="true" data-corners="false" placeholder="" value="">';	
	;}else 	if($_POST[typ]=='textarea'){
	$popup .= '<textarea  name="'.$pj.$ap.'webform'.$pn.'n'.($formsnvlu+1).'" id="'.$pj.$ap.'form'.$pn.'n'.($formsnvlu+1).'" data-corners="false" placeholder=""></textarea>';
	;}else 	if($_POST[typ]=='single'){
	$popup .= '<textarea  name="'.$pj.$ap.'webform'.$pn.'n'.($formsnvlu+1).'" data-corners="false" id="'.$pj.$ap.'form'.$pn.'n'.($formsnvlu+1).'" placeholder="" readonly="readonly"></textarea>&nbsp;&nbsp;&nbsp;<a href="#" data-corners="false" data-form="'.$pj.$ap.'form'.$pn.'n'.($formsnvlu+1).'" class="'.$pj.$ap.'mlserm'.$pn.' ui-btn ui-btn-w  ui-icon-delete ui-btn-inline  ui-btn-icon-notext"></a>';
	;}else 	if($_POST[typ]=='multipln'){
	$popup .= '<textarea  name="'.$pj.$ap.'webform'.$pn.'n'.($formsnvlu+1).'" data-corners="false" id="'.$pj.$ap.'form'.$pn.'n'.($formsnvlu+1).'" placeholder=""></textarea>';
	;}else 	if($_POST[typ]=='multiple'){
	
	
	$popup .= '<textarea name="'.$pj.$ap.'webform'.$pn.'n'.($formsnvlu+1).'" data-corners="false" data-title="'.htmlspecialchars($_POST[imgtitle]).'" id="'.$pj.$ap.'form'.$pn.'n'.($formsnvlu+1).'" placeholder="" readonly="readonly"></textarea><div style="width:80%"  class="multiplndiv" id="'.$pj.$ap.'multiple'.$pn.'n'.($formsnvlu+1).'"></div>
			<a href="#" data-popup="'.$pj.$ap.'mleqr'.$pn.'n'.($formsnvlu+1).'" data-tm="'.($formsnvlu+1).'" style="color:black" class="'.$pj.$ap.'mleqr'.$pn.' ui-btn ui-btn-w ui-btn-inline ui-btn-icon-notext ui-icon-qr"></a><div id="'.$pj.$ap.'mleqr'.$pn.'n'.($formsnvlu+1).'" data-corners="false" data-role="popup"  data-theme="w" class="ifrwidthps"><a href="#" data-rel="back" class="popn ui-btn ui-btn-z ui-btn-icon-notext ui-icon-delete"></a><br><br><br><div class="'.$pj.$ap.'mleqr'.$pn.' webkitm" style="overflow-y:auto;overflow-x:hidden;"><div id="qr'.$pj.$ap.'mleqr'.$pn.'n'.($formsnvlu+1).'" style="padding:15px;"></div><BR><BR><div id="qr'.$pj.$ap.'mleqrn'.$pn.'n'.($formsnvlu+1).'" style="padding:15px;width:100%;color:black;"></div><HR><div id="qr'.$pj.$ap.'mleqrs'.$pn.'n'.($formsnvlu+1).'" style="padding:15px;"></div><BR><BR><div id="qr'.$pj.$ap.'mleqrsn'.$pn.'n'.($formsnvlu+1).'" style="padding:15px;width:100%;color:black;"></div></div></div>&nbsp;&nbsp;&nbsp;&nbsp;
			<a href="#" data-corners="false" data-tm="'.($formsnvlu+1).'" style="color:black"  class="'.$pj.$ap.'mlelft'.$pn.' ui-btn ui-btn-w ui-btn-inline ui-btn-icon-notext ui-icon-carat-l"></a>
			<a href="#" data-corners="false" data-tm="'.($formsnvlu+1).'" style="color:black"  class="'.$pj.$ap.'mlergt'.$pn.' ui-btn ui-btn-w ui-btn-inline ui-btn-icon-notext ui-icon-carat-r"></a>
			<a href="#" data-corners="false" data-tm="'.($formsnvlu+1).'" style="color:black" class="'.$pj.$ap.'mmv'.$pn.' ui-btn ui-btn-w ui-btn-inline ui-btn-icon-notext ui-icon-ddpick"></a>&nbsp;
			<a href="#" data-corners="false"  data-tm="'.($formsnvlu+1).'" style="color:black"  class="'.$pj.$ap.'mlerm'.$pn.' ui-btn ui-btn-w ui-btn-inline ui-btn-icon-notext ui-icon-delete"></a>
			<div class="ui-btn-solo" id="'.$pj.$ap.'form'.$pn.'n'.($formsnvlu+1).'"></div>';
	;}else{
	$popup .= '<div></div>';
	}	
	$popup .= '<!--itemform!--><!--itemforms!--><!--addforms!-->';

	if($formshtml){
	$popup = str_replace('<!--addforms!-->',$popup,$formshtml);
	}else{
	$popup = '<div>'.$popup.'</div>';
	}
}////if($_POST[dlt] and $owlnbr){


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


			if($_POST[parkbg]){$_POST[parkbg]=str_replace('/','',$_POST[parkbg]);
			$_POST[parkbg]=str_replace('\\','',$_POST[parkbg]);
			$_POST[parkbg]=str_replace('..','',$_POST[parkbg]);}
			
			if(strpos($_POST[parkbg],'http://')!==false or strpos($_POST[parkbg],'https://')!==false){$images = '';}else{$images = 'images/';}
			
			$bghtml='';
			if(strpos($_POST[parkbg],'#')!==false or strpos($_POST[parkbg],'rgba(')!==false  or strpos($_POST[parkbg],'rgb(')!==false){
			$bghtml = 'background-color:'.htmlspecialchars($_POST[parkbg]).';';}
			else if(strpos($_POST[parkbg],'[xy]')!==false){$bghtml = 'background-image:url('.$images.htmlspecialchars($_POST[parkbg]).');';}
			else if($_POST[parkbg]){$bghtml = 'background-image:url('.$images.htmlspecialchars($_POST[parkbg]).');background-size:100%;background-repeat:repeat-y;';}
			
			if($bghtml)$bghtmlstyle = ' style="'.$bghtml.'"';
			
			if($_POST[parkbg] or $_POST[formtyp] or $_POST[send] or $_POST[clr] or $_POST[sendmethod] or $_POST[sent] or $_POST[receive]){
			$bghtml = '<div class="ui-grid-solo" data-bg="'.htmlspecialchars($_POST[parkbg]).'@#@'.htmlspecialchars($_POST[formtyp]).'@#@'.htmlspecialchars($_POST[send]).'@#@'.htmlspecialchars($_POST[clr]).'@#@'.htmlspecialchars($_POST[sendmethod]).'@#@'.htmlspecialchars($_POST[sent]).'@#@'.htmlspecialchars($_POST[receive]).'@#@'.htmlspecialchars($_POST[receivingformat]).'@#@'.htmlspecialchars($_POST[subj]).'@#@'.htmlspecialchars($_POST[mmvpopinf]).'"'.$bghtml.'><!--parkbg!-->';
			$bghtmls = '<!--parkbg!--></div>';
			;}else{$bghtml = '';$bghtmls = '';}
			
			if($_POST[send]=='none'){$SENTh = '1';}else{$SENTh = '';}
			if($_POST[send]){$SENT = htmlspecialchars($_POST[send]);}else{$SENT = '&nbsp;';}
			if($_POST[clr]){if($_POST[clr]=='nbsp')$_POST[clr]='&nbsp;';if(!$SENTh)$CLEAR = '<div class="ui-block-b" style="width:35%"><input type="reset" value="'.htmlspecialchars($_POST[clr]).'" data-theme="w" data-icon="delete" data-corners="false" data-iconpos="top"></div></div>';$pert = '65';}else{$CLEAR = '</div>';$pert = '100';}
			
			if($_POST[push])$push = '<input type="hidden" name="pushios" class="pushios" value=""><input type="hidden" name="pushgcm" class="pushgcm" value="">';
			
			if($_POST[formtyp]=='fo' or $_POST[formtyp]=='st'){
			
			if(strpos($_POST[mmvpopbg],'#')!==false or strpos($_POST[mmvpopbg],'rgba(')!==false  or strpos($_POST[mmvpopbg],'rgb(')!==false){$mmvpopbghtml = 'background-color:'.htmlspecialchars($_POST[mmvpopbg]).';';}
			else if(strpos($_POST[mmvpopbg],'[xy]')!==false){$mmvpopbghtml = 'background-image:url('.$images.htmlspecialchars($_POST[mmvpopbg]).');';}
			else{$mmvpopbghtml = 'background-image:url('.$images.htmlspecialchars($_POST[mmvpopbg]).');background-size:100%;background-repeat:repeat-y;';}
	
			if($_POST[mmvpopbg]){$mmvpopbgstyle = 'style="'.$mmvpopbghtml.'padding:5px;height: 100%;width: 100%;top:0;left:-15px;"';}else{$mmvpopbgstyle = 'style="padding:5px;height: 100%;width: 100%;top:0;left:-15px;"';}
			
			if($_POST[mmvpopinf]){
				if($_POST[mmvpopinf] and strpos($_POST[mmvpopinf],'[inf]')!==false){
				$mmvpopin = explode('[inf]',$_POST[mmvpopinf]); 					
				$mmvpopinhtm = ' ui-btn-icon-left">'.htmlspecialchars($mmvpopin[1]);$_POST[mmvpopinf] = $mmvpopin[2];}
				else if($_POST[mmvpopinf]){$mmvpopinhtm = ' ui-btn-icon-left">';}		
					$_POST[mmvpopinf] = htmlspecialchars($_POST[mmvpopinf]);
				
				if(strpos($_POST[mmvpopinf],'http://')!==false or strpos($_POST[mmvpopinf],'https://')!==false){$images = '';}
				else if(strpos($_POST[mmvpopinf],'.html')!==false){$images = '';}
				else{$images = 'images/';}	
				
				$mmvpopinhtm = '<a href="#" data-pop="'.$pj.$ap.'" data-url="'.$images.trim($_POST[mmvpopinf]).'" data-popuptm="1" data-popup="'.$pj.$ap.'retrdtn'.$pn.'" class="imgspop ui-btn ui-btn-x ui-btn-inline ui-icon-info'.$mmvpopinhtm.'</a>';
			}
			
			
				$form =	'<div id="'.$pj.$ap.'inptdate'.$pn.'" data-role="popup" data-theme="f" data-corners="false" style="min-width:285px" class="ui-content"><a href="#" data-rel="back" class="popn ui-btn ui-btn-z ui-btn-icon-notext ui-icon-delete"></a><BR><a href="#" data-corners="false" class="ui-btn ui-btn-w ui-btn-inline ui-btn-icon-notext ui-icon-plus"></a> YYYYY <a href="#" data-corners="false" class="ui-btn ui-btn-w ui-btn-inline ui-btn-icon-notext ui-icon-minus"></a><BR><a href="#" data-corners="false" class="ui-btn ui-btn-w ui-btn-inline ui-btn-icon-notext ui-icon-plus"></a> MM <a href="#" data-corners="false" class="ui-btn ui-btn-w ui-btn-inline ui-btn-icon-notext ui-icon-minus"></a><BR><a href="#" data-corners="false" class="ui-btn ui-btn-w ui-btn-inline ui-btn-icon-notext ui-icon-plus"></a> DD <a href="#" data-corners="false" class="ui-btn ui-btn-w ui-btn-inline ui-btn-icon-notext ui-icon-minus"></a><BR><a href="#" data-corners="false" style="color:pink" class="ui-btn ui-btn-x ui-btn-icon-right ui-icon-edit"></a>
<div id="'.$pj.$ap.'inptdatewday'.$pn.'" style="color:pink"></div><a href="#" data-corners="false" class="ui-btn ui-btn-w ui-btn-inline ui-btn-icon-notext ui-icon-plus"></a> ?h <a href="#" data-corners="false" class="ui-btn ui-btn-w ui-btn-inline ui-btn-icon-notext ui-icon-minus"></a> hh<BR><a href="#" data-corners="false" class="ui-btn ui-btn-w ui-btn-inline ui-btn-icon-notext ui-icon-plus"></a> h? <a href="#" data-corners="false" class="ui-btn ui-btn-w ui-btn-inline ui-btn-icon-notext ui-icon-minus"></a> hh<BR><a href="#" data-corners="false" class="ui-btn ui-btn-w ui-btn-inline ui-btn-icon-notext ui-icon-plus"></a> ?m <a href="#" data-corners="false" class="ui-btn ui-btn-w ui-btn-inline ui-btn-icon-notext ui-icon-minus"></a> mm<BR><a href="#" data-corners="false" class="ui-btn ui-btn-w ui-btn-inline ui-btn-icon-notext ui-icon-plus"></a> m? <a href="#" data-corners="false" class="ui-btn ui-btn-w ui-btn-inline ui-btn-icon-notext ui-icon-minus"></a> mm<BR><a href="#" data-corners="false" style="color:pink" class="ui-btn ui-btn-x ui-btn-icon-right ui-icon-edit"></a><div id="'.$pj.$ap.'inptpAMAM'.$pn.'" style="color:pink"></div><div id="'.$pj.$ap.'inptpPMPM'.$pn.'" style="color:pink;"></div></div>
				
				<div id="'.$pj.$ap.'retrdtn'.$pn.'" data-theme="w" data-tm="" data-role="popup" data-corners="false" '.$mmvpopbgstyle.' class="ifrwidthps"><a href="#" data-rel="back" class="popn ui-btn ui-btn-z ui-btn-icon-notext ui-icon-delete"></a><BR><BR><div id="'.$pj.$ap.'ddretrdtns'.$pn.'" style="overflow-y:auto;" class="webkitm"><div class="'.$pj.$ap.'ddretrdtn'.$pn.'" style="padding:5px;display:none">'.$mmvpopinhtm.'<div class="dd" id="'.$pj.$ap.'ddretrdtn'.$pn.'" data-tm="" style="overflow-y:auto;padding:5px;"></div></div><div class="'.$pj.$ap.'ddretrdtn'.$pn.'" style="padding:5px;width:80%"><br><br><ul id="'.$pj.$ap.'retrdata'.$pn.'" data-corners="false" data-role="listview" style="overflow-y:auto;" data-inset="true" data-filter="true"></ul></div></div></div>';
				$form .=	'<FORM name="'.$pj.$ap.'form'.$pn.'" id="'.$pj.$ap.'form'.$pn.'" style="padding-left:5px;padding-right:5px;">';
				if($_POST[formtyp]=='fo' and !$SENTh)$formn =	'<div class="ui-grid-a"><div class="ui-block-a" style="width:'.$pert.'%"><input type="button" id="'.$pj.$ap.'formbtn'.$pn.'" data-theme="w" data-icon="mail" data-corners="false" data-iconpos="top" value="'.$SENT.'"></div>'.$CLEAR;
				if($_POST[formtyp]=='fo')$formn .=	$push.'</FORM><div id="'.$pj.$ap.'alrtsform'.$pn.'" style="min-width:285px;" data-theme="w" data-corners="false" data-role="popup" data-dismissible="false">
        <a href="#" data-rel="back" class="popn ui-btn ui-btn-z ui-btn-icon-notext ui-icon-delete"></a><br><div id="'.$pj.$ap.'alrtform'.$pn.'" class="ui-content" style="color:black;font-weight:bolder;"></div></div>';				
			;}else if($_POST[formtyp]=='th'){
				$formn = '<div class="ui-grid-a"><div class="ui-block-a" style="width:'.$pert.'%"><input type="button" id="'.$pj.$ap.'formbtn'.$pn.'" data-theme="w" data-icon="mail" data-corners="false" data-iconpos="top" value="'.$SENT.'"></div>'.$CLEAR.$push.'</FORM><div id="'.$pj.$ap.'alrtsform'.$pn.'" style="min-width:285px;" data-corners="false" data-role="popup" data-dismissible="false">
        <a href="#" data-rel="back" class="popn ui-btn ui-btn-z ui-btn-icon-notext ui-icon-delete"></a><br><div id="'.$pj.$ap.'alrtform'.$pn.'" class="ui-content"></div></div>';				
			;}

				if($bvtns == 1){
					$vnts  = '<div class="swiper-slide"><div id="'.$pj.$ap.'vnts'.$pn.'" class="vntsns vtnn">';
				;}else if($bvtns == 5){
					$vntsn  = '</div></div><!--vnts!-->';
				;}else if($bvtns == 6){
					$vnts  = '';$vntsn  = '';
				;}else{
					$vnts  = '<div class="swiper-slide"><div id="'.$pj.$ap.'vnts'.$pn.'" class="vntsns vtnn">';$vntsn  = '</div></div><!--vnts!-->';
				;}
			if($tabnbgdatn[0]){$tabnbgdatns = '<!--data-tabnbg'.$tabnbgdatn[0].'data-tabnbg!-->';}else{$tabnbgdatns = '<!--data-tabnbg@@@@@@@@@data-tabnbg!-->';}	
			$webpopup .= $html.'<!--part'.$pn.'!--><!--sysformsys!-->'.$vnts.$form.$bghtml.$popup.$formn.$bghtmls.$vntsn.$tabnbgdatns.$htmls;
			$webpopup .= '</div><!--content!--></div><!--page!-->';
					
			$fpagtrns='../panel/'.$roww[pjnbr].'/'.$ap.'.html';
			file_put_contents($fpagtrns,$html.'<!--part'.$pn.'!--><!--sysformsys!-->'.$vnts.$form.$bghtml.$popup.$formn.$bghtmls.$vntsn.$tabnbgdatns.$htmls);
	 	
			
			$fpagtrns='../panel/'.$roww[pjnbr].'/web'.$ap.'.html';
			file_put_contents($fpagtrns,$webpopup);

			if($fpagtrns){			
			$fpagtrns = file_get_contents('../panel/'.$roww[pjnbr].'/'.$ap.'.html');
			
			$htm = explode('<!--part',$fpagtrns);
			$pntag = '<!--part'.$pn.'!-->';
				for($i=1;$i<sizeof($htm);$i++){
					if(strpos('<!--part'.$htm[$i],$pntag)===false and !$formshtml){$html .= '<!--part'.$htm[$i];}
					else if(strpos('<!--part'.$htm[$i],$pntag)!==false){$formshtml  = str_replace($pntag,'','<!--part'.$htm[$i]);}
					else{$htmls .= '<!--part'.$htm[$i];}
				;}
			
				
			$tbg = explode('<!--item!-->',$formshtml);
		
			for($i=1;$i<sizeof($tbg);$i++){
			
			$tbgnvlu = explode('<!--data',$tbg[$i]);
			$tbgsvlu = explode('data!-->',$tbgnvlu[1]);
			$tbgvlu = explode('@#@',$tbgsvlu[0]);
			
			
			$reqvlu[$i] = $tbgvlu[0];
			$typvlu[$i] = $tbgvlu[1];	 if($typvlu[$i]=='multiple' and !$multiple)$multiple = 1;
			$datatypvlu[$i] = $tbgvlu[2]; 
			$datsvlu[$i] = $tbgvlu[3]; 	//if($datsvlu[$i] and !$datsvluvlu)$datsvluvlu=1;
			$slfreqvlu[$i] = $tbgvlu[4]; 
			$regmesvlu[$i] = $tbgvlu[5]; 	
			$embpgnvlu[$i] = $tbgvlu[6]; 	
			$embhpgnvlu[$i] = $tbgvlu[7]; 
			//$imgtbgvlu[$i] = $tbgvlu[8];
			//$imgtclrvlu[$i] = $tbgvlu[9];
			$titlevlu[$i] = $tbgvlu[10];    if(strpos($titlevlu[$i],'[copy]')!==false and strlen($titlevlu[$i]) < 35)$formtxtcopy++;
			//$popupvlu[$i] = $tbgvlu[11]; 	if($popupvlu[$i] and !$popupvluvlu)$popupvluvlu=1;			
			$tmnvlu[$i] = $tbgvlu[12];  if($tmnvlu[$i] > $formsnvlu or !$formsnvlu)$formsnvlu = $tmnvlu[$i];
			$altsvlu[$i] = $tbgvlu[13];
			//$imgtitlesvlu[$i] = $tbgvlu[14];			
			//$infotitlevlu[$i] = $tbgvlu[15];
			//$datatitlevlu[$i] = $tbgvlu[16];
			//$clrdatatitlevlu[$i] = $tbgvlu[17];
			//$qrtitlevlu[$i] = $tbgvlu[18];
			//$mlelftitle[$i] = $tbgvlu[19];
			//$mlergtitle[$i] = $tbgvlu[20];
			//$qrpopbg[$i] = $tbgvlu[21];
			//$mmvpopbg[$i] = $tbgvlu[22];
			//$mmvdatatitle[$i] = $tbgvlu[23];
			//$mmvpopin[$i] = $tbgvlu[24];
			
						if($typvlu[$i]!='info'){						
						if($i==1){if($datatypvlu[$i]=='password'){$wvdatn .= '""';}else{$wvdatn .= ',"'.htmlspecialchars($tmnvlu[$i]).'"';};}
						else{if($datatypvlu[$i]=='password'){$wvdatn .= ',""';}else{$wvdatn .= ',"'.htmlspecialchars($tmnvlu[$i]).'"';};}
						;}
			;}
			
			$guanyin=rand();
						
				for($i=1;$i<sizeof($tbg);$i++){					
						if($typvlu[$i]!='info'){
						$reqsvluhts .= ',"'.htmlspecialchars($reqvlu[$i]).'"';							
						$alt .= ',"'.htmlspecialchars($altsvlu[$i]).'"';}
						
						if($slfreqvlu[$i] or $datatypvlu[$i]=='date' or $datatypvlu[$i]=='email' or $datatypvlu[$i]=='number'){
									
								if($slfreqvlu[$i]){
									$reg = htmlspecialchars($slfreqvlu[$i]);
								}else if($datatypvlu[$i]=='date'){
									$reg = '/([0-9]{3}[1-9]|[0-9]{2}[1-9][0-9]{1}|[0-9]{1}[1-9][0-9]{2}|[1-9][0-9]{3})-(((0[13578]|1[02])-(0[1-9]|[12][0-9]|3[01]))|((0[469]|11)-(0[1-9]|[12][0-9]|30))|(02-(0[1-9]|[1][0-9]|2[0-8])))/';
								}else if($datatypvlu[$i]=='email'){
									$reg = "/[\w!#$%&'*+/=?^_`{|}~-]+(?:\.[\w!#$%&'*+/=?^_`{|}~-]+)*@(?:[\w](?:[\w-]*[\w])?\.)+[\w](?:[\w-]*[\w])?/";
								}else if($datatypvlu[$i]=='number'){
									$reg = '/^[0-9]*$/';
								}
						$regjs .= 'var $formn = $("#'.$pj.$ap.'form'.$pn.'n'.$tmnvlu[$i].'");var formvlu =  $formn.val();if(formvlu){if(!'.$reg.'.test(formvlu)){$("html, body").animate({scrollTop:$formn.offset().top}, 800, function(){';
								if($regmesvlu[$i]){
								$regjs .= 'var $'.$pj.$ap.'alrtform'.$pn.' = $("#'.$pj.$ap.'alrtform'.$pn.'");$'.$pj.$ap.'alrtform'.$pn.'.html("'.htmlspecialchars($regmesvlu[$i]).'");$'.$pj.$ap.'alrtform'.$pn.'.popup("open");$'.$pj.$ap.'alrtform'.$pn.'.popup({afterclose: function( event, ui ){ $formn.focus(); }});';
								;}else{
								$regjs .= ' $formn.focus();';
								;}
								$regjs .= '});return false;};};'; 
								
					   }
				  
				  //_____________________________________
				  
				  		if($typvlu[$i]=='multiple'){$tbgtypvlu = 'form';$htmlpj= '';}else if($typvlu[$i]=='data' and !$htmlpjs){$tbgtypvlu = 'form';$htmlpj=$tmnvlu[$i];$htmlpjs=1;}else{$tbgtypvlu = '';}
						
						//if($htmlpj and $tbgtypvlu)$datjs = ';var htmlpj'.$guanyin.' = window.location.href.split("v=");if(htmlpj'.$guanyin.'[1]){var datapgn'.$guanyin.' = localStorage.getItem(htmlpj'.$guanyin.'[1]);if(datapgn'.$guanyin.')$("#'.$pj.$ap.'form'.$pn.'n'.$htmlpj.'").val(datapgn'.$guanyin.');};';
						if($htmlpj and $tbgtypvlu)$datjs = ';/*window.addEventListener("message",function(event){document.getElementById("'.$pj.$ap.'form'.$pn.'n'.$htmlpj.'").value  = event.data;$("#'.$pj.$ap.'form'.$pn.'n'.$htmlpj.'").textinput("refresh");},false);*/;';	
						if($tbgtypvlu){$qrjs .= ';$(".'.$pj.$ap.'mleqr'.$pn.'n'.$tmnvlu[$i].'").click(function (){var qrsvlu = $("#'.$pj.$ap.'form'.$pn.'n'.$tmnvlu[$i].'").val();var qrstitlevlu = $("#'.$pj.$ap.'form'.$pn.'n'.$tmnvlu[$i].'").attr("data-title");var $qrmleqn = $("#qr'.$pj.$ap.'mleqr'.$pn.'n'.$tmnvlu[$i].'");/*$.ajax({type:"POST",url:your php,data:{\'qrpbigdata\':qrsvlu},cache:false});*/if(qrsvlu){$qrmleqn.html("").qrcode({"render": "div","background":"white","size":180,"fill":"#000000","quiet": 1,"text":qrutf(qrsvlu)}); $("#qr'.$pj.$ap.'mleqrn'.$pn.'n'.$tmnvlu[$i].'").html(qrsvlu);$("#qr'.$pj.$ap.'mleqrsn'.$pn.'n'.$tmnvlu[$i].'").html(qrstitlevlu+"<br>"+qrsvlu); $("#qr'.$pj.$ap.'mleqrs'.$pn.'n'.$tmnvlu[$i].'").html("").qrcode({"render": "div","background":"white","size":180,"fill":"#000000","quiet": 1,"text":qrutf(qrstitlevlu+\'\r\n\'+qrsvlu)});$("#"+$(this).attr("data-popup")).popup("open");};});';	
						}		
				  //_____________________________________
				  
				  	if($typvlu[$i]!='info'){
								if($datatypvlu[$i]=='password')$datsvlu[$i]='';
								if($i==1){$wvdats .= '"'.htmlspecialchars($datsvlu[$i]).'"';}
								else{$wvdats .= ',"'.htmlspecialchars($datsvlu[$i]).'"';}
					;}				
				  //_____________________________________
				  			if(strpos($embpgnvlu[$i],'.html')!==false){$iframe = '.find("iframe")';}else{$iframe = '';}
							if($embhpgnvlu[$i]){$ifrform .= ';$("#'.$pj.$ap.'ifrform'.$pn.'n'.$tmnvlu[$i].'")'.$iframe.'.height(hgtifr'.$guanyin.'*'.($embhpgnvlu[$i]/100).');';$ifrformn = 1;}
				 ;}	
				if($reqsvluhts){
					$reqsvluhts = '['.$reqsvluhts.']';$reqsvluhts = str_replace('[,','[',$reqsvluhts);
					$alt = '['.$alt.']';$alt = str_replace('[,','[',$alt);
				}
						
							
				if(file_exists('../panel/'.$roww[pjnbr].'/web'.$ap.'.js')){
				$jsweb = file_get_contents('../panel/'.$roww[pjnbr].'/web'.$ap.'.js');
										
					if($_POST[formtypn])$_POST[formtyp] = $_POST[formtypn];
					if($_POST[sendn])$_POST[send] = $_POST[sendn];
					if(($_POST[formtyp]=='fo' or $_POST[formtyp]=='st') and $_POST[receive] and $_POST[send]!='none'){
						if($wvdats){$wdats = '['.$wvdats.']';$wdats = str_replace('[,','[',$wdats);}else{$wdats ='""';}
						if($wvdatn){$wdatn = '['.$wvdatn.']';$wdatn = str_replace('[,','[',$wdatn);}else{$wdatn ='""';}
						if(!$reqsvluhts){$reqsvluhts='""';$alt='""';}
						if($_POST[sendmethod]=='internet'){
						if(!$reqsvluhts)$reqsvluhts='""';if(!$alt)$alt='""';if(!$_POST[receivingformat])$_POST[receivingformat]='""';
						$sendjs = '$("#'.$pj.$ap.'formbtn'.$pn.'").click(function(){
						'.$regjs.'
						;form("'.$pj.$ap.'","'.$pn.'","","'.htmlspecialchars($_POST[receive]).'","","'.htmlspecialchars($_POST[sent]).'","",'.$wdats.','.$wdatn.','.$reqsvluhts.','.$alt.','.htmlspecialchars($_POST[receivingformat]).');
						});';
						
						
						}else{
						if(!$wdatn)$wdatn='""';if(!$wdats)$wdats='""';if(!$reqsvluhts)$reqsvluhts='""';if(!$alt)$alt='""';if(!$_POST[receivingformat])$_POST[receivingformat]='""';
						$sendjs = ';if(document.URL.indexOf("http://") === -1 && document.URL.indexOf("https://") === -1){
						document.addEventListener("deviceready", function () {
						cordova.plugins.email.isAvailable(
						function (isAvailable) {
						if(!isAvailable)alert("Mail APP is not found in your device.您的设备未有合用的电邮应用!");});
						$("#'.$pj.$ap.'formbtn'.$pn.'").click(function() {
						'.$regjs.'
						;gapform("'.$pj.$ap.'","'.$pn.'","","'.htmlspecialchars($_POST[receive]).'","","'.htmlspecialchars($_POST[sent]).'","",'.$wdats.','.$wdatn.',"'.htmlspecialchars($_POST[subj]).'",'.$reqsvluhts.','.$alt.','.htmlspecialchars($_POST[receivingformat]).');						
						});}, false);
						}else{
						$("#'.$pj.$ap.'formbtn'.$pn.'").click(function(){
						'.$regjs.'
						;form("'.$pj.$ap.'","'.$pn.'","","'.htmlspecialchars($_POST[receive]).'","","'.htmlspecialchars($_POST[sent]).'","",'.$wdats.','.$wdatn.','.$reqsvluhts.','.$alt.','.htmlspecialchars($_POST[receivingformat]).');
						});};';
						}
					;}
								

					
					//if($ifrformn)$ifrform .=  ';$("#'.$pj.$ap.'ifrform'.$pn.'n'.$tm.'").niceScroll({boxzoom:true,touchbehavior:true,bouncescroll:true});';
					
					if($ifrform)$ifrform = ';var hgtifr'.$guanyin.' = windowHeight'.$ifrform;
				
					if(!$ifrform)$hgtifr = ';var hgtifr'.$guanyin.' = windowHeight';
					if($formtxtcopy==1){$ifrform = ';'.$hgtifr.'$'.$pj.$ap.'formtxt = $(".'.$pj.$ap.'formtxt");$'.$pj.$ap.'formtxt.height(hgtifr'.$guanyin.'*$'.$pj.$ap.'formtxt.attr("data-hgt")/100);'.$ifrform;}
					else if($formtxtcopy){$ifrform = ';'.$hgtifr.'$(".'.$pj.$ap.'formtxt").each(function(){var $this=$(this);$this.height(hgtifr'.$guanyin.'*$this.attr("data-hgt")/100);});'.$ifrform;}
					
					if($multiple)$ifrform .= ';$("#'.$pj.$ap.'ddretrdtn'.$pn.'").nest();';
					
					
				if(!$wdatn)$wdatn='""';
				$jswebs=explode('/*webjs'.$pn.'*/',$jsweb);
				$jsweb = $jswebs[0].$jswebs[2];
				$js = '/*webjs'.$pn.'*/'
				.$ifrform.$datjs
				.$qrjs
				.';webform("'.$pj.$ap.'","'.$pn.'",'.$wdatn.',windowHeight);'
				.$sendjs
				.'/*webjs'.$pn.'*/'
				.'/*});*/';
				$jsweb=str_replace('/*});*/',$js,$jsweb);
				file_put_contents('../panel/'.$roww[pjnbr].'/web'.$ap.'.js',$jsweb);
				
				;}
			
			
			;}
			
			

	
			if(!file_exists('../panel/'.$roww[pjnbr].'/web'.$ap.'.js')){
			$fpagtrns='../panel/'.$roww[pjnbr].'/web'.$ap.'.js';
			$js = '/*$(document).on(\'pageshow\', \'#web'.$ap.'\', function(){*/';
			$js .= '/*webjs'.$pn.'*/webform("'.$pj.$ap.'","'.$pn.'","",windowHeight);/*webjs'.$pn.'*/';
			$js .= '/*});*/';
			file_put_contents($fpagtrns,$js);			
			;}
			
			if($tms)$tm = $tms;
	if(($_POST['ord']==' ' or !$_POST['ord']) and !$_POST[dlt])$tmp = '&tm='.htmlspecialchars($tm);
	echo "<meta http-equiv='refresh' content='0;URL=form.php?ap=".htmlspecialchars($roww[ap])."&pj=".htmlspecialchars($roww[pjnbr])."&pn=".htmlspecialchars($pn).$tmp."'>";
;}

?>
	
