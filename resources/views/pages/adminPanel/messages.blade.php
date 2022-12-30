@extends("layouts.layoutAdmin")
@section("title") Steph Store - Messages Admin Page @endsection

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
                    <a class="navbar-brand" href="#">Messages</a>
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
            <div class="row">
                <div class="col-md-12">
                    <h3>User messages</h3>
                    <div id="messages">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">First Name</th>
                                <th scope="col">Last Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Message</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(session('msg'))
                                <div class="alert alert-success">
                                    {{ session('msg') }}</br>
                                </div>
                            @endif
                            @foreach($messages as $m)
                            <tr>
                                <form action="/messages/delete" method="POST">
                                    <input type="hidden" name="hiddenId" value="{{$m->id_msg}}"/>
                                    <th scope="row">{{$m->id_msg}}</th>
                                    <td>{{$m->user->name_user}}</td>
                                    <td>{{$m->user->last_name}}</td>
                                    <td>{{$m->user->email_user}}</td>
                                    <td>{{$m->message_user}}</td>
                                    <td><input type="submit" class="btn btn-danger" value="Delete"/></td>
                                @csrf
                                </form>
                            </tr>
                            @endforeach

                            </tbody>
                        </table>

                    </div>
                </div>
            </div>


        </div>
    </div>
    </div>



@endsection
