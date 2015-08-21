/*AppMoney712 APP Creation System || 01 - AUG -2015 || Copyright LEE WAI KWOK(JSTRUST CONSULTANCY) || license - Revised MIT.*/
/*if(window.devicePixelRatio !== undefined){var dpr = window.devicePixelRatio;}else{var dpr = 1;};*/var dpr = 1;$('.ifrspinn').height($(window).height()*0.95); 
//photo ratio height/width    

function ifrp(pgn,pn,tm,hgt,wdt,scrollposition,scrollpositions,ratio,dpr,windowHeight,windowWidth){		
			
			var $divnbr = $('#'+pgn+'ifr'+pn+'p'+tm);
			if(hgt!=100){$divnbr.css('height',windowHeight*dpr*hgt/100);}
			else if(hgt==100){$divnbr.css('height',windowHeight);}
			
			var rhgt ='';
			if(ratio<1 && windowHeight > windowWidth){			
				$divnbr.find('div:first > img').css('height',windowHeight).css('width',windowHeight/ratio);	
				rhgt = 1;//rhgt = heightofwindow/ratio/widhtofwindow; 
			}
			
			$divnbr.find('.'+pgn+'ifr'+pn+'p'+tm).each(function(){	
					var $thisdivnbr = $(this);
					var vluleft = $thisdivnbr.attr('data-left');
					
					if(vluleft == 'fix'){
						var $divnbrTop = $divnbr.offset().top;	
						$thisdivnbr.css('top',($divnbrTop+$thisdivnbr.attr('data-top')*$divnbr.height()/100));						
					;}else{
						if(rhgt){
							var $divnbrLeft =vluleft-$('a',this).width()/2/windowHeight/ratio*100;
							var $divnbrTop = $thisdivnbr.attr('data-top')-$('a',this).height()/2/windowHeight*100;
						}else{
							var $divnbrLeft = vluleft*wdt/100-$('a',this).width()/windowWidth*100;
							var $divnbrTop = $thisdivnbr.attr('data-top')-$('a',this).height()/windowHeight*100;
						}					
						$thisdivnbr.css('left',$divnbrLeft+'%').css('top',$divnbrTop+'%');	
					}
			});	
			
			
			
				if((scrollposition && wdt > 100) || scrollpositions){
					var widthrt = wdt/100;	
					var scrollL = windowWidth*dpr*scrollposition/100;
					var scrollT =(windowHeight*dpr*hgt/100)*scrollpositions*widthrt*ratio/100;
					if(scrollposition && wdt > 100 && scrollpositions){$divnbr.animate({scrollLeft:scrollL}).animate({ scrollTop: scrollT});}
					else if(scrollposition && wdt > 100){$divnbr.animate({scrollLeft:scrollL});	}
					else if(scrollpositions){$divnbr.animate({ scrollTop: scrollT});	}			
				}
			if(hgt && $divnbr && document.URL.indexOf('pj=') !== -1)$divnbr.niceScroll({touchbehavior:true,bouncescroll:true});//boxzoom:true,	
			
;}



function ifrftnbtn(pjs,pgn,pn,dpr,windowHeight,windowWidth){	
	var $ifrdiv = $('#'+pgn+'ifr'+pn);
	$('.'+pgn+'ifrftnbtns').click(function(event){
		event.preventDefault();	
		var $this = $(this);
		$($this.attr('data-pop')).popup('close');
		$($this.attr('data-img')).css({'z-index':'-1','opacity':'0'});
		$($this.attr('data-imgn')).click();		
	});	
	
	
	
	$ifrdiv.find('.ifrftnbtn').click(function(event){event.preventDefault();
	var datavlu = $(this).attr('data-vlu').split('&&&'); 
	var pj = datavlu[0];var pgn = datavlu[1];
	var imgnbr = '#'+pgn+datavlu[2]; 
	var style = datavlu[3];
	var imgnbrnt = '#'+pgn+datavlu[4];
	var hgt = datavlu[5];
	var wdt = datavlu[6];
	var scrollposition = datavlu[7];
	var scrollpositions = datavlu[8];
	var ratio = datavlu[9];
	if(style)$(imgnbr).addClass(style);

	var spinurl = $(imgnbrnt).attr('data-img');
	var spinImg = new Image();

	if(spinurl.indexOf('http://') === -1 && spinurl.indexOf('https://') === -1 && document.URL.indexOf('pj=') !== -1){var pj = '../panel/'+pj+'/';}else{var pj = '';}
 	spinImg.src = pj+spinurl;pj='';
	$.mobile.loading( "show", { text: "loading...", textVisible: true,theme: "a",html: ""});	
	spinImg.onload = function(){$.mobile.loading( "hide");	
		$(imgnbrnt).find('div:first > img').attr('src',spinImg.src);
		if((scrollposition && wdt > 100) || scrollpositions){	var widthrt = wdt/100;	
					if(scrollposition && wdt > 100 && scrollpositions){
						$(imgnbrnt).scrollLeft(windowWidth*dpr*scrollposition/100).animate({ scrollTop: (windowHeight*dpr*hgt/100)*scrollpositions*widthrt*ratio/100 });}	
					else if(scrollposition && wdt > 100){
						$(imgnbrnt).scrollLeft(windowWidth*dpr*scrollposition/100);}
					else if(scrollpositions){
						$(imgnbrnt).animate({ scrollTop: (windowHeight*dpr*hgt/100)*scrollpositions*widthrt*ratio/100 });}	
		} 	
	$(imgnbr).one('animationend webkitAnimationEnd transitionend webkitTransitionEnd', function(){
			$(imgnbr).css({'z-index':'-1','opacity':'0'}).removeClass(style);$(imgnbrnt).css({'z-index':'1','opacity':'1'});																											
	})
	;} 
	})
;}

function ifrspin(pj,nbr,img,hgt,wdt,scrollposition,scrollpositions,ratio,dpr,windowHeight,windowWidth){
	var ap ='';
	$('.'+nbr+'ifrvwpop').height(windowHeight*0.85);
	var ifrspin = new Image();
	if(img.indexOf('http://') === -1 && img.indexOf('https://') === -1 && document.URL.indexOf('pj=') !== -1)ap = '../panel/'+pj+'/';	
 	ifrspin.src = ap+img;	
	$.mobile.loading( "show", { text: "loading...", textVisible: true,theme: "a",html: ""});	
	ifrspin.onload = function(){$('#'+nbr).find('img').attr('src',ifrspin.src).fadeIn("slow");

				if((scrollposition && wdt > 100) || scrollpositions){	var widthrt = wdt/100;	
					if(scrollposition && wdt > 100 && scrollpositions){
						$('#'+nbr).find('div').scrollLeft(windowWidth*dpr*scrollposition/100).animate({ scrollTop: (windowHeight*dpr*hgt/100)*scrollpositions*widthrt*ratio/100 });}	
					else if(scrollposition && wdt > 100){
						$('#'+nbr).scrollLeft(windowWidth*dpr*scrollposition/100);}	
					else if(scrollpositions){
						$('#'+nbr).animate({ scrollTop: (windowHeight*dpr*hgt/100)*scrollpositions*widthrt*ratio/100 });	}
				} 			
	$.mobile.loading( "hide");	
	} 
;}	