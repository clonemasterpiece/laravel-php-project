<header>
    <nav class="navbar navbar-expand-lg px-4">
        <a class="navbar-brand" href="{{route('home')}}"><img src="{{asset('assets/img/logo.png')}}" alt="sss"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#myNav">
            <span class="toggler-icon"><i class="fas fa-bars"></i></span>
        </button>
        <div class="collapse navbar-collapse" id="myNav">
            <ul class="navbar-nav mx-auto text-capitalize">
                @if(session()->has("user"))
                    @if(session()->get("user")->id_roles == 1)
                        @foreach($menusA as $ma)
                <li class="nav-item active">
                    <a class="nav-link" href="{{route($ma->href_menu)}}">{{$ma->name_menu}}</a>
                </li>
                        @endforeach
                    @else
                        @foreach($menusU as $mu)
                            <li class="nav-item active">
                                <a class="nav-link" href="{{route($mu->href_menu)}}">{{$mu->name_menu}}</a>
                            </li>
                        @endforeach
                    @endif
                @else
                    @foreach($menusO as $mo)
                        <li class="nav-item active">
                            <a class="nav-link" href="{{route($mo->href_menu)}}">{{$mo->name_menu}}</a>
                        </li>
                    @endforeach
                @endif

            </ul>
            <div class="nav-info-items d-none d-lg-flex ">
                <!--  info -->

                <div class="nav-info align-items-center d-flex justify-content-between mx-lg-5">
                    <!-- <span class="info-icon mx-lg-3"><i class="fas fa-phone"></i></span> -->
                    <p class="mb-0">Welcome <span class="text-primary">{{ session()->has("user") ? "Hi ".session("user")->name_user." ". session("user")->last_name : "" }}</span> :)</p>
                </div>

                    <!-- info -->

            </div>
        </div>
    </nav>
