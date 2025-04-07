//Salva a seleção 
var menuLateral = document.querySelectorAll('.item_menu')

function selectLink(){
    menuLateral.forEach((item) =>item.classList.remove('ativo'))
    this.classList.add('ativo')
}

menuLateral.forEach((item) =>item.addEventListener('click',selectLink))