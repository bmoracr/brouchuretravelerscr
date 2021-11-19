@include('template/head')
    <div class="login-main">
        <div class="login-section-form">

            <div class="login-container">
                <form action="/login" method="post" >
                    @csrf
                    <div class="login-form-title">
                        <h1 class="login-title">BROUCHURE <em>DIGITAL</em></h1>
                    </div>
                    <div class="login-form-inputs">
                        <div class="login-form-inputs-item"><input placeholder="Username" type="text" name="username" autocomplete="username" value="{{ old('username') }}" required></div>
                        @if ($errors->any())
                        <div class="login-error-message">
                                @foreach ($errors->get('username') as $error)
                                    {{ $error }}
                                @endforeach
                        </div>
                        @endif                        
                        <div class="login-form-inputs-item"><input placeholder="Password" type="password" name="password" autocomplete="current-password" value="{{ old('password') }}" required> </div>
                        @if ($errors->any())
                        <div class="login-error-message">
                                @foreach ($errors->get('password') as $error)
                                    {{ $error }}
                                @endforeach
                        </div>
                        @endif
                    </div>
                    <div class="login-form-btn">
                        <div class="login-form-button-item">
                            <button>Sign In</button>
                        </div>
                        <span class="login-error-message" style="color: #fff;text-align:left; margin-left:15%; padding-left:0; align-self:start;"><a style="color: #fff; text-decoration:none;" href="/forgot-password">Forgot Password ?</a></span> 
                        @if ($errors->any())
                        <div class="login-error-message">
                                @foreach ($errors->get('notmatch') as $error)
                                    {{ $error }}
                                @endforeach
                        </div>
                        @endif
                    </div>
                    
                </form>
            </div>


            <div class="login-slide">
                <img src="{{ url('assets/img/login/login-slide.jpg')}}" width="100%" height="100%" alt="">
            </div>



        </div>
    </div>
@include('template/foot')