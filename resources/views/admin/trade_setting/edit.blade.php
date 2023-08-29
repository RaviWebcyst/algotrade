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
                  <h4>Update Trade Setting</h4>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                    <div class="card-body">
                        <form role="form" method="post" action="{{route('admin.update_trade_setting',$setting->id)}}" >
                            @csrf
                          <div class="col-md-6">
                              <div class="form-group">
                                <label>Symbol</label>
                                <select name="symbol" id="" class="form-control">
                                    <option value="" disabled selected>Select Symbol</option>
                                    <option value="BTC" {{$setting!=null && $setting->symbol == "btcusdt"? 'selected':''}}>BTC</option>
                                    <option value="XMR" {{$setting!=null && $setting->symbol == "xmrusdt"? 'selected':''}}>XMR</option>
                                    <option value="IMX" {{$setting!=null && $setting->symbol == "imxusdt"? 'selected':''}}>IMX</option>
                                    <option value="ETH" {{$setting!=null && $setting->symbol == "ethusdt"? 'selected':''}}>ETH</option>
                                    <option value="ICP" {{$setting!=null && $setting->symbol == "icpusdt"? 'selected':''}}>ICP</option>
                                    <option value="VET" {{$setting!=null && $setting->symbol == "vetusdt"? 'selected':''}}>VET</option>
                                    <option value="UNI" {{$setting!=null && $setting->symbol == "uniusdt"? 'selected':''}}>UNI</option>
                                    <option value="TRX" {{$setting!=null && $setting->symbol == "trxusdt"? 'selected':''}}>TRX</option>
                                    <option value="SHIB" {{$setting!=null && $setting->symbol == "shibusdt"? 'selected':''}}>SHIB</option>
                                    <option value="MATIC" {{$setting!=null && $setting->symbol == "maticusdt"? 'selected':''}}>MATIC</option>
                                    <option value="LTC" {{$setting!=null && $setting->symbol == "ltcusdt"? 'selected':''}}>LTC</option>
                                    <option value="HBAR" {{$setting!=null && $setting->symbol == "hbarusdt"? 'selected':''}}>HBAR</option>
                                    <option value="GRT" {{$setting!=null && $setting->symbol == "grtusdt"? 'selected':''}}>GRT</option>
                                    <option value="FTM" {{$setting!=null && $setting->symbol == "ftmusdt"? 'selected':''}}>FTM</option>
                                    <option value="EOS" {{$setting!=null && $setting->symbol == "eosusdt"? 'selected':''}}>EOS</option>
                                    <option value="EGLD" {{$setting!=null && $setting->symbol == "egldusdt"? 'selected':''}}>EGLD</option>
                                    <option value="DOT" {{$setting!=null && $setting->symbol == "dotusdt"? 'selected':''}}>DOT</option>
                                    <option value="DAI" {{$setting!=null && $setting->symbol == "daiusdt"? 'selected':''}}>DAI</option>
                                    <option value="BCH" {{$setting!=null && $setting->symbol == "bchusdt"? 'selected':''}}>BCH</option>
                                    <option value="AXS" {{$setting!=null && $setting->symbol == "axsusdt"? 'selected':''}}>AXS</option>
                                    <option value="AVAX" {{$setting!=null && $setting->symbol == "avaxusdt"? 'selected':''}}>AVAX</option>
                                    <option value="ATOM" {{$setting!=null && $setting->symbol == "atomusdt"? 'selected':''}}>ATOM</option>
                                    <option value="APT" {{$setting!=null && $setting->symbol == "aptusdt"? 'selected':''}}>APT</option>
                                </select>
                                    @error('symbol')
                                        <small class="text-danger">{{$message}}</small>
                                    @enderror
                              </div>
                              {{-- <div class="form-group">
                                <label>Symbol</label>
                                <input type="text" class="form-control" placeholder="Enter Symbol" name="symbol" value="{{$setting!=null ? $setting->symbol:''}}" required>
                              </div> --}}
                              <div class="form-group">
                                <label>Usable Amount</label>
                                <input type="text" class="form-control" placeholder="Enter usable amount" name="amount" value="{{$setting!=null ? $setting->amount:''}}" required>
                                @error('amount')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                              </div>
                              <div class="form-group">
                                <label>Profit Recieve</label>
                                <input type="text" class="form-control" placeholder="Enter profit recieve" name="profit" value="{{$setting!=null ? $setting->profit:''}}" required>
                                @error('profit')
                                    <small class="text-danger">{{$message}}</small>
                                @enderror
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