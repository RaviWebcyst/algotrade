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
                  <h3 class="card-title ">Pending Kyc's</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                <div class="table-responsive">
                  <table class="table ">
                    <thead>
                        <tr>
                            <th>Sr. No.</th>
                            <th>User</th>
                            <th>Aadhar No.</th>
                            <th>Front Image</th>
                            <th>Back Image</th>
                            <th>Pan No.</th>
                            <th>Pan Image</th>
                            <th>Submit Date & Time</th>
                            <th>Action</th>
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
                        <td>{{\Carbon\Carbon::parse($his->created_at)->format('d/m/Y g:i A')}}</td>
                        <td>
                            <form method="POST" action="{{route('admin.accept_kyc',$his->id)}}">
                              @csrf
                                <button type="submit" class="btn btn-success" onclick="return confirm('Are You sure want to accept request');">Accept</button>
                            </form>
                            <button type="button" id="reject"  data-target="#rejectModal"  data-toggle="modal" class="btn btn-danger reject" onclick="reject({{$his->id}})">Reject</button>
                        </td>
                        </tr>
                        @endforeach
                        @else
                        <tr>
                            <td colspan="7" class="text-center py-3 h5"><b>No Withdrawal Found</b></td>
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
<div class="modal fade" id="rejectModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Reject Payment</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
  
        </div>
        <div class="modal-body">
            <form  method="POST" action="{{route('admin.reject_kyc')}}">
                @csrf
                <input type="hidden" id="kyc_id" name="id" >
                <div class="form-group">
                    <label>Enter Reason</label>
                    <textarea class="form-control" name="description" rows="3" placeholder="Enter Reject Reason" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary my-2">Submit</button>
                
            </form>
        </div>
       
      </div>
    </div>
  </div>
<script>
    function reject(id){
        document.getElementById('kyc_id').value = id;
    }
</script>
@endsection