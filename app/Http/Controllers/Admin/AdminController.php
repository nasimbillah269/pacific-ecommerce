<?php

namespace App\Http\Controllers\Admin;

use Auth;
use Str;
use Hash;
use File;
use DB;
use Session;
use Cookie;
use Validator;
use Redirect,Response;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Post;
use App\Models\Transaction;
use App\Models\PostExtra;
use App\Models\Review;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\General;
use App\Models\Country;
use App\Models\Media;
use App\Models\Attribute;
use App\Models\Permission;
use App\Models\PostAttribute;
use GuzzleHttp\Client;

use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function dashboard(){
        
        
        // $pages = DB::connection('mysql2')
        //     ->table('wp4q_posts')
        //     ->where('post_type', 'page')
        //     ->where('post_status', 'publish')
        //     ->orderBy('ID', 'asc')
        //     ->select(
        //         'ID as id',
        //         'post_title as title',
        //         'post_name as slug',
        //         'post_content as description',
        //         'post_excerpt as short_description',
        //         'post_date as created_at'
        //     )
        //     ->get();
        
        // foreach ($pages as $wpPage) {
    
        //     $page =new Post();
        //     $page->type              = 0;
        //     $page->template          = 'Client View';
        //     $page->name              = $wpPage->title;
        //     $page->short_description = $wpPage->short_description ?? '';
        //     $page->description       = $wpPage->description ?? '';
            
        //     // Slug Generation
        //     $slug = Str::slug($wpPage->slug);
        //     if ($slug == null) {
        //         $page->slug = $wpPage->id;
        //     } else {
        //         if (Post::where('type', 3)->where('slug', $slug)->whereNotIn('id', [$page->id ?? 0])->count() > 0) {
        //             $page->slug = $slug . '-' . $wpPage->id;
        //         } else {
        //             $page->slug = $slug;
        //         }
        //     }
            
        //     $page->status      = 'active';
        //     $page->editedby_id = Auth::id() ?? 1;
            
        //     // Created At সেট করা
        //     $page->created_at  = !empty($wpPage->created_at) ? $wpPage->created_at : \Carbon\Carbon::now();
        //     $page->updated_at  = !empty($wpPage->created_at) ? $wpPage->created_at : \Carbon\Carbon::now();
            
        //     $page->save();
        // }
        
        // return $pages;
        
        // $categories = DB::connection('mysql2')
        //     ->table('wp4q_terms')
        //     ->join('wp4q_term_taxonomy', 'wp4q_terms.term_id', '=', 'wp4q_term_taxonomy.term_id')
        //     ->leftJoin('wp4q_termmeta', function($join) {
        //         $join->on('wp4q_terms.term_id', '=', 'wp4q_termmeta.term_id')
        //              ->where('wp4q_termmeta.meta_key', 'thumbnail_id');
        //     })
        //     ->where('wp4q_term_taxonomy.taxonomy', 'product_cat')
        //     ->select(
        //         'wp4q_terms.term_id as id', 
        //         'wp4q_terms.name as title', 
        //         'wp4q_terms.slug',
        //         'wp4q_term_taxonomy.parent as parent_id',
        //         'wp4q_term_taxonomy.description as description',
        //         'wp4q_termmeta.meta_value as thumbnail_id'
        //     )
        //     // ->where('wp4q_terms.term_id','520')
        //     ->get();
        
        // // return $categories;

        // foreach ($categories as $cat) {
            
        //     $category =Attribute::where('type',0)->where('src_id',$cat->id)->first();
        //     // return $category->image();
        //     if(!$category){
        //         $category = new Attribute();
        //         $category->type = 0;
        //         $category->name = $cat->title;
        //         $category->src_id = $cat->id; 
                
        //         $slug = Str::slug($category->name);
        //         if ($slug == null) {
        //             $category->slug = $cat->id;
        //         } else {
        //             if (Attribute::where('type', 0)->where('slug', $slug)->count() > 0) {
        //                 $category->slug = $slug . '-' . $cat->id;
        //             } else {
        //                 $category->slug = $slug;
        //             }
        //         }
                
        //         $prentID =null;
        //         $hasParent =Attribute::where('type',0)->where('src_id',$cat->parent_id)->first();
        //         if($hasParent){
        //             $prentID =$hasParent->id;
        //         }
        //         $category->parent_id =$prentID;
                
        //         $category->description = $cat->description ?? null;
                
        //         $category->status = 'active';
        //         $category->addedby_id = Auth::id() ?? 1; 
        //         $category->save();
        //     }
            
        //     if (!empty($cat->thumbnail_id)) {
        //         $imagePost = DB::connection('mysql2')
        //             ->table('wp4q_posts')
        //             ->where('ID', $cat->thumbnail_id)
        //             ->select('guid')
        //             ->first();
        
        //         if ($imagePost && !empty($imagePost->guid)) {
        //             $imageUrl = $imagePost->guid; 
        
        //             $fileContent = @file_get_contents($imageUrl);
                    
        //             if ($fileContent) {
        //                 $fileName = basename($imageUrl);
        //                 $tmpFilePath = sys_get_temp_dir() . '/' . $fileName;
        //                 file_put_contents($tmpFilePath, $fileContent);
        
        //                 $file = new \Illuminate\Http\UploadedFile(
        //                     $tmpFilePath,
        //                     $fileName,
        //                     mime_content_type($tmpFilePath),
        //                     null,
        //                     true
        //                 );
        
        //                 $src     = $category->id;
        //                 $srcType = 3;
        //                 $fileUse = 1;
        //                 $author  = Auth::id();
        
        //                 uploadFile($file, $src, $srcType, $fileUse, $author);
        //             }
        //         }
        //     }
            
        // }
        
        // $brands = DB::connection('mysql2')
        //     ->table('wp4q_terms')
        //     ->join('wp4q_term_taxonomy', 'wp4q_terms.term_id', '=', 'wp4q_term_taxonomy.term_id')
        //     ->leftJoin('wp4q_termmeta', function($join) {
        //         $join->on('wp4q_terms.term_id', '=', 'wp4q_termmeta.term_id')
        //              ->where('wp4q_termmeta.meta_key', 'thumbnail_id');
        //     })
        //     ->where('wp4q_term_taxonomy.taxonomy', 'product_brand') // এখানে 'product_brand' দিয়ে ট্রাই করুন
        //     ->select(
        //         'wp4q_terms.term_id as id', 
        //         'wp4q_terms.name as title', 
        //         'wp4q_terms.slug',
        //         'wp4q_term_taxonomy.description as description',
        //         'wp4q_termmeta.meta_value as thumbnail_id'
        //     )
        //     ->get();


        // // ২. লারাভেল লুপ চালিয়ে ব্র্যান্ড এন্ট্রি করা
        // foreach ($brands as $b) {
        //     $brand = new Attribute();
        //     $brand->type = 2;
        //     $brand->name = $b->title;
            
        //     // WordPress-এর পুরনো ID টি src_id কলামে স্টোর করা হলো
        //     $brand->src_id = $b->id; 
            
        //     // Slug Generation
        //     $slug = Str::slug($brand->name);
        //     if ($slug == null) {
        //         $brand->slug = $b->id;
        //     } else {
        //         if (Attribute::where('type', 2)->where('slug', $slug)->count() > 0) {
        //             $brand->slug = $slug . '-' . $b->id;
        //         } else {
        //             $brand->slug = $slug;
        //         }
        //     }
        
        //     $brand->description = $b->description ?? null;
        //     $brand->status = 'active';
        //     $brand->addedby_id = Auth::id() ?? 1; 
        //     $brand->save();
        
        //     // ৩. ব্র্যান্ড লোগো/ইমেজ হ্যান্ডেল করা (যদি থাকে)
        //     if (!empty($b->thumbnail_id)) {
        //         $imagePost = DB::connection('mysql2')
        //             ->table('wp4q_posts')
        //             ->where('ID', $b->thumbnail_id)
        //             ->select('guid')
        //             ->first();
        
        //         if ($imagePost && !empty($imagePost->guid)) {
        //             $imageUrl = $imagePost->guid; 
        //             $fileContent = @file_get_contents($imageUrl);
                    
        //             if ($fileContent) {
        //                 $fileName = basename($imageUrl);
        //                 $tmpFilePath = sys_get_temp_dir() . '/' . $fileName;
        //                 file_put_contents($tmpFilePath, $fileContent);
        
        //                 $file = new \Illuminate\Http\UploadedFile(
        //                     $tmpFilePath,
        //                     $fileName,
        //                     mime_content_type($tmpFilePath),
        //                     null,
        //                     true
        //                 );
        
        //                 $src     = $brand->id; 
        //                 $srcType = 3;
        //                 $fileUse = 1;
        //                 $author  = Auth::id();
        
        //                 uploadFile($file, $src, $srcType, $fileUse, $author);
        //             }
        //         }
        //     }
        // }
        
        // $tags = DB::connection('mysql2')
        //     ->table('wp4q_terms')
        //     ->join('wp4q_term_taxonomy', 'wp4q_terms.term_id', '=', 'wp4q_term_taxonomy.term_id')
        //     ->where('wp4q_term_taxonomy.taxonomy', 'product_tag')
        //     ->select(
        //         'wp4q_terms.term_id as id', 
        //         'wp4q_terms.name as title', 
        //         'wp4q_terms.slug'
        //     )
        //     ->get();
        
        // foreach ($tags as $t) {
        //     $tag = new Attribute();
        //     $tag->type = 10; 
        //     $tag->name = $t->title;
            
        //     // WordPress-এর পুরনো ID টি src_id কলামে স্টোর করা হলো
        //     $tag->src_id = $t->id; 
            
        //     // Slug Generation
        //     $slug = Str::slug($t->slug ?? $t->title);
        //     if ($slug == null) {
        //         $tag->slug = $t->id;
        //     } else {
        //         if (Attribute::where('type', 10)->where('slug', $slug)->count() > 0) {
        //             $tag->slug = $slug . '-' . $t->id;
        //         } else {
        //             $tag->slug = $slug;
        //         }
        //     }
        
        //     $tag->status = 'active';
        //     $tag->addedby_id = Auth::id() ?? 1; 
        //     $tag->save();
        // }
        
        // $attributeTaxonomies = DB::connection('mysql2')
        //     ->table('wp4q_woocommerce_attribute_taxonomies')
        //     ->get();
        
        // $result = [];
        
        // foreach ($attributeTaxonomies as $attr) {
        //     // উকমার্স অ্যাট্রিবিউটের ট্যাক্সোনমি নেম ফরম্যাট হয় pa_{attribute_name}
        //     $taxonomyName = 'pa_' . $attr->attribute_name;
        
        //     // ২. এই অ্যাট্রিবিউটের আন্ডারে যে টার্ম বা সাব-আইটেমগুলো আছে (যেমন: Black, Blue) তা আনা
        //     $subItems = DB::connection('mysql2')
        //         ->table('wp4q_terms')
        //         ->join('wp4q_term_taxonomy', 'wp4q_terms.term_id', '=', 'wp4q_term_taxonomy.term_id')
        //         ->where('wp4q_term_taxonomy.taxonomy', $taxonomyName)
        //         ->select(
        //             'wp4q_terms.term_id as id', 
        //             'wp4q_terms.name as title', 
        //             'wp4q_terms.slug'
        //         )
        //         ->get();
        
        //     // ৩. অ্যারে স্ট্রাকচার তৈরি করা (Attribute ID, Title এবং Sub Items List)
        //     $result[] = [
        //         'attribute_id'   => $attr->attribute_id,
        //         'attribute_name' => $attr->attribute_label, // বা $attr->attribute_name
        //         'attribute_slug' => $attr->attribute_name,
        //         'sub_items'      => $subItems
        //     ];
        // }
        
        // return $result;
        
        // foreach ($result as $item) {
        //     // ক. মেইন অ্যাট্রিবিউট সেভ করা (যেমন: Color, Size)
        //     $mainAttr = new Attribute();
        //     $mainAttr->type = 9; // আপনার চাহিদা অনুযায়ী type 9
        //     $mainAttr->name = $item['attribute_name'];
        //     $mainAttr->src_id = $item['attribute_id']; // ওয়ার্ডপ্রসের পুরনো আইডি
            
        //     $slug = Str::slug($item['attribute_slug']);
        //     if (Attribute::where('type', 9)->where('slug', $slug)->count() > 0) {
        //         $mainAttr->slug = $slug . '-' . $item['attribute_id'];
        //     } else {
        //         $mainAttr->slug = $slug;
        //     }
        //     $mainAttr->status = 'active';
        //     $mainAttr->addedby_id = Auth::id() ?? 1;
        //     $mainAttr->save();
        
        //     // খ. সাব-আইটেমগুলো লুপ চালিয়ে সেভ করা (যেমন: Black, Blue)
        //     if (!empty($item['sub_items'])) {
        //         foreach ($item['sub_items'] as $sub) {
        //             $subAttr = new Attribute();
        //             $subAttr->type = 9; // সাব-আইটেমগুলোর জন্যও type 9 বা আপনার নিয়মে সাব-টাইপ দিতে পারেন
        //             $subAttr->name = $sub->title;
        //             $subAttr->src_id = $sub->id; // ওয়ার্ডপ্রেসের টার্ম আইডি
                    
        //             $subSlug = Str::slug($sub->slug ?? $sub->title);
        //             if (Attribute::where('type', 9)->where('slug', $subSlug)->count() > 0) {
        //                 $subAttr->slug = $subSlug . '-' . $sub->id;
        //             } else {
        //                 $subAttr->slug = $subSlug;
        //             }
        
        //             // প্যারেন্ট আইডি হিসেবে মূল লারাভেল অ্যাট্রিবিউটের ID বসবে
        //             $subAttr->parent_id = $mainAttr->id; 
        //             $subAttr->status = 'active';
        //             $subAttr->addedby_id = Auth::id() ?? 1;
        //             $subAttr->save();
        //         }
        //     }
        // }


        
        // $lastId = 16494;

        // ১. শুধু Simple Product গুলোর ID বের করার কুয়েরি
        // $simpleProductIds = DB::connection('mysql2')
        //     ->table('wp4q_term_relationships')
        //     ->join('wp4q_term_taxonomy', 'wp4q_term_relationships.term_taxonomy_id', '=', 'wp4q_term_taxonomy.term_taxonomy_id')
        //     ->join('wp4q_terms', 'wp4q_term_taxonomy.term_id', '=', 'wp4q_terms.term_id')
        //     ->where('wp4q_term_taxonomy.taxonomy', 'product_type')
        //     ->where('wp4q_terms.name', 'simple') // এখানে শুধু simple প্রোডাক্ট ফিল্টার করা হলো
        //     ->pluck('wp4q_term_relationships.object_id');
            
        // $simpleProductIds = DB::connection('mysql2')
        //     ->table('wp4q_term_relationships')
        //     ->join('wp4q_term_taxonomy', 'wp4q_term_relationships.term_taxonomy_id', '=', 'wp4q_term_taxonomy.term_taxonomy_id')
        //     ->join('wp4q_terms', 'wp4q_term_taxonomy.term_id', '=', 'wp4q_terms.term_id')
        //     ->where('wp4q_term_taxonomy.taxonomy', 'product_type')
        //     ->where('wp4q_terms.name', 'variable') // এখানে variable ফিল্টার করা হলো
        //     ->pluck('wp4q_term_relationships.object_id');
        
        // // ২. মূল Simple Product গুলো ফেচ করা
        // $products = DB::connection('mysql2')
        //     ->table('wp4q_posts')
        //     ->where('post_type', 'product')
        //     ->where('post_status', 'publish')
        //     ->whereIn('ID', $simpleProductIds)
        //     ->where('ID', '>', $lastId)
        //     ->orderBy('ID', 'asc')
        //     ->limit(30)
        //     ->select(
        //         'ID as id',
        //         'post_title as title',
        //         'post_name as slug',
        //         'post_content as description',
        //         'post_excerpt as short_description',
        //         'post_date as created_at'
        //     )
        //     ->get();
        
        // // ৩. মেটা, ইমেজ, ক্যাটাগরি, ট্যাগ ও ব্র্যান্ড ম্যাপ করা
        // $formattedProducts = $products->map(function ($product) {
            
        //     // ক. প্রোডাক্ট মেটা ডেটা (Price, SKU ইত্যাদি)
        //     $meta = DB::connection('mysql2')
        //         ->table('wp4q_postmeta')
        //         ->where('post_id', $product->id)
        //         ->whereIn('meta_key', [
        //             '_price', '_regular_price', '_sale_price', 
        //             '_sku', '_stock', '_stock_status', 
        //             '_thumbnail_id', '_product_image_gallery'
        //         ])
        //         ->pluck('meta_value', 'meta_key');
        
        //     $product->sku           = $meta['_sku'] ?? null;
        //     $product->price         = $meta['_price'] ?? 0;
        //     $product->regular_price = $meta['_regular_price'] ?? 0;
        //     $product->sale_price    = $meta['_sale_price'] ?? null;
        //     $product->stock         = $meta['_stock'] ?? null;
        //     $product->stock_status  = $meta['_stock_status'] ?? 'instock';
        
        //     // খ. ফিচারড ইমেজ (Main Image URL)
        //     $product->image = null;
        //     if (!empty($meta['_thumbnail_id'])) {
        //         $product->image = DB::connection('mysql2')
        //             ->table('wp4q_posts')
        //             ->where('ID', $meta['_thumbnail_id'])
        //             ->value('guid');
        //     }
        
        //     // গ. গ্যালারি ইমেজস (Gallery Image URLs)
        //     $product->gallery_images = [];
        //     if (!empty($meta['_product_image_gallery'])) {
        //         $galleryIds = explode(',', $meta['_product_image_gallery']);
        //         $product->gallery_images = DB::connection('mysql2')
        //             ->table('wp4q_posts')
        //             ->whereIn('ID', $galleryIds)
        //             ->pluck('guid')
        //             ->toArray();
        //     }
        
        //     // ঘ. ক্যাটাগরি লিস্ট
        //     $product->categories = DB::connection('mysql2')
        //         ->table('wp4q_term_relationships')
        //         ->join('wp4q_term_taxonomy', 'wp4q_term_relationships.term_taxonomy_id', '=', 'wp4q_term_taxonomy.term_taxonomy_id')
        //         ->join('wp4q_terms', 'wp4q_term_taxonomy.term_id', '=', 'wp4q_terms.term_id')
        //         ->where('wp4q_term_relationships.object_id', $product->id)
        //         ->where('wp4q_term_taxonomy.taxonomy', 'product_cat')
        //         ->select('wp4q_terms.term_id as id', 'wp4q_terms.name as title', 'wp4q_terms.slug')
        //         ->get();
        
        //     // ঙ. ব্র্যান্ড লিস্ট
        //     $product->brands = DB::connection('mysql2')
        //         ->table('wp4q_term_relationships')
        //         ->join('wp4q_term_taxonomy', 'wp4q_term_relationships.term_taxonomy_id', '=', 'wp4q_term_taxonomy.term_taxonomy_id')
        //         ->join('wp4q_terms', 'wp4q_term_taxonomy.term_id', '=', 'wp4q_terms.term_id')
        //         ->where('wp4q_term_relationships.object_id', $product->id)
        //         ->whereIn('wp4q_term_taxonomy.taxonomy', ['product_brand', 'pwb-brand'])
        //         ->select('wp4q_terms.term_id as id', 'wp4q_terms.name as title', 'wp4q_terms.slug')
        //         ->get();
        
        //     // চ. ট্যাগ লিস্ট
        //     $product->tags = DB::connection('mysql2')
        //         ->table('wp4q_term_relationships')
        //         ->join('wp4q_term_taxonomy', 'wp4q_term_relationships.term_taxonomy_id', '=', 'wp4q_term_taxonomy.term_taxonomy_id')
        //         ->join('wp4q_terms', 'wp4q_term_taxonomy.term_id', '=', 'wp4q_terms.term_id')
        //         ->where('wp4q_term_relationships.object_id', $product->id)
        //         ->where('wp4q_term_taxonomy.taxonomy', 'product_tag')
        //         ->select('wp4q_terms.term_id as id', 'wp4q_terms.name as title', 'wp4q_terms.slug')
        //         ->get();
        
        //     return $product;
        // });
        
        // $lastId = $products?->last()?->id ?? null;
        
        // // return $formattedProducts;
        
        // foreach ($formattedProducts as $wpProduct) {
            
        //     // ১. ব্র্যান্ড আইডি ম্যাপ করা (Attribute টেবিল থেকে src_id খুঁজে লারাভেল id বের করা)
        //     $brandId = null;
        //     if (!empty($wpProduct->brands) && $wpProduct->brands->isNotEmpty()) {
        //         $firstBrandSrcId = $wpProduct->brands->first()->id;
        //         $attrBrand = Attribute::where('type', 2)->where('src_id', $firstBrandSrcId)->first();
        //         $brandId = $attrBrand ? $attrBrand->id : null;
        //     }
            
        //     // ২. লারাভেল মডেলে ডেটা এন্ট্রি / আপডেট (Post Table)
        //     $product = Post::where('type',2)->where('old_id',$wpProduct->id)->first();
        //     if(!$product){
        //         $product =new Post();
        //         $product->old_id = $wpProduct->id;
        //         $product->type = 2;
        //     }
        //     $product->name              = $wpProduct->title;
        //     $product->short_description = $wpProduct->short_description ?? '';
        //     $product->description       = $wpProduct->description ?? '';
        //     $product->brand_id          = $brandId;
        //     // $product->price             = $wpProduct->price;
        //     $product->regular_price     = $wpProduct->regular_price?:0;
        //     $product->final_price       = $wpProduct->sale_price?:0;
        //     $product->discount          = $product->regular_price-$product->final_price;
        //     $product->discount_type     = 'flat';
        //     $product->sku_code          = $wpProduct->sku;
        //     $product->quantity          = $wpProduct->stock?:0;
        //     $product->stock_status      = $wpProduct->stock_status=='instock'?1:0;
        //     $product->created_at = !empty($wpProduct->created_at) ? $wpProduct->created_at : Carbon::now();
        //     $product->updated_at = !empty($wpProduct->created_at) ? $wpProduct->created_at : Carbon::now();
        
        //     // Slug Generation
        //     $slug = Str::slug($wpProduct->slug);
        //     if ($slug == null) {
        //         $product->slug = $product->id;
        //     } else {
        //         if (Post::where('type', 2)->where('slug', $slug)->whereNotIn('id', [$product->id ?? 0])->count() > 0) {
        //             $product->slug = $slug . '-' . $product->id;
        //         } else {
        //             $product->slug = $slug;
        //         }
        //     }
        
        //     $product->status      = 'active';
        //     $product->editedby_id = Auth::id() ?? 1;
        //     $product->save();
            
        //     // ///////Image Upload Start (URL থেকে ফাইল ডাউনলোড করে আপলোড)////////////
        //     if (!empty($wpProduct->image)) {
        //         try {
        //             $imageContent = file_get_contents($wpProduct->image);
        //             if ($imageContent !== false) {
        //                 $tmpFilePath = sys_get_temp_dir() . '/' . basename($wpProduct->image);
        //                 file_put_contents($tmpFilePath, $imageContent);
                        
        //                 $file = new \Illuminate\Http\UploadedFile(
        //                     $tmpFilePath,
        //                     basename($wpProduct->image),
        //                     mime_content_type($tmpFilePath),
        //                     null,
        //                     true
        //                 );
        
        //                 $src     = $product->id;
        //                 $srcType = 1;
        //                 $fileUse = 1;
                        
        //                 uploadFile($file, $src, $srcType, $fileUse);
        //             }
        //         } catch (\Exception $e) {
        //             // ইমেজে কোনো সমস্যা হলে স্কিপ করবে
        //         }
        //     }
        //     // ///////Image Upload End////////////
        
        //     // ///////Gallery Upload Start////////////
        //     if (!empty($wpProduct->gallery_images) && is_array($wpProduct->gallery_images)) {
        //         foreach ($wpProduct->gallery_images as $galleryUrl) {
        //             try {
        //                 $galleryContent = file_get_contents($galleryUrl);
        //                 if ($galleryContent !== false) {
        //                     $tmpGalleryPath = sys_get_temp_dir() . '/' . basename($galleryUrl);
        //                     file_put_contents($tmpGalleryPath, $galleryContent);
        
        //                     $file = new \Illuminate\Http\UploadedFile(
        //                         $tmpGalleryPath,
        //                         basename($galleryUrl),
        //                         mime_content_type($tmpGalleryPath),
        //                         null,
        //                         true
        //                     );
        
        //                     $src        = $product->id;
        //                     $srcType    = 1;
        //                     $fileUse    = 3;
        //                     $author     = Auth::id() ?? 1;
        //                     $fileStatus = false;
                            
        //                     uploadFile($file, $src, $srcType, $fileUse, $author, $fileStatus);
        //                 }
        //             } catch (\Exception $e) {
        //                 // গ্যালারি ইমেজে সমস্যা হলে স্কিপ করবে
        //             }
        //         }
        //     }
        //     // ///////Gallery Upload End////////////
        
        //     // ৩. ক্যাটাগরি সেভ (PostAttribute Table)
        //     if (!empty($wpProduct->categories) && $wpProduct->categories->isNotEmpty()) {
        //         $categoryIds = $wpProduct->categories->pluck('id')->toArray();
                
        //         $categoriesID =Attribute::where('type',0)->whereIn('src_id',$categoryIds)->pluck('id')->toArray();
                
                
        //         $product->productCtgs()->whereNotIn('reff_id', $categoriesID)->delete();
        
        //         foreach ($categoriesID as $i => $catId) {
        //             $ctg = $product->productCtgs()->where('reff_id', $catId)->first();
        //             if (!$ctg) {
        //                 $ctg          = new PostAttribute();
        //                 $ctg->src_id  = $product->id;
        //                 $ctg->reff_id = $catId;
        //                 $ctg->type    = 0;
        //             }
        //             $ctg->drag = $i;
        //             $ctg->save();
        //         }
        //     } else {
        //         $product->productCtgs()->delete();
        //     }
        
        //     // ৪. ট্যাগ সেভ (PostAttribute Table)
        //     if (!empty($wpProduct->tags) && $wpProduct->tags->isNotEmpty()) {
        //         $tagIds = $wpProduct->tags->pluck('id')->toArray();
                
        //         $tagsID =Attribute::where('type',10)->whereIn('src_id',$tagIds)->pluck('id')->toArray();
                
        //         $product->productTags()->whereNotIn('reff_id', $tagsID)->delete();
        
        //         foreach ($tagsID as $i => $tagId) {
        //             $tagObj = $product->productTags()->where('reff_id', $tagId)->first();
        //             if (!$tagObj) {
        //                 $tagObj          = new PostAttribute();
        //                 $tagObj->src_id  = $product->id;
        //                 $tagObj->reff_id = $tagId;
        //                 $tagObj->type    = 4;
        //             }
        //             $tagObj->drag = $i;
        //             $tagObj->save();
        //         }
        //     } else {
        //         $product->productTags()->delete();
        //     }
            
        // }
    
        
        // return 'Success last ID: '.$lastId;
    
    
        ///Reports  Summery Dashboard
        $services30Days=Post::where('type',2)
        ->where('status','active')
        //->whereMonth('created_at', Carbon::now()->month)
        //->whereYear('created_at', Carbon::now()->year)
        ->count();

        $posts30Days=User::where('status','<>',2)
        ->whereMonth('created_at', Carbon::now()->month)
        ->whereYear('created_at', Carbon::now()->year)
        ->count();

        $pagesTotal=User::where('status','<>',2)
        ->where('business',true)
        ->count();

        $todaySaleTotal=Order::latest()
        ->where('order_type','pos_order')
        ->whereNotIn('order_status',['temp','pending','cancelled'])
        ->whereDate('created_at', Carbon::now())
        ->sum('paid_amount');
        
        $GrandTotalToday=Order::latest()
        ->where('order_type','pos_order')
        ->whereNotIn('order_status',['temp','pending','cancelled'])
        ->whereDate('created_at', Carbon::now())
        ->sum('grand_total');
        
        $GrandTotalMonth=Order::latest()
        ->where('order_type','pos_order')
        ->whereNotIn('order_status',['temp','pending','cancelled'])
        ->whereMonth('created_at', Carbon::now()->month)
        ->whereYear('created_at', Carbon::now()->year)
        ->sum('grand_total');
        
        $dueTotal=Order::latest()
        ->where('order_type','pos_order')
        ->whereNotIn('order_status',['temp','pending','cancelled'])
        //->whereDate('created_at', Carbon::now())
        ->sum('due_amount');
        
        $SuppGrandTotalToday=Order::latest()
        ->where('order_type','purchase_order')
        ->whereNotIn('order_status',['temp','pending','cancelled'])
        ->whereDate('created_at', Carbon::now())
        ->sum('grand_total');
        
        $SuppGrandTotalMonth=Order::latest()
        ->where('order_type','purchase_order')
        ->whereNotIn('order_status',['temp','pending','cancelled'])
        ->whereMonth('created_at', Carbon::now()->month)
        ->whereYear('created_at', Carbon::now()->year)
        ->sum('grand_total');
        
        $SuppDueTotal =Order::latest()
        ->where('order_type','purchase_order')
        ->whereNotIn('order_status',['temp','pending','cancelled'])
        //->whereDate('created_at', Carbon::now())
        ->sum('due_amount');

        $reports=array(
                    "services"=>$services30Days,
                    "posts"=>$posts30Days,
                    "pages"=>$pagesTotal,
                    "todaySaleTotal"=>$todaySaleTotal,
                    "GrandTotalToday"=>$GrandTotalToday,
                    "GrandTotalMonth"=>$GrandTotalMonth,
                    "dueTotal"=>$dueTotal,
                    "SuppGrandTotalToday"=>$SuppGrandTotalToday,
                    "SuppGrandTotalMonth"=>$SuppGrandTotalMonth,
                    "SuppDueTotal"=>$SuppDueTotal,
                );
        ///Reports  Summery Dashboard

        $posts =Post::latest()->where('type',1)->where('status','<>','temp')->paginate(10);
        $products =Post::latest()->where('type',2)->where('status','<>','temp')->paginate(10);
        
        return view(adminTheme().'dashboard',compact('posts','reports','products'));
      
    }
    



    public function myProfile(Request $r){

      $user =Auth::user();
      if($r->isMethod('post')){
        if($r->actionType=='profile'){
          $check = $r->validate([
            'name' => 'required|max:100|unique:users,name,'.$user->id,
            'email' => 'required|max:100|unique:users,email,'.$user->id,
            'mobile' => 'nullable|max:20|unique:users,mobile,'.$user->id,
            'gender' => 'nullable|max:10',
            'date_of_birth' => 'nullable|date',
            'address' => 'nullable|max:191',
            'division' => 'nullable|numeric',
            'district' => 'nullable|numeric',
            'city' => 'nullable|numeric',
            'postal_code' => 'nullable|max:20',
            'profile' => 'nullable|max:1000',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
          ]);
          
          $user->name =$r->name;
          $user->mobile =$r->mobile;
          $user->email =$r->email;
          $user->gender =$r->gender;
          $user->dob =$r->date_of_birth;
          $user->profile =$r->profile;
          $user->address_line1 =$r->address;
          $user->division =$r->division;
          $user->district =$r->district;
          $user->city =$r->city;
          $user->postal_code =$r->postal_code;
          ///////Image UploadStart////////////
          if($r->hasFile('image')){
            $file =$r->image;
            $src  =$user->id;
            $srcType  =6;
            $fileUse  =1;
            $author=Auth::id();
            
            $loadImage =uploadFile($file,$src,$srcType,$fileUse,$author);
            // //Resize Image 
            // $w=250;
            // $h=250;
            // $type='md';
            // $this->resizeImage($loadImage,$type,$w,$h);
            
            // //Resize Image 
            // $w=50;
            // $h=50;
            // $type='sm';
            // $this->resizeImage($loadImage,$type,$w,$h);
            
            // //Resize Image 
            // $w=400;
            // $h=400;
            // $type='lg';
            // $this->resizeImage($loadImage,$type,$w,$h);
            
          }
          ///////Image Upload End////////////
          $user->save();
  
          Session()->flash('success','Your Updated Are Successfully Done!');
  
        }
        if($r->actionType=='change-password'){
  
          $check = $r->validate([
              'old_password' => 'required|string|min:8',
              'password' => 'required|string|min:8|confirmed|different:old_password',
          ]);
  
          if(Hash::check($r->old_password, $user->password)){
            $user->password_show=$r->password;
            $user->password=Hash::make($r->password);
            $user->update();
            Session()->flash('success','Your Are Successfully Done');
          }else{
            Session()->flash('error','Current Password Are Not Match');
          }
        }
        return back();
      }
        
      return view(adminTheme().'users.myProfile',compact('user'));
      
    }
  //Medias Library Route
  public function medies(Request $r){

    //Check Authorized User
    $allPer = empty(json_decode(Auth::user()->permission->permission, true)['medies']['all']);

    //Media Delete All Selected Images Start
    if($r->actionType=='allDelete'){

      $check = $r->validate([
          'mediaid.*' => 'required|numeric',
      ]);

      for ($i=0; $i < count($r->mediaid); $i++) { 
        $media =Media::find($r->mediaid[$i]);
        if($media){

          if($allPer && $media->addedby_id!=Auth::id()){
            //You are unauthorized Try!!;
          }else{

            if(File::exists($media->file_url)){
                File::delete($media->file_url);
            }
            $media->delete();

          }

        }
      }

      Session()->flash('success','Your Are Successfully Deleted');
      return redirect()->back();
    }

    //Media Delete All Selected Images End


    $medies =Media::latest()->where('src_type',0)
    ->where(function($q) use ($r,$allPer) {

      // Check Permission
      if($allPer){
        $q->where('addedby_id',auth::id()); 
      }

    })
    ->select(['id','file_url','file_size','file_type','file_name','alt_text','caption','description','addedby_id'])
    ->paginate(50);

    if($r->ajax())
      {

          return Response()->json([
              'success' => true,
              'view' => View(adminTheme().'medies.includes.mediesAll',[
                  'medies'=>$medies
              ])->render()
          ]);
      }

    return view(adminTheme().'medies.medies',compact('medies'));
  }

  public function mediesCreate(Request $r){

      $check = $r->validate([
          'images.*' => 'required|file|mimes:jpeg,png,jpg,gif,svg,webp,pdf,docx,zip,rar,mp4,webm,mov,wmv,mp3|max:25600',
      ]);

      if(!$check){
          Session::flash('error','Need To validation');
          return back();
      }   

     $files=$r->file('images');
      if($files){
          foreach($files as $file){

              $file =$file;
              $src  =null;
              $srcType  =0;
              $fileUse  =0;
              $fileStatus=false;
              $author=Auth::id();
              uploadFile($file,$src,$srcType,$fileUse,$author,$fileStatus);
              
          }
      }

    Session()->flash('success','Your Are Successfully Done');
     return redirect()->back();
     
  }

  public function mediesEdit(Request $r, $id){
    $media =Media::find($id);
    if(!$media){
      Session()->flash('error','This File Are Not Found');
      return redirect()->back();
    }

    if($media->src_type==0){
      //Check Authorized User
      $allPer = empty(json_decode(Auth::user()->permission->permission, true)['medies']['all']);
      if($allPer && $media->addedby_id!=Auth::id()){
        Session()->flash('error','You are unauthorized Try!!');
        return redirect()->route('admin.medies');
      }
    }

    if($r->isMethod('post')){
         $media->alt_text=$r->alt_text;
         $media->caption=$r->caption;
         $media->description=$r->description;
         $media->editedby_id=auth::id();
         $media->save();
         Session()->flash('success','Your Are Successfully Done');
         return redirect()->back();
    }

    return view(adminTheme().'medies.mediaImageEdit',compact('media'));
  }

