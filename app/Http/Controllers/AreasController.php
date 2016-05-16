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
        $provincesAllDatas = Province::all();
        $cities = City::all()->pluck('name', 'id');

        return view('areas.index', compact('provinces', 'cities', 'provincesAllDatas'));
    }

    public function province(Request $request)
    {
        $inputs = $request->all();
        $cities = City::where('province_id', $inputs['province_id'])->get();

        return $cities;
    }

    public function provinceData()
    {
        $provinceNum = Province::all()->count();
        $provinceMaleNum = [];
        $provinceFemaleNum = [];

        for($i=1; $i <= $provinceNum; $i++)
        {
            $provinceMaleNum[] = Province::where('id', $i)->pluck('maleNumber')->toArray();
            $provinceFemaleNum[] = Province::where('id', $i)->pluck('femaleNumber')->toArray();
        }

        $provinces = Province::all()->pluck('name')->toArray();
        $response = ['provinces' => $provinces, 'data1' => $provinceMaleNum, 'data2' => $provinceFemaleNum];

        return $response;
    }
}
