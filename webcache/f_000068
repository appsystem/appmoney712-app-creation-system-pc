/*AppMoney712 APP Creation System || 01 - AUG -2015 || Copyright LEE WAI KWOK(JSTRUST CONSULTANCY) || license - Revised MIT.*/
function dwimg(pj,pgn,pn,url,color,wdh,typs){ 
	var $dwICONpop = $('#'+pgn+'dwICONpop'+pn);
	var $dwPOPvideo = $('#'+pgn+'dwPOPvideo'+pn);
	var $dwimg = $('#'+pgn+'dwimg'+pn);
	var $dwimgs = $('#'+pgn+'dwimgs'+pn);
	var $dwimgsn = $('#'+pgn+'dwimgsn'+pn);
	var $dwiconslt =$('#'+pgn+'dwiconslt'+pn);
	var $dwurl = $('#'+pgn+'dwurl'+pn);
	var $dwwdh = $('#'+pgn+'dwwdh'+pn);
	var $dwwdhvx = $('#'+pgn+'dwwdhvx'+pn);
	var $dwwdhvy = $('#'+pgn+'dwwdhvy'+pn);
	var $dwwdhvz = $('#'+pgn+'dwwdhvz'+pn);
	var $dwstoreshw = $('#'+pgn+'dwstoreshw'+pn);
	var $dwPOPmsg = $('#'+pgn+'dwPOPmsg'+pn);
	var $dwvideovlu = $('#'+pgn+'dwvideovlu'+pn);
	var $dwPOPvoice = $('#'+pgn+'dwPOPvoice'+pn);
	var $dwPOPimg = $('#'+pgn+'dwPOPimg'+pn);
	var $dwicons = $('#'+pgn+'dwicons'+pn);
	var $dwWRTs = $('#'+pgn+'dwWRTs'+pn);
	var $dwPOPicon = $('#'+pgn+'dwPOPicon'+pn);
	var $POPICON = $('#'+pgn+'POPICON'+pn);
	var $POPWRT = $('#'+pgn+'POPWRT'+pn);
	var $dwsavep = $("#"+pgn+'dwsavep'+pn);
	var $dwiconSLTs = $('#'+pgn+'dwiconSLTs'+pn);
	var $dwrgb = $('#'+pgn+'dwrgb'+pn);
	var $POPICONslt = $('#'+pgn+'POPICONslt'+pn);	

	var windowheight = $(window).height();
	var windowwidth = $(window).width(); 
	
	$dwICONpop.height(windowheight*0.95);$dwiconslt.height(windowheight*0.95);
	var dwiconstyle = localStorage.getItem(pgn+'dwiconstyle'+pn);
	var dwimgwidth = localStorage.getItem(pgn+'dwimgwidth'+pn);

	
	$(window).on("orientationchange",function(){
		if($(window).height() > $(window).width()){
			$('#'+pgn+'dwstart'+pn).hide();$('#'+pgn+'dwicon'+pn).hide();$('#'+pgn+'dwundo'+pn).hide();$('#'+pgn+'dwdo'+pn).hide();
			if($dwwdh.data('dw')){
				$('#'+pgn+'dwinf'+pn).show();$('#'+pgn+'dwsave'+pn).hide();
				$dwwdh.data('dw','');
				$('#'+pgn+'dwstart'+pn).removeClass('ui-btn-icon-left ui-icon-check');
				var istouch = 'ontouchstart' in window;
				var action = istouch ? 'touchstart':'mousedown';
				if(action=='touchstart'){var action = "touchstart";var action1 = "touchmove";
				;}else{var action = "mousedown";var action1 = "mousemove";}
				$('#'+pgn+'dw'+pn).unbind(action.dwl);$('#'+pgn+'dw'+pn).unbind(action1.dwl);
			;}
		;}else{		
			$('#'+pgn+'dwstart'+pn).show();$('#'+pgn+'dwicon'+pn).show();
		;} 
	});
	
	var dwurl = localStorage.getItem(pgn+'dwurl'+pn);
	if(dwurl)var url = dwurl;

	if(url.indexOf('http')==-1 && url.indexOf('images/')==-1)url = 'images/'+url;
	if(document.URL.indexOf('pj=') > 0 && pj)url = '../panel/'+pj+'/'+url;
	
	var urlImg = new Image();urlImg.src = url;
	urlImg.onload = function(){
			sessionStorage.setItem(pgn+'dwpicratio'+pn,this.height/this.width);
			if(dwurl)$dwurl.val(dwurl);
	}
    var dwpicratio = sessionStorage.getItem(pgn+'dwpicratio'+pn);

	var $dwbgarea = $('#'+pgn+'dwbgarea'+pn);
	$dwbgarea.find('img').attr('src',url);

	
	var dwbgareaheight = windowheight*0.8;
	var dwbgareawidth = $dwbgarea.width();
	if(dwbgareawidth*dwpicratio > dwbgareaheight){
	$dwbgarea.width(dwbgareaheight/dwpicratio).height(dwbgareaheight);
	;}
	
	
	
	$('#'+pgn+'dwurls'+pn).click(function(){	event.preventDefault();	
	var dwurl = $dwurl.val();
	localStorage[pgn+'dwurl'+pn] = dwurl;
	if(dwurl)var url = dwurl;
	if(url.indexOf('http')==-1 && url.indexOf('images/')==-1)url = 'images/'+url;
	if(document.URL.indexOf('pj=') > 0 && pj)url = '../panel/'+pj+'/'+url;
	
	$dwbgarea.find('img').attr('src','');
	urlImg.onload = function(){$dwbgarea.find('img').attr('src',url);}
	
	var wdhcvs = $dwimgs.width();
	var wdhcvheight = '';
	if(windowheight > windowwidth && dwpicratio){
		  if(dwpicratio < 1){
			  	if(dwimgwidth){
					wdhcvheight = dwimgwidth*dwpicratio;
					wdhcvs = dwimgwidth;
				;}else{
			 		 wdhcvs = windowheight/dwpicratio;
				}
		  }else{wdhcvs =  $dwimgs.width();}
	}else{
		 wdhcvs = $dwimgs.width();	
	;}
	if(!wdhcvheight)wdhcvheight = windowheight;
	
	 if(!wdhcvs)wdhcvs = windowwidth;
	   	 $('#'+pgn+'dwimg'+pn).height(windowheight); $dwimgs.height(windowheight);
	     var canvas='<canvas id="'+pgn+'dw'+pn+'" width="'+wdhcvs+'" height="'+windowheight+'" data-url="'+url+'" style="background-image:url('+url+');background-size:100%;background-repeat:no-repeat;"></canvas>';
		$('#'+pgn+'dwimg'+pn).append(canvas);
		var dwsym = document.getElementById(pgn+'dw'+pn).getContext("2d");
		var image = localStorage.getItem(pgn+'dwsave'+pn);
		if(image){
		var img = new Image();
		img.src = image;
		
		img.onload = function(){dwsym.drawImage(img,0,0);};}
	;});
	
	var dwsurl = localStorage.getItem(pgn+'dws'+pn);
	if(!dwsurl)dwsurl = '';
	var $dws = $('#'+pgn+'dws'+pn);
	$dws.find('iframe').attr('src',dwsurl);
	
	$('#'+pgn+'dwsURLbtn'+pn).click(function(){	event.preventDefault();	
	var dwsurl = $dwurl.val();
	if(dwsurl){
	$dws.find('iframe').attr('src',dwsurl);
	localStorage[pgn+'dws'+pn] = dwsurl;
	}
	;});
	var $dwsbtn = $('#'+pgn+'dwsbtn'+pn);
	$dwsbtn.hide();
	var dws = localStorage.getItem(pgn+'dws'+pn);
	if(dws)$dwsbtn.show();	
		

	$dwbgarea.click(function(event){event.preventDefault();	
	var position = $dwbgarea.offset();
		var icon = $dwiconslt.html();
		var typ  = $dwbgarea.attr('data-icon');
		var dwsn = typ.split('[dw]');
		
		if(typ){
		if(icon){
			var stylev  = $dwbgarea.attr('data-style');
			var style = 'position:absolute;'+stylev+'top:'+parseFloat(( (event.pageY - position.top)*100/$dwbgarea.height()) ).toFixed(2)+'%;left:'+parseFloat(( (event.clientX - position.left)*100/$dwbgarea.width())).toFixed(2)+'%;';
			icon = icon.replace('style="','style="'+style);		
			$dwimgs.append(icon);				
			$('#'+pgn+'dwstart'+pn).removeClass('ui-btn-icon-left ui-icon-check');			
			$POPICONslt.popup('close');	
		
			var dwiconstyle = localStorage.getItem(pgn+'dwiconstyle'+pn);
			 if(dwiconstyle){	
				
				dwiconstyle = JSON.parse(dwiconstyle);
				
				var dwiconsrmnbr = $dwsavep.data('dwiconsrmnbr');
				
				if(dwiconsrmnbr){
					dwiconstyle.splice(dwiconsrmnbr,1,style+'[dw]'+typ);
				;}else{
					dwiconstyle.push(style+'[dw]'+typ);
				;}
				if(dwiconstyle)localStorage.setItem(pgn+"dwiconstyle"+pn,JSON.stringify(dwiconstyle)); 
				$dwimgs.find('span').remove();
				var dwiconhtml = '';
					if(dwiconstyle.length){
						for(var i=0;i<dwiconstyle.length;i++){
							var dws = dwiconstyle[i].split('[dw]');
							if(document.URL.indexOf('pj=') > 0 && pj){
									if(dws[3].indexOf("src='images/") > 0){dws[3]=dws[3].replace("src='","src='../panel/"+pj+"/");
									}else{dws[3]=dws[3].replace("src='","src='../panel/"+pj+"/images/");}
							}
							if((dws[2].indexOf('.mp3')>0 || dws[2].indexOf('.wav')>0) && (dws[2].indexOf('http://') !== -1 || dws[2].indexOf('https://') !== -1)){
								dwiconhtml += '<span style="'+dws[0]+';" data-wbn="'+i+'" class="'+dws[1]+' '+pgn+'dwpopm'+pn+'" data-vlu="'+dws[2]+'" >'+dws[3]+'</span>';
							;}else{
								if(dws[2].indexOf('http')==-1 && dws[2].indexOf('images/')==-1){dws[2] = 'images/'+dws[2];
								if(document.URL.indexOf('pj=') > 0 && pj)dws[2] = '../panel/'+pj+'/'+dws[2];}
								dwiconhtml += '<span style="'+dws[0]+';" data-wbn="'+i+'" class="'+dws[1]+' imgspop" data-url="'+dws[2]+'" data-pop="'+pgn+'">'+dws[3]+'</span>';
							;}
						;}
				
						if(dwiconhtml)$dwimg.append(dwiconhtml);
				;}
	 		;}else{
				var dwiconstyle = [];dwiconstyle[0] = style+'[dw]'+typ;
				localStorage.setItem(pgn+"dwiconstyle"+pn,JSON.stringify(dwiconstyle)); 
				$dwimgs.find('span').remove();
				if(document.URL.indexOf('pj=') > 0 && pj){
									if(dwsn[2].indexOf("src='images/") > 0){dwsn[2]=dwsn[2].replace("src='","src='../panel/"+pj+"/");
									}else{dwsn[2]=dwsn[2].replace("src='","src='../panel/"+pj+"/images/");}
				}
				if((dwsn[1].indexOf('.mp3')>0 || dwsn[1].indexOf('.wav')>0) && dwsn[1].indexOf('[dw].')>0 && (dwsn[1].indexOf('http://') !== -1 || dwsn[1].indexOf('https://') !== -1)){
					$dwimg.append('<span style="'+style+';" data-wbr="0" class="'+dwsn[0]+' '+pgn+'dwpopm'+pn+'" data-vlu="'+dwsn[1]+'">'+dwsn[2]+'</span>');
				;}else{
					if(dwsn[1].indexOf('http')==-1 && dwsn[1].indexOf('images/')==-1){dwsn[1] = 'images/'+dwsn[1];
					if(document.URL.indexOf('pj=') > 0 && pj)dwsn[1] = '../panel/'+pj+'/'+dwsn[1];}
					$dwimg.append('<span style="'+style+';" data-wbr="0" class="'+dwsn[0]+' imgspop" data-url="'+dwsn[1]+'" data-pop="'+pgn+'">'+dwsn[2]+'</span>');
				;}
			;}
		 
		 ;}
		 ;}
	});
	
		
	$(document).on('click', '.'+pgn+'dwiconrm'+pn,function (event) {		event.preventDefault();																								 
		var dwiconsrm = $dwsavep.data('dwiconsrm');
		
		var dwiconstyle = localStorage.getItem(pgn+'dwiconstyle'+pn);
		var dwiconstyle = JSON.parse(dwiconstyle);
		var nbr = $(this).attr('data-nbr');	
		
		if(dwiconsrm){
		  if(dwiconstyle){		
			$dwimgs.find('span').remove();
	
			dwiconstyle.splice(nbr,1);
			localStorage.setItem(pgn+"dwiconstyle"+pn,JSON.stringify(dwiconstyle)); 
		
			var dwiconhtml = '';
			if(dwiconstyle.length){
			for(var i=0;i<dwiconstyle.length;i++){
				var dws = dwiconstyle[i].split('[dw]');
							if(document.URL.indexOf('pj=') > 0 && pj){
									if(dws[3].indexOf("src='images/") > 0){dws[3]=dws[3].replace("src='","src='../panel/"+pj+"/");
									}else{dws[3]=dws[3].replace("src='","src='../panel/"+pj+"/images/");}
							}					
							if((dws[2].indexOf('.mp3')>0 || dws[2].indexOf('.wav')>0) && dws[2].indexOf('[dw].')>0 && (dws[2].indexOf('http://') !== -1 || dws[2].indexOf('https://') !== -1)){
								dwiconhtml += '<span style="'+dws[0]+';" data-wbr="'+i+'" class="'+dws[1]+' '+pgn+'dwpopm'+pn+'" data-vlu="'+dws[2]+'" >'+dws[3]+'</span>';
							;}else{
								if(dws[2].indexOf('http')==-1 && dws[2].indexOf('images/')==-1){dws[2] = 'images/'+dws[2];
								if(document.URL.indexOf('pj=') > 0 && pj)dws[2] = '../panel/'+pj+'/'+dws[2];}
								dwiconhtml += '<span style="'+dws[0]+';" data-wbr="'+i+'" class="'+dws[1]+' imgspop" data-url="'+dws[2]+'" data-pop="'+pgn+'">'+dws[3]+'</span>';
							;}
			;}
			if(dwiconhtml)$dwimgs.append(dwiconhtml);
			;}
			
			var dwiconhtmln = '';
			$dwiconSLTs.html('');
			if(dwiconstyle.length){
				for(var i=0;i<dwiconstyle.length;i++){
				var dws = dwiconstyle[i].split('[dw]');
				dwiconhtmln += '<a href="#" data-nbr="'+i+'" class="'+pgn+'dwiconrm'+pn+' ui-btn ui-btn-x ui-icon-delete ui-btn-icon-left"><span style="color:'+dws[5]+';font-size:'+dws[4]+'px;" class="'+dws[1]+'">'+dws[3]+'</span> color:'+dws[5]+';font-size:'+dws[4]+'px;</a>';
				;}
			;}
			
			if(dwiconhtmln){$dwsavep.data('dwiconsrm','1');
				$dwiconSLTs.html('<a href="#" class="'+pgn+'dwiconsrm'+pn+' ui-btn ui-btn-x ui-icon-edit ui-btn-icon-notext"></a>'+dwiconhtmln);}
			
			
		 ;}			
		;}else{
			var dws = dwiconstyle[nbr].split('[dw]');
			var icon = $(this).attr('data-class');
			$dwiconslt.find('span').attr('class',dws[1]);
			
	 		$dwiconslt.addClass('ui-btn ui-btn-z ui-btn-inline').find('span').attr('style','color:'+dws[5]+';font-size:'+dws[4]+'px;');
			$dwbgarea.attr('data-style','color:'+dws[5]+';font-size:'+dws[4]+'px;').attr('data-icon',dws[1]+'[dw]'+dws[2]+'[dw]'+dws[3]+'[dw]'+dws[4]+'[dw]'+dws[5]+'[dw]'+dws[6]+'[dw]'+dws[7]+'[dw]'+dws[8]);		
			$dwsavep.data('dwiconsrmnbr',nbr);
			
			$('#'+pgn+'dwvideovlu'+pn).val(dws[6]);$('#'+pgn+'dwmsgvlu'+pn).val(dws[7]); $('#'+pgn+'dwimgvlu'+pn).val(dws[8]); 
			$('.'+pgn+'dwrgb'+pn).removeClass('ui-btn-icon-left ui-icon-check');
			$('.'+pgn+'dwrgb'+pn+'[data-clr='+dws[5]+']').addClass('ui-btn-icon-left ui-icon-check');
			$('#'+pgn+'iconbtnv'+pn).val(dws[4]).slider('refresh');
			$('#'+pgn+'dwiconSLTsPOP'+pn).popup('close').one( "popupafterclose", function( event, ui ){$POPICON.popup('open',"transition","pop");});
		;}		
	});

	$('#'+pgn+'dwiconws'+pn).click(function(event) {		event.preventDefault();	
			$dwsavep.data('dwiconsrmnbr','').data('dwiconsrm','');	
			$('#'+pgn+'dwmsgvlu'+pn).val('');
			$('#'+pgn+'dwimgvlu'+pn).val('');
			$('#'+pgn+'dwvideovlu'+pn).val('');
			$('.'+pgn+'dwiconrm'+pn).removeClass('ui-icon-delete').addClass('ui-icon-edit');
			$('#'+pgn+'iconbtnv'+pn).val(15).slider('refresh');
			$('.'+pgn+'dwrgb'+pn).removeClass('ui-btn-icon-left ui-icon-check');
			$dwiconslt.removeClass('ui-btn ui-btn-z ui-btn-inline').find('span').attr('style','');
			$dwbgarea.attr('data-style','');		
	});
	
	
	$('#'+pgn+'dwicon'+pn).click(function(){		
		var dwiconstyle = localStorage.getItem(pgn+'dwiconstyle'+pn);
		if($dwwdh.data('dw')){$dwICONpop.popup('open');
		}else{
			if($dwiconslt.html() && $dwbgarea.attr('data-icon')){
			$POPICONslt.popup('open');
			}else{
			$POPICON.popup('open');
			}
		}
		if(dwiconstyle){
	
		var dwiconstyle = JSON.parse(localStorage.getItem(pgn+'dwiconstyle'+pn));
		var dwiconhtml = '';
		if(dwiconstyle.length){
		for(var i=0;i<dwiconstyle.length;i++){
			var dws = dwiconstyle[i].split('[dw]');
							if(document.URL.indexOf('pj=') > 0 && pj){
									if(dws[3].indexOf("src='images/") > 0){dws[3]=dws[3].replace("src='","src='../panel/"+pj+"/");
									}else{dws[3]=dws[3].replace("src='","src='../panel/"+pj+"/images/");}
							}					
			dwiconhtml += '<a href="#" data-nbr="'+i+'" class="'+pgn+'dwiconrm'+pn+' ui-btn ui-btn-x ui-icon-edit ui-btn-icon-left"><span style="color:'+dws[5]+';font-size:'+dws[4]+'px;" class="'+dws[1]+'">'+dws[3]+'</span> color:'+dws[5]+';font-size:'+dws[4]+'px;</a>';
		;}
		;}
		$dwsavep.data('dwiconsrm','');
		if(dwiconhtml){$dwiconSLTs.html('<a href="#" class="'+pgn+'dwiconsrm'+pn+' ui-btn ui-btn-x ui-icon-delete ui-btn-icon-notext"></a>'+dwiconhtml);}
		else{$dwiconSLTs.html('');}
		;}
	});
	
	$(document).on('click', '.'+pgn+'dwiconsrm'+pn,function (event) {		event.preventDefault();	
			var dwiconsrm = $dwsavep.data('dwiconsrm');
		if(dwiconsrm){
			$(this).removeClass('ui-icon-edit').addClass('ui-icon-delete');
			$dwsavep.data('dwiconsrm','');
			$('.'+pgn+'dwiconrm'+pn).removeClass('ui-icon-delete').addClass('ui-icon-edit');
		;}else{
			$(this).removeClass('ui-icon-delete').addClass('ui-icon-edit');
			$dwsavep.data('dwiconsrm',1);
			$('.'+pgn+'dwiconrm'+pn).removeClass('ui-icon-edit').addClass('ui-icon-delete');
		;}
	});	


	var dwwdhvx = localStorage.getItem(pgn+'dwwdhvx'+pn);
	if(dwwdhvx)$dwrgb.css('color',dwwdhvx).attr('data-clr',dwwdhvx);	
		

	$('.'+pgn+'iconbtn'+pn).click(function(event){
		event.preventDefault();		
		var idsvlu = $(this).attr('ids');
		var ids = 'pigss-'+idsvlu;
		
		var icon = '';//$('#'+pgn+'dwiconvlu'+pn).val();	
		var msg = $('#'+pgn+'dwmsgvlu'+pn).val();	
		var video = $dwvideovlu.val();	
		var img = $('#'+pgn+'dwimgvlu'+pn).val();	
		
		if(icon){
		$dwiconslt.find('span').attr('class',icon);}
		else{
			if(idsvlu.indexOf('-')>0){icon= idsvlu;}else{icon = ids;}
		$dwiconslt.find('span').attr('class',icon);}
		
		
		if(video){
		var vlu = video;
		$dwiconslt.find('span').attr('data-vlu',vlu);}
		else{vlu = '';}
		
		if(window.devicePixelRatio !== undefined){var dpr = window.devicePixelRatio*75;}else{var dpr = 75;}
		var audiobg='';
		var size = $('#'+pgn+'iconbtnv'+pn).val();
		if(!size)size = 15;
		if(size > 26){var msgsize = "style='font-size:26px'";}else{var msgsize = '';}
		if(msg && img){
			
				if(img.indexOf('http')==-1 && img.indexOf('images/')==-1){img = 'images/'+img;
				imgmsg="<img style='width:"+dpr+"px;height:"+dpr+"px;' src='"+img+"'><b "+msgsize+'>'+msg+'</b> <i></i>';
				if(document.URL.indexOf('pj=') > 0 && pj)img = '../panel/'+pj+'/'+img;}
				else{imgmsg="<img style='width:"+dpr+"px;height:"+dpr+"px;' src='"+img+"'><b "+msgsize+'>'+msg+'</b> <i></i>';}
		   $dwiconslt.find('span').html('<img style="width:'+dpr+'px;height:'+dpr+'px;" src="'+img+'"><BR><b '+msgsize+'>'+msg+'</b>');
		}else if(img){		
				if(img.indexOf('http')==-1 && img.indexOf('images/')==-1){img = 'images/'+img;
				imgmsg="<img style='width:"+dpr+"px;height:"+dpr+"px;' src='"+img+"'>"+' <i></i>';
				if(document.URL.indexOf('pj=') > 0 && pj)img = '../panel/'+pj+'/'+img;}	
				else{imgmsg="<img style='width:"+dpr+"px;height:"+dpr+"px;' src='"+img+"'>"+' <i></i>';}
			$dwiconslt.find('span').html('<img style="width:'+dpr+'px;height:'+dpr+'px;" src="'+img+'">');
		}else if(msg){
			imgmsg='<b '+msgsize+'>'+msg+'</b> <i></i>';
			$dwiconslt.find('span').html('<b '+msgsize+'>'+msg+'</b>');
		}else{
			imgmsg='<i></i>';
		}
			
		$dwiconslt.find('span').attr('class',icon);	
				
		var dwwdhvx=$dwwdh.data('dwrgb');
		if(!dwwdhvx)dwwdhvx='pink';

				
	 	$dwiconslt.addClass('ui-btn ui-btn-z ui-btn-inline');
		
		var slt = icon+'[dw]'+vlu+'[dw]'+imgmsg+'[dw]'+size+'[dw]'+dwwdhvx+'[dw]'+img+'[dw]'+msg+'[dw]'+video;
		$dwbgarea.attr('data-icon',slt);
		
		var style = 'color:'+dwwdhvx+';font-size:'+size+'px;';
		$dwiconslt.find('span').attr('style',style);	
		$dwbgarea.attr('data-style',style);
		
		$POPICON.popup('close').one( "popupafterclose", function( event, ui ){$POPICONslt.popup('open',"transition","pop");});
	});
	

	$('#'+pgn+'dwwdhnx'+pn).click(function(event){
		event.preventDefault();		
		var dwwdhvx='rgb('+$dwwdhvx.val()+','+$dwwdhvy.val()+','+$dwwdhvz.val()+')';
		if(dwwdhvx)localStorage[pgn+'dwwdhvx'+pn]=dwwdhvx;
		$dwrgb.attr('data-clr',dwwdhvx);	
		
		$dwICONpop.popup('close');
		var color='';
		if($dwrgb.attr('class').indexOf('ui-icon-check')!==-1){color = dwwdhvx;}else{color=$dwwdh.data('dwrgb');}
		var dwwdh = $dwwdh.data('dwwdh');
		if(dwwdh)var wdh = parseInt(dwwdh);
		var dwsym = document.getElementById(pgn+'dw'+pn).getContext("2d");
		if(color){dwsym.strokeStyle = color;}else{dwsym.strokeStyle = '#000000';}	
		if(wdh){dwsym.lineWidth = wdh;}else{dwsym.lineWidth = 5;}	
		
		dwl(pgn+'dw'+pn);
	});

	$('.'+pgn+'dwrgb'+pn+'[data-clr*='+color+']').addClass('ui-btn-icon-left ui-icon-check');


	$('.'+pgn+'dwrgb'+pn).click(function(event){
		event.preventDefault();		
		$('.'+pgn+'dwrgb'+pn).removeClass('ui-btn-icon-left ui-icon-check');
		$dwrgb.removeClass('ui-btn-icon-left ui-icon-check');
	   	 $(this).addClass('ui-btn-icon-left ui-icon-check');	
		$dwwdh.data('dwrgb',$(this).attr('data-clr'));
	});
	
	
	$dwrgb.click(function(event){
		event.preventDefault();		
		var dwwdhvx='rgb('+$dwwdhvx.val()+','+$dwwdhvy.val()+','+$dwwdhvz.val()+')';
		$(this).css('color',dwwdhvx).attr('data-clr',dwwdhvx).addClass('ui-btn-icon-left ui-icon-check');	
		$('.'+pgn+'dwrgb'+pn).removeClass('ui-btn-icon-left ui-icon-check');
		$dwwdh.data('dwrgb',$(this).attr('data-clr'));
	});
	 
	$('#'+pgn+'dwwdhn'+pn).click(function(event){
		event.preventDefault();		
		var dwwdhv = $('#'+pgn+'dwwdhv'+pn).val()*10;
		$dwwdh.data('dwwdh',dwwdhv);
	});
	
	$dwwdh.click(function(event){
		event.preventDefault();		
		$dwwdh.data('dwwdh',$('#'+pgn+'dwwdhv'+pn).val()*10);
	});
		 

	var  wdhcvheight = '';var wdhcvs = ''; 
	if(windowheight > windowwidth && dwpicratio){
		  if(dwpicratio < 1){
			  	if(dwimgwidth){
					wdhcvheight = dwimgwidth*dwpicratio;
					wdhcvs = dwimgwidth;
				;}else{
			 		wdhcvs = windowheight/dwpicratio;
				}
		  }else{wdhcvs =  $dwimgs.width();}
	}else{
		 wdhcvs = $dwimgs.width();	
		 wdhcvheight = wdhcvs*dwpicratio;
	;}
	if(!wdhcvheight)wdhcvheight = windowheight;
	
	
	 if(!wdhcvs)wdhcvs = windowwidth;
	   	 $dwimg.height(wdhcvheight);$dwimg.width(wdhcvs);
	    var canvas='<canvas id="'+pgn+'dw'+pn+'" width="'+wdhcvs+'" height="'+wdhcvheight+'" data-url="'+url+'" style="background-image:url('+url+');background-size:100%;background-repeat:no-repeat;"></canvas>';
		
		$('#'+pgn+'dwimg'+pn).append(canvas);
		var dwsym = document.getElementById(pgn+'dw'+pn).getContext("2d");
		var image = localStorage.getItem(pgn+'dwsave'+pn);
		if(image){
		var img = new Image();
		img.src = image;
		img.onload = function(){dwsym.drawImage(img,0,0);};}
	
	
	if(dwiconstyle){	
				var dwiconhtml = '';
				var dwiconstyle = JSON.parse(localStorage.getItem(pgn+'dwiconstyle'+pn));
				for(var i=0;i<dwiconstyle.length;i++){
					var dws = dwiconstyle[i].split('[dw]');
					if(document.URL.indexOf('pj=') > 0 && pj){
									if(dws[3].indexOf("src='images/") > 0){dws[3]=dws[3].replace("src='","src='../panel/"+pj+"/");
									}else{dws[3]=dws[3].replace("src='","src='../panel/"+pj+"/images/");}

					}

					if((dws[2].indexOf('.mp3')>0 || dws[2].indexOf('.wav')>0) && dws[2].indexOf('[dw].')>0 && (dws[2].indexOf('http://') !== -1 || dws[2].indexOf('https://') !== -1)){
								dwiconhtml += '<span style="'+dws[0]+';" data-wbn="'+i+'" class="'+dws[1]+' '+pgn+'dwpopm'+pn+'" data-vlu="'+dws[2]+'" >'+dws[3]+'</span>';
					;}else{
								if(dws[2].indexOf('http')==-1 && dws[2].indexOf('images/')==-1){dws[2] = 'images/'+dws[2];
								if(document.URL.indexOf('pj=') > 0 && pj)dws[2] = '../panel/'+pj+'/'+dws[2];}
								dwiconhtml += '<span style="'+dws[0]+';" data-wbn="'+i+'" class="'+dws[1]+' imgspop" data-url="'+dws[2]+'" data-pop="'+pgn+'">'+dws[3]+'</span>';
					;}
				;}			
				$('#'+pgn+'dwimg'+pn).width(wdhcvs);
				if(dwiconhtml)$dwimg.append(dwiconhtml);
	;}

		
	$('#'+pgn+'dwinf'+pn).show();$('#'+pgn+'dwundo'+pn).hide();$('#'+pgn+'dwdo'+pn).hide();$('#'+pgn+'dwsave'+pn).hide();
	$POPICON.css('max-height',windowheight*0.95);
	//$POPICON.hide();
	$dwPOPvideo.find('div').css('max-height',windowheight*0.8);
	$dwPOPvoice.find('div').css('max-height',windowheight*0.8);
	$dwPOPmsg.find('div').css('max-height',windowheight*0.8);
	$dwPOPimg.find('div').css('max-height',windowheight*0.8);
	$dwPOPicon.find('div').css('max-height',windowheight*0.8);
	
	$('#'+pgn+'dwstart'+pn).click(function(event){
		event.preventDefault();	
		if($dwwdh.data('dw')){
			$('#'+pgn+'dwinf'+pn).show();$('#'+pgn+'dwundo'+pn).hide();$('#'+pgn+'dwdo'+pn).hide();$('#'+pgn+'dwsave'+pn).hide();
			$dwwdh.data('dw','');
			$(this).removeClass('ui-btn-icon-left ui-icon-check');
				var istouch = 'ontouchstart' in window;
				var action = istouch ? 'touchstart':'mousedown';
			if(action=='touchstart'){
				var action = "touchstart";var action1 = "touchmove";
			;}else{
				var action = "mousedown";var action1 = "mousemove";
			;}
			$('#'+pgn+'dw'+pn).unbind(action.dwl);$('#'+pgn+'dw'+pn).unbind(action1.dwl);
		;}else{
			$(this).addClass('ui-btn-icon-left ui-icon-check');
		$('#'+pgn+'dwinf'+pn).hide();$('#'+pgn+'dwundo'+pn).show();$('#'+pgn+'dwdo'+pn).hide();$('#'+pgn+'dwsave'+pn).show();$('#'+pgn+'dwsave'+pn).show();
		$dwwdh.data('dw',1);
		var dwrgb = $dwwdh.data('dwrgb');
		if(dwrgb)var color = dwrgb;
		var dwwdh = $dwwdh.data('dwwdh');
		if(dwwdh)var wdh = parseInt(dwwdh);
		var dwsym = document.getElementById(pgn+'dw'+pn).getContext("2d");
		if(color){dwsym.strokeStyle = color;}else{dwsym.strokeStyle = '#000000';}	
		if(wdh){dwsym.lineWidth = wdh;}else{dwsym.lineWidth = 5;}	
		
		dwl(pgn+'dw'+pn);
		}
	});
	
	$dwWRTs.click(function(event){
		event.preventDefault();	$POPICON.popup('close').one( "popupafterclose", function( event, ui ){$POPWRT.popup('open',"transition","pop");});
	});
	
	$('#'+pgn+'POPWRTz'+pn).click(function(event){
		event.preventDefault();	 $POPWRT.popup('close').one( "popupafterclose", function( event, ui ){$POPICON.popup('open',"transition","pop");});
	});
	
	$dwicons.click(function(event){
		event.preventDefault();	 $POPICONslt.popup('close').one( "popupafterclose", function( event, ui ){$POPICON.popup('open',"transition","pop");});
		
		var dwiconstyle = localStorage.getItem(pgn+'dwiconstyle'+pn);
		if(dwiconstyle){
	
		var dwiconstyle = JSON.parse(localStorage.getItem(pgn+'dwiconstyle'+pn));
		var dwiconhtml = '';
		for(var i=0;i<dwiconstyle.length;i++){
			var dws = dwiconstyle[i].split('[dw]');
			if(document.URL.indexOf('pj=') > 0 && pj){
									if(dws[3].indexOf("src='images/") > 0){dws[3]=dws[3].replace("src='","src='../panel/"+pj+"/");
									}else{dws[3]=dws[3].replace("src='","src='../panel/"+pj+"/images/");}
			}	
			dwiconhtml += '<a href="#" data-nbr="'+i+'" class="'+pgn+'dwiconrm'+pn+' ui-btn ui-btn-x ui-icon-edit ui-btn-icon-left"><span style="color:'+dws[5]+';font-size:'+dws[4]+'px;" class="'+dws[1]+'">'+dws[3]+'</span> color:'+dws[5]+';font-size:'+dws[4]+'px;</a>';
		;}
		if(dwiconhtml)$dwiconSLTs.html('<a href="#" class="'+pgn+'dwiconsrm'+pn+' ui-btn ui-btn-x ui-icon-delete ui-btn-icon-notext"></a>'+dwiconhtml);
		;}
	});
	
	$('#'+pgn+'POPICONz'+pn).click(function(event){
		event.preventDefault();	$POPICON.popup('close').one( "popupafterclose", function( event, ui ){$POPICONslt.popup('open',"transition","pop");});			   
	});
	
	$('#'+pgn+'dwiconSLTsPOPs'+pn).click(function(event){
		event.preventDefault();	$POPICON.popup('close').one( "popupafterclose", function( event, ui ){$('#'+pgn+'dwiconSLTsPOP'+pn).popup('open',"transition","pop");});			   
	});
	
	$('#'+pgn+'dwiconSLTsPOPz'+pn).click(function(event){
		event.preventDefault();	$('#'+pgn+'dwiconSLTsPOP'+pn).popup('close').one( "popupafterclose", function( event, ui ){$POPICON.popup('open',"transition","pop");});			   

	});


	$('#'+pgn+'dwsave'+pn).click(function(event){
		event.preventDefault();	
		var canvas = document.getElementById(pgn+"dw"+pn);
		var image = localStorage.getItem(pgn+'dwsavep'+pn);
		var imag = sessionStorage.getItem(pgn+'dwsavep'+pn);
		if(image){
			image = JSON.parse(image);
			if(image.length == 3)image.splice(2,1);	
			imag = JSON.parse(imag);
			if(imag.length > 7)imag.splice(7,1);		
			image.splice(0,0,canvas.toDataURL());
			imag.splice(0,0,canvas.toDataURL());
			localStorage.setItem(pgn+'dwsavep'+pn,JSON.stringify(image));
			sessionStorage.setItem(pgn+'dwsavep'+pn,JSON.stringify(imag));
		}else{
			image = [];
			image[0] = canvas.toDataURL();
			localStorage.setItem(pgn+'dwsavep'+pn,JSON.stringify(image));
			sessionStorage.setItem(pgn+'dwsavep'+pn,JSON.stringify(image));
		;}
		localStorage[pgn+'dwsave'+pn] = canvas.toDataURL();
		$('#'+pgn+'dwdo'+pn).hide();	$('#'+pgn+'dwsavep'+pn).data('dwsavep','');
	});
		
	$('#'+pgn+'dwundo'+pn).click(function(event){
		event.preventDefault();			
		var imagvlu = '';
		var image = sessionStorage.getItem(pgn+'dwsavep'+pn);
		if(!image)sessionStorage.setItem(pgn+'dwsavep'+pn,localStorage.getItem(pgn+'dwsavep'+pn));
		var image = JSON.parse(sessionStorage.getItem(pgn+'dwsavep'+pn));
		var lgh = image.length;
		var i = $('#'+pgn+'dwsavep'+pn).data('dwsavep');
		if(!i){i = 1;}else{i = i+1;}
		if(image && lgh>1){$('a#'+pgn+'dwdo'+pn).show();			
		 
		 if(image[i])imagvlu = image[i];
	     if(i < lgh && imagvlu){
			$('#'+pgn+'dwsavep'+pn).data('dwsavep',i);
			var img = new Image();
			img.src = imagvlu;
			dwsym.clearRect( 0 , 0 ,$dwimgs.width(),windowheight);
			img.onload = function(){dwsym.drawImage(img,0,0);}
		 ;}
		;}

	});

	$('#'+pgn+'dwdo'+pn).click(function(event){
		event.preventDefault();	
		var imagvlu = '';
		var image = sessionStorage.getItem(pgn+'dwsavep'+pn);
		var i = $('#'+pgn+'dwsavep'+pn).data('dwsavep')-1;
		if(image){
		image = JSON.parse(image);
		if(!i){imagvlu = image[0];}else{imagvlu = image[i];}	
		if(i>=0)$('#'+pgn+'dwsavep'+pn).data('dwsavep',i);
		var img = new Image();
		img.src = imagvlu;
		dwsym.clearRect( 0 , 0 ,$dwimgs.width(),windowheight);
		img.onload = function(){dwsym.drawImage(img,0,0);};}

	});
	
function dwl(dwl){

	var istouch = 'ontouchstart' in window;
	var action = istouch ? 'touchstart':'mousedown';
	var action1 = istouch ? 'touchmove':'mousemove';
	
	var mouse = '';	var  mobile = '';var position = $dwimgs.position();
		if(action=='touchstart')mobile = 1;
		
	var $dwl=$('#'+dwl);
	$dwl.on(action, function(event){
		if(!mobile)mouse = 1;
		dwsym.beginPath();
		if(mobile){ event.preventDefault();event = event.originalEvent;var x = event.changedTouches[0].pageX-position.left;var y = event.changedTouches[0].pageY-position.top;
		;}else{var x = event.pageX-position.left;var y = event.pageY-position.top;}
		dwsym.moveTo(x,y);
	});
	$dwl.on(action1, function(event){
		if(mobile){
			event.preventDefault();event = event.originalEvent;
			var x = event.changedTouches[0].pageX-position.left;var y = event.changedTouches[0].pageY-position.top;
		;}else if(mouse){
			var x = event.pageX-position.left;var y = event.pageY-position.top;			
		;}
		if(mouse || (!mouse && mobile)){dwsym.lineTo(x,y);dwsym.stroke();}
	});
	$dwl.on("mouseup", function(event){mouse = '';});
};

//vclick
$(document).on('vclick','#'+pgn+'dwimgs'+pn+' .'+pgn+'dwpopm'+pn,function (event) {
		event.preventDefault();	
		var vlu = $(this).attr('data-vlu');
		if(vlu){
		if((vlu.indexOf('.mp3')>0 || vlu.indexOf('.wav')>0) && (vlu.indexOf('http://') !== -1 || vlu.indexOf('https://') !== -1)){
		$('#'+pgn+'dwAUDIO'+pn+' source').attr('src',vlu);
		
		function caltm(t){var h = Math.floor(t/3600);if(h){h=(h < 10 ? '0'+h : h)+":";}else{h='';}var m = Math.floor(t/60); var s = Math.round(t - h*3600 - m*60);var duration = h+(m < 10 ? '0'+m : m)+":"+(s < 10 ? '0'+s : s); return duration;}
		
		function audiotime(attr,nbr){		
		document.getElementById(attr).addEventListener("timeupdate",function(){			
		var currenTime = document.getElementById(attr).currentTime;
		var time = caltm(Math.round(currenTime));
		
		//if(vlu.indexOf('(')!=-1 && vlu.indexOf(')')!=-1){
			//dur = vlu.split('(');
			//durvlu = rgb[1].split(')');
		
		//if(/[0-9 -()+]+$/.test(durvlu(0))){
		
		//timepercentage = Math.ceil(currenTime*100/durvlu(0));
		//if(timepercentage>100)timepercentage=100;
		
		//$('div > div',nbr).height(timepercentage*75/100);
		
		//$('div > div',nbr).text(timepercentage+'%');
		
		//}
		//}
		
   		 $('i',nbr).text(' '+time);
		 $('#'+pgn+'dwplaydur'+pn+'n').text(time);
		});
		}
		
		$('#'+pgn+'dwAUDIO'+pn).load();
		$('#'+pgn+'dwAUDIO'+pn).trigger('play');		
		$('#'+pgn+'dwvctr'+pn).show();		
		//if(vlu.indexOf('(')!=-1 && vlu.indexOf(')')!=-1 && vlu.indexOf('[rgb')!=-1){
			//dur = vlu.split('(');
			//durvlu = rgb[1].split(')');		
		//if(/[0-9 -()+]+$/.test(durvlu(0))){	
			//rgb = vlu.split('[');
			//rgbvlu = rgb[1].split(']');
			//$('div > div',this).css('background-color',rgbvlu(0));	
		//}
		//}		
		audiotime(pgn+'dwAUDIO'+pn,this);		
		}
		}
});


$('#'+pgn+'dwtopos'+pn).click(function(event){ event.preventDefault();
		$("#"+pgn+'dwAUDIO'+pn).prop("currentTime",$('#'+pgn+'dwtoposition'+pn).val()*document.getElementById(pgn+'dwAUDIO'+pn).duration);
});

$('#'+pgn+'dwtopositn'+pn).click(function(event){ event.preventDefault();
		$("#"+pgn+'dwAUDIO'+pn).prop("currentTime",$('#'+pgn+'dwtoposition'+pn).val()*document.getElementById(pgn+'dwAUDIO'+pn).duration);
});

$('#'+pgn+'dwvolm'+pn).click(function(event){ event.preventDefault();
		var volume = $('#'+pgn+'dwvolmn'+pn).val();
		$("#"+pgn+'dwAUDIO'+pn).prop("volume",volume);
});
$('#'+pgn+'dwvoln'+pn).click(function(event){ event.preventDefault();
		var volume = $('#'+pgn+'dwvolmn'+pn).val();
		$("#"+pgn+'dwAUDIO'+pn).prop("volume",volume);
});

$('#'+pgn+'dwPOPvideoz'+pn).click(function(event){event.preventDefault();	
	$dwPOPvideo.popup('close').one( "popupafterclose", function( event, ui ){$POPWRT.popup('open',"transition","pop");});
});

$('#'+pgn+'dwPOPvoicez'+pn).click(function(event){event.preventDefault();		
	$dwPOPvoice.popup('close').one( "popupafterclose", function( event, ui ){$POPWRT.popup('open',"transition","pop");});
});

$('#'+pgn+'dwPOPmsgnz'+pn).click(function(event){event.preventDefault();		
	$('#'+pgn+'dwPOPmsgn'+pn).popup('close').one( "popupafterclose", function( event, ui ){$POPWRT.popup('open',"transition","pop");});
});

$('#'+pgn+'dwPOPimgz'+pn).click(function(event){event.preventDefault();
	$dwPOPimg.popup('close').one( "popupafterclose", function( event, ui ){$POPWRT.popup('open',"transition","pop");});
});



$('#'+pgn+'dwmsgvlun'+pn).click(function(event){
	event.preventDefault();	
	var msg = localStorage.getItem(pgn+"dwmsg"+pn);
	var html ='';
	if(msg){
	var msg = JSON.parse(msg);
	for(var i=0; i < msg.length; i++) {
	var msgvlu = msg[i].split('[dwdw]');
	html += '<a href="#" data-typ="msg" data-vlu="'+msgvlu[1]+'" style="white-space:normal;" class="'+pgn+'dwPOPquick'+pn+' ui-btn ui-btn-w ui-icon-comment ui-btn-icon-left">'+msgvlu[0]+'</a>';
	}
	if(html)$dwPOPmsg.find('div').html(html);
	}
	$POPWRT.popup('close').one( "popupafterclose", function( event, ui ){$('#'+pgn+'dwPOPmsgn'+pn).popup('open',"transition","pop");});
});

$('#'+pgn+'dwvideovlun'+pn).click(function(event){
	event.preventDefault();	
	var video = localStorage.getItem(pgn+"dwvideo"+pn);
	var html ='';
	if(video){
	var video = JSON.parse(video);
	for(var i=0; i < video.length; i++) {
	var videovlu = video[i].split('[dwdw]');
	html += '<a href="#" data-typ="video" data-vlu="'+videovlu[1]+'" style="white-space:normal;" class="'+pgn+'dwPOPquick'+pn+' ui-btn ui-btn-w ui-icon-video ui-btn-icon-left">'+videovlu[0]+'</a>';
	}
	if(html)$dwPOPvideo.find('div').html(html);
	}
	$POPWRT.popup('close').one( "popupafterclose", function( event, ui ){$dwPOPvideo.popup('open',"transition","pop");});
});

$('#'+pgn+'dwvoicevlun'+pn).click(function(event){
	event.preventDefault();	
	var voice = localStorage.getItem(pgn+"dwvoice"+pn);
	var html ='';
	if(voice){
	var voice = JSON.parse(voice);
	for(var i=0; i < voice.length; i++) {
	var voicevlu = voice[i].split('[dwdw]');
	html += '<a href="#" data-typ="voice" data-vlu="'+voicevlu[1]+'"  style="white-space:normal;" class="'+pgn+'dwPOPquick'+pn+' ui-btn ui-btn-w ui-icon-audio ui-btn-icon-left">'+voicevlu[0]+'</a>';
	}
	if(html)$('#'+pgn+'dwPOPvoice'+pn+' div').html(html);
	}
	$POPWRT.popup('close').one( "popupafterclose", function( event, ui ){$dwPOPvoice.popup('open',"transition","pop");});					   
});


$('#'+pgn+'dwimgvlun'+pn).click(function(event){
	event.preventDefault();	
	var img = localStorage.getItem(pgn+"dwimg"+pn);
	
	var html ='';
	if(img){
		if(window.devicePixelRatio !== undefined){var dpr = window.devicePixelRatio*75;}else{var dpr = 75;}
	var img = JSON.parse(img);
	for(var i=0; i < img.length; i++) {
	var imgvlu = img[i].split('[dwdw]');
			if(imgvlu[1].indexOf('http')==-1 && imgvlu[1].indexOf('images/')==-1)imgvlu[1] = 'images/'+imgvlu[1];
			if(document.URL.indexOf('pj=') > 0 && pj)imgvlu[1] = '../panel/'+pj+'/'+imgvlu[1];
	html += '<a href="#" data-typ="img" data-vlu="'+imgvlu[1]+'" style="white-space:normal;" class="'+pgn+'dwPOPquick'+pn+' ui-btn ui-btn-w ui-icon-camera ui-btn-icon-left"><img style="width:'+dpr+'px;height:'+dpr+'px;" src="'+imgvlu[1]+'">'+imgvlu[0]+'</a>';
	}
	if(html)$dwPOPimg.find('div').html(html);
	}	
	$POPWRT.popup('close').one( "popupafterclose", function( event, ui ){$dwPOPimg.popup('open',"transition","pop");});	
});


$(document).on('click','.'+pgn+'dwPOPquick'+pn,function (event) {
	event.preventDefault();	
	$this=$(this);
	var typ = $this.attr('data-typ');
	var vlu = $this.attr('data-vlu');
	if(typ=='msg'){$('#'+pgn+'dwmsgvlu'+pn).val(vlu);
	$dwPOPmsgn.popup('close').one( "popupafterclose", function( event, ui ){$POPWRT.popup('open',"transition","pop");});}
	else if(typ=='video'){$dwvideovlu.val(vlu);
		$dwPOPvideo.popup('close').one( "popupafterclose", function( event, ui ){$POPWRT.popup('open',"transition","pop");});}
	else if(typ=='voice'){$dwvideovlu.val(vlu);
		$dwPOPvoice.popup('close').one( "popupafterclose", function( event, ui ){$POPWRT.popup('open',"transition","pop");});}
	else if(typ=='img'){$('#'+pgn+'dwimgvlu'+pn).val(vlu);
		$dwPOPimg.popup('close').one( "popupafterclose", function( event, ui ){$POPWRT.popup('open',"transition","pop");});}
						   
});


	

	
     'use strict';
	var istouch = 'ontouchstart' in window;
	var startEvent = istouch ? 'touchstart':'mousedown';
	var mouseEvent = istouch ? 'touchmove':'mousemove';
	var endEvent = istouch ? 'touchend':'mouseup';
	
	
	
	$(document).on(startEvent, '#'+pgn+'dwimgs'+pn+' span[data-wbn]',function(event){	
			var wbr = $(this).attr('data-wbn');	
			if(startEvent=='touchstart'){event.preventDefault();event = event.originalEvent;}
 			var movepn = function(event) {event.preventDefault();event = event.originalEvent;
				if(startEvent=='touchstart'){
                $(this).css({
                    top: event.changedTouches[0].pageY - nwpositiony,
                    left: event.changedTouches[0].pageX - nwpositionx,
                });				
				;}else{
                $(this).css({
                    top: event.pageY - nwpositiony,
                    left: event.pageX - nwpositionx,
                });
				}
            };
            var mouseup = function(event) {event.preventDefault();event = event.originalEvent;
                $(this).unbind(endEvent, mouseup );
                $(this).unbind(mouseEvent, movepn);
				if(startEvent=='touchstart'){
                $(this).trigger("dragend", {
                    top: event.changedTouches[0].pageY - nwpositiony,
                    left: event.changedTouches[0].pageX - nwpositionx
                });				
				;}else{
                $(this).trigger("dragend", {
                    top: event.pageY - nwpositiony,
                    left: event.pageX - nwpositionx
                });
				}
				var dws = [];
				var dwiconstyle = localStorage.getItem(pgn+'dwiconstyle'+pn);
				dwiconstyle = JSON.parse(dwiconstyle);
				dws = dwiconstyle[wbr].split('[dw]');
				
				if(startEvent=='touchstart'){
				var style = 'color:'+dws[5]+';font-size:'+dws[4]+'px;position:absolute;top:'+parseFloat(( (event.changedTouches[0].pageY - nwpositiony)*100/$dwimg.height()) ).toFixed(2)+'%;left:'+parseFloat(( (event.changedTouches[0].pageX - nwpositionx)*100/$dwimg.width())).toFixed(2)+'%;';
				;}else{
				var style = 'color:'+dws[5]+';font-size:'+dws[4]+'px;position:absolute;top:'+parseFloat(( (event.pageY - nwpositiony)*100/$dwimg.height()) ).toFixed(2)+'%;left:'+parseFloat(( (event.pageX - nwpositionx)*100/$dwimg.width())).toFixed(2)+'%;';
				}
				
				
				dwiconstyle.splice(wbr,1,style+'[dw]'+dws[1]+'[dw]'+dws[2]+'[dw]'+dws[3]+'[dw]'+dws[4]+'[dw]'+dws[5]+'[dw]'+dws[6]+'[dw]'+dws[7]+'[dw]'+dws[8]);
				if(dwiconstyle)localStorage.setItem(pgn+"dwiconstyle"+pn,JSON.stringify(dwiconstyle)); 
            };
           
               var position = $(this).position();    
			   	if(startEvent=='touchstart'){
                   var nwpositionx = event.changedTouches[0].pageX - position.left;
                   var nwpositiony = event.changedTouches[0].pageY - position.top;
				;}else{
                   var nwpositionx = event.pageX - position.left;
                   var nwpositiony = event.pageY - position.top;
				}
             	
                $(this).on(mouseEvent, movepn);
                $(this).on(endEvent, mouseup );
                $(this).trigger("dragstart", position);
          return this;
	});
	
	
	$('#'+pgn+'dwrmp'+pn).click(function(event) {		event.preventDefault();	
			dwsym.clearRect( 0 , 0 ,$dwimgs.width(),windowheight);							  
	});
	
	$('#'+pgn+'dwstore'+pn+' a').click(function(event) {		event.preventDefault();		

		var canvas = document.getElementById(pgn+"dw"+pn);
		var image = localStorage.getItem(pgn+'dwstore'+pn);
		var nbr = $(this).attr('data-nbr');
	    if($dwstoreshw.data('nbrs')==nbr){
			
			$(this).removeClass('ui-btn-icon-left ui-icon-check');
			
			
			if(!image){
				localStorage[pgn+'dwstore'+pn]=JSON.stringify(["","","","","","","",""]);
				image = JSON.parse(localStorage.getItem(pgn+'dwstore'+pn));
			}else{
				image = JSON.parse(image);
			}
				image.splice(nbr,1,canvas.toDataURL());	
				localStorage.setItem(pgn+'dwstore'+pn,JSON.stringify(image));
			
				image = JSON.parse(localStorage.getItem(pgn+'dwstore'+pn));
			
				var img = new Image();
				img.src = image[nbr];
				img.onload = function(){dwsymshw.drawImage(img,0,0);}
				$dwstoreshw.data('nbrs','');
		
		}else{
			$(this).addClass('ui-btn-icon-left ui-icon-check');
			$dwstoreshw.data('nbrs',nbr);
		}
	});
	
	
	$('#'+pgn+'dwrtstore'+pn+' a').click(function(event) {		event.preventDefault();		
		var nbr = $(this).attr('data-nbr');
		var image = JSON.parse(localStorage.getItem(pgn+'dwstore'+pn));
		
		$('#'+pgn+'dwstore'+pn+' a').removeClass('ui-btn-icon-left ui-icon-check');
		$dwstoreshw.data('nbrs',nbr);
		
		if($dwstoreshw.data('nbr')==nbr){			
			var img = new Image();
			img.src = image[nbr];
			img.onload = function(){dwsym.drawImage(img,0,0);}
			$dwstoreshw.data('nbr','');
			$dwICONpop.popup('close');
			
		}else{
			$dwstoreshw.html('<canvas id="'+pgn+'dwstores'+pn+'" width="'+windowwidth+'" height="'+windowheight+'"></canvas>');	
			dwsymshw=document.getElementById(pgn+'dwstores'+pn).getContext("2d");
			var img = new Image();
			img.src = image[nbr];
			img.onload = function(){dwsymshw.drawImage(img,0,0);}
			$dwstoreshw.data('nbr',nbr);
		;}
		
		
	});
}


