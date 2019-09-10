<!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Roman</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li class="active treeview">
          <a href="#">
            <i class="fa fa-clipboard"></i> <span>Slider Dashboard</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ url('/admin/add/slider') }}"><i class="fa fa-clipboard "></i> Add Slider</a></li>
            <li><a href="{{ url('/admin/view/slider') }}"><i class="fa fa-circle-o"></i> View Slider</a></li>
          </ul>
        </li>
        <li class="active treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Product Dashboard</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ url('/admin/category') }}"><i class="fa fa-circle-o"></i> Add Category</a></li>
            <li><a href="{{ url('/admin/add/product') }}"><i class="fa fa-circle-o"></i> Add Product</a></li>
            <li><a href="{{ url('/admin/view/product') }}"><i class="fa fa-circle-o"></i> Product List</a></li>
            <li><a href="{{ url('/admin/colors') }}"><i class="fa fa-circle-o"></i> Colors</a></li>
            <li><a href="{{ url('/admin/size') }}"><i class="fa fa-circle-o"></i> Size</a></li>

          </ul>
        </li>
        <li class=" active ">
            <li><a href="{{ url('/coupon') }}"><i class="fa fa-ticket"></i>Add Coupon </a></li>
        </li>
        <li class=" active ">
            <li><a href=""><i class="fa fa-files-o"></i> Users </a></li>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>