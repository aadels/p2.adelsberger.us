<? foreach ($users as $user): ?>

	<!-- Print user's name -->
	<?=$user['first_name']?> <?=$user['last_name']?>

	<!-- If there is a connection with this user, sho an unfollow link -->
	<? if(isset($connections[$user['user_id']]): ?>

		<a href='/posts/unfollow/<?=$user['user_id']?>'>Unfollow</a>

	<!-- Otherwise, show the folllow link -->
	<? else: ?>
		<a href='/posts/follow/<?$users['user_id']?>'>Follow</a>
	<? endif; ?>

	<br><br>

<? endforeach; ?>
	

