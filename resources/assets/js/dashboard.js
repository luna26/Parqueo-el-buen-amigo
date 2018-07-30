import $ from 'jquery';

let DASHBOARD = {

    //INICIALIZA EL OBJETO 
    init: function () {
        this.addEvents();
    },

    //CACHEA TODOS LOS ELEMENTOS NECESARIOS
    UIElements: {
        $btn_menu_users: $('.btn-menu-users'),
        $btn_menu_prices: $('.btn-menu-prizes'),
        $btn_menu_info: $('.btn-menu-info'),
        $btn_menu_billing : $('.btn-menu-billing'),
        $btn_menu_report : $('.btn-menu-report'),
        $content_to_change : $('#content-app'),
        $csrf_token : $('meta[name="csrf-token"]').attr('content')
    },

    //AGREGA LOS EVENTOS A LOS ELEMENTOS CACHEADOS
    addEvents: function () {
        this.UIElements.$btn_menu_billing.click(function () {
            this.viewBilling();
        }.bind(this));

        this.UIElements.$btn_menu_users.click(function () {
            this.viewUsers();
        }.bind(this));

        this.UIElements.$btn_menu_prices.click(function () {
            this.pricesView();
        }.bind(this));

        this.UIElements.$btn_menu_info.click(function () {
            this.infoView();
        }.bind(this));

        this.UIElements.$btn_menu_report.click(function () {
            this.reportView();
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
    },

    //SOLICITA LA VISTA DE USUARIOS
    viewUsers: function(){
        let data = {
            _token: this.UIElements.$csrf_token
        }
        
        $.ajax({
            type: 'POST', 
            url: '/usersView', 
            data: data, 
            dataType: 'json', 
            complete: function(data){
                this.UIElements.$content_to_change.html(data.responseText);
            }.bind(this)
        })
    },

    pricesView: function(){
        let data = {
            _token: this.UIElements.$csrf_token
        }
        
        $.ajax({
            type: 'POST', 
            url: '/getPrices', 
            data: data, 
            dataType: 'json', 
            complete: function(data){
                this.UIElements.$content_to_change.html(data.responseText);
            }.bind(this)
        })
    },

    infoView: function(){
        let data = {
            _token: this.UIElements.$csrf_token
        }
        
        $.ajax({
            type: 'POST', 
            url: '/viewInfo', 
            data: data, 
            dataType: 'json', 
            complete: function(data){
                this.UIElements.$content_to_change.html(data.responseText);
            }.bind(this)
        })
    },

    reportView: function() {
        let data = {
            _token: this.UIElements.$csrf_token
        }
        
        $.ajax({
            type: 'POST', 
            url: '/viewReport', 
            data: data, 
            dataType: 'json', 
            complete: function(data){
                this.UIElements.$content_to_change.html(data.responseText);
            }.bind(this)
        })
    }
}

DASHBOARD.init();