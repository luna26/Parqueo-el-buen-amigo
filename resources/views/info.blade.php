<div class='prices-content'>
    <div>
        <p>ID Sucursal</p>
        <p class='input-info-id'>{{$info[0]->info_id_tienda}}</p>
    </div>
    <div class='input-info-name'>
        <p>Nombre</p>
        <input value='{{$info[0]->info_nombre}}' >
    </div>
    <div class='input-info-tel'>
        <p>Telefono</p>
        <input value='{{$info[0]->info_telefono}}'>
    </div>
    <div class='input-info-ad'>
        <p>Direccion</p>
        <input value='{{$info[0]->info_dir}}'/>
    </div>
    <div>
        <button class='btn btn-info btn-info-update'>Actualizar</button>
    </div>
</div>
<script src='js/info.js'></script>