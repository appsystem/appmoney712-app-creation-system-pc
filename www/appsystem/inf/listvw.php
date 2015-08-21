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
if($_GET[tp] and !preg_match('/^[0-9]*$/',$_GET[tp]))exit; 
if($_GET[tp])$tp = $_GET[tp];
if($_GET[sn] and $_GET[sn]!=1)exit;
if($_GET[sn])$sn = 1;
if($_GET[nbrbtn])$nbrbtn = 1;

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
    <title><?php if($_SESSION[tn]==PRC){echo 'popup选项 - AppMoney712 移动应用设计系统';}else if($_SESSION[tn]==EN){echo 'Option button - AppMoney712 APP Creation System';}else{echo 'popup選項 - AppMoney712 移動應用設計系統';}?></title>
	<link href="../css/jquery.mobile-1.4.4.min.css" rel="stylesheet">
	<link href="../css/jquerymobile-1.4.4.min.css" rel="stylesheet">
	<link href="../css/icons/style.css" rel="stylesheet">
	<style type="text/css">
		.ifrwidthps{overflow:hidden;}
		@media(-webkit-min-device-pixel-ratio: 2),(min-resolution: 192dpi){.xkn{height:3px;}}
		@media(-webkit-min-device-pixel-ratio: 3),(min-resolution: 192dpi){.xkn{height:3px;}}
		@media all and (min-width: 1250px){.playd{font-size:88px;}.playdw{font-size:144px;}}
		@media all and (min-width: 1020px) and (max-width: 1250px){.playd{font-size:66px;}.playdw{font-size:108px;}}
		@media all and (min-width: 768px) and (max-width: 1020px){.playd{font-size:44px;}.playdw{font-size:72px;}}
		@media all and (min-width: 601px) and (max-width: 768px){.playd{font-size:33px;}.playdw{font-size:54px;}}
		@media all and (min-width: 321px) and (max-width: 600px){.playd{font-size:28px;}.playdw{font-size:36px;}}
		@media all and (max-width: 320px){.playd{font-size:22px;}.playdw{font-size:26px;}}
		.popifr{position:absolute;top:0%;left:0%;index-z:2;}.popn{position:absolute;top:0%;right:0%;index-z:2;}
		.vws{font-size:1.2em;text-shadow:0  0  0}
		.ftrbg{position:absolute;bottom:0px;left:2px;right:4px;width:100%;padding-top:18px;padding-bottom:18px;}
	</style>
	<script src="../js/jquery.js"></script>
	<script src="../js/jquery.mobile-1.4.4.min.js"></script>
	<script src="../js/fastbtn.js"></script>
	

</head>
<body>
<div data-role="page" data-theme="f" class="page">
	<div style="overflow: hidden;" data-role="header" data-theme="f">
	<a href="#navigations"  id="menubttn"  data-rel="popup" class="ui-btn ui-btn ui-btn-inline ui-corner-all ui-btn-icon-left ui-icon-bars"><?php if($_SESSION[tn]==PRC){echo '目录';}else if($_SESSION[tn]==EN){echo 'Menu';}else{echo '目錄';}?></a>
    <h1><?php if($_SESSION[tn]==PRC){echo 'popup选项 - AppMoney712 移动应用设计系统';}else if($_SESSION[tn]==EN){echo 'Option button - AppMoney712 APP Creation System';}else{echo 'popup選項 - AppMoney712 移動應用設計系統';}?></h1>
	
	</div><!-- /header -->

	
	<div data-role="content">
	<?php if($tl)$tln = '&tl='.$tl;?>
	
