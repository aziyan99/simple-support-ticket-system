<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tickets = Ticket::with('category', 'agent', 'customer')->latest()->get();
        return view('ticket.index', compact('tickets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ticket = new Ticket();
        $categories = Category::all();
        $customers = User::where('role', 'customer')->get();
        $agents = User::where('role', 'agent')->get();
        return view('ticket.create', compact('ticket', 'categories', 'customers', 'agents'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'customer_id' => 'required',
            'agent_id' => 'required',
            'category_id' => 'required',
            'subject' => 'required',
            'content' => 'required',
        ]);
        Ticket::create($request->all());
        return redirect()->route('ticket.index')->with('success', 'Ticket has been saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function show(Ticket $ticket)
    {
        $comments = Comment::where('ticket_id', $ticket->id)->orderBy('created_at')->get();
        return view('ticket.show', compact('ticket', 'comments'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function edit(Ticket $ticket)
    {
        $categories = Category::all();
        $customers = User::where('role', 'customer')->get();
        $agents = User::where('role', 'agent')->get();
        return view('ticket.edit', compact('ticket', 'categories', 'customers', 'agents'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ticket $ticket)
    {
        $request->validate([
            'customer_id' => 'required',
            'agent_id' => 'required',
            'category_id' => 'required',
            'subject' => 'required',
            'content' => 'required',
        ]);
        $ticket->update($request->all());
        return redirect()->route('ticket.index')->with('success', 'Ticket has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ticket $ticket)
    {
        $ticket->delete();
        return redirect()->route('ticket.index')->with('success', 'Ticket has been deleted!');
    }

    public function updateStatus(Request $request, Ticket $ticket)
    {
        $request->validate([
            'status' => 'required'
        ]);

        $ticket->update($request->all());
        return back()->with('success', 'Ticket status has been updated!');
    }

    public function storeComment(Request $request, Ticket $ticket)
    {
        $request->validate([
            'content' => 'required'
        ]);

        Comment::create([
            'user_id' => auth()->user()->id,
            'ticket_id' => $ticket->id,
            'content' => $request->content
        ]);

        return back()->with('success', 'Ticket status has been updated!');
    }
}
