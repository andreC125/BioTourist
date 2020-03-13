<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ticket;
use Illuminate\Support\Facades\Auth;

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
        $user = Auth::user();
        if($user->is_admin)
        {
            $tickets = Ticket::paginate(10);
            return view('tickets.index', compact('tickets')); //we need to do is to manage and create user tickets. This will be done in the index and user_tickets function.
        }
        else
        {
            $tickets = Ticket::paginate(10);
            return view('tickets.user_tickets', compact('tickets'));
        }
        
    }
}
