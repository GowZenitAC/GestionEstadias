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
          titulo:'Opciones',
          opciones:[],
          buscar:'',
          opciones:'',
          puntos:'',
          id:'',
          agregando:true,
          
      },

      created:function(){
        this.obtenerOpciones();
      },

     

      //funcion que se usa cuando se crea la pagina
      
      methods:{

        mostrarModal:function(){
            this.agregando=true;
            this.opciones='';
            $('#modalOpciones').modal('show');
          },
    

        obtenerOpciones:function(){
            this.$http.get(apiOpciones).then(function(json){
                this.opciones=json.data;
                console.log(json.data)
            }).catch(function(json){
                console.log(json);
            });
        },

        guardarOpciones:function(){
            var opcion = {
                opciones:this.opciones,
                puntos:this.puntos
            };
            this.$http.post(apiOpciones,opcion).then(function(json){
                this.obtenerOpciones();
                this.opciones='';
                this.puntos='';
            });
            $('#modalOpciones').modal('hide');
            console.log(opcion);
        },

        editandoOpciones:function(id){
            this.agregando=false;
            this.id=id;
            this.$http.get(apiOpciones+'/'+id).then(function(json){
                this.opciones=json.data.opciones;
                this.puntos=json.data.puntos;
            });
            $('#modalOpciones').modal('show');
        },

        actualizarOpciones:function(){
            var jsonOpciones = {opciones:this.opciones,
                                puntos:this.puntos};
            this.$http.patch(apiOpciones+'/'+this.id,jsonOpciones).then(function(json){
                this.obtenerOpciones();
            });
            $('#modalOpciones').modal('hide');
        },

        eliminarOpcion:function(id){
            var confir=confirm('eliminar?');
            if (confir){
                this.$http.delete(apiOpciones+'/'+id).then(function(json){
                    this.obtenerOpciones();
                }).catch(function(json){
                    console.log(json);
                });
            }
        },


        

      },
      //FIN DE METHODS

      computed:{

    


    
  }
})