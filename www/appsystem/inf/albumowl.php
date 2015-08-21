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
    <title><?php if($_SESSION[tn]==PRC){echo 'Swipeable相簿 - AppMoney712 移动应用设计系统';}else if($_SESSION[tn]==EN){echo 'Swipeable Album - AppMoney712 APP Creation System';}else{echo 'Swipeable相簿 - AppMoney712 移動應用設計系統';}?></title>
	<link href="../css/jquery.mobile-1.4.4.min.css" rel="stylesheet">
	<link href="../css/jquerymobile-1.4.4.min.css" rel="stylesheet">
	<link rel="stylesheet" href="../jscss/swiper.min.css">
	<link rel="stylesheet" href="../css/appsystem.css">	<link href="../css/icons/style.css" rel="stylesheet">
	<style type="text/css">
	</style>
	<script src="../js/jquery.js"></script>
	<script src="../js/jquery.mobile-1.4.4.min.js"></script>
	<script src="../js/swiper.jquery.min.js"></script>
</head>
<body>
<div data-role="page" data-theme="b"  id="appageone" style="background-color:white;color:black">
	<div style="overflow: hidden;" data-role="header" data-theme="f">
	<a href="#navigations"  id="menubttn"  data-rel="popup" data-transition="pop" class="ui-btn ui-btn ui-btn-inline ui-corner-all ui-btn-icon-left ui-icon-bars"><?php if($_SESSION[tn]==PRC){echo '目录';}else if($_SESSION[tn]==EN){echo 'Menu';}else{echo '目錄';}?></a>
    <h1><?php if($_SESSION[tn]==PRC){echo 'Swipeable相簿 - AppMoney712 移动应用设计系统';}else if($_SESSION[tn]==EN){echo 'Swipeable Album - AppMoney712 APP Creation System';}else{echo 'Swipeable相簿 - AppMoney712 移動應用設計系統';}?></h1>
	
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
	<!--<li><a href="view.php?pj=<?php echo $roww[pjnbr]?>&ap=<?php echo $roww[ap]?>&vw=s" data-ajax="false" target="_blank" class="ui-btn ui-btn-inline ui-mini ui-btn-icon-left ui-icon-search"><?php if($_SESSION[tn]==PRC){echo '预览單頁形式';}else if($_SESSION[tn]==EN){echo 'single page style[Preview]';}else{echo '預覽單頁形式';}?></a></li>!-->
	</ul>
	</div>
	
		
	<a href="menudesign.php?pj=<?php echo htmlspecialchars($roww[pjnbr])?>&ap=<?php echo $ap?>&pn=<?php echo $pn?>&php=albumowl&plt=1" data-ajax="false" class="ui-btn ui-btn ui-btn-inline ui-corner-all ui-mini ui-btn-icon-left ui-icon-bars"><?php if($_SESSION[tn]==PRC){echo '专案应用页列表';}else if($_SESSION[tn]==EN){echo 'Project Page List';}else{echo '專案應用頁列表';}?></a>
	<?php ;}?>
	
	
	
	<a href="#try" data-rel="popup" data-transition="pop" class="ui-btn ui-btn-f ui-btn-inline ui-corner-all ui-mini" style="color:BLACK"><span class="pigss-pencil" style="color:red"></span><?php if($_SESSION[tn]==PRC){echo '快速试用';}else if($_SESSION[tn]==EN){echo 'Quick try';}else{echo '快速試用';}?></a>
		<div data-role="popup" id="try" data-position-to="window" data-theme="f" class="ifrwidth"><a href="#" data-rel="back" class="popn ui-btn ui-btn-z ui-btn-icon-notext ui-icon-delete"></a><BR><BR>
		<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '预备相片';}else if($_SESSION[tn]==EN){echo 'Photo preparation';}else{echo '預備相片';}?></b> &nbsp;<?php if($_SESSION[tn]==PRC){echo '您须预备二张相片[横向]并存於panel/'.$roww[pjnbr].'/images。';}else if($_SESSION[tn]==EN){echo 'You need to prepare two landscape photos and place them to the folder panel/'.$roww[pjnbr].'/images.';}else{echo '您須預備二張相片[橫向]並存於panel/'.$roww[pjnbr].'/images。';}?></p>	
		<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '项目填写';}else if($_SESSION[tn]==EN){echo 'Item information';}else{echo '項目填寫';}?></b> &nbsp;<?php if($_SESSION[tn]==PRC){echo '在\'添加相片 URL\'填写首张相片档名及填上相片尺寸并提送。您能在Windows档案管理员将鼠标移到档案名上,有尺寸数据显示。再点撀\'再增加新数据\',重覆以上步骤键入另一相片资料。';}else if($_SESSION[tn]==EN){echo 'You need to enter photo filename to Add Picture URL, enter Picture size values and then click the SEND button. You can move your mouse cursor to the filename in Windows file manager to know the photo size. You can click the Add new data and repeat the above steps to enter second photo information.';}else{echo '在\'添加相片 URL\'填寫首張相片檔名及填上相片尺寸並提送。您能在Windows檔案管理員將鼠標移到檔案名上,有尺寸數據顯示。再點撀\'再增加新數據\',重覆以上步驟鍵入另一相片資料。';}?></p>	<HR>
		<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '试用';}else if($_SESSION[tn]==EN){echo 'Testing';}else{echo '試用';}?></b> &nbsp;
	<?php if($_SESSION[tn]==PRC){echo '您须点撀此页上的预览,再进行测试。再修改及选用不同设置再预览并试用。';}else if($_SESSION[tn]==EN){echo 'You need to click the above preview button to test your design. You can enter or select different parameters to test their functions and effects.';}else{echo '您須點撀此頁上的預覽,再進行測試。再修改及選用不同設置再預覽並試用。';}?></p>	
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '试用步骤';}else if($_SESSION[tn]==EN){echo 'Testing Steps';}else{echo '試用步驟';}?></b> &nbsp;
	<?php if($_SESSION[tn]==PRC){echo '在预览页,拖拽相片浏览。';}else if($_SESSION[tn]==EN){echo 'You can swipe the photo to browse album.';}else{echo '在預覽頁,拖拽相片瀏覽。';}?></p>	
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
	<?php if($_SESSION[tn]==PRC){echo 'Swipeable相簿创建';}else if($_SESSION[tn]==EN){echo 'Swipeable Album Creating';}else{echo 'Swipeable相簿創建';}   if($tm)echo '<span style="color:black">['.htmlspecialchars($tm).']</span>';?>  
	

	<?php if($tl)$tln = '&tl='.$tl;?>
	
