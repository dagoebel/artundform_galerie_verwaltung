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
 * @copyright  yupdesign 
 * @author     yupdesign 
 * @package    artundform 
 * @license    - 
 * @filesource
 */


/**
 * Class artundform_galerie_verwaltung 
 *
 * @copyright  yupdesign 
 * @author     yupdesign 
 * @package    Controller
 */
class artundform_galerie_verwaltung extends Module
{

	/**
	 * Template
	 * @var string
	 */
	protected $strTemplate = 'tl_artundform_galerie_verwaltung';


	/**
	 * Generate module
	 */
	protected function compile()
	{
		
	$arrWerke = array(); 
	
	$id = $this->id;
	
	$moduleParams = $this->Database->execute("SELECT * FROM tl_module WHERE id=".$id);
	
	$jahr = $moduleParams->artundform_jahr;
	$ausstellungsnr = $moduleParams->artundform_ausstellungsnr;
	$darstellung = $moduleParams->artundform_darstellung;
	
	
    $objWerke = $this->Database->execute("SELECT * FROM tl_artundform_galerie_verwaltung WHERE jahr = '".$jahr."' AND ausstellungsnr = '".$ausstellungsnr."' ORDER BY bildnr"); 
    while ($objWerke->next()) 
    { 
      $newArr = array 
      ( 
        'bildnr' => trim($objWerke->bildnr), 
        'kuenstler' => trim($objWerke->kuenstler), 
        'titel' => trim($objWerke->titel), 
        'jahr' => trim($objWerke->jahr), 
        'technik' => $objWerke->technik, 
        'groesse' => $objWerke->groesse, 
        'preis' => $objWerke->preis, 
        'bild' => $objWerke->bild,
		'_jahr' => $moduleParams->artundform_jahr,
		'_ausstellungsnr' => $moduleParams->artundform_ausstellungsnr,
		'_darstellung' => $moduleParams->artundform_darstellung
      ); 
	$arrWerke[] = $newArr; 
    } 
    $this->Template->Werke = $arrWerke; 
		
	}
}


?>