function dwimgajax(pgn,pn,ints,urls){ 

	if(ints && urls){
		$.ajax({
   		type: 'GET',
    	url: ints,
    	async: false,
    	jsonpCallback: 'datp',
    	contentType: 'application/json',
    	dataType: 'jsonp',
        success: dapts});
		function dapts(data) { var jsclv = localStorage.getItem(pgn+'dwjsclv'+pn);if(jsclv){jsclv = JSON.parse(jsclv);}else{var jsclv =[];jsclv[0]=0;}
	
		if(data.btn[0].jsclv > jsclv[0] || jsclv.length==1){
				 if(jsclv.length>1){	
				 	jsclv.splice(0,1,data.btn[0].jsclv);jsclv.splice(1,1,data.btn[0].update);
				 }else{
				 	jsclv[0]= data.btn[0].jsclv;jsclv[1]= data.btn[0].update;
				 ;}
				 localStorage.setItem(pgn+'dwjsclv'+pn,JSON.stringify(jsclv));
				 var vp = 1;
			;}else{
				 var vp = '';
			}
		if(vp){
		$.mobile.loading( "show", { text: "loading...", textVisible: true,theme: "a",html: ""});	
		$.ajax({
   		type: 'GET',
    	url: urls,
    	async: false,
    	jsonpCallback: 'datp',
    	contentType: 'application/json',
    	dataType: 'jsonp',
        success: datp});
		
		function datp(data) { 			
			var msgj=0;var videoj=0;var voicej=0;var imgj=0;
			var msgtitle = [];var videotitle = [];var voicetitle =[];var imgtitle =[];
		for(var i=0; i < data.btn.length; i++) {	 
		    	if(data.btn[i].typ=='msg'){
				msgtitle[msgj] = data.btn[i].title+'[dwdw]'+data.btn[i].html;msgj++;}
				else if(data.btn[i].typ=='video'){
				videotitle[videoj] = data.btn[i].title+'[dwdw]'+data.btn[i].html;videoj++;}
				else if(data.btn[i].typ=='voice'){
				voicetitle[voicej] = data.btn[i].title+'[dwdw]'+data.btn[i].html;voicej++;}
				else if(data.btn[i].typ=='img'){
				imgtitle[imgj] = data.btn[i].title+'[dwdw]'+data.btn[i].html;imgj++;}					
		;}//for(var
			
				if(msgtitle.length){
				localStorage.setItem(pgn+"dwmsg"+pn,JSON.stringify(msgtitle));}
				else if(videotitle.length){
				localStorage.setItem(pgn+"dwvideo"+pn,JSON.stringify(videotitle));}
				else if(voicetitle.length){
				localStorage.setItem(pgn+"dwvoice"+pn,JSON.stringify(voicetitle));}
				else if(imgtitle.length){
				localStorage.setItem(pgn+"dwimg"+pn,JSON.stringify(imgtitle));}	
		

		$.mobile.loading( "hide");
		;}//function datp(data)
		;}//if(localStorage.getItem(pgn+'jsclds'+pn)){
		;}//function dapts(data)
		;}//if(ints && url){

}