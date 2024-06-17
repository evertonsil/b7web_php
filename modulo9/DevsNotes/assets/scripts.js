$(document).ready(function () {
    $('#btnConfirmDeleteNote').click(function () {
        let noteId = document.getElementById('hdnNoteId').value;

        $.ajax({
            url: 'submitDeleteNote.php',
            type: 'POST',
            data: {
                noteId: noteId,
            },
            success: function (response) {
                console.log(response);
                window.location.href = 'http://localhost/b7web/php/modulo9/DevsNotes';
            },
            error: function (xhr, status, error) {
                console.error(xhr.responseText);
            }
        })
    });
});

function openModalDelete(noteId) {
    document.getElementById('hdnNoteId').value = noteId;
}

function openModalEdit(noteId) {
    document.getElementById('hdnNoteId').value = noteId;
    $.ajax({
        url: 'submitGetNote.php',
        type: 'POST',
        dataType: 'JSON',
        data: {
            noteId: noteId,
        },
        success: function (response) {
            if (response.result) {
                $('#noteIdEdit').val(response.result.id);
                $('#noteTitleEdit').val(response.result.title);
                $('#noteBodyEdit').val(response.result.body);
            }
            else {
                console.error("o campo 'result' não foi encontrado no retorno!")
            }
        },
        error: function (xhr, status, error) {
            console.error(xhr.responseText, status, error);
        }
    });
}

//valida campos de edição e envia requisição para update
$('#btnConfirmEditNote').click(function () {
    let noteId = $('#noteIdEdit').val();
    let noteTitle = $('#noteTitleEdit').val();
    let noteBody = $('#noteBodyEdit').val();
    let errEdit = $('.errorEdit');

    if (noteId == '' || noteTitle == '' || noteBody == '') {

        errEdit.html('Por favor preencha todos os campos!').fadeIn();;

        setTimeout(function () {
            errEdit.fadeOut();
        }, 4000);
    }
    else {
        alert('Okay');
    }


});

