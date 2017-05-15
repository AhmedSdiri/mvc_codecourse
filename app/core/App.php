<?php



class App
{
    
    protected $controller = 'home';
    
    protected $method = 'index';
    
    protected $params = [];
    
    
    function __construct()
    {
         echo '</br> url = ';
      print_r ($this->parseUrl());
        $url =$this->parseUrl();
         echo '</br> controller = ';
         print_r ($this->controller);
        if(file_exists('../app/controllers/'.$url[1].'.php'))
        {
            echo '</br> OK, the class '.$url[1].' exists';
            $this->controller = $url[1];
            unset($url[1]);
            
        }
        else
        {
            echo '</br> NO, the class '.$url[1].' does not exist';
        }
        echo '</br> the url now is : ';
        echo $_GET['url'];
        require_once '../app/controllers/'.$this->controller.'.php';
        $this->controller = new $this->controller;
        if(isset($url[2]))
        {
            if(method_exists($this->controller,$url[2]))
            {
                echo '</br> OK, the method '.$url[2].' exists';
                $this->method = $url[2];
                unset($url[2]);
            }
            else
            {
                 echo '</br> NO, the method '.$url[2].' does not exist';
            }
        }
        echo '</br> the url now is : ';
        echo $_GET['url'];
        unset($url[0]);
        $this->params = $url ? array_values($url) : [];
        echo '</br> params = ';
        print_r($this->params);
        
        //*********************************************
        
        call_user_func_array([$this->controller, $this->method], $this->params);
      
        echo '</br> testing array func array Works fine ';
        echo '</br> calling param ';
        print_r($this->params);
        //
       // $this->controller->$this->method;
        
        echo '<h3> end of App construct </h3>';
    }
    public function parseUrl()
    {
        if(isset($_GET['url'])){
            echo $_GET['url'];
            echo '</br>';
            return $url = explode('/',filter_var(trim($_GET['url'])), FILTER_SANITIZE_URL);
        }
    }
    
    
    
}