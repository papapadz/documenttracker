<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\DocTypes;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
        $users = User::ALL();
        $types = DocTypes::ALL();
        
        return view('home')
            ->with('users',$users)
            ->with('types',$types);
    }
}
