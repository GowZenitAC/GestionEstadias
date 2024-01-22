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
          option:'',
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
            this.option='';
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
                option:this.option,
                puntos:this.puntos
            };
            this.$http.post(apiOpciones,opcion).then(function(json){
                this.obtenerOpciones();
                this.option='';
                this.puntos='';
            });
            $('#modalOpciones').modal('hide');
            console.log(opcion);
        },

        editandoOpciones:function(id){
            this.agregando=false;
            this.id=id;
            this.$http.get(apiOpciones+'/'+id).then(function(json){
                this.option=json.data.option;
                this.puntos=json.data.puntos;
            });
            $('#modalOpciones').modal('show');
        },

        actualizarOpciones:function(){
            var jsonOpciones = {option:this.option,
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