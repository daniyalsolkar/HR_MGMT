<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Transformers\EmployeeTransformer;
use League\Fractal;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class EmployeeController extends BaseController
{
    //
    public function empLogin(Request $request)
    {
    	try{
				$employee=User::where('email',$request->email_id)->where('password',$request->password)->firstOrfail();
    	}
    	catch (ModelNotFoundException $e) {
			return $this->sendFailureResponse(11,'Please enter valid emailId or Password');
		}

    	$response = fractal()
    	->item($employee)
	    ->transformWith(new EmployeeTransformer())
    	->toArray();

    	return $this->sendSuccessResponse($response);
    }
}
