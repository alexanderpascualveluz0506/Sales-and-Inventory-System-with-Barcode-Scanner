<?php

include 'codes/functions/addExpense_function.php';
saveNewExpenses();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <title>Erlinda's Grocery</title>
    
    
    <!-- Styles -->
 <link href="assets/css/lib/font-awesome.min.css" rel="stylesheet">
    <link href="assets/css/lib/themify-icons.css" rel="stylesheet">
    <link href="assets/css/lib/owl.carousel.min.css" rel="stylesheet" />
    <link href="assets/css/lib/owl.theme.default.min.css" rel="stylesheet" />
    <link href="assets/css/lib/menubar/sidebar.css" rel="stylesheet">
    <link href="assets/css/lib/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/lib/helper.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
       <link href="codes/design/addExpense_style.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
     <link rel="shortcut icon" href="assets/images/remove8.png" type="image/x-icon" />
</head>

  <script src="codes/javascript/clock.js"></script>
<body style="background-color:#f8f9fe" onload=display_ct();>

    <div class="sidebar sidebar-hide-to-small sidebar-shrink sidebar-gestures"  >
        <div class="nano">
            <div class="nano-content">
                <ul>
                    <div class="logo"><a href="dashboard.php">
                    <span>Erlinda's Grocery</span></a></div>
                             <li class="label" style="margin-top: 5%;">Main</li>
                   <li><a href="dashboard.php" ><i class="fas fa-home" ></i> Dashboard </a>
                            
                    </li>

                     <li class="label">Item Management</li>
                       <li><a href="item.php"><i class="fa fa-barcode"></i>&nbsp;&nbsp;Item</a></li>
                        <li><a href="category.php"><i class="fas fa-boxes"></i>&nbsp;&nbsp;Category</a></li>       
                    </li>


                     <li class="label">Inventory Management</li>
                    <li><a href="inventory.php"><i class="fa fa-archive"></i>&nbsp;&nbsp;Inventory</a></li>
                    <li><a href="warehouseCapacity.php"><i class="fas fa-pallet"></i>&nbsp;&nbsp;Warehouse Capacity</a></li> 

                

                     <li class="label">Supplier Management</li>
                    <li><a href="supplier.php"><i class="fas fa-users"></i>&nbsp;&nbsp;Supplier<span></a></li>
                    <li><a href="purchaseOrder.php"><i class="fa fa-truck"></i>&nbsp;&nbsp;Purchase Orders</a></li>
                    <li><a href="return.php"><i class="fas fa-arrow-left"></i>&nbsp;&nbsp;Return Orders</a></li>   


                    <li class="label">Sales Management</li>
                    <li><a href="sales.php"><i class="fas fa-chart-line"></i>Sales</a></li>
                    <li><a href="salesReturn.php"><i class="bi bi-cart-x-fill"></i>Sales Return</a></li>
                    <li><a href="pos.php"><i class="fas fa-cash-register"></i>&nbsp;&nbsp;POS</a></li>


                    <li class="label">Financial Analytics</li>
                    <li><a href="expense.php"  style="background-color:#6880fc;color:white;"><i class="fas fa-coins" ></i>&nbsp;&nbsp;Expenses</a></li>            
                    <li><a href="report.php"><i class="fas fa-print"></i>&nbsp;&nbsp;Reports</a></li>
                    


                    <li class="label">Accounts</li>
                    <li><a href="account.php"><i class="fas fa-id-card" ></i>&nbsp;&nbsp;Accounts</a></li>
                    <li><a href="index1.php"><i class="fas fa-sign-out-alt"></i>&nbsp;&nbsp;Logouts</a></li>            
            </div>
        </div>
    </div>
    <!-- /# sidebar -->

<div class="header" style=" position: sticky;top: 0px; background-color:#5c6681;border-style: none">
    <div class="container-fluid" >
        <div class="row" >
            <div class="col-lg-12" >
                <!-- Menu for collapsible-->
                <div class="float-left">
                    <div style="height:4px"></div>
                    <div class="hamburger sidebar-toggle">
                         <i class="bi bi-list" style="color:#ffffff; font-size:35px"></i>
                    </div>
                </div>


                  <div class="float-right">
                    <div style="height:16px"></div>
                        <div style="">

                          <span id='ct' style="padding-right: 20px;margin-top: 8px;color:white;"></span>
                            </div>
                           </div>


                </div>

      

              </div>
                </div>
            </div>
        </div>
    </div>


    <div class="content-wrap">
        <div class="main">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8 p-r-0 title-margin-right">
                    <span class="title-page"> <br>Dashboard / Expenses List / Add New Expenses</span>
                    </div>      
                </div>
