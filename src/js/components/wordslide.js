import { gsap } from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";

const wordSlide = () => {
    const words = document.querySelectorAll('.word-slide');

    if (words) {
        words.forEach(word => {
            if (word.classList.contains('from-right')) {
                gsap.to(word, {
                    xPercent: -15,
                    ease: "none",
                    scrollTrigger: {
                        trigger: word,
                        scrub: true,
                    }
                })
            } else if (word.classList.contains('from-left')) {
                gsap.to(word, {
                    xPercent: 15,
                    ease: "none",
                    scrollTrigger: {
                        trigger: word,
                        scrub: true,
                    }
                })
            }
        })
    }

}

export default wordSlide;