<aside id="mainNavigation" class="p-2 shadow">
	<div class="userProfile mt-2 text-center">
		<img src="<?=base_url('assets/img/defaultAvatar.png')?>" alt="<?= $_SESSION['user']->firstname .' '. $_SESSION['user']->lastname?>" class="img-fluid w-50">
		<p class="mb-2"><?= $_SESSION['user']->firstname .' '. $_SESSION['user']->lastname?></p>
		<form action="<?=site_url('login')?>" method="POST">
			<button type="submit" class="btn btn-primary px-1 py-0" name="logout" value="1"><small>Deconnexion</small></button>
		</form>
	</div>
	<nav>

	</nav>
</aside>
