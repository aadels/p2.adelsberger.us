// Set up the options for ajax
 var options = {
                    
    type: 'post',
    url: 'process1.php',
    beforeSend: function() {   
    //Display a loading message while waiting for the ajax call to complete
        $('#results').html("Loading...");
    },
    //Hide form and display results
    success: function(response) {
        $(".madlib_form").hide();
        $('#results').html(response);
	}
};

$('form').ajaxForm(options);