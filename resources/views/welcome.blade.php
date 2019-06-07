@extends('layouts.new.base', ['title' => 'Acceuil'])

@section('content')

    <section class="wrap-intro">
{{--        <div class="blok-slideshow">--}}
{{--            <!-- ============= BS Carousel  ========== -->--}}
{{--            <div id="myCarousel" class="carousel slide carousel-fade" data-ride="carousel">--}}

{{--                <div class="carousel-inner" role="listbox">--}}
{{--                    <div class="item active" style="background-image:url(template/photos/slides/slide1.jpg)">--}}
{{--                    </div> <!--  item //  -->--}}
{{--                    <div class="item" style="background-image:url(template/photos/slides/slide2.jpg)">--}}
{{--                    </div> <!--  item //  -->--}}
{{--                    <div class="item" style="background-image:url(template/photos/slides/slide3.jpg)">--}}
{{--                        <div class="container">--}}
{{--                            <div class="carousel-caption">--}}
{{--                                <h1 class="title">We are awesome education center!</h1>--}}
{{--                            </div> <!--  carousel-caption //  -->--}}
{{--                        </div>  <!--  container //  -->--}}
{{--                    </div> <!--  item //  -->--}}
{{--                </div>--}}
{{--                <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">--}}
{{--                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>--}}
{{--                    <span class="sr-only">Previous</span>--}}
{{--                </a>--}}
{{--                <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">--}}
{{--                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>--}}
{{--                    <span class="sr-only">Next</span>--}}
{{--                </a>--}}
{{--            </div><!-- ============= BS Carousel //  ========== -->--}}
{{--        </div> <!-- blok-slideshow // -->--}}

        <section class="wrap wrap-collection">
            <!-- container start -->
            <div class="container">

                <div class="row no-gutter">
                    <div class="col-sm-3 item-collection">
                        <article class="item-body">
                            <span class="icon-wrap"><i class="fa fa-book"></i></span>
                            <div class="text-wrap">
                                <h4 class="title">Any kind of latest books can be found</h4>
                            </div>
                        </article>
                    </div><!-- col// -->
                    <div class="col-sm-3 item-collection">
                        <article class="item-body">
                            <span class="icon-wrap"><i class="fa fa-bus"></i></span>
                            <div class="text-wrap">
                                <h4 class="title">Free transport services for every student</h4>
                            </div>
                        </article>
                    </div><!-- col// -->
                    <div class="col-sm-3 item-collection">
                        <article class="item-body">
                            <span class="icon-wrap"><i class="fa fa-university"></i></span>
                            <div class="text-wrap">
                                <h4 class="title"> Modern and flexible classrooms</h4>
                            </div>
                        </article>
                    </div><!-- col// -->
                    <div class="col-sm-3 item-collection">
                        <article class="item-body">
                            <span class="icon-wrap"><i class="fa fa-wifi"></i></span>
                            <div class="text-wrap">
                                <h4 class="title"> Free high speed wi-fi internet connection </h4>
                            </div>
                        </article>
                    </div><!-- col// -->
                </div><!-- row // -->

            </div><!-- container //  -->
        </section> <!-- wrap-collection // -->

    </section>
    <!-- wrap-intro // -->

    <!-- wrap about -->
    <section class="wrap wrap-about">

        <!-- container start -->
        <div class="container">

            <div class="row-sm">
                <!-- col -->
                <div class="col-sm-8">

                    <div class="blok">
                        <header class="blok-heading">
                            <h3 class="blok-title"> About us </h3>
                        </header>
                        <article class="article">
                            <img src="{{ asset('template/photos/about.jpg') }}" class="img-about pull-right" alt="About us">
                            <p>
                                Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diem nonummy nibh euismod
                                tincidunt ut lacreet dolore magna aliguam erat volutpat. Ut wisis enim ad minim veniam,
                                quis nostrud exerci tution ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo
                                consequat.
                            </p>
                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diem nonummy nibh euismod
                                tincidunt ut lacreet dolore magna aliguam erat volutpat.</p>
                            <p><a href="#apply" class="btn btn-default">Read more</a></p>
                        </article>
                    </div><!-- blok // -->

                </div><!-- col // -->

                <div class="col-sm-4">
                    <aside class="blok">
                        <header class="blok-heading">
                            <h3 class="blok-title"> EVENTS </h3>
                        </header>
                        <ul class="list-news">
                            <li>
                                <div class="date">
                                    <span class="year">2016</span>
                                    <span class="day">03/10</span>
                                </div>
                                <div class="text">
                                    <p>Ut wisis enim ad minim veniam, quis nostrud exerci tution</p>
                                    <a href="#">Details</a>
                                </div>
                            </li>
                            <li>
                                <div class="date">
                                    <span class="year">2016</span>
                                    <span class="day">01/10</span>
                                </div>
                                <div class="text">
                                    <p>Markazning internetdagi yangi veb sayt ishga tushmoqda</p>
                                    <a href="#">Details</a>
                                </div>
                            </li>
                            <li>
                                <div class="date">
                                    <span class="year">2016</span>
                                    <span class="day">19/05</span>
                                </div>
                                <div class="text">
                                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit</p>
                                    <a href="#">Details</a>
                                </div>
                            </li>
                        </ul>
                    </aside> <!-- blok // -->
                </div> <!-- col// -->
            </div> <!-- row// -->

        </div> <!-- container // -->
    </section> <!-- wrap about //  -->

    <section class="wrap wrap-servis">
        <div class="container relative">
            <header class="blok-heading">
                <a href="#" class="btn btn-default pull-right">All cources</a>
                <h3 class="blok-title"> Our cources </h3>
            </header>

            <div class="row">
                <div class="col-sm-3 col-xs-6">
                    <figure class="servis-item">
                        <div class="img-wrap">
                            <a href="">
                                <img src="{{ asset('template/photos/history.jpg') }}" alt="Something">
                                <span class="item-hover">Details</span>
                            </a>
                        </div><!-- img-wrap// -->
                        <figcaption class="info">
                            <h4 class="title"><a href="#">History</a></h4>
                            <p class="small">Teacher: Albert Einstein - professor of this time </p>
                        </figcaption>
                    </figure>
                </div><!-- //col -->
                <div class="col-sm-3 col-xs-6">
                    <figure class="servis-item">
                        <div class="img-wrap">
                            <a href="">
                                <img src="{{ asset('template/photos/math.jpg') }}" alt="Something">
                                <span class="item-hover">Details</span>
                            </a>
                        </div><!-- img-wrap// -->
                        <figcaption class="info">
                            <h4 class="title"><a href="#">Mathematics</a></h4>
                            <p class="small">Teacher: Albert Einstein - professor of this time </p>
                        </figcaption>
                    </figure>
                </div><!-- //col -->
                <div class="col-sm-3 col-xs-6">
                    <figure class="servis-item">
                        <div class="img-wrap">
                            <a href="">
                                <img src="{{ asset('template/photos/physics.jpg') }}" alt="Something">
                                <span class="item-hover">Details</span>
                            </a>
                        </div><!-- img-wrap// -->
                        <figcaption class="info">
                            <h4 class="title"><a href="#">Physics</a></h4>
                            <p class="small">Teacher: Albert Einstein - professor of this time </p>
                        </figcaption>
                    </figure>
                </div><!-- //col -->
                <div class="col-sm-3 col-xs-6">
                    <figure class="servis-item">
                        <div class="img-wrap">
                            <a href="">
                                <img src="{{ asset('template/photos/chemistry.jpg') }}" alt="Something">
                                <span class="item-hover">Details</span>
                            </a>
                        </div><!-- img-wrap// -->
                        <figcaption class="info">
                            <h4 class="title"><a href="#">Chemistry</a></h4>
                            <p class="small">Teacher: Albert Einstein - professor of this time </p>
                        </figcaption>
                    </figure>
                </div><!-- //col -->
                <div class="col-sm-3 col-xs-6">
                    <figure class="servis-item">
                        <div class="img-wrap">
                            <a href="">
                                <img src="{{ asset('template/photos/biology.jpg') }}" alt="Something">
                                <span class="item-hover">Details</span>
                            </a>
                        </div><!-- img-wrap// -->
                        <figcaption class="info">
                            <h4 class="title"><a href="#">Biology</a></h4>
                            <p class="small">Teacher: Albert Einstein - professor of this time </p>
                        </figcaption>
                    </figure>
                </div><!-- //col -->
                <div class="col-sm-3 col-xs-6">
                    <figure class="servis-item">
                        <div class="img-wrap">
                            <a href="">
                                <img src="{{ asset('template/photos/literature.jpg') }}" alt="Something">
                                <span class="item-hover">Details</span>
                            </a>
                        </div><!-- img-wrap// -->
                        <figcaption class="info">
                            <h4 class="title"><a href="#">Literature</a></h4>
                            <p class="small">Teacher: Albert Einstein - professor of this time </p>
                        </figcaption>
                    </figure>
                </div><!-- //col -->
                <div class="col-sm-3 col-xs-6">
                    <figure class="servis-item">
                        <div class="img-wrap">
                            <a href="">
                                <img src="{{ asset('template/photos/english.jpg') }}" alt="Something">
                                <span class="item-hover">Details</span>
                            </a>
                        </div><!-- img-wrap// -->
                        <figcaption class="info">
                            <h4 class="title"><a href="#">English and IELTS</a></h4>
                            <p class="small">Teacher: Albert Einstein - professor of this time </p>
                        </figcaption>
                    </figure>
                </div><!-- //col -->
                <div class="col-sm-3 col-xs-6">
                    <figure class="servis-item">
                        <div class="img-wrap">
                            <a href="">
                                <img src="{{ asset('template/photos/russian.jpg') }}" alt="Something">
                                <span class="item-hover">Details</span>
                            </a>
                        </div><!-- img-wrap// -->
                        <figcaption class="info">
                            <h4 class="title"><a href="#">Russian</a></h4>
                            <p class="small">Teacher: Albert Einstein - professor of this time </p>
                        </figcaption>
                    </figure>
                </div><!-- //col -->
            </div><!-- //row -->
        </div><!-- container // -->
    </section><!-- wrap-content //  -->

    <section class="wrap wrap-team">
        <div class="container">
            <header class="blok-heading">
                <a href="#" class="btn btn-default pull-right"> All teachers </a>
                <h3 class="blok-title"> Our teachers</h3>
            </header>
            <div class="row">
                <div class="col-sm-3">
                    <aside class="banner1">
                        <div class="caption">
                            <figure class="people-item">
                                <div class="img-wrap img-circle"><img src="{{ asset('template/photos/man1.jpg') }}"></div>
                                <figcaption class="text-wrap">
                                    <h4 class="title">Mr. John Someone</h4>
                                    <p class="small">Director<br> Masters of social science</p>
                                </figcaption>
                            </figure>
                        </div>
                    </aside>
                </div> <!--  col// -->
                <div class="col-sm-9">
                    <ul class="row list-img clearfix">
                        <li class="col-md-4 col-sm-6"><a href="#">
                                <div class="img-wrap"><img src="{{ asset('template/photos/man1.jpg') }}"></div>
                            </a>
                            <h4 class="title"><a href="#">Michael pistoncha</a></h4>
                            <p class="small">Awesome good person</p>
                        </li>
                        <li class="col-md-4 col-sm-6"><a href="#">
                                <div class="img-wrap"><img src="{{ asset('template/photos/man2.jpg') }}"></div>
                            </a>
                            <h4 class="title"><a href="#">Pistonchaev Surnemae</a></h4>
                            <p class="small">Professor va doktor</p>
                        </li>
                        <li class="col-md-4 col-sm-6"><a href="#">
                                <div class="img-wrap"><img src="{{ asset('template/photos/man3.jpg') }}"></div>
                            </a>
                            <h4 class="title"><a href="#">Myname Surnemae</a></h4>
                            <p class="small">Professor</p>
                        </li>
                        <li class="col-md-4 col-sm-6"><a href="#">
                                <div class="img-wrap"><img src="{{ asset('template/photos/man1.jpg') }}"></div>
                            </a>
                            <h4 class="title"><a href="#">Myname Surnemae</a></h4>
                            <p class="small">Professor</p>
                        </li>
                        <li class="col-md-4 col-sm-6"><a href="#">
                                <div class="img-wrap"><img src="{{ asset('template/photos/man2.jpg') }}"></div>
                            </a>
                            <h4 class="title"><a href="#">Myname Surnemae</a></h4>
                            <p class="small">Professor</p>
                        </li>
                        <li class="col-md-4 col-sm-6"><a href="#">
                                <div class="img-wrap"><img src="{{ asset('template/photos/man3.jpg') }}"></div>
                            </a>
                            <h4 class="title"><a href="#">Falonchaev Faloncha</a></h4>
                            <p class="small">Iqtisod fanlari nomzodi professor </p>
                        </li>
                        <li class="col-md-4 col-sm-6"><a href="#">
                                <div class="img-wrap"><img src="{{ asset('template/photos/man3.jpg') }}"></div>
                            </a>
                            <h4 class="title"><a href="#">Falonchaev Faloncha</a></h4>
                            <p class="small">Iqtisod fanlari nomzodi professor </p>
                        </li>
                        <li class="col-md-4 col-sm-6"><a href="#">
                                <div class="img-wrap"><img src="{{ asset('template/photos/man1.jpg') }}"></div>
                            </a>
                            <h4 class="title"><a href="#">Falonchaev Falonchamullo asdasd</a></h4>
                            <p class="small">Iqtisod fanlari nomzodi professor </p>
                        </li>
                        <li class="col-md-4 col-sm-6"><a href="#">
                                <div class="img-wrap"><img src="{{ asset('template/photos/man2.jpg') }}"></div>
                            </a>
                            <h4 class="title"><a href="#">Falonchaev Faloncha</a></h4>
                            <p class="small">Iqtisod fanlari nomzodi professor </p>
                        </li>
                    </ul>
                </div> <!--  col// -->
            </div>  <!--  row// -->
        </div><!-- //container -->
    </section> <!-- wrap-products // -->

@endsection
