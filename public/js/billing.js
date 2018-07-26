var BILLING = {

    //INICIALIZA EL OBJETO 
    init: function () {
        this.addEvents();
        console.log('ejecutando');
    },

    //CACHEA TODOS LOS ELEMENTOS NECESARIOS
    UIElements: {
        $btn_menu_billing : $('.btn-menu-billing'),
        $btn_add_service: $('.btn-add-service'),
        $add_service_name: $('.add-service-name input'),
        $add_service_dir: $('.add-service-dir input'),
        $add_service_id: $('.add-service-id input'),
        $add_service_tel: $('.add-service-tel input'),
        $add_service_car_id: $('.add-service-car-id input'),
        $add_service_service_type: $('.add-service-service-type select'),
        $csrf_token : $('meta[name="csrf-token"]').attr('content'),
        $userId:$('#cssmenu').attr('data-user-id'),
        $btn_bill: $('.btn-bill')
    },

    //AGREGA LOS EVENTOS A LOS ELEMENTOS CACHEADOS
    addEvents: function () {
        this.UIElements.$btn_add_service.click(function () {
            this.createService();
        }.bind(this));

        this.UIElements.$btn_bill.click(function(event){
            this.billFunction(event);
        }.bind(this));
    },

    //SOLICITA LA VISTA DE COBROS
    createService: function () {
        let name, dir, id, tel, car_id, service_type;

        name = this.UIElements.$add_service_name.val();
        dir = this.UIElements.$add_service_dir.val();
        id = this.UIElements.$add_service_id.val();
        tel = this.UIElements.$add_service_tel.val();
        car_id = this.UIElements.$add_service_car_id.val();
        service_type = this.UIElements.$add_service_service_type.val();

        let data = {
            name:name,
            dir:dir,
            id:id,
            tel:tel, 
            car_id : car_id,
            service_type: service_type,
            userID: this.UIElements.$userId,
            _token: this.UIElements.$csrf_token
        }

        $.ajax({
            type: 'POST', 
            url: '/addBill', 
            data: data, 
            dataType: 'json', 
            complete: function(data){
                console.log('click');
                this.UIElements.$btn_menu_billing[0].click();
            }.bind(this)
        })
    },
    //REALIZA LA FACTURA DE UN ITEM PENDIENTE
    billFunction: function(event){
        let fac_id;
        fac_id = $(event.currentTarget).attr('id-bill');

        let data = {
            fac_id:fac_id,
            _token: this.UIElements.$csrf_token
        }

        $.ajax({
            type: 'POST', 
            url: '/bill', 
            data: data, 
            dataType: 'json', 
            complete: function(data){
                console.log(data);
            }.bind(this)
        })
    }
}

BILLING.init();