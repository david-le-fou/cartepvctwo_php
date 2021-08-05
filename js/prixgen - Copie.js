$(document).ready(function () {
    
    "use strict";

    $("#mate").attr('disabled', true);
    $("#ecri_row_oui").hide();
    $("#over_row_oui").hide();
    $("#perso_num_row").hide();
    $("#perso_barre_row").hide();
    $("#perso_qr_row").hide();
    $("#perso_nom_row").hide();
    $("#perso_num_oui").hide();
    $("#perso_barre_oui").hide();
    $("#perso_qr_oui").hide();
    $("#perso_nom_oui").hide();
    $("#info_row_oui").hide();
    
    
    // quantité
    $("#quantite").on('change', function () {
        
        var recap_qte = $("#quantite").val();
        $("#recap_qte").html(recap_qte);
        
        if (recap_qte < 100){
            qteInf100();
        }
        else{
            qteSup100();
        }
        
    });
    
    // finition
    $('[name="finition"]').on('click', function () {
        
        if (recap_qte < 100){
            qteInf100();
        }
        else{
            qteSup100();
        }
        
    });
    
    // impression
    $('[name="impression"]').on('click', function () {
        
        var type_imp = $('input[name="impression"]:checked').val();
        $("#type_imp").html(type_imp);
        
    });
    
    // nombre quadri
    $("#nbquadri").on('change', function () {
        
        var type_quadri = $("#nbquadri").val();
        $("#type_quadri").html(type_model);
        
    });
    
    //zone ecriture
    $('[name="zone_ecri"]').on('click', function () {
        
        var ouinon_zone = $('input[name="zone_ecri"]:checked').val();
        if (ouinon_zone == "oui"){
            $("#ecri_row_oui").show();
        }
        else{
            $("#ecri_row_oui").hide();
        }
        
    });
    
    $('[name="ecri_face"]').on('click', function () {
        
        var type_zone = $('input[name="ecri_face"]:checked').val();
        $("#type_zone").html(type_zone);
        
        var zone_nb = $("#recap_qte").html();
        console.log(recap_qte)

        $.post("load_data.php",
        {
            zone_nb: zone_nb,
            table:'wp_pri_zoneecri',
        },
        function(data, status){
            //alert("Data: " + data + "\nStatus: " + status);
            $('#prix_zone').html(data);
        });
    });
    
    $("#ecri_nb").on('change', function () {
        
        var nb_zone = $("#ecri_nb").val();
        $("#nb_zone").html(nb_zone);
        
    });
    
    //overlay
    $('[name="overlay"]').on('click', function () {
        
        var ouinon_over = $('input[name="overlay"]:checked').val();
        if (ouinon_over == "oui"){
            $("#over_row_oui").show();
        }
        else{
            $("#over_row_oui").hide();
        }
        
    });
    
    $('[name="over_face"]').on('click', function () {
        
        var type_over = $('input[name="over_face"]:checked').val();
        $("#type_over").html(type_over);
        
        var zone_nb = $("#recap_qte").html();
        console.log(recap_qte)

        $.post("load_data.php",
        {
            zone_nb: zone_nb,
            table:'wp_pri_overlay1a3000',
        },
        function(data, status){
            //alert("Data: " + data + "\nStatus: " + status);
            $('#prix_over').html(data);
        });
        
    });
    
    $("#over_col").on('change', function () {
        
        var col_over = $("#over_col").val();
        $("#col_over").html(col_over);
        
    });
    
    //perso noire
    $('[name="personal"]').on('click', function () {
        
        var ouinon_perso = $('input[name="personal"]:checked').val();
        if (ouinon_perso == "oui"){
            $("#perso_num_row").show();
            $("#perso_barre_row").show();
            $("#perso_qr_row").show();
            $("#perso_nom_row").show();
        }
        else{
            $("#perso_num_row").hide();
            $("#perso_barre_row").hide();
            $("#perso_qr_row").hide();
            $("#perso_nom_row").hide();
        }
        
    });
    
    //perso numerotation
    $('#perso_num').on('click', function () {
        
        var ouinon_num = $("input[name='perso_num']:checked").val();
        if (ouinon_num == 1){
            $("#perso_num_oui").show();
        }
        else{
            $("#perso_num_oui").hide();
        }
    });
    $('[name="num_face"]').on('click', function () {
        
        var type_num = $('input[name="num_face"]:checked').val();
        $("#type_num").html(type_num);
        
    });
    $('[name="num_alea"]').on('click', function () {
        
        var numero = $('input[name="num_alea"]:checked').val();
        $("#numero").html(numero);
        
    });
    $("#num_debut").on('change', function () {
        
        var numdebu = $("#num_debut").val();
        $("#numdebu").html(numdebu);
        
    });
    
    //perso code barre
    $('#perso_barre').on('click', function () {
        
        var ouinon_barre = $("input[name='perso_barre']:checked").val();
        if (ouinon_barre == 1){
            $("#perso_barre_oui").show();
        }
        else{
            $("#perso_barre_oui").hide();
        }
    });
    $('[name="barre_face"]').on('click', function () {
        
        var type_barre = $('input[name="barre_face"]:checked').val();
        $("#type_barre").html(type_barre);
        
    });
    $('[name="barre_code"]').on('click', function () {
        
        var barcode = $('input[name="barre_code"]:checked').val();
        $("#barcode").html(barcode);
        
    });
    
    //perso qr code
    $('#perso_qr').on('click', function () {
        
        var ouinon_qr = $("input[name='perso_qr']:checked").val();
        if (ouinon_qr == 1){
            $("#perso_qr_oui").show();
        }
        else{
            $("#perso_qr_oui").hide();
        }
    });
    $('[name="qr_face"]').on('click', function () {
        
        var type_qr = $('input[name="qr_face"]:checked').val();
        $("#type_qr").html(type_qr);
        
        var zone_nb = $("#recap_qte").html();
        console.log(recap_qte)

        $.post("load_data.php",
        {
            zone_nb: zone_nb,
            table:'wp_pri_cabqr1a3000',
        },
        function(data, status){
            //alert("Data: " + data + "\nStatus: " + status);
            $('#prix_qr').html(data);
        });
        
    });
    
    //perso nominative
    $('#perso_nom').on('click', function () {
        
        var ouinon_nom = $("input[name='perso_nom']:checked").val();
        if (ouinon_nom == 1){
            $("#perso_nom_oui").show();
        }
        else{
            $("#perso_nom_oui").hide();
        }
    });
    $('[name="nom_face"]').on('click', function () {
        
        var type_nom = $('input[name="nom_face"]:checked').val();
        $("#type_nom").html(type_nom);
        
    });
    
    //infographie   info_row_oui
    $('[name="info"]').on('click', function () {
        
        var ouinon_info = $('input[name="info"]:checked').val();
        if (ouinon_info == "oui"){
            $("#info_row_oui").show();
            
            var impress = $("#type_imp").html();
            console.log(type_imp);
            $("#type_info").html(impress);
            
            var prix_rec = 60;
            var prix_recver = 90;
            if (impress == "recto"){
                $("#prix_info").html(prix_rec);
            }
            else{
                $("#prix_info").html(prix_recver);
            }
            
            $('[name="impression"]').on('change', function () {
        
                var type_imp = $('input[name="impression"]:checked').val();
                $("#type_imp").html(type_imp);
                
                $("#type_info").html(type_imp);
                
                if (type_imp == "recto"){
                    $("#prix_info").html(prix_rec);
                }
                else{
                    $("#prix_info").html(prix_recver);
                }
            });
            /*
            var impress = $("#type_imp").html();
            console.log(type_imp);
            $("#type_info").html(impress);
            
            var prix_rec = 60;
            var prix_recver = 90;
            var impress = $("#type_imp").html();
            console.log(type_imp);
            
            if (impress == "recto"){
                $("#prix_info").html(prix_rec);
            }
            else{
                $("#prix_info").html(prix_recver);
            }
            */
            
        }
        else{
            $("#info_row_oui").hide();
            
            var impress = "";
            $("#type_info").html(impress);
            
            var prix_info = "";
            $("#prix_info").html(prix_info);
            
            $('[name="impression"]').on('change', function () {
        
                var type_imp = $('input[name="impression"]:checked').val();
                $("#type_imp").html(type_imp);
                
                $("#type_info").html(impress);
                
                if (type_imp == "recto"){
                    $("#prix_info").html(prix_info);
                }
                else{
                    $("#prix_info").html(prix_info);
                }
            });
        }
        
        
    });
    
});


function qteInf100() {
    
    $("#mate").attr('disabled', true);
    $("#brillante").attr('checked', true);
    
    type_fini = "brillante";
    $("#type_fini").html(type_fini);
}

function qteSup100() {
    
    $("#mate").attr('disabled', false);
    
    type_fini = $('input[name="finition"]:checked').val();
    $("#type_fini").html(type_fini);
}


