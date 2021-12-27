<div class="body-main" style="margin: 0">
    <div class="body-container">
        <a href="/admin/listusers/" style="margin: 1rem;" ><i class="fas fa-arrow-circle-left" style="color:#ffff; font-size:3rem;"></i></a>
@foreach ($products as $item)
   
    @php
        if($item->status==1){$status='#198754';}else{$status='#6c757d';}
    @endphp
    <div class="post-container  toHide" data-size="{{$item->name}}">

        <div class="users-card-container">
            <div class="post-header">
                <div class="post-header-container">
                    <div class="post-header-item"><strong>USER INFORMATION</strong></div>
                    {{-- <div class="post-header-item" id="post-header-item-name"><strong>{{$item->name}}</strong></div> --}}
                    {{-- <div class="post-header-item"><a href="#">Load more...</a></div> --}}
    
                </div>
            </div>
    
            <div class="post-body-see">
                <table class="post-body-table-see">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{$item->name}}</td>
                            <td>{{$item->username}}</td>
                            <td>{{$item->email}}</td>
                            <td>{{$item->role}}</td>
                            <td><a href="/admin/statususers/{{$item->id}}/{{$item->status}}" style="text-decoration: none;  color:{{$status}};"><i class="fas fa-circle " style="font-size:1rem;"></i></a></td>
                            {{-- <td>{{$item->p_rack}}$</td>
                            <td>{{$item->p_neto}}$</td>
                            <td>{{$item->p_comssion}}$</td> --}}
                        </tr>
                    </tbody>
                </table>
                
            </div>
    
            <div class="post-footer">
                <div class="post-footer-item ">
                    {{-- {{$item->description}} --}}
                </div>
                <div class="post-footer-item">
                    {{-- {{$item->includes}} --}}
                </div>
            </div>
        </div>


    </div>
    
@endforeach
</div>
</div>

