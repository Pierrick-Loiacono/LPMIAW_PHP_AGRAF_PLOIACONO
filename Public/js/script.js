$(document).ready(function(){

    $( "input[type=radio]" ).on( "click", create );
    $('#selection-secteurs').select2();

    if(document.getElementById("div_id_select")) {
        create();
    }

});

function create() {
    if (document.getElementById("check_entreprise").checked === true) {
        form_entreprise();
        $('#form_create').html(form_entreprise);
    } else if (document.getElementById("check_association").checked === true) {
        form_association();
        $('#form_create').html(form_association);
    } else if (document.getElementById("check_secteur").checked === true) {
        form_secteur();
        $('#form_create').html(form_secteur);
    }
}


function form_entreprise(){
    let form_entre = `
        <div id="div_id_name" class="form-group required">
            <label for="id_name" class="control-label requiredField">Nom<span class="asteriskField">*</span> </label>
            <div class="controls">
                <input class="input-md  textinput textInput form-control" id="id_name" required maxlength="30" name="nom" placeholder="Nom de l'entreprise" style="margin-bottom: 10px" type="text" />
            </div>
        </div>
        <div id="div_id_rue" class="form-group required">
            <label for="id_rue" class="control-label requiredField">Rue<span class="asteriskField">*</span> </label>
            <div class="controls">
                <input class="input-md textinput textInput form-control" id="id_rue" required name="rue" placeholder="Rue" style="margin-bottom: 10px" type="text" />
            </div>
        </div>
        <div id="div_id_postal" class="form-group required">
            <label for="id_postal" class="control-label requiredField"> Code Postal<span class="asteriskField">*</span> </label>
            <div class="controls">
                <input class="input-md textinput textInput form-control" id="id_postal" required name="postal" placeholder="Code Postal" style="margin-bottom: 10px" type="number" min="1000" max="98890" />
            </div>
        </div>
        <div id="div_id_ville" class="form-group required">
            <label for="div_id_ville" class="control-label requiredField"> Ville<span class="asteriskField">*</span> </label>
            <div class="controls">
                <input class="input-md textinput textInput form-control" id="div_id_ville" required name="ville" placeholder="Ville" style="margin-bottom: 10px" type="text" />
            </div>
        </div>
        <div id="div_id_actionnaire" class="form-group required">
            <label for="div_id_actionnaire" class="control-label requiredField"> Actionnaire</label>
            <div class="controls">
                <input class="input-md textinput textInput form-control" id="div_id_actionnaire" name="actionnaire" placeholder="Nombre d'actionnaire" style="margin-bottom: 10px" type="number" value="0" min="0"/>
            </div>
        </div>
        <div class="form-group">
            <div class="aab controls"></div>
            <div class="controls">
                <input type="submit" name="enregistrer_entreprise" value="Enregistrer" class="btn btn-primary btn btn-info" id="submit-id-signup" />
            </div>
        </div>
    `;
    $(".hide").show();

    return form_entre;
}

function form_association() {

    let form_asso = `
        <div id="div_id_name" class="form-group required">
            <label for="id_name" class="control-label requiredField">Nom<span class="asteriskField">*</span> </label>
            <div class="controls">
                <input class="input-md textinput textInput form-control" id="id_name_asso" maxlength="30" required name="nom_asso" placeholder="Nom de l'association" style="margin-bottom: 10px" type="text" />
            </div>
        </div>
        <div id="div_id_rue" class="form-group required">
            <label for="id_rue" class="control-label requiredField">Rue<span class="asteriskField">*</span> </label>
            <div class="controls">
                <input class="input-md textinput textInput form-control" id="id_rue_asso" required name="rue_asso" placeholder="Rue" style="margin-bottom: 10px" type="text" />
            </div>
        </div>
        <div id="div_id_postal" class="form-group required">
            <label for="id_postal" class="control-label requiredField">Code Postal<span class="asteriskField">*</span> </label>
            <div class="controls">
                <input class="input-md textinput textInput form-control" id="id_postal_asso" required name="postal_asso" placeholder="Code Postal" style="margin-bottom: 10px" type="number" min="1000" max="98890"/>
            </div>
        </div>
        <div id="div_id_ville" class="form-group required">
            <label for="div_id_ville" class="control-label requiredField"> Ville<span class="asteriskField">*</span> </label>
            <div class="controls">
                <input class="input-md textinput textInput form-control" id="id_ville_asso" required name="ville_asso" placeholder="Ville" style="margin-bottom: 10px" type="text" />
            </div>
        </div>
        <div id="div_id_actionnaire" class="form-group required">
            <label for="div_id_actionnaire" class="control-label requiredField"> Donateur</label>
            <div class="controls">
                <input class="input-md textinput textInput form-control" id="div_id_actionnaire" name="donateur" placeholder="Nombre d'actionnaire" style="margin-bottom: 10px" type="number" value="0" min="0"/>
            </div>
        </div>
        <div class="form-group">
            <div class="aab controls"></div>
            <div class="controls">
                <input type="submit" name="enregistrer_association" value="Enregistrer" class="btn btn-primary btn btn-info" id="submit-id-signup" />
            </div>
        </div>
    `;

    $(".hide").show();
    return form_asso;
}

function form_secteur() {
    let form_sect = `
        <div id="div_id_name" class="form-group required">
            <label for="id_name" class="control-label requiredField">Nom<span class="asteriskField">*</span> </label>
            <div class="controls">
                <input class="input-md  textinput textInput form-control" id="id_name_secteur" maxlength="30" required name="nom_secteur" placeholder="Nom du secteur" style="margin-bottom: 10px" type="text" />
            </div>
        </div>
        <div class="form-group">
            <div class="aab controls"></div>
            <div class="controls">
                <input type="submit" name="enregistrer_secteur" value="Enregistrer" class="btn btn-primary btn btn-info" id="submit-id-signup" />
            </div>
        </div>
    `;

    $(".hide").hide();
    return form_sect;
}

