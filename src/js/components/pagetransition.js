import gsap from "gsap/gsap-core";

const pageTransition = () => {
    const pageIntro = document.querySelector('.page-intro');
    if (pageIntro) {
        // Fade intro
        pageIntro.classList.add('fade-out');
        // Fade outro
        const links = document.querySelectorAll('a');
        links.forEach(link => {
            link.addEventListener('click', e => {
                if (!link.classList.contains("no-transition")) {
                    const href = link.href;
                    e.preventDefault();
                    pageIntro.classList.remove('fade-out');
                    pageIntro.addEventListener("transitionend", function () {
                        window.location.assign(href);
                    });
                }
            })
        })
    }

}

export default pageTransition;