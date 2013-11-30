// Set up the options for ajax
 var options = {
                    
    type: 'post',
    url: '/posts/p_add/',
    beforeSend: function() {   
    //Display a loading message while waiting for the ajax call to complete
        $('#results').html("Loading...");
    },
    //Hide form and display results
    success: function(response) {
        $("#form-fieldset").hide();
        $('#results').html(response);
	}
};

$('form').ajaxForm(options);