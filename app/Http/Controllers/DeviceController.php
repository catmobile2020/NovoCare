<?php

namespace App\Http\Controllers;

use App\Device;
use Illuminate\Http\Request;
use DB;

class DeviceController extends Controller
{
    public function index(){
        $devices = Device::paginate(15);
        $devices_count = Device::count();

        return view('device.index', compact('devices', 'devices_count'));
    }

    public function show($id)
    {
//        $device = Device::where('id', $id)->with(['activities' => function ($query) {
//            $query->select('*', DB::raw('COUNT(screen) as count'))->groupBy('screen')->orderBy('created_at');
//        }])->first();
        $device = Device::find($id);
        $activities = $device->activities()->select('*', DB::raw('COUNT(screen) as count'))->groupBy('screen')->orderBy('created_at')->paginate(15);
        return view('device.show', compact('device', 'activities'));
    }
}
