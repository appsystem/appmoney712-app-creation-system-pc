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
    <title><?php if($_SESSION[tn]==PRC){echo 'QR二维码 - AppMoney712 移动应用设计系统';}else if($_SESSION[tn]==EN){echo 'QR Code - AppMoney712 APP Creation System';}else{echo 'QR二維碼 - AppMoney712 移動應用設計系統';}?></title>
	<link href="../css/jquery.mobile-1.4.4.min.css" rel="stylesheet">
	<link href="../css/jquerymobile-1.4.4.min.css" rel="stylesheet">
	<link href="../css/icons/style.css" rel="stylesheet">

	<style type="text/css">
		.ifrwidthps{overflow:hidden;}
		.popifr{position:absolute;top:0%;left:0%;index-z:2}.popn{position:absolute;top:0%;right:1em;index-z:2}
	.ui-icon-qr:after{background-image: url("../css/images/qr.svg");}
	.ui-icon-qr:after{background-size: 18px 18px;}
	.ui-icon-qrslt:after{background-image: url("../css/images/qrslt.svg");}
	.ui-icon-qrslt:after{background-size: 18px 18px;}
	.ui-icon-ddpick:after{background-image: url("../css/images/ddpick.svg");}
	.ui-icon-ddpick:after{background-size: 18px 18px;}	
	.ui-icon-dlist:after{background-image: url("../css/images/dlist.svg");}
	.ui-icon-dlist:after{background-size: 18px 18px;}	
	</style>
	<script src="../js/jquery.js"></script>
	<script src="../js/jquery.mobile-1.4.4.min.js"></script>
	<script src="../js/jquery.qrcode.min.js"></script><script src="../js/qr.js"></script>
	<script src="../js/jquery.nest.js"></script>

	<script>
	</script>


</head>
<body>

<div data-role="page" data-theme="f" class="page">
	<div style="overflow: hidden;" data-role="header" data-theme="f">
	<a href="#navigations"  id="menubttn"  data-rel="popup" class="ui-btn ui-btn ui-btn-inline ui-corner-all ui-btn-icon-left ui-icon-bars"><?php if($_SESSION[tn]==PRC){echo '目录';}else if($_SESSION[tn]==EN){echo 'Menu';}else{echo '目錄';}?></a>
    <h1><?php if($_SESSION[tn]==PRC){echo 'QR二维码 - AppMoney712 移动应用设计系统';}else if($_SESSION[tn]==EN){echo 'QR Code - AppMoney712 APP Creation System';}else{echo 'QR二維碼 - AppMoney712 移動應用設計系統';}?></h1>
	
	</div><!-- /header -->
	

	
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
	
		
	<a href="menudesign.php?pj=<?php echo htmlspecialchars($roww[pjnbr])?>&ap=<?php echo $ap?>&pn=<?php echo $pn?>&php=qr&plt=1" data-ajax="false" class="ui-btn ui-btn ui-btn-inline ui-corner-all ui-mini ui-btn-icon-left ui-icon-bars"><?php if($_SESSION[tn]==PRC){echo '专案应用页列表';}else if($_SESSION[tn]==EN){echo 'Project Page List';}else{echo '專案應用頁列表';}?></a>
	<?php ;}?>
	
	<a href="#try" data-rel="popup" data-transition="pop" class="ui-btn ui-btn-f ui-btn-inline ui-corner-all ui-mini" style="color:BLACK"><span class="pigss-pencil" style="color:red"></span><?php if($_SESSION[tn]==PRC){echo '快速试用';}else if($_SESSION[tn]==EN){echo 'Quick try';}else{echo '快速試用';}?></a>
		<div data-role="popup" id="try" data-position-to="window" data-theme="f" class="ifrwidth"><a href="#" data-rel="back" class="popn ui-btn ui-btn-z ui-btn-icon-notext ui-icon-delete"></a><BR><BR>
		
		<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '项目填写';}else if($_SESSION[tn]==EN){echo 'Item information';}else{echo '項目填寫';}?></b> &nbsp;<?php if($_SESSION[tn]==PRC){echo '填写\'内容/URL/键入标题\',在\'用户键入型式\'选用\'使用 [含单选及多选popup]\'并提送。再点撀\'编制预设内容\',再按该页的快速试用指引。若不编写预设数据内容亦能使用。';}else if($_SESSION[tn]==EN){echo 'You need to fill in the Content/URL/Style title and select the Use [single and mulitple popup] option in the APP user style. You need to click the SEND button and then you can click the Edit data options and follow the quick try instruction on the editing page. You can test the design even not editing the data options.';}else{echo '填寫\'內容/URL/键入標題\',在\'用户鍵入型式\'選用\'使用 [含單選及多選popup]\'並提送。再點撀\'編制預設內容\',再按該頁的快速試用指引。若不編寫預設數據內容亦能使用。';}?></p>	
		<HR>
		<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '试用';}else if($_SESSION[tn]==EN){echo 'Testing';}else{echo '試用';}?></b> &nbsp;
	<?php if($_SESSION[tn]==PRC){echo '您须点撀此页上的预览,再进行测试。再修改及选用不同设置再预览并试用。';}else if($_SESSION[tn]==EN){echo 'You need to click the above preview button to test your design. You can enter or select different parameters to test their functions and effects.';}else{echo '您須點撀此頁上的預覽,再進行測試。再修改及選用不同設置再預覽並試用。';}?></p>	
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '试用步骤';}else if($_SESSION[tn]==EN){echo 'Testing Steps';}else{echo '試用步驟';}?></b> &nbsp;
	<?php if($_SESSION[tn]==PRC){echo '按此页的使用指引。';}else if($_SESSION[tn]==EN){echo 'You can follow the Usage instructions on this page.';}else{echo '按此頁的使用指引。';}?></p>	
	<p><?php if($_SESSION[tn]==PRC){echo '若按浏览器的重刷按钮,键入的数据亦被重置,是不同於当您的设计变成应用。';}else if($_SESSION[tn]==EN){echo 'If you click the refresh button of your computer browser, your entered data will be cleared. This situation will not occur when your design is used as APP.';}else{echo '若按瀏覽器的重刷按鈕,鍵入的數據亦被重置,是不同於當您的設計變成應用。';}?></p>
		</div>
		
	<?php if($tl)$tln = '&tl='.$tl;?>
	
	<FORM action="qr.php?pj=<?php echo htmlspecialchars($roww[pjnbr]) ?>&ap=<?php echo htmlspecialchars($roww[ap]) ?>&pn=<?php echo htmlspecialchars($pn).$tln ?>" id="webxls" method="post" data-ajax="false"  onSubmit="return checkform(this);">
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
					if(strpos('<!--part'.$htm[$i],$pntag)===false and !$qrhtm){$html .= '<!--part'.$htm[$i];}
					else if(strpos('<!--part'.$htm[$i],$pntag)!==false){$qrhtm  = str_replace($pntag,'','<!--part'.$htm[$i]);}
					else{$htmls .= '<!--part'.$htm[$i];}
				;}

				$tabnbgdata = explode('<!--data-tabnbg',$qrhtm);
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
				
				$qrhtm  = str_replace('<div class="swiper-slide"><div id="'.$pj.$ap.'vnts'.$pn.'" class="vntsns vtnn">','',$qrhtm);	
				$qrhtm  = str_replace('<!--data-tabnbg'.$tabnbgdatn[0].'data-tabnbg!-->','',$qrhtm);	
				;}			
				$qrhtm  = str_replace('</div></div><!--vnts!-->','',$qrhtm);


	
				
				if($qrhtm){
				$tbgnvlu = explode('<!--data',$qrhtm);
				$tbgsvlu = explode('data!-->',$tbgnvlu[1]);
				$tbgvlu = explode('@#@',$tbgsvlu[0]);

				$pgbtnvlu = $tbgvlu[0];
				$urlvlu = $tbgvlu[1];	
				$qrswpgnvlu = $tbgvlu[2];
				$sizevlu = $tbgvlu[3];
				$clrvlu = $tbgvlu[4];
				$bgvlu = $tbgvlu[5];
				$parkbgvlu = $tbgvlu[6];
				$popupvlu = $tbgvlu[7];
				$popupsvlu = $tbgvlu[8];
				$qrbtnvlu = $tbgvlu[9];
				$qrclrbtnbgvlu = $tbgvlu[10];
				$qroptionbtnbgvlu = $tbgvlu[11];
				$qroptionsbtnbgvlu = $tbgvlu[12];
				$qrbtntvlu = $tbgvlu[13];
				$qrclrbtntvlu = $tbgvlu[14];
				$qroptionbtntvlu = $tbgvlu[15];
				$qroptionsbtntvlu = $tbgvlu[16];
				$qretrvlu = $tbgvlu[17];
				$qrclrvlu = $tbgvlu[18];
				$qrdtvlu = $tbgvlu[19];
				$qrdtsvlu = $tbgvlu[20];
				$qrsetrvlu = $tbgvlu[21];
				$qrsclrvlu = $tbgvlu[22];
				$qrsdtvlu = $tbgvlu[23];
				$qrsdtsvlu = $tbgvlu[24];
				$infovlu = $tbgvlu[25];
				$infoclrvlu = $tbgvlu[26];
				$infofilevlu = $tbgvlu[27];
				$infosvlu = $tbgvlu[28];
				$infosclrvlu = $tbgvlu[29];
				$infosfilevlu = $tbgvlu[30];
				$wsqrsuvlu = $tbgvlu[31];
				$wsqrsdvlu = $tbgvlu[32];
				$wsqrsudvlu = $tbgvlu[33];
				$wsqrstgvlu = $tbgvlu[34];
				$qrvdtsvlu = $tbgvlu[35];
				$wrtqrvlu = $tbgvlu[36];
				$qrdsltvlu = $tbgvlu[37];
				$qrdtskvlu = $tbgvlu[38];
				$qrdtsksvlu = $tbgvlu[39];
				$qrsltpresvlu = $tbgvlu[40];
				;}
		;}
				?>

<p style="color:blue"><?php if($_SESSION[tn]==PRC){echo 'QR二维码编制';}else if($_SESSION[tn]==EN){echo 'QR Code Development';}else{echo 'QR二維碼編制';}?></p>
<?php if($_SESSION[tn]==PRC){echo '內容/URL/键入标题';}else if($_SESSION[tn]==EN){echo 'Content/URL/Style title';}else{echo '內容/URL/键入標題';}?>
	<input type="text" name="url" placeholder=""  value="<?php  echo htmlspecialchars($urlvlu)?>" required>

<div class="ui-grid-d"><div class="ui-block-a"><?php if($qrhtm){?>
<a href="qrv.php?pj=<?php echo htmlspecialchars($roww[pjnbr]) ?>&ap=<?php echo htmlspecialchars($roww[ap])?>&pn=<?php echo htmlspecialchars($pn)?>" data-ajax="false" class="ui-btn ui-btn ui-btn-inline ui-btn-icon-left ui-icon-edit"><?php if($_SESSION[tn]==PRC){echo '编制预设内容';}else if($_SESSION[tn]==EN){echo 'Edit data options';}else{echo '編制預設內容';}?></a><?php ;}//if($qrhtm){?>
	
</div>	<div class="ui-block-b">
<label for="qrswpgn"><?php if($_SESSION[tn]==PRC){echo '用户键入型式';}else if($_SESSION[tn]==EN){echo 'APP user style';}else{echo '用户鍵入型式';}?></label>
	
	<select name="qrswpgn">
	<option value=""></option>  
	<option value="1"  <?php if($qrswpgnvlu=='1')echo 'selected="selected"';?>><?php if($_SESSION[tn]==PRC){echo '使用 [含单选及多选popup]';}else if($_SESSION[tn]==EN){echo 'Use [single and mulitple popup]';}else{echo '使用 [含單選及多選popup]';}?></option>
	<option value="2"  <?php if($qrswpgnvlu=='2')echo 'selected="selected"';?>><?php if($_SESSION[tn]==PRC){echo '使用 [只含单选popup]';}else if($_SESSION[tn]==EN){echo 'Use [single popup]';}else{echo '使用 [只含單選popup]';}?></option>
	<option value="5"  <?php if($qrswpgnvlu=='5')echo 'selected="selected"';?>><?php if($_SESSION[tn]==PRC){echo '使用 [只含多选popup]';}else if($_SESSION[tn]==EN){echo 'Use [mulitple popup]';}else{echo '使用 [只含多選popup]';}?></option>
	<option value="8"  <?php if($qrswpgnvlu=='8')echo 'selected="selected"';?>><?php if($_SESSION[tn]==PRC){echo '使用 [不含单选及多选popup]';}else if($_SESSION[tn]==EN){echo 'Use [without single and mulitple popup]';}else{echo '使用 [不含單選及多選popup]';}?></option>

	</select>
</div>	</div>
<hr>
<?php if($_SESSION[tn]==PRC){echo 'QR二维码数据';}else if($_SESSION[tn]==EN){echo 'QR Code parameters';}else{echo 'QR二維碼數據';}?>	
<div class="ui-grid-c"><div class="ui-block-a">
<?php if($_SESSION[tn]==PRC){echo '尺寸';}else if($_SESSION[tn]==EN){echo 'Size';}else{echo '尺寸';}?>
<input type="number" name="size" placeholder=""  value="<?php if($sizevlu){echo htmlspecialchars($sizevlu);}else{echo 180;}?>">
</div><div class="ui-block-b">
<?php if($_SESSION[tn]==PRC){echo '颜色';}else if($_SESSION[tn]==EN){echo 'Color';}else{echo '顏色';}?>
<input type="text" name="clr" placeholder=""  value="<?php if($clrvlu){echo htmlspecialchars($clrvlu);}else{echo '#000000';}?>">
</div><div class="ui-block-c">
<?php if($_SESSION[tn]==PRC){echo '背景';}else if($_SESSION[tn]==EN){echo 'Background';}else{echo '背景';}?>
<input name="bg" type="text" value="<?php echo htmlspecialchars($bgvlu)?>">
</div>	<div class="ui-block-d">
<BR>
	<a href="#inf" data-rel="popup" class="ui-btn ui-btn-b ui-btn-inline ui-corner-all ui-mini">? <?php if($_SESSION[tn]==PRC){echo '解释';}else if($_SESSION[tn]==EN){echo 'Explanation';}else{echo '解釋';}?></a>
	<div data-role="popup" id="inf" style="min-width:300px;max-width:85%" data-position-to="window" data-theme="f"><a href="#" class="ui-btn ui-corner-all ui-icon-delete ui-btn-icon-notext ui-btn-right" data-rel="back"></a>

<h4 style="color:black"><?php if($_SESSION[tn]==PRC){echo '使用';}else if($_SESSION[tn]==EN){echo 'Usage';}else{echo '使用';}?></h4>
<h4><?php if($_SESSION[tn]==PRC){echo '将键入数据产生二维码。';}else if($_SESSION[tn]==EN){echo 'This function is to convert entered data into QR Code';}else{echo '將鍵入數據產生二維碼。';}?></h4>
<p><?php if($_SESSION[tn]==PRC){echo '您能将您的内容或url创建二维码,显示在应用页上。';}else if($_SESSION[tn]==EN){echo 'You can convert your content or url to QR code which is showed on your APP page.';}else{echo '您能將您的內容或url創建二維碼,顯示在應用頁上。';}?></p>
<hr>

	<h4 style="color:black"><?php if($_SESSION[tn]==PRC){echo '內容/URL/键入标题';}else if($_SESSION[tn]==EN){echo 'Content/URL/Style title';}else{echo '內容/URL/键入標題';}?></h4>
	<p><?php if($_SESSION[tn]==PRC){echo '若选用\'用户键入型式\',是填标题。若不点选此项及不填\'预设内容\'则内容被创建二维码显示在您的应用页上。有关单选项及多选项,见下面解释。';}else if($_SESSION[tn]==EN){echo 'If you select the \'APP user style\', it is for title of data entry field. If you do not use the APP user style and do not fill in the data entry field, the entered data will be converted to QR code showing on your APP page. About the single popup and the multiple popup, please refer to the following related explanation.';}else{echo '若選用\'用戶鍵入型式\',是填標題。若不點選此項及不填\'預設內容\'則內容被創建二維碼顯示在您的應用頁上。有關單選項及多選項,見下面解釋。';}?></p>
	
	<hr>
	<p style="color:black"><?php if($_SESSION[tn]==PRC){echo '以下是选用\'用户键入型式\'才需填写。';}else if($_SESSION[tn]==EN){echo 'The following items are for APP user style only.';}else{echo '以下是選用\'用戶鍵入型式\'才需填寫。';}?></p>
	
	<hr>
	
	<h4 style="color:black"><?php if($_SESSION[tn]==PRC){echo '用户键入型式';}else if($_SESSION[tn]==EN){echo 'APP User style';}else{echo '用户鍵入型式';}?></h4>
