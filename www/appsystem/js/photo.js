/*AppMoney712 APP Creation System || 01 - AUG -2015 || Copyright LEE WAI KWOK(JSTRUST CONSULTANCY) || license - Revised MIT.*/
var pictureSource;  
var destinationType; 

document.addEventListener("deviceready",onDeviceReady,false);
function onDeviceReady() {
	if(document.URL.indexOf('http://') === -1 && document.URL.indexOf('https://') === -1){
    pictureSource=navigator.camera.PictureSourceType;
    destinationType=navigator.camera.DestinationType;
	}
}

function onPhotoDataSuccess(imageData) {   
      sessionStorage['appphotoData'] = "data:image/jpeg;base64," + imageData;
	  appcamerause = sessionStorage.getItem('appcamerause');
	  if(sessionStorage.getItem('appcamera')=='calendar'){$(appcamerause).html('<img src="data:image/jpeg;base64,' + imageData+'" style="width:35px;height:35px;"/>');$(appcamerause.replace('imgbtns','btnimgs')).val("data:image/jpeg;base64," + imageData);}
    }

function onPhotoURISuccess(imageURI) {
     sessionStorage['appphotoURI'] = imageURI;
	 appcamerause = sessionStorage.getItem('appcamerause');
	 if(sessionStorage.getItem('appcamera')=='calendar'){$(appcamerause).html('<img src="'+imageURI+'" style="width:35px;height:35px;"/>');$(appcamerause.replace('imgbtns','btnimgs')).val(imageURI);}
    }
	
function capturePhoto() {
	if(document.URL.indexOf('http://') === -1 && document.URL.indexOf('https://') === -1){
      navigator.camera.getPicture(onPhotoDataSuccess, onFail, { quality: 50,
        destinationType: destinationType.DATA_URL});
	} 
    }

function capturePhotoEdit() {
      navigator.camera.getPicture(onPhotoDataSuccess, onFail, { quality: 20, allowEdit: true,
        destinationType: destinationType.DATA_URL });
    }

function getPhoto(source) {
	  if(document.URL.indexOf('http://') === -1 && document.URL.indexOf('https://') === -1){	
      navigator.camera.getPicture(onPhotoURISuccess, onFail, { quality: 50,
        destinationType: destinationType.FILE_URI,
        sourceType: source});/*saveToPhotoAlbum: true */
	  } 
    }

function onFail(message) {
      alert('Failed because: ' + message);
    }

