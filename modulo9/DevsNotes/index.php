<?php require 'header.php';

//Chamando função para puxar todas as notas
$notes = getAllNotes();

?>

<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">🖊️DevsNotes API</h1>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <form id="todo-form">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" id="todo-input"
                                    placeholder="Clique no botão + para adicionar uma nota!" readonly>
                                <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                    data-bs-target="#insertNoteModal">
                                    <strong>+</strong>
                                </button>
                            </div>
                        </form>
                        <ul class="list-group" id="todo-list">
                            <!--traz as notas da API-->
                            <?php if (!empty($notes['result'])): ?>
                                <?php foreach ($notes['result'] as $item): ?>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <span class="task-text"><?php echo $item['title']; ?></span>
                                        <input type="text" class="form-control edit-input" style="display: none;">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-danger btn-sm delete-btn"
                                                data-bs-toggle="modal" data-bs-target="#deleteNoteModal"
                                                value="<?php echo $item['id']; ?>"
                                                onclick="openModalDelete(this.value)">✕</button>
                                            <button class="btn btn-success btn-sm edit-btn">✎</button>
                                        </div>
                                    </li>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <span class="task-text">Nenhuma nota encontrada!</span>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <form method="POST" action="api/insert.php">
        <div class="modal fade" id="insertNoteModal" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Adicionar nova nota</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="noteTitle" class="form-label">Título</label>
                            <input type="text" class="form-control" id="noteTitle" name="noteTitle" required>
                        </div>
                        <div class="mb-3">
                            <label for="noteBody" class="form-label">Conteúdo</label>
                            <textarea class="form-control" id="noteBody" rows="4" name="noteBody" required></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-success">Cadastrar</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!--Modal confirmação de exclusão-->
    <input id="hdnNoteId" type="hidden" value="" name="hdnNoteId">
    <div class="modal fade" id="deleteNoteModal" tabindex="-1" aria-labelledby="deleteNoteModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="deleteNoteModalLabel">Você tem certeza que deseja excluir a
                        nota?
                    </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Não</button>
                    <button type="submit" id="btnConfirmDeleteNote" class="btn btn-success">Sim</button>
                </div>
            </div>
        </div>
    </div>
    <?php
    //envia requisição para API, retornando todas as notas
    function getAllNotes()
    {
        $curl = curl_init();
        $url = 'http://localhost/b7web/php/modulo9/DevsNotes/api/getall.php';

        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($curl);

        curl_close($curl);

        //transformando retorno JSON em um array (utilizar o 'true' para ser array)
        $data = json_decode($response, true);

        return $data;
    }

    ?>

    <?php require 'footer.php'; ?>