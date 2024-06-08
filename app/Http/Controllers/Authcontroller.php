<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Addproduct;
use App\Models\card;
use App\Models\buy_now;
use App\Models\rating;
use App\Models\wallet_amount;
use App\Models\wishlist;
use App\Models\check_data;
use App\Models\order_detail;
use App\Register;
use Session;
use Hash;
use PDF;
use DateTime;
use Mail;
use App\Models\category;
use DB;
use Validator;
use Symfony\Component\VarDumper\Cloner\Data;

class Authcontroller extends Controller
{
    public function Addproductview()
    {
        if (Session::has('adminId')) {
            $admin = Register::where('id', '=', Session::get('adminId'))->first();
            $data = category::all();
        }
        return view('Admin.addproduct', compact('admin', $admin))->with('data', $data);
    }

    public function productview()
    {
        // $data=Addproduct::all();
        if (Session::has('adminId')) {
            $admin = Register::where('id', '=', Session::get('adminId'))->first();
            $data = DB::table('addproducts')->paginate(5);
        }
        return view('Admin.alldatashow', compact('admin', $admin))->with('data', $data);
    }

    public function categoryview()
    {
        if (Session::has('adminId')) {
            $admin = Register::where('id', '=', Session::get('adminId'))->first();
        }
        return view('Admin.addcategory', compact('admin', $admin));
    }

    public function register()
    {
        return view('register');
    }
    public function Addtocardview($id)
    {
        $data = Addproduct::where('id', $id)->first();
        if (Session::has('userId')) {
            $user = Register::where('id', '=', Session::get('userId'))->first();
            $user_id = $user->id;
            $CheckedProduct = wishlist::where('product_id', '=', $id)->where('user_id',  $user_id)->get();
            if ($CheckedProduct->count()) {
                return view('Addtocardshow', compact('data'))->with(['WishlistProduct' => '1',]);
            }
        }
        return view('Addtocardshow', compact('data'))->with(['WishlistProduct' => '0',]);

        // return view('Addtocardshow', compact('data'));


    }
    public function Addproduct(Request $request)
    {

        $user = new Addproduct;
        $user->name = $request['name'];
        $user->slug = $request['slug'];
        $user->price = $request['price'];
        $user->size = $request['size'];
        $user->size = $request['size'];
        $user->sku = $request['skucode'];
        $user->color = $request['color'];
        $user->status = 'Active';
        $user->description = $request['description'];
        if ($files = $request->file('profile')) {
            $profileImage = time() . "." . $files->getClientOriginalExtension();
            $files->move('Addproduct', $profileImage);
            $user->profile = $profileImage;
        }
        $user->save();
    }

    public function category_insert(Request $request)
    {

        $user = new category;
        $user->category_name = $request['category_name'];
        $user->slug = $request['slug'];
        $user->status = $request['status'];
        $user->save();
    }


    public function loginview()
    {
        return view('admin.login');
    }
    public function productdelete(Request $request)
    {
        $data = DB::delete('id', $request->id)->get();
        return response()->json([]);
    }
    public function addtocard(Request $request)
    {
        // if($product_id=='')
        // {

        // }


        if ($request->session()->has('userId')) {
            if ($request->submit == 'submit') {
                $user_id = Register::where('id', '=', Session::get('userId'))->first();
                $uesr_get = $user_id->id;
                $product_id = card::where('product_id', '=', $request->product_id)->where('user_id', '=', $uesr_get)->first();
                if ($product_id == '') {
                    $user = new card;
                    $user->product_id = $request['product_id'];
                    $user->quantity = $request['quantity'];
                    $user->user_id = $user_id['id'];
                    $user->status = 'pending';
                    $user->save();
                    return redirect('/');
                } else {
                    $product_id = card::where('product_id', '=', $request->product_id)->where('user_id', '=', $uesr_get)->first();
                    card::where('user_id', '=', $product_id->user_id)->where('product_id', '=', $product_id->product_id)->update([
                        'quantity' => $request['quantity'] + $product_id['quantity']
                    ]);

                    return redirect('/');
                }
            } else {
                $user_id = Register::where('id', '=', Session::get('userId'))->first();
                $uesr_get = $user_id->id;
                $product_id = buy_now::where('product_id', '=', $request->product_id)->where('user_id', '=', $uesr_get)->first();
                if ($product_id == '') {
                    $user = new buy_now;
                    $user->product_id = $request['product_id'];
                    $user->quantity = $request['quantity'];
                    $user->user_id = $user_id['id'];
                    $user->status = 'pending';
                    $user->save();
                    $request->session()->put('productId', $user->product_id);
                    return redirect('/buy_view');
                } else {
                    $request->session()->put('productId', $request->product_id);
                    $product_id = buy_now::where('product_id', '=', $request->product_id)->where('user_id', '=', $uesr_get)->first();
                    buy_now::where('user_id', '=', $product_id->user_id)->where('product_id', '=', $product_id->product_id)->update([
                        'quantity' => $request['quantity']
                    ]);
                    return redirect('/buy_view');
                }
            }
        } else {
           
            return redirect('/login');
           
        }
    }

