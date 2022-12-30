@extends("layouts.layout")
@section("title") Steph Store - Register Page @endsection
@section("description") Burgers and other fastfood stuff @endsection
@section("keywords") Burgers,Bojan,Stefanovski,Food,Web Development,HTML,CSS,XML,JavaScript,PHP @endsection


@section('content')
<div class="row tm-welcome-section" id="contact">
    <h2 class="col-12 text-center tm-section-title">Ready to join us?</h2>
    <p class="col-12 text-center">Feel free to fill the form and join our club!</p>
</div>
</header>
<div class="tm-container-inner-2 tm-contact-section">
    <div class="row">
        <div class="col-md-12" id="con">
            <form action="/register" method="POST">
            <div class="form-group">
                <input type="text" name="name" id="nameInputR" class="form-control" placeholder="Name"/>
            </div>
            <span id="errorFirstNameR"></span>
            <div class="form-group">
                <input type="text" name="lastName" id="lastNameInputR" class="form-control" placeholder="Last Name"/>
            </div>
            <span id="errorLastNameR"></span>
            <div class="form-group">
                <input type="email" name="email" class="form-control" id="emailInputR" placeholder="Email"/>
            </div>
            <span id="errorEmailR"></span>
            <div class="form-group">
                <input type="password" name="password" id="passInputR" class="form-control" placeholder="Passwords"/>
            </div>
            <span id="errorPassR"></span>
            <p id="doneR"></p>
            <div class="form-group tm-d-flex">
                <input type="submit" id="buttonSubmitR" class="tm-btn tm-btn-success tm-btn-right" value="Register">
            </div>
            @csrf
            </form>
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
                    <a href="{{route("loginForm")}}" id="fontColor">Log in now!</a>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
