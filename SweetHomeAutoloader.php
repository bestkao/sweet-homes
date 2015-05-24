<?php
namespace SweetHome;

/**
 *
 * @param string $className Class or Interface name automatically
 *              passed to this function by the PHP Interpreter
 */
class SweetHomeAutoloader
{

    static public function autoloader($class)
    {

        $dirs = array('models','views');
        foreach($dirs as $dir){ 
            $file = $dir.'/'.$class. '.php';
            //printf('Autoload ' . $file . "<br>\r\n");
            if (is_readable($file)){
               require $file;
               break; // if i have maintained naming conventions as per dir as there
                  // is no point for looking eg: sample1_printer.php in the vos/ 
                 // or printer/. this way iam avoiding unnecessary loop
             }
        }
        if(!is_readable($file))
            $file = $class.'.php';
        
    }
    /*
        // project-specific namespace prefix
        $prefix = 'SweetHome\\';

        // base directory for the namespace prefix
        $base_dir = __DIR__ . '/';  //. '/src/';
        // does the class use the namespace prefix?
        $len = strlen($prefix);
        //if (strncmp($prefix, $class, $len) !== 0) {
            // no, move to the next registered autoloader
        //    return;
        //}

        // get the relative class name
        $relative_class = substr($class, $len);

        // replace the namespace prefix with the base directory, replace namespace
        // separators with directory separators in the relative class name, append
        // with .php
        $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';

        // if the file exists, require it
        if (file_exists($file)) {
            //printf('Found ' . $file . "<br>\r\n");
            require $file;
        }
        
        $file = $base_dir . 
    }
     * 
     */
}

spl_autoload_register('\SweetHome\SweetHomeAutoloader::autoloader');
