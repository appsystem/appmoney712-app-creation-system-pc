<?php session_start();    
 

if($_GET[pj] and !preg_match('/^[0-9]*$/',$_GET[pj]))exit;
if($_GET[pj])$pj = $_GET[pj];
if($_GET[ap] and !preg_match('/^[0-9]*$/',$_GET[ap]))exit;
if($_GET[ap])$ap = $_GET[ap];

define("ROOTPATH", "../");
include_once (ROOTPATH.'administration/db_conn.php');


$sqls=$db->query("select * from webpj where cno='$pj'");
	if($sqls)$rows=$sqls->fetch();
	if(strlen($rows[mnbg])==1){$menubg='class="menubg ui-btn ui-btn-'.htmlspecialchars($rows[mnbg]);}
	else if($rows[mnbg]){$mnbg=' style="background-image:url(images/'.htmlspecialchars($rows[mnbg]).');background-size:100% 100%;background-repeat: no-repeat;"';}

?>  
<!DOCTYPE html> 
	<html> 
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style">
	<title></title>
	<link rel="stylesheet" href="../css/jquerymobile-1.4.4.min.css">
	<link rel="stylesheet" href="../css/jquery.mobile-1.4.4.min.css">
	<link rel="shortcut icon" href="favicon.ico">
	<!--wettopbr--><style type="text/css">
	</style><!--copyiframes-->
	<script src="../js/jquery.js"></script>
	<script src="../js/jquery.mobile-1.4.4.min.js"></script>
	<script>
	function checkform ( form )
	{
	var vlu = /^[0-9.]+$/;
	if(!vlu.test(form.version.value)){
	alert("<?php if($_SESSION[tn]==PRC){echo '限填数字及/或点号。e.g. 1.0.0';}else if($_SESSION[tn]==EN){echo 'Numeric value and . symbol only.';}else{echo '限填數字及/或點號。e.g. 1.0.0';}?>");
	form.version.focus();
	return (false);
	}
	}</script>
	<!--copyiframe--><!--copyiframes-->
	<?php 
	if($_SESSION[tutorial]){
	 echo '<script>
	  setTimeout(function(){$("#appcreate").popup("open");},350);
	 </script>';
	;}
	?>
	</head>
	<body><div data-role="page" data-theme="f" class="page indexhtml">
	<div  data-role="header" id="hrdiv" data-theme="f"><h1 id="hrs"><?php if($_SESSION[tn]==PRC){echo '应用档案产生 - AppMoney712 移动应用设计系统';}else if($_SESSION[tn]==EN){echo 'APP file creation - AppMoney712 APP Creation System';}else{echo '應用檔案產生 - AppMoney712 移動應用設計系統';}?></h1><a href="#navigations" id="menubttns"  data-rel="popup" data-transition="pop" class="ui-btn-left ui-btn ui-btn-inline ui-corner-all ui-btn-icon-left ui-icon-bars">&nbsp;&nbsp;&nbsp;</a>
	</div><!-- /header --><div  class="ui-content pagebg"><!--copyiframe--><!-- /content!-->

	<a href="../website/<?php echo $pj.'/index.html'?>"  target="_blank" data-ajax="false" class="ui-btn ui-btn ui-btn-inline ui-corner-all ui-mini ui-btn-icon-left ui-icon-search"><?php if($_SESSION[tn]==PRC){echo '预览';}else if($_SESSION[tn]==EN){echo 'Preview';}else{echo '預覽';}?></a>

	<a href="project.php" data-ajax="false" class="ui-btn ui-btn ui-btn-inline ui-corner-all ui-mini ui-btn-icon-left ui-icon-bars"><?php if($_SESSION[tn]==PRC){echo '专案管理';}else if($_SESSION[tn]==EN){echo 'Project Management';}else{echo '專案管理';}?></a>
	
	<?php if($pj){ ?>
	<a href="app.php?pj=<?php echo htmlspecialchars($pj)?>&plt=1" data-ajax="false" class="ui-btn ui-btn ui-btn-inline ui-corner-all ui-mini ui-btn-icon-left ui-icon-bars"><?php if($_SESSION[tn]==PRC){echo '此专案应用页列表';}else if($_SESSION[tn]==EN){echo 'This Project Page List';}else{echo '此專案應用頁列表';}?></a>
	<?php ;} ?>

	
	

	<a href="#infs" data-rel="popup" data-transition="pop" class="ui-btn ui-btn-b ui-btn-inline ui-corner-all ui-mini">? <?php if($_SESSION[tn]==PRC){echo '解释';}else if($_SESSION[tn]==EN){echo 'Explanation';}else{echo '解釋';}?></a>
	<div data-role="popup" id="infs" style="min-width:300px;max-width:85%" data-position-to="window" data-theme="f">	<a href="#" class="ui-btn ui-corner-all ui-icon-delete ui-btn-icon-notext ui-btn-right" data-rel="back"></a>

	<h4 style="color:pink"><?php if($_SESSION[tn]==PRC){echo '产生应用档案';}else if($_SESSION[tn]==EN){echo 'Create APP zip file';}else{echo '產生應用檔案';}?></h4>
	<p><?php if($_SESSION[tn]==PRC){echo '点选\'产生应用档案\'才产生phonegap build用的zip档案。有关使用phonegap build,请参考本司网站。';}else if($_SESSION[tn]==EN){echo 'Tick the \'Create APP zip file\' is to produce zip file for phonegap build. About phonegap build, please refer to our website tutorial.';}else{echo '點選\'產生應用檔案\'才產生phonegap build用的zip檔案。有關使用phonegap build,請參考本司網站。';}?></p>
	<p><?php if($_SESSION[tn]==PRC){echo '在生产zip档案,您须先检查panel/'.$pj.'/images档夹内的图像等档案是否属应用必须的。Phonegap build及Android play等相关的应用服务均有应用的档案大小限制。';}else if($_SESSION[tn]==EN){echo 'If you need to produce zip file, you need to check the folder panel/'.$pj.'/images which files are necessary for your designed APP or not. Because the APP related web services, such as Phonegap build and Android play, also limit the APP size.';}else{echo '在生產zip檔案,您須先檢查panel/'.$pj.'/images檔夾內的圖像等檔案是否屬應用必須的。Phonegap build及Android play等相關的應用服務均有應用的檔案大小限制。';}?></p>
	
	<h4 style="color:pink"><?php if($_SESSION[tn]==PRC){echo '应用页存於伺服器';}else if($_SESSION[tn]==EN){echo 'APP Page in server for APP using';}else{echo '應用頁存於伺服器';}?></h4>
	<p><?php if($_SESSION[tn]==PRC){echo '若设计应用页能存於互联网伺服器供应用调用,您应另开专案设计,不应在应用的专案内进行设计。';}else if($_SESSION[tn]==EN){echo 'If the function page(not a part of app) is stored in the Internet server and can be for APP use, you need to create a project to do the design rather than design the function page in the APP project.';}else{echo '若設計應用頁能存於互聯網伺服器供應用調用,您應另開專案設計,不應在應用的專案內進行設計。';}?></p>
	</div>
	
	
	<?php 
	if(file_exists('../website/zip'.$pj)){?>
	<a href="<?php echo '../website/zip'.$pj.'/app'.$pj.'.zip'; ?>" class="ui-btn ui-btn-b ui-btn-inline ui-corner-all ui-mini" data-ajax="false"><?php if($_SESSION[tn]==PRC){echo '应用档案在';}else if($_SESSION[tn]==EN){echo 'App file is at ';}else{echo '應用檔案在';}?>website/zip<?php echo $pj?>/app<?php echo $pj?>.zip</a>	
	<?php ;}?>
  
   <hr>
   	<FORM action="app.php?pj=<?php echo htmlspecialchars($pj) ?>" method="post" onSubmit="return checkform(this);" data-ajax="false">
	
	<?php if($_SESSION[tn]==PRC){echo '专案';}else if($_SESSION[tn]==EN){echo 'Project';}else{echo '專案';}?>:<?php echo htmlspecialchars($rows[cno]);?>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<?php if($_SESSION[tn]==PRC){echo '专案称';}else if($_SESSION[tn]==EN){echo 'Project name';}else{echo '專案稱';}?> : 	<?php echo htmlspecialchars($rows[title])?>
	<hr>
	
	<?php if(!$_POST[appnm]){
			$menu = file_get_contents('../panel/'.$pj.'/menu.html');
			$menus = explode('id="appmenu"',$menu);
			
			if(!$menu){ 
				echo '<b style="color:pink">';
			    if($_SESSION[tn]==PRC){echo '提示:您的设计是否没有菜单。';}else if($_SESSION[tn]==EN){echo 'Alert : Is it no panel menu for your design.';}else{echo '提示:您的設計是否沒有菜單。';}
				echo '</b><HR>';
			;}
			
			if(sizeof($menus) > 1){
				echo '<b style="color:pink">';
			    if($_SESSION[tn]==PRC){echo '提示:您的菜单未完成按钮的链结。';}else if($_SESSION[tn]==EN){echo 'Alert : At least one Menu link is not found on your panel menu.';}else{echo '提示:您的菜單未完成按鈕的鏈結設定。';}
				echo '</b><HR>';
				echo '<script>alert("';
				if($_SESSION[tn]==PRC){echo '注意此页提示。';}else if($_SESSION[tn]==EN){echo 'Please read the Alert statment.';}else{echo '注意此頁提示。';}
				echo '")</script>';
			;}
	
	
	 if(file_exists('../website/'.$pj.'/index.html')){
	 $html = file_get_contents('../website/'.$pj.'/index.html');
	 if(substr_count($html,"<div")!=substr_count($html,"</div>")){ 
	 	echo '<b style="color:pink">';
	 	if($_SESSION[tn]==PRC){		
		 echo '提示:此专案巳产生APP档案,请检查此档案website/'.$pj.'/index.html 的html码.&lt;div&gt;或&lt;div 的数量是 '.substr_count($html,"<div").'.但&lt;/div&gt; 的数量是 '.substr_count($html,"</div>").'.';
		}else if($_SESSION[tn]==EN){
		 echo 'Alert : The APP file of this project is existing. Please check the html code of this file website/'.$pj.'/index.html.The number of &lt;div&gt; or &lt;div is '.substr_count($html,"<div").'.But the number of &lt;/div&gt; is '.substr_count($html,"</div>").'.';
		}else{
		 echo '提示:此專案巳產生APP檔案,請檢查此檔案website/'.$pj.'/index.html 的html碼.&lt;div&gt;或&lt;div 的數量是 '.substr_count($html,"<div").'.但&lt;/div&gt; 的數量是 '.substr_count($html,"</div>").'.';
		}
		echo '</b><HR>';			
	 ;}
	 ;}
	;} //if(!$_POST[appnm]){?>
	
	<?php if($_SESSION[tn]==PRC){echo '应用称';}else if($_SESSION[tn]==EN){echo 'APP name';}else{echo '應用稱';}?>	
	<a href="#pjtitles" data-rel="popup" data-transition="pop" class="ui-btn ui-btn ui-btn-inline ui-corner-all ui-mini" style="color:blue;">?</a>
	<div data-role="popup" id="pjtitles" style="min-width:300px" data-theme="f"><a href="#" class="ui-btn ui-corner-all ui-icon-delete ui-btn-icon-notext ui-btn-right" data-rel="back"></a>

	<p>
	<?php if($_SESSION[tn]==PRC){echo '此名称及描述是您的应用的实际资料。';}else if($_SESSION[tn]==EN){echo 'APP Name and APP Description are the actual information of your app.';}else{echo '此名稱及描述是您的應用的實際資料。';}?>
	</p>
	</div>
	<input type="text" name="appnm" value="<?php echo htmlspecialchars($rows[appnm]);?>" required>
	<?php if($_SESSION[tn]==PRC){echo '应用描述';}else if($_SESSION[tn]==EN){echo 'APP description';}else{echo '應用描述';}?>
	<br><textarea  name="appdes"><?php echo htmlspecialchars($rows[appdes]);?></textarea><br>
	<div class="ui-grid-a"><div class="ui-block-a">
	<!--<?php if($_SESSION[tn]==PRC){echo '数据网站';}else if($_SESSION[tn]==EN){echo 'Information website';}else{echo '數據網站';}?>	
	<a href="#function" data-rel="popup" data-transition="pop" class="ui-btn ui-btn ui-btn-inline ui-corner-all ui-mini" style="color:blue;">?</a>
	<div data-role="popup" id="function" style="min-width:300px" data-theme="f"><a href="#" class="ui-btn ui-corner-all ui-icon-delete ui-btn-icon-notext ui-btn-right" data-rel="back"></a>

	<p>
	<?php if($_SESSION[tn]==PRC){echo '作用是接收表格数据丶对应用的用户设备送出/推出或更新资料。';}else if($_SESSION[tn]==EN){echo 'A php website is to receive form data of APP or send or update data to APP users.';}else{echo '作用是接收表格數據、對應用的用戶設備送出或更新資料。';}?>
	</p>
	</div>
	<input type="text" name="infweb" value="<?php echo htmlspecialchars($rows[infweb]);?>">!-->
	</div><div class="ui-block-b">
	<?php if($_SESSION[tn]==PRC){echo '首页';}else if($_SESSION[tn]==EN){echo 'First page';}else{echo '首頁';}?>	
	<a href="#bg" data-rel="popup" data-transition="pop" class="ui-btn ui-btn ui-btn-inline ui-corner-all ui-mini" style="color:blue;">?</a>
	<div data-role="popup" id="bg" style="min-width:300px" data-theme="f"><a href="#" class="ui-btn ui-corner-all ui-icon-delete ui-btn-icon-notext ui-btn-right" data-rel="back"></a>

	<p>
	<?php if($_SESSION[tn]==PRC){echo '用户首次使用时的首页。';}else if($_SESSION[tn]==EN){echo 'The first page shows when first using of app.';}else{echo '用戶首次使用時的首頁。';}?>
	</p>
	</div>
	<?php $sqlsn=$db->query("select * from webhtml where pjnbr='$pj'");
	if($sqlsn){
	while($rowsn=$sqlsn->fetch()){
	if(!$i){
	echo '<select name="html"><option value=" "></option>';}
	echo '<option value="'.htmlspecialchars($rowsn[ap]).'"';
	if($rows['html']==$rowsn[ap])echo 'selected="selected"';
	echo '>';
	if($rowsn[apn])$rowsn[ap]=$rowsn[apn];
	if($rowsn[nbr]){echo htmlspecialchars($rowsn[nbr]).'. ';}
	echo htmlspecialchars($rowsn[title]).'['.htmlspecialchars($rowsn[ap]).'.html] '.htmlspecialchars($rowsn[date]).' </option>';
	$i=1;
	;};}
	if($i)echo '</select>';
	?>

	</div></div>
	
	
	
	<div class="ui-grid-d">
	<div class="ui-block-a">
	<?php if($_SESSION[tn]==PRC){echo '版号';}else if($_SESSION[tn]==EN){echo 'Version Code';}else{echo '版號';}?>	
	<input type="number" name="versioncode"  value="<?php echo htmlspecialchars($rows[versioncode]);?>" required>
	</div><div class="ui-block-b">
	<?php if($_SESSION[tn]==PRC){echo '版本编号';}else if($_SESSION[tn]==EN){echo 'Version Number';}else{echo '版本編號';}?>	
	<input type="text" name="version"  value="<?php echo htmlspecialchars($rows[version]);?>" required>
	</div><div class="ui-block-c">
	<?php if($_SESSION[tn]==PRC){echo '应用作者';}else if($_SESSION[tn]==EN){echo 'APP Author';}else{echo '應用作者';}?>	
	<input type="text" name="author"  value="<?php echo htmlspecialchars($rows[author]);?>" required>
	</div><div class="ui-block-d">
	<?php if($_SESSION[tn]==PRC){echo '作者电邮';}else if($_SESSION[tn]==EN){echo 'Author Email';}else{echo '作者電郵';}?>	
	<input type="text" name="email"  value="<?php echo htmlspecialchars($rows[email]);?>" required>
	</div><div class="ui-block-e">
	<?php if($_SESSION[tn]==PRC){echo '应用/作者网站';}else if($_SESSION[tn]==EN){echo 'App/Author Website';}else{echo '應用/作者網站';}?>	
	<input type="text" name="website"  value="<?php echo htmlspecialchars($rows[website]);?>">
	</div></div>
	<hr>
	<div class="ui-grid-d">
	<div class="ui-block-a">
	<input name="appicon" id="appicon" type="checkbox" <?php if($rows[appicon])echo 'checked="checked"';?>><label for="appicon"><?php if($_SESSION[tn]==PRC){echo '应用icon';}else if($_SESSION[tn]==EN){echo 'APP icon';}else{echo '應用icon';}?></label>
	</div><div class="ui-block-b">
	<select name="splash">   
		<option value=""><?php  if($_SESSION[tn]==PRC){echo '应用启用画面选项';}else if($_SESSION[tn]==EN){echo 'Selection of Splash screen ';}else{echo '應用啟用畫面選項';}?></option>	
		<option value="splash"  <?php if($rows[splash]=='splash')echo 'selected="selected"';?>>splash screen</option>	
		<option value="splashs"  <?php if($rows[splash]=='splashs')echo 'selected="selected"';?>><?php if($_SESSION[tn]==PRC){echo '质量splash screen';}else if($_SESSION[tn]==EN){echo 'Quality splash screen';}else{echo '質量splash screen';}?></option>
		</select>

	</div><div class="ui-block-c">
	</div><div class="ui-block-d">
	</div><div class="ui-block-e">
	</div></div>
	
	<div class="ui-grid-d">
	<div class="ui-block-a">
	<input name="openbrowser" id="openbrowser" type="checkbox" <?php if($rows[openbrowser])echo 'checked="checked"';?>><label for="openbrowser"><?php if($_SESSION[tn]==PRC){echo '应用含开启设备浏览器功能';}else if($_SESSION[tn]==EN){echo 'OPEN IN APP BROWSER function';}else{echo '應用含開啟設備瀏覽器功能';}?></label>
	</div><div class="ui-block-b">
	<input name="openapp" id="openapp" type="checkbox" <?php if($rows[openbrowser])echo 'checked="checked"';?>><label for="openapp"><?php if($_SESSION[tn]==PRC){echo '应用含调用APP功能';}else if($_SESSION[tn]==EN){echo 'OPEN APP function';}else{echo '應用含調用APP功能';}?></label>
	</div><div class="ui-block-c">
	<input name="whatsapp" id="whatsapp" type="checkbox" <?php if($rows[whatsapp])echo 'checked="checked"';?>><label for="whatsapp"><?php if($_SESSION[tn]==PRC){echo '应用含调用Android Whatsapp';}else if($_SESSION[tn]==EN){echo 'Android Whatsapp';}else{echo '應用含調用Android Whatsapp';}?></label>
	</div><div class="ui-block-d">
	<input name="plugcache" id="plugcache" type="checkbox" <?php if($rows[plugcache])echo 'checked="checked"';?>><label for="plugcache"><?php if($_SESSION[tn]==PRC){echo '移除应用缓存';}else if($_SESSION[tn]==EN){echo 'Remove APP cache';}else{echo '移除應用緩存';}?></label>
	</div></div>
	<hr>
	<?php if(file_exists('../js/apngcm.js')){?>
	<div class="ui-grid-d">
	<div class="ui-block-a">
	<?php if($_SESSION[tn]==PRC){echo '推送消息GCM senderID';}else if($_SESSION[tn]==EN){echo 'Push message - GCM senderID';}else{echo '推送消息GCM senderID';}?>
	<input name="GCM" type="text" <?php echo htmlspecialchars($rows[GCM]);?>>
	</div><div class="ui-block-b">
	<?php if($_SESSION[tn]==PRC){echo '推送数据接收URL';}else if($_SESSION[tn]==EN){echo 'Push data receiving URL';}else{echo '推送數據接收URL';}?>
	<input name="pushURL" type="text" <?php echo htmlspecialchars($rows[pushURL]);?>>
	</div><div class="ui-block-c">
	</div><div class="ui-block-d">
	</div></div>
	<?php ;}//if(file_exists('../js/apngcm.js')){?>
	<hr>
	<input type="hidden" name="guanyin1" value="<?php if(!$_POST[guanyin1])$_SESSION[guanyin1]=rand();
	echo htmlspecialchars($_SESSION[guanyin1]); ?>">
	
	<div class="ui-grid-c"><div class="ui-block-a">
	<input type="submit" name="submit" Value="<?php if($_SESSION[tn]==PRC){echo '送交';}else if($_SESSION[tn]==EN){echo 'SEND';}else{echo '送交';}?>"></div><div class="ui-block-b"><a href="#vc" data-rel="popup" data-transition="pop" class="ui-btn ui-btn ui-btn-inline ui-corner-all ui-mini" style="color:blue;">? <?php if($_SESSION[tn]==PRC){echo '解释';}else if($_SESSION[tn]==EN){echo 'Explanation';}else{echo '解釋';}?></a>
	<div data-role="popup" id="vc" style="min-width:300px" data-theme="f"><a href="#" class="ui-btn ui-corner-all ui-icon-delete ui-btn-icon-notext ui-btn-right" data-rel="back"></a>

	<h4 style="color:pink"><?php if($_SESSION[tn]==PRC){echo '版号';}else if($_SESSION[tn]==EN){echo 'Version Code';}else{echo '版號';}?></h4>	
	<p>
	<?php if($_SESSION[tn]==PRC){echo 'Android app的设定,填整数。若应用版本修订,您须更新版号。';}else if($_SESSION[tn]==EN){echo 'It is for Android app. You need to fill in an integer value. You may need to upgrade it when the version of your APP revised.';}else{echo 'Android app的設定,填整數。若應用版本修訂,您須更新版號。';}?>
	</p>
	<h4 style="color:pink"><?php if($_SESSION[tn]==PRC){echo '版本编号';}else if($_SESSION[tn]==EN){echo 'Version Number';}else{echo '版本編號';}?></h4>
	<p>
	<?php if($_SESSION[tn]==PRC){echo '给用户的应用的版本号,填数字及/或点号。e.g. 1.0.0';}else if($_SESSION[tn]==EN){echo 'It is about your Android APP version for APP user. You need to fill in integer and . symbol only. e.g. 1.0.0';}else{echo '給用戶的應用的版本號,填數字及/或點號。e.g. 1.0.0';}?>
	</p>
	<h4 style="color:pink"><?php if($_SESSION[tn]==PRC){echo '应用資料';}else if($_SESSION[tn]==EN){echo 'APP information';}else{echo '應用資料';}?></h4>	
	<p>
	<?php if($_SESSION[tn]==PRC){echo '您须填作者名称及联络电邮。您应填应用的相关网站。';}else if($_SESSION[tn]==EN){echo 'You need to fill in the author name and email. You may need to fill in APP related website.';}else{echo '您須填作者名稱及聯絡電郵。您應填應用的相關網站。';}?>
	</p>
	<HR>
	<p>
	<?php if($_SESSION[tn]==PRC){echo '以下二项不是必须项。';}else if($_SESSION[tn]==EN){echo 'The following two items are not mandatory. ';}else{echo '以下二項不是必須項。';}?>
	</p>
	<h4 style="color:pink"><?php if($_SESSION[tn]==PRC){echo '应用icon';}else if($_SESSION[tn]==EN){echo 'APP icon';}else{echo '應用icon';}?></h4>	
	<p>
	<?php if($_SESSION[tn]==PRC){echo '此项是显示在用户设备上的应用icon,您须将此图像[icon],定名icon.png,并放在panel/'.$pj.'档夹内,取代巳有的档案。若想对应用户设备,添加相应质量的icon,您须点撀\'应用质量icon\'选项。您须到本司网站,有相关指引。';}else if($_SESSION[tn]==EN){echo 'This is about the APP icon in APP user device\'s application. You need to name your APP icon as icon.png and place it to panel/'.$pj.' folder to replace the original one. If you want to use icon quality suiting for different device\'s display quality, you need to tick the option \'Quality icon\'. You need to visit our website to follow related instruction.';}else{echo '此項是顯示在用戶設備上的應用icon,您須將此圖像[icon],定名icon.png,並放在panel/'.$pj.'檔夾內,取代巳有的檔案。若想對應用戶設備,添加相應質量的icon,您須點撀\'應用質量icon\'選項。您須到本司網站,有相關指引。';}?>
	</p>
	<h4 style="color:pink"><?php if($_SESSION[tn]==PRC){echo '应用启用画面';}else if($_SESSION[tn]==EN){echo 'Splash screen';}else{echo '應用啟用畫面';}?></h4>	
	<p>
	<?php if($_SESSION[tn]==PRC){echo '此项是未进入应用前的启用画面,您须点选\'splash screen\'并将此画面图像[splash screen],定名splash.png,并放在panel/'.$pj.'档夹内,取代巳有的档案。若想对应用户设备,添加相应质量的splash screen,您须点选\'质量splash screen\'选项。您须到本司网站,有相关指引。';}else if($_SESSION[tn]==EN){echo 'This item is about your APP\'s splash screen showed to APP user before loading the first page. You can select \'splash sreen\' option and place splash.png to the panel/'.$pj.' folder. If you want to use splash screen quality suiting for different device\'s display quality, you need to tick the option \'Quality splash screen\'. You need to visit our website to follow related instruction. ';}else{echo '此項是未進入應用前的啟用畫面,您須點選\'splash screen\'並將此畫面圖像[splash screen],定名splash.png,並放在panel/'.$pj.'檔夾內,取代巳有的檔案。若想對應用戶設備,添加相應質量的splash screen,您須點選\'質量splash screen\'選項。您須到本司網站,有相關指引。';}?>
	</p>
	
	<hr>
	<p><b><?php if($_SESSION[tn]==PRC){echo '插件';}else if($_SESSION[tn]==EN){echo 'Plugin';}else{echo '插件';}?></b></p>
	<hr>
	<h4 style="color:pink"><?php if($_SESSION[tn]==PRC){echo '应用含开启设备浏览器功能';}else if($_SESSION[tn]==EN){echo 'OPEN IN APP BROWSER function';}else{echo '應用含開啟設備瀏覽器功能';}?></h4>	
	<p>
	<?php if($_SESSION[tn]==PRC){echo '在您的应用设计内,有使用含[openbrowser]的popup链结,您须点选。该链结的作用是用户点撀此等popup按钮或相片按钮时,在用户合适的设备上,改用用户设备内特定浏览器开启内容,不同设备有不同浏览器。若没有使用,请不要选用,是影响您的应用的大小的。';}else if($_SESSION[tn]==EN){echo 'If you use the popup link containing [openbrowser] in your APP design, you need to tick this checkbox. This popup link is to open specific browser in APP user\'s appropriate device for the popup content. If you do not use the [openbrowser] popup link, please do not tick the checkbox. It will affect your APP size.';}else{echo '在您的應用設計內,有使用含[openbrowser]的popup鏈結,您須點選。該鏈結的作用是用戶點撀此等popup按鈕或相片按鈕時,在用戶合適的設備上,改用用戶設備內特定瀏覽器開啟內容,不同設備有不同瀏覽器。若沒有使用,請不要選用,是影響您的應用的大小的。';}?>
	</p>
	<h4 style="color:pink"><?php if($_SESSION[tn]==PRC){echo '应用含调用APP功能';}else if($_SESSION[tn]==EN){echo 'OPEN APP function';}else{echo '應用含調用APP功能';}?></h4>	
	<p>
	<?php if($_SESSION[tn]==PRC){echo '在您的应用设计内,有使用含[openapp]的popup链结,您须点选。该链结的作用是用户点撀此等popup按钮或相片按钮时,在用户合适的设备上,改用用户设备内合适的应用开启内容。若没有使用,请不要选用,是影响您应用的大小的。';}else if($_SESSION[tn]==EN){echo 'If you use the popup link containing [openapp] in your APP design, you need to tick this checkbox. This popup link is to open appropriate APP in APP user\'s appropriate device for the popup content. If you do not use the [openapp] popup link, please do not tick the checkbox. It will affect your APP size.';}else{echo '在您的應用設計內,有使用含[openapp]的popup鏈結,您須點選。該鏈結的作用是用戶點撀此等popup按鈕或相片按鈕時,在用戶合適的設備上,改用用戶設備內合適的應用開啟內容。若沒有使用,請不要選用,是影響您應用的大小的。';}?>
	</p>
	<h4 style="color:pink"><?php if($_SESSION[tn]==PRC){echo '应用含调用Android Whatsapp';}else if($_SESSION[tn]==EN){echo 'Android Whatsapp';}else{echo '應用含調用Android Whatsapp';}?></h4>	
	<p>
	<?php if($_SESSION[tn]==PRC){echo '若您的应用设计包括ANDROID并使用Whatsapp的popup链结,您须点选。该链结的作用是用户点撀此等popup按钮或相片按钮时,在用户合适的设备上,开启Whatsapp。若没有使用,请不要选用,是影响您应用的大小的。';}else if($_SESSION[tn]==EN){echo 'If you use the popup link containing WhatsAPP in your APP design including ANDROID, you need to tick this checkbox. This popup link is to open WhatsAPP APP in appropriate APP user device for the WhatsAPP parameter of the popup link. If you do not use the WhatsAPP popup link, please do not tick the checkbox. It will affect your APP size.';}else{echo '若您的應用設計包括ANDROID並使用Whatsapp的popup鏈結,您須點選。該鏈結的作用是用戶點撀此等popup按鈕或相片按鈕時,在用戶合適的設備上,開啟Whatsapp。若沒有使用,請不要選用,是影響您應用的大小的。';}?>
	</p>
	<h4 style="color:pink"><?php if($_SESSION[tn]==PRC){echo '移除应用缓存';}else if($_SESSION[tn]==EN){echo 'Remove APP\'s webview cache';}else{echo '移除應用緩存';}?></h4>	
	<p>
	<?php if($_SESSION[tn]==PRC){echo '若您的应用设计含一些存於互联网或内联网的网页或相片等档案,而此等档案是不断更新,您须试用此插件。若能用不同名的檔案控制更新,您不須使用此插件。';}else if($_SESSION[tn]==EN){echo 'If files stored in the Internet or Intranet are used in your design and they will be ongoing updated, you need to try to use this plugin. If you can use different filename for the updating issues, you do not need to select it.';}else{echo '若您的應用設計含一些存於互聯網或內聯網的網頁或相片等檔案,而此等檔案是不斷更新,您須試用此插件。若能用不同名的檔案控制更新,您不須使用此插件。';}?>
	</p>
	<?php if(file_exists('../js/apngcm.js')){?>	
	<hr>
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '推送消息';}else if($_SESSION[tn]==EN){echo 'Push message';}else{echo '推送消息';}?>	</b>
	<?php  if($_SESSION[tn]==PRC){echo '有关推送消息,须参加本司相关服务,请参考本司网站。';}else if($_SESSION[tn]==EN){echo 'It is about pushing message of our company service. Please refer to our website';}else{echo '有關推送消息,須參加本司相關服務,請參考本司網站。';}?></p>
	<?php ;}//if(file_exists('../js/apngcm.js')){?>	
	</div>
	</div><div class="ui-block-c"></div><div class="ui-block-d"><input name="appd" id="appd" type="checkbox"><label for="appd"><?php if($_SESSION[tn]==PRC){echo '产生应用档案';}else if($_SESSION[tn]==EN){echo 'Create APP zip file';}else{echo '產生應用檔案';}?></label>
