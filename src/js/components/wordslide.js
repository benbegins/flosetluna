import { gsap } from "gsap"
import { ScrollTrigger } from "gsap/ScrollTrigger"

const wordSlide = () => {
	const words = document.querySelectorAll(".word-slide")

	if (words) {
		words.forEach((word) => {
			if (word.classList.contains("from-right")) {
				gsap.to(word, {
					xPercent: -10,
					ease: "none",
					scrollTrigger: {
						trigger: word,
						scrub: 0.5,
					},
				})
			} else if (word.classList.contains("from-left")) {
				gsap.to(word, {
					xPercent: 10,
					ease: "none",
					scrollTrigger: {
						trigger: word,
						scrub: 0.5,
					},
				})
			}
		})
	}
}

export default wordSlide
