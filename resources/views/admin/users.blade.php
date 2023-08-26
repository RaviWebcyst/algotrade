@extends('layouts.app')
   
@section('content')
<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            @if (session('success'))
                <div class="alert alert-success">{{session('success')}}</div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">{{session('error')}}</div>
            @endif
            <div class="card">
                <div class="card-header">
                  <h3 class="card-title ">All Users</h3>
                  <div class="card-tools d-flex mt-1">
                    <form class="form-inline ml-3" action="" method="get">
                        <div class="input-group input-group-sm">
                          <input class="form-control form-control-navbar" type="search" placeholder="Search By Sponser Id"  name="sponser_search">
                          <div class="input-group-append">
                            <button class="btn btn-success" type="submit">
                              <i class="fas fa-search"></i>
                            </button>
                          </div>
                        </div>
                      </form>
                    <form class="form-inline ml-3" action="" method="get">
                        <div class="input-group input-group-sm">
                          <input class="form-control form-control-navbar" type="search" placeholder="Search"  name="search">
                          <div class="input-group-append">
                            <button class="btn btn-success" type="submit">
                              <i class="fas fa-search"></i>
                            </button>
                          </div>
                        </div>
                      </form>
                </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                  <div class="table-responsive">
                  <table class="table ">
                    <thead>
                      <tr>
                        <th >#</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>UID</th>
                        <th>Sponser</th>
                        {{-- <th>Package Activated</th> --}}
                        <th style="min-width:120px;">Date</th>
                        <th style="min-width:330px;">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @if (!empty($users))
                        @foreach ($users as $key=>$user)
                        <tr>
                            <td>{{$users->firstItem()+$key}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->phone}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->showPass}}</td>
                            <td>{{$user->uid}}</td>
                            <td>{{$user->spid}}</td>
                            {{-- <td>{{$user->enable == 1 ? "Yes":"No"}}</td> --}}
                            <td>{{$user->created_at}}</td>
                            <td class="d-flex" >
                                <a href="{{route('admin.editUser',$user->id)}}" class="btn btn-warning btn-sm mr-2">Edit</a>
                                {{-- <a href="{{route('admin.sendBal',$user->id)}}" class="btn btn-info btn-sm mr-2">Send Balance</a> --}}
                                <a href="{{route('admin.sendEpin',$user->id)}}" class="btn btn-secondary btn-sm mr-2">Send Balance</a>
                                <button type="button" class="btn btn-info btn-sm mr-2" onclick="Login({{$user->id}})">Login</button>
                                {{-- @if($user->is_active == 0)
                                <form class="d-flex" method="POST" action="{{route('admin.activate',$user->id)}}">
                                    @csrf
                                    <button type="submit" class="btn btn-success btn-sm mr-2" onclick="return confirm('Are you sure want to Activate');">Activate</button>
                                </form>
                                @endif --}}
                                {{-- <a href="" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure want to delete');">Delete</a> --}}
                            </td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                  </table>
                  {{$users->links()}}
                  </div>
                </div>
              </div>
        </div>
    </section>
</div>
<script>
  function Login(id){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': "{{ csrf_token() }}"
        }
    });
    
    $.ajax({
      url:"{{route('admin.user_login')}}",
      method:"POST",
      data:{
        id:id
      },
      success:function(data){
          if(data.token){
            localStorage.removeItem('token');
            localStorage.setItem('token',data.token);
            // window.location.href = "{{route('user.home')}}";
            window.open("{{route('user.home')}}",'_blank');
          }
      }
    });
  }
  </script>
@endsection