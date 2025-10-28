<?php

namespace App\Services;

class Alertservice
{
    public static function updated($message = null)
    {
        notyf()->success($message ? $message : 'Updated Successfully!');
    }

    public static function created($message = null)
    {
        notyf()->success($message ? $message : 'Created Successfully!');
    }
}
