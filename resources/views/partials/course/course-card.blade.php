@foreach ($all_tenants as $item)
<div class="col-lg-4 col-sm-6">
    <div class="course-box p-r wow zoomIn" data-wow-delay="0.3s" data-wow-duration="1s">
      <div class="couse-bg-thumb" style="background-image: url({{ Storage::url($item['thumb']) }})"></div>
      <div class="course-top-content">
        <span class="category-name">Sports</span>
        <span class="price-month">$30/Mo.</span>
      </div>
      <div class="course-bottom-content">
        <h3 class="s-title">{{ $item['name'] }}</h3>
        <div class="review">
          <i class="icon-star"></i>
          <i class="icon-star"></i>
          <i class="icon-star"></i>
          <i class="icon-star"></i>
          <i class="icon-star"></i>
        </div>
      </div> 
      <div class="card-btn-holder">
        <a href="https://{{ $item['domain'] }}" class="subscribe-btn">Subscribe <i class="icon-right-arrow1 arrow-one"></i><i class="icon-right-arrow1 arrow-two"></i></a>
        {{--  <a href="subscribed-partner.html" class="more-info-btn">More Info</a>  --}}
      </div>
    </div>
  </div>
  @endforeach