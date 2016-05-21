<?php

	function __autoload($clase){
		include "clases/{$clase}.php";
	}