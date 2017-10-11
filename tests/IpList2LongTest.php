<?php

use PHPUnit\Framework\TestCase;

class IpList2LongTest extends TestCase {
  public function testConvertsAnArrayOfIps() {
    $ips = ["192.168.0.1", "192.168.0.2", "0.0.0.0"];
    $longs = [3232235521, 3232235522, 0];
    $results = iplist2long($ips);
    $this->assertEquals($longs, $results);
  }

  public function testConvertsAnArrayOfLongs() {
    $longs = [3232235521, 3232235522, 0];
    $ips = ["192.168.0.1", "192.168.0.2", "0.0.0.0"];
    $results = longlist2ip($longs);
    $this->assertEquals($ips, $results);
  }
}
