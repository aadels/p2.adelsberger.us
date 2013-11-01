
<h2>Log in</h2>
<form method='POST' action ='/users/p_login'>

	Email<br>
	<input type='text' name='email'>
	<br><br>

	Password<br>
	<input type='password' name = 'password'>
	<br><br>


	<?php if(isset($badEmail)): ?>
		<div class='badEmail'>
			The email you entered does not belong to any account.
		</div>
		<br>
	<?php endif; ?>


	<input type='submit' value='Log in'>


</form>