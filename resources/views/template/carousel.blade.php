@if ($products_special != null)
    


<div class="title-container">
  <h1 class="title">Seasonal tours</h1>
</div>
<div class="carousel-container">
    <div class="owl-carousel owl-theme carousel-slider-container">
      @foreach ($products_special as $item)
      
        @php
          if(file_exists($item->path_src)){

            $item->path_src = url('assets/img/tours/'.$item->code.'.jpg');

          }else{

            $item->path_src = url('assets/img/card/default.jpg');

          }   
        @endphp
      
        <div class="carousel-slider-item" data-hash="{{$item->category}}">
          <img src="{{$item->path_src}}" alt="{{$item->name}}"/>
        </div>
      @endforeach

      </div>
</div>
<script>
    $(document).ready(function(){
        $('.owl-carousel').owlCarousel({
        items:2,
        animateOut: 'slideOutDown',
        animateIn: 'flipInX',
        loop:true,
        nav:false,
        dots:false,
        center:true,
        margin:10,
        URLhashListener:true,
        responsiveClass:true,
        autoplayHoverPause:true,
        startPosition: 'URLHash'
    });
});
</script>

@endif