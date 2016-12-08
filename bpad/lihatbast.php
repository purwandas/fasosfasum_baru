<!-- PAGE RELATED PLUGIN(S) -->
<script src="JS/plugin/datatables/jquery.dataTables.min.js"></script>
<script src="JS/plugin/datatables/dataTables.colVis.min.js"></script>
<script src="JS/plugin/datatables/dataTables.tableTools.min.js"></script>
<script src="JS/plugin/datatables/dataTables.bootstrap.min.js"></script>
<script src="JS/plugin/datatable-responsive/datatables.responsive.min.js"></script>

<script type="text/javascript">

// DO NOT REMOVE : GLOBAL FUNCTIONS!

$(document).ready(function() {
  
  $(".showAlert").click(function(){
    alert("Butuh Checklist dari Walikota");
  });

  /* // DOM Position key index //

  l - Length changing (dropdown)
  f - Filtering input (search)
  t - The Table! (datatable)
  i - Information (records)
  p - Pagination (paging)
  r - pRocessing 
  < and > - div elements
  <"#id" and > - div with an id
  <"class" and > - div with a class
  <"#id.class" and > - div with an id and class
  
  Also see: http://legacy.datatables.net/usage/features
  */  

  /* BASIC ;*/
    var responsiveHelper_dt_basic = undefined;
    var responsiveHelper_datatable_fixed_column = undefined;
    var responsiveHelper_datatable_col_reorder = undefined;
    var responsiveHelper_datatable_tabletools = undefined;
    
    var breakpointDefinition = {
      tablet : 1024,
      phone : 480
    };

    $('#dt_basic').dataTable({
      "sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6'f><'col-sm-6 col-xs-12 hidden-xs'l>r>"+
        "t"+
        "<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-xs-12 col-sm-6'p>>",
      "autoWidth" : true,
      "preDrawCallback" : function() {
        // Initialize the responsive datatables helper once.
        if (!responsiveHelper_dt_basic) {
          responsiveHelper_dt_basic = new ResponsiveDatatablesHelper($('#dt_basic'), breakpointDefinition);
        }
      },
      "rowCallback" : function(nRow) {
        responsiveHelper_dt_basic.createExpandIcon(nRow);
      },
      "drawCallback" : function(oSettings) {
        responsiveHelper_dt_basic.respond();
      }
    });

  /* END BASIC */
  
  /* COLUMN FILTER  */
    var otable = $('#datatable_fixed_column').DataTable({
      //"bFilter": false,
      //"bInfo": false,
      //"bLengthChange": false
      //"bAutoWidth": false,
      //"bPaginate": false,
      //"bStateSave": true // saves sort state using localStorage
    "sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6 hidden-xs'f><'col-sm-6 col-xs-12 hidden-xs'<'toolbar'>>r>"+
        "t"+
        "<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-xs-12 col-sm-6'p>>",
    "autoWidth" : true,
    "preDrawCallback" : function() {
      // Initialize the responsive datatables helper once.
      if (!responsiveHelper_datatable_fixed_column) {
        responsiveHelper_datatable_fixed_column = new ResponsiveDatatablesHelper($('#datatable_fixed_column'), breakpointDefinition);
      }
    },
    "rowCallback" : function(nRow) {
      responsiveHelper_datatable_fixed_column.createExpandIcon(nRow);
    },
    "drawCallback" : function(oSettings) {
      responsiveHelper_datatable_fixed_column.respond();
    }   
  
    });
    
    // custom toolbar
    $("div.toolbar").html('<div class="text-right"><img src="img/logo.png" alt="SmartAdmin" style="width: 111px; margin-top: 3px; margin-right: 10px;"></div>');
         
    // Apply the filter
    $("#datatable_fixed_column thead th input[type=text]").on( 'keyup change', function () {
      
        otable
            .column( $(this).parent().index()+':visible' )
            .search( this.value )
            .draw();
            
    } );
    /* END COLUMN FILTER */   

  /* COLUMN SHOW - HIDE */
  $('#datatable_col_reorder').dataTable({
    "sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6'f><'col-sm-6 col-xs-6 hidden-xs'C>r>"+
        "t"+
        "<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-sm-6 col-xs-12'p>>",
    "autoWidth" : true,
    "preDrawCallback" : function() {
      // Initialize the responsive datatables helper once.
      if (!responsiveHelper_datatable_col_reorder) {
        responsiveHelper_datatable_col_reorder = new ResponsiveDatatablesHelper($('#datatable_col_reorder'), breakpointDefinition);
      }
    },
    "rowCallback" : function(nRow) {
      responsiveHelper_datatable_col_reorder.createExpandIcon(nRow);
    },
    "drawCallback" : function(oSettings) {
      responsiveHelper_datatable_col_reorder.respond();
    }     
  });
  
  /* END COLUMN SHOW - HIDE */

  /* TABLETOOLS */
  $('#datatable_tabletools').dataTable({
    
    // Tabletools options: 
    //   https://datatables.net/extensions/tabletools/button_options
    "sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6'f><'col-sm-6 col-xs-6 hidden-xs'T>r>"+
        "t"+
        "<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-sm-6 col-xs-12'p>>",
        "oTableTools": {
           "aButtons": [
             "copy",
             "csv",
             "xls",
                {
                    "sExtends": "pdf",
                    "sTitle": "SmartAdmin_PDF",
                    "sPdfMessage": "SmartAdmin PDF Export",
                    "sPdfSize": "letter"
                },
              {
                  "sExtends": "print",
                  "sMessage": "Generated by SmartAdmin <i>(press Esc to close)</i>"
              }
             ],
            "sSwfPath": "js/plugin/datatables/swf/copy_csv_xls_pdf.swf"
        },
    "autoWidth" : true,
    "preDrawCallback" : function() {
      // Initialize the responsive datatables helper once.
      if (!responsiveHelper_datatable_tabletools) {
        responsiveHelper_datatable_tabletools = new ResponsiveDatatablesHelper($('#datatable_tabletools'), breakpointDefinition);
      }
    },
    "rowCallback" : function(nRow) {
      responsiveHelper_datatable_tabletools.createExpandIcon(nRow);
    },
    "drawCallback" : function(oSettings) {
      responsiveHelper_datatable_tabletools.respond();
    }
  });
  
  /* END TABLETOOLS */

});