<p><?php if($_SESSION[tn]==PRC){echo '您能键入内容或url创建二维码,您能点选\'用户键入型式\',令用户能键入内容或url创建二维码,用户亦能储存键入的数据再供调用。';}else if($_SESSION[tn]==EN){echo 'You can enter content or url to create QR code. Also, you can select the \'APP user style\' to let APP user to enter data for creating QR code. APP User can save these data for reusing them to create QR code.';}else{echo '您能點選\'用戶鍵入型式\',令用戶能鍵入內容或url創建二維碼,用戶亦能儲存鍵入的數據再供調用。';}?></p>
<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '资讯内容';}else if($_SESSION[tn]==EN){echo 'Info content';}else{echo '資訊內容';}?></b> <?php if($_SESSION[tn]==PRC){echo '使用此型式,您应编写内容资讯,建议资讯内容须包括二维码的字数限。';}else if($_SESSION[tn]==EN){echo 'You need to create info button for using this style. It is recommended to include word count limitation of QR code in the info content.';}else{echo '使用此型式,您應編寫內容資訊,建議資訊內容須包括二維碼的字數限。';}?></p>
	<hr>
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '预设内容';}else if($_SESSION[tn]==EN){echo 'Data options';}else{echo '預設內容';}?></b>
	<?php if($_SESSION[tn]==PRC){echo '点撀\'编制预设内容\'进行预设内容编写,作用是供用户点选您的预设内容进行二维码编制。此等内容是在';}else if($_SESSION[tn]==EN){echo 'APP User can click data options provided by you to create QR code. You can click the \'Edit \'. These data show on the following buttons.';}else{echo '點撀\'編制預設內容\'進行預設內容編寫,作用是供用戶點選您的預設內容進行二維碼編制。此等內容是在';}?><a href="#" class="ui-btn ui-btn-w ui-btn-inline ui-icon-qrslt ui-btn-icon-left"><span class="pigss-pencil" style="color:blue"></span></a><a href="#" class="ui-btn ui-btn-w ui-btn-inline ui-icon-bullets ui-btn-icon-left"><span class="pigss-pencil" style="color:blue"></span></a>
<?php if($_SESSION[tn]==PRC){echo '以popup形式显示。用户是不能删除此表的预设内容。当此等项目共八项时,搜寻自动设置。';}else if($_SESSION[tn]==EN){echo 'APP User cannot delete these data on the list and data searching field will be showed when total number of data items => 8.';}else{echo '以popup形式顯示。用戶是不能刪除此表的預設內容。當此等項目共八項時,搜尋自動設置。';}?></p>
	<hr>
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '尺寸';}else if($_SESSION[tn]==EN){echo 'Size';}else{echo '尺寸';}?></b>
	<?php if($_SESSION[tn]==PRC){echo '二维码属方形,填边长尺寸,只填整数,e.g. 180。';}else if($_SESSION[tn]==EN){echo 'The formation of QR code is within square container. You need to enter an integer for edge length. e.g.180';}else{echo '二維碼屬方形,填邊長尺寸,只填整數,e.g. 180。';}?></p>
<hr>
	<h4 style="color:black"><?php if($_SESSION[tn]==PRC){echo '颜色';}else if($_SESSION[tn]==EN){echo 'Color';}else{echo '顏色';}?>
</h4>
	<p><?php if($_SESSION[tn]==PRC){echo '二维码的线纹颜色,填html颜色码,e.g.#123456。';}else if($_SESSION[tn]==EN){echo 'It is the color of QR code. You need to use html color code. e.g. #123456';}else{echo '二維碼的線紋顏色,填html顏色碼,e.g.#123456。';}?></p>
	<p><?php if($_SESSION[tn]==PRC){echo '您须确保此颜色与背色有明显的对比,您须进行扫描测试。';}else if($_SESSION[tn]==EN){echo 'You need to ensure the contrast of QR code and its background suiting for scanning. You need to test it by QR scanning app.';}else{echo '您須確保此顏色與背色有明顯的對比,您須進行掃描測試。';}?></p><hr>
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '背景';}else if($_SESSION[tn]==EN){echo 'Background';}else{echo '背景';}?></b>
	<?php if($_SESSION[tn]==PRC){echo '二维码的背景颜色,填html颜色码,e.g.#123456。';}else if($_SESSION[tn]==EN){echo 'It is the color of QR code background. You need to use html color code. e.g. #123456.';}else{echo '二維碼的背景顏色,填html顏色碼,e.g.#123456。';}?></p>

	</div>
</div>

</div>

<?php if($qrhtm){?>
<hr>

<div class="ui-grid-d"><div class="ui-block-a">
<?php if($_SESSION[tn]==PRC){echo '创建按钮背色';}else if($_SESSION[tn]==EN){echo 'Background of QR button';}else{echo '創建按鈕背色';}?>
<input name="qrbtnbg" type="text" value="<?php echo htmlspecialchars($qrbtnvlu)?>">
</div>	<div class="ui-block-b">
<?php if($_SESSION[tn]==PRC){echo '清除按钮背色';}else if($_SESSION[tn]==EN){echo 'Background of Clear button';}else{echo '清除按鈕背色';}?>
<input name="qrclrbtnbg" type="text" value="<?php echo htmlspecialchars($qrclrbtnbgvlu)?>">
</div>	<div class="ui-block-c">
<?php if($_SESSION[tn]==PRC){echo '单选按钮背色';}else if($_SESSION[tn]==EN){echo 'Background of Option button';}else{echo '單選按鈕背色';}?>
<input name="qroptionbtnbg" type="text" value="<?php echo htmlspecialchars($qroptionbtnbgvlu)?>">
</div>	<div class="ui-block-d">
<?php if($_SESSION[tn]==PRC){echo '多选按钮背色';}else if($_SESSION[tn]==EN){echo 'Background of Option1 button';}else{echo '多選按鈕背色';}?>
<input name="qroptionsbtnbg" type="text" value="<?php echo htmlspecialchars($qroptionsbtnbgvlu)?>">
</div><div class="ui-block-e">
<BR>
<a href="#infss" data-rel="popup" class="ui-btn ui-btn-b ui-btn-inline ui-corner-all ui-mini">? <?php if($_SESSION[tn]==PRC){echo '解释';}else if($_SESSION[tn]==EN){echo 'Explanation';}else{echo '解釋';}?></a>
	<div data-role="popup" id="infss" style="min-width:300px;max-width:85%" data-position-to="window" data-theme="f"><a href="#" class="ui-btn ui-corner-all ui-icon-delete ui-btn-icon-notext ui-btn-right" data-rel="back"></a>
<p><?php if($_SESSION[tn]==PRC){echo '以下项目是应用页面上的按钮。';}else if($_SESSION[tn]==EN){echo 'The following buttons are showed on APP page of your design.';}else{echo '以下項目是應用頁面上的按鈕。';}?></p>
<hr>
<p><b style="color:black"><a href="#" class="ui-btn ui-btn-w ui-btn-inline ui-icon-qr ui-btn-icon-left" id="qrspgn"><span class="pigss-pencil" style="color:blue"></span></a>
<?php if($_SESSION[tn]==PRC){echo '创建二维码按钮';}else if($_SESSION[tn]==EN){echo 'Creating QR Code button';}else{echo '創建二維碼按鈕';}?></b>
<?php if($_SESSION[tn]==PRC){echo '用户点撀此按钮是将键入内容及选妥的预设内容一拼创建二维码。';}else if($_SESSION[tn]==EN){echo 'APP user clicks this button to convert entered content and selected data content to QR code.';}else{echo '用戶點撀此按鈕是將鍵入內容及選妥的預設內容一拼創建二維碼。';}?></p>
	<hr>

<p><b style="color:black"><a href="#" class="ui-btn ui-btn-w ui-btn-inline ui-icon-btn-notext" id="sqrs">X</a>
<?php if($_SESSION[tn]==PRC){echo '清除按钮';}else if($_SESSION[tn]==EN){echo 'Clear button';}else{echo '清除按鈕';}?></b>
<?php if($_SESSION[tn]==PRC){echo '用户点撀此按钮将巳产生的二维码及巳键入的相关内容清除。';}else if($_SESSION[tn]==EN){echo 'APP User clicks this button to clear created QR code and entered content.';}else{echo '用戶點撀此按鈕將巳產生的二維碼及巳鍵入的相關內容清除。';}?></p>
<hr>
<p><b style="color:black"><a href="#qrpgn" class="ui-btn ui-btn-w ui-btn-inline ui-icon-qrslt ui-btn-icon-left" data-transition="pop" data-rel="popup" id="qrspgn"><span class="pigss-pencil" style="color:blue"></span></a><?php if($_SESSION[tn]==PRC){echo '单选popup按钮';}else if($_SESSION[tn]==EN){echo 'Single popup button';}else{echo '單選popup按鈕';}?></b>
<?php if($_SESSION[tn]==PRC){echo '用户点撀此按钮显示自建数据表格,在键入项键入内容,内容被列在数据列表上供选用产生二维码。';}else if($_SESSION[tn]==EN){echo 'APP user can click this button to use the editing function of QR code data. The edited data will be listed and can be used to create QR code. ';}else{echo '用戶點撀此按鈕顯示自建數據表格,在鍵入項键入內容,內容被列在數據列表上供選用產生二維碼。';}?></p>
<hr>
<p><b style="color:black"><a href="#wqrpgn" class="ui-btn ui-btn-w ui-btn-inline ui-icon-bullets ui-btn-icon-left" data-transition="pop" data-rel="popup" id="wqrspgn"><span class="pigss-pencil" style="color:blue"></span></a>
<?php if($_SESSION[tn]==PRC){echo '多选popup按钮';}else if($_SESSION[tn]==EN){echo 'Multiple popup button';}else{echo '多選popup按鈕';}?></b>
<?php if($_SESSION[tn]==PRC){echo '用户点撀此按钮亦同样是显示上述按钮的相同数据列表,但用户能重覆选用数据,用作创建二维码。';}else if($_SESSION[tn]==EN){echo 'APP user clicks this button to show the same data list of the above mentioned. But APP user can select duplicate options on it and combine them to create QR code. ';}else{echo '用戶點撀此按鈕亦同樣是顯示上述按鈕的相同數據列表,但用戶能重覆選用數據,用作創建二維碼。';}?></p>
<hr>
<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '背色';}else if($_SESSION[tn]==EN){echo 'Background color';}else{echo '背色';}?></b>
<?php if($_SESSION[tn]==PRC){echo '此项是按钮的背景颜色。您能填上rgb颜色码e.g. rgb(125,125,125), rgba颜色码e.g. rgba(125,125,125,0.5) 或 hex颜色码e.g. #123456。';}else if($_SESSION[tn]==EN){echo 'It is about the background color of button. You can add rgb color code e.g. rgb(125,125,125), rgba color code e.g. rgba(125,125,125,0.5) or hex color code e.g. #123456.';}else{echo '此項是按鈕的背景顏色。您能填上rgb顏色碼e.g. rgb(125,125,125), rgba顏色碼e.g. rgba(125,125,125,0.5) 或 hex顏色碼e.g. #123456。';}?></p>
<hr>
<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '按钮标题';}else if($_SESSION[tn]==EN){echo 'Button title';}else{echo '按鈕標題';}?></b>
<?php if($_SESSION[tn]==PRC){echo '按钮的标题,不是必须填写。';}else if($_SESSION[tn]==EN){echo 'They are optional items.';}else{echo '按鈕的標題,不是必須填寫。';}?></p>
</div>

<a href="#use" data-rel="popup" class="ui-btn ui-btn-b ui-btn-inline ui-corner-all ui-mini">? <?php if($_SESSION[tn]==PRC){echo '使用';}else if($_SESSION[tn]==EN){echo 'Usage';}else{echo '使用';}?></a>
	<div data-role="popup" id="use" style="min-width:300px;max-width:85%" data-position-to="window" data-theme="f"><a href="#" class="ui-btn ui-corner-all ui-icon-delete ui-btn-icon-notext ui-btn-right" data-rel="back"></a>
<h4 style="color:black"><?php if($_SESSION[tn]==PRC){echo '使用';}else if($_SESSION[tn]==EN){echo 'Usage';}else{echo '使用';}?></h4>
<h4><?php if($_SESSION[tn]==PRC){echo '将内容产生二维码';}else if($_SESSION[tn]==EN){echo 'Convert content into QR Code';}else{echo '將內容產生二維碼';}?></h4>
<p><?php if($_SESSION[tn]==PRC){echo '当巳有键入的数据,再点撀创建二维码按钮,能将数据内容变为二维码。';}else if($_SESSION[tn]==EN){echo 'APP user can convert entered or selected　data content into QR code by clicking the Creating QR Code button.';}else{echo '當巳有鍵入的數據,再點撀創建二維碼按鈕,能將數據內容變為二維碼。';}?></p>
<hr>
<h4 style="color:pink"><?php if($_SESSION[tn]==PRC){echo '单选popup';}else if($_SESSION[tn]==EN){echo 'Single popup';}else{echo '單選popup';}?></h4>
<p><?php if($_SESSION[tn]==PRC){echo '供用户自定选项。';}else if($_SESSION[tn]==EN){echo 'It is for APP user to create custom data option.';}else{echo '供用戶自定選項。';}?></p>
<p><?php if($_SESSION[tn]==PRC){echo '供用户选用预设选项。';}else if($_SESSION[tn]==EN){echo 'It is for APP user to select APP\'s and custom data options.';}else{echo '供用戶選用預設選項。';}?></p>
<p><?php if($_SESSION[tn]==PRC){echo '只能选用一项。';}else if($_SESSION[tn]==EN){echo 'Only One option can be selected on this popup.';}else{echo '只能選用一項。';}?></p>

<hr>
<h4 style="color:pink"><?php if($_SESSION[tn]==PRC){echo '多选popup';}else if($_SESSION[tn]==EN){echo 'Multiple popup';}else{echo '多選popup';}?></h4>
<p><?php if($_SESSION[tn]==PRC){echo '供用户选用预设或自定选项。';}else if($_SESSION[tn]==EN){echo 'It is for APP user to select APP\'s and custom options.';}else{echo '供用戶選用預設或自定選項。';}?></p>
<p><?php if($_SESSION[tn]==PRC){echo '能选用多项。';}else if($_SESSION[tn]==EN){echo 'Multiple options can be selected on this popup and they can be selected repeatly.';}else{echo '能選用多項。';}?></p>

<hr>
<h4 style="color:pink"><?php if($_SESSION[tn]==PRC){echo '删除列表上自定的数据';}else if($_SESSION[tn]==EN){echo 'Custom data deletion';}else{echo '刪除列表上自定的數據';}?></h4>
<p><?php if($_SESSION[tn]==PRC){echo '若点撀列表上的数据,数据显示在键入项内,再点撀清除按钮,再点撀键入按钮,能删除列表上此项数据。';}else if($_SESSION[tn]==EN){echo 'APP user clicks a data title on the data list and then click Clear button to clear the title content showing in the data entry field. The data will be deleted on the list after clicking the data entry button. ';}else{echo '若點撀列表上的數據,數據顯示在鍵入項內,再點撀清除按鈕,再點撀鍵入按鈕,能刪除列表上此項數據。';}?></p>
</div>
	
</div>
</div>


<hr>
<div class="ui-grid-d"><div class="ui-block-a">
<?php if($_SESSION[tn]==PRC){echo '创建按钮标题';}else if($_SESSION[tn]==EN){echo 'Title of QR button';}else{echo '創建按鈕標題';}?>
<input name="qrbtnt" type="text" value="<?php echo htmlspecialchars($qrbtntvlu)?>">
</div>	<div class="ui-block-b">
<?php if($_SESSION[tn]==PRC){echo '清除按钮标题';}else if($_SESSION[tn]==EN){echo 'Title of Clear button';}else{echo '清除按鈕標題';}?>
<input name="qrclrbtnt" type="text" value="<?php echo htmlspecialchars($qrclrbtntvlu)?>">
</div>	<div class="ui-block-c">
<?php if($_SESSION[tn]==PRC){echo '单选按钮标题';}else if($_SESSION[tn]==EN){echo 'Title of Option button';}else{echo '單選按鈕標題';}?>
<input name="qroptionbtnt" type="text" value="<?php echo htmlspecialchars($qroptionbtntvlu)?>">
</div>	<div class="ui-block-d">
<?php if($_SESSION[tn]==PRC){echo '多选按钮标题';}else if($_SESSION[tn]==EN){echo 'Title of Option1 button';}else{echo '多選按鈕標題';}?>
<input name="qroptionsbtnt" type="text" value="<?php echo htmlspecialchars($qroptionsbtntvlu)?>">
</div><div class="ui-block-e"></div></div>
<hr>

<div class="ui-grid-c"><div class="ui-block-a">
<?php if($_SESSION[tn]==PRC){echo '此内容区背景';}else if($_SESSION[tn]==EN){echo 'Background of content area';}else{echo '此內容區背景';}?>
<input name="parkbg" type="text" value="<?php echo htmlspecialchars($parkbgvlu)?>">
</div>	<div class="ui-block-b">
<?php if($_SESSION[tn]==PRC){echo '单选popup背景';}else if($_SESSION[tn]==EN){echo 'Background of single option popup';}else{echo '單選popup背景';}?>
<input name="popupbg" type="text" value="<?php echo htmlspecialchars($popupvlu)?>">
</div>	<div class="ui-block-c">
<?php if($_SESSION[tn]==PRC){echo '多选popup背景';}else if($_SESSION[tn]==EN){echo 'Background of multiple option popup';}else{echo '多選popup背景';}?>
<input name="popupsbg" type="text" value="<?php echo htmlspecialchars($popupsvlu)?>">
</div>	<div class="ui-block-d"><BR>
<a href="#infn" data-rel="popup" class="ui-btn ui-btn-b ui-btn-inline ui-corner-all ui-mini">? <?php if($_SESSION[tn]==PRC){echo '解释';}else if($_SESSION[tn]==EN){echo 'Explanation';}else{echo '解釋';}?></a>
	<div data-role="popup" id="infn" style="min-width:300px;max-width:85%" data-position-to="window" data-theme="f"><a href="#" class="ui-btn ui-corner-all ui-icon-delete ui-btn-icon-notext ui-btn-right" data-rel="back"></a>
