<!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ asset('storage/app/files/users/'.Auth::user()->avatar_user) }}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{ Auth::user()->fullname }}</p>
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
      <!-- USER ADMINISTRATION -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">Quản lí</li>
        <!-- USER -->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-share"></i> <span>User</span>
            <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span>
          </a>
          <ul class="treeview-menu">
                <li><a href="{{ route('ad_users.index') }}"><i class="fa fa-circle-o"></i> List</a></li>
                <li><a href="{{ route('ad_users.create') }}"><i class="fa fa-circle-o"></i> Add</a></li>
                @if(!is_null(Request::segment(4)))
                <li style="display: none"><a href="{{ route('ad_users.edit', Request::segment(4)) }}" ></a></li>
                @endif
          </ul>
        </li>
        <!-- ENTRUST -->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-share"></i> <span>Entrust</span>
            <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span>
          </a>
          <ul class="treeview-menu">
            <li class="treeview">
              <a href="#"><i class="fa fa-circle-o"></i> Role
                <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{ route('ad_roles.index') }}"><i class="fa fa-circle-o"></i> List</a></li>
                <li><a href="{{ route('ad_roles.create') }}"><i class="fa fa-circle-o"></i> Add</a></li>
                @if(!is_null(Request::segment(4)))
                <li style="display: none"><a href="{{ route('ad_roles.edit', Request::segment(4)) }}" ></a></li>
                @endif
              </ul>
            </li>
            <li class="treeview">
              <a href="#"><i class="fa fa-circle-o"></i> Permission
                <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{ route('ad_permissions.index') }}"><i class="fa fa-circle-o"></i> List</a></li>
                <li><a href="{{ route('ad_permissions.create') }}"><i class="fa fa-circle-o"></i> Add</a></li>
              </ul>
            </li>
          </ul>
        </li>
        <!-- ARTICLE -->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-share"></i> <span>Article</span>
            <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span>
          </a>
          <ul class="treeview-menu">
            <li>
              <a href="{{ route('ad_articles.index') }}"><i class="fa fa-circle-o"></i> List </a>
            </li>
            <li>
              <a href="#"><i class="fa fa-circle-o"></i> Add </a>
            </li>
          </ul>
        </li>
        <!-- FULL TEXT SEARCH -->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-share"></i> <span>Full text search</span>
            <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span>
          </a>
          <ul class="treeview-menu">
            <li>
              <a href="{{ route('ad_fts.search') }}"><i class="fa fa-circle-o"></i> Search to server </a>
            </li>
            <li>
              <a href="{{ route('ad_fts.ajax') }}"><i class="fa fa-circle-o"></i> Search ajax </a>
            </li>
            <li>
              <a href="{{ route('ad_fts.create') }}"><i class="fa fa-circle-o"></i> add </a>
            </li>
          </ul>
        </li>

      </ul>

      <!-- OTHER ADMINISTRATION -->
    </section>
    <!-- /.sidebar -->