var ruta = document.querySelector("[name=route]").value;
 var apiPreguntas = ruta + '/apiPreguntas';
 
 new Vue({
    http: {
        headers: {
          'X-CSRF-TOKEN': document.querySelector('#token').getAttribute('value')
        }
      },
      el:"#preguntas",
      
      data:{
        titulo:'Preguntas',
        id:'',
        pregunta:'',
        buscar:'',
        pregunta:[],
    },

    created:function(){
        this.obtenerpregunta();
      },
      //funcion que se usa cuando se crea la pagina
      methods:{

        obtenerpregunta:function(){
          this.$http.get(apiPreguntas).then(function(json){
            this.pregunta=json.data;
            console.log(json.data) 
          }).catch(function(json){
            console.log.apply(json);
          });

        },
      },
      
         mostrarModal:function(){
           this.agregando=true;
            this.pregunta='';
           $('#modalpreguntas').modal('show');
           },

           editandopregunta:function(id){
            this.agregando=false;
            this.id=id;
            this.$http.get(apiPreguntas + '/' + id).then(function(json){
              this.pregunta=json.data.pregunta;
            });
            $('#modalpreguntas').modal('show');
          },
          actualizarpregunta:function(){
            var jsonPregunta = {pregunta:this.pregunta};
            this.$http.patch(apiPregunta + '/' + this.id,jsonPregunta).then(function(json){
              this.obtenerpregunta();
            });
            $('#modalpreguntas').modal('hide');
          },
          eliminarpregunta:function(id){
            var confir = confirm('Desaea eliminar?');
            
            if (confir){
              this.$http.delete(apiPreguntas + '/' + id).then(function(json){
                this.obtenerpregunta();
              }).catch(function(json){
                console.log(json);
              });
            }
          },
          guardarpregunta:function(){
            var pregunta = {
              pregunta:this.pregunta
            };
            this.$http.post(apiPregunta,pregunta).then(function(json){
              this.obtenerpregunta();
              this.pregunta='';
            }).catch(function(json){
              console.log(categories);
            });
            $('#modalPreguntas').modal('hide');
          },



})