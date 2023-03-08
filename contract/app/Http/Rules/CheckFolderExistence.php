<?php

namespace App\Http\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class CheckFolderExistence implements Rule
{

    /**
     * Create a new rule instance.
     *
     * @return void
     */
//    protected $path;

    /**
     * @param $path
     */
//    public function __construct($path = null)
//    {
////        $this->$path = $path;
//    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value): bool
    {

        $check = false;

        $path = storage_path('app/public/contracts/tmp/'. $value);

        // dd(File::files($path));

        if(file_exists($path) && File::files($path)) {

            $check = true;
        }

        return $check;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message(): string
    {
        return 'The :attribute folder or file not exist';
    }
}
