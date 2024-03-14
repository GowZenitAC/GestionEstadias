@extends('layout.app')
@section('titulo','Opciones TSU')
@section('contenido')

<!-- INICIA VUE -->
<div id="opcionTSU">
    <!--inicio de card-->

    <div class="col-12 mb-4">
        <div class="card border-0 shadow">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h2 class="fs-5 fw-bold mb-0">@{{titulo}}</h2>
                    </div>
                    <div class="col text-end">
                        <!-- Button Modal -->
                        <button @click="mostrarModal()" type="button" class="btn btn-block btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#modalSignIn">Agregar opciones</button>
                        <!-- Modal Content -->

                    </div>
                </div>
            </div>
            <!-- inicio de tabla -->
            <div class="table-responsive">
                <table class="table table-centered table-nowrap mb-0 rounded">
                    <thead class="thead-light">
                        <tr>
                            <!-- <th class="border-0 rounded-start">ID</th> -->
                            <th class="border-0 rounded-start">Opciones</th>
                            <th class="border-0 rounded-start">Puntos</th>
                            <th class="border-0 rounded-start">Pregunta</th>
                            <th class="border-0 rounded-start">Editar</th>
                            <th class="border-0 rounded-end">Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Item -->
                        <tr v-for="option in filtroOpciones">
                        <th><span v-html="renderOption(option.optiontsu)"></span></th>
                            <!-- <th>@{{option.optiontsu}}</th> -->
                            <th>@{{option.puntostsu}}</th>
                            <th><span v-html="renderQuestion(option.preguntas_t_s_u.pregunta)"></span></th>
                            <!-- <th>@{{option.preguntas_t_s_u.pregunta}}</th> -->
                            <th><button class="btn" @click="editandoOpciones(option.id)">

                                    <i class="fa-duotone fa-pen-to-square fa-xl"></i>
                                </button></th>
                            <th><button class="btn" @click="eliminarOpciones(option.id)">

                                    <i class="fa-duotone fa-trash fa-xl"></i>
                                </button></th>
                        </tr>

                        <!-- End of Item -->
                    </tbody>
                </table>
            </div>
            <!-- fin de tabla -->
        </div>
    </div>
    <!-- fin de card -->
    <!-- modal inicio -->
    <!-- Button Modal -->
    <!-- Modal Content -->
    <!-- INICIA VENTANA MODAL -->
    <div class="modal fade" id="modalOpciones" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel" v-if="agregando==true">Agregar opción</h5>
                    <h5 class="modal-title" id="exampleModalLabel" v-if="agregando==false">Editar opción</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

                    </button>
                </div>
                <div class="modal-body">
                    <span>Opción:</span>
                    <input type="text" class="form-control my-2" placeholder="Opción" v-model="optiontsu">
                    <span>Puntos:</span>
                    <input type="text" class="form-control my-2" placeholder="Puntos" v-model="puntostsu">
                    <span>Pregunta:</span>
                    <select class="form-select" v-model="pregunta_tsu_id" aria-label="Default select example">
                        <option selected>Open this select menu</option>
                        <option v-for="question in tsu_questions" :value="question.id">@{{question.pregunta}}</option>
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary text-gray ms-auto" data-bs-dismiss="modal">Cerrar</button>

                    <button type="button" class="btn btn-primary" @click="guardarOpciones()" v-if="agregando==true">Guardar</button>

                    <button type="button" class="btn btn-primary" @click="actualizarOpciones()" v-if="agregando==false">Guardar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- FIN MODAL -->

    <!-- End of Modal Content -->
    <!-- modal final -->
</div>
<!-- TERMINA VUE -->


@endsection

@push('scripts')
<script type="text/javascript" src="js/vue-resource.js"></script>
<script type="text/javascript" src="js/apis/apiOpcionesTSU.js"></script>

@endpush

<input type="hidden" name="route" value="{{url('/')}}">