<?php

namespace OMDBAPI\Parameters;

interface IParameter
{
	function toArray();
	
	function toJSON();
}