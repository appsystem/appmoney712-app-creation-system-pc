<?php session_start();         


if($_GET[pj] and !preg_match('/^[0-9]*$/',$_GET[pj]))exit;
if($_GET[pj])$pj = $_GET[pj];
if($_GET[ap] and !preg_match('/^[0-9]*$/',$_GET[ap]))exit;
if($_GET[ap])$ap = $_GET[ap];

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
	
	<title></title>
	<link rel="stylesheet" href="../css/bootstrap.css">
	<link rel="stylesheet" href="../css/bootstrapifr.css">
	<link rel="stylesheet" href="../css/jquerymobile-1.4.4.min.css">
	<link rel="stylesheet" href="../css/jquery.mobile-1.4.4.min.css">
	<link rel="stylesheet" href="../css/jqmobile.min.css">
	<link rel="stylesheet" href="../css/icon/style.css">	<link rel="stylesheet" href="../css/icons/style.css">
	<link rel="stylesheet" href="../jscss/swiper.min.css">
	<link rel="stylesheet" href="../jscss/ifrpi.css"><link rel="stylesheet" href="../jscss/animate.min.css">
	<link rel="stylesheet" href="../jscss/gridlistview.css">
	<link rel="stylesheet" href="../css/spinners.css">
	
	<link rel="stylesheet" href="../css/appsystem.css">	 
	<link rel="stylesheet" href="../panel/<?php echo $pj?>/vnts<?php echo $ap?>.css">
	<link rel="shortcut icon" href="favicon.ico">
	<!--wettopbr--><style type="text/css">	
	<?php if(!$_GET[ts]){?>
	::-webkit-scrollbar {width: 15px;height: 5px;background-color:#535353;}
	::-webkit-scrollbar-track {background-color: #AAAAAA;-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);}
	::-webkit-scrollbar-thumb {background-color:#535353; } 
	<?php ;}//if(!$ts){?>
	.ui-icon-nbr:after{background-image: url("../css/images/nbr.svg");}
	.ui-icon-pigpaper:after{background-image: url("../css/images/pigpaper.svg");}
	.ui-icon-qr:after{background-image: url("../css/images/qr.svg");}
	.ui-icon-pausesound:after{background-image: url("../css/images/[pause]sound.svg");}
	.ui-icon-sound:after{background-image: url("../css/images/sound.svg");}
	.ui-icon-popup:after{background-image: url("../css/images/popup.svg");}
	.ui-icon-qrslt:after{background-image: url("../css/images/qrslt.svg");}
	.ui-icon-ddpick:after{background-image: url("../css/images/ddpick.svg");}
	</style><!--copyiframes-->
	<script src="../js/jquery.js"></script><script src="../js/mobileinit.js"></script>
	<script src="../js/jquery.mobile-1.4.4.min.js"></script>
	<script src="../js/swiper.jquery.min.js"></script>
	
	<script src="../js/ifrpics.js"></script>
	<script src="../js/fastbtn.js"></script>
	<script src="../js/calendar.js"></script>
	<script src="../js/gt.js"></script>
	<script src="../js/video.js"></script>
	<script src="../js/jquery.qrcode.min.js"></script><script src="../js/qr.js"></script>
	<script src="../js/form.js"></script>
	<script src="../js/playground.js"></script>
	<script src="../js/dw.js"></script><script src="../js/playlist.js"></script>
	<script src="../js/popupics.js"></script><script src="../js/jquery.nicescroll.min.js"></script>
	<script src="../js/gridpic.js"></script>
	<script src="../js/tabs.js"></script>
	<script src="../js/jquery.nest.js"></script>
	<!--copyiframe--><!--copyiframes-->

	</head>
	<?php 
	$sqlns=$db->query("select * from webhtml where pjnbr='$pj' and ap='$ap'");
	if($sqlns)$rowns=$sqlns->fetch();
	
	if($rowns[apn])$ap = htmlspecialchars($rowns[apn]);
	
	//if($rowns[fllscr]){$uicontent='';}else{$uicontent='ui-content';}
	if(file_exists('../panel/'.$pj.'/tabn'.$ap.'.html')){
		$tabnhtml = file_get_contents('../panel/'.$pj.'/tabn'.$ap.'.html');
	if(strpos($tabnhtml,'tablistrights"')!==false)$tabnwdh = ' tabnwdh';
	;}
	
	if(strpos($row[pjbg],'http://')!==false or strpos($row[pjbg],'https://')!==false){$images = '';}else{$images = '../panel/'.$pj.'/images/';}
			
			if(strpos($row[pjbg],'#')!==false or strpos($row[pjbg],'rgba(')!==false  or strpos($row[pjbg],'rgb(')!==false){$bghtml = 'background-color:'.htmlspecialchars($row[pjbg]).';';}
			else if(strpos($row[pjbg],'[xy]')!==false){$bghtml = 'background-image:url('.$images.htmlspecialchars($row[pjbg]).');';}
			else{$bghtml = 'background-image:url('.$images.htmlspecialchars($row[pjbg]).');background-size:100%;background-repeat:repeat-y;';}
	
			if($row[pjbg]){$bgstyle = 'style="'.$bghtml.'"';}else{$bgstyle = '';}

	?>
	<body><div data-role="page" id="appageone" data-theme="<?php echo htmlspecialchars($row[ptheme])?>" class="page indexhtml" <?php echo $bgstyle?>>
	<!-- /header><div  data-role="header" id="hrdiv" data-theme="" style="color:;background-image:url(images/hr.gif);background-size:100% 100%;"><h1 id="hrs"></h1><a href="#navigations" id="menubttns"  data-rel="popup" class="ui-btn-left ui-btn ui-btn-inline  ui-btn-icon-left ui-icon-calendar">&nbsp;&nbsp;&nbsp;</a><a href="#navigation"  id="menubttn"  data-rel="popup" class="ui-btn-right ui-btn ui-btn-inline ui-btn-icon-right ui-icon-bars">&nbsp;&nbsp;&nbsp;</a>
	</div>header -->
	
		<?php 
		if($rowns[bg]){$rowns[bg]=str_replace('/','',$rowns[bg]);$rowns[bg]=str_replace('\\','',$rowns[bg]);$rowns[bg]=str_replace('..','',$rowns[bg]);}
			
			if(strpos($rowns[bg],'http://')!==false or strpos($rowns[bg],'https://')!==false){$images = '';}else{$images = '../panel/'.$pj.'/images/';}
			
			if(strpos($rowns[bg],'#')!==false or strpos($rowns[bg],'rgba(')!==false  or strpos($rowns[bg],'rgb(')!==false){$bghtmls = 'background-color:'.htmlspecialchars($rowns[bg]).';';}
			else if(strpos($rowns[bg],'[xy]')!==false){$bghtmls = 'background-image:url('.$images.htmlspecialchars($rowns[bg]).');';}
			else{$bghtmls = 'background-image:url('.$images.htmlspecialchars($rowns[bg]).');background-size:100%;background-repeat:repeat-y;';}
			
			if($rowns[font]){
				if(strpos($rowns[font],'[b]')!=false){
				$bold = 'font-weight:bold;';
				$rowns[font]=str_replace('[b]','',$rowns[font]);}
				$font = 'color:'.htmlspecialchars($rowns[font]).';'.$bold;
			}else{$font = '';$bold = '';}	
		
		if($rowns[bg]){$bgstyls = 'style="'.$bghtmls.$font.';"';}else if($font){$bgstyls = 'style="'.$font.';"';}
		?>
	
	<div  class="<?php echo $uicontent.$tabnwdh ?> pagebg" <?php echo $bgstyls ?>>
	<?php 
	if($row[menubtns]=='btns' or !$row[menubtns]){$menubtns = '&nbsp;';}else{$menubtns = htmlspecialchars($row[menubtns]);}
	if($_GET[vw]=='s'){ ?>
	<!--<a href="#" data-rel="back" data-corners="false" class="plft ui-btn ui-btn ui-btn-inline ui-mini ui-btn-icon-left ui-icon-carat-l" style="background-image:url(../panel/<?php echo $pj?>/images/<?php echo htmlspecialchars($row[mnbgs])?>);background-size:100% 100%;"><?php echo $menubtns?></a>!-->
	<?php ;}else if($row[menubtn] and $_GET[vw]=='ap' and $rowns[style]!='apps'){ 
	if($row[menubtn]=='btns')$row[menubtn] = '&nbsp;&nbsp;&nbsp;';
	
	?>
	<div data-role="controlgroup" class="plft" data-corners="false" data-type="horizontal"><!--<a href="#" data-rel="back" class="ui-btn ui-btn-y ui-btn-inline ui-mini ui-btn-icon-left ui-icon-carat-l" style="background-image:url(../panel/<?php echo $pj?>/images/<?php echo htmlspecialchars($row[mnbgs])?>);background-size:100% 100%;"><?php echo $menubtns;?></a>!--><a href="#panel" data-rel="panel" class="ui-btn ui-btn-y ui-btn-inline ui-mini ui-btn-icon-left ui-icon-bars" style="background-image:url(../panel/<?php echo $pj?>/images/<?php echo htmlspecialchars($row[mnbg])?>);background-size:100% 100%;"><?php echo $row[menubtn];?></a></div>
	<?php ;} ?>
	
	<?php if($_GET[vw]=='ap'){ 
	if(strlen($row[panelbg])==1){$panelbg = '';$panelbgtheme = 'data-theme="'.htmlspecialchars($row[panelbg]).'"';}
		else{
		$panelbg = ' style="background-image:url(../panel/'.$pj.'/images/'.htmlspecialchars($row[panelbg]).');background-size:100%;"';
		}
	?>
	<div data-role="panel" id="panel" data-display="overlay" <?php echo $panelbgtheme.$panelbg?>>	
	<ul style="min-width:210px;" data-role="listview" data-corners="false" data-inset="true">
	<?php 
	$sql=$db->query("select * from webmenu where pjnbr='$pj' order by nbr");
	if($sql){
	while($row=$sql->fetch()){
	
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
		$menuhtmls[$rowsubm] .= ' ><a href="#" data-to="" data-nbr="'.$row['aphtml'].'" class="appmenu ui-btn ui-btn-icon-right ui-icon-carat-r" '.$style.'>'.htmlspecialchars($row[title]).'</a></li>'; }

	;}else{
	$menuhtml .= '<li '; 	
	if($row[typ]=='divider')$menuhtml .= ' data-role="list-divider" ';
	if($row[typ]=='link' or !$row['html'])$row['html'] = '#';
	
	if($row[typ]=='popup'){$row['html'] = '#menupopup'.htmlspecialchars($row[ap]).'" data-rel="popup';}
	if($row[theme]){$theme = 'color:'.$row[theme].';';}else{$theme = '';}
		if($row[titlebg]){$bg = 'background-image:url(images/'.htmlspecialchars($row[titlebg]).');background-size:100% 100%;background-repeat: no-repeat;border:none;';}
		else{$bg = 'border:none;';}
	$style = 'style="'.$bg.$theme.$wsp.'"';
	if($row[typ]=='divider'){
		$menuhtml .= $style.'>'.htmlspecialchars($row[title]).'</li>'; 
		;}else{
		if($row[typ]=='popup'){$uibtn = 'ui-icon-plus';$appmenu = '';$appto = '';}
		else if($row[typ]=='link'){$uibtn = 'ui-icon-carat-r';$appmenu = 'appmenu ';$appto = 'data-to="" data-nbr="'.$row['aphtml'].'"';}else{$uibtn = '';$appmenu = ''; $appto = '';}
		$menuhtml .= ' ><a href="'.$row['html'].'" '.$appto.' class="'.$appmenu.'ui-btn ui-btn-icon-right '.$uibtn.'" '.$style.'>'.htmlspecialchars($row[title]).'</a></li>';}
	}
	
	;}//if($row[hidden]==1){
	;};}
	
	//if($menuhtml){
	//$menuhtml = '<ul style="min-width:210px;" data-role="listview" data-corners="false" data-inset="true">'.$menuhtml.'</ul>';
	//;}
	
	if($popuplink and $popup){
		$popup = explode(',',$popup);
		for($i=0;$i<sizeof($popup);$i++){
		$popups = $popup[$i];
		$menuhtml .= '
		<div id="menupopup'.htmlspecialchars($popups[$i]).'" data-role="popup" data-transition="pop" data-theme="none">
		<ul style="min-width:210px;" data-role="listview" data-corners="false" data-inset="true">';
		$menuhtml .= $menuhtmls[$popups];
		$menuhtml .= '</ul></div>';
		$menuhtmls[$popups]='';
		;}		
		$popups='';
	;}//if($popuplink and $popup){
	echo $menuhtml ;
	?>
	</ul>
	</div>
	<?php ;}//if($_GET[vw]=='ap'){ ?>
	
	
	
		<div id="imgspop" data-theme="z" style="padding:5px;" data-role="popup" data-corners="false"><a href="#" data-rel="back" class="popn ui-btn ui-btn-z ui-btn-icon-notext ui-icon-delete"></a><div class="ifrspinn" style="position:relative;left:50%;width:100%">Loading...<BR><img src="css/images/ajax-loader.gif"></div><div class="imgspop"><img src=""></div></div>
		<div id="ifrspop" data-theme="z" data-role="popup" data-corners="false" style="overflow-y:auto;height:100%;width:100%;top:0;left:-15px;" class="ifrwidthpn" ><a href="#" data-rel="back" class="popn ui-btn ui-btn-z ui-btn-icon-notext ui-icon-delete"></a><div class="ifrspinn" style="position:relative;left:50%;width:100%">Loading...<BR><img src="css/images/ajax-loader.gif"></div><iframe src="" style="width:100%" seamless frameBorder="0" ></iframe></div>	
		<div class="ui-content" id="pVideo" data-corners="false" data-role="popup" data-theme="x" data-tolerance="2,2"><iframe width="498" height="298" src="" seamless=""></iframe></div><div id="pAudio" data-corners="false"  data-role="popup" data-theme="a"  style="padding:5px;height: 100%;width: 100%;top:0;left:-15px;" class="ifrwidthps"><a href="#" data-rel="back" class="popn ui-btn ui-btn-z ui-btn-icon-notext ui-icon-delete"></a><br><br><i id="audtn" ></i> &nbsp;<i id="audur"></i><br><a href="#"  id="playaudion" data-vlu="" style="border:none;" class="ui-btn ui-btn-w"><img style="width:50px" src="css/images/sound.svg"></a><BR><input id="volmn" type="range" data-role="none" value="0.8"  step="0.1" min="0" max="1"><BR><input id="toposn" type="range" data-role="none" value="0" step="0.01" min="0" max="1"><div id="volmndiv"><input id="volmnapp" type="range"  value="0.8"  step="0.1" min="0" max="1"></div><BR><div id="toposndiv"><input id="toposnapp" type="range"  value="0" step="0.01" min="0" max="1"></div><audio id="audsn"><source src="" type="audio/mpeg"><source src="" type="audio/wav"></audio><div class="ifrspinn" style="position:relative;left:50%;width:100%">Loading...<BR><img src="css/images/ajax-loader.gif"></div></div>
		
		 
		 
	<?php 
	
	if(file_exists('../panel/'.$pj.'/panel'.$ap.'.html')){
		$panelhtml = file_get_contents('../panel/'.$pj.'/panel'.$ap.'.html');		
		$panelhtml = str_replace('(images/','(../panel/'.$pj.'/images/',$panelhtml);
		
		if(file_exists('../panel/'.$pj.'/panel'.$ap.'.js')){
			$panelhtmljs = file_get_contents('../panel/'.$pj.'/panel'.$ap.'.js');	
		;}
		  
		if(strpos($panelhtml,'src="web')!=false){
			$v = explode('?v=',$panelhtml);$vp = explode('.html',$v[1]);$vps = explode('"',$vp[1]);	
			$vn = explode('"',$v[0]);$vnp = str_replace('web','',end($vn));	$vnp = str_replace('.html','',$vnp);	
			//$panelhtml = str_replace('data-src="','data-src="../panel/'.$pj.'/',$panelhtml);
			$panelhtml = str_replace('src="','src="../panel/'.$pj.'/',$panelhtml);
			if($_SERVER["HTTPS"] == "on")$URLs = "s";
			$panelhtml = str_replace('../panel/'.$pj.'/web'.htmlspecialchars($vnp).'.html?v='.htmlspecialchars($vp[0]).'.html'.htmlspecialchars($vps[0]),'http'.$URLs.'://'.$_SERVER[HTTP_HOST].$_SERVER[REQUEST_URI].'view.php?pj='.htmlspecialchars($vps[0]).'&ap='.htmlspecialchars($vnp).'&vw=ap&v='.htmlspecialchars($vp[0]).'.html'.htmlspecialchars($vps[0]),$panelhtml);
		}
		echo str_replace('"images/','"../panel/'.$pj.'/images/',$panelhtml);
	;}
	
	
	if(file_exists('../panel/'.$pj.'/web'.$ap.'.html')){
		$webhtml = file_get_contents('../panel/'.$pj.'/web'.$ap.'.html');
		if(strpos($webhtml,'class="hgtfit"')!==false){		
			$webhtml = explode('<!--part',$webhtml);
			for($i=1;$i<sizeof($webhtml);$i++){
			$html .= '<!--part'.$webhtml[$i];
			;}
			$html = str_replace('</div><!--content!--></div><!--page!-->','',$html);
		
		}else{$html = file_get_contents('../panel/'.$pj.'/'.$ap.'.html');}
	;}else{$html = file_get_contents('../panel/'.$pj.'/'.$ap.'.html');}
	
	
     if(substr_count($html,"<div")!=substr_count($html,"</div>")){ 
	 	if($_SESSION[tn]==PRC){		
		 echo '<script>alert("请检查此段内容的html码.\r\n<div>或<div 的数量是 '.substr_count($html,"<div").'.\r\n但</div> 的数量是 '.substr_count($html,"</div>").'.")</script>';
		}else if($_SESSION[tn]==EN){
		 echo '<script>alert("Please check the html code of this content.\r\nThe number of <div> or <div is '.substr_count($html,"<div").'.\r\nBut the number of </div> is '.substr_count($html,"</div>").'.")</script>';
		}else{
		 echo '<script>alert("請檢查此段內容的html碼.\r\n<div>或<div 的數量是 '.substr_count($html,"<div").'.\r\n但</div> 的數量是 '.substr_count($html,"</div>").'.")</script>';
		}			
	 ;}


	
	$htmljs = file_get_contents('../panel/'.$pj.'/web'.$ap.'.js');
	if(strpos($htmljs,'/*vnts*/')!==false and strpos($htmljs,'tablistright')!==false)$nav=1;//swipe
	
	$html = str_replace('url(images/','url(../panel/'.$pj.'/images/',$html);
	$html = str_replace('src="images/','src=../panel/'.$pj.'/images/',$html);
	$html = str_replace('src="http','src=http',$html);
	$html = str_replace('src="','src="../panel/'.$pj.'/',$html);
	$html = str_replace('src="../panel/'.$pj.'/data:','src="data:',$html);
	$html = str_replace('src=../panel/','src="../panel/',$html);
	$html = str_replace('src=http','src="http',$html);
	$html = str_replace('src="../panel/'.$pj.'/css/images/','src="css/images/',$html);//ifrhtml.php
	if($nav){$htmln = '<!-- Swiper --><div class="swiper-container" id="swiper-container-'.$pj.$ap.'"><div class="swiper-wrapper">';}else{$htmln = '';}//swipe
	$html = $htmln.$html;//swipe
	if(file_exists('../panel/'.$pj.'/tabn'.$ap.'.html')){
	$htmltabn  = file_get_contents('../panel/'.$pj.'/tabn'.$ap.'.html');
	if($htmltabn and strpos($htmltabn,'<!--data-tabnbgd@')==false){
	$html = str_replace('src="images/','src="../panel/'.$pj.'/images/',file_get_contents('../panel/'.$pj.'/tabn'.$ap.'.html')).$html;};}
	echo $html ;
	
	if($nav)echo '</div></div>';//swipe
	?>
	</div><!-- /content -->
	</div><!-- /page -->
	</body></html>	<script src="../js/appsystem.js"></script>	
	<script>	
  $(document).on('pageshow', '#appageone', function(){
	<?php 	
	//if($htmljs)echo 'localStorage.clear();';
	//$htmljs = str_replace('/*ifrhtml*/','window.onload = function(){',$htmljs);
	//$htmljs = str_replace('/*ifrhtmls*/','};',$htmljs);
	if(!$_GET['v'])echo 'localStorage.clear();sessionStorage.clear();';
	echo $htmljs.$panelhtmljs;?>
	});
</script>
