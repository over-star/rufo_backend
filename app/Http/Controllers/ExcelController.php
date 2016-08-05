<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Excel;
use DB;

class ExcelController extends Controller
{
    //Excel文件导出功能 By Laravel学院
    public function export()
    {
//        $cellData = [
//            ['学号', '姓名', '成绩'],
//            ['10001', 'AAAAA', '99'],
//            ['10002', 'BBBBB', '92'],
//            ['10003', 'CCCCC', '95'],
//            ['10004', 'DDDDD', '89'],
//            ['10005', 'EEEEE', '96'],
//        ];
//        Excel::create('学生成绩', function ($excel) use ($cellData) {
//            $excel->sheet('score', function ($sheet) use ($cellData) {
//                $sheet->rows($cellData);
//            });
//        })->export('xls');
        //导出数据库配置
        $data=DB::table('migrations')->get();
        dd($data);
        Excel::create('突突', function ($excel) use ($data) {
            $excel->sheet('ghg', function ($sheet) use ($data) {
                $sheet->rows($data);
            });
         })->export('xls');;
    }
}