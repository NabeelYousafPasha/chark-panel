<?php

use Barryvdh\DomPDF\Facade as PdfFacade;
use Illuminate\Http\Response;


if ( ! function_exists( 'generatePDF' ) ) {
    function generatePDF($view, $fileName, array $viewData = [], $download = false)
    {
        try {

            // file name
            $fileName = str_replace(" ", "-", $fileName."-".now()->format('Y-m-d-H-i-s')).".pdf";

            // need to save file in storage path
            $filePath = storage_path(config('constants.pdf_path').$fileName);

            // pdf
            $pdf = PdfFacade::loadView($view, $viewData);
            $pdf->save($filePath);

            if ($download) {
                $pdf->download($fileName);
            }

            return [
                'message' => "$fileName PDF generated",
                'file_name' => $fileName,
                'path' => $filePath,
                'status_code' => Response::HTTP_OK,
                'success' => true,
            ];

        } catch ( \Exception $exception) {

            return [
                'message' => $exception->getMessage(),
                'status_code' => $exception->getCode(),
                'success' => false,
            ];
        }
    }
}

if ( ! function_exists( 'humanDiffBoolen' ) ) {
    function humanDiffBoolen($value)
    {
        $bool = in_array($value, ['', 0, 'false', 'no']) ? 'no' : 'yes';

        return strtoupper($bool);
    }
}

if ( ! function_exists('uploadFile') ) {

    function uploadFile($modelType, $fileField, $disk = null)
    {
        try {
            $upload = $modelType->addMediaFromRequest($fileField)
                ->toMediaCollection(
                    $fileField,
                    $disk ?? config('filesystems.default')
                );

            return [
                'success' => true,
                'message' => 'File uploaded',
                'uploaded' => $upload,
            ];
        }
        catch (Exception $exception) {
            return [
                'success' => false,
                'message' => $exception->getMessage(),
            ];
        }
    }
}

if ( ! function_exists('uploadAsyncFile') ) {

    function uploadAsyncFile($fileName, $modelType, $fileField, $disk = null)
    {
        try {
            $upload = $modelType->addMedia($fileName)
                ->toMediaCollection(
                    $fileField,
                    $disk ?? config('filesystems.default')
                );

            return [
                'success' => true,
                'message' => 'File uploaded',
                'uploaded' => $upload,
            ];
        }
        catch (Exception $exception) {
            return [
                'success' => false,
                'message' => $exception->getMessage(),
            ];
        }
    }
}
