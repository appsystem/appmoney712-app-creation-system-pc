/*AppMoney712 APP Creation System || 01 - AUG -2015 || Copyright LEE WAI KWOK(JSTRUST CONSULTANCY) || license - Revised MIT.*/
function webform(pgn,pn,wdatn,windowHeight){    
var today = new Date();
var yyyy = today.getFullYear();
var mm = today.getMonth()+1;if(mm<10)mm = '0'+mm;
var dd = today.getDate();if(dd<10)dd = '0'+dd;
var hh = 0;var hhmm = 0;var hhH = 0;var hHmm = 0;var AMPM = '';
var $inptdate = $("#"+pgn+"inptdate"+pn);

//var windowHeight = $(window).height();
$("#"+pgn+"ddretrdtns"+pn).height(windowHeight*0.84);
//$("#"+pgn+"ddretrdtn"+pn).height(windowHeight*0.84);
//$("#"+pgn+"retrdata"+pn).height(windowHeight*0.84);
$("."+pgn+"multiples"+pn).height(windowHeight*0.85);
$("div."+pgn+"mleqr"+pn).height(windowHeight*0.88);

$("#"+pgn+"form"+pn).find("."+pgn+"datebtn"+pn).on('click',function (){var $this = $(this);if(!hh)hh = '0';if(!hhmm)hhmm = '0';if(!hhH)hhH = '0';if(!hHmm)hHmm = '0';
	$inptdate.find(".ui-icon-edit:first").text(yyyy+'-'+mm+'-'+dd);$inptdate.find(".ui-icon-edit:eq(1)").text(' '+hh+hhH+':'+hhmm+hHmm);
	$inptdate.data('data-form',$this.attr('data-form'));
	if($this.attr('data-wday')){
	$inptdate.data('daysOfWeek',['星期日 Sunday', '星期一 Monday', '星期二 Tuesday', '星期三 Wednesday', '星期四 Thursday', '星期五 Friday', '星期六 Saturday']);
	wday = 1;
	}else{
	$inptdate.data('daysOfWeek',['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday']);
	wday = '';
	}
});


$inptdate.find(".ui-icon-edit:first").on('click',function (){
	$("#"+$inptdate.data('data-form')).val($(this).text());
	$inptdate.popup('close');
});

$inptdate.find(".ui-icon-edit:eq(1)").on('click',function (){
	$("#"+$inptdate.data('data-form')).val($inptdate.find(".ui-icon-edit:first").text()+' '+$(this).text());
	$inptdate.popup('close');
});

$inptdate.find(".ui-icon-plus:first").on('click',function (){
	yyyy = yyyy+1;
	var ltdy = new Date(yyyy,parseInt(mm), 0).getDate();
	if(dd >= ltdy)dd= ltdy;
	$inptdate.find(".ui-icon-edit:first").text(yyyy+'-'+mm+'-'+dd);
	var weekday = new Date(yyyy,parseInt(mm)-1,dd).getDay();
	var daysOfWeek = $inptdate.data('daysOfWeek');
	weekday = daysOfWeek[weekday];
	$("#"+pgn+"inptdatewday"+pn).text(yyyy+'-'+mm+'-'+dd+' '+weekday);
});

$inptdate.find(".ui-icon-minus:first").on('click',function (){
	yyyy = yyyy-1;
	var ltdy = new Date(yyyy,parseInt(mm), 0).getDate();
	if(dd >= ltdy)dd= ltdy;
	$inptdate.find(".ui-icon-edit:first").text(yyyy+'-'+mm+'-'+dd);
	var weekday = new Date(yyyy,parseInt(mm)-1,dd).getDay();
	var daysOfWeek = $inptdate.data('daysOfWeek');
	weekday = daysOfWeek[weekday];
	$("#"+pgn+"inptdatewday"+pn).text(yyyy+'-'+mm+'-'+dd+' '+weekday);
});

$inptdate.find(".ui-icon-plus:eq(1)").on('click',function (){
	mm = parseInt(mm)+1;
	if(mm<10)mm = '0'+mm;
	if(mm > 12){yyyy = yyyy+1;mm= '01';}
	var ltdy = new Date(yyyy,parseInt(mm), 0).getDate();
	if(dd >= ltdy)dd= ltdy;
	$inptdate.find(".ui-icon-edit:first").text(yyyy+'-'+mm+'-'+dd);
	var weekday = new Date(yyyy,parseInt(mm)-1,dd).getDay();
	var daysOfWeek = $inptdate.data('daysOfWeek');
	weekday = daysOfWeek[weekday];
	$("#"+pgn+"inptdatewday"+pn).text(yyyy+'-'+mm+'-'+dd+' '+weekday);
});

$inptdate.find(".ui-icon-minus:eq(1)").on('click',function (){
	mm = parseInt(mm)-1;
	if(mm<10)mm = '0'+mm;
	if(mm < 1){yyyy = yyyy-1;mm= '12';}
	var ltdy = new Date(yyyy,parseInt(mm), 0).getDate();
	if(dd >= ltdy)dd= ltdy;
	$inptdate.find(".ui-icon-edit:first").text(yyyy+'-'+mm+'-'+dd);
	var weekday = new Date(yyyy,parseInt(mm)-1,dd).getDay();
	var daysOfWeek = $inptdate.data('daysOfWeek');
	weekday = daysOfWeek[weekday];
	$("#"+pgn+"inptdatewday"+pn).text(yyyy+'-'+mm+'-'+dd+' '+weekday);
});

$inptdate.find(".ui-icon-plus:eq(2)").on('click',function (){
	dd = parseInt(dd)+1;
	if(dd<10)dd = '0'+dd;
	var ltdy = new Date(yyyy,parseInt(mm), 0).getDate();
	if(dd > ltdy){dd= '01';mm = parseInt(mm)+1; }
	if(mm<10 && dd == '01')mm = '0'+mm;
	if(mm==13)mm = '01';
	if(mm == '01' && dd == '01')yyyy = yyyy+1;
	$inptdate.find(".ui-icon-edit:first").text(yyyy+'-'+mm+'-'+dd);
	var weekday = new Date(yyyy,parseInt(mm)-1,dd).getDay();
	var daysOfWeek = $inptdate.data('daysOfWeek');
	weekday = daysOfWeek[weekday];
	$("#"+pgn+"inptdatewday"+pn).text(yyyy+'-'+mm+'-'+dd+' '+weekday);
});

$inptdate.find(".ui-icon-minus:eq(2)").on('click',function (){
	dd = parseInt(dd)-1;
	if(dd<10)dd = '0'+dd;
	var ltdy = new Date(yyyy,parseInt(mm)-1, 0).getDate();
	if(dd=='00'){if(ltdy<10)ltdy = '0'+ltdy;dd = ltdy;mm = parseInt(mm)-1;}
	if(mm<10 && dd == ltdy)mm = '0'+mm;
	if(mm=='00')mm = '12';
	if(mm == '12' && dd == '31')yyyy = yyyy-1;
	$inptdate.find(".ui-icon-edit:first").text(yyyy+'-'+mm+'-'+dd);
	var weekday = new Date(yyyy,parseInt(mm)-1,dd).getDay();
	var daysOfWeek = $inptdate.data('daysOfWeek');
	weekday = daysOfWeek[weekday];
	$("#"+pgn+"inptdatewday"+pn).text(yyyy+'-'+mm+'-'+dd+' '+weekday);
});







$inptdate.find(".ui-icon-plus:eq(3)").on('click',function (){
	hh = parseInt(hh)+1;if(hh>2)hh = 0;
	if(hh<1)hh = '0';
	if(hh==2){if(hhH>3)hhH = 3;}
	$inptdate.find(".ui-icon-edit:eq(1)").text(' '+hh+hhH+':'+hhmm+hHmm);
	AMPM = parseInt(hh+''+hhH);
	if(AMPM<12){if(wday){AMPM = '上午 a.m.';}else{AMPM = 'a.m.';}$('#'+pgn+'inptpAMAM'+pn).text(AMPM);$('#'+pgn+'inptpPMPM'+pn).text('');}
	else{if(wday){AMPM = '下午 p.m.';}else{AMPM = 'p.m.';}$('#'+pgn+'inptpAMAM'+pn).text('');$('#'+pgn+'inptpPMPM'+pn).text(AMPM);}	
});

$inptdate.find(".ui-icon-minus:eq(3)").on('click',function (){
	hh = parseInt(hh)-1;if(hh<0)hh = 2;
	if(hh<1)hh = '0';
	if(hh==2){if(hhH>3)hhH = 3;}
	$inptdate.find(".ui-icon-edit:eq(1)").text(' '+hh+hhH+':'+hhmm+hHmm);
	AMPM = parseInt(hh+''+hhH);
	if(AMPM<12){if(wday){AMPM = '上午 a.m.';}else{AMPM = 'a.m.';}$('#'+pgn+'inptpAMAM'+pn).text(AMPM);$('#'+pgn+'inptpPMPM'+pn).text('');}
	else{if(wday){AMPM = '下午 p.m.';}else{AMPM = 'p.m.';}$('#'+pgn+'inptpAMAM'+pn).text('');$('#'+pgn+'inptpPMPM'+pn).text(AMPM);}	
});


$inptdate.find(".ui-icon-plus:eq(4)").on('click',function (){
	hhH = parseInt(hhH)+1;if(hhH>9)hhH = 0;
	if(hh==2){if(hhH>3)hhH = 0;if(hhH>3)hhH = 3;}
	if(hhH<1)hhH = '0';
	$inptdate.find(".ui-icon-edit:eq(1)").text(' '+hh+hhH+':'+hhmm+hHmm);
	AMPM = parseInt(hh+''+hhH);
	if(AMPM<12){if(wday){AMPM = '上午 a.m.';}else{AMPM = 'a.m.';}$('#'+pgn+'inptpAMAM'+pn).text(AMPM);$('#'+pgn+'inptpPMPM'+pn).text('');}
	else{if(wday){AMPM = '下午 p.m.';}else{AMPM = 'p.m.';}$('#'+pgn+'inptpAMAM'+pn).text('');$('#'+pgn+'inptpPMPM'+pn).text(AMPM);}		
});

$inptdate.find(".ui-icon-minus:eq(4)").on('click',function (){
	hhH = parseInt(hhH)-1;if(hhH<0)hhH = 9;
	if(hh==2){if(hhH<0)hhH = 3;if(hhH>3)hhH = 3;}
	if(hhH<1)hhH = '0';
	$inptdate.find(".ui-icon-edit:eq(1)").text(' '+hh+hhH+':'+hhmm+hHmm);	
	AMPM = parseInt(hh+''+hhH);
	if(AMPM<12){if(wday){AMPM = '上午 a.m.';}else{AMPM = 'a.m.';}$('#'+pgn+'inptpAMAM'+pn).text(AMPM);$('#'+pgn+'inptpPMPM'+pn).text('');}
	else{if(wday){AMPM = '下午 p.m.';}else{AMPM = 'p.m.';}$('#'+pgn+'inptpAMAM'+pn).text('');$('#'+pgn+'inptpPMPM'+pn).text(AMPM);}		
});

$inptdate.find(".ui-icon-plus:eq(5)").on('click',function (){
	hhmm = parseInt(hhmm)+1;if(hhmm>5)hhmm = 0;
	if(hhmm<1)hhmm = '0';
	$inptdate.find(".ui-icon-edit:eq(1)").text(' '+hh+hhH+':'+hhmm+hHmm);
	AMPM = parseInt(hh+''+hhH);
	if(AMPM<12){if(wday){AMPM = '上午 a.m.';}else{AMPM = 'a.m.';}$('#'+pgn+'inptpAMAM'+pn).text(AMPM);$('#'+pgn+'inptpPMPM'+pn).text('');}
	else{if(wday){AMPM = '下午 p.m.';}else{AMPM = 'p.m.';}$('#'+pgn+'inptpAMAM'+pn).text('');$('#'+pgn+'inptpPMPM'+pn).text(AMPM);}		
});

$inptdate.find("a.ui-icon-minus:eq(5)").on('click',function (){
	hhmm = parseInt(hhmm)-1;if(hhmm<0)hhmm = 5;
	if(hhmm<1)hhmm = '0';
	$inptdate.find(".ui-icon-edit:eq(1)").text(' '+hh+hhH+':'+hhmm+hHmm);
	AMPM = parseInt(hh+''+hhH);
	if(AMPM<12){if(wday){AMPM = '上午 a.m.';}else{AMPM = 'a.m.';}$('#'+pgn+'inptpAMAM'+pn).text(AMPM);$('#'+pgn+'inptpPMPM'+pn).text('');}
	else{if(wday){AMPM = '下午 p.m.';}else{AMPM = 'p.m.';}$('#'+pgn+'inptpAMAM'+pn).text('');$('#'+pgn+'inptpPMPM'+pn).text(AMPM);}		
});

$inptdate.find(".ui-icon-plus:eq(6)").on('click',function (){
	hHmm = parseInt(hHmm)+1;if(hHmm>9)hHmm = 0;
	if(hHmm<1)hHmm = '0';
	$inptdate.find(".ui-icon-edit:eq(1)").text(' '+hh+hhH+':'+hhmm+hHmm);
	AMPM = parseInt(hh+''+hhH);
	if(AMPM<12){if(wday){AMPM = '上午 a.m.';}else{AMPM = 'a.m.';}$('#'+pgn+'inptpAMAM'+pn).text(AMPM);$('#'+pgn+'inptpPMPM'+pn).text('');}
	else{if(wday){AMPM = '下午 p.m.';}else{AMPM = 'p.m.';}$('#'+pgn+'inptpAMAM'+pn).text('');$('#'+pgn+'inptpPMPM'+pn).text(AMPM);}		
});

$inptdate.find(".ui-icon-minus:eq(6)").on('click',function (){
	hHmm = parseInt(hHmm)-1;if(hHmm<0)hHmm = 9;
	if(hHmm<1)hHmm = '0';
	$inptdate.find(".ui-icon-edit:eq(1)").text(' '+hh+hhH+':'+hhmm+hHmm);
	AMPM = parseInt(hh+''+hhH);
	if(AMPM<12){if(wday){AMPM = '上午 a.m.';}else{AMPM = 'a.m.';}$('#'+pgn+'inptpAMAM'+pn).text(AMPM);$('#'+pgn+'inptpPMPM'+pn).text('');}
	else{if(wday){AMPM = '下午 p.m.';}else{AMPM = 'p.m.';}$('#'+pgn+'inptpAMAM'+pn).text('');$('#'+pgn+'inptpPMPM'+pn).text(AMPM);}		
});


//----------------function formslt(pgn,pn,tm){ 
	$('.'+pgn+'multiple'+pn).on('click',function (event){
	event.preventDefault();var $this = $(this);
	var popup = $this.attr('data-popup');
	var datnvlu = $this.attr('data-vlu');
	var form = $this.attr('data-form');
	if(popup){
		$('#'+form).val(datnvlu);		
		$(popup).popup('close');
	}else{
		$('#'+form).val(datnvlu);	
	;}
	;})
	
	
	$('.'+pgn+'mlserm'+pn).on('click',function (event){
	event.preventDefault();
	var form = $(this).attr('data-form');
		$('#'+form).val('');		
	;})

//----------------function formsltmlt(pgn,pn,tm){
	$('.'+pgn+'multipln'+pn).on('click',function (event){
	event.preventDefault();$this = $(this);
	var datnvlu = $this.attr('data-vlu');
	var popup = $this.attr('data-popup');
	var form = $this.attr('data-form');
	var tm = form.split('n');
	$multipletm = $('#'+pgn+'multiple'+pn+'n'+tm[1]);
	var nbr = $multipletm.data('nbrv');
	if(nbr){nbr = parseInt(nbr)+1;}else{nbr = '0';}

	
	$multipletm.html($multipletm.html()+' '+'<a href="#" data-nbr="'+nbr+'" data-tm="'+tm[1]+'" id="'+pgn+'mltsltn'+pn+'n'+tm[1]+'s'+nbr+'" class="'+pgn+'mltslt'+pn+' ui-btn ui-btn-inline ui-mini ui-btn-icon-left ui-icon-star">'+datnvlu+'</a>');	
	$multipletm.data('nbrv',nbr);
	var pgnn = $multipletm.data('pgnn');	
	if(pgnn){
	pgnn = JSON.parse(pgnn);pgnn.push(datnvlu);}
	else{pgnn = [];pgnn[0] = datnvlu;}	
	$multipletm.data('pgnn',JSON.stringify(pgnn));	

	$('#'+form).val($('#'+form).val()+' '+datnvlu);
	$(popup).popup('close');		
	;})
	
	$(document).on('click', '.'+pgn+'mltslt'+pn,function (event) {
	event.preventDefault();var $this = $(this);	
	var tm = $this.attr('data-tm');
	var $multiplepnntm = $('#'+pgn+'multiple'+pn+'n'+tm);
	var nbrs = $multiplepnntm.data('nbr');
	if(nbrs)$('#'+pgn+'mltsltn'+pn+'n'+tm+'s'+nbrs).removeClass("ui-icon-check").addClass("ui-icon-star");
	var nbr =  parseInt($this.attr('data-nbr'));
	nbr = nbr || '0';
	$multiplepnntm.data('nbr',nbr);	
	$this.removeClass("ui-icon-star").addClass("ui-icon-check");		
	;})
	
	
		
	$('.'+pgn+'mlelft'+pn).on('click',function (event){
	event.preventDefault();
		var tm = $(this).attr('data-tm');
		var form = pgn+'form'+pn+'n'+tm;
		var $multiplepnntm = $('#'+pgn+'multiple'+pn+'n'+tm);
		var nbr =  parseInt($multiplepnntm.data('nbr'));
		if(nbr){
		var pgnn = JSON.parse($multiplepnntm.data('pgnn'));
		var nbrs = nbr-1;
		$multiplepnntm.data('nbr',nbrs);	
		var nvlu = pgnn[nbrs]; var $mltsltnnbrs = $('#'+pgn+'mltsltn'+pn+'n'+tm+'s'+nbrs);
		var vlu = pgnn[nbr]; var $mltsltnnbr = $('#'+pgn+'mltsltn'+pn+'n'+tm+'s'+nbr);
		nbrs = nbrs || '0';
		pgnn.splice(nbrs,1,vlu);	$mltsltnnbrs.removeClass("ui-icon-star").addClass("ui-icon-check");		
		pgnn.splice(nbr,1,nvlu);	$mltsltnnbr.removeClass("ui-icon-check").addClass("ui-icon-star");
		$multiplepnntm.data('pgnn',JSON.stringify(pgnn));	
		$mltsltnnbr.html(nvlu);
		$mltsltnnbrs.html(vlu);
		var vlut = '';
		var pgs = JSON.parse($multiplepnntm.data('pgnn'));	
		for(var i=0; i<pgs.length;i++){vlut += pgs[i]+' ';}		
		$('#'+form).val(vlut);
		;}	
	;})

	
	$('.'+pgn+'mlergt'+pn).on('click',function (event){
	event.preventDefault();
	var tm = $(this).attr('data-tm');
	var $multiplepnntm = $('#'+pgn+'multiple'+pn+'n'+tm);
	var form = pgn+'form'+pn+'n'+tm;
	var nbrv= $multiplepnntm.data('nbrv');
	var nbr =  parseInt($multiplepnntm.data('nbr'));
	if(nbr!=nbrv){
		var pgnn = JSON.parse($multiplepnntm.data('pgnn'));
		var nbrs = nbr+1;
		if(pgnn[nbrs]){
		$multiplepnntm.data('nbr',nbrs);	
		var nvlu = pgnn[nbrs]; var $mltsltnnbrs = $('#'+pgn+'mltsltn'+pn+'n'+tm+'s'+nbrs);
		var vlu = pgnn[nbr]; var $mltsltnnbr = $('#'+pgn+'mltsltn'+pn+'n'+tm+'s'+nbr);
		pgnn.splice(nbrs,1,vlu);	$mltsltnnbrs.removeClass("ui-icon-star").addClass("ui-icon-check");		
		pgnn.splice(nbr,1,nvlu);	$mltsltnnbr.removeClass("ui-icon-check").addClass("ui-icon-star");
		$multiplepnntm.data('pgnn',JSON.stringify(pgnn));	
		$mltsltnnbr.html(nvlu);
		$mltsltnnbrs.html(vlu);
		var vlut = '';
		var pgs = JSON.parse($multiplepnntm.data('pgnn'));	
		for(var i=0; i<pgs.length;i++){vlut += pgs[i]+' ';}		
		$('#'+form).val(vlut);
		;}
	;}			
	;})

	$('.'+pgn+'mlerm'+pn).on('click',function (event){
	event.preventDefault();
		var tm = $(this).attr('data-tm');
		var $multiplepnntm = $('#'+pgn+'multiple'+pn+'n'+tm);
		var form = pgn+'form'+pn+'n'+tm;
		var nbrv =  $multiplepnntm.data('nbrv');
	
		var pgnn = JSON.parse($multiplepnntm.data('pgnn'));
		var nbr =  parseInt($multiplepnntm.data('nbr'));
		nbr = nbr || 0;
		$('#'+pgn+'mltsltn'+pn+'n'+tm+'s'+nbr).removeClass("ui-icon-check").addClass("ui-icon-star");
		if(pgnn.length>1){
		for(var j=nbr; j<pgnn.length-1;j++){if(!j){$('#'+pgn+'mltsltn'+pn+'n'+tm+'s'+'0').html(pgnn[j+1]);}else{$('#'+pgn+'mltsltn'+pn+'n'+tm+'s'+j).html(pgnn[j+1]);};}	
		;}
		$('#'+pgn+'mltsltn'+pn+'n'+tm+'s'+nbrv).remove();
		pgnn.splice(nbr,1);
		$multiplepnntm.data('nbr','').data('pgnn',JSON.stringify(pgnn));	
		var vlut = '';
		var pgs = JSON.parse($multiplepnntm.data('pgnn'));	
		for(var i=0; i<pgs.length;i++){vlut += pgs[i]+' ';}		
		$('#'+form).val(vlut);
		
		if(!nbrv)nbrv = 1;
		$multiplepnntm.data('nbrv',nbrv-1);
	;})

//----------------function quick(pj,nbr,html){
	//datapgnn = localStorage.getItem(html+pj);
	//if(datapgnn){
	//$('#'+nbr).val(datapgnn);
	//;}


//----------------function retrdata(pgn,pn){
	$('.'+pgn+'retrdtn'+pn).on('click',function (){
		var $retrdtn = $('#'+pgn+'retrdtn'+pn);
		$retrdtn.find('.'+pgn+'ddretrdtn'+pn+':first').hide();
		$retrdtn.find('.'+pgn+'ddretrdtn'+pn+':eq(1)').show();
		
 		var datapgnn = localStorage.getItem(pgn+'form'+pn);
		var js = $(this).attr('data-tm');
		var j = $.inArray(js,wdatn);
		j = j+1;
		var datspgnn = '';
		if(datapgnn)datspgnn = JSON.parse(datapgnn);
		if(datspgnn){
			
			var vlu='';
			for(var i=datspgnn[j].length-1;i>=0;i--){
				if(datspgnn[j][i])vlu +='<a href="#" class="'+pgn+'datp'+pn+' ui-btn ui-btn-a" data-js="'+js+'" data-nbr="'+j+'" style="white-space:normal;" data-vlu="'+datspgnn[j][i]+'">'+datspgnn[j][i]+'</a>';
			;}

		if(vlu)$('#'+pgn+'retrdata'+pn).html(vlu);	
		datspgnn ='';		
		;}
	});	
	$(document).on('click', '.'+pgn+'datp'+pn,function (event) {
		var $this = $(this);
		$('#'+pgn+'form'+pn+'n'+$this.attr('data-js')).val($this.attr('data-vlu'));
		$('#'+pgn+'retrdtn'+pn).popup('close');
	});



//----------------function infnsps(pgn,pn){

//?v= for quick btn
if(window.location.href.indexOf('?d=') > 0){
	if(document.URL.indexOf('pj=') !== -1){
	var vlu = window.location.href.split("d=");
	;}else{
	var vlu = window.location.href.split("?d=");
	;}
	var vls = vlu[1].split("&t=");
	if(vlu[1])$('input:first').val(vls[0]);
	if(vls[1])$('input:eq(1)').val(vls[1]);
;}

//----------------

$(document).on('click', '.'+pgn+'mmv'+pn,function (event) {
		event.preventDefault();
		var ddretrdtn = '';var multiplevlu= '';
		var tm = $(this).attr('data-tm');
		$('#'+pgn+'ddretrdtn'+pn).attr('data-tm',tm);
		var $retrdtn = $('#'+pgn+'retrdtn'+pn);$retrdtn.attr('data-tm',tm);
		var $multiplepnntm = $('#'+pgn+'multiple'+pn+'n'+tm);
		var multiplevlu = $multiplepnntm.data('pgnn');
		if(!$('#'+pgn+'form'+pn+'n'+tm).val() && multiplevlu){multiplevlu = '';$multiplepnntm.data('pgnn','');}// form sent
		if(multiplevlu){
		var multiplevlu = JSON.parse(multiplevlu);
		for(var j=0;j<multiplevlu.length;j++){	
		ddretrdtn +='<div class="dd-item" data-nbr="'+j+'"><a href="#" style="border:none" class="dd-pick ui-btn ui-btn-v ui-btn-inline ui-btn-icon-left ui-icon-ddpick">&nbsp;</a><a href="#" data-nbr="'+j+'" data-tm="'+tm+'" style="white-space:normal;width:85%;border:none;" data-slt="1" class="'+pgn+'ddslt'+pn+' ui-btn ui-btn-v ui-btn-inline ui-btn-icon-left ui-icon-star">'+multiplevlu[j]+'</a></div>';
		}
		}
		if(ddretrdtn){$('#'+pgn+'ddretrdtn'+pn).html(ddretrdtn);}else{$('#'+pgn+'ddretrdtn'+pn).html('');}
		$retrdtn.find('.'+pgn+'ddretrdtn'+pn+':first').show();
		$retrdtn.find('.'+pgn+'ddretrdtn'+pn+':eq(1)').hide();
		$retrdtn.popup('open');
});

$('#'+pgn+'retrdtn'+pn).on("popupafterclose", function( event, ui ) {
	   var htmls = '';var nhtmls = [];var htmlv = '';
	   var $this = $(this);
	   var tm = $this.attr('data-tm');
	   $this.attr('data-tm','');
	   var  $multiplepnntm = $('#'+pgn+'multiple'+pn+'n'+tm);
	   var multiplevlu = JSON.parse($multiplepnntm.data('multiplevlu'));
	   $multiplepnntm.data('multiplevlu','');
	   var jdd = 0;
	   for(var j=0;j<multiplevlu.length;j++){
	   		if(multiplevlu[j]){
			htmls += '<a href="#" data-nbr="'+jdd+'" data-tm="'+tm+'" id="'+pgn+'mltsltn'+pn+'n'+tm+'s'+jdd+'" class="'+pgn+'mltslt'+pn+' ui-btn ui-btn-inline ui-mini ui-btn-icon-left ui-icon-star">'+multiplevlu[j]+'</a>';  
			htmlv += multiplevlu[j]+' ';
			nhtmls.push(multiplevlu[j]);
			jdd++;
			}
	   }
	   if(jdd){
		$multiplepnntm.html(htmls);
		$multiplepnntm.data('pgnn',JSON.stringify(nhtmls));
		$('#'+pgn+'form'+pn+'n'+tm).val(htmlv);
	   }
});

$(document).on('click', '.'+pgn+'ddslt'+pn,function (event) {
		event.preventDefault();
		var $this = $(this);
		var tm = $this.attr('data-tm');var nbr = $this.attr('data-nbr');
		var $multiplepnntm = $('#'+pgn+'multiple'+pn+'n'+tm);
		var multiplevlu = JSON.parse($multiplepnntm.data('pgnn'));
		var slt = $this.attr('data-slt');
		if(slt){
			$this.attr('style', 'border:none;max-width:85%;text-decoration:line-through!important').attr('data-slt','');
			multiplevlu.splice(nbr,1,'');
		}else{
			$this.attr('style', 'white-space:normal;width:85%;border:none;').attr('data-slt',1);
			multiplevlu.splice(nbr,1,$this.html());
		}
		$multiplepnntm.data('multiplevlu',JSON.stringify(multiplevlu));		
});





$('#'+pgn+'ddretrdtn'+pn).on('change', function(){
	var jdd = 0;var nbr = '';var htmls = '';var nhtmls = [];var htmlv = '';var htmlsv = '';
	var $this = $(this);
	var tm = $this.attr('data-tm');
		var $multiplepnntm = $('#'+pgn+'multiple'+pn+'n'+tm);
		var multiplevlu = JSON.parse($multiplepnntm.data('pgnn'));
    $this.find('div').each(function(){
		nbr = $(this).attr('data-nbr');
		htmlsv += '<div class="dd-item" data-nbr="'+jdd+'"><a href="#" style="border:none" class="dd-pick ui-btn ui-btn-v ui-btn-inline ui-btn-icon-left ui-icon-ddpick">&nbsp;</a><a href="#" data-nbr="'+jdd+'" data-tm="'+tm+'" style="white-space:normal;width:85%;border:none;" data-slt="1" class="'+pgn+'ddslt'+pn+' ui-btn ui-btn-v ui-btn-inline ui-btn-icon-left ui-icon-star">'+multiplevlu[nbr]+'</a></div>';  
		htmls += '<a href="#" data-nbr="'+jdd+'" data-tm="'+tm+'" id="'+pgn+'mltsltn'+pn+'n'+tm+'s'+jdd+'" class="'+pgn+'mltslt'+pn+' ui-btn ui-btn-inline ui-mini ui-btn-icon-left ui-icon-star">'+multiplevlu[nbr]+'</a>';  
		htmlv += multiplevlu[nbr]+' ';
		nhtmls.push(multiplevlu[nbr]);
		jdd++;
	});
	if(jdd){
	$this.html(htmlsv);
	$multiplepnntm.html(htmls);
	$multiplepnntm.data('pgnn',JSON.stringify(nhtmls));
	$('#'+pgn+'form'+pn+'n'+tm).val(htmlv);
	}

});	


$('#'+pgn+'form'+pn).find('.imgtitlehgt').each(function(){
		$(this).css('height',$(this).attr('data-hgt')*windowHeight/100);
});

;}
//----------------