<?php   if($pn){
			$ht = file_get_contents('../panel/'.$roww[pjnbr].'/'.$ap.'.html');
			$htm = explode('<!--part',$ht);
			$pntag = '<!--part'.$pn.'!-->';
			
				for($i=1;$i<sizeof($htm);$i++){
					if(strpos('<!--part'.$htm[$i],$pntag)===false and !$albumowl){$html .= '<!--part'.$htm[$i];}
					else if(strpos('<!--part'.$htm[$i],$pntag)!==false){$albumowl = str_replace($pntag,'','<!--part'.$htm[$i]);}
					else{$htmls .= '<!--part'.$htm[$i];}
					
				;}
			$tabnbgdata = explode('<!--data-tabnbg',$albumowl);
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
				
			$albumowl  = str_replace('<div class="swiper-slide"><div id="'.$pj.$ap.'vnts'.$pn.'" class="vntsns">','',$albumowl);		
			$albumowl  = str_replace('<!--data-tabnbg'.$tabnbgdatn[0].'data-tabnbg!-->','',$albumowl);
			;}						
				$albumowl  = str_replace('</div></div><!--vnts!-->','',$albumowl);

			
			$tbg = explode('<!--data',$albumowl);
			
			$tbgns = explode('<!--owldata',$tbg[0]);
			$tbgnns = explode('owldata!-->',$tbgns[1]);
			$tbgs = explode('@#@',$tbgnns[0]);
			
	
			for($i=1;$i<sizeof($tbg);$i++){
			if($tm==$i){
				$tbgns = explode('data!-->',$tbg[$i]);
				$tbgvlu = explode('@#@',$tbgns[0]);	
			;}	
			;} 
			;}
	?>	
	<FORM action="albumowl.php?pj=<?php echo htmlspecialchars($roww[pjnbr]) ?>&ap=<?php echo htmlspecialchars($roww[ap]) ?>&tm=<?php echo htmlspecialchars($tm) ?>&pn=<?php echo htmlspecialchars($pn).$tln ?>" id="webxls" method="post" data-ajax="false" >
	<?php if($_SESSION[tn]==PRC){echo '添加相片 URL';}else if($_SESSION[tn]==EN){echo 'Add Picture URL';}else{echo '添加相片 URL';}?>
	<input type="text" name="img" placeholder="URL" value="<?php echo htmlspecialchars($tbgvlu[0])?>" required>
	
	<div class="ui-grid-a"><div class="ui-block-a"><?php if($_SESSION[tn]==PRC){echo '标题';}else if($_SESSION[tn]==EN){echo 'title';}else{echo '標題';}?><input type="text" name="imgtitle" placeholder="" value="<?php echo htmlspecialchars($tbgvlu[1])?>">
	</div><div class="ui-block-b"><?php if($_SESSION[tn]==PRC){echo '內容';}else if($_SESSION[tn]==EN){echo 'textarea';}else{echo '內容';}?><input type="text" name="imgftr" placeholder="" value="<?php echo htmlspecialchars($tbgvlu[2])?>"></div></div>
	<div class="ui-grid-a"><div class="ui-block-a"><?php if($_SESSION[tn]==PRC){echo '标题区背景颜色';}else if($_SESSION[tn]==EN){echo 'background color of title area';}else{echo '標題區背景顏色';}?><input type="text" name="imgtbg" placeholder="" value="<?php echo htmlspecialchars($tbgvlu[3])?>"></div><div class="ui-block-b"><?php if($_SESSION[tn]==PRC){echo '內容背景颜色';}else if($_SESSION[tn]==EN){echo 'textarea background color';}else{echo '內容背景顏色';}?>
	<input type="text" name="imgftrbg" placeholder="" value="<?php echo htmlspecialchars($tbgvlu[4])?>"></div></div>
	
	<div class="ui-grid-a"><div class="ui-block-a"><?php if($_SESSION[tn]==PRC){echo '标题颜色';}else if($_SESSION[tn]==EN){echo 'title text color';}else{echo '標題顏色';}?><input type="text" name="imgtclr" placeholder="" value="<?php echo htmlspecialchars($tbgvlu[5])?>"></div><div class="ui-block-b"><?php if($_SESSION[tn]==PRC){echo '內容颜色';}else if($_SESSION[tn]==EN){echo 'textarea color';}else{echo '內容顏色';}?><input type="text" name="imgclr" placeholder="" value="<?php echo htmlspecialchars($tbgvlu[6])?>"></div></div>

<div class="ui-grid-a"><div class="ui-block-a">	
<?php if($_SESSION[tn]==PRC){echo '相阔';}else if($_SESSION[tn]==EN){echo 'photo width';}else{echo '相闊';}?><input type="text" name="photowidth" placeholder="" value="<?php echo htmlspecialchars($tbgvlu[7])?>">	</div><div class="ui-block-b"><?php if($_SESSION[tn]==PRC){echo '相高';}else if($_SESSION[tn]==EN){echo 'photo height';}else{echo '相高';}?><input type="text" name="photoheight" placeholder="" value="<?php echo htmlspecialchars($tbgvlu[8])?>"></div></div>
	<?php if($tm){?>

	<hr>
	<?php ;}//if(){?>
	<input type="hidden" name="guanyin1" value="<?php if(!$_POST[guanyin1])$_SESSION[guanyin1]=rand();
	echo htmlspecialchars($_SESSION[guanyin1]); ?>">
	<div class="ui-grid-b"><div class="ui-block-a">

	<input type="submit" name="submit" id="webxlsbtn" Value="<?php if($_SESSION[tn]==PRC){echo '送交';}else if($_SESSION[tn]==EN){echo 'SEND';}else{echo '送交';}?>">
	</div><div class="ui-block-b">
