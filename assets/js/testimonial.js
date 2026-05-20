/**
 * PPA Testimonial Slider — JavaScript
 *
 * Slick Carousel init করা হচ্ছে।
 * প্রতিটি widget-instance আলাদা config নিজেই বহন করে (data-config attribute)।
 *
 * @package PPA_Elementor_Addons
 * @since   1.1.0
 */

( function ( $ ) {

    'use strict';

    /**
     * একটি single testimonial slider init করো
     *
     * @param {jQuery} $slider
     */
    function initPpaTestimonialSlider( $slider ) {
        // ইতোমধ্যে init হয়ে থাকলে skip
        if ( $slider.hasClass( 'slick-initialized' ) ) {
            return;
        }

        // data-config থেকে settings পড়া
        var configRaw = $slider.data( 'config' );
        var config    = {};

        if ( configRaw ) {
            try {
                config = ( typeof configRaw === 'object' ) ? configRaw : JSON.parse( configRaw );
            } catch ( e ) {
                // parse error হলে default config চলবে
                if ( window.console && window.console.warn ) {
                    window.console.warn( 'PPA Testimonial Slider: config parse error', e );
                }
            }
        }

        // Safe defaults
        var slickOptions = $.extend( {
            slidesToShow   : 2,
            slidesToScroll : 1,
            autoplay       : true,
            autoplaySpeed  : 3000,
            dots           : true,
            arrows         : false,
            infinite       : true,
            speed          : 600,
            pauseOnHover   : true,
            adaptiveHeight : false,
            responsive     : [
                {
                    breakpoint : 992,
                    settings   : { slidesToShow: 2 }
                },
                {
                    breakpoint : 577,
                    settings   : { slidesToShow: 1 }
                }
            ]
        }, config );

        $slider.slick( slickOptions );
    }

    /**
     * DOM ready — সব slider init করো
     */
    $( function () {
        $( '.ppa-ts-slider' ).each( function () {
            initPpaTestimonialSlider( $( this ) );
        } );
    } );

    /**
     * Elementor editor এ widget add/update হলে reinit করো
     */
    if ( window.elementorFrontend ) {
        $( window ).on( 'elementor/frontend/init', function () {
            elementorFrontend.hooks.addAction(
                'frontend/element_ready/ppa_testimonial_slider.default',
                function ( $scope ) {
                    $scope.find( '.ppa-ts-slider' ).each( function () {
                        initPpaTestimonialSlider( $( this ) );
                    } );
                }
            );
        } );
    }

} )( jQuery );
