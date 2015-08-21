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
    <title><?php if($_SESSION[tn]==PRC){echo '標签 - AppMoney712 移动应用设计系统';}else if($_SESSION[tn]==EN){echo 'Tabs - AppMoney712 APP Creation System';}else{echo '標簽 - AppMoney712 移動應用設計系統';}?></title>
	<link href="../css/jquery.mobile-1.4.4.min.css" rel="stylesheet">
	<link href="../css/jquerymobile-1.4.4.min.css" rel="stylesheet">
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
		.ftrbg{position:absolute;bottom:0px;left:2px;right:4px;width:100%;padding-top:18px;padding-bottom:18px;}
		.ifrwidth{ width:100%;}
	</style>
	<script src="../js/jquery.js"></script>
	<script src="../js/jquery.mobile-1.4.4.min.js"></script>

</head>
<body>
<div data-role="page" data-theme="f" class="page">
	<div style="overflow: hidden;" data-role="header" data-theme="f">
	<a href="#navigations"  id="menubttn"  data-rel="popup" data-transition="pop" class="ui-btn ui-btn ui-btn-inline ui-corner-all ui-btn-icon-left ui-icon-bars"><?php if($_SESSION[tn]==PRC){echo '目录';}else if($_SESSION[tn]==EN){echo 'Menu';}else{echo '目錄';}?></a>
    <h1><?php if($_SESSION[tn]==PRC){echo '标签 - AppMoney712 移动应用设计系统';}else if($_SESSION[tn]==EN){echo 'Tabs - AppMoney712 APP Creation System';}else{echo '標簽 - AppMoney712 移動應用設計系統';}?></h1>
	
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
	
		
	<a href="menudesign.php?pj=<?php echo htmlspecialchars($roww[pjnbr])?>&ap=<?php echo $ap?>&pn=<?php echo $pn?>&php=tabsw&plt=1" data-ajax="false" class="ui-btn ui-btn ui-btn-inline ui-corner-all ui-mini ui-btn-icon-left ui-icon-bars"><?php if($_SESSION[tn]==PRC){echo '专案应用页列表';}else if($_SESSION[tn]==EN){echo 'Project Page List';}else{echo '專案應用頁列表';}?></a>
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
	<?php if($_SESSION[tn]==PRC){echo '标签创建';}else if($_SESSION[tn]==EN){echo 'Tabs Creating';}else{echo '標簽創建';}
	if($tm)echo '<span style="color:black">['.htmlspecialchars($tm).']</span>';?>  
	

	<?php if($tl)$tln = '&tl='.$tl;?>
	
