
function mostrarReserva() { 
    
    let divCadastro = document.querySelector('.mostrar');
    let divReserva = document.querySelector('.esconder');

    divCadastro.classList.remove('mostrar');
    divCadastro.classList.add('esconder');

    divReserva.classList.remove('esconder');
    divReserva.classList.add('mostrar');
    

};

function mostrarCadastro() { 
    
    let divCadastro = document.querySelector('.esconder');
    let divReserva = document.querySelector('.mostrar');

    divReserva.classList.remove('mostrar');
    divReserva.classList.add('esconder');

    divCadastro.classList.remove('esconder');
    divCadastro.classList.add('mostrar');
    
    

};