var maxItems = 10;

function addInput() {
    var itemsInput = document.getElementById('tetelek');
    var currentItemCount = itemsInput.children.length;

    if (currentItemCount < maxItems) {
        var input1 = document.createElement('input');
        input1.type = 'text';
        input1.className = 'form-control mb-2';
        input1.name = 'tetel_nev[]';
        input1.placeholder = 'Tétel neve';
        input1.id = 'tetel_nev_' + currentItemCount;

        var select = document.createElement('select');
        select.className = 'form-control mb-2';
        select.name = 'meretegyseg[]';
        select.id = 'meret_egyseg_' + currentItemCount;

        var options = ['Darab', 'Liter', 'Négyzetcentiméter', 'Centiméter'];

        for (var i = 0; i < options.length; i++) {
            var option = document.createElement('option');
            option.value = options[i].toLowerCase();
            option.text = options[i];
            select.appendChild(option);
        }

        var input2 = document.createElement('input');
        input2.type = 'number';
        input2.className = 'form-control mb-2';
        input2.name = 'tetel_mennyiseg[]';
        input2.placeholder = 'Mennyiség';
        input2.id = 'tetel_mennyiseg_' + currentItemCount;

        var label1 = document.createElement('label');
        label1.setAttribute('for', input1.id);
        label1.textContent = 'Tétel neve';

        var label2 = document.createElement('label');
        label2.setAttribute('for', select.id);
        label2.textContent = 'Mértékegység';

        var label3 = document.createElement('label');
        label3.setAttribute('for', input2.id);
        label3.textContent = 'Mennyiség';

        var deleteButton = document.createElement('button');
        deleteButton.textContent = 'Tétel eltávolítása';
        deleteButton.className = 'btn btn-danger';
        deleteButton.onclick = function () {
            itemsInput.removeChild(div);
        };

        var div = document.createElement('div');
        div.className = 'form-group tetelGroup';
        div.appendChild(label1);
        div.appendChild(input1);
        div.appendChild(label2);
        div.appendChild(select);
        div.appendChild(label3);
        div.appendChild(input2);
        div.appendChild(deleteButton);

        itemsInput.appendChild(div);
    } else {
        alert('Maximum ' + maxItems + ' tételt adhat hozzá!');
    }
}

var maxServices = 10;

function addService() {
    var servicesInput = document.getElementById('szolgaltatasok');
    var currentServiceCount = servicesInput.children.length;

    if (currentServiceCount < maxServices) {
        var input = document.createElement('input');
        input.type = 'text';
        input.className = 'form-control mb-2';
        input.name = 'szolgaltatas_nev[]';
        input.placeholder = 'Szolgáltatás neve';
        input.id = 'szolgaltatas_nev_' + currentServiceCount;

        var label = document.createElement('label');
        label.setAttribute('for', input.id);
        label.textContent = 'Szolgáltatás neve';

        var deleteButton = document.createElement('button');
        deleteButton.textContent = 'Szolgáltatás eltávolítása';
        deleteButton.className = 'btn btn-danger';
        deleteButton.onclick = function () {
            servicesInput.removeChild(div);
        };

        var div = document.createElement('div');
        div.className = 'form-group szolgaltatasGroup';
        div.appendChild(label);
        div.appendChild(input);
        div.appendChild(deleteButton);

        servicesInput.appendChild(div);
    } else {
        alert('Maximum ' + maxServices + ' szolgáltatást adhat hozzá!');
    }
}
