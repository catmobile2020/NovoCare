<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Config;
class ConfigController extends Controller
{
    public function index(){
        $data = [];

        $data['app_name'] = Config::get('configurations.app_name');
        $data['mobile_number'] = Config::get('configurations.mobile_number');
        $data['location_address'] = Config::get('configurations.location_address');
        $data['logo'] = Config::get('configurations.logo');

        return response()->json([
            'status' => '200',
            'data' => $data
        ], 200);
    }
}
