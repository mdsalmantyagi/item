<?php 
include_once("../includes/db_connect.php");
include_once("../includes/common-array.php");
if(!empty($_POST['selectedItem_id'])){	
$item=$_POST['selectedItem_id'];  
//echo "<h1>".$item."</h1>";         
	$query="SELECT * FROM `item_category_m` INNER JOIN `item_type_m` ON item_category_m.icm_item_type_id=item_type_m.itm_id WHERE `icm_item_type_id`='".$item."'";
	$item_c=mysqli_query($conn,$query);
?>
                        <div class="form-group">
                                        <label>Item Category: <span class="text-danger">*</span></label>
                                        <select name="category" id="section" class="form-control" required>
                                           <option>Select Category</option>
                                                <?php 
                                                while($datac=mysqli_fetch_array($item_c))
                                                    {
                                                        if($datac['itm_id']==$datac['icm_item_type_id']){
                                                         echo '<option value="'.$datac['icm_item_type_id'].'">'.$datac['icm_title'].'</option>';
                                                        }
                                                    }       
                                                ?>
                                        </select>
                                     </div>
<?php } else { ?>
	                                 <div class="form-group">
                                        <label>Item Category: <span class="text-danger">*</span></label>
                                        <select name="category" id="section" class="form-control" required >
                                           <option>First Select Item</option>
                                        </select>
                                     </div>
<?php }  ?>

