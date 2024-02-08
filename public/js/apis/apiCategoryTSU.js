var ruta = document.querySelector("[name=route]").value;
 var apiCategoryTSU = ruta + '/apiCategoryTSU';  

new Vue({
    http: {
        headers: {
          'X-CSRF-TOKEN': document.querySelector('#token').getAttribute('value')
        }
      },
      el:"#categoriasTSU",

      data:{
          titulo:'Categorías TSU',
          id:'',
          nametsu:'',
          buscar:'',
          agregando:true,
          categories:[],
          
      },
      
      created:function(){
        this.obtenerCategoryTSU();
      },

    
      
      methods:{

        obtenerCategoryTSU:function(){
          this.$http.get(apiCategoryTSU).then(function(json){
            this.categories=json.data;
            console.log(json.data)
          }).catch(function(json){
            console.log.apply(json);
          });

        },

        mostrarModal:function(){
          this.agregando=true;
          this.nametsu='';
         $('#modalCategoriasTSU').modal('show');
       },
       editandoCategory:function(id){
        this.agregando=false;
        this.id=id;
        this.$http.get(apiCategoryTSU + '/' + id).then(function(json){
          this.nametsu=json.data.nametsu;
          console.log(this.nametsu);
        });
        $('#modalCategoriasTSU').modal('show');
      },
      actualizarCategory: function () {
        var jsonCategoryTSU = {
            nametsu: this.nametsu
        };
    
        this.$http
            .patch(apiCategoryTSU + '/' + this.id, jsonCategoryTSU)
            .then(function (json) {
                this.obtenerCategoryTSU();
    
                // Use SweetAlert2 for success message
                Swal.fire({
                    icon: 'success',
                    title: 'Categoría actualizada correctamente!',
                    showConfirmButton: false,
                    timer: 1500
                });
            })
            .catch(function (error) {
                console.log(error);
    
                // Use SweetAlert2 for error message
                Swal.fire({
                    icon: 'error',
                    title: 'Error al actualizar la categoría',
                    text: 'Por favor, inténtelo de nuevo.',
                });
            });
    
        $('#modalCategoriasTSU').modal('hide');
    },
    

      //  actualizarCategory:function(){
      //     var jsonCategoryTSU = {nametsu:this.nametsu};
      //     this.$http.patch(apiCategoryTSU + '/' + this.id,jsonCategoryTSU).then(function(json){
      //       this.obtenerCategoryTSU();
      //     });
      //     $('#modalCategoriasTSU').modal('hide');
      //   },
        // eliminarCategory:function(id){
        //   var confir = confirm('Desaea eliminar?');
          
        //   if (confir){
        //     this.$http.delete(apiCategoryTSU + '/' + id).then(function(json){
        //       this.obtenerCategoryTSU();
        //     }).catch(function(json){
        //       console.log(json);
        //     });
        //   }
        // },
        eliminarCategory: function (id) {
          Swal.fire({
              title: '¿Estás seguro?',
              text: '¡No podrás revertir esto!',
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#d33',
              cancelButtonColor: '#3085d6',
              confirmButtonText: 'Sí, eliminarlo'
          }).then((result) => {
              if (result.isConfirmed) {
                  this.$http
                      .delete(apiCategoryTSU + '/' + id)
                      .then(function (json) {
                          this.obtenerCategoryTSU();
      
                          // Use SweetAlert2 for success message
                          Swal.fire(
                              'Eliminado',
                              'La categoría ha sido eliminada correctamente.',
                              'success'
                          );
                      })
                      .catch(function (error) {
                          console.log(error);
      
                          // Use SweetAlert2 for error message
                          Swal.fire(
                              'Error',
                              'Hubo un problema al intentar eliminar la categoría.',
                              'error'
                          );
                      });
              }
          });
      },
      

        guardarCategory: function () {
          var categories = {
            nametsu: this.nametsu
          };
        
          this.$http.post(apiCategoryTSU, categories)
            .then(function (json) {
              this.obtenerCategoryTSU();
              this.nametsu = '';
        
              // Mostrar SweetAlert2 después de guardar exitosamente
              Swal.fire({
                icon: 'success',
                title: 'Guardado exitoso',
                showConfirmButton: true,
                confirmButtonText: 'OK',
              });
        
            })
            .catch(function (json) {
              console.log(categories);
        
              // Mostrar SweetAlert2 en caso de error
              Swal.fire({
                icon: 'error',
                title: 'Error al guardar',
                text: 'Hubo un problema al intentar guardar la categoría.',
                showConfirmButton: true,
                confirmButtonText: 'OK',
              });
            });
        
          $('#modalCategoriasTSU').modal('hide');
        },
        
        //  guardarCategory:function(){
        //   var categories = {
        //     nametsu:this.nametsu
        //   };
        //   this.$http.post(apiCategoryTSU,categories).then(function(json){
        //     this.obtenerCategoryTSU();
        //     this.nametsu='';
        //   }).catch(function(json){
        //     console.log(categories);
        //   });
        //   $('#modalCategoriasTSU').modal('hide');
        // },

      },
      //FIN DE METHODS

      computed:{

        filtroCategory:function(){
          return this.categories.filter((categories)=>{
            return categories.nametsu.toLowerCase().match(this.buscar.toLowerCase().trim())
          });
        },
    
  }
})