<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Three Weather Sensors</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/3aafa2d207.js" crossorigin="anonymous"></script>
    
    <!-- Custom styles for this template-->
    <link href="{{asset('css/sb-admin-2.min.css')}}" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="admin">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fa-solid fa-cloud-sun-rain"></i>
                </div>
                <div class="sidebar-brand-text mx-3"><sup>Three Weather Sensors</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Dashboard
            </div>

            <!-- Nav Item  -->
            <li class="nav-item">
                <a class="nav-link" href="/users">
                    <i class="fa-sharp fa-solid fa-users"></i>
                    <span>Tipo de Usuarios</span></a>
            </li>
        
            <!-- Nav Item --> 
            <li class="nav-item">
                <a class="nav-link" href="/humidity">
                    <i class="fa-solid fa-cloud-rain"></i>
                    <span>Sensor de Humedad</span></a>
            </li>

            <!-- Nav Item -->
            <li class="nav-item">
                <a class="nav-link" href="/temperature">
                    <i class="fa-solid fa-temperature-three-quarters"></i>
                    <span>Sensor de Temperatura</span></a>
            </li>
            
            <!-- Nav Item -->
            <li class="nav-item">
                <a class="nav-link" href="/lightning">
                    <i class="fa-sharp fa-solid fa-lightbulb"></i>
                    <span>Sensor de Iluminacion</span></a>
            </li>

            <!-- Nav Item -->
            <li class="nav-item">
                <a class="nav-link" href="/fan">
                    <i class="fa-solid fa-fan"></i>
                    <span>Ventilador</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    {{-- Buscar --}}
                    <div class="col-xl-12">
                        <form action="{{route('lightning.index')}}" method="get">
                            <div class="form-row">
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" name="texto" value="{{$texto}}">
                                </div>
                                <div class="col-auto">
                                    <input type="submit" class="btn btn-primary" value="Buscar">
                                </div>
                            </div>
                        </form>
                    </div>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>
                    </ul>
                </nav>
                <!-- End of Topbar --> 
                {{-- Tabla iluminacion --}}
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 mb-4">
                            <div class="card shadow mb-4">
                                <div class="card-body">
                                    <div class="card shadow mb-4">
                                        <div class="card-header py-3">
                                            <h3 class="m-1 font-weight-bold text-primary text-center">Sensor de Iluminacion</h3>
                                            <div class="d-flex justify-content-end">
                                                <a href="{{route('lightning.create')}}">
                                                    <button type="button" class="btn btn-success"><i class="fa-solid fa-plus"></i>
                                                      Nuevo
                                                    </button>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                @if ($mensaje = Session::get('success'))
                                                    <div class="alert alert-success text-center" role="alert">
                                                        {{ $mensaje }}
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                                    <thead>
                                                        <tr>
                                                            <th>Id</th>
                                                            <th>tuxes</th>
                                                            <th>Locacion</th>
                                                            <th>Hora</th>
                                                            <th>Botones</th>
                                                        </tr>
                                                    </thead>
                                                    <tfoot>
                                                        <tr>
                                                            <th>Id</th>
                                                            <th>tuxes</th>
                                                            <th>Locacion</th>
                                                            <th>Hora</th>
                                                            <th>Botones</th>

                                                        </tr>
                                                    </tfoot>
                                                    <tbody>
                                                        <div class="d-flex justify-content">
                                                            <button class="btn btn-primary" onclick="window.print()">Descargar PDF</button>
                                                        </div><br>

                                                        @if(count($lightning)<=0)
                                                            <tr> 
                                                                <td colspan="8">No Hay Resultados</td>
                                                            </tr>                                    
                                                        @else
                                                                                
                                                        @foreach($lightning as $lightnin)
                                                            <tr>
                                                                <td>{{$lightnin->id}}</td>
                                                                <td>{{$lightnin->tuxes}}</td>
                                                                <td>{{$lightnin->location}}</td>
                                                                <td>{{$lightnin->created_at}}</td>

                                                                <td>    
                                                                <div class="row col-12"> 

                                                                    <div class="col">
                                                                        <button type="button" class="btn btn-primary m-3" data-toggle="modal" data-target="#verModal{{$lightnin->id}}">
                                                                            <i class="fa-solid fa-eye"></i><br>
                                                                            Ver
                                                                        </button> 
                                                                    </div>
                                                            
                                                                    <div class="col">
                                                                        <a class="btn btn-warning m-3" href="{{route('lightning.edit',$lightnin->id)}}"> <i class="fa-solid fa-pen-to-square"></i><br>
                                                                            Editar</a>
                                                                    </div>

                                                                    <div class="col">
                                                                        <button class="btn btn-danger m-3" type="submit" data-toggle="modal" data-target="#deleteModal{{$lightnin->id}}">
                                                                            <i class="fa-solid fa-trash"></i><br>
                                                                            Eliminar
                                                                        </button> 
                                                                    </div>  
                                                                </div>
                                                                </td>
                                                            </tr>
                                                            <!-- Ver Modal -->
                                                            <div class="modal fade" id="verModal{{$lightnin->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                                aria-hidden="true">
                                                                <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="exampleModalLabel">Modal | Iluminacion</h5>
                                                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">×</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <h5>Registro: {{$lightnin->id}}</h5>
                                                                            <h5>Tuxes: {{$lightnin->tuxes}}</h5>
                                                                            <h5>Locacion: {{$lightnin->location}}</h5>
                                                                            <h5>Hora: {{$lightnin->created_at}}</h5>                                                          
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cerrar</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            {{-- Ver Modal termina--}}
                                                            <!-- delete Modal-->
                                                            <div class="modal fade" id="deleteModal{{$lightnin->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                                aria-hidden="true">
                                                                <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="exampleModalLabel">Modal | Eliminar</h5>
                                                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">×</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">Seleccione "Aceptar" Si quiere Eliminar el Registro: {{$lightnin->id}}</div>
                                                    
                                                                        <div class="modal-footer">
                                                                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                                                                            <form action="lightning/{{$lightnin->id}}" method="POST">
                                                                                @csrf
                                                                                @method('DELETE')
                                                                                <input type="hidden" name="id" value="{{ $lightnin->id }}">

                                                                                <button class="btn btn-danger" type="submit">Aceptar</button>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- delete Modal termina-->
                                                        @endforeach 
                                                        @endif
                                                    </tbody>                                                     
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- Fin Tabla iluminacion --}} 
                           
            </div>
            <!-- End of Main Content -->
            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2021</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->
        </div>
        <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">List@ para Salir?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Seleccione "Cerrar sesión" a continuación si está listo para finalizar su sesión actual.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                    <a class="btn btn-primary" href="">Cerrar sesión</a>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Bootstrap core JavaScript-->
    <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{asset('js/sb-admin-2.min.js')}}"></script>

    <!-- Page level plugins -->
    <script src="{{asset('vendor/chart.js/Chart.min.js')}}"></script>

    <!-- Page level custom scripts -->
    <script src="{{asset('js/demo/chart-area-demo.js')}}"></script>
    <script src="{{asset('js/demo/chart-pie-demo.js')}}"></script>

</body>

</html>