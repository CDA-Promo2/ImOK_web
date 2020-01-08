<?php
$config = [
    'customer/create' => [
            [
            'field' => 'lastname',
            'label' => 'Nom de famille',
            'rules' => 'trim|required|max_length[50]'
        ],
            [
            'field' => 'firstname',
            'label' => 'Prénom',
            'rules' => 'trim|required|max_length[50]'
        ],
            [
            'field' => 'street',
            'label' => 'Adresse',
            'rules' => 'trim|required|max_length[100]'
        ],
            [
            'field' => 'complement',
            'label' => 'Complément',
            'rules' => 'trim'
        ],
            [
            'field' => 'phone',
            'label' => 'Téléphone',
            'rules' => 'trim|required|max_length[10]|integer'
        ],
            [
            'field' => 'id_marital_status',
            'label' => 'Statut',
            'rules' => 'trim|required|max_length[1]|integer'
        ],
            [
            'field' => 'id_cities',
            'label' => 'Ville',
            'rules' => 'trim|required|max_length[5]|integer'
        ],
            [
            'field' => 'mail',
            'label' => 'Mail',
            'rules' => 'trim|required|valid_email'
            ],
             [
            'field' => 'civility',
            'label' => 'Civilité',
                'rules' => 'trim|required'
             ],
             [
                'field' => 'birthdate',
                'label' => 'date de naissance',
                'rules' => ['trim', 'required', 'max_length[10]', 'regex_match[/^([12]\d{3}-(0[1-9]|1[0-2])-(0[1-9]|[12]\d|3[01]))$/]']
            ],
            [
                'field' => 'date_register',
                'label' => 'date d\'inscription',
                'rules' => ['trim', 'required', 'max_length[10]', 'regex_match[/^([12]\d{3}-(0[1-9]|1[0-2])-(0[1-9]|[12]\d|3[01]))$/]']
            ]
    ]
];