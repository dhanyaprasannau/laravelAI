<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Storage;
use Illuminate\Support\Facades\Input;
use File;

class ImageUploadController extends Controller
{
    /**
     * Multiple Image upload 
     *
     * generating unique claim_id
     * @return View
     */
   
    public function index()
    {
        $claim =  DB::table('ai_claim')->orderBy('id', 'desc')->first();
        if($claim){
            $claim_id = 'claim01'.$claim->id;
        }else{
            $claim_id= 'claim01';
        }
        $insertDb = DB::table('ai_claim')->insert(
            array(
                'claim_id' => $claim_id
            )
            );
        return view('image-upload',['claim_id' => $claim_id]);
    }

    /**
     * Uploading images to s3 
     * s3 result and image details to DB 
     * return success/error 
     */
    public function uploadImages(Request $request){
        $fileCount = 0;
        $input = Input::all();
        if (isset($input['file']) && $input['file']) {
            $image = $input['file'];
            $claim_id = $input['claim_id'];
            $image_id = $input['image_id'];
            $imageId = $claim_id.'_img_'.$image_id;
            $originalname =$image->getClientOriginalName();
                $ext = $image->getClientOriginalExtension();
                $fileName =   time().'_'.$originalname;
                $t = Storage::disk('s3')->put($fileName, file_get_contents($image), 'private');
                $imageName = Storage::disk('s3')->url($fileName);
                if($imageName){
                    $lastItem = DB::table('ai_image_details')->orderBy('id', 'desc')->first();
                    $insertDb = DB::table('ai_image_details')->insert(
                        array(
                            'img_id' => $imageId,
                            'img_s3_name' => $imageName,
                            'img_original_name' => $originalname,
                            'img_thumb_s3_name' => ''
                        )
                        );
                }
                $response = array('error' => 0, 'imageName' => $imageName);

                return json_encode($response);

               
        }
    }

    public function removeUploadedImages(Request $request){
        // if(Storage::disk('s3')->exists($path)) {
        //     Storage::disk('s3')->delete($path)
        // }
    }
   
}
