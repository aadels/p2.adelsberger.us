<form method='POST' action='/posts/p_add'>

    <label for='content'>New Post:</label>
    <br>
    <textarea name='content' id='content'></textarea>

     <?php if(isset($error)): ?>
        <div class='error'>
            Post failed. Please add a post!
        </div>
        

    <?php endif; ?>

    <br><br>
    <input type='submit' value='New post'>

</form> 

