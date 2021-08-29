<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $adminCount = User::where('role', 'admin')->count();
        $agentCount = User::where('role', 'agent')->count();
        $customerCount = User::where('role', 'customer')->count();
        $ticketCount = Ticket::all()->count();
        return view('dashboard.index', compact(
            'adminCount',
            'agentCount',
            'customerCount',
            'ticketCount'
        ));
    }
}
