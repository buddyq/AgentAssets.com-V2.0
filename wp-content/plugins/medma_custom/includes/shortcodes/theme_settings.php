<?php

/* 
 * Theme Options | Customized
 */

add_action( 'admin_menu', 'custom_theme_options_menu' );
//add_action( 'admin_menu', 'custom_admin_scripts' );


function custom_theme_options_menu() {
    
    add_menu_page('Agent Information', 'Customize Microsite', 'manage_options', 'mi-top-level-handle', 'mi_theme_options' );

    add_submenu_page('mi-top-level-handle', 'Agent Information', 'Agent Information' , 'manage_options', 'mi-sub-agent-information', 'mi_sub_agent_information');

    add_submenu_page('mi-top-level-handle', 'Property Details', 'Property Details' , 'manage_options', 'mi-sub-property-details', 'mi_sub_property_details');
    add_submenu_page('mi-top-level-handle', 'Printable Info', 'Printable Info' , 'manage_options', 'mi-sub-printable-info', 'mi_sub_printable_info');
    add_submenu_page('mi-top-level-handle', 'Contact Info', 'Contact Info' , 'manage_options', 'mi-sub-contact-details', 'mi_sub_contact_details');
    add_submenu_page('mi-top-level-handle', 'Meta Info', 'Meta Info' , 'manage_options', 'mi-sub-meta-info', 'mi_sub_meta_information');
    
}


function mi_sub_meta_information(){
    
     if(isset($_POST['submit'])) 
    {
        $input_meta_keywords = $_POST['meta_keywords'];
        update_option('meta_keywords', $input_meta_keywords);
        $meta_keywords = get_option('meta_keywords',true);
        
        $input_meta_description = $_POST['meta_description'];
        update_option('meta_description', $input_meta_description);
       $meta_description = get_option('meta_description',true);
       
    }
    $meta_keywords = get_option('meta_keywords',true);
    $meta_description = get_option('meta_description',true);
    
    ?>
    <div class="wrap">
            <h1>Meta Information</h1>

            <form method="post" action="" novalidate="novalidate">
                
                <table class="form-table">
                    <tbody>
                        
                        <tr>
                            <th scope="row">
                                <label for="meta_keywords">Meta Keywords</label>
                            </th>
                            <td>
                               <textarea name="meta_keywords" cols="50" rows="10"><?php if(isset($meta_keywords)){ echo $meta_keywords; }?></textarea>
                            </td>
                        </tr>
                        
                        <tr>
                            <th scope="row">
                                <label for="meta_description">Meta Description</label>
                            </th>
                            <td>
                                <textarea name="meta_description" cols="50" rows="10"><?php echo $meta_description; ?></textarea>
                            </td>
                        </tr>
                       
                    </tbody>
                </table>
                <p class="submit">
                    <input type="submit" name="submit" id="submit" class="button button-primary" value="Save Changes">
                </p>
            </form>
    </div>
    <?php
    
    
}


