<?php
//Check if the user is logged in, if not, redirect to the login page
if(!isset($noLoginRequired) && !isset($_SESSION['user'])){
	redirect(site_url('login'));
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
		  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="<?= base_url('assets/common/css/bootstrap.min.css') ?>">
	<link rel="stylesheet" href="<?= base_url('assets/common/css/trumbowyg.min.css') ?>">
	<link rel="stylesheet" href="<?= base_url('assets/app/css/style.css') ?>">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
	<title><?= $title ?></title>
</head>
<body>
<div class="container-fluid">
	<?php if(isset($_SESSION['user'])){include_once('_navigation.php');} ?>
	<main class="<?=isset($_SESSION['user']) ? 'shrinked' : '' ?>">

		<!--message de validation (flash data)-->
		<?php if(isset($_SESSION['validation_message'])){ ?>
			<p class="validation_message alert alert-success"><?= $_SESSION['validation_message'] ?></p>
		<?php } ?>