<a href="#inf" data-rel="popup" data-transition="pop" class="ui-btn ui-btn-b ui-btn-inline ui-corner-all ui-mini">? <?php if($_SESSION[tn]==PRC){echo '解释';}else if($_SESSION[tn]==EN){echo 'Explanation';}else{echo '解釋';}?></a>
	<div data-role="popup" id="inf" style="min-width:300px;max-width:85%" data-position-to="window" data-theme="f"><a href="#" class="ui-btn ui-corner-all ui-icon-delete ui-btn-icon-notext ui-btn-right" data-rel="back"></a>
	<p><b style="color:black">url</b>
	<?php if($_SESSION[tn]==PRC){echo '以上url是相片或网页。';}else if($_SESSION[tn]==EN){echo 'The above url item can be the picture URL/Internet URL of web page.';}else{echo '以上url是相片或網頁。';}?></p>
	<p><?php if($_SESSION[tn]==PRC){echo '您需预备相片并存於panel/'.$roww[pjnbr].'/images档夹或特定互联网伺服器。您亦能显示网页(html档)。';}else if($_SESSION[tn]==EN){echo 'You need to prepare pictures and store them in  panel/'.$roww[pjnbr].'/images folder or specific Internet server.<br>About this function, please refer to the examples of this page. You can also use it to show APP/web page(html file).';}else{echo '您需預備相片並存於panel/'.$roww[pjnbr].'/images檔夾或特定互聯網伺服器。您亦能顯示網頁(html檔)。';}?></p>	
	<HR>
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '使用';}else if($_SESSION[tn]==EN){echo 'Use';}else{echo '使用';}?></b>
	<?php if($_SESSION[tn]==PRC){echo '在移动设备使用应只加简单的标题及內容。';}else if($_SESSION[tn]==EN){echo 'You can add simple words only due to mobile phone usage.';}else{echo '在移動設備使用應只加簡單的標題及內容。';}?></p>
	<HR>
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '标题';}else if($_SESSION[tn]==EN){echo 'Title';}else{echo '標題';}?></b>
	<?php if($_SESSION[tn]==PRC){echo '只能加在相片上的。';}else if($_SESSION[tn]==EN){echo 'It is added on the photo only.';}else{echo '只能加在相片上的。';}?></p>
	<HR>
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '內容';}else if($_SESSION[tn]==EN){echo 'Content';}else{echo '內容';}?></b>
	<?php if($_SESSION[tn]==PRC){echo '置於相片/网页底。';}else if($_SESSION[tn]==EN){echo 'You can add textarea at the bottom of photo or web page.';}else{echo '置於相片/網頁底。';}?></p>
	<HR>
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '相阔';}else if($_SESSION[tn]==EN){echo 'Photo width';}else{echo '相闊';}?>/<?php if($_SESSION[tn]==PRC){echo '相高';}else if($_SESSION[tn]==EN){echo 'photo height';}else{echo '相高';}?></b>
	<?php if($_SESSION[tn]==PRC){echo '填整数。应用页只能控制高度[100%屏阔]。若不填,阔度占100%用户浏览设备的屏阔。在WINDOWS档案管理员,将鼠标移到档案名,有含图像尺寸提示显示。';}else if($_SESSION[tn]==EN){echo 'You need to enter integer. You can control the height for the APP page [100% screen (viewport) width]. If you do not fill in these items, the photo width fits to APP user device\'s screen width. You can move mouse cursor to filename to show picture dimension information in WINDOWS File Manager.';}else{echo '填整數。應用頁只能控制高度[100%屏闊]。若不填,闊度佔100%用戶瀏覽設備的屏闊。在WINDOWS檔案管理員,將鼠標移到檔案名,有含圖像尺寸提示顯示。';}?></p>
	<HR>
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '标题/內容颜色';}else if($_SESSION[tn]==EN){echo 'Title/content color';}else{echo '標題/內容顏色';}?></b>
	<?php if($_SESSION[tn]==PRC){echo '只能用html 颜色码,e.g. #123456。';}else if($_SESSION[tn]==EN){echo 'You can use html color code,e.g. #123456.';}else{echo '只能用html 顏色碼,e.g. #123456。';}?></p>
	<HR>
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '标题/內容区背景颜色';}else if($_SESSION[tn]==EN){echo 'Title/content color';}else{echo '標題/內容區背景顏色';}?></b>
	<?php if($_SESSION[tn]==PRC){echo '您能填上rgb颜色码e.g. rgb(125,125,125), rgba颜色码e.g. rgba(125,125,125,0.5) 或 hex颜色码e.g. #123456。';}else if($_SESSION[tn]==EN){echo 'You can add rgb color code e.g. rgb(125,125,125), rgba color code e.g. rgba(125,125,125,0.5) or hex color code e.g. #123456.';}else{echo '您能填上rgb顏色碼e.g. rgb(125,125,125), rgba顏色碼e.g. rgba(125,125,125,0.5) 或 hex顏色碼e.g. #123456。';}?></p>	<HR>
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '修改相簿';}else if($_SESSION[tn]==EN){echo 'Amend Data';}else{echo '修改相簿';}?></b>
	<?php if($_SESSION[tn]==PRC){echo '当存有数据,数据将在下面列出,点撀相关数据进行修改丶插入[改次序,以编号作准]或删除。';}else if($_SESSION[tn]==EN){echo 'A data list will be showed on the below section. You can click the related data title to amend, insert [re-order by number} or delete.';}else{echo '當存有數據,數據將在下面列出,點撀相關數據進行修改、插入[改次序,以編號作準]或刪除。';}?></p>	
	<HR>
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '使用浏览按钮';}else if($_SESSION[tn]==EN){echo 'Enable navigation buttons';}else{echo '使用瀏覽按鈕';}?></b>
	<?php if($_SESSION[tn]==PRC){echo '此项在修改数据时选择,点选是整个相簿均使用浏览按钮。有否设置浏览按钮,相簿均能左右拖拽浏览。';}else if($_SESSION[tn]==EN){echo 'You can enable the navigation buttons or not when data amendment. The album can be swiped to browse even no navigation button.';}else{echo '此項在修改數據時選擇,點選是整個相簿均使用瀏覽按鈕。有否設置瀏覽按鈕,相簿均能左右拖拽瀏覽。';}?></p>	
	<HR>
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '屏高显示';}else if($_SESSION[tn]==EN){echo 'Viewport height showing';}else{echo '屏高顯示';}?></b>
	<?php if($_SESSION[tn]==PRC){echo '相片占用户浏览设备的屏高,阔度按比例计算。';}else if($_SESSION[tn]==EN){echo 'The photo height is APP user device\'s screen [viewport] height. The photo width will be calculated by ratio.';}else{echo '相片佔用戶瀏覽設備的屏高,闊度按比例計算。';}?><?php if($_SESSION[tn]==PRC){echo '您须填写相片尺寸才能计算。';}else if($_SESSION[tn]==EN){echo 'You need to enter the photo size for calculation.';}else{echo '您須填寫相片尺寸才能計算。';}?></p>	
	<HR>
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '屏高并拖拽';}else if($_SESSION[tn]==EN){echo 'Viewport height showing and drag style';}else{echo '屏高並拖拽顯示';}?></b>
	<?php if($_SESSION[tn]==PRC){echo '相片占用户浏览设备的屏高,阔度按比例计算,大於用户浏览设备的部份须拖拽浏览。此设置须用浏览按钮。';}else if($_SESSION[tn]==EN){echo 'The photo height is APP user device\'s screen [viewport] height. The photo width is calculated by ratio. APP user needs to drag the device screen to view the photo part which exceeds the APP user device\'s screen width. You neend to use the navigation buttons in this style.';}else{echo '相片佔用戶瀏覽設備的屏高,闊度按比例計算,大於用戶瀏覽設備的部份須拖拽瀏覽。此設置須用瀏覽按鈕。';}?></p>	
	<HR>
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '使用内容段按钮';}else if($_SESSION[tn]==EN){echo 'Enable pagination buttons';}else{echo '使用內容段按鈕';}?></b>
	<?php if($_SESSION[tn]==PRC){echo '显示在底部,若使用内容,应不应该用。';}else if($_SESSION[tn]==EN){echo 'The buttons are showed on the bottom of album. If you use the content, you are not recommended to use.';}else{echo '顯示在底部,若使用內容,應不應該用。';}?></p>	
	<HR>
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '自动播放';}else if($_SESSION[tn]==EN){echo 'Enable autoplay';}else{echo '自動播放';}?></b>
	<?php if($_SESSION[tn]==PRC){echo '内容段能自动播放。';}else if($_SESSION[tn]==EN){echo 'The content section can be played automatically.';}else{echo '內容段能自動播放。';}?></p>	
	<HR>
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '自动播放时间';}else if($_SESSION[tn]==EN){echo 'Autoplay Duration';}else{echo '自動播放時間';}?></b>
	<?php if($_SESSION[tn]==PRC){echo '毫秒,填整数,e.g. 3500。';}else if($_SESSION[tn]==EN){echo 'The unit is Millisecond. You need to fill in integer,e.g. 3500.';}else{echo '毫秒,填整數,e.g. 3500。';}?></p>	
	
	<HR>
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '效果';}else if($_SESSION[tn]==EN){echo 'Effect';}else{echo '效果';}?></b>
	<?php if($_SESSION[tn]==PRC){echo '内容段显示效果。';}else if($_SESSION[tn]==EN){echo 'The animation effect of content section can be added.';}else{echo '內容段顯示效果。';}?></p>	
	</div>

