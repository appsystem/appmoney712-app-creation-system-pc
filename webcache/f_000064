/*AppMoney712 APP Creation System || 01 - AUG -2015 || Copyright LEE WAI KWOK(JSTRUST CONSULTANCY) || license - Revised MIT.*/
function owlReady(pgn,pn){      
if(document.URL.indexOf('http://') === -1 && document.URL.indexOf('https://') === -1 && (localStorage.getItem(pgn+"calendarjs"+pn) || localStorage.getItem(pgn+"gclnjs"+pn))){
document.addEventListener('deviceready', function () { 
window.deviceReady = true;
cordova.plugins.email.isAvailable(
    function (isAvailable) { if(!isAvailable)alert('The sending function is not available in your device.您的设备未有合用的电邮应用!');}
);
}, false); 
;}
;}

function owln(d,mnh,day,yr,pgn,pj,pn,wdayn,sat,sun,btnimg,bgarea,btnimgs){			$.mobile.loading( "show", { text: "loading...", textVisible: true,theme: "a",html: ""});	
	//windowheight = $(window).height();
	if(!sun)sun = 'rgba(227,  57,  39,  0.5)';
	if(!bgarea)bgarea = 'rgba(255, 255, 255, 0.5)';
	$('#'+pgn+'owlmns'+pn).data("jsnyr",yr).data("jsmnh",mnh);



	var gclnjs =localStorage.getItem(pgn+"gclnjs"+pn);dyjsclv = '';var rmd = '';var iPad = '';
	var dyjsclv = JSON.parse(localStorage.getItem(pgn+'dyjsclv'+pn));
	if(dyjsclv){ if(!gclnjs && dyjsclv[0]=='1')gclnjs = 'gclnjs';rmd = dyjsclv[3]; if(navigator.userAgent.match(/(iPod|iPhone|iPad)/))iPad = 'iPad'; }

if(btnimgs || btnimg){
	var path = '';var paths = '';
	if(btnimgs.indexOf('pj=') !== -1){
		var btnimgsvlu = btnimgs.split('[');
		paths = btnimgsvlu[1].replace(']');
		var btnimgs = btnimgsvlu[0];
		if(/^[0-9]*$/.test(btnimgsvlu[0])){btnimgs = btnimgsvlu[0];}else{btnimgs = '';}
	}
	if(btnimg.indexOf('pj=') !== -1){
		var btnimgvlu = btnimg.split('[');
		path = btnimgvlu[1].replace(']');
		var btnimg = btnimgvlu[0];
		if(/^[0-9]*$/.test(btnimgvlu[0])){btnimg = btnimgvlu[0];}else{btnimg = '';}
	}
	if(document.URL.indexOf('pj=') !== -1){
		if(!path)path = '../panel/'+pj+'/';
		if(!paths)paths = '../panel/'+pj+'/';
	}

	var btnimghtml='';
	if(btnimg){		
	for(var i =1;i<= btnimg; i++){
	btnimghtml += '<a href="#" style="padding:1px;border:none;" class="ui-btn ui-btn-z ui-btn-inline '+pgn+'btnimg'+pn+'" ids="'+path+'images/'+pgn+'btnimg'+pn+i+'.gif"><img style="display:none;width:48px" src=""/></a>';};}
	if(btnimgs){
	for(var i =1;i<= btnimgs; i++){
	btnimghtml += '<a href="#" style="padding:1px;border:none;" class="ui-btn ui-btn-z ui-btn-inline '+pgn+'btnimg'+pn+'" ids="'+paths+'images/btnimgs'+i+'.gif"><img style="display:none;width:48px;height:48px;" src=""/></a>';}
	;}
	$('#'+pgn+'btnimg'+pn).show();
	$('#'+pgn+'btnimg'+pn).html(btnimghtml+'<a href="#" style="padding:1px;border:none;" class="ui-btn ui-btn-z ui-btn-inline '+pgn+'btnimg'+pn+'" ids=""><img style="width:48px;height:48px;" src="images/1.png"/></a><div class="'+pgn+'btnimgspin" style="width:100%;font-size:12px;">Loading...<BR><img src="css/images/ajax-loader.gif"></div>');
;}

	var mnh = parseInt(mnh); 
	var startdy = new Date(yr,mnh-2, 1).getDay();var ltdy2 = new Date(yr,mnh-1, 0).getDate();
	var startday = new Date(yr,mnh-1, 1).getDay();var ltday = new Date(yr,mnh, 0).getDate();
	var startday1 = new Date(yr,mnh, 1).getDay();var ltday1 = new Date(yr,mnh+1, 0).getDate();
	
	if(mnh==12){
		var dyvlu = '11/'+yr+' - '+'1/'+(yr+1)+''; var dataperiod = pgn+"dy"+pn+'n'+yr+'-11';var dataperiod2 = pgn+"dy"+pn+'n'+yr+'-12';var dataperiod5 = pgn+"dy"+pn+'n'+(yr+1)+'-1';
		var yypart = yr;var yypart2 = yr;var yypart5 = yr+1;var mpart = 11;var mpart2 = 12;var mpart5 = 1;	
	}else if(mnh==1){
		var dyvlu = '12/'+yr+' - '+'2/'+(yr+1)+'';var dataperiod = pgn+"dy"+pn+'n'+yr+'-12';var dataperiod2 = pgn+"dy"+pn+'n'+(yr+1)+'-1';var dataperiod5 = pgn+"dy"+pn+'n'+(yr+1)+'-2';
		var yypart = yr;var yypart2 = yr+1;var yypart5 = yr+1;var mpart = 12;var mpart2 = 1;var mpart5 = 2;
	}else {
		var dyvlu = ''+(mnh-1)+'/'+yr+' - '+(mnh+1)+'/'+yr+'';
		var dataperiod = pgn+"dy"+pn+'n'+yr+'-'+(mnh-1);var dataperiod2 = pgn+"dy"+pn+'n'+yr+'-'+mnh;;var dataperiod5 = pgn+"dy"+pn+'n'+yr+'-'+(mnh+1);
		var yypart = yr;var yypart2 = yr;var yypart5 = yr;var mpart = mnh-1;var mpart2 = mnh;var mpart5 = mnh+1;
	}
	
	$('#'+pgn+'owls'+pn).html('&nbsp;'+dyvlu);


	var dataparts = localStorage.getItem(dataperiod+'s');dataparts2 = localStorage.getItem(dataperiod2+'s');dataparts5 = localStorage.getItem(dataperiod5+'s');//internal data
	var datapart = localStorage.getItem(dataperiod);datapart2 = localStorage.getItem(dataperiod2);datapart5 = localStorage.getItem(dataperiod5);//external data
	
	function datax(startday,ltday,yr,mnh,part,pgn,pn,bgarea){
		var ht =''; var hts ='';var sp =startday;
		for(var j=1;j<=ltday;j++){if(j<10)j ='0'+j;
		if((sp+1)/7==parseInt((sp+1)/7) && sat){var mnsclr = 'background-color:'+sat+';';}else{var mnsclr = 'background-color:rgba(255, 255, 255, 0.3);';}
		if(sp/7==parseInt(sp/7)){var mnsclr = 'background-color:'+sun+';';}
		if(j<16){ht += '<div class="xkn"></div><div class="vws" id="'+pgn+'n'+pn+'n'+yr+'-'+mnh+'-'+parseInt(j)+'" style="'+mnsclr+'">&nbsp;<a data-date="'+yr+'-'+mnh+'-'+j+'" class="'+pgn+'pgdate'+pn+' ui-btn ui-mini ui-btn-z ui-btn-inline ui-btn-icon-left ui-icon-edit">'+j+' '+wdayn[sp]+'</a></div></div>';
		}else{hts += '<div class="xkn"></div><div class="vws" id="'+pgn+'n'+pn+'n'+yr+'-'+mnh+'-'+parseInt(j)+'" style="'+mnsclr+'">&nbsp;<a data-date="'+yr+'-'+mnh+'-'+j+'" class="'+pgn+'pgdate'+pn+' ui-btn ui-mini ui-btn-z ui-btn-inline ui-btn-icon-left ui-icon-edit">'+j+' '+wdayn[sp]+'</a></div></div>';	
		;}sp++;}
		
		if(part==1){
		var updnbtn = '&nbsp;&nbsp;&nbsp;<b style="color:black">'+yr+'-'+mnh+'</b><a href="#" class="'+pgn+'owldtsftr'+pn+' ui-btn ui-btn-z ui-btn-inline"><b>>></b></a>';
		var updnbtns = '&nbsp;&nbsp;&nbsp;<b style="color:black">'+yr+'-'+mnh+'</b><a href="#" class="'+pgn+'owldtsftr'+pn+' ui-btn ui-btn-z ui-btn-inline"><b>>></b></a>';
		;}else if(part==3){
		updnbtn = '&nbsp;&nbsp;&nbsp;<a href="#" class="'+pgn+'owldtsftl'+pn+' ui-btn ui-btn-z ui-btn-inline"><b><<</b></a><b style="color:black">'+yr+'-'+mnh+'</b><a href="#" class="'+pgn+'owldtsftr'+pn+' ui-btn ui-btn-z ui-btn-inline"><b>>></b></a>';
		var updnbtns = '&nbsp;&nbsp;&nbsp;<a href="#" class="'+pgn+'owldtsftl'+pn+' ui-btn ui-btn-z ui-btn-inline"><b><<</b></a><b style="color:black">'+yr+'-'+mnh+'</b><a href="#" class="'+pgn+'owldtsftr'+pn+' ui-btn ui-btn-z ui-btn-inline"><b>>></b></a>';
		;}else if(part==5){
		var updnbtn = '&nbsp;&nbsp;&nbsp;<a href="#" class="'+pgn+'owldtsftl'+pn+' ui-btn ui-btn-z ui-btn-inline"><b><<</b></a><b style="color:black">'+yr+'-'+mnh+'</b>';
		var updnbtns = '&nbsp;&nbsp;&nbsp;<a href="#" class="'+pgn+'owldtsftl'+pn+' ui-btn ui-btn-z ui-btn-inline"><b><<</b></a><b style="color:black">'+yr+'-'+mnh+'</b>';
		;}
		
		
		var hf = '<div class="xkn"></div><div style="background-color:rgba(255, 255, 255, 0.4);width:100%;padding-top:15px;padding-bottom:15px;"></div>';
		var owlmnVLU = '<div class="xkn"></div><div id="'+pgn+'uds'+pn+'n'+yr+parseInt(mnh)+'1" style="background-color:'+bgarea+';color:#FFFFFF;width:100%;"> '+updnbtn+'</div>'+ht+hf;
		var owlmnVLUs = '<div class="xkn"></div><div id="'+pgn+'uds'+pn+'n'+yr+parseInt(mnh)+'16" style="background-color:'+bgarea+';color:#FFFFFF;width:100%;"> '+updnbtns+'</div>'+hts+hf;
		
		var $owlmnn=$('#'+pgn+'owlmn'+pn+'n'+part);$owlmnn.hide('slow');$owlmnn.html(owlmnVLU);$owlmnn.show('slow');
		var $owlmnn2=$('#'+pgn+'owlmn'+pn+'n'+(part+1));$owlmnn2.hide('slow');$owlmnn2.html(owlmnVLUs);$owlmnn2.show('slow');	
	;}	//function datax(
						 
	function dataw(startday,ltday,yr,mnh,part,pgn,pn,bgarea,datapart,dataprt){
		var ht =''; var hts ='';var sp =startday;if(datapart)var datapart = JSON.parse(datapart);if(dataprt)var dataprt = JSON.parse(dataprt);
		var pjurl='';var data='';var owlmndatatop='';var owlmndata='';var padding = '';var iconvlu = '';var imgvlu = '';var clrbtn = '';
		if(document.URL.indexOf('pj=') !== -1)pjurl =1;
					
		for(var j=1;j<=ltday;j++){
				owlmndatatop='';owlmndata='';var dy='';	
				if(datapart){	
				 	dy = datapart[j];
					if(dy.length){
					for(var i=0;i<dy.length;i++){
								if(dy[i]['img']){padding = 0;}else{padding = '3';}
								clrbtn = '';
								if(dy[i]['clrbtn']){clrbtn = 'background-color:'+dy[i]['clrbtn']+';';}
								if(dy[i]['clrfont']){clrbtn += 'color:'+dy[i]['clrfont']+';';}
								if(pjurl){
									if(dy[i]['img'].indexOf('http') === -1)dy[i]['img'] = dy[i]['img'].replace('src=','src=../panel/'+pj+'/');
									if(dy[i]['imgx'].indexOf('http') === -1)dy[i]['imgx'] = dy[i]['imgx'].replace('src=','src=../panel/'+pj+'/');
								}
								data = '<a href="#" style="padding:'+padding+'px;'+clrbtn+'" data-html="'+dy[i]['html']+'" data-dy="'+dy[i]['date']+'" data-dys="'+dy[i]['title']+'" data-msg="'+dy[i]['msg']+'" data-date="'+yr+'-'+mnh+'-'+j+'" data-dyimg="'+dy[i]['img']+'" data-dyimgx="'+dy[i]['imgx']+'" '+clrbtn+' class="'+pgn+'owlmndata'+pn+' '+yr+'-'+mnh+'-'+j+'ndata'+i+' dyn ui-btn ui-btn-w">'+dy[i]['img']+dy[i]['icon']+dy[i]['title']+'</a>';		
							
							
								if(dy[i]['w']){owlmndatatop += data;
								}else{owlmndata += data;}
					;}
					;}
				;}
				
				if(dataprt){
					dy = dataprt[j];
					if(dy.length){
					for(var i=0;i<dy.length;i++){
								if(dy[i]['img']){padding = 0;}else{padding = '3';}
								clrbtn = '';
								//if(dy[i]['clrbtn']){clrbtn = 'background-color:'+dy[i]['clrbtn']+';';}
								//if(dy[i]['clrfont']){clrbtn += 'color:'+dy[i]['clrfont']+';';}
								if(pjurl){
									if(dy[i]['img'].indexOf('http') === -1){path = '../panel/'+pj+'/';}else{path = '';}
									//if(dy[i]['imgx'].indexOf('http') === -1)dy[i]['imgx'] = dy[i]['imgx'].replace('src=','src=../panel/'+pj+'/');
								}
								if(dy[i]['icon']){iconvlu = '<span class="'+dy[i]['icon']+'" style="color:pink;"></span>';}else{iconvlu = '';}
								if(dy[i]['img']){imgvlu = '<br><img src="'+path+dy[i]['img']+'" class="calendjs"/>';}else{imgvlu = '';}
								
								data = '<a href="#" style="padding:'+padding+'px;'+clrbtn+'" data-html="'+dy[i]['html']+'" data-dy="'+dy[i]['date']+'" data-dys="'+dy[i]['title']+'" data-msg="'+dy[i]['msg']+'"  data-date="'+yr+'-'+mnh+'-'+j+'" data-dyimg="'+dy[i]['img']+'" data-dyimgx="'+dy[i]['img']+'" '+clrbtn+' class="'+pgn+'owlmndata'+pn+' '+yr+'-'+mnh+'-'+j+'ndatas'+i+' dyn ui-btn ui-btn-w">'+imgvlu+iconvlu+dy[i]['title']+'</a>';		
								
								if(dy[i]['w']){owlmndatatop += data;
								}else{owlmndata += data;}
								
								if(gclnjs){//APP USER SWITCH or initial install
									if(window.deviceReady==true && dy[i]['tm']){
										if($.inArray(rmd,dy[i]['nbr'])==-1){
											var startDate = new Date(dy[i]['rmdYYYY'],dy[i]['rmdMM'],dy[i]['rmdDD'],dy[i]['rmdHH'],dy[i]['rmdMn'],0,0,0);var endDate = startDate;
											var calOptions = window.plugins.calendar.getCalendarOptions(); 
 											if(dy[i]['mbn']){calOptions.firstReminderMinutes = dy[i]['mbn'];}else{calOptions.firstReminderMinutes = null;}
 											if(dy[i]['mbns'])calOptions.secondReminderMinutes = dy[i]['mbns'];
											if(iPad)calOptions.calendarName = gclnjs;
											window.plugins.calendar.createEventWithOptions(dy[i]['date'],dy[i]['location'],dy[i]['title'],startDate,endDate,calOptions,gclnsuccess,gclnerror);
										;}
									;}
								;}
								
					;}
					;}
				;}
				
				if(owlmndatatop || owlmndata)owlmndata = owlmndatatop+owlmndata;
		
		if(owlmndata)owlmndata = '<a href="#" data-nbr="#'+pgn+'n'+pn+'n'+yr+'-'+mnh+'-'+j+'" class="'+pgn+'mheight'+pn+' ui-btn ui-btn-z ui-btn-inline ui-mini"><span class="pigss-images"></span></a>'+owlmndata;

		if(j<10)j ='0'+j;
		if((sp+1)/7==parseInt((sp+1)/7) && sat){var mnsclr = 'background-color:'+sat+';';}else{var mnsclr = 'background-color:rgba(255, 255, 255, 0.3);';}
		if(sp/7==parseInt(sp/7)){var mnsclr = 'background-color:'+sun+';';}
		
		if(owlmndata){var dhgt = 'max-height:150px;overflow-y:auto;overflow-x:hidden;';}else{var dhgt ='';}
		if(j<16){ht += '<div class="xkn"></div><div class="vws webkitm" id="'+pgn+'n'+pn+'n'+yr+'-'+mnh+'-'+parseInt(j)+'" style="'+dhgt+mnsclr+'">&nbsp;<a data-date="'+yr+'-'+mnh+'-'+j+'" class="'+pgn+'pgdate'+pn+' ui-btn ui-mini ui-btn-z ui-btn-inline ui-btn-icon-left ui-icon-edit">'+j+' '+wdayn[sp]+'</a>'+owlmndata+'</div></div>';
		}else{
		hts += '<div class="xkn"></div><div class="vws" id="'+pgn+'n'+pn+'n'+yr+'-'+mnh+'-'+parseInt(j)+'" style="'+dhgt+mnsclr+'">&nbsp;<a data-date="'+yr+'-'+mnh+'-'+j+'" class="'+pgn+'pgdate'+pn+' ui-btn ui-mini ui-btn-z ui-btn-inline ui-btn-icon-left ui-icon-edit">'+j+' '+wdayn[sp]+'</a>'+owlmndata+'</div></div>';	
		;}sp++;}
		
		if(part==1){
		var updnbtn = '&nbsp;&nbsp;&nbsp;<b style="color:black">'+yr+'-'+mnh+'</b><a href="#" class="'+pgn+'owldtsftr'+pn+' ui-btn ui-btn-z ui-btn-inline"><b>>></b></a>';
		var updnbtns = '&nbsp;&nbsp;&nbsp;<b style="color:black">'+yr+'-'+mnh+'</b><a href="#" class="'+pgn+'owldtsftr'+pn+' ui-btn ui-btn-z ui-btn-inline"><b>>></b></a>';
		;}else if(part==3){
		var updnbtn = '&nbsp;&nbsp;&nbsp;<a href="#" class="'+pgn+'owldtsftl'+pn+' ui-btn ui-btn-z ui-btn-inline"><b><<</b></a><b style="color:black">'+yr+'-'+mnh+'</b><a href="#" class="'+pgn+'owldtsftr'+pn+' ui-btn ui-btn-z ui-btn-inline"><b>>></b></a>';
		var updnbtns = '&nbsp;&nbsp;&nbsp;<a href="#" class="'+pgn+'owldtsftl'+pn+' ui-btn ui-btn-z ui-btn-inline"><b><<</b></a><b style="color:black">'+yr+'-'+mnh+'</b><a href="#" class="'+pgn+'owldtsftr'+pn+' ui-btn ui-btn-z ui-btn-inline"><b>>></b></a>';
		;}else if(part==5){
		var updnbtn = '&nbsp;&nbsp;&nbsp;<a href="#" class="'+pgn+'owldtsftl'+pn+' ui-btn ui-btn-z ui-btn-inline"><b><<</b></a><b style="color:black">'+yr+'-'+mnh+'</b>';
		var updnbtns = '&nbsp;&nbsp;&nbsp;<a href="#" class="'+pgn+'owldtsftl'+pn+' ui-btn ui-btn-z ui-btn-inline"><b><<</b></a><b style="color:black">'+yr+'-'+mnh+'</b>';
		;}
		
		
		var hf = '<div class="xkn"></div><div style="background-color:rgba(255, 255, 255, 0.4);width:100%;padding-top:15px;padding-bottom:15px;"><a href="#'+pgn+'clrmdata'+pn+'" data-rel="popup" class="'+pgn+'clrmdata'+pn+' ui-btn ui-btn-z ui-btn-inline ui-icon-calendar ui-btn-icon-left"> X </a></div>';
		owlmnVLU = '<div class="xkn"></div><div id="'+pgn+'uds'+pn+'n'+yr+mnh+'1" style="background-color:'+bgarea+';color:#FFFFFF;width:100%;"> '+updnbtn+'</div>'+ht+'<div class="xkn"></div><div style="background-color:rgba(255, 255, 255, 0.4);width:100%;padding-top:15px;padding-bottom:15px;"></div>';
		owlmnVLUs = '<div class="xkn"></div><div id="'+pgn+'uds'+pn+'n'+yr+mnh+'16" style="background-color:'+bgarea+';color:#FFFFFF;width:100%;"> '+updnbtns+'</div>'+hts+hf;
		
		var $owlmnn=$('#'+pgn+'owlmn'+pn+'n'+part);$owlmnn.hide('slow');$owlmnn.html(owlmnVLU);$owlmnn.show('slow');
		var $owlmnn2=$('#'+pgn+'owlmn'+pn+'n'+(part+1));$owlmnn2.hide('slow');$owlmnn2.html(owlmnVLUs);$owlmnn2.show('slow');	
	;}	//function datax(
	
	if(datapart || dataparts){   dataw(startdy,ltdy2,yypart,mpart,1,pgn,pn,bgarea,datapart,dataparts);	
	;}else{     datax(startdy,ltdy2,yypart,mpart,1,pgn,pn,bgarea);}
	
	if(datapart2 || dataparts2){    dataw(startday,ltday,yypart2,mpart2,3,pgn,pn,bgarea,datapart2,dataparts2);
	;}else{   datax(startday,ltday,yypart2,mpart2,3,pgn,pn,bgarea);}
	
	if(datapart5 || dataparts5){    dataw(startday1,ltday1,yypart5,mpart5,5,pgn,pn,bgarea,datapart5,dataparts5);
	;}else{    datax(startday1,ltday1,yypart5,mpart5,5,pgn,pn,bgarea);}	
	$.mobile.loading( "hide");
;}

