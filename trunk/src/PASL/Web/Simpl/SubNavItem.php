<?php
/**
 * @license <http://www.opensource.org/licenses/bsd-license.php> BSD License
 * Copyright (c) 2008, Danny Graham, Scott Thundercloud
 * All rights reserved.
 *
 * Redistribution and use in source and binary forms, with or without modification,
 * are permitted provided that the following conditions are met:
 *
 *   * Redistributions of source code must retain the above copyright notice,
 *     this list of conditions and the following disclaimer.
 *   * Redistributions in binary form must reproduce the above copyright notice,
 *     this list of conditions and the following disclaimer in the documentation
 *     and/or other materials provided with the distribution.
 *   * Neither the name of the Danny Graham, Scott Thundercloud, nor the names of
 *     their contributors may be used to endorse or promote products derived from
 *     this software without specific prior written permission.
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND
 * ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED
 * WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED.
 * IN NO EVENT SHALL THE COPYRIGHT OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT,
 * INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING,
 * BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE,
 * DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF
 * LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE
 * OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED
 * OF THE POSSIBILITY OF SUCH DAMAGE.
 */

/**
 * SubNavItem provides creates an item for the SubNav

 * @package PASL_Web
 * @subpackage PASL_Web_Simpl
 * @category Web
 * @author Danny Graham <good.midget@gmail.com>
 */

require_once("NavItem.php");

class PASL_Web_Simpl_SubNavItem extends PASL_Web_Simpl_NavItem
{
	public function __construct($title, $caption, $link, $parent)
	{
		$this->title = $title;
		$this->caption = $caption;
		$this->link = $link;
		$this->parent = $parent;
	}

	function __toString()
	{
		$requestURI = ltrim($_SERVER['REQUEST_URI'],"/");

		$title = str_replace("(","<span class=\"shaded\">(",$this->title);
		$title = str_replace(")",")</span>",$title);

		if ($this->selected && $requestURI != $this->link) return "<li class=\"selected\"><a href=\"{$this->link}\">{$title}</a></li>";
		else if ($this->selected) return "<li class=\"selected\">{$title}</li>";
		else return "<li><a href=\"{$this->link}\">{$title}</a></li>";
	}
}

?>