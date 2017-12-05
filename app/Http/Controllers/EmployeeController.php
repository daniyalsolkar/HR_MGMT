<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Transformers\EmployeeTransformer;
use League\Fractal;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Validator;
use Illuminate\Support\Facades\Auth;

class EmployeeController extends BaseController
{
    public $successStatus = 200;
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

    public function login(Request $request){

        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            $user = Auth::user();

            $client = \Laravel\Passport\Client::where('password_client', 1)->first();

            $request->request->add([
            'grant_type' => 'password',
            'client_id' => $client->id,
            'client_secret' => $client->secret,
            'username' => $request->email,
            'password' => $request->password,
            'scope' => ''
            ]);

            $newRequest = Request::create('oauth/token', 'POST');
            $user->tokens=(array)json_decode(\Route::dispatch($newRequest)->getContent());
            return $this->sendSuccessResponse($user);
        }
    }


    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);            
        }

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $success['token'] =  $user->createToken('MyApp')->accessToken;
        $success['name'] =  $user->name;

        return response()->json(['success'=>$success], $this->successStatus);
    }

    public function details()
    {
        $user = Auth::user();
        return $this->sendSuccessResponse($user);
    }
}
