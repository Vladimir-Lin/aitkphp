<?php
//////////////////////////////////////////////////////////////////////////////
// AITK頂層網域元件
//////////////////////////////////////////////////////////////////////////////
namespace AITK                                                               ;
//////////////////////////////////////////////////////////////////////////////
class TLD extends Columns                                                    {
//////////////////////////////////////////////////////////////////////////////
// +| Variables |+ Begin - 2020-08-08T06:55:28
//////////////////////////////////////////////////////////////////////////////
public $Id                                                                   ;
public $Uuid                                                                 ;
public $Used                                                                 ;
public $Type                                                                 ;
public $Owner                                                                ;
public $Name                                                                 ;
public $Reverse                                                              ;
public $IANA                                                                 ;
public $Explain                                                              ;
public $SLD                                                                  ;
public $Domains                                                              ;
public $Hosts                                                                ;
public $Pages                                                                ;
public $Update                                                               ;
//////////////////////////////////////////////////////////////////////////////
// -| Variables |- Final - 2020-08-08T06:55:28
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
// +| clear |+ Begin - 2020-08-08T06:22:01
//////////////////////////////////////////////////////////////////////////////
public function clear ( )                                                    {
  $this -> Id      = 0                                                       ;
  $this -> Uuid    = 0                                                       ;
  $this -> Used    = 1                                                       ;
  $this -> Type    = 0                                                       ;
  $this -> Owner   = 0                                                       ;
  $this -> Name    = ""                                                      ;
  $this -> Reverse = ""                                                      ;
  $this -> IANA    = ""                                                      ;
  $this -> Explain = ""                                                      ;
  $this -> SLD     = 0                                                       ;
  $this -> Domains = 0                                                       ;
  $this -> Hosts   = 0                                                       ;
  $this -> Pages   = 0                                                       ;
  $this -> Update  = ""                                                      ;
}
//////////////////////////////////////////////////////////////////////////////
// -| clear |- Final - 2020-08-08T06:22:01
//////////////////////////////////////////////////////////////////////////////
// +| assign |+ Begin - 2020-08-08T06:31:05
//////////////////////////////////////////////////////////////////////////////
public function assign ( $Item )                                             {
  $this -> Id      = $Item -> Id                                             ;
  $this -> Uuid    = $Item -> Uuid                                           ;
  $this -> Used    = $Item -> Used                                           ;
  $this -> Type    = $Item -> Type                                           ;
  $this -> Owner   = $Item -> Owner                                          ;
  $this -> Name    = $Item -> Name                                           ;
  $this -> Reverse = $Item -> Reverse                                        ;
  $this -> IANA    = $Item -> IANA                                           ;
  $this -> Explain = $Item -> Explain                                        ;
  $this -> SLD     = $Item -> SLD                                            ;
  $this -> Domains = $Item -> Domains                                        ;
  $this -> Hosts   = $Item -> Hosts                                          ;
  $this -> Pages   = $Item -> Pages                                          ;
  $this -> Update  = $Item -> Update                                         ;
}
//////////////////////////////////////////////////////////////////////////////
// -| assign |- Final - 2020-08-08T06:31:05
//////////////////////////////////////////////////////////////////////////////
// +| tableItems |+ Begin - 2020-08-08T06:51:13
//////////////////////////////////////////////////////////////////////////////
public function tableItems ( )                                               {
  return                                                                     [
    "id"                                                                     ,
    "uuid"                                                                   ,
    "used"                                                                   ,
    "type"                                                                   ,
    "owner"                                                                  ,
    "name"                                                                   ,
    "reverse"                                                                ,
    "iana"                                                                   ,
    "explain"                                                                ,
    "sld"                                                                    ,
    "domains"                                                                ,
    "hosts"                                                                  ,
    "pages"                                                                  ,
    "ltime"                                                                  ,
  ]                                                                          ;
}
//////////////////////////////////////////////////////////////////////////////
// -| tableItems |- Final - 2020-08-08T06:51:13
//////////////////////////////////////////////////////////////////////////////
// +| JoinItems |+ Begin - 2020-08-08T07:47:23
//////////////////////////////////////////////////////////////////////////////
public function JoinItems ( $X , $S = ","                                  ) {
  ////////////////////////////////////////////////////////////////////////////
  $U = array              (                                                ) ;
  ////////////////////////////////////////////////////////////////////////////
  foreach                 ( $X as $V                                       ) {
    $W = "`{$V}`"                                                            ;
    array_push            ( $U , $W                                        ) ;
  }                                                                          ;
  ////////////////////////////////////////////////////////////////////////////
  $L = implode            ( $S , $U                                        ) ;
  unset                   ( $U                                             ) ;
  ////////////////////////////////////////////////////////////////////////////
  return $L                                                                  ;
}
//////////////////////////////////////////////////////////////////////////////
// -| JoinItems |- Final - 2020-08-08T07:47:23
//////////////////////////////////////////////////////////////////////////////
// +| Items |+ Begin - 2020-08-08T07:47:29
//////////////////////////////////////////////////////////////////////////////
public function Items      ( $S = ","                                      ) {
  $X = $this -> tableItems (                                               ) ;
  $L = $this -> JoinItems  ( $X , $S                                       ) ;
  unset                    ( $X                                            ) ;
  return $L                                                                  ;
}
//////////////////////////////////////////////////////////////////////////////
// -| Items |- Final - 2020-08-08T07:47:29
//////////////////////////////////////////////////////////////////////////////
// +| valueItems |+ Begin - 2020-08-08T06:56:50
//////////////////////////////////////////////////////////////////////////////
public function valueItems ( )                                               {
  return                                                                     [
    "used"                                                                   ,
    "type"                                                                   ,
    "owner"                                                                  ,
    "name"                                                                   ,
    "reverse"                                                                ,
    "iana"                                                                   ,
    "explain"                                                                ,
    "sld"                                                                    ,
    "domains"                                                                ,
    "hosts"                                                                  ,
    "pages"                                                                  ,
  ]                                                                          ;
}
//////////////////////////////////////////////////////////////////////////////
// -| valueItems |- Final - 2020-08-08T06:56:50
//////////////////////////////////////////////////////////////////////////////
// +| set |+ Begin - 2020-08-08T08:02:52
//////////////////////////////////////////////////////////////////////////////
public function set ( $item , $V )                                           {
  ////////////////////////////////////////////////////////////////////////////
  $a   = strtolower ( $item      )                                           ;
  ////////////////////////////////////////////////////////////////////////////
  if ( "id"      == $a ) $this -> Id      = $V                               ;
  if ( "uuid"    == $a ) $this -> Uuid    = $V                               ;
  if ( "used"    == $a ) $this -> Used    = $V                               ;
  if ( "type"    == $a ) $this -> Type    = $V                               ;
  if ( "owner"   == $a ) $this -> Owner   = $V                               ;
  if ( "name"    == $a ) $this -> Name    = $V                               ;
  if ( "reverse" == $a ) $this -> Reverse = $V                               ;
  if ( "iana"    == $a ) $this -> IANA    = $V                               ;
  if ( "explain" == $a ) $this -> Explain = $V                               ;
  if ( "sld"     == $a ) $this -> SLD     = $V                               ;
  if ( "domains" == $a ) $this -> Domains = $V                               ;
  if ( "hosts"   == $a ) $this -> Hosts   = $V                               ;
  if ( "pages"   == $a ) $this -> Pages   = $V                               ;
  if ( "ltime"   == $a ) $this -> Update  = $V                               ;
  ////////////////////////////////////////////////////////////////////////////
}
//////////////////////////////////////////////////////////////////////////////
// -| set |- Final - 2020-08-08T08:02:52
//////////////////////////////////////////////////////////////////////////////
// +| get |+ Begin - 2020-08-08T08:02:56
//////////////////////////////////////////////////////////////////////////////
public function get ( $item )                                                {
  $a = strtolower ( $item )                                                  ;
  if ( "id"      == $a ) return (string) $this -> Id                         ;
  if ( "uuid"    == $a ) return (string) $this -> Uuid                       ;
  if ( "used"    == $a ) return (string) $this -> Used                       ;
  if ( "type"    == $a ) return (string) $this -> Type                       ;
  if ( "owner"   == $a ) return (string) $this -> Owner                      ;
  if ( "name"    == $a ) return (string) $this -> Name                       ;
  if ( "reverse" == $a ) return (string) $this -> Reverse                    ;
  if ( "iana"    == $a ) return (string) $this -> IANA                       ;
  if ( "explain" == $a ) return (string) $this -> Explain                    ;
  if ( "sld"     == $a ) return (string) $this -> SLD                        ;
  if ( "domains" == $a ) return (string) $this -> Domains                    ;
  if ( "hosts"   == $a ) return (string) $this -> Hosts                      ;
  if ( "pages"   == $a ) return (string) $this -> Pages                      ;
  if ( "ltime"   == $a ) return (string) $this -> Update                     ;
  return ""                                                                  ;
}
//////////////////////////////////////////////////////////////////////////////
// -| get |- Final - 2020-08-08T08:02:56
//////////////////////////////////////////////////////////////////////////////
// +| Pair |+ Begin - 2020-08-08T06:57:41
//////////////////////////////////////////////////////////////////////////////
public function Pair ( $item )                                               {
  return "`{$item}` = " . $this -> get ( $item )                             ;
}
//////////////////////////////////////////////////////////////////////////////
// -| Pair |- Final - 2020-08-08T06:57:41
//////////////////////////////////////////////////////////////////////////////
// +| Pairs |+ Begin - 2020-08-08T06:57:47
//////////////////////////////////////////////////////////////////////////////
public function Pairs ( $Items                                             ) {
  $P = array          (                                                    ) ;
  foreach             ( $Items as $item                                    ) {
    array_push        ( $P    , $this -> Pair ( $item )                    ) ;
  }                                                                          ;
  $Q = implode        ( " , " , $P                                         ) ;
  unset               ( $P                                                 ) ;
  return $Q                                                                  ;
}
//////////////////////////////////////////////////////////////////////////////
// -| Pairs |- Final - 2020-08-08T06:57:47
//////////////////////////////////////////////////////////////////////////////
// +| ItemPair |+ Begin - 2020-08-08T08:02:09
//////////////////////////////////////////////////////////////////////////////
public function ItemPair ( $item )                                           {
  $a = strtolower ( $item )                                                  ;
  if ( "id"        == $a )                                                   {
    return "`{$a}` = " . (string) $this -> Id                                ;
  }                                                                          ;
  if ( "uuid"      == $a )                                                   {
    return "`{$a}` = " . (string) $this -> Uuid                              ;
  }                                                                          ;
  if ( "used"      == $a )                                                   {
    return "`{$a}` = " . (string) $this -> Used                              ;
  }                                                                          ;
  if ( "type"      == $a )                                                   {
    return "`{$a}` = " . (string) $this -> Type                              ;
  }                                                                          ;
  if ( "owner"     == $a )                                                   {
    return "`{$a}` = " . (string) $this -> Owner                             ;
  }                                                                          ;
  if ( "name"      == $a )                                                   {
    return "`{$a}` = " . (string) $this -> Name                              ;
  }                                                                          ;
  if ( "reverse"   == $a )                                                   {
    return "`{$a}` = " . (string) $this -> Reverse                           ;
  }                                                                          ;
  if ( "iana"      == $a )                                                   {
    return "`{$a}` = " . (string) $this -> IANA                              ;
  }                                                                          ;
  if ( "explain"   == $a )                                                   {
    return "`{$a}` = " . (string) $this -> Explain                           ;
  }                                                                          ;
  if ( "sld"       == $a )                                                   {
    return "`{$a}` = " . (string) $this -> SLD                               ;
  }                                                                          ;
  if ( "domains"   == $a )                                                   {
    return "`{$a}` = " . (string) $this -> Domains                           ;
  }                                                                          ;
  if ( "hosts"     == $a )                                                   {
    return "`{$a}` = " . (string) $this -> Hosts                             ;
  }                                                                          ;
  if ( "pages"     == $a )                                                   {
    return "`{$a}` = " . (string) $this -> Pages                             ;
  }                                                                          ;
  if ( "ltime"     == $a )                                                   {
    return "`{$a}` = " . (string) $this -> Update                            ;
  }                                                                          ;
  return ""                                          ;
}
//////////////////////////////////////////////////////////////////////////////
// -| ItemPair |- Final - 2020-08-08T08:02:09
//////////////////////////////////////////////////////////////////////////////
// +| obtain |+ Begin - 2020-08-08T06:38:48
//////////////////////////////////////////////////////////////////////////////
public function obtain ( $R )                                                {
  ////////////////////////////////////////////////////////////////////////////
  $this -> Id      = $R [ "id"      ]                                        ;
  $this -> Uuid    = $R [ "uuid"    ]                                        ;
  $this -> Used    = $R [ "used"    ]                                        ;
  $this -> Type    = $R [ "type"    ]                                        ;
  $this -> Owner   = $R [ "owner"   ]                                        ;
  $this -> Name    = $R [ "name"    ]                                        ;
  $this -> Reverse = $R [ "reverse" ]                                        ;
  $this -> IANA    = $R [ "iana"    ]                                        ;
  $this -> Explain = $R [ "explain" ]                                        ;
  $this -> SLD     = $R [ "sld"     ]                                        ;
  $this -> Domains = $R [ "domains" ]                                        ;
  $this -> Hosts   = $R [ "hosts"   ]                                        ;
  $this -> Pages   = $R [ "pages"   ]                                        ;
  $this -> Update  = $R [ "ltime"   ]                                        ;
  ////////////////////////////////////////////////////////////////////////////
}
//////////////////////////////////////////////////////////////////////////////
// -| obtain |- Final - 2020-08-08T06:38:48
//////////////////////////////////////////////////////////////////////////////
// +| ObtainsByUuid |+ Begin - 2020-08-08T06:15:54
//////////////////////////////////////////////////////////////////////////////
public function ObtainsByUuid ( $DB , $TABLE                               ) {
  ////////////////////////////////////////////////////////////////////////////
  $IT = $this -> Items        (                                            ) ;
  $WH = $DB   -> WhereUuid    ( $this -> Uuid , true                       ) ;
  ////////////////////////////////////////////////////////////////////////////
  $QQ = "select {$IT} from {$TABLE} {$WH}"                                   ;
  $qq = $DB   -> Query        ( $QQ                                        ) ;
  ////////////////////////////////////////////////////////////////////////////
  if                          ( $DB -> hasResult ( $qq )                   ) {
    $rr = $qq -> fetch_array  ( MYSQLI_BOTH                                ) ;
    $this     -> obtain       ( $rr                                        ) ;
    return true                                                              ;
  }                                                                          ;
  ////////////////////////////////////////////////////////////////////////////
  return false                                                               ;
}
//////////////////////////////////////////////////////////////////////////////
// -| ObtainsByUuid |- Final - 2020-08-08T06:15:54
//////////////////////////////////////////////////////////////////////////////
// +| isMatch |+
//////////////////////////////////////////////////////////////////////////////
public function isMatch       ( $tld                                       ) {
  $T = strtolower             ( $tld                                       ) ;
  return                      ( $this -> Name == $T                        ) ;
}
//////////////////////////////////////////////////////////////////////////////
// -| isMatch |-
//////////////////////////////////////////////////////////////////////////////
}
//////////////////////////////////////////////////////////////////////////////
?>
