<form method='POST' action='/posts/p_add'>

    <label for='content'>New Post:</label>
    <br>
    <textarea name='content' id='content'></textarea>

    <br><br>
    <input type='submit' value='New post'>

</form> 
<?php if(isset($error)): ?>
    <div>
        <h4>Post failed.</h4> 
        <p>Please Yak away!</p>
    </div>
<?php endif; ?>

