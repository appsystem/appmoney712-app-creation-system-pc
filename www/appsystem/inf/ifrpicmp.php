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
if($_GET[tg] and !preg_match('/^[0-9]*$/',$_GET[tg]))exit;
if($_GET[tg])$tg= $_GET[tg];
if($_GET[mp] and !preg_match('/^[0-9]*$/',$_GET[mp]))exit;
if($_GET[mp])$mp = $_GET[mp];
if($_GET[typ])$typ= $_GET[typ];

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
	<link href="../jscss/ifrpi.css" rel="stylesheet"><link rel="stylesheet" href="../jscss/animate.min.css">
	<link href="../css/appsystem.css" rel="stylesheet"><link rel="stylesheet" href="../css/spinners.css">
	<style type="text/css">
	</style>
	<script src="../js/jquery.js"></script>
	<script src="../js/jquery.mobile-1.4.4.min.js"></script>
	<script src="../js/jquery.nicescroll.min.js"></script>
	<script src="../js/ifrpics.js"></script>
	<script>
	function checkform ( form )
	{
	if (form.typ.value == "web" && form.web.value.indexOf('<?php echo $pj.$ap?>ifr<?php echo $pn?>p')!=-1) {
    alert("<?php if($_SESSION[tn]==PRC){echo '选用应用页导航,须点选专案应用页链结进行选择。';}else if($_SESSION[tn]==EN){echo 'You need to select the option on the Project APP Page for using APP page navigation.';}else{echo '選用應用頁導航,須點選專案應用頁鏈結進行選擇。';}?>" );
    form.web.focus();
    return false ;
 	}
	}
	</script>


</head>
<body>

<div data-role="page" data-theme="f" class="page">
	<div style="overflow: hidden;" data-role="header" data-theme="f">
	<a href="#navigations"  id="menubttn"  data-rel="popup" data-transition="pop" class="ui-btn ui-btn ui-btn-inline ui-corner-all ui-btn-icon-left ui-icon-bars"><?php if($_SESSION[tn]==PRC){echo '目录';}else if($_SESSION[tn]==EN){echo 'Menu';}else{echo '目錄';}?></a>
    <h1><?php if($_SESSION[tn]==PRC){echo 'Page iframe嵌入相片[按钮] - AppMoney712 移动应用设计系统';}else if($_SESSION[tn]==EN){echo 'Page iframe[embedded picture][button] - AppMoney712 APP Creation System';}else{echo '嵌入相片瀏覽 - AppMoney712 移動應用設計系統';}?></h1>
	
	</div><!-- /header -->
	

	
	<div data-role="content">

	
	<?php if($ap){?>
	<a href="ifrpicbtn.php?pj=<?php echo htmlspecialchars($roww[pjnbr]) ?>&ap=<?php echo htmlspecialchars($roww[ap])?>&pn=<?php echo htmlspecialchars($pn) ?>&tm=<?php echo htmlspecialchars($tm) ?>&tg=<?php echo htmlspecialchars($tg) ?>" data-ajax="false" class="ui-btn ui-btn ui-btn-inline ui-corner-all ui-btn-icon-left ui-icon-carat-l">&nbsp;</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="#view" data-rel="popup" data-transition="pop" class="ui-btn ui-btn-inline ui-corner-all ui-mini ui-btn-icon-left ui-icon-search"><?php if($_SESSION[tn]==PRC){echo '预览';}else if($_SESSION[tn]==EN){echo 'Preview';}else{echo '預覽';}?></a>
		
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
	
	
	
	<FORM action="ifrpicmp.php?pj=<?php echo htmlspecialchars($roww[pjnbr]) ?>&ap=<?php echo htmlspecialchars($roww[ap]) ?>&pn=<?php echo htmlspecialchars($pn) ?>&tm=<?php echo htmlspecialchars($tm) ?>&tg=<?php echo htmlspecialchars($tg) ?>&mp=<?php echo htmlspecialchars($mp) ?>&typ=<?php echo htmlspecialchars($typ) ?>" method="post" onSubmit="return checkform(this);"  data-ajax="false">
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

								
			$itemhtm = explode('<!--item',$ifrhtml);
			$itempntag = '<!--item'.$tm.'!-->';
				for($i=1;$i<sizeof($itemhtm);$i++){
					if(strpos('<!--item'.$itemhtm[$i],$itempntag)===false and !$itemifrhtml){$itemhtml .= '<!--item'.$itemhtm[$i];}
					else if(strpos('<!--item'.$itemhtm[$i],$itempntag)!==false){$itemifrhtml  = '<!--item'.$itemhtm[$i];}
					else{$itemhtmls .= '<!--item'.$itemhtm[$i];}
					
					$itemnbrs =	explode('id="',$itemhtm[$i]);
					$itemsnbr =	explode('"',$itemnbrs[1]);
					$itemnbr[$i] = $itemsnbr[0];
					
					$itemsrcs =	explode('data-img="',$itemhtm[$i]);
					$itemimgs =	explode('"',$itemsrcs[1]);
					$itemimg[$i] = $itemimgs[0];
					$itemimgnbr[$itemsnbr[0]] = $itemimgs[0];
					
					
				;}
				
			$itemifrhtmls =	explode('<!--ifritem',$itemifrhtml);
				for($i=1;$i<sizeof($itemifrhtmls);$i++){
					if($i==$tg){
					$tbgnvlu = explode('<!--ifrdata',$itemifrhtmls[$i]);
					$tbgsvlu = explode('ifrdata!-->',$tbgnvlu[1]);
					$tbgvlu = explode('@#@',$tbgsvlu[0]);
					$mpwebtitle= $tbgvlu[0];			
					$mpwebvlu = $tbgvlu[13];		
					}								
				;}				
			;}
			
			if($mpwebvlu){
				$mpwebvln = explode('[*]',$mpwebvlu);
				for($i=1;$i<sizeof($mpwebvln);$i++){
					$mpwebvlns = explode('[**]',$mpwebvln[$i]);
	
					$titlevlu[$i] = $mpwebvlns[0];
					$typvlu[$i] = $mpwebvlns[1];
					$bgclrvlu[$i] = $mpwebvlns[2];
					$thumbnvlu[$i] = $mpwebvlns[3];
					$phonevlu[$i] = $mpwebvlns[4];
					$mailvlu[$i] = $mpwebvlns[5];
					$webvlu[$i] = $mpwebvlns[6];
			
				;}		
			;}
	
	if($mpwebtitle){
	?>
	<hr>
	<?php if($_SESSION[tn]==PRC){echo '相片按钮标题';}else if($_SESSION[tn]==EN){echo 'Picture Button Title';}else{echo '相片按鈕標題';} echo ': '.htmlspecialchars($mpwebtitle);?>
	<?php ;}?>
	<hr>
	<div class="ui-grid-a"><div class="ui-block-a" style="width:65%">
	<?php if($_SESSION[tn]==PRC){echo '按钮标题';}else if($_SESSION[tn]==EN){echo 'Button Title';}else{echo '按鈕標題';}?>
	<input type="text" name="title" placeholder=""  value="<?php echo htmlspecialchars($titlevlu[$mp])?>" required>
	</div><div class="ui-block-b" style="width:35%">
