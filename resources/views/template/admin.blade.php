<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<div class="body-main" style="margin: 0">

    <div class="container">
        <div class="bg-light mt-4 rounded">

            @php
                if($role == 'admin'){
                    $title = 'Administrator';
                }elseif($role == 'operations'){
                    $title = 'Operations';
                }else{
                    $title = 'Tranportation';
                }
            @endphp

            <div class="d-flex justify-content-around align-content-center">
                <h1 class="p-4">{{$title}} options</h1>
                <a href="/" class="align-self-center"><i class="fas fa-globe-americas text-dark fs-4"></i></a>
                <a href="/logout" class="align-self-center"><i class="fas fa-sign-out-alt text-dark fs-4"></i></i></a>
            </div>
            
            <ul class="list-group text-center w-100 m-0">

                @if ($role=='operations')

                    <a href="/admin/listusers/" class="text-decoration-none"><li class="list-group-item list-group-item-action d-flex justify-content-start p-4 align-content-center align-self-center w-100 m-0 " > 
                        <span class="w-100 d-flex justify-content-start text-dark" >Users</span> 
                    </li> </a>

                    <a href="/admin/listpost/" class="text-decoration-none"><li class="list-group-item list-group-item-action d-flex justify-content-start p-4 align-content-center align-self-center w-100 m-0 " > 
                        <span class="w-100 d-flex justify-content-start text-dark" >Operations Tours</span> 
                    </li> </a>
                    
                @elseif ($role=='transfers')
                    
                    <a href="/admin/listpostTransfers/" class="text-decoration-none"><li class="list-group-item list-group-item-action d-flex justify-content-start p-4 align-content-center align-self-center w-100 m-0 " > 
                        <span class="w-100 d-flex justify-content-start text-dark" >Transfers</span> 
                    </li></a>   
                    
                @else

                    <a href="/admin/listusers/" class="text-decoration-none"><li class="list-group-item list-group-item-action d-flex justify-content-start p-4 align-content-center align-self-center w-100 m-0 " > 
                        <span class="w-100 d-flex justify-content-start text-dark" >Users</span> 
                    </li> </a>

                    <a href="/admin/listpost/" class="text-decoration-none"><li class="list-group-item list-group-item-action d-flex justify-content-start p-4 align-content-center align-self-center w-100 m-0 " > 
                        <span class="w-100 d-flex justify-content-start text-dark" >Operations Tours</span> 
                    </li> </a>
                    
                    <a href="/admin/listpostTransfers/" class="text-decoration-none"><li class="list-group-item list-group-item-action d-flex justify-content-start p-4 align-content-center align-self-center w-100 m-0 " > 
                        <span class="w-100 d-flex justify-content-start text-dark" >Transfers</span> 
                    </li></a>   
                    
                @endif

                    


            </ul>

        </div>
    </div>
    
</div>