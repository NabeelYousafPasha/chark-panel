<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Exception;
use Illuminate\Support\Facades\Storage;

class FileUpload implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $file;

    protected $assessment;
    protected $mediaType;
    protected $disk;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($file, $assessment, $mediaType, $disk)
    {
        $this->file = $file;
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
        info('FileUpload');

        $file = storage_path().'/app/public/'.$this->file;

        try {
            $uploadViaHelper = uploadAsyncFile(
                $file,
                $this->assessment,
                $this->mediaType,
                $this->disk
            );

            // error
            if (($uploadViaHelper['success'] ?? false) == false) {
                $this->fail();

                return;
            }

            // delete local file
            Storage::delete($file);

            return;

        } catch (Exception $exception) {
            info('Job Error:'. $exception->getCode().' - '.$exception->getMessage());
            $this->fail($exception);

            return;
        }
    }
}
