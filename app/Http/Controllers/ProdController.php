<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\inventario;
use Illuminate\Database\QueryException;
use App\Models\Rebaje;
class ProdController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return $this->base('sin mensaje');
    }
    public function create(Request $request)
    {
        try {
            $prod = $request->except('_token');
            Producto::insert($prod);
            $pr = Producto::select('id')->where('created_at',$prod['created_at'])->where('id_inven',$prod['id_inven'])->get();
            $rebaje = array('id_inven'=>$prod['id_inven'],'id_prod'=>$pr[0]->id,'stock'=>$prod['stock'],'rebaje'=>0,
            'movimiento'=>false, 'created_at'=>$prod['created_at']);
            Rebaje::insert($rebaje);
            return $this->base('m1');
        } catch (QueryException) {
            return $this->base('m2');
        }

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
    public function update(Request $request)
    {
        $prod = $request->except('_token','id');
        Producto::where('id',$request->id)->update($prod);
        $rebaje = array('id_inven'=>$prod['id_inven'],'id_prod'=>$request->id,'stock'=>$prod['stock'],'rebaje'=>0,
        'movimiento'=>false, 'created_at'=>$prod['created_at']);
        Rebaje::insert($rebaje);
        return redirect('/inventario');
    }
    public function edit($id)
    {
        $id_inven = inventario::select('id')
        ->where('id_user',(int)auth()->user()->id)
        ->get();
        $fecha = Carbon::now("America/Santiago");
        $prod = Producto::find($id);
        $stock = $prod->stock - $prod->stock_actual; 
        return view('producto.edit',['id_inven'=>$id_inven,'pr'=>$prod,'fecha'=>$fecha,'stock'=>$stock]);
    }

    public function delete($id)
    {
        Producto::destroy($id);
        Rebaje::where('id_prod',$id)->delete();
        return redirect('/inventario');
    }

    public function data(Request $request)
    {
       $id_inven = inventario::select('id')
       ->where('id_user',(int)auth()->user()->id)
       ->get();
       $prod = Producto::select('nombre','stock_actual')
       ->where('id_inven',$id_inven[0]->id)
       ->orderByDesc('stock_actual')->take(6)->get();
       return response(json_encode($prod),200)->header('content-type','text/plain');
    }

    public function base($mensaje)
    {
        $cont = Producto::select('id')
        ->join('inventarios','productos.id_inven','=','inventarios.id')
        ->where('inventarios.id_user',(int)auth()->user()->id)->count();
        $id_inven = inventario::select('id')
        ->where('id_user',(int)auth()->user()->id)
        ->get();
        $fecha = Carbon::now("America/Santiago");
        $prod = Producto::all()->where('id_inven',(int)$id_inven[0]->id);
        return view('producto.prod',['id_inven'=>$id_inven,'prod'=>$prod,'fecha'=>$fecha,'stock'=>'','prod_exi'=>$mensaje])->with('cont',$cont);
    }
}
