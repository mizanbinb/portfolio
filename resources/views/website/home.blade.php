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
                    <h1>
                        <a href="" style="color:#fff; text-decoration: none;"  class="typewrite" data-period="2000" data-type='[ "Hi, Im a Freelancer.", "I am Creative.", "I Love Design.", "I Love to Develop." ]'>
                          <span class="wrap"></span>
                        </a>
                      </h1>
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
            <h2 class="text-center mt-0">Curriculum Vitae</h2>
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
                        @if(Session::has('success'))
                        <div class="alert alert-success">
                            {{ Session::get('success') }}
                            @php
                                Session::forget('success');
                            @endphp
                        </div>
                        @endif

                        <form method="POST" action="{{ route('contact-form.store') }}">

                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <strong>Name:</strong>
                                        <input type="text" name="name" class="form-control" placeholder="Name" value="{{ old('name') }}">
                                        @if ($errors->has('name'))
                                            <span class="text-danger">{{ $errors->first('name') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <strong>Email:</strong>
                                        <input type="text" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}">
                                        @if ($errors->has('email'))
                                            <span class="text-danger">{{ $errors->first('email') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <strong>Phone:</strong>
                                        <input type="text" name="phone" class="form-control" placeholder="Phone" value="{{ old('phone') }}">
                                        @if ($errors->has('phone'))
                                            <span class="text-danger">{{ $errors->first('phone') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <strong>Message:</strong>
                                        <textarea name="message" rows="3" class="form-control">{{ old('message') }}</textarea>
                                        @if ($errors->has('message'))
                                            <span class="text-danger">{{ $errors->first('message') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="form-group text-center">
                                <button class="btn  btn-submit">Submit</button>
                            </div>
                        </form>
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
