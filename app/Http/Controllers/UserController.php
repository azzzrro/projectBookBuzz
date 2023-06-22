<?php

namespace App\Http\Controllers;


use App\Models\User;
use App\Models\Book;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Event;
use App\Models\News;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;


class UserController extends Controller
{
    public function login()
    {
        return view('login-register');
    }

    public function checkuser(Request $request)
    {

        //validate
        $request->validate([

            'email' => 'required',
            'password' => 'required',
        ]);
        //validate
        $result = DB::table('users')
            ->where(['email' => $request->email])
            ->get();

        // dd($result);
         
        $db_pwd = $request->password;
        $db_pw = Crypt::decrypt($result[0]->password);
        // dd($db_pwd,$db_pw);
        
        if (isset($result[0]->id)) {

            if ($db_pwd == $db_pw) {
                if($result[0]->role_id == "1"){
                    $request->session()->put('USER_LOGIN', true);
                    $request->session()->put('USER_ID', $result['0']->id);
                    $request->session()->put('LoggedUser', $result['0']->id);
                    toast('Welcome','success');
                    return redirect('/');
                }else{
                    $request->session()->put('VENDOR_LOGIN', true);
                    $request->session()->put('VENDOR_ID', $result['0']->id);
                    $request->session()->put('LoggedVendor', $result['0']->id);
                    toast('Welcome','success');
                    return redirect('/vendor/profile');
                }
               
            } else {
                return redirect()->back()->with('fail', 'Invalid password');
            }
        } else {
            return redirect()->back()->with('fail', 'We do not recognise your email address');
        }

    }



    public function reguser(Request $request)
    {

        
        $data = new User;

        $data->name=$request->name; 
        $data->email=$request->email; 
        $data->mobile=$request->mobile; 
        $data->role_id= $request->input('utype');
        $data->password=Crypt::encrypt($request->password);

        $data->save();
        alert()->success('Welcome to Bookbuzz','You have Registered Successfully, Please Login to continue.');
        return redirect()->back();
    }

    public function user_profile(Request $request){
        if($request->session()->has('USER_LOGIN')){
                $id=$request->session()->get('USER_ID');
                $data['orders'] = Order::where(['user_id'=> $id])->get();
                $data['user_details'] = User::where(['id'=> $id])->get();
                // dd($data);
                return view('user/pages/profile',$data);
        }else{
            return redirect('/login');
        }
        
    }

    public function change_user_password(Request $request)
    {
        $result = DB::table('users')
            ->where(['email' => $request->email])
            ->get();

        // dd($result);
         
        $db_pwd = $request->current_pwd;
        $db_pw = Crypt::decrypt($result[0]->password);
        // dd($db_pwd,$db_pw);
        
        if (isset($result[0]->id)) {

            if ($db_pwd == $db_pw) {
                $data=User::find($result[0]->id);
                $data->password=Crypt::encrypt($request->new_pwd);
                $data->save();  
                alert()->success('Your Password is successfully Changed','');
                return redirect()->back();
            } else {
                alert()->warning('Invalid Password','');
                return redirect()->back()->with('fail', 'Invalid password');
            }
        } else {
            return redirect()->back()->with('fail', 'We do not recognise your email address');
        }
       
        return redirect()->back();
    }
    
    public function index(Request $request)
    {
        $id=$request->session()->get('USER_ID');
        $data['books'] = Book::where(['status'=> "1"])->where(['best_seller'=> "1"])->get();
        return view('user/pages/index',$data);
    }

    public function shop(Request $request)
    {
        $id=$request->session()->get('USER_ID');
        $data['books'] = Book::where(['status'=> "1"])->get();
        return view('user/pages/shop',$data);
    }

    public function cat_shop(Request $request,$cid)
    {

        $id=$request->session()->get('USER_ID');
        $data['books'] = Book::where(['status'=> "1"])->where(['category_id'=> $cid])->get();
        return view('user/pages/shop',$data);
    }

    public function autocompleteSearch(Request $request)
    {
          $query = $request->get('query');
          $filterResult = Book::where('name', 'LIKE', '%'. $query. '%')->get();
          return response()->json($filterResult);
    } 

