<?php
/**
 * @author Rasmus Sommer Larsen
 */
 
include('App.php');
include('Template.php');

$app = new App();

/*
* Register Home-page with Template-data.
*/
$homeTemplate = new Template();
$homeTemplate->registerVariable('name', 'John Doe');
$homeTemplate->registerVariable('profile', '?page=profile');
$app->registerPage('home', $homeTemplate);

/*
* Register Profile-page with Template-data from Array.
*/
$profileData = [
  'name' => 'John Doe',
  'address' => '657 Bowne Street, Tyro, Marshall Islands, 9677',
  'birthdate' => '1970-01-01'
];
$profileTemplate = new Template();
$profileTemplate->registerVariables($profileData);
$app->registerPage('profile', $profileTemplate);

/*
* Determine requested page, default to Home.
*/
if(isset($_GET["page"])){
  $reqPage = $_GET["page"];
}
else{
  $reqPage = 'home';
}

/*
* Tell the App to render the requested page.
*/
$app->renderPage($reqPage);

?>
