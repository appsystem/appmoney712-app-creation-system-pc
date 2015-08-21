/*AppMoney712 APP Creation System || 01 - AUG -2015 || Copyright LEE WAI KWOK(JSTRUST CONSULTANCY) || license - Revised MIT.*/
function playlistv(pgn,pj,audio,pn,btn,windowHeight){ 
if(btn){var ulHgt = 0.78;}else{var ulHgt = 0.86;}
$('#'+pgn+'playlist'+pn).css('max-height',windowHeight*ulHgt);
//$('#'+pgn+'playlistd'+pn).css('max-height',windowHeight*0.82);
var $audio = $("#"+audio);

if(navigator.userAgent.match(/(Android)/)) {
   $('#'+pgn+'toposapp'+pn).hide();
   $('#'+pgn+'volpp'+pn).hide();
}else if(navigator.userAgent.match(/(iPhone|iPad|iPod)/)) {
   $('#'+pgn+'voln'+pn).hide(); 
   $('#'+pgn+'topos'+pn).hide();
   $('#'+pgn+'volm'+pn).hide();
   $('#'+pgn+'volpp'+pn).hide();
}else{
   $('#'+pgn+'topos'+pn).hide();
   $('#'+pgn+'volm'+pn).hide();
;}

$('#'+pgn+'playlistloop'+pn).click(function(event){event.preventDefault();
	 	if(localStorage.getItem(pgn+"playlistloop"+pn)){
			localStorage.setItem(pgn+"playlistloop"+pn,'');
			$('#'+pgn+'playlistloop'+pn).removeClass("ui-icon-refresh").addClass("ui-icon-minus");

		;}else{
			localStorage.setItem(pgn+"playlistloop"+pn,'1');		
			$('#'+pgn+'playlistloop'+pn).removeClass("ui-icon-minus").addClass("ui-icon-refresh");	
		;}
;})

var istouchs = 'ontouchstart' in window;
var popactions = istouchs ? 'touchend':'mouseup';

document.getElementById(pgn+'topos'+pn).addEventListener(popactions,function(){	
		$audio.prop("currentTime",$('#'+pgn+'toposition'+pn).val()*document.getElementById(audio).duration);
});

document.getElementById(pgn+'volm'+pn).addEventListener(popactions,function(){		
		var volume = $('#'+pgn+'volmn'+pn).val();
		$audio.prop("volume",volume);
});

document.getElementById(pgn+"toposapp"+pn).addEventListener(popactions,function(){	
		$audio.prop("currentTime",$('#'+pgn+'topositionapp'+pn).val()*document.getElementById(audio).duration);
});

document.getElementById(pgn+"volpp"+pn).addEventListener(popactions,function(){		
		var volume = $('#'+pgn+'volmnapp'+pn).val();
		$audio.prop("volume",volume);
});




$('#'+pgn+'topositn'+pn).click(function(event){ 
		event.preventDefault();
		$audio.prop("currentTime",$('#'+pgn+'toposition'+pn).val()*document.getElementById(audio).duration);
});


$('#'+pgn+'voln'+pn).click(function(event){ 
		event.preventDefault();
		var volume = $('#'+pgn+'volmn'+pn).val();
		$audio.prop("volume",volume);
});

$(document).on('click', '.'+pgn+'pausesound'+pn,function (event) {
event.preventDefault();
var playlist = $('#'+pgn+"playinf"+pn).data('playlist');	
$("#"+pgn+"playdur"+pn+'n'+playlist).text('');
$audio.trigger('pause');
$('#'+pgn+"playinf"+pn).data('playlist','').data('status','');	
;})	

function caltm(t){var h = Math.floor(t/3600);if(h){h=(h < 10 ? '0'+h : h)+":";}else{h='';}var m = Math.floor(t/60); var s = Math.round(t - h*3600 - m*60);var duration = h+(m < 10 ? '0'+m : m)+":"+(s < 10 ? '0'+s : s); return duration;}

	function audiotime(attr,pgn,pn){		
		document.getElementById(attr).addEventListener("timeupdate",function(){	
		var nbr = $('#'+pgn+"playinf"+pn).data('playlist');			
		var time = caltm(Math.round(document.getElementById(attr).currentTime));
   		 $("#"+pgn+"playdur"+pn+'n'+nbr).text(time);
		 if(nbr)$("#"+pgn+"playdur"+pn+'n').text(time);
		});
	}
	
$(document).on('click', '.'+pgn+'playaudio'+pn,function (event) {
	event.preventDefault();
	
	var $this = $(this);
	var url = $this.attr('data-url');
	var nbr = $this.attr('data-nbr');
	var $playinf = $('#'+pgn+"playinf"+pn);
	var status = $playinf.data('status');
	var playlist = $playinf.data('playlist');	
	if(playlist && playlist==nbr && status == 'play'){
			$audio.trigger('pause');
			$playinf.data('status','pause');	
	;}else if(playlist && playlist==nbr && status == 'pause'){
			$audio.trigger('play');
			$playinf.data('status','play');	
	;}else{
			$audio.trigger('pause');
			$("#"+pgn+"playdur"+pn+'n'+playlist).text('');
			$playinf.data('playlist',nbr).data('status','play');		
			
			$audio.load(url, function() {
			$audio.attr('src',url);
			//$audio.attr('src',url);
			$audio.trigger('play');})	
			
	;}	
	audiotime(audio,pgn,pn);
;})	

}



