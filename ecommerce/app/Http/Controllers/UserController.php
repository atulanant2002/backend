<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use Illuminate\Support\Str;

class UserController extends Controller
{



    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function register(Request $request)
    {

        $name = $request->name;
        $mobile = $request->mobile;
        $email = $request->email;
        $password = $request->password;

        $mobileno=Customer::where('mobile','=',$mobile)->get();

        if(sizeof($mobileno)>0){
            return response('{"message":"Mobile no. already exists"}');
        }

        $emailid=Customer::where('mobile','=',$email)->get();

        if(sizeof($emailid)>0){
            return response('{"message":"Mobile no. already exists"}');
        }

        $token = Str::random(16);

        $createcuster = new Customer;
        $createcuster->name = $name;
        $createcuster->mobile = $mobile;
        $createcuster->email = $email;
        $createcuster->password = $password;
        $createcuster->token = $token;
        $createcuster->save();

        return response()->json(['message'=>'Success', 'token'=>$token]);
    }

    public function login(Request $request)
    {
        
        $mobile = $request->mobile;
        $email = $request->email;
        $password = $request->password;

        $token = Str::random(16);

        // if($mobile != '') {
        //     $mobileno=Customer::where([
        //         ['mobile', '=', $mobile],
        //         ['password', '=', $password]
        //     ])->get();

        //     $user = Customer::find($mobileno[0]->id);
        //     $user->token = $token;
        //     $user->save();

        //     if(sizeof($mobileno)==1){
        //         return response()->json(['message'=>'Success', 'token'=>$token]);
        //     }
        // }
            $emailid=Customer::where([
                ['email', '=', $email],
                ['password', '=', $password]
            ])->get();


            if(count($emailid) == 0){
                return response('{"message":"Incorrect Username/Password"}');
            }


            $user = Customer::find($emailid[0]->id);
            $user->token = $token;
            $user->save();

            if(sizeof($emailid)==1){
                return response()->json(['message'=>'Success', 'token'=>$token]);
            }


    }
}
