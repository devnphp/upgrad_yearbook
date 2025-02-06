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
          <a href="<?php echo site_url()?>admin/yearbook/add" class="btn btn-info pull-right">Add Yearbook</a>
        <h2 class="title1">Yearbooks </h2>
        
        <div class="table-responsive bs-example widget-shadow">
             <h4></h4>
                     <table id="example" class="table table-striped table-bordered" style="width:100%">
            
              
            <?php if($this->session->flashdata('success'))
                {?> 
                  <div class="alert alert-success">
                      <strong><?php echo $this->session->flashdata('success');?></strong> 
                  </div> 
                <?php } ?> 
              <thead> 
                <tr> 
                  <th style="width:20px;">S.No</th>
                  <th>Yearbook Name</th>
                   <th>Yearbook Image</th>
                  <th>University Text</th>
                   <th>University Logo</th>
                  <!--  <th>Ceo Name</th>
                    <th>Ceo designation</th>
                     <th>Ceo Quote</th>
                      <th>Ceo Image</th> -->
                   <th>Action</th>
                </tr> 
              </thead> 
              <tbody> 
                 <?php  $i=1;
                // echo "<pre>"; print_r($product);exit;
                foreach($books as $book){?>
                 
                <tr> 
                  <td><?php echo $i ?></td>
                            <td><?php echo $book['yearbook_name'];?></td>
                             <td>
                             
                               <img src='<?php  echo base_url();?>uploads/yearbook/<?php echo $book['yearbook_image']; ?>' onerror="this.onerror=null; this.src='<?php echo base_url()?>defualt/defualt.jpg'" width="50" height="50">
                            </td>
                            <td><?php echo $book['university_text']?></td>
                           
                            <td>
                             
                               <img src='<?php  echo base_url();?>uploads/yearbook/<?php echo $book['university_logo']; ?>' onerror="this.onerror=null; this.src='<?php echo base_url()?>defualt/defualt.jpg'" width="50" height="50">
                            </td>
                            
                           <!--  <td><?php echo $book['ceo_name']?></td>
                            <td><?php echo $book['ceo_designation']?></td>
                            <td><?php echo $book['ceo_quote']?></td>
                          <td>
                             
                               <img src='<?php  echo base_url();?>uploads/yearbook/<?php echo $book['ceo_image']; ?>' onerror="this.onerror=null; this.src='<?php echo base_url()?>defualt/defualt.jpg'" width="50" height="50">
                            </td> -->
                          
                            <td>
                              <a href="<?php echo site_url()?>admin/yearbook/edit?id=<?php echo $book['id']?>" class="btn btn-info"><i class="fa fa-edit"></i>
                              </a>
                                <a href="<?php echo site_url()?>yearbook/deletebook?id=<?php echo $book['id']?>" class="btn btn-danger"><i class="fa fa-trash"></i>
                                </a>
                                <?php /* if($prod['status']==1)
                          {  ?>
                        
                          <!-- <input type="hidden" id="status" value="<?php echo $prod['status'];?>" class="status"> -->
                            <label class="switch"><input type="checkbox" value="<?php echo $prod['blogid'],",".$prod['status']?>" checked class="checkss" name="status">
                            <span class="slider round"></span></label>
                    <?php }
                       elseif($prod['service_status']==2)
                          {  ?>
                          
                         
                            <label class="switch">
                              <input type="checkbox" value="<?php echo $prod['blogid'].",".$prod['status']?>" id="dact" name="status" class="checkss" >
                            <span class="slider round"></span>
                          </label>
                          
                  <?php } */?>
                            </td>
                    
                  
                </tr> 
              <?php
                  
                  $i++;
                } ?>
                
                 
              </tbody> 
            </table> 
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
    
    