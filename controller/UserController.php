<?php
require_once __DIR__."/../src/loger.php";
require_once __DIR__."/../src/Admin.php";
require_once __DIR__."/../src/Teacher.php";
require_once __DIR__."/../src/Student.php";

class USerController 
{

    public static function renderVrTeacher ()
    {
        $users = new admin;
        $data = $users->getAllUsers();
        $html = '';
        
        foreach ($data as $user) {
            if ($user instanceof Teacher) {
                if($user->getstatus()=="active"){
                      $html .= "<tr>
                            <td>{$user->getid()}</td>
                            <td>{$user->getusername()}</td>
                            <td>{$user->getemail()}</td>
                            <td>{$user->getstatus()}</td>
                            <td>

                                <a href='?DeactivateId={$user->getid()}'><button >Deactivate</button></a>

                            </td>
                        </tr>";
                }
              
            }
        }
        echo $html;  
     
    }
    public static function renderNonVrTeacher ()
    {
        $users = new admin;
        $data = $users->getAllUsers();
        $html = '';
        
        foreach ($data as $user) {
            if ($user instanceof Teacher) {
                if($user->getstatus()=="verification"){

                    $html .= " <tr>
                    
                                    <td>{$user->getid()}</td>
                                    <td>{$user->getusername()}</td>
                                    <td>{$user->getemail()}</td>
                                    <td>{$user->getstatus()}</td>
                                    <td>
                                        <a href='?ActivateId={$user->getid()}'><button >Verified</button></a>
                                    </td>
                                </tr>";
                }
            }
        }
        echo $html;  
     
    }
    public static function renderStudent ()
    {
        $users = new admin;
        $data = $users->getAllUsers();
        $html = '';
        
        foreach ($data as $user) {
            if ($user instanceof Student) {
                if($user->getstatus()==="verification"){
                    $user->setstatus("Deactive");
                }
                $html .= "<tr>
                            <td>{$user->getid()}</td>
                            <td>{$user->getusername()}</td>
                            <td>{$user->getemail()}</td>
                            <td>{$user->getstatus()}</td>
                            <td>
                                <a href='?ActivateId={$user->getid()}'><button >Activate</button></a>
                                <a href='?DeactivateId={$user->getid()}'><button >Deactivate</button></a>
                                <a href='?SuspendId={$user->getid()}'><button >Suspend</button></a>
                            </td>
                        </tr>";
            }
        }
        echo $html; 
    }
    public static function changeState($id, $status)
    {
        $user = new Admin();
        $user->updateStatus($id, $status);
    }
    
}