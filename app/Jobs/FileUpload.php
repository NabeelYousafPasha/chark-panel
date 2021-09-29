<?php

namespace App\Jobs;

use App\Models\Assessment;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Http\Requests\Upload\FileUploadRequest;

class FileUpload implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $assessment;
    protected $mediaType;
    protected $disk;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($assessment, $mediaType, $disk)
    {
        $this->assessment   = $assessment;
        $this->mediaType    = $mediaType;
        $this->disk         = $disk;
        
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {  
        $uploadViaHelper = uploadFile($this->assessment, $this->mediaType, $this->disk);

    }
}