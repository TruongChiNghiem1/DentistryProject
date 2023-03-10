<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WbaseController extends Controller
{
    protected $text = null;
    public function check_input ($text) {
        $this->text = $text;
        $this->$text = trim($text);
        $this->$text = htmlspecialchars($text);
        $this->$text = addslashes($text);
        return $this->$text;
    }
}
