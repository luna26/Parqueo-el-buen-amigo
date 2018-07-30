var INFO = {

    //INICIALIZA EL OBJETO 
    init: function () {
        this.addEvents();
    },

    //CACHEA TODOS LOS ELEMENTOS NECESARIOS
    UIElements: {
        $btn_info_update : $('.btn-info-update'),
        $input_info_name : $('.input-info-name input'),
        $input_info_tel : $('.input-info-tel input'),
        $input_info_ad : $('.input-info-ad input'),
        $csrf_token : $('meta[name="csrf-token"]').attr('content'),
        $input_info_id : $('.input-info-id')
    },

    //AGREGA LOS EVENTOS A LOS ELEMENTOS CACHEADOS
    addEvents: function () {
        this.UIElements.$btn_info_update.click(function () {
            this.updateInfo();
        }.bind(this));
    },

    updateInfo:function(){
        console.log(this.UIElements.$input_info_name.val(), 'test');
        let data = {
            id: 1,
            name: this.UIElements.$input_info_name.val(),
            tel: this.UIElements.$input_info_tel.val(),
            ad: this.UIElements.$input_info_ad.val(),
            _token: this.UIElements.$csrf_token
        }

        $.ajax({
            type: 'POST', 
            url: '/updateInfo', 
            data: data, 
            dataType: 'json', 
            complete: function(data){

            }.bind(this)
        })
    }
}

INFO.init();