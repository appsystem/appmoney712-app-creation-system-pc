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
    <title><?php if($_SESSION[tn]==PRC){echo '嵌入相片浏览 - AppMoney712 移动应用设计系统';}else if($_SESSION[tn]==EN){echo 'Embedded picture navigation - AppMoney712 APP Creation System';}else{echo '嵌入相片瀏覽 - AppMoney712 移動應用設計系統';}?></title>
	<link href="../css/jquery.mobile-1.4.4.min.css" rel="stylesheet">
	<link href="../css/jquerymobile-1.4.4.min.css" rel="stylesheet">
	<link href="../jscss/ifrpi.css" rel="stylesheet"><link rel="stylesheet" href="../jscss/animate.min.css">	<link href="../css/icons/style.css" rel="stylesheet"><link href="../css/appsystem.css" rel="stylesheet">
	<style type="text/css">
	.ifrp1{-webkit-transform: scale(1.1); -moz-transform: scale(1.1); -o-transform: scale(1.1);-ms-transform:scale(1.1, 1.1);-webkit-transition: all 1s linear; -moz-transition: all 1s linear; -o-transition: all 1s linear; -mx-transition: all 1s linear;transition: all 1s linear;}
	.ifrp5{-webkit-transform: scale(1.5); -moz-transform: scale(1.5); -o-transform: scale(1.5);-ms-transform:scale(1.5, 1.5);-webkit-transition: all 2s linear; -moz-transition: all 2s linear; -o-transition: all 2s linear; -mx-transition: all 2s linear;transition: all 2s linear;}
	
	.hide{visibility:hidden;opacity:0;transition:visibility 0s linear 0.5s,opacity 0.5s linear;}
	.show{ visibility:visible;opacity:1;transition-delay:0s;;}
	
	</style>
	<script src="../js/jquery.js"></script>
	<script src="../js/jquery.mobile-1.4.4.min.js"></script>
	<script src="../js/jquery.nicescroll.min.js"></script>

	<script>
	function checkform ( form )
	{
	if(form.wdt.value <= 100 && form.scrollposition.value){
	alert('<?php if($_SESSION[tn]==PRC){echo '内容阔度<=100%,不用设置此值。';}else if($_SESSION[tn]==EN){echo 'If the content width is less than or equal to 100%, you do not need to enter this value.';}else{echo '內容闊度<=100%,不用設置此值。';}?>');
	form.scrollposition.focus();
	return (false);
	;}
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
	<a href="webpage.php?pj=<?php echo htmlspecialchars($roww[pjnbr]) ?>&ap=<?php echo htmlspecialchars($roww[ap])?>" data-ajax="false" class="ui-btn ui-btn ui-btn-inline ui-corner-all ui-btn-icon-left ui-icon-carat-l">&nbsp;</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="#view" data-rel="popup" data-transition="pop" class="ui-btn ui-btn-inline ui-corner-all ui-mini ui-btn-icon-left ui-icon-search"><?php if($_SESSION[tn]==PRC){echo '预览';}else if($_SESSION[tn]==EN){echo 'Preview';}else{echo '預覽';}?></a>
		
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
		<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '预备相片';}else if($_SESSION[tn]==EN){echo 'Photo preparation';}else{echo '預備相片';}?></b> &nbsp;<?php if($_SESSION[tn]==PRC){echo '您须预备二张相片[横向]并存於panel/'.$roww[pjnbr].'/images。';}else if($_SESSION[tn]==EN){echo 'You need to prepare two landscape photos and place them to the folder panel/'.$roww[pjnbr].'/images.';}else{echo '您須預備二張相片[橫向]並存於panel/'.$roww[pjnbr].'/images。';}?></p>	
		<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '项目填写';}else if($_SESSION[tn]==EN){echo 'Item information';}else{echo '項目填寫';}?></b> &nbsp;<?php if($_SESSION[tn]==PRC){echo '在\'相片URL\'填写首张相片档名,在\'框架限高%\'填100,在\'相片阔度%\'填150,在\'开始位置%[左边计]\'及\'开始位置%[上边计]\'均填35,点选\'首张\',填上相片尺寸并提送。您能在Windows档案管理员将鼠标移到档案名上,有尺寸数据显示。再点撀\'再增加新数据\',重覆以上步骤键入另一相片资料,但不用选\'首张\'。';}else if($_SESSION[tn]==EN){echo 'You need to enter photo filename to Picture URL, enter 100 to Frame height %, enter 150 to Picture width %, enter 35 to X Starting position% and Y Starting position%, select the First picture, enter Picture size values and then click the SEND button. You can move your mouse cursor to the filename in Windows file manager to know the photo size. You can click the Add new data and repeat the above steps to enter second photo information but you do not need to select the First picture checkbox.';}else{echo '在\'相片URL\'填寫首張相片檔名,在\'框架限高%\'填100,在\'相片闊度%\'填150,在\'開始位置%[左邊計]\'及\'開始位置%[上邊計]\'均填35,點選\'首張\',填上相片尺寸並提送。您能在Windows檔案管理員將鼠標移到檔案名上,有尺寸數據顯示。再點撀\'再增加新數據\',重覆以上步驟鍵入另一相片資料,但不用選\'首張\'。';}?></p>	
		<p><?php if($_SESSION[tn]==PRC){echo '此二张相片显示在此页列表,您点撀首张相片的\'添加/修改按钮\',再按该页的快速试用指引。';}else if($_SESSION[tn]==EN){echo 'The information of the two photos will be showed on the list of this page. You can click the Add/amend button of the first photo and follow the quick try instruction on the next editing page.';}else{echo '此二張相片顯示在此頁列表,您點撀首張相片的\'添加/修改按鈕\',再按該頁的快速試用指引。';}?></p>	
		</div>
	
	
	<?php if($tl)$tln = '&tl='.$tl;?>
	
	<FORM action="ifrpic.php?pj=<?php echo htmlspecialchars($roww[pjnbr]) ?>&ap=<?php echo htmlspecialchars($roww[ap]) ?>&pn=<?php echo htmlspecialchars($pn).$tln ?>&tm=<?php echo htmlspecialchars($tm) ?>" id="webxls" method="post" data-ajax="false"   onSubmit="return checkform(this);">
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
				
			
			$ifrhtmls =	explode('<!--item',$ifrhtml);
				for($i=1;$i<sizeof($ifrhtmls);$i++){
					$tmvlus = explode('!-->',$ifrhtmls[$i]);
					$tmvls[$i] = $tmvlus[0];
					
					if(!$tmvlu or $tmvlus[0]>$tmvlu)$tmvlu = $tmvlus[0];
					
					$ifrhtmls[$i] = str_replace('data-img="images/','data-img="',$ifrhtmls[$i]);
					$imgsr = explode('data-img="',$ifrhtmls[$i]);
					
					
					$imgsrvlu = explode('"',$imgsr[1]);
					
					
					$imgtmvls[$tmvlus[0]]= $imgsrvlu[0];
					$imgurlvlu[$i] = $imgsrvlu[0];
					if($tmvls[$i]==$tm){
					$dataifr = explode('data-ifr="',$ifrhtmls[$i]);
					$dataifrs = explode('"',$dataifr[1]);
					$hgtvlu = explode('@',$dataifrs[0]);
					if(strpos($ifrhtmls[$i],'z-index:-1')==false)$frt = 1;
					;}
					
				;}	
			
			$htjshtm = file_get_contents('../panel/'.$roww[pjnbr].'/web'.$ap.'.js');
			if($htjshtm){
			$htjshtmln = explode('/*webjs'.$pn.'*/',$htjshtm);
			$htjshtml = explode('/*ifrp*/',$htjshtmln[1]);
			
			$ifrjs = $htjshtml[2];
			}
			
			;}
	?>
	<?php if($_SESSION[tn]==PRC){echo '相片URL';}else if($_SESSION[tn]==EN){echo 'Picture URL';}else{echo '相片URL';}?>
	
	<input type="text" name="img" placeholder=""  value="<?php echo htmlspecialchars($imgurlvlu[$tm])?>" required>
	