<?php if($_SESSION[tn]==PRC){echo '数据型式';}else if($_SESSION[tn]==EN){echo 'Data type';}else{echo '數據型式';}?>
<select name="typ" style=" width:100%">
	<option value="title" <?php if($typvlu[$mp]=='title')echo 'selected=selected';?>><?php if($_SESSION[tn]==PRC){echo '标题';}else if($_SESSION[tn]==EN){echo 'Title';}else{echo '標題';}?></option>
	<option value="vw" <?php if($typvlu[$mp]=='vw')echo 'selected=selected';?>><?php if($_SESSION[tn]==PRC){echo '相片浏览';}else if($_SESSION[tn]==EN){echo 'Picture navigation';}else{echo '相片瀏覽';}?></option>
	<option value="mp"  <?php if($typvlu[$mp]=='mp' or $_GET[typ]=='mp')echo 'selected="selected"';?>><?php if($_SESSION[tn]==PRC){echo '电邮/电话按钮';}else if($_SESSION[tn]==EN){echo 'Email/phone button';}else{echo '電郵/電話按鈕';}?>
	<!--<option value="web"  <?php if($typvlu[$mp]=='web' or $_GET[typ]=='web')echo 'selected="selected"';?>><?php if($_SESSION[tn]==PRC){echo '应用页导航';}else if($_SESSION[tn]==EN){echo 'APP page navigation';}else{echo '應用頁導航';}?></option>!-->
	<option value="popup"  <?php if($typvlu[$mp]=='popup')echo 'selected="selected"';?>>popup</option>	
</select>
</div></div>
<div class="ui-grid-a"><div class="ui-block-a">
<?php if($_SESSION[tn]==PRC){echo '背景颜色';}else if($_SESSION[tn]==EN){echo 'Background color';}else{echo '背景顏色';}?>
<input name="bgclr" type="text" value="<?php echo htmlspecialchars($bgclrvlu[$mp]);?>">
</div><div class="ui-block-b">
<?php if($_SESSION[tn]==PRC){echo '图像';}else if($_SESSION[tn]==EN){echo 'Thumbnail';}else{echo '圖像';}?>
<input name="thumbn" type="text" value="<?php echo htmlspecialchars($thumbnvlu[$mp]);?>">
</div></div>

<div class="ui-grid-a">
<div class="ui-block-a">
<?php if($_SESSION[tn]==PRC){echo '电话号';}else if($_SESSION[tn]==EN){echo 'Phone number';}else{echo '電話號';}?>
<input name="phone" type="text" value="<?php echo htmlspecialchars($phonevlu[$mp]);?>">
</div><div class="ui-block-b">

<?php if($_SESSION[tn]==PRC){echo '电邮';}else if($_SESSION[tn]==EN){echo 'Email';}else{echo '電郵';}?>
<input name="mail" type="text" value="<?php echo str_replace('&amp;','&',htmlspecialchars($mailvlu[$mp]));?>">
</div></div>


