$(document).ready(function() {
    $('#slideshow').rhinoslider({
        effect: 'slide',
        showTime: 3000,
        easing: 'easeInCubic',
        autoPlay: true,
        captionsFadeTime: 2500,
        showCaptions: 'never'
    });

    $('.act-excluir').click(function() {
        return confirm('Deseja excluir esse Menu?');
    });
});

function validaCheckboxes() {
    if (form.is_admin.checked == false) {
        var cont = 0;

        var view = document.getElementsByName('view[]');
        var len = view.length;
        for (i = 0; i < len; i++) {
            if (view[i].checked) {
                cont++;
            }
        }

        var create = document.getElementsByName('create[]');
        var len = create.length;
        for (i = 0; i < len; i++) {
            if (create[i].checked) {
                cont++;
            }
        }

        var edit = document.getElementsByName('edit[]');
        var len = edit.length;
        for (i = 0; i < len; i++) {
            if (edit[i].checked) {
                cont++;
            }
        }

        var del = document.getElementsByName('delete[]');
        var len = del.length;
        for (i = 0; i < len; i++) {
            if (del[i].checked) {
                cont++;
            }
        }
        if (cont == 0) {
            alert('Por favor, adicione ao menos uma permissão.');
            return false;
        }
        else {
            return true;
        }

    }
    else {
        return true;
    }
}

function confirmDel(name){
    var r = confirm("Você deseja realmente excluir o perfil "+name+"?");
    return r;
}