function mi_sub_property_details(){
    
    if(isset($_POST['submit'])) 
    {
        $input_property_description = ($_POST['property_description']);
        update_option('property_description', $input_property_description);
        $property_description = stripslashes(get_option('property_description',true));
        
        $input_property_price_type = $_POST['property_price_type'];
        update_option('property_price_type', $input_property_price_type);
        $property_price_type = get_option('property_price_type',true);
        
        $input_property_price = $_POST['property_price'];
        update_option('property_price', $input_property_price);
        $property_price = get_option('property_price',true);
        
        $property_price_min = $_POST['property_price1'];
        update_option('property_price1', $property_price_min);
        $property_price_min = get_option('property_price1',true);
        
        $property_price_max = $_POST['property_price2'];
        update_option('property_price2', $property_price_max);
        $property_price_max = get_option('property_price2',true);
        
        $input_property_type = $_POST['property_type'];
        update_option('property_type', $input_property_type);
        $property_type = get_option('property_type',true);
        
        $input_property_mls = $_POST['property_mls'];
        update_option('property_mls', $input_property_mls);
        $property_mls = get_option('property_mls',true);
                
        $input_property_area = $_POST['property_area'];
        update_option('property_area', $input_property_area);
        $property_area = get_option('property_area',true);
        
        $input_property_bedrooms = $_POST['property_bedrooms'];
        update_option('property_bedrooms', $input_property_bedrooms);
        $property_bedrooms = get_option('property_bedrooms',true);
        
        $input_property_baths = $_POST['property_baths'];
        update_option('property_baths', $input_property_baths);
        $property_baths = get_option('property_baths',true);
        
        $input_property_living_areas = $_POST['property_living_areas'];
        update_option('property_living_areas', $input_property_living_areas);
        $property_living_areas = get_option('property_living_areas',true);
        
        $input_property_square_feet = $_POST['property_square_feet'];
        update_option('property_square_feet', $input_property_square_feet);
        $property_square_feet = get_option('property_square_feet',true);
        
        $input_property_school_district = $_POST['property_school_district'];
        update_option('property_school_district', $input_property_school_district);
        $property_school_district = get_option('property_school_district',true);
        
        $input_property_pool = $_POST['property_pool'];
        update_option('property_pool', $input_property_pool);
        $property_pool = get_option('property_pool',true);
        
        $input_property_view = $_POST['property_view'];
        update_option('property_view', $input_property_view);
        $property_view = get_option('property_view',true);
        
        $input_property_garages = $_POST['property_garages'];
        update_option('property_garages', $input_property_garages); 
        $property_garages = get_option('property_garages',true);
        
        $input_property_year_built = $_POST['property_year_built'];
        update_option('property_year_built', $input_property_year_built); 
        $property_year_built = get_option('property_year_built',true);
        
        $input_property_lot_size = $_POST['property_lot_size'];
        update_option('property_lot_size', $input_property_lot_size); 
        $property_lot_size = get_option('property_lot_size',true);
        
        $input_property_acreage = $_POST['property_acreage'];
        update_option('property_acreage', $input_property_acreage);
        $property_acreage = get_option('property_acreage',true);
        
        $input_property_tour_link1 = $_POST['property_tour_link1'];
        update_option('property_tour_link1', $input_property_tour_link1);
        $property_tour_link1 = get_option('property_tour_link1',true);
        
        $input_property_tour_link2 = $_POST['property_tour_link2'];
        update_option('property_tour_link2', $input_property_tour_link2);
        $property_tour_link2 = get_option('property_tour_link2',true);
    }
    
    $property_desc_rawdata = get_option('property_description',true);
    $property_description = stripslashes($property_desc_rawdata);
    $property_price_type = get_option('property_price_type',true);
    $property_price = get_option('property_price',true);
    $property_price_min = get_option('property_price1',true);
    $property_price_max = get_option('property_price2',true);
    $property_type = get_option('property_type',true);
    $property_mls = get_option('property_mls',true);
    $property_area = get_option('property_area',true);
    $property_bedrooms = get_option('property_bedrooms',true);
    $property_baths = get_option('property_baths',true);
    $property_living_areas = get_option('property_living_areas',true);
    $property_square_feet = get_option('property_square_feet',true);
    $property_school_district = get_option('property_school_district',true);
    $property_pool= get_option('property_pool',true);
    $property_view = get_option('property_view',true);
    $property_garages = get_option('property_garages',true);
    $property_year_built = get_option('property_year_built',true);
    $property_lot_size = get_option('property_lot_size',true);
    $property_acreage = get_option('property_acreage',true);
    $property_tour_link1 = get_option('property_tour_link1',true);
    $property_tour_link2 = get_option('property_tour_link2',true);

    ?>
     <div class="wrap">
            <h1>Property Details</h1>

            <form method="post" action="" novalidate="novalidate">
                
                <table class="form-table">
                    <tbody>
                        <tr>
                            <th scope="row">
                                <label for="agentname">Property Description</label>
                            </th>
                            <td>
                                <?php wp_editor($property_description, 'property_description');?>
                                
                            </td>
                        </tr>
                        
                        <tr>
                            <th scope="row">
                                <label for="property_price_type">Price Type</label>
                            </th>
                            <td>
                                <select name="property_price_type" id="property_price_type">
                                    <option value="">Select Price Type</option>
                                   <?php if (get_option('property_price_type') == "fixed") {
                                       echo"selected fixed";?>
                                    <option value="fixed" selected="selected">Fixed</option>
                                    <?php }else{
                                        echo "non selected";?>
                                        <option value="fixed">Fixed</option>
                                 <?php   } ?>
                                        <?php if (get_option('property_price_type') == "range") { ?>
                                    <option value="range" selected="selected">Range</option>
                                    <?php }else{?>
                                        <option value="range">Range</option>
                                 <?php   } ?>
                                    
                                </select>
                            </td>
                        </tr>
                        
                        <tr id="fixed-price-type">
                            <th scope="row">
                                <label for="property_price">Price</label>
                            </th>
                            <td>
                                <input name="property_price" type="text" id="property_price" value="<?php if(isset($property_price)){ echo $property_price; }?>" class="regular-text">
                            </td>
                        </tr>
                        
                        <tr id="range-price-type-min">
                            <th scope="row">
                                <label for="property_price1">Min. Price</label>
                            </th>
                            <td>
                                <input name="property_price1" type="text" id="property_price1" value="<?php if(isset($property_price_min)){ echo $property_price_min; }?>" class="regular-text">
                            </td>
                        </tr> 
                        <tr id="range-price-type-max">
                            <th scope="row">
                                <label for="property_price2">Max. Price</label>
                            </th>
                            <td>
                                <input name="property_price2" type="text" id="property_price2" value="<?php if(isset($property_price_max)){ echo $property_price_max; }?>" class="regular-text">
                            </td>
                        </tr>
                        
                        <tr>
                            <th scope="row">
                                <label for="property_type">Type:</label>
                            </th>
                            <td>
                                <select name="property_type">
                                    <option value="0">Please select Property Type</option>
                                    <option <?php if($property_type=="House"){ echo ' selected="selected" '; }?> value="House">House</option>
                                    <option <?php if($property_type=="Condo"){ echo ' selected="selected" '; }?> value="Condo">Condo</option>
                                    <option <?php if($property_type=="Ranch"){ echo ' selected="selected" '; }?>  value="Ranch">Ranch</option>
                                    <option <?php if($property_type=="Lot"){ echo ' selected="selected" '; }?>  value="Lot">Lot</option>
                                    <option <?php if($property_type=="Townhouse"){ echo ' selected="selected" '; }?> value="Townhouse">Townhouse</option>
                                    <option <?php if($property_type=="Commercial"){ echo ' selected="selected" '; }?> value="Commercial">Commercial</option>
                                    <option <?php if($property_type=="Duplex"){ echo ' selected="selected" '; }?> value="Duplex">Duplex</option>
                                    <option <?php if($property_type=="Loft"){ echo ' selected="selected" '; }?> value="Loft">Loft</option>
                                    <option <?php if($property_type=="Land"){ echo ' selected="selected" '; }?> value="Land">Land</option>
                                    <option <?php if($property_type=="Multi-Family"){ echo ' selected="selected" '; }?> value="Multi-Family">Multi-Family</option>
                                    <option <?php if($property_type=="Single-Family"){ echo ' selected="selected" '; }?> value="Single-Family">Single-Family</option>
                                    <option <?php if($property_type=="Office"){ echo ' selected="selected" '; }?> value="Office">Office</option>
                                    <option <?php if($property_type=="Retail"){ echo ' selected="selected" '; }?> value="Retail">Retail</option>
                                    <option <?php if($property_type=="Mixed Development"){ echo ' selected="selected" '; }?> value="Mixed Development">Mixed Development</option>
                                </select>
                                
                            </td>
                        </tr>
                        
                         <tr>
                            <th scope="row">
                                <label for="property_mls">MLS#:</label>
                            </th>
                            <td>
                                <input name="property_mls" type="text" id="property_mls" value="<?php if(isset($property_mls)){ echo $property_mls; }?>" class="regular-text">
                            </td>
                        </tr>
                        
                        <tr>
                            <th scope="row">
                                <label for="property_area">Area:</label>
                            </th>
                            <td>
                                <select name="property_area" >
                                    <option value="0">N/A</option>
                                    <?php
                                    $areas = array(
                                        '1B', '1N', '2', '4', '6',
                                        '7', 'DT', 'UT', '3', '5',
                                        '3E', '5E', 'NE', '1A', '2N',
                                        'N', 'NW', '10N', '10S', 'SWE',
                                        'SWW', '11', '9', 'SC', 'SE',
                                        '8W', 'RN', 'W', 'CLN', 'LN',
                                        'MA', 'BL', 'HD', 'LS', 'GTE',
                                        'GTW', 'HU', 'JA', 'PF', 'RRE',
                                        'RRW', '8E'
                                    );
                                    foreach($areas AS $area){
                                        ?>
                                        <option <?php if($property_area==$area){ echo ' selected="selected" '; }?> value="<?php echo $area; ?>"><?php echo $area; ?></option>
                                        <?php 
                                    } ?>
                                </select>
                                
                            </td>
                        </tr>
                        
                        <tr>
                            <th scope="row">
                                <label for="property_bedrooms">Bedrooms:</label>
                            </th>
                            <td>
                                <input name="property_bedrooms" type="text" id="property_bedrooms" value="<?php if(isset($property_bedrooms)){ echo $property_bedrooms; }?>" class="regular-text">
                            </td>
                        </tr>
                        
                        <tr>
                            <th scope="row">
                                <label for="property_baths">Baths:</label>
                            </th>
                            <td>
                                <input name="property_baths" type="text" id="property_baths" value="<?php if(isset($property_baths)){ echo $property_baths; }?>" class="regular-text">
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">
                                <label for="property_living_areas">Living Areas:</label>
                            </th>
                            <td>
                                <input name="property_living_areas" type="text" id="property_living_areas" value="<?php if(isset($property_living_areas)){ echo $property_living_areas; }?>" class="regular-text">
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">
                                <label for="property_square_feet">Square Feet:</label>
                            </th>
                            <td>
                                <input name="property_square_feet" type="text" id="property_square_feet" value="<?php if(isset($property_square_feet)){ echo $property_square_feet; }?>" class="regular-text">
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">
                                <label for="property_school_district">School District:</label>
                            </th>
                            <td>
                                <input name="property_school_district" type="text" id="property_school_district" value="<?php if(isset($property_school_district)){ echo $property_school_district; }?>" class="regular-text">
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">
                                <label for="property_pool">Pool:</label>
                            </th>
                            <td>
                                <select name="property_pool" id="property_pool">
                                    <option value="0">N/A</option>
                                    <option value="1">Yes</option>
                                    <option value="2">No</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">
                                <label for="property_view">View:</label>
                            </th>
                            <td>
                                <input name="property_view" type="text" id="property_view" value="<?php if(isset($property_view)){ echo $property_view; }?>" class="regular-text">
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">
                                <label for="property_garages">Garages:</label>
                            </th>
                            <td>
                                <input name="property_garages" type="text" id="property_garages" value="<?php if(isset($property_garages)){ echo $property_garages; }?>" class="regular-text">
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">
                                <label for="property_year_built">Year Built:</label>
                            </th>
                            <td>
                                <input name="property_year_built" type="text" id="property_year_built" value="<?php if(isset($property_year_built)){ echo $property_year_built; }?>" class="regular-text">
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">
                                <label for="property_lot_size">Lot Size:</label>
                            </th>
                            <td>
                                <input name="property_lot_size" type="text" id="property_lot_size" value="<?php if(isset($property_lot_size)){ echo $property_lot_size; }?>" class="regular-text">
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">
                                <label for="property_acreage">Acreage:</label>
                            </th>
                            <td>
                                <input name="property_acreage" type="text" id="property_acreage" value="<?php if(isset($property_acreage)){ echo $property_acreage; }?>" class="regular-text">
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">
                                <label for="property_tour_link1">Tour Link1:</label>
                            </th>
                            <td>
                                <input name="property_tour_link1" type="text" id="property_tour_link1" value="<?php if(isset($property_tour_link1)){ echo $property_tour_link1; }?>" class="regular-text">
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">
                                <label for="property_tour_link2">Tour Link2:</label>
                            </th>
                            <td>
                                <input name="property_tour_link2" type="text" id="property_tour_link2" value="<?php if(isset($property_tour_link2)){ echo $property_tour_link2; }?>" class="regular-text">
                            </td>
                        </tr>
                        
                </table>
                <p class="submit">
                    <input type="submit" name="submit" id="submit" class="button button-primary" value="Save Changes">
                </p>
            </form>
     </div>
    <?php
    
}







