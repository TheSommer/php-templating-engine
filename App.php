<?php
/**
 * @author Rasmus Sommer Larsen
 */

class App {
  private $pages = array();

  /*
  * Register Page with Template
  * @param string $name Page name
  * @param Template $template
  */
  public function registerPage($name, $template){
    $this->pages[$name] = $template;
  }

  /*
  * If requested Page is registered, find Page and render Template.
  * @param string $name
  */
  public function renderPage($name){
    if(array_key_exists($name, $this->pages)){
      $this->pages[$name]->render($name);
    }
    else{
      throw new Exception('Page could not be found.');
    }
  }
}

?>
