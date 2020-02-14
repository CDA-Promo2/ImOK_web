
	<div class="background"></div>

	<div class="row justify-content-center mt-5">
		<div class="col-12 col-md-6 col-lg-4">
			<div class="card bg-light">
				<div class="card-header">
					<div class="mb-4 d-flex justify-content-center align-items-baseline brand">
						<img src="<?= base_url('assets/img/imok.svg')?> ">
						<span>You're OK !</span>
					</div>
					<h4 class="card-title text-center">
						<div class="fa fa-lock"></div>
						Connectez-vous
					</h4>
				</div>
				<div class="card-body">
					<form action="<?= site_url('login') ?>" method="post">
						<div class="form-group">
							<label for="mail">Adresse mail</label>
							<input class="form-control" type="text" name="mail" id="mail">
						</div>
						<div class="form-group">
							<label for="password">Mot de passe</label>
							<input class="form-control" type="password" name="password" id="password">
						</div>
						<div class="d-flex justify-content-between">
							<a href="<?= site_url('employee/passwordrecovery')?>" class="btn btn-link">J'ai oublié mon mot de passe</a>
							<button type="submit" name="login" value="1" class="btn btn-primary">Se connecter</button>
						</div>
						<?php if(isset($formError)){ ?>
							<small class="alert alert-danger mt-5 p-2 text-center"><?=$formError?></small>
						<?php } ?>
					</form>
				</div>
			</div>

		</div>
	</div>

