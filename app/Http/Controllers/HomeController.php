<?php
namespace App\Http\Controllers;

use Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use App\Models\Users;
use Illuminate\Support\Facades\Validator;
use App\Rules\ArrayOfIntegers;

class HomeController  extends Controller
{
    public function __construct() {
         
    }
    
    public function Users(Request $request) {

        $users = new Users();
        $response = $users->getByIds($request);
        return response()->json($response);
        
    }
}
