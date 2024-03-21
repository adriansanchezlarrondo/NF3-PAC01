<?php

    require("class.UserApp.php");
    require("class.pdofactory.php");

    print "Running...<br />";

    $strDSN = "pgsql:dbname=usuaris;host=localhost;port=5432";
    $objPDO = PDOFactory::GetPDO($strDSN, "postgres", "root",array());
    $objPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $objUsuario = new UserApp($objPDO, 5);
    
    print "Eliminando a" . $objUsuario->getNom() . "...<br />";

    $objUsuario->MarkForDeletion();
	unset($objUsuario);
    
    // print "Nom is " . $objUsuario->getNom() . "<br />";
    // print "Group is " . $objUsuario->getGroup() . "<br />";
    // print "Created is " . $objUsuario->getCreated() . "<br />";
    // print "LastUpdate is " . $objUsuario->getLastUpdate() . "<br />";
    // print "IsActive is " . $objUsuario->getIsActive() . "<br />";

    // $objUsuario->setNom('Endrick');
    // $objUsuario->setGroup('Aspitos');
    // $objUsuario->setCreated('2024-07-07 09:30:00');
    // $objUsuario->setLastUpdate('2028-08-08 18:18:18'); 
    // $objUsuario->setIsActive(0);

    // print "<br /> --- Después del cambio --- <br />";
    // print "Nom is " . $objUsuario->getNom() . "<br />";
    // print "Group is " . $objUsuario->getGroup() . "<br />";
    // print "Created is " . $objUsuario->getCreated() . "<br />";
    // print "LastUpdate is " . $objUsuario->getLastUpdate() . "<br />";
    // print "IsActive is " . $objUsuario->getIsActive() . "<br />";
    // $objUsuario->Save();

    // $objUsuario2 = new UserApp($objPDO);
    // $objUsuario2->setNom('Vinicius');
    // $objUsuario2->setGroup('Grupo33');
    // $objUsuario2->setCreated('2020-03-03 20:10:00');
    // $objUsuario2->setLastUpdate('2024-02-05 20:45:00'); 
    // $objUsuario2->setIsActive(true);

    // $objUsuario3 = new UserApp($objPDO);
    // $objUsuario3->setNom('ElNano');
    // $objUsuario3->setGroup('Grupo14');
    // $objUsuario3->setCreated('2022-11-11 10:45:00');
    // $objUsuario3->setLastUpdate('2024-01-12 09:30:00'); 
    // $objUsuario3->setIsActive(true);

    // print "Nom is " . $objUsuario2->getNom() . "<br />";
    // print "Group is " . $objUsuario2->getGroup() . "<br />";
    // print "Created is " . $objUsuario2->getCreated() . "<br />";
    // print "LastUpdate is " . $objUsuario2->getLastUpdate() . "<br />";
    // print "IsActive is " . $objUsuario2->getIsActive() . "<br />";
    
    // print "Nom is " . $objUsuario3->getNom() . "<br />";
    // print "Group is " . $objUsuario3->getGroup() . "<br />";
    // print "Created is " . $objUsuario3->getCreated() . "<br />";
    // print "LastUpdate is " . $objUsuario3->getLastUpdate() . "<br />";
    // print "IsActive is " . $objUsuario3->getIsActive() . "<br />";

    // $objUsuario2->Save();
    // $objUsuario3->Save();

    // $objUsuario2->MarkForDeletion();
	// unset($objUsuario2);
    // $objUsuario3->MarkForDeletion();
	// unset($objUsuario3);