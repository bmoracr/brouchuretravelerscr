
<div class="title-container">
    <h1 class="title">
        @php if($products == null){
            echo 'Not transfers found';}else{
            echo 'All transfers';} 
        @endphp
        
    </h1>
</div>
@if ($products != null)
    

@foreach ($products as $item)

    

    @php
        $bg='bg-playa'; $txt='text-playa';

        if(file_exists($item->path_src)){

            $item->path_src = url('assets/img/tours/'.$item->code.'.jpg');

        }else{

            $item->path_src = url('assets/img/card/default.jpg');

        }
        
    @endphp

    
        @if (preg_match('/TRANSFERS-/', $item->code))

        <div class="post-container {{$bg}} toHide" data-size="{{strtolower($item->name)}}">

            <div class="post-card-container">
                <div class="post-header">
                    <div class="post-header-container">
                        <div class="post-header-item {{$txt}}"><strong>Transfers</strong></div>
                        <div class="post-header-item" id="post-header-item-name"><strong>{{$item->name}}</strong></div>
                        {{-- <div class="post-header-item"><a href="#">Load more...</a></div> --}}
        
                    </div>
                </div>
        
                <div class="post-body">
                    <table class="post-body-table">
                        <thead>
                            <tr>
                                <th>P.RACK</th>
                                <th>P.NETO</th>
                                <th>P.COMISSION</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{$item->p_rack}}$</td>
                                <td>{{$item->p_neto}}$</td>
                                <td>{{$item->p_comssion}}$</td>
                                
                            </tr>
                        </tbody>
                        
                    </table>
                </div>
                <div class="post-body"><span class="post-body-table" style="font-size:0.7rem;">IVA NOT INCLUDED</span></div>
                
                <div class="post-footer">
                    <div class="post-footer-item {{$txt}}">
                        {{$item->description}}
                    </div>
                    <div class="post-footer-item">
                        {{$item->includes}}
                    </div>
                </div>
            </div>
            <div class="post-image-container">
                <img src="{{$item->path_src}}" >
            </div>
    
    
        </div>
            
        @endif
    

    
@endforeach

@endif