<div class="ui-grid-c"><div class="ui-block-a">
<?php if($_SESSION[tn]==PRC){echo '框架限高%';}else if($_SESSION[tn]==EN){echo 'Frame height %';}else{echo '框架限高%';}?>
<input name="hgt" type="number" value="<?php if($hgtvlu[0])echo htmlspecialchars($hgtvlu[0]);?>">
</div><div class="ui-block-b">
<?php if($_SESSION[tn]==PRC){echo '相片阔度%';}else if($_SESSION[tn]==EN){echo 'Picture width %';}else{echo '相片闊度%';}?>
<input name="wdt" type="number" value="<?php if($hgtvlu[1])echo htmlspecialchars($hgtvlu[1]);?>">
</div><div class="ui-block-c">

<?php if($_SESSION[tn]==PRC){echo '开始位置%[左边计]';}else if($_SESSION[tn]==EN){echo 'X Starting position%';}else{echo '開始位置%[左邊計]';}?>
<input name="scrollposition" type="number" value="<?php if($hgtvlu[2]){echo htmlspecialchars($hgtvlu[2]);}else if($startx){echo htmlspecialchars($startx);}else{echo '';}?>">
</div><div class="ui-block-d">

<?php if($_SESSION[tn]==PRC){echo '开始位置%[上边计]';}else if($_SESSION[tn]==EN){echo 'Y Starting position%';}else{echo '開始位置%[上邊計]';}?>
<input name="scrollpositions" type="number" value="<?php if($hgtvlu[3]){echo htmlspecialchars($hgtvlu[3]);}else if($starty){echo htmlspecialchars($starty);}else{echo '';}?>">
</div>
	</div>
