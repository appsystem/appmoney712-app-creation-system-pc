<?php session_start();  

if($_GET[pj] and !preg_match('/^[0-9]*$/',$_GET[pj]))exit;
if($_GET[pj])$pj = $_GET[pj];
if($_GET[ap] and !preg_match('/^[0-9]*$/',$_GET[ap]))exit;
if($_GET[ap])$ap = $_GET[ap];
if($_GET[pn] and !preg_match('/^[0-9]*$/',$_GET[pn]))exit;
if($_GET[pn])$pn = $_GET[pn];
if($_GET[alt])$alt = $_GET[alt];
if($_GET[tut])$tut = 1;

define("ROOTPATH", "../");
include_once (ROOTPATH.'administration/db_conn.php');



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
	<!--copyiframe--><!--copyiframes-->
	<?php if($_SESSION[tutorial] and !$pj){ 
	
	$sqltry=$db->query("select * from webpj where title='quicktry'");
	if($sqltry)$rowtry=$sqltry->fetch();
	if($rowtry[cno]){
		$pjtry = $rowtry[cno];
		echo '<script>	
		if(document.URL.indexOf("pj=") == -1){	 
	 	 setTimeout(function(){$("#createpjt").popup("open");},350);
		 setTimeout(function(){ window.location = "menudesign.php?pj='.$pjtry.'";},5500);
		 }
	 	</script>';
	;}else{
		$tdy=date('Y-m-d');
		$sql=$db->exec("insert into webpj (title,ptheme,pjbg,date,menubtn)"."values('quicktry','b','','$tdy','btns')"); 
		$sql=$db->query("select max(cno) as cno from webpj");
		if($sql)$row=$sql->fetch();
		$pj = $row[cno];
		if(file_exists('../website/'.$row[cno])==false and $row[cno]){mkdir('../website/'.$row[cno]);mkdir('../website/'.$row[cno].'/images');}
		if(file_exists('../panel/'.$row[cno])==false and $row[cno]){mkdir('../panel/'.$row[cno]);mkdir('../panel/'.$row[cno].'/images');}
		$sql=$db->query("select max(nbr) as nbr from webpj");
		if($sql)$row=$sql->fetch();
		$nbr = $row[nbr]+1;
		$db->exec("update webpj set nbr='$nbr' where cno='$row[cno]'");
		
		$sql=$db->exec("insert into webhtml (title,des,typ,hidden,date,pjnbr,nbr,fllscr,style,pjn,apn)"."values('Playground [quicktry]','quick try use','','1','$tdy','$pj','1','1','app','1','1')"); 
			$sql=$db->query("select max(cno) as cno from webhtml");
			if($sql)$row=$sql->fetch();
			$db->exec("update webhtml set ap='$row[cno]' where cno='$row[cno]'");
			$ap = $row[cno];$apv = $row[cno];
			if($row[cno]){
			copy('../quicktry/play.js', '../panel/'.$pj.'/web'.$ap.'.js');
			copy('../quicktry/play.html', '../panel/'.$pj.'/'.$ap.'.html');
			;}
			
		$sql=$db->exec("insert into webmenu (typ,pjnbr,title,titlebg,function,html,aphtml,subm,hidden,theme,nbr,wsp,date)"."values('link','$pj','Playground','','','','$ap','','1','','1','','$tdy')"); 
		$sql=$db->query("select max(cno) as cno from webmenu");
		if($sql)$row=$sql->fetch();
		$db->exec("update webmenu set ap='$row[cno]',subm='$row[cno]' where cno='$row[cno]'");
		
		$sql=$db->exec("insert into webhtml (title,des,typ,hidden,date,pjnbr,nbr,fllscr,style,pjn,apn)"."values('Album [quicktry]','quick try use','','1','$tdy','$pj','2','1','app','1','2')"); 
			$sql=$db->query("select max(cno) as cno from webhtml");
			if($sql)$row=$sql->fetch();
			$db->exec("update webhtml set ap='$row[cno]' where cno='$row[cno]'");
			$ap = $row[cno];

			if($row[cno]){
			copy('../quicktry/album.js', '../panel/'.$pj.'/web'.$ap.'.js');
			copy('../quicktry/album.html', '../panel/'.$pj.'/'.$ap.'.html');
			copy('../images/album.jpg', '../panel/'.$pj.'/images/album.jpg');
			copy('../images/ishow2.gif', '../panel/'.$pj.'/images/ishow2.gif');
			copy('../images/ishow3.gif', '../panel/'.$pj.'/images/ishow3.gif');
			;}
			copy('../quicktry/menu.html', '../panel/'.$pj.'/menu.html');	
			$html = file_get_contents('../panel/'.$pj.'/menu.html');	
			$html = str_replace('44',$apv,$html);
			$html = str_replace('55',$ap,$html);
			file_put_contents('../panel/'.$pj.'/menu.html',$html);
			
				
		$sql=$db->exec("insert into webmenu (typ,pjnbr,title,titlebg,function,html,aphtml,subm,hidden,theme,nbr,wsp,date)"."values('link','$pj','Album','','','','$ap','','1','','2','','$tdy')"); 
		$sql=$db->query("select max(cno) as cno from webmenu");
		if($sql)$row=$sql->fetch();
		$db->exec("update webmenu set ap='$row[cno]',subm='$row[cno]' where cno='$row[cno]'");
		echo '<script>	
	 	 setTimeout(function(){$("#createpjt").popup("open");},350);
		 setTimeout(function(){ window.location = "menudesign.php?pj='.$pj.'";},5500);
	 	</script>';
	;}
;}else if(!$_GET[plt]){
$sql=$db->query("select * from webpj where cno='$pj'");
	if($sql)$row=$sql->fetch();
	$menunbr = $row[menunbr]+1;
	
	if($_SESSION[tutorial] and $pj and $tut){ 
		echo '<script>	
	 	 setTimeout(function(){$("#linkmnu").popup("open");},350);
	 	</script>';
	;}else if($_SESSION[tutorial] and $pj and !$alt and !$tut){ 
		echo '<script>	
	 	 setTimeout(function(){$("#createmnu").popup("open");},1100);
		 setTimeout(function(){ window.location = "menudesign.php?pj='.$pj.'&alt=panelbtn";},7600);
	 	</script>';
	;}else if($_SESSION[tutorial] and $pj and $alt and !$tut){ 
		echo '<script>	
	 	 setTimeout(function(){$("#createmns").popup("open");},350);
	 	</script>';
	
	;}
;}//if(!$_GET[plt]){
?>
	</head>
	<body><div data-role="page" data-theme="f" class="page indexhtml">
	<div  data-role="header" id="hrdiv" data-theme="f"><h1 id="hrs"><?php if($_SESSION[tn]==PRC){echo '菜单设计 - AppMoney712 移动应用设计系统';}else if($_SESSION[tn]==EN){echo 'Menu design - AppMoney712 APP Creation System';}else{echo '菜單設計 - AppMoney712 移動應用設計系統';}?></h1><a href="#navigations" id="menubttns"  data-rel="popup" data-transition="pop" class="ui-btn-left ui-btn ui-btn-inline ui-corner-all ui-btn-icon-left ui-icon-bars">&nbsp;&nbsp;&nbsp;</a>
	</div><!-- /header --><div  class="ui-content pagebg"><!--copyiframe--><!-- /content!-->
	<?php if(!$_GET[plt]){?>
	<a href="#menupanel" data-rel="panel" class="ui-btn ui-btn ui-btn-inline ui-corner-all ui-mini ui-btn-icon-top ui-icon-bars"><?php if($_SESSION[tn]==PRC){echo '预览';}else if($_SESSION[tn]==EN){echo 'Preview';}else{echo '預覽';}
	if(!file_exists('../panel/'.$pj.'/menu.html')){
	 if($_SESSION[tn]==PRC){echo ' [您未设计菜单数据]';}else if($_SESSION[tn]==EN){echo ' [No menu data for this project]';}else{echo ' [您未設計菜單數據]';}
	;}
	
	?></a>

	
	<?php if($row[menubtn]){ 
	if($row[menubtn]=='btns'){$row[menubtn] = '&nbsp;&nbsp;&nbsp;';}else{$row[menubtn] = htmlspecialchars($row[menubtn]);}
	if($row[menubtns]=='btns' or !$row[menubtns]){$menubtns = '&nbsp;';}else{$menubtns = htmlspecialchars($row[menubtns]);}
	?>
	<div data-role="controlgroup" data-type="horizontal" class="ui-btn-inline" data-corners="false"><?php if($prev){?><a href="#" class="ui-btn ui-btn-y ui-btn-inline ui-mini ui-btn-icon-left ui-icon-carat-l" style="background-image:url(../images/<?php echo $pj.'/'.htmlspecialchars($row[mnbgs]) ?>);background-size:100% 100%;"><?php echo $menubtns;?></a><?php ;}//if($prev){?><a href="#menupanel" data-rel="panel" class="ui-btn ui-btn-y ui-btn-inline ui-mini ui-btn-icon-top ui-icon-bars" style="background-image:url(../images/<?php echo $pj.'/'.htmlspecialchars($row[mnbg]) ?>);background-size:100% 100%;"><?php echo $row[menubtn];?></a></div>
	<?php ;} ?>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<a href="#step" data-rel="popup" data-transition="pop" class="ui-btn ui-btn ui-btn-inline ui-corner-all ui-mini ui-btn-icon-left ui-icon-edit"><?php if($_SESSION[tn]==PRC){echo '设计步骤';}else if($_SESSION[tn]==EN){echo 'Design Step';}else{echo '設計步驟';}?></a>
	
	<a href="project.php" data-ajax="false" class="ui-btn ui-btn ui-btn-inline ui-corner-all ui-mini ui-btn-icon-left ui-icon-edit"><?php if($_SESSION[tn]==PRC){echo '专案管理';}else if($_SESSION[tn]==EN){echo 'Project Management';}else{echo '專案管理';}?></a>
	
	<?php $sqlw=$db->query("select cno from webmenu where pjnbr='$row[cno]'");
		  if($sqlw)$roww=$sqlw->fetch();
		  if($roww[cno]){?>
	<a href="menudesign.php?pj=<?php echo htmlspecialchars($row[cno])?>&plt=1" data-ajax="false" class="ui-btn ui-btn ui-btn-inline ui-corner-all ui-mini ui-btn-icon-left ui-icon-bars"><?php if($_SESSION[tn]==PRC){echo '此专案应用页列表';}else if($_SESSION[tn]==EN){echo 'Page List of this project';}else{echo '此專案應用頁列表';}?></a>
			<?php ;} ?>
	
	<a href="menudesign.php" data-ajax="false" class="ui-btn ui-btn ui-btn-inline ui-corner-all ui-mini ui-btn-icon-left ui-icon-edit"><span style=""><?php if($_SESSION[tn]==PRC){echo '新专案';}else if($_SESSION[tn]==EN){echo 'Edit New Project';}else{echo '新專案';}?></span></a>
	
	<?php $panelhtml = file_get_contents('../panel/'.$pj.'/menu.html');
	$panelhtml = str_replace('(images/','(../panel/'.$pj.'/images/',$panelhtml);
	echo $panelhtml;
	?>
	
	<a href="#quick" data-rel="popup" data-transition="pop" class="ui-btn ui-btn-w ui-btn-inline ui-corner-all ui-mini ui-btn-icon-left ui-icon-info" style="color:black;"><?php if($_SESSION[tn]==PRC){echo '快速试用';}else if($_SESSION[tn]==EN){echo 'Quick try';}else{echo '快速試用';}?></a>
	
	<div data-role="popup" id="quick" style="min-width:300px" data-theme="f"><a href="#" class="ui-btn ui-corner-all ui-icon-delete ui-btn-icon-notext ui-btn-right" data-rel="back"></a>	
	<h4 style="color:pink"><?php if($_SESSION[tn]==PRC){echo '创建专案';}else if($_SESSION[tn]==EN){echo 'Create project';}else{echo '創建專案';}?></h4>
	<p style="color:black">
	<?php if($_SESSION[tn]==PRC){echo '填\'专案称\'並送交。';}else if($_SESSION[tn]==EN){echo 'You need to fill in the \'Project name\' and click the SEND button.';}else{echo '填\'專案稱\'並送交。';}?>
	</p>
	<hr>
	<h4 style="color:pink"><?php if($_SESSION[tn]==PRC){echo '创建菜单按钮';}else if($_SESSION[tn]==EN){echo 'Create menu button';}else{echo '創建菜單按鈕';}?></h4>
	<p style="color:black"><?php if($_SESSION[tn]==PRC){echo '点撀\'设置侧控菜单按钮\'，填\'菜单按钮标题\'并送交，才能启用菜单按钮。';}else if($_SESSION[tn]==EN){echo 'You need to click the \'Edit Panel button\' and the \'Panel button title\' and click the SEND button to enable the menu function.';}else{echo '點撀\'設置側控菜單按鈕\'，填\'菜單按鈕標題\'並送交，才能啟用菜單按鈕。';}?></p>
	<p style="color:black"><?php if($_SESSION[tn]==PRC){echo '点撀\'编写此专案新菜单数据\'，填\'菜单标题\'并送交，重覆步骤但填上另一标题。';}else if($_SESSION[tn]==EN){echo 'You need to click the \'Edit New Project Menu Data\', fill in the \'Menu title\' and click the SEND button. You can repeat these steps to develop more menu titles.';}else{echo '點撀\'編寫此專案新菜單數據\'，填\'菜單標題\'並送交，重覆步驟但填上另一標題。';}?></p><hr>
	<h4 style="color:pink"><?php if($_SESSION[tn]==PRC){echo '创建应用页';}else if($_SESSION[tn]==EN){echo 'Create APP page';}else{echo '創建應用頁';}?></h4>	
	<p style="color:black"><?php if($_SESSION[tn]==PRC){echo '点撀此页的\'设计步骤\'并点撀\'应用页创建\'，到应用页编辑页。';}else if($_SESSION[tn]==EN){echo 'You need to click the \'Design step\' and the \'APP page design\' to go to APP page editing page to develop APP.';}else{echo '點撀此頁的\'設計步驟\'並點撀\'應用頁創建\'，到應用頁編輯頁。';}?></p>	
	<hr>
	<h4 style="color:pink"><?php if($_SESSION[tn]==PRC){echo '菜单及应用页链结设置';}else if($_SESSION[tn]==EN){echo 'Link of Menu and APP page';}else{echo '菜單及應用頁鏈結設置';}?></h4>
	<p style="color:black"><?php if($_SESSION[tn]==PRC){echo '对此项进行设置,点撀菜单按钮才能令应用内容显示指定应用页,当完成所有应用页设计,您是必须到此页进行此项设置。';}else if($_SESSION[tn]==EN){echo 'This link is to let your APP design showing specific APP page when APP user clicks on the menu button. You need to edit the link of menu buttons after APP page development.';}else{echo '對此項進行設置,點撀菜單按鈕才能令應用內容顯示指定應用頁,當完成所有應用頁設計,您是必須到此頁進行此項設置。';}?></p>		
	<p style="color:black"><?php if($_SESSION[tn]==PRC){echo '在此页底部的列表点撀相关菜单标题,再在\'链结页\'进行设置。';}else if($_SESSION[tn]==EN){echo 'You need to click the APP menu title on the list of this page and select the APP page for the menu title.';}else{echo '在此頁底部的列表點撀相關菜單標題,再在\'鏈結頁\'進行設置。';}?></p>
	
	</div>

	<a href="#infstep" data-rel="popup" data-transition="pop" class="ui-btn ui-btn-b ui-btn-inline ui-corner-all ui-mini">? <?php if($_SESSION[tn]==PRC){echo '步骤';}else if($_SESSION[tn]==EN){echo 'Design Steps';}else{echo '步驟';}?></a>
	<div data-role="popup" id="infstep" style="width:85%" data-position-to="window" data-theme="f"><a href="#" class="ui-btn ui-corner-all ui-icon-delete ui-btn-icon-notext ui-btn-right" data-rel="back"></a>
	<h4 style="color:black"><?php if($_SESSION[tn]==PRC){echo '填写';}else if($_SESSION[tn]==EN){echo 'Data';}else{echo '填寫';}?></h4>
	<p><?php if($_SESSION[tn]==PRC){echo '专案称及侧控菜单按钮,按需只填一次。若需创建菜单,才填标题的相关资料,当巳设计相关应用页,您须再点撀相关标题列表,对标题资料作进一步设定,或者在设计好应用页才设计菜单并填写资料。';}else if($_SESSION[tn]==EN){echo 'The project name and the Panel button are general parameters on your design. You do not need to fill in their values every button titles. If you need to create panel menu for APP page navigation, you need to fill in menu title information. You also need to enter further information or may start to design the panel menu after design of APP pages.';}else{echo '專案稱及側控菜單按鈕,按需只填一次。若需創建菜單,才填標題的相關資料,當巳設計相關應用頁,您須再點撀相關標題列表,對標題資料作進一步設定,或者在設計好應用頁才設計菜單並填寫資料。';}?></p>
	
	<hr>
	<h4 style="color:black"><?php if($_SESSION[tn]==PRC){echo '创建专案及菜单';}else if($_SESSION[tn]==EN){echo 'Creating project and menu';}else{echo '創建專案及菜單';}?></h4>
	<p><?php if($_SESSION[tn]==PRC){echo '简单设计只填专案称。若须菜单按钮,供用户浏览应用页,填菜单的设定资料。';}else if($_SESSION[tn]==EN){echo 'If your design is simple, you need to fill in Project name only. If you need the panel menu on your design for APP user to browse different APP pages, you need to fill in menu information.';}else{echo '簡單設計只填專案稱。若須菜單按鈕,供用戶瀏覽應用頁,才填菜單的設定資料。';}?></p>
	
	<p><?php if($_SESSION[tn]==PRC){echo '应用的颜色主题,应不用填写,应用页能另定颜色。';}else if($_SESSION[tn]==EN){echo 'For the color theme of pages of your APP design, you do not need to select it. You can alter related color on each APP page.';}else{echo '應用的顏色主題,應不用填寫,應用頁能另定顏色。';}?></p>
	
	<p><?php if($_SESSION[tn]==PRC){echo '若不想设置不同的应用页背景,您能对专案定一个背景。';}else if($_SESSION[tn]==EN){echo 'If you do not add different backgrounds to each page, you need to add one background as APP background.';}else{echo '若不想設置不同的應用頁背景,您能對專案定一個背景。';}?></p>
	<p>
	<?php if(!$roww[pjnbr]){if($_SESSION[tn]==PRC){$roww[pjnbr] = '[专案编号]';}else if($_SESSION[tn]==EN){$roww[pjnbr] ='[project number]';}else{$roww[pjnbr] ='[專案編號]';};}
	if($_SESSION[tn]==PRC){echo '若将此背景图像档案置於此软件内,是放在';}else if($_SESSION[tn]==EN){echo 'You need to place this background image file to this software folder ';}else{echo '若將此背景圖像檔案置於此軟件內,是放在';}echo 'panel/'.$roww[pjnbr].'/images/.';?>
	</p>
	<p>
	<?php if($_SESSION[tn]==PRC){echo '若设置背景图像上下左右重覆显示,在档案名加[xy]。e.g. picture[xy].png';}else if($_SESSION[tn]==EN){echo 'If you add [xy] to the picture file name e.g. picture[xy].png, the picture will be repeated both vertically and horizontally.';}else{echo '若設置背景圖像上下左右重覆顯示,在檔案名加[xy]。e.g. picture[xy].png';}?>
	</p>	
	<p>
	<?php if($_SESSION[tn]==PRC){echo '您亦能在背景图像填上rgb颜色码e.g. rgb(125,125,125), rgba颜色码e.g. rgba(125,125,125,0.5) 或 hex颜色码e.g. #123456代替背景图像。';}else if($_SESSION[tn]==EN){echo 'You can add rgb color code e.g. rgb(125,125,125), rgba color code e.g. rgba(125,125,125,0.5) or hex color code e.g. #123456 instead of background picture.';}else{echo '您亦能在背景圖像填上rgb顏色碼e.g. rgb(125,125,125), rgba顏色碼e.g. rgba(125,125,125,0.5) 或 hex顏色碼e.g. #123456代替背景圖像。';}?>
	</p>
	
	
	&nbsp;<a href="tabnexamples.php" class="ui-btn ui-btn-b ui-btn-inline ui-corner-all ui-mini" target="_blank"><?php if($_SESSION[tn]==PRC){echo '例';}else if($_SESSION[tn]==EN){echo 'Example';}else{echo '例';}?></a>&nbsp;
	<a href="tabnexample.php" class="ui-btn ui-btn-b ui-btn-inline ui-corner-all ui-mini" target="_blank"><?php if($_SESSION[tn]==PRC){echo '例';}else if($_SESSION[tn]==EN){echo 'Example';}else{echo '例';}?></a>
	<p><?php if($_SESSION[tn]==PRC){echo '置于应用页顶部是panel菜单按钮,作用是浏览不同功能页,在右边是导航按钮,作用是浏览应用页的不同的功能内容。您能只设置导航按钮。';}else if($_SESSION[tn]==EN){echo 'In the example, you can find panel menu button on the top of page and tab navigation buttons on the right edge. The panel menu is for APP user to browse different APP pages and the tab navigation buttons  are for APP user to browse different functional content on an APP page. You can use the tab navigation buttons only.';}else{echo '置於應用頁頂部是panel菜單按鈕,作用是瀏覽不同功能頁,在右邊是導航按鈕,作用是瀏覽應用頁的不同的功能內容。您能只設置導航按鈕。';}?></p>
	
	<!--<p><?php if($_SESSION[tn]==PRC){echo '您亦能用\'项目列表\'功能创建应用页,在应用页上显示应用页的导航按钮,而不用panel型式,此方法亦只填专案称。';}else if($_SESSION[tn]==EN){echo 'You can use Listview function to create an APP page for navigation instead of panel menu. You only need to fill in Project name for this situation.';}else{echo '您亦能用\'項目列表\'功能創建應用頁,在應用頁上顯示應用頁的導航按鈕,而不用panel型式,此方法亦只填專案稱。';}?></p>!-->
	
	<h4 style="color:black"><?php if($_SESSION[tn]==PRC){echo '复制专案数据';}else if($_SESSION[tn]==EN){echo 'Copy existing project data';}else{echo '複製專案數據';}?></h4>
	<p><?php if($_SESSION[tn]==PRC){echo '若只填专案称及未填菜单资料,您能点撀\'专案管理\'进行复制巳有的专案的数据,作用是复制专案的应用页丶相关档案及数据。';}else if($_SESSION[tn]==EN){echo 'If you fill in project name only, you click the above \'Project Management\' to copy any one of existing projects including its APP page files, related files and data.';}else{echo '若只填專案稱及未填菜單資料,您能點撀\'專案管理\'進行複製巳有的專案的數據,作用是複製專案的應用頁、相關檔案及數據。';}?></p>
	<h4 style="color:black"><?php if($_SESSION[tn]==PRC){echo '创建应用页';}else if($_SESSION[tn]==EN){echo 'Creating APP page';}else{echo '創建應用頁';}?></h4>
	<p><?php if($_SESSION[tn]==PRC){echo '完成专案或菜单的填写,点撀\'设计步骤\'内\'应用页创建\'创建应用页。一个应用页能含不同功能。';}else if($_SESSION[tn]==EN){echo 'After completion of creating project and/or menu, you need to click the \'APP page design\' on the \'Design Step\' button of this page to start designing APP pages. In your design, you can create an APP page containing different functional content.';}else{echo '完成專案或菜單的填寫,點撀\'設計步驟\'內\'應用頁創建\'創建應用頁。一個應用頁能含不同功能。';}?></p>
	<hr>
	<h4 style="color:black"><?php if($_SESSION[tn]==PRC){echo '菜单创建';}else if($_SESSION[tn]==EN){echo 'Menu design steps';}else{echo '菜單創建';}?></h4>
	<p><?php if($_SESSION[tn]==PRC){echo '一个标题等於一个菜单按钮或隔项。';}else if($_SESSION[tn]==EN){echo 'You can create a menu button or a divider by creating a title.';}else{echo '一個標題等於一個菜單按鈕或隔項。';}?></p>
	<p><?php if($_SESSION[tn]==PRC){echo '填\'菜单标题\'及\'型式\',并按需填菜单标题按钮式样的设置资料。巳编写的标题显示列在此页下面,若巳设计此专案的应用页,您能点撀列表标题,才能设置此按钮相关的功能页链结或修改资料。';}else if($_SESSION[tn]==EN){echo 'You need to fill in the \'menu button title\' and the \'button type\'. The title will be showed on the below list of this page. You can add APP page link to it or amend menu button information by clicking the title on the list if any APP page designed.';}else{echo '填\'菜單標題\'及\'型式\',並按需填菜單標題按鈕式樣的設置資料。巳編寫的標題列在此頁下面,若巳設計此專案的應用頁,您能點撀列表標題,才能設置此按鈕相關的應用頁鏈結或修改資料。';}?></p>
	<hr>
	<h4 style="color:black"><?php if($_SESSION[tn]==PRC){echo '浏览菜单';}else if($_SESSION[tn]==EN){echo 'Preview Menu';}else{echo '瀏覽菜單';}?></h4>
	<p><?php if($_SESSION[tn]==PRC){echo '若您巳填标题或没标题(btns)到\'侧控菜单按钮标题\',菜单按钮显示在此页顶部,点撀此按钮显示panel菜单。';}else if($_SESSION[tn]==EN){echo 'If you enter title or btns (a word equal to blank title) to the Panel button title, the designed menu button will be showed on the top of this page. You can click it to show a panel menu.';}else{echo '若您巳填標題或沒標題(btns)到\'側控菜單按鈕標題\',菜單按鈕顯示在此頁頂部,點撀此按鈕顯示panel菜單。';}?></p>
	<p><?php if($_SESSION[tn]==PRC){echo '若應用是IOS [APPLE],不應使用沒有標題的panel菜單按鈕[控制板菜单按钮]。';}else if($_SESSION[tn]==EN){echo 'For IOS APP [APPLE], you are not recommended to use panel menu button without title.';}else{echo '若應用是IOS [APPLE],不應使用沒有標題的panel菜單按鈕[控制板菜單按鈕]。';}?></p>
	</div>
	
	
	<a href="#infs" data-rel="popup" data-transition="pop" class="ui-btn ui-btn-b ui-btn-inline ui-corner-all ui-mini">? <?php if($_SESSION[tn]==PRC){echo '解释';}else if($_SESSION[tn]==EN){echo 'Explanation';}else{echo '解釋';}?></a>
	<div data-role="popup" id="infs" style="width:85%" data-position-to="window" data-theme="f"><a href="#" class="ui-btn ui-corner-all ui-icon-delete ui-btn-icon-notext ui-btn-right" data-rel="back"></a>
	<h4 style="color:black"><?php if($_SESSION[tn]==PRC){echo '创建专案及菜单';}else if($_SESSION[tn]==EN){echo 'Creating project and menu';}else{echo '創建專案及菜單';}?></h4>
	<p><?php if($_SESSION[tn]==PRC){echo '创建专案等于一个应用设计,一个应用设计能有多张应用页,应用页内亦能有不同功能内容。菜单的作用是供用户浏览不同的应用页。若您的设计是简单而不用菜单,一个应用页内巳有不同功能,再在此应用页使用功能导航按钮,供用户上下浏览不同的功能内容,您只须填专案称而不用填菜单的资料。';}else if($_SESSION[tn]==EN){echo 'You can add many APP pages to an APP design. An APP page can be added different functional content. The panel menu is used by APP user to browse APP pages of your design. If your design is simple, you can edit tab navigation buttons to \'one page APP\' for APP user to browse different functional area on it.';}else{echo '創建專案等於一個應用設計,一個應用設計能有多張應用頁,應用頁內亦能有不同功能內容。菜單的作用是供用戶瀏覽不同的應用頁。若您的設計是簡單而不用菜單,一個應用頁內巳有不同功能,再在此應用頁使用功能導航按鈕,供用戶上下瀏覽不同的功能內容,您只須填專案稱而不用填菜單的資料。';}?></p>
	&nbsp;<a href="tabnexamples.php" class="ui-btn ui-btn-b ui-btn-inline ui-corner-all ui-mini" target="_blank"><?php if($_SESSION[tn]==PRC){echo '例';}else if($_SESSION[tn]==EN){echo 'Example';}else{echo '例';}?></a>
	<p><?php if($_SESSION[tn]==PRC){echo '置于应用页顶部是panel菜单按钮,作用是浏览不同功能页,在右边是导航按钮,作用是浏览应用页的不同的功能内容。若您的设计是简单,一个应用页内巳有不同功能,您能只设置导航按钮。';}else if($_SESSION[tn]==EN){echo 'In the example, you can find panel menu button on the top of page and tab navigation buttons on the right edge. The panel menu is for APP user to browse different APP pages and the tab navigation buttons  are for APP user to browse different functional content on the same APP page. If your design is simple and an APP page with different functional content, you can use the tab navigation buttons only.';}else{echo '置於應用頁頂部是panel菜單按鈕,作用是瀏覽不同功能頁,在右邊是導航按鈕,作用是瀏覽應用頁的不同的功能內容。若您的設計是簡單,一個應用頁內巳有不同功能,您能只設置導航按鈕。';}?></p>
	<HR>
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '预览';}else if($_SESSION[tn]==EN){echo 'Preview';}else{echo '預覽';}?></b>
	<?php if($_SESSION[tn]==PRC){echo '点撀\'预览\'预览设计中的应用菜单。';}else if($_SESSION[tn]==EN){echo 'The \'Preview\' button on the top of this page is for preview of menu panel after its creation.';}else{echo '點撀\'預覽\'預覽設計中的應用菜單。';}?></p>
	<HR>
	<p><b  style="color:black"><?php if($_SESSION[tn]==PRC){echo '现有专案';}else if($_SESSION[tn]==EN){echo 'Amend existing project';}else{echo '現有專案';}?></b>
	<?php if($_SESSION[tn]==PRC){echo '\'专案管理\'是对现有专案进行设计，点撀专案列表的标题再到此页才能进行某专案的设计。';}else if($_SESSION[tn]==EN){echo 'The \'Project Management\' is for editing existing project. You need to click the title of project list and return back to this page.';}else{echo '\'專案管理\'是對現有專案進行設計，點撀專案列表的標題再到此頁才能進行某專案的設計。';}?></p>
	<HR>
	<p><b  style="color:black"><?php if($_SESSION[tn]==PRC){echo '複製数据';}else if($_SESSION[tn]==EN){echo 'Copy data';}else{echo '複製數據';}?></b>
	<?php if($_SESSION[tn]==PRC){echo '对新专案并未有菜单数据,您能选用现有的专案并复制其数据。';}else if($_SESSION[tn]==EN){echo 'For a new project without any menu data, you can select a existing project and copy its data. You need to click the above \'Project Management\'.';}else{echo '對新專案並未有菜單數據,您能選用現有的專案並複製其數據。';}?></p>
	<HR>
	<p><b  style="color:black"><?php if($_SESSION[tn]==PRC){echo '新数据';}else if($_SESSION[tn]==EN){echo 'New data';}else{echo '新數據';}?></b>
	<?php if($_SESSION[tn]==PRC){echo '\'此专案新数据\'是对此专案加新数据,此项只在选择在\'专案管理\'选择专案才出现。';}else if($_SESSION[tn]==EN){echo 'The \'Edit New Project Data\' is for editing new data of project. This item will be showed after selecting project on \'Project Management\'.';}else{echo '\'此專案新數據\'是對此專案加新數據,此項只在選擇在\'專案管理\'選擇專案才出現。';}?></p>
	<HR>
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '此专案应用页列表';}else if($_SESSION[tn]==EN){echo 'Page list of this Project';}else{echo '此專案應用頁列表';}?></b>
	<?php if($_SESSION[tn]==PRC){echo '\'此专案新数据\'是对此专案加新数据,此项只在选择在\'专案管理\'选择专案才出现。';}else if($_SESSION[tn]==EN){echo 'The \'Page List of This Project\' is for amending APP pages of this project.';}else{echo '\'此專案應用頁列表\'是對修改此專案的應用頁數據。';}?></p>
	<HR>
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '应用页存於伺服器';}else if($_SESSION[tn]==EN){echo 'APP page in server for APP using';}else{echo '應用頁存於伺服器';}?></b>
	<?php if($_SESSION[tn]==PRC){echo '若设计应用页能存於互联网伺服器供应用调用,您应另开专案设计,不应在应用的专案内进行设计。';}else if($_SESSION[tn]==EN){echo 'If you need an APP/web page(not a part of APP) stored on the Internet server for embedding content of APP popup or iframe content, you need to create a project to do the design rather than designing the web page in the same APP project.';}else{echo '若設計應用頁能存於互聯網伺服器供應用調用,您應另開專案設計,不應在應用的專案內進行設計。';}?></p>
	</div>
  
   <hr>
   	<FORM action="menudesign.php?pj=<?php echo htmlspecialchars($pj) ?>&ap=<?php echo htmlspecialchars($ap) ?>&alt=<?php echo htmlspecialchars($alt) ?>" method="post" onSubmit="return checkform(this);" data-ajax="false">
	
	
	<?php if($pj){?>
	<b><span style="color:pink"><?php if($_SESSION[tn]==PRC){echo '专案';}else if($_SESSION[tn]==EN){echo 'Project';}else{echo '專案';}?> : <?php echo htmlspecialchars($row[cno]);?>
	</span><hr>
	<?php ;}else{?>
	<b><span style="color:#000000"><?php if($_SESSION[tn]==PRC){echo '新专案';}else if($_SESSION[tn]==EN){echo 'New Project';}else{echo '新專案';}?></span></b><hr>
	<?php ;}?>
	
	
	
	
	<?php if($_SESSION[tn]==PRC){echo '专案称';}else if($_SESSION[tn]==EN){echo 'Project name';}else{echo '專案稱';}?>	
	
	<?php if($row[title] and $alt!='title'){?>
	:<?php echo htmlspecialchars($row[title]);?>
	<a href="menudesign.php?pj=<?php echo htmlspecialchars($pj) ?>&alt=title" data-ajax="false" class="ui-btn ui-btn-inline ui-corner-all ui-mini ui-icon-edit ui-btn-icon-left" style="color:blue;"><?php if($_SESSION[tn]==PRC){echo '修改专案称';}else if($_SESSION[tn]==EN){echo 'Amend Project name';}else{echo '修改專案稱';}?></a>
	<input name="pjtitle" type="hidden" value="<?php echo htmlspecialchars($row[title])?>">
	
	<?php ;}else{?>
	<a href="#pjtitles" data-rel="popup" data-transition="pop" class="ui-btn ui-btn ui-btn-inline ui-corner-all ui-mini" style="color:blue;">?</a>
	<div data-role="popup" id="pjtitles" style="min-width:300px" data-theme="f"><a href="#" class="ui-btn ui-corner-all ui-icon-delete ui-btn-icon-notext ui-btn-right" data-rel="back"></a>
	<p><b style="color:PINK"><?php if($_SESSION[tn]==PRC){echo '专案称';}else if($_SESSION[tn]==EN){echo 'Project name';}else{echo '專案稱';}?></b>	</p>
	<p>
	<?php if($_SESSION[tn]==PRC){echo '此名称只用在此软件。应用名称是在\'应用档案产生\'进行定义的。';}else if($_SESSION[tn]==EN){echo 'It is for this software only. You need to define APP name of your design on APP File Creation.';}else{echo '此名稱只用在此軟件。應用名稱是在\'應用檔案產生\'進行定義的。';}?>
	</p>
	</div>
	<input name="pjtitle" id="pjtitle" type="text" value="<?php echo htmlspecialchars($row[title])?>">
	
	<div class="ui-grid-a"><div class="ui-block-a">
	<?php if($_SESSION[tn]==PRC){echo '应用颜色主题';}else if($_SESSION[tn]==EN){echo 'APP color theme';}else{echo '應用顏色主題';}?>

	<select name="ptheme" style=" width:100%" >
	<option value=""><?php if($_SESSION[tn]==PRC){echo '选择';}else if($_SESSION[tn]==EN){echo 'Choose';}else{echo '選擇';}?></option>
	<option value="a" <?php if($row[ptheme]=='a')echo 'selected=selected';?>>a<?php if($_SESSION[tn]==PRC){echo '[黑色]';}else if($_SESSION[tn]==EN){echo '[Black]';}else{echo '[黑色]';}?></option>
	<option value="b" <?php if($row[ptheme]=='b')echo 'selected=selected';?>>b<?php if($_SESSION[tn]==PRC){echo '[蓝色]';}else if($_SESSION[tn]==EN){echo '[Blue]';}else{echo '[藍色]';}?></option>
	<option value="c" <?php if($row[ptheme]=='c')echo 'selected=selected';?>>c<?php if($_SESSION[tn]==PRC){echo '[灰色]';}else if($_SESSION[tn]==EN){echo '[Grey]';}else{echo '[灰色]';}?></option>
	<!--<option value="d" <?php if($row[ptheme]=='d')echo 'selected=selected';?>>d<?php if($_SESSION[tn]==PRC){echo '[灰色1]';}else if($_SESSION[tn]==EN){echo '[Grey 1]';}else{echo '[灰色1]';}?></option>
	<option value="e" <?php if($row[ptheme]=='e')echo 'selected=selected';?>>e<?php if($_SESSION[tn]==PRC){echo '[黃色]';}else if($_SESSION[tn]==EN){echo '[Yellow';}else{echo '[黃色]';}?>]</option>!-->
	<option value="f" <?php if($row[ptheme]=='f')echo 'selected=selected';?>>f<?php if($_SESSION[tn]==PRC){echo '[蓝色1]';}else if($_SESSION[tn]==EN){echo '[Blue 1]';}else{echo '[藍色1]';}?></option>
	<!--<option value="g" <?php if($row[ptheme]=='g')echo 'selected=selected';?>>g<?php if($_SESSION[tn]==PRC){echo '[黃色1]';}else if($_SESSION[tn]==EN){echo '[Yellow 1]';}else{echo '[黃色1]';}?></option>
	<!--<option value="h" <?php if($row[ptheme]=='h')echo 'selected=selected';?>>h<?php if($_SESSION[tn]==PRC){echo '[绿色]';}else if($_SESSION[tn]==EN){echo '[Green]';}else{echo '[綠色]';}?></option>
	<option value="i" <?php if($row[ptheme]=='i')echo 'selected=selected';?>>i<?php if($_SESSION[tn]==PRC){echo '[绿色1]';}else if($_SESSION[tn]==EN){echo '[Green 1]';}else{echo '[綠色1]';}?></option>
	<option value="j" <?php if($row[ptheme]=='j')echo 'selected=selected';?>>j<?php if($_SESSION[tn]==PRC){echo '[粉紅色]';}else if($_SESSION[tn]==EN){echo '[Pink]';}else{echo '[粉紅色]';}?></option>
	<option value="k" <?php if($row[ptheme]=='k')echo 'selected=selected';?>>k<?php if($_SESSION[tn]==PRC){echo '[蓝色2]';}else if($_SESSION[tn]==EN){echo '[Blue 2]';}else{echo '[藍色2]';}?></option>
	<option value="l" <?php if($row[ptheme]=='l')echo 'selected=selected';?>>l<?php if($_SESSION[tn]==PRC){echo '[金色]';}else if($_SESSION[tn]==EN){echo '[Golden]';}else{echo '[金色]';}?></option>
	<option value="m" <?php if($row[ptheme]=='m')echo 'selected=selected';?>>m<?php if($_SESSION[tn]==PRC){echo '[红色]';}else if($_SESSION[tn]==EN){echo '[Red]';}else{echo '[紅色]';}?></option>
	<option value="n" <?php if($row[ptheme]=='n')echo 'selected=selected';?>>n<?php if($_SESSION[tn]==PRC){echo '[橙色]';}else if($_SESSION[tn]==EN){echo '[Orange]';}else{echo '[橙色]';}?></option>
	<option value="v" <?php if($row[ptheme]=='v')echo 'selected=selected';?>>v<?php if($_SESSION[tn]==PRC){echo '[金色2]';}else if($_SESSION[tn]==EN){echo '[Limpid gold]';}else{echo '[金色2]';}?></option>!-->
	<option value="w" <?php if($row[ptheme]=='w')echo 'selected=selected';?>>w<?php if($_SESSION[tn]==PRC){echo '[蓝透色]';}else if($_SESSION[tn]==EN){echo '[Limpid blue]';}else{echo '[藍透色]';}?></option>
	<option value="x" <?php if($row[ptheme]=='x')echo 'selected=selected';?>>x<?php if($_SESSION[tn]==PRC){echo '[黑透色]';}else if($_SESSION[tn]==EN){echo '[Limpid black]';}else{echo '[黑透色]';}?></option>
	<option value="y" <?php if($row[ptheme]=='y')echo 'selected=selected';?>>y<?php if($_SESSION[tn]==PRC){echo '[白透色]';}else if($_SESSION[tn]==EN){echo '[Limpid white]';}else{echo '[白透色]';}?></option>
	<option value="z" <?php if($row[ptheme]=='z')echo 'selected=selected';?>>z<?php if($_SESSION[tn]==PRC){echo '[透色]';}else if($_SESSION[tn]==EN){echo '[Limpid]';}else{echo '[透色]';}?></option>
	</select></div>
	<div class="ui-block-b">
	<?php if($_SESSION[tn]==PRC){echo '应用背景';}else if($_SESSION[tn]==EN){echo 'APP background';}else{echo '應用背景';}?>
	<input name="pjbg" type="text" value="<?php echo htmlspecialchars($row[pjbg])?>"> 
	</div>
	</div>
	
	<?php ;}// if($row[menubtn]){?>
	
	
	<?php if($alt!='panelbtn'){?>
	<a href="menudesign.php?pj=<?php echo htmlspecialchars($pj) ?>&alt=panelbtn" data-ajax="false" class="ui-btn ui-btn-inline ui-corner-all ui-mini ui-icon-edit ui-btn-icon-left" style="color:blue;"><?php if($_SESSION[tn]==PRC){echo '設置侧控菜单按钮';}else if($_SESSION[tn]==EN){echo 'Edit Panel button';}else{echo '設置側控菜單按鈕';}?></a>
	<?php ;}else{?>
	<div class="ui-grid-b"><div class="ui-block-a">
	<?php if($_SESSION[tn]==PRC){echo '侧控菜单按钮标题';}else if($_SESSION[tn]==EN){echo 'Panel button title';}else{echo '側控菜單按鈕標題';}?>	
	<a href="#function" data-rel="popup" data-transition="pop" class="ui-btn ui-btn ui-btn-inline ui-corner-all ui-mini" style="color:blue;">?</a>
	<div data-role="popup" id="function" style="min-width:300px" data-theme="f"><a href="#" class="ui-btn ui-corner-all ui-icon-delete ui-btn-icon-notext ui-btn-right" data-rel="back"></a>
	<p><b style="color:PINK"><?php if($_SESSION[tn]==PRC){echo '侧控菜单按钮标题';}else if($_SESSION[tn]==EN){echo 'Panel button title';}else{echo '側控菜單按鈕標題';}?>	</b>	</p>

	<p>
	<?php if($_SESSION[tn]==PRC){echo '应用是以侧控菜单形式供用户操作,此处是开启此菜单的按钮的标题。<BR>当键入标题,按钮及标题将显示在此页顶部。若不需标题,请键入btns。<BR>点撀上面的预览按钮,显示\'侧控菜单\'。';}else if($_SESSION[tn]==EN){echo 'It is the button title of panel menu opening. It will be showed on APP page of your design. A button and its title will be showed on the above section on this page after your title entry. If you do not need this title, you can enter \'btns\'.<BR>You can click the about Preview button to show the menu panel.';}else{echo '應用是以側控菜單形式供用戶操作,此處是開啟此菜單的按鈕的標題。<BR>當鍵入標題,按鈕及標題將顯示在此頁頂部。若不需標題,請鍵入btns。<BR>點撀上面的預覽按鈕,顯示\'側控菜單\'。';}?>
	</p>
	<p><?php if($_SESSION[tn]==PRC){echo '若應用是IOS [APPLE],不應使用沒有標題的panel菜單按鈕[控制板菜单按钮]。';}else if($_SESSION[tn]==EN){echo 'For IOS APP [APPLE], you are not recommended to use the panel button without title.';}else{echo '若應用是IOS [APPLE],不應使用沒有標題的panel菜單按鈕[控制板菜單按鈕]。';}?></p>
	</div>
	<input name="panelbtn" type="text" value="<?php if($row[menubtn]=='&nbsp;&nbsp;&nbsp;'){echo 'btns';}else{echo htmlspecialchars($row[menubtn]);}?>">
	</div><div class="ui-block-b">
	<?php if($_SESSION[tn]==PRC){echo '侧控菜单按钮背景图像';}else if($_SESSION[tn]==EN){echo 'Background picture of panel button';}else{echo '側控菜單按鈕背景圖像';}?>	
	
	<a href="#bg" data-rel="popup" data-transition="pop" class="ui-btn ui-btn ui-btn-inline ui-corner-all ui-mini" style="color:blue;">?</a>
	<div data-role="popup" id="bg" style="min-width:300px" data-theme="f">
	<a href="#" class="ui-btn ui-corner-all ui-icon-delete ui-btn-icon-notext ui-btn-right" data-rel="back"></a>
	<p><b style="color:PINK"><?php if($_SESSION[tn]==PRC){echo '侧控菜单按钮背景图像';}else if($_SESSION[tn]==EN){echo 'Background picture of panel button';}else{echo '側控菜單按鈕背景圖像';}?>	</b>	</p>

	<p>
	<?php if($_SESSION[tn]==PRC){echo '您须将此图像档案置於此软件内的';}else if($_SESSION[tn]==EN){echo 'You need to place this file to this software folder ';}else{echo '您須將此圖像檔案置於此軟件內的';}if($pj){echo 'panel/'.$pj.'/images/';}else{if($_SESSION[tn]==PRC){echo ' [创建专案才能在此处显示档夹路径]';}else if($_SESSION[tn]==EN){echo '[path will be showed after project created]';}else{echo ' [創建專案才能在此處顯示檔夾路徑]';};}?><?php if($_SESSION[tn]==PRC){echo '。您亦能填颜色主题a到y。';}else if($_SESSION[tn]==EN){echo '.If you want to use color theme for the button, you can enter a to y.';}else{echo '。您亦能填顏色主題a到y。';}?>
	</p>
	</div>
	<input name="bg" type="text" value="<?php echo htmlspecialchars($row[mnbg])?>">
	</div><div class="ui-block-c">
	<?php if($_SESSION[tn]==PRC){echo '侧控菜单背景图像';}else if($_SESSION[tn]==EN){echo 'Background picture of menu panel';}else{echo '側控菜單背景圖像';}?>	
	<a href="#bgs" data-rel="popup" data-transition="pop" class="ui-btn ui-btn ui-btn-inline ui-corner-all ui-mini" style="color:blue;">?</a>
	<div data-role="popup" id="bgs" style="min-width:300px" data-theme="f">
	<a href="#" class="ui-btn ui-corner-all ui-icon-delete ui-btn-icon-notext ui-btn-right" data-rel="back"></a>
	<p><b style="color:PINK"><?php if($_SESSION[tn]==PRC){echo '侧控菜单背景图像';}else if($_SESSION[tn]==EN){echo 'Background picture of menu panel';}else{echo '側控菜單背景圖像';}?>	</b>	</p>

	<p>
	<?php if($_SESSION[tn]==PRC){echo '您须将此图像档案置於此软件内的';}else if($_SESSION[tn]==EN){echo 'You need to place this file to this software folder ';}else{echo '您須將此圖像檔案置於此軟件內的';}if($pj){echo 'panel/'.$pj.'/images/';}else{if($_SESSION[tn]==PRC){echo ' [创建专案才能在此处显示档夹路径]';}else if($_SESSION[tn]==EN){echo '[path will be showed after project created]';}else{echo ' [創建專案才能在此處顯示檔夾路徑]';};}?><?php if($_SESSION[tn]==PRC){echo '。';}else if($_SESSION[tn]==EN){echo '.';}else{echo '。';}?>
	</p>
	</div>
	<input name="panelbg" type="text" value="<?php echo htmlspecialchars($row[panelbg])?>">
	</div></div>
	<?php ;}// $alt!='panelbtn'?>
	
	
	
	<?php if($alt!='prevbtn'){?>
	<!--<a href="menudesign.php?pj=<?php echo htmlspecialchars($pj) ?>&alt=prevbtn" data-ajax="false" class="ui-btn ui-btn-inline ui-corner-all ui-mini ui-icon-edit ui-btn-icon-left" style="color:blue;"><?php if($_SESSION[tn]==PRC){echo '設置菜单上一页按钮';}else if($_SESSION[tn]==EN){echo 'Edit Previous page button';}else{echo '設置菜單上一頁按鈕';}?></a>!-->
	<?php ;}else{?>
	<div class="ui-grid-b">
	<div class="ui-block-a" style="width:50%">
	<?php if($_SESSION[tn]==PRC){echo '菜单上一页按钮标题';}else if($_SESSION[tn]==EN){echo 'Previous page button[Prev btn] title';}else{echo '菜單上一頁按鈕標題';}?>	
	<a href="#pres" data-rel="popup" data-transition="pop" class="ui-btn ui-btn ui-btn-inline ui-corner-all ui-mini" style="color:blue;">?</a>
	<div data-role="popup" id="pres" style="min-width:300px" data-theme="f">
	<p>
	<?php if($_SESSION[tn]==PRC){echo '在侧控菜单内,您能设置上一应用页按钮的标题。若不需标题,请键入btns。';}else if($_SESSION[tn]==EN){echo 'You can add \'return to previous page\' button to the panel. If you do not need this title, you can enter \'btns\'.';}else{echo '在側控菜單內,您能設置上一應用頁按鈕的標題。若不需標題,請鍵入btns。';}?>
	</p>
	</div>
	<input name="panelbtns" type="text" value="<?php echo htmlspecialchars($row[menubtns])?>">
	</div>
	<div class="ui-block-b" style="width:25%">
	<?php if($_SESSION[tn]==PRC){echo '上一页按钮图像';}else if($_SESSION[tn]==EN){echo 'Background picture of Prev btn';}else{echo '上一頁按鈕圖像';}?>	
	<a href="#prebgs" data-rel="popup" data-transition="pop" class="ui-btn ui-btn ui-btn-inline ui-corner-all ui-mini" style="color:blue;">?</a>
	<div data-role="popup" id="prebgs" style="min-width:300px" data-theme="f">
	<p>
	<?php if($_SESSION[tn]==PRC){echo '您须将此图像档案置於此软件内的';}else if($_SESSION[tn]==EN){echo 'You need to place this file to this software folder ';}else{echo '您須將此圖像檔案置於此軟件內的';}if($pj){echo 'panel/'.$pj.'/images/';}else{if($_SESSION[tn]==PRC){echo ' [创建专案才能在此处显示档夹路径]';}else if($_SESSION[tn]==EN){echo '[path will be showed after project created]';}else{echo ' [創建專案才能在此處顯示檔夾路徑]';};}?><!--<?php if($_SESSION[tn]==PRC){echo '。您亦能填颜色主题a到y,参考下面颜色主题的选项。';}else if($_SESSION[tn]==EN){echo '.If you want to use different color theme for the button, you can enter a to y. Please refer to the following options of color theme.';}else{echo '。您亦能填顏色主題a到y,參考下面顏色主題的選項。';}?>!-->
	</p>
	</div>
	<input name="mnbgs" type="text" value="<?php echo htmlspecialchars($row[mnbgs])?>">
	</div>
	<div class="ui-block-c" style="width:25%">
	<?php if($_SESSION[tn]==PRC){echo '上一页按钮特效';}else if($_SESSION[tn]==EN){echo 'Effect for Prev btn';}else{echo '上一頁按鈕特效';}?>	
	<a href="#prestyle" data-rel="popup" data-transition="pop" class="ui-btn ui-btn ui-btn-inline ui-corner-all ui-mini" style="color:blue;">?</a>
	<div data-role="popup" id="prestyle" style="min-width:300px" data-theme="f">
	<p>
	<?php if($_SESSION[tn]==PRC){echo '点撀时显示内容的特效。';}else if($_SESSION[tn]==EN){echo 'It is about the web animation effect of clicking action.';}else{echo '點撀時顯示內容的特效。';}?>
	</p>
	</div>
		<select name="prestyle">
	<option value=""><?php if($_SESSION[tn]==PRC){echo '选择';}else if($_SESSION[tn]==EN){echo 'Choose';}else{echo '選擇';}?></option>
	<option value="fade"  <?php if($row[prestyle]=='fade')echo 'selected="selected"';?>>fade</option>
	<option value="pop"  <?php if($row[prestyle]=='pop')echo 'selected="selected"';?>>pop</option>
	<option value="flip"  <?php if($row[prestyle]=='flip')echo 'selected="selected"';?>>flip</option>
	<option value="turn"  <?php if($row[prestyle]=='turn')echo 'selected="selected"';?>>turn</option>
	<option value="flow"  <?php if($row[prestyle]=='flow')echo 'selected="selected"';?>>flow</option>
	<option value="slidefade"  <?php if($row[prestyle]=='slidefade')echo 'selected="selected"';?>>slidefade</option>
	<option value="slide"  <?php if($row[prestyle]=='slide')echo 'selected="selected"';?>>slide</option>
	<option value="slideup"  <?php if($row[prestyle]=='slideup')echo 'selected="selected"';?>>slideup</option>
	<option value="none"  <?php if($row[prestyle]=='none')echo 'selected="selected"';?>>none</option>
	</select>
	</div>
	
	</div>
	<?php ;}// $alt!='prevbtn'?>
	
	
	
	<hr>
	<?php if(!$ap and !$menunbr){?>
	<a href="#hs" data-rel="popup" data-transition="pop" class="ui-btn ui-btn-b ui-btn-inline ui-corner-all ui-mini">? <?php if($_SESSION[tn]==PRC){echo '复制数据';}else if($_SESSION[tn]==EN){echo 'Copy data';}else{echo '複製數據';}?></a><br>
	<div data-role="popup" id="hs" style="min-width:300px" data-theme="f"><a href="#" class="ui-btn ui-corner-all ui-icon-delete ui-btn-icon-notext ui-btn-right" data-rel="back"></a>
	<p>
	<?php if($_SESSION[tn]==PRC){echo '对新专案并未有菜单数据,您能选用现有的专案并复制其数据。';}else if($_SESSION[tn]==EN){echo 'For a new project without any menu data, you can select a existing project and copy its data. You need to click the above \'Project Management\'.';}else{echo '對新專案並未有菜單數據,您能選用現有的專案並複製其數據。';}?>
	</p>
	</div>
	<?php ;}//if(!$ap){?>


	
	
	<?php if($alt=='webmenu'){?>
	
	<?php 
	$sql=$db->query("select * from webmenu where cno='$ap'");
	if($sql)$row=$sql->fetch();
	?>
	
	
	<div class="ui-grid-c"><div class="ui-block-a">
	<?php if($_SESSION[tn]==PRC){echo '标题次序';}else if($_SESSION[tn]==EN){echo 'Sequence';}else{echo '標題次序';}?>
	<a href="#seq" data-rel="popup" data-transition="pop" class="ui-btn ui-btn ui-btn-inline ui-corner-all ui-mini" style="color:blue;">?</a>
	<div data-role="popup" id="seq" style="width:85%" data-theme="f"><a href="#" class="ui-btn ui-corner-all ui-icon-delete ui-btn-icon-notext ui-btn-right" data-rel="back"></a>
	<p>
	<?php if($_SESSION[tn]==PRC){echo '应对\'链结\'丶\'Popup菜单\'及\'菜单隔项\'填写标题序号(整数)。';}else if($_SESSION[tn]==EN){echo 'You may need to add sequence numbers(integer) to the type of divider,link and popup menu to control the listing order of titles on the menu panel. ';}else{echo '應對\'鏈結\'、\'Popup菜單\'及\'菜單隔項\'填寫標題序號(整數)。';}?>
	</p>
	<p>
	<?php if($_SESSION[tn]==PRC){echo '点撀\'此专案应用列表\',能对标题进行拖拽[用滑鼠按着标题拖至另一标题上],能更改次序,但限同型式(是否popup),而自定的序号亦被程序变改。';}else if($_SESSION[tn]==EN){echo 'You can click the \'Page List of This Project\' and then you can use computer mouse to drag and drop the title to reorder its sequence on the list. This function applies to title with same type only[within popup or not]. Your defined sequential numbers will be altered by using this fucntion.';}else{echo '點撀\'此專案應用列表\',能對標題進行拖拽[用滑鼠按著標題拖至另一標題上],能更改次序,但限同型式(是否popup),而自定的序號亦被程序變改。';}?>
	</p>
	</div>
	<?php if(!$ap or ($ap and $row[typ]!='popuplink' and $row[typ]!='popupdivider')){?>
	<input type="number" name="nbr" value="<?php if($menunbr and !$ap){echo htmlspecialchars($menunbr);}else{echo htmlspecialchars($row[nbr]);}?>"><?php }else{echo '-';}?>
	</div><div class="ui-block-b">
	<?php if($ap and ($row[typ]=='popuplink' or $row[typ]=='popupdivider')){?>
	<?php if($_SESSION[tn]==PRC){echo 'Popup菜单次序';}else if($_SESSION[tn]==EN){echo 'Sequence in Popup';}else{echo 'Popup菜單次序';}?>
	
	<a href="#nbrs" data-rel="popup" data-transition="pop" class="ui-btn ui-btn ui-btn-inline ui-corner-all ui-mini" style="color:blue;">?</a>
	<div data-role="popup" id="nbrs" style="min-width:300px" data-theme="f"><a href="#" class="ui-btn ui-corner-all ui-icon-delete ui-btn-icon-notext ui-btn-right" data-rel="back"></a>

	<p>
	<?php if($_SESSION[tn]==PRC){echo '应填写Popup菜单的标题序号(整数)。';}else if($_SESSION[tn]==EN){echo 'You may need to add sequence numbers(integer) to control the listing order of titles on a menu popup. ';}else{echo '應填寫Popup菜單的標題序號(整數)。';}?>
	</p>
	</div>
	
	<input type="number" name="nbr" value="<?php echo htmlspecialchars($row[nbr])?>"><?php ;}?>
	</div><div class="ui-block-c">
	<?php if($_SESSION[tn]==PRC){echo '型式';}else if($_SESSION[tn]==EN){echo 'Type';}else{echo '型式';}?>
	<a href="#typs" data-rel="popup" data-transition="pop" class="ui-btn ui-btn ui-btn-inline ui-corner-all ui-mini" style="color:blue;">?</a>
	<div data-role="popup" id="typs" style="width:85%" data-theme="f"><a href="#" class="ui-btn ui-corner-all ui-icon-delete ui-btn-icon-notext ui-btn-right" data-rel="back"></a>

	<h3 style="color:black"><?php if($_SESSION[tn]==PRC){echo '链结';}else if($_SESSION[tn]==EN){echo 'Link';}else{echo '鏈結';}?></h3>
	<p>
	<?php if($_SESSION[tn]==PRC){echo '对於\'链结\',用户点撀此种标题是显示另一应用页。当创建此种标题,在\'标题列表\'再点撀此标题并对\'应用页\'作出选择。';}else if($_SESSION[tn]==EN){echo 'APP user clicks on it to show an APP page. After creating this link type\'s title, you need to click the related title on the below Title list and select an APP page for it.';}else{echo '對於\'鏈結\',用戶點撀此種標題是顯示另一應用頁。當創建此種標題,在\'標題列表\'再點撀此標題並對\'應用頁\'作出選擇。';}?>
	</p>
	<HR>
	<h3 style="color:black"><?php if($_SESSION[tn]==PRC){echo 'Popup菜单';}else if($_SESSION[tn]==EN){echo 'Popup Menu';}else{echo 'Popup菜單';}?></h3>
	<p>
	<?php if($_SESSION[tn]==PRC){echo '对於\'Popup菜单\',用户点撀此种标题是以POPUP形式显示另一菜单,再在菜单上点撀标题到另一应用页。';}else if($_SESSION[tn]==EN){echo 'APP user clicks on it to show a menu on a popup and then click a title to show an APP page.';}else{echo '對於\'Popup菜單\',用戶點撀此種標題是以POPUP形式顯示另一菜單,再在菜單上點撀標題到另一應用頁。';}?>
	</p>
	<HR>
	<h3 style="color:black"><?php if($_SESSION[tn]==PRC){echo 'Popup菜单链结';}else if($_SESSION[tn]==EN){echo 'Popup Menu Link';}else{echo 'Popup菜單鏈結';}?></h3>
	<p>
	<?php if($_SESSION[tn]==PRC){echo '对於\'Popup菜单链结\',用户在POPUP形式菜单上点撀标题到另一应用页。当创建此种标题,在\'标题列表\'再点撀此标题并对\'属於Popup菜单\'及\'应用页\'作出选择。';}else if($_SESSION[tn]==EN){echo 'It is about the APP page link of title on popup menu. You can only add link or divider on popup menu. After creating this Menu Link\'s title, you need to click the related title on the below Title list and select an APP page and an \'In popup menu\' option for it.';}else{echo '對於\'Popup菜單鏈結\',用戶在POPUP形式菜單上點撀標題到另一應用頁。當創建此種標題,在\'標題列表\'再點撀此標題並對\'屬於Popup菜單\'及\'應用頁\'作出選擇。';}?>
	</p>
	<HR>
	<h3 style="color:black"><?php if($row[typ]=='popupdivider')echo 'selected="selected"';?><?php if($_SESSION[tn]==PRC){echo 'Popup菜单隔项';}else if($_SESSION[tn]==EN){echo 'Popup Menu Divider';}else{echo 'Popup菜單隔項';}?></h3>
	
	<p>
	<?php if($_SESSION[tn]==PRC){echo '对於\'Popup菜单链结\',作用隔开菜单项目。当创建此种标题,在\'标题列表\'再点撀此标题并对\'属於Popup菜单\'作出选择。';}else if($_SESSION[tn]==EN){echo 'It is for title grouping. After creating this Divider type\'s title, you need to click the title on the below Title list and select \'In popup menu\' option for this title.';}else{echo '對於\'Popup菜單隔項\',作用隔開菜單項目。當創建此種標題,在\'標題列表\'再點撀此標題並對\'屬於Popup菜單\'作出選擇。';}?>
	</p>
	<HR>
	<h3 style="color:black"><?php if($_SESSION[tn]==PRC){echo '菜单隔项';}else if($_SESSION[tn]==EN){echo 'Divider';}else{echo '菜單隔項';}?></h3>
	<p>
	<?php if($_SESSION[tn]==PRC){echo '对於\'菜单隔项\',作用隔开菜单项目。用户点撀此标题是没有作用的。';}else if($_SESSION[tn]==EN){echo 'It is for title grouping. It is no reaction even clicking on it.';}else{echo '對於\'菜單隔項\',作用隔開菜單項目。用戶點撀此標題是沒有作用的。';}?>
	</p>
	</div>
	<select name="typ">
	<option value="link"  <?php if($row[typ]=='link')echo 'selected="selected"';?>><?php if($_SESSION[tn]==PRC){echo '链结';}else if($_SESSION[tn]==EN){echo 'Link';}else{echo '鏈結';}?></option>
	<option value="popup"  <?php if($row[typ]=='popup')echo 'selected="selected"';?>><?php if($_SESSION[tn]==PRC){echo 'Popup菜单';}else if($_SESSION[tn]==EN){echo 'Popup Menu';}else{echo 'Popup菜單';}?></option>
	<option value="popuplink"  <?php if($row[typ]=='popuplink')echo 'selected="selected"';?>><?php if($_SESSION[tn]==PRC){echo 'Popup菜单链结';}else if($_SESSION[tn]==EN){echo 'Popup Menu Link';}else{echo 'Popup菜單鏈結';}?></option>
	<option value="popupdivider"  <?php if($row[typ]=='popupdivider')echo 'selected="selected"';?>><?php if($_SESSION[tn]==PRC){echo 'Popup菜单隔项';}else if($_SESSION[tn]==EN){echo 'Popup Menu Divider';}else{echo 'Popup菜單隔項';}?></option>
	<option value="divider"  <?php if($row[typ]=='divider')echo 'selected="selected"';?>><?php if($_SESSION[tn]==PRC){echo '菜单隔项';}else if($_SESSION[tn]==EN){echo 'Divider';}else{echo '菜單隔項';}?></option>
	</select>
	
	</div>
	
	
	<div class="ui-block-d">
	<?php if($_SESSION[tn]==PRC){echo '字体颜色';}else if($_SESSION[tn]==EN){echo 'Font Color';}else{echo '字體顏色';}?>
	<a href="#themes" data-rel="popup" data-transition="pop" class="ui-btn ui-btn ui-btn-inline ui-corner-all ui-mini" style="color:blue;">?</a>
	<div data-role="popup" id="themes" style="min-width:300px" data-theme="f"><a href="#" class="ui-btn ui-corner-all ui-icon-delete ui-btn-icon-notext ui-btn-right" data-rel="back"></a>
	<p><b style="color:PINK"><?php if($_SESSION[tn]==PRC){echo '字体颜色';}else if($_SESSION[tn]==EN){echo 'Font Color';}else{echo '字體顏色';}?>	</b>	</p>

	<p>
	<?php if($_SESSION[tn]==PRC){echo '菜单标题的字体颜色,填颜HTML色名.e.g. blue。此项不是必须填。';}else if($_SESSION[tn]==EN){echo 'It is not necessary item. You can add HTML color name for Font color of menu title. e.g. blue.';}else{echo '菜單標題的字體顏色,填HTML顏色名.e.g. blue。此項不是必須填。';}?>
	
	<?php if($_SESSION[tn]==PRC){echo '您亦能填上hex颜色码,e.g. #123456。';}else if($_SESSION[tn]==EN){echo 'You can also enter hex color code,e.g. #123456.';}else{echo '您亦能填上hex顏色碼,e.g. #123456。';}?>
	</p>
	</div>
	<input name="theme" type="text" value="<?php echo htmlspecialchars($row[theme])?>">
	</div>
	</div>
	
	
	<div class="ui-grid-b"><div class="ui-block-a" style="width:50%">
	<?php if($_SESSION[tn]==PRC){echo '菜单标题';}else if($_SESSION[tn]==EN){echo 'Menu title';}else{echo '菜單標題';}?>
	<a href="#titles" data-rel="popup" data-transition="pop" class="ui-btn ui-btn ui-btn-inline ui-corner-all ui-mini" style="color:blue;">?</a>
	<div data-role="popup" id="titles" style="min-width:300px" data-theme="f"><a href="#" class="ui-btn ui-corner-all ui-icon-delete ui-btn-icon-notext ui-btn-right" data-rel="back"></a>
	<p><b style="color:PINK"><?php if($_SESSION[tn]==PRC){echo '菜单标题';}else if($_SESSION[tn]==EN){echo 'Menu title';}else{echo '菜單標題';}?></b></p>
	<p>
	<p>
	<?php if($_SESSION[tn]==PRC){echo '您能点撀上面的\'预览\'按钮,预览您设计中的菜单。';}else if($_SESSION[tn]==EN){echo 'You can preview the menu by clicking the above \'Preview\' button.';}else{echo '您能點撀上面的\'預覽\'按鈕,預覽您設計中的菜單。';}?>
	</p>
	</div>
	<input name="title" type="text" value="<?php echo htmlspecialchars($row[title])?>">
	</div><div class="ui-block-b"  style="width:25%">
	<?php if($_SESSION[tn]==PRC){echo '文字全显';}else if($_SESSION[tn]==EN){echo 'Show all texts';}else{echo '文字全顯';}?>
	<a href="#titlewsps" data-rel="popup" data-transition="pop" class="ui-btn ui-btn ui-btn-inline ui-corner-all ui-mini" style="color:blue;">?</a>
	<div data-role="popup" id="titlewsps" style="min-width:300px" data-theme="f"><a href="#" class="ui-btn ui-corner-all ui-icon-delete ui-btn-icon-notext ui-btn-right" data-rel="back"></a>
	<p><b style="color:PINK"><?php if($_SESSION[tn]==PRC){echo '文字全显';}else if($_SESSION[tn]==EN){echo 'Show all texts';}else{echo '文字全顯';}?></b></p>
	<p>
	<?php if($_SESSION[tn]==PRC){echo '您应将浏览器调至移动设备尺寸浏览您的设计。点选代表键入的标题文字不限高度全部显示。';}else if($_SESSION[tn]==EN){echo 'All texts will be showed on the button title. You need to resize your browser as mobile phone to view the difference.';}else{echo '您應將瀏覽器調至移動設備尺寸瀏覽您的設計。點選代表鍵入的標題文字不限高度全部顯示。';}?>
	</p>
	</div>
	<br><label for='titlewsp'><?php if($_SESSION[tn]==PRC){echo '文字显示';}else if($_SESSION[tn]==EN){echo 'All texts show';}else{echo '文字顯示';}?><input type="checkbox" name="titlewsp" id="titlewsp" value="1" <?php if($row[wsp])echo 'checked="checked"'?>></label>
	</div><div class="ui-block-c"  style="width:25%">
	<?php if($_SESSION[tn]==PRC){echo '菜单标题背景图像';}else if($_SESSION[tn]==EN){echo 'Backgound picture of Menu title';}else{echo '菜單標題背景圖像';}?>
	<a href="#titlebg" data-rel="popup" data-transition="pop" class="ui-btn ui-btn ui-btn-inline ui-corner-all ui-mini" style="color:blue;">?</a>
	<div data-role="popup" id="titlebg" style="min-width:300px" data-theme="f"><a href="#" class="ui-btn ui-corner-all ui-icon-delete ui-btn-icon-notext ui-btn-right" data-rel="back"></a>
	<p><b style="color:PINK"><?php if($_SESSION[tn]==PRC){echo '菜单标题背景图像';}else if($_SESSION[tn]==EN){echo 'Backgound picture of Menu title';}else{echo '菜單標題背景圖像';}?></b></p>
	<p>
	<?php if($_SESSION[tn]==PRC){echo '您须将此图像档案置於此软件内的';}else if($_SESSION[tn]==EN){echo 'You need to place this file to this software folder ';}else{echo '您須將此圖像檔案置於此軟件內的';}if($pj){echo 'panel/'.$pj.'/images/';}else{if($_SESSION[tn]==PRC){echo ' [创建专案才能在此处显示档夹路径]';}else if($_SESSION[tn]==EN){echo '[path will be showed after project created]';}else{echo ' [創建專案才能在此處顯示檔夾路徑]';};}?>
	</p>
	</div>
	<input name="titlebg" type="text" value="<?php echo htmlspecialchars($row[titlebg])?>">	
	</div>
	</div>

	<?php if($ap and ($row[typ]=='popuplink' or $row[typ]=='link')){
	if($_SESSION[tn]==PRC){echo '链结页';}else if($_SESSION[tn]==EN){echo 'APP page';}else{echo '鏈結頁';}?>
	<a href="#webhtmls" data-rel="popup" data-transition="pop" class="ui-btn ui-btn ui-btn-inline ui-corner-all ui-mini" style="color:blue;">?</a>
	<div data-role="popup" id="webhtmls" style="min-width:300px" data-theme="f"><a href="#" class="ui-btn ui-corner-all ui-icon-delete ui-btn-icon-notext ui-btn-right" data-rel="back"></a>
	<p><b style="color:PINK"><?php if($_SESSION[tn]==PRC){echo '链结页';}else if($_SESSION[tn]==EN){echo 'APP page';}else{echo '鏈結頁';}?></b></p>
	<p>
	<?php if($_SESSION[tn]==PRC){echo '对\'链结\'及\'Popup菜单链结\',须选用链结的应用页。当您巳创建应用页才有选择列表供选用。';}else if($_SESSION[tn]==EN){echo 'For link type and popup menu type, you need to add link to APP page. A selection box will be showed only if you create APP page for this project.';}else{echo '對\'鏈結\'及\'Popup菜單鏈結\',須選用鏈結的應用頁。當您巳創建應用頁才有選擇列表供選用。';}?>
	</p>
	</div>
	<?php $sqls=$db->query("select * from webhtml where pjnbr='$pj'");
	if($sqls){
	while($rows=$sqls->fetch()){
	if(!$i){
	echo '<select name="aphtml"><option value=""></option>';}	
	//echo '<option value="'.htmlspecialchars($rows[typ]).'@'.htmlspecialchars($rows[cno]).'.html@'.htmlspecialchars($rows[ap]).'@'.htmlspecialchars($rows[style]).'"';
	echo '<option value="'.htmlspecialchars($rows[ap]).'"';	
	if($rows[ap] and $row['aphtml']==$rows[ap]){echo 'selected="selected"';}
	if($rows[apn])$rows[ap] = $rows[apn];
	echo '>['.htmlspecialchars($rows[ap]).'.html] '.htmlspecialchars($rows[title]).'</option>';
	$i=1;
	;};}
	if($i)echo '</select>';
	?>

	<?php ;}?>
		
	<?php if($ap and ($row[typ]=='popuplink' or $row[typ]=='popupdivider')){?>
	<?php $sqls=$db->query("select * from webmenu where pjnbr='$pj'");
	if($sqls){
	while($rows=$sqls->fetch()){
	if(!$j){echo '<br>';
	if($_SESSION[tn]==PRC){echo '属於Popup菜单';}else if($_SESSION[tn]==EN){echo 'In popup menu';}else{echo '屬於Popup菜單';}
	?>
	<a href="#popupes" data-rel="popup" data-transition="pop" class="ui-btn ui-btn ui-btn-inline ui-corner-all ui-mini" style="color:blue;">?</a>
	<div data-role="popup" id="popupes" style="min-width:300px" data-theme="f"><a href="#" class="ui-btn ui-corner-all ui-icon-delete ui-btn-icon-notext ui-btn-right" data-rel="back"></a>

	<p>
	<?php if($_SESSION[tn]==PRC){echo '若标题是属Popup菜单链结,须选择所属的Popup菜单或隔项。';}else if($_SESSION[tn]==EN){echo 'If the title is Popup Menu Link or Divider type, you need to select its popup menu.';}else{echo '若標題是屬Popup菜單鏈結或隔項,須選擇所屬的Popup菜單。';}?>
	</p>
	</div>
	<?php echo '<select name="subm"><option value=" "></option>';
	;}
	if($rows[typ]=='popup'){
	echo '<option value="'.htmlspecialchars($rows[ap]).'"';
	if($row[subm]==$rows[subm])echo ' selected="selected"';
	echo '>['.htmlspecialchars($rows[typ]).']['.htmlspecialchars($rows[ap]).'.html] '.htmlspecialchars($rows[title]).'</option>';}
	$j=1;
	;};}
	if($j)echo '</select>';
	?>
	
	<?php ;}?>
	
	
	
	<?php ;}//if($alt=='webmenu'){?>
	
	
	
	<input type="hidden" name="guanyin1" value="<?php if(!$_POST[guanyin1])$_SESSION[guanyin1]=rand();
	echo htmlspecialchars($_SESSION[guanyin1]); ?>">
	
	<div class="ui-grid-d"><div class="ui-block-a">
	<input type="submit" name="submit" Value="<?php if($_SESSION[tn]==PRC){echo '送交';}else if($_SESSION[tn]==EN){echo 'SEND';}else{echo '送交';}?>"></div><div class="ui-block-b"></div><div class="ui-block-c"></div><div class="ui-block-d"></div>
	<div class="ui-block-e">
	<?php if($ap){?>
	<?php if($_SESSION[tn]==PRC){echo '隐藏/刪除';}else if($_SESSION[tn]==EN){echo 'Hidden/Del';}else{echo '隱藏/刪除';}?>
	
	<a href="#hiddens" data-rel="popup" data-transition="pop" class="ui-btn ui-btn ui-btn-inline ui-corner-all ui-mini" style="color:blue;">?</a>
	<div data-role="popup" id="hiddens" style="min-width:300px" data-theme="f"><a href="#" class="ui-btn ui-corner-all ui-icon-delete ui-btn-icon-notext ui-btn-right" data-rel="back"></a>
	<BR>
	<p>
	<?php if($_SESSION[tn]==PRC){echo '若选用\'隐藏\',当产生应用档案时,此标题将不在应用的菜单上。';}else if($_SESSION[tn]==EN){echo 'If you select hidden option, the title will not be showed on your APP menu when creating APP file.';}else{echo '若選用\'隐藏\',當產生應用檔案時,此標題將不在應用的菜單上。';}?>
	</p>
	</div>
	<select name="hidden">
	<option value="1"  <?php if($row[hidden]=='1')echo 'selected="selected"';?>><?php if($_SESSION[tn]==PRC){echo '不用隐藏';}else if($_SESSION[tn]==EN){echo 'Not Hidden';}else{echo '不用隱藏';}?></option>
	<option value="5"  <?php if($row[hidden]=='5')echo 'selected="selected"';?>><?php if($_SESSION[tn]==PRC){echo '隐藏';}else if($_SESSION[tn]==EN){echo 'Hidden ';}else{echo '隱藏';}?></option>
	<option value="d"  <?php if($row[hidden]=='d')echo 'selected="selected"';?>><?php if($_SESSION[tn]==PRC){echo '刪除';}else if($_SESSION[tn]==EN){echo 'Delete';}else{echo '刪除';}?></option>
	</select><?php ;}?>
	
	<?php if($pj and !$ap  and !$alt){?>
	<?php if($_SESSION[tn]==PRC){echo '专案隐藏';}else if($_SESSION[tn]==EN){echo 'Project Hidden';}else{echo '專案隱藏';}?>
	
	<a href="#hiddens" data-rel="popup" data-transition="pop" class="ui-btn ui-btn ui-btn-inline ui-corner-all ui-mini" style="color:blue;">?</a>
	<div data-role="popup" id="hiddens" style="min-width:300px" data-theme="f"><a href="#" class="ui-btn ui-corner-all ui-icon-delete ui-btn-icon-notext ui-btn-right" data-rel="back"></a>
	<BR>
	<p>
	<?php if($_SESSION[tn]==PRC){echo '若选用\'隐藏\',专案只显示在隐藏列表上。';}else if($_SESSION[tn]==EN){echo 'If you select hidden option, the project will only be showed on hidden list.';}else{echo '若選用\'隐藏\',專案只顯示在隐藏列表上。';}?>
	</p>
	</div>
	<select name="pjhidden">
	<option value="1"  <?php if($row[hidden]=='1')echo 'selected="selected"';?>><?php if($_SESSION[tn]==PRC){echo '不用隐藏';}else if($_SESSION[tn]==EN){echo 'Not Hidden';}else{echo '不用隱藏';}?></option>
	<option value="5"  <?php if($row[hidden]=='5')echo 'selected="selected"';?>><?php if($_SESSION[tn]==PRC){echo '隐藏';}else if($_SESSION[tn]==EN){echo 'Hidden ';}else{echo '隱藏';}?></option>
	</select><?php ;}?>
	</div>
	</div>
	</FORM>

	<hr><?php ;}//if(!$_GET[plt]){?>
	
	<FORM action="menudesign.php?pj=<?php echo htmlspecialchars($pj) ?>&plt=1" id="menudesign" method="post"  data-ajax="false">
	<input type="hidden" id="typposition" name="typposition" value="">
	<input type="hidden" id="bposition" name="bposition" value="">
	<input type="hidden" id="bnbr" name="bnbr" value="">
	<input type="hidden" id="insertposition" name="insertposition" value="" />	
	<input type="hidden" id="insertnbr" name="insertnbr" value="" />	
	<input type="hidden" name="guanyin5" value="<?php if(!$_POST[guanyin5])$_SESSION[guanyin5]=rand();
	echo htmlspecialchars($_SESSION[guanyin5]); ?>"></FORM>
	<?php if(!$pj){ ?>
	<a href="#" class="ui-btn ui-btn-inline ui-corner-all ui-mini ui-btn-icon-left ui-icon-info"><?php if($_SESSION[tn]==PRC){echo '创建专案才能创建菜单。';}else if($_SESSION[tn]==EN){echo 'Note : You need to create menu data after project creation.';}else{echo '創建專案才能創建菜單。';}?></a><br>
	<?php ;}
	if($pj and $alt!='webmenu'){ ?>
	<a href="menudesign.php?pj=<?php echo htmlspecialchars($pj) ?>&alt=webmenu" data-ajax="false" class="ui-btn ui-btn-g ui-btn-inline ui-corner-all ui-mini ui-btn-icon-left ui-icon-edit"><?php if($_SESSION[tn]==PRC){echo '编写此专案新菜单数据';}else if($_SESSION[tn]==EN){echo 'Edit Menu Data of New Project ';}else{echo '編寫此專案新菜單數據';}?></a><br>
	
	<?php ;}
	
	if(!$_GET[plt]){$php = 'menudesign.php';}
	?>
	<?php if($_GET[plt]){?>
	
	<?php if($_GET[plt] and !$ap){?>
	<a href="menudesign.php?pj=<?php echo $pj?>" class="ui-btn ui-btn ui-btn-inline ui-corner-all ui-mini" style="color:blue;" data-ajax="false"><</a><br>
	<?php }else if($_GET[plt] and $ap and $_GET[php]){?>
	<a href="<?php echo htmlspecialchars($_GET[php]) ?>.php?pj=<?php echo $pj?>&ap=<?php echo $ap?>&pn=<?php echo $pn?>" class="ui-btn ui-btn ui-btn-inline ui-corner-all ui-mini ui-btn-icon-left ui-icon-carat-l" style="color:blue;" data-ajax="false"><?php if($_SESSION[tn]==PRC){echo '返到功能编辑页';}else if($_SESSION[tn]==EN){echo 'Back to Function editing page';}else{echo '返到功能編輯頁';}?>	</a><br>
	<?php ;}?>
	
	<?php 
	$sql=$db->query("select * from webpj where cno='$pj'");
	if($sql)$row=$sql->fetch();
	if($row[title]){?>
	<?php if($_SESSION[tn]==PRC){echo '专案称';}else if($_SESSION[tn]==EN){echo 'Project name';}else{echo '專案稱';}?>	
	
	
	:<?php echo htmlspecialchars($row[title]).'<BR>';}?>
	
	<?php ;}?>
	<?php 
	$subm =1;
	$sql=$db->query("select * from webmenu where pjnbr='$pj' order by subm,nbr");
	if($sql){
	while($row=$sql->fetch()){
	if($_GET[plt] and ($row[typ]=='link' or $row[typ]=='popuplink')){$row[cno]=$row[aphtml];$php = 'webpage.php?pj='.$pj.'&ap='.htmlspecialchars($row[cno]).'&alt=webmenu';}else if($_GET[plt]){$php = '#';$drag = 'draggable="true"';}else{$php = '?pj='.$pj.'&ap='.htmlspecialchars($row[cno]).'&alt=webmenu';}	
	if($row[typ]=='popuplink' or $row[typ]=='popupdivider'){
	$popups[$row[subm]] .= '<a href="'.$php.'" data-ajax="false" '.$drag.' data-subm="'.$row[subm].'" data-nbr="'.$row[cno].'" data-nbrs="'.$subm.'" class="ui-btn '.$typ.' ui-corner-all ui-mini ui-btn-icon-left ui-icon-edit" style="width:88%">['.htmlspecialchars($row[nbr]).']['.htmlspecialchars($row[typ]).'] '.htmlspecialchars($row[title]).'</a>';}
	$subm++;
	;};}
	
	$subm =1;
	$sql=$db->query("select * from webmenu where pjnbr='$pj' order by nbr");
	if($sql){
	while($row=$sql->fetch()){
	if(!$i){if($_SESSION[tn]==PRC){echo '标题列表';}else if($_SESSION[tn]==EN){echo 'Title list';}else{echo '標題列表';};$i=1;?>

	<a href="#webmenus" data-rel="popup" data-transition="pop" class="ui-btn ui-btn ui-btn-inline ui-corner-all ui-mini" style="color:blue;">?</a>
	<div data-role="popup" id="webmenus" style="min-width:300px" data-theme="f"><a href="#" class="ui-btn ui-corner-all ui-icon-delete ui-btn-icon-notext ui-btn-right" data-rel="back"></a>
	<p><b style="color:pink"><?php if($_SESSION[tn]==PRC){echo '标题列表';}else if($_SESSION[tn]==EN){echo 'Title list';}else{echo '標題列表';}?></b></p>
	<p>
	<?php if($_SESSION[tn]==PRC){echo 'link = 链结,<br>popup = Popup菜单,<br>popuplink = Popup菜单链结,<br>popupdivider = Popup菜单隔项,<br>divider = 菜单隔项。';}else if($_SESSION[tn]==EN){echo 'popup = Popup Menu,<br>popuplink = Popup Menu Link,<br>popupdivider = Popup Menu Divider';}else{echo 'link = 鏈結,<br>popup = Popup菜單,<br>popuplink = Popup菜單鏈結,<br>popupdivider = Popup菜單隔項,<br>divider = 菜單隔項.';}?>
	</p>
	</div>
	<?php ;}
	if($row[hidden]!=5){

	
	if(!$row[nbr])$row[nbr] = '-';
	if($row[theme]){$typ = 'ui-btn-'.$row[theme];}else if($row[typ]=='divider' or $row[typ]=='popupdivider'){$typ = 'ui-btn-b';}else if($row[typ]=='popuplink'){$typ = 'ui-btn-g';}else{$typ = '';}
	if($_GET[plt] and ($row[typ]=='link' or $row[typ]=='popuplink')){$row[cno]=$row[aphtml];$php = 'webpage.php?pj='.$pj.'&ap='.htmlspecialchars($row[cno]).'&alt=webmenu';}else if($_GET[plt]){$php = '#';$drag = 'draggable="true"';}else{$php = '?pj='.$pj.'&ap='.htmlspecialchars($row[cno]).'&alt=webmenu';}
	if($row[typ]=='link' or $row[typ]=='divider'  or $row[typ]=='popup'){
	echo '<a href="'.$php.'" data-ajax="false" '.$drag.' data-subm="panel" data-nbr="'.$row[cno].'" data-nbrs="'.$subm.'" class="ui-btn '.$typ.' ui-corner-all ui-mini ui-btn-icon-left ui-icon-edit">['.htmlspecialchars($row[nbr]).']['.htmlspecialchars($row[typ]).'] '.htmlspecialchars($row[title]).$rowaphtml.'</a>';
	$subm++;
	if($popups[$row[subm]])echo $popups[$row[subm]];
	;}
	;}else{
		$hiddenlist .= '<a href="'.$php.'?pj='.$pj.'&ap='.htmlspecialchars($row[cno]).'&alt=webmenu" data-ajax="false" class="ui-btn '.$typ.' ui-corner-all ui-mini ui-btn-icon-left ui-icon-edit" '.$width.'>['.htmlspecialchars($row[nbr]).']['.htmlspecialchars($row[typ]).'] '.htmlspecialchars($row[title]).$rowaphtml.'</a>'
	;}
	;};}
	?>
	
	<?php 
	if($hiddenlist){
	echo '<br><br>';
	if($_SESSION[tn]==PRC){echo '隐藏标题列表';}else if($_SESSION[tn]==EN){echo 'Hidden Title list';}else{echo '隐藏標題列表';}
	echo $hiddenlist;
	
	;}
	
	?>
    <HR><ul data-role="listview" data-inset="true"  data-corners="false">
	<?php 
	if($pj){
	$sql=$db->query("select * from webhtml where pjnbr='$pj' order by nbr,date desc");
	if($sql){
	while($row=$sql->fetch()){
	if($row[hidden]!=5){
	if(!$p){if($_SESSION[tn]==PRC){echo '专案应用页列表';}else if($_SESSION[tn]==EN){echo 'Project Page List';}else{echo '專案應用頁列表';};$p=1;}
	if($row[style]=='apps'){
		if($row[apn]){$rowaphtml = '<BR><span style="color:blue">[copy - '.$row[apn].'.html/iframe popup - web'.$row[apn].'.html]</span>';}else{$rowaphtml = '<BR><span style="color:blue">[copy - '.$row[ap].'.html/iframe popup - web'.$row[ap].'.html]</span>';}	
	}else if($row[apn]){$rowaphtml = ' <span style="color:blue">['.$row[apn].'.html]</span>';}else{$rowaphtml = ' <span style="color:blue">['.$row[ap].'.html]</span>';}
	
	if($pj){
	if($pj==$row[pjnbr])echo '<li><a href="webpage.php?pj='.htmlspecialchars($row[pjnbr]).'&ap='.htmlspecialchars($row[ap]).'" data-ajax="false" class="ui-btn ui-btn ui-mini ui-btn-icon-left ui-icon-edit" style="white-space:normal">['.htmlspecialchars($row['pjnbr']).']['.htmlspecialchars($row['date']).'] '.htmlspecialchars($row[title]).$rowaphtml.'</a></li>';}
	else{
	echo '<li><a href="webpage.php?pj='.htmlspecialchars($row[pjnbr]).'&ap='.htmlspecialchars($row[ap]).'" data-ajax="false" class="ui-btn ui-btn ui-mini ui-btn-icon-left ui-icon-edit" style="white-space:normal">['.htmlspecialchars($row['pjnbr']).']['.htmlspecialchars($row['date']).'] '.htmlspecialchars($row[title]).$rowaphtml.'</a></li>';}
	;}
	;};};}?>
	</ul>
	

	<div data-role="popup" id="createpjt" style="min-width:300px" data-theme="f"><a href="#" class="ui-btn ui-corner-all ui-icon-delete ui-btn-icon-notext ui-btn-right" data-rel="back"></a>	
	<br><br>
	<p style="color:black"><?php if($_SESSION[tn]==PRC){echo '编制新专案，在\'专案称\'填上quicktry。';}else if($_SESSION[tn]==EN){echo 'You need to fill in quicktry to \'project title\' for Create New Project.';}else{echo '編制新專案，在\'專案稱\'填上quicktry。';}?></p>	
	<p style="color:black"><?php if($_SESSION[tn]==PRC){echo '将自动显示内容......';}else if($_SESSION[tn]==EN){echo 'Will show content automatically.........';}else{echo '將自動顯示內容......';}?></p>
	</div>
	
	
	<div data-role="popup" id="createmnu" style="min-width:300px" data-theme="f"><a href="#" class="ui-btn ui-corner-all ui-icon-delete ui-btn-icon-notext ui-btn-right" data-rel="back"></a>	
	<br><br>
	<p style="color:black"><?php if($_SESSION[tn]==PRC){echo 'quicktry专案巳创建，点撀\'设置侧控菜单按钮\'编制应用菜单，即是应用的导航菜单。';}else if($_SESSION[tn]==EN){echo 'The Project quicktry was created. You need to draft APP menu by clicking the \'Edit Panel button\'';}else{echo 'quicktry專案巳創建，點撀\'設置側控菜單按鈕\'編制應用菜單，即是應用的導航菜單。';}?></p>	
	<p style="color:black"><?php if($_SESSION[tn]==PRC){echo '将自动显示内容......';}else if($_SESSION[tn]==EN){echo 'Will show content automatically.........';}else{echo '將自動顯示內容......';}?></p>
	</div>
	
	
	<div data-role="popup" id="createmns" style="min-width:300px" data-theme="f"><a href="#" class="ui-btn ui-corner-all ui-icon-delete ui-btn-icon-notext ui-btn-right" data-rel="back"></a>	
	<br><br>
	<p style="color:black"><?php if($_SESSION[tn]==PRC){echo '此时此教程巳将\'设置侧控菜单按钮\'点撀。';}else if($_SESSION[tn]==EN){echo 'The \'Edit Panel button\' was clicked at this moment by tutorial.';}else{echo '此時此教程巳將\'設置側控菜單按鈕\'點撀。';}?></p>	
	<p style="color:black"><?php if($_SESSION[tn]==PRC){echo '此时此教程巳将菜单按钮启用。但在设计时，您须点撀\'设置侧控菜单按钮\'，填\'菜单按钮标题\'并送交，才能启用菜单按钮。';}else if($_SESSION[tn]==EN){echo 'The panel menu  was enabled by this tutorial. When designing APP, you need to click the \'Edit Panel button\', fill in the \'Panel button title\' and click the SEND button to enable the menu function.';}else{echo '此時此教程巳將菜單按鈕啟用。但在設計時，您須點撀\'設置側控菜單按鈕\'，填\'菜單按鈕標題\'並送交，才能啟用菜單按鈕。';}?></p>
	
	<p style="color:black"><?php if($_SESSION[tn]==PRC){echo '此时此教程巳将Playground及Album创建。但在设计时，您须在\'菜单按钮标题\'填上Playground并送交，并再点撀\'编写此专案新菜单数据\'，重覆步骤但填上Album标题。';}else if($_SESSION[tn]==EN){echo 'Two menu data Playground and Album as examples was created by this tutorial. Actually you need to fill in the Playground to the \'Panel button title\' in design stage and click the SEND button. Then you need to click the \'Edit New Project Menu Data\' and repeat the steps by entering Album as the title.';}else{echo '此時此教程巳將Playground及Album創建。但在設計時，您須在\'菜單按鈕標題\'填上Playground並送交，並再點撀\'編寫此專案新菜單數據\'，重覆步驟但填上Album標題。';}?></p>	
	<p style="color:black"><?php if($_SESSION[tn]==PRC){echo '在设计时，点撀此页的\'设计步骤\'并点撀\'应用页创建\'，到应用页编辑页。';}else if($_SESSION[tn]==EN){echo 'You need to click the \'Design step\' and the \'APP page design\' to go to APP page editing page when designing APP.';}else{echo '在設計時，點撀此頁的\'設計步驟\'並點撀\'應用頁創建\'，到應用頁編輯頁。';}?></p>	
	
	<p><a href="webpage.php?pj=<?php echo $pj?>" data-ajax="false" class="ui-btn ui-btn-f ui-btn-inline ui-corner-all ui-mini" style="color:black;"><?php if($_SESSION[tn]==PRC){echo '下一步 - 到应用页编辑页';}else if($_SESSION[tn]==EN){echo 'Next step - APP page editing page';}else{echo '下一步 - 到應用頁編輯頁';}?></a></p>	
	</div>
	

	<div data-role="popup" id="linkmnu" style="min-width:300px" data-theme="f"><a href="#" class="ui-btn ui-corner-all ui-icon-delete ui-btn-icon-notext ui-btn-right" data-rel="back"></a>	
	<br><br>
	<p style="color:black"><?php if($_SESSION[tn]==PRC){echo '此时此教程巳对quicktry专案的二页应用页进行链结设置。';}else if($_SESSION[tn]==EN){echo 'The two APP pages of Project quicktry was linked to APP menu by this tutorial.';}else{echo '此時此教程巳對quicktry專案的二頁應用頁進行鏈結設置。';}?></p>	
	<p style="color:black"><?php if($_SESSION[tn]==PRC){echo '在设计时，在此页底部的列表点撀相关菜单标题,再在\'链结页\'进行设置。';}else if($_SESSION[tn]==EN){echo 'When APP designing, you need to click the APP menu title on the list of this page and select the APP page for the menu title.';}else{echo '在設計時，在此頁底部的列表點撀相關菜單標題,再在\'鏈結頁\'進行設置。';}?></p>	
	<p style="color:black"><?php if($_SESSION[tn]==PRC){echo '在设计时，点撀此页的\'设计步骤\'并点撀\'应用档案产生\'，到应用档案编辑页。';}else if($_SESSION[tn]==EN){echo 'You need to click the \'Design step\' and the \'APP file creation\' to go to APP file creation page when designing APP.';}else{echo '在設計時，點撀此頁的\'設計步驟\'並點撀\'應用檔案產生\'，到應用檔案編輯頁。';}?></p>	
	<p><a href="app.php?pj=<?php echo $pj?>" data-ajax="false" class="ui-btn ui-btn-f ui-btn-inline ui-corner-all ui-mini" style="color:black;"><?php if($_SESSION[tn]==PRC){echo '下一步 - 产生应用档案';}else if($_SESSION[tn]==EN){echo 'Next step - Create APP file';}else{echo '下一步 - 產生應用檔案';}?></a></p>	
	</div>
	
	
	<div data-role="popup" id="step"><a href="#" class="ui-btn ui-corner-all ui-icon-delete ui-btn-icon-notext ui-btn-right" data-rel="back"></a>

	<ul data-role="listview" data-inset="true">
     <li data-icon="edit"><a href="menudesign.php?pj=<?php echo $pj?>" data-ajax="false"><?php if($_SESSION[tn]==PRC){echo '创建专案及菜单设计';}else if($_SESSION[tn]==EN){echo 'Creating project and menu design';}else{echo '創建專案及菜單設計';}?></a></li>
	<li data-icon="edit"><a href="webpage.php?pj=<?php echo $pj?>" data-ajax="false"><?php if($_SESSION[tn]==PRC){echo '应用页创建';}else if($_SESSION[tn]==EN){echo 'APP page design';}else{echo '應用頁創建';}?></a></li>
	<li data-icon="edit"><a href="app.php?pj=<?php echo $pj?>" data-ajax="false"><?php if($_SESSION[tn]==PRC){echo '应用档案产生';}else if($_SESSION[tn]==EN){echo 'APP file creation';}else{echo '應用檔案產生';}?></a></li>
	</ul>
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
<script>
document.addEventListener("dragstart", function(event) {
	$('#typposition').val(event.target.getAttribute('data-subm')); 
	$('#bposition').val(event.target.getAttribute('data-nbr')); 	
	$('#bnbr').val(event.target.getAttribute('data-nbrs')); 
});
document.addEventListener("dragover", function(event) {
    event.preventDefault();
});
document.addEventListener("drop", function(event) {
    event.preventDefault();
	var typ = event.target.getAttribute('data-subm');
	var insert = event.target.getAttribute('data-nbr');
	var inserts = event.target.getAttribute('data-nbrs');
	if(!insert)insert='';	if(!inserts)inserts='';	
    if ( typ == $('#typposition').val() && insert!=$('#bposition').val()) {
	$('#insertposition').val(insert); $('#insertnbr').val(inserts); 
       document.forms["menudesign"].submit();
    }else{
	$('#insertposition').val(''); $('#insertnbr').val(''); 
	$('#bposition').val(''); $('#bnbr').val(''); 
	;}
});

