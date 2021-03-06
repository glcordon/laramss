@extends('layouts.app')

@section('content')
<body id="page-top">

    
  
    <!--/ Intro Skew Star /-->
    <section id="home">
      <div class="home-banner">
          <div class="intro route" style="background-image: url(assets/img/vienna-reyes-qCrKTET_09o-unsplash.jpg)">
            <div class="overlay-itro"></div>
            <div class="intro-content display-table">
              <div class="table-cell">
                <div class="container">
                  <div class="banner-container">
                    <p class="Courses-avilability wow fadeInDown" data-wow-delay=".25s" data-wow-duration="1s">Available Now</p>
                    <h1 class="intro-title wow fadeInDown" data-wow-delay=".80s" data-wow-duration="1s">Elite Sports Training, <span>Mentorship</span> & Events</h1>
                    <div class="banner-slider-content">
                      <a class="btn btn-primary wow zoomIn" data-wow-delay="1.50s" data-wow-duration="2s" href="/list-all">Learn More <i class="icon-right-arrow1"></i></a>
                      <span class="wow fadeInRight" data-wow-delay="3s" data-wow-duration="1s">New Content Monthly</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="intro route" style="background-image: url(assets/img/court-prather-Nka1wVAQWa4-unsplash.jpg)">
            <div class="overlay-itro"></div>
            <div class="intro-content display-table">
              <div class="table-cell">
                <div class="container">
                  <div class="banner-container">
                    <p class="Courses-avilability">Available Now</p>
                    <h1 class="intro-title">Elite Sports Training, <span>Mentorship</span> & Events</h1>
                    <div class="banner-slider-content">
                      <a class="btn btn-primary" href="/list-all">Learn More <i class="icon-right-arrow1"></i></a>
                      <span>New Content Monthly</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="intro route" style="background-image: url(assets/img/vienna-reyes-qCrKTET_09o-unsplash.jpg)">
            <div class="overlay-itro"></div>
            <div class="intro-content display-table">
              <div class="table-cell">
                <div class="container">
                  <div class="banner-container">
                    <p class="Courses-avilability">Available Now</p>
                    <h1 class="intro-title">Elite Sports Training, <span>Mentorship</span> & Events</h1>
                    <div class="banner-slider-content">
                      <a class="btn btn-primary" href="/list-all">Learn More <i class="icon-right-arrow1"></i></a>
                      <span>New Content Monthly</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
      </div>
    </section>
    <!--/ Intro Skew End /-->
  
  
    <!--/ Section Road to pro /-->
    <section id="service" class="services-mf route p-r section-padding-80">
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <div class="title-box text-center">
              <h3 class="title-a wow zoomIn" data-wow-delay="2s" data-wow-duration="1s">
                Road to Pro
              </h3>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <div class="service-box wow zoomIn" data-wow-delay="1s" data-wow-duration="1s">
              <div class="service-ico">
                <span class="ico-circle"><i class="icon-coach"></i></span>
              </div>
              <div class="service-content">
                <h2 class="s-title">Elite Training Courses</h2>
                <p class="s-description text-center">
                  We have identified the best and most enthusiastic trainers around the country bringing you the same information that have taken hundreds of athletes pro.
                </p>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="service-box wow zoomIn" data-wow-delay="1.3s" data-wow-duration="1s">
              <div class="service-ico">
                <span class="ico-circle"><i class="icon-online"></i></span>
              </div>
              <div class="service-content">
                <h2 class="s-title">Pro Mentors</h2>
                <p class="s-description text-center">
                  We have brought a unique and exclusive opportunity to be mentored directly by professional athletes through live streams and conference calls. 
                </p>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="service-box wow zoomIn" data-wow-delay="1.6s" data-wow-duration="1s">
              <div class="service-ico">
                <span class="ico-circle"><i class="icon-calendar"></i></span>
              </div>
              <div class="service-content">
                <h2 class="s-title">Exclusive Camps & Events</h2>
                <p class="s-description text-center">
                  We have partnered with camps, tournaments, and professional exposure events to make sure you always know your next opportunity near you to grow or be seen. 
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--/ Section Road to pro/-->
  
  
      <!--/ Section choose course /-->
    <section id="choose-course" class="choose-course route p-r section-padding-80">
      <div class="container">
        <div class="row">
          <div class="col-sm-10 offset-md-1 text-left">
            <div class="title-box text-center mb-0">
              <h3 class="title-a wow fadeInDown transform-up animated" data-wow-delay="1s" data-wow-duration="1s" style="visibility: visible; animation-duration: 1s; animation-delay: 1s; animation-name: fadeInDown;">
                Choose Your Course
              </h3>
            </div>
          </div>
          <div class="search-course-box">
            <form>
              <input type="text" name="" placeholder="I am looking for...">
              <button><i class="icon-magnifying-glass"></i></button>
            </form>
          </div>
        </div>
        <div class="row">
          
          {{--  @include('partials.course.course-card')  --}}
        </div>
      </div>
    </section>
    </body>
@endsection
