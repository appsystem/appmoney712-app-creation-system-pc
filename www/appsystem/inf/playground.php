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
    <title><?php if($_SESSION[tn]==PRC){echo '游戏 - AppMoney712 移动应用设计系统';}else if($_SESSION[tn]==EN){echo 'playground - AppMoney712 APP Creation System';}else{echo '遊戲 - AppMoney712 移動應用設計系統';}?></title>
	<link href="../css/jquery.mobile-1.4.4.min.css" rel="stylesheet">
	<link href="../css/jquerymobile-1.4.4.min.css" rel="stylesheet">
	<link rel="stylesheet" href="../css/icon/style.css">	<link rel="stylesheet" href="../css/icons/style.css">

	<style type="text/css">
	@media all and (min-width: 1250px){.playd{font-size:88px;}.playdw{font-size:144px;}}
		@media all and (min-width: 1020px) and (max-width: 1250px){.playd{font-size:66px;}.playdw{font-size:108px;}}
		@media all and (min-width: 768px) and (max-width: 1020px){.playd{font-size:44px;}.playdw{font-size:72px;}}
		@media all and (min-width: 601px) and (max-width: 768px){.playd{font-size:33px;}.playdw{font-size:54px;}}
		@media all and (min-width: 321px) and (max-width: 600px){.playd{font-size:28px;}.playdw{font-size:36px;}}
		@media all and (max-width: 320px){.playd{font-size:22px;}.playdw{font-size:26px;}}
	</style>
	<script src="../js/jquery.js"></script>
	<script src="../js/jquery.mobile-1.4.4.min.js"></script>	
	<script src="../js/playground.js"></script>

	<script>
	
	</script>


</head>
<body>

