@extends('layout.app')
@section('titulo','Categorías')
@section('contenido')

<!-- INICIA VUE -->
<div id="categorias">
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
<button @click="mostrarModal()" type="button" class="btn btn-block btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#modalSignIn">Agregar categoría</button>
<!-- Modal Content -->
                       
                    </div>
                </div>
            </div>
            <!-- inicio de tabla -->
            <div class="table-responsive">
                <table class="table table-centered table-nowrap mb-0 rounded">
                    <thead class="thead-light">
                        <tr>
                            <th class="border-0 rounded-start">Country</th>
                            <th class="border-0">All</th>
                            <th class="border-0 rounded-end">All Change</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Item -->
                        <tr>
                            <td class="border-0">
                                <a href="#" class="d-flex align-items-center">
                                    <img class="me-2 image image-small rounded-circle" alt="Image placeholder" src="../../assets/img/flags/united-states-of-america.svg">
                                    <div><span class="h6">United States</span></div>
                                </a>
                            </td>
                            <td class="border-0 font-weight-bold">106</td>
                            <td class="border-0 text-danger">
                                <span class="fas fa-angle-down"></span>
                                <span class="font-weight-bold">5</span>
                            </td>
                        </tr>
                        <!-- End of Item -->
                        <!-- Item -->
                        <tr>
                            <td class="border-0">
                                <a href="#" class="d-flex align-items-center">
                                    <img class="me-2 image image-small rounded-circle" alt="Image placeholder" src="../../assets/img/flags/canada.svg">
                                    <div><span class="h6">Canada</span></div>
                                </a>
                            </td>
                            <td class="border-0 font-weight-bold">76</td>
                            <td class="border-0 text-success">
                                <span class="fas fa-angle-up"></span>
                                <span class="font-weight-bold">17</span>
                            </td>
                        </tr>
                        <!-- End of Item -->
                        <!-- Item -->
                        <tr>
                            <td class="border-0">
                                <a href="#" class="d-flex align-items-center">
                                    <img class="me-2 image image-small rounded-circle" alt="Image placeholder" src="../../assets/img/flags/united-kingdom.svg">
                                    <div><span class="h6">United Kingdom</span></div>
                                </a>
                            </td>
                            <td class="border-0 font-weight-bold">147</td>
                            <td class="border-0 text-success">
                                <span class="fas fa-angle-up"></span>
                                <span class="font-weight-bold">10</span>
                            </td>
                        </tr>
                        <!-- End of Item -->
                        <!-- Item -->
                        <tr>
                            <td class="border-0">
                                <a href="#" class="d-flex align-items-center">
                                    <img class="me-2 image image-small rounded-circle" alt="Image placeholder" src="../../assets/img/flags/france.svg">
                                    <div><span class="h6">France</span></div>
                                </a>
                            </td>
                            <td class="border-0 font-weight-bold">112</td>
                            <td class="border-0 text-success">
                                <span class="fas fa-angle-up"></span>
                                <span class="font-weight-bold">3</span>
                            </td>
                        </tr>
                        <!-- End of Item -->
                        <!-- Item -->
                        <tr>
                            <td class="border-0">
                                <a href="#" class="d-flex align-items-center">
                                    <img class="me-2 image image-small rounded-circle" alt="Image placeholder" src="../../assets/img/flags/japan.svg">
                                    <div><span class="h6">Japan</span></div>
                                </a>
                            </td>
                            <td class="border-0 font-weight-bold">115</td>
                            <td class="border-0 text-danger">
                                <span class="fas fa-angle-down"></span>
                                <span class="font-weight-bold">12</span>
                            </td>
                        </tr>
                        <!-- End of Item -->
                        <!-- Item -->
                        <tr>
                            <td class="border-0">
                                <a href="#" class="d-flex align-items-center">
                                    <img class="me-2 image image-small rounded-circle" alt="Image placeholder" src="../../assets/img/flags/germany.svg">
                                    <div><span class="h6">Germany</span></div>
                                </a>
                            </td>
                            <td class="border-0 font-weight-bold">220</td>
                            <td class="border-0 text-danger">
                                <span class="fas fa-angle-down"></span>
                                <span class="font-weight-bold">56</span>
                            </td>
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
<div class="modal fade" id="modalCategorias" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header border-0">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body px-md-5">
                <h2 class="h4 text-center">Sign in to our platform</h2>
                <p class="text-center mb-4">Login here using your username and password</p>
                <form action="#">
                    <!-- Form -->
                    <div class="form-group mb-4">
                        <label for="email">Your Email</label>
                        <div class="input-group">
                            <span class="input-group-text border-gray-300" id="basic-addon3">
                                <svg class="icon icon-xxs" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path><path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path></svg>
                            </span>
                            <input type="email" class="form-control border-gray-300" placeholder="example@company.com" id="email" autofocus required>
                        </div>  
                    </div>
                    <!-- End of Form -->
                    <div class="form-group">
                        <!-- Form -->
                        <div class="form-group mb-4">
                            <label for="password">Your Password</label>
                            <div class="input-group">
                                <span class="input-group-text border-gray-300" id="basic-addon4">
                                    <svg class="icon icon-xxs" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"></path></svg>
                                </span>
                                <input type="password" placeholder="Password" class="form-control border-gray-300" id="password" required>
                            </div>  
                        </div>
                        <!-- End of Form -->
                        <div class="form-check mb-4">
                            <input class="form-check-input border-gray-300" type="checkbox" value="" id="terms" required>
                            <label class="form-check-label" for="terms">
                                I agree to the <a href="#">terms and conditions</a>
                            </label>
                        </div>
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">Sign in</button>
                    </div>
                </form>
                <div class="text-center mt-3 mb-2">
                    <span class="fw-normal">or</span>
                </div>
                <div class="d-flex justify-content-center my-2">
                    <a href="#" class="btn btn-icon-only btn-pill btn-outline-gray-500 me-2" aria-label="facebook button" title="facebook button">
                        <svg class="icon icon-xxs" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="facebook-f" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path fill="currentColor" d="M279.14 288l14.22-92.66h-88.91v-60.13c0-25.35 12.42-50.06 52.24-50.06h40.42V6.26S260.43 0 225.36 0c-73.22 0-121.08 44.38-121.08 124.72v70.62H22.89V288h81.39v224h100.17V288z"></path></svg>
                    </a>
                    <a href="#" class="btn btn-icon-only btn-pill btn-outline-gray-500 me-2" aria-label="twitter button" title="twitter button">
                        <svg class="icon icon-xxs" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="twitter" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M459.37 151.716c.325 4.548.325 9.097.325 13.645 0 138.72-105.583 298.558-298.558 298.558-59.452 0-114.68-17.219-161.137-47.106 8.447.974 16.568 1.299 25.34 1.299 49.055 0 94.213-16.568 130.274-44.832-46.132-.975-84.792-31.188-98.112-72.772 6.498.974 12.995 1.624 19.818 1.624 9.421 0 18.843-1.3 27.614-3.573-48.081-9.747-84.143-51.98-84.143-102.985v-1.299c13.969 7.797 30.214 12.67 47.431 13.319-28.264-18.843-46.781-51.005-46.781-87.391 0-19.492 5.197-37.36 14.294-52.954 51.655 63.675 129.3 105.258 216.365 109.807-1.624-7.797-2.599-15.918-2.599-24.04 0-57.828 46.782-104.934 104.934-104.934 30.213 0 57.502 12.67 76.67 33.137 23.715-4.548 46.456-13.32 66.599-25.34-7.798 24.366-24.366 44.833-46.132 57.827 21.117-2.273 41.584-8.122 60.426-16.243-14.292 20.791-32.161 39.308-52.628 54.253z"></path></svg>
                    </a>
                    <a href="#" class="btn btn-icon-only btn-pill btn-outline-gray-500" aria-label="github button" title="github button">
                        <svg class="icon icon-xxs" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="github" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 496 512"><path fill="currentColor" d="M165.9 397.4c0 2-2.3 3.6-5.2 3.6-3.3.3-5.6-1.3-5.6-3.6 0-2 2.3-3.6 5.2-3.6 3-.3 5.6 1.3 5.6 3.6zm-31.1-4.5c-.7 2 1.3 4.3 4.3 4.9 2.6 1 5.6 0 6.2-2s-1.3-4.3-4.3-5.2c-2.6-.7-5.5.3-6.2 2.3zm44.2-1.7c-2.9.7-4.9 2.6-4.6 4.9.3 2 2.9 3.3 5.9 2.6 2.9-.7 4.9-2.6 4.6-4.6-.3-1.9-3-3.2-5.9-2.9zM244.8 8C106.1 8 0 113.3 0 252c0 110.9 69.8 205.8 169.5 239.2 12.8 2.3 17.3-5.6 17.3-12.1 0-6.2-.3-40.4-.3-61.4 0 0-70 15-84.7-29.8 0 0-11.4-29.1-27.8-36.6 0 0-22.9-15.7 1.6-15.4 0 0 24.9 2 38.6 25.8 21.9 38.6 58.6 27.5 72.9 20.9 2.3-16 8.8-27.1 16-33.7-55.9-6.2-112.3-14.3-112.3-110.5 0-27.5 7.6-41.3 23.6-58.9-2.6-6.5-11.1-33.3 2.6-67.9 20.9-6.5 69 27 69 27 20-5.6 41.5-8.5 62.8-8.5s42.8 2.9 62.8 8.5c0 0 48.1-33.6 69-27 13.7 34.7 5.2 61.4 2.6 67.9 16 17.7 25.8 31.5 25.8 58.9 0 96.5-58.9 104.2-114.8 110.5 9.2 7.9 17 22.9 17 46.4 0 33.7-.3 75.4-.3 83.6 0 6.5 4.6 14.4 17.3 12.1C428.2 457.8 496 362.9 496 252 496 113.3 383.5 8 244.8 8zM97.2 352.9c-1.3 1-1 3.3.7 5.2 1.6 1.6 3.9 2.3 5.2 1 1.3-1 1-3.3-.7-5.2-1.6-1.6-3.9-2.3-5.2-1zm-10.8-8.1c-.7 1.3.3 2.9 2.3 3.9 1.6 1 3.6.7 4.3-.7.7-1.3-.3-2.9-2.3-3.9-2-.6-3.6-.3-4.3.7zm32.4 35.6c-1.6 1.3-1 4.3 1.3 6.2 2.3 2.3 5.2 2.6 6.5 1 1.3-1.3.7-4.3-1.3-6.2-2.2-2.3-5.2-2.6-6.5-1zm-11.4-14.7c-1.6 1-1.6 3.6 0 5.9 1.6 2.3 4.3 3.3 5.6 2.3 1.6-1.3 1.6-3.9 0-6.2-1.4-2.3-4-3.3-5.6-2z"></path></svg>
                    </a>
                </div>
                <div class="d-flex justify-content-center align-items-center mt-4">
                    <span class="fw-normal">
                        Not registered? 
                        <a href="./sign-up.html" class="fw-bold">Create account</a>
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End of Modal Content -->
    <!-- modal final -->
</div>
<!-- TERMINA VUE -->


@endsection

@push('scripts')
<script type="text/javascript" src="js/vue-resource.js"></script>
<script type="text/javascript" src="js/apis/apiCategoria.js"></script>

@endpush

<input type="hidden" name="route" value="{{url('/')}}">