</script>

<article class="col-sm-12 col-md-12 col-lg-12">

  <!-- Widget ID (each widget will need unique ID)-->
  <div class="jarviswidget jarviswidget-color-darken" id="wid-id-33" data-widget-editbutton="false" data-widget-colorbutton="false" data-widget-deletebutton="false">
  <header>
    <span class="widget-icon"> <i class="fa fa-file-text-o"></i></span>
    <h2>Data BAST</h2>
  </header>

    <!-- widget div-->
    <div class="smart-form">
      <div class="widget-body no-padding">
        <fieldset>
          <div class="row">
            <section class="col col-sm-12 col-md-12 col-lg-12">
              <table id="dt_basic" class="table table-striped table-bordered table-hover" width="100%">
                      <thead>                     
                        <tr>
                          <th>No.</th>
                          <th >No. BAST</th>
                          <th >Tanggal BAST</th>
                          <th >Perihal BAST</th>
                          <th>Pengembang BAST</th>
                          <th >Keterangan</th>
                          <th >Checklist Walikota</th>
                          <th >Checklist BPAD</th>
                          <th>No. DOkumen Acuan</th>
                          <th>Act.</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          $query="select * from bast order by idbast desc";
                          $query=mysql_query($query);
                          $no=0;
                          while ($data=mysql_fetch_array($query)) 
                          {
                            $no++;
                              
                              
                                $button="";
                                if($data['checklistwalikota']=='1')
                                {
                                  if($data['checklistarsip']=='1')
                                  {
                                  	$button.= "
	                                    <a href='index.php?hal=chck&nobast=$data[nobast]&noacuan=$data[nodokacuan]&pbast=$data[pengembangbast]' class='btn btn-sm btn-success' style='width:70px'>
	                                    Checklist
	                                    </a>
	                                ";
                                  }else{
                                  	$button.= "
	                                    <a href='index.php?hal=checklist&nobast=$data[nobast]&noacuan=$data[nodokacuan]&pbast=$data[pengembangbast]' class='btn btn-sm btn-info' style='width:70px'>
	                                    Checklist
	                                    </a>
	                                ";
                                  }
                                  $chck="<p style='color:green'>Sudah</p>";
                                }else{
                                  $button.="
                                    <a href='#' class='btn btn-sm btn-danger showAlert' style='width:70px'>
                                    Checklist
                                    </a>
                                  ";
                                  $chck="<p style='color:red'>Belum</p>";
                                }

                                //pop-up aja input nomor/kode tanggal lokasi
                                
                                
                                if ($data['checklistarsip']=='1') 
                                {
                                  if($data['kodearsip']!='')
                                  {
                                    $warna="success";
                                  }else{
                                    $warna="info";
                                  }
                                  $button.="
                                  <a href='index.php?hal=register&nobast=$data[nobast]' class='btn btn-sm btn-$warna' style='width:70px'>
                                      Register
                                      </a>
                                  ";
                                }

                                if($data['checklistarsip']=='1')
                                {
                                  $chck2="<p style='color:green'>Sudah</p>";
                                }else{
                                  $chck2="<p style='color:red'>Belum</p>";
                                }
                              
                            echo "
                              <tr>
                                <td>$no</td>
                                <td>$data[nobast]</td>
                                <td>$data[tglbast]</td>
                                <td>$data[perihalbast]</td>
                                <td>$data[pengembangbast]</td>
                                <td>$data[keterangan]</td>
                                <td>$chck</td>
                                <td>$chck2</td>
                                <td>
                                	<a href='index.php?hal=bastbysippt&id=$data[nodokacuan]'>$data[nodokacuan]</a>
                                </td>
                                <td>
                                  $button
                                </td>
                              </tr>
                            ";
                          }
                        ?>
                        
                      </tbody>
                    </table>
            </section>
            
          </div>
        </fieldset>
      </div>
    </div>
    <!-- end widget div -->

  </div>
  <!-- end widget -->

</article>
<!-- WIDGET END -->