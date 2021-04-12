<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
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
        'productos.stock_actual','productos.pre_venta','productos.pre_compra','productos.marca','productos.id_inven')
        ->join('inventarios','productos.id_inven','=','inventarios.id')
        ->where('inventarios.id_user',(int)auth()->user()->id)
        ->orderByDesc('stock_actual')
        ->get();
        $fecha = Carbon::now("America/Santiago");
        return view('venstock.home',['prod'=>$prod,'fecha'=>$fecha])->with('cont',$cont);
    }

    public function create(Request $request)
    {   
        $inve = $request->except('_token');
        inventario::insert($inve);
        return redirect('/inventario');
    }
}
