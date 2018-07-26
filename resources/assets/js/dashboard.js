import $ from 'jquery';

let DASHBOARD = {

    //INICIALIZA EL OBJETO 
    init: function () {
        this.addEvents();
    },

    //CACHEA TODOS LOS ELEMENTOS NECESARIOS
    UIElements: {
        $btn_menu_users: $('.btn-menu-users'),
        $btn_menu_prizes: $('.btn-menu-prizes'),
        $btn_menu_info: $('.btn-menu-info'),
        $btn_menu_billing : $('.btn-menu-billing'),
        $content_to_change : $('#content-app'),
        $csrf_token : $('meta[name="csrf-token"]').attr('content')
    },

    //AGREGA LOS EVENTOS A LOS ELEMENTOS CACHEADOS
    addEvents: function () {
        this.UIElements.$btn_menu_billing.click(function () {
            this.viewBilling();
            console.log('funciona');
        }.bind(this));
    },

    //SOLICITA LA VISTA DE COBROS
    viewBilling: function () {
        let data = {
            _token: this.UIElements.$csrf_token
        }

        $.ajax({
            type: 'POST', 
            url: '/billingView', 
            data: data, 
            dataType: 'json', 
            complete: function(data){
                this.UIElements.$content_to_change.html(data.responseText);
            }.bind(this)
        })
    }
}

DASHBOARD.init();