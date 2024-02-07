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
          agregando:true,
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

        actualizarCategory: function () {
          var jsonCategory = {
              name: this.name
          };
      
          // Realizar la petición HTTP para actualizar la categoría
          this.$http.patch(apiCategory + '/' + this.id, jsonCategory).then(function (json) {
              // Éxito
              this.obtenerCategory();
      
              // Mostrar mensaje SweetAlert de éxito
              Swal.fire({
                  title: 'Éxito',
                  text: 'La categoría se ha actualizado correctamente.',
                  icon: 'success',
                  confirmButtonText: 'OK'
              });
          }).catch(function (error) {
              // Error
              console.error(jsonCategory);
      
              // Mostrar mensaje SweetAlert de error
              Swal.fire({
                  title: 'Error',
                  text: 'Hubo un problema al actualizar la categoría. Por favor, inténtalo de nuevo.',
                  icon: 'error',
                  confirmButtonText: 'OK'
              });
          });
      
          // Ocultar el modal
          $('#modalCategorias').modal('hide');
      },

      eliminarCategory: function (id) {
        // Utilizar SweetAlert en lugar de confirm
        Swal.fire({
            title: '¿Estás seguro?',
            text: 'Esta acción no se puede deshacer.',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Sí, eliminar',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                // Realizar la petición HTTP para eliminar la categoría
                this.$http.delete(apiCategory + '/' + id).then(function (json) {
                    // Éxito
                    this.obtenerCategory();
    
                    // Mostrar mensaje SweetAlert de éxito
                    Swal.fire(
                        'Eliminado',
                        'La categoría ha sido eliminada correctamente.',
                        'success'
                    );
                }).catch(function (error) {
                    // Error
                    console.error(error);
    
                    // Mostrar mensaje SweetAlert de error
                    Swal.fire(
                        'Error',
                        'Hubo un problema al eliminar la categoría. Por favor, inténtalo de nuevo.',
                        'error'
                    );
                });
            }
        });
    },
        // actualizarCategory:function(){
        //   var jsonCategory = {name:this.name};
        //   this.$http.patch(apiCategory + '/' + this.id,jsonCategory).then(function(json){
        //     this.obtenerCategory();
        //   });
        //   $('#modalCategorias').modal('hide');
        // },
        // eliminarCategory:function(id){
        //   var confir = confirm('Desaea eliminar?');
          
        //   if (confir){
        //     this.$http.delete(apiCategory + '/' + id).then(function(json){
        //       this.obtenerCategory();
        //     }).catch(function(json){
        //       console.log(json);
        //     });
        //   }
        // },
        guardarCategory: function () {
          var categories = {
              name: this.name
          };
      
          // Realizar la petición HTTP
          this.$http.post(apiCategory, categories).then(function (json) {
              // Éxito
              this.obtenerCategory();
              this.name = '';
      
              // Mostrar mensaje SweetAlert de éxito
              Swal.fire({
                  title: 'Éxito',
                  text: 'La categoría se ha guardado correctamente.',
                  icon: 'success',
                  confirmButtonText: 'OK'
              });
          }).catch(function (error) {
              // Error
              console.error(categories);
      
              // Mostrar mensaje SweetAlert de error
              Swal.fire({
                  title: 'Error',
                  text: 'Hubo un problema al guardar la categoría. Por favor, inténtalo de nuevo.',
                  icon: 'error',
                  confirmButtonText: 'OK'
              });
          });
      
          // Ocultar el modal
          $('#modalCategorias').modal('hide');
      },
        // guardarCategory:function(){
        //   var categories = {
        //     name:this.name
        //   };
        //   this.$http.post(apiCategory,categories).then(function(json){
        //     this.obtenerCategory();
        //     this.name='';
        //   }).catch(function(json){
        //     console.log(categories);
        //   });
        //   $('#modalCategorias').modal('hide');
        // },

        

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