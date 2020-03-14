let btnModalClose = document.querySelector('.modal-close'),
    modal = document.querySelector('.modal');

btnModalClose.addEventListener('click', function() {
    modalClose();
});

modal.addEventListener('click', function(e) {
    if(!e.target.closest('.modal-body')) {
        modalClose();
    }
});

function modalClose() {
    document.querySelector('.modal').classList.remove('open');
}