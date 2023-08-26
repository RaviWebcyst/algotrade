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
                  <h3 class="card-title ">Completed Queries</h3>
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