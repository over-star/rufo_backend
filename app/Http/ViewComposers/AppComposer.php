<?php
namespace App\Http\ViewComposers;

use App\Models\Menu;
use Illuminate\Contracts\View\View;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Routing\Router;

class AppComposer
{
    public function __construct(Router $users)
    {
        $this->request = $users;
    }
    /**
    * 将数据绑定到视图。
    * @param  View  $view
    * @return void
    */
    public function compose(View $view)
    {
        $user=Auth::user();
        $view->with('user', $user);
        $bread_crumbs[0]['name']='首页';
        $bread_crumbs[0]['url']=url('admin/index');
        $uri=$this->request->current()->uri();
        if($uri){
            //获取当前url名字
            $name=Menu::where('url',$uri)->first();
            if($name){
                if($name->parent_id!=0){
                    $name1=Menu::where('id',$name->parent_id)->first();
                    $bread_crumbs[2]['name']=$name->name;
                    $bread_crumbs[2]['url']=url($name->url);
                    $bread_crumbs[1]['name']=$name1->name;
                    $bread_crumbs[1]['url']=url($name1->url);
                }else{
                    $bread_crumbs[1]['name']=$name->name;
                    $bread_crumbs[1]['url']=url($name->url);
                }
            }
        }
        $view->with('bread_crumbs', $bread_crumbs);
        

//        <li>
//        <i class="icon-home home-icon"></i>
//        <a href="{{$bread_crumbs[0]['url']}}">{{$bread_crumbs[0]['name']}}</a>
//        </li>
//        <li>
//        <a href="#">Other Pages</a>
//        </li>
//        <li class="active">Blank Page</li>

    }
    
    
}