<div data-role="page" data-theme="f" class="page">
	<div style="overflow: hidden;" data-role="header" data-theme="f">
	<a href="#navigations"  id="menubttn"  data-rel="popup" data-transition="pop" class="ui-btn ui-btn ui-btn-inline ui-corner-all ui-btn-icon-left ui-icon-bars"><?php if($_SESSION[tn]==PRC){echo '目录';}else if($_SESSION[tn]==EN){echo 'Menu';}else{echo '目錄';}?></a>
    <h1><?php if($_SESSION[tn]==PRC){echo '游戏 - AppMoney712 移动应用设计系统';}else if($_SESSION[tn]==EN){echo 'playground - AppMoney712 APP Creation System';}else{echo '遊戲 - AppMoney712 移動應用設計系統';}?></h1>
	
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
	
		
	<a href="menudesign.php?pj=<?php echo htmlspecialchars($roww[pjnbr])?>&ap=<?php echo $ap?>&pn=<?php echo $pn?>&php=playground&plt=1" data-ajax="false" class="ui-btn ui-btn ui-btn-inline ui-corner-all ui-mini ui-btn-icon-left ui-icon-bars"><?php if($_SESSION[tn]==PRC){echo '专案应用页列表';}else if($_SESSION[tn]==EN){echo 'Project Page List';}else{echo '專案應用頁列表';}?></a>
	<?php ;}?>
	<a href="#try" data-rel="popup" data-transition="pop" class="ui-btn ui-btn-f ui-btn-inline ui-corner-all ui-mini" style="color:BLACK"><span class="pigss-pencil" style="color:red"></span><?php if($_SESSION[tn]==PRC){echo '快速试用';}else if($_SESSION[tn]==EN){echo 'Quick try';}else{echo '快速試用';}?></a>
	<div data-role="popup" id="try" data-position-to="window" data-theme="f" class="ifrwidth"><a href="#" data-rel="back" class="popn ui-btn ui-btn-z ui-btn-icon-notext ui-icon-delete"></a>
	
	
		<p><b style="color:pink"><?php if($_SESSION[tn]==PRC){echo '石剪布/大胜';}else if($_SESSION[tn]==EN){echo 'rock, paper, scissors/bigger';}else{echo '石剪布/大勝';}?></b></p>
		<p><?php if($_SESSION[tn]==PRC){echo '在型式选用\'石剪布/大胜\',再点撀送交。';}else if($_SESSION[tn]==EN){echo 'You need to select the \'rock, paper, scissors/bigger\' in the Type field and click the SEND button.';}else{echo '在型式選用\'石剪布/大勝\',再點撀送交。';}?></p><hr>
	
		<p><b style="color:pink"><?php if($_SESSION[tn]==PRC){echo '獎品';}else if($_SESSION[tn]==EN){echo 'lucky draw';}else{echo '獎品';}?></b></p>
		<p><?php if($_SESSION[tn]==PRC){echo '在型式選用\'獎品\',在\'\'總可能數\'及\'獎品數\'均鍵入8,再點撀送交。<BR>此功能能以相片代替文字。';}else if($_SESSION[tn]==EN){echo 'You need to select the \'lucky draw\' in the Type field, enter 8 to the Total possibile and Number of gifts and click the SEND button.<BR>This function can be used in picture showing style instead of word showing style.';}else{echo '在型式選用\'獎品\',在\'\'總可能數\'及\'獎品數\'均鍵入8,再點撀送交。<BR>此功能能以相片代替文字。';}?></p><hr>
	
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '试用';}else if($_SESSION[tn]==EN){echo 'Testing';}else{echo '試用';}?></b> &nbsp;
	<?php if($_SESSION[tn]==PRC){echo '您须点撀此页上的预览,再进行测试。再修改及选用不同设置再预览并试用。';}else if($_SESSION[tn]==EN){echo 'You need to click the above preview button to test your design. You can enter or select different parameters to test their functions and effects.';}else{echo '您須點撀此頁上的預覽,再進行測試。再修改及選用不同設置再預覽並試用。';}?></p>	
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '试用步骤';}else if($_SESSION[tn]==EN){echo 'Testing Steps';}else{echo '試用步驟';}?></b> &nbsp;
	<?php if($_SESSION[tn]==PRC){echo '在预览页,点撀含用户符号的按钮。';}else if($_SESSION[tn]==EN){echo 'You need to click the user icon buttons to test your design.';}else{echo '在預覽頁,點撀含用戶符號的按鈕。';}?></p>	
		
		 
	
	</div>
	<?php if($tl)$tln = '&tl='.$tl;?>
	
	<FORM action="playground.php?pj=<?php echo htmlspecialchars($roww[pjnbr]) ?>&ap=<?php echo htmlspecialchars($roww[ap]) ?>&pn=<?php echo htmlspecialchars($pn).$tln ?>" id="webxls" method="post" data-ajax="false">
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
					if(strpos('<!--part'.$htm[$i],$pntag)===false and !$pdhtml){$html .= '<!--part'.$htm[$i];}
					else if(strpos('<!--part'.$htm[$i],$pntag)!==false){$pdhtml  = str_replace($pntag,'','<!--part'.$htm[$i]);}
					else{$htmls .= '<!--part'.$htm[$i];}
				;}
			$tabnbgdata = explode('<!--data-tabnbg',$pdhtml);
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
				
			$pdhtml  = str_replace('<div class="swiper-slide"><div id="'.$pj.$ap.'vnts'.$pn.'" class="vntsns vtnn">','',$pdhtml);			
			$pdhtml  = str_replace('<!--data-tabnbg'.$tabnbgdatn[0].'data-tabnbg!-->','',$pdhtml);		
			;}			
			$pdhtml  = str_replace('</div></div><!--vnts!-->','',$pdhtml);
	
				
			$tbgnvlu = explode('<!--data',$pdhtml);
			$tbgsvlu = explode('data!-->',$tbgnvlu[1]);
			$tbgvlu = explode('@#@',$tbgsvlu[0]);

			
			$typvlu = $tbgvlu[0];
			$img1vlu = $tbgvlu[1];
			$img2vlu = $tbgvlu[2];
			$img3vlu = $tbgvlu[3];
			$img4vlu = $tbgvlu[4];
			$bgvlu = $tbgvlu[5];
			$tnbrvlu = $tbgvlu[6];	
			$imgnbrvlu = $tbgvlu[7];	
			$imgnmvlu = $tbgvlu[8];	
			$plyclrvlu = $tbgvlu[9];	
			$plyclrsvlu = $tbgvlu[10];
			$titlevlu = $tbgvlu[11];	
			;}
	?>
	<?php if($_SESSION[tn]==PRC){echo '型式';}else if($_SESSION[tn]==EN){echo 'Type';}else{echo '型式';}?>

	<select name="typ">
	<option value="rps" <?php if($typvlu[$tm]=='rps')echo 'selected="selected"';?>><?php if($_SESSION[tn]==PRC){echo '石剪布';}else if($_SESSION[tn]==EN){echo 'rock, paper, scissors';}else{echo '石剪布';}?></option> 
	<option value="bigger" <?php if($typvlu=='bigger')echo 'selected="selected"';?>><?php if($_SESSION[tn]==PRC){echo '大胜';}else if($_SESSION[tn]==EN){echo 'bigger';}else{echo '大勝';}?></option> 
	<option value="play" <?php if($typvlu=='play')echo 'selected="selected"';?>><?php if($_SESSION[tn]==PRC){echo '獎品';}else if($_SESSION[tn]==EN){echo 'lucky draw';}else{echo '獎品';}?></option> 
	</select>
	<div class="ui-grid-a"><div class="ui-block-a">
	<?php if($_SESSION[tn]==PRC){echo '背景1';}else if($_SESSION[tn]==EN){echo 'Background1';}else{echo '背景1';}?>
	<input type="text" name="img1" placeholder=""  value="<?php echo htmlspecialchars($img1vlu)?>">
	</div><div class="ui-block-b">	<?php if($_SESSION[tn]==PRC){echo '背景2';}else if($_SESSION[tn]==EN){echo 'Background2';}else{echo '背景2';}?>
	<input type="text" name="img2" placeholder=""  value="<?php echo htmlspecialchars($img2vlu)?>"></div></div>
	
	<div class="ui-grid-a"><div class="ui-block-a">
	<?php if($_SESSION[tn]==PRC){echo '背景3';}else if($_SESSION[tn]==EN){echo 'Background3';}else{echo '背景3';}?>
	<input type="text" name="img3" placeholder=""  value="<?php echo htmlspecialchars($img3vlu)?>">
	</div><div class="ui-block-b">	<?php if($_SESSION[tn]==PRC){echo '背景4';}else if($_SESSION[tn]==EN){echo 'Background4';}else{echo '背景4';}?>
	<input type="text" name="img4" placeholder=""  value="<?php echo htmlspecialchars($img4vlu)?>"></div></div>	
	
	
	<div class="ui-grid-a"><div class="ui-block-a">
	<?php if($_SESSION[tn]==PRC){echo 'Player 1 字体颜色';}else if($_SESSION[tn]==EN){echo 'Player 1\'s icon font';}else{echo 'Player 1 字體顏色';}?>
	<input type="text" name="plyclr" placeholder=""  value="<?php echo htmlspecialchars($plyclrvlu)?>">
	</div><div class="ui-block-b">	<?php if($_SESSION[tn]==PRC){echo 'Player 2 字体颜色';}else if($_SESSION[tn]==EN){echo 'Player 2\'s icon font';}else{echo 'Player 2 字體顏色';}?>
	<input type="text" name="plyclrs" placeholder=""  value="<?php echo htmlspecialchars($plyclrsvlu)?>"></div></div>	
	
	
	<?php if($typvlu=='play'){?>
	<div class="ui-grid-c"><div class="ui-block-a">
	<?php if($_SESSION[tn]==PRC){echo '总可能数';}else if($_SESSION[tn]==EN){echo 'Total possibile';}else{echo '總可能數';}?>
	<input type="number" name="tnbr" placeholder=""  value="<?php echo htmlspecialchars($tnbrvlu)?>">
	</div><div class="ui-block-b">	<?php if($_SESSION[tn]==PRC){echo '獎品数';}else if($_SESSION[tn]==EN){echo 'Number of gifts';}else{echo '獎品數';}?>
	<input type="text" name="imgnbr" placeholder=""  value="<?php echo htmlspecialchars($imgnbrvlu)?>"></div>
	<div class="ui-block-c">	<?php if($_SESSION[tn]==PRC){echo '相片名称';}else if($_SESSION[tn]==EN){echo 'Picrure name';}else{echo '相片名稱';}?>
	<input type="text" name="imgnm" placeholder=""  value="<?php echo htmlspecialchars($imgnmvlu)?>"></div>
	<div class="ui-block-d">	<?php if($_SESSION[tn]==PRC){echo '标题';}else if($_SESSION[tn]==EN){echo 'Title';}else{echo '標題';}?>
	<input type="text" name="titlenm" placeholder=""  value="<?php echo htmlspecialchars($titlevlu)?>"></div></div>	
	<?php ;}?>
	<?php if($_SESSION[tn]==PRC){echo '此段內容背景';}else if($_SESSION[tn]==EN){echo 'Section background';}else{echo '此段內容背景';}?>
	<input name="bg" type="text" value="<?php echo htmlspecialchars($bgvlu)?>">

	<input type="hidden" name="guanyin1" value="<?php if(!$_POST[guanyin1])$_SESSION[guanyin1]=rand();
	echo htmlspecialchars($_SESSION[guanyin1]); ?>">
	
	<div class="ui-grid-d"><div class="ui-block-a">
	<input type="submit" name="submit" id="webxlsbtn" class="ui-btn" value="<?php if($_SESSION[tn]==PRC){echo '送交';}else if($_SESSION[tn]==EN){echo 'SEND';}else{echo '送交';}?>"></div><div class="ui-block-b"></div><div class="ui-block-c"></div>
	<div class="ui-block-d">
	<a href="#inf" data-rel="popup" data-transition="pop" class="ui-btn ui-btn-b ui-btn-inline ui-corner-all ui-mini">? <?php if($_SESSION[tn]==PRC){echo '解释';}else if($_SESSION[tn]==EN){echo 'Explanation';}else{echo '解釋';}?></a>
	<div data-role="popup" id="inf" style="min-width:300px;max-width:85%" data-position-to="window" data-theme="f"><a href="#" class="ui-btn ui-corner-all ui-icon-delete ui-btn-icon-notext ui-btn-right" data-rel="back"></a>
	
	<h4 style="color:black"><?php if($_SESSION[tn]==PRC){echo '背景1/2/3/4';}else if($_SESSION[tn]==EN){echo 'Background 1/2/3/4';}else{echo '背景1/2/3/4';}?></h4>
	<p>
	<?php if($_SESSION[tn]==PRC){echo '1及2是按钮的背景,3及4是结果显示区的背景。';}else if($_SESSION[tn]==EN){echo '1 and 2 are the button backgrounds. 3 and 4 are the result display area background.';}else{echo '1及2是按鈕的背景,3及4是結果顯示區的背景。';}?>
	</p>
	<hr>
	<h4 style="color:black"><?php if($_SESSION[tn]==PRC){echo '此段內容背景';}else if($_SESSION[tn]==EN){echo 'Section background';}else{echo '此段內容背景';}?>
