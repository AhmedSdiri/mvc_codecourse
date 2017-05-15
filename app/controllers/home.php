<?php


//include_once '../app/models/User.php';

include_once ("../app/core/Controller.php");


class Home extends Controller {
    
    protected $user;
    function __construct()
    {
        parent:: __construct();
        $this->user = $this->model('User');
        echo '</br> i am the home class';
    }
    function index($name='')
    {
 
      
       //model retrun an object that has User type
       // $user = parent::model('User');
        //*******MODEL *********
        //$user = $this->model('User');
        $user = $this->user;
        var_dump($user);
        $user->name = $name;
        echo '</br> echo name from the index method ';
        echo $user->name;
        var_dump($user->name);
        //***** VIEW *************
       // parent::view('home/index', ['name' => $user->name]);
        $this->view('home/index', ['name' => $user->name]);
        //eloquent
        
      /*   $fillable = ['username', 'email', 'password'];
        User::create([
            'username' => 'alex',
            'email' => 'alex@email.com',
            'password' => '45678'
            
        ]);*/
        echo '<h3> end of Home index </h3>';
    }
    function create($username = '', $email = '')
    {
        $this->user->create([
            'username' => $username,
            'email' => $email
        ]);
        echo '</br><font color="green">success !! client created in website data base</font>';
        
       // echo '<h3> end of Home create </h3>';
    }
    
}
