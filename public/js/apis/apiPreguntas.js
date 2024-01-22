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
                .then(function (json) {
                    this.obtenerpregunta();
                });
            $("#modalPreguntas").modal("hide");
        },
        eliminarpregunta: function (id) {
            var confir = confirm("Desaea eliminar?");

            if (confir) {
                this.$http
                    .delete(apiPreguntas + "/" + id)
                    .then(function (json) {
                        this.obtenerpregunta();
                    })
                    .catch(function (json) {
                        console.log(json);
                    });
            }
        },
        guardarpregunta: function () {
            var pregunta = {
                pregunta: this.pregunta,
                category_id: this.category_id,
            };
            this.$http
                .post(apiPreguntas, pregunta)
                .then(function (json) {
                    this.obtenerpregunta();
                    this.pregunta = "";
                })
                .catch(function (json) {
                    console.log(pregunta);
                });
            $("#modalPreguntas").modal("hide");
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
