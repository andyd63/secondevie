


function postAjax(param, url,messageRetour = null,retourJs = false){
   
    form = $.ajax({
    async: !1,
    url : url, // La ressource ciblée
    type : 'POST', // Le type de la requête HTTP.
    data : param,
    dataType : 'html',
    success: function(data,status,xhr){
        if(retourJs === true){
        if(xhr.status === 200){
            valRetour = xhr.responseText.replace(/\r|\t|\n/g,'');
            messageRetour = messageRetour.replace(/\r|\t|\n/g,'');
            if(valRetour == messageRetour){
                    Swal.fire({
                    icon: 'success',
                    title: valRetour,
                  })
            }else{
                Swal.fire({
                    icon: 'warning',
                    title: valRetour,
                  })
            }
        }}
        else {
           
        }}
 });
 if(retourJs == false){
    return form;
 }
}

function alertJs(success,messageRetour){
    if(success){
        Swal.fire({
        icon: 'success',
        title: messageRetour,
      })
    }else{
    Swal.fire({
        icon: 'warning',
        title: messageRetour,
      })
}

}



function  changeVal(val1,val2) {
    var varTemp = document.getElementById(val2).value;
    var varTemp2 =  document.getElementById(val1).value;
    document.getElementById(val2).value = varTemp2;
    document.getElementById(val1).value = varTemp;
}


// Permet de rendre visible ou non le voyage regulier ou unique dans proposerVoyage.php
function visibilite(divPrec,divId){
    console.log(divPrec);
    document.getElementById(divPrec).style.display = "none"
    document.getElementById(divId).style.display = "block"

    divPrecedent = divId;
    return divPrecedent
}


// Permet de changer la visibilité et la petite fleche 
function changeVisibilite(divId,divIcone)
{
    if(document.getElementById(divId).style.display == 'none'){
        document.getElementById(divId).style.display = "block";
        document.getElementById(divIcone).innerHTML = '<i  class="fas fa-angle-up"></i>';
    }else{
        document.getElementById(divId).style.display = "none";
        document.getElementById(divIcone).innerHTML = '<i  class="fas fa-angle-down"></i>';
    }
}

// Permet de changer la visibilité et la petite fleche 
function inverseVisibilite(divId,divId2,typeVisibilité = 'block')
{
    if(document.getElementById(divId).style.display == 'none'){
        document.getElementById(divId).style.display = typeVisibilité;
        document.getElementById(divId2).style.display = "none";
    }else{
        document.getElementById(divId).style.display = "none";
        document.getElementById(divId2).style.display = typeVisibilité;
    }
}

function selectValeur(id) {
    select = document.getElementById(id);
    choice = select.selectedIndex  // Récupération de l'index du <option> choisi
    valeur_cherchee = select.options[choice].value; // Récupération du texte du <option> d'index "choice"
    return valeur_cherchee;
}


function $_GET(param) {
	var vars = {};
	window.location.href.replace( location.hash, '' ).replace( 
		/[?&]+([^=&]+)=?([^&]*)?/gi, // regexp
		function( m, key, value ) { // callback
			vars[key] = value !== undefined ? value : '';
		}
	);

	if ( param ) {
		return vars[param] ? vars[param] : null;	
	}
	return vars;
}


function getDataTable(id, desc = false){
    if(desc){
    $('#'+id).DataTable( {
        "order": [[ 0, "desc" ]],
        "scrollX": true,
        "lengthMenu": [[25, 50, 100, -1], [25, 50,100, "Tous"]],
        "language": {
            "lengthMenu":     "Voir _MENU_ résultats ",
            "zeroRecords":    "Aucun résultat",
            "info":           "Affichage de  _START_ à _END_ sur _TOTAL_ résultats",
            "paginate": {
                "previous": "<",
                "next": ">"
              }
        }
    } );
    }else{
        $('#'+id).DataTable( {
            "scrollX": true,
            "lengthMenu": [[25, 50, 100, -1], [25, 50,100, "Tous"]],
            "language": {
                "lengthMenu":     "Voir _MENU_ résultats ",
                "zeroRecords":    "Aucun résultat",
                "info":           "Affichage de  _START_ à _END_ sur _TOTAL_ résultats",
                "paginate": {
                    "previous": "<",
                    "next": ">"
                  }
            }
        } );

    }
}


/* 
  function from : https://gist.github.com/3559343
  Thank you bminer!
*/

function changeType(x, type) {
    if(x.prop('type') == type)
        return x; //That was easy.
    try {
        return x.prop('type', type); //Stupid IE security will not allow this
    } catch(e) {
        //Try re-creating the element (yep... this sucks)
        //jQuery has no html() method for the element, so we have to put into a div first
        var html = $("<div>").append(x.clone()).html();
        var regex = /type=(\")?([^\"\s]+)(\")?/; //matches type=text or type="text"
        //If no match, we add the type attribute to the end; otherwise, we replace
        var tmp = $(html.match(regex) == null ?
            html.replace(">", ' type="' + type + '">') :
            html.replace(regex, 'type="' + type + '"') );
        //Copy data from old element
        tmp.data('type', x.data('type') );
        var events = x.data('events');
        var cb = function(events) {
            return function() {
                //Bind all prior events
                for(i in events)
                {
                    var y = events[i];
                    for(j in y)
                        tmp.bind(i, y[j].handler);
                }
            }
        }(events);
        x.replaceWith(tmp);
        setTimeout(cb, 10); //Wait a bit to call function
        return tmp;
    }
}