var ruta = document.querySelector("[name=route]").value;
 var apiCarrerasDos = ruta + '/apiCarrerasDos';  

new Vue({
    http: {
        headers: {
          'X-CSRF-TOKEN': document.querySelector('#token').getAttribute('value')
        }
      },
      el:"#carreras",

      data:{
          titulo:'Carreras',
          id:'',
          carrera2:'',
          buscar:'',
          agregando:true,
          carreras:[],
      },

      created:function(){
        this.obtenerCarrera();
      },

      //funcion que se usa cuando se crea la pagina
      
      methods:{

        obtenerCarrera:function(){
          this.$http.get(apiCarrerasDos).then(function(json){
            this.carreras=json.data;
            console.log(json.data);
          }).catch(function(json){
            console.log(json);
          });
        },


        mostrarModal:function(){
             this.agregando=true;
             this.carrera2='';
            $('#modalCarreras').modal('show');
          },
        editandoCarrera:function(id){
          this.agregando=false;
          this.id=id;
          this.$http.get(apiCarrerasDos + '/' + id).then(function(json){
            this.carrera2=json.data.carrera2;
          });
          $('#modalCarreras').modal('show');
        },

        actualizarCarrera: function () {
          var jsonCarrera = {
              carrera2: this.carrera2
          };
      
          // Realizar la petición HTTP para actualizar la categoría
          this.$http.patch(apiCarrerasDos + '/' + this.id, jsonCarrera).then(function (json) {
              // Éxito
              this.obtenerCarrera();
      
              // Mostrar mensaje SweetAlert de éxito
              Swal.fire({
                  title: 'Éxito',
                  text: 'La carrera se ha actualizado correctamente.',
                  icon: 'success',
                  confirmButtonText: 'OK'
              });
          }).catch(function (error) {
              // Error
              console.error(jsonCarrera);
      
              // Mostrar mensaje SweetAlert de error
              Swal.fire({
                  title: 'Error',
                  text: 'Hubo un problema al actualizar la carrera. Por favor, inténtalo de nuevo.',
                  icon: 'error',
                  confirmButtonText: 'OK'
              });
          });
      
          // Ocultar el modal
          $('#modalCarreras').modal('hide');
      },

      eliminarCarrera: function (id) {
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
                this.$http.delete(apiCarrerasDos + '/' + id).then(function (json) {
                    // Éxito
                    this.obtenerCarrera();
    
                    // Mostrar mensaje SweetAlert de éxito
                    Swal.fire(
                        'Eliminado',
                        'La carrera ha sido eliminada correctamente.',
                        'success'
                    );
                }).catch(function (error) {
                    // Error
                    console.error(error);
    
                    // Mostrar mensaje SweetAlert de error
                    Swal.fire(
                        'Error',
                        'Hubo un problema al eliminar la carrera. Por favor, inténtalo de nuevo.',
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
        guardarCarrera: function () {
          var carreras = {
              carrera2: this.carrera2
          };
      
          // Realizar la petición HTTP
          this.$http.post(apiCarrerasDos, carreras).then(function (json) {
              // Éxito
              this.obtenerCarrera();
              this.carrera2 = '';
      
              // Mostrar mensaje SweetAlert de éxito
              Swal.fire({
                  title: 'Éxito',
                  text: 'La carrera se ha guardado correctamente.',
                  icon: 'success',
                  confirmButtonText: 'OK'
              });
          }).catch(function (error) {
              // Error
              console.error(carreras);
      
              // Mostrar mensaje SweetAlert de error
              Swal.fire({
                  title: 'Error',
                  text: 'Hubo un problema al guardar la carrera. Por favor, inténtalo de nuevo.',
                  icon: 'error',
                  confirmButtonText: 'OK'
              });
          });
      
          // Ocultar el modal
          $('#modalCarreras').modal('hide');
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

        filtroCarrera:function(){
          return this.carreras.filter((carreras)=>{
            return carreras.carrera2.toLowerCase().match(this.buscar.toLowerCase().trim())
          });
        },
    
  }
})