function owls(d,mnh,day,yr,pgn,pj,pn,wdayn,sat,sun,btnimg,bgarea,btnimgs,windowHeight){
	var $lndata = $("#"+pgn+"lndata"+pn);
	var $sbtnvwsv = $("#"+pgn+"sbtnvwsv"+pn);
	
	var gclnsuccess = function(message) { alert("Success成功: " + JSON.stringify(message)); };
    var gclnerror = function(message) { alert("Error错误: " + message); };

	var calendarjs = localStorage.getItem(pgn+"calendarjs"+pn);
	if(calendarjs)$('#'+pgn+'mailvclr'+pn).find('input[type=email]').val(calendarjs);

	
	var gclnjs = localStorage.getItem(pgn+"gclnjs"+pn);
	if(gclnjs)$('#'+pgn+'mailvclr'+pn).find('input[type=text]').val(gclnjs);
	$('#'+pgn+'gclnvluclr'+pn).click(function (event){event.preventDefault();	
	var gclnjs = $('#'+pgn+'mailvclr'+pn).find('input[type=text]').val();
	localStorage[pgn+"gclnjs"+pn] = gclnjs;
		if(window.deviceReady==true && gclnjs && navigator.userAgent.match(/(iPod|iPhone|iPad)/))window.plugins.calendar.createCalendar(gclnjs,gclnsuccess,gclnerror);
    });

	$('#'+pgn+'shfr'+pn).click(function (event){event.preventDefault();	
	var $owlmnspgnpn = $('#'+pgn+'owlmns'+pn);	
	var $owlspgnpn = $('#'+pgn+'owls'+pn);
	$owlspgnpn.hide('slow');$owlspgnpn.html('');$owlspgnpn.show('slow');
		var d = new Date();var mnh = parseInt($owlmnspgnpn.data("jsmnh"));
		var day = d.getDate();var yr = $owlmnspgnpn.data("jsnyr"); 
		if(mnh<=10){mnh = mnh+3;yr = parseInt(yr);}
		else if(mnh=='11'){mnh = 2;yr = parseInt(yr)+1;}
		else if(mnh=='12'){mnh = 3;yr = parseInt(yr)+1;}
		
		$owlmnspgnpn.data("jsnyr",yr);
		$owlmnspgnpn.data("jsmnh",mnh);
		 owln(d,mnh,day,yr,pgn,pj,pn,wdayn,sat,sun,btnimg,bgarea,btnimgs);	
	;})
	$('#'+pgn+'shfl'+pn).click(function (event){event.preventDefault();	
	var $owlmnspgnpn = $('#'+pgn+'owlmns'+pn);
	var $owlspgnpn = $('#'+pgn+'owls'+pn);
	$owlspgnpn.hide('slow');$owlspgnpn.html('');$owlspgnpn.show('slow');	
		var d = new Date();var mnh = parseInt($owlmnspgnpn.data("jsmnh"));
		var day = d.getDate();var yr = $owlmnspgnpn.data("jsnyr");
		if(mnh=='3'){yr = parseInt(yr)-1;mnh = 12;}
		else if(mnh=='2'){mnh = 11;yr = parseInt(yr)-1;}
		else if(mnh=='1'){mnh = 10;yr = parseInt(yr)-1;}
		else if(mnh>3){mnh = mnh-3;yr = parseInt(yr);}
		$owlmnspgnpn.data("jsnyr",yr);
		$owlmnspgnpn.data("jsmnh",mnh);
		 owln(d,mnh,day,yr,pgn,pj,pn,wdayn,sat,sun,btnimg,bgarea,btnimgs);	
	;})

//$(document).on('click', '.'+pgn+'dnup'+pn,function (event) {event.preventDefault();//$('html, body').animate({scrollTop: $($(this).attr('data-nbr')).offset().top}, 800);})
//$(document).on('click', '.'+pgn+'updn'+pn,function (event) {event.preventDefault();//$('html, body').animate({scrollTop: $($(this).attr('data-nbr')).offset().top}, 800);})

$(document).on('click', '.'+pgn+'mheight'+pn,function (event) {event.preventDefault();
	var $nbr = $($(this).attr("data-nbr"));    var  mhgt = $nbr.css('max-height');
	if(mhgt=='none'){$nbr.css('max-height',150+'px');}else{$nbr.css('max-height','');}
;})

//date button
$(document).on('click', '.'+pgn+'pgdate'+pn,function (event) {
	event.preventDefault();
	var datnvlu = $(this).attr('data-date');
	var datnsvlu =  datnvlu.split('-');
	$('#'+pgn+'owlmns'+pn).data("pgdate",datnvlu).data("owldatn",datnvlu);
	$('#'+pgn+'lndatn'+pn).html(datnvlu);
	$('#'+pgn+'lndata'+pn).popup('open');
	$('#'+pgn+'databtntitle'+pn).val('');
	$('#'+pgn+'databtn'+pn).val('');
	$('#'+pgn+'vwifrhts'+pn).html('');
	$('#'+pgn+'vwifrhtm'+pn).val('');
	$('#'+pgn+'vwifrhtmn'+pn).val('');
	$('#'+pgn+'vwifrhtmv'+pn).val('');
	$('#'+pgn+'icon'+pn).val('');
	$('#'+pgn+'btnimgs'+pn).val('');
	$('#'+pgn+'imgbtns'+pn).html('');
	$('#'+pgn+'iconbtns'+pn).html('');	
;})	

function datalist(pgn,pj,pn,windowHeight){
	var datnvlu = $('#'+pgn+'lndatn'+pn).html();
	var datnsvlu =  datnvlu.split('-');
	$('#'+pgn+'owlmns'+pn).data("pgdate",datnvlu).data("owldatn",datnvlu);	
	var localdatabtntitle  =''; var localdatabtnt  ='';  
	var htmlv='';var htmlvs=''; var localdatabtnt = localStorage.getItem(pgn+"dy"+pn+'n'+datnsvlu[0]+'-'+datnsvlu[1]);
	var datevlu = parseInt(datnsvlu[2]);
	if(localdatabtnt){localdatabtnt = JSON.parse(localdatabtnt);	
	localdatabtntitle = localdatabtnt[datevlu];}
	
	var slocaldatabtntitle  =''; var slocaldatabtnt  ='';  
	var slocaldatabtnt = localStorage.getItem(pgn+"dy"+pn+'n'+datnsvlu[0]+'-'+datnsvlu[1]+'s');
	if(slocaldatabtnt){slocaldatabtnt = JSON.parse(slocaldatabtnt);
	slocaldatabtntitle = slocaldatabtnt[datevlu];}
	
	var iconvlu  =''; var iconsvlu  =''; var htmlv  =''; 
	
	if(slocaldatabtnt){
	if(slocaldatabtntitle.length){	
	for(var j=slocaldatabtntitle.length-1;j >= 0; j--){
		if(slocaldatabtntitle[j]['icon']){iconvlu = '<span style="color:pink" class="'+slocaldatabtntitle[j]['icon']+'"></span>';}else{iconvlu = '';}
		if(slocaldatabtntitle[j]['tm']){
			if(slocaldatabtntitle[j]['tm']==1){iconsvlu = ' ui-icon-clock ui-btn-icon-left';}else if(slocaldatabtntitle[j]['tm']==2){iconsvlu = ' ui-icon-calendar ui-btn-icon-left"';}else{iconsvlu = '';}
		}else{iconsvlu = '';}
		htmlv += '<li style="padding:0px" class="ui-btn ui-btn-w'+iconsvlu+'"><a href="#" data-date="'+datnvlu+'" ids="'+j+'" class="'+pgn+'sltsbtnrm'+pn+' ui-btn ui-mini ui-btn-x ui-btn-inline">X</a><a href="#" data-date="'+datnvlu+'" ids="'+j+'" style="width:55%" class="'+pgn+'sltsbtn'+pn+' ui-btn ui-btn-x ui-btn-inline">'+iconvlu+slocaldatabtntitle[j]['date']+'<BR>'+slocaldatabtntitle[j]['title']+'</a><a href="#" data-date="'+datnvlu+'" ids="'+j+'" class="'+pgn+'sltsbtnwebs'+pn+' ui-btn ui-mini ui-btn-x ui-btn-inline"><span style="color:PINK" class="pigss-clock"></span></a></li>';
	;}
	;}
	;}

	if(localdatabtnt){
	if(localdatabtntitle.length){	
	htmlv = htmlv+'<hr>';
	for(var i=localdatabtntitle.length-1;i >= 0; i--){
		if(localdatabtntitle[i]['icon']){iconvlu = '<span style="color:pink" class="'+localdatabtntitle[i]['icon']+'"></span>';}else{iconvlu = '';}
		if(localdatabtntitle[i]['tm']){
			if(localdatabtntitle[i]['tm']==1){iconsvlu = ' ui-icon-clock ui-btn-icon-left';}else if(localdatabtntitle[i]['tm']==2){iconsvlu = ' ui-icon-calendar ui-btn-icon-left"';}else{iconsvlu = '';}
		}else{iconsvlu = '';}
		htmlv += '<li style="padding:0px" class="ui-btn ui-btn-w'+iconsvlu+'"><a href="#" data-date="'+datnvlu+'" ids="'+i+'" class="'+pgn+'sltsbtnwebrm'+pn+' ui-btn ui-mini ui-btn-x ui-btn-inline">X</a><a href="#" style="width:75%" class="ui-btn ui-btn-x ui-btn-inline">'+iconvlu+localdatabtntitle[i]['date']+'<BR>'+localdatabtntitle[i]['title']+'</a><a href="#" data-date="'+datnvlu+'" ids="'+i+'" class="'+pgn+'sltsbtnweb'+pn+' ui-btn ui-mini ui-btn-x ui-btn-inline"><span style="color:PINK" class="pigss-clock"></span></a></li>';
	;}	
	;}
	;}
	
	if(htmlv){$('#'+pgn+'sbtnvw'+pn).html(htmlv);
	}else{$('#'+pgn+'sbtnvw'+pn).html('');}
;}

//date item list button
$("#"+pgn+"sbtnvwbtn"+pn).click(function(event) {event.preventDefault();	
	datalist(pgn,pj,pn,windowHeight);
	$lndata.popup('close').one( "popupafterclose", function( event, ui ){$sbtnvwsv.popup('open',"transition","pop");$("#"+pgn+"mbntform"+pn).hide();});
});
//calendar button
$("#"+pgn+"nformbtn"+pn).click(function(event) {event.preventDefault();	
	datalist(pgn,pj,pn,windowHeight);
	$lndata.popup('close').one( "popupafterclose", function( event, ui ){$sbtnvwsv.popup('open',"transition","pop");$("#"+pgn+"mbntform"+pn).show();});
});

//date item list - return button
$sbtnvwsv.find('a').click(function(event) {event.preventDefault();	
	$sbtnvwsv.popup('close').one( "popupafterclose", function( event, ui ){$lndata.popup('open',"transition","pop");});	
});

//clicking title on item list
$(document).on("click", "."+pgn+"sltsbtn"+pn,function (event) {
	event.preventDefault();
	var ids = $(this).attr('ids');
	var datnvlu = $(this).attr('data-date');
	var datnsvlu =  datnvlu.split('-');
	var databtnt = JSON.parse(localStorage.getItem(pgn+"dy"+pn+'n'+datnsvlu[0]+'-'+datnsvlu[1]+'s'));
	var datevlu = parseInt(datnsvlu[2]);
	var databtntitle = databtnt[datevlu][ids];

	
	
	$('#'+pgn+'databtntitle'+pn).val(databtntitle['title']);
	$('#'+pgn+'databtn'+pn).val(databtntitle['msg']);
	$('#'+pgn+'icon'+pn).val(databtntitle['icon']);
	$('#'+pgn+'btnimgs'+pn).val(databtntitle['img']);
	$('#'+pgn+'vwifrhtmv'+pn).val(databtntitle['html']);
	if(databtntitle['html']){
		var htmlds = databtntitle['html'].split('[dydy]');var htmlids='';var dyhtsi='';var dyhts='';
		js = 1;
		for(var i=0;i<htmlds.length;i++){
		if(!i || ((i/2).toString()).indexOf('.')==-1){if(htmlds[i]){dyhtsi = htmlds[i];dyhts = htmlds[i];}else{dyhtsi ='';dyhts =''; }
		}else{if(!dyhtsi)dyhtsi = htmlds[i];
		htmlids += '<a href="#" data-html="'+htmlds[i]+'" data-htmlv="'+dyhts+'" data-slt="1" class="'+pgn+'vwifrhtmv'+pn+' ui-btn ui-btn-a ui-btn-icon-left ui-icon-check"> '+js+'. '+dyhtsi+'</a>'; js++;
		;};}
		$('#'+pgn+'vwifrhts'+pn).html(htmlids);
		htmlids='';
	;}
	$('#'+pgn+'iconbtns'+pn).html('<span class="'+databtntitle['icon']+'"></span>');
	var path ='';
	if(document.URL.indexOf('pj=') !== -1){if(databtntitle['img'].indexOf('http') === -1)path = '../panel/'+pj+'/';} 
	if(databtntitle['img'])$('#'+pgn+'imgbtns'+pn).html('<img src="'+path+databtntitle['img']+'" style="width:35px;height:35px;"/>');
	$('#'+pgn+'owlmns'+pn).data("owldatnids",ids);
	
	$sbtnvwsv.popup('close').one( "popupafterclose", function( event, ui ){$lndata.popup('open',"transition","pop");});

});	
// attachment
$(document).on("click", "."+pgn+"vwifrhtmv"+pn,function (event) {
		event.preventDefault();	
		var $this = $(this); var $vwifrhtmv = $('#'+pgn+'vwifrhtmv'+pn);
		var vlu = $this.attr('data-slt');
		if(vlu){			
			$this.attr('data-slt','');
			$this.removeClass("ui-icon-check").addClass("ui-icon-delete");		
			var val = $vwifrhtmv.val().replace($this.attr('data-htmlv')+'[dydy]'+$this.attr('data-html')+'[dydy]',$this.attr('data-htmlv')+'[dydy][dydys]'+$this.attr('data-html')+'[dydy]');
			$vwifrhtmv.val(val);
			$this.button('refresh');
		;}else{
			$this.attr('data-slt',1);
			$this.removeClass("ui-icon-delete").addClass("ui-icon-check");		
			var val = $vwifrhtmv.val().replace($this.attr('data-htmlv')+'[dydy][dydys]'+$this.attr('data-html')+'[dydy]',$this.attr('data-htmlv')+'[dydy]'+$this.attr('data-html')+'[dydy]');
			$vwifrhtmv.val(val);		
			$this.button('refresh');
		;}
});	

//data edit button
$('#'+pgn+'pgbtns'+pn).click(function (event){event.preventDefault();	
		var databtntitle = $('#'+pgn+'databtntitle'+pn).val();if(!databtntitle)databtntitle="";
		var databtn = $('#'+pgn+'databtn'+pn).val(); if(!databtn)databtn="";
		var icon = $('#'+pgn+'icon'+pn).val(); if(!icon)icon="";
		var img = $('#'+pgn+'btnimgs'+pn).val(); if(!img)img="";
		var htmnvlu = $('#'+pgn+'vwifrhtmn'+pn).val(); if(!htmnvlu){htmnvlu="";}else{htmnvlu=htmnvlu+'[dydy]';}
		var htmvlu = $('#'+pgn+'vwifrhtm'+pn).val(); if(!htmvlu){htmvlu="";}else{htmvlu=htmvlu+'[dydy]';if(!htmnvlu)htmvlu=htmvlu+'[dydy]'+htmvlu+'[dydy]';;}
		var html = $('#'+pgn+'vwifrhtmv'+pn).val(); if(!html)html="";
			
		var datnvlu = $('#'+pgn+'lndatn'+pn).text();
		var datn = datnvlu.split('-');
		var databtnt = '';
		var databn = localStorage.getItem(pgn+"dy"+pn+'n'+datn[0]+'-'+datn[1]+'s');
		if(!databn)localStorage.setItem(pgn+"dy"+pn+'n'+datn[0]+'-'+datn[1]+'s','[[],[],[],[],[],[],[],[],[],[],[],[],[],[],[],[],[],[],[],[],[],[],[],[],[],[],[],[],[],[],[],[]]');
		var databtnt = JSON.parse(localStorage.getItem(pgn+"dy"+pn+'n'+datn[0]+'-'+datn[1]+'s'));
		

		var slfp = $('#'+pgn+'owlmns'+pn).data("owldatnids");
		var htmlsv = '';var dyhtsi = '';
		if(html && html.indexOf('[dydys]')!=-1){
			htmls=html.split('[dydy]');
			for(var i=0;i<htmls.length;i++){
				if(!i || ((i/2).toString()).indexOf('.')==-1){if(htmls[i]){dyhtsi = htmls[i];}else{dyhtsi ='';}
				}else{
					if(htmls[i].indexOf('[dydys]')==-1)htmlsv += dyhtsi+'[dydy]'+htmls[i]+'[dydy]';
				;}
			;}
			html = htmlsv;
			htmlsv ='';
		}
		if(htmvlu)html = htmnvlu+htmvlu+html;
		
		var databtntitlevlu = {"date":datnvlu,"title":databtntitle,"msg":databtn,"html":html,"icon":icon,"img":img,"imgx":"","tm":"","w":"","clrfont":"","clrbtn":""};


		var databtntitles ='';var databtns ='';var icons ='';var imgs ='';var htmls ='';
		var datevlu = parseInt(datn[2]);
		var databtntitles = databtnt[datevlu];

		if(!slfp && (icon || img || databtntitle)){
			if(databtntitles){var datalgth = databtntitles.length;}else{var datalgth = 0;}
			if(icon){var iconvlu = '<span class="'+icon+'" style="color:pink;"></span>';}else{var iconvlu = '';}
			if(img){var imgvlu = '<br><img src="'+img+'" class="calendjs"/>';}else{var imgvlu = '';}
			var nhtmlv = '<div style="padding:1px;" data-html="'+html+'" data-dy="'+datnvlu+'" data-dys="'+databtntitle+'" data-msg="'+databtn+'" data-date="'+datnvlu+'" data-dyimg="'+img+'" class="'+pgn+'owlmndata'+pn+' '+datn[0]+'-'+parseInt(datn[1])+'-'+parseInt(datn[2])+'ndatas'+datalgth+' dyn ui-btn ui-btn-w">'+iconvlu+databtntitle+imgvlu+'</div>';
			$('#'+pgn+'n'+pn+'n'+datn[0]+'-'+parseInt(datn[1])+'-'+parseInt(datn[2])).append(nhtmlv);
			if(datn[2] > 15){var datnuls = 2;}else{var datnuls = 1;}
			$('#'+pgn+'owlmns'+pn).data(datn[0]+datn[1]+'-'+datnuls,'');
			var calendarjs = localStorage.getItem(pgn+"calendarjs"+pn);
			if(document.URL.indexOf('http://') === -1 && document.URL.indexOf('https://') === -1 && calendarjs){
				var jshtmlcalendar = '<p>'+datnvlu+'</p><p>'+databtn+'</p><p>'+html+'</p>';
				if(window.deviceReady==true){ cordova.plugins.email.open({to:[calendarjs],subject:databtntitle,body:jshtmlcalendar,isHtml:true});};}
		;}

	if(slfp){		
		if(!databtntitle && !databtn){
		var calendarjs = localStorage.getItem(pgn+"calendarjs"+pn);
			if(document.URL.indexOf('http://') === -1 && document.URL.indexOf('https://') === -1 && calendarjs){
				var jshtmlcalendar = '<p>'+datnvlu+'</p><p>'+databtntitles[slfp]['title']+'</p><p>'+databtntitles[slfp]['html']+'</p>';
				if(window.deviceReady==true){ cordova.plugins.email.open({to:[calendarjs],subject:databtntitles[slfp]['title']+'[deletion]',body:jshtmlcalendar,isHtml:true});};}
		;}else{
			var calendarjs = localStorage.getItem(pgn+"calendarjs"+pn);
			if(document.URL.indexOf('http://') === -1 && document.URL.indexOf('https://') === -1 && calendarjs){
				var jshtmlcalendar = '<p>'+datnvlu+'</p><p>'+databtn+'</p><p>'+html+'</p><p><hr></p><p><hr></p><p>'+databtntitle[slfp]['date']+'</p><p>'+databtntitles[slfp]['title']+'</p><p>'+databtntitles[slfp]['msg']+'</p><p>'+databtntitles[slfp]['html']+'</p>';
				if(window.deviceReady==true){ cordova.plugins.email.open({to:[calendarjs],subject:databtntitle+'[amendment]',body:jshtmlcalendar,isHtml:true});};}
		;}
			
		if(!databtntitle && !databtn){
			if(datn[2] > 15){var datnuls = 2;}else{var datnuls = 1;}
			$('#'+pgn+'owlmns'+pn).data(datn[0]+datn[1]+'-'+datnuls,'');
			$('.'+datn[0]+'-'+parseInt(datn[1])+'-'+parseInt(datn[2])+'ndatas'+slfp).hide();
			databtntitles.splice(slfp,1);
			var slfprm = 1;
		}else{	
			pjurl='';
			if(document.URL.indexOf('pj=') !== -1)pjurl =1;
		
			if(icon){var iconvlu = '<span class="'+icon+'" style="color:pink;"></span>';}else{var iconvlu = '';}
			if(pjurl){if(img.indexOf('http') === -1){var path = '../panel/'+pj+'/';}else{var path = '';};}
			if(img){var imgvlu = '<br><img src="'+path+img+'" class="calendjs"/>';}else{var imgvlu = '';}
			
			databtntitles.splice(slfp,1,databtntitlevlu);
			var $ndata = $('.'+datn[0]+'-'+parseInt(datn[1])+'-'+parseInt(datn[2])+'ndatas'+slfp);		
			$ndata.attr('data-html',html).attr('data-dys',databtntitle).attr('data-msg',databtn).attr('data-dyimg',img).attr('data-dyimgx',img);		
			$ndata.html(imgvlu+iconvlu+databtntitle);
		;}
	;}else if(icon || img || databtntitle){
		databtntitles.push(databtntitlevlu);
		
		var calendarjs = localStorage.getItem(pgn+"calendarjs"+pn);
			if(document.URL.indexOf('http://') === -1 && document.URL.indexOf('https://') === -1 && calendarjs){
				var jshtmlcalendar = '<p>'+databtn+'</p><p>'+html+'</p>';
				if(window.deviceReady==true){ cordova.plugins.email.open({to:[calendarjs],subject:databtntitle,body:jshtmlcalendar,isHtml:true});};}
	;}
	
	
	if(icon || img || databtntitle || slfprm ){
	
	localStorage.setItem(pgn+"dy"+pn+'n'+datn[0]+'-'+datn[1]+'s',JSON.stringify(databtnt));

	var htmlv='';

	$('#'+pgn+'databtntitle'+pn).val('');
	$('#'+pgn+'databtn'+pn).val('');
	$('#'+pgn+'icon'+pn).val('');
	$('#'+pgn+'vwifrhtm'+pn).val('');
	$('#'+pgn+'vwifrhtmn'+pn).val('');
	$('#'+pgn+'vwifrhtmv'+pn).val('');
	$('#'+pgn+'vwifrhts'+pn).html('');
	$('#'+pgn+'btnimgs'+pn).val('');
	$('#'+pgn+'iconbtns'+pn).html('');
	$('#'+pgn+'imgbtns'+pn).html('');	
	}

	
	$('#'+pgn+'owlcln'+pn).show('slow');	
	$('#'+pgn+'lndata'+pn).popup('close');	
;})


//external data
$(document).on("click", '.'+pgn+'sltsbtnwebrm'+pn,function (event) {event.preventDefault();
	var ids = $(this).attr('ids');
	var datnvlu = $(this).attr('data-date');
	var datnsvlu =  datnvlu.split('-');
	
		var databtnt = '';	
		var databtnt = JSON.parse(localStorage.getItem(pgn+"dy"+pn+'n'+datnsvlu[0]+'-'+parseInt(datnsvlu[1])));
	
		var databtntitles ='';var databtns ='';
		var datevlu = parseInt(datnsvlu[2]);
		var databtntitles = databtnt[datevlu];
		
		databtntitles.splice(ids,1);
		$('.'+datnsvlu[0]+'-'+parseInt(datnsvlu[1])+'-'+parseInt(datnsvlu[2])+'ndata'+ids).hide();
		localStorage.setItem(pgn+"dy"+pn+'n'+datnsvlu[0]+'-'+parseInt(datnsvlu[1]),JSON.stringify(databtnt));

		$("#"+pgn+"sbtnvwsv"+pn).popup('close').one( "popupafterclose", function( event, ui ){$lndata.popup('open',"transition","pop");});
;})

//internal data
$(document).on("click", '.'+pgn+'sltsbtnrm'+pn,function (event) {event.preventDefault();
	var ids = $(this).attr('ids');
	var datnvlu = $(this).attr('data-date');
	var datnsvlu =  datnvlu.split('-');
	
		var databtnt = '';	
		var databtnt = JSON.parse(localStorage.getItem(pgn+"dy"+pn+'n'+datnsvlu[0]+'-'+parseInt(datnsvlu[1])+'s'));
	
		var databtntitles ='';var databtns ='';
		var datevlu = parseInt(datnsvlu[2]);
		var databtntitles = databtnt[datevlu];
		
		databtntitles.splice(ids,1);
		$('.'+datnsvlu[0]+'-'+parseInt(datnsvlu[1])+'-'+parseInt(datnsvlu[2])+'ndatas'+ids).hide();
		localStorage.setItem(pgn+"dy"+pn+'n'+datnsvlu[0]+'-'+parseInt(datnsvlu[1])+'s',JSON.stringify(databtnt));

		$("#"+pgn+"sbtnvwsv"+pn).popup('close').one( "popupafterclose", function( event, ui ){$lndata.popup('open',"transition","pop");});
;})



$(document).on("click", '.'+pgn+'sltsbtnweb'+pn,function (event) {event.preventDefault();
	var $mbitemtm = $('#'+pgn+'mbitemtm'+pn);																					
	var itemtm = $mbitemtm.val();
	
	if(itemtm && window.deviceReady==true){

	var ids = $(this).attr('ids');
	var datnvlu = $(this).attr('data-date');
	var datnsvlu =  datnvlu.split('-');
	var databtnt = JSON.parse(localStorage.getItem(pgn+"dy"+pn+'n'+datnsvlu[0]+'-'+datnsvlu[1]));
	var datevlu = parseInt(datnsvlu[2]);
	var databtntitle = databtnt[datevlu][ids];
	var mbn = $('#'+pgn+'mbntm'+pn).val();
	var mbns = $('#'+pgn+'mbntms'+pn).val();
	var $mbitemtm = $('#'+pgn+'mbitemtm'+pn);
	
	
	if((mbn || mbns) && !itemtm){$mbitemtm.focus();return false;}
	
	

		var itemtmn = 1;var itemtmHHMM = itemtm.split(':');var itemtmTMD = datnvlu.split('-');
		if(!/^[0-9]*$/.test(mbn))mbn ='';
		if(!/^[0-9]*$/.test(mbns))mbns ='';
		if(!/^([0-9]|0[0-9]|1[0-9]|2[0-3]):[0-5][0-9]$/.test(itemtm)){alert('HH:MM');$mbitemtm.focus();itemtmn = '';return false;}

	
	
		itemtmTMD[1] = parseInt(itemtmTMD[1])-1;
		var startDate = new Date(itemtmTMD[0],itemtmTMD[1],itemtmTMD[2],itemtmHHMM[0],itemtmHHMM[1],0,0,0);var endDate = startDate;
		if(mbn || mbns){tm =1;}else{tm =2;}
			
		//if(document.URL.indexOf('http') == -1){
			var calOptions = window.plugins.calendar.getCalendarOptions(); 
 			if(mbn){calOptions.firstReminderMinutes = mbn;}else{calOptions.firstReminderMinutes = null;}
 			if(mbns)calOptions.secondReminderMinutes = mbns;
			if(navigator.userAgent.match(/(iPod|iPhone|iPad)/))calOptions.calendarName =localStorage.getItem(pgn+"gclnjs"+pn);
			window.plugins.calendar.createEventWithOptions(databtntitle['date'],'',databtntitle['title'],startDate,endDate,calOptions,gclnsuccess,gclnerror);
		//;}
	
		databtntitle['tm'] = tm;
		localStorage.setItem(pgn+"dy"+pn+'n'+datnsvlu[0]+'-'+datnsvlu[1],JSON.stringify(databtnt));
		
		$sbtnvwsv.popup('close').one( "popupafterclose", function( event, ui ){$lndata.popup('open',"transition","pop");});	
	;}
;})


$(document).on("click", '.'+pgn+'sltsbtnwebs'+pn,function (event) {event.preventDefault();
	var $mbitemtm = $('#'+pgn+'mbitemtm'+pn);																					
	var itemtm = $mbitemtm.val();

	if(itemtm){

	var ids = $(this).attr('ids');
	var datnvlu = $(this).attr('data-date');
	var datnsvlu =  datnvlu.split('-');
	var databtnt = JSON.parse(localStorage.getItem(pgn+"dy"+pn+'n'+datnsvlu[0]+'-'+datnsvlu[1]+'s'));
	var datevlu = parseInt(datnsvlu[2]);
	var databtntitle = databtnt[datevlu][ids];
	var mbn = $('#'+pgn+'mbntm'+pn).val();
	var mbns = $('#'+pgn+'mbntms'+pn).val();
	

	
	if((mbn || mbns) && !itemtm){$mbitemtm.focus();return false;}
	
	
	if(itemtm){
		var itemtmn = 1;var itemtmHHMM = itemtm.split(':');var itemtmTMD = datnvlu.split('-');
		if(!/^[0-9]*$/.test(mbn))mbn ='';
		if(!/^[0-9]*$/.test(mbns))mbns ='';
		if(!/^([0-9]|0[0-9]|1[0-9]|2[0-3]):[0-5][0-9]$/.test(itemtm)){alert('HH:MM');$mbitemtm.focus();itemtmn = '';return false;}
	}
	
	
		itemtmTMD[1] = parseInt(itemtmTMD[1])-1;
		var startDate = new Date(itemtmTMD[0],itemtmTMD[1],itemtmTMD[2],itemtmHHMM[0],itemtmHHMM[1],0,0,0);var endDate = startDate;
		if(mbn || mbns){tm =1;}else{tm =2;}
			
		//if(document.URL.indexOf('http') == -1){
			var calOptions = window.plugins.calendar.getCalendarOptions(); 
 			if(mbn){calOptions.firstReminderMinutes = mbn;}else{calOptions.firstReminderMinutes = null;}
 			if(mbns)calOptions.secondReminderMinutes = mbns;
			if(navigator.userAgent.match(/(iPod|iPhone|iPad)/))calOptions.calendarName =localStorage.getItem(pgn+"gclnjs"+pn);
			window.plugins.calendar.createEventWithOptions(databtntitle['date'],'',databtntitle['title'],startDate,endDate,calOptions,gclnsuccess,gclnerror);
		//;}
	
		databtntitle['tm'] = tm;
		localStorage.setItem(pgn+"dy"+pn+'n'+datnsvlu[0]+'-'+datnsvlu[1]+'s',JSON.stringify(databtnt));
		
		$sbtnvwsv.popup('close').one( "popupafterclose", function( event, ui ){$lndata.popup('open',"transition","pop");});	
	;}
;})


	$(document).on("click",'.'+pgn+'owlmndata'+pn,function (event) {event.preventDefault();
	var $this = $(this);
	var date = $this.attr('data-date');	
	var dy =  $this.attr('data-dy');if(!dy)dy='';
	var dys =  $this.attr('data-dys');if(!dys)dys='';
	var msg =  $this.attr('data-msg');if(!msg){msg='';}else{msg= msg+'<br>';}
	var dyhtm =  $this.attr('data-html');if(!dyhtm)dyhtm='';
	if(dyhtm){
		var dyhts = dyhtm.split('[dydy]');var dyhtmvlu = '';var js = 1;var dyhtsi = 1;var dyhtsicon = 1;
		for(var i=0;i<dyhts.length;i++){
			if(!i || ((i/2).toString()).indexOf('.')==-1){if(dyhts[i]){dyhtsi = dyhts[i];}else{dyhtsi ='';}
			}else{
				if(dyhts[i].indexOf('tel:')!==-1){dyhtshtml = dyhts[i]+'" class="';dyhtsicon = 'class="pigss-mobile"';}
				//else if(dyhts[i].indexOf('whatsapp:')!==-1){dyhtshtml = dyhts[i]+'" class="whatsapp'+' ';dyhtsicon = 'class="pigss-mobile"';}
				//else if(dyhts[i].indexOf('wexin:')!==-1){dyhtshtml = dyhts[i]+'" class="wexin'+' ';dyhtsicon = 'class="pigss-mobile"';}
				//else if(dyhts[i].indexOf('mqq:')!==-1){dyhtshtml = dyhts[i]+'" class="mqq'+' ';dyhtsicon = 'class="pigss-mobile"';}
				else if(dyhts[i].indexOf('mailto:')!==-1){dyhtshtml = dyhts[i]+'" class="';dyhtsicon = 'class="pigss-mail"';}
				else if(dyhts[i].indexOf('://')!==-1 && dyhts[i].indexOf('http')==-1){dyhtshtml = '#" data-url="'+dyhts[i]+'" class="imgspop ';dyhtsicon = 'class="pigss-mobile"';}
				else if(dyhts[i].indexOf('[openapp]')!==-1 && document.URL.indexOf('http') == -1){
					dyhtshtml = '#" data-url="'+dyhts[i]+'" class="imgspop ';dyhtsicon = 'class="pigss-mobile"';}
				else if(dyhts[i]){
					if(dyhts[i].indexOf('images/')==-1 && (dyhts[i].indexOf('.gif')!==-1 || dyhts[i].indexOf('.jpg')!==-1)){var imgpath = 'images/';}else{var imgpath = '';}
					dyhtshtml = '#" data-url="'+imgpath+dyhts[i]+'" data-pop="'+pgn+'" data-popup="'+pgn+'sbtnvws'+pn+'" data-rpopup="1" class="imgspop ';dyhtsicon = 'class="pigss-link"';}
				dyhtmvlu += '<a href="'+dyhtshtml+'ui-btn ui-btn-x ui-mini ui-btn-inline"><span '+dyhtsicon+' style="color:pink"></span> '+js+'. '+dyhtsi+'</a>';js++;
			};
		;}
		dyhtmvlu = '<br>'+dyhtmvlu;
	}else{dyhtmvlu = '';}
		var dyimgx = $this.attr('data-dyimgx');if(!dyimgx)dyimgx='';
		var dyimg = $this.attr('data-dyimg');if(!dyimg)dyimg='';
		if(dyimgx || dyimg){
		if(dyimg.indexOf('<img')!==-1){
			if(dyimgx){var imgvlu = '<br>'+dyimg;}else{var imgvlu = '<br>'+dyimg;}
		;}else{
			if(document.URL.indexOf('pj=') !== -1){if(dyimgx.indexOf('http') === -1){var path = '../panel/'+pj+'/';}else{var path = '';}
			if(dyimg.indexOf('http') === -1){var paths = '../panel/'+pj+'/';}else{var paths = '';};}else{var path='';var paths='';}		
			if(dyimgx){var imgvlu = '<br><img src="'+path+dyimgx+'" style="width:100%"/>';}else if(dyimg){var imgvlu = '<img src="'+paths+dyimg+'" class="calendjs"/>';}
		;}
		;}else{var imgvlu = '';}
		var $sbtnvwsn = $('#'+pgn+'sbtnvwsn'+pn);
		$sbtnvwsn.html('');
		if(dy){var datevlu = dy;}else if(date){var datevlu = date;}else{var datevlu = '';};
		$sbtnvwsn.height(windowHeight*0.8).append(datevlu+'<hr>'+dys+'<hr>'+msg+dyhtmvlu+imgvlu);	
		$('#'+pgn+'sbtnvws'+pn).popup('open');		
	});	

	$('.'+pgn+'lndatn'+pn).click(function (event){event.preventDefault();	
	var $owlmnspgnpn = $('#'+pgn+'owlmns'+pn);
	var d = new Date();var mnh = parseInt($owlmnspgnpn.data("jsmnh"));
	var day = d.getDate();var yr = $owlmnspgnpn.data("jsnyr"); 
	 	owln(d,mnh,day,yr,pgn,pj,pn,wdayn,sat,sun,btnimg,bgarea,btnimgs);	
		$('#'+pgn+'owlcln'+pn).show('slow');//	
	$('html, body').animate({scrollTop: $('#'+pgn+'n'+pn+'n'+$owlmnspgnpn.data("pgdate")).offset().top}, 50);
	$owlmnspgnpn.data("pgdate",'');
	;})	
	
	
	$('#'+pgn+'sbtnssvwsv'+pn).height(windowHeight*0.8);
	$(".vwshgt").height(windowHeight*0.58);
	$(".vwshgts").height(windowHeight*0.7);
	
	$("#"+pgn+"pgtconbtn"+pn).click(function(event) {event.preventDefault();	
	var $pgtconbtns = $("#"+pgn+"pgtconbtns"+pn);
	$pgtconbtns.find('.vws').height(windowHeight*0.8);
	$lndata.popup('close').one( "popupafterclose", function( event, ui ){$pgtconbtns.popup('open',"transition","pop");});

	$('.'+pgn+'btnimg'+pn).each(function() {
		var $this = $(this);
		var btnimg = new Image();
		btnimg.src = $this.attr('ids');
		btnimg.onload =  function(){$this.find('img').attr('src',$this.attr('ids'));$this.find('img').show();$("."+pgn+"btnimgspin").hide();} 
	});
		
	});
	//icon form list - return button
	$("#"+pgn+"pgtconbtns"+pn).find('a').click(function(event) {event.preventDefault();	
	$("#"+pgn+"pgtconbtns"+pn).popup('close').one( "popupafterclose", function( event, ui ){$lndata.popup('open',"transition","pop");});
	});
	
	$("."+pgn+"iconbtn"+pn).click(function(event) {event.preventDefault();	
	var ids = $(this).attr('ids');
	$('#'+pgn+'iconbtns'+pn).html('<span class="pigss-'+ids+'"></span>');
	$('#'+pgn+'icon'+pn).val('pigss-'+ids);
	});
	

	$(document).on("click", "."+pgn+"btnimg"+pn,function (event) {	event.preventDefault();	
	var ids = $(this).attr('ids');
	$('#'+pgn+'imgbtns'+pn).html('<img src="'+ids+'" style="width:35px;height:35px;"/>');
	$('#'+pgn+'btnimgs'+pn).val(ids);
	});	


	
	var clrmdatabtn = $('#'+pgn+'clrmdata'+pn).attr('data-inf');
	if(clrmdatabtn)$('.'+pgn+'clrmdata'+pn).text(clrmdatabtn);
	$(document).on("click", "#"+pgn+'clrmdata'+pn+' a:eq(1)',function (event) {		event.preventDefault();		
	var $clrmdata = $('#'+pgn+'clrmdata'+pn);
		var mm = $clrmdata.find('select').val();
		var yy = $clrmdata.find('input').val();
		if($('#'+pgn+'clrmdata'+pn+' select')[0].selectedIndex == 0){alert('MM?');return false;}
		if(!/^\d{4}$/.test(yy)){alert('YYYY? e.g. 2015');var yy ='';$clrmdata.find('input').focus();return false;}
		

		if($('#'+pgn+'clrmdata'+pn+' select')[1].selectedIndex == 1){
		localStorage.removeItem(pgn+'dy'+pn+'n'+yy+'-'+mm+'s');
		}else{
		localStorage.removeItem(pgn+'dy'+pn+'n'+yy+'-'+mm);
		;}
		//Object.keys(localStorage).forEach(function(key){
		 //if(key.indexOf(pgn+'dy'+pn+'n'+yy+'-'+mm+'-')==0){localStorage.removeItem(key);}
       	//});
		
			
		$clrmdata.find('select')[0].selectedIndex = 0;$clrmdata.find('select')[1].selectedIndex = 0;
		$clrmdata.find('select').selectmenu("refresh");
		$clrmdata.find('input').val('');
		
		var $owlmnspgnpn = $('#'+pgn+'owlmns'+pn);	
		var $owlspgnpn = $('#'+pgn+'owls'+pn);
		$owlspgnpn.hide('slow');$owlspgnpn.html('');$owlspgnpn.show('slow');
		var d = new Date();var mnh = parseInt($owlmnspgnpn.data("jsmnh"));
		var day = d.getDate();var yr = $owlmnspgnpn.data("jsnyr"); 
		owln(d,mnh,day,yr,pgn,pj,pn,wdayn,sat,sun,btnimg,bgarea,btnimgs);
	});	
	
	$('#'+pgn+'nphoto'+pn).click(function(event) {event.preventDefault();	
	sessionStorage['appcamera'] = 'calendar';
	sessionStorage['appcamerause'] = '#'+pgn+'imgbtns'+pn;
	});
}


