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

    }
}

export default productSingle;