<?php

namespace App\Http\Helper;

use App\Models\Assessment;
use Spatie\MediaLibrary\Models\Media;
use Spatie\MediaLibrary\PathGenerator\PathGenerator;

class CustomPathGenerator implements PathGenerator
{

    public function getPath(Media $media): string
    {
        $assessment = Assessment::find($media->model_id);

        return 'patient-'.$assessment->patient_id.'/assessment-'.$assessment->id.'/'.$media->collection_name.'/'.$media->id.'-'.$media->collection_name.'-';
    }

    public function getPathForConversions(Media $media): string
    {
        // TODO: Implement getPathForConversions() method.
    }

    public function getPathForResponsiveImages(Media $media): string
    {
        // TODO: Implement getPathForResponsiveImages() method.
    }
}
