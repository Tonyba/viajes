

window.onload = function() { 
    let editButton = $('.editar-viaje');
    let updateButton = $('.actualizar-viaje');
    let cancelarButton = $('.cancelar');
    let acciones = $('.acciones');
    let accionesEB = $('.acciones-editar-borrar');
    let viajeFecha = $('.viaje-fecha');
    let viajeNumeroGuia = $('.viaje-numero_guia');
    let viajeDestino = $('.viaje-destino');
    let viajeTipo = $('.viaje-tipo-campo');
    let viajeTipoPlaceholder = $('.viaje-tipo-placeholder');
    let viajeId = $('.viaje-id');

    editButton.click(hacerViajeEditable);
    cancelarButton.click(hacerViajeReadOnly);
    updateButton.click(actualizar);

    function actualizar() {
        let viajeActualizado = {
            'fecha': viajeFecha.val(),
            'destino': viajeDestino.val(),
            'tipo' : viajeTipo.val(),
            'numero_guia' : viajeNumeroGuia.val(),
            'id' : viajeId.val(),
            _token: $('meta[name="csrf-token"]').attr('content')
        } 

        $.ajax({
            url: "http://localhost:3000/viajes-app/public/viaje/actualizar/" + viajeId.val(),
            type:"POST",
            data: viajeActualizado,
            success:function(response){
              console.log(response);
              if(response) {
                $('.success').text(response.success);
                $("#ajaxform")[0].reset();
              }
            },
            success: () => {
                hacerViajeReadOnly();
            },
            error: (response) => {
                console.log(response);
            }
           });
    }
    

    function hacerViajeEditable() {
        accionesEB.addClass('oculto');
        acciones.removeClass('oculto');

        viajeTipo.removeClass('oculto');
        viajeTipoPlaceholder.addClass('oculto');
        viajeFecha.removeAttr('readonly').removeClass('campo');
        viajeNumeroGuia.removeAttr('readonly').removeClass('campo');
        viajeDestino.removeAttr('readonly').removeClass('campo');

    }

    function hacerViajeReadOnly() {
        accionesEB.removeClass('oculto');
        acciones.addClass('oculto');

        viajeTipo.addClass('oculto');
        viajeTipoPlaceholder.removeClass('oculto');
        viajeFecha.attr('readonly', 'readonly').addClass('campo');
        viajeNumeroGuia.attr('readonly', 'readonly').addClass('campo');
        viajeDestino.attr('readonly', 'readonly').addClass('campo');
    }
}



