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
	<link href="../css/appsystem.css" rel="stylesheet"><link href="../css/icons/style.css" rel="stylesheet">
	<style type="text/css">
	
	</style>
	<script src="../js/jquery.js"></script>
	<script src="../js/jquery.mobile-1.4.4.min.js"></script>
	<script src="../js/tabs.js"></script>

</head>
<body>
<div data-role="page" data-theme="f" class="page">
	<div style="overflow: hidden;" data-role="header" data-theme="f">
	<a href="#navigations"  id="menubttn"  data-rel="popup" data-transition="pop" class="ui-btn ui-btn ui-btn-inline ui-corner-all ui-btn-icon-left ui-icon-bars"><?php if($_SESSION[tn]==PRC){echo '目录';}else if($_SESSION[tn]==EN){echo 'Menu';}else{echo '目錄';}?></a>
    <h1><?php if($_SESSION[tn]==PRC){echo '标签 - AppMoney712 移动应用设计系统';}else if($_SESSION[tn]==EN){echo 'Tabs - AppMoney712 APP Creation System';}else{echo '標簽 - AppMoney712 移動應用設計系統';}?></h1>
	
	</div><!-- /header -->

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
			
							
			$tabsn = explode($pj.$ap.'tabjs'.$pn.'">',$tabshtml);
			$tabsnvlu = explode('<!--addtabs!-->',$tabsn[1]);
			$popups = $tabsnvlu[0];
		
			$tabsnvlu = 0;
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
				$copyvlu[$i]= $tbgvlu[7]; if($copyvlu[$i] and !$copy)$copy=1;
				
				$imgv1vlu[$i]= $tbgvlu[8];
				$imgv2vlu[$i]= $tbgvlu[9];
				$imgv3vlu[$i]= $tbgvlu[10];
				$imgv4vlu[$i]= $tbgvlu[11];
				$imgv5vlu[$i]= $tbgvlu[12];
				$imgv6vlu[$i]= $tbgvlu[13];
				$imgv7vlu[$i]= $tbgvlu[14];
				$imgv8vlu[$i]= $tbgvlu[15];
				$tabsvlu[$i]= $tbgvlu[16];if($tabsvlu[$i] > $tabsnvlu)$tabsnvlu = $tabsvlu[$i];

			
			;} 
			;}
	?>		
	<div data-role="content">
	
	<?php if($ap){?>
	
	<a href="webpage.php?pj=<?php echo htmlspecialchars($roww[pjnbr]) ?>&ap=<?php echo htmlspecialchars($roww[ap])?>" data-ajax="false" class="ui-btn ui-btn ui-btn-inline ui-corner-all ui-btn-icon-left ui-icon-carat-l">&nbsp;</a>&nbsp;&nbsp;&nbsp;&nbsp;<?php if(sizeof($tbg)>=3){?><a href="#view" data-rel="popup" data-transition="pop" class="ui-btn ui-btn-inline ui-corner-all ui-mini ui-btn-icon-left ui-icon-search"><?php if($_SESSION[tn]==PRC){echo '预览';}else if($_SESSION[tn]==EN){echo 'Preview';}else{echo '預覽';}?></a>
	<?php ;}//if(sizeof($tbg)>1){?>	
	<div data-role="popup" id="view">
	<ul data-role="listview" data-corners="false" data-inset="true">
	<li><a href="view.php?pj=<?php echo htmlspecialchars($roww[pjnbr])?>&ap=<?php echo htmlspecialchars($roww[ap])?>&vw=ap" data-ajax="false" target="_blank" class="ui-btn ui-btn-inline ui-mini ui-btn-icon-left ui-icon-search"><?php if($_SESSION[tn]==PRC){echo '预览应用页内容形式';}else if($_SESSION[tn]==EN){echo 'Page content of APP style[Preview]';}else{echo '預覽應用頁內容形式';}?></a></li>
	<li><a href="view.php?pj=<?php echo htmlspecialchars($roww[pjnbr])?>&ap=<?php echo htmlspecialchars($roww[ap])?>&vw=ap&ts=1" data-ajax="false" target="_blank" class="ui-btn ui-btn-inline ui-mini ui-btn-icon-left ui-icon-search"><?php if($_SESSION[tn]==PRC){echo '预览应用页内容形式';}else if($_SESSION[tn]==EN){echo 'Page content of APP style[Preview]';}else{echo '預覽應用頁內容形式';}?><?php if($_SESSION[tn]==PRC){echo '[触控式] [使用webkit型浏览器]';}else if($_SESSION[tn]==EN){echo '[Touch screen] [using any webkit browser]';}else{echo '[觸控式] [使用webkit型瀏覽器]';}?></a></li>
	<li><a href="viewp.php?pj=<?php echo htmlspecialchars($roww[pjnbr])?>&ap=<?php echo htmlspecialchars($roww[ap])?>" data-ajax="false" target="_blank" class="ui-btn ui-btn-inline ui-mini ui-btn-icon-left ui-icon-search"><?php if($_SESSION[tn]==PRC){echo '预览popup形式';}else if($_SESSION[tn]==EN){echo 'content of popup style[Preview]';}else{echo '預覽popup形式';}?></a></li>
	<li><a href="viewp.php?pj=<?php echo htmlspecialchars($roww[pjnbr])?>&ap=<?php echo htmlspecialchars($roww[ap])?>&ts=1" data-ajax="false" target="_blank" class="ui-btn ui-btn-inline ui-mini ui-btn-icon-left ui-icon-search"><?php if($_SESSION[tn]==PRC){echo '预览popup形式';}else if($_SESSION[tn]==EN){echo 'content of popup style[Preview]';}else{echo '預覽popup形式';}?><?php if($_SESSION[tn]==PRC){echo '[触控式] [使用webkit型浏览器]';}else if($_SESSION[tn]==EN){echo '[Touch screen] [using any webkit browser]';}else{echo '[觸控式] [使用webkit型瀏覽器]';}?></a></li>
	<!--<li><a href="view.php?pj=<?php echo htmlspecialchars($roww[pjnbr])?>&ap=<?php echo htmlspecialchars($roww[ap])?>&vw=s" data-ajax="false" target="_blank" class="ui-btn ui-btn-inline ui-mini ui-btn-icon-left ui-icon-search"><?php if($_SESSION[tn]==PRC){echo '预览單頁形式';}else if($_SESSION[tn]==EN){echo 'single page style[Preview]';}else{echo '預覽單頁形式';}?></a></li>!-->
	</ul>
	</div>
	
		
	<a href="menudesign.php?pj=<?php echo htmlspecialchars($roww[pjnbr])?>&ap=<?php echo $ap?>&pn=<?php echo $pn?>&php=tabs&plt=1" data-ajax="false" class="ui-btn ui-btn ui-btn-inline ui-corner-all ui-mini ui-btn-icon-left ui-icon-bars"><?php if($_SESSION[tn]==PRC){echo '专案应用页列表';}else if($_SESSION[tn]==EN){echo 'Project Page List';}else{echo '專案應用頁列表';}?></a>
	<?php ;}?>
	
	<a href="#try" data-rel="popup" data-transition="pop" class="ui-btn ui-btn-f ui-btn-inline ui-corner-all ui-mini" style="color:BLACK"><span class="pigss-pencil" style="color:red"></span><?php if($_SESSION[tn]==PRC){echo '快速试用';}else if($_SESSION[tn]==EN){echo 'Quick try';}else{echo '快速試用';}?></a>
		<div data-role="popup" id="try" data-position-to="window" data-theme="f" class="ifrwidth"><a href="#" data-rel="back" class="popn ui-btn ui-btn-z ui-btn-icon-notext ui-icon-delete"></a><BR><BR>
		<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '预备相片';}else if($_SESSION[tn]==EN){echo 'Photo preparation';}else{echo '預備相片';}?></b> &nbsp;<?php if($_SESSION[tn]==PRC){echo '您须预备二张相片[横向]并存於panel/'.$roww[pjnbr].'/images。';}else if($_SESSION[tn]==EN){echo 'You need to prepare two landscape photos and place them to the folder panel/'.$roww[pjnbr].'/images.';}else{echo '您須預備二張相片[橫向]並存於panel/'.$roww[pjnbr].'/images。';}?></p>	
		
		<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '项目填写';}else if($_SESSION[tn]==EN){echo 'Item information';}else{echo '項目填寫';}?></b> &nbsp;<?php if($_SESSION[tn]==PRC){echo '在\'添加相片 URL\'填写首张相片档名,填写\'标题\'并提送。点撀\'再增加新数据\',重覆以上步骤键入另一相片资料。';}else if($_SESSION[tn]==EN){echo 'You need to enter photo filename to Add Picture URL and fill in the title and then click the SEND button. You can click the Add new data and repeat the above steps to enter second photo information.';}else{echo '在\'添加相片 URL\'填寫首張相片檔名,填寫\'標題\'並提送。點撀\'再增加新數據\',重覆以上步驟鍵入另一相片資料。';}?></p>	
		<HR>
		<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '试用';}else if($_SESSION[tn]==EN){echo 'Testing';}else{echo '試用';}?></b> &nbsp;
	<?php if($_SESSION[tn]==PRC){echo '当巳设置二个数据,您须点撀此页上的预览,再进行测试。再修改及选用不同设置再预览并试用。';}else if($_SESSION[tn]==EN){echo 'After completion of the two data entries, you need to click the above preview button to test your design. You can enter or select different parameters to test their functions and effects.';}else{echo '當巳設置二個數據,您須點撀此頁上的預覽,再進行測試。再修改及選用不同設置再預覽並試用。';}?></p>	
		
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
	<?php if($_SESSION[tn]==PRC){echo '标签创建';}else if($_SESSION[tn]==EN){echo 'Tabs Creating';}else{echo '標簽創建';}
	if($tm)echo '<span style="color:black">['.htmlspecialchars($tm).']</span>';?>  
	

	<?php if($tl)$tln = '&tl='.$tl;?>
	

	<FORM action="tabs.php?pj=<?php echo htmlspecialchars($roww[pjnbr]) ?>&ap=<?php echo htmlspecialchars($roww[ap]) ?>&tm=<?php echo htmlspecialchars($tm) ?>&pn=<?php echo htmlspecialchars($pn).$tln ?>" id="webxls" method="post" data-ajax="false" >
	<div class="ui-grid-a"><div class="ui-block-a" style="width:75%">
	<?php if($_SESSION[tn]==PRC){echo '添加相片 URL';}else if($_SESSION[tn]==EN){echo 'Add Picture URL';}else{echo '添加相片 URL';}?>
	<input type="text" name="img" placeholder="URL" value="<?php echo htmlspecialchars($imgvlu[$tm])?>" required>
	</div><div class="ui-block-b" style="width:25%"><br>
	<input name="copy" id="copy" value="1" type="checkbox" <?php if($copyvlu[$tm])echo 'checked="checked"';?>><label for="copy"><?php if($_SESSION[tn]==PRC){echo '複制';}else if($_SESSION[tn]==EN){echo 'Direct copy';}else{echo '複制';}?></label>
	</div></div>
	
	<div class="ui-grid-a"><div class="ui-block-a"><?php if($_SESSION[tn]==PRC){echo '标题';}else if($_SESSION[tn]==EN){echo 'Title';}else{echo '標題';}?><input type="text" name="imgtitle" placeholder="" value="<?php echo htmlspecialchars($imgtitlevlu[$tm])?>" required>
	</div><div class="ui-block-b"><?php if($_SESSION[tn]==PRC){echo '內容';}else if($_SESSION[tn]==EN){echo 'Textarea';}else{echo '內容';}?><input type="text" name="imgftr" placeholder="" value="<?php echo htmlspecialchars($imgftrvlu[$tm])?>"></div></div>
	<div class="ui-grid-a"><div class="ui-block-a"><?php if($_SESSION[tn]==PRC){echo '标题区背景颜色';}else if($_SESSION[tn]==EN){echo 'Background color of title area';}else{echo '標題區背景顏色';}?><input type="text" name="imgtbg" placeholder="" value="<?php echo htmlspecialchars($imgtbgvlu[$tm])?>"></div><div class="ui-block-b"><?php if($_SESSION[tn]==PRC){echo '內容背景颜色';}else if($_SESSION[tn]==EN){echo 'Textarea background color';}else{echo '內容背景顏色';}?>
	<input type="text" name="imgftrbg" placeholder="" value="<?php echo htmlspecialchars($imgftrbgvlu[$tm])?>"></div></div>
	
	<div class="ui-grid-a"><div class="ui-block-a"><?php if($_SESSION[tn]==PRC){echo '标题颜色';}else if($_SESSION[tn]==EN){echo 'Title color';}else{echo '標題顏色';}?><input type="text" name="imgtclr" placeholder="" value="<?php echo htmlspecialchars($imgtclrvlu[$tm])?>"></div><div class="ui-block-b"><?php if($_SESSION[tn]==PRC){echo '內容颜色';}else if($_SESSION[tn]==EN){echo 'Textarea color';}else{echo '內容顏色';}?><input type="text" name="imgclr" placeholder="" value="<?php echo htmlspecialchars($imgclrvlu[$tm])?>"></div></div>
	<?php if($tm){?>

	<hr>
	<?php ;}//if(){?>
	<hr>
	<?php if($_SESSION[tn]==PRC){echo '数据';}else if($_SESSION[tn]==EN){echo 'Data';}else{echo '數據';}?>
	<div class="ui-grid-c"><div class="ui-block-a"><input type="text" name="imgv1" placeholder="" value="<?php echo htmlspecialchars($imgv1vlu[$tm])?>"></div>
	<div class="ui-block-b"><input type="text" name="imgv2" placeholder="" value="<?php echo htmlspecialchars($imgv2vlu[$tm])?>"></div>
	<div class="ui-block-c"><input type="text" name="imgv3" placeholder="" value="<?php echo htmlspecialchars($imgv3vlu[$tm])?>"></div>
	<div class="ui-block-d"><input type="text" name="imgv4" placeholder="" value="<?php echo htmlspecialchars($imgv4vlu[$tm])?>"></div>
	<div class="ui-block-a"><input type="text" name="imgv5" placeholder="" value="<?php echo htmlspecialchars($imgv5vlu[$tm])?>"></div>
	<div class="ui-block-b"><input type="text" name="imgv6" placeholder="" value="<?php echo htmlspecialchars($imgv6vlu[$tm])?>"></div>
	<div class="ui-block-c"><input type="text" name="imgv7" placeholder="" value="<?php echo htmlspecialchars($imgv7vlu[$tm])?>"></div>
	<div class="ui-block-d"><input type="text" name="imgv8" placeholder="" value="<?php echo htmlspecialchars($imgv8vlu[$tm])?>"></div></div>
	
	<input type="hidden" name="guanyin1" value="<?php if(!$_POST[guanyin1])$_SESSION[guanyin1]=rand();
	echo htmlspecialchars($_SESSION[guanyin1]); ?>">
	<div class="ui-grid-b"><div class="ui-block-a">

	<input type="submit" name="submit" id="webxlsbtn" Value="<?php if($_SESSION[tn]==PRC){echo '送交';}else if($_SESSION[tn]==EN){echo 'SEND';}else{echo '送交';}?>">
	</div><div class="ui-block-b">
