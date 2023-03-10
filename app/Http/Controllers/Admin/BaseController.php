<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BaseController extends Controller
{
    protected $website = 'admin';
    protected $view = null;
    protected $module = null;
    protected $folder = null;
    public $db;
    
    
    public function __construct($folder,$module){
        $this->module = $module;
        $this->folder = $folder;
        if (empty($folder)){
            $this->view = $this->website . ".modules." . $module;
        } else {
            $this->view = $this->website . "." .$folder. "." . $module;
        }
        $this->db = DB::table($module);
    }
    

    public function view_admin (string $page, array $data = []){
        return view($this->view . "." . $page, $data);
    }

    public function route_admin (string $page, array $params = [], array $flash = []){
        if(empty($this->folder)){
            if (empty($flash)){
                return redirect()->route($this->website . "." . $this->module . "." . $page, $params);
            } else {
                return redirect()->route($this->website . "." . $this->module . "." . $page, $params)->with($flash);
            }
        } else {
            if (empty($flash)){
                return redirect()->route($this->website . "." . $this->folder . "." . $this->module . "." . $page, $params);
            } else {
                return redirect()->route($this->website . "." . $this->folder . "." . $this->module . "." . $page, $params)->with($flash);
            }
        }
    }
}