function apps(pgn,pj,pn,url,d,mnh,day,yr,wdayn,sat,sun,btnimg,bgarea,btnimgs,ftnjsclv){
		var jsclv = localStorage.getItem(pgn+'dyjsclv'+pn);if(jsclv){jsclv = JSON.parse(jsclv);}else{var jsclv =[];jsclv[0]=0;jsclv[1]=0;jsclv[2]=0;}
		if(!jsclv[2]){
		$.mobile.loading( "show", { text: "loading...", textVisible: true,theme: "a",html: ""});
		$.ajax({
   		type: 'GET',
    	url: url,
    	async: false,
    	jsonpCallback: 'datp',
    	contentType: 'application/json',
    	dataType: 'jsonp',
        success: datp});
		
		function datp(data) { 
		var nYYMM = []; var njn = []; 
			for(var i=0; i < data.btn.length; i++) {
				nYYMM[i] = data.btn[i].YYMM;
				njn[i] = data.btn[i].jn;
			;}

		
		for(var i=0; i < nYYMM.length; i++) {
			if(nYYMM[i].length < 15 && njn[i].length < 350000){
		 	 		localStorage.setItem(pgn+"dy"+pn+'n'+nYYMM[i],njn[i]);		
			;}
		;}
		jsclv.splice(2,1,1);localStorage.setItem(pgn+'dyjsclv'+pn,JSON.stringify(jsclv));
		
		if(!ftnjsclv)owln(d,mnh,day,yr,pgn,pj,pn,wdayn,sat,sun,btnimg,bgarea,btnimgs);
		
		$.mobile.loading( "hide");
		;}//function datp(data)
		;}else{//if(!jsclv[2]){
			if(!ftnjsclv)owln(d,mnh,day,yr,pgn,pj,pn,wdayn,sat,sun,btnimg,bgarea,btnimgs);
		;}
		
;}

