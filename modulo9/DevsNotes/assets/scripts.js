function openModalDelete(noteId) {
    document.getElementById('hdnNoteId').value = noteId;
}

$(document).ready(function () {
    $('#btnConfirmDeleteNote').click(function () {
        var noteId = document.getElementById('hdnNoteId').value;

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

