/*global gsap*/
const allServicesItems = gsap.utils.toArray( '.section-services-info__item' );
const servicesImageWrap = document.querySelector( '.section-services-info__img-wrap' );
const serviceImage = document.querySelector( '.section-services-info__img' );

function initServicesHoverImageEvent() {
	allServicesItems.forEach( ( serviceItem ) => {
		serviceItem.addEventListener( 'mouseenter', serviceHoverEvent );
		serviceItem.addEventListener( 'mouseleave', serviceHoverEvent );
		serviceItem.addEventListener( 'mousemove', serviceMoveImageEvent );
	} );
}

function serviceMoveImageEvent( e ) {
	const xpos = e.clientX;
	const ypos = e.clientY;
	const tl = gsap.timeline();

	tl.to( servicesImageWrap, {
		x: xpos,
		y: ypos,
	} );
}

function serviceHoverEvent( e ) {
	if ( e.type === 'mouseenter' ) {
		disableServices();
		const targetImage = e.target.firstElementChild.dataset.image;
		e.target.classList.remove( 'disabled' );

		const t1 = gsap.timeline();
		t1.set( serviceImage, {
			backgroundImage: `url(${ targetImage })`,
		} ).to( servicesImageWrap, {
			duration: 0.5,
			autoAlpha: 1,
		} );
	} else if ( e.type === 'mouseleave' ) {
		enableServices();
		const tl = gsap.timeline();
		tl.to( servicesImageWrap, {
			duration: 0.5,
			autoAlpha: 0,
		} );
	}
}

function disableServices() {
	const allServices = document.querySelectorAll( '.section-services-info__item' );
	allServices.forEach( ( serviceItem ) => serviceItem.classList.add( 'disabled' ) );
}

function enableServices() {
	const allServices = document.querySelectorAll( '.section-services-info__item' );
	allServices.forEach( ( serviceItem ) => serviceItem.classList.remove( 'disabled' ) );
}

window.addEventListener( 'load', function() {
	if ( window.matchMedia( '(min-width: 1200px)' ).matches ) {
		initServicesHoverImageEvent();
	}
} );