<?php   if($pn){
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

			
			$ultbg = explode('</ul></div>',$tabshtml);

			$tbg = explode('<!--item!-->',$ultbg[0]);
			$tbgs = explode('<!--itemtabs!-->',$ultbg[1]);	
							
			$tabsn = explode('data-tabsn="',$tbg[0]);
			$tabsnvlu = explode('"',$tabsn[1]);
			$tabsnvlu[0] = htmlspecialchars($tabsnvlu[0]);
		
	
			for($i=1;$i<sizeof($tbg);$i++){
				$tbgnvlu = explode('<!--data',$tbg[$i]);
				$tbgsvlu = explode('data!-->',$tbgnvlu[1]);
				$tbgvlu = explode('@#@',$tbgsvlu[0]);
				$imgvlu[$i]= $tbgvlu[0];
				$imgtitlevlu[$i]= $tbgvlu[1];
				$imgftrvlu[$i]= $tbgvlu[2];
				$imgtbgvlu[$i]= $tbgvlu[3];
				$imgftrbgvlu[$i]= $tbgvlu[4];
				$imgtclrvlu[$i]= $tbgvlu[5];
				$imgclrvlu[$i]= $tbgvlu[6];

			
			;} 
			;}
	?>	
	<FORM action="tabs.php?pj=<?php echo htmlspecialchars($roww[pjnbr]) ?>&ap=<?php echo htmlspecialchars($roww[ap]) ?>&tm=<?php echo htmlspecialchars($tm) ?>&pn=<?php echo htmlspecialchars($pn).$tln ?>" id="webxls" method="post" data-ajax="false" >
	<?php if($_SESSION[tn]==PRC){echo '添加相片 URL';}else if($_SESSION[tn]==EN){echo 'Add Picture URL';}else{echo '添加相片 URL';}?>
	<input type="text" name="img" placeholder="URL" value="<?php echo htmlspecialchars($imgvlu[$tm])?>" required>
	
	<div class="ui-grid-a"><div class="ui-block-a"><?php if($_SESSION[tn]==PRC){echo '标题';}else if($_SESSION[tn]==EN){echo 'title';}else{echo '標題';}?><input type="text" name="imgtitle" placeholder="" value="<?php echo htmlspecialchars($imgtitlevlu[$tm])?>" required>
	</div><div class="ui-block-b"><?php if($_SESSION[tn]==PRC){echo '內容';}else if($_SESSION[tn]==EN){echo 'textarea';}else{echo '內容';}?><input type="text" name="imgftr" placeholder="" value="<?php echo htmlspecialchars($imgftrvlu[$tm])?>"></div></div>
	<div class="ui-grid-a"><div class="ui-block-a"><?php if($_SESSION[tn]==PRC){echo '标题区背景颜色';}else if($_SESSION[tn]==EN){echo 'background color of title area';}else{echo '標題區背景顏色';}?><input type="text" name="imgtbg" placeholder="" value="<?php echo htmlspecialchars($imgtbgvlu[$tm])?>"></div><div class="ui-block-b"><?php if($_SESSION[tn]==PRC){echo '內容背景颜色';}else if($_SESSION[tn]==EN){echo 'textarea background color';}else{echo '內容背景顏色';}?>
	<input type="text" name="imgftrbg" placeholder="" value="<?php echo htmlspecialchars($imgftrbgvlu[$tm])?>"></div></div>
	
	<div class="ui-grid-a"><div class="ui-block-a"><?php if($_SESSION[tn]==PRC){echo '标题颜色';}else if($_SESSION[tn]==EN){echo 'title text color';}else{echo '標題顏色';}?><input type="text" name="imgtclr" placeholder="" value="<?php echo htmlspecialchars($imgtclrvlu[$tm])?>"></div><div class="ui-block-b"><?php if($_SESSION[tn]==PRC){echo '內容颜色';}else if($_SESSION[tn]==EN){echo 'textarea color';}else{echo '內容顏色';}?><input type="text" name="imgclr" placeholder="" value="<?php echo htmlspecialchars($imgclrvlu[$tm])?>"></div></div>
	<?php if($tm){?>

	<hr>
	<?php ;}//if(){?>
	<input type="hidden" name="guanyin1" value="<?php if(!$_POST[guanyin1])$_SESSION[guanyin1]=rand();
	echo htmlspecialchars($_SESSION[guanyin1]); ?>">
	<div class="ui-grid-b"><div class="ui-block-a">

	<input type="submit" name="submit" id="webxlsbtn" Value="<?php if($_SESSION[tn]==PRC){echo '送交';}else if($_SESSION[tn]==EN){echo 'SEND';}else{echo '送交';}?>">
	</div><div class="ui-block-b">