public function mediesDelete(Request $request, $id) {
    if($request->ajax()) {
        $media = Media::find($id);
        
        if(!$media){
            Session()->flash('error', 'This File Are Not Found');
            return Response()->json([
                'success' => false
            ]);
        }
        
        // অরিজিনাল ফাইল ডিলিট
        if($media->file_url && File::exists(public_path(str_replace('public/', '', $media->file_url)))){
            File::delete(public_path(str_replace('public/', '', $media->file_url)));
        }
        
        // SM সাইজ থাকলে ডিলিট
        if($media->file_url_sm && File::exists(public_path(str_replace('public/', '', $media->file_url_sm)))){
            File::delete(public_path(str_replace('public/', '', $media->file_url_sm)));
        }
        
        // MD সাইজ (resized image) থাকলে ডিলিট
        if($media->file_url_md && File::exists(public_path(str_replace('public/', '', $media->file_url_md)))){
            File::delete(public_path(str_replace('public/', '', $media->file_url_md)));
        }
        
        // LG সাইজ থাকলে ডিলিট
        if($media->file_url_lg && File::exists(public_path(str_replace('public/', '', $media->file_url_lg)))){
            File::delete(public_path(str_replace('public/', '', $media->file_url_lg)));
        }
        
        $media->delete();
        
        return Response()->json([
            'success' => true
        ]);
    }
}

    //Medias Library Route End


    // Page Management Function Start
    
    public function pages(Request $r){

      $allPer = empty(json_decode(Auth::user()->permission->permission, true)['pages']['all']);
        // Filter Action Start
  
      if($r->action){
        if($r->checkid){
  
        $datas=Post::latest()->where('type',0)->whereIn('id',$r->checkid)->get();
  
        foreach($datas as $data){
          if($allPer && $data->addedby_id!=Auth::id()){
            // You are unauthorized Try!!
          }else{
  
            if($r->action==1){
              $data->status='active';
              $data->save();
            }elseif($r->action==2){
              $data->status='inactive';
              $data->save();
            }elseif($r->action==3){
              $data->fetured=true;
              $data->save();
            }elseif($r->action==4){
              $data->fetured=false;
              $data->save();
            }elseif($r->action==5){
              //Page Extra Data Delete
              PostExtra::where('type',0)->where('src_id',$data->id)->delete();
              
              //Page Media File Delete
              $medias =Media::latest()->where('src_type',1)->where('src_id',$data->id)->get();
              foreach($medias as $media){
                if(File::exists($media->file_url)){
                  File::delete($media->file_url);
                }
                $media->delete();
              }
  
              $data->delete();
  
            }
  
          }
  
  
        }
  
        Session()->flash('success','Action Successfully Completed!');
  
        }else{
          Session()->flash('info','Please Need To Select Minimum One Post');
        }
  
        return redirect()->back();
      }
  
      //Filter Action End
  
      $pages=Post::latest()->where('type',0)->where('status','<>','temp')
      ->where(function($q) use ($r,$allPer) {
  
          if($r->search){
              $q->where('name','LIKE','%'.$r->search.'%');
          }
          
          if($r->startDate || $r->endDate)
          {
              if($r->startDate){
                  $from =$r->startDate;
              }else{
                  $from=Carbon::now()->format('Y-m-d');
              }
  
              if($r->endDate){
                  $to =$r->endDate;
              }else{
                  $to=Carbon::now()->format('Y-m-d');
              }
  
              $q->whereDate('created_at','>=',$from)->whereDate('created_at','<=',$to);
  
          }
  
          if($r->status){
             $q->where('status',$r->status); 
          }
  
        // Check Permission
        if($allPer){
         $q->where('addedby_id',auth::id()); 
        }
  
      })
      ->select(['id','name','slug','view','type','template','created_at','addedby_id','status','fetured'])
      ->paginate(25)->appends([
        'search'=>$r->search,
        'status'=>$r->status,
        'startDate'=>$r->startDate,
        'endDate'=>$r->endDate,
      ]);
  
      //Total Count Results
      $totals = DB::table('posts')->where('status','<>','temp')
      ->where('type',0)
      ->selectRaw('count(*) as total')
      ->selectRaw("count(case when status = 'active' then 1 end) as active")
      ->selectRaw("count(case when status = 'inactive' then 1 end) as inactive")
      ->first();
  
      return view(adminTheme().'pages.pagesAll',compact('pages','totals'));
  
    }
  
    public function pagesAction(Request $r,$action,$id=null){
  
      if($action=='create'){
          $page =Post::where('type',0)->where('status','temp')->where('addedby_id',Auth::id())->first();
          if(!$page){
            $page =new Post();
            $page->type =0;
            $page->status ='temp';
            $page->addedby_id =Auth::id();
          }
          $page->created_at =Carbon::now();
          $page->save();
    
          return redirect()->route('admin.pagesAction',['edit',$page->id]);
        }
        $page =Post::find($id);
        if(!$page){
          Session()->flash('error','This Page Are Not Found');
          return redirect()->route('admin.pages');
        }
  
        //Check Authorized User
        $allPer = empty(json_decode(Auth::user()->permission->permission, true)['pages']['all']);
        if($allPer && $page->addedby_id!=Auth::id()){
          Session()->flash('error','You are unauthorized Try!!');
          return redirect()->route('admin.pages');
        }
  
        if($action=='update' && $r->isMethod('post')){
  
          $check = $r->validate([
              'name' => 'required|max:200',
              'template' => 'nullable|max:100',
              'seo_title' => 'nullable|max:120',
              'seo_description' => 'nullable|max:200',
              'seo_keyword' => 'nullable|max:300',
              'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
              'banner' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
          ]);
  
          $createDate = $r->created_at ? Carbon::parse($r->created_at . ' ' . Carbon::now()->format('H:i:s')) : Carbon::now();
 
          $page->name=$r->name;
          $page->short_description=$r->short_description;
          $page->description=$r->description;
          $page->seo_title=$r->seo_title;
          $page->seo_description=$r->seo_description;
          $page->seo_keyword=$r->seo_keyword;
          $page->template=$r->template?:null;
          ///////Image Upload Start////////////
          if($r->hasFile('image')){
            $file =$r->image;
            $src  =$page->id;
            $srcType  =1;
            $fileUse  =1;
            $author=Auth::id();
            uploadFile($file,$src,$srcType,$fileUse,$author);
          }
          ///////Image Upload End////////////
  
          ///////Image Upload Start////////////
          if($r->hasFile('banner')){
            $file =$r->banner;
            $src  =$page->id;
            $srcType  =1;
            $fileUse  =2;
            $author=Auth::id();
            uploadFile($file,$src,$srcType,$fileUse,$author);
          }
          ///////Image Upload End////////////

          $slug =Str::slug($r->name);
  
          if($slug==null){
            $page->slug=$page->id;
          }else{
            if(Post::where('type',0)->where('slug',$slug)->whereNotIn('id',[$page->id])->count() >0){
            $page->slug=$slug.'-'.$page->id;
            }else{
            $page->slug=$slug;
            }
          }
  
          if (!$createDate->isSameDay($page->created_at)) {
            $page->created_at = $createDate;
          }
          $page->status =$r->status?'active':'inactive';
          $page->fetured =$r->fetured?1:0;
          $page->editedby_id =Auth::id();
          $page->save();
          
          //Gallery posts
          if($r->galleries){
  
            $page->postTags()->whereNotIn('reff_id',$r->galleries)->delete();
  
            for ($i=0; $i < count($r->galleries); $i++) {
              $tag = $page->postTags()->where('reff_id',$r->galleries[$i])->first();
  
                if($tag){}else{
                $tag =new PostAttribute();
                $tag->type=2;
                $tag->src_id=$page->id;
                $tag->reff_id=$r->galleries[$i];
                }
                $tag->save();
           }
         }else{
          $page->postTags()->delete();
         }
          
          
          Session()->flash('success','Your Are Successfully Done');
          return redirect()->back();
  
        }
  
        if($action=='delete'){
          
          //Page Extra Data Delete
          PostExtra::where('type',0)->where('src_id',$page->id)->delete();
  
          //Page Media File Delete
          $medies =Media::where('src_type',1)->where('src_id',$page->id)->get();
          foreach ($medies as  $media) {
              if(File::exists($media->file_url)){
                  File::delete($media->file_url);
              }
              $media->delete();
          }
  
          //Page Delete
          $page->delete();
          Session()->flash('success','Your Are Successfully Done');
          return redirect()->back();
  
        }
  
        $extraDatas=PostExtra::where('src_id',$id)->get();
        
        $galleries=Attribute::latest()->where('type',4)->where('status','<>','temp')->where('parent_id',null)
        ->select(['id','name'])
        ->get();
  
        return view(adminTheme().'pages.pageEdit',compact('page','extraDatas','galleries'));
    }
  // Page Management Function End