<?php   if($pn){
			if($pres){
				if($pres==1){$preshtml = '';}else if($pres==2){$preshtml = '[1]';}else if($pres==3){$preshtml = '[2]';}else if($pres==4){$preshtml = '[3]';}
				$ht = file_get_contents('../panel/'.$roww[pjnbr].'/temp/'.$pn.'/'.$ap.$preshtml.'.html');
				$nhtmn = explode('<!--part',$ht);
				$pntag = '<!--part'.$pn.'!-->';
				for($i=1;$i<sizeof($nhtmn);$i++){if(strpos('<!--part'.$nhtmn[$i],$pntag)!==false){if(!$tabshtml)$tabshtml  = str_replace($pntag,'','<!--part'.$nhtmn[$i]);};}
	  		;}
			$ht = file_get_contents('../panel/'.$roww[pjnbr].'/'.$ap.'.html');			
			$hts = $ht;
			//$ht = file_get_contents('../panel/'.$roww[pjnbr].'/'.$ap.'.html');
			$htm = explode('<!--part',$ht);
			$pntag = '<!--part'.$pn.'!-->';
				for($i=1;$i<sizeof($htm);$i++){
					if(strpos('<!--part'.$htm[$i],$pntag)===false and !$tabshtml){$html .= '<!--part'.$htm[$i];}
					else if(strpos('<!--part'.$htm[$i],$pntag)!==false){if(!$tabshtml)$tabshtml  = '<!--part'.$htm[$i];}
					else{$htmls .= '<!--part'.$htm[$i];}
				;}
			
			if(strpos($tabshtml,'<!--syslistviewnsys!-->')!==false)$listviewn = 1;	
			
		

			$ultbg = explode('<!--itemvws'.$tm.'!-->',$tabshtml);
			$html = $html.$ultbg[0];
			
			$tbgs = explode('<!--itemvws',$ultbg[1]);
			
			if(strpos($ultbg[1],'<!--itemvws')!==false){$itemvwshtml = $tbgs[0];		
				$htmls = str_replace($itemvwshtml,'',$ultbg[1]).$htmls;			
			}else{
				if($sn){
					$tbgsn = explode('</div></div><!--uls!-->',$ultbg[1]);
					if($tbgsn[1]){$htmls = $tbgsn[1].$htmls;}else{$htmls = $ultbg[1].$htmls;}
					if($ultbg[1])$itemvwshtml = $tbgsn[0].'</div></div><!--uls!-->';
				}else{
					$tbgsn = explode('</li></ul></div><!--uls!-->',$ultbg[1]);
					if($tbgsn[1]){$htmls = $tbgsn[1].$htmls;}else{$htmls = $ultbg[1].$htmls;}	
					if($ultbg[1])$itemvwshtml = $tbgsn[0].'</li></ul></div><!--uls!-->';
				}
			}
			
			if(file_exists('../panel/'.$roww[pjnbr].'/panel'.$ap.'.html'))$panel =1;
			 
			
			if(strpos($itemvwshtml,'data-role="controlgroup"')!==false){$style = 'button';$sn=1;}
				else if(strpos($itemvwshtml,'<ul')!==false){$style = 'listview';}
					else{$style = '';}

			$tbg = explode('<!--item!-->',$itemvwshtml);
			
			for($i=1;$i<sizeof($tbg);$i++){
				$tbgnvlu = explode('<!--ndata',$tbg[$i]);
				$tbgsvlu = explode('ndata!-->',$tbgnvlu[1]);
				$tbgvlu = explode('@#@',$tbgsvlu[0]);
				$typvlu[$i] = $tbgvlu[0];
				$stylevlu[$i] = $tbgvlu[1];if($stylevlu[$i]=='button' and !$sn)$sn=1;
				$titlevlu[$i] = $tbgvlu[2];
				$ftrvlu[$i] = $tbgvlu[3];
				$tclrvlu[$i] = $tbgvlu[4];
				$imgbgvlu[$i] = $tbgvlu[5];
				$ftrclrvlu[$i] = $tbgvlu[6];
				$tbnvlu[$i] = $tbgvlu[7];
				
				$optionvlu[$i] = $tbgvlu[8];
				$tipvlu[$i] = $tbgvlu[9];
				$mnyvlu[$i] = $tbgvlu[10];
				$mnytypvlu[$i] = $tbgvlu[11];
				$unitvlu[$i] = $tbgvlu[12];
				$tmvlu[$i] = $tbgvlu[13];
				if($tmvlu[$i] > $tabsnvlu or !$tabsnvlu)$tabsnvlu = $tmvlu[$i];
				

			;}
		
	
		;}
	?>
	<?php if($ap){?>
	<a href="listview<?php if($listviewn)echo 'n';?>.php?pj=<?php echo htmlspecialchars($roww[pjnbr]) ?>&ap=<?php echo htmlspecialchars($roww[ap])?>&pn=<?php echo htmlspecialchars($pn)?>&tm=<?php echo htmlspecialchars($tm)?><?php //if($nbrbtn)echo '&nbrbtn=1';?>" data-ajax="false" class="ui-btn ui-btn ui-btn-inline ui-corner-all ui-btn-icon-left ui-icon-carat-l">&nbsp;</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="#view" data-rel="popup" class="ui-btn ui-btn-inline ui-corner-all ui-mini ui-btn-icon-left ui-icon-search"><?php if($_SESSION[tn]==PRC){echo '预览';}else if($_SESSION[tn]==EN){echo 'Preview';}else{echo '預覽';}?></a>
		
	<div data-role="popup" id="view"><a href="#" class="ui-btn ui-corner-all ui-icon-delete ui-btn-icon-notext ui-btn-right" data-rel="back"></a>

	<ul data-role="listview" data-corners="false" data-inset="true">
	<li><a href="view.php?pj=<?php echo htmlspecialchars($roww[pjnbr])?>&ap=<?php echo htmlspecialchars($roww[ap])?>&vw=ap" data-ajax="false" target="_blank" class="ui-btn ui-btn-inline ui-mini ui-btn-icon-left ui-icon-search"><?php if($_SESSION[tn]==PRC){echo '预览应用页内容形式';}else if($_SESSION[tn]==EN){echo 'Page content of APP style[Preview]';}else{echo '預覽應用頁內容形式';}?></a></li>
	<li><a href="view.php?pj=<?php echo htmlspecialchars($roww[pjnbr])?>&ap=<?php echo htmlspecialchars($roww[ap])?>&vw=ap&ts=1" data-ajax="false" target="_blank" class="ui-btn ui-btn-inline ui-mini ui-btn-icon-left ui-icon-search"><?php if($_SESSION[tn]==PRC){echo '预览应用页内容形式';}else if($_SESSION[tn]==EN){echo 'Page content of APP style[Preview]';}else{echo '預覽應用頁內容形式';}?><?php if($_SESSION[tn]==PRC){echo '[触控式] [使用webkit型浏览器]';}else if($_SESSION[tn]==EN){echo '[Touch screen] [using any webkit browser]';}else{echo '[觸控式] [使用webkit型瀏覽器]';}?></a></li>
	<li><a href="viewp.php?pj=<?php echo htmlspecialchars($roww[pjnbr])?>&ap=<?php echo htmlspecialchars($roww[ap])?>" data-ajax="false" target="_blank" class="ui-btn ui-btn-inline ui-mini ui-btn-icon-left ui-icon-search"><?php if($_SESSION[tn]==PRC){echo '预览popup形式';}else if($_SESSION[tn]==EN){echo 'content of popup style[Preview]';}else{echo '預覽popup形式';}?></a></li>
	<li><a href="viewp.php?pj=<?php echo htmlspecialchars($roww[pjnbr])?>&ap=<?php echo htmlspecialchars($roww[ap])?>&ts=1" data-ajax="false" target="_blank" class="ui-btn ui-btn-inline ui-mini ui-btn-icon-left ui-icon-search"><?php if($_SESSION[tn]==PRC){echo '预览popup形式';}else if($_SESSION[tn]==EN){echo 'content of popup style[Preview]';}else{echo '預覽popup形式';}?><?php if($_SESSION[tn]==PRC){echo '[触控式] [使用webkit型浏览器]';}else if($_SESSION[tn]==EN){echo '[Touch screen] [using any webkit browser]';}else{echo '[觸控式] [使用webkit型瀏覽器]';}?></a></li>
	<!--<li><a href="view.php?pj=<?php echo htmlspecialchars($roww[pjnbr])?>&ap=<?php echo htmlspecialchars($roww[ap])?>&vw=s" data-ajax="false" target="_blank" class="ui-btn ui-btn-inline ui-mini ui-btn-icon-left ui-icon-search"><?php if($_SESSION[tn]==PRC){echo '预览單頁形式';}else if($_SESSION[tn]==EN){echo 'single page style[Preview]';}else{echo '預覽單頁形式';}?></a></li>!-->
	</ul>
	</div>
	
		
	<!--<a href="menudesign.php?pj=<?php echo htmlspecialchars($roww[pjnbr])?>&plt=1" data-ajax="false" class="ui-btn ui-btn ui-btn-inline ui-corner-all ui-mini ui-btn-icon-left ui-icon-bars"><?php if($_SESSION[tn]==PRC){echo '专案应用页列表';}else if($_SESSION[tn]==EN){echo 'Project Page List';}else{echo '專案應用頁列表';}?></a>!-->
	
	<a href="vwpanel.php?pj=<?php echo htmlspecialchars($roww[pjnbr])?>&ap=<?php echo htmlspecialchars($roww[ap])?>&pn=<?php echo htmlspecialchars($pn)?>&tm=<?php echo htmlspecialchars($tm)?>" data-ajax="false" class="ui-btn ui-btn ui-btn-inline ui-corner-all ui-mini ui-btn-icon-left ui-icon-edit"><?php if($_SESSION[tn]==PRC){echo '控制板设定';}else if($_SESSION[tn]==EN){echo 'Panel setting';}else{echo '控制板設定';}?></a>
	<?php ;}?>
	
	<a href="#trys" data-rel="popup" data-transition="pop" class="ui-btn ui-btn-f ui-btn-inline ui-corner-all ui-mini" style="color:BLACK"><span class="pigss-pencil" style="color:red"></span><?php if($_SESSION[tn]==PRC){echo '快速试用 - 项目popup选项';}else if($_SESSION[tn]==EN){echo 'Quick try - Item quick button';}else{echo '快速試用 - 項目popup選項';}?></a>
		<div data-role="popup" id="trys" data-position-to="window" data-theme="f" class="ifrwidth"><a href="#" data-rel="back" class="popn ui-btn ui-btn-z ui-btn-icon-notext ui-icon-delete"></a><BR><BR>
		<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '使用';}else if($_SESSION[tn]==EN){echo 'Usage';}else{echo '使用';}?></b>
		<?php if($_SESSION[tn]==PRC){echo '此项产生选项按钮,供用户点选并填到panel控制板上。此处是填数据的标题及描述内容,标题是用作选项数据。';}else if($_SESSION[tn]==EN){echo 'This item is the creating data option of listview button. APP user clicks on the button to place its value to panel. You need to enter title and content. Only the content of title is used as value for APP user to select.';}else{echo '此項產生選項按鈕,供用戶點選並填到panel控制板上。此處是填數據的標題及描述內容,標題是用作選項數據。';}?></p>	
		
		<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '项目填写';}else if($_SESSION[tn]==EN){echo 'Item information';}else{echo '項目填寫';}?></b> &nbsp;<?php if($_SESSION[tn]==PRC){echo '填写\'标题\'及\'内容\'并提送。';}else if($_SESSION[tn]==EN){echo 'You need to fill in the Title and the Textarea and click the SEND button.';}else{echo '填寫\'標題\'及\'內容\'並提送。';}?></p>	
		<HR>
		<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '试用';}else if($_SESSION[tn]==EN){echo 'Testing';}else{echo '試用';}?></b> &nbsp;
	<?php if($_SESSION[tn]==PRC){echo '您须点撀此页上的预览,再进行测试。再修改及选用不同设置再预览并试用。';}else if($_SESSION[tn]==EN){echo 'You need to click the above preview button to test your design. You can enter or select different parameters to test their functions and effects.';}else{echo '您須點撀此頁上的預覽,再進行測試。再修改及選用不同設置再預覽並試用。';}?></p>	
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '试用步骤';}else if($_SESSION[tn]==EN){echo 'Testing Steps';}else{echo '試用步驟';}?></b> &nbsp;
	<?php if($_SESSION[tn]==PRC){echo '点撀popup按钮并点选选项,项目数据填到panel上。';}else if($_SESSION[tn]==EN){echo 'You need to click the popup button and select the data option button. The button value will be placed to the panel.';}else{echo '點撀popup按鈕並點選選項,項目數據填到panel上。';}?></p>	
		</div>
		
		
	<?php if(sizeof($tbg) > 1){
	if(file_exists('../panel/'.$roww[pjnbr].'/temp/'.$pn.'/'.$ap.'.html') and !$pres){?>
	<div data-role="controlgroup" data-type="horizontal" class="ui-btn-inline" data-corners="false">
	<a href="listvw.php?pj=<?php echo $roww[pjnbr]?>&ap=<?php echo $roww[ap]?>&pn=<?php echo $pn?>&tm=<?php echo $tm?>&pres=1" data-ajax="false" class="ui-btn ui-btn-f ui-btn-inline ui-corner-all ui-mini" style="color:pink" ><?php if($_SESSION[tn]==PRC){echo '改用上次储存';}else if($_SESSION[tn]==EN){echo 'Using previous save';}else{echo '改用上次儲存';}?></a>
	<?php if(file_exists('../panel/'.$roww[pjnbr].'/temp/'.$pn.'/'.$ap.'[1].html')){?>
	<a href="listvw.php?pj=<?php echo $roww[pjnbr]?>&ap=<?php echo $roww[ap]?>&pn=<?php echo $pn?>&tm=<?php echo $tm?>&pres=2" data-ajax="false" class="ui-btn ui-btn-f ui-btn-inline ui-corner-all ui-mini" style="color:pink" >2</a>	<?php ;}if(file_exists('../panel/'.$roww[pjnbr].'/temp/'.$pn.'/'.$ap.'[2].html')){?>
	<a href="listvw.php?pj=<?php echo $roww[pjnbr]?>&ap=<?php echo $roww[ap]?>&pn=<?php echo $pn?>&tm=<?php echo $tm?>&pres=3" data-ajax="false" class="ui-btn ui-btn-f ui-btn-inline ui-corner-all ui-mini" style="color:pink" >3</a>	<?php ;}if(file_exists('../panel/'.$roww[pjnbr].'/temp/'.$pn.'/'.$ap.'[3].html')){?>
	<a href="listvw.php?pj=<?php echo $roww[pjnbr]?>&ap=<?php echo $roww[ap]?>&pn=<?php echo $pn?>&tm=<?php echo $tm?>&pres=4" data-ajax="false" class="ui-btn ui-btn-f ui-btn-inline ui-corner-all ui-mini" style="color:pink" >4</a>	<?php ;}?>
	</div>
<?php ;}else{
	if(file_exists('../panel/'.$roww[pjnbr].'/temp/'.$pn.'/'.$ap.'.html') and $pres){?>
<a href="listvw.php?pj=<?php echo $roww[pjnbr]?>&ap=<?php echo $roww[ap]?>&pn=<?php echo $pn?>&tm=<?php echo $tm?>"  data-ajax="false" class="ui-btn ui-btn-f ui-btn-inline ui-corner-all ui-mini" style="color:pink" ><?php if($_SESSION[tn]==PRC){echo '不改用上'.$pres.'次储存';}else if($_SESSION[tn]==EN){echo 'Not using previous save '.$pres;}else{echo '不改用上'.$pres.'次儲存';}?></a>
<?php ;} ;}
		;}//?>
	<hr>
	<span style="color:black"><?php if($_SESSION[tn]==PRC){echo '专案';}else if($_SESSION[tn]==EN){echo 'Project';}else{echo '專案';}?></span>
	<?php 	$sql=$db->query("select * from webpj where cno='$pj'");
	if($sql)$row=$sql->fetch();
	echo '['.htmlspecialchars($row[date]).'] '.htmlspecialchars($row[title]);?>
	
	&nbsp;&nbsp;&nbsp;&nbsp;
	
	<span style="color:black"><?php if($_SESSION[tn]==PRC){echo '应用页称';}else if($_SESSION[tn]==EN){echo 'Page name';}else{echo '應用頁稱';}?></span> :
	<?php echo htmlspecialchars($roww[title])?>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<?php if($_SESSION[tn]==PRC){echo '数据创建';}else if($_SESSION[tn]==EN){echo 'Data Creating';}else{echo '數據創建';}?>  
	

	<hr>	
	<?php
if($itemvwshtml){
if($_SESSION[tn]==PRC){echo '您的设计';}else if($_SESSION[tn]==EN){echo 'Your design';}else{echo '您的設計';}
echo '<br><a href="#'.$pj.$ap.'vw'.$pn.'ns'.$tm.'" class="ui-btn ui-btn-inline" data-rel="popup">Popup</a><br>';

if(strpos($itemvwshtml,'<!--uls!-->')!==false and sizeof($tbg) > 1){
$itemvwshtmls = explode('<!--uls!--></div>',$itemvwshtml);
$itemvwshtml = $itemvwshtmls[0];
$itemvwshtm = str_replace('vw'.$pn.'n','vw'.$pn.'ns',$itemvwshtml);
$itemvwshtm = str_replace('(images/','(../panel/'.$roww[pjnbr].'/images/',$itemvwshtm);


echo str_replace('"images/','"../panel/'.$roww[pjnbr].'/images/',$itemvwshtm);

//$itemvwshtm = str_replace('data-role="popup"','',$itemvwshtml);
//$itemvwshtm = str_replace('(images/','(../panel/'.$roww[pjnbr].'/images/',$itemvwshtm);
//echo str_replace('"images/','"../panel/'.$roww[pjnbr].'/images/',$itemvwshtm);
$htp = file_get_contents('../panel/'.$roww[pjnbr].'/panel'.$ap.'.html');
$itemvwshtm = str_replace('(images/','(../panel/'.$roww[pjnbr].'/images/',$htp);
$itemvwshtm = str_replace('src="','src="../panel/'.$roww[pjnbr].'/',$itemvwshtm);
echo str_replace('"images/','"../panel/'.$roww[pjnbr].'/images/',$itemvwshtm);
echo '<script>fastbtn("'.$pj.'","'.$ap.'",windowHeight,windowWidth);</script>';
}
}

