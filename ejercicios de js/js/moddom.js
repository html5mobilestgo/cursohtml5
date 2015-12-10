$(document).ready(function(){
	var nuevoP=$('<p> Hola Mundo</p>');
	nuevoP.attr('name','miP');
	$('body').append(nuevoP);
	$('<input>').attr({
		'type':'button',
		'name':'boton',
		'value':'Botoncillo'
	}).insertBefore('p[name=miP');
	$('p[name=miP]').html("nuevo texto añadido").css({'color':'orange','fontSize':'80px' });
	/* $('body> p:first').remove(); para que no borre el primer parrafo 
	lo comento */
	var antiguoP=$('p[name=miP]').detach();
	$('body').append(
		$('<h1>').append(antiguoP)
		);
	$('p[name=miP]').css({
		'color':'grey',
		'background-color':'red',
		'width':'800px',
		'textAlign':'center'

	});
	$('input#boton1').on("mousedown",function(){
		$('a#enlace1').css({'color':'darkgrey'});
	})
	$('input#boton1').on("mouseup",function(){
		$('a#enlace1').css({'color':'darkorange'});

	});
	$('input#boton1').on("click",function(){
		$('p:last').css({'color':'blue', 
						'fontSize':"30px"});
		$('input:button:first').css({"backgroundColor":"red",
									'fontSize':"80px"});
		$('input:button:last').css({"backgroundColor":"green",
									'fontSize':"20px"});
	});
	$('input#boton1').on("dblClick",function(){
		$('p:first').css({'color':'green'});

	});
	$('a#enlace1').on({
		'mouseover':function(){
				$(this).css({
					'color':$(this).css('color'),
					'fontSize':'26px'
				});
		},
		'mouseleave':function(){
			$(this).css({
					'color':'green',
					'fontSize':'16px'
			});
		}
	});







});