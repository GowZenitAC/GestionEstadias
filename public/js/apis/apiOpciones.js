var ruta = document.querySelector("[name=route]").value;
  var apiOpciones = ruta + '/apiOpciones';  

new Vue({
    http: {
        headers: {
          'X-CSRF-TOKEN': document.querySelector('#token').getAttribute('value')
        }
      },
      el:"#opcion",

      data:{
         agregando:true,
         titulo:'Opciones',
         id:'',
         option:'',
         puntos:'',
         buscar:'',
         opciones:[],
          
      },

      created:function(){
        this.obtenerOpciones();
      },

      methods:{

        obtenerOpciones:function(){
            this.$http.get(apiOpciones).then(function(json){
                this.opciones=json.data;
                console.log(json.data)
            }).catch(function(json){
                console.log(json);
            });
        },

        mostrarModal:function(){
            this.agregando=true;
            this.option='';
            $('#modalOpciones').modal('show');
        },

        editandoOpciones:function(id){
            this.agregando=false;
            this.id=id;
            this.$http.get(apiOpciones + '/' + id).then(function(json){
                this.option=json.data.option;
                console.log(this.option);
            });
            $('#modalOpciones').modal('show');
        },

        actualizarOpciones:function(){
            var jsonOpciones = {option:this.option,
                                puntos:this.puntos};
            this.$http.patch(apiOpciones + '/' + this.id,jsonOpciones).then(function(json){
                this.obtenerOpciones();
            });
            $('#modalOpciones').modal('hide');
        },

        eliminarOpciones:function(id){
          var confir = confirm('eliminar?');
          if (confir){
            this.$http.delete(apiOpciones + '/' + id).then(function(json){
                this.obtenerOpciones();
            }).catch(function(json){
                console.log(json);
            });
          }  
        },

        guardarOpciones:function(){
            var opciones = {
                option:this.option,
                puntos:this.puntos
            };
            this.$http.post(apiOpciones,opciones).then(function(json){
                this.obtenerOpciones();
                this.option='';
                this.puntos='';
            }).catch(function(json){
                console.log(opciones);
            });
            $('#modalOpciones').modal('hide');
        }, 

      },
      //FIN DE METHODS

      computed:{

        filtroOpciones:function(){
            return this.opciones.filter((opciones)=>{
                return opciones.option.toLowerCase().match(this.buscar.toLowerCase().trim())
            });
        },  
  }
})