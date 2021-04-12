<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\inventario;
use App\Models\prod_inven;
use App\Models\Rebaje;
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
        $fecha = Carbon::now("America/Santiago");
        $prod = Producto::all()->where('id_inven',(int)$id_inven[0]->id);
        return view('venstock.prod',['id_inven'=>$id_inven,'prod'=>$prod,'fecha'=>$fecha])->with('cont',$cont);
    }
    public function create(Request $request)
    {
        $prod = $request->except('_token');
        Producto::insert($prod);
        $pr = Producto::select('id')->where('created_at',$prod['created_at'])->where('id_inven',$prod['id_inven'])->get();
        $rebaje = array('id_inven'=>$prod['id_inven'],'id_prod'=>$pr[0]->id,'stock'=>$prod['stock'],'rebaje'=>$prod['stock_actual'],
        'movimiento'=>false, 'created_at'=>$prod['created_at']);
        Rebaje::insert($rebaje);
        return redirect('/inventario');

    }
    public function rebaje(Request $request)
    {
        $cant=Producto::select('stock_actual','stock')->where('id',$request->id_prod)->get();
        $cant1 = $cant[0]->stock_actual + $request->stock_actual;
        Producto::where('id',$request->id_prod)->update(['stock_actual'=>$cant1]);
        $fecha = Carbon::now("America/Santiago");
        $cant1 = ($cant[0]->stock - $cant[0]->stock_actual) - $request->stock_actual;
        $rebaje = array('id_inven'=>$request->id_inven,'id_prod'=>$request->id_prod,'stock'=>$cant1,'rebaje'=>$request->stock_actual,
        'movimiento'=>true, 'created_at'=>$fecha);
        Rebaje::insert($rebaje);
        return redirect('/home');
    }
    public function stockUpdate(Request $request)
    {

        Producto::where('id',$request->id_prod)->update(['stock'=>$request->stock,'stock_actual'=>0]);
        $rebaje = $request->except('_token');
        Rebaje::insert($rebaje);
        return redirect('/home');
    }
}