<b style="color:black"><?php if($_SESSION[tn]==PRC){echo '此内容区背景';}else if($_SESSION[tn]==EN){echo 'Background of content area';}else{echo '此內容區背景';}?></b>
<p><?php if($_SESSION[tn]==PRC){echo '此段內容的背景图像。';}else if($_SESSION[tn]==EN){echo 'It is about the background of this content area.';}else{echo '此段內容的背景圖像。';}?></p>
<hr>
<b style="color:black"><?php if($_SESSION[tn]==PRC){echo '单选popup背景';}else if($_SESSION[tn]==EN){echo 'Background of single option popup';}else{echo '單選popup背景';}?></b>
<p><?php if($_SESSION[tn]==PRC){echo '上述有关单选popup的显示内容的背景。';}else if($_SESSION[tn]==EN){echo 'It is about the background of content of above mentioned single popup button.';}else{echo '上述有關單選popup的顯示內容的背景。';}?></p>
<hr>
<b style="color:black"><?php if($_SESSION[tn]==PRC){echo '多选popup背景';}else if($_SESSION[tn]==EN){echo 'Background of multiple option popup';}else{echo '多選popup背景';}?></b>
<p><?php if($_SESSION[tn]==PRC){echo '上述有关多选popup的显示内容的背景。';}else if($_SESSION[tn]==EN){echo 'It is about the background of content of above mentioned multiple popup button.';}else{echo '上述有關多選popup的顯示內容的背景。';}?></p><hr>

<b style="color:black"><?php if($_SESSION[tn]==PRC){echo '背景';}else if($_SESSION[tn]==EN){echo 'Background';}else{echo '背景';}?>
</b>
	<p><?php if($_SESSION[tn]==PRC){echo '若设置背景图像上下左右重覆显示,在档案名加[xy]。e.g. picture[xy].png';}else if($_SESSION[tn]==EN){echo 'If you add [xy] to the picture file name (e.g. picture[xy].png, the picture will be repeated both vertically and horizontally.';}else{echo '若設置背景圖像上下左右重覆顯示,在檔案名加[xy]。e.g. picture[xy].png';}?></p>
	<p><?php if($_SESSION[tn]==PRC){echo '若将此图像档案置於此软件内,是放在';}else if($_SESSION[tn]==EN){echo 'You may need to place this file to this software folder ';}else{echo '若將此圖像檔案置於此軟件內,是放在';}echo 'panel/'.$roww[pjnbr].'/images/.';?></p>
	<p><?php if($_SESSION[tn]==PRC){echo '您亦能在背景图像填上rgb颜色码e.g. rgb(125,125,125), rgba颜色码e.g. rgba(125,125,125,0.5) 或 hex颜色码e.g. #123456代替背景图像。';}else if($_SESSION[tn]==EN){echo 'You can add rgb color code e.g. rgb(125,125,125), rgba color code e.g. rgba(125,125,125,0.5) or hex color code e.g. #123456 instead of background picture.';}else{echo '您亦能在背景圖像填上rgb顏色碼e.g. rgb(125,125,125), rgba顏色碼e.g. rgba(125,125,125,0.5) 或 hex顏色碼e.g. #123456代替背景圖像。';}?></p>
</div>
</div>


<hr>
<?php if($_SESSION[tn]==PRC){echo '单选popup';}else if($_SESSION[tn]==EN){echo 'Single option popup';}else{echo '單選popup';}?>
<div class="ui-grid-d"><div class="ui-block-a"><?php if($_SESSION[tn]==PRC){echo '用户编写数据按钮标题';}else if($_SESSION[tn]==EN){echo 'Title of Writing Data button';}else{echo '用戶編寫數據按鈕標題';}?>
<input name="wrtqr" type="text" value="<?php echo htmlspecialchars($wrtqrvlu)?>">
</div><div class="ui-block-b">
<?php if($_SESSION[tn]==PRC){echo '键入按钮标题';}else if($_SESSION[tn]==EN){echo 'Title of Data enter button';}else{echo '鍵入按鈕標題';}?>
<input name="qretr" type="text" value="<?php echo htmlspecialchars($qretrvlu)?>">
</div>	<div class="ui-block-c">
<?php if($_SESSION[tn]==PRC){echo '清除按钮标题';}else if($_SESSION[tn]==EN){echo 'Title of Clear button';}else{echo '清除按鈕標題';}?>
<input name="qrclr" type="text" value="<?php echo htmlspecialchars($qrclrvlu)?>">
</div>	<div class="ui-block-d">
<?php if($_SESSION[tn]==PRC){echo '数据键入项标题';}else if($_SESSION[tn]==EN){echo 'Title of Data entry field';}else{echo '數據鍵入項標題';}?>
<input name="qrdt" type="text" value="<?php echo htmlspecialchars($qrdtvlu)?>">
</div>	
<div class="ui-block-e"><BR>
<a href="#infnn" data-rel="popup" class="ui-btn ui-btn-b ui-btn-inline ui-corner-all ui-mini">? <?php if($_SESSION[tn]==PRC){echo '解释';}else if($_SESSION[tn]==EN){echo 'Explanation';}else{echo '解釋';}?></a>
	<div data-role="popup" id="infnn" style="min-width:300px;max-width:85%" data-position-to="window" data-theme="f"><a href="#" class="ui-btn ui-corner-all ui-icon-delete ui-btn-icon-notext ui-btn-right" data-rel="back"></a>
<p><?php if($_SESSION[tn]==PRC){echo '以下项目是在单选popup内的按钮。';}else if($_SESSION[tn]==EN){echo 'The following buttons are showed on the single option popup.';}else{echo '以下項目是在單選popup內。';}?></p>
<hr>
<p><b style="color:black"><a href="#" class="ui-btn ui-btn-w ui-btn-inline ui-icon-edit ui-btn-icon-left"></a>
<?php if($_SESSION[tn]==PRC){echo '用户编写数据按钮';}else if($_SESSION[tn]==EN){echo 'Writing Data button';}else{echo '用戶編寫數據按鈕';}?></b>
<?php if($_SESSION[tn]==PRC){echo '用户能点撀进行自定数据操作,令此数据列在数据列表上。';}else if($_SESSION[tn]==EN){echo 'APP user clicks this button to edit custom data on the data list.';}else{echo '用戶能點撀進行自定數據操作,令此數據列在數據列表上。';}?></p>
<hr>
<p><b style="color:black"><a href="#" class="ui-btn ui-btn-w ui-btn-inline ui-icon-qr ui-btn-icon-left"><span class="pigss-pencil" style="color:blue"></span></a>
<?php if($_SESSION[tn]==PRC){echo '键入按钮';}else if($_SESSION[tn]==EN){echo 'Data entry button';}else{echo '鍵入按鈕';}?></b>
<?php if($_SESSION[tn]==PRC){echo '用户点撀此按钮是将键入内容确实为选项数据,令此数据列在数据列表上。';}else if($_SESSION[tn]==EN){echo 'APP user clicks this button to insert entered data on the data list.';}else{echo '用戶點撀此按鈕是將鍵入內容確實為選項數據,令此數據列在數據列表上。';}?></p>
	<hr>
<p><b style="color:black"><a href="#" class="ui-btn ui-btn-x ui-btn-inline ui-icon-btn-notext">X</a><?php if($_SESSION[tn]==PRC){echo '清除按钮';}else if($_SESSION[tn]==EN){echo 'Clear button';}else{echo '清除按鈕';}?></b>
<?php if($_SESSION[tn]==PRC){echo '用户点撀此按钮是将巳键入的内容清除。';}else if($_SESSION[tn]==EN){echo 'APP user clicks this button to remove entered data.';}else{echo '用戶點撀此按鈕是將巳鍵入的內容清除。';}?></p>
<p><?php if($_SESSION[tn]==PRC){echo '另一作用是删除列表上的自定数据,若点撀列表上的数据,数据显示在键入项内,再点撀清除按钮,再点撀键入按钮,能删除列表上此项数据。';}else if($_SESSION[tn]==EN){echo 'This button also involves into the deletion of list\'s custom data. APP user clicks a data title on the data list and then click this button to clear the title content showing in the data entry field. The data will be deleted on the list after clicking the data entry button. ';}else{echo '另一作用是刪除列表上的自定數據,若點撀列表上的數據,數據顯示在鍵入項內,再點撀清除按鈕,再點撀鍵入按鈕,能刪除列表上此項數據。';}?></p>
	<hr>
<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '数据键入项';}else if($_SESSION[tn]==EN){echo 'Data entry field';}else{echo '數據鍵入項';}?>	</b>
<?php if($_SESSION[tn]==PRC){echo '作用是键入数据。';}else if($_SESSION[tn]==EN){echo 'It is for data entry.';}else{echo '作用是鍵入數據。';}?></p>
	<hr>
<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '标题或备注';}else if($_SESSION[tn]==EN){echo 'Title or remark';}else{echo '標題或備註';}?></b>
<?php if($_SESSION[tn]==PRC){echo '不是必须填写。';}else if($_SESSION[tn]==EN){echo 'They are optional items.';}else{echo '不是必須填寫。';}?></p>
<p><?php if($_SESSION[tn]==PRC){echo '自定数据列表备注是填文字。';}else if($_SESSION[tn]==EN){echo 'You can enter text content for the Remark of Custom data list';}else{echo '自定數據列表備註是填文字。';}?></p>


<p><?php if($_SESSION[tn]==PRC){echo '预设数据列表备注是以资讯按钮显示备注,您只能填档案名,e.g. 1.html。若在该按钮加标题,格式是[inf]标题[inf]档案名,e.g. [inf]资讯[inf]1.html';}else if($_SESSION[tn]==EN){echo 'The Remark of APP data list[data options] is showed by clicking a info icon button. You can enter filename only. e.g. 1.html If you want to add a title to the info icon button, the format is [inf]title[inf]filename. e.g. [inf]info[inf]1.html';}else{echo '預設數據列表備註是以資訊按鈕顯示備註,您只能填檔案名,e.g. 1.html。若在該按鈕加標題,格式是[inf]標題[inf]檔案名,e.g. [inf]資訊[inf]1.html。';}?></p>
<a href="#" class="ui-btn ui-btn-z ui-btn-inline ui-icon-info ui-btn-icon-left">INFO</a>
<hr>
<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '自定数据键入备注';}else if($_SESSION[tn]==EN){echo 'Remark of Custom data entry';}else{echo '自定數據鍵入備註';}?></b>
<?php if($_SESSION[tn]==PRC){echo '在点撀单选项按钮显示的POPUP顶部再点撀左上方按钮,再显示另一POPUP[资讯按钮形式],限填文字,若在该按钮加标题,格式是[inf]标题[inf]文字内容,e.g. [inf]资讯[inf]资讯内容....。若想在内容内换行,您须键入[br],e.g. [inf]资讯[inf]资讯内容[br]解释。';}else if($_SESSION[tn]==EN){echo 'It is info button showed on the top portion of popup when APP user clicks on the Writing Data button. You can enter text content only. If you want to add a title to the info icon button, the format is [inf]title[inf]content. e.g. [inf]info[inf]info content..... If you want to add row return to the content, you need to add [br] in the content. e.g. info content[br]explaination';}else{echo '在點撀單選項按鈕顯示的POPUP頂部再點撀左上方按鈕,再顯示另一POPUP[資訊按鈕形式],限填文字,若在該按鈕加標題,格式是[inf]標題[inf]文字內容,e.g. [inf]資訊[inf]資訊內容....。若想在內容內換行,您須鍵入[br],e.g. [inf]資訊[inf]資訊內容[br]解釋。';}?></p>

<p><b><?php if($_SESSION[tn]==PRC){echo '复制应用页内容作备注';}else if($_SESSION[tn]==EN){echo 'APP page content copying for the above mentioned remark';}else{echo '複制應用頁內容作備註';}?></b> - <?php if($_SESSION[tn]==PRC){echo '您须使用应用页[不设panel菜单]创建此应用页[简单内容]。您能使用功能\'文字编辑器\'进行创建,您能在此页顶的\'专案应用页列表\'找到应用页的档名。填写的格式是应用页档名[copy],e.g. 1.html[copy],全部是[inf]資訊[inf]1.html[copy]。当修改该应用页,您须在此再提送一次该项的相关数据。';}else if($_SESSION[tn]==EN){echo 'You need to create this APP page[simple content] by using page style - APP page[no panel]. You can edit text content by the function Content Editor. You can find the file name of APP page you created in the above Project Page List. The data format is APP page filename[copy]. e.g. 1.html[copy].For example, it becomes [inf]info[inf]1.html[copy]. If you alter the APP page content, you need to re-send the related item to update the content for this form design. ';}else{echo '您須使用應用頁[不設panel菜單]創建此應用頁[簡單內容]。您能使用功能\'文字編輯器\'進行創建,您能在此頁頂的\'專案應用頁列表\'找到應用頁的檔名。填寫的格式是應用頁檔名[copy],e.g. 1.html[copy],全部是[inf]資訊[inf]1.html[copy]。當修改該應用頁,您須在此再提送一次該項的相關數據。';}?></p>
</div>


<a href="#uses" data-rel="popup" class="ui-btn ui-btn-b ui-btn-inline ui-corner-all ui-mini">? <?php if($_SESSION[tn]==PRC){echo '使用';}else if($_SESSION[tn]==EN){echo 'Usage';}else{echo '使用';}?></a>
	<div data-role="popup" id="uses" style="min-width:300px;max-width:85%" data-position-to="window" data-theme="f"><a href="#" class="ui-btn ui-corner-all ui-icon-delete ui-btn-icon-notext ui-btn-right" data-rel="back"></a>

<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '选项';}else if($_SESSION[tn]==EN){echo 'Selecting option';}else{echo '選項';}?></b>
<?php if($_SESSION[tn]==PRC){echo '自定或预设的数据显示在列表上,点撀列表上的QR二维码符号按钮,将数据内容填到QR二维码的应用页上。';}else if($_SESSION[tn]==EN){echo 'Custom or APP options are showed on a list. APP user can click the QR icon button of a data title on the list to copy its data content to the QR creation page.';}else{echo '自定或預設的數據顯示在列表上,點撀列表上的QR二維碼符號按鈕,將數據內容填到QR二維碼的應用頁上。';}?></p>
<HR>
<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '供用户自定选项';}else if($_SESSION[tn]==EN){echo 'Creating custom data option';}else{echo '供用戶自定選項';}?></b>
<?php if($_SESSION[tn]==PRC){echo '用户在数据键入项上填上内容,再点撀键入按钮,将内容列在数据列表上。';}else if($_SESSION[tn]==EN){echo 'APP user can edit content to the Date entry field and then click the Data entry button to insert the content on the data list.';}else{echo '用戶在數據鍵入項上填上內容,再點撀鍵入按鈕,將內容列在數據列表上。';}?></p>
<HR>
<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '删除列表上自定的数据';}else if($_SESSION[tn]==EN){echo 'Data deletion of data list';}else{echo '刪除列表上自定的數據';}?></b>
<?php if($_SESSION[tn]==PRC){echo '若点撀列表上的数据,数据显示在键入项内,再点撀清除按钮,再点撀键入按钮,能删除列表上此项数据。';}else if($_SESSION[tn]==EN){echo 'APP user clicks a data title on the data list and then click this button to clear the title content showing in the data entry field. The data will be deleted on the list after clicking the data entry button. ';}else{echo '若點撀列表上的數據,數據顯示在鍵入項內,再點撀清除按鈕,再點撀鍵入按鈕,能刪除列表上此項數據。';}?></p>

<HR>
<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '选项浏览标签';}else if($_SESSION[tn]==EN){echo 'Option scrolling tag';}else{echo '選項瀏覽標簽';}?></b>
<?php if($_SESSION[tn]==PRC){echo '在编写预设数据时,您能加设标签,若有此种标签,popup顶部有标签符号按钮,点撀此按钮显示标签的列表,再点撀列表上的相关标题,能将预设的数据列表快速移到同样的标签的数据上。';}else if($_SESSION[tn]==EN){echo 'You can add tag styled button when editing data option. If you add this button, a tag icon button will be showed on the popup. APP user clicks this button to show a list of tag styled buttons and click related title on the list to move web view to the same tag button of APP data list. ';}else{echo '在編寫預設數據時,您能加設標簽,若有此種標簽,popup頂部有標簽符號按鈕,點撀此按鈕顯示標簽的列表,再點撀列表上的相關標題,能將預設的數據列表快速移到同樣的標簽的數據上。';}?></p>

