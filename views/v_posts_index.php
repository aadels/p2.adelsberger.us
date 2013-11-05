
<div >
         <img class="img-rounded" src="/uploads/avatars/<?= $user->image ?>">
</div>


<h2>Hi, <?=$user->first_name?>. Here are the posts from users you are following.</h2>

<?php foreach($posts as $post): ?>

<article>
	<div class="row">
        <div class="col-xs-2 col-lg-1">
        	<img class="img-rounded" src="/uploads/avatars/<?=$post['image']?>">
        </div>
        	<div class="post-well">
	        	<div class="well">
					<h3> <?=$post['first_name']?> <?=$post['last_name'] ?> posted: </h3>
					<p><?=$post['content'] ?></p>
					<time datetime="<?=Time::display($post['created'],'Y-m-d G:i')?>">
						<small><?=Time::display($post['created'])?></small>
					</time>
				</div>
			</div>
</article>

<?php endforeach; ?>