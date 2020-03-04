@extends('layouts.student')

@section('content')
    <div class="container page__container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="fixed-student-dashboard.html">Home</a></li>
            <li class="breadcrumb-item"><a href="fixed-student-browse-courses.html">Courses</a></li>
            <li class="breadcrumb-item active">The MVC architectural pattern</li>
        </ol>
        <h1 class="h2">The MVC architectural pattern</h1>
        <div class="row">
            <div class="col-md-7">
                <div class="card">
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" src="https://player.vimeo.com/video/97243285?title=0&amp;byline=0&amp;portrait=0" allowfullscreen=""></iframe>
                    </div>
                    <div class="card-body">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum dicta eius enim inventoreus optio ratione veritatis. Beatae deserunt illum ipsam magniima mollitia officiis quia tempora!
                    </div>
                </div>

                <!-- Lessons -->
                <ul class="card list-group list-group-fit">
                    <li class="list-group-item">
                        <div class="media">
                            <div class="media-left">
                                <div class="text-muted">1.</div>
                            </div>
                            <div class="media-body">
                                <a href="#">Installation</a>
                            </div>
                            <div class="media-right">
                                <small class="text-muted-light">2:03</small>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item active">
                        <div class="media">
                            <div class="media-left">2.</div>
                            <div class="media-body">
                                <a class="text-white" href="#">The MVC architectural pattern</a>
                            </div>
                            <div class="media-right">
                                <small>25:01</small>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="media">
                            <div class="media-left">
                                <div class="text-muted">3.</div>
                            </div>
                            <div class="media-body">
                                <a href="#">Database Models</a>
                            </div>
                            <div class="media-right">
                                <small class="text-muted-light">12:10</small>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="media">
                            <div class="media-left">
                                <div class="text-muted">4.</div>
                            </div>
                            <div class="media-body">
                                <div class="text-muted-light">Database Access</div>
                            </div>
                            <div class="media-right">
                                <small class="badge badge-primary ">PRO</small>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="media">
                            <div class="media-left">
                                <div class="text-muted">5.</div>
                            </div>
                            <div class="media-body">
                                <div class="text-muted-light">Eloquent Basics</div>
                            </div>
                            <div class="media-right">
                                <small class="badge badge-primary ">PRO</small>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="media">
                            <div class="media-left">
                                <div class="text-muted">6.</div>
                            </div>
                            <div class="media-body">
                                <div class="text-muted-light">Take Quiz</div>
                            </div>
                            <div class="media-right">
                                <small class="badge badge-primary ">PRO</small>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header" style="border: 0;">
                        <nav>
                            <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link nav-foro active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Apuntes</a>
                                <a class="nav-item nav-link nav-foro" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Foro</a>
                                <a class="nav-item nav-link nav-foro" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Materiales</a>
                            </div>
                        </nav>
                    </div>
                    <div class="card-body">
                        <div class="tab-content px-sm-0" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                <div class="form-row align-items-center">
                                    <div class="col-md-12">
                                        <input id="question" type="text" placeholder="Escribe tus apuntes aqui ..." value="" class="form-control">
                                    </div>
                                </div>
                                <!-- Create the editor container -->
                                <div id="editor">
                                </div>
                            </div>
                            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                <!-- foro content -->
                                <h1 class="h2 mb-2 text-center">¿Que es Vue Js?</h1>
                                <p class="text-muted d-flex align-items-center mb-4">
                                    <button type="button" class="btn btn-primary btn-rounded">Más votadas</button>
                                    <button type="button" class="btn btn-primary btn-rounded">Nuevas</button>
                                </p>
                                <div class="d-flex mb-4">
                                    <a href="fixed-student-profile.html" class="avatar mr-3">
                                        <img src="{{asset('images/user.jpg')}}" alt="people" class="avatar-img rounded-circle">
                                    </a>
                                    <div class="flex">
                                        <div class="form-group">
                                            <label for="comment" class="form-label">Escribe aquí tu respuesta</label>
                                            <textarea class="form-control" name="comment" id="comment" rows="3" placeholder=""></textarea>
                                        </div>
                                        <button class="btn btn-success">Publicar</button>
                                    </div>
                                </div>
                                <div class="card card-body">
                                    <div class="d-flex">
                                        <a href="#" class="avatar avatar-online mr-3">
                                            <img src="{{asset('images/user.jpg')}}" alt="people" class="avatar-img rounded-circle">
                                        </a>
                                        <div class="flex">
                                            <p class="d-flex align-items-center mb-2">
                                                <a href="fixed-student-profile.html" class="text-body mr-2"><strong>Jenell D. Matney</strong></a>
                                                <small class="text-muted">2 min ago</small>
                                            </p>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores beatae quisquam iste maiores libero, corrupti totam saepe itaque quidem perspiciatis?</p>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                            <div class="d-flex align-items-center">
                                                <a href="#" class="text-black-50 d-flex align-items-center text-decoration-0"><i class="material-icons mr-1" style="font-size: inherit;">favorite_border</i> 30</a>
                                                <a href="#" class="text-black-50 d-flex align-items-center text-decoration-0 ml-3"><i class="material-icons mr-1" style="font-size: inherit;">thumb_up</i> 130</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end foro content -->
                            </div>
                            <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                                <ul id="tree2">
                                    <li><a href="#">TECH</a>
                    
                                        <ul>
                                            <li>Company Maintenance</li>
                                            <li>Employees
                                                <ul>
                                                    <li>Reports
                                                        <ul>
                                                            <li>Report1</li>
                                                            <li>Report2</li>
                                                            <li>Report3</li>
                                                        </ul>
                                                    </li>
                                                    <li>Employee Maint.</li>
                                                </ul>
                                            </li>
                                            <li>Human Resources</li>
                                        </ul>
                                    </li>
                                    <li>XRP
                                        <ul>
                                            <li>Company Maintenance</li>
                                            <li>Employees
                                                <ul>
                                                    <li>Reports
                                                        <ul>
                                                            <li>Report1</li>
                                                            <li>Report2</li>
                                                            <li>Report3</li>
                                                        </ul>
                                                    </li>
                                                    <li>Employee Maint.</li>
                                                </ul>
                                            </li>
                                            <li>Human Resources</li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body text-center">
                        <p>
                            <a href="fixed-student-cart.html" class="btn btn-success btn-block flex-column">
                                Get All Courses
                                <strong>&dollar;9 / month</strong>
                            </a>
                        </p>
                        <div class="page-separator">
                            <div class="page-separator__text">or</div>
                        </div>
                        <a href="fixed-student-cart.html" class="btn btn-white btn-block flex-column">
                            Purchase Course
                            <strong>&dollar;25 USD</strong>
                        </a>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <div class="media align-items-center">
                            <div class="media-left">
                                <img src="assets/images/people/110/guy-6.jpg" alt="About Adrian" width="50" class="rounded-circle">
                            </div>
                            <div class="media-body">
                                <h4 class="card-title"><a href="fixed-student-profile.html">Adrian Demian</a></h4>
                                <p class="card-subtitle">Instructor</p>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <p>Having over 12 years exp. Adrian is one of the lead UI designers in the industry Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facere, aut.</p>
                        <a href="#" class="btn btn-light"><i class="fab fa-facebook"></i></a>
                        <a href="#" class="btn btn-light"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="btn btn-light"><i class="fab fa-github"></i></a>
                    </div>
                </div>
                <div class="card">
                    <ul class="list-group list-group-fit">
                        <li class="list-group-item">
                            <div class="media align-items-center">
                                <div class="media-left">
                                    <i class="material-icons text-muted-light">assessment</i>
                                </div>
                                <div class="media-body">
                                    Beginner
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="media align-items-center">
                                <div class="media-left">
                                    <i class="material-icons text-muted-light">schedule</i>
                                </div>
                                <div class="media-body">
                                    2 <small class="text-muted">hrs</small> &nbsp; 26 <small class="text-muted">min</small>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection