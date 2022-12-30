@extends("layouts.layoutAdmin")
@section("title") Steph Store - Producsts Admin Page @endsection

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
                    <a class="navbar-brand" href="#">Products Table</a>
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
                        <h3>Products</h3>
                        <div id="productss">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th scope="col">id</th>
                                        <th scope="col">name</th>
                                        <th scope="col">price</th>
                                        <th scope="col">picture_ rc</th>
                                        <th scope="col">change src</th>
                                        <th scope="col">category</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($panelProducts as $p):
                                    <tr>
                                        <form action="/product/update" method="POST" enctype="multipart/form-data">
                                        <th scope="row">{{$p->id}}</th>
                                        <td><input type="text" name="name" id="nameProducts{{$p->id}}" class="form-control" value="{{$p->name}}"></td>
                                        <td><input type="text" name="price" id="cenaProducts{{$p->id}}" class="form-control" value="{{$p->cena}}"></td>
                                        <td><input type="text" id="srcProducts{{$p->id}}" class="form-control" value="{{$p->src}}" disabled></td>
                                        <td><input type="file" name="fileP" id="file{{$p->id}}" class="form-control-file"></td>
                                        <td>
                                            <!-- padajuca lista -->
                                            <div class="form-group">
                                                <select name="category" class="form-select product{{$p->id}}"  aria-label="Default select example">


                                                    @foreach($panelCategories as $c)
                                                    @if($p->kategorija_id == $c->id_cat):

                                                    <option selected value="{{$c->id_cat}}">{{$c->name_cat}}</option>

                                                        @else
                                                    <option value="{{$c->id_cat}}">{{$c->name_cat}}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                            <!-- kraj padajuce liste -->
                                        </td>
                                        <input type="hidden" name="hiddenId" value="{{$p->id}}"/>
                                        <td><input type="submit" value="Update" class="btn btn-simple"/></td>
                                    @csrf
                                        </form>
                                        <form action="/product/delete" method="POST">
                                            <input type="hidden" name="hiddenId" value="{{$p->id}}"/>
                                        <td><input type="submit" value="Delete" class="btn btn-danger"/></td>
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
                @if(session('msgerror'))
                    <div class="alert alert-danger">
                        {{ session('msgerror') }}</br>
                    </div>
                @endif
                <!-- insert -->
                <div class="row">
                    <div class="col-md-12 mt-5">
                        <form action="/product/insert" method="POST" enctype="multipart/form-data">
                            <table class="table">
                                <h3>Insert product</h3>
                                <tbody>
                                <tr>
                                    <td><input type="text" id="nameProduct" name="name" class="form-control" placeholder="Enter name"></td>
                                </tr>
                                <tr>
                                    <td><input type="number" id="priceProduct" name="price" class="form-control" placeholder="Enter price"></td>
                                </tr>
                                <tr>
                                    <td><div class="form-group">
                                            <select class="form-select catInsert" name="category" id="catInsert" aria-label="Default select example">
                                                <option selected value="0">Choose category</option>

                                                @foreach($panelCategories as $pc):

                                                <option value="{{$pc->id_cat}}">{{$pc->name_cat}}</option>

                                                @endforeach;

                                            </select>
                                        </div></td>
                                </tr>

                                <tr>
                                    <td><input type="file" name="file" id="fileProducts" class="form-control-file"></td>
                                    <td><input type="submit" value="Insert" class="btn btn-success"/></td>
                                </tr>
                                </tbody>
                            </table>
                            @csrf
                        </form>
                    </div>
                </div>
                <!-- kraj inserta -->
            </div>
        </div>




@endsection
