<h2>Sign Up</h2>

<form method='POST' action='/users/p_signup'>

    First Name<br>
    <input type='text' name='first_name'>
    <br><br>

    Last Name<br>
    <input type='text' name='last_name'>
    <br><br>

    Email<br>
    <input type='text' name='email'>
    <br><br>

    Password<br>
    <input type='password' name='password'>
    <br><br>

    <?php if(isset($error)): ?>
        <div class='error'>
            Signup Failed. All fields are required.
        </div>
        <br>
  

    <?php if(isset($exists)): ?>
        <div class='error'>
            There is already an account associated with this email. 
        </div>
        <br>
    <?php endif; ?>

    <input type='submit' value='Sign up'>

</form>