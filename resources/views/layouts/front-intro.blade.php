<section class="front-intro regular-container">
  @component('components.front-section-title')
  @slot('title')リノベーションって？@endslot
  @slot('sub')ここがすごい！<br />リノベーションという選択肢@endslot
  @slot('exp')@endslot
  @endcomponent

  <div class="content-container">
    <div class="text wow fadeInUp">
      <p>中古住宅を、ライフスタイルに合わせてつくり変えること。</p>
      <p>間取りや内装を自分の暮らし方に合わせたり、水・電気・ガスなどのライフラインは新調したり、風通しや断熱性といった住性能も必要に応じて改善したり。理想の暮らし方が実現できるように、一緒に住まいをつくりあげていきます。</p>
      <p>お金、立地、自由設計、環境配慮など、リノベーションを選ぶ理由は人それぞれ。</p>
      <p>リノベーションっていう選択肢が、もっと広がっていくといいな。</p>
    </div>
    <div class="illust wow fadeIn" data-wow-duration="2s">
      <img class="lazyload" src="@asset('images/intro.jpg')" alt="">
    </div>
  </div>
</section>