<div class="ui-grid-c"><div class="ui-block-a"><BR>
<input name="frt" id="frt" type="checkbox" <?php if($frt or sizeof($ifrhtmls)==1)echo 'checked="checked"';?>><label for="frt"><?php if($_SESSION[tn]==PRC){echo '首张';}else if($_SESSION[tn]==EN){echo 'First picture';}else{echo '首張';}?></label>
</div><div class="ui-block-b">
<?php if($_SESSION[tn]==PRC){echo '相片尺寸[阔度]';}else if($_SESSION[tn]==EN){echo 'Picture size[width]';}else{echo '相片尺寸[闊度]';}?>
<input name="sizewdt" type="number" value="<?php if($hgtvlu[4])echo htmlspecialchars($hgtvlu[4]);?>" required>
</div><div class="ui-block-c">
<?php if($_SESSION[tn]==PRC){echo '相片尺寸[长度]';}else if($_SESSION[tn]==EN){echo 'Picture size[height]';}else{echo '相片尺寸[長度]';}?>
<input name="sizehgt" type="number" value="<?php if($hgtvlu[5])echo htmlspecialchars($hgtvlu[5]);?>" required>
</div></div>


	<input type="hidden" name="imgnbr" value="<?php echo htmlspecialchars($tmvlu); ?>">
	<input type="hidden" name="guanyin1" value="<?php if(!$_POST[guanyin1])$_SESSION[guanyin1]=rand();
	echo htmlspecialchars($_SESSION[guanyin1]); ?>">
	
	<div class="ui-grid-d"><div class="ui-block-a">
	<input type="submit" name="submit" id="webxlsbtn" class="ui-btn" value="<?php if($_SESSION[tn]==PRC){echo '送交';}else if($_SESSION[tn]==EN){echo 'SEND';}else{echo '送交';}?>"></div><div class="ui-block-b"></div><div class="ui-block-c"><a href="#inf" data-rel="popup" data-transition="pop" class="ui-btn ui-btn-b ui-btn-inline ui-corner-all ui-mini"><?php if($_SESSION[tn]==PRC){echo '步骤';}else if($_SESSION[tn]==EN){echo 'Steps';}else{echo '步驟';}?></a><div data-role="popup" id="inf" style="min-width:300px;max-width:85%" data-position-to="window" data-theme="f"><a href="#" class="ui-btn ui-corner-all ui-icon-delete ui-btn-icon-notext ui-btn-right" data-rel="back"></a>
	<h4 style="color:black"><?php if($_SESSION[tn]==PRC){echo '预备相片';}else if($_SESSION[tn]==EN){echo 'Prepare picture';}else{echo '預備相片';}?></h4>
	<p><?php if($_SESSION[tn]==PRC){echo '此功能是在一个内容框内含多张相片,您须预设首张显示相片。您再在相片上加设浏览按钮,用户点撀按钮浏览相片,相片的切换能加方向感的特效。';}else if($_SESSION[tn]==EN){echo 'This function is to create a content frame to contain many pictures. You need to specify \'cover picture\'. You can add browsing picture buttons to the pictures. APP user can click the buttons to view different pictures with animation effect.';}else{echo '此功能是在一個內容框內含多張相片,您須預設首張顯示相片。您再在相片上加設瀏覽按鈕,用戶點撀按鈕瀏覽相片,相片的切換能加方向感的特效。';}?></p>
	<p><?php if($_SESSION[tn]==PRC){echo '您应预备相片,相片的质量影响浏览速度,您应预设框架高度100%填满,再将浏览器调至手机尺寸再浏览效果。';}else if($_SESSION[tn]==EN){echo 'You need to prepare pictures. But the quality of picture will affect the browsing speed. You may use \'100% frame height\' and preview your design by resizing your browser to mobile phone size.';}else{echo '您應預備相片,相片的質量影響瀏覽速度,您應預設框架高度100%填滿,再將瀏覽器調至手機尺寸再瀏覽效果。';}?></p>
	<hr>
	<h4 style="color:black"><?php if($_SESSION[tn]==PRC){echo '填写相片URL';}else if($_SESSION[tn]==EN){echo 'Fiil in picture URL';}else{echo '填寫相片URL';}?></h4>
	<p><?php if($_SESSION[tn]==PRC){echo '填写相片url,e.g. picture.png 或http://.....。';}else if($_SESSION[tn]==EN){echo 'Fill in picture url,e.g. picture.png or http://.....';}else{echo '填寫相片url,e.g. picture.png 或http://.....。';}?></p>
	<p><?php if($_SESSION[tn]==PRC){echo '放置相片档案,相片存於应用内,应放在panel/'.$roww[pjnbr].'/images/内。';}else if($_SESSION[tn]==EN){echo 'You need to place picture to APP folder or Internet server. For APP picture, the folder is panel/'.$roww[pjnbr].'/images/.';}else{echo '放置相片檔案,相片存於應用內,應放在panel/'.$roww[pjnbr].'/images/內。';}?></p>
	<p><?php if($_SESSION[tn]==PRC){echo '再进一步填写资料,此等资料不是必须的。';}else if($_SESSION[tn]==EN){echo 'You can fill in further picture data or amend existing data but it is not compulsory.';}else{echo '再進一步填寫資料,此等資料不是必須的。';}?></p><hr>
	<h4 style="color:black"><?php if($_SESSION[tn]==PRC){echo '修改相片资料';}else if($_SESSION[tn]==EN){echo 'Amend picture data';}else{echo '修改相片資料';}?></h4>
	<p><?php if($_SESSION[tn]==PRC){echo '点撀下面\'修改数据\'的相关按钮,您能修改或删除资料。';}else if($_SESSION[tn]==EN){echo 'You can click the related title of \'Amend data\' to amend or delete data.';}else{echo '點撀下面\'修改數據\'的相關按鈕,您能修改或刪除資料。';}?></p>
	<p><?php if($_SESSION[tn]==PRC){echo '您必须移除不需用的应用内的相片资料及档案。';}else if($_SESSION[tn]==EN){echo 'You need to delete useless picture data and remove the useless picture file stored in your designed APP.';}else{echo '您必須移除不需用的應用內的相片資料及檔案。';}?></p>
	<hr>
	<h4 style="color:black"><?php if($_SESSION[tn]==PRC){echo '添加按钮';}else if($_SESSION[tn]==EN){echo 'Add button';}else{echo '添加按鈕';}?></h4>
	<p><?php if($_SESSION[tn]==PRC){echo '若巳存放相片,您能在相片添加功能按钮或标题。您能点撀下面的\'添加/修改按钮\'的相关标题。';}else if($_SESSION[tn]==EN){echo 'After proper storage of picture, you can add title or function buttons on the picture. You need to click the title of Add\amend button listed below to edit titles/buttons.';}else{echo '若巳存放相片,您能在相片添加功能按鈕或標題。您能點撀下面的\'添加/修改按鈕\'的相關標題。';}?></p>
	<hr>
	<h4 style="color:black"><?php if($_SESSION[tn]==PRC){echo '添加相片';}else if($_SESSION[tn]==EN){echo 'Add more pictures';}else{echo '添加相片';}?></h4>
	<p><?php if($_SESSION[tn]==PRC){echo '点撀\'再添加数据\'增加相片资料并重覆以上步骤。浏览添加的相片是由功能按钮控制。';}else if($_SESSION[tn]==EN){echo 'You need to click \'Add new data\' to add more pictures which need function buttons as browsing control.';}else{echo '點撀\'再添加數據\'增加相片資料並重覆以上步驟。瀏覽添加的相片是由功能按鈕控制。';}?></p>
	<hr>
	<h4 style="color:black"><?php if($_SESSION[tn]==PRC){echo '浏览相片';}else if($_SESSION[tn]==EN){echo 'Preview Picture';}else{echo '瀏覽相片';}?></h4>
	<p><?php if($_SESSION[tn]==PRC){echo '点撀下面数据列表的标题,点撀\'浏览相片\'能浏览此相片,但并不用作测试按钮及其位置。';}else if($_SESSION[tn]==EN){echo 'You need to click the related data on the data list and the Preview picture button to view the picture. It is not for testing buttons\' functions and their locations.';}else{echo '點撀下面數據列表的標題,點撀\'瀏覽相片\'能瀏覽此相片,但並不用作測試按鈕及其位置。';}?></p>
	
	<h4 style="color:black"><?php if($_SESSION[tn]==PRC){echo '浏览设计';}else if($_SESSION[tn]==EN){echo 'Preview Design';}else{echo '瀏覽設計';}?></h4>
	<p><?php if($_SESSION[tn]==PRC){echo '点撀页顶浏览按钮。';}else if($_SESSION[tn]==EN){echo 'You need to click the Preview buttons on the top part of this page.';}else{echo '點撀頁頂瀏覽按鈕。';}?></p>
	
	
	</div>
	</div>
	<div class="ui-block-d">
	<a href="#infs" data-rel="popup" data-transition="pop" class="ui-btn ui-btn-b ui-btn-inline ui-corner-all ui-mini">? <?php if($_SESSION[tn]==PRC){echo '解释';}else if($_SESSION[tn]==EN){echo 'Explanation';}else{echo '解釋';}?></a>
	<div data-role="popup" id="infs" style="min-width:300px;max-width:85%" data-position-to="window" data-theme="f"><a href="#" class="ui-btn ui-corner-all ui-icon-delete ui-btn-icon-notext ui-btn-right" data-rel="back"></a>

	<h4 style="color:black"><?php if($_SESSION[tn]==PRC){echo '相片URL';}else if($_SESSION[tn]==EN){echo 'Picture URL';}else{echo '相片URL';}?></h4>
	<p><?php if($_SESSION[tn]==PRC){echo '在框架嵌入相片,若设置相片阔大於100%,移动应用时能拖拽相片浏览。您亦能在相片的指定点加标题丶浏览其他相片的钮按及popup按钮等。您亦能在相片的指定点加标题丶浏览其他相片的钮按及popup按钮等。popup按钮是用户点撀此按钮,能显示相片丶网页及/或文字内容。';}else if($_SESSION[tn]==EN){echo 'A picture is embedded into a frame. If percentage of the picture width is greater than 100%, APP user can swipe the picture to view it. You can also add title, album browsing button and popup button on it. The popup button can show picture, web page and/or text by APP user clicking on it. ';}else{echo '在框架嵌入相片,若設置相片闊大於100%,移動應用時能拖拽相片瀏覽。您亦能在相片的指定點加標題、瀏覽其他相片的鈕按及popup按鈕等。popup按鈕是用戶點撀此按鈕,能顯示相片、網頁及/或文字內容。';}?></p><hr>
