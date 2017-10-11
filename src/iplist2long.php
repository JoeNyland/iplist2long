<?php

function iplist2long($ips) {
  return array_map(function($ip) {
    return ip2long($ip);
  }, $ips);
}

function longlist2ip($ips) {
  return array_map(function($ip) {
    return long2ip($ip);
  }, $ips);
}
