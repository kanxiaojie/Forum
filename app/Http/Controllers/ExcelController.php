<?php

namespace App\Http\Controllers;

use App\Phone;
use App\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use App\Http\Requests;

class ExcelController extends Controller
{
    //Excel文件导出功能 By Laravel学院
//    public function export(){
//        $cellData = [
//            ['学号','姓名','成绩'],
//            ['10001','AAAAA','99'],
//            ['10002','BBBBB','92'],
//            ['10003','CCCCC','95'],
//            ['10004','DDDDD','89'],
//            ['10005','EEEEE','96'],
//        ];
//        Excel::create(iconv('UTF-8', 'GBK', '学生成绩'),function($excel) use ($cellData){
//            $excel->sheet('score', function($sheet) use ($cellData){
//                $sheet->rows($cellData);
//            });
//        })->store('xls')->export('xls');
//    }
    public function export()
    {
        $postsData = Post::all()->toArray();
        Excel::create(iconv('UTF-8', 'GBK', 'post'),function($excel) use ($postsData){
            $excel->sheet('score', function($sheet) use ($postsData){
                $sheet->rows($postsData);
            });
        })->store('xls')->export('xls');
    }

//    public function export(Excel $excel)
//    {
//        $info = $this->test->all();
//
//        foreach($info as $key => $value){
//            $export[] = array(
//                'ID' => $value['id'],
//                '姓名' => $value['name']
//            );
//        }
//
//        $excel->create(iconv('UTF-8', 'GBK', '联系人名单'), function($excel) use($export){
//            $excel->sheet('export', function($sheet) use($export){
//                $sheet->fromArray($export);
//            });
//        });
//    }

    public function import(){
        $filePath = "storage/exports/".iconv("UTF-8", "GBK", "post").".xls";
        $dataAll = Excel::load($filePath)->sheet(0)->toArray();
//        array_shift($dataAll);
        foreach($dataAll as $data)
        {
             $post = new Post();
             $post['title'] = $data[0];
             $post['subtitle'] = $data[1];
             $post['content'] = $data[2];
            $post->save();
        }
    }

//    public function import()
//    {
//        if(Input::hasFile(iconv("UTF-8", "GBK", "联系人名单").".xls")){
//            $path = "storage/exports/".iconv("UTF-8", "GBK", "联系人名单").".xls";
//            $data = Excel::load($path, function($reader) {
//            })->get();
//            if(!empty($data) && $data->count()){
//                foreach ($data as $key => $value) {
//                    $insert[] = ['id' => $value->id, 'name' => $value->name];
//                }
//                if(!empty($insert)){
//                    DB::table('phones')->insert($insert);
//                    dd('Insert Record successfully.');
//                }
//            }
//        }
//        return back();
//    }
}