<h4 style="color:black"><?php if($_SESSION[tn]==PRC){echo '框架限高%';}else if($_SESSION[tn]==EN){echo 'iframe height %';}else{echo '框架限高%';}?></h4>
	<p>
	<?php if($_SESSION[tn]==PRC){echo '框架高度/用户浏览设备屏幕高度的百分比,填整数。应用能按用户的浏览设备屏幕高度定出内容框高度。';}else if($_SESSION[tn]==EN){echo 'It is about the percentage of iframe height/APP user device\'s screen[viewport] height. You need to fill in an integer value. Your APP can calculate the iframe height based on APP user device\'s screen[viewport] height.';}else{echo '框架高度/用戶瀏覽設備屏幕高度的百分比,填整數。應用能按用戶的瀏覽設備屏幕高度定出內容框高度。';}?>
	</p><hr>
<h4 style="color:black"><?php if($_SESSION[tn]==PRC){echo '相片阔度%';}else if($_SESSION[tn]==EN){echo 'Picture width %';}else{echo '相片闊度%';}?></h4>
	<p>
	<?php if($_SESSION[tn]==PRC){echo '相片框高度/用户浏览设备屏幕阔度的百分比,填整数。应用能按用户的浏览设备屏幕阔度定出相片阔度。';}else if($_SESSION[tn]==EN){echo 'It is about ratio percentage of picture width and APP user device\'s screen width. You need to fill in an integer value. Your APP can calculate the picture width based on APP user device\'s screen width.';}else{echo '相片闊度/用戶瀏覽設備屏幕闊度的百分比,填整數。應用能按用戶的瀏覽設備屏幕闊度定出相片闊度。';}?>
	</p><hr>
	<h4 style="color:black"><?php if($_SESSION[tn]==PRC){echo '开始位置%';}else if($_SESSION[tn]==EN){echo 'Starting position%';}else{echo '開始位置%';}?></h4>
	<p>
	<?php if($_SESSION[tn]==PRC){echo '若设置\'相片阔度\'大於100%,但并不想内容开始显示位置在最左边,您能键入开始位置对相片阔度的百分比。';}else if($_SESSION[tn]==EN){echo 'If the picture width is greater than 100% screen width and you do not want the scrolling position starting at left edge position, you can fill in the starting position(in percentage of picture width).';}else{echo '若設置\'相片闊度\'大於100%,但並不想內容開始顯示位置在最左邊,您能鍵入開始位置對相片闊度的百分比。';}?>
	</p>
	<p>
	<?php if($_SESSION[tn]==PRC){echo '若设置\'相片阔度\'亦能令高度大於\'框架限高\',但并不想内容开始显示位置在最上边,您能键入开始位置对相片高度的百分比。';}else if($_SESSION[tn]==EN){echo 'If the picture width is greater than 100% screen width and you do not want the scrolling position starting at top position, you can fill in the starting position(in percentage of picture height).';}else{echo '若設置\'相片闊度\'亦能令高度大於\'框架限高\',但並不想內容開始顯示位置在最上邊,您能鍵入開始位置對相片高度的百分比。';}?>
	</p>
	<p>
	<?php if($_SESSION[tn]==PRC){echo '若相片横向[阔度大於长度]及用戶设备纵向,相片长度[高度]被设定设备高度并按相片尺寸比例显示相片阔度。';}else if($_SESSION[tn]==EN){echo 'If the photo is landscape and APP user\'s device screen is portrait, picture height is the height of device screen and picture width is calcualted by photo size ratio.';}else{echo '若相片横向[闊度大於長度]及用戶設備縱向,相片長度[高度]被設定設備高度並按相片尺寸比例顯示相片闊度。';}?></p>
	<p>
	<?php if($_SESSION[tn]==PRC){echo '开始位置%[上边计]的设定只限特定设备。';}else if($_SESSION[tn]==EN){echo 'The Y Starting position is only effective on specific device.';}else{echo '開始位置%[上邊計]的設定只限特定設備。';}?></p>
	
	<hr>
	<h4 style="color:black"><?php if($_SESSION[tn]==PRC){echo '首张相片';}else if($_SESSION[tn]==EN){echo 'First picture';}else{echo '首張相片';}?></h4>
	<p><?php if($_SESSION[tn]==PRC){echo '框内能含多张相片,但只显示一张相片,您须指定首张相片,其馀相片由功能按钮控制浏览。';}else if($_SESSION[tn]==EN){echo 'The picture frame can contain many pictures but only one picture is showed in it. You need to specify one picture as the cover picture and need to add function buttons for APP user to browse all frame pictures if any.';}else{echo '框內能含多張相片,但只顯示一張相片,您須指定首張相片,其餘相片由功能按鈕控制瀏覽。';}?></p>
	<hr>
	<h4 style="color:black"><?php if($_SESSION[tn]==PRC){echo '相片尺寸';}else if($_SESSION[tn]==EN){echo 'Picture size';}else{echo '相片尺寸';}?></h4>
	<p>
	<?php if($_SESSION[tn]==PRC){echo '您能在windows的档案管理员内将滑鼠移到相片档案上,能显示含相片尺寸资料。';}else if($_SESSION[tn]==EN){echo 'You can move computer mouse to the picture file in Windows\' File Manager and an information with picture size will be showed.';}else{echo '您能在windows的檔案管理員內將滑鼠移到相片檔案上,能顯示含相片尺寸資料。';}?>
	</p>

	</div>
	
	</div>
	
	</div>
	<hr>
	<div class="ui-grid-d"><div class="ui-block-a">
	<?php if($imgurlvlu[$tm]){if(strpos($imgurlvlu[$tm],'http://')!==false or strpos($imgurlvlu[$tm],'https://')!==false){$imgn=htmlspecialchars($imgurlvlu[$tm]);}else{$imgn='../panel/'.$roww[pjnbr].'/images/'.htmlspecialchars($imgurlvlu[$tm]);}
if(file_exists($imgn)){echo '<a href="#imgn" class="ui-btn ui-btn-w" data-rel="popup" data-transition="pop"><img src="'.htmlspecialchars($imgn).'" style="width:55px"/></a><div data-role="popup" id="imgn" style="width:350px"><img src="'.htmlspecialchars($imgn).'" style="width:100%"/></div>';};}?>
	
	</div><div class="ui-block-b"></div><div class="ui-block-c">
	<?php if($tm){?>
	<a href="ifrpic.php?ap=<?php echo htmlspecialchars($roww[ap])?>&pj=<?php echo htmlspecialchars($roww[pjnbr])?>&pn=<?php echo htmlspecialchars($pn)?>" class="ui-btn" data-ajax="false"><?php if($_SESSION[tn]==PRC){echo '再增加新数据';}else if($_SESSION[tn]==EN){echo 'Add new data';}else{echo '再增加新數據';}?></a><?php ;}//if($tm){?></div><div class="ui-block-d">

	

	</div><div class="ui-block-e">
	<?php if($tm){?>
	<input name="dlt" id="dlt" type="checkbox" data-theme="e" ><label for="dlt"><?php if($_SESSION[tn]==PRC){echo '刪除';}else if($_SESSION[tn]==EN){echo 'Delete';}else{echo '刪除';}?></label>
	<?php ;}//if($tm){?>
	</div></div>
	</FORM>
	<hr>
	<div class="ui-grid-a">
	<?php
	
