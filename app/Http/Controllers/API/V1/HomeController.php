<?php

namespace App\Http\Controllers\API\V1;

use App\Home;
use App\Http\Controllers\Controller;
use App\Http\Resources\HomeResource;

class HomeController extends Controller
{
    public function index(Home $home){
        return new HomeResource($home->first());
    }
}
