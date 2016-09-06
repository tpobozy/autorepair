
var autocompleteName = (function($) {
	// Private
	var core = {};
	var endpoint;
	var $input;

	// Public property

	// Public method
	core.init = function() {
        endpoint = '/zlecenia/client/details';
        $input = $('#name');

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
                        name: request.term
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
            minLength: 2,
            focus: function() {
                // prevent value inserted on focus
                return false;
            },
            select: function( event, ui ) {
                handleSelection(ui.item);
                return false;
            }

        });
	}

    function render() {
		if ($input.length) {
			$input.data("ui-autocomplete")._renderItem = function(ul, item) {
				if ( ! ul.hasClass('ui-name-search')) {
					ul.addClass('ui-name-search');
				}

				var content = '';

				if (item.name) {
					content += "<span class='s-name'>" + item.name + "</span>";
				}
				if (item.address) {
					content += "<span class='s-address'>" + item.address + "</span>";
				}

				if (item.category) {
                    return  $( "<li class='ui-category'><a class=''>" + content + "</a></li>" )
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
        $('#name').val(item.name);
        $('#address').val(item.address);
        $('#nip').val(item.nip);
        $('#telephone').val(item.telephone);
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
    autocompleteName.init();
});