function mi_sub_printable_info(){
    
     if(isset($_POST['submit'])) 
    {
         
         // Check that the nonce is valid, and the user can edit this post.
        if (    isset( $_POST['printable_image_upload_nonce'] )    && wp_verify_nonce( $_POST['printable_image_upload_nonce'], 'printable_image_upload' ))       
        {
               require_once( ABSPATH . 'wp-admin/includes/file.php' );
        
               $file = $_FILES['printable_image_upload'];
               
               $overrides = array(
                        'test_form' => false,
                        'test_size' => true,
                        'test_upload' => true, 
                );

               $printable_image_results = wp_handle_sideload( $file, $overrides );
            
                if (!empty($printable_image_results['error'])) {
                        // insert any error handling here
                } else {
                        update_option('printable_image', $printable_image_results['url']);
                        // perform any actions here based in the above results
                }

       } else {

               // The security check failed, maybe show the user an error.
       }
         
        $input_printable_text = addslashes($_POST['printable_text']);
        
        update_option('printable_text', $input_printable_text);
        $printable_text = stripslashes(get_option('printable_text',true));
        $printable_image = get_option('printable_image',true);
    }
    $printable_text = stripslashes(get_option('printable_text',true));
     $printable_image = get_option('printable_image',true);
    ?>
    
     <div class="wrap">
            <h1>Printable Info</h1>

            <form method="post" action="" novalidate="novalidate" enctype="multipart/form-data">
                
                <table class="form-table">
                    <tbody>
                        
                        <tr>
                            <th scope="row">
                                <label for="printable_image">Printable Image</label>
                            </th>
                            <td>
                                <img src="<?php echo $printable_image; ?>" style="width: auto; height: 100px;"/>
                                <input type="file" name="printable_image_upload" id="printable_image_upload"  multiple="false" />
                                <?php wp_nonce_field( 'printable_image_upload', 'printable_image_upload_nonce' ); ?>
                            </td>
                        </tr>
                        
                        <tr>
                            <th scope="row">
                                <label for="printable_text">Printable Text</label>
                            </th>
                            <td>
                                <?php if(isset($printable_text)){ wp_editor($printable_text, 'printable_text'); }?>
                            </td>
                         </tr>
                         <tr>
                            
                             <td><h3>Note:</h3> </td>
                            <td><a href="<?php echo admin_url('edit.php?post_type=printable_info'); ?>">Click Here</a> to add attachments to Printable Info</td>
                           
                         </tr>
                       
                    </tbody>
                </table>
                <p class="submit">
                    <input type="submit" name="submit" id="submit" class="button button-primary" value="Save Changes">
                </p>
            </form>
    </div>
    <?php
}

