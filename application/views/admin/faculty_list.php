<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css" rel="stylesheet" type="text/css"> -->
<link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css">
<link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css
" rel="stylesheet" type="text/css">

<!----------------------------------------------------------------------------------------->

<!-- main content start-->
    <div id="page-wrapper">
      <div class="main-page">
        <div class="tables">
          <a href="<?php echo site_url()?>admin/faculty/add" class="btn btn-info pull-right">Add Faculty</a>
        <h2 class="title1">Faculty </h2>

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
        
        <div class="table-responsive bs-example widget-shadow" id="book_data">
             <h4></h4>
           
            
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
  orderable: false

  }]
});
  $('.dataTables_length').addClass('bs-select');
});
    </script>

    <script type="text/javascript">
      
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
            url: "<?php echo base_url()?>faculty/get_yearbook_faculty",
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
        alert(" Can't do because: " + error);
    }           
        });
    });

   
});

    </script>
    
    