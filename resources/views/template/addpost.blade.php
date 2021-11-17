<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<div class="body-main" style="margin: 0">

    <div class="body-container col-12">
      <a href="/admin/listpost/"  style="margin: 1rem;" ><i class="fas fa-arrow-circle-left" style="color:#ffff; font-size:3rem;"></i></a>
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
                <form action="/admin/addpost" method="post" enctype="multipart/form-data">
                    @csrf
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">#</span>
                    <input type="text" class="form-control" name="code" placeholder="Code" aria-label="Code" aria-describedby="code" value="{{ old('code') }}">
                  </div>
                  
                  <div class="input-group mb-3">
                    <input type="text" name="name" class="form-control" placeholder="Tour name" aria-label="Tour name" aria-describedby="tour-name" value="{{ old('name') }}">
                  </div>
                  <div class="input-group mb-3">
                    <select class="form-select" name="category" aria-label="Default select example">
                        <option value="Other" selected>Select a Category</option>
                        <option value="Volcanes">Volcanes</option>
                        <option value="Playa">Playa</option>
                        <option value="Naturaleza">Naturaleza</option>
                        <option value="Cultural">Cultural</option>
                        <option value="Other">Other</option>
                      </select>
                  </div>
                  
                  <div class="input-group mb-3">
                    <span class="input-group-text">Rack: $</span>
                    <input type="text" name="p_rack" class="form-control" aria-label="Amount (to the nearest dollar)" value="{{ old('p_rack') }}">
                    <span class="input-group-text">.00</span>
                    
                  </div>

                  <div class="input-group mb-3">
                    <span class="input-group-text">Neto: $</span>
                    <input type="text" name="p_neto" class="form-control" aria-label="Amount (to the nearest dollar)" value="{{ old('p_neto') }}">
                    <span class="input-group-text">.00</span>
                  </div>

                  <div class="input-group mb-3">
                    <span class="input-group-text">Comission: $</span>
                    <input type="text" name="p_comssion" class="form-control" aria-label="Amount (to the nearest dollar)" value="{{ old('p_comssion') }}">
                    <span class="input-group-text">.00</span>
                  </div>

                  <div class="input-group mb-3">
                    <input type="text" name="includes" class="form-control" placeholder="E.g ( Tikets, Lunch, Breakfast,...)" aria-label="Code" aria-describedby="code" value="{{ old('includes') }}">
                  </div>
                  
                  <div class="input-group mb-3">
                    <span class="input-group-text">Description</span>
                    <textarea class="form-control" name="description" aria-label="With textarea">{{ old('description') }}</textarea>
                  </div>

                  <div class="mb-3">
                      <label for="formFile" class="form-label align-self-end">Select just to skip image</label>
                      <input class="form-check-input" name="not_img" type="checkbox" id="inlineCheckbox1" value="1">
                    <input class="form-control" name="img" type="file" >
                  </div>

                  <div class="form-check form-check-inline">
                    <input class="form-check-input" name="is_special" type="checkbox" id="inlineCheckbox1" value="1">
                    <label class="form-check-label" for="inlineCheckbox1">Seasonal Tour?</label>
                </div>
                <div class="form-check form-check-inline mb-3">
                    <input class="form-check-input" name="status" type="checkbox" id="inlineCheckbox2" value="1">
                    <label class="form-check-label" for="inlineCheckbox2">Status</label>
                </div>



                  <div class="input-group justify-content-center">
                    <div class="d-grid gap-2 col-6 mx-auto">
                        <button type="submit" class="btn btn-outline-danger ">SEND TOUR</button>
                      </div>
                  </div>

                </form>
            </div>
        </div>
    </div>
    
</div>