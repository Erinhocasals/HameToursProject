<?php

namespace App\Http\Tools;

use App\Mail\MarkDownMail;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class Tools {
    public static function tryToDeleteFile($path) {
        if (Storage::disk('public')->exists("/" . $path)) {
            Storage::disk('public')->delete('/' . $path);
        }
    }

    public static function quickRandom($length = 16)
    {
        $pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        return substr(str_shuffle(str_repeat($pool, 5)), 0, $length);
    }

    public static function currencyToString($currency) {
        switch ($currency) {
            case "USD":
                return "USD (EFECTIVO)";
            case "EUR":
                return "EUR (EFECTIVO)";
            case "CUP":
                return "CUP (EFECTIVO)";
            case "CUP_TX":
                return "CUP (TRANSFERENCIA)";
            case "MLC":
                return "MLC (TRANSFERENCIA)";
            default:
                return "";
        }
    }

    public static function send_whatsapp($phone, $apikey, $message="Test"){
        //$phone="+5353442331";  // Enter your phone number here
        //$apikey="450771";       // Enter your personal apikey received in step 3 above

        $url='https://api.callmebot.com/whatsapp.php?source=php&phone='.$phone.'&text='.urlencode($message).'&apikey='.$apikey;

        if($ch = curl_init($url))
        {
            curl_setopt ($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, 0);
            $html = curl_exec($ch);
            $status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            // echo "Output:".$html;  // you can print the output for troubleshooting
            curl_close($ch);
            return (int) $status;
        }
        else
        {
            return false;
        }
    }
}