<form action=""  method="post" enctype="multipart/form-data">
<section id="main-content">

    <div class="row">
        <div class="col-lg-12">
            <div class="card" id="cardForStorage">
                  <div class="l-lcog-4 p-l-0 title-margin-left">
                

                       <div class="container-title1"><h5><i class="fas fa-pen">&nbsp;&nbsp;</i>New Expense
                       <span class="sub-title">( Fields in Red are Required)</span></h5>
                        
                       </div>


                       <br>

                       <div class="row g-3" id="row1">
                            <label style="color:red">Date</label>
                                 <div class="col-sm">
                                        <input type="date" id="date" name="date_post" class="form-control">
                                </div>
                        </div>

                        <div class="row g-3" id="row2">
                            <label style="color:red">Expense Type</labeL>
                            <div class="col-sm">
                                 <div class="input-group-append">
                            

                            <input list="expense_type" class="form-control" name="expense_type_post">

                                <datalist id="expense_type">
                                  <option value="Employee Salary">
                                  <option value="Tax">
                                  <option value="Electricity">
                                  <option value="Rent">
                                  <option value="Water Bill">
                                </datalist>
                             
                          </select>
                      </div>
                            </div>
                        </div>

                          <div class="row g-3" id="row4">
                            <label style="color:red">Amount</label>
                            <div class="col-sm">
                                 <input type="text" class="form-control" id="amount_input" name="amount_post">
                            </div>
                        </div>

                        <div class="row g-3" id="row5">
                            <label>Tax</label>
                            <div class="col-sm">
                                 <input type="text" class="form-control" id="item-name-input" name="tax_post">
                            </div>
                        </div>
                             <br>
                            
</div> <!--/# l-lcog-4 p-l-0 title-margin-left -->
</div><!-- /# card -->
</div> <!-- /# column -->
</div> <!-- /# row -->



</section>     


            </div><!-- container-fluid end -->
        </div><!-- main content end -->
    </div><!-- content wrap end --> 

 <div class="content-wrap">
        <div class="main">
            <div class="container-fluid">


   <div class="row" style="width:99.1%;margin-left: 0%;">
        <div class="col-lg-12">
            <div class="card" id="cardForStorage">
                  <div class="l-lcog-4 p-l-0 title-margin-left">
                

                       <div class="container-title1"><h5><i class="fas fa-file-image">&nbsp;&nbsp;</i>Images</h5>
                        
                       </div>

<div id="drop-area">

    <center><p>Drag and Drop Multiple Images Here</p>
    <input type="file" id="fileElem" multiple accept="image/*" onchange="handleFiles(this.files)" name="images[]" 
   >
    <label class="button" for="fileElem"  style="background-color:#0d6efd;color:white;">Select some Images</label>

  <br>
  <progress id="progress-bar" max=100 value=0></progress>
  <div id="gallery" /></div>
</div>


</center>

   
</div> <!--/# l-lcog-4 p-l-0 title-margin-left -->
</div><!-- /# card -->
</div> <!-- /# column -->
</div> <!-- /# row -->





                
            </div><!-- container-fluid end -->
        </div><!-- main content end -->
    </div><!-- content wrap end -->





<!-- For Fil  -->
<div class="content-wrap">
        <div class="main">
            <div class="container-fluid">


    <div class="row" style="width:99.1%;margin-left: 0%;">
        <div class="col-lg-12">
            <div class="card" id="cardForStorage">
                  <div class="l-lcog-4 p-l-0 title-margin-left">
                

<div class="container-title1"><h5><i class="fas fa-folder-open">&nbsp;&nbsp;</i>Files</h5>
    </div>

<div id='file-catcher'>
  <input id='file-input' type='file' name='files_upload[]' accept=".pdf,.doc,.docx,.xls,.xlsx" multiple>
</div>
<br>
<div id='file-list-display'></div>



</div> <!--/# l-lcog-4 p-l-0 title-margin-left -->
</div><!-- /# card -->
</div> <!-- /# column -->
</div> <!-- /# row -->

     <button type="submit" value="ADD ITEM" id="add_expense" name="add_expense_post" style="width:200px;height: 47px; margin-left: 78%; background-color:#054D7C; color:white; border-style: none; margin-top:2%; margin-bottom: 4%;">ADD EXPENSES</button>


            </div><!-- container-fluid end -->
        </div><!-- main content end -->
    </div><!-- content wrap end -->
