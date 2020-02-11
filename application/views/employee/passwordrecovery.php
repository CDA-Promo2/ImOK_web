<div class="container">

	<h1 class="text-center">Mot de passe oublié ?</h1>

<div class="row justify-content-center mt-5">
	<div class="col-12 col-md-8 col-lg-6">

		<?php if($step == 1){ ?>

		<div class="card bg-light">
			<div class="card-header">
				<h2>Etape 1</h2>
				<h4 class="card-title">Renseignez votre addresse email</h4>
				<p>Nous vous envoyons un mail contenant un code de récupération</p>
			</div>
			<div class="card-body">
				<form action="<?= site_url('employee/passwordrecovery/1') ?>" method="post">
					<div class="form-group">
						<label for="mail">Adresse mail</label>
						<input class="form-control" type="text" name="mail" id="mail">
					</div>
					<div class="d-flex justify-content-between">
						<a href="<?= site_url('login')?>" class="btn btn-link">Retour</a>
						<button type="submit" name="sendToken" value="1" class="btn btn-primary">Envoyer</button>
					</div>
					<?php if(isset($formError)){ ?>
						<div>
							<small class="alert alert-danger mt-5 p-2 text-center"><?=$formError?></small>
						</div>
					<?php } ?>
				</form>
			</div>
		</div>

		<?php } else { ?>

			<div class="card bg-light">
				<div class="card-header">
					<h2>Etape 2</h2>
					<h4 class="card-title">Vérifiez votre boite mail</h4>
					<p>Rentrez le code de récupération, puis votre nouveau mot de passe</p>
				</div>
				<div class="card-body">
					<form action="<?= site_url('employee/passwordrecovery/2') ?>" method="post">
						<div class="form-group">
							<label for="token">Code de sécurité</label>
							<input class="form-control" type="text" name="token" id="token">
						</div>
						<div class="form-group">
							<label for="password">Votre nouveau mot de passe</label>
							<input class="form-control" type="password" name="password" id="password">
						</div>
						<div class="form-group">
							<label for="password_confirm">Confirmation de mot de passe</label>
							<input class="form-control" type="password" name="password_confirm" id="password_confirm">
						</div>
						<div class="d-flex justify-content-between">
							<a href="<?=site_url('login')?>" class="btn btn-link">Retour</a>
							<button type="submit" name="passwordupdate" value="1" class="btn btn-primary">Enregistrer mon nouveau mot de passe</button>
						</div>
						<?php if(isset($formError)){ ?>
							<div>
								<small class="alert alert-danger mt-5 p-2 text-center"><?=$formError?></small>
							</div>
						<?php } ?>
						<?php if(isset($tokenError)){ ?>
							<div>
								<small class="alert alert-danger mt-5 p-2 text-center"><?=$tokenError?></small>
							</div>
						<?php } ?>
					</form>
				</div>
			</div>

		<?php } ?>

	</div>
</div>


</div>
