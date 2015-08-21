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
    <title><?php if($_SESSION[tn]==PRC){echo '控制板設定 - AppMoney712 移动应用设计系统';}else if($_SESSION[tn]==EN){echo 'Panel setting - AppMoney712 APP Creation System';}else{echo '控制板設定 - AppMoney712 移動應用設計系統';}?></title>
	<link href="../css/jquery.mobile-1.4.4.min.css" rel="stylesheet">
	<link href="../css/jquerymobile-1.4.4.min.css" rel="stylesheet">
	<link href="../css/icons/style.css" rel="stylesheet">
	<style type="text/css">
		.ifrwidthps{overflow-y:auto;overflow-x:hidden;}
			.popn{position:absolute;top:0%;right:1em;index-z:2}
			.vws{font-size:1.2em;text-shadow:0  0  0  0}
			.ftrbg{position:absolute;bottom:0px;left:2px;right:4px;width:100%;padding-top:18px;padding-bottom:18px;}	
	</style>
	<script src="../js/jquery.js"></script>
	<script src="../js/jquery.mobile-1.4.4.min.js"></script>
	<script src="../js/fastbtn.js"></script>
	

</head>
<body>
<div data-role="page" data-theme="f" class="page">
	<div style="overflow: hidden;" data-role="header" data-theme="f">
	<a href="#navigations"  id="menubttn"  data-rel="popup" data-transition="pop" class="ui-btn ui-btn ui-btn-inline ui-corner-all ui-btn-icon-left ui-icon-bars"><?php if($_SESSION[tn]==PRC){echo '目录';}else if($_SESSION[tn]==EN){echo 'Menu';}else{echo '目錄';}?></a>
    <h1><?php if($_SESSION[tn]==PRC){echo '控制板設定 - AppMoney712 移动应用设计系统';}else if($_SESSION[tn]==EN){echo 'Panel setting - AppMoney712 APP Creation System';}else{echo '控制板設定 - AppMoney712 移動應用設計系統';}?></h1>
	
	</div><!-- /header -->

	
	<div data-role="content">
	
	<?php if($ap){?>
	<a href="listvw.php?pj=<?php echo htmlspecialchars($roww[pjnbr]) ?>&ap=<?php echo htmlspecialchars($roww[ap])?>&pn=<?php echo htmlspecialchars($pn)?>&tm=<?php echo htmlspecialchars($tm)?>" data-ajax="false" class="ui-btn ui-btn ui-btn-inline ui-corner-all ui-btn-icon-left ui-icon-carat-l">&nbsp;</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="#view" data-rel="popup" data-transition="pop" class="ui-btn ui-btn-inline ui-corner-all ui-mini ui-btn-icon-left ui-icon-search"><?php if($_SESSION[tn]==PRC){echo '预览';}else if($_SESSION[tn]==EN){echo 'Preview';}else{echo '預覽';}?></a>
	<a href="#steps" data-rel="popup" data-transition="pop" class="ui-btn ui-btn-b ui-btn-inline ui-corner-all ui-mini"><?php if($_SESSION[tn]==PRC){echo '步骤';}else if($_SESSION[tn]==EN){echo 'Steps';}else{echo '步驟';}?></a>
	<a href="#inf" data-rel="popup" data-transition="pop" class="ui-btn ui-btn-b ui-btn-inline ui-corner-all ui-mini">? <?php if($_SESSION[tn]==PRC){echo '解释';}else if($_SESSION[tn]==EN){echo 'Explanation';}else{echo '解釋';}?></a>
		
	<div data-role="popup" id="view">
	<ul data-role="listview" data-corners="false" data-inset="true">
	<li><a href="view.php?pj=<?php echo htmlspecialchars($roww[pjnbr])?>&ap=<?php echo htmlspecialchars($roww[ap])?>&vw=ap" data-ajax="false" target="_blank" class="ui-btn ui-btn-inline ui-mini ui-btn-icon-left ui-icon-search"><?php if($_SESSION[tn]==PRC){echo '预览应用页内容形式';}else if($_SESSION[tn]==EN){echo 'Page content of APP style[Preview]';}else{echo '預覽應用頁內容形式';}?></a></li>
	<li><a href="view.php?pj=<?php echo htmlspecialchars($roww[pjnbr])?>&ap=<?php echo htmlspecialchars($roww[ap])?>&vw=ap&ts=1" data-ajax="false" target="_blank" class="ui-btn ui-btn-inline ui-mini ui-btn-icon-left ui-icon-search"><?php if($_SESSION[tn]==PRC){echo '预览应用页内容形式';}else if($_SESSION[tn]==EN){echo 'Page content of APP style[Preview]';}else{echo '預覽應用頁內容形式';}?><?php if($_SESSION[tn]==PRC){echo '[触控式] [使用webkit型浏览器]';}else if($_SESSION[tn]==EN){echo '[Touch screen] [using any webkit browser]';}else{echo '[觸控式] [使用webkit型瀏覽器]';}?></a></li>
	<li><a href="viewp.php?pj=<?php echo htmlspecialchars($roww[pjnbr])?>&ap=<?php echo htmlspecialchars($roww[ap])?>" data-ajax="false" target="_blank" class="ui-btn ui-btn-inline ui-mini ui-btn-icon-left ui-icon-search"><?php if($_SESSION[tn]==PRC){echo '预览popup形式';}else if($_SESSION[tn]==EN){echo 'content of popup style[Preview]';}else{echo '預覽popup形式';}?></a></li>
	<li><a href="viewp.php?pj=<?php echo htmlspecialchars($roww[pjnbr])?>&ap=<?php echo htmlspecialchars($roww[ap])?>&ts=1" data-ajax="false" target="_blank" class="ui-btn ui-btn-inline ui-mini ui-btn-icon-left ui-icon-search"><?php if($_SESSION[tn]==PRC){echo '预览popup形式';}else if($_SESSION[tn]==EN){echo 'content of popup style[Preview]';}else{echo '預覽popup形式';}?><?php if($_SESSION[tn]==PRC){echo '[触控式] [使用webkit型浏览器]';}else if($_SESSION[tn]==EN){echo '[Touch screen] [using any webkit browser]';}else{echo '[觸控式] [使用webkit型瀏覽器]';}?></a></li>
	<!--<li><a href="view.php?pj=<?php echo htmlspecialchars($roww[pjnbr])?>&ap=<?php echo htmlspecialchars($roww[ap])?>&vw=s" data-ajax="false" target="_blank" class="ui-btn ui-btn-inline ui-mini ui-btn-icon-left ui-icon-search"><?php if($_SESSION[tn]==PRC){echo '预览單頁形式';}else if($_SESSION[tn]==EN){echo 'single page style[Preview]';}else{echo '預覽單頁形式';}?></a></li>!-->
	</ul>
	</div>
	
	
	
	
	<a href="#15vw" data-rel="popup" class="ui-btn ui-btn ui-btn-inline ui-corner-all ui-mini ui-btn-icon-left ui-icon-search"><?php if($_SESSION[tn]==PRC){echo '控制板';}else if($_SESSION[tn]==EN){echo 'Panel example';}else{echo '控制板';}?></a>
	
	<div data-role="popup" id="15vw" data-theme="f" style="padding:5px;height: 100%;width: 100%;top:0;left:-15px;" class="ifrwidthpn"><a href="#"  id="15panelpop" class="ui-btn ui-btn-f ui-btn-inline ui-btn-icon-left ui-icon-delete">&nbsp;</a><a href="#" id="15formpopups" class="ui-btn ui-btn-f ui-btn-inline ui-btn-icon-left ui-icon-mail" style=""><?php if($_SESSION[tn]==PRC){echo 'SendForm按鈕标题';}else if($_SESSION[tn]==EN){echo 'Title of SendForm button';}else{echo 'SendForm按鈕標題';}?></a><div id="15formpopup" data-role="popup" data-theme="f" data-corners="false" style="padding:5px;height: 100%;width: 100%;top:0;left:-15px;overflow-y: auto!important;" style="padding:5px;" class="ifrwidthps" ><a href="#" id="15formpopupspopn" style="position:absolute;top:0%;left:1em;index-z:2;padding:22px;" class="ui-btn ui-btn-z ui-btn-icon-notext ui-icon-delete"></a><iframe src="#" style="width:100%" seamless frameBorder="0"></iframe></div><a href="#" id="15vwvp"  class="ui-btn ui-btn-f ui-btn-inline ui-btn-icon-left ui-icon-bullets" style=""><?php if($_SESSION[tn]==PRC){echo '巳选项序列按钮标题';}else if($_SESSION[tn]==EN){echo 'Title of data sequence button';}else{echo '巳選項序列按鈕標題';}?></a>
<a href="#" id="15vwfbtn" data-transition="slideup" class="ui-btn ui-btn-f ui-btn-inline ui-btn-icon-left ui-icon-edit" style=""><?php if($_SESSION[tn]==PRC){echo '用户自定按钮';}else if($_SESSION[tn]==EN){echo 'APP user custom button';}else{echo '用戶自定按鈕';}?> - <?php if($_SESSION[tn]==PRC){echo '创建按钮的标题';}else if($_SESSION[tn]==EN){echo 'Title of creating button';}else{echo '創建按鈕的標題';}?></a><div id="15vwf" data-role="popup" data-corners="false" data-transition="pop" data-position-to="window" data-theme="f" style="padding:5px;height: 100%;width: 100%;top:0;left:-15px;" class="vws vwspopups ifrwidthps">
<a href="#" id="15vwfbtnpopn" class="popn ui-btn ui-btn-z ui-btn-icon-notext ui-icon-delete"></a>
<textarea  id="15selfbtn" data-corners="false" data-theme="a" style="width:80%"></textarea>

<a href="#" id="15selfbtns"  class="ui-btn ui-btn-f ui-btn-inline ui-btn-icon-left ui-icon-check ui-mini" data-border=""><span class="pigss-pencil"></span><?php if($_SESSION[tn]==PRC){echo '作实按钮的标题';}else if($_SESSION[tn]==EN){echo 'Title of confirm button';}else{echo '作實按鈕的標題';}?></a><div style="border-style:double;border-color:pink;padding:10px;cursor:pointer;display:none;" data-option="[ X ]" data-border="" class="15sltsbtn 15dsltsbtn ui-btn-inline"><span class="pigss-pencil"></span>[ X ]<?php if($_SESSION[tn]==PRC){echo '巳选自定项清除按钮的标题';}else if($_SESSION[tn]==EN){echo 'Title of data clear button';}else{echo '巳選自定項清除按鈕的標題';}?></div>

<a href="#" class="15slfbtn ui-btn ui-btn-f ui-btn-inline ui-btn-icon-left ui-icon-bullets ui-mini" style="float:right" data-alter="<?php if($_SESSION[tn]==PRC){echo '自定项修改按钮的标题';}else if($_SESSION[tn]==EN){echo 'Title of data amend button';}else{echo '自定項修改按鈕的標題';}?>" data-border=""><span class="pigss-pencil"></span><?php if($_SESSION[tn]==PRC){echo '修改自定数据按钮的标题';}else if($_SESSION[tn]==EN){echo 'Title of amendment button';}else{echo '修改自定數據按鈕的標題';}?></a>
<BR>
<div class="15vwshgt" style="overflow-y:auto;">
<div id="15sbtnvw" class="vws ui-content" style="width:80%;"><img style="width:80%" src="images/slf.png">
<p><b style="font-size:15px;color:pink"><?php if($_SESSION[tn]==PRC){echo '使用';}else if($_SESSION[tn]==EN){echo 'Usage';}else{echo '使用';}?></b><p>
<p style=" font-size:15px"><?php if($_SESSION[tn]==PRC){echo '当用户在键入项键入自定按钮的标题数据,点撀作实按钮将数据产生自定按钮。上面11111111111111是一个自定按钮，用户点撀此按钮,能将此标题数据11111111111111复制到选项列表上。';}else if($_SESSION[tn]==EN){echo 'APP user can enter custom data title to above input field and click the confirm button to produce the self-defining button. The above 1111111111111 is a example of self-defining button. APP user can click it to copy it title to the selected list.';}else{echo '當用戶在鍵入項鍵入自定按鈕的標題數據,點撀作實按鈕將數據產生自定按鈕。上面11111111111111是一個自定按鈕，用戶點撀此按鈕,能將此標題數據11111111111111複制到選項列表上。';}?></p>
<p><b style="font-size:15px;color:pink"><?php if($_SESSION[tn]==PRC){echo '修改/刪除';}else if($_SESSION[tn]==EN){echo 'Amendment/deletion';}else{echo '修改/刪除';}?></b><p>
<p style=" font-size:15px"><?php if($_SESSION[tn]==PRC){echo '用戶點撀右上方的修改自定數據按鈕,自定按鈕下顯示一個修改按鈕<span class="pigss-pencil"></span>,此按鈕是供用戶修改所屬項自定按鈕,用戶點撀此按鈕,自定按鈕標題顯示到鍵入項內,用戶能修改或清除內容再點撀作實按鈕。';}else if($_SESSION[tn]==EN){echo 'APP user needs to click the amendment button to show data amend button<span class="pigss-pencil"></span> for each self-defined data button. APP user needs to click this button to copy title of a self-defined data button in title input field. APP user can amend or remove the title data in the field and click the confirm button to amend or delete the title data.';}else{echo '用戶點撀右上方的修改自定數據按鈕,自定按鈕下顯示一個修改按鈕<span class="pigss-pencil"></span>,此按鈕是供用戶修改所屬項自定按鈕,用戶點撀此按鈕,自定按鈕標題顯示到鍵入項內,用戶能修改或清除內容再點撀作實按鈕。';}?></p>

<p><b style="font-size:15px;color:pink"><?php if($_SESSION[tn]==PRC){echo '巳选项的修改/刪除';}else if($_SESSION[tn]==EN){echo 'Amendment/deletion of selected items';}else{echo '巳選項的修改/刪除';}?></b><p>
<p style=" font-size:15px"><?php if($_SESSION[tn]==PRC){echo '用户在此点撀自定按钮令标题复制到巳选列表上,再在表上点撀此自定数据按钮,返到此处,点撀左上的[X]符号的巳选自定项清除按钮,能将此自定数据改成[X},又或进行另作选择。';}else if($_SESSION[tn]==EN){echo 'APP user can select a self-defined button to copy its title to the selected item list. This selected item can be clicked to return to this popup. APP user can click the data clear button[at top left corner] to turn the selected data to [x]. Or APP user can proceed any selection action.';}else{echo '用戶在此點撀自定按鈕令標題複制到巳選列表上,再在表上點撀此自定數據按鈕,返到此處,點撀左上的[X]符號的巳選自定項清除按鈕,能將此自定數據改成[X},又或進行另作選擇。';}?></p>

</div>
</div></div>

<a href="#" id="15infovwbtn" class="ui-btn ui-btn-f ui-btn-inline ui-btn-icon-left ui-icon-info"><?php if($_SESSION[tn]==PRC){echo '帮助按钮';}else if($_SESSION[tn]==EN){echo 'Help button';}else{echo '幫助按鈕';}?></a>
<div id="15infovw" data-role="popup" data-corners="false" data-transition="pop" data-position-to="window" data-theme="f"  style="padding:5px;height: 100%;width: 100%;top:0;left:-15px;" class="vws 15vwspopups ifrwidthps"><a href="#"  id="15infovwpopn" class="popn ui-btn ui-btn-z ui-btn-icon-notext ui-icon-delete"></a>
<BR><iframe src="vw.html" seamless frameBorder="0" style="width:100%"></iframe></div>

<div id="15vwv" data-role="popup" data-theme="f" data-corners="false" style="padding:5px;height: 100%;width: 100%;top:0;left:-15px;" class="vws ifrwidthps"><a href="#" id="15vwvppopn" class="popn ui-btn ui-btn-z ui-btn-icon-notext ui-icon-delete"></a><a href="#" id="15orderinfbtn" class="ui-btn ui-btn-z ui-btn-inline ui-btn-icon-notext ui-icon-info"></a><div style="position:absolute;right:30%;top:0;padding:10px;cursor:pointer;" class="35clrdata ui-btn ui-btn-x ui-btn-inline"><span class="pigss-pencil"></span>[ X ]<?php if($_SESSION[tn]==PRC){echo '巳填数据清除按钮';}else if($_SESSION[tn]==EN){echo 'Clear button of existing data';}else{echo '巳填數據清除按鈕';}?> - <?php if($_SESSION[tn]==PRC){echo '按钮标题';}else if($_SESSION[tn]==EN){echo 'Button title';}else{echo '按鈕標題';}?></div>

<BR><BR><div id="15orderinfo" style=""> &nbsp;<span id="15orderinf"> X </span><?php if($_SESSION[tn]==PRC){echo '巳填数据排序资讯[此资讯内容是在用户点撀左上方的按钮才显示]';}else if($_SESSION[tn]==EN){echo 'Ordering info of existing data[This info only be showed when APP user clicking on the info button at top left side]';}else{echo '巳填數據排序資訊[此資訊內容是在用戶點撀左上方的按鈕才顯示]';}?></div>

<div class="vwshgts" style="overflow-y:auto;">
<div id="15vwvn" class="vws ui-content" style="width:80%"></div>
</div></div>
<div id="15vwsnbrvlu" data-theme="f" data-role="popup" data-corners="false" data-transition="pop" data-position-to="window" style="padding:5px;height: 100%;width: 100%;top:0;left:-15px;" class="ifrwidthps"><a href="#" id="15vwsnbrvlupopn" class="popn ui-btn ui-btn-z ui-btn-icon-notext ui-icon-delete"></a><BR><BR><?php if($_SESSION[tn]==PRC){echo '数量键盘标题';}else if($_SESSION[tn]==EN){echo 'Title of Quantity keyboard';}else{echo '數量鍵盤標題';}?><HR><div class="15kvlu ui-grid-solo" ids=""></div><HR>
<a href="#" data-corners="false" class="vwsn ui-btn ui-btn-f ui-btn-inline" style="">1</a>
<a href="#" data-corners="false" class="vwsn ui-btn ui-btn-f ui-btn-inline" style="">2</a>
<a href="#" data-corners="false" class="vwsn ui-btn ui-btn-f ui-btn-inline" style="">3</a>
<a href="#" data-corners="false" class="vwsn ui-btn ui-btn-f ui-btn-inline" style="">4</a> <br>

<a href="#" data-corners="false" class="vwsn ui-btn ui-btn-f ui-btn-inline" style="">5</a>
<a href="#" data-corners="false" class="vwsn ui-btn ui-btn-f ui-btn-inline" style="">6</a>
<a href="#" data-corners="false" class="vwsn ui-btn ui-btn-f ui-btn-inline" style="">7</a>
<a href="#" data-corners="false" class="vwsn ui-btn ui-btn-f ui-btn-inline" style="">8</a> <br>

<a href="#" data-corners="false" class="vwsn ui-btn ui-btn-f ui-btn-inline" style="">9</a>
<a href="#" data-corners="false" class="vwsn ui-btn ui-btn-f ui-btn-inline" style="">0</a>
<a href="#" data-corners="false" class="15vwsd ui-btn ui-btn-f ui-btn-inline" style="">.</a>
<a href="#" data-corners="false" class="vwsnb ui-btn ui-btn-f ui-btn-inline" style="">&nbsp;</a> <br>
<a href="#" data-corners="false" class="15vwsns ui-btn ui-btn-f ui-btn-inline" style=";width:80%"><span class="pigss-pencil"></span><?php if($_SESSION[tn]==PRC){echo '作实键标题';}else if($_SESSION[tn]==EN){echo ' Title of Enter button';}else{echo '作實鍵標題';}?></a>
</div>
<div id="15vwtips" class="vws ui-grid-solo" style="width:50%;position:absolute;right:0;top:0;overflow-y:auto;display:none;"></div>
<div class="vws ui-grid-solo"><div class="ui-grid-solo" id="15vlucount" style=""></div><div class="ui-grid-solo" id="15vlucounts" data-times="" data-plus=""  data-plusn="" data-plusmsg="" data-tmsg="" style=""></div></div><HR>
<div id="15vwdatn" class="ui-grid-solo"><br></div>
<div class="vwshgt" style=";overflow-y:auto;">

<div id="15vwdata" class="vws ui-content" style="width:80%;">
<?php if($_SESSION[tn]==PRC){echo '注:点撀含数量的数据按钮能显示数量键盘,用作修改数量。';}else if($_SESSION[tn]==EN){echo 'Example note :You can click a quantity data button to show Quantity keyboard for quantity amendment.';}else{echo '註:點撀含數量的數據按鈕能顯示數量鍵盤,用作修改數量。';}?><br>
<a  style="border-style:solid;border-color:pink;padding:10px;cursor:pointer;" class="option ui-btn-inline">2. <span class="pigss-pencil"></span>Product</a><a href="#15vwsnbrvlu" data-rel="popup" style="border-color:black;font-size:1em;" class="15optionunt ui-btn ui-btn-f ui-btn-inline ui-mini">1.<span class="pigss-pencil" style="color:pink"></span> 1 pcs</a></div>
</div>
</div>
	
	
	
	
	
	
	
	<a href="#<?php echo $pj.$ap;?>vw" data-rel="popup" class="ui-btn ui-btn ui-btn-inline ui-corner-all ui-mini ui-btn-icon-left ui-icon-search"><?php if($_SESSION[tn]==PRC){echo '控制板预览';}else if($_SESSION[tn]==EN){echo 'Panel preview';}else{echo '控制板預覽';}?></a>
	<?php ;}?>
	
	<?php //if(file_exists('../panel/'.$roww[pjnbr].'/panel'.$ap.'.html')){
	//if(file_exists('../panel/'.$roww[pjnbr].'/temp/panel'.$ap.'.html') and !$pres){?>
	<!--<div data-role="controlgroup" data-type="horizontal" class="ui-btn-inline" data-corners="false">
	<a href="vwpanel.php?pj=<?php echo $roww[pjnbr]?>&ap=<?php echo $roww[ap]?>&pn=<?php echo $pn?>&tm=<?php echo $tm?>&pres=1" data-ajax="false" class="ui-btn ui-btn-f ui-btn-inline ui-corner-all ui-mini" style="color:pink"><?php if($_SESSION[tn]==PRC){echo '改用上次储存';}else if($_SESSION[tn]==EN){echo 'Using previous save';}else{echo '改用上次儲存';}?></a>
	<?php if(file_exists('../panel/'.$roww[pjnbr].'/temp/'.$ap.'[1].html')){?>
	<a href="vwpanel.php?pj=<?php echo $roww[pjnbr]?>&ap=<?php echo $roww[ap]?>&pn=<?php echo $pn?>&tm=<?php echo $tm?>&pres=2" data-ajax="false" class="ui-btn ui-btn-f ui-btn-inline ui-corner-all ui-mini" style="color:pink">2</a>	<?php ;}if(file_exists('../panel/'.$roww[pjnbr].'/temp/'.$ap.'[2].html')){?>
	<a href="vwpanel.php?pj=<?php echo $roww[pjnbr]?>&ap=<?php echo $roww[ap]?>&pn=<?php echo $pn?>&tm=<?php echo $tm?>&pres=3" data-ajax="false" class="ui-btn ui-btn-f ui-btn-inline ui-corner-all ui-mini" style="color:pink">3</a>	<?php ;}if(file_exists('../panel/'.$roww[pjnbr].'/temp/'.$ap.'[3].html')){?>
	<a href="vwpanel.php?pj=<?php echo $roww[pjnbr]?>&ap=<?php echo $roww[ap]?>&pn=<?php echo $pn?>&tm=<?php echo $tm?>&pres=4" data-ajax="false" class="ui-btn ui-btn-f ui-btn-inline ui-corner-all ui-mini" style="color:pink">4</a>	<?php ;}?>
	</div>!-->
