$(document).ready(function() {

	$( window ).scroll(function(e) 
	{ 
		setTimeout(showInAnimation,400);

		// Define a direção do scroll
		if( scrollAntigo != 'undefined' && scrollAntigo < $(window).scrollTop() )
		{
			direcaoScroll = 'descendo';
		}
		else
		{
			direcaoScroll = 'subindo';
		}

		// deside quando e para onde o site vai
		if( $('.home').length > 0 && scrollAntigo != 'undefined' )
		{
			if( $(window).scrollTop() < $(window).innerHeight() && direcaoScroll == 'descendo' )
			{
				console.log('to home (' + direcaoScroll + ' / ' + canScroll + ')')
				scrollHome();
			}
			else if( $(window).scrollTop() < $(window).innerHeight() && direcaoScroll == 'subindo' )
			{
				console.log('to carrossel (' + direcaoScroll + ' / ' + canScroll + ')')
				scrollCarrossel();
			}

		} 
		scrollAntigo = $(window).scrollTop();

	});
	setTimeout(showInAnimation,400);
	// $( window ).trigger('scroll');


	$( window ).resize(function(e) 
	{
		$('.menu').removeClass('aberto').addClass('fechado');
		//redesenha o recorte do rodapé
		wBody = $('body').width();
		wRecorte = 504;
		wNovo = wBody - wRecorte;
		if(wNovo <= 0)
		{
			wNovo = 0;
		}
		$('footer .recorte path').attr('d', 'M1920,0v41H0V31h'+ wNovo +'l31-31H'+ wNovo +'z');
		$('footer .recorte').removeAttr('viewBox');
		$('footer .recorte')[0].setAttribute('viewBox', '0 0 ' + wBody + ' 31');

		$('.carrossel').css('height', $(window).innerHeight() + 'px')

	});
	$( window ).trigger('resize');




	//-----------------MOSTRA SITE-----------------//

	setTimeout(function()
	{
		$('.msk-site')
			.css({
				opacity: '0'
			})
	}, 200)

	//-----------------MOSTRA SITE-----------------//


	//-----------------BT FECHA/ABRE MENU-----------------//

	$('body').on('click', '.menu .bt-toggle', function(event) {
		event.preventDefault();

		$(this).closest('nav')
			.toggleClass('aberto')
			.toggleClass('fechado');
	});

	//-----------------BT FECHA/ABRE MENU-----------------//
	



	//-----------------MASONRY-----------------//
/*
	var grid = $('.grid').masonry({
	  // options
	  itemSelector: '.grid-item',
	  columnWidth: '.grid-item'
	});

	function callMasonry ()
	{
		grid.masonry();
	}
	
	setInterval( callMasonry, 2000 );
*/
	//-----------------MASONRY-----------------//




	//-----------------FOTOS-----------------//

	//preenche a Array "fotos" com as URLs presentes na lista de fotos
	$('.fotos li').each(function(index, el) {
		fotos.push($(this).find('a').attr('data-img'));
	});

	$('.fotos li a').on('click', function() 
	{
		event.preventDefault();
		zoomFoto( $(this).attr('data-i') );
	});	

	$('.fotos .foto-full #close').on('click', function() 
	{
		fechaZoomFoto();
	});	

	$('.fotos .foto-full #left').bind('click', function (e)
	{
		var iFoto = $(this).closest('.foto-full').find('img').attr('data-i');

		if ( iFoto == 0 )
		{
			iFoto = fotos.length-1;
		}
		else
		{
			iFoto--;
		}

		zoomFoto( iFoto );

	})

	$('.fotos .foto-full #right').bind('click', function (e)
	{
		var iFoto = $(this).closest('.foto-full').find('img').attr('data-i');

		if ( iFoto == fotos.length - 1 )
		{
			iFoto = 0;
		}
		else
		{
			iFoto++;
		}

		zoomFoto( iFoto );

	})


	//-----------------FOTOS-----------------//








	//-----------------CONTATO-----------------//

	$('.menu #contato').on('click', function(event) {
		event.preventDefault();
		$('.contato')
			.css({
				display: 'block',
				overflow: 'auto',
			});
		$('body')
			.css({
				overflow: 'hidden',
			});
	});

	$('.contato #fecha').on('click', function(event) {
		event.preventDefault();
		$('.contato')
			.css({
				display: 'none',
				overflow: 'hidden',
			});
		$('body')
			.css({
				overflow: 'auto',
			});
	});

	$('form #notificacoes #fecha-notificacao').on('click', function() 
	{
		console.log($(this))
		$(this).closest('#notificacoes').find('#processando')
			.css('margin-left', '100%');
		$(this).closest('#notificacoes').find('#sucesso')
			.css('margin-left', '100%');
		$(this).closest('#notificacoes').find('#erro')
			.css('margin-left', '100%');
		$(this).closest('#notificacoes').css('pointer-events', 'none');
		$(this).closest('form').find('input[type="submit"]')
			.removeAttr('disabled')
			.removeClass('disabled');
	});

	$('.contato form #assunto label').on('click', function(){
		$('.contato form #assunto input').removeAttr('checked');
		$('.contato form #assunto label').attr({
			id: ''
		});
		$(this).attr('id', 'checked');
		$('.contato form #assunto label[for="' + $(this).attr('for') + '"]').attr('checked', 'checked')
	})

	$('.auto-resize').on('keydown', function ()
	{
		if( $(this)[0].scrollHeight < 300 )
		{
			$(this).css('height', $(this)[0].scrollHeight + 'px');
		}
	})

	$('.auto-resize').on('keyup', function ()
	{
		$(this).trigger('keydown')
	})

	//-----------------CONTATO-----------------//








	$( 'body' ).on( 'click', 'button.dead', function(){ return false; } );
	
	if( $( '#map-canvas' ).length > 0 )
	{
		initializeMap();
	}


	$('.segredo').remove();


	$( '.telefone' ).mask('(00) 0000 0000', {placeholder: "(__) ____ ____"});
	//incluindo o nono dígito
	var maskBehavior = function (val) {
		return val.replace(/\D/g, '').length === 11 ? '00 00000 0000' : '00 0000 00009';
	}

	options = {
		onKeyPress: function(val, e, field, options) {
			field.mask(maskBehavior.apply({}, arguments), options);
		},
		placeholder: "__ ____ ____"
	};
	 
	$('.celular').mask(maskBehavior, options);
	$( '.data' ).mask('00/00/0000', {placeholder: "__/__/____"});


	$('form.js').submit(function(e){return false;e.preventDefault();});

	$('form.js input[type="submit"]').bind('click', 
		function()
		{
			$(this).closest('form').validate({
				submitHandler: function(form)
				{
					$(form).find('#notificacoes')
						.css('pointer-events', 'auto');

					$(form).find('#notificacoes #processando')
						.css('margin-left', '0');

					$(form).find('input[type=submit]')
						.addClass('disabled')
						.attr('disabled', 'disabled');

					$(form).ajaxSubmit({
						type: 'post',
						success: contatoOk
					});

				}, 
				rules: {
					nm: {
						required: true
					},
					ml: {
						email: true,
						required: true
					},
					msgm: {
						required: true
					}
				},
				messages: {
					nm: {
						required: 'Informe seu nome'
					},
					ml: {
						email: 'Este e-mail parece estar incorreto',
						required: 'Precisamos saber seu e-mail'
					},
					mnsg: {
						required: 'Deixe sua mensagem'
					}
				}
			});
		}
	)







	$('.alert button').bind('click', function()
	{
		$(this).closest('.alert').hide();
	})





}); //end $(document).ready