    public function search_process(Request $request)
    {

        $id=$request->session()->get('USER_ID');
        $data['books'] = Book::where(['status'=> "1"])->where('name', 'LIKE', '%'. $request->search. '%')->get();
        return view('user/pages/shop',$data);
    }

    public function shop_detail(Request $request,$bid)
    {
        $id=$request->session()->get('USER_ID');
        $data['books'] = Book::where(['id'=> $bid])->firstorfail();
        return view('user/pages/shop-detail',$data);
    }
    
    public function home_add_to_cart(Request $request,$bid,$tp,$qty)
    {

        $id=$request->session()->get('USER_ID');
        $product_details= Book::where(['id'=> $bid])->firstorfail();
        $check_cart= Cart::where(['user_id'=> $id])->where(['books_id'=> $request->bid])->get();
        if (isset($check_cart[0]->id)) {
            $data = Cart::find($check_cart[0]->id);  
            $data->total_amt=$tp*$qty;   
            $data->qty=$qty;   
            $data->save();
            toast('Book updated','success');
            return redirect()->back();
        }else{
            $data = new Cart; 
            $data->user_id=$id; 
            $data->books_id=$bid;  
            $data->total_amt=$tp*$qty;  
            $data->qty=$qty;   
            $data->save();
            toast('Book added to cart','success');
            return redirect()->back();
        }
       
    }
    
    public function add_to_cart(Request $request)
    {

        $id=$request->session()->get('USER_ID');
        $product_details= Book::where(['id'=> $request->bid])->firstorfail();
        $check_cart= Cart::where(['user_id'=> $id])->where(['books_id'=> $request->bid])->get();
        if (isset($check_cart[0]->id)) {
            $data = Cart::find($check_cart[0]->id); 
            $data->total_amt=$request->price * $request->qty;   
            $data->qty=$request->qty;   
            $data->save();
            toast('Book updated','success');
            return redirect()->back();
        }else{
            $data = new Cart; 
            $data->user_id=$id; 
            $data->books_id=$request->bid; 
            $data->total_amt=$request->price * $request->qty;   
            $data->qty=$request->qty;   
            $data->save();
            toast('Book added to cart','success');
            return redirect()->back();
        }
      
       
    }

    public function cart(Request $request)
    {
        $id=$request->session()->get('USER_ID');
        $data['all_data'] = DB::table('books')
        ->select('books.*','cart.*')
        ->join('cart','cart.books_id','=','books.id')
        ->where(['cart.user_id' => $id])
        ->get();
        // dd($data['all_data']);
         
        return view('user/pages/cart',$data);
    }

    public function delete_from_cart($id)
    {
        Cart::where(['id'=> $id])->delete();
      
        toast('Book removed from cart','success');
        return redirect()->back();
    }
    

    public function checkout(Request $request)
    {
        $id=$request->session()->get('USER_ID');
        $data['all_data'] = DB::table('books')
        ->select('books.*','cart.*')
        ->join('cart','cart.books_id','=','books.id')
        ->where(['cart.user_id' => $id])
        ->get();
       
         
        return view('user/pages/checkout',$data);
    }
    