if(sizeof($ifrhtmls)>1){
echo '<div class="ui-block-a"><div data-role="listview" data-inset="true"><li data-theme="b">';if($_SESSION[tn]==PRC){echo '修改数据';}else if($_SESSION[tn]==EN){echo 'Amend data';}else{echo '修改數據';}echo '</li>';}
for($i=1;$i<sizeof($ifrhtmls);$i++){
if(strpos($imgurlvlu[$i],'http://')!==false or strpos($imgurlvlu[$i],'https://')!==false){$images = '';$img=htmlspecialchars($imgurlvlu[$i]);}
else{$images = 'images/';$img='../panel/'.$roww[pjnbr].'/images/'.htmlspecialchars($imgurlvlu[$i]);}
if(file_exists($img))$imgs = '<img src="'.htmlspecialchars($img).'" style="height:100%"/>';
echo '<li data-icon="edit"><a href="ifrpic.php?ap='.htmlspecialchars($roww[ap]).'&pj='.htmlspecialchars($roww[pjnbr]).'&pn='.htmlspecialchars($pn).'&tm='.htmlspecialchars($tmvls[$i]).'" data-ajax="false">';
echo  $imgs.'['.$i.']&nbsp;&nbsp;&nbsp;';
if(strpos($imgurlvlu[$i],'http://')!==false or strpos($imgurlvlu[$i],'https://')!==false){echo  htmlspecialchars($imgurlvlu[$i]);}
else{echo  str_replace('images/','',htmlspecialchars($imgurlvlu[$i]));}
echo '</a></li>';
$imgs = '';
;}
if(sizeof($ifrhtmls)>1)echo '</div></div>';

if(sizeof($ifrhtmls)>1){
echo '<div class="ui-block-b"><div data-role="listview" data-inset="true"><li data-theme="w" style="color:black">';if($_SESSION[tn]==PRC){echo '添加/修改按钮';}else if($_SESSION[tn]==EN){echo 'Add/amend button';}else{echo '添加/修改按鈕';}echo '</li>';}

