@include('template/head')
    <div class="login-main">
        <div class="login-section-form">

            <div class="login-container">
                <form method="post" action="/forgot-password">
                    @csrf
                    <div class="login-form-title">
                        <h1 class="login-title">BROCHURE <em>DIGITAL</em></h1>
                    </div>
                    <div class="login-form-inputs">
                        <div class="login-form-inputs-item"><input placeholder="Email" type="text" name="email" autocomplete="email" value="{{ old('email') }}" required></div>
                        @if ($errors->any())
                        <div class="login-error-message">
                                @foreach ($errors->get('email') as $error)
                                    {{ $error }}
                                @endforeach
                        </div>
                        @endif    
                    </div>
                    <div class="login-form-btn">
                        <div class="login-form-button-item">
                            <button>Forgot password</button>
                        </div>
                        @if ($errors->any())
                        <div class="login-error-message">
                                @foreach ($errors->get('notmatch') as $error)
                                    {{ $error }}
                                @endforeach
                        </div>
                        @endif
                        @if (session('successful'))
                        <div class="login-error-message">
                            {{ session('successful') }}
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