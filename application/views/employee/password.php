

<h2 class="my-5 text-center">Modifier votre mot de passe</h2>
<?php if($_SESSION['user']->first_connection){ ?>
	<p class="text-center">Bonjour <?=$_SESSION['user']->firstname?>, vous vous connectez pour la première fois. Par mesure de sécurité, nous vous demandons de bien vouloir modifier votre mot de passe.</p>
<?php } ?>

<div class="row justify-content-center my-5">
	<div class="col-md-8 col-lg-6">
		<form action="<?= site_url('employee/password/'.$employee->id) ?>" method="POST">
			<?= form_open()?>
			<div class="form-group">
				<label for="password">Nouveau mot de passe</label>
				<input type="password" name="password" id="password" class="form-control" placeholder="Mot de passe" value="<?= $_POST['password'] ?? '' ?>">
				<?= form_error('password') ?>
			</div>
			<div class="form-group">
				<label for="password_confirm">Confirmation</label>
				<input type="password" name="password_confirm" id="password_confirm" class="form-control" placeholder="Confirmez votre mot de passe">
				<?= form_error('password_confirm') ?>
			</div>
			<button class="submit btn btn-primary form-control">Valider</button>
		</form>

	</div>
</div>
