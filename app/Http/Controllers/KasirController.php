<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\DetailTransaksi;
use App\Models\Transaksi;
use App\Models\User;
use Barryvdh\DomPDF\Facade as PDF;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Barryvdh\DomPDF\PDF as DomPDFPDF;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class KasirController extends Controller
{
    function tambah()
    {
        return view('tambah');
    }
    function login()
    {
        return view('welcome');
    }
    function postlogin(Request $request)
    {
        $data = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        if (Auth::attempt($data)) {
            $name = auth()->user();
            return redirect()->route('home')->with('notif', 'selamat datang :' . $name->name);
        }
        return redirect()->route('login')->with('notif', 'email atau password salah');
    }

    function home(Buku $buku)
    {
        $buku = Buku::all();
        return view('home', compact('buku'));
    }

    function tambahbuku(Request $request, Buku $buku)
    {
        $request->validate([
            'judul' => 'required',
            'foto' => 'required',
            'harga' => 'required',
            'tanggal_pembelian' => 'required',
        ]);

        Buku::create([
            'judul' => $request->judul,
            'foto' => $request->foto->store('img'),
            'harga' => $request->harga,
            'tanggal_pembelian' => $request->tanggal_pembelian,
            'user_id' => auth()->id()
        ]);
        return redirect()->route('home')->with('notif', 'Berhasil menambah!');
    }

    function detail(Request $request, Buku $buku)
    {
        return view('detail', compact('buku'));
    }
    function keranjang()
    {
        $detailtransaksi = DetailTransaksi::where('user_id', auth()->id())->where('status', 'keranjang')->with('buku')->get();
        return view('keranjang', compact('detailtransaksi'));
    }
    function postkeranjang(Request $request)
    {
        $request->validate([
            'id_pelanggan' => 'required',
            'banyak' => 'required|array',
            'selected_buku' => 'required|array',
        ]);

        $idPelanggan = $request->id_pelanggan;
        $selectedBuku = $request->selected_buku;

        foreach ($selectedBuku as $bukuId) {
            $buku = Buku::find($bukuId);

            DetailTransaksi::create([
                'qty' => $request->banyak[$bukuId],
                'user_id' => auth()->id(),
                'buku_id' => $bukuId,
                'status' => 'keranjang',
                'totalharga' => $buku->harga * $request->banyak[$bukuId],
                'id_pelanggan' => $idPelanggan,
            ]);
        }

        return redirect()->route('keranjang.buku')->with('notif', 'Dimasukan ke dalam keranjang');
    }


    function bayar(DetailTransaksi $detailtransaksi)
    {
        $buku = $detailtransaksi->buku;
        return view('bayar', compact('buku', 'detailtransaksi'));
    }

    function prosesbayar(Request $request, DetailTransaksi $detailtransaksi, Transaksi $transaksi)
    {
        $validator = Validator::make($request->all(), [
            'input_pembayaran' => 'required|numeric|min:' . $detailtransaksi->totalharga
        ]);

        if($validator->fails()){
            return redirect()->route('bayar.buku', ['detailtransaksi' => $detailtransaksi->id])->with('notif', 'Nomnal kurang');
        }
        
        $transaksi = Transaksi::create([
            'user_id' => auth()->id(),
            'total_harga' => $detailtransaksi->totalharga,
            'code' => 'INV' . Str::random(8)
        ]);

        $detailtransaksi->update([
            'transaksi_id' => $transaksi->id,
            'status' => 'cekout',
            'input_pembayaran' => $request->input_pembayaran,
        ]);

        return redirect()->route('summary.buku')->with('notif', 'Berhasil cekout');
    }
    function summary()
    {
        $detailtransaksi = DetailTransaksi::where('user_id', auth()->id())->where('status', 'cekout')->with('buku')->get();

        return view('summary', compact('detailtransaksi'));
    }


    function logout()
    {
        auth()->logout();
        return redirect()->route('login')->with('notif', 'Logout berhasil!');
    }


    public function invoice(DetailTransaksi $detailtransaksi)
    {
        $detailtransaksi = [
            'detailtransaksi' => $detailtransaksi
        ];

        $pdf = FacadePdf::loadView('templatepdf', array('detailtransaksi' =>  $detailtransaksi))
            ->setPaper('a4', 'portrait');

        return $pdf->download('detailtransaksi.pdf');
    }

    public function downloadPDF(DetailTransaksi $detailtransaksi)
    {
        $detailtransaksi = DetailTransaksi::all();

        $pdf = FacadePdf::loadView('templatepdf', array('detailtransaksi' =>  $detailtransaksi))
            ->setPaper('a4', 'portrait');

        return $pdf->download('detailtransaksi.pdf');
    }
}
