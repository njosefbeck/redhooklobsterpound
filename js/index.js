'use strict';

const hamburger = document.querySelector('.hamburger');
const menuContainer = document.querySelector('.menu-main-nav-container');
const body = document.querySelector('body');
const closeNavButton = document.querySelector('nav svg');

// Add browser support for NodeList forEach
if (window.NodeList && !NodeList.prototype.forEach) {
    NodeList.prototype.forEach = function (callback, thisArg) {
        thisArg = thisArg || window;
        for (var i = 0; i < this.length; i++) {
            callback.call(thisArg, this[i], i, this);
        }
    };
}

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
			calendar.innerHTML = '<p>There is no schedule to show at this time.</p>';
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
