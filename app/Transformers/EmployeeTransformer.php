<?php

namespace App\Transformers;
use App\User;
use League\Fractal\TransformerAbstract;

class EmployeeTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(User $user)
    {
        return [
                    'name' => $user->name,
                    'emailId' => $user->email,
                    'mobileNo' => $user->mobile_no,
                    'gender' => $user->gender,
                    'dob' => $user->dob,
                    'anivarsary' => $user->anivarsary,
                    'platform' => $user->platform,
                    'experience' => $user->experience,
                    'profilePicture' => $user->profile_pic,
                    'ctc' => $user->ctc
        
        ];
    }
}
