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
                  <h3 class="card-title ">Completed Withdraws</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                <div class="table-responsive">
                  <table class="table ">
                    <thead>
                        <tr>
                            <th>Sr. No.</th>
                            <th>User Id</th>
                            <th>Full Name</th>
                            <th>Address</th>
                            <th>Withdrawal Amount $</th>
                            <th>Fees 20% </th>
                            <th>Payable Amount </th>
                            <th>Submit Date & Time</th>
                           <th>Action Date & Time</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(!empty($with))
                        @foreach($with as $key=>$wd)
                        <tr>
                          <td>{{$key+1}}</td>
                          <td>{{$wd->user_id}}</td>
                        <td>{{$wd->name}}</td>
                        <td>{{$wd->address}}</td>
                        <td>{{$wd->amount}}</td>
                        <td>{{0.2*$wd->amount}}</td>
                        <td>{{$wd->amount-0.2*$wd->amount}}</td>
                        <td>{{\Carbon\Carbon::parse($wd->created_at)->format('d/m/Y g:i:s A')}}</td>
                        <td>{{\Carbon\Carbon::parse($wd->updated_at)->format('d/m/Y g:i:s A')}}</td>
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