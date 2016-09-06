
var autocompleteVin = (function($) {
	// Private
	var core = {};
	var endpoint;
	var $input;

	// Public property

	// Public method
	core.init = function() {
        endpoint = '/zlecenia/car/details';
        $input = $('#vin');

		run();
        render();
	};


	function run() {
        $input.autocomplete({
            source: function(request, response) {
                $.ajax({
                    url: endpoint,
                    dataType: "json",
                    data: {
                        vin: request.term
                    },
                    beforeSend: function(event) {
						showLoader();
					}
                }).
                done(function( resp ) {
                    if (resp.status == 'success') {
                        response( resp.data );
                    }
				}).always(function( data ) {
					hideLoader();
				});
            },
            minLength: 16,
            focus: function() {
                // prevent value inserted on focus
                return false;
            },
            select: function( event, ui ) {
                handleSelection(ui.item);
                return false;
            }
//                log( ui.item ?
//                  "Selected: " + ui.item.vin + " aka " + ui.item.id :
//                  "Nothing selected, input was " + this.value );

        });
	}

    function render() {
		if ($input.length) {
			$input.data("ui-autocomplete")._renderItem = function(ul, item) {
				if ( ! ul.hasClass('ui-vin-search')) {
					ul.addClass('ui-vin-search');
				}

				var content = '';

				if (item.vin) {
					content += "<span class='s-vin'>" + item.vin + "</span>";
				}
				if (item.make) {
					content += "<span class='s-make'>" + item.make + "</span>";
				}
				if (item.model) {
					content += "<span class='s-model'>" + item.model + "</span>";
				}
				if (item.year) {
					content += "<span class='s-year'>" + item.year + "</span>";
				}
                if (item.license_number) {
					content += "<span class='s-license-number'> - " + item.license_number + "</span>";
				}

				if (item.category) {
                    return  $( "<li class='ui-category'><a class=''>" + content +"</a></li>" )
                        .appendTo( ul )
                    ;
				} else {
					return $( "<li>" )
						.append( "<a>" + content + "</a>" )
						.appendTo( ul )
					;
				}
			};
		}
	}


    function handleSelection(item) {
        console.log(item);
        $('#vin').val(item.vin);
        $('#make').val(item.make);
        $('#model').val(item.model);
        $('#license_number').val(item.license_number);
        $('#year').val(item.year);
        $('#engine_size').val(item.engine_size);
        $('#radio_code').val(item.radio_code);
    }

    function showLoader() {
        // todo
    }

    function hideLoader() {
        // todo
    }

	function displayErrorMessage(message) {
		alert( "Request failed: " + message );
	}


	// Return just the public parts
	return core;

}(jQuery));


$(document).ready(function() {
    autocompleteVin.init();
});
