<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\wallet;
use App\post;
use App\daily_asset;
use App\price;
use App\support;
use App\chat;
use App\callback;
use App\trade_setting;
use App\top_coin;
use App\payment;
use App\level_income;
use App\downline;
use App\trade;
use App\upi;
use App\kyc;
use App\withdraw;
use App\package;
use App\bonus_income;
use App\stock_rate;
use App\pack_active;
use Auth;
use  Carbon\Carbon;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Facades\JWTFactory;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Tymon\JWTAuth\JWTManager as JWT;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use ElephantIO\Client;
use Illuminate\Support\Facades\DB;



class usersController extends Controller
{
    public function users(Request $request) {
        $users = User::where("is_admin", "!=", 1)->orderBy("id", "desc")->paginate();
        if ($request->sponser_search) {
            $users = User::where("is_admin", "!=", 1)->where(function ($q) use ($request) {
                        $q->where("spid", "like", "%" . $request->sponser_search . "%");
                    })->paginate();
            $users->appends(["sponser_search" => $request->sponser_search]);
        }
        if ($request->search) {
            $users = User::where("is_admin", "!=", 1)->where(function ($q) use ($request) {
                        $q->where("name", "like", "%" . $request->search . "%")->orWhere("phone", "like", "%" . $request->search . "%")->orWhere("email", "like", "%" . $request->search . "%")->orWhere("uid", "like", "%" . $request->search . "%")->orWhere("spid", "like", "%" . $request->search . "%");
                    })->paginate();
            $users->appends(["search" => $request->search]);
        }
       
        return view("admin.users", compact('users'));
    }

    public function activeUsers(Request $request) {
        $users = User::where("is_admin", "!=", 1)->where("enable", 1)->orderBy("id", "desc")->paginate();
        if ($request->sponser_search) {
            $users = User::where("is_admin", "!=", 1)->where("is_active", 1)->where(function ($q) use ($request) {
                        $q->where("spid", "like", "%" . $request->sponser_search . "%");
                    })->paginate();
            $users->appends(["sponser_search" => $request->sponser_search]);
        }
        if ($request->search) {
            $users = User::where("is_admin", "!=", 1)->where("is_active", 1)->where(function ($q) use ($request) {
                        $q->where("name", "like", "%" . $request->search . "%")->orWhere("phone", "like", "%" . $request->search . "%")->orWhere("email", "like", "%" . $request->search . "%")->orWhere("uid", "like", "%" . $request->search . "%")->orWhere("spid", "like", "%" . $request->search . "%");
                    })->paginate();
            $users->appends(["search" => $request->search]);
        }
       
        return view("admin.activeUsers", compact('users'));
    }

    public function sendusdt(Request $request, $id) {
        return view("admin.sendusdt", compact('id'));
    }


    //send usdt balance to user by admin
    public function postusdt(Request $request, $id) {
        $user = User::where("id", $id)->first();

        $wallet = wallet::create([
            "amount" => $request->amount,
            "user_id" => $user->id,
            "remarks" => $request->desc,
            "userId" => $id,
            "wallet_type" => "usdt",
            "description" => "Send Admin to user",
            "from"=>"admin",
            "type"=>"credit",
            "transaction_type"=>'deposit'
        ]);
       


        // if($wallet->wasRecentlyCreated){
        //     return redirect()->route("admin.users")->with("success", "balance send successfully");
        // }
        return redirect()->route("admin.users")->with("success", "balance send successfully");
    }

    public function editUser($id) {
        $user = User::findOrFail($id);
        return view("admin.userEdit", compact('user'));
    }

    public function updateUser($id, Request $request) {
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;


        if ($request->password != "") {
            $user->password = Hash::make($request->password);
            $user->showPass = $request->password;
        }
        $user->save();

        return redirect()->route("admin.users")->with("success", "user updated successfully");
    }


    
    public function level_income(){
        $records = wallet::where("transaction_type","level_income")->orderBy("id","desc")->paginate(50);
        $records->map(function($data){
            $user= User::where("id",$data->userId)->first();
            $data->email = $user->email;
            return $data;
        });
        return view('admin.level_incomes',compact('records'));
    }
    public function direct_income(){
        $records = wallet::where("transaction_type","direct_income")->orderBy("id","desc")->paginate(50);
        $records->map(function($data){
            $user= User::where("id",$data->userId)->first();
            $data->email = $user->email;
            return $data;
        });
        return view('admin.direct_incomes',compact('records'));
    }
    public function daily_income(){
        $records = wallet::where("transaction_type","roi")->orderBy("id","desc")->paginate(50);
        $records->map(function($data){
            $user= User::where("id",$data->userId)->first();
            $data->email = $user->email;
            return $data;
        });
        return view('admin.daily_incomes',compact('records'));
    }
    public function compound_incomes(){
        $records = wallet::where("transaction_type","compound_income")->orderBy("id","desc")->paginate(50);
        $records->map(function($data){
            $user= User::where("id",$data->userId)->first();
            $data->uid = $user->uid;
            return $data;
        });
        return view('admin.compound_incomes',compact('records'));
    }
    public function all_transactions(){
        $records = wallet::orderBy("id","desc")->paginate(50);
        $records->map(function($data){
            $user= User::where("id",$data->userId)->first();
            $data->email = $user->email;
            return $data;
        });
        return view('admin.transactions',compact('records'));
    }

   
    public function assets(){
        $assets = daily_asset::orderBy("id",'desc')->paginate(50);
        return view('admin.assets.index',compact('assets'));
    }
    public function add_asset(){
        return view('admin.assets.add');
    }
    public function store_asset(Request $request){
        $request->validate([
            'symbol' => 'required',
            'open_time' => 'required',
            'close_time' => 'required',
        ]);

        $asset = new daily_asset();
        $asset->symbol = $request->symbol;
        $asset->open_time = $request->open_time;
        $asset->close_time = $request->close_time;
        $asset->save();

        daily_asset::where("id","!=",$asset->id)->update([
            "expire"=>1
        ]);
        

        return redirect()->route('admin.assets')->with('success',"Asset Add successfully");

    }
    public function edit_asset($id){
        $asset = daily_asset::findOrFail($id);
        return view('admin.assets.edit',compact('asset'));
    }
    public function update_asset(Request $request ,$id){
        $request->validate([
            'symbol' => 'required',
            'open_time' => 'required',
            'close_time' => 'required',
        ]);

        $asset =  daily_asset::findOrFail($id);
        $asset->symbol = $request->symbol;
        $asset->open_time = $request->open_time;
        $asset->close_time = $request->close_time;
        $asset->save();
        

        return redirect()->route('admin.assets')->with('success',"Asset Update successfully");
    }

    public function delete_asset($id){
        $asset = daily_asset::findOrFail($id);
        $asset->delete();
        return redirect()->back()->with('success',"Asset Deleted Successfully");
    }


    //api's

   
    public function resolvedTickets(){
        $user = JWTAuth::parseToken()->authenticate();
        $supports= support::where("user_id",$user->uid)->where("status","resolved")->orderBy("id","desc")->get();
        return response()->json($supports);
    }

    public function recentTickets(){
        $user = JWTAuth::parseToken()->authenticate();
       $supports= support::where("user_id",$user->uid)->where("status","pending")->orderBy("id","desc")->get();
       return response()->json($supports);
    }

    public function sendMsg(Request $request){
        //get logged in user
        $user = JWTAuth::parseToken()->authenticate();

        $support = new support();
        $support->topic = $request->topic;
        $support->email = $request->email;
        $support->subject = $request->subject;
        $support->message = $request->message;
        $support->status = "pending";
        $support->user_id = $user->uid;
        if($request->hasFile('image')){
            $file = $request->image;
            $filename  = uniqid()."_".$file->getClientOriginalName();
            $file->move(public_path("uploads"),$filename);
            $support->image = $filename;
        }
        $support->save();

        $chat = new chat();
        $chat->support_id = $support->id;
        $chat->user_id = $user->uid;
        $chat->sender = "user";
        $chat->reciever = "admin";
        $chat->message = $request->message;
        $chat->save();

        return response()->json(["message"=>"Message sent successfully"],200);

   }