function mi_sub_contact_details(){
    if(isset($_POST['submit'])) 
    {
        
        // Check that the nonce is valid, and the user can edit this post.
        if (    isset( $_POST['contact_image_upload_nonce'] )    && wp_verify_nonce( $_POST['contact_image_upload_nonce'], 'contact_image_upload' ))       
        {
               // The nonce was valid and the user has the capabilities, it is safe to continue.

               // These files need to be included as dependencies when on the front end.
               //require_once( ABSPATH . 'wp-admin/includes/image.php' );
               require_once( ABSPATH . 'wp-admin/includes/file.php' );
               //require_once( ABSPATH . 'wp-admin/includes/media.php' );

               $file = $_FILES['contact_image_upload'];
               
               $overrides = array(
                        // tells WordPress to not look for the POST form
                        // fields that would normally be present, default is true,
                        // we downloaded the file from a remote server, so there
                        // will be no form fields
                        'test_form' => false,

                        // setting this to false lets WordPress allow empty files, not recommended
                        'test_size' => true,

                        // A properly uploaded file will pass this test. 
                        // There should be no reason to override this one.
                        'test_upload' => true, 
                );

               
               $results = wp_handle_sideload( $file, $overrides );
               
                if (!empty($results['error'])) {
                        // insert any error handling here
                } else {

                        //$filename = $results['file']; // full path to the file
                        //$local_url = $results['url']; // URL to the file in the uploads dir
                        //$type = $results['type']; // MIME type of the file
                        update_option('contact_page_image', $results['url']);
                        // perform any actions here based in the above results
                }

       } else {

               // The security check failed, maybe show the user an error.
       }
         
         
        
         $input_contact_form_shortcode = $_POST['contact_form_shortcode'];
        update_option('contact_form_shortcode', $input_contact_form_shortcode);
      $contact_form_shortcode_slash = get_option('contact_form_shortcode',true);
         // $contact_form_shortcode = stripcslashes($contact_form_shortcode_slash);
       $contact_form_shortcode = stripcslashes($contact_form_shortcode_slash);
         
         
         $input_google_map_address = $_POST['google_map_address'];
        update_option('google_map_address', $input_google_map_address);
         $google_map_address = get_option('google_map_address',true);
         
         $input_google_map_bubble_marker_address = $_POST['google_map_bubble_marker_address'];
        update_option('google_map_bubble_marker_address', $input_google_map_bubble_marker_address);
         $google_map_bubble_marker_address = get_option('google_map_bubble_marker_address',true);
         
         $input_google_map_bubble_marker_city_state = $_POST['google_map_bubble_marker_city_state'];
        update_option('google_map_bubble_marker_city_state', $input_google_map_bubble_marker_city_state);
         $google_map_bubble_marker_city_state = get_option('google_map_bubble_marker_city_state',true);
         
         $input_google_map_bubble_marker_price = $_POST['google_map_bubble_marker_price'];
        update_option('google_map_bubble_marker_price', $input_google_map_bubble_marker_price);
         $google_map_bubble_marker_price = get_option('google_map_bubble_marker_price',true);
         
         $input_google_map_bubble_marker_agentname = $_POST['google_map_bubble_marker_agentname'];
        update_option('google_map_bubble_marker_agentname', $input_google_map_bubble_marker_agentname);
         $google_map_bubble_marker_agentname = get_option('google_map_bubble_marker_agentname',true);
        
    }
    
    $contact_page_image = get_option('contact_page_image',true);
    $contact_form_shortcode_slash = get_option('contact_form_shortcode',true);
    $contact_form_shortcode = stripcslashes($contact_form_shortcode_slash);
    $google_map_address = get_option('google_map_address',true);
    $google_map_bubble_marker_address = get_option('google_map_bubble_marker_address',true);
    $google_map_bubble_marker_city_state = get_option('google_map_bubble_marker_city_state',true);
    $google_map_bubble_marker_price = get_option('google_map_bubble_marker_price',true);
    $google_map_bubble_marker_agentname = get_option('google_map_bubble_marker_agentname',true);
       
    ?>
    
    <div class="wrap">
            <h1>Contact Info</h1>

            <form method="post" enctype="multipart/form-data" action="" novalidate="novalidate">
                
                <table class="form-table">
                    <tbody>
                        
                        <tr>
                            <th scope="row">
                                <label for="contact_page_image">Contact Page Image</label>
                            </th>
                            <td>
                                
                                <img src="<?php echo $contact_page_image; ?>" style="width: auto; height: 100px;"/>
                                <input type="file" name="contact_image_upload" id="contact_image_upload"  multiple="false" />
                                <?php wp_nonce_field( 'contact_image_upload', 'contact_image_upload_nonce' ); ?>
                                
                                <!--<input name="contact_page_image" type="file" id="contact_page_image" value="<?php //if(isset($contact_page_image)){ echo $contact_page_image; }?>" class="regular-text">-->
                                Upload Photo to be displayed in the contact page
                            </td>
                        </tr>
                        
                        <tr>
                            <th scope="row">
                               <label for="contact_form_shortcode">Contact Form Shortcode</label>
                            </th>
                            <td>
                                <input name="contact_form_shortcode" type="text" id="contact_form_shortcode" value='<?php if(isset($contact_form_shortcode)){ echo $contact_form_shortcode; }?>' class="regular-text">
                                Copy/Paste Contact Form Shortcode 
                            </td> 
                        </tr>
                        
                        <tr>
                            <th scope="row">
                                <label for="google_map_address">Google Map Address</label>
                            </th>
                            <td>
                                <input name="google_map_address" type="text" id="google_map_address" value="<?php if(isset($google_map_address)){ echo $google_map_address; }?>" class="regular-text">
                                Example: 775 New York Eve, Brooklyn.
                            </td>
                        </tr>
                        
                        <tr>
                            <th scope="row">
                                <label for="google_map_bubble_marker_address">Google Map Bubble Marker Address</label>
                            </th>
                            <td>
                                <input name="google_map_bubble_marker_address" type="text" id="google_map_bubble_marker_address" value="<?php if(isset($google_map_bubble_marker_address)){ echo $google_map_bubble_marker_address; }?>" class="regular-text">
                                Example: 775 New York Eve, Brooklyn.
                            </td>
                        </tr>
                        
                        <tr>
                            <th scope="row">
                                <label for="google_map_bubble_marker_city_state">Google Map Bubble Marker City/State</label>
                            </th>
                            <td>
                                <input name="google_map_bubble_marker_city_state" type="text" id="google_map_bubble_marker_city_state" value="<?php if(isset($google_map_bubble_marker_city_state)){ echo $google_map_bubble_marker_city_state; }?>" class="regular-text">
                                Displays City/state on Google Bubble marker
                            </td>
                        </tr>
                        
                        <tr>
                            <th scope="row">
                                <label for="google_map_bubble_marker_price">Google Map Bubble Marker Price</label>
                            </th>
                            <td>
                                <input name="google_map_bubble_marker_price" type="text" id="google_map_bubble_marker_price" value="<?php if(isset($google_map_bubble_marker_price)){ echo $google_map_bubble_marker_price; }?>" class="regular-text">
                                Displays Price on Google Bubble marker
                            </td>
                        </tr>
                        
                        <tr>
                            <th scope="row">
                                <label for="google_map_bubble_marker_agentname">Google Map Bubble Agent Name</label>
                            </th>
                            <td>
                                <input name="google_map_bubble_marker_agentname" type="text" id="google_map_bubble_marker_agentname" value="<?php if(isset($google_map_bubble_marker_agentname)){ echo $google_map_bubble_marker_agentname; }?>" class="regular-text">
                                 Displays Agent Name on Google Bubble marker
                            </td>
                        </tr>
                        
                        
                    </tbody>
                </table>
                <p class="submit">
                    <input type="submit" name="submit" id="submit" class="button button-primary" value="Save Changes">
                </p>
            </form>
    </div>
<?php
}



