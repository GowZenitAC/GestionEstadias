var ruta = document.querySelector("[name=route]").value;
 var apiequipoTSU = ruta + '/apiEquiposTSU';  
 var apiCarreras = ruta + '/apiCarrerasDos';

 new Vue({
    http: {
        headers: {
          'X-CSRF-TOKEN': document.querySelector('#token').getAttribute('value')
        }
    },

    el:'#equipotsu',
    data:{
        titulo:'EQUIPOS TSU',
        id:'',
        nombretsu:'',
        puntuacion:'',
        id_carrera:'',
        carreras:[],
        equipos:[],
        agregando:true
    },
    created:function(){
        this.obtenerequipo();
        this.obtenerCarreras();
    },
    methods:{

        obtenerequipo: function(){
            this.$http.get(apiequipoTSU).then(function(json){
              this.equipos=json.data;
              console.log(json.data)
            }).catch(function(json){
                console.log.apply(json);
              });
        },
        obtenerCarreras(){
            this.$http.get(apiCarreras).then(function(json){
              this.carreras=json.data;
              console.log(json.data)
            }).catch(function(json){
                console.log(json);
              });
        },
        mostrarModal:function(){
          this.agregando=true;
           this.nombretsu='';
           this.id_carrera='';
           $('#modalEquipos').modal('show');
         },
          
         editandoequipo:function(id){
          this.agregando=false;
          this.id=id;
          this.$http.get(apiequipoTSU + '/' + id).then(function(json){ 
            this.nombretsu=json.data.nombretsu;
            this.id_carrera=json.data.id_carrera;
          });
          $('#modalEquipos').modal('show');
         },

         actualizarequipo: function () {
          var jsonequipo = { nombretsu: this.nombretsu, id_carrera: this.id_carrera };
      
          this.$http.patch(apiequipoTSU + '/' + this.id, jsonequipo)
              .then(function (json) {
                  this.obtenerequipo();
      
                  // Display success alert using SweetAlert2
                  Swal.fire({
                      icon: 'success',
                      title: 'Equipo actualizado',
                      text: 'El equipo se actualizó correctamente.'
                  });
              })
              .catch(function (json) {
                  console.log(json);
      
                  // Display error alert using SweetAlert2
                  Swal.fire({
                      icon: 'error',
                      title: 'Error al actualizar',
                      text: 'Hubo un error al intentar actualizar el equipo.'
                  });
              });
      
          $('#modalEquipos').modal('hide');
      },
        //  actualizarequipo:function(){
        //   var jsonequipo = {nombre:this.nombre};
        //   this.$http.patch(apiequipo + '/' + this.id,jsonequipo).then(function(json){
        //     this.obtenerequipo();
        //   });
        //   $('#modalEquipos').modal('hide');
        // },

        eliminarequipo: function (id) {
          // Use SweetAlert2 for confirmation
          Swal.fire({
              title: '¿Desea eliminar?',
              text: 'Esta acción no se puede deshacer.',
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#d33',
              cancelButtonColor: '#3085d6',
              confirmButtonText: 'Sí, eliminarlo'
          }).then((result) => {
              if (result.isConfirmed) {
                  // User confirmed, proceed with deletion
                  this.$http.delete(apiequipoTSU + '/' + id)
                      .then(function (json) {
                          this.obtenerequipo();
      
                          // Display success alert using SweetAlert2
                          Swal.fire({
                              icon: 'success',
                              title: 'Equipo eliminado',
                              text: 'El equipo se eliminó correctamente.'
                          });
                      })
                      .catch(function (json) {
                          console.log(json);
      
                          // Display error alert using SweetAlert2
                          Swal.fire({
                              icon: 'error',
                              title: 'Error al eliminar',
                              text: 'Hubo un error al intentar eliminar el equipo.'
                          });
                      });
              }
          });
      },
        // eliminarequipo:function(id){
        //   var confir = confirm('Desaea eliminar?');
          
        //   if (confir){
        //     this.$http.delete(apiequipo + '/' + id).then(function(json){
        //       this.obtenerequipo();
        //     }).catch(function(json){
        //       console.log(json);
        //     });
        //   }
        // },

        guardarequipo: function () {
          var equipos = {
              nombretsu: this.nombretsu,
              id_carrera: this.id_carrera
          };
      
          this.$http.post(apiequipoTSU, equipos)
              .then(function (json) {
                  this.obtenerequipo();
                  this.nombretsu = '';
                  this.id_carrera = '';
      
                  // Display success alert using SweetAlert2
                  Swal.fire({
                      icon: 'success',
                      title: 'Equipo guardado',
                      text: 'El equipo se guardó exitosamente.'
                  });
              })
              .catch(function (json) {
                  console.log(equipos);
      
                  // Display error alert using SweetAlert2
                  Swal.fire({
                      icon: 'error',
                      title: 'Error al guardar',
                      text: 'Hubo un error al intentar guardar el equipo.'
                  });
              });
      
          $('#modalEquipos').modal('hide');
      },


        //  guardarequipo:function(){
        //   var equipos = {
        //     nombre:this.nombre
        //   };
        //   this.$http.post(apiequipo,equipos).then(function(json){
        //     this.obtenerequipo();
        //     this.nombre='';
        //   }).catch(function(json){
        //     console.log(equipos);
        //   });
        //   $('#modalEquipos').modal('hide');
        //  },
        


    },
    
 })