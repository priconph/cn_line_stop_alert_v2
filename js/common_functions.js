/* Note: you need to call jquery or other library for these to work */

/* Call basic ajax for submit */
function call_ajax(data, handler, fn) {
    data = $.param(data);
    $.ajax({
        type: "post",
        dataType: "json",
        data: data,
        url: handler,
        success: function (result) {
            fn(result);
        },
        error: function (result) {
            // alert('error ajax');
        }
    });
}

function call_ajax_serialize(data, serialized_data, handler, fn) {
    data = $.param(data) + '&' + serialized_data;
	$.ajax({
        type: "post",
        dataType: "json",
        data: data,
        url: handler,
        success: function (result) {
            fn(result);
        },
        error: function (result) {
            // alert('error ajax');
        }
    });
}

function call_ajax_async_false(data, handler, fn) {
    data = $.param(data);
    $.ajax({
        type: "post",
        dataType: "json",
        data: data,
        url: handler,
		async: false,
        success: function (result) {
            fn(result);
        },
        error: function (result) {
            // alert('error ajax');
        }
    });
}

function create_table(table_id, table_class, array_theader, array_tbody) {
    var html = '<table id="' + table_id + '" class="' + table_class + '">';
    /* Generate table header */
	html += '	<thead>';
	for(x=0;x<array_theader.length;x++){
		html += '	<th>' + array_theader[x] + '</th>';
    }
	html += '	</thead>'
	/* Generate table body */
	html += '	<tbody>';
	for(x=0;x<array_theader.length;x++){
		html += '	<td>' + array_tbody[x] + '</td>';
    }
	html += '	</tbody>';
	html += '</table>';
	return html;
}

function call_ajax_attachment(serialized_data, handler, fn) {
	$.ajax({
		url				: handler, 		
		type			: "POST",          
		data			: serialized_data, 
		contentType		: false,       
		dataType		: 'json',
		cache			: false,             
		processData		: false,     
		success			: function(result)  
		{
			fn(result);
		}, error : function (result) {
			alert('ERROR: '+result['upload_msg']);
		}
	}); 
}
function table_loading_screen(tbl_id,colspan){
	var html  = '<tr>';
		html += ' <td colspan="'+colspan+'"><center><span class="fa fa-4x fa-circle-o-notch fa-spin"></span> <h3>Loading.....</h3></center></td>'; 
		html += '</tr>';
	$('#'+tbl_id + ' tbody').empty();
	$('#'+tbl_id + ' tbody').append( html );
}