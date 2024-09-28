<script src="{{asset('front/js/script.js')}}" defer></script>
    <script src="{{asset('front/owl-carousel/js/owl.carousel.js')}}"></script>
    <!-- End Owl pranab-->
    <script>
        $(document).ready(function() {
            var owl = $('#owl-product');
            owl.owlCarousel({
                items: 4,
                loop: true,
                nav: false,
                margin: 20,
                autoplay: true,
                autoplayTimeout: 2000,
                autoplayHoverPause: true,
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 2
                    },
                    1000: {
                        items: 4
                    }
                }
            });
            $('.play').on('click', function() {
                owl.trigger('play.owl.autoplay', [2000])
            })
            $('.stop').on('click', function() {
                owl.trigger('stop.owl.autoplay')
            })
        })
    </script>
    <script>
        $(document).ready(function() {
            var owl = $('#owl-testimonial');
            owl.owlCarousel({
                items: 2,
                loop: true,
                nav: false,
                margin: 25,
                autoplay: true,
                autoplayTimeout: 2000,
                autoplayHoverPause: true,
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 1
                    },
                    1000: {
                        items: 2
                    }
                }
            });
            $('.play').on('click', function() {
                owl.trigger('play.owl.autoplay', [2000])
            })
            $('.stop').on('click', function() {
                owl.trigger('stop.owl.autoplay')
            })
        })
    </script>