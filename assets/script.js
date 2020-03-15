let btnModalClose = document.querySelector('.modal-close'),
    modal = document.querySelector('.modal'),
    btnUpdate = document.getElementsByName('editTask')[0],
    fieldTask = document.getElementsByName('task')[0];
const oldTask = fieldTask.value;

btnModalClose.addEventListener('click', function() {
    modalClose();
});

modal.addEventListener('click', function(e) {
    if(!e.target.closest('.modal-body')) {
        modalClose();
    }
});

fieldTask.addEventListener('input', resolveUpdate);

function modalClose() {
    document.querySelector('.modal').classList.remove('open');
}

function resolveUpdate() {
    newTask = document.getElementsByName('task')[0].value;
    
    if(oldTask != newTask) {
        btnUpdate.removeAttribute('disabled');
    }

}