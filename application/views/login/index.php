<div class="container">

	<div class="row justify-content-center">
		<div class="col-12 col-md-8 col-lg-6">
			<form action="<?= site_url('login') ?>" method="post" class="card p-5">
				<div class="form-group">
					<label for="mail">Adresse mail</label>
					<input class="form-control" type="text" name="mail" id="mail">
				</div>
				<div class="form-group">
					<label for="password">Mot de passe</label>
					<input class="form-control" type="password" name="password" id="password">
				</div>
				<div class="text-right">
					<button type="submit" name="login" value="1" class="btn btn-primary">Se connecter</button>
				</div>
				<?php if(isset($formError)){ ?>
					<small class="alert alert-danger mt-5 p-2 text-center"><?=$formError?></small>
				<?php } ?>
			</form>
		</div>
	</div>

</div>
