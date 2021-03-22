const productSingle = () => {

    const produitSingleWrapper = document.querySelector('.produit-single__wrapper');

    if (produitSingleWrapper) {
        const siteHeader = document.querySelector('.site-header');
        const outOfStock = document.querySelector('.out-of-stock');

        // Padding Top Section
        produitSingleWrapper.style.paddingTop = siteHeader.offsetHeight + 'px';

        // Rupture de stock
        if (outOfStock) {
            outOfStock.innerText = 'Produit de retour bientôt';
        }

        // Feuilleteur
        const feuilleteur = document.querySelector('.feuilleteur');
        if (feuilleteur) {
            const btnOpen = document.querySelector('.feuilleteur__open');
            const btnClose = document.querySelector('.feuilleteur__close');

            btnOpen.addEventListener('click', () => {
                feuilleteur.classList.add('open');
            })

            btnClose.addEventListener('click', () => {
                feuilleteur.classList.remove('open');
            })
        }
    }
}

export default productSingle;