<?php
/*                          *
*      LUDUS  ACADEMIE      *
*    OWNER : DRUCKES Lucas  *
*      WEACT     2020       *
*LIBRARY FILE FOR ACTION.PHP*
*          YAPADKASS        *
*                           */

# Return a string containing a SQL request to the given table
function query_select($table, $row){
  if(gettype($table) == "string" && gettype($row) == "string"){
      return "Select ".$row." from ".$table;
  }
  else {
      echo "<script> console.log('Erreur lors de l\'execution  de la requête'); </script>";
      return null;
  }
}


# Return a string containing a SQL request to delete the given table
function query_delete($table, $attribute, $value){
  if(gettype($table) == "string" && gettype($value) == "string" && gettype($attribute) == "string"){
    return "Delete from ".$table." where ".$attribute." = '".$value."'";
  }
  else {
    return null;
  }
}


# Return a string containing a SQL request to insert data in the given table
  # Take an associative array as $data_array. the $key correspond to the attribute and the $value to the data itself
  # The array can also be sequential (non-associative), in that case every cell of the array will be considered a data,
  # and will be stored in the next attribute of the table
  function query_insert($table, $data_array){
     if(gettype($table) == "string" && gettype($data_array) == "array"){

        $i = 0;
        $array_len = count($data_array) / 2;
        $req_str = "insert into ".$table;

        # In case the array is associative, add the list of attributes to the request
        if(is_array_assosiative($data_array)){
           $req_str = $req_str." (";
           foreach ($data_array as $key => $value){
             $req_str = $req_str.$key;
             $i++;
             if($i < $array_len){
                $req_str = $req_str.", ";
             }
           }
           $i = 0;
           $req_str = $req_str.") \n";
        }

        # Add the list of data itself to the request
        $req_str = $req_str."values(";
        foreach ($data_array as $key => $value){
           if (gettype($value) == "string"){
               $req_str = $req_str."'".$value."'";
           } else {
               $req_str = $req_str.$value;
          }

           $i++;
           if($i < $array_len){
             $req_str = $req_str.", ";
           }
        }
        return $req_str.")";
     }
     else {
      return null;
     }
  }

# Return true if the array is associative, false if not
function is_array_assosiative($arr){
  return (array_keys($arr) !== range(0, count($arr) - 1));
}

# Return a string containing a SQL request to modify the given table at the given condition (where $attribute = $condition_value)
# Take an associative array as $date_array. the $key correspond to the attribute and the $value to the data itself
function query_update($table, $data_array, $attribute, $condition_value){
   if(gettype($table) == "string" && gettype($data_array) == "array"){

      $req_str = "update ".$table." set ";
      foreach ($data_array as $key => $value){
        if($value == "string"){
           $req_str = $req_str.$key." = '".$value."'";
        } else{
           $req_str = $req_str.$key." = ".$value;
        }
      }
      $req_str." where ".$attribute." = ".$condition_value;

      return $req_str;
   }
   else {
    return null;
   }
}

 ?>
