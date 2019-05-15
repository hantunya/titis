<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-users"></i> Form Pemeriksaan Contoh Uji
        <small>Add, Edit, Delete</small>
      </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12 text-right">
                <div class="form-group">
                    <a class="btn btn-primary" href="<?php echo base_url(); ?>Permohonanlab/addNew"><i class="fa fa-plus"></i> Add New</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Datasheet FPPC</h3>
                    <div class="box-tools">
                       
                    </div>
                </div><!-- /.box-header -->
               <div class="box-body table-responsive no-padding">
                  <table id="book-table" class="table table-hover">
                    <tr>
                        <th>No FPPC</th>
                        <th>Tanggal FPPC</th>
                        <th>No PPK</th>
                        <th>Tanggal PPK</th>
                       
                        <th class="text-center">Actions</th>
                    </tr>
                    <?php
                    if(!empty($fppc))
                    {
                        foreach($fppc as $record)
                        {
                    ?>
                    <tr>
                        <td><?php echo $record->no_fppc ?></td>
                        <td><?php echo $record->tgl_fppc ?></td>
                        <td><?php echo $record->no_ppk ?></td>
                        <td><?php echo $record->tgl_ppk ?></td>
                        
                        <td class="text-center">
                            <a class="btn btn-sm btn-info" href="<?php echo base_url().'Permohonan/editOld/'.$record->no_fppc; ?>" title="Edit"><i class="fa fa-pencil"></i></a>
                            <a class="btn btn-sm btn-danger deleteUser" href="#" data-userid="<?php echo $record->userId; ?>" title="Delete"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                    <?php
                        }
                    }
                    ?>
                  </table>
                  
                </div><!-- /.box-body -->
               
              </div><!-- /.box -->
            </div>
        </div>
    </section>
</div>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/common.js" charset="utf-8"></script>
<script src="<?php echo base_url(); ?>assets/plugins/jquery/jQuery-2.1.4.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url(); ?>assets/assets/bootstrap/js/bootstrap.min.js"></script>
<!-- Select2 -->
<script src="<?php echo base_url(); ?>assets/plugins/select2/dist/js/select2.full.min.js"></script>

<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>         
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()
 </script>   
<script type="text/javascript">
$(document).ready(function() {
    $('#book-table').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
} );
</script>
<script>
 window.onload = function() {
 var chart4 = new CanvasJS.Chart("nilainegara", {
    animationEnabled: true,
    title:{
        text: "Nilai Export Per Negara (YTD)"
    },
    axisY: {
        title: "Rupiah",
        valueFormatString: "#0,,.",
        suffix: "mn",
        prefix: "Rp"
    },
    data: [{
        type: "spline",
        markerSize: 5,
        xValueFormatString: "YYYY",
        yValueFormatString: "Rp#,##0.##",
        xValueType: "dateTime",
        dataPoints: <?php echo json_encode($data_nilai_negara, JSON_NUMERIC_CHECK); ?>
    }]
});
 
chart4.render();



}
</script>


