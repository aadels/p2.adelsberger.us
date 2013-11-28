// Set up the options for ajax
 var options = {
                    
    type: 'post',
    url: 'posts/p_add/',

    //Hide form and display results
    success: function(response) {
        $(".madlib_form").hide();
        $('#results').html(response);
	}
};

$('form').ajaxForm(options);