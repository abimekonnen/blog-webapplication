<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Posts\CreatePostRequest;
use App\Http\Requests\Posts\UpdatePostRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;

class PostController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('verifyCategoriesCount')->only('create','store');
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user)
    {
        if(auth()->user()->isAdmin()){
            return view('posts.index')->with('posts',post::all());
        }else{
            return view('posts.index')->with('posts',post::all()->where('user_id',auth()->id()));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create')->with('categories',Category::all())->with('tags',Tag::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePostRequest $request)
    {
       
         //dd($request->image->store('public/posts'));
         $image =$request->image->store('public/posts');
         $post = Post::create(
             [
                 'title' =>$request->title,
                 'discription' =>$request->discription,
                 'content' =>$request->content,
                 'image' => $image,
                 'published_at' =>$request->published_at,
                 'category_id' =>$request->category,
                 'user_id' => auth()->user()->id
             ]  
         );
         if($request->tags){
             $post->tags()->attach($request->tags);
         }
         session()->flash('success', 'Posts Created successfuly');
         return redirect(route('post.index'));
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
    public function edit(Post $post)
    {
        return view('posts.create')->with('post',$post)->with('categories',Category::all())->with('tags',Tag::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
       
        $data = $request->only(
            [
                'title',
                'discription',
                'published_at',
                'content'
            ]
        );
        
        //cheack if new image 
        if($request->hasFile('image')){
            //upload it
            $image = $request->image->store('public/posts');
            // delete old one
            //Storage::delete($post->image);
            $post->deleteImage(); 
            $data['image'] = $image;
        }
        if ($request->tags){
            $post->tags()->sync($request->tags);
        }
        //update attripute
        $post->update($data);
        session()->flash('success', 'Posts Update successfuly');
        return redirect(route('post.index'));
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
     $post = Post::withTrashed()->where('id',$id)->firstOrFail();
        if($post->trashed()){
            //$src = str_replace('public/', '', $post->imge);
            $post->deleteImage(); 
            $post->forceDelete();
            session()->flash('success', 'Posts Deleted successfuly');
        }else{
            $post->delete();
            session()->flash('success', 'Posts Trashed successfuly');
        }
        return redirect()->back();
    }
     /**
     * Display Trashed the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function trashed(){
        if(auth()->user()->isAdmin()){
            $trashed = Post::onlyTrashed()->get();
        }else{
            $trashed = Post::onlyTrashed()->get()->where('user_id',auth()->id());
        }
        return view('posts.index')->with('posts',$trashed);
    }
    public function restore($id){
        $post = Post::withTrashed()->where('id',$id)->firstOrFail();
        $post->restore();
        session()->flash('success', 'Posts Restore successfuly');
        return redirect()->back();  
      }
}
