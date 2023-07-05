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

class BlogController extends Controller
{
    public function addPost(Request $request)
    {



        try {
            $request->validate([
                'title' => 'required',
                'body' => 'required',
                'users_id' => 'required'
            ]);
            $input = Blogs::create([
                'title' => $request->title,
                'body' => $request->body,
                'users_id' => $request->users_id
            ]);
            
            return redirect('blogsView');
        } catch (Exception $e) {
            $message = "<h1>There might be an error in your operation.. Please try again</h1>
            <br />       
            " . $e->getMessage();
            echo $message;
        }
    }

    public function store(Request $request, $id)
    {
        
        return view('blogs',['id'=>$id]);
    }

    public function index($id)
    {
        $data = Blogs::where('users_id',$id)->get();
        return view('blogsView',['data'=>$data]);
    }

    function destroy(Request $request, $id)
    {
        //$query = DB::table('users')->where('id', $id)->delete();
        try {
            $query = Blogs::find($id);
            // if ($query) {
            //     echo "deleted Successfully";
            // }
            if ($query) {
                Blogs::find($id)->delete();
                return true;
            } else
                return false;
        } catch (Exception $e) {
            return false;
        }
    }

    public function edit($id)
    {
        try {
            $data = Blogs::find($id);
            return view('edit_blogs', ['data' => $data]);
        } catch (Exception $e) {
            $message = "<h1>There might be an error in your operation.. Please try again</h1>
                <br />       
        " . $e->getMessage();
            echo $message;
        }
    }

    public function update(Request $request)
    {

        
        try {
            $request->validate([
                'title' => 'required',
                'body' => 'required',
            ]);
            $data = Blogs::find($request->id);
            $data->title = $request['title'];
            $data->body = $request['body'];
            $data->save();
            return redirect('blogsView/'.$request->data_id);
        } catch (Exception $e) {
            $message = $e->getMessage();
            echo $message;
        }
    }
}
