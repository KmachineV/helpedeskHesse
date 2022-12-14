<?php

namespace App\Http\Controllers\Admin;

use Gate;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;
use App\Ticket;

class HomeController
{
    public function index()
    {
        abort_if(Gate::denies('dashboard_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $totalTickets = Ticket::count();
        $openTickets = Ticket::whereHas('status', function($query) {
            $query->where('name','!=','Cerrado');
        })->count();
        $closedTickets = Ticket::whereHas('status', function($query) {
            $query->whereName('Cerrado');
        })->count();

        $ticketsNotStatus = $users = DB::table('tickets')
            ->where('tickets.status_id', '=', null)->count();


        return view('home', compact('totalTickets', 'openTickets', 'closedTickets', 'ticketsNotStatus'));
    }
}
