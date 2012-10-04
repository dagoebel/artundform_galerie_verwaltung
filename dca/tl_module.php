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

$GLOBALS['TL_DCA']['tl_module']['palettes']['artundform_galerie_verwaltung'] = '{title_legend},name,headline,type;{sort_legend},artundform_jahr,artundform_ausstellungsnr,artundform_darstellung;
{protected_legend:hide},protected;{expert_legend:hide},guests,cssID,space';


$GLOBALS['TL_DCA']['tl_module']['fields']['artundform_jahr'] = array 
( 
    'label'                   => &$GLOBALS['TL_LANG']['tl_module']['artundform_jahr'], 
    'default'                 => '2000', 
    'exclude'                 => true, 
    'inputType'               => 'select', 
    'options'                 => array('2000','2001','2002','2003','2004','2005','2006','2007','2008','2009','2010','2011','2012','2013','2014','2015','2016','2017','2018','2019','2020'), 
    'reference'               => &$GLOBALS['TL_LANG']['tl_module']['artundform_jahr_options'], 
    'eval'                    => array('mandatory'=>true) 
); 
$GLOBALS['TL_DCA']['tl_module']['fields']['artundform_ausstellungsnr'] = array 
( 
    'label'                   => &$GLOBALS['TL_LANG']['tl_module']['artundform_ausstellungsnr'], 
    'default'                 => '1', 
    'exclude'                 => true, 
    'inputType'               => 'select', 
    'options'                 => array('1','2','3','4','5','6','7','8','9','10'), 
    'reference'               => &$GLOBALS['TL_LANG']['tl_module']['artundform_ausstellungsnr_options'], 
    'eval'                    => array('mandatory'=>true) 
);

$GLOBALS['TL_DCA']['tl_module']['fields']['artundform_darstellung'] = array 
( 
    'label'                   => &$GLOBALS['TL_LANG']['tl_module']['artundform_darstellung'], 
    'default'                 => '1', 
    'exclude'                 => true, 
    'inputType'               => 'select', 
    'options'                 => array('1','2','3'), 
    'reference'               => &$GLOBALS['TL_LANG']['tl_module']['artundform_darstellung_options'], 
    'eval'                    => array('mandatory'=>true) 
);

?>