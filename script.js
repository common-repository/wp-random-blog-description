function new_insert(next)
{
// Neues Div Element erzeugen
var input = document.createElement('span');
input.setAttribute('id', next);
document.getElementById('more_input').appendChild(input);  

// next erhöhen und dazu in int umwandeln
new_next = parseInt(next);
new_next++;

// Neues Input in neue Div einfügen
document.getElementById(next).innerHTML = "<input name='description[]' value='' type='text' size='100' /><input type='button' onclick='del_insert(\"" +  next + "\")' value='-'><br>";
// + Button aktualisieren
document.getElementById("button").innerHTML = "<input type='button' onclick='new_insert(\"" + new_next + "\")' value='+'>";
}

function del_insert(id)
{
// Inhald von (id) Div löschen
	document.getElementById(id).innerHTML = "";

}