</script>
<?php 
if($_SESSION[tutorial]){ echo '<script>if(document.URL.indexOf("pj=") == -1)$("#pjtitle").val("quicktry");	</script>';}


$tdy=0;
$tdy=date('Y-m-d');
if($_POST['pjtitle'] and $_SESSION[guanyin1] and $_SESSION[guanyin1]==$_POST[guanyin1]){

if(!file_exists('../panel/'.$pj)){mkdir('../panel/'.$pj);mkdir('../panel/'.$pj.'/images');}

if($pj and !preg_match('/^[0-9]*$/',$pj))exit;

	if($pj){
		if($_POST[pjhidden]){
		$db->exec("update webpj set hidden='$_POST[pjhidden]',date='$tdy' where cno='$pj'");
		if($_POST[pjhidden]==5)echo "<meta http-equiv='refresh' content='0;URL=project.php?pj=".htmlspecialchars($pj)."&ap=1'>";
		}else if($_POST[panelbtns] or $_POST[mnbgs] or $_POST[prestyle]){
		$db->exec("update webpj set menubtns='$_POST[panelbtns]',mnbgs='$_POST[mnbgs]',prestyle='$_POST[prestyle]',title='$_POST[pjtitle]',date='$tdy' where cno='$pj'");
		$menudesign =1 ;	
		}else if($_POST[panelbtn] or $_POST[bg] or $_POST[panelbg]){
		$db->exec("update webpj set menubtn='$_POST[panelbtn]',mnbg='$_POST[bg]',panelbg='$_POST[panelbg]',title='$_POST[pjtitle]',hidden='$_POST[pjhidden]',date='$tdy' where cno='$pj'");
		$menudesign =1 ;	
		}else if($_POST[pjtitle] or $_POST[ptheme] or $_POST[pjbg]){
		$db->exec("update webpj set title='$_POST[pjtitle]',ptheme='$_POST[ptheme]',pjbg='$_POST[pjbg]',date='$tdy' where cno='$pj'");}
	}else{
	
		$sql=$db->exec("insert into webpj (title,ptheme,pjbg,date)"."values('$_POST[pjtitle]','b','$_POST[pjbg]','$tdy')"); 
		$sql=$db->query("select max(cno) as cno from webpj");
		if($sql)$row=$sql->fetch();
		$pj = $row[cno];
		if(file_exists('../website/'.$row[cno])==false and $row[cno]){mkdir('../website/'.$row[cno]);mkdir('../website/'.$row[cno].'/images');}
		if(file_exists('../panel/'.$row[cno])==false and $row[cno]){mkdir('../panel/'.$row[cno]);mkdir('../panel/'.$row[cno].'/images');}
		$sql=$db->query("select max(nbr) as nbr from webpj");
		if($sql)$row=$sql->fetch();
		$nbr = $row[nbr]+1;
		$db->exec("update webpj set nbr='$nbr' where cno='$row[cno]'");
	;}
	
	
if(!$_POST['title'] and $_POST[pjhidden]!=5)echo "<meta http-equiv='refresh' content='0;URL=menudesign.php?pj=".htmlspecialchars($pj)."&alt=".htmlspecialchars($alt)."'>";
;}

