var BILL_ITEM = {

    //INICIALIZA EL OBJETO 
    init: function () {
        this.addEvents();
    },

    //CACHEA TODOS LOS ELEMENTOS NECESARIOS
    UIElements: {
        $btn_bill_close : $('.btn-bill-close'),
        $overlay_bill : $('.overlay-bill'),
    },

    //AGREGA LOS EVENTOS A LOS ELEMENTOS CACHEADOS
    addEvents: function () {
        this.UIElements.$btn_bill_close.click(function () {
            this.hideBill();
        }.bind(this));
    },

    hideBill:function(){
        this.UIElements.$overlay_bill.addClass('hide');
    }
}

BILL_ITEM.init();