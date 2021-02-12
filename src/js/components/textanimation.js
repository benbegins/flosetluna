import gsap from "gsap/gsap-core";

const textAnimation = () => {
    // Fade Elements
    const elements = document.querySelectorAll('.fade-in');
    if (elements) {
        elements.forEach(element => {
            gsap.from(element, {
                opacity: 0,
                duration: 0.75,
                y: 50,
                delay: 0.25 + Number(element.dataset.delay),
                ease: "power3.out",
            });
        })
    }
    const siteHeader = document.querySelector('.site-header');
    if (siteHeader) {
        gsap.from(siteHeader, {
            opacity: 0,
            duration: 0.75,
            ease: "power2.out",
            delay: 0.5,
        })
    }
}

export default textAnimation;