/* ------------   Script for uploads of images ------------------------------------------------*/

add_action('in_admin_footer','medma_cms_add_script');
function medma_cms_add_script(){
     wp_enqueue_script('media-upload');
    ?>

<script type="text/javascript">
        // Uploading files
        var file_frame; 
      
          jQuery('.upload_image').live('click', function( event ){

            event.preventDefault();

            // If the media frame already exists, reopen it.
            if ( file_frame ) {
              file_frame.open();
              return;
            }

            // Create the media frame.
            file_frame = wp.media.frames.file_frame = wp.media({
              title: jQuery( this ).data( 'uploader_title' ),
              button: {
                text: jQuery( this ).data( 'uploader_button_text' ),
              },
              multiple: false  // Set to true to allow multiple files to be selected
            });

            // When an image is selected, run a callback.
            file_frame.on( 'select', function() {
              // We set multiple to false so only get one image from the uploader
              attachment = file_frame.state().get('selection').first().toJSON();
             
                jQuery('.upload_image_text').val(attachment.url);
                alert(attachment.url);
                jQuery('.upload_image_hidden').val(attachment.id);
                 alert(attachment.id);
              
            });

            // Finally, open the modal
            file_frame.open();
          });

    </script>

  <script language="JavaScript">
jQuery(document).ready(function() {
jQuery('#upload_image_button').click(function() {
formfield = jQuery('#upload_image').attr('name');
tb_show('', 'media-upload.php?type=image&TB_iframe=true');
return false;
});

window.send_to_editor = function(html) {
imgurl = jQuery('img',html).attr('src');
jQuery('#upload_image').val(imgurl);
tb_remove();
}

});
</script>
    <?php
}


