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
                         <h3>Chat</h3>
                        </div>
                         <div class="card-body">
                             <div class="mb-4 p-3 border rounded chat_admin">
                                 @if (!empty($chats))
                                 @foreach ($chats as $chat)
                                 <div class="d-flex flex-row {{$chat->sender =='user' ? 'justify-content-start':'justify-content-end'}}" >
                                       <div class="{{$chat->sender == 'user' ? 'bg-light text-dark' : 'bg-success text-white'}} mt-1 mb-1 rounded p-2" >{{ $chat->message }}</div>
                                         </div>
                                         @endforeach
                                         @endif
                                     </div>
                             <form class="form-validate" action="{{route('admin.sendMessage',$id)}}" method="post" enctype="multipart/form-data">
                                 @csrf
                                 </div>
                                 <div class="form-group row px-3">
                                     <label class="col-lg-3 col-form-label" >Message<span class="text-danger">*</span></label>
                                     <div class="col-lg-12">
                                         <textarea name="message"  rows="3" class="form-control border border-dark"></textarea>
                                     </div>
                                 </div>
                                 <div class="form-group">
                                     <div class="col-12 text-right" >
                                         <button type="submit" class="btn btn-primary">Send Message</button>
                                     </div>
                                 </div>                                  
                             </form>
                         </div>
                </div>
              </div>
        </div>
    </section>
</div>
@endsection