if($_POST['pjtitle'] and $_POST['title'] and $_SESSION[guanyin1] and $_SESSION[guanyin1]==$_POST[guanyin1]){
	
	if($ap and !preg_match('/^[0-9]*$/',$ap))exit;
	if($_POST[html]==' ')$_POST[html] = '';
	//if($_POST[html])$html = explode("@",$_POST[html]);
	$html = htmlspecialchars($_POST[html]).'.html';
	
	if($_POST[hidden]=='d' and $ap){
		$db->exec("delete from webmenu where cno='$ap';");
	}else if($ap){
		if($_POST[subm]==' ')$_POST[subm]=$ap;
		if($_POST[subm]){

		
		$db->exec("update webmenu set typ='$_POST[typ]',title='$_POST[title]',titlebg='$_POST[titlebg]',function='',html='$html',aphtml='$_POST[aphtml]',subm='$_POST[subm]',hidden='$_POST[hidden]',theme='$_POST[theme]',nbr='$_POST[nbr]',htmlstyle='$html[3]',wsp='$_POST[titlewsp]',date='$tdy' where cno='$ap'");
		}else{
		$db->exec("update webmenu set typ='$_POST[typ]',title='$_POST[title]',titlebg='$_POST[titlebg]',function='',html='$html',aphtml='$_POST[aphtml]',hidden='$_POST[hidden]',theme='$_POST[theme]',nbr='$_POST[nbr]',htmlstyle='$html[3]',wsp='$_POST[titlewsp]',date='$tdy' where cno='$ap'");		
		;}
	}else{
		$sql=$db->exec("insert into webmenu (typ,pjnbr,title,titlebg,function,html,aphtml,subm,hidden,theme,nbr,wsp,date)"."values('$_POST[typ]','$pj','$_POST[title]','$_POST[titlebg]','','$html','$_POST[html]','$_POST[subm]','1','$_POST[theme]','$_POST[nbr]','$_POST[titlewsp]','$tdy')"); 
		if(!$_POST[subm]){
		$sql=$db->query("select max(cno) as cno from webmenu");
		if($sql)$row=$sql->fetch();
		$db->exec("update webmenu set ap='$row[cno]',subm='$row[cno]' where cno='$row[cno]'");
		}
		
		if($_POST[typ]=='popupdivider' or $_POST[typ]=='popuplink'){
		}else{
		$sql=$db->query("select max(nbr) as nbr from webmenu where pjnbr='$pj'");
		if($sql)$row=$sql->fetch();
		$db->exec("update webpj set menunbr='$row[nbr]' where cno='$pj'");		
		;}
	;}
	
$menudesign =5 ;	

;}


