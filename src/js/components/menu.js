import { gsap } from "gsap";

const menu = () => {
    const body = document.querySelector('body');
    const header = document.querySelector('.site-header');
    const burger = document.querySelector('.site-header__burger');
    const menuMobile = document.querySelector('.site-header__menu-mobile');
    const menuItems = document.querySelectorAll('.menu-mobile__list li');
    const menuSocial = document.querySelectorAll('.menu-mobile__social li');

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
                }, "-=0.75");
        } else {
            body.style.overflow = "inherit";
        }
    });

    window.addEventListener('scroll', function () {
        if (window.scrollY > 100) {
            header.classList.add('background');
        } else {
            header.classList.remove('background');
        }
    })
}

export default menu;