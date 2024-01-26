var ruta = document.querySelector("[name=route]").value;
var apiPreguntasTSU = ruta + "/apiPreguntasTSU";
let apiCategoryTSU = ruta + "/apiCategoryTSU";

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
        preguntatsu: "",
        buscar: "",
        preguntas: [],
        categories: [],
        category_t_s_u_id: "",
        imagen_preguntatsu: "",
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

        mostrarModal: function () {
            this.agregando = true;
            this.preguntatsu = "";
            this.category_t_s_u_id = "";
            this.imagen_preguntatsu = "";
            $("#modalPreguntas").modal("show");
        },

        editandopregunta: function (id) {
            this.agregando = false;
            this.id = id;
            this.$http.get(apiPreguntasTSU + "/" + id).then(function (json) {
                this.preguntatsu = json.data.preguntatsu;
                this.category_t_s_u_id = json.data.category_t_s_u_id;
                this.imagen_preguntatsu= json.data.imagen_preguntatsu;
            });
            $("#modalPreguntas").modal("show");
        },
        actualizarpregunta: function () {
            var jsonpregunta = {
                id: this.id,
                preguntatsu: this.preguntatsu,
                category_t_s_u_id: this.category_t_s_u_id,
                imagen_preguntatsu: this.imagen_preguntatsu,
            };
            this.$http
                .patch(apiPreguntasTSU + "/" + this.id, jsonpregunta)
                .then(function (json) {
                    this.obtenerpregunta();
                });
            $("#modalPreguntas").modal("hide");
        },
        eliminarpregunta: function (id) {
            var confir = confirm("Desaea eliminar?");

            if (confir) {
                this.$http
                    .delete(apiPreguntasTSU + "/" + id)
                    .then(function (json) {
                        this.obtenerpregunta();
                    })
                    .catch(function (json) {
                        console.log(json);
                    });
            }
        },
        cargarImagen(e){
            this.imagen_preguntatsu = e.target.files[0];
        },
        guardarpregunta: function () {
            const preguntatsu = new FormData();
            preguntatsu.append("preguntatsu", this.preguntatsu);
            preguntatsu.append("category_t_s_u_id", this.category_t_s_u_id);
            preguntatsu.append("imagen_preguntatsu", this.imagen_preguntatsu);
            this.$http
                .post(apiPreguntasTSU, preguntatsu,)
                .then(function (json) {
                    this.obtenerpregunta();
                    this.preguntatsu = "";
                    this.category_t_s_u_id = "";
                    this.imagen_preguntatsu = "";
                })
                .catch(function (json) {
                    console.log(preguntatsu);
                });
            $("#modalPreguntas").modal("hide");
        },
    },

    computed: {
      
    },
});
