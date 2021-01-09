<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use App\Proposal;
use App\Propertie;
use App\Mail\newProposal;
use App\Mail\newRequest;
class contactanosController extends Controller
{
    public function contactanos(){
        $data=request()->validate([
            'nombre' => 'required|max:255|regex:/[a-zA-Z áéíóúÁÉÍÓÚ]+$/',
            'correo' => 'email|max:320',
            'telefono' => 'required|alpha_num|max:50|min:10',
            'tipo'=>'required',
            'deal'=>'required',
            'precio'=>'required'
        ]);
            //
        try{
            \DB::beginTransaction();
            {
                $solicitud= new Proposal;
                $solicitud->name = request('nombre');
                $solicitud->lastname = ' ';
                $solicitud->email = request('correo');
                $solicitud->phone_number = request('telefono');
                $solicitud->propertie_type = request('tipo');
                $solicitud->deal = request('deal');
                $solicitud->price = request('precio');
                $solicitud->status = 'available';
                $solicitud->save();
                \DB::commit();

                Mail::to('contacto@veintidos.com.mx')->send(new newRequest($data));
                return redirect('contactanos')->with('status', '¡Solicitud enviada!');
            }
        }
        catch(\Exception $e){
            \DB::rollback();
            return redirect('contactanos')->withErrors(['No se pudo mandar la solicitud, intentelo más tarde.']);
        }
    }

    public function quienes(){
        $propiedades=Propertie::orderby('created_at','desc')->limit(20)->get();
        return view('quienesSomos',['propiedades'=>$propiedades]);
    }
}
