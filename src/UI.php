<?php
//////////////////////////////////////////////////////////////////////////////
// AITK介面元件
//////////////////////////////////////////////////////////////////////////////
namespace AITK                                                               ;
//////////////////////////////////////////////////////////////////////////////
class UI                                                                     {
//////////////////////////////////////////////////////////////////////////////
public static function GetPathInfos ( )                                      {
  ////////////////////////////////////////////////////////////////////////////
  if ( ! isset ( $_SERVER['PATH_INFO'] ) ) return array ( )                  ;
  ////////////////////////////////////////////////////////////////////////////
  $PIFS  = explode ( "/" , $_SERVER['PATH_INFO']                           ) ;
  ////////////////////////////////////////////////////////////////////////////
  $ID    = 0                                                                 ;
  $LISTs = array   (                                                       ) ;
  ////////////////////////////////////////////////////////////////////////////
  foreach          ( $PIFS as $p                                           ) {
    if             ( $ID == 0                                              ) {
      if           ( strlen ( $p ) > 0                                     ) {
        array_push ( $LISTs , $p                                           ) ;
      }                                                                      ;
    } else                                                                   {
      array_push   ( $LISTs , $p                                           ) ;
    }                                                                        ;
    $ID  = $ID + 1                                                           ;
  }                                                                          ;
  ////////////////////////////////////////////////////////////////////////////
  return $LISTs                                                              ;
}
//////////////////////////////////////////////////////////////////////////////
public static function SitePath (                                          ) {
  $HTTPS     = "http"                                                        ;
  if                            ( isset ( $_SERVER['HTTPS'] )              ) {
    $H       = $_SERVER['HTTPS']                                             ;
    if                          ( $H == "on"                               ) {
      $HTTPS = "https"                                                       ;
    }                                                                        ;
  }                                                                          ;
  $HOSX      = $_SERVER['HTTP_HOST']                                         ;
  return "{$HTTPS}://{$HOSX}"                                                ;
}
//////////////////////////////////////////////////////////////////////////////
public static function PageInfo ( $MAPS                                    ) {
  ////////////////////////////////////////////////////////////////////////////
  $QSVT            = ""                                                      ;
  if                            ( isset ( $_SERVER['QUERY_STRING'] )       ) {
    $QSVT          = $_SERVER['QUERY_STRING']                                ;
  }                                                                          ;
  ////////////////////////////////////////////////////////////////////////////
  $PIFS            = ""                                                      ;
  if                            ( isset ( $_SERVER['PATH_INFO'] )          ) {
    $PIFS          = $_SERVER['PATH_INFO']                                   ;
    $KKK           = "PathInfo = ''"                                         ;
    $VVV           = "PathInfo = '{$PIFS}'"                                  ;
    $MAPS [ $KKK ] = $VVV                                                    ;
  }                                                                          ;
  ////////////////////////////////////////////////////////////////////////////
  $RURL            = $GLOBALS [ "RootURL" ]                                  ;
  $KJ              = "RequestURL = ''"                                       ;
  $VJ              = "RequestURL = '{$RURL}'"                                ;
  $MAPS [ $KJ ]    = $VJ                                                     ;
  ////////////////////////////////////////////////////////////////////////////
  $PURL            = $RURL                                                   ;
  if ( strlen ( $QSVT ) > 0                                                ) {
    $QXSTR         = "?{$QSVT}"                                              ;
    $IDX           = strrpos     ( $PURL , $QXSTR                          ) ;
    if                           ( $IDX >= 0                               ) {
      $LENX        = strlen      ( $PURL                                   ) ;
      $QLEN        = strlen      ( $QXSTR                                  ) ;
      $PA          = substr      ( $PURL , 0 , $IDX                        ) ;
      $PB          = substr      ( $PURL , $IDX + $QLEN , $LENX - $QLEN    ) ;
      $PURL        = "{$PA}{$PB}"                                            ;
    }                                                                        ;
  }                                                                          ;
  $IDX             = strrpos     ( $RURL , $PIFS                           ) ;
  if                             ( $IDX >= 0                               ) {
    $LENX          = strlen      ( $PURL                                   ) ;
    $QLEN          = strlen      ( $PIFS                                   ) ;
    $PA            = substr      ( $PURL , 0 , $IDX                        ) ;
    $PB            = substr      ( $PURL , $IDX + $QLEN , $LENX - $QLEN    ) ;
    $PURL          = "{$PA}{$PB}"                                            ;
  }                                                                          ;
  $KJ              = "PageURL = ''"                                          ;
  $VJ              = "PageURL = '{$PURL}'"                                   ;
  $MAPS [ $KJ ]    = $VJ                                                     ;
  ////////////////////////////////////////////////////////////////////////////
  $SITE            = self::SitePath ( )                                   ;
  $KJ              = "SitePath = ''"                                         ;
  $VJ              = "SitePath = '{$SITE}'"                                  ;
  $MAPS [ $KJ ]    = $VJ                                                     ;
  ////////////////////////////////////////////////////////////////////////////
  if ( isset ( $_SERVER['PHP_SELF'] )                                      ) {
    $PHPSELF       = $_SERVER['PHP_SELF']                                    ;
    $KKK           = "PageSelf = ''"                                         ;
    $VVV           = "PageSelf = '{$PHPSELF}'"                               ;
    $MAPS [ $KKK ] = $VVV                                                    ;
  }                                                                          ;
  ////////////////////////////////////////////////////////////////////////////
  return $MAPS                                                               ;
}
//////////////////////////////////////////////////////////////////////////////
public static function CallAnyFunction ( $DB , $HH , $AA                   ) {
  ////////////////////////////////////////////////////////////////////////////
  $AA [ "Answer" ] = "No"                                                    ;
  ////////////////////////////////////////////////////////////////////////////
  $FX     = $HH -> Parameter ( "Function"                                  ) ;
  ////////////////////////////////////////////////////////////////////////////
  if                         ( strpos ( $FX , "::" ) !== false             ) {
    $FL   = explode          ( "::" , $FX                                  ) ;
    if                       ( method_exists ( $FL [ 0 ] , $FL [ 1 ] )     ) {
      $AA = $FX              ( $DB , $HH , $AA                             ) ;
    }                                                                        ;
  } else
  ////////////////////////////////////////////////////////////////////////////
  if                         ( strlen ( $FX ) > 0                          ) {
    if                       ( function_exists ( $FX )                     ) {
      $AA = $FX              ( $DB , $HH , $AA                             ) ;
    }                                                                        ;
  }                                                                          ;
  ////////////////////////////////////////////////////////////////////////////
  return $AA                                                                 ;
}
//////////////////////////////////////////////////////////////////////////////
public static function CallAnyMethod ( $DB , $HH , $AA                     ) {
  ////////////////////////////////////////////////////////////////////////////
  $METHOD = $HH -> Parameter         ( "Method"                            ) ;
  ////////////////////////////////////////////////////////////////////////////
  switch                             ( $METHOD                             ) {
    //////////////////////////////////////////////////////////////////////////
    // 動態函數進入點
    //////////////////////////////////////////////////////////////////////////
    case "Function"                                                          :
      ////////////////////////////////////////////////////////////////////////
      $AA = self::CallAnyFunction    ( $DB , $HH , $AA                     ) ;
      ////////////////////////////////////////////////////////////////////////
    break                                                                    ;
    //////////////////////////////////////////////////////////////////////////
    default                                                                  :
      ////////////////////////////////////////////////////////////////////////
      $AA [ "Problem" ] = "No method"                                        ;
      $AA [ "Answer"  ] = "No"                                               ;
      ////////////////////////////////////////////////////////////////////////
    break                                                                    ;
    //////////////////////////////////////////////////////////////////////////
  }                                                                          ;
  ////////////////////////////////////////////////////////////////////////////
  return $AA                                                                 ;
}
//////////////////////////////////////////////////////////////////////////////
public static function RequestHostRPC ( $URL , $HEADERS , $POSTING         ) {
  ////////////////////////////////////////////////////////////////////////////
  $JXON = json_encode ( $POSTING                                           ) ;
  $JLEN = strlen      ( $JXON                                              ) ;
  ////////////////////////////////////////////////////////////////////////////
  $PASS = $HEADERS                                                           ;
  array_push          ( $PASS , "Content-Length: {$JLEN}"                  ) ;
  ////////////////////////////////////////////////////////////////////////////
  $ch   = curl_init   (                                                    ) ;
  curl_setopt         ( $ch , CURLOPT_URL            , $URL                ) ;
  curl_setopt         ( $ch , CURLOPT_CUSTOMREQUEST  , "POST"              ) ;
  curl_setopt         ( $ch , CURLOPT_POSTFIELDS     , $JXON               ) ;
  curl_setopt         ( $ch , CURLOPT_RETURNTRANSFER , true                ) ;
  curl_setopt         ( $ch , CURLOPT_HEADER         , false               ) ;
  curl_setopt         ( $ch , CURLOPT_HTTPHEADER     , $PASS               ) ;
  curl_setopt         ( $ch , CURLOPT_SSL_VERIFYHOST , false               ) ;
  curl_setopt         ( $ch , CURLOPT_SSL_VERIFYPEER , false               ) ;
  $RR  = curl_exec    ( $ch                                                ) ;
         curl_close   ( $ch                                                ) ;
  $RR  = str_replace  ( "'" , '"' , $RR                                    ) ;
  ////////////////////////////////////////////////////////////////////////////
  return json_decode  ( $RR  , true                                        ) ;
}
//////////////////////////////////////////////////////////////////////////////
public static function SendHostRPC      ( $CONF , $CMD , $POSTING          ) {
  ////////////////////////////////////////////////////////////////////////////
  $HOSTNAME = $CONF [ "Hostname" ]                                           ;
  $USERNAME = $CONF [ "Username" ]                                           ;
  $PASSWORD = $CONF [ "Password" ]                                           ;
  ////////////////////////////////////////////////////////////////////////////
  $URL      = "{$HOSTNAME}/{$CMD}"                                           ;
  $HEADERS  = array                                                          (
    "Username: {$USERNAME}"                                                  ,
    "Password: {$PASSWORD}"                                                  ,
    "Content-Type: application/json"                                         ,
    "Accept: application/json"                                               ,
  )                                                                          ;
  ////////////////////////////////////////////////////////////////////////////
  return self::RequestHostRPC           ( $URL , $HEADERS , $POSTING       ) ;
}
//////////////////////////////////////////////////////////////////////////////
public static function ParseRelation ( $PIFs , $AMOUNT = 60                ) {
  ////////////////////////////////////////////////////////////////////////////
  $START    = 1                                                              ;
  ////////////////////////////////////////////////////////////////////////////
  $RELATE   = $PIFs [ 1 ]                                                    ;
  $TYPE     = $PIFs [ 2 ]                                                    ;
  $UUID     = $PIFs [ 3 ]                                                    ;
  ////////////////////////////////////////////////////////////////////////////
  if                                 ( count ( $PIFs ) > 4                 ) {
    $START  = $PIFs [ 4 ]                                                    ;
    $START  = intval                 ( $START            , 10              ) ;
  }                                                                          ;
  ////////////////////////////////////////////////////////////////////////////
  if                                 ( count ( $PIFs ) > 5                 ) {
    $END    = $PIFs [ 5 ]                                                    ;
    $END    = intval                 ( $END              , 10              ) ;
    $DIFF   = intval                 ( $END - $START + 1 , 10              ) ;
    if                               ( $DIFF > 0                           ) {
      $AMOUNT = $DIFF                                                        ;
    }                                                                        ;
  }                                                                          ;
  ////////////////////////////////////////////////////////////////////////////
  $SEARCH   = ""                                                             ;
  if                                 ( count ( $PIFs ) > 6                 ) {
    $SEARCH = $PIFs [ 6 ]                                                    ;
  }                                                                          ;
  ////////////////////////////////////////////////////////////////////////////
  $START    = intval                 ( $START - 1        , 10              ) ;
  ////////////////////////////////////////////////////////////////////////////
  return array                                                               (
    "Relation" => $RELATE                                                    ,
    "Type"     => $TYPE                                                      ,
    "Uuid"     => $UUID                                                      ,
    "Start"    => $START                                                     ,
    "Amount"   => $AMOUNT                                                    ,
    "Search"   => $SEARCH                                                    ,
  )                                                                          ;
}
//////////////////////////////////////////////////////////////////////////////
public static function ExportRelationInformation ( $MAPS                     ,
                                                   $PIFs                     ,
                                                   $AMOUNT = 60            ) {
  ////////////////////////////////////////////////////////////////////////////
  $PARAMS        = self::ParseRelation ( $PIFs , $AMOUNT                   ) ;
  ////////////////////////////////////////////////////////////////////////////
  $RELATE        = $PARAMS             [ "Relation"                        ] ;
  $TYPE          = $PARAMS             [ "Type"                            ] ;
  $UUID          = $PARAMS             [ "Uuid"                            ] ;
  $START         = $PARAMS             [ "Start"                           ] ;
  $AMOUNT        = $PARAMS             [ "Amount"                          ] ;
  ////////////////////////////////////////////////////////////////////////////
  $KKK           = "groupRelation = 1"                                       ;
  $VVV           = "groupRelation = {$RELATE}"                               ;
  $MAPS [ $KKK ] = $VVV                                                      ;
  ////////////////////////////////////////////////////////////////////////////
  $KKK           = "groupType = 158"                                         ;
  $VVV           = "groupType = {$TYPE}"                                     ;
  $MAPS [ $KKK ] = $VVV                                                      ;
  ////////////////////////////////////////////////////////////////////////////
  $KKK           = "groupFirstUuid = ''"                                     ;
  $VVV           = "groupFirstUuid = '{$UUID}'"                              ;
  $MAPS [ $KKK ] = $VVV                                                      ;
  ////////////////////////////////////////////////////////////////////////////
  $KKK           = "groupStart = 0"                                          ;
  $VVV           = "groupStart = {$START}"                                   ;
  $MAPS [ $KKK ] = $VVV                                                      ;
  ////////////////////////////////////////////////////////////////////////////
  $KKK           = "groupAmount = 60"                                        ;
  $VVV           = "groupAmount = {$AMOUNT}"                                 ;
  $MAPS [ $KKK ] = $VVV                                                      ;
  ////////////////////////////////////////////////////////////////////////////
  return $MAPS                                                               ;
}
//////////////////////////////////////////////////////////////////////////////
}
//////////////////////////////////////////////////////////////////////////////
?>