<?php //;}else{?>
<!--<a href="vwpanel.php?pj=<?php echo $roww[pjnbr]?>&ap=<?php echo $roww[ap]?>&pn=<?php echo $pn?>&tm=<?php echo $tm?>"  data-ajax="false" class="ui-btn ui-btn-f ui-btn-inline ui-corner-all ui-mini" style="color:pink" ><?php if($_SESSION[tn]==PRC){echo '不改用上'.$pres.'次储存';}else if($_SESSION[tn]==EN){echo 'Not using previous save '.$pres;}else{echo '不改用上'.$pres.'次儲存';}?></a>!-->
<?php //;}
	//;}//?>
	
	
	<hr>
	<span style="color:black"><?php if($_SESSION[tn]==PRC){echo '专案';}else if($_SESSION[tn]==EN){echo 'Project';}else{echo '專案';}?></span>
	<?php 	$sql=$db->query("select * from webpj where cno='$pj'");
	if($sql)$row=$sql->fetch();
	echo '['.htmlspecialchars($row[date]).'] '.htmlspecialchars($row[title]);?>
	
	&nbsp;&nbsp;&nbsp;&nbsp;
	
	<span style="color:black"><?php if($_SESSION[tn]==PRC){echo '应用页称';}else if($_SESSION[tn]==EN){echo 'Page name';}else{echo '應用頁稱';}?></span> :
	<?php echo htmlspecialchars($roww[title])?>
	<hr>
	<b style="color:blue"><?php if($_SESSION[tn]==PRC){echo '控制板设定';}else if($_SESSION[tn]==EN){echo 'Panel setting';}else{echo '控制板設定';}?></b>
	

	
