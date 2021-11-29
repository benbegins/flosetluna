import { gsap } from "gsap"

const cursor = () => {
	const cursor = document.querySelector(".cursor")
	const links = document.querySelectorAll('a, button, input[type="submit"]')

	if (window.innerWidth >= 1280) {
		window.addEventListener("pointermove", (e) => {
			gsap.to(cursor, {
				x: e.clientX,
				y: e.clientY,
				duration: 0.5,
				ease: "Power2.easeOut",
			})
		})

		links.forEach((link) => {
			link.addEventListener("mouseover", function (e) {
				cursor.classList.add("hover")
			})
			link.addEventListener("mouseout", function (e) {
				cursor.classList.remove("hover")
			})
		})
	}
}

window.addEventListener("load", cursor)
window.addEventListener("resize", cursor)

export default cursor
