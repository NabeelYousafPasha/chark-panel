<?php

return [

    'pdf_path' => 'app/reports/pdf/',

    'gender' => [
        'male' => 'Male',
        'female' => 'Female',
    ],

    'bool' => [
        'yes' => 'yes',
        'no' => 'no',
    ],

    'validation' => [
        'boolean' => ['yes', 'no'],

        'mallampati_classification' => [
            'class-1', 'class-2', 'class-3', 'class-4',
        ],

        'tonsil_classification' => [
            'tonsil-0', 'tonsil-1', 'tonsil-2', 'tonsil-3', 'tonsil-4',
        ],
    ],

    'si_units' => [
        'lbs_to_kgs' => '0.453',
        'kgs_to_lbs' => '2.204',

        'foot_to_meter' => '0.3048',
    ],

    'report' => [
        'sleep_exams' => [
            'snore' => [
                'condition' => '==',
                'matching_value' => '1',
                'replace' => 'Snoring',
            ],
            'tired' => [
                'condition' => '==',
                'matching_value' => '1',
                'replace' => 'Daytime sleepiness or fatigue',
            ],
            'stop_breathing' => [
                'condition' => '==',
                'matching_value' => '1',
                'replace' => 'Observed Apnea (breathing cessation)',
            ],
            'high_blood_pressure' => [
                'condition' => '==',
                'matching_value' => '1',
                'replace' => 'High Blood Pressure',
            ],
        ],

        'medical_histories' => [
            'insomnia' => [
                'condition' => '=',
                'matching_value' => '1',
                'replace' => 'Insomnia',
            ],
            'blood_pressure' => [
                'condition' => '=',
                'matching_value' => '1',
                'replace' => 'Blood Pressure',
            ],
            'stroke' => [
                'condition' => '=',
                'matching_value' => '1',
                'replace' => 'Stroke',
            ],
            'heart_attack' => [
                'condition' => '=',
                'matching_value' => '1',
                'replace' => 'Heart Attack',
            ],
            'atrial_fibrillation' => [
                'condition' => '=',
                'matching_value' => '1',
                'replace' => 'Atrial Fibrillation',
            ],
            'diabetes' => [
                'condition' => '=',
                'matching_value' => '1',
                'replace' => 'Diabetes',
            ],
            'gerd' => [
                'condition' => '=',
                'matching_value' => '1',
                'replace' => 'GERD (Gastric Reflux)',
            ],
            'anxiety' => [
                'condition' => '=',
                'matching_value' => '1',
                'replace' => 'Depression / Anxiety',
            ],
        ],

        'dental_exams' => [
            'scalloped_tongue' => [
                'condition' => '=',
                'matching_value' => '1',
                'replace' => 'Scalloped Tongue',
            ],
            'bruxism' => [
                'condition' => '=',
                'matching_value' => '1',
                'replace' => 'Bruxism',
            ],
            'tooth_wear' => [
                'condition' => '=',
                'matching_value' => '1',
                'replace' => 'Tooth Wear',
            ],
            'mallampati_classification' => [
                'condition' => '>=',
                'matching_value' => 'class-3',
                'replace' => 'Mallampati score of',
                'image' => true,
            ],
            'tonsil_classification' => [
                'condition' => '>=',
                'matching_value' => 'tonsil-3',
                'replace' => 'Tonsil grade of',
                'image' => true,
            ],
        ],
    ],


    'scoring' => [
        'age' => [
            'condition' => '>=',
            'matching_value' => 50,
        ],
        'gender' => [
            'condition' => '==',
            'matching_value' => 'male',
        ],
        'bmi' => [
            'condition' => '>=',
            'matching_value' => 35,
        ],
        'neck_size' => [
            'inches' => [
                'condition' => '>=',
                'matching_value' => 16,
            ],
            'cm' => [
                'condition' => '>=',
                'matching_value' => 40.5,
            ],
        ],
    ],

];
