<section class="latest-post-area pb-120">
    <div class="container no-padding">
        <div class="row">
            <div class="col-lg-8 post-list">
                <!-- Start latest-post Area -->
                @include('layouts.latest-news')
                <!-- End latest-post Area -->

                <!-- Start banner-ads Area -->
                <div class="col-lg-12 ad-widget-wrap mt-30 mb-30">
                    <img class="img-fluid" src="{{ asset('img/banner-ad.jpg') }}" alt="">
                </div>
                <!-- End banner-ads Area -->
                <!-- Start popular-post Area -->
                @include('layouts.popular-post')
                <!-- End popular-post Area -->
                <!-- Start relavent-story-post Area -->
                @include('layouts.relavent-story')
                <!-- End relavent-story-post Area -->
            </div>
            @include('layouts.sidebars')
        </div>
    </div>
</section>
