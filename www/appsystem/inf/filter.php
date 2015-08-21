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
    <title><?php if($_SESSION[tn]==PRC){echo '项目列表搜寻 - AppMoney712 移动应用设计系统';}else if($_SESSION[tn]==EN){echo 'Listview filter - AppMoney712 APP Creation System';}else{echo '項目列表搜尋 - AppMoney712 移動應用設計系統';}?></title>
	<link href="../css/jquery.mobile-1.4.4.min.css" rel="stylesheet">
	<link href="../css/jquerymobile-1.4.4.min.css" rel="stylesheet">
	<link href="../jscss/gridlistview.css" rel="stylesheet"><link href="../css/icons/style.css" rel="stylesheet">
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
	</style>
	<script src="../js/jquery.js"></script>
	<script src="../js/jquery.mobile-1.4.4.min.js"></script>

</head>
<body>
<div data-role="page" data-theme="f" class="page">
	<div style="overflow: hidden;" data-role="header" data-theme="f">
	<a href="#navigations"  id="menubttn"  data-rel="popup" data-transition="pop" class="ui-btn ui-btn ui-btn-inline ui-corner-all ui-btn-icon-left ui-icon-bars"><?php if($_SESSION[tn]==PRC){echo '目录';}else if($_SESSION[tn]==EN){echo 'Menu';}else{echo '目錄';}?></a>
    <h1><?php if($_SESSION[tn]==PRC){echo '项目列表搜寻 - AppMoney712 移动应用设计系统';}else if($_SESSION[tn]==EN){echo 'Listview filter - AppMoney712 APP Creation System';}else{echo '項目列表搜尋 - AppMoney712 移動應用設計系統';}?></h1>
	
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
	
		
	<a href="menudesign.php?pj=<?php echo htmlspecialchars($roww[pjnbr])?>&ap=<?php echo $ap?>&pn=<?php echo $pn?>&php=filter&plt=1" data-ajax="false" class="ui-btn ui-btn ui-btn-inline ui-corner-all ui-mini ui-btn-icon-left ui-icon-bars"><?php if($_SESSION[tn]==PRC){echo '专案应用页列表';}else if($_SESSION[tn]==EN){echo 'Project Page List';}else{echo '專案應用頁列表';}?></a>
	<?php ;}?>
	
	
	<a href="#try" data-rel="popup" data-transition="pop" class="ui-btn ui-btn-f ui-btn-inline ui-corner-all ui-mini" style="color:BLACK"><span class="pigss-pencil" style="color:red"></span><?php if($_SESSION[tn]==PRC){echo '快速试用';}else if($_SESSION[tn]==EN){echo 'Quick try';}else{echo '快速試用';}?></a>
		<div data-role="popup" id="try" data-position-to="window" data-theme="f" class="ifrwidth"><a href="#" data-rel="back" class="popn ui-btn ui-btn-z ui-btn-icon-notext ui-icon-delete"></a><BR><BR>
		
		<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '功能 - 项目列表搜寻及项目列表';}else if($_SESSION[tn]==EN){echo 'Function - Listview filter and Listview';}else{echo '功能 - 項目列表搜尋及項目列表';}?></b> &nbsp;<?php if($_SESSION[tn]==PRC){echo '若使用项目列表搜寻,您亦须在此页试用项目列表功能。';}else if($_SESSION[tn]==EN){echo 'If you try Listview filter, you also need to try the Listview function.';}else{echo '若使用項目列表搜尋,您亦須在此頁試用項目列表功能。';}?></p>	
				
		<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '项目填写';}else if($_SESSION[tn]==EN){echo 'Item information';}else{echo '項目填寫';}?></b> &nbsp;<?php if($_SESSION[tn]==PRC){echo '在\'搜寻关键字\'填写bikini并提送。再点撀\'再增加新数据\',在\'搜寻关键字\'填写model并提送。';}else if($_SESSION[tn]==EN){echo 'You need to enter Bikini to the \'searching keyword\' field and click the SEND button. Then, you need to click the \'Add new data\' and enter Model to the \'searching keyword\' field and click the SEND button.';}else{echo '在\'搜尋關鍵字\'填寫bikini並提送。再點撀\'再增加新數據\',在\'搜尋關鍵字\'填寫model並提送。';}?></p>	
		
		<p><?php if($_SESSION[tn]==PRC){echo '点撀此页的\'到上页\'按钮,点撀\'选项按钮/项目列表\'并点选\'项目列表\',再按该页的快速试用指引。若不编写项目列表,只能预览,不能测试。';}else if($_SESSION[tn]==EN){echo 'You need to click the previous page button on this APP page and then click the Option button/Listview and Listview. You need to follow the quick try instruction on the Listview editing page. If you do not edit a listview content on this APP page, you cannot test the function and only preview it.';}else{echo '點撀此頁的\'到上頁\'按鈕,點撀\'選項按鈕/項目列表\'並點選\'項目列表\',再按該頁的快速試用指引。若不編寫項目列表,只能預覽,不能測試。';}?></p>	
		<HR>
		
		<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '试用';}else if($_SESSION[tn]==EN){echo 'Testing';}else{echo '試用';}?></b> &nbsp;
	<?php if($_SESSION[tn]==PRC){echo '您须点撀此页上的预览,再进行预览或测试。再修改及选用不同设置再预览并试用。';}else if($_SESSION[tn]==EN){echo 'You need to click the above preview button to preview or test your design. You can enter or select different parameters to test their functions and effects.';}else{echo '您須點撀此頁上的預覽,再進行預覽或測試。再修改及選用不同設置再預覽並試用。';}?></p>	
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '试用步骤';}else if($_SESSION[tn]==EN){echo 'Testing Steps';}else{echo '試用步驟';}?></b> &nbsp;
	<?php if($_SESSION[tn]==PRC){echo '若有项目列表及内容是含搜寻关键字,您能点撀放大镜符号的搜寻按钮,在popup内再点选搜寻选项并点撀放大镜符号的按钮。';}else if($_SESSION[tn]==EN){echo 'If this APP page contains listview content and its content contains searching keywords, you can click the amplifying len symbol button to show popup. You need to select the Bikini option and click the amplifying len symbol button. ';}else{echo '若有項目列表及內容是含搜尋關鍵字,您能點撀放大鏡符號的搜尋按鈕,在popup內再點選搜尋選項並點撀放大鏡符號的按鈕。';}?></p>	
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
	<?php if($_SESSION[tn]==PRC){echo '搜寻创建';}else if($_SESSION[tn]==EN){echo 'Filter Creating';}else{echo '搜尋創建';}
	if($tm)echo '<span style="color:black">['.htmlspecialchars($tm).']</span>';?>  
	

	<?php if($tl)$tln = '&tl='.$tl;?>
	
