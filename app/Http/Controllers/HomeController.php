<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
// use Illuminate\Contracts\Filesystem\Filesystem;
use Storage;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $images = DB::select('select * from ai_image_details', [1]);
        // $image_url='';
        // foreach ($images as $img) {
        //     echo $img->img_id;
        //     $image_url = $img->img_id;
        // }        
        // return view('welcome', ['images' => $images]);
        return view('home');
    }

    public function imageUpload()
    {
        
        return view('test-image-upload');
    }

    public function showImage(){
        
    $adapter = Storage::disk('s3')->getDriver()->getAdapter();       

    $command = $adapter->getClient()->getCommand('GetObject', ['driver' => 's3',
    'Key'    => $adapter->getPathPrefix().'abc153623191711.png',
    'secret' => env('AWS_SECRET_ACCESS_KEY'),
    'region' => env('AWS_DEFAULT_REGION'),
    'Bucket' => env('AWS_BUCKET'),
    'url' => env('AWS_URL'),
    ]);

    $request = $adapter->getClient()->createPresignedRequest($command, '+20 minute');

    return (string) $request->getUri();
        
        
        
        echo '';
    }

    public function uploadFileToS3(Request $request)
    {
       
        $imageName = 'abc'.time().'11.'.$request->image->getClientOriginalExtension();
        $image = $request->file('image');
        $t = Storage::disk('s3')->put($imageName, file_get_contents($image), 'private');
        $imageName = Storage::disk('s3')->url($imageName);

    	return back()
    		->with('success','Image Uploaded successfully.')
    		->with('path',$expiry);
    }

}
