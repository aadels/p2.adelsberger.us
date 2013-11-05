<form method='POST' action='/posts/p_add'>
    <div class="form-group">
        <label for='content'>New Post:</label>
        <br>
        <textarea class="form-control" rows="4" ='content' id='content'></textarea>

         <?php if(isset($error)): ?>
            <div class='error'>
                Post failed. Please add a post!
            </div>            
        <?php endif; ?>
    </div>
    <br>
    <input type='submit' value='Post'>
</form> 


