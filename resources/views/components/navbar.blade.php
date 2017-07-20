<nav class="navbar navbar-default navbar-fixed-top navbar-top">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-expand-toggle">
                            <i class="fa fa-bars icon"></i>
                        </button>
                        <ol class="breadcrumb navbar-breadcrumb">
                            <li class="active">Dashboard</li>
                        </ol>
                        <button type="button" class="navbar-right-expand-toggle pull-right visible-xs">
                            <i class="fa fa-th icon"></i>
                        </button>
                    </div>
                    <ul class="nav navbar-nav navbar-right">
                        <button type="button" class="navbar-right-expand-toggle pull-right visible-xs">
                            <i class="fa fa-times icon"></i>
                        </button>
                        @can('order-meals')
                        @php
                            $student = Auth::user()->student;
                        @endphp
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-shopping-cart fa-lg"></i> &nbsp; <span class="badge">{{$student->cart->count()}}</span></a>
                            <ul class="dropdown-menu animated fadeInDown">
                                <li class="message">
                                    @foreach($student->cart->take(4)->all() as $item)
                                        <li class="list-group-item">
                                            <i class="fa fa-check icon"></i> {{$item->meal->name}}
                                        </li>
                                    @endforeach
                                </li>
                                <a href="{{ route('cart.index') }}">
                                    <li class="list-group-item message">
                                        view all
                                    </li>
                                </a>
                            </ul>
                        </li>
                        @endcan
                        <li class="dropdown profile">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ucwords(Auth::user()->name)}} <span class="caret"></span></a>
                            <ul class="dropdown-menu animated fadeInDown">
                                <li>
                                    <div class="profile-info">
                                        <h4 class="username">{{ucwords(Auth::user()->name)}}</h4>
                                        <p>{{Auth::user()->email}}</p>
                                        <div class="btn-group margin-bottom-2x" role="group">
                                            <button onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" type="button" class="btn btn-default"><i class="fa fa-sign-out"></i> Logout</button>
                                            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                              {{ csrf_field() }}
                                          </form>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>