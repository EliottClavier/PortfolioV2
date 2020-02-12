<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Layout {

	private $arrayCssCombined = array();
	private $arrayJsCombined = array();

	/***
	 * @title Mise en forme des CSS
	 * @param $datas
	 * @return array
	 */
	public function add_css($datas)
	{
		// On initialise le taleau une première fois (sauvegarde)
		$array_css_base = $this->arrayCssCombined;

		// Pour chaque lien dans le tableau on ajoute la balise css
		foreach ($datas as $data) {
			$data = '<link rel="stylesheet" href="' . base_url() . $data . '.css">';
			// on ajoute chacun des lien au tableau css
			array_push($array_css_base, $data);
		}
		// On redéfinit le tableau
		$this->arrayCssCombined = $array_css_base;

		// Et on retourne le tableau CSS
		return $this->arrayCssCombined;
	}

	/**
	 * @title Mise en Forme des JS
	 * @param array $datas
	 * @return array
	 */
	public function add_js($datas = array())
	{
		// On initialise le taleau une première fois (sauvegarde)
		$array_js_base = $this->arrayJsCombined;
		// Pour chaque lien dans le tableau on ajoute la balise js
		foreach ($datas as $data) {
			$data = '<script defer src="' . base_url() . $data . '.js"></script>';
			// on ajoute chacun des lien au tableau js
			array_push($array_js_base, $data);
		}
		// On redéfinit le tableau JS
		$this->arrayJsCombined = $array_js_base;
		// Et on retourne le tableau JS
		return $this->arrayJsCombined;
	}
}