<a href="#inf" data-rel="popup" data-transition="pop" class="ui-btn ui-btn-b ui-btn-inline ui-corner-all ui-mini">? <?php if($_SESSION[tn]==PRC){echo '解释';}else if($_SESSION[tn]==EN){echo 'Explanation';}else{echo '解釋';}?></a>
	<div data-role="popup" id="inf" style="min-width:300px;max-width:85%" data-position-to="window" data-theme="f">
	<h4 style="color:black">url</h4>
	<p><?php if($_SESSION[tn]==PRC){echo '以上url是相片或网页。';}else if($_SESSION[tn]==EN){echo 'The above url item can be the URL picture/Internet URL web page.';}else{echo '以上url是相片或網頁。';}?></p>	
	<hr>
	<h4 style="color:black"><?php if($_SESSION[tn]==PRC){echo '使用';}else if($_SESSION[tn]==EN){echo 'Use';}else{echo '使用';}?></h4>
	<p><?php if($_SESSION[tn]==PRC){echo '在移动设备使用应只加简单的标题及內容。';}else if($_SESSION[tn]==EN){echo 'You can add simple words only due to mobile phone usage.';}else{echo '在移動設備使用應只加簡單的標題及內容。';}?></p><hr>
	<h4 style="color:black"><?php if($_SESSION[tn]==PRC){echo '內容';}else if($_SESSION[tn]==EN){echo 'Content';}else{echo '內容';}?></h4>
	<p><?php if($_SESSION[tn]==PRC){echo '您需预备相片并存於panel/'.$roww[pjnbr].'/images档夹或特定互联网伺服器。<br>对於此功能,请参考此页例。您亦能显示网页(html档)。';}else if($_SESSION[tn]==EN){echo 'You need to prepare pictures and store them in  panel/'.$roww[pjnbr].'/images folder or specific Internet server.<br>About this function, please refer to the examples of this page. You can also use it to show web textarea(html file).';}else{echo '您需預備相片並存於panel/'.$roww[pjnbr].'/images檔夾或特定互聯網伺服器。<br>對於此功能,請參考此頁例。您亦能顯示網頁(html檔)。';}?></p><hr>
	<h4 style="color:black"><?php if($_SESSION[tn]==PRC){echo '修改标签';}else if($_SESSION[tn]==EN){echo 'Amend Tabs Data';}else{echo '修改標簽';}?></h4>
	<p><?php if($_SESSION[tn]==PRC){echo '当存有数据,数据将在下面列出,点撀相关数据进行修改丶插入[改次序,以[编号]作准]或删除。';}else if($_SESSION[tn]==EN){echo 'A data list will be showed on the below section. You can click the related data title to amend, re-order[?] or delete.';}else{echo '當存有數據,數據將在下面列出,點撀相關數據進行修改、插入[改次序,以[編號]作準]或刪除。';}?></p>	

	</div>

</div></div>
	<hr>
	<div class="ui-grid-d"><div class="ui-block-a"></div><div class="ui-block-b"></div><div class="ui-block-c"><a href="tabs.php?ap=<?php echo htmlspecialchars($roww[ap])?>&pj=<?php echo htmlspecialchars($roww[pjnbr])?>&pn=<?php echo htmlspecialchars($pn)?>" class="ui-btn" data-ajax="false"><?php if($_SESSION[tn]==PRC){echo '再增加新数据';}else if($_SESSION[tn]==EN){echo 'Add new data';}else{echo '再增加新數據';}?></a></div><div class="ui-block-d">
	<?php if(sizeof($tbg)>=3){?>
	<select name="ord" data-theme="b">
	<option value=" "><?php if($_SESSION[tn]==PRC){echo '插入';}else if($_SESSION[tn]==EN){echo 'Insert';}else{echo '插入';}?></option>
	<?php for($i=1;$i<sizeof($tbg);$i++){
	if($i!=$tm and $i!=$tm+1){?><option value="<?php echo $i?>"><?php echo '['.$i.']'?></option>
	<?php ;};}?>
	</select><?php ;}?></div><div class="ui-block-e"><?php if(!$pn){?><input name="dlt" id="dlt" type="checkbox" data-theme="e" ><label for="dlt"><?php if($_SESSION[tn]==PRC){echo '刪除';}else if($_SESSION[tn]==EN){echo 'Delete';}else{echo '刪除';}?></label><?php ;}//if(!$pn){?></div></div>
	</FORM>
<hr>
<?php
if(sizeof($tbg)){
echo '<div data-role="listview" data-inset="true">';}
for($i=1;$i<sizeof($tbg);$i++){
echo '<li data-icon="edit"><a href="tabs.php?ap='.htmlspecialchars($roww[ap]).'&pj='.htmlspecialchars($roww[pjnbr]).'&pn='.htmlspecialchars($pn).'&tm='.$i.'" data-ajax="false">';
echo  '['.$i.']&nbsp;&nbsp;&nbsp;';
echo  htmlspecialchars($imgurlvlu[$i]);
if($titlevlu[$i])echo  '<br>'.htmlspecialchars($titlevlu[$i]);
echo '</a></li>';
;}
if(sizeof($tbg))echo '</div>';
?>
<hr>
	<?php 
	if($tabshtml){
	if($_SESSION[tn]==PRC){echo '您的设计';}else if($_SESSION[tn]==EN){echo 'Your design';}else{echo '您的設計';}
	$ntabshtml = str_replace('(images/','(../panel/'.$roww[pjnbr].'/images/',$tabshtml);
	$ntabshtml = str_replace('<iframe src="','<iframe src="../panel/'.$roww[pjnbr].'/',$ntabshtml);
	echo '<br>'.str_replace('"images/','"../panel/'.$roww[pjnbr].'/images/',$ntabshtml);
		
if(file_exists('../panel/'.$roww[pjnbr].'/web'.$ap.'.js')){
	$jswebn = file_get_contents('../panel/'.$roww[pjnbr].'/web'.$ap.'.js');
	$jswebn=explode('/*webjs'.$pn.'*/',$jswebn);
	echo '<script>'.$jswebn[1].';</script>';
;}
	}?>
	<hr>	


