<?php session_start();  
//$_SESSION[tn]='';

if($_GET[pj] and !preg_match('/^[0-9]*$/',$_GET[pj]))exit;
if($_GET[pj])$pj = $_GET[pj];
if($_GET[ap])$ap = $_GET[ap];
if($_GET[nw])$nw = $_GET[nw];

define("ROOTPATH", "../");
include_once (ROOTPATH.'administration/db_conn.php');

$sql=$db->query("select * from webpj where cno='$pj'");
	if($sql)$row=$sql->fetch();
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
	
	</head>
	<body><div data-role="page" data-theme="f" class="page indexhtml">
	<div  data-role="header" id="hrdiv" data-theme="f"><h1 id="hrs"><?php if($_SESSION[tn]==PRC){echo '专案管理 - AppMoney712 移动应用设计系统';}else if($_SESSION[tn]==EN){echo 'Project Management - AppMoney712 APP Creation System';}else{echo '專案管理 - AppMoney712 移動應用設計系統';}?></h1><a href="#navigations" id="menubttns"  data-rel="popup" data-transition="pop" class="ui-btn-left ui-btn ui-btn-inline ui-corner-all ui-btn-icon-left ui-icon-bars">&nbsp;&nbsp;&nbsp;</a>
	</div><!-- /header --><div  class="ui-content pagebg"><!--copyiframe--><!-- /content!-->
	
	<?php if($_SESSION[tn]==PRC){echo '专案管理';}else if($_SESSION[tn]==EN){echo 'Project Management';}else{echo '專案管理';}?><BR>
	<a href="menudesign.php" data-ajax="false" class="ui-btn ui-btn ui-btn-inline ui-corner-all ui-mini ui-btn-icon-left ui-icon-edit"><?php if($_SESSION[tn]==PRC){echo '新专案';}else if($_SESSION[tn]==EN){echo 'Edit New Project';}else{echo '新專案';}?></a>

	<a href="project.php?ap=1" data-ajax="false" class="ui-btn ui-btn ui-btn-inline ui-corner-all ui-mini ui-btn-icon-left ui-icon-edit"><?php if($_GET[ap] and !$_GET[nw])echo '<span style="color:pink">';if($_SESSION[tn]==PRC){echo '修改專案資料';}else if($_SESSION[tn]==EN){echo 'Amend Project Data';}else{echo '修改專案資料';}if($_GET[ap] and !$_GET[nw])echo '</span>';?></a>	

	<a href="project.php?ap=1&nw=1" data-ajax="false" class="ui-btn ui-btn ui-btn-inline ui-corner-all ui-mini ui-btn-icon-left ui-icon-edit"><?php if($_GET[nw])echo '<span style="color:pink">';if($_SESSION[tn]==PRC){echo '复制專案資料';}else if($_SESSION[tn]==EN){echo 'Copy Project Data';}else{echo '複製專案資料';}if($_GET[nw])echo '</span>';?></a>	
	
	<a href="project.php" data-ajax="false" class="ui-btn ui-btn ui-btn-inline ui-corner-all ui-mini ui-btn-icon-left ui-icon-edit"><?php if(!$_GET[ap] and !$_GET[nw])echo '<span style="color:pink">';if($_SESSION[tn]==PRC){echo '專案列表';}else if($_SESSION[tn]==EN){echo 'Project list';}else{echo '專案列表';}if(!$_GET[ap] and !$_GET[nw])echo '</span>';?></a>	
	
	<a href="#infs" data-rel="popup" data-transition="pop" class="ui-btn ui-btn-b ui-btn-inline ui-corner-all ui-mini">? <?php if($_SESSION[tn]==PRC){echo '解释';}else if($_SESSION[tn]==EN){echo 'Explanation';}else{echo '解釋';}?></a>
	<div data-role="popup" id="infs" style="min-width:300px;max-width:85%" data-position-to="window" data-theme="f">
	<p>
	<?php if($_SESSION[tn]==PRC){echo '点撀\'新专案\'创建新专案。';}else if($_SESSION[tn]==EN){echo 'The \'Edit New Project\' is for creating new APP project.';}else{echo '點撀\'新專案\'創建新專案。';}?>
	</p>
	<HR>
	<p>
	<?php if($_SESSION[tn]==PRC){echo '\'修改专案资料\'是修改现有专案，点撀专案列表的标题能修改相关专案资料。';}else if($_SESSION[tn]==EN){echo 'The \'Amend Project Data\' is for amending existing project. When you click the title of project list, you can amend the related project information.';}else{echo '\'修改專案資料\'是修改現有專案，點撀專案列表的標題能修改相關專案資料。';}?>
	</p>
	<HR>
	<p>
	<?php if($_SESSION[tn]==PRC){echo '\'复制专案资料\'是复制现行专案的资料到新专案，点撀专案列表的标题或能进行资料复制。';}else if($_SESSION[tn]==EN){echo 'The \'Copy Project Data\' is for copying existing project data and files to new project(without any menu data created). When you click the title of project list, you can perform any data copying if possible.';}else{echo '\'複製專案資料\'是複製現行專案的資料到新專案，點撀專案列表的標題或能進行資料複製。';}?>
	</p>
	<HR>
	<p>
	<?php if($_SESSION[tn]==PRC){echo '\'专案列表\'是相关应用设计，点撀专案列表的标题能对相关专案进行设计。';}else if($_SESSION[tn]==EN){echo 'The \'Project list\' is for designing app. When you click the title of project list, you can perform related menu design of existing project.';}else{echo '\'專案列表\'是相關應用設計，點撀專案列表的標題能對相關專案進行設計。';}?>
	</p>
	
	</div>
   <hr>
   	<?php if($ap){?>
   	<FORM action="project.php?pj=<?php echo htmlspecialchars($pj) ?>" method="post" onSubmit="return checkform(this);" data-ajax="false">

	<?php if(!$nw){?>
	<?php if($_SESSION[tn]==PRC){echo '专案称';}else if($_SESSION[tn]==EN){echo 'Project name';}else{echo '專案稱';}?>	
	<a href="#pjtitles" data-rel="popup" data-transition="pop" class="ui-btn ui-btn ui-btn-inline ui-corner-all ui-mini" style="color:blue;">?</a>
	<div data-role="popup" id="pjtitles" style="min-width:300px" data-theme="f">
	<p>
	<?php if($_SESSION[tn]==PRC){echo '此名称只用在此软件。应用名称是在\'应用档案产生\'进行定义的。';}else if($_SESSION[tn]==EN){echo 'It is for this software only. You need to define APP name of your design on APP File Creation.';}else{echo '此名稱只用在此軟件。應用名稱是在\'應用檔案產生\'進行定義的。';}?>
	</p>
	</div>
	<input name="pjtitle" type="text" value="<?php echo htmlspecialchars($row[title])?>" required>
	
	<?php if($_SESSION[tn]==PRC){echo '专案描述';}else if($_SESSION[tn]==EN){echo 'Project description';}else{echo '專案描述';}?>	
	
	<input name="des" type="text" value="<?php echo htmlspecialchars($row[des])?>">
	<?php if($_SESSION[tn]==PRC){echo '专案序号';}else if($_SESSION[tn]==EN){echo 'Project sequential number';}else{echo '專案序號';}?>	
	
	<input name="nbr" type="number" value="<?php echo htmlspecialchars($row[nbr])?>">
	<hr>

	<?php if($_SESSION[tn]==PRC){echo '插入';}else if($_SESSION[tn]==EN){echo 'Insert to';}else{echo '插入';}?>
	<a href="#Inserts" data-rel="popup" data-transition="pop" class="ui-btn ui-btn ui-btn-inline ui-corner-all ui-mini" style="color:blue;">?</a>
	<div data-role="popup" id="Inserts" style="min-width:300px" data-theme="f">
	<p>
	<?php if($_SESSION[tn]==PRC){echo '此项是专案列表排序之用。';}else if($_SESSION[tn]==EN){echo 'It is for reordering the project list.';}else{echo '此項是專案列表排序之用。';}?>
	</p>
	</div>
	<?php ;}//if(!$nw){?>
	
	
	<?php if($nw){?>
	<span style="color:pink"><?php 
		if($row[title]){if($_SESSION[tn]==PRC){echo '步骤2 : 在选择内点选被复制专案,此专案数据及相关档案被复制到';}else if($_SESSION[tn]==EN){echo 'Step2 : Please select a project on the selection box. The selected project data and files will be copied to ';}else{echo '步驟2 : 在選擇內點選被複製專案,此專案數據及相關檔案被複製到';}echo ' '.htmlspecialchars($row[title]);}else{if($_SESSION[tn]==PRC){echo '步骤1 : 在下面列表点选进行复制的专案标题';}else if($_SESSION[tn]==EN){echo 'Step1 : Click a project title on the below list';}else{echo '步驟1 : 在下面列表點選進行複制的專案標題';};}
	$sqls=$db->query("select * from webmenu where pjnbr='$pj'");
	if($sqls){
	while($rows=$sqls->fetch()){
	$webmenu =1;
	;};}
	
	;}//if(!$nw){?></span>
	
	<?php if(!$nw or ($nw and $pj and !$webmenu)){?>
	<?php $sqls=$db->query("select * from webpj order by nbr desc");
	if($sqls){
	while($rows=$sqls->fetch()){
	$webpjnbr = $rows[nbr];
	if($nw){$sltnm = 'datacopy';}else{$sltnm = 'insert';}
	if(!$i){echo '<select name="'.$sltnm.'"><option value=" ">';
	if($_SESSION[tn]==PRC){echo '选择';}else if($_SESSION[tn]==EN){echo 'Select';}else{echo '選擇';}
	echo '</option>';}
	if($rows[cno]!=$pj){
	echo '<option value="'.htmlspecialchars($rows[cno]).'">';
	if($rows[nbr]){echo '['.htmlspecialchars($rows[nbr]).']';}else{echo '[-]';}
	echo  htmlspecialchars($rows[title]);
	echo  ' ['.htmlspecialchars($rows[date]).']</option>';
	}
	$i=1;
	;};}
	if($i)echo '</select>';

	
	;}//if(!$nw or ($nw and $pj)){
	
		
	if($webmenu){
	echo '<br>';if($_SESSION[tn]==PRC){echo '此专案巳有菜单数据，此复制功能只限新专案并没有任何数据。';}else if($_SESSION[tn]==EN){echo 'Menu data of this selected project was found. This function is for new project without any menu data only.';}else{echo '此專案巳有菜單數據，此複製功能只限新專案並沒有任何數據。';}
	;}
	?>



	<?php if(!$nw){?>
	<?php if($_SESSION[tn]==PRC){echo '隐藏/刪除';}else if($_SESSION[tn]==EN){echo 'Hidden/Del';}else{echo '隱藏/刪除';}?>
	
	<a href="#hiddens" data-rel="popup" data-transition="pop" class="ui-btn ui-btn ui-btn-inline ui-corner-all ui-mini" style="color:blue;">?</a>
	<div data-role="popup" id="hiddens" style="min-width:300px" data-theme="f">
	<p>
	<?php if($_SESSION[tn]==PRC){echo '若选用\'隐藏\',此专案只在隐藏列表上。';}else if($_SESSION[tn]==EN){echo 'If you select the hidden option, the title will be showed on the hidden list.';}else{echo '若選用\'隐藏\',此專案只在隱藏列表上。';}?>
	</p>
	<p>
	<?php if($_SESSION[tn]==PRC){echo '若选用\'删除\',只删除此专案的数据库数据,令专案不在专案列表上。';}else if($_SESSION[tn]==EN){echo 'If you select the Delete option, only project database data will be deleted in order to let it not showing on project list.';}else{echo '若選用\'刪除\',只刪除此專案的數據庫數據,令專案不在專案列表上。';}?>
	</p>
	</div>
	
	<select name="hidden">
	<option value="1"  <?php if($row[hidden]=='1')echo 'selected="selected"';?>><?php if($_SESSION[tn]==PRC){echo '不用隐藏';}else if($_SESSION[tn]==EN){echo 'Not Hidden';}else{echo '不用隱藏';}?></option>
	<option value="5"  <?php if($row[hidden]=='5')echo 'selected="selected"';?>><?php if($_SESSION[tn]==PRC){echo '隐藏';}else if($_SESSION[tn]==EN){echo 'Hidden ';}else{echo '隱藏';}?></option>
	<option value="d"  <?php if($row[hidden]=='d')echo 'selected="selected"';?>><?php if($_SESSION[tn]==PRC){echo '刪除';}else if($_SESSION[tn]==EN){echo 'Delete';}else{echo '刪除';}?></option>
	</select>
	<?php ;}//if(!$nw){?>

	
	


		
	<?php if($ap and $row[typ]=='popuplink'){?>
	<?php $sqls=$db->query("select * from webmenu where pjnbr='$pj'");
	if($sqls){
	while($rows=$sqls->fetch()){
	if(!$j){echo '<br>';
	if($_SESSION[tn]==PRC){echo '属於Popup菜单';}else if($_SESSION[tn]==EN){echo 'In popup menu';}else{echo '屬於Popup菜單';}
	?>
	<a href="#popupes" data-rel="popup" data-transition="pop" class="ui-btn ui-btn ui-btn-inline ui-corner-all ui-mini" style="color:blue;">?</a>
	<div data-role="popup" id="popupes" style="min-width:300px" data-theme="f">
	<p>
	<?php if($_SESSION[tn]==PRC){echo '若标题是属Popup菜单链结,须选择所属的Popup菜单。';}else if($_SESSION[tn]==EN){echo 'If the title is Popup Menu Link type, you need to select its popup menu.';}else{echo '若標題是屬Popup菜單鏈結,須選擇所屬的Popup菜單。';}?>
	</p>
	</div>
	<?php echo '<select name="subm"><option value=" "></option>';
	;}
	if($rows[typ]=='popup'){
	echo '<option value="'.htmlspecialchars($rows[typ]).'@'.htmlspecialchars($rows[cno]).'.html"';
	if($row[subm]==$rows[subm])echo ' selected="selected"';
	echo '>['.htmlspecialchars($rows[typ]).'] ['.htmlspecialchars($rows[cno]).'.html] '.htmlspecialchars($rows[title]).'</option>';}
	$j=1;
	;};}
	if($j)echo '</select>';
	?>
	
	<?php ;}?>
	
	<?php if(!$nw or ($nw and $pj and !$webmenu)){?>
	<input type="hidden" name="guanyin1" value="<?php if(!$_POST[guanyin1])$_SESSION[guanyin1]=rand();
	echo htmlspecialchars($_SESSION[guanyin1]); ?>">
	
	<div class="ui-grid-d"><div class="ui-block-a">
	<input type="submit" name="submit" Value="<?php if($_SESSION[tn]==PRC){echo '送交';}else if($_SESSION[tn]==EN){echo 'SEND';}else{echo '送交';}?>"></div><div class="ui-block-b"></div><div class="ui-block-c"></div>
	<div class="ui-block-d">
	</div>
	</div>
	<?php ;}?>
	</FORM>

	<hr>
<?php ;}//if($ap){?>
	
	<?php 
	$i='';
	if($ap){$php = 'project.php';$apn ='&ap=1';}else{$php = 'menudesign.php';$apn ='';}
	if($nw){$np ='&nw=1';}else{$np ='';}
	$sql=$db->query("select * from webpj order by nbr desc");
	if($sql){
	while($row=$sql->fetch()){
	if(!$i){if($_SESSION[tn]==PRC){echo '专案列表';}else if($_SESSION[tn]==EN){echo 'Project list';}else{echo '專案列表';};$i=1;echo '<div class="ui-grid-a">';}
	if($row[hidden]!=5){
	
	echo '<div class="ui-block-a"><a href="'.$php.'?pj='.$row[cno].$apn.$np.'" data-ajax="false" class="ui-btn ui-btn ui-corner-all ui-mini ui-btn-icon-left ui-icon-edit">';
	if($pj==$row[cno])echo '<span style="color:pink">';
	echo '['.htmlspecialchars($row[cno]).'] ['.htmlspecialchars($row[date]).'] '.htmlspecialchars($row[title]);
	if($pj==$row[cno])echo '</span>';
	echo '</a></div><div class="ui-block-b"><a href="webpage.php?pj='.$row[cno].'" data-ajax="false" class="ui-btn ui-btn ui-corner-all ui-mini ui-btn-icon-left ui-icon-edit">['.htmlspecialchars($row[cno]).'] '.htmlspecialchars($row[title]);
	if($_SESSION[tn]==PRC){echo ' [编写应用页]';}else if($_SESSION[tn]==EN){echo ' [Edit APP page]';}else{echo ' [編寫應用頁]';}
	echo '</a></div>';
	;}else{
		$hiddenlist .= '<a href="'.$php.'?pj='.$row[cno].$apn.$np.'" data-ajax="false" class="ui-btn ui-btn ui-corner-all ui-mini ui-btn-icon-left ui-icon-edit">['.htmlspecialchars($row[date]).'] '.htmlspecialchars($row[title]).'</a>';
	;}
	;};}
	?>
	</div>
	<?php 
	if($hiddenlist){
	echo '<br><br>';
	if($_SESSION[tn]==PRC){echo '隐藏项目列表';}else if($_SESSION[tn]==EN){echo 'Hidden Title list';}else{echo '隐藏項目列表';}
	echo $hiddenlist;
	
	;} 
	
	?>

	
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


