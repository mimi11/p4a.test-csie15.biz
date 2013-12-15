
$( document ).ready(function() {
// Handler for .ready() called.
    //settinp data objects to receive Json
    $('#score').click(function(){
        var device_type_id = $('#device_type').val();
        var company_id = $('#company_id').val();
        $.ajax({
            type: 'POST',
            url: '/rankings/ranking',
            data: {
                //Post_object data that is passed to the controller with matching parameters of the user_devices columns
                device_type_id:device_type_id,
                company_id:company_id
            },

            success: function(response) {

                // For debugging purposes
                 console.log(response);

                // Example response: {"post_count":"9","user_count":"13","most_recent_post":"May 23, 2012 1:14am"}

                // Parse the JSON results into an array
                var data = $.parseJSON(response);

                // Inject the data into the page
                $('#result').html(data['comapny_score']);
                $('#session_status').html(data['score_status']);
            }
        });


    });


});





