var ruta = document.querySelector("[name=route]").value;
 var apiequipo = ruta + '/apiequipo';  

 new Vue({
    http: {
        headers: {
          'X-CSRF-TOKEN': document.querySelector('#token').getAttribute('value')
        }
    },

    el:'#equipo',
    data:{
        titulo:'EQUIPOS',
        id_equipo:'',
        nombre:'',
        puntuacion:'',
        equipos:[],
    
    },
    created:function(){
        this.obtenerequipo();
    },
    methods:{

        obtenerequipo: function(){
            this.$http.get(apiequipo).then(function(json){
              this.equipos=json.data;
              console.log(json.data)
            }).catch(function(json){
                console.log.apply(json);
              });
        },
        mostrarModal:function(){
          this.agregando=true;
           this.nombre='';
           $('#modalEquipos').modal('show');
         },
          
         guardarequipo:function(){
          var equipos = {
            nombre:this.nombre
          };
          this.$http.post(apiequipo,equipos).then(function(json){
            this.obtenerequipo();
            this.name='';
          }).catch(function(json){
            console.log(equipos);
          });
          $('#modalEquipos').modal('hide');
         },
         editandoequipo:function(id){
          this.agregando=false;
          this.id_equipo=id;
          this.$http.get(apiequipo + '/' + id).then(function(json){
            this.nombre=json.data.nombre;
          });
          $('#modalEquipos').modal('show');
         },
         actualizarEquipo:function(){
          var jsonequipo = {nombre:this.nombre};
          this.$http.patch(apiequipo + '/' + this.id,jsonequipo).then(function(json){
            this.obtenerequipo();
          });
          $('#modalEquipos').modal('hide');
        },
        eliminarequipo:function(id){
          var confir = confirm('Desaea eliminar?');
          
          if (confir){
            this.$http.delete(apiequipo + '/' + id).then(function(json){
              this.obtenerequipo();
            }).catch(function(json){
              console.log(json);
            });
          }
        },



    },
    
 })