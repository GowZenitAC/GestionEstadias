@extends('layout.app')
@section('titulo','Resultados')
@section('contenido')

<!-- INICIA VUE -->
<div id="resultados">
    <!--inicio de card-->
    <div class="col-12 mb-4">
        <div class="card border-0 shadow">
        <div class="card-header">
                <h6>Resultados</h6>
                <div class="row align-items-center">
                    <div class="col">
                        <p>Cambiar por tabla o grafica:</p>
                    </div>
                    <div class="col text-end">
                        <!-- select de tablas y graficas -->
                        <select id="selectorVista" class="form-select my-2">
                            <option value="tabla">Ver tabla</option>
                            <option value="grafica">Ver gráfica</option>
                        </select>
                        <!-- fin select de tablas y graficas -->

                    </div>
                </div>
            </div>
            <!-- inicio de grafica -->
            <div class="row">
                <div class="col-12 mb-4" id="graficaResultados">
                    <div class="card bg-yellow-100 border-0 shadow">
                        <div class="card-body p-2">
                            <!-- area amarilla -->
                            <canvas id="myChart"></canvas>
                        </div>
                    </div>
                </div>
                
            </div>
            <!-- fin de grafica -->
            <div id="tablaResultados">
                <!-- inicio de tabla -->
            <div class="table-responsive">
                <table class="table table-centered table-nowrap mb-0 rounded">
                    <thead class="thead-light">
                        <tr>
                            <th class="border-0 rounded-start">Equipo</th>
                            <th class="border-0">Puntos</th>
                            <th class="border-0">Tiempo</th>
                            <!-- <th class="border-0">Editar</th>
                            <th class="border-0 rounded-end">Eliminar</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Item -->
                        <tr v-for="resultado in resultados">
                            <th>@{{ resultado.equipo.nombre}}</th>
                            <th>@{{ resultado.puntos}}</th>
                            <th>@{{ resultado.tiempo}}</th>
                            <!-- <th><button class="btn" @click="editandoResultados(resultado.id)">
									
									<i class="fa-duotone fa-pen-to-square fa-xl"></i>
								</button></th>
                            <th><button class="btn" @click="eliminarResultados(resultado.id)">
									
									<i class="fa-duotone fa-trash fa-xl"></i>
								</button></th> -->
                        </tr>
                        
                        <!-- End of Item -->
                    </tbody>
                </table>
            </div>
            <!-- fin de tabla -->
            </div>
            
        </div>
    </div>
    <!-- fin de card -->
    <!-- modal inicio -->
    <!-- Button Modal -->
<!-- Modal Content -->
<!-- INICIA VENTANA MODAL -->
<div class="modal" id="modalResultados" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" v-if="agregando==true">Agregar resultado</h5>
        <h5 class="modal-title" id="exampleModalLabel" v-if="agregando==false">Editar resultado</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
          
        </button>
      </div>
      <div class="modal-body">
     
        Nombre del equipo:
        <input type="text" class="form-control" placeholder="Nombre del equipo" v-model="id_equipo"><br>
        puntos:
        <input type="text" class="form-control" placeholder="puntos" v-model="puntos"><br>
        tiempo:
        <input type="time" class="form-control" placeholder="tiempo" v-model="tiempo"><br>
      </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-primary text-gray ms-auto" data-bs-dismiss="modal">Cerrar</button>
       
        <button type="button" class="btn btn-primary" @click="guardarResultados()" v-if="agregando==true && id_equipo.trim() !== ''">Guardar</button>

        <button type="button" class="btn btn-primary" @click="actualizarResultados()" v-if="agregando==false && id_equipo.trim() !== ''">Guardar</button>
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
<script type="text/javascript" src="js/chart.min.js"></script>
<script type="text/javascript" src="js/vue-resource.js"></script>
<script type="text/javascript" src="js/apis/apiResultados.js"></script>
<script type="module" src="js/resultados.js"></script>

<script>
    // Espera a que se cargue el DOM antes de ejecutar el script
    document.addEventListener("DOMContentLoaded", function() {
        // Obtiene el valor inicial del selector
        var seleccionInicial = document.getElementById("selectorVista").value;

        // Muestra la gráfica o la tabla según el valor inicial del selector
        if (seleccionInicial === "tabla") {
            document.getElementById("tablaResultados").style.display = "block";
            document.getElementById("graficaResultados").style.display = "none";
        } else if (seleccionInicial === "grafica") {
            document.getElementById("tablaResultados").style.display = "none";
            document.getElementById("graficaResultados").style.display = "block";
        }

        // Agrega un evento de cambio al selector
        document.getElementById("selectorVista").addEventListener("change", function() {
            var seleccion = this.value;
            if (seleccion === "tabla") {
                document.getElementById("tablaResultados").style.display = "block";
                document.getElementById("graficaResultados").style.display = "none";
            } else if (seleccion === "grafica") {
                document.getElementById("tablaResultados").style.display = "none";
                document.getElementById("graficaResultados").style.display = "block";
            }
        });
    });
</script>




@endpush

<input type="hidden" name="route" value="{{url('/')}}">