function playing(pgn,attr,pn) {
	
		document.getElementById(attr).addEventListener('ended', function(event) {
		var $playinf = $('#'+pgn+"playinf"+pn);
		var nbr = parseInt($playinf.data('playlist'));
		var playlistloop = localStorage.getItem(pgn+"playlistloop"+pn);
		
		if(playlistloop){
		var plistnbr = parseInt(sessionStorage.getItem(pgn+"plistnbr"+pn));
		$("#"+pgn+"playdur"+pn+'n'+nbr).text('');
		if(nbr==plistnbr-1){nbr = '0';}else{nbr = nbr+1;}
		var url = $('#'+pgn+"plistd"+pn+'n'+nbr).attr('data-url');
		$playinf.data('playlist',nbr);	
		var $attr = $("#"+attr);
		$attr.load(url, function() {
			$attr.attr('src',url);
			$attr.trigger('play');	
		})	
		
		audiotime(audio,pgn,pn);
		;}else{
			$playinf.data('status','pause');
			$("#"+attr).trigger('pause');
			
		;}
		},false);
		
}//function

function playlist(pgn,nbr,pn,ints,url,tclr,wsp,imgbg){
		var plistd = localStorage.getItem(pgn+"plistd"+pn);
		if(!plistd){
			var plistds =[0,'',tclr,wsp,imgbg,pgn+'playlist'+pn];
			localStorage.setItem(pgn+"plistd"+pn,JSON.stringify(plistds));}
		$.ajax({
   		type: 'GET',
    	url: ints,
    	async: false,
    	jsonpCallback: 'datp',
    	contentType: 'application/json',
    	dataType: 'jsonp',
        success: dapts});
		function dapts(data) { var jscldv = localStorage.getItem(pgn+'plistd'+pn);if(jscldv){jscldv = JSON.parse(jscldv);}else{var jscldv =[];jscldv[0]=0;}
			if(data.btn[0].jscldv > jscldv[0] || jscldv.length==1){
				 if(jscldv.length>1){	
				 	jscldv.splice(0,1,data.btn[0].jscldv);jscldv.splice(1,1,data.btn[0].update);
				 }else{
				 	jscldv[0]= data.btn[0].jscldv;jscldv[1]= data.btn[0].update;
				 ;}
				 localStorage.setItem(pgn+'plistd'+pn,JSON.stringify(jscldv));
				 var vp = 1;
			;}else{
				var plistd = JSON.parse(localStorage.getItem(pgn+"plistd"+pn));
				sessionStorage.setItem(pgn+"plistnbr"+pn,plistd[6]);
				var $nbr = $('#'+nbr).find('ul');	
				$nbr.append(plistd[7]);if(imgbg)$nbr.find('li > a').css('border','');$nbr.listview('refresh');
				 var vp = '';
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
	    	
			if(JSON.stringify(data.btn).length < 750000){
	
		var html ='';
		
		var datn = JSON.parse(localStorage.getItem(pgn+"plistd"+pn));
		
		if(datn[2]){var datntclr= 'color:'+datn[2]+';';}else{ var datntclr = '';}
		if(datn[3]){var datnwsp = 'white-space:normal;';}else{ var datnwsp = '';}
		if(datn[4]){var datnimgbg = 'background-color:'+datn[4]+';';}else{ var datnimgbg = '';}
		var j = 0;var js ='';var tclr = '';var imgbg= ''; var msgHTML= ''; var viconHTML= ''; var vdaiconHTML= ''; var imgHTML= '';
		for(var i=0; i < data.btn.length; i++) {
			if(data.btn[i].tclr){tclr = 'color:'+data.btn[i].tclr+';';}else{tclr = datntclr;}
			if(data.btn[i].imgbg){imgbg = 'background-color:'+data.btn[i].imgbg+';';imgbgs=1;}else{imgbg = datnimgbg;}
			if(data.btn[i].msg){msgHTML = '<p>'+data.btn[i].msg+'</p>';}else{msgHTML = '';}
			if(data.btn[i].icon){viconHTML = "<span style='color:"+data.btn[i].ticon+"' class='"+data.btn[i].icon+"'></span>";}else{viconHTML = '';}
			if(data.btn[i].daicon){vdaiconHTML = data.btn[i].daicon;}
			else{ if(data.btn[i].url=='control'){vdaiconHTML = 'grid';}else if(data.btn[i].url=='stop'){vdaiconHTML = 'pausesound';}else if(data.btn[i].url.indexOf('.php')!==-1 || data.btn[i].url.indexOf('.html')!==-1 || data.btn[i].url.indexOf('.gif')!==-1 || data.btn[i].url.indexOf('player.vimeo.com')!==-1 || data.btn[i].url.indexOf('youtu.be')!==-1 || data.btn[i].url.indexOf('v.qq.com')!==-1){vdaiconHTML = 'tag';}else{vdaiconHTML = 'audio';};}
			if(data.btn[i].img){imgHTML = "<img src='"+data.btn[i].img+"'>";}else{imgHTML = '';}
			
			if(data.btn[i].url=='control'){
				html += "<li data-icon='"+vdaiconHTML+"'><a href='#"+pgn+'playcontro'+pn+"' class='"+pgn+'playcontro'+pn+"' data-rel='popup' style='border:none;"+tclr+datnwsp+imgbg+"'>"+imgHTML+'<h2> '+viconHTML+' '+data.btn[i].title+'</h2>'+data.btn[i].msg+'</a></li>';
				if(!js)j=i;js=1;}
			else if(data.btn[i].url=='stop'){
				html += "<li data-icon='"+vdaiconHTML+"'><a href='#' class='"+pgn+'pausesound'+pn+"' style='border:none;"+tclr+datnwsp+imgbg+'">'+imgHTML+'<h2> '+viconHTML+' '+data.btn[i].title+'</h2>'+data.btn[i].msg+'</a></li>';
				if(!js)j=i;js=1;}
			else if(data.btn[i].url.indexOf('[popup].mp3')!==-1 || data.btn[i].url.indexOf('[popup].wav')!==-1 || data.btn[i].url.indexOf('.php')!==-1  || data.btn[i].url.indexOf('.asp')!==-1 || data.btn[i].url.indexOf('.html')!==-1  || data.btn[i].url.indexOf('.htm')!==-1 || data.btn[i].url.indexOf('.jpg')!==-1 || data.btn[i].url.indexOf('.gif')!==-1 || data.btn[i].url.indexOf('player.vimeo.com')!==-1 || data.btn[i].url.indexOf('youtu.be')!==-1 || data.btn[i].url.indexOf('v.qq.com')!==-1){
				html += "<li data-icon='"+vdaiconHTML+"'><a href='#' class='imgspop' data-pop='"+pgn+"' style='border:none;"+tclr+datnwsp+imgbg+"' data-url='"+data.btn[i].url+"'>"+imgHTML+'<h2> '+viconHTML+' '+data.btn[i].title+'</h2>'+data.btn[i].msg+'</a></li>';
				if(!js)j=i;js=1;}
			else{
				js ='';
				html += "<li data-icon='"+vdaiconHTML+"'><a href='#' id='"+pgn+'plistd'+pn+'n'+j+"' class='"+pgn+'playaudio'+pn+"' style='border:none;"+tclr+datnwsp+imgbg+"' data-nbr='"+j+"' data-url='"+data.btn[i].url+"'>"+imgHTML+"<h2><span id='"+pgn+'playdur'+pn+'n'+j+"'></span> "+viconHTML+' '+data.btn[i].title+'</h2>'+data.btn[i].msg+'</a></li>';
			j++;}
		;}//for(var
		sessionStorage.setItem(pgn+"plistnbr"+pn,j);
		var plists = JSON.parse(localStorage.getItem(pgn+"plistd"+pn));
		plists.splice(6,1,j);plists.splice(7,1,html);localStorage.setItem(pgn+'plistd'+pn,JSON.stringify(plists));
		var $nbr = $('#'+nbr).find('ul');
		$nbr.append(html);
		if(imgbg)$nbr.find('li > a').css('border',''); 
		$nbr.listview('refresh');
		$.mobile.loading( "hide");
		;}//if(JSON.stringify
		;}//function datp(data)
		;}//if(localStorage.getItem(pgn+'jsclds'+pn)){
		;}//function dapts(data)		
;}