<?php   if($pn){
			if($pres){
				if($pres==1){$preshtml = '';}else if($pres==2){$preshtml = '[1]';}else if($pres==3){$preshtml = '[2]';}else if($pres==4){$preshtml = '[3]';}
				$ht = file_get_contents('../panel/'.$roww[pjnbr].'/temp/panel'.$ap.$preshtml.'.html');
	  		 ;}else{
				$ht = file_get_contents('../panel/'.$roww[pjnbr].'/panel'.$ap.'.html');			
	   		;}
			$hts = $ht;
			//$ht = file_get_contents('../panel/'.$roww[pjnbr].'/panel'.$ap.'.html');
			
			if(!$_POST[guanyin1]){ 
			 if(substr_count($ht,"<div")!=substr_count($ht,"</div>")){ 
	 		 if($_SESSION[tn]==PRC){		
			 	echo '<script>alert("请检查此段控制板内容的html码.\r\n<div>或<div 的数量是 '.substr_count($ht,"<div").'.\r\n但</div> 的数量是 '.substr_count($ht,"</div>").'.")</script>';
			 }else if($_SESSION[tn]==EN){
		 		echo '<script>alert("Please check the html code of this Panel content.\r\nThe number of <div> or <div is '.substr_count($ht,"<div").'.\r\nBut the number of </div> is '.substr_count($ht,"</div>").'.")</script>';
			 }else{
				 echo '<script>alert("請檢查此段控制板內容的html碼.\r\n<div>或<div 的數量是 '.substr_count($ht,"<div").'.\r\n但</div> 的數量是 '.substr_count($ht,"</div>").'.")</script>';
			}			
			;}
			;}
			
			$ht = str_replace('(images/','(../panel/'.$roww[pjnbr].'/images/',$ht);
			$ht = str_replace('"images/','"../panel/'.$roww[pjnbr].'/images/',$ht);
			$v = explode('?v=',$ht);$vp = explode('.html',$v[1]);$vps = explode('"',$vp[1]);	
			$ht = str_replace('src="','src="../panel/'.$roww[pjnbr].'/',$ht);
			$ht= str_replace('../panel/'.$roww[pjnbr].'/'.htmlspecialchars($vp[0]).'.html?v='.htmlspecialchars($vp[0]).'.html'.htmlspecialchars($vps[0]),'view.php?pj='.htmlspecialchars($vps[0]).'&ap='.htmlspecialchars($vp[0]).'&vw=ap&v='.htmlspecialchars($vp[0]).'.html'.htmlspecialchars($vps[0]),$ht);
			$ht = str_replace('vwdata" class="vws ui-content" style="width:80%;"></div>','vwdata" class="vws ui-content" style="width:80%;"><a  style="border-style:solid;border-color:pink;padding:10px;cursor:pointer;" class="option ui-btn-inline">2. <span class="pigss-pencil"></span>Product</a><a href="#'.$pj.$ap.'vwsnbrvlu" data-rel="popup" style="border-color:black;font-size:1em;" class="'.$pj.$ap.'optionunt ui-btn ui-btn-f ui-btn-inline ui-mini">1.<span class="pigss-pencil" style="color:pink"></span> 1 pcs</a></div>',$ht);
			//$ht = str_replace('href="#'.$pj.$ap.'vwv" data-rel="popup"','href="#"',$ht);
			
			echo $ht;
			
			$tbgnvlu = explode('<!--data',$ht);
			$tbgsvlu = explode('data!-->',$tbgnvlu[1]);
			$tbgvlu = explode('@#@',$tbgsvlu[0]);
			
			$sendformvlu = $tbgvlu[0]; 
			$sendformbtnvlu = $tbgvlu[1];
			$ordbtnvlu = $tbgvlu[2];
			$ordbtnbgvlu = $tbgvlu[3];
			$formhtmlvlu = $tbgvlu[4];
			
			
			$uservlu = $tbgvlu[5];
			$userbtnvlu = $tbgvlu[6];
			$userbordervlu = $tbgvlu[7];
			$nbrkeyvlu = $tbgvlu[8];
			$nbrbtnvlu = $tbgvlu[9];
			$frbtnvlu = $tbgvlu[10];
			
			$clrdatabtnvlu = $tbgvlu[11];
			
			$hlpbtnvlu = $tbgvlu[12];
			$bghlpvlu = $tbgvlu[13];
			$bghlpnvlu = $tbgvlu[14];		
			$panelbgvlu = $tbgvlu[15];
			$pricebgvlu = $tbgvlu[16];
			$tpricebgvlu = $tbgvlu[17];
			$sltareavlu = $tbgvlu[18];
			
			$tmsgvlu = $tbgvlu[19];
			$timesvlu = $tbgvlu[20];
			$plusvlu = $tbgvlu[21];
			$plusnvlu = $tbgvlu[22];
			$plusmsgvlu = $tbgvlu[23];
			
			$uconfirmbtnvlu  = $tbgvlu[24];
			$uamendbtnvlu  = $tbgvlu[25];
			$udatabtnvlu = $tbgvlu[26];
			$uclrbtnvlu = $tbgvlu[27];
			
			$nbrkeytitlevlu  = $tbgvlu[28];
			$frbtntitlevlu = $tbgvlu[29];
			$typvlu = $tbgvlu[30];
			$orderinfovlu = $tbgvlu[31];
			$posturlvlu = $tbgvlu[32];
			
		;}
	?>	
	<FORM action="vwpanel.php?pj=<?php echo htmlspecialchars($roww[pjnbr]) ?>&ap=<?php echo htmlspecialchars($roww[ap]) ?>&tm=<?php echo htmlspecialchars($tm) ?>&pn=<?php echo htmlspecialchars($pn) ?>" id="webxls" method="post" data-ajax="false" >
	
	<div class="ui-grid-a"><div class="ui-block-a">
	<?php if($_SESSION[tn]==PRC){echo 'SendForm按鈕标题';}else if($_SESSION[tn]==EN){echo 'Title of SendForm button ';}else{echo 'SendForm按鈕標題';}?><input type="text" name="sendform" placeholder="" value="<?php if($sendformvlu){echo htmlspecialchars($sendformvlu);}else{echo 'Send Form';}?>">
	</div><div class="ui-block-b">
	<?php if($_SESSION[tn]==PRC){echo '- 按鈕背景';}else if($_SESSION[tn]==EN){echo '- Button background';}else{echo '- 按鈕背景';}?><input type="text" name="sendformbtn" placeholder="" value="<?php echo htmlspecialchars($sendformbtnvlu)?>">
	</div>
	
	<div class="ui-block-a">
	<?php if($_SESSION[tn]==PRC){echo '巳选项序列按钮标题';}else if($_SESSION[tn]==EN){echo 'Title of data sequence button';}else{echo '巳選項序列按鈕標題';}?><input type="text" name="ord" placeholder="" value="<?php if($ordbtnvlu){echo htmlspecialchars($ordbtnvlu);}else{echo '1,2,5,';}?>">
	</div><div class="ui-block-b">
	<?php if($_SESSION[tn]==PRC){echo '- 按鈕背景';}else if($_SESSION[tn]==EN){echo '- Button background';}else{echo '- 按鈕背景';}?><input type="text" name="ordbtnbg" placeholder="" value="<?php echo htmlspecialchars($ordbtnbgvlu)?>">
	</div><div class="ui-block-a">
	<b style="color:blue"><?php if($_SESSION[tn]==PRC){echo '表格功能页';}else if($_SESSION[tn]==EN){echo 'Form function page';}else{echo '表格功能頁';}?></b><?php 	
	$i='';
	$sql=$db->query("select * from webhtml where pjnbr='$roww[pjnbr]' order by nbr desc");
	if($sql){
	while($row=$sql->fetch()){
	if(!$i){echo '<select name="formhtml"><option value="">';
	if($_SESSION[tn]==PRC){echo '选择';}else if($_SESSION[tn]==EN){echo 'Select';}else{echo '選擇';}
	echo '</option>';$i=1;}
	if($row[hidden]!=5 and $row[style]!='app'){
	if($row[pjn]){$apv = $row[apn];}else{$apv = $row[ap];}
	if(file_exists('../panel/'.$roww[pjnbr].'/'.htmlspecialchars($apv).'.html')){
	$htmlweb = file_get_contents('../panel/'.$roww[pjnbr].'/'.htmlspecialchars($apv).'.html');
	if(strpos($htmlweb,'<!--sysformsys!-->')!=false and $htmlweb){$htmlwebs = 1;
	echo '<option value="'.htmlspecialchars($apv).'.html" ';
	if($formhtmlvlu)echo 'selected="selected"';
	echo '>['.htmlspecialchars($row[date]).'] '.htmlspecialchars($row[title]).'</option>';
	}
	}
	;}	
	;};}if($i)echo '</select>';
	if(!$i or !$htmlwebs){echo '<br>';if($_SESSION[tn]==PRC){echo '未有此种功能页。';}else if($_SESSION[tn]==EN){echo 'No such function page.';}else{echo '未有此種功能頁。';};}
	?><BR>
	<b style="color:blue"><?php if($_SESSION[tn]==PRC){echo '伺服器表格URL';}else if($_SESSION[tn]==EN){echo 'Server form page';}else{echo '伺服器表格URL';}?></b>
	<input name="posturl" value="<?php echo htmlspecialchars($posturlvlu)?>">
	</div><div class="ui-block-b">
	<?php if($_SESSION[tn]==PRC){echo '巳选列表形式';}else if($_SESSION[tn]==EN){echo 'Style of selected item list';}else{echo '巳選列表形式';}?><select name="typ"><option value=""><?php if($_SESSION[tn]==PRC){echo '一行一个';}else if($_SESSION[tn]==EN){echo 'one item per row';}else{echo '一行一個';}?></option><option value="1" <?php if($typvlu)echo 'selected="selected"';?>><?php if($_SESSION[tn]==PRC){echo '不限一行一个';}else if($_SESSION[tn]==EN){echo 'NOT one item per row';}else{echo '不限一行一個';}?></option></select>
	</div></div>