</div></div>
	<hr>
	<div class="ui-grid-d"><div class="ui-block-a"></div><div class="ui-block-b"></div><div class="ui-block-c"><a href="albumowl.php?ap=<?php echo htmlspecialchars($roww[ap])?>&pj=<?php echo htmlspecialchars($roww[pjnbr])?>&pn=<?php echo htmlspecialchars($pn)?>" class="ui-btn" data-ajax="false"><?php if($_SESSION[tn]==PRC){echo '再增加新数据';}else if($_SESSION[tn]==EN){echo 'Add new data';}else{echo '再增加新數據';}?></a></div><div class="ui-block-d">
	<?php if(sizeof($tbg)>=3){?>
	<select name="ord" data-theme="b">
	<option value=" "><?php if($_SESSION[tn]==PRC){echo '插入';}else if($_SESSION[tn]==EN){echo 'Insert';}else{echo '插入';}?></option>
	<?php for($i=1;$i<sizeof($tbg);$i++){
	if($i!=$tm and $i!=$tm+1){?><option value="<?php echo $i?>"><?php echo '['.$i.']'?></option>
	<?php ;};}?>
	</select><?php ;}?></div><div class="ui-block-e"><?php if($tm){?>
	<input name="dlt" id="dlt" type="checkbox" data-theme="e" ><label for="dlt"><?php if($_SESSION[tn]==PRC){echo '刪除';}else if($_SESSION[tn]==EN){echo 'Delete';}else{echo '刪除';}?></label><?php ;}?>
	</div></div>
	<?php if(!$tl and $tm){?>
	<div class="ui-grid-d"><div class="ui-block-a"><label for="nav"><?php if($_SESSION[tn]==PRC){echo '使用浏览按钮';}else if($_SESSION[tn]==EN){echo 'Enable navigation buttons';}else{echo '使用瀏覽按鈕';}?></label><input type="checkbox" name="nav" id="nav" value="1" <?php if($tbgs[0])echo 'checked="checked"';?>></div><div class="ui-block-b"><label for="fixhgt"><?php if($_SESSION[tn]==PRC){echo '屏高显示';}else if($_SESSION[tn]==EN){echo 'Viewport height showing';}else{echo '屏高顯示';}?></label><input type="checkbox" name="fixhgt" id="fixhgt" value="1" <?php if($tbgs[1])echo 'checked="checked"';?>></div><div class="ui-block-c"><label for="fixhgtd"><?php if($_SESSION[tn]==PRC){echo '屏高并拖拽';}else if($_SESSION[tn]==EN){echo 'Viewport height showing and drag style';}else{echo '屏高並拖拽顯示';}?></label><input type="checkbox" name="fixhgtd" id="fixhgtd" value="1" <?php if($tbgs[2])echo 'checked="checked"';?>></div><div class="ui-block-d"><label for="pnav"><?php if($_SESSION[tn]==PRC){echo '使用内容段按钮';}else if($_SESSION[tn]==EN){echo 'Enable pagination buttons';}else{echo '使用內容段按鈕';}?></label><input type="checkbox" name="pnav" id="pnav" value="1" <?php if($tbgs[4])echo 'checked="checked"';?>></div><div class="ui-block-e"><label for="auto"><?php if($_SESSION[tn]==PRC){echo '自动播放';}else if($_SESSION[tn]==EN){echo 'Enable autoplay';}else{echo '自動播放';}?></label><input type="checkbox" name="auto" id="auto" value="1" <?php if($tbgs[3])echo 'checked="checked"';?>></div></div>
	
	<div class="ui-grid-a"><div class="ui-block-a">
	<?php if($_SESSION[tn]==PRC){echo '效果';}else if($_SESSION[tn]==EN){echo 'Effect';}else{echo '效果';}?>
	<select name="trn">
	<option value="slide">slide</option>
	<option value="cube" <?php if($tbgs[5]=='cube')echo 'selected="selected"';?>>cube</option>
	<option value="fade" <?php if($tbgs[5]=='fade')echo 'selected="selected"';?>>fade</option>
	<option value="coverflow" <?php if($tbgs[5]=='coverflow')echo 'selected="selected"';?>>coverflow</option>
	</select>
	</div><div class="ui-block-b">
	<?php if($_SESSION[tn]==PRC){echo '自动播放时间';}else if($_SESSION[tn]==EN){echo 'Autoplay Duration';}else{echo '自動播放時間';}?>
	<input type="number" name="autotime" placeholder="" value="<?php echo htmlspecialchars($tbgs[6])?>">
	</div></div>
	<?php ;}?>
	</FORM>
