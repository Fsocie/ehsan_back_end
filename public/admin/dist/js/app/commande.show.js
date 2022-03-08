var details_id;

function saveProduct(id, j, all, id_commande) {

    var montant = $("#montant"+j). val();
    var statut = $("#statut"+j). val();
    var poids = $("#poids"+j). val();
    

    $("#productMsg"+j).html('<i class="fas fa-2x fa-sync-alt fa-spin"></i>'+
        '<div class="text-bold pt-2">Enregistrement en cours ...</div>');

    $("#accordionContent"+j).addClass("overlay-wrapper");

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.post({

        url: '/admin/product/update/'+id,
        data: {montant:montant, statut:statut, poids:poids},
        success: function (response) {

            var montant_commande = 0;
            

            for (var i = 1; i <= all; i++) {
                console.log($("#montant"+i).val());
                if ($("#montant"+i).val() != null || $("#montant"+i).val() != '')
                    montant_commande += parseInt($("#montant"+i). val()) * parseInt($("#quantite"+i).text());
                
            }

            var montantTotal = montant_commande;

            if ($("#transport").text() !='')
                montantTotal += parseInt($("#transport").text());

            if ($("#frais_livraison").text() !='')
                montantTotal += parseInt($("#frais_livraison").text());


            $("#montant_commande").html(montant_commande);
            $("#montant_total").html(montantTotal+'  F CFA');
            

            $("#accordionContent"+j).removeClass("overlay-wrapper");
            $("#productMsg"+j).html('<div class="alert alert-success alert-dismissible">'+
                    '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'+
                    '<i class="icon fas fa-check"></i>'+
                    'Les modifications ont été effectuées avec succès'+
                '</div>');

            $.post({

                url: '/admin/commande/update-montant_commande/'+id_commande,
                data: {montant_commande:montant_commande},
                success: function (response) {
                    var montant = montantTotal + response.montant_service;
                    $("#montant_total").html(montant+'  F CFA');
                    $("#montant_service").html(response.montant_service);
                },
                error: function (response) {
                    console.log(response);
                }
            });

        },
         error: function (response) {
             console.log(response);
        }
     });
}


function saveColis(id, arg) {

    var value = $("#"+arg).val();
    console.log(value);

    $("#"+arg+"Msg").html('<i class="fas fa-spinner fa-pulse" style="font-size:30px;color:red;"></i>');

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.post({

        url: '/admin/colis/update-'+arg+'/'+id,
        data: {arg:value},
        success: function (response) {

            $("#"+arg+"Msg").html('<i class="fas fa-check" style="font-size:30px;color:green;"></i>');

            if (arg == 'poids') {
                $("#transport").html(response.transport);

                var montant_total = parseInt($("#montant_commande").text()) + parseInt(response.transport) + parseInt(response.frais_livraison) + parseInt($("#montant_service").text());
                $("#montant_total").html(montant_total+ ' F CFA');

            }else if (arg == 'frais_livraison') {

                var montant_total = parseInt($("#montant_commande").text()) + parseInt(value) + parseInt($("#transport").text()) + parseInt($("#montant_service").text());
                $("#montant_total").html(montant_total+ ' F CFA');
            }


        },
         error: function (response) {
             console.log(response);
        }
     });
}


function resetAddModal(argument) {

    $("#position").val('');
    $("#comentaire").val('');
}


function storeLivraisonDetails(id_colis) {
    
    var position = $("#position").val();
    var commentaire = $("#comentaire").val();

    console.log(position);
    console.log(commentaire);
    

    $("#addDetailsBodyMsg").html('<i class="fas fa-2x fa-sync fa-spin"></i>'+
        '<div class="text-bold pt-2">Enregistrement en cours ...</div>');

    $("#addDetailsBodyMsg").addClass("justify-content-center");
    $("#addDetailsBodyMsg").addClass("align-items-center");
    $("#addDetailsBodyMsg").addClass("d-flex");
    $("#addDetailsBodyMsg").addClass("overlay");


    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


    $.post({

        url: '/admin/livraison_details/store',
        data: {position:position, comentaire:commentaire, colis_id:id_colis},
        success: function (response) {

            $("#addDetailsBodyMsg").removeClass("overlay");
            $("#addDetailsBodyMsg").removeClass("d-flex");
            $("#addDetailsBodyMsg").removeClass("justify-content-center");
            $("#addDetailsBodyMsg").removeClass("align-items-center");
            
            
            $("#addDetailsBodyMsg").html('<div class="alert alert-success alert-dismissible">'+
                    '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'+
                    '<i class="icon fas fa-check"></i>'+
                    'Les données ont été enregistrées avec succès'+
                '</div>');

            $("#position").val('');
            $("#comentaire").val('');


        },
         error: function (response) {
             console.log(response);
        }
     });
}



