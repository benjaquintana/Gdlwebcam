$(function(){
    //Campo de mapa
        var map = L.map('map').setView([-0.05711, -78.460761], 17);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        L.marker([-0.05711, -78.460761]).addTo(map)
            .bindPopup('Buscanos en calle San José <br> ')
            .openPopup()
            .bindTooltip('Estamos en tu barrio')
            .openTooltip();

    //Letterin
    $('.nombre_sitio').lettering();

    //Menu Fijo
    var windowHeight = $(window).height();
    var barraAltura = $('.barra').innerHeight();

    $(window).scroll(function() {
        var scroll = $(window).scrollTop();
        if(scroll > windowHeight) {
            $('.barra').addClass('fixed');
            $('body').css({'margin-top': barraAltura+'px'});
        }
        else {
          $('.barra').removeClass('fixed');
          $('body').css({'margin-top': '0px'});
        }
    });

    //Menu Responsive
    $('.menu_movil').on('click', function() {
      $('.navegacion_principal').slideToggle();
    });

    //Programa de Conferencia
    $('.programa_evento .info_curso:first').show();
    $('.menu_programa a:first').addClass('activo');
    $('.menu_programa a').on('click', function() {
        $('.menu_programa a').removeClass('activo');
        $(this).addClass('activo');
        $('.ocultar').hide();
        var enlace=$(this).attr('href');
        $(enlace).fadeIn(1000);
        return(false);
    });

    //Animaciones para los números
    $('.resumen_evento li:nth-child(1) p').animateNumber({ number: 6}, 1200);
    $('.resumen_evento li:nth-child(2) p').animateNumber({ number: 15}, 1300);
    $('.resumen_evento li:nth-child(3) p').animateNumber({ number: 3}, 1100);
    $('.resumen_evento li:nth-child(4) p').animateNumber({ number: 9}, 1200);

    //Cuenta regrasiva
    $('.cuenta_regresiva').countdown('2021/04/01 00:00:00', function(event){
        $('#dias').html(event.strftime('%D'));
        $('#horas').html(event.strftime('%H'));
        $('#minutos').html(event.strftime('%M'));
        $('#segundos').html(event.strftime('%S'));
    });

    //Colorbox
    $('.invitado_info').colorbox({inline:true, width:"50%"});
    $('.boton_newsletter').colorbox({inline:true, width:"50%"});

    //Clase del menu
    $('body.conferencia .navegacion_principal a:contains("Conferencia")').addClass('activo');
    $('body.calendario .navegacion_principal a:contains("Calendario")').addClass('activo');
    $('body.invitados .navegacion_principal a:contains("Invitados")').addClass('activo');

});
