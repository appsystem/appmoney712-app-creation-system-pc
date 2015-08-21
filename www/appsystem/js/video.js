/*! jQuery Mobile 1.4.4 | <> 2014-09-12T16:43:26Z | (c) 2010, 2014 jQuery Foundation, Inc. | jquery.org/license */
 
function popupvideo(pgn,pn,popupVideo,url,typ,fit,btn) {

if(fit){
var vfit = sessionStorage.getItem(popupVideo);
if(!vfit)sessionStorage.setItem(popupVideo,'1');
}

if(btn){sessionStorage.setItem(popupVideo+'btn','1');}else{sessionStorage.setItem(popupVideo+'btn','');}

if(typ){
		$.ajax({
   		type: 'GET',
    	url: url,
    	async: false,
    	jsonpCallback: 'datp',
    	contentType: 'application/json',
    	dataType: 'jsonp',
        success: datp});
		
		function datp(data){var popupVideo = data.btn[0].nbr;var verVideo = data.btn[0].ver;
			var ver = '';var vVideo = '';
			if(verVideo){ver = sessionStorage.getItem(popupVideo+'ver');
					if(ver != verVideo)var vVideo = 1;
					sessionStorage.setItem(popupVideo+'ver',verVideo);
			}
					
			
			$( "#"+popupVideo+'title').text(data.btn[0].vtitle);
			
			if(sessionStorage.getItem(popupVideo+'btn')){
			
			if(!ver || vVideo)$( "#"+popupVideo+'tj').attr('data-url',data.btn[0].video);
			
			;}else{
			$( "#"+popupVideo+" iframe" ).attr( "width", 0 ).attr( "height", "auto" );
			$( "#"+popupVideo ).on({
    		popupbeforeposition: function() {
            var wdWidth = $( window ).width();
            var wdHeight = $( window ).height();
            var sizewidth = '';var sizeheight = '';
			var vfit = sessionStorage.getItem(pgn+'pVideo'+pn);
			if(vfit){
			sizeheight = wdHeight;sizewidth = wdWidth;
			;}else{
            if(wdWidth > wdHeight){sizeheight = wdHeight*0.85;sizewidth = sizeheight*498/298;}
			if(wdHeight > wdWidth){sizewidth = wdWidth*0.85; sizeheight = sizewidth*298/498;}
			;}
            var size = scale(sizewidth, sizeheight, 1, 1 ),
                wdh = size.width,
                hgt = size.height;
            $( "#"+popupVideo+" iframe" )
                .attr( "width", wdh )
                .attr( "height", hgt )
             .attr( "src", data.btn[0].video );
       		 },
       		 popupafterclose: function() {
            $( "#"+popupVideo+" iframe" )
                .attr( "width", 0 )
                .attr( "height", 0 )
            .attr( "src", '' );
            
       		 }
			});	
			
			;}//;}else{
			
		;}

;}else{
		
		
			
$( "#"+popupVideo+" iframe" )
        .attr( "width", 0 )
        .attr( "height", "auto" );
$( "#"+popupVideo ).on({
    popupbeforeposition: function() {
            var wdWidth = $( window ).width();
            var wdHeight = $( window ).height();
            var sizewidth = '';var sizeheight = '';
			var vfit = sessionStorage.getItem(pgn+'pVideo'+pn);
			if(vfit){
			sizeheight = wdHeight;sizewidth = wdWidth;
			;}else{
            if(wdWidth > wdHeight){sizeheight = wdHeight*0.85;sizewidth = sizeheight*498/298;}
			if(wdHeight > wdWidth){sizewidth = wdWidth*0.85; sizeheight = sizewidth*298/498;}
			;}
            var size = scale(sizewidth, sizeheight, 1, 1 ),
                wdh = size.width,
                hgt = size.height;
            $( "#"+popupVideo+" iframe" )
                .attr( "width", wdh )
                .attr( "height", hgt )
             .attr( "src", url );
        },
        popupafterclose: function() {
            $( "#"+popupVideo+" iframe" )
                .attr( "width", 0 )
                .attr( "height", 0 )
            .attr( "src", '' );
            
        }
});
}
};
//---------------------------------------------------------------------------------------------------------//

function video(Video,url,typ,btn) {
if(typ){
	if(btn){sessionStorage.setItem(Video+'btn','1');}else{sessionStorage.setItem(Video+'btn','');}
	$.ajax({
   		type: 'GET',
    	url: url,
    	async: false,
    	jsonpCallback: 'datp',
    	contentType: 'application/json',
    	dataType: 'jsonp',
        success: datp});
		
		
		
		function datp(data) { var Video = data.btn[0].nbr;var verVideo = data.btn[0].ver;
			var ver = '';var vVideo = '';
			if(verVideo){ver = sessionStorage.getItem(Video+'ver');
					if(ver != verVideo)var vVideo = 1;
					sessionStorage.setItem(Video+'ver',verVideo);
			}
			
		$( "#"+Video+'title').text(data.btn[0].vtitle);
		
		if(sessionStorage.getItem(Video+'btn')){
			
			if(!ver || vVideo)$( "#"+Video+'tj').attr('data-url',data.btn[0].video);
			
		;}else{
		
		var wdWidth = $( window ).width();
            var wdHeight = $( window ).height();
            var sizewidth = '';var sizeheight = '';
            if(wdWidth > wdHeight){sizeheight = wdHeight*0.85;sizewidth = sizeheight*498/298;}
			if(wdHeight > wdWidth){sizewidth = wdWidth*0.85; sizeheight = sizewidth*298/498;}
            var size = scale(sizewidth, sizeheight, 1, 1 ),
                wdh = size.width,
                hgt = size.height;
            $( "#"+Video+" iframe" )
                .attr( "width", wdh )
                .attr( "height", hgt )
				.attr( "src",  data.btn[0].video );
		;}
		;}//;}else{

;}else{
            var wdWidth = $( window ).width();
            var wdHeight = $( window ).height();
            var sizewidth = '';var sizeheight = '';
            if(wdWidth > wdHeight){sizeheight = wdHeight*0.85;sizewidth = sizeheight*498/298;}
			if(wdHeight > wdWidth){sizewidth = wdWidth*0.85; sizeheight = sizewidth*298/498;}
            var size = scale(sizewidth, sizeheight, 1, 1 ),
                wdh = size.width,
                hgt = size.height;
            $( "#"+Video+" iframe" )
                .attr( "width", wdh )
                .attr( "height", hgt )
				.attr( "src", url );
}
};     

