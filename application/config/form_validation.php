<?php

//Regles
//Ici, nous definissons les rêgles de validation à appliquer selon le nom de l'input
$lastname = [
	'field' => 'lastname',
	'label' => 'Nom de famille',
	'rules' => ['trim','required','max_length[50]']
];
$firstname = [
	'field' => 'firstname',
	'label' => 'Prénom',
	'rules' => ['trim','required','max_length[50]']
];
$street = [
	'field' => 'street',
	'label' => 'Adresse',
	'rules' => ['trim','required','max_length[100]']
];
$complement = [
	'field' => 'complement',
	'label' => 'Complément',
	'rules' => 'trim'];
$phone = [
	'field' => 'phone',
	'label' => 'Téléphone',
	'rules' => ['trim','required','exact_length[10]','integer']
];
$id_marital_status = [
	'field' => 'id_marital_status',
	'label' => 'Statut',
	'rules' => ['trim','required','max_length[1]','integer']
];
$id_cities = [
	'field' => 'id_cities',
	'label' => 'Ville',
	'rules' => ['trim','required','max_length[5]','integer']
];
$mail = [
	'field' => 'mail',
	'label' => 'Mail',
	'rules' => ['trim','required','valid_email']
];
$civility = [
	'field' => 'civility',
	'label' => 'Civilité',
	'rules' => ['trim','required']
];
$birthdate = [
	'field' => 'birthdate',
	'label' => 'date de naissance',
	'rules' => ['trim', 'required', 'max_length[10]', 'regex_match[/^([12]\d{3}-(0[1-9]|1[0-2])-(0[1-9]|[12]\d|3[01]))$/]']
];
$date_register = [
	'field' => 'date_register',
	'label' => 'date d\'inscription',
	'rules' => ['trim', 'required', 'max_length[10]']
];
$id_roles = ['field' =>
	'id_roles',
	'label' => 'Role',
	'rules' => ['trim','required','max_length[5]','integer']
];
$date_start = [
	'field' => 'date_start',
	'label' => 'Date de début',
	'rules' => ['trim', 'required']
];
$date_end = [
	'field' => 'date_end',
	'label' => 'Date de fin',
	'rules' => ['trim', 'required']  
];
$note = [
	'field' => 'note',
	'label' => 'Note',
	'rules' => ['trim','required']
];
$id_appointment_types = [
	'field' => 'id_appointment_types',
	'label' => 'Type',
	'rules' => ['trim','required','max_length[1]','integer']
];
$id_customers = [
	'field' => 'id_customers',
	'label' => 'Client',
	'rules' => ['trim','required','max_length[5]','integer']
];
$id_employees = [
	'field' => 'id_employees',
	'label' => 'Employé',
	'rules' => ['trim','required','max_length[5]','integer']
];
//Routes
//Selon la route, nous définissons les rêgles à appeller
$config = [
    'customer/create' => [ $lastname, $firstname, $street, $complement, $phone, $id_cities, $mail, $civility, $birthdate, $date_register],
	'customer/edit' => [ $lastname, $firstname, $street, $complement, $phone, $id_cities, $mail, $civility, $birthdate, $date_register],
	'employee/create' => [$lastname, $firstname, $street, $complement, $id_cities, $mail, $phone, $id_roles],
	'employee/edit' => [$lastname, $firstname, $street, $complement, $id_cities, $mail, $phone, $id_roles],
	'appointment/create' => [$date_start, $date_end, $note, $id_appointment_types, $id_customers, $id_employees],
	'appointment/edit' => [$date_start, $date_end, $note, $id_appointment_types, $id_customers, $id_employees]
];