</div>
</div>
</div>
<div class="ui-grid-b"><div class="ui-block-a">
<?php if($_SESSION[tn]==PRC){echo '自定数据键入备注';}else if($_SESSION[tn]==EN){echo 'Remark of Custom data entry';}else{echo '自定數據鍵入備註';}?>
<input name="qrdtsk" type="text" value="<?php echo htmlspecialchars($qrdtskvlu)?>">
</div><div class="ui-block-b">
<?php if($_SESSION[tn]==PRC){echo '自定数据列表备注';}else if($_SESSION[tn]==EN){echo 'Remark of Custom data list';}else{echo '自定數據列表備註';}?>
<input name="qrdts" type="text" value="<?php echo htmlspecialchars($qrdtsvlu)?>">
</div><div class="ui-block-c">
<?php if($_SESSION[tn]==PRC){echo '预设数据列表备注';}else if($_SESSION[tn]==EN){echo 'Remark of APP data list[data options]';}else{echo '預設數據列表備註';}?> [inf]
<input name="qrvdts" type="text" value="<?php echo htmlspecialchars($qrvdtsvlu)?>">
</div>

</div>
<hr>
<?php if($_SESSION[tn]==PRC){echo '多选popup';}else if($_SESSION[tn]==EN){echo 'Multiple option popup';}else{echo '多選popup';}?>
<div class="ui-grid-d"><div class="ui-block-a">
<?php if($_SESSION[tn]==PRC){echo '显示巳选数据按钮标题';}else if($_SESSION[tn]==EN){echo 'Title of Selected Data List button';}else{echo '顯示巳選數據按鈕標題';}?>
<input name="qrdslt" type="text" value="<?php echo htmlspecialchars($qrdsltvlu)?>">
</div><div class="ui-block-b">
<?php if($_SESSION[tn]==PRC){echo '键入按钮标题';}else if($_SESSION[tn]==EN){echo 'Title of Data entry button';}else{echo '鍵入按鈕標題';}?>
<input name="qrsetr" type="text" value="<?php echo htmlspecialchars($qrsetrvlu)?>">
</div>	<div class="ui-block-c">
<?php if($_SESSION[tn]==PRC){echo '清除按钮标题';}else if($_SESSION[tn]==EN){echo 'Title of Clear button';}else{echo '清除按鈕標題';}?>
<input name="qrsclr" type="text" value="<?php echo htmlspecialchars($qrsclrvlu)?>">
</div>	<div class="ui-block-d">
<?php if($_SESSION[tn]==PRC){echo '数据备注';}else if($_SESSION[tn]==EN){echo 'Data remark';}else{echo '數據備註';}?>
<input name="qrsdt" type="text" value="<?php echo htmlspecialchars($qrsdtvlu)?>">
</div>	<div class="ui-block-e">
<?php if($_SESSION[tn]==PRC){echo '到上一页[巳选数据]';}else if($_SESSION[tn]==EN){echo 'Previous page[selected data]';}else{echo '到上一頁[巳選數據]';}?>
<input name="qrsltpres" type="text" value="<?php echo htmlspecialchars($qrsltpresvlu)?>">

</div>
</div>

<div class="ui-grid-d"><div class="ui-block-a">
<?php if($_SESSION[tn]==PRC){echo '向上按钮标题';}else if($_SESSION[tn]==EN){echo 'Title of Up button';}else{echo '向上按鈕標題';}?>
<input name="wsqrsu" type="text" value="<?php echo htmlspecialchars($wsqrsuvlu)?>">
</div>	<div class="ui-block-b">
<?php if($_SESSION[tn]==PRC){echo '向下按钮标题';}else if($_SESSION[tn]==EN){echo 'Title of Down button';}else{echo '向下按鈕標題';}?>
<input name="wsqrsd" type="text" value="<?php echo htmlspecialchars($wsqrsdvlu)?>">
</div>	<div class="ui-block-c">
<?php if($_SESSION[tn]==PRC){echo '重设按钮标题';}else if($_SESSION[tn]==EN){echo 'Title of reset button';}else{echo '重設按鈕標題';}?>
<input name="wsqrsud" type="text" value="<?php echo htmlspecialchars($wsqrsudvlu)?>">
</div><div class="ui-block-d">
<?php if($_SESSION[tn]==PRC){echo '标签按钮标题';}else if($_SESSION[tn]==EN){echo 'Title of tag button';}else{echo '標簽按鈕標題';}?>
<input name="wsqrstg" type="text" value="<?php echo htmlspecialchars($wsqrstgvlu)?>">
</div><div class="ui-block-e">
<?php if($_SESSION[tn]==PRC){echo '数据备注1';}else if($_SESSION[tn]==EN){echo 'Data remark 1';}else{echo '數據備註1';}?> [inf]
<input name="qrsdts" type="text" value="<?php echo htmlspecialchars($qrsdtsvlu)?>">
</div></div>
<?php if($_SESSION[tn]==PRC){echo '巳选数据备注';}else if($_SESSION[tn]==EN){echo 'Remark of selected data';}else{echo '巳選數據備註';}?> [inf]
<input name="qrdtsks" type="text" value="<?php echo htmlspecialchars($qrdtsksvlu)?>">


<a href="#infnns" data-rel="popup" class="ui-btn ui-btn-b ui-btn-inline ui-corner-all ui-mini">? <?php if($_SESSION[tn]==PRC){echo '解释';}else if($_SESSION[tn]==EN){echo 'Explanation';}else{echo '解釋';}?></a>
	<div data-role="popup" id="infnns" style="min-width:300px;max-width:85%" data-position-to="window" data-theme="f"><a href="#" class="ui-btn ui-corner-all ui-icon-delete ui-btn-icon-notext ui-btn-right" data-rel="back"></a>
<p><?php if($_SESSION[tn]==PRC){echo '以下项目是在多选popup内的按钮。';}else if($_SESSION[tn]==EN){echo 'The following buttons are showed on the Multiple option popup.';}else{echo '以下項目是在多選popup內。';}?></p>
<hr>
<p><b style="color:black"><a href="#" class="ui-btn ui-btn-w ui-btn-inline ui-icon-dlist ui-btn-icon-left" id="qrspgn">&nbsp;</a>
<br><?php if($_SESSION[tn]==PRC){echo '显示巳选数据按钮';}else if($_SESSION[tn]==EN){echo 'Selected Data List button';}else{echo '顯示巳選數據按鈕';}?></b>
<?php if($_SESSION[tn]==PRC){echo '用户点撀此按钮是显示巳选数据列表并能进行修改的操作。';}else if($_SESSION[tn]==EN){echo 'APP user clicks this button to view selected data list for QR code creation and perform data amendment.';}else{echo '用戶點撀此按鈕是顯示巳選數據列表並能進行修改的操作。';}?></p>
<p><b style="color:black"><a href="#" class="ui-btn ui-btn-w ui-btn-inline ui-icon-qr ui-btn-icon-left" id="qrspgn"><span class="pigss-pencil" style="color:blue"></span></a>
<br><?php if($_SESSION[tn]==PRC){echo '键入按钮';}else if($_SESSION[tn]==EN){echo 'Data enter button';}else{echo '鍵入按鈕';}?></b>
<?php if($_SESSION[tn]==PRC){echo '用户点撀此按钮是将巳选的内容复制并填写到QR二维码产生的应用页上。';}else if($_SESSION[tn]==EN){echo 'APP user clicks this button to copy selected data to QR code creation page.';}else{echo '用戶點撀此按鈕是將巳選的內容複制並填寫到QR二維碼產生的應用頁上。';}?></p>
	<hr>
<p><b style="color:black"><a href="#" class="ui-btn ui-btn-x ui-btn-inline ui-icon-btn-notext">X</a><?php if($_SESSION[tn]==PRC){echo '清除按钮';}else if($_SESSION[tn]==EN){echo 'Clear button';}else{echo '清除按鈕';}?></b>
<?php if($_SESSION[tn]==PRC){echo '用户点撀此按钮是将巳选入的内容清除。';}else if($_SESSION[tn]==EN){echo 'APP user clicks this button to remove selected data.';}else{echo '用戶點撀此按鈕是將巳選入的內容清除。';}?></p>
<hr>
<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '数据备注';}else if($_SESSION[tn]==EN){echo 'Data remark';}else{echo '數據備註';}?>	</b>
<?php if($_SESSION[tn]==PRC){echo '在用户自定数据列表的上面,限填文字。';}else if($_SESSION[tn]==EN){echo 'It is a remark above the selected data area.';}else{echo '在用戶自定數據列表的上面,限填文字。';}?></p>

	<hr>
<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '数据备注1';}else if($_SESSION[tn]==EN){echo 'Data remark 1';}else{echo '數據備註1';}?> [inf]</b>
<?php if($_SESSION[tn]==PRC){echo '在点撀多选项按钮显示的POPUP顶部[资讯按钮形式],限填档案,e.g. 1.html,若在该按钮加标题,格式是[inf]标题[inf]档案名,e.g. [inf]资讯[inf]1.html。';}else if($_SESSION[tn]==EN){echo 'It is info button showed on the top portion of popup when APP user clicks on the multiple option button. You can enter filename only. e.g. 1.html If you want to add a title to the info icon button, the format is [inf]title[inf]filename. e.g. [inf]info[inf]1.html';}else{echo '在點撀多選項按鈕顯示的POPUP頂部[資訊按鈕形式],限填檔案,e.g. 1.html,若在該按鈕加標題,格式是[inf]標題[inf]檔案名,e.g. [inf]資訊[inf]1.html。';}?></p>
<a href="#" class="ui-btn ui-btn-z ui-btn-inline ui-icon-info ui-btn-icon-left">INFO</a>
	<hr>
<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '巳选数据备注';}else if($_SESSION[tn]==EN){echo 'Remark of selected data';}else{echo '巳選數據備註';}?> [inf]</b>
<?php if($_SESSION[tn]==PRC){echo '在点撀多选项按钮显示的POPUP顶部再点撀左上方按钮,再显示另一POPUP[资讯按钮形式],限填文字,若在该按钮加标题,格式是[inf]标题[inf]文字内容,e.g. [inf]资讯[inf]资讯内容....。若想在内容内换行,您须键入[br],e.g. [inf]资讯[inf]资讯内容[br]解释。';}else if($_SESSION[tn]==EN){echo 'It is info button showed on the top portion of popup when APP user clicks on the Selected Data List button. You can enter text content only. If you want to add a title to the info icon button, the format is [inf]title[inf]content. e.g. [inf]info[inf]info content..... If you want to add row return to the content, you need to add [br] in the content. e.g. info content[br]explaination';}else{echo '在點撀多選項按鈕顯示的POPUP頂部再點撀左上方按鈕,再顯示另一POPUP[資訊按鈕形式],限填文字,若在該按鈕加標題,格式是[inf]標題[inf]文字內容,e.g. [inf]資訊[inf]資訊內容....。若想在內容內換行,您須鍵入[br],e.g. [inf]資訊[inf]資訊內容[br]解釋。';}?></p>

<p><b><?php if($_SESSION[tn]==PRC){echo '复制应用页内容作备注';}else if($_SESSION[tn]==EN){echo 'APP page content copying for the above mentioned remark';}else{echo '複制應用頁內容作備註';}?></b> - <?php if($_SESSION[tn]==PRC){echo '您须使用应用页[不设panel菜单]创建此应用页[简单内容]。您能使用功能\'文字编辑器\'进行创建,您能在此页顶的\'专案应用页列表\'找到应用页的档名。填写的格式是应用页档名[copy],e.g. 1.html[copy],全部是[inf]資訊[inf]1.html[copy]。当修改该应用页,您须在此再提送一次该项的相关数据。';}else if($_SESSION[tn]==EN){echo 'You need to create this APP page[simple content] by using page style - APP page[no panel]. You can edit text content by the function Content Editor. You can find the file name of APP page you created in the above Project Page List. The data format is APP page filename[copy]. e.g. 1.html[copy].For example, it becomes [inf]info[inf]1.html[copy]. If you alter the APP page content, you need to re-send the related item to update the content for this form design. ';}else{echo '您須使用應用頁[不設panel菜單]創建此應用頁[簡單內容]。您能使用功能\'文字編輯器\'進行創建,您能在此頁頂的\'專案應用頁列表\'找到應用頁的檔名。填寫的格式是應用頁檔名[copy],e.g. 1.html[copy],全部是[inf]資訊[inf]1.html[copy]。當修改該應用頁,您須在此再提送一次該項的相關數據。';}?></p>
	<hr>
	
<p><b style="color:black"><a href="#" class="ui-btn ui-btn-z ui-btn-inline ui-icon-arrow-u ui-btn-icon-notext"></a>
			<?php if($_SESSION[tn]==PRC){echo '向上按钮';}else if($_SESSION[tn]==EN){echo 'Up button';}else{echo '向上按鈕';}?></b>
<?php if($_SESSION[tn]==PRC){echo '当巳有巳选数据,点撀此按钮,再点撀列表上的数据,能将数据向上移。';}else if($_SESSION[tn]==EN){echo 'APP user can click this button to reorder the selected data in up direction.';}else{echo '當巳有巳選數據,點撀此按鈕,再點撀列表上的數據,能將數據向上移。';}?></p>

<hr>
<p><b style="color:black"><a href="#" class="ui-btn ui-btn-z ui-btn-inline ui-icon-arrow-d ui-btn-icon-notext"></a>
			<?php if($_SESSION[tn]==PRC){echo '向下按钮';}else if($_SESSION[tn]==EN){echo 'Down button';}else{echo '向下按鈕';}?></b>
<?php if($_SESSION[tn]==PRC){echo '当巳有巳选数据,点撀此按钮,再点撀列表上的数据,能将数据向下移。';}else if($_SESSION[tn]==EN){echo 'APP user can click this button to reorder the selected data in down direction.';}else{echo '當巳有巳選數據,點撀此按鈕,再點撀列表上的數據,能將數據向下移。';}?></p>

<hr>
<p><b style="color:black"><a href="#" class="ui-btn ui-btn-z ui-btn-inline ui-icon-check ui-btn-icon-notext"></a><?php if($_SESSION[tn]==PRC){echo '重设按钮';}else if($_SESSION[tn]==EN){echo 'Reset button';}else{echo '重設按鈕';}?></b>
<?php if($_SESSION[tn]==PRC){echo '将巳选数据重设被选或删除。';}else if($_SESSION[tn]==EN){echo 'APP user can click this button to reset the selected data in selected or deleted status.';}else{echo '將巳選數據重設被選或刪除。';}?></p>

<hr>
<p><b style="color:black"><a href="#" class="ui-btn ui-btn-z ui-btn-inline ui-icon-tag ui-btn-icon-notext"></a><?php if($_SESSION[tn]==PRC){echo '标签按钮';}else if($_SESSION[tn]==EN){echo 'Tag button';}else{echo '標簽按鈕';}?></b>
<?php if($_SESSION[tn]==PRC){echo '快速导航的标签按钮,将列表显示移到预设的标签按钮。';}else if($_SESSION[tn]==EN){echo 'APP user can click this button to shift the screen view to specific tag button on the data list.';}else{echo '快速導航的標簽按鈕,將列表顯示移到預設的標簽按鈕。';}?></p>
<hr>
<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '标题或备注';}else if($_SESSION[tn]==EN){echo 'Title or remark';}else{echo '標題或備註';}?></b>
<?php if($_SESSION[tn]==PRC){echo '不是必须填写。';}else if($_SESSION[tn]==EN){echo 'They ate optional items.';}else{echo '不是必須填寫。';}?></p>
</div>


<a href="#usess" data-rel="popup" class="ui-btn ui-btn-b ui-btn-inline ui-corner-all ui-mini">? <?php if($_SESSION[tn]==PRC){echo '使用';}else if($_SESSION[tn]==EN){echo 'Usage';}else{echo '使用';}?></a>
	<div data-role="popup" id="usess" style="min-width:300px;max-width:85%" data-position-to="window" data-theme="f"><a href="#" class="ui-btn ui-corner-all ui-icon-delete ui-btn-icon-notext ui-btn-right" data-rel="back"></a>

