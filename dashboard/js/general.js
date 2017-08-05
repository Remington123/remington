$(function(){
	//alert("general");
	showPage();
	//dibujarPaginasEnSiderBar();
	//login();
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
    			script = $("<script></script>").prop("src","../views/modules/"+module+page.script);
			
			var script   = document.createElement("script");
			script.type  = "text/javascript";
			script.src   = "../views/modules/"+module+page.script;    // use this for linked script
			//document.body.appendChild(script);

			console.log(script);

			$("#showpage").html( page.content );
			$("#myscripts").html("");//limpiar
			$("#myscripts").append( script );
		});

	});
}

function dibujarPaginasEnSiderBar(){
	$.ajax({
		method:"POST",
		url:"../src/pagina/PaginaController.php",
		data:{"opcion":"listar"}
	}).done(function(info){
		//respuesta del servidor
		var paginas = JSON.parse(info);
		//console.log(info);
		console.log(paginas);

		var html = `<li class="header">MAIN NAVIGATION</li>`;

       	for(var i in paginas.modulo ){
       		var idmodulo = paginas.modulo[i].idmodulo,
       			modulo = paginas.modulo[i].nombre;

	        html+=`<li class="treeview">
	          <a href="#">
	            <i class="fa fa-files-o"></i>
	            <span>${ modulo }</span>
	            <span class="pull-right-container">
	              <span class="label label-primary pull-right">4</span>
	            </span>
	          </a>
	          <ul class="treeview-menu">`;

	        for( var j in paginas.data ){
	          	var pagina = paginas.data[j].pagina,
	          		data_idmodulo = paginas.data[j].idmodulo,
       				caracter = pagina.lastIndexOf("/"),
       				limite = pagina.length;
    				nombrepagina = pagina.slice(caracter+1, limite-4 );
    			
    			if( idmodulo == data_idmodulo )
	            	html+=`<li><a href=\"\" data-page="${ pagina }"><i class="fa fa-circle-o"></i> ${nombrepagina}</a></li>`;
	        }
	          html+=`</ul>
	        </li>`;
    	}

    	$(".sidebar-menu").append(html);
	});
}




function login(){
	$("#frm-autenticacion-user").on("submit", function(e){
		e.preventDefault();
		var frm = $(this).serialize();
		console.log( frm );
		var controller = $(this).attr("action");
		console.log(controller);
		$.ajax({
			method:"POST",
			url:"../src/"+controller,
			data: frm
		}).done( function(info){
			console.log( info );
		});
	});
}