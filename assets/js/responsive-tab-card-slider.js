( function ( $ ) {
	'use strict';

	/**
	 * Cast data attr to boolean.
	 *
	 * @param {unknown} value Value to parse.
	 * @return {boolean}
	 */
	function toBool( value ) {
		return String( value ) === 'true';
	}

	/**
	 * Sync active tab state from slider.
	 *
	 * @param {Swiper} swiper Swiper instance.
	 * @param {jQuery} $tabs Tab buttons.
	 */
	function syncTabs( swiper, $tabs ) {
		const activeIndex = swiper.params.loop ? swiper.realIndex : swiper.activeIndex;

		$tabs.each( function ( index, tab ) {
			const isActive = index === activeIndex;
			tab.classList.toggle( 'is-active', isActive );
			tab.setAttribute( 'aria-selected', isActive ? 'true' : 'false' );
			tab.setAttribute( 'tabindex', isActive ? '0' : '-1' );
		} );
	}

	/**
	 * Initialize one widget instance.
	 *
	 * @param {jQuery} $scope Widget scope.
	 */
	function initWidget( $scope ) {
		const $root = $scope.find( '.rtcs-widget' ).first();

		if ( ! $root.length ) {
			return;
		}

		if ( typeof window.Swiper === 'undefined' ) {
			return;
		}

		const sliderElement = $root.find( '.rtcs-main-slider' )[0];

		if ( ! sliderElement ) {
			return;
		}

		if ( $root.data( 'rtcs-init' ) ) {
			return;
		}

		$root.data( 'rtcs-init', true );

		const $tabs = $root.find( '.rtcs-tab' );
		const prevEl = $root.find( '.rtcs-nav-prev' )[0];
		const nextEl = $root.find( '.rtcs-nav-next' )[0];
		const paginationEl = $root.find( '.rtcs-pagination' )[0];
		const autoplayEnabled = toBool( $root.data( 'autoplay' ) );
		const transitionSpeed = Number( $root.data( 'speed' ) ) || 600;
		const autoplayDelay = Number( $root.data( 'delay' ) ) || 5000;
		const loopEnabled = toBool( $root.data( 'loop' ) );
		const breakpoint = Number( $root.data( 'breakpoint' ) ) || 768;

		const swiper = new Swiper( sliderElement, {
			slidesPerView: 1,
			speed: transitionSpeed,
			loop: loopEnabled,
			autoHeight: true,
			grabCursor: true,
			allowTouchMove: true,
			navigation: {
				prevEl: prevEl,
				nextEl: nextEl,
			},
			pagination: paginationEl
				? {
						el: paginationEl,
						clickable: true,
					}
				: false,
			autoplay: autoplayEnabled
				? {
						delay: autoplayDelay,
						disableOnInteraction: false,
						pauseOnMouseEnter: true,
					}
				: false,
			on: {
				init: function () {
					syncTabs( this, $tabs );
				},
				slideChange: function () {
					syncTabs( this, $tabs );
				},
			},
		} );

		/**
		 * Move slider by tab index.
		 *
		 * @param {number} index Slide index.
		 */
		function slideToIndex( index ) {
			if ( loopEnabled && typeof swiper.slideToLoop === 'function' ) {
				swiper.slideToLoop( index );
				return;
			}

			swiper.slideTo( index );
		}

		$tabs.each( function ( index, tab ) {
			tab.addEventListener( 'click', function () {
				slideToIndex( index );
			} );

			tab.addEventListener( 'keydown', function ( event ) {
				const key = event.key;

				if ( key !== 'ArrowRight' && key !== 'ArrowLeft' && key !== 'Home' && key !== 'End' ) {
					return;
				}

				event.preventDefault();

				let nextIndex = index;

				if ( key === 'ArrowRight' ) {
					nextIndex = ( index + 1 ) % $tabs.length;
				} else if ( key === 'ArrowLeft' ) {
					nextIndex = ( index - 1 + $tabs.length ) % $tabs.length;
				} else if ( key === 'Home' ) {
					nextIndex = 0;
				} else if ( key === 'End' ) {
					nextIndex = $tabs.length - 1;
				}

				if ( $tabs[ nextIndex ] ) {
					$tabs[ nextIndex ].focus();
				}

				slideToIndex( nextIndex );
			} );
		} );

		/**
		 * Toggle view mode class by breakpoint.
		 */
		function updateModeClass() {
			const isMobile = window.innerWidth <= breakpoint;
			$root.toggleClass( 'is-mobile', isMobile );

			if ( paginationEl ) {
				paginationEl.style.pointerEvents = isMobile ? 'auto' : 'none';
			}
		}

		/**
		 * Toggle controls for single-slide setups.
		 */
		function updateSingleSlideState() {
			const isSingle = $tabs.length <= 1;
			$root.toggleClass( 'is-single-slide', isSingle );

			if ( prevEl ) {
				prevEl.disabled = isSingle;
			}

			if ( nextEl ) {
				nextEl.disabled = isSingle;
			}
		}

		let resizeTimer = null;

		window.addEventListener( 'resize', function () {
			window.clearTimeout( resizeTimer );
			resizeTimer = window.setTimeout( function () {
				updateModeClass();
				swiper.update();
			}, 80 );
		} );

		updateModeClass();
		updateSingleSlideState();
		syncTabs( swiper, $tabs );
	}

	$( window ).on( 'elementor/frontend/init', function () {
		elementorFrontend.hooks.addAction( 'frontend/element_ready/responsive_tab_card_slider.default', initWidget );
	} );
} )( jQuery );
