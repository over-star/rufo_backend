<?php
namespace App\Http\ViewComposers;

use Illuminate\Contracts\View\View;

class ProfileComposer
{
    /**
    * 将数据绑定到视图。
    * @param  View  $view
    * @return void
    */
    public function compose(View $view)
    {
        $user=Auth::user();
        $view->with('user', $user);
    }
}
