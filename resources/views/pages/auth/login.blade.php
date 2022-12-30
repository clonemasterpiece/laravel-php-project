@extends("layouts.layout")
@section("title") Steph Store - Login Page @endsection
@section("description") Burgers and other fastfood stuff @endsection
@section("keywords") Burgers,Bojan,Stefanovski,Food,Web Development,HTML,CSS,XML,JavaScript,PHP @endsection

@section("content")

<div class="row tm-welcome-section" id="contact">
    <h2 class="col-12 text-center tm-section-title">Welcome back.</h2>
    <p class="col-12 text-center">Use your credentials to log in below.</p>
</div>
</header>
<div class="tm-container-inner-2 tm-contact-section">
    <div class="row">
        <div class="col-md-12" id="con">
            <form action="/login" method="POST">
                <div class="form-group">
                    <input type="email" name="email" class="form-control" id="emailInputL" placeholder="Email"/>
                </div>
                <span id="errorEmailL"></span>
                <div class="form-group">
                    <input type="password" name="password" class="form-control" id="passwordInputL" placeholder="Password"/>
                </div>
                <span id="errorPassL"></span>
                <p id="doneL"></p>
                <div class="form-group tm-d-flex">
                    <input type="submit" id="buttonSubmitL" class="tm-btn tm-btn-success tm-btn-right" value="Log in">
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
                <div class="alert alert-danger">
                    {{ session('msg') }}</br>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
