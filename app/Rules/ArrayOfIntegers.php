<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class ArrayOfIntegers implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        if(!is_array($value)){
            return false;
        }else{
           foreach($value as $key => $id){
                if(!is_int($id)){
                    return false;
                }
           } 
        }
        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message($attribute=null)
    {
        return 'The '.($attribute!==null?$attribute:':attribute').' must be an array of integer number';
    }
}
