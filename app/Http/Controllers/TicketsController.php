<?php

namespace App\Http\Controllers;

use App\Category;
use App\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Mailers\AppMailer;

class TicketsController extends Controller
{
     public function __construct()
    {
       $this->middleware('auth'); //This line tells laravel to allow only authenticated users to view and create tickets.
    }
 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         
        $tickets = Ticket::paginate(10);
 
        return view('tickets.index', compact('tickets'));//Crée un tableau à partir de variables et de leur valeur
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //added the code that displays the create form
        $categories = Category::all();
 
        return view('tickets.create', compact('categories'));   
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, AppMailer $mailer)
    {
        //the store method we validate and submit the form.
        $this->validate($request, [
            'title' => 'required',
            'category' => 'required',
            'priority' => 'required',
            'message' => 'required'
        ]);

        $ticket = new Ticket([
            'title' => $request->input('title'),
            'user_id' => Auth::user()->id,
            'ticket_id' => strtoupper(str_random(10)),//Renvoie une chaîne en majuscules
            'category_id' => $request->input('category'),
            'priority' => $request->input('priority'),
            'message' => $request->input('message'),
            'status' => "Ouvert"
        ]);
 
        $ticket->save();
 
        $mailer->sendTicketInformation(Auth::user(), $ticket);//This line send mail to the user with ticket information  to notify him that a new ticket created.Next we added simple class app/Mailers/AppMailer.php to send enable users to send mails.
        return redirect()->back()->with("status", "Un ticket avec l'ID: #$ticket->ticket_id a été ouvert.");
    }
    
    public function userTickets()
    {
        $tickets = Ticket::where('user_id', Auth::user()->id)->paginate(10);
 
        return view('tickets.user_tickets', compact('tickets'));
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($ticket_id)
    {
        $ticket = Ticket::where('ticket_id', $ticket_id)->firstOrFail();
 
        return view('tickets.show', compact('ticket'));
    }

    public function close($ticket_id, AppMailer $mailer)
    {
        $ticket = Ticket::where('ticket_id', $ticket_id)->firstOrFail();
 
        $ticket->status = "Fermé";
 
        $ticket->save();
 
        $ticketOwner = $ticket->user;
 
        $mailer->sendTicketStatusNotification($ticketOwner, $ticket);
 
        return redirect()->back()->with("statut", "The ticket a été fermé.");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /*public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /*public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /*public function destroy($id)
    {
        //
    }*/

}
