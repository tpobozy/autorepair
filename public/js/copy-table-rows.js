
var copyTableRows = (function($, autocompleteSupplier) {
	// Private
	var core = {};
	var endpoint;
	var $input;

	// Public property

	// Public method
	core.init = function() {
        serviceRow();
		productRow();
	};


	function serviceRow() {
        $(document).on('click', '#insert-service-row', function (e) {
            var index = $('#table-services tr').length - 2;
            var number = $('#table-services tr').length - 3;
            var new_row = $('#services-template').html().replace(/#index#/gi, index).replace(/#number#/gi, number);

            $('#services-copy-tr').before(
                $('<tr>')
                    .append(new_row)
            );

            refreshDatepicker();
        });
	}

    function productRow() {
		$(document).on('click', '#insert-product-row', function (e) {
            var index = $('#table-products tr').length - 2;
            var number = $('#table-products tr').length - 3;
            var new_row = $('#products-template').html().replace(/#index#/gi, index).replace(/#number#/gi, number);
            
            $('#products-copy-tr').before(
                $('<tr>')
                    .append(new_row)
            );
    
            refreshDatepicker();
            autocompleteSupplier.refresh();
        });
	}

    function refreshDatepicker() {
        $(".datepicker").datepicker('destroy');

        $(".datepicker").datepicker({
            todayBtn: true,
            autoclose: true,
            todayHighlight: true,
            format: 'yyyy-mm-dd'
        });
    }

	// Return just the public parts
	return core;

}(jQuery, autocompleteSupplier));


$(document).ready(function() {
    copyTableRows.init();
});
