<?php

use Illuminate\Support\Str;
function imageAltName($altName,$oldAltName){
    if(isset($altName)){
        $file=$altName;
        $filename= $file->getClientOriginalName();
        $name = pathinfo($filename, PATHINFO_FILENAME);
        return Str::slug($name);
    }
    else{
        return $oldAltName;
    }

}