<HR>
<b style="color:blue"><?php if($_SESSION[tn]==PRC){echo '用户自定按钮';}else if($_SESSION[tn]==EN){echo 'APP user custom button';}else{echo '用戶自定按鈕';}?></b>
<div class="ui-grid-d">
<div class="ui-block-a">
	<?php if($_SESSION[tn]==PRC){echo '创建按钮的标题';}else if($_SESSION[tn]==EN){echo 'Title of creating button';}else{echo '創建按鈕的標題';}?><input type="text" name="user" placeholder="" value="<?php echo htmlspecialchars($uservlu)?>">
	</div><div class="ui-block-b">
	<?php if($_SESSION[tn]==PRC){echo '按鈕背景';}else if($_SESSION[tn]==EN){echo 'Button background';}else{echo '按鈕背景';}?><input type="text" name="userbtn" placeholder="" value="<?php echo htmlspecialchars($userbtnvlu)?>">
	</div><div class="ui-block-c">
	<?php if($_SESSION[tn]==PRC){echo '作实按钮的标题';}else if($_SESSION[tn]==EN){echo 'Title of confirm button';}else{echo '作實按鈕的標題';}?><input type="text" name="uconfirmbtn" placeholder="" value="<?php echo htmlspecialchars($uconfirmbtnvlu)?>">
	</div><div class="ui-block-d">
	<?php if($_SESSION[tn]==PRC){echo '修改自定数据按钮的标题';}else if($_SESSION[tn]==EN){echo 'Title of amendment button';}else{echo '修改自定數據按鈕的標題';}?><input type="text" name="uamendbtn" placeholder="" value="<?php echo htmlspecialchars($uamendbtnvlu)?>">
	</div><div class="ui-block-e">
	<?php if($_SESSION[tn]==PRC){echo '自定项修改按钮的标题';}else if($_SESSION[tn]==EN){echo 'Title of data amend button';}else{echo '自定項修改按鈕的標題';}?><input type="text" name="udatabtn" placeholder="" value="<?php echo htmlspecialchars($udatabtnvlu)?>">
	</div></div>	
<div class="ui-grid-c"><div class="ui-block-a">
<b style="color:blue"><?php if($_SESSION[tn]==PRC){echo '巳自定按钮';}else if($_SESSION[tn]==EN){echo 'Created button';}else{echo '巳自定按鈕';}?></b><br><?php if($_SESSION[tn]==PRC){echo '巳选项的边色';}else if($_SESSION[tn]==EN){echo 'Border color of selected item';}else{echo '巳選項的邊色';}?>	</div><div class="ui-block-b">
<input type="text" name="userborder" placeholder="" value="<?php echo htmlspecialchars($userbordervlu)?>">
	</div>
	<div class="ui-block-c">
<?php if($_SESSION[tn]==PRC){echo '巳选自定项清除按钮的标题';}else if($_SESSION[tn]==EN){echo 'Title of data clear button';}else{echo '巳選自定項清除按鈕的標題';}?>	</div><div class="ui-block-d">
<input type="text" name="uclrbtn" placeholder="" value="<?php echo htmlspecialchars($uclrbtnvlu)?>">
	</div>
	</div>
	<HR>
	<b style="color:blue"><?php if($_SESSION[tn]==PRC){echo '数量按钮';}else if($_SESSION[tn]==EN){echo 'Quantity button';}else{echo '數量按鈕';}?></b>
	<div class="ui-grid-d"><div class="ui-block-a">
	<?php if($_SESSION[tn]==PRC){echo '数量键盘标题';}else if($_SESSION[tn]==EN){echo 'Title of Quantity keyboard';}else{echo '數量鍵盤標題';}?><input type="text" name="nbrkeytitle" placeholder="" value="<?php echo htmlspecialchars($nbrkeytitlevlu)?>">
	</div><div class="ui-block-b">
	<?php if($_SESSION[tn]==PRC){echo '作实键标题';}else if($_SESSION[tn]==EN){echo ' Title of Enter button';}else{echo '作實鍵標題';}?><input type="text" name="frbtntitle" placeholder="" value="<?php echo htmlspecialchars($frbtntitlevlu)?>">
	</div><div class="ui-block-c">
	<?php if($_SESSION[tn]==PRC){echo '数量键盘背景';}else if($_SESSION[tn]==EN){echo 'Quantity keyboard\'s background';}else{echo '數量鍵盤背景';}?><input type="text" name="nbrkey" placeholder="" value="<?php echo htmlspecialchars($nbrkeyvlu)?>">
	</div><div class="ui-block-d">
	<?php if($_SESSION[tn]==PRC){echo '数量键背景';}else if($_SESSION[tn]==EN){echo 'Quantity button\'s background';}else{echo '數量鍵背景';}?><input type="text" name="nbrbtn" placeholder="" value="<?php echo htmlspecialchars($nbrbtnvlu)?>">
	</div><div class="ui-block-e">
	<?php if($_SESSION[tn]==PRC){echo '数量作实键背景';}else if($_SESSION[tn]==EN){echo 'Enter button\'s background';}else{echo '數量作實鍵背景';}?><input type="text" name="frbtn" placeholder="" value="<?php echo htmlspecialchars($frbtnvlu)?>">
	</div>
	</div>
<HR>
<div class="ui-grid-a"><div class="ui-block-a" style="width:25%">
	<b style="color:blue"><?php if($_SESSION[tn]==PRC){echo '巳填数据清除按钮';}else if($_SESSION[tn]==EN){echo 'Clear button of existing data';}else{echo '巳填數據清除按鈕';}?></b> <?php if($_SESSION[tn]==PRC){echo '按钮标题';}else if($_SESSION[tn]==EN){echo 'Button title';}else{echo '按鈕標題';}?></div>
	
	<div class="ui-block-b" style="width:75%"><b style="color:blue"><?php if($_SESSION[tn]==PRC){echo '巳填数据排序资讯';}else if($_SESSION[tn]==EN){echo 'Ordering info of existing data';}else{echo '巳填數據排序資訊';}?></b></div>
	
	<div class="ui-block-a" style="width:25%"><input type="text" name="clrdatabtn" placeholder="" value="<?php echo htmlspecialchars($clrdatabtnvlu)?>">
	</div>
	
	<div class="ui-block-b" style="width:75%"><input type="text" name="orderinfo" placeholder="" value="<?php echo htmlspecialchars($orderinfovlu)?>"></div>
	</div>
<HR>

	<b style="color:blue"><?php if($_SESSION[tn]==PRC){echo '帮助按钮';}else if($_SESSION[tn]==EN){echo 'Help button';}else{echo '幫助按鈕';}?></b>
	<div class="ui-grid-b"><div class="ui-block-a">
	<?php if($_SESSION[tn]==PRC){echo '按钮标题';}else if($_SESSION[tn]==EN){echo 'Button title';}else{echo '按鈕標題';}?><input type="text" name="hlpbtn" placeholder="" value="<?php echo htmlspecialchars($hlpbtnvlu);?>">
	</div><div class="ui-block-b"><?php if($_SESSION[tn]==PRC){echo '背景';}else if($_SESSION[tn]==EN){echo 'Button background';}else{echo '背景';}?>
	<input type="text" name="bghlp" placeholder="" value="<?php echo htmlspecialchars($bghlpvlu)?>">
	</div><div class="ui-block-c">
	<?php if($_SESSION[tn]==PRC){echo '内容档';}else if($_SESSION[tn]==EN){echo 'Content file';}else{echo '內容檔';}?>
	<input type="text" name="bghlpn" placeholder="" value="<?php echo htmlspecialchars($bghlpnvlu)?>">
</div></div>
<HR>
	<b style="color:blue"><?php if($_SESSION[tn]==PRC){echo '区域背景';}else if($_SESSION[tn]==EN){echo 'Area background';}else{echo '區域背景';}?></b>
	<div class="ui-grid-a"><div class="ui-block-a">
	<?php if($_SESSION[tn]==PRC){echo '控制板';}else if($_SESSION[tn]==EN){echo 'Panel area';}else{echo '控制板';}?><input type="text" name="panelbg" placeholder="" value="<?php echo htmlspecialchars($panelbgvlu)?>">
	</div><div class="ui-block-b">
	<?php if($_SESSION[tn]==PRC){echo '计算';}else if($_SESSION[tn]==EN){echo 'Price area';}else{echo '計算';}?><input type="text" name="pricebg" placeholder="" value="<?php echo htmlspecialchars($pricebgvlu)?>">
	</div><div class="ui-block-a">
	<?php if($_SESSION[tn]==PRC){echo '总数';}else if($_SESSION[tn]==EN){echo 'Total price area';}else{echo '總數';}?><input type="text" name="tpricebg" placeholder="" value="<?php echo htmlspecialchars($tpricebgvlu)?>">
	</div><div class="ui-block-b">
	<?php if($_SESSION[tn]==PRC){echo '巳选项区域';}else if($_SESSION[tn]==EN){echo 'Selected option area';}else{echo '巳選項區域';}?><input type="text" name="sltarea" placeholder="" value="<?php echo htmlspecialchars($sltareavlu)?>">
	</div>
	</div>
	<HR>
	<?php if($_SESSION[tn]==PRC){echo '总数备注';}else if($_SESSION[tn]==EN){echo 'Remark of total amount';}else{echo '總數備註';}?><input type="text" name="tmsg" placeholder="" value="<?php echo htmlspecialchars($tmsgvlu);?>">
	<HR>
	<b style="color:blue"><?php if($_SESSION[tn]==PRC){echo '款项总数计算';}else if($_SESSION[tn]==EN){echo 'Calculation of total amount';}else{echo '款項總數計算';}?></b>
	<div class="ui-grid-b"><div class="ui-block-a">
	<?php if($_SESSION[tn]==PRC){echo '总数乘[%]';}else if($_SESSION[tn]==EN){echo '% of total amount';}else{echo '總數乘[%]';}?><input type="number" name="times" placeholder="" value="<?php echo htmlspecialchars($timesvlu);?>">
	</div><div class="ui-block-b"><?php if($_SESSION[tn]==PRC){echo '总数乘再加常数';}else if($_SESSION[tn]==EN){echo 'Plus constant[before % of total amount]';}else{echo '總數乘再加常數';}?><input type="text" name="plus" placeholder="" value="<?php echo htmlspecialchars($plusvlu);?>">
	</div><div class="ui-block-c">
	<?php if($_SESSION[tn]==PRC){echo '总数加常数再乘%';}else if($_SESSION[tn]==EN){echo 'Plus constant[after % of total amount]';}else{echo '總數加常數再乘%';}?><input type="text" name="plusn" placeholder="" value="<?php echo htmlspecialchars($plusnvlu);?>">
