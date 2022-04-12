<div class="body-main" style="margin: 0">
    <div class="body-container">
        <a href="/admin/listpostTransfers" style="margin: 1rem;" ><i class="fas fa-arrow-circle-left" style="color:#ffff; font-size:3rem;"></i></a>
@foreach ($products as $item)

    @php
        $bg='bg-playa'; $txt='text-playa';
        if(file_exists($item->path_src)){

            $item->path_src = url('assets/img/tours/'.$item->code.'.jpg');

        }else{

            $item->path_src = url('assets/img/card/default.jpg');

        }
        
    @endphp

    
    
    
    <div class="post-container {{$bg}} toHide" data-size="{{$item->name}}">

        <div class="post-card-container">
            <div class="post-header">
                <div class="post-header-container">
                    <div class="post-header-item {{$txt}}"><strong>{{$item->category}}</strong></div>
                    <div class="post-header-item" id="post-header-item-name"><strong>{{$item->name}}</strong></div>
                    {{-- <div class="post-header-item"><a href="#">Load more...</a></div> --}}
    
                </div>
            </div>
    
            <div class="post-body">
                <table class="post-body-table">
                    <thead>
                        <tr>
                            {{-- <th>P.RACK</th> --}}
                            <th colspan="6">COSTUMER COST PRICE</th>
                            {{-- <th>P.COMISSION</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            {{-- <td>{{$item->p_rack}}$</td> --}}
                            <td>{{$item->p_neto}}$</td>
                            {{-- <td>{{$item->p_comssion}}$</td> --}}
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
    
@endforeach
</div>
</div>

