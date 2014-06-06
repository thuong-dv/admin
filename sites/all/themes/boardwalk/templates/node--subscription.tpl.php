<div class="subscription">
  <div class="billing">
  <fieldset><legend><span class="fieldset-legend">Billing information</span></legend>
  
  <?php print drupal_render(drupal_get_form('cus_payment_billing_form'));?>
 <!-- <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="JJ9F4R8YKCNV6">
<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_subscribeCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
</form>-->

  </fieldset>
  </div>
  <div  class="info">
  <fieldset> 
    <legend><span class="fieldset-legend">Plan information</span></legend>
    <h3><?php print $title; ?></h3>
    <div class="price">
    <?php print render($content['field_option_price']); ?>
    </div>
    <?php print render($content['field_plan_information']); ?>
     <h3>Safe & Secure</h3>
<p style="text-align: justify;">
	We keep your billing information safe. This form is encrypted, and Verified Merchant.
</p>
<!-- PayPal Logo -->
<table border="0" cellpadding="10" cellspacing="0" align="center">

	<tr>
		<td align="center">
			<a href="https://www.paypal.com/webapps/mpp/paypal-popup" title="How PayPal Works" onclick="javascript:window.open('https://www.paypal.com/webapps/mpp/paypal-popup','WIPaypal','toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=yes, width=1060, height=700'); return false;"><img src="https://www.paypalobjects.com/webstatic/mktg/logo/bdg_secured_by_pp_2line.png" border="0" alt="Secured by PayPal"></a>
	 
		</td>
    <td><img src="/sites/all/themes/boardwalk/images/Seal.jpg" /></td>
	</tr>
	
</table>
<!-- PayPal Logo -->
<!--<div id="sitelock_shield_logo" class="fixed_btm" style="bottom:0;position:fixed;_position:absolute;right:0;">
	<a href="https://www.sitelock.com/verify.php?site=japanesevideocast.com" onclick="window.open('https://www.sitelock.com/verify.php?site=japanesevideocast.com','SiteLock','width=600,height=600,left=160,top=170');return false;"><img alt="malware removal and website security" title="SiteLock" src="//shield.sitelock.com/shield/japanesevideocast.com"/></a>
</div>-->

  </fieldset>
</div>
</div>