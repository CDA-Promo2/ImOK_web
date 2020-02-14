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
	'rules' => ['trim', 'required', 'max_length[10]', 'regex_match[/^([12]\d{3}-(0[1-9]|1[0-2])-(0[1-9]|[12]\d|3[01]))$/]']
];
$id_roles = [
	'field' => 'id_roles',
	'label' => 'Role',
	'rules' => ['trim','required','max_length[5]','integer']
];
$password = [
	'field' => 'password',
	'label' => 'Mot de passe',
	'rules' => ['trim','required','regex_match[/^.*(?=.{8,})((?=.*[!@#$%^&*()\-_=+{};:,<.>]){1})(?=.*\d)((?=.*[a-z]){1})((?=.*[A-Z]){1}).*$/]'],
	'errors' => ['regex_match' => '8 caractères, une majuscule, un chiffre et un caractère spécial minimums']
];
$password_confirm = [
	'field' => 'password_confirm',
	'label' => 'Confirmation',
	'rules' => ['trim','required','matches[password]']
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
	'label' => 'collaborateur',
	'rules' => ['trim','required','max_length[5]','integer']
];
$id_district = [
	'field' => 'id_district',
	'label' => 'Dictrict',
	'rules' => ['trim','max_length[5]','integer']
];
$renovation = [
	'field' => 'renovation',
	'label' => 'Rénovation',
	'rules' => ['trim','max_length[5]', 'regex_match[/^[0-1]{1}$/]']
];
$id_estate_types = [
	'field' => 'id_estate_types',
	'label' => 'Type de bien',
	'rules' => ['trim','max_length[1]','required','regex_match[/^[0-9]{1}$/]']
];
$floor = [
	'field' => 'floor',
	'label' => 'Etage',
	'rules' => ['trim','max_length[5]','integer']
];
$id_build_date = [
	'field' => 'id_build_date',
	'label' => 'Type de bien',
	'rules' => ['trim','max_length[5]','regex_match[/^[0-9]{1}$/]']
];
$condominium = [
	'field' => 'condominium',
	'label' => 'Mitoyenneté',
	'rules' => ['trim','max_length[1]', 'regex_match[/^[0-1]{1}$/]']
];
$joint_ownership = [
	'field' => 'joint_ownership',
	'label' => 'Copropriété',
	'rules' => ['trim','max_length[1]', 'regex_match[/^[0-1]{1}$/]']
];
$floor_number = [
	'field' => 'floor_number',
	'label' => 'Nombre d\'étages',
	'rules' => ['trim','max_length[5]','integer']
];
$id_expositions = [
	'field' => 'id_expositions',
	'label' => 'Exposition',
	'rules' => ['trim','max_length[5]','integer']
];
$size = [
	'field' => 'size',
	'label' => 'Surface',
	'rules' => ['trim','max_length[5]','decimal']
];
$carrez_size = [
	'field' => 'carrez_size',
	'label' => 'Surface (loi Carrez)',
	'rules' => ['trim','max_length[5]','decimal']
];
$rooms_numbers = [
	'field' => 'rooms_numbers',
	'label' => 'Nombre de chambre',
	'rules' => ['trim','max_length[5]','integer']
];
$bedroom_numbers = [
	'field' => 'bedroom_numbers',
	'label' => 'Nombre de chambre',
	'rules' => ['trim','max_length[5]','integer']
];
$id_outside_conditions = [
	'field' => 'id_outside_conditions',
	'label' => 'Condition extérieur',
	'rules' => ['trim','max_length[1]','integer']
];

//Routes
//Selon la route, nous définissons les rêgles à appeller
$config = [
    'customer/create' => [ $lastname, $firstname, $street, $complement, $phone, $id_cities, $mail, $civility, $birthdate, $date_register],
	'customer/edit' => [ $lastname, $firstname, $street, $complement, $phone, $id_cities, $mail, $civility, $birthdate, $date_register],
	'employee/create' => [$lastname, $firstname, $mail, $phone, $id_roles],
	'employee/edit' => [$lastname, $firstname, $street, $complement, $id_cities, $mail, $phone, $id_roles],
	'employee/password' => [$password,$password_confirm],
	'appointment/create' => [$date_start, $date_end, $note, $id_appointment_types, $id_customers, $id_employees],
	'appointment/edit' => [$date_start, $date_end, $note, $id_appointment_types, $id_customers, $id_employees],
	'employee/passwordrecovery/1' => [$mail],
	'employee/passwordrecovery/2' => [$password,$password_confirm],
	'estate/create' => [$id_customers, $id_cities, $street, $complement, $renovation, $id_estate_types, $floor, $id_build_date, $condominium, $joint_ownership,
		$floor_number, $id_expositions, $size, $carrez_size, $rooms_numbers, $bedroom_numbers, $id_outside_conditions]
];


/*
|-----------------------------------------------------------------------
| Form Error delimiters
|-----------------------------------------------------------------------
 */
$config['error_prefix'] = '<div class="form-error">';
$config['error_suffix'] = '</div>';
