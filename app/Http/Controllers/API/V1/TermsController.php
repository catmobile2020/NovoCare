<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\TermsResource;
use App\Terms;
use Illuminate\Http\Request;

class TermsController extends Controller
{
    public function index(Terms $terms){
        return new TermsResource($terms->first());
    }
}
