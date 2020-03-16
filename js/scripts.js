$(".view").click(function(){
    id=$(this).attr("id");
    $(this).html("<i class='fa fa-spinner fa-spin'></i><span> Opening...</span>");
    console.log(id);

    $.post("php/functions.php",{status:"saveHomeId",id:id},function(data){
     	 if (data="Success") {
     	 	window.location="view.html";
     	 	
     	 }else{
     	 	console.log(data)
     	 }
     	 // $(".card-content").html(data);
    })

     $(".carousel-item img").dblclick(function(){
        alert();
        var d = new Date();
        var n = d.getTime();
        var link = document.createElement('a')
        name = $(this).attr('src')
        link.href = name;
        link.download = "roomate"+n;
        document.body.appendChild(link);
        link.click();
            })
})