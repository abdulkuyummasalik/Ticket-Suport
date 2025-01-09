<?php

namespace App\Http\Controllers;

use App\Models\TicketType;
use Illuminate\Http\Request;

class TicketTypeController extends Controller
{
    public function index()
    {
        $ticketTypes = TicketType::all();
        return view('ticket_types.index', compact('ticketTypes'));
    }

    public function create()
    {
        return view('ticket_types.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
        ],[
            'required' => 'Nama wajib di isi'
        ]);

        TicketType::create($validatedData);

        return redirect()->route('ticket_types.index')->with('success', 'Tipe Tiket berhasil dibuat.');
    }

    public function show($id)
    {
        $ticketType = TicketType::findOrFail($id);
        return view('ticket_types.show', compact('ticketType'));
    }

    public function edit($id)
    {
        $ticketType = TicketType::findOrFail($id);
        return view('ticket_types.edit', compact('ticketType'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $ticketType = TicketType::findOrFail($id);
        $ticketType->update($validatedData);

        return redirect()->route('ticket_types.index')->with('success', 'Tipe Tiket berhasil diupdate.');
    }

    public function destroy($id)
    {
        $ticketType = TicketType::findOrFail($id);
        $ticketType->delete();

        return redirect()->route('ticket_types.index')->with('success', 'Tipe Tiket berhasil dihapus.');
    }
}