/* ------------   Script for uploads of images ------------------------------------------------*/


function mi_sub_agent_information() {
	/*if ( !current_user_can( 'manage_options' ) )  {
		wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
	}*/
        
        $blog_id = get_current_blog_id();
        switch_to_blog($blog_id);
        $admin_email = get_option('admin_email');
        $user_details = get_user_by('email',$admin_email);
        $user_id = $user_details->ID;
        if($user_id == 0 || $user_id == null)
        {
            switch_to_blog(1);
            $admin_email = get_option('admin_email');
            $user_details = get_user_by('email',$admin_email);
            $user_id = $user_details->ID;
            switch_to_blog($blog_id);
        }
        
        
        if(isset($_POST['submit']))
        {
            $input_agent_name = $_POST['agentname'];
            $input_designation = $_POST['designation'];
            $input_business_phone = $_POST['business_phone'];
            $input_mobile_phone = $_POST['mobile_phone'];
            $input_broker_name = $_POST['brokername'];
            $input_broker_website = $_POST['broker_website'];
            $input_facebook = $_POST['facebook'];
            $input_twitter = $_POST['twitter'];
            $input_googleplus = $_POST['googleplus'];
            
            
            if (    isset( $_POST['profile_picture_upload_nonce'] )    && wp_verify_nonce( $_POST['profile_picture_upload_nonce'], 'profile_picture_upload' ))       
            {
                   require_once( ABSPATH . 'wp-admin/includes/file.php' );

                   $file = $_FILES['profile_picture_upload'];

                   $overrides = array(
                            'test_form' => false,
                            'test_size' => true,
                            'test_upload' => true, 
                    );

                   $profile_picture_results = wp_handle_sideload( $file, $overrides );
                   
                    if (!empty($profile_picture_results['error'])) {
                            // insert any error handling here
                    } else {
                            update_user_meta($user_id,'profile_picture', $profile_picture_results['url']);
                            // perform any actions here based in the above results
                    }

           } else {

                   // The security check failed, maybe show the user an error.
           }
           
           if (    isset( $_POST['broker_logo_upload_nonce'] )    && wp_verify_nonce( $_POST['broker_logo_upload_nonce'], 'broker_logo_upload' ))       
            {
                   require_once( ABSPATH . 'wp-admin/includes/file.php' );

                   $file = $_FILES['broker_logo_upload'];

                   $overrides = array(
                            'test_form' => false,
                            'test_size' => true,
                            'test_upload' => true, 
                    );

                   $broker_logo_results = wp_handle_sideload( $file, $overrides );
                  
                    if (!empty($broker_logo_results['error'])) {
                            // insert any error handling here
                    } else {
                            update_user_meta($user_id,'broker_logo', $broker_logo_results['url']);
                            // perform any actions here based in the above results
                    }

           } else {

                   // The security check failed, maybe show the user an error.
           }
            
            
            update_user_meta($user_id,'first_name',$input_agent_name);
            update_user_meta($user_id,'designation',$input_designation);
            update_user_meta($user_id,'business_phone',$input_business_phone);
            update_user_meta($user_id,'mobile_phone',$input_mobile_phone);
            update_user_meta($user_id,'broker',$input_broker_name);
            update_user_meta($user_id,'broker_website',$input_broker_website);
            update_user_meta($user_id,'facebook',$input_facebook);
            update_user_meta($user_id,'twitter',$input_twitter);
            update_user_meta($user_id,'googleplus',$input_googleplus);
            
            
            
            
        }
        
        $agentname = get_user_meta($user_id,'first_name',true);
        $designation = get_user_meta($user_id,'designation',true);
        $business_phone = get_user_meta($user_id,'business_phone',true);
        $mobile_phone = get_user_meta($user_id,'mobile_phone',true);
        $brokername = get_user_meta($user_id,'broker',true);
        $broker_website = get_user_meta($user_id,'broker_website',true);
        $twitter = get_user_meta($user_id,'twitter',true);
        $facebook = get_user_meta($user_id,'facebook',true);
        $googleplus = get_user_meta($user_id,'googleplus',true);
        $agent_profile_picture =  get_user_meta($user_id,'profile_picture',true);
        if(is_numeric($agent_profile_picture) && $agent_profile_picture>0)
        {
            switch_to_blog(1);
            $agent_profile_picture_url = wp_get_attachment_image_src($agent_profile_picture,'full');
            if(is_array($agent_profile_picture_url))
            {
                $agent_profile_picture_url = $agent_profile_picture_url[0];
            }
            switch_to_blog($blog_id);
        }
        else
        {
            $agent_profile_picture_url = $agent_profile_picture;
        }
        
        $agent_broker_logo =  get_user_meta($user_id,'broker_logo',true);
        if(is_numeric($agent_broker_logo) && $agent_broker_logo>0)
        {
            switch_to_blog(1);
            $agent_broker_logo_url = wp_get_attachment_image_src($agent_broker_logo,'full');
            if(is_array($agent_broker_logo_url))
            {
                $agent_broker_logo_url = $agent_broker_logo_url[0];
            }
            switch_to_blog($blog_id);
        }
        else
        {
            $agent_broker_logo_url = $agent_broker_logo;
        }
        //echo "<pre>";print_r($agent_broker_logo_url);echo "</pre>";
        
	?>
        <div class="wrap">
            <h1>Agent Information</h1>

            <form method="post" action="admin.php?page=mi-sub-agent-information" novalidate="novalidate" enctype="multipart/form-data">
                
                <table class="form-table">
                    <tbody>
                        <tr>
                            <th scope="row">
                                <label for="agentname">Agent Name</label>
                            </th>
                            <td>
                                <input name="agentname" type="text" id="agentname" value="<?php if(isset($agentname)){ echo $agentname; }?>" class="regular-text">
                            </td>
                        </tr>
                        
                        <tr>
                            <th scope="row">
                                <label for="designation">Designation</label>
                            </th>
                            <td>
                                <input name="designation" type="text" id="designation" value="<?php if(isset($designation)){ echo $designation; }?>" class="regular-text">
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">
                                <label for="business_phone">Business Phone</label>
                            </th>
                            <td>
                                <input name="business_phone" type="text" id="business_phone" value="<?php if(isset($business_phone)){ echo $business_phone; }?>" class="regular-text">
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">
                                <label for="mobile_phone">Mobile Phone</label>
                            </th>
                            <td>
                                <input name="mobile_phone" type="text" id="mobile_phone" value="<?php if(isset($mobile_phone)){ echo $mobile_phone; }?>" class="regular-text">
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">
                                <label for="profile_picture">Profile Picture</label>
                            </th>
                            <td>
                                <?php if(isset($agent_profile_picture_url)){ ?>
                                    <img style="height:100px; width:auto;" src="<?php echo $agent_profile_picture_url; ?>" alt="Profile Picture"/>
                                <?php }else{ ?>
                                    <img style="height:100px; width:auto;" src="<?php echo plugins_url('medma-site-manager'); ?>/images/dummy_agent_pic.png" alt="Profile Picture"/>
                                <?php } ?>
                                
                                <input type="file" name="profile_picture_upload" id="profile_picture_upload"  multiple="false" />
                                <?php wp_nonce_field( 'profile_picture_upload', 'profile_picture_upload_nonce' ); ?>
                            </td>
                        </tr>
                        
                        <tr>
                            <th scope="row">
                                <label for="brokername">Broker Name</label>
                            </th>
                            <td>
                                <input name="brokername" type="text" id="brokername" value="<?php if(isset($brokername)){ echo $brokername; }?>" class="regular-text">
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">
                                <label for="broker_website">Broker Website</label>
                            </th>
                            <td>
                                <input name="broker_website" type="text" id="broker_website" value="<?php if(isset($broker_website)){ echo $broker_website; }?>" class="regular-text">
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">
                                <label for="broker_logo">Broker Logo</label>
                            </th>
                            <td>
                                <?php if(isset($agent_broker_logo_url)){ ?>
                                    <img style="height:100px; width:auto;" src="<?php echo $agent_broker_logo_url; ?>" alt="Broker Logo"/>
                                <?php }else{ ?>
                                    <img style="height:100px; width:auto;" src="<?php echo plugins_url('medma-site-manager'); ?>/images/placeholder_wide.jpg" alt="Broker Logo"/>
                                <?php } ?>
                                
                                <input type="file" name="broker_logo_upload" id="broker_logo_upload"  multiple="false" />
                                <?php wp_nonce_field( 'broker_logo_upload', 'broker_logo_upload_nonce' ); ?>
                            </td>
                        </tr>
                        
                        <tr>
                            <th scope="row">
                                <label for="facebook">Facebook</label>
                            </th>
                            <td>
                                <input name="facebook" type="text" id="facebook" value="<?php if(isset($facebook)){ echo $facebook; }?>" class="regular-text">
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">
                                <label for="twitter">Twitter</label>
                            </th>
                            <td>
                                <input name="twitter" type="text" id="twitter" value="<?php if(isset($twitter)){ echo $twitter; }?>" class="regular-text">
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">
                                <label for="googleplus">Google Plus</label>
                            </th>
                            <td>
                                <input name="googleplus" type="text" id="googleplus" value="<?php if(isset($googleplus)){ echo $googleplus; }?>" class="regular-text">
                            </td>
                        </tr>
                
                    </tbody>
                </table>

                <p class="submit">
                    <input type="submit" name="submit" id="submit" class="button button-primary" value="Save Changes">
                </p>
            </form>

        </div>
        <?php
        
}

