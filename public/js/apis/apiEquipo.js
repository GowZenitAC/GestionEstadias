var ruta = document.querySelector("[name=route]").value;
 var apiequipo = ruta + '/apiEquipos';  

 new Vue({
    http: {
        headers: {
          'X-CSRF-TOKEN': document.querySelector('#token').getAttribute('value')
        }
    },

    el:'#equipo',
    data:{
        titulo:'EQUIPOS',
        id:'',
        nombre:'',
        puntuacion:'',
        equipos:[],
        agregando:true
    },
    created:function(){
        this.obtenerequipo();
    },
    methods:{

        obtenerequipo: function(){
            this.$http.get(apiequipo).then(function(json){
              this.equipos=json.data;
              console.log(json.data)
            }).catch(function(json){
                console.log.apply(json);
              });
        },
        mostrarModal:function(){
          this.agregando=true;
           this.nombre='';
           $('#modalEquipos').modal('show');
         },
          
         editandoequipo:function(id){
          this.agregando=false;
          this.id=id;
          this.$http.get(apiequipo + '/' + id).then(function(json){ 
            this.nombre=json.data.nombre;
          });
          $('#modalEquipos').modal('show');
         },

         actualizarequipo: function () {
          var jsonequipo = { nombre: this.nombre };
      
          this.$http.patch(apiequipo + '/' + this.id, jsonequipo)
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
                  this.$http.delete(apiequipo + '/' + id)
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
              nombre: this.nombre
          };
      
          this.$http.post(apiequipo, equipos)
              .then(function (json) {
                  this.obtenerequipo();
                  this.nombre = '';
      
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