/<?php if($_SESSION[tn]==PRC){echo '背景1/2/3/4';}else if($_SESSION[tn]==EN){echo 'Background 1/2/3/4';}else{echo '背景1/2/3/4';}?>
</h4>
	<p>
	<?php if($_SESSION[tn]==PRC){echo '若设置背景图像上下左右重覆显示,在档案名加[xy]。e.g. picture[xy].png';}else if($_SESSION[tn]==EN){echo 'If you add [xy] to the picture file name (e.g. picture[xy].png, the picture will be repeated both vertically and horizontally.';}else{echo '若設置背景圖像上下左右重覆顯示,在檔案名加[xy]。e.g. picture[xy].png';}?>
	</p>
	<p>
	<?php if(!$roww[pjnbr])$roww[pjnbr] = '?';
	if($_SESSION[tn]==PRC){echo '若将此图像档案置於此软件内,是放在';}else if($_SESSION[tn]==EN){echo 'You may need to place this file to this software folder ';}else{echo '若將此圖像檔案置於此軟件內,是放在';}echo 'panel/'.$roww[pjnbr].'/images/.';?>
	</p>
	<p>
	<?php if($_SESSION[tn]==PRC){echo '您亦能在背景图像填上rgb颜色码 e.g. rgb(125,125,125), rgba颜色码 e.g. rgba(125,125,125,0.5) 或 hex颜色码e.g. #123456代替背景图像。';}else if($_SESSION[tn]==EN){echo 'You can add rgb  color code e.g. rgb(125,125,125), rgba color code e.g. rgba(125,125,125,0.5) or hex color code e.g. #123456 instead of background picture.';}else{echo '您亦能在背景圖像填上rgb顏色碼e.g. rgb(125,125,125), rgba顏色碼e.g. rgba(125,125,125,0.5) 或 hex顏色碼e.g. #123456代替背景圖像。';}?>
	</p>
	<hr>
	<h4 style="color:black"><?php if($_SESSION[tn]==PRC){echo 'Player 1/Player 2 字体颜色';}else if($_SESSION[tn]==EN){echo 'Player 1/Player 2\'s icon font';}else{echo 'Player 1/Player 2 字體顏色';}?></h4>
	<p><?php if($_SESSION[tn]==PRC){echo '您能填上颜色称 e.g. blue 或 hex颜色码e.g. #123456。';}else if($_SESSION[tn]==EN){echo 'You can add color name e.g. blue or hex color code e.g. #123456.';}else{echo '您能填上顏色稱 e.g. blue 或 hex顏色碼e.g. #123456。';}?> </p>
	<hr>
	<!--<p>
	<?php if($_SESSION[tn]==PRC){echo '对於背景1/2/3/4,您能填上a至y的颜色主题。';}else if($_SESSION[tn]==EN){echo 'For background 1/2/3/4, you can fill in color theme a to z.';}else{echo '對於背景1/2/3/4,您能填上a至y的顏色主題。';}?>
	</p>!-->
	<hr>
	<h4 style="color:black"><?php if($_SESSION[tn]==PRC){echo '下列只限奖品型式,在提送一次才显示';}else if($_SESSION[tn]==EN){echo 'The following items are for lucky draw type only. These items will be showed after first submitting data.';}else{echo '下列只限獎品型式,在提送一次才顯示。';}?></h4>
	<h4 style="color:black"><?php if($_SESSION[tn]==PRC){echo '总可能数';}else if($_SESSION[tn]==EN){echo 'Total possible';}else{echo '總可能數';}?></h4>
	<p><?php if($_SESSION[tn]==PRC){echo '结果的总数。';}else if($_SESSION[tn]==EN){echo 'It is the total number of results.';}else{echo '結果的總數。';}?> </p>
	<h4 style="color:black"><?php if($_SESSION[tn]==PRC){echo '獎品数';}else if($_SESSION[tn]==EN){echo 'Number of　gift results';}else{echo '獎品數';}?></h4>
	<p><?php if($_SESSION[tn]==PRC){echo '奖品结果数。点撀一次显示奖品相片的机率是奖品结果数/结果的总数*100%。';}else if($_SESSION[tn]==EN){echo 'It is the total number of gift results. The possibility of showing gift picture is total number of results/number of gifts*100%';}else{echo '獎品結果數。點撀一次顯示獎品相片的機率是獎品結果數/結果的總數*100%。';}?> </p>
	<p><?php if($_SESSION[tn]==PRC){echo '您能设置总可能数及奖品结果数相同,作为用户相方的比较游戏。';}else if($_SESSION[tn]==EN){echo 'You can enter the same value of total possible and total number of results. The game becomes result comparison.';}else{echo '您能設置總可能數及獎品結果數相同,作為用戶相方的比較遊戲。';}?> </p>
	<h4 style="color:black"><?php if($_SESSION[tn]==PRC){echo '相片名称';}else if($_SESSION[tn]==EN){echo 'Picrure name';}else{echo '相片名稱';}?></h4>
	<p><?php if($_SESSION[tn]==PRC){echo '奖品相片名称,只填名称,e.g. gift.gif, 只填gift。限用gif格式档。若您的奖品数是10,您须将档案编号,e.g. gift1.gif,gift2.gif......gift10.gif. 您亦应预备 相片名称.gif [即没有编号]作为未中奖品所显示的相片。您须将相片存於panel\\'.$roww[pjnbr].'\\images。';}else if($_SESSION[tn]==EN){echo 'It is the file name of gift picture, you need to fill in the name only. e.g. picture name.gif [no number], you need to fill in gift. You can use gif format picture only. If number of gift results is 10, you need to number your picture filename. e.g. gift1.gif,gift2.gif......gift10.gif. You also need to prepare gift.gif for showing as not winning gift situation. You need to store pictures to folder panel\\'.$roww[pjnbr].'\\images。';}else{echo '獎品相片名稱,只填名稱,e.g. gift.gif, 只填gift。限用gif格式檔。若您的獎品數是10,您須將檔案編號,e.g. gift1.gif,gift2.gif......gift10.gif. 您亦應預備 相片名稱.gif [即沒有編號]作為未中獎品所顯示的相片。您須將相片存於panel\\'.$roww[pjnbr].'\\images。 ';}?> </p>
	<h4 style="color:black"><?php if($_SESSION[tn]==PRC){echo '标题';}else if($_SESSION[tn]==EN){echo 'Title';}else{echo '標題';}?></h4>
	<p><?php if($_SESSION[tn]==PRC){echo '若不用相片,您能以标题显示结果,e.g. 游戏。只限用相片或标题方式,若用标题,不用填相片名称。';}else if($_SESSION[tn]==EN){echo 'If you do not use picture, you can use title for the result presentation. e.g. Game 1. You can use either picture or title. If you use the title method, you do not need to enter the picture name.';}else{echo '若不用相片,您能以標題顯示結果,e.g. 遊戲。只限用相片或標題方式,若用標題,不用填相片名稱。';}?> </p>
	</div>
	
	</div>
	
	</div>
	</FORM>
	<hr>
	<?php 
	if($pdhtml){
	if($_SESSION[tn]==PRC){echo '您的设计';}else if($_SESSION[tn]==EN){echo 'Your design';}else{echo '您的設計';}
	$npdhtml = str_replace('(images/','(../panel/'.$roww[pjnbr].'/images/',$pdhtml);
	echo '<br>'.str_replace('"images/','"../panel/'.$roww[pjnbr].'/images/',$npdhtml);
		
if(file_exists('../panel/'.$roww[pjnbr].'/web'.$ap.'.js')){
	$jswebn = file_get_contents('../panel/'.$roww[pjnbr].'/web'.$ap.'.js');
	$jswebn=explode('/*webjs'.$pn.'*/',$jswebn);
	echo '<script>'.$jswebn[1].'</script>';
;}
	}?>
	<hr>

	<?php if($_SESSION[tn]==PRC){echo '例';}else if($_SESSION[tn]==EN){echo 'Example';}else{echo '例';}?> <br>
	
	<div class="ui-grid-a"><div class="ui-block-a"><a class="ui-btn ui-btn-w ui-btn-icon-top ui-icon-user" id="player1"></a><a class="ui-btn ui-btn-w playdw" id="vlua"></a></div>
	<div class="ui-block-b"><a class="ui-btn ui-btn-w ui-btn-icon-top ui-icon-user" id="player2"></a><a class="ui-btn ui-btn-w  playdw" id="vlub"></a></div></div>
			<br><br>
		<?php if($_SESSION[tn]==PRC){echo '例';}else if($_SESSION[tn]==EN){echo 'Example';}else{echo '例';}?> <br>	
	<div class="ui-grid-solo" style="background-image:url(images/btnimgs2.gif)">
	<div class="ui-grid-a"><div class="ui-block-a"><a class="ui-btn ui-btn-w ui-btn-icon-top ui-icon-user" style="font-size:18px;color:pink;" id="bplayer1"></a><a class="ui-btn ui-btn-w playdw" id="bvlua"></a></div>
	<div class="ui-block-b"><a class="ui-btn ui-btn-w ui-btn-icon-top ui-icon-user" style="font-size:18px;color:pink;" id="bplayer2"></a><a class="ui-btn ui-btn-w  playdw" id="bvlub"></a></div></div>
