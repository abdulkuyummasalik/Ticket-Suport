<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\Project;
use App\Models\TicketType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TicketController extends Controller
{
    public function index()
    {
        $TicketType = TicketType::all();
        $Project = Project::all();
        $tickets = Ticket::all();
        return view('tickets.index', compact('TicketType', 'Project', 'tickets'));
    }

    public function create()
    {
        $TicketType = TicketType::all();
        $Project = Project::all();
        return view('tickets.create', compact('TicketType', 'Project'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'assign_at' => 'required|date',
            'ticket_type_id' => 'required|exists:ticket_types,id',
            'project_id' => 'required|exists:projects,id',
        ], [
            'name.required' => 'Nama wajib diisi.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Email harus berupa format email yang valid.',
            'title.required' => 'Judul wajib diisi.',
            'assign_at.required' => 'Tanggal penugasan wajib diisi.',
            'ticket_type_id.required' => 'Tipe tiket wajib dipilih.',
            'project_id.required' => 'Proyek wajib dipilih.',
        ]);

        Ticket::create([
            'name' => $request->name,
            'email' => $request->email,
            'title' => $request->title,
            'description' => $request->description,
            'assign_at' => $request->assign_at,
            'status' => 'open',
            'ticket_type_id' => $request->ticket_type_id,
            'project_id' => $request->project_id,
        ]);

        return redirect()->route('tickets.index')->with('success', 'Tiket berhasil dibuat.');
    }


    public function edit($id)
    {
        $ticket = Ticket::findOrFail($id);
        return view('tickets.edit', compact('ticket'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'status' => 'required|string|max:255',
        ]);

        $ticket = Ticket::findOrFail($id);
        $ticket->update($validatedData);

        return redirect()->route('tickets.index')->with('success', 'Tipe Tiket berhasil diupdate.');
    }

    public function destroy($id)
    {
        $ticket = Ticket::findOrFail($id);
        $ticket->delete();

        return redirect()->route('tickets.index')->with('success', 'Tipe Tiket berhasil dihapus.');
    }
}
