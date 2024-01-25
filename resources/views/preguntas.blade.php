@extends('layout.app')
@section('titulo','preguntas')
@section('contenido')

<!-- INICIA VUE -->
<div id="preguntas">
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
<button @click="mostrarModal()" type="button" class="btn btn-block btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#modalSignIn">Agregar pregunta</button>
<!-- Modal Content -->
                       
                    </div>
                </div>
            </div>
            <!-- inicio de tabla -->
            <div class="table-responsive">
                <table class="table table-centered table-nowrap mb-0 rounded">
                    <thead class="thead-light">
                        <tr>
                            <th class="border-0 rounded-start">Pregunta</th>
                            <th class="border-0 rounded-start">Categoría</th>
                            <th class="border-0 rounded-start">Imagen</th>
                            <th class="border-0">Editar</th>
                            <th class="border-0 rounded-end">Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Item -->
                        <tr v-for="question in filtroPreguntas">
                            <th>@{{question.pregunta}}</th>
                            <th>@{{question.category.name}}</th>
                            <th><img :src="question.imagen_pregunta" width="50"></th>
                            <th><button class="btn" @click="editandopregunta(question.id)">
									<!-- <i class="fa-solid fa-file-pen"></i> -->
									<i class="fa-duotone fa-pen-to-square"></i>
								</button></th>
                            <th><button class="btn" @click="eliminarpregunta(question.id)">
									<!-- <i class="fas fa-trash-alt"></i> -->
									<i class="fa-duotone fa-trash"></i>
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
<div class="modal fade" id="modalPreguntas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" v-if="agregando==true">Agregar pregunta</h5>
        <h5 class="modal-title" id="exampleModalLabel" v-if="agregando==false">Editar pregunta</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
          
        </button>
      </div>
      <div class="modal-body">
        <span>Pregunta:</span>
        <input type="text" class="form-control my-2" placeholder="escribe pregunta" v-model="pregunta">
        <span>Imagen (Opcional):</span>
        <input type="file" :v-model="imagen_pregunta" @change="cargarImagen" src="" class="form-control my-2" alt="">
        <span>Categoría:</span>
        <select name="" v-model="category_id" class="form-select my-2" id="">
            <option selected value="">Selecciona una categoria</option>
            <option v-for="category in categories" :value="category.id">@{{category.name}}</option>
        </select>
      </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-primary text-gray ms-auto" data-bs-dismiss="modal">Cerrar</button>
        <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button> -->
        <button type="button" class="btn btn-primary" @click="guardarpregunta()" v-if="agregando==true">Guardar</button>

        <button type="button" class="btn btn-primary" @click="actualizarpregunta()" v-if="agregando==false">Guardar</button>
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
<script type="text/javascript" src="js/apis/apiPreguntas.js"></script>

@endpush

<input type="hidden" name="route" value="{{url('/')}}">