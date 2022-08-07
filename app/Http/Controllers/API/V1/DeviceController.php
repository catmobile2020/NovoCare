<?php

namespace App\Http\Controllers\API\V1;

use App\Device;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DeviceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'mac_address'   => 'required|min:1|string|max:255',
            'country'       => 'nullable|min:1|string|max:255',
            'city'          => 'nullable|min:1|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'error' => $validator->messages(),
            ], '400');
        }

        Device::updateOrCreate(
            ['mac_address'      => $request->mac_address],
            [
                'mac_address'   => $request->mac_address,
                'country'       => $request->country,
                'city'          => $request->city
            ]
        );

        return response()->json([
            'status'    => 200,
            'message'   => 'Device Store/ Update Successfully',
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
