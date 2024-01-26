var ruta = document.querySelector("[name=route]").value;
  var apiOpcionesTSU = ruta + '/apiOpcionesTSU';  

new Vue({
    http: {
        headers: {
          'X-CSRF-TOKEN': document.querySelector('#token').getAttribute('value')
        }
      },
      el:"#opcionTSU",

      data:{
         agregando:true,
         titulo:'Opciones TSU',
         id:'',
         optiontsu:'',
         puntostsu:'',
         buscar:'',
         opciones:[],
          
      },

      created:function(){
        this.obtenerOpciones();
      },

      methods:{

        obtenerOpciones:function(){
            this.$http.get(apiOpcionesTSU).then(function(json){
                this.opciones=json.data;
                console.log(json.data)
            }).catch(function(json){
                console.log(json);
            });
        },

        mostrarModal:function(){
            this.agregando=true;
            this.optiontsu='';
            $('#modalOpciones').modal('show');
        },

        editandoOpciones:function(id){
            this.agregando=false;
            this.id=id;
            this.$http.get(apiOpcionesTSU + '/' + id).then(function(json){
                this.optiontsu=json.data.optiontsu;
                console.log(this.optiontsu);
            });
            $('#modalOpciones').modal('show');
        },

        actualizarOpciones: function () {
            var jsonOpciones = {
                optiontsu: this.optiontsu,
                puntostsu: this.puntostsu
            };
        
            this.$http.patch(apiOpcionesTSU + '/' + this.id, jsonOpciones)
                .then(function (json) {
                    this.obtenerOpciones();
                    
                    // Muestra un SweetAlert de éxito
                    Swal.fire({
                        title: '¡Actualización exitosa!',
                        text: 'La opción se ha actualizado correctamente.',
                        icon: 'success',
                        confirmButtonText: 'OK'
                    });
        
                    // Cierra el modal después de la actualización exitosa
                    $('#modalOpciones').modal('hide');
                })
                .catch(function (error) {
                    // Manejo de errores, puedes agregar un SweetAlert de error si lo deseas
                    console.error('Error al actualizar opciones:', error);
                    Swal.fire({
                        title: 'Error',
                        text: 'Hubo un error al actualizar la opción.',
                        icon: 'error',
                        confirmButtonText: 'OK'
                    });
                });
        },

        eliminarOpciones: function(id) {
            // Muestra un SweetAlert de confirmación
            Swal.fire({
                title: '¿Estás seguro?',
                text: 'Esta acción no se puede deshacer.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Sí, eliminar'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Si el usuario confirma, procede con la eliminación
                    this.$http.delete(apiOpcionesTSU + '/' + id)
                        .then(function(json) {
                            // Muestra un SweetAlert de éxito
                            Swal.fire({
                                title: 'Eliminado',
                                text: 'La opción ha sido eliminada correctamente.',
                                icon: 'success',
                                confirmButtonText: 'OK'
                            });
        
                            // Actualiza la lista de opciones después de la eliminación
                            this.obtenerOpciones();
                        })
                        .catch(function(error) {
                            // Muestra un SweetAlert de error en caso de fallo
                            console.error('Error al eliminar opción:', error);
                            Swal.fire({
                                title: 'Error',
                                text: 'Hubo un error al eliminar la opción.',
                                icon: 'error',
                                confirmButtonText: 'OK'
                            });
                        });
                }
            });
        },

        guardarOpciones: function() {
            var opciones = {
                optiontsu: this.optiontsu,
                puntostsu: this.puntostsu
            };
        
            this.$http.post(apiOpcionesTSU, opciones)
                .then(function(json) {
                    // Muestra un SweetAlert de éxito
                    Swal.fire({
                        title: 'Guardado exitoso',
                        text: 'La opción se ha guardado correctamente.',
                        icon: 'success',
                        confirmButtonText: 'OK'
                    });
        
                    // Actualiza la lista de opciones después de guardar
                    this.obtenerOpciones();
                    
                    // Limpia los campos después de guardar
                    this.optiontsu = '';
                    this.puntostsu = '';
                })
                .catch(function(error) {
                    // Muestra un SweetAlert de error en caso de fallo
                    console.error('Error al guardar opción:', error);
                    Swal.fire({
                        title: 'Error',
                        text: 'Hubo un error al guardar la opción.',
                        icon: 'error',
                        confirmButtonText: 'OK'
                    });
                });
        
            // Cierra el modal después de guardar
            $('#modalOpciones').modal('hide');
        },

        // actualizarOpciones:function(){
        //     var jsonOpciones = {option:this.option,
        //                         puntos:this.puntos};
        //     this.$http.patch(apiOpciones + '/' + this.id,jsonOpciones).then(function(json){
        //         this.obtenerOpciones();
        //     });
        //     $('#modalOpciones').modal('hide');
        // },

        // eliminarOpciones:function(id){
        //   var confir = confirm('eliminar?');
        //   if (confir){
        //     this.$http.delete(apiOpciones + '/' + id).then(function(json){
        //         this.obtenerOpciones();
        //     }).catch(function(json){
        //         console.log(json);
        //     });
        //   }  
        // },

        // guardarOpciones:function(){
        //     var opciones = {
        //         option:this.option,
        //         puntos:this.puntos
        //     };
        //     this.$http.post(apiOpciones,opciones).then(function(json){
        //         this.obtenerOpciones();
        //         this.option='';
        //         this.puntos='';
        //     }).catch(function(json){
        //         console.log(opciones);
        //     });
        //     $('#modalOpciones').modal('hide');
        // }, 

      },
      //FIN DE METHODS

      computed:{

        filtroOpciones:function(){
            return this.opciones.filter((opciones)=>{
                return opciones.optiontsu.toLowerCase().match(this.buscar.toLowerCase().trim())
            });
        },  
  }
})