<?php   if($pn){
			$ht = file_get_contents('../panel/'.$roww[pjnbr].'/'.$ap.'.html');
			$htm = explode('<!--part',$ht);
			$pntag = '<!--part'.$pn.'!-->';
				for($i=1;$i<sizeof($htm);$i++){
					if(strpos('<!--part'.$htm[$i],$pntag)===false and !$filterhtml){$html .= '<!--part'.$htm[$i];}
					else if(strpos('<!--part'.$htm[$i],$pntag)!==false){$filterhtml  = str_replace($pntag,'','<!--part'.$htm[$i]);}
					else{$htmls .= '<!--part'.$htm[$i];}
				;}
			$tabnbgdata = explode('<!--data-tabnbg',$filterhtml);
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
				
			$filterhtml  = str_replace('<div class="swiper-slide"><div id="'.$pj.$ap.'vnts'.$pn.'" class="vntsns vtnn">','',$filterhtml);	
			$filterhtml  = str_replace('<!--data-tabnbg'.$tabnbgdatn[0].'data-tabnbg!-->','',$filterhtml);	
			;}			
			$filterhtml  = str_replace('</div></div><!--vnts!-->','',$filterhtml);


				
			$ultbg = explode('<!--filterhtml!-->',$filterhtml);

			$tbg = explode('<!--item!-->',$ultbg[1]);
		
			$tbgnvlu = explode('<!--data',$ultbg[0]);
			$tbgsvlu = explode('data!-->',$tbgnvlu[1]);
			$tbgvluv = explode('@#@',$tbgsvlu[0]);
			
			for($i=1;$i<sizeof($tbg);$i++){
			
			$tbgnvlu = explode('<!--data',$tbg[$i]);
			$tbgsvlu = explode('data!-->',$tbgnvlu[1]);
			$tbgvlu = explode('@#@',$tbgsvlu[0]);
			
			$typvlu[$i] = $tbgvlu[0];
			$wspvlu[$i] = $tbgvlu[1];
			$titlevlu[$i] = $tbgvlu[2];
			$titlebgvlu[$i] = $tbgvlu[3];
			$tclrvlu[$i] = $tbgvlu[4];
			$borderbgvlu[$i] = $tbgvlu[5];
			$poptitlebgvlu[$i] = $tbgvlu[6]; 
			$popvtclrvlu[$i] = $tbgvlu[7]; 
			$popbgclrvlu[$i] = $tbgvlu[8];
			}
			;}
	?>	
	<FORM action="filter.php?pj=<?php echo htmlspecialchars($roww[pjnbr]) ?>&ap=<?php echo htmlspecialchars($roww[ap]) ?>&tm=<?php echo htmlspecialchars($tm) ?>&pn=<?php echo htmlspecialchars($pn).$tln ?>" id="webxls" method="post" data-ajax="false" >
	<div class="ui-grid-a"><div class="ui-block-a"><?php if($_SESSION[tn]==PRC){echo '型式';}else if($_SESSION[tn]==EN){echo 'Type';}else{echo '型式';}?><select name="typ">
	<option value="item"  <?php if($typvlu[$tm]=='item')echo 'selected="selected"';?>><?php if($_SESSION[tn]==PRC){echo '项目';}else if($_SESSION[tn]==EN){echo 'Item';}else{echo '項目';}?></option>	
	<option value="divider"  <?php if($typvlu[$tm]=='divider')echo 'selected="selected"';?>><?php if($_SESSION[tn]==PRC){echo '隔项';}else if($_SESSION[tn]==EN){echo 'Divider';}else{echo '隔項';}?></option>	
	</select>
	</div><div class="ui-block-b"><br><label for='wsp'><?php if($_SESSION[tn]==PRC){echo '文字显示';}else if($_SESSION[tn]==EN){echo 'All texts show';}else{echo '文字顯示';}?><input type="checkbox" name="wsp" id="wsp" value="1" <?php if($wspvlu[$tm])echo 'checked="checked"'?>></label></div></div>
	<?php if($_SESSION[tn]==PRC){echo '搜寻关键字';}else if($_SESSION[tn]==EN){echo 'Searching keyword';}else{echo '搜尋關鍵字';}?><input type="text" name="title" placeholder="" value="<?php echo htmlspecialchars($titlevlu[$tm])?>" required>
	<div class="ui-grid-b"><div class="ui-block-a">
	<?php if($_SESSION[tn]==PRC){echo '关键字区背景颜色';}else if($_SESSION[tn]==EN){echo 'Background color of keyword area';}else{echo '關鍵字背景顏色';}?><input type="text" name="titlebg" placeholder="" value="<?php echo htmlspecialchars($titlebgvlu[$tm])?>"></div><div class="ui-block-b">
	
	<?php if($_SESSION[tn]==PRC){echo '关键字标题颜色';}else if($_SESSION[tn]==EN){echo 'Keyword text color';}else{echo '關鍵字標題顏色';}?><input type="text" name="tclr" placeholder="" value="<?php echo htmlspecialchars($tclrvlu[$tm])?>"></div>
	<div class="ui-block-c"><?php if($_SESSION[tn]==PRC){echo '边色';}else if($_SESSION[tn]==EN){echo 'Border color';}else{echo '邊色';}?><input type="text" name="borderbg" placeholder="" value="<?php echo htmlspecialchars($borderbgvlu[$tm])?>"></div>
	</div>
	<?php if($tm){?>
	<hr>
	
	<div class="ui-grid-c"><div class="ui-block-a"><?php if($_SESSION[tn]==PRC){echo '选项按钮标题';}else if($_SESSION[tn]==EN){echo 'Title of item button';}else{echo '選項按鈕標題';}?><input type="text" name="vtitls" placeholder="" value="<?php echo htmlspecialchars($tbgvluv[0])?>">
	</div><div class="ui-block-b"><?php if($_SESSION[tn]==PRC){echo '全显按钮标题';}else if($_SESSION[tn]==EN){echo 'Title of all data button';}else{echo '全顯按鈕標題';}?><input type="text" name="vtitln" placeholder="" value="<?php echo htmlspecialchars($tbgvluv[2])?>"></div>
	<div class="ui-block-c"><?php if($_SESSION[tn]==PRC){echo '搜寻按钮标题';}else if($_SESSION[tn]==EN){echo 'Title of searching button';}else{echo '搜尋按鈕標題';}?><input type="text" name="vtitle" placeholder="" value="<?php echo htmlspecialchars($tbgvluv[1])?>">
	</div><div class="ui-block-d"><?php if($_SESSION[tn]==PRC){echo '重设按钮标题';}else if($_SESSION[tn]==EN){echo 'Title of clear button';}else{echo '重設按鈕標題';}?><input type="text" name="vtitlm" placeholder="" value="<?php echo htmlspecialchars($tbgvluv[3])?>">
	</div></div>
	<div class="ui-grid-a"><div class="ui-block-a"><?php if($_SESSION[tn]==PRC){echo '按钮背景颜色';}else if($_SESSION[tn]==EN){echo 'Button background color';}else{echo '按鈕背景顏色';}?><input type="text" name="vtitlebg" placeholder="" value="<?php echo htmlspecialchars($tbgvluv[4])?>">
	</div><div class="ui-block-b"><?php if($_SESSION[tn]==PRC){echo '按钮标题颜色';}else if($_SESSION[tn]==EN){echo 'Button title color';}else{echo '按鈕標題顏色';}?><input type="text" name="vtclr" placeholder="" value="<?php echo htmlspecialchars($tbgvluv[5])?>">
	</div></div>
	<hr>
	POPUP<?php if($_SESSION[tn]==PRC){echo '设定';}else if($_SESSION[tn]==EN){echo ' setting';}else{echo '設定';}?>
	<div class="ui-grid-b"><div class="ui-block-a"><?php if($_SESSION[tn]==PRC){echo '按钮背景颜色';}else if($_SESSION[tn]==EN){echo 'Button background color';}else{echo '按鈕背景顏色';}?><input type="text" name="poptitlebg" placeholder="" value="<?php echo htmlspecialchars($tbgvluv[6])?>">
	</div><div class="ui-block-b"><?php if($_SESSION[tn]==PRC){echo '按钮标题颜色';}else if($_SESSION[tn]==EN){echo 'Button title color';}else{echo '按鈕標題顏色';}?><input type="text" name="popvtclr" placeholder="" value="<?php echo htmlspecialchars($tbgvluv[7])?>">
	</div><div class="ui-block-c">POPUP<?php if($_SESSION[tn]==PRC){echo '背景';}else if($_SESSION[tn]==EN){echo ' Background';}else{echo '背景';}?><input type="text" name="popbgclr" placeholder="" value="<?php echo htmlspecialchars($tbgvluv[8])?>">
	</div></div>
	<?php ;}//if(){?>
	<input type="hidden" name="guanyin1" value="<?php if(!$_POST[guanyin1])$_SESSION[guanyin1]=rand();
	echo htmlspecialchars($_SESSION[guanyin1]); ?>">
	<div class="ui-grid-b"><div class="ui-block-a">

	<input type="submit" name="submit" id="webxlsbtn" Value="<?php if($_SESSION[tn]==PRC){echo '送交';}else if($_SESSION[tn]==EN){echo 'SEND';}else{echo '送交';}?>">
	</div><div class="ui-block-b">
