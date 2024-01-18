var ruta = document.querySelector("[name=route]").value;
 var apiCategory = ruta + '/apiCategory';  

new Vue({
    http: {
        headers: {
          'X-CSRF-TOKEN': document.querySelector('#token').getAttribute('value')
        }
      },
      el:"#categorias",

      data:{
          titulo:'Categorías',
          id:'',
          name:'',
          buscar:'',
          categories:[],
      },

      created:function(){
        this.obtenerCategory();
      },

      //funcion que se usa cuando se crea la pagina
      
      methods:{

        obtenerCategory:function(){
          this.$http.get(apiCategory).then(function(json){
            this.categories=json.data;
            console.log(json.data)
          }).catch(function(json){
            console.log.apply(json);
          });

        },


        mostrarModal:function(){
             this.agregando=true;
             this.name='';
            $('#modalCategorias').modal('show');
          },
        editandoCategory:function(id){
          this.agregando=false;
          this.id=id;
          this.$http.get(apiCategory + '/' + id).then(function(json){
            this.name=json.data.name;
          });
          $('#modalCategorias').modal('show');
        },
        actualizarCategory:function(){
          var jsonCategory = {name:this.name};
          this.$http.patch(apiCategory + '/' + this.id,jsonCategory).then(function(json){
            this.obtenerCategory();
          });
          $('#modalCategorias').modal('hide');
        },
        eliminarCategory:function(id){
          var confir = confirm('Desaea eliminar?');
          
          if (confir){
            this.$http.delete(apiCategory + '/' + id).then(function(json){
              this.obtenerCategory();
            }).catch(function(json){
              console.log(json);
            });
          }
        },
        guardarCategory:function(){
          var categories = {
            name:this.name
          };
          this.$http.post(apiCategory,categories).then(function(json){
            this.obtenerCategory();
            this.name='';
          }).catch(function(json){
            console.log(categories);
          });
          $('#modalCategorias').modal('hide');
        },

        

      },
      //FIN DE METHODS

      computed:{

        filtroCategory:function(){
          return this.categories.filter((categories)=>{
            return categories.name.toLowerCase().match(this.buscar.toLowerCase().trim())
          });
        },
    
  }
})