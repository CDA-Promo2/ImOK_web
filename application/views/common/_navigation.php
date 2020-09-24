
<button type=button class="navigation-open btn d-block d-md-none"><i class="fas fa-bars"></i></button>

<aside id="mainNavigation" class="p-2 shadow">
	<button type=button class="navigation-close btn d-block d-md-none ml-auto"><i class="fas fa-times"></i></button>
	<div class="pl-2 mt-2 mb-4 d-flex align-items-baseline brand">
		<img src="<?= base_url('assets/img/imok.svg')?> ">
		<span>You're OK !</span>
	</div>
	<div class="userProfile mt-2 pl-2 pr-5">
		<a href="<?= site_url('employee/edit/'.$_SESSION['user']->id) ?>" title="Modifier le profil">
			<?php if(read_file(base_url('upload/img/avatar/avatar'.$_SESSION['user']->id.'.jpg'))) { ?>
				<img src="<?= base_url('upload/img/avatar/avatar'.$_SESSION['user']->id.'.jpg') ?>" alt="<?= $_SESSION['user']->firstname .' '. $_SESSION['user']->lastname?>" class="img-fluid rounded hover hover-up">
			<?php }else{ ?>
				<img src="<?= base_url('upload/img/avatar/defaultAvatar.png') ?>" alt="<?= $_SESSION['user']->firstname .' '. $_SESSION['user']->lastname?>" class="img-fluid rounded hover hover-up">
			<?php } ?>
		</a>
		<p class="mb-0"><?= $_SESSION['user']->firstname .' '. $_SESSION['user']->lastname?></p>
		<p class="mb-2 small text-muted"><?=$_SESSION['user']->role?></p>
		<form action="<?=site_url('login')?>" method="POST">
			<button type="submit" class="btn btn-primary px-1 py-0" name="logout" value="1"><small>Deconnexion</small></button>
		</form>
	</div>
	<nav id="mainMenu">
		<ul>
			<li class="menu-group">
				<a class="text-default font-weight-bold menu-title" href="<?=site_url()?>">Accueil</a>
			</li>
		</ul>
		<?php if($_SESSION['user']->id_roles == 1){ ?>
		<ul>
			<li class="menu-group">
				<h3 class="menu-title">Collaborateurs</h3>
				<ul class="menu-content">
					<li><a href="<?= site_url('employee/list')?>" title="Liste des clients">Liste des collaborateurs</a></li>
					<li><a href="<?= site_url('employee/create')?>" title="Enregistrer un client">Enregistrer un collaborateur</a></li>
				</ul>
			</li>
		</ul>
		<?php } else {?>
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
					<li><a href="<?= site_url('estate')?>" title="Liste des biens">Liste des biens</a></li>
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
		<?php } ?>
	</nav>
</aside>
