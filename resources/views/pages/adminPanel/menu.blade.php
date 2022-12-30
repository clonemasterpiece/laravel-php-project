@extends("layouts.layoutAdmin")
@section("title") Steph Store - Menus Admin Page @endsection

@section('content')
    <div class="main-panel" style="height: 100vh;">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
        <div class="container-fluid">
            <div class="navbar-wrapper">
                <div class="navbar-toggle">
                    <button type="button" class="navbar-toggler">
                        <span class="navbar-toggler-bar bar1"></span>
                        <span class="navbar-toggler-bar bar2"></span>
                        <span class="navbar-toggler-bar bar3"></span>
                    </button>
                </div>
                <a class="navbar-brand" href="#">Menu</a>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-bar navbar-kebab"></span>
                <span class="navbar-toggler-bar navbar-kebab"></span>
                <span class="navbar-toggler-bar navbar-kebab"></span>
            </button>
        </div>
    </nav>
    <!-- End Navbar -->
    <div class="content">
        <div class="container">
            <div class="row">
                <!-- update i delete -->
                <div class="col-md-12">
                    <h3>Menu</h3>
                    <div id="menu">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">id_menu</th>
                                <th scope="col">name_menu</th>
                                <th scope="col">href_menu</th>
                                <th scope="col">show_menu</th>
                                <th scope="col">priority_menu</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($errors->any())
                                <div class="alert alert-danger">
                                    @foreach ($errors->all() as $error)
                                        <p>{{ $error }}</p>
                                    @endforeach
                                </div>
                            @endif
                            @if(session('msg'))
                                <div class="alert alert-success">
                                    {{ session('msg') }}</br>
                                </div>
                            @endif
                            @foreach($panelMenus as $m)
                            <tr>
                                <form action="/menus/update" method="POST">
                                    <th scope="row">{{$m->id_menu}}</th>
                                    <input type="hidden" name="hiddenId" value="{{$m->id_menu}}"/>
                                    <td><input type="text" name="name" id="nameMenu{{$m->id_menu}}" class="form-control" value="{{$m->name_menu}}"></td>
                                    <td><input type="text" name="href" id="hrefMenu{{$m->id_menu}}" class="form-control" value="{{$m->href_menu}}"></td>
                                    <td><input type="number" name="show" id="showMenu{{$m->id_menu}}" class="form-control" value="{{$m->show_menu}}"></td>
                                    <td><input type="number" name="priority" id="priorityMenu{{$m->id_menu}}" class="form-control" value="{{$m->priority_menu}}"></td>
                                    <td><input type="submit" class="btn btn-success" value="Update"/>
                                    @csrf
                                </form>
                                <form action="/menus/delete" method="POST">
                                    <input type="hidden" name="hiddenId2" value="{{$m->id_menu}}"/>
                                    <td><input type="submit" class="btn btn-danger" value="Delete"/>
                                    @csrf
                                </form>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- kraj update i delete -->
            <!-- insert -->
            <div class="row">
                <div class="col-md-12 mt-5">
                    <table class="table">
                        <h3>Insert menu</h3>
                        <tbody>
                        <tr>
                            <form action="/menus/insert" method="POST">
                                <td><input type="text" name="name" id="nameMenu" class="form-control" placeholder="Enter name"></td>
                                <td><input type="text" name="href" id="hrefMenu" class="form-control" placeholder="Enter href"></td>
                                <td><input type="number" name="show" id="showMenu" class="form-control" placeholder="Enter show_menu"></td>
                                <td><input type="number" name="priority" id="priorityMenu" class="form-control" placeholder="Enter priority_menu"></td>
                                <td><input type="submit" value="Insert" class="btn btn-success"/></td>
                                @csrf
                            </form>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- kraj inserta -->
        </div>
    </div>
@endsection
