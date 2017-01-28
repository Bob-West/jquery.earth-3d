$( document ).ready(function() {

    $("#city_names").change(function (e) {
        console.log($('select[name=city_names]').val());
        var city = $('select[name=city_names]').val();

        var posting = $.post( 'ajax.php', { 'city': city} );

        posting.done(function( data ) {
            //console.log(data);
            $('#airlines_namen').html(data);
        });

        var posting = $.post( 'functions.php', { 'city': city} );

        posting.done(function( data ) {
            $('#earth_div').html('');
            //console.log("Done");
            eval(data);
        });
    });

});