<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Ahsan Resume</title>
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:500,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Muli:400,400i,800,800i" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{ secure_asset('css/styles.css') }}" rel="stylesheet" />
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" id="sideNav">
            @if($about)
            <a class="navbar-brand js-scroll-trigger" href="#page-top">
                <span class="d-block d-lg-none">{{ $about->fname }} {{ $about->lname }}</span>
                <span class="d-none d-lg-block"><img class="img-fluid img-profile rounded-circle mx-auto mb-2" src="{{ secure_asset($about->image) }}" alt="" /></span>
            </a>
            @else
                <div>
                    <p>No About Details.</p>
                </div>
            @endif
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav">
                @if(count($sidebars) > 0)
                    @foreach($sidebars as $key => $sidebar)
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#{{ $sidebar->sidebar }}">{{ Str::upper($sidebar->sidebar) }}</a></li>
                    @endforeach
                @else
                    <li class="nav-item"><a class="nav-link js-scroll-trigger">No Sidebar to Display.</a></li>
                @endif
                </ul>
            </div>
        </nav>
        <!-- Page Content-->
        <div class="container-fluid p-0">
            <!-- About-->
                <section class="resume-section" id="{{ App\Models\Sidebar::where('sidebar', '=', 'About')->get() ? 'About' : '' }}">
            @if($about)
                <div class="resume-section-content">
                    <h1 class="mb-0">
                        {{ $about->fname }}
                        <span class="text-primary">{{ $about->lname }}</span>
                    </h1>
                    <div class="subheading mb-5" style="display:flex;">
                        {!! $about->address !!}  ({{ $about->phone }}) ·
                        <a href="mailto:name@email.com">{{ $about->email }}</a>
                    </div>
                    <p class="lead mb-5">{!! $about->additional_info !!}</p>
                </div>
                @else
                <div>
                    <p>No About Details.</p>
                </div>
            @endif
            </section>
            <hr class="m-0" />
            <!-- Experience-->
            <section class="resume-section" id="{{ App\Models\Sidebar::where('sidebar', '=', 'Experience')->get() ? 'Experience' : '' }}">

                <div class="resume-section-content">
                    <h2 class="mb-5">Experience</h2>
                    @if(count($experiences) > 0)
                        @foreach($experiences as $key => $experience)
                            <div class="d-flex flex-column flex-md-row justify-content-between mb-5">
                                <div class="flex-grow-1">
                                    <h3 class="mb-0">{{ $experience->name }}</h3>
                                    <div class="subheading mb-3">{{ $experience->company }}</div>
                                    <p>{!! $experience->description !!}</p>
                                    <h5><u>Tasks/Achievements</u></h5>
                                    <p>{!! $experience->achievements !!}</p>
                                </div>
                                <div class="flex-shrink-0"><span class="text-primary">{{ $experience->started }} - {{ $experience->ended }}</span></div>
                            </div>
                        @endforeach
                    @else
                        <div class="d-flex flex-column flex-md-row justify-content-between mb-5">
                            <div class="flex-grow-1">
                                <div>No Experience To Display.</div>
                            </div>
                        </div>
                    @endif
                </div>
            </section>
            <hr class="m-0" />
            <!-- Education-->
            <section class="resume-section" id="{{ App\Models\Sidebar::where('sidebar', '=', 'Education')->get() ? 'Education' : '' }}">

                <div class="resume-section-content">
                    <h2 class="mb-5">Education</h2>
                    @if(count($educations) > 0)
                        @foreach($educations as $key => $education)
                            <div class="d-flex flex-column flex-md-row justify-content-between mb-5">
                                <div class="flex-grow-1">
                                    <h3 class="mb-0">{{ $education->name }}</h3>
                                    <div class="subheading mb-3">{{ $education->degree }}</div>
                                    <div>{!! $education->description !!}</div>
                                    <p>GPA: {{ $education->GPA }}</p>
                                </div>
                                <div class="flex-shrink-0"><span class="text-primary">{{ $education->started }} - {{ $education->ended }}</span></div>
                            </div>
                        @endforeach
                    @else
                        <div class="d-flex flex-column flex-md-row justify-content-between mb-5">
                            <div class="flex-grow-1">
                                <div>No Education To Display.</div>
                            </div>
                        </div>
                    @endif
                </div>
            </section>
            <hr class="m-0" />
            <!-- Personal Projects -->
            <section class="resume-section" id="{{ App\Models\Sidebar::where('sidebar', '=', 'Projects')->get() ? 'Projects' : '' }}">

                <div class="resume-section-content">
                    <h2 class="mb-5">Personal Projects</h2>
                    @if(count($projects) > 0)
                        @foreach($projects as $key => $project)
                            <div class="d-flex flex-column flex-md-row justify-content-between mb-5">
                                <div class="flex-grow-1">
                                    <h3 class="mb-0">{{ $project->title }}</h3>
                                    <div class="subheading mb-3">{{ $project->languages }}</div>
                                    <div>{!! $project->description !!}</div>
                                    <a href="//{{ $project->url }}">{{ $project->url }}</a>
                                </div>
                                <div class="flex-shrink-0"><span class="text-primary">{{ $project->started }} - {{ $project->ended }}</span></div>
                            </div>
                        @endforeach
                    @else
                        <div class="d-flex flex-column flex-md-row justify-content-between mb-5">
                            <div class="flex-grow-1">
                                <div>No Projects To Display.</div>
                            </div>
                        </div>
                    @endif
                </div>
            </section>
            <hr class="m-0" />
            <!-- Skills-->
            <section class="resume-section" id="{{ App\Models\Sidebar::where('sidebar', '=', 'Skills')->get() ? 'Skills' : '' }}">

                <div class="resume-section-content">
                    <h2 class="mb-5">Skills & Expertise</h2>
                    <div class="subheading mb-3">Programming Languages & Tools</div>
                    <ul class="list-inline dev-icons">
                        <li class="list-inline-item"><i class="fab fa-html5"></i></li>
                        <li class="list-inline-item"><i class="fab fa-css3"></i></li>
                        <li class="list-inline-item"><i class="fab fa-vuejs"></i></li>
                        <li class="list-inline-item"><i class="fab fa-node-js"></i></li>
                        <li class="list-inline-item"><i class="fab fa-sass"></i></li>
                        <li class="list-inline-item"><i class="fab fa-wordpress"></i></li>
                        <li class="list-inline-item"><i class="fab fa-laravel"></i></li>
                        <li class="list-inline-item"><i class="fab fa-npm"></i></li>
                        <li class="list-inline-item"><i class="fab fa-php"></i></li>
                    </ul>
                    <div class="subheading mb-3">Workflow</div>
                    <ul class="fa-ul mb-0">
                        <li>
                            <span class="fa-li"><i class="fas fa-check"></i></span>
                            Mobile-First, Responsive Design
                        </li>
                        <li>
                            <span class="fa-li"><i class="fas fa-check"></i></span>
                            Learning New Frameworks
                        </li>
                        <li>
                            <span class="fa-li"><i class="fas fa-check"></i></span>
                            Agile Development & Scrum
                        </li>
                        <li>
                            <span class="fa-li"><i class="fas fa-check"></i></span>
                            Error Handling
                        </li>
                        <li>
                            <span class="fa-li"><i class="fas fa-check"></i></span>
                            Problem Solving
                        </li>
                    </ul>
                </div>
            </section>
            <hr class="m-0" />
            <!-- Awards-->
                <section class="resume-section" id="{{ App\Models\Sidebar::where('sidebar', '=', 'Awards')->get() ? 'Awards' : '' }}">
                <div class="resume-section-content">
                    <h2 class="mb-5">Awards & Certifications</h2>
                    @if(count($awards) > 0)
                        @foreach($awards as $key => $award)
                            <ul class="fa-ul mb-0">
                                <li>
                                    <span class="fa-li"><i class="fas fa-trophy text-warning"></i></span>
                                    {{ $award->award }}
                                </li>
                            </ul>
                        @endforeach
                    @else
                        <ul class="fa-ul mb-0">
                                <li>
                                    No Award to Display.
                                </li>
                            </ul>
                    @endif
                </div>
            </section>
        </div>
        <!-- Bootstrap core JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
        <!-- Third party plugin JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
        <!-- Core theme JS-->
        <script src="{{ secure_asset('js/scripts.js') }}"></script>
    </body>
</html>