?>
<hr>	
<?php if($nbrbtn)$nbrbtn = '&nbrbtn=1';?>
	<FORM action="listvw.php?pj=<?php echo htmlspecialchars($roww[pjnbr]) ?>&ap=<?php echo htmlspecialchars($roww[ap]) ?>&tm=<?php echo htmlspecialchars($tm) ?>&tp=<?php echo htmlspecialchars($tp) ?>&sn=<?php echo htmlspecialchars($sn) ?>&pn=<?php echo htmlspecialchars($pn).$tln.$nbrbtn ?>" id="webxls" method="post" data-ajax="false" >
	
	<?php 
	if($tp and ($typvlu[$tp]=='option' or $typvlu[$tp]=='optionrm')){echo '<hr>';?>
	<div class="ui-grid-a"><div class="ui-block-a">
	<?php if($_SESSION[tn]==PRC){echo '选项内容';}else if($_SESSION[tn]==EN){echo 'Option content';}else{echo '選項內容';}?>
	<textarea name="option" required><?php if($optionvlu[$tp]){echo htmlspecialchars($optionvlu[$tp]);}else if($stylevlu[$tp]=='button'){echo htmlspecialchars($ftrvlu[$tp]);}else{echo htmlspecialchars($titlevlu[$tp]);}?></textarea>
	</div><div class="ui-block-b">
	<?php if($_SESSION[tn]==PRC){echo '提示';}else if($_SESSION[tn]==EN){echo 'Tips';}else{echo '提示';}?>
	<textarea name="tip"><?php echo htmlspecialchars($tipvlu[$tp]);?></textarea>
	</div></div>
	
	<div class="ui-grid-b"><div class="ui-block-a"><?php if($_SESSION[tn]==PRC){echo '售价';}else if($_SESSION[tn]==EN){echo 'Unit price';}else{echo '售價';}?><input type="text" name="mny" placeholder="" value="<?php if(!$mnyvlu[$tp] and $typvlu[$tp]=='optionrm'){echo '0';}else{echo htmlspecialchars($mnyvlu[$tp]);}?>"></div><div class="ui-block-b"><?php if($_SESSION[tn]==PRC){echo '符号';}else if($_SESSION[tn]==EN){echo 'Currency title';}else{echo '符號';}?><input type="text" name="mnys" placeholder="" value="<?php echo htmlspecialchars($mnytypvlu[$tp])?>">
	</div><div class="ui-block-c"><?php if($_SESSION[tn]==PRC){echo '单位称';}else if($_SESSION[tn]==EN){echo 'Unit title';}else{echo '單位稱';}?><input type="text" name="unit" placeholder="" value="<?php echo htmlspecialchars($unitvlu[$tp])?>"></div></div>
	<?php echo '<hr>';}?>
	<div class="ui-grid-a"><div class="ui-block-a"><?php if($_SESSION[tn]==PRC){echo '功能型式';}else if($_SESSION[tn]==EN){echo 'Function Type';}else{echo '功能型式';}?><select name="typ">
	<option value="option"  <?php if($typvlu[$tp]=='option')echo 'selected="selected"';?>><?php if($_SESSION[tn]==PRC){echo '选项数据';}else if($_SESSION[tn]==EN){echo 'Option data';}else{echo '選項數據';}?></option>
	<option value="optionrm"  <?php if($typvlu[$tp]=='optionrm')echo 'selected="selected"';?>><?php if($_SESSION[tn]==PRC){echo '刪除选项数据';}else if($_SESSION[tn]==EN){echo 'Removing option data';}else{echo '刪除選項數據';}?></option>
	<option value="shw"  <?php if($typvlu[$tp]=='shw')echo 'selected="selected"';?>><?php if($_SESSION[tn]==PRC){echo '显示控制板';}else if($_SESSION[tn]==EN){echo 'Panel showing';}else{echo '顯示控制板';}?></option>
	<option value="divider"  <?php if($typvlu[$tp]=='divider')echo 'selected="selected"';?>><?php if($_SESSION[tn]==PRC){echo '隔项';}else if($_SESSION[tn]==EN){echo 'Divider';}else{echo '隔項';}?></option>	
	</select>
	</div><div class="ui-block-b"><?php 
	
	if($_SESSION[tn]==PRC){echo '按鈕型式';}else if($_SESSION[tn]==EN){echo 'Button Type';}else{echo '按鈕型式';}?>
	
	<select name="style">	
	<?php if(!$sn){?>
	<option value="listview"  <?php if($stylevlu[$tp]=='listview')echo 'selected="selected"';?>><?php if($_SESSION[tn]==PRC){echo '列表';}else if($_SESSION[tn]==EN){echo 'Listview';}else{echo '列表';}?></option>
	<?php ;}?>
	<?php if($sn or sizeof($tbg)<2){?>
	<option value="button"  <?php if($stylevlu[$tp]=='button')echo 'selected="selected"';?>><?php if($_SESSION[tn]==PRC){echo '按鈕';}else if($_SESSION[tn]==EN){echo 'Button';}else{echo '按鈕';}?></option>
	<?php ;}?>
	</select></div></div>
	<div class="ui-grid-a"><div class="ui-block-a"><?php if($sn){if($_SESSION[tn]==PRC){echo '图像字体';}else if($_SESSION[tn]==EN){echo 'Icon font';}else{echo '圖像字體';};}else if(sizeof($tbg)==1){if($_SESSION[tn]==PRC){echo '标题[列表]/图像字体[按鈕]';}else if($_SESSION[tn]==EN){echo 'Title[Listview]/Icon font[Button]';}else{echo '標題[列表]/圖像字體[按鈕]';}?><a href="#btninf" data-rel="popup" class="ui-btn ui-btn-b ui-btn-inline ui-corner-all ui-mini">?</a><div data-role="popup" id="btninf" style="min-width:300px;max-width:85%" data-theme="f"><br><?php if($_SESSION[tn]==PRC){echo '在\'按钮型式\'选\'列表\',填标题。选按钮,填图像字体名称。';}else if($_SESSION[tn]==EN){echo 'You need to fill in title for using Listview of Button Type and fill in Icon font name for Button of Button Type.';}else{echo '在\'按鈕型式\'選\'列表\',填標題。選按鈕,填圖像字體名稱。';}?></div><?php ;}else{if($_SESSION[tn]==PRC){echo '标题';}else if($_SESSION[tn]==EN){echo 'Title';}else{echo '標題';};}?><input type="text" name="title" placeholder="" id="title" value="<?php echo htmlspecialchars($titlevlu[$tp])?>" required>
	<?php if($sn){?>
		<div class="ui-block-b"><a href="#icons" class="ui-btn ui-btn-f ui-btn-inline" data-rel="popup" data-transition="pop"><?php if($_SESSION[tn]==PRC){echo '字符';}else if($_SESSION[tn]==EN){echo 'ICON';}else{echo '字符';}?></a></div><div data-role="popup" id="icons" style="width:650px"><a href="#" class="ui-btn ui-corner-all ui-icon-delete ui-btn-icon-notext ui-btn-right" data-rel="back"></a>

	<a href="#" class="ui-btn ui-btn-f ui-btn-inline iconbtn" id="pigss-airplanefly"><span class="pigss-airplanefly"></span></a>
	<a href="#" class="ui-btn ui-btn-f ui-btn-inline iconbtn" id="pigss-bigsale"><span class="pigss-bigsale"></span></a>
	<a href="#" class="ui-btn ui-btn-f ui-btn-inline iconbtn" id="pigss-bunny"><span class="pigss-bunny"></span></a>
	<a href="#" class="ui-btn ui-btn-f ui-btn-inline iconbtn" id="pigss-coupon"><span class="pigss-coupon"></span></a>
	<a href="#" class="ui-btn ui-btn-f ui-btn-inline iconbtn" id="pigss-discodancer"><span class="pigss-discodancer"></span></a>
	<a href="#" class="ui-btn ui-btn-f ui-btn-inline iconbtn" id="pigss-drinks"><span class="pigss-drinks"></span></a>
	<a href="#" class="ui-btn ui-btn-f ui-btn-inline iconbtn" id="pigss-gift"><span class="pigss-gift"></span></a>
	<a href="#" class="ui-btn ui-btn-f ui-btn-inline iconbtn" id="pigss-gifts"><span class="pigss-gifts"></span></a>
	<a href="#" class="ui-btn ui-btn-f ui-btn-inline iconbtn" id="pigss-music"><span class="pigss-music"></span></a>
	<a href="#" class="ui-btn ui-btn-f ui-btn-inline iconbtn" id="pigss-newproduct"><span class="pigss-newproduct"></span></a>
	<a href="#" class="ui-btn ui-btn-f ui-btn-inline iconbtn" id="pigss-panda"><span class="pigss-panda"></span></a>
	<a href="#" class="ui-btn ui-btn-f ui-btn-inline iconbtn" id="pigss-pocketmoney"><span class="pigss-pocketmoney"></span></a>
	<a href="#" class="ui-btn ui-btn-f ui-btn-inline iconbtn" id="pigss-salerecommed"><span class="pigss-salerecommed"></span></a>
	<a href="#" class="ui-btn ui-btn-f ui-btn-inline iconbtn" id="pigss-santa"><span class="pigss-santa"></span></a>
	<a href="#" class="ui-btn ui-btn-f ui-btn-inline iconbtn" id="pigss-sign-percent"><span class="pigss-sign-percent"></span></a>
	<a href="#" class="ui-btn ui-btn-f ui-btn-inline iconbtn" id="pigss-tbn"><span class="pigss-tbn"></span></a>
	<a href="#" class="ui-btn ui-btn-f ui-btn-inline iconbtn" id="pigss-valentinesday"><span class="pigss-valentinesday"></span></a>
	<a href="#" class="ui-btn ui-btn-f ui-btn-inline iconbtn" id="pigss-laugh"><span class="pigss-laugh"></span></a>
	<a href="#" class="ui-btn ui-btn-f ui-btn-inline iconbtn" id="pigss-loveface"><span class="pigss-loveface"></span></a>
	<a href="#" class="ui-btn ui-btn-f ui-btn-inline iconbtn" id="pigss-noanswer"><span class="pigss-noanswer"></span></a>
	<a href="#" class="ui-btn ui-btn-f ui-btn-inline iconbtn" id="pigss-noanswer1"><span class="pigss-noanswer1"></span></a>
	<a href="#" class="ui-btn ui-btn-f ui-btn-inline iconbtn" id="pigss-noanswer2"><span class="pigss-noanswer2"></span></a>
	<a href="#" class="ui-btn ui-btn-f ui-btn-inline iconbtn" id="pigss-notsmile"><span class="pigss-notsmile"></span></a>
	<a href="#" class="ui-btn ui-btn-f ui-btn-inline iconbtn" id="pigss-notsmile1"><span class="pigss-notsmile1"></span></a>
	<a href="#" class="ui-btn ui-btn-f ui-btn-inline iconbtn" id="pigss-sick"><span class="pigss-sick"></span></a>
	<a href="#" class="ui-btn ui-btn-f ui-btn-inline iconbtn" id="pigss-smile"><span class="pigss-smile"></span></a>
	<a href="#" class="ui-btn ui-btn-f ui-btn-inline iconbtn" id="pigss-smile1"><span class="pigss-smile1"></span></a>
	<a href="#" class="ui-btn ui-btn-f ui-btn-inline iconbtn" id="pigss-smiling"><span class="pigss-smiling"></span></a>
	<a href="#" class="ui-btn ui-btn-f ui-btn-inline iconbtn" id="pigss-smiling1"><span class="pigss-smiling1"></span></a>
	<a href="#" class="ui-btn ui-btn-f ui-btn-inline iconbtn" id="pigss-smiling2"><span class="pigss-smiling2"></span></a>
	<a href="#" class="ui-btn ui-btn-f ui-btn-inline iconbtn" id="pigss-surprised"><span class="pigss-surprised"></span></a>
	<a href="#" class="ui-btn ui-btn-f ui-btn-inline iconbtn" id="pigss-surprised1"><span class="pigss-surprised1"></span></a>
	<a href="#" class="ui-btn ui-btn-f ui-btn-inline iconbtn" id="pigss-thinking"><span class="pigss-thinking"></span></a>
	<a href="#" class="ui-btn ui-btn-f ui-btn-inline iconbtn" id="pigss-tired"><span class="pigss-tired"></span></a>
	<a href="#" class="ui-btn ui-btn-f ui-btn-inline iconbtn" id="pigss-tongue"><span class="pigss-tongue"></span></a>
	<a href="#" class="ui-btn ui-btn-f ui-btn-inline iconbtn" id="pigss-tongue1"><span class="pigss-tongue1"></span></a>
	<a href="#" class="ui-btn ui-btn-f ui-btn-inline iconbtn" id="pigss-tongue2"><span class="pigss-tongue2"></span></a>
	<a href="#" class="ui-btn ui-btn-f ui-btn-inline iconbtn" id="pigss-tongue3"><span class="pigss-tongue3"></span></a>
	<a href="#" class="ui-btn ui-btn-f ui-btn-inline iconbtn" id="pigss-tongue5"><span class="pigss-tongue5"></span></a>
	<a href="#" class="ui-btn ui-btn-f ui-btn-inline iconbtn" id="pigss-winking"><span class="pigss-winking"></span></a>
	<a href="#" class="ui-btn ui-btn-f ui-btn-inline iconbtn" id="pigss-yummy"><span class="pigss-yummy"></span></a>
	<a href="#" class="ui-btn ui-btn-f ui-btn-inline iconbtn" id="pigss-angry"><span class="pigss-angry"></span></a>
	<a href="#" class="ui-btn ui-btn-f ui-btn-inline iconbtn" id="pigss-confused"><span class="pigss-confused"></span></a>
	<a href="#" class="ui-btn ui-btn-f ui-btn-inline iconbtn" id="pigss-cry"><span class="pigss-cry"></span></a>
	

	
	<a href="#" class="ui-btn ui-btn-f ui-btn-inline iconbtn" id="pigss-chat"><span class="pigss-chat"></span></a>
	<a href="#" class="ui-btn ui-btn-f ui-btn-inline iconbtn" id="pigss-user"><span class="pigss-user"></span></a>
	<a href="#" class="ui-btn ui-btn-f ui-btn-inline iconbtn" id="pigss-location"><span class="pigss-location"></span></a>
	<a href="#" class="ui-btn ui-btn-f ui-btn-inline iconbtn" id="pigss-mobile"><span class="pigss-mobile"></span></a>
	<a href="#" class="ui-btn ui-btn-f ui-btn-inline iconbtn" id="pigss-screen"><span class="pigss-screen"></span></a>
	<a href="#" class="ui-btn ui-btn-f ui-btn-inline iconbtn" id="pigss-mail"><span class="pigss-mail"></span></a>
	<a href="#" class="ui-btn ui-btn-f ui-btn-inline iconbtn" id="pigss-help"><span class="pigss-help"></span></a>
	<a href="#" class="ui-btn ui-btn-f ui-btn-inline iconbtn" id="pigss-videos"><span class="pigss-videos"></span></a>
	<a href="#" class="ui-btn ui-btn-f ui-btn-inline iconbtn" id="pigss-pictures"><span class="pigss-pictures"></span></a>
	<a href="#" class="ui-btn ui-btn-f ui-btn-inline iconbtn" id="pigss-link"><span class="pigss-link"></span></a>
	<a href="#" class="ui-btn ui-btn-f ui-btn-inline iconbtn" id="pigss-search"><span class="pigss-search"></span></a>
	<a href="#" class="ui-btn ui-btn-f ui-btn-inline iconbtn" id="pigss-download"><span class="pigss-download"></span></a>
	<a href="#" class="ui-btn ui-btn-f ui-btn-inline iconbtn" id="pigss-pencil"><span class="pigss-pencil"></span></a>
	<a href="#" class="ui-btn ui-btn-f ui-btn-inline iconbtn" id="pigss-info"><span class="pigss-info"></span></a>
	<a href="#" class="ui-btn ui-btn-f ui-btn-inline iconbtn" id="pigss-article"><span class="pigss-article"></span></a>
	<a href="#" class="ui-btn ui-btn-f ui-btn-inline iconbtn" id="pigss-clock"><span class="pigss-clock"></span></a>
	<a href="#" class="ui-btn ui-btn-f ui-btn-inline iconbtn" id="pigss-star"><span class="pigss-star"></span></a>
	<a href="#" class="ui-btn ui-btn-f ui-btn-inline iconbtn" id="pigss-heart"><span class="pigss-heart"></span></a>
	<a href="#" class="ui-btn ui-btn-f ui-btn-inline iconbtn" id="pigss-file"><span class="pigss-file"></span></a>
	<a href="#" class="ui-btn ui-btn-f ui-btn-inline iconbtn" id="pigss-feed"><span class="pigss-feed"></span></a>
	<a href="#" class="ui-btn ui-btn-f ui-btn-inline iconbtn" id="pigss-refresh"><span class="pigss-refresh"></span></a>
	<a href="#" class="ui-btn ui-btn-f ui-btn-inline iconbtn" id="pigss-images"><span class="pigss-images"></span></a>
	<a href="#" class="ui-btn ui-btn-f ui-btn-inline iconbtn" id="pigss-heart2"><span class="pigss-heart2"></span></a>
	<a href="#" class="ui-btn ui-btn-f ui-btn-inline iconbtn" id="pigss-bookmark"><span class="pigss-bookmark"></span></a>

	</div>
	<?php ;}//if($sn){?>
	
	</div><div class="ui-block-b"><?php if($sn){if($_SESSION[tn]==PRC){echo '标题';}else if($_SESSION[tn]==EN){echo 'Title';}else{echo '標題';};}else if(sizeof($tbg)==1){if($_SESSION[tn]==PRC){echo '內容[列表]/标题[按鈕]';}else if($_SESSION[tn]==EN){echo 'Textarea[Listview]/Title[Button]';}else{echo '內容[列表]/標題[按鈕]';}?><a href="#btninf" data-rel="popup" class="ui-btn ui-btn-b ui-btn-inline ui-corner-all ui-mini">?</a><div data-role="popup" id="btninf" style="min-width:300px;max-width:85%" data-theme="f"><br><?php if($_SESSION[tn]==PRC){echo '在\'按钮型式\'选\'列表\',填内容,是按钮的标题下的内容。选按钮,填标题,是按钮的标题。';}else if($_SESSION[tn]==EN){echo 'You need to fill in Textarea for using Listview of Button Type. The textarea is a text content below button title. You need to fill in Title for Button of Button Type. It is the Button title.';}else{echo '在\'按鈕型式\'選\'列表\',填內容,是按鈕的標題下的內容。選按鈕,填標題,是按鈕的標題。';}?></div><?php ;}else{if($_SESSION[tn]==PRC){echo '內容';}else if($_SESSION[tn]==EN){echo 'Textarea';}else{echo '內容';};}?><input type="text" name="imgftr" placeholder="" value="<?php echo htmlspecialchars($ftrvlu[$tp])?>"></div></div>
	
	<div class="ui-grid-c"><div class="ui-block-a"><?php if($_SESSION[tn]==PRC){echo '颜色';}else if($_SESSION[tn]==EN){echo 'color';}else{echo '顏色';}?><input type="text" name="tclr" placeholder="" value="<?php echo htmlspecialchars($tclrvlu[$tp])?>"></div><div class="ui-block-b"><?php if($_SESSION[tn]==PRC){echo '颜色1';}else if($_SESSION[tn]==EN){echo 'color 1';}else{echo '顏色1';}?><input type="text" name="ftrclr" placeholder="" value="<?php echo htmlspecialchars($ftrclrvlu[$tp])?>"></div><div class="ui-block-c"><?php if($_SESSION[tn]==PRC){echo '背景';}else if($_SESSION[tn]==EN){echo 'background';}else{echo '背景';}?><input type="text" name="imgbg" placeholder="" value="<?php echo htmlspecialchars($imgbgvlu[$tp])?>"></div><div class="ui-block-d"><?php 
	if(!$sn or sizeof($tbg)==1){if($_SESSION[tn]==PRC){echo '左边图像[限列表]';}else if($_SESSION[tn]==EN){echo 'Thumbnails[for listview only]';}else{echo '左邊圖像[限列表]';}?><input type="text" name="imgtbn" placeholder="" value="<?php echo htmlspecialchars($tbnvlu[$tp])?>"><?php ;}?></div></div>


	<input type="hidden" name="guanyin1" value="<?php if(!$_POST[guanyin1])$_SESSION[guanyin1]=rand();
	echo htmlspecialchars($_SESSION[guanyin1]); ?>">
	
	<div class="ui-grid-b"><div class="ui-block-a">

	<input type="submit" name="submit" id="webxlsbtn" Value="<?php if($_SESSION[tn]==PRC){echo '送交';}else if($_SESSION[tn]==EN){echo 'SEND';}else{echo '送交';}?>">
	</div><div class="ui-block-b">
	<a href="#steps" data-rel="popup" class="ui-btn ui-btn-b ui-btn-inline ui-corner-all ui-mini"><?php if($_SESSION[tn]==PRC){echo '步骤';}else if($_SESSION[tn]==EN){echo 'Steps';}else{echo '步驟';}?></a>
	<div data-role="popup" id="steps" style="min-width:300px;max-width:85%" data-position-to="window" data-theme="f">
	<a href="#" class="ui-btn ui-corner-all ui-icon-delete ui-btn-icon-notext ui-btn-right" data-rel="back"></a>
	
	<h4 style="color:black"><?php if($_SESSION[tn]==PRC){echo '改用上次储存';}else if($_SESSION[tn]==EN){echo 'Using previous save';}else{echo '改用上次儲存';}?>/<?php if($_SESSION[tn]==PRC){echo '不改用上次储存';}else if($_SESSION[tn]==EN){echo 'Not using previous save';}else{echo '不改用上次儲存';}?></h4>
	<p><?php if($_SESSION[tn]==PRC){echo '此项是包括上一页的储存。';}else if($_SESSION[tn]==EN){echo 'The saving content include the content of previous editing page.';}else{echo '此項是包括上一頁的儲存。';}?></p>
	<HR>
	<h4 style="color:black"><?php if($_SESSION[tn]==PRC){echo '填写选择项目';}else if($_SESSION[tn]==EN){echo 'Fiil in option data';}else{echo '填寫選擇項目';}?></h4>
	<p><?php if($_SESSION[tn]==PRC){echo '您须选择型式并填写资料。若项目须设定数量单位,此选项表应全部均有单位设定。';}else if($_SESSION[tn]==EN){echo 'You need to select style and fill in item data.';}else{echo '您須選擇型式並填寫資料。若項目須設定數量單位,此選項表應全部均有單位設定。';}?></p>
	<p style="color:BROWN"><B><?php if($_SESSION[tn]==PRC){echo '您须将设计选项表定售价及单位设定、售价设定与没售价及没单位设定,设定不同不放在同一选项表内。';}else if($_SESSION[tn]==EN){echo 'Different data parameters include in different option lists. For example, you need to design three option lists for data with price and unit, data with price and data without price and unit.';}else{echo '您須將設計選項表定售價及單位設定、售價設定與沒售價及沒單位設定,設定不同不放在同一選項表內。';}?></B></p><HR>
	<h4 style="color:black"><?php if($_SESSION[tn]==PRC){echo '修改项目/填写资料';}else if($_SESSION[tn]==EN){echo 'Amend data/add information';}else{echo '修改項目/填寫資料';}?></h4>
	<p><?php if($_SESSION[tn]==PRC){echo '您须点撀下面的项目列表的相关标题,再作进一步填写或修改资料。<BR>点选\'插入\'能修改次序。<BR>点选\'删除\'进行删除资料。';}else if($_SESSION[tn]==EN){echo 'You need to click the related title of below item list to amend data or edit additional information.<BR>If you want to re-order the item on the listview, you need to select \'Insert\'.<BR>If you need to delete the data, you need to select the \'Delete\'.';}else{echo '您須點撀下面的項目列表的相關標題,再作進一步填寫或修改資料。<BR>點選\'插入\'能修改次序。<BR>點選\'刪除\'進行刪除資料。';}?></p><HR>
	
	<h4 style="color:black"><?php if($_SESSION[tn]==PRC){echo '添加项目';}else if($_SESSION[tn]==EN){echo 'Add item';}else{echo '添加項目';}?></h4>
	<p><?php if($_SESSION[tn]==PRC){echo '点撀\'再增加新数据\'。';}else if($_SESSION[tn]==EN){echo 'You need to click the \'Add new data\'.';}else{echo '點撀\'再增加新數據\'。';}?></p>
	<hr>
	<h4 style="color:black"><?php if($_SESSION[tn]==PRC){echo '预览设计';}else if($_SESSION[tn]==EN){echo 'Preview';}else{echo '預覽設計';}?></h4>
	<p><?php if($_SESSION[tn]==PRC){echo '在此页下面能预览您的设计,若测试提交数据的功能并巳设计表格功能的应用页,点撀上面的预览按钮。';}else if($_SESSION[tn]==EN){echo 'You can preview your design on the below directly. If you want to test send function on the panel with the designed form function page, you need to click the above \'Preview\' button.';}else{echo '在此頁下面能預覽您的設計,若測試提交數據的功能並巳設計表格功能的應用頁,點撀上面的預覽按鈕。';}?></p>
	
	<p><?php if($_SESSION[tn]==PRC){echo '若须将浏览器调至特定尺寸,您须点撀浏览器的REFRESH按钮才开始测试。';}else if($_SESSION[tn]==EN){echo 'You can resize your browser to specific size and click the refresh button of your browser before testing.';}else{echo '若須將瀏覽器調至特定尺寸,您須點撀瀏覽器的REFRESH按鈕才開始測試。';}?></p>
	<HR>
	<h4 style="color:black"><?php if($_SESSION[tn]==PRC){echo '控制板设置';}else if($_SESSION[tn]==EN){echo 'Panel setting';}else{echo '控制板設置';}?></h4>
	<p><?php if($_SESSION[tn]==PRC){echo '此頁只能設置一個控制板,您須點撀控制板設定進行設定修改,e.g.背景图像。';}else if($_SESSION[tn]==EN){echo 'One panel is for one page only. You need to click the below \'Panel setting\' to alter settings.e.g.background picture';}else{echo '此頁只能設置一個控制板,您須點撀控制板設定進行設定修改,e.g.背景圖像。';}?></p>
	<p><?php if($_SESSION[tn]==PRC){echo '控制板是显示巳选选项及对巳选项作出编改。';}else if($_SESSION[tn]==EN){echo 'The panel is to display selected options and edit them.';}else{echo '控制板是顯示巳選選項及對巳選項作出編改。';}?></p>
	<HR>
	<h4 style="color:black"><?php if($_SESSION[tn]==PRC){echo '用户自定按钮功能';}else if($_SESSION[tn]==EN){echo 'APP user custom button function';}else{echo '用戶自定按鈕功能';}?></h4>
	<p><?php if($_SESSION[tn]==PRC){echo '您能在控制板供用户自定按钮,您须点撀控制板设定。';}else if($_SESSION[tn]==EN){echo 'You can add APP user custom button function to the panel. You need to click the below \'Panel setting\' to alter settings.';}else{echo '您能在控制板供用戶自定按鈕,您須點撀控制板設定。';}?></p>
	<hr>
	<h4 style="color:black"><?php if($_SESSION[tn]==PRC){echo '寄出巳选数据';}else if($_SESSION[tn]==EN){echo 'Sending selected data';}else{echo '寄出巳選數據';}?></h4>
	<p><?php if($_SESSION[tn]==PRC){echo '若想将巳选数据寄送至您指定的电邮,您须在控制板设定启用表格功能页。您亦须使用表格功能设计表格。';}else if($_SESSION[tn]==EN){echo 'APP user can send selected data to your specific email. You need to select a form page for these data on the form fucntion page. You can design a sending form by this function.';}else{echo '若想將巳選數據寄送至您指定的電郵,您須在控制板設定啟用表格功能頁。您亦須使用表格功能設計表格。';}?></p>
    </div>



