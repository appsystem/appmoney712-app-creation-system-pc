<?php session_start(); 

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
	<link rel="stylesheet" href="../css/appsystem.css">		
	<link rel="shortcut icon" href="favicon.ico">
	<!--wettopbr--><style type="text/css">
	</style><!--copyiframes-->
	<script src="../js/jquery.js"></script>
	<script src="../js/jquery.mobile-1.4.4.min.js"></script>
	<!--copyiframe--><!--copyiframes-->
	
	</head>
	<body><div data-role="page" data-theme="f" class="page indexhtml">
	<div  data-role="header" id="hrdiv" data-theme="f"><h1 id="hrs"><?php if($_SESSION[tn]==PRC){echo '工具 - AppMoney712 移动应用设计系统';}else if($_SESSION[tn]==EN){echo 'Tools - AppMoney712 APP Creation System';}else{echo '工具 - AppMoney712 移動應用設計系統';}?></h1><a href="#navigations" id="menubttns"  data-rel="popup" data-transition="pop" class="ui-btn-left ui-btn ui-btn-inline ui-corner-all ui-btn-icon-left ui-icon-bars">&nbsp;&nbsp;&nbsp;</a>
	</div><!-- /header --><div  class="ui-content pagebg"><!--copyiframe--><!-- /content!-->

	<?php if($_SESSION[tn]==PRC){echo '工具';}else if($_SESSION[tn]==EN){echo 'Tools';}else{echo '工具';}?>
	<div data-role="listview" data-inset="true">
	<li data-icon="edit"><a href="ajax.php"  data-ajax="false"><?php if($_SESSION[tn]==PRC){echo 'Ajax数据';}else if($_SESSION[tn]==EN){echo 'Ajax data';}else{echo 'Ajax數據';}?></a></li>
    <li data-icon="edit"><a href="colorpicker.php" target="_blank"><?php if($_SESSION[tn]==PRC){echo '颜色码';}else if($_SESSION[tn]==EN){echo 'Color code';}else{echo '顏色碼';}?></a></li>
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
	<script src="../js/appsystem.js"></script>	
