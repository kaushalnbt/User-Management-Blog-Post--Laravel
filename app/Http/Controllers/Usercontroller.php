<?php

namespace App\Http\Controllers;

use App\Models\Blogs;
use Illuminate\Http\Request;
use App\Models\Entry;
use Illuminate\Console\View\Components\Alert;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Input\Input;
use App\Models\User;
use Exception;
use App\Http\Controllers\BlogCountController;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;


class Usercontroller extends Controller
{
    function store(Request $request)
    {
        try {
            DB::transaction(function () use ($request) {
                $request->validate([
                    'Name' => 'required',
                    'Email' => 'required|email',
                    'Phone' => 'required',
                    'Address' => 'required',
                    'State' => 'required',
                    'Gender' => 'required',
                    'Hobbies' => 'required',
                    'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
                ]);
                
                $image = $request->file('image');
                $imageName = $request->Name.'.'.$image->extension();
                $image->storeAs('public/images', $imageName);

                Entry::create([
                    'Name' => $request->Name,
                    'Email' => $request->Email,
                    'Phone' => $request->Phone,
                    'Address' => $request->Address,
                    'Gender' => $request->Gender,
                    'Hobbies' => implode(",", $request->Hobbies),
                    'State' => $request->State,
                    'image' => $imageName
                ]);
                // dd($request);
                DB::commit();
            });
            return redirect('index');
        } catch (Exception $e) {
            DB::rollBack();
            $message = $e->getMessage();
            echo $message;
        }
        //     if($request){
        //     $query = DB::table('users')->insert([
        //         'Name' => $request->Name,
        //         'Email' => $request->Email,
        //         'Phone' => $request->Phone,
        //         'Address' => $request->Address,
        //         'Gender' => $request->Gender,
        //         'Hobbies' => implode(",", $request->Hobbies),
        //         'State' => $request->State
        //     ]);
        // }
        // else{
        //     echo "Data Required";
        // }
        //     if ($query) {
        //         //echo "Data Entered Successfully";
        //         return redirect('index');
        //     }
        //     else{
        //         return redirect()->back()->with('message','Data Not Inserted, Please Try Again..');
        //     }

    }

    function index()
    {
        //$store = DB::select("select * from users");
        $store = Entry::with('getBlogs')->get();
        return view('users_data', ['user' => $store]);
    }

    function destroy(Request $request, $id)
    {
        //$query = DB::table('users')->where('id', $id)->delete();
        try {
            $query = Entry::find($id);
            // if ($query) {
            //     echo "deleted Successfully";
            // }
            if ($query) {
                Entry::find($id)->delete();
                return true;
            } else
                return false;
        } catch (Exception $e) {
            return false;
        }
    }

    public function edit($id)
    {
        $states = array("Andhra Pradesh", "Arunachal Pradesh", "Assam", "Bihar", "Chhattisgarh", "Goa", "Gujarat", "Haryana", "Himachal Pradesh", "Jammu and Kashmir", "Jharkhand", "Karnataka", "Kerala", "Madhya Pradesh", "Maharashtra", "Manipur", "Meghalaya", "Mizoram", "Nagaland", "Odisha", "Punjab", "Rajasthan", "Sikkim", "Tamil Nadu", "Telangana", "Tripura", "Uttarakhand", "Uttar Pradesh", "West Bengal", "Andaman and Nicobar Islands", "Chandigarh", "Dadra and Nagar Haveli", "Daman and Diu", "Delhi", "Lakshadweep", "Puducherry");
        $hobbies = array("Cricket", "Singing", "Dancing", "Travelling", "Swimming");
        try {
            $users = Entry::find($id);
            $Hobbies = $users->Hobbies;
            $store = explode(",", $users->Hobbies);
            return view('edit', ['users' => $users, 'states' => $states, 'hobbies' => $hobbies, 'store' => $store]);
        } catch (Exception $e) {
            $message = "<h1>There might be an error in your operation.. Please try again</h1>
                <br />       
        " . $e->getMessage();
            echo $message;
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'Name' => 'required',
                'Email' => 'required|email',
                'Phone' => 'required',
                'Address' => 'required',
                'State' => 'required',
                'Gender' => 'required',
                'Hobbies' => 'required'

            ]);
            // $query = DB::table('users')->where('id', $id)->update([
            //     'Name' => $request->Name,
            //     'Email' => $request->Email,
            //     'Phone' => $request->Phone,
            //     'Address' => $request->Address,
            //     'Gender' => $request->Gender,
            //     'Hobbies' => implode(",", $request->Hobbies),
            //     'State' => $request->State
            // ]);
            $users = Entry::find($id);
            $users->Name = $request['Name'];
            $users->Email = $request['Email'];
            $users->Phone = $request['Phone'];
            $users->Address = $request['Address'];
            $users->Gender = $request['Gender'];
            $users->Hobbies = implode(",", $request->Hobbies);
            $users->State = $request['State'];
            $users->save();
            return redirect('index')/*->route('fetch')*/->with('success', 'Successfully Updated!');
        } catch (Exception $e) {
            $message = $e->getMessage();
            echo $message;
        }
        // if($users){
        // // $users->update();

        // return redirect('index')/*->route('fetch')*/->with('success', 'Successfully Updated!');
        // }
        // else
        // {
        //     echo "Data Not Updated";
        // }
    }

    public function getImage(Request $request, $image) 
     {
        $store = Entry::where(['image' =>$image])->get();
        return view('image_view',['data'=> $store]);
    }
}