<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '选项';}else if($_SESSION[tn]==EN){echo 'Selecting option';}else{echo '選項';}?></b>
<?php if($_SESSION[tn]==PRC){echo '自定或预设的数据显示在列表上,点撀列表上的数据标题,将数据列在巳选的数据列表上,数据能被重覆选用。';}else if($_SESSION[tn]==EN){echo 'Custom or APP options are showed on a list. APP user can click the data title on the list to insert its data content into the selected data list. The data title can be selected repeatly.';}else{echo '自定或預設的數據顯示在列表上,點撀列表上的數據標題,將數據列在巳選的數據列表上,數據能被重覆選用。';}?></p>
<p><?php if($_SESSION[tn]==PRC){echo '在巳选的数据列上,点撀数据标题,能在标题上显示删除或勾选符号,删除符号的标题是不被复制到QR二维码应用页上。';}else if($_SESSION[tn]==EN){echo 'APP user can click the title on the selected data list to add check or delete icon to the data title. The data with delete icon is not copied as part of selected data on QR creation page.';}else{echo '在巳選的數據列上,點撀數據標題,能在標題上顯示刪除或勾選符號,刪除符號的標題是不被複制到QR二維碼應用頁上。';}?></p>
<p><?php if($_SESSION[tn]==PRC){echo '点撀键入按钮,将数据内容复制到QR二维码的应用页上,是显示在一个有+号符号的按钮上,此内容是作为产生QR二维码的数据。';}else if($_SESSION[tn]==EN){echo 'APP user can click the Data entry button to copy selected data to QR creation page which shows the data on a button with + icon.';}else{echo '點撀鍵入按鈕,將數據內容複制到QR二維碼的應用頁上,是顯示在一個有+號符號的按鈕上,此內容是作為產生QR二維碼的數據。';}?></p>
<HR>
<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '次序';}else if($_SESSION[tn]==EN){echo 'Sequence';}else{echo '次序';}?></b>
<?php if($_SESSION[tn]==PRC){echo '用户能拖拽数据次序按钮作次序变改。';}else if($_SESSION[tn]==EN){echo 'APP user can drap and drop data sequence button to reorder data listing.';}else{echo '用戶能拖拽數據次序按鈕作次序變改。';}?></p>
<a class="ui-btn ui-btn-f ui-btn-icon-left ui-btn-inline ui-icon-ddpick">&nbsp;</a>
<p><?php if($_SESSION[tn]==PRC){echo '亦能点选向上或向下的符号,巳选数据列表上的巳选数据符号变成向上或向下箭咀符号,再点撀数据标题作向上或向下次序修改。';}else if($_SESSION[tn]==EN){echo 'APP user can also click the up button or the down button to alter the selected data icon from check icon to arrow up or arrow down icon. APP user can click the data title on the selected list to reorder the sequence of data.';}else{echo '亦能點選向上或向下的符號,巳選數據列表上的巳選數據符號變成向上或向下箭咀符號,再點撀數據標題作向上或向下次序修改。';}?></p>
<HR>
<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '修改巳选数据';}else if($_SESSION[tn]==EN){echo 'Amendment';}else{echo '修改巳選數據';}?></b>
<?php if($_SESSION[tn]==PRC){echo '在QR二维码应用页上,点撀巳选数据的按钮[含+号],能在popup内修改。';}else if($_SESSION[tn]==EN){echo 'APP user can click the + icon button to amend the data on the popup.';}else{echo '在QR二維碼應用頁上,點撀巳選數據的按鈕[含+號],能在popup內修改。';}?></p>
<HR>
<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '删除巳选数据列表';}else if($_SESSION[tn]==EN){echo 'Deletion of selected data list';}else{echo '刪除巳選數據列表';}?></b>
<?php if($_SESSION[tn]==PRC){echo '点撀清除按钮是将所有巳选数据清除。';}else if($_SESSION[tn]==EN){echo 'APP user can click the clear button to delete the selected data list. ';}else{echo '點撀清除按鈕是將所有巳選數據清除。';}?></p>
<HR>
<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '添加自定内容';}else if($_SESSION[tn]==EN){echo 'Add further content';}else{echo '添加自定內容';}?></b>
<?php if($_SESSION[tn]==PRC){echo '在QR二维码应用页上,若想再加内容到QR二维码,填上的内容是与巳选的内容产生QR二维码。';}else if($_SESSION[tn]==EN){echo 'APP user can add further content on the QR creation page. The further content and the selected data are also converted to QR code.';}else{echo '在QR二維碼應用頁上,若想再加內容到QR二維碼,填上的內容是與巳選的內容產生QR二維碼。';}?></p>


<HR>
<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '选项浏览标签';}else if($_SESSION[tn]==EN){echo 'Option scrolling tag';}else{echo '選項瀏覽標簽';}?></b>
<?php if($_SESSION[tn]==PRC){echo '在编写预设数据时,您能加设标签,若有此种标签,popup顶部有标签符号按钮,点撀此按钮显示标签的列表,再点撀列表上的相关标题,能将预设的数据列表快速移到同样的标签的数据上。';}else if($_SESSION[tn]==EN){echo 'You can add tag styled button when editing data option. If you add this button, a tag icon button will be showed on the popup. APP user clicks this button to show a list of tag styled buttons and click related title on the list to move web view to the same tag button of APP data list. ';}else{echo '在編寫預設數據時,您能加設標簽,若有此種標簽,popup頂部有標簽符號按鈕,點撀此按鈕顯示標簽的列表,再點撀列表上的相關標題,能將預設的數據列表快速移到同樣的標簽的數據上。';}?></p>

</div>




<hr>
<?php if($_SESSION[tn]==PRC){echo 'QR二维码创建资讯';}else if($_SESSION[tn]==EN){echo 'QR Code entry info';}else{echo 'QR二維碼創建資訊';}?>
<div class="ui-grid-c"><div class="ui-block-a">
<?php if($_SESSION[tn]==PRC){echo '资讯按钮标题';}else if($_SESSION[tn]==EN){echo 'Info button title';}else{echo '資訊按鈕標題';}?>
<input name="info" type="text" value="<?php echo htmlspecialchars($infovlu)?>">
</div>	<div class="ui-block-b">
<?php if($_SESSION[tn]==PRC){echo '资讯按钮背色';}else if($_SESSION[tn]==EN){echo 'Background color of Info button';}else{echo '資訊按鈕背色';}?>
<input name="infoclr" type="text" value="<?php echo htmlspecialchars($infoclrvlu)?>">
</div>	<div class="ui-block-c">
<?php if($_SESSION[tn]==PRC){echo '资讯内容';}else if($_SESSION[tn]==EN){echo 'Info content';}else{echo '資訊內容';}?>
<input name="infofile" type="text" value="<?php echo htmlspecialchars($infofilevlu)?>">
</div><div class="ui-block-d">
<br>
<a href="#infnnss" data-rel="popup" class="ui-btn ui-btn-b ui-btn-inline ui-corner-all ui-mini">? <?php if($_SESSION[tn]==PRC){echo '解释';}else if($_SESSION[tn]==EN){echo 'Explanation';}else{echo '解釋';}?></a>

<div data-role="popup" id="infnnss" style="min-width:300px;max-width:85%" data-position-to="window" data-theme="f"><a href="#" class="ui-btn ui-corner-all ui-icon-delete ui-btn-icon-notext ui-btn-right" data-rel="back"></a>
<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo 'QR二维码创建-资讯按钮';}else if($_SESSION[tn]==EN){echo 'QR Code creation - Info button';}else{echo 'QR二維碼創建-資訊按鈕';}?></b>
<?php if($_SESSION[tn]==PRC){echo '此按钮是属於QR二维码创建部份。';}else if($_SESSION[tn]==EN){echo 'This button is for part of QR Code creation.';}else{echo '此按鈕是屬於QR二維碼創建部份。';}?></p>
<hr>
<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '选项资讯按钮';}else if($_SESSION[tn]==EN){echo 'Option popup button';}else{echo '選項資訊按鈕';}?></b>
<?php if($_SESSION[tn]==PRC){echo '此按钮是属於单选及多选项目部份。';}else if($_SESSION[tn]==EN){echo 'This button is for part of single and multiple option button.';}else{echo '此按鈕是屬於單選及多選項目部份。';}?></p>
<hr>
<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '资讯内容';}else if($_SESSION[tn]==EN){echo 'Info content';}else{echo '資訊內容';}?></b> <?php if($_SESSION[tn]==PRC){echo '您须键入此资讯内容的档案才能启用资讯按钮,用户点撀此按钮是以popup形式显示档案内容。建议资讯内容须包括字数限。';}else if($_SESSION[tn]==EN){echo 'You need to enter the Info content[file name] to enable these buttons. APP user clicks the related button to show the related file content on a popup. It is recommended to include word count limitation of QR code in your info content.';}else{echo '您須鍵入此資訊內容的檔案才能啟用資訊按鈕,用戶點撀此按鈕是以popup形式顯示檔案內容。建議資訊內容須包括字數限。';}?></p>

	<hr>
<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '背景颜色';}else if($_SESSION[tn]==EN){echo 'Background color';}else{echo '背景顏色';}?></b>
	
	<p><?php if($_SESSION[tn]==PRC){echo '您能填上rgb颜色码e.g. rgb(125,125,125), rgba颜色码e.g. rgba(125,125,125,0.5) 或 hex颜色码e.g. #123456。';}else if($_SESSION[tn]==EN){echo 'You can add rgb color code e.g. rgb(125,125,125), rgba color code e.g. rgba(125,125,125,0.5) or hex color code e.g. #123456.';}else{echo '您能填上rgb顏色碼e.g. rgb(125,125,125), rgba顏色碼e.g. rgba(125,125,125,0.5) 或 hex顏色碼e.g. #123456。';}?></p>
	</div>
</div>	
</div>

<hr>
<?php if($_SESSION[tn]==PRC){echo '选项资讯';}else if($_SESSION[tn]==EN){echo 'Option popup info';}else{echo '選項資訊';}?>
<div class="ui-grid-b"><div class="ui-block-a">
<?php if($_SESSION[tn]==PRC){echo '资讯按钮标题';}else if($_SESSION[tn]==EN){echo 'Info button title';}else{echo '資訊按鈕標題';}?>
<input name="infos" type="text" value="<?php echo htmlspecialchars($infosvlu)?>">
</div>	<div class="ui-block-b">
<?php if($_SESSION[tn]==PRC){echo '资讯按钮背色';}else if($_SESSION[tn]==EN){echo 'Background color of Info button';}else{echo '資訊按鈕背色';}?>
<input name="infosclr" type="text" value="<?php echo htmlspecialchars($infosclrvlu)?>">
</div>	<div class="ui-block-c">
<?php if($_SESSION[tn]==PRC){echo '资讯内容';}else if($_SESSION[tn]==EN){echo 'Info content';}else{echo '資訊內容';}?>
<input name="infosfile" type="text" value="<?php echo htmlspecialchars($infosfilevlu)?>">
</div>
</div>
<?php ;}//if($qrhtm){?>
	<input type="hidden" name="guanyin1" value="<?php if(!$_POST[guanyin1])$_SESSION[guanyin1]=rand();
	echo htmlspecialchars($_SESSION[guanyin1]); ?>">
	
	<div class="ui-grid-d"><div class="ui-block-a">
	<input type="submit" name="submit" id="webxlsbtn" class="ui-btn" value="<?php if($_SESSION[tn]==PRC){echo '送交';}else if($_SESSION[tn]==EN){echo 'SEND';}else{echo '送交';}?>"></div><div class="ui-block-b"></div><div class="ui-block-c"></div>
	<div class="ui-block-d">
	</div>

	</div>
	</FORM>
	<hr>
	<?php 
	if($qrhtm){
	if($_SESSION[tn]==PRC){echo '您的设计';}else if($_SESSION[tn]==EN){echo 'Your design';}else{echo '您的設計';}
	echo '<br>'.$qrhtm;
	$jsweb = file_get_contents('../panel/'.$roww[pjnbr].'/web'.$ap.'.js');
	$jshtm = explode('/*webjs'.$pn.'*/',$jsweb);
	echo '<script>'.$jshtm[1].'</script>';
	}
	?>
	<hr>

	<?php if($_SESSION[tn]==PRC){echo '例';}else if($_SESSION[tn]==EN){echo 'Example';}else{echo '例';}?> <br>
			
<div style="width:180px" id="qrsw"></div>
<hr>
	<?php if($_SESSION[tn]==PRC){echo '例';}else if($_SESSION[tn]==EN){echo 'Example';}else{echo '例';}?> <br>
