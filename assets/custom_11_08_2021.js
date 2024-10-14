$(document).ready(function() {   
 "use strict";
  $.validator.setDefaults({
    submitHandler: function () {
      form.submit();
    }
  });


     $(".loader-wrapper").fadeOut("slow");


    setTimeout(function() {
      $('#alertmessage').fadeOut('slow');
    }, 5000);
    // tracking fadeout
    var lastPart = window.location.href.split("/").pop();
    if(lastPart!='tracking')
    {
        localStorage.clear();
    }
    setTimeout(function() {
        $('#message').fadeOut('slow');
    }, 5000);

    // datepicker
    $('.datepicker').datepicker({
        format: 'yyyy-mm-dd',
        autoclose: true,
        todayHighlight: true
    });
    $('.datepickerfuturedisable').datepicker({
        format: 'yyyy-mm-dd',
        autoclose: true,
        endDate: '+0d',
        todayHighlight: true
    });

    $('.datepickerpastdisable').datepicker({
        format: 'yyyy-mm-dd',
        autoclose: true,
        startDate: new Date(),
        todayHighlight: true
    }); 

    $("input").attr("autocomplete", "off");
    // customer selectize
    $('.selectized').selectize();
    // trip pending amount
    $("#t_trip_paymentstatus").change(function() {
        var selectedVal = $('option:selected', this).text();
        console.log(selectedVal);
        if (selectedVal == "pending") {
            $('.t_trip_pendingamount').css('display', 'block');

        } else {
            $('.t_trip_pendingamount').css('display', 'none');
        }
    });
    $.validator.addMethod('lessThanEqual', function(value, element, param) {
        if (this.optional(element)) return true;
        var i = parseInt(value);
        var j = parseInt($('#pendingamount').val());
        return i <= j;
    }, "");
    // jquery validate

   // $('#add_driver,#vehicle_add,#invoice_add,#customer_add,#login,#trip_add,#Income_Expense,#fuel,#track,#geofencesave,#trippayments,.basicvalidation,#smtpconfigtestemail').validate({
    
    $('#fuel_carte_peage_add,#fuel_carte_carburant_add,#vehicle_remorque_add,#facture_add,#transitaire_add,#add_driver,#vehicle_add,#invoice_add,#customer_add,#login,#trip_add,#Income_Expense,#fuel,#track,#geofencesave,#trippayments,.basicvalidation,#smtpconfigtestemail;#pregate_add').validate({
        errorClass: "invalid-feedback",
        rules: {
        	 testemailto : {
                required: true,
                 email: true,
            },
            password : {
                minlength : 5
            },
            cnfpassword : {
                minlength : 5,
                equalTo : "#password"
            },
            d_name: {
                required: true,
            },
            d_mobile: {
                required: true,
                number: true,
                minlength: 9,
                maxlength: 13,
            },
            d_age: {
                required: true,
                number: true,
                min: 18,
                max: 70,
            },
            d_licenseno: {
                required: true,
            },
            d_license_expdate: {
                required: true,

            },
            d_total_exp: {
                required: true,
            },
            d_doj: {
                required: true,
            },
            d_total_exp: {
                required: true,
                number: true,
                min: 0,
                max: 70,
            },
            d_address: {
                required: true,
            },
            v_registration_no: {
                required: true
            },
            v_name: {
                required: true
            },
            v_model: {
                required: true,
            },
            v_chassis_no: {
                required: true,
            },
            v_engine_no: {
                required: true,
            },
            v_manufactured_by: {
                required: true,
            },
            v_reg_exp_date: {
                required: true,
            },
/* debut*/  
            pr_conteneur: {
                required: true,
            },
            pr_trip: {
                required: true,
            },
            pr_date_reception: {
                required: true,
            },            
            
/*Fin*/            
            
            
            
            v_group: {
                required: true,
            },
            c_name: {
                required: true,
            },
            c_mobile: {
                required: false,
                number: true,
                minlength: 9,
                maxlength: 13,
            },
            c_email:{
                email: true,
                required: false,
            },
            c_address: {
                required: false,
            },    
 
             /* debut Transitaire  */           

            t_name: {
                required: true,
            },
            t_mobile: {
                required: false,
                number: true,
                minlength: 9,
                maxlength: 13,
            },
            t_email:{
                email: true,
                required: false,
            },
            t_address: {
                required: false,
            },            
            
            
            /* fin Transitaire  */           
             t_customer_id: {
                required: true,
            },
            t_vechicle: {
                required: true,
            },
            t_driver: {
                required: true,
            },
            t_type: {
                required: true,
            },
            t_trip_fromlocation: {
                required: true,
            },
            t_trip_tolocation: {
                required: true,
            },
            t_start_date: {
                required: true,
            },
            t_end_date: {
                required: true,
            },
            t_trip_amount: {
                required: true,
                number: true,
                minlength: 3,
                maxlength: 6,
            },
            e_expense_amount: {
                required: true,
                number: true,
                minlength: 2,
                maxlength: 6,
            },
            ie_amount: {
                required: true,
                number: true,
                minlength: 2,
                maxlength: 6,
            },
             ie_description: {
                required: true,
            },
             ie_date: {
                required: true,
            },
             ie_type: {
                required: true,
            },
             ie_v_id: {
                required: true,
            },
            v_fuelprice: {
                required: true,
                number: true,
                minlength: 3,
                maxlength: 6,
            },
            v_fuel_quantity: {
                required: true,
                number: true,
                minlength: 1,
                maxlength: 6,
            },
            v_odometerreading: {
                required: true,
                number: true,
                minlength: 1,
            },
             v_fuelfilldate: {
                required: true,
            },
             v_fleetaddedby: {
                required: true,
            },
             v_id: {
                required: true,
            },
            v_fleetcomments: {
                 maxlength: 30,
            },
            fromdate: {
                required: true,
            },
            todate: {
                required: true,
            },
            t_vechicle: {
                required: true,
            },
             v_type: {
                required: true,
            },
            
            
            
            
            
            geo_name:{
                required: true,
            },
            geo_description:{
                required: true,
            },
            tp_amount:{
                lessThanEqual: true,
                required: true,
            },
            tp_notes:{
                required: true,
            },
        },
        messages: {
             v_type: {
                required: "Le type de Véhicule est obligatoire",
            },
            d_name: {
                required: "Le nom du conducteur est obligatoire",
            },
            d_mobile: {
                required: "Le numéro mobile est obligatoire",
                number: "Veuillez saisir un numéro valide",
            },
            d_licenseno: {
                required: "License number est obligatoire",
            },
            d_license_expdate: {
                required: "Date d'expiration de la licence est obligatoire",
            },
            d_doj: {
                required: "Date d'adhésion est obligatoire",
            },
            d_total_exp: {
                required: "Une expérience totale est obligatoire",
            },
            d_address: {
                required: "L'adresse est obligatoire",
            },
            v_manufactured_by: {
                required: "Le fabriquant par est obligatoire",
            },
            v_reg_exp_date: {
                required: "La date d'expiration de l'inscription est obligatoire",
            },
            v_group: {
                required: "Le type du Véhicule est obligatoire",
            },
            v_engine_no: {
                required: "Le numéro du moteur est obligatoire",
            },
            v_chassis_no: {
                required: "Le numéro du chassis est obligatoire",
            },
            v_model: {
                required: "Le modéle est obligatoire",
            },
            v_registration_no: {
                required: "Le numéro d'immatriculation est obligatoire",
            },
            v_name: {
                required: "Le nom du Véhicule est obligatoire",
            },
            
/* Debut*/
            
            
            pr_conteneur: {
                required: "La selection du conteneur est obligatoire",
            },
            pr_trip: {
                required: "La selection de la facture est obligatoire",
            },
            pr_date_reception: {
                required: "Le nom du Véhicule est obligatoire",
            },            
            
/*Fin*/            
            
            
            c_mobile: {
                required: "Le numéro de portable est obligatoire",
                number: "Veuillez saisir un numéro valide",
            },
            c_name: {
                required: "Le nom du client est obligatoire",
            },
            c_email:{
                required: "L'email du client est obligatoire",
            },
            c_address: {
                required: "L'adresse du client est obligatoire",
            },
            t_vechicle: {
                required: "Choisissez le véhicule",
            },
            t_driver: {
                required: "Choisissez le conducteur",
            },
            t_type: {
                required: "Choisissez le type de voyage",
            },
            t_trip_fromlocation: {
                required: "Sélectionnez le lieu de départ du voyage",
            },
            t_trip_tolocation: {
                required: "Sélectionnez le voyage vers / le lieu d'arrivée",
            },
            t_start_date: {
                required: "Sélectionnez la date de début du voyage",
            },
            t_end_date: {
                required: "Sélectionnez le voyage jusqu'au / la date de fin",
            },
            t_trip_amount: {
                required: "Montant du voyage / mission est obligatoire",
                number: "Veuillez saisir un numéro valide",
            },
            geo_name:{
                required: "Le nom de Geofence est obligatoire",
            },
            geo_description:{
                required: "La description de Geofence est obligatoire",
            },
             tp_amount:{
                required: "Le montant est obligatoire",
                lessThanEqual : "Le montant doit être inférieur au montant en attente"
            },
             tp_notes:{
                required: "Le maiement des notes est obligatoire",
            },
            ie_amount:{
                required: "Le montant est obligatoire",
            },
            errorElement: 'span',
            errorPlacement: function (error, element) {
              error.addClass('invalid-feedback');
              element.closest('.form-group').append(error);
            },
            highlight: function (element, errorClass, validClass) {
              $(element).addClass('is-invalid');
            },
            unhighlight: function (element, errorClass, validClass) {
              $(element).removeClass('is-invalid');
            }

        },
        errorElement: 'span',
        errorPlacement: function (error, element) {
          error.addClass('invalid-feedback');
          element.closest('.form-group').append(error);
        },
        highlight: function (element, errorClass, validClass) {
          $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
          $(element).removeClass('is-invalid');
        }
      });
    $("#v_registration_no").on('keypress change', function(event) {
       var data=$(this).val();
       $("#v_api_username").val(data);
    });
    
  
        $('#vehiclelisttbl,#invoicelisttbl,#driverslisttbl,#triptbl,#custtbl,#fueltbl,#incomexpensetbl,#conteneurtbl').DataTable({
           "bLengthChange": false,
           "bInfo": false,
           "ordering": false
        });
        $('#bookingstbl,#vgeofencetbl,#incomexpenstbl,#conteneurtbl,.datatable').DataTable({
           "bLengthChange": false,
           "pageLength" : 5,
           "bInfo": false,
           "ordering": false
        });
        $('.datatableexport').DataTable({
           "bInfo": false,
           "ordering": false,
            dom: 'Bfrtip',
            buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ]
        });

    
});
// expense fields
    var row = 1;
    function expense_fields() {
        row++;
        var objTo = document.getElementById('new_exp_row')
        var divtest = document.createElement("div");
        divtest.setAttribute("class", "removeclass" + row);
        var rdiv = 'removeclass' + row;
        divtest.innerHTML = '<div class="row"> <div class="col-sm-6 col-md-3 "> <div class="form-group"> <input type="text" class="form-control" id="e_expense_type" required="true" name="e_expense_type[]" value="" placeholder="Expense Type"> </div> </div> <div class="col-sm-6 col-md-3 "> <div class="form-group"> <input type="text" class="form-control" id="e_expense_desc" required="true" name="e_expense_desc[]" value="" placeholder="Expense description"> </div> </div> <div class="col-sm-3 col-md-3"> <div class="form-group"> <input type="text" class="form-control" id="e_expense_amount" required="true" name="e_expense_amount[]" value="" placeholder="Value"> </div> </div> <div class="col-sm-3 col-md-3"> <div class="input-group-btn"> <button class="btn btn-danger" type="button" onclick="remove_expense_fields(' + row + ');"> <span class="fe fe-minus" aria-hidden="true"></span> </button> </div> </div> </div> <div class="clear"></div>';
        objTo.appendChild(divtest)
    }
    // remove expense fields
    function remove_expense_fields(rid) {
        $('.removeclass' + rid).remove();
    }

