<!DOCTYPE html>
<html>
<head>
  
  <?php  include 'codes/functions/addItem_function.php';?>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script type="text/javascript">
 $(document).on('click','#showData',function(e){
  
  var myVar = $("#inputGroup").val();
  var length= $("#length").val();
  var width= $("#width").val();
  var height=$("#height").val();
  
  var aH=$("#allowanceH").val();
   var fheight=(+height)+(+aH);

   var aL=$("#allowanceL").val()
   var flength=(+length)+(+aL);

  var no=$("#no").val();
  var stackable=$("#stackable").val();


   
 
   var capacity_needed=flength*width*fheight*no/stackable;


 $.ajax({
  url: "getdata.php",
  type: "POST",
  data:{"myData":myVar,
        "myCapacity":capacity_needed

},
success: function(data){                    
            $("#shelves-div").html(data); 
           
        }
    });
});
  </script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
     <link href="assets/css/lib/bootstrap.min.css" rel="stylesheet">
    <title></title>

<style type="text/css">
    .row{
        width: 70%;
        margin-left: 20%;
        margin-top: 2%;

    }
    .form-select{
        height: 35px;
    }
    #item-dimension-div{
       
    }
    #storage-div{
        margin-left: 24%;
        width: 66%;
    }
    #allowance-div{
        margin-left: 18%;
        width: 72%;
    }
      #stackable-div{
        margin-left: 23.4%;
        width: 66.4%;
    }
    #shelves-div{
        margin-left: 23.4%;
        width: 66.4%; 
    }
     #no-div{
        margin-left: 22.4%;
        width: 67.4%; 
    }
    .form-control{
        border-style: solid 1px;
        border-color: black;
    }
</style>
</head>
<body>
                      <div class="row g-3" id="no-div">           
                            <labeL>No of Items</labeL>
                                <div class="col-sm">
                                     <input type="text" class="form-control" id="no">
                                </div>
                        </div>



                   <div class="row g-3" id="item-dimension-div">
                            <label>Item Dimension</label>
                        <div class="col-sm">
                            <div class="input-group" id="dimension">
                            <input type="text" class="form-control" id="length" placeholder="length in cm" name="length_post">
                            <input type="text" class="form-control"  id="width" placeholder="width in cm" name="width_post">
                            <input type="text" class="form-control"  id="height" placeholder="height in cm" name="height_post">
                            
                            </div>
                        </div>
                    </div>


                    <div class="row g-3" id="storage-div">
                        <label>Location</label>
                              <div class="col-sm">
                        <div class="input-group">
                           <select id="inputGroup" class="form-select" name="brand_post" style="width:100%">
                                <option selected>Choose...</option>
                              <?php  include 'connection.php';

        $select= "SELECT * from storage";

         $result= $link->query($select);

        if ($result->num_rows >0){
             while ($row= $result->fetch_assoc()) {
                echo "<option value=" .$row['storage_no'].">Storage No " .$row['storage_no']."</option>";

                                    }
                                }  
            ?>


                            </select>
                        </div>
                    </div>
                </div>
                    

                         <div class="row g-3" id="allowance-div">           
                            <labeL>Allowance in Height</labeL>
                                <div class="col-sm">
                                     <input type="text" class="form-control" id="allowanceH">
                                </div>
                        </div>


                        <div class="row g-3" id="allowance-div">           
                            <labeL>Allowance in Length</labeL>
                                <div class="col-sm">
                                     <input type="text" class="form-control" id="allowanceL">
                                </div>
                        </div>


                        <div class="row g-3" id="stackable-div">           
                            <labeL>Stackable</labeL>
                                <div class="col-sm">
                                     <input type="text" class="form-control" id="stackable">
                                </div>
                        </div>

                  


                <div id="shelves-div">           
                           
                </div>

                 <button id="showData" style="border-style: none; height: 40px; width: 210px; margin-left: 73%; margin-top:2%">Search Possible Shelves</button>

</body>
</html>