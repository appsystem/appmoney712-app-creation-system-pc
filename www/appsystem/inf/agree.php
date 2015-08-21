<?php session_start();        
error_reporting(0); 

if($_GET[pj] and !preg_match('/^[0-9]*$/',$_GET[pj]))exit;
if($_GET[pj])$pj = $_GET[pj];


define("ROOTPATH", "../");
include_once (ROOTPATH.'administration/db_conn.php');
	if($pj){
	$sqlw=$db->query("select * from webpj where cno='$pj'");
	if($sqlw)$roww=$sqlw->fetch();
	
	$ht = file_get_contents('../panel/'.$pj.'/agree.html');
	$htm = explode('<!--html!-->',$ht);
	$htmn = explode('<!--html',$ht);
	$pagebgvlu = str_replace('html!-->','',$htmn[1]);
	$areabgvlu = str_replace('html!-->','',$htmn[2]);
	$contentbgvlu = str_replace('html!-->','',$htmn[3]);
	$acceptancevlu = str_replace('html!-->','',$htmn[4]);
	$alerthtmlvlu = str_replace('html!-->','',$htmn[5]);
	$btntitlev = explode('html!-->',$htmn[6]);
	$btntitlevlu = $btntitlev[0];
	

	
	
	}
		
?>     
<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php if($_SESSION[tn]==PRC){echo 'AppMoney712 移动应用设计系统';}else if($_SESSION[tn]==EN){echo 'AppMoney712 APP Creation System';}else{echo 'AppMoney712 移動應用設計系統';}?></title>
	<link href="../bootstrap/bootstraps.css" rel="stylesheet">
	<link href="../css/jquery.mobile-1.4.4.min.css" rel="stylesheet">
	<link href="../css/jquerymobile-1.4.4.min.css" rel="stylesheet">
	<link rel="stylesheet" href="../jscss/jquery.cleditor.css" />
	<link rel="stylesheet" href="../css/icons/style.css">
	<link rel="stylesheet" href="../css/appsystem.css">	
	
	<!--wettopbr--><style type="text/css">
	</style><!--copyiframes-->
	<script src="../js/jquery.js"></script>
	<script src="../js/jquery.mobile-1.4.4.min.js"></script>
	<script src="../js/bootstrap.js"></script>
	<script type="text/javascript" charset="utf-8" src="../js/jquery.cleditor.min.js"></script>

</head>
<body>