</div>
	<!--<div class="ui-block-e">
	<input name="fullscreen" id="fullscreen" type="checkbox"><label for="fullscreen"><?php if($_SESSION[tn]==PRC){echo '应用改为全屏型式';}else if($_SESSION[tn]==EN){echo 'Full screen style of app';}else{echo '應用改為全屏型式';}?></label>
	</div>!-->
	</div>
	</FORM>

	<hr>
	<?php $sql=$db->query("select * from webpj order by nbr,date desc");
	if($sql){
	while($row=$sql->fetch()){
	if(!$j){if($_SESSION[tn]==PRC){echo '专案列表';}else if($_SESSION[tn]==EN){echo 'Project list';}else{echo '專案列表';};$j=1;}	
	echo '<a href="';
	if($row[version]){echo '?pj='.htmlspecialchars($row[cno]);}else{echo '#';}
	echo '" data-ajax="false" class="ui-btn ui-corner-all ui-mini ';
	if($row[version]){echo 'ui-btn-icon-left ui-icon-edit';}
	echo '"> ';
	echo '['.htmlspecialchars($row[cno]).'] ';
	echo htmlspecialchars($row[title]);
	echo ' '.htmlspecialchars($row[date]);
	echo ' </a>';	
	;};}
	?>
	
	
	<div data-role="popup" id="appcreate" style="min-width:300px" data-theme="f"><a href="#" class="ui-btn ui-corner-all ui-icon-delete ui-btn-icon-notext ui-btn-right" data-rel="back"></a>	
	<br><br>
	<p style="color:black"><?php if($_SESSION[tn]==PRC){echo '按此页解释进行填写及操作。';}else if($_SESSION[tn]==EN){echo 'You need to follow the explanation of this page.';}else{echo '按此頁解釋進行填寫及操作。';}?></p>
	<p>
	<?php if($_SESSION[tn]==PRC){echo '注:您须关闭此浏览器才能取消此教程模式,再开启才能正式使用。';}else if($_SESSION[tn]==EN){echo 'Remark : You need to close your web browser to turn off the tutorial mode before you can start your design work in design mode.';}else{echo '註:您須關閉此瀏覽器才能取消此教程模式,再開啟才能正式使用。';}?>
	</p>
	
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
	</div><!-- /content -->
	</div><!-- /page -->
	
 	