var canScroll = true;
var scrollAntigo;
var direcaoScroll = '';
var wasScrolled = false;
var wBody = 0;
var wRecorte = 0;
var wNovo = 0;




function contatoOk (data)
{
	console.log($(this));
	console.log(data);

	$('#contato #process').hide();
	$('#contato form fieldset').show();
	$('#contato form .form-text').show();
	$('#contato form input[type=submit]').show();


	if( data == 'sucesso')
	{
		$('#contato form #success').show();
		$('#contato form')[0].reset();
	}
	else
	{
		$('#contato form #error').show();
	}

}

function URLize (s) 
{
    var r=s.toLowerCase();
    r = r.replace(new RegExp(/\s/g),"");
    r = r.replace(new RegExp(/[àáâãäå]/g),"a");
    r = r.replace(new RegExp(/æ/g),"ae");
    r = r.replace(new RegExp(/ç/g),"c");
    r = r.replace(new RegExp(/[èéêë]/g),"e");
    r = r.replace(new RegExp(/[ìíîï]/g),"i");
    r = r.replace(new RegExp(/ñ/g),"n");                
    r = r.replace(new RegExp(/[òóôõö]/g),"o");
    r = r.replace(new RegExp(/œ/g),"oe");
    r = r.replace(new RegExp(/[ùúûü]/g),"u");
    r = r.replace(new RegExp(/[ýÿ]/g),"y");
    r = r.replace(new RegExp(/\W/g),"");
    return r;
};

function pluralize (s, p, n)
{
	if( n != 1)
	{
		return p;
	}
	else
	{
		return s;
	}
}

function initializeMap()
{

	var myLatLgn = new google.maps.LatLng( -16.675207,-49.260501 );

	var mapCanvas = document.getElementById( 'map-canvas' );
	var mapOptions = {
		center: myLatLgn,
		zoom: 16,
		mapTypeId: google.maps.MapTypeId.ROADMAP,
		backgroundColor: '7030a0',
		scrollwheel: false
	}
	var map = new google.maps.Map( mapCanvas, mapOptions );

	var marker = new google.maps.Marker({
	    position: myLatLgn,
	    map: map,
	    title:"Hello World!"
	});

}

function showInAnimation () 
{

	$('.hided').each(function()
	{
		if( $( window ).scrollTop() + ( $( window ).height() * 0.8 ) > $(this).offset().top - 300 )
		{
			$(this).addClass('appeared').removeClass('hided');
		}
	})
}

function scrollCarrossel ()
{
	if( canScroll )
	{
		canScroll = false;
		$('html, body').animate({
			scrollTop:0
		}, 500, endScroll)
	}
}

function scrollHome ()
{
	if( canScroll )
	{
		canScroll = false;
		$('html, body').animate({
			scrollTop:document.getElementById('inicio').getBoundingClientRect().top+10
		}, 500, endScroll)
	}
}

function endScroll()
{
	setTimeout(function()
	{
		canScroll = true;
		console.log('end: ' + direcaoScroll)
		console.log('end: ' + $(window).scrollTop())
		console.log('end: ' + $(window).innerHeight())
	}, 100);
}

function finalScrollHome()
{
	$('.home .carrossel').css({
		position: 'fixed',
		top: '-100%'
	});
	$('.home .a-feira').css({
		'padding-top': '100px'
	});
	$(window).scrollTop(0)
}


var fotos = [];
function zoomFoto (index)
{
	console.log(index);
	$('.fotos .foto-full')
		.css('display', 'block')
		.find('img')
		.attr('src', fotos[index])
		.attr('data-i', index);
}

function fechaZoomFoto () 
{
	$('.fotos .foto-full')
		.css('display', 'none')
		.find('img')
		.attr('src', '');
}

