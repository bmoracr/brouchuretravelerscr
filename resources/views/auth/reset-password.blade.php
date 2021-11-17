@include('template/head')
    <div class="login-main">
        <div class="login-section-form">

            <div class="login-container">
                <form method="post" action="/reset-password">
                    @csrf
                    <input type="hidden" name="token" value="{{$token}}">
                    <div class="login-form-title">
                        <h1 class="login-title">BROCHURE <em>DIGITAL</em></h1>
                    </div>
                    <div class="login-form-inputs">
                        <div class="login-form-inputs-item"><input placeholder="Username" type="text" name="email" autocomplete="email" value="{{ old('email') }}" required></div>
                        @if ($errors->any())
                        <div class="login-error-message">
                                @foreach ($errors->get('email') as $error)
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
                        <div class="login-form-inputs-item"><input placeholder="Confirm password" type="password" name="password_confirmation" autocomplete="false" value="{{ old('password_confirmation') }}" required> </div>
                        @if ($errors->any())
                        <div class="login-error-message">
                                @foreach ($errors->get('password_confirmation') as $error)
                                    {{ $error }}
                                @endforeach
                        </div>
                        @endif
                    </div>
                    <div class="login-form-btn">
                        <div class="login-form-button-item">
                            <button>Reset password</button>
                        </div>
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


