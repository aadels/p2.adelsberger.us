
<div >
         <img class="img-rounded" src="/uploads/avatars/<?= $user->image ?>">
</div>


<h2>Hi, <?=$user->first_name?>. Here are the posts from users you are following.</h2>

<?php if (count($posts) == 0) :?>
        <p>You are not following anyone yet. Follow  <a href="/posts/users">other users here!</a></p>
<?php endif; ?>

<?php foreach($posts as $post): ?>

<article>
	<div class="row">
        <div class="col-xs-3 col-lg-2">
        	<img class="img-rounded" src="/uploads/avatars/<?=$post['image']?>">
        </div>
        	<div class="col-xs-9 col-lg-10">
	        	<div class="well post">
					<h3> <?=$post['first_name']?> <?=$post['last_name'] ?> posted: </h3>
					<p><?=$post['content'] ?></p>
					<time datetime="<?=Time::display($post['created'],'Y-m-d G:i')?>">
						<small><?=Time::display($post['created'])?></small>
					</time>
				</div>
			</div>
</article>

<?php endforeach; ?>