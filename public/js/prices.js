var PRICES = {

    //INICIALIZA EL OBJETO 
    init: function () {
        this.addEvents();
    },

    //CACHEA TODOS LOS ELEMENTOS NECESARIOS
    UIElements: {
        $btn_price_change: $('.btn-price-change'),
        $csrf_token : $('meta[name="csrf-token"]').attr('content'),
    },

    //AGREGA LOS EVENTOS A LOS ELEMENTOS CACHEADOS
    addEvents: function () {
        this.UIElements.$btn_price_change.click(function (e) {
            this.changePrice(e);
        }.bind(this));
    },

    changePrice: function(event){
        var id_esp = $(event.currentTarget).attr('btn-price-id');

        var value = $($("input[input-price-id='"+id_esp+"']" )[0]).val();

        let data = {
            id_esp:id_esp,
            price: value,
            _token: this.UIElements.$csrf_token
        }

        $.ajax({
            type: 'POST', 
            url: '/updatePrice', 
            data: data, 
            dataType: 'json', 
            complete: function(data){
                console.log(data);
            }.bind(this)
        })
    }
}

PRICES.init();