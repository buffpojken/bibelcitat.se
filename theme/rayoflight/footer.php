<div class="clear-footer"></div>		
      
      <!-- END .container -->	
      </div>				
      
      <!-- BEGIN .footer-wrapper -->		
      <div class="footer-wrapper">			
      <!-- BEGIN .footer -->		
      	
      <div class="footer">				
      <!-- BEGIN .cross-hill -->		
      		
      <?php
	  global $theme_name;
	  if((get_option("".$theme_name."_cross_hill")) == "on") {
	  ?>
	  <span class="cross-hill">&nbsp;</span>				
      <?php } ?>
	  <!-- END .cross-hill -->												
      <?php						
      $twitter = get_option("theme_twitter_url");						
      $facebook = get_option("theme_facebook_url");						
      $linkedin = get_option("theme_linkedin_url");						
      $digg = get_option("theme_digg_url");												
      $phone = get_option("theme_phone");												
      $mail = get_option("theme_mail");												
      $link_1 = get_option("theme_footer_link_1");						
      $link_name_1 = get_option("theme_footer_link_name_1");												
      $link_2 = get_option("theme_footer_link_2");						
      $link_name_2 = get_option("theme_footer_link_name_2");												
      $link_3 = get_option("theme_footer_link_3");						
      $link_name_3 = get_option("theme_footer_link_name_3");												
      $link_4 = get_option("theme_footer_link_4");						
      $link_name_4 = get_option("theme_footer_link_name_4");						
      if(get_option("show_rss_icon")) {							
      $rss = get_option("theme_rss_url");							
      if($rss == "") $rss = get_bloginfo("rss_url");						
      } else { $rss = false; }					
      ?>								
        <table>					
          <tr>						
          <?php if($phone || $mail) { ?>							
            <td>								
              <h2><?php printf ( __( 'Contact Information' , 'rayoflight' ));?></h2>								
              <?php if($phone) { ?><span class="phone"><?php echo $phone;?></span><?php } ?>								
              <?php if($mail) { ?><a class="email" href="mailto:<?php echo $mail;?>"><?php echo $mail;?></a><?php } ?>								
              <p><?php echo get_option("theme_footer_text"); ?></p>															
            </td>						
          <?php } ?>												
          
          <?php if($link_1 || $link_2 || $link_3 || $link_4) { ?>						
          <td class="spacer"></td>												
          <td>								
            <h2><?php printf ( __( 'Shortcuts' , 'rayoflight' ));?></h2>							
            <ul>								
              <?php if($link_name_1) { ?><li><a href="<?php echo $link_1;?>"><?php echo $link_name_1;?></a></li>
              <?php } ?>								<?php if($link_name_2) { ?><li><a href="<?php echo $link_2;?>"><?php echo $link_name_2;?></a></li><?php } ?>								
              <?php if($link_name_3) { ?><li><a href="<?php echo $link_3;?>"><?php echo $link_name_3;?></a></li><?php } ?>								
              <?php if($link_name_4) { ?><li><a href="<?php echo $link_4;?>"><?php echo $link_name_4;?></a></li><?php } ?>							
             </ul>													
          </td>						
          <?php } ?>												
         
          <?php if($facebook || $twitter || $digg || $rss) { ?>						
          <td class="spacer"></td>												
            <td>							
              <h2><?php printf ( __( 'Social Contacts' , 'rayoflight' ));?></h2>							
              <ul>								
                <?php if($facebook) { ?><li class="facebook"><a href="<?php echo $facebook; ?>"><?php printf ( __( 'Friend Us On <b>Facebook</b>' , 'rayoflight' ));?></a></li><?php } ?>								
                <?php if($twitter) { ?><li class="twitter"><a href="<?php echo $twitter; ?>"><?php printf ( __( 'Follow Us On <b>Twitter</b>' , 'rayoflight' ));?></a></li><?php } ?>								
                <?php if($digg) { ?><li class="digg"><a href="<?php echo $digg; ?>"><?php printf ( __( 'Dig Our Posts On <b>Digg</b>' , 'rayoflight' ));?></a></li><?php } ?>								
                <?php if($rss) { ?><li class="rss"><a href="<?php echo $rss; ?>"><?php printf ( __( 'Subscribe To Our <b>RSS</b> Feed' , 'rayoflight' ));?></a></li><?php } ?>							
              </ul>													
            </td>						
          <?php } ?>					
         
          </tr>				
        </table>			
        
        <!-- END .footer -->			
        </div>				
      
      <!-- END .footer-wrapper -->		
      </div>						
      
      <!-- BEGIN .footer-wrapper-2 -->		
      <div class="footer-wrapper-2">						
     
        <!-- BEGIN .footer-2 -->			
        <div class="footer-2">							
          
          <div class="left">Copyright &#169; 2011 <b><a href="http://www.orange-themes.com" target="_blank">Orange-Themes.com</a></b></div>		
                      
          <div class="right">Design by <b><a href="http://themeforest.net/item/ray-of-light-theme-for-religious-movements/210681?ref=orange-themes" target="_blank">Orange-Themes.com</a></b></div>						
          
        <!-- END .footer-2 -->			
        </div>	
              
      <!-- END .footer-wrapper-2 -->		
      </div>	
    	
    <?php wp_footer(); ?>	
    
    </body>
    
	</html>