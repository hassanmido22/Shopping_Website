<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\orders;
use Auth;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\order_details;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;
use App\product;
class orderscontroller extends Controller
{
    public function displayorders()
    {
        $orders=orders::where('user_id',"like",Auth::user()->id)->get();
        return view('orders')->with(['orders'=>$orders

        ]);
    }

    public function addorder(Request $request)
    {  
        $OrderDetail=array();
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required|email',
            
        ]);
        $i=0;
        
        $order=orders::create([
        'user_id'=> Auth::user()->id,
        'subtotal'=>Cart::subtotal(),
        'taxes'=>Cart::tax(),
        'total'=>Cart::total(),
    ]);
        foreach (Cart::content() as $item) {
        order_details::create([
            'order_id'=>$order->id,
            'product_id'=>$item->model->id,
            'quantity'=>$item->qty,
        ]);
        $OrderDetail[$i]= " product name : ".$item->model->name ."   ". " product quantity :".$item->qty ."        "." product price : ".$item->model->price.""; 
         $i++;
    }
    $data=array(
        'name'=>Auth::user()->name,
        'email'=>$request->email,
        
    );
    
    Mail::to(Auth::user()->email)->send(new SendMail($data,$OrderDetail));
    Cart::destroy();
    return back();
            
    }
    public function orderdetails($id)
    {
        $details=order_details::where('order_id','LIKE',$id)->get();
        return view('orderdetails')->with([
            'details'=>$details
        ]);
    }
}
