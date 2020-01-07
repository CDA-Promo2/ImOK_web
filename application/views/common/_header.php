<?php
//Check if the user is logged in, if not, redirect to the login page
if($title!='Connexion' && !isset($_SESSION['user'])){
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
	<link rel="stylesheet" href="<?= base_url('assets/app/css/style.css') ?>">
	<title><?= $title ?></title>
</head>
<body>
<div class="container-fluid p-0 d-flex">
	<?php if(isset($_SESSION['user'])){include_once('_navigation.php');} ?>
	<main class="p-2 w-100">
		<?php if(isset($_SESSION['user'])){include_once('_breadcrumbs.php');} ?>
