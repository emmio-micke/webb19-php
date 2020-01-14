<?php

// 6. Research-uppgift: Skriv en rekursiv funktion som räknar ut fakulteten för ett heltal.

function factorial( $n ) {
 
  // Base case
  if ( $n == 0 ) {
    echo "Base case: \$n = 0. Returning 1..." . PHP_EOL;
    return 1;
  }
 
  // Recursion
  echo "\$n = $n: Computing $n * factorial( " . ($n-1) . " )..." . PHP_EOL;
  $result = ( $n * factorial( $n-1 ) );
  echo "Result of $n * factorial( " . ($n-1) . " ) = $result. Returning $result..." . PHP_EOL;
  return $result;
}
 
echo "The factorial of 5 is: " . factorial( 5 );

