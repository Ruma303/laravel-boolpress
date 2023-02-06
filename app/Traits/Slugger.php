<?php
namespace App\Traits;
use Illuminate\Support\Str;
trait Slugger {
    public static function getSlug($text) {
        // *Generare lo slug base
        $slugBase = Str::slug($text);
        $slug = $slugBase;
        $i = 1;
        // *Trovare il primo slug non usato
        while (self::where('slug', $slug)->first()) {
            $slug = $slugBase . '-' . $i;
            $i++;
        // *Ritorno slug generato
        } return $slug;
    }
}
