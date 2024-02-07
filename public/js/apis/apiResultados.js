var ruta = document.querySelector("[name=route]").value;
 var apiResultados = ruta + '/apiResultados';
 var myChart = document.getElementById('myChart');

new Vue({
    http: {
        headers: {
          'X-CSRF-TOKEN': document.querySelector('#token').getAttribute('value')
        }
      },
      el:"#resultados",

      data:{
          titulo:'Resultados',
          id:'',
          id_equipo:'',
          puntos:'',
          tiempo:'',
          buscar:'',
          agregando:true,
          resultados:[],
      },

      created:function(){
        this.obtenerResultados();
      },

      //funcion que se usa cuando se crea la pagina
      
      methods:{

        obtenerResultados:function(){
          this.$http.get(apiResultados).then(function(json){
            this.resultados=json.data;
            console.log(json.data)
          }).catch(function(json){
            console.log.apply(json);
          });

        },


        mostrarModal:function(){
             this.agregando=true;
             this.id_equipo='';
             this.puntos='';
             this.tiempo='';
            $('#modalResultados').modal('show');
          },
        editandoResultados:function(id){
          this.agregando=false;
          this.id=id;
          this.$http.get(apiResultados + '/' + id).then(function(json){
            this.id_equipo=json.data.id_equipo;
            this.puntos=json.data.puntos;
            this.tiempo=json.data.tiempo;
          });
          $('#modalResultados').modal('show');
        },

        actualizarResultados: function () {
          var jsonResultado = {
              id_equipo: this.id_equipo,
              puntos: this.puntos,
              tiempo: this.tiempo
          };
      
          // Realizar la petición HTTP para actualizar la categoría
          this.$http.patch(apiResultados + '/' + this.id, jsonResultado).then(function (json) {
              // Éxito
              this.obtenerResultados();
      
              // Mostrar mensaje SweetAlert de éxito
              Swal.fire({
                  title: 'Éxito',
                  text: 'Los resultados se han actualizado correctamente.',
                  icon: 'success',
                  confirmButtonText: 'OK'
              });
          }).catch(function (error) {
              // Error
              console.error(jsonResultado);
      
              // Mostrar mensaje SweetAlert de error
              Swal.fire({
                  title: 'Error',
                  text: 'Hubo un problema al actualizar los resultados. Por favor, inténtalo de nuevo.',
                  icon: 'error',
                  confirmButtonText: 'OK'
              });
          });
      
          // Ocultar el modal
          $('#modalResultados').modal('hide');
      },

      eliminarResultados: function (id) {
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
                this.$http.delete(apiResultados + '/' + id).then(function (json) {
                    // Éxito
                    this.obtenerResultados();
    
                    // Mostrar mensaje SweetAlert de éxito
                    Swal.fire(
                        'Eliminado',
                        'El resultado ha sido eliminada correctamente.',
                        'success'
                    );
                }).catch(function (error) {
                    // Error
                    console.error(error);
    
                    // Mostrar mensaje SweetAlert de error
                    Swal.fire(
                        'Error',
                        'Hubo un problema al eliminar el resultado. Por favor, inténtalo de nuevo.',
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
        guardarResultados: function () {
          var resultados = {
              id_equipo: this.id_equipo,
              puntos: this.puntos,
              tiempo: this.tiempo
          };
      
          // Realizar la petición HTTP
          this.$http.post(apiResultados, resultados).then(function (json) {
              // Éxito
              this.obtenerResultados();
              this.id_equipo='';
              this.puntos='';
              this.tiempo='';
      
              // Mostrar mensaje SweetAlert de éxito
              Swal.fire({
                  title: 'Éxito',
                  text: 'El resultado se ha guardado correctamente.',
                  icon: 'success',
                  confirmButtonText: 'OK'
              });
          }).catch(function (error) {
              // Error
              console.error(resultados);
      
              // Mostrar mensaje SweetAlert de error
              Swal.fire({
                  title: 'Error',
                  text: 'Hubo un problema al guardar el resultado. Por favor, inténtalo de nuevo.',
                  icon: 'error',
                  confirmButtonText: 'OK'
              });
          });
      
          // Ocultar el modal
          $('#modalResultados').modal('hide');
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

        filtroResultados:function(){
          return this.resultados.filter((resultados)=>{
            return resultados.id_equipo.toLowerCase().match(this.buscar.toLowerCase().trim())
          });
        },
    
  }
})