<footer>
    <!-- navbar  -->

    <nav class="navbar navbar-expand-lg px-4">
        <a class="navbar-brand" href="{{route('home')}}"><img src="{{asset('assets/img/logo.png')}}" alt="sss"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#myNav">
            <span class="toggler-icon"><i class="fas fa-bars"></i></span>
        </button>
        <div class="collapse navbar-collapse" id="myNav">
            <ul class="navbar-nav mx-auto text-capitalize">
                <li class="nav-item">
                    <a class="nav-link" target="_blank" href="{{asset('assets/documentation.pdf')}}">doc</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('author')}}">author</a>
                </li>
            </ul>
            <div class="nav-info-items d-none d-lg-flex ">
                <!-- socials -->
                <div class="nav-info align-items-center d-flex justify-content-between mx-lg-5">
                    <span class="info-icon mx-lg-3"><a class="navbar-socials" href="http://facebook.com"><i class="fab fa-facebook-f"></i></a></span>
                    <span class="info-icon mx-lg-3"><a class="navbar-socials" href="http://instagram.com"><i class="fab fa-instagram"></i></a></span>
                    <span class="info-icon mx-lg-3"><a class="navbar-socials" href="http://google.com"><i class="fab fa-google-plus"></i></a></span>
                </div>

                <!-- end socials-->
                <!-- end  nav -->
            </div>
        </div>
    </nav>

</footer>




<script type="text/javascript" src="{{asset('assets/js/jquery-3.3.1.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/script.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/main.js')}}"></script>