for($i=1;$i<sizeof($ifrhtmls);$i++){
if(strpos($imgurlvlu[$i],'http://')!==false or strpos($imgurlvlu[$i],'https://')!==false){$images = '';$img=htmlspecialchars($imgurlvlu[$i]);}
else{$images = 'images/';$img='../panel/'.$roww[pjnbr].'/images/'.htmlspecialchars($imgurlvlu[$i]);}
if(file_exists($img)){$imgs = '<img src="'.htmlspecialchars($img).'" style="height:100%"/>';
echo '<li data-icon="edit"><a href="ifrpicbtn.php?ap='.htmlspecialchars($roww[ap]).'&pj='.htmlspecialchars($roww[pjnbr]).'&pn='.htmlspecialchars($pn).'&tm='.htmlspecialchars($tmvls[$i]).'" data-ajax="false">';
echo  $imgs.'['.$i.']&nbsp;&nbsp;&nbsp;';
if(strpos($imgurlvlu[$i],'http://')!==false or strpos($imgurlvlu[$i],'https://')!==false){echo  htmlspecialchars($imgurlvlu[$i]);}
else{echo  str_replace('images/','',htmlspecialchars($imgurlvlu[$i]));}
echo '</a></li>';}
else{echo '<li>';if($_SESSION[tn]==PRC){echo '未找到图像档';}else if($_SESSION[tn]==EN){echo 'The picture file was not found';}else{echo '未找到圖像檔';}echo '</li>';}
$imgs = '';
;}
if(sizeof($ifrhtmls)>1)echo '</div></div>';
?></div>
	<!--<?php 
	//if($ifrhtml){
	?>
	<a href="ifrpic.php?ap=<?php //echo htmlspecialchars($ap)?>'&pj='<?php //echo htmlspecialchars($pj)?>'&pn='<?php //echo htmlspecialchars($pn)?>"  data-ajax="false" class="ui-btn ui-btn ui-btn-inline ui-corner-all ui-btn-icon-left ui-icon-search"><?php //if($_SESSION[tn]==PRC){echo '您的设计';}else if($_SESSION[tn]==EN){echo 'Your design';}else{echo '您的設計';} ?></a>
	<?php //;}?>!-->
	

	<?php 
	if($ifrhtml and $tm){
	echo '<hr><a href="ifrpvw.php?ap='.htmlspecialchars($roww[ap]).'&pj='.htmlspecialchars($roww[pjnbr]).'&pn='.htmlspecialchars($pn).'&tm='.htmlspecialchars($tm).'&tle='.htmlspecialchars($imgtmvls[$tm]).'" target="_blank" data-ajax="false" class="ui-btn ui-btn-b ui-btn-inline ui-corner-all ui-mini">';
	if($_SESSION[tn]==PRC){echo '浏览';}else if($_SESSION[tn]==EN){echo 'Preview ';}else{echo '瀏覽';}
	if($_SESSION[tn]==PRC){echo '相片';}else if($_SESSION[tn]==EN){echo 'Picture';}else{echo '相片';} 
	echo ' '.htmlspecialchars($imgtmvls[$tm]).'</a>';
	;}
	?>
	<hr>
<?php if($_SESSION[tn]==PRC){echo '例';}else if($_SESSION[tn]==EN){echo 'Example';}else{echo '例';}?><br>
			

<div class="ui-grid-solo">
	<div id="hgt1" class="hgt"  style="overflow:auto;width:100%;">
	<div style="position:relative;">
	<img src="../images/boutique.jpg" id="ifrps" style="width:200%"/>
		<div style="position:absolute;top:50%;left:5%; z-index:1; background-color:rgba(125,125,125,0.5);" id="ifrp" class="ui-btn ui-btn-x ui-icon-carat-u ui-btn-icon-left ui-corner-all"><a href="#hgt2" style="text-decoration:none;color:#ffffff"><?php if($_SESSION[tn]==PRC){echo '浏览';}else if($_SESSION[tn]==EN){echo 'Go to';}else{echo '瀏覽';}?></a></div>
		<div style="position:absolute;top:50%;left:78%; z-index:1; background-color:rgba(125,125,125,0.5);"><a href="#" class="ui-btn ui-btn-x ui-btn-inline ui-icon-search ui-btn-icon-notext ui-corner-all"></a><span style="color:red">$88888</span></div>
	</div></div>
	
	<div id="hgt2" class="hgt" style="display:none;overflow:auto;width:100%;position:relative;">
	<img src="../images/sw.jpg" id="ifrps1"  style="width:150%"/>
	<!--<div style="position:absolute;top:55%;left:5%; z-index:1; background-color:rgba(125,125,125,0.5);" id="ifrp1" class="ui-btn ui-btn-x ui-icon-carat-u ui-btn-icon-left ui-corner-all"><a href="#hgt2" style="text-decoration:none;color:#ffffff">&nbsp;</a></div>!-->
	</div>	
</div>



	
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

$('#hgt1').height($( window ).height()*50/100);

