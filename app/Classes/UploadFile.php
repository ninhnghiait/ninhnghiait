<?php
namespace App\Classes;
/**
 * 
 */
use Illuminate\Support\Facades\Storage;
trait UploadFile
{
	
	public function uploadFile($requestFile, $folder)
    {
    	$rd = 'NN'.time().str_random(5);
        $imageName = $rd.'.'.$requestFile->getClientOriginalExtension();
        $requestFile->move(storage_path('app/files/'.$folder), $imageName);
        return $imageName;
    }

    public function delFile($folder, $fileName)
    {
    	if(Storage::exists('files/'.$folder.'/'.$fileName)){
    		Storage::delete('files/'.$folder.'/'.$fileName);
    	}
    }
}