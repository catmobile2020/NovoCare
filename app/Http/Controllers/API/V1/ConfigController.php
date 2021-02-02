<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
class ConfigController extends Controller
{
    public function index(){
        $data = [];

        $data['app_name'] = config('configurations.app_name');
        $data['mobile_number'] = config('configurations.mobile_number');
        $data['location_address'] = config('configurations.location_address');
        $data['logo'] = config('configurations.logo');

        return response()->json([
            'status' => '200',
            'data' => $data
        ], 200);
    }
}
