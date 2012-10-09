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
 * Class artundform_galerie_import
 *
 * Back end module "extension".
 * @copyright  Leo Feyer 2005-2011
 * @author     Leo Feyer <http://www.contao.org>
 * @package    Controller
 */
class artundform_galerie_import extends BackendModule
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
	protected $strTemplate = 'artundform_galerie_import';


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
		// Create files
		if ($this->Input->post('FORM_SUBMIT') == 'artundform_galerie_import')
		{

			//$objFile = new File($this->Input->get('datei'));
			 if ($_FILES["file"]["type"] == 'text/csv')
                        {
						$jahr = $this->Input->post('jahr');
						$ausstellungsnr = $this->Input->post('ausstellungsnr');
						$sqldelete = "DELETE FROM `tl_artundform_galerie_verwaltung` WHERE `jahr` = '".$jahr."' AND `ausstellungsnr` = '".$ausstellungsnr."'";
						
						
						// Datenbankclear
			  			$this->Database->prepare($sqldelete)->execute();
							
                       	$csv_datei = $_FILES["file"]["tmp_name"];
						// Datenbankanweisung vorbereiten
											$sqlimport = "LOAD DATA LOCAL INFILE '".$csv_datei."'
													INTO TABLE `tl_artundform_galerie_verwaltung`
													FIELDS TERMINATED BY ';'
													OPTIONALLY ENCLOSED BY '\"'
													LINES TERMINATED BY '\n'
													(`kuenstler`, `titel`, `technik`, `groesse`, `preis`, `bild`, `bildnr`)
													SET `jahr`='".$jahr."',`ausstellungsnr`='".$ausstellungsnr."'";
 
						// Datenbankimport
			  			$this->Database->prepare($sqlimport)->execute();
						$this->redirect('contao/main.php?do=Galerie',true);
                        }
				else{


				}
						
					
	
		}
			
	}


}

?>