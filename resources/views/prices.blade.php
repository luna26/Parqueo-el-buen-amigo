<div class='prices-content'>
    <p>Lista de Servicios</p>
    <div>
        <table style="width:100%">
            <tr>
                <th>ID</th>
                <th>Servico</th> 
                <th>Precio</th>
                <th>Campos</th>
            </tr>
            @foreach ($prices as $price)
            <tr>
                <td>{{$price->esp_id}}</td>
                <td>{{$price->esp_desc}}</td> 
                <td><input input-price-id={{$price->esp_id}} value={{$price->esp_precio}} /></td>
                <td>{{$price->esp_cant}}</td>
                <td>
                    <button btn-price-id={{$price->esp_id}} class='btn btn-info btn-price-change'>Actualizar</button>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</div>
<script src='js/prices.js'></script>