var requete = null;
function creerRequete() {
    try {
        /* On tente de créer un objet XmlHTTPRequest */
        requete = new XMLHttpRequest();
    } catch (microsoft) {
        /* Microsoft utilisant une autre technique, on essays de créer un objet ActiveX */
        try {
            requete = new ActiveXObject('Msxml2.XMLHTTP');
        } catch (autremicrosoft) {
            /* La première méthode a échoué, on en teste une seconde */
            try {
                requete = new ActiveXObject('Microsoft.XMLHTTP');
            } catch (echec) {
                /* À ce stade, aucune méthode ne fonctionne... mettez donc votre navigateur à jour ;) */
                requete = null;
            }
        }
    }
    if (requete == null) {
        alert('Impossible de créer l\'objet requête,\nVotre navigateur ne semble pas supporter les object XMLHttpRequest.');
    }
}
var host = document.location.hostname;
function actualiser_action(p) {
    if (p == 'oui') {
        var response = requete.responseText;
        var blocListe = document.getElementById('pw')
        blocListe.innerHTML = response;
    }
    if (p == 'non') {

        blocListe.innerHTML = null;
    }
}

function change_pwd(p) {
    if (p == 'oui') {
        document.getElementById('pw').innerHTML = null;
        var blocListe = document.getElementById('pw');
        blocListe.innerHTML = "<img src='/bloglargest/img/loader.gif' />"
        creerRequete();
        //var url = host + '/users/';
        var url = '/bloglargest/users/change_pwd';
        requete.open('GET', url, true);
        requete.onreadystatechange = function() {
            if (requete.readyState == 4) {
                if (requete.status == 200) {
                    actualiser_action('oui');

                }
            }
        };
        requete.send(null);
    }
    else {
        document.getElementById('pw').innerHTML = null;
        var blocListe = document.getElementById('pw');
        actualiser_action('non')
        requete.send(null);
    }


}