<hr>
<?php
if(sizeof($tbg)){
echo '<div data-role="listview" data-inset="true">';}
for($i=1;$i<sizeof($tbg);$i++){
$tbgnN = explode('data!-->',$tbg[$i]);
$tbgN = explode('@#@',$tbgnN[0]);
echo '<li data-icon="edit"><a href="albumowl.php?ap='.htmlspecialchars($roww[ap]).'&pj='.htmlspecialchars($roww[pjnbr]).'&pn='.htmlspecialchars($pn).'&tm='.$i.'" data-ajax="false">';
echo  '['.$i.']&nbsp;&nbsp;&nbsp;';
echo  htmlspecialchars($tbgN[0]);
if($tbgN[1])echo  '<br>'.htmlspecialchars($tbgN[1]);
if($tbgN[2])echo  '<br>'.htmlspecialchars($tbgN[2]);
echo '</a></li>';
;}
if(sizeof($tbg))echo '</div>';
?>
	<hr>
<hr><script src="../js/appsystem.js"></script>

	<?php 
	if($albumowl){
	if($_SESSION[tn]==PRC){echo '您的设计';}else if($_SESSION[tn]==EN){echo 'Your design';}else{echo '您的設計';}
	$albumowlnv = str_replace('(images/','(../panel/'.$roww[pjnbr].'/images/',$albumowl);
	$albumowlnv = str_replace('data-src="images/','data-src="../panel/'.$roww[pjnbr].'/images/',$albumowlnv);
	echo '<br>'.str_replace('"images/','"../panel/'.$roww[pjnbr].'/images/',$albumowlnv);
		
if(file_exists('../panel/'.$roww[pjnbr].'/web'.$ap.'.js')){
	$jswebn = file_get_contents('../panel/'.$roww[pjnbr].'/web'.$ap.'.js');
	$jswebn=explode('/*webjs'.$pn.'*/',$jswebn);
	echo '<script>$(document).on("pageshow", "#appageone", function(){ '.$jswebn[1].'});</script>';
;}
	}?>
	<hr>
	<a href="#infnsp" data-rel="popup" data-transition="pop" class="ui-btn ui-btn-b ui-btn-inline ui-corner-all ui-mini">? <?php if($_SESSION[tn]==PRC){echo '例';}else if($_SESSION[tn]==EN){echo 'Examples';}else{echo '例';}?></a>
	<div data-role="popup" id="infnsp" style="min-width:300px;max-width:85%" data-position-to="window" data-theme="f"><a href="#" class="ui-btn ui-corner-all ui-icon-delete ui-btn-icon-notext ui-btn-right" data-rel="back"></a>

	<p><?php if($_SESSION[tn]==PRC){echo '您须缩细浏览器尺寸至移动设备大小进行浏览。';}else if($_SESSION[tn]==EN){echo 'You need to resize your browser as mobile device\'s screen size to view this example.';}else{echo '您須縮細瀏覽器尺寸至移動設備大小進行瀏覽。';}?></p>	
<p><?php if($_SESSION[tn]==PRC){echo '若相片存於应用内,将档案存於/panel/'.$roww[pjnbr].'/images。若您用互联网相片,您须键入外置URL.e.g.https://docs.google.com/.......。';}else if($_SESSION[tn]==EN){echo 'If you use the picture stored in the APP, you need to place file to /panel/'.$roww[pjnbr].'/images.  If you use the picture stored in the specific Internet server, you need to enter the external file URL or public URL. e.g. https://docs.google.com/....... ';}else{echo '若相片存於應用內,將檔案存於/panel/'.$roww[pjnbr].'/images。若您用互聯網相片,您須鍵入外置URL.e.g.https://docs.google.com/.......';}?></p>	
	</div> 


<div class="ui-grid-solo swiper" style="position:relative;">
<div class="swiper-wrapper">
  <div class="swiper-slide" style="background-color:#FBEFF8">
  <span style='float:left;position:absolute;top:5.7%;color:BLUE;padding:5px;'>1/3<?php if($_SESSION[tn]==PRC){echo '标题';}else if($_SESSION[tn]==EN){echo 'Title';}else{echo '標題';}?></span>
  <img style="width:100%" src="../images/sw.jpg"/>
  <div class="swiper-album" style="background-color:rgba(255, 255, 255, 0.4);">
  <div style="color:red;" id="albumtilte"><?php if($_SESSION[tn]==PRC){echo '內容..........';}else if($_SESSION[tn]==EN){echo 'textarea............';}else{echo '內容.............';}?></div>
  </div>
	</div>
  <div class="swiper-slide"><span style='float:left;position:absolute;top:5.7%;color:BLUE;padding:5px;'>2/3<?php if($_SESSION[tn]==PRC){echo '标题';}else if($_SESSION[tn]==EN){echo 'Title';}else{echo '標題';}?></span><img style="width:100%" src="../images/ishow2.gif"/></div>
  <div class="swiper-slide"><span style='float:left;position:absolute;top:5.7%;color:BLUE;padding:5px;'>3/3</span><img style="width:100%" src="../images/ishow3.gif"/></div>
</div>
<div class="swiper-pagination"></div> 
<div class="swiper-button-next"></div> 
<div class="swiper-button-prev"></div> 
</div>

