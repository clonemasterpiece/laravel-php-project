@extends("layouts.layout")
@section("title") Steph Store - Main Page @endsection
@section("description") Burgers and other fastfood stuff @endsection
@section("keywords") Burgers,Bojan,Stefanovski,Food,Web Development,HTML,CSS,XML,JavaScript,PHP @endsection

@section("content")

        <!-- end  nav -->
    <!-- banner  -->
        @if(session('msg'))
            <div class="alert alert-success">
                {{ session('msg') }}</br>
            </div>
        @endif
    <div class="container-fluid">
        <div class="row max-height justify-content-center align-items-center">
            <div class="col-10 mx-auto banner text-center">
                <h1 class="text-capitalize">welcome to <strong class="banner-title-one ">Burger Land</strong></h1>
                <a href="#store" class="btn banner-link text-uppercase my-2">Go to menu!</a>

            </div>

        </div>
    </div>




    <!--end of  banner  -->
    </header>
    <!-- header -->
    <!-- about us -->
    <section class="about py-5" id="about">
        <div class="container">

            <div class="row">
                <div class="col-10 mx-auto col-md-6 my-5">
                    <h1 class="text-capitalize">about <strong class="banner-title ">us</strong></h1>
                    <p class="my-4 text-muted w-75">Welcome to our website. We are mainly producing Burger and we're spetialized in this part of food preparation. We also produce some kind of hotdogs and also a greek speciality called Gyros by the recipe of an old greek Chef. We hope you'd enjoy in everysingle bite! Bon apetite!</p>
                    <a href="#" class="btn btn-outline-secondary btn-black text-uppercase ">Explore us</a>

                </div>
                <div class="col-10 mx-auto col-md-6 align-self-center my-5">
                    <div class="about-img__container">
                        <img src="{{asset('assets/img/reklama-1.jpg')}}" class="img-fluid" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- end of about us -->


    <!-- store -->
    <section id="store" class="store py-5">
        <div class="container">
            <!--  title -->
            <div class="row">
                <div class="col-10 mx-auto col-sm-6 text-center">
                    <h1 class="text-capitalize">our <strong class="banner-title ">store</strong></h1>
                </div>
            </div>
            <!-- end  title -->
            <!--filter buttons -->
            <form method="post">
            <div class="row">
                <div class=" col-lg-8 mx-auto d-flex justify-content-around my-2 sortBtn flex-wrap">

                    @foreach($categories as $c)

                    <a href="#" class="btn btn-outline-secondary btn-black text-uppercase filter-btn filter-btn-click m-2" data-filter="{{$c->id_cat}}">{{$c->name_cat}}</a>

                    @endforeach
                </div>
            </div>
            </form>
            <!-- search box -->
            <div class="row">

                <div class="col-10 mx-auto col-md-6">
                    <form action="" method="post">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend ">
                                <span class="input-group-text search-box" id="search-icon">
                                    <button class="btn btn-outline-dark my-2 my-sm-0" type="button" id="search">
                                          <i class="fas fa-search"></i>
                                    </button>
                                </span>
                            </div>
                            <meta name="csrf-token" content="{{csrf_token()}}">
                            <input type="search"  class="form-control" placeholder='item....' id="search-item">

                        </div>
                    @csrf
                    </form>
                </div>
            </div>
            <!--end filter -->
            <!-- store  items-->
            <div class="row" id="store-items">
                <!-- all products-->
                @foreach($products as $r)

                <div class="col-10 col-sm-6 col-lg-4 mx-auto my-3 store-item" data-item="$<?=$r->id?>">
                    <div class="card ">
                        <div class="img-container">
{{--                            <a href="index.php?page=showProduct&id=<?=$r->id?>">--}}
                                <img width="400px" src="{{asset('assets/img/smallGallery')}}/{{$r->src}}" class="card-img-top store-img" alt="<?=$r->alt?>">
{{--                            </a>--}}
                            <!-- <span class="store-item-icon"><i class="fas add-to-cart fa-shopping-cart"></i></span> -->
                        </div>
                        <div class="card-body">
                            <div class="card-text d-flex justify-content-between text-capitalize">
                                <h5 id="store-item-name">{{$r->name}}</h5>
                                <h5 class="store-item-value">{{$r->cena}}
                                    <strong id="store-item-price" class="font-weight-bold"> RSD </strong>
                                </h5>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="row">
            <div class="container align-content-center center" style="width: 210px;">
            <div class="col-lg-12 text-center">
                <nav aria-label="Page navigation example">
                    <ul class="pagination" id="pagination">
                        @if(count($products) > 0)
                            {{ $products->links() }}
                        @endif
                    </ul>
                </nav>
            </div>
            </div>
        </div>
    </section>

    @if (session()->has('user'))
        @php
            $userid = session('user')->id_user;
        @endphp

    <section id="forma">
        <div id="formaNaslov">
            <h2>Order details</h2>
        </div>
        <form action="/product/order" method="POST">
            <table id="tablicaForma">
                <input type="hidden" id="loggedIn" name="hiddenId" value="{{$userid}}">

                {{session("user")->name_user}}
            <tr>
                <td class="prostor text-center center dark mb-2 pb-2" colspan="2">Welcome <span class="text-primary">{{session("user")->name_user}}</span>, please fill your order </td>
            </tr>
            <tr>
                <td class="prostor" >Your adress</td>
                <td><input type="text" name="address" size="40" id="adresaId"/><span id="errorAddressR"></span></td>
            </tr>
            <tr>
                <td class="prostor">Your Phone number</td>
                <td><input type="text" name="number" size="40" id="phoneId"/><span id="errorPhoneR"></span></td>
            </tr>
            <tr>
                <td class="prostor">Food</td>
                <td id="foodIspis">
                    <select id="foodNameId" name="product_id">
                        <option value="0">Choose one</option>
                            @foreach($products as $prod)
                        <option value="{{$prod->id}}">{{$prod->name}}</option>
                            @endforeach
                        </select><br>
                        <span id="errorFoodR"></span>
                    </td>
                </tr>
                <tr>
                    <td class="prostor"></td>
                    <td>
                        <input type="submit" name="dugme" id="buttonOrderBooyah" class="dugme" value="Order"/>
                    </td>
                </tr>
            </table>
            @csrf
        </form>
        <div id="orderDone" class="center font-weight-bold color-black"></div>
    </section>
    @endif


@endsection