<a href="#inf" data-rel="popup" data-transition="pop" class="ui-btn ui-btn-b ui-btn-inline ui-corner-all ui-mini">? <?php if($_SESSION[tn]==PRC){echo '解释';}else if($_SESSION[tn]==EN){echo 'Explanation';}else{echo '解釋';}?></a>
	<div data-role="popup" id="inf" data-position-to="window" data-theme="f"  style="min-width:300px;max-width:85%"><a href="#" data-rel="back" class="popn ui-btn ui-btn-z ui-btn-icon-notext ui-icon-delete"></a>
	<br>
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '填写';}else if($_SESSION[tn]==EN){echo 'Fill in';}else{echo '填寫';}?></b> 
	<?php if($_SESSION[tn]==PRC){echo '一些按钮或popup设置,只用填写一次,所有项目均用此相同设定。相关关键字或隔项,才须逐项填写。';}else if($_SESSION[tn]==EN){echo 'You only need to fill in the button or pupop information once. These settings are for all items. You need to fill in keyword or divider information one by one.';}else{echo '一些按鈕或popup設置,只用填寫一次,所有項目均用此相同設定。相關關鍵字或隔項,才須逐項填寫。';}?></p>
	<hr>
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '使用';}else if($_SESSION[tn]==EN){echo 'Use';}else{echo '使用';}?></b> 
	<?php if($_SESSION[tn]==PRC){echo '此功能只相关於项目列表的应用页,若应用页内设置\'自定搜寻关键字\'才能使用。搜寻时只搜寻此页此等关键字。';}else if($_SESSION[tn]==EN){echo 'It is about the function page of Listview. If you add \'Searching keyword\' on this APP page, you use this function. This searching function is to search the keywords on this APP page.';}else{echo '此功能只相關於項目列表的應用頁,若應用頁內設置\'自定搜尋關鍵字\'才能使用。搜尋時只搜尋此頁此等關鍵字。';}?></p>
	<hr>
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '型式';}else if($_SESSION[tn]==EN){echo 'Type';}else{echo '型式';}?></b> 
	<?php if($_SESSION[tn]==PRC){echo '隔项只作隔开项目。项目是关键字,用作搜寻。';}else if($_SESSION[tn]==EN){echo 'Divider is for item separation. Item is searching keyword(s).';}else{echo '隔項只作隔開項目。項目是關鍵字,用作搜尋。';}?></p>
	<hr>
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '文字显示';}else if($_SESSION[tn]==EN){echo 'All texts show';}else{echo '文字顯示';}?></b> 
	<?php if($_SESSION[tn]==PRC){echo '您应将浏览器调至移动设备尺寸浏览您的设计。点选代表键入的文字不限高度全部显示。';}else if($_SESSION[tn]==EN){echo 'All text will be showed on the button. You need to resize your browser as mobile phone to view the difference.';}else{echo '您應將瀏覽器調至移動設備尺寸瀏覽您的設計。點選代表鍵入的文字不限高度全部顯示。';}?></p>
	<hr>
	<p><b style="color:black"><?php  if(!$roww[pjnbr])$roww[pjnbr]='?';
	if($_SESSION[tn]==PRC){echo '关键字区背景颜色/POPUP背景';}else if($_SESSION[tn]==EN){echo 'Background color of keyword area/POPUP';}else{echo '關鍵字背景顏色/POPUP背景';}?></b> 
	<?php if($_SESSION[tn]==PRC){echo '您能填上rgb颜色码e.g. rgb(125,125,125), rgba颜色码e.g. rgba(125,125,125,0.5) 或 hex颜色码e.g. #123456。';}else if($_SESSION[tn]==EN){echo 'You can add rgb color code e.g. rgb(125,125,125), rgba color code e.g. rgba(125,125,125,0.5) or hex color code e.g. #123456.';}else{echo '您能填上rgb顏色碼e.g. rgb(125,125,125), rgba顏色碼e.g. rgba(125,125,125,0.5) 或 hex顏色碼e.g. #123456。';}?></p>
	<!--<p><?php if($_SESSION[tn]==PRC){echo '您亦能填上a-z颜色主题。';}else if($_SESSION[tn]==EN){echo 'You can add a-z color theme.';}else{echo '您亦能填上a-z顏色主題。';}?></p>!-->	<p><?php if($_SESSION[tn]==PRC){echo '您能加图像,图像档案须存於panel/'.$roww[pjnbr].'/images档夹内。若设置背景图像上下左右重覆显示,在档案名加[xy]。e.g. picture[xy].png';}else if($_SESSION[tn]==EN){echo 'You can add picture as background. If you use the APP pictures, you need to prepare pictures and store them in  panel/'.$roww[pjnbr].'/images folder. If you add [xy] to the picture file name (e.g. picture[xy].png, the picture will be repeated both vertically and horizontally in button area.';}else{echo '您能加圖像,圖像檔案須存於panel/'.$roww[pjnbr].'/images檔夾內。若設置背景圖像上下左右重覆顯示,在檔案名加[xy]。e.g. picture[xy].png';}?></p>
	<hr>
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '关键字/按钮标题颜色';}else if($_SESSION[tn]==EN){echo 'Keyword/button text color';}else{echo '關鍵字/按鈕標題顏色';}?></b> 
	<?php if($_SESSION[tn]==PRC){echo '填上html颜色码 e.g. #123456。';}else if($_SESSION[tn]==EN){echo 'You can add  color code e.g. #123456 .';}else{echo '填上html顏色碼 e.g. #123456。';}?></p>
	<hr>
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '边色';}else if($_SESSION[tn]==EN){echo 'Border color';}else{echo '邊色';}?></b> 
	<?php if($_SESSION[tn]==PRC){echo '填上html颜色码,e.g. #123456。但只应在同一列表内使用相同颜色。若不设置,填none。';}else if($_SESSION[tn]==EN){echo 'You can add html color code e.g. #123456 and is better to use same color for a listview. If you do not use the border for an item, enter none.';}else{echo '填上html顏色碼,e.g. #123456。但只應在同一列表內使用相同顏色。若不設置,填none。';}?></p>
	<hr>
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '按钮标题';}else if($_SESSION[tn]==EN){echo 'Button title';}else{echo '按鈕標題';}?></b> 
	<?php if($_SESSION[tn]==PRC){echo '若在标题加填[icon],标题旁被加特定符号e.g. 标题是??,填??[icon]。';}else if($_SESSION[tn]==EN){echo 'You can add [icon] to the title for adding specific icon to the button. e.g. title is ??, fill in ??[icon]';}else{echo '若在標題加填[icon],標題旁被加特定符號e.g. 標題是??,填??[icon]。';}?></p>
	<hr>
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '重设按钮标题';}else if($_SESSION[tn]==EN){echo 'Title of clear button';}else{echo '重設按鈕標題';}?></b> 
		<?php if($_SESSION[tn]==PRC){echo '填写此标题才能重设此按钮。此按钮并没上述之符号。';}else if($_SESSION[tn]==EN){echo 'You can enter this title to enable this button. It is no icon for this button.';}else{echo '填寫此標題才能重設此按鈕。此按鈕並沒上述之符號。';}?></p>
	<hr>	
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '修改资料';}else if($_SESSION[tn]==EN){echo 'Amend Data';}else{echo '修改資料';}?></b> 
	<?php if($_SESSION[tn]==PRC){echo '当存有数据,数据将在下面列出,点撀相关数据进行修改丶插入[改次序,以编号作准]或删除。';}else if($_SESSION[tn]==EN){echo 'A data list will be showed on the below section. You can click the related data title to amend, insert[re-order by number] or delete.';}else{echo '當存有數據,數據將在下面列出,點撀相關數據進行修改、插入[改次序,以編號作準]或刪除。';}?></p>	

	</div>

