<h1>Follow Users</h1>

        <form class="madlib_form" method='post'>
        	<fieldset id= "form-fieldset">
	            Adjective: <input type="text" id='madlib' name="input1" required size=20><br>
	            Plural Noun: <input type="text" id='madlib' name="input2" required size=20><br>
	            Femenine first name: <input type="text" id='madlib' name="input3" required size=20><br>
	            Last name: <input type="text" id='madlib' name="input4" required size=20><br>
	            Noun: <input type="text" id='madlib' name="input5" required size=20><br>
	            A place: <input type="text" id='madlib' name="input6" required size=20><br>
	            A special event: <input type="text"  id='madlib' name="input7" required size=20><br>
	            Verb: <input type="text" id='madlib' name="input8" required size=20><br>
	            Noun: <input type="text" id='madlib' name="input9" required size=20><br>
	            Verb in the present tense: <input type="text" id='madlib' name="input10" required size=20><br>
	            Noun: <input type="text" id='madlib' name="input11" required size=20><br>
	            Noun: <input type="text" id='madlib' name="input12" required size=20><br>
	            Noun: <input type="text" id='madlib' name="input13" requiredsize=20><br>
	            Noun: <input type="text"  id='madlib' name="input14" required size=20><br>
	            Verb: <input type="text" id='madlib' name="input15" required size=20><br>

	            <input type='submit' class="button" value='See Mad-lib!'> 
	        </fieldset>          
        </form>

        <fieldset id= "result-fieldset">
            <div id='results'></div>
        </fieldset>
        
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script type="text/javascript" src='js/jquery.form.js'></script>
        <script type="text/javascript" src='js/jquery.validate.js'></script>
        
        <script>
        
                var options = {
                    
                    type: 'post',
                    url: 'process2.php',
                    beforeSend: function() {   
                        // Display a loading message while waiting for the ajax call to complete
                        $('#results').html("Loading...");
                    },
                    
                    success: function(response) {
                        $(".madlib_form").hide();
                        $('#results').html(response);
                	}
                };

                $('form').ajaxForm(options);
               
     
        </script>
        
        