<a href="#inf" data-rel="popup" class="ui-btn ui-btn-b ui-btn-inline ui-corner-all ui-mini">? <?php if($_SESSION[tn]==PRC){echo '解释';}else if($_SESSION[tn]==EN){echo 'Explanation';}else{echo '解釋';}?></a>
	<div data-role="popup" id="inf" style="min-width:300px;max-width:85%" data-position-to="window" data-theme="f"><a href="#" class="ui-btn ui-corner-all ui-icon-delete ui-btn-icon-notext ui-btn-right" data-rel="back"></a>

	<h4 style="color:black"><?php if($_SESSION[tn]==PRC){echo '功能型式';}else if($_SESSION[tn]==EN){echo 'Function Type';}else{echo '功能型式';}?></h4>
	<p><?php if($_SESSION[tn]==PRC){echo '隔项是隔开项目。选项数据是供用户点撀的选项项目,用户点选选项,控制板开启并显示巳选选项。显示控制板是供用户开启控制板。';}else if($_SESSION[tn]==EN){echo 'Divider is as item separator for option grouping. Option data is for APP user to select. APP user clicks on the option item and a panel will be opened to show the selected option item. Panel is for APP user to open the panel to view selected options.';}else{echo '隔項是隔開項目。選項數據是供用戶點撀的選項項目,用戶點選選項,控制板開啟並顯示巳選選項。顯示控制板是供用戶開啟控制板。';}?></p>	
	
	<p><?php if($_SESSION[tn]==PRC){echo '删除选项数据是供用户用此标题取代巳选数据标题,e.g. [X],作用是表达将巳选项删除,此型式的选项只在修改时才显示,即用户点撀巳选项,再显示相关数据的POPUP时才显示。';}else if($_SESSION[tn]==EN){echo 'Removing option data is for APP user to remove the selected data by title replacement.e.g. [X] Option data of this type will only be showed on the option popup when amendment.[For amendment, APP user needs to click a selected option item to show the option popup again.] ';}else{echo '刪除選項數據是供用戶用此標題取代巳選數據標題,e.g. [X],作用是表達將巳選項刪除,此型式的選項只在修改時才顯示,即用戶點撀巳選項,再顯示相關數據的POPUP時才顯示。';}?></p>	
	<hr>
	<h4 style="color:black"><?php if($_SESSION[tn]==PRC){echo '按鈕型式';}else if($_SESSION[tn]==EN){echo 'Button Type';}else{echo '按鈕型式';}?></h4>
	<p><?php if($_SESSION[tn]==PRC){echo '同列表功能的二款按钮型式。只能在设计开始时选用一种,若须修改,必须先删除数据。';}else if($_SESSION[tn]==EN){echo 'They are same as listview button styles -  row button and rectangular button. You need to select one of them at the beginning. If you want to alter the type, you need to delete the data.';}else{echo '同列表功能的二款按鈕型式。只能在設計開始時選用一種,若須修改,必須先刪除數據。';}?></p>	<hr>
	<h4 style="color:black"><?php if($_SESSION[tn]==PRC){echo '标题/内容文字颜色';}else if($_SESSION[tn]==EN){echo 'Text color';}else{echo '標題/內容文字顏色';}?></h4>
	<p><?php if($_SESSION[tn]==PRC){echo '填上html颜色码 e.g. #123456。';}else if($_SESSION[tn]==EN){echo 'You can add  color code e.g. #123456 .';}else{echo '填上html顏色碼 e.g. #123456。';}?></p>
	<h4 style="color:black"><?php if($_SESSION[tn]==PRC){echo '颜色/颜色1';}else if($_SESSION[tn]==EN){echo 'color/color1';}else{echo '顏色/顏色1';}?></h4>
	<p><?php if($_SESSION[tn]==PRC){echo '若使用列表型式,\'颜色\'是指标题的颜色,\'颜色1\'是指内容的颜色。<br>若使用按钮型式,\'颜色\'是指图像字体的颜色,\'颜色1\'是指标题的颜色。';}else if($_SESSION[tn]==EN){echo 'If you use listview style, the \'color\' is title color and the \'color1\' is content color. If you use button style, the \'color\' is icon font color and the \'color1\' is title color. ';}else{echo '若使用列表型式,\'顏色\'是指標題的顏色,\'顏色1\'是指內容的顏色。<br>若使用按鈕型式,\'顏色\'是指圖像字體的顏色,\'顏色1\'是指標題的顏色。';}?></p>
	<hr>
	
	<h4 style="color:black"><?php if($_SESSION[tn]==PRC){echo '背景';}else if($_SESSION[tn]==EN){echo 'background';}else{echo '背景';}?></h4>
	<p><?php if($_SESSION[tn]==PRC){echo '长方背景图像,使用应用内的图像,档案须存於panel/'.$roww[pjnbr].'/images档夹内。若设置背景图像上下左右重覆显示,在档案名加[xy]。e.g. picture[xy].png';}else if($_SESSION[tn]==EN){echo 'It is about the background of item. If you use the APP pictures, you need to prepare pictures and store them in  panel/'.$roww[pjnbr].'/images folder. If you add [xy] to the picture file name (e.g. picture[xy].png, the picture will be repeated both vertically and horizontally in item area.';}else{echo '長方背景圖像,使用應用內的圖像,檔案須存於panel/'.$roww[pjnbr].'/images檔夾內。若設置背景圖像上下左右重覆顯示,在檔案名加[xy]。e.g. picture[xy].png';}?></p>
	<p><?php if($_SESSION[tn]==PRC){echo '您亦能在背景图像填上rgb颜色码e.g. rgb(125,125,125), rgba颜色码e.g. rgba(125,125,125,0.5) 或 hex颜色码e.g. #123456代替背景图像。';}else if($_SESSION[tn]==EN){echo 'You can add rgb color code e.g. rgb(125,125,125), rgba color code e.g. rgba(125,125,125,0.5) or hex color code e.g. #123456 instead of background picture.';}else{echo '您亦能在背景圖像填上rgb顏色碼e.g. rgb(125,125,125), rgba顏色碼e.g. rgba(125,125,125,0.5) 或 hex顏色碼e.g. #123456代替背景圖像。';}?></p>
	<!--<p><?php if($_SESSION[tn]==PRC){echo '您亦能填a-y的颜色主题e.g. b。';}else if($_SESSION[tn]==EN){echo 'You can enter color theme a-y.e.g. a';}else{echo '您亦能填a-y的顏色主題e.g. b。';}?></p>!-->
	<hr>
	
	<h4 style="color:black"><?php if($_SESSION[tn]==PRC){echo '左边图像';}else if($_SESSION[tn]==EN){echo 'Thumbnails';}else{echo '左邊圖像';}?><?php if($_SESSION[tn]==PRC){echo '[限列表型式用]';}else if($_SESSION[tn]==EN){echo '[for listview style only]';}else{echo '[限列表型式用]';}?></h4>
	<p><?php if($_SESSION[tn]==PRC){echo '项目左边的方形图像,使用应用内的图像,档案须存於panel/'.$roww[pjnbr].'/images档夹内。';}else if($_SESSION[tn]==EN){echo 'It is about the thumbnail of item. If you use the APP pictures, you need to prepare pictures and store them in  panel/'.$roww[pjnbr].'/images folder.';}else{echo '項目左邊的方形圖像,使用應用內的圖像,檔案須存於panel/'.$roww[pjnbr].'/images檔夾內。';}?></p>
	
	</div>
	</div><div class="ui-block-c">
	<a href="#infW" data-rel="popup" class="ui-btn ui-btn-b ui-btn-inline ui-corner-all ui-mini">? <?php if($_SESSION[tn]==PRC){echo '选项内容解释';}else if($_SESSION[tn]==EN){echo 'Option content';}else{echo '選項內容解釋';}?></a>
	<div data-role="popup" id="infW" style="min-width:300px;max-width:85%" data-position-to="window" data-theme="f"><a href="#" class="ui-btn ui-corner-all ui-icon-delete ui-btn-icon-notext ui-btn-right" data-rel="back"></a>

	<h4 style="color:black"><?php if($_SESSION[tn]==PRC){echo '选项内容';}else if($_SESSION[tn]==EN){echo 'Option content';}else{echo '選項內容';}?></h4>
	<p><?php if($_SESSION[tn]==PRC){echo '用户点选所显示的内容。';}else if($_SESSION[tn]==EN){echo 'The option content is showed after APP user selection clicking.';}else{echo '用戶點選所顯示的內容。';}?></p>
	<hr>
	<h4 style="color:black"><?php if($_SESSION[tn]==PRC){echo '提示';}else if($_SESSION[tn]==EN){echo 'Tips';}else{echo '提示';}?></h4>
	<p><?php if($_SESSION[tn]==PRC){echo '用户点选项目,巳选项目及相关提示显示在控制板上,提示的作用是指导用户下步选择。';}else if($_SESSION[tn]==EN){echo 'APP user clicks on option and the selected option and related tips will be showed on panel. The tips is about the instruction for APP user to take action of next step.';}else{echo '用戶點選項目,巳選項目及相關提示顯示在控制板上,提示的作用是指導用戶下步選擇。';}?></p>
	<hr>
	<h4 style="color:black"><?php if($_SESSION[tn]==PRC){echo '售价';}else if($_SESSION[tn]==EN){echo 'Unit price';}else{echo '售價';}?></h4>
	<p><?php if($_SESSION[tn]==PRC){echo '填写售价,只能填数字及点号。此软件能显示单价及总和。';}else if($_SESSION[tn]==EN){echo 'You can enter integer and . for the unit price. This software can calculate item price and total price.';}else{echo '填寫售價,只能填數字及點號。此軟件能顯示單價及總和。';}?></p>
	<p><?php if($_SESSION[tn]==PRC){echo '若此项是\'删除选项数据\'并用作删除含售价项目,此处填0。若用作删除不含售价项目,此处填zero。';}else if($_SESSION[tn]==EN){echo 'If this item is \'Removing option data\' and is for removing data with price, you need to enter 0. If it is for removing data without price, you need to enter zero.';}else{echo '若此項是\'刪除選項數據\'並用作刪除含售價項目,此處填0。若用作刪除不含售價項目,此處填zero。';}?></p>
	<hr>
	<h4 style="color:black"><?php if($_SESSION[tn]==PRC){echo '符号';}else if($_SESSION[tn]==EN){echo 'Currency title';}else{echo '符號';}?></h4>
	<p><?php if($_SESSION[tn]==PRC){echo '价钱的符号,e.g. HK$。';}else if($_SESSION[tn]==EN){echo 'e.g. HK$.';}else{echo '價錢的符號,e.g. HK$。';}?></p>
	<hr>
	<h4 style="color:black"><?php if($_SESSION[tn]==PRC){echo '单位称';}else if($_SESSION[tn]==EN){echo 'Unit title';}else{echo '單位稱';}?></h4>
	<p><?php if($_SESSION[tn]==PRC){echo '价若计算价钱,须填上单位称。e.g. pcs。若令用户能选用.号,须填上@号,e.g. kg@.';}else if($_SESSION[tn]==EN){echo 'If you need to the price calculation, you need to enter the unit title. e.g. pcs. If you need to let APP user to enter dot , you need to add . for the entry @ e.g. kg@. ';}else{echo '若計算價錢,須填上單位稱。e.g. pcs。若令用戶能選用.號,須填上@號,e.g. kg@.' ;}?></p>
	</div>
