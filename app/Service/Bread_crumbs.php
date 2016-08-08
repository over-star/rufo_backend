<?php
namespace App\Service;
class Bread_crumbs{
    public function bread_crumbs(){
        //获取当前url名字
        $bread_crumbs[0]['name']='首页';
        $bread_crumbs[0]['url']=url('admin/index');
        //
        $re=new Request();
        dd($re->url());
        //$view->with('bread_crumbs',$bread_crumbs);
//        <li>
//                        <a href="{{$bread_crumbs[0]['url']}}">{{$bread_crumbs[0]['name']}}</a>
//                    </li>
//                    <li class="active">Blank Page</li>
    }

}