</div></div>
<?php if($_SESSION[tn]==PRC){echo '计算备注';}else if($_SESSION[tn]==EN){echo 'Calculation remark';}else{echo '計算備註';}?><input type="text" name="plusmsg" placeholder="" value="<?php echo htmlspecialchars($plusmsgvlu);?>">
<HR>
	<input type="hidden" name="guanyin1" value="<?php if(!$_POST[guanyin1])$_SESSION[guanyin1]=rand();
	echo htmlspecialchars($_SESSION[guanyin1]); ?>">
	<div class="ui-grid-b"><div class="ui-block-a">

	<input type="submit" name="submit" id="webxlsbtn" Value="<?php if($_SESSION[tn]==PRC){echo '送交';}else if($_SESSION[tn]==EN){echo 'SEND';}else{echo '送交';}?>">
	</div><div class="ui-block-b">
	<div data-role="popup" id="steps" style="min-width:300px;max-width:85%" data-position-to="window" data-theme="f">
	<p style="color:pink"><?php if($_SESSION[tn]==PRC){echo '填写资料';}else if($_SESSION[tn]==EN){echo 'Fiil in data';}else{echo '填寫資料';}?></p>
	<p><?php if($_SESSION[tn]==PRC){echo '此页资料均不是必填。若启用用户自定按钮,须填相关按钮的标题。';}else if($_SESSION[tn]==EN){echo 'The data in this page are optional. If you need to enable the user self-define function, you need to enter the related button title.';}else{echo '此頁資料均不是必填。若啟用用戶自定按鈕,須填相關按鈕的標題。';}?></p>
	<p><?php if($_SESSION[tn]==PRC){echo '若此应用页设计不同的选项按钮,均用此控制板。';}else if($_SESSION[tn]==EN){echo 'Quick buttons on one APP page uses same panel.';}else{echo '若此應用頁設計不同的選項按鈕,均用此控制板。';}?></p>
	
	<hr>
	<p style="color:pink"><?php if($_SESSION[tn]==PRC){echo '预览计设';}else if($_SESSION[tn]==EN){echo 'Preview';}else{echo '預覽計設';}?></p>
	<p><?php if($_SESSION[tn]==PRC){echo '点撀上面的预览按钮,预览相约的设计。';}else if($_SESSION[tn]==EN){echo 'You can click the above \'Preview\' button. But it is for reference only.';}else{echo '點撀上面的預覽按鈕,預覽相約的設計。';}?></p>
	

	
</div>




	<div data-role="popup" id="inf" data-position-to="window" data-theme="f" style="padding:5px;" class="ifrwidthps"><a href="#" class="popn ui-btn ui-btn-z ui-corner-all ui-icon-delete ui-btn-icon-notext" data-rel="back"></a>
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo 'SendForm按鈕标题';}else if($_SESSION[tn]==EN){echo '	Title of SendForm button';}else{echo 'SendForm按鈕標題';}?></b>
	<?php if($_SESSION[tn]==PRC){echo '若巳设计表格功能的应用页,您能将数据填到表格内。此项是将数据填到表格的按钮。';}else if($_SESSION[tn]==EN){echo 'The selected data can be copied to a form function page. This title item is about the send data button.';}else{echo '若巳設計表格功能的應用頁,您能將數據填到表格內。此項是將數據填到表格的按鈕。';}?><?php if($_SESSION[tn]==PRC){echo '若在标题加填[icon],标题旁被加特定符号e.g. 标题是??,填??[icon]。';}else if($_SESSION[tn]==EN){echo 'You can add [icon] to the title for adding specific icon to the button. e.g. title is ??, fill in ??[icon]';}else{echo '若在標題加填[icon],標題旁被加特定符號e.g. 標題是??,填??[icon]。';}?></p>	
	
	<p><b style="color:black">SendForm<?php if($_SESSION[tn]==PRC){echo '按鈕不设标题';}else if($_SESSION[tn]==EN){echo ' button without title';}else{echo '按鈕不設標題';}?></b>
	<?php if($_SESSION[tn]==PRC){echo '若键入apps作为标题,按钮没有文字。控制板顶部的按钮均能使用此方法设定。';}else if($_SESSION[tn]==EN){echo 'You can enter apps as title to let this button without title. This method is applicable to all buttons on the panel.';}else{echo '若鍵入apps作為標題,按鈕沒有文字。控制板頂部的按鈕均能使用此方法設定。';}?></p>	
	
	<p><?php if($_SESSION[tn]==PRC){echo '若键入appsqr作为标题,按钮没有文字,按钮符改qr code符号。若在标题加[appsqr],e.g. pork[appsqr],按钮符改qr code符号。此等方法只限此项。';}else if($_SESSION[tn]==EN){echo 'You can enter appsqr as title to let this button without title and button icon becoming qr code. You can add [appsqr] to title to let this button with title and qr code. e.g. pork[appsqr]. This method is applicable to all buttons on the panel.';}else{echo '若鍵入appsqr作為標題,按鈕沒有文字,按鈕符改qr code符號。若在標題加[appsqr],e.g. pork[appsqr],按鈕符改qr code符號。此等方法只限此項。';}?></p>	
	<hr>
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '背景';}else if($_SESSION[tn]==EN){echo 'Background';}else{echo '背景';}?></b>
	<?php if($_SESSION[tn]==PRC){echo '图像档案须存於panel/'.$roww[pjnbr].'/images档夹内。若设置背景图像上下左右重覆显示,在档案名加[xy]。e.g. picture[xy].png';}else if($_SESSION[tn]==EN){echo 'It is about the backgrounds of button/panel. If you use the APP pictures, you need to prepare pictures and store them in  panel/'.$roww[pjnbr].'/images folder. If you add [xy] to the picture file name (e.g. picture[xy].png, the picture will be repeated both vertically and horizontally in button area.';}else{echo '圖像檔案須存於panel/'.$roww[pjnbr].'/images檔夾內。若設置背景圖像上下左右重覆顯示,在檔案名加[xy]。e.g. picture[xy].png';}?></p>
	<p><?php if($_SESSION[tn]==PRC){echo '您亦能在背景填上rgb颜色码 e.g. rgb(125,125,125), rgba颜色码 e.g. rgba(125,125,125,0.5) 或 hex颜色码 e.g. #123456颜色码代替背景图像。';}else if($_SESSION[tn]==EN){echo 'You can add rgb color code e.g. rgb(125,125,125), rgba color code e.g. rgba(125,125,125,0.5) or hex color code e.g. #123456 instead of background picture.';}else{echo '您亦能在背景填上rgb顏色碼 e.g. rgb(125,125,125), rgba顏色碼 e.g. rgba(125,125,125,0.5) 或 hex顏色碼 e.g. #123456代替背景圖像。';}?></p> 
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '表格功能页';}else if($_SESSION[tn]==EN){echo 'Form function page';}else{echo '表格功能頁';}?></b>
		<?php if($_SESSION[tn]==PRC){echo '必须使用表格功能设计表格接收巳选数据,并用作寄送或QR二维码。当改修该表格内容,您亦须到此页提送一次。';}else if($_SESSION[tn]==EN){echo 'You need to use form creating function to design form to receive data for sending or QR code. You need to send this page data once the form content was amended.';}else{echo '必須使用表格功能設計表格接收巳選數據,並用作寄送或QR二維碼。當改修該表格內容,您亦須到此頁提送一次。';}?></p>
		<p><?php if($_SESSION[tn]==PRC){echo '您亦能试用存於伺服器的表格,填表格URL。填此项则不用填表格功页。';}else if($_SESSION[tn]==EN){echo 'You can also use your form stored in your Server. You need to fill in the form URL. If you use this method, you do not need to select the Form function page mentioned above.';}else{echo '您亦能試用存於伺服器的表格,填表格URL。填此項則不用填表格功頁。';}?></p>
		
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '巳选列表形式';}else if($_SESSION[tn]==EN){echo 'Style of selected item list';}else{echo '巳選列表形式';}?></b>
		<?php if($_SESSION[tn]==PRC){echo '在巳选项列表上是否限数据一行一个。';}else if($_SESSION[tn]==EN){echo 'It is about the limitation of one data per row or not.';}else{echo '在巳選項列表上是否限數據一行一個。';}?></p>
	<hr>
		
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '巳选项序列按钮标题';}else if($_SESSION[tn]==EN){echo 'Title of data sequence button';}else{echo '巳選項序列按鈕標題';}?></b>
	<?php if($_SESSION[tn]==PRC){echo '此项是将特定数据更改次序的按钮。';}else if($_SESSION[tn]==EN){echo 'This title item is about the selected data re-ordering button.';}else{echo '此項是將特定數據更改次序的按鈕。';}?><?php if($_SESSION[tn]==PRC){echo '若在标题加填[icon],标题旁被加特定符号e.g. 标题是??,填??[icon]。';}else if($_SESSION[tn]==EN){echo 'You can add [icon] to the title for adding specific icon to the button. e.g. title is ??, fill in ??[icon]';}else{echo '若在標題加填[icon],標題旁被加特定符號e.g. 標題是??,填??[icon]。';}?></p>	
	
	<hr>
		
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '用户自定按钮';}else if($_SESSION[tn]==EN){echo 'APP user custom button';}else{echo '用戶自定按鈕';}?></b>
	<?php if($_SESSION[tn]==PRC){echo '填上\'创建按钮\'标题启用此功能,是供用户自定建入数据的按钮。';}else if($_SESSION[tn]==EN){echo 'You can enable this function by entering the title of \'Creation button\'. The function is to let APP user to create custom data button.';}else{echo '填上\'創建按鈕\'標題啟用此功能,是供用戶自定建入數據的按鈕。';}?><?php if($_SESSION[tn]==PRC){echo '若在标题加填[icon],标题旁被加特定符号e.g. 标题是??,填??[icon]。';}else if($_SESSION[tn]==EN){echo 'You can add [icon] to the title for adding specific icon to the button. e.g. title is ??, fill in ??[icon]';}else{echo '若在標題加填[icon],標題旁被加特定符號e.g. 標題是??,填??[icon]。';}?></p>	
	<p><?php if($_SESSION[tn]==PRC){echo '点撀上面的控制板有进一步的标题及使用解释。';}else if($_SESSION[tn]==EN){echo 'Please click the above Panel example for explanation of related button titles and their usage.';}else{echo '點撀上面的控制板有進一步的標題及使用解釋。';}?></p>
	
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '巳自定按钮';}else if($_SESSION[tn]==EN){echo 'Created button';}else{echo '巳自定按鈕';}?></b>
	<?php if($_SESSION[tn]==PRC){echo '用户自定数据巳创建的按钮。';}else if($_SESSION[tn]==EN){echo 'This item is about the created custom data button.';}else{echo '用戶自定數據巳創建的按鈕。';}?></p>	
	<p><?php if($_SESSION[tn]==PRC){echo '巳选项的边色是填上html颜色码 e.g. #123456。';}else if($_SESSION[tn]==EN){echo 'You can add  color code e.g. #123456 to border color of selected item.';}else{echo '巳選項的邊色是填上html顏色碼 e.g. #123456。';}?></p>
	