<a href="#inf" data-rel="popup" data-transition="pop" class="ui-btn ui-btn-b ui-btn-inline ui-corner-all ui-mini">? <?php if($_SESSION[tn]==PRC){echo '解释';}else if($_SESSION[tn]==EN){echo 'Explanation';}else{echo '解釋';}?></a>
	<div data-role="popup" id="inf" data-position-to="window" data-theme="f" style="padding:5px;" class="ifrwidthps"><a href="#" data-rel="back" class="popn ui-btn ui-btn-z ui-btn-icon-notext ui-icon-delete"></a>
	<h4 style="color:black">url</h4>
	<p><?php if($_SESSION[tn]==PRC){echo '以上url是相片丶应用页丶特定网页及视频。';}else if($_SESSION[tn]==EN){echo 'The above url item can be picture, APP page, specific Internet web page and video.';}else{echo '以上url是相片、應用頁、特定網頁及視頻。';}?></p>	
	<p><?php if($_SESSION[tn]==PRC){echo '对於相片URL,设置特定相片称能令相片显示100%符合特定标签内容区的高度,格式是相片称[1].png,e.g. picture[1].png。';}else if($_SESSION[tn]==EN){echo 'For picture URL, the picture can be showed 100% fitting to specific height of tab content by specific filename format - filename[1].png, e.g. picture[1].png.';}else{echo '對於相片URL,設置特定相片稱能令相片顯示100%符合特定標簽內容區的高度,格式是相片稱[1].png,e.g. picture[1].png。';}?></p>	
	<p><?php if(!$roww[pjnbr])$roww[pjnbr] = '?';
	if($_SESSION[tn]==PRC){echo '使用应用内的图像,档案须存於panel/'.$roww[pjnbr].'/images档夹内。';}else if($_SESSION[tn]==EN){echo 'If you use the APP pictures, you need to prepare pictures and store them in  panel/'.$roww[pjnbr].'/images folder.';}else{echo '使用應用內的圖像,檔案須存於panel/'.$roww[pjnbr].'/images檔夾內。';}?>	</p>	
	<HR>
	<h4 style="color:black"><?php if($_SESSION[tn]==PRC){echo '複制';}else if($_SESSION[tn]==EN){echo 'Direct copy';}else{echo '複制';}?></h4>

	<p><?php if($_SESSION[tn]==PRC){echo '若内容是简单文字内容[应用页]或细相片[存於应用内],您能点选此项,不用以内嵌形式显示。';}else if($_SESSION[tn]==EN){echo 'If tab content is simple words [an APP page] or small picture [in APP images folder], you can select this item and the content does not need to be inside a iframe.';}else{echo '若內容是簡單文字內容[應用頁]或細相片[存於應用內],您能點選此項,不用以內嵌形式顯示。';}?></p>
	<p><?php if($_SESSION[tn]==PRC){echo '您须使用应用页[不设panel菜单]创建上述的应用页[简单内容]。您能使用功能\'文字编辑器\'进行创建,您能在此页顶的\'专案应用页列表\'找到应用页的档名。';}else if($_SESSION[tn]==EN){echo 'You need to create the above mentioned APP page [simple content] by using page style - APP page [no panel]. You can edit text content by the function Content Editor and find the file name of APP page you created in the above Project Page List.';}else{echo '您須使用應用頁[不設panel菜單]創建上述的應用頁[簡單內容]。您能使用功能\'文字編輯器\'進行創建,您能在此頁頂的\'專案應用頁列表\'找到應用頁的檔名。';}?></p>
	<p><?php if($_SESSION[tn]==PRC){echo '若修改上述该应用页内容,您亦须在此页提送一次该项才能相应修改。';}else if($_SESSION[tn]==EN){echo 'If you amend the above mentioned APP page, you need to send the data of related item once to take the amendment effective.';}else{echo '若修改上述該應用頁內容,您亦須在此頁提送一次該項才能相應修改。';}?></p>
	<hr>
	<h4 style="color:black"><?php if($_SESSION[tn]==PRC){echo '使用';}else if($_SESSION[tn]==EN){echo 'Use';}else{echo '使用';}?></h4>
	<p><?php if($_SESSION[tn]==PRC){echo '在移动设备使用应只加简单的标题及內容。';}else if($_SESSION[tn]==EN){echo 'You can add simple words only due to mobile phone usage.';}else{echo '在細屏設備使用應只加簡單的標題及內容。';}?></p><hr>
	<h4 style="color:black"><?php if($_SESSION[tn]==PRC){echo '标题';}else if($_SESSION[tn]==EN){echo 'Title';}else{echo '標題';}?></h4>
	<p><?php if($_SESSION[tn]==PRC){echo '是标签按钮的标题,应只加简单文字。您能按内容相关颜色方法填写背景及文字颜色。';}else if($_SESSION[tn]==EN){echo 'It is about the title of tab buttons. You need to add simple words. You can follow the below method for its background and text color.';}else{echo '是標簽按鈕的標題,應只加簡單文字。您能按內容相關顏色方法填寫背景及文字顏色。';}?></p>
	<hr>
	<h4 style="color:black"><?php if($_SESSION[tn]==PRC){echo '內容';}else if($_SESSION[tn]==EN){echo 'Content';}else{echo '內容';}?></h4>
	<p><?php if($_SESSION[tn]==PRC){echo '是标签内容底部的文字内容。您能填上rgb颜色码e.g. rgb(125,125,125), rgba颜色码e.g. rgba(125,125,125,0.5) 或 hex颜色码e.g. #123456,作为背景颜色,填HTML颜色码作为文字颜色,e.g. #123456。';}else if($_SESSION[tn]==EN){echo 'It is footer content of tab content. You can add rgb color code e.g. rgb(125,125,125), rgba color code e.g. rgba(125,125,125,0.5) or hex color code e.g. #123456 for background color and html color code for text color e.g. #123456. ';}else{echo '是標簽內容底部的文字內容。您能填上rgb顏色碼e.g. rgb(125,125,125), rgba顏色碼e.g. rgba(125,125,125,0.5) 或 hex顏色碼e.g. #123456,作為背景顏色,填HTML顏色碼作為文字顏色,e.g. #123456。';}?></p><hr>
	<h4 style="color:black"><?php if($_SESSION[tn]==PRC){echo '修改标签';}else if($_SESSION[tn]==EN){echo 'Amend Tabs Data';}else{echo '修改標簽';}?></h4>
	<p><?php if($_SESSION[tn]==PRC){echo '当存有项目,项目将在下面列出,点撀相关数据进行修改丶插入[改次序,以编号作准]或删除。';}else if($_SESSION[tn]==EN){echo 'An item list will be showed on the below section. You can click the related data title to amend, insert[re-order by number] or delete.';}else{echo '當存有項目,項目將在下面列出,點撀相關數據進行修改、插入[改次序,以編號作準]或刪除。';}?></p>	
	<HR>
	<h4 style="color:black"><?php if($_SESSION[tn]==PRC){echo '数据';}else if($_SESSION[tn]==EN){echo 'Data';}else{echo '數據';}?></h4>
	<p><?php if($_SESSION[tn]==PRC){echo '此功能须配合特定的伺服器网页,是用户点撀标签按钮将数据传送到该网页。';}else if($_SESSION[tn]==EN){echo 'You need to use a web pape in a specific Internet or Intranet server in this function to receive data by clicking tab buttons.';}else{echo '此功能須配合特定的伺服器網頁,是用戶點撀標簽按鈕將數據傳送到該網頁。';}?></p>	
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
	</select><?php ;}?></div><div class="ui-block-e"><?php if($tm){?><input name="dlt" id="dlt" type="checkbox" data-theme="e" ><label for="dlt"><?php if($_SESSION[tn]==PRC){echo '刪除';}else if($_SESSION[tn]==EN){echo 'Delete';}else{echo '刪除';}?></label><?php ;}//if(!$pn){?></div></div>
	</FORM>
