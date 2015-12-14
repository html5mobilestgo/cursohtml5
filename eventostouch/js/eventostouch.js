$(document).ready(function(){
var x=0, y=0;
$(document).on('touchStart',function(dedos){
	if (dedos.originalEvent.touches.lenght>0){
		var dedo = dedos.originalEvent.touches[0];
		x=dedo.clientX;
		y=dedo.clientY;
		console.log("Empiezo en \("+X+","+Y+"\)");
	};

});