</div>
</div>
	<hr>
	<div class="ui-grid-d">
	<div class="ui-block-a"></div>
	<div class="ui-block-b"></div>
	<div class="ui-block-c"><?php if($tp){?><a href="listvw.php?ap=<?php echo htmlspecialchars($roww[ap])?>&pj=<?php echo htmlspecialchars($roww[pjnbr])?>&pn=<?php echo htmlspecialchars($pn)?>&tm=<?php echo htmlspecialchars($tm)?>" class="ui-btn" data-ajax="false"><?php if($_SESSION[tn]==PRC){echo '再增加新数据';}else if($_SESSION[tn]==EN){echo 'Add new data';}else{echo '再增加新數據';}?></a><?php ;}?></div>
	<div class="ui-block-d">
	<?php if(sizeof($tbg)>=3){?>
	<select name="ord" data-theme="b">
	<option value=" "><?php if($_SESSION[tn]==PRC){echo '插入';}else if($_SESSION[tn]==EN){echo 'Insert';}else{echo '插入';}?></option>
	<?php for($i=1;$i<sizeof($tbg);$i++){
	if($i!=$tp and $i!=$tp+1){?><option value="<?php echo $i?>"><?php echo '['.$i.'] ';if($sn){echo htmlspecialchars($ftrvlu[$i]);}else{echo htmlspecialchars($titlevlu[$i]);}?></option>
	<?php ;};}?>
	</select><?php ;}?></div>
	<div class="ui-block-e"><?php if($tp){?><input name="dlt" id="dlt" type="checkbox" data-theme="e" ><label for="dlt"><?php if($_SESSION[tn]==PRC){echo '刪除';}else if($_SESSION[tn]==EN){echo 'Delete';}else{echo '刪除';}?></label><?php ;}?></div></div>
	</FORM>
