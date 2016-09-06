
var autocompleteSupplier = (function($) {
	// Private
	var core = {};
	var availableTags = [
        "Arpol",
        "AutoParts",
        "Gordon",
        "InterCars"
    ];

	// Public property

	// Public method
	core.init = function() {
        run();
	};
	core.refresh = function() {
        refresh();
	};

	function run() {
        $('.field-supplier').autocomplete({
            minLength: 0,
            source: availableTags
        }).on('focus', function(event) {
            $(this).autocomplete("search");
        });
	}

	function refresh() {
        $('.field-supplier').autocomplete('destroy');
        
        run();
	}


	// Return just the public parts
	return core;

}(jQuery));


$(document).ready(function() {
    autocompleteSupplier.init();
});
