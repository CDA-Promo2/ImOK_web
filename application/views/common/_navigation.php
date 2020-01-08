
<button type=button class="navigation-open btn d-block d-md-none"><i class="fas fa-bars"></i></button>

<aside id="mainNavigation" class="p-2 shadow">
	<button type=button class="navigation-close btn d-block d-md-none ml-auto"><i class="fas fa-times"></i></button>
	<div class="userProfile mt-2 text-center">
		<img src="<?=base_url('assets/img/defaultAvatar.png')?>" alt="<?= $_SESSION['user']->firstname .' '. $_SESSION['user']->lastname?>" class="img-fluid w-50">
		<p class="mb-0"><?= $_SESSION['user']->firstname .' '. $_SESSION['user']->lastname?></p>
		<p class="mb-2 small text-muted"><?=$role->name?></p>
		<form action="<?=site_url('login')?>" method="POST">
			<button type="submit" class="btn btn-primary px-1 py-0" name="logout" value="1"><small>Deconnexion</small></button>
		</form>
	</div>
	<nav id="mainMenu">
		<ul>
			<li class="menu-group">
				<h3 class="menu-title">Clients</h3>
				<ul class="menu-content">
					<li><a href="<?= site_url('customer')?>" title="Liste des clients">Liste des clients</a></li>
					<li><a href="<?= site_url('customer/create')?>" title="Enregistrer un client">Enregistrer un client</a></li>
				</ul>
			</li>
		</ul>
		<ul>
			<li class="menu-group">
				<h3 class="menu-title">Bien immobiliers</h3>
				<ul class="menu-content">
					<li><a href="<?= site_url('estate')?>" title="Liste des biens">Liste des bien</a></li>
					<li><a href="<?= site_url('estate/create')?>" title="Enregistrer un bien">Enregistrer un bien</a></li>
				</ul>
			</li>
		</ul>
		<ul>
			<li class="menu-group">
				<h3 class="menu-title">Rendez-vous</h3>
				<ul class="menu-content">
					<li><a href="<?= site_url('appointment')?>" title="Liste des rendez-vous">Liste des rendez-vous</a></li>
					<li><a href="<?= site_url('appointment/create')?>" title="Enregistrer un rendez-vous">Enregistrer un rendez-vous</a></li>
				</ul>
			</li>
		</ul>
	</nav>
</aside>
