
<div class="wrapper">
    <div class="sidebar" data-color="white" data-active-color="danger">
        <div class="logo">
            <a href="https://www.creative-tim.com" class="simple-text logo-mini">
            </a>
            <a href="{{route('home')}}" class="simple-text logo-normal">
                Steph Store
            </a>
        </div>
        <div class="sidebar-wrapper">
            <ul class="nav">
                @foreach($panelMenu as $pm)
                <li>
                    <a href="{{$pm['href']}}">
                        <p>{{$pm['name']}}</p>
                    </a>
                </li>
                @endforeach
                <li>
                    <a href="{{route('home')}}">
                        <p>Go back to site</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
