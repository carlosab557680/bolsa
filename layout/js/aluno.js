$(document).ready(function () {

    $('#form_materias').submit(function () {
        
        var action = $(this).attr('action');
        var dados = $(this).serialize();
        
        $('#filtro > span').remove();
        $('#filtro').html('<img src="layout/img/ajax-loader_1.gif">Filtrar');
        $('#grid-materias').html("<tr><td colspan='6'>Carregando...</td></tr>");
        
        //$("#filtro").button('loading');
        
        $.ajax({
            type: "POST",
            url: action,
            data: dados

        }).done(function (data) {
            $('#grid-materias').html(data);
            //$("#filtro").button('reset');
        }).complete(function(){
            $('#filtro').html('<span class="glyphicon glyphicon-filter"></span> Filtrar');
        });
        
        return false;
    });
    
    $("#idioma").on('change', function(){
        $("#idioma").attr('readonly','readonly');

        $.ajax({
            type: "POST",
            url: "aluno.php",
            data: {ajax_form: 'idioma', idioma: $(this).val()}

        }).done(function (data) {
            $('#tab_impressao').html(data);
            $('#tabs a[href="#tab_impressao"]').tab('show');
        }).complete(function(){
            $("#idioma").removeAttr('readonly');
        });
    });
    
    $('.data').datepicker({
        changeMonth: true,
        changeYear: true
    });
    
    $( ".data" ).datepicker( "option", "showOptions", { direction: "down" } );
    
//    $('.input-group.date').datepicker({
//        format: "dd/mm/yyyy",
//        weekStart: 0,
//        language: "pt-BR",
//        calendarWeeks: true,
//        autoclose: true,
//        todayHighlight: true,
//        changeMonth: true,
//        changeYear: true
//    });

});