<?php if($typvlu[$mp]=='web' or $_GET[typ]=='web'){?>
<?php if($_SESSION[tn]==PRC){echo '应用页';}else if($_SESSION[tn]==EN){echo 'APP page';}else{echo '應用頁';}?>
<?php ;}?>
<?php //if(!$typvlu[$mp])echo '/';?>
<?php if($typvlu[$mp]=='vw' or !$typvlu[$mp]){?>
<?php if($_SESSION[tn]==PRC){echo '相片链结';}else if($_SESSION[tn]==EN){echo 'Picture link';}else{echo '相片鏈結';}?>
<?php ;}?>
<?php if($typvlu[$mp]=='popup'){?>
<?php if($_SESSION[tn]==PRC){echo 'popup链结';}else if($_SESSION[tn]==EN){echo 'popup link';}else{echo 'popup鏈結';}?>
<?php ;}?>
<?php if($typvlu[$mp]!='title'){?>
<input name="web" id="web" type="text" value="<?php echo htmlspecialchars($webvlu[$mp]);?>">
<?php ;}?>
<!--<a href="#webhtml" data-rel="popup" class="ui-btn ui-btn-inline ui-corner-all ui-mini ui-btn-icon-left ui-icon-edit"><?php if($_SESSION[tn]==PRC){echo '专案应用页链结';}else if($_SESSION[tn]==EN){echo 'Link of Project APP Page';}else{echo '專案應用頁鏈結';}?></a>!-->
	<div id="webhtml" data-role="popup"  style="overflow-y:auto">
	<ul data-role="listview" data-inset="true">
	<?php 	$sql=$db->query("select * from webhtml where pjnbr='$pj' order by nbr,date desc");
	if($sql){
	while($row=$sql->fetch()){
	if($row[hidden]!=5){
	if($row[apn]){$htmlink = 'web'.htmlspecialchars($row[apn]);}else{$htmlink = 'web'.htmlspecialchars($row[ap]);}
	echo '<li><a href="#" class="webhtml ui-btn ui-mini ui-btn-icon-left ui-icon-edit" data-value="'.htmlspecialchars($htmlink).'">'.htmlspecialchars($htmlink).' ['.htmlspecialchars($row['date']).'] '.htmlspecialchars($row[title]).'</a></li>';
	;}
	;};}?>
	</ul>
	</div>


<a href="#webhtmls" data-rel="popup" class="ui-btn ui-btn-inline ui-corner-all ui-mini ui-btn-icon-left ui-icon-edit"><?php if($_SESSION[tn]==PRC){echo '相片浏览链结';}else if($_SESSION[tn]==EN){echo 'Existing Picture navigation';}else{echo '相片瀏覽鏈結';}?></a>
	<div id="webhtmls" data-role="popup"  style="overflow-y:auto">
	<ul data-role="listview" data-inset="true">
	<?php 	

	$jswebtn =	explode('ifrftnbtn',$ifrhtml);
	for($i=1;$i< sizeof($jswebtn);$i++){	
		$jswebtns =	explode('data-vlu="',$jswebtn[$i]);	
		$datavlu = explode('&&&',$jswebtns[1]);
		
		$jswebnn =	explode('id="',$jswebtn[$i]);	
		$jswebtnn = explode('"',$jswebnn[1]);
	
		
		if($itemimgnbr[$pj.$ap.$datavlu[2]]){
		echo '<li><a href="#" class="webhtmls ui-btn ui-mini ui-btn-icon-left ui-icon-edit" data-value="'.htmlspecialchars($jswebtnn[0]).'">';
		if($_SESSION[tn]==PRC){echo '相片 NO.';}else if($_SESSION[tn]==EN){echo 'Photo NO.';}else{echo '相片 NO.';}
		echo ' '.$pj.$ap.htmlspecialchars($datavlu[4]);
		//echo ' '.$pj.$ap.htmlspecialchars($datavlu[4]).' ['.str_replace('images/','',htmlspecialchars($itemimgnbr[$pj.$ap.$datavlu[2]])).'] ';
		//if($_SESSION[tn]==PRC){echo '至';}else if($_SESSION[tn]==EN){echo 'to';}else{echo '至';}
		echo ' ['.str_replace('images/','',htmlspecialchars($itemimgnbr[$pj.$ap.$datavlu[4]])).'] </a></li>';
		}
	;}
	
	
	?>
	
	</ul>
	</div>
	
	<input type="hidden" name="guanyin1" value="<?php if(!$_POST[guanyin1])$_SESSION[guanyin1]=rand();
	echo htmlspecialchars($_SESSION[guanyin1]); ?>">
	
	<div class="ui-grid-d"><div class="ui-block-a">
	<input type="submit" name="submit" id="webxlsbtn" class="ui-btn" value="<?php if($_SESSION[tn]==PRC){echo '送交';}else if($_SESSION[tn]==EN){echo 'SEND';}else{echo '送交';}?>"></div>
	<div class="ui-block-b">
	
	<a href="#infs" data-rel="popup" data-transition="pop" class="ui-btn ui-btn-b ui-btn-inline ui-corner-all ui-mini">? <?php if($_SESSION[tn]==PRC){echo '解释';}else if($_SESSION[tn]==EN){echo 'Explanation';}else{echo '解釋';}?></a>
	<div data-role="popup" id="infs" style="min-width:300px;max-width:85%" data-position-to="window" data-theme="f"><a href="#" class="ui-btn ui-corner-all ui-icon-delete ui-btn-icon-notext ui-btn-right" data-rel="back"></a>
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '确定设计';}else if($_SESSION[tn]==EN){echo 'Design confirmation';}else{echo '確定設計';}?></b>
	<?php if($_SESSION[tn]==PRC){echo '此页填妥的数据并未确实设计,您须到上一页再提送一次。';}else if($_SESSION[tn]==EN){echo 'Your design is not updated even you fill in or amend data on this page. You need to go to previous page to send data again.';}else{echo '此頁填妥的數據並未確實設計,您須到上一頁再提送一次。';}?></p><hr>
	
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '修改数据';}else if($_SESSION[tn]==EN){echo 'Amend data';}else{echo '修改數據';}?></b>
	<?php if($_SESSION[tn]==PRC){echo '按钮标题列在此页下面,点撀相关标题进行修改,改序或删除。';}else if($_SESSION[tn]==EN){echo 'The button title will be listed on this page. You need to click the related title to amend, reorder or delete data.';}else{echo '按鈕標題列在此頁下面,點撀相關標題進行修改,改序或刪除。';}?></p><hr>
	

	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '按钮标题';}else if($_SESSION[tn]==EN){echo 'Button title';}else{echo '按鈕標題';}?></b>
	<?php if($_SESSION[tn]==PRC){echo '是按钮的标题。此功能的按钮均显示在popup内。您能点撀\'您的设计\'预览设计。';}else if($_SESSION[tn]==EN){echo 'It is button title in popup. You can click \'Your design\' to preview the popup content designed.';}else{echo '是按鈕的標題。此功能的按鈕均顯示在popup內。您能點撀\'您的設計\'預覽設計。';}?></p><hr>