</div></div>
	<hr>
	<div class="ui-grid-d"><div class="ui-block-a"></div><div class="ui-block-b"></div><div class="ui-block-c"><a href="filter.php?ap=<?php echo htmlspecialchars($roww[ap])?>&pj=<?php echo htmlspecialchars($roww[pjnbr])?>&pn=<?php echo htmlspecialchars($pn)?>" class="ui-btn" data-ajax="false"><?php if($_SESSION[tn]==PRC){echo '再增加新数据';}else if($_SESSION[tn]==EN){echo 'Add new data';}else{echo '再增加新數據';}?></a></div><div class="ui-block-d">
	<?php if(sizeof($tbg)>=3){?>
	<select name="ord" data-theme="b">
	<option value=" "><?php if($_SESSION[tn]==PRC){echo '插入';}else if($_SESSION[tn]==EN){echo 'Insert';}else{echo '插入';}?></option>
	<?php for($i=1;$i<sizeof($tbg);$i++){
	if($i!=$tm and $i!=$tm+1){?><option value="<?php echo $i?>"><?php echo '['.$i.'] '.$titlevlu[$i]?></option>
	<?php ;};}?>
	</select><?php ;}?></div><div class="ui-block-e"><?php if($pn){?><input name="dlt" id="dlt" type="checkbox" data-theme="e" ><label for="dlt"><?php if($_SESSION[tn]==PRC){echo '刪除';}else if($_SESSION[tn]==EN){echo 'Delete';}else{echo '刪除';}?></label><?php ;}//if(!$pn){?></div></div>
	</FORM>
<hr>
<?php
if(sizeof($tbg)){
echo '<div data-role="listview" data-inset="true">';}
for($i=1;$i<sizeof($tbg);$i++){
echo '<li data-icon="edit"><a href="filter.php?ap='.htmlspecialchars($roww[ap]).'&pj='.htmlspecialchars($roww[pjnbr]).'&pn='.htmlspecialchars($pn).'&tm='.$i.'" data-ajax="false">';
echo  '['.$i.']&nbsp;&nbsp;&nbsp;';
if($titlevlu[$i])echo  htmlspecialchars($titlevlu[$i]);
echo '</a></li>';
;}
if(sizeof($tbg))echo '</div>';
?>
	<hr>

<?php 
if($filterhtml){
	if($_SESSION[tn]==PRC){echo '您的设计';}else if($_SESSION[tn]==EN){echo 'Your design';}else{echo '您的設計';}
	$nfilterhtml = str_replace('(images/','(../panel/'.$roww[pjnbr].'/images/',$filterhtml);
	echo '<br>'.str_replace('"images/','"../panel/'.$roww[pjnbr].'/images/',$nfilterhtml);
		
if(file_exists('../panel/'.$roww[pjnbr].'/web'.$ap.'.js')){
	$jswebn = file_get_contents('../panel/'.$roww[pjnbr].'/web'.$ap.'.js');
	$jswebn=explode('/*webjs'.$pn.'*/',$jswebn);
	echo '<script>'.$jswebn[1].'</script>';
;}
	}?>
	<hr>
	<?php if($_SESSION[tn]==PRC){echo '例';}else if($_SESSION[tn]==EN){echo 'Examples';}else{echo '例';}?>
	

<br>
<div class="ui-grid-solo gridlistview">
<a href="#filter" data-rel="popup" class="ui-btn ui-btn-w ui-btn-inline ui-btn-icon-left ui-icon-search"><?php if($_SESSION[tn]==PRC){echo '选项按钮';}else if($_SESSION[tn]==EN){echo 'item button';}else{echo '選項按鈕';}?></a>
<a href="#" id="filters" class="ui-btn ui-btn-w ui-btn-inline ui-btn-icon-left ui-icon-refresh"><?php if($_SESSION[tn]==PRC){echo '全显按钮';}else if($_SESSION[tn]==EN){echo 'refreshing data button';}else{echo '全顯按鈕';}?></a>
<div id="filter" data-role="popup" data-theme="a" data-corners="false" style="padding:5px" class="ifrwidthps">
<a href="#" data-rel="back" class="popn ui-btn ui-btn-z ui-btn-icon-notext ui-icon-delete"></a>
<a href="#" id="filtclrslt" class="ui-btn ui-btn-w ui-btn-inline"><?php if($_SESSION[tn]==PRC){echo '重设按钮';}else if($_SESSION[tn]==EN){echo 'clear button';}else{echo '重設按鈕';}?></a>
<a href="#" id="filtersh" class="ui-btn ui-btn-w ui-btn-inline ui-btn-icon-left ui-icon-search"><?php if($_SESSION[tn]==PRC){echo '搜寻按钮';}else if($_SESSION[tn]==EN){echo 'searching button';}else{echo '搜尋按鈕';}?></a>

