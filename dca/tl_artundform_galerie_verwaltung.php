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
 * Table tl_artundform_galerie_verwaltung 
 */
$GLOBALS['TL_DCA']['tl_artundform_galerie_verwaltung'] = array
(

	// Config
	'config' => array
	(
		'dataContainer'               => 'Table',
		'enableVersioning'            => true
	),

	// List
	'list' => array
	(
		'sorting' => array
		(
			'mode'                    => 1,
			'fields'                  => array('jahr','ausstellungsnr'),
			'flag'                    => 1
		),
		'label' => array
		(
			'fields'                  => array('ausstellungsnr', 'bildnr', 'titel', 'kuenstler'),
			'format'                  => 'Ausstellung: %s - Bild: %s, Titel: %s, Künstler: %s'
		),
		'global_operations' => array
		(
		'creategalery' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_artundform_galerie_verwaltung']['creategalery'],
				'href'                => 'key=import',
				'class'               => 'header_edit_all',
			
			),
			'all' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['MSC']['all'],
				'href'                => 'act=select',
				'class'               => 'header_edit_all',
				'attributes'          => 'onclick="Backend.getScrollOffset();" accesskey="e"'
			)
		),
		'operations' => array
		(
			'edit' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_artundform_galerie_verwaltung']['edit'],
				'href'                => 'act=edit',
				'icon'                => 'edit.gif'
			),
			'copy' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_artundform_galerie_verwaltung']['copy'],
				'href'                => 'act=copy',
				'icon'                => 'copy.gif'
			),
			'delete' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_artundform_galerie_verwaltung']['delete'],
				'href'                => 'act=delete',
				'icon'                => 'delete.gif',
				'attributes'          => 'onclick="if (!confirm(\'' . $GLOBALS['TL_LANG']['MSC']['deleteConfirm'] . '\')) return false; Backend.getScrollOffset();"'
			),
			'show' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_artundform_galerie_verwaltung']['show'],
				'href'                => 'act=show',
				'icon'                => 'show.gif'
			)
		)
	),

	// Palettes
	'palettes' => array
	(
		'__selector__'                => array(''),
		'default'                     => 'bildnr,kuenstler,titel,jahr,technik,groesse,preis,bild,ausstellungsnr'
	),

	// Subpalettes
	'subpalettes' => array
	(
		''                            => ''
	),

	// Fields
	'fields' => array
	(
		'bildnr' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_artundform_galerie_verwaltung']['bildnr'],
			'exclude'                 => false,
			'inputType'               => 'text',
			'eval'                    => array('mandatory'=>true, 'maxlength'=>255)
		),
		'ausstellungsnr' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_artundform_galerie_verwaltung']['ausstellungsnr'],
			'exclude'                 => false,
			'inputType'               => 'text',
			'eval'                    => array('mandatory'=>true, 'maxlength'=>255)
		),
		'kuenstler' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_artundform_galerie_verwaltung']['kuenstler'],
			'exclude'                 => false,
			'inputType'               => 'text',
			'eval'                    => array('mandatory'=>true, 'maxlength'=>255)
		),
		'titel' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_artundform_galerie_verwaltung']['titel'],
			'exclude'                 => false,
			'inputType'               => 'text',
			'eval'                    => array('mandatory'=>true, 'maxlength'=>255)
		),
		'jahr' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_artundform_galerie_verwaltung']['jahr'],
			'exclude'                 => false,
			'inputType'               => 'text',
			'eval'                    => array('mandatory'=>true, 'maxlength'=>255)
		),
		'technik' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_artundform_galerie_verwaltung']['technik'],
			'exclude'                 => false,
			'inputType'               => 'text',
			'eval'                    => array('mandatory'=>true, 'maxlength'=>255)
		),
		'groesse' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_artundform_galerie_verwaltung']['groesse'],
			'exclude'                 => false,
			'inputType'               => 'text',
			'eval'                    => array('mandatory'=>true, 'maxlength'=>255)
		),
		'preis' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_artundform_galerie_verwaltung']['preis'],
			'exclude'                 => false,
			'inputType'               => 'text',
			'eval'                    => array('mandatory'=>true, 'maxlength'=>255)
		),
		'bild' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_artundform_galerie_verwaltung']['bild'],
			'exclude'                 => false,
			'inputType'               => 'text',
			'eval'                    => array('mandatory'=>true, 'maxlength'=>255)
		),
		'ausstellungsnr' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_artundform_galerie_verwaltung']['ausstellungsnr'],
			'exclude'                 => false,
			'inputType'               => 'text',
			'eval'                    => array('mandatory'=>true, 'maxlength'=>255)
		)
	)
);

?>