'use strict';

const hamburger = document.querySelector('.hamburger');
const menuContainer = document.querySelector('.menu-main-nav-container');
const body = document.querySelector('body');
const closeNavButton = document.querySelector('nav svg');

function toggleMenu() {
	menuContainer.classList.toggle("visible");
	body.classList.toggle("fixed");
	closeNavButton.classList.toggle("visible");
}

hamburger.addEventListener('click', toggleMenu);
closeNavButton.addEventListener('click', toggleMenu);

const handleEmptyCalendars = function() {
	const calendars = document.querySelectorAll('.fc-agendaWeek-view');
	calendars.forEach((calendar) => {
		if (!calendar.hasChildNodes()) {
			console.log('I do not have children!');
			calendar.innerHTML = 'There is no schedule to show at this time.';
		}
	});
};

if (
	document.readyState === 'complete' ||
	(document.readyState !== 'loading' && !document.documentElement.doScroll)
) {
	handleEmptyCalendars();
} else {
	document.addEventListener('DOMContentLoaded', handleEmptyCalendars);
}
