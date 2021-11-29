import axios from "axios"
import { cursor, productSlide, pageTransition } from "./index"

const productFilter = () => {
	// Elements
	const productContainer = document.querySelector(".archive-product__list")
	const categorySelect = document.querySelector(
		".archive-product__cat__select"
	)
	const categorySelectContainer = document.querySelector(
		".archive-product__cat__select-container"
	)
	const categoryLink = document.querySelectorAll(
		".archive-product__cat__link"
	)
	const categoryList = document.querySelector(".archive-product__cat")
	const introBoutique = document.querySelector(".intro-boutique")
	const siteHeader = document.querySelector(".site-header")
	let catPosition
	let headerHeight = siteHeader.offsetHeight

	// Calcule la position du menu Category (avant qu'il soit fixe)
	let calculCatPosition = function () {
		catPosition = introBoutique.offsetTop + introBoutique.offsetHeight
	}

	// Filter product
	function getListProducts(catSelected) {
		// Mask current products
		productContainer.style.opacity = "0"
		// Params
		let params = new URLSearchParams()
		params.append("action", "filter_products")
		params.append("category", catSelected)
		// New URL & Title
		let newUrl
		if (catSelected == "0") {
			newUrl = "/boutique/"
			document.title = "La boutique | Flos & Luna"
		} else {
			newUrl = "/categorie-produit/" + catSelected + "/"
			document.title = catSelected + " | Flos & Luna"
		}
		// Requete une fois que la div a disparu
		setTimeout(function () {
			window.scrollTo(0, catPosition - headerHeight)
			axios.post("/wp-admin/admin-ajax.php", params).then((response) => {
				if (response.data.data) {
					productContainer.innerHTML = response.data.data
					productContainer.style.opacity = "1"
					window.history.pushState(response.data, catSelected, newUrl)
					cursor()
					//productSlide();
					pageTransition()
				} else {
					productContainer.innerHTML = "Pas de produit"
				}
			})
		}, 150)
	}

	// Events -> Change Category
	if (productContainer) {
		// Sélection d'un filtre catégorie
		categorySelect.addEventListener("change", () => {
			getListProducts(categorySelect.value)
		})
		categoryLink.forEach((link) => {
			link.addEventListener("click", () => {
				categoryLink.forEach((otherLink) => {
					otherLink.classList.remove("active")
				})
				link.classList.add("active")
				getListProducts(link.dataset.category)
			})
		})

		// Menu Cat Fixe
		calculCatPosition()
		window.addEventListener("scroll", () => {
			if (
				window.scrollY + headerHeight > catPosition &&
				window.innerWidth >= 1024
			) {
				categoryList.classList.add("is-fixed")
				categoryList.style.top =
					headerHeight + siteHeader.offsetTop + "px"
				productContainer.style.marginTop =
					categoryList.offsetHeight + "px"
			} else if (window.scrollY > 200 && window.innerWidth <= 1024) {
				categorySelectContainer.style.opacity = 1
				categorySelectContainer.style.top =
					headerHeight + siteHeader.offsetTop + "px"
			} else {
				categoryList.classList.remove("is-fixed")
				productContainer.style.marginTop = "0px"
				categorySelectContainer.style.opacity = 0
			}
		})
		window.addEventListener("resize", function () {
			calculCatPosition()
		})
		window.addEventListener("popstate", function () {
			document.location.reload()
		})
	}
}

export default productFilter
