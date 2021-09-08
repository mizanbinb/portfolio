@extends('layouts.website')

@section('content')

        <!-- Masthead-->
 <header class="masthead"  style="background-image:url('{{url('masthead_image/',$masthead->image)}}');">
            <div class="container px-4 px-lg-5 h-100">
                <div class="row gx-4 gx-lg-5 h-100 align-items-center justify-content-center text-center">
                    <div class="col-lg-8 align-self-end">
                        <h1 class="text-white font-weight-bold">{{ $masthead->title }}</h1>
                        <hr class="divider" />
                    </div>
                    <div class="col-lg-8 align-self-baseline">
                        <p class="text-white-75 mb-5">{{ $masthead->sub_title }}</p>
                        <a class="btn btn-primary btn-xl" href="#about">Find Out More</a>
                    </div>
                </div>
            </div>
        </header>
        <!-- About-->
        <section class="page-section bg-primary" id="about"style=" background-image:url('{{url('about_image/',$about->image)}}');">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-lg-8 text-center">
                        <h2 class="text-white mt-0">{{ $about->title }}</h2>
                        <hr class="divider divider-light" />
                        <p class="text-white-75 mb-4">{{ $about->sub_title }}</p>
                        <a class="btn btn-light btn-xl" href="#services">Get Started!</a>
                    </div>
                </div>
            </div>
        </section>
        <!-- Services-->
        <section class="page-section" id="services">
            <div class="container px-4 px-lg-5">
                <h2 class="text-center mt-0">Services</h2>
                <hr class="divider" />
                <div class="row gx-4 gx-lg-5">
                 @foreach($services as $service)
                    <div class="col-lg-3 col-md-6 text-center">
                        <div class="mt-5">
                            <div class="mb-2"><i class="{{$service->icon}}"></i></div>
                            <h3 class="h4 mb-2">{{$service->title}}</h3>
                            <p class="text-muted mb-0">{{$service->description}}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
                <!-- bi-gem fs-1 text-primary -->
            </div>
        </section>
        <!-- Portfolio-->
        <div id="portfolio">
            <div class="container-fluid p-0">
            <h2 class="text-center mt-0">Portfolio</h2>
                <hr class="divider" />
                <div class="row g-0">
                    @foreach($portfolios as $portfolio)
                    <div class="col-lg-4 col-sm-6">
                        <a class="portfolio-box" href="{{url('portfolio_image/',$portfolio->image)}}" title="{{$portfolio->project_name}}">
                            <img class="img-fluid" src="{{url('portfolio_image/',$portfolio->image)}}" alt="..." />
                            <div class="portfolio-box-caption">
                                <div class="project-category text-white-50">{{$portfolio->category_name}}</div>
                                <div class="project-name">{{$portfolio->project_name}}</div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- Call to action-->
        <section class="page-section bg-dark text-white">

            <div class="container px-4 px-lg-5 text-center">
            <h2 class="text-center mt-0">Cv</h2>
                <hr class="divider" />
                <h2 class="mb-4">{{ $cv->title }}</h2>
                <a class="btn btn-light btn-xl" href="{{url('cv_image/',$cv->cv)}}">Download Now!</a>
            </div>
        </section>
        <!-- Contact-->
        <section class="page-section" id="contact">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-lg-8 col-xl-6 text-center">
                        <h2 class="mt-0">{{ $setting->contact_title }}</h2>
                        <hr class="divider" />
                        <p class="text-muted mb-5">{{ $setting->contact_subtitle }}</p>
                    </div>
                </div>
                <div class="row gx-4 gx-lg-5 justify-content-center mb-5">
                    <div class="col-lg-6">
                        <!-- * * * * * * * * * * * * * * *-->
                        <!-- * * SB Forms Contact Form * *-->
                        <!-- * * * * * * * * * * * * * * *-->
                        <!-- This form is pre-integrated with SB Forms.-->
                        <!-- To make this form functional, sign up at-->
                        <!-- https://startbootstrap.com/solution/contact-forms-->
                        <!-- to get an API token!-->
                        <form id="contactForm" method="POST" action="/subscribe" data-sb-form-api-token="API_TOKEN">
                        {{ csrf_field() }}
                            <div class="form-floating mb-3">
                                <input class="form-control" id="name" type="text" placeholder="Enter your name..." data-sb-validations="required" />
                                <label for="name">Full name</label>
                                <div class="invalid-feedback" data-sb-feedback="name:required">A name is required.</div>
                            </div>
                            <!-- Email address input-->
                            <div class="form-floating mb-3">
                                <input class="form-control" id="email" type="email" placeholder="name@example.com" data-sb-validations="required,email" />
                                <label for="email">Email address</label>
                                <div class="invalid-feedback" data-sb-feedback="email:required">An email is required.</div>
                                <div class="invalid-feedback" data-sb-feedback="email:email">Email is not valid.</div>
                            </div>
                            <!-- Phone number input-->
                            <div class="form-floating mb-3">
                                <input class="form-control" id="phone" type="tel" placeholder="(123) 456-7890" data-sb-validations="required" />
                                <label for="phone">Phone number</label>
                                <div class="invalid-feedback" data-sb-feedback="phone:required">A phone number is required.</div>
                            </div>
                            <!-- Message input-->
                            <div class="form-floating mb-3">
                                <textarea class="form-control" id="message" type="text" placeholder="Enter your message here..." style="height: 10rem" data-sb-validations="required"></textarea>
                                <label for="message">Message</label>
                                <div class="invalid-feedback" data-sb-feedback="message:required">A message is required.</div>
                            </div>
                            <!-- Submit success message-->
                            <!---->
                            <!-- This is what your users will see when the form-->
                            <!-- has successfully submitted-->
                            <div class="d-none" id="submitSuccessMessage">
                                <div class="text-center mb-3">
                                    <div class="fw-bolder">Form submission successful!</div>
                                    To activate this form, sign up at
                                    <br />
                                    <a href="https://startbootstrap.com/solution/contact-forms">https://startbootstrap.com/solution/contact-forms</a>
                                </div>
                            </div>
                            <!-- Submit error message-->
                            <!---->
                            <!-- This is what your users will see when there is-->
                            <!-- an error submitting the form-->
                            <div class="d-none" id="submitErrorMessage"><div class="text-center text-danger mb-3">Error sending message!</div></div>
                            <!-- Submit Button-->
                            <div class="d-grid"><button class="btn btn-primary btn-xl disabled" id="submitButton" type="submit">Submit</button></div>
                        </form>
                    </div>
                </div>
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-lg-4 text-center mb-5 mb-lg-0">
                        <i class="{{ $setting->icon }}"></i>
                        <div>{{ $setting->number }}</div>
                    </div>
                </div>
            </div>
        </section>
@endsection