   public function chat(Request $request){
    $user = JWTAuth::parseToken()->authenticate();
    $chat = new chat();
    $chat->support_id = $request->id;
    $chat->user_id = $user->uid;
    $chat->sender = "user";
    $chat->reciever = "admin";
    $chat->message = $request->message;
    $chat->save();

    return response()->json(["message"=>"Message sent successfully"],200);

}

public function recentChat(Request $request){
    $chats = chat::where("support_id",$request->id)->get();
    return response()->json($chats);
}


    public function transactions(Request $request){
        $user = JWTAuth::parseToken()->authenticate();
        $wallets = wallet::where("userId",$user->id)->when($request->type,function($q) use($request){
            $q->where("wallet_type",$request->type);
        })
        ->when($request->trans,function($q) use($request){
            $q->where("transaction_type",$request->trans);
        })
        ->orderBy("id","desc")->paginate(50);
        return response()->json(compact('wallets'));
    }

    public function node_profits(Request $request){
        $user = JWTAuth::parseToken()->authenticate();
        $wallets = wallet::where("userId",$user->id)->where("transaction_type","roi")->orderBy("id","desc")->paginate(50);
        return response()->json(compact('wallets'));
    }

    public function walletBalance(Request $request){
        $validator = Validator::make($request->all(), [
            'token' => 'required',
            'wallet_type' => 'required',
        ]);



        if($validator->fails()){
            return response()->json(['message'=>$validator->messages()],500);
          }

        $user = JWTAuth::parseToken()->authenticate();
        $balance = $this->getBalance($user->id,$request->wallet_type);
        return response()->json($balance);
    }

    public function userDetails(Request $request){
        try{
            if(!$user = JWTAuth::parseToken()->authenticate()){
                return response()->json(['user_not_found'], 400);
            }
        }catch (TokenExpiredException $e){
            return response()->json(['token_expired']);
        }catch (TokenInvalidException $e){
            return response()->json(['token_invalid']);
        }catch (JWTException $e){
            return response()->json(['token_absent']);
        }
        $balance = $this->getBalance($user->id,"usdt");
        $trade_balance = $this->getBalance($user->id,"trade");

        $usdt = pack_active::where("expire",0)->where("user_id",$user->id)->sum('amount');


        // $balance = round($total_balance - $user->package_amount,2);
       
        $profit_balance = $this->getBalance($user->id,"usd");
       
        $payout = $this->getBalance($user->id,"payout");


        $interest = wallet::where("userId",$user->id)->where("transaction_type","roi")->sum('amount');
        $interest  = round($interest,3);

        $direct_income = wallet::where("userId",$user->id)->where("transaction_type","direct_income")->sum('amount');
        $level_income = wallet::where("userId",$user->id)->where("transaction_type","level_income")->sum('amount');
        $commission = round($direct_income+$level_income,4);

        $total_refers = User::where("spid",$user->uid)->count();
        $active_refers = User::where("spid",$user->uid)->where("enable",1)->count();
        $total_team = downline::where("tagsp",$user->uid)->count();
        $total_invests = wallet::where("userId",$user->id)->where("transaction_type","invest")->sum('amount');
        $direct_income = wallet::where("userId",$user->id)->where("transaction_type","direct_income")->sum('amount');
        $level_income = wallet::where("userId",$user->id)->where("transaction_type","level_income")->sum('amount');
        $compound_income = wallet::where("userId",$user->id)->where("transaction_type","compound_income")->sum('amount');
        
        $direct_business = User::where('spid',$user->uid)->sum('total_business');
        $team_business = downline::where("tagsp",$user->uid)->sum('business');

        $notifies = daily_asset::where("expire",0)->count();
       

        $kyc = kyc::where("user_id",$user->id)->select("status",'user_id')->latest()->first();

        return response()->json(compact('user','balance','interest','commission','profit_balance','total_refers','active_refers','total_team','total_invests','direct_income',"level_income",'kyc','payout','direct_business','team_business','compound_income','trade_balance','usdt','notifies'));
    }


    public function node_balances(Request $request){
        $user = JWTAuth::parseToken()->authenticate();

        $n1_bal = $this->getBalance($user->id,"node_1");
        $n2_bal = $this->getBalance($user->id,"node_2");
        $n3_bal = $this->getBalance($user->id,"node_3");
        $n4_bal = $this->getBalance($user->id,"node_4");
        $n5_bal = $this->getBalance($user->id,"node_5");
        $n6_bal = $this->getBalance($user->id,"node_6");
        $n7_bal = $this->getBalance($user->id,"node_7");

        $total =  $n1_bal+ $n2_bal + $n3_bal+$n4_bal+$n5_bal+$n6_bal+$n7_bal;


        return response()->json(compact('n1_bal','n2_bal','n3_bal','n4_bal','n5_bal','n6_bal','n7_bal','total'));
    }

    public function paySwap_history(){
        $user = JWTAuth::parseToken()->authenticate();
        $history = wallet::where("userId",$user->id)->where("transaction_type","swap_payout")->where("type","debit")->orderBy("id","desc")->paginate(50);
        return response()->json(compact('history'));
    }

   

