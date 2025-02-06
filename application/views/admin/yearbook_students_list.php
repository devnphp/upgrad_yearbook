<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function(){ 
$('.checkss').change(function () {
var contry = ($(this).val());
jQuery.ajax({ 
              url: "<?php echo site_url()?>/Services/item_status?id="+contry,
              type: "GET",
              data: "id = "+ contry,
              dataType: "html",
              success: function(response)
              {
              if (response != 0) {  
                  //alert("Category status changed!!!!");  
                  //location.reload();  
              }  
          },  
                error: function (response)
                 {  
                    if (response != 1)
                     {  
                        alert("Error!!!!");  
                     }  
                  }               
        });
    });
});
</script>
<!--------------------boot strapdata table------------------------------------------------->
<style>
.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

.switch input { 
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
</style>
<!--------------------boot strapdata table------------------------------------------------->
<!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css" rel="stylesheet" type="text/css"> -->
<link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css">
<link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css
" rel="stylesheet" type="text/css">

<!----------------------------------------------------------------------------------------->

<!-- main content start-->
    <div id="page-wrapper">
      <div class="main-page">
        <div class="tables">
          <a href="<?php echo site_url()?>admin/studentsdata/add" class="btn btn-info pull-right">Add Student</a>
        <h2 class="title1">Yearbook Students </h2>

        <div class="form-group"> 
                  <label for="exampleInputEmail1">Select Yearbook</label> 
                   <div id="book_id_err" class="error"></div>
                  <select class="form-control" id="book_id" name="book_id"required="">
                  <option value="">Select Yearbook</option> 
                    <?php foreach($books as $book) { ?>
                                         <option value="<?php echo $book['id'];?>"><?php echo $book['yearbook_name'];?></option>
                                         <?php } ?>
                  </select>
                  
                </div> 
        
        <div class="table-responsive bs-example widget-shadow"  id="book_data">
             <h4></h4>
                    <!--  <table id="example" class="table table-striped table-bordered" style="width:100%">
            
              
            <?php if($this->session->flashdata('success'))
                {?> 
                  <div class="alert alert-success">
                      <strong><?php echo $this->session->flashdata('success');?></strong> 
                  </div> 
                <?php } ?> 
              <thead> 
                <tr> 
                  <th></th>
                  <th style="width:20px;">S.No</th>
                 
                   <th>Student Name</th>
                    <th>Student designation</th>
                     <th>Student Quote</th>
                     <th>Yearbook</th>
                      <th>Student Image</th>
                   <th>Action</th>
                </tr> 
              </thead> 
              <tbody id="book_data"> 
                 <?php  $i=1;
                // echo "<pre>"; print_r($product);exit;
                foreach($students as $student){ 
                    if($student['yearbook'] !=0)
                    {
                      $yb = yearbook_name($student['yearbook']);
                    } else {
                      $yb = 'Unassigned';
                    }
                  ?>
                 
                <tr> 
                   <td><input type="checkbox"></td>
                  <td><?php echo $i ?></td>
                           
                            <td><?php echo $student['name']?></td>
                            <td><?php echo $student['designation']?></td>
                            <td><?php echo $student['quote']?></td>
                            <td><?php echo $yb;?></td>
                          <td>
                             
                               <img src='<?php echo $student['image']; ?>' onerror="this.onerror=null; this.src='<?php echo base_url()?>defualt/defualt.jpg'" width="50" height="50">
                            </td>
                            <td>
                              <a href="<?php echo site_url()?>admin/studentsdata/edit?id=<?php echo $student['id']?>" class="btn btn-info"><i class="fa fa-edit"></i>
                              </a>
                                <a href="<?php echo site_url()?>studentsdata/delete?id=<?php echo $student['id']?>" class="btn btn-danger"><i class="fa fa-trash"></i>
                                </a>

                            </td>
                    
                  
                </tr> 
              <?php
                  
                  $i++;
                } ?>
                
                 
              </tbody> 
            </table>  -->
          </div>
        </div>
      </div>
    </div>
    
    <!-- Bootstrap Core JavaScript -->
   <script src="<?php echo base_url()?>js/bootstrap.js"> </script>
   <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
   <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
   <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
  <!-- //Bootstrap Core JavaScript -->
  <script>
   
    </script>

    <script>
      $(document).ready(function () {
$('#example').DataTable({
  "aaSorting": [],
  columnDefs: [{
  orderable: false,
  targets: [4, 6]

  }]
});
  $('.dataTables_length').addClass('bs-select');
});
    </script>

    <script>
$(document).ready(function(){ 
    $("#book_id").change(function () {
        var book_id = $("#book_id").val();//alert(book_id)

         if(book_id == ''){
            $('html, body').animate({
                scrollTop: $('#book_id').offset().top-100
            }, 2000);
             $('#book_id_err').html('');
            $('#book_id_err').html('Please Select Yearbook');
             setTimeout(function() {
                $('#book_id_err').html('');
                if(path != ''){
                    window.location.href=path;
                }
            }, 3000);
            e.preventDefault();
        }
       
            $.ajax({
            url: "<?php echo base_url()?>studentsdata/get_yearbook_students",
            type: "POST",
            data: {id: book_id},
            dataType: 'html',
            success: function(data) //alert(data)
            { 
             //alert(data)
             $('#book_data').html(data);
             $('#example').DataTable({
  "aaSorting": [],
  columnDefs: [{
  orderable: false

  }]
});
            } ,
                              error: function (request, error) {
        console.log(arguments);
        alert(" Can't do because: " + error);
    }           
        });
    });

   
});

$(document).on('change', '.checkbox', function() {
    if(this.checked) {
      alert(this.value)
    }
});
</script>
    
    