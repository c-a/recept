<?php

class utf8encode_filter extends php_user_filter
{
  function filter($in, $out, &$consumed, $closing)
  {
    while ($bucket = stream_bucket_make_writeable($in)) {
      $bucket->data = utf8_encode($bucket->data);
      $consumed += $bucket->datalen;
      stream_bucket_append($out, $bucket);
    }
    return PSFS_PASS_ON;
  }

}

/**
 * Description of ImportCommand
 *
 * @author c-a
 */
class IngredientCommand extends CConsoleCommand
{
 
  private function insertIngredients($params) {
    $sql =
    'INSERT INTO tbl_ingredient (id, name, kcal, protein, fat, carbs, fiber) VALUES';
    
    $paramsStr = '';
    
    for($i = 0; $i < sizeof($params); $i++)
    {
      $row = $params[$i];
      
      if ($i != 0)
        $paramsStr .= ',';
      
      $paramsStr .= '(';
      for($j = 0; $j < sizeof($row); $j++)
      {
        $col = $row[$j];
        
        if ($j != 0)
          $paramsStr .= ',';
        $paramsStr .= $col;
      }
      $paramsStr .= ')';
    }
    
    $insert = Yii::app()->db->createCommand($sql . $paramsStr . ';');
    $insert->execute();
  }
  
  public function actionImport($filename)
  {
    
    if (($handle = fopen($filename, 'r')) !== FALSE) {

      stream_filter_register("utf8encode", "utf8encode_filter")
              or die("Failed to register filter");
      stream_filter_prepend($handle, "utf8encode");
      
      /* Skip two first lines */
      for ($i = 0; $i < 2; $i++) {
        if (fgets($handle) === false) {
          fclose($handle);
          return;
        }
      }

      $params = array();
      $i = 0;
      while (($data = fgetcsv($handle, 0, ";")) !== FALSE) {
        
        $row = array();
        
        /* ID */
        $row[] = Yii::app()->db->quoteValue($data[1]);
        /* Name */
        $row[] = Yii::app()->db->quoteValue($data[0]);
        /* kcal */
        $row[] = Yii::app()->db->quoteValue($data[3]);
        /* protein */
        $row[] = Yii::app()->db->quoteValue($data[4]);
        /* fat */
        $row[] = Yii::app()->db->quoteValue($data[5]);
        /* carbs */
        $row[] = Yii::app()->db->quoteValue($data[6]);
        /* fiber */
        $row[] = Yii::app()->db->quoteValue($data[7]);
        
        $params[] = $row;

        $i++;
        if ($i == 1000) {
          $this->insertIngredients($params);
          $i = 0;
          $params = array();
        }
      }

      if ($i > 0)
        $this->insertIngredients($params);
      
      fclose($handle);
    }
  }
}

?>
