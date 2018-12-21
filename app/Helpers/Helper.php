<?php
// use Illuminate\Support\Str;
namespace App\Helpers;

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

}