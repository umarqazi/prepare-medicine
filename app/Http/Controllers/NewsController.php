<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;
use Validator;
use Carbon\Carbon;
use Auth;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = News::orderBy('id', 'DESC')->paginate(15);
        return view('backend.blog.news', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //return view
        return view('backend.blog.add-news-post');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(),[
            'title'=>'required',
            'description'=>'required',
            'featured_img'=>'required'
        ]);
        
        if ($validate->fails()) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'SORRY - Please fill out all fields');
        }

        //make image
        $submitted_image = $request->file('featured_img');
        $imgName = "";
        if (isset($submitted_image)) {
            $currentTimeDate = Carbon::now()->toDateString();
            $img_uniqueName = $currentTimeDate.'-'.uniqid().'.'.$submitted_image->getClientOriginalExtension();

            //now check directory
            if (!file_exists('/home/kohin837/public_html/preparemedicine.com/storage/blog')) {
                mkdir('/home/kohin837/public_html/preparemedicine.com/storage/blog', 0777, true);
            }

            //now move upload image ok
            $moved = $submitted_image->move('/home/kohin837/public_html/preparemedicine.com/storage/blog/', $img_uniqueName);
            if ($moved) {
                $imgName = $img_uniqueName;
            }else{
                return redirect()->back()
                    ->withInput()
                    ->with('error', "Featured Image Uploading Problem");
            }
        }

        $inserted = News::insert([
                    'title'=>$request->title,
                    'description'=>$request->description,
                    'featured_img'=>$imgName,
                    'created_at'=>Carbon::now(),
                ]);
        if ($inserted == true) {
            return redirect()->back()
                    ->with('success', 'SUCCESS - Post Saved');
        }else{
            return redirect()->back()
                    ->with('error', 'SORRY - Something Wrong...');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $data = News::where('id', $id)->first();
        if ($data) {
            return view('backend.blog.news-edit', compact('data'));
        }else{
            return abort(404);
        }
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       $data = News::where('id', $id)->first();
       
        if ($data) {
           $validate = Validator::make($request->all(),[
                'title'=>'required',
                'description'=>'required',
            ]);
            
            if ($validate->fails()) {
                return redirect()->back()
                    ->withInput()
                    ->with('error', 'SORRY - Title & Description fields required');
            }

           if ($request->hasFile('featured_img')) {

                //make image
                $submitted_image = $request->file('featured_img');
                $imgName = "";
                    
                $currentTimeDate = Carbon::now()->toDateString();
                $img_uniqueName = $currentTimeDate.'-'.uniqid().'.'.$submitted_image->getClientOriginalExtension();


                //now move upload image ok
                $moved = $submitted_image->move('/home/kohin837/public_html/preparemedicine.com/storage/blog/', $img_uniqueName);
                if ($moved) {
                    $imgName = $img_uniqueName;
                }else{
                    return redirect()->back()
                        ->withInput()
                        ->with('error', "Featured Image Uploading Problem");
                }

               //first delete img
               $img = url('storage/blog/').$data->featured_img;
               if ($img) {
                   unlink('storage/blog/'.$data->featured_img);
               }

               $updated = News::where('id', $id)->update([
                        'title'=>$request->title,
                        'description'=>$request->description,
                        'featured_img'=>$imgName,
                        'updated_at'=>Carbon::now(),
                ]);
               
               if ($updated == true) {
                    return redirect()->back()
                            ->with('success', 'SUCCESS - Post Updated');
                }else{
                    return redirect()->back()
                            ->with('error', 'SORRY - Something Wrong...');
                }
           }else{
                $updated = News::where('id', $id)->update([
                            'title'=>$request->title,
                            'description'=>$request->description,
                            'updated_at'=>Carbon::now(),
                    ]);
                   if ($updated == true) {
                        return redirect()->back()
                                ->with('success', 'SUCCESS - Post Updated');
                    }else{
                        return redirect()->back()
                                ->with('error', 'SORRY - Something Wrong...');
                    }
           }
            
        } 

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $data = News::where('id', $id)->first();

       if ($data) {
           $img = url('storage/blog/').$data->featured_img;
           if ($img) {
               unlink('storage/blog/'.$data->featured_img);
           }
           $deleted = $data->delete();
           if ($deleted == true) {
               return redirect()->back()
                    ->with('success', 'SUCCESS - Post Deleted');
           }else{
                return redirect()->back()
                    ->with('error', 'SORRY - Something Wrong');
           }
       }else{
        return abort(404);
       }
       
    }




    //for frontned
    public function details($id){

        
        $data = News::where('id', $id)->first();
        if ($data) {
            return view('frontend.blog.news-details', compact('data'));
        }else{
            return abort(404);
        }
    }
    
    //all blog posts
    // public function blog_posts(){
    //         $blogs = News::orderBy('id', 'DESC')->paginate(30);
    //         return view('frontend.blog.blog-posts', compact('blogs'));
        
    // }
}
