<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<div class="body-main" style="margin: 0">

    <div class="container">
        <div class="bg-light mt-4 rounded">
            <div class="d-flex justify-content-around align-content-center align-self-center w-100">
                <div  class="d-flex justify-content-around align-self-center w-100"><h1 class="p-4 fs-2">Tour List</h1></div>
                <div class="d-flex justify-content-around align-self-center w-50"><a href="/admin" ><i class="fas fa-home text-dark fs-4"></i></a></div>
                <div class="d-flex justify-content-around align-self-center w-50"><a href="/admin/addpost/" ><i class="fas fa-plus-circle text-dark fs-4"></i></a></div>
            </div>
            @if (session('status'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                {{ session('status') }}.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            <ul class="list-group text-center w-100 m-0">
                @foreach ($products as $item)
                
                @php
                        if($item->category == 'Volcanes'){
                            $bg='bg-volcanes'; $txt='text-volcanes';
                        }else if($item->category == 'Naturaleza'){
                            $bg='bg-naturaleza'; $txt='text-naturaleza';
                        }else if($item->category == 'Playa'){
                            $bg='bg-playa'; $txt='text-playa';
                        }else if($item->category == 'Cultural'){
                            $bg='bg-cultural'; $txt='text-cultural';
                        }else{
                            $bg='bg-other'; $txt='text-other';
                        }
                        if($item->status==1){$status='text-success';}else{$status='text-secondary';}
                        if($item->is_special==1){$is_special='text-primary';}else{$is_special='text-secondary';}
                @endphp
                <li class="list-group-item list-group-item-action d-flex justify-content-around p-4 align-content-center align-self-center w-100 m-0 {{$bg}}" > 
                    <span class="w-100 d-flex justify-content-start" >{{$item->name}}</span> 
                    <span class="w-100"><a href="/admin/seepost/{{$item->id}}"><i class="far fa-eye text-dark " style="font-size:1rem;"></i></a></span>
                    <span class="w-100">
                        <a href="/admin/deletepost/{{$item->id}}"><i class="fas fa-trash text-danger " style="font-size:1rem;"></i></a>
                    </span>
                    <span class="w-100">
                        <a href="/admin/isspecialpost/{{$item->id}}/{{$item->is_special}}"><i class="fas fa-history {{$is_special}}" style="font-size:1rem;"></i></a>
                    </span>
                    <span class="w-100">
                        <a href="/admin/statuspost/{{$item->id}}/{{$item->status}}"><i class="fas fa-circle {{$status}} " style="font-size:1rem;"></i></a>
                    </span>
                </li>
                @endforeach
              </ul>
        </div>
    </div>
    
</div>