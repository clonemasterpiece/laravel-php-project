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
                    <a class="navbar-brand" href="#">Categories</a>
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
                        <h3>Category</h3>
                        <div id="category">
                            <table class="table">
                                <thead>
                                @if(session('msg'))
                                    <div class="alert alert-success">
                                        {{ session('msg') }}</br>
                                    </div>
                                @endif
                                <tr>
                                    <th scope="col">id_cat</th>
                                    <th scope="col">name_cat</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($categoriesAdmin as $c)
                                <tr>
                                    <form action="/categories/update" method="POST">
                                    <th scope="row">{{$c->id_cat}}</th>
                                        <input type="hidden" name="hiddenId" value="{{$c->id_cat}}">
                                    <td><input type="text" name="name" class="form-control" value="{{$c->name_cat}}"></td>
                                    <td><input type="submit" value="Update" class="btn btn-simple"></td>
                                        @csrf
                                    </form>
                                    <form action="/categories/delete" method="POST">
                                        <input type="hidden" name="hiddenId" value="{{$c->id_cat}}">
                                    <td><input type="submit" value="Delete" class="btn btn-danger"></td>
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
                            <h3>Insert category</h3>
                            <tbody>
                            <tr>
                                <form action="/categories/insert" method="POST">
                                <td><input type="text" id="nameCategory" name="name" class="form-control" placeholder="Enter name"></td>
                                <td><input type="submit" value="Insert" class="btn btn-success"></td>
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
