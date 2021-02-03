<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\PrivacyResource;
use App\Privacy;
use Illuminate\Http\Request;

class PrivacyController extends Controller
{
    public function index(Privacy $privacy){
        return new PrivacyResource($privacy->first());
    }
}
