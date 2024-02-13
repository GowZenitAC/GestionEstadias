@extends('layout.app')
@section('titulo','Resultados TSU')
@section('contenido')

<!-- INICIA VUE -->
<div id="resultadostsu">
    <!--inicio de card-->
    <div class="col-12 mb-4">
        <div class="card border-0 shadow">
            <div class="card-header">
                <h6>Resultados TSU</h6>
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
                            <!-- area amarilla y grafica chart-->
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

                            </tr>
                        </thead>
                        <tbody>
                            <!-- Item -->
                            <tr v-for="resultado in resultados">
                                <th>@{{ resultado.equipotsu.nombretsu}}</th>
                                <th>@{{ resultado.puntostsu}}</th>
                                <th>@{{ resultado.tiempotsu}}</th>
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
</div>
<!-- TERMINA VUE -->
@endsection
@push('scripts')
<script type="text/javascript" src="js/chart.min.js"></script>
<script type="text/javascript" src="js/vue-resource.js"></script>
<script type="text/javascript" src="js/apis/apiResultadosTSU.js"></script>
<script type="module" src="js/resultadosTSU.js"></script>

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