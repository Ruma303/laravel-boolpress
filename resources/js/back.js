require('./common');
const inputTitle = document.querySelector('[data-slugger=title]');
const inputSlug  = document.querySelector('[data-slugger=slug]');
const btnGetSlug = document.querySelector('[data-slugger=button]');

if (inputTitle && inputSlug && btnGetSlug) { // verifichiamo che ci siano tutti i valori
inputTitle.addEventListener('focusout', function(){ //appena clicco fuori dall'input title
    if(inputSlug.value === '') {// se è vuoto, genera lo slug
        getSlug(); // assegna il valore della funzione
    }});
    // Al click del bottone Generate Slug, genera uno slug
    btnGetSlug.addEventListener('click', getSlug());

    function getSlug() {
        axios.get(btnGetSlug.dataset.sluggerUrl + '?title=' + inputTitle.value)
             .then(response=> inputSlug.value = response.data.slug);
    }
}