<HR>

	<a href="#infnsp" data-rel="popup" data-transition="pop" class="ui-btn ui-btn-b ui-btn-inline ui-corner-all ui-mini">? <?php if($_SESSION[tn]==PRC){echo '例';}else if($_SESSION[tn]==EN){echo 'Examples';}else{echo '例';}?></a>
	<div data-role="popup" id="infnsp" style="min-width:300px;max-width:85%" data-position-to="window" data-theme="f">
	<p><?php if($_SESSION[tn]==PRC){echo '您须缩细浏览器尺寸至移动设备大小进行浏览。';}else if($_SESSION[tn]==EN){echo 'You need to resize your browser as mobile device\'s screen size to view this example.';}else{echo '您須縮細瀏覽器尺寸至移動設備大小進行瀏覽。';}?></p>	
<p><?php if($_SESSION[tn]==PRC){echo '若相片存於应用内,将档案存於/panel/'.$roww[pjnbr].'/images。若您用互联网相片,您须键入外置URL.e.g.https://docs.google.com/.......。';}else if($_SESSION[tn]==EN){echo 'If you use the picture stored in the APP, you need to place file to /panel/'.$roww[pjnbr].'/images.  If you use the picture stored in the specific Internet server, you need to enter the external file URL or public URL. e.g. https://docs.google.com/....... ';}else{echo '若相片存於應用內,將檔案存於/panel/'.$roww[pjnbr].'/images。若您用互聯網相片,您須鍵入外置URL.e.g.https://docs.google.com/.......';}?></p>	
	</div>
<div >
 
<div data-role="tabs">
  <div data-role="navbar">
    <ul>
      <li><a href="#tab1" style="text-decoration:none;color:red"><?php if($_SESSION[tn]==PRC){echo '标题';}else if($_SESSION[tn]==EN){echo 'title';}else{echo '標題';}?></a></li>
      <li><a href="#tab2" style="text-decoration:none;color:"><?php if($_SESSION[tn]==PRC){echo '标题';}else if($_SESSION[tn]==EN){echo 'title';}else{echo '標題';}?>1</a></li>
      <li><a href="#tab3" style="text-decoration:none;color:"><?php if($_SESSION[tn]==PRC){echo '标题';}else if($_SESSION[tn]==EN){echo 'title';}else{echo '標題';}?>2</a></li>
	  
    </ul>
  </div>
  <div class="ui-body-k ui-content" id="tab1">
    <iframe src="" class="ifrwidth" seamless frameBorder="0"></iframe>
	<div class="ftrbg" style="background-color:rgba(255,255,255,0.5)"><div style="color:red"><?php if($_SESSION[tn]==PRC){echo '內容';}else if($_SESSION[tn]==EN){echo 'textarea';}else{echo '內容';}?></div></div>
  </div>
  <div class="ui-body-f ui-content" style="overflow-x:hidden; height:150px;" id="tab2"><?php if($_SESSION[tn]==PRC){echo '相片或网页';}else if($_SESSION[tn]==EN){echo 'picture/web page';}else{echo '相片或網頁';}?>sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss </div>
<div class="ui-body-f ui-content" style="overflow-x:hidden; height:550px;" id="tab3">
<img style="width:100%" src="../images/ishow2.gif"/>
</div>

