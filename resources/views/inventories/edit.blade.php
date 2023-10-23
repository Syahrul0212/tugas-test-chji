@extends('layouts.app')

@section('content')
    <h2 class="text-center pt-5 pb-5">Edit Inventory</h2>

    <form action="{{ route('inventories.update', $inventory->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group mb-3">
            <label for="nama_barang">Name:</label>
            <input type="text" class="form-control" id="nama_barang" name="nama_barang" value="{{ $inventory->nama_barang }}" required>
        </div>
        <div class="form-group mb-3">
            <label for="jumlah">Quantity:</label>
            <input type="number" class="form-control" id="jumlah" name="jumlah" value="{{ $inventory->jumlah }}" required>
        </div>
        <div class="form-group mb-3">
            <label for="tanggal_masuk">Tanggal Masuk:</label>
            <input type="date" class="form-control" id="tanggal_masuk" name="tanggal_masuk" required>
        </div>
        <div class="form-group mb-3">
            <label for="tanggal_keluar">Tanggal Keluar:</label>
            <input type="date" class="form-control" id="tanggal_keluar" name="tanggal_keluar" required>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Update</button>
    </form>
@endsection
