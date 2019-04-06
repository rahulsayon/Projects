<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	  <table>
	  	    <tr>
	  	    	<td>State</td>
	  	    	
	  	    </tr>
	  	    <tr>
	  	    	<td>

	  	    		<select onchange="getdistrict(this.value)">
	  	    			<option>Select</option>
	  	    			 <?php  foreach($data as  $value) { ?>
 	  	    			 
	  	    			  <option  value="<?php  echo $value['id'] ; ?>"> <?php  echo $value['name'] ; ?>   </option>

	  	    				<?php }    ?>
	  	    		</select>

	  	    	</td>
	  	    	
	  	    </tr>

	  	     <tr>
	  	    	<td>City</td>
	  	    	
	  	    </tr>
	  	    <tr>
	  	    	<td>
	  	    		

	  	    	  <select id="distt">
                                    
                                    <option> ---Distrnict--  </option>  
                                 
                  </select>

	  	    	</td>
	  	    	
	  	    </tr>

	  </table>

	  <script type="text/javascript">
	  	
	  	   function getdistrict(n){
               var obj;
               if(window.XMLHttpRequest){
               	   obj  = new XMLHttpRequest();
               }
               else
               {
               	 obj = new ActiveXObject("Microsoft.XMLHTTP");
               }
               obj.onreadystatechange = function(){
                 
              if(obj.readyState == 4 && obj.status == 200 ){
                      
              	 document.getElementById("distt").innerHTML = obj.responseText
                 }
               }
               obj.open("GET" , "http://localhost/9amci/My/dist/"+n,true);
               obj.send();
	  	   }
	  </script>

</body>
</html>
