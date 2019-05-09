<?php

	class NightsWatch
	{
		function fight() {
		}
		function recruit($rec) {
			if (is_a($rec, "JonSnow") || is_a($rec, "SamwellTarly"))
				return $rec::fight();
		}
	}
