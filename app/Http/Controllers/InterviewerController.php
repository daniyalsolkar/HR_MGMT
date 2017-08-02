<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Interviewer;
use App\Transformers\InterviewerTransformer;
use League\Fractal;

class InterviewerController extends BaseController
{
    //

    public function registerInterviewer(Request $request)
    {
    	$interviewer=Interviewer::create($request->all());
    	if(is_null($interviewer))
    	{
             return $this->sendFailureResponse(11,'Registration Failed');
    	}

    	$response = fractal()
    	->item($interviewer)
	    ->transformWith(new InterviewerTransformer())
    	->toArray();

    	return $this->sendSuccessResponse($response);
    }

    public function updateRound1Marks(Request $request)
    {
    	$interviewer=InterViewerRound1::where('id',$request->id)->firstOrfail();
    	if(is_null($interviewer))
    	{
             return $this->sendFailureResponse(11,'Failed to update marks.');
    	}
    	InterViewerRound1::create($request->all());
    	return $this->sendSuccessResponse(array("message" => "Record Updated Successfully."));
    }

    public function updateRound2Marks(Request $request)
    {
    	$interviewer=InterViewerRound2::where('id',$request->id)->firstOrfail();
    	if(is_null($interviewer))
    	{
             return $this->sendFailureResponse(11,'Failed to update marks.');
    	}
    	//$interviewer=InterViewerRound2::create($request->all());
    	$interviewer->create($request->all());
    	$interviewer->total=$interviewer->communication+$interviewer->program_logic+
    	                    $interviewer->puzzle+$interviewer->data_structure;
    	if($interviewer->total>15)
    	{
    		$interviewer->status="selected"
    	}
    	else
    	{
    		$interviewer->status="rejected"
    	}
    	$interviewer->save();

    	return $this->sendSuccessResponse(array("message" => "Record Updated Successfully."));
    }

}
