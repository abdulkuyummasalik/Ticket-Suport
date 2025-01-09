@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8">
    <h1 class="text-2xl font-bold mb-4">Detail Item</h1>

    <div class="bg-white p-6 rounded shadow-md">
        <p class="mb-4"><strong>Nama:</strong> {{ $ticket->name }}</p>
        <div class="flex justify-end">
            <a href="{{ route('tickets.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">Kembali</a>
        </div>
    </div>
</div>
@endsection
