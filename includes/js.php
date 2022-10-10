<script src="vendor/global/global.min.js"></script>
<script src="vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
<script src="vendor/chart.js/Chart.bundle.min.js"></script>
<script src="js/custom.min.js"></script>
<script src="js/deznav-init.js"></script>
<script src="vendor/owl-carousel/owl.carousel.js"></script>

<!-- Apex Chart -->
<script src="vendor/apexchart/apexchart.js"></script>

<!-- Dashboard 1 -->
<script src="js/dashboard/dashboard-1.js"></script>
<script>
    function assignedDoctor()
    {

        /*  testimonial one function by = owl.carousel.js */
        jQuery('.assigned-doctor').owlCarousel({
            loop:false,
            margin:30,
            nav:true,
            autoplaySpeed: 3000,
            navSpeed: 3000,
            paginationSpeed: 3000,
            slideSpeed: 3000,
            smartSpeed: 3000,
            autoplay: false,
            dots: false,
            navText: ['<i class="fa fa-caret-left"></i>', '<i class="fa fa-caret-right"></i>'],
            responsive:{
                0:{
                    items:1
                },
                576:{
                    items:2
                },
                767:{
                    items:3
                },
                991:{
                    items:2
                },
                1200:{
                    items:3
                },
                1600:{
                    items:5
                }
            }
        })
    }

    jQuery(window).on('load',function(){
        setTimeout(function(){
            assignedDoctor();
        }, 1000);
    });

</script>