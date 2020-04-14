@extends('layouts.app')

@section('content')
<!--/ Intro Skew Star /-->
  <section id="home">
        <div class="inner-pages-banner route bg-image p-r" style="background-image: url(assets/img/vienna-reyes-qCrKTET_09o-unsplash.jpg)">
          <div class="overlay-itro"></div>
          <div class="banner-container-inner">
          <div class="display-table">
            <div class="table-cell">
              <div class="container">
                <div class="banner-container">
                  <h1 class="intro-title wow fadeInDown" data-wow-delay=".80s" data-wow-duration="1s">Elite Sports Programs</h1>
                </div>
              </div>
            </div>
          </div>
        </div>
        </div>
  </section>
  <!--/ Intro Skew End /-->


    <!--/ Section choose course /-->
  <section id="choose-course" class="choose-course route p-r section-padding-80">
    <div class="container">
      <div class="row">
            @include('partials.course.course-card')
      </div>
    </div>
  </section>
  <!--/ Section choose course/-->
@endsection