<ul data-role="listview" data-theme="w" style="width:80%">
<li><a href="#" data-vlu="" class="filter ui-btn ui-btn-w ui-btn-icon-left" >MODEL</a></li><li><a href="#" data-vlu="" class="filter ui-btn ui-btn-w ui-btn-icon-left">bikini</a></li>
</ul></div>


<ul data-corners="false" data-role="listview" data-inset="true">
    <li data-theme="f" data-filtertext="bikini"><a href="#">
        <img class="ui-li-thumb" src="../images/bikini.jpg">
    <h2 style="color:white"><?php if($_SESSION[tn]==PRC){echo '比堅尼';}else if($_SESSION[tn]==EN){echo 'bikini';}else{echo '比堅尼';}?></h2>
    <p style="color:red"><?php if($_SESSION[tn]==PRC){echo 'bikini';}else if($_SESSION[tn]==EN){echo '比堅尼';}else{echo 'bikini';}?></p></a>
    </li>
    <li data-theme="w" data-filtertext="bikini MODEL"><a href="#">
        <img class="ui-li-thumb" src="../images/model.jpg">
    <h2 style="color:red">Bikini MODEL</h2>
    <p style="color:white">Bikini MODEL</p></a>
    </li>
    <li data-theme="f" data-filtertext="bikini"><a href="#">
        <img class="ui-li-thumb" src="../images/bikini.jpg">
    <h2 style="color:red"><?php if($_SESSION[tn]==PRC){echo '比堅尼';}else if($_SESSION[tn]==EN){echo 'bikini';}else{echo '比堅尼';}?></h2>
    <p style="color:BLUE"><?php if($_SESSION[tn]==PRC){echo 'bikini';}else if($_SESSION[tn]==EN){echo '比堅尼';}else{echo 'bikini';}?></p></a>
    </li>
	<li data-theme="b" data-filtertext="MODEL"><a href="#">
        <img class="ui-li-thumb" src="../images/model.jpg">
    <h2 style="color:red">MODEL</h2>
    <p>MODEL</p></a>
    </li>
</ul>
</div>
<a href="#infnsp" data-rel="popup" data-transition="pop" class="ui-btn ui-btn-b ui-btn-inline ui-corner-all ui-mini">? <?php if($_SESSION[tn]==PRC){echo '解释';}else if($_SESSION[tn]==EN){echo 'Explanation';}else{echo '解釋';}?></a>
	<div data-role="popup" id="infnsp" style="min-width:300px;max-width:85%" data-position-to="window" data-theme="f">
	<h4 style="color:black"><?php if($_SESSION[tn]==PRC){echo '项目列表';}else if($_SESSION[tn]==EN){echo 'Listview';}else{echo '項目列表';}?></h4>
	<p><?php if($_SESSION[tn]==PRC){echo '在应用页巳设定\'项目列表\',并在项目加上自定搜寻关键字。';}else if($_SESSION[tn]==EN){echo 'For using this function, you need to add a listview content on the APP page and add searching keyword to the listview items.';}else{echo '在應用頁巳設定\'項目列表\',並在項目加上自定搜尋關鍵字。';}?></p>
	<p><?php if($_SESSION[tn]==PRC){echo '注:在\'项目列表\'的设置亦巳能添加搜寻功能(能搜寻文字内容),但只限一张列表,并以键入文字形式进行。';}else if($_SESSION[tn]==EN){echo 'Remark: The listview function contains searching function which can be only effective on a list but not all lists of listvew content on an APP page. APP user needs to type word in searching field to get searching result in one list.';}else{echo '註:在\'項目列表\'的設置亦巳能添加搜尋功能(能搜尋文字內容),但只限一張列表,並以鍵入文字形式進行。';}?></p>
	<hr>
	<h4 style="color:black"><?php if($_SESSION[tn]==PRC){echo '搜寻步骤';}else if($_SESSION[tn]==EN){echo 'Searching steps';}else{echo '搜尋步驟';}?></h4>
	<p><?php if($_SESSION[tn]==PRC){echo '点撀\'选项按钮\',进入巳设置关键字的popup,点选关键字,再点选搜寻按钮,就能显示搜寻项目。';}else if($_SESSION[tn]==EN){echo 'You need to click the item button to show the searching keyword popup. You need to select keyword in the popup and then click the searching button to show search result.';}else{echo '點撀\'選項按鈕\',進入巳設置關鍵字的popup,點選關鍵字,再點選搜尋按鈕,就能顯示搜尋項目。';}?></p>
	
	</div>
	<script src="../js/appsystem.js"></script>
<script>

$('.filter').click(function (event){
	event.preventDefault();	
	var fitlervlu = $(".gridlistview").data("filter");
	if(!fitlervlu)fitlervlu='';
	if($(this).attr('data-vlu')){
		$(this).removeClass('ui-icon-check');$(this).attr('data-vlu','');
		fitlervlu = fitlervlu.replace('[data-filtertext*='+$(this).html()+']','');
		$(".gridlistview").data("filter",fitlervlu);
	}else{
		$(this).addClass('ui-icon-check');$(this).attr('data-vlu','1');
		$(".gridlistview").data("filter",fitlervlu+'[data-filtertext*='+$(this).html()+']');
	}		
});
$('#filtclrslt').click(function (event){
	event.preventDefault();	
	$('.filter').removeClass('ui-icon-check');$('.filter').attr('data-vlu','');
	var fitlervlu = $(".gridlistview").data("filter",'');
});

$('#filtersh').click(function (event){
	event.preventDefault();	
	var fitlervlu = $(".gridlistview").data("filter");
	if(fitlervlu){
	$('li[data-filtertext]').hide();
	$('li'+fitlervlu).show();
	$('#filter').popup('close')
	;}
});

