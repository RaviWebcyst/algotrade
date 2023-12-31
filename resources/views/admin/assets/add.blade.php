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
                  <h4 >Add Asset</h4>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                    <div class="card-body">
                        <form role="form" method="post" action="{{route('admin.store_asset')}}" >
                            @csrf
                          <div class="col-md-6">
                              <div class="form-group">
                                <label>Symbol</label>
                                <select name="symbol" id="" class="form-control">
                                    <option value="" disabled selected>Select Symbol</option>
                                    <option value="XMR" >XMR</option>
                                    <option value="IMX" >IMX</option>
                                    <option value="ETH" >ETH</option>
                                    <option value="ICP" >ICP</option>
                                    <option value="VET" >VET</option>
                                    <option value="UNI" >UNI</option>
                                    <option value="TRX" >TRX</option>
                                    <option value="SHIB" >SHIB</option>
                                    <option value="MATIC" >MATIC</option>
                                    <option value="LTC" >LTC</option>
                                    <option value="HBAR" >HBAR</option>
                                    <option value="GRT" >GRT</option>
                                    <option value="FTM" >FTM</option>
                                    <option value="EOS" >EOS</option>
                                    <option value="EGLD" >EGLD</option>
                                    <option value="DOT" >DOT</option>
                                    <option value="DAI" >DAI</option>
                                    <option value="BCH" >BCH</option>
                                    <option value="AXS" >AXS</option>
                                    <option value="AVAX" >AVAX</option>
                                    <option value="ATOM" >ATOM</option>
                                    <option value="APT">APT</option>
                                </select>
                              </div>
                              {{-- <div class="form-group">
                                <label>Symbol</label>
                                <input type="text" class="form-control" placeholder="Enter Symbol" name="symbol" value="{{$asset!=null ? $asset->symbol:''}}" required>
                              </div> --}}
                              <div class="form-group">
                                <label>Open Time</label>
                                <input type="time" class="form-control" placeholder="Enter open time" name="open_time" value="20:00" required>
                              </div>
                              <div class="form-group">
                                <label>Close Time</label>
                                <input type="time" class="form-control" placeholder="Enter close time" name="close_time" value="20:05" required>
                              </div>
                          
                          <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                      </div>
                </div>
              </div>
        </div>
    </section>
</div>
@endsection