function jsclv(pgn,pj,pn,ints,url,d,mnh,day,yr,wdayn,sat,sun,btnimg,bgarea,btnimgs){
		$.ajax({
   		type: 'GET',
    	url: ints,
    	async: false,
    	jsonpCallback: 'datp',
    	contentType: 'application/json',
    	dataType: 'jsonp',
        success: dapts});
		function dapts(data) { var jsclv = localStorage.getItem(pgn+'dyjsclv'+pn);if(jsclv){jsclv = JSON.parse(jsclv);}else{var jsclv =[];jsclv[0]=0;}
	
		if(data.btn[0].jsclv > jsclv[0] || jsclv.length==1){
				 if(jsclv.length>1){	
				 	jsclv[0]= data.btn[0].jsclv;jsclv[1]= data.btn[0].update;jsclv[3]= jsclv[2];jsclv[2]= data.btn[0].rmd;
				 }else{
				 	jsclv[0]= data.btn[0].jsclv;jsclv[1]= data.btn[0].update;jsclv[2]= data.btn[0].rmd;jsclv[3]= data.btn[0].rmd;
				 ;}
				 localStorage.setItem(pgn+'dyjsclv'+pn,JSON.stringify(jsclv));
				 var vp = 1;
			;}else{
				 var vp = '';owln(d,mnh,day,yr,pgn,pj,pn,wdayn,sat,sun,btnimg,bgarea,btnimgs);
			}
		if(vp){
		$.mobile.loading( "show", { text: "loading...", textVisible: true,theme: "a",html: ""});	
		$.ajax({
   		type: 'GET',
    	url: url,
    	async: false,
    	jsonpCallback: 'datp',
    	contentType: 'application/json',
    	dataType: 'jsonp',
        success: datp});
		
		function datp(data) { 
		var nYYMM = []; var njn = []; 
			for(var i=0; i < data.btn.length; i++) {
				nYYMM[i] = data.btn[i].YYMM;
				njn[i] = data.btn[i].jn;
			;}

		
		for(var i=0; i < nYYMM.length; i++) {
			if(nYYMM[i].length < 15 && njn[i].length < 350000){
		 	 		localStorage.setItem(pgn+"dy"+pn+'n'+nYYMM[i],njn[i]);		
			;}
		;}//for(var
		
		owln(d,mnh,day,yr,pgn,pj,pn,wdayn,sat,sun,btnimg,bgarea,btnimgs);

		$.mobile.loading( "hide");		
		;}//function datp(data)
		;}//if(vp){
		;}//function dapts(data)

		
;}