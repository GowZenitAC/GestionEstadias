var ruta = document.querySelector("[name=route]").value;
var apiPreguntasTSU = ruta + "/apiPreguntasTSU";
let apiCategoryTSU = ruta + "/apiCategoryTSU";
let apiCarreras = ruta + "/apiCarreras";

new Vue({
    http: {
        headers: {
            "X-CSRF-TOKEN": document
                .querySelector("#token")
                .getAttribute("value"),
        },
    },
    el: "#preguntastsu",

    data: {
        titulo: "Preguntas TSU",
        id: "",
        pregunta: "",
        buscar: "",
        preguntas: [],
        categories: [],
        carreras:[],
        category_t_s_u_id: "",
        carreras_id: "",
        imagen_preguntatsu: "",
        agregando: true,
    },

    created: function () {
        this.obtenerpregunta();
        this.getCategories();
        this.getCarreras();
    },
    //funcion que se usa cuando se crea la pagina
    methods: {
        obtenerpregunta: function () {
            this.$http
                .get(apiPreguntasTSU)
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
                .get(apiCategoryTSU)
                .then(function (json) {
                    this.categories = json.data;
                    console.log(json.data);
                })
                .catch(function (json) {
                    console.log(json);
                });
        },
        getCarreras() {
            this.$http
                .get(apiCarreras)
                .then(function (json) {
                    this.carreras = json.data;
                    console.log(json.data);
                })
                .catch(function (json) {
                    console.log(json);
                });
        },

        mostrarModal: function () {
            this.agregando = true;
            this.preguntatsu = "";
            this.category_t_s_u_id = "";
            this.carreras_id = "";
            this.imagen_preguntatsu = "";
            $("#modalPreguntas").modal("show");
        },

        editandopregunta: function (id) {
            this.agregando = false;
            this.id = id;
            this.$http.get(apiPreguntasTSU + "/" + id).then(function (json) {
                this.pregunta = json.data.pregunta;
                this.category_t_s_u_id = json.data.category_t_s_u_id;
                this.carreras_id = json.data.carreras_id;
                this.imagen_preguntatsu= json.data.imagen_preguntatsu;
            });
            $("#modalPreguntas").modal("show");
        },

        actualizarpregunta: function () {
            var jsonpregunta = {
                id: this.id,
                pregunta: this.pregunta,
                category_t_s_u_id: this.category_t_s_u_id,
                carreras_id: this.carreras_id,
                imagen_preguntatsu: this.imagen_preguntatsu,
            };
        
            this.$http
                .patch(apiPreguntasTSU + "/" + this.id, jsonpregunta)
                .then(function (json) {
                    this.obtenerpregunta();
        
                    // Use SweetAlert2 for success message
                    Swal.fire({
                        icon: 'success',
                        title: 'Pregunta actualizada correctamente!',
                        showConfirmButton: false,
                        timer: 1500
                    });
                })
                .catch(function (error) {
                    console.log(jsonpregunta);
        
                    // Use SweetAlert2 for error message
                    Swal.fire({
                        icon: 'error',
                        title: 'Error al actualizar la pregunta',
                        text: 'Por favor, inténtelo de nuevo.',
                    });
                });
        
            $("#modalPreguntas").modal("hide");
        },

        eliminarpregunta: function (id) {
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
                        .delete(apiPreguntasTSU + "/" + id)
                        .then(function (json) {
                            this.obtenerpregunta();
        
                            // Use SweetAlert2 for success message
                            Swal.fire(
                                'Eliminado',
                                'La pregunta ha sido eliminada correctamente.',
                                'success'
                            );
                        })
                        .catch(function (error) {
                            console.log(error);
        
                            // Use SweetAlert2 for error message
                            Swal.fire(
                                'Error',
                                'Hubo un problema al intentar eliminar la pregunta.',
                                'error'
                            );
                        });
                }
            });
        },
        
        
        // actualizarpregunta: function () {
        //     var jsonpregunta = {
        //         id: this.id,
        //         pregunta: this.pregunta,
        //         category_t_s_u_id: this.category_t_s_u_id,
        //         carreras_id: this.carreras_id,
        //         imagen_preguntatsu: this.imagen_preguntatsu,
        //     };
        //     this.$http
        //         .patch(apiPreguntasTSU + "/" + this.id, jsonpregunta)
        //         .then(function (json) {
        //             this.obtenerpregunta();
        //         });
        //     $("#modalPreguntas").modal("hide");
        // },
        // eliminarpregunta: function (id) {
        //     var confir = confirm("Desaea eliminar?");

        //     if (confir) {
        //         this.$http
        //             .delete(apiPreguntasTSU + "/" + id)
        //             .then(function (json) {
        //                 this.obtenerpregunta();
        //             })
        //             .catch(function (json) {
        //                 console.log(json);
        //             });
        //     }
        // },
        cargarImagen(e){
            this.imagen_preguntatsu = e.target.files[0];
        },

        guardarpregunta: function () {
            const preguntatsu = new FormData();
            preguntatsu.append("pregunta", this.pregunta);
            preguntatsu.append("category_t_s_u_id", this.category_t_s_u_id);
            preguntatsu.append("carreras_id", this.carreras_id);
            preguntatsu.append("imagen_preguntatsu", this.imagen_preguntatsu);
        
            this.$http
                .post(apiPreguntasTSU, preguntatsu,)
                .then(function (json) {
                    this.obtenerpregunta();
                    this.pregunta = "";
                    this.category_t_s_u_id = "";
                    this.carreras_id = "";
                    this.imagen_preguntatsu = "";
        
                    // Use SweetAlert2 for success message
                    Swal.fire({
                        icon: 'success',
                        title: 'Pregunta guardada correctamente!',
                        showConfirmButton: false,
                        timer: 1500
                    });
                })
                .catch(function (error) {
                    console.log(preguntatsu);
        
                    // Use SweetAlert2 for error message
                    Swal.fire({
                        icon: 'error',
                        title: 'Error al guardar la pregunta',
                        text: 'Por favor, inténtelo de nuevo.',
                    });
                });
        
            $("#modalPreguntas").modal("hide");
        },
        renderQuestion(question) {
            // Dividir el texto en palabras
            const words = question.split(/\s+/);
            // Utilizar KaTeX para renderizar cada palabra y agregarla a un array
            const renderedWords = words.map(word => katex.renderToString(word, { throwOnError: false }));
            // Unir las palabras renderizadas con espacios entre ellas
            return renderedWords.join(' ');
        },
        
        // guardarpregunta: function () {
        //     const preguntatsu = new FormData();
        //     preguntatsu.append("pregunta", this.pregunta);
        //     preguntatsu.append("category_t_s_u_id", this.category_t_s_u_id);
        //     preguntatsu.append("carreras_id", this.carreras_id);
        //     preguntatsu.append("imagen_preguntatsu", this.imagen_preguntatsu);
        //     this.$http
        //         .post(apiPreguntasTSU, preguntatsu,)
        //         .then(function (json) {
        //             this.obtenerpregunta();
        //             this.pregunta = "";
        //             this.category_t_s_u_id = "";
        //             this.carreras_id = "";
        //             this.imagen_preguntatsu = "";
        //         })
        //         .catch(function (json) {
        //             console.log(preguntatsu);
        //         });
        //     $("#modalPreguntas").modal("hide");
        // },
    },

    computed: {
      
    },
});
