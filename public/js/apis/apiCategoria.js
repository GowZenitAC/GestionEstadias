var ruta = document.querySelector("[name=route]").value;
// var apiProductoc = ruta + '/apiProductoc';  

new Vue({
    http: {
        headers: {
          'X-CSRF-TOKEN': document.querySelector('#token').getAttribute('value')
        }
      },
      el:"#categorias",

      data:{
          titulo:'Categorías',
      },

      //funcion que se usa cuando se crea la pagina
      
      methods:{
        mostrarModal:function(){
             
            $('#modalCategorias').modal('show');
          },

        

      },
      //FIN DE METHODS

      computed:{
    
  }
})