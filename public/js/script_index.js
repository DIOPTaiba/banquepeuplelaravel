var page_authentification = document.getElementById('page_authentification');
var formulaire_admin = document.getElementById('formulaire_admin');
var formulaire_responsable = document.getElementById('formulaire_responsable');
var formulaire_caissiere = document.getElementById('formulaire_caissiere');

function affiche_authentification_admin() {
    page_authentification.style.display = "block";
    formulaire_admin.style.display = "block";
    formulaire_responsable.style.display = "none";
    formulaire_caissiere.style.display = "none";
}

function affiche_authentification_responsable() {
    page_authentification.style.display = "block";
    formulaire_responsable.style.display = "block";
    formulaire_admin.style.display = "none";
    formulaire_caissiere.style.display = "none";
}

function affiche_authentification_caissiere() {
    page_authentification.style.display = "block";
    formulaire_caissiere.style.display = "block";
    formulaire_admin.style.display = "none";
    formulaire_responsable.style.display = "none";
}

var login_admin = document.getElementById('login_admin');
var mot_passe_admin = document.getElementById('mot_passe_admin');

function controle_champs_admin() {
    if (login_admin.value.trim() == "") {
        login_admin.style.backgroundColor = "#fba";
        login_admin.placeholder = "Veillez remplir ce champ";
        return false;
    } else if (mot_passe_admin.value.trim() == "") {
        mot_passe_admin.style.backgroundColor = "#fba";
        mot_passe_admin.placeholder = "Veillez remplir ce champ";
        return false;
    } else {
        login_admin.style.backgroundColor = "";
        mot_passe_admin.style.backgroundColor = "";
        return true;
    }
}
var login_responsable = document.getElementById('login_responsable');
var mot_passe_responsable = document.getElementById('mot_passe_responsable');

function controle_champs_responsable() {
    if (login_responsable.value.trim() == "") {
        login_responsable.style.backgroundColor = "#fba";
        login_responsable.placeholder = "Veillez remplir ce champ";
        return false;
    } else if (mot_passe_responsable.value.trim() == "") {
        mot_passe_responsable.style.backgroundColor = "#fba";
        mot_passe_responsable.placeholder = "Veillez remplir ce champ";
        return false;
    } else {
        login_responsable.style.backgroundColor = "";
        mot_passe_responsable.style.backgroundColor = "";
        return true;
    }
}

var login_caissiere = document.getElementById('login_caissiere');
var login_caissiere = document.getElementById('login_caissiere');

function controle_champs_caissiere() {
    if (login_caissiere.value.trim() == "") {
        login_caissiere.style.backgroundColor = "#fba";
        login_caissiere.placeholder = "Veillez remplir ce champ";
        return false;
    } else if (login_caissiere.value.trim() == "") {
        login_caissiere.style.backgroundColor = "#fba";
        login_caissiere.placeholder = "Veillez remplir ce champ";
        return false;
    } else {
        login_caissiere.style.backgroundColor = "";
        login_caissiere.style.backgroundColor = "";
        return true;
    }
}
/*===================Gestion choix client existant ou nouveau client=============*/
var client_existant = document.getElementById('client_existant');
var nouveau_client = document.getElementById('nouveau_client');
var saisie_id_client = document.getElementById('saisie_id_client');

/*=====affichage formulaire client non salarie ou non selon choix client existant ou non======*/
var form_compte_non_salarie = document.getElementById('form_compte_non_salarie');

function affiche_client_existant() {
    saisie_id_client.style.display = "block";
    form_compte_non_salarie.style.display = "none";
}

function affiche_nouveau_client() {
    saisie_id_client.style.display = "none";
    form_compte_non_salarie.style.display = "block";


}

/*=====affichage formulaire client salarie ou non selon choix client existant ou non======*/
var form_compte_salarie = document.getElementById('form_compte_salarie');

function affiche_client_existant_salarie() {
    saisie_id_client.style.display = "block";
    form_compte_salarie.style.display = "none";
}

function affiche_nouveau_client_salarie() {
    saisie_id_client.style.display = "none";
    form_compte_salarie.style.display = "block";
}

/*=====affichage formulaire client moral ou non selon choix client existant ou non======*/
var form_compte_entreprise = document.getElementById('form_compte_entreprise');

function affiche_client_existant_moral() {
    saisie_id_client.style.display = "block";
    form_compte_entreprise.style.display = "none";
}

function affiche_nouveau_client_moral() {
    saisie_id_client.style.display = "none";
    form_compte_entreprise.style.display = "block";
}

