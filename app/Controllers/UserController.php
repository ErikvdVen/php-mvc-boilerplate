<?php

namespace Erik\Magneds\Controllers;

use League\Csv\Reader;
use Doctrine\ORM\EntityManager;
use Erik\Magneds\Service;
use Erik\Magneds\Models\User;

class UserController
{

    private $em;

    public function __construct()
    {
        $this->em = Service::Instance();
    }   

    private function importUsers($path)
    {

        $reader = Reader::createFromPath($path);
        $keys = ['firstname', 'infix', 'lastname', 'dob', 'gender', 'zipcode', 'housenumber'];
        $results = $reader->fetchAssoc($keys);

        foreach ($results as $row) {
            
            if (0 === strpos($row['firstname'], '#')) continue;

            $user = new User();
            $user->setFirstname($row['firstname']);
            $user->setInfix($row['infix']);
            $user->setLastname($row['lastname']);
            $user->setDob($row['dob']);
            $user->setGender($row['gender']);
            $user->setZipcode($row['zipcode']);
            $user->setHousenumber($row['housenumber']);

            $this->em->persist($user);
            $this->em->flush();
        }

    }

    private function dateDiff($date1, $date2)
    {
        return date_diff( date_create($date1), date_create($date2) );
    }

    public function indexAction($req, $res, $service, $app)
    {
        $data = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $filePath = './tmp/excel.csv';

            if(count($req->files()) > 0 && $req->files()->csv['type'] == 'text/csv'){
                move_uploaded_file($req->files()->csv['tmp_name'], $filePath);  
                $this->importUsers($filePath);
            }

        }

        if($users = $this->em->getRepository('Erik\Magneds\Models\User')->findAll())
        {
            $men = [];
            $women = [];

            foreach($users as $user)
            {
                $diff = $this->dateDiff($user->getDob(), date("Y-m-d"));

                ($user->getGender() == 'm') ? $men[] = $diff->y : $women[] = $diff->y;
            }

            $data['avgMen'] = array_sum($men) / count($men);
            $data['avgWomen'] = array_sum($women) / count($women);
        }
        
        return $app->twig->render('user/index.html', $data);
    }
}

?>