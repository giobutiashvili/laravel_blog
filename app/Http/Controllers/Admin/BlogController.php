<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\BlogImage;
use App\Models\Category;
use App\Models\Slug;
use App\Http\Requests\StoreBlogPost;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blog::orderby( 'id' , 'DESC') -> get();
        
        return view('admin/blog/index', compact('blogs'));
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create(){
    
        $categories = Category::orderbyDesc('id')->get();  
        $slugs = Category::orderbyDesc('id')->get(); 

        return view('admin/blog/create', compact('categories','slugs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBlogPost $request)
    {

       

        $blog= new Blog();
        $blog->title = $request -> Title;
        $blog->text = $request -> Text;
        
        $slug = Str::slug($request->Title, '-'); //აქ უკვე ქართული გადადის ინგლისურში
        $blog->slug =$slug; //და მიენიჭება უკვე სათაურს ინგლისური სახელი
        // $slug = str_replace(" ", "-", '$request->Title'); ეს არ ცარიელი ადგილების ჩანაცვლება ტირეებით
        $blog->category_id = $request->Category;


        if($request->hasFile('Image')){
            $file = $request -> Image;
            $imageName = Str::random(20). "." .$file -> getClientOriginalExtension();
            $file -> move(public_path().'/image/blog', $imageName);
            $blog -> image = $imageName;
        }
        $blog -> save();

        if($request->hasFile('Images')){
            $files = $request -> Images;
            foreach($files as $image){

                $blogimage = new BlogImage();
                $imageName = Str::random(20). "." .$image -> getClientOriginalExtension();
                $image -> move(public_path().'/image/blog', $imageName);
                $blogimage->name = $imageName;
                $blogimage->blog_id = $blog->id;

                $blogimage->save();
            }
        }
        $blog->Slugs()->sync($request->slugs);

        return redirect() -> back() -> with('success', 'Success');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
       $blog = Blog::findorfail($id);
       $categories = Category::orderbyDesc('id')->get(); 
       $slugs = Category::orderbyDesc('id')->get(); 
       $ids = $blog->Slugs()->pluck('slug_id')->toArray();

       return view('admin/blog/edit', compact('blog','categories','slugs','ids'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreBlogPost $request, string $id)
    {
        $blog = Blog::findorfail($id);

        $blog->title = $request -> Title;
        $blog->text = $request -> Text;
        $blog->category_id = $request->Category;

        if($request->hasfile('Image')){
            if ($blog->image){ // ვამოწმებთ აქვს თუ არა ბლოკს შესაბამისი ფოტო ბაზაში
                $path = public_path().'/image/blog/'.$blog->image; // ვქმნით მისამართს რო ქონდეს ფოტოს
                if(file_exists($path)){  // ვამოწმებთ თუ არსებობს შემდეგ ეგეთი ფაილი
                    unlink($path); // წავშლით
                }
            }
            $file = $request->Image;
            $imageName = Str::random(20). "." .$file -> getClientOriginalExtension();
            $file->move(public_path().'/image/blog', $imageName);
            $blog->image = $imageName;

        }


        $blog->save();

        $blog->Slugs()->sync($request->slugs);

        return redirect() -> back() -> with('success', 'ოპერაცია წარმატებით დარედაქტირდა');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $blog = Blog::findorfail($id);

        if ($blog->image){ // ვამოწმებთ აქვს თუ არა ბლოკს შესაბამისი ფოტო ბაზაში
            $path = public_path().'/image/blog/'.$blog->image; // ვქმნით მისამართს რო ქონდეს ფოტოს
            if(file_exists($path)){  // ვამოწმებთ თუ არსებობს შემდეგ ეგეთი ფაილი
                unlink($path); // წავშლით
            }
        }
        $blog->delete();
        return redirect() -> back() -> with('success', 'ოპერაცია წარმატებით დასრულდა');
    }
}
