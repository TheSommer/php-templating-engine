<?php
/**
 * @author Rasmus Sommer Larsen
 */

class Template {
  private $variables = array();

  /*
  * Register single Key => Value pair.
  * @param string $key
  * @param mixed $value
  */
  public function registerVariable($key, $value){
    $this->variables[$key] = $value;
  }

  /*
  * Register shallow Array of Key => Value pairs.
  * @param array $array Shallow array of variables
  */
  public function registerVariables($array){
    foreach($array as $key => $value){
      $this->registerVariable($key, $value);
    }
  }

  /*
  * Render HTML Template with this Template's data.
  * @param string $templateName Name of HTML Template in /templates-directory without extension
  */
  public function render($templateName){
    $pathToTemplate = 'templates/' . $templateName . '.html';

    if(file_exists($pathToTemplate)){
      $contents = file_get_contents($pathToTemplate);

      /*
      * For each registered variable, replace all occurrences.
      */
      foreach($this->variables as $key => $value){
        $contents = preg_replace('/\[' . $key . '\]/', $value, $contents);
      }

      echo($contents);
    }
    else{
      throw new Exception('HTML Template (' . $templateName . '.html) missing.');
    }
  }
}

?>
