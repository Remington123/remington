/* Llamado o ejecución de funciones */
iniciarCamposFechas();
dtReportePedido();
dtReporteCliente();
dtReporteProducto();

//Creación de funciones JS para el módulo empleado
function iniciarCamposFechas(){

	$.fn.datepicker.dates['en'] = {
	    days: ["Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado"],
	    daysShort: ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"],
	    daysMin: ["Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa"],
	    months: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
	    monthsShort: ["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"],
	    today: "Hoy",
	    clear: "Clear",
	    format: "yyyy/mm/dd",
	    titleFormat: "MM yyyy", /* Leverages same syntax as 'format' */
	    weekStart: 0
	};


	$('.datepicker_pedidos').datepicker({
      autoclose: true
    });

    $('.datepicker_clientes').datepicker({
      autoclose: true
    });

    $('.datepicker_productos').datepicker({
      autoclose: true
    });
}

function dtReportePedido(){
	$("#buscar").on("click", function(){
		var fechaInicio = $("#fechaInicio").val(),
			fechaFin =  $("#fechaFin").val();

		console.log( fechaInicio );	
		console.log( fechaFin );
			
		if( Date.parse( fechaInicio ) > Date.parse( fechaFin ) ){
			alert("Fecha Inicio no pude ser mayor que la fecha Fin");
		}else{

			if ( $.fn.DataTable.isDataTable('#dt_reportepedido') )
			  	$("#dt_reportepedido").empty();

			var table = $("#dt_reportepedido").DataTable({
				"bDestroy": true,
				ajax:{
					method: "POST",
					url: "../src/reportes/ReportesController.php",
					data: {opcion:"pedidosPorRangoFechas",
							fechaInicio: fechaInicio,
							fechaFin: fechaFin}
				},
				columns:[
					{"data":"idpedido", visible: false },
					{"data":"idcliente", visible: false },
					{"data":"nombres"},
					{"data":"apellidos"},
					{"data":"email"},
					{"data":"total"},
					{"data":"fecha"}
				],
				"dom": "<'row'<'form-inline' <'col-sm-offset-5'B>>>"
					 +"<'row' <'form-inline' <'col-sm-1'f>>>"
					 +"<rt>"
					 +"<'row'<'form-inline'"
					 +" <'col-sm-6 col-md-6 col-lg-6'l>"
					 +"<'col-sm-6 col-md-6 col-lg-6'p>>>",
				"buttons":[
					{
						"text": "<i class='fa fa-user-plus'></i>",
						"titleAttr": "Agregar Usuario",
						"className": "btn btn-success",
						"action": function(){
							agregar_nuevo_usuario();
						}
					},
					{
		                extend:    'excelHtml5',
		                text:      '<i class="fa fa-file-excel-o"></i>',
		                titleAttr: 'Excel'
		         },
		         {
		         	extend: 'csvHtml5',
		         	text: '<i class="fa fa-file-text-o"></i>',
		         	titleAttr: 'CSV'
		         },
		         {
		                extend:    'pdfHtml5',
		                text:      '<i class="fa fa-file-pdf-o"></i>',
		                titleAttr: 'PDF'
		         }
				]
			});
		}
	});
}

function dtReporteCliente(){

	$("#buscar").on("click", function(){
		var fechaInicio = $("#fechaInicio").val(),
			fechaFin =  $("#fechaFin").val();

		if( Date.parse( fechaInicio ) > Date.parse( fechaFin ) ){
			alert("Fecha Inicio no pude ser mayor que la fecha Fin");
		}else{
			if ( $.fn.DataTable.isDataTable('#dt_reportepedido_cliente') )
			  	$("#dt_reportepedido_cliente").empty();

			var table = $("#dt_reportepedido_cliente").DataTable({
				"bDestroy": true,
				ajax:{
					method: "POST",
					url: "../src/reportes/ReportesController.php",
					data: { opcion:"clientesQueNoRealizaronPedidos", 
							fechaInicio: fechaInicio,
							fechaFin: fechaFin}
				},
				columns:[
					{"data":"idcliente"},
					{"data":"nombres"},
					{"data":"apellidos"},
					{"data":"dni"},
					{"data":"email"},
					{"data":"fecha"}
				]
			});
		}
		
	});


}

function dtReporteProducto(){

	$("#buscar").on("click", function(){
		var fechaInicio = $("#fechaInicio").val(),
			fechaFin =  $("#fechaFin").val();

		if( Date.parse( fechaInicio ) > Date.parse( fechaFin ) ){
			alert("Fecha Inicio no pude ser mayor que la fecha Fin");
		}else{
			if ( $.fn.DataTable.isDataTable('#dt_reportepedido_productos') )
			  	$("#dt_reportepedido_productos").empty();

			var table = $("#dt_reportepedido_productos").DataTable({
				"bDestroy": true,
				ajax:{
					method: "POST",
					url: "../src/reportes/ReportesController.php",
					data: { opcion:"productosVendidosPorRangoFechas", 
									fechaInicio: fechaInicio,
									fechaFin: fechaFin}
				},
				columns:[
					{"data":"idproducto", visible: false},
					{"data":"descripcion"},
					{"data":"fecha"},
					{"data":"cantidad"},
					{"data":"total"}
				]
			});
		}
	});
}
