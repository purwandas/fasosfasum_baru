<?php
	require"admin/auth.php";
	if(isset($_POST['ubah']) || isset($_POST['tambah']))
	{
		
		$nama=explode(' ',$_POST['nama'],2);
		$wilayah=$_POST['wilayah'];
		$level=$_POST['level'];
		$username=$_POST['username'];
		$password=$_POST['password'];
		$waktu = gmdate("Y-m-d H:i:s", time()+60*60*7);
		$user = $_SESSION['SESS_FIRST_NAME'].' '.$_SESSION['SESS_LAST_NAME'];
		if(isset($_POST['ubah']))
		{
			if($password!=''){
				$password=", passwd='".md5($password)."'";
			}
			$id=$_POST['id'];
			// echo"
			// 	$nama[0] . $nama[1] . $wilayah . $level . $username . $password
			// ";
			$query = mysql_query("insert into loging values('','$user','Ubah User: $nama[0] $nama[1]','$waktu')") or die(mysql_error());
			mysql_query("update members set firstname='$nama[0]', lastname='$nama[1]', wilayah='$wilayah', level='$level', login='$username' $password where member_id='$id'");
		}
		else
		if(isset($_POST['tambah']))
		{
			$password=md5($password);
			// echo"
			// 	$nama[0] . $wilayah . $level . $username . $password
			// ";
			$query = mysql_query("insert into loging values('','$user','Tambah User: $nama[0] $nama[1]','$waktu')") or die(mysql_error());
			$query2 = mysql_query("INSERT INTO `members` (`member_id`, `firstname`, `lastname`, `wilayah`, `level`, `login`, `passwd`, `status`) VALUES ('', '$nama[0]', '$nama[1]', '$wilayah', '$level', '$username', '$password', '1')");
			if(!$query2){
				echo"
				<p class='alert alert-warning'>
				".mysql_error($koneksi)."
				</p>
				";
			}
		}
	}
?>
<article class="col-sm-12 col-md-12 col-lg-12">
	<!-- Widget ID (each widget will need unique ID)-->
	<div class="jarviswidget jarviswidget-color-darken" id="wid-id-46" data-widget-editbutton="false" data-widget-colorbutton="false" data-widget-deletebutton="false">
	<header>
		<span class="widget-icon"> <i class="fa fa-user"></i></span>
		<h2>Aktifitas User</h2>
	</header>
		<!-- widget div-->
		<div class="smart-form">
			<div class="widget-body no-padding">
				<fieldset>
					<div class="row">
						<section class="col col-sm-12 col-md-12 col-lg-12">
							<table id="datatable_fixed_column" class="table table-striped table-bordered" width="100%">
					
						        <thead>
									<tr>
										<th class="hasinput" style="width:16%">
											<input type="text" class="form-control" placeholder="Filter User" />
										</th>
										<th class="hasinput" style="width:17%">
											<input type="text" class="form-control" placeholder="Filter Aktifitas" />
										</th>
										<th class="hasinput" style="width:16%">
											<input type="text" class="form-control" placeholder="Filter Waktu" />
										</th>
									</tr>
						            <tr>
					                    <th>User</th>
					                    <th>Aktifitas</th>
					                    <th>Waktu</th>
						            </tr>
						        </thead>
	
						        <tbody>
						        <?php
						        	$queryTracking="SELECT * FROM `loging` ORDER BY `index` DESC";
						        	$queryTracking=mysql_query($queryTracking);
						        	echo mysql_error($koneksi);
						        	while ($dataTracking=mysql_fetch_array($queryTracking)) 
						        	{
						        		echo "
						        			<tr>
								                <td>$dataTracking[user]</td>
								                <td>$dataTracking[aktivitas]</td>
								                <td>$dataTracking[waktu]</td>
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


		<!-- IMPORTANT: APP CONFIG -->
		<script src="JS/app.config.js"></script>

		<!-- MAIN APP JS FILE -->
		<script src="JS/app.min.js"></script>

		<!-- SmartChat UI : plugin -->
		<script src="JS/smart-chat-ui/smart.chat.ui.min.js"></script>
		<script src="JS/smart-chat-ui/smart.chat.manager.min.js"></script>

		<!-- PAGE RELATED PLUGIN(S) -->
		<script src="JS/plugin/datatables/jquery.dataTables.min.js"></script>
		<script src="JS/plugin/datatables/dataTables.colVis.min.js"></script>
		<script src="JS/plugin/datatables/dataTables.tableTools.min.js"></script>
		<script src="JS/plugin/datatables/dataTables.bootstrap.min.js"></script>
		<script src="JS/plugin/datatable-responsive/datatables.responsive.min.js"></script>

		<script type="text/javascript">
		
		// DO NOT REMOVE : GLOBAL FUNCTIONS!
		
		$(document).ready(function() {
			
			pageSetUp();
			
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
		            "sSwfPath": "JS/plugin/datatables/swf/copy_csv_xls_pdf.swf"
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
		
		})

		</script>

		<!-- Your GOOGLE ANALYTICS CODE Below -->
		<script type="text/javascript">
			var _gaq = _gaq || [];
			_gaq.push(['_setAccount', 'UA-XXXXXXXX-X']);
			_gaq.push(['_trackPageview']);
			
			(function() {
			var ga = document.createElement('script');
			ga.type = 'text/javascript';
			ga.async = true;
			ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
			var s = document.getElementsByTagName('script')[0];
			s.parentNode.insertBefore(ga, s);
			})();
		</script>

	</body>

</html>