<?php
//////////////////////////////////////////////////////////////////////////////
// AITK維基專用元件
//////////////////////////////////////////////////////////////////////////////
namespace AITK                                                               ;
//////////////////////////////////////////////////////////////////////////////
class Wiki                                                                   {
//////////////////////////////////////////////////////////////////////////////
// 產生亂數
//////////////////////////////////////////////////////////////////////////////
public static function RandomString ( $PREFIX , $LENGTH                    ) {
  ////////////////////////////////////////////////////////////////////////////
  $L      = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz" ;
  $S      = $PREFIX                                                          ;
  ////////////////////////////////////////////////////////////////////////////
  while                             ( strlen ( $S ) < $LENGTH              ) {
    //////////////////////////////////////////////////////////////////////////
    $I    = rand                    ( 0  , 61                              ) ;
    $T    = substr                  ( $L , $I , 1                          ) ;
    $S    = "{$S}{$T}"                                                       ;
    //////////////////////////////////////////////////////////////////////////
  }                                                                          ;
  ////////////////////////////////////////////////////////////////////////////
  return $S                                                                  ;
}
//////////////////////////////////////////////////////////////////////////////
// 取得關鍵字內容
//////////////////////////////////////////////////////////////////////////////
public static function GetTag ( $KEY , $TAGs                               ) {
  ////////////////////////////////////////////////////////////////////////////
  $K     = array_keys         ( $TAGs                                      ) ;
  $M     = strtolower         ( $KEY                                       ) ;
  foreach                     ( $K as $L                                   ) {
    $S   = strtolower         ( $L                                         ) ;
    if                        ( $S == $M                                   ) {
      return $TAGs [ $L ]                                                    ;
    }                                                                        ;
  }                                                                          ;
  ////////////////////////////////////////////////////////////////////////////
  return ""                                                                  ;
}
//////////////////////////////////////////////////////////////////////////////
// 取得函數
//////////////////////////////////////////////////////////////////////////////
public static function GetFunction ( $argv , $Maps                         ) {
  ////////////////////////////////////////////////////////////////////////////
  $func = self::GetTag             ( "function" , $argv                    ) ;
  if                               ( strlen ( $func ) <= 0                 ) {
    return ""                                                                ;
  }                                                                          ;
  ////////////////////////////////////////////////////////////////////////////
  if                               ( ! array_key_exists ( $func , $Maps )  ) {
    return ""                                                                ;
  }                                                                          ;
  ////////////////////////////////////////////////////////////////////////////
  return $Maps [ $func ]                                                     ;
}
//////////////////////////////////////////////////////////////////////////////
// 錯誤參數
//////////////////////////////////////////////////////////////////////////////
public static function GetVariables ( $args , $argv , $Options             ) {
  ////////////////////////////////////////////////////////////////////////////
  if                                ( $args < 2                            ) {
    return ""                                                                ;
  }                                                                          ;
  ////////////////////////////////////////////////////////////////////////////
  $KEY         = $argv [ 1 ]                                                 ;
  $KEY         = strtolower         ( $KEY                                 ) ;
  ////////////////////////////////////////////////////////////////////////////
  switch                            ( $KEY                                 ) {
    //////////////////////////////////////////////////////////////////////////
    case "options"                                                           :
    return json_encode              ( $Options                             ) ;
    //////////////////////////////////////////////////////////////////////////
    case "site"                                                              :
      $IDX     = 2                                                           ;
      $OPT     = $Options                                                    ;
      while                         ( $IDX < $args                         ) {
        $K     = $argv [ $IDX ]                                              ;
        if                          ( is_array ( $OPT )                    ) {
          if                        ( ! array_key_exists ( $K , $OPT )     ) {
            return ""                                                        ;
          }                                                                  ;
        } else                                                               {
          return ""                                                          ;
        }                                                                    ;
        $OPT   = $OPT [ $K ]                                                 ;
        $IDX   = $IDX + 1                                                    ;
      }                                                                      ;
      if                            ( is_array ( $OPT )                    ) {
        return json_encode          ( $OPT                                 ) ;
      }                                                                      ;
    return $OPT                                                              ;
    //////////////////////////////////////////////////////////////////////////
  }                                                                          ;
  ////////////////////////////////////////////////////////////////////////////
  return ""                                                                  ;
}
//////////////////////////////////////////////////////////////////////////////
// 錯誤參數
//////////////////////////////////////////////////////////////////////////////
public static function InvalidOptions ( $argv , $Content , $Options        ) {
  ////////////////////////////////////////////////////////////////////////////
  $JSOX = json_encode                 ( $argv                              ) ;
  return "Invalid parameters : [ {$JSOX} ] - | {$Content} |"                 ;
}
//////////////////////////////////////////////////////////////////////////////
// 取得資料庫
//////////////////////////////////////////////////////////////////////////////
public static function GetCurrentDB  ( $argv , $Options                    ) {
  ////////////////////////////////////////////////////////////////////////////
  $DB          = $Options            [ "Database"                          ] ;
  $Databases   = $Options            [ "Databases"                         ] ;
  ////////////////////////////////////////////////////////////////////////////
  $DBN         = self::GetTag        ( "database" , $argv                  ) ;
  if                                 ( strlen ( $DBN ) > 0                 ) {
    if ( array_key_exists ( $DBN , $Databases )                            ) {
      $DB      = $Databases          [ $DBN                                ] ;
    }                                                                        ;
  }                                                                          ;
  ////////////////////////////////////////////////////////////////////////////
  return $DB                                                                 ;
}
//////////////////////////////////////////////////////////////////////////////
// 取得資料庫表格名稱
//////////////////////////////////////////////////////////////////////////////
public static function GetAssignTable ( $DefaultTable , $argv , $Options   ) {
  ////////////////////////////////////////////////////////////////////////////
  $TAB   = $DefaultTable                                                     ;
  ////////////////////////////////////////////////////////////////////////////
  $TBN   = self::GetTag               ( "table" , $argv                    ) ;
  if                                  ( strlen ( $TBN ) > 0                ) {
    $TAB = $TBN                                                              ;
  }                                                                          ;
  ////////////////////////////////////////////////////////////////////////////
  return $TAB                                                                ;
}
//////////////////////////////////////////////////////////////////////////////
// 輸出XML
//////////////////////////////////////////////////////////////////////////////
public static function ExportXML  ( $argv , $Content , $Options            ) {
  ////////////////////////////////////////////////////////////////////////////
  return $Content                                                            ;
  ////////////////////////////////////////////////////////////////////////////
}
//////////////////////////////////////////////////////////////////////////////
// 輸出HTML
//////////////////////////////////////////////////////////////////////////////
public static function ExportHTML ( $argv , $Content , $Options            ) {
  ////////////////////////////////////////////////////////////////////////////
  $TAG          = ""                                                         ;
  $PARAMETERS   = ""                                                         ;
  $NOTAIL       = 0                                                          ;
  ////////////////////////////////////////////////////////////////////////////
  $C            = array           (                                        ) ;
  $K            = array_keys      ( $argv                                  ) ;
  ////////////////////////////////////////////////////////////////////////////
  foreach                         ( $K as $L                               ) {
    $S          = strtolower      ( $L                                     ) ;
    if                            ( $S == "function"                       ) {
    } else
    if                            ( $S == "tag"                            ) {
      $TAG      = $argv [ $L ]                                               ;
    } else
    if                            ( $S == "notail"                         ) {
      $V        = $argv [ $L ]                                               ;
      if                          ( strlen ( $V ) <= 0                     ) {
        $NOTAIL = 1                                                          ;
      } else                                                                 {
        $NOTAIL = $V                                                         ;
      }                                                                      ;
    } else                                                                   {
      $V        = $argv [ $L ]                                               ;
      $P        = "{$L}=\"{$V}\""                                            ;
      array_push                  ( $C , $P                                ) ;
    }                                                                        ;
  }                                                                          ;
  ////////////////////////////////////////////////////////////////////////////
  if                              ( count ( $C ) > 0                       ) {
    $PARAMETERS = implode         ( " " , $C                               ) ;
  }                                                                          ;
  ////////////////////////////////////////////////////////////////////////////
  if                              ( strlen ( $TAG ) <= 0                   ) {
    return ""                                                                ;
  }                                                                          ;
  ////////////////////////////////////////////////////////////////////////////
  if                              ( $NOTAIL > 0                            ) {
    return "<{$TAG} {$PARAMETERS} />"                                        ;
  }                                                                          ;
  ////////////////////////////////////////////////////////////////////////////
  return   "<{$TAG} {$PARAMETERS}>{$Content}</{$TAG}>"                       ;
  ////////////////////////////////////////////////////////////////////////////
}
//////////////////////////////////////////////////////////////////////////////
// 輸出JSON
//////////////////////////////////////////////////////////////////////////////
public static function ExportJSON ( $argv , $Content , $Options            ) {
  ////////////////////////////////////////////////////////////////////////////
  return json_encode              ( $argv                                  ) ;
  ////////////////////////////////////////////////////////////////////////////
}
//////////////////////////////////////////////////////////////////////////////
// 輸出設定值
//////////////////////////////////////////////////////////////////////////////
public static function ExportOptions ( $argv , $Content , $Options         ) {
  ////////////////////////////////////////////////////////////////////////////
  return json_encode                 ( $Options                            ) ;
  ////////////////////////////////////////////////////////////////////////////
}
//////////////////////////////////////////////////////////////////////////////
// 引入模組
//////////////////////////////////////////////////////////////////////////////
public static function IncludeModule ( $argv , $Content , $Options         ) {
  ////////////////////////////////////////////////////////////////////////////
  $Module   = self::GetTag           ( "name"   , $argv                    ) ;
  if ( ! array_key_exists ( "Modules" , $Options )                         ) {
    return ""                                                                ;
  }                                                                          ;
  ////////////////////////////////////////////////////////////////////////////
  $LOCALE   = self::GetTag           ( "locale" , $argv                    ) ;
  if                                 ( strlen ( $LOCALE ) <= 0             ) {
    $LOCALE = "zh_TW"                                                        ;
  }                                                                          ;
  ////////////////////////////////////////////////////////////////////////////
  $PATHs  = $Options [ "Modules" ]                                           ;
  if ( ! array_key_exists ( $Module , $PATHs )                             ) {
    return ""                                                                ;
  }                                                                          ;
  ////////////////////////////////////////////////////////////////////////////
  $EXTENSION = $Options [ "AITK"      ]                                      ;
  $PATHX     = $Options [ "Extension" ]                                      ;
  $FILENAME  = $PATHs   [ $Module     ]                                      ;
  $FILENAME  = "{$PATHX}/{$FILENAME}"                                        ;
  ////////////////////////////////////////////////////////////////////////////
  $MAPS [ "$(EXTENSION-PATH)"   ] = $EXTENSION                               ;
  $MAPS [ "$(EXTENSION-LOCALE)" ] = $LOCALE                                  ;
  ////////////////////////////////////////////////////////////////////////////
  return Strings::ReplaceFileByKeys  ( $FILENAME , $MAPS                   ) ;
}
//////////////////////////////////////////////////////////////////////////////
// 檔案編輯器
//////////////////////////////////////////////////////////////////////////////
public static function FileEditorUI  ( $argv , $Content , $Options         ) {
  ////////////////////////////////////////////////////////////////////////////
  $Id          = self::GetTag        ( "id"        , $argv                 ) ;
  $Filename    = self::GetTag        ( "filename"  , $argv                 ) ;
  $Directory   = self::GetTag        ( "directory" , $argv                 ) ;
  $Original    = $Filename                                                   ;
  $Label       = "Update"                                                    ;
  ////////////////////////////////////////////////////////////////////////////
  $Templates   = $Options            [ "Templates"                         ] ;
  $DIRs        = $Options            [ "Directory"                         ] ;
  ////////////////////////////////////////////////////////////////////////////
  if ( ! array_key_exists ( $Directory , $DIRs ) )                           {
    $Directory = "Default"                                                   ;
  }                                                                          ;
  ////////////////////////////////////////////////////////////////////////////
  $DIRPATH     = $DIRs               [ $Directory                          ] ;
  $LOCALFILE   = "{$DIRPATH}/{$Filename}"                                    ;
  ////////////////////////////////////////////////////////////////////////////
  if                                 ( strlen ( $Content ) > 0             ) {
    $Original  = $Content                                                    ;
  }                                                                          ;
  ////////////////////////////////////////////////////////////////////////////
  if                                 ( strlen ( $Id ) <= 0                 ) {
    $Id        = self::RandomString  ( "File-" , 24                        ) ;
  }                                                                          ;
  ////////////////////////////////////////////////////////////////////////////
  $EXTENSION   = $Options            [ "AITK"                              ] ;
  $PATHX       = $Options            [ "Extension"                         ] ;
  $TEMPLFILE   = $Templates          [ "File::Editor"                      ] ;
  $TEMPLFILE   = "{$PATHX}/{$TEMPLFILE}"                                     ;
  ////////////////////////////////////////////////////////////////////////////
  $PARAMETERS  = array               (                                     ) ;
  $KEYs        = array_keys          ( $argv                               ) ;
  ////////////////////////////////////////////////////////////////////////////
  foreach                            ( $KEYs as $K                         ) {
    //////////////////////////////////////////////////////////////////////////
    $S         = strtolower          ( $K                                  ) ;
    //////////////////////////////////////////////////////////////////////////
    switch                           ( $S                                  ) {
      case "function"                                                        :
      case "id"                                                              :
      case "filename"                                                        :
      case "directory"                                                       :
      break                                                                  ;
      case "label"                                                           :
        $Label = self::GetTag        ( $K , $argv                          ) ;
      break                                                                  ;
      default                                                                :
        $V     = self::GetTag        ( $K , $argv                          ) ;
        array_push                   ( $PARAMETERS , "{$K}='{$V}'"         ) ;
      break                                                                  ;
    }                                                                        ;
    //////////////////////////////////////////////////////////////////////////
  }                                                                          ;
  ////////////////////////////////////////////////////////////////////////////
  $PARMS       = ""                                                          ;
  if                                 ( count ( $PARAMETERS ) > 0           ) {
    $PARMS     = implode             ( " " , $PARAMETERS                   ) ;
  }                                                                          ;
  ////////////////////////////////////////////////////////////////////////////
  $MAPS        = array                                                       (
    "$(EDITOR-ID)"           =>   $Id                                        ,
    "$(BUTTON-LABEL)"        =>   $Label                                     ,
    "$(EDITOR-LABEL)"        =>   $Original                                  ,
    "$(EDITOR-PARAMETERS)"   =>   $PARMS                                     ,
    "$(EDITOR-DIRECTORY)"    =>   $Directory                                 ,
    "$(EDITOR-PATH)"         =>   $DIRPATH                                   ,
    "$(EDITOR-FILENAME)"     =>   $Filename                                  ,
    "$(EDITOR-LOCALFILE)"    =>   $LOCALFILE                                 ,
  )                                                                          ;
  ////////////////////////////////////////////////////////////////////////////
  return Strings::ReplaceFileByKeys  ( $TEMPLFILE , $MAPS                  ) ;
}
//////////////////////////////////////////////////////////////////////////////
// 參數設定編輯器
//////////////////////////////////////////////////////////////////////////////
public static function SettingsEditorDB   ( $DB                              ,
                                            $argv                            ,
                                            $Content                         ,
                                            $Options                       ) {
  ////////////////////////////////////////////////////////////////////////////
  $ID          = self::GetTag             ( "id"       , $argv             ) ;
  if                                      ( strlen ( $ID ) <= 0            ) {
    $ID        = self::RandomString       ( "SettingsEditor-"  , 40        ) ;
  }                                                                          ;
  ////////////////////////////////////////////////////////////////////////////
  $PICKDB      = self::GetTag             ( "database" , $argv             ) ;
  $Edit        = self::GetTag             ( "editable" , $argv             ) ;
  $SEZTAB      = self::GetAssignTable     ( "`settings`"                     ,
                                            $argv                            ,
                                            $Options                       ) ;
  ////////////////////////////////////////////////////////////////////////////
  $Templates   = $Options                 [ "Templates"                    ] ;
  $EXTENSION   = $Options                 [ "AITK"                         ] ;
  $PATHX       = $Options                 [ "Extension"                    ] ;
  $TEMPLFILE   = $Templates               [ "Settings::Editor"             ] ;
  $TEMPLFILE   = "{$PATHX}/{$TEMPLFILE}"                                     ;
  ////////////////////////////////////////////////////////////////////////////
  $ITEMFILE    = $Templates               [ "Settings::Item"               ] ;
  $ITEMFILE    = "{$PATHX}/{$ITEMFILE}"                                      ;
  $TEMPL       = file_get_contents        ( $ITEMFILE                      ) ;
  ////////////////////////////////////////////////////////////////////////////
  $Edit        = strtolower               ( $Edit                          ) ;
  $EDITX       = true                                                        ;
  $Editing     =                          [ "false" , "no" ,"0"            ] ;
  if                                      ( in_array ( $Edit , $Editing )  ) {
    $EDITX     = false                                                       ;
  }                                                                          ;
  ////////////////////////////////////////////////////////////////////////////
  if                                      ( $EDITX                         ) {
    $EDITABLE  = ""                                                          ;
    $READONLY  = "display: none;"                                            ;
  } else                                                                     {
    $EDITABLE  = "display: none;"                                            ;
    $READONLY  = ""                                                          ;
  }                                                                          ;
  ////////////////////////////////////////////////////////////////////////////
  $ITEMS       = array                    (                                ) ;
  ////////////////////////////////////////////////////////////////////////////
  $QQ          = "select `id`,`username`,`scope`,`keyword`,`value`"          .
                 " from {$SEZTAB} order by `id` asc ;"                       ;
  $qq          = $DB -> Query             ( $QQ                            ) ;
  if                                      ( $DB -> hasResult ( $qq )       ) {
    while ( $rr = $qq -> fetch_array ( MYSQLI_BOTH )                       ) {
      $MAPX    = array                                                       (
        "$(EXTENSION-PATH)"      =>   $EXTENSION                             ,
        "$(SETTINGS-EDITOR-ID)"  =>   $ID                                    ,
        "$(SETTINGS-DB)"         =>   $PICKDB                                ,
        "$(SETTINGS-TABLE)"      =>   $SEZTAB                                ,
        "$(SETTINGS-EDIT)"       =>   $Edit                                  ,
        "$(SETTINGS-EDITABLE)"   =>   $EDITABLE                              ,
        "$(SETTINGS-READONLY)"   =>   $READONLY                              ,
        "$(SETTING-ITEM-ID)"     =>   $rr [ 0 ]                              ,
        "$(SETTINGS-USERNAME)"   =>   $rr [ 1 ]                              ,
        "$(SETTINGS-SCOPE)"      =>   $rr [ 2 ]                              ,
        "$(SETTINGS-KEYWORD)"    =>   $rr [ 3 ]                              ,
        "$(SETTINGS-VALUE)"      =>   $rr [ 4 ]                              ,
      )                                                                      ;
      $HTML    = Strings::ReplaceByKeys   ( $TEMPL , $MAPX                 ) ;
      array_push                          ( $ITEMS , $HTML                 ) ;
    }                                                                        ;
  }                                                                          ;
  ////////////////////////////////////////////////////////////////////////////
  $ITEMX       = implode                  ( "" , $ITEMS                    ) ;
  ////////////////////////////////////////////////////////////////////////////
  $MAPS        = array                                                       (
    "$(EXTENSION-PATH)"      =>   $EXTENSION                                 ,
    "$(SETTINGS-EDITOR-ID)"  =>   $ID                                        ,
    "$(SETTINGS-DB)"         =>   $PICKDB                                    ,
    "$(SETTINGS-TABLE)"      =>   $SEZTAB                                    ,
    "$(SETTINGS-EDIT)"       =>   $Edit                                      ,
    "$(SETTINGS-EDITABLE)"   =>   $EDITABLE                                  ,
    "$(SETTINGS-READONLY)"   =>   $READONLY                                  ,
    "$(SETTINGS-ITEMS)"      =>   $ITEMX                                     ,
  )                                                                          ;
  ////////////////////////////////////////////////////////////////////////////
  $HTML = Strings::ReplaceFileByKeys      ( $TEMPLFILE , $MAPS             ) ;
  return array                                                               (
    "HTML"     => $HTML                                                      ,
    "Complete" => "<div id='{$ID}'>{$HTML}</div>"                            ,
  )                                                                          ;
}
//////////////////////////////////////////////////////////////////////////////
// 參數設定編輯器
//////////////////////////////////////////////////////////////////////////////
public static function SettingsEditor ( $argv , $Content , $Options        ) {
  ////////////////////////////////////////////////////////////////////////////
  $HOST  = self::GetCurrentDB         ( $argv , $Options                   ) ;
  ////////////////////////////////////////////////////////////////////////////
  $DBX         = new DB               (                                    ) ;
  if                                  ( ! $DBX -> Connect ( $HOST )        ) {
    return $DBX -> ConnectionError    (                                    ) ;
  }                                                                          ;
  ////////////////////////////////////////////////////////////////////////////
  $HTML  = self::SettingsEditorDB     ( $DBX                                 ,
                                        $argv                                ,
                                        $Content                             ,
                                        $Options                           ) ;
  ////////////////////////////////////////////////////////////////////////////
  $DBX  -> Close                      (                                    ) ;
  ////////////////////////////////////////////////////////////////////////////
  return $HTML [ "Complete" ]                                                ;
}
//////////////////////////////////////////////////////////////////////////////
// CheckBox參數設定編輯器
//////////////////////////////////////////////////////////////////////////////
public static function SettingsCheckBox   ( $argv , $Content , $Options    ) {
  ////////////////////////////////////////////////////////////////////////////
  $ID          = self::RandomString       ( "Input-" , 24                  ) ;
  $PICKDB      = self::GetTag             ( "database" , $argv             ) ;
  $HOST        = self::GetCurrentDB       ( $argv , $Options               ) ;
  $SEZTAB      = self::GetAssignTable     ( "`settings`"                     ,
                                            $argv                            ,
                                            $Options                       ) ;
  $TEMPID      = "Settings::CheckBox"                                        ;
  ////////////////////////////////////////////////////////////////////////////
  $SETS        = new Settings             (                                ) ;
  ////////////////////////////////////////////////////////////////////////////
  $Templates   = $Options                 [ "Templates"                    ] ;
  $EXTENSION   = $Options                 [ "AITK"                         ] ;
  $PATHX       = $Options                 [ "Extension"                    ] ;
  $TEMPLFILE   = $Templates               [ $TEMPID                        ] ;
  $TEMPLFILE   = "{$PATHX}/{$TEMPLFILE}"                                     ;
  ////////////////////////////////////////////////////////////////////////////
  $USERNAME    = ""                                                          ;
  $SCOPEX      = ""                                                          ;
  $KEYWORD     = ""                                                          ;
  ////////////////////////////////////////////////////////////////////////////
  $PARAMETERS  = array                    (                                ) ;
  $KEYs        = array_keys               ( $argv                          ) ;
  ////////////////////////////////////////////////////////////////////////////
  foreach                                 ( $KEYs as $K                    ) {
    //////////////////////////////////////////////////////////////////////////
    $S         = strtolower               ( $K                             ) ;
    //////////////////////////////////////////////////////////////////////////
    switch                                ( $S                             ) {
      ////////////////////////////////////////////////////////////////////////
      case "function"                                                        :
      case "method"                                                          :
      case "database"                                                        :
      case "table"                                                           :
      break                                                                  ;
      ////////////////////////////////////////////////////////////////////////
      case "id"                                                              :
        $ID    = self::GetTag             ( "id"       , $argv             ) ;
      break                                                                  ;
      ////////////////////////////////////////////////////////////////////////
      case "username"                                                        :
        $USR   = self::GetTag             ( "username" , $argv             ) ;
        $USERNAME = $USR                                                     ;
        $SETS -> set                      ( "Username" , $USR              ) ;
      break                                                                  ;
      ////////////////////////////////////////////////////////////////////////
      case "scope"                                                           :
        $Scope = self::GetTag             ( "scope"    , $argv             ) ;
        $SCOPEX   = $Scope                                                   ;
        $SETS -> set                      ( "Scope"    , $Scope            ) ;
      break                                                                  ;
      ////////////////////////////////////////////////////////////////////////
      case "keyword"                                                         :
        $KW    = self::GetTag             ( "keyword"  , $argv             ) ;
        $KEYWORD  = $KW                                                      ;
        $SETS -> set                      ( "Keyword"  , $KW               ) ;
      break                                                                  ;
      ////////////////////////////////////////////////////////////////////////
      default                                                                :
        $V     = self::GetTag             ( $K , $argv                     ) ;
        array_push                        ( $PARAMETERS , "{$K}='{$V}'"    ) ;
      break                                                                  ;
      ////////////////////////////////////////////////////////////////////////
    }                                                                        ;
    //////////////////////////////////////////////////////////////////////////
  }                                                                          ;
  ////////////////////////////////////////////////////////////////////////////
  $DBX         = new DB                   (                                ) ;
  if                                      ( ! $DBX -> Connect ( $HOST )    ) {
    return $DBX -> ConnectionError        (                                ) ;
  }                                                                          ;
  $VALUE       = $SETS -> obtainValue     ( $DBX , $SEZTAB                 ) ;
  $DBX        -> Close                    (                                ) ;
  ////////////////////////////////////////////////////////////////////////////
  if                                      ( $VALUE > 0                     ) {
    array_push                            ( $PARAMETERS , "checked"        ) ;
  }                                                                          ;
  ////////////////////////////////////////////////////////////////////////////
  $PARMS       = ""                                                          ;
  if                                      ( count ( $PARAMETERS ) > 0      ) {
    $PARMS     = implode                  ( " " , $PARAMETERS              ) ;
    $PARMS     = " {$PARMS}"                                                 ;
  }                                                                          ;
  ////////////////////////////////////////////////////////////////////////////
  $MAPS        = array                                                       (
    "$(SETTINGS-ID)"         =>   $ID                                        ,
    "$(SETTINGS-DB)"         =>   $PICKDB                                    ,
    "$(SETTINGS-TABLE)"      =>   $SEZTAB                                    ,
    "$(SETTINGS-USERNAME)"   =>   $USERNAME                                  ,
    "$(SETTINGS-SCOPE)"      =>   $SCOPEX                                    ,
    "$(SETTINGS-KEYWORD)"    =>   $KEYWORD                                   ,
    "$(SETTINGS-PARAMETERS)" =>   $PARMS                                     ,
    "$(SETTINGS-TEXT)"       =>   $Content                                   ,
  )                                                                          ;
  ////////////////////////////////////////////////////////////////////////////
  return Strings::ReplaceFileByKeys       ( $TEMPLFILE , $MAPS             ) ;
}
//////////////////////////////////////////////////////////////////////////////
// 輸入參數設定編輯器
//////////////////////////////////////////////////////////////////////////////
public static function SettingsInputer    ( $argv                            ,
                                            $Content                         ,
                                            $Options                         ,
                                            $TEMPID                        ) {
  ////////////////////////////////////////////////////////////////////////////
  $PICKDB      = self::GetTag             ( "database" , $argv             ) ;
  $HOST        = self::GetCurrentDB       ( $argv , $Options               ) ;
  $SEZTAB      = self::GetAssignTable     ( "`settings`"                     ,
                                            $argv                            ,
                                            $Options                       ) ;
  ////////////////////////////////////////////////////////////////////////////
  $SETS        = new Settings             (                                ) ;
  ////////////////////////////////////////////////////////////////////////////
  $Templates   = $Options                 [ "Templates"                    ] ;
  $EXTENSION   = $Options                 [ "AITK"                         ] ;
  $PATHX       = $Options                 [ "Extension"                    ] ;
  $TEMPLFILE   = $Templates               [ $TEMPID                        ] ;
  $TEMPLFILE   = "{$PATHX}/{$TEMPLFILE}"                                     ;
  ////////////////////////////////////////////////////////////////////////////
  $USERNAME    = ""                                                          ;
  $SCOPEX      = ""                                                          ;
  $KEYWORD     = ""                                                          ;
  ////////////////////////////////////////////////////////////////////////////
  $PARAMETERS  = array                    (                                ) ;
  $KEYs        = array_keys               ( $argv                          ) ;
  ////////////////////////////////////////////////////////////////////////////
  foreach                                 ( $KEYs as $K                    ) {
    //////////////////////////////////////////////////////////////////////////
    $S         = strtolower               ( $K                             ) ;
    //////////////////////////////////////////////////////////////////////////
    switch                                ( $S                             ) {
      ////////////////////////////////////////////////////////////////////////
      case "function"                                                        :
      case "method"                                                          :
      case "database"                                                        :
      case "table"                                                           :
      break                                                                  ;
      ////////////////////////////////////////////////////////////////////////
      case "username"                                                        :
        $USR   = self::GetTag             ( "username" , $argv             ) ;
        $USERNAME = $USR                                                     ;
        $SETS -> set                      ( "Username" , $USR              ) ;
      break                                                                  ;
      ////////////////////////////////////////////////////////////////////////
      case "scope"                                                           :
        $Scope = self::GetTag             ( "scope"    , $argv             ) ;
        $SCOPEX   = $Scope                                                   ;
        $SETS -> set                      ( "Scope"    , $Scope            ) ;
      break                                                                  ;
      ////////////////////////////////////////////////////////////////////////
      case "keyword"                                                         :
        $KW    = self::GetTag             ( "keyword"  , $argv             ) ;
        $KEYWORD  = $KW                                                      ;
        $SETS -> set                      ( "Keyword"  , $KW               ) ;
      break                                                                  ;
      ////////////////////////////////////////////////////////////////////////
      default                                                                :
        $V     = self::GetTag             ( $K , $argv                     ) ;
        array_push                        ( $PARAMETERS , "{$K}='{$V}'"    ) ;
      break                                                                  ;
      ////////////////////////////////////////////////////////////////////////
    }                                                                        ;
    //////////////////////////////////////////////////////////////////////////
  }                                                                          ;
  ////////////////////////////////////////////////////////////////////////////
  $DBX         = new DB                   (                                ) ;
  if                                      ( ! $DBX -> Connect ( $HOST )    ) {
    return $DBX -> ConnectionError        (                                ) ;
  }                                                                          ;
  $VALUE       = $SETS -> obtainValue     ( $DBX , $SEZTAB                 ) ;
  $DBX        -> Close                    (                                ) ;
  ////////////////////////////////////////////////////////////////////////////
  $PARMS       = ""                                                          ;
  if                                      ( count ( $PARAMETERS ) > 0      ) {
    $PARMS     = implode                  ( " " , $PARAMETERS              ) ;
    $PARMS     = " {$PARMS}"                                                 ;
  }                                                                          ;
  ////////////////////////////////////////////////////////////////////////////
  $MAPS        = array                                                       (
    "$(SETTINGS-DB)"         =>   $PICKDB                                    ,
    "$(SETTINGS-TABLE)"      =>   $SEZTAB                                    ,
    "$(SETTINGS-USERNAME)"   =>   $USERNAME                                  ,
    "$(SETTINGS-SCOPE)"      =>   $SCOPEX                                    ,
    "$(SETTINGS-KEYWORD)"    =>   $KEYWORD                                   ,
    "$(SETTINGS-VALUE)"      =>   $VALUE                                     ,
    "$(SETTINGS-PARAMETERS)" =>   $PARMS                                     ,
    "$(SETTINGS-TEXT)"       =>   $Content                                   ,
  )                                                                          ;
  ////////////////////////////////////////////////////////////////////////////
  return Strings::ReplaceFileByKeys       ( $TEMPLFILE , $MAPS             ) ;
}
//////////////////////////////////////////////////////////////////////////////
// Number參數設定編輯器
//////////////////////////////////////////////////////////////////////////////
public static function SettingsNumber     ( $argv , $Content , $Options    ) {
  return self::SettingsInputer            ( $argv                            ,
                                            $Content                         ,
                                            $Options                         ,
                                            "Settings::Number"             ) ;
}
//////////////////////////////////////////////////////////////////////////////
// Text參數設定編輯器
//////////////////////////////////////////////////////////////////////////////
public static function SettingsText       ( $argv , $Content , $Options    ) {
  return self::SettingsInputer            ( $argv                            ,
                                            $Content                         ,
                                            $Options                         ,
                                            "Settings::Text"               ) ;
}
//////////////////////////////////////////////////////////////////////////////
// StarDate參數設定編輯器
//////////////////////////////////////////////////////////////////////////////
public static function SettingsStarDate   ( $argv , $Content , $Options    ) {
  ////////////////////////////////////////////////////////////////////////////
  $PICKDB      = self::GetTag             ( "database" , $argv             ) ;
  $HOST        = self::GetCurrentDB       ( $argv , $Options               ) ;
  $SEZTAB      = self::GetAssignTable     ( "`settings`"                     ,
                                            $argv                            ,
                                            $Options                       ) ;
  $TEMPID      = "Settings::DateTime"                                        ;
  ////////////////////////////////////////////////////////////////////////////
  $SETS        = new Settings             (                                ) ;
  ////////////////////////////////////////////////////////////////////////////
  $Templates   = $Options                 [ "Templates"                    ] ;
  $EXTENSION   = $Options                 [ "AITK"                         ] ;
  $PATHX       = $Options                 [ "Extension"                    ] ;
  $TEMPLFILE   = $Templates               [ $TEMPID                        ] ;
  $TEMPLFILE   = "{$PATHX}/{$TEMPLFILE}"                                     ;
  ////////////////////////////////////////////////////////////////////////////
  $USERNAME    = ""                                                          ;
  $SCOPEX      = ""                                                          ;
  $KEYWORD     = ""                                                          ;
  $TZ          = "Asia/Taipei"                                               ;
  ////////////////////////////////////////////////////////////////////////////
  $PARAMETERS  = array                    (                                ) ;
  $KEYs        = array_keys               ( $argv                          ) ;
  ////////////////////////////////////////////////////////////////////////////
  foreach                                 ( $KEYs as $K                    ) {
    //////////////////////////////////////////////////////////////////////////
    $S         = strtolower               ( $K                             ) ;
    //////////////////////////////////////////////////////////////////////////
    switch                                ( $S                             ) {
      ////////////////////////////////////////////////////////////////////////
      case "function"                                                        :
      case "method"                                                          :
      case "database"                                                        :
      case "table"                                                           :
      break                                                                  ;
      ////////////////////////////////////////////////////////////////////////
      case "username"                                                        :
        $USR   = self::GetTag             ( "username" , $argv             ) ;
        $USERNAME = $USR                                                     ;
        $SETS -> set                      ( "Username" , $USR              ) ;
      break                                                                  ;
      ////////////////////////////////////////////////////////////////////////
      case "scope"                                                           :
        $Scope = self::GetTag             ( "scope"    , $argv             ) ;
        $SCOPEX   = $Scope                                                   ;
        $SETS -> set                      ( "Scope"    , $Scope            ) ;
      break                                                                  ;
      ////////////////////////////////////////////////////////////////////////
      case "keyword"                                                         :
        $KW    = self::GetTag             ( "keyword"  , $argv             ) ;
        $KEYWORD  = $KW                                                      ;
        $SETS -> set                      ( "Keyword"  , $KW               ) ;
      break                                                                  ;
      ////////////////////////////////////////////////////////////////////////
      case "timezone"                                                        :
        $TZ    = self::GetTag             ( "timezone" , $argv             ) ;
      break                                                                  ;
      ////////////////////////////////////////////////////////////////////////
      default                                                                :
        $V     = self::GetTag             ( $K , $argv                     ) ;
        array_push                        ( $PARAMETERS , "{$K}='{$V}'"    ) ;
      break                                                                  ;
      ////////////////////////////////////////////////////////////////////////
    }                                                                        ;
    //////////////////////////////////////////////////////////////////////////
  }                                                                          ;
  ////////////////////////////////////////////////////////////////////////////
  $DBX         = new DB                   (                                ) ;
  if                                      ( ! $DBX -> Connect ( $HOST )    ) {
    return $DBX -> ConnectionError        (                                ) ;
  }                                                                          ;
  $VALUE       = $SETS -> obtainValue     ( $DBX , $SEZTAB                 ) ;
  $DBX        -> Close                    (                                ) ;
  ////////////////////////////////////////////////////////////////////////////
  $NOW         = new StarDate             (                                ) ;
  if                                      ( strlen ( $VALUE ) > 0          ) {
    $NOW      -> Stardate = $VALUE                                           ;
  } else                                                                     {
    $NOW      -> Now                      (                                ) ;
  }                                                                          ;
  $DATETIME    = $NOW -> toDateTimeString ( $TZ , "T" , "Y-m-d" , "H:i:s"  ) ;
  ////////////////////////////////////////////////////////////////////////////
  $PARMS       = ""                                                          ;
  if                                      ( count ( $PARAMETERS ) > 0      ) {
    $PARMS     = implode                  ( " " , $PARAMETERS              ) ;
    $PARMS     = " {$PARMS}"                                                 ;
  }                                                                          ;
  ////////////////////////////////////////////////////////////////////////////
  $MAPS        = array                                                       (
    "$(SETTINGS-DB)"         =>   $PICKDB                                    ,
    "$(SETTINGS-TABLE)"      =>   $SEZTAB                                    ,
    "$(SETTINGS-USERNAME)"   =>   $USERNAME                                  ,
    "$(SETTINGS-SCOPE)"      =>   $SCOPEX                                    ,
    "$(SETTINGS-KEYWORD)"    =>   $KEYWORD                                   ,
    "$(SETTINGS-VALUE)"      =>   $DATETIME                                  ,
    "$(SETTINGS-TZ)"         =>   $TZ                                        ,
    "$(SETTINGS-PARAMETERS)" =>   $PARMS                                     ,
    "$(SETTINGS-TEXT)"       =>   $Content                                   ,
  )                                                                          ;
  ////////////////////////////////////////////////////////////////////////////
  return Strings::ReplaceFileByKeys       ( $TEMPLFILE , $MAPS             ) ;
}
//////////////////////////////////////////////////////////////////////////////
// 參數設定介面進入點
//////////////////////////////////////////////////////////////////////////////
public static function SettingsUI    ( $argv , $Content , $Options         ) {
  ////////////////////////////////////////////////////////////////////////////
  $Method      = self::GetTag        ( "method"    , $argv                 ) ;
  $Method      = strtolower          ( $Method                             ) ;
  ////////////////////////////////////////////////////////////////////////////
  switch                             ( $Method                             ) {
    //////////////////////////////////////////////////////////////////////////
    case "editor"                                                            :
    return self::SettingsEditor      ( $argv , $Content , $Options         ) ;
    //////////////////////////////////////////////////////////////////////////
    case "checkbox"                                                          :
    return self::SettingsCheckBox    ( $argv , $Content , $Options         ) ;
    //////////////////////////////////////////////////////////////////////////
    case "number"                                                            :
    return self::SettingsNumber      ( $argv , $Content , $Options         ) ;
    //////////////////////////////////////////////////////////////////////////
    case "text"                                                              :
    return self::SettingsText        ( $argv , $Content , $Options         ) ;
    //////////////////////////////////////////////////////////////////////////
    case "stardate"                                                          :
    return self::SettingsStarDate    ( $argv , $Content , $Options         ) ;
    //////////////////////////////////////////////////////////////////////////
  }                                                                          ;
  ////////////////////////////////////////////////////////////////////////////
  return ""                                                                  ;
}
//////////////////////////////////////////////////////////////////////////////
// 目錄列表
//////////////////////////////////////////////////////////////////////////////
public static function ListDirectory ( $argv , $Content , $Options         ) {
  ////////////////////////////////////////////////////////////////////////////
  return json_encode                 ( $Options                            ) ;
  ////////////////////////////////////////////////////////////////////////////
}
//////////////////////////////////////////////////////////////////////////////

//////////////////////////////////////////////////////////////////////////////

//////////////////////////////////////////////////////////////////////////////

//////////////////////////////////////////////////////////////////////////////

//////////////////////////////////////////////////////////////////////////////

//////////////////////////////////////////////////////////////////////////////

//////////////////////////////////////////////////////////////////////////////
}
//////////////////////////////////////////////////////////////////////////////
?>