<hr>		
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '数量键盘';}else if($_SESSION[tn]==EN){echo 'Quantity keyboard';}else{echo '數量鍵盤';}?></b>
	<?php if($_SESSION[tn]==PRC){echo '特定选项能键入数量,用户点撀此种按钮时显示的数量键盘。';}else if($_SESSION[tn]==EN){echo 'Specific data button is needed to enter its quantity value. Quantity keyboard is about this entry. ';}else{echo '特定選項能鍵入數量,用戶點撀此種按鈕時顯示的數量鍵盤。';}?></p>	
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '数量键盘标题';}else if($_SESSION[tn]==EN){echo 'Title of Quantity keyboard';}else{echo '數量鍵盤標題';}?></b>
	<?php if($_SESSION[tn]==PRC){echo '您能在数量键盘上加标题。';}else if($_SESSION[tn]==EN){echo 'You can add title to the Quantity keyboard. ';}else{echo '您能在數量鍵盤上加標題。';}?></p>	
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '作实键标题';}else if($_SESSION[tn]==EN){echo ' Title of Enter button';}else{echo '作實鍵標題';}?></b>
		<?php if($_SESSION[tn]==PRC){echo '您能在数量键盘的作实键加标题。此按钮是确实键入的数量值。';}else if($_SESSION[tn]==EN){echo 'You can add title to Enter button of the Quantity keyboard. This button is to confirm the quantity value entered. ';}else{echo '您能在數量鍵盤的作實鍵加標題。此按鈕是確實鍵入的數量值。';}?></p>	
<p><?php if($_SESSION[tn]==PRC){echo '点撀上面的控制板有标题位置解释。';}else if($_SESSION[tn]==EN){echo 'Please click the above Panel example for explanation of related button titles.';}else{echo '點撀上面的控制板有標題位置解釋。';}?></p>
<hr>		
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '巳填数据清除按钮';}else if($_SESSION[tn]==EN){echo 'Clear button of existing data';}else{echo '巳填數據清除按鈕';}?></b>
<?php if($_SESSION[tn]==PRC){echo '应用用户点撀能清除所有巳填数据,此按钮是在巳选项序列按钮的popup内。';}else if($_SESSION[tn]==EN){echo 'It is for APP user is to clear all data. It is within data listing popup of sequence button.';}else{echo '應用用戶點撀能清除所有巳填數據,此按鈕是在巳選項序列按鈕的popup內。';}?></p>	

<hr>		
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '帮助按钮';}else if($_SESSION[tn]==EN){echo 'Help button';}else{echo '幫助按鈕';}?></b>
<?php if($_SESSION[tn]==PRC){echo '您能在控制板上加上显示文字档的popup按钮。';}else if($_SESSION[tn]==EN){echo 'You can add help button to show popup of text content to the panel.';}else{echo '您能在控制板上加上顯示文字檔的popup按鈕。';}?><?php if($_SESSION[tn]==PRC){echo '若在标题加填[icon],标题旁被加特定符号e.g. 标题是??,填??[icon]。';}else if($_SESSION[tn]==EN){echo 'You can add [icon] to the title for adding specific icon to the button. e.g. title is ??, fill in ??[icon]';}else{echo '若在標題加填[icon],標題旁被加特定符號e.g. 標題是??,填??[icon]。';}?></p>	
<hr>		
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '总数备注';}else if($_SESSION[tn]==EN){echo 'Remark of total amount';}else{echo '總數備註';}?></b>
	<?php if($_SESSION[tn]==PRC){echo '在总数再加备注。';}else if($_SESSION[tn]==EN){echo 'It is about remark adding to total amount.';}else{echo '在總數加備註。';}?>

	</p>	
<hr>		
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '款项总数计算';}else if($_SESSION[tn]==EN){echo 'Calculation of total amount';}else{echo '款項總數計算';}?></b>
	<?php if($_SESSION[tn]==PRC){echo '填写下列其中一个数才启用此功能。';}else if($_SESSION[tn]==EN){echo 'You need to fill in one of following items to enable the calculation function.';}else{echo '填寫下列其中一個數才啟用此功能。';}?>
	</p>	
	
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '总数乘[%]';}else if($_SESSION[tn]==EN){echo '% of total amount';}else{echo '總數乘[%]';}?></b>
	<?php if($_SESSION[tn]==PRC){echo '填整数的百分比,总数将乘以此百分比。';}else if($_SESSION[tn]==EN){echo 'You need to fill in integer for this percentage. The result is % of total amount.';}else{echo '填整數的百分比,總數將乘以此百分比。';}?>
	</p>	
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '总数乘再加常数';}else if($_SESSION[tn]==EN){echo 'Plus constant[before % of total amount]';}else{echo '總數乘再加常數';}?></b>
	<?php if($_SESSION[tn]==PRC){echo '总数将乘以此百分比,再加一个常数。若没有百分比设置,只作加数。';}else if($_SESSION[tn]==EN){echo 'The result is total amount plus an further amount after the percentage calculation(if applicable).';}else{echo '總數將乘以此百分比,再加一個常數。若沒有百分比設置,只作加數。';}?>
	</p>	
	
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '总数加常数再乘%';}else if($_SESSION[tn]==EN){echo 'Plus constant[after % of total amount]';}else{echo '總數加常數再乘%';}?></b>
	<?php if($_SESSION[tn]==PRC){echo '总数加一个常数,再乘以此百分比。若没有百分比设置,只作加数。';}else if($_SESSION[tn]==EN){echo 'The result is total amount plus an further amount and then the percentage calculation(if applicable).';}else{echo '總數加一個常數,再乘以此百分比。若沒有百分比設置,只作加數。';}?>
	</p>	

<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '计算备注';}else if($_SESSION[tn]==EN){echo 'Calculation remark';}else{echo '計算備註';}?></b>
<?php if($_SESSION[tn]==PRC){echo '在总数再计算的结果,再加备注。';}else if($_SESSION[tn]==EN){echo 'It is about remark adding to calculation result.';}else{echo '在總數再計算的結果,再加備註。';}?>
</p>	
<!--<hr>
<?php if($_SESSION[tn]==PRC){echo '若用户设备屏阔少於特定尺寸,panel上沒有关闭按钮。用户只能拖拽panel作出关闭。若选项项目有设置提示,亦有不同的显示效果。';}else if($_SESSION[tn]==EN){echo 'The closing button of control panel will not be showed if screen width of APP user device is less than specific size. APP user needs to swipe the panel to close it. Also, the display of an option data with tips is different for this size situation.';}else{echo '若用戶設備屏闊少於特定尺寸,panel上沒有關閉按鈕。用戶只能拖拽panel作出關閉。若選項項目有設置提示,亦有不同的顯示效果。';}?>
</p>!-->	
	
	</div><div class="ui-block-c">
	
	</div>
</div>

	
	</FORM>

	
	
<br><br><br>
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
<script>
$("#<?php echo $pj.$ap?>vlucount").prepend('PRODUCT<BR>HKD88888 x 1pcs = HKD 88888');
$("#<?php echo $pj.$ap?>vlucounts").prepend('[HKD88888]');
$("#15vlucount").prepend('PRODUCT<BR>HKD88888 x 1pcs = HKD 88888');
$("#15vlucounts").prepend('[HKD88888]');
</script>
<script src="../js/appsystem.js"></script>
<script>
fastbtn("<?php echo $pj?>","<?php echo $ap?>",windowHeight,windowWidth);
fastbtn("1","5",windowHeight,windowWidth);</script>
</body></html>

