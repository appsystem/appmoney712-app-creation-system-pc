<?php session_start();   


if($_GET[pj] and !preg_match('/^[0-9]*$/',$_GET[pj]))exit;
if($_GET[pj])$pj = $_GET[pj];
if($_GET[ap] and !preg_match('/^[0-9]*$/',$_GET[ap]))exit;
if($_GET[ap])$ap = $_GET[ap];

?>
<!DOCTYPE html> 
	<html> 
	<head>  
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">
	<title></title>
	<link rel="stylesheet" href="../css/jquerymobile-1.4.4.min.css">
	<link rel="stylesheet" href="../css/jquery.mobile-1.4.4.min.css">
	<link rel="stylesheet" href="../css/jqmobile.min.css">
	<link rel="shortcut icon" href="favicon.ico">
	<link rel="stylesheet" href="../css/appsystem.css">	
	<script src="../js/jquery.js"></script><script src="../js/mobileinit.js"></script>
	<script src="../js/jquery.mobile-1.4.4.min.js"></script>
	</head>
	<body><div data-role="page" id="appageone" data-theme="f" class="page indexhtml">
	<!-- /header><div  data-role="header" id="hrdiv" data-theme="" style="color:;background-image:url(images/hr.gif);background-size:100% 100%;"><h1 id="hrs"></h1><a href="#navigations" id="menubttns"  data-rel="popup" class="ui-btn-left ui-btn ui-btn-inline  ui-btn-icon-left ui-icon-calendar">&nbsp;&nbsp;&nbsp;</a><a href="#navigation"  id="menubttn"  data-rel="popup" class="ui-btn-right ui-btn ui-btn-inline ui-btn-icon-right ui-icon-bars">&nbsp;&nbsp;&nbsp;</a>
	</div>header --><div data-role="content" class="pagebg" style="background-image:url(images/background.gif);background-size:100%;background-repeat:repeat-y;">
	<a href="#popup" data-rel="popup" class="ui-btn ui-btn ui-btn-inline ui-mini ui-btn-icon-left ui-icon-bars"><?php if($_SESSION[tn]==PRC){echo 'Popup显示按钮';}else if($_SESSION[tn]==EN){echo 'Popup showing button';}else{echo 'Popup顯示按鈕';}?></a>
	
	<div id="popup" data-role="popup" data-corners="false" class="ifrwidthpn"><a href="#" data-rel="back" class="popn ui-btn ui-btn-z ui-btn-icon-notext ui-icon-delete"></a><iframe src="view.php?pj=<?php echo $pj?>&ap=<?php echo $ap?>&ts=<?php if($_GET[ts])echo 1;?>" style="width:100%" seamless="" frameborder="0"></iframe></div>

	</div><!-- /content -->
	</div><!-- /page -->
	</body></html>
	<script src="../js/appsystem.js"></script>