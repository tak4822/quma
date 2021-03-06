<section class="front-events">
  <div class="section-title-wrapper">
    @component('components.front-section-title')
    @slot('title')どうやってQUMAを知るの？@endslot
    @slot('sub')QUMAを知れる<br />スペシャルイベント開催中！@endslot
    @slot('exp')QUMAのリノベーションを身近に感じて頂けるよう、様々な機会を設けております。肩肘張らないメンバーばかりなので、お気軽に遊びに来てください！@endslot
    @endcomponent
  </div>
  <div class="contents regular-container">
    <div class="bg-gray"></div>
    <div class="event-cards">
      <div class="wrapper wow fadeInUp">
        @component('components.event-card')
        @slot('link')/showroom @endslot
        @slot('img')
        <img class="lazyload" src="@asset('images/event_card_cafe.jpg')" alt="">
        @endslot
        @slot('text')飲む@endslot
        @endcomponent
      </div>
      <div class="wrapper wow bit-late fadeInUp">
        @component('components.event-card')
        @slot('link')/online-seminar @endslot
        @slot('img')
        <img class="lazyload" src="@asset('images/event_card-online.jpg')" alt="">
        @endslot
        @slot('text')話す@endslot
        @endcomponent
      </div>
      <div class="wrapper wow late fadeInUp">
        @component('components.event-card')
        @slot('link')/offkai　@endslot
        @slot('img')
        <img class="lazyload" src="@asset('images/event_card_offkai.jpg')" alt="">
        @endslot
        @slot('text')楽しむ@endslot
        @endcomponent
      </div>
    </div>
  </div>
</section>