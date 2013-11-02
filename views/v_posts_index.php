
<div >
         <img src="/uploads/avatars/<?= $user->image ?>">
</div>


<form method='POST' action='/posts/p_add'>

    <label for='content'>New Post:</label>
    <br>
    <textarea name='content' id='content'></textarea>

    <br><br>
    <input type='submit' value='New post'>

</form> 


<h1>Hi,<?=$user->first_name?>. Here are the posts from users you are following.</h1>

<?php foreach($posts as $post): ?>

<article>

	<h2> <?=$post['first_name']?> <?=$post['last_name'] ?> posted: </h2>

	<p><?=$post['content'] ?></p>

	<time datetime="<?=Time::display($post['created'],'Y-m-d G:i')?>">
		<?=Time::display($post['created'])?>
	</time>

</article>

<?php endforeach; ?>