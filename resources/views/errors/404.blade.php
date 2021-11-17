@include('template/head')
    <div class="login-main">
        <div class="login-section-form">

            <div class="login-container" style="color: #fff">
                <div class="login-form-title">
                    <h1 class="login-title">BROCHURE <em>DIGITAL</em></h1>
                </div>
                <div class="login-form-inputs">
                    <div class="login-form-inputs">
                        <div class="login-form-inputs-item"><h4>Oops! Page not found.</h4></div>  
                        {{-- <div class="login-form-inputs-item"><h4>Please <a href="mailto:operaciones@travelerscr.com" style="color: #c2c2c2; text-decoration:none;">contact support</a> with error(500)</h4></div>   --}}
                        <div class="login-form-inputs-item"><h4><a href="#" onclick="window.history.back()" style="color: #f33f3f; text-decoration:none;"> Try Again </a></h4></div>  
                    </div>   
                </div>
                
            </div>
            <div class="login-slide">
                <img src="{{ url('assets/img/login/login-slide.jpg')}}" width="100%" height="100%" alt="">
            </div>



        </div>
    </div>
@include('template/foot')