var widthrt = 200/100;
document.addEventListener("DOMContentLoaded", function(event) {
$('#hgt1').scrollLeft($( window ).width()*1*widthrt/100);	
$('#hgt1').scrollTop(($( window ).height()*105/100)*50*widthrt*0.75/100);	
});


			
$("#ifrp").on('click',function(){
$("#ifrps").addClass('ifrp1');$("#ifrp").addClass('ifrp1');
setTimeout(function(){$("#hgt1").fadeOut();$("#hgt2").show(function() {$(".hgt").scrollLeft(300);$(".hgt").scrollTop(300);});},800);
});
/*$("#ifrp1").on('click',function(){
$("#ifrps1").addClass('ifrp1');$("#ifrp").addClass('ifrp1');
setTimeout(function(){$("#hgt2").fadeOut(function() {$("#hgt1").show();});},800);
});*/
$("#hgt1").niceScroll({boxzoom:true,touchbehavior:true,bouncescroll:true});
</script>
<?php 
$tdy=0;
$tdy=date('Y-m-d');
if($_POST[img] and $pj and $_SESSION[guanyin1] and $_SESSION[guanyin1]==$_POST[guanyin1]){

	
	if($ap and !preg_match('/^[0-9]*$/', $ap))exit;
	if($pj and !preg_match('/^[0-9]*$/', $pj))exit;	
	if($tm and !preg_match('/^[0-9]*$/', $tm))exit;	
	if($_POST[imgnbr] and !preg_match('/^[0-9]*$/', $_POST[imgnbr]))exit;	
	
	
	if(!$_POST[hgt] or !preg_match('/^[0-9]*$/',$_POST[hgt]))$_POST[hgt] = 50;
	if(!$_POST[wdt] or !preg_match('/^[0-9]*$/',$_POST[wdt]))$_POST[wdt] = 100;
	
	if(!$_POST[scrollposition] or !preg_match('/^[0-9]*$/',$_POST[scrollposition]))$_POST[scrollposition] = '';
	if(!$_POST[scrollpositions] or !preg_match('/^[0-9]*$/',$_POST[scrollpositions]))$_POST[scrollpositions] = '';
	if(!$_POST[sizewdt] or !preg_match('/^[0-9]*$/',$_POST[sizewdt]))$_POST[sizewdt] = '';
	if(!$_POST[sizehgt] or !preg_match('/^[0-9]*$/',$_POST[sizehgt]))$_POST[sizehgt] = '';
	
	if($_POST[dlt] and $tm){
	
	$ifrhtml = str_replace('<!--sysifrpicsys!-->','',$ifrhtml);
	$ifrht =  explode('<!--addifr!--></div>',$ifrhtml);
	$tbg = explode('<!--item'.$tm.'!-->',$ifrht[0]);
	$tbgs = explode('<!--item',$tbg[1]);
	$popup = '<!--item'.$tm.'!-->'.$tbgs[0];
	$popup = str_replace($popup,'',$ifrhtml);
		
	}else if($_POST[img] and $tm){
	
	$ifrhtml = str_replace('<!--sysifrpicsys!-->','',$ifrhtml);


	if($_POST[frt]){$ifrhtml = str_replace('left:0;top:0;"','left:0;top:0;z-index:-1;"',$ifrhtml);
	if(strpos($_POST[img],'http://')!==false or strpos($_POST[img],'https://')!==false){$images = '';}else{$images = 'images/';}
	if($_POST[sizehgt] and $_POST[sizewdt]){$ratio = round($_POST[sizehgt]/$_POST[sizewdt],2);}
		else{$ratio = 1;}
	$ifrspinjs = ';ifrspin("'.$pj.'","'.$pj.$ap.'ifr'.$pn.'p'.$tm.'","'.$images.htmlspecialchars($_POST[img]).'","'.$_POST[hgt].'","'.$_POST[wdt].'","'.$_POST[scrollposition].'","'.$_POST[scrollpositions].'","'.$ratio.'","1",windowHeight,windowWidth);';
	}
	
	if($_POST[frt]){$dp = '';}else{$dp = 'z-index:-1;';}
	if(strpos($_POST[img],'http://')!==false or strpos($_POST[img],'https://')!==false){$images = '';}else{$images = 'images/';}
	$popup .= '<!--item'.$tm.'!--><div id="'.$pj.$ap.'ifr'.$pn.'p'.$tm.'" data-ifr="'.$_POST[hgt].'@'.$_POST[wdt].'@'.$_POST[scrollposition].'@'.$_POST[scrollpositions].'@'.$_POST[sizewdt].'@'.$_POST[sizehgt].'"  data-img="'.$images.htmlspecialchars($_POST[img]).'" style="overflow:auto;width:100%;position:absolute;left:0;top:0;'.$dp.'"><div style="position:absolute;">';	
	$popup .= '<img style="width:'.$_POST[wdt].'%;" src=""/><!--btnitem!-->';	
	
	$tbg = explode('<!--item'.$tm.'!-->',$ifrhtml);
	$tbgs = explode('<!--btnitem!-->',$tbg[1]);
	$tbgn = explode('<!--item'.$tm.'!-->'.$tbgs[0].'<!--btnitem!-->',$ifrhtml);
	
	$popup = $tbg[0].$popup.$tbgn[1];
	
	
	}else if($_POST[img] and !$tm){
	if($tl)$pn = $tl;
	if(strpos($_POST[img],'http://')!==false or strpos($_POST[img],'https://')!==false){$images = '';}else{$images = 'images/';}
	$ifrhtml = str_replace('<!--sysifrpicsys!-->','',$ifrhtml);
	if($_POST[frt]){
		if($_POST[sizehgt] and $_POST[sizewdt]){$ratio = round($_POST[sizehgt]/$_POST[sizewdt],2);}
		else{$ratio = 1;}
		if($ifrhtml){$ifrhtml = str_replace('left:0;top:0;"','left:0;top:0;z-index:-1;"',$ifrhtml);}
		$ifrspinjs = ';ifrspin("'.$pj.'","'.$pj.$ap.'ifr'.$pn.'p'.htmlspecialchars($_POST[imgnbr]+1).'","'.$images.htmlspecialchars($_POST[img]).'","'.$_POST[hgt].'","'.$_POST[wdt].'","'.$_POST[scrollposition].'","'.$_POST[scrollpositions].'","'.$ratio.'","1",windowHeight,windowWidth);';
		$dp = '';
	;}else{$dp = 'z-index:-1;';}
	
	
	$popup .= '<!--item'.htmlspecialchars($_POST[imgnbr]+1).'!--><div id="'.$pj.$ap.'ifr'.$pn.'p'.htmlspecialchars($_POST[imgnbr]+1).'" data-ifr="'.$_POST[hgt].'@'.$_POST[wdt].'@'.$_POST[scrollposition].'@'.$_POST[scrollpositions].'@'.$_POST[sizewdt].'@'.$_POST[sizehgt].'" data-img="'.$images.htmlspecialchars($_POST[img]).'" style="overflow:auto;width:100%;position:absolute;left:0;top:0;'.$dp.'"><div style="position:absolute;">';	
	$popup .= '<img style="width:'.$_POST[wdt].'%;" src=""/><!--btnitem!--></div>';	
	$popup .= '</div><!--addifr!-->';

	if($ifrhtml){
	$ifrhtml = str_replace('data-ifr="'.htmlspecialchars($_POST[imgnbr]).'"','data-ifr="'.htmlspecialchars($_POST[imgnbr]+1).'"',$ifrhtml);
	$popup = str_replace('<!--addifr!-->',$popup,$ifrhtml);
	}else{
	//$popup = '<div class="ui-content" id="'.$pj.$ap.'ifrVideo'.$pn.'" data-corners="false" data-role="popup" data-theme="x" data-tolerance="2,2"><iframe width="498" height="298" src="" seamless=""></iframe></div><div id="'.$pj.$ap.'ifr'.$pn.'" class="ui-grid-solo" data-ifr="1">'.$popup.'</div>';
	$popup = '<div id="'.$pj.$ap.'ifr'.$pn.'" class="ui-grid-solo" data-ifr="1"  style="position:relative;">'.$popup.'</div>';
	}
	
	;}
			//if(strpos($_POST[img],'http://')!==false or strpos($_POST[img],'https://')!==false){$images = '';$img=htmlspecialchars($_POST[img]);}
			//else{$images = 'images/';$img='../panel/'.$roww[pjnbr].'/images/'.htmlspecialchars($_POST[img]);}
			
			//$width = $size[0];$height = $size[1];
			
			if($_POST[sizehgt] and $_POST[sizewdt]){$ratio = round($_POST[sizehgt]/$_POST[sizewdt],2);}
			else{$ratio = 1;}
			
			if(!$_POST[scrollposition])$_POST[scrollposition]="''";	
			if(!$_POST[scrollpositions])$_POST[scrollpositions]="''";		
	
			if($_POST[dlt] and $tm){
				$ifrtbg = explode('/*ifrp'.$tm.'*/',$ifrjs);
				$ifrtbgs = explode('/*ifrsp*/',$ifrtbg[1]);
	
				if(sizeof($ifrtbgs)==2){
					$ifrtbgsw = explode('<!--addifr!-->',$ifrtbgs[1]);
					$ifrjsw = '/*ifrp'.$tm.'*/'.$ifrtbgs[0].'/*ifrsp*/'.$ifrtbgsw[0];	
					$hgtjs = str_replace($ifrjsw,'',$ifrjs);	
				}else{
					$ifrtbgsw = explode('/*ifrp',$ifrtbgs[1]);
					$ifrjsw = '/*ifrp'.$tm.'*/'.$ifrtbgs[0].'/*ifrsp*/'.$ifrtbgsw[0];	
					$hgtjs = str_replace($ifrjsw,'',$ifrjs);	
				}	
			
			
			}else if($_POST[img] and $tm){
			//if($_POST[hgt])$jshgt = '/*$().niceScroll({})*/';
			$hgtjs = '/*ifrp'.$tm.'*/'.$jshgt;$hgtjs .= 'ifrp("'.$pj.$ap.'","'.$pn.'","'.$tm.'",'.htmlspecialchars($_POST[hgt]).','.htmlspecialchars($_POST[wdt]).','.htmlspecialchars($_POST[scrollposition]).','.htmlspecialchars($_POST[scrollpositions]).','.$ratio.',1,windowHeight,windowWidth);';$hgtjs .= '/*ifrsp*/';				
			
				$ifrtbg = explode('/*ifrp'.$tm.'*/',$ifrjs);
				$ifrtbgs = explode('/*ifrsp*/',$ifrtbg[1]);
				$ifrtbgn = explode('/*ifrp'.$tm.'*/'.$ifrtbgs[0].'/*ifrsp*/',$ifrjs);
	
				$hgtjs = $ifrtbg[0].$hgtjs.$ifrtbgn[1];
				
			}else if($_POST[img] and !$tm){
			
			//if($_POST[hgt])$jshgt = '/*$().niceScroll({})*/';
			$hgtjs = '/*ifrp'.htmlspecialchars($_POST[imgnbr]+1).'*/'.$jshgt;$hgtjs .= 'ifrp("'.$pj.$ap.'","'.$pn.'","'.($_POST[imgnbr]+1).'",'.$_POST[hgt].','.$_POST[wdt].','.$_POST[scrollposition].','.$_POST[scrollpositions].','.$ratio.',1,windowHeight,windowWidth);';$hgtjs .= '/*ifrsp*//*addifr*/';
			if($ifrjs)$hgtjs = str_replace('/*addifr*/',$hgtjs,$ifrjs);	
			if(!$tm)$tm = htmlspecialchars($_POST[imgnbr]+1);
			;}//if(file_exists($img)){


			
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
					$vnts  = '<div class="swiper-slide"><div id="'.$pj.$ap.'vnts'.$pn.'" class="vntsns">';
				;}else if($bvtns == 5){
					$vntsn  = '</div></div><!--vnts!-->';
				;}else if($bvtns == 6){
					$vnts  = '';$vntsn  = '';
				;}else{
					$vnts  = '<div class="swiper-slide"><div id="'.$pj.$ap.'vnts'.$pn.'" class="vntsns">';$vntsn  = '</div></div><!--vnts!-->';
				;}
			if($tabnbgdatn[0]){$tabnbgdatns = '<!--data-tabnbg'.$tabnbgdatn[0].'data-tabnbg!-->';}else{$tabnbgdatns = '<!--data-tabnbg@@@@@@data-tabnbg!-->';}	
			$webpopup .= $html.'<!--part'.$pn.'!--><!--sysifrpicsys!-->'.$vnts.$popup.$vntsn.$tabnbgdatns.$htmls;
			$webpopup .= '</div><!--content!--></div><!--page!-->';
			
		 	
			
			$fpagtrns='../panel/'.$roww[pjnbr].'/'.$ap.'.html';
			file_put_contents($fpagtrns,$html.'<!--part'.$pn.'!--><!--sysifrpicsys!-->'.$vnts.$popup.$vntsn.$tabnbgdatns.$htmls);

			$fpagtrns='../panel/'.$roww[pjnbr].'/web'.$ap.'.html';
			file_put_contents($fpagtrns,$webpopup);


	
			if(!file_exists('../panel/'.$roww[pjnbr].'/web'.$ap.'.js')){
			$fpagtrns='../panel/'.$roww[pjnbr].'/web'.$ap.'.js';
			$js = '/*$(document).on(\'pageshow\', \'#web'.$ap.'\', function(){*/';
			$js .= '/*});*/';
			file_put_contents($fpagtrns,$js);			
			;}
			
			if($hgtjs){
			$jsweb = file_get_contents('../panel/'.$roww[pjnbr].'/web'.$ap.'.js');
				
				$jswebs=explode('/*webjs'.$pn.'*/',$jsweb);
				$ifrspin=explode('ifrspin',$jswebs[1]);
				if($_POST[frt])$hgtjs=str_replace(';ifrspin'.$ifrspin[1],'',$hgtjs);
				$jsweb = $jswebs[0].$jswebs[2];
				
				$js = '/*webjs'.$pn.'*/'
				.'/*ifrp*/$("#'.$pj.$ap.'ifr'.$pn.'").css("height",windowHeight*dpr*'.$_POST[hgt].'/100);ifrftnbtn("'.$pj.'","'.$pj.$ap.'","'.$pn.'",1,windowHeight,windowWidth);/*ifrp*/'
				.$hgtjs.$ifrspinjs
				.'/*webjs'.$pn.'*/'
				.'/*});*/';
				$jsweb=str_replace('/*});*/',$js,$jsweb);
				file_put_contents('../panel/'.$roww[pjnbr].'/web'.$ap.'.js',$jsweb);
		//';$("#'.$pj.$ap.'ifr'.$pn.'").niceScroll({boxzoom:true,touchbehavior:true,bouncescroll:true});'		
			;}	
	
	echo "<meta http-equiv='refresh' content='0;URL=ifrpic.php?ap=".htmlspecialchars($roww[ap])."&pj=".htmlspecialchars($roww[pjnbr])."&pn=".htmlspecialchars($pn)."&tm=".htmlspecialchars($tm)."'>";
;}

?>
