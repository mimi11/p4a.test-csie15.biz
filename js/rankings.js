
$( document ).ready(function() {
// Handler for .ready() called.
    $('#score').click(function(){
        var company_id = $('#company_id').val();

        $( "#result" ).load( "/rankings/ranking",{company_id:company_id},function( response, status, xhr ) {
            if ( status == "error" ) {
                var msg = "Sorry but there was an error: ";
                $( "#error" ).html( msg + xhr.status + " " + xhr.statusText );
            }else{
                alert(status);
            }
        });

    });


});





