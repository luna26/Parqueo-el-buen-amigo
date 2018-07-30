<table style="width:100%">
            <tr>
                <th>ID Factura</th>
                <th>Fecha</th> 
                <th>Vendedor</th>
                <th>Cedula</th>
            </tr>
            @foreach ($bills as $bill)
            <tr>
                <td>{{$bill->fac_id}}</td>
                <td>{{$bill->fac_fecha_facturacion}}</td> 
                <td>{{$bill->usr_email}}</td>
                <td>{{$bill->fac_cliente_cedula}}</td>
            </tr>
            @endforeach
</table>