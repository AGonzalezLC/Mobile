require('./bootstrap');

window.axios = require('axios');

window.Vue = require('vue');

new Vue({
    el: '#crud',
    //llamada a la funcion
    //en cuanto se cree! (created), que se haga la funcion
    created: function () {
        this.getMobiles();
    },
    //end
    //aqui almacenamos datos
    data: {
        mobiles: [],
        pagination: {
            'total': 0,
            'current_page': 0,
            'per_page': 0,
            'last_page': 0,
            'from': 0,
            'to': 0
        },
        newUser_id: '',
        newNumber: '',
        fillMobile: { 'id': '', 'number': '', 'user_id': '' },
        errors: [],
        offset : 3
    },
    computed: {
        isActived: function () {
            return this.pagination.current_page;
        },
        pagesNumber: function () {
            if (!this.pagination.to) {
                return [];
            }
            var from = this.pagination.current_page - this.offset; //TODO OFFSET
            if (from < 1) {
                from = 1;//control de numeros negativos
            }
            var to = from + (this.offset * 2);
            if (to >= this.pagination.last_page) {
                to = this.pagination.last_page;
            }
            var pagesArray = [];
            while(from <= to){
                pagesArray.push(from);
                from++;
            }
            return pagesArray;
        }
    },
    //end
    //funcionalidad. aqui se llama a laravel y que te pase datos.
    methods: {
        getMobiles: function (page) {
            var urlMobiles = 'mobiles?page='+page;
            axios.get(urlMobiles).then(response => {
                this.mobiles = response.data.mobiles.data;
                this.pagination = response.data.pagination
            });
        },
        deleteTel: function (mobile) {
            //alert(mobile.id);
            var url = 'mobiles/' + mobile.id;
            axios.delete(url).then(response => {
                this.getMobiles();
                toastr.success('Eliminado correctamente');
            });
        },
        createMobile: function () {
            var url = 'mobiles';
            axios.post(url, {
                number: this.newNumber,
                user_id: this.newUser_id
            }).then(response => {
                this.getMobiles();
                this.newNumber = '';
                this.newUser_id = '';
                this.errors = [];
                $('#create').modal('hide');
                toastr.success('Nuevo numero insertado correctamente');
            }).catch(error => {
                this.errors = error.response.data
            });
        },
        editMobile: function (mobile) {
            this.fillMobile.id = mobile.id;
            this.fillMobile.number = mobile.number;
            this.fillMobile.user_id = mobile.user_id;
            $('#edit').modal('show');
        },
        updateMobile: function (id) {
            var url = 'mobiles/' + id;
            axios.put(url, this.fillMobile).then(response => {
                this.getMobiles();
                this.fillMobile = { 'id': '', 'number': '', 'user_id': '' },
                    this.errors = [];
                $('#edit').modal('hide');
                toastr.success('Numero actualizado correctamente.');
            }).catch(error => {
                this.errors = error.response.data
            });
        },
        changePage:function(page){
            this.pagination.current_page = page;
            this.getMobiles(page);
        }
    }
});