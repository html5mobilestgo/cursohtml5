$($document).ready(function{
	$('input#obtener').on('click',function(){
		var tuneo_posicion={
			enableHighAccuracy:true;
			timeout: 1000;
			maximunAge:600;
		};
		geoId=navigator.geolocation.getCurrentPosition(function(apos){
			
		})
	})
})