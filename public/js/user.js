var USERS = {

    //INICIALIZA EL OBJETO 
    init: function () {
        this.addEvents();
    },

    //CACHEA TODOS LOS ELEMENTOS NECESARIOS
    UIElements: {
        $btn_delete_user : $('.btn-delete-user'),
        $csrf_token : $('meta[name="csrf-token"]').attr('content'),
        $btn_menu_users: $('.btn-menu-users'),
        $btn_user_create : $('.btn-user-create'),
        $user_email_create : $('.user-email-create'),
        $user_password_create : $('.user-password-create'),
        $user_create_select_role : $('.user-create-select-role')
    },

    //AGREGA LOS EVENTOS A LOS ELEMENTOS CACHEADOS
    addEvents: function () {
        this.UIElements.$btn_delete_user.click(function(event){
            this.deleteUser(event);
        }.bind(this));

        this.UIElements.$btn_user_create.click(function(event){
            this.createUser(event);
        }.bind(this));
    },

    //SOLICITA LA VISTA DE COBROS
    deleteUser: function (event) {
        let id_user = $(event.currentTarget).attr('id-user');
        let data = {
            id_user:id_user,
            _token: this.UIElements.$csrf_token
        }

        $.ajax({
            type: 'POST', 
            url: '/deleteUser', 
            data: data, 
            dataType: 'json', 
            complete: function(data){
                this.UIElements.$btn_menu_users[0].click();
            }.bind(this)
        })
    },

    createUser: function(event){
        let data = {
            email: this.UIElements.$user_email_create.val(),
            password: this.UIElements.$user_password_create.val(),
            role: this.UIElements.$user_create_select_role.val(),
            _token: this.UIElements.$csrf_token
        }

        $.ajax({
            type: 'POST', 
            url: '/createUser', 
            data: data, 
            dataType: 'json', 
            complete: function(data){
                this.UIElements.$btn_menu_users[0].click();
            }.bind(this)
        })
    }
}

USERS.init();