var ruta = document.querySelector("[name=route]").value;
 var apiResultadosTSU = ruta + '/apiResultadosTSU';
 var apiBancos = ruta + '/apiCarreras';
 var myChart = document.getElementById('myChart');

new Vue({
    http: {
        headers: {
          'X-CSRF-TOKEN': document.querySelector('#token').getAttribute('value')
        }
      },
      el:"#resultadostsu",

      data:{
          titulo:'Resultados TSU',
          id:'',
          id_equipotsu:'',
          puntostsu:'',
          tiempotsu:'',
          buscar:'',
          agregando:true,
          resultados:[],
          banco:'',
      },

      created:function(){
        this.obtenerResultados();
      },

      //funcion que se usa cuando se crea la pagina
      
      methods:{

        obtenerResultados:function(){
          this.$http.get(apiResultadosTSU).then(function(json){
            this.resultados=json.data;
            console.log(json.data)
          }).catch(function(json){
            console.log.apply(json);
          });

        },


        mostrarModal:function(){
             this.agregando=true;
             this.id_equipotsu='';
             this.puntostsu='';
             this.tiempotsu='';
            $('#modalResultados').modal('show');
          },
        editandoResultados:function(id){
          this.agregando=false;
          this.id=id;
          this.$http.get(apiResultadosTSU + '/' + id).then(function(json){
            this.id_equipotsu=json.data.id_equipotsu;
            this.puntostsu=json.data.puntostsu;
            this.tiempotsu=json.data.tiempotsu;
          });
          $('#modalResultados').modal('show');
        },

        actualizarResultados: function () {
          var jsonResultado = {
              id_equipotsu: this.id_equipotsu,
              puntostsu: this.puntostsu,
              tiempotsu: this.tiempotsu
          };
      
          // Realizar la petición HTTP para actualizar la categoría
          this.$http.patch(apiResultadosTSU + '/' + this.id, jsonResultado).then(function (json) {
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
                this.$http.delete(apiResultadosTSU + '/' + id).then(function (json) {
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
              id_equipotsu: this.id_equipotsu,
              puntostsu: this.puntostsu,
              tiempotsu: this.tiempotsu
          };
      
          // Realizar la petición HTTP
          this.$http.post(apiResultadosTSU, resultados).then(function (json) {
              // Éxito
              this.obtenerResultados();
              this.id_equipotsu='';
              this.puntostsu='';
              this.tiempotsu='';
      
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
            return resultados.id_equipotsu.toLowerCase().match(this.buscar.toLowerCase().trim())
          });
        },
        filtrarBancos(){
          if (this.banco === '') {
            return this.resultados
            
          }
            let result
            if (this.banco === 'B1-FUNCIONES MATEMÁTICAS') {
                result = this.resultados.filter( resultados => resultados.equipotsu.carreras.carrera2 === "Tecnologías de la información" || resultados.equipotsu.carreras.carrera2 === "Mantenimiento industrial");
            }else if (this.banco === 'B2-ESTADÍSTICA') {
              result = this.resultados.filter( resultados => resultados.equipotsu.carreras.carrera2 === "Turismo" || resultados.equipotsu.carreras.carrera2 === "Gastronomía" || resultados.equipotsu.carreras.carrera2 === "Administración");
            }

            return result
        }
    
  }
})