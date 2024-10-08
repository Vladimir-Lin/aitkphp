<?php
//////////////////////////////////////////////////////////////////////////////
// 物件關聯性元件
//////////////////////////////////////////////////////////////////////////////
namespace AITK                                                               ;
//////////////////////////////////////////////////////////////////////////////
class Relation extends Columns                                               {
//////////////////////////////////////////////////////////////////////////////
public $Id                                                                   ;
public $First                                                                ;
public $T1                                                                   ;
public $Second                                                               ;
public $T2                                                                   ;
public $Relation                                                             ;
public $Position                                                             ;
public $Reverse                                                              ;
public $Prefer                                                               ;
public $Membership                                                           ;
public $Description                                                          ;
//////////////////////////////////////////////////////////////////////////////
public $Relations = array                                                    (
  "Ignore"        =>  0                                                      ,
  "Subordination" =>  1                                                      ,
  "Icon"          =>  2                                                      ,
  "Sexuality"     =>  3                                                      ,
  "Trigger"       =>  4                                                      ,
  "StartTrigger"  =>  5                                                      ,
  "FinalTrigger"  =>  6                                                      ,
  "Action"        =>  7                                                      ,
  "Condition"     =>  8                                                      ,
  "Synonymous"    =>  9                                                      ,
  "Equivalent"    => 10                                                      ,
  "Contains"      => 11                                                      ,
  "Using"         => 12                                                      ,
  "Possible"      => 13                                                      ,
  "Originate"     => 14                                                      ,
  "Capable"       => 15                                                      ,
  "Estimate"      => 16                                                      ,
  "Alias"         => 17                                                      ,
  "Counterpart"   => 18                                                      ,
  "Explain"       => 19                                                      ,
  "Fuzzy"         => 20                                                      ,
  "Greater"       => 21                                                      ,
  "Less"          => 22                                                      ,
  "Before"        => 23                                                      ,
  "After"         => 24                                                      ,
  "Tendency"      => 25                                                      ,
  "Different"     => 26                                                      ,
  "Acting"        => 27                                                      ,
  "Forgotten"     => 28                                                      ,
  "Google"        => 29                                                      ,
  "Facebook"      => 30                                                      ,
  "Prerequisite"  => 31                                                      ,
  "Successor"     => 32                                                      ,
  "Candidate"     => 33                                                      ,
  "Face"          => 34                                                      ,
  "Mouth"         => 35                                                      ,
  "Eye"           => 36                                                      ,
  "Iris"          => 37                                                      ,
  "Nose"          => 38                                                      ,
  "Tit"           => 39                                                      ,
  "Umbilicus"     => 40                                                      ,
  "Pussy"         => 41                                                      ,
  "Asshole"       => 42                                                      ,
  "Texture"       => 43                                                      ,
  "Tatto"         => 44                                                      ,
  "Exclude"       => 45                                                      ,
  "End"           => 46                                                      ,
)                                                                            ;
//////////////////////////////////////////////////////////////////////////////
public $Types         = array                                                (
  "None"              =>   0                                                 ,
  "Type"              =>   1                                                 ,
  "Language"          =>   2                                                 ,
  "Name"              =>   3                                                 ,
  "Locality"          =>   4                                                 ,
  "Action"            =>   5                                                 ,
  "Relevance"         =>   6                                                 ,
  "People"            =>   7                                                 ,
  "Resource"          =>   8                                                 ,
  "Picture"           =>   9                                                 ,
  "Audio"             =>  10                                                 ,
  "Video"             =>  11                                                 ,
  "PlainText"         =>  12                                                 ,
  "XML"               =>  13                                                 ,
  "File"              =>  14                                                 ,
  "Schedule"          =>  15                                                 ,
  "Task"              =>  16                                                 ,
  "Acupuncture"       =>  17                                                 ,
  "DataTypes"         =>  18                                                 ,
  "Eyes"              =>  19                                                 ,
  "Hairs"             =>  20                                                 ,
  "Meridian"          =>  21                                                 ,
  "Star"              =>  22                                                 ,
  "TopLevelDomain"    =>  23                                                 ,
  "SecondLevelDomain" =>  24                                                 ,
  "Keyword"           =>  25                                                 ,
  "DomainName"        =>  26                                                 ,
  "Username"          =>  27                                                 ,
  "Encoding"          =>  28                                                 ,
  "KeywordRelation"   =>  29                                                 ,
  "URL"               =>  30                                                 ,
  "EMail"             =>  31                                                 ,
  "IPv4"              =>  32                                                 ,
  "IPv6"              =>  33                                                 ,
  "Race"              =>  34                                                 ,
  "Particle"          =>  35                                                 ,
  "Composite"         =>  36                                                 ,
  "Paper"             =>  37                                                 ,
  "Organization"      =>  38                                                 ,
  "NeuralTypes"       =>  39                                                 ,
  "Occupation"        =>  40                                                 ,
  "Meaning"           =>  41                                                 ,
  "MimeTypes"         =>  42                                                 ,
  "Nation"            =>  43                                                 ,
  "Administrative"    =>  44                                                 ,
  "Currency"          =>  45                                                 ,
  "CurrencyPair"      =>  46                                                 ,
  "Flow"              =>  47                                                 ,
  "Document"          =>  48                                                 ,
  "DecisionTable"     =>  49                                                 ,
  "DecisionTree"      =>  50                                                 ,
  "Equipment"         =>  51                                                 ,
  "Face"              =>  52                                                 ,
  "OperationSystem"   =>  53                                                 ,
  "ParameterType"     =>  54                                                 ,
  "Parameter"         =>  55                                                 ,
  "Surname"           =>  56                                                 ,
  "VCF"               =>  57                                                 ,
  "Script"            =>  58                                                 ,
  "Source"            =>  59                                                 ,
  "Palette"           =>  60                                                 ,
  "Knowledge"         =>  61                                                 ,
  "Field"             =>  62                                                 ,
  "KnowledgeBase"     =>  63                                                 ,
  "Gallery"           =>  64                                                 ,
  "Continent"         =>  65                                                 ,
  "Point"             =>  66                                                 ,
  "Contour"           =>  67                                                 ,
  "Line"              =>  68                                                 ,
  "Surface"           =>  69                                                 ,
  "MeaningType"       =>  70                                                 ,
  "Project"           =>  71                                                 ,
  "ProjectType"       =>  72                                                 ,
  "MathType"          =>  73                                                 ,
  "MathObject"        =>  74                                                 ,
  "Tag"               =>  75                                                 ,
  "Album"             =>  76                                                 ,
  "Sexuality"         =>  77                                                 ,
  "SqlDataType"       =>  78                                                 ,
  "Coding"            =>  79                                                 ,
  "Compound"          =>  80                                                 ,
  "RNA"               =>  81                                                 ,
  "DNA"               =>  82                                                 ,
  "Location"          =>  83                                                 ,
  "Chromosome"        =>  84                                                 ,
  "Statistics"        =>  85                                                 ,
  "DocumentFile"      =>  86                                                 ,
  "Calendar"          =>  87                                                 ,
  "Panel"             =>  88                                                 ,
  "Execution"         =>  89                                                 ,
  "GroupRelation"     =>  90                                                 ,
  "Division"          =>  91                                                 ,
  "Period"            =>  92                                                 ,
  "Variable"          =>  93                                                 ,
  "Body"              =>  94                                                 ,
  "Organ"             =>  95                                                 ,
  "Phone"             =>  96                                                 ,
  "CountryCode"       =>  97                                                 ,
  "AreaCode"          =>  98                                                 ,
  "Trigger"           =>  99                                                 ,
  "Rectangle"         => 100                                                 ,
  "Painting"          => 101                                                 ,
  "Graphics"          => 102                                                 ,
  "Length"            => 103                                                 ,
  "Shapes"            => 104                                                 ,
  "Manifolds"         => 105                                                 ,
  "POSet"             => 106                                                 ,
  "SetMember"         => 107                                                 ,
  "Condition"         => 108                                                 ,
  "Indicator"         => 109                                                 ,
  "Commodity"         => 110                                                 ,
  "Package"           => 111                                                 ,
  "Version"           => 112                                                 ,
  "Camera"            => 113                                                 ,
  "Light"             => 114                                                 ,
  "IPA"               => 115                                                 ,
  "SqlConnection"     => 116                                                 ,
  "SqlItem"           => 117                                                 ,
  "SqlTable"          => 118                                                 ,
  "SqlPlan"           => 119                                                 ,
  "Enumeration"       => 120                                                 ,
  "SqlServer"         => 121                                                 ,
  "Weight"            => 122                                                 ,
  "Energy"            => 123                                                 ,
  "Area"              => 124                                                 ,
  "DNS"               => 125                                                 ,
  "Newsgroup"         => 126                                                 ,
  "Celestial"         => 127                                                 ,
  "Equation"          => 128                                                 ,
  "Component"         => 129                                                 ,
  "SqlConstraint"     => 130                                                 ,
  "Matrix"            => 131                                                 ,
  "Sentence"          => 132                                                 ,
  "Paragraph"         => 133                                                 ,
  "Acoustic"          => 134                                                 ,
  "Terminology"       => 135                                                 ,
  "Array"             => 136                                                 ,
  "Bound"             => 137                                                 ,
  "Consanguinity"     => 138                                                 ,
  "Kinship"           => 139                                                 ,
  "Genealogy"         => 140                                                 ,
  "Sketch"            => 141                                                 ,
  "CppState"          => 142                                                 ,
  "Spreadsheet"       => 143                                                 ,
  "Nucleus"           => 144                                                 ,
  "ClfType"           => 145                                                 ,
  "RuleBase"          => 146                                                 ,
  "Potential"         => 147                                                 ,
  "SetsAlgebra"       => 148                                                 ,
  "ColorGroup"        => 149                                                 ,
  "InternetDomain"    => 150                                                 ,
  "CCD"               => 151                                                 ,
  "Obsolete"          => 152                                                 ,
  "Pending"           => 153                                                 ,
  "Coroutine"         => 154                                                 ,
  "Semantic"          => 155                                                 ,
  "Concept"           => 156                                                 ,
  "Ideograph"         => 157                                                 ,
  "Subgroup"          => 158                                                 ,
  "FaceShape"         => 159                                                 ,
  "Culture"           => 160                                                 ,
  "Phoneme"           => 161                                                 ,
  "EyesShape"         => 162                                                 ,
  "StyleSheet"        => 163                                                 ,
  "Stroke"            => 164                                                 ,
  "Grapheme"          => 165                                                 ,
  "Emotion"           => 166                                                 ,
  "Entry"             => 167                                                 ,
  "Reference"         => 168                                                 ,
  "Constant"          => 169                                                 ,
  "StellarSpectrum"   => 170                                                 ,
  "EarthSpot"         => 171                                                 ,
  "Account"           => 172                                                 ,
  "FutureIndex"       => 173                                                 ,
  "StockSecurity"     => 174                                                 ,
  "EconomicIndex"     => 175                                                 ,
  "VideoNote"         => 176                                                 ,
  "Description"       => 177                                                 ,
  "Reality"           => 178                                                 ,
  "Model"             => 179                                                 ,
  "MusicAlbum"        => 180                                                 ,
  "HistoryType"       => 181                                                 ,
  "History"           => 182                                                 ,
  "ITU"               => 183                                                 ,
  "Place"             => 184                                                 ,
  "Station"           => 185                                                 ,
  "Role"              => 186                                                 ,
  "Course"            => 187                                                 ,
  "Lesson"            => 188                                                 ,
  "IMApp"             => 189                                                 ,
  "InstantMessage"    => 190                                                 ,
  "TimeZone"          => 191                                                 ,
  "Address"           => 192                                                 ,
  "Lecture"           => 193                                                 ,
  "Trade"             => 194                                                 ,
  "Token"             => 195                                                 ,
  "Class"             => 196                                                 ,
  "Fragment"          => 197                                                 ,
  "AgeGroup"          => 198                                                 ,
  "Proficiency"       => 199                                                 ,
  "BankAccount"       => 200                                                 ,
  "Taxonomy"          => 201                                                 ,
  "Species"           => 202                                                 ,
  "Blood"             => 203                                                 ,
  "BloodGroup"        => 204                                                 ,
  "NationType"        => 205                                                 ,
  "FileExtension"     => 206                                                 ,
  "Host"              => 207                                                 ,
  "WebPage"           => 208                                                 ,
  "FaceFeatures"      => 209                                                 ,
  "SexPosition"       => 210                                                 ,
  "End"               => 211                                                 ,
)                                                                            ;
//////////////////////////////////////////////////////////////////////////////
function __construct  (                                                    ) {
  ////////////////////////////////////////////////////////////////////////////
  parent::__construct (                                                    ) ;
  $this -> clear      (                                                    ) ;
  ////////////////////////////////////////////////////////////////////////////
}
//////////////////////////////////////////////////////////////////////////////
function __destruct  (                                                     ) {
  ////////////////////////////////////////////////////////////////////////////
  parent::__destruct (                                                     ) ;
  ////////////////////////////////////////////////////////////////////////////
}
//////////////////////////////////////////////////////////////////////////////
public function clear (                                                    ) {
  ////////////////////////////////////////////////////////////////////////////
  $this -> Id          = 0                                                   ;
  $this -> First       = 0                                                   ;
  $this -> T1          = 0                                                   ;
  $this -> Second      = 0                                                   ;
  $this -> T2          = 0                                                   ;
  $this -> Relation    = 0                                                   ;
  $this -> Position    = 0                                                   ;
  $this -> Reverse     = 0                                                   ;
  $this -> Prefer      = 0                                                   ;
  $this -> Membership  = 0                                                   ;
  $this -> Description = 0                                                   ;
  ////////////////////////////////////////////////////////////////////////////
}
//////////////////////////////////////////////////////////////////////////////
public function assign ( $Item                                             ) {
  ////////////////////////////////////////////////////////////////////////////
  $this -> Id          = $Item -> Id                                         ;
  $this -> First       = $Item -> First                                      ;
  $this -> T1          = $Item -> T1                                         ;
  $this -> Second      = $Item -> Second                                     ;
  $this -> T2          = $Item -> T2                                         ;
  $this -> Relation    = $Item -> Relation                                   ;
  $this -> Position    = $Item -> Position                                   ;
  $this -> Reverse     = $Item -> Reverse                                    ;
  $this -> Prefer      = $Item -> Prefer                                     ;
  $this -> Membership  = $Item -> Membership                                 ;
  $this -> Description = $Item -> Description                                ;
  ////////////////////////////////////////////////////////////////////////////
}
//////////////////////////////////////////////////////////////////////////////
public function tableItems (                    )                            {
  $S = array               (                    )                            ;
  array_push               ( $S , "id"          )                            ;
  array_push               ( $S , "first"       )                            ;
  array_push               ( $S , "t1"          )                            ;
  array_push               ( $S , "second"      )                            ;
  array_push               ( $S , "t2"          )                            ;
  array_push               ( $S , "relation"    )                            ;
  array_push               ( $S , "position"    )                            ;
  array_push               ( $S , "reverse"     )                            ;
  array_push               ( $S , "prefer"      )                            ;
  array_push               ( $S , "membership"  )                            ;
  array_push               ( $S , "description" )                            ;
  return $S                                                                  ;
}
//////////////////////////////////////////////////////////////////////////////
public function FullList ( )                                                 {
  $L = array (            )                                                  ;
  array_push ( $L                                                            ,
               "t1"                                                          ,
               "t2"                                                          ,
               "relation"                                                    ,
               "first"                                                       ,
               "second"                                                      ,
               "position" )                                                  ;
  return $L                                                                  ;
}
//////////////////////////////////////////////////////////////////////////////
public function ExactList ( )                                                {
  $L = array (          )                                                    ;
  array_push ( $L                                                            ,
               "t1"                                                          ,
               "t2"                                                          ,
               "relation"                                                    ,
               "first"                                                       ,
               "second" )                                                    ;
  return $L                                                                  ;
}
//////////////////////////////////////////////////////////////////////////////
public function FirstList ( )                                                {
  $L = array (          )                                                    ;
  array_push ( $L                                                            ,
               "t1"                                                          ,
               "t2"                                                          ,
               "relation"                                                    ,
               "first"  )                                                    ;
  return $L                                                                  ;
}
//////////////////////////////////////////////////////////////////////////////
public function SecondList ( )                                               {
  $L = array (          )                                                    ;
  array_push ( $L                                                            ,
               "t1"                                                          ,
               "t2"                                                          ,
               "relation"                                                    ,
               "second" )                                                    ;
  return $L                                                                  ;
}
//////////////////////////////////////////////////////////////////////////////
public function isFirst ( $F )                                               {
  return ( 0 == gmp_cmp ( $F , $this -> First ) )                            ;
}
//////////////////////////////////////////////////////////////////////////////
public function isSecond ( $S )                                              {
  return ( 0 == gmp_cmp ( $S , $this -> Second ) )                           ;
}
//////////////////////////////////////////////////////////////////////////////
public function isType ( $t1 , $t2 )                                         {
  if ( $this -> T1 != $t1 ) return false                                     ;
  if ( $this -> T2 != $t2 ) return false                                     ;
  return true                                                                ;
}
//////////////////////////////////////////////////////////////////////////////
public function isT1 ( $t1                )                                  {
  return             ( $t1 == $this -> T1 )                                  ;
}
//////////////////////////////////////////////////////////////////////////////
public function isT2 ( $t2                )                                  {
  return             ( $t2 == $this -> T2 )                                  ;
}
//////////////////////////////////////////////////////////////////////////////
public function isRelation ( $R                      )                       {
  return                   ( $R == $this -> Relation )                       ;
}
//////////////////////////////////////////////////////////////////////////////
public function set ( $item , $V )                                           {
  $a = strtolower ( $item )                                                  ;
  if ( "id"          == $a ) $this -> Id          = $V                       ;
  if ( "first"       == $a ) $this -> First       = $V                       ;
  if ( "t1"          == $a ) $this -> T1          = $V                       ;
  if ( "second"      == $a ) $this -> Second      = $V                       ;
  if ( "t2"          == $a ) $this -> T2          = $V                       ;
  if ( "relation"    == $a ) $this -> Relation    = $V                       ;
  if ( "position"    == $a ) $this -> Position    = $V                       ;
  if ( "reverse"     == $a ) $this -> Reverse     = $V                       ;
  if ( "prefer"      == $a ) $this -> Prefer      = $V                       ;
  if ( "membership"  == $a ) $this -> Membership  = $V                       ;
  if ( "description" == $a ) $this -> Description = $V                       ;
}
//////////////////////////////////////////////////////////////////////////////
public function setT1 ( $N )                                                 {
  $this -> T1 = $this -> Types [ $N ]                                        ;
}
//////////////////////////////////////////////////////////////////////////////
public function setT2 ( $N )                                                 {
  $this -> T2 = $this -> Types [ $N ]                                        ;
}
//////////////////////////////////////////////////////////////////////////////
public function setRelation ( $N )                                           {
  $this -> Relation = $this -> Relations [ $N ]                              ;
}
//////////////////////////////////////////////////////////////////////////////
public function ItemPair ( $item )                                           {
  $a = strtolower ( $item )                                                  ;
  if ( "id"          == $a )                                                 {
    return "`" . $a . "` = " . (string) $this -> Id                          ;
  }                                                                          ;
  if ( "first"       == $a )                                                 {
    return "`" . $a . "` = " . (string) $this -> First                       ;
  }                                                                          ;
  if ( "t1"          == $a )                                                 {
    return "`" . $a . "` = " . (string) $this -> T1                          ;
  }                                                                          ;
  if ( "second"      == $a )                                                 {
    return "`" . $a . "` = " . (string) $this -> Second                      ;
  }                                                                          ;
  if ( "t2"          == $a )                                                 {
    return "`" . $a . "` = " . (string) $this -> T2                          ;
  }                                                                          ;
  if ( "relation"    == $a )                                                 {
    return "`" . $a . "` = " . (string) $this -> Relation                    ;
  }                                                                          ;
  if ( "position"    == $a )                                                 {
    return "`" . $a . "` = " . (string) $this -> Position                    ;
  }                                                                          ;
  if ( "reverse"     == $a )                                                 {
    return "`" . $a . "` = " . (string) $this -> Reverse                     ;
  }                                                                          ;
  if ( "prefer"      == $a )                                                 {
    return "`" . $a . "` = " . (string) $this -> Prefer                      ;
  }                                                                          ;
  if ( "membership"  == $a )                                                 {
    return "`" . $a . "` = " . (string) $this -> Membership                  ;
  }                                                                          ;
  if ( "description" == $a )                                                 {
    return "`" . $a . "` = " . (string) $this -> Description                 ;
  }                                                                          ;
  return ""                                                                  ;
}
//////////////////////////////////////////////////////////////////////////////
public function Value ( $item )                                              {
  ////////////////////////////////////////////////////////////////////////////
  $a = strtolower ( $item )                                                  ;
  if ( "id"          == $a ) return (string) $this -> Id                     ;
  if ( "first"       == $a ) return (string) $this -> First                  ;
  if ( "t1"          == $a ) return (string) $this -> T1                     ;
  if ( "second"      == $a ) return (string) $this -> Second                 ;
  if ( "t2"          == $a ) return (string) $this -> T2                     ;
  if ( "relation"    == $a ) return (string) $this -> Relation               ;
  if ( "position"    == $a ) return (string) $this -> Position               ;
  if ( "reverse"     == $a ) return (string) $this -> Reverse                ;
  if ( "prefer"      == $a ) return (string) $this -> Prefer                 ;
  if ( "membership"  == $a ) return (string) $this -> Membership             ;
  if ( "description" == $a ) return (string) $this -> Description            ;
  ////////////////////////////////////////////////////////////////////////////
  return ""                                                                  ;
}
//////////////////////////////////////////////////////////////////////////////
public function Values ( $items )                                            {
  $I = array ( )                                                             ;
  foreach ( $items as $i )                                                   {
    array_push ( $I , $this -> Value ( $i ) )                                ;
  }                                                                          ;
  $L = implode ( "," , $I )                                                  ;
  unset        (       $I )                                                  ;
  return $L                                                                  ;
}
//////////////////////////////////////////////////////////////////////////////
public function ExactItem  ( $Options = "" , $Limits = "" )                  {
  $L = $this -> ExactList  (                              )                  ;
  $Q = $this -> QueryItems ( $L , $Options , $Limits      )                  ;
  unset                    ( $L                           )                  ;
  return $Q                                                                  ;
}
//////////////////////////////////////////////////////////////////////////////
public function FirstItem  ( $Options = "" , $Limits = "" )                  {
  $L = $this -> FirstList  (                              )                  ;
  $Q = $this -> QueryItems ( $L , $Options , $Limits      )                  ;
  unset                    ( $L                           )                  ;
  return $Q                                                                  ;
}
//////////////////////////////////////////////////////////////////////////////
public function SecondItem ( $Options = "" , $Limits = "" )                  {
  $L = $this -> SecondList (                              )                  ;
  $Q = $this -> QueryItems ( $L , $Options , $Limits      )                  ;
  unset                    ( $L                           )                  ;
  return $Q                                                                  ;
}
//////////////////////////////////////////////////////////////////////////////
public function Last ( $Table )                                              {
  $WS = $this -> FirstItem ( "order by `position` desc" , "limit 0,1" )      ;
  return "select `position` from " . $Table . " " . $WS . " ;"               ;
}
//////////////////////////////////////////////////////////////////////////////
public function ExactColumn ( $Table , $Item , $Options="" , $Limits=""    ) {
  $WS = $this -> ExactItem  ( $Options , $Limits                           ) ;
  return "select " . $Item . " from " . $Table . " " . $WS . " ;"            ;
}
//////////////////////////////////////////////////////////////////////////////
public function Configure ( $First , $T1 , $T2 , $Relation )                 {
  $this -> set            ( "first" , $First               )                 ;
  $this -> setT1          ( $T1                            )                 ;
  $this -> setT2          ( $T2                            )                 ;
  $this -> setRelation    ( $Relation                      )                 ;
}
//////////////////////////////////////////////////////////////////////////////
public function InsertItems ( $Table , $items )                              {
  return "insert into " . $Table . " ("                                      .
         $this -> JoinItems ( $items , "," )                                 .
         ") values ("                                                        .
         $this -> Values    ( $items       )                                 .
         ") ;"                                                               ;
}
//////////////////////////////////////////////////////////////////////////////
public function Insert      ( $Table      )                                  {
  $L = $this -> FullList    (             )                                  ;
  $Q = $this -> InsertItems ( $Table , $L )                                  ;
  unset                     ( $L          )                                  ;
  return $Q                                                                  ;
}
//////////////////////////////////////////////////////////////////////////////
public function DeleteItems ( $Table , $items )                              {
  return "delete from {$Table} "                                             .
         $this -> QueryItems ( $items ) . " ;"                               ;
}
//////////////////////////////////////////////////////////////////////////////
public function Delete      ( $Table      )                                  {
  $L = $this -> ExactList   (             )                                  ;
  $Q = $this -> DeleteItems ( $Table , $L )                                  ;
  unset                     ( $L          )                                  ;
  return $Q                                                                  ;
}
//////////////////////////////////////////////////////////////////////////////
public function WipeOut     ( $Table      )                                  {
  $L = $this -> FirstList   (             )                                  ;
  $Q = $this -> DeleteItems ( $Table , $L )                                  ;
  unset                     ( $L          )                                  ;
  return $Q                                                                  ;
}
//////////////////////////////////////////////////////////////////////////////
public function obtain ( $R )                                                {
  $this -> Id          = $R [ "id"          ]                                ;
  $this -> First       = $R [ "first"       ]                                ;
  $this -> T1          = $R [ "t1"          ]                                ;
  $this -> Second      = $R [ "second"      ]                                ;
  $this -> T2          = $R [ "t2"          ]                                ;
  $this -> Relation    = $R [ "relation"    ]                                ;
  $this -> Position    = $R [ "position"    ]                                ;
  $this -> Reverse     = $R [ "reverse"     ]                                ;
  $this -> Prefer      = $R [ "prefer"      ]                                ;
  $this -> Membership  = $R [ "membership"  ]                                ;
  $this -> Description = $R [ "description" ]                                ;
}
//////////////////////////////////////////////////////////////////////////////
public function Subordination                                                (
         $DB                                                                 ,
         $Table                                                              ,
         $Options = "order by `position` asc"                                ,
         $Limits  = ""                                                     ) {
  $W = $this -> FirstItem ( $Options , $Limits )                             ;
  $Q = "select `second` from " . $Table . " " . $W . " ;"                    ;
  return $DB -> ObtainUuids ( $Q )                                           ;
}
//////////////////////////////////////////////////////////////////////////////
public function GetOwners                                                    (
         $DB                                                                 ,
         $Table                                                              ,
         $Options = "order by `id` asc"                                      ,
         $Limits  = ""                                                     ) {
  $W = $this -> SecondItem ( $Options , $Limits )                            ;
  $Q = "select `first` from " . $Table . " " . $W . " ;"                     ;
  return $DB -> ObtainUuids ( $Q )                                           ;
}
//////////////////////////////////////////////////////////////////////////////
public function CountFirst ( $DB , $TABLE )                                  {
  $WW = $this -> SecondItem ( )                                              ;
  $QQ = "select count(*) from {$TABLE} {$WW} ;"                              ;
  $qq = $DB -> Query ( $QQ )                                                 ;
  if ( $DB -> hasResult ( $qq ) )                                            {
    $rr  = $qq -> fetch_row ( )                                              ;
    return $rr [ 0 ]                                                         ;
  }                                                                          ;
  return 0                                                                   ;
}
//////////////////////////////////////////////////////////////////////////////
public function CountSecond ( $DB , $TABLE )                                 {
  $WW = $this -> FirstItem ( )                                               ;
  $QQ = "select count(*) from {$TABLE} {$WW} ;"                              ;
  $qq = $DB -> Query ( $QQ )                                                 ;
  if ( $DB -> hasResult ( $qq ) )                                            {
    $rr  = $qq -> fetch_row ( )                                              ;
    return $rr [ 0 ]                                                         ;
  }                                                                          ;
  return 0                                                                   ;
}
//////////////////////////////////////////////////////////////////////////////
public function Assure    ( $DB , $Table )                                   {
  $QQ  = $this -> WipeOut (       $Table )                                   ;
  $DB -> Query            ( $QQ          )                                   ;
  $QQ  = $this -> Insert  (       $Table )                                   ;
  $DB -> Query            ( $QQ          )                                   ;
}
//////////////////////////////////////////////////////////////////////////////
public function Append   ( $DB , $Table )                                    {
  $QQ =  $this -> Insert (       $Table )                                    ;
  return $DB   -> Query  ( $QQ          )                                    ;
}
//////////////////////////////////////////////////////////////////////////////
public function Join         ( $DB , $Table  )                               {
  ////////////////////////////////////////////////////////////////////////////
  $QQ = $this -> ExactColumn ( $Table , "id" )                               ;
  $q  = $DB   -> Query       ( $QQ           )                               ;
  if ( $DB -> hasResult ( $q ) ) return false                                ;
  ////////////////////////////////////////////////////////////////////////////
  $ID = -1                                                                   ;
  $QQ = $this -> Last  ( $Table )                                            ;
  $q  = $DB   -> Query ( $QQ    )                                            ;
  if ( $DB -> hasResult ( $q ) )                                             {
    $N  = $q -> fetch_array  ( MYSQLI_BOTH )                                 ;
    $ID = $N [ "position" ]                                                  ;
  }                                                                          ;
  $ID               = $ID + 1                                                ;
  $this -> Position = $ID                                                    ;
  ////////////////////////////////////////////////////////////////////////////
  return $this -> Append ( $DB , $Table )                                    ;
}
//////////////////////////////////////////////////////////////////////////////
public function Joins ( $DB , $Table , $LIST )                               {
  foreach             ( $LIST as $L          )                               {
    $this -> set      ( "second" , $L        )                               ;
    $this -> Join     ( $DB      , $Table    )                               ;
  }                                                                          ;
}
//////////////////////////////////////////////////////////////////////////////
public function PrefectOrder ( $DB , $Table )                                {
  $IX = array ( )                                                            ;
  $WH = $this -> FirstItem ( "order by `position` asc" )                     ;
  $QQ = "select `id` from " . $Table . " " . $WH . " ;"                      ;
  $qq = $DB -> Query ( $QQ )                                                 ;
  while ( $rx = $qq -> fetch_array ( MYSQLI_BOTH ) )                         {
    array_push ( $IX , $rx [ 0 ] )                                           ;
  }                                                                          ;
  $pos = 0                                                                   ;
  foreach ( $IX as $ix )                                                     {
    $QQ  = "update " . $Table . " set `position` = " . $pos                  .
           " where `id` = " . $ix . " ;"                                     ;
    $DB -> Query ( $QQ )                                                     ;
    $pos = $pos + 1                                                          ;
  }                                                                          ;
  unset ( $IX )                                                              ;
}
//////////////////////////////////////////////////////////////////////////////
public function ObtainOwners         ( $DB , $TABLE , $MEMBERS , $TMP      ) {
  foreach                            ( $TMP as $nsx                        ) {
    $this   -> set                   ( "second" , $nsx                     ) ;
    $CC      = $this -> GetOwners    ( $DB , $TABLE                        ) ;
    $MEMBERS = Parameters::JoinArray ( $MEMBERS , $CC                      ) ;
  }                                                                          ;
  return $MEMBERS                                                            ;
}
//////////////////////////////////////////////////////////////////////////////
public function Organize ( $DB , $TABLE )
{
  ////////////////////////////////////////////////////////////////////////////
  $WH     = $this -> FirstItem    ( "order by `position` asc"              ) ;
  $QQ     = "select `id` from {$TABLE} {$WH} ;"                              ;
  $IX     = $DB   -> ObtainUuids  ( $QQ                                    ) ;
  ////////////////////////////////////////////////////////////////////////////
  if                              ( count ( $IX ) <= 0                     ) {
    return                                                                   ;
  }                                                                          ;
  ////////////////////////////////////////////////////////////////////////////
  $pos    = 0                                                                ;
  $DB    -> LockWrite             ( $TABLE                                 ) ;
  foreach                         ( $IX as $iv                             ) {
    $QQ   = "update {$TABLE} set `position` = {$pos} where `id` = {$iv} ;"   ;
    $DB  -> Query                 ( $QQ                                    ) ;
    $pos  = $pos + 1                                                         ;
  }                                                                          ;
  $DB    -> UnlockTables          (                                        ) ;
  ////////////////////////////////////////////////////////////////////////////
}
//////////////////////////////////////////////////////////////////////////////
public function Ordering ( $DB , $TABLE , $UUIDs )
{
  ////////////////////////////////////////////////////////////////////////////
  $pos    = 0                                                                ;
  $DB    -> LockWrite             ( $TABLE                                 ) ;
  foreach                         ( $UUIDs as $xu                          ) {
    $this  -> set                 ( "second" , $xu                         ) ;
    $WH   = $this -> ExactItem    (                                        ) ;
    $QQ   = "update {$TABLE} set `position` = {$pos} {$WH} ;"                ;
    $DB  -> Query                 ( $QQ                                    ) ;
    $pos  = $pos + 1                                                         ;
  }                                                                          ;
  $DB    -> UnlockTables          (                                        ) ;
  ////////////////////////////////////////////////////////////////////////////
}
//////////////////////////////////////////////////////////////////////////////
}
//////////////////////////////////////////////////////////////////////////////
?>
