<?php session_start();      
error_reporting(0); 

?>
<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php if($_SESSION[tn]==PRC){echo '图像字体 - AppMoney712 移动应用设计系统';}else if($_SESSION[tn]==EN){echo 'Icon font - AppMoney712 APP Creation System';}else{echo 'Icon font - AppMoney712 移動應用設計系統';}?></title>
	<link href="../css/jquery.mobile-1.4.4.min.css" rel="stylesheet">
	<link href="../css/jquerymobile-1.4.4.min.css" rel="stylesheet">
	<link href="icons/style.css" rel="stylesheet">

	<style type="text/css">
	.introhr{position:absolute;top:5%;left:13%; z-index:1;}
	.tps tr,.tps td{border-top: 1px solid #000000;}
	</style>
	<script src="../js/jquery.js"></script>
	<script src="../js/jquery.mobile-1.4.4.min.js"></script>

	<script>
	
	</script>
	

</head>
<body>

<div data-role="page" data-theme="f" class="page">
	<div style="overflow: hidden;" data-role="header" data-theme="f">
	
    <h1><?php if($_SESSION[tn]==PRC){echo '图像字体 - AppMoney712 移动应用设计系统';}else if($_SESSION[tn]==EN){echo 'Icon font - AppMoney712 APP Creation System';}else{echo '圖像字體 - AppMoney712 移動應用設計系統';}?></h1>
	
	</div><!-- /header -->
	

	
	<div data-role="content">
	<?php if($_SESSION[tn]==PRC){echo '图像字体编码创建';}else if($_SESSION[tn]==EN){echo 'ICON FONT CODE CREATING';}else{echo '圖像字體編碼創建';}?>  <br><br>
	
	<div id="htmln"></div>
	<div id="html"></div>
	<br><br>
	<a href="#inf" data-rel="popup" data-transition="pop" class="ui-btn ui-btn-b ui-btn-inline ui-corner-all ui-mini">? <?php if($_SESSION[tn]==PRC){echo '使用';}else if($_SESSION[tn]==EN){echo 'Usage';}else{echo '使用';}?></a>
	<div data-role="popup" id="inf" data-theme="f"><a href="#" class="ui-btn ui-corner-all ui-icon-delete ui-btn-icon-notext ui-btn-right" data-rel="back"></a>
	<br>
	<p><?php if($_SESSION[tn]==PRC){echo '您能点撀\'字符\'丶\'颜色\'及\'尺寸\'按钮并选用所需选项。';}else if($_SESSION[tn]==EN){echo 'You can click the \'ICON\', \'Color\' and \'Size\' buttons to select data options for entering the following information.';}else{echo '您能點撀\'字符\'、\'顏色\'及\'尺寸\'按鈕並選用所需選項。';}?></p>
	</div>

	<div class="ui-grid-a"><div class="ui-block-a">
	<?php if($_SESSION[tn]==PRC){echo '字体称';}else if($_SESSION[tn]==EN){echo 'ICON name';}else{echo '字體稱';}?>
	<input type="text" id="icon" required></div><div class="ui-block-b" style="width:15%"><a href="#icons" class="ui-btn ui-btn-f" data-rel="popup" data-transition="pop"><?php if($_SESSION[tn]==PRC){echo '字符';}else if($_SESSION[tn]==EN){echo 'ICON';}else{echo '字符';}?></a></div><div data-role="popup" id="icons" style="width:650px"><a href="#" class="ui-btn ui-corner-all ui-icon-delete ui-btn-icon-notext ui-btn-right" data-rel="back"></a>

	<a href="#" class="ui-btn ui-btn-f ui-btn-inline iconbtn" id="airplanefly"><span class="pigss-airplanefly"></span></a>
	<a href="#" class="ui-btn ui-btn-f ui-btn-inline iconbtn" id="bigsale"><span class="pigss-bigsale"></span></a>
	<a href="#" class="ui-btn ui-btn-f ui-btn-inline iconbtn" id="bunny"><span class="pigss-bunny"></span></a>
	<a href="#" class="ui-btn ui-btn-f ui-btn-inline iconbtn" id="coupon"><span class="pigss-coupon"></span></a>
	<a href="#" class="ui-btn ui-btn-f ui-btn-inline iconbtn" id="discodancer"><span class="pigss-discodancer"></span></a>
	<a href="#" class="ui-btn ui-btn-f ui-btn-inline iconbtn" id="drinks"><span class="pigss-drinks"></span></a>
	<a href="#" class="ui-btn ui-btn-f ui-btn-inline iconbtn" id="gift"><span class="pigss-gift"></span></a>
	<a href="#" class="ui-btn ui-btn-f ui-btn-inline iconbtn" id="gifts"><span class="pigss-gifts"></span></a>
	<a href="#" class="ui-btn ui-btn-f ui-btn-inline iconbtn" id="music"><span class="pigss-music"></span></a>
	<a href="#" class="ui-btn ui-btn-f ui-btn-inline iconbtn" id="newproduct"><span class="pigss-newproduct"></span></a>
	<a href="#" class="ui-btn ui-btn-f ui-btn-inline iconbtn" id="panda"><span class="pigss-panda"></span></a>
	<a href="#" class="ui-btn ui-btn-f ui-btn-inline iconbtn" id="pocketmoney"><span class="pigss-pocketmoney"></span></a>
	<a href="#" class="ui-btn ui-btn-f ui-btn-inline iconbtn" id="salerecommed"><span class="pigss-salerecommed"></span></a>
	<a href="#" class="ui-btn ui-btn-f ui-btn-inline iconbtn" id="santa"><span class="pigss-santa"></span></a>
	<a href="#" class="ui-btn ui-btn-f ui-btn-inline iconbtn" id="sign-percent"><span class="pigss-sign-percent"></span></a>
	<a href="#" class="ui-btn ui-btn-f ui-btn-inline iconbtn" id="tbn"><span class="pigss-tbn"></span></a>
	<a href="#" class="ui-btn ui-btn-f ui-btn-inline iconbtn" id="valentinesday"><span class="pigss-valentinesday"></span></a>
	<a href="#" class="ui-btn ui-btn-f ui-btn-inline iconbtn" id="laugh"><span class="pigss-laugh"></span></a>
	<a href="#" class="ui-btn ui-btn-f ui-btn-inline iconbtn" id="loveface"><span class="pigss-loveface"></span></a>
	<a href="#" class="ui-btn ui-btn-f ui-btn-inline iconbtn" id="noanswer"><span class="pigss-noanswer"></span></a>
	<a href="#" class="ui-btn ui-btn-f ui-btn-inline iconbtn" id="noanswer1"><span class="pigss-noanswer1"></span></a>
	<a href="#" class="ui-btn ui-btn-f ui-btn-inline iconbtn" id="noanswer2"><span class="pigss-noanswer2"></span></a>
	<a href="#" class="ui-btn ui-btn-f ui-btn-inline iconbtn" id="notsmile"><span class="pigss-notsmile"></span></a>
	<a href="#" class="ui-btn ui-btn-f ui-btn-inline iconbtn" id="notsmile1"><span class="pigss-notsmile1"></span></a>
	<a href="#" class="ui-btn ui-btn-f ui-btn-inline iconbtn" id="sick"><span class="pigss-sick"></span></a>
	<a href="#" class="ui-btn ui-btn-f ui-btn-inline iconbtn" id="smile"><span class="pigss-smile"></span></a>
	<a href="#" class="ui-btn ui-btn-f ui-btn-inline iconbtn" id="smile1"><span class="pigss-smile1"></span></a>
	<a href="#" class="ui-btn ui-btn-f ui-btn-inline iconbtn" id="smiling"><span class="pigss-smiling"></span></a>
	<a href="#" class="ui-btn ui-btn-f ui-btn-inline iconbtn" id="smiling1"><span class="pigss-smiling1"></span></a>
	<a href="#" class="ui-btn ui-btn-f ui-btn-inline iconbtn" id="smiling2"><span class="pigss-smiling2"></span></a>
	<a href="#" class="ui-btn ui-btn-f ui-btn-inline iconbtn" id="surprised"><span class="pigss-surprised"></span></a>
	<a href="#" class="ui-btn ui-btn-f ui-btn-inline iconbtn" id="surprised1"><span class="pigss-surprised1"></span></a>
	<a href="#" class="ui-btn ui-btn-f ui-btn-inline iconbtn" id="thinking"><span class="pigss-thinking"></span></a>
	<a href="#" class="ui-btn ui-btn-f ui-btn-inline iconbtn" id="tired"><span class="pigss-tired"></span></a>
	<a href="#" class="ui-btn ui-btn-f ui-btn-inline iconbtn" id="tongue"><span class="pigss-tongue"></span></a>
	<a href="#" class="ui-btn ui-btn-f ui-btn-inline iconbtn" id="tongue1"><span class="pigss-tongue1"></span></a>
	<a href="#" class="ui-btn ui-btn-f ui-btn-inline iconbtn" id="tongue2"><span class="pigss-tongue2"></span></a>
	<a href="#" class="ui-btn ui-btn-f ui-btn-inline iconbtn" id="tongue3"><span class="pigss-tongue3"></span></a>
	<a href="#" class="ui-btn ui-btn-f ui-btn-inline iconbtn" id="tongue5"><span class="pigss-tongue5"></span></a>
	<a href="#" class="ui-btn ui-btn-f ui-btn-inline iconbtn" id="winking"><span class="pigss-winking"></span></a>
	<a href="#" class="ui-btn ui-btn-f ui-btn-inline iconbtn" id="yummy"><span class="pigss-yummy"></span></a>
	<a href="#" class="ui-btn ui-btn-f ui-btn-inline iconbtn" id="angry"><span class="pigss-angry"></span></a>
	<a href="#" class="ui-btn ui-btn-f ui-btn-inline iconbtn" id="confused"><span class="pigss-confused"></span></a>
	<a href="#" class="ui-btn ui-btn-f ui-btn-inline iconbtn" id="cry"><span class="pigss-cry"></span></a>
	
	
	
	
	
	
	
	
	
	
	
	
	<a href="#" class="ui-btn ui-btn-f ui-btn-inline iconbtn" id="chat"><span class="pigss-chat"></span></a>
	<a href="#" class="ui-btn ui-btn-f ui-btn-inline iconbtn" id="user"><span class="pigss-user"></span></a>
	<a href="#" class="ui-btn ui-btn-f ui-btn-inline iconbtn" id="location"><span class="pigss-location"></span></a>
	<a href="#" class="ui-btn ui-btn-f ui-btn-inline iconbtn" id="mobile"><span class="pigss-mobile"></span></a>
	<a href="#" class="ui-btn ui-btn-f ui-btn-inline iconbtn" id="screen"><span class="pigss-screen"></span></a>
	<a href="#" class="ui-btn ui-btn-f ui-btn-inline iconbtn" id="mail"><span class="pigss-mail"></span></a>
	<a href="#" class="ui-btn ui-btn-f ui-btn-inline iconbtn" id="help"><span class="pigss-help"></span></a>
	<a href="#" class="ui-btn ui-btn-f ui-btn-inline iconbtn" id="videos"><span class="pigss-videos"></span></a>
	<a href="#" class="ui-btn ui-btn-f ui-btn-inline iconbtn" id="pictures"><span class="pigss-pictures"></span></a>
	<a href="#" class="ui-btn ui-btn-f ui-btn-inline iconbtn" id="link"><span class="pigss-link"></span></a>
	<a href="#" class="ui-btn ui-btn-f ui-btn-inline iconbtn" id="search"><span class="pigss-search"></span></a>
	<a href="#" class="ui-btn ui-btn-f ui-btn-inline iconbtn" id="download"><span class="pigss-download"></span></a>
	<a href="#" class="ui-btn ui-btn-f ui-btn-inline iconbtn" id="pencil"><span class="pigss-pencil"></span></a>
	<a href="#" class="ui-btn ui-btn-f ui-btn-inline iconbtn" id="info"><span class="pigss-info"></span></a>
	<a href="#" class="ui-btn ui-btn-f ui-btn-inline iconbtn" id="article"><span class="pigss-article"></span></a>
	<a href="#" class="ui-btn ui-btn-f ui-btn-inline iconbtn" id="clock"><span class="pigss-clock"></span></a>
	<a href="#" class="ui-btn ui-btn-f ui-btn-inline iconbtn" id="star"><span class="pigss-star"></span></a>
	<a href="#" class="ui-btn ui-btn-f ui-btn-inline iconbtn" id="heart"><span class="pigss-heart"></span></a>
	<a href="#" class="ui-btn ui-btn-f ui-btn-inline iconbtn" id="file"><span class="pigss-file"></span></a>
	<a href="#" class="ui-btn ui-btn-f ui-btn-inline iconbtn" id="feed"><span class="pigss-feed"></span></a>
	<a href="#" class="ui-btn ui-btn-f ui-btn-inline iconbtn" id="refresh"><span class="pigss-refresh"></span></a>
	<a href="#" class="ui-btn ui-btn-f ui-btn-inline iconbtn" id="images"><span class="pigss-images"></span></a>
	<a href="#" class="ui-btn ui-btn-f ui-btn-inline iconbtn" id="heart2"><span class="pigss-heart2"></span></a>
	<a href="#" class="ui-btn ui-btn-f ui-btn-inline iconbtn" id="bookmark"><span class="pigss-bookmark"></span></a>

	</div>
	<div class="ui-block-a">
	<?php if($_SESSION[tn]==PRC){echo '颜色';}else if($_SESSION[tn]==EN){echo 'Color';}else{echo '顏色';}?>
	<input type="text" id="color"></div><div class="ui-block-b" style="width:15%">
	<a href="#clr" class="ui-btn ui-btn-f" data-rel="popup" data-transition="pop"><?php if($_SESSION[tn]==PRC){echo '颜色';}else if($_SESSION[tn]==EN){echo 'Color';}else{echo '顏色';}?></a></div><div data-role="popup" id="clr"><a href="#" class="ui-btn ui-corner-all ui-icon-delete ui-btn-icon-notext ui-btn-right" data-rel="back"></a>

	<ui data-role="listview">
	<li style="color:#FF0000" class="clrbtn" id="#FF0000"><b><?php if($_SESSION[tn]==PRC){echo '紅';}else if($_SESSION[tn]==EN){echo 'RED';}else{echo '紅';}?></b></li>
	<li style="color:#FFA500" class="clrbtn" id="#FFA500"><b><?php if($_SESSION[tn]==PRC){echo '橙';}else if($_SESSION[tn]==EN){echo 'ORANGE';}else{echo '橙';}?></b></li>
	<li style="color:#FFFF00" class="clrbtn" id="#FFFF00"><b><?php if($_SESSION[tn]==PRC){echo '黃';}else if($_SESSION[tn]==EN){echo 'YELLOW';}else{echo '黃';}?></b></li>
	<li style="color:#008000" class="clrbtn" id="#008000"><b><?php if($_SESSION[tn]==PRC){echo '绿';}else if($_SESSION[tn]==EN){echo 'GREEN';}else{echo '綠';}?></b></li>
	<li style="color:#0000FF" class="clrbtn" id="#0000FF"><b><?php if($_SESSION[tn]==PRC){echo '蓝';}else if($_SESSION[tn]==EN){echo 'BLUE';}else{echo '藍';}?></b></li>
	<li style="color:#800080" class="clrbtn" id="#800080"><b><?php if($_SESSION[tn]==PRC){echo '紫';}else if($_SESSION[tn]==EN){echo 'PURPLE';}else{echo '紫';}?></b></li>
	<li style="color:#DAA520" class="clrbtn" id="#DAA520"><b><?php if($_SESSION[tn]==PRC){echo '金';}else if($_SESSION[tn]==EN){echo 'GOLD';}else{echo '金';}?></b></li>
	<li style="color:#C0C0C0" class="clrbtn" id="#C0C0C0"><b><?php if($_SESSION[tn]==PRC){echo '银';}else if($_SESSION[tn]==EN){echo 'SILVER';}else{echo '銀';}?></b></li>
	<li style="color:#FFC0CB" class="clrbtn" id="#FFC0CB"><b><?php if($_SESSION[tn]==PRC){echo '粉紅';}else if($_SESSION[tn]==EN){echo 'PINK';}else{echo '粉紅';}?></b></li>
	<li style="color:#000000" class="clrbtn" id="#000000"><b><?php if($_SESSION[tn]==PRC){echo '黑';}else if($_SESSION[tn]==EN){echo 'BLACK';}else{echo '黑';}?></b></li>
	<li style="color:#FFFFFF" class="clrbtn" id="#FFFFFF"><b><?php if($_SESSION[tn]==PRC){echo '白';}else if($_SESSION[tn]==EN){echo 'WHITE';}else{echo '白';}?></b></li>
	</ui></div>

	<div class="ui-block-a">
	<?php if($_SESSION[tn]==PRC){echo '尺寸';}else if($_SESSION[tn]==EN){echo 'Size';}else{echo '尺寸';}?>
	<input type="number"  id="size"></div><div class="ui-block-b" style="width:15%">
	<a href="#sz" class="ui-btn ui-btn-f" data-rel="popup" data-transition="pop"><?php if($_SESSION[tn]==PRC){echo '尺寸';}else if($_SESSION[tn]==EN){echo 'Size';}else{echo '尺寸';}?></a></div><div data-role="popup" id="sz"><a href="#" class="ui-btn ui-corner-all ui-icon-delete ui-btn-icon-notext ui-btn-right" data-rel="back"></a>

	<ui data-role="listview">
	<li class="sizebtn" id="12"><b>12</b></li>
	<li class="sizebtn" id="16"><b>16</b></li>
	<li class="sizebtn" id="18"><b>18</b></li>
	<li class="sizebtn" id="20"><b>20</b></li>
	<li class="sizebtn" id="24"><b>24</b></li>
	<li class="sizebtn" id="36"><b>36</b></li>
	<li class="sizebtn" id="48"><b>48</b></li>
	</ui></div>
	
	
	
	</div>
	
	<div class="ui-grid-d"><div class="ui-block-a">
	<input type="submit" name="submit" id="webxlsbtn" Value="<?php if($_SESSION[tn]==PRC){echo '产生';}else if($_SESSION[tn]==EN){echo 'Generate';}else{echo '產生';}?>"></div></div>
	
	
	</div>

	&nbsp;&nbsp;<a href="#infN" data-rel="popup" data-transition="pop" class="ui-btn ui-btn-b ui-btn-inline ui-corner-all ui-mini">? <?php if($_SESSION[tn]==PRC){echo '解释';}else if($_SESSION[tn]==EN){echo 'Explanation';}else{echo '解釋';}?></a>
	<div data-role="popup" id="infN" class="ifrwidthps" style="padding:5px" data-theme="f"><a href="#" class="ui-btn ui-corner-all ui-icon-delete ui-btn-icon-notext ui-btn-right" data-rel="back"></a>

	<p><?php if($_SESSION[tn]==PRC){echo '当正确编码产生,您须点撀\'产生\'并剪贴此等编码到文字编辑器。<br>若使用新版浏览器,图像字体能显示在编辑器内。您须测试您的设计,字体的大小是不同於浏览器的显示。';}else if($_SESSION[tn]==EN){echo 'After proper code generation, you need to copy the codes and paste them to the Editor by clicking the Code view button. <br>The icon font will be showed in editor if you use a modern browser. You need to preview and test it in your APP. The icon font in APP is showed in different size in your browser.';}else{echo '當正確編碼產生,您須點撀\'產生\'並剪貼此等編碼到文字編輯器。<br>若使用新版瀏覽器,圖像字體能顯示在編輯器內。您須測試您的設計,字體的大小是不同於瀏覽器的顯示。';}?></p>
	</div>
	
	<a href="#infs" data-rel="popup"  data-transition="pop" class="ui-btn ui-btn-b ui-btn-inline ui-corner-all ui-mini">? <?php if($_SESSION[tn]==PRC){echo '步骤';}else if($_SESSION[tn]==EN){echo 'Steps';}else{echo '步驟';}?></a>
	<div data-role="popup" id="infs" class="ifrwidthps" style="padding:5px"  data-theme="f"><a href="#" class="ui-btn ui-corner-all ui-icon-delete ui-btn-icon-notext ui-btn-right" data-rel="back"></a>

	<p><?php if($_SESSION[tn]==PRC){echo '将产生的编码剪贴,此例是&lt;span.........&lt;/span&gt;。';}else if($_SESSION[tn]==EN){echo 'Copy the generated codes. In this example, &lt;span.........&lt;/span&gt;';}else{echo '將產生的編碼剪貼,此例是&lt;span.........&lt;/span&gt;。';}?></p>
	<hr>
	<p><?php if($_SESSION[tn]==PRC){echo '再到文字编辑器并点撀编码按钮。';}else if($_SESSION[tn]==EN){echo 'Back to the Editor and click the Code view button.';}else{echo '再到文字編輯器並點撀編碼按鈕。';}?><img src="../images/pigs.png"/></p>
	<hr>
	<p><?php if($_SESSION[tn]==PRC){echo '将编码贴到编辑器的编辑区内并点撀\'送交\'。注:您能将编码插入内容内。';}else if($_SESSION[tn]==EN){echo 'Paste the codes to code editing area of the Editor and click the Send button. Note:You can insert them into your content.';}else{echo '將編碼貼到編輯器的編輯區內並點撀\'送交\'。註:您能將編碼插入內容內。';}?><img src="../images/icon1.png"/>
	<hr>
	<img src="../images/icon2.png"/><?php if($_SESSION[tn]==PRC){echo '图像字体例';}else if($_SESSION[tn]==EN){echo 'icon font showing example';}else{echo '圖像字體例';}?>
	<hr>
	<?php if($_SESSION[tn]==PRC){echo '您须测试您的设计及预览字体实况。';}else if($_SESSION[tn]==EN){echo 'You need to test your designed APP and preview the actual style of icon font in it.';}else{echo '您須測試您的設計及預覽字體實況。';}?></p>
	</div>
	
<div class="ui-grid-d">
<div class="ui-block-a"><a class="ui-btn ui-btn-a btns"></a></div>
<div class="ui-block-d"><a class="ui-btn ui-btn-b btns"></a></div>
<div class="ui-block-c"><a class="ui-btn ui-btn-c btns"></a></div>
<div class="ui-block-d"><a class="ui-btn ui-btn-f btns"></a></div>
<div class="ui-block-e"><a class="ui-btn ui-btn-v btns"></a></div>
</div>

<div class="ui-grid-d">
<div class="ui-block-a"><a class="ui-btn ui-btn-w btns"></a></div>
<div class="ui-block-d"><a class="ui-btn ui-btn-x btns"></a></div>
<div class="ui-block-c"><a class="ui-btn ui-btn-y btns"></a></div>
<div class="ui-block-d"><a class="ui-btn ui-btn-z btns"></a></div>
</div>

<!--<div class="ui-grid-d">
<div class="ui-block-a"><a class="ui-btn ui-btn-a btns"></a></div>
<div class="ui-block-d"><a class="ui-btn ui-btn-b btns"></a></div>
<div class="ui-block-c"><a class="ui-btn ui-btn-c btns"></a></div>
<div class="ui-block-d"><a class="ui-btn ui-btn-d btns"></a></div>
<div class="ui-block-e"><a class="ui-btn ui-btn-e btns"></a></div>
</div>

<div class="ui-grid-d">
<div class="ui-block-a"><a class="ui-btn ui-btn-f btns"></a></div>
<div class="ui-block-d"><a class="ui-btn ui-btn-g btns"></a></div>
<div class="ui-block-c"><a class="ui-btn ui-btn-h btns"></a></div>
<div class="ui-block-d"><a class="ui-btn ui-btn-i btns"></a></div>
<div class="ui-block-e"><a class="ui-btn ui-btn-j btns"></a></div>
</div>

<div class="ui-grid-d">
<div class="ui-block-a"><a class="ui-btn ui-btn-k btns"></a></div>
<div class="ui-block-d"><a class="ui-btn ui-btn-l btns"></a></div>
<div class="ui-block-c"><a class="ui-btn ui-btn-m btns"></a></div>
<div class="ui-block-d"><a class="ui-btn ui-btn-n btns"></a></div>
<div class="ui-block-e"><a class="ui-btn ui-btn-v btns"></a></div>
</div>

<div class="ui-grid-d">
<div class="ui-block-a"><a class="ui-btn ui-btn-w btns"></a></div>
<div class="ui-block-d"><a class="ui-btn ui-btn-x btns"></a></div>
<div class="ui-block-c"><a class="ui-btn ui-btn-y btns"></a></div>
<div class="ui-block-d"><a class="ui-btn ui-btn-z btns"></a></div>
</div>	!-->
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
</div>
</body></html>

<script>
$(".sizebtn").click(function() {
$('#size').val($(this).attr('id'));
});


$(".clrbtn").click(function() {
$('#color').val($(this).attr('id'));
});


$(".iconbtn").click(function() {
$('#icon').val($(this).attr('id'));
});


$("#webxlsbtn").click(function() {
var icon ='';var clr ='';var size ='';var sty ='';var stys ='';
icon = $('#icon').val();
size = $('#size').val();
clr = $('#color').val()

if(clr)clr = 'color:'+clr+';'
if(size)size = 'font-size:'+size+'px;'

if(clr || size){sty = 'style="';stys = '"';}

if(icon){
var html = '&lt;span class="pigss-'+icon+'" '+sty+clr+size+stys+' &gt;&lt;/span&gt;';
var htmln = '<span class="pigss-'+icon+'" '+sty+clr+size+stys+'></span>';
}

   $("#html").html(html);$("#htmln").html(htmln);$(".btns").html(htmln);
});
</script>
<?php

?>