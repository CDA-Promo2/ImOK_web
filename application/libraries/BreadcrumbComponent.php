<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class BreadcrumbComponent
{
	private $breadcrumbs = array();


	public function add($title, $href)
	{
		if (!$title OR !$href)
			return;

		$this->breadcrumbs[] = array(
			'title' => $title,
			'href' => $href
		);

		return $this;
	}

	public function createView(){
		if($this->breadcrumbs){

			$view = "<nav aria-label=\"breadcrumb\"> <ol class=\"breadcrumb my-5\">";
			$length = count($this->breadcrumbs)-1;

			foreach($this->breadcrumbs as $key => $crumb){

				if($length == $key ){
					$view .="<li class=\"breadcrumb-item active\" aria-current='page'><h1>".$crumb['title']."</h1></li>";
				}else{
					$view .="<li class=\"breadcrumb-item\"><a href=\"".$crumb['href']."\">" .$crumb['title']."</a></li>";
				}



			}

			$view .= "</ol></nav>";

			return $view;
		}
		return '';
	}

}
