

<div class="body-main">

    <div class="body-container">
        @include('template/search')
        @include('template/carousel')
        @switch($action)
            @case('post')
                @include('template/post')
                @break
            @case('transfers')
                @include('template/postTransfers')
                @break
            @default
                
        @endswitch
        
    </div>
    
</div>