function alertmessage(msg,type) {
    if(type==1) {
        const Toast = Swal.mixin({toast: true,position: 'top',showConfirmButton: false,timer: 5000});
        Toast.fire({
          type: 'success',
          title: msg
        });
    }
    if(type==2) {
         const Toast = Swal.mixin({toast: true,position: 'top',showConfirmButton: false,timer: 5000});
        Toast.fire({
          type: 'error',
          title: msg
        });
    }
}

$('#showgeofencemodel').on('click', function(e){
    e.preventDefault();
    var geo_area = $('#geo_area').val();
    if (geo_area == "") {
          alertmessage('Please select area in map',2);
    } else {
        $('#modal-geofence').modal('show');
    }
});


$('.geofenceviewpopup').on('click', function(e){
    e.preventDefault();
    var base = $('#base').val();
    $.ajax({
        type: "post",
        data: {'id':$(this).data('id')},
        url: base+"geofence/geofence_get",
        dataType: 'json',
        success: function (result) {
            if(result=='false') {
                 alertmessage('Failed to fetch geo data',2);
            } else {
                console.log(result);
                var center = result[0].split(",");
                var latcenter = parseFloat(center[0]);
                var logcenter = parseFloat(center[1]);
                var mapProp = {
                   center:new google.maps.LatLng(latcenter,logcenter),
                   zoom:18,
                   mapTypeId:google.maps.MapTypeId.ROADMAP,
                    scrollwheel: true,
                    gestureHandling: 'cooperative'
                };
                var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);  

                var AreaCoords = new Array();
                $.each( result, function( key, val ) {
                    var val = val.split(",");
                    var lat = parseFloat(val[0]);
                    var log = parseFloat(val[1]);
                  AreaCoords.push(new google.maps.LatLng(lat, log));
                });
                console.log(AreaCoords)
                var tourplan = new google.maps.Polyline({
                   path:AreaCoords,
                   strokeColor:"#0817FA",
                   strokeOpacity:0.6,
                   strokeWeight:2
                });           
                tourplan.setMap(map);
                $('#geofencepopupmodel').modal('show');
            }
        }
    });
});

$('.logodelete').on('click', function(){
   $.ajax({
    url: 'logodelete',
    type: 'post',
    dataType: 'json',
    data: '',
    success: function(response){ 
      location.reload();
    }
  });
 });


$('.todayreminderread').on('click', function(e){
   e.preventDefault();
    var base = $('#base').val();
    var rid = $(this).data('id');
    $.ajax({
        type: "post",
        data: {'r_id':rid},
        url: base+"dashboard/remindermark",
        dataType: 'json',
        success: function (result) {
            if(result==1) {
                $('#'+rid).remove();
                alertmessage('Reminder marked as read',1);
            } else {
                alertmessage('Something went wrong',2);
            }
        }
  });
 });