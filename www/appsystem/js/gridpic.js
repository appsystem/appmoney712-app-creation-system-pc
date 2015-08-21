/*AppMoney712 APP Creation System || 01 - AUG -2015 || Copyright LEE WAI KWOK(JSTRUST CONSULTANCY) || license - Revised MIT.*/
function gridpic(pgn,pn,sizewidw,sizeheigw,typ,windowWidth,windowHeight){ 

//var windowWidth = $(window).width();var windowHeight =  $(window).height(); 
var sizewidw = sizewidw*0.95;
var sizeheigw = sizeheigw*0.95;
var widw = windowWidth *0.95;
var heigw = windowHeight*0.95;
var $ifrimg = $("#"+pgn+"ifrimg"+pn);
var $ifrimgimg = $("#"+pgn+"ifrimg"+pn).find('img');
var $gridppop = $("#"+pgn+"gridppop"+pn);
var $gridimg = $("#"+pgn+"gridimg"+pn);
var $gridimgs = $("#"+pgn+"gridimgs"+pn);
var $gridppops = $("#"+pgn+"gridppops"+pn);

if(typ){
	var gridpicjss = localStorage.getItem(pgn+'gridpicjss'+pn);
	if(gridpicjss){
		var gridpicjss = JSON.parse(gridpicjss);
		var j =0;
		$gridimgs.find('.'+pgn+'gridpics'+pn).each(function(){
		$("img",this).attr("src",gridpicjss[0][j]);
		$(this).attr("data-url",gridpicjss[1][j]).attr("data-title",gridpicjss[2][j]).attr("data-tclr",gridpicjss[3][j]).attr("data-bg",gridpicjss[4][j]);
		j++;
		});
	}
	var gridpicjs = localStorage.getItem(pgn+'gridpicjs'+pn);
	if(gridpicjs){
		var gridpicjs = JSON.parse(gridpicjs);
		if(gridpicjs[2]>0)var sizewidw = gridpicjs[2];if(gridpicjs[3]>0)var sizeheigw = gridpicjs[3];
	;}
;}




if( sizewidw < widw && sizeheigw < heigw && sizeheigw && sizewidw){
	$gridppop.width(sizewidw).data("WDHsize",sizewidw).data("HGTsize",sizeheigw);
	//$gridppops.height(sizeheigw);
	$ifrimg.width(sizewidw).height(sizeheigw);
	//$gridimgs.height(windowHeight*0.95);
	$("#"+pgn+"gridpict"+pn).width(sizewidw);		
}else if( ( sizewidw / widw ) > ( sizeheigw / heigw ) && sizeheigw && sizewidw){
	$gridppop.data("WDHsize",widw).data("HGTsize",( widw / sizewidw ) * sizeheigw);
	$ifrimg.width(widw).height(( widw / sizewidw ) * sizeheigw);
;}else{
	$gridppop.data("WDHsize",( heigw / sizeheigw ) * sizewidw).data("HGTsize",heigw);
	$ifrimg.width(( heigw / sizeheigw ) * sizewidw).height(heigw);
};
						
	$gridimg.find("."+pgn+"gridpics"+pn).click(function (event){
		event.preventDefault();
		
		if( sizewidw < widw && sizeheigw < heigw && sizeheigw && sizewidw){	
			$ifrimgimg.width(sizewidw).height(sizeheigw);$gridppop.data("enlarg",'');
		}else if( ( sizewidw / widw ) > ( sizeheigw / heigw ) && sizeheigw && sizewidw){
			$ifrimgimg.width(widw).height(( widw / sizewidw ) * sizeheigw);$gridppop.data("enlarg",'');
		;}else{
			$ifrimgimg.width(( heigw / sizeheigw ) * sizewidw).height(heigw);$gridppop.data("enlarg",'');
		};
		
		var $this = $(this);
		$gridppops.popup('open');
		var ifrImghrf = new Image();
		$ifrspinndiv = $("#"+pgn+"gridppops"+pn).find('div.ifrspinn');
		$ifrspinndiv.show();
		ifrImghrf.src = $this.attr("data-url");
		ifrImghrf.onload = function(){
			$ifrimgimg.attr("src",ifrImghrf.src);$ifrspinndiv.hide();
		}
		$ifrimg.find('div').css("background-color",$this.attr("data-bg")).html('<div style="color:'+$this.attr("data-tclr")+'">'+$this.attr("data-title")+'</div>');
	});
	
	$("#"+pgn+"enlarg"+pn).click(function (event){
	event.preventDefault();
	var enlarg = $gridppop.data("enlarg");
	if(enlarg){$gridppop.data("enlarg",enlarg+0.5);}else{$gridppop.data("enlarg",1.5);enlarg=1;}
	$ifrimgimg.css("height",(enlarg+0.5)*$gridppop.data("HGTsize")).css("width",(enlarg+0.5)*$gridppop.data("WDHsize"));
	$ifrimg.scrollLeft(0.85*$gridppop.data("WDHsize")/3).scrollTop(0.85*$gridppop.data("HGTsize")/3);	
	});
	
	$("#"+pgn+"enlargs"+pn).click(function (event){
	event.preventDefault();
	var enlarg = $gridppop.data("enlarg");if(enlarg==1)enlarg=1.5;
	if(enlarg){$gridppop.data("enlarg",enlarg-0.5);}else{$gridppop.data("enlarg",1);enlarg=1.5;}
	$ifrimgimg.css("height",(enlarg-0.5)*$gridppop.data("HGTsize")).css("width",(enlarg-0.5)*$gridppop.data("WDHsize"));
	$ifrimg.scrollLeft(0.85*$gridppop.data("WDHsize")).scrollTop(0.85*$gridppop.data("HGTsize"));	
	});
	
}


