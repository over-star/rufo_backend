
<div class="sidebar" id="sidebar">
            <script type="text/javascript">
                try{ace.settings.check('sidebar' , 'fixed')}catch(e){}
            </script>
            <div class="sidebar-shortcuts" id="sidebar-shortcuts">
                <div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
                    <button class="btn btn-success">
                        <i class="icon-signal"></i>
                    </button>

                    <button class="btn btn-info">
                        <i class="icon-pencil"></i>
                    </button>

                    <button class="btn btn-warning">
                        <i class="icon-group"></i>
                    </button>

                    <button class="btn btn-danger">
                        <i class="icon-cogs"></i>
                    </button>
                </div>
                <div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
                    <span class="btn btn-success"></span>
                    <span class="btn btn-info"></span>
                    <span class="btn btn-warning"></span>
                    <span class="btn btn-danger"></span>
                </div>
            </div><!-- #sidebar-shortcuts -->

            <ul class="nav nav-list">
                <li class="">
                    <a href="{{url('admin/index')}}">
                        <i class="icon-dashboard"></i>
                        <span class="menu-text"> 控制台 </span>
                    </a>
                </li>
            @if($menu_info)
                @foreach($menu_info as $key=>$val)
                    @if(isset($val['children']))
                            <li class="{{ Urlhelp::pattern($val['active_url'],$val['active']) }} treeview">
                                <a href="#" class="dropdown-toggle">
                                    <i class="{{ $val['icon'] or 'icon-file-alt' }}"></i>
                                    <span class="menu-text">{{ $val['name'] }}</span>
                                    <b class="arrow icon-angle-down"></b>
                                </a>
                                <ul class="submenu">
                                    @foreach($val['children'] as $v)
                                        <li class="{{Urlhelp::uri($v['active_url'],$v['active'])}}">
                                            <a href="{!!url($v['url'])!!}">
                                                <i class="icon-double-angle-right"></i>{{$v['name']}}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                    @else
                            <li class="{{ Urlhelp::pattern($val['active_url'],$val['active']) }}">
                                <a href="{!!url($val['url']) !!}">
                                    <i class="{{ $val['icon'] or 'icon-file-alt' }}"></i>
                                    <span class="menu-text">{{$val['name']}}</span>
                                </a>
                            </li>
                    @endif
                @endforeach
            @endif

            </ul><!-- /.nav-list -->
            <div class="sidebar-collapse" id="sidebar-collapse">
                <i class="icon-double-angle-left" data-icon1="icon-double-angle-left" data-icon2="icon-double-angle-right"></i>
            </div>

            <script type="text/javascript">
                try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
            </script>
        </div>