</div>


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
<?php 
$tdy=0;
$tdy=date('Y-m-d');
if($_POST[img] and $pj and $_SESSION[guanyin1] and $_SESSION[guanyin1]==$_POST[guanyin1]){

	if($ap and !preg_match('/^[0-9]*$/', $ap))exit;
	if($pj and !preg_match('/^[0-9]*$/', $pj))exit;	
	if($tm and !preg_match('/^[0-9]*$/', $tm))exit;	

if($_POST[dlt] and $tm){
	$tabshtml = str_replace('data-tabsn="'.($tabsnvlu[0]).'"','data-tabsn="'.($tabsnvlu[0]-1).'"',$tabshtml);
	$tbg = str_replace('<!--systabssys!-->','',$tabshtml);
	$tbg = str_replace('<!--addtabs!--></div>','',$tbg);
	$ultbg = explode('</ul></div>',$tbg);
	
	$tbg = explode('<!--item!-->',$ultbg[0]);
	$popup = str_replace('<div class="swiper-slide"><div id="'.$pj.$ap.'vnts'.$pn.'" class="vntsns vtnn">','',$tbg[0]);
	$tbgs = explode('<!--itemtabs!-->',$ultbg[1]);
	for($i=1;$i<sizeof($tbg);$i++){
		if($i==$tm){$popup .= '';$popups .= '';}
		else{
			if($i>$tm){
			$tbgs[$i] = str_replace('id="'.$pj.$ap.'tabs'.$pn.'n'.$i.'"','id="'.$pj.$ap.'tabs'.$pn.'n'.($i-1).'"',$tbgs[$i]);
			$tbg[$i] = str_replace('#'.$pj.$ap.'tabs'.$pn.'n'.$i.'"','#'.$pj.$ap.'tabs'.$pn.'n'.($i-1).'"',$tbg[$i]);
			;}
			$popup .= '<!--item!-->'.$tbg[$i];$popups .= '<!--itemtabs!-->'.$tbgs[$i];}
	;}
	
	$popup = $popup.'</ul></div>'.$popups.'<!--addtabs!--></div>';
	
}else if($_POST['ord'] and preg_match('/^[0-9]*$/', $_POST['ord']) and $tm){
	$insert=$_POST['ord'];
	$tbg = str_replace('<!--systabssys!-->','',$tabshtml);
	$tbg = str_replace('<!--addtabs!--></div>','',$tbg);
	$ultbg = explode('</ul></div>',$tbg);
	
	$tbg = explode('<!--item!-->',$ultbg[0]);
	$popup = str_replace('<div class="swiper-slide"><div id="'.$pj.$ap.'vnts'.$pn.'" class="vntsns vtnn">','',$tbg[0]);
	$tbgs = explode('<!--itemtabs!-->',$ultbg[1]);
	for($i=1;$i<sizeof($tbg);$i++){
		if($i==$insert){
			$tbgs[$i] = str_replace('id="'.$pj.$ap.'tabs'.$pn.'n'.$i.'"','id="'.$pj.$ap.'tabs'.$pn.'n'.($i+1).'"',$tbgs[$i]);
			$tbg[$i] = str_replace('#'.$pj.$ap.'tabs'.$pn.'n'.$i.'"','#'.$pj.$ap.'tabs'.$pn.'n'.($i+1).'"',$tbg[$i]);
			
			$tbgs[$tm] = str_replace('id="'.$pj.$ap.'tabs'.$pn.'n'.$tm.'"','id="'.$pj.$ap.'tabs'.$pn.'n'.$i.'"',$tbgs[$tm]);
			$tbg[$tm] = str_replace('#'.$pj.$ap.'tabs'.$pn.'n'.$tm.'"','#'.$pj.$ap.'tabs'.$pn.'n'.$i.'"',$tbg[$tm]);
			
			$popup .= '<!--item!-->'.$tbg[$tm].'<!--item!-->'.$tbg[$i];
			$popups .= '<!--itemtabs!-->'.$tbgs[$tm].'<!--itemtabs!-->'.$tbgs[$i];}
		else if($i==$tm){$popup .= '';$popups .='';}
		else{
			if($tm<$insert and $i>$tm){
			$tbgs[$i] = str_replace('id="'.$pj.$ap.'tabs'.$pn.'n'.$i.'"','id="'.$pj.$ap.'tabs'.$pn.'n'.($i-1).'"',$tbgs[$i]);
			$tbg[$i] = str_replace('#'.$pj.$ap.'tabs'.$pn.'n'.$i.'"','#'.$pj.$ap.'tabs'.$pn.'n'.($i-1).'"',$tbg[$i]);
			}
			
			if($tm>$insert and $i>$insert and $i<$tm){
			$tbgs[$i] = str_replace('id="'.$pj.$ap.'tabs'.$pn.'n'.$i.'"','id="'.$pj.$ap.'tabs'.$pn.'n'.($i+1).'"',$tbgs[$i]);
			$tbg[$i] = str_replace('#'.$pj.$ap.'tabs'.$pn.'n'.$i.'"','#'.$pj.$ap.'tabs'.$pn.'n'.($i+1).'"',$tbg[$i]);
			}

		$popup .= '<!--item!-->'.$tbg[$i];$popups .= '<!--itemtabs!-->'.$tbgs[$i];}
	;}

	$popup = $popup.'</ul></div>'.$popups.'<!--addtabs!--></div>';
}else if($_POST[img] and $tm){

	$data = '<!--data'.htmlspecialchars($_POST[img]).'@#@'.htmlspecialchars($_POST[imgtitle]).'@#@'.htmlspecialchars($_POST[imgftr]).'@#@'.htmlspecialchars($_POST[imgtbg]).'@#@'.htmlspecialchars($_POST[imgftrbg]).'@#@'.htmlspecialchars($_POST[imgtclr]).'@#@'.htmlspecialchars($_POST[imgclr]).'data!-->';
	
	$tbg = str_replace('<!--systabssys!-->','',$tabshtml);
	$tbg = str_replace('<!--addtabs!--></div>','',$tbg);
	$ultbg = explode('</ul></div>',$tbg);
	
	$tbg = explode('<!--item!-->',$ultbg[0]);
	$popup = str_replace('<div class="swiper-slide"><div id="'.$pj.$ap.'vnts'.$pn.'" class="vntsns vtnn">','',$tbg[0]);
	$tbgs = explode('<!--itemtabs!-->',$ultbg[1]);
	for($i=1;$i<sizeof($tbg);$i++){
		if($i==$tm){
			if(!$_POST[imgclr])$_POST[imgclr] ='red';
			$popup .= '<!--item!-->'.$data.'<li><a href="#'.$pj.$ap.'tabs'.$pn.'n'.$tm.'" style="background-color:'.htmlspecialchars($_POST[imgtbg]).';color:'.htmlspecialchars($_POST[imgtclr]).';">'.htmlspecialchars($_POST[imgtitle]).'</a></li>';
			if(strpos($_POST[img],'http://')!==false or strpos($_POST[img],'https://')!==false){$images = '';}else{$images = 'images/';}
			if(strpos($_POST[img],'.html')!==false)$stuh = ' style=""';
			$popups .= '<!--itemtabs!--><div id="'.$pj.$ap.'tabs'.$pn.'n'.$tm.'"'.$stuh.'>';
	if(strpos($_POST[img],'.html')!==false){
			$popups .= '<iframe src="'.htmlspecialchars($_POST[img]).'" class="ifrwidth" seamless frameBorder="0"></iframe>';	
			}else{
			$popups .= '<img style="width:100%" src="'.$images.htmlspecialchars($_POST[img]).'"/>';	
			;}
			if(!$_POST[imgftrbg])$_POST[imgftrbg] ='rgba(255, 255, 255, 0.4)';
			if($_POST[imgftr])$popups .= '<div class="ftrbg" style="background-color:'.htmlspecialchars($_POST[imgftrbg]).'"><div style="color:'.htmlspecialchars($_POST[imgclr]).'">'.htmlspecialchars($_POST[imgftr]).'</div></div>';
			}
		else{$popup .= '<!--item!-->'.$tbg[$i];$popups .= '<!--itemtabs!-->'.$tbgs[$i];}
	;}

	$popup = $popup.'</ul></div>'.$popups.'<!--addtabs!--></div>';

}else if($_POST[img] and !$tm){
	$tabshtml = str_replace('<!--systabssys!-->','',$tabshtml);
	if(!$_POST[imgclr])$_POST[imgclr] ='red';
	
	$data = '<!--data'.htmlspecialchars($_POST[img]).'@#@'.htmlspecialchars($_POST[imgtitle]).'@#@'.htmlspecialchars($_POST[imgftr]).'@#@'.htmlspecialchars($_POST[imgtbg]).'@#@'.htmlspecialchars($_POST[imgftrbg]).'@#@'.htmlspecialchars($_POST[imgtclr]).'@#@'.htmlspecialchars($_POST[imgclr]).'data!-->';
	
	$popup .= '<!--item!-->'.$data.'<li><a href="#'.$pj.$ap.'tabs'.$pn.'n'.($tabsnvlu[0]+1).'" style="background-color:'.htmlspecialchars($_POST[imgtbg]).';color:'.htmlspecialchars($_POST[imgtclr]).';">'.htmlspecialchars($_POST[imgtitle]).'</a></li>';
	if(strpos($_POST[img],'http://')!==false or strpos($_POST[img],'https://')!==false){$images = '';}else{$images = 'images/';}
	if(strpos($_POST[img],'.html')!==false)$stuh = ' style=""';
	$popups .= '<!--itemtabs!--><div id="'.$pj.$ap.'tabs'.$pn.'n'.($tabsnvlu[0]+1).'"'.$stuh.'>';
	if(strpos($_POST[img],'.html')!==false){
			$popups .= '<iframe src="'.htmlspecialchars($_POST[img]).'" class="ifrwidth" seamless frameBorder="0"></iframe>';	
			}else{
			$popups .= '<img style="width:100%" src="'.$images.htmlspecialchars($_POST[img]).'"/>';	
			;}
	if(!$_POST[imgftrbg])$_POST[imgftrbg] ='rgba(255, 255, 255, 0.4)';
	if($_POST[imgftr])$popups .= '<div class="ftrbg" style="background-color:'.htmlspecialchars($_POST[imgftrbg]).'"><div style="color:'.htmlspecialchars($_POST[imgclr]).'">'.htmlspecialchars($_POST[imgftr]).'</div></div>';
	$popups .= '</div><!--addtabs!-->';

	if($tabshtml){
	$tabshtml = str_replace('data-tabsn="'.$tabsnvlu[0].'"','data-tabsn="'.($tabsnvlu[0]+1).'"',$tabshtml);
	$tabshtml= str_replace('<!--addtabs!-->',$popups,$tabshtml);
	$popup = str_replace('</ul>',$popup.'</ul>',$tabshtml);
	}else{
	$popup = '<div data-tabsn="1" data-role="tabs"><div data-role="navbar"><ul>'.$popup.'</ul></div>'.$popups.'</div>';
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
				
			$webpopup .= $html.'<!--part'.$pn.'!--><!--systabssys!-->'.$vnts.$popup.$vntsn.$tabnbgdatns.$htmls;
			$webpopup .= '</div><!--content!--></div><!--page!-->';
			
		 	
			
			$fpagtrns='../panel/'.$roww[pjnbr].'/'.$ap.'.html';
			file_put_contents($fpagtrns,$html.'<!--part'.$pn.'!--><!--systabssys!-->'.$vnts.$popup.$vntsn.$tabnbgdatns.$htmls);

			$fpagtrns='../panel/'.$roww[pjnbr].'/web'.$ap.'.html';
			file_put_contents($fpagtrns,$webpopup);

	


	
			if(!file_exists('../panel/'.$roww[pjnbr].'/web'.$ap.'.js')){
			$fpagtrns='../panel/'.$roww[pjnbr].'/web'.$ap.'.js';
			$js = '/*$(document).on(\'pageshow\', \'#web'.$ap.'\', function(){*/';
			$js .= '/*});*/';
			file_put_contents($fpagtrns,$js);			
			;}
			
	if(!$tm){$tmp = '&tm='.htmlspecialchars($tabsnvlu[0]+1);}
	else if(($_POST['ord']==' ' or !$_POST['ord']) and !$_POST[dlt]){$tmp = '&tm='.htmlspecialchars($tm);}
	echo "<meta http-equiv='refresh' content='0;URL=tabs.php?ap=".htmlspecialchars($roww[ap])."&pj=".htmlspecialchars($roww[pjnbr])."&pn=".htmlspecialchars($pn).$tmp."'>";
;}

?>
	
