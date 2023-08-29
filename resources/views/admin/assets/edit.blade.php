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
                  <h4>Update Asset</h4>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                    <div class="card-body">
                        <form role="form" method="post" action="{{route('admin.update_asset',$asset->id)}}" >
                            @csrf
                          <div class="col-md-6">
                              <div class="form-group">
                                <label>Symbol</label>
                                <select name="symbol" id="" class="form-control">
                                    <option value="" disabled selected>Select Symbol</option>
                                    <option value="XMR" {{$asset!=null && $asset->symbol == "XMR"? 'selected':''}}>XMR</option>
                                    <option value="IMX" {{$asset!=null && $asset->symbol == "IMX"? 'selected':''}}>IMX</option>
                                    <option value="ETH" {{$asset!=null && $asset->symbol == "ETH"? 'selected':''}}>ETH</option>
                                    <option value="ICP" {{$asset!=null && $asset->symbol == "ICP"? 'selected':''}}>ICP</option>
                                    <option value="VET" {{$asset!=null && $asset->symbol == "VET"? 'selected':''}}>VET</option>
                                    <option value="UNI" {{$asset!=null && $asset->symbol == "UNI"? 'selected':''}}>UNI</option>
                                    <option value="TRX" {{$asset!=null && $asset->symbol == "TRX"? 'selected':''}}>TRX</option>
                                    <option value="SHIB" {{$asset!=null && $asset->symbol == "SHIB"? 'selected':''}}>SHIB</option>
                                    <option value="MATIC" {{$asset!=null && $asset->symbol == "MATIC"? 'selected':''}}>MATIC</option>
                                    <option value="LTC" {{$asset!=null && $asset->symbol == "LTC"? 'selected':''}}>LTC</option>
                                    <option value="HBAR" {{$asset!=null && $asset->symbol == "HBAR"? 'selected':''}}>HBAR</option>
                                    <option value="GRT" {{$asset!=null && $asset->symbol == "GRT"? 'selected':''}}>GRT</option>
                                    <option value="FTM" {{$asset!=null && $asset->symbol == "FTM"? 'selected':''}}>FTM</option>
                                    <option value="EOS" {{$asset!=null && $asset->symbol == "EOS"? 'selected':''}}>EOS</option>
                                    <option value="EGLD" {{$asset!=null && $asset->symbol == "EGLD"? 'selected':''}}>EGLD</option>
                                    <option value="DOT" {{$asset!=null && $asset->symbol == "DAI"? 'selected':''}}>DOT</option>
                                    <option value="DAI" {{$asset!=null && $asset->symbol == "BCH"? 'selected':''}}>DAI</option>
                                    <option value="BCH" {{$asset!=null && $asset->symbol == "BCH"? 'selected':''}}>BCH</option>
                                    <option value="AXS" {{$asset!=null && $asset->symbol == "AXS"? 'selected':''}}>AXS</option>
                                    <option value="AVAX" {{$asset!=null && $asset->symbol == "AVAX"? 'selected':''}}>AVAX</option>
                                    <option value="ATOM" {{$asset!=null && $asset->symbol == "ATOM"? 'selected':''}}>ATOM</option>
                                    <option value="APT" {{$asset!=null && $asset->symbol == "APT"? 'selected':''}}>APT</option>
                                </select>
                              </div>
                              {{-- <div class="form-group">
                                <label>Symbol</label>
                                <input type="text" class="form-control" placeholder="Enter Symbol" name="symbol" value="{{$asset!=null ? $asset->symbol:''}}" required>
                              </div> --}}
                              <div class="form-group">
                                <label>Open Time</label>
                                <input type="time" class="form-control" placeholder="Enter open time" name="open_time" value="{{$asset!=null ? $asset->open_time:''}}" required>
                              </div>
                              <div class="form-group">
                                <label>Close Time</label>
                                <input type="time" class="form-control" placeholder="Enter close time" name="close_time" value="{{$asset!=null ? $asset->close_time:''}}" required>
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