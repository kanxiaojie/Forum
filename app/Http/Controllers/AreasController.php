<?php

namespace App\Http\Controllers;

use App\Area;
use App\City;
use App\Province;
use Illuminate\Http\Request;

use App\Http\Requests;

class AreasController extends Controller
{
//    public function ajaxShow(Request $request)
//    {
//        $inputs = $request->all();
//        $cities = City::where('province_id', $inputs['province_id'])->get()->toArray();
//
//        return response($cities);
//    }

    public function index()
    {
        $provinces = Province::all()->pluck('name', 'id');
        $cities = City::all()->pluck('name', 'id');

        return view('areas.index', compact('provinces', 'cities'));
    }

    public function province(Request $request)
    {
        $inputs = $request->all();
        $cities = City::where('province_id', $inputs['province_id'])->get();

        return $cities;
    }
}
