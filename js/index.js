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