    public function cardlist()
    {
        if (Session::has('userId')) {
            $user = Register::where('id', '=', Session::get('userId'))->first();
            $user_id = $user->id;
            $data = DB::table('card')
                ->join('addproducts', 'card.product_id', 'addproducts.id')
                ->select('addproducts.*', 'card.quantity', 'card.id as card_id')
                ->where('card.user_id', '=', $user_id)
                ->get();

            foreach ($data as $cart) {
                $cart = $cart->price * $cart->quantity;
                $total_sum = $data->sum('price');
                $total_val = $total_sum;
            }

            return view('cartview')->with('data', $data)->with('addtocard', 'Add to card save');
        } else {
            return redirect('/');
        }
    }

    public function cartview()
    {
        return view('cartview');
    }

    public function remove($id)
    {
        if (Session::has('userId')) {
            $user = Register::where('id', '=', Session::get('userId'))->first();
            $user_id = $user->id;
            $data = card::where('product_id', '=', $id)->where('user_id', '=', $user_id)->delete();
            return redirect('/cardlist');
        }
    }


    public function edit($id)
    {
        if (Session::has('adminId')) {
            $admin = Register::where('id', '=', Session::get('adminId'))->first();
            $data = Addproduct::where('id', '=', $id)->first();
            $catgory = category::all();
        }
        return view('admin.producteditt', compact('admin', $admin), compact('data'))->with('catgory', $catgory);
    }


    public function checkout(Request $request)
    {
        if (Session::has('userId')) {
            $user = Register::where('id', '=', Session::get('userId'))->first();
            $user_id = $user->id;
            $data = DB::table('card')
                ->join('addproducts', 'card.product_id', 'addproducts.id')
                ->select('addproducts.*', 'card.quantity', 'card.product_id as prodcut_id_get')
                ->where('card.user_id', '=', $user_id)
                ->get();
        }
        return view('shopingcard')->with('data', $data);
    }


    public function update_product(Request $request)
    {

        if ($request->file('profile') == "") {
            $profileImage = $request->profileimage;
        } else {

            if ($files = $request->file('profile')) {
                $profileImage = time() . "." . $files->getClientOriginalExtension();
                $files->move('Addproduct', $profileImage);

                // unlink(public_path('Addproduct',$request->profileimage));
                // 'profile'=>profile = $profileImage;
            }
        }
        Addproduct::where('id', '=', $request->id)->update([
            "name" => $request['name'],
            "slug" => $request['slug'],
            "price" => $request['price'],
            "size" => $request['size'],
            "size" => $request['size'],
            'sku' => $request['skucode'],
            "color" => $request['color'],
            "description" => $request['description'],
            "profile" => $profileImage

        ]);
    }

    public function buy_view()
    {
        if (Session::has('userId')) {
            if (Session::has('productId')) {
                $user = Register::where('id', '=', Session::get('userId'))->first();
                $user_id = $user->id;
                $product_id = buy_now::where('product_id', '=', Session::get('productId'))->first();
                $product_id_get = $product_id->id;
                $data = DB::table('buy_nows')
                    ->join('addproducts', 'buy_nows.product_id', 'addproducts.id')
                    ->select('addproducts.*', 'buy_nows.quantity', 'buy_nows.product_id as prodcut_id_get')
                    ->where('buy_nows.id', '=', $product_id_get)->where('buy_nows.user_id', '=', $user_id)
                    ->get();
                return view('shopingcard')->with('data', $data);
            } else {
                return redirect('/');
                // return view('shopingcard',compact('total_val'))->with('data', $data);
            }
        }
    }

