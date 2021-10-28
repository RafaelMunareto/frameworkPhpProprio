$('table').on('scroll', function () {
    $("table > *").width($("table").width() + $("table").scrollLeft());
});

		$(".ranking tbody tr td").each(function(){
	       if($(this).text() >= 100){  
	    	  $(this).addClass('cem');
	      	}else if ($(this).text() >=90 && $(this).text() < 100 ) {
	      	  $(this).addClass('noventa');	
	      	}else if ($(this).text() >=80 && $(this).text() < 90){
	      	  $(this).addClass('oitenta');
	      	}else if($(this).text() < 80){
	      	  $(this).addClass('setenta');
	      	}
    	});	