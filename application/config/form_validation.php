<?php
$config = [
    'customer/create' => [
            [
            'field' => 'lastname',
            'label' => 'Nom de famille',
            'rules' => 'trim|required|max_length[50]|alpha'
        ],
            [
            'field' => 'firstname',
            'label' => 'Prénom',
            'rules' => 'trim|required|max_length[50]|alpha'
        ],
            [
            'field' => 'street',
            'label' => 'Adresse',
            'rules' => 'trim|required|max_length[100]|alpha_numeric_spaces'
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
            ]
    ]
];