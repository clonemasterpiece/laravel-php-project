@extends("layouts.layoutAdmin")
@section("title") Steph Store - User Roles Admin Page @endsection

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
                    <a class="navbar-brand" href="#">User Roles</a>
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
                        <h3>Roles</h3>
                        <div id="roles">
                            @if(session('msg'))
                                <div class="alert alert-success">
                                    {{ session('msg') }}</br>
                                </div>
                            @endif
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">id_roles</th>
                                    <th scope="col">role</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($panelRoles as $r)
                                <tr>
                                    <th scope="row">{{$r->id_roles}}</th>
                                    <form action="/roles/update" method="POST">
                                        <input type="hidden" value="{{$r->id_roles}}" name="hiddenId"/>
                                    <td><input type="text" id="nameRole{{$r->id_roles}}" name="name" class="form-control" value="{{$r->role}}"></td>
                                    <td><input type="submit" data-id="{{$r->id_roles}}" class="updateRole" value="Update"/></td>
                                        @csrf
                                    </form>
                                    <form action="/roles/delete" method="POST">
                                        <input type="hidden" value="{{$r->id_roles}}" name="hiddenId"/>
                                    <td><input type="submit" data-id="{{$r->id_roles}}" class="deleteRole" value="Delete"/></td>
                                        @csrf
                                    </form>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <p id="write"></p>
                        </div>
                    </div>
                </div>
                <!-- kraj update i delete -->
                <!-- insert -->
                <div class="row">
                    <div class="col-md-12 mt-5">
                        <table class="table">
                            <h3>Insert role</h3>
                            <tbody>
                            <tr>
                                <form action="/roles/insert" method="POST">
                                <td><input type="text" id="nameRole" name="name" class="form-control" placeholder="Enter name"></td>
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
