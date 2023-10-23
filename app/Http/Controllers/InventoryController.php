<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use Illuminate\Http\Request;
use PDF;


class InventoryController extends Controller
{
    public function index()
    {
        $inventories = Inventory::all();
        return view('inventories.index', compact('inventories'));
    }

    public function create()
    {
        return view('inventories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required',
            'jumlah' => 'required|integer',
            'tanggal_masuk' => 'required|date',
            'tanggal_keluar' => 'required|date|after_or_equal:tanggal_masuk',
        ]);
    
        Inventory::create([
            'nama_barang' => $request->nama_barang,
            'jumlah' => $request->jumlah,
            'tanggal_masuk' => $request->tanggal_masuk,
            'tanggal_keluar' => $request->tanggal_keluar,
        ]);
    
        return redirect()->route('inventories.index')->with('success', 'Inventory created successfully');
    }

    public function edit(Inventory $inventory)
    {
        return view('inventories.edit', compact('inventory'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_barang' => 'required',
            'jumlah' => 'required|integer',
            'tanggal_masuk' => 'required|date',
            'tanggal_keluar' => 'required|date|after_or_equal:tanggal_masuk',
        ]);
    
        $inventory = Inventory::findOrFail($id);
        $inventory->nama_barang = $request->nama_barang;
        $inventory->jumlah = $request->jumlah;
        $inventory->tanggal_masuk = $request->tanggal_masuk;
        $inventory->tanggal_keluar = $request->tanggal_keluar;
        $inventory->save();
    
        return redirect()->route('inventories.index')->with('success', 'Inventory updated successfully');
    }

    public function destroy(Inventory $inventory)
    {
        $inventory->delete();

        return redirect()->route('inventories.index')
                         ->with('success', 'Inventory deleted successfully');
    }


    public function generatePDF()
    {
        $inventories = Inventory::all();
        
        $pdf = PDF::loadView('reports.inventory_report', compact('inventories'));
        
        return $pdf->download('inventory_report.pdf');
    }
}
