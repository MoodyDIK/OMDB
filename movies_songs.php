<?php

  $nav_selected = "MOVIES"; 
  $left_buttons = "YES"; 
  $left_selected = "DATA"; 

  include("./nav.php");
  global $db;

  ?>


<div class="right-content">
    <div class="container">

      <h3 style = "color: #01B0F1;">Movies -> Movies List with Songs</h3>

        <h3><img src="images/movies.png" style="max-height: 35px;" />Movies List with Songs</h3>

        <table id="info" cellpadding="0" cellspacing="0" border="0"
            class="datatable table table-striped table-bordered datatable-style table-hover"
            width="100%" style="width: 100px;">
              <thead>
                <tr id="table-first-row">
                        <th>song id</th>
                        <th>title</th>
                        <th>lyrics</th>
                        
                        <!-- TODO: Instead of these four columns, we now have to show the following columns in Iteration 6
                        id, 
                        native_name, 
                        english_name, 
                        year, 
                        title (song)
                        country, 
                        genre, 
                        plot (show the first 30 characters) -->

                </tr>
              </thead>

              <tbody>

              <?php

$sql = "SELECT * from songs where song_id = song_id;";

// TODO: The above SQL statement becomes a  JOIN between movies and movie_data
// If there is no corresponding movie_data, then show those as blanks
//NOTE: Whenever you see ., that means + in PHP

$result = $db->query($sql);

                if ($result->num_rows > 0) {
                    // output data of each row
                    // Add four more rows of data which you are getting from the database
                    while($row = $result->fetch_assoc()) {
                        echo '<tr>
                                <td>'.$row["song_id"].'</td>
                                <td>'.$row["title"].' </span> </td>
                                <td>'.$row["lyrics"].'</td>
                                
                            </tr>';
                    }//end while
                }//end if
                else {
                    echo "0 results";
                }//end else

                 $result->close();
                ?>

              </tbody>
        </table>


        <script type="text/javascript" language="javascript">
    $(document).ready( function () {
        
        $('#info').DataTable( {
            dom: 'lfrtBip',
            buttons: [
                'copy', 'excel', 'csv', 'pdf'
            ] }
        );

        $('#info thead tr').clone(true).appendTo( '#info thead' );
        $('#info thead tr:eq(1) th').each( function (i) {
            var title = $(this).text();
            $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
    
            $( 'input', this ).on( 'keyup change', function () {
                if ( table.column(i).search() !== this.value ) {
                    table
                        .column(i)
                        .search( this.value )
                        .draw();
                }
            } );
        } );
    
        var table = $('#info').DataTable( {
            orderCellsTop: true,
            fixedHeader: true,
            retrieve: true
        } );
        
    } );

</script>

        

 <style>
   tfoot {
     display: table-header-group;
   }
 </style>

  <?php include("./footer.php"); ?>
