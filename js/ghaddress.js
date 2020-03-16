$(document).ready(function(){
	// alert()
	regions= ["GA","GREATER ACCRA",
			  "AR","ASHANTI REGION",
			  "BA", "BRONG AHAFO",
			  "CR","CENTRAL REGION",
			  "ER","EASTERN REGION",
			  "VR","VOLTA REGION",
			  "UE","UPPER EAST",
			  "UW","UPPER WEST",
			  "NR","NORTHERN REGION",
			  "WR","WESTERN REGION"
			 ];

 
 for(i=0;i<=regions.length-1;i++){
 	output = "<option value ="+regions[i]+">"+regions[i+1]+"</option>";
 	i++;
    $("#region").append(output);
 	
 }

})