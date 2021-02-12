import { gsap } from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";

const productSlide = () => {
    const produitsListes = document.querySelectorAll('.produits-list__list');

    if (produitsListes && window.innerWidth > 1023) {

        produitsListes.forEach(liste => {
            const produitItems = liste.querySelectorAll('.produits-list__item');

            produitItems.forEach((item, index) => {

                // Détermine le décallage vertical en fonction du nth-child(4n)
                let nth = index % 4;
                let decallage;
                switch (nth) {
                    case 0:
                        decallage = 3;
                        break;
                    case 1:
                        decallage = 9;
                        break;
                    case 2:
                        decallage = 1;
                        break;
                    case 3:
                        decallage = 6;
                        break;
                    default:
                        decallage = 0;
                }
                // Animation du produit au scroll
                gsap.from(item, {
                    y: `${innerHeight / 75 * decallage}`,
                    ease: "none",
                    scrollTrigger: {
                        trigger: item,
                        scrub: true,
                    },
                });

            })

        })

    }
}

export default productSlide;