<div class='container-users'>
    <div class='list-services-actives'>
        <div class='title-form-add-service'>
            <p>Lista de usuarios</p>
        </div>
        <table style="width:100%">
            <tr>
                <th>ID</th>
                <th>Email</th> 
                <th>Contrasena</th>
                <th>Role</th>
                <th>Opciones</th>
            </tr>
            @foreach ($users as $user)
            <tr>
                <td>{{$user->usr_id}}</td>
                <td>{{$user->usr_email}}</td>
                <td>{{$user->usr_pass}}</td>
                <td>{{$user->role_id}}</td>
                <td>
                    <button class='btn btn-danger btn-bill' id-bill={{$user->usr_id}}>Eliminar</button>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</div>