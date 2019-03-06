<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use PDF;
use \App\ImageDetails;
use \App\DamageParts;
use \App\DamageDetails;
use App\RatingEngine;
use App\ImageColors;
use App\Claim;
use Helper;
use File;

class ReportController extends Controller
{
    public function downloadPdf($claim,$imgId)
    { 
        $damages = [];
        $damageArray = [];
        $actions = [];
        $claimDetails = Claim::select('maker_name','model_name')
        ->where('claim_id', $claim)->first();
        $damageLocations = $this->getDamageLocations($claim,$imgId);
        if(count($damageLocations)>0){ 
            $damageArray = Helper::getUniqueDamages($damageLocations);
        }  
        if(count($damageArray)>0){
            foreach($damageArray as $key=>$values){
                foreach($values as $val){
                    $damages[] = $key."-".$val;
                }
            }
             $actions = $this->getActions($damages); 
        }
        $totalCost = 0;
        foreach($actions as $action){
           $costs = explode("-",$action);
           if($costs[2] == 'Replace'){
            $cost = $costs[3] + $costs[4] + $costs[5] ;
           }
           else{
            $cost = $costs[3] + $costs[4] ;
           }        
           $totalCost+= $cost;
        }
        $colors = $this->getColors($claim,$imgId);
        $fileName = 'reports/tonkaBI'.mt_rand().'.pdf';
        PDF::SetTitle('tonkaBI');
        PDF::AddPage();    
        PDF::writeHTML(view('report',["damageLocations"=> $damages, 'claim'=> $claimDetails])->render());
        PDF::AddPage();    
        PDF::writeHTML(view('report-invoice',["claimId"=> $claim, 'claim'=> $claimDetails, 'imgId'=>$imgId, 'actions'=>$actions, 'cost'=>$totalCost, 'colors'=>$colors])->render());
        PDF::Output(public_path($fileName), 'F');
        PDF::reset();
        return Response::download(public_path($fileName));       
    }
    

    /*
    * 
    */
    private function getDamageLocations($claimId,$imgId){
        $damages =[];
        if($imgId && $imgId!=0){
            $damages[] = $this->getEachDamageParts($imgId); 
        }else{
            $images = ImageDetails::select('id')
                    ->where('claim_id', $claimId)->get();
                   
            foreach($images as $image){
                $damages[] =$this->getEachDamageParts($image['id']); 
            }
            
        }
        return ($damages);
    }

    private function getColors($claimId,$imgId){
        $colorsIdentified =[];
        $colors = [];
        if($imgId && $imgId!=0){
            $colorsIdentified[] = $this->getEachColors($imgId); 
        }else{
            $images = ImageDetails::select('id')
                    ->where('claim_id', $claimId)->get();
                   
            foreach($images as $image){
                $colorsIdentified[] =$this->getEachColors($image['id']); 
            }
            
        }
        if(sizeof($colorsIdentified)>0){
            $colors = Helper::formatColors($colorsIdentified);
        }else{
            $colors = '';
        }
        return $colors;
    }

    private function getEachColors($imgId){
        $colors =  ImageColors::where('image_id','=',$imgId)
                    ->select('color','probability')
                    ->get();
        return $colors;
    }


    private function getActions($damages){
        $damageActions = [];
        // $damages = Helper::formattedDamageParts($damageParts,'actions');
        foreach ($damages as $damage){
            $damageArray = explode('-',$damage);
            $selectAction = RatingEngine::select('action', 'cost', 'labour_cost','times_factor', 'paint_cost')
                            ->where('damage_part','=',$damageArray[0])
                            ->where('damage_type','=',$damageArray[1])
                            ->where('severity','=',Helper::getSeverityValue($damageArray[2]))
                            ->first();
                            
            if(count($selectAction)>0){
                $total_cost = $selectAction['cost'] + $selectAction['labour_cost'];
                $damageActions[$damageArray[0]][] = $selectAction['action']."-".$damageArray[1]."-". $selectAction['cost']."-". $selectAction['labour_cost']."-". $selectAction['paint_cost'];
            }
        }      
        $damageActions = Helper::getCostAndActions($damageActions);
        return $damageActions;
    }

    private function getEachDamageParts($imgId){
        $damageArray = [];
        $selectDamageParts = DamageParts::select('id','damage_part','confidence_score')
                                        ->where('image_id', $imgId)
                                        ->get();
                                        
        foreach($selectDamageParts as $selectDamagePart){ 
            $selDamageTypes = DamageDetails::select('id','damage_type','confidence_score','severity')
            ->where('part_id', $selectDamagePart['id'])
            ->get();
            if($selDamageTypes->count()){  
                foreach($selDamageTypes as $dt){
                    $damageType = $dt['damage_type'];
                    $severity = $dt['severity'];
                    $confidenceScore = round($dt['confidence_score'] * 100 ) . '%';
                    $damageArray[$selectDamagePart['damage_part'].'-'.$damageType][] = $severity.'-'.$confidenceScore;
                }
            }
        }
        return $damageArray;  
    }
}
