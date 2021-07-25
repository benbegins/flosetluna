import { gsap } from "gsap"
import { ScrollTrigger } from "gsap/ScrollTrigger"
import axios from "axios"

import Swiper, { Navigation, Scrollbar } from "swiper"
Swiper.use([Navigation, Scrollbar])

import {
	cursor,
	menu,
	parallax,
	wordSlide,
	productSlide,
	pageTransition,
	productSingle,
	productFilter,
	textAnimation,
	modal,
} from "./components"

gsap.registerPlugin(ScrollTrigger)

const init = () => {
	pageTransition()
	textAnimation()
	cursor()
	menu()
	parallax()
	wordSlide()
	productSingle()
	//productSlide();
	productFilter()
	modal()

	// Slider Categories
	var mySwiper = new Swiper(".swiper-container", {
		freeMode: true,

		scrollbar: {
			el: ".swiper-scrollbar",
			hide: false,
			draggable: true,
		},

		breakpoints: {
			320: {
				slidesPerView: "auto",
				spaceBetween: 20,
			},
			1024: {
				slidesPerView: "auto",
				spaceBetween: 28,
			},
		},

		navigation: {
			nextEl: ".pagination-right",
			prevEl: ".pagination-left",
			disabledClass: "pagination-disabled",
		},
	})
}

window.addEventListener("load", init)
window.addEventListener("popstate", pageTransition)