<?php if($_SESSION[tn]==PRC){echo '用户键入型式';}else if($_SESSION[tn]==EN){echo 'User style';}else{echo '用戶鍵入型式';}?>/<?php if($_SESSION[tn]==PRC){echo '使用预设内容';}else if($_SESSION[tn]==EN){echo 'Using data content';}else{echo '使用預設內容';}?>


 




	<div style="width:180px"  id="15qrs1"><span class="pigss-pencil" style="font-size:180px"></span></div>
			<div class="ui-grid-solo" style="padding:5px"><hr>
			<a href="#" class="ui-btn ui-btn-w ui-btn-inline ui-icon-qr ui-btn-icon-left" style="color:black;" id="15qrspgn1"><span class="pigss-pencil" style="color:blue"></span><?php if($_SESSION[tn]==PRC){echo '创建按钮标题';}else if($_SESSION[tn]==EN){echo 'Title of QR button';}else{echo '創建按鈕標題';}?></a>
			<a href="#" class="ui-btn ui-btn-w ui-btn-inline ui-icon-btn-notext"  id="15sqrs1"><span style="color:black;">X<?php if($_SESSION[tn]==PRC){echo '清除按钮标题';}else if($_SESSION[tn]==EN){echo 'Title of Clear button';}else{echo '清除按鈕標題';}?></span></a><a href="#15wqfile1" class="ui-btn ui-btn-w ui-btn-inline ui-icon-info ui-btn-icon-left"  style="color:black;" data-transition="pop" data-rel="popup"><?php if($_SESSION[tn]==PRC){echo 'QR二维码创建资讯';}else if($_SESSION[tn]==EN){echo 'QR Code entry info';}else{echo 'QR二維碼創建資訊';}?> - <?php if($_SESSION[tn]==PRC){echo '资讯按钮标题';}else if($_SESSION[tn]==EN){echo 'Info button title';}else{echo '資訊按鈕標題';}?></a><div id="15wqfile1" data-theme="f" class="ifrwidthps"  style="padding:5px;" data-corners="false" data-role="popup"><a href="#" data-rel="back" class="popn ui-btn ui-btn-z ui-btn-icon-notext ui-icon-delete"></a><iframe style="width:100%" src="vw.html" seamless frameBorder="0"></iframe></div><br><?php if($_SESSION[tn]==PRC){echo '內容/URL/键入标题';}else if($_SESSION[tn]==EN){echo 'Content/URL/Style title';}else{echo '內容/URL/键入標題';}?><textarea id="15qrsvlu1" data-corners="false" data-theme="f"></textarea><hr>
			<a href="#15qrpgn1" class="ui-btn ui-btn-w ui-btn-inline ui-icon-qrslt ui-btn-icon-left" style="color:black;"  data-qrsdt="<?php if($_SESSION[tn]==PRC){echo '多选popup';}else if($_SESSION[tn]==EN){echo 'Multiple option popup';}else{echo '多選popup';}?> - <?php if($_SESSION[tn]==PRC){echo '数据备注';}else if($_SESSION[tn]==EN){echo 'Data remark';}else{echo '數據備註';}?>"  data-transition="pop" data-rel="popup" id="15qrspgn1"><span class="pigss-pencil" style="color:blue"></span><?php if($_SESSION[tn]==PRC){echo '单选按钮标题';}else if($_SESSION[tn]==EN){echo 'Title of Option button';}else{echo '單選按鈕標題';}?></a>
			<a href="#15wqrpgn1" class="ui-btn ui-btn-w ui-btn-inline ui-icon-bullets ui-btn-icon-left" style="color:black;"  data-transition="pop" data-rel="popup" id="15wqrspgn1"><span class="pigss-pencil" style="color:blue"></span><?php if($_SESSION[tn]==PRC){echo '多选按钮标题';}else if($_SESSION[tn]==EN){echo 'Title of Option1 button';}else{echo '多選按鈕標題';}?></a><a href="#15wqsfile1" class="ui-btn ui-btn-w ui-btn-inline ui-icon-info ui-btn-icon-left" style="color:black;"  data-transition="pop" data-rel="popup"><?php if($_SESSION[tn]==PRC){echo '选项资讯';}else if($_SESSION[tn]==EN){echo 'Option popup info';}else{echo '選項資訊';}?> - <?php if($_SESSION[tn]==PRC){echo '资讯按钮标题';}else if($_SESSION[tn]==EN){echo 'Info button title';}else{echo '資訊按鈕標題';}?></a><div id="15wqsfile1" data-theme="f" class="ifrwidthpn"  data-corners="false" data-role="popup"><a href="#" data-rel="back" class="popn ui-btn ui-btn-z ui-btn-icon-notext ui-icon-delete"></a><iframe style="width:100%" src="vw.html" seamless frameBorder="0"></iframe></div><div id="15wqrpgnvluhns1"></div><hr>
			
			<div id="15wrtqrpgn1" class="ifrwidthps" data-theme="w" data-corners="false"  style="padding:5px;" data-role="popup">
			<a href="#" class="popn ui-btn ui-corner-all ui-btn-icon-notext ui-icon-carat-r"  id="15wrtpopbtn1"></a>
			<a href="#" class="ui-btn ui-btn-x ui-btn-inline ui-icon-bullets ui-btn-icon-left" id="15sqrspgn1"><span class="pigss-pencil" style="color:blue"></span><?php if($_SESSION[tn]==PRC){echo '单选popup按钮';}else if($_SESSION[tn]==EN){echo 'Single popup button';}else{echo '單選popup按鈕';}?> - <?php if($_SESSION[tn]==PRC){echo '键入按钮标题';}else if($_SESSION[tn]==EN){echo 'Title of Data entry button';}else{echo '鍵入按鈕標題';}?></a>
			<a href="#" class="ui-btn ui-btn-x ui-btn-inline ui-icon-btn-notext" id="15sqrsx1">X<?php if($_SESSION[tn]==PRC){echo '清除按钮标题';}else if($_SESSION[tn]==EN){echo 'Title of Clear button';}else{echo '清除按鈕標題';}?></a>
			<a href="#" id="15qrdtsk1" class="ui-btn ui-btn-x ui-btn-inline ui-icon-info ui-btn-icon-left"><?php if($_SESSION[tn]==PRC){echo '自定数据键入备注';}else if($_SESSION[tn]==EN){echo 'Remark of Custom data entry';}else{echo '自定數據鍵入備註';}?></a><div id="15qrdtskpop1" style="background-color:#595959;left:auto;right:15%;top:5em;z-index:2;position:fixed;display:inline-block;width:65%;display:none;overflow-x:hidden;overflow-y:auto;color:pink;padding:5px;"><a class="ui-btn ui-btn-z ui-btn-inline ui-btn-icon-notext ui-icon-delete" href="#" style="position:absolute;top:0%;right:1em;index-z:2;"></a>???????</div>
			<BR><?php if($_SESSION[tn]==PRC){echo '数据键入项标题';}else if($_SESSION[tn]==EN){echo 'Title of Data entry field';}else{echo '數據鍵入項標題';}?><textarea id="15qrpgnvlu1" data-corners="false" data-theme="f"></textarea>
			<div id="15wrtwqrpgnvlns1" style="overflow-x:hidden;overflow-y:auto;width:100%"><div id="15wrtqrpgnvlus1"></div>
			</div>
			
			<div id="15qrpgn1" class="ifrwidthps" data-theme="w" data-corners="false"  style="padding:5px;" data-role="popup"><a href="#" class="popn ui-btn ui-corner-all ui-btn-icon-notext ui-icon-delete" data-rel="back"></a><a href="#" class="ui-btn ui-btn-x ui-btn-inline ui-icon-edit ui-btn-icon-left" id="15wrtbtn1"><?php if($_SESSION[tn]==PRC){echo '用户编写数据按钮标题';}else if($_SESSION[tn]==EN){echo 'Title of Writing Data button';}else{echo '用戶編寫數據按鈕標題';}?></a><a href="#" id="15wsqrtg1" class="ui-btn ui-btn-z ui-btn-inline ui-icon-tag ui-btn-icon-left"><?php if($_SESSION[tn]==PRC){echo '标签按钮标题';}else if($_SESSION[tn]==EN){echo 'Title of tag button';}else{echo '標簽按鈕標題';}?></a><a href="#" data-popup="15qrpgn1" data-url="vw.html" data-pop="35" class="imgspop ui-btn ui-btn-z ui-btn-inline ui-icon-info ui-btn-icon-left"><?php if($_SESSION[tn]==PRC){echo '预设数据列表备注';}else if($_SESSION[tn]==EN){echo 'Remark of APP data list[data options]';}else{echo '預設數據列表備註';}?></a><div id="15wqrpgnvlns1" data-qrdts="<?php if($_SESSION[tn]==PRC){echo '自定数据列表备注';}else if($_SESSION[tn]==EN){echo 'Remark of Custom data list';}else{echo '自定數據列表備註';}?>" style="width:100%"><div id="15qrpgnvlus1" style="overflow-x:hidden;overflow-y:auto;width:100%"></div><hr><div id="15qrspgnvlus1" style="overflow-x:hidden;overflow-y:auto;width:100%"><ul data-corners="false" data-role="listview" data-inset="true" data-filter="true"  style="width:80%"><li   data-icon="tag" data-theme="b" data-filtertext="pork"><a href="#" data-qr="porkS" class="15vwifrhtm1 ui-btn ui-btn-b ui-btn-icon-right ui-icon-qr" style="border:none;background-color:rgba(125,0,0,0.5)"><img src="../images/ns.png"><h2 style="color:blue;white-space:normal">porkS</h2><h2 style="color:blue;white-space:normal">pork</h2></a></li><li   data-icon="tag" data-theme="b"><a href="#" data-qr="PORKS1" class="15vwifrhtm1 ui-btn ui-btn-b ui-btn-icon-right ui-icon-qr" style="border:none;"><h2 style="color:;white-space:normal">PORKS1</h2><h2 style="color:;white-space:normal">PORKS</h2></a></li></ul><!--qrv!--></div></div></div><div id="15mtsltwqrpgn1" class="ifrwidthps"  style="padding:5px;" data-theme="w" data-corners="false"  data-role="popup"><a href="#" class="popn ui-btn ui-corner-all ui-btn-icon-notext ui-icon-carat-r"  id="15mtsltpopbtn1"></a><a href="#" class="ui-btn ui-btn-x ui-btn-inline" id="15wsqrspgn1"><span class="pigss-pencil" style="color:blue"></span><?php if($_SESSION[tn]==PRC){echo '多选popup按钮';}else if($_SESSION[tn]==EN){echo 'Multiple popup button';}else{echo '多選popup按鈕';}?> - <?php if($_SESSION[tn]==PRC){echo '键入按钮标题';}else if($_SESSION[tn]==EN){echo 'Title of Data entry button';}else{echo '鍵入按鈕標題';}?></a><a href="#" class="ui-btn ui-btn-x ui-btn-inline ui-icon-btn-notext" id="15wsqrsx1">X<?php if($_SESSION[tn]==PRC){echo '清除按钮标题';}else if($_SESSION[tn]==EN){echo 'Title of Clear button';}else{echo '清除按鈕標題';}?></a>
			&nbsp;&nbsp;&nbsp;<a href="#" id="15wsqrsu1" class="ui-btn ui-btn-z ui-btn-inline ui-icon-arrow-u ui-btn-icon-left"><?php if($_SESSION[tn]==PRC){echo '向上按钮标题';}else if($_SESSION[tn]==EN){echo 'Title of Up button';}else{echo '向上按鈕標題';}?></a>
			<a href="#" id="15wsqrsd1" class="ui-btn ui-btn-z ui-btn-inline ui-icon-arrow-d ui-btn-icon-left"><?php if($_SESSION[tn]==PRC){echo '向下按钮标题';}else if($_SESSION[tn]==EN){echo 'Title of Down button';}else{echo '向下按鈕標題';}?></a>
			<a href="#" id="15wsqrsud1" class="ui-btn ui-btn-z ui-btn-inline ui-icon-check ui-btn-icon-left"><?php if($_SESSION[tn]==PRC){echo '重设按钮标题';}else if($_SESSION[tn]==EN){echo 'Title of reset button';}else{echo '重設按鈕標題';}?></a>
			
			<a href="#" id="15qrdtsks1" class="ui-btn ui-btn-x ui-btn-inline ui-icon-info ui-btn-icon-left"><?php if($_SESSION[tn]==PRC){echo '巳选数据备注';}else if($_SESSION[tn]==EN){echo 'Remark of Selected data ';}else{echo '巳選數據備註';}?></a><div id="15qrdtskpops1" style="background-color:#595959;left:auto;right:15%;top:5em;z-index:2;position:fixed;display:inline-block;width:65%;display:none;overflow-x:hidden;overflow-y:auto;color:pink;padding:5px;"><a class="ui-btn ui-btn-z ui-btn-inline ui-btn-icon-notext ui-icon-delete" href="#" style="position:absolute;top:0%;right:1em;index-z:2;"></a>???????</div>
			<div id="15wqrpgnvln1" style="width:100%">
			<div id="15wqrpgnvlu1" class="dd" style="overflow-x:hidden;overflow-y:auto;width:100%"></div>
			<input type="hidden" id="15wqrpgnvluh1">
			
			</div><div id="15wqrpgn1" class="ifrwidthps" data-theme="w" style="padding:5px;" data-corners="false"  data-qrsdt="<?php if($_SESSION[tn]==PRC){echo '多选popup';}else if($_SESSION[tn]==EN){echo 'Multiple option popup';}else{echo '多選popup';}?> - <?php if($_SESSION[tn]==PRC){echo '数据备注';}else if($_SESSION[tn]==EN){echo 'data remark';}else{echo '數據備註';}?>" data-role="popup"><a href="#" class="popn ui-btn ui-corner-all ui-btn-icon-notext ui-icon-delete" data-rel="back"></a><a href="#" class="ui-btn ui-btn-x ui-btn-inline ui-icon-dlist ui-btn-icon-left" id="15wqrpgnbtn1"><?php if($_SESSION[tn]==PRC){echo '显示巳选数据按钮标题';}else if($_SESSION[tn]==EN){echo 'Title of Selected Data List button';}else{echo '顯示巳選數據按鈕標題';}?></a><a href="#" id="15wsqrstg1" class="ui-btn ui-btn-z ui-btn-inline ui-icon-tag ui-btn-icon-left"><?php if($_SESSION[tn]==PRC){echo '标签按钮标题';}else if($_SESSION[tn]==EN){echo 'Title of tag button';}else{echo '標簽按鈕標題';}?></a><a href="#" data-popup="15wqrpgn1" data-url="vw.html" data-pop="35" class="imgspop ui-btn ui-btn-z ui-btn-inline ui-icon-info ui-btn-icon-left"><?php if($_SESSION[tn]==PRC){echo '数据备注1';}else if($_SESSION[tn]==EN){echo 'Data remark 1';}else{echo '數據備註1';}?></a><div id="15wqrpgnvlus1" style="overflow-x:hidden;overflow-y:auto;width:100%"></div><hr><div id="15sqrspgnvlus1" style="overflow-x:hidden;overflow-y:auto;width:100%"><ul data-corners="false" data-role="listview" data-inset="true" data-filter="true"  style="width:80%"><li   data-icon="tag" data-theme="b" data-filtertext="pork"><a href="#" data-qr="porkS" class="15wvwifrhtm1 ui-btn ui-btn-b ui-btn-icon-right ui-icon-qr" style="border:none;background-color:rgba(125,0,0,0.5)"><img src="../images/ns.png"><h2 style="color:blue;white-space:normal">porkS</h2><h2 style="color:blue;white-space:normal">pork</h2></a></li><li   data-icon="tag" data-theme="b"><a href="#" data-qr="PORKS1" class="15wvwifrhtm1 ui-btn ui-btn-b ui-btn-icon-right ui-icon-qr" style="border:none;"><h2 style="color:;white-space:normal">PORKS1</h2><h2 style="color:;white-space:normal">PORKS</h2></a></li></ul><!--qrv!--></div></div></div></div>

<a href="#infs" data-rel="popup" class="ui-btn ui-btn-b ui-btn-inline ui-corner-all ui-mini">? <?php if($_SESSION[tn]==PRC){echo '解释';}else if($_SESSION[tn]==EN){echo 'Explanation';}else{echo '解釋';}?></a>
	<div data-role="popup" id="infs" style="min-width:300px;max-width:85%" data-position-to="window" data-theme="f"><a href="#" class="ui-btn ui-corner-all ui-icon-delete ui-btn-icon-notext ui-btn-right" data-rel="back"></a>
<a href="#" class="ui-btn ui-btn-w ui-btn-inline ui-icon-qr ui-btn-icon-left" id="qrspgn"><span class="pigss-pencil" style="color:blue"></span></a>

<h4 style="color:black"><?php if($_SESSION[tn]==PRC){echo '创建二维码按钮';}else if($_SESSION[tn]==EN){echo 'Creating QR Code button';}else{echo '創建二維碼按鈕';}?></h4>
<p><?php if($_SESSION[tn]==PRC){echo '用户点撀此按钮将键入内容及巳选的内置内容创建二维码。';}else if($_SESSION[tn]==EN){echo 'APP user clicks on this button to create QR code of user\'s defined content and selected content.';}else{echo '用戶點撀此按鈕將键入內容及巳選的內置內容創建二維碼。';}?></p>
	<hr>
 
<a href="#" class="ui-btn ui-btn-w ui-btn-inline ui-icon-btn-notext" id="sqrs">X</a>
<h4 style="color:black"><?php if($_SESSION[tn]==PRC){echo '清除按钮';}else if($_SESSION[tn]==EN){echo 'Clear button';}else{echo '清除按鈕';}?></h4>
<p><?php if($_SESSION[tn]==PRC){echo '用户点撀此按钮将二维码及相关内容清除。';}else if($_SESSION[tn]==EN){echo 'APP user clicks on this button to clear QR code and related content.';}else{echo '用戶點撀此按鈕將二維碼及相關內容清除。';}?></p>
<hr>
<a href="#qrpgn" class="ui-btn ui-btn-w ui-btn-inline ui-icon-qrslt ui-btn-icon-left" data-transition="pop" data-rel="popup" id="qrspgn"><span class="pigss-pencil" style="color:blue"></span></a>
<h4 style="color:black"><?php if($_SESSION[tn]==PRC){echo '创建及选用二维码数据按钮';}else if($_SESSION[tn]==EN){echo 'Creating and selecting QR Code data button';}else{echo '創建及選用二維碼數據按鈕';}?></h4>
<p><?php if($_SESSION[tn]==PRC){echo '若在设计时巳选用\'用户键入型式\',用户点撀此按钮,能键入内容作为创建二维码的数据。用户在巳键入的数据的列表内点撀二维码图案的按钮,能将相关资料复制,再点撀上述的创建二维码按钮,创建二维码。';}else if($_SESSION[tn]==EN){echo 'If you select user style on your design, APP user can click on this button to use the editing function of QR code data. The edited data will be listed. APP user can click on the related button with QR code icon on the data list to copy the data content. APP user can click the above mentioned button to create QR code. ';}else{echo '若在設計時巳選用\'用戶键入型式\',用戶點撀此按鈕,能键入內容作為創建二維碼的數據。用戶在巳键入的數據的列表內點撀二維碼圖案的按鈕,能將相關資料複制,再點撀上述的創建二維碼按鈕,創建二維碼。';}?></p>
<p><?php if($_SESSION[tn]==PRC){echo '若在设计时巳键入\'预设内容\',用户点撀此按钮显示此等内容数据的列表。用户在列表内点撀二维码图案的按钮,能将相关资料复制,再点撀上述的创建二维码按钮,创建二维码。';}else if($_SESSION[tn]==EN){echo 'If you enter Data content on your design, APP user can click on this button to show the list of these data and click on the related button with QR code icon on the data list to copy the data content. APP user can click the above mentioned button to create QR code. ';}else{echo '若在設計時巳键入\'預設內容\',用戶點撀此按鈕顯示此等內容數據的列表。用戶在列表內點撀二維碼圖案的按鈕,能將相關資料複制,再點撀上述的創建二維碼按鈕,創建二維碼。';}?></p>
<p><?php if($_SESSION[tn]==PRC){echo '用户能再键入另一些数据才创建二维码。';}else if($_SESSION[tn]==EN){echo 'APP user can enter further data before creating QR code. ';}else{echo '用戶能再键入另一些數據才創建二維碼。';}?></p>
<hr>
<a href="#wqrpgn" class="ui-btn ui-btn-w ui-btn-inline ui-icon-bullets ui-btn-icon-left" data-transition="pop" data-rel="popup" id="wqrspgn"><span class="pigss-pencil" style="color:blue"></span></a>
<h4 style="color:black"><?php if($_SESSION[tn]==PRC){echo '重覆选用二维码数据按钮';}else if($_SESSION[tn]==EN){echo 'Multi-selecting QR Code data button';}else{echo '重覆選用二維碼數據按鈕';}?></h4>
<p><?php if($_SESSION[tn]==PRC){echo '用户点撀此按钮重覆显示上述按钮的数据列表,但用户能重覆选用,巳选的数据亦列出,在列出的数据上点撀能删除此项的选用(显示x图案)。点撀确实的按钮能将数据覆复{添上+号显示),用户能再键入另一些数据才创建二维码。';}else if($_SESSION[tn]==EN){echo 'APP user clicks on this button to show the data list(s) as the above mentioned with multiple selection [more than 1 option]. APP user can click confirm button to copy the data and create QR code after entering further data if any. ';}else{echo '用戶點撀此按鈕重覆顯示上述按鈕的數據列表,但用戶能重覆選用,巳選的數據亦列出,在列出的數據上點撀能刪除此項的選用(顯示x圖案)。點撀確實的按鈕能將數據覆複{添上+號顯示),用戶能再键入另一些數據才創建二維碼。';}?></p>

<?php //<h4><hr>if($_SESSION[tn]==PRC){echo '数据列表';}else if($_SESSION[tn]==EN){echo 'data list';}else{echo '數據列表';}</h4>?>
<?php //<p>if($_SESSION[tn]==PRC){echo '数据列表的搜寻功能限制只用於大於特定用户设备屏的尺寸。';}else if($_SESSION[tn]==EN){echo 'The filtering function of data list is limited to greater than specific screen size of APP user device. ';}else{echo '數據列表的搜尋功能限制只用於大於特定用戶設備屏的尺寸。';}</p>?>

</div>		
	<div id="navigations" data-role="popup" data-theme="none">
	<ul style="min-width:210px;" data-role="listview" data-inset="true">
	<li data-icon="edit"><a href="design.php" data-ajax="false"><?php if($_SESSION[tn]==PRC){echo '设计步骤';}else if($_SESSION[tn]==EN){echo 'Design Step';}else{echo '設計步驟';}?></a></li>
	<!--<li><a href="deignote.php" data-ajax="false"><?php if($_SESSION[tn]==PRC){echo '设计笔记';}else if($_SESSION[tn]==EN){echo 'Design Note';}else{echo '設計筆記';}?></a></li>!-->
	<li><a href="project.php" data-ajax="false"><?php if($_SESSION[tn]==PRC){echo '专案管理';}else if($_SESSION[tn]==EN){echo 'Project Management';}else{echo '專案管理';}?></a></li>
	<li><a href="tool.php" data-ajax="false"><?php if($_SESSION[tn]==PRC){echo '工具';}else if($_SESSION[tn]==EN){echo 'Tools';}else{echo '工具';}?></a></li>


	<li><a href="explanation.php" data-ajax="false"><?php if($_SESSION[tn]==PRC){echo '解释';}else if($_SESSION[tn]==EN){echo 'Explanation';}else{echo '解釋';}?></a></li>

	

	</ul></div><!-- /navigation -->	
	<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
	<hr>
	<div class="copyright">&copy; 2015 Lee Wai Kwok(Hong Kong). JSTRUST CONSULTANCY. <?php if($_SESSION[tn]==PRC){echo '版权所有';}else if($_SESSION[tn]==EN){echo 'All Rights Reserved.';}else{echo '版權所有';}?></div>
	</div><!-- /content -->
	</div><!-- /page -->
