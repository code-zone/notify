            <div class="side-menu sidebar-inverse">
                <nav class="navbar navbar-default" role="navigation">
                    <div class="side-menu-container">
                        <div class="navbar-header">
                            <a class="navbar-brand" href="#">
                                <div class="icon fa fa-paper-plane"></div>
                                <div class="title">{{config('app.name')}}</div>
                            </a>
                            <button type="button" class="navbar-expand-toggle pull-right visible-xs">
                                <i class="fa fa-times icon"></i>
                            </button>
                        </div>
                        <ul class="nav navbar-nav">
                            <li class="{{isActive('dashboard')}}">
                                <a href="{{ route('dashboard') }}">
                                    <span class="icon fa fa-tachometer"></span><span class="title">Dashboard</span>
                                </a>
                            </li>
                            @can('view-students')
                             <li class="{{isActive('students*')}}">
                                <a href="{{ route('students.index') }}">
                                    <span class="icon fa fa-user"></span><span class="title">Students</span>
                                </a>
                            </li>
                            @endcan
                              <li class="{{isActive('meals*')}}">
                                <a href="{{ route('meals.index') }}">
                                    <span class="icon fa fa-pencil"></span><span class="title">Menu</span>
                                </a>
                            </li>
                            @can('manage-users')
                             <li class="{{isActive('users*')}}">
                                <a href="{{ route('users.index') }}">
                                    <span class="icon fa fa-users"></span><span class="title">Users</span>
                                </a>
                            </li>
                            @endcan
                            @can('view-payments')
                            <li class="{{isActive('payments*')}}">
                                <a href="{{route('payments.index')}}">
                                    <span class="icon fa fa-credit-card"></span><span class="title">Payments</span>
                                </a>
                            </li>
                            @endcan
                            @can('view-orders')
                            <li class="{{isActive('orders*')}}">
                                <a href="{{route('orders.index')}}">
                                    <span class="icon fa fa-coffee"></span><span class="title">Orders</span>
                                </a>
                            </li>
                            @endcan
                            @can('view-reports')
                            <li class="{{isActive('sales*')}}">
                                <a href="{{route('sales')}}">
                                    <span class="icon fa fa-bar-chart"></span><span class="title">Reports</span>
                                </a>
                            </li>
                            @endcan
                        </ul>
                    </div>
                    <!-- /.navbar-collapse -->
                </nav>
            </div>