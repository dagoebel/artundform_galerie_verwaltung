<?php if (!defined('TL_ROOT')) die('You cannot access this file directly!');

/**
 * Contao Open Source CMS
 * Copyright (C) 2005-2011 Leo Feyer
 *
 * Formerly known as TYPOlight Open Source CMS.
 *
 * This program is free software: you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation, either
 * version 3 of the License, or (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU
 * Lesser General Public License for more details.
 * 
 * You should have received a copy of the GNU Lesser General Public
 * License along with this program. If not, please visit the Free
 * Software Foundation website at <http://www.gnu.org/licenses/>.
 *
 * PHP version 5
 * @copyright  Leo Feyer 2005-2011
 * @author     Leo Feyer <http://www.contao.org>
 * @package    Development
 * @license    LGPL
 * @filesource
 */


/**
 * Class artundform_werke_importieren
 *
 * Back end module "extension".
 * @copyright  Leo Feyer 2005-2011
 * @author     Leo Feyer <http://www.contao.org>
 * @package    Controller
 */
class artundform_werke_importieren extends BackendModule
{

	/**
	 * Data container
	 * @var object
	 */
	protected $objDc;

	/**
	 * Template
	 * @var string
	 */
	protected $strTemplate = 'artundform_werke_importieren';


	/**
	 * Generate the module
	 * @return string
	 */
	public function generate()
	{
		$this->objDc = func_get_arg(0);
		return parent::generate();
	}
	
	/**
	 * Generate module
	 */
	protected function compile()
	{
	
	function createMeta($csv_datei,$ordner,$pid)
	{
		
		$fh = fopen(TL_ROOT . '/' . $ordner . '/meta_rundgang.txt', 'w');
		$result = mysql_query("SELECT bild,kuenstler,titel,jahr,technik,groesse,preis,bildnr FROM `tl_artundform_werke_verwaltung` WHERE `pid`='".$pid."' ORDER BY bildnr");

		while ($row = mysql_fetch_array($result, MYSQL_NUM)) {
			fwrite($fh, $row[0]. ' = '.$row[1].'. '.$row[2].'<br>'.$row[3].'. '.$row[4].'. '.$row[5].' cm. '.$row[6].' EUR  |   | Anfrage zu Bild Nr. '.$row[7]. ' - '.$row[1].'. '.$row[2].' | Bild Nr. '.$row[7]);
			fwrite($fh, "\n");
	}
	fclose($fh);
	}
		// Create files
		if ($this->Input->post('FORM_SUBMIT') == 'artundform_werke_importieren')
		{

						$pid = $this->id;
						
						$galerie = $this->Database->execute("SELECT * FROM tl_artundform_galerie_verwaltung WHERE `id` = ".$pid);
						$ordner = $galerie->ordner;
	
						$sqldelete = "DELETE FROM `tl_artundform_werke_verwaltung` WHERE `pid` = ".$pid;
						
						// Datenbankclear
			  			$this->Database->prepare($sqldelete)->execute();
							
                       	$csv_datei = $_FILES["file"]["tmp_name"];
						// Datenbankanweisung vorbereiten
											$sqlimport = "LOAD DATA LOCAL INFILE '".$csv_datei."'
													INTO TABLE `tl_artundform_werke_verwaltung`
													FIELDS TERMINATED BY ';'
													OPTIONALLY ENCLOSED BY '\"'
													LINES TERMINATED BY '\n'
													(`bildnr`,`kuenstler`, `titel`, `jahr`, `technik`, `groesse`, `preis`, `bild`)
													SET `pid`='".$pid."'";
												
						// Datenbankimport
			  			$this->Database->prepare($sqlimport)->execute();
						
						createMeta($csv_datei,$ordner,$pid);
						
						$this->redirect('contao/main.php?do=Art-Form%20Galerie&table=tl_artundform_werke_verwaltung',true);
      
	
		}
			
	}

}
?>