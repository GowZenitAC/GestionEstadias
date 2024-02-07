@extends('layout.app')
@section('titulo','Resultados')
@section('contenido')

<!-- INICIA VUE -->
<div id="resultados">
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
<button @click="mostrarModal()" type="button" class="btn btn-block btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#modalSignIn">Agregar resultados</button>
<!-- Modal Content -->
                       
                    </div>
                </div>
            </div>
            <!-- inicio de grafica -->
            <div class="row">
                <div class="col-12 mb-4">
                    <div class="card bg-yellow-100 border-0 shadow">
                        <div class="card-header d-sm-flex flex-row align-items-center flex-0">
                            <div class="d-block mb-3 mb-sm-0">
                                <div class="fs-5 fw-normal mb-2">Resultados</div>
                                <!-- <h2 class="fs-3 fw-extrabold">$10,567</h2> -->
                                <!-- <div class="small mt-2"> 
                                    <span class="fw-normal me-2">Yesterday</span>                              
                                    <span class="fas fa-angle-up text-success"></span>                                   
                                    <span class="text-success fw-bold">10.57%</span>
                                </div> -->
                            </div>
                            
                        </div>
                        <div class="card-body p-2">
                            <!-- area amarilla -->
                            <canvas id="myChart"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-xl-4 mb-4">
                    <div class="card border-0 shadow">
                        <div class="card-body">
                            <div class="row d-block d-xl-flex align-items-center">
                                <div class="col-12 col-xl-5 text-xl-center mb-3 mb-xl-0 d-flex align-items-center justify-content-xl-center">
                                    <div class="icon-shape icon-shape-primary rounded me-4 me-sm-0">
                                        <svg class="icon" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"></path></svg>
                                    </div>
                                    <div class="d-sm-none">
                                        <h2 class="h5">Equipos</h2>
                                        <h3 class="fw-extrabold mb-1">345,678</h3>
                                    </div>
                                </div>
                                <div class="col-12 col-xl-7 px-xl-0">
                                    <div class="d-none d-sm-block">
                                        <h2 class="h6 text-gray-400 mb-0">Equipos</h2>
                                        <h3 class="fw-extrabold mb-2">345k</h3>
                                    </div>
                                    <small class="d-flex align-items-center text-gray-500">
                                        Feb 1 - Apr 1,  
                                        <svg class="icon icon-xxs text-gray-500 ms-2 me-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM4.332 8.027a6.012 6.012 0 011.912-2.706C6.512 5.73 6.974 6 7.5 6A1.5 1.5 0 019 7.5V8a2 2 0 004 0 2 2 0 011.523-1.943A5.977 5.977 0 0116 10c0 .34-.028.675-.083 1H15a2 2 0 00-2 2v2.197A5.973 5.973 0 0110 16v-2a2 2 0 00-2-2 2 2 0 01-2-2 2 2 0 00-1.668-1.973z" clip-rule="evenodd"></path></svg>
                                        USA
                                    </small> 
                                    <div class="small d-flex mt-1">                               
                                        <div>Since last month <svg class="icon icon-xs text-success" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z" clip-rule="evenodd"></path></svg><span class="text-success fw-bolder">22%</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-xl-4 mb-4">
                    <div class="card border-0 shadow">
                        <div class="card-body">
                            <div class="row d-block d-xl-flex align-items-center">
                                <div class="col-12 col-xl-5 text-xl-center mb-3 mb-xl-0 d-flex align-items-center justify-content-xl-center">
                                    <div class="icon-shape icon-shape-secondary rounded me-4 me-sm-0">
                                        <svg class="icon" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 2a4 4 0 00-4 4v1H5a1 1 0 00-.994.89l-1 9A1 1 0 004 18h12a1 1 0 00.994-1.11l-1-9A1 1 0 0015 7h-1V6a4 4 0 00-4-4zm2 5V6a2 2 0 10-4 0v1h4zm-6 3a1 1 0 112 0 1 1 0 01-2 0zm7-1a1 1 0 100 2 1 1 0 000-2z" clip-rule="evenodd"></path></svg>
                                    </div>
                                    <div class="d-sm-none">
                                        <h2 class="fw-extrabold h5">Puntos</h2>
                                        <h3 class="mb-1">$43,594</h3>
                                    </div>
                                </div>
                                <div class="col-12 col-xl-7 px-xl-0">
                                    <div class="d-none d-sm-block">
                                        <h2 class="h6 text-gray-400 mb-0">Puntos</h2>
                                        <h3 class="fw-extrabold mb-2">$43,594</h3>
                                    </div>
                                    <small class="d-flex align-items-center text-gray-500">
                                        Feb 1 - Apr 1,  
                                        <svg class="icon icon-xxs text-gray-500 ms-2 me-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM4.332 8.027a6.012 6.012 0 011.912-2.706C6.512 5.73 6.974 6 7.5 6A1.5 1.5 0 019 7.5V8a2 2 0 004 0 2 2 0 011.523-1.943A5.977 5.977 0 0116 10c0 .34-.028.675-.083 1H15a2 2 0 00-2 2v2.197A5.973 5.973 0 0110 16v-2a2 2 0 00-2-2 2 2 0 01-2-2 2 2 0 00-1.668-1.973z" clip-rule="evenodd"></path></svg>
                                        GER
                                    </small> 
                                    <div class="small d-flex mt-1">                               
                                        <div>Since last month <svg class="icon icon-xs text-danger" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg><span class="text-danger fw-bolder">2%</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-xl-4 mb-4">
                    <div class="card border-0 shadow">
                        <div class="card-body">
                            <div class="row d-block d-xl-flex align-items-center">
                                <div class="col-12 col-xl-5 text-xl-center mb-3 mb-xl-0 d-flex align-items-center justify-content-xl-center">
                                    <div class="icon-shape icon-shape-tertiary rounded me-4 me-sm-0">
                                        <svg class="icon" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 3a1 1 0 000 2v8a2 2 0 002 2h2.586l-1.293 1.293a1 1 0 101.414 1.414L10 15.414l2.293 2.293a1 1 0 001.414-1.414L12.414 15H15a2 2 0 002-2V5a1 1 0 100-2H3zm11.707 4.707a1 1 0 00-1.414-1.414L10 9.586 8.707 8.293a1 1 0 00-1.414 0l-2 2a1 1 0 101.414 1.414L8 10.414l1.293 1.293a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                                    </div>
                                    <div class="d-sm-none">
                                        <h2 class="fw-extrabold h5"> Tiempo</h2>
                                        <h3 class="mb-1">50.88%</h3>
                                    </div>
                                </div>
                                <div class="col-12 col-xl-7 px-xl-0">
                                    <div class="d-none d-sm-block">
                                        <h2 class="h6 text-gray-400 mb-0">Tiempo</h2>
                                        <h3 class="fw-extrabold mb-2">50.88%</h3>
                                    </div>
                                    <small class="text-gray-500">
                                        Feb 1 - Apr 1
                                    </small> 
                                    <div class="small d-flex mt-1">                               
                                        <div>Since last month <svg class="icon icon-xs text-success" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z" clip-rule="evenodd"></path></svg><span class="text-success fw-bolder">4%</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- fin de grafica -->
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
                        <tr v-for="resultado in filtroResultados">
                            <th>@{{ resultado.id_equipo}}</th>
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

<!-- <script>
    
 var myChart = document.getElementById('myChart');
 var labels = ['ENERO','FEBRERO','MARZO','ABRIL','MAYO','JUNIO'];

var data = {
	labels:labels,
	datasets:[
	{
		label:'SERIE 1',
		backgroundColor:'#a5ebe5',
		borderColor:'black',
		data:[1000,1500,500,2000,600,1200]
	},
	{
		label:'SERIE 2',
		backgroundColor:'#448fff',
		borderColor:'black',
		data:[1200,1000,800,1800,3000,2500]
	},
	],
}

var config={
	type:'bar',
	data:data,
	options:{}
};

var myChart=new Chart(myChart,config);
</script> -->


@endpush

<input type="hidden" name="route" value="{{url('/')}}">