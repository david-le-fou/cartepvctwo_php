$(document).ready(function () {
    
    "use strict";
    
    var recap_qte = 0;
    
    //$("#mate").attr('disabled', true);
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
    
    var me_url = $("#mon_url").attr("me_url");
    // quantité

    $("#quantite").on('change', function () {
        recap_qte = $("#quantite").val();
        $("#recap_qte").html(recap_qte);
        
        var the_select = $("#nbquadri");
        the_select.empty();
        the_select.append("<option>- Nombre quadri -</option>");
        
        if (recap_qte < 100 || recap_qte == 100){
            $("#mate").attr('disabled', true);
            
            var iQte = 1;
            var i;
            var max = parseInt(iQte) + 1;
            
            for (i=1; i < max; i++){
                var val = i;
                var text = i;

                the_select.append("<option value="+val+">"+text+"</option>");
            }
            
        }
        if (recap_qte > 100){
            $("#mate").attr('disabled', false);
            
            
            if (recap_qte < 900 || recap_qte == 900){
                var max = recap_qte.substring(0, 1);
            }
            else {
                var max = recap_qte.substring(0, 2);
            }
            
            var i;
            var max = parseInt(max) + 1;
            
            for (i=1; i < max; i++){
                var val = i;
                var text = i;

                the_select.append("<option value="+val+">"+text+"</option>");
            }
            
        }
        
    }); //-- quantité 
    
    // finition
    $('[name="finition"]').on('click', function () {
        
        if (recap_qte < 100){
            $("#mate").attr('disabled', true);
        }
        else{
            $("#mate").attr('disabled', false);
            
        }

        var type_fini = $('input[name="finition"]:checked').val();
        $("#type_fini").html(type_fini);
     });    //-- finition
    
    // impression
    $('[name="impression"]').on('click', function (e) {
        var type_imp = $('input[name="impression"]:checked').val();
        $("#type_imp").html(type_imp);

        var nombre = recap_qte;
        //console.log(recap_qte);
       
        var finit = type_fini;
        //console.log(finit);
        //$("#type_fini").html(finit);
        
        if (finit == "brillante"){
            
            $.post(me_url,
            {
                nombre: nombre,
                table:'wp_pri_quadri1a3000',
            },
            function(data, status){
                
                $('#prix_imp').html(data);
                $('#prix_imp').attr('prix',data);
            });
        }
        else{
            
            if (type_imp == "recto"){
                
                $.post(me_url,
                {
                    nombre: nombre,
                    table:'wp_pri_materecto',
                },
                function(data, status){

                    $('#prix_imp').html(data);
                    $('#prix_imp').attr('prix',data);
                });
            }
            else{
                
                $.post(me_url,
                {
                    nombre: nombre,
                    table:'wp_pri_materecver',
                },
                function(data, status){

                    $('#prix_imp').html(data);
                    $('#prix_imp').attr("prix", data);
                });
            }
            
        }
        
    }); //-- impression
    
    // nombre quadri
    $("#nbquadri").on('change', function () {
        
        var nombre = recap_qte;
        //console.log(recap_qte);
        
        var type_quadri = $("#nbquadri").val();
        $("#type_quadri").html(type_quadri);
        
    }); //-- nombre quadri
    
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
    
    $('[name="ecri_face"]').on('change', function () {
        
        var type_zone = $('input[name="ecri_face"]:checked').val();
        $("#type_zone").html(type_zone);
       
        var nombre = recap_qte;
        //console.log(recap_qte)
       
        $.post(me_url,
        {
            nombre: nombre,
            table:'wp_pri_zoneecri',
        },
        function(data, status){
            
            $('#prix_zone').html(data);
            $('#prix_zone').attr('prix',data);
            var prix_zone = $("#prix_zone").html(data);
            console.log(prix_zone);
        });
    });
    
    $("#ecri_nb").on('change', function () {
        
        var nb_zone = $("#ecri_nb").val();
        $("#nb_zone").html(nb_zone);
        
    }); //-- zone ecriture
    
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
        
        var nombre = recap_qte;
        //console.log(recap_qte)

        $.post(me_url,
        {
            nombre: nombre,
            table:'wp_pri_overlay1a3000',
        },
        function(data, status){
            //alert("Data: " + data + "\nStatus: " + status);
            $('#prix_over').html(data);
            $('#prix_over').attr('prix',data);
            var prix_over = $("#prix_over").html(data);
            console.log(prix_over);
        });
        
    });
    
    $("#over_col").on('change', function () {
        
        var col_over = $("#over_col").val();
        $("#col_over").html(col_over);
        
    }); //-- overlay
    
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
        
    }); //-- perso noire
    
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
        
    }); //-- perso numerotation
    
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
        
    }); //-- perso code barre
    
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
        
        var nombre = recap_qte;
        //console.log(recap_qte)

        $.post(me_url,
        {
            nombre: nombre,
            table:'wp_pri_cabqr1a3000',
        },
        function(data, status){
            //alert("Data: " + data + "\nStatus: " + status);
            $('#prix_qr').html(data);
            $('#prix_qr').attr('prix',data);
            var prix_qr = $("#prix_qr").html(data);
            console.log(prix_qr);
        });
        
    }); //-- perso qr code
    
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
        
    }); //-- perso nominative
    
    //infographie
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
                var prix_info = $("#prix_info").html(prix_rec);
                console.log(prix_info);
                console.log(6)
                $("#prix_info").attr('prix',prix_rec);
            }
            else{
                $("#prix_info").html(prix_recver);
                var prix_info = $("#prix_info").html(prix_recver);
                $("#prix_info").attr('prix',prix_recver);
                console.log(prix_info);
                console.log(5)
            }
            
            $('[name="impression"]').on('change', function () {
        
                var type_imp = $('input[name="impression"]:checked').val();
                $("#type_imp").html(type_imp);
                
                $("#type_info").html(type_imp);
                
                if (type_imp == "recto"){
                    $("#prix_info").html(prix_rec);
                    var prix_info = $("#prix_info").html(prix_rec);
                    $("#prix_info").attr('prix',prix_rec);
                    console.log(prix_info);
                    console.log(4)
                }
                else{
                    $("#prix_info").html(prix_recver);
                    var prix_info = $("#prix_info").html(prix_recver);
                    $("#prix_info").attr('prix',prix_recver);
                    console.log(prix_info);
                    console.log(3)
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
                    console.log(2)
                }
                else{
                    $("#prix_info").html(prix_info);
                    console.log(1)
                }
            });
        }
        
    }); //-- infographie
    
    // Sous Total
    $("#SouTot").on('click', function () {
        var prix_imp = $("#prix_imp").attr('prix');
		var prix_zone = $("#prix_zone").attr('prix');
		var prix_over = $("#prix_over").attr('prix');
		var prix_qr = $("#prix_qr").attr('prix');
		var prix_info = $("#prix_info").attr('prix');
        
        var soustotal = parseFloat(prix_imp) + parseFloat(prix_zone) + parseFloat(prix_over) + parseFloat(prix_qr) + parseFloat(prix_info);
        alert (soustotal);
        $("#amount").html(soustotal);
    });
    
});