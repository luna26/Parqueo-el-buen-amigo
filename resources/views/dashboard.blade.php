
<div id='cssmenu' data-user-id={{$user[0]->usr_id}}>
        <ul>
        <li><a class='btn-menu-billing' href='#'>Cobros</a></li>
        @if ($user[0]->role_name === 'admin')
            <li><a class='btn-menu-users' href='#'>Usuarios</a></li>
            <li><a class='btn-menu-prizes' href='#'>Precios</a></li>
            <li><a class='btn-menu-info' href='#'>Informacion General</a></li>
        @endif 
        <li><a href='/'>Cerrar Sesion</a></li>
        </ul>
</div>

<div id='content-app'>
    <p>Bienvenido al panel administrativo!</p>
</div>
<script src='js/app.js'></script>

