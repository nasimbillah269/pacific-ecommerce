<?php

namespace App\Http\Controllers\Welcome;

use Image;
use Auth;
use Hash;
use Str;
use Session;
use Carbon\Carbon;
use App\Models\Country;
use App\Models\Post;
use App\Models\Media;
use App\Models\PostExtra;
use App\Models\User;
use App\Models\Attribute;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class WelcomeController extends Controller
{
  
    public function __construct(){
        $this->middleware('cart');
    }
	public function geo_filter($id){

      $datas=Country::where('parent_id',$id)->get();
      $geoData =View('geofilter',compact('datas'))->render();
       return Response()->json([
              'success' => true,
              'geoData' => $geoData,
            ]);
    }
    
    public function imageView(Request $r){
        if($r->imageUrl && is_numeric($r->weight) && is_numeric($r->height)){
          $image = Image::make($r->imageUrl)->fit($r->weight,$r->height)->response();
        }else{
          $image = Image::make('public/medies/noimage.jpg')->fit(200,200)->response();
        }
        return $image;
    }
    
    public function imageView2(Request $r,$template=null,$image=null){
        $weight=null;
        $height=null;
        if(is_numeric($r->w)){
          $weight=$r->w;  
        }
        if(is_numeric($r->h)){
          $height=$r->h;  
        }
        
        $filePath='public/medies/profile.png';
        
        if($image){
            $file =Media::where('file_rename',$image)->select(['file_url'])->first();
            if($file){
                $filePath = $file->file_url;
            }
        }
        
        
        // if($template=='s-profile'){
            
        //     if($image && $image!='profile.png' && $file){
        //         $filePath = $file->file_url;
        //     }else{
        //         $filePath ='public/medies/profile.png';
        //     }
        // }
        
        $mImage =Image::make($filePath);
        if($weight && $height){
            $mImage=$mImage->fit($weight,$height);
        }
        $mImage=$mImage->response();
        
        return $mImage;
    }
    public function siteMapXml(Request $r){
        
      $pages = Post::latest()->where('type',0)->where('status','active')->select(['slug','updated_at','status'])->limit(200)->get();
      $posts = Post::latest()->where('type',1)->where('status','active')->select(['slug','updated_at','status'])->limit(500)->get();
      $products = Post::latest()->where('type',2)->where('status','active')->select(['slug','updated_at','status'])->limit(300)->get();
      
      return response()->view('siteMap',compact('pages','posts','products'))->header('Content-Type', 'text/xml');
    }
    
    public function productFeedXml(Request $r){
      $products = Post::latest()->where('type',2)->where('status','active')->select(['id','name','description','regular_price','final_price','slug','updated_at','status'])->limit(1000)->get();
      return response()->view('productFeedXml',compact('products'))->header('Content-Type', 'text/xml');
    }
    public function language($lang=null){
      if($lang){
          Session::put('lang',$lang);
      }else{
          Session::put('lang','en');
      }
      return redirect()->back();
    }

    public function index(Request $r){
     
     $categories = Attribute::latest()
    ->where('type', 0)
    ->where('status', 'active')
    ->where('fetured', true) // or ->where('featured', 1)
    ->limit(4)
    ->get();
     

        $latestPosts =Post::where('type',1)
          ->where('status','active')
          ->whereDate('created_at','<=',Carbon::now())
        ->get(['id','name','slug','addedby_id','short_description','created_at']);
        
        $offerBanners =PostExtra::where('type',5)->get();
        
        $featuredCollection =Post::latest()->where('type',2)
          ->where('status','active')
        //   ->where('fetured',true)
          //->whereDate('created_at','<=',Carbon::now())
          ->limit(32)
          ->get(['id','name','slug','final_price','regular_price','discount_type','discount','short_description','created_at']);
        
        collect($featuredCollection)->map(function($item){
            $item->category_name =implode(' - ', $item->productCategories->pluck('name')->toArray());
            unset($item->productCategories);
            return $item;
        });
        
        $mostSalesCollection =Post::latest()->where('type',2)
            ->where('status','active')
            ->where('bestSale', true)
            //->whereDate('created_at', '<=', Carbon::now())
            //->withCount('salesAll')
            //->withSum('salesAll', 'final_price')
            //->orderByRaw('sales_all_count DESC, sales_all_sum_final_price DESC')
            ->limit(6)
            ->get();
        
        collect($mostSalesCollection)->map(function($item){
            $item->category_name =implode(' - ', $item->productCategories->pluck('name')->toArray());
            unset($item->productCategories);
            return $item;
        });
        
        $clients =Attribute::latest()->where('type',3)->where('status','active')->get(['id','name']);
        
    	return view(welcomeTheme().'index',compact('latestPosts','featuredCollection','clients','mostSalesCollection','offerBanners','categories'));
    }
    
    
    
    
    
    public function loadMoreProducts(Request $request)
{
    $offset = (int) $request->offset;

    $products = Post::latest()
        ->where('type', 2)
        ->where('status', 'active')
        ->offset($offset)
        ->limit(32)
        ->get([
            'id',
            'name',
            'slug',
            'final_price',
            'regular_price',
            'discount_type',
            'discount',
            'short_description',
            'created_at'
        ]);

    return response()->json([
        'html' => view(welcomeTheme().'.products.includes.product-items', compact('products'))->render(),
        'count' => $products->count()
    ]);
}
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    

    public function productCategory($slug){
        
      $category =Attribute::latest()->where('type',0)->where('slug',$slug)->first();
      if(!$category){
        return abort('404');
      }
      
      
      $subCategories= $category->subctgs()->where('status', 'active')->get();
      

      $products = Post::latest()->whereHas('ctgProducts',function($q) use($category){
        $q->where('reff_id',$category->id);
      })
      
      ->where(function($qq){
        $qq->where('status','active');
      })
      
      //->select(['id','name','slug','addedby_id','created_at'])
      //->whereDate('created_at','<=',date('Y-m-d'))
      ->paginate(24);
        
      collect($products->items())->map(function($item){
            $item->category_name =implode(' - ', $item->productCategories->pluck('name')->toArray());
            unset($item->productCategories);
            return $item;
        });
        
      return view(welcomeTheme().'products.categoryProducts',compact('category','products','subCategories'));
    }

    public function productView($slug){

      $product =Post::latest()->where('type',2)->where('slug',$slug)->first();
      if(!$product){
        return abort('404');
      }
      
      $product->category_name =implode(' - ', $product->productCategories->pluck('name')->toArray());
      unset($product->productCategories);
      
      $relatedProducts = $product->relatedProducts()->limit(4)->get();
      
      collect($relatedProducts)->map(function($item){
            $item->category_name =implode(' - ', $item->productCategories->pluck('name')->toArray());
            unset($item->productCategories);
            return $item;
        });
      
      $moreProducts = $product->relatedProducts()->inRandomOrder()->limit(4)->get();
        
        collect($moreProducts)->map(function($item){
            $item->category_name =implode(' - ', $item->productCategories->pluck('name')->toArray());
            unset($item->productCategories);
            return $item;
        });
        
      return view(welcomeTheme().'products.productView',compact('product','relatedProducts'));
      //return view(welcomeTheme().'products.productView',compact('product','relatedProducts','moreProducts'));
    }

    public function blogCategory($slug){
      $category =Attribute::latest()->where('type',6)->where('slug',$slug)->first();
      if(!$category){
        return abort('404');
      }

      $posts = $category->activePosts()->latest()
      ->select(['id','name','slug','short_description','addedby_id','created_at'])
      ->paginate(10);

      return view(welcomeTheme().'blogs.categoryPosts',compact('category','posts'));
    }

    public function blogTag($slug){
      $tag =Attribute::latest()->where('type',7)->where('slug',$slug)->first();
      if(!$tag){
        return abort('404');
      }

      $posts = Post::whereHas('tagPosts',function($q) use($tag){
        $q->where('reff_id',$tag->id);
      })
      ->where(function($qq){
        $qq->where('status','active');
      })
      ->select(['id','name','slug','short_description','addedby_id','created_at'])
      ->whereDate('created_at','<=',date('Y-m-d'))
      ->paginate(10);

      return view(welcomeTheme().'blogs.tagPosts',compact('tag','posts'));
    }

    public function blogAuthor($id,$slug){
      $author =User::find($id);
      if(!$author){
        return abort('404');
      }
      $posts =$author->posts()->latest()->where('type',1)->where('status','active')
      ->select(['id','name','slug','short_description','addedby_id','created_at'])
      ->whereDate('created_at','<=',date('Y-m-d'))
      ->paginate(10);
      return view(welcomeTheme().'blogs.authorPosts',compact('author','posts'));

    }

    public function blogView($slug){
      $post =Post::where('type',1)->where('slug',$slug)->first();
      if(!$post){
        return abort('404');
      }
      $relatedPosts =$post->relatedPosts()->limit(3)->select(['id','name','slug','short_description','addedby_id','created_at'])->get();
      $comments =$post->postComments()->where('status','active')->select(['id','name','content','created_at'])->paginate(10);
      return view(welcomeTheme().'blogs.blogView',compact('post','relatedPosts','comments'));

    }

    public function blogSearch(Request $r){
      $check = $r->validate([
          'search' => 'required|max:100',
      ]);
      
      $posts =Post::latest()->where('type',1)->where('status','active')
      ->where(function($q) use ($r) {
        if($r->search){
          $q->where('name','LIKE','%'.$r->search.'%');
        }

      })
      ->select(['id','name','slug','short_description','addedby_id','created_at'])
      ->whereDate('created_at','<=',date('Y-m-d'))
      ->paginate(10)->appends([
        'search'=>$r->search,
      ]);

      return view(welcomeTheme().'blogs.blogSearch',compact('posts','r'));

    }

    public function blogComments(Request $r,$slug){
      $post =Post::where('type',1)->where('slug',$slug)->first();
      if(!$post){
        return abort('404');
      }

      $check = $r->validate([
          'name' => 'required|max:100',
          'email' => 'required|max:100',
          'website' => 'required|max:100',
          'comment' => 'required|max:1000',
      ]);

      $comments =new Review();

      if(Auth::check()){
      $comments->addedby_id=Auth::id();
      }
      $comments->src_id=$post->id;
      $comments->type=1;
      $comments->name=$r->name;
      $comments->email=$r->email;
      $comments->website=$r->website;
      $comments->content=$r->comment;
      $comments->save();

      Session()->flash('success','Your Comments successfully Submitted.');

      return back();


    }


    public function pageView($slug){
      $page =Post::latest()->where('type',0)->where('slug',$slug)->first();

      if(!$page){
        return abort('404');
      }
      //If deferent Design or Condition Page Return by ID.
        
      //Font Home Page
      if($page->template=='Front Page'){
        return redirect()->route('index');
      }

      //Contact Us Page
      if($page->template=='Contact Us'){
        return view(welcomeTheme().'pages.contactUs',compact('page'));
      }
      
    //   //Single  Page
    //   if($page->template=='Single Page'){
    //     return view(welcomeTheme().'pages.singlePage',compact('page'));
    //   }

      //About Us Page
      if($page->template=='About Us'){
        return view(welcomeTheme().'pages.aboutUs',compact('page'));
      }
      
      
      //My Account Page
      if($page->template=='My Account'){
        return view(welcomeTheme().'pages.myAccount',compact('page'));
      }
      
      //Clients Page
      if($page->template=='All Clients'){
        return view(welcomeTheme().'pages.clients',compact('page'));
      }

      //Latest Blog Page
      if($page->template=='Latest Blog'){
        $posts = Post::latest()->where('type',1)->where('status','active')
        ->select(['id','name','slug','short_description','addedby_id','created_at'])
        ->whereDate('created_at','<=',date('Y-m-d'))
        ->paginate(10);
        return view(welcomeTheme().'blogs.latestBlogs',compact('posts','page'));
      }

      //Latest Services Page
      if($page->template=='Latest Products'){
        $products = Post::latest()->where('type',2)->where('status','active')
        //->select(['id','name','slug','short_description','addedby_id','created_at'])
        ->whereDate('created_at','<=',date('Y-m-d'))
        ->paginate(6);
        
        collect($products->items())->map(function($item){
            $item->category_name =implode(' - ', $item->productCategories->pluck('name')->toArray());
            unset($item->productCategories);
            return $item;
        });
        
        return view(welcomeTheme().'products.latestProducts',compact('products','page'));
      }
      
      return view(welcomeTheme().'pages.pageView',compact('page'));

    }

    public function contactMail(Request $r){
      
      $check = $r->validate([
          'name' => 'required|max:100',
          'email' => 'required|max:100',
          'subject' => 'required|max:100',
          'message' => 'nullable|max:500',
      ]);

      if(general()->mail_status && general()->mail_from_address){
            //Mail Data
            $datas =array('r'=>$r);
            $template ='mails.ContactMail';
            $toEmail =general()->mail_from_address;
            $toName =general()->mail_from_name;
            $subject ='Contact Mail Form '.general()->title;
        
           sendMail($toEmail,$toName,$subject,$datas,$template);
        }

      Session()->flash('success','Your form send successfully done. We are response as soon as possible.');
      return back();
    }

    public function search(Request $r){

        $products =Post::where('status','active')->where('type',2)
        ->where(function($q) use($r){
          $q->where(function($q2) use($r){
              $q2->where('name','LIKE','%'.$r->search.'%')
                 ->orWhereHas('productCategories',function($q3) use($r){
                     $q3->where('name','LIKE','%'.$r->search.'%');
                 })
                 ->orWhereHas('brand',function($q3) use($r){
                     $q3->where('name','LIKE','%'.$r->search.'%');
                 });
          });
          if($r->category){
              $category =Attribute::latest()->where('type',0)->where('slug',$r->category)->first();
              if($category){
                $q->whereHas('ctgProducts',function($q) use($category){
                    $q->where('reff_id',$category->id);
                });
              }
          }
        })
        ->paginate(24);

      return view(welcomeTheme().'products.productSearch',compact('products'));

    }

    // Live search suggestions shown under the header search box while typing.
    public function productSearch(Request $r){

      $search = trim($r->search);
      $products = collect();

      if(strlen($search) >= 2){
        $products = Post::where('status','active')->where('type',2)
        ->where(function($q) use($search){
          $q->where('name','LIKE','%'.$search.'%')
          ->orWhereHas('productCategories',function($q2) use($search){
              $q2->where('name','LIKE','%'.$search.'%');
          })
          ->orWhereHas('brand',function($q2) use($search){
              $q2->where('name','LIKE','%'.$search.'%');
          });
        })
        ->latest()
        ->take(8)
        ->get();
      }

      return view(welcomeTheme().'products.includes.searchProduct',compact('products','search'));

    }

    public function subscribe(Request $r){
        $email =$r->email;
      if(filter_var($email, FILTER_VALIDATE_EMAIL)){
        $subscribe =PostExtra::latest()->where('type',1)->where('name',$email)->first();
        if(!$subscribe){
          
            $subscribe =new PostExtra();
            $subscribe->type=1;
            $subscribe->name=$email;
            $subscribe->save();
          $status=true;
          $message ='<span>Success:</span> You Are Successfully Subsribe.';
        }else{
          $status=true;
          $message ='<span>Note:</span> You Are Already Subsribe.Thank You.';
        }

      }else{
        $status=false;
        $message ='<span>Error:</span> Email Are Not validated';
      }

      if(request()->ajax()){
        
        return Response()->json([
                'success' => $status,
                'message' => $message,
              ]);
      }

      Session()->flash($status?'success':'error',$message);
      return redirect()->back();

    }





}
