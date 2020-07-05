<?php
//////////////////////////////////////////////////////////////////////////////
// AITK參數設定元件
//////////////////////////////////////////////////////////////////////////////
namespace AITK                                                               ;
//////////////////////////////////////////////////////////////////////////////
class Settings extends Columns                                               {
//////////////////////////////////////////////////////////////////////////////
public $Id                                                                   ;
public $Username                                                             ;
public $Scope                                                                ;
public $Keyword                                                              ;
public $Value                                                                ;
public $Update                                                               ;
//////////////////////////////////////////////////////////////////////////////
function __construct  ( )                                                    {
  parent::__construct ( )                                                    ;
  $this -> clear      ( )                                                    ;
}
//////////////////////////////////////////////////////////////////////////////
function __destruct  ( )                                                     {
  parent::__destruct ( )                                                     ;
}
//////////////////////////////////////////////////////////////////////////////
public function clear ( )                                                    {
  ////////////////////////////////////////////////////////////////////////////
  $this -> Id       = -1                                                     ;
  $this -> Username = ""                                                     ;
  $this -> Scope    = ""                                                     ;
  $this -> Keyword  = ""                                                     ;
  $this -> Value    = ""                                                     ;
  $this -> Update   = ""                                                     ;
  ////////////////////////////////////////////////////////////////////////////
}
//////////////////////////////////////////////////////////////////////////////
public function assign ( $Item )                                             {
  ////////////////////////////////////////////////////////////////////////////
  $this -> Id       = $Item -> Id                                            ;
  $this -> Username = $Item -> Username                                      ;
  $this -> Scope    = $Item -> Scope                                         ;
  $this -> Keyword  = $Item -> Keyword                                       ;
  $this -> Value    = $Item -> Value                                         ;
  $this -> Update   = $Item -> Update                                        ;
  ////////////////////////////////////////////////////////////////////////////
}
//////////////////////////////////////////////////////////////////////////////
public function tableItems ( )                                               {
  return                                                                     [
    "id"                                                                     ,
    "username"                                                               ,
    "scope"                                                                  ,
    "keyword"                                                                ,
    "value"                                                                  ,
    "ltime"                                                                  ,
  ]                                                                          ;
}
//////////////////////////////////////////////////////////////////////////////
public function ItemPair ( $item )                                           {
  ////////////////////////////////////////////////////////////////////////////
  $a = strtolower ( $item )                                                  ;
  if ( "id"       == $a )                                                    {
    return "`{$a}` = " . (string) $this -> Id                                ;
  }                                                                          ;
  if ( "username" == $a )                                                    {
    return "`{$a}` = '" . (string) $this -> Username . "'"                   ;
  }                                                                          ;
  if ( "scope"    == $a )                                                    {
    return "`{$a}` = '" . (string) $this -> Scope    . "'"                   ;
  }                                                                          ;
  if ( "keyword"  == $a )                                                    {
    return "`{$a}` = '" . (string) $this -> Keyword  . "'"                   ;
  }                                                                          ;
  if ( "value"    == $a )                                                    {
    return "`{$a}` = '" . (string) $this -> Value    . "'"                   ;
  }                                                                          ;
  if ( "ltime"    == $a )                                                    {
    return "`{$a}` = " . (string) $this -> Update                            ;
  }                                                                          ;
  ////////////////////////////////////////////////////////////////////////////
  return ""                                                                  ;
}
//////////////////////////////////////////////////////////////////////////////
public function set ( $item , $V )                                           {
  ////////////////////////////////////////////////////////////////////////////
  $a = strtolower ( $item )                                                  ;
  if ( "id"       == $a ) $this -> Id       =          $V                    ;
  if ( "username" == $a ) $this -> Username = (string) $V                    ;
  if ( "scope"    == $a ) $this -> Scope    = (string) $V                    ;
  if ( "keyword"  == $a ) $this -> Keyword  = (string) $V                    ;
  if ( "value"    == $a ) $this -> Value    = (string) $V                    ;
  if ( "ltime"    == $a ) $this -> Update   =          $V                    ;
  ////////////////////////////////////////////////////////////////////////////
}
//////////////////////////////////////////////////////////////////////////////
public function get ( $item )                                                {
  ////////////////////////////////////////////////////////////////////////////
  $a = strtolower ( $item )                                                  ;
  if ( "id"       == $a ) return $this -> Id                                 ;
  if ( "username" == $a ) return $this -> Username                           ;
  if ( "scope"    == $a ) return $this -> Scope                              ;
  if ( "keyword"  == $a ) return $this -> Keyword                            ;
  if ( "value"    == $a ) return $this -> Value                              ;
  if ( "ltime"    == $a ) return $this -> Update                             ;
  ////////////////////////////////////////////////////////////////////////////
  return ""                                                                  ;
}
//////////////////////////////////////////////////////////////////////////////
public function setIndex ( $USERNAME , $SCOPE , $KEYWORD )                   {
  ////////////////////////////////////////////////////////////////////////////
  $this -> Username = (string) $USERNAME                                     ;
  $this -> Scope    = (string) $SCOPE                                        ;
  $this -> Keyword  = (string) $KEYWORD                                      ;
  ////////////////////////////////////////////////////////////////////////////
}
//////////////////////////////////////////////////////////////////////////////
public function setKey ( $KEYWORD )                                          {
  $this -> Keyword  = (string) $KEYWORD                                      ;
}
//////////////////////////////////////////////////////////////////////////////
public function Select      ( $Table                                         ,
                              $Options = "order by `id` asc"                 ,
                              $Limits  = ""                                ) {
  ////////////////////////////////////////////////////////////////////////////
  $L = $this -> tableItems  (                                              ) ;
  $Q = $this -> SelectItems ( $Table , $L , $Options , $Limits             ) ;
  unset                     ( $L                                           ) ;
  ////////////////////////////////////////////////////////////////////////////
  return $Q                                                                  ;
}
//////////////////////////////////////////////////////////////////////////////
public function Obtain ( $R )                                                {
  ////////////////////////////////////////////////////////////////////////////
  $this -> Id       =          $R [ "id"       ]                             ;
  $this -> Username = (string) $R [ "username" ]                             ;
  $this -> Scope    = (string) $R [ "scope"    ]                             ;
  $this -> Keyword  = (string) $R [ "keyword"  ]                             ;
  $this -> Value    =          $R [ "value"    ]                             ;
  $this -> Update   =          $R [ "ltime"    ]                             ;
  ////////////////////////////////////////////////////////////////////////////
}
//////////////////////////////////////////////////////////////////////////////
public function ObtainsId ( $DB , $TABLE , $ID )                             {
  ////////////////////////////////////////////////////////////////////////////
  $QQ = "select `id`,`username`,`scope`,`keyword`,`value`,`ltime` from {$TABLE}" .
        " where `id` = {$ID} ;"                                              ;
  $qq  = $DB -> Query ( $QQ )                                                ;
  if ( $DB -> hasResult ( $qq ) )                                            {
    $rr = $qq -> fetch_array  ( MYSQLI_BOTH )                                ;
    $this -> Obtain ( $rr )                                                  ;
  }                                                                          ;
  ////////////////////////////////////////////////////////////////////////////
  return false                                                               ;
}
//////////////////////////////////////////////////////////////////////////////
public function DeleteId ( $DB , $TABLE , $ID )                              {
  $QQ = "delete from {$TABLE} where `id` = {$ID} ;"                          ;
  return $DB -> Query ( $QQ )                                                ;
}
//////////////////////////////////////////////////////////////////////////////
public function obtainValue ( $DB , $TABLE )                                 {
  ////////////////////////////////////////////////////////////////////////////
  $QQ   = "select `value` from {$TABLE}"                                     .
          " where `username` = ?"                                            .
               " and `scope` = ?"                                            .
             " and `keyword` = ? ;"                                          ;
  $qq   = $DB -> Prepare    ( $QQ                                          ) ;
  $qq  -> bind_param        ( 'sss'                                          ,
                              $this -> Username                              ,
                              $this -> Scope                                 ,
                              $this -> Keyword                             ) ;
  $qq  -> execute           (                                              ) ;
  $kk   = $qq -> get_result (                                              ) ;
  if ( ! $DB -> hasResult ( $kk ) ) return ""                                ;
  $rr   = $kk -> fetch_array ( MYSQLI_BOTH )                                 ;
  ////////////////////////////////////////////////////////////////////////////
  return $rr [ 0 ]                                                           ;
}
//////////////////////////////////////////////////////////////////////////////
public function assureValue ( $DB , $TABLE , $VALUE )                        {
  ////////////////////////////////////////////////////////////////////////////
  $QQ   = "select `id` from {$TABLE}"                                        .
          " where `username` = ?"                                            .
               " and `scope` = ?"                                            .
             " and `keyword` = ? ;"                                          ;
  $qq   = $DB -> Prepare     ( $QQ                                         ) ;
  $qq  -> bind_param         ( 'sss'                                         ,
                               $this -> Username                             ,
                               $this -> Scope                                ,
                               $this -> Keyword                            ) ;
  $qq  -> execute            (                                             ) ;
  $kk   = $qq -> get_result  (                                             ) ;
  if                         ( $DB -> hasResult ( $kk )                    ) {
    $rr = $kk -> fetch_array ( MYSQLI_BOTH                                 ) ;
    $ID = $rr [ 0 ]                                                          ;
    $QQ = "update {$TABLE}"                                                  .
          " set `value` = ?"                                                 .
           " where `id` = {$ID} ;"                                           ;
    $qq  = $DB -> Prepare      ( $QQ                                       ) ;
    $qq -> bind_param          ( 's' , $VALUE                              ) ;
    return $qq -> execute      (                                           ) ;
  } else                                                                     {
    $QQ = "insert into {$TABLE}"                                             .
          " (`username`,`scope`,`keyword`,`value`)"                          .
          " values (?,?,?,?) ;"                                              ;
    $qq   = $DB -> Prepare     ( $QQ                                       ) ;
    $qq  -> bind_param         ( 'ssss'                                      ,
                                 $this -> Username                           ,
                                 $this -> Scope                              ,
                                 $this -> Keyword                            ,
                                 $VALUE                                    ) ;
    return $qq  -> execute     (                                           ) ;
  }                                                                          ;
  ////////////////////////////////////////////////////////////////////////////
}
//////////////////////////////////////////////////////////////////////////////
}
//////////////////////////////////////////////////////////////////////////////
?>