<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '按钮型式';}else if($_SESSION[tn]==EN){echo 'Button type';}else{echo '按鈕型式';}?></b>
	
	<!--<?php if($_SESSION[tn]==PRC){echo '标题型式只有文字显示。相片浏览型式是用户点撀按钮到另一相片,只能调用巳有的按钮,特效亦不相同。电邮/电话按钮限适用的移动电话应用。应用页导航是用户点撀到另一应用页。popup型形是用户点撀按钮显示popup内容,内容是相片丶应用页特定互联视频或网页内容。';}else if($_SESSION[tn]==EN){echo 'Title style is for showing words. Picture navigation is for going to next picture by APP user clicking on this styled button. Email/phone button is for appropriate mobile device only. APP page navigation is for going to a picture by APP user clicking on this styled button. Popup style is for showing a popup content by APP user clicking on popup button. The content can be words, picture, APP page, specific Internet video or web page.';}else{echo '標題型式只有文字顯示。相片瀏覽型式是用戶點撀按鈕到另一相片,只能調用巳有的按鈕,特效亦不相同。電郵/電話按鈕限適用的移動電話應用。應用頁導航是用戶點撀到另一應用頁。popup型形是用戶點撀按鈕顯示popup內容,內容是相片、應用頁特定互聯視頻或網頁內容。';}?>!-->
	
	<?php if($_SESSION[tn]==PRC){echo '标题型式只有文字显示。相片浏览型式是用户点撀按钮到另一相片,只能调用巳有的按钮,特效亦不相同。电邮/电话按钮限适用的移动电话应用。popup型形是用户点撀按钮显示popup内容,内容是相片丶应用页特定互联视频或网页内容。若显示应用内的相片,格式是images/相片档名,e.g. images/photo.png。';}else if($_SESSION[tn]==EN){echo 'Title style is for showing words. Picture navigation is for going to next picture by APP user clicking on this styled button. Email/phone button is for appropriate mobile device only. Popup style is for showing a popup content by APP user clicking on popup button. The content can be words, picture, APP page, specific Internet video or web page. If you need to use photo stored in APP, the entry format is images/photo filename, e.g. images/photo.png.';}else{echo '標題型式只有文字顯示。相片瀏覽型式是用戶點撀按鈕到另一相片,只能調用巳有的按鈕,特效亦不相同。電郵/電話按鈕限適用的移動電話應用。popup型形是用戶點撀按鈕顯示popup內容,內容是相片、應用頁特定互聯視頻或網頁內容。若顯示應用內的相片,格式是images/相片檔名,e.g. images/photo.png。';}?>
	</p>
	
	<p><?php if($_SESSION[tn]==PRC){echo '您亦能令用户开启浏览器浏览特定网页,e.g. pdf文件或地图。格式是[openbrowser]网页url,e.g. [openbrowser]http://???.?????.com/viewer?url=??????????word.pdf。此功能不能用电脑浏览器试用。';}else if($_SESSION[tn]==EN){echo 'You can open APP user device\'s specific browser to show specific Internet web page. e.g. pdf document or map. The format is [openbrowser]url of web page. e.g. [openbrowser]http://???.?????.com/viewer?url=??????????word.pdf.  You cannot preview it on your computer browser.';}else{echo '您亦能令用戶開啟瀏覽器瀏覽特定網頁,e.g. pdf文件或地圖。格式是[openbrowser]網頁url,e.g. [openbrowser]http://???.?????.com/viewer?url=??????????word.pdf。此功能不能用電腦瀏覽器試用。';}?></p>

	<p><?php if($_SESSION[tn]==PRC){echo '您亦能令用户开启合适应用浏览特定互联网或内联网文件,e.g. 用Acrobat Reader APP开启pdf文件。格式是[openapp]网页url,e.g. [openapp]http://???.?????.com/word.pdf。此功能不能用电脑浏览器试用。';}else if($_SESSION[tn]==EN){echo 'You can let APP users to open Internet/Intranet document by appropriate APP in their appropriate device. e.g. open pdf document by Acrobat Reader APP. The format is [openapp]document url. e.g. [openapp]http://???.?????.com/word.pdf.  You cannot preview it on your computer browser.';}else{echo '您亦能令用戶開啟合適應用瀏覽特定互聯網或內聯網文件,e.g. 用Acrobat Reader APP開啟pdf文件。格式是[openapp]網頁url,e.g. [openapp]http://???.?????.com/word.pdf。此功能不能用電腦瀏覽器試用。';}?></p>
	
	<p><?php if($_SESSION[tn]==PRC){echo '您亦能令用户开启设备巳安装的WHATSAPP APP,格式是whatsapp://??????????,并显示特定内容,对於IOS APP,您亦能使用相关社交分享的URL scheme, 能令用户的相关应用开启并使用特定功能,到本司网站有指引。此功能不能用电脑浏览器试用。';}else if($_SESSION[tn]==EN){echo 'You can open APP user device\'s WhatsAPP APP to use its specific function. e.g.whatsapp://??????????. Please refer to our website. For IOS APP, you can use the URL scheme of many social sharing media to open APP user device\'s related social sharing APPs and use their functions. Please refer to our website.  You cannot try it on your computer browser.';}else{echo '您亦能令用戶開啟設備巳安裝的WHATSAPP APP,格式是whatsapp://??????????,並顯示特定內容,對於IOS APP,您亦能使用相關社交分享的URL scheme, 能令用戶的相關應用開啟並使用特定功能,到本司網站有指引。此功能不能用電腦瀏覽器試用。';}?></p>
	<hr>
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '背景颜色';}else if($_SESSION[tn]==EN){echo 'Background color';}else{echo '背景顏色';}?></b> <?php if($_SESSION[tn]==PRC){echo '您能填上rgb颜色码e.g. rgb(125,125,125), rgba颜色码e.g. rgba(125,125,125,0.5) 或 hex颜色码e.g. #123456。';}else if($_SESSION[tn]==EN){echo 'You can add rgb color code e.g. rgb(125,125,125), rgba color code e.g. rgba(125,125,125,0.5) or hex color code e.g. #123456.';}else{echo '您能填上rgb顏色碼e.g. rgb(125,125,125), rgba顏色碼e.g. rgba(125,125,125,0.5) 或 hex顏色碼e.g. #123456。';}?></p><hr>

	
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '图像';}else if($_SESSION[tn]==EN){echo 'Thumbnail';}else{echo '圖像';}?></b> <?php if($_SESSION[tn]==PRC){echo '项目左边的方形图像,须使用应用内的图像,档案须存於panel/'.$roww[pjnbr].'/images档夹内。';}else if($_SESSION[tn]==EN){echo 'It is about the thumbnail of item. If you use the APP pictures, you need to prepare square pictures and store them in panel/'.$roww[pjnbr].'/images folder.';}else{echo '項目左邊的方形圖像,須使用應用內的圖像,檔案須存於panel/'.$roww[pjnbr].'/images檔夾內。';}?></p>
	<p><?php if($_SESSION[tn]==PRC){echo '若是使用用於浏览相片的相同相片,应按相片大小决定使用质量细小的相片,是影响用户初次使用的速度。';}else if($_SESSION[tn]==EN){echo 'If a picture for Picture navigation is also used as the thumbnail, you need to consider the size of it and prepare a smaller size to be better for initial starting speed.. ';}else{echo '若是使用用於瀏覽相片的相同相片,應按相片大小決定使用質量細小的相片,是影響用戶初次使用的速度。';}?></p>
	<hr>

	
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '电话号';}else if($_SESSION[tn]==EN){echo 'Phone number';}else{echo '電話號';}?></b> <?php if($_SESSION[tn]==PRC){echo '键入拨打电话的值。';}else if($_SESSION[tn]==EN){echo 'It is the value of dialing phone number.';}else{echo '鍵入撥打電話的值。';}?></p><hr>	
	
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '电邮';}else if($_SESSION[tn]==EN){echo 'Email';}else{echo '電郵';}?></b> <?php if($_SESSION[tn]==PRC){echo '若键入多个电邮,使用;号分隔。';}else if($_SESSION[tn]==EN){echo 'If you need enter many email addresses for a button, you need to use ; as separator.';}else{echo '若鍵入多個電郵,使用;號分隔。';}?></p>
	
	<p><?php if($_SESSION[tn]==PRC){echo '对於电邮按钮,您亦试加标题及内容,格式是email account?subject=subject content&body=body content。e.g. example@yahoo.com?subject=您的电邮标题&body=您的电邮内容。';}else if($_SESSION[tn]==EN){echo 'You need to try to add title and content value to email button. The format is email account?subject=subject content&body=body content. e.g example@yahoo.com?subject=your email title&body=your email content';}else{echo '對於電郵按鈕,您亦試加標題及內容,格式是email account?subject=subject content&body=body content。e.g. example@yahoo.com?subject=您的電郵標題&body=您的電郵內容';}?></p>
	<p><?php if($_SESSION[tn]==PRC){echo '您亦到访本司网站,有进一步指引或资讯。';}else if($_SESSION[tn]==EN){echo 'You can visit our website to get more information.';}else{echo '您亦到訪本司網站,有進一步指引或資訊。';}?></p>
	<hr>	
	<!--<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '应用页/相片链结';}else if($_SESSION[tn]==EN){echo 'APP page/Picture link';}else{echo '應用頁/相片鏈結';}?></b></p>
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '相片链结';}else if($_SESSION[tn]==EN){echo 'Picture link';}else{echo '相片鏈結';}?></b></p>!-->
	<!--<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '专案应用页链结';}else if($_SESSION[tn]==EN){echo 'Link of Project APP Page';}else{echo '專案應用頁鏈結';}?></b> <?php if($_SESSION[tn]==PRC){echo '点撀此按钮并作点选,能将相闗的值填到\'应用页/相片链结\'内。您不能添加任何内容。';}else if($_SESSION[tn]==EN){echo 'You can click this button to select an APP page. You cannot add any additional data to this item.';}else{echo '點撀此按鈕並作點選,能將相闗的值填到\'應用頁/相片鏈結\'內。您不能添加任何內容。';}?></p>!-->
	
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '相片浏览链结';}else if($_SESSION[tn]==EN){echo 'Existing Picture navigation';}else{echo '相片瀏覽鏈結';}?></b> <?php if($_SESSION[tn]==PRC){echo '点撀此按钮并作点选,能将相闗的值填到\'应用页/相片链结\'内。您不能添加任何内容。';}else if($_SESSION[tn]==EN){echo 'You can click this button to select an APP page. You cannot add any additional data to this item.';}else{echo '點撀此按鈕並作點選,能將相闗的值填到\'應用頁/相片鏈結\'內。您不能添加任何內容。';}?></p><hr>	
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '填写';}else if($_SESSION[tn]==EN){echo 'Fill in data';}else{echo '填寫';}?></b></p>
	<p><?php if($_SESSION[tn]==PRC){echo '选用标题型式,不用填电邮,电话号及相片链结。';}else if($_SESSION[tn]==EN){echo 'You do not need to fill in the email/phone number and Picture link for Title type.';}else{echo '選用標題型式,不用填電郵,電話號及相片鏈結。';}?></p>
	<p><?php if($_SESSION[tn]==PRC){echo '选用电邮/电话按钮型式,只用填电邮或电话号,不用填相片链结。';}else if($_SESSION[tn]==EN){echo 'You can only enter either mail or phone number for Email/phone type and do not need to fill in the Picture link.';}else{echo '選用電郵/電話按鈕型式,只用填電郵或電話號,不用填相片鏈結。';}?></p>
	<!--<p><?php if($_SESSION[tn]==PRC){echo '选用应用页导航/相片浏览型式,只用填相片链结,不用填电邮或电话号。';}else if($_SESSION[tn]==EN){echo 'You can only enter appropriate Picture link for Picture navigation type and do not need to fill in the mail or phone number.';}else{echo '選用應用頁導航/相片瀏覽型式,只用填相片鏈結,不用填電郵或電話號。';}?></p>!-->
	<p><?php if($_SESSION[tn]==PRC){echo '选用相片浏览型式,只用填相片链结,不用填电邮或电话号。';}else if($_SESSION[tn]==EN){echo 'You can only enter appropriate Picture link for Picture navigation type and do not need to fill in the mail or phone number.';}else{echo '選用相片瀏覽型式,只用填相片鏈結,不用填電郵或電話號。';}?></p>
	
	</div>
	</div>
	<div class="ui-block-c">
	
	<?php if(sizeof($mpwebvln)>=3 and $mp){?>
	<select name="ord" data-theme="b">
	<option value=" "><?php if($_SESSION[tn]==PRC){echo '插入';}else if($_SESSION[tn]==EN){echo 'Insert';}else{echo '插入';}?></option>
	<?php for($i=1;$i<sizeof($mpwebvln)-1;$i++){
	if($i!=$mp and $i!=$mp+1){?><option value="<?php echo $i?>"><?php echo '['.$i.'] ';echo htmlspecialchars($titlevlu[$i])?></option>
	<?php ;};}?>
	</select><?php ;}?>
	</div>
	<div class="ui-block-d">
	<?php if($mp){?>
	<a href="ifrpicmp.php?ap=<?php echo htmlspecialchars($roww[ap])?>&pj=<?php echo htmlspecialchars($roww[pjnbr])?>&pn=<?php echo htmlspecialchars($pn)?>&tm=<?php echo htmlspecialchars($tm)?>&tg=<?php echo htmlspecialchars($tg)?>&typ=<?php echo htmlspecialchars($typ)?>" class="ui-btn" data-ajax="false"><?php if($_SESSION[tn]==PRC){echo '再增加新数据';}else if($_SESSION[tn]==EN){echo 'Add new data';}else{echo '再增加新數據';}?></a><?php ;}//if($bn){?>
	</div>
	<div class="ui-block-e">
	<?php if($mp){?>
	<input name="dlt" id="dlt" type="checkbox" data-theme="e" ><label for="dlt"><?php if($_SESSION[tn]==PRC){echo '刪除';}else if($_SESSION[tn]==EN){echo 'Delete';}else{echo '刪除';}?></label>
	<?php ;}//if($tg){?></div>
	</div>
				