<?php 
$tdy=0;
$tdy=date('Y-m-d');
if($pj and $_SESSION[guanyin1] and $_SESSION[guanyin1]==$_POST[guanyin1]){

	if($ap and !preg_match('/^[0-9]*$/', $ap))exit;
	if($pj and !preg_match('/^[0-9]*$/', $pj))exit;	
	if($tm and !preg_match('/^[0-9]*$/', $tm))exit;	
	if($tp and !preg_match('/^[0-9]*$/', $tp))exit;	

function bg($htmlbgvlu){
if($htmlbgvlu){
	if(strpos($htmlbgvlu,'http://')!==false or strpos($htmlbgvlu,'https://')!==false){$images = '';}
	else{$images = 'images/';}
	
	if(strpos($htmlbgvlu,'#')!==false or strpos($htmlbgvlu,'rgba(')!==false  or strpos($htmlbgvlu,'rgb(')!==false){
	$htmlbg = 'background-color:'.htmlspecialchars($htmlbgvlu).';';}
	else if(strpos($htmlbgvlu,'[xy]')!==false){$htmlbg = 'background-image:url('.$images.htmlspecialchars($htmlbgvlu).');';}
	else if($htmlbgvlu){$htmlbg = 'background-image:url('.$images.htmlspecialchars($htmlbgvlu).');background-size:100%;background-repeat:repeat-y;';}
;}else{$htmlbg = '';}
return $htmlbg;
;}

$panelbg = bg($_POST[panelbg]);
$sltarea = bg($_POST[sltarea]);
$pricebg = bg($_POST[pricebg]);
$tpricebg = bg($_POST[tpricebg]);
$nbrkey = bg($_POST[nbrkey]);
$nbrbtn = bg($_POST[nbrbtn]);
$frbtn = bg($_POST[frbtn]);
$userbtn = bg($_POST[userbtn]);
$sendformbtn = bg($_POST[sendformbtn]);
$ordbtnbg = bg($_POST[ordbtnbg]);
$bghlp = bg($_POST[bghlp]);
if($_POST[ord]){$ord= htmlspecialchars($_POST[ord]);}else{$ord = '&nbsp;';}	 
if($_POST[sendform]){$sendhtml = htmlspecialchars($_POST[sendform]);}else{$sendhtml = '&nbsp;';}	


$panelhtml = '<!--panelvws'.$ap.'!--><div data-role="popup" id="'.$pj.$ap.'vw" data-theme="a" data-typ="'.htmlspecialchars($_POST['typ']).'" style="'.$panelbg.'padding:5px;height: 100%;width: 100%;top:0;left:-15px;overflow-y:hidden;" class="ifrwidthpn"><!--data'.htmlspecialchars($_POST[sendform]).'@#@'.htmlspecialchars($_POST[sendformbtn]).'@#@'.htmlspecialchars($_POST['ord']).'@#@'.htmlspecialchars($_POST[ordbtnbg]).'@#@'.htmlspecialchars($_POST[formhtml]).'@#@'.htmlspecialchars($_POST[user]).'@#@'.htmlspecialchars($_POST[userbtn]).'@#@'.htmlspecialchars($_POST[userborder]).'@#@'.htmlspecialchars($_POST[nbrkey]).'@#@'.htmlspecialchars($_POST[nbrbtn]).'@#@'.htmlspecialchars($_POST[frbtn]).'@#@'.htmlspecialchars($_POST[clrdatabtn]).'@#@'.htmlspecialchars($_POST[hlpbtn]).'@#@'.htmlspecialchars($_POST[bghlp]).'@#@'.htmlspecialchars($_POST[bghlpn]).'@#@'.htmlspecialchars($_POST[panelbg]).'@#@'.htmlspecialchars($_POST[pricebg]).'@#@'.htmlspecialchars($_POST[tpricebg]).'@#@'.htmlspecialchars($_POST[sltarea]).'@#@'.htmlspecialchars($_POST[tmsg]).'@#@'.htmlspecialchars($_POST[times]).'@#@'.htmlspecialchars($_POST[plus]).'@#@'.htmlspecialchars($_POST[plusn]).'@#@'.htmlspecialchars($_POST[plusmsg]).'@#@'.htmlspecialchars($_POST[uconfirmbtn]).'@#@'.htmlspecialchars($_POST[uamendbtn]).'@#@'.htmlspecialchars($_POST[udatabtn]).'@#@'.htmlspecialchars($_POST[uclrbtn]).'@#@'.htmlspecialchars($_POST[nbrkeytitle]).'@#@'.htmlspecialchars($_POST[frbtntitle]).'@#@'.htmlspecialchars($_POST[typ]).'@#@'.htmlspecialchars($_POST[orderinfo]).'@#@'.htmlspecialchars($_POST[posturl]).'data!--><div class="webkitm" style="overflow-y:auto">';

if(($_POST[sendform]=='apps' or $_POST[sendform]=='appsqr') and $_POST[ord]=='apps' and $_POST[user]=='apps' and $_POST[hlpbtn]=='apps'){
$panelhtml .= '<a href="#" id="'.$pj.$ap.'panelpop" class="ui-btn ui-btn-z ui-btn-inline ui-btn-icon-notext ui-icon-delete" style="padding:5px;">&nbsp;</a>';
}else{ 
	//if(($_POST[bghlpn] or $_POST[hlpbtn]) and $_POST[user])$vpanel = 'vpanel ';
$panelhtml .= '<a href="#" id="'.$pj.$ap.'panelpop" class="'.$vpanel.'ui-btn ui-btn-w ui-btn-inline ui-mini ui-btn-icon-left ui-icon-delete">&nbsp;</a>';
}

if($_POST[sendform]=='apps' or $_POST[sendform]=='appsqr'){
	if($_POST[sendform]=='appsqr'){
	$panelhtml .= '<a href="#" id="'.$pj.$ap.'formpopups" class="ui-btn ui-btn-z ui-btn-inline ui-btn-icon-notext ui-icon-qr" style="padding:5px;'.$sendformbtn.'">'.$sendhtml.'</a>';
	}else{
	$panelhtml .= '<a href="#" id="'.$pj.$ap.'formpopups" class="ui-btn ui-btn-z ui-btn-inline ui-btn-icon-notext ui-icon-mail" style="padding:5px;'.$sendformbtn.'">'.$sendhtml.'</a>';
	;}
}else{
	if(strpos($sendhtml,'[appsqr]')==true){
	if(strpos($sendhtml,'[icon]')==true){$sendhtml = str_replace('[icon]','',$sendhtml);$sendicon= ' ui-btn-icon-left ui-icon-qr';}
	if($sendformbtn){$sendformbtnstyle = ' style="'.$sendformbtn.'"';$sendformbtntheme = 'z';}else{$sendformbtntheme = 'f';}
	$panelhtml .= '<a href="#" id="'.$pj.$ap.'formpopups" class="ui-btn ui-btn-'.$sendformbtntheme.' ui-btn-inline ui-mini'.$sendicon.'"'.$sendformbtnstyle.'>'.str_replace('[appsqr]','',$sendhtml).'</a>';
	}else{
	if(strpos($sendhtml,'[icon]')==true){$sendhtml = str_replace('[icon]','',$sendhtml);$sendicon= ' ui-btn-icon-left ui-icon-mail';}
	if($sendformbtn){$sendformbtnstyle = ' style="'.$sendformbtn.'"';$sendformbtntheme = 'z';}else{$sendformbtntheme = 'f';}
	$panelhtml .= '<a href="#" id="'.$pj.$ap.'formpopups" class="ui-btn ui-btn-'.$sendformbtntheme.' ui-btn-inline ui-mini'.$sendicon.'"'.$sendformbtnstyle.'>'.$sendhtml.'</a>';
	}
}
if($_POST[formhtml]){
	if(file_exists('../panel/'.$roww[pjnbr].'/'.htmlspecialchars($_POST[formhtml]))){
		//if(strpos(file_get_contents('../panel/'.$roww[pjnbr].'/'.htmlspecialchars($_POST[formhtml])),'<!--sysformsys!-->')!==false)$web = 'web';		
		$formhtml = file_get_contents('../panel/'.$roww[pjnbr].'/'.htmlspecialchars($_POST[formhtml]));
		$formhtml = str_replace('class="vntsns vtnn"','',$formhtml);
		$formhtml = str_replace('class="swiper-slide"','',$formhtml);
		
		$formhtmljs = file_get_contents('../panel/'.$roww[pjnbr].'/web'.str_replace('.html','.js',htmlspecialchars($_POST[formhtml])));
		
	;}
	//$_POST[formhtml] = $web.htmlspecialchars($_POST[formhtml]).'?v='.$ap.'.html'.$pj;
}
if($_POST[posturl] and !$_POST[formhtml]){$ifrurl = 'data-ifrurl="1';$_POST[formhtml] = htmlspecialchars($_POST[posturl]).'?v='.$ap.'.html'.$pj;
	$panelhtml .= '<div id="'.$pj.$ap.'formpopup" data-role="popup" data-theme="f" data-corners="false" style="overflow-y:auto;padding:5px;height: 100%;width: 100%;top:0;left:-15px;"  class="ifrwidthpn"><a href="#" id="'.$pj.$ap.'formpopupspopn" class="popn ui-btn ui-btn-z ui-btn-icon-notext ui-icon-delete"></a><iframe id="'.$pj.$ap.'formpopupsifr" '.$ifrurl.' src="'.$_POST[formhtml].'" style="width:100%" seamless frameBorder="0"></iframe></div>';
}else{
	$formpopup = '<div id="'.$pj.$ap.'formpopup" style="overflow-y:auto;background-color:#535353;color:black;font-weight:bold;padding:5px;height: 100%;width: 100%;position:absolute;left:0;top:0;z-index:2;display:none;"  class="ifrwidthpn"><a href="#" id="'.$pj.$ap.'formpopupsdivn" class="popn ui-btn ui-btn-z ui-btn-icon-notext ui-icon-delete"></a><BR><BR><div id="'.$pj.$ap.'formpopupsifr" style="width:100%"><!--formhtml!-->'.$formhtml.'<!--formhtml!--></div></div>';
;}

if($_POST[ord]=='apps'){
$panelhtml .= '<a href="#" id="'.$pj.$ap.'vwvp" class="ui-btn ui-btn-z ui-btn-inline ui-btn-icon-notext ui-icon-bullets" style="padding:5px;'.$ordbtnbg.'">'.htmlspecialchars($ord).'</a>';
}else{
if(strpos($ord,'[icon]')==true){$ord = str_replace('[icon]','',$ord);$ordicon= ' ui-btn-icon-left ui-icon-bullets';}
$panelhtml .= '<a href="#" id="'.$pj.$ap.'vwvp" class="ui-btn ui-btn-z ui-btn-inline ui-mini'.$ordicon.'" style="padding:5px;'.$ordbtnbg.'">'.htmlspecialchars($ord).'</a>';
}

if($_POST[userbtn]){$userbtntheme = 'z';}else{$userbtntheme = 'f';}


if($_POST[user]=='apps'){$panelhtml .= '
<a href="#" id="'.$pj.$ap.'vwfbtn" class="ui-btn ui-btn-'.$userbtntheme.' ui-btn-inline ui-btn-icon-notext ui-icon-edit" style="padding:5px;'.$userbtn.'">'.htmlspecialchars($_POST[user]).'</a>';
}else if($_POST[user]){
if(strpos($_POST[user],'[icon]')==true){$_POST[user] = str_replace('[icon]','',$_POST[user]);$usericon= ' ui-btn-icon-left ui-icon-edit';}
$panelhtml .= '
<a href="#" id="'.$pj.$ap.'vwfbtn" class="ui-btn ui-btn-'.$userbtntheme.' ui-btn-inline ui-mini'.$usericon.'" style="padding:5px;'.$userbtn.'">'.htmlspecialchars($_POST[user]).'</a>';
}

if($_POST[user])$panelhtml .= '<div id="'.$pj.$ap.'vwf" data-role="popup" data-corners="false" data-transition="pop" data-position-to="window" style="padding:5px;height: 100%;width: 100%;top:0;left:-15px;background-color:#535353;color:white;" class="vws vwspopups ifrwidthps">
<a href="#" id="'.$pj.$ap.'vwfbtnpopn" class="popn ui-btn ui-btn-z ui-btn-icon-notext ui-icon-delete"></a>
<textarea  id="'.$pj.$ap.'selfbtn" data-corners="false" data-theme="a" style="width:80%"></textarea>

<a href="#" id="'.$pj.$ap.'selfbtns" class="ui-btn ui-btn-w ui-btn-inline ui-btn-icon-left ui-icon-check ui-mini" data-border="'.htmlspecialchars($_POST[userborder]).'"><span class="pigss-pencil"></span>'.htmlspecialchars($_POST[uconfirmbtn]).'</a><div style="padding:10px;cursor:pointer;display:none;" data-option="[ X ]" data-border="'.htmlspecialchars($_POST[userborder]).'" id="'.$pj.$ap.'dsltsbtn" class="'.$pj.$ap.'sltsbtn ui-btn ui-btn-w ui-btn-inline"><span class="pigss-pencil"></span>[ X ]'.htmlspecialchars($_POST[uclrbtn]).'</div>

<a href="#" class="'.$pj.$ap.'slfbtn ui-btn ui-btn-w ui-btn-inline ui-btn-icon-left ui-icon-bullets ui-mini" style="float:right" data-alter="'.htmlspecialchars($_POST[udatabtn]).'" data-border="'.htmlspecialchars($_POST[userborder]).'"><span class="pigss-pencil"></span>'.htmlspecialchars($_POST[uamendbtn]).'</a>
<BR>
<div class="'.$pj.$ap.'vwshgt webkitm" style="overflow-y:auto;">
<div id="'.$pj.$ap.'sbtnvw" class="vws ui-content" style="width:80%;"></div>
</div></div>';

if($_POST[bghlp]){$bghlptheme = 'z';}else{$bghlptheme = 'f';}
if($_POST[hlpbtn]){$hlpbtn= $_POST[hlpbtn];}else{$hlpbtn = '&nbsp;';}	

if($_POST[hlpbtn]=='apps'){$panelhtml .= '
<a href="#" id="'.$pj.$ap.'infovwbtn" class="ui-btn ui-btn-'.$bghlptheme.' ui-btn-inline ui-btn-icon-notext ui-icon-info" style="padding:5px;'.$bghlp.'">'.htmlspecialchars($_POST[hlpbtn]).'</a>';}
else if($_POST[bghlpn] or $_POST[hlpbtn]){
if(strpos($_POST[hlpbtn],'[icon]')==true){$_POST[hlpbtn] = str_replace('[icon]','',$_POST[hlpbtn]);$hlpbtnicon= ' ui-btn-icon-left ui-icon-info';}
$panelhtml .= '
<a href="#" id="'.$pj.$ap.'infovwbtn" class="ui-btn ui-btn-'.$bghlptheme.' ui-btn-inline ui-mini'.$hlpbtnicon.'" style="padding:5px;'.$bghlp.'">'.htmlspecialchars($_POST[hlpbtn]).'</a>';
;}
if($_POST[bghlpn] or $_POST[hlpbtn])$panelhtml .= '<div id="'.$pj.$ap.'infovw" data-role="popup" data-corners="false" data-transition="pop" data-position-to="window" data-theme="f" style="overflow-y:auto;padding:5px;height: 100%;width: 100%;top:0;left:-15px;" class="vws '.$pj.$ap.'vwspopups ifrwidthpn"><a href="#" id="'.$pj.$ap.'infovwpopn" class="popn ui-btn ui-btn-z ui-btn-icon-notext ui-icon-delete"></a>
<BR><iframe src="'.htmlspecialchars($_POST[bghlpn]).'" seamless frameBorder="0" style="width:100%"></iframe></div>';
 
if($_POST[nbrkey]){$nbrkeytheme = 'z';}else{$nbrkeytheme = 'w';}
if($_POST[nbrbtn]){$nbrbtntheme = 'z';}else{$nbrbtntheme = 'w';}
if($_POST[frbtn]){$frbtntheme = 'z';}else{$frbtntheme = 'w';}

$panelhtml .= '<div id="'.$pj.$ap.'vwv" data-role="popup" style="background-color:#535353;color:white;padding:5px;height: 100%;width: 100%;top:0;left:-15px;" data-corners="false" class="vws ifrwidthps"><a href="#"  id="'.$pj.$ap.'vwvppopn" class="popn ui-btn ui-btn-z ui-btn-icon-notext ui-icon-delete"></a>';

if($_POST[orderinfo]){$panelhtml .= '&nbsp;&nbsp;<a href="#" id="'.$pj.$ap.'orderinfbtn" class="ui-btn ui-btn-z ui-btn-inline ui-btn-icon-notext ui-icon-info"></a>';$orderinfo = '<div id="'.$pj.$ap.'orderinfo" style="display:none;"> &nbsp;<span id="'.$pj.$ap.'orderinf" class="ui-btn ui-btn-z ui-btn-inline"> X </span>'.htmlspecialchars($_POST[orderinfo]).'</div>';}

if($_POST[clrdatabtn])$panelhtml .= '<div style="position:absolute;right:30%;top:0;padding:10px;cursor:pointer;" id="'.$pj.$ap.'clrdata" class="ui-btn ui-btn-x ui-btn-inline"><span class="pigss-pencil"></span>[ X ]'.htmlspecialchars($_POST[clrdatabtn]).'</div>';

if($nbrbtn)$nbrbtn = ' style="'.$nbrbtn.'"';

$panelhtml .= '<BR><BR>'.$orderinfo.'<div class="'.$pj.$ap.'vwshgts webkitm" style="overflow-y:auto;">
<div id="'.$pj.$ap.'vwvn" class="vws ui-content" style="width:80%"></div>
</div></div>

<div id="'.$pj.$ap.'vwvs" data-role="popup" style="background-color:#535353;color:white;padding:5px;height: 100%;width: 100%;top:0;left:-15px;" data-corners="false" class="vws ifrwidthps"><a href="#" id="'.$pj.$ap.'vwvsbtn" class="popn ui-btn ui-btn-z ui-btn-icon-notext ui-icon-delete"></a><div class="'.$pj.$ap.'vwvnsorts webkitm" style="overflow-y:auto;"><div id="'.$pj.$ap.'vwvnsort" class="ui-content" style="width:80%;"></div></div></div>

<div id="'.$pj.$ap.'vwsnbrvlu" data-theme="f" data-role="popup" data-corners="false" data-transition="pop" data-position-to="window" style="padding:5px;height: 100%;width: 100%;top:0;left:-15px;'.$nbrkey.'" class="ifrwidthps"><a href="#" id="'.$pj.$ap.'vwsnbrvlupopn" class="popn ui-btn ui-btn-z ui-btn-icon-notext ui-icon-delete"></a><BR><BR>'.htmlspecialchars($_POST[nbrkeytitle]).'<HR><div class="'.$pj.$ap.'kvlu ui-grid-solo" ids=""></div><HR>
<a href="#" data-corners="false" class="vwsn ui-btn ui-btn-'.$nbrbtntheme.' ui-btn-inline"'.$nbrbtn.'>1</a>
<a href="#" data-corners="false" class="vwsn ui-btn ui-btn-'.$nbrbtntheme.' ui-btn-inline"'.$nbrbtn.'>2</a>
<a href="#" data-corners="false" class="vwsn ui-btn ui-btn-'.$nbrbtntheme.' ui-btn-inline"'.$nbrbtn.'>3</a>
<a href="#" data-corners="false" class="vwsn ui-btn ui-btn-'.$nbrbtntheme.' ui-btn-inline"'.$nbrbtn.'>4</a> <br>

<a href="#" data-corners="false" class="vwsn ui-btn ui-btn-'.$nbrbtntheme.' ui-btn-inline"'.$nbrbtn.'>5</a>
<a href="#" data-corners="false" class="vwsn ui-btn ui-btn-'.$nbrbtntheme.' ui-btn-inline"'.$nbrbtn.'>6</a>
<a href="#" data-corners="false" class="vwsn ui-btn ui-btn-'.$nbrbtntheme.' ui-btn-inline"'.$nbrbtn.'>7</a>
<a href="#" data-corners="false" class="vwsn ui-btn ui-btn-'.$nbrbtntheme.' ui-btn-inline"'.$nbrbtn.'>8</a> <br>

<a href="#" data-corners="false" class="vwsn ui-btn ui-btn-'.$nbrbtntheme.' ui-btn-inline"'.$nbrbtn.'>9</a>
<a href="#" data-corners="false" class="vwsn ui-btn ui-btn-'.$nbrbtntheme.' ui-btn-inline"'.$nbrbtn.'>0</a>
<a href="#" data-corners="false" class="'.$pj.$ap.'vwsd ui-btn ui-btn-'.$nbrbtntheme.' ui-btn-inline"'.$nbrbtn.'>.</a>
<a href="#" data-corners="false" class="vwsnb ui-btn ui-btn-'.$nbrbtntheme.' ui-btn-inline"'.$nbrbtn.'>&nbsp;</a> <br>
<a href="#" data-corners="false" class="'.$pj.$ap.'vwsns ui-btn ui-btn-'.$frbtntheme.' ui-btn-inline" style="'.$frbtn.'width:80%"><span class="pigss-pencil"></span>'.htmlspecialchars($_POST[frbtntitle]).'</a>
</div>
<div id="'.$pj.$ap.'vwtips" class="vws ui-grid-solo webkitm" style="width:50%;position:absolute;right:0;top:0;overflow-y:auto;display:none;"></div>
<div id="'.$pj.$ap.'vwtipop" data-role="popup" data-theme="z" style="background:rgb(35, 145, 234);color:pink;padding:5px;height: 100%;width: 100%;top:0;left:-15px;" data-corners="false" class="vws ifrwidthps"><a href="#" id="'.$pj.$ap.'vwtipoppopn" class="popn ui-btn ui-btn-z ui-btn-icon-notext ui-icon-delete"></a><div id="'.$pj.$ap.'vwtipops" class="webkitm"><div></div></div></div>
<div class="vws ui-grid-solo"><div class="ui-grid-solo" id="'.$pj.$ap.'vlucount" style="'.$pricebg.'"></div><div class="ui-grid-solo" id="'.$pj.$ap.'vlucounts" data-times="'.htmlspecialchars($_POST[times]).'" data-plus="'.htmlspecialchars($_POST[plus]).'"  data-plusn="'.htmlspecialchars($_POST[plusn]).'" data-plusmsg="'.htmlspecialchars($_POST[plusmsg]).'" data-tmsg="'.htmlspecialchars($_POST[tmsg]).'" style="'.$tpricebg.'"></div></div><HR>
<div id="'.$pj.$ap.'vwdatn" class="ui-grid-solo"><br></div>
<div class="'.$pj.$ap.'vwshgtns webkitm" style="'.$sltarea.'overflow-y:auto;padding:5px;height: 100%;width: 100%;top:0;left:-15px;">
<div id="'.$pj.$ap.'vwdata" class="vws ui-content" style="width:80%;"></div>
</div>
</div></div>'.$formpopup.'<!--panelvws'.$ap.'!-->';

$fpagtrns='../panel/'.$roww[pjnbr].'/panel'.$ap.'.html';
file_put_contents($fpagtrns,$panelhtml);
if($_POST[formhtml]){$fpagtrns='../panel/'.$roww[pjnbr].'/panel'.$ap.'.js';
file_put_contents($fpagtrns,$formhtmljs);}

			//if(!file_exists('../panel/'.$roww[pjnbr].'/temp/panel'.$ap.'.html')){
				//mkdir('../panel/'.$roww[pjnbr].'/temp');
				//file_put_contents('../panel/'.$roww[pjnbr].'/temp/panel'.$ap.'.html',$hts);			
				//file_put_contents('../panel/'.$roww[pjnbr].'/temp/panel'.$ap.'.html',$hts);			
			//;}else{
				//if(file_exists('../panel/'.$roww[pjnbr].'/temp/panel'.$ap.'[2].html'))rename('../panel/'.$roww[pjnbr].'/temp/panel'.$ap.'[2].html','../panel/'.$roww[pjnbr].'/temp/panel'.$ap.'[3].html');
				//if(file_exists('../panel/'.$roww[pjnbr].'/temp/panel'.$ap.'[1].html'))rename('../panel/'.$roww[pjnbr].'/temp/panel'.$ap.'[1].html','../panel/'.$roww[pjnbr].'/temp/panel'.$ap.'[2].html');
				//rename('../panel/'.$roww[pjnbr].'/temp/panel'.$ap.'.html','../panel/'.$roww[pjnbr].'/temp/panel'.$ap.'[1].html');
				//file_put_contents('../panel/'.$roww[pjnbr].'/temp/panel'.$ap.'.html',$hts);		
			//;}
			
			
			//$db->exec("update webhtml set formhtml='$_POST[formhtml]' where cno='$roww[ap]'");

	echo "<meta http-equiv='refresh' content='0;URL=vwpanel.php?ap=".htmlspecialchars($roww[ap])."&pj=".htmlspecialchars($roww[pjnbr])."&tm=".htmlspecialchars($tm)."&pn=".htmlspecialchars($pn)."'>";
;}

?>
	
