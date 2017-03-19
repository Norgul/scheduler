<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        @if (! Auth::guest())
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="{{ Gravatar::get($user->email) }}" class="img-circle" alt="User Image"/>
                </div>
                <div class="pull-left info">
                    <p>{{ Auth::user()->name }}</p>
                    <!-- Status -->
                    <a href="#"><i class="fa fa-circle text-success"></i> {{ trans('adminlte_lang::message.online') }}
                    </a>
                </div>
            </div>
            @endif

                    <!-- search form (Optional) -->
            <form action="#" method="get" class="sidebar-form">
                <div class="input-group">
                    <input type="text" name="q" class="form-control"
                           placeholder="{{ trans('adminlte_lang::message.search') }}..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
                </div>
            </form>
            <!-- /.search form -->

            <!-- Sidebar Menu -->
            <ul class="sidebar-menu">
                <li class="header">{{ trans('adminlte_lang::message.header') }}</li>
                <!-- Optionally, you can add icons to the links -->
                <li class="treeview @if(\Route::current()->getName() == 'user.index' || \Route::current()->getName() == 'user.create')
                {{'active'}}@endif">
                    <a href="#"><i class='fa fa-users'></i> <span>Users</span> <i
                                class="fa fa-angle-left pull-right"></i></a>
                    <ul class="treeview-menu">
                        <li @if(\Route::current()->getName() == 'user.index') {{'class=active'}} @endif>
                            <a href="{{ url('admin/user') }}">All users</a>
                        </li>
                        <li @if(\Route::current()->getName() == 'user.create') {{'class=active'}} @endif>
                            <a href="{{ url('admin/user/create') }}">Create new</a>
                        </li>
                    </ul>
                </li>

                <li class="treeview @if(\Route::current()->getName() == 'equipment.index' || \Route::current()->getName() == 'equipment.create')
                {{'active'}}@endif">
                    <a href="#"><i class='fa fa-briefcase'></i> <span>Instruments</span> <i
                                class="fa fa-angle-left pull-right"></i></a>
                    <ul class="treeview-menu">
                        <li @if(\Route::current()->getName() == 'equipment.index') {{'class=active'}} @endif>
                            <a href="{{ url('admin/equipment') }}">All instruments</a>
                        </li>
                        <li @if(\Route::current()->getName() == 'equipment.create') {{'class=active'}} @endif>
                            <a href="{{ url('admin/equipment/create') }}">Create new</a>
                        </li>
                    </ul>
                </li>

                <li class="treeview @if(\Route::current()->getName() == 'method.index' || \Route::current()->getName() == 'method.create')
                {{'active'}}@endif">
                    <a href="#"><i class='fa fa-bullseye'></i> <span>Methods</span> <i
                                class="fa fa-angle-left pull-right"></i></a>
                    <ul class="treeview-menu">
                        <li @if(\Route::current()->getName() == 'method.index') {{'class=active'}} @endif>
                            <a href="{{ url('admin/method') }}">All methods</a>
                        </li>
                        <li @if(\Route::current()->getName() == 'method.create') {{'class=active'}} @endif>
                            <a href="{{ url('admin/method/create') }}">Create new</a>
                        </li>
                    </ul>
                </li>

                <li class="treeview @if(\Route::current()->getName() == 'column.index' || \Route::current()->getName() == 'column.create')
                {{'active'}}@endif">
                    <a href="#"><i class='fa fa-columns'></i> <span>Columns</span> <i
                                class="fa fa-angle-left pull-right"></i></a>
                    <ul class="treeview-menu">
                        <li @if(\Route::current()->getName() == 'column.index') {{'class=active'}} @endif>
                            <a href="{{ url('admin/column') }}">All columns</a>
                        </li>
                        <li @if(\Route::current()->getName() == 'column.create') {{'class=active'}} @endif>
                            <a href="{{ url('admin/column/create') }}">Create new</a>
                        </li>
                    </ul>
                </li>

                <li @if(\Route::current()->getName() == 'review.index') {{'class=active'}} @endif>
                    <a href="{{ url('admin/review') }}"><i class='fa fa-book'></i> <span>Review</span></a>
                </li>

            </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
