<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\inventario;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $cont = inventario::select('id')->where('id_user',(int)auth()->user()->id)->count();
        $prod =Producto::select('productos.id','productos.nombre','productos.stock',
        'productos.stock_actual','productos.pre_venta','productos.pre_compra','productos.marca')
        ->join('inventarios','productos.id_inven','=','inventarios.id')
        ->where('inventarios.id_user',(int)auth()->user()->id)
        ->orderByDesc('stock_actual')
        ->get();
        return view('venstock.home',['prod'=>$prod])->with('cont',$cont);
    }

    public function create(Request $request)
    {   
        $inve = $request->except('_token');
        inventario::insert($inve);
        return redirect('/inventario');
    }
}
