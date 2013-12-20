/*-------------------------------------------------------------------------------------------------
 Status update
 -------------------------------------------------------------------------------------------------*/
$( document ).ready(function() {
// Handler for .ready() called.
    $('#session_status').html(data['score_status']);


    var user_status = {};
    user_status['green'] = {
        status: 'green'


    }
    user_status['yellow'] = {
            status: 'yellow'

    }
    user_status['red'] = {
        status: 'red'
    }



     // Figure out which color we should use
    if(user_status['green'] == (data['score_status'])){
        $(this).css('background-color');
    }


});
