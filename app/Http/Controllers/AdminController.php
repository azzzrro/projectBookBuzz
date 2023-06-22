<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\User;
use App\Models\Book;
use App\Models\Event;
use App\Models\News;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    // public function  ahashp()
    // {
    //     $paw = Crypt::encrypt('admin@bookbuzz123');
    //     DB::table('admins')
    //         ->where(['email' => "admin@bookbuzz.com"])
    //         ->update([
    //             'password' => $paw
    //         ]);

    //     dd($paw);
    // }

    public function login()
    {
        return view('admin/auth/login');
    }

    public function checkadmin(Request $request)
    {

        //validate
        $request->validate([

            'email' => 'required',
            'password' => 'required',
        ]);
        //validate
        $result = DB::table('admins')
            ->where(['email' => $request->email])
            ->get();

        // dd($result);
         
        $db_pwd = $request->password;
        $db_pw = Crypt::decrypt($result[0]->password);
        // dd($db_pwd,$db_pw);
        
        if (isset($result[0]->id)) {

            if ($db_pwd == $db_pw) {
                $request->session()->put('ADMIN_LOGIN', true);
                $request->session()->put('ADMIN_ID', $result['0']->id);
                $request->session()->put('LoggedAdmin', $result['0']->id);
                return redirect('admin/home');
            } else {
                return redirect()->back()->with('fail', 'Invalid password');
            }
        } else {
            return redirect()->back()->with('fail', 'We do not recognise your email address');
        }

    }

    public function index()
    {
        $data['users']=User::where(['role_id'=>"1"])->get(); 
        $data['vendors']=User::where(['role_id'=>"2"])->get(); 
        return view('admin/pages/index',$data);
    }

    public function admin_books()
    {
        $data['books']=Book::all(); 
       
        // dd($data);
        return view('admin/pages/books',$data);
    }

   

    public function set_book(Request $request,$status,$id)
    {
        $data=Book::find($id);
        $data->status=$status;
        $data->save();  
        return redirect()->back();
    }

    public function set_bestseller(Request $request,$status,$id)
    {
        $data=Book::find($id);
        $data->best_seller=$status;
        $data->save();  
        return redirect()->back();
    }

    
    public function delete_book($id)
    {
        $data=Book::find($id);
        $data->delete();
        return redirect()->back();
    }

    
    public function contact()
    {
        $data['enquiries']=Contact::all(); 
        return view('admin/pages/enquiries',$data);
    }

    public function admin_events()
    {
        $data['event']=Event::all(); 
        foreach($data['event'] as $list){
            $data['user_detail'][$list->user_id]=User::where(['id'=>$list->id])->get(); 
        }
        // dd($data);
        return view('admin/pages/admin_events',$data);
    }

    public function admin_upload_events(Request $request)
    {
        $data = new Event; 
        $data->title=$request->title;  
        $data->description=$request->description; 
        
        $file=$request->file('image_link');
        $filename = time().'.'.$file->extension();
        $file->move(public_path('event_pic'),$filename);
        $data->image=$filename;

        $data->address=$request->address;
        $data->join_link=$request->join_link;
        $data->status="0";

        $data->save();

        return redirect()->back();
    }

    public function set_event(Request $request,$status,$id)
    {
        $data=Event::find($id);
        $data->status=$status;
        $data->save();  
        return redirect()->back();
    }

    public function delete_event($id)
    {
        $data=Event::find($id);
        $data->delete();
        return redirect()->back();
    }

    public function admin_news()
    {
        $data['news']=News::all(); 
        foreach($data['news'] as $list){
            $data['user_detail'][$list->user_id]=User::where(['id'=>$list->id])->get(); 
        }
        // dd($data);
        return view('admin/pages/admin_news',$data);
    }

    public function admin_upload_news(Request $request)
    {
        $data = new News; 
        $data->title=$request->title;  
        $data->description=$request->description; 
        
        $file=$request->file('image_link');
        $filename = time().'.'.$file->extension();
        $file->move(public_path('news_pic'),$filename);
        $data->image=$filename; 
        $data->status="0";

        $data->save();

        return redirect()->back();
    }

    public function set_news(Request $request,$status,$id)
    {
        $data=News::find($id);
        $data->status=$status;
        $data->save();  
        return redirect()->back();
    }

    public function delete_news($id)
    {
        $data=News::find($id);
        $data->delete();
        return redirect()->back();
    }
}
