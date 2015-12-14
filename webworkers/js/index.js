$(document).ready(function(){
  var worker= new Worker('miworker.js');
  worker.onerror=function(e){
       console.log("error del worker");
       };
       $('button#saludar').on('click',function(){
  			var sms =$('input#main').val();
 			worker.postMessage(sms);
});
worker.onmessage=function(e){
  $('input#worker').val(e.data);
};
});