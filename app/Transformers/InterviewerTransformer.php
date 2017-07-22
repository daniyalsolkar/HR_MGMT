<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Interviewer;

class InterviewerTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Interviewer $interviewer)
    {
        return [    

                    'name' => $interviewer->name,
                    'emailId' => $interviewer->email_id
            
        ];
    }
}
