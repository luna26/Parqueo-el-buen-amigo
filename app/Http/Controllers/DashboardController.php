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
        $services = DB::table('facturas')->where('fac_estado', 1)->join('tipo_espacios', 'facturas.esp_id', '=', 'tipo_espacios.esp_id')->select('facturas.*', 'tipo_espacios.*')->get();
        $bills = DB::table('facturas')->where('fac_estado', 0)->get();
        
        $under_floor  = DB::table('facturas')->where([['esp_id', '=', 1], ['fac_estado', '=', 1]])->count();
        $air  = DB::table('facturas')->where([['esp_id', '=', 2], ['fac_estado', '=', 1]])->count();
        return view('billing', ['services' => $services, 'bills' => $bills, 'under_floor' => $under_floor, 'air'=>$air])->render();
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

        DB::table('facturas')->where('fac_id', $fac_id)->update(['fac_total' => $total, 'fac_estado' => 0, 'fac_fecha_facturacion' => $current_time, 'fac_tiempo_total' => $totalH]);

        $info = DB::table('general_info')->get();

        $bill[0]->fac_total = $total;
        $bill[0]->actual_date = $current_time;
        $bill[0]->info_id_tienda = $info[0]->info_id_tienda;
        $bill[0]->info_name = $info[0]->info_nombre;
        $bill[0]->info_telefono = $info[0]->info_telefono;
        $bill[0]->info_dir = $info[0]->info_dir;

        return $bill;
    }

    public function getBill(Request $request){
        $fac_id = $request->fac_id;

        $bill = DB::table('facturas')->join('tipo_espacios', 'facturas.esp_id', '=', 'tipo_espacios.esp_id')->select('facturas.*', 'tipo_espacios.*')->where([['fac_id', '=', $fac_id]])
        ->get();

        $info = DB::table('general_info')->get();

        $users = DB::table('usuarios')->where('usr_id', '=', $bill[0]->usr_id)->get();

        $bill[0]->info_id_tienda = $info[0]->info_id_tienda;
        $bill[0]->info_name = $info[0]->info_nombre;
        $bill[0]->info_telefono = $info[0]->info_telefono;
        $bill[0]->info_dir = $info[0]->info_dir;

        $bill[0]->bill_user = $users[0]->usr_email;



        return view('bill', ['bill' => $bill])->render();
    }
    

    ////FUNCIONES DE LOS USUARIOS

    public function usersView(){
        $users = DB::table('usuarios')->get();
        $roles = DB::table('roles')->get();
        return view('users', ['users' => $users, 'roles' => $roles])->render();
    }

    public function deleteUser(Request $request){
        $id_user = $request->id_user;
        DB::table('usuarios')->where('usr_id', '=', $id_user)->delete();

        return 'OK';
    }

    public function createUser(Request $request){
        $email = $request->email;
        $password = $request->password;
        $role = $request->role;

        DB::table('usuarios')->insert([
            ['usr_email' => $email, 'usr_pass' => $password, 'role_id' => $role]
        ]);

        return 'OK';
    }

    public function getPrices(){
        $prices = DB::table('tipo_espacios')->get();
        return view('prices', ['prices' => $prices])->render();
    }

    public function updatePrice(Request $request){
        $id_esp = $request->id_esp;
        $price = $request->price;

        DB::table('tipo_espacios')->where('esp_id', $id_esp)->update(['esp_precio' => $price]);
    }

    public function viewInfo(){
        $info = DB::table('general_info')->get();
        return view('info', ['info' => $info])->render();
    }

    public function updateInfo(Request $request){
        $id = $request->id;
        $name = $request->name;
        $tel = $request->tel;
        $ad = $request->ad;

        DB::table('general_info')->where('info_id_tienda', $id)->update(['info_nombre' => $name, 'info_telefono' => $tel, 'info_dir' => $ad]);

        return 'OK';
    }

    public function viewReport(){
        $users = DB::table('usuarios')->get();
        return view('report', ['users' => $users])->render();
    }

    public function dateReport(Request $request){
        $date1 = $request->date1;
        $date2 = $request->date2;

        $bills = DB::table('facturas')->join('usuarios', 'facturas.usr_id', '=', 'usuarios.usr_id')->select('facturas.*', 'usuarios.*')->whereBetween('fac_cliente_horas', [$date1, $date2])->where('fac_estado', 0)->get();

        return view('reportTable', ['bills' => $bills])->render();
    }

    public function billNum(Request $request){
        $numBill = $request->numBill;

        $bills = DB::table('facturas')->join('usuarios', 'facturas.usr_id', '=', 'usuarios.usr_id')->select('facturas.*', 'usuarios.*')->where([['fac_estado', '=', 0], ['fac_id','=' , $numBill]])->get();

        return view('reportTable', ['bills' => $bills])->render();
    }

    public function billUser(Request $request){
        $user = $request->user;

        $bills = DB::table('facturas')->where([['usuarios.usr_id','=' , $user]])->join('usuarios', 'facturas.usr_id', '=', 'usuarios.usr_id')->where([['fac_estado', '=', 0]])->get();

        return view('reportTable', ['bills' => $bills])->render();
    }

    public function billcustomer(Request $request){
        $customer_id = $request->customer_id;

        $bills = DB::table('facturas')->join('usuarios', 'facturas.usr_id', '=', 'usuarios.usr_id')->where([['fac_estado', '=', 0], ['fac_cliente_cedula', '=', $customer_id]])->get();

        return view('reportTable', ['bills' => $bills])->render();
    }
}
