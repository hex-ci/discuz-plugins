<?php
if (!defined('IN_DISCUZ')) {
  exit('Access Denied');
}

class plugin_register_limit {
}

class plugin_register_limit_member extends plugin_register_limit {
  function register_top()
  {
    global $_G;

    // 取插件的配置
    $vars_config = $_G['cache']['plugin']['register_limit'];
    $time_range = empty($vars_config['time_range']) ? '' : $vars_config['time_range'];

    if (empty($time_range))
    {
      return;
    }

    $now = dgmdate(TIMESTAMP, 'G.i', $_G['setting']['timeoffset']);

    foreach (explode("\r\n", str_replace(':', '.', $time_range)) as $period)
    {
      list($periodbegin, $periodend) = explode('-', $period);
      if (($periodbegin > $periodend && ($now >= $periodbegin || $now < $periodend)) || ($periodbegin < $periodend && $now >= $periodbegin && $now < $periodend))
      {
        if (empty($vars_config['notice_content']))
        {
          $banperiods = str_replace("\r\n", ', ', $time_range);
          showmessage('period_nopermission', NULL, array('banperiods' => $banperiods), array('login' => 1));
        }
        else
        {
          showmessage($vars_config['notice_content'], NULL, NULL, array('login' => 1));
        }
      }
    }
  }
}
