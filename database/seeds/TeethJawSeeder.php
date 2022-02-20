<?php

use App\Models\TeethJaw;
use Illuminate\Database\Seeder;

class TeethJawSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $uniqueTeeth = [
            [
                'tooth_name' => 'Third molar (wisdom tooth)',
                'tooth_number' => '1',
                'type' => 'molar',
            ],
            [
                'tooth_name' => 'Second Molar',
                'tooth_number' => '2',
                'type' => 'molar',
            ],
            [
                'tooth_name' => 'First Molar',
                'tooth_number' => '3',
                'type' => 'molar',
            ],
            [
                'tooth_name' => 'Second premolar (Second Bicuspid)',
                'tooth_number' => '4',
                'type' => 'premolar',
            ],
            [
                'tooth_name' => 'First premolar (First Bicuspid)',
                'tooth_number' => '5',
                'type' => 'premolar',
            ],
            [
                'tooth_name' => 'Canine (Cuspid)',
                'tooth_number' => '6',
                'type' => 'canine',
            ],
            [
                'tooth_name' => 'Lateral Incisor',
                'tooth_number' => '7',
                'type' => 'incisor',
            ],
            [
                'tooth_name' => 'Central Incisor',
                'tooth_number' => '8',
                'type' => 'incisor',
            ],

        ];

        $jawPositionTeeth = [
            '1' => [
                '0' => $uniqueTeeth,
                '1' => $uniqueTeeth,
            ],
            '0' => [
                '0' => $uniqueTeeth,
                '1' => $uniqueTeeth,
            ],
        ];

        foreach ($jawPositionTeeth as $jaw => $jaws) {
            foreach ($jaws as $position => $positions) {
                foreach ($positions as $teeth) {
                    $teeth = array_merge($teeth, [
                        'jaw' => $jaw,
                        'position' => $position,
                        'order' => $teeth['tooth_number'],
                        'image' => 'teeth/tooth-'.$jaw.'-'.$position.'-'.$teeth['tooth_number'].'.png',
                    ]);
                    unset($teeth['tooth_number']);

                TeethJaw::create($teeth + ['created_by' => 1]);
                }
            }

        }
    }
}
