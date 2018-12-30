<?php
// use Illuminate\Support\Str;
namespace App\Helpers;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;
use DB;
use File;

class Helper {

	// generate random stirng
	static public function generateRandomString($length) {
        $characters = '0123456789abcdefghijklmnopqrstvwxyzABCDEFGHIJKLMNOPQRSTVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
	}

	// generate random number
	static public function generateRandomNumber($digits) {
        $temp = "";

		  for ($i = 0; $i < $digits; $i++) {
		    $temp .= rand(0, 9);
		  }

		  return (int)$temp;
	}


    /**
    * Create post unique slug based on post title 
    */
	static public function createSlug($title, $id = 0)
    {
        // Normalize the title
        $slug = str_slug($title);
        // Get any that could possibly be related.
        // This cuts the queries down by doing it once.
        $allSlugs = self::getRelatedSlugs($slug, $id);

        // If we haven't used it before then we are all good.
        if (! $allSlugs->contains('slug', $slug)){
            return $slug;
        }

        // Just append numbers like a savage until we find not used.
        for ($i = 1; $i <= 10; $i++) {
            $newSlug = $slug.'-'.$i;
            if (! $allSlugs->contains('slug', $newSlug)) {
                return $newSlug;
            }
        }

        throw new \Exception('Can not create a unique slug');
    }

    /**
    * get slug from posts table 
    */
    static function getRelatedSlugs($slug, $id = 0)
    {
        return DB::table('posts')->where('slug', 'like', $slug.'%')
            ->where('id', '<>', $id)
            ->get();
    }


    /**
    * add post meta
    */
    static function add_post_meta( $post_id, $meta_key, $meta_value )
    {
        return DB::table('postmetas')
                    ->insert(['post_id' => $post_id, 'meta_key' => $meta_key, 'meta_value' => $meta_value, ]);
    }

    /**
    * Update post meta
    */
    static function update_post_meta( $post_id, $meta_key, $meta_value )
    {
        $return = DB::table('postmetas')
                    ->where('post_id', $post_id)
                    ->where('meta_key', $meta_key)
                    ->update(['meta_value' => $meta_value]);
        return $return;
    }

    /**
    * Get post meta by post id & meta_key
    */
    static function get_post_meta( $post_id, $meta_key )
    {
        $array = DB::table('postmetas')
                    ->select('meta_value')
                    ->where('post_id', $post_id)
                    ->where('meta_key', $meta_key)
                    ->get();
        if( count($array) == 0  ){
            return $array[0] = '';
        }else{
            return $array[0]->meta_value;
        }
    }

    /**
    * Get all post meta by post id
    */
    static function get_all_post_meta( $post_id )
    {
        return  DB::table('postmetas')
                    ->select('*')
                    ->where('post_id', $post_id)
                    ->get();
    }

    /**
    * Get all post meta by post id
    */
    static function upload_featured_image( $image )
    {
        $filename = time().'.'.$image->getClientOriginalExtension();

        $destinationPath = public_path('/featured');
        
        $filename = time().'.'.$image->getClientOriginalExtension(); 
   
        $destinationPath = public_path('/featured/thumb');
        $thumb_img = Image::make($image->getRealPath())->resize(150, 150);
        $thumb_img->save($destinationPath.'/'.$filename,80);

        $destinationPath = public_path('/featured/medium');
        $thumb_img = Image::make($image->getRealPath())->resize(300, 300);
        $thumb_img->save($destinationPath.'/'.$filename,80);
                    
        $destinationPath = public_path('/featured/full');
        $image->move($destinationPath, $filename);

        return $filename;
    }

    dd($post);

}