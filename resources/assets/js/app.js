new Vue({
el :'#crud',
//llamada a la funcion
//en cuanto se cree! (created), que se haga la funcion
created: function(){
    this.getMobiles();
},
//end
//aqui almacenamos datos
data: {
    mobiles: []
},
//end
//funcionalidad. aqui se llama a laravel y que te pase datos.
methods: {
    getMobiles: function(){
        var urlMobiles = 'mobiles';
        axios.get(urlMobiles).then(response =>{
            this.mobiles = response.data;
        } );
    },
    deleteTel: function(){
        alert("borrando...");
    }
    
}
});