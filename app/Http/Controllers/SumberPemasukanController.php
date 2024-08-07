<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\SumberPemasukan;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class SumberPemasukanController extends Controller
{
  protected $userLogin;

  public function __construct()
  {

    $this->middleware(function ($request, $next) {
      $this->userLogin = Auth::user();
      return $next($request);
    });
  }
  public function index()
  {
    $userLogin = $this->userLogin;
    $data = SumberPemasukan::where('user_id', $userLogin->id)->with('pemasukan')->get();


    foreach ($data as $sumber_pemasukan) {
      $sumber_pemasukan->total_pemasukan = $sumber_pemasukan->pemasukan->sum('saldo');
    }

    $title = 'Delete Data!';
    $text = "Are you sure you want to delete?";
    confirmDelete($title, $text);
    // dd($userLogin);
    return view('pages.master.sumber-pemasukan.index', ['data' => $data, 'userLogin' => $this->userLogin]);
  }

  public function create()
  {
    return view('pages.master.sumber-pemasukan.create', ['userLogin' => $this->userLogin]);
  }
  public function store(Request $request)
  {
    $data = $request->all();
    $userLogin = $this->userLogin;
    $data['user_id'] = $userLogin->id;
    $sumber_pemasukan = SumberPemasukan::create($data);

    Alert::success('Success', 'Data berhasil ditambahkan');
    return redirect()->route('sumber-pemasukan.index');
  }

  public function show($id)
  {
    $data = SumberPemasukan::findOrFail($id);
    return response()->json(['message' => 'success', 'data' => $data]);
  }

  public function edit($id)
  {
    $data = SumberPemasukan::findOrFail($id);
    return view('pages.master.sumber-pemasukan.edit', ['data' => $data, 'userLogin' => $this->userLogin]);
  }

  public function update(Request $request, $id)
  {
    $data = $request->all();
    $userLogin = $this->userLogin;
    $data['user_id'] = $userLogin->id;
    $sumber_pemasukan = SumberPemasukan::findOrFail($id);
    $sumber_pemasukan->update($data);
    Alert::success('Success', 'Data berhasil diupdate');
    return redirect()->route('sumber-pemasukan.index');
  }


  public function destroy($id)
  {
    $data = SumberPemasukan::findOrFail($id);
    if ($data->pemasukan()->count() > 0) {
      Alert::error('Error', 'Data tidak dapat dihapus karena memiliki relasi');
      return redirect()->route('rekening.index');
    }
    $data->delete();
    Alert::success('Success', 'Data berhasil dihapus');
    return redirect()->route('sumber-pemasukan.index');
  }

}