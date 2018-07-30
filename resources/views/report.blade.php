<div class='prices-content'>
    <p>Reportes</p>

    <div class='report-item'>
        <p>Reporte por fecha</p>
        <div>
            <p>**** USAR FORMATO 20180730</p>
            <div class='date-report-initial'>
                <p>Fecha inicial</p>
                <input />
            </div>
            <div class='date-report-final'>
                <p>Fecha final</p>
                <input />
            </div>
        </div>
        <button class='btn btn-info btn-report-date'>Buscar</button>
    </div>
    <div class='report-item'>
        <p>Reporte por numero de factura</p>
        <div class='date-report-num-bill'>
            <p>Numero de factura</p>
            <input />
        </div>
        <button class='btn btn-info btn-report-num-bill'>Buscar</button>
    </div>
    <div class='report-item'>
        <p>Reporte por vendedor</p>
        <div class='date-report-by-user'>
            <p>Seleccione vendedor</p>
            <select>
            @foreach ($users as $user)
            <option value={{$user->usr_id}}>
                {{$user->usr_email}}
            </option>
            @endforeach
            </select>
        </div>
        <button class='btn btn-info btn-report-by-user'>Buscar</button>
    </div>
    <div class='report-item'>
        <div>
            <div class='date-report-id-customer'>
                <p>Reporte por cedula</p>
                <input />
            </div>
        </div>
        <button class='btn btn-info btn-report-id-customer'>Buscar</button>
    </div>
    <div id='report-date-content'></div>
</div>
<script src='js/report.js'></script>