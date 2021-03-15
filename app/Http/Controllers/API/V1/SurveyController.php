<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\SurveyResource;
use App\Survey;

class SurveyController extends Controller
{
    public function index(Survey $survey){
        return new SurveyResource($survey->all());
    }
}