</div>
	
	<br><br>
		<?php if($_SESSION[tn]==PRC){echo '例';}else if($_SESSION[tn]==EN){echo 'Example';}else{echo '例';}?> <br>	
	<div class="ui-grid-a"><div class="ui-block-a"><a class="ui-btn ui-btn-w ui-btn-icon-top ui-icon-user" style="font-size:18px;color:pink;" id="dplayer1"></a><a class="ui-btn ui-btn-w" id="dvlua"></a></div>
	<div class="ui-block-b"><a class="ui-btn ui-btn-w ui-btn-icon-top ui-icon-user" style="font-size:18px;color:pink;" id="dplayer2"></a><a class="ui-btn ui-btn-w" id="dvlub"></a></div></div>


	
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
var styclr = '';var nbrclick = '';var nbrclicks = '';var styclrs= '';
$("#player1").click(function(event){event.preventDefault();var rlt = '';var vlu = Math.ceil(Math.random() * 30);
		nbrclick++;
		if(nbrclick/2==parseInt(nbrclick/2)){styclr = 'style="color:red"';}else{styclr = 'style="color:blue"';}
		if(vlu <= 10){rlt = '<span class="rps-rock" '+styclr+'></span>';}else if(vlu > 10 && vlu <= 20){rlt = '<span class="rps-scissors" '+styclr+'></span>';}else if(vlu > 20 && vlu <= 30){rlt = '<span class="rps-paper" '+styclr+'></span>';}
		$("#vlua").html(rlt);});
		
		$("#player2").click(function(event){event.preventDefault();var rlt = '';var vlu = Math.ceil(Math.random() * 30);
		nbrclicks++;
		if(nbrclicks/2==parseInt(nbrclicks/2)){styclrs = 'style="color:blue"';}else{styclrs = 'style="color:red"';}
		if(vlu <= 10){rlt = '<span class="rps-rock" '+styclrs+'></span>';}else if(vlu > 10 && vlu <= 20){rlt = '<span class="rps-scissors" '+styclrs+'></span>';}else if(vlu > 20 && vlu <= 30){rlt = '<span class="rps-paper" '+styclrs+'</span>';}
		$("#vlub").html(rlt);});

 bigger('b','',30);
 play('d','','',10,10,'ishow');
