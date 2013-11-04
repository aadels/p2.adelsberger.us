<!DOCTYPE html>
<html>
<head>
	<title><?php if(isset($title)) echo $title . " - "; ?>YaketyYak</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    
    

					
	<!-- Controller Specific JS/CSS -->
	<?php if(isset($client_files_head)) echo $client_files_head; ?>
	<!--custom css-->
</head>

<body>	
	<div id='menu'>
		<a href='/'>Home</a>

		<!-- Menu for users who are logged in-->
		<?php if($user): ?>
	        <a href='/posts'>View &amp; Add Posts</a>                      
	        <a href='/posts/users'>Follow Others</a                      
			<a href='/users/logout'>Logout</a>
			<a href='/users/profile'>Profile</a>

		<!-- Menu for users who are not logged in-->
		<?php else: ?>
			<a href='/users/signup'>Sign up</a>
			<a href='/users/login'>Log in</a>

		<?php endif; ?>
	</div>


	<?php if(isset($content)) echo $content; ?>

	<?php if(isset($client_files_body)) echo $client_files_body; ?>

	        <div id="footer">
            <div class="container">
                <div class="row">
                    <div class="col-xs-6">
                        <p>YaketyYak<br>
                        	+1 features:<br>
                        </p>
                        <ul>
                            <li>Emailing a welcome letter to new users.</li>
                            <li>Uploading/changing profile picture</li>
                        </ul>
                    </div>
                    <div class="col-xs-6">
                        <p class="right pull-right">Ann Adelsberger<br>
                        	CSCI E-15 Project 2<br>
                        	Fall 2013<br>
                            <a href="mailto:adelsbergerann@gmail.com">adelsbergerann@gmail.com</a>
                        </p>
                    </div>
                </div>
            </div>
        </div> <!-- footer -->
	<!--javascript at end of body-->
	<script src="/js/bootstrap.min.js"></script>
	<script src="js/respond.js"></script>	
	<!-- Bootstrap -->


<?php if(isset($client_files_body)) echo $client_files_body; ?>

</body>
</html>