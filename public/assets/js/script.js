$(document).ready(function () {
	$('header > i').click(function () {
		$('aside.mobile-menu-link-container').addClass('open');
		$('#sidenav-overlay').css('display', 'block');
		$('body').css('overflow', 'hidden');
	});
	$('aside.mobile-menu-link-container > div > i.close').click(function () {
		$('aside.mobile-menu-link-container').removeClass('open');
		$('#sidenav-overlay').css('display', 'none');
		$('body').css('overflow', 'scroll');
	});
	$('section#card-scheme-mobile > div.slider-active').owlCarousel({
		loop:true,
		navText:['<i class="material-icons">chevron_left</i>', '<i class="material-icons">chevron_right</i>'],
		nav:true,
		autoplay:true,
		autoplayHoverPause:true,
		responsive:{
			0: {
				items: 1
			}
		}
	});
	$('.slider-active').owlCarousel({
		loop:true,
		navText:['<i class="material-icons">chevron_left</i>', '<i class="material-icons">chevron_right</i>'],
		nav:true,
		responsive:{
			0: {
				items: 1
			},
			1024: {
				items: 4
			}
		}
	});
});
$(function () {
	$('#daterangepicker-container').daterangepicker({
		opens: 'center',
		minDate: moment().startOf('hour'),
		autoUpdateInput: true,
		autoApply: true
	}, function(start, end) {
        document.getElementById('pickup-date').value = start._locale._weekdaysShort[start._d.getDay()] + ', ' + start._d.getDate() + ' ' + start._locale._monthsShort[start._d.getMonth()];
        document.getElementById('dropoff-date').value = end._locale._weekdaysShort[end._d.getDay()] + ', ' + end._d.getDate() + ' ' + end._locale._monthsShort[end._d.getMonth()];
        document.getElementById('string-pickup-date').value = start.format('YYYY-MM-DD');
        document.getElementById('string-dropoff-date').value = end.format('YYYY-MM-DD');
		//console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
	});
});