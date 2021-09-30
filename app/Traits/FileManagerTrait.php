<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;

trait FileManagerTrait
{
    public function uploadFile($path, $image, $disk = null)
    {
        return Storage::disk($disk ?? config('filesystems.default'))
            ->put($path, $image,[
                'public'
            ]);
    }
}
