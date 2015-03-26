		$("#btnGenerar").click( function()
        {
			if(!validar($("#txtNombre")))
			return 0;
            var url="generarJSON.php";
			$("#tablajson tbody").html("");
			$.getJSON(url,function(generator){
			$.each(generator, function(i,generator){
			var newRow =
			"<tr>"
			+"<td>"+generator.id+"</td>"
			+"<td>"+generator.frase.replace('<nombre>', $("#txtNombre").val())+"</td>"
			+"</tr>";
			$(newRow).appendTo("#tablajson tbody");
			});
			});
           }
        );
		
		function validar(campo)
		{
			if(campo.val()==""){
				alert("Digite un valor.")
				return false;
			}
			return true;
		}