    public function userlogin(Request $request){
  
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required',
        ]);

        if($validator->fails()){
            return response()->json(['message'=>$validator->messages()],500);
          }

          $user = User::where("email",$request->email)->orWhere("uid",$request->email)->first();
          if($user == null){
              return response()->json(['message'=>'Invalid User'], 500);
              exit;
          }
          $credentials= [
            "email"=>$user->email,
            "password"=>$request->password,
          ];
        //     if($user->is_enabled == 0){
        //       return response()->json(["message"=>"Permission Denied!"],500);
        //       exit;
        //   }
  
          if($user->email == "admin@gmail.com"){
              return response()->json(['message'=>'Invalid User'], 500);
              exit;
          }
          try {
              if(! $token = JWTAuth::attempt($credentials)){
                      return response()->json(['message'=>'Invalid Credentials'], 500);
              }
          }catch (JWTException $e){
              return response()->json(['message'=>'could_not_create_token'], 500);
          }

        //   if($user->logged_in == 1){
        //         return response()->json(["message"=>"User already logged in another device"],500);
        //         exit;
        //   }

        //   User::where("email",$user->email)->where("showPass",$request->password)->update([
        //     "logged_in"=>1
        //   ]);
  
          return response()->json(compact('token'));

    }

    public function user_login(Request $request){
        $validator = Validator::make($request->all(), [
            'id' => 'required',
        ]);

        if($validator->fails()){
            return response()->json(['message'=>$validator->messages()],500);
        }

          $user = User::where("id",$request->id)->first();
          if($user == null){
              return response()->json(['message'=>'Invalid User'], 500);
              exit;
          }
          $credentials= [
            "email"=>$user->email,
            "password"=>$user->showPass,
          ];
     
  
          if($user->email == "admin@gmail.com"){
              return response()->json(['message'=>'Invalid User'], 500);
              exit;
          }
          try {
              if(! $token = JWTAuth::attempt($credentials)){
                      return response()->json(['message'=>'Invalid Credentials'], 500);
              }
          }catch (JWTException $e){
              return response()->json(['message'=>'could_not_create_token'], 500);
          }

  
          return response()->json(compact('token'));

    }

    

    public function test(){
        $api = new \Binance\API('JFc221YtQHXGrzeJTdrBe0Xrw0ULpf3gFpTUoPWzgs780rXAPeTmRHaLbLqm4HCf','RHrJOe7l22egFved2tyoT2EJ0a2yiqh2LmBDP2DhoiIxFrgsefarfuX7QRp4TKa0');    
        $api->useServerTime();
        $ticker = $api->prices();
        dd($ticker);

    }

    protected function getBalance($user_id,$wallet_type){
        $credit = wallet::where("userId",$user_id)->where("wallet_type",$wallet_type)->where("type","credit")->sum('amount');
        $debit = wallet::where("userId",$user_id)->where("wallet_type",$wallet_type)->where("type","debit")->sum('amount');

        $balance = round($credit - $debit,2);
        return $balance;
    }

    public function getSponser(Request $request){
        $user = User::where("uid",$request->spid)->first();
        if($user == null){
            return response()->json(["error"=>"Invalid Sponser Id"],500);
            exit;
        }
        return response()->json(["sp_name"=>$user->name],200);
    }

    public function user_kyc(Request $request){
       
        $validator = Validator::make($request->all(), [
            'aadhar' => 'required',
            'pan' => 'required',
            'aadhar_front' => 'required',
            'aadhar_back' => 'required',
            'pan_image' => 'required',
            'token' => 'required',
        ]);

        if($validator->fails()){
            return response()->json(['message'=>$validator->messages()],500);
        }

        $user = JWTAuth::parseToken()->authenticate();

        $check_duplicate = kyc::where("aadhar_no",$request->aadhar)->orWhere("pan_no",$request->pan_no)->count();

        if($check_duplicate){
            return response()->json(["message"=>"Aadhar or pan already in use, please use valid id"],500);
            exit;
        }
        
        $exist = kyc::where('user_id',$user->id)->where("status","pending")->count();
        if($exist > 0){
            return response()->json(["message"=>"your kyc is pending"],500);
            exit;
        }

        if(!$request->hasFile('aadhar_front') ){
            return response()->json(["message"=>"Invalid aadhar front image type"],500);
            exit;
        }
        if(!$request->hasFile('aadhar_back') ){
            return response()->json(["message"=>"Invalid aadhar back image type"],500);
            exit;
        }
        if(!$request->hasFile('pan_image') ){
            return response()->json(["message"=>"Invalid pan image type"],500);
            exit;
        }

        $kyc_aadhar_front = $request->aadhar_front;
        $front_image = uniqid().$kyc_aadhar_front->getClientOriginalName();
        $kyc_aadhar_front->move(public_path("uploads"),$front_image);
       
        $kyc_aadhar_back = $request->aadhar_back;
        $back_image = uniqid().$kyc_aadhar_back->getClientOriginalName();
        $kyc_aadhar_back->move(public_path("uploads"),$back_image);

        $kyc_pan = $request->pan_image;
        $pan_image = uniqid().$kyc_pan->getClientOriginalName();
        $kyc_pan->move(public_path("uploads"),$pan_image);

        $kyc = new kyc();
        $kyc->user_id = $user->id;
        $kyc->aadhar_no = $request->aadhar;
        $kyc->aadhar_front = $front_image;
        $kyc->aadhar_back = $back_image;
        $kyc->pan_no = $request->pan;
        $kyc->pan_image = $pan_image;
        $kyc->save();

        return response()->json(["message"=>"Kyc request sent to admin"],200);

        
    }

    public function payment(Request $request){
        $validator = Validator::make($request->all(), [
            'image' => 'required',
            'amount' => 'required',
            'upi' => 'required',
            'token' => 'required',
        ]);

        if($validator->fails()){
            return response()->json(['message'=>$validator->messages()],500);
          }

          if($request->amount < 100){
            return response()->json(["message"=>"Minimum Recharge Amount 100"],500);
            exit;
          }

        $user = JWTAuth::parseToken()->authenticate();
        
        if(!$request->hasFile('image')){
            return response()->json(["error"=>"Please Choose Valid Image"],500);
            exit;
        }

        $file = $request->image;
        $filename = uniqid() . '_' .$file->getClientOriginalName();
        $file->move(public_path("payments"),$filename);
        
        $payment = new payment();
        $payment->user_id = $user->id;
        $payment->amount = $request->amount;
        $payment->upi_id = $request->upi;
        $payment->image = $filename;
        $payment->save();
        

        return response()->json(["message"=>"Deposit Request Sent to admin"],200);
      
    }



    public function getPayments(Request $request){
        $user = JWTAuth::parseToken()->authenticate();

        $payments  = payment::where("user_id",$user->id)->orderBy("id","desc")->paginate();
        return response()->json(compact('payments'));
        
    }

    public function deposit_history(Request $request){
        $user = JWTAuth::parseToken()->authenticate();
        $history = wallet::where("userId",$user->id)->where("transaction_type","deposit")->orderBy("id","desc")->paginate(50);
        return response()->json(compact('history'));
    }

    public function payment_history(Request $request){
        $user = JWTAuth::parseToken()->authenticate();
        $history = payment::where("user_id",$user->id)->orderBy("id","desc")->paginate(50);
        return response()->json(compact('history'));
    }

    //user payments to admin

    public function accept_payment(Request $request){
            
        if (Auth::user()->is_admin == 1) {
            $request->validate([
                'id' => 'required'
            ]);

            
            $payment = payment::findOrFail($request->id);
            $payment->status = "Confirmed";
            $payment->save();
            
            $user = User::where("id",$payment->user_id)->first();
            
            // $exist = wallet::where("from",$user->uid)->where("transaction_type","bonus_income")->first();

           
            // payment::where("id",$request->id)->update([
            //     "status"=>"Confirmed"
            // ]);
            
            $wallet = new wallet();
            $wallet->user_id = $user->uid;
            $wallet->userId = $user->id;
            $wallet->amount = $payment->amount;
            $wallet->from = "deposit";
            $wallet->transaction_type = "deposit";
            $wallet->wallet_type = "usdt";
            $wallet->type="credit";
            $wallet->description ="credit ".$request->amount. "from deposit";;
            $wallet->save();

            
                $loop = false;
                $spnser = $user->spid;
                $spnser_uid = $user->uid;
                $levelloop = 1;
                $usid = '';

            //     if($spnser != 'admin' && $spnser != ''){
            //         $income = level_income::first();
            //         $levelcommision1 = $income->percentage;
            //         $levelcommision = $payment->amount / 100 * $levelcommision1;

            //         $type = 'direct_income';
            //         $desc = "Direct income (".$levelcommision1."%) received from $spnser_uid on recharge";
            //         $sponserget = User::where('uid',$spnser)->first();
            //         if ($levelcommision > 0) {
            //             $wallet = new wallet();
            //             $wallet->user_id = $sponserget->uid;
            //             $wallet->userId = $sponserget->id;
            //             $wallet->amount = $levelcommision;
            //             $wallet->from = $spnser_uid;
            //             $wallet->transaction_type = $type;
            //             $wallet->level = 1;
            //             $wallet->wallet_type = "usdt";
            //             $wallet->type="credit";
            //             $wallet->description = $desc;
            //             $wallet->save();
            //         }
                  
            //   }

          //$direct_income = (8/100)*$package->amount;

        //   while ($loop == false) {
              
        //         $count = bonus_income::where("level",$levelloop)->count();
        //         $income = bonus_income::where("level",$levelloop)->first();
              
              
        //       if ($spnser === 'admin' || $spnser == '' || $count < 1 || $levelloop >3  ) {
        //           $loop = true;
        //           break;
        //           exit;
        //       }

        //       $levelcommision1 = $income->percentage;

        //       $levelcommision = $payment->amount / 100 * $levelcommision1;
              
        //       $type = 'bonus_income';
        //       $desc = "Recharge Bonus Level ". $levelloop." income ($levelcommision1%) received from $spnser_uid";
            
             
        //       $sponserget = User::where('uid',$spnser)->first();

             
        //       if ($levelcommision > 0) {
        //           $wallet = new wallet();
        //           $wallet->user_id = $sponserget->uid;
        //           $wallet->userId = $sponserget->id;
        //           $wallet->amount = $levelcommision;
        //           $wallet->from = $spnser_uid;
        //           $wallet->transaction_type = $type;
        //           $wallet->level = $levelloop;
        //           $wallet->wallet_type = "usdt";
        //           $wallet->type="credit";
        //           $wallet->description = $desc;
        //           $wallet->save();
        //       }

        //       $spnser = $sponserget->spid;
        //       $levelloop++;
        //   }

            }

            // $version = Client::CLIENT_4X;
            // $url = 'ws://127.0.0.1:4000';

            // $client = new Client(Client::engine($version, $url));
            // $client->initialize();
            // $data = [
            //     'user_id'=>$wallet->user_id,
            //     "message"=>'payment accepted'
            // ];
            // $client->emit("payments", ['messages' =>$data ]);


            return redirect()->back()->with("success","Request Accepted!");
            
        
        
    }
    public function reject_payment(Request $request){
             $request->validate([
                'id' => 'required'
            ]);
            
            payment::where("id",$request->id)->update([
                "status"=>"Rejected",
                "remarks"=>$request->remarks
            ]);
         

            return redirect()->back()->with("success","Request Rejected!");
    }
    


    //admin functions


    public function admin_login(){
        return view('auth.login');
    }
    
    public function pending_payments(){
                $payments = payment::where("status","Pending")->orderBy("id","desc")->paginate(50);
                $payments->map(function($data){
                    $data->user = User::where("id",$data->user_id)->first();
                    return $data;
                });
         
        
     
        return view('admin.pending_payments',compact('payments'));
    }
    
    
    public function completed_payments(){
         
             $payments = payment::where("status","Confirmed")->orderBy("id","desc")->paginate(50);
                $payments->map(function($data){
                    $data->user = User::where("id",$data->user_id)->first();
                    return $data;
                });
                
         
        
        return view('admin.completed_payments',compact('payments'));
    }
    public function rejected_payments(){
        
               $payments = payment::where("status","Rejected")->orderBy("id","desc")->paginate(50);
                $payments->map(function($data){
                    $data->user = User::where("id",$data->user_id)->first();
                    return $data;
                });
        
      
        return view('admin.rejected_payments',compact('payments'));
    }

    

    public function team_list(Request $request){
        $user = JWTAuth::parseToken()->authenticate();
        $teams = downline::where("tagsp",$user->uid)->when($request->level && $request->level != "",function($q) use($request){
            $q->where("level",$request->level);
        })->orderBy("level")->paginate(50);
        $teams->map(function($data){
            $user = User::where("uid",$data->user_id)->select("name","uid","package_amount")->first();
            $data->name = $user->name;
            $data->package_amount = $user->package_amount;
            return $data;
        });

        return response()->json(compact('teams'));
    }





    public function updateProfile(Request $request){
        $validator = Validator::make($request->all(), [
            'token' => 'required',
            'password' => 'required',
            'confirm_password' => 'required',
            'old_password' => 'required',
        ]);
        $user = JWTAuth::parseToken()->authenticate();

        if($validator->fails()){
            return response()->json(['message'=>$validator->messages()],500);
            exit;
      }
      
      if($user->showPass != $request->old_password){
          return response()->json(['message'=>"Old Password is Wrong"],500);
            exit;
      }
      if($request->password != $request->confirm_password){
          return response()->json(['message'=>"Password not match"],500);
        exit;
      }
      
      $user = User::where("id",$user->id)->update([
          "showPass"=>$request->password,
          "password" => Hash::make($request->password)
      ]);
       return response()->json(["message"=>"Profile Updated successfully"],200);
    }


   


    public function userLogout(Request $request){
        $user = JWTAuth::parseToken()->authenticate();
        User::where("id",$user->id)->update(
            ["logged_in"=>0]
        );
        return response("user logout");
    }

    public function cash_payments(Request $request){
        $user = JWTAuth::parseToken()->authenticate();
        $payments = wallet::where("userId",$user->id)->where("transaction_type","roi")->paginate(50);
        return response()->json(compact('payments'));
    }

  
   

    public function direct_list(Request $request){
        $user = JWTAuth::parseToken()->authenticate();
        $users = User::where("spid",$user->uid)->where("uid","!=","admin")->orderBy("id","desc")->paginate(50);
      
        return response()->json(compact('users'));
    }

    public function withdraw(Request $request){
        $validator = Validator::make($request->all(), [
            'address' => 'required',
            'type' => 'required',
            'token' => 'required',
            'amount' => 'required',
            'password' => 'required',
        ]);

        if($validator->fails()){
            return response()->json(['message'=>$validator->messages()],500);
            exit;
        }
        
        $startTime = '07:00:00';
        $endTime = '09:00:00';

        $currentDateTime = Carbon::now();

        $currentTime = $currentDateTime->toTimeString();

        if($currentTime < $startTime ||  $currentTime > $endTime){
            return response()->json(["message"=>"withdrawal will active in between 7am - 9am "],500);
            exit;
        }
        

        $user = JWTAuth::parseToken()->authenticate();
        if($user->verified == 0){
            return response()->json(["message"=>"Please complete your kyc for withdraw "],500);
            exit;
        }

        if($request->amount < 10){
            return response()->json(["message"=>"Minimum withdrawal amount 10 "],500);
            exit;
        }
        $balance = $this->getBalance($user->id,"payout");

        // $balance = $total_balance - (int)$user->package_amount;


        
        if($request->amount > $balance ){
            return response()->json(["message"=>"Not enough amount for withdrawal "],500);
            exit;
        }
        if($request->password  != $user->showPass){
            return response()->json(["message"=>"Invalid Password "],500);
            exit;
        }
        

        // $user =  User::findOrFail($user->id);
        // $user->bank_name = $request->bank;
        // $user->bank_user_name = $request->user_name;
        // $user->ifsc_code = $request->ifsc_code;
        // $user->phone = $request->phone;
        // $user->account_no = $request->account_no;
        // $user->save();
        
        $wallet = new wallet();
        $wallet->user_id = $user->uid;
        $wallet->userId = $user->id;
        $wallet->amount = $request->amount;
        $wallet->transaction_type = "withdraw";
        $wallet->wallet_type = "payout";
        $wallet->type="debit";
        $wallet->description ="Withdraw request by name:- ".$user->name." user_id:- ".$user->uid;
        $wallet->save();

        $admin_fee = 0.2* $request->amount;
        // $amount = $request->amount - $admin_fee;

        $with = new withdraw();
        $with->user_id  = $user->uid;
        $with->userId = $user->id;
        $with->amount = $request->amount;
        $with->admin_fee = $admin_fee;
        $with->total = $request->amount;
        $with->address = $request->address;
        $with->wallet_type = "payout";
        $with->type = $request->type;
        $with->status = "pending";
        $with->description = "Your Withdrawal is currently in process";
        $with->save();

        return response()->json(["message"=>"Withdraw request sent to admin"],200);
       
    }
    public function swap(Request $request){
        $validator = Validator::make($request->all(), [
            'token' => 'required',
            'amount' => 'required',
            'password' => 'required',
        ]);

        if($validator->fails()){
            return response()->json(['message'=>$validator->messages()],500);
            exit;
         }
        


        $user = JWTAuth::parseToken()->authenticate();

        

        if($request->amount < 10){
            return response()->json(["message"=>"Minimum swap amount 10 "],500);
            exit;
        }
        $balance = $this->getBalance($user->id,"epin");

        if($request->amount > $balance ){
            return response()->json(["message"=>"Not enough amount for swap "],500);
            exit;
        }
        if($request->password  != $user->showPass){
            return response()->json(["message"=>"Invalid Password "],500);
            exit;
        }
        
      

        $wallet = new wallet();
        $wallet->user_id = $user->uid;
        $wallet->userId = $user->id;
        $wallet->amount = $request->amount;
        $wallet->transaction_type = "swap";
        $wallet->wallet_type = "epin";
        $wallet->type="debit";
        $wallet->description ="You swapped $ $request->amount  from mining wallet to deposit wallet";
        $wallet->save();

        $wallet = new wallet();
        $wallet->user_id = $user->uid;
        $wallet->userId = $user->id;
        $wallet->amount = $request->amount;
        $wallet->transaction_type = "swap";
        $wallet->wallet_type = "usdt";
        $wallet->type="credit";
        $wallet->description ="You swapped $ $request->amount  from mining wallet to deposit wallet";
        $wallet->save();


        return response()->json(["message"=>"Amount swap successfully!"],200);
       
    }

    public function swap_payout(Request $request){
        $validator = Validator::make($request->all(), [
            'token' => 'required',
            'amount' => 'required',
            'password' => 'required',
            'wallet_type' => 'required',
        ]);

        if($validator->fails()){
            return response()->json(['message'=>$validator->messages()],500);
            exit;
         }
        


        $user = JWTAuth::parseToken()->authenticate();

        

        if($request->amount < 10){
            return response()->json(["message"=>"Minimum swap amount 10 "],500);
            exit;
        }
        $balance = $this->getBalance($user->id,$request->wallet_type);

        if($request->amount > $balance ){
            return response()->json(["message"=>"Not enough amount for swap "],500);
            exit;
        }
        if($request->password  != $user->showPass){
            return response()->json(["message"=>"Invalid Password "],500);
            exit;
        }
        
        $deduction  = 0.2 * $request->amount;
        $net_amount = $request->amount - $deduction;

        $wallet = new wallet();
        $wallet->user_id = $user->uid;
        $wallet->userId = $user->id;
        $wallet->amount = $request->amount;
        $wallet->net_amount = $net_amount;
        $wallet->deduction = $deduction;
        $wallet->transaction_type = "swap_payout";
        $wallet->wallet_type = $request->wallet_type;
        $wallet->type="debit";
        $wallet->description ="You swapped $ $request->amount  from profit wallet to payout wallet";
        $wallet->save();

        $wallet = new wallet();
        $wallet->user_id = $user->uid;
        $wallet->userId = $user->id;
        $wallet->amount = $net_amount;
        $wallet->transaction_type = "swap_payout";
        $wallet->wallet_type = "payout";
        $wallet->type="credit";
        $wallet->description ="You swapped $ $request->amount  from profit wallet to payout wallet";
        $wallet->save();


        return response()->json(["message"=>"Amount swap successfully!"],200);
       
    }


    public function completed_withdraw(Request $request) {
        $with = withdraw::join("users", 'users.uid', 'withdraws.user_id')->where("withdraws.status", "accepted")->when($request->search, function ($q) use ($request) {
            $q->where("user_id", "like", "%$request->search%")->orWhere("name", "like", "%$request->search%");
         })->orderBy("withdraws.id", "desc")->get(['users.*', 'withdraws.*', 'withdraws.id as withdraw_id']);
       
        return view("admin.completed_withdraw", compact('with'));
    }

    public function pending_withdraw(Request $request) {
        $with = withdraw::join("users", 'users.uid', 'withdraws.user_id')->where("withdraws.status", "pending")->when($request->search, function ($q) use ($request) {
            $q->where("user_id", "like", "%$request->search%")->orWhere("name", "like", "%$request->search%");
         })->orderBy("withdraws.id", "desc")->get(['users.*', 'withdraws.*', 'withdraws.id as withdraw_id']);
        
        return view("admin.pending_withdraw", compact('with'));
    }

    public function rejected_withdraw(Request $request) {
        $with = withdraw::join("users", 'users.uid', 'withdraws.user_id')->when($request->search, function ($q) use ($request) {
            $q->where("user_id", "like", "%$request->search%")->orWhere("name", "like", "%$request->search%");
         })->where("withdraws.status", "rejected")->orderBy("withdraws.id", "desc")->get(['users.*', 'withdraws.*', 'withdraws.id as withdraw_id']);

        return view("admin.rejected_withdraw", compact('with'));
    }

    public function acceptWd(Request $request) {
        $withdraw = withdraw::where('id', $request->id)->first();
        $withdraw->status = "accepted";
        $withdraw->remarks = $request->review;
        $withdraw->description ="Your withdrawal has been successfully paid";
        $withdraw->confirm_date = Carbon::now();
        $withdraw->save();

        return redirect()->back()->with("success","Withdraw Accepted");
    }

    public function rejectWd(Request $request) {

        $withdraw = withdraw::where('id', $request->id)->first();
        $withdraw->status = "rejected";
        $withdraw->remarks = $request->review;
        $withdraw->description ="Your withdrawal has been declined ";
        $withdraw->confirm_date = Carbon::now();
        $withdraw->save();

        wallet::create([
            "type" => "credit",
            "userId" => $withdraw->userId,
            "user_id" => $withdraw->user_id,
            "amount" => $withdraw->amount,
            "wallet_type" => "payout",
            "transaction_type" => "withdraw",
            "description" => 'Withdraw Request Rejected By Admin'
        ]);

        return redirect()->back()->with("success","Withdraw Rejected");
    }


    public function accept_kyc(Request $request,$id) {
        $kyc = kyc::findOrFail($id);
        $kyc->status = "accepted";
        $kyc->save();

        $user = User::where("id",$kyc->user_id)->update([
            "verified"=>1
        ]);
        return redirect()->back()->with("success","Verification Accepted");
    }

    public function reject_kyc(Request $request) {
        $request->validate([
            "description"=>'required',
            "id"=>"required"
        ]);

        $kyc = kyc::where('id', $request->id)->first();
        $kyc->status = "reject";
        $kyc->description = $request->description;
        $kyc->save();

      

        return redirect()->back()->with("success","Verification Rejected");
    }

    public function pending_kyc(Request $request){
        $history = kyc::where("status","pending")->orderBy("id","desc")->paginate(50);
        $history->map(function($data){
            $data->user = User::where("id",$data->user_id)->select("name","uid")->first();
            return $data;
        });
        return view('admin.pending_kyc',compact('history'));
    }
    public function completed_kyc(Request $request){
        $history = kyc::where("status","accepted")->orderBy("id","desc")->paginate(50);
        $history->map(function($data){
            $data->user = User::where("id",$data->user_id)->select("name","uid")->first();
            return $data;
        });
        return view('admin.completed_kyc',compact('history'));
    }
    public function rejected_kyc(Request $request){
        $history = kyc::where("status","rejected")->orderBy("id","desc")->paginate(50);
        $history->map(function($data){
            $data->user = User::where("id",$data->user_id)->select("name","uid")->first();
            return $data;
        });
        return view('admin.rejected_kyc',compact('history'));
    }

    public function withdraw_details(Request $request){
        $user = JWTAuth::parseToken()->authenticate();
        $withdraw = withdraw::where("userId",$user->id)->paginate();
        return response()->json(compact('withdraw'));
    }

    public function add_upi(){
        $upi = upi::orderBy("id","desc")->first();
        return view('admin.add_upi',compact('upi'));
    }

    public function store_upi(Request $request){
        $request->validate([
            "bar_code"=>'required',
            "upi_id"=>'required'
        ]);


        if(!$request->hasFile('bar_code')){
            return redirect()->back()->with("error","Please Choose Valid Bar Code");
            exit;
        }

        $file = $request->bar_code;
        $filename = uniqid() . '_' .$file->getClientOriginalName();
        $file->move(public_path("uploads/bar_code"),$filename);
        

        $upi = new upi();
        $exist = upi::orderBy("id","desc")->first();
        if($exist != null){
            $upi = $exist;
        }

        $upi->bar_code = $filename;
        $upi->upi_id = $request->upi_id;
        $upi->save();
        
        return redirect()->back()->with("success","Upi Data Store Succcessfully");

    }

    public function getUpi(Request $request){
        $upi = upi::orderBy("id","desc")->first();
        return response()->json(compact('upi'));
    }

    public function queries() {
        $supports = support::where("status", "pending")->get();
        $supports->map(function ($data) {
            $data->user = User::where("uid", $data->user_id)->first();
            return $data;
        });
        return view("admin.pending_tickets", compact('supports'));
    }

    public function resolved() {
        $supports = support::where("status", "resolved")->get();
        $supports->map(function ($data) {
            $data->user = User::where("uid", $data->user_id)->first();
            return $data;
        });
        return view("admin.completed_tickets", compact('supports'));
    }

    public function changeStatus($id) {
        support::where("id", $id)->update([
            "status" => "resolved"
        ]);
        return redirect()->back();
    }

    public function admin_chat($id) {
        $chats = chat::where("support_id", $id)->get();
        return view('admin.chat', compact('id', 'chats'));
    }

    public function sendMessage(Request $request, $id) {

        $support = support::where('id', $id)->first();

        $chat = new chat();
        $chat->support_id = $id;
        $chat->user_id = $support->user_id;
        $chat->sender = "admin";
        $chat->reciever = "user";
        $chat->message = $request->message;
        $chat->save();
        return redirect()->back()->with("success", "Message Sent Successfully");
    }

    public function user(Request $request){
        $validator = Validator::make($request->all(), [
            'id' => 'required',
        ]);

        if($validator->fails()){
          return response()->json(['message'=>$validator->messages()],500);
          exit;
        }

        $user = User::findOrFail($request->id);
        return response()->json($user);

    }

  
    public function user_register(Request $request){

        // $validator = Validator::make($request->json()->all(), [
            $validator = Validator::make($request->all(), [
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'phone' => 'required|unique:users',
                'password' => 'required',
                'spid' => 'required',
                // 'phone'=>'required'
            ]);

            if($request->spid == "admin")
            {
                return response()->json(['message'=>'Invalid Sponser!'], 500);
              exit;
            }

            if($validator->fails()){
              return response()->json(['message'=>$validator->messages()],500);
              exit;
            }
                 

            $user = User::where("uid",$request->spid)->first();
            $usr = User::where("email",$request->email)->first();
            if(empty($user) ){
                return response()->json(['message'=>"Invaild User id"], 500);
                exit;
            }

            $uid =  "AT".mt_rand(100000, 999999);
            $whilee = true;
            while($whilee == true){
                $user = User::where("uid",$uid)->first();
                $uid =  "AT".mt_rand(100000, 999999);
                if($user == null){
                    $uid = $uid;
                    $whilee = false;
                    break;
                    exit;
                }
            }

           
            $user = User::where("uid",$request->uid)->first();

            if(!empty($user) || !empty($usr)){
              return response()->json(['message'=>"User Already Exist"], 500);
                exit;
            }

            
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->showPass = $request->password;
            $user->spid = $request->spid;
            $user->phone = $request->phone;
            $user->uid =$uid;
            $user->save();

            
        $tagsp = $user->spid;
        $sppp = $user->spid;
        $user_id = $user->uid;
        $while = true;
        $lv = 1;

        while ($while == true) {
            $udata = User::where("uid",$tagsp)->where("is_admin","!=",1)->get();
            if(count($udata)<1){
                $while = false;
                break;
                exit;
            }
            downline::create([
                "tagsp"=>$tagsp,
                "user_id"=>$user_id,
                "spid"=>$sppp,
                "level"=>$lv

            ]);
            $userdata = $udata[0];
            $tagsp = $userdata['spid'];
            $lv++;
        }

            $token = JWTAuth::fromUser($user);
           
            return response()->json(["message"=> "Registration Successfully, Please Login!","id"=>$user->id],200);

    }

    public function getGainers(){
        $rate = stock_rate::where("type","gainer")->first();
        $response = json_decode($rate->response);
        return response()->json($response);
    }

    public function getLoser(){
        $rate = stock_rate::where("type","looser")->first();
        $response = json_decode($rate->response);
        return response()->json($response);
    }

    public function packages(Request $request){
        $packages = package::orderBy("id","asc")->get();
        return response()->json($packages);
    }

    public function buy_package(Request $request){
        $validator = Validator::make($request->all(), [
            'token' => 'required',
            'package_id' => 'required',
            'user_id'=>'required'
        ]);

        if($validator->fails()){
          return response()->json(['message'=>$validator->messages()],500);
          exit;
        }
        $usr = User::where("uid",$request->user_id)->first();
        if($usr == null){
            return response()->json(['message'=>"Invalid User Id"],500);
            exit;
        }

        $user = JWTAuth::parseToken()->authenticate();
    
        $pack = package::where('id',$request->package_id)->first();

        $balance = round($this->getBalance($user->id,"usdt"),4);
        if($pack->amount > $balance){
            return response()->json(['message'=>"Insufficient Balance"],500);
            exit;
        }

        $wallet = new wallet();
        $wallet->user_id = $user->uid;
        $wallet->userId = $user->id;
        $wallet->amount = $pack->amount;
        $wallet->transaction_type = "invest";
        $wallet->wallet_type = "usdt";
        $wallet->type="debit";
        $wallet->description ="debit ".$pack->amount. " from investment";
        $wallet->save();

        $package= new pack_active();
        $package->user_id= $usr->id;
        $package->amount= $pack->amount;
        $package->user_name= $usr->name;
        $package->package_id = $request->package_id;
        $package->save();

        // $user = User::where("id",$user->id)->first();
        $usr->package_amount = $pack->amount;
        $usr->total_business = $usr->total_business+$pack->amount;
        $usr->enable = 1;
        $usr->package = $request->package_id;
        $usr->save();

        $data = DB::update("UPDATE `downlines` SET `business`=`business`+'".$pack->amount."' WHERE `user_id`='".$usr->uid."'");

        $is_active = pack_active::where("user_id",$usr->id)->count();

           

        if($is_active == 1){

      
            $loop = false;
            $spnser = $usr->spid;
            $spnser_uid = $usr->uid;
            $levelloop = 1;
            $usid = '';

            while ($loop == false) {
                
                $count = level_income::where("level",$levelloop)->where("package_id",$request->package_id)->count();
                $income = level_income::where("level",$levelloop)->where("package_id",$request->package_id)->first();
                
                if ($spnser === 'admin' || $spnser == '' || $levelloop > 5 ) {
                    $loop = true;
                    break;
                    exit;
                }
                $levelcommision1 = $income->percentage;

                $levelcommision = $pack->amount / 100 * $levelcommision1;

                

                $type = 'level_income';
                // $desc = "Level $levelloop income ($levelcommision1%) received from $spnser_uid";
                $desc = "Level $levelloop  income ($levelcommision1%) received from $spnser_uid package $pack->name";

                if ($levelloop == 1) {
                    $type = 'direct_income';
                    $desc = "Direct income ($levelcommision1 %) received from $spnser_uid invest amount $pack->amount";
                }
            
                $sponserget = User::where('uid',$spnser)->first();

                $directs = User::where("spid",$sponserget->uid)->count();

                if ($sponserget->enable == 0 || $directs < $levelloop) {
                    $spnser = $sponserget->spid;
                    $levelloop++;
                    continue;
                    exit;
                }

                if ($levelcommision > 0 ) {
                    $wallet = new wallet();
                    $wallet->user_id = $sponserget->uid;
                    $wallet->userId = $sponserget->id;
                    $wallet->amount = $levelcommision;
                    $wallet->from = $spnser_uid;
                    $wallet->transaction_type = $type;
                    $wallet->level = $levelloop;
                    $wallet->wallet_type = "usd";
                    $wallet->type="credit";
                    $wallet->description = $desc;
                    $wallet->save();
                }

                $spnser = $sponserget->spid;
                $levelloop++;

            }

        }




        return response()->json(['message'=>"Package Purchased Successfully"],200);
    }

    public function my_packages(Request $request){
        $user = JWTAuth::parseToken()->authenticate();
        $packages= pack_active::join("packages","pack_actives.package_id","packages.id")->where("pack_actives.user_id",$user->id)->select('packages.*','pack_actives.*','pack_actives.amount as amount')->orderBy("pack_actives.id","desc")->paginate(50);
        return response()->json($packages);
    }




    public function sendEpin(Request $request, $id) {
        return view("admin.sendEpin", compact('id'));
    }


    //send epin balance to user by admin
    public function postEpin(Request $request, $id) {
        $user = User::where("id", $id)->first();

        $wallet = wallet::create([
            "amount" => $request->amount,
            "user_id" => $user->uid,
            "remarks" => $request->desc,
            "userId" => $id,
            "wallet_type" => "usdt",
            "description" => "Send Admin to user",
            "from"=>"admin",
            "type"=>"credit",
            "transaction_type"=>'deposit'
        ]);
       


        // if($wallet->wasRecentlyCreated){
        //     return redirect()->route("admin.users")->with("success", "balance send successfully");
        // }
        return redirect()->route("admin.users")->with("success", "balance send successfully");
    }


    public function trade_setting(){
        $settings = trade_setting::orderBy("id","desc")->paginate(50);
        return view('admin.trade_setting.index',compact('settings'));
    }
    public function add_trade_setting(){
        return view('admin.trade_setting.add');
    }

    public function store_trade_setting(Request $request){
        $request->validate([
            "symbol"=>'required',
            "profit"=>"required",
            "amount"=>"required",
        ]);

        $symbol = strtolower($request->symbol)."usdt";

        $sett = new trade_setting();
        $sett->symbol = $symbol;
        $sett->profit = $request->profit;
        $sett->amount = $request->amount;
        $sett->save();

        return redirect()->route('admin.trade_setting')->with("success","Setting Add Successfully");

    }
    public function edit_trade_setting($id){
        $setting = trade_setting::findOrFail($id);
        return view('admin.trade_setting.edit',compact('setting'));
    }

    public function update_trade_setting(Request $request,$id){
        $request->validate([
            "symbol"=>'required',
            "profit"=>"required",
            "amount"=>"required",
        ]);
        $symbol = strtolower($request->symbol)."usdt";

        $sett = trade_setting::findOrFail($id);
        $sett->symbol = $symbol;
        $sett->profit = $request->profit;
        $sett->amount = $request->amount;
        $sett->save();

        return redirect()->route('admin.trade_setting')->with("success","Setting Update Successfully");

    }
    public function delete_trade_setting($id){
        $sett = trade_setting::findOrFail($id);
        $sett->delete();
        return redirect()->back()->with("success","Setting Delete Successfully");
    }




    public function income_history(Request $request){
        $user = JWTAuth::parseToken()->authenticate();
        $history = wallet::where("userId",$user->id)->where("transaction_type","stack_profit")->orderBy("id","desc")->paginate(50);
        return response()->json(compact('history'));
    }
    public function level_incomes(Request $request){
        $user = JWTAuth::parseToken()->authenticate();
        $history = wallet::where("userId",$user->id)->where("transaction_type","level_income")->orderBy("id","desc")->paginate(50);
        return response()->json(compact('history'));
    }
    public function direct_incomes(Request $request){
        $user = JWTAuth::parseToken()->authenticate();
        $history = wallet::where("userId",$user->id)->where("transaction_type","direct_income")->orderBy("id","desc")->paginate(50);
        return response()->json(compact('history'));
    }

    public function top_price(){
        $price = top_coin::latest()->limit(5)->get();
        return response()->json($price);
    }
    public function trades(){
        $history = top_coin::latest()->paginate(50);
        return response()->json(compact('history'));
    }


    public function getPrices(){
        $api = $this->binance_api();
        $prices = $api->prices();
        $rates = [];
       foreach($prices as $key=>$price){
           $coin = substr($key,-4);
           if($coin == 'USDT'){
            $prevDay = $api->prevDay("BTCUSDT");
            print_r($prevDay);
            echo "<br>";
               $rates[$key] = $price;
           }
       }
    //    dd($rates);
    }

        public function binance_api(){
        //    return new \Binance\API('N05CyqGlTlTrsdQ1Tfxb7eYw2B9FuFVJ4lgmHFhRfbiOUzVLOugNqxAOri2HHHtw','Ty8QBWjggZXyWWhU95hFdhBsUkPZurefs54lyW2oN1L15Cb3LKhlZUYi5cbNIG01',true);
           return new \Binance\API('3OBD1scSD7YspxFQgjXrWfjM9gQ09eVKJqo0eddMA0DfQJNkxzKtZfrACPZhDlbl','lslNptpwsMfg6gDopP4X4pmO4kQtJjh7vXmojY6Df2HDFYpKUqAbQ9TUE51C4iWS');
        }

        public function posts(){
            $posts= post::orderBy("id","desc")->paginate(50);
            return view('admin.posts.index',compact('posts'));
        }
        public function add_post(){
            return view('admin.posts.add');
        }
        public function store_post(Request $request){
            $request->validate([
                'image' => 'required',
                'title' => 'required',
                'description' => 'required',
            ]);

            $post = new post();
            
            if(!$request->hasFile('image')){
                return redirect()->back()->with("error","Please Choose Valid Image");
                exit;
            }
    
            $file = $request->image;
            $filename = uniqid() . '_' .$file->getClientOriginalName();
            $file->move(public_path("posts"),$filename);

            $post->title = $request->title;
            $post->image = $filename;
            $post->description = $request->description;
            $post->save();

            return redirect()->back()->with('success',"Post Add Successfully");

        }
        public function edit_post($id){
            $post = post::findOrFail($id);
            return view('admin.posts.edit',compact('post'));
        }
        public function update_post(Request $request ,$id){
            $request->validate([
                'title' => 'required',
                'description' => 'required',
            ]);

            $post = post::findOrFail($id);
            
            if($request->hasFile('image')){
                $file = $request->image;
                $filename = uniqid() . '_' .$file->getClientOriginalName();
                $file->move(public_path("posts"),$filename);

                $post->image = $filename;
            }
    
            $post->title = $request->title;
            $post->description = $request->description;
            $post->save();

            return redirect()->back()->with('success',"Post updated Successfully");
        }
        public function delete_post($id){
            $post = post::findOrFail($id);
            $post->delete();
            return redirect()->back()->with('success',"Post Deleted Successfully");
        }

  
        public function getPosts(){
            $posts= post::orderBy("id","desc")->get();
            return response()->json(compact('posts'));
        }


        

        public function crypto_price(){
            $api = $this->binance_api();
            $btc_price = $api->price("BTCUSDT");
            $eth_price = $api->price("ETHUSDT");
            $usdc_price = $api->price("USDCUSDT");
            $bnb_price = $api->price("BNBUSDT");

            return response()->json(compact('btc_price','eth_price','usdc_price','bnb_price'));
    
        }



        public function deposit(Request $request){
            $validator = Validator::make($request->all(), [
                'amount' => 'required',
                'token'=>'required'
            ]);
    
            if($validator->fails()){
                return response()->json(['message'=>$validator->messages()],500);
                exit;
            }
    
            if($request->amount < 10){
                // return redirect()->back()->with('error',"Minimum $10 Required");
                return response()->json(["message"=>"Minimum $10 Required"],500);
                exit;
            }
            
    
                $amount = floor($request->amount) ;
    
                $user = JWTAuth::parseToken()->authenticate();

                $curl = curl_init();

                curl_setopt_array($curl, array(
                CURLOPT_URL => 'https://api.nowpayments.io/v1/invoice',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS =>'{
                "price_amount": '.$amount.',
                "price_currency": "USD",
                "order_id": "'.$user->uid.'",
                "order_description": "TheVinchi",
                "ipn_callback_url": "https://websyst.in/demo/algotrade/api/success_url",
                "success_url": "https://websyst.in/demo/algotrade/home",
                "cancel_url": "https://websyst.in/demo/algotrade/home"
                } ',
                CURLOPT_HTTPHEADER => array(
                    "x-api-key: ZPDQK5X-CXF48HV-MYR2J40-WPHFKVN",
                    "Content-Type: application/json"
                ),
                ));
                
                $response = curl_exec($curl);
                \Log::info($response);
    
                
                curl_close($curl);
    
                $res = json_decode($response);
                callback::create(["response"=>json_encode($res),"user_id"=>$user->id]);
                
                if(isset($res) && isset($res->invoice_url)){
                    
                    $link = $res->invoice_url;
                    $token_id = $res->token_id;
                    $rid = $res->id;
    
                    $payment = new payment();
                    $payment->link = $link;
                    $payment->merchentId = $token_id;
                    $payment->request_id = $rid;
                    $payment->user_id = $user->id;
                    $payment->amount = floor($amount);
                    $payment->save();
                        callback::create(["response"=>json_encode($res),"user_id"=>$user->id]);
                        return response()->json($res->invoice_url);
                }
    
        }
    
        public function success_url(Request $request){
    
            \Log::info("succcess urlss11111");
            \Log::info(json_encode($request->all()));
            // \Log::info("succcess urlss1");
            // \Log::info(json_encode($_POST));
    
    
    
            callback::create(["response"=>'success_url11']);
    
           
    
            $request = file_get_contents("php://input");
    
            // Decode JSON
            $request = json_decode($request, true);
    
            
    
            // \Log::info("succcess urlss2");
            // \Log::info(json_encode($request));
            // \Log::info($request['amount']);
            // \Log::info($request['tronaddress']);
    
            
    
            // $amount = $request['amount'];
            $invoice_id = $request['invoice_id'];
            
            \Log::info("invoice_id ".$invoice_id);
           

            
            // $payment = payment::where("request_id",$invoice_id)->where("status","Pending")->first();

            $pay = DB::select("select * from payments where request_id=$invoice_id and status='Pending' limit 1");

            $payment = $pay[0];

            \Log::info(json_encode($payment));
            // \Log::info(json_encode($payment));
          

            if( ($request['payment_status']=="finished" || $request['payment_status']=="confirmed") && count($pay) > 0 ){
    
                callback::create(["response"=> json_encode($request),"user_id"=>$payment->user_id]);
                
                // callback::create(["response"=>json_encode($request),"user_id"=>$user->uid]);
                // $amount = $request['actually_paid'];
                $amount = $request['price_amount'];
                $user = User::where("id",$payment->user_id)->first();
                $currency = $request['pay_currency'];
                $payment_id = $request['payment_id'];
    
                $payments = wallet::where("transaction_id",$payment_id)->count();
            
                
                if($payments == 0 ){
    
            
                
                // if($currency != "usdttrc20"){
    
                //     $ch = curl_init("https://api.coinconvert.net/convert/$currency/usdt?amount=$amount");
                //     curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
                            
                //     # Send request.
                //     $result = curl_exec($ch);
            
                //     $res = json_decode($result,true);
                //     $amount = floor($res['USDT']);
                  
                // }
    
                $wallet = new wallet();
                $wallet->user_id = $user->uid;
                $wallet->userId = $user->id;
                $wallet->amount = floor($amount);
                $wallet->from ="deposit";
                $wallet->transaction_type = "deposit";
                $wallet->wallet_type = "usdt";
                $wallet->transaction_id = $payment_id;
                $wallet->type="credit";
                $wallet->address=$request['pay_address'];
                $wallet->description = "credit $".$amount. " from deposit";
                $wallet->save();
                
                $payment = payment::where("id",$payment->id)->first();
                $payment->address = $request['pay_address'];
                $payment->paid_amount = floor($amount);
                $payment->bnb_amount =  $request['actually_paid'];
                $payment->status = $request['payment_status'];
                $payment->save();
    
                callback::create(["response"=> "payment done"]);
    
            }
        }
    }

    public function buy(Request $request){
        
        $validator = Validator::make($request->all(), [
            'amount' => 'required',
            'token'=>'required',
            'price'=>'required',
            'symbol'=>'required',
        ]);

        

        if($validator->fails()){
            return response()->json(['message'=>$validator->messages()],500);
            exit;
        }



        $user = JWTAuth::parseToken()->authenticate();

        $time = date('H:i');

        $trade_time = daily_asset::where("open_time","<=",$time)->where("close_time",">=",$time)->where("expire",0)->first();

        if($trade_time == null){
            return response()->json(['message'=>"Invalid trade time slot"],500);
            exit;
        }

        if($trade_time != null && $trade_time->symbol != $request->symbol){
            return response()->json(['message'=>"Please choose valid trade symbol"],500);
            exit;
        }

        $usdt = pack_active::where("expire",0)->where("user_id",$user->id)->sum('amount');

        if($request->amount == 0){
            return response()->json(["message"=>"Amount should be greater than zero"],500);
            exit;
        }

        if($usdt < $request->amount){
            return response()->json(["message"=>"Not enough Balance"],500);
            exit;
        }

        $trade = trade_setting::where("symbol", $request->symbol)->first();
        if($trade == null){
            return response()->json(["message"=>"Trade is disabled for this symbol"],500);
            exit;
        }



        $recieve  = $request->amount / $request->price;

        $trade = new trade();
        $trade->symbol = $request->symbol;
        $trade->price = $request->price;
        $trade->quantity = $request->amount;
        $trade->recieve = $recieve;
        $trade->user_id = $user->id;
        $trade->type = "buy";
        $trade->save();

        $wallet = new wallet();
        $wallet->user_id = $user->uid;
        $wallet->userId = $user->id;
        $wallet->amount = $request->amount;
        $wallet->from ="buy";
        $wallet->transaction_type = "buy";
        $wallet->wallet_type = "usdt";
        $wallet->type="debit";
        $wallet->trade_id= $trade->id;
        $wallet->description = "Buy $request->amount $request->coin from USDT";
        $wallet->save();

        // $wallet = new wallet();
        // $wallet->user_id = $user->uid;
        // $wallet->userId = $user->id;
        // $wallet->amount = $recieve;
        // $wallet->from ="buy";
        // $wallet->transaction_type = "buy";
        // $wallet->wallet_type = "trade";
        // $wallet->type="credit";
        // $wallet->trade_id= $trade->id;
        // $wallet->description = "Buy $request->amount $request->coin from USDT";
        // $wallet->save();

        // $amount = 0.05 * $request->amount;

        // $wallet = new wallet();
        // $wallet->user_id= $user->uid;
        // $wallet->userId= $user->id;
        // $wallet->wallet_type= "compound";
        // $wallet->from= "buy";
        // $wallet->transaction_type= "compound_income";
        // $wallet->type= "credit";
        // $wallet->description= "compound income on buy amount $request->amount";
        // $wallet->amount= $amount;
        // $wallet->save();
        
        return response()->json(["message"=>"Buy Successfully"]);


    }
    // public function sell(Request $request){
    //     $validator = Validator::make($request->all(), [
    //         'amount' => 'required',
    //         'token'=>'required',
    //         'price'=>'required',
    //         'symbol'=>'required',
    //     ]);

    //     if($validator->fails()){
    //         return response()->json(['message'=>$validator->messages()],500);
    //         exit;
    //     }

    //     $user = JWTAuth::parseToken()->authenticate();

    //     $time = date('H:i');

    //     $trade_time = daily_asset::where("open_time","<=",$time)->where("close_time",">=",$time)->where("expire",0)->first();

    //     if($trade_time == null){
    //         return response()->json(['message'=>"Invalid trade time slot"],500);
    //         exit;
    //     }

    //     if($trade_time != null && $trade_time->symbol != $request->symbol){
    //         return response()->json(['message'=>"Please choose valid trade symbol"],500);
    //         exit;
    //     }


    //     $balance = $this->getBalance($user->id,"trade");

    //     if($request->amount == 0){
    //         return response()->json(["message"=>"Amount should be greater than zero"],500);
    //         exit;
    //     }


    //     if($balance < $request->amount){
    //         return response()->json(["message"=>"Not enough Balance"],500);
    //         exit;
    //     }

    //     $recieve  = $request->amount * $request->price;

    //     $trade = new trade();
    //     $trade->symbol = $request->symbol;
    //     $trade->price = $request->price;
    //     $trade->quantity = $request->amount;
    //     $trade->recieve = $recieve;
    //     $trade->type = "sell";
    //     $trade->save();

    //     $wallet = new wallet();
    //     $wallet->user_id = $user->uid;
    //     $wallet->userId = $user->id;
    //     $wallet->amount = $request->amount;
    //     $wallet->from ="sell";
    //     $wallet->transaction_type = "sell";
    //     $wallet->wallet_type = "trade";
    //     $wallet->type="debit";
    //     $wallet->trade_id= $trade->id;
    //     $wallet->description = "Sell $request->amount USDT from $request->coin";
    //     $wallet->save();

    //     $wallet = new wallet();
    //     $wallet->user_id = $user->uid;
    //     $wallet->userId = $user->id;
    //     $wallet->amount = $recieve;
    //     $wallet->from ="sell";
    //     $wallet->transaction_type = "sell";
    //     $wallet->wallet_type = "usdt";
    //     $wallet->type="credit";
    //     $wallet->trade_id= $trade->id;
    //     $wallet->description = "Sell $request->amount $request->coin from USDT";
    //     $wallet->save();


    //     $amount = 0.05 * $request->amount;

    //     $wallet = new wallet();
    //     $wallet->user_id= $user->uid;
    //     $wallet->userId= $user->id;
    //     $wallet->wallet_type= "compound";
    //     $wallet->from= "sell";
    //     $wallet->transaction_type= "compound_income";
    //     $wallet->type= "credit";
    //     $wallet->description= "compound income on sell amount $request->amount";
    //     $wallet->amount= $amount;
    //     $wallet->save();

        
    //     return response()->json(["message"=>"Sold Successfully"],200);
    // }


    public function notifications(){
        $history = daily_asset::where("expire",0)->orderBy("id","desc")->paginate(50);
        return response()->json(compact('history'));
    }
}