</body></html>
<script>
$("#qrsw").qrcode({"render": "div","background":"#DCF8F8","size":180,"fill":"#0B0B3B","quiet": 1,"text":"http://www.software-iso-9001.com"});
$("#qrspgn").click(function(event){
event.preventDefault();
var valw = $("#qrsvlu").val();
var htmlw = $("#wqrpgnvluhns").html()
if(valw && htmlw){
var qrsvlu = valw+' /// '+htmlw;}
else if(valw){var qrsvlu = valw;}
else if(htmlw){var qrsvlu = htmlw;}
$('#wqrpgnvlu').data('');
$('#wqrpgnvlu').data('');
$("#qr").html('');
if(qrsvlu){$("#qr").qrcode({"render": "div","background":"#DCF8F8","size":180,"fill":"#0B0B3B","quiet": 1,"text":qrsvlu});}
else{$("#qr").html('<span class="pigss-pencil" style="color:#0B0B3B;font-size:180px"></span>');}
});
qrs('','',$(window).height());
var widw = $(window).width()*0.85;var heigw = $(window).height()*0.85;
$(".ifrwidthp").width(widw);
$(".ifrwidthp").css('max-height',heigw);


localStorage.setItem('15sqrspgn1','["pork","pork1"]');

$("#15qrspgn1").click(function(event){event.preventDefault();var valw = $("#15qrsvlu1").val();var htmlw = $("#15wqrpgnvluhns1").html();if(valw && htmlw){var qrsvlu = valw+" /// "+htmlw;}else if(valw){var qrsvlu = valw;}else if(htmlw){var qrsvlu = htmlw;};$("#15qrs1").html('');if(qrsvlu){$("#15wqrpgnvlu1").data("wqrpgnvluhs","");$("#15wqrpgnvlu1").data("wqrpgnvluh","");$("#15qrs1").qrcode({"render": "div","background":"","size":180,"fill":"#000000","quiet": 1,"text":qrsvlu});}else{$("#15qrs1").html('<span class="pigss-pencil" style="color:#000000;font-size:180px"></span>');}});qrs(15,1,$(window).height());$("#15wqrpgnvlu1").nest();/*webjs1*//*});*/

 $('#15wqrpgnvlu1').nest();

