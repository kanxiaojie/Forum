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

    public function index(Request $request)
    {
        $provinces = Province::all()->pluck('name', 'id');
        $cities = City::all()->pluck('name', 'id');

        $actionSearch = '/areas';

        $inputs = $request->all();

        $searchKey = searchKeyExist($inputs);
        if($searchKey)
        {
            $provinceName = getProvinceNameForSearch($inputs);

            $provincesAllDatas = Province::whereIn('name', $provinceName)->orderBy('id', 'asc')->paginate(10);
        }else{
            $provincesAllDatas = Province::orderBy('id','asc')->paginate(10);
        }

        return view('areas.index', compact('provinces', 'cities', 'provincesAllDatas', 'actionSearch'));
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
