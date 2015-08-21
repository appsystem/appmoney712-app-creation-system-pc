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
	<link rel="stylesheet" href="../css/appsystem.css">		
	<link rel="shortcut icon" href="favicon.ico">
	<!--wettopbr--><style type="text/css">
	</style><!--copyiframes-->
	<script src="../js/jquery.js"></script>
	<script src="../js/jquery.mobile-1.4.4.min.js"></script>
	<!--copyiframe--><!--copyiframes-->
	</head>
	<body><div data-role="page" data-theme="f" class="page indexhtml" style="color:black;">
	<div  data-role="header" id="hrdiv" data-theme="f"><h1 id="hrs"><?php if($_SESSION[tn]==PRC){echo '许可证 - AppMoney712 移动应用设计系统';}else if($_SESSION[tn]==EN){echo 'License - AppMoney712 APP Creation System';}else{echo '許可証 - AppMoney712 移動應用設計系統';}?></h1><a href="#navigations" id="menubttns"  data-rel="popup" data-transition="pop" class="ui-btn-left ui-btn ui-btn-inline ui-corner-all ui-btn-icon-left ui-icon-bars">&nbsp;&nbsp;&nbsp;</a>
	</div><!-- /header --><div  class="ui-content pagebg"><!--copyiframe--><!-- /content!-->
	
	<h2 style="color:#000000"><?php if($_SESSION[tn]==PRC){echo '聯絡';}else if($_SESSION[tn]==EN){echo 'Contact';}else{echo '聯絡';}?></h2>
	<a href="mailto:contact@appmoney712.net;appmoney712@gmail.com;" class="ui-btn ui-btn-w ui-btn-inline">contact@appmoney712.net</a><hr>
	
	01 - AUG -2015<BR><BR> 
	
	<h2 style="color:#000000"><?php if($_SESSION[tn]==PRC){echo 'AppMoney712 移动应用设计系统 - 使用条款';}else if($_SESSION[tn]==EN){echo 'AppMoney712 APP Creation System - conditions';}else{echo 'AppMoney712 移動應用設計系統 - 使用條款';}?></h2>
	
	<h2 style="color:#000000"><?php if($_SESSION[tn]==PRC){echo '软件许可证';}else if($_SESSION[tn]==EN){echo 'Software License';}else{echo '軟件許可証';}?></h2>
	<?php if($_SESSION[tn]==PRC){echo '软件许可证';}
	else if($_SESSION[tn]==EN){echo 'Only donator is allowed by us to use this software for commerical use under MIT license and without distribution and/or sell privileges. Please refer to our website www.appmoney712.net.';}
	else{echo '只有費用損贈者才能使用MIT許可証並用作商業用途,但沒有分發及售賣此軟件的權利。請參考本司網站www.appmoney712.net指引。';}?>
	<br>
	<h2 style="color:#000000"><?php if($_SESSION[tn]==PRC){echo '程式码许可证 - 解释';}else if($_SESSION[tn]==EN){echo 'Source code license - Explanation';}else{echo '程式碼許可証 - 解釋';}?></h2>
	<?php if($_SESSION[tn]==PRC){echo '此软件是用作产生APP档案。您是拥有您创建的APP档案的内容及程式码的版权，例,数据或应用页,您能对您的APP档案进行销售及分发。<BR>
	您是没有拥有在该APP档案中引用的程式码的版权,例,JQuery或PhoneGap等。<BR>
	您须保存任何我们接受的损赠费用收据,例,paypal或alipay的损赠费用的收据。<br>
	您只需此系统产生APP档案,您是不需分发此系统给与您的用户,所以,MIT许可证中提及的锁售及/或分发此软件是巳被剔除。相关我们及收款机构的捐赠收费成本费用是不能退款。当您进行退款时,您巳不是损赠者。超过收款机构容许退款的限期,退款不被接受。<BR>
	您能在任何时间在任何互联丶内联或PHP环境产生APP档案,只要您损赠费用。';}
	else if($_SESSION[tn]==EN){echo 'The purpose of the software is to create APP files. 
	 You own the copyright of content and source code you developed in this software output e.g. data or APP page. You can sell or distribute your APP file as you want.<br>
	 You do not own the copyright of program code you used in this software output. e.g. JQuery or PhoneGap.<br>
	 You shall keep donation fee receipt of any payment method we accepted, e.g. your paypal or alipay payment receipt(s) of donation fee.<br>
	 Free of charge mentioned in MIT license is waived due to donation. The payment cost of donation fee charged by the fee receiving agency and our party is not refundable. When you take the refund process allowed by related payment receiving agency, you are not a donator for this software. No refund process is allowed for exceeding the refund period specified by the related payment receiving agency.<br>
	 Distribute and/or sell condition mentioned in MIT license are waived. Because you need this system to create your APPs but you do not need to distribute this APP creation software to your APP users.<br>
	 You can use it in any Internet environment/Intranet environment/PHP environment to create APP pages at any time only for the donation giving.<br>';}
	else{echo '此軟件是用作產生APP檔案。您是擁有您創建的APP檔案的內容及程式碼的版權，例,數據或應用頁,您能對您的APP檔案進行銷售及分發。<BR>
	您是沒有擁有在該APP檔案中引用的程式碼的版權,例,JQuery或PhoneGap等。<BR>
	您須保存任何我們接受的損贈費用收據,例,paypal或alipay的損贈費用的收據。<br>
	您只需此系統產生APP檔案,您是不需分發此系統給與您的用戶,所以,MIT許可証中提及的鎖售及/或分發此軟件是巳被剔除。<BR>
	MIT許可証中提及此軟件是免費是巳被剔除。相關我們及收款機構的捐贈收費成本費用是不能退款。當您進行被相關收款機構容許的退款時,您巳不是損贈者。超過收款機構容許退款的限期,退款不被接受。<BR>
	您能在任何時間在任何互聯、內聯或PHP環境產生APP檔案,只要您損贈費用。';}?>
	 
	 
	 <hr>
	 <h2 style="color:#000000"><?php if($_SESSION[tn]==PRC){echo '开发者 - 解释';}else if($_SESSION[tn]==EN){echo 'Developer - Explanation';}else{echo '開發者 - 解釋';}?></h2>
	 <?php if($_SESSION[tn]==PRC){echo '您是开发者,是提供使用此软件产生APP档案的服务,您的客户须自行捐赠费用。您及您的客户们亦须捐赠费用一次,并能在您的或您的客户的APP产品发行时才进行此捐赠,若不用发行,使用前进行此捐赠。';}
	 else if($_SESSION[tn]==EN){echo 'You are developer and use this software to provide service of APP file creation. Your clients shall pay the donation fee by themselves. You and your clients also need to pay the fee once and can pay the fee when your or your client\'s APP product publishing. If no need of APP publishing, You and your clients pay the fee before APP product using.';}
	 else{echo '您是開發者,是提供使用此軟件產生APP檔案的服務,您的客戶須自行捐贈費用。您及您的客戶們亦須捐贈費用一次,並能在您的或您的客戶的APP產品發行時才進行此捐贈,若不用發行,使用前進行此捐贈。';}?>
	
	<hr>
	The original version of MIT License (MIT) <?php if($_SESSION[tn]==PRC){echo 'MIT许可证的原版本';}else if($_SESSION[tn]==EN){echo '';}else{echo 'MIT許可証的原版本';}?><br>
	Copyright (c) 2015 Lee Wai Kwok<br>

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:<br>

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.<br>

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
<hr>
http://opensource.org/licenses/MIT
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
	
   


