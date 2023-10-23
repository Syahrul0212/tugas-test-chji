@extends('layouts.app')

@section('content')
    <h2 class="text-center pt-5 pb-5">Create Inventory</h2>

    <form action="{{ route('inventories.store') }}" method="POST">
        @csrf
        <div class="form-group mb-3">
            <label for="nama_barang">Name:</label>
            <input type="text" class="form-control" id="nama_barang" name="nama_barang" required>
        </div>
        <div class="form-group mb-3">
            <label for="jumlah">Quantity:</label>
            <input type="number" class="form-control" id="jumlah" name="jumlah" required>
        </div>
        <div class="form-group mb-3">
            <label for="tanggal_masuk">Tanggal Masuk:</label>
            <input type="date" class="form-control" id="tanggal_masuk" name="tanggal_masuk" required>
        </div>
        <div class="form-group mb-3">
            <label for="tanggal_keluar">Tanggal Keluar:</label>
            <input type="date" class="form-control" id="tanggal_keluar" name="tanggal_keluar" required>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Submit</button>
    </form>
@endsection
