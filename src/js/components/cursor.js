const cursor = () => {
    const cursor = document.querySelector('.cursor');
    const links = document.querySelectorAll('a, button, input[type="submit"]');

    if (window.innerWidth >= 1280) {
        window.addEventListener('mousemove', function (e) {
            cursor.style.transform = "translate(" + e.clientX + "px, " + e.clientY + "px)";
        });

        links.forEach(link => {
            link.addEventListener('mouseover', function (e) {
                cursor.classList.add('hover');
            });
            link.addEventListener('mouseout', function (e) {
                cursor.classList.remove('hover');
            });
        });
    }
}

window.addEventListener('load', cursor);
window.addEventListener('resize', cursor);

export default cursor;