    public function checkout_process(Request $request)
    {
        $id=$request->session()->get('USER_ID');
        $data['all_data'] = DB::table('books')
        ->select('books.*','cart.*')
        ->join('cart','cart.books_id','=','books.id')
        ->where(['cart.user_id' => $id])
        ->get();

        $orders = DB::table('books')
        ->select('books.*','cart.*')
        ->join('cart','cart.books_id','=','books.id')
        ->where(['cart.user_id' => $id])
        ->get();

        $data = new Order; 
        $data->user_id=$id; 
        $data->name=$request->name; 
        $data->email=$request->email; 
        $data->mobile=$request->phone; 
        $data->address=$request->address; 
        $data->city=$request->city; 
        $data->state=$request->state; 
        $data->pincode=$request->pincode; 
        $data->order_status="pending"; 
        $data->payment_status="success"; 
        $data->payment_type="COD"; 
        $data->total_amount=$request->total_price;  
        $data->save();
        
        Cart::where(['user_id'=> $id])->delete();
         

        foreach($orders as $list){
            $orderlist['user_id']=$id;
            $orderlist['order_id']=$data->id;
            $orderlist['books_id']=$list->books_id;
            $orderlist['price']=$list->total_amt;
            $orderlist['qty']=$list->qty;
            DB::table('order_details')->insert($orderlist);
        }

       

        toast('Book order placed successfully','success');
        return redirect("/");
    }

    
   

    
    //vendor
    public function vendor_profile(Request $request){
        if($request->session()->has('VENDOR_LOGIN')){
                $id=$request->session()->get('VENDOR_ID');
                // $data['orders'] = Order::where(['vendor_id'=> $id])->get();
                $data['books'] = Book::where(['vendor_id'=> $id])->get();
                $data['user_details'] = User::where(['id'=> $id])->get();
                $data['order_details'] = DB::table('order_details')
                ->select('order_details.*','orders.*','books.*')
                ->leftjoin('orders','order_details.order_id','=','orders.id')
                ->leftjoin('books','order_details.books_id','=','books.id') 
                ->get();
                // dd($data);
                return view('user_vendor/pages/vendor-profile',$data);
        }else{
            return redirect('/login');
        }
        
    }

    public function vendor_order_details(Request $request){
        
                $id=$request->session()->get('VENDOR_ID');
                // $data['orders'] = Order::where(['vendor_id'=> $id])->get();
                $data['books'] = Book::where(['vendor_id'=> $id])->get();
                $data['user_details'] = User::where(['id'=> $id])->get();
                $data['order_details'] = DB::table('order_details')
                ->select('order_details.*','books.*')
                ->leftjoin('orders','order_details.order_id','=','orders.id')
                ->leftjoin('books','order_details.books_id','=','books.id') 
                ->get();
                // dd($data);
                return view('user_vendor/pages/order-details',$data);
         
    }

    public function add_books(Request $request)
    {
        $data = new Book;

        $data->vendor_id=$request->session()->get('VENDOR_ID');
        $data->name=$request->name; 
        $data->slug=uniqid(); 
        $data->author=$request->author; 
        $data->category_id=$request->get('category_id');
        $data->best_seller=$request->get('best_seller');
        $data->product_code=$request->product_code; 
        $data->description=$request->description; 
        $data->quantity=$request->qty;

        $file=$request->file('image');
        $filename = time().'.'.$file->extension();
        $file->move(public_path('book_pic'),$filename);
        $data->image=$filename;

        $data->price=$request->price; 
        $data->discount=$request->discount; 
        $data->status="0"; 

        $data->save();
        alert()->success('Your Book is successfully added to Bookbuzz','Please wait until admin verify your book.');
        return redirect()->back();
    }


    public function change_vendor_password(Request $request)
    {
        $result = DB::table('users')
            ->where(['email' => $request->email])
            ->get();

        // dd($result);
         
        $db_pwd = $request->current_pwd;
        $db_pw = Crypt::decrypt($result[0]->password);
        // dd($db_pwd,$db_pw);
        
        if (isset($result[0]->id)) {

            if ($db_pwd == $db_pw) {
                $data=User::find($result[0]->id);
                $data->password=Crypt::encrypt($request->new_pwd);
                $data->save();  
                alert()->success('Your Password is successfully Changed','');
                return redirect()->back();
            } else {
                alert()->warning('Invalid Password','');
                return redirect()->back()->with('fail', 'Invalid password');
            }
        } else {
            return redirect()->back()->with('fail', 'We do not recognise your email address');
        }
       
        return redirect()->back();
    }



    public function upload_contact(Request $request)
    {
        $data = new Contact;
       
        $data->name=$request->name; 
        $data->email=$request->email; 
        $data->mobile=$request->mobile; 
        $data->message=$request->message;  

        $data->save();
        alert()->success('Success Alert','Thank you, your enquiry has been submitted successfully.');

        return redirect()->back();
    }


}
