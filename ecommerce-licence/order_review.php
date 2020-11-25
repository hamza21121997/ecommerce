<form action="paypal.php?sandbox=1" method="post"> <?php // remove sandbox=1 for live transactions ?>
    <input type="hidden" name="action" value="process" />
    <input type="hidden" name="cmd" value="_cart" /> <?php // use _cart for cart checkout ?>
    <input type="hidden" name="currency_code" value="INR" />
    <input type="hidden" name="invoice" value="<?php echo date("His").rand(1234, 9632); ?>" />
    <input type="hidden" name="product_id" value="<?php echo $model; ?>" /> <input type="hidden" name="product_name" value="<?php echo $product_name; ?>" /> 
	<input type="hidden" name="product_quantity" value="1" />
	<input type="hidden" name="product_amount" value="<?php echo $total; ?>" />
	<input type="hidden" name="payer_fname" value="<?php  echo $checkout['name'];  ?>" />
 	<input type="hidden" name="payer_email" value="<?php  echo $checkout['email'];  ?>" />
		<input type="hidden" name="payer_address" value="<?php  echo $checkout['address'];  ?>" />
 
	<input type="submit" name="submit" value="Pay now using Paypal" /> 
    </form>
<?php include "includes/header.php"; ?>
    <?php include  "includes/left.php"; ?>
    <!-- end of left content -->
    <div class="center_content">
     <div class="center_title_bar">Profile</div>
     
     
     
     
     <?php
     
     $checkout=$_SESSION['checkout'];
      $mid=$_SESSION['mid'];
    
     
     
     
     
     
     ?>
      <table width="63%" height="141" border="0">
  <tr>
    <td width="22%">Name</td>
    <td width="78%"> <?php  echo $checkout['name'];  ?> </td>
  </tr>
  <tr>
    <td>Email</td>
    <td> <?php   echo $checkout['email'];  ?> </td>
  </tr>
   
  <tr>
    <td>Contact</td>
    <td> <?php   echo $checkout['contact'];  ?> </td>
  </tr>
  <tr>
    <td>Address</td>
    <td> <?php echo $checkout['address'];   ?> </td>
  </tr>
   
   
</table>
     
     
     <br />
     <br />
     <table width="100%" border="0">
  <tr>
     <td>Image</td>
    <td>Title</td>
    <td>Qty</td>
    <td>Sub Total</td>
     </tr>
 
 
 
             <?php
             
             
             $r=$mysqli->query("SELECT * FROM products p INNER JOIN cart c 
             ON c.pid=p.pid WHERE c.mid='$mid' ");
             
             
             $n=1;
             
             $total=0;
             $model='';
             $product_name='';
            while($row=$r->fetch_assoc()){
                $model.=" ".$row['model'];
                $product_name.=" ".$row['title'];
                ?>
                
                  <tr>
                    <td><img width="40" src="uploads/<?php echo $row['image']; ?>" /></td>
                    <td><?php echo $row['title']; ?></td>
                    
                    <td> <?php echo $row['qty']; ?></td>
                    
 
                    
                    <td><?php echo $row['qty']*$row['cost']; 
                    $total=$total+$row['qty']*$row['cost'];
                    
                    ?></td>
                  </tr>
                <?php
                $n++;
            }
            
            
            
             ?>
             
             <tr>
     <td> </td>
    <td> </td>
    <td> </td>
    <td>Net Total :<?php echo $total; ?></td>
     </tr>
            </table>     
             
     
     
     
     <form action="paypal.php?sandbox=1" method="post"> <?php // remove sandbox=1 for live transactions ?>
    <input type="hidden" name="action" value="process" />
    <input type="hidden" name="cmd" value="_cart" /> <?php // use _cart for cart checkout ?>
    <input type="hidden" name="currency_code" value="INR" />
    <input type="hidden" name="invoice" value="<?php echo date("His").rand(1234, 9632); ?>" />
    <input type="hidden" name="product_id" value="<?php echo $model; ?>" /> <input type="hidden" name="product_name" value="<?php echo $product_name; ?>" /> 
    <input type="hidden" name="product_quantity" value="1" />
    <input type="hidden" name="product_amount" value="<?php echo $total; ?>" />
    <input type="hidden" name="payer_fname" value="<?php  echo $checkout['name'];  ?>" />
    <input type="hidden" name="payer_email" value="<?php  echo $checkout['email'];  ?>" />
    <input type="hidden" name="payer_address" value="<?php  echo $checkout['address'];  ?>" />
    <input type="submit" name="submit" value="Pay now using Paypal" /> 
    </form>
     
     
     
     
     
    </div>
    <!-- end of center content -->
    <?php include "includes/right.php"; ?>
    <!-- end of right content -->
  </div>
  <!-- end of main content -->
 <?php include "includes/footer.php"; ?>