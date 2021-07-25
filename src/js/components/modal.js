const modal = () => {
	const modal = document.querySelector("#modal")
	const btnClose = modal.querySelector(".close-modal")

	// COOKIES
	// Crée une variable qui liste tous les cookies dans un objet
	let cookies = document.cookie
		.split(";")
		.map((cookie) => cookie.split("="))
		.reduce(
			(accumulator, [key, value]) => ({
				...accumulator,
				[key.trim()]: decodeURIComponent(value),
			}),
			{}
		)

	// Display/Hide modal
	if (modal && cookies.displayModal !== "false") {
		setTimeout(() => {
			// Affiche la modal au bout de 2s
			modal.classList.add("visible")
			// Ferme la modal au click sur le bouton
			btnClose.addEventListener("click", () => {
				modal.classList.remove("visible")
				// Ajout du cookie pendant 1H
				document.cookie = "displayModal=false; path=/; max-age=3600"
			})
		}, 2000)
	}
}

export default modal
