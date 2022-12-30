@extends("layouts.layoutAdmin")
@section("title") Steph Store - Users Admin Page @endsection

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
                <a class="navbar-brand" href="#">List of users</a>
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
                <!-- update i delete-->
                <div class="col-md-12">
                    <h3>Users</h3>
                    <div id="users">
                        @if(session('msg'))
                            <div class="alert alert-success">
                                {{ session('msg') }}</br>
                            </div>
                        @endif
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">id_user</th>
                                <th scope="col">name</th>
                                <th scope="col">last name</th>
                                <th scope="col">email</th>
                                <th scope="col">role</th>
                                <th scope="col">time</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($adminUsers as $u)
                            <tr>
                                <th scope="row">{{$u->id_user}}</th>
                                <td id="nameUser{{$u->id_user}}">{{$u->name_user}}</td>
                                <td id="lastNameUser{{$u->id_user}}">{{$u->last_name}}</td>
                                <td id="emailUser{{$u->id_user}}">{{$u->email_user}}</td>
                                <td id="roleUser{{$u->id_user}}">{{$u->role->role}}</td>
                                <td><input type="text"  class="form-control" id="timeUser{{$u->id_user}}" value="{{$u->time_register}}" disabled/></td>
                                <td>
                    </div>
                </div>
            </div>
            </td>
            <form action="/users/delete" method="POST">
                <input type="hidden" name="hiddenId" value="{{$u->id_user}}"/>
                <td><input type="submit" value="Delete" class="btn btn-danger"/></td>
                @csrf
            </form>
            </tr>
            @endforeach
            </tbody>
            </table>
        </div>
    </div>
</div>
<!-- kraj update i update-->
</div>
</div>
@endsection
