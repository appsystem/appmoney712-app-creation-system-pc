/*AppMoney712 APP Creation System || 01 - AUG -2015 || Copyright LEE WAI KWOK(JSTRUST CONSULTANCY) || license - Revised MIT.*/
function fastbtn(pj,ap,windowHeight,windowWidth){	  

$("."+pj+ap+"vwul").height(windowHeight*0.88);

var $vw =$("#"+pj+ap+"vw");
//if(windowWidth < 350)$vw.find(".panelv").hide();
var $vwdata =$("#"+pj+ap+"vwdata");
var $vlucount =$("#"+pj+ap+"vlucount");
var $vlucounts =$("#"+pj+ap+"vlucounts");
var $vwshgtns = $vw.find("."+pj+ap+"vwshgtns");
var $vwtips = $("#"+pj+ap+"vwtips");
var $kvlu = $("."+pj+ap+"kvlu");
var $vwvn = $("#"+pj+ap+"vwvn");
var $vwvnsort = $("#"+pj+ap+"vwvnsort");
var typ = $vw.attr("data-typ");
if(typ){var uibtninline = 'ui-btn-inline';}else{var uibtninline = '';}
	
$vw.data("vwnbr",1).data("alt","").data("vwmny",[""]).data("vwmnyn",[""]).data("vwunt",[""]).data("vwdt",[""]).data("vwpopup",[""]).data("vwuntn",[""]).data("vwdata",[""]).data("vwnbrs",[""]);
$("."+pj+ap+"sltptn").click(function (event){
	event.preventDefault();
	var $this =$(this);
	
	$("#"+pj+ap+"vwdatn").hide("slow");
	var alt = $vw.data("alt");if(!alt)alt='';
	var vwnmny = $this.attr("data-mny");if(!vwnmny)vwnmny='';
	var vwnunt = $this.attr("data-unit");	if(!vwnunt)vwnunt='';
	var vwnmnytyp = $this.attr("data-mnytyp");if(!vwnmnytyp)vwnmnytyp='';		
	var vwdt = $this.attr("data-units");if(!vwdt)vwdt='';
	var vwdata = $this.attr("data-option");if(!vwdata)vwdata='';
	var vwpopup = $this.attr("data-popup");if(!vwpopup)vwpopup='';
	var vwnbrbtn = $this.attr("data-nbrbtn");if(!vwnbrbtn)vwnbrbtn='';
	$vw.data("openpopup",$this.attr("data-popup"));
	var nbrbtnvlu = '';
	if(alt){
		var $alt=$("#"+alt);var vwvlu = '';
		var vlu = $alt.text().split(".");
		$alt.html(vlu[0]+'.<span class="pigss-pencil"></span>'+$this.attr("data-option"));
		var vwnbrs = $vw.data("vwnbrs");
		for(var i=0;i<vwnbrs.length;i++){
			if(vlu[0]==vwnbrs[i])vwvlu = i;
		};
		
		var preuntn = $vw.data("vwuntn")[vwvlu];
		var preunt = $vw.data("vwunt")[vwvlu];
		if(vwnmny){$vw.data("vwmny").splice(vwvlu,1,vwnmny);}else{$vw.data("vwmny").splice(vwvlu,1,'');}	
		if(vwnmnytyp){$vw.data("vwmnyn").splice(vwvlu,1,vwnmnytyp);}else{$vw.data("vwmnyn").splice(vwvlu,1,'');}	
		if(vwnunt){$vw.data("vwuntn").splice(vwvlu,1,vwnunt);}else{$vw.data("vwuntn").splice(vwvlu,1,'');}	
		if(vwnunt && vwdt){$vw.data("vwdt").splice(vwvlu,1,vwdt);}else{$vw.data("vwdt").splice(vwvlu,1,'');}
		$vw.data("vwdata").splice(vwvlu,1,vwdata);
		$vw.data("vwpopup").splice(vwvlu,1,vwpopup);
		
		
		$vlucount.html('');
		if(vwnmny && vwnunt && !vwdt && preunt.toString().indexOf(".")!=-1){$vlucount.prepend(vwdata+'<br>'+vwnmnytyp+vwnmny+' x 1'+vwnunt);}
		else if(vwnmny && vwnunt && vwnunt!=preuntn){$vlucount.prepend(vwdata+'<br>'+vwnmnytyp+vwnmny+' x 1'+vwnunt);}
		else if(vwnmny && vwnunt){$vlucount.prepend(vwdata+'<br>'+vwnmnytyp+vwnmny+' x '+$vw.data("vwunt")[vwvlu]+vwnunt+'='+vwnmnytyp+(parseInt(vwnmny)*parseFloat($vw.data("vwunt")[vwvlu]) ) );}
		else if(vwnmny){$vlucount.prepend(vwdata+'<br>'+vwnmnytyp+vwnmny+' x 1'+vwnunt);}
		else{$vlucount.prepend('');}
		
		if(vwnmny && vwnunt && !vwdt && preunt.toString().indexOf(".")!=-1){
			var vluunt = parseInt(vlu[0])-1;
				$("#sltptn"+vluunt).html(vluunt+'.<span class="pigss-pencil" style="color:pink"></span> 1'+vwnunt);
				 $vw.data("vwunt").splice(vwvlu,1,1);
		}
		
		$vw.data("alt",'');

	}else{
		var vwnbr = $vw.data("vwnbr");
		if(vwnunt){var sltptnvwnbr = parseInt(vwnbr)+1;}else{var sltptnvwnbr = vwnbr;}
		if(vwnunt){
			
			if(vwnbrbtn){nbrbtnvlu = vwnbrbtn;}else{nbrbtnvlu = 1;}
			$vwdata.append('<div href="#" id="sltptn'+vwnbr+'" ids="'+vwnbr+'" style="border-color:black;font-size:1em;" class="'+pj+ap+'optionunt ui-btn ui-btn-y '+uibtninline+' ui-mini">'+vwnbr+'.<span class="pigss-pencil" style="color:pink"></span> '+nbrbtnvlu+vwnunt+'</div>');
			$vw.data("vwnbrs").push(vwnbr);	
			$vw.data("inpvwunt",vwnbr);
			$vw.data("vwmny").push('');
			$vw.data("vwmnyn").push('');
			$vw.data("vwunt").push(nbrbtnvlu);
			$vw.data("vwuntn").push(vwnunt);
			$vw.data("vwdt").push('');
			$vw.data("vwdata").push('');
			$vw.data("vwpopup").push('');
		}else{
			$vw.data("inpvwunt",'');
		}
		
		if(vwnmny){var bords = 'x';}else{var bords = 'y';}
		$vwdata.append('<a id="sltptn'+sltptnvwnbr+'" data-popup="'+vwpopup+'" style="white-space:normal;padding:10px;cursor:pointer;" class="'+pj+ap+'option ui-btn ui-btn-'+bords+' '+uibtninline+' ui-mini">'+sltptnvwnbr+'. <span class="pigss-pencil"></span>'+vwdata+'</a>');
		//$vwdata.scrollTop($vwdata.scrollTop() + $('#sltptn'+sltptnvwnbr).position().top);
		

		
		$vwshgtns.height(windowHeight-$vwshgtns.position().top);
		$vwshgtns.scrollTop($vwdata.height());	
	
		if(vwnunt){$vw.data("vwnbr",(parseInt(vwnbr)+2));}else{$vw.data("vwnbr",(parseInt(vwnbr)+1));}		
	
	if(vwnmny){$vw.data("vwmny").push(vwnmny);}else{$vw.data("vwmny").push('');}
	if(vwnmnytyp){$vw.data("vwmnyn").push(vwnmnytyp);}else{$vw.data("vwmnyn").push('');}
	if(vwnunt){$vw.data("vwunt").push(nbrbtnvlu);}else{$vw.data("vwunt").push('');}
	if(vwnunt){$vw.data("vwuntn").push(vwnunt);}else{$vw.data("vwuntn").push('');}
	if(vwnunt && vwdt){$vw.data("vwdt").push(nbrbtnvlu);}else{$vw.data("vwdt").push('');}
	$vw.data("vwdata").push(vwdata);
	$vw.data("vwpopup").push(vwpopup);	
	$vw.data("vwnbrs").push(sltptnvwnbr);	
		
	$vlucount.html('');
	if(vwnmny){$vlucount.append(vwdata+'<br>'+vwnmnytyp+vwnmny+' x '+nbrbtnvlu+vwnunt);}else{$vlucount.prepend('');}		
	;}
	 
	var datatip = $(this).attr("data-tip");
	if(datatip){$vwtips.height('');if(windowWidth > 750){$vwtips.css('width','20%');$vwtips.css('max-height',windowHeight/2.2);br='<br><br>';}else{$vwtips.css('width','');$vwtips.css('max-height',windowHeight/5.5);br='';}$vwtips.show("slow");$vwtips.html('<div style="padding:10px;background:rgba(35, 145, 234, 0.8);color:pink;"><span id="'+pj+ap+'datatip" class="ui-btn ui-btn-z ui-btn-inline" style="float:right;font-size:18px;padding:5px;"> X </span>'+br+'<span id="'+pj+ap+'tipop" class="ui-btn ui-btn-a ui-btn-inline pigss-info" style="float:left;padding:2px;font-size:28px;color:pink;"></span><div><br>'+datatip+'</div></div>');
	
	
	if(windowWidth <= 750){setTimeout(function(){$vwtips.css('width','50%');},980);}
	$("#"+pj+ap+"vwtipops").find('div').html('<br><br>'+datatip);
	
	}else{$vwtips.html("");$("#"+pj+ap+"vwtipops").html('');}
	
	
	if(vwpopup)$(vwpopup).popup("close").one( "popupafterclose", function( event, ui ){$vw.popup('open',"transition","pop");});	

	var vwunt = $vw.data("vwunt");
	var vwnmny = $vw.data("vwmny");
	var vwnmnyw = $vw.data("vwmnyn");

	var mny = 0;var vwnnys = '';var vw ='';
	for(var i=1;i<vwnmny.length;i++){
		if(vwnmny[i] && vwunt[i]){mny += parseFloat(vwnmny[i])*parseFloat(vwunt[i]);
		;}else if(vwnmny[i]){mny += parseFloat(vwnmny[i]);}	
		if(vwnmnyw[i] && !vwnnys)vwnnys = vwnmnyw[i];
	;}
	if(mny){
		
		
		var vtmsg = $vlucounts.attr("data-tmsg");
		if(vtmsg){vtmsg = ' ['+vtmsg+']';}else{vtmsg = '';}
		$vlucounts.html("<HR>"+vwnnys+" "+mny+vtmsg);
	
		var vtimes = parseInt($vlucounts.attr("data-times"));
		var vplus = parseInt($vlucounts.attr("data-plus"));
		var vplusn = parseInt($vlucounts.attr("data-plusn"));
		var vplusmsg = $vlucounts.attr("data-plusmsg");
		if(vtimes || vplus || vplusn){
		 if(!vtimes)vtimes = 100;if(!vplus)vplus = 0;if(!vplusn)vplusn = 100;
		 if(vplusmsg){vplusmsg = ' ['+vplusmsg+']';}else{vplusmsg = '';}
		  var plusvlu = (mny*vtimes/100 + vplus)*vplusn/100;
		  $vlucounts.append("<HR>"+vwnnys+" "+plusvlu+vplusmsg);
		}
		
	}else{$vlucounts.html('');}
;})

$(document).on("click", "#"+pj+ap+"tipop",function () {
	$vw.popup('close').one( "popupafterclose", function( event, ui ){$("#"+pj+ap+"vwtipop").popup("open");});
})

$(document).on("click", "#"+pj+ap+"vwtipoppopn",function () {
	$("#"+pj+ap+"vwtipop").popup('close').one( "popupafterclose", function( event, ui ){$vw.popup("open");});
})


$(document).on("click", "#"+pj+ap+"datatip",function () {
	$(this).hide();
	$vwtips.find('div > div').hide();
	$vwtips.find('div').css({'background':'none'});
	$vwtips.css({'width':'15%','overflow-y':'hidden'});
})



$vw.one("popupafteropen", function( event, ui ){
	$('html, body').animate({scrollTop: $(this).offset().top});
});

$vw.one("popupafterclose", function( event, ui ){
	var vwpopup = $vw.data("openpopup");
	if(vwpopup)$('html, body').animate({scrollTop: $(vwpopup).offset().top-150});
});

$(document).on("click", "."+pj+ap+"optionunt",function () {
$vw.popup('close').one( "popupafterclose", function( event, ui ){$("#"+pj+ap+"vwsnbrvlu").popup("open");});
var ids = $(this).attr("ids");
var vwvlu = $.inArray(ids, $vw.data("vwnbrs"));
$kvlu.attr("ids",ids);
$kvlu.text(''); 
})

$(document).on("click", "."+pj+ap+"option",function (event) {
	event.preventDefault();
	$("."+pj+ap+"optionrm").show();
	var vwnbr = $(this).attr("id");
	var datapopup = $(this).attr("data-popup");
	$vw.data("alt",vwnbr);
	$vw.popup("close");
	if(datapopup){$vw.one( "popupafterclose", function() {
		if($vw.data("alt")){
			$('html, body').animate({scrollTop: $(datapopup).offset().top-50});
			$(datapopup).popup();
    		$(datapopup).popup("open");
		} 
	});
	} 
})


$( "div[id^="+pj+ap+"vw]").on( "popupafterclose", function( event, ui ) {
$("."+pj+ap+"optionrm").hide();
});


$("."+pj+ap+"vwspopups").on( "popupafterclose", function( event, ui ) {
   $vw.data("alt","").data("slfpn","");
});

$("#"+pj+ap+"vwfbtn").click(function (){
   $("#"+pj+ap+"selfbtns").show();
});

$("#"+pj+ap+"orderinfbtn").click(function (){event.preventDefault();	
	$("#"+pj+ap+"orderinfo").show();								
});

$("#"+pj+ap+"orderinf").click(function (){
	$("#"+pj+ap+"orderinfo").hide();								
});

$("#"+pj+ap+"vwvp").click(function (){
	var htmls = '';var sorthtml = '';var ty ='';var mny ='';
	$vwvn.html('');$vwvnsort.html('');$("#"+pj+ap+"orderinfo").hide();
	var vwn= $vw.data("vwnbrs");
	var vwmny= $vw.data("vwmny");
	var vwmnyn= $vw.data("vwmnyn");
	var vwunt= $vw.data("vwunt");
	var vwuntn= $vw.data("vwuntn");
	var vwdata= $vw.data("vwdata");
	for(var i=1;i<vwn.length;i++){
	if(vwuntn[i]){ty = ' '+vwunt[i]+' '+vwuntn[i]+' x '+' ';}else{ty = ' ';}
	
	
	if(vwdata[i] && vwmny[i]){
		if(vwunt[i]){var vwuntsn = vwn[i-1]+'*';}else{var vwuntsn = '';}
		sorthtml += '<a href="#" idn="'+i+'" ntp="" class="'+pj+ap+'inserto ui-btn ui-btn-x ui-btn-inline ui-mini" style="width:95%;white-space:normal;padding:10px;cursor:pointer;">['+vwuntsn+vwn[i]+']'+ty+vwdata[i]+' ['+ty+' '+vwmnyn[i]+' '+vwmny[i];
		htmls += '<a class="ui-btn ui-btn-x ui-btn-inline ui-mini" style="width:95%;white-space:normal;padding:10px;cursor:pointer;"> ['+vwuntsn+vwn[i]+']'+ty+vwdata[i]+' ['+ty+' '+vwmnyn[i]+' '+vwmny[i];
		if(vwunt[i] && vwmny[i]){htmls += ' = '+vwmnyn[i]+' '+(parseFloat(vwmny[i])*parseFloat(vwunt[i]));sorthtml += ' = '+vwmnyn[i]+' '+(parseFloat(vwmny[i])*parseFloat(vwunt[i]));}
		htmls += ']</a>';sorthtml += ']<span></span></a>';}
	else if(vwdata[i]){
		sorthtml += '<a href="#" idn="'+i+'" ntp="" class="'+pj+ap+'inserto ui-btn ui-btn-y ui-btn-inline ui-mini" idn="'+i+'" nbr="'+vwn[i]+'" style="width:95%;white-space:normal;padding:10px;cursor:pointer;">['+vwn[i]+']'+ty+vwdata[i]+'<span></span></a>';
		htmls += '<div class="'+pj+ap+'vwv ui-btn ui-btn-y ui-btn-inline ui-mini" idn="'+i+'" nbr="'+vwn[i]+'" style="width:95%;white-space:normal;padding:10px;cursor:pointer;"><span class="pigss-pencil" style="color:pink"></span> ['+vwn[i]+']'+ty+vwdata[i]+'</div>';}
	
	//if(vwdata[i])htmls += '<a href="#" idn="'+i+'" ntp="" class="'+pj+ap+'inserto ui-btn ui-btn-inline ui-btn-icon-left ui-icon-arrow-l ui-mini" style="border-color:pink;cursor:pointer;display:none;">&nbsp;</a>'
	;}
	$vwvn.append(htmls);
	$vwvnsort.append(sorthtml);
});

$(document).on("click", "."+pj+ap+"vwv",function (event) {
	event.preventDefault();$this=$(this);
	var $inserto = $("."+pj+ap+"inserto");
	$inserto.attr("ntp",$this.attr("idn"));	
	$inserto.find("span").html("<br><span style='color:red'> >>> "+$this.text()+'</span>');
	$("#"+pj+ap+"vwv").popup('close').one( "popupafterclose", function( event, ui ){$("#"+pj+ap+"vwvs").popup('open',"transition","pop");});
});

$("#"+pj+ap+"vwvsbtn").click(function (event){event.preventDefault();
   	$("#"+pj+ap+"vwvs").popup('close').one( "popupafterclose", function( event, ui ){$("#"+pj+ap+"vwv").popup('open',"transition","pop");});
});


$(document).on("click", "."+pj+ap+"inserto",function (event) {
	event.preventDefault();
	$this=$(this);
	var idn = $this.attr("idn");
	var ntp = $this.attr("ntp");
	var $inserto = $("."+pj+ap+"inserto");
		
	if(idn!=ntp){
	   function insert(pj,ap,snbr,nnbr,typ){
		var snbrvlu = $vw.data(typ)[snbr];
		$vw.data(typ).splice(snbr,1);
		if(parseInt(snbr)>parseInt(nnbr)){var nnbrs = parseInt(nnbr)+1;}else{var nnbrs = nnbr;} 
		$vw.data(typ).splice(nnbrs,0,snbrvlu);
	   }
	insert(pj,ap,ntp,idn,"vwmny");
	insert(pj,ap,ntp,idn,"vwmnyn");
	insert(pj,ap,ntp,idn,"vwunt");
	insert(pj,ap,ntp,idn,"vwuntn");
	insert(pj,ap,ntp,idn,"vwdt");
	insert(pj,ap,ntp,idn,"vwdata");
	insert(pj,ap,ntp,idn,"vwnbrs");
	insert(pj,ap,ntp,idn,"vwpopup");
	

	var htmls = ''; var sorthtml = '';var ty ='';var mny =''; var htmln = ''; 
	$inserto.hide('slow');
	$inserto.find("span").html('');
	var vwn= $vw.data("vwnbrs");
	var vwmny= $vw.data("vwmny");
	var vwmnyn= $vw.data("vwmnyn");
	var vwunt= $vw.data("vwunt");
	var vwuntn= $vw.data("vwuntn");
	var vwdata= $vw.data("vwdata");//data-option
	var vwdt= $vw.data("vwdt");
	var vwpopup = $vw.data("vwpopup");
	for(var i=1;i<vwn.length;i++){
	if(vwuntn[i]){ty = ' '+vwunt[i]+' '+vwuntn[i]+' x '+' ';}else{ty = ' ';}
	if(vwunt[i]){var vwuntsn = vwn[i-1]+'*';}else{var vwuntsn = '';}
	if(vwdata[i] && vwmny[i]){
		sorthtml += '<a href="#" idn="'+i+'" ntp="" class="'+pj+ap+'inserto ui-btn ui-btn-x ui-btn-inline ui-mini"  style="white-space:normal;width:95%;padding:10px;cursor:pointer;">['+vwuntsn+vwn[i]+']'+ty+vwdata[i]+' ['+ty+' '+vwmnyn[i]+' '+vwmny[i];
		htmls += '<a class="ui-btn ui-btn-x ui-btn-inline ui-mini" style="white-space:normal;width:95%;padding:10px;cursor:pointer;"> ['+vwuntsn+vwn[i]+']'+ty+vwdata[i]+' ['+ty+' '+vwmnyn[i]+' '+vwmny[i];
	if(vwunt[i] && vwmny[i]){htmls += ' = '+vwmnyn[i]+' '+(parseFloat(vwmny[i])*parseFloat(vwunt[i]));sorthtml += ' = '+vwmnyn[i]+' '+(parseFloat(vwmny[i])*parseFloat(vwunt[i]));}
	htmls += ']</a>';sorthtml += ']<span></span></a>';}
	else if(vwdata[i]){
	sorthtml += '<a href="#" idn="'+i+'" ntp="" class="'+pj+ap+'inserto ui-btn ui-btn-y ui-btn-inline ui-mini" idn="'+i+'" nbr="'+vwn[i]+'"  style="width:95%;white-space:normal;padding:10px;cursor:pointer;">['+vwn[i]+']'+ty+vwdata[i]+'<span></span></a>';
	htmls += '<div class="'+pj+ap+'vwv ui-btn ui-btn-y ui-btn-inline" idn="'+i+'" nbr="'+vwn[i]+'" style="width:95%;white-space:normal;padding:10px;cursor:pointer;"><span class="pigss-pencil" style="color:pink"></span> ['+vwn[i]+']'+ty+vwdata[i]+'</div>';}
	
	//if(vwdata[i])htmls += '<a href="#" idn="'+i+'" ntp="" class="'+pj+ap+'inserto ui-btn ui-btn-inline ui-btn-icon-left ui-icon-arrow-l" style="border-color:pink;cursor:pointer;display:none;">&nbsp;</a>';
	
	;}
	$vwvn.html(htmls);
	$vwvnsort.html(sorthtml);
	
	
	htmls ='';
	var selfbtnsborder = '';
	//var selfbtnsborder = $("#"+pj+ap+"selfbtns").attr('data-border');if(!selfbtnsborder){selfbtnsborder='';}else{selfbtnsborder='border-style:double;border-color:'+selfbtnsborder+';';}
	
	for(var i=1;i<vwn.length;i++){
	if(!vwdata[i]){
	if(vwunt[i]){vwuntvlu=vwunt[i];}else{vwuntvlu='';}
	if(vwuntn[i]){vwuntnvlu=vwuntn[i];}else{vwuntnvlu='';}
	htmln += '<a href="#" id="sltptn'+vwn[i]+'" ids="'+vwn[i]+'" style="border-color:black;font-size:1em;" class="'+pj+ap+'optionunt ui-btn ui-btn-a '+uibtninline+' ui-mini">'+vwn[i]+'.<span class="pigss-pencil" style="color:pink"></span> '+vwuntvlu+vwuntnvlu+'</a>';
	;}	
	
	if(vwdata[i]){
	if(vwuntn[i]){var bords = 'x';}else{var bords = 'y';}
	if(vwuntn[i]){var vwuntnvlu = vwuntn[i];var vwuntvlu = vwunt[i];}else{var vwuntnvlu = '';var vwuntvlu = '';}
	if(vwpopup[i]){
		htmln += '<a id="sltptn'+vwn[i]+'" data-popup="'+vwpopup[i]+'" style="white-space:normal;padding:10px;cursor:pointer;" class="'+pj+ap+'option ui-btn ui-btn-'+bords+' '+uibtninline+' ui-mini">'+vwn[i]+'. <span class="pigss-pencil"></span>'+vwdata[i]+'</a>';}
	else{
		htmln += '<a id="sltptn'+vwn[i]+'" style="'+selfbtnsborder+'white-space:normal;padding:10px;cursor:pointer;" class="'+pj+ap+'options ui-btn ui-btn-'+bords+' '+uibtninline+' ui-mini">'+vwn[i]+'. <span class="pigss-pencil"></span>'+vwdata[i]+'</a>';}
	}
	;}

	$vwdata.html('');
	$vwdata.append(htmln);
	htmln ='';
	}
	
	$("#"+pj+ap+"vwvs").popup('close').one( "popupafterclose", function( event, ui ){$("#"+pj+ap+"vwv").popup('open',"transition","pop");});
	
});

$("#"+pj+ap+"vwsnbrvlu").find(".vwsnb").click(function (event){
	event.preventDefault();	
	$kvlu.text(''); 
});

$("#"+pj+ap+"vwsnbrvlu").find(".vwsn").click(function (event){
	event.preventDefault();	
	$kvlu.append($(this).text());
});

$("#"+pj+ap+"vwsnbrvlu").find("."+pj+ap+"vwsd").click(function (event){
	event.preventDefault();	
	var kvlunbr = $kvlu.attr("ids");
	var inpvwunt = parseInt(kvlunbr.replace("sltptn",""))+1;
	var vwdt = $vw.data("vwdt")[inpvwunt];
	if(vwdt){
	var kvlu = $kvlu.text();
	if(kvlu.indexOf(".")==-1)$kvlu.append(".");
	}
});

$("#"+pj+ap+"vwsnbrvlu").find("."+pj+ap+"vwsns").click(function (event){
	event.preventDefault();	
	var kvlu = $kvlu.text();
	$vwtips.html('');
		
	var kvlnbr = parseInt($kvlu.attr("ids"));
	var kvlunbr = kvlnbr+1;
	var datavwnbrs = $vw.data("vwnbrs");
	
	var utvwvlu = $.inArray(kvlnbr, datavwnbrs );
	var vwvlu = $.inArray(kvlunbr, datavwnbrs );
	var dataunt = $vw.data("vwuntn")[vwvlu];
	if(!dataunt)dataunt='';
	var mnyvlu = $vw.data("vwmny")[vwvlu];
	if(!mnyvlu)mnyvlu='';

	var mnynvlu = $vw.data("vwmnyn")[vwvlu];
	if(mnynvlu){mnynvlu = mnynvlu+' ';}else{mnynvlu='';}

	$("#sltptn"+kvlnbr).html(kvlnbr+'.<span class="pigss-pencil" style="color:pink"></span>'+kvlu+dataunt);
	
	$vw.data("vwunt").splice(utvwvlu,1,kvlu);
	$vw.data("vwunt").splice(vwvlu,1,kvlu);
	if(kvlu){
		
		
		$vlucount.html('');
		$vlucount.prepend(mnynvlu+mnyvlu+' x '+$kvlu.text()+dataunt+'='+mnynvlu+(parseFloat(mnyvlu)*parseFloat($kvlu.text())));}
	
	
	var vwunt = $vw.data("vwunt");
	var vwnmny = $vw.data("vwmny");
	var vwnmnyw = $vw.data("vwmnyn");

	var mny = 0;var vwnnys = '';var vw ='';
	for(var i=1;i<vwnmny.length;i++){
		if(vwnmny[i] && vwunt[i]){mny += parseFloat(vwnmny[i])*parseFloat(vwunt[i]);
		;}else if(vwnmny[i]){mny += parseFloat(vwnmny[i]);}	
		if(vwnmnyw[i] && !vwnnys)vwnnys = vwnmnyw[i];
	;}
			  
		
	if(mny){		
		var vtmsg = $vlucounts.attr("data-tmsg");
		if(vtmsg){vtmsg = ' ['+vtmsg+']';}else{vtmsg = '';}
		$vlucounts.html("<HR>"+vwnnys+" "+mny+vtmsg);
		var vtimes = parseInt($vlucounts.attr("data-times"));
		var vplus = parseInt($vlucounts.attr("data-plus"));
		var vplusn = parseInt($vlucounts.attr("data-plusn"));
		var vplusmsg = $vlucounts.attr("data-plusmsg");
		if(vtimes || vplus || vplusn){
			 if(!vtimes)vtimes = 100;if(!vplus)vplus = 0;if(!vplusn)vplusn = 100;
			 if(vplusmsg){vplusmsg = ' ['+vplusmsg+']';}else{vplusmsg = '';}
		 	 var plusvlu = (mny*vtimes/100 + vplus)*vplusn/100;
		  
		 	 $vlucounts.append("<HR>"+vwnnys+" "+plusvlu+vplusmsg);
		 }
	}else{$vlucounts.html('');}
		
		
	$("#"+pj+ap+"vwsnbrvlu").popup('close').one( "popupafterclose", function( event, ui ){$vw.popup('open',"transition","pop");});
});

var localsbtnv = JSON.parse(localStorage.getItem(pj+ap+"sbtnv"));
if(localsbtnv){
	var border = $("#"+pj+ap+"selfbtns").attr('data-border');if(!border)border='';
	$sbtnvw=$('#'+pj+ap+'sbtnvw');
	for(var i=localsbtnv.length-1;i >= 0 ; i--){
		$sbtnvw.append('<div style="border-style:double;border-color:'+border+';white-space:normal;padding:10px;cursor:pointer;" data-option="'+localsbtnv[i]+'" data-border="'+border+'" class="'+pj+ap+'sltsbtn ui-btn ui-btn-a ui-grid-solo ui-mini"><span class="pigss-pencil"></span>'+localsbtnv[i]+'</div><a href="#" ids="'+i+'" class="'+pj+ap+'slfbtns ui-btn ui-btn-w ui-btn-inline ui-mini" style="display:none;"><span class="pigss-pencil"></span></a>');
	;}
;}

$("#"+pj+ap+"vwf").find("."+pj+ap+"slfbtn").click(function (event){
	event.preventDefault();
	var alter = $(this).attr('data-alter');
	var $slfbtns =$("."+pj+ap+"slfbtns");
	if(alter)$slfbtns.html('<span class="pigss-pencil"></span>'+alter);
	$slfbtns.show('slow');
	$vw.data("slfbtns",1);
});	

$(document).on("click", "."+pj+ap+"slfbtns",function (event) {
	event.preventDefault();
	var ids = $(this).attr('ids');
	var sbtnv = JSON.parse(localStorage.getItem(pj+ap+"sbtnv"));	
	$('#'+pj+ap+'selfbtn').val(sbtnv[ids]);
	$vw.data("slfpn",ids);
});	
	
$("#"+pj+ap+"selfbtns").click(function (event){
	event.preventDefault();	
	var border = $(this).attr('data-border');if(!border)border='';
	var val = $('#'+pj+ap+'selfbtn').val(); 
	$sbtnvw=$('#'+pj+ap+'sbtnvw');
	$sbtnvw.html('').hide('slow');

	var slfpn = $vw.data("slfpn");if(!slfpn)slfpn='';
	var sbtnv = JSON.parse(localStorage.getItem(pj+ap+"sbtnv"));	
		
	if(slfpn){
		if(val){sbtnv.splice(slfpn,1,val);}
		else{sbtnv.splice(slfpn,1);}
		$vw.data("slfpn","").data("slfbtns","");
	;}else{
		if(sbtnv){sbtnv.push(val);}else{sbtnv = [];sbtnv[0] = val;}		
	;}
	localStorage.setItem(pj+ap+"sbtnv",JSON.stringify(sbtnv));
	var htmlv='';var localsbtnv = JSON.parse(localStorage.getItem(pj+ap+"sbtnv"));
	for(var i=localsbtnv.length-1;i >= 0 ; i--){
		htmlv += '<div style="border-style:double;border-color:'+border+';padding:10px;cursor:pointer;" data-option="'+localsbtnv[i]+'" data-border="'+border+'" class="'+pj+ap+'sltsbtn ui-btn ui-btn-a ui-grid-solo ui-mini"><span class="pigss-pencil"></span>'+localsbtnv[i]+'</div><a href="#" ids="'+i+'" class="'+pj+ap+'slfbtns ui-btn ui-btn-w ui-btn-inline ui-mini" style="display:none;"><span class="pigss-pencil"></span></a>';
	;}
	$sbtnvw.html(htmlv).show('slow');

});


// User click custom button
$(document).on("click", "."+pj+ap+"sltsbtn",function (event) {
	event.preventDefault();
	$this=$(this);
	var border = $this.attr('data-border');if(!border)border='';
	var alt = $vw.data("alt");if(!alt)alt='';
	var slfbtns = $vw.data("slfbtns");if(!slfbtns)slfbtns='';
	
	if(!slfbtns){
	if(alt){	
	var vwdata = $this.attr("data-option");if(!vwdata)vwdata='';		
		var altn = alt.replace('sltptn','');
		$("#"+alt).html(altn+'.<span class="pigss-pencil"></span>'+vwdata);
		$("#"+pj+ap+"vwf").popup('close').one( "popupafterclose", function( event, ui ){$vw.popup('open',"transition","pop");});
		var vwnbrs =$vw.data("vwnbrs");
		var vwvlu = $.inArray(parseInt(altn), vwnbrs );	
		$vw.data("vwdata").splice(vwvlu,1,vwdata);	
		$vlucount.html('');
	;}else{
	var val = $this.attr('data-option');if(!val)val='';
	var vwnbr = $vw.data("vwnbr");
	$vwdata.append('<a id="sltptn'+vwnbr+'" style="border-style:double;border-color:'+border+';white-space:normal;padding:10px;cursor:pointer;" class="'+pj+ap+'options ui-btn ui-btn-a '+uibtninline+' ui-mini">'+vwnbr+'. <span class="pigss-pencil"></span>'+val+'</a>');
	
	
	$("."+pj+ap+"vwshgt").scrollTop($vwdata.height());	
	
	$vw.data("vwnbr",(parseInt(vwnbr)+1));
	$vw.data("vwnbrs").push(vwnbr);	
	$vw.data("inpvwunt",'');
	$vw.data("vwmny").push('');
	$vw.data("vwmnyn").push('');
	$vw.data("vwunt").push('');
	$vw.data("vwuntn").push('');
	$vw.data("vwdt").push('');
	$vw.data("vwdata").push(val);
	$vw.data("vwpopup").push('');
	$("#"+pj+ap+"selfbtns").hide();
	$("#"+pj+ap+"vwf").popup('close').one( "popupafterclose", function( event, ui ){$vw.popup('open',"transition","pop");});
	}
	}
});

$(document).on("click", "."+pj+ap+"options",function (event) {
	event.preventDefault();
	var alt = $(this).attr("id");
	$vw.data("alt",alt).popup('close').one( "popupafterclose", function( event, ui ){$("#"+pj+ap+"vwf").popup("open");});
	$("#"+pj+ap+"dsltsbtn").show("slow");
	$("."+pj+ap+"slfbtn").hide();
	$("#"+pj+ap+"selfbtn").hide();
});

$("#"+pj+ap+"vwf").on( "popupafterclose", function(event, ui ){   
	$("."+pj+ap+"slfbtn").show();
	$("#"+pj+ap+"selfbtn").show();
	$("#"+pj+ap+"dsltsbtn").hide();
	$("."+pj+ap+"slfbtns").hide();
	$vw.data("slfbtns","");
});

$("#"+pj+ap+"vwf").find("."+pj+ap+"vwshgt").height(windowHeight*0.58);
$("#"+pj+ap+"vwv").find("."+pj+ap+"vwshgts").height(windowHeight*0.75).width(windowWidth*0.85);
$("#"+pj+ap+"vwvs").find("."+pj+ap+"vwvnsorts").height(windowHeight*0.75).width(windowWidth*0.85);
$("#"+pj+ap+"vwtipops").height(windowHeight*0.75);

$("#"+pj+ap+"clrdata").click(function (event){
	event.preventDefault();	
	$vw.data("vwnbr",1).data("vwnbrs",[""]).data("inpvwunt",'').data("vwmny",[""]).data("vwmnyn",[""]).data("vwunt",[""]).data("vwuntn",[""]).data("vwdt",[""]).data("vwdata",[""]).data("vwpopup",[""]);
	$vwvn.html('');
	$vwvnsort.html('');
	$vwdata.html('');
	$vlucount.html('');
	$vlucounts.html('');
	$vwtips.html('');
	$("#"+pj+ap+"vwv").popup('close').one( "popupafterclose", function( event, ui ){$vw.popup('open',"transition","pop");});;
}); 

$("#"+pj+ap+"formpopups").click(function (){
	var htmls = '';var ty ='';var mny ='';var ifrurl = '';var url = '';
	var $formpopupsifr = $("#"+pj+ap+'formpopupsifr');
	ifrurl = $formpopupsifr.attr('data-ifrurl');
	url = $formpopupsifr.attr('src');
	//url = $formpopupsifr.attr('data-src');
	var popup = $(this).attr('data-pop');
	var vwn= $vw.data("vwnbrs");
	var vwmny= $vw.data("vwmny");
	var vwmnyn= $vw.data("vwmnyn");
	var vwunt= $vw.data("vwunt");
	var vwuntn= $vw.data("vwuntn");
	var vwdata= $vw.data("vwdata");
	for(var i=1;i<vwn.length;i++){
	if(vwuntn[i]){ty = ' '+vwunt[i]+' '+vwuntn[i]+' x '+' ';}else{ty = ' ';}
	if(vwdata[i] && vwmny[i]){htmls += '['+vwn[i]+']'+ty+vwdata[i]+' ['+ty+' '+vwmnyn[i]+' '+vwmny[i];
	if(vwunt[i] && vwmny[i])htmls += ' = '+vwmnyn[i]+' '+(parseFloat(vwmny[i])*parseFloat(vwunt[i]));htmls += ']';}
	else if(vwdata[i]){htmls += '['+vwn[i]+']'+ty+vwdata[i];}
	if((vwdata[i] && vwmny[i]) || (vwunt[i] && vwmny[i]) || vwdata[i])htmls += '\n';
	;}
	//localStorage[ap+'.html'+pj] = htmls+' '+' '+' '+' '+$vlucounts.text();
	//$formpopupsifr.attr('src',url);
	//$("#"+popup).popup('open');

	if(ifrurl){document.getElementById(pj+ap+'formpopupsifr').contentWindow.postMessage(htmls+' '+' '+' '+' '+$vlucounts.text(),url);
	$vw.popup('close').one( "popupafterclose", function( event, ui ){$("#"+pj+ap+"formpopup").popup('open',"transition","pop");});}
	else{var $webformdata = $("#"+pj+ap+"formpopup").find('.webformdata:first');
	$webformdata.val(htmls+' '+' '+' '+' '+$vlucounts.text());
	$("#"+$webformdata.attr('id')).keyup();
	$vw.popup('close').one( "popupafterclose", function( event, ui ){$("#"+pj+ap+"formpopup").show();});}
	
	
});

$("."+pj+ap+"plshw").click(function (){
	var vwpopup = $(this).attr("data-popup");
	$vw.data("openpopup",vwpopup);
	if(vwpopup)$(vwpopup).popup('close').one( "popupafterclose", function( event, ui ){$vw.popup('open',"transition","pop");});
});	

$("."+pj+ap+"nbrbtn").click(function (){
	var $this = $(this);
	var nbrbtn = $this.attr("data-pop");
	var $nbrbtn = $("#"+nbrbtn).find('span');
	var spanvlu = $nbrbtn.html();
	if(spanvlu!='&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'){$nbrbtn.append($this.html());}else{$nbrbtn.html($this.html());}
	$("#"+nbrbtn).find("."+pj+ap+"sltptn").attr("data-nbrbtn",$nbrbtn.html());
});	

$("."+pj+ap+"nbrbtnx").click(function (){
	var $this = $(this);
	var nbrbtn = $this.attr("data-pop");
	var $nbrbtn = $("#"+nbrbtn);
	$nbrbtn.find('span').html('&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;');
	$nbrbtn.find("."+pj+ap+"sltptn").attr("data-nbrbtn",'');
});	

$("."+pj+ap+"nbrbtnn").click(function (){
	var $this = $(this);
	var nbrbtn = $this.attr("data-pop");
	var $nbrbtn = $("#"+nbrbtn);
	$nbrbtn.find('.'+pj+ap+'nbrbtndiv').hide();
	$nbrbtn.find('.'+pj+ap+'nbrbtnbr').show();
	$nbrbtn.find("."+pj+ap+"sltptn").attr("data-nbrbtn",'');
	if($(window).width() < 800){
		$nbrbtn.find("."+pj+ap+"vwul").height(windowHeight*0.88);
	}
});	

$("."+pj+ap+"nbrbtns").click(function (){
	var $this = $(this);
	var nbrbtn = $this.attr("data-pop");
	var $nbrbtn = $("#"+nbrbtn);
	$nbrbtn.find('.'+pj+ap+'nbrbtnbr').hide();
	$nbrbtn.find('.'+pj+ap+'nbrbtndiv').show();
	$nbrbtn.find('span').html('&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;');
	$nbrbtn.find("."+pj+ap+"sltptn").attr("data-nbrbtn",'');
	if($(window).width() < 800){
		$nbrbtn.find("."+pj+ap+"vwul").height(windowHeight*0.63);
	}
});	


$("#"+pj+ap+"panelpop").click(function (){
	var openpopup = $vw.data("openpopup");
	$vw.data("openpopup",'');
	if(openpopup){
		var $nbrbtn = $(openpopup); 	
		$("#"+pj+ap+"vw").popup('close').one( "popupafterclose", function( event, ui ){$nbrbtn.popup('open',"transition","pop");});
		$nbrbtn.find('span').html('&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;');
		$nbrbtn.find("."+pj+ap+"sltptn").attr("data-nbrbtn",'');
	}else{
		$("#"+pj+ap+"vw").popup('close');
	;}
});	

$("#"+pj+ap+"infovwbtn").click(function (){
	$vw.popup('close').one( "popupafterclose", function( event, ui ){$("#"+pj+ap+"infovw").popup('open',"transition","pop");});
});	

$("#"+pj+ap+"infovwpopn").click(function (){
	$("#"+pj+ap+"infovw").popup('close').one( "popupafterclose", function( event, ui ){$vw.popup('open',"transition","pop");});
});

//$("#"+pj+ap+"formpopups").click(function (){
	//$vw.popup('close').one( "popupafterclose", function( event, ui ){$("#"+pj+ap+"formpopup").popup('open',"transition","pop");});
//});	

$("#"+pj+ap+"formpopupspopn").click(function (){
	$("#"+pj+ap+"formpopup").popup('close').one( "popupafterclose", function( event, ui ){$vw.popup('open',"transition","pop");});
});

$("#"+pj+ap+"formpopupsdivn").click(function (){
	$("#"+pj+ap+"formpopup").hide();
	$vw.popup('open',"transition","pop");
});

$("#"+pj+ap+"vwvp").click(function (){
	$vw.popup('close').one( "popupafterclose", function( event, ui ){$("#"+pj+ap+"vwv").popup('open',"transition","pop");});
});	

$("#"+pj+ap+"vwvppopn").click(function (){
	$("#"+pj+ap+"vwv").popup('close').one( "popupafterclose", function( event, ui ){$vw.popup('open',"transition","pop");});
});

$("#"+pj+ap+"vwfbtn").click(function (){
	$vw.popup('close').one( "popupafterclose", function( event, ui ){$("#"+pj+ap+"vwf").popup('open',"transition","pop");});
});	

$("#"+pj+ap+"vwfbtnpopn").click(function (){
	$("#"+pj+ap+"vwf").popup('close').one( "popupafterclose", function( event, ui ){$vw.popup('open',"transition","pop");});
});

$("#"+pj+ap+"vwsnbrvlupopn").click(function (){
	$("#"+pj+ap+"vwsnbrvlu").popup('close').one( "popupafterclose", function( event, ui ){$vw.popup('open',"transition","pop");});
});

;}
