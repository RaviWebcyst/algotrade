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
                  <h3 class="card-title ">Pending Queries</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                <div class="table-responsive">
                  <table class="table ">
                    <thead>
                        <tr>
                          <th>#</th>
                          <th>User Id</th>
                          <th>Topic</th>
                          <th>Subject</th>
                          <th>Message</th>
                          <th>Status</th>
                          <th>Date</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                          @if (!empty($supports))
                          @foreach ($supports as $key=>$support)

                          <tr>
                              <td>{{$key+1}}</td>
                              <td>{{$support->user_id}}</td>
                              <td>{{$support->topic}}</td>
                              <td>{{$support->subject}}</td>
                              <td>{{$support->message}}</td>
                              <td>{{$support->status}}</td>
                              <td>{{\Carbon\Carbon::parse($support->created_at)->format('d/m/Y g:i:s A')}}</td>    
                              <td>
                                  <a href="{{route('admin.status',$support->id)}}" class="btn btn-sm btn-warning ml-2" onclick="if(confirm('Are You Sure Want to Change Status')){event.preventDefault();document.getElementById('status-form').submit();}">Done</a>
                                  <a href="{{route('admin.chat',$support->id)}}" class="btn btn-sm btn-info">Chat</a>
                              </td>
                              <form id="status-form" action="{{route('admin.status',$support->id)}}" method="POST" style="display: none;">
                                  @csrf
                              </form>
                          </tr>

                          @endforeach
                        @endif
                      </tbody>
                  </table>
                </div>
                  
                </div>
              </div>
        </div>
    </section>
</div>

@endsection