function form(pgn,pn,tm,url,location,msg,err,dats,datn,reqsvluht,alrt,typ){

//if(!$('#'+pgn+'form'+pn)[0].checkValidity()){return false;} ;



	if(reqsvluht){
		$alrtsform=$("#"+pgn+"alrtsform"+pn);
		for(var j=0;j<reqsvluht.length;j++){
			if(reqsvluht[j]){
				var $formj = $("#"+pgn+'form'+pn+'n'+datn[j]);
				if(!$formj.val()){
				$("html, body").animate({scrollTop: $formj.offset().top}, 800, function(){
						if(alrt[j]){					
						$("#"+pgn+"alrtform"+pn).html(alrt[j]);
 						$alrtsform.popup('open',"transition","pop");
						$alrtsform.popup({afterclose: function( event, ui ){$formj.focus(); }});
						}
						
				});				
 				return false;
				}
			;}
		;}
	;}
	
	
	var formhtm='';
	var order = $("#"+pgn+'form'+pn).serialize();
		
	var orders = order.split('&');
	
	var datnlength = datn.length;
	if(!localStorage.getItem(pgn+'formt'+pn))localStorage[pgn+'formt'+pn]=datnlength;
	if(document.URL.indexOf('http') !== -1 && datnlength){
	if(localStorage.getItem(pgn+'formt'+pn)!=datnlength){localStorage[pgn+'form'+pn]='';localStorage[pgn+'formt'+pn]=datnlength;}else{localStorage[pgn+'formt'+pn]=datnlength;}
	}
	
	var datapgnn = localStorage.getItem(pgn+'form'+pn);
		
	if(datapgnn){datapgnn =  JSON.parse(datapgnn);}
	else{
		datapgnn =  [""];var apgnn =  [""];
		for(var i=0;i<datn.length;i++){
			datapgnn.push(apgnn);
		}
		localStorage[pgn+'form'+pn] = JSON.stringify(datapgnn);
		datapgnn = localStorage.getItem(pgn+'form'+pn);
		datapgnn =  JSON.parse(datapgnn);
	}
	
	 
	for(var i=0;i<orders.length;i++){
		var datspgnvlu = orders[i].split('=');
		if(!datspgnvlu[1])datspgnvlu[1]='';
		if(dats[i]){datapgnn[i+1].push(decodeURIComponent(datspgnvlu[1].replace(/\+/g,' '),true));if(datapgnn[i+1].length > dats[i])datapgnn[i+1].splice(0,1);}	
		
		if(typ==1 || typ==5)formhtm += '<p>'+decodeURIComponent(datspgnvlu[0].replace(/\+/g,' '),true)+'</p><p><b>'+decodeURIComponent(datspgnvlu[1].replace(/\+/g,' '),true)+'</b></p>';

	;}
	
	if(datapgnn)localStorage[pgn+'form'+pn] = JSON.stringify(datapgnn);
	
	
	if(typ==1){order = formhtm;}else if(typ==5){order = formhtm+'<p>'+order+'</p>';}
			

	$.ajax({
    type: "POST",
    url: url,
    data: { 'order': order },
    cache: false,
    success:function(data){
                //alert(msg);
				//$("#"+pgn+'form'+pn)[0].reset();
				//window.location = location;
				$("input").val('');
				$("textarea").val('');
				$("#"+pgn+'form'+pn).find('.multiplndiv').html('');
				$('#'+pgn+'ddretrdtn'+pn).html('');
            },
            error: function(){
				//alert('error');
				//window.location = location;
            }
    });
	if(msg)alert(msg);

}



