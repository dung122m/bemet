  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="admin_assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{ auth()->user()->name }}</p>
          <a href="{{ route("admin.logout") }}"></i> Log out</a>
        </div>
      </div>
      <!-- search form -->
  
      <ul class="sidebar-menu">
        
        <li class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span></i>
          </a>
          
        </li>
        <li class="treeview">
          <a href="{{ route("category.index") }}">
            <i class="fa fa-th"></i> <span>Categories</span> <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route("category.index") }}"><i class="fa fa-circle-o"></i> List</a></li>
            <li><a href="{{ route("category.create") }}"><i class="fa fa-circle-o"></i> Add new</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-th"></i> <span>Products</span> <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route("product.index") }}"><i class="fa fa-circle-o"></i> List</a></li>
            <li><a href="{{ route("product.create") }}"><i class="fa fa-circle-o"></i> Add new</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="{{ route("order-manage.index") }}">
            <i class="fa fa-shopping-cart"></i> <span>Orders</span> <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route("order-manage.index") }}"><i class="fa fa-circle-o"></i> Verified Order</a></li>
            <li><a href="{{ route("order-manage.index") }}?status=0"><i class="fa fa-circle-o"></i> Unverified Order</a></li>
            <li><a href="admin_assets/index2.html"><i class="fa fa-circle-o"></i> Statistic</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-user"></i> <span>Users</span> <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="admin_assets/index.html"><i class="fa fa-circle-o"></i> List</a></li>
            <li><a href="admin_assets/index2.html"><i class="fa fa-circle-o"></i>Add new </a></li>
          </ul>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>