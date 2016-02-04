<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DNU extends Model
{
  public static function ListDNU($masa,$nim)
{
  $service = file_get_contents('http://wssrs.internal.ut.ac.id/ws_ut/index_non_pendas_dnu_per_mhs.php?masa='.$masa.'&nim='.$nim);
  $select= json_decode($service,true);
  return $select;
}

}
