<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
            <ul class="sidebar-menu">
                <li class="header">Dashboard</li>
                <li class="{{ Request::segment(2) === 'categories' ? 'active' : null }} treeview ripple">
                    <a href="{{ route('dashboard.categories') }}"> <i class="fa fa-dashboard"></i>
                        <span>Category</span> </a>
                </li>
                <li class="{{ Request::segment(2) === 'posts' ? 'active' : null }} treeview ripple">
                    <a href="{{ route('dashboard.posts') }}"> <i class="fa fa-dashboard"></i>
                        <span>Post</span> </a>
                </li>
            </ul>

            {{--<ul class="sidebar-menu">--}}
                {{--<li class="header">Quản lý người dùng</li>--}}
                {{--<li class="{{ Request::segment(2) === 'roles' ? 'active' : null }} treeview ripple">--}}
                    {{--<a href="{{ action('RoleController@index') }}"> <i class="fa fa-street-view"></i> <span>Role</span>--}}
                    {{--</a>--}}
                {{--</li>--}}
                {{--<li class="{{ Request::segment(2) === 'users' ? 'active' : null }} treeview ripple">--}}
                    {{--<a href="{{ action('UserController@index') }}"> <i class="fa fa-cubes"></i> <span>User</span> </a>--}}
                {{--</li>--}}
            {{--</ul>--}}


        {{--<ul class="sidebar-menu">--}}
            {{--<li class="header">Thông tin tài khoản</li>--}}
            {{--<li class="{{ Request::segment(2) === 'history' ? 'active' : null }} treeview ripple">--}}
                {{--<a href="{{ action('OrderController@orderHistory') }}"> <i class="fa fa-street-view"></i> <span>Lịch sử đặt hàng</span>--}}
                {{--</a>--}}
            {{--</li>--}}
            {{--<li class="{{ Request::segment(1) === 'tai-khoan' ? 'active' : null }} treeview ripple">--}}
                {{--<a href="{{ action('UserController@editInformation') }}"> <i class="fa fa-cubes"></i> <span>Tài khoản</span> </a>--}}
            {{--</li>--}}
            {{--<li class="{{ Request::segment(2) === 'doi-mat-khau' ? 'active' : null }} treeview ripple">--}}
                {{--<a href="{{ action('UserController@updatePassword') }}"> <i class="fa fa-cubes"></i> <span>Thay đổi mật khẩu</span> </a>--}}
            {{--</li>--}}
        {{--</ul>--}}
    </section>
    <!-- /.sidebar -->
</aside>