//Clients Function

public function clients(Request $r){
      
  $allPer = empty(json_decode(Auth::user()->permission->permission, true)['clients']['all']);
  
  // Filter Action Start
  if($r->action){
    if($r->checkid){

    $datas=Attribute::latest()->where('type',3)->whereIn('id',$r->checkid)->get();

    foreach($datas as $data){
      if($allPer && $data->addedby_id!=Auth::id()){
        // You are unauthorized Try!!
      }else{

        if($r->action==1){
          $data->status='active';
          $data->save();
        }elseif($r->action==2){
          $data->status='inactive';
          $data->save();
        }elseif($r->action==3){
          $data->fetured=true;
          $data->save();
        }elseif($r->action==4){
          $data->fetured=false;
          $data->save();
        }elseif($r->action==5){
          
          $medias =Media::latest()->where('src_type',3)->where('src_id',$data->id)->get();
          foreach($medias as $media){
            if(File::exists($media->file_url)){
              File::delete($media->file_url);
            }
            $media->delete();
          }

          $data->delete();
        }

      }


    }

    Session()->flash('success','Action Successfully Completed!');

    }else{
      Session()->flash('info','Please Need To Select Minimum One Post');
    }

    return redirect()->back();
  }

  //Filter Action End

  $clients=Attribute::latest()->where('type',3)->where('status','<>','temp')
    ->where(function($q) use ($r,$allPer) {

      if($r->search){
          $q->where('name','LIKE','%'.$r->search.'%');
      }

      if($r->status){
         $q->where('status',$r->status); 
      }

      // Check Permission
      if($allPer){
       $q->where('addedby_id',auth::id()); 
      }

  })
  ->select(['id','name','slug','type','created_at','addedby_id','status','fetured'])
  ->paginate(25)->appends([
    'search'=>$r->search,
    'status'=>$r->status,
  ]);

  //Total Count Results
  $totals = DB::table('attributes')
  ->where('type',3)
  ->selectRaw('count(*) as total')
  ->selectRaw("count(case when status = 'active' then 1 end) as active")
  ->selectRaw("count(case when status = 'inactive' then 1 end) as inactive")
  ->first();

  return view(adminTheme().'clients.clientsAll',compact('clients','totals'));
}

