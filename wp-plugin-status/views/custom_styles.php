<h1>Custom Styles</h1>

<style>
input.fullwidth { width:600px; padding:5px; }
.form_wrap { float:left; margin: 0 0 20px 0; }
</style>

<?php

$all_styles = get_option('_wp_custom_style');
$all_styles = unserialize($all_styles);

//print_r($all_styles); exit;

$empty_msg = FALSE;
$url_msg = FALSE;
$success_msg = FALSE;

if (isset($_POST['submit_styles'])){

  $post_data = isset($_POST['custom_src']) && !empty($_POST['custom_src']) ? $_POST['custom_src'] : '' ;

  if (empty($post_data)){

    $empty_msg = TRUE;

  } else {

    if (filter_var($post_data, FILTER_VALIDATE_URL) === FALSE) {

      $url_msg = TRUE;
    
    } else {

      if(strpos($post_data, "http://") !== false){

        $all_styles[] = $post_data;

        $_clean_array = serialize($all_styles);

        update_option('_wp_custom_style',$_clean_array);

        $success_msg = TRUE;

      } else {

        $all_styles[] = str_replace('https:','',$post_data);

        $_clean_array = serialize($all_styles);

        update_option('_wp_custom_style',$_clean_array);

        $success_msg = TRUE;

      }

    }

  }

} 

?>

<?php if (isset($url_msg) && $url_msg != FALSE){ ?><div class="error"><p>Please enter a valid URL</p></div><?php } ?>
<?php if (isset($empty_msg) && $empty_msg != FALSE){ ?><div class="error"><p>URL field is empty</p></div><?php } ?>
<?php if (isset($success_msg) && $success_msg != FALSE){ ?><div id="message"><p>New custom style saved</p></div><?php } ?>

<div class="form_wrap">
<form method="post">

  <table class="wp-list-table widefat fixed pages" cellspacing="0">
    <thead>
      <tr>
        <th>Source</th>
      </tr>
    </thead>
    <tbody id="the-list">
      <tr valign="center">
        <td>
            <input name="custom_src" id="custom_src" value="" class="fullwidth" placeholder="eg. https://www.mysite.com/css/style.css"/>
        </td>        
      </tr>
      <tr>
        <td>
          <input type="submit" name="submit_styles" value="Add Style" />
        </td>
      </tr>
    </tbody>
  </table>

</form>
</div>

<?php if (!empty($all_styles)){  ?>
<div class="form_wrap">
<form method="post">

  <table class="wp-list-table widefat fixed pages" cellspacing="0">
    <thead>
      <tr>
        <th>Style</th>
        <th>Action</th>
      </tr>
    </thead>

    <tbody id="the-list">
      <?php foreach ($all_styles as $style): ?>
      <tr valign="center">
        <td width="10%">
            <label for="custom_src"><?php echo $style; ?></label>
        </td>
        <td>
            
        </td>        
      </tr>
    <?php endforeach; ?>
    </tbody>
  </table>

</form>
</div>
<?php } ?>