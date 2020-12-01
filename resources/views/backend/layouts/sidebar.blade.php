<div class="wrapper">
            <div class="container">
                <div class="row">
                    <div class="span3">
                        <div class="sidebar">
                            
                            <!--/.widget-nav-->
                            <ul class="widget widget-menu unstyled">
                                <li class="active">
                                    <a href="{{url('/')}}"><i class="menu-icon icon-dashboard"></i>Dashboard</a>
                                </li>
                                <li>
                                    <a href="{{route('user.create')}}">
                                        <i class="menu-icon icon-plus-sign"></i> Create User 
                                    </a>
                                </li>
                                <li>
                                    <a href="{{route('user.index')}}">
                                        <i class="menu-icon icon-user"></i>View Users <b class="label green pull-right"></b> 
                                    </a>
                                </li>
                                
                            </ul>

                            <ul class="widget widget-menu unstyled">
                                <li>
                                    <a href="{{route('band.create')}}">
                                        <i class="menu-icon icon-plus-sign"></i> Create Band 
                                    </a>
                                </li>
                                <li>
                                    <a href="{{route('band.index')}}">
                                        <i class="menu-icon icon-inbox"></i>View Bands <b class="label green pull-right"></b> 
                                    </a>
                                </li>
                            </ul>

                            <ul class="widget widget-menu unstyled">
                                <li>
                                    <a href="{{route('sale.create')}}">
                                        <i class="menu-icon icon-plus-sign"></i> Create Sale 
                                    </a>
                                </li>
                                <li>
                                    <a href="{{route('sale.index')}}">
                                        <i class="menu-icon icon-inbox"></i>View Sales <b class="label green pull-right"></b> 
                                    </a>
                                </li>
                                
                            </ul>

                            <!--/.widget-nav-->
                            {{-- <ul class="widget widget-menu unstyled">
                                
                                <li>
                                    <a href="{{route('user.exam')}}"><i class="menu-icon icon-bullhorn"></i>  Assign Exam </a>
                                </li>
                                <li>
                                    <a href="{{route('view.exam')}}">
                                        <i class="menu-icon icon-inbox"></i>View User Exam <b class="label green pull-right"></b> 
                                    </a>
                                </li>
                                
                            </ul> --}}
                            <!--/.widget-nav-->
                            {{-- <ul class="widget widget-menu unstyled">
                                
                                <li>
                                    <a href="{{route('result')}}"><i class="menu-icon icon-bullhorn"></i>View Result </a>
                                </li>
        
                            </ul> --}}

                            
                        
                            <!--/.widget-nav-->
                            <ul class="widget widget-menu unstyled">
                                
                                <li>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();document.getElementById('logout-form').submit();"
                                    >
                                       <i class="icon-inbox"></i> {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                    
                                </li>
                            </ul>
                        </div>
                        <!--/.sidebar-->
                    </div>
                    <!--/.span3-->