<div data-role="page" data-theme="b"  id="appageone" style="background-color:white;color:black">
	<div style="overflow: hidden;" data-role="header" data-theme="f">
	<a href="#navigations"  id="menubttn"  data-rel="popup" data-transition="pop" class="ui-btn ui-btn ui-btn-inline ui-corner-all ui-btn-icon-left ui-icon-bars"><?php if($_SESSION[tn]==PRC){echo '目录';}else if($_SESSION[tn]==EN){echo 'Menu';}else{echo '目錄';}?></a>
    <h1><?php if($_SESSION[tn]==PRC){echo '应用用户协议';}else if($_SESSION[tn]==EN){echo 'APP Agreement';}else{echo '應用用戶協議';}?> - <?php if($_SESSION[tn]==PRC){echo 'AppMoney712 移动应用设计系统';}else if($_SESSION[tn]==EN){echo 'AppMoney712 APP Creation System';}else{echo 'AppMoney712 移動應用設計系統';}?></h1>
	<a href="#proj"    data-rel="popup" data-transition="pop" class="ui-btn ui-btn ui-btn-inline ui-corner-all ui-btn-icon-left ui-icon-bars"><?php if($_SESSION[tn]==PRC){echo '专案';}else if($_SESSION[tn]==EN){echo 'Project';}else{echo '專案';}?></a>
	</div><!-- /header -->
	<div data-role="popup" id="proj">
	<ul data-role="listview" data-corners="false" style="max-height:500px; overflow-y:auto;" data-inset="true">
	<?php 
	
	$sql=$db->query("select * from webpj order by nbr desc");
	if($sql){
	while($row=$sql->fetch()){
	if($row[hidden]!=5){
	echo '<li><a href="agree.php?pj='.$row[cno].'" data-ajax="false" class="ui-btn ui-mini ui-btn-icon-left ui-icon-edit">['.htmlspecialchars($row[date]).'] '.htmlspecialchars($row[title]).'</a></li>';
	;};};}
	?>
	</ul>
	</div>
	
	<div data-role="content">
	
	<a href="design.php" data-ajax="false" class="ui-btn ui-btn ui-btn-inline ui-corner-all ui-mini"> < </a>
	
	<a href="viewagr.php?pj=<?php echo htmlspecialchars($pj)?>" target="_blank" class="ui-btn ui-btn-inline ui-corner-all ui-mini ui-btn-icon-left ui-icon-search"><?php if($_SESSION[tn]==PRC){echo '预览';}else if($_SESSION[tn]==EN){echo 'Preview';}else{echo '預覽';}?></a>
		
	
		
	<a href="#pjts" data-rel="popup" data-transition="pop" class="ui-btn ui-btn ui-btn-inline ui-corner-all ui-mini" style="color:blue;">? <?php if($_SESSION[tn]==PRC){echo '解释';}else if($_SESSION[tn]==EN){echo 'Explanation';}else{echo '解釋';}?></a>
	<div data-role="popup" id="pjts" style="min-width:300px;max-width:85%; overflow-y:auto" data-theme="f"><a href="#" class="popn ui-btn ui-btn-z ui-corner-all ui-icon-delete ui-btn-icon-notext" data-rel="back"></a>
	<p><b  style="color:black"><?php if($_SESSION[tn]==PRC){echo '协议';}else if($_SESSION[tn]==EN){echo 'Agreement';}else{echo '協議';}?></b>
	<?php if($_SESSION[tn]==PRC){echo '是您的设计在用户使用前的协议,用户须接受协议才开启应用。';}else if($_SESSION[tn]==EN){echo 'It is the agreement before APP user launching your APP. APP user needs to accept your terms of agreement to start the APP.';}else{echo '是您的設計在用戶使用前的協議,用戶須接受協議才開啟應用。';}?>
	</p>
	<p><?php if($_SESSION[tn]==PRC){echo '若巳填写此页但不想设计用协议,在panel/'.$pj.'内将agree.html及agree.js改名或移除。';}else if($_SESSION[tn]==EN){echo 'If you design the agreement and do not want to use it in the design, you can rename or remove the file agree.html and agree.js in the folder panel/'.$pj.'.';}else{echo '若巳填寫此頁但不想設計用協議,在panel/'.$pj.'內將agree.html及agree.js改名或移除。';}?>
	</p>
	<p><?php if($_SESSION[tn]==PRC){echo '若想用其它专案协议,在panel/档夹的相关专案内将agree.html及agree.js复制。';}else if($_SESSION[tn]==EN){echo 'If you want to use any project agreement, you need to copy the above mentioned two files to this project folder.';}else{echo '若想用其它專案協議,在panel/檔夾的相關專案內將agree.html及agree.js複制。';}?>
	</p>
	<HR>
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '编写步骤';}else if($_SESSION[tn]==EN){echo 'Editing steps';}else{echo '編寫步驟';}?></b>
	
	<?php if($_SESSION[tn]==PRC){echo '点撀右上方的专案,选用专案,再点撀编辑符号的开启编辑器,再作实内容,作点撀送交才作实生成协议。';}else if($_SESSION[tn]==EN){echo 'You need to click the project button on the top right corner and select a project. A form will be showed and you need to start editing by clicking edit icon button to open editor popup. You need to click the confirm button in the popup and send the form to produce agreement files.';}else{echo '點撀右上方的專案,選用專案,再點撀編輯符號的開啟編輯器,再作實內容,作點撀送交才作實生成協議。';}?>
	</p>
	
	<HR>
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '背景';}else if($_SESSION[tn]==EN){echo 'Background';}else{echo '背景';}?></b>
	<?php if($_SESSION[tn]==PRC){echo '此页的相关背景。若设置背景图像上下左右重覆显示,在档案名加[xy]。e.g. picture[xy].png';}else if($_SESSION[tn]==EN){echo 'It is about the background of this agreement page,agreement area and agreement content area. If you add [xy] to the picture file name (e.g. picture[xy].png, the picture will be repeated both vertically and horizontally.';}else{echo '此頁的相關背景。若設置背景圖像上下左右重覆顯示,在檔案名加[xy]。e.g. picture[xy].png';}?>
	</p>
	<p>
	<?php if($_SESSION[tn]==PRC){echo '您亦能在背景图像填上rgb颜色码e.g. rgb(125,125,125), rgba颜色码e.g. rgba(125,125,125,0.5) 或 hex颜色码e.g. #123456代替背景图像。';}else if($_SESSION[tn]==EN){echo 'You can add rgb color code e.g. rgb(125,125,125), rgba color code e.g. rgba(125,125,125,0.5) or hex color code e.g. #123456 instead of background picture.';}else{echo '您亦能在背景圖像填上rgb顏色碼e.g. rgb(125,125,125), rgba顏色碼e.g. rgba(125,125,125,0.5) 或 hex顏色碼e.g. #123456代替背景圖像。';}?>
	</p>
	
	<HR>
	<p><b  style="color:black"><?php if($_SESSION[tn]==PRC){echo '预览';}else if($_SESSION[tn]==EN){echo 'Preview';}else{echo '預覽';}?></b>
	
	<?php if($_SESSION[tn]==PRC){echo '您能点撀上面的预览按钮,预览协议设计。您只能预览,若在此处试用,是不被转到应用首页。';}else if($_SESSION[tn]==EN){echo 'You need to click the above preview button to view your design. You can preview it only. If you test its function, it will not go to index page. You need to test it in APP status.';}else{echo '您能點撀上面的預覽按鈕,預覽協議設計。您只能預覽,若在此處試用,是不被轉到應用首頁。';}?>
	</p>
	
	</div>

	<?php if($pj){?>
	<hr>
	<FORM action="agree.php?pj=<?php echo htmlspecialchars($pj) ?>" id="webxls" method="post" data-ajax="false" >
	
	<?php $images = '../panel/'.$pj.'/images/';
	if(strpos($areabgvlu,'#')!==false or strpos($areabgvlu,'rgba(')!==false  or strpos($areabgvlu,'rgb(')!==false){$bghtml = 'background-color:'.htmlspecialchars($areabgvlu).';';}
	else if(strpos($areabgvlu,'[xy]')!==false){$bghtml = 'background-image:url('.$images.htmlspecialchars($areabgvlu).');';}
	else{$bghtml = 'background-image:url('.$images.htmlspecialchars($areabgvlu).');background-size:100%;background-repeat:repeat-y;';}
	if($areabgvlu){$areabg = 'style="padding:5px;'.$bghtml.'"';}else{$areabg ='style="padding:5px;"';}?>	
	
	<div id="udtr" data-theme="c" data-role="popup" class="ifrwidthps" style="padding:5px" >
	<br><br><a href="#" data-rel="back" class="popn ui-btn ui-btn-z ui-btn-icon-notext ui-icon-delete"></a>
	<textarea  id="ueditor" type="text" style="height:500px;" name="ueditor"></textarea>	
	<a href="#" id="udtrsave" class="ui-btn ui-btn-w ui-btn-inline ui-mini"><?php if($_SESSION[tn]==PRC){echo '作实';}else if($_SESSION[tn]==EN){echo 'confirm';}else{echo '作實';}?></a>
	</div>
	
	<?php if($_SESSION[tn]==PRC){echo '专案';}else if($_SESSION[tn]==EN){echo 'Project';}else{echo '專案';}?>:<?php echo '['.htmlspecialchars($roww[date]).'] '.htmlspecialchars($roww[title])?><BR>
	<?php if($_SESSION[tn]==PRC){echo '描述';}else if($_SESSION[tn]==EN){echo 'Description';}else{echo '描述';}?>:<?php if($roww[des]){echo htmlspecialchars($roww[des]);}else{echo '-';}?>

	<HR>
	<div class="ui-grid-solo" <?php echo $areabg ?>>
	
	<?php if($_SESSION[tn]==PRC){echo '标题区';}else if($_SESSION[tn]==EN){echo 'Title area';}else{echo '標題區';}?>
	<a href="#" data-area="title" class="udtr ui-btn ui-btn-w ui-btn-inline ui-mini"><span class="pigss-pencil"></span></a>

	<textarea id="title" name="title" class="shw"><?php echo $htm[1]?></textarea>
	<div class="ui-grid-solo" id="titlediv"><?php echo $htm[1]?></div><hr>




	
	<?php 	
	if(strpos($contentbgvlu,'#')!==false or strpos($contentbgvlu,'rgba(')!==false  or strpos($contentbgvlu,'rgb(')!==false){$bghtml = 'background-color:'.htmlspecialchars($contentbgvlu).';';}
	else if(strpos($contentbgvlu,'[xy]')!==false){$bghtml = 'background-image:url('.$images.htmlspecialchars($contentbgvlu).');';}
	else{$bghtml = 'background-image:url('.$images.htmlspecialchars($contentbgvlu).');background-size:100%;background-repeat:repeat-y;';}
	if(!$contentbgvlu){$areabg ='';}else{$areabg =$bghtml;}?>	
	
	<?php if($_SESSION[tn]==PRC){echo '协议内容';}else if($_SESSION[tn]==EN){echo 'Agreement content';}else{echo '協議內容';}?>	
	<a href="#" data-area="content" class="udtr ui-btn ui-btn-w ui-btn-inline ui-mini"><span class="pigss-pencil"></span></a>
	<textarea id="content" name="content" class="shw"><?php echo $htm[3]?></textarea>
	<div class="ui-grid-solo" id="contentdiv" style="overflow-y:auto;<?php echo $areabg ?>"><?php echo $htm[3]?></div><hr>
	
	
	<?php if($_SESSION[tn]==PRC){echo '备注';}else if($_SESSION[tn]==EN){echo 'Remark';}else{echo '備註';}?>	
	<a href="#" data-area="remark" class="udtr ui-btn ui-btn-w ui-btn-inline ui-mini"><span class="pigss-pencil"></span></a>
	<textarea id="remark" name="remark" class="shw"><?php echo $htm[5]?></textarea>
	<div class="ui-grid-solo" id="remarkdiv"><?php echo $htm[5]?></div><hr>
	
	
	<?php if($_SESSION[tn]==PRC){echo '同意标题';}else if($_SESSION[tn]==EN){echo 'Acceptance title';}else{echo '同意標題';}?>	
	<a href="#" data-area="acceptance" class="udtr ui-btn ui-btn-w ui-btn-inline ui-mini"><span class="pigss-pencil"></span></a>
	<textarea id="acceptance" name="acceptance" class="shw"><?php echo $acceptancevlu?></textarea>
	<div class="ui-grid-solo" id="acceptancediv"><?php echo $acceptancevlu?></div><hr>
	
	<?php if($_SESSION[tn]==PRC){echo '作实按钮标题';}else if($_SESSION[tn]==EN){echo 'Confirmation button title';}else{echo '作實按鈕標題';}?>		
	<input type="text" name="btntitle" value="<?php echo htmlspecialchars($btntitlevlu) ?>"><hr>
	<?php if($_SESSION[tn]==PRC){echo '备注';}else if($_SESSION[tn]==EN){echo 'Remark';}else{echo '備註';}?>	
	<a href="#" data-area="remark1" class="udtr ui-btn ui-btn-w ui-btn-inline ui-mini"><span class="pigss-pencil"></span></a>
	<textarea id="remark1" name="remark1" class="shw"><?php echo $htm[7]?></textarea>
	<div class="ui-grid-solo" id="remark1div"><?php echo $htm[7]?></div>
	
	</div>
	<hr>
	<?php if($_SESSION[tn]==PRC){echo '用戶未同意顯示句';}else if($_SESSION[tn]==EN){echo 'Message for not ticking acceptance box';}else{echo '用戶未同意顯示句';}?>		
	<input type="text" name="alert" value="<?php echo htmlspecialchars($alerthtmlvlu) ?>">
	<hr>
	<div class="ui-grid-b">
	<div class="ui-block-a"><?php if($_SESSION[tn]==PRC){echo '页背景';}else if($_SESSION[tn]==EN){echo 'Page background';}else{echo '頁背景';}?>
	<input type="text" name="pagebg" value="<?php echo htmlspecialchars($pagebgvlu) ?>"></div>
	<div class="ui-block-b"><?php if($_SESSION[tn]==PRC){echo '协议內容背景';}else if($_SESSION[tn]==EN){echo 'Agreement content background';}else{echo '協議內容背景';}?>
	<input type="text" name="areabg" value="<?php echo htmlspecialchars($areabgvlu) ?>"></div>
	<div class="ui-block-c"><?php if($_SESSION[tn]==PRC){echo '內容背景';}else if($_SESSION[tn]==EN){echo 'Agreement area background';}else{echo '內容背景';}?>
	<input type="text" name="contentbg" value="<?php echo htmlspecialchars($contentbgvlu) ?>"></div>
	</div>
	<hr>
	
	<br>

	<input type="hidden" name="guanyin1" value="<?php if(!$_POST[guanyin1])$_SESSION[guanyin1]=rand();
	echo htmlspecialchars($_SESSION[guanyin1]); ?>">
	
	<div class="ui-grid-d"><div class="ui-block-a">
	<input type="submit" name="submit" id="webxlsbtn" Value="<?php if($_SESSION[tn]==PRC){echo '送交';}else if($_SESSION[tn]==EN){echo 'SEND';}else{echo '送交';}?>"></div><div class="ui-block-b">

	</div><div class="ui-block-c">
	
	

	</div><div class="ui-block-c"></div>
	<div class="ui-block-d">
	</div>
	</div>
	</FORM>
	
		<?php ;}//if($pj){?>