</section>     
</form>







    <!-- jquery vendor -->
    <script src="assets/js/lib/jquery.min.js"></script>
    <script src="assets/js/lib/jquery.nanoscroller.min.js"></script>
    <!-- nano scroller -->
    <script src="assets/js/lib/menubar/sidebar.js"></script>
    <script src="assets/js/lib/preloader/pace.min.js"></script>
    <!-- sidebar -->

    <script src="assets/js/lib/bootstrap.min.js"></script>
    <script src="assets/js/scripts.js"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css"></link>

    <script src="assets/js/lib/bootstrap.min.js"></script>
    <script src="assets/js/scripts.js"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js' 
    crossorigin='anonymous'></script>
</body>

</html>
<script type="text/javascript">


 (function () {
    var fileCatcher = document.getElementById('file-catcher');
  var fileInput = document.getElementById('file-input');
  var fileListDisplay = document.getElementById('file-list-display');
  
  var fileList = [];
  var renderFileList, sendFile;
  
  fileCatcher.addEventListener('submit', function (evnt) {
    evnt.preventDefault();
    fileList.forEach(function (file) {
        sendFile(file);
    });
  });
  
  fileInput.addEventListener('change', function (evnt) {
        fileList = [];
    for (var i = 0; i < fileInput.files.length; i++) {
        fileList.push(fileInput.files[i]);
    }
    renderFileList();
  });
  
  renderFileList = function () {
    fileListDisplay.innerHTML = '';
    fileList.forEach(function (file, index) {
        var fileDisplayEl = document.createElement('p').css("color","red");;
      fileDisplayEl.innerHTML = (index + 1) + ': ' + file.name;
      fileListDisplay.appendChild(fileDisplayEl);
    });
  };

    sendFile = function (file) {
    var formData = new FormData();
    var request = new XMLHttpRequest();
 
   
  };
})();


</script>

<script type="text/javascript">
    let dropArea = document.getElementById("drop-area")

// Prevent default drag behaviors
;['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
  dropArea.addEventListener(eventName, preventDefaults, false)   
  document.body.addEventListener(eventName, preventDefaults, false)
})

// Highlight drop area when item is dragged over it
;['dragenter', 'dragover'].forEach(eventName => {
  dropArea.addEventListener(eventName, highlight, false)
})

;['dragleave', 'drop'].forEach(eventName => {
  dropArea.addEventListener(eventName, unhighlight, false)
})

// Handle dropped files
dropArea.addEventListener('drop', handleDrop, false)

function preventDefaults (e) {
  e.preventDefault()
  e.stopPropagation()
}

function highlight(e) {
  dropArea.classList.add('highlight')
}

function unhighlight(e) {
  dropArea.classList.remove('active')
}

function handleDrop(e) {
  var dt = e.dataTransfer
  var files = dt.files

  handleFiles(files)
}

let uploadProgress = []
let progressBar = document.getElementById('progress-bar')

function initializeProgress(numFiles) {
  progressBar.value = 0
  uploadProgress = []

  for(let i = numFiles; i > 0; i--) {
    uploadProgress.push(0)
  }
}

function updateProgress(fileNumber, percent) {
  uploadProgress[fileNumber] = percent
  let total = uploadProgress.reduce((tot, curr) => tot + curr, 0) / uploadProgress.length
  console.debug('update', fileNumber, percent, total)
  progressBar.value = total
}

function handleFiles(files) {
  files = [...files]
  initializeProgress(files.length)
  files.forEach(uploadFile)
  files.forEach(previewFile)
}

function previewFile(file) {
  let reader = new FileReader()
  reader.readAsDataURL(file)
  reader.onloadend = function() {
    let img = document.createElement('img')
    img.src = reader.result
    document.getElementById('gallery').appendChild(img)
  }
}

function uploadFile(file, i) {
  var url = 'https://api.cloudinary.com/v1_1/joezimim007/image/upload'
  var xhr = new XMLHttpRequest()
  var formData = new FormData()
  xhr.open('POST', url, true)
  xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest')

  // Update progress (can be used to show progress indicator)
  xhr.upload.addEventListener("progress", function(e) {
    updateProgress(i, (e.loaded * 100.0 / e.total) || 100)
  })

  xhr.addEventListener('readystatechange', function(e) {
    if (xhr.readyState == 4 && xhr.status == 200) {
      updateProgress(i, 100) // <- Add this
    }
    else if (xhr.readyState == 4 && xhr.status != 200) {
      // Error. Inform the user
    }
  })

  formData.append('upload_preset', 'ujpu6gyk')
  formData.append('file', file)
  xhr.send(formData)
}
</script>

<script type="text/javascript">
    $('document').ready(function() {
  $('#button-add-row').click(function() {
      $("#bootstrap-data-table-export").append('<tr><td><input type="text" class="txtbox" value="" /><td>   <button type="button" id="confirm">Confirm</button></td>');
   });
})
</script>