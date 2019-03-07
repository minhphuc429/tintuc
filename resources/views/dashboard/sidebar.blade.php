<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <ul class="sidebar-menu">
            <li class="header">Dashboard</li>
            <li class="{{ Request::segment(2) === 'categories' ? 'active' : null }} treeview ripple">
                <router-link :to="{name: 'categories.list'}" class="fa fa-dashboard"></i><span> Category</span>
                </router-link>
            </li>
            <li class="{{ Request::segment(2) === 'posts' ? 'active' : null }} treeview ripple">
                <router-link :to="{name: 'posts.list'}" class="fa fa-dashboard"> </i><span> Post</span></router-link>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
