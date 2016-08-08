<?php
namespace App\Http\ViewComposers;

use App\Models\Menu;
use App\Models\Permission;
use App\Models\PermissionRole;
use App\Models\UserRole;
use Illuminate\Contracts\View\View;
use Auth;
class MenuComposer
{
    /**
    * 将数据绑定到视图。
    * @param  View  $view
    * @return void
    */
    public function compose(View $view)
    {
        //第一步展示出菜单
        $user=Auth::user();
        $menu=Menu::orderBy('sort', 'asc')->get()->toArray();
        $menu=$this->arrayToTree($menu,'id','parent_id');
        if($user->id!=1){
            //获取当前用户角色
            $roles=UserRole::where('user_id',$user->id)->get()->toArray();
            $n = array_column($roles, 'role_id');
            //根据角色获取权限
            $m=PermissionRole::whereIn('role_id', $n)->get()->toArray();
            $m = array_column($m, 'permission_id');
            //呵呵。你还不出来????
            //先判断顶级是否出现
            foreach ($menu as $k=>&$v){
                if(!in_array($v['permission_id'],$m)){
                    //拜拜
                    unset($menu[$k]);
                }else if(isset($v['children'])){
                    foreach ($v['children'] as $kk=>&$vv){
                        if(!in_array($vv['permission_id'],$m)){
                            //拜拜
                            unset($menu[$k]['children'][$kk]);
                        }
                    }
                }
            }
        }
        return $view->with('menu_info',$menu);
    }


    //数组转化为二叉树
    protected function arrayToTree($sourceArr, $key='id', $parentKey='pid', $childrenKey='children')
    {
        $tempSrcArr = [];
        $allRoot = TRUE;
        foreach ($sourceArr as  $v)
        {
            $isLeaf = TRUE;
            foreach ($sourceArr as $cv )
            {
                if (($v[$key]) != $cv[$key])
                {
                    if ($v[$key] == $cv[$parentKey])
                    {
                        $isLeaf = FALSE;
                    }
                    if ($v[$parentKey] == $cv[$key])
                    {
                        $allRoot = FALSE;
                    }
                }
            }
            if ($isLeaf)
            {
                $leafArr[$v[$key]] = $v;
            }
            $tempSrcArr[$v[$key]] = $v;
        }
        if ($allRoot)
        {
            return $tempSrcArr;
        }
        else
        {
            unset($v, $cv, $sourceArr, $isLeaf);
            foreach ($leafArr as  $v)
            {
                if (isset($tempSrcArr[$v[$parentKey]]))
                {
                    $tempSrcArr[$v[$parentKey]][$childrenKey] = (isset($tempSrcArr[$v[$parentKey]][$childrenKey]) && is_array($tempSrcArr[$v[$parentKey]][$childrenKey])) ? $tempSrcArr[$v[$parentKey]][$childrenKey] : array();
                    array_push ($tempSrcArr[$v[$parentKey]][$childrenKey], $v);
                    unset($tempSrcArr[$v[$key]]);
                }
            }
            unset($v);
            return $this->arrayToTree($tempSrcArr, $key, $parentKey, $childrenKey);
        }
    }
}
