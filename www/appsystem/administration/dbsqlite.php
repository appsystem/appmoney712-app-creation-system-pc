<html>  
<head> 
<title><?php if($_SESSION[tn]==PRC){echo 'AppMoney712 移动应用设计系统';}else if($_SESSION[tn]==EN){echo 'AppMoney712 APP Creation System';}else{echo 'AppMoney712 移動應用設計系統';}?></title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
</head>
<?php
 
//$db = new PDO("sqlite:../administration/app.sqlite");

$db->query("CREATE TABLE staff (srlnbr INTEGER PRIMARY KEY  NOT NULL  UNIQUE , staffname VARCHAR, addr VARCHAR, td DATETIME)");
$db->query("CREATE TABLE webhtml (cno INTEGER PRIMARY KEY  NOT NULL ,title VARCHAR,des VARCHAR,typ VARCHAR,hidden VARCHAR,use VARCHAR,date DATETIME,pjnbr INTEGER,ap INTEGER,nbr VARCHAR,theme VARCHAR,bg VARCHAR,style VARCHAR,fllscr VARCHAR,pjn INTEGER DEFAULT (null) ,apn INTEGER DEFAULT (null) , font VARCHAR, formhtml VARCHAR)");
$db->query("CREATE TABLE webmenu (cno INTEGER PRIMARY KEY  NOT NULL ,typ VARCHAR,title VARCHAR DEFAULT (null) ,function VARCHAR DEFAULT (null) ,hidden VARCHAR DEFAULT (null) ,pjnbr integer DEFAULT (null) ,date DATETIME,ap INTEGER,html VARCHAR,subm INTEGER,nbr INTEGER,theme VARCHAR DEFAULT (null) ,style VARCHAR,bg VARCHAR,titlebg VARCHAR,aphtml INTEGER,htmlstyle VARCHAR, wsp VARCHAR)");
$db->query("CREATE TABLE webpj (cno INTEGER PRIMARY KEY  NOT NULL ,title VARCHAR,des VARCHAR,menubtn VARCHAR,ptheme VARCHAR DEFAULT (null) ,themehr VARCHAR,date DATETIME,appname VARCHAR,nbr INTEGER,hidden VARCHAR,menunbr INTEGER,mnbg VARCHAR DEFAULT (null) ,panelbg VARCHAR,appnm VARCHAR,appdes VARCHAR,infweb VARCHAR,html VARCHAR,versioncode INTEGER,version VARCHAR,author VARCHAR,email VARCHAR,website VARCHAR,menubtns VARCHAR DEFAULT (null) ,mnbgs VARCHAR,prestyle VARCHAR,pjbg VARCHAR, openapp INTEGER, whatsapp INTEGER, openbrowser INTEGER, plugcache INTEGER, appicon VARCHAR, splash VARCHAR, gcm VARCHAR, pushURL VARCHAR)");



?>

</html>