<div class='container-billing'>
    <div class='form-add-service'>
        <div class='title-form-add-service'>
            <p>Agregar Servicio</p>
        </div>
        <div class='field add-service-name'>
            <label>Nombre del cliente</label>
            <input />
        </div>
        <div class='field add-service-dir'>
            <label>Direccion del cliente</label>
            <input />
        </div>
        <div class='field add-service-id'>
            <label>Cedula</label>
            <input />
        </div>
        <div class='field add-service-tel'>
            <label>Telefono</label>
            <input />
        </div>
        <div class='field add-service-car-id'>
            <label>Placa</label>
            <input />
        </div>
        <div class='field add-service-service-type'>
            <label>Tipo de servicio</label>
            <select>
                <option value='1'>Bajo Techo</option>
                <option value='2'>Aire Libre</option>
            </select>
        </div>
        <div>
            <button class='btn-add-service btn btn-info'>Agregar</button>
        </div>
    </div>
    <div class='list-services-actives'>
        <div class='title-form-add-service'>
            <p>Lista de servicio activos</p>
        </div>
        <table style="width:100%">
            <tr>
                <th>Placa</th>
                <th>Nombre</th> 
                <th>Hora de entrada</th>
                <th>Opciones</th>
            </tr>
            @foreach ($services as $service)
            <tr>
                <td>{{$service->fac_cliente_placa}}</td>
                <td>{{$service->fac_cliente_nombre}}</td> 
                <td>{{$service->fac_cliente_horas}}</td>
                <td>
                    <button class='btn btn-info btn-bill' id-bill={{$service->fac_id}}>Facturar</button>
                </td>
            </tr>
            @endforeach
        </table>
    </div>

    <div class='list-services-actives'>
        <div class='title-form-add-service'>
            <p>Lista de servicio facturados</p>
        </div>
        <table style="width:100%">
            <tr>
                <th>ID Factura</th>
                <th>Nombre</th> 
                <th>Placa</th>
                <th>Opciones</th>
            </tr>
            @foreach ($bills as $bill)
            <tr>
                <td>{{$bill->fac_id}}</td>
                <td>{{$bill->fac_cliente_nombre}}</td> 
                <td>{{$bill->fac_cliente_placa}}</td>
                <td>
                    <button class='btn btn-info btn-see-bill' id-bill={{$bill->fac_id}}>Ver Factura</button>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</div>
<script src='js/billing.js'></script>
