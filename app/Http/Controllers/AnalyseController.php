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
        $response = array('error' => 0);
        return json_encode($response);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function analyseImages()
    {
        return view('analyse-images',[]);
    }

    
}