/*==========Fonction permettant de signlé l'erreur des champ non valide=========*/
function controle_champ(champ, erreur) {

    if (erreur) {
        champ.style.backgroundColor = "#fba";
        champ.placeholder = "Veillez remplir ce champ correctement"
    } else
        champ.style.backgroundColor = "";
}

/*===========Contrôle validité Nom===============================================*/
function verifie_nom(champ) {
    if (champ.value.trim() == "" || !isNaN(champ.value)) {
        controle_champ(champ, true);
        return false;
    } else {
        controle_champ(champ, false);
        return true;
    }
}

function verifie_prenom(champ) {
    if (champ.value.trim() == "" || !isNaN(champ.value)) {
        controle_champ(champ, true);
        return false;
    } else {
        controle_champ(champ, false);
        return true;
    }
}

function verifie_adresse(champ) {
    if (champ.value.trim() == "") {
        controle_champ(champ, true);
        return false;
    } else {
        controle_champ(champ, false);
        return true;
    }
}

function verifie_telephone(champ) {
    if (champ.value.length != 9 || isNaN(champ.value)) {
        controle_champ(champ, true);
        return false;
    } else {
        controle_champ(champ, false);
        return true;
    }
}

function verifie_email(champ) {
    /* regex doit contenir des lettres majuscules minuscule, des chiffres suivi de @ suivi minimum de 2 caractères minuscules ou
    de chiffres, de (. - _)  suivi de . suivi de 2 minuscules minimum et 4 maximum*/
    var regex = /^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/;

    if (champ.value != "" && !regex.test(champ.value)) {
        controle_champ(champ, true);
        return false;
    } else {
        controle_champ(champ, false);
        return true;
    }
}

function verifie_profession(champ) {
    if (champ.value != "" && champ.value.length < 3 || !isNaN(champ.value)) {
        controle_champ(champ, true);
        return false;
    } else {
        controle_champ(champ, false);
        return true;
    }
}

function verifie_salaire(champ) {
    /*var salaire = parseInt(champ.value);*/
    if (isNaN(champ.value) || champ.value == "") {
        controle_champ(champ, true);
        return false;
    } else {
        controle_champ(champ, false);
        return true;
    }
}


function verifie_nom_entreprise(champ) {
    if (champ.value.length < 3) {
        controle_champ(champ, true);
        return false;
    } else {
        controle_champ(champ, false);
        return true;
    }
}


function verifie_adresse_entreprise(champ) {
    if (champ.value.length < 3) {
        controle_champ(champ, true);
        return false;
    } else {
        controle_champ(champ, false);
        return true;
    }
}

function verifie_nom_employeur(champ) {
    if (champ.value != "" && champ.value.length < 3) {
        controle_champ(champ, true);
        return false;
    } else {
        controle_champ(champ, false);
        return true;
    }
}

/*var numero_agence = document.getElementById('numero_agence');
numero_agence.disabled = "true";
var numero_compte = document.getElementById('numero_compte');
numero_compte.disabled = "true";
var cle_rib = document.getElementById('cle_rib');
cle_rib.disabled = "true";
var date_ouverture = document.getElementById('date_ouverture');
date_ouverture.disabled = "true";
*/

var identifiant_entreprise = document.getElementById('identifiant_entreprise');

function verifie_identifiant_entreprise() {
    if (identifiant_entreprise.value == "" || identifiant_entreprise.value.length < 3) {
        identifiant_entreprise.placeholder = "renseignez l'identifiant entreprise";
        identifiant_entreprise.style.backgroundColor = '#fba';

        return false;
    } else {
        identifiant_entreprise.placeholder = "";
        identifiant_entreprise.style.backgroundColor = '';

        return true;
    }
}

var erreur_selection = document.getElementById('erreur_selection');

var frais_ouverture_compte = document.getElementById('frais_ouverture_compte');
var montant_remuneration_compte = document.getElementById('montant_remuneration_compte');
var agios_compte = document.getElementById('agios_compte');
var duree_blocage_compte = document.getElementById('duree_blocage_compte');