    public function order_place(Request $request)
    {
        $data = $request->all();
        foreach (range(1, 25) as $index) {
            $order = '#' . sprintf("%08d", $index);
        }
        if (Session::has('userId')) {
            $user = Register::where('id', '=', Session::get('userId'))->first();
            $user_id = $user->id;

            $updateTime = new \DateTime();
            $updated_at = $updateTime->format("Y-m-d H:i:s");
            if (count($data['quantity_get']) > 0) {
                foreach ($data['quantity_get'] as $item => $value) {

                    $emaildata = array(
                        'product_id' => $request['prodcut_id_get'][$item],
                        'user_id' =>  [$user_id][$item],
                        'quantity' => $request['quantity_get'][$item],
                        'name' => $request['firstName'][$item],
                        'email' => $request['email'][$item],
                        'status' => ['paid'][$item],
                        'total_price' => $request['payment'][$item],
                        'date' => $updated_at,
                        'order' => $order
                    );
                    order_detail::insert($emaildata);
                    $data = buy_now::where('product_id', '=', $request->prodcut_id_get)->where('user_id', '=', $user_id)->delete();
                    $data = card::where('product_id', '=', $request->prodcut_id_get)->where('user_id', '=', $user_id)->delete();
                }
            }
            $data = ['name' => "satendra", 'data' => $emaildata];
            $user['to'] = $request->email;
            Mail::send('mail', $data, function ($message) use ($user) {
                $message->to($user['to']);
                $message->subject("Order Details");
            });
        }
    }




    public function order()
    {

        if (Session::has('adminId')) {
            $admin = Register::where('id', '=', Session::get('adminId'))->first();

            $data = DB::table('order_details')
                ->join('addproducts', 'order_details.product_id', 'addproducts.id')
                ->select('order_details.*', 'addproducts.*', 'order_details.status as get_status', 'order_details.id as get_id')
                ->orderBy('order_details.id', 'DESC')
                ->paginate(7);
                $delivery=Register::where('type',"=","D")->get();
        }
        return view('admin.order', compact('admin', $admin))->with('data', $data)->with('delivery',$delivery);
    }
    public function quantity_update(Request $request)
    {
        card::where('id', '=', $request->id)->update([
            "quantity" => $request['quantity'],


        ]);
    }




    public function check(Request $request)
    {
         if( $request->wallet=="wallet"){
        if (Session::has('userId')) {
            $user = Register::where('id', '=', Session::get('userId'))->first();
            $user_id = $user->id;
            $val=$request->payment;
            $wallet = $user->wallet_amount;
            if(!($val< $wallet)){
                return response()->json([
                       "error"=>"error"
                ]);
            }
            $name = $request->firstName;
            $email = $request->email;
            $address = $request->address;
            $updateTime = new \DateTime();
            $updated_at = $updateTime->format("Y-m-d H:i:s");
            $payment = $request->payment;
            $end_token = DB::select('select max(order_id) from order_details');
            $sequenceNumber = 1;
            if ($end_token[0]->max != '') {
                $sequenceNumber = (int)$end_token[0]->max + 1;
            }
            if (count($request['quantity_get']) > 0) {
                foreach ($request->quantity_get as $key => $productid) {
                    $data = new order_detail();
                    $product_name = $request->prodcut_id_get[$key];
                    $data->user_id = $user_id;
                    $data->name = $name;
                    $data->email = $email;
                    $data->address = $address;
                    $data->order_id = sprintf("%'.05d", $sequenceNumber);
                    $data->total_price = $payment;
                    $data->quantity = $request->quantity_get[$key];
                    $data->product_id = $request->prodcut_id_get[$key];
                    $data->status = 'paid';
                    $data->order_status = 'Pending';
                    $data->date = $updated_at;
                    $success = $data->save();
                    $data = buy_now::where('product_id', '=', $request->prodcut_id_get)->where('user_id', '=', $user_id)->delete();
                    $datadelete = card::where('product_id', '=', $product_name)->where('user_id', '=', $user_id)->get();
                    if ($datadelete->count()) {
                        $data = card::where('product_id', '=', $product_name)->where('user_id', '=', $user_id)->delete();
                    }
                }
            }
      
           
                  $wallet = $user->wallet_amount;
                  $updateTime = new \DateTime();
                  $updated_at = $updateTime->format("Y-m-d H:i:s");
                   $data= new wallet_amount;
                    $data->user_id=$user_id;
                    $data->deposit="";
                    $data->walllet_amounts="0";
                    $data->withdrawal= $request->payment;
                    $data->status="Active";
                    $data->Date=$updated_at;
                    $data->save();
                    $val=$request->payment;
            Register::where('id', '=',$user_id)->update([
                'wallet_amount' =>  $wallet - $val
            ]);

        }
    }else{

        if (Session::has('userId')) {
            $user = Register::where('id', '=', Session::get('userId'))->first();
            $user_id = $user->id;
            $name = $request->firstName;
            $email = $request->email;
            $address = $request->address;
            $updateTime = new \DateTime();
            $updated_at = $updateTime->format("Y-m-d H:i:s");
            $payment = $request->payment;
            $end_token = DB::select('select max(order_id) from order_details');
            $sequenceNumber = 1;
            if ($end_token[0]->max != '') {
                $sequenceNumber = (int)$end_token[0]->max + 1;
            }
            if (count($request['quantity_get']) > 0) {
                foreach ($request->quantity_get as $key => $productid) {
                    $data = new order_detail();
                    $product_name = $request->prodcut_id_get[$key];
                    $data->user_id = $user_id;
                    $data->name = $name;
                    $data->email = $email;
                    $data->address = $address;
                    $data->order_id = sprintf("%'.05d", $sequenceNumber);
                    $data->total_price = $payment;
                    $data->quantity = $request->quantity_get[$key];
                    $data->product_id = $request->prodcut_id_get[$key];
                    $data->status = 'paid';
                    $data->order_status = 'Pending';
                    $data->date = $updated_at;
                    $success = $data->save();
                    $data = buy_now::where('product_id', '=', $request->prodcut_id_get)->where('user_id', '=', $user_id)->delete();
                    $datadelete = card::where('product_id', '=', $product_name)->where('user_id', '=', $user_id)->get();
                    if ($datadelete->count()) {
                        $data = card::where('product_id', '=', $product_name)->where('user_id', '=', $user_id)->delete();
                    }
                }
            }

        }


}
    return response()->json([
        "success"=>"success"
 ]);
   
        // return redirect('/');
    }

