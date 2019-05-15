<?php 
	/* Debugger CodeIgniter By Aliipp */
	/* Fingermedia Solution */
	
	function dumper($data=null, $is_sql = 0) { 
		@ob_clean(); 
		
		$ci =& get_instance();
		
		echo "<style>ul {
				list-style-type: none;
			}

			ul > li:before {
				content: \"-\"; /* en dash here */
				position: absolute;
				margin-left: -1.1em; 
			}</style>";
		echo "<pre><b style='font-size:18px'>Output Dumper :</b></pre><pre style='margin-left:15px;'>";
		
		if(!$is_sql) {
			
			$time = round(microtime(true)-$_SERVER['REQUEST_TIME'], 3);
			
			$backtrace = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS);
			do $caller = array_shift($backtrace); while ($caller && !isset($caller['file']));
			if ($caller) {
				echo "File Trace : ".$caller['file'].':'.$caller['line']."
							  <br /><span>Called By : <ul><li> Controller : ".
								$ci->router->fetch_class()."</li><li> Function&nbsp;&nbsp;&nbsp;: ".
								$ci->router->fetch_method().
							  "</li><li> Runtime&nbsp;&nbsp;&nbsp;&nbsp;: ".
								$time.' Second(s)</li></ul></span><br />
							  <div>$VAR1 = </div>'.
							  "<div style='margin-left:50px;'>";
				if($data != null) {
					print_r($data);
				} else {
					echo "Not Returning Variable Or Variable is Null";
					
					echo "<br /><br />To Do : Make sure the variables has a value (if it is a function, make sure that the function has a 'return'))";
				}
				
				echo "</div>";
			}
			 
		} else {
			echo mysql_error();			
		}
		echo "</pre><pre></pre>";
		$ci->db->trans_rollback();
		exit; 
	}
	
	function call($var,$param = array()){
		$ci =& get_instance();
		$var = explode('/',$var);
		require_once(APPPATH."controllers/$var[0].php"); 
		$ci->oHome =  new $var[0]();
		return call_user_func_array(array($ci->oHome,$var[1]), $param );	
		
	}
	
	function is_private($var){
		$ci =& get_instance();
		$c = $ci->router->fetch_class();
		$m = $ci->router->fetch_method();
		if($c.$m == str_replace('/','',$var)){
			ob_clean();
			show_error(503);
			exit;
		}
	}
	
	function filter_null($args){
		return (array_filter($args));
	}
	
?>