@extends('layouts.app')

@section('content')
    <div class="container text-center pb-5 pt-5">
        <h2>Inventory List</h2>
        <h3>PT. Chang Jui Fang Indonesia</h3>
    </div>
    

    <a href="{{ route('inventories.create') }}" class="btn btn-primary mb-2">Add Inventory</a>
    <a href="{{ url('reports/inventory/pdf') }}" target="_blank" class="btn btn-primary mb-2">Unduh Laporan Inventori (PDF)</a>

    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Quantity</th>
                <th>Tanggal Masuk</th>
                <th>Tanggal Keluar</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($inventories as $inventory)
                <tr>
                    <td>{{ $inventory->nama_barang }}</td>
                    <td>{{ $inventory->jumlah }}</td>
                    <td>{{ $inventory->tanggal_masuk }}</td>
                    <td>{{ $inventory->tanggal_keluar }}</td>
                    <td>
                        <a href="{{ route('inventories.edit', $inventory->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('inventories.destroy', $inventory->id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
