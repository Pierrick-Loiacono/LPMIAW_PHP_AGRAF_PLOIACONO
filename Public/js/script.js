$(document).ready(function(){

    // Récupération du nom fichier dans l'url
    var locationArr = document.location.pathname.split('/');
    var fileName = locationArr[locationArr.length-1];

    $( "input[type=radio]" ).on( "click", create );
    create();

});

function create() {

    form_entreprise();
    form_association();
    form_secteur();

    // If the checkbox is checked, display the output text
    if (document.getElementById("check_entreprise").checked == true){
        $('#form_create').html(form_entreprise);
    } else if(document.getElementById("check_association").checked == true) {
        $('#form_create').html(form_association);
    } else if(document.getElementById("check_secteur").checked == true) {
        $('#form_create').html(form_secteur);

    }
}


function form_entreprise(){
    form_entre = `
        <div id="div_id_name" class="form-group required">
            <label for="id_name" class="control-label col-md-4  requiredField">Nom<span class="asteriskField">*</span> </label>
            <div class="controls col-md-8 ">
                <input class="input-md  textinput textInput form-control" id="id_name" maxlength="30" name="nom" placeholder="nom de l'entreprise" style="margin-bottom: 10px" type="text" />
            </div>
        </div>
        <div id="div_id_rue" class="form-group required">
            <label for="id_rue" class="control-label col-md-4  requiredField">Rue<span class="asteriskField">*</span> </label>
            <div class="controls col-md-8 ">
                <input class="input-md textinput textInput form-control" id="id_rue" name="rue" placeholder="Rue" style="margin-bottom: 10px" type="text" />
            </div>
        </div>
        <div id="div_id_postal" class="form-group required">
            <label for="id_postal" class="control-label col-md-4  requiredField"> Code Postal<span class="asteriskField">*</span> </label>
            <div class="controls col-md-8 ">
                <input class="input-md textinput textInput form-control" id="id_postal" name="postal" placeholder="Code Postal" style="margin-bottom: 10px" type="text" />
            </div>
        </div>
        <div id="div_id_ville" class="form-group required">
            <label for="div_id_ville" class="control-label col-md-4  requiredField"> Ville<span class="asteriskField">*</span> </label>
            <div class="controls col-md-8 ">
                <input class="input-md textinput textInput form-control" id="div_id_ville" name="ville" placeholder="ville" style="margin-bottom: 10px" type="text" />
            </div>
        </div>
        <div id="div_id_actionnaire" class="form-group required">
            <label for="div_id_actionnaire" class="control-label col-md-4  requiredField"> Actionnaire<span class="asteriskField">*</span> </label>
            <div class="controls col-md-8 ">
                <input class="input-md textinput textInput form-control" id="div_id_actionnaire" name="actionnaire" placeholder="Nombre d'actionnaire" style="margin-bottom: 10px" type="text" />
            </div>
        </div>
        <div class="form-group">
            <div class="aab controls col-md-4 "></div>
            <div class="controls col-md-8 ">
                <input type="submit" name="Enregistrer" value="Enregistrer" class="btn btn-primary btn btn-info" id="submit-id-signup" />
            </div>
        </div>
    `;

    return form_entre;
}

function form_association() {

    form_asso = `
        <div id="div_id_name" class="form-group required">
            <label for="id_name" class="control-label col-md-4  requiredField">Nom<span class="asteriskField">*</span> </label>
            <div class="controls col-md-8 ">
                <input class="input-md  textinput textInput form-control" id="id_name_asso" maxlength="30" name="nom_asso" placeholder="Nom de  l'association" style="margin-bottom: 10px" type="text" />
            </div>
        </div>
        <div id="div_id_rue" class="form-group required">
            <label for="id_rue" class="control-label col-md-4  requiredField">Rue<span class="asteriskField">*</span> </label>
            <div class="controls col-md-8 ">
                <input class="input-md textinput textInput form-control" id="id_rue_asso" name="rue_asso" placeholder="Rue" style="margin-bottom: 10px" type="text" />
            </div>
        </div>
        <div id="div_id_postal" class="form-group required">
            <label for="id_postal" class="control-label col-md-4  requiredField"> Code Postal<span class="asteriskField">*</span> </label>
            <div class="controls col-md-8 ">
                <input class="input-md textinput textInput form-control" id="id_postal_asso" name="postal_asso" placeholder="Code Postal" style="margin-bottom: 10px" type="text" />
            </div>
        </div>
        <div id="div_id_ville" class="form-group required">
            <label for="div_id_ville" class="control-label col-md-4  requiredField"> Ville<span class="asteriskField">*</span> </label>
            <div class="controls col-md-8 ">
                <input class="input-md textinput textInput form-control" id="id_ville_asso" name="ville_asso" placeholder="ville" style="margin-bottom: 10px" type="text" />
            </div>
        </div>
        <div id="div_id_actionnaire" class="form-group required">
            <label for="div_id_actionnaire" class="control-label col-md-4  requiredField"> Donateur<span class="asteriskField">*</span> </label>
            <div class="controls col-md-8 ">
                <input class="input-md textinput textInput form-control" id="div_id_actionnaire" name="donateur" placeholder="Nombre d'actionnaire" style="margin-bottom: 10px" type="text" />
            </div>
        </div>
        <div class="form-group">
            <div class="aab controls col-md-4 "></div>
            <div class="controls col-md-8 ">
                <input type="submit" name="Enregistrer_asso" value="Enregistrer" class="btn btn-primary btn btn-info" id="submit-id-signup" />
            </div>
        </div>
    `;

    return form_asso;
}

function form_secteur() {
    form_sect = `
        <div id="div_id_name" class="form-group required">
            <label for="id_name" class="control-label col-md-4  requiredField">Nom<span class="asteriskField">*</span> </label>
            <div class="controls col-md-8 ">
                <input class="input-md  textinput textInput form-control" id="id_name_secteur" maxlength="30" name="nom_asso" placeholder="Nom du secteur" style="margin-bottom: 10px" type="text" />
            </div>
        </div>
        <div class="form-group">
            <div class="aab controls col-md-4 "></div>
            <div class="controls col-md-8 ">
                <input type="submit" name="Enregistrer_secteur" value="Enregistrer" class="btn btn-primary btn btn-info" id="submit-id-signup" />
            </div>
        </div>
    `;

    return form_sect;
}