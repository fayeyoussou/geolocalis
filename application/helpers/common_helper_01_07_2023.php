<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	function xssclean($post)
	{
		$rtn = true; 
		if($post) {
			foreach ($post as $key => $data) {
				if (preg_match("/</i", $data, $match))  {
   					$rtn = false; 
   				}
			}
		}
		return $rtn;
	}

	function output($data) 
	{
		if(isset($data)) {
			return html_escape($data);
		} else {
			return '';
		}
	}
	function pointInPolygon($point, $polygon, $pointOnVertex = true) {
	    $pointOnVertex = $pointOnVertex;
	    $point = pointStringToCoordinates($point);
	    $vertices = array(); 
	    foreach ($polygon as $vertex) {
	        $vertices[] = pointStringToCoordinates($vertex); 
	    }
	    if ($pointOnVertex == true and pointOnVertex($point, $vertices) == true) {
	        return "vertex";
	    }
	    $intersections = 0; 
	    $vertices_count = count($vertices);
	    for ($i=1; $i < $vertices_count; $i++) {
	        $vertex1 = $vertices[$i-1]; 
	        $vertex2 = $vertices[$i];
	        if ($vertex1['y'] == $vertex2['y'] and $vertex1['y'] == $point['y'] and $point['x'] > min($vertex1['x'], $vertex2['x']) and $point['x'] < max($vertex1['x'], $vertex2['x'])) { // Check if point is on an horizontal polygon boundary
	            return "boundary";
	        }
	        if ($point['y'] > min($vertex1['y'], $vertex2['y']) and $point['y'] <= max($vertex1['y'], $vertex2['y']) and $point['x'] <= max($vertex1['x'], $vertex2['x']) and $vertex1['y'] != $vertex2['y']) { 
	            $xinters = ($point['y'] - $vertex1['y']) * ($vertex2['x'] - $vertex1['x']) / ($vertex2['y'] - $vertex1['y']) + $vertex1['x']; 
	            if ($xinters == $point['x']) { // Check if lat lng is on the polygon boundary (other than horizontal)
	                return "boundary";
	            }
	            if ($vertex1['x'] == $vertex2['x'] || $point['x'] <= $xinters) {
	                $intersections++; 
	            }
	        } 
	    } 
	    if ($intersections % 2 != 0) {
	        return "inside";
	    } else {
	        return "outside";
	    }
	}

	function pointOnVertex($point, $vertices) {
	  foreach($vertices as $vertex) {
	      if ($point == $vertex) {
	          return true;
	      }
	  }
	}
	function pointStringToCoordinates($pointString) {
	    $coordinates = explode(" ", $pointString);
	    return array("x" => $coordinates[0], "y" => $coordinates[1]);
	}

	function sitedata() {
	  $CI =& get_instance();
	  $CI->db->from('settings');
	  $query = $CI->db->get();
	  $siteinfo = $query->result_array();
	  if(count($siteinfo)>=1) {
	    return $siteinfo[0];
	  } 
    }

    function userpermission($link) {
    	$permissons = $_SESSION['userroles'];
    	if($permissons[$link]==1) {
    		return true;
    	} else {
    		return false;
    	}
    }


if(!function_exists('join_multi_select')) {
	 function join_multi_select($values = null, 
		$relation_table = null, 
		$relation_value = null, 
		$relation_label = null) {

		if ($values) {
			$result = & get_instance();
			  $result->db
				->select($relation_label)
			    ->where_in($relation_value, explode(',', $values))
			    ->get($relation_table)->result();
/*			$result = app()->db
				->select($relation_label)
			    ->where_in($relation_value, explode(',', $values))
			    ->get($relation_table)->result();*/
		    $labels = [];
		    foreach ($result as $row) {
		    	$labels[] = $row->{$relation_label};
		    }
		    return implode(',', $labels);
		}
		return '-';	
	}
}	