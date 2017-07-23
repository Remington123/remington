$(function(){
	showPage();
	login();
});

function showPage(){
	$("a").on("click", function(e){
		e.preventDefault();
		var path = $(this).attr("data-page");
		$.ajax({
			method: "POST",
			url: "../views/modules/"+path
		}).done(function( info ){			
			var n = path.lastIndexOf("/"),//devuelve la posición del caracter
    			module = path.slice(0, n),//obtiene los caracteres de acuerdo al límite
    			page = JSON.parse( info ),//Convertine de cadena json a un objeto
    			script = $("<script></script>").attr("src","../views/modules/"+module+page.script);
			
			console.log( info );
			console.log(module);
			console.log(page);
			console.log(script);

			$("#showpage").html( page.content );
			$("#myscripts").html("");//limpiar
			$("#myscripts").append( script );
		});

	});
}

function login(){
	$("#frm-autenticacion-user").on("submit", function(e){
		e.preventDefault();
		var frm = $(this).serialize();
		console.log( frm );
		var controller = $(this).attr("action");
		$.ajax({
			method:"POST",
			url:"../src/"+controller,
			data: frm
		}).done( function(info){
			console.log( info );
		});
	});
}