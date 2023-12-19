<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Database\Eloquent\Collection;
use App\Models\users;
use App\Models\user_order;
use App\Models\employee;
use App\Models\employee_order;
use App\Models\orders;

class ProfileController extends Controller
{
    private $users = new users;
    private $user_order = new user_order;
    private $employee = new employee;
    private $employee_order = new employee_order;
    private $order = new orders;

    public function GetUserData (Request $request):JsonResponse{

        
        $users = users::where('id', $request->id)->first();

        return response()->Json([
            'name'=>$users->name,
            'surname'=>$users->surname,
            'secondname'=>$users->secondname,
            'email'=>$users->email,
            'phone_number'=>$users->phone_number,
            'password'=>$users->password,
        ]);
    }

    public function GetUserOrders (Request $request):JsonResponse{
        $orders = array();

        $user_orders = user_order::where('user_id', $request->id)->all();
        foreach($user_orders as $user_order){
            $order = orders::where('id', $user_order->order_id)->first();
            $orders[$user_order->order_id]=array(
                'id'=>$order->id,
                'cost'=>$order->cost,
                'service_type'=>$order->service_type,
                'status'=>$order->status,
                'begin_date'=>$order->begin_date,
                'end_date'=>$order->end_date
            );
        }

        $employees = array();

        

    }
}
