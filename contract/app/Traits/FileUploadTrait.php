<?php

namespace App\Traits;

use App\Models\TemporaryFile;

trait FileUploadTrait {

    /**
     * @param $file
     * @return string
     */
    public function uploadFileTemp($file): string
    {
        $filename = $file->getClientOriginalName();
//        $extension = $file->getClientOriginalExtension();
        $folder =  uniqid().'-'.time();

        $file->storeAs('public/contracts/tmp/' . $folder, $filename);
      //  $image->storeAs('public/images/' . $folder, $fileName);

        TemporaryFile::create([
            'folder' => $folder,
            'filename' => $filename
        ]);

        return $folder;
    }

    /**
     * @param $folder
     * @return string
     */
    public function removeFileTemp($folder): string
    {
        $temporaryFile = TemporaryFile::where('folder', $folder)->first();

        if($temporaryFile){
            $path = storage_path('app/public/contracts/tmp/'. $folder);
            unlink($path.'/' .$temporaryFile->filename);
            rmdir($path);
            $temporaryFile->delete();
        }
        return true;
    }
}
