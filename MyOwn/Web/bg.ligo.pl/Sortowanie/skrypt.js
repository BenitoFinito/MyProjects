function edit_row(no) {
    document.getElementById("edycja" + no).style.display = "none";
    document.getElementById("usun" + no).style.display = "none";
    document.getElementById("zapis" + no).style.display = "inline-block";
    document.getElementById("anuluj" + no).style.display = "inline-block";

    var name = document.getElementById("name" + no);
    var surname = document.getElementById("surname" + no);
    var age = document.getElementById("age" + no);

    var name_data = name.innerHTML;
    var surname_data = surname.innerHTML;
    var age_data = age.innerHTML;

    name.dataset.originalValue = name_data;
    surname.dataset.originalValue = surname_data;
    age.dataset.originalValue = age_data;

    var tempName = document.createElement('span');
    tempName.innerHTML = name_data;
    document.body.appendChild(tempName);

    var tempSurname = document.createElement('span');
    tempSurname.innerHTML = surname_data;
    document.body.appendChild(tempSurname);

    var nameWidth = tempName.offsetWidth;
    var surnameWidth = tempSurname.offsetWidth;

    document.body.removeChild(tempName);
    document.body.removeChild(tempSurname);

    name.innerHTML = "<input type='text' class='name' id='name_text" + no + "' value='" + name_data + "' style='width: " + nameWidth + "px'>";
    surname.innerHTML = "<input type='text' class='surname' id='surname_text" + no + "' value='" + surname_data + "' style='width: " + surnameWidth + "px'>";
    age.innerHTML = "<input type='number' class='age' min='0' max='150' id='age_number" + no + "' value='" + age_data + "'>";

    document.getElementById("name_text" + no).addEventListener('input', function() {
        var inputWidth = this.value.length * 8;
        this.style.width = inputWidth + 'px'; 
        var thname = document.querySelector('.thname');
        var tdsname = document.querySelectorAll('.name');
        tdsname.forEach(function(td) {
            td.style.minWidth = inputWidth + 'px';
        });
    });

    document.getElementById("surname_text" + no).addEventListener('input', function() {
        var inputWidth = this.value.length * 8;
        this.style.width = inputWidth + 'px'; 
        var thsurname = document.querySelector('.thsurname');
        var tdssurname = document.querySelectorAll('.surname');
        tdssurname.forEach(function(td) {
            td.style.minWidth = inputWidth + 'px';
        });
    });
}

function save_row(no) {
    var name_val = document.getElementById("name_text" + no).value;
    var surname_val = document.getElementById("surname_text" + no).value;
    var age_val = document.getElementById("age_number" + no).value;

    var name = document.getElementById("name" + no).dataset.originalValue;;
    var surname = document.getElementById("surname" + no).dataset.originalValue;;
    var age = document.getElementById("age" + no).dataset.originalValue;;

    if(name === name_val && surname === surname_val && age === age_val)
        {
            document.getElementById("edycja" + no).style.display = "inline-block";
            document.getElementById("usun" + no).style.display = "inline-block";
            document.getElementById("zapis" + no).style.display = "none";
            document.getElementById("anuluj" + no).style.display = "none";    

            location.reload();
            return;
    }

    if (!isValidAge(age_val)) {
        alert("Nieprawidłowy wiek. Poprawny wiek powinien mieścić się w zakresie od 0 do 150.");
        return;
      }

    var xhr = new XMLHttpRequest();
    xhr.open("POST", "index.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    var params = "action=updateData&id=" + no + "&imie=" + encodeURIComponent(name_val) + "&nazwisko=" + encodeURIComponent(surname_val) + "&wiek=" + age_val;
    xhr.send(params);

    var tds = document.querySelectorAll("#row" + no + " td");
    tds.forEach(function(td) {
        td.style.maxWidth = null;
    });

    document.getElementById("name" + no).innerHTML = name_val;
    document.getElementById("surname" + no).innerHTML = surname_val;
    document.getElementById("age" + no).innerHTML = age_val;

    document.getElementById("edycja" + no).style.display = "inline-block";
    document.getElementById("usun" + no).style.display = "inline-block";
    document.getElementById("zapis" + no).style.display = "none";
    document.getElementById("anuluj" + no).style.display = "none";

    location.reload();
}

function delete_row(no) {
    var id = no;
  
    var shouldDelete = confirm("Czy na pewno chcesz usunąć ten rekord?");
    if (!shouldDelete) {
      return;
    }
  
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "index.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    var params = "action=deleteData&id=" + id;
    xhr.send(params);
  
    xhr.onreadystatechange = function () {
      if (xhr.readyState === 4 && xhr.status === 200) {
        var row = document.getElementById("row" + id);
        row.parentNode.removeChild(row);
        location.reload();
      }
    };
}

function isValidAge(age) {
    return age >= 0 && age <= 150;
}
function removeClickedParam() {
    if (window.history.replaceState) {
      var url = window.location.href;
      url = url.replace(/[?&]sort=[^&]*/, '');
      window.history.replaceState({path: url}, '', url);
    }
}
  
window.onload = function() {
    removeClickedParam();
};

function cancel_edit(no) {
    var name = document.getElementById("name" + no);
    var surname = document.getElementById("surname" + no);
    var age = document.getElementById("age" + no);
  
    name.innerHTML = name.dataset.originalValue;
    surname.innerHTML = surname.dataset.originalValue;
    age.innerHTML = age.dataset.originalValue;
  
    document.getElementById("edycja" + no).style.display = "inline-block";
    document.getElementById("usun" + no).style.display = "inline-block";
    document.getElementById("zapis" + no).style.display = "none";
    document.getElementById("anuluj" + no).style.display = "none";

}

function add_row() {
    var new_name = document.getElementById("new_name").value;
    var new_surname = document.getElementById("new_surname").value;
    var new_age = document.getElementById("new_age").value;

    // Check if all fields are filled
    if (!new_name || !new_surname || !new_age) {
        alert("Wypełnij wszystkie pola przed dodaniem nowego rekordu.");
        return;
    }

    // Perform client-side validation if needed
    if (!isValidAge(new_age)) {
        alert("Nieprawidłowy wiek. Poprawny wiek powinien mieścić się w zakresie od 0 do 150.");
        return;
    }

    var xhr = new XMLHttpRequest();
    xhr.open("POST", "index.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    var params = "action=addData&imie=" + encodeURIComponent(new_name) + "&nazwisko=" + encodeURIComponent(new_surname) + "&wiek=" + new_age;
    xhr.send(params);

    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            location.reload();
        }
    };
}