function wp_gear_manager_admin_scripts() {
wp_enqueue_script('media-upload');
wp_enqueue_script('thickbox');
wp_enqueue_script('jquery');
}

function wp_gear_manager_admin_styles() {
wp_enqueue_style('thickbox');
}

add_action('admin_print_scripts', 'wp_gear_manager_admin_scripts');
add_action('admin_print_styles', 'wp_gear_manager_admin_styles');


add_action('in_admin_footer', 'custom_admin_scripts');

function custom_admin_scripts() {
    ?>
    <script type="text/javascript">
        jQuery(document).ready(function(){
            jQuery(document).on('keyup', '#property_price', function() {
                var x = jQuery(this).val();
                jQuery(this).val(x.toString().replace(/,/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ","));
            });
                
            jQuery(document).on('keyup', '#property_price1', function() {
                var x = jQuery(this).val();
                jQuery(this).val(x.toString().replace(/,/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ","));
            });
                
            jQuery(document).on('keyup', '#property_price2', function() {
                var x = jQuery(this).val();
                jQuery(this).val(x.toString().replace(/,/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ","));
            });
            
            jQuery(document).on('keyup', '#property_square_feet', function() {
                var x = jQuery(this).val();
                jQuery(this).val(x.toString().replace(/,/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ","));
            });
                
            jQuery(document).on('keyup', '#property_lot_size', function() {
                var x = jQuery(this).val();
                jQuery(this).val(x.toString().replace(/,/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ","));
            });
            var price_type = jQuery("#property_price_type").val();
            
            if(price_type == "fixed")
            {
                jQuery('#property_price').show();
                jQuery('#range-price-type-min').hide();
                jQuery('#range-price-type-max').hide();
            }
            else
            {
                jQuery('#fixed-price-type').hide();
                jQuery('#property_price1').show();
                jQuery('#property_price2').show();
            }
            jQuery("#property_price_type").on('change',function(){
                var price_type = jQuery("#property_price_type").val();
                if(price_type == "fixed")
                {
                    jQuery('#fixed-price-type').show();
                    jQuery('#range-price-type-min').hide();
                    jQuery('#range-price-type-max').hide();
                }
                else
                {
                    jQuery('#fixed-price-type').hide();
                    jQuery('#range-price-type-min').show();
                    jQuery('#range-price-type-max').show();
                }
            });
        });
        function numberWithCommas(x) {
            return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        }
    </script>
    <?php
}