<hr>
<?php 
	if($ifrhtml){?>
	<a href="#ifrhtml"  data-rel="popup" class="ui-btn ui-btn-inline ui-corner-all"><?php if($_SESSION[tn]==PRC){echo '您的设计';}else if($_SESSION[tn]==EN){echo 'Your design';}else{echo '您的設計';} 
	?></a>
	
	<div id="ifrhtml" data-role="popup" data-theme="w" data-corners="false" style="overflow-y:auto;" class="ifrwidthps" ><a href="#" data-rel="back" class="popn ui-btn ui-btn-z ui-btn-icon-notext ui-icon-delete"></a><ul data-role="listview" style="width:85%"><BR><BR>';
	<?php 
		
			for($i=1;$i< sizeof($mpwebvln)-1;$i++){
				if($typvlu[$i]=='mp' and $mailvlu[$i]){$dataicon = ' ui-btn-icon-right ui-icon-mail';$mplnk = '#';$dtn = '';$vw = '';$ifrftnbtns = '';}
				else if($typvlu[$i]=='vw' and $webvlu[$i]){$dataicon = ' ui-btn-icon-right ui-icon-navigation';$ifrftnbtns = $pj.$ap.'ifrftnbtns';$mplnk = '#'; $vw = ' '.htmlspecialchars($mpwebvln[6]);$dtn = ' data-pop="#'.$pj.$ap.'ifr'.$pn.'p'.$tm.'p'.htmlspecialchars($_POST[nbr]).'" data-img="#'.$pj.$ap.'ifr'.$pn.'p'.$tm.'"';}
				else if($typvlu[$i]=='mp' and $phonevlu[$i]){$dataicon = ' ui-btn-icon-right ui-icon-phone';$mplnk = '#';$dtn = '';$vw = '';$ifrftnbtns = '';}
				else if($typvlu[$i]=='web' and $webvlu[$i]){$dataicon = ' ui-btn-icon-right ui-icon-carat-r';$mplnk = '#';; $dtn = '';$vw = '';$ifrftnbtns = '';}				
				else{$dataicon = '';$mplnk = '#';$dtn = '';$vw = '';$ifrftnbtns = '';} 
				
				if($thumbnvlu[$i]){$mpimgvlu = '<img src="../panel/'.$roww[pjnbr].'/images/'.htmlspecialchars($thumbnvlu[$i]).'"/>';}else{$mpimgvlu = '';}
				if($bgclrvlu[$i]){$style = 'style="background-color:'.htmlspecialchars($bgclrvlu[$i]).'"';}else{$style = '';}
				
				$mpvluhtml .= '<li>'.$mpimgvlu.'<a href="'.htmlspecialchars(trim($mplnk)).'" '.$style.$dtn.' class="'.$ifrftnbtns.'ui-btn ui-btn-x'.$dataicon.$vw.'">'.$mpvluvs.htmlspecialchars($titlevlu[$i]).'</a></li>';
				
			;}
		$imgpopup .= $mpvluhtml.'</ul></div>';
		echo $imgpopup;
		
	;}
	?>	
	
	<hr>

	<?php
	
