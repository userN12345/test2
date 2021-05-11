<?php

namespace App\Traits;



Trait ChefTrait{

    function ChefTrait($images,$folder){
        $file_extension =$images->getClientOriginalExtension();
        $file_name = time().'.'.$file_extension;
        $images->move($folder,$file_name);
        return $file_name;
    }

}