    public function myorder()
    {
        if (Session::has('userId')) {

            $user = Register::where('id', '=', Session::get('userId'))->first();
            $user = Register::where('id', '=', Session::get('userId'))->first();
            $user_id = $user->id;
            $data = DB::table('order_details')
                ->join('addproducts', 'order_details.product_id', 'addproducts.id')
                ->select('order_details.*', 'addproducts.*', 'order_details.id as get_id','order_details.user_id as user_order_id')
                ->where('order_details.user_id', '=', $user_id)
                ->simplePaginate(5);
                // ->get();
            return view('myorder')->with('data', $data)->with('addtocard', 'Add to card save');
        } else {
            return redirect('/login');
        }

        // return view('myorder');
    }

    public function order_view($id)
    {
        if (Session::has('adminId')) {
            $admin = Register::where('id', '=', Session::get('adminId'))->first();
            $data = DB::table('order_details')
                ->join('addproducts', 'order_details.product_id', 'addproducts.id')
                ->select('order_details.*', 'addproducts.*', 'order_details.status as get_status', 'order_details.id as get_id', 'order_details.name as names')
                ->where('order_details.id', '=', $id)
                ->get();
        }
        return view('admin.order_details', compact('admin', $admin))->with('data', $data);
    }


    public function forget()
    {
        return view('forgetpasswordmail');
    }
    public function forgetpassword(Request $request)
    {
        $user = Register::where('email', '=', $request->email)->orwhere('phone', '=', $request->email)->first();
        if ($user) {
            $six_digit_random_number = random_int(100000, 999999);
            $hashdata = Hash::make($six_digit_random_number);
            Register::where('email', '=', $request->email)->update([
                "password" =>  $hashdata
            ]);
            $data = ['name' => "satendra", 'data' => $six_digit_random_number];
            $user['to'] = $user->email;
            Mail::send('forgetmail', $data, function ($message) use ($user) {
                $message->to($user['to']);
                $message->subject("password Forget");
            });
            return redirect('/login')->with('updatepassword', 'hdh');
        } else {
            return back()->with('failforg', 'You are not registered with us. Please sign up.');
        }
    }
    public function changepassword()
    {
        return view('changepassword');
    }