</body>
</html>

<?php 
$tdy=0;
$tdy=date('Y-m-d');


if($_POST['appnm'] and $pj and $_SESSION[guanyin1] and $_SESSION[guanyin1]==$_POST[guanyin1]){
	
	if($pj and !preg_match('/^[0-9]*$/',$pj))exit;
	if($_POST[versioncode] and !preg_match('/^[0-9]*$/',$_POST[versioncode]))exit;
	//if($_POST[html])$html = explode("@",$_POST[html]);

		$db->exec("update webpj set appnm='$_POST[appnm]',appdes='$_POST[appdes]',infweb='$_POST[infweb]',html='$_POST[html]',versioncode='$_POST[versioncode]',version='$_POST[version]',author='$_POST[author]',email='$_POST[email]',website='$_POST[website]',openbrowser='$_POST[openbrowser]',whatsapp='$_POST[whatsapp]',plugcache='$_POST[plugcache]',appicon='$_POST[appicon]',splash='$_POST[splash]',gcm='$_POST[GCM]',pushURL='$_POST[pushURL]',date='$tdy' where cno='$pj'");

	

	if($_POST['appd']){

		function dfcopy($srcdir,$webdir){ 
    	$dir = opendir($srcdir); 
    	@mkdir($webdir); 
    	while(false!==( $file = readdir($dir)) ){ 
        if (($file!= '.') && ($file != '..')){ 
            if (is_dir($srcdir.'/'.$file)){ 
                dfcopy($srcdir.'/'.$file,$webdir.'/'.$file); 
            }else{ 
                copy($srcdir.'/'.$file,$webdir.'/'.$file); 
            } 			
        } 
    	} 
    	closedir($dir); 
		} 
			

		
	if(file_exists('../website/'.$pj) or file_exists('../panel/'.$pj)){
		
		rename('../website/'.$pj,'../website/['.$pj.']'.date("Y-m-d-H-i-s"));
		mkdir('../website/'.$pj);
		mkdir('../website/'.$pj.'/images');
		mkdir('../website/'.$pj.'/css');
		mkdir('../website/'.$pj.'/js');
		$srcdir = '../css';
		$webdir = '../website/'.$pj.'/css';
		if(file_exists('../css'))dfcopy("$srcdir","$webdir");
		$srcdir = '../panel/'.$pj.'/images';
		$webdir = '../website/'.$pj.'/images';
		if(file_exists('../panel/'.$pj.'/images'))dfcopy("$srcdir","$webdir");
		copy('../js/mobileinit.js', '../website/'.$pj.'/js/mobileinit.js');
		copy('../js/fastclick.js', '../website/'.$pj.'/js/fastclick.js');
		copy('../js/jquery.js', '../website/'.$pj.'/js/jquery.js');
		copy('../js/jquery.mobile-1.4.4.min.js', '../website/'.$pj.'/js/jquery.mobile-1.4.4.min.js');
		copy('../js/appsystem.js', '../website/'.$pj.'/js/appsystem.js');
		copy('../js/appsystemifr.js', '../website/'.$pj.'/js/appsystemifr.js');
		copy('../js/swiper.jquery.min.js', '../website/'.$pj.'/js/swiper.jquery.min.js');//swipe
		copy('../jscss/swiper.min.css', '../website/'.$pj.'/css/swiper.min.css');//swipe
		copy('../css/animatemin.css','../website/'.$pj.'/css/animatemin.css');//swipe
		copy('../panel/'.$pj.'/agree.js','../website/'.$pj.'/js/agree.js');//swipe
		copy('../AppSystem-license.txt','AppSystem-license.txt');

	}
	
		$htm  = file_get_contents('../template/index.html');	
		$menu = file_get_contents('../panel/'.$pj.'/menu.html');
		
		
		if($rows[pjbg]){$rows[pjbg]=str_replace('/','',$rows[pjbg]);$rows[pjbg]=str_replace('\\','',$rows[pjbg]);$rows[pjbg]=str_replace('..','',$rows[pjbg]);}
			
			if(strpos($rows[pjbg],'http://')!==false or strpos($rows[pjbg],'https://')!==false){$images = '';}else{$images = 'images/';}
			
			if(strpos($rows[pjbg],'#')!==false or strpos($rows[pjbg],'rgba(')!==false  or strpos($rows[pjbg],'rgb(')!==false){$bghtml = 'background-color:'.htmlspecialchars($rows[pjbg]).';';}
			else if(strpos($rows[pjbg],'[xy]')!==false){$pjbghtml = 'background-image:url('.$images.htmlspecialchars($rows[pjbg]).');';}
			else{$pjbghtml = 'background-image:url('.$images.htmlspecialchars($rows[pjbg]).');background-size:100%;background-repeat:repeat-y;';}
	
			if($rows[pjbg]){$pjbgstyle = ' style="'.$pjbghtml.'"';}else{$pjbgstyle = '';}

		if($rows[ptheme])$ptheme = 'data-theme="'.$rows[ptheme].'"';
		$webhtm = '<div data-role="page" id="appageone" class="page" data-index="" '.$ptheme.$pjbgstyle.'><div  class="pagebg" >';
		if($menu){
		if($rows[menubtn]='btns'){$rows[menubtn] = ' ui-btn-icon-notext">';if($mnbg){$mnbg = str_replace('="','="padding-top:15px;padding-bottom:15px;',$mnbg);}
		else{$mnbg = 'style="padding-top:15px;padding-bottom:15px;"';};}else{$rows[menubtn] = ' ui-btn-icon-top">'.htmlspecialchars($rows[menubtn]);$menubtnpad = '';}
		$webhtm .= '<div data-role="controlgroup" class="plft" data-type="horizontal" data-corners="false"><a href="#menupanel" data-rel="panel" '.$mnbg.' class="'.$menubg.' ui-btn-inline ui-mini ui-icon-bars'.$rows[menubtn].'</a></div>'.$menu;}
		$webhtm .= '<!--panel!--><div id="imgspop" data-theme="z" style="padding:5px;" data-role="popup" data-corners="false"><a href="#" data-rel="back" class="popn ui-btn ui-btn-z ui-btn-icon-notext ui-icon-delete"></a><div class="ifrspinn" style="position:relative;left:50%;width:100%">Loading...<BR><img src="css/images/ajax-loader.gif"></div><div class="imgspop"><img src=""></div></div>
		<div id="ifrspop" data-theme="z" data-role="popup" data-corners="false" style="overflow-y:auto;height:100%;width:100%;top:0;left:-15px;" class="ifrwidthpn" ><a href="#" data-rel="back" class="popn ui-btn ui-btn-z ui-btn-icon-notext ui-icon-delete"></a><div class="ifrspinn" style="position:relative;left:50%;width:100%">Loading...<BR><img src="css/images/ajax-loader.gif"></div><iframe src="" style="width:100%" seamless frameBorder="0" ></iframe></div>
		<div id="ifrspinn" style="position:relative;left:50%;width:100%;z-index:99"><BR><BR><BR><BR><BR><BR><BR><BR><BR>Loading...<BR><img src="css/images/ajax-loader.gif"></div>
		<div class="ui-content" id="pVideo" data-corners="false" data-role="popup" data-theme="x" data-tolerance="2,2"><iframe width="498" height="298" src="" seamless=""></iframe></div><div id="pAudio" data-corners="false"  data-role="popup" style="color:black;background-color:rgba(255, 255, 255, 0.8);padding:5px;" class="ifrwidthps"><a href="#" data-rel="back" class="popn ui-btn ui-btn-z ui-btn-icon-notext ui-icon-delete"></a><BR><BR><i id="audtn" ></i> &nbsp;<i id="audur"></i><br><a href="#"  id="playaudion" data-vlu="" style="border:none;" class="ui-btn ui-btn-w"><img style="width:50px" src="css/images/sound.svg"></a><BR><input id="volmn" type="range" data-role="none" value="0.8"  step="0.1" min="0" max="1"><BR><input id="toposn" type="range" data-role="none" value="0" step="0.01" min="0" max="1"><div id="volmndiv"><input id="volmnapp" type="range"  value="0.8"  step="0.1" min="0" max="1"></div><BR><div id="toposndiv"><input id="toposnapp" type="range"  value="0" step="0.01" min="0" max="1"></div><audio id="audsn"><source src="" type="audio/mpeg"><source src="" type="audio/wav"></audio><div class="ifrspinn" style="position:relative;left:50%;width:100%">Loading...<BR><img src="css/images/ajax-loader.gif"></div></div>';
		
	$formwebhtm = $webhtm;
		
		
	$sql=$db->query("select * from webhtml where style='app' and pjnbr='$pj'");
	if($sql){
	while($row=$sql->fetch()){
		if($row[hidden]!=5){
		if($row[apn])$row[ap]=$row[apn];
		if($row[ap] and !preg_match('/^[0-9]*$/',$row[ap]))exit;
		
		if($row[pjn]){$ap = $row[apn];}else{$ap = $row[ap];}
		
		if(!$apindex)$apindex = $ap;
		
		if($row[theme]){$theme = $row[theme];}else{$theme = '';}
			
			if($row[bg]){$row[bg]=str_replace('/','',$row[bg]);$row[bg]=str_replace('\\','',$row[bg]);$row[bg]=str_replace('..','',$row[bg]);}
			
			if(strpos($row[bg],'http://')!==false or strpos($row[bg],'https://')!==false){$images = '';}else{$images = 'images/';}
			
			if(strpos($row[bg],'#')!==false or strpos($row[bg],'rgba(')!==false  or strpos($row[bg],'rgb(')!==false){$bghtml = 'background-color:'.htmlspecialchars($row[bg]).';';}
			else if(strpos($row[bg],'[xy]')!==false){$bghtml = 'background-image:url('.$images.htmlspecialchars($row[bg]).');';}
			else{$bghtml = 'background-image:url('.$images.htmlspecialchars($row[bg]).');background-size:100%;background-repeat:repeat-y;';}
	
			//if(!$row[bg])$bghtml = 'background-color:pink;';
			if(!$row[bg])$bghtml = '';
	
		
		if(file_exists('../panel/'.$pj.'/tabn'.$ap.'.html')){
			$htmltabn  = file_get_contents('../panel/'.$pj.'/tabn'.$ap.'.html');$nav =1;
			if($htmltabn and strpos($htmltabn,'<!--data-tabnbgd@')==false){
				if(strpos($tabnhtml,'tablistrights"')!==false){$tabnwdh = 'tabnwdh ';$wdh ='';}else{$wdh = 'width:100%;';$tabnwdh='';}
			;}else{
				$htmltabn  = '';$wdh = 'width:100%;';$nav ='';
			;}
		;}else{
				$htmltabn  = '';$wdh = 'width:100%;';$nav ='';
		;}
		
		

		if($row[font]){
			if(strpos($row[font],'[b]')!=false){
				$bold = 'font-weight:bold;';
				$row[font]=str_replace('[b]','',$row[font]);}
			$font = 'color:'.htmlspecialchars($row[font]).';'.$bold;
		}else{$font = '';$bold = '';}	
		if($_POST[html]==$row[ap]){$zindex = '';}else{$zindex = 'z-index:-1;opacity:0;';}	
		$webhtm .= '<!-- Page --><div id="p'.$row[ap].'" style="'.$bghtml.$wdh.'position:absolute;left:0;top:0;'.$font.$zindex.'" class="'.$tabnwdh.'divp">';
		if($nav)$webhtm .= '<!-- Swiper --><div class="swiper-container" id="swiper-container-'.$pj.$ap.'" style="position:relative">'.$htmltabn.'<div class="swiper-wrapper">';
		$webhtm .= file_get_contents('../panel/'.$pj.'/'.$ap.'.html');
		
		if($nav)$webhtm .= '</div></div><!-- Swiper -->';	
		$webhtm .= '</div><!-- p'.$row[ap].' --><!-- Page -->';	
		
	
		//if(!$webaudio){
			//if(strpos($webhtm,'<!--sysaudiosys!-->')==true){
			//$webaudio =1;
			//if(!$webaudio)$htm = str_replace('<!--<script src="js/webaudio.js">< /script>-->','<script src="js/webaudio.js"></ script>',$htm);			
			//;}
		//}
		
		if(!$playlist){
			if(strpos($webhtm,'<!--sysplaylistsys!-->')==true){
			$playlist =1;
			$htm = str_replace('<!--<script src="js/playlist.js"></script>-->','<script src="js/playlist.js"></script>',$htm);			
			;}
		}
		
		if(!$gridswip){
			if(strpos($webhtm,'<!--sysgridswipsys!-->')==true){
			$gridswip =1;
			if(!$gridpic)$htm = str_replace('<!--<script src="js/gridpic.js"></script>-->','<script src="js/gridpic.js"></script>',$htm);
			//if(!$calendar and !$owl)$htm = str_replace('<!--<script src="js/owl.min.js"></ script>-->','<script src="js/owl.min.js"></ script>',$htm);
			//if(!$calendar and !$owl)$htm = str_replace('<!--<link rel="stylesheet" href="css/owl.css">-->','<link rel="stylesheet" href="css/owl.css">',$htm);					
			;}
		}
		
		if(!$gridpic and !$gridswip){
			if(strpos($webhtm,'<!--sysgridpicsys!-->')==true){
			$gridpic =1;
			$htm = str_replace('<!--<script src="js/gridpic.js"></script>-->','<script src="js/gridpic.js"></script>',$htm);		
			;}
		}
		
		if(!$dw){
			if(strpos($webhtm,'<!--sysdwsys!-->')==true){
			$dw =1;
			$htm = str_replace('<!--<script src="js/dw.js"></script>-->','<script src="js/dw.js"></script>',$htm);	
			//if(!$video){
			//$htm = str_replace('<!--<script src="js/video.js"></ script>-->','<script src="js/video.js"></ script>',$htm);
			//$video =1;		
			//;}	
			;}
		}
				
		if(!$video){
			if(strpos($webhtm,'<!--sysvideosys!-->')==true){			
			$htm = str_replace('<!--<script src="js/video.js"></script>-->','<script src="js/video.js"></script>',$htm);	
			$video =1;		
			;}
		}	
			
		if(!$playground){
			if(strpos($webhtm,'<!--sysplaygroundsys!-->')==true){			
			$htm = str_replace('<!--<script src="js/playground.js"></script>-->','<script src="js/playground.js"></script>',$htm);	
			$playground =1;		
			;}
		}	
		
		if(!$qr){
			if(strpos($webhtm,'<!--sysqrsys!-->')==true){			
			$htm = str_replace('<!--<script src="js/jquery.qrcode.min.js"></script><script src="js/qr.js"></script>-->','<script src="js/jquery.qrcode.min.js"></script><script src="js/qr.js"></script>',$htm);	
			$htm = str_replace('<!--<script src="js/jquery.nest.js"></script>-->','<script src="js/jquery.nest.js"></script>',$htm);	
			$qr =1;	$nest =1;
			;}
		}		


		if(!$listview){
			if((strpos($webhtm,'<!--syslistviewsys!-->')==true and strpos($webhtm,'data-option="')==true) or (strpos($webhtm,'<!--syslistviewnsys!-->')==true and strpos($webhtm,'data-option="')==true) ){
			$listview =1;	
			$htm = str_replace('<!--<script src="js/fastbtn.js"></script>-->','<script src="js/fastbtn.js"></script>',$htm);	
			;}
		}
		
		if((strpos($webhtm,'<!--syslistviewsys!-->')==true and strpos($webhtm,'data-option="')==true) or (strpos($webhtm,'<!--syslistviewnsys!-->')==true and strpos($webhtm,'data-option="')==true) ){			
			if(file_exists('../panel/'.$pj.'/panel'.$ap.'.html')){
				$htmlpanel  .= file_get_contents('../panel/'.$pj.'/panel'.$ap.'.html');
			;}
		}
		
		if(!$csslistview){
			if(strpos($webhtm,'<!--syslistviewsys!-->')==true and strpos($webhtm,'ui-li-thumb')==true){
			$csslistview =1;
			$htm = str_replace('<!--<link rel="stylesheet" href="css/gridlistview.css">-->','<link rel="stylesheet" href="css/gridlistview.css">',$htm);		
			;}
		}
								
		if(!$form){
			if(strpos($webhtm,'<!--sysformsys!-->')==true){
			$form =1;
			//$formvalid =1;
			$htm = str_replace('<!--<script src="js/form.js"></script>-->','<script src="js/form.js"></script>',$htm);			
			;}
			if(!$qr){
			if(strpos($webhtm,'ui-icon-qr')==true){
			$htm = str_replace('<!--<script src="js/jquery.qrcode.min.js"></script><script src="js/qr.js"></script>-->','<script src="js/jquery.qrcode.min.js"></script><script src="js/qr.js"></script>',$htm);	
			$htm = str_replace('<!--<script src="js/jquery.nest.js"></script>-->','<script src="js/jquery.nest.js"></script>',$htm);	
			$qr =1;	$nest =1;		
			;};}
		}
		
		
		
		if(!$gt){
			if(strpos($webhtm,'<!--sysgtsys!-->')==true){
			$gt =1;
			$htm = str_replace('<!--<script src="js/gt.js"></script>-->','<script src="js/gt.js"></script>',$htm);
			;}
		}
		
		if(!$calendar){
			if(strpos($webhtm,'<!--syscalendarsys!-->')==true){
			$calendar =1;
			if(strpos($webhtm,'getPhoto()')==true and !$photo){
			$htm = str_replace('<!--<script src="js/photo.js"></script>-->','<script src="js/photo.js"></script>',$htm);$photo =1;}
			$htm = str_replace('<!--<script src="js/calendar.js"></script>-->','<script src="js/calendar.js"></script>',$htm);
			//if(!$gridswip and !$owl)$htm = str_replace('<!--<script src="js/owl.min.js"></ script>-->','<script src="js/owl.min.js"></ script>',$htm);
			//if(!$gridswip and !$owl)$htm = str_replace('<!--<link rel="stylesheet" href="css/owl.css">-->','<link rel="stylesheet" href="css/owl.css">',$htm);					
			;}
		}

		//if(!$owl and !$popuppic and !$popuppics){
			//if(strpos($webhtm,'<!--syspopuppicsys!-->')==true and strpos($htm,'<!--data')==true){
			//$popuppic =1;
			//$htm = str_replace('<!--<script src="js/owl.min.js"></ script>-->','<script src="js/owl.min.js"></ script>',$htm);
			//$htm = str_replace('<!--<link rel="stylesheet" href="css/owl.css">-->','<link rel="stylesheet" href="css/owl.css">',$htm);			
			//;}
		//}

		//if(!$owl and !$popuppic and !$popuppics){
			//if(strpos($webhtm,'<!--syspopuppicssys!-->')==true and strpos($htm,'<!--data')==true){
			//$popuppics =1;
			//$htm = str_replace('<!--<script src="js/owl.min.js"></ script>-->','<script src="js/owl.min.js"></ script>',$htm);
			//$htm = str_replace('<!--<link rel="stylesheet" href="css/owl.css">-->','<link rel="stylesheet" href="css/owl.css">',$htm);			
			//;}
		//}
		
		if(!$Vpopuppics){
			if(strpos($webhtm,'<!--syspopuppicssys!-->')==true and strpos($webhtm,'swiper-lazy')==true){
			$Vpopuppics =1;
			$htm = str_replace('<!--<script src="js/popupics.js"></script>-->','<script src="js/popupics.js"></script>',$htm);
			;}
		}
		
		if(!$Vpopuppics){
			if(strpos($webhtm,'<!--syspopuppicsys!-->')==true and strpos($webhtm,'swiper-lazy')==true){
			$Vpopuppics =1;
			$htm = str_replace('<!--<script src="js/popupics.js"></script>-->','<script src="js/popupics.js"></script>',$htm);
			;}
		}
				
		//if(!$owl and !$calendar and !$popuppics and !$popuppic){
			//if(strpos($webhtm,'<!--sysalbumowlsys!-->')==true){
			//$owl =1;
			//$htm = str_replace('<!--<script src="js/owl.min.js"></ script>-->','<script src="js/owl.min.js"></ script>',$htm);
			//$htm = str_replace('<!--<link rel="stylesheet" href="css/owl.css">-->','<link rel="stylesheet" href="css/owl.css">',$htm);			
			//;}
		//}
		
		
		if(!$ifrpic){
			if(strpos($webhtm,'<!--sysifrpicsys!-->')==true){
			$ifrpic =1;
			$htm = str_replace('<!--<script src="js/ifrpics.js"></script>-->','<script src="js/ifrpics.js"></script>',$htm);		
			$htm = str_replace('<!--<link rel="stylesheet" href="css/ifrpi.css">-->','<link rel="stylesheet" href="css/ifrpi.css">',$htm);			
			;}
		}
		
		if(!$ifrpr){
			if(strpos($webhtm,'&&&animated ')==true){
			$ifrpr = 1;
			$htm = str_replace('<!--<link rel="stylesheet" href="css/animate.min.css">-->','<link rel="stylesheet" href="css/animate.min.css">',$htm);		
			;}
		}
		
		if(!$tabs){
			if(strpos($webhtm,'<!--systabssys!-->')==true){			
			$htm = str_replace('<!--<script src="js/tabs.js"></script>-->','<script src="js/tabs.js"></script>',$htm);	
			$tabs =1;		
			;}
		}	

		
		if(file_exists('../panel/'.$pj.'/web'.$row[ap].'.js')){
		$htmljs .= file_get_contents('../panel/'.$pj.'/web'.$row[ap].'.js');	
		
			if(file_exists('../panel/'.$pj.'/panel'.$row[ap].'.js')){
				$htmljs .= file_get_contents('../panel/'.$pj.'/panel'.$row[ap].'.js');
			;}
		
		}//if(file_exists(
			
		
		$htmltabn='';

		
		;}//if($row[hidden]!=5){
	
	;};}	
	
		if(file_exists('../website/'.$pj.'/js/agree.js')){
		 $agreejs = 'if(!localStorage.getItem("agree"))window.location.href = "agree.html";';
		 file_put_contents('../website/'.$pj.'/js/agreejs.js',$agreejs);	 
		;}
		
		if($_POST[html]){$webhtm = str_replace('data-index=""','data-index="'.$_POST[html].'"',$webhtm);$htmljsindex=$_POST[html];}
		else{$webhtm = str_replace('data-index=""','data-index="'.$apindex.'"',$webhtm);$htmljsindex=$apindex;}
		
		
		$htmljsindn = '$("#appmenu'.$htmljsindex.'").click();';
		
		
		//if(file_exists('../panel/'.$pj.'/web'.$htmljsindex.'.js')){
			//$htmljsindex = file_get_contents('../panel/'.$pj.'/web'.$htmljsindex.'.js');
			//if(strpos($htmljsindex,'/*ajaxs*/')!=false){
				//$htmljsindex = explode('ajax*/',$htmljsindex);
				//$htmljsindns = explode('/*ajaxs*/',$htmljsindex[1]);
				//$htmljsindn = $htmljsindns[0];
			//;}
		//;}
		
		if($_POST[plugcache]){$htm= str_replace('<!--cache','<!--cache!-->',$htm);$htm= str_replace('>cache-->','><!--cache!-->',$htm);}
		
		$htm = str_replace('<!--html-->','<!--html-->'.$webhtm.'</div><!--content!--><!--panelhtml-->'.$htmlpanel.'<!--panelhtml--></div><!--page!-->',$htm);
		if($agreejs)$htm = str_replace('<!--<script src="js/agreejs.js"></script>-->','<script src="js/agreejs.js"></script>',$htm);
		file_put_contents('../website/'.$pj.'/index.html',$htm);	
		$htm ='';






	$sql=$db->query("select * from webhtml where style='apps' and pjnbr='$pj'");
	if($sql){
	while($row=$sql->fetch()){
		if($row[hidden]!=5){
		if($row[apn])$row[ap]=$row[apn];		
		copy('../panel/'.$pj.'/web'.$row[ap].'.html', '../website/'.$pj.'/web'.$row[ap].'.html');		
	;}//if($row[hidden]!=5){ 
	;};}	

		if(file_exists('../js/apngcm.js') and ($_POST[GCM] or $_POST[pushURL])){
			copy('../js/apngcm.js', '../website/'.$pj.'/js/apngcm.js');
			$apngcm .= 'var gcm =[];';
			if($_POST[pushURL]){$apngcm .= 'gcm[0] = "'.htmlspecialchars($_POST[pushURL]).'";';}else{$apngcm .= 'gcm[0] = "";';}
			$apngcm .= 'gcm[1] = "";';		
			$apngcm .= 'gcm[2] = "1";';
			if($_POST[GCM]){$apngcm .= 'gcm[3] = "'.htmlspecialchars($_POST[GCM]).'";';}else{$apngcm .= 'gcm[3] = "";';}
			$apngcm .= 'localStorage.setItem(\'gcm\',JSON.stringify(gcm));
			'; 
		}
		
		$htmljs = str_replace('/*ajaxs*/',';});',$htmljs);		
		$htmljs = str_replace('/*ajax',"$(document).on('click', '#appmenu",$htmljs);
		$htmljs = str_replace('ajax*/',"',function (event) {",$htmljs);
		$appsystemjs  = file_get_contents('../js/appsystem.js').';
		$(document).on("pageshow", "#appageone", function(){ '.$apngcm.$htmljsindn
		.$htmljs.'});$(document).ready(function(){$("#ifrspinn").hide();});';;
		file_put_contents('../website/'.$pj.'/js/appsystem.js',$appsystemjs);
			$htmljs='';
		
		//if($nigridic){copy('../js/zoomico.png', '../website/'.$pj.'/js/zoomico.png');
		//copy('../js/jquery.nicescroll.min.js', '../website/'.$pj.'/js/jquery.nicescroll.min.js');}
		if($playlist or $formplaylist)copy('../js/playlist.js', '../website/'.$pj.'/js/playlist.js');
		if($video or $formvideo)copy('../js/video.js', '../website/'.$pj.'/js/video.js');
		if($playground or $formplayground)copy('../js/playground.js', '../website/'.$pj.'/js/playground.js');
		if($qr or $formqr){copy('../js/jquery.qrcode.min.js', '../website/'.$pj.'/js/jquery.qrcode.min.js');		
				copy('../js/qr.js', '../website/'.$pj.'/js/qr.js');}
		if($nest or $formnest)copy('../js/jquery.nest.js', '../website/'.$pj.'/js/jquery.nest.js');				
		if($form or $formm){copy('../js/form.js', '../website/'.$pj.'/js/form.js');
				if(!$qr and !$formqr){copy('../js/jquery.qrcode.min.js', '../website/'.$pj.'/js/jquery.qrcode.min.js');		
				copy('../js/qr.js', '../website/'.$pj.'/js/qr.js');};}	
		if($gt or $formgt){copy('../js/gt.js', '../website/'.$pj.'/js/gt.js');}
				 //if(!$qr)copy('../css/calendar.css', '../website/'.$pj.'/calendar.css');}		
		if($calendar or $formcalendar){copy('../js/calendar.js', '../website/'.$pj.'/js/calendar.js');	}					
				 //if(!$gnt)copy('../css/calendar.css', '../website/'.$pj.'/calendar.css');}			
		//if($owl or $calendar){copy('../js/owl.min.js', '../website/'.$pj.'/js/owl.min.js');	
				// if(!$qr)copy('../css/owl.css', '../website/'.$pj.'/owl.css');}	
		if($tabs or $formtabs)copy('../js/tabs.js', '../website/'.$pj.'/js/tabs.js');
		if($ifrpic or $formifrpic){copy('../js/ifrpics.js', '../website/'.$pj.'/js/ifrpics.js');	
				    copy('../jscss/ifrpi.css', '../website/'.$pj.'/css/ifrpi.css');}
		if($ifrpr)copy('../jscss/animate.min.css', '../website/'.$pj.'/css/animate.min.css');
		if($dw or $formdw)copy('../js/dw.js', '../website/'.$pj.'/js/dw.js');	
		if($csslistview or $formcsslistview)copy('../jscss/gridlistview.css', '../website/'.$pj.'/css/gridlistview.css');
		if($listview or $formlistview)copy('../js/fastbtn.js', '../website/'.$pj.'/js/fastbtn.js');
		if($Vpopuppics or $formVpopuppics)copy('../js/popupics.js', '../website/'.$pj.'/js/popupics.js');
		if($photo or $formphoto)copy('../js/photo.js', '../website/'.$pj.'/js/photo.js');	
		if($gridpic or $gridswip or $formgridpic or $formgridswip)copy('../js/gridpic.js', '../website/'.$pj.'/js/gridpic.js');	
		
		
				
		copy('../template/config.xml', '../website/'.$pj.'/config.xml');
		$fig = file_get_contents('../website/'.$pj.'/config.xml');
		
		if($_POST[website]){
			$appsys = explode('.',$_POST[website]);
			if($appsys[2]){$appsys[2] = $appsys[2].'.';$appsys2 = '';}else{$appsys[2] = '';$appsys2 = '.appsystem';}
			$appsystem = $appsys[2].$appsys[1].'.'.$appsys[0].$appsys2;
		}else{
			$appsystem = str_replace('@','.',$_POST[email]);
			$appsystem = str_replace('_','',$appsystem);
			$appsys = explode('.',$appsystem);
			if(!$appsys[2])$appsys[2] = 'appsystem';
			$appsystem = $appsys[2].'.'.$appsys[1].'.'.$appsys[0];		
		;}
		
		$fig = str_replace("appsystem",htmlspecialchars($appsystem),$fig);
		$fig = str_replace('"versioncode"','"'.htmlspecialchars($_POST[versioncode]).'"',$fig);	
		$fig = str_replace('"version"','"'.htmlspecialchars($_POST[version]).'"',$fig);	
		$fig = str_replace('email="','email="'.htmlspecialchars($_POST[email]),$fig);	
		$fig = str_replace('href=""','href="'.htmlspecialchars($_POST[website]).'"',$fig);	
		$fig = str_replace('authornm',htmlspecialchars($_POST[author]),$fig);
		$fig = str_replace('Appmn',htmlspecialchars($_POST[appnm]),$fig);	
		$fig = str_replace('Appdes',htmlspecialchars($_POST[appdes]),$fig);
		
		if($_POST[appicon]){
		$iconxml = '<!-- iPhone / iPod Touch  -->
		<icon src="icon-60.png" gap:platform="ios" width="60" height="60" />
		<icon src="icon-60@2x.png" gap:platform="ios" width="120" height="120" />
		<!-- iPad -->
		<icon src="icon-76.png" gap:platform="ios" width="76" height="76" />
		<icon src="icon-76@2x.png" gap:platform="ios" width="152" height="152" />
		<!-- Settings Icon -->
		<icon src="icon-small.png" gap:platform="ios" width="29" height="29" />
		<icon src="icon-small@2x.png" gap:platform="ios" width="58" height="58" />
		<!-- Spotlight Icon -->
		<icon src="icon-40.png" gap:platform="ios" width="40" height="40" />
		<icon src="icon-40@2x.png" gap:platform="ios" width="80" height="80" />
		
		<icon src="ldpi.png" gap:platform="android" gap:density="ldpi" />
		<icon src="mdpi.png" gap:platform="android" gap:density="mdpi" />
		<icon src="hdpi.png" gap:platform="android" gap:density="hdpi" />
		<icon src="xhdpi.png" gap:platform="android" gap:density="xhdpi" />
		<icon src="xxhdpi.png" gap:platform="android" gap:density="xxhdpi" />';
		
		
		$fig = str_replace('<!--icon!-->',$iconxml,$fig);
		}
		
		if($_POST[splash]){
		$splashxml = '<gap:splash src="splash.png" />';
		if($_POST[splash]=='splashs'){
		$splashxml = '<gap:splash src="splash.png" />
		<!-- iPhone and iPod touch -->
		<gap:splash src="Default.png" gap:platform="ios" width="320" height="480" />
		<gap:splash src="Default@2x.png" gap:platform="ios" width="640" height="960" />
		<!-- iPhone 5 / iPod Touch (5th Generation) -->
		<gap:splash src="Default-568h@2x.png" gap:platform="ios" width="640" height="1136" />
		<!-- iPad -->
		<gap:splash src="Default-Portrait.png" gap:platform="ios" width="768" height="1024" />
		<gap:splash src="Default-Landscape.png" gap:platform="ios" width="1024" height="768" />
		<!-- Retina iPad -->
		<gap:splash src="Default-Portrait@2x.png" gap:platform="ios" width="1536" height="2048" />
		<gap:splash src="Default-Landscape@2x.png" gap:platform="ios" width="2048" height="1536" />
		
		<gap:splash src="ldpi.png" gap:platform="android" gap:qualifier="ldpi" />
		<gap:splash src="mdpi.png" gap:platform="android" gap:qualifier="mdpi" />
		<gap:splash src="hdpi.png" gap:platform="android" gap:qualifier="hdpi" />
		<gap:splash src="xhdpi.png" gap:platform="android" gap:qualifier="xhdpi" />
		<gap:splash src="fr-xhdpi.png" gap:platform="android" gap:qualifier="fr-xhdpi" />
		<gap:splash src="portrait-xxhdpi.png" gap:platform="android" gap:qualifier="port-xxhdpi" />
		<gap:splash src="landscape-xxhdpi.png" gap:platform="android" gap:qualifier="land-xxhdpi" />';
		}
		
		$fig = str_replace('<!--SplashScreen!-->',$splashxml,$fig);
		}
		
		if($form or $calendar)$fig = str_replace('<!--<gap:plugin name="de.appplant.cordova.plugin.email-composer" version="0.8.2" />!-->','<gap:plugin name="de.appplant.cordova.plugin.email-composer" version="0.8.2" />',$fig);
		if($_POST[openapp])$fig = str_replace('<!--<gap:plugin name="ch.ti8m.documenthandler" version="0.2.1" />!-->','<gap:plugin name="ch.ti8m.documenthandler" version="0.2.1" />',$fig);
		if($_POST[openbrowser])$fig = str_replace('<!--<gap:plugin name="org.apache.cordova.inappbrowser" version="0.5.2" />!-->','<gap:plugin name="org.apache.cordova.inappbrowser" version="0.5.2" />',$fig);
		if($calendar)$fig = str_replace('<!--<gap:plugin name="nl.x-services.plugins.calendar" version="4.2" />!-->','<gap:plugin name="nl.x-services.plugins.calendar" version="4.2" />',$fig);
		if($photo)$fig = str_replace('<!--<gap:plugin name="org.apache.cordova.camera" version="0.3.2" />!-->','<gap:plugin name="org.apache.cordova.camera" version="0.3.2" />',$fig);
		if($_POST[whatsapp])$fig = str_replace('<!--<gap:plugin name="mobi.moica.whatsapp" version="0.0.1" />!-->','<gap:plugin name="mobi.moica.whatsapp" version="0.0.1" />',$fig);
		if($_POST[plugcache])$fig = str_replace('<!--<gap:plugin name="com.sharinglabs.cordova.plugin.cache" version="1.0.0" />!-->','<gap:plugin name="com.sharinglabs.cordova.plugin.cache" version="1.0.0" />',$fig);
		if($apngcm){$fig = str_replace('<!--<gap:plugin name="com.phonegap.plugins.pushplugin" version="2.4.0" />!-->','<gap:plugin name="com.phonegap.plugins.pushplugin" version="2.4.0" />',$fig);
		$fig = str_replace('<!--<gap:plugin name="org.apache.cordova.dialogs" version="0.2.10" />!-->','<gap:plugin name="org.apache.cordova.dialogs" version="0.2.10" />',$fig);}
		
		file_put_contents('../website/'.$pj.'/config.xml',$fig);
		$fig='';	
	;}//if($_POST['appd']){	

	if($_POST['appd']){
		echo "<meta http-equiv='refresh' content='0;URL=zip.php?pj=".htmlspecialchars($pj)."'>";
	;}else{
		echo "<meta http-equiv='refresh' content='0;URL=app.php?pj=".htmlspecialchars($pj)."'>";
	;}
;}
?>
