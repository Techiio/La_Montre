let navbar = document.querySelector('.navbar');

document.querySelector('#menu-btn').onclick = () =>{
    navbar.classList.toggle('active');
    searchForm.classList.remove('active');
    cartItem.classList.remove('active');
}

let searchForm = document.querySelector('.search-form');

document.querySelector('#search-btn').onclick = () =>{
    searchForm.classList.toggle('active');
    navbar.classList.remove('active');
    cartItem.classList.remove('active');
}

let cartItem = document.querySelector('.cart-items-container');

document.querySelector('#cart-btn').onclick = () =>{
    cartItem.classList.toggle('active');
    navbar.classList.remove('active');
    searchForm.classList.remove('active');
}

window.onscroll = () =>{
    navbar.classList.remove('active');
    searchForm.classList.remove('active');
    cartItem.classList.remove('active');
}

function afficher(){

    if(document.getElementById('gest').checked){
        codefamille = document.getElementById('codefamille');
        codefamille.style.display = 'none';
        codefamille
    }
    else{
        codefamille = document.getElementById('codefamille');
        codefamille.style.display = 'flex';
        codefamille
    }
}
function eyeclick(){
    if(document.getElementById('light').type=='text'){
        document.getElementById('light').type='password';
    }
    else{
        document.getElementById('light').type='text';
    }

}