@extends('layouts.app')
   
@section('content')
<div class="content-wrapper">
    <section class="content">
<div class="container">
    {{-- <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Welcome To Admin Dashboard</div>
                
            </div>
        </div>
    </div> --}}
    <div class="row  pt-5">
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">Total Users</div>
                <div class="card-body">
                    <h5>{{$users}}</h5>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">Active Users</div>
                <div class="card-body">
                    <h5>{{$active_users}}</h5>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">Inactive Users</div>
                <div class="card-body">
                    <h5>{{$inactive_users}}</h5>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">Total Deposit</div>
                <div class="card-body">
                    <h5>${{$total_deposit}}</h5>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">Total Withdraw</div>
                <div class="card-body">
                    <h5>${{$total_withdraw}}</h5>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">Level Income</div>
                <div class="card-body">
                    <h5>${{$level_income}}</h5>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">Daily Income</div>
                <div class="card-body">
                    <h5>${{$total_interest}}</h5>
                </div>
            </div>
        </div>
        
    </div>
</div>
    </section>

    <section class="content">
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <h4>Packages</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Amount</th>
                                </tr>
                                @if(!empty($packages))
                                <tbody>
                                    @foreach ($packages as $pack)
                                    <tr>
                                        <td>{{$pack->name}}</td>
                                        <td>${{$pack->amount}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                @endif
                            </thead>
                        </table>
                    </div>

                </div>
            </div>

        </div>
    </section>
</div>
@endsection