if($_POST['pjtitle'] and $_SESSION[guanyin1] and $_SESSION[guanyin1]==$_POST[guanyin1]){
	
	if($pj and !preg_match('/^[0-9]*$/',$pj))exit;

	if($_POST[hidden]=='d' and $pj){
		$db->exec("delete from webpj where cno='$pj';");}
	else if($_POST[insert] and preg_match('/^[0-9]*$/',$_POST[insert])){
		$insert = $_POST[insert];
		$sql=$db->query("select cno,nbr from webpj order by nbr desc");
		if($sql){
		while($row=$sql->fetch()){
			if($pj==$row[cno]){
			$db->exec("update webpj set nbr='$_POST[insert]' where cno='$pj'");
			;}else if($row[nbr]<=$_POST[insert]){
			$insert = $insert-1;
			$db->exec("update webpj set nbr='$insert' where cno='$pj'");
			;}
	
		;};}
		$db->exec("update webpj set title='$_POST[pjtitle]',des='$_POST[des]',nbr='$_POST[nbr]',hidden='$_POST[hidden]',date='$tdy' where cno='$pj'");}
	else if($pj){
		$db->exec("update webpj set title='$_POST[pjtitle]',des='$_POST[des]',nbr='$_POST[nbr]',hidden='$_POST[hidden]',date='$tdy' where cno='$pj'");}
	
	echo "<meta http-equiv='refresh' content='0;URL=project.php?pj=".htmlspecialchars($pj)."&ap=1'>";
}

