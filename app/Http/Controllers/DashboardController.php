<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;
use DateTime;

class DashboardController extends Controller
{   
    public function getBilling(Request $request){
        $services = DB::table('facturas')->where('fac_estado', 1)->get();
        return view('billing', ['services' => $services])->render();
    }

    public function createBilling(Request $request){
        $name = $request->name;
        $dir = $request->dir;
        $id = $request->id;
        $tel = $request->tel;
        $car_id = $request->car_id;
        $service_type = $request->service_type;
        $userID = $request->userID;

        DB::table('facturas')->insert([
            ['fac_cliente_nombre' => $name, 'fac_cliente_direc' => $dir, 'fac_cliente_cedula' => $id, 'fac_cliente_tel' => $tel, 'fac_cliente_placa' => $car_id, 'esp_id' => $service_type, 'usr_id' => $userID, 'fac_estado' => 1]
        ]);

        return 'OK';
    }

    public function bill(Request $request){
        $fac_id = $request->fac_id;

        $bill = DB::table('facturas')->join('tipo_espacios', 'facturas.esp_id', '=', 'tipo_espacios.esp_id')->select('facturas.*', 'tipo_espacios.*')->where([['fac_id', '=', $fac_id]])
        ->get();

        //CALCULA LA CANTIDAD DE HORAS A COBRAR

        $entrance_time = $bill[0]->fac_cliente_horas;
        $current_time = date('Y-m-d H:i:s');

        $datetime1 = new DateTime($entrance_time);//start time
        $datetime2 = new DateTime($current_time);//end time
        $interval = $datetime1->diff($datetime2);

        $diffH = (int)$interval->format('%H');
        $diffM = (int)$interval->format('%i');

        if($diffH == 0){
            $totalH = 1;
        }else{
            $totalH = $diffH + 1;
        }

        //CALCULA EL MONTO A COBRAR
        $total = $totalH * $bill[0]->esp_precio;

        DB::table('facturas')->where('fac_id', $fac_id)->update(['fac_total' => $total, 'fac_estado' => 0]);

        $info = DB::table('general_info')->get();

        $bill[0]->fac_total = $total;
        $bill[0]->actual_date = $current_time;
        $bill[0]->info_id_tienda = $info[0]->info_id_tienda;
        $bill[0]->info_name = $info[0]->info_nombre;
        $bill[0]->info_telefono = $info[0]->info_telefono;
        $bill[0]->info_dir = $info[0]->info_dir;

        return $bill;
    }
}
