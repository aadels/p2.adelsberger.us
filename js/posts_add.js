// Set up the options for ajax
 var options = {
                    
    type: 'post',
    url: 'posts/p_add/',

    beforeSubmit: function() {
        $('#results').html("Adding...");
    },

    //Hide form and display results
    success: function(response) {
        $(".madlib_form").hide();
        $('#results').html(response);
	}
};

$('form').ajaxForm(options);