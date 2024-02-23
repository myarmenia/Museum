<?php
namespace App\Services\Image;
use App\Models\Image;
use App\Services\FileUploadService;


class ImageService
{
    public static function createImageble($data, $mainPhotoName=false)
    {

        $photos = $data['photos']['image'];
        $museum = $data['museum'];

        
        foreach ($photos as $key => $photo) {
                $path = FileUploadService::upload($photo, 'images');
     
                $readyPhoto = [
                    'path' => $path,
                    'name' => $photo->getClientOriginalName(),
                    'main' => $photo->getClientOriginalName() == $mainPhotoName? true : false
                ];
                if($mainPhotoName){
                    Image::where('imageable_id', $museum->id)->where('main', true)->delete();
                }  

                $museum->images()->create($readyPhoto);

        }
        
    }

}
