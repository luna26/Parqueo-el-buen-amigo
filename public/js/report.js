var REPORT = {

    //INICIALIZA EL OBJETO 
    init: function () {
        this.addEvents();
    },

    //CACHEA TODOS LOS ELEMENTOS NECESARIOS
    UIElements: {
        $btn_report_date : $('.btn-report-date'),
        $csrf_token : $('meta[name="csrf-token"]').attr('content'),
        $report_date_content : $('#report-date-content'),
        $btn_report_num_bill: $('.btn-report-num-bill'),
        $btn_report_by_user: $('.btn-report-by-user'),
        $date_report_initial: $('.date-report-initial input'),
        $date_report_final: $('.date-report-final input'),
        $date_report_num_bill: $('.date-report-num-bill input'),
        $date_report_by_user: $('.date-report-by-user select'),
        $date_report_id_customer: $('.date-report-id-customer input'),
        $btn_report_id_customer : $('.btn-report-id-customer')
    },

    //AGREGA LOS EVENTOS A LOS ELEMENTOS CACHEADOS
    addEvents: function () {
        this.UIElements.$btn_report_date.click(function (e) {
            this.reportDate();
        }.bind(this));

        this.UIElements.$btn_report_num_bill.click(function (e) {
            this.reportNumBill();
        }.bind(this));

        this.UIElements.$btn_report_by_user.click(function (e) {
            this.reportUser();
        }.bind(this));

        this.UIElements.$btn_report_id_customer.click(function (e) {
            this.reportCustomer();
        }.bind(this));
    },

    reportDate: function(event){
        date1 =  this.UIElements.$date_report_initial.val();
        date2 =  this.UIElements.$date_report_final.val();

        let data = {
            date1:date1,
            date2:date2,
            _token: this.UIElements.$csrf_token
        }

        $.ajax({
            type: 'POST', 
            url: '/dateReport', 
            data: data, 
            dataType: 'json', 
            complete: function(data){
                this.UIElements.$report_date_content.empty();
                this.UIElements.$report_date_content.html(data.responseText);
                
                console.log(data.responseText);
            }.bind(this)
        })
    },

    reportNumBill: function(){
        let data = {
            numBill: this.UIElements.$date_report_num_bill.val(),
            _token: this.UIElements.$csrf_token
        }

        $.ajax({
            type: 'POST', 
            url: '/billNum', 
            data: data, 
            dataType: 'json', 
            complete: function(data){
                this.UIElements.$report_date_content.empty();
                this.UIElements.$report_date_content.html(data.responseText);
            }.bind(this)
        })
    },

    reportUser: function(){
        let data = {
            user:this.UIElements.$date_report_by_user.val(),
            _token: this.UIElements.$csrf_token
        }

        $.ajax({
            type: 'POST', 
            url: '/billUser', 
            data: data, 
            dataType: 'json', 
            complete: function(data){
                this.UIElements.$report_date_content.empty();
                this.UIElements.$report_date_content.html(data.responseText);
            }.bind(this)
        })
    },

    reportCustomer:function(){
        let data = {
            customer_id:this.UIElements.$date_report_id_customer.val(),
            _token: this.UIElements.$csrf_token
        }

        $.ajax({
            type: 'POST', 
            url: '/billcustomer', 
            data: data, 
            dataType: 'json', 
            complete: function(data){
                this.UIElements.$report_date_content.empty();
                this.UIElements.$report_date_content.html(data.responseText);
            }.bind(this)
        })
    }
}

REPORT.init();