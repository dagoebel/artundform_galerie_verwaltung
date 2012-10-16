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
	
	$ppid = $this->Database->execute("SELECT * FROM tl_artundform_galerie_verwaltung WHERE jahr = '".$jahr."' AND ausstellungsnr = '".$ausstellungsnr."'"); 
	$pid = $ppid->id;
	$ordner = $ppid->ordner;
	
    $objWerke = $this->Database->execute("SELECT * FROM tl_artundform_werke_verwaltung WHERE pid = '".$pid."' ORDER BY bildnr"); 
    while ($objWerke->next()) 
    { 
	//$strReturn = $this->generateImage($this->getImage($ppid->ordner.'/'.$objWerke->bild, 300, 250, 'proportional'), 'asd');
	//$strReturn = $this->generateImage($this->getImage('http://www.artundform.de/tl_files/artundform_content/galerie/ausstellungen/2012/guenther_guenther/werke_prototype/bild_01.jpg', 300, 250, 'proportional'), 'my first image');
	
		$strPath = $ppid->ordner.'/'.$objWerke->bild;
		$strReturn = $strPath;
      $newArr = array 
      ( 
        'bildnr' => trim($objWerke->bildnr), 
        'kuenstler' => trim($objWerke->kuenstler), 
        'titel' => trim($objWerke->titel), 
        'jahr' => trim($objWerke->jahr), 
        'technik' => trim($objWerke->technik), 
        'groesse' => trim($objWerke->groesse), 
        'preis' => trim($objWerke->preis), 
        'bild' => trim($objWerke->bild),
		'bildKlein' => $strReturn,
		'_jahr' => trim($moduleParams->artundform_jahr),
		'_ausstellungsnr' => trim($moduleParams->artundform_ausstellungsnr),
		'_darstellung' => trim($moduleParams->artundform_darstellung),
		'_ausstellungsname' => trim($ppid->name),
		'_ordner' => trim($ppid->ordner)
      ); 
	$arrWerke[] = $newArr; 
    } 
    $this->Template->Werke = $arrWerke; 
	}
}
?>










