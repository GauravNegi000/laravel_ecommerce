// custom js for side navbar

/* Set the width of the side navigation to 250px */
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
}

/* Set the width of the side navigation to 0 */
function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}

// 

$.ajaxSetup({
  headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
$(document).ready(function() {
  
  $("#country").change(function(){
    // country id
    var country_id = $(this).val();

    // Empty the dropdown
    $('#city').find('option').not(':first').remove();

    // ajax call to getcities of particular country
    $.ajax({
        url: "/getCities/"+country_id,
        type: "PUT",
        data: { country_id : $(this).val() },
        dataType: 'json',
        success: function(response){
          displayCity(response);
        },
    });
  });
});

// function to display cities on select element
function displayCity(cities) {
  cities.forEach(city => {
    var optionElement = "<option value='"+city.id+"'>"+city.name+"</option>"
    console.log(city.name);
    $("#city").append(optionElement);
  });
}