</script>
<script src="../js/appsystem.js"></script>
<?php 
$tdy=0;
$tdy=date('Y-m-d');
if($_POST['url'] and $pj and $_SESSION[guanyin1] and $_SESSION[guanyin1]==$_POST[guanyin1]){

	
	if($ap and !preg_match('/^[0-9]*$/', $ap))exit;
	if($pj and !preg_match('/^[0-9]*$/', $pj))exit;	
	if($pn and !preg_match('/^[0-9]*$/', $pn))exit;	
	if(!$_POST[qrclrbtnt])$_POST[qrclrbtnt]='X';
	if(!$_POST[qrclr])$_POST[qrclr]='X';
	if(!$_POST[qrsclr])$_POST[qrsclr]='X';
	
	if($_POST[qrbtnbg])$qrbtnbg='style="background-color:'.htmlspecialchars($_POST[qrbtnbg]).'"';	
	if($_POST[qrclrbtnbg])$qrclrbtnbg='style="background-color:'.htmlspecialchars($_POST[qrclrbtnbg]).'"';	
	if($_POST[qroptionbtnbg]){$qroptionbtnbg='style="background-color:'.htmlspecialchars($_POST[qroptionbtnbg]).';color:black;"';}
		else{$qroptionbtnbg='style="color:black;"';}	
	if($_POST[qroptionsbtnbg]){$qroptionsbtnbg='style="background-color:'.htmlspecialchars($_POST[qroptionsbtnbg]).';color:black;"';	}
		else{$qroptionsbtnbg='style="color:black;"';}	
	
	if(strpos($_POST[popupbg],'http://')!==false or strpos($_POST[popupbg],'https://')!==false){$images = '';}else{$images = 'images/';}
			
			if(strpos($_POST[popupbg],'#')!==false or strpos($_POST[popupbg],'rgba(')!==false  or strpos($_POST[popupbg],'rgb(')!==false){
			$popupbghtml = 'background-color:'.htmlspecialchars($_POST[popupbg]).';';}
			else if(strpos($_POST[popupbg],'[xy]')!==false){$popupbghtml = 'background-image:url('.$images.htmlspecialchars($_POST[popupbg]).');';}
			else if($_POST[popupbg]){$popupbghtml = 'background-image:url('.$images.htmlspecialchars($_POST[popupbg]).');background-size:100%;background-repeat:repeat-y;';}
			
			if($popupbghtml){$popupbghtml = 'style="'.$popupbghtml.'padding:5px;height: 100%;width: 100%;top:0;left:-15px;"';}else{$popupbghtml = 'style="padding:5px;height: 100%;width: 100%;top:0;left:-15px;"';}
	
	if(strpos($_POST[popupsbg],'http://')!==false or strpos($_POST[popupsbg],'https://')!==false){$images = '';}else{$images = 'images/';}
			
			if(strpos($_POST[popupsbg],'#')!==false or strpos($_POST[popupsbg],'rgba(')!==false  or strpos($_POST[popupsbg],'rgb(')!==false){
			$popupsbghtml = 'background-color:'.htmlspecialchars($_POST[popupsbg]).';';}
			else if(strpos($_POST[popupsbg],'[xy]')!==false){$popupsbghtml = 'background-image:url('.$images.htmlspecialchars($_POST[popupsbg]).');';}
			else if($_POST[popupsbg]){$popupsbghtml = 'background-image:url('.$images.htmlspecialchars($_POST[popupsbg]).');background-size:100%;background-repeat:repeat-y;';}
	
			if($popupsbghtml){$popupsbghtml = 'style="'.$popupsbghtml.'padding:5px;height: 100%;width: 100%;top:0;left:-15px;"';}else{$popupsbghtml = 'style="padding:5px;height: 100%;width: 100%;top:0;left:-15px;"';}
	
	
			$popup = '<!--data'.htmlspecialchars($_POST[pgbtn]).'@#@'.htmlspecialchars($_POST[url]).'@#@'.htmlspecialchars($_POST[qrswpgn]).'@#@'.htmlspecialchars($_POST[size]).'@#@'.htmlspecialchars($_POST[clr]).'@#@'.htmlspecialchars($_POST[bg]).'@#@'.htmlspecialchars($_POST[parkbg]).'@#@'.htmlspecialchars($_POST[popupbg]).'@#@'.htmlspecialchars($_POST[popupsbg]).'@#@'.htmlspecialchars($_POST[qrbtnbg]).'@#@'.htmlspecialchars($_POST[qrclrbtnbg]).'@#@'.htmlspecialchars($_POST[qroptionbtnbg]).'@#@'.htmlspecialchars($_POST[qroptionsbtnbg]).'@#@'.htmlspecialchars($_POST[qrbtnt]).'@#@'.htmlspecialchars($_POST[qrclrbtnt]).'@#@'.htmlspecialchars($_POST[qroptionbtnt]).'@#@'.htmlspecialchars($_POST[qroptionsbtnt]).'@#@'.htmlspecialchars($_POST[qretr]).'@#@'.htmlspecialchars($_POST[qrclr]).'@#@'.htmlspecialchars($_POST[qrdt]).'@#@'.htmlspecialchars($_POST[qrdts]).'@#@'.htmlspecialchars($_POST[qrsetr]).'@#@'.htmlspecialchars($_POST[qrsclr]).'@#@'.htmlspecialchars($_POST[qrsdt]).'@#@'.htmlspecialchars($_POST[qrsdts]).'@#@'.htmlspecialchars($_POST[info]).'@#@'.htmlspecialchars($_POST[infoclr]).'@#@'.htmlspecialchars($_POST[infofile]).'@#@'.htmlspecialchars($_POST[infos]).'@#@'.htmlspecialchars($_POST[infosclr]).'@#@'.htmlspecialchars($_POST[infosfile]).'@#@'.htmlspecialchars($_POST[wsqrsu]).'@#@'.htmlspecialchars($_POST[wsqrsd]).'@#@'.htmlspecialchars($_POST[wsqrsud]).'@#@'.htmlspecialchars($_POST[wsqrstg]).'@#@'.htmlspecialchars($_POST[qrvdts]).'@#@'.htmlspecialchars($_POST[wrtqr]).'@#@'.htmlspecialchars($_POST[qrdslt]).'@#@'.htmlspecialchars($_POST[qrdtsk]).'@#@'.htmlspecialchars($_POST[qrdtsks]).'@#@'.htmlspecialchars($_POST[qrsltpres]).'data!-->';

			$qrvhtm = file_get_contents('../panel/'.$roww[pjnbr].'/qrv'.$ap.'.html');
			if($qrvhtm){
				$pgbtn = str_replace('class="qrvpj','class="'.$pj.$ap,$qrvhtm);
				$pgbtn = str_replace('vwifrhtmqrvpjs ui-btn','vwifrhtm'.$pn.' ui-btn',$pgbtn);			
				$pgbtn = str_replace('id="qrvpj','id="'.$pj.$ap,$pgbtn);
				$pgbtn = str_replace('qrvpjs"',$pn.'"',$pgbtn);
				
				$vpgbtn = explode('<!--item!-->',$pgbtn);
				$sizeofpgbtn = sizeof($vpgbtn);
				if($sizeofpgbtn<8)$pgbtn  =  str_replace(' data-filter="true"','',$pgbtn);
				for($i=1;$i<$sizeofpgbtn;$i++){
				$tbghtm= explode('<li',$vpgbtn[$i]);	
				$tbghtmp .= '<li '.$tbghtm[1];	
				;}							
				
				if(strpos($pgbtn,'<!--qrvs!--></div>')!==false){ 
					$pgbtns = explode('<!--qrvs!--></div>',$vpgbtn[0]);	
					$pgbtns[0] = $pgbtns[0].'<!--qrvs!--></div>';
				}else{
					$pgbtns[1] =$vpgbtn[0];
				;}
				
			;}
			
			
			
			if($_POST[qrswpgn] or $qrvhtm){
			$popup .= '
			<div style="width:'.htmlspecialchars($_POST[size]).'px"  id="'.$pj.$ap.'qrs'.$pn.'"><span class="pigss-pencil" style="font-size:'.htmlspecialchars($_POST[size]).'px"></span></div>
			<div class="ui-grid-solo" style="padding:5px"><hr>
			<a href="#" class="ui-btn ui-btn-w ui-btn-inline ui-icon-qr ui-btn-icon-left" '.$qrbtnbg.' id="'.$pj.$ap.'qrspgn'.$pn.'"><span class="pigss-pencil" style="color:blue">'.htmlspecialchars($_POST[qrbtnt]).'</span></a>
			<a href="#" class="ui-btn ui-btn-w ui-btn-inline ui-icon-btn-notext" '.$qrclrbtnbg.' id="'.$pj.$ap.'sqrs'.$pn.'"><span style="color:black;">'.htmlspecialchars($_POST[qrclrbtnt]).'</span></a>';
			
			
			
			if($_POST[infofile]){
				if($_POST[infoclr])$infobg='style="background-color:'.htmlspecialchars($_POST[infoclr]).'"';	
				$popup .= '<a href="#'.$pj.$ap.'wqfile'.$pn.'" class="ui-btn ui-btn-w ui-btn-inline ui-icon-info ui-btn-icon-left" '.$infobg.' style="color:black;" data-transition="pop" data-rel="popup">'.htmlspecialchars($_POST[info]).'</a><div id="'.$pj.$ap.'wqfile'.$pn.'" data-theme="f" class="ifrwidthpn" style="padding:5px;height: 100%;width: 100%;top:0;left:-15px;" data-corners="false" data-role="popup"><a href="#" data-rel="back" class="popn ui-btn ui-btn-z ui-btn-icon-notext ui-icon-delete"></a><iframe style="width:100%" src="'.htmlspecialchars($_POST[infofile]).'" seamless frameBorder="0"></iframe></div>';
				;}
			
			$popup .= '<br>&nbsp;&nbsp;'.htmlspecialchars($_POST[url]).'<textarea id="'.$pj.$ap.'qrsvlu'.$pn.'" data-corners="false" data-theme="f"></textarea>';
			if($_POST[qrswpgn]!=8)$popup .= '<hr>';
			if($_POST[qrswpgn]==1 or $_POST[qrswpgn]==2)$popup .= '<a href="#'.$pj.$ap.'qrpgn'.$pn.'" class="ui-btn ui-btn-w ui-btn-inline ui-icon-qrslt ui-btn-icon-left" '.$qroptionbtnbg.' data-transition="pop" data-rel="popup" id="'.$pj.$ap.'qrspgn'.$pn.'"><span class="pigss-pencil" style="color:blue"></span>'.htmlspecialchars($_POST[qroptionbtnt]).'</a>';
			if($_POST[qrswpgn]==1 or$_POST[ qrswpgn]==5)$popup .= '<a href="#'.$pj.$ap.'wqrpgn'.$pn.'" class="ui-btn ui-btn-w ui-btn-inline ui-icon-bullets ui-btn-icon-left" '.$qroptionsbtnbg.' data-transition="pop" data-rel="popup" id="'.$pj.$ap.'wqrspgn'.$pn.'"><span class="pigss-pencil" style="color:blue"></span>'.htmlspecialchars($_POST[qroptionsbtnt]).'</a>';
			;}
			
			if($_POST[infosfile]){
			if($_POST[infosclr]){$infosbg='style="background-color:'.htmlspecialchars($_POST[infosclr]).';color:black;"';}else{$infosbg='style="color:black;"';}
			$popup .= '<a href="#'.$pj.$ap.'wqsfile'.$pn.'" class="ui-btn ui-btn-w ui-btn-inline ui-icon-info ui-btn-icon-left" '.$infosbg.' data-transition="pop" data-rel="popup">'.htmlspecialchars($_POST[infos]).'</a><div id="'.$pj.$ap.'wqsfile'.$pn.'" data-theme="f" class="ifrwidthpn" style="padding:5px;height: 100%;width: 100%;top:0;left:-15px;" data-corners="false" data-role="popup"><a href="#" data-rel="back" class="popn ui-btn ui-btn-z ui-btn-icon-notext ui-icon-delete"></a><iframe style="width:100%" src="'.htmlspecialchars($_POST[infosfile]).'" seamless frameBorder="0"></iframe></div>';
			;}
			
			
			if($_POST[qrswpgn] or $qrvhtm){
			$popup .= '<div id="'.$pj.$ap.'wqrpgnvluhns'.$pn.'"></div>';
			if($_POST[qrswpgn]==1 or $_POST[qrswpgn]==2 or $_POST[qrswpgn]==5)$popup .= '<hr>';
			
			if($_POST[wrtqr])$popup .= '<div id="'.$pj.$ap.'wrtqrpgn'.$pn.'" class="ifrwidthps" data-theme="w" data-corners="false"  style="padding:5px;height: 100%;width: 100%;top:0;left:-15px;" data-role="popup">
			<a href="#" class="popn ui-btn ui-corner-all ui-btn-icon-notext ui-icon-carat-r"  id="'.$pj.$ap.'wrtpopbtn'.$pn.'"></a>
			<a href="#" class="ui-btn ui-btn-x ui-btn-inline ui-icon-bullets ui-btn-icon-left" id="'.$pj.$ap.'sqrspgn'.$pn.'"><span class="pigss-pencil" style="color:blue"></span>'.htmlspecialchars($_POST[qretr]).'</a>
			<a href="#" class="ui-btn ui-btn-x ui-btn-inline ui-icon-btn-notext" id="'.$pj.$ap.'sqrsx'.$pn.'">'.htmlspecialchars($_POST[qrclr]).'</a>';
			
			if($_POST[qrdtsk]){
				if($_POST[qrdtsk] and strpos($_POST[qrdtsk],'[inf]')!==false){
				$qrdtsk = explode('[inf]',$_POST[qrdtsk]); 					
				$qrdtskhtm = ' ui-btn-icon-left">'.htmlspecialchars($qrdtsk[1]);$_POST[qrdtsk] = $qrdtsk[2];}
				else if($_POST[qrdtsk]){$qrdtskhtm = ' ui-btn-icon-notext">';}		
					$_POST[qrdtsk] = str_replace('[br]','<br>',htmlspecialchars($_POST[qrdtsk]));	
				
				if(strpos($_POST[qrdtsk],'[copy]')!==false){
					$copyhtm = explode('[copy]',$_POST[qrdtsk]);
					$_POST[qrdtsk] = file_get_contents('../panel/'.$roww[pjnbr].'/'.htmlspecialchars($copyhtm[0]));
				;}
				
			$popup .= '<a href="#" id="'.$pj.$ap.'qrdtsk'.$pn.'" class="ui-btn ui-btn-x ui-btn-inline ui-icon-info'.$qrdtskhtm.'</a><div id="'.$pj.$ap.'qrdtskpop'.$pn.'" style="background-color:#595959;left:auto;right:15%;top:5em;z-index:2;position:fixed;display:inline-block;width:65%;display:none;overflow-x:hidden;overflow-y:auto;color:pink;padding:5px;"><a class="ui-btn ui-btn-z ui-btn-inline ui-btn-icon-notext ui-icon-delete" href="#" style="position:absolute;top:0%;right:1em;index-z:2;"></a><BR><BR>'.$_POST[qrdtsk].'</div>';
			}
			
			if($_POST[qrdt])$popup .= '<BR>'.htmlspecialchars($_POST[qrdt]);
			if($_POST[qrswpgn]==1 or $_POST[qrswpgn]==2 or $_POST[qrswpgn]==5)$popup .= '<textarea id="'.$pj.$ap.'qrpgnvlu'.$pn.'" data-corners="false" data-theme="f"></textarea>';
			$popup .= '<div id="'.$pj.$ap.'wrtwqrpgnvlns'.$pn.'" style="overflow-x:hidden;overflow-y:auto;width:100%"><div id="'.$pj.$ap.'wrtqrpgnvlus'.$pn.'"></div>
			</div></div>';
			
			
			
			$popup .= '<div id="'.$pj.$ap.'qrpgn'.$pn.'" class="ifrwidthps" data-theme="w" data-corners="false" '.$popupbghtml.' data-role="popup"><a href="#" class="popn ui-btn ui-corner-all ui-btn-icon-notext ui-icon-delete" data-rel="back"></a>';
			if($_POST[qrswpgn]){
		
			if($_POST[wrtqr])$popup .= '<a href="#" class="ui-btn ui-btn-x ui-btn-inline ui-icon-edit ui-btn-icon-left" id="'.$pj.$ap.'wrtbtn'.$pn.'">'.htmlspecialchars($_POST[wrtqr]).'</a>';
		
			if($_POST[wsqrstg]){$wsqrstg =' ui-btn-icon-left">'.htmlspecialchars($_POST[wsqrstg]);}else{$wsqrstg =' ui-btn-icon-notext">';}
			if($qrvhtm)$popup .= '<a href="#" id="'.$pj.$ap.'wsqrtg'.$pn.'" class="ui-btn ui-btn-z ui-btn-inline ui-icon-tag'.$wsqrstg.'</a>';
			
			if($_POST[qrvdts] and strpos($_POST[qrvdts],'[inf]')!==false){
			$qrvdts = explode('[inf]',$_POST[qrvdts]); 					
			$qrvdtshtm = ' ui-btn-icon-left">'.htmlspecialchars($qrvdts[1]);$_POST[qrvdts] = $qrvdts[2];}
			else if($_POST[qrvdts]){$qrvdtshtm = ' ui-btn-icon-notext">';}
			
			if($_POST[qrvdts])$popup .= '<a href="#" data-popup="'.$pj.$ap.'qrpgn'.$pn.'" data-url="'.htmlspecialchars(trim($_POST[qrvdts])).'" data-pop="'.$pj.$ap.'" class="imgspop ui-btn ui-btn-z ui-btn-inline ui-icon-info'.$qrvdtshtm.'</a>';
			
			}else{$popup .= '<br><br>';}
			
			if($_POST[qrdts])$qrdts = 'data-qrdts="'.htmlspecialchars($_POST[qrdts]).'"';
			$popup .= '<div id="'.$pj.$ap.'wqrpgnvlns'.$pn.'" '.$qrdts.' style="width:100%">';
			$popup .= '<div id="'.$pj.$ap.'qrpgnvlus'.$pn.'" style="overflow-x:hidden;overflow-y:auto;width:100%"></div>';
		
			if($qrvhtm)$popup .= '<hr>';
			
			if($qrvhtm){
				$popup .= $pgbtns[0].'<div id="'.$pj.$ap.'qrspgnvlus'.$pn.'" style="overflow-x:hidden;overflow-y:auto;width:100%">';					
				$popup .= $pgbtns[1].$tbghtmp.'</div></div>';
			;}else{$popup .= '</div>';}
			$popup .= '</div>';
			
			if($_POST[wsqrsu]){$wsqrsu =' ui-btn-icon-left">'.htmlspecialchars($_POST[wsqrsu]);}else{$wsqrsu =' ui-btn-icon-notext">';}
			if($_POST[wsqrsd]){$wsqrsd =' ui-btn-icon-left">'.htmlspecialchars($_POST[wsqrsd]);}else{$wsqrsd =' ui-btn-icon-notext">';}
			if($_POST[wsqrsud]){$wsqrsud =' ui-btn-icon-left">'.htmlspecialchars($_POST[wsqrsud]);}else{$wsqrsud =' ui-btn-icon-notext">';}
			
			
			if($_POST[qrdtsks]){
				if($_POST[qrdtsks] and strpos($_POST[qrdtsks],'[inf]')!==false){
				$qrdtsks = explode('[inf]',$_POST[qrdtsks]); 					
				$qrdtskshtm = ' ui-btn-icon-left">'.htmlspecialchars($qrdtsks[1]);$_POST[qrdtsks] = $qrdtsks[2];}
				else if($_POST[qrdtsks]){$qrdtskshtm = ' ui-btn-icon-notext">';}		
				
				if(strpos($_POST[qrdtsks],'[copy]')!==false){
					$qrdtskscopyhtm = explode('[copy]',$_POST[qrdtsks]);
					$_POST[qrdtsks] = file_get_contents('../panel/'.$roww[pjnbr].'/'.htmlspecialchars($qrdtskscopyhtm[0]));
					if(strpos($_POST[qrdtsks],'<script')!==false or strpos($_POST[qrdtsks],'DOCTYPE')!==false or strpos($_POST[qrdtsks],'<body')!==false or strpos($_POST[qrdtsks],'data-role="page"')!==false)$_POST[qrdtsks] = '';
				;}
				
					$_POST[qrdtsks] = str_replace('[br]','<br>',htmlspecialchars($_POST[qrdtsks]));	
			$qrdtskshtml = '<a href="#" id="'.$pj.$ap.'qrdtsks'.$pn.'" class="ui-btn ui-btn-x ui-btn-inline ui-icon-info'.$qrdtskshtm.'</a><div id="'.$pj.$ap.'qrdtskpops'.$pn.'" style="background-color:#595959;left:auto;right:15%;top:5em;z-index:2;position:fixed;display:inline-block;width:65%;display:none;overflow-x:hidden;overflow-y:auto;color:pink;padding:5px;"><a class="ui-btn ui-btn-z ui-btn-inline ui-btn-icon-notext ui-icon-delete" href="#" style="position:absolute;top:0%;right:1em;index-z:2;"></a><BR><BR>'.$_POST[qrdtsks].'</div>';
			}

			if($_POST[qrsltpres]){$qrsltpres = '  ui-btn-x ui-btn-inline" style="padding:12px;">'.htmlspecialchars($_POST[qrsltpres]).' >';}else{$qrsltpres = ' ui-corner-all ui-icon-carat-r ui-btn-icon-notext">';}
			if($qrvhtm or $_POST[wrtqr])$popup .= '<div id="'.$pj.$ap.'mtsltwqrpgn'.$pn.'" class="ifrwidthps" style="padding:5px;height: 100%;width: 100%;top:0;left:-15px;" data-theme="w" data-corners="false"  data-role="popup"><a href="#" id="'.$pj.$ap.'mtsltpopbtn'.$pn.'" class="popn ui-btn '.$qrsltpres.'</a><a href="#" class="ui-btn ui-btn-x ui-btn-inline" id="'.$pj.$ap.'wsqrspgn'.$pn.'"><span class="pigss-pencil" style="color:blue"></span>'.htmlspecialchars($_POST[qrsetr]).'</a><a href="#" class="ui-btn ui-btn-x ui-btn-inline ui-icon-btn-notext" id="'.$pj.$ap.'wsqrsx'.$pn.'">'.htmlspecialchars($_POST[qrsclr]).'</a>
			&nbsp;&nbsp;&nbsp;<a href="#" id="'.$pj.$ap.'wsqrsu'.$pn.'" class="ui-btn ui-btn-z ui-btn-inline ui-icon-arrow-u'.$wsqrsu.'</a>
			<a href="#" id="'.$pj.$ap.'wsqrsd'.$pn.'" class="ui-btn ui-btn-z ui-btn-inline ui-icon-arrow-d'.$wsqrsd.'</a>
			<a href="#" id="'.$pj.$ap.'wsqrsud'.$pn.'" class="ui-btn ui-btn-z ui-btn-inline ui-icon-check'.$wsqrsud.'</a>'.$qrdtskshtml.'
			<div id="'.$pj.$ap.'wqrpgnvln'.$pn.'" style="width:100%">
			<div id="'.$pj.$ap.'wqrpgnvlu'.$pn.'" class="dd" style="overflow-x:hidden;overflow-y:auto;width:100%"></div>
			<input type="hidden" id="'.$pj.$ap.'wqrpgnvluh'.$pn.'">
			</div></div>';
			
			if($_POST[qrsdt]){$qrsdt ='data-qrsdt="'.htmlspecialchars($_POST[qrsdt]).'" ';}else{$qrsdt = '';}

			$popup .= '<div id="'.$pj.$ap.'wqrpgn'.$pn.'" class="ifrwidthps" data-theme="w" data-corners="false" '.$qrsdt.$popupsbghtml.' data-role="popup"><a href="#" class="popn ui-btn ui-corner-all ui-btn-icon-notext ui-icon-delete" data-rel="back"></a><a href="#" class="ui-btn ui-btn-x ui-btn-inline ui-icon-dlist ui-btn-icon-left" id="'.$pj.$ap.'wqrpgnbtn'.$pn.'">'.htmlspecialchars($_POST[qrdslt]).'</a>';
			
			
			if($qrvhtm)$popup .= '<a href="#" id="'.$pj.$ap.'wsqrstg'.$pn.'" class="ui-btn ui-btn-z ui-btn-inline ui-icon-tag'.$wsqrstg.'</a>&nbsp;&nbsp;&nbsp;';
			
			if($_POST[qrsdts] and strpos($_POST[qrsdts],'[inf]')!==false){
			$qrsdts = explode('[inf]',$_POST[qrsdts]); 			
			$qrsdtshtm = ' ui-btn-icon-left">'.htmlspecialchars($qrsdts[1]);$_POST[qrsdts] = $qrsdts[2];}
			else if($_POST[qrsdts]){$qrsdtshtm = ' ui-btn-icon-notext">';}
			
			
			if($_POST[qrsdts])$popup .= '<a href="#" data-popup="'.$pj.$ap.'wqrpgn'.$pn.'" data-url="'.htmlspecialchars(trim($_POST[qrsdts])).'" data-pop="'.$pj.$ap.'" class="imgspop ui-btn ui-btn-z ui-btn-inline ui-icon-info'.$qrsdtshtm.'</a>';
			
			$popup .= '<div id="'.$pj.$ap.'wqrpgnvlus'.$pn.'" style="overflow-x:hidden;overflow-y:auto;width:100%"></div>';
			if($qrvhtm)$popup .= '<hr>';
			
			if($qrvhtm){
				$pgbtns[0] = str_replace('qrtags','qrstgs',$pgbtns[0]);
				$pgbtns[0] = str_replace('qrstags','qrsstags',$pgbtns[0]);
				
				$popup .= $pgbtns[0].'<div id="'.$pj.$ap.'sqrspgnvlus'.$pn.'" style="overflow-x:hidden;overflow-y:auto;width:100%">';
				//$popup .= '<div style="width:80%">';
				$pgbtns[1] = str_replace('qrstgsu','qrsstgsu',$pgbtns[1]);
				$pgbtns[1] = str_replace('qrstgsd','qrsstagd',$pgbtns[1]);
				$tbghtmp = str_replace('vwifrhtm','wvwifrhtm',$tbghtmp);			
				
				
				$popup .= $pgbtns[1].$tbghtmp.'</div>';
			;}
			$popup .= '</div></div>';
			//$popup .= '</div></div></div>';

			;}else{
			$popup .= '<div style="width:'.htmlspecialchars($_POST[size]).'px" id="'.$pj.$ap.'qrs'.$pn.'"></div>';
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

			if($_POST[parkbg]){$_POST[parkbg]=str_replace('/','',$_POST[parkbg]);
			$_POST[parkbg]=str_replace('\\','',$_POST[parkbg]);
			$_POST[parkbg]=str_replace('..','',$_POST[parkbg]);}
			
			if(strpos($_POST[parkbg],'http://')!==false or strpos($_POST[parkbg],'https://')!==false){$images = '';}else{$images = 'images/';}
			
			if(strpos($_POST[parkbg],'#')!==false or strpos($_POST[parkbg],'rgba(')!==false  or strpos($_POST[parkbg],'rgb(')!==false){
			$bghtml = 'background-color:'.htmlspecialchars($_POST[parkbg]).';';}
			else if(strpos($_POST[parkbg],'[xy]')!==false){$bghtml = 'background-image:url('.$images.htmlspecialchars($_POST[parkbg]).');';}
			else{$bghtml = 'background-image:url('.$images.htmlspecialchars($_POST[parkbg]).');background-size:100%;background-repeat:repeat-y;';}
			
			if($_POST[parkbg]){
			$bghtml = '<div class="ui-grid-solo" style="'.$bghtml.'"><!--parkbg!-->';
			$bghtmls = '<!--parkbg!--></div>';
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
					
			$webpopup .= $html.'<!--part'.$pn.'!--><!--sysqrsys!-->'.$vnts.$bghtml.$popup.$bghtmls.$vntsn.$tabnbgdatns.$htmls;
			$webpopup .= '</div><!--content!--></div><!--page!-->';
					
			$fpagtrns='../panel/'.$roww[pjnbr].'/'.$ap.'.html';
			file_put_contents($fpagtrns,$html.'<!--part'.$pn.'!--><!--sysqrsys!-->'.$vnts.$bghtml.$popup.$bghtmls.$vntsn.$tabnbgdatns.$htmls);

			$fpagtrns='../panel/'.$roww[pjnbr].'/web'.$ap.'.html';
			file_put_contents($fpagtrns,$webpopup);

	
			if(!file_exists('../panel/'.$roww[pjnbr].'/web'.$ap.'.js')){
			$fpagtrns='../panel/'.$roww[pjnbr].'/web'.$ap.'.js';
			$js = '/*$(document).on(\'pageshow\', \'#web'.$ap.'\', function(){*/';
			$js .= '/*});*/';
			file_put_contents($fpagtrns,$js);			
			;}
			
			if($_POST[url]){
			$jsweb = file_get_contents('../panel/'.$roww[pjnbr].'/web'.$ap.'.js');
				
				$jswebs=explode('/*webjs'.$pn.'*/',$jsweb);
				$jsweb = $jswebs[0].$jswebs[2];

				
				if($_POST[qrswpgn] or $qrvhtm){
				$js = '/*webjs'.$pn.'*/;$("#'.$pj.$ap.'qrspgn'.$pn.'").click(function(event){event.preventDefault();var valw = $("#'.$pj.$ap.'qrsvlu'.$pn.'").val();var htmlw = $("#'.$pj.$ap.'wqrpgnvluhns'.$pn.'").text();if(valw && htmlw){var qrsvlu = valw+" /// "+htmlw;}else if(valw){var qrsvlu = valw;}else if(htmlw){var qrsvlu = htmlw;};$("#'.$pj.$ap.'qrs'.$pn.'").html(\'\');if(qrsvlu){$("#'.$pj.$ap.'wqrpgnvlu'.$pn.'").data("wqrpgnvluhs","");$("#'.$pj.$ap.'wqrpgnvlu'.$pn.'").data("wqrpgnvluh","");/*$.ajax({type:"POST",url:your php,data:{\'qrpbigdata\':qrsvlu},cache:false});*/$("#'.$pj.$ap.'qrs'.$pn.'").qrcode({"render": "div","background":"'.htmlspecialchars($_POST[bg]).'","size":'.htmlspecialchars($_POST[size]).',"fill":"'.htmlspecialchars($_POST[clr]).'","quiet": 1,"text":qrutf(qrsvlu)});}else{$("#'.$pj.$ap.'qrs'.$pn.'").html(\'<span class="pigss-pencil" style="color:'.htmlspecialchars($_POST[clr]).';font-size:'.htmlspecialchars($_POST[size]).'px"></span>\');}});qrs('.$pj.$ap.','.$pn.',windowHeight);$("#'.$pj.$ap.'wqrpgnvlu'.$pn.'").nest();/*webjs'.$pn.'*/'.'/*});*/';
				;}else{
				$js = '/*webjs'.$pn.'*/'
				.'$("#'.$pj.$ap.'qrs'.$pn.'").qrcode({"render": "div","background":"'.htmlspecialchars($_POST[bg]).'","size":'.htmlspecialchars($_POST[size]).',"fill":"'.htmlspecialchars($_POST[clr]).'","quiet": 1,"text":qrutf("'.htmlspecialchars($_POST[url]).'")});/*webjs'.$pn.'*/'.'/*});*/';
				;}
				$jsweb=str_replace('/*});*/',$js,$jsweb);
				file_put_contents('../panel/'.$roww[pjnbr].'/web'.$ap.'.js',$jsweb);
				
			;}	
	
	echo "<meta http-equiv='refresh' content='0;URL=qr.php?ap=".htmlspecialchars($roww[ap])."&pj=".htmlspecialchars($roww[pjnbr])."&pn=".htmlspecialchars($pn)."'>";
;}

?>