<hr>
	
	


	
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
</body></html>

	<script src="../js/appsystem.js"></script>	
<script type="text/javascript">
$(document).ready(function(){
    $('#ueditor').cleditor({height: 550,controls: // controls to add to the toolbar
                    "bold italic underline strikethrough subscript superscript | font size " +
                    "style | color highlight removeformat | bullets numbering | outdent " +
                    "indent | alignleft center alignright justify | undo redo | " });
    $( "#ueditor" ).height(500);
});

   if($( "#contentdiv" ).html())$( "#contentdiv" ).css('max-height',$(window).height()*0.5);

		$(document).on('click', '.udtr',function (event) {		event.preventDefault();		
			$("#udtr").popup('open');	var area=$(this).attr('data-area');	$("#udtr").data('area',area);	$("#ueditor").code($("#"+area).val());	
		});		
		$( "#udtr" ).popup({afterclose: function( event, ui ) {$('#ueditor').code('');} });

		$(document).on('click', '#udtrsave',function (event) {		event.preventDefault();		
			var area=$("#udtr").data('area'); var html =  $('#ueditor').code(); $("#"+area+"div").html(html);$("#"+area).val(html);$("#udtr").popup('close');
		});	

		$('.shw').hide();

</script>
<?php 
   //file_get_contents('../panel/'.$pj.'/web'.$apvlu.'.js')


