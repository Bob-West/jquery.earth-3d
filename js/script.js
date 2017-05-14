$( document ).ready(function() {

    $("#city_names").change(function (e) {
        console.log($('select[name=city_names]').val());
        var city = $('select[name=city_names]').val();

        var posting = $.post( 'ajax.php', { 'city': city} );
		
		
        posting.done(function( data ) {
            console.log(data);
            $('#airlines_namen').html(data);
		
        });
		
		
		  var posting = $.post( 'show_lines.php', { 'city': city} );
		
		
			posting.done(function( data ) {
				console.log(data);
				$('#show_lines').html(data);
			
			});

        var posting = $.post( 'functions.php', { 'city': city} );

        posting.done(function( data ) {
            $('#earth_div').html('');
            //console.log("Done");
            eval(data);
        });
    });

});
$( document ).ready(function() {

    $("#airlines_namen").change(function (e) {
        console.log($('select[name=airlines_namen]').val());
		
		var selected_city = $('select[name=city_names]').val();
        var name = $('select[name=airlines_namen]').val();

        var posting = $.post( 'functions.php', { 'selected_city': selected_city , 'name': name } );
		
        posting.done(function( data ) {
            $('#earth_div').html('');
            //console.log("Done");
            eval(data);
        });
    });

});