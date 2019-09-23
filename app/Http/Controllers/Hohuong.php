<?php

namespace App\Http\Controllers;
use App\Category;
use App\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Support\Jsonable;
use Illuminate\Support\Facades\Mail;
use App\Mail\Sendmail;

use App\Slide;
use App\Customer;
use App\Bill;
use App\Bill_Detail;

class Hohuong extends Controller
{
    //
    public function index(){
        $data = Category::all();
        return $data;
 
    }
    public function products(){
        $data = Products::paginate(12);
        return $data;

    }
    public function products_cate($id_cate){
        $data=Products::where('id_type',$id_cate)->paginate(8);
        return $data;
    }
    public function products_id($id){
        $data=Products::find($id);
        return $data;
    }
    public function Slide(){
        $data=Slide::all();
        return $data;
    }
    public function Search($key){
    
        $data = Products::where('name', 'LIKE', '%'.$key.'%')->paginate(8);
       return response()->json($data); 
    }
    public function dathang(Request $req){
        date_default_timezone_set("Asia/Saigon");
        $time = date('Y-m-d');


       $arr= $req->arr;
        
       $total=$req->total;
        $arrproduct = $req->arrproduct;
     
    $customer =new Customer;
    $customer->name=$arr['name'];
    $customer->gender=$arr['gioitinh'];
    $customer->email=$arr['gmail'];
    $customer->address=$arr['address'];
    $customer->phone_number=$arr['phone'];
    $customer->note=$arr['notes'];
    $customer->save();

    $bill= new Bill;
    $bill->id_customer= $customer->id;
    $bill->date_order=$time;
    $bill->total=$total;
    $bill->payment=$arr['thanhtoan'];
    $bill->note=$arr['notes'];
    $bill->save();
  
        foreach ($arrproduct  as $product ) {
            
            $bill_detail = new Bill_Detail;
            $bill_detail->id_bill = $bill->id;
            $bill_detail->id_product = $product['id'];
            $bill_detail->quantity = $product['qty'];
            $bill_detail->unit_price=$product['price'];

            $bill_detail->save();
        }
       
         

    }
    public function dsdonhang(){
        $data= Customer::select('customer.email','customer.address',
                                    'customer.phone_number','customer.note',
                                'bills.date_order','bills.total','bills.payment','bill_detail.quantity',
                                'products.name','products.unit_price','products.promotion_price')
        ->join('bills', 'customer.id', '=', 'bills.id_customer')
        ->join('bill_detail', 'customer.id', '=', 'bill_detail.id_bill')
        ->join('products', 'customer.id', '=', 'products.id')
        
        ->get();
        return $data;
    }
}
