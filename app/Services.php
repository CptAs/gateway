<?php

namespace App;

class Services
{
  public const MACHINE_IP = '192.168.109.114';
  public const MARKING_LANDMARKS_URL = 'http://' . self::MACHINE_IP . ':8089';
  public const TOURS_PLANNING_URL = 'http://' . self::MACHINE_IP . ':8086';
  public const GUIDED_TOURS_URL = 'http://' . self::MACHINE_IP . ':8085';
}