var type_compte = document.getElementById('type_compte');
type_compte.addEventListener('change', (event) => {
    event.preventDefault();
    console.log(type_compte.value);

    if (type_compte.value == "non selection") {
        erreur_selection.innerText = "Sélectionnez un type de compte";
        erreur_selection.style.color = 'red';
        type_compte.style.border = 'solid #fba';

        return false;
    } else {
        erreur_selection.innerText = "";
        type_compte.style.border = "";
        if (type_compte.value == "compte epargne") {
            frais_ouverture_compte.style.display = "block";
            montant_remuneration_compte.style.display = "block";
            agios_compte.style.display = "none";
            duree_blocage_compte.style.display = "none";

            return true;
        } else if (type_compte.value == "compte courant") {
            frais_ouverture_compte.style.display = "none";
            montant_remuneration_compte.style.display = "none";
            duree_blocage_compte.style.display = "none";
            agios_compte.style.display = "block";

            return true;
        } else {
            agios_compte.style.display = "none";
            duree_blocage_compte.style.display = "block";
            frais_ouverture_compte.style.display = "block";
            montant_remuneration_compte.style.display = "block";

            return true;
        }
    }

})

var type_compte = document.getElementById('type_compte');
var duree_blocage = document.getElementById('duree_blocage');
var erreur_duree = document.getElementById('erreur_duree');

function verification_duree_blocage() {
    /* si le type de compte sélectionné est bloqué on affiche le champs durée sinon il reste caché*/
    if (type_compte.selectedIndex == 3) {


        if (isNaN(duree_blocage.value) || duree_blocage.value == "" || (parseInt(duree_blocage.value) < 12)) {
            /*alert('la durée de blocage doit faire minimum 12 mois');*/
            controle_champ(duree_blocage, true);
            /*erreur_duree.style.backgroundColor = "#fba";
   			erreur_duree.contentText = "Donner la durée de blocage";
   			erreur_duree.style.color = 'red';*/
            return false;
        } else {
            controle_champ(duree_blocage, false);
            return true;
        }

    } else {
        return true;
    }
    /*avec visiblité = hidden l'espace occupé par l'élément est conservé mais supprimé avec display = (none ou block)*/
}


function verifie_formulaire_salarie(form) {
    var nomOk = verifie_nom(form.nom);
    var prenomOk = verifie_prenom(form.prenom);
    var adresseOk = verifie_adresse(form.adresse);
    var telephoneOk = verifie_telephone(form.telephone);
    var mailOk = verifie_email(form.email);
    var professionOk = verifie_profession(form.profession);
    var salaireOk = verifie_salaire(form.salaire);
    var nom_entrepriseOk = verifie_nom_entreprise(form.nom_entreprise);
    var adresse_entrepriseOk = verifie_adresse_entreprise(form.adresse_entreprise);
    var nom_employeurOK = verifie_nom_employeur(form.nom_employeur);
    //var type_compteOk = verifie_type_compte(form.type_compte);
    var dureeOk = verification_duree_blocage();

    if (nomOk && prenomOk && adresseOk && telephoneOk && mailOk && professionOk && salaireOk && nom_entrepriseOk &&
        adresse_entrepriseOk && nom_employeurOK && /*type_compteOk &&*/ dureeOk) {
        //alert("Informations enregistrées");
        return true;
    } else {
        alert("Veuillez remplir correctement tous les champs");
        return false;
    }
}


/*verification formulaire non salarié*/
function verifie_formulaire_non_salarie(form) {

    var nomOk = verifie_nom(form.nom);
    var prenomOk = verifie_prenom(form.prenom);
    var adresseOk = verifie_adresse(form.adresse);
    var telephoneOk = verifie_telephone(form.telephone);
    var mailOk = verifie_email(form.email);
    //var type_compteOk = verifie_type_compte(form.type_compte);
    var dureeOk = verification_duree_blocage();

    if (nomOk && prenomOk && adresseOk && telephoneOk && mailOk /*&& type_compteOk*/ && dureeOk) {
        //alert("Informations enregistrées");
        return true;
    } else {
        alert("Veuillez remplir correctement tous les champs");
        return false;
    }
}


/*verification formulaire entreprise*/
function verifie_formulaire_entreprise(form) {

    var nom_entrepriseOk = verifie_nom_entreprise(form.nom_entreprise);
    var adresse_entrepriseOk = verifie_adresse_entreprise(form.adresse_entreprise);
    var telephoneOk = verifie_telephone(form.telephone);
    var mailOk = verifie_email(form.email);
    /*var identifiant_entrepriseOK = verifie_identifiant_entreprise(form.identifiant_entreprise);*/
    //var type_compteOk = verifie_type_compte(form.type_compte);
    var dureeOk = verification_duree_blocage();

    if (nom_entrepriseOk && adresse_entrepriseOk && telephoneOk && mailOk && /*identifiant_entrepriseOK && type_compteOk &&*/ dureeOk) {
        //alert("Informations enregistrées");
        return true;
    } else {
        alert("Veuillez remplir correctement tous les champs");
        return false;
    }
}
