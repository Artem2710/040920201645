<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddressRequest;
use App\Models\Address;
use App\Models\UserAddress;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AddressController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $addresses = DB::table('user_address')->where('user_id', '=', Auth::id())
            ->join('addresses', 'addresses.id', '=', 'user_address.address_id')
            ->join('users', 'users.id', '=', 'user_address.user_id')
            ->orderBy('addresses.name','ASC')
            ->get();
        $addresses = json_decode($addresses, true);
        return view('address', [
            'addresses' => $addresses,
        ]);
    }

    /**
     * @param AddressRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function create(AddressRequest $request)
    {
        $address = new Address();
        $address->fill($request->all());
        if($address->save()){
            $user_address = new UserAddress();
            $user_address->user_id = Auth::id();
            $user_address->address_id = $address->getKey();
            $user_address->save();
        }
        return redirect(route('index-addresses'));
    }

    public function delete($id)
    {
        Address::find($id)->delete();
        return redirect(route('index-addresses'));
    }
}