if(sizeof($mpwebvln)>=3){
echo '<div data-role="listview" data-inset="true"><li data-theme="b">';if($_SESSION[tn]==PRC){echo '修改数据';}else if($_SESSION[tn]==EN){echo 'Amend data';}else{echo '修改數據';}echo '<b style="color:black">';if($_SESSION[tn]==PRC){echo '修改数据[到上一页再提送一次才能生效]';}else if($_SESSION[tn]==EN){echo 'Amend data[please return to previous page to send data to make the following data effective]';}else{echo '[到上一頁再提送一次才能生效]';}echo '</b>';echo '</li>';}
for($i=1;$i<sizeof($mpwebvln)-1;$i++){
echo '<li data-icon="'.htmlspecialchars($icon).'"><a href="ifrpicmp.php?ap='.htmlspecialchars($roww[ap]).'&pj='.htmlspecialchars($roww[pjnbr]).'&pn='.htmlspecialchars($pn).'&tm='.htmlspecialchars($tm).'&tg='.htmlspecialchars($tg).'&mp='.htmlspecialchars($i).'" data-ajax="false"  style="background-color:'.htmlspecialchars($bgclrvlu[$i]).';text-shadow:0  0  0 ;">';
echo  '['.$i.']&nbsp;&nbsp;&nbsp;';
echo  htmlspecialchars($titlevlu[$i]).' '.' ';
if($typvlu[$i]=='vw'){
	if($_SESSION[tn]==PRC){echo '相片浏览';}else if($_SESSION[tn]==EN){echo 'Picture navigation';}else{echo '相片瀏覽';}
;}else if($typvlu[$i]=='title'){
	if($_SESSION[tn]==PRC){echo '标题';}else if($_SESSION[tn]==EN){echo 'Title';}else{echo '標題';}
;}else if($typvlu[$i]=='popup'){
	echo 'popup';
;}else if($typvlu[$i]=='mp'){
	if($_SESSION[tn]==PRC){echo '电邮/电话按钮';}else if($_SESSION[tn]==EN){echo 'Email/phone button';}else{echo '電郵/電話按鈕';}
;}else if($typvlu[$i]=='web'){
	if($_SESSION[tn]==PRC){echo '应用页导航';}else if($_SESSION[tn]==EN){echo 'APP APP navigation';}else{echo '應用頁導航';}
;}


echo '</a></li>';
$imgs = '';
;}
if(sizeof($mpwebvln)>=3)echo '</div>';

