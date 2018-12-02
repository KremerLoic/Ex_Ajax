$('#label_region').hide();
$('#label_ville').hide();

$(document).ready(function() {


  $.ajax({
    url: "request.php",
    method: "GET",
    dataType: "JSON",
    success: function(data) {
      console.log(data);
      var options = '<option value=no_pays>---Selectionner Pays--- </option>';
      $.each(data, function(i, e) {
        options += '<option value=' + i + '>' + e + '</option>'
      })
      $('#pays').html(options);
    },
    error: function(e) {
      console.log("error")
      console.log("e");
    },
    statusCode: {
      404: function() {
        console.log("Page non trouvée");
      }
    }
  });



  $('#pays').on('change', function(e) {
    $('#label_region').show();
    var choixPays = $(this).val();

    $.ajax({
      url: "request.php",
      method: "GET",
      dataType: "JSON",
      data: {
        id_pays: choixPays
      },
      success: function(data) {
        var options = '<option value = no_region> --- Selectionner Region --- </options>';
        $.each(data, function(i, e) {
          options += '<option value=' + i + '>' + e + '</option>'
        });
        $('#region').html(options);
      },
      error: function(e) {
        console.log("error")
        console.log("e");
      },
      statusCode: {
        404: function() {
          console.log("Page non trouvée");
        }
      }
    });

  })


$('#region').on('change', function(e){
$('#label_ville').show();
var choixRegion = $(this).val();


$.ajax({
url:"request.php",
method:"GET",
dataType:"JSON",
data:{
 id_region: choixRegion,
},
success:function(data){
console.log(data);
var options = '<option value = no_region> --- Selectionner Ville --- </options>';
$.each(data,function(i,e){
options+= '<option value = '+i +'>' + e + '</option>'
});
$('#ville').html(options);
},
error: function(e) {
  console.log("error")
  console.log("e");
},
statusCode: {
  404: function() {
    console.log("Page non trouvée");
  }
}


});



});

})