<hr>
	

<?php
if(sizeof($tbg)>1){

echo '<div data-role="listview" data-inset="true">';}
for($i=1;$i<sizeof($tbg);$i++){
echo '<li data-icon="edit"><a href="listvw.php?ap='.htmlspecialchars($roww[ap]).'&pj='.htmlspecialchars($roww[pjnbr]).'&pn='.htmlspecialchars($pn).'&tm='.$tm.'&tp='.$i.'&sn='.$sn.$nbrbtn.'" data-ajax="false">';
echo  '['.$i.']&nbsp;&nbsp;&nbsp;';
if($titlevlu[$i])echo  htmlspecialchars($titlevlu[$i]);
if($ftrvlu[$i])echo  '<br>'.htmlspecialchars($ftrvlu[$i]);

echo '</a></li>';
;}
if(sizeof($tbg)>1)echo '</div>';
?>
	
<hr>	

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
<script src="../js/appsystem.js"></script>
<script>
$(".iconbtn").click(function() {
$('#title').val($(this).attr('id'));$('#icons').popup('close');
});
</script>
<?php 
$tdy=0;
$tdy=date('Y-m-d');
if($_POST[title] and $pj and $_SESSION[guanyin1] and $_SESSION[guanyin1]==$_POST[guanyin1]){

	if($ap and !preg_match('/^[0-9]*$/', $ap))exit;
	if($pj and !preg_match('/^[0-9]*$/', $pj))exit;	
	if($tm and !preg_match('/^[0-9]*$/', $tm))exit;	
	if($tp and !preg_match('/^[0-9]*$/', $tp))exit;	


if(!$sn){	
		$nbrbtnhtml = '<div class="'.$pj.$ap.'nbrbtndiv" style="width:95%"><a href="#" data-pop="'.$pj.$ap.'vw'.$pn.'n'.$tm.'" class="'.$pj.$ap.'nbrbtn ui-btn ui-btn-w ui-btn-inline" style="color:black">1</a><a href="#" data-pop="'.$pj.$ap.'vw'.$pn.'n'.$tm.'" class="'.$pj.$ap.'nbrbtn ui-btn ui-btn-w ui-btn-inline" style="color:black">2</a><a href="#" data-pop="'.$pj.$ap.'vw'.$pn.'n'.$tm.'" class="'.$pj.$ap.'nbrbtn ui-btn ui-btn-w ui-btn-inline" style="color:black">3</a><a href="#" data-pop="'.$pj.$ap.'vw'.$pn.'n'.$tm.'" class="'.$pj.$ap.'nbrbtn ui-btn ui-btn-w ui-btn-inline" style="color:black">4</a><a href="#" data-pop="'.$pj.$ap.'vw'.$pn.'n'.$tm.'" class="'.$pj.$ap.'nbrbtn ui-btn ui-btn-w ui-btn-inline" style="color:black">5</a><a href="#" data-pop="'.$pj.$ap.'vw'.$pn.'n'.$tm.'" class="'.$pj.$ap.'nbrbtn ui-btn ui-btn-w ui-btn-inline" style="color:black">6</a><a href="#" data-pop="'.$pj.$ap.'vw'.$pn.'n'.$tm.'" class="'.$pj.$ap.'nbrbtn ui-btn ui-btn-w ui-btn-inline" style="color:black">7</a><a href="#" data-pop="'.$pj.$ap.'vw'.$pn.'n'.$tm.'" class="'.$pj.$ap.'nbrbtn ui-btn ui-btn-w ui-btn-inline" style="color:black">8</a><a href="#" data-pop="'.$pj.$ap.'vw'.$pn.'n'.$tm.'" class="'.$pj.$ap.'nbrbtn ui-btn ui-btn-w ui-btn-inline" style="color:black">9</a><a href="#" data-pop="'.$pj.$ap.'vw'.$pn.'n'.$tm.'" class="'.$pj.$ap.'nbrbtn ui-btn ui-btn-w ui-btn-inline" style="color:black">0</a><a href="#" data-pop="'.$pj.$ap.'vw'.$pn.'n'.$tm.'" class="'.$pj.$ap.'nbrbtnx ui-btn ui-btn-w ui-btn-inline" style="color:black">X</a><a href="#" class="ui-btn ui-btn-v ui-btn-inline" style="color:black"><span style="color:black"></span></a></div><div class="'.$pj.$ap.'nbrbtnbr"><BR><BR></div>';
		
			if(strpos($itemvwshtml,'nbrbtndiv')==false and $nbrbtn){			
				$itemvwshtml = str_replace('<!--nbrbtn!--><BR><BR>',$nbrbtnhtml,$itemvwshtml);
			;}else if(strpos($itemvwshtml,'nbrbtndiv')!=false and !$nbrbtn){
				$itemvwshtml = str_replace($nbrbtnhtml,'<!--nbrbtn!--><BR><BR>',$itemvwshtml);
			;}
}
	
if($_POST[dlt] and $tp){
	
	if(sizeof($tbg)==2){$popup  ='';$sn='';}
	else{
		if($sn){
			$tbg  = str_replace('</div></div><!--uls!-->','',$itemvwshtml);
		}else{
			$tbg  = str_replace('</ul></div><!--uls!-->','',$itemvwshtml);
		}
	
		$tbg = explode('<!--item!-->',$tbg);
		$popup = str_replace('<div class="swiper-slide"><div id="'.$pj.$ap.'vnts'.$pn.'" class="vntsns vtnn">','',$tbg[0]);
		for($i=1;$i<sizeof($tbg);$i++){
		if($i==$tp){$popup .= '';}
		else{$popup .= '<!--item!-->'.$tbg[$i];}
		;}
	
		if($sn){
			$popup  = $popup.'</div></div><!--uls!-->';
		}else{
			$popup  = $popup.'</ul></div><!--uls!-->';
		}
	}
	
	
	
	
	
}else if($_POST['ord'] and preg_match('/^[0-9]*$/', $_POST['ord']) and $tp){
	$insert=$_POST['ord'];
	if($sn){
		$tbg  = str_replace('</div></div><!--uls!-->','',$itemvwshtml);
	}else{
		$tbg  = str_replace('</ul></div><!--uls!-->','',$itemvwshtml);
	}
	
	
	$tbg = explode('<!--item!-->',$tbg);
	$popup = $tbg[0];
	for($i=1;$i<sizeof($tbg);$i++){
		if($i==$insert){	
			$popup .= '<!--item!-->'.$tbg[$tp].'<!--item!-->'.$tbg[$i];}
		else if($i==$tp){$popup .= '';}
		else{$popup .= '<!--item!-->'.$tbg[$i];}
	;}
	
	if($sn){
		$popup  = $popup.'</div></div><!--uls!-->';
	}else{
		$popup  = $popup.'</ul></div><!--uls!-->';
	}

	
}else if($_POST[title] and $tp){

	$data = '<!--ndata'.htmlspecialchars($_POST[typ]).'@#@'.htmlspecialchars($_POST[style]).'@#@'.htmlspecialchars($_POST[title]).'@#@'.htmlspecialchars($_POST[imgftr]).'@#@'.htmlspecialchars($_POST[tclr]).'@#@'.htmlspecialchars($_POST[imgbg]).'@#@'.htmlspecialchars($_POST[ftrclr]).'@#@'.htmlspecialchars($_POST[imgtbn]).'@#@'.htmlspecialchars($_POST[option]).'@#@'.htmlspecialchars($_POST[tip]).'@#@'.htmlspecialchars($_POST[mny]).'@#@'.htmlspecialchars($_POST[mnys]).'@#@'.htmlspecialchars($_POST[unit]).'@#@'.htmlspecialchars($tabsnvlu+1).'ndata!-->';
	if($_POST[style]=='button')$sn =1;
	if($sn){
		$tbg  = str_replace('</div></div><!--uls!-->','',$itemvwshtml);
	}else{
		$tbg  = str_replace('</ul></div><!--uls!-->','',$itemvwshtml);
	}
	
	
	$tbg = explode('<!--item!-->',$tbg);
	$popup = str_replace('<div class="swiper-slide"><div id="'.$pj.$ap.'vnts'.$pn.'" class="vntsns vtnn">','',$tbg[0]);
	for($i=1;$i<sizeof($tbg);$i++){
		if($i==$tp){
			if($_POST[imgbg]){
			$bgtheme = 'b';
			if(strpos($_POST[imgbg],'http://')!==false or strpos($_POST[imgbg],'https://')!==false){$images = '';}else{$images = 'images/';}
			if(strlen($_POST[imgbg])==1){$bghtml = '';$bgtheme = htmlspecialchars($_POST[imgbg]);$bordern='';}		
			else if(strpos($_POST[imgbg],'#')!==false or strpos($_POST[imgbg],'rgba(')!==false  or strpos($_POST[imgbg],'rgb(')!==false){$bghtml = 'background-color:'.htmlspecialchars($_POST[imgbg]).';';if(strpos($_POST[imgbg],'rgba(')!==false)$bordern='border:none;';}
			else if(strpos($_POST[imgbg],'[xy]')!==false and $_POST[typ]!='divider'){$bghtml = 'background-image:url('.$images.htmlspecialchars($_POST[imgbg]).');';$bordern='border:none;';}
			else if($_POST[typ]!='divider'){$bghtml = 'background-image:url('.$images.htmlspecialchars($_POST[imgbg]).');background-size:100%;background-repeat:repeat-y;';$bordern='';}
			;}else{$bghtml = '';$bgtheme = 'b';$bordern='';}
	
			if($_POST[typ]=='divider' and !$sn)$divider = 'data-role="list-divider"';
	
			if($_POST[typ]=='divider'){$href = '#';$td=';text-decoration:none;';}else{$href = '#';$td='';}
			
			$popup .= '<!--item!-->'.$data;
			$nrm = '';
			if($sn){
				if($_POST[typ]=='option'){$sltptn = $pj.$ap.'sltptn ';}			
				else if($_POST[typ]=='optionrm'){$sltptn = $pj.$ap.'sltptn '.$pj.$ap.'optionrm ';$nrm = 'display:none;';}
				else if($_POST[typ]=='shw'){$sltptn = $pj.$ap.'plshw ';}
				$btntheme = 'class="'.$sltptn.'ui-btn ui-btn-'.$bgtheme.' ui-btn-inline"';$padding = 'padding:1px;';
			}else{
				$popup .= '<li '.$divider.' data-theme="'.$bgtheme.'" style="border:none;">';if($_POST[typ]=='option'){$btntheme = 'class="'.$pj.$ap.'sltptn"';}
				else if($_POST[typ]=='optionrm'){$btntheme = 'class="'.$pj.$ap.'sltptn '.$pj.$ap.'optionrm"';$nrm = 'display:none;';}
				else if($_POST[typ]=='shw'){$btntheme = 'class="'.$pj.$ap.'plshw"';}
			;}
			
			if($_POST[option]){$datnoption = 'data-option="'.htmlspecialchars($_POST[option]).'" ';}else{$datnoption = '';}
			if(($_POST[mny] and $_POST[mny]!='none') or $_POST[mny]==0){$datnmny = 'data-mny="'.htmlspecialchars($_POST[mny]).'" ';}else{$datnmny = '';}
			if($_POST[mnys]){$datnmnys = 'data-mnytyp="'.htmlspecialchars($_POST[mnys]).'" ';}else{$datnmnys = '';}
			if(strpos($_POST[unit],'@')!=false){
			$datn = explode('@',$_POST[unit]);
			$datnunit = 'data-unit="'.htmlspecialchars($datn[0]).'" data-units="'.htmlspecialchars($datn[1]).'"';}	
			else if($_POST[unit]){$datnunit = 'data-unit="'.htmlspecialchars($_POST[unit]).'" ';}
			else{$datnunit = '';}		
			if($_POST[tip]){$tip = 'data-tip=" '.htmlspecialchars($_POST[tip]).'" ';}else{$tip = '';}
			
			
			$popup .= '<a href="'.$href.'" '.$btntheme.' data-popup="#'.$pj.$ap.'vw'.$pn.'n'.$tm.'" '.$datnoption.$datnmny.$datnmnys.$tip.$datnunit.' style="border:none;'.$nrm.$bordern.$padding.htmlspecialchars($bghtml).$td.'">';
			
	
			if($_POST[imgtbn]){
			if(strpos($_POST[imgtbn],'http://')!==false or strpos($_POST[imgtbn],'https://')!==false){$images = '';}else{$images = 'images/';}
			$popup .= '<img src="'.$images.htmlspecialchars($_POST[imgtbn]).'">';
			}
			
			if($sn){
				if($_POST[tclr]){$tclrstyle = 'color:'.htmlspecialchars($_POST[tclr]).';';}else{$tclrstyle = '';}
			$popup .= '<h1 style="margin:0px;'.$tclrstyle.'"><span class="'.htmlspecialchars($_POST[title]).'"></span></h1>';
			}else{
				if($_POST[tclr]){$tclrstyle = ' style="color:'.htmlspecialchars($_POST[tclr]).'"';}else{$tclrstyle = '';}
			$popup .= '<h2'.$tclrstyle.'>'.htmlspecialchars($_POST[title]).'</h2>';
			;}
			
			if($_POST[imgftr]){
			if($sn){
					if($_POST[ftrclr]){$ftrclrstyle = 'color:'.htmlspecialchars($_POST[ftrclr]);}else{$ftrclrstyle = '';}
			$popup .= '<span style="padding:0px;'.$ftrclrstyle.'">'.htmlspecialchars($_POST[imgftr]).'</span>';
			}else{
					if($_POST[ftrclr]){$ftrclrstyle = ' style="color:'.htmlspecialchars($_POST[ftrclr]).'"';}else{$ftrclrstyle = '';}
			$popup .= '<h2'.$ftrclrstyle.'>'.htmlspecialchars($_POST[imgftr]).'</h2>';
			;}
	
			}
			if($sn){
				$popup .= '</a>';
			}else{
				$popup .= '</a></li>';
			;}
	
		;}else{$popup .= '<!--item!-->'.$tbg[$i];}
	;}
	
	
	
	
	if($sn){
		$popup  = $popup.'</div></div><!--uls!-->';
	}else{
		$popup  = $popup.'</ul></div><!--uls!-->';
	}

}else if($_POST[title] and !$tp){
	
	$data = '<!--ndata'.htmlspecialchars($_POST[typ]).'@#@'.htmlspecialchars($_POST[style]).'@#@'.htmlspecialchars($_POST[title]).'@#@'.htmlspecialchars($_POST[imgftr]).'@#@'.htmlspecialchars($_POST[tclr]).'@#@'.htmlspecialchars($_POST[imgbg]).'@#@'.htmlspecialchars($_POST[ftrclr]).'@#@'.htmlspecialchars($_POST[imgtbn]).'@#@'.htmlspecialchars($_POST[option]).'@#@'.htmlspecialchars($_POST[tip]).'@#@'.htmlspecialchars($_POST[mny]).'@#@'.htmlspecialchars($_POST[mnys]).'@#@'.htmlspecialchars($_POST[unit]).'@#@'.htmlspecialchars($tabsnvlu+1).'ndata!-->';
		
		
	if($_POST[style]=='button')$sn =1;
	
	if($_POST[imgbg]){
	$bgtheme = 'b';
			if(strpos($_POST[imgbg],'http://')!==false or strpos($_POST[imgbg],'https://')!==false){$images = '';}else{$images = 'images/';}
			if(strlen($_POST[imgbg])==1){$bghtml = '';$bgtheme = htmlspecialchars($_POST[imgbg]);}		
			else if(strpos($_POST[imgbg],'#')!==false or strpos($_POST[imgbg],'rgba(')!==false  or strpos($_POST[imgbg],'rgb(')!==false){$bghtml = 'background-color:'.htmlspecialchars($_POST[imgbg]).';';if(strpos($_POST[imgbg],'rgba(')!==false)$bordern='border:none;';}
			else if(strpos($_POST[imgbg],'[xy]')!==false and $_POST[typ]!='divider'){$bghtml = 'background-image:url('.$images.htmlspecialchars($_POST[imgbg]).');';$bordern='border:none;';}
			else if($_POST[typ]!='divider'){$bghtml = 'background-image:url('.$images.htmlspecialchars($_POST[imgbg]).');background-size:100%;background-repeat:repeat-y;';}
	;}else{$bghtml = '';$bgtheme = 'b';}
	
	if($_POST[typ]=='divider' and !$sn)$divider = 'data-role="list-divider"';
	
	//if($_POST[typ]=='divider'){$href = '#';}else{$href = '#'.$pj.$ap.'vw';}
	$href = '#';
	
	if($_POST[typ]=='option' or $_POST[typ]=='optionrm'){
		if($_POST[style]=='button'){$datnoption = 'data-option="'.htmlspecialchars($_POST[imgftr]).'" ';}else{$datnoption = 'data-option="'.htmlspecialchars($_POST[title]).'" ';}
	;}else{$datnoption = '';}
			
	$popup .= '<!--item!-->'.$data;
	if($sn){
		if($_POST[typ]=='option'){$sltptn = $pj.$ap.'sltptn ';}
		else if($_POST[typ]=='optionrm'){$sltptn = $pj.$ap.'sltptn '.$pj.$ap.'optionrm';$nrm = 'display:none;';}
		else if($_POST[typ]=='shw'){$sltptn = $pj.$ap.'plshw ';}
		$btntheme = 'class="'.$sltptn.'ui-btn ui-btn-'.$bgtheme.' ui-btn-inline"';$padding = 'padding:1px;';
	}else{
		$popup .= '<li '.$divider.' data-theme="'.$bgtheme.'" style="border:none;">';if($_POST[typ]=='option'){$btntheme = 'class="'.$pj.$ap.'sltptn"';}
		else if($_POST[typ]=='optionrm'){$btntheme = 'class="'.$pj.$ap.'sltptn '.$pj.$ap.'optionrm"';$nrm = 'display:none;';}
		else if($_POST[typ]=='shw'){$btntheme = 'class="'.$pj.$ap.'plshw"';}
	;}
	

	$popup .= '<a href="'.$href.'" '.$btntheme.' data-popup="#'.$pj.$ap.'vw'.$pn.'n'.$tm.'" '.$datnoption.' style="border:none;'.$nrm.$bordern.$padding.htmlspecialchars($bghtml).'">';
	
	if($_POST[imgtbn]){
	if(strpos($_POST[imgtbn],'http://')!==false or strpos($_POST[imgtbn],'https://')!==false){$images = '';}else{$images = 'images/';}
	$popup .= '<img src="'.$images.htmlspecialchars($_POST[imgtbn]).'">';
	}
	
	if($sn){
			if($_POST[tclr]){$tclrstyle = 'color:'.htmlspecialchars($_POST[tclr]).';';}else{$tclrstyle = '';}
			$popup .= '<h1 style="margin:0px;'.$tclrstyle.'"><span class="'.htmlspecialchars($_POST[title]).'"></span></h1>';
	}else{
			if($_POST[tclr]){$tclrstyle = ' style="color:'.htmlspecialchars($_POST[tclr]).'"';}else{$tclrstyle = '';}
			$popup .= '<h2'.$tclrstyle.'>'.htmlspecialchars($_POST[title]).'</h2>';
	;}
	if($_POST[imgftr]){
	if($sn){
			if($_POST[ftrclr]){$ftrclrstyle = 'color:'.htmlspecialchars($_POST[ftrclr]).';';}else{$ftrclrstyle = '';}
			$popup .= '<span style="padding:0px;'.$ftrclrstyle.'">'.htmlspecialchars($_POST[imgftr]).'</span>';
	}else{
			if($_POST[ftrclr]){$ftrclrstyle = ' style="color:'.htmlspecialchars($_POST[ftrclr]).'"';}else{$ftrclrstyle = '';}
			$popup .= '<h2'.$ftrclrstyle.'>'.htmlspecialchars($_POST[imgftr]).'</h2>';
	;}
	
	}
	 
	if($sn){
	$popup .= '</a>';
	}else{
	$popup .= '</a></li>';
	;}
	
	
	
	if($itemvwshtml and sizeof($tbg)>1){
		if(!$sn){
			if(strpos($itemvwshtml,'nbrbtndiv')==false and $nbrbtn){			
				$itemvwshtml = str_replace('<!--nbrbtn!--><BR><BR>',$nbrbtnhtml,$itemvwshtml);
			;}else if(strpos($itemvwshtml,'nbrbtndiv')==false and !$nbrbtn){
				$itemvwshtml = str_replace($nbrbtnhtml,'<!--nbrbtn!--><BR><BR>',$itemvwshtml);
			;}
		$popup = str_replace('</div></div><!--uls!-->',$popup.'</div></div><!--uls!-->',$itemvwshtml);
		}else{
		$popup = str_replace('</ul></div><!--uls!-->',$popup.'</ul></div><!--uls!-->',$itemvwshtml);
		}
		
	}else{
		if($sn){
		
		$popup = '<div id="'.$pj.$ap.'vw'.$pn.'n'.$tm.'" data-role="popup" data-theme="z" data-corners="false" style="overflow-y:auto;padding:5px;height: 100%;width: 100%;top:0;left:-15px;" class="vwspopups ifrwidthps"><a href="#" data-rel="back" class="popn ui-btn ui-btn-z ui-btn-icon-notext ui-icon-delete"></a><BR><BR><div class="'.$pj.$ap.'vwul webkitm" style="overflow-y:auto;" data-corners="false">'.$popup.'</div></div><!--uls!-->';
		//data-role="controlgroup" data-type="horizontal" 
		}else{
		if(!$nbrbtn)$nbrbtnhtml = '<!--nbrbtn!--><BR><BR>';
		$popup = '<div id="'.$pj.$ap.'vw'.$pn.'n'.$tm.'" data-role="popup" data-theme="z" data-corners="false" style="overflow-y:auto;padding:5px;height: 100%;width: 100%;top:0;left:-15px;" class="vwspopups ifrwidthps"><a href="#" data-rel="back" class="popn ui-btn ui-btn-z ui-btn-icon-notext ui-icon-delete"></a>'.$nbrbtnhtml.'<ul class="'.$pj.$ap.'vwul webkitm" style="overflow-y:auto;" data-role="listview" data-corners="false" data-inset="true">'.$popup.'</ul></div><!--uls!-->';
		}
	}
}////if($_POST[dlt] and $owlnbr){

if(!$panel){
$panelhtml = '<!--panelvws'.$ap.'!--><div data-role="popup" id="'.$pj.$ap.'vw" data-theme="a" style="padding:5px;height: 100%;width: 100%;top:0;left:-15px;overflow-y:hidden;" class="ifrwidthpn">
<a href="#" id="'.$pj.$ap.'panelpop" data-pop="" class="ui-btn ui-btn-w ui-btn-inline ui-btn-icon-left ui-icon-delete">&nbsp;</a><a href="#" class="ui-btn ui-btn-w ui-btn-inline ui-btn-icon-left ui-icon-mail">SEND FORM</a>
<a href="#'.$pj.$ap.'vwv" data-rel="popup" id="'.$pj.$ap.'vwvp" data-transition="slideup" class="ui-btn ui-btn-w ui-btn-inline ui-btn-icon-left ui-icon-bullets">&nbsp;</a>
<div id="'.$pj.$ap.'vwv" data-role="popup" data-theme="f" data-corners="false" class=""><a href="#" data-rel="back" class="popn ui-btn ui-btn-z ui-btn-icon-notext ui-icon-delete"></a><div class="vwshgts webkitm" style="overflow-y:auto;">
<div id="'.$pj.$ap.'vwvn" class="vws ui-content" style="width:80%"></div>
</div></div>
<div id="'.$pj.$ap.'vwsnbrvlu" data-theme="f" data-role="popup" data-corners="false" data-transition="pop" data-position-to="window" style="padding:5px;height: 100%;width: 100%;top:0;left:-15px;" class="ifrwidthps"><a href="#" id="'.$pj.$ap.'vwsnbrvlupopn" class="popn ui-btn ui-btn-z ui-btn-icon-notext ui-icon-delete"></a><BR><BR><HR><div class="'.$pj.$ap.'kvlu ui-grid-solo" ids=""></div><HR>
<a href="#" data-corners="false" class="vwsn ui-btn ui-btn-w ui-btn-inline">1</a>
<a href="#" data-corners="false" class="vwsn ui-btn ui-btn-w ui-btn-inline">2</a>
<a href="#" data-corners="false" class="vwsn ui-btn ui-btn-w ui-btn-inline">3</a>
<a href="#" data-corners="false" class="vwsn ui-btn ui-btn-w ui-btn-inline">4</a> <br>

<a href="#" data-corners="false" class="vwsn ui-btn ui-btn-w ui-btn-inline">5</a>
<a href="#" data-corners="false" class="vwsn ui-btn ui-btn-w ui-btn-inline">6</a>
<a href="#" data-corners="false" class="vwsn ui-btn ui-btn-w ui-btn-inline">7</a>
<a href="#" data-corners="false" class="vwsn ui-btn ui-btn-w ui-btn-inline">8</a> <br>

<a href="#" data-corners="false" class="vwsn ui-btn ui-btn-w ui-btn-inline">9</a>
<a href="#" data-corners="false" class="vwsn ui-btn ui-btn-w ui-btn-inline">0</a>
<a href="#" data-corners="false" class="'.$pj.$ap.'vwsd ui-btn ui-btn-w ui-btn-inline">.</a>
<a href="#" data-corners="false" class="vwsnb ui-btn ui-btn-w ui-btn-inline">&nbsp;</a> <br>
<a href="#" data-corners="false" class="'.$pj.$ap.'vwsns ui-btn ui-btn-w ui-btn-inline" style="width:80%"><span class="pigss-pencil">&nbsp;</span></a>
</div>
<div id="'.$pj.$ap.'vwtips" class="vws ui-grid-solo" style="width:50%;position:absolute;right:0;top:0;overflow-y:auto;display:none;"></div>
<div id="'.$pj.$ap.'vwtipop" data-role="popup" data-theme="z" style="background:rgb(35, 145, 234);color:pink;padding:5px;height: 100%;width: 100%;top:0;left:-15px;" data-corners="false" class="vws ifrwidthps"><a href="#" id="'.$pj.$ap.'vwtipoppopn" class="popn ui-btn ui-btn-z ui-btn-icon-notext ui-icon-delete"></a><div id="'.$pj.$ap.'vwtipops" class="webkitm"><div></div></div></div>
<div class="vws ui-grid-solo"><div class="ui-grid-solo" id="'.$pj.$ap.'vlucount"  style=""></div><div class="ui-grid-solo" id="'.$pj.$ap.'vlucounts"  style=""></div></div><HR>
<div id="'.$pj.$ap.'vwdatn" class="ui-grid-solo"><br></div>
<div class="'.$pj.$ap.'vwshgtns webkitm" style="'.$sltarea.'overflow-y:auto;padding:5px;height: 100%;width: 100%;top:0;left:-15px;">
<div id="'.$pj.$ap.'vwdata" class="vws ui-grid-solo" style="width:80%"></div>
</div>
</div><!--panelvws'.$ap.'!-->';
;}else{
$panelhtml = file_get_contents('../panel/'.$roww[pjnbr].'/panel'.$ap.'.html');
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
			
			
			$webpopup .= str_replace('<!--ul!-->','<!--ul!--><!--itemvws'.$tm.'!-->'.$popup,$html.$htmls);
		
			$webpopup .= $panelhtml.'</div><!--content!--></div><!--page!-->';
			
			
		 	 
			
			$fpagtrns='../panel/'.$roww[pjnbr].'/'.$ap.'.html';
			
			file_put_contents($fpagtrns,str_replace('<!--ul!-->','<!--ul!--><!--itemvws'.$tm.'!-->'.$popup,$html.$htmls));
			
			$fpagtrns='../panel/'.$roww[pjnbr].'/web'.$ap.'.html';
			file_put_contents($fpagtrns,$webpopup);
			
			if(!$panel){
			$fpagtrns='../panel/'.$roww[pjnbr].'/panel'.$ap.'.html';
			file_put_contents($fpagtrns,$panelhtml);}

	

			$fpagtrns='../panel/'.$roww[pjnbr].'/web'.$ap.'.js'; 
			$jshtml = file_get_contents($fpagtrns);
			if(strpos($jshtml ,';fastbtn("'.$pj.'","'.$ap.'"')==false){
				$jshtmls = '/*webjs'.$pn.'*/;fastbtn("'.$pj.'","'.$ap.'",windowHeight,windowWidth);/*webjs'.$pn.'*/';
			;}else{
				$jshtmls = '/*webjs'.$pn.'*//*fastbtn("'.$pj.'","'.$ap.'",windowHeight,windowWidth);*//*webjs'.$pn.'*/';			
			;}
			
			if(strpos($jshtml ,$jshtmls)==false){
			$js = str_replace('/*});*/',$jshtmls.'/*});*/',$jshtml);
			file_put_contents($fpagtrns,$js);	}		
		
			if(!file_exists('../panel/'.$roww[pjnbr].'/temp/'.$pn.'/'.$ap.'.html')){
				mkdir('../panel/'.$roww[pjnbr].'/temp');
				mkdir('../panel/'.$roww[pjnbr].'/temp/'.$pn);
				file_put_contents('../panel/'.$roww[pjnbr].'/temp/'.$pn.'/'.$ap.'.html',$hts);			
			;}else{
				if(file_exists('../panel/'.$roww[pjnbr].'/temp/'.$pn.'/'.$ap.'[2].html'))rename('../panel/'.$roww[pjnbr].'/temp/'.$pn.'/'.$ap.'[2].html','../panel/'.$roww[pjnbr].'/temp/'.$pn.'/'.$ap.'[3].html');
				if(file_exists('../panel/'.$roww[pjnbr].'/temp/'.$pn.'/'.$ap.'[1].html'))rename('../panel/'.$roww[pjnbr].'/temp/'.$pn.'/'.$ap.'[1].html','../panel/'.$roww[pjnbr].'/temp/'.$pn.'/'.$ap.'[2].html');
				rename('../panel/'.$roww[pjnbr].'/temp/'.$pn.'/'.$ap.'.html','../panel/'.$roww[pjnbr].'/temp/'.$pn.'/'.$ap.'[1].html');
				file_put_contents('../panel/'.$roww[pjnbr].'/temp/'.$pn.'/'.$ap.'.html',$hts);		
			;}
			
			
	if(($_POST['ord']==' ' or !$_POST['ord']) and !$_POST[dlt])$tmp = '&tp='.htmlspecialchars($tp);
	if($nbrbtn)$nbrbtns = '&nbrbtn=1';
	echo "<meta http-equiv='refresh' content='0;URL=listvw.php?ap=".htmlspecialchars($roww[ap])."&pj=".htmlspecialchars($roww[pjnbr])."&tm=".htmlspecialchars($tm)."&pn=".htmlspecialchars($pn).$tmp."&sn=".$sn.$nbrbtns."'>";
;}

?>
	