function editLivraisonDetails(id) {

    details_id = id;

    $("#position").val($("#position"+id).text());
    $("#comentaire").val($("#commentaire"+id).text());
}



function updateLivraisonDetails() {

    var position = $("#position").val();
    var commentaire = $("#comentaire").val();

    $("#addDetailsBodyMsg").html('<i class="fas fa-2x fa-sync fa-spin"></i>'+
        '<div class="text-bold pt-2">Enregistrement en cours ...</div>');

    $("#addDetailsBodyMsg").addClass("justify-content-center");
    $("#addDetailsBodyMsg").addClass("align-items-center");
    $("#addDetailsBodyMsg").addClass("d-flex");
    $("#addDetailsBodyMsg").addClass("overlay");


    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


    $.post({

        url: '/admin/livraison_details/update/'+details_id,
        data: {position:position, comentaire:commentaire},
        success: function (response) {

            $("#addDetailsBodyMsg").removeClass("overlay");
            $("#addDetailsBodyMsg").removeClass("d-flex");
            $("#addDetailsBodyMsg").removeClass("justify-content-center");
            $("#addDetailsBodyMsg").removeClass("align-items-center");
            
            
            $("#addDetailsBodyMsg").html('<div class="alert alert-success alert-dismissible">'+
                    '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'+
                    '<i class="icon fas fa-check"></i>'+
                    'Les modifications ont été effectuées avec succès'+
                '</div>');

            $("#position").val('');
            $("#comentaire").val('');


        },
         error: function (response) {
             console.log(response);
        }
     });
}



function updateState(id) {
    

    $("#commandeInfoMsg").html('<i class="fas fa-2x fa-sync-alt fa-spin"></i>'+
        '<div class="text-bold pt-2">Enregistrement en cours ...</div>');

    $("#commandeInfo").addClass("overlay-wrapper");

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.post({

        url: '/admin/commande/update-statut_id/'+id,
        data: {statut_id : $("#statut_id").val()},

        success: function (response) {

            $("#commandeInfo").removeClass("overlay-wrapper");
            $("#commandeInfoform").removeAttr( "class" );
            $("#commandeInfoform").addClass("card");
            $("#commandeInfoform").addClass(response.class);

            $("#commandeInfoMsg").html('<div class="alert alert-success alert-dismissible">'+
                    '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'+
                    '<i class="icon fas fa-check"></i>'+
                    response.message+
                '</div>');
                
        },
         error: function (response) {
             console.log(response);
        }
     });
}


function uploadImages(id_colis) {
    
   var form_data = new FormData();

   // Read selected files
   var totalfiles = document.getElementById('files').files.length;
   for (var index = 0; index < totalfiles; index++) {
      form_data.append("files[]", document.getElementById('files').files[index]);
   }


    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

   // AJAX request
   $.post({

        url: '/admin/colis/update-images/'+id_colis, 
        data: form_data,
        dataType: 'json',
        contentType: false,
        processData: false,
        success: function (response) {


           for(var index = 0; index < totalfiles; index++) {

                var src = response[index];

                var link = '/commandes-colis/'+response["user"]+'/'+src;
                console.log(link);

                // Add img element in <div id='preview'>
                $('#preview').append('<div class="col-sm-6"><img class="img-fluid mb-3" src=\"'+link+'\" alt="Photo"></div>');

            }

        },
         error: function (response) {
             console.log(response);
        }
   });
}