<script>
$(document).on("pageshow", "#appageone", function(){ //$(".swiper").find(".swiper-wrapper").css("height","auto");
var swiper = new Swiper(".swiper", {
pagination: '.swiper-pagination', 
paginationClickable: '.swiper-pagination', 
nextButton: '.swiper-button-next', 
prevButton: '.swiper-button-prev'
});
});
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
if($_POST[img] and $pj and $_SESSION[guanyin1] and $_SESSION[guanyin1]==$_POST[guanyin1]){

	if($ap and !preg_match('/^[0-9]*$/', $ap))exit;
	if($pj and !preg_match('/^[0-9]*$/', $pj))exit;	
	if($tm and !preg_match('/^[0-9]*$/', $tm))exit;	

if($_POST[dlt] and $tm){
	$tbg = str_replace('<!--sysalbumowlsys!-->','',$albumowl);
	$tbg = explode('<!--addowl!--></div>',$tbg);
	$tbgs = explode('<!--item!-->',$tbg[0]);
	$popup = $tbgs[0].'<!--item!-->';
	for($i=1;$i<sizeof($tbgs);$i++){
		if($i==$tm){$popup .= '';}
		else{$popup .= $tbgs[$i].'<!--item!-->';}
	;}
	$popup .= '<!--ord!-->';
	$popup = str_replace('<!--item!--><!--ord!-->','',$popup);
	$popup .= '<!--addowl!--></div><!--swiper-pagination!--><!--swiper-button!--></div>';
	
}else if($_POST['ord'] and preg_match('/^[0-9]*$/', $_POST['ord']) and $tm){
	$insert=$_POST['ord'];
	$tbg = str_replace('<!--sysalbumowlsys!-->','',$albumowl);
	$tbg = explode('<!--addowl!--></div>',$tbg);
	$tbgs = explode('<!--item!-->',$tbg[0]);
	$popup = $tbgs[0].'<!--item!-->';

	for($i=1;$i<sizeof($tbgs);$i++){
		if($i==$insert){$popup .= $tbgs[$tm].'<!--item!-->'.$tbgs[$i].'<!--item!-->';}
		else if($i==$tm){$popup .= '';}
		else{$popup .= $tbgs[$i].'<!--item!-->';}
	;}
	$popup .= '<!--ord!-->';
	$popup = str_replace('<!--item!--><!--ord!-->','',$popup);
	$popup .= '<!--addowl!--></div><!--swiper-pagination!--><!--swiper-button!--></div>';
}else if($_POST[img] and $tm){

	$tbg = str_replace('<!--sysalbumowlsys!-->','',$albumowl);	
		if(strpos($albumowl,'data-sizeheight=')!==false){
			$datasizeheight = explode('data-sizeheight=',$albumowl);
			if(sizeof($datasizeheight)==2 and $tbgvlu[8]){$sizejs = '';}
			else{$sizejs =1;}
		}
	$tbgs = explode('<!--addowl!--></div>',$tbg);
	$tbg = explode('<!--item!-->',$tbgs[0]);
	$tbgdata = explode('<!--owldata',$tbg[0]);
	$tbgdatn = explode('owldata!-->',$tbgdata[1]);
	$datn = htmlspecialchars($_POST[nav]).'@#@'.htmlspecialchars($_POST[fixhgt]).'@#@'.htmlspecialchars($_POST[fixhgtd]).'@#@'.htmlspecialchars($_POST[auto]).'@#@'.htmlspecialchars($_POST[pnav]).'@#@'.htmlspecialchars($_POST[trn]).'@#@'.htmlspecialchars($_POST[autotime]);
	$popup = $tbgdata[0].'<!--owldata'.$datn.'owldata!-->'.$tbgdatn[1].'<!--item!-->';
	for($i=1;$i<sizeof($tbg);$i++){
		if($i==$tm){
			$popup .= '<!--data'.htmlspecialchars($_POST[img]).'@#@'.htmlspecialchars($_POST[imgtitle]).'@#@'.htmlspecialchars($_POST[imgftr]).'@#@'.htmlspecialchars($_POST[imgtbg]).'@#@'.htmlspecialchars($_POST[imgftrbg]).'@#@'.htmlspecialchars($_POST[imgtclr]).'@#@'.htmlspecialchars($_POST[imgclr]).'@#@'.htmlspecialchars($_POST[photowidth]).'@#@'.htmlspecialchars($_POST[photoheight]).'data!-->';

			if(!$_POST[imgclr])$_POST[imgclr] ='red';
			$popup .= '<div class="swiper-slide" style="background-color:rgba(255, 255, 255, 0.4)">';
			if($_POST[fixhgtd])$popup .= '<div class="'.$pj.$ap.'imgwidth'.$pn.'" style="overflow-y:hidden;overflow-x:auto;">';
			if($_POST[imgtclr]){$_POST[imgtclr] = 'color:'.htmlspecialchars($_POST[imgtclr]).';';}else{$_POST[imgtclr] = '';}
				if($_POST[imgtbg]){$_POST[imgtbg] ='background-color:'.htmlspecialchars($_POST[imgtbg]).';';}else{$_POST[imgtbg] = '';}

			if(imgtitle)$popup .= '<span style="position:absolute;top:5.7%;padding:5px;float:left;'.$_POST[imgtclr].$_POST[imgtbg].'">'.htmlspecialchars($_POST[imgtitle]).'</span>';	
			
			if(strpos($_POST[img],'http://')!==false or strpos($_POST[img],'https://')!==false){$images = '';}else{$images = 'images/';}
			if(strpos($_POST[img],'.html')!==false){
			if($_POST[photoheight] and preg_match('/^[0-9.]*$/',$_POST[photoheight])){
				$widths = 'data-sizeheight="'.htmlspecialchars($_POST[photoheight]).'"';
				$sizejs =1;}
			$popup .= '<iframe src="'.htmlspecialchars($_POST[img]).'" style="width:100%" class="'.$pj.$ap.'imgwidth'.$pn.'" '.$widths.' seamless frameBorder="0"></iframe>';	
			}else{
			if($_POST[photowidth] and $_POST[photoheight] and preg_match('/^[0-9.]*$/',$_POST[photowidth]) and preg_match('/^[0-9.]*$/',$_POST[photoheight])){
				$widths = 'data-sizewidth="'.htmlspecialchars($_POST[photowidth]).'" data-sizeheight="'.htmlspecialchars($_POST[photoheight]).'"';
				$sizejs =1;}
			if(!$_POST[fixhgt] and !$_POST[fixhgtd] and !$sizejs){$width = 'style="width:100%" class="swiper-lazy"';}else{$width = 'class="'.$pj.$ap.'imgwidth'.$pn.' swiper-lazy"';}
			$popup .= '<img '.$width.' '.$widths.' data-src="'.$images.htmlspecialchars($_POST[img]).'"/><div class="swiper-lazy-preloader swiper-lazy-preloader-white"></div>';	
			;}
			if($_POST[imgftrbg]){$_POST[imgftrbg] =' style="background-color:'.htmlspecialchars($_POST[imgftrbg]).'"';}else{$_POST[imgftrbg] = ' style="background-color:rgba(255, 255, 255, 0.4)"';}
			if($_POST[imgclr]){$_POST[imgclr] =' style="color:'.htmlspecialchars($_POST[imgclr]).'"';}else{$_POST[imgclr] = '';}

			if($_POST[imgftr])$popup .= '<div class="swiper-album"'.$_POST[imgftrbg].'><div'.$_POST[imgclr].'>'.htmlspecialchars($_POST[imgftr]).'</div></div>';	
			if($_POST[fixhgtd])$popup .= '</div>';
			$popup .= '</div><!--item!-->';}
		else{$popup .= $tbg[$i].'<!--item!-->';}
	;}
	$popup .= '<!--ord!-->';
	$popup = str_replace('<!--item!--><!--ord!-->','',$popup);
	$popup .= '<!--addowl!--></div><!--swiper-pagination!--><!--swiper-button!--></div>';

}else if($_POST[img] and !$tm){
	$albumowl = str_replace('<!--sysalbumowlsys!-->','',$albumowl);
	if(strpos($albumowl,'data-sizeheight=')!==false)$sizejs =1;
	if(!$_POST[imgclr])$_POST[imgclr] ='red';
	if($_POST[imgtbg]){$_POST[imgtbg] =' style="background-color:'.htmlspecialchars($_POST[imgtbg]).'"';}else{$_POST[imgtbg] = '';}

	$popup .= '<!--item!--><!--data'.htmlspecialchars($_POST[img]).'@#@'.htmlspecialchars($_POST[imgtitle]).'@#@'.htmlspecialchars($_POST[imgftr]).'@#@'.htmlspecialchars($_POST[imgtbg]).'@#@'.htmlspecialchars($_POST[imgftrbg]).'@#@'.htmlspecialchars($_POST[imgtclr]).'@#@'.htmlspecialchars($_POST[imgclr]).'@#@'.htmlspecialchars($_POST[photowidth]).'@#@'.htmlspecialchars($_POST[photoheight]).'data!--><div class="swiper-slide"'.$_POST[imgtbg].'>';
	if($_POST[fixhgtd])$popup .= '<div class="'.$pj.$ap.'imgwidths'.$pn.'" style="cursor:move;width:100%;overflow:hidden;">';
	
	if($_POST[imgtclr]){$_POST[imgtclr] = 'color:'.htmlspecialchars($_POST[imgtclr]).';';}else{$_POST[imgtclr] = '';}
		if($_POST[imgtbg]){$_POST[imgtbg] ='background-color:'.htmlspecialchars($_POST[imgtbg]).';';}else{$_POST[imgtbg] = '';}

	if(imgtitle)$popup .= '<span style="position:absolute;top:5.7%;float:left;'.$_POST[imgtclr].'padding:5px;'.$_POST[imgtbg].'">'.htmlspecialchars($_POST[imgtitle]).'</span>';
	if(strpos($_POST[img],'http://')!==false or strpos($_POST[img],'https://')!==false){$images = '';}else{$images = 'images/';}
	if(strpos($_POST[img],'.html')!==false){
				if($_POST[photoheight] and preg_match('/^[0-9.]*$/',$_POST[photoheight])){
				$widths = 'data-sizeheight="'.htmlspecialchars($_POST[photoheight]).'"';
				$sizejs =1;}
			$popup .= '<iframe src="'.htmlspecialchars($_POST[img]).'" style="width:100%" class="'.$pj.$ap.'imgwidth'.$pn.'" '.$widths.' seamless frameBorder="0"></iframe>';	
			}else{
			if($_POST[photowidth] and $_POST[photoheight] and preg_match('/^[0-9.]*$/',$_POST[photowidth]) and preg_match('/^[0-9.]*$/',$_POST[photoheight])){
				$widths = 'data-sizewidth="'.htmlspecialchars($_POST[photowidth]).'" data-sizeheight="'.htmlspecialchars($_POST[photoheight]).'"';
				$sizejs =1;}
			if(!$_POST[fixhgt] and !$_POST[fixhgtd] and !$sizejs){$width = 'style="width:100%" class="swiper-lazy"';}else{$width = 'class="'.$pj.$ap.'imgwidth'.$pn.' swiper-lazy"';}
			$popup .= '<img '.$width.' '.$widths.' data-src="'.$images.htmlspecialchars($_POST[img]).'"/><div class="swiper-lazy-preloader swiper-lazy-preloader-white"></div>';	
			;}
	if($_POST[imgftrbg]){$_POST[imgftrbg] =' style="background-color:'.htmlspecialchars($_POST[imgftrbg]).'"';}else{$_POST[imgftrbg] = ' style="background-color:rgba(255, 255, 255, 0.4)"';}
	if($_POST[imgclr]){$_POST[imgclr] =' style="color:'.htmlspecialchars($_POST[imgclr]).'"';}else{$_POST[imgclr] = '';}

	if($_POST[imgftr])$popup .= '<div class="swiper-album"'.$_POST[imgftrbg].'><div'.$_POST[imgclr].'>'.htmlspecialchars($_POST[imgftr]).'</div></div>';
	if($_POST[fixhgtd])$popup .= '</div>';
	$popup .= '</div><!--addowl!-->';

	if($albumowl){
	$popup = str_replace('<!--addowl!-->',$popup,$albumowl);
	}else{
	$popup = '<!--owldataowldata!--><div class="ui-grid-solo" id="'.$pj.$ap.'swiper'.$pn.'"><div class="swiper-wrapper">'.$popup.'</div><!--swiper-pagination!--><!--swiper-button!--></div>';
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

			if($_POST[nav] and strpos($popup,'class="swiper-button')==false)$popup = str_replace('<!--swiper-button!-->','<!--swiper-button!--><div class="swiper-button-next"></div><div class="swiper-button-prev"></div>',$popup);
			if($_POST[pnav] and strpos($popup,'class="swiper-pagination')==false)$popup = str_replace('<!--swiper-pagination!-->','<!--swiper-pagination!--><div class="swiper-pagination"></div>',$popup);

			if($bvtns == 1){
					$vnts  = '<div class="swiper-slide"><div id="'.$pj.$ap.'vnts'.$pn.'" class="vntsns">';
				;}else if($bvtns == 5){
					$vntsn  = '</div></div><!--vnts!-->';
				;}else if($bvtns == 6){
					$vnts  = '';$vntsn  = '';
				;}else{
					$vnts  = '<div class="swiper-slide"><div id="'.$pj.$ap.'vnts'.$pn.'" class="vntsns">';$vntsn  = '</div></div><!--vnts!-->';
				;}
			if($tabnbgdatn[0]){$tabnbgdatns = '<!--data-tabnbg'.$tabnbgdatn[0].'data-tabnbg!-->';}else{$tabnbgdatns = '<!--data-tabnbg@@@@@@data-tabnbg!-->';}				
			$webpopup .= $html.'<!--part'.$pn.'!--><!--sysalbumowlsys!-->'.$vnts.$popup.$vntsn.$tabnbgdatns.$htmls;
			$webpopup .= '</div><!--content!--></div><!--page!-->';
			
		 	
			
			$fpagtrns='../panel/'.$roww[pjnbr].'/'.$ap.'.html';
			file_put_contents($fpagtrns,$html.'<!--part'.$pn.'!--><!--sysalbumowlsys!-->'.$vnts.$popup.$vntsn.$tabnbgdatns.$htmls);

			$fpagtrns='../panel/'.$roww[pjnbr].'/web'.$ap.'.html';
			file_put_contents($fpagtrns,$webpopup);

	

	
	
			if(!file_exists('../panel/'.$roww[pjnbr].'/web'.$ap.'.js')){
			$fpagtrns='../panel/'.$roww[pjnbr].'/web'.$ap.'.js';
			$js = '/*$(document).on(\'pageshow\', \'#web'.$ap.'\', function(){*/';
			$js .= '/*});*/';
			file_put_contents($fpagtrns,$js);			
			;}
			
			if($popup){
			$jsweb = file_get_contents('../panel/'.$roww[pjnbr].'/web'.$ap.'.js');
				
				$jswebs=explode('/*webjs'.$pn.'*/',$jsweb);
				$jsweb = $jswebs[0].$jswebs[2];
				if($_POST[auto]){if($_POST[autotime] and preg_match('/^[0-9]*$/',$_POST[autotime])){$auto =',autoplay: '.$_POST[autotime];}else{$auto =',autoplay: 2200';}}else{$auto ='';}
				//if($_POST[fixhgtd]){$fixhgtd =',touchDrag:false,mouseDrag:false';}
				
				if(($_POST[fixhgt] or $_POST[fixhgtd]) and $sizejs){$fixhgtjs =';$("#'.$pj.$ap.'swiper'.$pn.'").find(".'.$pj.$ap.'imgwidth'.$pn.'").each(function(){
				var sizeheigw = $(this).attr("data-sizeheight");var sizewidw = $(this).attr("data-sizewidth");var style = $(this).attr("style");
				if(style)sizewidw =1;
				if(sizeheigw && sizewidw){if(!style)$(this).width((windowHeight / sizeheigw ) * sizewidw).height(windowHeight);}
				;});';}
				else if($sizejs){
				$fixhgtjs =';$("#'.$pj.$ap.'swiper'.$pn.'").find(".'.$pj.$ap.'imgwidth'.$pn.'").each(function(){
				var sizeheigw = $(this).attr("data-sizeheight");var sizewidw = $(this).attr("data-sizewidth");var style = $(this).attr("style");
				  if(style)sizewidw =1;
				 if ( sizewidw < windowWidth && sizeheigw < windowHeight && sizeheigw && sizewidw){if(!style)$(this).width(sizewidw).height(sizeheigw);}
				 else if ( ( sizewidw / windowWidth ) > ( sizeheigw / windowHeight ) && sizeheigw && sizewidw){if(!style)$(this).width(windowWidth).height(( windowWidth / sizewidw ) * sizeheigw);}
				 else{if(!style)$(this).width(( windowHeight / sizeheigw ) * sizewidw).height(windowHeight);}
				;});';}

				if($_POST[fixhgtd] and $sizejs)$fixhgtdjs = ',onlyExternal:true';
				if($_POST[trn]=='cube'){$trnjs = ",effect:'cube',cube: {shadow: true,slideShadows: true,shadowOffset: 20,shadowScale: 0.94}";}
				else if($_POST[trn]=='coverflow'){$trnjs = ",effect:'coverflow',coverflow: {rotate: 50,stretch: 0,depth: 100,modifier: 1,slideShadows : true}";}
				else if($_POST[trn]=='fade'){$trnjs = ",effect:'fade'";}
				$guanyin=rand();
				$js = '/*webjs'.$pn.'*/'
				.';$("#'.$pj.$ap.'swiper'.$pn.'").find(".swiper-wrapper").css("height","auto");var swiper'.$guanyin.' = new Swiper("#'.$pj.$ap.'swiper'.$pn.'", {pagination: \'.swiper-pagination\',paginationClickable: \'.swiper-pagination\',nextButton: \'.swiper-button-next\',prevButton: \'.swiper-button-prev\',preloadImages: false,lazyLoading: true'.$auto.$fixhgtdjs.$trnjs.'});'
  				.$fixhgtjs
				.'/*webjs'.$pn.'*/'
				.'/*});*/';
				$jsweb=str_replace('/*});*/',$js,$jsweb);
				file_put_contents('../panel/'.$roww[pjnbr].'/web'.$ap.'.js',$jsweb);
				
			;}	
			
	if(($_POST['ord']==' ' or !$_POST['ord']) and !$_POST[dlt])$tmp = '&tm='.htmlspecialchars($tm);
	echo "<meta http-equiv='refresh' content='0;URL=albumowl.php?ap=".htmlspecialchars($roww[ap])."&pj=".htmlspecialchars($roww[pjnbr])."&pn=".htmlspecialchars($pn).$tmp."'>";
;}

?>
	
