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
                  <h3 class="card-title ">Completed Kyc</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                <div class="table-responsive">
                  <table class="table ">
                    <tr>
                      <th>Sr. No.</th>
                      <th>User</th>
                      <th>Aadhar No.</th>
                      <th>Front Image</th>
                      <th>Back Image</th>
                      <th>Pan No.</th>
                      <th>Pan Image</th>
                      <th>Date & Time</th>
                  </tr>
              </thead>
              <tbody>
                  @if(!empty($history))
                  @foreach($history as $key=>$his)
                  <tr>
                    <td>{{$history->firstItem()+$key}}</td>
                    <td>{{$his->user->name}}({{$his->user->uid}})</td>
                  <td>{{$his->aadhar_no}}</td>
                  <td><img src="{{asset('uploads/'.$his->aadhar_front)}}" width="100"></td>
                  
                  <td><img src="{{asset('uploads/'.$his->aadhar_back)}}" width="100"></td>
                  <td>{{$his->pan_no}}</td>
                  <td><img src="{{asset('uploads/'.$his->pan_image)}}" width="100"></td>
                  <td>{{\Carbon\Carbon::parse($his->updated_at)->format('d/m/Y g:i A')}}</td>
                  </tr>
                  @endforeach
                  @else
                  <tr>
                      <td colspan="7" class="text-center py-3 h5"><b>No Completed Kyc Found</b></td>
                  </tr>
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