function gridpicdata(pgn,pn,nbr,ints,url){
		var plistd = localStorage.getItem(pgn+"gridpicjs"+pn);
		if(!plistd){
			var plistds =[0,'','','','',''];
			localStorage.setItem(pgn+"gridpicjs"+pn,JSON.stringify(plistds));}
		$.ajax({
   		type: 'GET',
    	url: ints,
    	async: false,
    	jsonpCallback: 'datp',
    	contentType: 'application/json',
    	dataType: 'jsonp',
        success: dapts});
		function dapts(data) { var jscldv = localStorage.getItem(pgn+"gridpicjs"+pn);if(jscldv){jscldv = JSON.parse(jscldv);}else{var jscldv =[];jscldv[0]=0;}
			if(data.btn[0].jscldv > jscldv[0] || jscldv.length==1){
				 if(jscldv.length>1){	
				 	jscldv.splice(0,1,data.btn[0].jscldv);jscldv.splice(1,1,data.btn[0].update);
				 }else{
				 	jscldv[0]= data.btn[0].jscldv;jscldv[1]= data.btn[0].update;
					jscldv[2]= data.btn[0].bg;jscldv[3]= data.btn[0].padding;jscldv[4]= data.btn[0].imgheight;jscldv[5]= data.btn[0].imgwidth;
				 ;}
				 localStorage.setItem(pgn+"gridpicjs"+pn,JSON.stringify(jscldv));
				 var vp = 1; 
			;}else{
				var plistd = JSON.parse(localStorage.getItem(pgn+"gridpicjs"+pn));
				jscldv.splice(1,1,data.btn[0].update);				
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

			if(data.btn[0].img.length < 150000){
			localStorage[pgn+'gridpicjss'+pn] = data.btn[0].img;
			var gridpicjss = localStorage.getItem(pgn+'gridpicjss'+pn);
			if(gridpicjss){
			var gridpicjss = JSON.parse(gridpicjss);
				var j =0;
				$('#'+pgn+'gridimgs'+pn).find('.'+pgn+'gridpics'+pn).each(function(){
				$("img",this).attr("src",gridpicjss[0][j]);
				$(this).attr("data-url",gridpicjss[1][j]).attr("data-title",gridpicjss[2][j]).attr("data-tclr",gridpicjss[3][j]).attr("data-bg",gridpicjss[4][j]);
				j++;
				});
			}
			}
			$.mobile.loading( "hide");
		;}//function datp(data)
		;}//if(vp){
		;}//function dapts(data)
;}