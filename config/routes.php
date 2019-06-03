<?php 
/*
* @invoke Route class 
*/
$App = new Route(); //dont remove this line. 

/*
 * $App->post("/account/login","account->login"); // post method routes
 * $App->get("/products/get/{}","products->getById"); // the variable which is in this `{}` will automatically send to getById method
 * $App->get("/products/get/{}","products->get@productType"); //here you can forge the parameter if required
 * $App->get("/products/view","products->get@mobile");  
*/


$App->get("/","home->first"); //default call
$App->get("/admin","admin->first");
$App->post("/admin","admin->first");
$App->get("/admin/logout","admin->logout");

// $App->get("/admin/course/add","admin->create_course");
// $App->post("/admin/course/add","admin->create_course");
// $App->get("/admin/course/edit/{}","admin->create_course");
// $App->post("/admin/course/edit/{}","admin->create_course");
// $App->get("/admin/course/remove/{}","admin->create_course");
// $App->get("/admin/course/view","admin->view_course");


$App->crud("/admin/course","course");
//$App->crud("/admin/courses","course");

/*
* You can add other routes below.
*/



/*
* Page Not Found Route
* NOTE : DONOT REMOVE THIS ROUTE, IT IS FOR PAGE NOT FOUND ERROR.
* IF YOU WANT TO SHOW BLANK SCREEN THEN YOU CAN REMOVE IT.
*/
$App->error();

?>