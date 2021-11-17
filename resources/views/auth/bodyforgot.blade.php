@switch($section)
    @case('forgot')
        @include('template/forgot-password')
        @break
    @case('reset')
        @include('template/reset-password')
        @break
    @default
        
@endswitch