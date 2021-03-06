@php($interviews_arr = App\Controllers\FrontPage::get_interviews_data())

<section class="front-interviews">
  <div class="bg-gray wow slideInLeft"></div>
  @component('components.front-section-title')
  @slot('title')リノベーションしてみて<br />どうだった？@endslot
  @slot('sub')先輩に聞くリノベインタビュー@endslot
  @slot('exp')@endslot
  @endcomponent

  <div class="interviews-wrapper">
    <div class="slider-container">
      <div class="controller wow fadeIn a-lot-late">
        <div class="exp">
          <p id="interviewsSlider-number" class="number">#{{ $interviews_arr[0]['number'] }}</p>
          <div class="border"></div>
          <p id="interviewsSlider-subtitle" class="subtitle">{{ $interviews_arr[0]['subtitle'] }}</p>
        </div>
        <div class="paging">
          <div id="interviewsSliderNextButton" class="arrows right">
            <div class="arrows-inner">
              <img class="lazyload" src="@asset('images/arrow_right.svg')" alt="">
            </div>
          </div>
          <div class="border"></div>
          <div id="interviewsSliderPrevButton" class="arrows left">
            <div class="arrows-inner">
              <img class="lazyload" src="@asset('images/arrow_left.svg')" alt="">
            </div>
          </div>
        </div>
        <div class="mic-wrapper">
          <img class="lazyload" src="@asset('images/mic.png')" alt="">
        </div>
      </div>
      <div id="interviewsSliderTouch" class="slider">
        <div class="slider-warpper wow slideInRight" data-wow-duration="1.6s">
          @foreach( $interviews_arr as $key => $interview)
          @component('components.interview-card')
          @slot('link'){{ $interview['link'] }}@endslot
          @slot('thumb')<img class="lazyload" src="{{ $interview['image'] }}" alt="{{ $interview['title'] }}">@endslot
          @slot('title'){{ $interview['title'] }}@endslot
          @slot('lead'){{ $interview['lead'] }}@endslot
          @endcomponent
          @endforeach
        </div>
      </div>
    </div>
    <div class="action-container">
      @component('components.button')
      @slot('text')インタビュー記事一覧を見る@endslot
      @slot('url')interviews @endslot
      @endcomponent
    </div>
  </div>
</section>