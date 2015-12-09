window.onload=function(){
	var inputPass=document.getElementById("pass");
	var numeros= "123456789";
	var siNum=false;
	var siMay=false;

	inputPass.onblur= function (){
	
	/*	console.log(inputPass.value);*/
	var pass= inputPass.value;
	if (pass.search(^[A-Z]*)>=0){
		siMay=true;
	}

	}
var enviar= document.getElementById("envio");
enviar.onclick= function (){
	this.setAttribute("disabled","disabled");
	this.setAttribute("value","Enviando");

}

}