<hr>
<?php
if(sizeof($tbg)){
echo '<div data-role="listview" data-inset="true">';}
for($i=1;$i<sizeof($tbg);$i++){
echo '<li data-icon="edit"><a href="tabs.php?ap='.htmlspecialchars($roww[ap]).'&pj='.htmlspecialchars($roww[pjnbr]).'&pn='.htmlspecialchars($pn).'&tm='.$i.'" data-ajax="false">';
echo  '['.$i.']&nbsp;&nbsp;&nbsp;';
echo  htmlspecialchars($imgvlu[$i]);
if($imgtitlevlu[$i])echo  '<br>'.htmlspecialchars($imgtitlevlu[$i]);
echo '</a></li>';
;}
if(sizeof($tbg))echo '</div>';
?>
<hr>
	<?php 
	if($tabshtml and sizeof($tbg) >= 3){
	if($_SESSION[tn]==PRC){echo '您的设计';}else if($_SESSION[tn]==EN){echo 'Your design';}else{echo '您的設計';}
	$ntabshtml = str_replace('(images/','(../panel/'.$roww[pjnbr].'/images/',$tabshtml);
	$ntabshtml = str_replace('<iframe src="','<iframe src="../panel/'.$roww[pjnbr].'/',$ntabshtml);
	echo '<br>'.str_replace('"images/','"../panel/'.$roww[pjnbr].'/images/',$ntabshtml);
		
if(file_exists('../panel/'.$roww[pjnbr].'/web'.$ap.'.js')){
	$jswebn = file_get_contents('../panel/'.$roww[pjnbr].'/web'.$ap.'.js');
	$jswebn=explode('/*webjs'.$pn.'*/',$jswebn);
	echo '<script> $(document).on("pageshow", ".page", function(){'.$jswebn[1].';});</script>';
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
  <div class="ui-body-k" id="tab1">
    <iframe src="" class="ifrwidth" seamless frameBorder="0"></iframe>
	<div class="ftrbg" style="background-color:rgba(255,255,255,0.5)"><div style="color:red"><?php if($_SESSION[tn]==PRC){echo '內容';}else if($_SESSION[tn]==EN){echo 'textarea';}else{echo '內容';}?></div></div>
  </div>
  <div class="ui-body-f" style="overflow-x:hidden; height:150px;" id="tab2"><?php if($_SESSION[tn]==PRC){echo '相片或网页';}else if($_SESSION[tn]==EN){echo 'picture/web page';}else{echo '相片或網頁';}?>sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss </div>
<div class="ui-body-f" style="overflow-x:hidden; height:550px;" id="tab3">
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
	
	
	if($_POST[img] and !$tm){$tabsnvls = $tabsnvlu+1;}else{$tabsnvls = $tabsvlu[$tm];}
	
	if(($popups or $_POST[copy]) and !$_POST[dlt]){	
				if(strpos($tabshtml,'<!--itemtabs'.$tabsnvls.'!-->')!==false){
					$itemtabshtm = explode('<!--itemtabs'.$tabsnvls.'!-->',$tabshtml);
					$itemtabshtml = '<!--itemtabs'.$tabsnvls.'!-->'.$itemtabshtm[1].'<!--itemtabs'.$tabsnvls.'!-->';					
				;}
		if(strpos($_POST[img],'http://')==false and strpos($_POST[img],'https://')==false){
			if(strpos($_POST[img],'.html')!==false and file_exists('../panel/'.$roww[pjnbr].'/'.htmlspecialchars($_POST[img]))){		
				$popupsn = '<!--itemtabs'.$tabsnvls.'!--><div id="'.$pj.$ap.'tabjs'.$pn.'n'.$tabsnvls.'" class="ifrwidth webkitm" style="overflow-y:auto;display:none;">';
				$popupsn .= file_get_contents('../panel/'.$roww[pjnbr].'/'.htmlspecialchars($_POST[img]));
				$popupsn .= '</div><!--itemtabs'.$tabsnvls.'!-->';
			;}else{
				if(strpos($_POST[img],'[1]')==false)$hgt = 'style="height:100%"'; 
				$popupsn = '<!--itemtabs'.$tabsnvls.'!--><div id="'.$pj.$ap.'tabjs'.$pn.'n'.$tabsnvls.'" class="ifrwidth webkitm" style="overflow:auto;display:none;"><img '.$hgt.' src="images/'.htmlspecialchars($_POST[img]).'"/></div><!--itemtabs'.$tabsnvls.'!-->';
			;}
		}else{
			$popupsn = '';
		;}
	}

if($_POST[dlt] and $tm){
	$tabshtml = str_replace('data-tabsn="'.($tabsnvlu[0]).'"','data-tabsn="'.($tabsnvlu[0]-1).'"',$tabshtml);
	$tbg = str_replace('<!--systabssys!-->','',$tabshtml);
	
	$ultbg = explode('</ul></div>',$tbg);
	
	$tbg = explode('<!--item!-->',$ultbg[0]);
	$popup = str_replace('<div class="swiper-slide"><div id="'.$pj.$ap.'vnts'.$pn.'" class="vntsns vtnn">','',$tbg[0]);
	
	for($i=1;$i<sizeof($tbg);$i++){
		if($i==$tm){$popup .= '';
		$rm = explode('<div id="'.$pj.$ap.'tabjs'.$pn.'n'.$tabsnvls.'"',$popups);
		$rmn = explode('<!--itemtabs'.$tabsnvls.'!-->',$rm[1]);
		$popups = $rm[0].$rmn[1];
		}
		else{$popup .= '<!--item!-->'.$tbg[$i];}
	;}
	
	if($tm==1 and $copyvlu[2])$tabsjsn = 1; //js

	if($imgclrvlu[1]){$imgclrvlustyle = 'style="color:'.htmlspecialchars($imgclrvlu[1]).'"';}else{$imgclrvlustyle = '';}
	if($imgftrbgvlu[1]){$imgftrbgvlustyle = 'style="background-color:'.htmlspecialchars($imgftrbgvlu[1]).'"';}else{$imgftrbgvlustyle = '';}
		
	$popup = $popup.'</ul></div><div id="'.$pj.$ap.'tabs'.$pn.'"><iframe src="" id="'.$pj.$ap.'tabs'.$pn.'ifr" class="ifrwidth" style="display:none" seamless frameBorder="0"></iframe><div class="ifrwidth" style="overflow:auto;"><img  style="display:none;" src=""/></div><div class="ifrspinn" style="position:relative;left:50%;width:100%">Loading...<BR><img src="css/images/ajax-loader.gif"></div><div class="ftrbg" '.$imgftrbgvlustyle.'><div '.$imgclrvlustyle.'>'.htmlspecialchars($imgftrvlu[1]).'</div></div></div><div id="'.$pj.$ap.'tabjs'.$pn.'">'.$popups = str_replace($itemtabshtml,'',$popups).'<!--addtabs!--><div class="ftrbg" '.$imgftrbgvlustyle.'><div '.$imgclrvlustyle.'>'.htmlspecialchars($imgftrvlu[1]).'</div></div></div></div>';
	
}else if($_POST['ord'] and preg_match('/^[0-9]*$/', $_POST['ord']) and $tm){
	$insert=$_POST['ord'];
	$tbg = str_replace('<!--systabssys!-->','',$tabshtml);
	$ultbg = explode('</ul></div>',$tbg);
	
	$tbg = explode('<!--item!-->',$ultbg[0]);
	$popup = str_replace('<div class="swiper-slide"><div id="'.$pj.$ap.'vnts'.$pn.'" class="vntsns vtnn">','',$tbg[0]);
	
	for($i=1;$i<sizeof($tbg);$i++){
		if($i==$insert){  if($tm==1 and $copyvlu[2])$tabsjsn = 1; if($insert==1 and $copyvlu[$tm])$tabsjsn = 1;//js 
			$popup .= '<!--item!-->'.$tbg[$tm].'<!--item!-->'.$tbg[$i];}
		else if($i==$tm){$popup .= '';}
		else{
		$popup .= '<!--item!-->'.$tbg[$i];}
	;}
	
	if($imgclrvlu[1]){$imgclrvlustyle = 'style="color:'.htmlspecialchars($imgclrvlu[1]).'"';}else{$imgclrvlustyle = '';}
	if($imgftrbgvlu[1]){$imgftrbgvlustyle = 'style="background-color:'.htmlspecialchars($imgftrbgvlu[1]).'"';}else{$imgftrbgvlustyle = '';}

	$popup = $popup.'</ul></div><div id="'.$pj.$ap.'tabs'.$pn.'"><iframe src="" id="'.$pj.$ap.'tabs'.$pn.'ifr" class="ifrwidth" style="display:none" seamless frameBorder="0"></iframe><div class="ifrwidth" style="overflow:auto;"><img  style="display:none;" src=""/></div><div class="ifrspinn" style="position:relative;left:50%;width:100%">Loading...<BR><img src="css/images/ajax-loader.gif"></div><div class="ftrbg" '.$imgftrbgvlustyle.'><div '.$imgclrvlustyle.'>'.htmlspecialchars($imgftrvlu[1]).'</div></div></div><div id="'.$pj.$ap.'tabjs'.$pn.'">'.$popups.'<!--addtabs!--><div class="ftrbg" style="background-color:'.htmlspecialchars($imgftrbgvlu[1]).'"><div '.$imgclrvlustyle.'>'.htmlspecialchars($imgftrvlu[1]).'</div></div></div></div>';
}else if($_POST[img] and $tm){

	
	
	$data = '<!--data'.htmlspecialchars($_POST[img]).'@#@'.htmlspecialchars($_POST[imgtitle]).'@#@'.htmlspecialchars($_POST[imgftr]).'@#@'.htmlspecialchars($_POST[imgtbg]).'@#@'.htmlspecialchars($_POST[imgftrbg]).'@#@'.htmlspecialchars($_POST[imgtclr]).'@#@'.htmlspecialchars($_POST[imgclr]).'@#@'.htmlspecialchars($_POST['copy']).'@#@'.htmlspecialchars($_POST[imgv1]).'@#@'.htmlspecialchars($_POST[imgv2]).'@#@'.htmlspecialchars($_POST[imgv3]).'@#@'.htmlspecialchars($_POST[imgv4]).'@#@'.htmlspecialchars($_POST[imgv5]).'@#@'.htmlspecialchars($_POST[imgv6]).'@#@'.htmlspecialchars($_POST[imgv7]).'@#@'.htmlspecialchars($_POST[imgv8]).'@#@'.$tabsnvls.'data!-->';
	
	$tbg = str_replace('<!--systabssys!-->','',$tabshtml);
	$ultbg = explode('</ul></div>',$tbg);
	
	$tbg = explode('<!--item!-->',$ultbg[0]);
	$popup = str_replace('<div class="swiper-slide"><div id="'.$pj.$ap.'vnts'.$pn.'" class="vntsns vtnn">','',$tbg[0]);
	
	for($i=1;$i<sizeof($tbg);$i++){
		if($i==$tm){
			if(!$_POST[imgclr])$_POST[imgclr] ='red';
			if(strpos($_POST[img],'http://')!==false or strpos($_POST[img],'https://')!==false or  strpos($_POST[img],'.html')!==false){$images = '';}else{$images = 'images/';}
			if($_POST[imgv1]){
				$vlu = 'data-vlu="[\''.htmlspecialchars($_POST[imgv1]).'\',';
				if($_POST[imgv2])$vlu .= '\''.htmlspecialchars($_POST[imgv2]).'\',';
				if($_POST[imgv3])$vlu .= '\''.htmlspecialchars($_POST[imgv3]).'\',';
				if($_POST[imgv4])$vlu .= '\''.htmlspecialchars($_POST[imgv4]).'\',';
				if($_POST[imgv5])$vlu .= '\''.htmlspecialchars($_POST[imgv5]).'\',';
				if($_POST[imgv6])$vlu .= '\''.htmlspecialchars($_POST[imgv6]).'\',';
				if($_POST[imgv7])$vlu .= '\''.htmlspecialchars($_POST[imgv7]).'\',';
				if($_POST[imgv8])$vlu .= '\''.htmlspecialchars($_POST[imgv8]).'\'';
				$vlu .= ']"';
				if(!$_POST[imgv8])$vlu = str_replace("',]","']",$vlu);
			;}else{$vlu = '';}
			
			if($_POST[imgtbg]){$imgtbg = 'background-color:'.htmlspecialchars($_POST[imgtbg]).';';}else{$imgtbg = '';}
			if($_POST[imgtclr]){$imgtclr = 'color:'.htmlspecialchars($_POST[imgtclr]).';';}else{$imgtclr = '';}
			
			if($popupsn and $_POST[copy]){
			$popup .= '<!--item!-->'.$data.'<li><a href="#'.$pj.$ap.'tabjs'.$pn.'" class="'.$pj.$ap.'tabjn'.$pn.'" data-url="'.trim($tabsnvls).'" data-ftr="'.htmlspecialchars($_POST[imgftr]).'" data-ftrbg="'.htmlspecialchars($_POST[imgftrbg]).'" data-ftrw="'.$_POST[imgclr].'" style="'.$imgtbg.$imgtclr.'border:none;">'.htmlspecialchars($_POST[imgtitle]).'</a></li>';
			;}else{
			$popup .= '<!--item!-->'.$data.'<li><a href="#'.$pj.$ap.'tabs'.$pn.'" class="'.$pj.$ap.'tabjs'.$pn.'" data-url="'.$images.htmlspecialchars(trim($_POST[img])).'" data-ftr="'.htmlspecialchars($_POST[imgftr]).'" data-ftrbg="'.htmlspecialchars($_POST[imgftrbg]).'" data-ftrw="'.$_POST[imgclr].'" '.$vlu.' style="'.$imgtbg.$imgtclr.'border:none;">'.htmlspecialchars($_POST[imgtitle]).'</a></li>';
			;}
			
			if($copyvlu[$tm]){
			$rm = explode('<div id="'.$pj.$ap.'tabs'.$pn.'n'.$tabsnvls.'"',$popups);
			$rmn = explode('<!--itemtabs'.$tabsnvls.'!-->',$rm[1]);
			$popups = $rm[0].$rmn[1];
			}
		
			if($popupsn and $_POST[copy]){$popups = str_replace($itemtabshtml,'',$popups).$popupsn;}else{$popups = str_replace($itemtabshtml,'',$popups);}
			
			}
		else{$popup .= '<!--item!-->'.$tbg[$i];}
	;}
	
		if($imgftrbgvlu[1]){$imgftrbgvlubg = ' style="color:'.htmlspecialchars($imgftrbgvlu[1]).';"';}else{$imgftrbgvlubg = '';}
		if($imgclrvlu[1]){$imgclrvluclr = ' style="color:'.htmlspecialchars($imgclrvlu[1]).';"';}else{$imgclrvluclr = '';}

	$popup = $popup.'</ul></div><div id="'.$pj.$ap.'tabs'.$pn.'"><iframe src="" id="'.$pj.$ap.'tabs'.$pn.'ifr" class="ifrwidth" style="display:none" seamless frameBorder="0"></iframe><div class="ifrwidth" style="overflow:auto;"><img  style="display:none;" src=""/></div><div class="ifrspinn" style="position:relative;left:50%;width:100%">Loading...<BR><img src="css/images/ajax-loader.gif"></div><div class="ftrbg"'.$imgftrbgvlubg.'><div'.$imgclrvluclr.'>'.htmlspecialchars($imgftrvlu[1]).'</div></div></div><div id="'.$pj.$ap.'tabjs'.$pn.'">'.$popups.'<!--addtabs!--><div class="ftrbg" '.$imgftrbgvlubg.'><div'.$imgclrvluclr.'>'.htmlspecialchars($imgftrvlu[1]).'</div></div></div></div>';

}else if($_POST[img] and !$tm){
	$tabshtml = str_replace('<!--systabssys!-->','',$tabshtml);
	if(!$_POST[imgclr])$_POST[imgclr] ='red';
	
	$data = '<!--data'.htmlspecialchars($_POST[img]).'@#@'.htmlspecialchars($_POST[imgtitle]).'@#@'.htmlspecialchars($_POST[imgftr]).'@#@'.htmlspecialchars($_POST[imgtbg]).'@#@'.htmlspecialchars($_POST[imgftrbg]).'@#@'.htmlspecialchars($_POST[imgtclr]).'@#@'.htmlspecialchars($_POST[imgclr]).'@#@'.htmlspecialchars($_POST['copy']).'@#@'.htmlspecialchars($_POST[imgv1]).'@#@'.htmlspecialchars($_POST[imgv2]).'@#@'.htmlspecialchars($_POST[imgv3]).'@#@'.htmlspecialchars($_POST[imgv4]).'@#@'.htmlspecialchars($_POST[imgv5]).'@#@'.htmlspecialchars($_POST[imgv6]).'@#@'.htmlspecialchars($_POST[imgv7]).'@#@'.htmlspecialchars($_POST[imgv8]).'@#@'.($tabsnvlu+1).'data!-->';
	
	
	
	if($popupsn)$tabshtml = str_replace('<!--addtabs!-->',$popupsn.'<!--addtabs!-->',$tabshtml);
	
	if(strpos($_POST[img],'http://')!==false or strpos($_POST[img],'https://')!==false or  strpos($_POST[img],'.html')!==false){$images = '';}else{$images = 'images/';}
				if($_POST[imgv1]){
				$vlu = 'data-vlu="[\''.htmlspecialchars($_POST[imgv1]).'\',';
				if($_POST[imgv2])$vlu .= '\''.htmlspecialchars($_POST[imgv2]).'\',';
				if($_POST[imgv3])$vlu .= '\''.htmlspecialchars($_POST[imgv3]).'\',';
				if($_POST[imgv4])$vlu .= '\''.htmlspecialchars($_POST[imgv4]).'\',';
				if($_POST[imgv5])$vlu .= '\''.htmlspecialchars($_POST[imgv5]).'\',';
				if($_POST[imgv6])$vlu .= '\''.htmlspecialchars($_POST[imgv6]).'\',';
				if($_POST[imgv7])$vlu .= '\''.htmlspecialchars($_POST[imgv7]).'\',';
				if($_POST[imgv8])$vlu .= '\''.htmlspecialchars($_POST[imgv8]).'\'';
				$vlu .= ']"';
				if(!$_POST[imgv8])$vlu = str_replace("',]","']",$vlu);
			;}else{$vlu = '';}
			
			if($popupsn and $_POST['copy']){$href = $pj.$ap.'tabjs'.$pn;}else{$href = $pj.$ap.'tabs'.$pn;}
			if($_POST[imgtbg]){$imgtbg = 'background-color:'.htmlspecialchars($_POST[imgtbg]).';';}else{$imgtbg = '';}
			if($_POST[imgtclr]){$imgtclr = 'color:'.htmlspecialchars($_POST[imgtclr]).';';}else{$imgtclr = '';}
	$popup .= '<!--item!-->'.$data.'<li><a href="#'.$href.'" class="'.$pj.$ap.'tabjs'.$pn.'" data-url="'.$images.htmlspecialchars(trim($_POST[img])).'" data-ftr="'.htmlspecialchars($_POST[imgftr]).'" data-ftrbg="'.htmlspecialchars($_POST[imgftrbg]).'" data-ftrw="'.$_POST[imgclr].'" '.$vlu.' style="'.$imgtbg.$imgtclr.'border:none;">'.htmlspecialchars($_POST[imgtitle]).'</a></li>';
	
	

	if($tabshtml){
	$popup = str_replace('</ul>',$popup.'</ul>',$tabshtml);
	}else{	
	
	if($imgftrbgvlu[1]){$imgftrbgvlubg = ' style="color:'.htmlspecialchars($imgftrbgvlu[1]).';"';}else{$imgftrbgvlubg = '';}
	if($imgclrvlu[1]){$imgclrvluclr = ' style="color:'.htmlspecialchars($imgclrvlu[1]).';"';}else{$imgclrvluclr = '';}
		
	$popup = '<div data-role="tabs"><div data-role="navbar"><ul>'.$popup.'</ul></div><div id="'.$pj.$ap.'tabs'.$pn.'"><iframe src="" id="'.$pj.$ap.'tabs'.$pn.'ifr" class="ifrwidth" style="display:none" seamless frameBorder="0"></iframe><div class="ifrwidth" style="overflow:auto;"><img  style="display:none;" src=""/></div><div class="ifrspinn" style="position:relative;left:50%;width:100%">Loading...<BR><img src="css/images/ajax-loader.gif"></div><div class="ftrbg" style="background-color:"><div style="color:"></div></div></div><div id="'.$pj.$ap.'tabjs'.$pn.'">'.$popups.'<!--addtabs!--><div class="ftrbg"'.$imgftrbgvlubg.'><div'.$imgclrvluclr .'>'.htmlspecialchars($imgftrvlu[1]).'</div></div></div></div>';
	$tabsjsn = 1;
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
			
			if(($copyvlu[1] and !$_POST[dlt] and !$_POST['ord']) or $tabsjsn){$tabsjs .= ';tabjn("'.$pj.'","#'.$pj.$ap.'tabjs'.$pn.'",$(".'.$pj.$ap.'tabjn").first(),windowHeight);';}
			else{$tabsjs .= ';tabjs("'.$pj.'","#'.$pj.$ap.'tabs'.$pn.'",$(".'.$pj.$ap.'tabjs'.$pn.'").first(),"",windowWidth,windowHeight);';}

			$tabsjs .= ';$(".'.$pj.$ap.'tabjs'.$pn.'").click(function(event){ tabjs("'.$pj.'","#'.$pj.$ap.'tabs'.$pn.'",$(this),"1",windowWidth,windowHeight);});';
			if($popups)$tabsjs .= ';$(".'.$pj.$ap.'tabjn").click(function(event){ tabjn("'.$pj.'","#'.$pj.$ap.'tabjs'.$pn.'",$(this),windowHeight);});';


			if(!file_exists('../panel/'.$roww[pjnbr].'/web'.$ap.'.js')){
			$fpagtrns='../panel/'.$roww[pjnbr].'/web'.$ap.'.js';
			$js = '/*$(document).on(\'pageshow\', \'#web'.$ap.'\', function(){*/';
			$js .= '/*});*/';
			file_put_contents($fpagtrns,$js);			
			;}
			
			if($tabsjs){
			$jsweb = file_get_contents('../panel/'.$roww[pjnbr].'/web'.$ap.'.js');
				
				$jswebs=explode('/*webjs'.$pn.'*/',$jsweb);
				$jsweb = $jswebs[0].$jswebs[2];
				
				$js = '/*webjs'.$pn.'*/'
				.$tabsjs
				.'/*webjs'.$pn.'*/'
				.'/*});*/';
				$jsweb=str_replace('/*});*/',$js,$jsweb);
				file_put_contents('../panel/'.$roww[pjnbr].'/web'.$ap.'.js',$jsweb);	
			;}	
			
	if(!$tm){$tmp = '&tm='.htmlspecialchars($tabsnvlu[0]+1);}
	else if(($_POST['ord']==' ' or !$_POST['ord']) and !$_POST[dlt]){$tmp = '&tm='.htmlspecialchars($tm);}
	echo "<meta http-equiv='refresh' content='0;URL=tabs.php?ap=".htmlspecialchars($roww[ap])."&pj=".htmlspecialchars($roww[pjnbr])."&pn=".htmlspecialchars($pn).$tmp."'>";
;}

?>
	
