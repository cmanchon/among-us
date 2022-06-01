function fermeNotif() {
    document.getElementById("notif").style.display="none";
}

function ferme() {
    document.getElementById("connexion").style.display="none";
}

function ouvre() {
    document.getElementById("connexion").style.display="block";
}

// variables 

var d = new Date();
var date = d.getFullYear()+'-'+(d.getMonth()+1)+'-'+d.getDate();
d.setDate(4);
var setdate = d.getFullYear()+'-'+(d.getMonth()+1)+'-'+d.getDate();


// generer un PDF
function telecharger(){
    var nom_fichier = prompt("Nom du fichier PDF :");
    //generer le pdf
    var element = document.getElementById('confirmation_paiement');

    var opt = {
            margin:  0,
            filename:     `${nom_fichier}.pdf`,
            image:        { type: 'jpeg', quality: 1 },
            html2canvas:  { scale: 2 },
            jsPDF:        { unit: 'in', format: 'letter', orientation: 'portrait' }
        };
    if(nom_fichier != "") {
        html2pdf().set(opt).from(element).save();
    }
    else {
        alert("Veuillez choisir un nom ");
    } 
}
