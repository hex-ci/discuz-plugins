<?php
if (!defined('IN_DISCUZ'))
{
  exit('Access Denied');
}

class plugin_hex_not_found {
  function _set_404()
  {
    header('HTTP/1.1 404 Not Found');
    header('status: 404 Not Found');
  }

  function global_global_header($param)
  {
    global $_G;

    if (empty($_G['messageparam']))
    {
      return;
    }

    $not_found_messages = [
      'space_does_not_exist',
      'view_to_info_did_not_exist',
      'to_view_the_photo_does_not_exist',
      'share_does_not_exist',
      'forum_nonexistence',
      'thread_nonexistence',
      'view_no_article_id',
      'view_article_no_exist',
      'list_choose_category',
      'list_category_noexist',
      'list_category_is_closed',
    ];

    if (in_array($_G['messageparam'][0], $not_found_messages))
    {
      $this->_set_404();
    }
  }
}
