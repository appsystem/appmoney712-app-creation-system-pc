/*AppMoney712 APP Creation System || 01 - AUG -2015 || Copyright LEE WAI KWOK(JSTRUST CONSULTANCY) || license - Revised MIT.*/
function tabjs(pj,tabjs,tab,typ,windowWidth,windowHeight){
	var $tab = tab;
	var tabjsurl = $tab.attr('data-url');var tabftr = $tab.attr('data-ftr');var $ftrbg = $(tabjs+' div.ftrbg');if(typ){var vlu = $tab.attr('data-vlu');}else{var vlu = '';}
	$(tabjs.replace('tabs','tabjs')+' div.ftrbg').hide();
	$(tabjs).height(windowHeight-60-tab.height()-24);
	
	function ifrtabjs(tabjs,vlu,tabjsurl){
	var ifrtbjs = tabjs.replace('#','')+'ifr';
	document.getElementById(ifrtbjs).onload = function() {
	document.getElementById(ifrtbjs).contentWindow.postMessage(vlu,tabjsurl);
	;}
	;}

	if(tabftr){
		$ftrbg.show();
		var tabftrw = $tab.attr('data-ftrw');var tabftrbg = $tab.attr('data-ftrbg');
		var $ftrbgdiv = $(tabjs+' div.ftrbg > div');
		if(tabftrbg)$ftrbg.css('background-color',tabftrbg);
		$ftrbgdiv.text(tabftr);
		if(tabftrw){$ftrbgdiv.css('color',tabftrw);}else{$ftrbgdiv.css('color','red');}
	;}else{
		$ftrbg.hide();
	;}

	
	if(pj && tabjsurl){
		var ap ='';
		if(tabjsurl.indexOf('http://') === -1 && tabjsurl.indexOf('https://') === -1 && document.URL.indexOf('pj=') !== -1){		
			ap = '../panel/'+pj.replace('#','')+'/';
		;} 
		var $tabjsiframe = $(tabjs+' iframe');var $tabjsimgdiv = $(tabjs+' div.ifrwidth');var $tabjsimg = $(tabjs+' div.ifrwidth > img');var $ifrspinn = $(tabjs+' div.ifrspinn');
		if(tabjsurl.indexOf('player.vimeo.com')!==-1 || tabjsurl.indexOf('youtu.be')!==-1 || tabjsurl.indexOf('v.qq.com')!==-1){	
			$tabjsiframe.hide();$tabjsiframe.attr('src','');$ifrspinn.show();  
			$tabjsimg.hide(); $tabjsimgdiv.hide();
			$tabjsiframe.load( tabjsurl, function() {
			$tabjsiframe.attr( "width", 0 ).attr( "height", "auto" );
			
           		 var wdWidth = windowWidth;
           		 var wdHeight = windowHeight;
            	 var sizewidth = '';var sizeheight = '';
			
				if(wdWidth > wdHeight){sizeheight = wdHeight*0.85;sizewidth = sizeheight*498/298;}
				if(wdHeight > wdWidth){sizewidth = wdWidth*0.85; sizeheight = sizewidth*298/498;}
				
           		var size = scale(sizewidth, sizeheight, 1, 1 ),
                wdh = size.width,
                hgt = size.height;
           		$tabjsiframe.attr( "width", wdh ).attr( "height", hgt ).attr( "src", tabjsurl );
				
			setTimeout(function(){$tabjsiframe.show();},800);
			$ifrspinn.hide(); 
			});
			
		;}else if(tabjsurl.indexOf('.html') != -1 || tabjsurl.indexOf('.htm') != -1 || tabjsurl.indexOf('.php') != -1 || tabjsurl.indexOf('.asp') != -1){
			if(ap){if(tabjsurl.indexOf('.html') != -1)tabjsurl = ap+tabjsurl;}
			$ifrspinn.show(); 
			$tabjsimg.hide();$tabjsimgdiv.hide();$tabjsiframe.hide();
			$tabjsiframe.load( tabjsurl, function() {
			$tabjsiframe.attr('src',tabjsurl);		
			if(vlu  && tabjsurl){
			setTimeout(function(){$tabjsiframe.show();ifrtabjs(tabjs,vlu,tabjsurl);},800);
			}else{
			setTimeout(function(){$tabjsiframe.show();},800);
			;}
			$ifrspinn.hide(); 	
			});
		;}else{
			var spinImg = new Image();
 			if(tabjsurl.indexOf('..') == -1){spinImg.src = ap+tabjsurl;}else{spinImg.src = tabjsurl;}
			$ifrspinn.show(); $tabjsiframe.hide();$tabjsimgdiv.hide();$tabjsimg.hide();
			if(tabjsurl.indexOf('[1]') != -1){$tabjsimg.css('height','100%');}else{$tabjsimg.css('height','auto');}
			spinImg.onload = function(){		
			$tabjsimg.attr('src',spinImg.src);$tabjsimgdiv.height(windowHeight-60-tab.height()-24).show();$tabjsimg.show();$ifrspinn.hide();
			;} 
		;}
	;} 
};	



function tabjn(pj,tabjs,tab,windowHeight){
	var $tab = tab;
	var tabjsurl = $tab.attr('data-url');var tabftr = $tab.attr('data-ftr');var $ftrbg = $(tabjs+' div.ftrbg');
	$(tabjs.replace('tabjs','tabs')+' div.ftrbg').hide();
	$(tabjs).height(windowHeight*0.95*0.85);
	
	if(tabftr){
		$ftrbg.show();
		var tabftrw = $tab.attr('data-ftrw');var tabftrbg = $tab.attr('data-ftrbg');
		var $ftrbgdiv = $(tabjs+' div.ftrbg > div');
		if(tabftrbg)$ftrbg.css('background-color',tabftrbg);
		$ftrbgdiv.text(tabftr);
		if(tabftrw){$ftrbgdiv.css('color',tabftrw);}else{$ftrbgdiv.css('color','red');}
	;}else{
		$ftrbg.hide();
	;}

	
	if(pj && tabjsurl){
		$(tabjs+' div.ifrwidth').hide();$(tabjs+'n'+tabjsurl).show();
	;} 
};	





