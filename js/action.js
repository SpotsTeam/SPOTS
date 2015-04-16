$( ".tipue_drop_input" ).on( "autocompleteselect", function( event, ui ) {
	$('#tipue_drop_input').val("");
	console.log($(this));
} );

function getSuggested(){

	var availableTags = [];

	$.ajax({
		type: "GET",
		url: "Location: /SPOTS/drivePage.php/getSuggested" ,
		dataType: "json",
		success: function(result) {
			console.log(result);
			for(var i = 0; i < result.length - 1; i++) {
				availableTags[i] = result[i][0];
			};
			$( "#tipue_drop_input" ).autocomplete({
				source: availableTags,
				select: function(event, ui){
                //console.log();
                clickAdd(ui.item.value);
                console.log("clearing");
                $(this).val(''); 
                return false;
            }
        });
		},
		error: function(jqXHR, textStatus, errorThrown){
			console.log(jqXHR, textStatus, errorThrown);
		}});
}