<?php
	require_once("Fighter.class.php");
	class UnholyFactory
	{
		private $_absorbed = array();
		public function absorb($unit)
		{
			if (get_parent_class($unit) != "Fighter")
			{
				print("(Factory can't absorb this, it s not a fighter)". PHP_EOL);
				return ;
			} else if (!in_array($unit, $this->_absorbed))
			{
				$this->_absorbed[$unit->getName()] = $unit;
				print( "(Factory absorbed a fighter of type " .
				 $unit->getName() . ")" . PHP_EOL );
			} else 
				print( "(Factory already absorbed a fighter of type " . 
				$unit->getName() . ")" . PHP_EOL );
		}

		public function fabricate( $type ) {
			if ( array_key_exists( $type, $this->_absorbed ) )
			{
				print( "(Factory fabricates a fighter of type $type)" . PHP_EOL );
				return ( clone $this->_absorbed[$type] );
			}
			else
				print( "(Factory hasn't absorbed any fighter of type $type)" . PHP_EOL);
		}
	} 