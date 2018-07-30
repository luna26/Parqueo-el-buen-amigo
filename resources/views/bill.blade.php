<div class='bill'>
    <p>Numero de factura: {{$bill[0]->fac_id}}</p>
    <p>Fecha: {{$bill[0]->fac_fecha_facturacion}}</p>
    <div class='bill-content'>
        <div>
            <p>Nombre del cliente</p>
            <p>{{$bill[0]->fac_cliente_nombre}}</p>
        </div>
        <div>
            <p>Cedula</p>
            <p>{{$bill[0]->fac_cliente_cedula}}</p>
        </div>
        <div>
            <p>Direccion</p>
            <p>{{$bill[0]->fac_cliente_direc}}</p>
        </div>
        <div>
            <p>Telefono</p>
            <p>{{$bill[0]->fac_cliente_tel}}</p>
        </div>
        <div>
            <p>Placa</p>
            <p>{{$bill[0]->fac_cliente_placa}}</p>
        </div>
        <div>
            <p>Horas de servicio</p>
            <p>{{$bill[0]->fac_tiempo_total}}</p>
        </div>
        <div>
            <p>Tipo de servicio</p>
            <p>{{$bill[0]->esp_desc}}</p>
        </div>
        <div>
            <p>Total de la factura</p>
            <p>{{$bill[0]->fac_total}}</p>
        </div>
        <div>
            <p>Nombre de la tienda</p>
            <p>{{$bill[0]->info_name}}</p>
        </div>
        <div>
            <p>Numero de la tienda</p>
            <p>{{$bill[0]->info_telefono}}</p>
        </div>
        <div>
            <p>Direccion del parqueo</p>
            <p>{{$bill[0]->info_dir}}</p>
        </div>
        <div>
            <p>Numero de sucursal</p>
            <p>{{$bill[0]->info_id_tienda}}</p>
        </div>
        <div>
            <p>Empleado que facturo</p>
            <p>{{$bill[0]->bill_user}}</p>
        </div>
    </div>
    <div>
        <button class='btn btn-info btn-bill-close'>Cerrar</button>
        <button class='btn btn-warning'>Imprimir</button>
    </div>
</div>
<script src='js/bill-item.js'></script>