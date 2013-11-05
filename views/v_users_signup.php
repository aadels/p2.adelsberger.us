<h2>Create a YaketyYak account</h2>

<form role="form" method='POST' action='/users/p_signup'>

    <div class="form-group">
            <label for="first_name">First Name</label>
            <input type="text" class="form-control" id="first_name" name="first_name"<?php if(isset($_POST['first_name'])) echo "value = '". $_POST['first_name'] ."'"?>>
    </div>
    
    <div class="form-group">
        <label for="last_name">Last Name</label>
        <input type="text" class="form-control" id="last_name" name="last_name"<?php if(isset($_POST['last_name'])) echo "value = '". $_POST['last_name'] ."'"?>>
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" name="email"<?php if(isset($_POST['email'])) echo "value = '". $_POST['email'] ."'"?>>
    </div>
    <div class="form-group">
        <label for="first_name">Password</label>
        <input type="password" class="form-control" id="password" name="password">
    </div> 


    <?php if(isset($error) && $error == 'blank-fields'): ?>
        <div class='error'>
            Signup Failed. All fields are required.
        </div>
    <?php endif; ?>

    <?php if(isset($error) && $error == 'email-exists'): ?>
        <div class='error'>
            There is already an account associated with this email. 
            <a href="/users/login">Login</a>
        </div>
        

    <?php endif; ?>

    <button type="button" class="btn btn-custom btn-lg btn-block">Sign up</button>

</form>