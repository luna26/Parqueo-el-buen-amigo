import $ from 'jquery';

let LOGIN = {

    //INICIALIZA EL OBJETO 
    init: function () {
        this.addEvents();
    },

    //CACHEA TODOS LOS ELEMENTOS NECESARIOS
    UIElements: {
        $login_username: $('.login-input-user'),
        $login_password: $('.login-input-pass'),
        $button_send_login: $('.button-send-login'),
        $content_to_change : $('#content-to-change'),
        $csrf_token : $('meta[name="csrf-token"]').attr('content')
    },

    //AGREGA LOS EVENTOS A LOS ELEMENTOS CACHEADOS
    addEvents: function () {
        this.UIElements.$button_send_login.click(function () {
            this.sendLogin();
        }.bind(this));
    },

    //RECUPERA Y ENVIA EL LOGIN AL SERVIDOR
    sendLogin: function () {
        let user, pass;
        user = this.UIElements.$login_username.val();
        pass = this.UIElements.$login_password.val();

        let data = {
            user:user,
            pass:pass,
            _token: this.UIElements.$csrf_token
        }

        $.ajax({
            type: 'POST', 
            url: '/login', 
            data: data, 
            dataType: 'json', 
            complete: function(data){
                this.UIElements.$content_to_change.html(data.responseText);
            }.bind(this)
        })
    }
}

LOGIN.init();