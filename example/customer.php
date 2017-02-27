 <?php 

	require_once __DIR__ . '/../vendor/autoload.php';

 	use NewDay\Caching\Cache;

 	/**
 	 * params: seconds, uri update, patch/name file cache
 	 */
 	$table = new Cache('20', 'http://127.0.0.1/lab/NewDayCaching/example/customer.html', 'caching/customers.html');

 	echo $table->optimize();
 
 ?>