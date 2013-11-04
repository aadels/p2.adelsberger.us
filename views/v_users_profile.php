
  <h1 class="page-header">Hi, <?=$user->first_name?>!</h1>
      	
        <?php if ($user->image  == 'placeholder.png'): ?>
            <p>Would you like to update your profile picture?</p>
        <?php endif; ?>
        <form role="form" method='POST' enctype="multipart/form-data" action='/users/profile_image/'>
                <img src="/uploads/avatars/<?= $user->image ?>" alt="<?=$user->first_name . ' ' . $user->last_name ?>">                    
                    <div class="form-group">
                            
                            <input type="file" id="image" name="image">
                            <button type="submit" class="btn btn-custom">Update</button><br />
                    </div>
                    
        </form>   
        <?php if(isset($error)): ?>
            <div class="callout-error">
                <h4>Upload failed.</h4> 
                <p>Image file must be a jpg, gif, or png.</p>
            </div>
        <?php endif; ?>   