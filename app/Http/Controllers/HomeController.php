<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Register;
use App\check_data;
use App\Models\Addproduct;
use App\Models\card;
use Hash;
use App\Models\category;
use Session;
use DB;
use Illuminate\Support\Facades\Validator;
class HomeController extends Controller
{
 
    public function index(){


        $users = DB::table('addproducts')
        ->join('productcategories','productcategories.id',DB::raw('CAST(addproducts.slug as int)'))
        ->where('productcategories.status', 'active')
        ->select('addproducts.*',)
        ->get();
           
        // dd( $users);
        // $data=Addproduct::all(); 
        

    //     if (Session::has('userId')) {
    //     $user = Register::where('id', '=', Session::get('userId'))->first();
    // }
    //     $manager_get=$user->id;

    //     $Addtocart = card::where('user_id','=',$manager_get)->count(); 
        $category=category::where('status','active')->get();
        // $clothes=Addproduct::where('slug','4')->get();
        // $woman=Addproduct::where('slug','6')->get();
        // $electronic=Addproduct::where('slug','2')->get();
       


        return view ('index')->with('data',$users)->with('category',$category);
   
    }
    public function index2(){
        $data=Addproduct::all();
        return view ('index2')->with('data',$data);
    }
    public function indexview(){
        if (Session::has('adminId')) {
            $admin = Register::where('id', '=', Session::get('adminId'))->first();
                
         return view ('Admin.index',compact('admin',$admin));
      }
      return redirect('/login');
      
    }
  
    public function register(){
        return view ('register');
    }
    public function postregister(Request $request){
        $user = Register::where('email', '=', $request->email)->first();            
        if($user)
        {
           return response()->json([
            'error'=>'Email already Exits'    
           ]); 
        }
        else{
        $user=new Register;
        $user->type=$request['type'];
        $user->name=$request['name'];
        $user->email=$request['email'];
        $user->gender=$request['gender'];
        $user->phone=$request['address'];
        $user->password=Hash::make($request['password']);
        if($files=$request->file('profile')){  
            $name=$files->getClientOriginalName();  
            $files->move('images',$name);  
            $user->profile=$name;  
            }  
        $user->save();
        return response()->json([
            'status'=>200
     ]);
        }
      
    }
    public function login(){
        return view ('login');
    }
    public function loginUser(Request $request){
        $user=Register::where('email','=', $request->email)->orwhere('phone','=', $request->email)->first();
        if($user){
               if(Hash::check($request->password,$user->password)){
                 $request->session()->put('user',$user->email);
                //  $request->session()->put('userid',$user->id);
                // if($user->type=="A")
                 if($user->type=='A')   
                 {
                    $request->session()->put('adminIdname', $user->name);
                    $request->session()->put('adminId', $user->id);
                    return redirect('/dashboard');
                 }
                 if( $user->type=='U')
                 {
                    $request->session()->put('userId', $user->id);
                    return redirect('/')->with('success','Signup successfully');
                 }
                 if( $user->type=='D')
                 {
                    return back()->with('delivery','Signup successfully');
                 }
               }else{
                return back()->with('failpass','Password not matches');
               }
        }else{
            return back()->with('fail','You are not registered with us. Please sign up.');
        }
    }
public function logout(){
    session::forget('userId');
    return redirect('/')->with('logout','logout successfully');
}


public function check_page(){

$pages=DB::table('check_pages')->where('flag_value','=','Y')->get();

$pages2=DB::table('check_pages')->get();

return view('check_page')->with('pages',$pages)->with('pages2',$pages2);    
}
}
