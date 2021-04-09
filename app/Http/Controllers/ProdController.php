<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\inventario;
use App\Models\prod_inven;

class ProdController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $cont = Producto::select('id')
        ->join('inventarios','productos.id_inven','=','inventarios.id')
        ->where('inventarios.id_user',(int)auth()->user()->id)->count();
        $id_inven = inventario::select('id')
        ->where('id_user',(int)auth()->user()->id)
        ->get();
        $prod = Producto::all()->where('id_inven',(int)$id_inven[0]->id);
        return view('venstock.prod',['id_inven'=>$id_inven,'prod'=>$prod])->with('cont',$cont);
    }
    public function create(Request $request)
    {
        $prod = $request->except('_token');
        Producto::insert($prod);
        return redirect('/inventario');

    }
    public function rebaje(Request $request)
    {
        $cant=Producto::select('stock_actual')->where('id',$request->id)->get();
        $cant = $cant[0]->stock_actual + $request->stock_actual;
        Producto::where('id',$request->id)->update(['stock_actual'=>$cant]);
        return redirect('/home');
    }
    
}
