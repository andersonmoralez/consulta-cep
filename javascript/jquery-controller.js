$(document).ready(function(){
    var maskCEP = $(".cep");
    maskCEP.mask('000000-000', {reverse: true});

    $('.form').submit(function(){
        var dados = jQuery( this ).serialize();

        jQuery.ajax({
            type: "POST",
            url: "ControllerTeste_js.php",
            data: dados,
            success: function(data)
            {
                $('.data').html(data);
            }
        });

        return false;
        });
    });