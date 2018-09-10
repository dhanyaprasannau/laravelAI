<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnalyseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Test API
     *
     * @return
     */
    public function testApi()
    {
        $datas->image_id = 'claim_01';
        $datas->damage_location = 'Front bumper';
        $datas->damage_type = 'Scratch dent crack';
        $datas->damage_severity = 'Damage Severity';
        $response = array('error' => 0,'image_details' => $datas);
        return json_encode($response);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function analyseImages()
    {       
        //get claimid and show results
        return view('analyse-images',[]);
    }

    public function saveImageAnalysis(){
         //image analysis ned to save and then redirect with claimid details.
        $this->analyseImages->with('some_data', $some_data);
        // return Redirect::to('user/show/' . $id);
    }

    
}
