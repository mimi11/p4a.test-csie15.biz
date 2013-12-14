
$( document ).ready(function() {
// Handler for .ready() called.
    $('#score').click(function(){
        var device_type_id = $('#device_type').val();
        var device_model = $('#device_model').val();
        var company_id = $('#company_id').val();
/*
plain object sent to the server with the request (parameter 2 of 3 for the ajax load())
 */
        $( "#result" ).load( "/rankings/ranking",
            //Post_object data that is passed to the controller with matching parameters of the user_devices columns
            {   device_type_id:device_type_id,
                model:device_model,
                company_id:company_id
            },
            function( response, status, xhr ) {
            if ( status == "error" ) {
                var msg = "Sorry but there was an error: ";
                $( "#error" ).html( msg + xhr.status + " " + xhr.statusText );
            }else{
                alert(status);
            }
        });

    });


});





