<?php session_start(); 

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
	<!--wettopbr--><style type="text/css"> #picker { width: 200px; height: 200px }
      #slider { width: 30px; height: 200px }
	</style><!--copyiframes-->
	<script src="../js/jquery.js"></script>
	<script src="../js/jquery.mobile-1.4.4.min.js"></script>
	<script src="../js/colorpicker.js"></script>
	<!--copyiframe--><!--copyiframes-->
	
	</head>
	<body><div data-role="page" data-theme="f" class="page indexhtml">
	<div  data-role="header" id="hrdiv" data-theme="f"><h1 id="hrs"><?php if($_SESSION[tn]==PRC){echo '应用设计 - AppMoney712 移动应用设计系统';}else if($_SESSION[tn]==EN){echo 'APP design - AppMoney712 APP Creation System';}else{echo '應用設計 - AppMoney712 移動應用設計系統';}?></h1><a href="#navigations" id="menubttns"  data-rel="popup" data-transition="pop" class="ui-btn-left ui-btn ui-btn-inline ui-corner-all ui-btn-icon-left ui-icon-bars">&nbsp;&nbsp;&nbsp;</a>
	</div><!-- /header --><div  class="ui-content pagebg"><!--copyiframe--><!-- /content!-->
	
	<?php if($_SESSION[tn]==PRC){echo '工具';}else if($_SESSION[tn]==EN){echo 'Tools';}else{echo '工具';}?> - <?php if($_SESSION[tn]==PRC){echo '颜色码';}else if($_SESSION[tn]==EN){echo 'Color code';}else{echo '顏色碼';}?>
	<hr>
	<div id="slider"></div>
	<?php if($_SESSION[tn]==PRC){echo '先选颜色';}else if($_SESSION[tn]==EN){echo 'Select color';}else{echo '先選顏色';}?>
	<hr>
	<div id="picker"></div>
	<?php if($_SESSION[tn]==PRC){echo '再选深浅色';}else if($_SESSION[tn]==EN){echo 'Select light to dark';}else{echo '再選深淺色';}?>
    <hr>
	<div id="hexhtml" style="width:35px;height:35px;"></div>
	<hr>
	<div id="rgb"></div>
	<hr>
	<div id="rgba"></div>
	<?php if($_SESSION[tn]==PRC){echo '透明调整 0.1 至 1 e.g. 显示值是rgba(125,125,125,1),1值是实色,改为透明色为rgba(125,125,125,0.6)。';}else if($_SESSION[tn]==EN){echo 'opacity value 0.1 - 1 e.g. The selected value is rgba(125,125,125,1). You can use 0.6 instead of 1 (opacity). rgba(125,125,125,0.6).';}else{echo '透明調整 0.1 至 1 e.g. 顯示值是rgba(125,125,125,1),1值是實色,改為透明色為rgba(125,125,125,0.6)。';}?> 
	<hr>
	html <?php if($_SESSION[tn]==PRC){echo '颜色码';}else if($_SESSION[tn]==EN){echo 'color code';}else{echo '顏色碼';}?>
	<div id="hex"></div>
	
	
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
	<script type="text/javascript">

      ColorPicker(

        document.getElementById('slider'),
        document.getElementById('picker'),

        function(hex, hsv, rgb) {
           $('#rgb').html('rgb('+rgb.r+','+rgb.g+','+rgb.b+')');  
		   $('#rgba').html('rgba('+rgb.r+','+rgb.g+','+rgb.b+',1)');   
           $('#hex').html(hex);
		   $('#hexhtml').css('background-color',hex);
        });

    </script>