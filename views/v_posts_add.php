<form method='POST' action='/posts/p_add'>
    <div class="form-group">
        <label for='content'>New Post:</label>
        <br>
        <textarea "form-control" rows="3" ='content' id='content'></textarea>

         <?php if(isset($error)): ?>
            <div class='error'>
                Post failed. Please add a post!
            </div>            
        <?php endif; ?>
    </div>
    <br><br>
    <input type='submit' value='New post'>
</form> 


