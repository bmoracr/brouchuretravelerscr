<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<div class="body-main" style="margin: 0">

    <div class="body-container col-12">
      <a href="/admin/listusers/" style="margin: 1rem;" ><i class="fas fa-arrow-circle-left" style="color:#ffff; font-size:3rem;"></i></a>
        <div class="container bg-light p-2 mt-4 text-dark rounded ">
            <div class="row p-4">
                <h1 class="title text-dark text-left">New Tour</h1>
                
                @if ($errors->any()) 
                    <div class="alert alert-warning">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if (session('successful'))
                    <div class="alert alert-success">
                        {{ session('successful') }}
                    </div>
                @endif
                <form action="/admin/addusers" method="post">
                    @csrf
                <div class="input-group mb-3 mt-3">
                    <input type="text" name="name" class="form-control" placeholder="Name Lastname" aria-label="Name Lastname" aria-describedby="name-lastname" value="{{ old('name') }}">
                </div>  

                <div class="input-group mb-3">
                    {{-- <span class="input-group-text" id="basic-addon1">#</span> --}}
                    <input type="text" class="form-control" name="username" placeholder="Username" aria-label="Username" aria-describedby="username" value="{{ old('username') }}">
                  </div>

                  <div class="input-group mb-3">
                    {{-- <span class="input-group-text" id="basic-addon1">#</span> --}}
                    <input type="password" class="form-control" name="password" placeholder="Password" aria-label="Password" aria-describedby="password" value="{{ old('password') }}">
                  </div>

                  <div class="input-group mb-3">
                      <input type="text" class="form-control" name="email" placeholder="Email" aria-label="Email" aria-describedby="email" value="{{ old('email') }}">
                      {{-- <span class="input-group-text" id="basic-addon1">@</span> --}}
                  </div>
                  

                  <div class="input-group mb-3">
                    <select class="form-select" name="role" aria-label="Select user role">
                        <option value="Other" selected>Select a role</option>
                        <option value="admin">Admin</option>
                        <option value="transfers">Transfer</option>
                        <option value="other">other</option>
                      </select>
                  </div>
                  
                <div class="form-check form-check-inline mb-3">
                    <input class="form-check-input" name="status" type="checkbox" id="inlineCheckbox2" value="1">
                    <label class="form-check-label" for="inlineCheckbox2">Status</label>
                </div>



                  <div class="input-group justify-content-center">
                    <div class="d-grid gap-2 col-6 mx-auto">
                        <button type="submit" class="btn btn-outline-danger ">SEND USER</button>
                      </div>
                  </div>

                </form>
            </div>
        </div>
    </div>
    
</div>