function gapform(pgn,pn,tm,url,location,msg,err,dats,datn,subj,reqsvluht,alrt,typ){



	if(reqsvluht){
		$alrtsform=$("#"+pgn+"alrtsform"+pn);
		for(var j=0;j<reqsvluht.length;j++){
			if(reqsvluht[j]){
				var $formj = $("#"+pgn+'form'+pn+'n'+datn[j]);
				if(!$formj.val()){
				$("html, body").animate({scrollTop: $formj.offset().top}, 800, function(){
						if(alrt[j]){					
						$("#"+pgn+"alrtform"+pn).html(alrt[j]);
 						$alrtsform.popup('open');
						$alrtsform.popup({afterclose: function( event, ui ){$formj.focus(); }});
						}
						
				});				
 				return false;
				}
			;}
		;}
	;}
	
	
	var formhtm = '';
	var order = $("#"+pgn+'form'+pn).serialize();
	var orders = order.split('&');

	datnlength = datn.length;
	if(!localStorage.getItem(pgn+'formt'+pn))localStorage[pgn+'formt'+pn]=datnlength;
	if(document.URL.indexOf('http') !== -1 && datnlength){
	if(localStorage.getItem(pgn+'formt'+pn)!=datnlength){localStorage[pgn+'form'+pn]='';localStorage[pgn+'formt'+pn]=datnlength;}else{localStorage[pgn+'formt'+pn]=datnlength;}
	}
	
	var datapgnn = localStorage.getItem(pgn+'form'+pn);
	if(datapgnn){datapgnn =  JSON.parse(datapgnn);}
	else{
		datapgnn =  [""];apgnn =  [""];
		for(var i=0;i<datn.length;i++){
			datapgnn.push(apgnn);
		}
		localStorage[pgn+'form'+pn] = JSON.stringify(datapgnn);
		datapgnn = localStorage.getItem(pgn+'form'+pn);
		datapgnn =  JSON.parse(datapgnn);
	}
	
	for(var i=0;i<orders.length;i++){
		var datspgnvlu = orders[i].split('=');
		if(!datspgnvlu[1])datspgnvlu[1]='';
		if(dats[i]){datapgnn[i+1].push(decodeURIComponent(datspgnvlu[1].replace(/\+/g,' '),true));if(datapgnn[i+1].length > dats[i])datapgnn[i+1].splice(0,1);}	
		
		if(typ==1 || typ==5)formhtm += '<p>'+decodeURIComponent(datspgnvlu[0].replace(/\+/g,' '),true)+'</p><p><b>'+decodeURIComponent(datspgnvlu[1].replace(/\+/g,' '),true)+'</b></p>';
	;}
	
	if(datapgnn)localStorage[pgn+'form'+pn] = JSON.stringify(datapgnn);
	
	if(typ==1){order = formhtm;}else if(typ==5){order = formhtm+'<p>'+order+'</p>';}
	

	cordova.plugins.email.open({
    to:      [url],
    cc:      [''],
    bcc:     [''],
    subject: subj,
    body:    order,
	isHtml:  true,
	},function(){
        $("input").val('');
		$("textarea").val('');
		$("#"+pgn+'form'+pn).find('.multiplndiv').html('');
		$('#'+pgn+'ddretrdtn'+pn).html('');
    });
	//$("#"+pgn+'form'+pn)[0].reset();
	if(msg)alert(msg);

}
