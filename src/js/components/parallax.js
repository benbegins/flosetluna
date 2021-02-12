import { gsap } from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";

gsap.registerPlugin(ScrollTrigger);

const parallax = () => {
    const parallaxContainer = document.querySelectorAll('.parallax-container');

    if (parallaxContainer && window.innerWidth >= 1024) {
        parallaxContainer.forEach(container => {

            let img = container.querySelector('.img-parallax');

            gsap.fromTo(img, {
                yPercent: -15,
                scale: 1.15,
            }, {
                yPercent: 15,
                scale: 1.15,
                ease: "none",
                scrollTrigger: {
                    trigger: container,
                    scrub: true,
                }
            })

        });
    }
}

export default parallax;