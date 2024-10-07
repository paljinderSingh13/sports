
<!--**********************************
            Sidebar start
        ***********************************-->
        <div class="ic-sidenav">
            <div class="">
                <h4 class="heading-menu">{{auth()->user()->name}}</h4>
                <ul class="metismenu" id="menu">
                    <li><a class="" href="{{ route('club.dashboard') }}" >
                            <!-- <i class="flaticon-home"></i> -->
                            <i class="fa-solid fa-circle-user"></i>
                            <span class="nav-text">Management </span>
                        </a>
                        
                    </li>
                    @if(auth()->user()->role != 'player' && auth()->user()->role != 'player_administrator')
                     <li><a href="{{ route('club.adm') }}" class="" aria-expanded="false">
                            <!-- <i class="flaticon flaticon-user-1"></i> -->
                            <i class="fa-solid fa-user-tie"></i>
                            <span class="nav-text">Club Administrators</span>
                        </a>                        
                    </li>
                    @endif
                    <li><a href="javascript:void(0);" class="has-arrow" aria-expanded="false">
                            <!-- <i class="flaticon flaticon-user"></i> -->
                            <i class="fa-solid fa-people-group"></i>
                            <span class="nav-text">Teams</span>
                        </a>
                        <ul aria-expand="false">
                            <li><a href="{{route('team.allTeamDashboard')}}">All Teams</a></li>
                            <li><a href="{{route('team.team_administrator')}}">All Team Administrator</a></li>
                            <!-- <li><a href="#" class="has-arrow" aria-expanded="false">Players</a>
                                <ul aria-expanded="false">
                                    <li><a href="#">Player Administrator</a></li>
                                </ul>
                            </li> -->
                        <li><a href="#">Roster</a></li>
                        <li><a href="{{route('team.schedule')}}">All Schedules</a></li>
                            
                        </ul>
                    </li>
                     <li><a href="javascript:void(0);" class="has-arrow" aria-expanded="false">
                            <!-- <i class="flaticon-cms"></i> -->
                            <i class="fa-solid fa-users"></i>
                            <span class="nav-text">Players</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="{{route('player.add')}}">New Player </a></li><li><a href="{{route('player.administrator.list')}}">Player administrator </a></li>
                            <!-- <li><a href="#">List</a></li> -->
                            
                        </ul>
                    </li>

                   <!--  <li><a href="#" class="ai-icon" aria-expanded="false">
                            <i class="flaticon-price-tag"></i>
                            <span class="nav-text">Payment</span>
                        </a>
                    </li>

                    <li><a href="#" class="ai-icon" aria-expanded="false">
                            <i class="flaticon-incoming-message"></i>
                            <span class="nav-text">Notification</span>
                        </a>
                    </li>

                    <li><a href="#" class="ai-icon" aria-expanded="false">
                            <i class="flaticon-calendar-1"></i>
                            <span class="nav-text">Events</span>
                        </a>
                    </li>

                    <li><a href="#" class="ai-icon" aria-expanded="false">
                            <i class="flaticon-grid"></i>
                            <span class="nav-text">Schedule</span>
                        </a>
                    </li>

                    <li><a href="#" class="ai-icon" aria-expanded="false">
                            <i class="flaticon-bar-chart"></i>
                            <span class="nav-text">Chat</span>
                        </a>
                    </li>

                    <li><a href="#" class="ai-icon" aria-expanded="false">
                            <i class="flaticon-phone-book"></i>
                            <span class="nav-text">Contact us</span>
                        </a>
                    </li> -->
                </ul>
            </div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->