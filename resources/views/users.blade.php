<div class='container-users'>
    <div class='list-services-actives'>
        <p>Agregar Usuario</p>
        <div class='content-users'>
            <div>
                <label>Correo</label>
                <input class='user-email-create'/>
            </div>
            <div>
                <label>Contrasena</label>
                <input class='user-password-create' type='password' />
            </div>
            <div>
                <label>Role</label>
                <select class='user-create-select-role'>
                @foreach ($roles as $role)
                    <option value={{$role->role_id}}>
                        {{$role->role_name}}
                    </option>
                @endforeach
                </select>
            </div>
            <div>
                <button class='btn btn-info btn-user-create'>Crear</button>
            </div>
        </div>
    </div>
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
                    <button class='btn btn-danger btn-delete-user' id-user={{$user->usr_id}}>Eliminar</button>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</div>
<script src='js/user.js'></script>