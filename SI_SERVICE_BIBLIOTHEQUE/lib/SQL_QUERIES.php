<?php

   # Loop through every tables in the database and print it
   function print_every_table($conn, $data_array){
      foreach ($data_array as $value_arr){
         foreach ($value_arr as $key => $table_name){
            $table_array = query_select_and_fetch($conn, $table_name);
            print_table($table_array, true, $table_name);
         }
      }
   }


   # Delete a line designated by the user
   function user_delete_from_table($conn, $data_array){
      foreach ($data_array as $value_arr){
         foreach ($value_arr as $key => $table_name){
            if(isset($_GET[$table_name])){
               $table_array = query_select_and_fetch($conn, $table_name);
               $index_to_delete = (int)$_GET[$table_name];

               $line_to_delete = $table_array[$index_to_delete];
               try{
                 $req = query_delete($table_name, $line_to_delete, "=");
                 $statment = $conn -> prepare($req);
                 $statment -> execute();
               }catch(Exception $e){
                 //foreign failed
                 echo ("<center><span class='conn_failed'>Error Executing the Request.<br>Maybe A Foreign Key Constraint Failed / Entity is non existent ?</span></center>");
               }

            }
         }
      }
   }


   # Print the result of the command research in a html table
   # If the argument suppr_column is true, also print buttons to suppress a column from the date base
   function print_table($table_array, $suppr_column = false, $table_name = ""){

      if(count($table_array) == 0){ return; }
      if($suppr_column == true){ echo ("<form id ='form' action= '' method='get'>"); }

      echo("<table class= 'tab'>
             <thead>
                <tr>");
               # Print the header of the table out of the key of the array
               foreach ($table_array[0] as $column_name => $data){
                  echo ("<th>".$column_name."</th>");
               }

         echo("</tr>
             </thead>
             <tbody>");

         $i = 0;

         # print the core of the table
         foreach ($table_array as $value_arr){
            echo("<tr>");
               # Print each cell of the array
               foreach ($value_arr as $column_name => $data){
                  echo("<td>".$data."</td>");
               }

               # If the suppr_column is true, print a suppr button
               if($suppr_column == true){
                  echo ("<th><input type='submit' name='delete_".$table_name."' id='".$table_name."' value='".$i."' class='btn-close'></input></th>");
                  echo ("<th><input type='submit' name='update_".$table_name."' id='".$table_name."' value='".$i."' class='btn-edit'></input></th>");
                  echo ("<th><input type='submit' name='add_".$table_name."' id='".$table_name."' value='".$i."' class='btn-add'></input></th>");
               }
               $i++;

            echo("</tr>");
         }
      echo("</tbody></table>");

      if($suppr_column == true){ echo ("</form>"); }
   }


   # Generate options from an array of data, fetch data from the given key
   function generate_option($array, $req_key){
       $outpout_string = "";

       foreach($array as $value_arr){
          foreach($value_arr as $key => $value){
             if($value != null && $value != "" && $key == $req_key){
              $outpout_string = $outpout_string."<option value=".$value.">".$value."</option>";
             }
          }
       }
       return $outpout_string;
   }


   # Query a table and fetch all data, returns an associative array of data
   function query_select_and_fetch($conn, $table, $column = '*', $cond_array = null, $operator = null){
     $statment = $conn -> prepare(query_select($table, $column, $cond_array, $operator));
     $statment -> execute();
     $data_array = $statment -> fetchAll(PDO::FETCH_ASSOC);

     return $data_array;
   }


   # Return a string containing a SQL request to the given table
   function query_select($table, $row, $cond_array = null, $operator = null){
      $req = null;

       # Generate the basic request
       if(gettype($table) == "string" && gettype($row) == "string"){
          $req = "Select ".$row." from ".$table;

          # Generate the conditions
          if(gettype($cond_array) == "array" && count($cond_array) != 0){
             $req = generate_query_condition($req, $cond_array, $operator);
          }
       }
      return $req;
   }


   # Return a string containing a SQL request to delete data from the given table at the given condition (where $attribute = $condition_value)
   function query_delete($table, $cond_array = null, $operator = null){
      $req = null;

       if(gettype($table) == "string"){
          $req = "Delete from ".$table;

          # Generate the conditions
          if(gettype($cond_array) == "array" && count($cond_array) != 0){
             $req = generate_query_condition($req, $cond_array, $operator);
          }
       }
       return $req;
   }


   # Return a string containing a SQL request to insert data in the given table
   # Take an associative array as $data_array. the $key correspond to the attribute and the $value to the data itself
   # The array can also be sequential (non-associative), in that case every cell of the array will be considered a data,
   # and will be stored in the next attribute of the table
   function generate_query_insert($table, $data_array){
       if(gettype($table) == "string" && gettype($data_array) == "array"){

          $i = 0;
          $array_len = count($data_array);
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
          $req_str = $req_str." values(";
          foreach ($data_array as $value){
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


   # Generate a condition
   function generate_query_condition($req, $cond_array = null, $operator = "="){
      $req = $req." where ";
      $i = 0;
      $cond_nb = count($cond_array);
      foreach($cond_array as $key => $value){

         # If the $operator is an array, loop through it and assign it to each condition
         # The array has to be the same lenght than the cond_array
         if(gettype($operator) == "array"){
            $req = $req." ".$key." ".$operator[$i]." '".$value."'";
         } else { # If the $operator is a single value, apply it to every conditions in the cond array
            $req = $req." ".$key." ".$operator." '".$value."'";
         }
         $i++;

         # If we are not at the last itteration yet, add a AND opreator to the statement
         if($i < $cond_nb){
            $req = $req." and ";
         }
      }

      return $req;
   }


   # Return true if the array is associative, false if not
   function is_array_assosiative($arr){
        return (array_keys($arr) !== range(0, count($arr) - 1));
   }
?>
