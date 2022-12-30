@extends("layouts.layout")
@section("title") Steph Store - Contact Page @endsection
@section("description") Contact us about our Burgers and other fastfood stuff @endsection
@section("keywords") Burgers,Bojan,Stefanovski,Food,Web Development,HTML,CSS,XML,JavaScript,PHP @endsection

@section("content")


<header class="row tm-welcome-section" id="contact">
    <h2 class="col-12 text-center tm-section-title">Contact Page</h2>
    <p class="col-12 text-center">Let our administrator know what's on your mind!</p>
</header>
<div class="tm-container-inner-2 tm-contact-section">
    <div class="row">
        <div class="col-md-6" id="con">
            <form method="POST" action="/contact">
                <div class="tm-contact-form">
                    <input type="hidden" id="messageLogesIn" value="{{session('user')->id_user}}">
                    <div class="form-group">
                        <textarea rows="5" name="message" class="form-control" id="messageInput" placeholder="Enter a message for administrator"></textarea>
                    </div>
                    <span id="errorMsg"></span>
                    <p id="done"></p>
                    <div class="form-group tm-d-flex">
                        <input type="submit" id="buttonSubmit" class="tm-btn tm-btn-success tm-btn-right" name="buttonSubmit" value="Send message"/>
                    </div>
                </div>
                @csrf
            </form>

        </div>
        <div class="col-md-6">
            <div class="tm-address-box" id="address">
                <h4 class="tm-info-title tm-text-success">Our Address</h4>
                <address>
                    Trg Borisa Kidrica 214a
                </address>
                <a href="tel:069-0901-0110" class="tm-contact-link">
                    <i class="fas fa-phone tm-contact-icon"></i> 069-0901-0110
                </a><br>
                <a href="mailto:stephstor@sb.rs" class="tm-contact-link">
                    <i class="fas fa-envelope tm-contact-icon"></i> stephstore@sb.rs
                </a>
            </div>
        </div>
    </div>
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
</div>
@endsection
