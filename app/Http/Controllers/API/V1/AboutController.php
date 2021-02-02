<?php

namespace App\Http\Controllers\API\V1;

use App\About;
use App\Http\Controllers\Controller;
use App\Http\Resources\AboutResource;

class AboutController extends Controller
{
    public function index(About $about){
        return new AboutResource($about->first());
    }
}