    public function updatepassword(Request $request)
    {
        if (Session::has('userId')) {
            $user = Register::where('id', '=', Session::get('userId'))->first();
            $user_email = $user->email;
            $hashdata = Hash::make($request->password);
            $user = Register::where('email', '=', $user_email)->first();
            if ($user) {
                if (Hash::check($request->curpassword, $user->password)) {
                    Register::where('email', '=', $user_email)->update([
                        "password" => $hashdata
                    ]);
                    return redirect('/login')->with('updatepassword', 'hdh');
                }
            }
            return back()->with('failforgpass', 'Current password not match');
        }
    }

    public function wishlist()
    {

        if (Session::has('userId')) {
            $user = Register::where('id', '=', Session::get('userId'))->first();
            $user_id = $user->id;
            $data = DB::table('wishlists')
                ->join('addproducts', 'wishlists.product_id', 'addproducts.id')
                ->select('addproducts.*', 'wishlists.quantity', 'wishlists.id as card_id', 'wishlists.product_id as get_id')
                ->where('wishlists.user_id', '=', $user_id)
                ->get();

            return view('wishlist')->with('data', $data)->with('addtocard', 'Add to card save');
        } else {
            return redirect('/');
        }
    }
    public function rating_get(Request $request)
    {
        $userid = $request->userid;
        $employees = order_detail::find($userid);
        return response()->json([
            'data' => $employees,
        ]);
    }

    public function send_rating(Request $request)
    {
        $user = Addproduct::where('id', '=', $request->product_id)->first();
        if ($user == '') {
            $data = new rating;
            $data->user_id = $request->user_id;
            $data->product_id = $request->product_id;
            $data->rating = $user->rating + $request->rating;
            $data->status = "panding";
            $data->save();
            return response()->json([
                'data' => $data,
            ]);
        } else {
            Addproduct::where('id', '=', $request->product_id)->update([
                'rating' => $user['rating'] + $request['rating'],
                'product_id' => $request['product_id'],
                'userid_get' => $user['userid_get']=='' ? $request['user_id']:$user['userid_get'].",".$request['user_id'],
                'rating_count' => $user['rating_count'] + 1,
            ]);
            return response()->json([
                'success' => "Rating add success",
            ]);
        }
    }

    public function remove_wishlist($id)
    {
        if (Session::has('userId')) {
            $user = Register::where('id', '=', Session::get('userId'))->first();
            $user_id = $user->id;
            $data = wishlist::where('id', '=', $id)->where('user_id', '=', $user_id)->delete();
            return redirect('/wishlist');
        }
    }



    public function rating_data()
    {
        $user = rating::all();
        $count = $user->count();
        $data = DB::table('addproducts')
            ->join('ratings', 'addproducts.id', 'ratings.product_id')
            ->select('ratings.*', 'addproducts.*')
            ->avg('rating')
            ->get();
        dd($data);
    }

    public function addwishlist(Request $request)
    {
       
        if ($request->session()->has('userId')) {
            if ($request->wishlist == 'wishlist') {
                $user_id = Register::where('id', '=', Session::get('userId'))->first();
                $uesr_get = $user_id->id;
            $product_id = wishlist::where('product_id', '=', $request->product_id)->where('user_id', '=', $uesr_get)->first();
            if ($product_id == '') {
                $user = new wishlist;
                $user->product_id = $request['product_id'];
                $user->quantity = $request['quantity'];
                $user->user_id = $user_id['id'];
                $user->status = 'pending';
                $user->save();
                return 1;
            } else {
                $product_id = wishlist::where('product_id', '=', $request->product_id)->where('user_id', '=', $uesr_get)->first();
                wishlist::where('user_id', '=', $product_id->user_id)->where('product_id', '=', $product_id->product_id)->update([
                    'quantity' => $request['quantity']
                ]);

                return redirect('/');
            }
        }

    
    }
    return 0;

    }
    public function get_cate(Request $request)
    {
        $userid = $request->cat_id;
        $employees = Addproduct::where('slug','=',$userid)->get();
        return response()->json([
            'data'=> $employees,
        ]);
    }



