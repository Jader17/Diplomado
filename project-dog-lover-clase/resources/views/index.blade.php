<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>DogLover - Adopta un perro</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap Icons-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic"
        rel="stylesheet" type="text/css" />
    <!-- SimpleLightbox plugin CSS-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ asset('css/styles-index.css') }}" rel="stylesheet" />
    <!-- My styles -->
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>

<body id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand brand-link brand-logo" href="#page-top">
                <img class="img-logo" src="{{ asset('img/logo.png') }}" alt="Dog Lover" width="50">
            </a>

            <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
                aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto my-2 my-lg-0">
                    <li class="nav-item"><a class="nav-link" href="#about">Misión</a></li>
                    <li class="nav-item"><a class="nav-link" href="#services">Qué hacemos</a></li>
                    <li class="nav-item"><a class="nav-link" href="#portfolio">Nuestros perritos</a></li>
                    @auth
                        <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Usuario</a></li>
                    @endauth
                    @guest
                        <li class="nav-item"><a class="nav-link" href="{{ route('auth.login') }}">Login</a></li>
                    @endguest

                </ul>
            </div>
        </div>
    </nav>
    <!-- Masthead-->
    <header class="masthead">
        <div class="container px-4 px-lg-5 h-100">
            <div class="row gx-4 gx-lg-5 h-100 align-items-center justify-content-center text-center">
                <div class="col-lg-8 align-self-end">
                    <h1 class="text-white font-weight-bold">DogLover <br />Haz feliz a un perro</h1>
                    <hr class="divider" />
                </div>
                <div class="col-lg-8 align-self-baseline">
                    <p class="text-white-75 mb-5">El amor es una palabra de cuatro patas...</p>
                    <a class="btn btn-primary btn-xl" href="#about">Mas información</a>
                </div>
            </div>
        </div>
    </header>
    <!-- About-->
    <section class="page-section bg-primary" id="about">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-lg-8 text-center">
                    <h2 class="text-white mt-0">Misión</h2>
                    <hr class="divider divider-light" />
                    <p class="text-white-75 mb-4">DogLover se encarga de encontrar hogares responsables y amorosos a
                        perritos en situación de abandono y vulnerabilidad </p>
                    <a class="btn btn-light btn-xl" href="#services">Qué hacemos!</a>
                </div>
            </div>
        </div>
    </section>
    <!-- Services-->
    <section class="page-section" id="services">
        <div class="container px-4 px-lg-5">
            <h2 class="text-center mt-0">Qué hacemos!</h2>
            <hr class="divider" />
            <div class="row gx-4 gx-lg-5">
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="mt-5">
                        <div class="mb-2"><i class="bi bi-input-cursor-text fs-1 text-primary"></i></div>
                        <h3 class="h4 mb-2">Registra tus perritos para adopción</h3>
                        <p class="text-muted mb-0">Puedes registrar uno o más perritos para que esten disponibles en
                            adopción</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="mt-5">
                        <div class="mb-2"><i class="bi bi-envelope-at-fill fs-1 text-primary"></i></div>
                        <h3 class="h4 mb-2">Contacta al postulante de la adopción</h3>
                        <p class="text-muted mb-0">Contacta directamente a la persona que se postuló para adoptar a tu
                            perrito</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="mt-5">
                        <div class="mb-2"><i class="bi bi-person-lines-fill fs-1 text-primary"></i></div>
                        <h3 class="h4 mb-2">Registra tu solicitud de adopción</h3>
                        <p class="text-muted mb-0">Puedes postularte para adoptar un perrito que este registrado</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="mt-5">
                        <div class="mb-2"><i class="bi-house-check-fill fs-1 text-primary"></i></div>
                        <h3 class="h4 mb-2">Conoce el estado de tu solicitud</h3>
                        <p class="text-muted mb-0">Consulta en que estado se encuentra tu solicitud de adopción</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Portfolio-->
    <section class="page-section bg-dark text-white" id="portfolio">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-lg-8 col-xl-6 text-center">
                    <h2 class="mt-0">Nuestros perritos</h2>
                    <hr class="divider" />
                    <p class="text-muted mb-5">Conoce a los perritos listos para adopción</p>
                </div>
            </div>
            <div class="row gx-4 gx-lg-5 justify-content-center mb-5">
                <div class="d-flex justify-content-center">
                    {{ $dogs->fragment('portfolio')->links() }}
                </div>
                <table id="example1">
                    <tbody>
                        @isset($dogs)
                            @for ($i = 0; $i < count($dogs); $i++)
                                <tr>
                                    @if ($i < count($dogs))
                                        <td>
                                            <div class="card text-black">
                                                <div class="card-header text-center">
                                                    <h4> {{ $dogs[$i]->name }} </h4>
                                                </div>
                                                <div class="card-body img-dog">
                                                    <img src="{{ asset('storage/dogs/' . $dogs[$i]->image) }}"
                                                        alt="" width="250px">
                                                </div>
                                                <div class="card-footer text-md">
                                                    <span class="text-label"><strong>Código:</strong>
                                                        {{ $dogs[$i]->id }}</span> <br />
                                                    <span class="text-label"><strong>Sexo:</strong>
                                                        {{ $dogs[$i]->sex }}</span> <br />
                                                    <span class="text-label"><strong>Raza:</strong>
                                                        {{ $dogs[$i]->race }}</span> <br />
                                                    <span class="text-label"><strong>Fecha de nacimiento:</strong>
                                                        {{ $dogs[$i]->birth_date }}</span> <br />
                                                    <span class="text-label"><strong>Peso:</strong>
                                                        {{ $dogs[$i]->weight }}</span> <br />
                                                    <span class="text-label"><strong>Altura:</strong>
                                                        {{ $dogs[$i]->height }}</span> <br />
                                                </div>
                                            </div>
                                        </td>
                                        @php
                                            $i++;
                                        @endphp
                                    @endif
                                    @if ($i < count($dogs))
                                        <td>
                                            <div class="card text-black">
                                                <div class="card-header text-center">
                                                    <h4> {{ $dogs[$i]->name }} </h4>
                                                </div>
                                                <div class="card-body img-dog">
                                                    <img src="{{ asset('storage/dogs/' . $dogs[$i]->image) }}"
                                                        alt="" width="250px">
                                                </div>
                                                <div class="card-footer text-md">
                                                    <span class="text-label"><strong>Código:</strong>
                                                        {{ $dogs[$i]->id }}</span> <br />
                                                    <span class="text-label"><strong>Sexo:</strong>
                                                        {{ $dogs[$i]->sex }}</span> <br />
                                                    <span class="text-label"><strong>Raza:</strong>
                                                        {{ $dogs[$i]->race }}</span> <br />
                                                    <span class="text-label"><strong>Fecha de nacimiento:</strong>
                                                        {{ $dogs[$i]->birth_date }}</span> <br />
                                                    <span class="text-label"><strong>Peso:</strong>
                                                        {{ $dogs[$i]->weight }}</span> <br />
                                                    <span class="text-label"><strong>Altura:</strong>
                                                        {{ $dogs[$i]->height }}</span> <br />
                                                </div>
                                            </div>
                                        </td>
                                        @php
                                            $i++;
                                        @endphp
                                    @endif
                                    @if ($i < count($dogs))
                                        <td>
                                            <div class="card text-black">
                                                <div class="card-header text-center">
                                                    <h4> {{ $dogs[$i]->name }} </h4>
                                                </div>
                                                <div class="card-body img-dog">
                                                    <img src="{{ asset('storage/dogs/' . $dogs[$i]->image) }}"
                                                        alt="" width="250px">
                                                </div>
                                                <div class="card-footer text-md">
                                                    <span class="text-label"><strong>Código:</strong>
                                                        {{ $dogs[$i]->id }}</span> <br />
                                                    <span class="text-label"><strong>Sexo:</strong>
                                                        {{ $dogs[$i]->sex }}</span> <br />
                                                    <span class="text-label"><strong>Raza:</strong>
                                                        {{ $dogs[$i]->race }}</span> <br />
                                                    <span class="text-label"><strong>Fecha de nacimiento:</strong>
                                                        {{ $dogs[$i]->birth_date }}</span> <br />
                                                    <span class="text-label"><strong>Peso:</strong>
                                                        {{ $dogs[$i]->weight }}</span> <br />
                                                    <span class="text-label"><strong>Altura:</strong>
                                                        {{ $dogs[$i]->height }}</span> <br />
                                                </div>
                                            </div>
                                        </td>
                                    @endif
                                </tr>
                            @endfor
                        @endisset
                    </tbody>
                </table>
                <div class="d-flex justify-content-center">
                    {{ $dogs->fragment('portfolio')->links() }}
                </div>
            </div>
        </div>
    </section>

    <!-- Footer-->
    <footer class="bg-light py-5">
        <div class="container px-4 px-lg-5">
            <div class="small text-center text-muted">Copyright &copy; 2023 - DogLover</div>
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- SimpleLightbox plugin JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.js"></script>
    <!-- Core theme JS-->
    <script src="{{ asset('js/scripts-index.js') }}"></script>
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <!-- * *                               SB Forms JS                               * *-->
    <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>

</html>