$tdy=0;
$tdy=date('Y-m-d');
if($_POST[title] and $pj and $_SESSION[guanyin1] and $_SESSION[guanyin1]==$_POST[guanyin1]){

	if($pj and !preg_match('/^[0-9]*$/', $pj))exit;

	if(strpos($_POST[pagebg],'#')!==false or strpos($_POST[pagebg],'rgba(')!==false  or strpos($_POST[pagebg],'rgb(')!==false){$bghtml = 'background-color:'.htmlspecialchars($_POST[pagebg]).';';}
	else if(strpos($_POST[pagebg],'[xy]')!==false){$bghtml = 'background-image:url(images/'.htmlspecialchars($_POST[pagebg]).');';}
	else{$bghtml = 'background-image:url(images/'.htmlspecialchars($_POST[pagebg]).');background-size:100%;background-repeat:repeat-y;';}
	if($_POST[pagebg]){$pagebg = 'style="'.$bghtml.'font-weight:bold"';}else{$pagebg ='style="font-weight:bold"';}
	
	$webpopup = '<!DOCTYPE html><html><head><meta charset="utf-8"><meta http-equiv="X-UA-Compatible" content="IE=edge"><meta name="viewport" content="width=device-width, initial-scale=1"><link href="css/bootstrap.css" rel="stylesheet"><style type="text/css">.webkitm::-webkit-scrollbar {width: 5px;height: 5px;background-color: #386292;}.webkitm::-webkit-scrollbar-track {background-color: #AAAAAA;-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);}.webkitm::-webkit-scrollbar-thumb {background-color:  #386292; } #agree{transform: scale(1.5); -webkit-transform: scale(1.5);} </style>';
	$webpopup .= '</head><div id="ifrspinnn" style="position:relative;left:50%;width:100%">Loading...<BR><img src="css/images/ajax-loader.gif"></div><body '.$pagebg.'>';
		
	if(strpos($_POST[areabg],'#')!==false or strpos($_POST[areabg],'rgba(')!==false  or strpos($_POST[areabg],'rgb(')!==false){$bghtml = 'background-color:'.htmlspecialchars($_POST[areabg]).';';}
	else if(strpos($_POST[areabg],'[xy]')!==false){$bghtml = 'background-image:url(images/'.htmlspecialchars($_POST[areabg]).');';}
	else{$bghtml = 'background-image:url(images/'.htmlspecialchars($_POST[areabg]).');background-size:100%;background-repeat:repeat-y;';}
	if($_POST[areabg]){$areabg = 'style="padding:5px;width:100%;'.$bghtml.'"';}else{$areabg ='style="padding:5px;width:100%;"';}
	
	if(strpos($_POST[contentbg],'#')!==false or strpos($_POST[contentbg],'rgba(')!==false  or strpos($_POST[contentbg],'rgb(')!==false){$bghtml = 'background-color:'.htmlspecialchars($_POST[contentbg]).';';}
	else if(strpos($_POST[contentbg],'[xy]')!==false){$bghtml = 'background-image:url(images/'.htmlspecialchars($_POST[contentbg]).');';}
	else{$bghtml = 'background-image:url(images/'.htmlspecialchars($_POST[contentbg]).');background-size:100%;background-repeat:repeat-y;';}
	if($_POST[contentbg]){$contentbg = 'style="overflow-y:auto;width:100%;'.$bghtml.'"';}else{$contentbg ='style="overflow-y:auto;width:100%;"';}
	
	if(!$_POST[contentbg])$hr = '<HR>';
	$webpopup .= '<!--html'.htmlspecialchars($_POST[pagebg]).'html!--><!--html'.htmlspecialchars($_POST[areabg]).'html!--><!--html'.htmlspecialchars($_POST[contentbg]).'html!--><!--html'.htmlspecialchars($_POST[acceptance]).'html!--><!--html'.htmlspecialchars($_POST[alert]).'html!--><!--html'.htmlspecialchars($_POST[btntitle]).'html!--><div '.$areabg.'><!--html!-->'.$_POST[title].'<!--html!-->';
	$webpopup .= '<div id="contenthtml" '.$contentbg.'>'.$hr.'<!--html!-->'.$_POST[content].'<!--html!--></div><HR>';
	$webpopup .= '<!--html!-->'.$_POST[remark].'<!--html!-->'.'<br><br>';
	$webpopup .= ''.$_POST[acceptance].'&nbsp;&nbsp;&nbsp;<input type="checkbox" id="agree"><br><input type="button" id="send" style="width:100%;font-weight:bold;" class="btn btn-primary" value="'.htmlspecialchars($_POST[btntitle]).'">';
	$webpopup .= '<!--html!-->'.$_POST[remark1].'<!--html!-->';
	$webpopup .= '</div><div id="alerthtml" class="shw">'.htmlspecialchars($_POST[alert]).'</div>';
	

			if($webpopup){
				$webpopup = str_replace('     ',' ',$webpopup);
				$webpopup = str_replace('../panel/'.$pj.'/images/','images/',$webpopup);
				
				$js = 'window.onload = function(){document.getElementById("ifrspinnn").style.display = "none";};document.getElementById("alerthtml").style.display = "none";document.getElementById("contenthtml").style.maxHeight = window.innerHeight*0.5+"px"; document.getElementById("send").addEventListener("click",function(){if(document.getElementById("agree").checked){localStorage["agree"]=1;window.location.href = "index.html";}else{alert(document.getElementById("alerthtml").innerHTML);};},false);';
			
			}			
	
	$webpopup = $webpopup.'</body><script src="js/agree.js"></script>';
	
	if($webpopup){
	$fpagtrns='../panel/'.$pj.'/agree.html';
	file_put_contents($fpagtrns,$webpopup);
	$fpagtrns='../panel/'.$pj.'/agree.js';
	file_put_contents($fpagtrns,$js);
	}	

	echo "<meta http-equiv='refresh' content='0;URL=agree.php?pj=".htmlspecialchars($pj)."'>";


;}

?>
 