@extends('layout.app')
@section('titulo','Carreras')
@section('contenido')

<!-- INICIA VUE -->
<div id="carreras">
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
<button @click="mostrarModal()" type="button" class="btn btn-block btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#modalSignIn">Agregar carrera</button>
<!-- Modal Content -->
                       
                    </div>
                </div>
            </div>
            <!-- inicio de tabla -->
            <div class="table-responsive">
                <table class="table table-centered table-nowrap mb-0 rounded">
                    <thead class="thead-light">
                        <tr>
                            <th class="border-0 rounded-start">Carrera</th>
                            <th class="border-0">Editar</th>
                            <th class="border-0 rounded-end">Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Item -->
                        <tr v-for="carrera in filtroCarrera">
                            <th>@{{carrera.carrera}}</th>
                            <th><button class="btn" @click="editandoCarrera(carrera.id)">
									<!-- <i class="fa-solid fa-file-pen"></i> -->
									<i class="fa-duotone fa-pen-to-square fa-xl"></i>
								</button></th>
                            <th><button class="btn" @click="eliminarCarrera(carrera.id)">
									<!-- <i class="fas fa-trash-alt"></i> -->
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
<div class="modal" id="modalCarreras" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" v-if="agregando==true">Agregar Carrera</h5>
        <h5 class="modal-title" id="exampleModalLabel" v-if="agregando==false">Editar Carrera</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
          
        </button>
      </div>
      <div class="modal-body">
     
        Nombre de la carrera:
        <input type="text" class="form-control" placeholder="Nombre de la carrera" v-model="carrera"><br>
      </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-primary text-gray ms-auto" data-bs-dismiss="modal">Cerrar</button>
       
        <button type="button" class="btn btn-primary" @click="guardarCarrera()" v-if="agregando==true && carrera.trim() !== ''">Guardar</button>

        <button type="button" class="btn btn-primary" @click="actualizarCarrera()" v-if="agregando==false && carrera.trim() !== ''">Guardar</button>
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
<script type="text/javascript" src="js/apis/apiCarreras.js"></script>

@endpush

<input type="hidden" name="route" value="{{url('/')}}">