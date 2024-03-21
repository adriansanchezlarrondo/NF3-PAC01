<?php

include_once("abstract.databoundobject.php");
include_once("class.pdofactory.php");
include_once("./Logger/class.fileLoggerBackend.php");

class UserApp extends DataBoundObject {

        protected $ID;
        protected $Nom;
        protected $Group;
        protected $Created;
        protected $LastUpdate;
        protected $IsActive;


        protected function DefineTableName() {
                return("userapp");
        }

        protected function DefineRelationMap() {
                return(array(
                        "id" => "ID",
                        "nom" => "Nom",
                        "group" => "Group",
                        "created" => "Created",
                        "lastUpdate" => "LastUpdate",
                        "isActive" => "IsActive"
                ));
        }
}


$connectionString = "file:parse\prova.log";
// $connectionString = "pgsql:dbname=usuaris;host=localhost;port=5432;user=postgres;password=root";

$urlData = parse_url($connectionString);

var_dump($urlData);

if (!isset($urlData['scheme'])) {
  throw new Exception("Invalid scheme connection.\n");
}

$fileName = 'Logger/class.' . $urlData['scheme'] . 'LoggerBackend.php';

include_once($fileName);

$className = $urlData['scheme'] . 'LoggerBackend';

print "Class Name: " . $className . "\n";

if (!class_exists($className)) {
  throw new Exception("No loggind bakend available for " . $urlData['scheme']);
}

$log = $className::getInstance();
var_dump($log);