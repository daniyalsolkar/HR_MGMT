<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\Holidays;

class HolidayTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Holidays $holiday)
    {
        return [
            //
        ];
    }
}
