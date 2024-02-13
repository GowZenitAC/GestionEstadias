@extends('layout.app')
@section('titulo','Equipos TSU')
@section('contenido')
<div id="equipotsu">
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
<button @click="mostrarModal()" type="button" class="btn btn-block btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#modalSignIn">Agregar equipo</button>
<!-- Modal Content -->
                       
                    </div>
                </div>
            </div>
            <!-- inicio de tabla -->
            <div class="table-responsive">
                <table class="table table-centered table-nowrap mb-0 rounded">
                    <thead class="thead-light">
                        <tr>
                       
                            <th class="border-0 rounded-start">equipo</th>
                            <th class="border-0">Editar</th>
                            <th class="border-0 rounded-end">Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Item -->
                        <tr v-for="equipo in equipos">
                       
                            <th>@{{equipo.nombretsu}}</th>
                            
                            <th><button class="btn" @click="editandoequipo(equipo.id)">
									<!-- <i class="fa-solid fa-file-pen"></i> -->
									<i class="fa-duotone fa-pen-to-square"></i>
								</button></th>
                            <th><button class="btn" @click="eliminarequipo(equipo.id)">
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
<div class="modal fade" id="modalEquipos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" v-if="agregando==true">Agregar equipo</h5>
        <h5 class="modal-title" id="exampleModalLabel" v-if="agregando==false">Editar equipo</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
          
        </button>
      </div>
      <div class="modal-body">
        <span>Escriba el equipo:</span>
        <input type="text" class="form-control my-2" placeholder="escribe nombre" v-model="nombretsu"><br>
        
      </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-primary text-gray ms-auto" data-bs-dismiss="modal">Cerrar</button>
        <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button> -->
        <button type="button" class="btn btn-primary" @click="guardarequipo()" v-if="agregando==true">Guardar</button>

        <button type="button" class="btn btn-primary" @click=" actualizarequipo()" v-if="agregando==false">Guardar</button>
      </div>
    </div>
  </div>
</div>
<!-- FIN MODAL -->

<!-- End of Modal Content -->
    <!-- modal final -->
</div>

@endsection

@push('scripts')
<script type="text/javascript" src="js/vue-resource.js"></script>
<script type="text/javascript" src="js/apis/apiEquipoTSU.js"></script>

@endpush

<input type="hidden" name="route" value="{{url('/')}}">