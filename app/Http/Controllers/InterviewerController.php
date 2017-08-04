<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Interviewer;
use App\InterViewerRound2;
use App\Transformers\InterviewerTransformer;
use League\Fractal;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class InterviewerController extends BaseController
{
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
    	try {
                $interviewer=InterViewerRound1::where('id',$request->id)->firstOrfail();
    	}
    	catch(ModelNotFoundException $e)
    	{
                return $this->sendFailureResponse(11,'Record not found.');
    	}
        $content=$request->all();
        $content['total']=$content['section_1_marks']+$content['section_2_marks']+
                          $content['section_3_marks'];
        if($content['total']>30)
        {
            $content['status']="selected";
        }
        else
        {
            $content['status']="rejected";
        }
    	InterViewerRound1::create($request->all());
    	return $this->sendSuccessResponse(array("message" => "Record Updated Successfully."));
    }

    public function updateRound2Marks(Request $request)
    {
    	try {
                $interviewer=Interviewer::where('id',$request->id)->firstOrfail();
    	}
    	catch(ModelNotFoundException $e)
    	{
                return $this->sendFailureResponse(11,'Record not found.');
    	}
    	$content=$request->all();
    	$content['total']=$content['communication']+$content['program_logic']+
    	                  $content['puzzle']+$content['data_structure'];
    	if($content['total']>15)
    	{
    		$content['status']="selected";
    	}
    	else
    	{
    		$content['status']="rejected";
    	}
    
    	InterViewerRound2::create($content);

    	return $this->sendSuccessResponse(array("message" => "Record Updated Successfully."));
    }

}
