<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function store(Request $request){
        dd($request->all());

        // Attendance::create([
        //     "user_id"=> $request->session('user_id'),
        //     "latitude"=> $request->post('latitude'),
        //     "longitude"=> $request->post('longitude'),
        //     "time" => new Date() atau Carbon::now()
        // ])
    }
}