</script>
<?php 
$tdy=0;
$tdy=date('Y-m-d');
if($_POST['typ'] and $pj and $_SESSION[guanyin1] and $_SESSION[guanyin1]==$_POST[guanyin1]){

	if($ap and !preg_match('/^[0-9]*$/', $ap))exit;
	if($pj and !preg_match('/^[0-9]*$/', $pj))exit;	
	if($pn and !preg_match('/^[0-9]*$/', $pn))exit;	
		
			if($_POST[img1]){
			$bgtheme1 = 'z';
			if(strpos($_POST[img1],'http://')!==false or strpos($_POST[img1],'https://')!==false){$images = '';}else{$images = 'images/';}
			if(strlen($_POST[img1])==1){$bghtm = '';$bgtheme1 = htmlspecialchars($_POST[img1]);}		
			else if(strpos($_POST[img1],'#')!==false or strpos($_POST[img1],'rgba(')!==false  or strpos($_POST[img1],'rgb(')!==false){$bghtm = 'background-color:'.htmlspecialchars($_POST[img1]).';';}
			else if(strpos($_POST[img1],'[xy]')!==false){$bghtm = 'background-image:url('.$images.htmlspecialchars($_POST[img1]).');';}
			else{$bghtm = 'background-image:url('.$images.htmlspecialchars($_POST[img1]).');background-size:100%;background-repeat:repeat-y;';}
			;}else{$bghtm = '';$bgtheme1 = 'w';}
			
			if($_POST[img2]){
			$bgtheme2 = 'z';
			if(strpos($_POST[img2],'http://')!==false or strpos($_POST[img2],'https://')!==false){$images = '';}else{$images = 'images/';}
			if(strlen($_POST[img2])==1){$bghtm2 = '';$bgtheme2 = htmlspecialchars($_POST[img2]);}		
			else if(strpos($_POST[img2],'#')!==false or strpos($_POST[img2],'rgba(')!==false  or strpos($_POST[img2],'rgb(')!==false){$bghtm2 = 'background-color:'.htmlspecialchars($_POST[img2]).';';}
			else if(strpos($_POST[img2],'[xy]')!==false){$bghtm2 = 'background-image:url('.$images.htmlspecialchars($_POST[img2]).');';}
			else{$bghtm2 = 'background-image:url('.$images.htmlspecialchars($_POST[img2]).');background-size:100%;background-repeat:repeat-y;';}
			;}else{$bghtm2 = '';$bgtheme2 = 'w';}
			
			if($_POST[img3]){
			$bgtheme3 = 'z';
			if(strpos($_POST[img3],'http://')!==false or strpos($_POST[img3],'https://')!==false){$images = '';}else{$images = 'images/';}
			if(strlen($_POST[img3])==1){$bghtm3 = '';$bgtheme3 = htmlspecialchars($_POST[img3]);}		
			else if(strpos($_POST[img3],'#')!==false or strpos($_POST[img3],'rgba(')!==false  or strpos($_POST[img3],'rgb(')!==false){$bghtm3 = 'background-color:'.htmlspecialchars($_POST[img3]).';';}
			else if(strpos($_POST[img3],'[xy]')!==false){$bghtm3 = 'background-image:url('.$images.htmlspecialchars($_POST[img3]).');';}
			else{$bghtm3 = 'background-image:url('.$images.htmlspecialchars($_POST[img3]).');background-size:100%;background-repeat:repeat-y;';}
			;}else{$bghtm3 = '';$bgtheme3 = 'w';}
			
			if($_POST[img4]){
			$bgtheme4 = 'z';
			if(strpos($_POST[img4],'http://')!==false or strpos($_POST[img4],'https://')!==false){$images = '';}else{$images = 'images/';}
			if(strlen($_POST[img4])==1){$bghtm4 = '';$bgtheme4 = htmlspecialchars($_POST[img4]);}		
			else if(strpos($_POST[img4],'#')!==false or strpos($_POST[img4],'rgba(')!==false  or strpos($_POST[img4],'rgb(')!==false){$bghtm4 = 'background-color:'.htmlspecialchars($_POST[img4]).';';}
			else if(strpos($_POST[img4],'[xy]')!==false){$bghtm4 = 'background-image:url('.$images.htmlspecialchars($_POST[img4]).');';}
			else{$bghtm4 = 'background-image:url('.$images.htmlspecialchars($_POST[img4]).');background-size:100%;background-repeat:repeat-y;';}
			;}else{$bghtm4 = '';$bgtheme4 = 'w';}

			$popup .= '<!--data'.htmlspecialchars($_POST['typ']).'@#@'.htmlspecialchars($_POST[img1]).'@#@'.htmlspecialchars($_POST[img2]).'@#@'.htmlspecialchars($_POST[img3]).'@#@'.htmlspecialchars($_POST[img4]).'@#@'.htmlspecialchars($_POST[bg]).'@#@'.htmlspecialchars($_POST[tnbr]).'@#@'.htmlspecialchars($_POST[imgnbr]).'@#@'.htmlspecialchars($_POST[imgnm]).'@#@'.htmlspecialchars($_POST[plyclr]).'@#@'.htmlspecialchars($_POST[plyclrs]).'@#@'.htmlspecialchars($_POST[titlenm]).'data!-->';
	
			if($_POST['typ']=='rps'){
				if($bghtm2)$bghtm2 = 'style="'.$bghtm2.'"';if($bghtm3)$bghtm3 = 'style="'.$bghtm3.'"';if($bghtm4)$bghtm4 = 'style="'.$bghtm4.'"';
				$popup .= '<div class="ui-grid-a"><div class="ui-block-a"><a class="ui-btn ui-btn-'.$bgtheme1.' ui-btn-icon-top ui-icon-user" style="'.$bghtm.'" id="'.$pj.$ap.'player1'.$pn.'"></a><a class="ui-btn ui-btn-'.$bgtheme3.' playdw" '.$bghtm3.' id="'.$pj.$ap.'vlua'.$pn.'"></a></div><div class="ui-block-b"><a class="ui-btn ui-btn-'.$bgtheme2.' ui-btn-icon-top ui-icon-user" '.$bghtm2.' id="'.$pj.$ap.'player2'.$pn.'"></a><a class="ui-btn ui-btn-'.$bgtheme4.' playdw" '.$bghtm4.' id="'.$pj.$ap.'vlub'.$pn.'"></a></div></div>';
			}else if($_POST['typ']=='bigger'){
				if($bghtm3)$bghtm3 = 'style="'.$bghtm3.'"';if($bghtm4)$bghtm4 = 'style="'.$bghtm4.'"';
				$popup .= '<div class="ui-grid-a"><div class="ui-block-a"><a class="ui-btn ui-btn-'.$bgtheme1.' ui-btn-icon-top ui-icon-user" style="font-size:18px;color:pink;'.$bghtm.'" id="'.$pj.$ap.'player1'.$pn.'"></a><a class="ui-btn ui-btn-'.$bgtheme3.' playdw" '.$bghtm3.' id="'.$pj.$ap.'vlua'.$pn.'"></a></div><div class="ui-block-b"><a class="ui-btn ui-btn-'.$bgtheme2.' ui-btn-icon-top ui-icon-user" style="font-size:18px;color:pink;'.$bghtm2.'" id="'.$pj.$ap.'player2'.$pn.'"></a><a class="ui-btn ui-btn-'.$bgtheme4.' playdw" '.$bghtm4.' id="'.$pj.$ap.'vlub'.$pn.'"></a></div></div>';		
			;}else if($_POST['typ']=='play'){
				if($bghtm3)$bghtm3 = 'style="'.$bghtm3.'"';if($bghtm4)$bghtm4 = 'style="'.$bghtm4.'"';
				$popup .= '<div class="ui-grid-a"><div class="ui-block-a"><a class="ui-btn ui-btn-'.$bgtheme1.' ui-btn-icon-top ui-icon-user" style="font-size:18px;color:pink;'.$bghtm.'" id="'.$pj.$ap.'player1'.$pn.'"></a><a class="ui-btn ui-btn-'.$bgtheme3.'" '.$bghtm3.' id="'.$pj.$ap.'vlua'.$pn.'"></a></div><div class="ui-block-b"><a class="ui-btn ui-btn-'.$bgtheme2.' ui-btn-icon-top ui-icon-user" style="font-size:18px;color:pink;'.$bghtm2.'" id="'.$pj.$ap.'player2'.$pn.'"></a><a class="ui-btn ui-btn-'.$bgtheme4.'" '.$bghtm4.' id="'.$pj.$ap.'vlub'.$pn.'"></a></div></div>';		
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
			
			
			$bghtml='';
			if($_POST[bg]){$_POST[bg]=str_replace('/','',$_POST[bg]);
			$_POST[bg]=str_replace('\\','',$_POST[bg]);
			$_POST[bg]=str_replace('..','',$_POST[bg]);}
			
			if(strpos($_POST[bg],'http://')!==false or strpos($_POST[bg],'https://')!==false){$images = '';}else{$images = 'images/';}
			
			if(strpos($_POST[bg],'#')!==false or strpos($_POST[bg],'rgba(')!==false  or strpos($_POST[bg],'rgb(')!==false){
			$bghtml = 'background-color:'.htmlspecialchars($_POST[bg]).';';}
			else if(strpos($_POST[bg],'[xy]')!==false){$bghtml = 'background-image:url('.$images.htmlspecialchars($_POST[bg]).');';}
			else{$bghtml = 'background-image:url('.$images.htmlspecialchars($_POST[bg]).');background-size:100%;background-repeat:repeat-y;';}
			
			if($_POST[bg]){
			$bghtml = '<div class="ui-grid-solo" style="'.$bghtml.'"><!--playgroundbg!-->';
			$bghtmls = '<!--playgroundbg!--></div>';
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
				
			$webpopup .= $html.'<!--part'.$pn.'!--><!--sysplaygroundsys!-->'.$vnts.$bghtml.$popup.$bghtmls.$vntsn.$tabnbgdatns.$htmls;
			$webpopup .= '</div><!--content!--></div><!--page!-->';
			
		 	
			
			$fpagtrns='../panel/'.$roww[pjnbr].'/'.$ap.'.html';
			file_put_contents($fpagtrns,$html.'<!--part'.$pn.'!--><!--sysplaygroundsys!-->'.$vnts.$bghtml.$popup.$bghtmls.$vntsn.$tabnbgdatns.$htmls);

			$fpagtrns='../panel/'.$roww[pjnbr].'/web'.$ap.'.html';
			file_put_contents($fpagtrns,$webpopup);

	

	
	
			if(!file_exists('../panel/'.$roww[pjnbr].'/web'.$ap.'.js')){
			$fpagtrns = '../panel/'.$roww[pjnbr].'/web'.$ap.'.js';
			$js = '/*$(document).on(\'pageshow\', \'#web'.$ap.'\', function(){*/';
			$js .= '/*});*/';
			file_put_contents($fpagtrns,$js);			
			
			;}
			
			$jsweb = file_get_contents('../panel/'.$roww[pjnbr].'/web'.$ap.'.js');
				
				$jswebs=explode('/*webjs'.$pn.'*/',$jsweb);
				$jsweb = $jswebs[0].$jswebs[2];
				
				$js = '/*webjs'.$pn.'*/'; 
				if($_POST['typ']=='rps'){
						$js .= ';rps("'.$pj.$ap.'","'.$pn.'");';
				;}else if($_POST['typ']=='bigger'){
						$js .= ';bigger("'.$pj.$ap.'","'.$pn.'",30,"'.$_POST[plyclr].'","'.$_POST[plyclrs].'");';
				;}else{
						if(($_POST[tnbr] and !preg_match('/^[0-9]*$/',$_POST[tnbr])) or !$_POST[tnbr])$_POST[tnbr]=1;
						if($_POST[imgnbr] and !preg_match('/^[0-9]*$/',$_POST[imgnbr]) or !$_POST[imgnbr])$_POST[imgnbr]=1;
						$js .= ';play("'.$pj.$ap.'","'.$pj.'","'.$pn.'","'.$_POST[imgnbr].'","'.$_POST[tnbr].'","'.htmlspecialchars($_POST[imgnm]).'","'.htmlspecialchars($_POST[titlenm]).'","'.$_POST[plyclr].'","'.$_POST[plyclrs].'");';
				;}
				$js .= '/*webjs'.$pn.'*/'
				.'/*});*/';
				$jsweb=str_replace('/*});*/',$js,$jsweb);
				file_put_contents('../panel/'.$roww[pjnbr].'/web'.$ap.'.js',$jsweb);
			
	
	echo "<meta http-equiv='refresh' content='0;URL=playground.php?ap=".htmlspecialchars($roww[ap])."&pj=".htmlspecialchars($roww[pjnbr])."&pn=".htmlspecialchars($pn)."'>";
;}

?>