if($_POST[bposition] and $_SESSION[guanyin5] and $_SESSION[guanyin5]==$_POST[guanyin5]){
$nbr =1;
if($_POST[bposition] and !preg_match('/^[0-9]*$/',$_POST[bposition]))exit;
if($_POST[insertposition] and !preg_match('/^[0-9]*$/',$_POST[insertposition]))exit;
$bposition=$_POST[bposition];
$insertposition=$_POST[insertposition];
$sql=$db->query("select * from webmenu where pjnbr='$pj' order by nbr");
	if($sql){
	while($row=$sql->fetch()){
	if($row[cno]==$insertposition and $_POST[bnbr]>$_POST[insertnbr]){
		$db->exec("update webmenu set nbr='$nbr' where cno='$bposition'");
		$nbr=$nbr+1;
		$db->exec("update webmenu set nbr='$nbr' where cno='$insertposition'");	
	;}else if($row[cno]==$bposition and $_POST[bnbr]>$_POST[insertnbr]){
	
	;}else if($row[cno]==$bposition and $_POST[bnbr]>$_POST[insertnbr]){
		$nbr=$nbr-1;
	;}else if($row[cno]==$insertposition and $_POST[bnbr]<$_POST[insertnbr]){
		$nbr=$nbr+1;
		$db->exec("update webmenu set nbr='$nbr' where cno='$bposition'");	
	}else{	
		$db->exec("update webmenu set nbr='$nbr' where cno='$row[cno]'");}
	$nbr++;
	;};}
$menudesign =1;	
;}

