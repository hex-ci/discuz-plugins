<?php
if (!defined('IN_DISCUZ'))
{
  exit('Access Denied');
}

class plugin_hex_prevent_img_layer {
}

class plugin_hex_prevent_img_layer_forum extends plugin_hex_prevent_img_layer {
  public function viewthread_postbottom_output()
  {
    global $postlist;

    if (!empty($postlist))
    {
      foreach ($postlist as $index => $item)
      {
        $postlist[$index]['message'] = preg_replace('|onmouseover="showMenu\([^)]+?\)"|', '', $item['message']);
      }
    }
  }
}


/* End of file prevent_layer.class.php */
/* Location: ./source/plugin/hex_prevent_img_layer/prevent_layer.class.php */
