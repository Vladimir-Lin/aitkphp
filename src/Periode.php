<?php
//////////////////////////////////////////////////////////////////////////////
// AITK時段元件
//////////////////////////////////////////////////////////////////////////////
namespace AITK                                                               ;
//////////////////////////////////////////////////////////////////////////////
class Periode extends Columns                                                {
//////////////////////////////////////////////////////////////////////////////
public $Id                                                                   ;
public $Uuid                                                                 ;
public $Type                                                                 ;
public $Used                                                                 ;
public $Start                                                                ;
public $End                                                                  ;
public $Realm                                                                ;
public $Role                                                                 ;
public $Item                                                                 ;
public $States                                                               ;
public $Creation                                                             ;
public $Modified                                                             ;
public $ltime                                                                ;
public $TermCount                                                            ;
//////////////////////////////////////////////////////////////////////////////
function __construct ( )                                                     {
  $this -> Clear ( )                                                         ;
}
//////////////////////////////////////////////////////////////////////////////
function __destruct ( )                                                      {
}
//////////////////////////////////////////////////////////////////////////////
public function Clear ( )                                                    {
  $this -> Id       = -1                                                     ;
  $this -> Uuid     =  0                                                     ;
  $this -> Type     =  0                                                     ;
  $this -> Used     =  0                                                     ;
  $this -> Start    =  0                                                     ;
  $this -> End      =  0                                                     ;
  $this -> Realm    =  0                                                     ;
  $this -> Role     =  0                                                     ;
  $this -> Item     =  0                                                     ;
  $this -> States   =  0                                                     ;
  $this -> Creation =  0                                                     ;
  $this -> Modified =  0                                                     ;
  $this -> ltime    =  0                                                     ;
}
//////////////////////////////////////////////////////////////////////////////
public function assign ( $Item )                                             {
  $this -> Id        = $Item -> Id                                           ;
  $this -> Uuid      = $Item -> Uuid                                         ;
  $this -> Type      = $Item -> Type                                         ;
  $this -> Used      = $Item -> Used                                         ;
  $this -> Start     = $Item -> Start                                        ;
  $this -> End       = $Item -> End                                          ;
  $this -> Realm     = $Item -> Realm                                        ;
  $this -> Role      = $Item -> Role                                         ;
  $this -> Item      = $Item -> Item                                         ;
  $this -> States    = $Item -> States                                       ;
  $this -> Creation  = $Item -> Creation                                     ;
  $this -> Modified  = $Item -> Modified                                     ;
  $this -> ltime     = $Item -> ltime                                        ;
  $this -> TermCount = $Item -> TermCount                                    ;
}
//////////////////////////////////////////////////////////////////////////////
public function tableItems ( )                                               {
  return [ "id"                                                              ,
           "uuid"                                                            ,
           "type"                                                            ,
           "used"                                                            ,
           "start"                                                           ,
           "end"                                                             ,
           "realm"                                                           ,
           "role"                                                            ,
           "item"                                                            ,
           "states"                                                          ,
           "creation"                                                        ,
           "modified"                                                        ,
           "ltime"                                                         ] ;
}
//////////////////////////////////////////////////////////////////////////////
public function JoinItems ( $X , $S = "," )                                  {
  $U = array ( )                                                             ;
  foreach ( $X as $V )                                                       {
    $W = "`{$V}`"                                                            ;
    array_push ( $U , $W )                                                   ;
  }                                                                          ;
  $L = implode ( $S , $U )                                                   ;
  unset ( $U )                                                               ;
  return $L                                                                  ;
}
//////////////////////////////////////////////////////////////////////////////
public function Items      ( $S = ","                                      ) {
  $X = $this -> tableItems (                                               ) ;
  $L = $this -> JoinItems  ( $X , $S                                       ) ;
  unset                    ( $X                                            ) ;
  return $L                                                                  ;
}
//////////////////////////////////////////////////////////////////////////////
public function valueItems ( )                                               {
  return [ "type"                                                            ,
           "used"                                                            ,
           "start"                                                           ,
           "end"                                                             ,
           "realm"                                                           ,
           "role"                                                            ,
           "item"                                                            ,
           "states"                                                          ,
           "creation"                                                        ,
           "modified"                                                      ] ;
}
//////////////////////////////////////////////////////////////////////////////
public function set ( $item , $V )                                           {
  $a = strtolower ( $item )                                                  ;
  if ( "id"       == $a ) $this -> Id       = $V                             ;
  if ( "uuid"     == $a ) $this -> Uuid     = $V                             ;
  if ( "type"     == $a ) $this -> Type     = $V                             ;
  if ( "used"     == $a ) $this -> Used     = $V                             ;
  if ( "start"    == $a ) $this -> Start    = $V                             ;
  if ( "end"      == $a ) $this -> End      = $V                             ;
  if ( "realm"    == $a ) $this -> Realm    = $V                             ;
  if ( "role"     == $a ) $this -> Role     = $V                             ;
  if ( "item"     == $a ) $this -> Item     = $V                             ;
  if ( "states"   == $a ) $this -> States   = $V                             ;
  if ( "creation" == $a ) $this -> Creation = $V                             ;
  if ( "modified" == $a ) $this -> Modified = $V                             ;
  if ( "ltime"    == $a ) $this -> ltime    = $V                             ;
}
//////////////////////////////////////////////////////////////////////////////
public function get ( $item )                                                {
  $a = strtolower ( $item )                                                  ;
  if ( "id"       == $a ) return (string) $this -> Id                        ;
  if ( "uuid"     == $a ) return (string) $this -> Uuid                      ;
  if ( "type"     == $a ) return (string) $this -> Type                      ;
  if ( "used"     == $a ) return (string) $this -> Used                      ;
  if ( "start"    == $a ) return (string) $this -> Start                     ;
  if ( "end"      == $a ) return (string) $this -> End                       ;
  if ( "realm"    == $a ) return (string) $this -> Realm                     ;
  if ( "role"     == $a ) return (string) $this -> Role                      ;
  if ( "item"     == $a ) return (string) $this -> Item                      ;
  if ( "states"   == $a ) return (string) $this -> States                    ;
  if ( "creation" == $a ) return (string) $this -> Creation                  ;
  if ( "modified" == $a ) return (string) $this -> Modified                  ;
  if ( "ltime"    == $a ) return (string) $this -> ltime                     ;
  return ""                                                                  ;
}
//////////////////////////////////////////////////////////////////////////////
public function Pair ( $item )                                               {
  return "`{$item}` = " . $this -> get ( $item ) ;
}
//////////////////////////////////////////////////////////////////////////////
public function Pairs ( $Items )                                             {
  $P = array ( )                                                             ;
  foreach ( $Items as $item )                                                {
    array_push ( $P , $this -> Pair ( $item ) )                              ;
  }                                                                          ;
  $Q = implode ( " , " , $P )                                                ;
  unset        ( $P         )                                                ;
  return $Q                                                                  ;
}
//////////////////////////////////////////////////////////////////////////////
public function ItemPair ( $item )                                           {
  $a = strtolower        ( $item )                                           ;
  if ( "id"       == $a )                                                    {
    return "`{$a}` = " . (string) $this -> Id                                ;
  }                                                                          ;
  if ( "uuid"     == $a )                                                    {
    return "`{$a}` = " . (string) $this -> Uuid                              ;
  }                                                                          ;
  if ( "type"     == $a )                                                    {
    return "`{$a}` = " . (string) $this -> Type                              ;
  }                                                                          ;
  if ( "used"     == $a )                                                    {
    return "`{$a}` = " . (string) $this -> Used                              ;
  }                                                                          ;
  if ( "start"    == $a )                                                    {
    return "`{$a}` = " . (string) $this -> Start                             ;
  }                                                                          ;
  if ( "end"      == $a )                                                    {
    return "`{$a}` = " . (string) $this -> End                               ;
  }                                                                          ;
  if ( "realm"    == $a )                                                    {
    return "`{$a}` = " . (string) $this -> Realm                             ;
  }                                                                          ;
  if ( "role"     == $a )                                                    {
    return "`{$a}` = " . (string) $this -> Role                              ;
  }                                                                          ;
  if ( "item"     == $a )                                                    {
    return "`{$a}` = " . (string) $this -> Item                              ;
  }                                                                          ;
  if ( "states"   == $a )                                                    {
    return "`{$a}` = " . (string) $this -> States                            ;
  }                                                                          ;
  if ( "creation" == $a )                                                    {
    return "`{$a}` = " . (string) $this -> Creation                          ;
  }                                                                          ;
  if ( "modified" == $a )                                                    {
    return "`{$a}` = " . (string) $this -> Modified                          ;
  }                                                                          ;
  if ( "ltime"    == $a )                                                    {
    return "`{$a}` = " . (string) $this -> ltime                             ;
  }                                                                          ;
  return ""                                                                  ;
}
//////////////////////////////////////////////////////////////////////////////
public function isValid ( )                                                  {
  return ( gmp_cmp ( $this -> Uuid , 0 ) > 0 )                               ;
}
//////////////////////////////////////////////////////////////////////////////
public function toString ( )                                                 {
  return sprintf ( "prd9%08d" , gmp_mod ( $this -> Uuid , 100000000 ) )      ;
}
//////////////////////////////////////////////////////////////////////////////
public function fromString ( $S                                            ) {
  ////////////////////////////////////////////////////////////////////////////
  if                       ( 12 != strlen ( $S )                           ) {
    $this -> Uuid = 0                                                        ;
    return $this -> Uuid                                                     ;
  }                                                                          ;
  ////////////////////////////////////////////////////////////////////////////
  $X       = strtolower    ( $S                                            ) ;
  $C       = substr        ( $X , 0 , 4                                    ) ;
  ////////////////////////////////////////////////////////////////////////////
  if                       ( $C != "prd9"                                  ) {
    $this -> Uuid = 0                                                        ;
    return $this -> Uuid                                                     ;
  }                                                                          ;
  ////////////////////////////////////////////////////////////////////////////
  $C       = substr        ( $S , 0 , 4                                    ) ;
  $U       = str_replace   ( $C , "35000000000" , $S                       ) ;
  ////////////////////////////////////////////////////////////////////////////
  $this   -> Uuid = $U                                                       ;
  ////////////////////////////////////////////////////////////////////////////
  return $this -> Uuid                                                       ;
}
//////////////////////////////////////////////////////////////////////////////
public function setType ( $TYPE )                                            {
  $this -> Type = $TYPE                                                      ;
}
//////////////////////////////////////////////////////////////////////////////
public function setStates ( $STATES )                                        {
  $this -> States = $STATES                                                  ;
}
//////////////////////////////////////////////////////////////////////////////
public function setInterval ( $SECONDS )                                     {
  $this -> End = gmp_add ( $this -> Start , $SECONDS )                       ;
}
//////////////////////////////////////////////////////////////////////////////
public function setNow ( $shrink = false )                                   {
  $SD    = new StarDate (           )                                        ;
  $SD   -> Now          (           )                                        ;
  if                    ( $shrink   )                                        {
    $SD -> ShrinkMinute (           )                                        ;
  }                                                                          ;
  $this -> Start = $SD -> Stardate                                           ;
  $this -> setInterval  ( 86400     )                                        ;
  unset                 ( $SD       )                                        ;
}
//////////////////////////////////////////////////////////////////////////////
public function setStart ( $DATETIME , $TZ = ""                            ) {
  $SD    = new StarDate  (                                                 ) ;
  $SD   -> fromInput     ( $DATETIME , $TZ                                 ) ;
  $this -> Start = $SD -> Stardate                                           ;
  unset                  ( $SD                                             ) ;
}
//////////////////////////////////////////////////////////////////////////////
public function setEnd  ( $DATETIME , $TZ = ""                             ) {
  $SD    = new StarDate (                                                  ) ;
  $SD   -> fromInput    ( $DATETIME , $TZ                                  ) ;
  $this -> End = $SD -> Stardate                                             ;
  unset                 ( $SD                                              ) ;
}
//////////////////////////////////////////////////////////////////////////////
public function setPeriod ( $STARTTIME , $ENDTIME , $TZ = ""               ) {
  $this -> setStart       ( $STARTTIME ,            $TZ                    ) ;
  $this -> setEnd         (              $ENDTIME , $TZ                    ) ;
}
//////////////////////////////////////////////////////////////////////////////
public function isCorrect ( )                                                {
  return ( gmp_cmp ( $this -> End , $this -> Start ) > 0 )                   ;
}
//////////////////////////////////////////////////////////////////////////////
public function TimeItem ( $item , $TZ )                                     {
  $ZZ = "0"                                                                  ;
  $a = strtolower ( $item )                                                  ;
  if ( "start" == $a ) $ZZ = $this -> Start                                  ;
  if ( "end"   == $a ) $ZZ = $this -> End                                    ;
  if ( strlen  ( $ZZ       ) <= 0 ) return false                             ;
  if ( gmp_cmp ( $ZZ , "0" ) <= 0 ) return false                             ;
  $SD             = new StarDate      (     )                                ;
  $SD -> Stardate = $ZZ                                                      ;
  $DD             = $SD -> toDateTime ( $TZ )                                ;
  unset                               ( $SD )                                ;
  return $DD                                                                 ;
}
//////////////////////////////////////////////////////////////////////////////
public function TimeFormat ( $fmt , $item , $TZ                            ) {
  $DD = $this -> TimeItem  ( $item , $TZ                                   ) ;
  if ( ! $DD ) return ""                                                     ;
  $FMT = $DD  -> format    ( $fmt                                          ) ;
  unset                    ( $DD                                           ) ;
  return $FMT                                                                ;
}
//////////////////////////////////////////////////////////////////////////////
public function toTimeString ( $TZ                                           ,
                               $item                                         ,
                               $JOIN       = "T"                             ,
                               $DateFormat = "Y-m-d"                         ,
                               $TimeFormat = "H:i:s"                       ) {
  $ZZ = "0"                                                                  ;
  $a = strtolower ( $item )                                                  ;
  if ( "start" == $a ) $ZZ = $this -> Start                                  ;
  if ( "end"   == $a ) $ZZ = $this -> End                                    ;
  if ( strlen  ( $ZZ       ) <= 0 ) return false                             ;
  if ( gmp_cmp ( $ZZ , "0" ) <= 0 ) return false                             ;
  $SD  = new StarDate ( )                                                    ;
  $SD -> Stardate = $ZZ                                                      ;
  $SS  = $SD -> toDateTimeString ( $TZ , $JOIN , $DateFormat , $TimeFormat ) ;
  unset ( $SD )                                                              ;
  return $SS                                                                 ;
}
//////////////////////////////////////////////////////////////////////////////
public function toLongString            ( $TZ                                ,
                                          $item                              ,
                                          $DateFormat = "Y-m-d"              ,
                                          $TimeFormat = "H:i:s"            ) {
  $ZZ = "0"                                                                  ;
  $a = strtolower ( $item )                                                  ;
  if ( "start" == $a ) $ZZ = $this -> Start                                  ;
  if ( "end"   == $a ) $ZZ = $this -> End                                    ;
  if ( strlen  ( $ZZ       ) <= 0 ) return false                             ;
  if ( gmp_cmp ( $ZZ , "0" ) <= 0 ) return false                             ;
  $SD  = new StarDate ( )                                                    ;
  $SD -> Stardate = $ZZ                                                      ;
  $SS  = $SD -> toLongString ( $TZ , $DateFormat , $TimeFormat )             ;
  unset ( $SD )                                                              ;
  return $SS                                                                 ;
}
//////////////////////////////////////////////////////////////////////////////
public function toDateString            ( $TZ                                ,
                                          $item                              ,
                                          $DateFormat = "Y-m-d"            ) {
  $ZZ = "0"                                                                  ;
  $a = strtolower ( $item )                                                  ;
  if ( "start" == $a ) $ZZ = $this -> Start                                  ;
  if ( "end"   == $a ) $ZZ = $this -> End                                    ;
  if ( strlen  ( $ZZ       ) <= 0 ) return false                             ;
  if ( gmp_cmp ( $ZZ , "0" ) <= 0 ) return false                             ;
  $SD  = new StarDate ( )                                                    ;
  $SD -> Stardate = $ZZ                                                      ;
  $SS  = $SD -> toDateString ( $TZ , $DateFormat )                           ;
  unset ( $SD )                                                              ;
  return $SS                                                                 ;
}
//////////////////////////////////////////////////////////////////////////////
public function toDuration ( )                                               {
  $DT  = gmp_sub ( $this -> End , $this -> Start )                           ;
  $HH  = intval  ( $DT / 3600   , 10             )                           ;
  $DT  = gmp_sub ( $DT          , $HH * 3600     )                           ;
  $MM  = intval  ( $DT /   60   , 10             )                           ;
  $DT  = gmp_sub ( $DT          , $MM *   60     )                           ;
  $DT  = intval  ( $DT          , 10             )                           ;
  if ( $MM < 10 ) $MM = "0{$MM}"                                             ;
  if ( $DT < 10 ) $DT = "0{$DT}"                                             ;
  if             ( $HH > 0                       )                           {
    $DS = "{$HH}:{$MM}:{$DT}"                                                ;
  } else                                                                     {
    $DS = "{$MM}:{$DT}"                                                      ;
  }                                                                          ;
  return $DS                                                                 ;
}
//////////////////////////////////////////////////////////////////////////////
public function obtain ( $R )                                                {
  $this -> Id       = $R [ "id"       ]                                      ;
  $this -> Uuid     = $R [ "uuid"     ]                                      ;
  $this -> Type     = $R [ "type"     ]                                      ;
  $this -> Used     = $R [ "used"     ]                                      ;
  $this -> Start    = $R [ "start"    ]                                      ;
  $this -> End      = $R [ "end"      ]                                      ;
  $this -> Realm    = $R [ "realm"    ]                                      ;
  $this -> Role     = $R [ "role"     ]                                      ;
  $this -> Item     = $R [ "item"     ]                                      ;
  $this -> States   = $R [ "states"   ]                                      ;
  $this -> Creation = $R [ "creation" ]                                      ;
  $this -> Modified = $R [ "modified" ]                                      ;
  $this -> ltime    = $R [ "ltime"    ]                                      ;
}
//////////////////////////////////////////////////////////////////////////////
public function GetUuid ( $DB , $Table )                                     {
  $BASE         = "3500000000000000000"                                      ;
  $this -> Uuid = $DB -> LastUuid ( $Table , "uuid" , $BASE )                ;
  if ( gmp_cmp ( $this -> Uuid , "0" ) <= 0 ) return false                   ;
  $DB -> AddUuid ( $Table , $this -> Uuid , $this -> Type )                  ;
  return $this -> Uuid                                                       ;
}
//////////////////////////////////////////////////////////////////////////////
public function UpdateItems ( $DB , $TABLE , $ITEMS )                        {
  $QQ    = "update " . $TABLE . " set " . $this -> Pairs ( $ITEMS )          .
           $DB -> WhereUuid ( $this -> Uuid , true )                         ;
  return $DB -> Query ( $QQ )                                                ;
}
//////////////////////////////////////////////////////////////////////////////
public function UpdateColumns ( $DB , $TABLE )                               {
  $ITEMS = $this -> valueItems ( )                                           ;
  $QQ    = "update " . $TABLE . " set " . $this -> Pairs ( $ITEMS )          .
           $DB -> WhereUuid ( $this -> Uuid , true )                         ;
  unset ( $ITEMS )                                                           ;
  return $DB -> Query ( $QQ )                                                ;
}
//////////////////////////////////////////////////////////////////////////////
public function ObtainsByUuid ( $DB , $TABLE )                               {
  $IT = $this -> Items   (                      )                            ;
  $WH = $DB -> WhereUuid ( $this -> Uuid , true )                            ;
  $QQ = "select {$IT} from {$TABLE} {$WH}"                                   ;
  $qq = $DB -> Query ( $QQ )                                                 ;
  if ( $DB -> hasResult ( $qq ) )                                            {
    $rr = $qq -> fetch_array ( MYSQLI_BOTH )                                 ;
    $this     -> obtain      ( $rr         )                                 ;
    return true                                                              ;
  }                                                                          ;
  return false                                                               ;
}
//////////////////////////////////////////////////////////////////////////////
}
//////////////////////////////////////////////////////////////////////////////
?>
