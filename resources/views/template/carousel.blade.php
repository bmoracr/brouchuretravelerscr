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
        // animateOut: 'fadeOut', 
        // animateIn: 'flipInX',
        // autoWidth:true,
        pullDrag:true,
        loop:true,
        items:1,
        stagePadding:0,
        margin:30,
        center:true,
        autoplay:true,
        autoplayTimeout:3000,
        autoplayHoverPause:true,
        dots:false,
        smartSpeed:450
        // animateOut: 'fadeOut', 
        // animateIn: 'flipInX',
        // nav:false,
        // margin:10,
        // URLhashListener:true,
        // responsiveClass:true,
        // autoplayHoverPause:true,
        // startPosition: 'URLHash'
    });
});
</script>

@endif