$('#filters').click(function (event){
	event.preventDefault();	
	$('li').show();
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
if($_POST[title] and $pj and $_SESSION[guanyin1] and $_SESSION[guanyin1]==$_POST[guanyin1]){

	if($ap and !preg_match('/^[0-9]*$/', $ap))exit;
	if($pj and !preg_match('/^[0-9]*$/', $pj))exit;	
	if($tm and !preg_match('/^[0-9]*$/', $tm))exit;	

if($_POST[dlt] and $tm){
	$ultbg = explode('<!--filterhtml!-->',$filterhtml);
	$tbg = explode('<!--item!-->',$ultbg[1]);
		
	for($i=1;$i<sizeof($tbg);$i++){
		if($i==$tm){$popup .= '';}
		else{
			$popup .= '<!--item!-->'.$tbg[$i];$popups .= '<!--itemtabs!-->'.$tbgs[$i];}
	;}
	
	
}else if($_POST['ord'] and preg_match('/^[0-9]*$/', $_POST['ord']) and $tm){
	$insert=$_POST['ord'];
	$ultbg = explode('<!--filterhtml!-->',$filterhtml);
	$tbg = explode('<!--item!-->',$ultbg[1]);
	
	for($i=1;$i<sizeof($tbg);$i++){
		if($i==$insert){
		$popup .= '<!--item!-->'.$tbg[$tm].'<!--item!-->'.$tbg[$i];}
		else if($i==$tm){$popup .= '';}
		else{
		$popup .= '<!--item!-->'.$tbg[$i];}
	;}

}else if($_POST[title] and $tm){

	$ultbg = explode('<!--filterhtml!-->',$filterhtml);
	$tbg = explode('<!--item!-->',$ultbg[1]);
	
	
	for($i=1;$i<sizeof($tbg);$i++){
		if($i==$tm){
		
			if($_POST[titlebg]){
			$bgtheme = 'b';
			if(strpos($_POST[titlebg],'http://')!==false or strpos($_POST[titlebg],'https://')!==false){$images = '';}else{$images = 'images/';}
			if(strlen($_POST[titlebg])==1){$bghtml = '';$bgtheme = htmlspecialchars($_POST[titlebg]);}		
			else if(strpos($_POST[titlebg],'#')!==false or strpos($_POST[titlebg],'rgba(')!==false  or strpos($_POST[titlebg],'rgb(')!==false){$bghtml = 'background-color:'.htmlspecialchars($_POST[titlebg]).';';}
			else if(strpos($_POST[titlebg],'[xy]')!==false and $_POST[typ]!='divider'){$bghtml = 'background-image:url('.$images.htmlspecialchars($_POST[titlebg]).');';}
			else if($_POST[typ]!='divider'){$bghtml = 'background-image:url('.$images.htmlspecialchars($_POST[titlebg]).');background-size:100%;background-repeat:repeat-y;';}
			;}else{$bghtml = '';if($_POST[typ]=='item'){$bgtheme = 'w';}else{$bgtheme = 'x';};}
	
			
			if($_POST[wsp])$wsp = 'white-space:normal;';
			$popup .= '<!--item!--><!--data'.htmlspecialchars($_POST[typ]).'@#@'.htmlspecialchars($_POST[wsp]).'@#@'.htmlspecialchars($_POST[title]).'@#@'.htmlspecialchars($_POST[titlebg]).'@#@'.htmlspecialchars($_POST[tclr]).'@#@'.htmlspecialchars($_POST[borderbg]).'data!--><li '.$divider.'><a href="#" ';
			if($_POST[borderbg]=='none'){$dividerborderbg = 'border:none;';}else if($_POST[borderbg]){$dividerborderbg = 'border-color:'.htmlspecialchars($_POST[borderbg]).';';}else{$dividerborderbg = '';}
			if($_POST[typ]=='item'){$popup .= 'data-vlu="" class="ui-btn ui-btn-'.$bgtheme.' ui-btn-icon-left"';}else{$popup .= 'class="ui-btn ui-btn-'.$bgtheme.'"';}
			if($dividerborderbg or $wsp or $bghtml or $_POST[tclr])$popup .= ' style="'.$dividerborderbg.$wsp.$bghtml.';';
			if($_POST[tclr])$popup .= 'color:'.htmlspecialchars($_POST[tclr]).';';
			if($dividerborderbg or $wsp or $bghtml or $_POST[tclr])$popup .= '"';
			$popup .= '>'.htmlspecialchars($_POST[title]).'</a></li>';}
		else{$popup .= '<!--item!-->'.$tbg[$i];}
	;}



}else if($_POST[title] and !$tm){
	if($_POST[titlebg]){
			$bgtheme = 'b';
			if(strpos($_POST[titlebg],'http://')!==false or strpos($_POST[titlebg],'https://')!==false){$images = '';}else{$images = 'images/';}
			if(strlen($_POST[titlebg])==1){$bghtml = '';$bgtheme = htmlspecialchars($_POST[titlebg]);}		
			else if(strpos($_POST[titlebg],'#')!==false or strpos($_POST[titlebg],'rgba(')!==false  or strpos($_POST[titlebg],'rgb(')!==false){$bghtml = 'background-color:'.htmlspecialchars($_POST[titlebg]).';"';}
			else if(strpos($_POST[titlebg],'[xy]')!==false and $_POST[typ]!='divider'){$bghtml = 'background-image:url('.$images.htmlspecialchars($_POST[titlebg]).');';}
			else if($_POST[typ]!='divider'){$bghtml = 'background-image:url('.$images.htmlspecialchars($_POST[titlebg]).');background-size:100%;background-repeat:repeat-y;';}
	;}else{$bghtml = '';if($_POST[typ]=='item'){$bgtheme = 'w';}else{$bgtheme = 'x';};}
	
	$popup .= '<!--item!--><!--data'.htmlspecialchars($_POST[typ]).'@#@'.htmlspecialchars($_POST[wsp]).'@#@'.htmlspecialchars($_POST[title]).'@#@'.htmlspecialchars($_POST[titlebg]).'@#@'.htmlspecialchars($_POST[tclr]).'@#@'.htmlspecialchars($_POST[borderbg]).'data!--><li '.$divider.'><a href="#" ';
	if($_POST[wsp])$wsp = 'white-space:normal;';
	if($_POST[borderbg]=='none'){$dividerborderbg = 'border:none;';}else if($_POST[borderbg]){$dividerborderbg = 'border-color:'.htmlspecialchars($_POST[borderbg]).';';}else{$dividerborderbg = '';}
	if($_POST[typ]=='item'){$popup .= 'data-vlu="" class="ui-btn ui-btn-'.$bgtheme.' ui-btn-icon-left"';}else{$popup .= 'class="ui-btn ui-btn-'.$bgtheme.'"';}
	if($dividerborderbg or $wsp or $bghtml or $_POST[tclr])$popup .= ' style="'.$dividerborderbg.$wsp.$bghtml.';';
	if($_POST[tclr])$popup .= 'color:'.htmlspecialchars($_POST[tclr]).';';
	if($dividerborderbg or $wsp or $bghtml or $_POST[tclr])$popup .= '"';
	$popup .= '>'.htmlspecialchars($_POST[title]).'</a></li>';
	
	$popup = $ultbg[1].$popup;
	
}////if($_POST[dlt] and $owlnbr){


if($roww[theme]){$theme = $roww[theme];}else{$theme = '';}
			
			if($roww[bg]){$roww[bg]=str_replace('/','',$roww[bg]);$roww[bg]=str_replace('\\','',$roww[bg]);$roww[bg]=str_replace('..','',$roww[bg]);}
			
			if(strpos($roww[bg],'http://')!==false or strpos($roww[bg],'https://')!==false){$images = '';}else{$images = 'images/';}
			
			if(strpos($roww[bg],'#')!==false or strpos($roww[bg],'rgba(')!==false  or strpos($roww[bg],'rgb(')!==false){$bghtml = 'background-color:'.htmlspecialchars($roww[bg]).';';}
			else if(strpos($roww[bg],'[xy]')!==false){$bghtml = 'background-image:url('.$images.htmlspecialchars($roww[bg]).');';}
			else{$bghtml = 'background-image:url('.$images.htmlspecialchars($roww[bg]).');background-size:100%;background-repeat:repeat-y;';}
	
			if($roww[bg]){$bgstyle = ' style="'.$bghtml.'"';}else{$bgstyle = '';}
			
			$webpopup = '<div data-role="page" id="web'.$ap.'" class="page" data-theme="'.htmlspecialchars($theme).'" '.$bgstyle.'><div  class="ui-content pagebg">';
			if($roww[style]=='app')$webpopup .= '<div data-role="controlgroup" class="plft" data-type="horizontal" data-corners="false"><a href="#'.$ap.'panel" data-rel="panel" class="menubg ui-btn ui-btn-y ui-btn-inline ui-mini ui-btn-icon-left ui-icon-bars">WEBMENU</a></div><!--panel!--><div id="'.$pj.$ap.'imgspop" data-theme="z" style="padding:5px;" data-role="popup" data-corners="false"><a href="#" data-rel="back" class="popn ui-btn ui-btn-z ui-btn-icon-notext ui-icon-delete"></a><div class="ifrspinn" style="position:relative;left:50%;width:100%">Loading...<BR><img src="css/images/ajax-loader.gif"></div><div class="imgspop"><img src=""></div></div>
		<div id="'.$pj.$ap.'ifrspop" data-theme="z" data-role="popup" data-corners="false" style="overflow-y:auto;" class="ifrwidthpn" ><a href="#" data-rel="back" class="popn ui-btn ui-btn-z ui-btn-icon-notext ui-icon-delete"></a><div class="ifrspinn" style="position:relative;left:50%;width:100%">Loading...<BR><img src="css/images/ajax-loader.gif"></div><iframe src="" style="width:100%" seamless frameBorder="0" ></iframe></div>
		<div class="ui-content" id="'.$pj.$ap.'pVideo" data-corners="false" data-role="popup" data-theme="x" data-tolerance="2,2"><iframe width="498" height="298" src="" seamless=""></iframe></div><div id="'.$pj.$ap.'pAudio" data-corners="false"  data-role="popup" style="color:black;background-color:rgba(255, 255, 255, 0.8);padding:5px;" class="ifrwidthps"><a href="#" data-rel="back" class="popn ui-btn ui-btn-z ui-btn-icon-notext ui-icon-delete"></a><BR><BR><i id="'.$pj.$ap.'audtn" ></i> &nbsp;<i  ></i><br><a href="#"  id="'.$pj.$ap.'playaudion" data-vlu="" style="border:none;" class="ui-btn ui-btn-w"><img style="width:50px" src="css/images/sound.svg"></a><BR><input id="'.$pj.$ap.'volmn" type="range" data-role="none" value="0.8"  step="0.1" min="0" max="1"><BR><input id="'.$pj.$ap.'toposn" type="range" data-role="none" value="0" step="0.1" min="0" max="1"><audio id="'.$pj.$ap.'audsn"><source src="" type="audio/mpeg"><source src="" type="audio/wav"></audio><div class="ifrspinn" style="position:relative;left:50%;width:100%">Loading...<BR><img src="css/images/ajax-loader.gif"></div></div>';
			if($roww[style]=='page')$webpopup .= '<a href="#" data-rel="back" class="menubgs plft ui-btn ui-btn ui-btn-inline ui-mini ui-btn-icon-left ui-icon-carat-l">WEBMENUS</a>';
			
			if($tl){$html = file_get_contents('../panel/'.$roww[pjnbr].'/'.$ap.'.html');$htmls = '';}
			
			
			if(!$_POST[vtitle]){$vtitle = ' ui-btn-icon-left ui-icon-search">&nbsp;';}else{$vtitle = htmlspecialchars($_POST[vtitle]);
				if(strpos($_POST[vtitle],'[icon]')==true){$vtitle =  ' ui-btn-icon-left ui-icon-search">'.str_replace('[icon]','',htmlspecialchars($_POST[vtitle]));}
				else{$vtitle =  '">'.htmlspecialchars($_POST[vtitle]);}
			;}	
			if(!$_POST[vtitls]){$vtitls = ' ui-btn-icon-left ui-icon-search">&nbsp;';}else{$vtitls = htmlspecialchars($_POST[vtitls]);
				if(strpos($_POST[vtitls],'[icon]')==true){$vtitls =  ' ui-btn-icon-left ui-icon-search">'.str_replace('[icon]','',htmlspecialchars($_POST[vtitls]));}
				else{$vtitls =  '">'.htmlspecialchars($_POST[vtitls]);}
			;}
			if(!$_POST[vtitln]){$vtitln = ' ui-btn-icon-left ui-icon-refresh">&nbsp;';}else{$vtitln = htmlspecialchars($_POST[vtitln]);
				if(strpos($_POST[vtitln],'[icon]')==true){$vtitln =  ' ui-btn-icon-left ui-icon-refresh">'.str_replace('[icon]','',htmlspecialchars($_POST[vtitln]));}
				else{$vtitln =  '">'.htmlspecialchars($_POST[vtitln]);}
			;}

			$popups = '<!--data'.htmlspecialchars($_POST[vtitls]).'@#@'.htmlspecialchars($_POST[vtitle]).'@#@'.htmlspecialchars($_POST[vtitln]).'@#@'.htmlspecialchars($_POST[vtitlm]).'@#@'.htmlspecialchars($_POST[vtitlebg]).'@#@'.htmlspecialchars($_POST[vtclr]).'@#@'.htmlspecialchars($_POST[poptitlebg]).'@#@'.htmlspecialchars($_POST[popvtclr]).'@#@'.htmlspecialchars($_POST[popbgclr]).'data!--><div id="'.$pj.$ap.'gridlistview'.$pn.'"></div><div class="ui-grid-solo gridlistview">&nbsp;&nbsp;<a href="#'.$pj.$ap.'filter'.$pn.'" data-rel="popup" ';
			
			if($_POST[vtitlebg] and $_POST[vtclr]){$popups .= 'style="background-color:'.htmlspecialchars($_POST[vtitlebg]).';color:'.htmlspecialchars($_POST[vtclr]).';"';}
			else if($_POST[vtitlebg]){$popups .= 'style="background-color:'.htmlspecialchars($_POST[vtitlebg]).';"';}
			else if($_POST[vtclr]){$popups .= 'style="color:'.htmlspecialchars($_POST[vtclr]).';"';}
			
			$popups .= 'class="ui-btn ui-btn-w ui-btn-inline'.$vtitls.'</a><a href="#" id="'.$pj.$ap.'filters'.$pn.'" ';
			
			if($_POST[vtitlebg] and $_POST[vtclr]){$popups .= 'style="background-color:'.htmlspecialchars($_POST[vtitlebg]).';color:'.htmlspecialchars($_POST[vtclr]).';"';}
			else if($_POST[vtitlebg]){$popups .= 'style="background-color:'.htmlspecialchars($_POST[vtitlebg]).';"';}
			else if($_POST[vtclr]){$popups .= 'style="color:'.htmlspecialchars($_POST[vtclr]).';"';}
			
			$popups .= 'class="ui-btn ui-btn-w ui-btn-inline'.$vtitln.'</a>';
			
			if($_POST[poptitlebg] and $_POST[popvtclr]){$vpop = 'style="background-color:'.htmlspecialchars($_POST[poptitlebg]).';color:'.htmlspecialchars($_POST[popvtclr]).';"';}
			else if($_POST[poptitlebg]){$vpop = 'style="background-color:'.htmlspecialchars($_POST[poptitlebg]).';"';}
			else if($_POST[popvtclr]){$vpop = 'style="color:'.htmlspecialchars($_POST[popvtclr]).';"';}
			
			
			if($_POST[popbgclr]){
			$bgtheme = 'a';
			if(strpos($_POST[popbgclr],'http://')!==false or strpos($_POST[popbgclr],'https://')!==false){$images = '';}else{$images = 'images/';}
			if(strlen($_POST[popbgclr])==1){$bghtml = '';$bgtheme = htmlspecialchars($_POST[popbgclr]);}		
			else if(strpos($_POST[popbgclr],'#')!==false or strpos($_POST[popbgclr],'rgba(')!==false or strpos($_POST[popbgclr],'rgb(')!==false){$bghtml = 'background-color:'.htmlspecialchars($_POST[popbgclr]).';';}
			else if(strpos($_POST[popbgclr],'[xy]')!==false and $_POST[typ]!='divider'){$bghtml = 'background-image:url('.$images.htmlspecialchars($_POST[popbgclr]).');';$bgtheme = 'z';}
			else{$bghtml = 'background-image:url('.$images.htmlspecialchars($_POST[popbgclr]).');background-size:100%;background-repeat:repeat-y;';$bgtheme = 'z';}
			;}else{$bghtml = '';$bgtheme = 'a';}
			
			$popups .= '<div id="'.$pj.$ap.'filter'.$pn.'" data-role="popup" data-corners="false" data-theme="'.$bgtheme.'" style="'.$bghtml.'padding:5px;height: 100%;width: 100%;top:0;left:-15px;" class="ifrwidthps">';
			if($_POST[vtitlm])$popups .= '<a href="#" '.$vpop.' class="vtitlm ui-btn ui-btn-w ui-btn-inline">'.str_replace('[icon]','',htmlspecialchars($_POST[vtitlm])).'</a>';
			
			$popups .= '<a href="#" '.$vpop.' class="ui-btn ui-btn-w ui-btn-inline'.$vtitle.'</a><a href="#" data-rel="back" class="popn ui-btn ui-btn-z ui-btn-icon-notext ui-icon-delete"></a><ul data-role="listview"  class="webkitm" style="overflow-y:auto;width:80%"><!--filterhtml!-->'.$popup.'<!--filterhtml!--></ul></div>';
			
			


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
			$webpopup .= $html.'<!--part'.$pn.'!--><!--sysfiltersys!-->'.$vnts.$popups.'</div>'.$vntsn.$tabnbgdatns.$htmls;
			$webpopup .= '</div><!--content!--></div><!--page!-->';
			
		 	
			
			$fpagtrns='../panel/'.$roww[pjnbr].'/'.$ap.'.html';
			file_put_contents($fpagtrns,$html.'<!--part'.$pn.'!--><!--sysfiltersys!-->'.$vnts.$popups.'</div>'.$vntsn.$tabnbgdatns.$htmls);

			$fpagtrns='../panel/'.$roww[pjnbr].'/web'.$ap.'.html';
			file_put_contents($fpagtrns,$webpopup);


			if(!file_exists('../panel/'.$roww[pjnbr].'/web'.$ap.'.js')){
			$fpagtrns='../panel/'.$roww[pjnbr].'/web'.$ap.'.js';
			$js = '/*$(document).on(\'pageshow\', \'#web'.$ap.'\', function(){*/';
			$js .= '/*});*/';
			file_put_contents($fpagtrns,$js);			
			;}
			
			$jsweb = file_get_contents('../panel/'.$roww[pjnbr].'/web'.$ap.'.js');
				$jswebs=explode('/*webjs'.$pn.'*/',$jsweb);
				$jsweb = $jswebs[0].$jswebs[2];
			$js = '/*webjs'.$pn.'*/'
				.'$("#'.$pj.$ap.'filter'.$pn.'").find("ul").height(windowHeight*0.88);
				$("#'.$pj.$ap.'filter'.$pn.'").find("ul > li > a").click(function (event){event.preventDefault();
				var $gridlistview = $("#'.$pj.$ap.'gridlistview'.$pn.'");
				var fitlervlu = $gridlistview.data("filter");if(!fitlervlu)fitlervlu="";var $this=$(this);
				if($this.attr("data-vlu")){
					$this.removeClass("ui-icon-check").attr("data-vlu","");
					fitlervlu = fitlervlu.replace("[data-filtertext*="+$this.html()+"]","");
					$gridlistview.data("filter",fitlervlu);
				}else{
					$this.addClass("ui-icon-check").attr("data-vlu","1");
					$gridlistview.data("filter",fitlervlu+"[data-filtertext*="+$this.html()+"]");
				}		
				});';
			if($_POST[vtitlm])$js .= '$("#'.$pj.$ap.'filter'.$pn.'").find(".vtitlm").click(function (event){event.preventDefault();	
				$(this).find("ul > li > a").removeClass("ui-icon-check").attr("data-vlu","");
				var fitlervlu = $("#'.$pj.$ap.'gridlistview'.$pn.'").data("filter","");
				});';
			$js .= '$("#'.$pj.$ap.'filter'.$pn.'").find(".ui-icon-search").click(function (event){event.preventDefault();	
				var fitlervlu = $("#'.$pj.$ap.'gridlistview'.$pn.'").data("filter");
				if(document.URL.indexOf("pj=") === -1){
					if(fitlervlu){$("#p'.$ap.'").find("li[data-filtertext]").hide();$("#p'.$ap.'").find("li"+fitlervlu).show();$("#'.$pj.$ap.'filter'.$pn.'").popup("close");}
				}else{
					if(fitlervlu){$("li[data-filtertext]").hide();$("li"+fitlervlu).show();$("#'.$pj.$ap.'filter'.$pn.'").popup("close");}
				;}
				});
				$("#'.$pj.$ap.'filters'.$pn.'").click(function (event){event.preventDefault();
				if(document.URL.indexOf("pj=") === -1){$("#p'.$ap.'").find("li[data-filtertext]").show();}else{$("li[data-filtertext]").show();}
				});'
				.'/*webjs'.$pn.'*/'
				.'/*});*/';
				$jsweb=str_replace('/*});*/',$js,$jsweb);
				file_put_contents('../panel/'.$roww[pjnbr].'/web'.$ap.'.js',$jsweb);
			
			
	if(($_POST['ord']==' ' or !$_POST['ord']) and !$_POST[dlt])$tmp = '&tm='.htmlspecialchars($tm);
	echo "<meta http-equiv='refresh' content='0;URL=filter.php?ap=".htmlspecialchars($roww[ap])."&pj=".htmlspecialchars($roww[pjnbr])."&pn=".htmlspecialchars($pn).$tmp."'>";
;}

?>
	
