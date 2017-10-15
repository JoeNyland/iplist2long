<?php

namespace Controller;

class Convert {
  public function fromIps() {
    $input = file_get_contents('php://input');
    if ($input = json_decode($input)) {
      return json_encode(iplist2long($input));
    } else {
      throw new BadRequestException("Input format is invalid. Must be JSON.");
    }
  }

  public function fromLongs() {
    $input = file_get_contents('php://input');
    if ($input = json_decode($input)) {
      return json_encode(longlist2ip($input));
    } else {
      throw new BadRequestException("Input format is invalid. Must be JSON.");
    }
  }
}
