
<div class="row">
		<aside class="col-sm-2 col-lg-1">
        	<img class="img-rounded img-post" src="/uploads/avatars/<?= $user->image ?>">
        </aside>
        <article class=" col-sm-9 col-sm-offset-1 col-lg-10 col-lg-offset-1 ">
        	<h3>Hi, <?=$user->first_name?>. Here are the posts from users you are following.</h3>
        </article>
</div>

<br><br>

<?php if (count($posts) == 0) :?>
        <p>You are not following anyone yet. Follow  <a href="/posts/users">other users here!</a></p>
<?php endif; ?>

<?php foreach($posts as $post): ?>


	<div class="row">
        <aside class="col-xs-2 col-lg-1">
        	<img class="img-rounded img-post" src="/uploads/avatars/<?=$post['image']?>">
        </aside>
    	<article class="col-xs-9 col-xs-offset-1 col-lg-10 col-lg-offset-1 ">
        	<div class="well post">
				<h4> <?=$post['first_name']?> <?=$post['last_name'] ?> posted: </h4>
				<p><?=$post['content'] ?></p>
				<time datetime="<?=Time::display($post['created'],'Y-m-d G:i')?>">
					<small><?=Time::display($post['created'])?></small>
				</time>
			</div>
		</article>
	</div>


<?php endforeach; ?>