public function clientsAction(Request $r,$action,$id=null){
  // Add Client Action Start
  if($action=='create'){

    $client =Attribute::where('type',3)->where('status','temp')->where('addedby_id',Auth::id())->first();
    if(!$client){
      $client =new Attribute();
    }
    $client->type =3;
    $client->status ='temp';
    $client->addedby_id =Auth::id();
    $client->save();

    return redirect()->route('admin.clientsAction',['edit',$client->id]);

  } 

  // Add Client Action End
  
  
  $client =Attribute::where('type',3)->find($id);
  if(!$client){
    Session()->flash('error','This Client Are Not Found');
    return redirect()->route('admin.clients');
  }

  //Check Authorized User
  $allPer = empty(json_decode(Auth::user()->permission->permission, true)['clients']['all']);
  if($allPer && $client->addedby_id!=Auth::id()){
    Session()->flash('error','You are unauthorized Try!!');
    return redirect()->route('admin.clients');
  }

  // Update Client Action Start
  if($action=='update'){
      $check = $r->validate([
        'name' => 'required|max:191',
        'seo_title' => 'nullable|max:200',
        'seo_desc' => 'nullable|max:250',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'banner' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);
    
    $createDate = $r->created_at ? Carbon::parse($r->created_at . ' ' . Carbon::now()->format('H:i:s')) : Carbon::now();
    
    $client->name=$r->name;
    $client->short_description=$r->short_description;
    $client->description=$r->description;
    $client->seo_title=$r->seo_title;
    $client->short_description=$r->short_description;
    $client->seo_keyword=$r->seo_keyword;

    ///////Image UploadStart////////////
  
    if($r->hasFile('image')){
      $file =$r->image;
      $src  =$client->id;
      $srcType  =3;
      $fileUse  =1;
      $author=Auth::id();
      uploadFile($file,$src,$srcType,$fileUse,$author);
    }
    
    ///////Image Upload End////////////

    ///////Banner Upload End////////////

    if($r->hasFile('banner')){

      $file =$r->banner;
      $src  =$client->id;
      $srcType  =3;
      $fileUse  =2;
      $author=Auth::id();
      uploadFile($file,$src,$srcType,$fileUse,$author);

    }

    ///////Banner Upload End////////////

    $slug =Str::slug($r->name);
     if($slug==null){
      $client->slug=$client->id;
     }else{
      if(Attribute::where('type',3)->where('slug',$slug)->whereNotIn('id',[$client->id])->count() >0){
      $client->slug=$slug.'-'.$client->id;
      }else{
      $client->slug=$slug;
      }
    }
    
    if (!$createDate->isSameDay($client->created_at)) {
        $client->created_at = $createDate;
    }
    
    $client->status =$r->status?'active':'inactive';
    $client->fetured =$r->fetured?1:0;
    $client->editedby_id =Auth::id();
    $client->save();

    Session()->flash('success','Your Are Successfully Updated');
    return redirect()->back();

  }

  // Update Client Action End


  // Delete Client Action Start
  if($action=='delete'){
    $medias =Media::latest()->where('src_type',3)->where('src_id',$client->id)->get();
    foreach($medias as $media){
      if(File::exists($media->file_url)){
        File::delete($media->file_url);
      }
      $media->delete();
    }

    $client->delete();

    Session()->flash('success','Your Are Successfully Deleted');
    return redirect()->route('admin.clients');

  }
  // Delete Client Action End

  return view(adminTheme().'clients.clientsEdit',compact('client'));
}

//Clients Function End

//Brands Function

public function brands(Request $r){

  $allPer = empty(json_decode(Auth::user()->permission->permission, true)['brands']['all']);

  // Filter Action Start
  if($r->action){
    if($r->checkid){

    $datas=Attribute::latest()->where('type',2)->whereIn('id',$r->checkid)->get();

    foreach($datas as $data){
      if($allPer && $data->addedby_id!=Auth::id()){
        // You are unauthorized Try!!
      }else{

        if($r->action==1){
          $data->status='active';
          $data->save();
        }elseif($r->action==2){
          $data->status='inactive';
          $data->save();
        }elseif($r->action==3){
          $data->fetured=true;
          $data->save();
        }elseif($r->action==4){
          $data->fetured=false;
          $data->save();
        }elseif($r->action==5){
          
          $medias =Media::latest()->where('src_type',3)->where('src_id',$data->id)->get();
          foreach($medias as $media){
            if(File::exists($media->file_url)){
              File::delete($media->file_url);
            }
            $media->delete();
          }

          $data->delete();
        }

      }

    }

    Session()->flash('success','Action Successfully Completed!');

    }else{
      Session()->flash('info','Please Need To Select Minimum One Post');
    }

    return redirect()->back();
  }

  //Filter Action End

  $brands=Attribute::latest()->where('type',2)->where('status','<>','temp')
    ->where(function($q) use ($r,$allPer) {

      if($r->search){
          $q->where('name','LIKE','%'.$r->search.'%');
      }


      if($r->status){
         $q->where('status',$r->status); 
      }

      // Check Permission
      if($allPer){
       $q->where('addedby_id',auth::id()); 
      }

  })
  ->select(['id','name','slug','type','created_at','addedby_id','status','fetured'])
  ->paginate(25)->appends([
    'search'=>$r->search,
    'status'=>$r->status,
  ]);

  //Total Count Results
  $totals = DB::table('attributes')->where('status','<>','temp')
  ->where('type',2)
  ->selectRaw('count(*) as total')
  ->selectRaw("count(case when status = 'active' then 1 end) as active")
  ->selectRaw("count(case when status = 'inactive' then 1 end) as inactive")
  ->first();

  return view(adminTheme().'brands.brandsAll',compact('brands','totals'));

}

public function brandsAction(Request $r,$action,$id=null){
  // Add Brand Action Start
  if($action=='create'){

    $brand =Attribute::where('type',2)->where('status','temp')->where('addedby_id',Auth::id())->first();
    if(!$brand){
      $brand =new Attribute();
    }
    $brand->type =2;
    $brand->status ='temp';
    $brand->addedby_id =Auth::id();
    $brand->save();

    return redirect()->route('admin.brandsAction',['edit',$brand->id]);
  } 
  // Add Brand Action End
  
  $brand =Attribute::where('type',2)->find($id);
  if(!$brand){
    Session()->flash('error','This Brand Are Not Found');
    return redirect()->route('admin.brands');
  }

  //Check Authorized User
  $allPer = empty(json_decode(Auth::user()->permission->permission, true)['brands']['all']);
  if($allPer && $brand->addedby_id!=Auth::id()){
    Session()->flash('error','You are unauthorized Try!!');
    return redirect()->route('admin.brands');
  }

  // Update Brand Action Start
  if($action=='update'){

      $check = $r->validate([
          'name' => 'required|max:191',
          'seo_title' => 'nullable|max:200',
          'seo_desc' => 'nullable|max:250',
          'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
          'banner' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
      ]);
      
      $createDate = $r->created_at ? Carbon::parse($r->created_at . ' ' . Carbon::now()->format('H:i:s')) : Carbon::now();
      
      $brand->name=$r->name;
      $brand->short_description=$r->short_description;
      $brand->description=$r->description;
      $brand->seo_title=$r->seo_title;
      $brand->short_description=$r->short_description;
      $brand->seo_keyword=$r->seo_keyword;

       ///////Image UploadStart////////////

        if($r->hasFile('image')){
          $file =$r->image;
          $src  =$brand->id;
          $srcType  =3;
          $fileUse  =1;
          $author=Auth::id();
          uploadFile($file,$src,$srcType,$fileUse,$author);
        }
        
        ///////Image Upload End////////////

        ///////Banner Upload End////////////

        if($r->hasFile('banner')){

          $file =$r->banner;
          $src  =$brand->id;
          $srcType  =3;
          $fileUse  =2;
          $author=Auth::id();
          uploadFile($file,$src,$srcType,$fileUse,$author);

        }

        ///////Banner Upload End////////////

        $slug =Str::slug($r->name);
        if($slug==null){
          $brand->slug=$brand->id;
        }else{
          if(Attribute::where('type',2)->where('slug',$slug)->whereNotIn('id',[$brand->id])->count() >0){
          $brand->slug=$slug.'-'.$brand->id;
          }else{
          $brand->slug=$slug;
          }
        }
        if (!$createDate->isSameDay($brand->created_at)) {
        $brand->created_at = $createDate;
        }
        $brand->status =$r->status?'active':'inactive';
        $brand->fetured =$r->fetured?1:0;
        $brand->editedby_id =Auth::id();
        $brand->save();

        Session()->flash('success','Your Are Successfully Done');
        return redirect()->back();

  }
  // Update Brand Action Start

  // Delete Brand Action Start
  if($action=='delete'){
      $medias =Media::latest()->where('src_type',3)->where('src_id',$brand->id)->get();
        foreach($medias as $media){
          if(File::exists($media->file_url)){
            File::delete($media->file_url);
          }
          $media->delete();
        }

        $brand->delete();

        Session()->flash('success','Your Are Successfully Done');
        return redirect()->route('admin.brands');
  }
  // Delete Brand Action End

  return view(adminTheme().'brands.brandsEdit',compact('brand'));
}

//Brands Function End

    //Sliders Function
    public function sliders(Request $r){

      $allPer = empty(json_decode(Auth::user()->permission->permission, true)['sliders']['all']);

      // Add Slider Action Start
      if($r->actionType=='addSlider'){
        $slider =Attribute::latest()->where('type',1)->where('addedby_id',Auth::id())->where('status','temp')->first();
        if(!$slider){
        $slider =new Attribute();
        $slider->type =1;
        $slider->status ='temp';
        $slider->addedby_id =Auth::id();
        $slider->save();
        }else{
        $slider->created_at =Carbon::now();
        $slider->save();
        }
        return redirect()->route('admin.slidersEdit',$slider->id);
      }
      // Add Slider Action End

      $sliders=Attribute::latest()->where('type',1)->where('status','<>','temp')->where('parent_id',null)
      ->where(function($q) use ($allPer) {
          // Check Permission
          if($allPer){
            $q->where('addedby_id',auth::id()); 
          }
      })
      ->select(['id','name','location','type','created_at','addedby_id','status','fetured'])
      ->paginate(25);

      

      return view(adminTheme().'sliders.slidersAll',compact('sliders'));
    }

    public function slidersAction(Request $r,$action,$id=null){
      //Create Slider Start
      if($action=='create'){
        $slider =Attribute::latest()->where('type',1)->where('addedby_id',Auth::id())->where('status','temp')->first();
        if(!$slider){
        $slider =new Attribute();
        $slider->type =1;
        $slider->status ='temp';
        $slider->addedby_id =Auth::id();
        $slider->save();
        }else{
        $slider->created_at =Carbon::now();
        $slider->save();
        }
        return redirect()->route('admin.slidersAction',['edit',$slider->id]);
      }
      //Create Slider End
      
      $slider =Attribute::where('type',1)->find($id);
      if(!$slider){
        Session()->flash('error','This Slider Are Not Found');
        return redirect()->route('admin.sliders');
      }

      //Check Authorized User
      $allPer = empty(json_decode(Auth::user()->permission->permission, true)['sliders']['all']);
      if($allPer && $slider->addedby_id!=Auth::id()){
        Session()->flash('error','You are unauthorized Try!!');
        return redirect()->route('admin.sliders');
      }

      // Update Slider Action Start
      if($action=='update'){

        $check = $r->validate([
            'name' => 'required|max:191',
            'location' => 'nullable|max:200',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:25600',
            'banner' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $activeSlider =Attribute::where('type',1)->where('location',$r->location)->whereNotIn('id',[$slider->id])->first();
      
        if($activeSlider && $r->location){
          Session::flash('error','This Location Have Already a slider');
          return back();
        }

        $slider->name=$r->name;
        $slider->description=$r->description;
        $slider->location=$r->location;
        $slider->seo_title=$r->vediolink;

        ///////Image UploadStart////////////

        if($r->hasFile('image')){
          $file =$r->image;
          $src  =$slider->id;
          $srcType  =3;
          $fileUse  =1;
          $author=Auth::id();
          uploadFile($file,$src,$srcType,$fileUse,$author);
        }
        
        ///////Image Upload End////////////

        ///////Banner Upload End////////////

        if($r->hasFile('banner')){

          $file =$r->banner;
          $src  =$slider->id;
          $srcType  =3;
          $fileUse  =2;
          $author=Auth::id();
          uploadFile($file,$src,$srcType,$fileUse,$author);

        }

        ///////Banner Upload End////////////

        ///////Gallery Images UploadStart////////////
        
        $files=$r->file('images');
        if($files){
          
            foreach($files as $file)
            {

              $slide =new Attribute();
              $slide->type =1;
              $slide->parent_id =$slider->id;
              $slide->status ='active';
              $slide->addedby_id =Auth::id();
              $slide->save();

              $src  =$slide->id;
              $srcType  =3;
              $fileUse  =1;
              $author  =Auth::id();
              uploadFile($file,$src,$srcType,$fileUse,$author);

            }
          } 

        ///////Slide Drag Update Start////////////
        if(isset($r->slideid)){
          for ($i=0; $i < count($r->slideid); $i++) { 
            $slide =$slider->sliderItems->find($r->slideid[$i]);
            if($slide){
              $slide->view=$i;
              $slide->save();
            }
          }
        }
        ///////Slide Drag Update End////////////

        $slug =Str::slug($r->name);
        if($slug==null){
          $slider->slug=$slider->id;
        }else{
          if(Attribute::where('type',1)->where('slug',$slug)->whereNotIn('id',[$slider->id])->count() >0){
          $slider->slug=$slug.'-'.$slider->id;
          }else{
          $slider->slug=$slug;
          }
        }
        $slider->status =$r->status?'active':'inactive';
        $slider->editedby_id =Auth::id();
        $slider->save();

        Session()->flash('success','Your Are Successfully Done');
        return redirect()->back();

      }
      // Update Slider Action End

      // Delete Slider Action Start
      if($action=='delete'){
          //Sub Slider Items Delete
          foreach($slider->sliderItems as $slide){

            //Galleries  Media File Delete
              $medies =Media::where('src_type',3)->where('src_id',$slide->id)->get();
              foreach ($medies as  $media) {
                  if(File::exists($media->file_url)){
                      File::delete($media->file_url);
                  }
                  $media->delete();
              }

            $slide->delete();

          }

        //Galleries  Media File Delete
        $sliderMedies =Media::where('src_type',3)->where('src_id',$slider->id)->get();
        foreach ($sliderMedies as  $media) {
              if(File::exists($media->file_url)){
                  File::delete($media->file_url);
              }
              $media->delete();
          }

        $slider->delete();

        Session()->flash('success','Your Are Successfully Deleted');
        return redirect()->route('admin.sliders');

      }
      // Delete Slider Action End

      return view(adminTheme().'sliders.slidersEdit',compact('slider'));
    }

    public function slideAction(Request $r,$action,$id){
      $slide =Attribute::where('type',1)->find($id);
      if(!$slide){
        Session()->flash('error','This Slide Are Not Found');
        return redirect()->route('admin.sliders');
      }

      // Update Slide Slider Action Start
      if($action=='update'){
          $check = $r->validate([
              'name' => 'nullable|max:191',
              'buttonText' => 'nullable|max:200',
              'buttonLink' => 'nullable|max:200',
              'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
              'banner' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
          ]);

        $slide->name =$r->name;
        $slide->seo_title=$r->buttonText?:null;
        $slide->seo_description=$r->buttonLink?:null;
        $slide->description=$r->description;

        ///////Image UploadStart////////////

        if($r->hasFile('image')){
          $file =$r->image;
          $src  =$slide->id;
          $srcType  =3;
          $fileUse  =1;
          $author  =Auth::id();
          uploadFile($file,$src,$srcType,$fileUse,$author);
        }
        
        ///////Image Upload End////////////
        
         ///////Banner UploadStart////////////

        if($r->hasFile('banner')){
          $file =$r->banner;
          $src  =$slide->id;
          $srcType  =3;
          $fileUse  =2;
          $author  =Auth::id();
          uploadFile($file,$src,$srcType,$fileUse,$author);
        }
        
        ///////Banner Upload End////////////

        $slug =Str::slug($r->name);
        if($slug==null){
          $slide->slug=$slide->id;
        }else{
          if(Attribute::where('type',1)->where('slug',$slug)->whereNotIn('id',[$slide->id])->count() >0){
          $slide->slug=$slug.'-'.$slide->id;
          }else{
          $slide->slug=$slug;
          }
        }
        $slide->status =$r->status?'active':'inactive';
        $slide->editedby_id =Auth::id();
        $slide->save();

        Session()->flash('success','Your Are Successfully Done');
        return redirect()->back();

      }
      // Update Slide Slider Action End

      // Delete Slide Slider Action Start
      if($action=='delete'){
        //Galleries  Media File Delete
        $medies =Media::where('src_type',3)->where('src_id',$slide->id)->get();
          foreach ($medies as  $media) {
              if(File::exists($media->file_url)){
                  File::delete($media->file_url);
              }
              $media->delete();
          }
        $slide->delete();
        Session()->flash('success','Your Are Successfully Deleted');
        return redirect()->back();
      }
      // Delete Slide Slider Action End


      return  view(adminTheme().'sliders.slideEdit',compact('slide'));
    }

    //Sliders Function End


    //Galleries Function Start

    public function galleries(Request $r){

      $allPer = empty(json_decode(Auth::user()->permission->permission, true)['galleries']['all']);

      $galleries=Attribute::latest()->where('type',4)->where('status','<>','temp')->where('parent_id',null)
      ->where(function($q) use ($allPer) {
          // Check Permission
          if($allPer){
            $q->where('addedby_id',auth::id()); 
          }
      })
      ->select(['id','name','location','type','created_at','addedby_id','status','fetured'])
      ->paginate(25);
      return view(adminTheme().'galleries.galleriesAll',compact('galleries'));

    }

    public function galleriesAction(Request $r,$action,$id=null){

      //Create Gallery Start
      if($action=='create'){
        $gallery =Attribute::latest()->where('type',4)->where('addedby_id',Auth::id())->where('status','temp')->first();
        if(!$gallery){
        $gallery =new Attribute();
        $gallery->type =4;
        $gallery->status ='temp';
        $gallery->addedby_id =Auth::id();
        $gallery->save();
        }else{
        $gallery->created_at =Carbon::now();
        $gallery->save();
        }
        return redirect()->route('admin.galleriesAction',['edit',$gallery->id]);
      }
      //Create Gallery End

      $gallery =Attribute::where('type',4)->find($id);
      if(!$gallery){
        Session()->flash('error','This Gallery Are Not Found');
        return redirect()->route('admin.galleries');
      }

      //Check Authorized User
      $allPer = empty(json_decode(Auth::user()->permission->permission, true)['galleries']['all']);
      if($allPer && $gallery->addedby_id!=Auth::id()){
        Session()->flash('error','You are unauthorized Try!!');
        return redirect()->route('admin.galleries');
      }

      //Update Gallery Start
      if($action=='update'){

        $check = $r->validate([
            'name' => 'required|max:191',
            'location' => 'nullable|max:200',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:25600',
            'banner' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $activeGallery =Attribute::where('type',4)->where('location',$r->location)->whereNotIn('id',[$gallery->id])->first();
      
        if($activeGallery && $r->location){
          Session::flash('error','This Location Have Already a Gallery');
          return back();
        }
        
        $gallery->name=$r->name;
        $gallery->description=$r->description;
        $gallery->location=$r->location;

        ///////Image UploadStart////////////

        if($r->hasFile('image')){
          $file =$r->image;
          $src  =$gallery->id;
          $srcType  =3;
          $fileUse  =1;
          $author =Auth::id();
          uploadFile($file,$src,$srcType,$fileUse,$author);
        }
        ///////Image Upload End////////////

        ///////Banner Upload End////////////

        if($r->hasFile('banner')){

          $file =$r->banner;
          $src  =$gallery->id;
          $srcType  =3;
          $fileUse  =2;
          $author=Auth::id();
          uploadFile($file,$src,$srcType,$fileUse,$author);

        }

        ///////Banner Upload End////////////

        ///////Gallery Images UploadStart////////////
        
        $files=$r->file('images');
        if($files){
          
            foreach($files as $file)
            {
              
              $file =$file;
              $src  =$gallery->id;
              $srcType  =3;
              $fileUse  =3;
              $fileStatus=false;
              $author=Auth::id();
              uploadFile($file,$src,$srcType,$fileUse,$author,$fileStatus);
            }
          }
            
        ///////Gallery Images Upload End////////////
      
        $slug =Str::slug($r->name);
        if($slug==null){
          $gallery->slug=$gallery->id;
        }else{
          if(Attribute::where('type',1)->where('slug',$slug)->whereNotIn('id',[$gallery->id])->count() >0){
          $gallery->slug=$slug.'-'.$gallery->id;
          }else{
          $gallery->slug=$slug;
          }
        }
        $gallery->status =$r->status?'active':'inactive';
        $gallery->editedby_id =Auth::id();
        $gallery->save();

        if(isset($r->imageid)){

          for ($i=0; $i < count($r->imageid); $i++) { 
              $image =$gallery->galleryImages()->where('id',$r->imageid[$i])->first();
  
              if($image){
                $image->drag=$i;
                $image->alt_text=$r->imageName[$i];
                $image->description=$r->imageDescription[$i];
                $image->save();
              }
          }
  
        }
        
        if(isset($r->checkid)){
  
          for ($i=0; $i < count($r->checkid); $i++) { 
              $image =$gallery->galleryImages()->where('id',$r->checkid[$i])->first();
              if($image){
                if(File::exists($image->file_url)){
                    File::delete($image->file_url);
                }
                $image->delete();
              }
            
            }
        }

        
        Session()->flash('success','Your Are Successfully Update');
        return redirect()->back();

      }
      //Update Gallery End

      //Delete Gallery Start
      if($action=='delete'){

        //Galleries  Media all File Delete
        $galleryMedies =Media::where('src_type',3)->where('src_id',$gallery->id)->get();

        foreach ($galleryMedies as  $media) {
              if(File::exists($media->file_url)){
                  File::delete($media->file_url);
              }
              $media->delete();
          }

        $gallery->delete();

        Session()->flash('success','Your Are Successfully Done');
        return redirect()->route('admin.galleries');

      }
      //Delete Gallery End

      return view(adminTheme().'galleries.galleriesEdit',compact('gallery'));

    }

    //Galleries Function End

  
    public function accountsMethod(Request $r,$action=null,$id=null){
        
        
      //Create Deposit Start
      if($action=='create' && $r->isMethod('post')){
          
            $check = $r->validate([
                'name' => 'required',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'status' => 'required|max:12',
            ]);

            $payment =new Attribute();
            $payment->type=11;
            $payment->name=$r->name;
            
            ///////Image Uploard Start////////////

            if($r->hasFile('image')){
              $file =$r->image;
              $src  =$gallery->id;
              $srcType  =3;
              $fileUse  =1;
              
              uploadFile($file,$src,$srcType,$fileUse);
            }
            ///////Image Uploard End////////////
        
            $payment->description=$r->description;
            $payment->status=$r->status?:'inactive';
            $payment->addedby_id=Auth::id();
            $payment->save();

          Session()->flash('success','Accounts '.$r->type.' Successfully Done!');
          return redirect()->route('admin.accountsDeposit','list');
      }
      //Create Deposit End
        

      $payments =Attribute::orderBy('view')->where('type',11)->where('status','<>','temp')->where('parent_id',null)->get();
      

      
      return view(adminTheme().'accounts.accountsMethod',compact('payments','r'));
        
    }



    public function reportsAll(Request $r,$type){
        
        if($r->startDate){
            $from =$r->startDate;
        }else{
            $from=Carbon::now()->format('Y-m-d');
        }

        if($r->endDate){
            $to =$r->endDate;
        }else{
            $to=Carbon::now()->format('Y-m-d');
        }
        
        if($type=='products'){
            
            $shops = array();
            $brands = Attribute::where('type',2)->where('status','<>','temp')->where('parent_id',null)->get();
            $categories = Attribute::where('type',0)->where('status','<>','temp')->where('parent_id',null)->get();
            
            $products=array();
            
            if($r->brand || $r->cat || $r->shop || $r->status || $r->search || $r->startDate || $r->endDate){
                
            $products = Post::latest()->where('status', '<>','temp')
                ->where(function($qq)  use ($r)  {
    
                    if($r->brand)
                    {
                        $qq->where('brand_id',$r->brand);
                    }
                    if($r->cat)
                    {
                        $qq->where('cat_id',$r->cat);
                    }
    
                    if($r->shop)
                    {
                        $qq->where('seller_id',$r->shop);
                    }

                    if($r->status)
                    {
                        $qq->where('status',$r->status);
                    }
    
                    if($r->search)
                    {
                         $qq->where('search_key','like',"%{$r->search}%");
                    }
    
                    if($r->startDate || $r->endDate)
                    {
                        if($r->startDate){
                            $from =$r->startDate;
                        }else{
                            $from=Carbon::now()->format('Y-m-d');
                        }
    
                        if($r->endDate){
                            $to =$r->endDate;
                        }else{
                            $to=Carbon::now()->format('Y-m-d');
                        }
    
                        $qq->whereDate('created_at','>=',$from)->whereDate('created_at','<=',$to);
    
                    }
    
                })->get();
                
            }
            
            return view(adminTheme().'reports.productReports',compact('products','categories','brands','shops','r','type','from','to'));
            
        }elseif($type=='customer-reports'){
            
            
            $orders=array();
            
            if($r->status || $r->search || $r->startDate || $r->endDate){
                $status = $r->status;
                
                $orders =Order::latest()->where('order_type','customer_order')
                        ->where(function($qq)  use ($status,$r)  {
        
                        if($status==null){
                            $qq->where('order_status','<>','temp');
                        }else if($status=='pending-payment'){
                            $qq->where('payment_method',null);
                        }else{
                            $qq->where('order_status',$status);
                           
                        }
                        
                        if($r->search){
                           $qq->where('invoice','LIKE','%'.$r->search.'%')->orWhere('email','LIKE','%'.$r->search.'%')->orWhere('mobile','LIKE','%'.$r->search.'%'); 
                        }
                        
                        if($r->startDate || $r->endDate)
                        {
                            if($r->startDate){
                                $from =$r->startDate;
                            }else{
                                $from=Carbon::now()->format('Y-m-d');
                            }
        
                            if($r->endDate){
                                $to =$r->endDate;
                            }else{
                                $to=Carbon::now()->format('Y-m-d');
                            }
        
                            $qq->whereDate('created_at','>=',$from)->whereDate('created_at','<=',$to);
        
                        }
                        
                    })
                    ->get();
            
            }
            
            
            return view(adminTheme().'reports.customerReports',compact('orders','r','type','from','to'));
            
        }elseif($type=='order-report'){
            
            
            $orders=array();
            
            if($r->status || $r->search || $r->startDate || $r->endDate){
                $status = $r->status;
                
                $orders =Order::latest()->where('order_type','customer_order')
                        ->where(function($qq)  use ($status,$r)  {
        
                        if($status==null){
                            $qq->where('order_status','<>','temp');
                        }else if($status=='pending-payment'){
                            $qq->where('payment_method',null);
                        }else{
                            $qq->where('order_status',$status);
                           
                        }
                        
                        if($r->search){
                           $qq->where('invoice','LIKE','%'.$r->search.'%')->orWhere('email','LIKE','%'.$r->search.'%')->orWhere('mobile','LIKE','%'.$r->search.'%'); 
                        }
                        
                        if($r->startDate || $r->endDate)
                        {
                            if($r->startDate){
                                $from =$r->startDate;
                            }else{
                                $from=Carbon::now()->format('Y-m-d');
                            }
        
                            if($r->endDate){
                                $to =$r->endDate;
                            }else{
                                $to=Carbon::now()->format('Y-m-d');
                            }
        
                            $qq->whereDate('created_at','>=',$from)->whereDate('created_at','<=',$to);
        
                        }
                        
                    })
                    ->get();
            
            }
            
            
            return view(adminTheme().'reports.orderReport',compact('orders','r','type','from','to'));
            
        }else{
            
            $customerOrders  = Order::latest()->where('order_type','customer_order')->where('order_status','<>','temp')
                            ->whereDate('created_at','>=',$from)->whereDate('created_at','<=',$to)
                            ->get();
                            
            $POSOrders =$orders =Order::latest()->where('order_type','pos_order')->where('order_status','<>','temp')
                            ->whereDate('created_at','>=',$from)->whereDate('created_at','<=',$to)
                            ->get();
                            
            $products = Post::latest()->where('status', '<>','temp')->whereDate('created_at','>=',$from)->whereDate('created_at','<=',$to)
                            ->get();
                            
            $inventories = Order::latest()
                  ->where('user_id',null)
                  ->whereDate('created_at','>=',$from)->whereDate('created_at','<=',$to)
                  ->get();
            
            return view(adminTheme().'reports.summeryReports',compact('r','type','from','to','customerOrders','POSOrders','products','inventories'));
        }
         
        
    }



    public function themeSetting(Request $r){
      
    
        $offerBanners =PostExtra::where('type',5)->get();
        $homeDatas =PostExtra::where('type',4)->where('parent_id',null)->orderBy('drag','asc')->get();
      
      return view(adminTheme().'theme-setting.themeSetting',compact('homeDatas','offerBanners'));
    }
    
    public function themeSettingAction(Request $r,$action,$id=null){
        
        if($action=='banner-update'){

            $check = $r->validate([
                'banner_img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'banner_title' => 'nullable|max:500',
                'banner_shortDes' => 'nullable|max:500',
                'banner_link' => 'nullable|max:100',
            ]);
            $offerBanner =PostExtra::where('type',5)->find($id);
            if(!$offerBanner){
                Session()->flash('error','Offer Banner Are Not Found');
                return redirect()->back();
            }
            $offerBanner->name=$r->banner_title;
            $offerBanner->content=$r->banner_shortDes;
            $offerBanner->banner_link=$r->banner_link;
            $offerBanner->status=$r->status?'active':'pending';
            $offerBanner->save();
            
            ///////Image UploadStart////////////
             if($r->hasFile('banner_img')){
               $file =$r->banner_img;
               $src  =$offerBanner->id;
               $srcType  =9;
               $fileUse  =1;
               $author=Auth::id();
               uploadFile($file,$src,$srcType,$fileUse,$author);
             }
             ///////Image Upload End////////////
            
            
            Session()->flash('success','Data Updated Successfully Done');
            return redirect()->back();
            
        }
        
        if($action=='update-featured-note'){
            
            $check = $r->validate([
                'free_shipping' => 'required|max:300',
                'money_gurantee' => 'required|max:300',
                'online_support' => 'required|max:300',
            ]);
            $featuredText =PostExtra::where('type',7)->find($id);
            if(!$featuredText){
                Session()->flash('error','Featured Text Are Not Found');
                return redirect()->back();
            }
            
            $featuredText->name=$r->free_shipping;
            $featuredText->content=$r->money_gurantee;
            $featuredText->sub_title=$r->online_support;
            $featuredText->save();
            
            Session()->flash('success','Data Updated Successfully Done');
            return redirect()->back();
            
        }
        
        if($action=='update-offer-note'){

            $check = $r->validate([
              'note_title' => 'required',
              'created_at' => 'required|date',
            ]);
            $note =PostExtra::where('type',5)->find($id);
            if(!$note){
                Session()->flash('error','Note Are Not Found');
                return redirect()->back();
            }
            
            $createDate =$r->created_at?Carbon::parse($r->created_at . ' ' . Carbon::now()->format('H:i:s')):Carbon::now();
            
            $note->content=$r->note_title;
            $note->status=$r->status?'active':'inactive';
            if (!$createDate->isSameDay($note->created_at)) {
                $note->created_at = $createDate;
            }
            $note->save();
            
            Session()->flash('success','Your Are Successfully Done');
            return redirect()->back();
            
        }
        
        if($action=='delete-offer-note'){
            $note =PostExtra::where('type',5)->find($id);
            if(!$note){
                Session()->flash('error','Note Are Not Found');
                return redirect()->back();
            }
            
            $note->delete();
            
            Session()->flash('success','Your Are Successfully Deleted');
            return redirect()->back();
        }
        
        if($action=='create'){
              $postData =PostExtra::where('type',4)->where('status','temp')->where('addedby_id',Auth::id())->first();
              if(!$postData){
                $postData =new PostExtra();
                $postData->type=4;
                $postData->status='temp';
                $postData->addedby_id=Auth::id();
              }
              $postData->created_at=Carbon::now();
              $postData->save();
              return redirect()->route('admin.themeSettingAction',['edit',$postData->id]);
        }
        $homedata =PostExtra::where('type',4)->find($id);
        if(!$homedata){
            Session()->flash('error','Home Data Not Found');
            return redirect()->route('admin.themeSetting');
        }
        
        
        if($action=="update"){
            
            $check = $r->validate([
                'title' => 'required|max:100',
                'sub_title' => 'nullable|max:100',
                'data_limit' => 'required|numeric',
                'data_type' => 'required|numeric',
                'category_id' => 'nullable|numeric',
                'image_link' => 'nullable',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            
            $createDate =$r->created_at?Carbon::parse($r->created_at . ' ' . Carbon::now()->format('H:i:s')):Carbon::now();
            
            $homedata->name=$r->title;
            $homedata->sub_title=$r->sub_title;
            $homedata->data_limit=$r->data_limit;
            $homedata->data_type=$r->data_type?:0;
            $homedata->category_id=$r->category_id;
            $homedata->image_link=$r->image_link;
            
            ///////Image UploadStart////////////
             if($r->hasFile('image')){
               $file =$r->image;
               $src  =$homedata->id;
               $srcType  =9;
               $fileUse  =1;
               $author=Auth::id();
               uploadFile($file,$src,$srcType,$fileUse,$author);
             }
             ///////Image Upload End////////////
            
            $homedata->status=$r->status?'active':'inactive';
            if (!$createDate->isSameDay($homedata->created_at)) {
                $homedata->created_at = $createDate;
            }
            $homedata->save();
            
            Session()->flash('success','Data Updated Successfully Done');
            return redirect()->back();

        }
        
        if($action=="delete"){
            $homedata->homeDataIds()->delete();
            
            $userFiles =Media::latest()->where('src_type',9)->where('src_id',$homedata->id)->get();
            foreach ($userFiles as $media) {
                if(File::exists($media->file_url)){
                      File::delete($media->file_url);
                  }
                $media->delete();
            }
            
            $homedata->delete();
            
            Session()->flash('success','Data Delete Successfully Done!');
            return redirect()->route('admin.themeSetting');
        }
        
        $searchProducts =null;
        
        if($r->ajax()){
            
            if($r->type=='search'){
                
                $searchProducts =Post::latest()->where('type',2)->where('status','active')->where('stock_status',true)->where('quantity','>',0)
                ->where(function($q) use($r){
                    
                    if($r->type=='search' && $r->key){
                        $q->where('name','like','%'.$r->key.'%');
                        $q->orWhere('sku_code','like','%'.$r->key.'%');
                        $q->orWhere('bar_code','like',$r->key);
                    }

                })
                ->select(['id','name','final_price','quantity','sku_code'])
                ->paginate(25)->appends([
                  'key'=>$r->key,
                  'barcode'=>$r->barcode,
                ]);
                
               $datas =view(adminTheme().'purchase.includes.searchResult',compact('searchProducts'))->render();
                
                return Response()->json([
                    'success' => true,
                    'view' => $datas,
                ]); 
            }
            
            if($r->type=='addproduct' && $r->id){

               $product =Post::latest()->where('type',2)->where('status','active')->find($r->id);

               if($product){
                   
                    $item =PostExtra::where('parent_id',$homedata->id)->where('src_id',$product->id)->first();
                            
                    if(!$item){
                        $item =new PostExtra();
                        $item->parent_id =$homedata->id;
                        $item->src_id =$product->id;
                        $item->type =4;
                        $item->save();
                    }
                    
               }
               
            }
            
            $datas =view(adminTheme().'theme-setting.includes.homeProducts',compact('homedata'))->render();
            
            return Response()->json([
                    'success' => true,
                    'view' => $datas,
                ]);
            
        }
        

        $categories =Attribute::where('type',0)->where('status','active')->where('parent_id',null)->get(['id','name']);
        
        return view(adminTheme().'theme-setting.themeSettingEdit',compact('homedata','searchProducts','categories'));
    }
    
    
    public function themeSettingEdit(Request $r,$id){
        
        $homedata =PostExtra::where('type',4)->find($id);
        
        if(!$homedata){
            Session()->flash('error','Home Data Not Found');
            return redirect()->route('admin.themeSetting');
        }
        
        if($r->type=="delete"){
            $homedata->homeDataIds()->delete();
            $homedata->delete();
            
            Session()->flash('success','Data Delete Successfully Done!');
            return redirect()->route('admin.themeSetting');
        }
        
        $searchProducts =null;
        
        if($r->ajax()){
            
            if($r->type=='search'){
                
                $searchProducts =Post::latest()->where('type',2)->where('status','active')->where('stock_status',true)->where('quantity','>',0)
                ->where(function($q) use($r){
                    
                    if($r->type=='search' && $r->key){
                        $q->where('name','like','%'.$r->key.'%');
                        $q->orWhere('sku_code','like','%'.$r->key.'%');
                        $q->orWhere('bar_code','like',$r->key);
                    }

                })
                ->select(['id','name','final_price','quantity','sku_code'])
                ->paginate(25)->appends([
                  'key'=>$r->key,
                  'barcode'=>$r->barcode,
                ]);
                
               $datas =view(adminTheme().'purchase.includes.searchResult',compact('searchProducts'))->render();
                
                return Response()->json([
                    'success' => true,
                    'view' => $datas,
                ]); 
            }
            
            if($r->type=='addproduct' && $r->id){

               $product =Post::latest()->where('type',2)->where('status','active')->find($r->id);

               if($product){
                   
                    $item =PostExtra::where('parent_id',$homedata->id)->where('src_id',$product->id)->first();
                            
                    if(!$item){
                        $item =new PostExtra();
                        $item->parent_id =$homedata->id;
                        $item->src_id =$product->id;
                        $item->type =4;
                        $item->save();
                    }
                    
               }
               
            }
            
            $datas =view(adminTheme().'theme-setting.includes.homeProducts',compact('homedata'))->render();
            
            return Response()->json([
                    'success' => true,
                    'view' => $datas,
                ]);
            
        }
        
        return view(adminTheme().'theme-setting.themeSettingEdit',compact('homedata','searchProducts'));
    }
    
    
    public function themeSettingUpdate(Request $r,$id){
        $homedata =PostExtra::where('type',4)->find($id);
        
        if(!$homedata){
            Session()->flash('error','Home Data Not Found');
            return redirect()->route('admin.themeSetting');
        }
        
        $check = $r->validate([
            'title' => 'required|max:191',
            'bg_color' => 'nullable|max:100',
            'title_color' => 'nullable|max:100',
            'serial' => 'required|numeric',
            'limit' => 'required|numeric',
            'product_view' => 'required|numeric',
            'product_type' => 'required|numeric',
            'status' => 'required',
        ]);

        $homedata->name = $r->title;
        $homedata->bg_color = $r->bg_color;
        $homedata->title_color = $r->title_color;
        $homedata->drag = $r->serial?:0;
        $homedata->product_limit = $r->limit?:0;
        $homedata->product_view = $r->product_view?:0;
        $homedata->product_type = $r->product_type?:0;
        $homedata->status = $r->status;
        $homedata->save();
        
        if(isset($r->delete)){
            
            $homedata->homeDataIds()->whereIn('src_id',$r->delete)->delete();
            
        }
        
        
        Session()->flash('success','Data Updated Successfully Done');
        return redirect()->back();
        
    }
    
    



  // User Management Function Start
  public function usersAdmin(Request $r){

    //Filter Actions Start
    if($r->action){
      if($r->checkid){
      $datas=User::latest()->whereIn('status',[0,1])->where('admin',true)->whereIn('id',$r->checkid)->get();
      foreach($datas as $data){
          if($r->action==1){
            $data->status=1;
            $data->save();
          }elseif($r->action==2){
            $data->status=0;
            $data->save();
          }elseif($r->action==5){
            //User Media File Delete
            $data->admin=false;
            $data->addedby_at=null;
            $data->permission_id=null;
            $data->addedby_id=null;
            $data->save();
          }
      }
      Session()->flash('success','Action Successfully Completed!');
      }else{
        Session()->flash('info','Please Need To Select Minimum One Post');
      }
      return redirect()->back();
    }

    //Filter Action End

    $users =User::latest()->whereIn('status',[0,1])->where('admin',true)
    ->where(function($q) use($r) {

        if($r->search){
            $q->where('name','LIKE','%'.$r->search.'%');
            $q->orWhere('email','LIKE','%'.$r->search.'%');
            $q->orWhere('mobile','LIKE','%'.$r->search.'%');
        }

        if($r->role){
           $q->where('permission_id',$r->role);
        }
        
        if($r->status){
            $status =$r->status=='active'?1:0;
           $q->where('status',$status);
        }
        
        if($r->startDate || $r->endDate)
        {
            if($r->startDate){
                $from =$r->startDate;
            }else{
                $from=Carbon::now()->format('Y-m-d');
            }

            if($r->endDate){
                $to =$r->endDate;
            }else{
                $to=Carbon::now()->format('Y-m-d');
            }

            $q->whereDate('addedby_at','>=',$from)->whereDate('addedby_at','<=',$to);
        }

    })
    ->select(['id','permission_id','name','email','mobile','addedby_at','addedby_id','status'])
    ->paginate(25)->appends([
      'status'=>$r->status,
      'search'=>$r->search,
      'startDate'=>$r->startDate,
      'endDate'=>$r->endDate,
    ]);

    //Total Count Results
    $totals = DB::table('users')->whereIn('status',[0,1])->where('admin',true)
    ->selectRaw('count(*) as total')
    ->selectRaw("count(case when status = 1 then 1 end) as active")
    ->selectRaw("count(case when status = 0 then 1 end) as inactive")
    ->first();
   
    $roles =Permission::latest()->where('status','active')->get();

    return view(adminTheme().'users.admins.users',compact('users','totals','roles'));
  }

  public function usersAdminAction (Request $r,$action,$id=null){
    
    //Add Admin User Start
    if($action=='create' && $r->isMethod('post')){

      if(filter_var($r->username, FILTER_VALIDATE_EMAIL)){
        $hasUser =User::latest()->whereIn('status',[0,1])->where('email',$r->username)->first();
      }else{
        $hasUser =User::latest()->whereIn('status',[0,1])->where('mobile',$r->username)->first();
      }
  
      if(!$hasUser){
          Session()->flash('error','This User Are Not Register');
          return redirect()->route('admin.usersAdmin');
      }
  
      if($hasUser->admin){
          Session()->flash('error','This User Are already Admin Authorize');
          return redirect()->route('admin.usersAdmin');
      }
  
      $hasUser->admin=true;
      $hasUser->permission_id=1;
      $hasUser->addedby_at=Carbon::now();
      $hasUser->addedby_id=Auth::id();
      $hasUser->save();
     
      Session()->flash('success','User Are Successfully Admin Authorize Done!');
      return redirect()->route('admin.usersAdminAction',['edit',$hasUser->id]);

    }
    //Add Admin User End


    $user=User::whereIn('status',[0,1])->where('admin',true)->find($id);
    if(!$user){
      Session()->flash('error','This Admin User Are Not Found');
      return redirect()->route('admin.usersAdmin');
    }

      //Update User Profile Start
      if($action=='update' && $r->isMethod('post')){

          $check = $r->validate([
               'name' => 'required|max:100',
               'email' => 'required|max:100|unique:users,email,'.$user->id,
               'mobile' => 'nullable|max:20|unique:users,mobile,'.$user->id,
               'gender' => 'nullable|max:10',
               'address' => 'nullable|max:191',
               'division' => 'nullable|numeric',
               'district' => 'nullable|max:191',
               'city' => 'nullable|max:191',
               'postal_code' => 'nullable|max:20',
               'role' => 'nullable|numeric',
               'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
   
           ]);
   
         $user->name =$r->name;
         $user->mobile =$r->mobile;
         $user->email =$r->email;
         $user->gender =$r->gender;
         $user->address_line1 =$r->address;
         $user->division =$r->division;
         $user->district =$r->district;
         $user->city =$r->city;
         $user->postal_code =$r->postal_code;
         $user->permission_id =$r->role;
         
         ///////Image UploadStart////////////
         if($r->hasFile('image')){
           $file =$r->image;
           $src  =$user->id;
           $srcType  =6;
           $fileUse  =1;
           $author=Auth::id();
           uploadFile($file,$src,$srcType,$fileUse,$author);
         }
         ///////Image Upload End////////////
   
         $user->status=$r->status?true:false;
         $user->save();
   
         Session()->flash('success','Your Updated Are Successfully Done!');
         return redirect()->route('admin.usersAdminAction',['edit',$user->id]);
      }
      //Update User Profile End

      //Update User Password Start
      if($action=='change-password' && $r->isMethod('post')){
        
        $validator = Validator::make($r->all(), [
            'old_password' => 'required|string|min:8',
            'password' => 'required|string|min:8|confirmed|different:old_password',
        ]);
      
        if($validator->fails()){
            return redirect()->route('admin.usersAdminAction',['edit',$user->id])->withErrors($validator)->withInput();
        }

        if(Hash::check($r->old_password, $user->password)){
          $user->password_show=$r->password;
          $user->password=Hash::make($r->password);
          $user->update();

          Session()->flash('success','Your Are Successfully Done');
          return redirect()->route('admin.usersAdminAction',['edit',$user->id]);
        }else{
          Session()->flash('error','Current Password Are Not Match');
          return redirect()->route('admin.usersAdminAction',['edit',$user->id]);
        }
      }
      //Update User Password End

      //Delete User End
      if($action=='delete'){
        $user->admin=false;
        $user->addedby_at=null;
        $user->permission_id=null;
        $user->addedby_id=null;
        $user->save();

        Session()->flash('success','Admin User Are Removed Successfully Done');
        return redirect()->route('admin.usersAdmin');
      }
      //Delete User End
      $roles =Permission::latest()->where('status','active')->get();

      return view(adminTheme().'users.admins.editUser',compact('user','roles'));

  }

  public function usersCustomer(Request $r){

    //Filter Actions Start
    if($r->action){
      if($r->checkid){

      $datas=User::latest()->whereIn('status',[0,1])->whereIn('id',$r->checkid)->get();

      foreach($datas as $data){

          if($r->action==1){
            $data->status=1;
            $data->save();
          }elseif($r->action==2){
            $data->status=0;
            $data->save();
          }elseif($r->action==5){
            
            $userFiles =Media::latest()->where('src_type',6)->where('src_id',$data->id)->get();
            foreach ($userFiles as $media) {
                if(File::exists($media->file_url)){
                      File::delete($media->file_url);
                  }
                $media->delete();
            }
            $data->delete();

          }

      }

      Session()->flash('success','Action Successfully Completed!');

      }else{
        Session()->flash('info','Please Need To Select Minimum One Post');
      }

      return redirect()->back();
    }

    //Filter Action End

    $users =User::latest()->whereIn('status',[0,1])
    ->where(function($q) use($r) {

        if($r->search){
            $q->where('name','LIKE','%'.$r->search.'%');
            $q->orWhere('email','LIKE','%'.$r->search.'%');
            $q->orWhere('mobile','LIKE','%'.$r->search.'%');
        }
        if($r->status){
            $status =$r->status=='active'?1:0;
           $q->where('status',$status);
        }
        if($r->startDate || $r->endDate)
        {
            if($r->startDate){
                $from =$r->startDate;
            }else{
                $from=Carbon::now()->format('Y-m-d');
            }

            if($r->endDate){
                $to =$r->endDate;
            }else{
                $to=Carbon::now()->format('Y-m-d');
            }

            $q->whereDate('created_at','>=',$from)->whereDate('created_at','<=',$to);
        }

    })
    ->select(['id','permission_id','name','email','mobile','created_at','addedby_id','status'])
      ->paginate(25)->appends([
        'status'=>$r->status,
        'search'=>$r->search,
        'startDate'=>$r->startDate,
        'endDate'=>$r->endDate,
      ]);

    //Total Count Results
    $totals = DB::table('users')->whereIn('status',[0,1])
    ->selectRaw('count(*) as total')
    ->selectRaw("count(case when status = 1 then 1 end) as active")
    ->selectRaw("count(case when status = 0 then 1 end) as inactive")
    ->first();

    return view(adminTheme().'users.customers.users',compact('users','totals'));
  }


  public function usersCustomerAction(Request $r,$action,$id=null){
     
    //Add New User Start
    if($action=='create' && $r->isMethod('post')){

      $user =User::where('email',$r->email)->first();
      if(!$user){
        $password=Str::random(8);
        $user =new User();
        $user->name =$r->name;
        $user->email =$r->email;
        $user->password_show=$password;
        $user->password=Hash::make($password);
        $user->save();
      }
      
      return redirect()->route('admin.usersCustomerAction',['edit',$user->id]);
    }
    //Add New User End
    
    
    $user=User::whereIn('status',[0,1])->find($id);
    if(!$user){
      Session()->flash('error','This User Are Not Found');
      return redirect()->route('admin.usersCustomer');
    }

    //Update User Profile Start
    if($action=='update' && $r->isMethod('post')){

        $check = $r->validate([
              'name' => 'required|max:100',
              'email' => 'required|max:100|unique:users,email,'.$user->id,
              'mobile' => 'nullable|max:20|unique:users,mobile,'.$user->id,
              'gender' => 'nullable|max:10',
              'address' => 'nullable|max:191',
              'division' => 'nullable|numeric',
              'district' => 'nullable|numeric',
              'city' => 'nullable|numeric',
              'created_at' => 'nullable|date|max:50',
              'postal_code' => 'nullable|max:20',
              'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
          ]);

        $createDate = $r->created_at ? Carbon::parse($r->created_at . ' ' . Carbon::now()->format('H:i:s')) : Carbon::now();
  
        $user->name =$r->name;
        $user->mobile =$r->mobile;
        $user->email =$r->email;
        $user->gender =$r->gender;
        $user->address_line1 =$r->address;
        $user->division =$r->division;
        $user->district =$r->district;
        $user->city =$r->city;
        $user->postal_code =$r->postal_code;
        if (!$createDate->isSameDay($user->created_at)) {
          $user->created_at = $createDate;
        }
        ///////Image UploadStart////////////
        if($r->hasFile('image')){
  
          $file =$r->image;
          $src  =$user->id;
          $srcType  =6;
          $fileUse  =1;
          $author =Auth::id();
          uploadFile($file,$src,$srcType,$fileUse,$author);
        }
        ///////Image Upload End////////////
  
        $user->status=$r->status?true:false;
        $user->save();
  
        Session()->flash('success','Your Updated Are Successfully Done!');
        return redirect()->back();

      }
      //Update User Profile End

      //Update User Password Change Start
      if($action=='change-password' && $r->isMethod('post')){
   
        $validator = Validator::make($r->all(), [
            'old_password' => 'required|string|min:8',
            'password' => 'required|string|min:8|confirmed|different:old_password',
        ]);
       
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if(Hash::check($r->old_password, $user->password)){
          $user->password_show=$r->password;
          $user->password=Hash::make($r->password);
          $user->update();
         
          Session()->flash('success','Your Are Successfully Done');
          return redirect()->back();
        }else{
        Session()->flash('error','Current Password Are Not Match');
        return redirect()->back();
        }

      }
      //Update User Password Change End

      //Delete User Start
      if($action=='delete'){

        $userFiles =Media::latest()->where('src_type',6)->where('src_id',$user->id)->get();
        foreach ($userFiles as $media) {
            if(File::exists($media->file_url)){
                  File::delete($media->file_url);
              }
            $media->delete();
        }
        $user->delete();
        Session()->flash('success','User Are Deleted Successfully Deleted!');
        return redirect()->back();
      }
      //Delete User End

    return view(adminTheme().'users.customers.editUser',compact('user'));

  }

    public function subscribes(Request $r){

      // Filter Action Start
        if($r->action){
          if($r->checkid){

            PostExtra::latest()->where('type',1)->whereIn('id',$r->checkid)->delete();

          Session()->flash('success','Action Successfully Completed!');

          }else{
            Session()->flash('info','Please Need To Select Minimum One Post');
          }

          return redirect()->back();
        }

        //Filter Action End

      $subscribes =PostExtra::where('type',1)
      ->where(function($q) use ($r){

        if($r->search){
              $q->where('name','LIKE','%'.$r->search.'%');
          }
          
          if($r->startDate || $r->endDate)
          {
              if($r->startDate){
                  $from =$r->startDate;
              }else{
                  $from=Carbon::now()->format('Y-m-d');
              }

              if($r->endDate){
                  $to =$r->endDate;
              }else{
                  $to=Carbon::now()->format('Y-m-d');
              }

              $q->whereDate('created_at','>=',$from)->whereDate('created_at','<=',$to);
          }

      })
      ->select(['id','name','created_at'])
      ->paginate(50)->appends([
        'search'=>$r->search,
        'startDate'=>$r->startDate,
        'endDate'=>$r->endDate,
      ]);

      return view(adminTheme().'users.subscribes.subscribeAll',compact('subscribes','r'));
    }


  public function userRoles(Request $r){
    $allPer = empty(json_decode(Auth::user()->permission->permission, true)['adminRoles']['all']);

    $roles =Permission::latest()
    ->where('status','active')
    ->where(function($q) use($r,$allPer) {

        if($r->search){
            $q->where('name','LIKE','%'.$r->search.'%');
        }
        
        if($r->startDate || $r->endDate)
        {
            if($r->startDate){
                $from =$r->startDate;
            }else{
                $from=Carbon::now()->format('Y-m-d');
            }

            if($r->endDate){
                $to =$r->endDate;
            }else{
                $to=Carbon::now()->format('Y-m-d');
            }

            $q->whereDate('created_at','>=',$from)->whereDate('created_at','<=',$to);

        }

       // Check Permission
        if($allPer){
         $q->where('addedby_id',auth::id()); 
        }

    })
    ->select(['id','name','created_at','addedby_id','status'])
      ->paginate(25)->appends([
        'search'=>$r->search,
        'startDate'=>$r->startDate,
        'endDate'=>$r->endDate,
      ]);

    return view(adminTheme().'users.roles.userRoles',compact('roles'));
  }


  public function userRoleAction(Request $r,$action,$id){
      
      $user =Auth::user();

      if($action!='add'){
      $role=Permission::find($id);
        if(!$role){
          Session()->flash('error','This Role Are Not Found');
          return redirect()->route('admin.userRoles');
        }

      }

      if($action=='add'){
        
        //Role Added Start

          $role  =Permission::where('addedby_id',$user->id)->where('status','temp')->first();

          if(!$role){
            $role = new Permission();
            $role->status='temp';
            $role->addedby_id=$user->id;
            $role->save();
          }else{
            $role->created_at=Carbon::now();
            $role->save();
          }
          
          return redirect()->route('admin.userRoleAction',['action'=>'edit','id'=>$role->id]);

      }elseif($action=='edit'){

        //Role Edit Start

        return view(adminTheme().'users.roles.userRoleEdit',compact('role'));

      }elseif($action=='update'){

        //Role Edit Update

        $check = $r->validate([
            'name' => 'required|max:100',
        ]);

        if(!$check){
            Session::flash('error','Need To validatation');
            return back();
        }
        $role->name =$r->name;
        if($role->id==1){
        $role->permission =$r->permission;
        }else{
          $role->permission =$r->permission;  
        }
        $role->status ='active';
        $role->save();
        Session()->flash('success','Role Updated Are Successfully Done!');
        return redirect()->route('admin.userRoleAction',['action'=>'edit','id'=>$role->id]);


      }elseif($action=='delete'){

        //Role Edit Delete

        $role->delete();

        Session()->flash('success','Role Deleted Are Successfully Done!');
        $role->delete();

        return redirect()->route('admin.userRoles');

      }else{
        Session()->flash('error','Somthing Worng Action Please Try Again.');
        return redirect()->route('admin.userRoles');
      }


  }

  // User Management Function End


  // Setting Function Start
  public function setting($type){

    $general =General::first();
    if($type=='general'){
      return view(adminTheme().'setting.general',compact('general','type'));
    }else if($type=='mail'){
      return view(adminTheme().'setting.mail',compact('general','type'));
    }else if($type=='sms'){
      return view(adminTheme().'setting.sms',compact('general','type'));
    }else if($type=='social'){
      return view(adminTheme().'setting.social',compact('general','type'));
    }else if($type=='document'){
      return view(adminTheme().'setting.document',compact('general','type'));
    }else if($type=='support'){
      return view(adminTheme().'setting.support',compact('general','type'));
    }else if($type=='logo'){

      if(File::exists($general->logo)){
            File::delete($general->logo);
      }
      $general->logo=null;
      $general->save();

      Session()->flash('success','Logo Deleted Are Successfully Done!');
      return redirect()->back();
    }else if($type=='favicon'){
       if(File::exists($general->favicon)){
            File::delete($general->favicon);
      }
      $general->favicon=null;
      $general->save();

      Session()->flash('success','Logo Deleted Are Successfully Done!');
      return redirect()->back();
    }else if($type=='banner'){
       if(File::exists($general->banner)){
            File::delete($general->banner);
      }
      $general->banner=null;
      $general->save();

      Session()->flash('success','Banner Deleted Are Successfully Done!');
      return redirect()->back();
    }else if($type=='cache-clear'){
      
      Artisan::call('cache:clear');
      Artisan::call('config:clear');
      Artisan::call('config:cache');
      Artisan::call('view:clear');
      Artisan::call('route:clear');
      Artisan::call('clear-compiled');

      Session()->flash('success','Cache Clear Are Successfully Done!');

      return redirect(url(adminTheme().'/admin/dashboard'));

    }else{
      return redirect()->route('admin.setting','general','type');
    }

  }


  public function settingUpdate(Request $r,$type){


    $general =General::first();

    if($type=='general'){

        $check = $r->validate([
            'title' => 'nullable|max:100',
            'subtitle' => 'nullable|max:200',
            'mobile' => 'nullable|max:100',
            'email' => 'nullable|max:100',
            'website' => 'nullable|max:100',
            'meta_author' => 'nullable|max:100',
            'meta_title' => 'nullable|max:200',
            'meta_description' => 'nullable|max:200',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'favicon' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'banner' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $general->title=$r->title;
        $general->subtitle=$r->subtitle;
        $general->mobile=$r->mobile;
        $general->email=$r->email;
        $general->address_one=$r->address_one;
        $general->address_two=$r->address_two;
        $general->website=$r->website;
        $general->meta_author=$r->meta_author;
        $general->meta_title=$r->meta_title;
        $general->meta_keyword=$r->meta_keyword;
        $general->meta_description=$r->meta_description;
        $general->script_head=$r->script_head;
        $general->script_body=$r->script_body;
        $general->custom_css=$r->custom_css;
        $general->custom_js=$r->custom_js;
        $general->copyright_text=$r->footer_text;
        

        ///////Image UploadStart////////////

        if($r->hasFile('logo')){

          $file=$r->logo;

          if(File::exists($general->logo)){
                File::delete($general->logo);
          }

          $name = basename($file->getClientOriginalName(), '.'.$file->getClientOriginalExtension());
          $fullName = basename($file->getClientOriginalName());
          $ext =$file->getClientOriginalExtension();
          $size =$file->getSize();

          $year =carbon::now()->format('Y');
          $month =carbon::now()->format('M');
          $folder = $month.'_'.$year;

          $img =time().'.'.uniqid().'.'.$file->getClientOriginalExtension();
          $path ="medies/".$folder;
          $fullPath ="public/medies/".$folder.'/'.$img;

          $file->move(public_path($path), $img);
          $general->logo =$fullPath;

      }

         ///////Image UploadStart////////////

        if($r->hasFile('favicon')){

            $file=$r->favicon;

            if(File::exists($general->favicon)){
                  File::delete($general->favicon);
            }

            $name = basename($file->getClientOriginalName(), '.'.$file->getClientOriginalExtension());
            $fullName = basename($file->getClientOriginalName());
            $ext =$file->getClientOriginalExtension();
            $size =$file->getSize();

            $year =carbon::now()->format('Y');
            $month =carbon::now()->format('M');
            $folder = $month.'_'.$year;

            $img =time().'.'.uniqid().'.'.$file->getClientOriginalExtension();
            $path ="medies/".$folder;
            $fullPath ="public/medies/".$folder.'/'.$img;
            
            $file->move(public_path($path), $img);
            $general->favicon =$fullPath;

        }
        
        if($r->hasFile('banner')){

            $file=$r->banner;

            if(File::exists($general->banner)){
                  File::delete($general->banner);
            }

            $name = basename($file->getClientOriginalName(), '.'.$file->getClientOriginalExtension());
            $fullName = basename($file->getClientOriginalName());
            $ext =$file->getClientOriginalExtension();
            $size =$file->getSize();

            $year =carbon::now()->format('Y');
            $month =carbon::now()->format('M');
            $folder = $month.'_'.$year;

            $img =time().'.'.uniqid().'.'.$file->getClientOriginalExtension();
            $path ="medies/".$folder;
            $fullPath ="public/medies/".$folder.'/'.$img;
            
            $file->move(public_path($path), $img);
            $general->banner =$fullPath;

        }
        $general->commingsoon_mode=$r->commingsoon_mode?true:false;
        $general->save();

        Session()->flash('success','General Updated Are Successfully Done!');

    }


    if($type=='mail'){

      $check = $r->validate([
            'mail_from_address' => 'nullable|max:100',
            'mail_from_name' => 'nullable|max:100',
            'mail_driver' => 'nullable|max:100',
            'mail_host' => 'nullable|max:100',
            'mail_port' => 'nullable|max:100',
            'mail_encryption' => 'nullable|max:100',
            'mail_username' => 'nullable|max:100',
            'mail_password' => 'nullable|max:100',
            'admin_mails' => 'nullable|max:1000',
        ]);

      $general->mail_from_address=$r->mail_from_address;
      $general->mail_from_name=$r->mail_from_name;
      $general->mail_driver=$r->mail_driver;
      $general->mail_host=$r->mail_host;
      $general->mail_port=$r->mail_port;
      $general->mail_encryption=$r->mail_encryption;
      $general->mail_username=$r->mail_username;
      $general->mail_password=$r->mail_password;
      $general->admin_mails=$r->admin_mails;
      $general->mail_status=$r->mail_status?true:false;
      $general->register_mail_user=$r->register_mail_user?true:false;
      $general->register_mail_author=$r->register_mail_author?true:false;
      $general->forget_password_mail_user=$r->forget_password_mail_user?true:false;
      $general->register_verify_mail_user=$r->register_verify_mail_user?true:false;
      $general->save();

      Session()->flash('success','Mail Updated Are Successfully Done!');

    }

    if($type=='sms'){

      $check = $r->validate([
            'sms_type' => 'nullable|max:50',
            'sms_senderid' => 'nullable|max:50',
            'sms_url_nonmasking' => 'nullable|max:200',
            'sms_url_masking' => 'nullable|max:200',
            'sms_username' => 'nullable|max:50',
            'sms_password' => 'nullable|max:50',
            'admin_numbers' => 'nullable|max:1000',
      ]);

      $general->sms_type=$r->sms_type;
      $general->sms_senderid=$r->sms_senderid;
      $general->sms_url_nonmasking=$r->sms_url_nonmasking;
      $general->sms_url_masking=$r->sms_url_masking;
      $general->sms_username=$r->sms_username;
      $general->sms_password=$r->sms_password;
      $general->admin_numbers=$r->admin_numbers;
      $general->sms_status=$r->sms_status?true:false;
      $general->register_sms_user=$r->register_sms_user?true:false;
      $general->register_sms_author=$r->register_sms_author?true:false;
      $general->forget_password_sms_user=$r->forget_password_sms_user?true:false;
      $general->register_verify_sms_user=$r->register_verify_sms_user?true:false;
      $general->save();

      Session()->flash('success','SMS Updated Are Successfully Done!');

    }

    if($type=='social'){
      

      $check = $r->validate([
            'facebook_link' => 'nullable|max:200',
            'twitter_link' => 'nullable|max:200',
            'instagram_link' => 'nullable|max:200',
            'linkedin_link' => 'nullable|max:200',
            'pinterest_link' => 'nullable|max:200',
            'youtube_link' => 'nullable|max:200',
            'fb_app_id' => 'nullable|max:100',
            'fb_app_secret' => 'nullable|max:100',
            'fb_app_redirect_url' => 'nullable|max:200',
            'google_client_id' => 'nullable|max:100',
            'google_client_secret' => 'nullable|max:100',
            'google_client_redirect_url' => 'nullable|max:200',
            'tw_app_id' => 'nullable|max:100',
            'tw_app_secret' => 'nullable|max:100',
            'tw_app_redirect_url' => 'nullable|max:200',
        ]);

        $general->facebook_link=$r->facebook_link;
        $general->twitter_link=$r->twitter_link;
        $general->instagram_link=$r->instagram_link;
        $general->linkedin_link=$r->linkedin_link;
        $general->pinterest_link=$r->pinterest_link;
        $general->youtube_link=$r->youtube_link;
        $general->fb_app_id=$r->fb_app_id;
        $general->fb_app_secret=$r->fb_app_secret;
        $general->fb_app_redirect_url=$r->fb_app_redirect_url;
        $general->google_client_id=$r->google_client_id;
        $general->google_client_secret=$r->google_client_secret;
        $general->google_client_redirect_url=$r->google_client_redirect_url;
        $general->tw_app_id=$r->tw_app_id;
        $general->tw_app_secret=$r->tw_app_secret;
        $general->tw_app_redirect_url=$r->tw_app_redirect_url;
        $general->save();

        Session()->flash('success','Advance Updated Are Successfully Done!');

    }

    
    return redirect()->route('admin.setting',$type);


  }

  // Setting Function End
    


}
