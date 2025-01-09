@extends('layouts.app')

@section('content')
    <div class="container mx-auto py-8">
        <h1 class="text-2xl font-bold mb-4">Daftar Ticket</h1>

        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="mb-4 flex justify-end">
            <a href="{{ route('tickets.create') }}"
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Tambah Item Baru</a>
        </div>

        <table class="min-w-full bg-white border-collapse border border-gray-300">
            <thead>
                <tr>
                    <th class="border border-gray-300 px-4 py-2">ID</th>
                    <th class="border border-gray-300 px-4 py-2">Nama</th>
                    <th class="border border-gray-300 px-4 py-2">Email</th>
                    <th class="border border-gray-300 px-4 py-2">Title</th>
                    <th class="border border-gray-300 px-4 py-2">Deskripsi</th>
                    <th class="border border-gray-300 px-4 py-2">Tanggal</th>
                    <th class="border border-gray-300 px-4 py-2">Tipe Tiket</th>
                    <th class="border border-gray-300 px-4 py-2">Status</th>
                    <th class="border border-gray-300 px-4 py-2">Project</th>
                    <th class="border border-gray-300 px-4 py-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($tickets as $item)
                    <tr>
                        <td class="border border-gray-300 px-4 py-2 text-center">{{ $item->id }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $item->name }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $item->email }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $item->title }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $item->description }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $item->assign_at }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $item->TicketType->name }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $item->status }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $item->Project->name }}</td>
                        <td class="border border-gray-300 px-4 py-2 text-center">
                                <a href="{{ route('tickets.edit', $item->id) }}"
                                class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-1 px-2 rounded">Edit</a>
                            <form action="{{ route('tickets.destroy', $item->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded"
                                    onclick="return confirm('Apakah Anda yakin?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="border border-gray-300 px-4 py-2 text-center">Tidak ada item ditemukan
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