    public function logoutadmin(){
        session::forget('adminId');
        return redirect('/');
    }
  
public function category_data(){

    if (Session::has('adminId')) {
        $admin = Register::where('id', '=', Session::get('adminId'))->first();
        $data = DB::table('productcategories')->paginate(6);
    }
    return view('Admin.category_data', compact('admin', $admin))->with('data', $data);

}

public function cate_delete($id)
{
    if (Session::has('userId')) {
        $user = Register::where('id', '=', Session::get('adminId'))->first();
        $user_id = $user->id;
        $data = category::where('id', '=', $id)->delete();
        return redirect('/category_data');
    }
}

public function changeStatus(Request $request)
{
    $user = category::find($request->user_id);
    $user->status = $request->status;
    $user->save();

    return response()->json(['success'=>'Status change successfully.']);
}



public function wellet_get(Request $request)
{
    
    if (Session::has('userId')) {
        $user_id = Register::where('id', '=', Session::get('userId'))->first();
          $uesr_get = $user_id->id;
          $updateTime = new \DateTime();
          $updated_at = $updateTime->format("Y-m-d H:i:s");
           $data= new wallet_amount;
            $data->user_id=$uesr_get;
            $data->deposit=$request->wallet_amount;
            $data->withdrawal="";
            $data->walllet_amounts="0";
            $data->status="Active";
            $data->Date=$updated_at;
            $data->save();
    Register::where('id', '=',$uesr_get)->update([
        'wallet_amount' => $request['wallet_amount']+ $user_id['wallet_amount']
    ]);
    return response()->json(['success'=>'Status change successfully.']);
    }
}

public function delivery_update(Request $request){
         
          order_detail::where('id', '=',$request->id)->update([
        'order_status' => 'Delivered',
        'delivey_name'=>$request['select_name']
    ]);
    return response()->json(['success'=>'Status change successfully.']);

}


public function search(Request $request){
    $search = $request->searchval;
    $category=category::where('status','active')->get();
    if($search != "") {
        $users = DB::table('addproducts')
        ->join('productcategories','productcategories.id',DB::raw('CAST(addproducts.slug as int)'))
        ->where('productcategories.status', 'active')
        ->where('name','LIKE','%'. $search.'%')
        ->orwhere('category_name','LIKE','%'. $search.'%')
        ->select('addproducts.*',)
        ->get();
        return view ('index')->with('data',$users)->with('category',$category);
    }
    return redirect('/');
}
public function user_pdf()
{
    if (Session::has('userId')) {
        $user_id = Register::where('id', '=', Session::get('userId'))->first();
          $uesr_get = $user_id->id;
          $wallet_data = wallet_amount::where('user_id', '=',$uesr_get )
          
        ->get();
           
          $pdf = PDF::loadView('user_pdf', [
            'data' => $wallet_data
          ]);
          return $pdf->download('user_data.pdf');
       

}

}


public function check_insert(Request $request){

    $check_email = check_data::where('email',$request->email)->first();
    if($check_email){
           return response()->json([
              'email_check'=>"email_check"
           ]);
    }else{
      $validator = Validator::make($request->all(), [
        'resume'=>'required|mimes:pdf,docx,doc',
  
      ]);
      if( $validator->fails() ) {
          return response()->json([
              'pdf' => 'pdf',
          ]);
      }else{
          $emaildata = array(
                 'name'=>$request['name'],
                 'email'=>$request['email'],
              //    if ($files = $request->file('resume')) {
              //     $name = time() . "." . $files->getClientOriginalExtension();
              //     $files->move('file', $name);
              //     $user->resume = $name;
              // }
              );
              $data = ['name' => "satendra", 'data' => $emaildata];
              $user['to'] = 'satendramawai41@gmail.com';
              Mail::send('mail', $data, function ($message) use ($user) {
                  $message->to($user['to']);
                  $message->subject("Order Details");
              });
              check_data::insert($emaildata);
              // $user->save();
              return response()->json([
                  'success' => 'success',
              ]);
      }
    }
  
  
  }
public function check_mail(){
    $files_get = [
        'images/px-conversions/2.webp',
        'images/px-conversions/1.webp',
        'images/px-conversions/3.webp',
    ];
  
return view('check_mail',compact('files_get'));
}

public function mail_send(){
    $files_get = [
        'images/px-conversions/2.webp',
        'images/px-conversions/1.webp',
        'images/px-conversions/3.webp',
    ];
    $emaildata="hello";
    $data = ['name' => "satendra", 'files_get' => $files_get];
    $user['to'] = 'satendra.pal@mawaimail.com';
    Mail::send('check_mail', $data, function ($message) use ($user) {
        $message->to($user['to']);
        $message->subject("Order Details");
    });
}

}
