var ruta = document.querySelector("[name=route]").value;
var apiPreguntas = ruta + "/apiPreguntas";
let apiCategory = ruta + "/apiCategory";

new Vue({
    http: {
        headers: {
            "X-CSRF-TOKEN": document
                .querySelector("#token")
                .getAttribute("value"),
        },
    },
    el: "#preguntas",

    data: {
        titulo: "Preguntas",
        id: "",
        pregunta: "",
        buscar: "",
        preguntas: [],
        categories: [],
        category_id: "",
        imagen_pregunta: "",
        agregando: true,
    },

    created: function () {
        this.obtenerpregunta();
        this.getCategories();
    },
    //funcion que se usa cuando se crea la pagina
    methods: {
        obtenerpregunta: function () {
            this.$http
                .get(apiPreguntas)
                .then(function (json) {
                    this.preguntas = json.data;
                    console.log(json.data);
                })
                .catch(function (json) {
                    console.log(json);
                });
        },
        getCategories() {
            this.$http
                .get(apiCategory)
                .then(function (json) {
                    this.categories = json.data;
                    console.log(json.data);
                })
                .catch(function (json) {
                    console.log(json);
                });
        },

        mostrarModal: function () {
            this.agregando = true;
            this.pregunta = "";
            this.category_id = "";
            this.imagen_pregunta = "";
            $("#modalPreguntas").modal("show");
        },

        editandopregunta: function (id) {
            this.agregando = false;
            this.id = id;
            this.$http.get(apiPreguntas + "/" + id).then(function (json) {
                this.pregunta = json.data.pregunta;
                this.category_id = json.data.category_id;
            });
            $("#modalPreguntas").modal("show");
        },
        actualizarpregunta: function () {
            var jsonpregunta = {
                id: this.id,
                pregunta: this.pregunta,
                category_id: this.category_id,
            };
        
            this.$http
                .patch(apiPreguntas + "/" + this.id, jsonpregunta)
                .then((json) => {
                    // Manejar éxito de la petición
                    this.obtenerpregunta();
                    // Mostrar SweetAlert de éxito
                    Swal.fire({
                        icon: 'success',
                        title: '¡Pregunta actualizada!',
                        text: 'La pregunta se ha actualizado correctamente.'
                    });
                })
                .catch((error) => {
                    // Manejar error de la petición
                    console.error(error);
                    // Mostrar SweetAlert de error
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Hubo un error al actualizar la pregunta. Por favor, inténtalo de nuevo.'
                    });
                })
                .finally(() => {
                    // Siempre ocultar el modal después de la petición (éxito o error)
                    $("#modalPreguntas").modal("hide");
                });
        },
        // actualizarpregunta: function () {
        //     var jsonpregunta = {
        //         id: this.id,
        //         pregunta: this.pregunta,
        //         category_id: this.category_id,
        //     };
        //     this.$http
        //         .patch(apiPreguntas + "/" + this.id, jsonpregunta)
        //         .then(function (json) {
        //             this.obtenerpregunta();
        //         });
        //     $("#modalPreguntas").modal("hide");
        // },
        // eliminarpregunta: function (id) {
        //     var confir = confirm("Desaea eliminar?");

        //     if (confir) {
        //         this.$http
        //             .delete(apiPreguntas + "/" + id)
        //             .then(function (json) {
        //                 this.obtenerpregunta();
        //             })
        //             .catch(function (json) {
        //                 console.log(json);
        //             });
        //     }
        // },
        eliminarpregunta: function (id) {
            // Utilizamos SweetAlert en lugar de confirm
            Swal.fire({
                title: '¿Desea eliminar la pregunta?',
                text: 'Esta acción no se puede deshacer',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Sí, eliminar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    this.$http
                        .delete(apiPreguntas + "/" + id)
                        .then((json) => {
                            // Manejar éxito de la petición
                            this.obtenerpregunta();
                            // Mostrar SweetAlert de éxito
                            Swal.fire({
                                icon: 'success',
                                title: '¡Pregunta eliminada!',
                                text: 'La pregunta se ha eliminado correctamente.'
                            });
                        })
                        .catch((error) => {
                            // Manejar error de la petición
                            console.error(error);
                            // Mostrar SweetAlert de error
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: 'Hubo un error al eliminar la pregunta. Por favor, inténtalo de nuevo.'
                            });
                        });
                }
            });
        },
        cargarImagen(e){
            this.imagen_pregunta = e.target.files[0];
        },
        // guardarpregunta: function () {
        //     const pregunta = new FormData();
        //     pregunta.append("pregunta", this.pregunta);
        //     pregunta.append("category_id", this.category_id);
        //     pregunta.append("imagen_pregunta", this.imagen_pregunta);
        //     this.$http
        //         .post(apiPreguntas, pregunta,)
        //         .then(function (json) {
        //             this.obtenerpregunta();
        //             this.pregunta = "";
        //             this.category_id = "";
        //             this.imagen_pregunta = "";
        //         })
        //         .catch(function (json) {
        //             console.log(pregunta);
        //         });
        //     $("#modalPreguntas").modal("hide");
        // },
        guardarpregunta: function () {
            const pregunta = new FormData();
            pregunta.append("pregunta", this.pregunta);
            pregunta.append("category_id", this.category_id);
            pregunta.append("imagen_pregunta", this.imagen_pregunta);
        
            this.$http
                .post(apiPreguntas, pregunta)
                .then(function (json) {
                    // Manejar el éxito de la petición
                    this.obtenerpregunta();
                    this.pregunta = "";
                    this.category_id = "";
                    this.imagen_pregunta = "";
                    // Mostrar SweetAlert de éxito
                    Swal.fire({
                        icon: 'success',
                        title: '¡Pregunta guardada!',
                        text: 'La pregunta se ha guardado exitosamente.',
                    });
                })
                .catch(function (error) {
                    // Manejar el error de la petición
                    console.error(error);
                    // Mostrar SweetAlert de error
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Hubo un error al guardar la pregunta. Por favor, inténtalo de nuevo.',
                    });
                })
                .finally(function () {
                    // Siempre ocultar el modal después de la petición (éxito o error)
                    $("#modalPreguntas").modal("hide");
                });
        },
        renderQuestion(question) {
            // Dividir el texto en palabras
            const words = question.split(/\s+/);
            // Utilizar KaTeX para renderizar cada palabra y agregarla a un array
            const renderedWords = words.map(word => katex.renderToString(word, { throwOnError: false }));
            // Unir las palabras renderizadas con espacios entre ellas
            return renderedWords.join(' ');
        },
        renderOption(option) {
            // Dividir el texto de la opción en palabras
            const words = option.split(/\s+/);
            // Utilizar KaTeX para renderizar cada palabra y agregarla a un array
            const renderedWords = words.map(word => katex.renderToString(word, { throwOnError: false }));
            // Unir las palabras renderizadas con espacios entre ellas
            return renderedWords.join(' ');
        },
    },

    computed: {
        // filtropregunta:function(){
        //   return this.pregunta.filter((pregunta)=>{
        //     return pregunta.name.toLowerCase().match(this.buscar.toLowerCase().trim())
        //   });
        // },
    },
});
