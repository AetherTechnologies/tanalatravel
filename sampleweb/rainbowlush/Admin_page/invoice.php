<?php include('header.php'); ?>

   <?php 
   if(!isset($_SESSION['username'])){
        header('location:../');
   }

   ?>

   <?php 
   if(isset($_POST['btntransact'])){
    include('bridge.php');
    $x1 = $_POST['p_id'];
    $query1 = "UPDATE pending_order SET remarks = '1' where id = '$x1' ";
    $result1 = mysql_query($query1);

    $message="Approved Successfully";
echo "<script type='text/javascript'>alert('$message');</script>";
echo "<meta http-equiv='refresh' content='0'>";
   }


   ?>

   <title>Home | Admin</title>

        <div class="product-status mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="product-status-wrap">
                            <h4>Generate Invoice</h4>
                            
                            <div class="asset-inner">
                                <table>
                                    <tr>
                                    
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Date</th>
                                      
                                        <th>Total</th>
                                        <th>Action</th>
                                        
                                       
                                    </tr>

                                    <?php 
include('bridge.php');
$query2 = "SELECT * from pending_order where remarks = '1' ";
$result2 = mysql_query($query2);
$n2 = mysql_numrows($result2);
mysql_close();

$i2=0;
while($i2<$n2)
{

$p1 = mysql_result($result2,$i2,"fname");
$p2 = mysql_result($result2,$i2,"lname");
$p3 = mysql_result($result2,$i2,"product_name");
$p4 = mysql_result($result2,$i2,"date");

$p5 = mysql_result($result2,$i2,"total");

?>

<?php 
if(isset($_POST['btndelete'])){
include('bridge.php');
$d1 = $_POST['code'];
$query="Delete from product where product_code = '$d1' "; 
$result=mysql_query($query);


echo "<script>alert('Deleted Successfully')</script>";
          echo '<script type="text/javascript">' . "\n";
echo 'window.location="../admin_page/";';
echo '</script>';

}
?>

<style>
.sname {
    display:none;
}
</style>


    
                                    <tr>
                                      
                                        <td><?php echo $p1; ?></td>
                                         <td><?php echo $p2; ?></td>
                                          <td><?php echo $p4; ?></td>
                                           <td><?php echo $p5; ?></td>
                                            
                                        
                                       
                                     
                                        <td>
                                            <form method="GET" action="invoice/index.php"> 
                                                <input type="hidden" name="pname" value="<?php echo $p3; ?>">
                                                <input type="hidden" name="ptotal" value="<?php echo $p5; ?>">
                                            <button type="submit" class="btn btn-success">Generate</button>
                                        </form>
                                    </td>

                               

                                    </tr>
    
    <?php 
    $i2++; 
}
    
    ?>

                                    

                                    
                                    
                                </table>
                            </div>
                            <div class="custom-pagination">
                                <ul class="pagination">
                                    <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item"><a class="page-link" href="#">Next</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jquery
        ============================================ -->
    <script src="js/vendor/jquery-1.12.4.min.js"></script>
    <!-- bootstrap JS
        ============================================ -->
    <script src="js/bootstrap.min.js"></script>
    <!-- wow JS
        ============================================ -->
    <script src="js/wow.min.js"></script>
    <!-- price-slider JS
        ============================================ -->
    <script src="js/jquery-price-slider.js"></script>
    <!-- meanmenu JS
        ============================================ -->
    <script src="js/jquery.meanmenu.js"></script>
    <!-- owl.carousel JS
        ============================================ -->
    <script src="js/owl.carousel.min.js"></script>
    <!-- sticky JS
        ============================================ -->
    <script src="js/jquery.sticky.js"></script>
    <!-- scrollUp JS
        ============================================ -->
    <script src="js/jquery.scrollUp.min.js"></script>
    <!-- mCustomScrollbar JS
        ============================================ -->
    <script src="js/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="js/scrollbar/mCustomScrollbar-active.js"></script>
    <!-- metisMenu JS
        ============================================ -->
    <script src="js/metisMenu/metisMenu.min.js"></script>
    <script src="js/metisMenu/metisMenu-active.js"></script>
    <!-- morrisjs JS
        ============================================ -->
    <script src="js/sparkline/jquery.sparkline.min.js"></script>
    <script src="js/sparkline/jquery.charts-sparkline.js"></script>
    <!-- calendar JS
        ============================================ -->
    <script src="js/calendar/moment.min.js"></script>
    <script src="js/calendar/fullcalendar.min.js"></script>
    <script src="js/calendar/fullcalendar-active.js"></script>
    <!-- plugins JS
        ============================================ -->
    <script src="js/plugins.js"></script>
    <!-- main JS
        ============================================ -->
    <script src="js/main.js"></script>
    <!-- tawk chat JS
        ============================================ -->
    
</body>

</html>