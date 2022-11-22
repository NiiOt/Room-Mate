 $(".btnapartment").click(function(){
    btnid = $(this).attr("id");
    // console.log(btnid)
    $.post("php/ajax.php",{status:"secureApartmentID",id:btnid},function(data){
    	$(".lightbox").html(data)
    	// alert(data)
    })


  })

