<?php

return [

    'label' => 'Navigasi penomboran',

<<<<<<< HEAD
    'overview' => '{1} Memaparkan 1 rekod|Memaparkan :first hingga :last daripada :total rekod',
=======
    'overview' => '{1} Memaparkan 1 rekod|[2,*] Memaparkan :first hingga :last daripada :total rekod',
>>>>>>> 890ebdd96f7d6873ba198cc859e87d61062ce611

    'fields' => [

        'records_per_page' => [

            'label' => 'per halaman',

            'options' => [
                'all' => 'Semua',
            ],

        ],

    ],

    'actions' => [

        'first' => [
            'label' => 'Pertama',
        ],

        'go_to_page' => [
            'label' => 'Pergi ke halaman :page',
        ],

        'last' => [
            'label' => 'Akhir',
        ],

        'next' => [
            'label' => 'Seterusnya',
        ],

        'previous' => [
            'label' => 'Sebelumnya',
        ],

    ],

];
