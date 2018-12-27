<?php
// use Illuminate\Support\Str;
namespace App\Helpers;
use DB;

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

    static function getRelatedSlugs($slug, $id = 0)
    {
        return DB::table('posts')->where('slug', 'like', $slug.'%')
            ->where('id', '<>', $id)
            ->get();
    }

}