<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class ClinicalExploration extends Model implements HasMedia
{
    use HasMediaTrait;
    protected $fillable = [
        "assessment_id",
        "cpap",
        "mandibular_advancement_device",
        "positional_therapy",
        "upper_airway_surgery",
        "upper_airway_surgery_value",
        "other_upper_airway_surgery",
        "bariatric_surgery",
        "other_treatments_for_sleep_apnea",
        "height",
        "weight",
        "bmi",
        "neck_circumference",
        "bruxism",
        "pointed_hard_palade",
        "tmj_noise",
        "tmj_pain",
        "bilateral_crossbite",
        "lateral_crossbite",
//        "normognathic",
//        "retrognathic",
//        "prognathic",
//        "edge_to_edge_bite",
//        "anterior_crossbite",
//        "overbite",
//        "total_visibility_of_tonsils_uvula_soft_palate",
//        "hard_and_soft_palate_visibility",
//        "hard_and_palate_and_part_of_soft_palate_visibility",
//        "only_hard_palate_visibility",
        'mallampati_classification',
        'tonsil_classification',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];
}
