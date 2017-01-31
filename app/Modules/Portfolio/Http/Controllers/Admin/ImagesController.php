<?php

namespace App\Modules\Portfolio\Http\Controllers\Admin;

use App\Modules\Admin\Http\Controllers\Images;
use App\Modules\Portfolio\Models\Portfolio;
use App\Modules\Portfolio\Models\Image;


class ImagesController extends Images
{

    public function getParentModel()
    {
        return new Portfolio();
    }

    public function getModel()
    {
        return new Image();
    }

}
