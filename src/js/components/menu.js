import { gsap } from "gsap";

const menu = () => {
    const body = document.querySelector('body');
    const header = document.querySelector('.site-header');
    const burger = header.querySelector('.site-header__burger');
    const menuMobile = header.querySelector('.site-header__menu-mobile');
    const menuItems = header.querySelectorAll('.menu-mobile__list li');
    const menuSocial = header.querySelectorAll('.menu-mobile__social li');
    const searchBar = header.querySelector('.site-header__search input[type="text"]');

    // Menu mobile
    burger.addEventListener('click', function () {
        menuMobile.classList.toggle('active');
        burger.classList.toggle('active');

        if (menuMobile.classList.contains('active')) {
            body.style.overflow = "hidden";

            let tl = gsap.timeline({ defaults: { duration: 0.75, ease: "power2.out" } });
            tl.from(menuItems, {
                opacity: 0,
                y: -100,
                stagger: -0.1,
                delay: 0.5
            })
                .from(menuSocial, {
                    opacity: 0,
                    y: -50,
                    stagger: 0.1,
                }, "-=0.75")
                .from('.site-header__search', {
                    opacity: 0,
                }, "-=0.75");
        } else {
            body.style.overflow = "inherit";
        }
    });

    // Background on scroll
    window.addEventListener('scroll', function () {
        if (window.scrollY > 100) {
            header.classList.add('background');
        } else {
            header.classList.remove('background');
        }
    });

}

export default menu;