<?php

  $nav_selected = "MOVIES"; 
  $left_buttons = "YES"; 
  $left_selected = "people"; 

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
                        <th>movie id</th>
                        <th>people id</th>
                        <th>role</th>
                        <th>screen name</th>
                        <th>first name</th>
                        <th>middle name</th>
                        <th>last name</th>
                        <th>gender</th>
                        <th>image name</th>
                        
                      
                </tr>
              </thead>

              <tbody>

              <?php

$sql = "SELECT * from people natural join movie_people where  movie_id = $movie_id;";



$result = $db->query($sql);

                if ($result->num_rows > 0) {
                    // output data of each row
                    // Add four more rows of data which you are getting from the database
                    while($row = $result->fetch_assoc()) {
                        echo '<tr>
                                <td>'.$row["movie_id"].'</td>
                                <td>'.$row["people_id"].' </span> </td>
                                <td>'.$row["role"].'</td>
                                <td>'.$row["screen_name"].'</td>
                                <td>'.$row["first_name"].'</td>
                                <td>'.$row["middle_name"].'</td>
                                <td>'.$row["last_name"].'</td>
                                <td>'.$row["gender"].'</td>
                                <td>'.$row["image_name"].'</td>
                                
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
