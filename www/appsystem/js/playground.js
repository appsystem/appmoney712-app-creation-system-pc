/*AppMoney712 APP Creation System || 01 - AUG -2015 || Copyright LEE WAI KWOK(JSTRUST CONSULTANCY) || license - Revised MIT.*/
function rps(pgn,pn,ply,plys){ 
	if(!ply)var ply = 'blue';if(!plys)var plys = 'red';
	var styclr = '';var nbrclick = '';var nbrclicks = '';var styclrs= '';
$("#"+pgn+"player1"+pn).click(function(event){event.preventDefault();var rlt = '';var vlu = Math.ceil(Math.random() * 30);
		nbrclick++;
		if(nbrclick/2==parseInt(nbrclick/2)){styclr = 'style="color:'+ply+'"';}else{styclr = 'style="color:'+plys+'"';}
		if(vlu <= 10){rlt = '<span class="rps-rock" '+styclr+'></span>';}else if(vlu > 10 && vlu <= 20){rlt = '<span class="rps-scissors" '+styclr+'></span>';}else if(vlu > 20 && vlu <= 30){rlt = '<span class="rps-paper" '+styclr+'></span>';}
		$("#"+pgn+"vlua"+pn).html(rlt);});
		
		$("#"+pgn+"player2"+pn).click(function(event){event.preventDefault();var rlt = '';var vlu = Math.ceil(Math.random() * 30);
		nbrclicks++;
		if(nbrclicks/2==parseInt(nbrclicks/2)){styclrs = 'style="color:'+plys+'"';}else{styclrs = 'style="color:'+ply+'"';}
		if(vlu <= 10){rlt = '<span class="rps-rock" '+styclrs+'></span>';}else if(vlu > 10 && vlu <= 20){rlt = '<span class="rps-scissors" '+styclrs+'></span>';}else if(vlu > 20 && vlu <= 30){rlt = '<span class="rps-paper" '+styclrs+'</span>';}
		$("#"+pgn+"vlub"+pn).html(rlt);});
}


function bigger(pgn,pn,tm,ply,plys){
	var styclr = '';var nbrclick = '';var nbrclicks = '';var styclrs= '';
	if(!ply)var ply = 'black';if(!plys)var plys = 'red';
	setInterval(function() {
	var tms = Math.ceil(Math.random() * tm);
	$('#'+pgn+'player1'+pn).text(tms);},150);
	setInterval(function() {
	var tms = Math.ceil(Math.random() * tm);
	$('#'+pgn+'player2'+pn).text(tms);},150);
	
	$("#"+pgn+"player1"+pn).click(function(event){event.preventDefault();var valu = Math.ceil(Math.random() * tm); 
		nbrclick++;
		if(nbrclick/2==parseInt(nbrclick/2)){styclr = 'style="color:'+ply+'"';}else{styclr = 'style="color:'+plys+'"';}
							$("#"+pgn+"vlua"+pn).html('<span '+styclr+'>'+valu+'</span>');});
	$("#"+pgn+"player2"+pn).click(function(event){event.preventDefault();var vblu = Math.ceil(Math.random() * tm);
		nbrclicks++;
		if(nbrclicks/2==parseInt(nbrclicks/2)){styclrs = 'style="color:'+plys+'"';}else{styclrs = 'style="color:'+ply+'"';}
							$("#"+pgn+"vlub"+pn).html('<span '+styclrs+'>'+vblu+'</span>');});
}

function play(pgn,pj,pn,nbr,tm,nm,word,ply,plys){
	if(!word)var word = 'Gift ';if(!ply)var ply = 'blue';if(!plys)var plys = 'red';
	setInterval(function() {
	var tms = Math.ceil(Math.random() * tm);
	$('#'+pgn+'player1'+pn).text(tms);},150);
	
	setInterval(function() {
	var tms = Math.ceil(Math.random() * tm);
	$('#'+pgn+'player2'+pn).text(tms);},150);
	var imga =''; var imgb =''; var nbrclick = '';var nbrclicks = '';var styclr= '';var styclrs= '';var img ='';
	var width = $(window).width()*0.3;
	if(document.URL.indexOf('pj=') !== -1){var path = '../panel/'+pj+'/';}else{var path = '';}
	$("#"+pgn+"player1"+pn).click(function(event){event.preventDefault();var valu = Math.ceil(Math.random() * tm); 
	nbrclick++;
		if(nbrclick/2==parseInt(nbrclick/2)){styclr = 'style="color:'+plys+'"';}else{styclr = 'style="color:'+ply+'"';}
					if(nm){
					if(valu > nbr){img = '<span class="pigss-gifts" '+styclr+'></span><BR><img style="width:'+width+'px" src="'+path+'images/'+nm+'.gif"/>';}else{img = '<span class="pigss-gifts" '+styclr+'></span><BR><img style="width:'+width+'px" src="'+path+'images/'+nm+valu+'.gif"/>';}
					;}else{							
					if(valu > nbr){img = '<span class="pigss-gifts" '+styclr+'></span><BR><span '+styclr+' class="playdw">---</span>';}else{img = '<span class="pigss-gifts" '+styclr+'></span><BR><span '+styclr+' class="playdw">'+word+' '+nm+valu+'</span>';}
					;}
							$("#"+pgn+"vlua"+pn).html(img);});
	$("#"+pgn+"player2"+pn).click(function(event){event.preventDefault();var vblu = Math.ceil(Math.random() * tm);
	nbrclicks++;
		if(nbrclicks/2==parseInt(nbrclicks/2)){styclrs = 'style="color:'+ply+'"';}else{styclrs = 'style="color:'+plys+'"';}
					if(nm){
					if(vblu > nbr){imgb = '<span class="pigss-gifts" '+styclrs+'></span><BR><img style="width:'+width+'px" src="'+path+'images/'+nm+'.gif"/>';}else{imgb = '<span class="pigss-gifts" '+styclrs+'></span><BR><img style="width:'+width+'px" src="'+path+'images/'+nm+vblu+'.gif"/>';}	
					;}else{
					if(vblu > nbr){imgb = '<span class="pigss-gifts" '+styclrs+'></span><BR><span '+styclrs+' class="playdw">---</span>';}else{imgb = '<span class="pigss-gifts" '+styclrs+'></span><BR><span '+styclrs+' class="playdw">'+word+' '+nm+vblu+'</span>';}
					;}
							$("#"+pgn+"vlub"+pn).html(imgb);});
}