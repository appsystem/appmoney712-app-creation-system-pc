/*AppMoney712 APP Creation System || 01 - AUG -2015 || Copyright LEE WAI KWOK(JSTRUST CONSULTANCY) || license - Revised MIT.*/
function popupics(pgn,pn,ints,url,nbr) { 
		$.ajax({
   		type: 'GET',
    	url: ints,
    	async: false,
    	jsonpCallback: 'datp',
    	contentType: 'application/json',
    	dataType: 'jsonp',
        success: dapts});
		function dapts(data) {var jscldv = localStorage.getItem(pgn+'vpopupics'+pn);if(jscldv){jscldv = JSON.parse(jscldv);}else{jscldv ='';jscldv[0]=0;}
		
			if(data.btn[0].jscldv > jscldv[0] || !jscldv){
				 if(jscldv){
					 jscldv.splice(0,1,data.btn[0].jscldv);jscldv.splice(1,1,data.btn[0].update);
					 jscldv.splice(2,1,data.btn[0].img);jscldv.splice(3,1,data.btn[0].title);jscldv.splice(4,1,data.btn[0].ftr);
				 }else{
					 var jscldv = [];
				 	 jscldv[0]= data.btn[0].jscldv;jscldv[1]= data.btn[0].update;
					 jscldv[2]= data.btn[0].img;jscldv[3]= data.btn[0].title;jscldv[4]= data.btn[0].ftr;
				 ;}
				 localStorage.setItem(pgn+'vpopupics'+pn,JSON.stringify(jscldv));
				 var popuppics = data.btn[0].title+'<br><img style="width:100%" src="'+data.btn[0].img+'" ><br>'+data.btn[0].ftr;
				$('#'+pgn+'popuppics'+pn).html(popuppics);
				 var vp = 1;
			;}else{
				var popupics = JSON.parse(localStorage.getItem(pgn+'popupics'+pn));
				var popuppics = jscldv[3]+'<br><img style="width:100%" src="'+jscldv[2]+'" ><br>'+jscldv[4];
				$('#'+pgn+'popuppics'+pn).html(popuppics);
				$('#'+pgn+'swiperwidth'+pn+'s0').attr('src',popupics[0][0]);
				for(var i=1; i < nbr; i++) {
				var $swiperalbum = $('#'+pgn+'swiperalbum'+pn+'s'+i);
				$('#'+pgn+'swiperwidth'+pn+'s'+i).attr('data-src',popupics[0][i]);
				if(popupics[1][i]){
					$swiperalbum.find('div').css('color',popupics[2][i]).html(popupics[1][i]);
					if(popupics[2][i])$swiperalbum.css('background-color',popupics[3][i]);	
				}	
				;}//for(var
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
		
			function datp(data){ 
			if(data.btn[0].img.length < 350000){
				localStorage[pgn+'popupics'+pn] = data.btn[0].img;
			}
						
			var popupics = JSON.parse(localStorage.getItem(pgn+'popupics'+pn));
				$('#'+pgn+'swiperwidth'+pn+'s0').attr('src',popupics[0][0]);				
				for(var i=0; i < nbr; i++) {
				var $swiperalbum = $('#'+pgn+'swiperalbum'+pn+'s'+i);
				if(i)$('#'+pgn+'swiperwidth'+pn+'s'+i).attr('data-src',popupics[0][i]);
				if(popupics[1][i]){
					$swiperalbum.find('div').css('color',popupics[2][i]).html(popupics[1][i]);
					if(popupics[2][i])$swiperalbum.css('background-color',popupics[3][i]);	
				}	
				;}//for(var
			$.mobile.loading( "hide");
			;}//function datp(data)
		;}//if(vp){
		;}//function dapts(data)		
};