if($menudesign and ($_SESSION[guanyin1] and $_SESSION[guanyin1]==$_POST[guanyin1]) or ($_SESSION[guanyin5] and $_SESSION[guanyin5]==$_POST[guanyin5])){
$sql=$db->query("select * from webmenu where pjnbr='$pj' order by nbr");
	if($sql){
	while($row=$sql->fetch()){
	if($row[wsp]){$wsp = 'white-space:normal;';}else{$wsp = '';}
	
	if($row[hidden]==1){
	if($row[typ]=='popup')$popup .= $row[ap].',';

	if($row[typ]=='popupdivider' or $row[typ]=='popuplink'){
	$popuplink =1;
	$rowsubm=$row[subm];
	$menuhtmls[$rowsubm] .= '<li '; 	
	if($row[typ]=='popupdivider')$menuhtmls[$rowsubm] .= ' data-role="list-divider" ';
	if($row[theme]){$theme = 'color:'.$row[theme].';';}else{$theme = '';}
	if($row[titlebg]){$bg = 'background-image:url(images/'.htmlspecialchars($row[titlebg]).');background-size:100% 100%;background-repeat:no-repeat;border:none;';}else{$bg = 'border:none;';}
	$style = 'style="'.$bg.$theme.$wsp.'"';
		if($row[typ]=='popupdivider'){		
		$menuhtmls[$rowsubm] .= $style.'>'.htmlspecialchars($row[title]).'</li>'; 
		;}else{
		$menupopups[$rowsubm]++;
		$menuhtmls[$rowsubm] .= ' ><a href="#" data-to="" data-nbr="'.$row['aphtml'].'" data-pop="" id="appmenu'.$row['aphtml'].'" class="appmenu ui-btn ui-btn-icon-right ui-icon-carat-r" '.$style.'>'.htmlspecialchars($row[title]).'</a></li>'; }

	;}else{ 
	$menuhtml .= '<li '; 	
	if($row[typ]=='divider')$menuhtml .= ' data-role="list-divider" ';
	if($row[typ]=='link' or !$row['html'])$row['html'] = '#';
	
	if($row[typ]=='popup'){$row['html'] = '#menupopup'.htmlspecialchars($row[ap]).'" data-rel="popup';}
	if($row[theme]){$theme = 'color:'.$row[theme].';';}else{$theme = '';}
		if($row[titlebg]){$bg = 'background-image:url(images/'.htmlspecialchars($row[titlebg]).');background-size:100% 100%;background-repeat:no-repeat;border:none;';}
		else{$bg = 'border:none;';}
	$style = 'style="'.$bg.$theme.$wsp.'"';
	if($row[typ]=='divider'){
		$menuhtml .= $style.'>'.htmlspecialchars($row[title]).'</li>'; 
		;}else{
		if($row[typ]=='popup'){$uibtn = 'topmenupopup ui-icon-plus';$appmenu = '';$appto = '';$idappmenu ='';}
		else if($row[typ]=='link'){$uibtn = 'ui-icon-carat-r';$appmenu = 'appmenu ';$appto = 'data-to="" data-nbr="'.$row['aphtml'].'"';$idappmenu = 'id="appmenu'.$row['aphtml'].'"';}else{$uibtn = '';$appmenu = ''; $appto = '';$idappmenu =''; }
		$menuhtml .= ' ><a href="'.$row['html'].'" '.$appto.' '.$idappmenu.' class="'.$appmenu.'ui-btn ui-btn-icon-right '.$uibtn.'" '.$style.'>'.htmlspecialchars($row[title]).'</a></li>';}
	}
	
	;}//if($row[hidden]==1){
	;};}
	
	if($menuhtml){
	
	if($menudesign==5){$_POST[panelbg]=$row[panelbg]; $_POST[panelbtns]=$row[menubtns]; $_POST[mnbgs]=$row[mnbgs]; $_POST[prestyle]=$row[prestyle];}
	
	if($_POST[panelbg]){
		if(strlen($_POST[panelbg])==1){$panelbg = '';$panelbgtheme = ' data-theme="'.htmlspecialchars($_POST[panelbg]).'"';}
		else{
		$_POST[panelbg] = str_replace('/','',$_POST[panelbg]);
		$_POST[panelbg] = str_replace('\\','',$_POST[panelbg]);
		$_POST[panelbg] = str_replace('..','',$_POST[panelbg]);
		$panelbg = ' style="background-image:url(images/'.htmlspecialchars($_POST[panelbg]).');background-size:100%;"';
		}
	}
	
	if($_POST[panelbtns]=='btns'){$panelbtns = '&nbsp;';}else if($_POST[panelbtns]){$panelbtns = htmlspecialchars($_POST[panelbtns]);}
	if(strlen($_POST[mnbgs])==1){$uimnbgs = ' ui-btn-'.htmlspecialchars($_POST[mnbgs]);}
	else if($_POST[mnbgs]){$mnbgs = ' style="background-image:url(images/'.htmlspecialchars($_POST[mnbgs]).');background-size:100%;"';}
	if($_POST[prestyle])$prestyle = ' data-transition="'.htmlspecialchars($_POST[prestyle]).'"';	
	
	
	
	if($panelbtns)$pres = '<a href="#" data-rel="back" '.$mnbgs.$prestyle.' class="ui-btn'.$uimnbgs.' ui-btn-inline ui-mini ui-btn-icon-left ui-icon-carat-l">'.$panelbtns.'</a>';
	if($popuplink and $popup)$panel = 'panel ';
	$menuhtml = '<div data-role="panel" id="menupanel" data-display="overlay" data-position-fixed="true" '.$panelbgtheme.$panelbg.'>'.$pres.'<ul style="min-width:210px;overflow-y:auto;" class="'.$panel.'menupanel" data-role="listview" data-corners="false" data-inset="true">'.$menuhtml.'</ul>';
	;}//if($menuhtml){
	
	if($popuplink and $popup){
		$popupn = explode(',',$popup);
		for($i=0;$i<sizeof($popupn)-1;$i++){
		$popups = $popupn[$i];
		$menuhtml .= '
		<div id="menupopup'.htmlspecialchars($popups).'" data-role="popup" data-transition="pop" data-theme="none">
		<ul style="min-width:210px;" data-role="listview" class="menupanel" data-corners="false" data-inset="true">';
		$menuhtml .= str_replace('data-pop=""','data-pop="menupopup'.htmlspecialchars($popups).'"',$menuhtmls[$popups]);
		$menuhtml .= '</ul></div>';
		$menuhtmls[$popups]='';
		;}		
		$popups='';
	;}//if($popuplink and $popup){
	
	$menuhtml .= '</div>';

		$fpagtrns='../panel/'.$pj.'/menu.html';
				$opnrtrns = fopen($fpagtrns, "w");
				fwrite($opnrtrns,$menuhtml);
 				fclose($opnrtrns);
		$menuhtml='';		
if($_SESSION[guanyin5]){
echo "<meta http-equiv='refresh' content='0;URL=menudesign.php?pj=".htmlspecialchars($pj)."&plt=1'>";
;}else{
echo "<meta http-equiv='refresh' content='0;URL=menudesign.php?pj=".htmlspecialchars($pj)."&ap=".htmlspecialchars($ap)."&alt=".htmlspecialchars($alt)."'>";
;}
;}
?>
