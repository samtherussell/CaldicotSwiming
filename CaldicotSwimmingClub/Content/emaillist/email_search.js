$('document').ready(function(){
	$('#results').hide();
	$('#search_term').keyup(function(){
		go();
	});
	
	$('#upper').keyup(function(){
		go();
	});
	
	$('#lower').keyup(function(){
		go();
	});
	$('#go').click(function(){
		
		go();
	});
			
			
			
			
		function go(){
			if($('#lower').val().length>0 && $('#upper').val().length>0){
			
				if($('#search_term').val().length>0){
					var search_term = $('#search_term').val();
				}else {
					var search_term = "";
				}
				
				var lower = $('#lower').val();
				var upper = $('#upper').val();
				
				var m = $('#m').attr('checked');
				var f = $('#f').attr('checked');
				var b = $('#b').attr('checked');
				var s = $('#s').attr('checked');
				var o = $('#o').attr('checked');
				var c = $('#c').attr('checked');
				
				
				$.post('email_search.php', {search_term:search_term, m:m, f:f, b:b, s:s, o:o, c:c, upper:upper, lower:lower }, 
					function(results){
					$('#results').slideDown();
					$('#results').html(results);
					}
				);
			}
		}
	});