if($_POST[datacopy] and $_SESSION[guanyin1] and $_SESSION[guanyin1]==$_POST[guanyin1]){

		if(!preg_match('/^[0-9]*$/',$_POST[datacopy]))exit;
		$datacopy = $_POST[datacopy];
		
		$webdir="../panel/".$pj;
		$srcdir="../panel/".$datacopy;
		
		
		
		//$webdirs="../website/".$pj;
		//$srcdirs="../website/".$datacopy;
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
						;} 			
        			} 
				closedir($dir); 
    			} 
		
		dfcopy("$srcdir","$webdir");
		//dfcopy("$srcdirs","$webdirs");
		 
		
		$sql=$db->query("select * from webhtml where pjnbr='$datacopy'");
		if($sql){
		while($row=$sql->fetch()){	
		$db->exec("insert into webhtml (title,des,typ,hidden,use,date,pjnbr,nbr,theme,bg,style,fllscr,pjn,apn)"."values('$row[title]','$row[des]','$row[typ]','$row[hidden]','$row[use]','$tdy','$pj','$row[nbr]','$row[theme]','$row[bg]','$row[style]','$row[fllscr]','$row[pjnbr]','$row[ap]')"); 
		$sqls=$db->query("select max(cno) as cno from webhtml");
			if($sqls)$rows=$sqls->fetch();
			$db->exec("update webhtml set ap='$rows[cno]' where cno='$rows[cno]'");
			if($row[ap]){$apvlu = $row[ap];}else{$apvlu = $rows[cno];} $ap[$pj][$apvlu] = $rows[cno];
		;};}
		
		$sql=$db->query("select * from webmenu where pjnbr='$datacopy'");
		if($sql){
		while($row=$sql->fetch()){	
		$apvlu = $row[ap]; if($ap[$pj][$apvlu]){$aphtml = $ap[$pj][$apvlu];}else{$aphtml = '';}
		$db->exec("insert into webmenu (typ,title,function,hidden,pjnbr,date,ap,html,subm,nbr,theme,style,bg,aphtml,htmlstyle)"."values('$row[typ]','$row[title]','$row[function]','$row[hidden]','$pj','$tdy','$row[ap]','$row[html]','$row[subm]','$row[nbr]','$row[theme]','$row[style]','$row[bg]','$aphtml','$row[htmlstyle]')"); 
		;};}



		
		echo '<script>alert("';
		if($_SESSION[tn]==PRC){echo '巳复制.';}else if($_SESSION[tn]==EN){echo 'Copied.';}else{echo '巳複製.';}
		echo '")</script>';
	
	
	

echo "<meta http-equiv='refresh' content='0;URL=project.php?pj=".htmlspecialchars($pj)."&ap=1'>";
;}
?>
