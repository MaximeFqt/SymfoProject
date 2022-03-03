document.addEventListener('DOMContentLoaded', main);

function main() {
    console.log('Start of the main function !');

    // Traitement pour remonter en haut de la page grâce au bouton
    const btn = document.querySelector('.btn');

    /* Remonte en haut de page */
    window.addEventListener('scroll', () => {
        if (window.pageYOffset > 100) {
            btn.classList.add("active");

        } else {
            btn.classList.remove("active");
        }
    });

    /* Traitement en jquery */
    btn.addEventListener('click', () => {
        window.scrollTo(
            top = 0,
            left = 0
        );
    });

}