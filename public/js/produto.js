function abrirComentario() {
    var botaoComentario = document.getElementById('botao-comentario');
    var campoComentario = document.getElementById('campo-comentario');

    if(campoComentario.hasAttribute('hidden')) {
        campoComentario.removeAttribute('hidden');
        botaoComentario.hidden = true;
    }
}

function cancelarComentario() {
    var botaoComentario = document.getElementById('botao-comentario');
    var campoComentario = document.getElementById('campo-comentario');

    if (botaoComentario.hasAttribute('hidden')) {
        botaoComentario.removeAttribute('hidden');
        campoComentario.hidden = true;
    }
}

function comentar(produtoId) {
    var comentario = document.querySelector(`#comentario`).value;
    var token = document.querySelector(`input[name="_token"]`).value;
    var produto_id = document.querySelector('#produto_id').value;

    var formData = new FormData();

    formData.append('valor', comentario);
    formData.append('produto_id', produto_id);
    formData.append('_token', token);
    const url = `/produtos/${produtoId}/comentarios`;

    fetch(url, {
        body: formData,
        method: 'POST'
    }).then((response) => {
        // console.log(response);
        return response.json();
    }).then((json) => {
        // console.log(json);
        alert('Mensagem enviada com sucesso');
        cancelarComentario();
        buscarComentarios(produtoId);
    });
}

function buscarComentarios(produtoId) {
    const url = `/comentarios/${produtoId}`;
    
    fetch(url, {
        method: 'GET'
    }).then((response) => {
        console.log(response);
        return response.json();
    }).then((json) => {
        console.log(json);
        var lista = document.querySelector('#lista-comentarios')
        json.forEach(comentario => {
            var itemLista = document.createElement('li')
            itemLista.innerHTML = comentario;
            lista.append(itemLista);
            console.log(itemLista);
        });
        console.log(lista);
    });
}