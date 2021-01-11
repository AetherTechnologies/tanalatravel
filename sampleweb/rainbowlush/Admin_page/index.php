<?php include('header.php'); ?>

   <?php 
   if(!isset($_SESSION['username'])){
        header('location:../');
   }

   ?>

   <title>Home | Admin</title>

        <div class="product-status mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="product-status-wrap">
                            <h4>Library List</h4>
                            <div class="add-product">
                                <a href="add-Product-assets.php">Add Products</a>
                            </div>
                            <div class="asset-inner">
                                <table>
                                    <tr>
                                        <th>Product ID</th>
                                        <th>Code</th>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Status</th>
                                        <th>Price</th>
                                        <th>Type</th>
                                        <th>For</th>
                                        <th>Action</th>
                                       
                                    </tr>

                                    <?php 
include('bridge.php');
$query2 = "SELECT * from product ";
$result2 = mysql_query($query2);
$n2 = mysql_numrows($result2);
mysql_close();

$i2=0;
while($i2<$n2)
{
$pid = mysql_result($result2,$i2,"product_id");
$p1 = mysql_result($result2,$i2,"product_code");
$p2 = mysql_result($result2,$i2,"image_path");
$p3 = mysql_result($result2,$i2,"product_name");
$p4 = mysql_result($result2,$i2,"product_status");
$p5 = mysql_result($result2,$i2,"product_price");
$p6 = mysql_result($result2,$i2,"product_type");
$p7 = mysql_result($result2,$i2,"product_for");
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
                                        <td><?php echo $pid; ?></td>
                                        <td><?php echo $p1; ?></td>
                                        <td><img src="<?php echo $p2; ?>" alt="" /></td>
                                        <td><?php echo $p3; ?></td>
                                        <td>
                                            <?php
                                            if($p4=="Active"){
                                            echo '<div class="btn btn-primary" style="font-weight:bold;">'.$p4.'<div>';
                                        } 
                                        else if($p4=="Coming Soon"){
                                            echo '<div class="btn btn-success" style="font-weight:bold;">'.$p4.'<div>';
                                        } 

                                        else if($p4=="Out of Stock"){
                                            echo '<div class="btn btn-danger" style="font-weight:bold;">'.$p4.'<div>';
                                        } 


                                        ?>
                                        </td>
                                        <td>&#8369 &nbsp;<?php echo $p5; ?></td>
                                        <td><?php echo $p6; ?></td>
                                           <td><?php echo $p7; ?></td>
                                     
                                        <td>
                                            <form method="GET" action="edit-product.php"> 
                                                <input type="hidden" name="p_id" value="<?php echo $pid; ?>">
                                            <button type="submit" name="btnedit" data-toggle="tooltip" title="Edit" class="pd-setting-ed"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
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