?>
	
	
	<hr>
	
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
var windowWidth = $(window).width();var windowHeight =  $(window).height(); 

var widw = windowWidth*0.95;var heigw = windowHeight*0.95;$(".ifrwidthp").css('max-width',widw).css('max-height',heigw);$(".ifrwidthp img").css('max-height',heigw);
$(".ifrwidthps").width(windowWidth).height(windowHeight);$(".ifrwidthps iframe").height(windowHeight);
$(".ifrwidth").height(heigw*0.85);$(".panel").height(heigw*0.85);

$('#webhtml').css('max-height',$(window).height()*0.85);
$('.webhtml').click(function (event){
	event.preventDefault();
	$('#web').val('#'+$(this).attr('data-value'));
	$('#webhtml').popup('close');
;})

$('#webhtmls').css('max-height',$(window).height()*0.85);
$('.webhtmls').click(function (event){
	event.preventDefault();
	$('#web').val($(this).attr('data-value'));
	$('#webhtmls').popup('close');
;})
</script>
<?php 
$tdy=0;
$tdy=date('Y-m-d');
if($_POST['title'] and $pj and $_SESSION[guanyin1] and $_SESSION[guanyin1]==$_POST[guanyin1]){

	
	if($ap and !preg_match('/^[0-9]*$/', $ap))exit;
	if($pj and !preg_match('/^[0-9]*$/', $pj))exit;	
	if($tm and !preg_match('/^[0-9]*$/', $tm))exit;	
	if($tg and !preg_match('/^[0-9]*$/', $tg))exit;
	if($mp and !preg_match('/^[0-9]*$/', $mp))exit;
	

	
	if($_POST[dlt] and $mp){
	
		for($i=0;$i<sizeof($mpwebvln)-1;$i++){
				if(!$i){
					$popup = $mpwebvln[0].'[*]';
				}else if($mp==$i){
					$popup .= '';
				}else{
					$popup .= $mpwebvln[$i].'[*]';
				;}
		;}		
		  	
		$itemifrhtml = str_replace($mpwebvlu,$popup,$itemifrhtml);	
		
	}else if($_POST['ord'] and preg_match('/^[0-9]*$/', $_POST['ord']) and $mp){
		$insert=$_POST['ord'];
		
		for($i=0;$i<sizeof($mpwebvln)-1;$i++){
			if(!$i){
			$popup = $mpwebvln[0].'[*]';}
			else if($i==$insert){	
			$popup .= $mpwebvln[$mp].'[*]'.$mpwebvln[$i].'[*]';}
			else if($i==$mp){$popup .= '';}
			else{$popup .= $mpwebvln[$i].'[*]';}
		;}	
		  	
		$itemifrhtml = str_replace($mpwebvlu,$popup,$itemifrhtml);	
	}else if($_POST['title'] and $mp){
		for($i=0;$i<sizeof($mpwebvln)-1;$i++){
				if(!$i){
					$popup = $mpwebvln[0].'[*]';
				}else if($mp==$i){
					//if($_POST[typ]=='popup'){if(strpos($_POST[ web],'http://')!==false or strpos($_POST[ web],'https://')!==false or strpos($_POST[ web],'.html')!==false or strpos($_POST[ web],'.php')!==false or strpos($_POST[ web],'.asp')!==false){$images = '';}else{$images = 'images/';};}else{$images = '';}
					$popup .= htmlspecialchars($_POST[title]).'[**]'.htmlspecialchars($_POST[typ]).'[**]'.htmlspecialchars($_POST[bgclr]).'[**]'.htmlspecialchars($_POST[thumbn]).'[**]'.htmlspecialchars($_POST[phone]).'[**]'.str_replace('&amp;','&',htmlspecialchars($_POST['mail'])).'[**]'.htmlspecialchars($_POST[web]).'[*]';
				}else{
					$popup .= $mpwebvln[$i].'[*]';
				;}
		;}		
		  	
		$itemifrhtml = str_replace($mpwebvlu,$popup,$itemifrhtml);	
	
	}else if($_POST['title'] and !$mp){   	
	if(!$mp)$mp=sizeof($mpwebvln)-1;
	if($_POST[typ]=='popup'){if(strpos($_POST[ web],'http://')!==false or strpos($_POST[ web],'https://')!==false){$images = '';}else{$images = 'images/';};}else{$images = '';}
		$popup = $mpwebvlu.htmlspecialchars($_POST[title]).'[**]'.htmlspecialchars($_POST[typ]).'[**]'.htmlspecialchars($_POST[bgclr]).'[**]'.htmlspecialchars($_POST[thumbn]).'[**]'.htmlspecialchars($_POST[phone]).'[**]'.str_replace('&amp;','&',htmlspecialchars($_POST['mail'])).'[**]'.$images.htmlspecialchars($_POST[ web]).'[*]';  	
		$itemifrhtml = str_replace($mpwebvlu,$popup,$itemifrhtml);		
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
			
			
	
			$webpopup .= $html.'<!--part'.$pn.'!-->'.$itemhtm[0].$itemhtml.$itemifrhtml.$itemhtmls.$htmls;
			$webpopup .= '</div><!--content!--></div><!--page!-->';
			
		 	
			
			$fpagtrns='../panel/'.$roww[pjnbr].'/'.$ap.'.html';
			file_put_contents($fpagtrns,$html.'<!--part'.$pn.'!-->'.$itemhtm[0].$itemhtml.$itemifrhtml.$itemhtmls.$htmls);

			$fpagtrns='../panel/'.$roww[pjnbr].'/web'.$ap.'.html';
			file_put_contents($fpagtrns,$webpopup);
	
			
	echo "<meta http-equiv='refresh' content='0;URL=ifrpicmp.php?ap=".htmlspecialchars($roww[ap])."&pj=".htmlspecialchars($roww[pjnbr])."&pn=".htmlspecialchars($pn)."&tm=".htmlspecialchars($tm)."&tg=".htmlspecialchars($tg)."&mp=".htmlspecialchars($mp)."&typ=".htmlspecialchars($typ)."'>";
;}

?>
